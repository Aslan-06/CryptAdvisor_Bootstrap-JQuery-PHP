<!DOCTYPE html>

<html lang="fr">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <header id="header">
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
    </header>

