<?php

// unset($_SESSION['user']);

//On appelle la fonction getAll()
$filmDao = new FilmDAO();

$films = $filmDao->getAll();

//On affiche le template Twig correspondant
echo $twig->render('film.html.twig', [
    'films' => $films
]);
