<?php
require_once './Modules/Accueil/cont_Accueil.php';
class Accueil {

    private $controleur;

    public function __construct(){
        $this->controleur = new ContAccueil();
    }
    
}
?>