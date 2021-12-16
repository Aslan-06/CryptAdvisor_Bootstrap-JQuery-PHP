<?php
require_once "./Modules/Authentification/vue_connexion.php";
require_once "./Modules/Authentification/modele_connexion.php";

class ContConnexion{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();

    }
    
    public function connexion(){
        if(empty($_SESSION['email']))
            $this->vue->connexion();
    }

    public function connexionform(){
        if ( !isset($_POST['email']) or !isset($_POST['password']) or  empty($_POST['email']) or empty($_POST['password'])) {
            echo"Tous les champs doivent être remplis!";
        } else {
            $email = htmlspecialchars($_POST['email']);
            $pseudo =htmlspecialchars( $_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($email, $pseudo);

            if(empty($user)){
                echo"Ce mail n'existe pas!";
            } else {
                $verifPassword = password_verify($password,$user->password);
                if($verifPassword){
                    if(session_status()== PHP_SESSION_DISABLED) session_start();
                    $_SESSION['email'] = $email;
                    $this->profile();
                } else{
                    echo"Mot de passe incorrect";
                }

            }
        }
    }
    public function inscription(){
        $this->vue->inscription();
    }

    public function inscriptionForm(){

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

    public function deconnexion(){
        if(!empty($_SESSION['email']))
            unset($_SESSION['email']);
        include_once "connexion.php";

    }

    public function profile(){
        $this->vue->profile();
    }


}