<?php
    
    session_start();
    //
    // Update Username
    //

    if (isset($_POST['update-submit-uid'])) {
        
        require 'dbh.inc.php';
        
        $u_name = $_POST['username'];
        $c_uname = $_SESSION['userUid'];

        if ($u_name != htmlspecialchars($_POST['username'])) {
            header("Location: ../php/update_acc.php?error=NiceTry");
            exit();
        }
        if (empty($u_name)) {
            header("Location: ../php/update_acc.php?error=emptyfield#openForm1");
            exit();
        } else if (!($sql = $db_conn->prepare("UPDATE users SET user_uid = :new_user WHERE user_uid = :user_uid"))) {
            header("Location: ../update_acc.php?error=sqlerror");
            exit();
        } else {
            $sql->bindParam(':user_uid', $c_uname);
            $sql->bindParam(':new_user', $u_name);
            $sql->execute();
            $_SESSION["userUid"] = $u_name;
            header("Location: ../php/update_acc.php");
        }

        $db_conn = null;
        $sql = null;
    } else {
        header("Location: ../php/update_acc.php");
        exit();
    }

    //
    // Update Passwords
    //

    if (isset($_POST['update-submit-pwd'])) {
        
        require 'dbh.inc.php';
        
        $username = $_POST['uid'];
        $new_pwd = $_POST['new_pwd'];
        $re_new = $_POST['re_new_pwd'];
        $curr_pwd = $_POST['curr_pwd'];

        if ($username != htmlspecialchars($_POST['uid']) || $new_pwd != htmlspecialchars($_POST['new_pwd']) || $re_new != htmlspecialchars($_POST['re_new_pwd']) || $curr_pwd != htmlspecialchars($_POST['curr-pwd'])) {
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
        } 
        try {
            
            if (!($sql = $db->prepare("SELECT * FROM users WHERE user_uid = :user_uid"))) {
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
                        if (!($sql = $db_conn->prepare("UPDATE users SET user_pwd = :pwd"))) {
                            header("Location: ../php/update_acc.php?error=sqlerror");
                            exit();
                        } else {
                            $hashPwd = password_hash($new_pwd, PASSWORD_DEFAULT);
                            $sql->execute([':pwd' => $hashPwd]);
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