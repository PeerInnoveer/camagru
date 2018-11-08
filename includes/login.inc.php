<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd']; 

    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_uid=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit(); 
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
            mysqli_stmt_execute($stmt);
            $result = mysql_stmt_get_result($stmt);
            if ($row = mysql_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['user_pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrong_pwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                   session_start();
                   $_SESSION['userId'] = $row['user_id'];
                   $_SESSION['userUid'] = $row['user_uid'];

                   header("Location: ../index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../index.php?error=wrong_pwd");
                    exit();
                }
            }
            else {
                header("Location: ../index.php?error=no_user");
                exit();
            }
        }
    }

}
else {
    header("Location: ../index.php");
    exit();
}