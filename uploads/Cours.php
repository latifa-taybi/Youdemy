<?php
class Cours{
    protected $cours_id;
    protected $titre;
    protected $description;
    protected $contenu;
    protected $tags;
    protected $categorieId;
    protected $pdo;
    public function __construct($cours_id, $titre, $description, $contenu, $tags, $categorieId )
    {
        $this->cours_id = $cours_id;
        $this->titre = $titre;
        $this->description = $description;
        $this->contenu = $contenu;
        $this->tags = $tags;
        $this->categorieId = $categorieId;
    }

    public function ajoutCours($pdo) {
        $stmt=$pdo->prepare("INSERT INTO cours(titre, description, contenu, categorieId)VALUES(:titre, :description, :contenu, :categorieId)");
        $stmt->execute([
            ':titre'=>$this->titre,
            ':description'=>$this->description,
            ':contenu'=>$this->contenu,
            ':categorieId'=>$this->categorieId
        ]);

        foreach ($this->tags as $tag) {
            $tag_id = $tag->getTagId($tag);
            $this->ajouterTagCours($cours_id, $tag_id);
        }
    }


}

?>