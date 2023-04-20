-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 avr. 2023 à 02:43
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_tutoring_classes`
--

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `Student_Id` int(11) NOT NULL,
  `Supervisor_Id` int(11) DEFAULT NULL,
  `Student_FirstName` varchar(45) NOT NULL,
  `Student_LastName` varchar(45) NOT NULL,
  `Student_Mail` varchar(45) NOT NULL,
  `Student_Password` varchar(45) NOT NULL,
  `Student_Birthday` date NOT NULL,
  `Student_address` varchar(45) DEFAULT NULL,
  `Student_Phone_number` int(11) DEFAULT NULL,
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`Student_Id`, `Supervisor_Id`, `Student_FirstName`, `Student_LastName`, `Student_Mail`, `Student_Password`, `Student_Birthday`, `Student_address`, `Student_Phone_number`, `image`) VALUES
(1, 1, 'Mohamed Nadir', 'HAMOU', 'mohamed.hamou@ensia.edu.dz', '202cb962ac59075b964b07152d234b70', '2004-05-17', 'Saida rue castor', 562294899, ''),
(10, 10, 'abdenour', 'belarbi', 'abdenour@gmail.com', '8d5e957f297893487bd98fa830fa6413', '2003-10-10', 'Mostaganem', 552336699, 0x436170747572652064e28099c3a96372616e20323032322d30312d3137203230343131312e706e67),
(11, 5, 'a', 'b', 'a@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '2000-11-11', 'anywhere', 222222222, 0x636f6d7075732e6a7067),
(12, 12, 'dg', 'na', 'na@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '2003-10-10', 'bgg', 2147483647, 0x636f6d7075732e6a7067);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `FK_6` (`Supervisor_Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`Supervisor_Id`) REFERENCES `supervisor` (`Supervisor_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
