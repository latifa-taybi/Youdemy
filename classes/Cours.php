<?php
class Cours{

    protected $titre;
    protected $description;
    protected $contenu;
    protected $categorieId;
    protected $pdo;


    public function __construct($pdo, $titre, $description, $contenu, $categorieId )
    {
        $this->pdo = $pdo;
        $this->titre = $titre;
        $this->description = $description;
        $this->contenu = $contenu;
        $this->categorieId = $categorieId;
    }

    public function getCoursId($id_cours){
        $stmt=$this->pdo->prepare("SELECT * FROM cours WHERE cours_id=:id");
        $stmt->execute([
            ':id'=>$id_cours
        ]);
        return $stmt->fetch();
    }

    public function getTagsByCoursId($coursId) {
        $stmt = $this->pdo->prepare("SELECT T.id_tag, T.nom FROM cours_tags CT JOIN tags T ON CT.tag_id = T.id_tag WHERE CT.cours_id = :cours_id");
        $stmt->execute([
            'cours_id' => $coursId
        ]);
        return $stmt->fetchAll();
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

    public function getCoursDetails($id_cours) {
        $stmt = $this->pdo->prepare("SELECT C.*, CA.nom AS categorie FROM cours C JOIN categorie CA ON C.categorie_id = CA.id_categorie WHERE C.cours_id = :id");
        $stmt->execute([':id' => $id_cours]);
        return  $stmt->fetch();
    }

    public function displayCours(){
        $cours = $this->getCours();
        return $cours;
    }

    public function countCours()
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) as nb_total FROM cours ");
        $stmt->execute();   
        return $stmt->fetch();
    }

    public function Pagination(int $limit,int $offset){
        $cours = $this->displayCours();
        $stmt=$this->pdo->prepare("SELECT * FROM cours LIMIT $limit OFFSET $offset");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function Recherche($mot_cle){
        $cours = $this->displayCours();
        $stmt = $this->pdo->prepare("SELECT * From cours WHERE titre LIKE :mot_cle");
        $stmt->execute([
            ':mot_cle'=>'%'.$mot_cle.'%'
        ]);
        return $stmt->fetchAll();
    }

    public function countRechercheCours($mot_cle)
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) as nb_total FROM cours WHERE titre LIKE :mot_cle");
        $stmt->execute([
            ':mot_cle'=>'%'.$mot_cle.'%'
        ]);   
        return $stmt->fetch();
    }

    public function PaginationRecherche($mot_cle, int $limit, int $offset){
        $stmt = $this->pdo->prepare("SELECT * FROM cours WHERE titre LIKE :mot_cle LIMIT $limit OFFSET $offset");
        $stmt->execute([
            ':mot_cle' => '%'.$mot_cle.'%'
        ]);
        return $stmt->fetchAll();
    }


    public function editCours($id, $titre, $description, $categorieId,  $contenu){
        $stmt=$this->pdo->prepare("UPDATE cours SET titre = :titre, description = :description, categorie_id = :categorieId, contenu=:contenu WHERE cours_id = :cours_id");
        $stmt->execute([
            ':titre'=>$titre,
            ':description'=>$description,
            ':categorieId'=>$categorieId,
            ':contenu'=>$contenu,
            ':cours_id'=>$id
        ]);
    }

    public function DeleteCours($id){
        $stmt=$this->pdo->prepare("DELETE FROM cours_tags WHERE cours_id = :cours_id");
        $stmt->execute([
            ':cours_id'=>$id
        ]);
        $stmt=$this->pdo->prepare("DELETE FROM cours WHERE cours_id = :cours_id");
        $stmt->execute([
            ':cours_id'=>$id
        ]);
    }
}
?>