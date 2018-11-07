<?php

include 'database.php';

try {
    $db_conn= new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
    // set the PDO error mode to exception
    $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS camagru";
    // use exec() because no results are returned
    $db_conn->exec($sql);
    $sql = "USE camagru;
                CREATE TABLE `users` (
                    `user_id` int(11) NOT NULL,
                    `user_uid` varchar(255) NOT NULL,
                    `user_email` varchar(255) NOT NULL,
                    `user_pwd` varchar(255) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                CREATE TABLE `images` (
                    `image_id` int(11) NOT NULL,
                    `name` varchar(255) NOT NULL,
                    `user_id` int(11) NOT NULL,
                    `like_count` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                CREATE TABLE `comments` (
                    `comment_id` int(11) NOT NULL,
                    `name` varchar(255) NOT NULL,
                    `content` longtext NOT NULL,
                    `image_id` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);
				ALTER TABLE `images` ADD PRIMARY KEY (`image_id`);
                ALTER TABLE `comments` ADD PRIMARY KEY (`comment_id`);
                ALTER TABLE `users` MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
				ALTER TABLE `images` MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
				ALTER TABLE `comments` MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;";
    $db_conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    die();
    }
    header("Location: ../signup.php");
?>