-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 15 juin 2022 à 18:03
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
-- Base de données : `bookbooking`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `Id_Adhérant` int(11) NOT NULL,
  `Nom` int(11) NOT NULL,
  `Prénom` int(11) NOT NULL,
  `CIN` int(11) NOT NULL,
  `Date_naissance` int(11) NOT NULL,
  `Photo` int(11) NOT NULL,
  `Email` int(11) NOT NULL,
  `Téléphone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `Id_Catégorie` int(11) NOT NULL,
  `Libelle_Catégorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `Id_Commentaire` int(11) NOT NULL,
  `Date_Commentaire` int(11) NOT NULL,
  `Detail_Commentaire` int(11) NOT NULL,
  `Notation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Structure de la table `copie`
--

CREATE TABLE `copie` (
  `Id_Copie` int(11) NOT NULL,
  `Date_D'achat` int(11) NOT NULL,
  `Etat_Copie` int(11) NOT NULL,
  `Réservé` int(11) NOT NULL,
  `Présent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `Nbr_Emprunt` int(11) NOT NULL,
  `Date_Prévisionnelle_De_Retour` date NOT NULL,
  `Date_Effective_De_Retour` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `ISBN` int(11) NOT NULL,
  `Titre` int(11) NOT NULL,
  `Auteur` int(11) NOT NULL,
  `Maison_d_edition` int(11) NOT NULL,
  `Nbr_page` int(11) NOT NULL,
  `Sommaire` int(11) NOT NULL,
  `Edition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`Id_Adhérant`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id_Catégorie`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Id_Commentaire`);

--
-- Index pour la table `copie`
--
ALTER TABLE `copie`
  ADD PRIMARY KEY (`Id_Copie`);

--
-- Index pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`Nbr_Emprunt`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`ISBN`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`Id_Adhérant`) REFERENCES `emprunt` (`Nbr_Emprunt`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`Id_Catégorie`) REFERENCES `livre` (`ISBN`);

--
-- Contraintes pour la table `copie`
--
ALTER TABLE `copie`
  ADD CONSTRAINT `copie_ibfk_1` FOREIGN KEY (`Id_Copie`) REFERENCES `emprunt` (`Nbr_Emprunt`);

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`Nbr_Emprunt`) REFERENCES `commentaire` (`Id_Commentaire`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `copie` (`Id_Copie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
