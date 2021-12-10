<?php
require_once "./Modules/Membre/vue_membre.php";
require_once "./Modules/Membre/modele_membre.php";

class ContMembre{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleMembre();
        $this->vue = new VueMembre();
    }

    public function profil(){
        $this->vue->profil();
    }

    public function devenirpremium(){
        $this->vue->devenirpremium();
    }

    public function annulerAbonnement(){
        $this->vue->annulerAbonnement();
    }

    public function mesfavoris(){
        $this->vue->mesfavoris();
    }
}