<?php

$message="";

if (isset($_POST['titre']) && isset($_POST['annee']) ) {
    $filmDao = new FilmDAO();

    // Créer un nouvel acteur, role et film avec les données du formulaire
    $film = new Film(null, $_POST['titre'], $_POST['realisateur'], $_POST['affiche'], $_POST['annee']);
    
    // Ajouter le rôle au film en utilisant la méthode addRole() pour chaque personnage de personnage[]
    if (!empty($_POST['personnage'])) {
        foreach ($_POST['personnage'] as $key => $personnage) {
            $acteur = new Acteur(null, $_POST['nom'][$key], $_POST['prenom'][$key]);
            $role = new Role(null, $_POST['personnage'][$key], $acteur);
            // Ajouter le rôle au film
            $film->addRole($role);
        }
    }

    // Appeler la fonction add pour enregistrer le film/acteur(s)/role(s) dans la base de données
    $status = $filmDao->add($film); // Return l'id du film ajouté

    if (is_int($status)) { // Si on recupere l'integer idFilm
        $message = "Film ajouté avec succés";

    } else{ // Sinon on recupere l'exception $e
        $message ="Erreur sur l'ajout du film";
    }
}

//On affiche le template Twig correspondant
echo $twig->render('creation.html.twig',[
    'message' => $message
]);