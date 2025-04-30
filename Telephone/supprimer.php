<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>supprimer</title>
</head>
<body>
<header>
          <h1 >TECH</h1>
    </header>
    <?php
    require('../includes/Lib.php');
    require('../includes/Telephone.php');
            $id=$_GET["id"];
            include('../includes/formConfirmationDelete.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_valider'])) {
                $connection =connecter();
                $id = key_exists('id',$_GET)? $_GET['id']: null;
                $corps="<h1>Suppression du telephone ".$id."</h1>" ;
                Telephone::supprimer($id);
                // Fermeture de la connexion et libération de la ressource
                $query = null;
                $connection = null;

            }
           
            $zonePrincipale=$corps ;
            $connection = null;
            echo $zonePrincipale;

    ?>
    <br>
    <br>
    <a href=../index.php class="annuler" >Retour</a>
    
</body>
</html>
