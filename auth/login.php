<?php
session_start();

require_once '../database/config.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new database();
    $pdo = $db->getConn();

    $stmt = $pdo->prepare("SELECT * FROM utilisateur WHERE email=:email");
    $stmt->execute([
        ':email'=>$email
    ]);
    $utilisateur = $stmt->fetch();
    if($utilisateur && password_verify($password, $utilisateur['mot_de_passe'] )){
        $_SESSION['user_nom'] = $utilisateur['nom'];
        $_SESSION['user_email'] = $utilisateur['email'];
        $_SESSION['user_role'] = $utilisateur['role'];
        $_SESSION['user_statut'] = $utilisateur['statut'];
        if( $utilisateur['role']=='Etudiant'){
            header('location: ../etudiant/etudiantPage.php');
        }else if($utilisateur['role']=='Enseignant'){
            header('location: ../enseignant/enseignantPage.php');
        }else{
            header('location: ../administrateur/admin.php');
        }
    }else{
        header('location: ./registrationPage.php');
    }
}

?>