-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  sam. 11 avr. 2020 à 21:00
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wikicomp`
--
CREATE DATABASE IF NOT EXISTS `wikicomp20` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wikicomp20`;

-- --------------------------------------------------------
-- LA table de préselection 
---------------------------------------------------------- 
DROP TABLE IF EXISTS `prsl`;
CREATE TABLE IF NOT EXISTS `prsl` (
  `id_prsl` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `competencess` varchar(255) NOT NULL,
  `laboratoire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_prsl`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
--
-- Structure de la table `chercheur`
--

DROP TABLE IF EXISTS `chercheur`;
CREATE TABLE IF NOT EXISTS `chercheur` (
  `id_chercheur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `laboratoire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_chercheur`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chercheur`
--

INSERT INTO `chercheur` (`id_chercheur`, `nom`, `prenom`, `laboratoire`) VALUES
(20, 'Monvoisin', 'Gaëtan', 'UEVE'),
(21, 'Ombredane', 'Mezian', 'UEVE'),
(22, 'De roeck', 'Maxence', 'UEVE'),
(23, 'Akim', 'Féchier', 'Saclay'),
(24, 'Posteur', 'Alain', 'Saclay'),
(25, 'Chaud', 'Artie', 'Saclay'),
(26, 'Aire', 'Axel', 'UEVE'),
(27, 'Hinard', 'Bob', 'Saclay'),
(28, 'Beauquais', 'Bill', 'Saclay'),
(29, 'Zébute', 'Belle', 'Saclay'),
(30, 'Mini', 'Caty', 'UEVE'),
(31, 'Hyène', 'César', 'Saclay'),
(32, 'Lamesse', 'Chantal', 'UEVE'),
(33, 'Meuble', 'Daisy', 'Saclay'),
(34, 'Barre', 'Denis', 'Saclay'),
(35, 'Zore', 'Denis', 'Saclay'),
(36, 'Hinault', 'Dom', 'Saclay'),
(37, 'Coptaire', 'Elie', 'Saclay'),
(38, 'Debord', 'Elie', 'UEVE'),
(39, 'Cochet', 'Eric', 'UEVE'),
(40, 'Oposte', 'Fidel', 'Saclay'),
(41, 'Graff', 'Geo', 'Saclay'),
(42, 'Relande', 'Guy', 'UEVE'),
(43, 'Pourkonlenkul', 'Hercule', 'UEVE'),
(44, 'Arien', 'Idir', 'Saclay'),
(45, 'Jacule', 'Jay', 'UEVE'),
(46, 'Kulacek', 'Jean', 'Saclay'),
(47, 'Sairien', 'Jean', 'Saclay'),
(48, 'Lamy', 'Kim', 'UEVE'),
(49, 'Fine', 'Louis', 'UEVE'),
(50, 'Bar', 'Lenny', 'Saclay'),
(51, 'Bylette', 'Mo', 'Saclay'),
(52, 'Line', 'Mousse', 'UEVE'),
(53, 'Ateur', 'Nordine', 'UEVE'),
(54, 'Bus', 'Otto', 'UEVE'),
(55, 'Graf', 'Otto', 'UEVE'),
(56, 'AroÏd', 'Paul', 'Saclay'),
(57, 'Chon', 'Paulo', 'Saclay'),
(58, 'toto', 'la', 'UEVE'),
(59, 'dd', 'dd', 'Saclay'),
(60, 'FDfd', 'df', 'UEVE');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id_competence` int(11) NOT NULL AUTO_INCREMENT,
  `nom_competence` varchar(255) NOT NULL,
  `categorie` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id_competence`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `nom_competence`, `categorie`) VALUES
(1, 'Compétences', '0'),
(2, 'Automatique', '1'),
(3, 'Communication', '1'),
(4, 'Aéronautique', '1'),
(5, 'Robotique', '1'),
(6, 'Automobile', '1'),
(7, 'Médecine', '1'),
(8, 'Science des donnÃ©es', '1'),
(9, 'Langues', '1'),
(10, 'Numérique', '1'),
(11, 'Motorcycle', '59'),
(12, 'Automatic control', '2'),
(13, 'Systèmes automatique mobile', '2'),
(14, 'Réalité virtuelle', '10'),
(15, 'Réalité augmentée', '10'),
(16, 'Architecture logiciel', '10'),
(17, 'Computer & network systems', '10'),
(18, 'Bioinformatique', '10'),
(19, 'Transformation numérique pour industrie', '10'),
(20, 'Jeux vidéo, intéraction et collaboration numériques', '10'),
(21, 'collaboration virtual environment', '10'),
(22, 'omnidirectional camera', '10'),
(23, 'computer vision', '10'),
(24, 'Haptic communication', '3'),
(25, 'Observers', '3'),
(26, 'Collaborative work', '3'),
(27, 'Human - robot interaction', '3'),
(28, 'Human - computer interaction', '3'),
(29, 'Human factors', '3'),
(30, 'logistique', '3'),
(31, 'vision', '3'),
(32, 'Robotique automatique, drone', '4'),
(33, 'Système intelligent automobile et aéronautique', '4'),
(34, 'industrie aéronautique, navigabilité', '4'),
(35, 'Tele robotic', '5'),
(36, 'Visual servoing', '5'),
(37, 'Robotique industrielle', '5'),
(38, 'teleopération', '5'),
(39, 'omnidirectional camera', '5'),
(40, 'ADAS', '6'),
(41, 'Système inteligent automobile et aéronautique', '6'),
(42, 'véhicule intelligent', '6'),
(43, 'système intelligent', '6'),
(44, 'Surgical training', '7'),
(45, 'Blind source separation', '8'),
(46, 'image processing', '8'),
(47, 'machine learning', '8'),
(48, 'Français', '9'),
(49, 'Anglais', '9'),
(50, 'Allemand', '9'),
(51, 'Espagnol', '9'),
(52, 'Chinois', '9'),
(53, 'Arabe', '9'),
(54, 'Portugais', '9'),
(55, 'Russe', '9'),
(56, 'Japonais', '9'),
(59, 'Mécanique', '1');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

DROP TABLE IF EXISTS `relation`;
CREATE TABLE IF NOT EXISTS `relation` (
  `id_relation` int(11) NOT NULL AUTO_INCREMENT,
  `chercheur_id` int(11) NOT NULL,
  `competence_id` int(11) NOT NULL,
  PRIMARY KEY (`id_relation`),
  KEY `utlisateur_id` (`chercheur_id`),
  KEY `competence_id` (`competence_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `relation`
--

INSERT INTO `relation` (`id_relation`, `chercheur_id`, `competence_id`) VALUES
(58, 34, 49),
(59, 34, 51),
(99, 34, 48),
(100, 20, 41),
(113, 31, 14),
(114, 31, 15);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `habilitation` int(11) NOT NULL,
  `date_inscription` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confirm` varchar(255) NOT NULL,
  `chercheur_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `utilisateur_id` (`chercheur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `mail`, `password`, `habilitation`, `date_inscription`, `confirm`, `chercheur_id`) VALUES
(2, 'Monvoisin', 'Gaëtan', 'gaetan94@live.com', '$2y$10$7M2nG2ohZdqdzI6g7TJ/m.yn57YzxZa1WpW6eO.V8raqBaQ7n.Y7y', 3, '01/01/2020', 'true', NULL),
(3, 'Mavoisine', 'Gaëtan', 'gaetan.mavoisine@gmail.cm', '$2y$10$eVvSUbKMNrF3wqUnL2qYMOcssXQDmxa91S1lFdJuz942/.N/vqmga', 1, '03/04/2020', '0', NULL),
(21, 'ombreda', 'ne', '20141898@etud.univ-evry.fr', '$2y$10$/TyMcwdnsGLuPLM1h5YlJOxdDIolfJihWF0geZn5XciqRFBr9apoq', 2, '04/04/2020', 'true', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `relation_ibfk_1` FOREIGN KEY (`chercheur_id`) REFERENCES `chercheur` (`id_chercheur`),
  ADD CONSTRAINT `relation_ibfk_2` FOREIGN KEY (`competence_id`) REFERENCES `competence` (`id_competence`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`chercheur_id`) REFERENCES `chercheur` (`id_chercheur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
