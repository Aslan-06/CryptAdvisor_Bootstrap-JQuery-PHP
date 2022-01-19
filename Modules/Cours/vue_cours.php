<?php
require_once "./vue_generique.php";

class VueCours extends VueGenerique{

    public function __construct(){}

    public function afficherFormations($formations){
        $_SESSION['listeFormations'] = $formations;
        $this->getAffichage('Cours/listeFormations.php');
    }

    public function afficherListeCours($listeCours){
        $_SESSION['listeCours'] = $listeCours;
        $this->getAffichage('Cours/listeCours.php');
    }

    public function afficherCours($cours){
        $_SESSION['cours'] = $cours;
        $this->getAffichage('Cours/cours.php');
    }
}
