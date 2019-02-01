<!DOCTYPE html>

<?php
    require 'header.php';
    require '../includes/dbh.inc.php';
?>

<!-- Main content -->
<div class="main-content">
    <!-- gallery of photos -->
    <div class="gallery">
        <?php
           try {
            $sql = $db_conn->prepare("SELECT `image` FROM images");
            $sql->execute();
            $result = $sql->fetchAll();
            //print_r($result);
            foreach($result as $image)
                echo '<img class="images" src="'.$image[0].'"/>';
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $db_conn = null;
        $sql = null;
        ?>
    </div>
</div>

<?php
    require 'footer.php';
?>

</body>