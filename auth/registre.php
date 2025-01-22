<?php
include '../database/config.php';
include '../classes/Utilisateur.php';


if (isset($_POST['registre'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motDePasse = $_POST['motDePasse'];
    $role = $_POST['role'];

    if (empty($nom) || empty($email) || empty($motDePasse)) {
        echo "<div class='alert alert-danger'>les champs doivent etre remplis</div>";
    }

    $statut = ($role === 'Enseignant') ? 'Pending' : (($role === 'Etudiant') ? 'Activé' : null);

    $utilisateur = new Utilisateur($pdo);
    
    $registre = $utilisateur->registre($nom, $email, $motDePasse, $role, $statut);

    if ($registre) {
        header('location: registrationPage.php');
    } else {
        header('location: registrationPage.php');
    }
}




// if(isset($_POST['registre'])){
//     $cours = new cours($pdo);

//     $nom = $_POST['nom'];
//     $email = $_POST['email'];
//     $motDePasse = $_POST['motDePasse'];
//     $role = $_POST['role'];
//     if($role == 'Enseignant'){
//         $statut = 'Pending';
//     }else if($role == 'Etudiant'){
//         $statut = 'Desactivé';
//     }
//      $regidtre = $cours->registre($nom, $email, $motDePasse, $role, $statut);
//     if($regidtre){
//         header('location: ./registrationPage.php');
//     }else{
//          header('location: ./registrationPage.php');
//     }
// }

?>