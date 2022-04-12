-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 10:43 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web_cn`
--

-- --------------------------------------------------------

--
-- Table structure for table `anh_ct_sp`
--

CREATE TABLE `anh_ct_sp` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(14) NOT NULL,
  `Anh1` text NOT NULL,
  `Anh2` text NOT NULL,
  `Anh3` text NOT NULL,
  `Anh4` text NOT NULL,
  `Anh5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `Ma_DM` varchar(50) NOT NULL,
  `Ten_DM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`Ma_DM`, `Ten_DM`) VALUES
('DT', 'Điện thoại'),
('LT', 'Laptop'),
('TB', 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `Ma_SP` varchar(50) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `Dung_Luong` text NOT NULL,
  `Mau` varchar(10) NOT NULL,
  `Gia` int(11) NOT NULL,
  `So_Luong` int(11) NOT NULL,
  `Thanh_Toan` varchar(200) NOT NULL,
  `Tinh_Trang` varchar(200) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `don_hang`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_tbKieuSP` AFTER INSERT ON `don_hang` FOR EACH ROW UPDATE 
kieu_sp 
SET 
So_Luong_Tong = 
(SELECT 
 So_Luong_Tong 
 FROM 
 kieu_sp 
 WHERE 
 Ma_SP = NEW.Ma_SP AND 
 Dung_Luong = NEW.Dung_Luong AND 
 Mau = NEW.Mau) - NEW.So_Luong 
WHERE 
 Ma_SP = NEW.Ma_SP AND 
 Dung_Luong = NEW.Dung_Luong AND 
 Mau = NEW.Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `info_user`
--

CREATE TABLE `info_user` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `Ho_Ten` varchar(50) NOT NULL,
  `Gioi_Tinh` int(5) NOT NULL,
  `Nam_Sinh` date NOT NULL DEFAULT current_timestamp(),
  `Sdt` int(12) NOT NULL,
  `Email` text NOT NULL,
  `Dia_Chi` varchar(150) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info_user`
--

INSERT INTO `info_user` (`id`, `id_User`, `Ho_Ten`, `Gioi_Tinh`, `Nam_Sinh`, `Sdt`, `Email`, `Dia_Chi`, `Anh`) VALUES
(1, 2, '', 0, '0000-00-00', 0, '', '', ''),
(3, 1, 'hien', 0, '2000-09-08', 865198651, 'fsdf@gmail.com', 'bac ninh', '1649683013Avatar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(50) NOT NULL,
  `Dung_Luong` text NOT NULL,
  `Mau` varchar(50) NOT NULL,
  `So_Luong_Nhap` int(11) NOT NULL,
  `Ngay_Nhap` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `kho`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_SP` AFTER INSERT ON `kho` FOR EACH ROW UPDATE kieu_sp SET So_Luong_Tong = 
(SELECT So_Luong_Tong FROM kieu_sp 
 WHERE Ma_SP = NEW.Ma_SP AND Dung_Luong = NEW.Dung_Luong AND Mau = NEW.Mau) + NEW.So_Luong_Nhap
WHERE Ma_SP = NEW.Ma_SP AND Dung_Luong = NEW.Dung_Luong AND Mau = NEW.Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kieu_sp`
--

CREATE TABLE `kieu_sp` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(14) NOT NULL,
  `Dung_Luong` text NOT NULL,
  `Mau` varchar(50) NOT NULL,
  `So_Luong_Tong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(14) NOT NULL,
  `Ma_DM` varchar(50) NOT NULL,
  `Ma_TH` varchar(50) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `Mo_Ta` varchar(5000) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `san_pham`
--
DELIMITER $$
CREATE TRIGGER `Insert_tt_sp` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO tt_san_pham VALUES ('',NEW.Ma_SP,'','','','','','','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_kieu_sp` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO kieu_sp VALUES ('',NEW.Ma_SP,'','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tb_anh_sp` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO anh_ct_sp VALUES ('',NEW.Ma_SP,'','','','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `Ma_TH` varchar(50) NOT NULL,
  `Ten_TH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`Ma_TH`, `Ten_TH`) VALUES
('IP', 'Iphone'),
('SS', 'SamSung');

-- --------------------------------------------------------

--
-- Table structure for table `tinh_trang`
--

