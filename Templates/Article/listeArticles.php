<?php
    
    $nbArticles = count($_SESSION['listeArticles']) - 1;
    if(isset($_SESSION['listeArticles']['role'])){
        $nbArticles = $nbArticles - 1;
        $role = $_SESSION['listeArticles']['role'];
        if($role >= 2){ // auteur ou plus
            echo 'helloooo wooollrd!! Yeeeees';
        }
    }
    
    //parcours de la table acticles
    for($articleCompteur=0; $articleCompteur < $nbArticles; $articleCompteur++){ // -1 pour ne pas compter le nb de page
        //chaque tuple
        $article = $_SESSION['listeArticles'][$articleCompteur];
        //tous les attributs de tuple courrant
        $idArticle = $article['idArticle'];
        $titreArticle = $article['titre'];
        $contenuArticle = substr($article['contenuArticle'],0,100).'...';
        $nbVues = $article['nbVues'];
        $likes = $article['likes'];
        $dateCreaArticle = $article['dateCreaArticle'];

        echo '<div class="container">';
        echo '<div class="d-grid gap-10">';
        echo    '<div class="p-2">';
        echo        '<a href="index.php?module=Article&action=article&idArticle=' . $idArticle . '">';
        echo            '<div class="container articles">';
        echo                '<div class="jumbotron">'; 
        echo                    '<h1 class="display-6">'.$titreArticle.'</h1>';
        echo                    '<p class="lead articlesParagraph">'.$contenuArticle.'</p>';
        echo                    '<div class="div_icons">';
        echo                        '<img class="icon" src="img/vue.png" alt="vues">';
        echo                        '<p class="text_of_icon">'.$nbVues.'</p>';
        echo                        '<img class="icon" src="img/like.png" alt="likes">';
        echo                        '<p class="text_of_icon">'.$likes.'</p>';
        echo                        '<img class="icon" src="img/calendar.jpg" alt="calendar">';
        echo                        '<p class="text_of_icon">'.$dateCreaArticle.'</p>';
        echo                    '</div>';
        echo                "</div>";
        echo            "</div>";
        echo        '</a>';
        echo     '</div>';
        echo '</div>';
        echo '</div>';
    }

    $nbPages = $nbArticles / 10 + 1;

    echo '<nav>';
    echo       '<ul class="pagination pagination-sm justify-content-center">';
    $page = end($_SESSION['listeArticles']);
    $pagePrecedente = $page - 1;
    $etatPrecedent;
    if($pagePrecedente < 1)
        $etatPrecedent = 'disabled';
    else
        $etatPrecedent = 'active';
    echo            '<li class="page-item '.$etatPrecedent.'"><a class="page-link" href="index.php?module=Article&page='.$pagePrecedente.'">Précédent</a></li>';
    for($compteur = 1; $compteur <= $nbPages; $compteur++){
    echo            '<li class="page-item"><a class="page-link" href="index.php?module=Article&page='.$compteur.'">'.$compteur.'</a></li>';
    }
    $pageSuivante = $page + 1;
    $etatSuivant;
    if($pageSuivante > $nbPages)
        $etatSuivant = 'disabled';
    else
        $etatSuivant = 'active';
    echo            '<li class="page-item '.$etatSuivant.'"><a class="page-link" href="index.php?module=Article&page='.$pageSuivante.'">Suivant</a></li>';
    echo       '</ul>';
    echo '</nav>';
    
?>