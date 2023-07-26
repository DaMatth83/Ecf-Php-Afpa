

# Jeu de tests

| Fonctionnalité      | Test effectué   | Résultat attendu   | Résultat Ok |
|---------------------|-----------------|--------------------|-------------|
| getAll()            | $film = $filmDao->getAll();         | Recupérer tout les films | Oui         |
| getOne()           | var_dump($filmDao->getOne(1));         | Recuperer objet Film avec idFilm 1 | Oui         |
| delete()          | $delete = $filmDao->delete($id);          | Supprimer le film correspondant | Oui         |
| add()           | $status = $filmDao->add($film);         | Ajouter le film créé | Oui         |
| addRole()           | $film->addRole($role);         | Ajouter l'objet Role dans l'objet Film | Oui        |
| add()           | input d'un film déja connu          | Message erreur | Oui         |
| Duplicate Key           | Création d'un film avec un acteur déja connu         | Garder l'idActeur et lui associé un role et un film | Oui         |
| lastInsertId()          | Recuperer le dernier id auto incrémenté par la bdd         | Recuperer l'id aprés l'auto incrémentation | Oui         |
| Bouton ajouter un role en JS     | Ajouter plusieurs roles au click du bouton | Ajout d'une div avec les inputs necessaire | Oui        |
| Bouton supprimer un role en JS          | Supprimer la div qui vient d'étre créée avec le bouton Ajouter un role         | Suppression de la div au click | Oui         |
|                     |                 |                    |             |

