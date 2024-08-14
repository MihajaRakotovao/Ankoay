<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    
    $tous = joueur();
    $joueur = $tous['pers'];
    $staff = $tous['pers2'];
    
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
    <section id="sectionjoueur">
        <div id="filtre">
            <form action="" method="post" style="width: 80%;">
                <select class="cl_search form-control" style="width: 100%;">
                    <option value="-1">Tous</option>
                    <option value="0">Joueurs</option>
                    <option value="1">Staff</option>
                </select>
                <div class="cl_content_filter_joueur" style="margin-top: 50px; padding: 10px; border: 1px solid grey;display: none;">
                    <select class="form-control cl_recheche_joueur" style="width: 100%;">
                        <option value="-1">Tous</option>
                        <option value="1">Homme</option>
                        <option value="2">Dame</option>
                    </select>
                    <select class="form-control cl_recheche_categorie" placeholder="Catégorie" style="width: 100%;margin-top: 5px;">
                        <option value="-1">Catégorie</option>
                        <option value="1">Senior</option>
                        <option value="2">Junior</option>
                        <option value="3">3x3</option>
                    </select>
                </div>
                <div class="cl_content_filter_staff" style="display: none;padding:10px;margin-top: 50px; border: 1px solid grey;">
                    <select class="form-control cl_recherche_staff" style="width: 100%;">
                        <option value="-1">Tous</option>
                        <option value="2">Président</option>
                        <option value="3">Vice Président</option>
                        <option value="4">SG</option>
                        <option value="1">Coachs</option>
                    </select>
                </div>
                
            </form>
        </div>
        <div class="joueurs">
            <div class="recherche">
                <input type="text" name="nom" id="nom" class="cl_search_name_playeur" placeholder="Rechercher..." >
            </div>
            <span>Notre équipe est composé de :</span>
            <div class="imgPlayer">
                <?php 
                    if (count($joueur) < 0) :
                ?>
                    <?php for ($i = 0; $i < 13; $i++) { ?>
                        <div class="infoPlayer">
                            <a href="info_complet.php?id=<?php echo  $joueur[$i]['id'];?>"><img src="assets/photo/<?php echo $joueur[$i]['photo'];?>" alt=""></a>
                            <div id="detail">
                                <h2><?php echo $joueur[$i]['nom'];?></h2>
                                <h2><?php echo $joueur[$i]['prenom'];?></h2>
                                <p><?php echo $joueur[$i]['age'];?>ans</p>
                                <p><?php echo $joueur[$i]['taille'];?></p>
                                <p><?php echo $joueur[$i]['Nom_Poste'];?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php
                else:
                ?>
                <?php foreach ($staff as $pers) {?>
                    <div class="infoPlayer" data-nom="<?php echo $pers ['nomS'].' '.$pers ['prenomS'];?>" data-statut=<?php echo $pers ['Statut'];?>>
                        <a href=""><img src="assets/photo/<?php echo $pers ['photo'];?>" alt=""></a>
                        <div id="detail">
                            <h2><?php echo $pers ['nomS'];?></h2>
                            <h2><?php echo $pers ['prenomS'];?></h2>
                            <h2><?php echo $pers ['Nom_Statut'];?></h2>
                        </div>
                    </div>
                <?php
                }
                ?>
                    <?php foreach ($joueur as $pers) { ?>
                    <div class="infoPlayer" data-nom="<?php echo $pers ['nom'].' '.$pers ['prenom'];?>" data-sexe=<?php echo $pers ['sexe'];?> data-age=<?php echo $pers ['age'];?> data-categorie=<?php echo $pers ['Categorie'];?>>
                        
                        <a href="info_joueur.php?id=<?php echo  $pers['id'];?>"><img src="assets/photo/<?php echo $pers ['photo'];?>" alt=""></a>
                        <div id="detail">
                            <h2><?php echo $pers ['nom'];?></h2>
                            <h2><?php echo $pers ['prenom'];?></h2>
                            <p><?php echo $pers ['age'];?>ans</p>
                            <p><?php echo $pers ['taille'];?></p>
                            <p><?php echo $pers ['Nom_Poste'];?></p>
                        </div>
                    </div>


                        <?php
                    }
                    ?>
                <?php
                    endif;
                ?>
            </div>
        </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













