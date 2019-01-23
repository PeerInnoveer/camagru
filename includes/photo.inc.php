<?php

require 'dbh.inc.php';

if (isset($_POST['user_uid'])) {
    
    $picture = $_POST['picture'];
    $resultSet = $conn->query("INSERT INTO images WHERE 'image'");
}