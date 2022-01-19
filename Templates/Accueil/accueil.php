<?php
    $idArticle0 = $_SESSION['derniersarticles'][0]->idArticle;
    $titre0 = $_SESSION['derniersarticles'][0]->titre;
    $idArticle1 = $_SESSION['derniersarticles'][1]->idArticle;
    $titre1 = $_SESSION['derniersarticles'][1]->titre;
    $idArticle2 = $_SESSION['derniersarticles'][2]->idArticle;
    $titre2 = $_SESSION['derniersarticles'][2]->titre;
?>
    <div class="border-bottom p-5 ">
        <h3 class="m-4"> Qu'est-ce que les cryptomonnaies ?</h3>

        <p class="m-4"> Grâce à nos courtes formations, vous saurez tout ce qu'il y a à savoir sur la cryptommonaie : le trading, l'investissement...</p>

        <button type="button" class="btn btn-secondary rounded-pill m-5">Voir nos formations</button>
    </div>

    <div class="p-5 border-bottom">
        <h2 class="text-center">Nos articles les plus récents</h2>

        <!--CARROUSSEL ARTICLES-->
        <div id="carouselExampleIndicators" class="carousel slide h-25 p-4" data-bs-ride="carousel">
            <div class="carousel-indicators ">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="./img/image2btc.jpeg" alt="First slide">
                <a href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle0.''?>"><p class="text-center">Titre</p></a>
                <p class="text-center"> <?=''.$titre0.''?> </p>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="./img/image3btc.jpg" alt="First slide">
                <a href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle1.''?>"><p class="text-center">Titre</p></a>
                <p class="text-center"> <?=''.$titre1.''?> </p>
            </div>
            <div class="carousel-item">Titre
                <img class="d-block w-100" src="./img/image4btc.jpg" alt="Third slide">
                <a href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle2.''?>"><p class="text-center">Titre</p></a>
                <p class="text-center"> <?=''.$titre2.''?> </p>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="p-5">
        <h2 class="text-center">À propos</h2>

        <div class="d-flex justify-content-around p-4">
            <div class=" align-items-center">
                <img src="./Templates/Accueil/salem.jpeg" class="img-responsive rounded-pill">
                <p>Aslan Vichegourov</p>
            </div>
            <div class=" align-items-center">
                <img src="./Templates/Accueil/salem.jpeg" class="img-responsive rounded-pill">
                <p>Busra Abur</p>
            </div>
            <div class=" align-items-center">
                <img src="./Templates/Accueil/salem.jpeg" class="img-responsive rounded-pill">
                <p>Thomas Neto</p>
            </div>
        </div>
    </div>