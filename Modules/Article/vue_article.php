<?php
require_once "./vue_generique.php";

class VueArticle extends VueGenerique{

    public function __construct(){}

    public function afficherArticles($articles){
        $_SESSION['articles'] = $articles;
        $this->getAffichage('Article/article.php');
    }
}
