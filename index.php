<?php
    session_start();
    require_once "./connexion.php";

    $module;
    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }
    else{
        $module = "Accueil";
    }
    
    require_once "./Modules/$module/$module.php"; 

    Connexion::initConnexion();
    new $module();
?>