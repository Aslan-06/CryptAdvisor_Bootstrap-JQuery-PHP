<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Crypt Advisor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <header id="header">
        <a id="lien_logo" href="index.php"> 
                <img id="img_logo" src="Templates/corps/logo CryptAdvisor.png" alt="Logo de site CryptAdvisor" class="w-14 h-auto"/> 
        </a>

        <div id="navEtBtns_connexion">
            <nav id="navigateur">
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

                <a href="index.php?module=Authentification&action=profil">
                    Profil
                </a>
                <a href="index.php?module=Authentification&action=deconnexion">
                    Déconnexion
                </a>
                <?php } ?>
            </div>
        </div>
    </header>

