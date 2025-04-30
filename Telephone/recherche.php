
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
        <h1 >TECH</h1>
    </header>

<?php
require_once('../includes/Lib.php');
$corps="";

if (isset($_GET['marque'])) {
    $marqueRecherchee = $_GET['marque'];

    $connection = connecter();
    $sql = "SELECT * FROM Telephone WHERE marque = :marque";
    $stmt = $connection->prepare($sql);
    $stmt->execute(array(':marque' => $marqueRecherchee));
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   
    if ($resultats) {
        $corps .= "<div class='table'>";
        $corps .= "<table class='row'>";
        $corps .= "<thead>";
        $corps .= "<tr>";
        $corps .= "<th>ID</th>";
        $corps .= "<th>Marque</th>";
        $corps .= "<th>Modèle</th>";
        $corps .= "<th>Stockage</th>";
        $corps .= "<th>RAM</th>";
        $corps .= "<th>Couleur</th>";
        $corps .= "<th>Prix</th>";
        $corps .= "<th>Action</th>";
        $corps .= "</tr>";
        $corps .= "</thead>";
        $corps .= "<tbody>";
        foreach ($resultats as $telephone) {
  
            $corps .= "<tr>";
            $corps .= "<td>" . $telephone['id'] . "</td>";
            $corps .= "<td>" . $telephone['marque'] . "</td>";
            $corps .= "<td>" . $telephone['modele'] . "</td>";
            $corps .= "<td>" . $telephone['stockage'] . "</td>";
            $corps .= "<td>" . $telephone['ram'] . "</td>";
            $corps .= "<td>" . $telephone['couleur'] . "</td>";
            $corps .= "<td>" . $telephone['prix'] . "</td>";
             
             $corps .= "<td>";
             $corps .= '<a href="modifier.php?id=' . $telephone['id'] . '" class="modifier">Modifier </a>';
             $corps .= '<a href="supprimer.php?id=' . $telephone['id']  . '" class="modifier">Supprimer </a>';
             $corps .= '<a href="detail.php?id=' . $telephone['id'] . '" class="modifier">Détails </a>';
             $corps .= "</td>";
            $corps .= "</tr>";
    

        }
        $corps .= "</tbody>";
        $corps .= "</table>";
        $corps.="<br>";
        $corps.= "<a href=../index.php class='annuler' >Retour</a>";
        $corps .= "</div>";
    } else {
        $corps .= "Aucun téléphone trouvé pour la marque : " . $marqueRecherchee;
        $corps .="<br>";
        $corps.= "<a href=../index.php class='annuler' >Retour</a>";

    }
} else {
    $corps.= "Veuillez spécifier une marque à rechercher.";
}
?>

<div class="contenue">

<h1>Les telephone disponible de la marque:</h1>

    <?php echo $corps; ?>

</div>


</body>
</html>