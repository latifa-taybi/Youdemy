<?php
include '../database/config.php';
include '../classes/Tag.php';
include '../classes/Categorie.php';
include '../classes/Cours.php';

$tag = new Tag($pdo);
$categorie = new Categorie($pdo);
$cours = new Cours($pdo, '', '', '', '', '');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js" defer></script>
</head>

<body class="bg-gradient-to-br from-indigo-500 to-purple-600 text-gray-900 p-5">
  <div class="container mx-auto py-8">
    <!-- Header -->
    <header class="mb-8 text-center ">
      <h1 class="text-4xl font-extrabold text-white drop-shadow-lg">📚 Gestion des Cours</h1>
      <p class="text-lg text-gray-200 mt-2">Ajoutez, gérez et suivez vos cours facilement !</p>
    </header>

    <!-- Section: Ajout de cours -->
    <section class="bg-white p-8 rounded-xl shadow-lg mb-12">
      <h2 class="text-2xl font-bold text-purple-700 mb-4">Ajouter un Nouveau Cours</h2>
      <form method="post" action="ajout_cours.php" class="space-y-4" enctype="multipart/form-data">
        <div>
          <label for="title" class="block text-gray-700 font-semibold">Titre</label>
          <input type="text" name="title" id="title" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" placeholder="Titre du cours" required>
        </div>
        <div>
          <label for="description" class="block text-gray-700 font-semibold">Description</label>
          <input id="description" name="description" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" rows="4" placeholder="Description du cours" required></input>
        </div>
        <div>
          <label for="typeContenu" class="block text-gray-700 font-semibold">Catégorie</label>
          <select name="typeContenu" id="typeContenu" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
            <option>video</option>
            <option>image</option>
            <option>document</option>
          </select>
        </div>
        <div>
          <label for="content" class="block text-gray-700 font-semibold">Contenu (Vidéo ou Document)</label>
          <input type="file" name="content" id="content" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
        </div>
        <div>
          <label for="tags" class="block text-gray-700 font-semibold">Tags</label>
          <select name="tags[]" id="multi-select" multiple >
            <?php
                $tags = $tag->displayTag();
                foreach ($tags as $tag) {
                    echo "<option value='$tag[id_tag]'>$tag[nom]</option>";
                }
            ?>
           </select>
        </div>
        <div>
          <label for="category" class="block text-gray-700 font-semibold">Catégorie</label>
          <select name="category" id="category" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
          <?php
                $categories = $categorie->displayCategorie();
                foreach ($categories as $categorie) {
                    echo "<option value='$categorie[id_categorie]'>$categorie[nom]</option>";
                }
            ?>
          </select>
        </div>
        <button name="addCours" type="submit" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg shadow hover:opacity-90 font-bold">Ajouter</button>
      </form>
    </section>

    <!-- Section: Gestion des cours -->
    <section class="mb-12">
      <h2 class="text-2xl font-bold text-white mb-6">Cours Disponibles</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Exemple de carte de cours -->
         <?php
         $courses = $cours->displayCours();
         foreach($courses as $cours){
          echo"<div class='bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition'>
          <h3 class='text-lg font-bold text-purple-700'>$cours[titre]</h3>
          <p class='text-gray-600 mt-2'>$cours[description]</p>
          <p class='text-sm text-gray-500 mt-4'>Catégorie : $cours[nom]</p>
          <div class='mt-4 flex justify-between items-center'>
            <a href='#?id=$cours[cours_id]'><button class='text-sm text-blue-600 font-semibold hover:underline'>Modifier</button></a>
            <a href='#?id=$cours[cours_id]'><button class='text-sm text-red-600 font-semibold hover:underline'>Supprimer</button></a>
          </div>
        </div>";
         }
         ?>
      </div>
    </section>

    <!-- Section: Statistiques -->
    <section class="bg-white p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-purple-700 mb-4">Statistiques</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white p-6 rounded-lg shadow-lg">
          <p class="text-lg font-semibold">Étudiants Inscrits</p>
          <p class="text-4xl font-bold">0</p>
        </div>
        <div class="bg-gradient-to-r from-purple-500 to-blue-500 text-white p-6 rounded-lg shadow-lg">
          <p class="text-lg font-semibold">Nombre de Cours</p>
          <p class="text-4xl font-bold">0</p>
        </div>
        <!-- Ajoutez d'autres statistiques ici -->
      </div>
    </section>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const multipleSelect = new Choices('#multi-select', {
            removeItemButton: true, // Permet de supprimer les options sélectionnées
            placeholderValue: 'Sélectionnez des options...', // Texte par défaut
            searchPlaceholderValue: 'Rechercher...', // Texte du champ de recherche
        });
    });
</script>
</body>

</html>
