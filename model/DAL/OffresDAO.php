<?php

class OffresDAO extends Dao
{

    //Récupérer toutes les offres
    public function getAll()
    {

        $query = $this->BDD->prepare("SELECT id, title, description FROM offers");
        $query->execute();
        $offers = array();

        while ($data = $query->fetch()) {
            $offers[] = new Offres($data['id'], $data['title'], $data['description']);
        }
        return ($offers);
    }

    //Ajouter une offre
    public function add($data)
    {

        $valeurs = ['title' => $data->getTitle(), 'description' => $data->getDescription()];
        $requete = 'INSERT INTO offers (title, description) VALUES (:title , :description)';
        $insert = $this->BDD->prepare($requete);
        if (!$insert->execute($valeurs)) {
            return false;
        } else {
            return true;
        }
    }

    //Récupérer plus d'info sur 1 offre
    public function getOne($id)
    {

        $query = $this->BDD->prepare('SELECT * FROM offers WHERE offers.id = :id_offer');
        $query->execute(array(':id_offer' => $id));
        $data = $query->fetch();
        $offer = new Offres($data['id'], $data['title'], $data['description']);
        return ($offer);
    }

    public function delete($id)
    {
        $query = $this->BDD->prepare('DELETE FROM offers WHERE id = :id');
        $query->execute(array(':id' => $id));
    
        // Vérifier si la suppression a été effectuée
        if ($query->rowCount() > 0) {
            return true; // Suppression réussie
        } else {
            return false; // Échec de la suppression
        }
    }

    public function update($data){
        $query = $this->BDD->prepare('UPDATE offers SET title = :newTitle, description = :newDesc WHERE id = :id');
        // $query->bindParam(':newTitle', $data->getTitle());
        // $query->bindParam(':newDesc', $data->getDescription());
        // $query->bindParam(':id', $data->getId());
        $query->execute(array(':newTitle'=> $data->getTitle(), ':newDesc'=> $data->getDescription(), ':id'=> $data->getId() ));
        if ($query->rowCount() > 0) {
            return true;
    } else {
        return false;
    }
}  
}