CREATE TABLE `tinh_trang` (
  `id` int(11) NOT NULL,
  `Mo_ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `tt_kho`
-- (See below for the actual view)
--
CREATE TABLE `tt_kho` (
`Ma_SP` varchar(50)
,`Dung_Luong` text
,`Mau` varchar(50)
,`So_Luong_Tong` int(11)
,`So_Luong_Nhap` int(11)
,`Ngay_Nhap` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `tt_san_pham`
--

CREATE TABLE `tt_san_pham` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(14) NOT NULL,
  `Man_Hinh` varchar(255) NOT NULL,
  `Camera_Sau` varchar(255) NOT NULL,
  `Camera_Truoc` varchar(255) NOT NULL,
  `Chip` varchar(255) NOT NULL,
  `Ram` text NOT NULL,
  `Bo_Nho` text NOT NULL,
  `Sim` varchar(255) NOT NULL,
  `Pin_Sac` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `id_positon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `UserName`, `Password`, `id_positon`) VALUES
(1, 'nguyenhien', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'gsfgsf', 'e10adc3949ba59abbe56e057f20f883e', 3);

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `insert_user_info` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO info_user(id,id_User,Ho_Ten,Gioi_Tinh,Nam_Sinh,Sdt,Email,Dia_Chi,Anh) VALUES ('',NEW.id,'','','','','','','')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_position`
--

CREATE TABLE `user_position` (
  `id` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `Ghi_Chu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_position`
--

INSERT INTO `user_position` (`id`, `Level`, `Ghi_Chu`) VALUES
(1, 0, 'QTV'),
(2, 1, 'a'),
(3, 3, 'Thành Viên');

-- --------------------------------------------------------

--
-- Structure for view `tt_kho`
--
DROP TABLE IF EXISTS `tt_kho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tt_kho`  AS SELECT `kho`.`Ma_SP` AS `Ma_SP`, `kho`.`Dung_Luong` AS `Dung_Luong`, `kho`.`Mau` AS `Mau`, `kieu_sp`.`So_Luong_Tong` AS `So_Luong_Tong`, `kho`.`So_Luong_Nhap` AS `So_Luong_Nhap`, `kho`.`Ngay_Nhap` AS `Ngay_Nhap` FROM (`kieu_sp` join `kho`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anh_ct_sp`
--
ALTER TABLE `anh_ct_sp`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`Ma_DM`) USING BTREE;

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_User` (`id_User`,`Ma_SP`);

--
-- Indexes for table `info_user`
--
ALTER TABLE `info_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_User` (`id_User`);

--
-- Indexes for table `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Indexes for table `kieu_sp`
--
ALTER TABLE `kieu_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`,`Ma_SP`),
  ADD KEY `Ma_DM` (`Ma_DM`,`Ma_TH`),
  ADD KEY `Ma_TH` (`Ma_TH`),
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Indexes for table `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`Ma_TH`) USING BTREE;

--
-- Indexes for table `tinh_trang`
--
ALTER TABLE `tinh_trang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tt_san_pham`
--
ALTER TABLE `tt_san_pham`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `Ma_SP` (`Ma_SP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Level` (`id_positon`),
  ADD KEY `id_positon` (`id_positon`);

--
-- Indexes for table `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_user`
--
ALTER TABLE `info_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kieu_sp`
--
ALTER TABLE `kieu_sp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tinh_trang`
--
ALTER TABLE `tinh_trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt_san_pham`
--
ALTER TABLE `tt_san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_position`
--
ALTER TABLE `user_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anh_ct_sp`
--
ALTER TABLE `anh_ct_sp`
  ADD CONSTRAINT `anh_ct_sp_ibfk_1` FOREIGN KEY (`Ma_SP`) REFERENCES `san_pham` (`Ma_SP`) ON DELETE CASCADE;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id`);

--
-- Constraints for table `info_user`
--
ALTER TABLE `info_user`
  ADD CONSTRAINT `info_user_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kieu_sp`
--
ALTER TABLE `kieu_sp`
  ADD CONSTRAINT `kieu_sp_ibfk_1` FOREIGN KEY (`Ma_SP`) REFERENCES `san_pham` (`Ma_SP`) ON DELETE CASCADE;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`Ma_DM`) REFERENCES `danh_muc` (`Ma_DM`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`Ma_TH`) REFERENCES `thuong_hieu` (`Ma_TH`);

--
-- Constraints for table `tt_san_pham`
--
ALTER TABLE `tt_san_pham`
  ADD CONSTRAINT `tt_san_pham_ibfk_1` FOREIGN KEY (`Ma_SP`) REFERENCES `san_pham` (`Ma_SP`) ON DELETE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_positon`) REFERENCES `user_position` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
