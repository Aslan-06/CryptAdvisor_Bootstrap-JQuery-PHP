
<?php
require_once "./connexion.php";

class ModeleConnexion extends Connexion {

    public function getUser($email, $pseudo){
        $req = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE email = :email AND pseudo = :pseudo;");
        $req->bindParam("email",$email);
        $req->bindParam("pseudo", $pseudo);
        $req->execute();
        return $req->fetch();
    }
    function createUser($data){
        $req = self::$bdd->prepare("insert into Utilisateur (nom, prenom, pseudo, email, mdp) values (:nom, :prenom, :pseudo, :email, :password);");
        $req->bindParam(':nom',$data['nom']);
        $req->bindParam(':prenom',$data['prenom']);
        $req->bindParam(':pseudo',$data['pseudo']);
        $req->bindParam(':email',$data['email']);
        $req->bindParam(':password',$data['password']);
        $req->execute();
    }

    public function getRole($pseudo){
        $req = self::$bdd->prepare("SELECT idRole FROM Utilisateur WHERE pseudo = :pseudo;");
        $req->bindParam("pseudo", $pseudo);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC)['idRole'];
    }
}