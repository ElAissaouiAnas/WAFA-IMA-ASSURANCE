
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tls
CREATE DATABASE IF NOT EXISTS `tls` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `tls`;

-- Dumping structure for table tls.assurances
CREATE TABLE IF NOT EXISTS `assurances` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `issuer` varchar(20) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `userfiles` varchar(255) DEFAULT NULL,
  `id_transaction` varchar(50) DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `montant_visa` double DEFAULT NULL,
  `montant_service` double DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `expirationDate` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `paidDate` datetime DEFAULT NULL,
  `valid` tinyint(4) DEFAULT '0',
  `cancel` tinyint(4) NOT NULL DEFAULT '0',
  `confirmed` varchar(50) DEFAULT 'N',
  `confirmedDate` datetime DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `cin` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `date_effet` varchar(255) DEFAULT NULL,
  `datenaissance` varchar(255) DEFAULT NULL,
  `lieunaissance` varchar(255) DEFAULT NULL,
  `addresse` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT 'Maroc',
  `vehicule` enum('Oui','Non') DEFAULT 'Non',
  `annee_vehicule` varchar(255) DEFAULT 'Non',
  `marque_vehicule` varchar(255) DEFAULT NULL,
  `modele_vehicule` varchar(255) DEFAULT NULL,
  `num_vehicule` varchar(255) DEFAULT NULL,
  `conjoints` varchar(255) DEFAULT NULL,
  `enfants` varchar(255) DEFAULT NULL,
  `nom_c1` varchar(255) DEFAULT NULL,
  `prenom_c1` varchar(255) DEFAULT NULL,
  `datenaissance_c1` varchar(255) DEFAULT NULL,
  `nom_c2` varchar(255) DEFAULT NULL,
  `prenom_c2` varchar(255) DEFAULT NULL,
  `datenaissance_c2` varchar(255) DEFAULT NULL,
  `nom_c3` varchar(255) DEFAULT NULL,
  `prenom_c3` varchar(255) DEFAULT NULL,
  `datenaissance_c3` varchar(255) DEFAULT NULL,
  `nom_c4` varchar(255) DEFAULT NULL,
  `prenom_c4` varchar(255) DEFAULT NULL,
  `datenaissance_c4` varchar(255) DEFAULT NULL,
  `nom_e1` varchar(255) DEFAULT NULL,
  `prenom_e1` varchar(255) DEFAULT NULL,
  `datenaissance_e1` varchar(255) DEFAULT NULL,
  `nom_e2` varchar(255) DEFAULT NULL,
  `prenom_e2` varchar(255) DEFAULT NULL,
  `datenaissance_e2` varchar(255) DEFAULT NULL,
  `nom_e3` varchar(255) DEFAULT NULL,
  `prenom_e3` varchar(255) DEFAULT NULL,
  `datenaissance_e3` varchar(255) DEFAULT NULL,
  `nom_e4` varchar(255) DEFAULT NULL,
  `prenom_e4` varchar(255) DEFAULT NULL,
  `datenaissance_e4` varchar(255) DEFAULT NULL,
  `nom_e5` varchar(255) DEFAULT NULL,
  `prenom_e5` varchar(255) DEFAULT NULL,
  `datenaissance_e5` varchar(255) DEFAULT NULL,
  `nom_e6` varchar(255) DEFAULT NULL,
  `prenom_e6` varchar(255) DEFAULT NULL,
  `datenaissance_e6` varchar(255) DEFAULT NULL,
  `contrat_id` varchar(20) DEFAULT NULL,
  `serviceCharge` double DEFAULT NULL,
  `stampDuty` double DEFAULT NULL,
  `totalAmount` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cancel_user_id` int(11) DEFAULT NULL,
  `cancelledDate` datetime DEFAULT NULL,
  `file_user_id` int(11) DEFAULT NULL,
  `file_date` datetime DEFAULT NULL,
  `type` varchar(50) DEFAULT 'callcenter',
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table tls.a_users
CREATE TABLE IF NOT EXISTS `a_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `login` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `issuers` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

-- Dumping structure for table tls.contrats
CREATE TABLE IF NOT EXISTS `contrats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `duree` varchar(50) NOT NULL,
  `prime_ht` double NOT NULL,
  `prime_tva` double NOT NULL,
  `prime_ttc` double NOT NULL,
  `fees` double NOT NULL DEFAULT '0',
  `prime_nette` varchar(50) DEFAULT NULL,
  `commission_ht` varchar(50) DEFAULT NULL,
  `tps_1` varchar(50) DEFAULT NULL,
  `net_a_payer_compagnie` varchar(50) DEFAULT NULL,
  `taux_de_commission` varchar(50) DEFAULT NULL,
  `taux_de_commission_additionnelle` varchar(50) DEFAULT NULL,
  `commission_additionnelle` varchar(50) DEFAULT NULL,
  `tps_2` varchar(50) DEFAULT NULL,
  `taux_de_commission_totale` varchar(50) DEFAULT NULL,
  `commission_totale` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.

-- Dumping structure for table tls.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `idpayments` bigint(20) NOT NULL AUTO_INCREMENT,
  `rdv` varchar(50) DEFAULT NULL,
  `pnr` varchar(10) NOT NULL,
  `id_transaction` varchar(50) DEFAULT NULL,
  `montant` double DEFAULT NULL,
  `montant_visa` double DEFAULT NULL,
  `montant_service` double DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `expirationDate` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `paidDate` datetime DEFAULT NULL,
  `valid` tinyint(4) DEFAULT '0',
  `cancel` tinyint(4) NOT NULL DEFAULT '0',
  `confirmed` varchar(50) DEFAULT 'N',
  `confirmedDate` datetime DEFAULT NULL,
  `buyerEmail` varchar(255) DEFAULT NULL,
  `buyerLastName` varchar(255) DEFAULT NULL,
  `buyerFirstName` varchar(255) DEFAULT NULL,
  `buyerPhone` varchar(255) DEFAULT NULL,
  `idCommande` varchar(20) DEFAULT NULL,
  `serviceCharge` double DEFAULT NULL,
  `stampDuty` double DEFAULT NULL,
  `totalAmount` double DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cancel_user_id` int(11) DEFAULT NULL,
  `cancelledDate` datetime DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT 'Site',
  `service` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpayments`),
  KEY `PNR_INDEX` (`pnr`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Data exporting was unselected.



-- Dumping structure for table tls.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `login` int(11) NOT NULL DEFAULT '0',
  `admin` int(11) NOT NULL DEFAULT '0',
  `issuers` varchar(250) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
