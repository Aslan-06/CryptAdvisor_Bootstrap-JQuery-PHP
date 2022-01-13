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
        

        echo '<div class="container">';
        echo    '<div class="d-grid gap-10">';
        echo        '<div class="p-2">';
        echo            '<div class="container articles">';
        echo                '<div class="jumbotron">'; 
        echo                    '<h1 class="display-6">'.$pseudo.'</h1>';
        echo                    '<p class="lead articlesParagraph">'.$roleDemande.'</p>';
        echo                    '<p class="lead articlesParagraph">'.$message.'</p>';
        echo                    '<div class="div_icons">';
        echo                        '<button type="button" class="btn btn-primary btn-lg">Large button</button>';
        echo                        '<button type="button" class="btn btn-secondary btn-lg">Large button</button>';
        echo                    '</div>';
        echo                "</div>";
        echo            "</div>";
        echo        '</div>';
        echo    '</div>';
        echo '</div>';
    }

    $nbPages = $nbArticles / 10 + 1;

    echo '<nav>';
    echo       '<ul class="pagination pagination-sm justify-content-center">';
    $page = end($_SESSION['listeDemandes']);
    $pagePrecedente = $page - 1;
    if($pagePrecedente < 1)
        $pagePrecedente = 1;
    $etatPrecedent;
    if($pagePrecedente == 1)
        $etatPrecedent = 'disabled';
    else
        $etatPrecedent = 'active';
    echo            '<li class="page-item '.$etatPrecedent.'"><a class="page-link" href="index.php?module=Article&page='.$pagePrecedente.'">Précédent</a></li>';
    for($compteur = 1; $compteur <= $nbPages; $compteur++){
    echo            '<li class="page-item"><a class="page-link" href="index.php?module=Article&page='.$compteur.'">'.$compteur.'</a></li>';
    }
    $pageSuivante = $page + 1;
    if($pageSuivante > $nbPages)
        $pageSuivante = $nbPages;
    $etatSuivant;
    if($pageSuivante == $nbPages)
        $etatSuivant = 'disabled';
    else
        $etatSuivant = 'active';
    echo            '<li class="page-item '.$etatSuivant.'"><a class="page-link" href="index.php?module=Article&page='.$pageSuivante.'">Suivant</a></li>';
    echo       '</ul>';
    echo '</nav>';
?>