<?php
require_once "./vue_generique.php";

class VueMembre extends VueGenerique{

    public function __construct(){}

    public function profil(){
        $this->getAffichage('Authentification/profil.php');
    }

    public function devenirpremium(){
        $this->getAffichage('Authentification/devenirpremium.php');
    }

    public function annulerAbonnement(){
        $this->getAffichage('Authentification/annulerAbonnement.php');
    }

    public function mesfavoris(){
        $this->getAffichage('Authentification/mesfavoris.php');
    }
}
