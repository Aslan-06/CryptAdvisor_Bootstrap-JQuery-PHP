
<div >
    <?php if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ) {

        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }?>
</div>
<form action='index.php?module=Authentification&action=inscriptionForm' method='post'>
    <div class='row justify-content-around align-items-center'>


        <div class='col-sm-12 col-md-5'>

            <h3 class='text-muted mb-4'>Inscription</h3>
            <div class='form-floating mb-3'>
                <input name='nom' type='text' class='form-control' id='nom' placeholder='Nom'>
                <label for='nom'>Nom</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='prenom' type='text' class='form-control' id='prenom' placeholder='Prenom'>
                <label for='prenom'>Prenom</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='pseudo' type='text' class='form-control' id='pseudo' placeholder='Pseudo'>
                <label for='pseudo'>Pseudo</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='email' type='email' class='form-control' id='email' placeholder='mail@exemple.com'>
                <label for='email'>E-mail</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='password' type='password' class='form-control' id='floatingPassword' placeholder='Mot de passe'>
                <label for='floatingPassword'>Mot de passe</label>
            </div>
            <div class='col-12'>
                <button class='btn btn-primary type='submit'>S'inscrire</button>
            </div>
        </div>
    </div>
</form>