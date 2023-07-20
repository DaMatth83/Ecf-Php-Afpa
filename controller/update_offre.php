<?php

$message="";


if (isset($_GET['id'])) {
    $offreDao = new OffresDAO();
    $id = $_GET['id'];
    $offre = $offreDao->getOne($id);
}

if (isset($_POST['id'])) {
    $offreDao = new OffresDAO();
    $offre = new Offres($_POST['id'],$_POST['newTitle'],$_POST['newDesc'] );
    $result = $offreDao->update($offre);

    
    if($result){
        $message = "Modification effectuée avec succès ! ";
    } else{
        $message = "Erreur modification";
    }
}

echo $twig->render('update_offre.html.twig', [
        'message' => $message,
        'offre' => $offre
    ]);
?>