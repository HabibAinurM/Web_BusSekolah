-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2024 at 11:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_madiun`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `pass_admin`) VALUES
('ha01', 'bibam', 'bibam01'),
('ha02', 'aul', 'aul02'),
('ha03', 'zeg', 'zeg03');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `no_bus` int(20) NOT NULL,
  `plat_nomor` varchar(10) NOT NULL,
  `tipe_bus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`no_bus`, `plat_nomor`, `tipe_bus`) VALUES
(1, 'AB 1234 CD', 'Medium Bus'),
(2, 'BC 2345 DE', 'Medium Bus'),
(3, 'CD 3456 EF', 'Medium Bus'),
(4, 'DE 4567 FG', 'Medium Bus'),
(5, 'EF 5678 GH', 'Medium Bus'),
(6, 'FG 6789 HI', 'Medium Bus'),
(7, 'GH 7890 IJ', 'Medium Bus'),
(8, 'HI 8901 JK', 'Medium Bus'),
(9, 'IJ 9012 KL', 'Medium Bus');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` int(20) NOT NULL,
  `waktu_berangkat` time NOT NULL,
  `waktu_jemput` time NOT NULL,
  `rute_id` int(20) NOT NULL,
  `no_bus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `waktu_berangkat`, `waktu_jemput`, `rute_id`, `no_bus`) VALUES
(1, '06:00:00', '06:20:00', 1, '1'),
(2, '06:15:00', '06:35:00', 1, '2'),
(3, '06:20:00', '06:40:00', 1, '3'),
(4, '06:30:00', '06:45:00', 1, '4'),
(5, '06:00:00', '06:20:00', 2, '5'),
(6, '06:15:00', '06:35:00', 2, '6'),
(7, '06:20:00', '06:40:00', 2, '7'),
(8, '06:30:00', '06:45:00', 2, '8'),
(9, '14:20:00', '14:45:00', 3, '1'),
(10, '14:35:00', '15:05:00', 3, '2'),
(11, '14:40:00', '15:10:00', 3, '3'),
(12, '14:50:00', '15:15:00', 3, '4'),
(13, '14:20:00', '14:45:00', 4, '5'),
(14, '14:35:00', '15:05:00', 4, '6'),
(15, '14:40:00', '15:10:00', 4, '7'),
(16, '14:50:00', '15:15:00', 4, '8');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id` int(11) NOT NULL,
  `nomor_kursi` varchar(10) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `plat_nomor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id`, `nomor_kursi`, `jadwal_id`, `plat_nomor`) VALUES
(128, 'Seat 5', 1, 'AB 1234 CD'),
(129, 'Seat 14', 15, 'GH 7890 IJ'),
(130, 'Seat 1', 4, 'DE 4567 FG');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `reservasi_id` int(20) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `kode_unik` int(20) NOT NULL,
  `waktu_reservasi` date NOT NULL,
  `nisn` int(10) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `plat_nomor` varchar(20) DEFAULT NULL,
  `jadwal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`reservasi_id`, `id`, `kode_unik`, `waktu_reservasi`, `nisn`, `email`, `plat_nomor`, `jadwal_id`) VALUES
(6683, 130, 2147483647, '2024-06-22', 3, 'eggar@gmail.com', 'DE 4567 FG', 4),
(6685, 129, 667691, '2024-06-22', 2, 'habib1@gmail.com', 'GH 7890 IJ', 15),
(8420, 128, 66769193, '2024-06-22', 1, 'auliadva123@gmail.com', 'AB 1234 CD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rute`
--

CREATE TABLE `rute` (
  `rute_id` int(20) NOT NULL,
  `nama_rute` varchar(50) NOT NULL,
  `lokasi_jemput` varchar(50) NOT NULL,
  `lokasi_antar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rute`
--

INSERT INTO `rute` (`rute_id`, `nama_rute`, `lokasi_jemput`, `lokasi_antar`) VALUES
(1, 'Kedungrejo - SMA 1 Mejayan', 'Kedungrejo', 'SMA 1 Mejayan'),
(2, 'Kedungrejo - SMA 2 Mejayan', 'Kedungrejo', 'SMA 2 Mejayan'),
(3, 'SMA 1 Mejayan - Kedungrejo', 'SMA 1 Mejayan', 'Kedungrejo'),
(4, 'SMA 2 Mejayan - Kedungrejo', 'SMA 2 Mejayan', 'Kedungrejo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nisn` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(1) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `FOTO` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nisn`, `email`, `no_hp`, `nama`, `tgl_lahir`, `jk`, `sekolah`, `pass_user`, `FOTO`) VALUES
(1, 'auliadva123@gmail.com', 2147483647, 'Aulia Diva Sukmadevi', '2024-06-22', 'P', 'UNS', '$2y$10$myN166qly.uEOzrQuurmCO3dmWLoUQJ05GqK1yHJiASfoOumT4FsO', 0x312e706e67),
(2, 'habib1@gmail.com', 2147483647, 'Habib Ainur', '2024-06-22', 'L', 'UNS PSDKU', '$2y$10$p6imZ0E/kK2ruuGssp/RWeKTp.rUPwYQsxuZPDW025AaFkwgCju/y', 0x322e706e67),
(3, 'eggar@gmail.com', 2147483647, 'Eggar Aliya', '2024-06-22', 'L', 'UNS MADIUN', '$2y$10$HJZkkrNPZGHRfYqE2zHg.eMvOBSjfF3D69iVMPe73N11z/bDEQv0.', 0x332e706e67);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`plat_nomor`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `rute_id` (`rute_id`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plat_nomor` (`plat_nomor`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`reservasi_id`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `fk_id` (`id`),
  ADD KEY `fk_jadwal_id` (`jadwal_id`);

--
-- Indexes for table `rute`
--
ALTER TABLE `rute`
  ADD PRIMARY KEY (`rute_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nisn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`rute_id`) REFERENCES `rute` (`rute_id`);

--
-- Constraints for table `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `fk_plat_nomor` FOREIGN KEY (`plat_nomor`) REFERENCES `bus` (`plat_nomor`);

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `kursi` (`id`),
  ADD CONSTRAINT `fk_jadwal_id` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`),
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `user` (`nisn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
