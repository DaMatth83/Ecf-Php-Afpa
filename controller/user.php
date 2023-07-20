<?php

$message="";
$user=null;

if (isset($_POST['email']) && isset($_POST['pw'])) {
    $usersDao = new UsersDAO();
    $user = new Users(null, $_POST['email'], $_POST['pw']);
    $status = $usersDao->add($user);

    if ($status) {
        $message =  "Utilisateur créé avec succés !";
    } else {
        $message = "Erreur création utilisateur";
    }
}

echo $twig->render('users.html.twig', [
    'message' => $message,
    'user' => $user
]);
?>