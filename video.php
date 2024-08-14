<?php
    session_start();
    require "librairie/db.php";
    include "librairie/librairie.php";
    $db = bdd(); 
    $videos = video();
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
<section id="sectionVideo">
    <div class="actu2">
            <?php 
                if (isset($_GET['id'])) :
                    $videoDetail = video_detail();
            ?>
                <div class="col-lg-7 ml-5 mb-4 pt-4">
                    <div class="row">
                        <p> <?php echo $videoDetail ['titre'];?></p>
                    </div>
                    <h1 ><?php echo $videoDetail ['descri'];?></h1>
                    <div class="col-lg-7" id="imgActu" >
                        <video src="assets/video/<?php echo $videoDetail['vdieo']?>" controls></video>
                    </div>
                </div>
                <?php
                    endif;
                ?>
                
    </div>
    <div  class="oldnews">
        <?php foreach ($videos as $article) { ?>
            <div class="allnews ">
                <p class="col-lg-6 ">L'équipe</p>
                <span class="col-lg-8"> <?php echo $article['titre']?></span>
                <h1 ><?php echo $article['descri']?></h1>
                <div id="imgActu">
                    <video src="assets/video/<?php echo $article['vdieo']?>"></video>
                </div>
                <a href="video.php?id=<?php echo $article['id'];?>">Voir +</a>
            </div>
        <?php } ?>
    </div>
</section>
<?php  include 'partie/footer.php';?>
</body>
</html>

        













