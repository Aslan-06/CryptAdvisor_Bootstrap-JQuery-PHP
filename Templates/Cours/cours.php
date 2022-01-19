<?php
    
        $cours = $_SESSION['cours'];
        //tous les attributs de tuple courrant
        $titre = $cours['titre'];
        $contenu = $cours['contenu'];
        
?>
        <div class="container" id="articleConcret">
			<h2 class="Display-6 justify-content-center"><?= $titre ?></h2>
            <p class="lead paragrapheArticle"><?= $contenu ?></p>
		</div>

