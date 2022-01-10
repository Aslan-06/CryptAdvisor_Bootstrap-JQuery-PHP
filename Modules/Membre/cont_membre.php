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

    public function promotionform(){
        if (!isset($_POST['message']) OR !isset($_POST['ans'])){
            echo"pas remplis";
        } else {
            $roledemande = $_POST['ans'];
            if ($roledemande == 'auteur'){
                if($this->modele->getRole($this->modele->getId($_SESSION['pseudo'])=="2")){
                    echo"vous etes deja auteur";
                }else{
                    //ajouter la demande dans la bd
                    echo"votre demande a été envoyée à un admin";
                }
            }
            if ($roledemande == 'modo'){
                if($this->modele->getRole($this->modele->getId($_SESSION['pseudo'])=="3")){
                    echo"vous etes deja modo";
                }else{
                    //ajouter la demande dans la bd
                    echo"votre demande a été envoyée à un admin";
                }
            }
            if ($roledemande == 'admin'){
                if($this->modele->getRole($this->modele->getId($_SESSION['pseudo'])=="4")){
                    echo"vous etes deja admin";
                }else{
                    //ajouter la demande dans la bd
                    echo"votre demande a été envoyée à un admin";
                }
            } 
        }
    }

    public function annulerAbonnement(){
        $this->modele->removeUserPremium($_SESSION['pseudo']);
    }

    public function annulerAbonnementform(){
        $this->vue->annulerAbonnement();
    }

    public function mesarticlesfavoris(){
        $this->tab = $this->modele->getArticleFav($this->modele->getId($_SESSION['pseudo']));
        $this->vue->artfav($this->tab);
    }

    public function mesforumsfavoris(){
        $this->tab = $this->modele->getForumFav($this->modele->getId($_SESSION['pseudo']));
        
        $this->vue->forumfav($this->tab);
    }

    public function mescoursfavoris(){
        $this->tab = $this->modele->getCoursFav($this->modele->getId($_SESSION['pseudo']));
        $this->vue->coursfav($this->tab);
    }

    public function demanderole(){
        $this->vue->demanderoleforum(); 
    }

    

}

?>