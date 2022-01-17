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
        if(empty($_SESSION['pseudo']))
            $this->vue->connexion();
        else
            echo("déjà co");
    }

    public function connexionform(){
        if ( !isset($_POST['pseudo']) or !isset($_POST['password']) or  empty($_POST['pseudo']) or empty($_POST['password'])) {
            $_SESSION["erreur"] = "Tous les champs doivent être remplis !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=connexion");
                }
        } else {
            $pseudo =htmlspecialchars( $_POST['pseudo']);
            $password = htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($pseudo);
            

            if(empty($user)){
                $_SESSION["erreur"] = "Ce pseudo n'existe pas !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=connexion");
                }
            } else {
                $verifPassword = password_verify($password,$user->password);
                if($verifPassword){
                    if(session_status()== PHP_SESSION_DISABLED) 
                        session_start();
                    $_SESSION['pseudo'] = $pseudo;
                    $this->profile();
                } else{
                    $_SESSION["erreur"] = "Votre mot de passe est incorrect";
                    if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                        header("Location: ".$_SERVEUR['HTTP_REFERER']);
                        exit();
                    }else{
                        header("Location: index.php?module=Authentification&action=connexion");
                    }
                }

            }
        }
    }
    public function inscription(){
        $this->vue->inscription();
    }

    public function inscriptionForm(){

        if (!isset($_POST['nom']) or !isset($_POST['email']) or !isset($_POST['prenom']) or !isset($_POST['pseudo']) or !isset($_POST['password']) or empty($_POST['nom']) or empty($_POST['email']) or empty($_POST['password'])) {

            $_SESSION["erreur"] = "Tous les champs doivent être remplis !";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=inscription");
                }
        } else {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $pseudo =htmlspecialchars( $_POST['pseudo']);
            $password =htmlspecialchars($_POST['password']);
            $user = $this->modele->getUser($pseudo);
            if(empty($user)){
                $password = password_hash($password,PASSWORD_BCRYPT);
                $data = array('nom'=>$nom,'prenom'=>$prenom,'pseudo'=>$pseudo,'email'=>$email,'password'=>$password);
                $this->modele->createUser($data);
                echo"Inscription validée";
            } else {
                $_SESSION["erreur"] = "L'email ou le pseudo entré est déja utilisé";
                if(!headers_sent() and isset($_SERVEUR['HTTP_REFERER']) and !empty($_SERVEUR['HTTP_REFERER'])){
                    header("Location: ".$_SERVEUR['HTTP_REFERER']);
                    exit();
                }else{
                    header("Location: index.php?module=Authentification&action=inscription");
                }
            }
        }
    }

    public function deconnexion(){
        if(!empty($_SESSION['pseudo'])){
            unset($_SESSION['pseudo']);
            $this->vue->connexion();
        }
        include_once "connexion.php";
    }

    public function profile(){
        $this->vue->profile();
    }

}