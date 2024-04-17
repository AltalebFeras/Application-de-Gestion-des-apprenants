-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2024 at 09:14 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aga_participation_statuts`
--

DROP TABLE IF EXISTS `aga_participation_statuts`;
CREATE TABLE IF NOT EXISTS `aga_participation_statuts` (
  `ID_Statuts` int NOT NULL AUTO_INCREMENT,
  `ID_Cours` int NOT NULL,
  `ID_Utilisateur` int NOT NULL,
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
  `Nom` varchar(255) NOT NULL,
  `Date_Debut` date NOT NULL,
  `Date_Fin` date NOT NULL,
  `Place_Dispo` int NOT NULL,
  PRIMARY KEY (`ID_Promo`),
  UNIQUE KEY `UQ_ID_Promo` (`ID_Promo`)
) ENGINE=MyISAM AUTO_INCREMENT=313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_promos`
--

INSERT INTO `aga_promos` (`ID_Promo`, `Nom`, `Date_Debut`, `Date_Fin`, `Place_Dispo`) VALUES
(312, 'CDA', '2024-02-01', '2025-02-01', 10),
(311, 'DWWM3', '2024-01-01', '2024-12-01', 15),
(310, 'DWWM2', '2024-01-01', '2024-12-01', 15);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_roles`
--

INSERT INTO `aga_roles` (`ID_Role`, `Nom_Role`) VALUES
(1, 'apprenant'),
(2, 'formateur');

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aga_utilisateurs`
--

INSERT INTO `aga_utilisateurs` (`ID_Utilisateur`, `Nom`, `Prenom`, `Email`, `Mot_De_Passe`, `Compte_Active`, `ID_Role`) VALUES
(35, 'Altaleb', 'Feras', 'feras@gmail.co', '', 'NON', 1),
(36, 'Altaf ', 'Eman', 'eman@gmail.c', '', 'NON', 1);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
