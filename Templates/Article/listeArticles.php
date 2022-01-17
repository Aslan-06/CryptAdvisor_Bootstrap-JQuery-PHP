<?php
    
    $nbArticlesAAfficher = count($_SESSION['listeArticles']) - 2; // y'a é attributs qui ne sont pas les articles a afficher

    if(isset($_SESSION['role'])){
        $role = $_SESSION['role'];

        if($role >=3 && !empty($_SESSION['demandesCreationArticle'])){ ?>
            <div class="container alert alert-dark notification-de-demandes" role="alert">
                Il exite des demandes de creation d'article, vous pouvez les accepter ou refusér dans votre <a href="index.php?module=Authentification&action=profil" class="alert-link">profil</a>.
            </div>
<?php
        }
        if($role >= 2)
            require_once('Templates/Article/creation.php');
    }

    //parcours de la table acticles
    for($articleCompteur=0; $articleCompteur < $nbArticlesAAfficher; $articleCompteur++){ // -1 pour ne pas compter le nb de page
        //chaque tuple
        $article = $_SESSION['listeArticles'][$articleCompteur];
        //tous les attributs de tuple courrant
        $idArticle = $article['idArticle'];
        echo $idArticle;
        $titreArticle = $article['titre'];
        $contenuArticle = substr($article['contenuArticle'],0,100).'...';
        $nbVues = $article['nbVues'];
        $likes = $article['likes'];
        $dateCreaArticle = $article['dateCreaArticle'];
?>
        <div class="container">
                 <div class="d-grid gap-10">
                    <div class="p-2">
                        <a href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle.''?>">
                            <div class="container articles">
                                <div class="jumbotron">
                                    <h1 class="display-6"> <?=$titreArticle?></h1>
                                    <p class="lead articlesParagraph"> <?=$contenuArticle?></p>
                                    <div class="div_icons">
                                        <img class="icon" src="img/vue.png" alt="vues">
                                        <p class="text_of_icon"> <?=$nbVues?></p>
                                        <img class="icon" src="img/like.png" alt="likes">
                                        <p class="text_of_icon"> <?=$likes?></p>
                                        <img class="icon" src="img/calendar.jpg" alt="calendar">
                                        <p class="text_of_icon"> <?=$dateCreaArticle?> </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
 <?php
    }

    $nbPages = $_SESSION['listeArticles']['nbArticles'] / 5 + 1;

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