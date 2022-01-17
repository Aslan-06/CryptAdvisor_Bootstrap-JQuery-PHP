<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Crypt Advisor</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link data-require="bootstrap@3.3.5" data-semver="3.3.5" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
    <link data-require="fontawesome@4.3.0" data-semver="4.3.0" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />   
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
        #tag-container{display: inline-block;position: relative;vertical-align: middle;width: 360px;}
        #tag-container input{width:100%}
        #tag-container ul{left:0 !important;right:0 !important;max-height:320px;overflow-y:auto;overflow-x:hidden;}
    </style>
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
            <div>

            <label for="tag">Faire une recherche par tag :</label>
                <span id="tag-container">
                    <input id="tag" name="tag" type="text" placeholder="Entrer un tag" />
                </span>
                <div id="search-results">
                    
                </div>
            </div>


    </header>