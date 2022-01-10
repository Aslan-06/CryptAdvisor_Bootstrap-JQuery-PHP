<?php

require_once "./connexion.php";

    class ModeleMembre extends Connexion{
        public function __construct() {}

        function getId($pseudo) {
            $req= self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?;");
            $req->execute([$pseudo]);
            return $req->fetch();
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
            $res = $req->fetch();var_dump($res);
            return $res;
        }

        function removeUserPremium($pseudo){
            $req = self::$bdd->prepare("UPDATE Utilisateur SET comptePremium = 0 where pseudo = ?;");
            $req->execute([$pseudo]);
        }
    }

?>