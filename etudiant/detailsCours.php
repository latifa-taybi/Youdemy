<?php
include '../database/config.php';
include '../etudiant/etudiantPage.php';

$categorie = new Categorie($pdo);
$cours = new Cours($pdo, '', '','', '', '');




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<div class="max-w-5xl mx-auto bg-gray-100 p-8 rounded-xl shadow-lg mt-10">
  <h2 class="text-4xl font-extrabold text-purple-600 mb-8 text-center">Détails du Cours</h2>
  
  <div class="bg-white p-6 rounded-lg shadow-md space-y-6">
    <!-- Titre -->
    <div class="flex items-center space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Titre :</h3>
      <p class="text-gray-600 text-base flex-1"><?php echo isset($coursEdit) ? $coursEdit['titre'] : 'Non défini'; ?></p>
    </div>
    
    <!-- Description -->
    <div class="flex items-start space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Description :</h3>
      <p class="text-gray-600 text-base flex-1 leading-relaxed"><?php echo isset($coursEdit) ? $coursEdit['description'] : 'Non défini'; ?></p>
    </div>
    
    <!-- Type de Contenu -->
    <div class="flex items-center space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Type de Contenu :</h3>
      <p class="text-gray-600 text-base flex-1"><?php echo isset($coursEdit) ? ucfirst($coursEdit['type_contenu']) : 'Non défini'; ?></p>
    </div>
    
    <!-- Contenu -->
    <div class="flex items-center space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Contenu :</h3>
      <a href="<?php echo isset($coursEdit) ? $coursEdit['contenu'] : '#'; ?>" class="text-purple-600 underline text-base flex-1">
        <?php echo isset($coursEdit) ? basename($coursEdit['contenu']) : 'Aucun fichier'; ?>
      </a>
    </div>
    
    <!-- Tags -->
    <div class="flex items-start space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Tags :</h3>
      <ul class="flex-1 space-y-2">
        <?php
        if (isset($coursTags)) {
          foreach ($coursTags as $tag) {
            echo "<li class='inline-block bg-purple-100 text-purple-700 px-3 py-1 rounded-lg font-medium'>{$tag['nom']}</li>";
          }
        } else {
          echo "<li class='text-gray-600'>Non défini</li>";
        }
        ?>
      </ul>
    </div>
    
    <!-- Catégorie -->
    <div class="flex items-center space-x-4">
      <h3 class="text-lg font-bold text-gray-700 w-1/3">Catégorie :</h3>
      <p class="text-gray-600 text-base flex-1"><?php echo isset($coursEdit) ? $coursEdit['categorie'] : 'Non défini'; ?></p>
    </div>
  </div>

  <!-- Boutons -->
  <div class="mt-8 flex justify-between">
    <a href="modifier_cours.php?id=<?php echo $_GET['id_edit']; ?>" 
       class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-lg shadow-lg hover:opacity-90 font-semibold transition duration-200">
      Modifier le Cours
    </a>
    <a href="liste_cours.php" 
       class="bg-gray-500 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-gray-600 font-semibold transition duration-200">
      Retour à la Liste
    </a>
  </div>
</div>
