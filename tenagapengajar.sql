-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.22-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk tenagapelajar
CREATE DATABASE IF NOT EXISTS `tenagapelajar` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `tenagapelajar`;

-- membuang struktur untuk table tenagapelajar.kriteria
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kodekriteria` varchar(10) NOT NULL DEFAULT '0',
  `namakriteria` varchar(50) NOT NULL DEFAULT '0',
  `jenis` varchar(20) NOT NULL DEFAULT '0',
  `bobot` double NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel tenagapelajar.kriteria: ~4 rows (lebih kurang)
INSERT INTO `kriteria` (`id`, `kodekriteria`, `namakriteria`, `jenis`, `bobot`) VALUES
	(1, 'C1', 'Tes Pemrograman Web', 'Benefit', 0.3),
	(2, 'C2', 'Tes Pemrograman Mobile', 'Benefit', 0.3),
	(3, 'C3', 'Tes Photoshop', 'Benefit', 0.2),
	(4, 'C4', 'Tes Microsoft Office', 'Benefit', 0.1),
	(5, 'C5', 'Pendidikan Terakhir', 'Benefit', 0.1);

-- membuang struktur untuk table tenagapelajar.matrikskeputusan
CREATE TABLE IF NOT EXISTS `matrikskeputusan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpengajar` int(11) DEFAULT NULL,
  `idkriteria` int(11) DEFAULT NULL,
  `idskala` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpengajar` (`idpengajar`),
  KEY `idskala` (`idskala`),
  KEY `idbobot` (`idkriteria`) USING BTREE,
  CONSTRAINT `FK_matrikskeputusan_kriteria` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_matrikskeputusan_pengajar` FOREIGN KEY (`idpengajar`) REFERENCES `pengajar` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_matrikskeputusan_skala` FOREIGN KEY (`idskala`) REFERENCES `skala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel tenagapelajar.matrikskeputusan: ~60 rows (lebih kurang)
INSERT INTO `matrikskeputusan` (`id`, `idpengajar`, `idkriteria`, `idskala`) VALUES
	(1, 1, 1, 2),
	(2, 1, 2, 8),
	(3, 1, 3, 12),
	(4, 1, 4, 14),
	(5, 1, 5, 5),
	(6, 2, 1, 2),
	(7, 2, 2, 8),
	(8, 2, 3, 11),
	(9, 2, 4, 14),
	(10, 2, 5, 4),
	(11, 3, 1, 2),
	(12, 3, 2, 9),
	(13, 3, 3, 12),
	(14, 3, 4, 14),
	(15, 3, 5, 5),
	(16, 4, 1, 1),
	(17, 4, 2, 8),
	(18, 4, 3, 12),
	(19, 4, 4, 14),
	(20, 4, 5, 4),
	(21, 5, 1, 3),
	(22, 5, 2, 9),
	(23, 5, 3, 11),
	(24, 5, 4, 14),
	(25, 5, 5, 5),
	(26, 6, 1, 3),
	(27, 6, 2, 10),
	(28, 6, 3, 12),
	(29, 6, 4, 14),
	(30, 6, 5, 5),
	(31, 7, 1, 2),
	(32, 7, 2, 8),
	(33, 7, 3, 12),
	(34, 7, 4, 14),
	(35, 7, 5, 5),
	(36, 8, 1, 1),
	(37, 8, 2, 8),
	(38, 8, 3, 12),
	(39, 8, 4, 14),
	(40, 8, 5, 4),
	(41, 9, 1, 3),
	(42, 9, 2, 10),
	(43, 9, 3, 11),
	(44, 9, 4, 14),
	(45, 9, 5, 4),
	(46, 10, 1, 2),
	(47, 10, 2, 8),
	(48, 10, 3, 11),
	(49, 10, 4, 14),
	(50, 10, 5, 4),
	(51, 11, 1, 2),
	(52, 11, 2, 10),
	(53, 11, 3, 12),
	(54, 11, 4, 14),
	(55, 11, 5, 5),
	(56, 12, 1, 3),
	(57, 12, 2, 8),
	(58, 12, 3, 12),
	(59, 12, 4, 14),
	(60, 12, 5, 5);

-- membuang struktur untuk view tenagapelajar.nilaiyi
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `nilaiyi` (
	`id_pengajar` INT(11) NOT NULL,
	`nama` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`max` DOUBLE NULL,
	`min` DOUBLE NULL,
	`yi` DOUBLE NULL
) ENGINE=MyISAM;

-- membuang struktur untuk view tenagapelajar.normalisasi
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `normalisasi` (
	`idpengajar` INT(11) NULL,
	`nama` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`kodekriteria` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idkriteria` INT(11) NULL,
	`value` DOUBLE NULL
) ENGINE=MyISAM;

