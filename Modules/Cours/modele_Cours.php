<?php
require_once "./connexion.php";

class ModeleCours extends Connexion {
    public function getFormations(){
        $req = self::$bdd->prepare("SELECT idFormation, nom FROM Formation");
        $req->execute();
        $listeFormations = $req->fetchAll(PDO::FETCH_ASSOC);
        return $listeFormations;
    }

    public function getListeCours($idFormation, $page){
        if($page < 1)
            $page = 1;
        $listeDebut = ($page-1)*5;
        $req = self::$bdd->prepare("SELECT idCours, titre, contenu, nbVues FROM Cours WHERE idFormation = ? LIMIT 5 OFFSET ?");
        $req->bindParam(1, $idFormation, PDO::PARAM_INT);
        $req->bindParam(2, $listeDebut, PDO::PARAM_INT);
        $req->execute();
        $listeCours = $req->fetchAll(PDO::FETCH_ASSOC);
        $req = self::$bdd->prepare("SELECT count(*) as nbCours FROM Cours WHERE idFormation = ?;");
        $req->execute(array($idFormation));
        $nbCours = $req->fetch(PDO::FETCH_ASSOC)['nbCours'];

        $listeCours['nbCours'] = $nbCours;
        $listeCours['page']=$page;

        return $listeCours;
    }

    public function getCours(){
        $req = self::$bdd->prepare("UPDATE Cours SET nbVues = nbVues+1 where idCours = ?");
        $req->bindParam(1, $_GET['idCours'], PDO::PARAM_INT);
        $req->execute();
        
        $req = self::$bdd->prepare("SELECT titre, contenu FROM Cours where idCours = ?");
        $req->bindParam(1, $_GET['idCours'], PDO::PARAM_INT);
        $req->execute();
        $cours = $req->fetch(PDO::FETCH_ASSOC);
        return $cours;
    }

}