-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 05:11 AM
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
-- Database: `qlxemay`
--

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `MaXe` varchar(10) NOT NULL,
  `TenXe` varchar(10) NOT NULL,
  `MaLoai` varchar(2) NOT NULL,
  `Gia` float NOT NULL,
  `HienThi` tinyint(1) NOT NULL,
  `Hinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`MaXe`, `TenXe`, `MaLoai`, `Gia`, `HienThi`, `Hinh`) VALUES
('AC', 'Acruzo', 'XG', 33490000, 1, 'acruzo.png'),
('EX', 'Exciter', 'XS', 48990000, 1, 'exciter.png'),
('FE', 'Freego', 'XG', 38990000, 1, 'freego.png'),
('GR', 'Grande', 'XG', 50000000, 1, 'grande.png'),
('JA', 'Janus', 'XG', 31990000, 1, 'janus.png'),
('JU', 'Jupiter', 'XS', 30000000, 1, 'jupiter.png'),
('LA', 'Latte', 'XG', 37490000, 1, 'latte.png'),
('MT03', 'MT-03', 'TT', 124000000, 1, 'mt03.png'),
('MT15', 'MT-15', 'TT', 78000000, 1, 'mt15.png'),
('NVX', 'NVX', 'XG', 52240000, 1, 'nvx.png'),
('SIFI', 'Sirius FI', 'XS', 23190000, 1, 'siriusfi.png'),
('TFX', 'TFX', 'TT', 72900000, 1, 'tfx.png'),
('YZFR15', 'YZF-R15', 'TT', 79000000, 1, 'yzfr15.png'),
('YZFR3', 'YZF-R3', 'TT', 129000000, 1, 'yzfr3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`MaXe`),
  ADD KEY `MaLoai` (`MaLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
