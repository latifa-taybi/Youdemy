<?php
include '../database/config.php';

if(isset($_POST['registre'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $role = $_POST['role'];

    $db=new database();
    $pdo=$db->getConn();

    $motDePasse_hash = password_hash($motDePasse, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO utilisateur(nom, email, mot_de_passe,role)VALUES(:nom, :email, :mot_de_passe, :role)");
    if($stmt->execute([
        ':nom'=>$nom,
        ':email'=>$email,
        ':mot_de_passe'=>$motDePasse_hash,
        ':role'=>$role
    ])){
        header('location: ./registrationPage.php');
    }else{
        header('location: ./registrationPage.php');
    }
}
?>