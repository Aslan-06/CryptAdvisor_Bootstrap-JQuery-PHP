<?php
require_once "./Modules/Article/vue_article.php";
require_once "./Modules/Article/modele_article.php";

class ContArticle{
    private $modele;
    private $vue;

    public function __construct(){
        $this->modele = new ModeleArticle();
        $this->vue = new VueArticle();
    }

    public function afficherListe($page){
        $listeArticles = $this->modele->getListeArticles($page);
        $this->vue->afficherListe($listeArticles);
    }

    public function afficherArticle(){
        $idArticle = $_GET['idArticle'];
        $article = $this->modele->getArticle($idArticle);
        $this->vue->afficherArticle($article);
    }

    public function creerArticle(){

    }
}