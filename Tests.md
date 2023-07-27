

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
|Ajout d'une recherche                     | recherche avec une lettre, plusieur ou un mot complet                | retour du carroussel restrein à la recherche + nombre de film correspondant a la rechercher + et retour de la chaine de recherche                  |  OK           |
| Modification du getall() pour prendre en compte le search                    | requete multiple pour trouver un film via avec le like de sql                | retour des films en correspondance a la bdd et recherche                    | ok            |
| add() du user               |  test du username               | message d'erreur en cas de non respect de l'expression régulière                   |  Message d'erreur du champ           |ok|
|   ---                  | test de la validitée du password| message d'erreur en cas d e mot de passe inférieur à 6 caractères                   | ok            |
|  ---                   | test email valide                | le formulaire bloc les emails non valide                    | pop up erreur            |ok
|  ---                   |  mise en erreur duplication email               | message d'erreur E-mail déjà existant                   | ok            |
| login($data)                    | correspondance email mot de passe                |    message d'erreur en cas de non correspondance par rapport a la bdd                |  ok           |
|                     |                 |                    |             |

