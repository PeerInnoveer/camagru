
<!-- Delete of images. -->

<?php
    require 'dbh.inc.php';
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

        header("Location: ../php/index.php?user=".$_POST['user_id']."&img=".$_POST['image_id']);
        exit();
    
    // Comment on image or photo.
    } else if (isset($_POST['com'])) {
        
    } else {
        header("Location: ../php/index.php?fail=yes");
        exit();
}