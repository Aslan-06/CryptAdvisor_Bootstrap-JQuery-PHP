
<?php
    
    require_once("../../connexion.php");
    class CreateurArticle extends Connexion{

        public function __construct(){
            extract($_POST);
            self::initConnexion();
            if($role > 2){ //moderateur ou admin
                $req = self::$bdd->prepare("SELECT idUtilisateur FROM Utilisateur WHERE pseudo = ?");
                $req->bindParam(1, $pseudo, PDO::PARAM_STR);
                $req->execute();
                $idUtilisateur = $req->fetch(PDO::FETCH_ASSOC)['idUtilisateur'];
                
                $req;
                switch($creerQuoi){
                    case "Article":
                        $req = self::$bdd->prepare("INSERT INTO Article(titre, contenuArticle, idUtilisateur, dateCreaArticle) VALUES(?,?,?,now())");
                        break;
                    case "Forum":
                        $req = self::$bdd->prepare("INSERT INTO Forum(titre, contenu, idUtilisateur, dateCrea) VALUES(?,?,?,now())");
                        break;
                }
                $req->execute(array($titre, $contenu, $idUtilisateur));

                echo 1;
            }
            else{ //role = 2
                $req;
                switch($creerQuoi){
                    case "Article":
                        $req = self::$bdd->prepare('INSERT INTO demandeCreationArticle(pseudoUtilisateur, titre, contenu, dateCreation) VALUES(:pseudo,:titre,:contenu, now())');
                        break;
                    case "Forum":
                        $req = self::$bdd->prepare('INSERT INTO demandeCreationForum(pseudoUtilisateur, titre, contenu, dateCreation) VALUES(:pseudo,:titre,:contenu, now())');
                        break;
                }
                
                $req->bindParam(':pseudo', $pseudo);
                $req->bindParam(':titre', $titre);
                $req->bindParam(':contenu', $contenu);
                $req->execute();
                
                echo 2;
            }
        }
    }

    new CreateurArticle();
