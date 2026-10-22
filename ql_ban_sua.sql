-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2026 at 05:46 AM
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
-- Database: `ql_ban_sua`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_hoa_don`
--

CREATE TABLE `ct_hoa_don` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ma_sua` varchar(6) NOT NULL,
  `So_luong` int(11) NOT NULL,
  `Don_gia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_hoa_don`
--

INSERT INTO `ct_hoa_don` (`So_hoa_don`, `Ma_sua`, `So_luong`, `Don_gia`) VALUES
('D001', 'AB001', 2, 107000),
('D001', 'DL0001', 12, 41000),
('D001', 'NTF002', 8, 45000),
('D001', 'VNM012', 4, 103500),
('D002', 'DL0001', 2, 41000),
('D002', 'MJ0001', 5, 196000),
('D002', 'MJ0004', 3, 198000),
('D003', 'AB001', 8, 107000),
('D003', 'AB003', 17, 87000),
('D003', 'DL0006', 13, 11500),
('D004', 'AB001', 15, 107000),
('D004', 'AB002', 25, 107000),
('D004', 'NTF001', 10, 46500),
('D004', 'VNM012', 8, 103500);

-- --------------------------------------------------------

--
-- Table structure for table `hang_sua`
--

CREATE TABLE `hang_sua` (
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ten_hang_sua` varchar(100) NOT NULL,
  `Dia_chi` varchar(200) NOT NULL,
  `Dien_thoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hang_sua`
--

INSERT INTO `hang_sua` (`Ma_hang_sua`, `Ten_hang_sua`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('AB', 'Abbott', 'Địa chỉ Abbott', '0123456', 'abbott@vnm.com'),
('DL', 'Dutch Lady', 'Khu công nghiệp Biên Hòa - Đồng Nai', '7826451', 'dutchlady@dl.com'),
('DM', 'Dumex', 'Khu công nghiệp Sóng Thần Bình Dương', '6258943', 'dumex@dm.com'),
('DS', 'Daisy', 'Khu công nghiệp Sóng Thần Bình Dương', '5789321', 'daisy@ds.com'),
('MJ', 'Mead Jonhson', 'Công ty nhập khẩu Việt Nam', '8741258', 'meadjohn@mj.com'),
('NTF', 'Nutifood', 'Khu công nghiệp Sóng Thần Bình Dương', '7895632', 'nutifood@ntf.com'),
('VNM', 'Vinamilk', '123 Nguyễn Du - Quận 1 - TP.HCM', '8794561', 'vinamilk@vnm.com');

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

CREATE TABLE `hoa_don` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ngay_HD` date NOT NULL,
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Tri_gia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`So_hoa_don`, `Ngay_HD`, `Ma_khach_hang`, `Tri_gia`) VALUES
('D001', '0000-00-00', 'kh001', 1480000),
('D002', '0000-00-00', 'kh002', 1656000),
('D003', '0000-00-00', 'kh003', 2484500),
('D004', '0000-00-00', 'kh002', 5573000);

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Ten_khach_hang` varchar(100) NOT NULL,
  `Phai` tinyint(1) NOT NULL,
  `Dia_chi` varchar(200) NOT NULL,
  `Dien_thoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`Ma_khach_hang`, `Ten_khach_hang`, `Phai`, `Dia_chi`, `Dien_thoai`, `Email`) VALUES
('kh001', 'Khuất Thùy Phương', 1, 'A21 Nguyễn Oanh quận Gò Vấp', '9874125', ''),
('kh002', 'Đỗ Lâm Thiên', 0, '357 Lê Hồng Phong Q.10', '8351056', ''),
('kh003', 'Phạm Thị Nhung', 1, '56 Đinh Tiên Hoàng quận 1', '9745698', ''),
('kh004', 'Nguyễn Khắc Thiện', 0, '12bis Đường 3-2 quận 10', '8769128', ''),
('kh005', 'Tô Trần Hồ Giảng', 0, '75 Nguyễn Kiệm quận Gò Vấp', '5792564', ''),
('kh006', 'Nguyễn Kiến Thi', 1, '357 Lê Hồng Phong Q.10', '9874125', ''),
('kh008', 'Nguyễn Anh Tuấn', 0, '1/2bis Nơ Trang Long Q.BT TP.HCM', '8753159', '');

