<?php
    if(session_status() == PHP_SESSION_NONE){
        session_start();
        $_SESSION['modulesAAfficher'] = array('joueurs', 'equipes', 'inscription', 'connexion');
    }
    
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