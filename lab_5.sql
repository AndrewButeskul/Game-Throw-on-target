-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2020 at 07:30 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `id` int(11) NOT NULL,
  `Rb` double UNSIGNED DEFAULT NULL,
  `rl` double UNSIGNED DEFAULT NULL,
  `S` double UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`id`, `Rb`, `rl`, `S`) VALUES
(1, 4, 3, 21.991148575129),
(2, 12, 10, 138.23007675795),
(3, 12, 10, 138.23007675795),
(4, 12, 10, 138.23007675795),
(5, 45, 22, 4841.1942791819),
(6, 45, 22, 4841.1942791819),
(7, 10, 5, 235.61944901923),
(8, 25, 17.5, 1001.3826583317);

-- --------------------------------------------------------

--
-- Table structure for table `trapeze`
--

CREATE TABLE `trapeze` (
  `id` int(11) NOT NULL,
  `a` double UNSIGNED DEFAULT NULL,
  `b` double UNSIGNED DEFAULT NULL,
  `h` double UNSIGNED DEFAULT NULL,
  `S` double UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trapeze`
--

INSERT INTO `trapeze` (`id`, `a`, `b`, `h`, `S`) VALUES
(1, 12, 8, 6, 60);

-- --------------------------------------------------------

--
-- Table structure for table `triangle`
--

CREATE TABLE `triangle` (
  `id` int(11) NOT NULL,
  `a` double UNSIGNED DEFAULT NULL,
  `b` double UNSIGNED DEFAULT NULL,
  `c` double UNSIGNED DEFAULT NULL,
  `S` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `triangle`
--

INSERT INTO `triangle` (`id`, `a`, `b`, `c`, `S`) VALUES
(1, 20, 24, 14, 139.91068579633);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trapeze`
--
ALTER TABLE `trapeze`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `triangle`
--
ALTER TABLE `triangle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trapeze`
--
ALTER TABLE `trapeze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `triangle`
--
ALTER TABLE `triangle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
