<?php
class Tag{
    private $pdo;

    public function __construct($pdo){
        $this->pdo=$pdo;
    }

    public function addTag($nom){
        $stmt=$this->pdo->prepare("INSERT INTO tags (nom)VALUES(:nom)");
        return $stmt->execute([
            ':nom'=>$nom
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