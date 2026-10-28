-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2026 at 08:14 AM
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
-- Database: `qlsinhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `ketqua`
--

CREATE TABLE `ketqua` (
  `MaSV` varchar(5) NOT NULL,
  `MaMon` varchar(5) NOT NULL,
  `Diem` int(11) NOT NULL
) ;

--
-- Dumping data for table `ketqua`
--

INSERT INTO `ketqua` (`MaSV`, `MaMon`, `Diem`) VALUES
('SV01', 'M1', 8),
('SV01', 'M2', 6),
('SV01', 'M3', 7),
('SV01', 'M4', 8),
('SV02', 'M1', 7),
('SV02', 'M2', 3),
('SV02', 'M3', 2),
('SV02', 'M4', 5),
('SV03', 'M1', 5),
('SV03', 'M2', 7),
('SV03', 'M3', 8),
('SV03', 'M4', 10),
('SV04', 'M1', 4),
('SV04', 'M2', 8),
('SV04', 'M3', 7),
('SV04', 'M4', 7),
('SV05', 'M1', 8),
('SV05', 'M2', 8),
('SV05', 'M3', 8),
('SV05', 'M4', 4),
('SV06', 'M1', 9),
('SV06', 'M2', 9),
('SV06', 'M3', 4),
('SV06', 'M4', 9),
('SV07', 'M1', 9),
('SV07', 'M2', 4),
('SV07', 'M3', 10),
('SV07', 'M4', 5),
('SV08', 'M1', 9),
('SV08', 'M2', 6),
('SV08', 'M3', 8),
('SV08', 'M4', 6),
('SV09', 'M1', 9),
('SV09', 'M2', 6),
('SV09', 'M3', 10),
('SV09', 'M4', 8),
('SV10', 'M1', 9),
('SV10', 'M2', 5),
('SV10', 'M3', 6),
('SV10', 'M4', 5);

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `MaKhoa` varchar(5) NOT NULL,
  `TenKhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`MaKhoa`, `TenKhoa`) VALUES
('K3', 'Công nghệ ô tô'),
('K1', 'Công nghệ thông tin'),
('K4', 'Kế toán'),
('K5', 'May thời trang'),
('K2', 'Điện');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `MaLop` varchar(5) NOT NULL,
  `TenLop` varchar(50) NOT NULL,
  `MaKhoa` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`, `MaKhoa`) VALUES
('L1', 'CT01', 'K1'),
('L2', 'CT02', 'K2'),
('L3', 'CT03', 'K3'),
('L4', 'CT04', 'K4'),
('L5', 'CT05', 'K5');

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMon` varchar(5) NOT NULL,
  `TenMon` varchar(45) NOT NULL,
  `SoTinChi` int(11) NOT NULL
) ;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`MaMon`, `TenMon`, `SoTinChi`) VALUES
('M1', 'Thiết kế web', 6),
('M2', 'Access', 4),
('M3', 'Word', 3),
('M4', 'Tiếng anh giao tiếp', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `MaSV` varchar(5) NOT NULL,
  `Ho` varchar(50) NOT NULL,
  `Ten` varchar(20) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(45) DEFAULT NULL,
  `DiaChi` varchar(50) DEFAULT NULL,
  `DienThoai` varchar(10) DEFAULT NULL,
  `MaLop` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`MaSV`, `Ho`, `Ten`, `GioiTinh`, `NgaySinh`, `NoiSinh`, `DiaChi`, `DienThoai`, `MaLop`) VALUES
