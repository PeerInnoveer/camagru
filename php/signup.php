<?php
    require 'header.php';
?>

<div class="main-box">
        <form class="signup-form" action="../includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-confirm" placeholder="Confirm Password">
            <button type="Submit" name="signup-submit">Signup</button>
        </form>
</div>
<div class="lower-main">
        <p class="agree">By clicking on Signup, you agree to Camguru's <br><a href="cookie_policy.php" target="_blank" style="color: darkblue;">Cookie</a> and 
        <a href="privacy_policy.php" target="_blank" style="color: darkblue;">Privacy</a> Policy.</p>
        <br>
        <a href="#" style="color: maroon; font-family: arial;">Forgot Password?</a>
        <br>
        <br>
        <h5 class="you_mean">Get the app.</h5>
        <br>
        <a class="g_play" href="#"><img style="max-width:180px; min-width:150px;" alt="GooglePlay"  src="../img/Googleplay.png" width=14.8%></a>
        <a class="a_store" href="#"><img style="max-width:180px; min-width:150px;" alt="AppStore" src="../img/appStore.png"  width=15% ></a>
</div>
<?php
    require 'footer.php';
?>