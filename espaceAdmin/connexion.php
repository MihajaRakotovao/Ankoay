<?php
    session_start();
    require "../librairie/db.php";
    include "function.php";
    if (isset($_POST['connexion'])){
        $erreurs = connexion();
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
    <link rel="stylesheet" href="../espaceAdmin/css/style.css">
    <link rel="stylesheet" href="/assets/css/fontawesome/css/all.css">
    <script src="/assets/js/jquery.min.js" defer></script>
    <script src="/assets/js/bootstrap.min.js" defer></script>
    <script src="/assets/js/rebours.js" defer></script>
    <title>ANKOAY_Admin</title>

</head>
<body >
<section id="section">
    <div class="background">
            <div class="container">
                <div class="row mt-4" >
                    <div class="col-xs-7 ">
                        <h1 style="text-align:center" class="text-white">Connectez-vous !</h1>
                    </div>
                </div>
                <form action="" method="post">
                <?php 
                    if (isset($erreurs)): 
                        foreach ($erreurs as $diso) :
                ?>
                    <div class="row">
                        <div class="col-lg-7 col-xs-12">
                            <div class="message erreur alert alert-danger" style="text-align:center;"><?= $diso ?></div>
                        </div>
                    </div>
                <?php
                    endforeach;
                    endif;
                ?>

                        <div class="row mt-4">
                            <div class="col-sm-7 col-sm-offset-3">
                                <input type="text" name="pseudo" placeholder="pseudo *" class="form-control" id="control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-7 col-sm-offset-3">
                                <input type="password" name="password" placeholder="mot de pass *" class="form-control" id="control">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-7 col-sm-offset-3">
                                <input type="submit" value="Me connecter !" name="connexion" class="form-control w-100 btn btn-success" id="control">
                            </div>
                        </div>
                </form>
            </div>
            <img src="../assets/photo/ankoay3.jpg" width="300vh" height="300vh" alt="">

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