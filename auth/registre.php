<?php
include '../database/config.php';

if(isset($_POST['registre'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $role = $_POST['role'];
    if($role == 'Enseignant'){
        $statut = 'Pending';
    }else if($role == 'Etudiant'){
        $statut = 'Desactivé';
    }
    $db=new database();
    $pdo=$db->getConn();

    $motDePasse_hash = password_hash($motDePasse, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO utilisateur(nom, email, mot_de_passe, role, statut)VALUES(:nom, :email, :mot_de_passe, :role, :statut)");
    if($stmt->execute([
        ':nom'=>$nom,
        ':email'=>$email,
        ':mot_de_passe'=>$motDePasse_hash,
        ':role'=>$role,
        ':statut'=>$statut
    ])){
        header('location: ./registrationPage.php');
    }else{
        header('location: ./registrationPage.php');
    }
}
?>