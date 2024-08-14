<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $articles = articles();
    $article = article_Last();
    $message = message();
    $nbComs = nb_commentaires();
    if (!empty($_POST['commenter'])) 
    $erreur = commenter(); 
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
<section id="sectionActu">
    <div class="actu2">
            <?php 
                if (isset($_GET['id'])) :
                    $articleDetail = article_detail();
            ?>
                <div class="col-lg-7 ml-5 mb-4 pt-4">
                    <div class="row">
                        <p class="col-lg-2 ">L'équipe</p>
                        <p> <?php echo $articleDetail ['date_pub'];?></p>
                    </div>
                    <h1 ><?php echo $articleDetail ['titre'];?></h1>
                    <p ><?php echo $articleDetail ['descri'];?></p>
                    <div class="col-lg-7" id="imgActu" >
                        <img width="100%" src="assets/photo/<?php echo $articleDetail ['photo'];?>" alt="">
                    </div>
                    <div class="row">
                    <span class="col-lg-9 mt-4 ">commentaire (<?php echo $nbComs ?>)</span>

                        <div class="col-lg-3 pl-6">
                            <i class="fa fa-heart col-lg-3 mt-4 "></i>
                            <i class="fa fa-thumbs-up col-lg-3 mt-4 "></i>
                            <i class="fa fa-thumbs-down col-lg-3 mt-4 "></i>
                        </div>
                    </div>
                    <?php
                                else :
                            ?>
                            <div class="col-lg-7 ml-5 mb-4 pt-4">
                                <div class="row">
                                    <p class="col-lg-2 ">L'équipe</p>
                                    <p><?php echo $article['date_pub']?></p>
                                </div>
                                <h1 ><?php echo $article['titre']?></h1>
                                <p ><?php echo $article['descri']?></p>
                                <div class="col-lg-12" id="imgActu">
                                    <img src="assets/photo/<?php echo $article['photo']?>" alt="">
                                </div>
                            </div>
                    <div class="row">                            
                        <div class="col-lg-3 pl-6">
                            <i class="fa fa-heart col-lg-3 mt-4 "></i>
                            <i class="fa fa-thumbs-up col-lg-3 mt-4 "></i>
                            <i class="fa fa-thumbs-down col-lg-3 mt-4 "></i>
                        </div>
                    </div>
                <?php
                    endif;
                ?>
                </div>
                <div class="column " id="box-com">
                    <span class="col-lg-9 mt-4 ">commentaire (<?php echo $nbComs ?>)</span>
                    <?php foreach ($message as $koms) { ?>

                        <div>
                            <h3>Postée par <span> <?php echo $koms['Pseudo'].' ' ?><img width="40vh" src="assets/photo/<?php echo $koms['Photo'] ?>" alt=""></span> le <?php echo $koms['date_pub'] ?></h3>
                            <span><?php echo $koms['coms'] ?></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php 
        if (isset($_SESSION['pseudo'])) :
            ?>
            <form method="post" action="">
                <?php
                    if (isset($erreur)) :
                    if ($erreur) :
                ?>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="message erreur"><?= $erreur ?></div>
                    </div>
                </div>
                <?php
                    else :
                ?>
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                        <div class="message confirmation alert alert-danger text-center ">
                            Votre commentaire a bien été posté
                        </div>
                    </div>
                </div>
                    <?php
                        endif;
                        endif;
                    ?>
                    
                    <div id="coms">
                        <textarea name="commentaire" placeholder="Votre commentaire *"></textarea>
                        <input type="submit" value="Commenter" name="commenter">
                    </div>
            </form>
        <?php 
            endif;
            ?>
    </div>
    <div  class="oldnews">
                <?php foreach ($articles as $article) { ?>
                    <div class="allnews ">
                        <p class="col-lg-6 ">L'équipe</p>
                        <span class="col-lg-8"> <?php echo $article['date_pub']?></span>
                        <h1 ><?php echo $article['titre']?></h1>
                        <div id="imgActu">
                            <img src="assets/photo/<?php echo $article['photo']?>" alt="">
                        </div>
                        <a href="actu.php?id=<?php echo $article['id'];?> ">Voir +</a>
                    </div>
                            
                    <?php
                }
                ?>
        
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













