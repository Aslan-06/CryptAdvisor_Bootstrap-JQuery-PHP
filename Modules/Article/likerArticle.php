<?php
    require_once("../../connexion.php");
    class LikeurArticle extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();

            $req;
            switch($ceQuonVeutAfficher){
                case "Article":
                    $req = self::$bdd->prepare("UPDATE Article SET likes = likes+1 where idArticle = ?");
                    break;
                case "Forum":
                    $req = self::$bdd->prepare("UPDATE Forum SET likes = likes+1 where idForum = ?");
                    break;
            }
            $req->execute(array($idArticle));
        }
    }

    new LikeurArticle();