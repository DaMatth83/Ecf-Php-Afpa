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
?>
