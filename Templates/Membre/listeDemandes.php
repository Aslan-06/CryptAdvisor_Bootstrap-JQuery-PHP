<?php
    //parcours de la table demandes
    $nbDemandes = count($_SESSION['listeDemandes']) - 1;
    for($demandeCompteur=0; $demandeCompteur < $nbDemandes; $demandeCompteur++){ // -1 pour ne pas compter le nb de page
        //chaque tuple
        $demande = $_SESSION['listeDemandes'][$demandeCompteur];
        //tous les attributs de tuple courrant
        $pseudo = $demande['pseudoUtilisateur'];
        $roleDemande = $demande['roleDemande'];
        $message = substr($demande['messagePromo'],0,100).'...';
?>        
        <div class="container">
            <div class="d-grid gap-10">
                <div class="p-2">
                    <div class="container articles">
                        <div class="jumbotron">
                            <h1 class="display-6"><?php echo"$pseudo"?></h1>
                            <p class="lead articlesParagraph"><?php echo"$roleDemande"?></p>
                            <p class="lead articlesParagraph"><?php echo"$message"?></p>
                            <div class="form-check form-check-inline">
                                <a href="index.php?module=Membre&action=accepterPromo&pseudo=<?=$pseudo?>&roledemande=<?=$roleDemande?>">
                                    <button type="button" class="btn btn-success ng-class:{ 'disabled':  mc.ButtonsDisabled(m, v), 'chosen' : mc.IsApproved(v.VoteTypeId) }" ng-click="mv.VoteApprove(v)">
                                    <span class="fa fa-check" aria-hidden="true"></span>
                                    <span class="hidden-xs" aria-label="For"> Approve</span>
                                    </button>
                                </a>
                                <a href="index.php?module=Membre&action=refuserPromo&pseudo=<?=$pseudo?>">
                                    <button type="button" class="btn btn-danger ng-class:{ 'disabled':  mc.ButtonsDisabled(m, v), 'chosen' : mc.IsRejected(v.VoteTypeId) }" ng-click="mv.VoteReject(v)">
                                        <span class="fa fa-times" aria-hidden="true"></span>
                                        <span class="hidden-xs" aria-label="Against"> Reject</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php } 

$nbPages = $nbDemandes / 10 + 1; ?>

<nav>
    <ul class="pagination pagination-sm justify-content-center">
    <?php $page = end($_SESSION['listeDemandes']);
        $pagePrecedente = $page - 1;
        if($pagePrecedente < 1)
            $pagePrecedente = 1;
        $etatPrecedent;
        if($pagePrecedente == 1)
            $etatPrecedent = 'disabled';
        else
            $etatPrecedent = 'active'; ?>
        <li class="page-item '.$etatPrecedent.'"><a class="page-link" href="index.php?module=Membre&page='.$pagePrecedente.'">Précédent</a></li>';
        <?php for($compteur = 1; $compteur <= $nbPages; $compteur++){ ?>
            <li class="page-item"><a class="page-link" href="index.php?module=Membre&page='.$compteur.'">'.$compteur.'</a></li>';
        <?php } 
    $pageSuivante = $page + 1;
    if($pageSuivante > $nbPages)
        $pageSuivante = $nbPages;
    $etatSuivant;
    if($pageSuivante == $nbPages)
        $etatSuivant = 'disabled';
    else
        $etatSuivant = 'active'; ?>
        <li class="page-item '.$etatSuivant.'"><a class="page-link" href="index.php?module=Article&page='.$pageSuivante.'">Suivant</a></li>
    </ul>
</nav>