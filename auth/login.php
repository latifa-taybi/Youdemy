<?php
session_start();

require_once '../database/config.php';
include '../classes/Utilisateur.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $utilisateur = new Utilisateur($pdo);
    $user = $utilisateur->login($email);

    if($user && password_verify($password, $user['mot_de_passe'] )){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nom'] = $user['nom'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_statut'] = $user['statut'];
        if( $user['role']=='Etudiant' && $user['statut']=='Active'){
            header('location: ../etudiant/etudiantPage.php');
        }else if($user['role']=='Etudiant' && $user['statut']=='Desactivé'){
            header('location: statutEtudiant.php');
        }else if($user['role']=='Enseignant' && $user['statut']=='Pending'){
            header('location: statutEnseignant.php');
        }else if( $user['role']=='Enseignant' && $user['statut']=='Active'){
            header('location: ../enseignant/enseignantPage.php');
        }else if($user['role']=='Administrateur'){
            header('location: ../administrateur/admin.php');
        }
    }else{
        header('location: ./registrationPage.php');
    }
}


?>