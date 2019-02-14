<!DOCTYPE html>

<?php
    session_start();
    //require 'header.php';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="../stylesheets/photo.css">
    </head>
    <body>
        <div class="booth">
            <div id="video_overlays" src="..">
                <!-- <div style="position: absolute"><img src="http://localhost:8080/camagru/img/filters/fire_stash.png">
                </div> -->
                <video id="video" class="video_class"></video>
                <canvas id="canvas" class="canvas_class" width="400" height="300"></canvas>
                <img id="photo" class="photo_class" width="400" height="300">
            </div>
        </div>
            <div class="capture_div">
                <a href="#" id="capture" class="booth-capture-button"><i class="cam_icon_button fa fa-camera-retro"></i></a>
            </div>
            <div class="button_booth">
                <input type="hidden" name="uid" value="<?php echo($_SESSION['userUid'])?>">
                <button class="back-button"><a class="b1_style" href="index.php"><i class="back_icon fas fa-arrow-circle-left"></i></a></button>
                <button id="save" class="save_img"><a href="#"><i class="save_image far fa-save"></i></a></button>
                <button class="filters"><a class="filters" href="#"><i class="filter_icon fas fa-filter"></i></a></button>
                <!-- <div class="uploadImage"> -->
                    <form action="../includes/upload.inc.php" method="POST" enctype="multipart/form-data">
                        <button type="submit" name="upload" class="upload">Upload Image</button>
                        <input type="file" name="file">
                    </form>
            </div>
                <!-- </div> -->
            <div class="filters_box">
                <img class="filter1" src="http://localhost:8080/camagru/img/filters/AbstractBorder.png">
                <img class="filter2" src="http://localhost:8080/camagru/img/filters/fire_stash.png">
                <img class="filter3" src="http://localhost:8080/camagru/img/filters/FlowerBorder.png">
                <img class="filter4" src="http://localhost:8080/camagru/img/filters/sweet_jesus.png">
            </div>
        <script src="../javascript/photo.js"></script>
        <div id="status"></div>
    </body>
</html>