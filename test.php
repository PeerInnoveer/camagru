<?php

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "cheerio";
$dbName = "camagru";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<script> console.log('Connected To DB successfully');</script>";
    }

    catch(PDOException $e) {
    echo "<script> console.log('ERROR Conecting to DB');</script>";
    }
    try {
       $stmt = $conn->prepare("SELECT * FROM `camagru`.`users`");
       $stmt->execute();
       while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $var[] = $row;
        print_r ($var);
        }
        echo "<br><br>";
        echo $stmt->rowcount();
        echo "<br><br>";
        for ($i = 0; $i < $stmt->rowcount();$i++) {
            print_r ($var[$i]["user_uid"]);
        
    }
    
    } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
    }    

?>



