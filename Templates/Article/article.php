<div >
    <?php if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ) {

        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }?>
</div>

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
        
        
        $idArticleMessage = $article['idArticle'];
?>
        <div class="container" id="articleConcret">
			<h2 class="Display-6 justify-content-center"><?= $titreArticle ?></h2>
            <p class="lead paragrapheArticle"><?= $contenuArticle ?></p>
<?php
                if(isset($_GET['id'.$ceQuonVeutAfficher]) && !empty($_GET['id'.$ceQuonVeutAfficher])){
?>
                    <button class="btn" id="buttonLike"><img src="img/liking.png" alt="put like"><p>J'aime</p></button>  
            <?php endif; ?>
        </div>
            
            <h2 class="text-center">Commentaires</h2>

            
<?php        if(empty($_SESSION['listMessagesArticle'])):
                    echo"il n'y a pas de commentaires";
                else:
                    $nbMessagesAAfficher = count($_SESSION['listMessagesArticle']);

                for($messageCompteur=0; $messageCompteur < $nbMessagesAAfficher; $messageCompteur++):
                    $message = $_SESSION['listMessagesArticle'][$messageCompteur];

                    $pseudo = $message->pseudoUtilisateur;
                    $texte = $message->texte; ?>                
                <div class="container">
                    <h1><?=$pseudo?></h1>
                    <p><?=$texte?></p>
                </div>
<?php       endfor;
endif;
 if(!empty($_SESSION['pseudo'])): ?>
                <div class="container">
                <form action='index.php?module=Article&action=posterMessage&idArticleMessage=' method='post'>
                    <input type="hidden" name="idArticle" value="<?= $_GET['idArticle'] ?>">
                    <div class="form-group green-border-focus d-block">
                        <label for="posteruncommentaire">Poster un commentaire</label>
                        <textarea class="form-control" id="posteruncommentaire" name="posteruncommentaire" rows="3"></textarea>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </form>
                </div>
        <?php else:?>
            <div> Vous devez vous connecter pour pouvoir poster un commentaire ! 
            <a href="index.php?module=Authentification&action=connexion"><button class="btn btn-primary" type="button">Se connecter</button></a>
            </div>
        <?php   endif; ?>

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

