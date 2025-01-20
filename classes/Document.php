<?php
class Document extends Cours {
    public function __construct($pdo, $titre, $description, $contenu, $categorieId) {
        parent::__construct($pdo, $titre, $description, 'document', $contenu, $categorieId);
    }
}
?>