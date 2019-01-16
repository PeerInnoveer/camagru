<?php

require '../includes/dbh.inc.php';

if (isset($_GET['vkey'])) {
    //Process Verification
    $vkey = $_GET['vkey'];
    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    $resultSet = $conn->query("SELECT verified, vkey FROM users WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");

    if (sizeof($resultSet) == 1) {
        //Validate The email
        $update = $conn->query("UPDATE users SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

        if ($update) {
            header("Location:signup.php?success=you_may_login");
            echo "Your account has been verified. You may now login.";
        } else {
            echo "error";
        }
} else {
    die ("Something went wrong");
}
}

?>