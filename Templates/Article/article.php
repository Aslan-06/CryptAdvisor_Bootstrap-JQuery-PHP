<?php
        $ceQuonVeutAfficher = $_SESSION['listeArticles']['ceQuonVeutAfficher'];
        $article = $_SESSION['article'];
        //tous les attributs de tuple courrant
        $titreArticle = $article['titre'];
        $contenuArticle;
        if($article['ceQuonVeutAfficher'] == "Article")
            $contenuArticle = $article['contenuArticle'];
        else
            $contenuArticle = $article['contenu'];
        
?>
        <div class="container" id="articleConcret">
			<h2 class="Display-6 justify-content-center"><?= $titreArticle ?></h2>
            <p class="lead paragrapheArticle"><?= $contenuArticle ?></p>
<?php
                if(isset($_GET['id'.$ceQuonVeutAfficher]) && !empty($_GET['id'.$ceQuonVeutAfficher])){
?>
                    <button class="btn" id="buttonLike"><img src="img/liking.png" alt="put like"><p>J'aime</p></button>  
            <?php 
                } 
            ?>
		</div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#buttonLike').on('click', function(){
                    let ceQuonVeutAfficher = '<?= $ceQuonVeutAfficher; ?>';
                    let idArticle='';
                    if(ceQuonVeutAfficher == "Article")
                        idArticle = '<?= $_GET['idArticle']; ?>';
                    else
                        idArticle = '<?= $_GET['idForum']; ?>';
                    $.ajax({
                        method: "POST",
                        url: "Modules/Article/likerArticle.php",
                        data: {ceQuonVeutAfficher: ceQuonVeutAfficher, idArticle: idArticle}
                    }).done(function(data){
                    });
                })
            });
        </script>

