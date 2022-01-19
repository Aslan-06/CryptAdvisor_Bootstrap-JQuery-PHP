<?php
require_once "./Modules/Article/vue_article.php";
require_once "./Modules/Article/modele_Article.php";

class ContArticle{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleArticle();
        $this->vue = new VueArticle();
    }

    public function afficherListe($Article, $page){
        $listeArticles = $this->modele->getListeArticles($Article, $page);
        $this->vue->afficherListe($listeArticles);
    }

    public function afficherArticle($Article){
        $idArticle;
        switch($Article){
            case "Article":
                $idArticle = $_GET['idArticle'];
                break;
            case "Cours":
                $idArticle = $_GET['idCours'];
                break;
            case "Forum":
                $idArticle = $_GET['idForum'];
                break;
        }
        $article = $this->modele->getArticle($Article, $idArticle);
        $this->vue->afficherArticle($article);
    }
}