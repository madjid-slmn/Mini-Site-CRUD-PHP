<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
  <link rel="stylesheet" href="../style/style.css">

</head>
<body>
<header>
        <h1> TECH</h1> 
    </header>

<?php
require_once('../includes/Lib.php');
require_once('../includes/Telephone.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $telephone = Telephone::getDetail($id);
    if ($telephone !== null){
        $corps = "<h2>Identifiant : " . $id . "</h2><br>";
        $corps .= "<h2>Marque : " .  $telephone->getMarque() . "</h2><br>";
        $corps .= "<h2>Modèle : " .  $telephone->getModele() . "</h2><br>";
        $corps .= "<h2>Stockage : " .  $telephone->getStockage() . "</h2><br>";
        $corps .= "<h2>RAM : " .  $telephone->getRam() . "</h2><br>";
        $corps .= "<h2>Couleur : " .  $telephone->getCouleur() . "</h2><br>";
        $corps .= "<h2>Prix : " .  $telephone->getPrix() . "</h2><br>";
    } else {
        $corps= "<h1>Le telphone avec id = {$id} n'existe pas </h1>";
    }
   
} else {
    $corps = "<h1>Erreur</h1>";
    $corps.="<p>Aucun ID de téléphone spécifié.</p>";
}
?>
<div class="contenue">

<h1>Detail du telphone</h1>

    <?php echo $corps; ?>
    <br>
    <a href=../index.php class='annuler' >Retour</a>

</div>


</body>
</html>
