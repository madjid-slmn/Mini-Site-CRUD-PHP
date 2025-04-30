
<?php
$corps =<<<EOT
<div class="wrapper">
<div class="container">
<form method='post' action='modifier.php?id={$id}'>
<input type='hidden' name='marque' value='$marque'>
<input type='hidden' name='modele' value='$modele'>
<input type='hidden' name='stockage' value='$stockage'>
<input type='hidden' name='ram' value='$ram'>
<input type='hidden' name='couleur' value='$couleur'>
<input type='hidden' name='prix' value='$prix'>

<p>Etes vous sûr de vouloir modifer ce telephone ?</p>
<input type='submit'  name="valider"  value='Enregistrer' class="ajouter">
<a href=../index.php class="annuler" >Annuler</a>
</form>
</div>
</div>
EOT;
?>

