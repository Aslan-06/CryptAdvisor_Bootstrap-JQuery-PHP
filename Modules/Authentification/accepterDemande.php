<?php
    require_once("../../connexion.php");
    class AccepteurDemande extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();

            $reqCreate;
            $reqGet;
            switch($demandesDe){
                case "cours":
                    $reqGet = self::$bdd->prepare("SELECT pseudoUtilisateur, titre, contenu, idFormation from demandecreationcours where id = ?;");
                    $reqGet->execute(array($idDemande));
                    $demande = $reqGet->fetch(PDO::FETCH_ASSOC);
                    $req = self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?");
                    $req->execute(array($demande['pseudoUtilisateur']));
                    $idUtilisateur = $req->fetch(PDO::FETCH_ASSOC)['idUtilisateur'];
                    $reqCreate = self::$bdd->prepare("INSERT INTO Cours(titre, contenu, idUtilisateur, idFormation) VALUES(?,?,?,?);");
                    $reqCreate->execute(array($demande['titre'], $demande['contenu'], $idUtilisateur, $demande['idFormation']));
                    break;
                case "article":
                    $reqGet = self::$bdd->prepare("SELECT pseudoUtilisateur, titre, contenu, dateCreation from demandecreationarticle where id = ?;");
                    $reqCreate = self::$bdd->prepare("INSERT INTO Article(titre, contenuArticle, idUtilisateur, dateCreaArticle) VALUES(?,?,?,?);");
                    break;
                case "forum":
                    $reqGet = self::$bdd->prepare("SELECT pseudoUtilisateur, titre, contenu, dateCreation from demandecreationforum where id = ?;");
                    $reqCreate = self::$bdd->prepare("INSERT INTO Forum(titre, contenu, idUtilisateur, dateCrea) VALUES(?,?,?,?);");
                    break;
            }
            $reqGet->execute(array($idDemande));
            $demande = $reqGet->fetch(PDO::FETCH_ASSOC);
            $req = self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?");
            $req->execute(array($demande['pseudoUtilisateur']));
            $idUtilisateur = $req->fetch(PDO::FETCH_ASSOC)['idUtilisateur'];
            $reqCreate->execute(array($demande['titre'], $demande['contenu'], $idUtilisateur, $demande['dateCreation']));
        }
    }

    new AccepteurDemande();