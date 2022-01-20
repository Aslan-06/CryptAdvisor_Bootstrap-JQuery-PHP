<?php
    $role = $_SESSION['role'];
?>
    <div class="container" id="divFormCreationArticle">
        <h2 class="text-center H2">Créer <?= lcfirst($ceQuonVeutAfficher) ?></h2>
        <div id="formCreationArticle">
            <div class="mb-3">
                <label for="titreArticleCreation" class="form-label creationFormLabels">Titre</label>
                <input name="titre" type="text" class="form-control" id="titreArticleCreation">
            </div>
            <div class="mb-3">
                <label for="contenu" class="form-label creationFormLabels">Contenu (écrivez <&#47;br> pour les sauts de ligne)</label>
                <textarea name="contenu" class="form-control" id="contenu" rows="4"></textarea>
            </div>
            <button class="btn btn-secondary btn-sm" id="buttonCreerArticle">Créer</button>
            <div id="message"></div>
        </div>
    </div>
   
    <script type="text/javascript">
        $(document).ready(function(){
            let messageDiv = $('#message');
            $('#buttonCreerArticle').on('click', function(){
                let titreValeur = $('#titreArticleCreation').val();
                let contenuValeur = $('#contenu').val();
                let roleUser = '<?= $role; ?>';
                let pseudoUser = '<?= $_SESSION['pseudo']; ?>';
                let creerQuoi = '<?= $_SESSION['listeArticles']['ceQuonVeutAfficher']; ?>';
                if(titreValeur.length == 0 || contenuValeur.length == 0){
                    messageDiv.html('<div class="alert alert-danger" role="alert">Tous les champs doivent être remplis!</div>');
                    return;
                }
                else
                    messageDiv.html('');
                $.ajax({
                    method: "POST",
                    url: "Modules/Article/creerArticle.php",
                    data: {pseudo: pseudoUser, role: roleUser, titre: titreValeur, contenu: contenuValeur, creerQuoi: creerQuoi}
                }).done(function(data){
                    if(data == 1){
                        messageDiv.html('<div class="alert alert-success" role="alert">' + creerQuoi + ' est bien crée</div>');
                    }
                    else if(data == 2){
                        messageDiv.html('<div class="alert alert-primary" role="alert">' + creerQuoi + ' sera étudiée par moderateur ou admin</div>');
                    }
                    else
                        console.log(data);
                });
                $('#titreArticleCreation').val('');
                $('#contenu').val('');
            })
        });
    </script>