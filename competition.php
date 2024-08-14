<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $compete = evenement();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/photo/ankoaylogo.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="/assets/photo/ankoay.png">
    <meta name="description" content="Site pour vous informer d' Ankoay">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/fontawesome/css/all.css">
    <script src="/assets/js/jquery.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <title>ANKOAY</title>
</head>
<body>
<?php  include 'partie/header.php';?>
<section id="sectionCompete">
    <?php foreach ($compete as $compe) { ?>
        <div class="box">
            <p><?php echo $compe['date_events'] ?></p> 
            <p><?php echo $compe['titre'] ?></p>
            <h5><?php echo $compe['descri'] ?></h5>
            <img src="assets/photo/<?php echo $compe['photo'] ?>" alt="">
            <span><?php echo $compe['lieu'] ?></span>
            <div class="row" style="display:flex; justify-content:space-around;">
                <img src="assets/photo/mada.png" alt="" class="imgEquipe">
                <h1>VS</h1>
                <img src="assets/photo/<?php echo $compe['equipe2'] ?> " class="imgEquipe" alt="">
            </div>
        </div>
    <?php }
    ?>
    
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













