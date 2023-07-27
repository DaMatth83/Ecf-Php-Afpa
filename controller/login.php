<?php

$message="";

if (isset($_POST['email']) && isset($_POST['pw'])) {
    $usersDao = new UsersDAO();
    $email = $_POST['email'];
    $password = $_POST['pw'];
    $user = $usersDao->login(new Users(null,null, $email, $password));
    
    if (gettype($user)=='object') {
        $userName = $user->getUserName();
        $_SESSION['user'] = $userName;
        header('Location: film');
    } else {
        $message = "Erreur connexion";
    }

}

echo $twig->render('login.html.twig', [
    'message' => $message
]);
?>