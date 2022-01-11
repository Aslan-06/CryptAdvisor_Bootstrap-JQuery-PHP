<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    require_once "./connexion.php";

    $module;
    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }
    else{
        $module = "Accueil";
    }

    if (!in_array($module, ["Accueil", "Authentification", "Cours", "Article", "Membre"])) {
        die("Unauthorized");
    }

    require_once "./Modules/$module/$module.php"; 

    Connexion::initConnexion();
    new $module();
?>