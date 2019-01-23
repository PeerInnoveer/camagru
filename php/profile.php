<?php
    require "header.php";
?>

<main>
    <div class="wrapper-main">
        <section class="section-default">
        <div class="fullheader">
            <h1><?php echo($_SESSION['user_uid']);?></h1>
            <?console.log($_SESSION)?>
        </div>    
        </section>
    </div>
</main>
            
<?php
    require "footer.php";
?>