-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2022 at 06:34 PM
-- Server version: 5.7.33
-- PHP Version: 5.6.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingruangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id_booking` int(11) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_booking` varchar(30) NOT NULL,
  `agenda` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id_booking`, `kode_ruangan`, `id_user`, `no_booking`, `agenda`, `date`, `time_start`, `time_end`, `createdAt`, `updatedAt`) VALUES
(1, 'MUL', 2, 'MUL2022-07-14', 'TEKNIKAL MEETING PROGRAMMER', '2022-07-14', '10:00:22', '15:30:00', '2022-07-13 16:35:12', '2022-07-13 16:35:12'),
(2, 'RM101', 1, 'RM1012022-07-14', 'EVALUASI KINERJA 2021', '2022-07-14', '12:33:00', '15:33:00', '2022-07-13 10:33:25', '2022-07-13 10:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `kode_ruangan` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`kode_ruangan`, `status`, `nama_ruangan`, `createdAt`, `updatedAt`) VALUES
('MUL', 'AVAILABLE', 'MINI AULA4', '2022-07-12 23:45:30', '2022-07-13 04:21:05'),
('RM101', 'AVAILABLE', 'ROOM CORNER 101', '2022-07-12 23:45:30', '2022-07-12 23:45:30'),
('ROB', 'AVAILABLE', 'RUANG OBRIN', '2022-07-12 18:58:55', '2022-07-12 18:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `role` enum('Karyawan','Admin') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `role`, `username`, `password`) VALUES
(1, 'ADMIN REVA', 'Admin', 'admreva', '376c43878878ac04e05946ec1dd7a55f'),
(2, 'RIOH MASSIMAN', 'Karyawan', 'rio', '376c43878878ac04e05946ec1dd7a55f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `kode_ruangan` (`kode_ruangan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`kode_ruangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
