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
            $db_conn= new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
            // set the PDO error mode to exception
            $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT images.image FROM images";
            // echo $sql;
            if ( $db_conn->exec($sql)){
                var_dump( 'CLick' );
            }
            
            } catch(PDOException $e)
            {
                echo 'II  ' . $e->getMessage();
            }
           
        $db_conn = null;
        ?>
    </div>
</div>

<?php
    require 'footer.php';
?>

</body>