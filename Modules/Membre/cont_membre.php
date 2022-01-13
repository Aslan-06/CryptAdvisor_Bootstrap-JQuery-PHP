<?php
require_once "./Modules/Membre/vue_membre.php";
require_once "./Modules/Membre/modele_membre.php";
require_once "./Modules/Authentification/vue_connexion.php";

class ContMembre{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleMembre();
        $this->vue = new VueMembre();
        $this->vueconn = new VueConnexion();
    }

    public function premiumform(){
        if(!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="0") ){
            $this->vue->devenirpremium();
        }
        else if ((!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="1"))){
            $this->vue->annulerAbonnement();
        }
        else if(!empty($_SESSION['pseudo'])){
            $this->vueconn->connexion();
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
        if(isset($_POST['envoyer'])){
            if (isset($_POST["envoyer"]) and !empty($_POST['envoyer']) and ((!isset($_POST['message']) and empty($_POST['message'])) and (!isset($_POST['ans']) and empty($_POST['ans'])))){
                echo"Vous devez choisir un role et ajouter un message";
            } else {
                $message = $_POST['message'];
                $nomduroledemande = $_POST['ans'];
                if($this->modele->getUserRequest($_SESSION['pseudo'])!=NULL){
                    echo"vous avez deja fait une demande";
                }else{
                    $roles = [
                        "admin"=>4,
                        "modo"=>3,
                        "auteur"=>2
                    ];
                    if($roles[$nomduroledemande] == $this->modele->getRole($this->modele->getId($_SESSION['pseudo']))){
                        echo"vous etes deja " . $nomduroledemande;                        
                    } else{
                        $this->modele->addPromoRequest($_SESSION['pseudo'], $roles[$nomduroledemande], $message);
                        echo"votre demande a été envoyée à un admin";
                    }  

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