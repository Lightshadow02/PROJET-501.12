-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 oct. 2023 à 07:11
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae501_privee`
--

-- --------------------------------------------------------

--
-- Structure de la table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `proprietaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `badges`
--

INSERT INTO `badges` (`id`, `numero`, `proprietaire`) VALUES
(1, 23, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `materiel` int(11) NOT NULL,
  `salle` int(11) NOT NULL,
  `personnel` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `personnels`
--

CREATE TABLE `personnels` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `service` text NOT NULL,
  `role` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personnels`
--

INSERT INTO `personnels` (`id`, `nom`, `prenom`, `service`, `role`, `password`) VALUES
(5, 'test', 'test', '7	\Z\ZGT5', ' \Z[\Z\Z', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1'),
(6, 'Tend', 'Jend', '	\nG;D', '5 @,:', 'd74ff0ee8da3b9806b18c877dbf29bbde50b5bd8e4dad7a3a725000feb82e8f1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personnel` (`personnel`),
  ADD KEY `patient` (`patient`),
  ADD KEY `materiel` (`materiel`),
  ADD KEY `salle` (`salle`);

--
-- Index pour la table `personnels`
--
ALTER TABLE `personnels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `personnels`
--
ALTER TABLE `personnels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `operations`
--
ALTER TABLE `operations`
  ADD CONSTRAINT `materiel` FOREIGN KEY (`materiel`) REFERENCES `sae501_public`.`materiels` (`id`),
  ADD CONSTRAINT `patient` FOREIGN KEY (`patient`) REFERENCES `sae501_public`.`patients` (`id`),
  ADD CONSTRAINT `personnel` FOREIGN KEY (`personnel`) REFERENCES `personnels` (`id`),
  ADD CONSTRAINT `salle` FOREIGN KEY (`salle`) REFERENCES `sae501_public`.`salles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
