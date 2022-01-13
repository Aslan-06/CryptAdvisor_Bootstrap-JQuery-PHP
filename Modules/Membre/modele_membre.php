<?php

require_once "./connexion.php";

    class ModeleMembre extends Connexion{
        public function __construct() {}

        function getId($pseudo) {
            $req= self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?;");
            $req->execute([$pseudo]);
            return $req->fetch();
        }

        function getRole($id){
            $id = $id->idUtilisateur;
            $req= self::$bdd->prepare("SELECT idRole FROM Utilisateur WHERE idUtilisateur = :id;");
            $req->bindParam(':id',$id);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC)['idRole'];
        }

        function getForumFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Forum NATURAL JOIN FORUMFAV WHERE idUtilisateur = ?;");
            $req->execute([$id]);
            $res = $req->fetchAll();
            return $res;
        }

        function getArticleFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Article NATURAL JOIN ARTICLEFAV WHERE idUtilisateur = :id;");
            $req->execute([$id]);
            $res = $req->fetchAll();
            return $res;
        }

        function getCoursFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Cours NATURAL JOIN COURSFAV WHERE idUtilisateur = ?;");
            $req->execute([$id]);
            $res = $req->fetchAll();
            return $res;
        }

        function addUserPremium($pseudo){
            $req = self::$bdd->prepare("UPDATE Utilisateur SET comptePremium = 1 where pseudo = ?;");
            $req->execute([$pseudo]);
        }

        function getPremiumUser($pseudo){
            $req = self::$bdd->prepare("SELECT comptePremium FROM Utilisateur where pseudo = ?;");
            $req->execute([$pseudo]);
            $res = $req->fetch();
            return $res;
        }

        function removeUserPremium($pseudo){
            $req = self::$bdd->prepare("UPDATE Utilisateur SET comptePremium = 0 where pseudo = ?;");
            $req->execute([$pseudo]);
        }

        function addPromoRequest($pseudo, $roledemande, $message){
            $req = self::$bdd->prepare("INSERT INTO DemandePromo (pseudoUtilisateur, roleDemande, messagePromo) VALUES (:pseudo, :roledemande, :msg); ");
            $req->bindParam(':pseudo', $pseudo);
            $req->bindParam(':roledemande', $roledemande);
            $req->bindParam(':msg', $message);
            $req->execute();
        }

        function getUserRequest($pseudo){
            $req = self::$bdd->prepare("SELECT * FROM DemandePromo where pseudoUtilisateur = :pseudo;");
            $req->bindParam(':pseudo', $pseudo);
            $req->execute();
            return $req->fetch();
        }

        function getAllrequests(){
            $req = self::$bdd->prepare("SELECT * FROM DemandePromo;");
            $res = $req->fetchAll();
            return $res;
        }

        function accepterPromo($pseudo, $roledemande){
            $req = self::$bdd->prepare("UPDATE Utilisateur SET idRole = :roledemande WHERE idUtilisateur = :pseudo");
            $req->bindParam(':pseudo', $pseudo);
            $req->bindParam(':roledemande', $roledemande);
            $req->execute();
            $this->supprimerPromo($pseudo);
        }

        function supprimerPromo($pseudo){
            $req = self::$bdd->prepare("DELETE * FROM DemandePromo where pseudoUtilisateur = :pseudo;");
            $req->bindParam(':pseudo', $pseudo);
            $req->execute();
        }
    }

?>