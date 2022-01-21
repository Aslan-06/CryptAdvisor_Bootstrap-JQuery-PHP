<div >
    <?php if(isset($_SESSION['erreur']) && !empty($_SESSION['erreur']) ) {

        echo $_SESSION['erreur'];
        unset($_SESSION['erreur']);
    }?>
</div>

 <section>
 <form class="forms" action='index.php?module=Membre&action=promotionform' method='post'>
    <h3> Rôle souhaité </h3>
      Auteur <input type='radio' name='ans' value='auteur'  checked/><br />
      Modérateur <input type='radio' name='ans' value='modo' /><br />
      Administrateur <input type='radio' name='ans' value='admin'  /><br />
  </br>
    <p>Expliquez-nous pourquoi vous voulez ce rôle: </p>
    <textarea name='message' cols='40' rows='20'></textarea>
    <input type='submit' name='envoyer' value='Envoyer' />
  </form>
 </section>