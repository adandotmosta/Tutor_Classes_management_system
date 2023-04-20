-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 avr. 2023 à 02:46
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
-- Structure de la table `supervisor`
--

CREATE TABLE `supervisor` (
  `Supervisor_Id` int(11) NOT NULL,
  `Supervisor_FirstName` varchar(45) NOT NULL,
  `Supervisor_LastName` varchar(45) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Supervisor_Mail` varchar(45) NOT NULL,
  `Password_User` varchar(45) NOT NULL,
  `Mobile_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `supervisor`
--

INSERT INTO `supervisor` (`Supervisor_Id`, `Supervisor_FirstName`, `Supervisor_LastName`, `School_Id`, `Supervisor_Mail`, `Password_User`, `Mobile_number`) VALUES
(1, 'mohamed', 'SAIDI', 1, 'mohamed@gmail.com', '202cb962ac59075b964b07152d234b70', 552294866),
(5, 'h', 'n', 1, 'b@gamil.com', '6512bd43d9caa6e02c990b0a82652dca', 254698755),
(10, 'belarbi', 'akram', 1, 'akram@gmail.com', '8d5e957f297893487bd98fa830fa6413', 669887744),
(12, 'bgg', 'bg', 1, 'bg@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 123654789);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`Supervisor_Id`),
  ADD KEY `FK_5` (`School_Id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Supervisor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
