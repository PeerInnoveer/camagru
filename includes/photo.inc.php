<?php
session_start();

require 'dbh.inc.php';

//require 'dbh.inc.php';

//Receiving picture id from AJAX, and inserting image into database.
if ((isset($_SESSION['userUid'])) && (isset($_POST['picture']))) {
    $username = "'".$_SESSION['userUid']."'";
    $picture = $_POST['picture'];
    $description = '"Hello"';
    $like_count = 5;
    
    try {
    $db_conn= new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    // set the PDO error mode to exception
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO images (`image`, `u_name`, `description`, `like_count`) VALUES ($picture, $username, $description, $like_count)";
    // echo $sql;
    $db_conn->exec($sql);
    
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    if ($sql) {
        echo ("Image saved, Yeahh booooiii!!");
    }
$db_conn = null;
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