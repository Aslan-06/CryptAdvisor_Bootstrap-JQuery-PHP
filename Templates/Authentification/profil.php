<div class='container mt-5 d-flex align-items-center justify-content-center'>
    <div class='card' style='width: 18rem;'>
        <div class='card-body'>
            <h5 class='card-title'>Profil de <?= $_SESSION['pseudo'] ?></h5> 
            <p class='card-text'>Voici mon profil</p>
        </div>

        <div class='card-body'>
            <h5 class='card-title'>Mes favoris</h5> 
            <a href='index.php?module=Membre&action=articlefav'> Articles</a>
            <a href='index.php?module=Membre&action=coursfav'> Cours</a>
            <a href='index.php?module=Membre&action=forumfav'> Forums</a>
        </div>
<?php
    if($_SESSION['role'] >= 3) { // on est modo ou admin, on peut voir des listes des demandes de creation
?>
        <div id="dropdownDemandes" class="btn-group dropend">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownDemandesCreation" data-bs-toggle="dropdown">
                Demandes de création des
<?php
                if(!empty($_SESSION['demandesCreationCours']) || !empty($_SESSION['demandesCreationArticle']) || !empty($_SESSION['demandesCreationForum'])){
?>
                <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle">
                    <span class="visually-hidden"></span>
                </span>
<?php
                }
?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownDemandesCreation">
                <li>
                    <a class="dropdown-item" href="index.php?module=Authentification&action=demande-creation-cours">
                        Cours
<?php
                        if($_SESSION['role'] >=3 && !empty($_SESSION['demandesCreationCours'])):
?>
                            <span class="badgesDemandes badge p-1 bg-danger border border-light rounded-circle text-end"><span class="visually-hidden"></span></span>
<?php
                        endif
?>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="index.php?module=Authentification&action=demande-creation-articles">
                        Articles
<?php
                        if($_SESSION['role'] >=3 && !empty($_SESSION['demandesCreationArticle'])){ 
?>
                            <span class="badgesDemandes badge p-1 bg-danger border border-light rounded-circle justify-content-end"><span class="visually-hidden"></span></span>
<?php
                        }
?>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="index.php?module=Authentification&action=demande-creation-forums">
                        Forums
<?php
                        if($_SESSION['role'] >=3 && !empty($_SESSION['demandesCreationForum'])){ 
?>
                            <span class="badgesDemandes badge p-1 bg-danger border border-light rounded-circle pull_right"><span class="visually-hidden"></span></span>
<?php
                        }
?>
                    </a>
                    </span>
                </li>
            </ul>
        </div>
<?php
        }if($_SESSION['role'] != 4) { // admin ne demande pas de promotion
?>
            <div class='card-body'>
                <a href='index.php?module=Membre&action=promotion'> Faire une demande de promotion</a>
            </div>
<?php
        }if($_SESSION['role'] == 4){ ?>
        
        <div class='card-body'>
                <a href='index.php?module=Membre&action=voirdemandes'> Voir les demandes de promotion</a>
            </div>
 <?php       }
    
?>
    </div>
</div>
