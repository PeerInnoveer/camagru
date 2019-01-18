<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1 style="font-size: 22px;">Reset your password</h1>
            <br>
            <p>An email will be send to you with a link<br><br>that will allow you to reset your password.</p>
            <br>
            <form class="pwdresetform" action="../includes/reset-request.inc.php" method="post">
            <input class="eyea-input" type="text" name="email" placeholder="Enter your email address...">
            <button class="rnpbe-button" type="submit" name="reset-request-submit">Receive new password by email.</button>
        </form>
        <?php
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo '<p style="color: #2e9629;
                    margin-top: 6px;
                    font-size: 16px;">Check your email!</p>';
                }
            }
        ?>
        </section>
    </div>
</main>
            
<?php
    require "footer.php";
?>