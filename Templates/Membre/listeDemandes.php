<?php
    //parcours de la table acticles
    $nbArticles = count($_SESSION['listeDemandes']) - 1;
    for($articleCompteur=0; $articleCompteur < $nbArticles; $articleCompteur++){ // -1 pour ne pas compter le nb de page
        //chaque tuple
        $article = $_SESSION['listeDemandes'][$articleCompteur];
        //tous les attributs de tuple courrant
        $pseudo = $article['pseudoUtilisateur'];
        $roleDemande = $article['roleDemande'];
        $message = substr($article['messagePromo'],0,100).'...';
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
                        <a href="#">
                            <button type="button" class="btn btn-success ng-class:{ 'disabled':  mc.ButtonsDisabled(m, v), 'chosen' : mc.IsApproved(v.VoteTypeId) }" ng-click="mv.VoteApprove(v)">
                            <span class="fa fa-check" aria-hidden="true"></span>
                            <span class="hidden-xs" aria-label="For"> Approve</span>
                            </button>
                        </a>
                        <a href="#">
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

    $nbPages = $nbArticles / 10 + 1;

<nav>
       '<ul class="pagination pagination-sm justify-content-center">';
    $page = end($_SESSION['listeDemandes']);
    $pagePrecedente = $page - 1;
    if($pagePrecedente < 1)
        $pagePrecedente = 1;
    $etatPrecedent;
    if($pagePrecedente == 1)
        $etatPrecedent = 'disabled';
    else
        $etatPrecedent = 'active';
            '<li class="page-item '.$etatPrecedent.'"><a class="page-link" href="index.php?module=Article&page='.$pagePrecedente.'">Précédent</a></li>';
    for($compteur = 1; $compteur <= $nbPages; $compteur++){
            '<li class="page-item"><a class="page-link" href="index.php?module=Article&page='.$compteur.'">'.$compteur.'</a></li>';
    }
    $pageSuivante = $page + 1;
    if($pageSuivante > $nbPages)
        $pageSuivante = $nbPages;
    $etatSuivant;
    if($pageSuivante == $nbPages)
        $etatSuivant = 'disabled';
    else
        $etatSuivant = 'active';
            '<li class="page-item '.$etatSuivant.'"><a class="page-link" href="index.php?module=Article&page='.$pageSuivante.'">Suivant</a></li>';
       '</ul>';
</nav>