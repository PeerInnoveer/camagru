<?php
session_start();
require '../config/database.php';

//require 'dbh.inc.php';

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
    
    } catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    if ($sql) {
        echo ("Image saved, Yeahh booooiii!!");
    }
$db_conn = null;
}