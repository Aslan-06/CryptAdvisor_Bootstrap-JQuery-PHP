<?php
require_once "./connexion.php";

class ModeleArticle extends Connexion {
    public function getListeArticles($Article, $page){
        if($page < 1)
            $page = 1;
        $listeDebut = ($page-1)*5;
        $req;
        switch($Article){
            case "Article":
                $req = self::$bdd->prepare("SELECT idArticle, titre, contenuArticle, nbVues, likes, dateCreaArticle FROM Article LIMIT 5 OFFSET ?");
                break;
            case "Forum":
                $req = self::$bdd->prepare("SELECT idForum, titre, contenu, nbVues, likes, dateCrea FROM Forum LIMIT 5 OFFSET ?");
                break;
        }
        $req->bindParam(1, $listeDebut, PDO::PARAM_INT);
        $req->execute();
        $listeArticles = $req->fetchAll(PDO::FETCH_ASSOC);

        switch($Article){
            case "Article":
                $req = self::$bdd->prepare("SELECT count(*) as nbArticles FROM Article;");
                break;
            case "Forum":
                $req = self::$bdd->prepare("SELECT count(*) as nbArticles FROM Forum;");
                break;
                
        }
        $req->execute();
        $nbArticles = $req->fetch(PDO::FETCH_ASSOC)['nbArticles'];

        $listeArticles['nbArticles'] = $nbArticles;
        $listeArticles['ceQuonVeutAfficher']=$Article; // "Article", "Cours" ou "Forum"
        $listeArticles['page']=$page;
        return $listeArticles;
    }

    public function getArticle($Article, $id){
        $req;
        switch($Article){
            case "Article":
                $req = self::$bdd->prepare("UPDATE Article SET nbVues = nbVues+1 where idArticle = ?");
                break;
            case "Forum":
                $req = self::$bdd->prepare("UPDATE Forum SET nbVues = nbVues+1 where idForum = ?");
                break;
        }
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();

        $req;
        
        switch($Article){
            case "Article":
                $req = self::$bdd->prepare("SELECT titre, contenuArticle FROM Article where idArticle = ?");
                break;
            case "Forum":
                $req = self::$bdd->prepare("SELECT titre, contenu FROM Forum where idForum = ?");
                break;
        }
        $req->bindParam(1, $id, PDO::PARAM_INT);
        $req->execute();
        $article = $req->fetch(PDO::FETCH_ASSOC);
        $article['ceQuonVeutAfficher']=$Article;
        return $article;
    }

    public function posterMessage($idArticle, $pseudo, $message){
        $req = self::$bdd->prepare("INSERT INTO Message (pseudoUtilisateur, texte, datePublication, idArticle) VALUES (:pseudo, :texte, now(), :idArticle); ");
        $req->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $req->bindParam(':pseudo', $pseudo);
        $req->bindParam(':texte', $message);
        $req->execute();
    }

    public function getAllComments($idArticle){
        $req = self::$bdd->prepare("SELECT * from Message where idArticle = :idArticle;");
        $req->bindParam(':idArticle', $idArticle);
        $req->execute();
        $res = $req->fetchAll();
        return $res;
    }
}