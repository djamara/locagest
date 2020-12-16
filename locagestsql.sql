-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.4.8-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour locagest_new
DROP DATABASE IF EXISTS `locagest_new`;
CREATE DATABASE IF NOT EXISTS `locagest_new` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `locagest_new`;

-- Listage de la structure de la table locagest_new. bien
DROP TABLE IF EXISTS `bien`;
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
  `description` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `libAssurance` text DEFAULT NULL,
  `dateSouscriptionAssurance` date DEFAULT NULL,
  `dateEcheanceAssurance` date DEFAULT NULL,
  `nbChambre` int(11) DEFAULT NULL,
  `nbSalleBain` int(11) DEFAULT NULL,
  `topActif` int(1) DEFAULT 1 COMMENT '1 actif / 0 inactif',
  PRIMARY KEY (`idbien`,`Personne_idPersonne`,`TypeBien_idTypeBien`),
  KEY `fk_bien_Personne_idx` (`Personne_idPersonne`),
  KEY `fk_bien_TypeBien1_idx` (`TypeBien_idTypeBien`),
  KEY `fk_bien_Immeubles1_idx` (`Immeubles_idImmeubles`),
  CONSTRAINT `fk_bien_Immeubles1` FOREIGN KEY (`Immeubles_idImmeubles`) REFERENCES `immeubles` (`idImmeubles`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_Personne` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_TypeBien1` FOREIGN KEY (`TypeBien_idTypeBien`) REFERENCES `typebien` (`idTypeBien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien : ~3 rows (environ)
/*!40000 ALTER TABLE `bien` DISABLE KEYS */;
INSERT INTO `bien` (`idbien`, `bienLibelle`, `bienLocalisation`, `bienDateCreation`, `bienNomProprietaire`, `Personne_idPersonne`, `TypeBien_idTypeBien`, `Immeubles_idImmeubles`, `feuilleCadastrale`, `parcelleCadastrale`, `categorieCadastrale`, `valeurLocataiveCadastrale`, `lot`, `millieme`, `parking`, `autresDependance`, `cave`, `typeLocation`, `loyerHC`, `charges`, `taxeHabitation`, `taxeFonciere`, `dateAcquisition`, `prixAcquisition`, `fraisAcquisition`, `nomCentreiImpot`, `adresse1CentreImpot`, `adresse2CentreImpot`, `codePostale`, `ville`, `description`, `notes`, `libAssurance`, `dateSouscriptionAssurance`, `dateEcheanceAssurance`, `nbChambre`, `nbSalleBain`, `topActif`) VALUES
	(25, 'Villa Cissiko', 'Riviera bounoumin dans le dos de Abidjan mall', '2006-05-04', 'Cissoko Aichatou', 49, 10, NULL, '', '', '', NULL, '', '', '', NULL, '', 'Vide', 450000, 0, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', 'Assurance tout risque ', '2019-07-14', '2025-07-13', NULL, NULL, 1),
	(26, 'Appartement KZ110', 'Angre la djibi', '2017-12-10', 'SICOGI', 51, 1, NULL, '', '', '', NULL, '', '', '', NULL, '', 'Meublée', 350000, 0, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, 1),
	(27, 'villa keita', 'marcory zone 4c', '0000-00-00', 'Keita Abdoul', 58, 10, NULL, '', '', '', NULL, '', '', '', NULL, '', 'Vide', 450000, 0, '', '', '0000-00-00', 0, 0, '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', NULL, NULL, 1);
/*!40000 ALTER TABLE `bien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. bien_has_caracteristiquesbiens
DROP TABLE IF EXISTS `bien_has_caracteristiquesbiens`;
CREATE TABLE IF NOT EXISTS `bien_has_caracteristiquesbiens` (
  `bien_idbien` int(11) NOT NULL,
  `bien_Personne_idPersonne` int(11) NOT NULL,
  `bien_TypeBien_idTypeBien` int(11) NOT NULL,
  `CaracteristiquesBiens_idCaracteristiquesBiens` int(11) NOT NULL,
  PRIMARY KEY (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`,`CaracteristiquesBiens_idCaracteristiquesBiens`),
  KEY `fk_bien_has_CaracteristiquesBiens_CaracteristiquesBiens1_idx` (`CaracteristiquesBiens_idCaracteristiquesBiens`),
  KEY `fk_bien_has_CaracteristiquesBiens_bien1_idx` (`bien_idbien`,`bien_Personne_idPersonne`,`bien_TypeBien_idTypeBien`),
  CONSTRAINT `fk_bien_has_CaracteristiquesBiens_CaracteristiquesBiens1` FOREIGN KEY (`CaracteristiquesBiens_idCaracteristiquesBiens`) REFERENCES `caracteristiquesbiens` (`idCaracteristiquesBiens`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bien_has_CaracteristiquesBiens_bien1` FOREIGN KEY (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`) REFERENCES `bien` (`idbien`, `Personne_idPersonne`, `TypeBien_idTypeBien`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien_has_caracteristiquesbiens : ~12 rows (environ)
/*!40000 ALTER TABLE `bien_has_caracteristiquesbiens` DISABLE KEYS */;
INSERT INTO `bien_has_caracteristiquesbiens` (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`, `CaracteristiquesBiens_idCaracteristiquesBiens`) VALUES
	(25, 49, 10, 2),
	(25, 49, 10, 7),
	(25, 49, 10, 9),
	(25, 49, 10, 10),
	(26, 51, 1, 1),
	(26, 51, 1, 3),
	(26, 51, 1, 8),
	(27, 58, 10, 2),
	(27, 58, 10, 3),
	(27, 58, 10, 4),
	(27, 58, 10, 7),
	(27, 58, 10, 10);
/*!40000 ALTER TABLE `bien_has_caracteristiquesbiens` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. bien_has_pieces
DROP TABLE IF EXISTS `bien_has_pieces`;
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
  CONSTRAINT `fk_bien_has_Pieces_bien1` FOREIGN KEY (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`) REFERENCES `bien` (`idbien`, `Personne_idPersonne`, `TypeBien_idTypeBien`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.bien_has_pieces : ~3 rows (environ)
/*!40000 ALTER TABLE `bien_has_pieces` DISABLE KEYS */;
INSERT INTO `bien_has_pieces` (`bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`, `Pieces_idPieces`, `NombrePiece`, `superficiePiece`, `DateAjoutPiece`) VALUES
	(25, 49, 10, 4, 3, 876, NULL),
	(26, 51, 1, 4, 3, 185, NULL),
	(27, 58, 10, 4, 3, 650, NULL);
/*!40000 ALTER TABLE `bien_has_pieces` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. caracteristiquesbiens
DROP TABLE IF EXISTS `caracteristiquesbiens`;
CREATE TABLE IF NOT EXISTS `caracteristiquesbiens` (
  `idCaracteristiquesBiens` int(11) NOT NULL AUTO_INCREMENT,
  `CaracteristiquesLibelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristiquesBiens`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.caracteristiquesbiens : ~10 rows (environ)
/*!40000 ALTER TABLE `caracteristiquesbiens` DISABLE KEYS */;
INSERT INTO `caracteristiquesbiens` (`idCaracteristiquesBiens`, `CaracteristiquesLibelle`) VALUES
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
DROP TABLE IF EXISTS `compteloyer`;
CREATE TABLE IF NOT EXISTS `compteloyer` (
  `idloyer` int(11) NOT NULL AUTO_INCREMENT,
  `Loyer_dateDebutPeriode` date DEFAULT NULL,
  `Loyer_dateFinPeriode` date DEFAULT NULL,
  `Loyer_datePaiement` datetime DEFAULT current_timestamp(),
  `Loyer_MontantVerse` bigint(11) DEFAULT NULL,
  `moisannee_idMois` int(11) NOT NULL,
  `Loyer_NumCheque` varchar(100) DEFAULT '',
  `idlocation` int(11) NOT NULL,
  `typepaiement_idTypePaiement` int(11) NOT NULL,
  PRIMARY KEY (`idloyer`),
  KEY `fk_Compteloyer_personne_loue_bien1_idx` (`idlocation`),
  KEY `fk_Compteloyer_typepaiement1_idx` (`typepaiement_idTypePaiement`),
  KEY `fk_Compteloyer_moisannee1_idx` (`moisannee_idMois`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.compteloyer : ~9 rows (environ)
/*!40000 ALTER TABLE `compteloyer` DISABLE KEYS */;
INSERT INTO `compteloyer` (`idloyer`, `Loyer_dateDebutPeriode`, `Loyer_dateFinPeriode`, `Loyer_datePaiement`, `Loyer_MontantVerse`, `moisannee_idMois`, `Loyer_NumCheque`, `idlocation`, `typepaiement_idTypePaiement`) VALUES
	(1, '2020-02-06', '2020-03-07', '2020-02-07 07:45:59', 450000, 2, 'N° chèque', 1, 2),
	(2, '2020-03-06', '2020-04-05', '2020-02-07 07:45:59', 450000, 3, 'N° chèque', 1, 2),
	(3, '2020-04-06', '2020-05-06', '2020-02-07 07:45:59', 450000, 4, 'N° chèque', 1, 2),
	(4, '2020-05-06', '2020-06-05', '2020-02-07 09:51:39', 450000, 5, 'BASIC-65069', 1, 2),
	(5, '2020-06-06', '2020-07-06', '2020-02-07 09:51:39', 450000, 6, 'BASIC-65069', 1, 2),
	(6, '2020-01-01', '2020-01-31', '2020-02-08 09:40:55', 350000, 1, NULL, 2, 1),
	(7, '2020-02-05', '2020-03-06', '2020-02-10 07:00:01', 350000, 2, NULL, 2, 1),
	(8, '2020-03-04', '2020-04-03', '2020-02-10 07:11:35', 350000, 3, NULL, 2, 1),
	(9, '2020-04-04', '2020-05-04', '2020-02-10 07:11:35', 350000, 4, NULL, 2, 1);
/*!40000 ALTER TABLE `compteloyer` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. depenses
DROP TABLE IF EXISTS `depenses`;
CREATE TABLE IF NOT EXISTS `depenses` (
  `idDepenses` int(11) NOT NULL AUTO_INCREMENT,
  `idBien` int(11) NOT NULL DEFAULT 0,
  `idTypeTravaux` int(11) NOT NULL DEFAULT 0,
  `Nom_Intervenant` varchar(150) DEFAULT NULL,
  `Contact_Intervenant` varchar(150) DEFAULT NULL,
  `Adresse_Intervenant` varchar(150) DEFAULT NULL,
  `Date_Travaux` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Montant_Travaux` int(20) DEFAULT NULL,
  PRIMARY KEY (`idDepenses`),
  KEY `FK_BIEN` (`idBien`),
  KEY `FK_TYPE_TRAVAUX` (`idTypeTravaux`),
  CONSTRAINT `FK_BIEN` FOREIGN KEY (`idBien`) REFERENCES `bien` (`idbien`),
  CONSTRAINT `FK_TYPE_TRAVAUX` FOREIGN KEY (`idTypeTravaux`) REFERENCES `typetravaux` (`idTypeTravaux`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table locagest_new.depenses : ~1 rows (environ)
/*!40000 ALTER TABLE `depenses` DISABLE KEYS */;
INSERT INTO `depenses` (`idDepenses`, `idBien`, `idTypeTravaux`, `Nom_Intervenant`, `Contact_Intervenant`, `Adresse_Intervenant`, `Date_Travaux`, `Montant_Travaux`) VALUES
	(1, 25, 3, 'Koffi Menuisier', '01415161', 'riviera attoban', '2020-02-07 00:00:00', 16000);
/*!40000 ALTER TABLE `depenses` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. images
DROP TABLE IF EXISTS `images`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.images : ~2 rows (environ)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`idImages`, `ImagesLien`, `bien_idbien`, `bien_Personne_idPersonne`, `bien_TypeBien_idTypeBien`, `ImagesDescription`) VALUES
	(2, 'villa2.jpg', 25, 49, 10, NULL),
	(3, 'villa1.jpg', 25, 49, 10, NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. immeubles
DROP TABLE IF EXISTS `immeubles`;
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

-- Listage des données de la table locagest_new.immeubles : ~0 rows (environ)
/*!40000 ALTER TABLE `immeubles` DISABLE KEYS */;
/*!40000 ALTER TABLE `immeubles` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. moisannee
DROP TABLE IF EXISTS `moisannee`;
CREATE TABLE IF NOT EXISTS `moisannee` (
  `idMois` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleMois` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idMois`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.moisannee : ~12 rows (environ)
/*!40000 ALTER TABLE `moisannee` DISABLE KEYS */;
INSERT INTO `moisannee` (`idMois`, `LibelleMois`) VALUES
	(1, 'janvier'),
	(2, 'fevrier'),
	(3, 'mars'),
	(4, 'avril'),
	(5, 'mai'),
	(6, 'juin'),
	(7, 'juillet'),
	(8, 'aout'),
	(9, 'septembre'),
	(10, 'octobre'),
	(11, 'novembre'),
	(12, 'decembre');
/*!40000 ALTER TABLE `moisannee` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pays
DROP TABLE IF EXISTS `pays`;
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
DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `idPersonne` int(11) NOT NULL AUTO_INCREMENT,
  `PersonneSituationGeo` varchar(100) DEFAULT NULL,
  `PersonneEmail` varchar(100) DEFAULT NULL,
  `PersonneTel` varchar(100) DEFAULT NULL,
  `PersonneCel` varchar(100) DEFAULT NULL,
  `PersonneNumeroCB` varchar(100) DEFAULT NULL,
  `PersonneVille` int(11) DEFAULT NULL,
  `PersonnePays` int(10) unsigned DEFAULT NULL,
  `top_validite` int(11) DEFAULT 0,
  PRIMARY KEY (`idPersonne`),
  KEY `fk_Personne_Ville1_idx` (`PersonneVille`),
  KEY `fk_Personne_Ville2_idx` (`PersonnePays`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne : ~14 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` (`idPersonne`, `PersonneSituationGeo`, `PersonneEmail`, `PersonneTel`, `PersonneCel`, `PersonneNumeroCB`, `PersonneVille`, `PersonnePays`, `top_validite`) VALUES
	(47, 'Riviera golf', 'sobregas@gmail.com', NULL, NULL, NULL, NULL, NULL, 0),
	(48, 'Ayaman, ancienne gendarmerie ', 'chantalekoffi@gmail.com', '', '07950428', NULL, 0, 0, 0),
	(49, 'Riviera CIAD', 'aichatou@gmail.com', '', '04140421', NULL, 0, 0, 0),
	(50, 'Cocody 2 plateaux', 'zakifaustin@gmail.com', '', '05050585', NULL, 0, 0, 0),
	(51, 'Cocody rue les foreurs ', 'info@sicogi.com', '', '21212112', NULL, 0, 0, 0),
	(52, 'Abobo quartier Houphouet Boigny', 'etchirodrigue@gmail.com', '', '05644424', NULL, 0, 0, 0),
	(53, 'cocody jardin', 'mikihouse@gmail.com', NULL, NULL, NULL, NULL, NULL, 0),
	(54, 'koumassi', 'koutouan@gmail.com', NULL, NULL, NULL, NULL, NULL, 0),
	(55, 'port-bouet', 'info@aeria.com', '', '21220222', NULL, 0, 0, 0),
	(56, 'Marcory (Anoumabo)', 'allogbonjesus@gmail.com', NULL, NULL, NULL, NULL, NULL, 0),
	(57, NULL, 'becav@gmail.com', NULL, NULL, NULL, NULL, NULL, 0),
	(58, 'Abidjan cocody', 'keitaabdoul@gmail.com', '', '05147485', NULL, 0, 0, 0),
	(59, 'koumassi sopim', 'info@energieplus.com', '', '21212222', NULL, 0, 0, 0),
	(60, 'abidjan marcory', 'info@gmail.com', '', '22010122', NULL, 0, 0, 0);
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. personne_has_role
DROP TABLE IF EXISTS `personne_has_role`;
CREATE TABLE IF NOT EXISTS `personne_has_role` (
  `Personne_idPersonne` int(11) NOT NULL,
  `role_idrole` int(11) NOT NULL,
  `DateAjoutRole` date DEFAULT NULL,
  `idAgence` int(11) DEFAULT NULL,
  PRIMARY KEY (`Personne_idPersonne`,`role_idrole`),
  KEY `fk_Personne_has_role_role1_idx` (`role_idrole`),
  KEY `fk_Personne_has_role_Personne1_idx` (`Personne_idPersonne`),
  KEY `FK_Personne_has_role_agence` (`idAgence`),
  CONSTRAINT `FK_Personne_has_role_agence` FOREIGN KEY (`idAgence`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personne_has_role_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personne_has_role_role1` FOREIGN KEY (`role_idrole`) REFERENCES `role` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne_has_role : ~14 rows (environ)
/*!40000 ALTER TABLE `personne_has_role` DISABLE KEYS */;
INSERT INTO `personne_has_role` (`Personne_idPersonne`, `role_idrole`, `DateAjoutRole`, `idAgence`) VALUES
	(47, 4, NULL, NULL),
	(48, 3, NULL, 47),
	(49, 1, NULL, 47),
	(50, 2, NULL, 47),
	(51, 1, NULL, 47),
	(52, 2, NULL, 47),
	(53, 4, NULL, NULL),
	(54, 4, NULL, NULL),
	(55, 1, NULL, 54),
	(56, 4, NULL, NULL),
	(57, 3, NULL, 56),
	(58, 1, NULL, 56),
	(59, 2, NULL, 56),
	(60, 2, NULL, 47);
/*!40000 ALTER TABLE `personne_has_role` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. personne_loue_bien
DROP TABLE IF EXISTS `personne_loue_bien`;
CREATE TABLE IF NOT EXISTS `personne_loue_bien` (
  `idlocation` int(11) NOT NULL AUTO_INCREMENT,
  `Personne_idPersonne` int(11) NOT NULL,
  `bien_idbien` int(11) NOT NULL,
  `dateDebutlocation` date DEFAULT NULL,
  `dateFinLocation` date DEFAULT NULL,
  `top_validite` int(1) NOT NULL DEFAULT 0 COMMENT 'Permet de savoir si la location est encore active ou non. 0 pour actif 1 pour desactiver',
  `montantAvance` int(50) DEFAULT NULL,
  `montantCaution` int(50) DEFAULT NULL,
  `montantAnnexe` int(50) DEFAULT NULL,
  `montantTotal` int(50) DEFAULT NULL,
  `topValideLocation` int(50) DEFAULT 1 COMMENT '1 pour actif et 0 pour inactif',
  PRIMARY KEY (`idlocation`),
  KEY `fk_Personne_has_bien_bien1_idx` (`bien_idbien`),
  KEY `fk_Personne_has_bien_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_Personne_has_bien_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Personne_has_bien_bien1` FOREIGN KEY (`bien_idbien`) REFERENCES `bien` (`idbien`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.personne_loue_bien : ~4 rows (environ)
/*!40000 ALTER TABLE `personne_loue_bien` DISABLE KEYS */;
INSERT INTO `personne_loue_bien` (`idlocation`, `Personne_idPersonne`, `bien_idbien`, `dateDebutlocation`, `dateFinLocation`, `top_validite`, `montantAvance`, `montantCaution`, `montantAnnexe`, `montantTotal`, `topValideLocation`) VALUES
	(1, 50, 25, '2019-04-15', '2020-04-15', 1, 1350000, 150000, 900000, 2400000, 1),
	(2, 52, 26, '2019-01-01', '2019-12-12', 1, 1400000, 700000, 50000, 2150000, 1),
	(3, 59, 27, '2020-01-01', '2021-12-31', 0, 1800000, 450000, 100000, 2350000, 1),
	(4, 60, 25, '2020-01-01', '2020-12-31', 0, 1800000, 900000, 0, 2700000, 1);
/*!40000 ALTER TABLE `personne_loue_bien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. persphys
DROP TABLE IF EXISTS `persphys`;
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

-- Listage des données de la table locagest_new.persphys : ~6 rows (environ)
/*!40000 ALTER TABLE `persphys` DISABLE KEYS */;
INSERT INTO `persphys` (`idPersPhys`, `Nom_PersPhys`, `Prenom_PersPhys`, `DateNaiss_PersPhys`, `numpiece`, `LieuNaiss_PersPhys`, `SexePersPhys`, `Personne_idPersonne`, `TypePiece_idTypePiece`) VALUES
	(1, 'Boko', 'Ange Sylviane', '1984-02-10', 'CNI-15903', 'Tiebo', 'Femme', 48, 1),
	(2, 'Cissoko', 'Aichatou', '1950-11-12', '', 'Atlanta', 'Femme', 49, NULL),
	(3, 'Zaki', 'Ateko Faustin', '1954-10-10', '', 'Gagnoa', 'Hommme', 50, NULL),
	(4, 'Etchi', 'Maximin', '1987-03-13', '', 'grand bassam', 'Hommme', 52, NULL),
	(5, 'Beca', 'Valence', NULL, '', NULL, 'Femme', 57, NULL),
	(6, 'Keita', 'Abdoul', '1985-03-10', '', 'Mali Gao', 'Hommme', 58, NULL);
/*!40000 ALTER TABLE `persphys` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pers_morale
DROP TABLE IF EXISTS `pers_morale`;
CREATE TABLE IF NOT EXISTS `pers_morale` (
  `idPers_Morale` int(11) NOT NULL AUTO_INCREMENT,
  `DenomPers_Morale` varchar(100) DEFAULT NULL,
  `SiegePers_Morale` varchar(100) DEFAULT NULL,
  `Personne_idPersonne` int(11) NOT NULL,
  `FomeJuridique_Morale` varchar(50) DEFAULT NULL,
  `RCCM_Morale` varchar(50) DEFAULT NULL,
  `CompteContrib_Morale` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPers_Morale`,`Personne_idPersonne`),
  KEY `fk_Pers_Morale_Personne1_idx` (`Personne_idPersonne`),
  CONSTRAINT `fk_Pers_Morale_Personne1` FOREIGN KEY (`Personne_idPersonne`) REFERENCES `personne` (`idPersonne`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.pers_morale : ~8 rows (environ)
/*!40000 ALTER TABLE `pers_morale` DISABLE KEYS */;
INSERT INTO `pers_morale` (`idPers_Morale`, `DenomPers_Morale`, `SiegePers_Morale`, `Personne_idPersonne`, `FomeJuridique_Morale`, `RCCM_Morale`, `CompteContrib_Morale`) VALUES
	(3, 'SOBREGAS', 'Riviera golf', 47, NULL, NULL, NULL),
	(4, 'SICOGI', NULL, 51, 'SARL', 'CI-ABJ-2019-B-00142', ''),
	(5, 'MIKY HOUSE', 'cocody jardin', 53, NULL, NULL, NULL),
	(6, 'koutouan immo', 'koumassi', 54, NULL, NULL, NULL),
	(7, 'AERIA', NULL, 55, 'SA', 'rcc-20125', 'cc-0230'),
	(8, 'AJP immobilier', 'Marcory (Anoumabo)', 56, NULL, NULL, NULL),
	(9, 'Energie plus ci', NULL, 59, 'SARL', 'CI-ABJ-2015-B-0014', 'CC-01254'),
	(10, 'SOCIETE D\'EBENISTERIE', NULL, 60, 'SARL', 'CI-ABJ-02-1996-B14-10007', 'CC-0636');
/*!40000 ALTER TABLE `pers_morale` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. pieces
DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `idPieces` int(11) NOT NULL AUTO_INCREMENT,
  `PiecesLibelle` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idPieces`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.pieces : ~4 rows (environ)
/*!40000 ALTER TABLE `pieces` DISABLE KEYS */;
INSERT INTO `pieces` (`idPieces`, `PiecesLibelle`) VALUES
	(1, '1'),
	(2, 'Studio'),
	(3, '2'),
	(4, '3');
/*!40000 ALTER TABLE `pieces` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `role_libelle` varchar(100) DEFAULT NULL,
  `role_date_debut` date DEFAULT current_timestamp(),
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.role : ~4 rows (environ)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`idrole`, `role_libelle`, `role_date_debut`) VALUES
	(1, 'proprietaire', '2020-02-06'),
	(2, 'locataire', '2020-02-06'),
	(3, 'agent', '2020-02-06'),
	(4, 'agence', '2020-02-06');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typebien
DROP TABLE IF EXISTS `typebien`;
CREATE TABLE IF NOT EXISTS `typebien` (
  `idTypeBien` int(11) NOT NULL AUTO_INCREMENT,
  `TypeBienLibelle` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTypeBien`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typebien : ~10 rows (environ)
/*!40000 ALTER TABLE `typebien` DISABLE KEYS */;
INSERT INTO `typebien` (`idTypeBien`, `TypeBienLibelle`) VALUES
	(1, 'Appartement'),
	(2, 'Atelier'),
	(3, 'Boutique'),
	(4, 'Chambre'),
	(5, 'Maison'),
	(6, 'Local professionnelle'),
	(7, 'Parking'),
	(8, 'Studio'),
	(9, 'Entrepot'),
	(10, 'Villa');
/*!40000 ALTER TABLE `typebien` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typepaiement
DROP TABLE IF EXISTS `typepaiement`;
CREATE TABLE IF NOT EXISTS `typepaiement` (
  `idTypePaiement` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleTypePaiement` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTypePaiement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typepaiement : ~3 rows (environ)
/*!40000 ALTER TABLE `typepaiement` DISABLE KEYS */;
INSERT INTO `typepaiement` (`idTypePaiement`, `LibelleTypePaiement`) VALUES
	(1, 'espece'),
	(2, 'chèque'),
	(3, 'virement');
/*!40000 ALTER TABLE `typepaiement` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typepiece
DROP TABLE IF EXISTS `typepiece`;
CREATE TABLE IF NOT EXISTS `typepiece` (
  `idTypePiece` int(11) NOT NULL AUTO_INCREMENT,
  `TypePieceLibelle` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idTypePiece`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.typepiece : ~2 rows (environ)
/*!40000 ALTER TABLE `typepiece` DISABLE KEYS */;
INSERT INTO `typepiece` (`idTypePiece`, `TypePieceLibelle`) VALUES
	(1, 'CNI'),
	(2, 'PASSEPORT');
/*!40000 ALTER TABLE `typepiece` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. typetravaux
DROP TABLE IF EXISTS `typetravaux`;
CREATE TABLE IF NOT EXISTS `typetravaux` (
  `idTypeTravaux` int(11) NOT NULL AUTO_INCREMENT,
  `LibelleTravaux` varchar(150) NOT NULL,
  PRIMARY KEY (`idTypeTravaux`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table locagest_new.typetravaux : ~4 rows (environ)
/*!40000 ALTER TABLE `typetravaux` DISABLE KEYS */;
INSERT INTO `typetravaux` (`idTypeTravaux`, `LibelleTravaux`) VALUES
	(1, 'plomberie'),
	(2, 'electricité'),
	(3, 'menuiserie'),
	(4, 'etancheité');
/*!40000 ALTER TABLE `typetravaux` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. user
DROP TABLE IF EXISTS `user`;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Listage des données de la table locagest_new.user : ~6 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`iduser`, `login`, `Password`, `email`, `userIcon`, `Personne_idPersonne`) VALUES
	(1, 'sobregas', '258092*', 'sobregas@gmail.com', NULL, 47),
	(2, 'chantalekoffi@gmail.com', '123456', 'chantalekoffi@gmail.com', '.jpeg', 48),
	(3, 'mikyhouse', '258092*', 'mikihouse@gmail.com', NULL, 53),
	(4, 'koutouanAdmin', '123456', 'koutouan@gmail.com', NULL, 54),
	(5, 'ajpimmo', '123456', 'allogbonjesus@gmail.com', NULL, 56),
	(6, 'becav@gmail.com', '123456', 'becav@gmail.com', NULL, 57);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table locagest_new. ville
DROP TABLE IF EXISTS `ville`;
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
