<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>modifier</title>
</head>
<body>
<?php
require('../includes/Lib.php');
require('../includes/Telephone.php');
           $id=$_GET["id"];
        
           $cible='modifier';
   

           $telephone = Telephone::getDetail($id);
               $marque=$telephone->getMarque();
               $modele=$telephone->getModele();
               $stockage=$telephone->getStockage();
               $ram=$telephone->getRam();
               $couleur=$telephone->getCouleur();
               $prix=$telephone->getPrix();
               include("../includes/formulaireInsertion.php");
 

               if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_valider'])) { // si le form est soumis 
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
                    $erreur["stockage"] = "Le stockage doit être un nombre strictement positif";
                }
                if ($ram ==""){
                    $erreur["ram"] = "il manque une ram";
                }
                if (!is_numeric($ram) || $ram <= 0) {
                    $erreur["ram"] = "La RAM doit être un nombre strictement positif";
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
                    $erreur["prix"] = "Le prix doit être un nombre strictement positif";
                }


                  
                $compteur_erreur = count(array_filter($erreur));
                if ($compteur_erreur == 0){
                 
                    include("../includes/formConfirmationUpdate.php");
 
                  
                } else { 
                    // Affichage du formulaire avec les erreurs
                    include("../includes/formulaireInsertion.php");
                    $zonePrincipale = $corps;

                  }
           } elseif (isset($_POST['valider'])){ // si le form du confirmation est soumis
            $id = key_exists('id',$_GET)? $_GET['id']: null;
            $marque = $_POST["marque"];
            $modele = $_POST["modele"];
            $stockage = $_POST["stockage"];
            $ram = $_POST["ram"];
            $couleur = $_POST["couleur"];
            $prix = $_POST["prix"];
            $connection =connecter();
            $telephone = new Telephone($marque, $modele, $stockage, $ram, $couleur, $prix);
         
            $telephone->setId($id);
           $telephone->modifier($marque, $modele, $stockage, $ram, $couleur, $prix);
      
            $corps="<h1>Mise à jour du telephone ".$id."</h1>" ;
            $corps .= "<h2>Nouvelles valeurs :</h2><br>";
            $corps .= "<h2>Identifiant : " . $id . "</h2><br>";
            $corps .= "<h2>Marque : " . $marque . "</h2><br>";
            $corps .= "<h2>Modèle : " . $modele . "</h2><br>";
            $corps .= "<h2>Stockage : " . $stockage . "</h2><br>";
            $corps .= "<h2>RAM : " . $ram . "</h2><br>";
            $corps .= "<h2>Couleur : " . $couleur . "</h2><br>";
            $corps .= "<h2>Prix : " . $prix . "</h2><br>";
            $corps.="<a href=../index.php class='annuler' >Retour</a>";

           }
        $zonePrincipale = $corps;
        echo $zonePrincipale;




   ?>
    
</body>
</html>
