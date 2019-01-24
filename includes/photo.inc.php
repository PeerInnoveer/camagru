<?php
session_start();
require 'dbh.inc.php';

if ((isset($_POST['userUid'])) && (isset($_POST['picture']))) {
    $username = $_SESSION['userUid'];
    $picture = $_POST['picture'];
    echo($_SESSION['userUid']);
    
    $sql = "INSERT INTO images (`image`, `user_id`) VALUES (picture, userId)";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);
}