<?php

class FilmDAO extends Dao
{

    public function getAll($search)
    {
        $sql = "SELECT f.idFilm, f.titre, f.realisateur, f.affiche, f.annee, r.personnage, a.nom AS acteur_nom, a.prenom AS acteur_prenom, a.idActeur, r.idRole
                FROM films f
                INNER JOIN roles r ON f.idFilm = r.idFilm
                INNER JOIN acteurs a ON r.idActeur = a.idActeur";

        if (!empty($search)) {
            $sql .= " WHERE LOWER(titre) LIKE :search";
        }

        $sql .= " ORDER BY f.idFilm";

        $query = $this->BDD->prepare($sql);

        if (!empty($search)) {
            $query->bindValue(':search', "%{$search}%");
        }

        $query->execute();
        $films = array();

        while ($data = $query->fetch()) {
            $idFilm = $data['idFilm'];
            if (!isset($films[$idFilm])) {
                $films[$idFilm] = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee'], $data['personnage']);
            }

            if ($data['personnage'] != null) {
                $acteur = new Acteur($data['idActeur'], $data['acteur_nom'], $data['acteur_prenom']);
                $role = new Role($data['idRole'],$data['personnage'], $acteur);
                $films[$idFilm]->addRole($role);
            }
        }

        return array_values($films);
    }
    

    public function add($data)
    {
        // Fonction pour ajouter un film avec acteur et role associés
        // Stocker toutes les valeurs necessaires pour ajouter le film dans la BDD
        $valeurs = [
            'idFilm' => $data->getId(),
            'titre' => $data->getTitle(),
            'realisateur' => $data->getRealisateur(),
            'affiche' => $data->getAffiche(),
            'annee' => $data->getAnnee()
        ];
    
        // Requete pour ajouter un film
        $requete = 'INSERT INTO films (idFilm, titre, realisateur, affiche, annee) VALUES (:idFilm, :titre, :realisateur, :affiche, :annee)';
        $insert = $this->BDD->prepare($requete);
        
        try {
            // Exécute la requête pour insérer le film, s'il ya erreur on return false et ne fait pas la suite
            if (!$insert->execute($valeurs)) {
                return false;
            }

            //Methode ajouté dans SPDO pour récuperer le dernier ID ajouté
            $idFilm = SPDO::getInstance()->getPDO()->lastInsertId();
            
            // Ajoute les acteurs associés aux rôles dans la table "acteurs" et les rôles dans la table "roles"
            $roles = $data->getRoles(); // Récupérer l'objet Role de chaque film
            if (!empty($roles)) {
                foreach ($roles as $role) {
                    $acteur = $role->getActeur(); // Récupérer l'objet Acteur de chaque Role
                    $valeursActeur = [
                        'nom' => $acteur->getNom(),
                        'prenom' => $acteur->getPrenom()
                    ]; // Stocker les variables necessaires pour ajouter un acteur
        
                    // Exécute la requête pour insérer l'acteur ou le mettre à jour s'il existe déjà
                    $requeteActeur = 'INSERT INTO acteurs (nom, prenom) 
                                      VALUES (:nom, :prenom)
                                      ON DUPLICATE KEY UPDATE idActeur = LAST_INSERT_ID(idActeur)';
                                // Fonctionnalité SQL pour vérifier si le nom et prenom acteur existe déja
                                // Si l'acteur existe on conserve son idActeur sinon on en créé un

                    $insertActeur = $this->BDD->prepare($requeteActeur);
                    // Exécute la requête pour insérer l'acteur, s'il ya erreur on return false et ne fait pas la suite
                    if (!$insertActeur->execute($valeursActeur)) {
                        return false;
                    }

                    // Récupérer le dernier ID créé ou récupéré, ici celui de l'acteur
                    $nouvelIdActeur = SPDO::getInstance()->getPDO()->lastInsertId();
        
                    // Insère le rôle dans la table "roles" en utilisant l'idActeur existant
                    $valeursRole = [
                        'idActeur' => $nouvelIdActeur,
                        'idFilm' => $idFilm,
                        'personnage' => $role->getPersonnage(),
                        'idRole' => $role->getIdRole(),
                        'test' => '0'
                    ];
    
                    // Exécute la requête pour insérer le rôle
                    $requeteRole = 'INSERT INTO roles (idActeur, idFilm, personnage, idRole, test) VALUES (:idActeur, :idFilm, :personnage, :idRole, :test)';
                    $insertRole = $this->BDD->prepare($requeteRole);
                    if (!$insertRole->execute($valeursRole)) {
                        return false;
                    }
                }
            }
    
            return intval($idFilm); // Return l'idFilm convertit en integer
        } catch (PDOException $e) {
            return $e;
        }
    }


    //Récupérer plus d'info sur 1 film
    public function getOne($id)
    {
        $query = $this->BDD->prepare('SELECT * FROM films WHERE films.idFilm = :id_film');
        $query->execute(array(':id_film' => $id));
        $data = $query->fetch();
        $film = new Film($data['idFilm'], $data['titre'], $data['realisateur'], $data['affiche'], $data['annee']);
        return ($film);
    }
    public function delete($id){

        $queryRole = $this->BDD->prepare('DELETE FROM roles WHERE idFilm = :id');
        $queryRole->execute(array(':id' => $id));
        $query = $this->BDD->prepare('DELETE FROM films WHERE idFilm = :id');
        $query->execute(array(':id' => $id));
    
        // Vérifier si la suppression a été effectuée
        if ($query->rowCount() > 0) {
            return true; // Suppression réussie
        } else {
            return false; // Échec de la suppression
        }

    }

}

