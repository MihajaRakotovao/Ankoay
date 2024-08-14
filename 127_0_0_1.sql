-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 14, 2024 at 07:58 AM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ankoay`
--
CREATE DATABASE IF NOT EXISTS `ankoay` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ankoay`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `descri` text NOT NULL,
  `date_pub` date NOT NULL DEFAULT current_timestamp(),
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `descri`, `date_pub`, `photo`) VALUES
(2, 'Derrière la réussite des Ankoay garçons se trouvent les trois coachs...', 'Derrière la réussite des Ankoay garçons se trouvent les trois coachs, Aimé Randria, entraîneur principal, et ses deux assistants Malalatiana Razazarohavana, et Angelo Ravelonirina', '2024-03-22', 'image (4).jpg'),
(3, '     Ankoay &agrave; Paris', 'Rasolofoson a connu son plus beau moment lors du match contre la Tanzanie, inscrivant un panier à trois points au buzzer pour offrir la victoire à son équipe, avec à la clé une qualification pour les demi-finales. Ses 19 points contre l\'Égypte ont récompensé ses inlassables efforts en attaque.\r\n\r\n', '2024-03-17', 'image (32).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Categorie` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `Nom_Categorie`) VALUES
(3, 'senior'),
(4, 'Junior'),
(7, '3X3');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coms` text NOT NULL,
  `id_article` int(3) NOT NULL,
  `id_utilisateur` int(3) NOT NULL,
  `date_pub` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`id`, `coms`, `id_article`, `id_utilisateur`, `date_pub`) VALUES
(1, 'Superr!!!!!!!!!!!!!!!!!', 1, 2, '2024-03-17 12:47:22'),
(2, 'Superrrr', 3, 2, '2024-03-17 22:07:44'),
(3, 'Hate', 3, 2, '2024-03-17 22:10:12'),
(4, 'Coool', 2, 2, '2024-03-22 09:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `descri` text NOT NULL,
  `photo` text NOT NULL,
  `date_events` date NOT NULL,
  `lieu` varchar(200) NOT NULL,
  `equipe2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `titre`, `descri`, `photo`, `date_events`, `lieu`, `equipe2`) VALUES
(1, '      Prochain Match', '      Madagascar Vs Egypte ', 'image (7).jpg', '2024-03-29', '      France,Paris Rue-Belrond 182,33', 'egypte.png'),
(2, ' JEUX AFRICAINS - Quarts de finale en vue pour les Ankoay gar&ccedil;ons', ' Une entr&eacute;e r&eacute;ussie des Ankoay gar&ccedil;ons au basketball 3x3 de la XIIIe &eacute;dition des Jeux africains qui se d&eacute;roulent actuellement &agrave; Accra, Ghana.  En match de la premi&egrave;re journ&eacute;e des phases de poule du 18 mars, jou&eacute;s sur le terrain de basketball de l&rsquo;universit&eacute; UGB du Ghana, les Ankoay ont disput&eacute; deux matchs r&eacute;compens&eacute;s par deux victoires cons&eacute;cutives. Pour d&eacute;buter leur comp&eacute;tition, les prot&eacute;g&eacute;s de Mathieu Rakotomalala, coach de l&rsquo;&eacute;quipe masculine Ankoay de 3x3, ont surclass&eacute; les Aigles du Mali sur le score de 12-9.', 'madaMali.jpg', '2024-03-20', ' Accra, Ghana.', 'mali.png');

-- --------------------------------------------------------

--
-- Table structure for table `galerie`
--

DROP TABLE IF EXISTS `galerie`;
CREATE TABLE IF NOT EXISTS `galerie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photos` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galerie`
--

INSERT INTO `galerie` (`id`, `photos`) VALUES
(1, 'image.jpg'),
(2, 'image (1).jpg'),
(3, 'image (2).jpg'),
(4, 'image (3).jpg'),
(5, 'image (4).jpg'),
(6, 'image (5).jpg'),
(7, 'image (6).jpg'),
(8, 'image (7).jpg'),
(9, 'image (8).jpg'),
(10, 'image (9).jpg'),
(11, 'image (10).jpg'),
(12, 'image (11).jpg'),
(13, 'image (12).jpg'),
(14, 'image (13).jpg'),
(15, 'image (14).jpg'),
(16, 'image (15).jpg'),
(17, 'image (16).jpg'),
(18, 'image (17).jpg'),
(19, 'image (18).jpg'),
(20, 'image (19).jpg'),
(21, 'image (20).jpg'),
(22, 'image (21).jpg'),
(23, 'image (22).jpg'),
(24, 'image (23).jpg'),
(25, 'image (24).jpg'),
(26, 'image (25).jpg'),
(27, 'image (26).jpg'),
(28, 'image (27).jpg'),
(29, 'image (28).jpg'),
(30, 'image (29).jpg'),
(31, 'image (30).jpg'),
(32, 'image (31).jpg'),
(33, 'image (32).jpg'),
(34, 'image (33).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `goodies`
--

DROP TABLE IF EXISTS `goodies`;
CREATE TABLE IF NOT EXISTS `goodies` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `joueurs`
--

DROP TABLE IF EXISTS `joueurs`;
CREATE TABLE IF NOT EXISTS `joueurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `date_naissance` date NOT NULL,
  `age` int(11) NOT NULL,
  `poste` text NOT NULL,
  `taille` text NOT NULL,
  `photo` text NOT NULL,
  `Categorie` int(11) NOT NULL,
  `sexe` varchar(200) NOT NULL,
  `club` text NOT NULL,
  `competition` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `joueurs`
