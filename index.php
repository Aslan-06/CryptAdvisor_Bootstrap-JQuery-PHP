<?php
    require_once "./connexion.php";

    if(isset($_GET['module'])){
        $module = $_GET['module'];
    }
    
    switch($module){
        case"Authentification":
            require_once "./Modules/$module/$module.php";      
        break;
        default:
            die("Interdiction d'accès à ce module");
    }

    Connexion::initConnexion();
    new $module();
?>