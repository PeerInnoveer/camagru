<?php
    session_start();
?>

<<<<<<< HEAD
<!DOCTYPE html>
=======
<<<<<<< HEAD
<!DOCTYPE html>
=======
<!DOCTYPE <!DOCTYPE html>
>>>>>>> 7f3a1f05b148bb3c6c1562d50d8e45b5d90fa4d8
>>>>>>> c7fbdb6f4c53a5e5b77629721a5ae422f7cc3ebf
<html>
<head>
    <meta charset="utf-8" />
    <title>CamGuru</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="../stylesheets/styles.css" />
</head>
<body>
<header>
    <nav>
        <div class="navbar">
            <?php
                if (isset($_SESSION['userId'])) {
                    echo '<div class="navbar-logo">
                    <a href="index.php"><strong>CamGuru</strong></a>
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
                        if (isset($_SESSION['userId'])) {
                            echo '<form action="../includes/logout.inc.php" method="POST">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>';
                    echo '<li><a href="#"><i class="profile_icon far fa-user-circle"></i></a></li>
                            <li><a href="photo_index.php"><i class="cam_icon fa fa-camera-retro"></i></a></li>
                            <li><a href="#"><i class="settings_icon fas fa-cog"></i></a></li>';
                        } else {
                            echo '<form class="login-form" action="../includes/login.inc.php" method="POST">
                            <input type="text" name="mailuid" placeholder="Username/e-mail">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="login-submit">Login</button>
                        </form>';
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