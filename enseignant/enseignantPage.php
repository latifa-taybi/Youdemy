<?php
include '../database/config.php';
include '../classes/Tag.php';
include '../classes/Categorie.php';
include '../classes/Cours.php';


$tag = new Tag($pdo);
$categorie = new Categorie($pdo);
$cours = new Cours($pdo, '', '', '', '', '');

$cours = new Cours($pdo, '', '', '', '');

if(isset($_POST['addCours'])){
    $titre=$_POST['title'];
    $description=$_POST['description'];
    $contenu=$_POST['contenu'];
    $categorieId=$_POST['category'];
    $tags=$_POST['tags'];

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

// --Modifier les Cours
if (isset($_GET['id_edit'])) {
  $coursEdit = $cours->getCoursId($_GET['id_edit']);
    $tagsEdit = $cours->getTagsByCoursId($_GET['id_edit']);
}

if (isset($_POST['editCours'])) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $contenu = $_POST['contenu'];
  $tags = $_POST['tags'];
  $category = $_POST['category'];
  $cours->EditCours($_GET['id_edit'],  $title, $description, $category, $contenu);
  header('location: enseignantPage.php');
}

// --Supprimer les Cours
if(isset($_GET['id_delete'])) {
  $coursDelete = $cours->DeleteCours($_GET['id_delete']);
  header('location: enseignantPage.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
<!-- CDN tom-select -->
  <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<!-- CDN summernote -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs4.min.js"></script>
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
      <form method="post" action="" class="space-y-4" enctype="multipart/form-data">
        <div>
          <label for="title" class="block text-gray-700 font-semibold">Titre</label>
          <input type="text" name="title" id="title" value="<?php if (isset($coursEdit)) { echo $coursEdit['titre']; } ?>" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" placeholder="Titre du cours" required>
        </div>
        
        <div>
          <label for="description" class="block text-gray-700 font-semibold">Description</label>
          <input id="description" name="description" value="<?php if (isset($coursEdit)) { echo $coursEdit['description']; } ?>" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" rows="4" placeholder="Description du cours" required></input>
        </div>
        <div>
          <label for="content" class="block text-gray-700 font-semibold">Contenu</label>
          <textarea id="contenu" name="contenu" value=""><?php if (isset($coursEdit)) { echo $coursEdit['contenu']; } ?></textarea>
        </div>
        <div>
          <label for="tags" class="block text-gray-700 font-semibold">Tags</label>
          <select name="tags[]" id="multi-select" multiple>
            <?php
            $tags = $tag->displayTag();
            ?>
          </select>
        </div>
        <div>
          <label for="category" class="block text-gray-700 font-semibold">Catégorie</label>
          <select name="category" id="category" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
            
            <?php
            $categories = $categorie->displayCategorie();
            foreach ($categories as $categorie) {
              if (isset($coursEdit) && $coursEdit['categorie_id'] == $categorie['id_categorie']) {
                $selected = 'selected';
              } else {
                $selected = '';
              }
              echo "<option value='$categorie[id_categorie]' $selected>$categorie[nom]</option>";
            }
            ?>
          </select>
        </div>
        <?php
        if (isset($_GET['id_edit'])) {
          echo "<button name='editCours' type='submit' class='bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg shadow hover:opacity-90 font-bold'>Modifier le Cours</button> ";
        } else {
          echo "<button name='addCours' type='submit' class='bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg shadow hover:opacity-90 font-bold'>Ajouter un Cours</button> ";
        }
        ?>
      </form>
    </section>

    <!-- Section: Gestion des cours -->
    <section class="mb-12">
      <h2 class="text-2xl font-bold text-white mb-6">Cours Disponibles</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Exemple de carte de cours -->
        <?php
        $courses = $cours->displayCours();
        foreach ($courses as $cours) {
          echo "<div class='bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition'>
          <h3 class='text-lg font-bold text-purple-700'>$cours[titre]</h3>
          <p class='text-gray-600 mt-2'>$cours[description]</p>
          <p class='text-sm text-gray-500 mt-4'>Catégorie : $cours[nom]</p>
          <div class='mt-4 flex justify-between items-center'>
            <a href='?id_edit=$cours[cours_id]'><button class='text-sm text-blue-600 font-semibold hover:underline'>Modifier</button></a>
            <a href='?id_delete=$cours[cours_id]'><button class='text-sm text-red-600 font-semibold hover:underline'>Supprimer</button></a>
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
    // new TomSelect('#multi-select', {
    //   create: false,
    //   plugins: ['remove_button'],
    // });

    new TomSelect("#multi-select", {
          persist: false,
          createOnBlur: true,
          create: false,
          plugins: ['remove_button'], 

          options: [
              <?php
              if(isset($tags)){
                foreach($tags as $tag){
                  echo "{value: '{$tag['id_tag']}', text: '{$tag['nom']}'},";
                }; 
              }
              ?>
          ],

          items: [
            <?php    
              if(isset($_GET['id_edit'])){              
                foreach($tagsEdit as $tag){ echo "'$tag[id_tag]',"; }
              }
            ?>
          ],
          dropdown: {
              position: 'below',
              maxItems: 10
          }
      });

  $(document).ready(function() {
    $('#contenu').summernote({
      placeholder: 'Écrivez ici...',
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
      ],
      styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
      fontNames: ['Helvetica', 'Arial', 'Courier New', 'Comic Sans MS'], // Police personnalisée
    });
  });
  </script>
</body>

</html>