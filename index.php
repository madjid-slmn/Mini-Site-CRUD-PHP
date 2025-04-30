<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>index</title>
</head>
<body>
<header>
        <h1 > TECH</h1>
    </header>
    <div class="container">
    <h1>Bienvenue sur notre site de magasin de téléphones</h1>
    <form action="Telephone/recherche.php" method="GET" class="form">
        <label for="marque">Rechercher par marque :</label>
        <input type="text" id="marque" name="marque">
        <input type="submit" class="ajouter" value="Rechercher">
    </form>
    <div class="ajouter">
        <a href="Telephone/affiche.php">Afficher la liste des téléphones disponibles</a>
    </div>
    <div class="ajouter" >
        <a href="Telephone/ajouter.php">Ajouter un nouveau téléphone</a>
    </div>
    <div class="ajouter" >
        <a href="apropos.php">à propos</a>
    </div>
    
    </div>
</body>
</html>
