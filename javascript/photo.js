(function() {
    var video = document.getElementById('video'),
    // filters = document.getElementById('filters'),
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
        audio: false,
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function(error) {

    });
    // Capturing image by drawing from video on to canvas.
    document.getElementById('capture').addEventListener('click', function() {
        context.drawImage(video, 0, 0, 400, 300);
        //photo.setAttribute('src', canvas.toDataURL('image/png'))
    });
    document.getElementById('save').addEventListener('click', function() {
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
    // Adding filter to canvas.
    function chooseimg(){
        var choose = document.querySelectorAll(".filter1, .filter2, .filter3, .filter4");
    
        choose.forEach(function(element){
            element.addEventListener("click",function(){
                img = element;
            if (img){
                if (img.src === "http://localhost:8080/camagru/img/filters/AbstractBorder.png") {
                    context.drawImage(img, 0, 0, 400, 350)
                }
                else if (img.src === "http://localhost:8080/camagru/img/filters/fire_stash.png") {
                    context.drawImage(img, 130, 100, 150, 120)
                }
                else if (img.src === "http://localhost:8080/camagru/img/filters/FlowerBorder.png") {
                    context.drawImage(img, 0, 0, 400, 300)
                }
                else if (img.src === "http://localhost:8080/camagru/img/filters/sweet_jesus.png") {
                    context.drawImage(img, 60, 8, 300, 300)
                }
                //context.drawImage(img, 0, 0, 300, 300);
                var dataURL = canvas.toDataURL('image/png');
                //document.getElementById("src").value = dataURL;
                //console.log(document.getElementById("src").value);
                photo.setAttribute('src', canvas.toDataURL('image/png'))
            }
        });
    });}
    chooseimg();
})();