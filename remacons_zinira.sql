-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 20 jan. 2022 à 16:08
-- Version du serveur :  10.3.32-MariaDB-log-cll-lve
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `remacons_zinira`
--

-- --------------------------------------------------------

--
-- Structure de la table `sen_client`
--

CREATE TABLE `sen_client` (
  `IdClient` int(11) NOT NULL,
  `prenom_nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `Date_naissance` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `Tel` int(11) NOT NULL,
  `genre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_client`
--

INSERT INTO `sen_client` (`IdClient`, `prenom_nom`, `adresse`, `Date_naissance`, `email`, `Tel`, `genre`) VALUES
(1, 'Aminata Ba', 'Sicap Mermoz villa NÂ° 2543', '1980-02-21', 'mina.ba@gmail.com', 772351564, ''),
(2, 'Lamine Fall', 'Rocade bel air', '1995-06-14', 'lamfall@yahoo.fr', 765231412, 'Homme'),
(3, 'Ousmane Latyr Ndiaye', 'Ouagou niaye II', '2002-12-06', 'latsignil@gmail.com', 778545623, 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `sen_locations`
--

CREATE TABLE `sen_locations` (
  `IdLocation` smallint(5) UNSIGNED NOT NULL,
  `IdClient` smallint(5) UNSIGNED NOT NULL,
  `Plaque` varchar(12) NOT NULL,
  `DateDebut` datetime NOT NULL,
  `DateFin` datetime NOT NULL,
  `DateRentree` datetime DEFAULT NULL,
  `idTarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sen_personnel`
--

CREATE TABLE `sen_personnel` (
  `id_personnel` int(11) NOT NULL,
  `prenom_noms` varchar(255) NOT NULL,
  `adresses` varchar(255) NOT NULL,
  `date_naiss` date NOT NULL,
  `emails` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `cin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_personnel`
--

INSERT INTO `sen_personnel` (`id_personnel`, `prenom_noms`, `adresses`, `date_naiss`, `emails`, `profession`, `cin`) VALUES
(1, 'Abdoulaye GUEYE', 'Liberte 5', '2002-12-09', 'abdoulayegueye02@gmail.com', 'Chauffeur', '1 751 1980 052136'),
(2, 'Mamadou BARRY', 'Hlm nimzatt ', '2006-03-02', 'barry06@gmail.com', 'Chauffeur', '1 254 2006 054125');

-- --------------------------------------------------------

--
-- Structure de la table `sen_profil`
--

CREATE TABLE `sen_profil` (
  `id_profil` int(11) NOT NULL,
  `Profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_profil`
--

INSERT INTO `sen_profil` (`id_profil`, `Profil`) VALUES
(1, 'ADMINISTRATEUR'),
(2, 'DISPATCHEUR'),
(3, 'UTILISATEUR SIMPLE');

-- --------------------------------------------------------

--
-- Structure de la table `sen_tarif`
--

CREATE TABLE `sen_tarif` (
  `idTarif` int(11) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `NombrePlaces` varchar(255) NOT NULL,
  `PrixAllerSimple` int(11) NOT NULL,
  `PrixAllerRetour` int(11) NOT NULL,
  `observations` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_tarif`
--

INSERT INTO `sen_tarif` (`idTarif`, `destination`, `NombrePlaces`, `PrixAllerSimple`, `PrixAllerRetour`, `observations`) VALUES
(1, 'DAKAR - AIDB', '1 a  2', 25000, 45000, ''),
(2, 'DAKAR - AIDB', '1 a  2', 25000, 45000, ''),
(3, 'DAKAR - AIDB', '1 a  2', 25000, 45000, ''),
(4, 'MBOUR - AIDB', '1 a  2', 25000, 0, ''),
(5, 'MBOUR - DAKAR', '1 a  2', 35000, 0, ''),
(6, 'DAKAR - MBOUR', '1 a  2', 35000, 0, ''),
(7, 'DAKAR - ST LOUIS', '1 a  2', 115000, 0, ''),
(8, 'LOCATION JOURNEE', '1 a  2', 65000, 0, 'avec chauffeur essence inclut Pour 100 K facturation est de 300 CFA le K apres 100 K '),
(9, 'FOUNDIOUNE - ILES DU SALOUM', '1 Ã  3', 140000, 0, 'Considere comme location a  la journee + 300 CFA le K soit environ 140.000 CFA');

-- --------------------------------------------------------

--
-- Structure de la table `sen_user`
--

CREATE TABLE `sen_user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `nom_afficher` text NOT NULL,
  `id_profil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_user`
--

INSERT INTO `sen_user` (`id_user`, `login`, `mdp`, `nom_afficher`, `id_profil`) VALUES
(1, 'joelbadji@gmail.com', '3dd1f3fc4369613008702e35615457a7', 'Moustapha ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sen_voitures`
--

CREATE TABLE `sen_voitures` (
  `id_voitures` int(11) NOT NULL,
  `Plaque` varchar(12) NOT NULL,
  `Marque` varchar(20) NOT NULL,
  `Modele` varchar(20) NOT NULL,
  `Annee` int(11) NOT NULL,
  `couleur` varchar(150) NOT NULL,
  `Cylindree` varchar(100) NOT NULL,
  `Transmission` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sen_voitures`
--

INSERT INTO `sen_voitures` (`id_voitures`, `Plaque`, `Marque`, `Modele`, `Annee`, `couleur`, `Cylindree`, `Transmission`, `photo`) VALUES
(0, 'Dk', 'Hyundai', 'Sonata', 2015, 'Bleu', '', 'Manuel', 'dist/img/sonata.jpg'),
(1, 'DK 22', 'Jeep', 'Grand Cherokee', 2018, 'Silver metalic', 'V6', 'Automatique', 'dist/img/jeep.jpg'),
(2, 'Dk', 'Chevrolet', 'Cruze', 2016, 'Blanche', '', 'Manuel', 'dist/img/cruze.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `zen_article`
--

CREATE TABLE `zen_article` (
  `id_article` int(11) NOT NULL,
  `type_article` int(11) NOT NULL,
  `longueur` int(11) NOT NULL,
  `couleur` char(255) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_categorie`
--

CREATE TABLE `zen_categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_client`
--

CREATE TABLE `zen_client` (
  `id_client` int(11) NOT NULL,
  `prenom_nom` varchar(255) DEFAULT NULL,
  `genre` varchar(5) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `adresse` char(255) DEFAULT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_client`
--

INSERT INTO `zen_client` (`id_client`, `prenom_nom`, `genre`, `telephone`, `adresse`, `id_societe`) VALUES
(1, 'TA BINTA', 'Femme', '77 632 97 64', NULL, 1),
(2, 'CHEIKH TIDIANE SARR MARRA', 'Homme', NULL, NULL, 1),
(3, 'MR SY ALIOUNE', 'Homme', '77 653 61 61', NULL, 1),
(4, 'MR DIALLO BACHIR', 'Homme', '77 606 52 84', NULL, 1),
(5, 'MR NDIAYE PA RAMA', 'Homme', NULL, NULL, 1),
(6, 'MR KANE YAYA', 'Homme', '78 135 69 70', NULL, 1),
(7, 'MR CISSE MAPENDA', 'Homme', '77 644 03 40', NULL, 1),
(8, 'MR MASSALY', 'Homme', '77 464 28 22', NULL, 1),
(9, 'MR SOW S/C BOBO', 'Homme', '77 449 85 96', NULL, 1),
(10, 'MR DEMBA', 'Homme', NULL, NULL, 1),
(11, 'MR BEYE PAPA', 'Homme', '77 857 45 24', NULL, 1),
(12, 'MR FALL BATHIE', 'Homme', '77 649 61 05', NULL, 1),
(13, 'MR DIOP ASSANE', 'Homme', '77 552 64 05', NULL, 1),
(14, 'MR SYLLA OUMAR', 'Homme', '77 423 88 98', NULL, 1),
(15, 'MR BA DJIBY', 'Homme', '77 436 60 21', NULL, 1),
(16, 'MR NGAIDO', 'Homme', '77 639 20 45', NULL, 1),
(17, 'MR GOUMBALA', 'Homme', '77 367 01 02', NULL, 1),
(18, 'MR DIAO MOUNTAGA', 'Homme', '77 860 76 76', NULL, 1),
(19, 'MR LO ABOU', 'Homme', '77 740 05 73', NULL, 1),
(20, 'MR DIONE MODOU', 'Homme', '77 649 43 00', NULL, 1),
(21, 'MME DIAGNE', 'Femme', '77 444 78 33', NULL, 1),
(22, 'PETIT GUEYE', 'Homme', '77 849 34 82', NULL, 1),
(23, 'MR DIOP S/C MME DIOP', 'Homme', NULL, NULL, 1),
(24, 'MR NDOYE', 'Homme', '77 636 22 35', NULL, 1),
(25, 'MR BA BAMBA', 'Homme', '77 279 06 37', NULL, 1),
(26, 'MR NIANG SERIGNE', 'Homme', '78 487 91 66', NULL, 1),
(27, 'MR SOW S/C BOBO', 'Homme', NULL, NULL, 1),
(28, 'MR KABA', 'Homme', NULL, NULL, 1),
(29, 'MR CADAN', 'Homme', '77 631 87 62', NULL, 1),
(30, 'MR WANE SADA', 'Homme', '76 253 21 63', NULL, 1),
(31, 'MR SOUMARE S/C MR DEMBELE', 'Homme', '77 661 48 58', NULL, 1),
(32, 'MR BA HADY', 'Homme', '77 508 02 35', NULL, 1),
(33, 'MR KANE', 'Homme', '77 135 69 70', NULL, 1),
(34, 'MR MBAYE AMADOU', 'Homme', '78 441 00 05', NULL, 1),
(35, 'MR DIONE ABDOULAYE', 'Homme', NULL, NULL, 1),
(36, 'MR SALL', 'Homme', NULL, NULL, 1),
(37, 'MR DIA MOUSTAPHA', 'Homme', '77 379 12 01', NULL, 1),
(38, 'MR BA FALY', 'Homme', NULL, NULL, 1),
(39, 'AISSATOU SAR', 'Femme', NULL, NULL, 1),
(40, 'MR SAMB ABOU', 'Homme', NULL, NULL, 1),
(41, 'MR WANE CHEIKH', 'Homme', NULL, NULL, 1),
(42, 'MR MBAYE KEBA', 'Homme', NULL, NULL, 1),
(43, 'MR SOW AMADOU', 'Homme', '78 631 18 54', NULL, 1),
(44, 'MME DIBA S/C MR DIAO', 'Femme', NULL, NULL, 1),
(45, 'MR DEMBA SEYDOU', 'Homme', NULL, NULL, 1),
(46, 'MR KOMA', 'Homme', '77 572 43 89', NULL, 1),
(47, 'PRESIDENT BOBO', 'Homme', NULL, NULL, 1),
(48, 'MR CISSE IBRAHIMA', 'Homme', '77 638 62 20', NULL, 1),
(49, 'MR DIOP MEDOUNE', 'Homme', '77 640 36 71', NULL, 1),
(50, 'MR DEMBELE', 'Homme', '77 725 86 79', NULL, 1),
(51, 'MR SIDO', 'Homme', '77 504 53 71', NULL, 1),
(52, 'MME TAPO AICHATOU', 'Femme', '22377522255', NULL, 1),
(53, 'BIRANE BA', 'Femme', '77 520 08 23', NULL, 1),
(54, 'MR DIABY', 'Homme', '77843 56 20', NULL, 1),
(55, 'MME CISSE GNIMA', 'Femme', '77 554 86 76', NULL, 1),
(56, 'MR DIOP RACINE', 'Homme', '77 444 10 48', NULL, 1),
(57, 'MME DIOP FAMA', 'Femme', '77 638 15 69', NULL, 1),
(58, 'MR BOCOUM', 'Homme', NULL, NULL, 1),
(59, 'MR WANE IBRAHIMA', 'Homme', NULL, NULL, 1),
(60, 'MME DIALLO RAMATOULAYE', 'Femme', NULL, NULL, 1),
(61, 'MR BITEYE IMAM', 'Homme', '77 644 44 47', NULL, 1),
(62, 'MR MAIGA', 'Homme', NULL, NULL, 1),
(63, 'PR KODJO', 'Homme', NULL, NULL, 1),
(64, 'SANAGO', 'Homme', NULL, NULL, 1),
(65, 'MR GUEYE DOUDOU', 'Homme', '77 216 16 92', NULL, 1),
(66, 'MR SADIO', 'Homme', '77 557 33 03', NULL, 1),
(67, 'MOUSSA S/C COUDY', 'Homme', NULL, NULL, 1),
(68, 'MR LY KHALIL', 'Homme', '77 492 54 34', NULL, 1),
(69, 'MR DIOP MOUHAMED', 'Homme', '778517037', NULL, 1),
(70, 'MME GUEYE AWA', 'Femme', '773335464', NULL, 1),
(71, 'MR DIOP S/C MOUHAMED BEYE', 'Homme', NULL, NULL, 1),
(72, 'MME AW MAREME', 'Femme', '77 518 79 79', NULL, 1),
(73, 'MME COUDY', 'Femme', NULL, NULL, 1),
(74, 'MR KANE ABOU', 'Homme', '77 548 31 63', NULL, 1),
(75, 'MR THIAM ABDOULAYE', 'Homme', NULL, NULL, 1),
(76, 'MR SARRE MOUHAMED', 'Homme', NULL, NULL, 1),
(77, 'MR DAOUDA S/C MME GUEYE', 'Homme', NULL, NULL, 1),
(78, 'MAMAN SOPHIE', 'Femme', NULL, NULL, 1),
(79, 'MARI RAISSA', 'Femme', NULL, NULL, 1),
(80, 'MR THIAM MOUHAMED', 'Homme', NULL, NULL, 1),
(81, 'MR CHEIKH OMAR', 'Homme', NULL, NULL, 1),
(82, 'MR COULIBALY', 'Homme', NULL, NULL, 1),
(83, 'RAISSA', 'Femme', NULL, NULL, 1),
(84, 'HAROUNA', 'Homme', NULL, NULL, 1),
(85, 'MME MAIGA', 'Femme', NULL, NULL, 1),
(86, 'ADJOINT', 'Homme', NULL, NULL, 1),
(87, 'MR LY FILS', 'Homme', NULL, NULL, 1),
(88, 'ALY', 'Homme', '22378858568', NULL, 1),
(89, 'MR BA THIERNO', 'Homme', NULL, NULL, 1),
(90, 'MR BILL', 'Homme', NULL, NULL, 1),
(91, 'MR MAME ALIOUNE', 'Homme', NULL, NULL, 1),
(92, 'MME SOW HAWA LY', 'Femme', '77 173 50 50', NULL, 1),
(93, 'MOUHAMED S/C COUDY', 'Homme', NULL, NULL, 1),
(94, 'MR TALL MOURTADA', 'Homme', NULL, NULL, 1),
(95, 'MR SARRE', 'Homme', NULL, NULL, 1),
(96, 'MR FOYET', 'Homme', '33661241526', NULL, 1),
(97, 'MR NIANG OMAR', 'Homme', '77 387 36 36', NULL, 1),
(98, 'MR GUISSE BOUNAMA', 'Homme', '77 644 90 25', NULL, 1),
(99, 'MR BEYE MOUHAMED', 'Homme', '77 569 19 82', NULL, 1),
(100, 'MR NDIAYE BABACAR', 'Homme', '77 455 56 56', NULL, 1),
(101, 'MR WILANE ASSANE', 'Homme', '77 665 10 43', NULL, 1),
(102, 'MR MANSOUR NIASS NDIAYE', 'Homme', '78 420 63 04', NULL, 1),
(103, 'MR DIOUF ALEXANDRE', 'Homme', '77 649 52 19', NULL, 1),
(104, 'MME SALL SOKHNA', 'Femme', '77 923 66 07', NULL, 1),
(105, 'MME SECK MARIAMA KEBE', 'Femme', '77 914 83 34', NULL, 1),
(106, 'MR CAMARA', 'Homme', '77 645 47 07', NULL, 1),
(107, 'MR SY INSA', 'Homme', NULL, NULL, 1),
(108, 'MR NIANG BADARA', 'Homme', '77 644 80 64', NULL, 1),
(109, 'MR SOW SALOUM', 'Homme', '77 437 32 32', NULL, 1),
(110, 'MR BA DJIBY', 'Homme', '78 635 79 03', NULL, 1),
(111, 'MR SOW ABDOU LAHAD', 'Homme', '77 515 77 77', NULL, 1),
(112, 'MR PAPE DJIBRIL GUEYE', 'Homme', '77 569 91 56', NULL, 1),
(113, 'MR NDIAYE MOMAR LISSA', 'Homme', '', NULL, 1),
(114, 'ZEYNAB S/C BOBO', 'Femme', '', NULL, 1),
(115, 'BOUBACAR YARA', 'Homme', '', NULL, 1),
(116, 'MR DOUGOURA', 'Homme', '', NULL, 1),
(117, 'MME KANE SAYDA', 'Femme', NULL, NULL, 1),
(118, 'MME MAIRAMA LY', 'Femme', '77 569 67 39', NULL, 1),
(119, 'MR LAMOTTE', 'Homme', '77 713 75 62', NULL, 1),
(120, 'MR FALL CHEIKH', 'Homme', '', NULL, 1),
(121, 'MR BERTHE', 'Homme', '', 'BAMAKO', 1),
(122, 'AICHA TAPO', 'Femme', '', 'BAMAKO', 1),
(123, 'MR MAIGA', 'Homme', '', 'BAMAKO', 1),
(124, 'MR MAIGA', 'Homme', '', 'BAMAKO', 1),
(125, 'SECKOU', 'Homme', '', 'BAMAKO', 1);

-- --------------------------------------------------------

--
-- Structure de la table `zen_detail_facture`
--

CREATE TABLE `zen_detail_facture` (
  `id_detail` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `nombre` int(11) NOT NULL,
  `montant` char(255) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_etat`
--

CREATE TABLE `zen_etat` (
  `id_etat` int(11) NOT NULL,
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_facturation`
--

CREATE TABLE `zen_facturation` (
  `id_facture` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_facture` int(11) NOT NULL,
  `id_societe` int(11) NOT NULL,
  `numero_facture` int(11) NOT NULL,
  `montant_facture` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_marquage`
--

CREATE TABLE `zen_marquage` (
  `prix` int(11) NOT NULL,
  `montant` int(11) NOT NULL,
  `date_broderie` int(11) NOT NULL,
  `date_couture` char(255) NOT NULL,
  `date_bouton` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_mesure`
--

CREATE TABLE `zen_mesure` (
  `id_mesure` int(11) NOT NULL,
  `genre` varchar(5) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `longueur` int(11) DEFAULT NULL,
  `longueurgrandboubou` int(11) DEFAULT NULL,
  `epaule` varchar(5) DEFAULT NULL,
  `cou` varchar(5) DEFAULT NULL,
  `manche` int(11) DEFAULT NULL,
  `taille` int(11) DEFAULT NULL,
  `taillemanche` varchar(5) DEFAULT NULL,
  `poignet` int(11) DEFAULT NULL,
  `longueurpantalon` int(11) DEFAULT NULL,
  `taillecou` int(11) DEFAULT NULL,
  `tourfess` int(11) DEFAULT NULL,
  `cuisse` int(11) DEFAULT NULL,
  `bas` int(11) DEFAULT NULL,
  `poitrine` varchar(5) DEFAULT NULL,
  `hanche` int(11) DEFAULT NULL,
  `pince` int(11) DEFAULT NULL,
  `blouse` int(11) DEFAULT NULL,
  `longueurjupe` int(11) DEFAULT NULL,
  `longueurrobe` varchar(7) DEFAULT NULL,
  `id_societe` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_mesure`
--

INSERT INTO `zen_mesure` (`id_mesure`, `genre`, `telephone`, `longueur`, `longueurgrandboubou`, `epaule`, `cou`, `manche`, `taille`, `taillemanche`, `poignet`, `longueurpantalon`, `taillecou`, `tourfess`, `cuisse`, `bas`, `poitrine`, `hanche`, `pince`, `blouse`, `longueurjupe`, `longueurrobe`, `id_societe`, `id_client`) VALUES
(1, 'Homme', NULL, 140, NULL, '52', '45', 60, NULL, NULL, NULL, 103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2),
(2, 'Homme', '77 653 61 61', 110, NULL, '47', '42', 66, 40, '15', NULL, 112, 108, 57, 71, 19, '58', NULL, NULL, NULL, NULL, NULL, 1, 3),
(3, 'Homme', '78 135 69 70', 95, NULL, '50', '44', 67, 41, '16', NULL, 114, NULL, 58, 62, 21, '60', NULL, NULL, NULL, NULL, NULL, 1, 6),
(4, 'Homme', '77 644 03 40', 152, NULL, '48', '47', 63, 42, '15', NULL, 103, 107, 61, 82, 21, '65', NULL, NULL, NULL, NULL, NULL, 1, 7),
(5, 'Homme', '77 464 28 22', 122, NULL, '51', '44', 67, 44, '17', NULL, 110, 110, 63, NULL, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 8),
(6, 'Homme', '77 449 85 96', 130, NULL, '50', '43', 65, 38, '14', NULL, 116, 100, 58, 70, 20, '60', NULL, NULL, NULL, NULL, NULL, 1, 9),
(7, 'Homme', NULL, 100, NULL, '47', '41', 62, NULL, NULL, NULL, 98, 104, 55, 66, 17, NULL, NULL, NULL, NULL, NULL, NULL, 1, 11),
(8, 'Homme', '77 857 45 24', 104, NULL, '49', '42', 64, 44, '14', NULL, 107, 99, 56, 65, 18, '63', NULL, NULL, NULL, NULL, NULL, 1, 12),
(9, 'Homme', '77 552 64 05', 76, NULL, '50', '40', 60, 35, '14', NULL, 104, 92, 56, 68, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 14),
(10, 'Homme', '77 423 88 98', 150, NULL, '50', '43', 60, 39, '15', NULL, NULL, 99, 56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 15),
(11, 'Homme', '77 639 20 45', 153, NULL, '50', '42', 60, 45, '18', NULL, 105, NULL, 63, NULL, 22, '66', NULL, NULL, NULL, NULL, NULL, 1, 20),
(12, 'Homme', '77 367 01 02', 125, NULL, '54', '44', 57, 43, '18', NULL, 105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 21),
(13, 'Femme', '77 444 78 33', 90, NULL, '46', '44', 45, 44, NULL, NULL, NULL, 93, NULL, NULL, NULL, NULL, 124, 32, NULL, 125, '107/165', 1, 26),
(14, 'Homme', '77 636 22 35', 120, NULL, '50', '45', 64, 40, '16', NULL, 110, 104, 50, 73, 19, '60', NULL, NULL, NULL, NULL, NULL, 1, 30),
(15, 'Homme', '77 279 06 37', 105, NULL, '51', '46', 58, 42, '17', NULL, 107, 110, 63, 85, 21, '65', NULL, NULL, NULL, NULL, NULL, 1, 31),
(16, 'Homme', NULL, 130, NULL, '50', '43', 65, 38, '14', NULL, 116, 100, 58, 70, 20, '60', NULL, NULL, NULL, NULL, NULL, 1, 33),
(17, 'Homme', NULL, 118, NULL, '55', '46', 66, 40, '15', NULL, 112, 95, 62, 73, 22, '63', NULL, NULL, NULL, NULL, NULL, 1, 34),
(18, 'Homme', '77 631 87 62', 107, NULL, '53', '43', 59, 41, '16', NULL, 105, NULL, 60, 72, 19, '69', NULL, NULL, NULL, NULL, NULL, 1, 35),
(19, 'Homme', '76 253 21 63', 110, NULL, '54', '46', 63, 46, '17', NULL, 113, 114, 65, 82, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 36),
(20, 'Homme', '77 661 48 58', 150, NULL, '51', '43', 62, 42, '16', NULL, 105, 110, 116, 75, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 38),
(21, 'Homme', '77 508 02 35', 100, NULL, '50', '42', 63, 36, '15', NULL, 103, 95, 54, 63, 17, '58', NULL, NULL, NULL, NULL, NULL, 1, 39),
(22, 'Homme', '77 135 69 70', 95, NULL, '50', '45', 67, 41, NULL, NULL, 114, NULL, 58, 62, 22, '60', NULL, NULL, NULL, NULL, NULL, 1, 41),
(23, 'Homme', NULL, 102, NULL, '49', '46', 64, 36, '13', NULL, 100, 98, 60, 68, 17, '55', NULL, NULL, NULL, NULL, NULL, 1, 43),
(24, 'Homme', NULL, 110, NULL, '48', '43', 66, 36, '15', NULL, 110, 103, 56, 70, 20, '58', NULL, NULL, NULL, NULL, NULL, 1, 44),
(25, 'Femme', NULL, NULL, NULL, '40', '45', 33, NULL, NULL, NULL, NULL, 89, NULL, NULL, NULL, '94/97', 104, 26, 60, 107, NULL, 1, 48),
(26, 'Homme', NULL, 120, NULL, '50', '46', 63, 46, '18', NULL, 111, 115, 65, NULL, 22, '70', NULL, NULL, NULL, NULL, NULL, 1, 49),
(27, 'Homme', '78 631 18 54', 100, NULL, '48', '44', 70, NULL, NULL, NULL, 113, 104, 58, 70, 18, '60', NULL, NULL, NULL, NULL, NULL, 1, 52),
(28, 'Femme', NULL, NULL, NULL, '44', '40', 45, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '97', 122, 29, 39, NULL, '150', 1, 53),
(29, 'Homme', NULL, 115, NULL, '47', '41', 62, NULL, NULL, NULL, 102, 104, 55, 66, 18, '60', NULL, NULL, NULL, NULL, NULL, 1, 54),
(30, 'Homme', '77 572 43 89', 100, NULL, '53', '44', 60, 42, '16', NULL, 102, 100, 58, 76, 19, '60', NULL, NULL, NULL, NULL, NULL, 1, 55),
(31, 'Homme', '77 638 62 20', 162, NULL, '53', '43', 66, 42, NULL, NULL, 111, 112, 62, 73, 20, '64', NULL, NULL, NULL, NULL, NULL, 1, 57),
(32, 'Homme', '77 725 86 79', 110, NULL, '46', '40', 60, 40, '15', NULL, 105, 86, 54, 66, 19, '57', NULL, NULL, NULL, NULL, NULL, 1, 59),
(33, 'Femme', '77 520 08 23', 80, NULL, '44', '38', 63, 31, '13', NULL, 103, 82, 49, 62, 15, '50', NULL, NULL, NULL, NULL, NULL, 1, 62),
(34, 'Homme', '77843 56 20', 125, NULL, '50', '43', 73, 40, NULL, NULL, 111, 97, 56, 67, NULL, '55', NULL, NULL, NULL, NULL, NULL, 1, 63),
(35, 'Femme', '77 554 86 76', NULL, NULL, '42', '44', 43, 45, '24', NULL, NULL, NULL, NULL, NULL, NULL, '111', 130, NULL, NULL, NULL, '142', 1, 64),
(36, 'Femme', NULL, NULL, NULL, '45', '46', 43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '103', NULL, NULL, NULL, NULL, '146', 1, 69),
(37, 'Homme', '77 644 44 47', 120, NULL, '51', '46', 61, 43, '18', NULL, 105, NULL, 65, NULL, 22, '70', NULL, NULL, NULL, NULL, NULL, 1, 70),
(38, 'Homme', NULL, 125, NULL, '53', '45', 65, NULL, '18', NULL, 112, NULL, 65, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, 1, 71),
(39, 'Homme', NULL, 100, NULL, '48', '42', 59, 39, '15', NULL, 100, 93, 56, 65, 20, '58', NULL, NULL, NULL, NULL, NULL, 1, 72),
(40, 'Homme', NULL, 145, NULL, '50', '43', 61, NULL, NULL, NULL, 103, NULL, 58, NULL, 21, '60', NULL, NULL, NULL, NULL, NULL, 1, 73),
(41, 'Homme', '77 557 33 03', 122, NULL, '51', '44', 67, 44, '17', NULL, 110, 110, 63, 75, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 75),
(42, 'Homme', NULL, 88, NULL, '44', '38', 60, 33, '13', NULL, 106, 73, 50, 60, 17, '52', NULL, NULL, NULL, NULL, NULL, 1, 76),
(43, 'Homme', '77 492 54 34', 90, NULL, '48', '43', 66, NULL, NULL, NULL, 110, NULL, 54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 77),
(44, 'Homme', '', 155, NULL, '53', '45', 65, NULL, NULL, NULL, 112, NULL, 65, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, 1, 17),
(45, 'Homme', '', 102, NULL, '51', '45', 61, 40, '15', NULL, 100, 105, 59, 75, 21, NULL, NULL, NULL, NULL, NULL, NULL, 1, 18),
(46, 'Homme', '', 115, NULL, '50', '42', 60, 35, '14', NULL, 111, 107, 58, 70, 19, '60', NULL, NULL, NULL, NULL, NULL, 1, 22),
(47, 'Femme', '', NULL, NULL, '39', '40', 40, 26, NULL, 25, NULL, NULL, NULL, NULL, NULL, '96', 107, 28, 39, NULL, '148', 1, 27),
(48, 'Femme', '', 145, NULL, '40', '40', 51, NULL, NULL, NULL, NULL, 82, NULL, 62, NULL, '92', 110, NULL, NULL, NULL, NULL, 1, 40),
(49, 'Homme', '78 487 91 66', 121, NULL, '54', '49', 65, 44, NULL, 15, 115, 102, 60, 76, 19, '63', NULL, NULL, NULL, NULL, NULL, 1, 32),
(50, 'Homme', '', 160, NULL, '50', '45', 70, NULL, '20', NULL, 117, NULL, 65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 37),
(51, 'Femme', '77522255', NULL, NULL, '40', '41', 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '93', 106, 30, 40, NULL, '158', 1, 61),
(52, 'Homme', '77 436 60 21', 95, NULL, '42', '36', 54, 33, '13', 17, 94, 85, 48, 62, 15, '58', NULL, NULL, NULL, NULL, NULL, 1, 19),
(53, 'Femme', '776329764', 147, NULL, '40', '40', 45, 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '104', 130, 30, 42, NULL, NULL, 1, 1),
(54, 'Homme', '77 379 12 01', 105, NULL, '49', '42', 62, 38, '15', 20, 108, 95, 55, 68, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 45),
(55, 'Homme', NULL, 70, NULL, '41', '34', 57, NULL, NULL, 20, 97, 71, 46, 52, 16, '50', NULL, NULL, NULL, NULL, NULL, 1, 47),
(56, 'Homme', NULL, 112, NULL, '50', '45', 66, NULL, NULL, 23, 112, 103, 60, 72, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 50),
(57, 'Homme', '77 504 53 71', 110, NULL, '52', '48', 66, 42, NULL, 23, 108, 102, 62, 75, 20, '63', NULL, NULL, NULL, NULL, NULL, 1, 60),
(58, 'Homme', NULL, 115, NULL, '46', '40', 62, NULL, NULL, 18, 106, 88, 100, NULL, 17, '58', NULL, NULL, NULL, NULL, NULL, 1, 68),
(59, 'Homme', NULL, 102, NULL, '47', '3', 61, 38, '14', NULL, 104, 92, 104, 58, 17, '55', NULL, NULL, NULL, NULL, NULL, 1, 67),
(60, 'Homme', '77 216 16 92', 102, NULL, '48', '43', 67, 37, NULL, 18, 110, 93, 55, 70, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 74),
(61, 'Homme', '77 740 05 73', 106, NULL, '46', '41', 61, 38, NULL, 19, 102, 95, 54, 60, 20, '58', NULL, NULL, NULL, NULL, NULL, 1, 24),
(62, 'Homme', '78 441 00 05', 73, NULL, '49', '43', 62, 38, NULL, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 42),
(63, 'Homme', NULL, 120, NULL, '50', '47', 68, 21, NULL, 24, 114, 113, 67, 40, 21, '66', NULL, NULL, NULL, NULL, NULL, 1, 29),
(64, 'Homme', '778517037', 115, NULL, '51', '46', 66, NULL, '18', NULL, 110, 108, 63, 78, 21, '65', NULL, NULL, NULL, NULL, NULL, 1, 78),
(65, 'Femme', '773335464', NULL, NULL, '40', '40', 40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '106', 120, 27, 40, NULL, '150', 1, 79),
(66, 'Homme', NULL, 149115, 173, '55', '45', 59, 27, NULL, NULL, 104, NULL, 72, 75, 23, '74', NULL, NULL, NULL, NULL, NULL, 1, 5),
(67, 'Homme', '77 649 43 00', 161116, NULL, '50', '46', 67, 44, '17', NULL, 109, 63, 67, 76, 23, '65', NULL, NULL, NULL, NULL, NULL, 1, 25),
(68, 'Homme', NULL, 164120, 196, '49', '43', 71, 46, '20', NULL, 113, NULL, 62, NULL, 22, '65', NULL, NULL, NULL, NULL, NULL, 1, 51),
(69, 'Homme', NULL, 80141, NULL, '48', '43', 58, NULL, NULL, NULL, 101, 100, 108, 62, NULL, '58', NULL, NULL, NULL, NULL, NULL, 1, 56),
(70, 'Femme', '77 638 15 69', NULL, NULL, '4073', '40', 73, NULL, NULL, 30, NULL, NULL, NULL, NULL, NULL, '102', 116, 27, 40, 112, '75146', 1, 66),
(71, 'Homme', '77 444 10 48', 120157, 188, '52', '44', 67, 40, '15', NULL, 108, 108, 58, 70, 20, '60', NULL, NULL, NULL, NULL, NULL, 1, 65),
(72, 'Homme', '77 649 61 05', 153110, NULL, '51', '43', 65, 42, '17', 23, 107, 107, 59, 70, 20, '61', NULL, NULL, NULL, NULL, NULL, 1, 13),
(73, 'Homme', '77 860 76 76', 110100, NULL, '48', '43', 60, 37, NULL, 21, 103, 100, 55, 65, NULL, '56', NULL, NULL, NULL, NULL, NULL, 1, 23),
(74, 'Homme', '77 640 36 71', 156120, NULL, '50', '42', 65, 42, '16', 21, 110, 111, 60, 75, 20, '62', NULL, NULL, NULL, NULL, NULL, 1, 58),
(75, 'Homme', '77 849 34 82', 106130, NULL, '55', '49', 68, 42, NULL, 27, 115, NULL, NULL, 80, NULL, '61', NULL, NULL, NULL, NULL, NULL, 1, 28),
(76, 'Homme', '', 148158, NULL, '50', '42', 59, NULL, NULL, 24, 104, NULL, 63, NULL, 21, '70', NULL, NULL, NULL, NULL, NULL, 1, 46),
(77, 'Homme', NULL, 115, NULL, '53', '43', 65, 40, '15', NULL, 106, 98, 60, 72, 20, '63', NULL, NULL, NULL, NULL, '157', 1, 80),
(78, 'Femme', '77 518 79 79', NULL, NULL, '43', '44', 40, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '140', 124, 29, 40, NULL, NULL, 1, 81),
(79, 'Femme', NULL, NULL, NULL, '40', '40', 30, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '95', 109, 27, 40, NULL, '145', 1, 82),
(80, 'Homme', NULL, 110, NULL, '53', '44', 66, 43, '15', NULL, 107, 120, 63, 77, 20, '65', NULL, NULL, NULL, NULL, NULL, 1, 84),
(81, 'Homme', NULL, 124, NULL, '41', '32', 50, 32, '18', NULL, 91, 79, 45, 53, NULL, '47', NULL, NULL, NULL, NULL, NULL, 1, 85),
(82, 'Femme', NULL, NULL, NULL, '42', '42', 47, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '108', 125, NULL, NULL, NULL, '145', 1, 87),
(83, 'Femme', NULL, 115, NULL, '48', '44', 65, 40, '14', NULL, 105, 96, 57, 70, 19, '60', NULL, NULL, NULL, NULL, NULL, 1, 88),
(84, 'Homme', NULL, 125, NULL, '42', '32', 52, 29, '12', NULL, 92, 76, 44, 56, 15, '45', NULL, NULL, NULL, NULL, NULL, 1, 89),
(85, 'Homme', NULL, 97, NULL, '43', '39', 61, 30, '13', NULL, 110, 80, 50, 59, 17, '57', NULL, NULL, NULL, NULL, NULL, 1, 90),
(86, 'Homme', NULL, 125, NULL, '53', '45', 62, NULL, NULL, NULL, 113, NULL, 63, NULL, 20, '63', NULL, NULL, NULL, NULL, NULL, 1, 91),
(87, 'Femme', NULL, NULL, NULL, '42', '40', 42, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '98', 117, NULL, NULL, 106, '60', 1, 92),
(88, 'Homme', NULL, 148, 170, '47', '41', 62, NULL, '14', NULL, 107, NULL, 56, NULL, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 93),
(89, 'Femme', NULL, 140, NULL, '50', '43', 58, NULL, '17', NULL, 102, NULL, 60, 73, 19, '62', NULL, NULL, NULL, NULL, NULL, 1, 94),
(90, 'Homme', NULL, 150, NULL, '50', '42', 57, NULL, '16', NULL, 107, NULL, 57, NULL, NULL, '60', NULL, NULL, NULL, NULL, NULL, 1, 95),
(91, 'Homme', NULL, 150, NULL, '55', '50', 63, NULL, '17', NULL, 106, 120, 68, 80, 22, '72', NULL, NULL, NULL, NULL, NULL, 1, 96),
(92, 'Homme', '22378858568', 85, NULL, '49', '43', 62, 40, '15', NULL, 103, 108, 57, 72, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 97),
(93, 'Homme', NULL, 150, NULL, '48', '44', 62, 42, '15', NULL, 101, 96, 58, NULL, 20, '60', NULL, NULL, NULL, NULL, NULL, 1, 98),
(94, 'Homme', NULL, 153, NULL, '47', '44', 61, NULL, NULL, NULL, 107, NULL, 59, 73, 21, '62', NULL, NULL, NULL, NULL, NULL, 1, 99),
(95, 'Femme', '77 173 50 50', NULL, NULL, '45', '43', 53, 40, NULL, NULL, NULL, 100, NULL, NULL, NULL, '103', 120, 29, 40, 115, '75', 1, 101),
(96, 'Homme', NULL, 101, NULL, '47', '43', 71, 38, '14', NULL, 108, 58, 57, 70, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 102),
(97, 'Homme', NULL, 100, NULL, '49', '39', 64, 33, '13', NULL, 115, 79, 55, 60, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 103),
(98, 'Homme', '77 387 36 36', 128, NULL, '54', '45', 72, NULL, NULL, NULL, 114, 106, 60, 70, 20, '60', NULL, NULL, NULL, NULL, NULL, 1, 106),
(99, 'Homme', '77 455 56 56', 121, NULL, '54', '45', 64, 41, NULL, NULL, 106, 98, 59, 72, 18, '61', NULL, NULL, NULL, NULL, NULL, 1, 109),
(100, 'Homme', '77 665 10 43', 104, NULL, '49', '43', 59, NULL, NULL, NULL, 101, 48, 53, 65, 17, '58', NULL, NULL, NULL, NULL, NULL, 1, 110),
(101, 'Homme', '77 649 52 19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 112),
(102, 'Femme', '77 923 66 07', NULL, 163, '44', '40', 63, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', 110, 26, 43, NULL, '65', 1, 113),
(103, 'Femme', '77 914 83 34', NULL, NULL, '39', '43', 54, 39, '38', NULL, NULL, NULL, NULL, NULL, NULL, '95', 112, 25, 37, NULL, '143', 1, 114),
(104, 'Femme', NULL, 130, NULL, '44', '40', 60, 39, NULL, NULL, NULL, NULL, NULL, 71, 20, '102', 77, 26, 38, NULL, NULL, 1, 122),
(105, 'Femme', '77 569 67 39', 150, 83, NULL, '39', NULL, NULL, NULL, NULL, NULL, 100, NULL, NULL, NULL, NULL, 121, NULL, NULL, 111, NULL, 1, 123),
(106, 'Homme', '', 155, NULL, '53', '45', 65, NULL, NULL, NULL, 112, NULL, 65, NULL, NULL, '70', NULL, NULL, NULL, NULL, NULL, 1, 10),
(107, 'Homme', '', 147, NULL, '50', '43', 58, NULL, '16/18', NULL, 102, NULL, 60, 73, 21, '63/65', NULL, NULL, NULL, NULL, NULL, 1, 16),
(108, 'Homme', NULL, 97, NULL, '47', '40', 64, 33, NULL, 22, 105, 85, 51, 62, 18, '55', NULL, NULL, NULL, NULL, NULL, 1, 86),
(109, 'Homme', NULL, 100, NULL, '50', '41', 65, 39, NULL, 22, 109, 96, 56, 72, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 100),
(110, 'Homme', '33661241526', 102, NULL, '52', '44', 66, 44, NULL, 23, 103, 109, 64, 75, 21, NULL, NULL, NULL, NULL, NULL, NULL, 1, 105),
(111, 'Homme', '77 644 90 25', 113, NULL, '54', '43', 64, 42, NULL, 21, 114, 52, 57, 70, 17, '58', NULL, NULL, NULL, NULL, NULL, 1, 107),
(112, 'Homme', '78 420 63 04', 114, NULL, '55', '46', 65, 40, NULL, 22, 106, NULL, 59, 69, 18, '63', NULL, NULL, NULL, NULL, NULL, 1, 111),
(113, 'Homme', '77 644 80 64', 95, NULL, '48', '44', 62, 37, NULL, 21, 104, 87, 55, 68, 18, '58', NULL, NULL, NULL, NULL, NULL, 1, 117),
(114, 'Homme', '77 606 52 84', 161100, NULL, '46', '42', 66, 37, NULL, NULL, 111, 81, 55, 61, 18, '60', NULL, NULL, NULL, NULL, NULL, 1, 4),
(115, 'Homme', '77 548 31 63', 160120, NULL, '51', '43', 65, 43, '18/17', NULL, 107, 104, 60, 73, 20, '6361', NULL, NULL, NULL, NULL, NULL, 1, 83),
(116, 'Homme', NULL, 116112, NULL, '50', '41', 67, 39, NULL, 22, 110, 52, 58, 66, 17, '58', NULL, NULL, NULL, NULL, NULL, 1, 116),
(117, 'Homme', '77 569 19 82', 15812080, NULL, '50', '45', 65, 44, '17', NULL, 107, 108, 63, 80, 19, '65', NULL, NULL, NULL, NULL, NULL, 1, 108),
(118, 'Homme', '77 645 47 07', 120153, NULL, '45', '46', 65, 44, '15', NULL, 106, 50, 55, 67, 19, '58', NULL, NULL, NULL, NULL, NULL, 1, 115),
(119, 'Homme', '77 437 32 32', 125165, NULL, '49', '4443', 63, NULL, NULL, NULL, 112, 101, 60, 72, 20, '63', NULL, NULL, NULL, NULL, NULL, 1, 118),
(120, 'Homme', '', 157115, NULL, '54', '47', 67, 44, '16/18', NULL, 111, 107, 65, 82, 20, '62/60', NULL, NULL, NULL, NULL, NULL, 1, 125),
(121, 'Homme', NULL, 147116, 170, '48', '42', 62, NULL, NULL, 21, 109, 106, 112, 67, 20, '115', NULL, NULL, NULL, NULL, NULL, 1, 104),
(122, 'Homme', '78 635 79 03', 100130178, NULL, '52', NULL, 65, 46, '15', 22, NULL, 104, NULL, NULL, NULL, '65', NULL, NULL, NULL, NULL, NULL, 1, 119),
(123, 'Homme', '77 515 77 77', 110163, NULL, '52', '45', 61, 41, '15', 24, 110, 105, 63, 74, 20, '63', NULL, NULL, NULL, NULL, NULL, 1, 120),
(124, 'Homme', '77 569 91 56', 85115153, NULL, '45', '39', 64, 37, '14', 19, 110, 87, 103, 67, 18, '50', NULL, NULL, NULL, NULL, NULL, 1, 121),
(125, 'Homme', '77 713 75 62', 105120150, NULL, '47', '40', 63, 38, '15', 22, 105, 98, 56, 69, 18, '56', NULL, NULL, NULL, NULL, NULL, 1, 124);

-- --------------------------------------------------------

--
-- Structure de la table `zen_profil`
--

CREATE TABLE `zen_profil` (
  `id_profil` int(11) NOT NULL,
  `nomprofil` char(255) NOT NULL,
  `id_societe` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_profil`
--

INSERT INTO `zen_profil` (`id_profil`, `nomprofil`, `id_societe`) VALUES
(1, 'Administrateur', 1),
(2, 'Superviseur', 1),
(3, 'Vendeur(se)', 1);

-- --------------------------------------------------------

--
-- Structure de la table `zen_societé`
--

CREATE TABLE `zen_societé` (
  `id_societe` int(11) NOT NULL,
  `nom` char(255) NOT NULL,
  `adresse` char(255) NOT NULL,
  `logo` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_societé`
--

INSERT INTO `zen_societé` (`id_societe`, `nom`, `adresse`, `logo`) VALUES
(1, 'Zinira Couture', 'Sacre coeur 771444747', '');

-- --------------------------------------------------------

--
-- Structure de la table `zen_status`
--

CREATE TABLE `zen_status` (
  `id_status` int(11) NOT NULL,
  `solde` char(255) NOT NULL,
  `acompte` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_tailleur`
--

CREATE TABLE `zen_tailleur` (
  `id_tailleur` int(11) NOT NULL,
  `nom` char(255) NOT NULL,
  `prenom` char(255) NOT NULL,
  `id_type_tailleur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_tarification`
--

CREATE TABLE `zen_tarification` (
  `id_tarif` int(11) NOT NULL,
  `id_type_tailleur` int(11) NOT NULL,
  `tarif` char(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `zen_type_tailleur`
--

CREATE TABLE `zen_type_tailleur` (
  `id_type_tailleur` int(11) NOT NULL,
  `type_tailleur` char(255) NOT NULL,
  `id_societe` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_type_tailleur`
--

INSERT INTO `zen_type_tailleur` (`id_type_tailleur`, `type_tailleur`, `id_societe`) VALUES
(1, 'Brodeur', 1),
(2, 'Tailleur simple', 1),
(3, 'Boutonnier', 1);

-- --------------------------------------------------------

--
-- Structure de la table `zen_type_tenue`
--

CREATE TABLE `zen_type_tenue` (
  `id_tenue` int(11) NOT NULL,
  `type_tenue` char(255) DEFAULT NULL,
  `id_societe` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_type_tenue`
--

INSERT INTO `zen_type_tenue` (`id_tenue`, `type_tenue`, `id_societe`) VALUES
(1, 'Grand boubou', 1),
(2, 'Demi saison', 1),
(3, 'Taille basse', 1),
(4, 'Tenue africaine', 1),
(5, 'Robe', 1);

-- --------------------------------------------------------

--
-- Structure de la table `zen_user`
--

CREATE TABLE `zen_user` (
  `id_user` int(11) NOT NULL,
  `login` char(255) NOT NULL,
  `password` char(100) NOT NULL,
  `id_societe` int(11) NOT NULL,
  `id_profil` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `zen_user`
--

INSERT INTO `zen_user` (`id_user`, `login`, `password`, `id_societe`, `id_profil`) VALUES
(1, 'aminata', 'cloud@2021', 1, 1),
(2, 'biram', 'ziniga@2020', 1, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `sen_client`
--
ALTER TABLE `sen_client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `sen_locations`
--
ALTER TABLE `sen_locations`
  ADD PRIMARY KEY (`IdLocation`),
  ADD KEY `FK_locations_Voitures` (`Plaque`);

--
-- Index pour la table `sen_personnel`
--
ALTER TABLE `sen_personnel`
  ADD PRIMARY KEY (`id_personnel`);

--
-- Index pour la table `sen_profil`
--
ALTER TABLE `sen_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Index pour la table `sen_tarif`
--
ALTER TABLE `sen_tarif`
  ADD PRIMARY KEY (`idTarif`);

--
-- Index pour la table `sen_user`
--
ALTER TABLE `sen_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `sen_voitures`
--
ALTER TABLE `sen_voitures`
  ADD PRIMARY KEY (`id_voitures`),
  ADD UNIQUE KEY `id_voitures` (`id_voitures`);

--
-- Index pour la table `zen_article`
--
ALTER TABLE `zen_article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `zen_categorie`
--
ALTER TABLE `zen_categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `zen_client`
--
ALTER TABLE `zen_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `zen_mesure`
--
ALTER TABLE `zen_mesure`
  ADD PRIMARY KEY (`id_mesure`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sen_client`
--
ALTER TABLE `sen_client`
  MODIFY `IdClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sen_locations`
--
ALTER TABLE `sen_locations`
  MODIFY `IdLocation` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sen_personnel`
--
ALTER TABLE `sen_personnel`
  MODIFY `id_personnel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sen_profil`
--
ALTER TABLE `sen_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sen_tarif`
--
ALTER TABLE `sen_tarif`
  MODIFY `idTarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `sen_user`
--
ALTER TABLE `sen_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `zen_client`
--
ALTER TABLE `zen_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT pour la table `zen_mesure`
--
ALTER TABLE `zen_mesure`
  MODIFY `id_mesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
