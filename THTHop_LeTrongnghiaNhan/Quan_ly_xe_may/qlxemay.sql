-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 03:04 AM
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
-- Table structure for table `hangxe`
--

CREATE TABLE `hangxe` (
  `mahang` varchar(10) NOT NULL,
  `tenhang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hangxe`
--

INSERT INTO `hangxe` (`mahang`, `tenhang`) VALUES
('HONDA', 'Honda'),
('SUZUKI', 'Suzuki'),
('SYM', 'SYM'),
('YAMAHA', 'Yamaha');

-- --------------------------------------------------------

--
-- Table structure for table `xe`
--

CREATE TABLE `xe` (
  `maxe` int(11) NOT NULL,
  `tenxe` varchar(100) NOT NULL,
  `mahang` varchar(10) NOT NULL,
  `namsx` int(4) NOT NULL,
  `mota` text DEFAULT NULL,
  `hinh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `xe`
--

INSERT INTO `xe` (`maxe`, `tenxe`, `mahang`, `namsx`, `mota`, `hinh`) VALUES
(1, 'Wave Alpha 110cc', 'HONDA', 2016, '- Kiểu dáng thanh lịch\n- Tiết kiệm xăng\n- Tiêu chuẩn khí thải Euro 2', 'wave-alpha.jpg'),
(2, 'WINNER 150CC', 'HONDA', 2017, '- Kiểu dáng thể thao\n- Xe côn tay 150 phân khối, hộp số 6 cấp\n- Bánh xe lớn, lốp không săm', 'winner150.jpg'),
(3, 'Lead 125CC', 'HONDA', 2016, '- Kiểu dáng sang trọng\n- Hộc chứa đồ lớn\n- Lốp không săm', 'lead125.jpg'),
(4, 'PCX 125CC', 'HONDA', 2017, '- Đẳng cấp\n- Máy mạnh\n- Lốp không săm', 'pcx125.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hangxe`
--
ALTER TABLE `hangxe`
  ADD PRIMARY KEY (`mahang`);

--
-- Indexes for table `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`maxe`),
  ADD KEY `mahang` (`mahang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xe`
--
ALTER TABLE `xe`
  MODIFY `maxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `fk_xe_hangxe` FOREIGN KEY (`mahang`) REFERENCES `hangxe` (`mahang`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
