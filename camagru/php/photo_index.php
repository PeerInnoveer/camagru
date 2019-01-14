<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>

        <link rel="stylesheet" href="../stylesheets/photo.css">
    </head>
    <body>
        <div class="booth">
         <video id="video" width="400" height="300"></video>
            <a href="#" id="capture" class="booth-capture-button"
                style="display: block;
                        margin: -4px 0px 0px 0px;
                        padding: 10px 20px;
                        background-color: cornflowerblue;
                        color: #fff;
                        text-align: center;
                        text-decoration: none;
                    ">Take photo</a>
                    <canvas id="canvas" width="400" height="300"></canvas>
        </div>
            <button class="back-button"
            style="
                    width: 85px;
                    height: 35px;
                    border-radius: 4px;
                    background-color: #f2f2f2;
                    "> <a href="index.php" style="text-decoration: none;
                    font-family: arial;
                    color: blue;">Back</a> </button>
        <script src="../javascript/photo.js"></script>
    </body>
</html>