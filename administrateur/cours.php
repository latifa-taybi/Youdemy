<?php
include './header.php';
?>

<main class="flex-1 p-8">
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestion des Etudiants</h1>
        <button class="lg:hidden text-gray-800 text-2xl" id="open-sidebar">
            <i class="fas fa-bars"></i>
        </button>
    </header>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-4">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Titre</th>
                    <th class="px-6 py-4 text-left">Description</th>
                    <th class="px-6 py-4 text-left">Categorie</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</main>
