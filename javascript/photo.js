(function() {
    var video = document.getElementById('video'),
    canvas = document.getElementById('canvas'),
    photo = document.getElementById('photo'),
    context = canvas.getContext('2d'),
    vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia =    navigator.getUserMedia ||
                            navigator.webkitGetUserMedia ||
                            navigator.mozGetUserMedia ||
                            navigator.msGetUserMedia; 
        navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function(error) {

    });
    //Capturing image by drawing from video on to canvas.
    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 400, 300);
        photo.setAttribute('src', canvas.toDataURL('image/png'))
    });
    document.getElementById('upload').addEventListener('click', function() {
        var picture = (encodeURIComponent(JSON.stringify(photo.src)));
        var hr = new XMLHttpRequest();
        var url = "../includes/photo.inc.php";
        var id = '<?php echo ($_SESSION["userUid"]); ?>'; // find username
        var vars = "userUid="+id+"&picture="+picture;
        hr.open("POST", url, true);
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        hr.onreadystatechange = function(){
            if (hr.readyState == 4 && hr.status == 200){
                var return_data = hr.responseText;
                document.getElementById("status").innerHTML = return_data;
            }
        }
        hr.send(vars);
    });
})();