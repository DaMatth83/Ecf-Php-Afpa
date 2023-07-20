<?php

$message="";


if (isset($_GET['id'])) {
    $offreDao = new OffresDAO();
    $id = $_GET['id'];
    $delete = $offreDao->delete($id);
    
    if($delete){
        $message = "Suppression OK";
    } else{
        $message = "Erreur suppression";
    }
}

echo $twig->render('delete_offre.html.twig', [
        'message' => $message
    ]);
?>