-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 04 déc. 2021 à 16:59
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `easypay`
--

-- --------------------------------------------------------

--
-- Structure de la table `presence`
--

CREATE TABLE `presence` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `MONTH` varchar(255) DEFAULT NULL,
  `YEAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `presence`
--

INSERT INTO `presence` (`ID`, `ID_USER`, `REGDATE`, `STATUS`, `MONTH`, `YEAR`) VALUES
(1, 2, 'dsfdsc', 1, '10', '21'),
(2, 2, '21/10/14', 1, '10', '21'),
(3, 2, '21/10/14', 1, '10', '21'),
(4, 2, '21/10/14', 1, '10', '21'),
(5, 2, '21/10/14', 1, '10', '21'),
(6, 2, '21/10/14', 1, '10', '21'),
(7, 2, '21/10/14', 1, '10', '21'),
(8, 2, '21/10/14', 1, '10', '21'),
(9, 2, '21/10/14', 1, '10', '21'),
(10, 2, '21/10/14', 1, '10', '21'),
(11, 2, '21/10/14', 1, '10', '21'),
(12, 2, '21/10/14', 1, '10', '21'),
(13, 2, '21/10/14', 1, '10', '21'),
(14, 2, '21/10/14', 1, '10', '21'),
(15, 2, '21/10/14', 1, '10', '21'),
(16, 2, '21/10/14', 1, '10', '21'),
(17, 2, '21/10/14', 1, '10', '21'),
(18, 3, '21/10/14', 1, '10', '21'),
(19, 4, '21/10/14', 1, '10', '21'),
(20, 5, '21/10/15', 1, '10', '21'),
(21, 5, '21/10/15', 1, '10', '21'),
(22, 2, '21/10/15', 1, '10', '21');

-- --------------------------------------------------------

--
-- Structure de la table `salary`
--

CREATE TABLE `salary` (
  `ID` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL,
  `AMOUNT` double DEFAULT NULL,
  `MONTH` varchar(255) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `YEAR` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salary`
--

INSERT INTO `salary` (`ID`, `ID_USER`, `REGDATE`, `AMOUNT`, `MONTH`, `STATUS`, `YEAR`) VALUES
(1, 2, '21/10/15', 334.15, '10', 1, '21'),
(2, 3, '21/10/14', 66.83, '10', 1, '21'),
(3, 4, '21/10/14', 66.83, '10', 1, '21'),
(4, 5, '21/10/15', 133.66, '10', 1, '21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `FIRSTNAME` varchar(255) DEFAULT NULL,
  `LASTNAME` varchar(255) DEFAULT NULL,
  `ROLE` int(11) DEFAULT NULL,
  `REGDATE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `EMAIL`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `ROLE`, `REGDATE`) VALUES
(1, 'jonathan@exalt.cd', '123456789', 'jonathan', 'konde', 1, NULL),
(2, 'patricia@exalt.cd', '123456789', 'patricia', 'konde', 2, NULL),
(3, 'kagame@exalt.cd', '123456789', 'paul', 'kagame', 2, NULL),
(4, 'chris@exalt.cd', '123456789', 'chris', 'konde', 2, NULL),
(5, 'janeiro@exalt.com', '123456789', 'rio', 'janeiro', 2, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `presence`
--
ALTER TABLE `presence`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_AVOIR` (`ID_USER`);

--
-- Index pour la table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_POSSEDER` (`ID_USER`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `presence`
--
ALTER TABLE `presence`
  ADD CONSTRAINT `FK_AVOIR` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`);

--
-- Contraintes pour la table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `FK_POSSEDER` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
