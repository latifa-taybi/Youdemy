<?php
require_once 'Utilisateur.php';

class Enseignant extends Utilisateur{

    public function getEnseignants(){
        return $this->getUsersRole('Enseignant');
    }

    public function displayEnseignants(){
        $enseignants = $this->getEnseignants();
        $this->displayUsers($enseignants);
    }

    public function countEnseignant(){
        return $this->countUtilisateur('Enseignant');
    }

    public function afficheName(){
        return "Bienvenue Monsieur l'enseignant $this->nom()";
    }
}
?>