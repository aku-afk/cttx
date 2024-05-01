-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 06:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nyateti`
--

-- --------------------------------------------------------

--
-- Table structure for table `traffic`
--

CREATE TABLE `traffic` (
  `txn` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `content-val` varchar(255) NOT NULL,
  `datetime` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traffic`
--

INSERT INTO `traffic` (`txn`, `type`, `content-val`, `datetime`, `description`) VALUES
('estape5678', 'in', '2000000', '25/04/2024', 'masuk'),
('estape5678', 'out', '13000', '26/04/2024', 'jjn');

-- --------------------------------------------------------

--
-- Table structure for table `trfx_backup`
--

CREATE TABLE `trfx_backup` (
  `tgl` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `cat` varchar(255) NOT NULL COMMENT ' i or o',
  `val_cat` varchar(255) NOT NULL,
  `ket` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trfx_backup`
--

INSERT INTO `trfx_backup` (`tgl`, `timestamp`, `cat`, `val_cat`, `ket`) VALUES
('2024-04-25', '2024-04-26 23:02:22', 'i', '2000000', 'masukan'),
('2024-04-25', '2024-04-26 23:02:40', 'o', '13000', 'jjn'),
('2024-04-26', '2024-04-26 23:03:03', 'o', '150000', 'mes'),
('2024-04-26', '2024-04-26 23:03:32', 'o', '286269', 'hostinger'),
('2024-04-26', '2024-04-26 23:03:46', 'o', '9000', 'jjn'),
('2024-04-27', '2024-04-27 11:20:20', 'o', '10000', 'jjn');

-- --------------------------------------------------------

--
-- Table structure for table `user_cfg`
--

CREATE TABLE `user_cfg` (
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `txn` text NOT NULL,
  `ukey` varchar(255) NOT NULL,
  `backup-word` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cfg`
--

INSERT INTO `user_cfg` (`username`, `name`, `txn`, `ukey`, `backup-word`) VALUES
('mmtprjct.id', 'mmtx', 'estape5678', 'tesadmin', 'lawang,wajan,kompor,gelas,piring');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_cfg`
--
ALTER TABLE `user_cfg`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `txn` (`txn`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
