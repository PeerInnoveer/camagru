<?php

require 'header.php';

?>

<main>
    <div class="acc_info_box">
        <h1>Account Information</h1>
        <div class="hline"></div>
        <div class="acc_info">
            <br>
            <?php echo '<p>Username:  ' .$_SESSION['userUid']. '</p><a href="#openForm1"><i class="u-name-edit fas fa-user-edit"></i></a>'?>
            <br>
            <br>
            <?php echo '<p>Email:  ' .$_SESSION['userEmail']. '</p><a href="#openForm2"><i class="mail-edit fas fa-edit"></i></a>'?>
            <br>
            <br>
            <?php echo '<p>Password: </p><a href="#openForm3"><i class="pwd-edit fab fa-expeditedssl"></i></a>'?>
            <br>
            <hr>
                <!-- Form to update your password. -->
                <form id="openForm1" action="../includes/update_acc.inc.php" method="POST">
                    <input name="username" type="text" placeholder="Enter your username"/>
                    <button class="acc_ud_b1" type="submit" name="update-submit-uid">Submit</button>
                </form>
                
                <!-- Form to Update your Email. -->
                <form id="openForm2" action="../includes/update_acc.inc.php" method="POST">
                    <input name="email" type="text" placeholder="Enter your Email"/>
                    <button class="acc_ud_b2" type="submit" name="update-submit-email">Submit</button>
                </form>
                <!-- Form to Update your Password. -->
                <div class="form_div" id="openForm3">
                    <form class="form" action="../includes/update_pwd.inc.php" method="POST">
                        <input class="currpwd" name="curr_pwd" type="text" placeholder="Current Password"/>
                        <input class="newpwd" name="new_pwd" type="text" placeholder="New Password"/>
                        <input class="renewpwd" name="re_new_pwd" type="text" placeholder="Retype New Password"/>
                        <input type="hidden" name="uid" value="<?php echo($_SESSION['userUid'])?>">
                        <br>
                        <button class="acc_ud_b3" type="submit" name="update-submit-pwd">Submit</button>
                    </form>
                </div>
        </div>
    </div>
</main>
<?php
    require "footer.php";
?>