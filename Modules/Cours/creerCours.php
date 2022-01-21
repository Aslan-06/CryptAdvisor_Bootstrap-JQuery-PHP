<?php
    
    require_once("../../connexion.php");
    class CreateurCours extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();
            if($role > 2){ //moderateur ou admin
                $req = self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?");
                $req->bindParam(1, $pseudo, PDO::PARAM_STR);
                $req->execute();
                $idUtilisateur = $req->fetch(PDO::FETCH_ASSOC)['idUtilisateur'];
                
                $req = self::$bdd->prepare("INSERT INTO Cours(titre, contenu, idUtilisateur, idFormation) VALUES(?,?,?,?)");
                $req->execute(array($titre, $contenu, $idUtilisateur, $idFormation));

                echo 1;
            }
            else{ //role = 2
                $req = self::$bdd->prepare("INSERT INTO demandeCreationCours(pseudoUtilisateur, titre, contenu, idFormation) VALUES(:pseudo,:titre,:contenu,:idFormation);");
                $req->bindParam(':pseudo', $pseudo);
                $req->bindParam(':titre', $titre);
                $req->bindParam(':contenu', $contenu);
                $req->bindParam(':idFormation', $idFormation);
                $req->execute();

                echo 2;
            }
        }
    }

    new CreateurCours();
