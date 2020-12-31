-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for assessement_project
CREATE DATABASE IF NOT EXISTS `assessement_project` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `assessement_project`;

-- Dumping structure for table assessement_project.perpustakaan
CREATE TABLE IF NOT EXISTS `perpustakaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `buku` varchar(25) NOT NULL,
  `batas` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table assessement_project.perpustakaan: ~1 rows (approximately)
/*!40000 ALTER TABLE `perpustakaan` DISABLE KEYS */;
INSERT INTO `perpustakaan` (`id`, `nis`, `nama`, `kelas`, `buku`, `batas`) VALUES
	(19, '240501', 'Muhammad Reyhan Rizki Ferdiyan', 'XII IPA 4', 'Buku Sepak Bola', '3 Hari');
/*!40000 ALTER TABLE `perpustakaan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
