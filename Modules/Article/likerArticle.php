<?php
    require_once("../../connexion.php");
    class LikeurArticle extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();
            echo $idArtticle;
            $req = self::$bdd->prepare("UPDATE Article SET likes = likes+1 where idArticle = ?");
            $req->execute(array($idArticle));
        }
    }

    new LikeurArticle();