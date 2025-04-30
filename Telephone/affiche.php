<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>liste</title>
</head>
<body>
<header>

    <h1>TECH</h1>

</header>

 


<div class="table">
<h2 class="title"> Liste des telephone disponible  :</h2>
<table class="row">
<thead>
<tr>
<th>ID</th>
<th>Marque</th>
<th>Modèle</th>
<th>Stockage</th>
<th>RAM</th>
<th>Couleur</th>
<th>Prix</th>
 <th>Action</th>
</tr>
</thead>
<tbody>
<?php
require('../includes/Lib.php');
require('../includes/Telephone.php');

$connection = connecter();
$requete = "SELECT * FROM Telephone";

try {
    
    $query = $connection->query($requete);
    $query->setFetchMode(PDO::FETCH_OBJ);

  
    while ($enregistrement = $query->fetch()) {
        echo "<tr>";
        echo "<td>" . $enregistrement->id . "</td>";
        echo "<td>" . $enregistrement->marque . "</td>";
        echo "<td>" . $enregistrement->modele . "</td>";
        echo "<td>" . $enregistrement->stockage . "</td>";
        echo "<td>" . $enregistrement->ram . "</td>";
        echo "<td>" . $enregistrement->couleur . "</td>";
        echo "<td>" . $enregistrement->prix . "</td>";
        echo "<td>";
        echo '<a href="modifier.php?id=' . $enregistrement->id . '" class="modifier">Modifier </a>';
        echo '<a href="supprimer.php?id=' . $enregistrement->id . '" class="modifier">Supprimer </a>';
 
        echo '<a href="detail.php?id=' . $enregistrement->id . '" class="modifier" >Détails</a>';

        echo "</td>";
        echo "</tr>";
     
    }
} catch (PDOException $e) {
    echo "Erreur lors de l'exécution de la requête : ", $e->getMessage();
} finally {
    
    $query = null;
    $connection = null;
}
?>
</tbody>
</table>
<br>
<a href=../index.php class="annuler" >Retour</a>
</div>


</body>
</html>

