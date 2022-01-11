
<?php
require_once "./connexion.php";

class ModeleArticle extends Connexion {

    public function getListeArticles($page){
        $listeDebut = ($page-1)*10;
        $req = self::$bdd->prepare("SELECT idArticle, titre, contenuArticle, nbVues, likes, dateCreaArticle FROM Article LIMIT 10 OFFSET ?");
        $req->bindParam(1, $listeDebut, PDO::PARAM_INT);
        $req->execute();
        $listeArticles = $req->fetchAll(PDO::FETCH_ASSOC);
        $listeArticles['page']=$page;
        return $listeArticles;
    }

    public function getArticle($id){
        $req = self::$bdd->prepare("UPDATE Article SET nbVues = nbVues+1 where idArticle = ?");
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();
        $req = self::$bdd->prepare("SELECT titre, contenuArticle FROM Article where idArticle = ?");
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();
        $article = $req->fetch(PDO::FETCH_ASSOC);
        return $article;
    }
}