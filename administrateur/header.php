<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>
<body class="bg-blue-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-72 transition-transform transform -translate-x-72 lg:translate-x-0 lg:static fixed h- z-30 shadow-2xl" id="sidebar">
            <div class="p-6 flex justify-between items-center border-b border-gray-700">
                <h2 class="text-2xl font-bold">Admin Panel</h2>
                <button class="lg:hidden text-white text-2xl" id="close-sidebar">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <nav class="mt-6">
                <ul>
                    <li>
                        <a href="./admin.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fas fa-home mr-3"></i>
                            <span>Accueil</span>
                        </a>
                    </li>
                    <li>
                        <a href="./cours.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fas fa-book-reader mr-3"></i>
                            <span>Cours</span>
                        </a>
                    </li>
                    <li>
                        <a href="./etudiant.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fas fa-user-graduate mr-3"></i>
                            <span>Etudiants</span>
                        </a>
                    </li>
                    <li>
                        <a href="./enseignant.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fas fa-user-friends mr-3"></i>
                            <span>Enseignants</span>
                        </a>
                    </li>
                    <li>
                        <a href="./categories.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fa-solid fa-layer-group mr-3"></i>
                            <span>Catégories</span>
                        </a>
                    </li>
                    <li>
                        <a href="./tags.php" class="flex items-center py-3 px-6 hover:bg-gray-700 rounded transition-all">
                            <i class="fa-solid fa-tag mr-3"></i>
                            <span>Tags</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>