<?php

    class Connexion {

        protected static $bdd = NULL;

        public static function initConnexion() {
            $username = "root";
            $password = "";
            $dns = "mysql:host=localhost;dbname=cryptadvisor";
            
            
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