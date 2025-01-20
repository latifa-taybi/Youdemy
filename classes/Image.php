<?php
class Image extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'image', $contenu, $categorieId);
    }
}

?>