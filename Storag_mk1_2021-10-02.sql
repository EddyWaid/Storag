# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.4.20-MariaDB)
# Database: Storag_mk1
# Generation Time: 2021-10-02 15:09:08 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `file`;

CREATE TABLE `file` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `utente` int(11) NOT NULL,
  `root` varchar(20) DEFAULT NULL,
  `nome` varchar(20) NOT NULL DEFAULT '',
  `cartella` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;

INSERT INTO `file` (`id`, `utente`, `root`, `nome`, `cartella`, `position`)
VALUES
	(1,4,'aqui/e/test.pages','test.pages',NULL,NULL),
	(125,4,NULL,'kk',NULL,NULL),
	(157,4,NULL,'ttttt',125,NULL),
	(164,4,NULL,'ar',157,NULL);

/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table utenti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `utenti`;

CREATE TABLE `utenti` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `codice` int(11) NOT NULL,
  `gmail` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `utenti` WRITE;
/*!40000 ALTER TABLE `utenti` DISABLE KEYS */;

INSERT INTO `utenti` (`id`, `codice`, `gmail`)
VALUES
	(1,8886,NULL),
	(2,298,NULL),
	(3,1962,NULL),
	(4,9997,NULL);

/*!40000 ALTER TABLE `utenti` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
