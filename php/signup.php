<?php
    require 'header.php';
?>

<div class="signup_box">
        <form class="signup-form" action="../includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-confirm" placeholder="Confirm Password">
            <button type="Submit" name="signup-submit">Signup</button>
        </form>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfields") {
                    echo '<div class="emptyfields"><p>Please enter all fields!</p></div>';
                } 
            }
            if (isset($_GET["errorUid"])) {
                if ($_GET["errorUid"] == "usernameShort") {
                    echo '<div class="username"><p>Username needs to be 5 or more characters.</p></div>';
                }
            }
            if (isset($_GET["verified"])) {
                if ($_GET["verified"] == "check_email") {
                    echo '<div class="check_email"><p>Success! We`ve sent you an email, Please click on the confirmation link in the email to confirm your email address.</p></div>';
                }
            }
            if (isset($_GET["success"])) {
                if ($_GET["success"] == "you_may_login") {
                    echo '<div class="umaylogin"><p>Your Email has been verified, you may login.</p></div>';
                }
            }
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "no_user") {
                    echo '<div class="verify_email"><p>If your registration has been verified<br>you could of entered an incorrect username or password,<br>if not check your email for a link to verify your email address.</p></div>';
                }
            }
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "bad_pwd") {
                    echo '<div class="badPwd"><p>Weak password, password should be between 6 and 12 characters in length and contain atleast one Uppercase letter.</p></div>';
                }
            }
        ?>
</div>
<div class="additional">
        <p class="agree">By clicking on Signup, you agree to Camguru's <br><a href="cookie_policy.php" target="_blank" style="color: darkblue;">Cookie</a> and 
        <a href="privacy_policy.php" target="_blank" style="color: darkblue;">Privacy</a> Policy.</p>
        <br>
        <?php
            if (isset($_GET["newpwd"])) {
                if ($_GET["newpwd"] == "passwordupdated") {
                    echo '<p class="reset_success">Your password has been reset! Go ahead and login</p>';
                }
            }
        ?>
        <a href="reset-password.php" style="color: maroon; font-family: arial;">Forgot Password?</a>
        <br>
        <br>
        <h5 class="you_mean">Get the app.</h5>
        <br>
        <a class="g_play" href="https://play.google.com/store?hl=en" target="_blank"><img style="max-width:180px; min-width:150px;" alt="GooglePlay"  src="../img/Googleplay.png" width=14.8%></a>
        <a class="a_store" href="https://www.apple.com/za/ios/app-store/" target="_blank"><img style="max-width:180px; min-width:150px;" alt="AppStore" src="../img/appStore.png"  width=15% ></a>
</div>
<?php
    require 'footer.php';
?>