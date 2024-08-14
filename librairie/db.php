<?php
function bdd(){
    try  {
        $bdd = new PDO("mysql:dbname=ankoay;host=localhost", "root", "");
        $bdd ->exec("SET NAMES UTF8");
    }catch (PDOException $e){
        echo 'Connexion échouée :' .$e->getMesssage();
    }
    return $bdd;
}
