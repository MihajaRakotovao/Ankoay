<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $info = joueurD();

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
    <script src="/assets/js/recherche.js" defer></script>
    <title>ANKOAY</title>
</head>
<body>
    <?php  include 'partie/header.php';?>
<section id="sectioninfo_joueur">
    <div class="box">
        <div class="joueur_detail">
        <?php 
                if (isset($_GET['id'])) :
                    $equipeDetail = equipe_detail();
            ?>
                <div class="col-lg-12 ml-5 mb-4 pt-4">
                    <h1><?php echo $equipeDetail ['nom'];?></h1>
                    <h1 ><?php echo $equipeDetail ['prenom'];?></h1>
                    <p >Né(e) le <?php echo $equipeDetail ['date_naissance'];?></p>
                    <p ><?php echo $equipeDetail ['age'];?> ans</p>
                    <div class="col-lg-12" id="imgActu" >
                        <img width="100%" src="assets/photo/<?php echo $equipeDetail ['photo'];?>" alt="">
                    </div>
                    <p class="mt-2"><?php echo $equipeDetail ['taille'];?></p>
                    <p class="mt-2">Club <?php echo $equipeDetail ['club'];?></p>

                    <?php else :?>

                    <div class="col-lg-12 ml-5 mb-4 pt-4">
                        <div class="row">
                            <h1><?php echo $equipeDetail ['nom'];?></h1>
                            <h1 ><?php echo $equipeDetail ['prenom'];?></h1>
                        </div>
                        <p ><?php echo $equipeDetail ['age'];?> ans</p>
                        <p ><?php echo $equipeDetail ['date_naissance'];?> ans</p>
                        <div class="col-lg-10" id="imgActu" >
                            <img width="100%" src="assets/photo/<?php echo $equipeDetail ['photo'];?>" alt="">
                        </div>
                    </div>
                </div>
                <?php
                    endif;
                ?>
        </div>
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













