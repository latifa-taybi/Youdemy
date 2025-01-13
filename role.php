<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choix de rôle</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Effet de survol pour les cartes */
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50 h-screen flex items-center justify-center">

    <!-- Conteneur principal -->
    <div class="w-full max-w-2xl bg-white p-12 rounded-3xl shadow-2xl">

        <!-- Titre de la page -->
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">Sélectionnez votre rôle</h2>

        <!-- Conteneur des cartes -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-12">

            <!-- Carte Étudiant -->
            <a href="./auth/registrationPage.php?role=etudiant">
                <div id="studentCard" class="card p-8 bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-xl shadow-xl cursor-pointer transition-all duration-300">
                    <div class="flex justify-center mb-6">
                    <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-center">Étudiant</h3>
                    <p class="mt-4 text-center text-sm">Accédez à vos cours, gérez vos devoirs et suivez vos progrès.</p>
                </div>
            </a>

            <!-- Carte Professeur -->
            <a href="./auth/registrationPage.php?role=enseignant">
                <div id="teacherCard" class="card p-8 bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-xl shadow-xl cursor-pointer transition-all duration-300">
                    <div class="flex justify-center mb-6">
                    <i class="fa-solid fa-chalkboard-user"></i>
                    </div>
                    <h3 class="text-2xl font-semibold text-center">Enseignant</h3>
                    <p class="mt-4 text-center text-sm">Gérez vos cours, suivez vos étudiants et créez du contenu.</p>
                </div>
            </a>

        </div>

        <!-- Bouton suivant caché initialement -->
        <div id="nextButtonContainer" class="hidden text-center mt-10">
            <button id="nextButton" class="w-full py-3 bg-indigo-600 text-white rounded-lg focus:outline-none hover:bg-indigo-700 transition duration-300">
                Continuer
            </button>
        </div>

        <p id="roleText" class="text-center text-sm text-gray-600 mt-4">Choisissez votre rôle pour continuer.</p>

    </div>
</body>

</html>