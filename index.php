<?php

// Initialisation de l'environnement
require './config/config.init.php';

require _CTRL_ . 'header.php';

// Gestion de Routing
if (isset($_GET['action']) && file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    require _CTRL_ . $_GET['action'] . '.php';
} elseif (isset($_GET['action']) && !file_exists(_CTRL_ . $_GET['action'] . '.php')) {
    require _CTRL_ . 'erreur.php';
} else {
    require _CTRL_ . 'offres.php';
}

<<<<<<< HEAD
require _CTRL_ . 'footer.php';
=======
require _CTRL_ . 'footer.php';
>>>>>>> 14678f2057fc316b79f1fd8cb9ab1d026513bcfc
