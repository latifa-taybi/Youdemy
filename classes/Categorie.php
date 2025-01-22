<?php
class Categorie {
    private $id_categorie;
    private $nom;
    private $description;
    private $pdo;

    public function __construct($pdo, $id_categorie = null, $nom = null, $description = null) {
        $this->pdo = $pdo;
        $this->id_categorie = $id_categorie;
        $this->nom = $nom;
        $this->description = $description;
    }

    public function getIdCategorie() {
        return $this->id_categorie;
    }

    public function setIdCategorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function addCategorie() {
        $stmt = $this->pdo->prepare("INSERT INTO categorie(nom, description) VALUES(:nom, :description)");
        return $stmt->execute([
            ':nom' => $this->nom,
            ':description' => $this->description
        ]);
    }

    public function getCategories() {
        $stmt = $this->pdo->prepare("SELECT * FROM categorie");
        $stmt->execute();
        return $stmt->fetchAll();
        
    }

    public function getCategorieId($id_categorie) {
        $stmt = $this->pdo->prepare("SELECT * FROM categorie WHERE id_categorie = :id");
        $stmt->execute([
            ':id' => $id_categorie
        ]);
        return $stmt->fetch();
    
    }

    public function displayCategories() {
        $categories = $this->getCategories();
        return $categories;
    }

    public function countCategories() {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as nb_total FROM categorie");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function editCategorie($id, $nom, $description) {
        $stmt = $this->pdo->prepare("UPDATE categorie SET nom = :nom, description = :description WHERE id_categorie = :id_categorie");
        return $stmt->execute([
            ':id_categorie' => $id,
            ':nom' => $nom,
            ':description' => $description
        ]);
    }

    public function deleteCategorie($id) {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id_categorie = :id_categorie");
        return $stmt->execute([
            ':id_categorie' => $id
        ]);
    }
}
?>
