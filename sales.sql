-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 08:36 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychart`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `year` varchar(4) DEFAULT NULL,
  `month` varchar(10) DEFAULT NULL,
  `total` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `year`, `month`, `total`) VALUES
(1, '2024', 'Januari', 20000000),
(2, '2024', 'Februari', 22000000),
(3, '2024', 'Maret', 16000000),
(4, '2024', 'April', 26000000),
(5, '2024', 'Mei', 10000000),
(6, '2024', 'Juni', 18000000),
(7, '2024', 'Juli', 30000000),
(8, '2024', 'Agustus', 18500000),
(9, '2024', 'September', 28000000),
(10, '2024', 'Oktober', 34000000),
(11, '2024', 'November', 15000000),
(12, '2024', 'Desember', 28000000),
(13, '2025', 'Januari', 29000000),
(14, '2025', 'Februari', 12000000),
(15, '2025', 'Maret', 26000000),
(16, '2025', 'April', 15000000),
(17, '2025', 'Mei', 26000000),
(18, '2025', 'Juni', 16000000),
(19, '2025', 'Juli', 32000000),
(20, '2025', 'Agustus', 28000000),
(21, '2025', 'September', 13000000),
(22, '2025', 'Oktober', 24000000),
(23, '2025', 'November', 10000000),
(24, '2025', 'Desember', 14000000),
(25, '2026', 'Januari', 35000000),
(26, '2026', 'Februari', 28000000),
(27, '2026', 'Maret', 5000000),
(28, '2026', 'April', 30000000),
(29, '2026', 'Mei', 15000000),
(30, '2026', 'Juni', 28000000),
(31, '2026', 'Juli', 10000000),
(32, '2026', 'Agustus', 26000000),
(33, '2026', 'September', 17500000),
(34, '2026', 'Oktober', 26000000),
(35, '2026', 'November', 15000000),
(36, '2026', 'Desember', 26000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
