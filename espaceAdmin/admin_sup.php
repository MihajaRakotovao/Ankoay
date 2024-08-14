<?php
    require_once "../librairie/db.php";
    include "function.php";
    $db = bdd(); 
    supprimer();
    header("Location: article_Ad.php");