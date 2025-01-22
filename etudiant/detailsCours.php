<?php
require_once '../database/config.php';
include '../auth/login.php';
include '../classes/Categorie.php';
include '../classes/Cours.php';

$categorie = new Categorie($pdo);
$cours = new Cours($pdo);

$Cours = $cours->getCoursDetails($_GET['id']);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Cours</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-900">

    <!-- Container for the course details -->
    <div class="max-w-4xl mx-auto p-6">

        <!-- Course Header -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h1 class="text-3xl font-bold text-center text-gray-800  mb-4"><?php if(isset($Cours)){echo $Cours['titre'];} ?></h1>
            <div class="flex justify-center items-center mb-4">
                <img src="<?php if(isset($Cours)){echo $Cours['image'];} ?>" alt="Image du cours" class="w-36 h-36 object-cover rounded-xl border-4 border-indigo-500 shadow-md mr-4">
                <div>
                    <p class="text-lg font-semibold">Formateur: <?php echo $Cours['id_user']?></p>
                    <p class="text-gray-600">Catégorie: <?php if(isset($Cours)){echo $Cours['categorie'];} ?></p>
                </div>
            </div>

            <div class="mb-4">
                <h2 class="text-2xl font-semibold mb-2">Description du Cours</h2>
                <p class="text-gray-700"><?php if(isset($Cours)){echo $Cours['description'];} ?></p>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-2">Contenu du Cours</h2>
                <p class="text-gray-700"><?php if(isset($Cours)){echo $Cours['contenu'];} ?></p>
            </div>
        </div>
    </div>

</body>
</html>
