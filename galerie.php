<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $sary = galerie();
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
<section id="sectionGalerie">
    <div class="box">
        <div class="container-fluid">
            <div class="row">
                <?php foreach ($sary as $img) { ?>
                    <div class="col-lg-3 mt-1 mb-1">
                        <img class="col-lg-12" src="assets/photo/galerie/<?php echo $img['photos']?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













