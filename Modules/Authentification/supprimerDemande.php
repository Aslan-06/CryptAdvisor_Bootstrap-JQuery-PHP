<?php
    require_once("../../connexion.php");
    class SupprimeurDemande extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();
            $req;
            switch($demandesDe){
                case "cours":
                    $req = self::$bdd->prepare("DELETE from demandecreationcours where id = ?;");
                    break;
                case "article":
                    $req = self::$bdd->prepare("DELETE from demandecreationarticle where id = ?;");
                    break;
                case "forum":
                    $req = self::$bdd->prepare("DELETE from demandecreationforum where id = ?;");
                    break;
            }
            $req->execute(array($idDemande));
        }
    }

    new SupprimeurDemande();