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
            $sql = $db_conn->prepare("SELECT `image`, `image_id`, `u_name` FROM images");
            $sql->execute();
            $result = $sql->fetchAll();
            foreach($result as $image)
            if ($_SESSION['userUid'] == ($image['u_name'])) {
                $sql = $db_conn->prepare("SELECT * FROM likes WHERE image_id = ".$image['image_id']);
                $sql->execute();
                $likeresult = $sql->fetchAll();
                $num_likes = count($likeresult);

                $sql = $db_conn->prepare("SELECT * FROM comments WHERE image_id = ".$image['image_id']);
                $sql->execute();
                $commentresult = $sql->fetchAll();
                
                    echo '<article>
                        <header class="ppun">
                            <div class="unpp">
                            </div>
                        </header>
                            <div class="image_container"><img class="images" src="'.$image['image'].'"/>
                                <div class="button_container">
                                    <form action="../includes/del_like_com.inc.php" method="POST">
                                        <button class="delBut" type="submit" name="photoDel" value="'.$image['image_id'].'"><i class=" delB far fa-trash-alt"></i></button>
                                        <button class="likeBut" type="submit" name="like"><i class=" likeB far fa-heart"></i></button>
                                        <button class="commentBut" type="submit" name="com"><i class=" commentB far fa-comment"></i></button>
                                        <div class="likes">
                                            <p>Likes:'.$num_likes.'</p>
                                        </div>
                                        <input type="hidden" name="image_id" value="'.$image['image_id'].'">
                                        <input type="hidden" name="user_id" value="'.$_SESSION['userId'].'">
                                        <section>
                                            <textarea aria-label="Add a comment" class="tacn" name="add_com" id="comment" placeholder="Add comment..."></textarea>
                                                <div class="com_receive">';
                                                    foreach($commentresult as $comment)
                                                        echo $comment['comment']."<br>";
                                        echo    '</div>
                                        </section>
                                    </form>
                                </div>
                            </div>
                    </article>';
                } else {
                    echo '<article>
                        <header class="ppun"></header>
                            <div class="image_container"><img class="images" src="'.$image['image'].'"/>
                                <div class="button_container">
                                    <form action="../includes/del_like_com.inc.php" method="POST">
                                        <button class="likeBut" type="submit" name="like_button"><i class=" likeB far fa-heart"></i></button>
                                        <button class="commentBut" type="submit" name="com_button"><i class=" commentB far fa-comment"></i></button>
                                    </form>
                                    <section class="cmsc">
                                        <textarea aria-label="Add a comment" class="tacn" name="add_com" id="comment" placeholder="Add comment..."></textarea>
                                    </section>
                                </div>
                            </div>
                    </article>';
                }
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
        $db_conn = null;
        $sql = null;
        ?>
    </div>
</div>
<?php
    
    if (isset($_GET['del'])) {
        if ($_GET["del"] == "success") {
            echo '<p style="text-align: center; color: green;">Image Was Deleted!</p>';
        }
    }

?>

<?php
    require 'footer.php';
?>

</body>