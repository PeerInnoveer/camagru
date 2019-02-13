
<!-- Delete of images. -->

<?php
    if (isset($_POST['photoDel'])) {
        require 'dbh.inc.php';
        
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
    } else {
        header("Location: ../php/index.php");
        exit();
    }
    
    ?>

<!-- like of images. -->
<?php
    if (isset($_POST['like'])) {
        require 'dbh.inc.php';

        

    }
?>

<!-- Comment on image or photo. -->

<?php
    if (isset($_POST['com'])) {
        require 'dbh.inc.php';

    }
?>