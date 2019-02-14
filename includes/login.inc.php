<?php

if (isset($_POST['login-submit'])) {
    
    require 'dbh.inc.php';
    
    $uid = $_POST['username'];
    $password = $_POST['pwd'];
    
    try {
	    if ($uid != htmlspecialchars($_POST['username']) || $password != htmlspecialchars($_POST['pwd'])) {
            header("Location: ../php/signup.php?error=nice_try");
	        exit();
        } else if (empty($uid) || empty($password)) {
		    header("Location: ../php/signup.php?error=emptyfields");
		    exit();
	    } else {
            if (!($stmt = $db_conn->prepare("SELECT * FROM users WHERE user_uid = :un"))) {
                header("Location: ../php/signup.php?error=sqlerror");
                exit();
            } else {
                $stmt->bindParam(':un', $uid);
                $stmt->execute();
                if ($row = $stmt->fetch()) {
                    $pwdCheck = password_verify($password, $row['user_pwd']);
				    if ($pwdCheck == false) {
					    header("Location: ../php/signup.php?error=wrongpwd1");
					    exit();
				    } else if ($row['verified'] == NULL) {
					    header("Location: ../php/signup.php?error=notverified");
					    exit();
				    } else if ($pwdCheck == true) {
					    session_start();
					    $_SESSION['userId'] = $row['user_id'];
						$_SESSION['userUid'] = $row['user_uid'];
						$_SESSION['userEmail'] = $row['user_email'];
					    header("Location: ../php/index.php?login=success");
					    exit();
				} else {
					header("Location: ../php/signup.php?error=wrongpwd2");
					exit();
				}
			} else {
				header("Location: ../php/signup.php?error=nouser");
            	exit();
			}
		}
    }
    } catch (PDOException $e) {
        echo $e->getmessage();
    }
	$stmt = null;
	$db_conn = null;
} else {
	header("Location: ../php/index.php");
	exit();
}