<?php
    require_once "./connexion.php";

    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }
    
    switch($module){
        case"ModJoueurs":
        case"Equipes":
        case"Authentification":
            require_once "./modules/$module/$module.php";      
        break;
        default:
            die("Interdiction d'accès à ce module");
    }

    Connexion::initConnexion();
    new $module();
?>