
<?php
require_once "./connexion.php";

class ModeleArticle extends Connexion {

    public function getArticles(){
        $req = self::$bdd->prepare("SELECT titre, contenuArticle, nbVues, likes, dateCreaArticle FROM Article");
        $req->execute();
        return $req->fetchAll();
    }
}