--

INSERT INTO `joueurs` (`id`, `nom`, `prenom`, `date_naissance`, `age`, `poste`, `taille`, `photo`, `Categorie`, `sexe`, `club`, `competition`) VALUES
(1, 'Andriantsiferana ', 'Maharo Levah Mirando', '2004-05-02', 20, '1', '1m90', 'mirando.png', 3, '1', 'AMBOHPPS', 'balbalb'),
(2, 'Andriatsarafara', 'Lovasoa Ny Aina Andeyrson ', '2004-01-17', 20, '5', '2m07', 'lovasoa.png', 3, '1', 'ASCUT', '0'),
(3, 'Rabibisoa', 'Jerry Pépin ', '2004-12-15', 20, '2', '2m03', 'jerryP.png', 3, '1', 'COSPN', '0'),
(4, 'Randimbiarivelo', 'Rino', '2004-03-04', 20, '3', '1m78', 'rino.png', 3, '1', 'SERASERA', '0'),
(5, 'Emmanuel', 'Yves Victorien Léon ', '2004-11-15', 20, '3', '1m80', 'yves.png', 3, '1', 'ASCUT', '0'),
(6, 'Heritiana', 'Fabrizio Mickaël Patrick ', '2004-07-07', 20, '3', '1m86', 'fabrizio.png', 3, '1', 'EBF', '0'),
(7, 'BE', 'Richcard', '2004-05-07', 20, '3', '1m85', 'Be.png', 3, '1', 'ASA', '0'),
(8, 'Tovolalaina', 'Mariano Sylvain ', '2004-01-04', 20, '2', '1m98', 'mariano', 3, '1', 'COSPN', '0'),
(9, 'Tsihindiny', 'Laurent Tahintsoa Junnhio O’Neal ', '2005-01-16', 19, '1', '1m93', 'laurent.png', 3, '1', 'EBF', '0'),
(10, 'Mathias', 'M’Madi', '2005-06-02', 19, '4', '1m94', 'madi.png', 3, '1', 'Grand Chalon', '0'),
(11, 'Randrianalinjafy', 'Dina', '2006-05-23', 18, '4', '1m91', 'dina.jpg', 4, '1', 'Neutre', '0'),
(12, 'Raharinaivo', 'Davida Zoherimalala', '2004-07-29', 20, '4', '1m76', 'david.png', 3, '1', 'New World Academy', '0'),
(13, 'Raolompanatena', 'Sydney Thesbon', '2004-04-06', 20, '1', '1m87', 'sydney.png', 3, '1', 'Neutre', '0'),
(14, 'RASOLOFOSON', 'Marion Fitia', '2005-11-21', 18, '3', 'Neant', 'marion.jpg', 4, '2', 'MBC', '0'),
(15, 'ANDRIAMANANA', 'David Mandresy', '2004-08-30', 20, '3', 'Neant', 'davidmandresy.jpg', 3, '2', 'MB2ALL', '0'),
(16, 'RAKOTONANAHARY', 'Joanie Anyssa', '2005-04-12', 18, '4', 'Neant', 'joanie.jpg', 4, '2', 'MB2ALL', '0'),
(17, 'RAKOTOBE', 'Kristina Nahitantsoa', '2005-05-13', 18, '5', 'Neant', 'kristina.jpg', 4, '2', 'MB2ALL', '0'),
(18, 'VOLAHASINA', 'Louise Francette', '2005-02-15', 19, '1', 'Neant', 'louise.jpg', 4, '2', 'MB2ALL', '0'),
(19, 'ZAFINANTENAINA', ' Marie H', '2005-02-11', 19, '2', 'Neant', 'marie.jpg', 4, '2', 'SEPA ABM', '0'),
(20, 'RAMAHATRA', 'Taratriniaina Murielle Erica', '2005-10-15', 19, '3', 'Neant', 'Merica.jpg', 4, '2', 'JEA', '0'),
(21, 'RAJOELINA', 'Francia Andriatsiresy', '2005-05-08', 19, '5', 'Neant', 'rajoelina.jpg', 4, '2', 'JEA', '0'),
(22, 'RASENDRARISON', 'Salohy Fassiolathi', '2004-07-30', 20, '2', 'Neant', 'salohy.jpg', 3, '2', 'ASCUT', '0'),
(23, 'RAKOTONIRINA', 'Mianjasoa Koloina Fiderana', '2005-06-06', 19, '2', 'Neant', 'fiderana.jpg', 4, '2', 'EBF', '0'),
(24, 'RAHARITIANA', 'Chamirah Rodin', '2005-10-03', 19, '5', 'Neant', 'rodin.jpg', 4, '2', 'TGEC', '0'),
(25, 'ANDRIANJAFY', 'Nomenjanahary Mihantatiana', '2004-09-21', 20, '1', 'Neant', 'andrianjafy.jpg', 3, '2', 'JEA', '0'),
(26, 'RAZAFIMAHEFA', 'Nirina Annick Karen', '2024-03-29', 20, '2', 'Neant', 'annick.jpg', 3, '2', 'JEA', '0'),
(27, 'RAHARIARIVONY', 'Justine Etienne', '2005-03-27', 19, '5', 'Neant', 'justine.jpg', 4, '2', 'USJFM', '0'),
(28, 'RAZAFIMAHATRATRANIAINA', 'Todisoa Clémentine Basilisy', '2004-01-01', 20, '1', 'Neant', 'todisoa.jpg', 3, '2', 'PHOENIX', '0'),
(31, 'RATIANARIVO', 'Livio Rocheteau', '1996-04-24', 27, '1', '1m85', 'livio.jpg', 7, '1', 'COSPN', 'JIOI / 3X3'),
(30, 'mihaja', 'Rakoto', '2004-07-17', 20, '3', '1m65', 'Captur.JPG', 3, '1', 'ASCUT', 'Afrobasket'),
(32, 'RANDRIAMAMPIONONA', 'Elly', '1997-07-20', 26, '1', '1m88', 'elly.jpg', 7, '1', 'COSPN', 'JIOI / 3X3'),
(33, 'SOLONDRAINY', 'Arnol Jean Alpha', '1999-05-04', 24, '1', '1m98', 'arnolJean.jpg', 7, '1', 'COSPN', 'JIOI / 3X3');

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

