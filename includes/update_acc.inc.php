<?php
    
    session_start();
    //
    // Update Username
    //

    if (isset($_POST['update-submit-uid'])) {
        
        require 'dbh.inc.php';
        
        $u_name = $_POST['username'];
        $c_uname = $_SESSION['userUid'];
    
    try {
        
        if ($u_name != htmlspecialchars($_POST['username'])) {
            header("Location: ../php/update_acc.php?error=NiceTry");
            exit();
        }
        if (empty($u_name)) {
            header("Location: ../php/update_acc.php?error=emptyfield#openForm1");
            exit();
        }
        if (!($sql = $db_conn->prepare("UPDATE users SET user_uid = :new_user WHERE user_uid = :user_uid"))) {
            header("Location: ../update_acc.php?error=sqlerror");
            exit();
        } else {
            $sql->bindParam(':user_uid', $c_uname);
            $sql->bindParam(':new_user', $u_name);
            $sql->execute();
            $_SESSION["userUid"] = $u_name;
            header("Location: ../php/update_acc.php");
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
        $db_conn = null;
        $sql = null;
    } else {
        header("Location: ../php/update_acc.php");
        exit();
    }