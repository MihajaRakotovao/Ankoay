<?php
    include "../librairie/db.php";
    include "function.php";
    $db = bdd();
    if(isset($_POST['poster'])){
        $erreurs = nouveau_events();
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
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="/assets/css/fontawesome/css/all.css">
    <script src="/assets/js/jquery.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script src="/assets/js/rebours.js" defer></script>
    <title>ANKOAY_Admin</title>
</head>
<body >
    <?php  include '../partie/header_Admin.php';
    ?>
<section id="sectionNouveau_Events">
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 col-xs-12">
                <h1 >Nouveau évènement</h1>
            </div>
        </div>
        <form action="" method="post" enctype='multipart/form-data'> 
            <?php
                if(isset($erreurs)) :
                if($erreurs) :
                foreach($erreurs as $error) :   
            ?>
                <div class="annonce">
                
                    <p class="erreur alert alert-danger text-center"><?php echo $error;?></p>        
                </div>
            <?php
                endforeach;
                else :
            ?>
                <div class="annonce">
                    <p class="validation alert alert-infos text-center text-white">Bien publier !</p>        
                </div>
            <?php
                endif;
                endif;
            ?>  
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="titre" placeholder="Titre *" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="descri" placeholder="Description *" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                <span>Bande annonce</span>

                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                    <input type="date" name="date" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="lieu" placeholder="Lieu *" class="form-control" >
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-sm-6">
                    <span>Drapeau de l'Adversaire</span>
                    <input type="file" name="file2"  class="form-control" >
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-12 col-xs-12">
                    <input type="submit" value="poster!" name="poster" class="btn btn-success form-control mt-3">
                </div>
            </div>
        </form>
    </div>
</section>
<?php  include 'footer.php';?>          
<script src="js/jquery-1.11.3.min.js"></script>   
<script src="js/aos.js"></script>
<script src="js/bootstrap.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>