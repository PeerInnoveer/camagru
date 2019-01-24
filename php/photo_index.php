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
            <video id="video" class="video_class"></video>
                <canvas id="canvas" class="canvas_class" width="400" height="300"></canvas>
                <img id="photo" class="photo_class" width="400" height="300">
        </div>
        <br>
            <div class="capture_button">
                <a href="#" id="capture" class="booth-capture-button"><i class="cam_icon fa fa-camera-retro"></i></a>
            </div>
            <div class="button_booth">
                <button class="back-button"><a class="b1_style" href="index.php"><i class="back_icon fas fa-arrow-circle-left"></i></a></button>
                <button id="upload" class="upload"><a href="#"><i class="upload_icon fas fa-upload"></i></a></button>
                <button class="set_as_p"><a class="set_pic" href="#"><i class="set_as_p_icon far fa-user-circle"></i></a></button>
                <button class="filters"><a class="filters" href="#"><i class="filter_icon fas fa-filter"></i></a> </button>
            </div>
        <script src="../javascript/photo.js"></script>
        <div id="status"></div>
    </body>
</html>