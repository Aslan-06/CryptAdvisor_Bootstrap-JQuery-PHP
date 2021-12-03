<?php
include "./vue.php";
require_once "./connexion.php";

    class Controleur extends Connexion {
        private $vue;
        private $tab;
        private $action;

        public function __construct() {
            $this->vue = new Vue();
            $this->action = $this->recupererAction();

            switch ($this->action) {
                case'bla':
                    $this->bla();
            }
        }

        function recupererAction(){
            if(!isset($_GET['action'])){
                $_GET['action'] = 'bienvenue';
            }
            return $_GET['action'];

        }

        function bienvenue() {
            $this->vue_generique->getAffichage('Authentification/inscription.php');
        }

    }

?>