-- membuang struktur untuk view tenagapelajar.optimalisasi
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `optimalisasi` (
	`idpengajar` INT(11) NULL,
	`nama` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`kodekriteria` VARCHAR(10) NOT NULL COLLATE 'utf8mb4_general_ci',
	`idkriteria` INT(11) NULL,
	`value` DOUBLE NULL
) ENGINE=MyISAM;

-- membuang struktur untuk table tenagapelajar.pengajar
CREATE TABLE IF NOT EXISTS `pengajar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nama` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel tenagapelajar.pengajar: ~13 rows (lebih kurang)
INSERT INTO `pengajar` (`id`, `nama`) VALUES
	(1, 'Aditya Ediwangsa'),
	(2, 'Eka Yuni Hermawati'),
	(3, 'Imam Adicandra'),
	(4, 'Lanita Maharani'),
	(5, 'Muhammad Dian Kana'),
	(6, 'Muhammad Galang Yudistira'),
	(7, 'Muhammad Reza Arshad'),
	(8, 'Nabila Azahra'),
	(12, 'Putri Dwi Rahayu'),
	(11, 'Rahmad Syahputra'),
	(9, 'Rian Mahendra'),
	(10, 'Rizky Hermawan');

-- membuang struktur untuk view tenagapelajar.ranking
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `ranking` (
	`id_pengajar` INT(11) NOT NULL,
	`nama` VARCHAR(50) NULL COLLATE 'utf8mb4_general_ci',
	`yi` DOUBLE NULL,
	`rank` BIGINT(21) NOT NULL,
	`status` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk table tenagapelajar.skala
CREATE TABLE IF NOT EXISTS `skala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idkriteria` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idkriteria` (`idkriteria`),
  CONSTRAINT `FK_skala_kriteria` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel tenagapelajar.skala: ~13 rows (lebih kurang)
INSERT INTO `skala` (`id`, `idkriteria`, `value`, `keterangan`) VALUES
	(1, 1, 1, 'Tidak Menguasai'),
	(2, 1, 2, 'Menguasai'),
	(3, 1, 3, 'Sangat Menguasai'),
	(4, 5, 1, 'SMA/SMK'),
	(5, 5, 2, 'S1'),
	(6, 5, 3, 'S2'),
	(8, 2, 1, 'Tidak Menguasai'),
	(9, 2, 2, 'Menguasai'),
	(10, 2, 3, 'Sangat Menguasai'),
	(11, 3, 1, 'Tidak Menguasai'),
	(12, 3, 2, 'Menguasai'),
	(13, 4, 1, 'Tidak Menguasai'),
	(14, 4, 2, 'Menguasai');

-- membuang struktur untuk view tenagapelajar.nilaiyi
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `nilaiyi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `nilaiyi` AS SELECT
  p.id AS id_pengajar,
  p.nama AS nama,
  SUM(CASE WHEN k.jenis = 'Benefit' THEN norm.value ELSE 0 END) AS max,
  SUM(CASE WHEN k.jenis = 'Cost' THEN norm.value ELSE 0 END) AS min,
  (SUM(CASE WHEN k.jenis = 'Benefit' THEN norm.value ELSE 0 END) - 
   SUM(CASE WHEN k.jenis = 'Cost' THEN norm.value ELSE 0 END)) AS yi
FROM
  optimalisasi norm
JOIN
  pengajar p ON norm.idpengajar = p.id
JOIN
  kriteria k ON norm.idkriteria = k.id
GROUP BY
  p.id, p.nama ;

-- membuang struktur untuk view tenagapelajar.normalisasi
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `normalisasi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `normalisasi` AS SELECT
  mk.idpengajar,
  p.nama,
  k.kodekriteria,
  mk.idkriteria,
  s.value / sqrt(sum(s.value * s.value) over (partition by mk.idkriteria)) as value
FROM
  matrikskeputusan mk
JOIN
  pengajar p ON mk.idpengajar = p.id
JOIN
  skala s ON mk.idskala = s.id 
JOIN
	kriteria k ON mk.idkriteria = k.id ORDER BY mk.idpengajar, mk.idkriteria asc ;

-- membuang struktur untuk view tenagapelajar.optimalisasi
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `optimalisasi`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `optimalisasi` AS SELECT
  norm.idpengajar,
  p.nama as nama, 
  norm.kodekriteria,
  norm.idkriteria,
  norm.value * k.bobot AS value
FROM
  normalisasi norm
JOIN
  kriteria k ON norm.idkriteria = k.id
JOIN
  pengajar p ON norm.idpengajar = p.id ORDER BY norm.idpengajar ;

-- membuang struktur untuk view tenagapelajar.ranking
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `ranking`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `ranking` AS SELECT
  id_pengajar,
  nama,
  yi,
  RANK() OVER (ORDER BY yi DESC) AS rank,
  CASE 
    WHEN RANK() OVER (ORDER BY yi DESC) <= 5 THEN 'Prioritas'
    ELSE 'Tidak Prioritas'
  END AS status
FROM
  nilaiYi ;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
