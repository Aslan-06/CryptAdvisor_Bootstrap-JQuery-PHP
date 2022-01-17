<?php
require_once "./connexion.php";

class ModeleAccueil extends Connexion{

    public function findArticle($id){
        $req = self::$bdd->prepare("SELECT * FROM Article WHERE idHashtag = :id ;");
        $req->bindParam("id", $id);
        $req->execute();
        return $req->fetch();
    }

    // select * from Article where idHashtag = :idhash;

    public function findIdHash($tag){
        $req = self::$bdd->prepare("SELECT * FROM Hashtag WHERE nom like :tag LIMIT 10;");
        $tag = "%".$tag."%";
        $req->bindParam("tag",$tag);
        $req->execute();
        return $req->fetchAll();
    }
}