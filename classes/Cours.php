<?php
class Cours{

    protected $cours_id;
    protected $titre;
    protected $description;
    protected $image;
    protected $contenu;
    protected $is_valide;
    protected $categorie_id;
    protected $id_user;
    protected $pdo;


    public function __construct($pdo, $cours_id = null, $titre = null, $description = null,$image = null, $contenu = null, $is_valide = null, $categorie_id = null, $id_user = null)
    {
        $this->pdo = $pdo;
        $this->cours_id = $cours_id;
        $this->titre = $titre;
        $this->description = $description;
        $this->image = $image;
        $this->contenu = $contenu;
        $this->is_valide = $is_valide;
        $this->categorie_id = $categorie_id;
        $this->id_user = $id_user;
    }

    public function getId() {
        return $this->cours_id;;
    }

    public function setId($cours_id) {
        $this->cours_id = $cours_id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function getCategorieId() {
        return $this->categorie_id;
    }

    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }

    public function getValidation() {
        return $this->is_valide;
    }

    public function setValidation($is_valide) {
        $this->is_valide = $is_valide;
    }


    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
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
        $stmt=$this->pdo->prepare("INSERT INTO cours(titre, description, image, contenu, categorie_id, id_user)VALUES(:titre, :description, :image, :contenu, :categorie_id, :id_user)");
        $stmt->execute([
            ':titre'=>$this->titre,
            ':description'=>$this->description,
            ':image'=>$this->image,
            ':contenu'=>$this->contenu,
            ':categorie_id'=>$this->categorie_id,
            ':id_user'=>$this->id_user
        ]);

        return $this->pdo->lastInsertId();
    }

    public function inscriptionCours($id_cours, $id_user) {
        $stmt=$this->pdo->prepare("INSERT INTO inscription(id, cours_id)VALUES(:id, :cours_id)");
        $stmt->execute([
            ':id'=>$id_user,
            ':cours_id'=>$id_cours
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