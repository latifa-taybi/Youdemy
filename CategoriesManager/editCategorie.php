<?php
require_once '../database/config.php';
require_once '../classes/Categorie.php';

$categorie = new Categorie($pdo);

if (isset($_GET['id'])) {
    $categorieEdit=$categorie->getCategorieId($_GET['id']);
}

if(isset($_POST['editCategory'])){
    $nomCat = $_POST['categoryName'];
    $descCat = $_POST['categoryDescription'];
    $categorie->EditCategorie($_GET['id'], $nomCat, $descCat);
    header('location: ../administrateur/categories.php');
}
?>