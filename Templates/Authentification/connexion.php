<form action='index.php?module=Authentification&action=connexionForm' method='post'>
    <div class='row justify-content-around align-items-center'>

        <div class='col-sm-12 col-md-5'>
            <h3 class='text-muted mb-4'>Connexion</h3>
            <div class='form-floating mb-3'>
                <input name='email' type='email' class='form-control' id='email' placeholder='mail@exemple.com'>
                <label for='email'>Votre email</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='pseudo' type='text' class='form-control' id='pseudo'>
                <label for='pseudo'>Votre Pseudo</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='password' type='password' class='form-control' id='floatingPassword' placeholder='Mot de passe'>
                <label for='floatingPassword'>Mot de passe</label>
            </div>
            <div class='col-12'>
                <button class='btn btn-primary' type='submit'>Se connecter</button>
            </div>
        </div>
    </div>
</form>