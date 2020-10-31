-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2020 at 03:45 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epma_db`
--
CREATE DATABASE IF NOT EXISTS `epma_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `epma_db`;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tindakan`
--

DROP TABLE IF EXISTS `jenis_tindakan`;
CREATE TABLE IF NOT EXISTS `jenis_tindakan` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `jenis` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `jenis_tindakan`
--

INSERT INTO `jenis_tindakan` (`id`, `jenis`) VALUES
(1, 'RJP'),
(2, 'Membersihkan Luka'),
(3, 'Hecting Luka'),
(4, 'Pemberian Oksigen'),
(5, 'Inhalasi'),
(6, 'Nebulizer'),
(7, 'Observasi');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

DROP TABLE IF EXISTS `pasien`;
CREATE TABLE IF NOT EXISTS `pasien` (
  `no_bpjs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL DEFAULT '0',
  `tempat_lahir` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `umur` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`no_bpjs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_pegawai` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `posisi` enum('dokter','perawat','petugas') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'petugas',
  PRIMARY KEY (`id_pegawai`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_user`, `id_pegawai`, `nama_pegawai`, `posisi`) VALUES
(6, 1, 'John Sutoro', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

DROP TABLE IF EXISTS `pelayanan`;
CREATE TABLE IF NOT EXISTS `pelayanan` (
  `id_pelayanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `no_bpjs` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_dokter` int(10) UNSIGNED DEFAULT NULL,
  `id_perawat` int(10) UNSIGNED DEFAULT NULL,
  `tanggal_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `keluhan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tindakan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `resep_obat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `poli` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `triase` enum('merah','kuning') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'kuning',
  `estimasi_waktu` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '30 Menit',
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `id_jenis_tindakan` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_pelayanan`),
  KEY `id_dokter` (`id_dokter`),
  KEY `id_perawat` (`id_perawat`),
  KEY `pelayanan_ibfk_4` (`no_bpjs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `level` enum('admin','general') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'general',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nik`, `password`, `level`) VALUES
(6, '111', '827ccb0eea8a706c4c34a16891f84e7b', 'admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD CONSTRAINT `pelayanan_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pelayanan_ibfk_3` FOREIGN KEY (`id_perawat`) REFERENCES `pegawai` (`id_pegawai`),
  ADD CONSTRAINT `pelayanan_ibfk_4` FOREIGN KEY (`no_bpjs`) REFERENCES `pasien` (`no_bpjs`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
