<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db =bdd();
    if(isset($_SESSION["pseudo"]))
        header("Location: membre.php");
    if (isset($_POST['inscrire']))
       $erreurs = inscrire();
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
    <section id="sectionInscription">
        <div class="background">
            <div id="Inscript" >
                <h1 style="margin: 2%;" class="text-white">Inscription sur Ankoay_Membre !</h1>
                <form action="" method="post" style="height:60%" enctype='multipart/form-data'>
                <?php 
                if (isset($erreurs)) :
                    if ($erreurs) :
                        foreach ($erreurs as $diso) :
                ?>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="message erreur alert alert-danger" style="text-align:center;">
                            <?= $diso?>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                    else :
                ?>
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <div class="message confirmation alert alert-sucess text-white" style="text-align:center;">
                            Vous etes inscrit !!
                            </div>
                        </div>
                    </div>
                <?php 
                    endif;
                    endif;
                ?>
                    <div id="Inscript2">
                        <input type="text" name="pseudo" id="" placeholder="Pseudo *" value="<?php if (isset($_POST["pseudo"])) echo $_POST["pseudo"] ?>">
                        <input type="text" name="email" id="" placeholder="Adresse E-mail *" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>">
                        <input type="text" name="emailconf" id="" placeholder="Vérification de l' E-mail *" value="<?php if (isset($_POST["emailconf"])) echo $_POST["emailconf"] ?>">
                        <input type="password" name="password" id="" placeholder="Mot de passe *" value="<?php if (isset($_POST["password"])) echo $_POST["password"] ?>">
                        <input type="password" name="passwordconf" id="" placeholder="Vérification du Mot de passe *" value="<?php if (isset($_POST["passwordconf"])) echo $_POST["passwordconf"] ?>">
                    </div>
                    <div id="InscriptE">
                        <input type="file" name="fichier" id="">
                    </div>
                    <input id="btnConect" type="submit" value="isncrire" name='inscrire'>
                </form>
            </div>
        </div>
    </section>
    
    
    <?php  include 'partie/footer.php';?>

    
<script src="js/jquery-1.11.3.min.js"></script>   
<script src="js/bootstrap.js"></script>
</body>
</html>