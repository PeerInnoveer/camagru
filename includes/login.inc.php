<?php

require 'dbh.inc.php';


try {
    if (isset($_POST['login-submit'])) {
        $uid = $_POST['username'];
        $pwd = $_POST['pwd'];
        
        if (empty($uid) || empty($pwd)) {
            header("Location: ../php/signup.php?error=emptyfields");
            exit();
    } else {
        $query = "SELECT * FROM users WHERE user_uid = :username AND user_pwd = :pwd AND verified=1";
        $stmt = $db_conn->prepare($query);
        $stmt->execute(
            array(
                'user_uid' => $_POST["username"],
                'user_pwd' => $_POST["pwd"],
            )
        );
        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION["username"] = $_POST["username"];
            header ("Location: ../php/index.php?login=success");
        }
        else {
            header("Location: ../php/signup.php?error=wrong_pwd");
            exit();
        }
    }
}
} catch (PDOexception $e) {
    echo $e->getMessage();
}