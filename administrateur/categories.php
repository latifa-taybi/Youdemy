<?php
include './header.php';
?>

<main class="flex-1 p-8 container mx-auto space-y-8">
    <!-- Header -->
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-indigo-600 mb-4">Gestion des Catégories</h1>
    </div>

    <!-- Ajouter une catégorie -->
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter une Catégorie</h2>
        <form id="categoryForm" class="space-y-6">
            <!-- Nom de la catégorie -->
            <div class="relative group">
                <label for="categoryName" class="block text-sm font-medium text-gray-700">Nom de la catégorie</label>
                <input
                    type="text"
                    id="categoryName"
                    name="categoryName"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Entrez le nom de la catégorie">
            </div>

            <!-- Description de la catégorie -->
            <div class="relative group">
                <label for="categoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea
                    id="categoryDescription"
                    name="categoryDescription"
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    rows="4"
                    placeholder="Entrez une description pour la catégorie"></textarea>
            </div>

            <!-- Bouton Ajouter -->
            <button
                type="button"
                id="addCategory"
                class="w-full bg-indigo-600 text-white font-medium py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                <i class="fas fa-plus-circle mr-2"></i>
                Ajouter une Catégorie
            </button>
        </form>
    </div>

    <!-- Liste des catégories -->
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Liste des Catégories</h2>
        <ul id="categoryList" class="space-y-4">
            <!-- Les catégories seront ajoutées ici dynamiquement -->
            <li class="flex items-center justify-between p-4 bg-gray-50 border border-gray-200 rounded-lg">
                <div>
                    <h3 class="font-semibold text-gray-800">Nom de la Catégorie</h3>
                    <p class="text-gray-500 text-sm">Description de la catégorie...</p>
                </div>
                <div class="flex space-x-4">
                    <button class="text-blue-500 hover:text-blue-700 font-small flex items-center space-x-2 transition-transform hover:scale-105">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button class="text-red-500 hover:text-red-700 font-small flex items-center space-x-2 transition-transform hover:scale-105">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</main>
</div>
</body>