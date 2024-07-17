-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 17, 2024 at 05:12 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `highchart`
--

-- --------------------------------------------------------

--
-- Table structure for table `pie`
--

CREATE TABLE `pie` (
  `id` int(11) NOT NULL,
  `mobil` text NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pie`
--

INSERT INTO `pie` (`id`, `mobil`, `jumlah`) VALUES
(2, 'Toyota', 200),
(3, 'Honda', 180),
(4, 'BMW', 120),
(5, 'Mercedes-Benz', 90),
(6, 'Ford', 50),
(7, 'Chevrolet', 25),
(8, 'Nissan', 8),
(9, 'Volkswagen', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pie`
--
ALTER TABLE `pie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pie`
--
ALTER TABLE `pie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
