<?php
    //parcours de la table acticle
    for($articleCompteur=0; $articleCompteur < count($_SESSION['articles']); $articleCompteur++){
        //chaque tuple
        $article = $_SESSION['listeArticles'][$articleCompteur];
        
        //tous les attributs de tuple courrant
        $idArticle = $article['idArticle'];
        $titreArticle = $article['titre'];
        $nbVues = $article['nbVues'];
        $likes = $article['likes'];
        $dateCreaArticle = $article['dateCreaArticle'];

        echo '<div>';
			echo '<h3>Hello world!</h3>';
		echo '</div>';
        echo "bye";
    }
?>