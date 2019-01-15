<?php

if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $password_confirm = $_POST['pwd-confirm'];
    
    //_______Error Handlers
    if (empty($username) || empty($email) || empty($password) || empty($password_confirm)) {
        header("Location: ../php/signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9-]*$/", $username)) {
        header("Location: ../php/signup.php?error=invalidmail&uid=");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../php/signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9-]*$/", $username)) {
        header("Location: ../php/signup.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($password !== $password_confirm) {
        header("Location: ../php/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
<<<<<<< HEAD
        exit();
    } else if (strlen($username) < 5 ) {
        header("Location: ../php/signup.php?error=username_<_5="."&mail=".$email);
=======
<<<<<<< HEAD
        exit();
    } else if (strlen($username) < 5 ) {
        header("Location: ../php/signup.php?error=username_<_5="."&mail=".$email);
=======
>>>>>>> 7f3a1f05b148bb3c6c1562d50d8e45b5d90fa4d8
>>>>>>> c7fbdb6f4c53a5e5b77629721a5ae422f7cc3ebf
        exit();
    }
    //_______End of Error Handlers
    else {
        $sql = "SELECT user_uid FROM users WHERE user_uid=?";
        $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../php/signup.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
<<<<<<< HEAD
        if ($resultCheck > 0) {
<<<<<<< HEAD
=======
=======
        if ($results > 0) {
>>>>>>> 7f3a1f05b148bb3c6c1562d50d8e45b5d90fa4d8
>>>>>>> c7fbdb6f4c53a5e5b77629721a5ae422f7cc3ebf
            header("Location: ../php/signup.php?error=usertaken&mail=".$email);
            exit();
    } else {
        //Generate vkey
        $vkey = md5(time(). $username);
        $sql = "INSERT INTO users (user_uid, user_email, user_pwd, vkey) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../php/signup.php?error=sqlerror");
            exit();
    } else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
<<<<<<< HEAD
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vkey);
        mysqli_stmt_execute($stmt);
        //Send email
        $to = $email;
        $subject = "Email Verification";
        $message = "<a href='http://localhost:8080/camagru/php/verify.php?vkey=$vkey'>Register Account</a>";
        
        //$headers = "From: peerinnoveergmail.com \r\n";
        $headers = "MiME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to, $subject, $message, $headers);
        header("Location: ../php/signup.php?verified=check_email");
=======
<<<<<<< HEAD
        mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vkey);
        mysqli_stmt_execute($stmt);
        //Send email
        $to = $email;
        $subject = "Email Verification";
        $message = "<a href='http://localhost:8080/camagru/php/verify.php?vkey=$vkey'>Register Account</a>";
        
        //$headers = "From: peerinnoveergmail.com \r\n";
        $headers = "MiME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        mail($to, $subject, $message, $headers);
        header("Location: ../php/signup.php?verified=check_email");
=======
        
        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("Location: ../php/signup.php?signup=success");
>>>>>>> 7f3a1f05b148bb3c6c1562d50d8e45b5d90fa4d8
>>>>>>> c7fbdb6f4c53a5e5b77629721a5ae422f7cc3ebf
        exit();
        header("Location: ../php/signup.php?verified=login");
        }
    }
    }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../php/signup.php");
}