    <h2>Formations</h2>
<?php
    $nbFormations = count($_SESSION['listeFormations']);
    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];
        if($role >=3 && !empty($_SESSION['demandesCreationCours'])){ 
?>
                <div class="container alert alert-dark notification-de-demandes" role="alert">
                    Il exite des demandes de creation des cours, vous pouvez les accepter ou refusér dans votre <a href="index.php?module=Authentification&action=profil" class="alert-link">profil</a>.
                </div>
<?php
        }
        if($role >= 2)
            require_once('Templates/Cours/creation.php');
    }

    for($formationCompteur=0; $formationCompteur < $nbFormations; $formationCompteur++){
        //chaque tuple
        $formation = $_SESSION['listeFormations'][$formationCompteur];
        //tous les attributs de tuple courrant
        $idFormation = $formation['idFormation'];
        $nom = $formation['nom'];
?>
        <div class="container">
                 <div class="d-grid gap-10">
                    <div class="p-2">
                        <a href="index.php?module=Cours&action=listeCours&idFormation=<?=$idFormation?>">
                            <div class="container articles">
                                <div class="jumbotron">
                                    <h1 class="display-6"> <?=$nom?></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
 <?php
    }