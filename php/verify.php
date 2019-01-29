<?php

require '../includes/dbh.inc.php';

if (isset($_GET['vkey'])) {
    //Process Verification
    $vkey = $_GET['vkey'];
    //$db_conn= new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);

    $resultSet = $db_conn->query("SELECT verified, vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if (sizeof($resultSet) == 1) {
        //Validate The email
        $update = $db_conn->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if ($update) {
            header("Location:signup.php?success=you_may_login");
        } else {
            echo "error";
        }
} else {
    die ("Something went wrong");
}
}
?>