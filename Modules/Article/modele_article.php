
<?php
require_once "./connexion.php";

class ModeleArticle extends Connexion {

    public function getArticles(){
        $req = self::$bdd->prepare("SELECT idArticle, titre, nbVues, likes, dateCreaArticle FROM Article");
        $req->execute();
        $listeArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        return $listeArticles;
    }

    public function getArticle($id){
        $req = self::$bdd->prepare("SELECT titre, contenuArticle, nbVues, likes, dateCreaArticle FROM Article");
        $req->execute();
        $listeArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        return $listeArticles;
    }
}