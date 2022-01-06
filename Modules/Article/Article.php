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
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){

            case "liste":
                $this->controleur->afficherListe();
                break;
            case "article":
                $this->controleur->afficherArticle();
                break;
            case "creation":
                $this->controleur->creerArticle();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}
