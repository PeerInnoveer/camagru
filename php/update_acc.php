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
            <?php echo '<p>Password:  ' .$_SESSION['userPwd']. '</p><a href="#openForm3"><i class="pwd-edit fab fa-expeditedssl"></i></a>'?>
            <br>
            <hr>
                <!-- Form to update your password. -->
                <form>
                <table id="openForm1">
                    <tr>
                        <td class="label">Enter Username:</td>
                        <td>
                            <input type="text" placeholder="Enter your username"/>
                            <button class="acc_ud_b1" type="submit" name="logout-submit">Submit</button>
                        </td>
                    </tr>
                </table>
                </form>
                <!-- Form to Update your Email. -->
                <form>
                <table id="openForm2">
                    <tr>
                        <td class="label">Enter Email:</td>
                        <td>
                            <input type="text" placeholder="Enter your Email"/>
                            <button class="acc_ud_b2" type="submit" name="logout-submit">Submit</button>
                        </td>
                    </tr>
                </table>
                </form>
                <!-- Form to Update your Password. -->
                <form>
                <table id="openForm3">
                    <tr>
                        <td class="label">Enter Password:</td>
                        <td>
                            <input type="text" placeholder="Enter your Password"/>
                        </td>
                        <td class="label">Confirm Password:</td>
                        <td>
                            <input type="text" placeholder="Confirm your Password"/>
                            <button class="acc_ud_b3" type="submit" name="logout-submit">Submit</button>
                        </td>
                    </tr>
                </table>
                </form>
        </div>
    </div>
</main>

<?php
    require "footer.php";
?>