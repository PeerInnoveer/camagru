<?php
    session_start();

    if (isset($_POST['photoDel'])) {

        require 'dbh.inc.php';

        $image_id = $_POST['image_id'];
        
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
} else {
    header("Location: ../php/index.php");
    exit();
}

?>

<!-- Liking of image -->
<?php

?>

<!-- Adding a comment to image -->
<?php

?>