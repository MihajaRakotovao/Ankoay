<?php
    include "../librairie/db.php";
    include "function.php";
    $db = bdd();
    $categories = get_categories();
    $poste = get_poste();
    $sexe = get_sexe();
    if(isset($_POST['poster'])){
        $erreurs = nouveauJoueur();
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
<section id="sectionNouveau_Joueur">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h1 >Nouveau Joueur</h1>
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
            <div class=" row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input  type="text" name="nom" placeholder="nom *" class="form-control" style="text-transform:uppercase;" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="prenom" placeholder="Prenom *" class="form-control" >
                </div>
            </div>
            <select class="form-control mt-2" name="sexe">
                <?php foreach ($sexe as $c) { 
                        echo "<option value=" .  $c['id'] . ">". $c['sexe'] . "</option>";
                    } 
                ?>
            </select>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <span>Date de naissance</span>
                    <input type="date" name="date" class="form-control" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <span>Photo</span>
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="age" placeholder="age *" class="form-control" >
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="taille" placeholder="taille *" class="form-control" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="club" placeholder="Club *" class="form-control" >
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12 col-sm-6">
                    <input type="text" name="competition" placeholder="competition *" class="form-control" >
                </div>
            </div>
            <select class="form-control mt-2" name="categorie">
                <?php foreach ($categories as $c) { 
                        echo "<option value=" .  $c['id'] . ">". $c['Nom_Categorie'] . "</option>";
                    } 
                ?>
            </select>
            <select class="form-control mt-2" name="poste">
                <?php foreach ($poste as $c) { 
                        echo "<option value=" .  $c['id'] . ">". $c['Nom_Poste'] . "</option>";
                    } 
                ?>
            </select>
            

            <div class="row">
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