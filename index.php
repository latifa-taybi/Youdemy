<?php
require_once 'database/config.php';
include './classes/Categorie.php';
include './classes/Cours.php';

$categorie = new Categorie($pdo);
$cours = new Cours($pdo, '', '','', '', '');

// echo $nb_total_cours['nb_total'];
// print_r($nb_total_cours) ;

// -------------Pagination-------------------
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$offset = ($page - 1) * 3;
// -------------Recherche par mot clé-----------

if(isset($_POST['recherche'])){
    $mot_cle = $_POST['mot_cle'];
    $nb_total_cours=$cours->countRechercheCours($mot_cle);
    $nbrs_pages = ceil($nb_total_cours['nb_total']/3);
    $coursPagination = $cours->PaginationRecherche($mot_cle, 3, $offset);
}else{
    $nb_total_cours=$cours->countCours();
    $nbrs_pages = ceil($nb_total_cours['nb_total']/3);
    $coursPagination = $cours->Pagination(3, $offset);

}

?>
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

  <section class="bg-indigo-600 text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Apprenez tout, partout</h1>
            <p class="text-lg md:text-xl mb-8">Rejoignez des milliers d'apprenants du monde entier pour développer vos compétences.</p>
            <form action=""  method="POST">
              <div class="max-w-2xl mx-auto flex items-center space-x-4">
                <input name="mot_cle" type="text" placeholder="Que voulez-vous apprendre ?" class="w-full px-4 py-3 rounded-lg text-gray-800">
                <button name="recherche" class="bg-white text-indigo-600 px-6 py-3 rounded-lg hover:bg-gray-200">Rechercher</button>
              </div>
            </form>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Les Cours</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                  foreach($coursPagination as $cours){
                    echo "<div class='bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg'>
                      <div class='p-6'>
                          <h3 class='text-xl font-semibold mb-2'>$cours[titre]</h3>
                          <p class='text-gray-600 mb-4'>$cours[description]</p>
                          <div class='flex items-center justify-between'>
                              <a href='#' class='text-white bg-indigo-600 px-4 py-2 rounded-lg hover:bg-indigo-700'>S'inscrire</a>
                          </div>
                      </div>
                  </div>";
                  }
                
                  ?>
                <!-- Repeat for more courses -->
            </div>
        </div>
    </section>
    <nav aria-label="Page navigation example" class="flex items-center justify-center mb-5">
  <ul class="inline-flex -space-x-px text-base h-10">
    <?php
    for($i=1;$i<=$nbrs_pages;$i++){
      echo"<li>
      <a href='?page=$i' class='flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white'>$i</a>
    </li>";
    }
    ?>
  </ul>
</nav>
 

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-6 text-center">
            <p class="text-sm">&copy; 2025 EduLearn. All rights reserved.</p>
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
