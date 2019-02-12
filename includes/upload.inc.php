<?php
    if (isset($_POST['upload'])) {
        $file = $_FILES['file'];

        $fileName = $_FILES['files']['name'];
        $fileTmp = $_FILES['files']['tmp_name'];
        $fileSize = $_FILES['files']['size'];
        $fileError = $_FILES['files']['error'];
        $fileType = $_FILES['files']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    header("Location: ../php/index.php");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";    
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    }