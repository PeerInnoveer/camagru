<?php
    require 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Sign up</h2>
        <form class="signup-form" action="includes/signup.inc.php" method="POST">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-confirm" placeholder="Confirm Password">
            <button type="Submit" name="signup-submit">Signup</button>
        </form>
    </div>
</section>

<?php
    require 'footer.php';
?>