<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $bd =bdd();
    if(isset($_SESSION["pseudo"])){
        if(!empty($_POST))
            $erreurs = contact();
    }
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
    <section id="sectionContact">
        <div class="background">
            <div id="contactP">
                <h1 class="text-white ">Contactez-nous !</h1>
                <form action="" method="post">

                <?php 
                        if(isset($erreurs)) :
                            if($erreurs) ://$erreurs == true
                                foreach($erreurs as $diso) :
                        ?>
                        <div class="row " >
                        <div class="col-lg-12 col-xs-12">
                            <div class="message erreur alert alert-danger" style="text-align:center"><?= $diso ?></div>
                        </div>
                        </div>
                    <?php
                        endforeach;
                        else :
                    ?>
                        <div class="row">
                            <div class="col-lg-12 col-xs-12">
                            <div class="message erreur alert alert-danger" style="text-align:center">Votre message est bien envoyé !</div>
                            </div>
                        </div>
                <?php
                    endif;
                    endif;
                ?>       
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="text" name="nom" placeholder="Votre Nom*" class="form-control mt-5" id="mo">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="email" placeholder="votre adresse E_mail*" class="form-control mt-5" id="ma">
                        </div>
                        <div class="col-lg-12 col-xs-12">
                            <textarea name="texte" cols="5"  rows="8"  placeholder="En quoi puisse vous aidez"  class="form-control mt-5" id="moral"></textarea>               
                        </div>  
                    </div> 
                    <div class="row">
                            <div class="col-lg-12 col-xs-12">
                                <button class="but2" type="submit" name="valider"  class="form-control btn btn-primary ">valider</button>
                            </div> 
                    </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php  include 'partie/footer.php';?>
<script src="js/jquery-1.11.3.min.js"></script>   
<script src="js/bootstrap.js"></script>
</body>
</html>