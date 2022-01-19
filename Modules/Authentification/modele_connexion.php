
<?php
require_once "./connexion.php";

class ModeleConnexion extends Connexion {

    public function initDemandesCreation(){
            $req = self::$bdd->prepare("SELECT * FROM demandeCreationArticle;");
            $req->execute();
            $_SESSION['demandesCreationArticle'] = $req->fetchALL(PDO::FETCH_ASSOC);
            $req = self::$bdd->prepare("SELECT * FROM demandeCreationCours;");
            $req->execute();
            $_SESSION['demandesCreationCours'] = $req->fetchALL(PDO::FETCH_ASSOC);
            $req = self::$bdd->prepare("SELECT * FROM demandeCreationForum;");
            $req->execute();
            $_SESSION['demandesCreationForum'] = $req->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getUser($pseudo){
        $req = self::$bdd->prepare("SELECT * FROM Utilisateur WHERE pseudo = :pseudo;");
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