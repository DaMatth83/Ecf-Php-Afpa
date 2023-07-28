<?php

$message="";
$user=null;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO();
    $user = new Users(null,$_POST['userName'], $_POST['email'], $_POST['password']);
    // vérification de la correspondance des mots de passe.
    if ($_POST['password'] === $_POST['passwordR']) {        
        $status = $usersDao->add($user);
    //redirection pour le parcours utilisateur en cas de succés    
        if (!is_string($status)) {
            header('Location: login');
            } else {
            $message = $status;
            }
    //cas d'erreur        
    }else {
        $message ="Les mots de passes ne correspondent pas";
    }
}

echo $twig->render('signup.html.twig',['message' => $message ]);