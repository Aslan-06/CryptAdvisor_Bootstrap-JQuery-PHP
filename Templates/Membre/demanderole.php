<?php
echo"
  <form action='index.php?module=Membre&action=demandeform' method='post'>
    <h3> Rôle souhaité </h3>
      Auteur <input type='radio' name='ans' value='auteur'  /><br />
      Modérateur <input type='radio' name='ans' value='modo' /><br />
      Administrateur <input type='radio' name='ans' value='admin'  /><br />
    <input type='submit' value='submit' />
    <br />
    Expliquez-nous pourquoi vous voulez ce rôle: <textarea name='message' cols='40' rows='20'></textarea>
    <br />
    <input type='submit' name='envoyer' value='Envoyer' />
  </form>"

?>