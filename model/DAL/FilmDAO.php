<?php

class FilmDAO extends Dao
{

    public function getAll()
    {
        $query = $this->BDD->prepare("SELECT f.idFilm, f.titre, f.realisateur, f.affiche, f.annee, r.personnage, a.nom AS acteur_nom, a.prenom AS acteur_prenom
                                     FROM films f
                                     INNER JOIN roles r ON f.idFilm = r.idFilm
                                     INNER JOIN acteurs a ON r.idActeur = a.idActeur
                                     ORDER BY f.idFilm");
        $query->execute();
        $films = array();

        while ($data = $query->fetch()) {
            $idFilm = $data['idFilm'];
            if (!isset($films[$idFilm])) {
                $films[$idFilm] = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['personnage']);
            }

            if ($data['personnage'] != null) {
                $acteur = new Acteur($data['acteur_nom'], $data['acteur_prenom']);
                $role = new Role($data['personnage'], $acteur);
                $films[$idFilm]->addRole($role);
            }
        }
        return array_values($films);
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

    // public function getActorRole{
    //     $query = $this->BDD->prepare('SELECT * FROM films WHERE films.id = :id_film');
    // }
}

