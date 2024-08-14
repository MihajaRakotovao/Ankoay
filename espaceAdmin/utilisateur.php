<?php
    include "../librairie/db.php";
    include "function.php";
    $db = bdd();
    $user = utilisateur();
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
<section id="sectionUtilisateur">
<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Utilisateurs</h1>
                <table class="table" width="100%" height="auto">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Désignation</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($user as $p) { ?>
                        <tr >
                            <th scope="row"><?= $p['id'] ?></th>
                            <td><img src="/assets/photo/<?= $p['Photo']?>" alt="" width="30px" height="30px"><?= $p['Pseudo'].' ' ?><?= $p['Email'] ?></td>
                            <td>
                                <a href="utilisateur_sup.php?id=<?php echo $p['id'] ?>" class="btn btn-danger text-white">Supprimer</a>
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

