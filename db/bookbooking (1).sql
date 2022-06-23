-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE `adherent` (
  `Id_Adhérant` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prénom` varchar(255) NOT NULL,
  `CIN` varchar(255) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Téléphone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`Id_Adhérant`, `Nom`, `Prénom`, `CIN`, `Date_naissance`, `Photo`, `Email`, `Téléphone`) VALUES
(1342, 'AHOUZI', 'Hasnae', 'k581814', '2022-06-01', 'telecharger.jpeg', 'ahouzhasnae@gmail.com', 9876543234);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `Id_Catégorie` int(11) NOT NULL,
  `Libelle_Catégorie` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`Id_Catégorie`, `Libelle_Catégorie`) VALUES
(1, 'Romans '),
(2, 'compte'),
(3, 'novels ');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `Id_Commentaire` int(11) NOT NULL,
  `Date_Commentaire` date NOT NULL,
  `Detail_Commentaire` varchar(255) NOT NULL,
  `Notation` int(11) NOT NULL,
  `Nbr_Emprunt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`Id_Commentaire`, `Date_Commentaire`, `Detail_Commentaire`, `Notation`, `Nbr_Emprunt`) VALUES
(1, '2022-06-20', 'ceci est un commentaire du livre Rich father and poor father', 0, 1),
(2, '2022-06-23', 'ceci est un commentaire sur le livre unique mirror', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `copie`
--

CREATE TABLE `copie` (
  `Id_Copie` int(11) NOT NULL,
  `Date_D'achat` date NOT NULL,
  `Etat_Copie` varchar(255) NOT NULL,
  `Réservé` tinyint(1) NOT NULL,
  `Présente` tinyint(1) NOT NULL,
  `empurnter` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `copie`
--

INSERT INTO `copie` (`Id_Copie`, `Date_D'achat`, `Etat_Copie`, `Réservé`, `Présente`, `empurnter`, `ISBN`) VALUES
(1, '2022-06-15', 'bien', 0, 0, 1, 3784),
(2, '2022-06-15', 'tres bien', 0, 1, 0, 3784),
(3, '2022-06-21', 'moyenne', 0, 1, 0, 978),
(4, '2022-06-08', 'mauvaise', 0, 0, 1, 978),
(5, '2022-06-01', 'mauvaise', 1, 0, 0, 978);

-- --------------------------------------------------------

--
-- Table structure for table `emprunt`
--

CREATE TABLE `emprunt` (
  `Nbr_Emprunt` int(11) NOT NULL,
  `Date_Prévisionnelle_De_Retour` date NOT NULL,
  `Date_Effective_De_Retour` date NOT NULL,
  `Id_Adhérent` int(11) NOT NULL,
  `Id_Copie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `emprunt`
--

INSERT INTO `emprunt` (`Nbr_Emprunt`, `Date_Prévisionnelle_De_Retour`, `Date_Effective_De_Retour`, `Id_Adhérent`, `Id_Copie`) VALUES
(1, '2022-06-07', '2022-06-29', 1342, 1),
(2, '2022-06-07', '2022-06-09', 1342, 4);

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `ISBN` int(11) NOT NULL,
  `couverture` varchar(255) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Auteur` varchar(255) NOT NULL,
  `Maison_d_edition` varchar(255) NOT NULL,
  `Nbr_page` int(11) NOT NULL,
  `Sommaire` varchar(255) NOT NULL,
  `l_Edition` int(11) NOT NULL,
  `Id_Catégorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `livre`
--

INSERT INTO `livre` (`ISBN`, `couverture`, `Titre`, `Auteur`, `Maison_d_edition`, `Nbr_page`, `Sommaire`, `l_Edition`, `Id_Catégorie`) VALUES
(978, '2-couverture.png.webp', 'unique mirror', 'Reham Radi', 'Maison Galerie', 264, 'Summary.jpeg', 234, 3),
(3784, '1-couverture.jpg.webp', 'Rich father and poor father', 'Robert Kiyosaki', 'Maison JARER', 244, 'Summary.jpeg', 1997, 1),
(9785, '3-couverture.png.webp', 'pistachio theory', 'pistachio theory', 'Maison Al Hadahar', 338, 'Summary.jpeg', 2017, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`Id_Adhérant`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Id_Catégorie`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`Id_Commentaire`),
  ADD KEY `Nbr_Emprunt` (`Nbr_Emprunt`);

--
-- Indexes for table `copie`
--
ALTER TABLE `copie`
  ADD PRIMARY KEY (`Id_Copie`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD PRIMARY KEY (`Nbr_Emprunt`),
  ADD KEY `Id_Copie` (`Id_Copie`),
  ADD KEY `Id_Adhérent` (`Id_Adhérent`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `Id_Catégorie` (`Id_Catégorie`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`Nbr_Emprunt`) REFERENCES `emprunt` (`Nbr_Emprunt`);

--
-- Constraints for table `copie`
--
ALTER TABLE `copie`
  ADD CONSTRAINT `copie_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `livre` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`Id_Adhérent`) REFERENCES `adherent` (`Id_Adhérant`),
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`Id_Copie`) REFERENCES `copie` (`Id_Copie`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`Id_Catégorie`) REFERENCES `categorie` (`Id_Catégorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
