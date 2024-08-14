<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
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
<section id="sectionApropos">
    <div id="imgApropos"></div>
    <div id="descri">
        <p>Jeannot Ravonimbola a laissé ses empreintes dans l'histoire du sport malgache en général et le basketball en particulier. Durant la XIe édition des JIOI 2023 que Madagascar vient d'héberger dernièrement, Coach Nônô vient de laisser des traces indélébiles pour le basketball masculin pour la énième fois. « Au début de la compétition, il y a eu de doute surtout que notre première adversaire a été La Réunion. Ce n'est pas n'importe quelle équipe car ce sont des joueurs français.
        </p>
        
        
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













