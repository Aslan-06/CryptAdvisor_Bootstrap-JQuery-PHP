<?php
require_once "./vue_generique.php";

class VueMembre extends VueGenerique{

    public function __construct(){}

    public function devenirpremium(){
        $this->getAffichage('Membre/devenirpremium.php');
    }

    public function annulerAbonnement(){
        $this->getAffichage('Membre/annulerAbonnement.php');
    }

    public function coursfav(){
        $this->getAffichage('Membre/coursfav.php');
    }

    public function forumfav(){
        $this->getAffichage('Membre/forumfav.php');
    }

    public function artfav(){
        $this->getAffichage('Membre/artfav.php');
    }

    public function demanderoleforum(){
        $this->getAffichage('Membre/demanderole.php');
    }

    public function afficherDemandes(){
        $this->getAffichage('Membre/listeDemandes.php');
    }
}
