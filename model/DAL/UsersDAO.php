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
    public function getAll($search){
    }
    public function add($data)
    {
        $idUser = $data->getIdUser();
        $userName = $data->getUserName();
        $email = $data->getEmail();
        $password = $data->getPassword();

        if(!preg_match("/^[a-zA-Z0-9]*$/", $userName)){
            return false;
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return false;
        }
        if (strlen($password) <6) {
            return false;
        } 

        $hashedPw = password_hash($password, PASSWORD_DEFAULT);

        $valeurs = ['idUser'=> $idUser, 'userName' => $userName, 'email' => $email, 'password' => $hashedPw];
        $requete = 'INSERT INTO users (idUser,userName, email, password) VALUES (:idUser, :userName, :email , :password)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
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
        $user = new Users($user['idUser'],$user['userName'], $user['email'], $user['password']);
        return $user;
    } else {
        // L'utilisateur n'existe pas ou les mots de passe ne correspondent pas
        return false;
    }
}


}

?>