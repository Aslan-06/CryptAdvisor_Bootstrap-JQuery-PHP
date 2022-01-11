        <div class='container mt-5 d-flex align-items-center justify-content-center'>
            <div class='card' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>Profil de $_SESSION[pseudo]</h5> 
                    <p class='card-text'>Voici mon profil</p>
                </div>

                <div class='card-body'>
                    <h5 class='card-title'>Mes favoris</h5> 
                    <a href='index.php?module=Membre&action=articlefav'> Articles</a>
                    <a href='index.php?module=Membre&action=coursfav'> Cours</a>
                    <a href='index.php?module=Membre&action=forumfav'> Forums</a>
                </div>

                <div class='card-body'>
                    <a href='index.php?module=Membre&action=promotion'> Faire une demande de promotion</a>
                </div>
            </div>
        </div>
