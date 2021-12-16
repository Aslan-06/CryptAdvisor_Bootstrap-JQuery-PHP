<?php
require_once "./vue_generique.php";

class VueMembre extends VueGenerique{

    public function __construct(){}

    public function profil(){
        $this->getAffichage('Membre/profil.php');
    }

    public function devenirpremium(){
        $this->getAffichage('Membre/devenirpremium.php');
    }

    public function annulerAbonnement(){
        $this->getAffichage('Membre/annulerAbonnement.php');
    }

    public function mesfavoris(){
        $this->getAffichage('Membre/mesfavoris.php');
    }
}
