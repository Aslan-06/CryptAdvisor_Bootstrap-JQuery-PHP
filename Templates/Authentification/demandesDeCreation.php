    <h1 id="h1Demandes">Demandes de creation de <?= $_SESSION['demandesDe'] ?></h1>

<?php
    $demandes;
    switch($_SESSION['demandesDe']){
        case "cours":
            $demandes = $_SESSION['demandesCreationCours'];
            break;
        case "article":
            $demandes = $_SESSION['demandesCreationArticle'];
            break;
        case "forum":
            $demandes = $_SESSION['demandesCreationForum'];
            break;
    }
    if(count($demandes) == 0){
?>
        <h3 id="h3PasDeDemandes">Il n'y a aucune demande de creation de <?= $_SESSION['demandesDe'] ?></h3>
<?php
    }
    else{
        for($demandeCompteur = 0; $demandeCompteur < count($demandes); $demandeCompteur++){
            $demande = $demandes[$demandeCompteur];
?>
            <div class="container">
                 <div class="d-grid gap-10">
                    <div class="p-2">
                        <div class="container demandes-creation">
                            <div class="jumbotron">
                                <a href="index.php?module=Authentification&action=demande-creation-articles&id=<?=''.$demande['id'].''?>">
                                    <h1 class="display-6"> <?=$demande['titre']?></h1>
                                </a>
                                <p class="lead articlesParagraph"> <?=$demande['contenu']?></p>
                                <button class="btnsAccept" id="buttonAccept<?= $demande['id'] ?>"><img src="img/accept.png" alt="accepter"><p>Accepter</p></button>
                                <button class="btnsRefus" id="buttonRefus<?= $demande['id'] ?>"><img src="img/refus.png" alt="refuser"><p>Refuser</p></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
?> <!-- Pour écouter chaque clique sur boutons-->
     <script type="text/javascript">
        $(document).ready(function(){
            $('.btnsAccept').click(function(){
                let demandesDe = '<?= $_SESSION['demandesDe'] ?>';
                let idBtn = $(this).attr('id');
                let idDemande = idBtn.match(/\d+/)[0];
                $.ajax({
                    method: "POST",
                    url: "Modules/Authentification/accepterDemande.php",
                    data: {demandesDe: demandesDe, idDemande: idDemande}
                }).done(function(data1){
                    $.ajax({
                        method: "POST",
                        url: "Modules/Authentification/supprimerDemande.php",
                        data: {demandesDe: demandesDe, idDemande: idDemande}
                    }).done(function(data2){
                        location.reload();
                    });
                });
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btnsRefus').click(function(){
                let demandesDe = '<?= $_SESSION['demandesDe'] ?>';
                let idBtn = $(this).attr('id');
                let idDemande = idBtn.match(/\d+/)[0];
                $.ajax({
                    method: "POST",
                    url: "Modules/Authentification/supprimerDemande.php",
                    data: {demandesDe: demandesDe, idDemande: idDemande}
                }).done(function(){
                    location.reload();
                });
            })
        });
    </script>
<?php

    }
