<?php
require_once './Modules/Article/Article.php' ;
require_once './Modules/Cours/cont_Cours.php';
class Cours {

    private $action;
    private $controleur;

    public function __construct(){
       $this->controleur = new ContCours();
       $this->action = $this->setAction();
       $this->render($this->action);
   }

   public function setAction(){
       if(!isset($_GET['action'])){
           $_GET['action'] = "formations";
       }
       return $_GET['action'];
   }

    public function render($toDO){
        switch ($toDO){
            case "formations":
                $this->controleur->afficherFormations();
                break;
            case "listeCours":
                $page = 1;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                $idFormation = $_GET['idFormation'];
                $this->controleur->afficherListeCours($idFormation, $page);
                break;
            case "cours":
                $this->controleur->afficherCours();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }   
}
