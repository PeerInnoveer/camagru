<?php

    require 'dbh.inc.php';
    session_start();
    if (isset($_POST['upload'])) {
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
       
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $username = $_SESSION['userUid'];
        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    
                    $picture = 'data:image/png;base64,'.base64_encode(file_get_contents($fileTmpName));
                        
                    try {
                        if (!($sql = $db_conn->prepare("INSERT INTO images (`image`, `u_name`) VALUES (:pic, :u_name)"))) {
                            header("Location: ../php/photo_index.php?sql=error");
                            exit();
                        } else {
                            $sql->bindParam(':pic', $picture);
                            $sql->bindParam(':u_name', $username);
                            $sql->execute();
                            header("Location: ../php/photo_index.php?upload=success");
                            exit();
                        }
                    } catch(PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        }
    } else {
        echo "You cannot upload files of this type!";
}