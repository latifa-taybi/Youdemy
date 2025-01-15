<?php
include '../classes/Utilisateur.php';
require_once '../database/config.php';

if(isset($_GET['id'])){
    
    $user = new Utilisateur($pdo);
    $userId = $user->getUserId($_GET['id']);
    $toggleAcc = $user->accountManager($_GET['id']);
    header('location:'.$userId['role'].'.php');
}
?>