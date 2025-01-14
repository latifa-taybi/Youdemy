<?php
include './header.php';
?>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Bienvenue de nouveau, Admin</h1>
                <button class="lg:hidden text-gray-800 text-2xl" id="open-sidebar">
                    <i class="fas fa-bars"></i>
                </button>
            </header>
            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Cards -->
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium">Totale des cours</h2>
                        <i class="fas fa-book-open text-3xl text-purple-500"></i>
                    </div>
                    <p class="text-4xl font-bold mt-4">0</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium">Étudiants inscrits</h2>
                        <i class="fas fa-user-graduate text-3xl text-pink-500"></i>
                    </div>
                    <p class="text-4xl font-bold mt-4">0</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 transform hover:scale-105 transition duration-300">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium">Revenue</h2>
                        <i class="fa-solid fa-chalkboard-user text-3xl text-orange-500"></i>
                    </div>
                    <p class="text-4xl font-bold mt-4">0</p>
                </div>
            </section>
        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const openSidebar = document.getElementById('open-sidebar');
        const closeSidebar = document.getElementById('close-sidebar');

        openSidebar.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-72');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-72');
        });
    </script>
</body>
</html>