('SV01', 'Phạm Diệu', 'Linh', 0, '2003-01-10', 'TP.HCM', 'Biên Hòa Đồng Nai', '0847232834', 'L1'),
('SV02', 'Phạm Hà', 'Linh', 0, '2003-04-24', 'ĐN', 'quận 1 Tp HCM', '0247243834', 'L1'),
('SV03', 'Tạ Quang', 'Minh', 1, '2003-10-10', 'TP.HCM', 'Biên Hòa Đồng Nai', '0134232834', 'L1'),
('SV04', 'Trương Minh', 'Đức', 1, '2003-08-14', 'ĐN', 'ĐN', NULL, 'L1'),
('SV05', 'Trần Khánh', 'Chi', 0, '2003-05-10', 'TP.HCM', 'Biên Hòa Đồng Nai', '0845232834', 'L1'),
('SV06', 'Phạm Anh', 'Thư', 0, '2003-12-11', 'TP.HCM', 'ĐN', '0347532834', 'L2'),
('SV07', 'Đỗ Quân', 'Anh', 1, '2003-11-10', 'ĐN', 'quận 1 Tp HCM', '0946232834', 'L2'),
('SV08', 'Đỗ Thanh', 'Phong', 1, '2003-03-11', 'ĐN', 'ĐN', '0544222834', 'L2'),
('SV09', 'Đỗ Ngọc', 'Anh', 0, '2003-04-12', 'ĐN', 'ĐN', NULL, 'L2'),
('SV10', 'Phạm Ngọc', 'Nam', 1, '2003-03-05', 'ĐN', 'quận 1 Tp HCM', '0234232834', 'L2'),
('SV11', 'Đỗ Hoàng', 'Duy', 1, '2003-10-12', 'TP.HCM', 'quận 2 Tp HCM', '0382364372', 'L3'),
('SV12', 'Trần Thị', 'Oanh', 0, '2003-01-22', 'TP.HCM', 'quận 1 Tp HCM', '0238746278', 'L3'),
('SV13', 'Phạm Quốc', 'Việt', 1, '2003-03-12', 'TP.HCM', 'Biên Hòa Đồng Nai', NULL, 'L3'),
('SV14', 'Võ Thanh', 'Hà', 1, '2003-04-24', 'ĐN', 'quận 1 Tp HCM', '0245643834', 'L3'),
('SV15', 'Tạ Quang', 'Thắng', 1, '2003-12-10', 'ĐN', 'ĐN', '0238230834', 'L3'),
('SV16', 'Trương Minh', 'Tuấn', 1, '2003-01-16', 'ĐN', 'ĐN', NULL, 'L4'),
('SV17', 'Trần Khánh', 'Linh', 0, '2003-12-10', 'ĐN', 'quận 1 Tp HCM', '0245532834', 'L4'),
('SV18', 'Phạm Minh', 'Thư', 0, '2003-01-21', 'ĐN', 'ĐN', '0345932830', 'L4'),
('SV19', 'Đỗ Quân', 'Hà', 1, '2003-12-10', 'ĐN', 'ĐN', '0940230834', 'L4'),
('SV20', 'Đỗ Thanh', 'Tùng', 1, '2003-03-11', 'ĐN', 'quận 1 Tp HCM', '0540220834', 'L4'),
('SV21', 'Đỗ Ngọc', 'Ánh', 0, '2003-04-12', 'ĐN', 'ĐN', NULL, 'L5'),
('SV22', 'Phạm Ngọc Minh', 'Thư', 0, '2003-03-05', 'ĐN', 'quận 1 Tp HCM', '0234030834', 'L5'),
('SV23', 'Nguyễn Minh', 'Tuấn', 1, '2003-03-05', 'ĐN', 'ĐN', '0234202834', 'L5'),
('SV24', 'Trần Anh', 'Thư', 0, '2003-02-05', 'ĐN', 'quận 1 Tp HCM', '0234232034', 'L5'),
('SV25', 'Phạm Kiều', 'Oanh', 1, '2003-03-20', 'ĐN', 'quận 1 Tp HCM', '0204231834', 'L5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`MaSV`,`MaMon`),
  ADD KEY `MaMon` (`MaMon`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`MaKhoa`),
  ADD UNIQUE KEY `TenKhoa_UNIQUE` (`TenKhoa`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `MaKhoa` (`MaKhoa`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMon`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `MaLop` (`MaLop`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ketqua`
--
ALTER TABLE `ketqua`
  ADD CONSTRAINT `ketqua_ibfk_1` FOREIGN KEY (`MaSV`) REFERENCES `sinhvien` (`MaSV`),
  ADD CONSTRAINT `ketqua_ibfk_2` FOREIGN KEY (`MaMon`) REFERENCES `monhoc` (`MaMon`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`MaKhoa`) REFERENCES `khoa` (`MaKhoa`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