-- --------------------------------------------------------

--
-- Table structure for table `loai_sua`
--

CREATE TABLE `loai_sua` (
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Ten_loai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loai_sua`
--

INSERT INTO `loai_sua` (`Ma_loai_sua`, `Ten_loai`) VALUES
('SB', 'Sữa bột'),
('SC', 'Sữa chua'),
('SD', 'Sữa đặc'),
('ST', 'Sữa tươi');

-- --------------------------------------------------------

--
-- Table structure for table `sua`
--

CREATE TABLE `sua` (
  `Ma_sua` varchar(6) NOT NULL,
  `Ten_sua` varchar(100) NOT NULL,
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Trong_luong` int(11) NOT NULL,
  `Don_gia` int(11) NOT NULL,
  `TP_Dinh_duong` text NOT NULL,
  `Loi_ich` text NOT NULL,
  `Hinh` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sua`
--

INSERT INTO `sua` (`Ma_sua`, `Ten_sua`, `Ma_hang_sua`, `Ma_loai_sua`, `Trong_luong`, `Don_gia`, `TP_Dinh_duong`, `Loi_ich`, `Hinh`) VALUES
('AB001', 'Gain Advance', 'AB', 'SB', 400, 107000, 'Sữa không béo, dầu thực vật, đường lactose, đường ...', 'Sữa bột Gain Advance sữa bột tiếp theo giàu đạmTPA...', 's_abbott_gainadvance_bot_400.jpg'),
('AB002', 'Gain IQ', 'AB', 'SB', 400, 107000, 'GAIN IQ có nguồn đạm chất lượng cao, hỗn hợp dầu t...', 'Nhằm thúc đẩy sự tăng trưởng của trẻ và đảm bảo nã...', 's_abbott_ganiq.jpg'),
('AB003', 'Abbott Grow', 'AB', 'SB', 400, 87000, 'Sữa toàn phần, sữa bột không béo, mật bắp, đường I...', 'Sữa GROW được đặc chế và gia tăng thêm các loạ...', 's_abbott_grow_400.jpg'),
('AB004', 'Abbott Grow School', 'AB', 'SB', 400, 87000, 'Năng lượng, taurine, choline, canxi, khoáng chất', 'Sữa dinh dưỡng cho trẻ từ 6 tháng tuổi trở lên. Bổ...', 's_abbott_school_bot_400.jpg'),
('AB005', 'Abbott Pedia Sure', 'AB', 'SB', 400, 146000, 'Các dưỡng chất và PEDIASURE với Synbiotics và MCT', 'cung cấp nguồn dinh dưỡng đầy đủ và cân đối cho tr...', 's_abbott_PediaSure_bot_400.jpg'),
('AB006', 'Similac Neo Sure', 'AB', 'SB', 370, 145000, 'hứa LCPUFA (axit béo không no, chuỗi dài và nhiều ...', '- Giúp cải thiện đáng kể sự phát triển thị giác và ...', 's_abbott_similac_400.jpg'),
('DL0001', 'Sữa bột nguyên kem Cô Gái Hà Lan', 'DL', 'SD', 400, 41000, 'chất dinh dưỡng, vitamin và khoáng chất, đặc biệt ...', 'Cung cấp cho cơ thể đầy đủ dưỡng chất', 's_dutchlady_bot_giay_400.jpg'),
('DL0002', 'Canximex', 'DL', 'SB', 900, 106000, '- Sữa giàu canxi, ít béo Calcimex với hương vị thơ...', '- Giúp giảm thiểu nguy cơ mật xương, phòng ngừa lo...', 's_dutchlady_canximex_900.jpg'),
('DL0003', 'Friso', 'DL', 'SB', 400, 52000, '- Bổ sung các dinh dưỡng cần thiết như: nucleotide...', '- Giúp tăng cường hệ miễn dịch và phát triển trí n...', 's_dutchlady_friso_400.jpg'),
('DL0004', 'Cô Gái Hà Lan 123', 'DL', 'SB', 400, 52600, 'Cô Gái Hà Lan 123 là nhãn hiệu sữa duy nhất cung c...', 'Giúp hệ thần kinh của trẻ minh mẫn để tiếp thu thô...', 's_dutchlady_123_bot.jpg'),
('DL0005', 'Cô Gái Hà Lan 456', 'DL', 'SB', 400, 49500, 'Cô Gái Hà Lan 456 là nhãn hiệu sữa duy nhất cung c...', 'Giúp hệ thần kinh của trẻ minh mẫn để tiếp thu thô...', 's_dutchlady_bot_giay_456_400.jpg'),
('DL0006', 'Sữa đặc Trường Sinh', 'DL', 'SD', 360, 11500, 'Được chế biến từ sữa bò cao cấp, bột sữa, chất béo...', 'Đáp ứng mọi nhu cầu sử dụng: khuấy với nước ấm, la...', 's_dutchlady_dac_truong_sinh.jpg'),
('DL0007', 'Sữa đặc Hoàn Hảo', 'DL', 'SD', 360, 9800, 'Được chế biến từ sữa bò, bột sữa, đường tinh chế v...', 'Mang đến cho bạn hương vị ngọt dịu và béo ngậy khi ...', 's_dutchlady_dac_hoan_hao.jpg'),
('DL0008', 'Sữa chua Cô Gái Hà Lan', 'DL', 'SC', 100, 3000, 'Cung cấp đầy đủ các chất dinh dưỡng', 'Đặc biệt không sử dụng chất bảo quản, với vị ngọt ...', 's_dutchlady_chua.jpg'),
('DL0009', 'Sữa tươi tiệt trùng Cô Gái Hà Lan', 'DL', 'ST', 180, 3500, 'Với hương vị tươi ngon, cùng công thức Active Care...', 'Giúp bạn luôn năng động và khỏe mạnh, sữa tiệt trù...', 's_dutchlady_tuoi.jpg'),
('DL0010', 'Sữa chua uống Cô Gái Hà Lan', 'DL', 'SC', 110, 2500, 'Vị chua ngọt thơm ngon và hấp dẫn', 'Giúp trẻ luôn vui tươi và năng động để khám phá th...', 's_dutchlady_chua_uong.jpg'),
('DL0011', 'Fristi', 'DL', 'ST', 180, 3600, 'Canxi, đạm, vitamin, các khoáng chất, PHA', 'giúp bạn luôn có làn da mịn màng, cơ thể cân đối', 's_dutchlady_fristi.jpg'),
('DS0001', 'Daisy Không Đường', 'DS', 'SB', 900, 79000, 'Khoáng chất, taurine, vitamin D3, sắt, đạm...', '- Chống loãng xương, giúp xương chắc khoẻ. - Phòng...', 's_daisy_900.jpg'),
('DS0002', 'Daisy Vani', 'DS', 'SB', 454, 41000, '- Sữa nguyên kem hương vani với hàm lượng canxi và...', '- Chống loãng xương, giúp xương chắc khoẻ. - Phòng...', 's_daisy_bot_400.jpg'),
('MJ0001', 'Enfa Mama A+', 'MJ', 'SB', 900, 196000, '- Khoáng chất, taurine, vitamin D3, sắt, đạm...', '- Bổ sung đầy đủ nguồn dinh dưỡng cần thiết giúp b...', 's_meadjohnson_enfamama.jpg'),
('MJ0002', 'EnfaLac', 'MJ', 'SB', 400, 102000, 'Bổ sung DHA, chất sắt', 'Sữa bột Enfalac giai đoạn 1 cho trẻ từ 0- 6 tháng ...', 's_meadjohnson_enfalac.jpg'),
('MJ0003', 'EnfaGrow', 'MJ', 'SB', 400, 96000, 'Chất đạm, DHA, ARA, Omega, hương mật ong.', 'Sữa bột Enfagrow giai đoạn 3 có chứa DHA giúp phát...', 's_meadjohnson_enfagrow.jpg'),
('MJ0004', 'EnfaPro', 'MJ', 'SB', 900, 198000, 'DHA, axit béo, Omega 3 & 6, Omega 9 & Nucleotides....', 'Sữa Enfapro giai đoạn 2 với công thức có D...', 's_meadjohnson_enfapro.jpg'),
('MJ0005', 'EnfaPro A+', 'MJ', 'SB', 900, 241000, 'Đạm, ARA, DHA, vitamin và khoáng chất.', 'Sữa Enfapro A+ 2 chứa DHA và ARA hỗ trợ phát triển...', 's_meadjohnson_enfaproA.jpg'),
('NTF001', 'Nuti Mum', 'NTF', 'SB', 400, 46500, 'Sữa bột NutiMum giàu dinh dưỡng, cung cấp protein ...', 'Đáp ứng nhu cầu dinh dưỡng của phụ nữ trong thời k...', 's_nutifood_mum.jpg'),
('NTF002', 'Sữa Nuti Mum Đặc Biệt', 'NTF', 'SB', 400, 45000, 'Thành phần dinh dưỡng chuẩn', 'Lợi ích sản phẩm sữa', 'hinh_ntf002.jpg'),
('VNM012', 'Sữa tươi Vinamilk 1L', 'VNM', 'ST', 1000, 103500, 'Sữa tươi nguyên chất', 'Giúp phát triển chiều cao', 'hinh_vnm012.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD PRIMARY KEY (`So_hoa_don`,`Ma_sua`),
  ADD KEY `Ma_sua` (`Ma_sua`);

--
-- Indexes for table `hang_sua`
--
ALTER TABLE `hang_sua`
  ADD PRIMARY KEY (`Ma_hang_sua`);

--
-- Indexes for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`So_hoa_don`),
  ADD KEY `Ma_khach_hang` (`Ma_khach_hang`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`Ma_khach_hang`);

--
-- Indexes for table `loai_sua`
--
ALTER TABLE `loai_sua`
  ADD PRIMARY KEY (`Ma_loai_sua`);

--
-- Indexes for table `sua`
--
ALTER TABLE `sua`
  ADD PRIMARY KEY (`Ma_sua`),
  ADD KEY `Ma_loai_sua` (`Ma_loai_sua`),
  ADD KEY `Ma_hang_sua` (`Ma_hang_sua`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ct_hoa_don`
--
ALTER TABLE `ct_hoa_don`
  ADD CONSTRAINT `ct_hoa_don_ibfk_1` FOREIGN KEY (`So_hoa_don`) REFERENCES `hoa_don` (`So_hoa_don`),
  ADD CONSTRAINT `ct_hoa_don_ibfk_2` FOREIGN KEY (`Ma_sua`) REFERENCES `sua` (`Ma_sua`);

--
-- Constraints for table `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`Ma_khach_hang`) REFERENCES `khach_hang` (`Ma_khach_hang`);

--
-- Constraints for table `sua`
--
ALTER TABLE `sua`
  ADD CONSTRAINT `sua_ibfk_1` FOREIGN KEY (`Ma_loai_sua`) REFERENCES `loai_sua` (`Ma_loai_sua`),
  ADD CONSTRAINT `sua_ibfk_2` FOREIGN KEY (`Ma_hang_sua`) REFERENCES `hang_sua` (`Ma_hang_sua`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
