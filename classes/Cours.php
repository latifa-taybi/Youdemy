<?php
class Cours{
    protected $titre;
    protected $description;
    protected $typeContenu;
    protected $contenu;
    protected $categorieId;
    protected $pdo;
    public function __construct($pdo, $titre, $description,$typeContenu, $contenu, $categorieId )
    {
        $this->pdo = $pdo;
        $this->titre = $titre;
        $this->description = $description;
        $this->typeContenu = $typeContenu;
        $this->contenu = $contenu;
        $this->categorieId = $categorieId;
    }

    public function ajoutCours() {
        $stmt=$this->pdo->prepare("INSERT INTO cours(titre, description, contenu, categorie_id)VALUES(:titre, :description, :contenu, :categorieId)");
        $stmt->execute([
            ':titre'=>$this->titre,
            ':description'=>$this->description,
            ':contenu'=>$this->contenu,
            ':categorieId'=>$this->categorieId
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getCours(){
        $stmt=$this->pdo->prepare("SELECT * FROM cours C JOIN categorie CA ON  C.categorie_id= CA.id_categorie");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function displayCours(){
        $cours = $this->getCours();
        return $cours;
    }

   
}

class Video extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'video', $contenu, $categorieId);
    }
}

class Image extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'image', $contenu, $categorieId);
    }
}

class Document extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'document', $contenu, $categorieId);
    }
}
?>