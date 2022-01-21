<?php
    $idArticle0 = $_SESSION['derniersarticles'][0]['idArticle'];
    $titre0 = $_SESSION['derniersarticles'][0]['titre'];
    $idArticle1 = $_SESSION['derniersarticles'][1]['idArticle'];
    $titre1 = $_SESSION['derniersarticles'][1]['titre'];
    $idArticle2 = $_SESSION['derniersarticles'][2]['idArticle'];
    $titre2 = $_SESSION['derniersarticles'][2]['titre'];
?>
    <div id="accueilDiv1" class="border-bottom p-5">
        <h1 class="m-4"> Qu'est-ce que les cryptomonnaies ?</h1>
        <div>
            <div id="p-accueuil" >
                <h5 class="m-5"> Grâce à nos courtes formations, vous saurez tout ce qu'il y a à savoir sur la cryptommonaie : le trading, l'investissement...</5>
                <button type="button" class="btn btn-secondary rounded-pill m-5">Voir nos formations</button>
            </div>
            <img id="img1" class="d-block" src="./img/bitcoin.png" alt="bitcoin">
        </div>
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
                    <img class="d-block slideImg" src="./img/image2btc.jpeg" alt="First slide">
                    <a class="lienSlide" href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle0.''?>"><p class="text-center"><?=$titre0?></p></a>
                </div>
                <div class="carousel-item">
                    <img class="d-block slideImg" src="./img/image3btc.jpg" alt="First slide">
                    <a class="lienSlide" href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle1.''?>"><p class="text-center"><?=$titre1?></p></a>
                </div>
                <div class="carousel-item">
                    <img class="d-block slideImg" src="./img/image4btc.jpg" alt="Third slide">
                    <a class="lienSlide" href="index.php?module=Article&action=article&idArticle=<?=''.$idArticle2.''?>"><p class="text-center"><?=$titre2?></p></a>
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
                <p class="text-center createursNoms">Aslan Vichegourov</p>
            </div>
            <div class=" align-items-center">
                <img src="./Templates/Accueil/salem.jpeg" class="img-responsive rounded-pill">
                <p class="text-center createursNoms">Busra Abur</p>
            </div>
            <div class=" align-items-center">
                <img src="./Templates/Accueil/salem.jpeg" class="img-responsive rounded-pill">
                <p class="text-center createursNoms">Thomas Huxley-Neto</p>
            </div>
        </div>
    </div>