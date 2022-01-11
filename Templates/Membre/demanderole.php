
 <section>
 <form action='index.php?module=Membre&action=promotionform' method='post'>
    <h3> Rôle souhaité </h3>
      Auteur <input type='radio' name='ans' value='auteur'  checked/><br />
      Modérateur <input type='radio' name='ans' value='modo' /><br />
      Administrateur <input type='radio' name='ans' value='admin'  /><br />
    <br />
    Expliquez-nous pourquoi vous voulez ce rôle: <textarea name='message' cols='40' rows='20'></textarea>
    <br />
    <input type='submit' name='envoyer' value='Envoyer' />
  </form>
 </section>