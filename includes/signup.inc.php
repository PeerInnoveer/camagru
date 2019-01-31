<?php
    
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $Pwd = $_POST['pwd'];
    $Pwd_confirm = $_POST['pwd-confirm'];
    
    
    //Error Handlers
    if (empty($username) || empty($email) || empty($Pwd) || empty($Pwd_confirm)) {
        header("Location: ../php/signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9-]*$/", $username)) {
        header("Location: ../php/signup.php?error=invalidmail&uid=");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../php/signup.php?error=invalidmail&uid=".$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9-' ']*$/", $username)) {
        header("Location: ../php/signup.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($Pwd !== $Pwd_confirm) {
        header("Location: ../php/signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
        exit();
    //} else if ((strlen($Pwd) < 6) || (strlen($Pwd) > 12) || (preg_match("/[A-Z]/", $Pwd)=== 0)) {
        //header("Location: ../php/signup.php?error=bad_pwd&uid=".$username."&mail=".$email);
       // exit();
    } else if (strlen($username) < 5 ) {
        header("Location: ../php/signup.php?errorUid=usernameShort&mail=".$email);
        exit();
    } try {
        //Check if username exists.
        if (!($stmt = $db_conn->prepare("SELECT user_uid FROM users WHERE user_uid = :u_name"))) {
            header("Location: ../php/signup.php?error=sqlerror");
            exit();
        } else {
            $stmt->bindParam(':u_name', $username);
            $stmt->execute();
        } if ($stmt->rowCount() > 0) {
            header("Location: ../php/signup.php?error=usertaken&mail=".$email);
            exit();
        } else  {
            //Generate vkey
            $vkey = hash('sha256', $username);
            $hashedPwd = password_hash($Pwd, PASSWORD_DEFAULT);
            $stmt = $db_conn->prepare("INSERT INTO users (user_uid, user_email, user_pwd, vkey) VALUES (:username, :email, :Pwd, :vkey)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':Pwd', $hashedPwd);
                $stmt->bindParam(':vkey', $vkey);

                $stmt->execute();
                //Send email
                $mail = file_get_contents('../php/mail.php');
                $link = "Please click on the link to verify your Registration: http://localhost:8080/camagru/php/verify.php?vkey=$vkey";
                    
                    $to = $email;
                    $subject = "Email Verification";
                    $message = $link;
                    
                    //$headers = "From: peerinnoveergmail.com \r\n";
                    $headers = "MiME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    
                    mail($to, $subject, $message, $headers);
                    header("Location: ../php/signup.php?verified=check_email");
                }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    $stmt = null;
    $db_conn = null;
} else {
    header("Location: ../php/signup.php");
}
