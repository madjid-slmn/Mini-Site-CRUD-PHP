
<?php
$corps =<<<EOT
<div class="wrapper">
<div class="container">
<form method='post' action='supprimer.php?id={$id}'>

<p>Etes vous sûr de vouloir supprimer ce telephone ?</p>
<input type='submit'  name="user_valider"  value='Enregistrer' class="ajouter">
<a href=../index.php class="annuler" >Annuler</a>
</form>
</div>
</div>
EOT;
?>

