<?php
    require_once "../librairie/db.php";
    include "function.php";
    $db = bdd(); 
    supprimer_joueur();
    header("Location: joueur.php");