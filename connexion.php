<?php

    class Connexion {

        protected static $bdd = NULL;

        public static function initConnexion() {
            $username = "dutinfopw201649";
            $password = "tazyzuve";
            $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201649";

            try {
                self::$bdd = new PDO($dns, $username, $password);
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            
        }
    }   
?>