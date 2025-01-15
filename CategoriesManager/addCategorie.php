<?php
require_once '../database/config.php';
require_once '../classes/Categorie.php';
$categorie = new Categorie($pdo);
// --Ajouter des Categories
if (isset($_POST['addCategory'])) {
    $nomCat = $_POST['categoryName'];
    $descCat = $_POST['categoryDescription'];
    $categorie->addCategorie($nomCat, $descCat);
}
?>
