<?php
    session_start();
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>CamGuru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../stylesheets/styles.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../stylesheets/profile.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="../stylesheets/photo.css"/>
</head>
<body>
<header>
    <nav>
        <div class="navbar">
            <?php
                if (isset($_SESSION['userUid'])) {
                    echo '<div class="navbar-logo">
                    <a href="index.php"><strong>CamGuru</strong></a>
                    <a href="signup.php"><i class="camlogo fas fa-camera"></i></a>
                    </div>';
                } else echo '<div class="navbar-logo">
                <a href="signup.php"><strong>CamGuru</strong></a>
                <a href="signup.php"><i class="camlogo fas fa-camera"></i></a>
                </div>';
            ?>
            <ul class="nav-items"> <!-- floasts to right -->
                <li>
                    <div class="nav-login">
                    <?php
                        if (isset($_SESSION['userUid'])) {
                            echo '<div class="dropdown">
                                    <a href="#"><i class="settings_icon fas fa-cog"></i></a>
                                    <div class="dropdown-content">
                                        <form action="../includes/logout.inc.php" method="POST">
                                            <button class="btn" type="submit" name="logout-submit">Logout</button>
                                        </form>
                                    </div>
                                </div>';

                            echo '<li><a class="username_style" href="profile.php">'.$_SESSION["userUid"].'</a></li>
                            <li><a href="photo_index.php"><i class="cam_icon fa fa-camera-retro"></i></a></li>';
                        } else {
                            echo '<form class="login-form" action="../includes/login.inc.php" method="POST">
                            <input type="text" name="username" placeholder="Username">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="login-submit">Login</button>
                            </form>';
                            //header("Location: ../includes/signup.inc.php");
                        }
                    ?>
                    </div>
                </li>
                <?php
                ?>
            </ul> 
        </div>
    </nav>
</header>