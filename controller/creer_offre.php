<?php

$message="";
$messageTitre =null;
$messageDesc =null;
$offre=null;

if (isset($_POST['titre']) && isset($_POST['desc'])) {
    $offresDao = new OffresDAO();
    $offre = new Offres(null, $_POST['titre'], $_POST['desc']);
    $status = $offresDao->add($offre);

    if ($status) {
        $message =  "Offre ajoutée avec succés !";
        $messageTitre = "Titre de l'annonce : " . $_POST['titre'];
        $messageDesc = "Description de l'annonce : " . $_POST['desc'];
    } else {
        $message = "Erreur Ajout";
    }

}

echo $twig->render('creer_offre.html.twig', [
    'message' => $message,
    'messageTitre' => $messageTitre,
    'messageDesc' => $messageDesc,
    'offre' => $offre
]);
<<<<<<< HEAD
?>
=======
?>
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
