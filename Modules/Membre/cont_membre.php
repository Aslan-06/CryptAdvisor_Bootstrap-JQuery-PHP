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
        if(!empty($_SESSION['email'])) //aussi vérifier qu'il n'est pas déjà premium
            $this->vue->devenirpremium();
        else 
            $this->vue->annulerAbonnement();
    }

    public function devenirpremium(){
        if (!isset($_POST['nom']) or !isset($_POST['email']) or !isset($_POST['prenom']) or !isset($_POST['pseudo']) or !isset($_POST['password']) or empty($_POST['nom']) or empty($_POST['email']) or empty($_POST['password'])) {

            echo"Tous les champs doivent être remplis!";
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $pseudo =htmlspecialchars( $_POST['pseudo']);
            $password =htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($email, $pseudo);
            if(empty($user)){
                $password = password_hash($password,PASSWORD_BCRYPT);
                $data = array('nom'=>$nom,'prenom'=>$prenom,'pseudo'=>$pseudo,'email'=>$email,'password'=>$password);
                $this->modele->createUser($data);
                echo"Inscription validée";
            } else {
                echo"L'email ou le pseudo entré est déja utilisé";
            }
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