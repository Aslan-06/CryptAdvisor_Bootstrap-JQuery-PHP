
<div >
    <?php if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ) {

        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }?>
</div>

<form action='index.php?module=Membre&action=devenirpremium' method='post'>
    <div class='row justify-content-around align-items-center'>

        <div class='col-sm-12 col-md-5'>
            <h3 class='text-muted mb-4'>Devenir premium pour seulement 39.99$/mois</h3>
            <div class='form-floating mb-3'>
                <input name='Nomcarte' type='text' class='form-control' id='Nomcarte' placeholder=''>
                <label for='Nomcarte'>Nom sur la carte</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='cardnumber' type='text' class='form-control' id='floatingPassword' placeholder='Mot de passe'>
                <label for='floatingPassword'>Card number</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='expirydate' type='date' class='form-control' id='expirydate' placeholder='MM/YY'>
                <label for='expirydate'>Expiry date</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='cardnumber' type='text' class='form-control' id='cardnumber'>
                <label for='cardnumber'>Security code</label>
            </div>
            <div class='form-floating mb-3'>
                <input name='postalcode' type='text' class='form-control' id='postalcode' >
                <label for='postalcode'>ZIP/Postal code</label>
            </div>
            <div class='col-12'>
                <button class='btn btn-primary' type='submit'>Souscrire à un abonnement</button>
            </div>
        </div>
    </div>
</form>