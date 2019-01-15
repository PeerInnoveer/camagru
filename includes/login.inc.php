<?php

if (isset($_POST['login-submit'])) {

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: ../php/signup.php?error=emptyfields");
        exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE user_uid=? OR user_email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['user_pwd']);
                if ($pwdCheck == false) {
                    header("Location: ../php/signup.php?error=wrong_pwd");
                    exit();
                }
                else if ($pwdCheck == true) {
                   session_start();
                   $_SESSION['userId'] = $row['user_id'];
                   $_SESSION['userUid'] = $row['user_uid'];

                   header("Location: ../php/index.php?login=success");
                    exit();
                }
                else {
                    header("Location: ../php/signup.php?error=wrong_pwd");
                    exit();
                }
            }
            else {
                header("Location: ../php/signup.php?error=no_user");
                exit();
            }
        }
    }
}
else {
    header("Location: ../php/signup.php");
    exit();
}