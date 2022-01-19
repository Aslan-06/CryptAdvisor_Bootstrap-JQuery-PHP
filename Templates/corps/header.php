<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Crypt Advisor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        #tag-container{display: inline-block;position: relative;vertical-align: middle;width: 360px;}
        #tag-container input{width:100%}
        #tag-container ul{left:0 !important;right:0 !important;max-height:320px;overflow-y:auto;overflow-x:hidden;}

        .navbar-dark{
            background:#181a20;
        }

        ul.nav a:hover { color: #fec63d !important; }
        
    </style>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"href="assets/css/style.css">
</head>

<body class="text-white">
    <div id="wrapper">
    <header id="header">

        <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid" >
        <a id="lien_logo" href="index.php"> 
                    <img id="img_logo" src="Templates/corps/logo CryptAdvisor.png" alt="Logo de site CryptAdvisor" class="w-14 h-auto"/> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"  class="background-nav" >
                <li class="nav-item">
                <a class="text-light nav-link active" aria-current="page" href="index.php?module=Accueil">Accueil</a>
                </li>
                <li class="nav-item">
                <a class="text-light nav-link" href="index.php?module=Cours">Cours</a>
                </li>
                <li class="nav-item">
                <a class="text-light nav-link" href="index.php?module=Article">Articles</a>
                </li>
                <li class="nav-item">
                <a class="text-light nav-link" href="index.php?module=Forum">Forum</a>
                </li>
                <li class="nav-item">
                <a class="text-light nav-link" href="index.php?module=Membre&action=premiumform">Membre Premium</a>
                </li>
                <?php if (!isset($_SESSION['pseudo'])){?>
                    <li class="nav-item">
                    <a class="text-light nav-link" href="index.php?module=Authentification&action=connexion">Se connecter</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-light nav-link" href="index.php?module=Authentification&action=inscription">S'inscrire</a>
                    </li>
                        <?php } else { ?>

                            <li class="nav-item">
                    <a class="text-light nav-link" href="index.php?module=Authentification&action=profil">Profil</a>
                    </li>
                    <li class="nav-item">
                    <a class="text-light nav-link" href="index.php?module=Authentification&action=deconnexion">Déconnexion</a>
                    </li>
                    <?php } ?>
            </ul>
            <label for="tag">Search :</label>
            <form class="d-flex">
                
                <input class="form-control me-2" id="tag" type="text" placeholder="Entrer un tag" aria-label="tag">
                <div id="search-results">
                </div>
            </form>
            </div>
        </div>
        </nav>
    </header>
    <div id='bodyContent'>
