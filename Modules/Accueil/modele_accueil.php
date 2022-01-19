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
    
    public function last3articles(){
        $req = self::$bdd->prepare("SELECT * from Article ORDER BY dateCreaArticle DESC LIMIT 3;");
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
}