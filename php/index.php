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

            foreach($result as $image)
                echo '<div class="image_container"><img class="images" src="'.$image[0].'"/>
                        <div class="button_container">
                            <form action="../includes/del_like_com.inc.php" method="POST">
                                <button class="delBut" type="submit" name="photoDel"><i class="delB fas fa-trash-alt"></i></button>
                                <button class="likeBut" type="submit" name="like_button"><i class=" likeB fas fa-thumbs-up"></i></button>
                                <button class="commentBut" type="submit" name="com_button"><i class=" commentB fas fa-comments"></i></button>
                            </form>
                        </div>
                    </div>';
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