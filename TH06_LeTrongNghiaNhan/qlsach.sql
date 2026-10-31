-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2026 at 02:47 AM
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
-- Database: `qlsach`
--

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE `sach` (
  `masach` varchar(8) NOT NULL,
  `tensach` varchar(40) NOT NULL,
  `tacgia` varchar(40) NOT NULL,
  `nxb` varchar(40) DEFAULT 'Nhà xuất bản Trẻ',
  `dongia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `tacgia`, `nxb`, `dongia`) VALUES
('MS001', 'Lập trình PHP & MySQL', 'Nguyễn Văn A', 'Nhà xuất bản Trẻ', 120000),
('MS002', 'Cơ sở dữ liệu SQL', 'Trần Thị B', 'Nhà xuất bản Trẻ', 95000),
('MS003', 'Cấu trúc dữ liệu', 'Lê Văn C', 'NXB Giáo Dục', NULL),
('MS004', 'Lập trình C# nâng cao', 'Phạm Hoàng D', 'Nhà xuất bản Trẻ', 150000),
('MS005', 'Phân tích thiết kế hệ thống', 'Đỗ Anh E', 'NXB Lao Động', 110000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
