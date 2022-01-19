<?php
require_once "./connexion.php";

class ModeleAccueil extends Connexion{

    public function findArticle($tag){
        $req = self::$bdd->prepare("SELECT * FROM Article WHERE hashtag like :tag LIMIT 10 ;");
        $tag = "%".$tag."%";
        $req->bindParam(':tag',$tag);
        $req->execute();
        return $req->fetchAll();
    }
}