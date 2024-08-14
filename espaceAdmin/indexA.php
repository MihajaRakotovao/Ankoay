<?php
    include "../librairie/db.php";
    include "function.php";
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
<section id="sectionIndex">
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card p-2">
                    <a href="">
                        <i class="fa fa-users  mb-2" style="font-size: 70px; color:black;"></i>
                    </a>
                    <h4 style="color:black;">Total Utilisateur</h4>
                    <h5 style="color:black;">
                    <?php
                        $sql="SELECT * from utilisateur ";
                        $result=$db-> query($sql);
                        $count=0;
                        foreach ($result as $key) {
                            $count=$count+1;
                        }
                        echo $count;
                    ?></h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card p-2">
                    <a href="">
                        <i class="fa fa-th-large mb-2" style="font-size: 70px; color:black;"></i>
                    </a>
                    <h4 style="color:black;">Total Joueurs</h4>
                    <h5 style="color:black;">
                    <?php
                       $sql="SELECT * from joueurs";
                        $result=$db-> query($sql);
                        $count=0;
                        foreach ($result as $key) {
                            $count=$count+1;
                        }
                        echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="card p-2">
                <a href="">

                    <i class="fa fa-th mb-2" style="font-size: 70px; color:black;"></i>
                </a>
                    <h4 style="color:black;">Total Articles</h4>
                    <h5 style="color:black;">
                    <?php
                       
                       $sql="SELECT * from articles ";
                        $result=$db-> query($sql);
                        $count=0;
                        foreach ($result as $key) {
                            $count=$count+1;
                        }
                        echo $count;
                   ?>
                   </h5>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card p-2">
                    <a href="">
                        <i class="fa fa-list mb-2" style="font-size: 70px; color:black;"></i>
                    </a>
                    <h4 style="color:black;">Total Evenement</h4>
                    <h5 style="color:black;">
                    <?php
                       
                       $sql="SELECT * from evenement ";
                        $result=$db-> query($sql);
                        $count=0;
                        foreach ($result as $key) {
                            $count=$count+1;
                        }
                        echo $count;
                   ?>
                   </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  include 'footer.php';?>          
<script src="js/jquery-1.11.3.min.js"></script>   
<script src="js/aos.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>