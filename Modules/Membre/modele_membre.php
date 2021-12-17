<?php

require_once "./connexion.php";

    class ModeleMembre extends Connexion{
        public function __construct() {}

        function getForumFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Forum NATURAL JOIN FORUMFAV WHERE idUtilisateur = $id;");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        }

        function getArticleFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Article NATURAL JOIN ARTICLEFAV WHERE idUtilisateur = $id;");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        }

        function getCoursFav($id) {
            $req = self::$bdd->prepare("SELECT * FROM Cours NATURAL JOIN COURSFAV WHERE idUtilisateur = $id;");
            $req->execute();
            $res = $req->fetchAll();
            return $res;
        }

        function addUserPremium($pseudo){
            $req = self::$bdd->prepare("UPDATE Utilisateur SET comptePremium = 1 where pseudo = \"$pseudo\";");
            //$req->bindParam(':pseudo',$pseudo);
            $req->execute();
        }

        function getPremiumUser($pseudo){
            $req = self::$bdd->prepare("SELECT comptePremium FROM Utilisateur where pseudo = \"$pseudo\";");
            //$req->bindParam(':pseudo',$pseudo);
            $req->execute();
            $res = $req->fetch();var_dump($res);
            return $res;
        }
    }

?>