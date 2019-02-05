<?php

require 'header.php';

?>

<main>
    <div class="acc_info_box">
        <h1>Account Information</h1>
        <div class="hline"></div>
        <div class="acc_info">
            <br>
            <?php echo '<p>Username:  ' .$_SESSION['userUid']. '</p><i class="u-name-edit fas fa-user-edit"></i>'?>
            <br>
            <br>
            <?php echo '<p>Email:  ' .$_SESSION['userEmail']. '</p><i class="mail-edit fas fa-edit"></i>'?>
            <br>
            <br>
            <?php echo '<p>Password:  ' .$_SESSION['userPwd']. '</p><i class="pwd-edit fab fa-expeditedssl"></i>'?>
            <br>
            <hr>
            <!-- <form class="update_acc" action="../includes/acc_update.inc.php" method="POST">
                <input class="" type="text" name="username" placeholder="Edit your Username">
                <br>
                <input class="" type="text" name="password" placeholder="Password">
                <br>
                <input class="" type="text" name="password" placeholder="Confirm-Password">
            <button class="acc_update" type="submit" name="acc_update_submit">Update your acc.</button>
            </form> -->
        </div>
    </div>
</main>
            
<?php
    require "footer.php";
?>