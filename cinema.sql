-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 19 juil. 2023 à 17:12
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `idActeur` int(10) UNSIGNED NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`idActeur`, `nom`, `prenom`) VALUES
(1, 'Allen', 'Alfie'),
(2, 'Brando', 'Marlon'),
(3, 'Brasseur', 'Claude'),
(32, 'Cotillar', 'Marion '),
(28, 'Crowe', 'Russell'),
(15, 'De Funes', 'Louis'),
(4, 'De Niro', 'Robert'),
(31, 'DiCaprio', 'Leonardo Wilhelm '),
(5, 'Fishburne', 'Laurence'),
(6, 'Keaton', 'Diane'),
(7, 'L. Jackson', 'Samuel'),
(34, 'Leonardo', 'Di Caprio'),
(33, 'Marion ', 'Cotillard'),
(8, 'Moss', 'Carrie-Anne'),
(30, 'Nielsen', 'Connie '),
(9, 'Pacino', 'Al'),
(10, 'Ratinier', 'Claude'),
(29, 'Reed', 'Oliver'),
(11, 'Reeves', 'Keanu'),
(12, 'Rich', 'Claude'),
(13, 'Thurman', 'Uma'),
(14, 'Travolta', 'John'),
(43, 'Washington', 'John David ');

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `idFilm` int(10) UNSIGNED NOT NULL,
  `titre` varchar(25) DEFAULT NULL,
  `realisateur` varchar(25) DEFAULT NULL,
  `affiche` varchar(100) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idFilm`, `titre`, `realisateur`, `affiche`, `annee`) VALUES
(1, 'Matrix', 'Les Wachowski', 'http://fr.web.img6.acsta.net/r_1920_1080/medias/04/34/49/043449_af.jpg', 1999),
(2, 'La soupe aux choux', 'Jean Girault', 'http://fr.web.img6.acsta.net/r_1280_720/medias/nmedia/18/36/11/21/18478117.jpg', 1981),
(3, 'John Wick', 'David Leitch', 'http://fr.web.img4.acsta.net/pictures/14/10/08/11/49/255061.jpg', 2014),
(4, 'Le Parrain', 'Francis Ford Coppola', 'http://fr.web.img4.acsta.net/medias/nmedia/18/35/57/73/18660716.jpg', 1972),
(5, 'Le souper', 'Edouard Molinaro', 'http://www.cinemapassion.com/lesaffiches/Le-Souper-affiche-12388.jpg', 1992),
(6, 'Pulp Fiction', 'Quentin Tarantino', 'http://fr.web.img4.acsta.net/r_1920_1080/medias/nmedia/18/36/02/52/18686501.jpg', 1994),
(7, 'Le Parrain, 2eme Partie', 'Francis Ford Coppola', 'http://images.fan-de-cinema.com/affiches/large/79/37071.jpg', 1974),
(22, 'Gladiator', 'Ridley Scott', 'http://fr.web.img6.acsta.net/r_1920_1080/medias/nmedia/18/68/64/41/19254510.jpg', 2000),
(25, 'Inception', 'Christopher Nolan', 'https://media.senscritique.com/media/000004710747/source_big/Inception.jpg', 2010),
(40, 'Tenet', 'Christopher Nolan', 'https://fr.web.img2.acsta.net/pictures/20/08/03/12/15/2118693.jpg', 2020);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `idActeur` int(10) UNSIGNED NOT NULL,
  `idFilm` int(10) UNSIGNED NOT NULL,
  `personnage` varchar(25) DEFAULT NULL,
  `idRole` int(11) NOT NULL,
  `test` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`idActeur`, `idFilm`, `personnage`, `idRole`, `test`) VALUES
(11, 1, 'Neo', 17, 0),
(11, 3, 'John Wick', 18, 0),
(5, 1, 'Morpheus', 19, 0),
(15, 2, 'Le Glaude', 20, 0),
(4, 4, 'Vito Corleone', 21, 0),
(9, 4, 'Mickael Corleone', 22, 0),
(9, 7, 'Mickael Corleone', 23, 0),
(6, 3, 'Iosef Tarasov', 24, 0),
(8, 1, 'Trinity ', 25, 0),
(3, 5, 'Joseph Fouché', 26, 0),
(12, 5, 'Talleyrand', 27, 0),
(14, 6, 'Vincent Vega', 28, 0),
(7, 6, 'Jules Winnfield', 29, 0),
(13, 6, 'Mia Wallace', 30, 0),
(6, 7, 'Kay Adams-Corleone', 31, 0),
(2, 4, 'Vito Corleone', 32, 0),
(28, 22, 'Maximus', 35, 0),
(29, 22, 'Proximo', 36, 0),
(30, 22, 'Lucilla', 37, 0),
(33, 25, 'Mall', 40, 0),
(34, 25, 'Dom Cobb', 41, 0),
(43, 40, 'Le protagoniste', 51, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUser`, `userName`, `email`, `password`) VALUES
(4, 'Vince', 'a@a.fr', '$2y$12$bqgOxNXP.Tu/JOV79ymQe.SeOjjX1q6fj7DPkR0E31WyfxEBFqb2C'),
(9, 'admin', 'b@b.fr', '$2y$12$janBltiHAORKvAqtmU3m2.C1eGHemFGdky77DicRTpQBns9FrM2P2'),
(12, 'titi', 'x@x.fr', '$2y$12$ZTw5sv5BM/sN4476WSNwAONckZrwCzDmzm1EGQuknC26le3AZyzyy'),
(14, 'toto', 'toto@a.fr', '$2y$12$Eia93jE1GCObWAQGTVAj5ufu35Xq9hk2AZtvks0WBo1WiFsbvTDxO');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`idActeur`),
  ADD UNIQUE KEY `acteur` (`nom`,`prenom`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idFilm`),
  ADD UNIQUE KEY `U_titre` (`titre`,`realisateur`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRole`),
  ADD KEY `fk_film_idx` (`idFilm`),
  ADD KEY `fk_acteur_idx` (`idActeur`),
  ADD KEY `unique` (`idActeur`,`idFilm`,`personnage`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `U_email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `idActeur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `idFilm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_acteur` FOREIGN KEY (`idActeur`) REFERENCES `acteurs` (`idActeur`),
  ADD CONSTRAINT `fk_film` FOREIGN KEY (`idFilm`) REFERENCES `films` (`idFilm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
