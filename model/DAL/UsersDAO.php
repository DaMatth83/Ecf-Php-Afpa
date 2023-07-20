<?php

class UsersDAO extends Dao{

    public function getAll(){
        $query = $this->BDD->prepare("SELECT id, email, password FROM users");
        $query->execute();
        $users = array();

        while ($data = $query->fetch()) {
            $users[] = new Users($data['id'], $data['email'], $data['password']);
        }
        return ($users);
    }

    public function add($data)
    {
        $email = $data->getEmail();
        $password = $data->getPw();

        $hashedPw = password_hash($password, PASSWORD_DEFAULT);

        $valeurs = ['email' => $email, 'password' => $hashedPw];
        $requete = 'INSERT INTO users (email, password) VALUES (:email , :password)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }

    public function getOne($id){
        $query = $this->BDD->prepare('SELECT * FROM users WHERE users.id = :id_user');
        $query->execute(array(':id_user' => $id));
        $data = $query->fetch();
        $user = new Users($data['id'], $data['email'], $data['password']);
        return ($user);
    }

    public function delete($id){
        $query = $this->BDD->prepare('DELETE FROM users WHERE id = :id');
        $query->execute(array(':id' => $id));
    
        // Vérifier si la suppression a été effectuée
        if ($query->rowCount() > 0) {
            return true; // Suppression réussie
        } else {
            return false; // Échec de la suppression
        }
    }

    public function verify($data)
{
    $query = $this->BDD->prepare('SELECT * FROM users WHERE email = :email');
    $query->execute(array(':email' => $data->getEmail()));
    $user = $query->fetch();

    if ($data && password_verify($data->getPw(), $user['password'])) {
        // // L'utilisateur existe et les mots de passe correspondent
        $user = new Users($user['id'], $user['email'], $user['password']);
        return $user;
    } else {
        // L'utilisateur n'existe pas ou les mots de passe ne correspondent pas
        return false;
    }
}

public function update($data){
    $hashedPw = password_hash($data->getPw(), PASSWORD_DEFAULT);
    $query = $this->BDD->prepare('UPDATE users SET password = :newPw WHERE id = :id');
    $query->execute(array(':newPw' => $hashedPw, ':id' => $data->getId()));
    if ($query->rowCount() > 0) {
        return true;
} else {
    return false;
}
}
}

?>