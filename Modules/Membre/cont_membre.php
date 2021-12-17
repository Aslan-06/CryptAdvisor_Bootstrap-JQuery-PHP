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

    public function premiumform(){
        if(!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="0") ){
            $this->vue->devenirpremium();
        }
        else if ((!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="1"))){
            echo("annuler abonnement");
            $this->vue->annulerAbonnement();
        }
    }

    public function devenirpremium(){
        if (!isset($_POST['Nomcarte']) or !isset($_POST['cardnumber']) or !isset($_POST['expirydate']) or !isset($_POST['cardnumber'])) {
             echo"Tous les champs doivent être remplis!";
         } else {
            $this->modele->addUserPremium($_SESSION['pseudo']);
            echo"vs êtes maintenant premium";
         }
    }

    public function annulerAbonnementform(){
        $this->vue->annulerAbonnement();
    }

    public function mesfavoris(){
        $this->vue->mesfavoris();
    }

    public function profil(){
        $this->vue->profil();
    }
}

?>