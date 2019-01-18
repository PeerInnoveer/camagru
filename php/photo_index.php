<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <link rel="stylesheet" href="../stylesheets/photo.css">
    </head>
    <body>
        <div class="booth">
            <video id="video" class="video_class"></video>
                <a href="#" id="capture" class="booth-capture-button">Take photo</a>
                <canvas id="canvas" class="canvas_class" width="400" height="300"></canvas>
        </div>
        <br>
        <div class="button_booth">
                <button class="back-button"><a class="b1_style" href="index.php">Back</a> </button>
                <button class="upload"><a class="b2_style" href="#">Upload</a> </button>
                <button class="set_as_p"><a class="b3_style" href="#">Set as profile pic</a> </button>
                <button class="filters"><a class="b4_style" href="#">Filters/stickers</a> </button>
            </div>
        <script src="../javascript/photo.js"></script>
    </body>
</html>