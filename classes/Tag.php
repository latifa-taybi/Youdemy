<?php
class Tag{
    private $pdo;
    private $id_tag;
    private $nom;

    public function __construct($pdo, $id_tag = null, $nom = null){
        $this->pdo=$pdo;
        $this->id_tag=$id_tag;
        $this->nom=$nom;
    }

    public function getIdTag(){
        return $this->id_tag;
    }

    public function setIdTag($id_tag){
        $this->id_tag = $id_tag;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function addTag(){
        $stmt=$this->pdo->prepare("INSERT INTO tags (nom)VALUES(:nom)");
        return $stmt->execute([
            ':nom'=>$this->nom
        ]);
    }

    public function getTags(){
        $stmt=$this->pdo->prepare("SELECT * FROM tags");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getTagId($id_tag){
        $stmt=$this->pdo->prepare("SELECT * FROM tags WHERE id_tag=:id");
        $stmt->execute([
            'id'=>$id_tag
        ]);
        return $stmt->fetch();
    }

    public function countTag()
    {
        $stmt=$this->pdo->prepare("SELECT COUNT(*) as nb_total FROM tags ");
        $stmt->execute();   
        return $stmt->fetch();
    }

    public function displayTag(){
        $tags = $this->getTags();
        return $tags;
    }

    public function EditTag($id, $nom){
        $stmt=$this->pdo->prepare("UPDATE tags SET nom = :nom WHERE id_tag = :id_tag");
        $stmt->execute([
            ':id_tag'=>$id,
            ':nom'=>$nom
        ]);
    }

    public function DeleteTag($id){
        $stmt=$this->pdo->prepare("DELETE FROM tags WHERE id_tag = :id_tag");
        $stmt->execute([
            ':id_tag'=>$id
        ]);
    }
}
?>