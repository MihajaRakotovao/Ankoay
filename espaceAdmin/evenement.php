<?php
    include "../librairie/db.php";
    include "function.php";
    $db = bdd();
    $posts = evenement_Ad();
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
<section id="sectionArticleAd">
<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Evenement</h1>
                <a class="btn btn-primary text-white" href="nouveau_events.php">Ajouter</a>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Désignation</th>
                        <th scope="col">Modification</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $p) { ?>
                        <tr>
                            <th scope="row"><?= $p['id'] ?></th>
                            <td><img src="/assets/photo/<?= $p['photo'] ?>" alt="" width="30px" height="30px"><?=' '.$p['descri'] ?></td>
                            <td><a href="events_edit.php?id=<?php echo $p['id'] ?>" class="btn btn-warning text-white">Modifier</a></td>
                            <td>
                                <a href="admin_sup.php?id=<?php echo $p['id'] ?>" class="btn btn-danger text-white">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
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

