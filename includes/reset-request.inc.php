<?php

if (isset($_POST["reset-request-submit"])) {
    
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "http://localhost:8080/camagru/php/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);
    
    $expires = date("U") + 1800;
    
    require 'dbh.inc.php';
    
    $userEmail = $_POST["email"];

    if (!($stmt = $db_conn->prepare("DELETE FROM pwdReset WHERE pwdResetEmail = :p_reset;"))) {
        header("Location: ../php/reset-password.php?error=sqlerror");
        exit();
    } else {
        $stmt->bindParam(':p_reset', $userEmail);
        $stmt->execute();
        
        if (!($stmt = $db_conn->prepare("INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (:ue, :s, :ht, :ex);"))) {
            header("Location: ../php/reset-password.php?error=sqlerror2");
            exit();
        } else {
            $hashedToken = password_hash($token, PASSWORD_DEFAULT);
            $stmt->bindParam(':ue', $userEmail);
            $stmt->bindParam(':s', $selector);
            $stmt->bindParam(':ht', $hashedToken);
            $stmt->bindParam(':ex', $expires);
            $stmt->execute();
        }

            $stmt = null;
            $db_conn = null;

            $mail = file_get_contents('../php/pwdreset.html');
            //$link = "http://localhost:8080/camagru/php/verify.php?vkey=$vkey";
    
            $to = $userEmail;
            $subject = 'Reset your password for camguru';
    
            //$mail = '<a href="' . $url . '">' . $url . '</a></p>';
            $message = $mail;
            $message .= '<p>Here is your password reset link: </br>';
            $message .= '<a href="' . $url . '">' . $url . '</a></p>';

            //$headers = "FROM: Camguru Team <peerinnoveer@gmail.com>\r\n";
            $headers = "Reply-To: peerinnoveer@gmail.com\r\n";
            $headers .= "Content-type: text/html\r\n";

            mail($to, $subject, $message, $headers);

            header("Location: ../php/reset-password.php?reset=success");
    }
} else {
    header("Location: ../php/index.php");
}