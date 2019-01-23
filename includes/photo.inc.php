<?php

require 'dbh.inc.php';

if ((isset($_POST['user_uid'])) && (isset($_POST['picture']))) {
    
    $username = $_POST['user_uid'];
    $picture = $_POST['picture'];
    
    //To do: bind paramaters, prepare statement and execute.
    $resultSet = $conn->query("INSERT INTO images WHERE 'image'");
}