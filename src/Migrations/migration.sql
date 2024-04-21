-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2024 at 11:21 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aga`
--

-- --------------------------------------------------------

--
-- Table structure for table `aga_cours`
--

DROP TABLE IF EXISTS `aga_cours`;
CREATE TABLE IF NOT EXISTS `aga_cours` (
  `ID_Cours` int NOT NULL AUTO_INCREMENT,
  `Date_Cours` date NOT NULL,
  `Heure_Debut` time NOT NULL,
  `Heure_Fin` time NOT NULL,
  `Code_Aleatoire` int NOT NULL,
  `ID_Promo` int NOT NULL,
  PRIMARY KEY (`ID_Cours`),
  UNIQUE KEY `UQ_ID_Cours` (`ID_Cours`),
  KEY `FK_AGA_Promos_TO_AGA_Cours` (`ID_Promo`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_cours`
--

INSERT INTO `aga_cours` (`ID_Cours`, `Date_Cours`, `Heure_Debut`, `Heure_Fin`, `Code_Aleatoire`, `ID_Promo`) VALUES
(42, '2024-04-21', '09:00:00', '12:00:00', 6977, 39),
(41, '2024-04-21', '09:00:00', '12:00:00', 50015, 39),
(40, '2024-04-21', '13:00:00', '17:00:00', 70086, 39),
(39, '2024-04-21', '09:00:00', '12:00:00', 74404, 39);

-- --------------------------------------------------------

--
-- Table structure for table `aga_participation_statuts`
--

