<?php

$message="";

if (isset($_POST['login']) && isset($_POST['pw'])) {
    $usersDao = new UsersDAO();
    $email = $_POST['login'];
    $password = $_POST['pw'];
    $user = $usersDao->verify(new Users(null, $email, $password));
    
    if (gettype($user)=='object') {
        // var_dump($email);
        $_SESSION['user'] = $email;
        $message =  "Connexion réussie";
    } else {
        $message = "Erreur connexion";
    }

}

echo $twig->render('login.html.twig', [
    'message' => $message
]);
?>