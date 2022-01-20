    <h1 class="H2 H2center" id="h1Demandes">Demandes de creation des <?php $des = $_SESSION['demandesDe']; if($_SESSION['demandesDe'] != "cours") $des = $des.'s'; echo $des ?></h1>

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
                                <div class="demandeInfos">
                                    <a href="index.php?module=Authentification&action=demande-creation-articles&id=<?=''.$demande['id'].''?>">
                                        <p class="demandeDeQui" >Demande de <?=$demande['pseudoUtilisateur']?></p>
                                        <h1 class="H2 display-6"> <?=$demande['titre']?></h1>
                                    </a>
                                    <p class="lead articlesParagraph"> <?=$demande['contenu']?></p>
                                </div>
                                <div class="btnsDemandes">
                                    <button class="btnsAccept" id="buttonAccept<?= $demande['id'] ?>"><img class="imgDemandes" src="img/accept.png" alt="accepter"><p>Accepter</p></button>
                                    <button class="btnsRefus" id="buttonRefus<?= $demande['id'] ?>"><img class="imgDemandes" src="img/refus.png" alt="refuser"><p>Refuser</p></button>
                                </div>
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
