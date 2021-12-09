
<?php
require_once "./connexion.php";

class ModeleConnexion extends Connexion {

    public function getUser($email){
        $req = self::$bdd->prepare("SELECT * FROM utilisateur WHERE email = :email;");
        $req->bindParam("email",$email);
        $req->execute();
        return $req->fetch();
    }
    function createUser($data){
        $req = self::$bdd->prepare("insert into utilisateur (nom, prenom, pseudo, email, password) values (:nom, :prenom, :pseudo, :email, :password);");
        $req->bindParam(':nom',$data['nom']);
        $req->bindParam(':prenom',$data['prenom']);
        $req->bindParam(':pseudo',$data['pseudo']);
        $req->bindParam(':email',$data['email']);
        $req->bindParam(':password',$data['password']);
        $req->execute();

    }
}