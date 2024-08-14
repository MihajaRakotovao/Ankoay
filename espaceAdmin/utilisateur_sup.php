<?php
    require_once "../librairie/db.php";
    include "function.php";
    $db = bdd(); 
    supprimer_utilisateur();
    header("Location: utilisateur.php");