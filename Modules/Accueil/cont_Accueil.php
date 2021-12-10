<?php
require_once "./Modules/Accueil/vue_accueil.php";

class ContAccueil{
    private $vue;

    public function __construct(){
        $this->vue = new VueAccueil();
        $this->vue->accueil();
    }
    
}