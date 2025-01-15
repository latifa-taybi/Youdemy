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
        foreach($categories as $categorie){
            echo"
            <li class='flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg'>
                <div>
                    <h3 class='font-semibold text-gray-800'>$categorie[nom]</h3>
                    <p class='text-gray-500 text-sm'>$categorie[description]</p>
                </div>
                <div class='flex space-x-4'>
                    <a href='../administrateur/categories.php?id_edit=$categorie[id_categorie]'>
                        <button class='text-blue-500 hover:text-blue-700 font-small flex items-center space-x-2 transition-transform hover:scale-105'>
                            <i class='fas fa-edit'></i>
                        </button>
                    </a>
                    <a href='../administrateur/categories.php?id_delete=$categorie[id_categorie]'>
                        <button class='text-red-500 hover:text-red-700 font-small flex items-center space-x-2 transition-transform hover:scale-105'>
                            <i class='fas fa-trash-alt'></i>
                        </button>
                    </a>
                </div>
            </li>
            ";
        }

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