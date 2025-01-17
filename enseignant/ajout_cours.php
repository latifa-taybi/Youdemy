<?php

include '../database/config.php'; // Fichier pour la connexion PDO
include '../classes/Cours.php';


if(isset($_POST['addCours'])){
    $titre=$_POST['title'];
    $description=$_POST['description'];
    $contenu=$_FILES['content'];
    $typeContent=$_POST['typeContenu'];
    $categorieId=$_POST['category'];
    $tags=$_POST['tags'];

    $uploadDir = '../uploads/';
    $cheminFichier = $uploadDir . basename($contenu['name']);
    move_uploaded_file($contenu['tmp_name'], $cheminFichier);

    if($typeContent == 'video'){
        $cours = new Video($pdo, $titre, $description, $cheminFichier, $categorieId);
    }else if($typeContent == 'Image'){
        $cours = new Image($pdo, $titre, $description, $cheminFichier, $categorieId);
    }else{
        $cours = new Document($pdo, $titre, $description, $cheminFichier, $categorieId);
    }

    $cours_id = $cours->ajoutCours();

    foreach($tags as $tagId){
        $stmt = $pdo->prepare("INSERT INTO cours_tags (cours_id, tag_id) VALUES(:cours_id, :tag_id)");
        $stmt->execute([
            'cours_id'=>$cours_id,
            'tag_id'=>$tagId
        ]);
    }
    header('location: enseignantPage.php');
}
?>
