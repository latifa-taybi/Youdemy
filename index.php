<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalogue des Cours</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <!-- Navbar -->
  <nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6">
      <div class="flex justify-between items-center py-4">
        <!-- Logo -->
        <a href="#" class="text-3xl font-bold text-blue-600 flex items-center space-x-2">
          <i class="fas fa-book-open text-blue-700"></i>
          <span>Youdemy</span>
        </a>

        <!-- Menu (Large Screens) -->
        <div class="hidden md:flex space-x-8 items-center">
          <a href="#about" class="flex items-center text-gray-700 hover:text-blue-600 hover:underline">
            <i class="fas fa-info-circle mr-2"></i> À propos
          </a>
          <a href="#courses" class="flex items-center text-gray-700 hover:text-blue-600 hover:underline">
            <i class="fas fa-chalkboard-teacher mr-2"></i> Cours
          </a>
          <a href="#contact" class="flex items-center text-gray-700 hover:text-blue-600 hover:underline">
            <i class="fas fa-envelope mr-2"></i> Contact
          </a>
          <a href="#login" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            <i class="fas fa-sign-in-alt mr-2"></i> Connexion
          </a>
        </div>

        <!-- Menu Hamburger (Mobile) -->
        <div class="md:hidden">
          <button id="menu-toggle" class="text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Menu Mobile -->
      <div id="mobile-menu" class="hidden md:hidden">
        <a href="#about" class="block text-gray-700 hover:bg-gray-200 px-4 py-2 flex items-center">
          <i class="fas fa-info-circle mr-2"></i> À propos
        </a>
        <a href="#courses" class="block text-gray-700 hover:bg-gray-200 px-4 py-2 flex items-center">
          <i class="fas fa-chalkboard-teacher mr-2"></i> Cours
        </a>
        <a href="#contact" class="block text-gray-700 hover:bg-gray-200 px-4 py-2 flex items-center">
          <i class="fas fa-envelope mr-2"></i> Contact
        </a>
        <a href="#login" class="block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mx-4 mt-2 text-center flex items-center">
          <i class="fas fa-sign-in-alt mr-2"></i> Connexion
        </a>
      </div>
    </div>
  </nav>

  <!-- Section de Recherche -->
  <section class="bg-indigo-600 text-white py-12">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-4xl font-bold mb-4">Rechercher des Cours</h1>
      <p class="text-lg mb-8">Trouvez le cours parfait pour développer vos compétences.</p>
      <div class="max-w-2xl mx-auto flex items-center space-x-4">
        <input type="text" placeholder="Rechercher un cours..." class="w-full px-4 py-3 rounded-lg text-gray-800">
        <button class="bg-white text-indigo-600 px-6 py-3 rounded-lg hover:bg-gray-200">Rechercher</button>
      </div>
    </div>
  </section>

  <!-- Catalogue des Cours avec Pagination -->
  <section class="py-16">
    <div class="container mx-auto px-6">
      <h2 class="text-3xl font-bold text-center mb-10">Catalogue des Cours</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Exemple de Carte de Cours -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg">
          <img src="https://via.placeholder.com/400x200" alt="Cours" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-semibold mb-2">Titre du Cours</h3>
            <p class="text-gray-600 mb-4">Description rapide du cours.</p>
            <a href="#" class="text-white bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700">Détails</a>
          </div>
        </div>
      </div>
      <div class="flex justify-center mt-10">
        <button class="bg-gray-200 text-gray-600 px-4 py-2">1</button>
        <button class="bg-gray-200 text-gray-600 px-4 py-2">2</button>
        <button class="bg-gray-200 text-gray-600 px-4 py-2">3</button>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto px-6 text-center">
      <p class="text-sm">&copy; 2025 Youdemy. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
    // Gérer le menu mobile
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
      mobileMenu.classList.toggle('hidden');
    });
  </script>
</body>
</html>
