-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2026 at 03:02 AM
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
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` varchar(10) NOT NULL,
  `ho` varchar(50) NOT NULL,
  `ten` varchar(30) NOT NULL,
  `phai` tinyint(1) NOT NULL DEFAULT 1,
  `ngaysinh` date NOT NULL,
  `diachi` varchar(150) DEFAULT NULL,
  `mapb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ho`, `ten`, `phai`, `ngaysinh`, `diachi`, `mapb`) VALUES
('CNTT01', 'Nguyễn Đăng', 'Khoa', 1, '1978-11-05', '25C tổ 6, KP1, Tân Hiệp', 'CNTT'),
('CNTT02', 'Nguyễn Long', 'Hậu', 1, '1973-03-10', '50/2 Đồng Khởi, Trảng Dài', 'CNTT'),
('CNTT03', 'Trần Thị Ngọc', 'Mai', 0, '1979-08-08', '305/2 Huỳnh Văn Nghệ, Bửu Long, Biên Hòa', 'CNTT'),
('CNTT04', 'Thái Quốc', 'Thắng', 1, '1973-03-10', '2/3/4 ĐT 620, Bửu Long, Biên Hòa', 'CNTT'),
('CNTT05', 'Nguyễn Quốc', 'Phong', 1, '1978-08-15', '4 Nguyễn Thiện Thuật, TPHCM', 'CNTT'),
('CNTT06', 'Lý Vinh', 'Toàn', 1, '1985-04-06', '3/2 Tân Vạn, BH', 'CNTT'),
('DDT01', 'Lê Văn', 'Em', 1, '1976-05-05', '3/4 Đồng Khởi, Tam Hiệp, Biên Hòa', 'DDT'),
('DDT02', 'Lê Anh', 'Hùng', 1, '1972-04-03', 'Biên Hòa', 'DDT'),
('DT01', 'Nguyễn Thanh', 'Phong', 1, '1981-10-03', '12 Nguyễn Ái Quốc, Biên Hòa', 'DT'),
('DT02', 'Phạm Thị Thanh', 'Thủy', 0, '1977-03-08', '34/2 Phan Văn Thuận', 'DT'),
('DT03', 'Nguyễn Văn', 'Quang', 1, '2001-02-03', '23 Nguyễn Văn Thuận, Tân Mai, BH', 'DT'),
('TCHC01', 'Nguyễn Thị', 'Nga', 0, '1985-07-07', '6/6 Nguyễn Ái Quốc, Tân Phong, Biên Hòa', 'TCHC'),
('TCHC02', 'Cao Thị', 'Xuân', 0, '1970-01-01', '12 tổ 2 KP1 Tân Hiệp, BH', 'TCHC');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `mapb` varchar(10) NOT NULL,
  `tenpb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`mapb`, `tenpb`) VALUES
('CNTT', 'Khoa công nghệ thông tin'),
('DDT', 'Khoa điện tử'),
('DT', 'Phòng đào tạo'),
('TCHC', 'Phòng tổ chức hành chính');

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
  ADD PRIMARY KEY (`mapb`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien_phongban` FOREIGN KEY (`mapb`) REFERENCES `phongban` (`mapb`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
