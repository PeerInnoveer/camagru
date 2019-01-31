<?php

if (isset($_POST["reset-password-submit"])) {
    
    
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwd-repeat"];
    
    if (empty($password) || empty($passwordRepeat)) {
        header("Location: ../php/create-new-password.php?newpwd=empty");
        exit();
    } else if ($password != $passwordRepeat) {
        header("Location: ../php/create-new-password.php?newpwd=pwd-dont-match");
        exit();
    }
    
    try {
        $currentDate = date("U");
        
        require 'dbh.inc.php';
        
        
        if (!($stmt = $db_conn->prepare("SELECT * FROM pwdReset WHERE pwdResetSelector = :pwdrs AND pwdResetExpires >= :pwdrex;"))) {
            header("Location: ../php/reset-password.php?error=sqlerror1");
            exit();
        } else {
            $stmt->bindParam(':pwdrs', $selector);
            $stmt->bindParam(':pwdrex', $currentDate);
            $stmt->execute();
        
        if (!($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
            header("Location: ../php/reset-password.php?error=resubmit_request");
            exit();

        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {
                exit();
            } else if ($tokenCheck === true) {
                $tokenEmail = $row['pwdResetEmail'];
                if (!($sql = $db_conn->prepare("SELECT * FROM users WHERE user_email = :u_em;"))) {
                    header("Location: ../php/reset-password.php?error=sqlerror2");
                    exit();
                } else {
                    $stmt->bindParam(':u_em', $tokenEmail);
                    $stmt->execute();
                    if (!($row = $stmt->fetch(PDO::FETCH_ASSOC))) {
                        header("Location: ../php/reset-password.php?error=fetch_error");
                        exit();
                    } else {
                        if (!($sql = $db_conn->prepare("UPDATE users SET user_pwd = :u_pwd WHERE user_email = :u_em;"))) {
                            header("Location: ../php/reset-password.php?error=sqlerror3");
                            exit();
                    } else {
                            $newPwdHash = password_hash($password, PASSWORD_DEFAULT);
                            $stmt->bindParam(':u_pwd', $newPwdHash);
                            $stmt->bindParam(':u_em', $tokenEmail);
                            $stmt->execute();

                            if (!($sql = $db_conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail = :pwd_res_e;"))) {
                                header("Location: ../php/reset-password.php?error=sqlerror4");
                                exit();
                            } else {
                                $stmt->bindParam(':pwd_res_e', $tokenEmail);
                                $stmt->execute();
                                header("Location: ../php/signup.php?newpwd=passwordupdated");
                            }
                        }
                    }
                }
            }
        }
    }
 } catch (PDOException $e) {
    echo $e->getMessage();
    }
    $stmt = null;
    $db_conn = null;
} else {
    header("Location: ../php/signup.php");
}