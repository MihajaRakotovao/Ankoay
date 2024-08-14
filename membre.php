<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db =bdd();
    if(!isset($_SESSION["pseudo"]))
        header("Location: connexion.php");
       $commentaires = commentaires_membre();
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
<body >
<?php  include 'partie/header.php';?>
    <section id="sectionMembre">
        
        <div class="background2" >
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-8 col-sm-offset-3">
                        <h1>Bienvenue <span class="text-uppercase text-danger"> <?= $_SESSION["pseudo"] ?> </span> </h1>
                        <h2><br> Vous pouvez à present commenter les articles et nous contacter via Mail</h2>
                    </div>
                </div>
            </div>
            <div class="container" style='display:flex; flex-direction:column; align-items:center;'>
                <div class="column">
                    <div class="col-lg-7">
                        <img id="sary" src="assets/photo/<?= $_SESSION['photo'] ?>" alt="">
                    </div>
                    <div class="col-lg-12 mt-4">
                        <p>Adresse e-mail : <?= $_SESSION['mail'] ?></p>
                        <p>Adresse id n° : <?= $_SESSION['id'] ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <h1>Derniers commentaires !</h1>
                    </div>
                </div>
                <div class="row commentaire">
                <?php 
                    foreach ($commentaires as $discussions) :
                ?>
                <div class="col-lg-12 col-xs-12">
                    <p class="date"> Posté sur l'article " <?= $discussions['titre'] ?> " le <time datetime=""><?= $discussions['date_pub'] ?></time> :</p>
                    <p><?= $discussions['coms'] ?></p>
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </section>
<?php  include 'partie/footer.php';?>
<script src="js/jquery-1.11.3.min.js"></script>   
<script src="js/bootstrap.js"></script>
</body>
</html>