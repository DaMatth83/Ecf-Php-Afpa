<?php
// unset($_SESSION['user']);

// On appelle la fonction getAll()
$filmDao = new FilmDAO();
$search = null;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search'];
    $search = strtolower($search);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete = $filmDao->delete($id);
}


$films = $filmDao->getAll($search);
$total_films = count($films);



// On affiche le template Twig correspondant
echo $twig->render('film.html.twig', [
    'films' => $films,
    'total_films' => $total_films,
    'search' => $search,
]);
