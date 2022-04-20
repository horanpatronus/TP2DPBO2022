-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 07:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ormawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_divisi`
--

CREATE TABLE `bidang_divisi` (
  `id_bidang` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `id_divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_divisi`
--

INSERT INTO `bidang_divisi` (`id_bidang`, `jabatan`, `id_divisi`) VALUES
(1, 'Ketua Divisi', 1),
(2, 'Sekretaris', 1),
(3, 'Bendahara', 1),
(4, 'Anggota', 1),
(5, 'Ketua Divisi', 2),
(6, 'Sekretaris', 2),
(7, 'Bendahara', 2),
(8, 'Anggota', 2),
(9, 'Ketua Divisi', 3),
(10, 'Sekretaris', 3),
(11, 'Bendahara', 3),
(12, 'Anggota', 3),
(13, 'Ketua Divisi', 4),
(14, 'Sekretaris', 4),
(15, 'Bendahara', 4),
(16, 'Anggota', 4),
(17, 'Ketua Divisi', 5),
(18, 'Sekretaris', 5),
(19, 'Bendahara', 5),
(20, 'Anggota', 5),
(21, 'Ketua Divisi', 6),
(22, 'Sekretaris', 6),
(23, 'Bendahara', 6),
(24, 'Anggota', 6),
(25, 'Ketua Divisi', 7),
(26, 'Sekretaris', 7),
(27, 'Bendahara', 7),
(28, 'Anggota', 7);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Divisi Ekonomi dan Bisnis'),
(2, 'Divisi Pengembangan Minat dan Bakat'),
(3, 'Divisi Pendidikan dan Pelatihan'),
(4, 'Divisi Pengembangan Organisasi'),
(5, 'Divisi Advokasi, Sosial, dan Politik'),
(6, 'Divisi Kerohanian'),
(7, 'Divisi Komunikasi, Teknologi, dan Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua Divisi'),
(2, 'Sekretaris'),
(3, 'Bendahara'),
(4, 'Anggota');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `foto_pengurus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nim`, `nama`, `semester`, `id_bidang`, `id_divisi`, `id_jabatan`, `foto_pengurus`) VALUES
(2000001, 'Mark Lee', 4, 1, 1, 1, 'mark.jpg'),
(2000003, 'Kim Dongyoung', 7, 21, 6, 1, 'doyoung.jpg'),
(2000004, 'Hendery', 2, 1, 1, 1, 'hendery.jpg'),
(2000010, 'Lee Jeno', 2, 2, 1, 2, 'jeno.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `fk_foreign_key_id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `fk_foreign_key_id_bidang` (`id_bidang`),
  ADD KEY `fk_foreign_key_id_divisi` (`id_divisi`),
  ADD KEY `fk_foreign_key_id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `nim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000012;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD CONSTRAINT `fk_foreign_key_id_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `fk_foreign_key_id_bidang` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_divisi` (`id_bidang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
