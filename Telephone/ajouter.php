<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">

    <title>ajouter</title>
</head>
<body>
    <header>
        <h1> TECH</h1>
    </header>


       
    <?php

require('../includes/Lib.php');
require('../includes/Telephone.php');
            $cible='ajouter'; 
            if (!isset($_POST["marque"]) && !isset($_POST["modele"])&& !isset($_POST["stockage"])&& !isset($_POST["ram"])
            && !isset($_POST["couleur"])&& !isset($_POST["prix"])) {

                $id='';
                include("../includes/formulaireInsertion.php");
             
                
                $zonePrincipale = $corps;
            } else {

                $marque = isset($_POST['marque']) ? trim($_POST['marque']) : null;
                $modele = isset($_POST['modele']) ? trim($_POST['modele']) : null;
                $stockage = isset($_POST['stockage']) ? trim($_POST['stockage']) : null;
                $ram = isset($_POST['ram']) ? trim($_POST['ram']) : null;
                $couleur = isset($_POST['couleur']) ? trim($_POST['couleur']) : null;
                $prix = isset($_POST['prix']) ? trim($_POST['prix']) : null;
    
                
                if ($marque == "") {
                    $erreur["marque"] = "Il manque une marque ";
                }
                if ($modele == "") {
                    $erreur["modele"] = "Il manque un modele";
                } 
                if ($stockage == "") {
                    $erreur["stockage"] = " il manque un stockage";
                }
                if (!is_numeric($stockage) || $stockage <= 0) {
                    $erreur["stockage"] = "Le stockage doit etre un nombre strictement positif";
                }
                if ($ram ==""){
                    $erreur["ram"] = "il manque une ram";
                }
                if (!is_numeric($ram) || $ram <= 0) {
                    $erreur["ram"] = "La RAM doit etre un nombre strictement positif";
                }
                if ($couleur == "") {
                    $erreur["couleur"] = "Il manque une couleur";
                } 
                if (is_numeric($couleur)) {
                    $erreur["couleur"] = "la couleur ne peut pas etre numeric";
                }
                if ($prix == "") {
                    $erreur["prix"] = "Il manque un prix";
                } 
                if (!is_numeric($prix) || $prix <= 0) {
                    $erreur["prix"] = "Le prix doit etre un nombre strictement positif";
                }

                

    
                $compteur_erreur = count(array_filter($erreur));
    
                if ($compteur_erreur == 0) {
                    $connection = connecter();
                    $telephone = new Telephone($marque, $modele, $stockage, $ram, $couleur, $prix);
                    $telephone->enregistrer();
                    $id =$telephone->getId();
    
                    $corps=" ";

                    $corps .="<h1>Insertion du nouveau téléphone : <br></h1>" ;
                  
                    $corps .= "Marque : " . $marque . "<br>";
                    $corps .= "Modèle : " . $modele . "<br>";
                    $corps .= "Stockage : " . $stockage . " Go<br>";
                    $corps .= "RAM : " . $ram . " Go<br>";
                    $corps .= "Couleur : " . $couleur . "<br>";
                    $corps .= "Prix : " . $prix . " euros<br>";
                    $corps .= "Clé principale (ID) : <u>" . $telephone->getId() . "</u><br>";
                    $corps.="<a href=../index.php class='annuler' >Retour</a>";

                    
                    $zonePrincipale = $corps;
       
     
    
                } else {
                    $id='';
                    // Affichage du formulaire avec les erreurs
                    include("../includes/formulaireInsertion.php");
                    
                    $zonePrincipale = $corps;
                }
            }

            echo $zonePrincipale;


?>


    
</body>
</html>
