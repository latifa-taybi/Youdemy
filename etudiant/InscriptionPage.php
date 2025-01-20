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
                <a href="etudiantPage.php" class="text-gray-600 hover:text-indigo-600 transition">Accueil</a>
                <a active href="InscriptionPage.php" class="text-gray-600 hover:text-indigo-600 transition">Mes Cours</a>
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

    <main class="container mx-auto px-6 py-12 space-y-16">
    <section id="mes-cours">
            <h3 class="text-3xl font-bold text-gray-800 mb-8">Mes Cours</h3>
            <div class="bg-gray-100 border-l-4 border-indigo-600 shadow-md rounded-lg p-8">
                <p class="text-gray-700 text-lg">Vous n'avez rejoint aucun cours pour le moment. Explorez le catalogue pour commencer votre apprentissage !</p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-200 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 LearnIt. Tous droits réservés.</p>
        </div>
    </footer>