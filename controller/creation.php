<?php

$message="";

if (isset($_POST['titre']) && isset($_POST['annee']) ) {
    $filmDao = new FilmDAO();

    // Créer un nouvel acteur, role et film avec les données du formulaire
    $acteur = new Acteur(null, $_POST['nom'], $_POST['prenom']);

    $role = new Role(null, $_POST['personnage'], $acteur);

    $film = new Film(null, $_POST['titre'], $_POST['realisateur'], $_POST['affiche'], $_POST['annee'], $role);
    
    // Ajouter le rôle au film en utilisant la méthode addRole()
    $film->addRole($role);


// Si les input 2 et 3 sont rempli créé les nouveaux acteurs / roles
    if (!empty($_POST['personnage2']) && !empty($_POST['nom2']) && !empty($_POST['prenom2'])) {
       $acteur2 = new Acteur(null, $_POST['nom2'], $_POST['prenom2']);
       $role2 = new Role(null, $_POST['personnage2'], $acteur2);
       $film->addRole($role2);
    }

    if (!empty($_POST['personnage3']) && !empty($_POST['nom3']) && !empty($_POST['prenom3'])) {
        $acteur3 = new Acteur(null, $_POST['nom3'], $_POST['prenom3']);
        $role3 = new Role(null, $_POST['personnage3'], $acteur3);
        $film->addRole($role3);
     }

    // Appeler la fonction add pour enregistrer le film/acteur(s)/role(s) dans la base de données
    $status = $filmDao->add($film); // Return l'id du film ajouté


    if ($status) {
        $message = "Film ajouté avec succés";
    } else{
        $message ="Erreur sur l'ajout du film";
    }
}


//On affiche le template Twig correspondant
echo $twig->render('creation.html.twig',[
    'message' => $message
]);