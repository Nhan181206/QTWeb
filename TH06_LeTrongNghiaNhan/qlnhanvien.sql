-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2026 at 11:48 AM
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
-- Database: `qlnhanvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `ho` varchar(40) NOT NULL,
  `ten` varchar(10) NOT NULL,
  `phai` tinyint(1) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `diachi` varchar(50) NOT NULL,
  `dienthoai` varchar(10) DEFAULT NULL,
  `mapb` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ho`, `ten`, `phai`, `ngaysinh`, `diachi`, `dienthoai`, `mapb`) VALUES
(1, 'Nguyễn Văn', 'Mười', 1, '1990-01-15', 'Hà Nội', '0901111111', 'CNTT'),
(2, 'Trần Thị', 'Bình', 0, '1992-03-20', 'Hải Phòng', '0902222222', 'CNTT'),
(3, 'Lê Văn', 'Cường', 1, '1988-07-10', 'Đà Nẵng', '0903333333', 'CNTT'),
(4, 'Phạm Thị', 'Dung', 0, '1995-11-05', 'Huế', '0904444444', 'CNTT'),
(5, 'Hoàng Văn', 'Chính', 1, '1993-09-25', 'Nha Trang', '0905555555', 'CNTT'),
(6, 'Vũ Thị', 'Phương', 0, '1991-02-14', 'Cần Thơ', '0906666666', 'KT'),
(7, 'Đặng Văn', 'Giang', 1, '1989-06-30', 'Hà Nội', '0907777777', 'KT'),
(8, 'Bùi', 'Hòa', 0, '1994-12-08', 'Hải Phòng', '0908888888', 'KT'),
(9, 'Ngô Văn', 'Hùng', 1, '1992-04-18', 'Đà Nẵng', '0909999999', 'KT'),
(10, 'Lý Văn', 'Sâm', 0, '1996-08-22', 'Huế', '0911111111', 'KT'),
(11, 'Lấm Văn', 'Si', 1, '1987-10-11', 'Nha Trang', '0912222222', 'NS'),
(12, 'Trương Thị', 'Nga', 0, '1993-05-16', 'Cần Thơ', '0913333333', 'NS'),
(13, 'Cao Thế', 'Giới', 1, '1990-03-03', 'Hà Nội', '0914444444', 'NS'),
(14, 'Đinh Tử', 'Giang', 0, '1995-09-19', 'Hải Phòng', '0915555555', 'NS'),
(15, 'Trần Quế', 'Dũng', 1, '1986-12-28', 'Đà Nẵng', NULL, 'NS');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `mapb` varchar(5) NOT NULL,
  `tenpb` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`mapb`, `tenpb`) VALUES
('CNTT', 'Công nghệ thông tin'),
('KT', 'Kế toán'),
('NS', 'Nhân sự');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`),
  ADD KEY `mapb` (`mapb`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`mapb`),
  ADD UNIQUE KEY `tenpb` (`tenpb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
