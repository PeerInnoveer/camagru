<?php
session_start();

require 'dbh.inc.php';

//Receiving picture id from AJAX, and inserting image into database.
if ((isset($_SESSION['userUid'])) && (isset($_POST['picture']))) {
    $username = "'".$_SESSION['userUid']."'";
    $picture = $_POST['picture'];
    $description = '"Hello"';
    
    try {
    $sql = "INSERT INTO images (`image`, `u_name`, `description`) VALUES ($picture, $username, $description)";
    $db_conn->exec($sql);
    
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    $db_conn = null;
    $sql = null;
}

/*//Receiving propic id from AJAX and setting it into database profile pic, still need to fetch form database and display it in <img tag.
if ((isset($_SESSION['userUid'])) && (isset($_POST['propic']))) {
    $username = "'".$_SESSION['userUid']."'";
    $picture = $_POST['propic'];

    try {
        $sql = "INSERT INTO images (`profile_pic`, `u_name`) VALUES ($profilePic, $username)";
        $db_conn->exec($sql);

    } catch (PDOException $e) {
        $e->getMessage();
    }
$db_conn = null;
}*/