DROP TABLE IF EXISTS `parcours`;
CREATE TABLE IF NOT EXISTS `parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_joueurs` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `annee2` int(11) NOT NULL,
  `Description2` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poste_joueurs`
--

DROP TABLE IF EXISTS `poste_joueurs`;
CREATE TABLE IF NOT EXISTS `poste_joueurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Poste` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poste_joueurs`
--

INSERT INTO `poste_joueurs` (`id`, `Nom_Poste`) VALUES
(1, 'Ailier'),
(2, 'Ailier Fort'),
(3, 'Meneur'),
(4, 'Arrière'),
(5, 'Pivot');

-- --------------------------------------------------------

--
-- Table structure for table `sexe`
--

DROP TABLE IF EXISTS `sexe`;
CREATE TABLE IF NOT EXISTS `sexe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sexe`
--

INSERT INTO `sexe` (`id`, `sexe`) VALUES
(1, 'Homme'),
(2, 'Dame');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomS` varchar(200) NOT NULL,
  `prenomS` varchar(200) NOT NULL,
  `Statut` int(11) NOT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `nomS`, `prenomS`, `Statut`, `photo`) VALUES
(1, 'Randria', 'Aimé Alain Marcel', 1, 'meme.jpg'),
(2, 'Razazarohavana', 'Malalatiana', 1, 'malalatiana.jpg'),
(3, 'Ramaroson', 'Jean Michel', 2, 'president.png'),
(4, 'Ramanarivo', 'Alain', 3, 'vice.png'),
(5, 'Tsiry Colombe', 'Ralalaharison', 4, 'sg.png');

-- --------------------------------------------------------

--
-- Table structure for table `statut_staff`
--

DROP TABLE IF EXISTS `statut_staff`;
CREATE TABLE IF NOT EXISTS `statut_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_Statut` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statut_staff`
--

INSERT INTO `statut_staff` (`id`, `Nom_Statut`) VALUES
(1, 'Coach'),
(2, 'Président'),
(3, 'Vice-Président'),
(4, 'Secrétaire Générale  ');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Photo` text NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `Pseudo`, `Email`, `Photo`, `mdp`) VALUES
(1, 'Charles', 'Charles@gmail.com', 'user-13.jpg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Rivo', 'Rivo@gmail.com', 'roster-player-1-368x286.jpg', '1b24d1109eb68c6656131757482f1b55fb443288');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `descri` text NOT NULL,
  `vdieo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `titre`, `descri`, `vdieo`) VALUES
(1, 'Top 10 des Ankoay de Madagascar au Mondial FIBA U19 à Hongrie ', 'L \'équipe Basketball masculin U19 de Madagascar a été placé en 14eme rang Mondial lors de sa première participation au \"Mondial FIBA U19\"', '1711031134925.mp4'),
(2, 'Ankoay de Madagascar _ 1/4 de Final', 'Ankoay de Madagascar a fait un bon travail en étant qualifié pour le quart de Finale', '1711031074554.mp4'),
(3, 'AFROBASKET U18 GARCONS', 'La demi finale electrique des Ankoay', '1711030780636.mp4'),
(4, 'ANKOAY 3X3 Best Play', 'Revivez les meilleurs actions de nos Ankoay 3X3 du 30 mai au 04 juin 2023 à Vienne Autriche', '1711030571349.mp4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
