
<!-- Delete of images. -->

<?php
    require 'dbh.inc.php';
    print_r($_POST);
    if (isset($_POST['photoDel'])) {
        
        $image_id = $_POST['photoDel'];
        
        try {
            if (!($sql = $db_conn->prepare("DELETE FROM images WHERE image_id = :id"))) {
                header("Location: ../php/index.php?error=sqlerror");
                exit();
            } else {
                $sql->bindParam(':id', $image_id);
                $sql->execute();
            
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        header("Location: ../php/index.php?del=success");
        exit();
    
    // like of images.
    } else if (isset($_POST['like'])) {
        try {
            if (!($sql = $db_conn->prepare("INSERT INTO `likes`(`user_id`, `image_id`) VALUES (:user_id, :image_id)"))) {
                header("Location: ../php/index.php?error=sqlerror");
                exit();
            } else {
                $sql->bindParam(':user_id', $_POST['user_id']);
                $sql->bindParam(':image_id', $_POST['image_id']);
                $sql->execute();
            
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        header("Location: ../php/index.php");
        exit();
    
    // Comment on image or photo.
    } else if (isset($_POST['com'])) {

        // $comment = addslashes($_POST['add_com']);
        $comment = $_POST['add_com'];

            if ($comment != htmlspecialchars($_POST['add_com'])) {
                header("Location: ../php/index.php?error=NiceTry");
                exit();
            }
        try {
            if (!($sql = $db_conn->prepare("INSERT INTO `comments`(`comment`, `image_id`, `user_id`) VALUES(:com, :imgId, :userId)"))) {
                header("Location: ../php/index.php?error=sqlerror");
                exit();
            } else {
                $sql->bindParam(':com', $comment);
                $sql->bindParam(':imgId', $_POST['image_id']);
                $sql->bindParam(':userId', $_POST['user_id']);
                $sql->execute();
                header("Location: ../php/index.php?comAdd=success");
                exit();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } else {
        header("Location: ../php/index.php?fail=yes");
        exit();
}