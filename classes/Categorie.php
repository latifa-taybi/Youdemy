<?php
class Categorie{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    public function addCategorie($nom, $description){
        $stmt=$this->pdo->prepare("INSERT INTO catergorie(nom, description)VALUES(:nom, :description)");
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

    
}
?>