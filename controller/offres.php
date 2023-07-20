<?php

// unset($_SESSION['user']);

//On appelle la fonction getAll()
$offresDao = new OffresDAO();

$offers = $offresDao->getAll();

//On affiche le template Twig correspondant
echo $twig->render('offres.html.twig', [
    'offers' => $offers,
<<<<<<< HEAD
]);
=======
]);
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
