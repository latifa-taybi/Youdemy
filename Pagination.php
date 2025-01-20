<?php
include './database/config.php';
include './classes/Cours.php';

$cours= new Cours($pdo, '', '','', '', '');
$nb_total_cours=$cours->countCours();

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}
// echo $page;
$nbr_cours_par_page = 3;
$nbrs_pages = $nb_total_cours['nb_total']/3;
$offset = ($page - 1) * 3;
// echo $offset;

$pagination=$cours->Pagination($nbr_cours_par_page, $offset);
// print_r($pagination);

?>