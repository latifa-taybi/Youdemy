<?php
class Utilisateur{
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getUserId($id){
        $stmt=$this->pdo->prepare("SELECT * FROM utilisateur WHERE id=:id");
        $stmt->execute([
            ':id'=>$id
        ]);
        return $stmt->fetch();
    }

    public function getEnseignants(){
        $stmt=$this->pdo->prepare("SELECT * FROM utilisateur WHERE role='Enseignant'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEtudiants(){
        $stmt=$this->pdo->prepare("SELECT * FROM utilisateur WHERE role='Etudiant'");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function displayEnseignants(){
        $Enseignants=$this->getEnseignants();
        foreach($Enseignants as $Enseignant){
            echo"
            <tr class='border-t border-gray-200'>
                <td class='px-6 py-4'>$Enseignant[id]</td>
                <td class='px-6 py-4'>$Enseignant[nom]</td>
                <td class='px-6 py-4'>$Enseignant[email]</td>
                <td class='px-6 py-4'>
                    <span class='bg-green-500 text-white px-2 py-1 rounded-full'>Actif</span>
                </td>
            </tr>
            ";
        }
    }

    public function displayEtudiants(){
        $Etudiants=$this->getEtudiants();
        foreach($Etudiants as $Etudiant){
            echo"
            <tr class='border-t border-gray-200'>
                <td class='px-6 py-4'>$Etudiant[id]</td>
                <td class='px-6 py-4'>$Etudiant[nom]</td>
                <td class='px-6 py-4'>$Etudiant[email]</td>
                <td class='px-6 py-4'>
                    <span class='bg-green-500 text-white px-2 py-1 rounded-full'>Actif</span>
                </td>
            </tr>
            ";
        }
    }

}
?>