DROP TABLE IF EXISTS `aga_participation_statuts`;
CREATE TABLE IF NOT EXISTS `aga_participation_statuts` (
  `ID_Statuts` int NOT NULL AUTO_INCREMENT,
  `ID_Cours` int NOT NULL,
  `ID_Utilisateur` int NOT NULL,
  `Status` varchar(55) NOT NULL,
  PRIMARY KEY (`ID_Statuts`),
  UNIQUE KEY `UQ_ID_Statuts` (`ID_Statuts`),
  KEY `FK_AGA_Cours_TO_AGA_Participation_Statuts` (`ID_Cours`),
  KEY `FK_AGA_Utilisateurs_TO_AGA_Participation_Statuts` (`ID_Utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aga_promos`
--

DROP TABLE IF EXISTS `aga_promos`;
CREATE TABLE IF NOT EXISTS `aga_promos` (
  `ID_Promo` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(55) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Place_Dispo` int NOT NULL,
  PRIMARY KEY (`ID_Promo`),
  UNIQUE KEY `UQ_ID_Promo` (`ID_Promo`),
  UNIQUE KEY `UQ_Nom` (`Nom`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_promos`
--

INSERT INTO `aga_promos` (`ID_Promo`, `Nom`, `Date_Debut`, `Date_Fin`, `Place_Dispo`) VALUES
(39, 'test promo', '2024-04-24', '2024-09-12', 11),
(34, 'CDA', '2024-09-09', '2025-05-09', 7),
(33, 'DWWM3', '2024-04-08', '2024-11-29', 10),
(32, 'DWWM2', '2024-04-01', '2024-09-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `aga_roles`
--

DROP TABLE IF EXISTS `aga_roles`;
CREATE TABLE IF NOT EXISTS `aga_roles` (
  `ID_Role` int NOT NULL AUTO_INCREMENT,
  `Nom_Role` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Role`),
  UNIQUE KEY `UQ_ID_Role` (`ID_Role`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_roles`
--

INSERT INTO `aga_roles` (`ID_Role`, `Nom_Role`) VALUES
(2, 'Formateur'),
(1, 'Apprenant'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `aga_utilisateurs`
--

DROP TABLE IF EXISTS `aga_utilisateurs`;
CREATE TABLE IF NOT EXISTS `aga_utilisateurs` (
  `ID_Utilisateur` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mot_De_Passe` varchar(150) NOT NULL,
  `Compte_Active` varchar(50) NOT NULL,
  `ID_Role` int NOT NULL,
  PRIMARY KEY (`ID_Utilisateur`),
  UNIQUE KEY `UQ_ID_Utilisateur` (`ID_Utilisateur`),
  UNIQUE KEY `UQ_Email` (`Email`),
  KEY `FK_AGA_Roles_TO_AGA_Utilisateurs` (`ID_Role`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_utilisateurs`
--

INSERT INTO `aga_utilisateurs` (`ID_Utilisateur`, `Nom`, `Prenom`, `Email`, `Mot_De_Passe`, `Compte_Active`, `ID_Role`) VALUES
(97, 'Johnson', 'Dwayne ', 'Dwayne.Johnson1972@testmail.fr', '', 'Non', 2),
(96, 'Statham', 'Jason ', 'Jason.Statham1967@testmail.fr', '', 'Non', 1),
(95, 'Min-hyuk', 'Kang ', 'Kang.Min-hyuk@testmail.fr', '', 'Non', 1),
(93, 'Boris ', 'Johnson', 'Boris.Johnson@testmail.fr', '', 'Non', 1),
(94, 'Sunak', 'Rishi ', 'Sunak@testmail.fr', '', 'Non', 1),
(91, 'Piqué', 'Gerard ', 'Pique@testmail.fr', '', 'Non', 1),
(92, 'Cristiano ', 'Ronaldo', 'Cristiano123@testmail.fr', '', 'Non', 1),
(84, 'Miley', 'Cyrus', 'Miley.Cyrus@tsetmail.fr', '', 'Non', 1),
(85, 'Abraham', 'Lincoln', 'Lincoln@tsetmail.fr', '', 'Non', 1),
(86, '50 Cent', 'Curtis James Jackson III', '0.5$@tsetmail.fr', '', 'Non', 2),
(87, 'Z', 'Arthur', 'arthur.z@testmail.fr', '', 'Non', 1),
(88, 'Shakira', 'Isabel ', 'Shakira@testmail.fr', '', 'Non', 1),
(89, 'Beckham', 'David ', 'Beckham@testmail.fr', '', 'Non', 1),
(90, 'Lopez', 'Jennifer ', 'Lopez@testmail.fr', '', 'Non', 1),
(81, 'Obama', 'Barack', 'Obama@tsetmail.fr', '', 'Non', 1),
(82, 'Biden', 'Joe', 'Joe@tsetmail.fr', '', 'Non', 1),
(83, 'Lady Gaga ', 'Stefani Joanne', 'Lady.Gaga@tsetmail.fr', '', 'Non', 1),
(79, 'Altaleb', 'Feras', 'feras@tsetmail.fr', '', 'Non', 1),
(80, 'TRAMPE', 'Donald', 'Donald @tsetmail.fr', '', 'Non', 1),
(98, 'Aniston', ' Jennifer', 'Jennifer.Aniston@testmail.com', '', 'Non', 1),
(99, 'LeBlanc', ' Matt ', 'LeBlanc@testmail.com', '', 'Non', 1),
(100, 'Schwimmer', 'David ', 'Schwimmer.freinds@testmail.com', '', 'Non', 1),
(101, 'Kudrow', 'Lisa ', 'Kudrow.freinds12@testmail.com', '', 'Non', 2),
(102, 'Matthew ', 'Perry', 'Matthew2.freinds12@testmail.com', '', 'Non', 1),
(104, 'Altaleb', 'Feras', 'feras.altalib@gmail.com', '$2y$10$/P9gDMsMytZfSaHukhZU1.JoRo0jvATG4D2JvpFtZrJRhlp/M5X1u', 'Oui', 1),
(105, 'Feras', 'Admin', 'admin@simplon.co', '$2y$10$/P9gDMsMytZfSaHukhZU1.JoRo0jvATG4D2JvpFtZrJRhlp/M5X1u', 'Oui', 3);

-- --------------------------------------------------------

--
-- Table structure for table `aga_utilisateurs_promos`
--

DROP TABLE IF EXISTS `aga_utilisateurs_promos`;
CREATE TABLE IF NOT EXISTS `aga_utilisateurs_promos` (
  `ID_Utilisateur` int NOT NULL,
  `ID_Promo` int NOT NULL,
  KEY `FK_AGA_Utilisateurs_TO_AGA_Utilisateurs_Promos` (`ID_Utilisateur`),
  KEY `FK_AGA_Promos_TO_AGA_Utilisateurs_Promos` (`ID_Promo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_utilisateurs_promos`
--

INSERT INTO `aga_utilisateurs_promos` (`ID_Utilisateur`, `ID_Promo`) VALUES
(79, 34),
(80, 34),
(81, 34),
(82, 34),
(83, 34),
(84, 34),
(85, 34),
(86, 34),
(87, 33),
(88, 33),
(89, 33),
(90, 33),
(91, 33),
(92, 33),
(93, 33),
(94, 33),
(95, 33),
(96, 33),
(97, 33),
(98, 32),
(99, 32),
(100, 32),
(101, 32),
(102, 32),
(103, 39),
(104, 39),
(105, 39),
(107, 39);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
