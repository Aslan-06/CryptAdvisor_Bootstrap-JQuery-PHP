<?php
require_once "./Modules/Cours/vue_cours.php";
require_once "./Modules/Cours/modele_Cours.php";

class ContCours{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleCours();
        $this->vue = new VueCours();
    }

    public function afficherFormations(){
        $listeFormations = $this->modele->getFormations();
        $this->vue->afficherFormations($listeFormations);
    }

    public function afficherListeCours($idFormation, $page){
        $listeCours = $this->modele->getListeCours($idFormation, $page);
        $this->vue->afficherListeCours($listeCours);
    }

    public function afficherCours(){
        $cours = $this->modele->getCours();
        $this->vue->afficherCours($cours);
    }
}