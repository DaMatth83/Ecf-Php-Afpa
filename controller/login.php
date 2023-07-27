<?php

$message="";

if (isset($_POST['email']) && isset($_POST['pw'])) {
    $usersDao = new UsersDAO();
    $email = $_POST['email'];
    $password = $_POST['pw'];
    $logUser = new Users(null,null, $email, $password); 
    $user = $usersDao->login($logUser);
    if (gettype($user)=='object') {
        $userName = $user->getUserName();
        $_SESSION['user'] = $userName;
        header('Location: film');
    } else {
        $message = "E-mail ou mot de passe incorrects";
    }

}

echo $twig->render('login.html.twig', [
    'message' => $message
]);
?>