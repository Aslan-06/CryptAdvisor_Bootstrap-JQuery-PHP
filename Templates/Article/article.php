<?php
    
        $article = $_SESSION['article'];
        //tous les attributs de tuple courrant
        $titreArticle = $article['titre'];
        $contenuArticle = $article['contenuArticle'];
?>
        <div class="container" id="articleConcret">
			<h2 class="Display-6 justify-content-center"><?= $titreArticle ?></h2>
            <p class="lead paragrapheArticle"><?= $contenuArticle ?></p>
            <?php
                if(isset($_GET['idArticle']) && !empty($_GET['idArticle'])){ ?>
                    <button class="btn" id="buttonLike"><img src="img/liking.png" alt="put like"><p>J'aime</p></button>  
            <?php 
                } 
            ?>
		</div>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#buttonLike').on('click', function(){
                    let idArticle = '<?php echo $_GET['idArticle']; ?>';
                    $.ajax({
                        method: "POST",
                        url: "Modules/Article/likerArticle.php",
                        data: {idArticle: idArticle}
                    }).done(function(data){
                    });
                })
            });
        </script>

