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

    public function afficheName(){
        return "Bienvenue Monsieur l'étudiant $this->nom()";
    }

    public function Inscription($id_user, $id_cours){
        $stmt=$this->pdo->prepare("INSERT INTO inscription(id, cours_id) VALUES (:id, :cours_id)");
        return $stmt->execute([
            ':id'=>$id_user,
            ':cours_id'=>$id_cours
        ]);
    }

    public function afficheInscription($id){
        $stmt=$this->pdo->prepare("SELECT cours.* FROM cours JOIN inscription ON cours.cours_id = inscription.cours_id WHERE inscription.id = :id_user");
        $stmt->execute([
            ':id_user'=>$id
        ]);
        return $stmt->fetchAll();
    }
}
?>