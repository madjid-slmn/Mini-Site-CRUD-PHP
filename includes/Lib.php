<?php
// Définition des types pour les variables
$marque = null;
$modele = null;
$stockage = null;
$ram =null;
$couleur =null;
$prix =null;
$erreur = ["marque" => null, "modele" => null,"stockage"=> null, "ram"=>null, "couleur"=> null, "prix"=>null ];


// Fonction de connexion à la base de donnes
function connecter(): ?PDO
{
    require_once('config.php');


    // Options de connexion
    $options = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Connexion à la base de données
    try {
        $dsn = "mysql:host=" . DB_HOST . ";port=3306;dbname=" . DB_NAME;
        $connection = new PDO($dsn, DB_USER, DB_PASS, $options);
 
        return $connection;
    } catch (PDOException $e) {
        echo "Connexion à MySQL impossible : ", $e->getMessage();
        return null;
    }
    
}



?>
