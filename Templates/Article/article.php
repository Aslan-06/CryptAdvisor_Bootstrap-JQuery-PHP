<?php
    echo $_SESSION['articles'][0]['titre'];
    for($articleCompteur=0; $articleCompteur < count($_SESSION['articles']); $articleCompteur++){
        //chaque tuple
        $article = $_SESSION['articles'][$articleCompteur];
        
        //tous les attributs de tuple courrant
        $idArticle = $article['idArticle'];
        $titreArticle = $article['titre'];
        $idUtilisateur = $article['idUtilisateur'];
        $nbVues = $article['nbVues'];
        $likes = $article['likes'];
        $dateCreaArticle = $article['dateCreaArticle'];
        $contenuArticle = $article['contenuArticle'];

        echo $nbVues;
        echo $likes;
        echo $contenuArticle;
    }
?>