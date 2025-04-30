<?php

$corps =<<<EOT
<div class="wrapper">
<div class="container">
<h2 class="title">Saisir les informations</h2>
<form method="post" action="{$cible}.php?id={$id}" name="form_telephone" class="form">
  <label>Marque </label>
  <input type="text" id="marque" name="marque" value="{$marque}">
  <span class="w3-text-red">{$erreur["marque"]}</span><br>

    
  <label >Modèle </label>
  <input type="text" name="modele" value="{$modele}">
  <span class="w3-text-red">{$erreur["modele"]}</span><br>

    
  <label>Stockage (en Go) </label>
  <input type="number"  name="stockage" value="{$stockage}" step="0.01">
  <span class="w3-text-red">{$erreur["stockage"]}</span><br>
    
  <label>RAM (en Go) </label>
  <input type="number" name="ram" value="{$ram}" step="0.01">
  <span class="w3-text-red">{$erreur["ram"]}</span><br>
  
    
  <label>Couleur </label>
  <input type="text"  name="couleur" value="{$couleur}">
  <span class="w3-text-red">{$erreur["couleur"]}</span><br>
    
  <label>Prix (en euros) :</label>
  <input type="number" name="prix" value="{$prix}" step="0.01">
  <span class="w3-text-red">{$erreur["prix"]}</span><br>
    
  <input type="submit" class="ajouter" name="user_valider"  value="Valider" >
  <a href=../index.php class="annuler" >Annuler</a>
  
</form> 
</div>
</div>
EOT;

?>

