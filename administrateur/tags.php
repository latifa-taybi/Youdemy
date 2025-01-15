<?php
include './header.php';
include '../database/config.php';
include '../classes/Tag.php';

$tag = new Tag($pdo);

if (isset($_POST['addtag'])) {
    echo 'hhhhh';
    $nomTag = $_POST['tagName'];
    $tag->addTag($nomTag);
}

?>


<main class="flex-1 p-8 container mx-auto space-y-8">
    <!-- Header -->
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-indigo-600 mb-4">Gestion des Tags</h1>
    </div>

    <!-- Ajouter un tag -->
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Ajouter un Tag</h2>
        <form method="post" action="" id="tagForm" class="space-y-6">
            <!-- Nom du tag -->
            <div class="relative group">
                <label for="tagName" class="block text-sm font-medium text-gray-700">Nom du Tag</label>
                <input 
                    type="text" 
                    id="tagName" 
                    name="tagName" 
                    class="w-full mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                    placeholder="Entrez le nom du tag">
            </div>

            <!-- Bouton Ajouter -->
            <button 
                type="submit" 
                id="addtag" 
                name="addtag"
                class="w-full bg-indigo-600 text-white font-medium py-3 px-4 rounded-lg hover:bg-indigo-700 transition">
                <i class="fas fa-plus-circle mr-2"></i>
                Ajouter un Tag
            </button>
        </form>
    </div>

    <!-- Liste des tags -->
    <div class="bg-white shadow-lg rounded-xl p-8">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6">Liste des Tags</h2>
        <ul id="tagList" class="space-y-4">
            <!-- Exemple de tag -->
            <?php
            $tag->displayTag();
            ?>
            <!-- Les autres tags seront ajoutés dynamiquement ici -->
        </ul>
    </div>
</main>
