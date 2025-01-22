<?php
require_once 'Utilisateur.php';

class Administrateur extends Utilisateur {
    public function getDashboard() {
        return "Bienvenue Monsieur l'administrateur $this->nom ! Gérez les utilisateurs et les ressources.";
    }

    public function accountManager($id){
        $stmt = $this->pdo->prepare("UPDATE utilisateur SET statut = case WHEN (statut) = 'Active' THEN 'Desactivé' ELSE 'Active' END WHERE id = :id;");
        $stmt->execute([
            ':id'=>$id
        ]);
        return $stmt->fetch();
    }  
}
?>