<?php
require_once './Modules/Article/cont_Article.php';
class Article {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContArticle();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "liste";
        }
        return $_GET['action'];
    }

    public function render($toDO){
        switch ($toDO){
            case "liste":
                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $this->controleur->afficherListe($page);
                break;
            case "article":
                $this->controleur->afficherArticle();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}
