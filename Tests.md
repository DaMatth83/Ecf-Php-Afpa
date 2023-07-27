# Jeu de tests

| Fonctionnalité      | Test effectué                               | Résultat attendu                                  | Résultat Ok |
|---------------------|---------------------------------------------|---------------------------------------------------|-------------|
| getAll()            | $film = $filmDao->getAll();                 | Récupérer tous les films                         | Oui         |
| getOne()            | var_dump($filmDao->getOne(1));             | Récupérer l'objet Film avec l'idFilm 1           | Oui         |
| delete()            | $delete = $filmDao->delete($id);            | Supprimer le film correspondant                  | Oui         |
| add()               | $status = $filmDao->add($film);             | Ajouter le film créé                             | Oui         |
| addRole()           | $film->addRole($role);                      | Ajouter l'objet Role dans l'objet Film           | Oui         |
| add()               | input d'un film déjà connu                  | Message d'erreur                                 | Oui         |
| Duplicate Key       | Création d'un film avec un acteur déjà connu | Garder l'idActeur et lui associer un rôle et un film | Oui       |
| lastInsertId()      | Récupérer le dernier id auto incrémenté      | Récupérer l'id après l'auto-incrémentation       | Oui         |
| Bouton ajouter un role en JS | Ajouter plusieurs rôles au clic du bouton  | Ajout d'une div avec les inputs nécessaires      | Oui         |
| Bouton supprimer un role en JS | Supprimer la div créée avec le bouton "Ajouter un role" | Suppression de la div au clic              | Oui         |
| Ajout d'une recherche | Recherche avec une lettre, plusieurs ou un mot complet | Affichage restreint du carrousel aux résultats de recherche + nombre de films correspondant + affichage de la chaîne de recherche | Oui |
| Modification du getall() pour prendre en compte le search | Requête multiple pour trouver un film via "LIKE" en SQL | Récupérer les films correspondant à la recherche dans la base de données | Oui |
| add() du user       | Test du username                            | Message d'erreur en cas de non respect de l'expression régulière | Message d'erreur du champ | Oui |
|                     | Test de la validité du password             | Message d'erreur si le mot de passe contient moins de 6 caractères | Oui |
|                     | Test email valide                           | Le formulaire bloque les emails non valides      | Pop-up d'erreur | Oui |
|                     | Mise en erreur duplication email            | Message d'erreur "E-mail déjà existant"          | Oui |
| login($data)        | Correspondance email/mot de passe           | Message d'erreur en cas de non correspondance avec la BDD | Oui |
