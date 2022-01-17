<?php
require_once "./vue_generique.php";

class VueArticle extends VueGenerique{

    public function __construct(){}

    public function afficherListe($articles){
        $_SESSION['listeArticles'] = $articles;
        $this->getAffichage('Article/listeArticles.php');
    }

    public function afficherArticle($article){
        $_SESSION['article'] = $article;
        $this->getAffichage('Article/article.php');
    }
}
