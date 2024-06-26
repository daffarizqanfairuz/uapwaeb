-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 04:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uapwaeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `akses` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `email`, `passwords`, `username`, `akses`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(2, 'anta@gmail.com', 'anta', 'TNA', 2),
(3, 'antaa@gmail.com', 'antaa', 'tnaaa', 2),
(4, 'daoa@gmail.com', 'wla', 'daoa@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `gameID` int(11) NOT NULL,
  `genreID` int(11) DEFAULT NULL,
  `platformID` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(1000) DEFAULT 'Wutdehel',
  `rating` int(1) DEFAULT 0,
  `komentar` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`gameID`, `genreID`, `platformID`, `nama`, `deskripsi`, `rating`, `komentar`) VALUES
(1, 12, 1, 'Valorant', 'Game Shooter', 0, 'WwutDehaeil'),
(2, 14, 2, 'Zero To Hero', 'AFK RPG gaem pH', 0, 'wutdeheali'),
(3, 10, 3, 'Terraria', 'Game Sandbox', 0, 'wuWT'),
(4, 1, 1, 'Devil May Gyat', 'Wla Wla Wla Plap', 4, 'Jadi game ini tentang gyat the gamers dimana dante tidak bisa menjadi sigma skibi.'),
(5, 1, 1, 'Edging Empire', 'You play as Sigma Empire where you try to rizz the minors to win the game!', 0, 'Woakwoa'),
(7, 1, 2, 'Sigma Skibi Toilet', 'Alamak', 5, 'Alamak');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `genreID` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `nama`) VALUES
(1, 'Action'),
(10, 'Adventure'),
(11, 'Fantasy'),
(12, 'FPS'),
(13, 'MMORPG'),
(14, 'RPG'),
(15, 'Arcade');

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id`, `nama`) VALUES
(1, 'PC'),
(2, 'Mobile'),
(3, 'Console');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`gameID`),
  ADD KEY `genreID` (`genreID`),
  ADD KEY `platformID` (`platformID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `gameID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`genreID`) REFERENCES `genre` (`genreID`),
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`platformID`) REFERENCES `platform` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
