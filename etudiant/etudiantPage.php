<?php
require_once '../database/config.php';
include '../classes/Categorie.php';
include '../classes/Cours.php';

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

<body class="bg-gray-50">
    <!-- Navbar -->
    <header class="bg-white shadow-md sticky top-0 z-10">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-3xl font-bold text-blue-600 flex items-center space-x-2">
                <i class="fas fa-book-open text-blue-700"></i>
                <span>Youdemy</span>
            </a>
            <nav class="space-x-6">
                <a active href="etudiantPage.php" class="text-gray-600 hover:text-indigo-600 transition">Accueil</a>
                <a href="InscriptionPage.php" class="text-gray-600 hover:text-indigo-600 transition">Mes Cours</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-indigo-500 to-purple-600 text-white py-20 px-6 text-center">
        <div class="container mx-auto">
            <h2 class="text-5xl font-bold mb-6">Explorez et Apprenez</h2>
            <p class="text-lg mb-8">Des centaines de cours pour enrichir vos compétences et réussir dans votre domaine.</p>
            <div class="flex justify-center">
                <input type="text" placeholder="Rechercher un cours..." class="w-1/2 p-4 rounded-l-lg focus:ring-4 focus:ring-indigo-300">
                <button class="bg-indigo-700 hover:bg-indigo-800 text-white px-6 py-4 rounded-r-lg font-bold">Rechercher</button>
            </div>
        </div>
    </section>

    

    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Catégories populaires</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php
                    $categories = $categorie->displayCategorie();
                    foreach ($categories as $categorie) {
                        echo"
                        <div class='bg-white shadow-md rounded-lg p-6 text-center hover:shadow-lg'>
                           <h3 class='text-xl font-semibold text-indigo-600 mb-2'>$categorie[nom]</h3>
                           <p class='text-gray-600'>$categorie[description]</p>
                        </div>
                        ";
                    }
                ?>  
            </div>
        </div>
    </section>

    <!-- Catalogue des Cours -->
    <main class="container mx-auto px-6 py-12 space-y-16">
        <!-- Section Catalogue -->
        <section>
            <h3 class="text-3xl font-bold text-gray-800 mb-8">Catalogue des Cours</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card -->
                 <?php
                $courses = $cours->displayCours();
                foreach($courses as $cours){
                echo "<div class='bg-white shadow-lg rounded-lg overflow-hidden transform hover:-translate-y-2 transition-transform'>
                    <img src='' alt='Course Image' class='w-full h-48 object-cover'>
                    <div class='p-6'>
                        <h4 class='text-xl font-bold text-gray-800 mb-2'>$cours[titre]</h4>
                        <p class='text-gray-600 mb-4'>$cours[description]</p>
                        <div class='flex justify-between items-center'>
                            <a href=detailsCours.php?id=$cours[cours_id]><button class='bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700'>Voir Détails</button></a>
                            <a href=InscriptionPage.php?id=$cours[cours_id]><button class='bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700'>S'inscrire</button></a>
                        </div>
                    </div>
                </div>";
                }
            ?>
                <!-- Duplicate this card as needed -->
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 LearnIt. Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>