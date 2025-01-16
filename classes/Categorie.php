<?php
class Categorie{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    public function addCategorie($nom, $description){
        $stmt=$this->pdo->prepare("INSERT INTO categorie(nom, description)VALUES(:nom, :description)");
        return $stmt->execute([
            ':nom'=>$nom,
            ':description'=>$description
        ]);
    }

    public function getCategories(){
        $stmt=$this->pdo->prepare("SELECT * FROM categorie");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategorieId($id_categorie){
        $stmt=$this->pdo->prepare("SELECT * FROM categorie WHERE id_categorie=:id");
        $stmt->execute([
            'id'=>$id_categorie
        ]);
        return $stmt->fetch();
    }

    public function displayCategorie(){
        $categories = $this->getCategories();
        return $categories;
    }

    public function EditCategorie($id, $nom, $description){
        $stmt=$this->pdo->prepare("UPDATE categorie SET nom = :nom, description = :description WHERE id_categorie = :id_categorie");
        $stmt->execute([
            ':id_categorie'=>$id,
            ':nom'=>$nom,
            ':description'=>$description
        ]);
    }

    public function DeleteCategorie($id){
        $stmt=$this->pdo->prepare("DELETE FROM categorie WHERE id_categorie = :id_categorie");
        $stmt->execute([
            ':id_categorie'=>$id
        ]);
    }




}
?>