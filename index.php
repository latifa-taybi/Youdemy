<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Avancée avec Icônes</title>
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
          <!-- Bouton de Connexion -->
          <a href="./role.php" class="flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
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
        <a href="#" class="block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 mx-4 mt-2 text-center flex items-center">
        <i class="fas fa-sign-in-alt mr-2"></i>Connexion
        </a>
      </div>
    </div>
  </nav>

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
