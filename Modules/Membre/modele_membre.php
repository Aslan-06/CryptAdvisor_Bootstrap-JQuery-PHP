<?php

require_once "./connexion.php";

    class ModeleEquipes extends Connexion{
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
    }

?>