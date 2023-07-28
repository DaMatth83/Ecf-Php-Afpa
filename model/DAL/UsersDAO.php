<?php

class UsersDAO extends Dao{

    public function getAllUsers(){
        $query = $this->BDD->prepare("SELECT idUser,userName, email, password FROM users");
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new Users($data['idUser'],$data['userName'], $data['email'], $data['password']);
        }
        return ($users);
    }
    public function getAll($search){}
    public function add($data)
    {
        //fonction pour créer un utilisateur avec quelques verificateurs de champs
        $idUser = $data->getIdUser();
        $userName = $data->getUserName();
        $email = $data->getEmail();
        $password = $data->getPassword();
        //verification du champ username via une expression régulière
        if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
            return "Erreur création de l'utilisateur : Le nom d'utilisateur ne doit contenir que des lettres et des chiffres.";
            exit;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return "Erreur création de l'utilisateur : Adresse e-mail invalide.";
            exit;
        }
        //verification que le mot de passe soit plus long que 6 caractères
        if (strlen($password) <6) {
            return "Erreur création de l'utilisateur : Le mot de passe doit contenir au moins 6 caractères.";
            exit;
        } 
        //hachage du password
        $hashedPw = password_hash($password, PASSWORD_DEFAULT);

        $valeurs = ['idUser'=> $idUser, 'userName' => $userName, 'email' => $email, 'password' => $hashedPw];
        $requete = 'INSERT INTO users (idUser,userName, email, password) VALUES (:idUser, :userName, :email , :password)';
        $insert = $this->BDD->prepare($requete);
        //try and catch pour le cas d'erreur d'une exception de duplication d'email
        try {
            $insert->execute($valeurs);
            return true;
        } catch (PDOException $e) {
        $errorMessage = "Erreur création de l'utilisateur : E-mail déjà existant";
        return $errorMessage;
        // echo $errorMessage;

        }
    }

    

    public function getOne($id){
        $query = $this->BDD->prepare('SELECT * FROM users WHERE users.idUser = :id_user');
        $query->execute(array(':id_user' => $id));
        $data = $query->fetch();
        $user = new Users($data['idUser'],$data['userName'], $data['email'], $data['password']);
        return ($user);
    }

    public function delete($id){
        // $query = $this->BDD->prepare('DELETE FROM users WHERE id = :id');
        // $query->execute(array(':id' => $id));
    
        // // Vérifier si la suppression a été effectuée
        // if ($query->rowCount() > 0) {
        //     return true; // Suppression réussie
        // } else {
        //     return false; // Échec de la suppression
        // }
    }

    public function login($data)
{
    $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute(array(':email' => $data->getEmail()));
    $user = $query->fetch();

    if ($user && password_verify($data->getPassword(), $user['password'])) {
        // // L'utilisateur existe et les mots de passe correspondent
        // creation d'un objet user unique pour l'utiliser après (notament username en accueil)
        $user = new Users($user['idUser'],$user['userName'], $user['email'], $user['password']);
        return $user;
    } else {
        // L'utilisateur n'existe pas ou les mots de passe ne correspondent pas
        return false;
    }
}


}

?>