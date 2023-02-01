-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3307
-- Généré le : mer. 01 fév. 2023 à 20:52
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `barbershop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `appointement`
--

CREATE TABLE `appointement` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `ends_at` date NOT NULL,
  `costumer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appointement`
--

INSERT INTO `appointement` (`id`, `created_at`, `ends_at`, `costumer_id`) VALUES
(1, '2023-01-17', '2023-01-25', 1);

-- --------------------------------------------------------

--
-- Structure de la table `costumer`
--

CREATE TABLE `costumer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `unique_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `costumer`
--

INSERT INTO `costumer` (`id`, `first_name`, `last_name`, `phone`, `unique_id`) VALUES
(1, 'anass', 'mongo', '0606060606', 'FGHJKJHGFD'),
(2, 'Oussama', 'Haddi', '0707070707', '');

-- --------------------------------------------------------

--
-- Structure de la table `schedual`
--

CREATE TABLE `schedual` (
  `id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `from` time NOT NULL,
  `to` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `schedual`
--

INSERT INTO `schedual` (`id`, `day_id`, `from`, `to`) VALUES
(1, 1, '09:00:00', '20:00:00'),
(2, 2, '09:00:00', '20:00:00'),
(3, 3, '09:00:00', '20:00:00'),
(4, 4, '09:00:00', '20:00:00'),
(5, 5, '09:00:00', '22:00:00'),
(6, 6, '09:00:00', '20:00:00'),
(7, 7, '09:00:00', '12:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `appointement`
--
ALTER TABLE `appointement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `costumer_id` (`costumer_id`);

--
-- Index pour la table `costumer`
--
ALTER TABLE `costumer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `schedual`
--
ALTER TABLE `schedual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `appointement`
--
ALTER TABLE `appointement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `costumer`
--
ALTER TABLE `costumer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `schedual`
--
ALTER TABLE `schedual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointement`
--
ALTER TABLE `appointement`
  ADD CONSTRAINT `appointement_ibfk_1` FOREIGN KEY (`costumer_id`) REFERENCES `costumer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
