<?php
require_once 'Utilisateur.php';

class Etudiant extends Utilisateur{

    public function getEtudiants(){
        return $this->getUsersRole('Etudiant');
    }

    public function displayEtudiants(){
        $etudiants = $this->getEtudiants();
        $this->displayUsers($etudiants);
    }

    public function countEtudiant(){
        return $this->countUtilisateur('Etudiant');
    }
}
?>