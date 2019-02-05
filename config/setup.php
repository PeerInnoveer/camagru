<?php

require 'database.php';

try {
    $db_conn= new PDO("mysql:host=$db_host", $db_user, $db_pass);
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
                    `user_pwd` varchar(255) NOT NULL,
                    `vkey` varchar(255),
                    `verified` tinyint(1),
                    `createdate` timestamp(6)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                CREATE TABLE `pwdreset` (
                    `pwdResetId` int(11) NOT NULL,
                    `pwdResetEmail` TEXT NOT NULL,
                    `pwdResetSelector` TEXT NOT NULL,
                    `pwdResetToken` LONGTEXT NOT NULL,
                    `pwdResetExpires` TEXT NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                CREATE TABLE `images` (
                    `image_id` int(11) NOT NULL,
                    `image` LONGTEXT NOT NULL,
                    `u_name` varchar(255) NOT NULL,
                    `description` varchar(255) NOT NULL,
                    `like_count` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                CREATE TABLE `comments` (
                    `comment_id` int(11) NOT NULL,
                    `comment` longtext NOT NULL,
                    `image_id` int(11) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;
                
                ALTER TABLE `users` ADD PRIMARY KEY (`user_id`);
                ALTER TABLE `pwdReset` ADD PRIMARY KEY (`pwdResetId`);
				ALTER TABLE `images` ADD PRIMARY KEY (`image_id`);
                ALTER TABLE `comments` ADD PRIMARY KEY (`comment_id`);
                
                ALTER TABLE `users` MODIFY `user_id` int(11) AUTO_INCREMENT;
                ALTER TABLE `pwdReset` MODIFY `pwdResetId` int(11) AUTO_INCREMENT;
				ALTER TABLE `images` MODIFY `image_id` int(11) AUTO_INCREMENT;
                ALTER TABLE `comments` MODIFY `comment_id` int(11) AUTO_INCREMENT;";
    $db_conn->exec($sql);
    }
catch(PDOException $e)
    {
    echo $e->getMessage();
    die();
    }
    header("Location: ../php/signup.php");
?>