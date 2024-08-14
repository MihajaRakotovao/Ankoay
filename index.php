<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $articleD = articleD();
    $events = evenementD();
    $img = galerieL();


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
    <script src="/assets/js/rebours.js" defer></script>
    <title>ANKOAY</title>
</head>
<body>
<?php  include 'partie/header.php';?>
<section id="section">
    <img src="assets/photo/<?php echo $events['photo'] ?>" alt="">
    <div class="box-rebours">
        <p>Prochain Match <br> à ne pas ratez</p>
        <span class="text-white" id="dateEve"><?php echo $events['date_events'] ?></span>
        <div class="box_jour">
            <div id="jour">00</div>
            <span id="jour_label">Jours</span>
        </div>
        <div class="box_heure">
            <div id="heure">00</div>
            <span id="heure_label">Heures</span>
        </div>
        <div class="box_minute">
            <div id="minute">00</div>
            <span id="minute_label">Minutes</span>
        </div>
        <div class="box_seconde">
            <div id="seconde">00</div>
            <span id="seconde_label">Secondes</span>
        </div>
    </div>
</section>
<section id="section2">
    <div class="partie">
        <div class="Accueil">
            <div id="drap1"></div>
                <div id="equipe">
                    <div id="eventsG">
                        <h5 class="text-white"><?php echo $events['titre'] ?></h5>
                        <div>
                            <h1><?php echo $events['descri'] ?></h1>
                            <h2><?php echo $events['lieu'] ?></h2>
                        </div>
                    </div>
                    <div id="eventsD">
                        <div id="box_events1">
                            <img src="assets/photo/mada.png" alt="">
                            <img src="assets/photo/<?php echo $events['equipe2'] ?>" alt="">
                        </div>
                    </div>
                </div>
        </div>
        <div class="apropos">
            <div id="imgPropos"></div>
            <div id="propos">
                <h1>ANKOAY</h1>
                <h3>Bienvenue à vous</h3>
                <p>Jeannot Ravonimbola a laissé ses empreintes dans l'histoire du sport malgache en général et le basketball en particulier. Durant la XIe édition des JIOI 2023 que Madagascar vient d'héberger dernièrement...</p>
                <button><a href="apropos.php" style="color:white; text-decoration:none;">Voir l'historique</a></button>
            </div>
        </div>
        <div class="fil_actu">
        <?php foreach ($articleD as $article) { ?>
            <div class="actu">
                    <div class="container">
                        <div class="column ">
                            <div class="col-lg-12 pt-4">
                                <div class="row">
                                    <p class="col-lg-2 text-white">L'équipe</p>
                                    <span class="text-white"> <?php echo $article['date_pub']?></span>
                                </div>
                                <h1 class="text-white"><?php echo $article['titre']?></h1>
                                <div class="col-lg-12" id="imgActu">
                                    <img src="assets/photo/<?php echo $article['photo']?>" alt="">
                                    <div id=btn><a href="actu.php?id=<?php echo $article['id'];?>">Voir</a></div>
                                </div>
                                <div class="row">
                                    <span class="col-lg-9 col-md-3 col-sm-3  mt-4 text-white">commentaire</span>
                                    <div class="col-lg-3 col-md-3 col-sm-3 pl-6">
                                        <div class="row">
                                            <i class="fa fa-heart mt-4 mr-2 text-white"></i>
                                            <i class="fa fa-thumbs-up  mt-4 mr-2 text-white"></i>
                                            <i class="fa fa-thumbs-down  mt-4 mr-2 text-white"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
                    <?php
                }
                ?>
            
        </div>
        <div class="player">
            <div id="up">
                <div class="coach">
                    <div>
                        <a href="joueur.php">Coachs</a>
                    </div>
                </div>
                <div class="senior">
                    <div>
                        <a href="joueur.php">Senior(+19)</a>
                    </div>
                </div>
            </div>
            <div id="down">
                <div class="junior">
                    <div>
                        <a href="joueur.php">Junior(19)</a>
                    </div>
                </div>
                <div class="staff">
                    <div>
                        <a href="joueur.php">Staff</a>
                    </div>
                </div>
            </div>
        </div>
        
       
    </div>
    <div class="resume">
        <div class="details">
        <?php 
        if (isset($_SESSION['pseudo'])) :
            ?>
            <div class="news">
                <h2>Best Of</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="display:flex; flex-direction:column;">
                            <video src="assets/video/best/logo.mp4" autoplay="true" loop muted></video>
                            <p>Revivez les meilleurs moments avec les Ankoay</p>
                            <a href="video.php">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        endif;
            ?>
            <div class="news">
                <h2>Evenement</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12" style="display:flex; flex-direction:column;">
                            <img src="assets/photo/<?php echo $events['photo'] ?>" width="100%" height="50%" alt="">
                            <p><?php echo $events['date_events'] ?></p>
                            <h2><?php echo $events['descri'] ?></h2>
                            <a href="competition.php">Voir</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="galerie">
                <div id="galerie_player">
                    <h1 class="text-white mt-4" style="text-align:center; font-size:46px;">Galerie</h1>
                    <div class="container-fluid">
                        <div class="row">
                        <?php foreach ($img as $sary) { ?>
                            <img class="col-lg-5 m-1 " src="assets/photo/galerie/<?php echo $sary['photos']?>" alt="">
                        <?php
                        }
                        ?>
                            <div class="col-lg-5 mt-4 ml-2" id="Galerie_Plus">
                                <div>
                                    <a href="galerie.php"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="goodies" style="background:rgba(0, 0, 0, 0.35); height:260vh;" >
            <div class="container-fluid" >
                <div class="column" >
                    <div class="col-lg-12">
                        <h3 class="col-lg-12 ml-4 text-white pt-5" >Goodies</h3>
                        <img class="col-lg-12 mt-5" src="assets/photo/goodies/product-cart-1" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img class="col-lg-12 mt-5" src="assets/photo/goodies/product-cart-2" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img class="col-lg-12 mt-5" src="assets/photo/goodies/product-small-2" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img class="col-lg-12 mt-5" src="assets/photo/goodies/product-small-3" alt="">
                    </div>
                    <div class="col-lg-12">
                        <img class="col-lg-7 ml-5 mt-5" src="assets/photo/goodies/product-small-7" alt="">
                    </div>
                </div>
            </div>
            <!-- <div>
            </div> -->
        </div>
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













