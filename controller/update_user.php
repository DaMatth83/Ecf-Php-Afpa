<?php
$message="";
if (isset($_POST['pw'])) {
    $usersDao = new UsersDAO();
    $email = $_SESSION['user'];
    $pw = $_POST['pw'];
    $newPw = $_POST['newPw'];
    $user = $usersDao->verify(new Users(null, $email, $pw));


    if (gettype($user)=='object') {
        $user->setPw($newPw);
        $result = $usersDao->update($user);
        if ($result) {
            $message = "Mot de passe changé avec succés !";
        } else{
            $message = "L'ancien mot de passe n'est pas correct !";
    }
}}



echo $twig->render('update_user.html.twig',[
    'message' => $message
]);
?>