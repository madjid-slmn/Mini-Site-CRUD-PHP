<?php
require_once('Lib.php');
class Telephone {
    private $id;
    private $marque;
    private $modele;
    private $stockage;
    private $ram;
    private $couleur;
    private $prix;

    
    public function __construct($marque, $modele, $stockage, $ram, $couleur, $prix) {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->stockage = $stockage;
        $this->ram = $ram;
        $this->couleur = $couleur;
        $this->prix = $prix;
    }

    //  getter et setter
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function setModele($modele) {
        $this->modele = $modele;
    }

    public function getStockage() {
        return $this->stockage;
    }

    public function setStockage($stockage) {
        $this->stockage = $stockage;
    }

    public function getRam() {
        return $this->ram;
    }

    public function setRam($ram) {
        $this->ram = $ram;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($couleur) {
        $this->couleur = $couleur;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }




    ///// fonction pour insere les telphone a la base de donnes
    public function enregistrer(){
        $connection = connecter();
        
        $sql = "INSERT INTO Telephone (marque, modele, stockage, ram, couleur, prix) VALUES (:marque, :modele, :stockage, :ram, :couleur, :prix)";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(
            ':marque' => $this->marque,
            ':modele' => $this->modele,
            ':stockage' => $this->stockage,
            ':ram' => $this->ram,
            ':couleur' => $this->couleur,
            ':prix' => $this->prix
        ));
        $this->id = $connection->lastInsertId();
    }

    public function modifier($nouvelleMarque, $nouveauModele, $nouveauStockage, $nouvelleRam, $nouvelleCouleur, $nouveauPrix){
        $connection = connecter();
    
        $sql = "UPDATE Telephone SET marque = :nouvelleMarque, modele = :nouveauModele, stockage = :nouveauStockage, ram = :nouvelleRam, 
        couleur = :nouvelleCouleur, prix = :nouveauPrix WHERE id = :id";
        $stmt = $connection->prepare($sql);


            $stmt->execute(array(
                ':nouvelleMarque' => $nouvelleMarque,
                ':nouveauModele' => $nouveauModele,
                ':nouveauStockage' => $nouveauStockage,
                ':nouvelleRam' => $nouvelleRam,
                ':nouvelleCouleur' => $nouvelleCouleur,
                ':nouveauPrix' => $nouveauPrix,
                ':id' => $this->id
            ));
    }
     // supprimer comme une methode statique car on est pas obliger de cree un nouveau objet 
    public  static function supprimer($id){
        $connection = connecter();
        $sql = "DELETE FROM Telephone WHERE id = :id";
        $stmt = $connection->prepare($sql);
         return $stmt->execute(array(':id' => $id));
    

    }

    public static function getDetail($id){
        $connection = connecter();
        $sql = "SELECT * FROM Telephone WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result){
        $telephone = new Telephone($result['marque'], $result['modele'], $result['stockage'], $result['ram'], $result['couleur'], $result['prix']);
        $telephone->setID($id);
        return $telephone;
        } else {
          return null;
        }


    }

    public function __toString() {
        return "<strong>Identifiant du téléphone :</strong> " . $this->id . "<br>" . 
               "<strong>Marque :</strong> " . $this->marque . "<br>" . 
               "<strong>Modèle :</strong> " . $this->modele . "<br>" . 
               "<strong>Stockage :</strong> " . $this->stockage . " Go<br>" . 
               "<strong>RAM :</strong> " . $this->ram . " Go<br>" . 
               "<strong>Couleur :</strong> " . $this->couleur . "<br>" . 
               "<strong>Prix :</strong> " . $this->prix . " €";
    }
    


}
?>
