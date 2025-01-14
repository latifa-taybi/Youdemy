<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 text-gray-900">
  <div class="container mx-auto py-8">
    <!-- Header -->
    <header class="mb-8 text-center">
      <h1 class="text-4xl font-extrabold text-white drop-shadow-lg">📚 Gestion des Cours</h1>
      <p class="text-lg text-gray-200 mt-2">Ajoutez, gérez et suivez vos cours facilement !</p>
    </header>

    <!-- Section: Ajout de cours -->
    <section class="bg-white p-8 rounded-xl shadow-lg mb-12">
      <h2 class="text-2xl font-bold text-purple-700 mb-4">Ajouter un Nouveau Cours</h2>
      <form class="space-y-4">
        <div>
          <label for="title" class="block text-gray-700 font-semibold">Titre</label>
          <input type="text" id="title" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" placeholder="Titre du cours" required>
        </div>
        <div>
          <label for="description" class="block text-gray-700 font-semibold">Description</label>
          <textarea id="description" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" rows="4" placeholder="Description du cours" required></textarea>
        </div>
        <div>
          <label for="content" class="block text-gray-700 font-semibold">Contenu (Vidéo ou Document)</label>
          <input type="file" id="content" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
        </div>
        <div>
          <label for="tags" class="block text-gray-700 font-semibold">Tags</label>
          <input type="text" id="tags" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400" placeholder="Ex: Développement, Design">
        </div>
        <div>
          <label for="category" class="block text-gray-700 font-semibold">Catégorie</label>
          <select id="category" class="w-full border-2 border-purple-300 rounded-lg p-3 focus:ring focus:ring-purple-400">
            <option>Développement</option>
            <option>Design</option>
            <option>Marketing</option>
          </select>
        </div>
        <button type="submit" class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-lg shadow hover:opacity-90 font-bold">Ajouter</button>
      </form>
    </section>

    <!-- Section: Gestion des cours -->
    <section class="mb-12">
      <h2 class="text-2xl font-bold text-white mb-6">Cours Disponibles</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Exemple de carte de cours -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition">
          <h3 class="text-lg font-bold text-purple-700">Exemple de Cours 1</h3>
          <p class="text-gray-600 mt-2">Une description rapide de ce cours fascinant.</p>
          <p class="text-sm text-gray-500 mt-4">Catégorie : Développement</p>
          <p class="text-sm text-gray-500">Inscriptions : 12</p>
          <div class="mt-4 flex justify-between items-center">
            <button class="text-sm text-blue-600 font-semibold hover:underline">Modifier</button>
            <button class="text-sm text-red-600 font-semibold hover:underline">Supprimer</button>
          </div>
        </div>
        <!-- Ajoutez d'autres cartes ici -->
        <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-2xl transform hover:scale-105 transition">
          <h3 class="text-lg font-bold text-purple-700">Exemple de Cours 2</h3>
          <p class="text-gray-600 mt-2">Ce cours est particulièrement mauvais, mais il existe !</p>
          <p class="text-sm text-gray-500 mt-4">Catégorie : Marketing</p>
          <p class="text-sm text-gray-500">Inscriptions : 3</p>
          <div class="mt-4 flex justify-between items-center">
            <button class="text-sm text-blue-600 font-semibold hover:underline">Modifier</button>
            <button class="text-sm text-red-600 font-semibold hover:underline">Supprimer</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Statistiques -->
    <section class="bg-white p-8 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-purple-700 mb-4">Statistiques</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-green-500 text-white p-6 rounded-lg shadow-lg">
          <p class="text-lg font-semibold">Étudiants Inscrits</p>
          <p class="text-4xl font-bold">120</p>
        </div>
        <div class="bg-gradient-to-r from-pink-500 to-red-500 text-white p-6 rounded-lg shadow-lg">
          <p class="text-lg font-semibold">Nombre de Cours</p>
          <p class="text-4xl font-bold">10</p>
        </div>
        <!-- Ajoutez d'autres statistiques ici -->
      </div>
    </section>
  </div>
</body>

</html>
