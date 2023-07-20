<?php

class FilmDAO extends Dao
{

    //Récupérer tous les films
    public function getAll()
    {

        $query = $this->BDD->prepare("SELECT idFilm, titre, realisateur, affiche, annee FROM films");
        $query->execute();
        $films = array();

        while ($data = $query->fetch()) {
            $films[] = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        }
        return ($films);
    }

    //Ajouter un film
    public function add($data)
    {

        $valeurs = ['idFilm' => $data->getId(),'title' => $data->getTitle(), 'realisateur' => $data->getRealisateur(), 'affiche' => $data->getAffiche(), 'annee' => $data->getAnnee()];
        $requete = 'INSERT INTO films (idFilm, title, realisateur, affiche, annee) VALUES (:idFilm , :title, :realisateur, :affiche, :annee)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 film
    public function getOne($id)
    {

        $query = $this->BDD->prepare('SELECT * FROM films WHERE films.id = :id_film');
        $query->execute(array(':id_film' => $id));
        $data = $query->fetch();
        $film = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        return ($film);
    }

    // public function delete($id)
    // {
    //     $query = $this->BDD->prepare('DELETE FROM offers WHERE id = :id');
    //     $query->execute(array(':id' => $id));
    
    //     // Vérifier si la suppression a été effectuée
    //     if ($query->rowCount() > 0) {
    //         return true; // Suppression réussie
    //     } else {
    //         return false; // Échec de la suppression
    //     }
    // }

//     public function update($data){
//         $query = $this->BDD->prepare('UPDATE offers SET title = :newTitle, description = :newDesc WHERE id = :id');
//         // $query->bindParam(':newTitle', $data->getTitle());
//         // $query->bindParam(':newDesc', $data->getDescription());
//         // $query->bindParam(':id', $data->getId());
//         $query->execute(array(':newTitle'=> $data->getTitle(), ':newDesc'=> $data->getDescription(), ':id'=> $data->getId() ));
//         if ($query->rowCount() > 0) {
//             return true;
//     } else {
//         return false;
//     }
// }  
}

