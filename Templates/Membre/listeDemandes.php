<?php
    //parcours de la table demandes
    $nbDemandes = count($_SESSION['listeDemandes']);
    if(empty($_SESSION['listeDemandes'])){ ?>
        <p class="text-center"> Il n'y a aucune demande pour l'instant. </p>
<?php 
    } else{?>
        <div class="container">
<?php   for($demandeCompteur=0; $demandeCompteur < $nbDemandes; $demandeCompteur++){ // -1 pour ne pas compter le nb de page
            //chaque tuple
            $demande = $_SESSION['listeDemandes'][$demandeCompteur];
            //tous les attributs de tuple courrant
            $pseudo = $demande->pseudoUtilisateur;
            $roleDemande = $demande->roleDemande;
            $message = substr($demande->messagePromo,0,100);
?>

            <div class="card">
                <div class="card-body">
                    <h1 class="display-6 text-black"><?php echo"$pseudo"?></h1>
                    <p class="lead articlesParagraph text-black"><?php echo"$roleDemande"?></p>
                    <p class="lead articlesParagraph text-black"><?php echo"$message"?></p>
                    <div class="d-flex flex-row align-items-center">
                        <a href="index.php?module=Membre&action=accepterPromo&pseudo=<?=$pseudo?>&roledemande=<?=$roleDemande?>" class="btn btn-success mr-4">Approuver</a>
                        <a href="index.php?module=Membre&action=refuserPromo&pseudo=<?=$pseudo?>" class="btn btn-danger"> Refuser </a>
                    </div>
                </div>
            </div>
<?php   }?></div>
<?php
    } ?>