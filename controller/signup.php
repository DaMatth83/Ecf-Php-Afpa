<?php

$message="";
$user=null;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $usersDao = new UsersDAO();
    $user = new Users(null,$_POST['userName'], $_POST['email'], $_POST['password']);
    if ($_POST['password'] === $_POST['passwordR']) {        
        $status = $usersDao->add($user);
        if (!is_string($status)) {
            header('Location: login');
            } else {
            $message = $status;
            }
    }else {
        $message ="Les mots de passes ne correspondent pas";
    }
}

echo $twig->render('signup.html.twig',['message' => $message ]);