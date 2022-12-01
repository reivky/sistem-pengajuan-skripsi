-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2022 at 01:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `judul_skripsi`
--

CREATE TABLE `judul_skripsi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` int(11) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `bidang` varchar(100) DEFAULT NULL,
  `dosbing1` varchar(255) NOT NULL,
  `dosbing2` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) DEFAULT NULL,
  `kategori_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Fakultas Teknik dan Informatika'),
(2, 'Fakultas Ilmu Pendidikan'),
(3, 'Fakultas Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE `login_admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`id`, `username`, `password`, `akses`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_dosen`
--

CREATE TABLE `login_dosen` (
  `nidn` int(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `akses` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_dosen`
--

INSERT INTO `login_dosen` (`nidn`, `nama`, `fakultas`, `prodi`, `bidang`, `password`, `akses`) VALUES
(111111, 'Emi Natasha', 'Fakultas Ilmu Pendidikan', 'Bimbingan dan Konseling', 'Konsultasi', '202cb962ac59075b964b07152d234b70', 'dosen'),
(11223344, 'Dosen Pembimbing A', 'Fakultas Teknik dan Informatika', 'Informatika', 'Artificial Intelligence', '202cb962ac59075b964b07152d234b70', 'dosen'),
(12121212, 'Dosen Pembimbing D', 'Fakultas Teknik dan Informatika', 'Informatika', 'Internet of Things', '202cb962ac59075b964b07152d234b70', 'dosen'),
(16666600, 'Rei Ardiansyah', 'Fakultas Hukum', 'Hukum', 'Persidangan', '202cb962ac59075b964b07152d234b70', 'dosen'),
(22223333, 'Dosen Pembimbing C', 'Fakultas Teknik dan Informatika', 'Informatika', 'Basis Data', '202cb962ac59075b964b07152d234b70', 'dosen'),
(111222333, 'Dosen Pembimbing B', 'Fakultas Teknik dan Informatika', 'Informatika', 'Image Processing', '202cb962ac59075b964b07152d234b70', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `login_mahasiswa`
--

CREATE TABLE `login_mahasiswa` (
  `nim` int(11) NOT NULL,
  `nama` varchar(90) DEFAULT NULL,
  `fakultas` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `pass` varchar(32) DEFAULT NULL,
  `akses` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login_progdi`
--

CREATE TABLE `login_progdi` (
  `prodi` varchar(100) NOT NULL,
  `nidn` int(50) NOT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `akses` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_progdi`
--

INSERT INTO `login_progdi` (`prodi`, `nidn`, `nama`, `password`, `akses`) VALUES
('Informatika', 1222222, 'Rei Ardiansyah', '202cb962ac59075b964b07152d234b70', 'progdi'),
('Pendidikan Guru Sekolah Dasar', 111000111, 'Emi Natasha', '202cb962ac59075b964b07152d234b70', 'progdi');

-- --------------------------------------------------------

--
-- Table structure for table `subkategori`
--

CREATE TABLE `subkategori` (
  `subkategori_id` int(11) NOT NULL,
  `subkategori_nama` varchar(50) NOT NULL,
  `subkategori_fakultas` varchar(100) DEFAULT NULL,
  `subkategori_kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subkategori`
--

INSERT INTO `subkategori` (`subkategori_id`, `subkategori_nama`, `subkategori_fakultas`, `subkategori_kategori_id`) VALUES
(5, 'Arsitektur', 'Fakultas Teknik dan Informatika', 1),
(6, 'Bimbingan dan Konseling', 'Fakultas Ilmu Pendidikan', 2),
(9, 'Hukum', 'Fakultas Hukum', 3),
(1, 'Informatika', 'Fakultas Teknik dan Informatika', 1),
(8, 'Pendidikan Guru PAUD', 'Fakultas Ilmu Pendidikan', 2),
(7, 'Pendidikan Guru Sekolah Dasar', 'Fakultas Ilmu Pendidikan', 2),
(10, 'Teknik Elektro', 'Fakultas Teknik dan Informatika', 1),
(3, 'Teknik Mesin', 'Fakultas Teknik dan Informatika', 1),
(2, 'Teknik Sipil', 'Fakultas Teknik dan Informatika', 1),
(4, 'Teknologi Pangan', 'Fakultas Teknik dan Informatika', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_nama`),
  ADD UNIQUE KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `login_admin`
--
ALTER TABLE `login_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_dosen`
--
ALTER TABLE `login_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `login_mahasiswa`
--
ALTER TABLE `login_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `login_progdi`
--
ALTER TABLE `login_progdi`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `subkategori`
--
ALTER TABLE `subkategori`
  ADD PRIMARY KEY (`subkategori_nama`),
  ADD UNIQUE KEY `subkategori_id` (`subkategori_id`),
  ADD KEY `subkategori_fakultas` (`subkategori_fakultas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `login_admin`
--
ALTER TABLE `login_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subkategori`
--
ALTER TABLE `subkategori`
  MODIFY `subkategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `judul_skripsi`
--
ALTER TABLE `judul_skripsi`
  ADD CONSTRAINT `judul_skripsi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `login_mahasiswa` (`nim`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`kategori_nama`) REFERENCES `subkategori` (`subkategori_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
