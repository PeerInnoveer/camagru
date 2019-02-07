<?php
    
    //
    // Update Passwords
    //

    if (isset($_POST['update-submit-pwd'])) {
        print_r($_POST);
        require 'dbh.inc.php';
        
        $username = $_POST['uid'];
        $new_pwd = $_POST['new_pwd'];
        $re_new = $_POST['re_new_pwd'];
        $curr_pwd = $_POST['curr_pwd'];

        
        if ($username != htmlspecialchars($_POST['uid']) || $new_pwd != htmlspecialchars($_POST['new_pwd']) || $re_new != htmlspecialchars($_POST['re_new_pwd']) || $curr_pwd != htmlspecialchars($_POST['curr_pwd'])) {
            header("Location: ../php/update_acc.php?error=NiceTry");
            exit();
        }
        if (empty($curr_pwd) || empty($new_pwd) || empty($re_new)) {
            header("Location: ../php/update_acc.php?error=emptyFields");
            exit();
        } else if ($new_pwd !== $re_new) {
            header("Location: ../php/update_acc.php?error=pwd_not_a_match");
            exit();
            // } else if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,64}$/", $new_pwd)) {
                //     header("Location: ../account.php?error=weakasspwd");
                //     exit();
            //}
        } 
        
        try {
        
            if (!($sql = $db_conn->prepare("SELECT * FROM users WHERE user_uid = :user_uid"))) {
                header("Location: ../php/update_acc.php?error=sqlerror");
                exit();
            } else {
                $sql->bindParam(':user_uid', $username);
                $sql->execute();
                if ($row = $sql->fetch()) {
                    $pwdCheck = password_verify($curr_pwd, $row['user_pwd']);
                    if ($pwdCheck == false) {
                        header("Location: ../php/update_acc.php?error=wrongpwd");
                        exit();
                    } else if ($pwdCheck == true) {
                        
                        if (!($sql = $db_conn->prepare("UPDATE users SET user_pwd = :pwd WHERE user_uid = :user_uid"))) {
                            header("Location: ../php/update_acc.php?error=sqlerror");
                            exit();
                        } else {
                            $hashPwd = password_hash($new_pwd, PASSWORD_DEFAULT);
                            // echo $hashPwd;
                            $sql->bindParam(':user_uid', $username);
                            $sql->bindParam(':pwd', $hashPwd);
                            $sql->execute();
                            $update = $sql->rowCount();
                            if ($update) {
                                header("Location: ../php/update_acc.php?error=success");
                                exit();
                            } else {
                                header("Location: ../php/update_acc.php?pwdChange=error");
                                exit();
                            }
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
            $sql = null;
            $db_conn = null;
    } else {
        header("Location: ../php/update_acc.php");
        exit();
    }