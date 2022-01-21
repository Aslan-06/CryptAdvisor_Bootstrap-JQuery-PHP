<?php
require_once './Modules/Article/cont_Article.php';
class Article {
    private $action;
    private $controleur;

    public function __construct($Article){
        $this->init($Article);
    }

    public function init($Article){
        $this->controleur = new ContArticle();
        $this->action = $this->setAction();
        $this->render($Article, $this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "liste";
        }
        return $_GET['action'];
    }

    public function render($Article, $toDO){
        switch ($toDO){
            case "liste":
                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $this->controleur->afficherListe($Article, $page);
                break;
            case "article":
                $this->controleur->afficherArticle($Article);
                break;
            case "posterMessage":
                $this->controleur->posterMessage($_GET["idArticleMessage"]);
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}
