
<?php
require_once './Modules/Authentification/cont_Connexion.php';
class Authentification {
    private $action;
    private $controleur;

    public function __construct(){
        $this->controleur = new ContConnexion();
        $this->action = $this->setAction();
        $this->render($this->action);
    }

    public function setAction(){
        if(!isset($_GET['action'])){
            $_GET['action'] = "inscription";
        }
        return $_GET["action"];
    }

    public function render($toDO){
        switch ($toDO){

            case "connexion":
                $this->controleur->inscription();
                break;
            default:
                echo"accès interdit";
                break;
        }
    }
}