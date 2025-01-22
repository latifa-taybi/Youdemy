<?php
include './header.php';
include '../database/config.php';
include '../classes/Cours.php';

$cours = new Cours($pdo);

?>

<main class="flex-1 p-8">
    <header class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Gestion des Etudiants</h1>
        <button class="lg:hidden text-gray-800 text-2xl" id="open-sidebar">
            <i class="fas fa-bars"></i>
        </button>
    </header>
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg mt-4">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">ID</th>
                    <th class="px-6 py-4 text-left">Titre</th>
                    <th class="px-6 py-4 text-left">Description</th>
                    <th class="px-6 py-4 text-left">Categorie</th>
                </tr>
            </thead>
            <tbody>
            <?php

                $cours->displayCours();
                foreach($cours as $course){
                    if($course['is_valide'] == 'Non validé'){
                            $avtivation = 'Validé';
                            $activationClass = 'bg-green-500';
                        } else {
                            $avtivation = 'Validé';
                            $activationClass = 'bg-green-500';
                        }
                    
                    echo "
                        <tr class='border-t border-gray-200'>
                            <td class='px-6 py-4'>$course[id]</td>
                            <td class='px-6 py-4'>$course[nom]</td>
                            <td class='px-6 py-4'>$course[email]</td>
                            <td class='px-6 py-4'>
                                <a href='../administrateur/toggleAcc.php?id=$course[id]'>
                                <button class='$activationClass text-white px-2 py-1 rounded-full'>$avtivation</button>
                                </a>
                            </td>
                        </tr>
                        ";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
