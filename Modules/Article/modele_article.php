
<?php
require_once "./connexion.php";

class ModeleArticle extends Connexion {

    public function getListeArticles(){
        $req = self::$bdd->prepare("SELECT idArticle, titre, nbVues, likes, dateCreaArticle FROM Article");
        $req->execute();
        $listeArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        return $listeArticles;
    }

    public function getArticle($id){
        $req = self::$bdd->prepare("SELECT titre, contenuArticle FROM Article where id = ?");
        $req->bind_param("i", $id);
        $req->execute();
        $rticles = $req->fetch(PDO::FETCH_OBJ);
        return $articles;
    }
}