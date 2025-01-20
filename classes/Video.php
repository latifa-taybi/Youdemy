<?php
class Video extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'video', $contenu, $categorieId);
    }
}
?>