<?php
    
        $article = $_SESSION['article'];
        
        //tous les attributs de tuple courrant
        $titreArticle = $article['titre'];
        $contenuArticle = $article['contenuArticle'];

        echo '<div class="container" id="articleConcret">';
			echo '<h2 class="Display-6 justify-content-center">'.$titreArticle.'</h2>';
            echo '<p class="lead">'.$contenuArticle.'</p>';
		echo '</div>';

?>