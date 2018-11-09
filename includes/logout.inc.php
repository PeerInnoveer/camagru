<?php

if (isset($_POST['signup-submit'])) {
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../signup.php");
    exit();
}