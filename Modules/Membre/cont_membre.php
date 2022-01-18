<?php
require_once "./Modules/Membre/vue_membre.php";
require_once "./Modules/Membre/modele_membre.php";
require_once "./Modules/Authentification/vue_connexion.php";
require_once "./Modules/Accueil/vue_accueil.php";

class ContMembre{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleMembre();
        $this->vue = new VueMembre();
        $this->vueconn = new VueConnexion();
        $this->vueacc = new VueAccueil();
    }

    public function premiumform(){
        if(!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="0") ){
            $this->vue->devenirpremium();
        }
        else if ((!empty($_SESSION['pseudo']) && ($this->modele->getPremiumUser($_SESSION['pseudo'])->comptePremium=="1"))){
            $this->vue->annulerAbonnement();
        }else {
            $this->vueconn->connexion();
        }

    }

    public function devenirpremium(){
        if (empty($_POST['Nomcarte']) or empty($_POST['cardnumber']) or empty($_POST['expirydate']) or empty($_POST['cardnumber'])) {
             $_SESSION["erreur"] = "Tous les champs doivent être remplis !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Membre&action=premiumform");
                }
         } else {
            $this->modele->addUserPremium($_SESSION['pseudo']);
            $this->vueacc->accueil();
         }
    }

    public function promotionform(){
        if(isset($_POST['envoyer'])){
            if (empty($_POST['envoyer']) or empty($_POST['message']) or empty($_POST['ans'])){
                $_SESSION["erreur"] = "Vous devez choisir un role et ajouter un message !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Membre&action=promotion");
                }
            } else {
                $message = $_POST['message'];
                $nomduroledemande = $_POST['ans'];
                if($this->modele->getUserRequest($_SESSION['pseudo'])!=NULL){
                    $_SESSION["erreur"] = "vous avez deja fait une demande";
                    if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                        header("Location: ".$_SERVEUR['HTTP_REFERER']);
                        exit();
                    }else{
                        header("Location: index.php?module=Membre&action=promotion");
                    }
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

    public function voirdemandes(){
        $listDemandes = $this->modele->getAllrequests();
        $_SESSION['listeDemandes'] = $listDemandes;
        $this->vue->afficherDemandes();
    }

    public function annulerAbonnement(){
        $this->modele->removeUserPremium($_SESSION['pseudo']);
        $this->vue->devenirpremium();
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

    public function refuserPromo($pseudo){
        $this->modele->supprimerPromo($pseudo);
    }

    public function accepterPromo($pseudo, $roledemande){
        $this->modele->accepterPromo($pseudo, $roledemande);
        $this->vue->afficherDemandes();
    }

}

?>