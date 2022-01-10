<!DOCTYPE html>

<html lang="fr">

<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header id="header">
        <div class="container-fluid bg-success">
            <a id="lien_logo" href="index.php"> 
                    <img id="img_logo" src="Templates/corps/logo CryptAdvisor.png" alt="Logo de site CryptAdvisor" class="w-14 h-auto"/> 
            </a>

            <div id="navEtBtns_connexion">
                <nav>
                    <a class="border_right" href="index.php?module=Accueil">Accueil</a>
                    <a class="border_right" href="index.php?module=Cours">Cours</a>
                    <a class="border_right" href="index.php?module=Article">Articles</a>
                    <a class="border_right" href="index.php?module=Forum">Forum</a>
                    <a href="index.php?module=Membre&action=premiumform">Membre Premium</a>
                </nav>

                <div class="btns_connexion">
                    <?php if (!isset($_SESSION['pseudo'])){?>
                    <a href="index.php?module=Authentification&action=connexion">
                        Se Connecter
                    </a>
                    <a href="index.php?module=Authentification&action=inscription">
                        S'inscrire
                    </a>
                    <?php } else { ?>

                    <a href="index.php?module=Authentification&action=deconnexion">
                        Déconnexion
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>

