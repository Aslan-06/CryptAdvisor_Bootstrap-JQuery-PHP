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

    public function afficher(){
        $articles = $this->modele->getArticles();
        $this->vue->afficherArticles($articles);
    }
}