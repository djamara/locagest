-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.1.38-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour locagest_new
CREATE DATABASE IF NOT EXISTS `locagest_new` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `locagest_new`;

-- Listage de la structure de la table locagest_new. bien
CREATE TABLE IF NOT EXISTS `bien` (
  `idbien` int(11) NOT NULL AUTO_INCREMENT,
  `bienLibelle` varchar(100) DEFAULT NULL,
  `bienLocalisation` varchar(45) DEFAULT NULL,
  `bienDateCreation` date DEFAULT NULL,
  `bienNomProprietaire` varchar(150) DEFAULT NULL,
  `Personne_idPersonne` int(11) NOT NULL,
  `TypeBien_idTypeBien` int(11) NOT NULL,
  `Immeubles_idImmeubles` int(11) DEFAULT NULL,
  `feuilleCadastrale` varchar(150) DEFAULT NULL,
  `parcelleCadastrale` varchar(150) DEFAULT NULL,
  `categorieCadastrale` varchar(150) DEFAULT NULL,
  `valeurLocataiveCadastrale` varchar(150) DEFAULT NULL,
  `lot` varchar(150) DEFAULT NULL,
  `millieme` varchar(150) DEFAULT NULL,
  `parking` varchar(150) DEFAULT NULL,
  `autresDependance` varchar(150) DEFAULT NULL,
  `cave` varchar(150) DEFAULT NULL,
  `typeLocation` varchar(50) DEFAULT NULL,
  `loyerHC` decimal(10,0) DEFAULT NULL,
  `charges` decimal(10,0) DEFAULT NULL,
  `taxeHabitation` varchar(50) DEFAULT NULL,
  `taxeFonciere` varchar(50) DEFAULT NULL,
  `dateAcquisition` date DEFAULT NULL,
  `prixAcquisition` decimal(10,0) DEFAULT NULL,
  `fraisAcquisition` decimal(10,0) DEFAULT NULL,
  `nomCentreiImpot` varchar(50) DEFAULT NULL,
  `adresse1CentreImpot` varchar(50) DEFAULT NULL,
  `adresse2CentreImpot` varchar(50) DEFAULT NULL,
  `codePostale` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `description` text,
  `notes` text,
  `libAssurance` text,
  `dateSouscriptionAssurance` date DEFAULT NULL,
  `dateEcheanceAssurance` date DEFAULT NULL,
  `nbChambre` int(11) DEFAULT NULL,
  `nbSalleBain` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbien`,`Personne_idPersonne`,`TypeBien_idTypeBien`),
  KEY `fk_bien_Personne_idx` (`Personne_idPersonne`),
  KEY `fk_bien_TypeBien1_idx` (`TypeBien_idTypeBien`),
  KEY `fk_bien_Immeubles1_idx` (`Immeubles_idImmeubles`),
  CONSTRAINT `fk_bien_Immeubles1` FOREIGN KEY (`Immeubles_idImmeubles`) REFERENCES `immeubles` (`idImmeubles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_Personne` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_TypeBien1` FOREIGN KEY (`TypeBien_idTypeBien`) REFERENCES `typebien` (`idTypeBien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien : ~7 rows (environ)
/*!40000 ALTER TABLE `bien` DISABLE KEYS */;
REPLACE INTO `bien` (`idbien`, `bienLibelle`, `bienLocalisation`, `bienDateCreation`, `bienNomProprietaire`, `Personne_idPersonne`, `TypeBien_idTypeBien`, `Immeubles_idImmeubles`, `feuilleCadastrale`, `parcelleCadastrale`, `categorieCadastrale`, `valeurLocataiveCadastrale`, `lot`, `millieme`, `parking`, `autresDependance`, `cave`, `typeLocation`, `loyerHC`, `charges`, `taxeHabitation`, `taxeFonciere`, `dateAcquisition`, `prixAcquisition`, `fraisAcquisition`, `nomCentreiImpot`, `adresse1CentreImpot`, `adresse2CentreImpot`, `codePostale`, `ville`, `description`, `notes`, `libAssurance`, `dateSouscriptionAssurance`, `dateEcheanceAssurance`, `nbChambre`, `nbSalleBain`) VALUES
	(13, 'Villa 3 pièces', 'Cocody Angré', '2015-10-05', 'ETOUMI Aristide', 21, 5, 1, 'Feuille', 'Parcelle', 'catégorie', NULL, '245', '150', '5', NULL, 'Inexistant', NULL, 25000, 15000, '5000', '1500', '2015-11-10', 150000, 100000, 'Centre Impot', 'Plateau', 'Cocody', '0025', 'Abidjan', 'Petite description', 'Rien à signaler', 'Assurance maladie universelle', '2017-07-06', '2027-07-05', NULL, NULL),
	(14, 'Appart BLESSING OF GOD', 'Cocody riviera', '2019-03-05', 'Djamara Edjuhe Cyrille', 23, 1, 1, '', '', '', NULL, '', '', 'parking sous terrain', NULL, '', NULL, 170000, 0, '', '', '0000-00-00', 0, 0, '', '', '', '01 BP 1346 ABJ 01', '', '', '', 'ASSURANCE INCENDIE', '2019-03-01', '2019-03-31', NULL, NULL),
	(15, 'Atelier dieng', 'Plateau rue longchamp', '2019-03-13', 'Djamara Edjuhe Cyrille', 23, 2, NULL, '', '', '', NULL, '', '', '', NULL, '', 'Meublée', 2500000, 0, '', '', '2019-03-13', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
	(16, 'ange rachelle', 'Cocody riviera 5', '2019-03-07', 'william break', 25, 1, 8, '', '', '', NULL, '', '', '', NULL, '', '', 1700000, 0, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
	(17, 'New Bien', 'Port-Bouet', '2019-03-14', 'ETOUMI Aristide', 21, 1, NULL, '1', '1', '1', NULL, '1', '1', '1', NULL, '1', 'Vide', 180000, 60000, '1', '1', '2017-08-10', 10000, 5000, 'Centre new', 'vridi', 'vridi', '0025', 'Abidjan', 'RAS', 'RAS', 'Incendie', '2014-06-15', '2024-06-15', NULL, NULL),
	(18, 'LES RESIDENCES KAREN Appartement 1', 'Koumassi en face du Camp Commando', '2017-07-05', 'ETOUMI Aristide', 21, 1, 2, '', '', '', NULL, '', '', '', NULL, '', 'Vide', 70000, 50000, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL),
	(19, 'LES RESIDENCES KAREN Appartement 2', 'Koumassi en face du Camp Commando', '2017-07-05', 'ETOUMI Aristide', 21, 1, 2, '', '', '', NULL, '', '', '', NULL, '', 'Vide', 80000, 50000, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL);
/*!40000 ALTER TABLE `bien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. bien_has_caracteristiquesbiens
CREATE TABLE IF NOT EXISTS `bien_has_caracteristiquesbiens` (
  `bien_idbien` int(11) NOT NULL,
  `bien_Personne_idPersonne` int(11) NOT NULL,
  `bien_TypeBien_idTypeBien` int(11) NOT NULL,
  `CaracteristiquesBiens_idCaracteristiquesBiens` int(11) NOT NULL,
  PRIMARY KEY (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`,`CaracteristiquesBiens_idCaracteristiquesBiens`),
  KEY `fk_bien_has_CaracteristiquesBiens_CaracteristiquesBiens1_idx` (`CaracteristiquesBiens_idCaracteristiquesBiens`),
  KEY `fk_bien_has_CaracteristiquesBiens_bien1_idx` (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`),
  CONSTRAINT `fk_bien_has_CaracteristiquesBiens_CaracteristiquesBiens1` FOREIGN KEY (`CaracteristiquesBiens_idCaracteristiquesBiens`) REFERENCES `caracteristiquesbiens` (`idCaracteristiquesBiens`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_has_CaracteristiquesBiens_bien1` FOREIGN KEY (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`) REFERENCES `bien` (`idbien`, `Personne_idPersonne`, `TypeBien_idTypeBien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien_has_caracteristiquesbiens : ~21 rows (environ)
/*!40000 ALTER TABLE `bien_has_caracteristiquesbiens` DISABLE KEYS */;
REPLACE INTO `bien_has_caracteristiquesbiens` (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`, `CaracteristiquesBiens_idCaracteristiquesBiens`) VALUES
	(13, 21, 5, 2),
	(13, 21, 5, 3),
	(13, 21, 5, 9),
	(13, 21, 5, 10),
	(14, 23, 1, 2),
	(14, 23, 1, 7),
	(14, 23, 1, 8),
	(15, 23, 2, 2),
	(15, 23, 2, 7),
	(16, 25, 1, 3),
	(16, 25, 1, 4),
	(16, 25, 1, 5),
	(16, 25, 1, 6),
	(16, 25, 1, 7),
	(17, 21, 1, 2),
	(17, 21, 1, 7),
	(17, 21, 1, 10),
	(18, 21, 1, 2),
	(18, 21, 1, 7),
	(19, 21, 1, 2),
	(19, 21, 1, 7);
/*!40000 ALTER TABLE `bien_has_caracteristiquesbiens` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. bien_has_pieces
CREATE TABLE IF NOT EXISTS `bien_has_pieces` (
  `bien_idbien` int(11) NOT NULL,
  `bien_Personne_idPersonne` int(11) NOT NULL,
  `bien_TypeBien_idTypeBien` int(11) NOT NULL,
  `Pieces_idPieces` int(11) NOT NULL,
  `NombrePiece` int(11) DEFAULT NULL,
  `superficiePiece` int(11) DEFAULT NULL,
  `DateAjoutPiece` date DEFAULT NULL,
  PRIMARY KEY (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`,`Pieces_idPieces`),
  KEY `fk_bien_has_Pieces_Pieces1_idx` (`Pieces_idPieces`),
  KEY `fk_bien_has_Pieces_bien1_idx` (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`),
  CONSTRAINT `fk_bien_has_Pieces_Pieces1` FOREIGN KEY (`Pieces_idPieces`) REFERENCES `pieces` (`idPieces`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_has_Pieces_bien1` FOREIGN KEY (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`) REFERENCES `bien` (`idbien`, `Personne_idPersonne`, `TypeBien_idTypeBien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien_has_pieces : ~7 rows (environ)
/*!40000 ALTER TABLE `bien_has_pieces` DISABLE KEYS */;
REPLACE INTO `bien_has_pieces` (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`, `Pieces_idPieces`, `NombrePiece`, `superficiePiece`, `DateAjoutPiece`) VALUES
	(13, 21, 5, 4, 2, 600, '2019-02-16'),
	(14, 23, 1, 6, 3, 15, NULL),
	(15, 23, 2, 4, 2, 36, '2019-03-16'),
	(16, 25, 1, 6, 3, 425, '2019-03-21'),
	(17, 21, 1, 8, 4, 350, NULL),
	(18, 21, 1, 6, 3, 500, NULL),
	(19, 21, 1, 4, 2, 650, NULL);
/*!40000 ALTER TABLE `bien_has_pieces` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. caracteristiquesbiens
CREATE TABLE IF NOT EXISTS `caracteristiquesbiens` (
  `idCaracteristiquesBiens` int(11) NOT NULL AUTO_INCREMENT,
  `CaracteristiquesLibelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristiquesBiens`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.caracteristiquesbiens : ~10 rows (environ)
/*!40000 ALTER TABLE `caracteristiquesbiens` DISABLE KEYS */;
REPLACE INTO `caracteristiquesbiens` (`idCaracteristiquesBiens`, `CaracteristiquesLibelle`) VALUES
	(1, 'Accès Internet'),
	(2, 'Garage'),
	(3, 'Piscine'),
	(4, 'Espace vert'),
	(5, 'Club de sport'),
	(6, 'Cave'),
	(7, 'Terrasse'),
	(8, 'Gardien'),
	(9, 'Jardin'),
	(10, 'Aire de jeux');
/*!40000 ALTER TABLE `caracteristiquesbiens` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. compteloyer
CREATE TABLE IF NOT EXISTS `compteloyer` (
  `idloyer` int(11) NOT NULL AUTO_INCREMENT,
  `Loyer_dateDebutPeriode` date DEFAULT NULL,
  `Loyer_dateFinPeriode` date DEFAULT NULL,
  `Loyer_datePaiement` datetime DEFAULT CURRENT_TIMESTAMP,
  `Loyer_MontantVerse` bigint(11) DEFAULT NULL,
  `moisannee_idMois` int(11) NOT NULL,
  `Loyer_NumCheque` varchar(100) DEFAULT NULL,
  `idlocation` int(11) NOT NULL,
  `typepaiement_idTypePaiement` int(11) NOT NULL,
  PRIMARY KEY (`idloyer`),
  KEY `fk_Compteloyer_personne_loue_bien1_idx` (`idlocation`),
  KEY `fk_Compteloyer_typepaiement1_idx` (`typepaiement_idTypePaiement`),
  KEY `fk_Compteloyer_moisannee1_idx` (`moisannee_idMois`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.compteloyer : ~22 rows (environ)
/*!40000 ALTER TABLE `compteloyer` DISABLE KEYS */;
REPLACE INTO `compteloyer` (`idloyer`, `Loyer_dateDebutPeriode`, `Loyer_dateFinPeriode`, `Loyer_datePaiement`, `Loyer_MontantVerse`, `moisannee_idMois`, `Loyer_NumCheque`, `idlocation`, `typepaiement_idTypePaiement`) VALUES
	(1, '2019-03-04', '2019-04-03', '2019-03-04 00:00:00', 170000, 4, NULL, 3, 1),
	(2, '2016-02-05', '2016-03-06', '2019-04-25 13:56:09', 340000, 2, NULL, 3, 1),
	(3, '2016-03-05', '2016-04-04', '2019-04-25 13:56:09', 340000, 3, NULL, 3, 1),
	(4, '2016-02-05', '2016-03-06', '2019-04-25 13:58:08', 1020000, 2, NULL, 3, 1),
	(5, '2016-03-05', '2016-04-04', '2019-04-25 13:58:08', 1020000, 3, NULL, 3, 1),
	(6, '2016-04-05', '2016-05-05', '2019-04-25 13:58:08', 1020000, 4, NULL, 3, 1),
	(7, '2016-05-05', '2016-06-04', '2019-04-25 13:58:08', 1020000, 5, NULL, 3, 1),
	(8, '2016-06-05', '2016-07-05', '2019-04-25 13:58:08', 1020000, 6, NULL, 3, 1),
	(9, '2016-07-05', '2016-08-04', '2019-04-25 13:58:08', 1020000, 7, NULL, 3, 1),
	(10, '2019-01-01', '2019-01-31', '2019-04-30 18:44:54', 2500000, 1, NULL, 4, 1),
	(11, '2019-09-01', '2019-10-01', '2019-04-30 18:45:53', 2500000, 9, NULL, 4, 1),
	(12, '2019-05-01', '2019-05-31', '2019-05-30 12:05:35', 170000, 5, NULL, 3, 1),
	(13, '2019-06-01', '2019-07-01', '2019-05-30 21:21:32', 210000, 6, 'hgjhghj', 8, 2),
	(14, '2019-07-01', '2019-07-31', '2019-05-30 21:21:32', 210000, 7, 'hgjhghj', 8, 2),
	(15, '2019-08-01', '2019-08-31', '2019-05-30 21:21:32', 210000, 8, 'hgjhghj', 8, 2),
	(16, '2019-06-01', '2019-07-01', '2019-05-31 23:10:01', 560000, 6, 'CH-546546', 9, 2),
	(17, '2019-07-01', '2019-07-31', '2019-05-31 23:10:01', 560000, 7, 'CH-546546', 9, 2),
	(18, '2019-08-01', '2019-08-31', '2019-05-31 23:10:01', 560000, 8, 'CH-546546', 9, 2),
	(19, '2019-09-01', '2019-10-01', '2019-05-31 23:10:01', 560000, 9, 'CH-546546', 9, 2),
	(20, '2019-10-01', '2019-10-31', '2019-05-31 23:10:01', 560000, 10, 'CH-546546', 9, 2),
	(21, '2019-11-01', '2019-12-01', '2019-05-31 23:10:01', 560000, 11, 'CH-546546', 9, 2),
	(22, '2019-12-01', '2019-12-31', '2019-05-31 23:10:01', 560000, 12, 'CH-546546', 9, 2);
/*!40000 ALTER TABLE `compteloyer` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. images
CREATE TABLE IF NOT EXISTS `images` (
  `idImages` int(11) NOT NULL AUTO_INCREMENT,
  `ImagesLien` varchar(100) DEFAULT NULL,
  `bien_idbien` int(11) NOT NULL,
  `bien_Personne_idPersonne` int(11) NOT NULL,
  `bien_TypeBien_idTypeBien` int(11) NOT NULL,
  `ImagesDescription` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idImages`),
  KEY `fk_Images_bien1_idx` (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`),
  CONSTRAINT `fk_Images_bien1` FOREIGN KEY (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`) REFERENCES `bien` (`idbien`, `Personne_idPersonne`, `TypeBien_idTypeBien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.images : ~0 rows (environ)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. immeubles
CREATE TABLE IF NOT EXISTS `immeubles` (
  `idImmeubles` int(11) NOT NULL AUTO_INCREMENT,
  `NomImmeubles` varchar(150) DEFAULT NULL,
  `AdresseImmeubles` varchar(100) DEFAULT NULL,
  `SuperficieImmeubles` int(11) DEFAULT NULL,
  `DateConstructImmeubles` date DEFAULT NULL,
  `DescriptionImmeubles` varchar(200) DEFAULT NULL,
  `personne_idPersonne` int(11) DEFAULT NULL,
  PRIMARY KEY (`idImmeubles`),
  KEY `FK_personne` (`personne_idPersonne`),
  CONSTRAINT `FK_personne` FOREIGN KEY (`personne_idPersonne`) REFERENCES `personne` (`idPersonne`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.immeubles : ~2 rows (environ)
/*!40000 ALTER TABLE `immeubles` DISABLE KEYS */;
REPLACE INTO `immeubles` (`idImmeubles`, `NomImmeubles`, `AdresseImmeubles`, `SuperficieImmeubles`, `DateConstructImmeubles`, `DescriptionImmeubles`, `personne_idPersonne`) VALUES
	(1, 'Immeuble Chateau de France', 'Cocody Angré Chateau', 1500, '2019-02-04', 'Immeuble avec appartements complets et situé en bordure de route', 21),
	(2, 'LES RESIDENCES KAREN', 'Koumassi en face du Camp Commando', 800, '2017-07-05', 'Immeuble de 8 étages situé en bordure du boulevard Giscar d\'Estaing, idéal pour votre entreprise', 23),
	(8, 'Immeuble Zama', 'Koumassi Zone 4', 850, '2019-05-01', 'Immeuble de 6 étages', 21);
/*!40000 ALTER TABLE `immeubles` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. moisannee
CREATE TABLE IF NOT EXISTS `moisannee` (
  `idMois` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleMois` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMois`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.moisannee : ~12 rows (environ)
/*!40000 ALTER TABLE `moisannee` DISABLE KEYS */;
REPLACE INTO `moisannee` (`idMois`, `LibelleMois`) VALUES
	(1, 'Janvier'),
	(2, 'Fevrier'),
	(3, 'Mars'),
	(4, 'Avril'),
	(5, 'Mai'),
	(6, 'Juin'),
	(7, 'Juillet'),
	(8, 'Aout'),
	(9, 'Septembre'),
	(10, 'Octobre'),
	(11, 'Novembre'),
	(12, 'Decembre');
/*!40000 ALTER TABLE `moisannee` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pays
CREATE TABLE IF NOT EXISTS `pays` (
  `idpays` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nompays` varchar(450) DEFAULT NULL,
  `Codepays` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.pays : ~0 rows (environ)
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `PersonneSituationGeo` varchar(100) DEFAULT NULL,
  `PersonneEmail` varchar(100) DEFAULT NULL,
  `PersonneTel` varchar(100) DEFAULT NULL,
  `PersonneCel` varchar(100) DEFAULT NULL,
  `PersonneNumeroCB` varchar(100) DEFAULT NULL,
  `PersonneVille` int(11) DEFAULT NULL,
  `PersonnePays` int(10) unsigned DEFAULT NULL,
  `top_validite` int(11) DEFAULT '0',
  PRIMARY KEY (`idPersonne`),
  KEY `fk_Personne_Ville1_idx` (`PersonneVille`),
  KEY `fk_Personne_Ville2_idx` (`PersonnePays`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne : ~5 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
REPLACE INTO `personne` (`idPersonne`, `PersonneSituationGeo`, `PersonneEmail`, `PersonneTel`, `PersonneCel`, `PersonneNumeroCB`, `PersonneVille`, `PersonnePays`, `top_validite`) VALUES
	(21, 'Port-Bouet', 'aetoumi@gmail.com', '', '41598655', NULL, 0, 0, 0),
	(22, 'Abidjan, Marcory remblais', 'kacou@gmail.com', '', '41587452', NULL, 0, 0, 0),
	(23, 'Cote d\'ivoire Abidjan Cocody', 'djamaracyrille@gmail.com', '58007387', '01014391', NULL, 0, 0, 0),
	(24, 'Abidjan, riviera 3', 'albertinegneka@gmail.com', '05243623', '41256369', NULL, 0, 0, 0),
	(25, 'cocody riviera abatta', 'wbreak@gmail.com', '', '01014391', NULL, 0, 0, 0),
	(26, NULL, 'kacou@gmail.com', NULL, NULL, NULL, NULL, NULL, 0);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. personne_has_role
CREATE TABLE IF NOT EXISTS `personne_has_role` (
  `Personne_idPersonne` int(11) NOT NULL,
  `role_idrole` int(11) NOT NULL,
  `DateAjoutRole` date DEFAULT NULL,
  PRIMARY KEY (`Personne_idPersonne`,`role_idrole`),
  KEY `fk_Personne_has_role_role1_idx` (`role_idrole`),
  KEY `fk_Personne_has_role_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_Personne_has_role_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personne_has_role_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne_has_role : ~5 rows (environ)
/*!40000 ALTER TABLE `personne_has_role` DISABLE KEYS */;
REPLACE INTO `personne_has_role` (`Personne_idPersonne`, `role_idrole`, `DateAjoutRole`) VALUES
	(21, 1, NULL),
	(22, 2, NULL),
	(23, 1, NULL),
	(24, 2, NULL),
	(25, 3, NULL),
	(26, 3, NULL);
/*!40000 ALTER TABLE `personne_has_role` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. personne_loue_bien
CREATE TABLE IF NOT EXISTS `personne_loue_bien` (
  `idlocation` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_idPersonne` int(11) NOT NULL,
  `bien_idbien` int(11) NOT NULL,
  `dateDebutlocation` datetime DEFAULT CURRENT_TIMESTAMP,
  `top_validite` int(1) NOT NULL DEFAULT '0' COMMENT 'Permet de savoir si la location est encore active ou non. 0 pour actif 1 pour desactiver',
  PRIMARY KEY (`idlocation`),
  KEY `fk_Personne_has_bien_bien1_idx` (`bien_idbien`),
  KEY `fk_Personne_has_bien_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_Personne_has_bien_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personne_has_bien_bien1` FOREIGN KEY (`bien_idbien`) REFERENCES `bien` (`idbien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne_loue_bien : ~6 rows (environ)
/*!40000 ALTER TABLE `personne_loue_bien` DISABLE KEYS */;
REPLACE INTO `personne_loue_bien` (`idlocation`, `Personne_idPersonne`, `bien_idbien`, `dateDebutlocation`, `top_validite`) VALUES
	(3, 24, 14, '2019-03-16 10:28:11', 0),
	(4, 22, 15, '2019-03-16 10:40:44', 0),
	(5, 24, 14, '2019-03-16 11:51:55', 1),
	(6, 24, 14, '2019-03-16 15:34:17', 1),
	(7, 22, 16, '2019-03-21 09:24:38', 1),
	(8, 24, 18, '2019-04-13 18:02:53', 0),
	(9, 24, 19, '2019-05-31 23:07:59', 0);
/*!40000 ALTER TABLE `personne_loue_bien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. persphys
CREATE TABLE IF NOT EXISTS `persphys` (
  `idPersPhys` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_PersPhys` varchar(100) DEFAULT NULL,
  `Prenom_PersPhys` varchar(150) DEFAULT NULL,
  `DateNaiss_PersPhys` date DEFAULT NULL,
  `numpiece` varchar(45) NOT NULL,
  `LieuNaiss_PersPhys` varchar(100) DEFAULT NULL,
  `SexePersPhys` varchar(45) DEFAULT NULL,
  `Personne_idPersonne` int(11) NOT NULL,
  `TypePiece_idTypePiece` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPersPhys`,`Personne_idPersonne`),
  KEY `fk_PersPhys_Personne1_idx` (`Personne_idPersonne`),
  KEY `fk_PersPhys_TypePiece1_idx` (`TypePiece_idTypePiece`),
  CONSTRAINT `fk_PersPhys_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PersPhys_TypePiece1` FOREIGN KEY (`TypePiece_idTypePiece`) REFERENCES `typepiece` (`idTypePiece`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.persphys : ~5 rows (environ)
/*!40000 ALTER TABLE `persphys` DISABLE KEYS */;
REPLACE INTO `persphys` (`idPersPhys`, `Nom_PersPhys`, `Prenom_PersPhys`, `DateNaiss_PersPhys`, `numpiece`, `LieuNaiss_PersPhys`, `SexePersPhys`, `Personne_idPersonne`, `TypePiece_idTypePiece`) VALUES
	(1, 'ETOUMI', 'Aristide', '1995-09-10', '', 'Grand-Bassam', 'Hommme', 21, 1),
	(2, 'Kacou', 'Philippe', '1987-11-19', '', 'Bocanda', 'Hommme', 22, NULL),
	(3, 'Djamara', 'Edjuhe Cyrille', '2019-02-06', '', 'Abidjan marcory', 'Hommme', 23, 1),
	(4, 'GNEKA', 'Albertine Miriam', '2019-03-05', '', 'Abidjan cocody', 'Femme', 24, NULL),
	(5, 'william', 'break', '1996-02-04', 'CNI-05122991', 'marcory', 'Hommme', 25, 1),
	(6, 'Kacou', 'Philippe', NULL, '', NULL, NULL, 26, NULL);
/*!40000 ALTER TABLE `persphys` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pers_morale
CREATE TABLE IF NOT EXISTS `pers_morale` (
  `idPers_Morale` int(11) NOT NULL AUTO_INCREMENT,
  `DenomPers_Morale` varchar(100) DEFAULT NULL,
  `SiegePers_Morale` varchar(100) DEFAULT NULL,
  `Personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`idPers_Morale`,`Personne_idPersonne`),
  KEY `fk_Pers_Morale_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_Pers_Morale_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.pers_morale : ~0 rows (environ)
/*!40000 ALTER TABLE `pers_morale` DISABLE KEYS */;
/*!40000 ALTER TABLE `pers_morale` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pieces
CREATE TABLE IF NOT EXISTS `pieces` (
  `idPieces` int(11) NOT NULL AUTO_INCREMENT,
  `PiecesLibelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPieces`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.pieces : ~12 rows (environ)
/*!40000 ALTER TABLE `pieces` DISABLE KEYS */;
REPLACE INTO `pieces` (`idPieces`, `PiecesLibelle`) VALUES
	(1, '1'),
	(2, 'Studio'),
	(3, '2'),
	(4, '2-3'),
	(5, '3'),
	(6, '3-4'),
	(7, '4'),
	(8, '4-5'),
	(9, '5'),
	(10, '5-6'),
	(11, '6'),
	(12, '6+');
/*!40000 ALTER TABLE `pieces` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. role
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `role_libelle` varchar(100) DEFAULT NULL,
  `role_date_debut` date DEFAULT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.role : ~3 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
REPLACE INTO `role` (`idrole`, `role_libelle`, `role_date_debut`) VALUES
	(1, 'proprietaire', '2019-02-05'),
	(2, 'locataire', '2019-02-05'),
	(3, 'agent', NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typebien
CREATE TABLE IF NOT EXISTS `typebien` (
  `idTypeBien` int(11) NOT NULL AUTO_INCREMENT,
  `TypeBienLibelle` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTypeBien`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typebien : ~9 rows (environ)
/*!40000 ALTER TABLE `typebien` DISABLE KEYS */;
REPLACE INTO `typebien` (`idTypeBien`, `TypeBienLibelle`) VALUES
	(1, 'Appartement'),
	(2, 'Atelier'),
	(3, 'Boutique'),
	(4, 'Chambre'),
	(5, 'Maison'),
	(6, 'Local professionnelle'),
	(7, 'Parking'),
	(8, 'Studio'),
	(9, 'Entrepot');
/*!40000 ALTER TABLE `typebien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typepaiement
CREATE TABLE IF NOT EXISTS `typepaiement` (
  `idTypePaiement` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleTypePaiement` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTypePaiement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typepaiement : ~3 rows (environ)
/*!40000 ALTER TABLE `typepaiement` DISABLE KEYS */;
REPLACE INTO `typepaiement` (`idTypePaiement`, `LibelleTypePaiement`) VALUES
	(1, 'Espece'),
	(2, 'Chèque'),
	(3, 'Virement bancaire');
/*!40000 ALTER TABLE `typepaiement` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typepiece
CREATE TABLE IF NOT EXISTS `typepiece` (
  `idTypePiece` int(11) NOT NULL AUTO_INCREMENT,
  `TypePieceLibelle` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTypePiece`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typepiece : ~2 rows (environ)
/*!40000 ALTER TABLE `typepiece` DISABLE KEYS */;
REPLACE INTO `typepiece` (`idTypePiece`, `TypePieceLibelle`) VALUES
	(1, 'CNI'),
	(2, 'Attestation d\'Identite');
/*!40000 ALTER TABLE `typepiece` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. user
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(150) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `userIcon` varchar(150) DEFAULT NULL,
  `Personne_idPersonne` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  KEY `fk_user_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_user_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.user : ~3 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`iduser`, `login`, `Password`, `email`, `userIcon`, `Personne_idPersonne`) VALUES
	(1, 'elpandor', '12345', 'aetoumi@gmail.com', 'ETOUMIAristide.jpg', 21),
	(2, 'djamara', '258092*', 'djamaracyrille@gmail.com', 'id_card.jpg', 23),
	(3, 'break', '258092*', 'wbreak@gmail.com', '.jpg', 25),
	(4, 'kacou', '12345', 'kacou@gmail.com', NULL, 26);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. ville
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `NomVille` varchar(45) DEFAULT NULL,
  `pays_idpays` int(10) unsigned NOT NULL,
  `pays_idpays1` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idVille`,`pays_idpays`),
  KEY `fk_Ville_pays1_idx` (`pays_idpays1`),
  CONSTRAINT `fk_Ville_pays1` FOREIGN KEY (`pays_idpays1`) REFERENCES `pays` (`idpays`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.ville : ~0 rows (environ)
/*!40000 ALTER TABLE `ville` DISABLE KEYS */;
/*!40000 ALTER TABLE `ville` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
