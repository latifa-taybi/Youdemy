<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion / Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <!-- Form Container -->
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-8">Bienvenue</h2>
        
        <!-- Login Form -->
        <form method="POST" action="./login.php" id="loginForm" class="space-y-6">
            <div>
                <label for="loginEmail" class="block text-sm font-medium text-gray-600">Email</label>
                <input name="email" type="email" id="loginEmail" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:outline-none" placeholder="Votre email" required>
            </div>
            <div>
                <label for="loginPassword" class="block text-sm font-medium text-gray-600">Mot de passe</label>
                <input name="password" type="password" id="loginPassword" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:outline-none" placeholder="Votre mot de passe" required>
            </div>
            <div>
                <button name="login" type="submit" class="w-full py-3 bg-blue-500 text-white rounded-md focus:outline-none hover:bg-blue-600">Se connecter</button>
            </div>
            <p class="text-center text-sm text-gray-500">Pas encore de compte? <span id="showRegister" class="text-blue-500 cursor-pointer">S'inscrire</span></p>
        </form>

        <!-- Register Form (hidden by default) -->
        <form method="POST" action="./registre.php" id="registerForm" class="space-y-6 hidden">
            <div>
                <label for="fullName" class="block text-sm font-medium text-gray-600">Nom complet</label>
                <input name="nom" type="text" id="fullName" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:outline-none" placeholder="Votre nom" required>
            </div>
            <div>
                <label for="registerEmail" class="block text-sm font-medium text-gray-600">Email</label>
                <input name="email" type="email" id="registerEmail" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:outline-none" placeholder="Votre email" required>
            </div>
            <div>
                <label for="registerPassword" class="block text-sm font-medium text-gray-600">Mot de passe</label>
                <input name="motDePasse" type="password" id="registerPassword" class="w-full p-3 mt-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:outline-none" placeholder="Votre mot de passe" required>
            </div>
            <div>
                <input name="role" type="hidden" id="role" value='<?= $_GET['role']?>'>
            <div>
                <button name="registre" type="submit" class="w-full py-3 bg-blue-500 text-white rounded-md focus:outline-none hover:bg-blue-600">S'inscrire</button>
            </div>
            <p class="text-center text-sm text-gray-500">Vous avez déjà un compte? <span id="showLogin" class="text-blue-500 cursor-pointer">Se connecter</span></p>
        </form>
    </div>

    <script>
        // Toggle between login and register forms
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const showRegister = document.getElementById('showRegister');
        const showLogin = document.getElementById('showLogin');

        showRegister.addEventListener('click', () => {
            registerForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            registerTab.classList.add('text-blue-500');
            registerTab.classList.remove('text-gray-500');
            loginTab.classList.remove('text-blue-500');
            loginTab.classList.add('text-gray-500');
        });

        showLogin.addEventListener('click', () => {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
            loginTab.classList.add('text-blue-500');
            loginTab.classList.remove('text-gray-500');
            registerTab.classList.remove('text-blue-500');
            registerTab.classList.add('text-gray-500');
        });
    </script>
</body>

</html>


