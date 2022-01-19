<?php
$nbCoursAAfficher = count($_SESSION['listeCours']) - 2;
for($coursCompteur=0; $coursCompteur < $nbCoursAAfficher; $coursCompteur++){
        //chaque tuple
        $cours = $_SESSION['listeCours'][$coursCompteur];
        //tous les attributs de tuple courrant
        $idCours = $cours['idCours'];
        $titre = $cours['titre'];
        $contenu = substr($cours['contenuArticle'],0,100).'...';
        $nbVues = $article['nbVues'];
?>
        <div class="container">
                 <div class="d-grid gap-10">
                    <div class="p-2">
                        <a href="index.php?module=Cours&action=cours&idCours=<?$idCours?>">
                            <div class="container articles">
                                <div class="jumbotron">
                                    <h1 class="display-6"> <?=$titre?></h1>
                                    <p class="lead articlesParagraph"> <?=$contenu?></p>
                                    <div class="div_icons">
                                        <img class="icon" src="img/vue.png" alt="vues">
                                        <p class="text_of_icon"> <?=$nbVues?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
 <?php
    }

    $nbPages = $_SESSION['listeCours']['nbCours'] / 5 + 1;

    echo '<nav>';
    echo       '<ul class="pagination pagination-sm justify-content-center">';
    $page = end($_SESSION['listeCours']);
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
    