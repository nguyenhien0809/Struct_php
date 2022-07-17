-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_web_cn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `Ma_DM` varchar(50) NOT NULL,
  `Ten_DM` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`Ma_DM`, `Ten_DM`) VALUES
('DT', 'Điện thoại'),
('PK', 'Phụ kiện'),
('TB', 'Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dh_tinh_trang`
--

CREATE TABLE `dh_tinh_trang` (
  `id` int(11) NOT NULL,
  `Mo_Ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dh_tinh_trang`
--

INSERT INTO `dh_tinh_trang` (`id`, `Mo_Ta`) VALUES
(1, 'Đang xử lý'),
(2, 'Đã đóng gói'),
(3, 'Đang vận chuyển'),
(4, 'Đã giao hàng'),
(5, 'Trả lại hàng'),
(6, 'Hủy đơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `Ma_DH` text NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `id_Mau` int(11) NOT NULL,
  `So_Luong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `Thanh_Tien` int(11) NOT NULL,
  `Yeu_Cau` varchar(2500) NOT NULL,
  `Thanh_Toan` int(11) NOT NULL DEFAULT 1,
  `id_Tinh_Trang` int(11) NOT NULL DEFAULT 1,
  `Thoi_Gian_DH` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bẫy `don_hang`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_tbKieuSP` AFTER INSERT ON `don_hang` FOR EACH ROW UPDATE 
sp_ton 
SET 
So_Luong = 
(SELECT 
 So_Luong 
 FROM 
sp_ton 
 WHERE 
 id_SP = NEW.id_SP  
 AND sp_ton.id = NEW.id_Mau
) - NEW.So_Luong 
WHERE 
 id_SP = NEW.id_SP 
 AND sp_ton.id = NEW.id_Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Ma_Mau` text NOT NULL,
  `So_Luong_Nhap` int(11) DEFAULT NULL,
  `Ngay_Nhap` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kho`
--

INSERT INTO `kho` (`id`, `id_SP`, `Ma_Mau`, `So_Luong_Nhap`, `Ngay_Nhap`) VALUES
(28, 34, '#fff', 10, '2022-04-26 16:19:20'),
(29, 34, '#000', 12, '2022-04-26 16:19:25'),
(30, 34, '#fff', 5, '2022-04-26 16:19:27'),
(31, 34, '#fff', 3, '2022-04-26 16:43:02');

--
-- Bẫy `kho`
--
DELIMITER $$
CREATE TRIGGER `Update_SL_SP` AFTER INSERT ON `kho` FOR EACH ROW UPDATE 
sp_ton 
SET
So_Luong = 
(SELECT 
 So_Luong
 FROM 
 sp_ton 
 WHERE 
 id_SP = NEW.id_SP 
 AND sp_ton.Ma_Mau = NEW.Ma_Mau
 ) + NEW.So_Luong_Nhap
WHERE 
id_SP = NEW.id_SP 
AND sp_ton.Ma_Mau = NEW.Ma_Mau
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `Ma_SP` varchar(50) NOT NULL,
  `Ma_DM` varchar(50) NOT NULL,
  `Ma_TH` varchar(50) NOT NULL,
  `Ten_SP` varchar(100) NOT NULL,
  `Loai` text NOT NULL,
  `Gia` int(11) NOT NULL,
  `Sale` int(11) NOT NULL,
  `Gia_Giam` int(11) NOT NULL,
  `Danh_Gia` int(11) NOT NULL,
  `Mo_Ta` varchar(10000) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `Ma_SP`, `Ma_DM`, `Ma_TH`, `Ten_SP`, `Loai`, `Gia`, `Sale`, `Gia_Giam`, `Danh_Gia`, `Mo_Ta`, `Anh`) VALUES
(34, 'xmm4', 'DT', 'XM', 'xiaomi mix 4', '256GB', 16550000, 10, 14895000, 5, 'fggf', '1650884436Xiaomi-Mi-Mix-4.jpg'),
(37, 'SSGLX-S9', 'DT', 'SS', 'Samsung Galaxy s9', '64GB', 4000000, 0, 4000000, 3, 'Người ta nói cái gì không bể thì đừng có vá, điều này rất đúng khi nói đến chiếc S9. Nó không tìm cách thay đổi cái gì đã hoàn hảo, chỉ chỉnh sửa lại cấu hình ở bất kì chỗ nào có thể - và kết quả là rất tuyệt vời.\r\nChiếc điện thoại Samsung mới này vẫn đi theo triết lí thiết kế tương tự như Galaxy S8 với khung viền kim loại cứng cáp cùng mặt lưng kính bóng bẩy bo cong mềm mại. Đặc biệt, phần khung viền của Galaxy S9 được hoàn thiện bằng kim loại nhám giúp cầm nắm chắc tay tốt hơn hẳn, chứ không bóng loáng như thời S8. \r\nGalaxy S9 có kích thước màn hình vô cực tỉ lệ 18.5:9, giữ nguyên so với người tiền nhiệm, cụ thể là 5.8 inch. Sử dụng tấm nền Super AMOLED như truyền thống trước giờ của các flagship Samsung, độ phân giải 2K+ đi cùng công nghệ hiển thị HDR 10 ấn tượng.\r\nS9 sử dụng bộ chip set mới: Exynos 9810 với tốc độ cao hơn 20% so với con chip Exynos 8895 mà S8 sử dụng. Nhưng mà điểm Samsung đã đẩy mạnh nhất là về camera. Với khẩu độ có thể thay đổi từ f/1.5 đến f/2.4, bây giờ chiếc Galaxy S9 có thể thống soái vai trò chụp ảnh ngay cả trong môi trường thiếu sáng hoặc thừa sáng. Máy còn đi kèm chức năng quay phim 4K 60fps và quay phim siêu chậm 960fps và định vị chuyển động tự động.\r\nS9 cũng mang theo nhiều thay đổi nhỏ mà người dùng không nhận ra khi cầm trên, nhưng mọi người đều sẽ nhận ra và yêu thích chúng khi họ bắt đầu sử dụng máy. Cặp loa stereo được tinh chỉnh bởi Harman - lần đầu tiên trong lineup của Galaxy S - cho máy khả năng phát âm thanh chân thực với sự hỗ trợ của Dolby Atmos. Sự kết hợp giữa hệ thống khóa máy bằng vân tay, dịnh dạng mặt, và nhận dạng con ngươi là một sự kết hợp mạnh mẽ mà dường như là điều nên có trên mọi chiếc điện thoại tiên tiến.', '1651222805samsung-galaxy-s9.png'),
(38, 'SSGLX-S9', 'DT', 'SS', 'Samsung Galaxy s9', '128GB', 5500000, 0, 5500000, 3, '', '1651222805samsung-galaxy-s9.png'),
(39, 'MOPHIE-PD-18W-C', 'PK', 'MP', 'Củ sạc mophie Power Delivery 18W usb-c', '18W', 590000, 55, 265000, 4, 'Sạc Mophie Power Delivery 18W USB-C – Phụ kiện sạc nhanh chính hãng\r\nHiện nay, để tối ưu hóa tốc độ sạc cũng như thay đổi chuẩn để phù hợp với công nghệ sạc trên thiết bị hầu hết các hãng sản xuất sạc đều dần đổi sang sử dụng chuẩn USB-C. Thiết bị của bạn đang sử dụng USB-C và bạn đang tìm kiếm mua cho mình một bộ cáp sạc vừa phù hợp với jack dây sạc vừa phù hợp với chiếc điện thoại để không gây ảnh hưởng tốc độ sạc. Sạc Mophie Power Delivery 18W USB-C là sự lựa chọn hoàn hảo cho bạn cả về tốc độ cũng như độ an toàn.\r\nThiết kế nhỏ gọn, chất liệu nhựa nhám chống bám bụi bẩn, bền bỉ\r\nSạc Mophie Power Delivery 18W USB-C với thiết kế rất nhỏ gọn, chiếm diện tích không đáng kể khi cắm vào ổ điện, dễ dàng gắn cùng các đầu cắm điện khác trên cùng bản điện. Không những vậy sạc còn rất thuận tiện để vào túi xách mang đi ra ngoài với khối lượng chỉ 50g. Tuy kích thước nhỏ và khối lượng không đáng kể nhưng sạc Mophie Power Delivery 18W sẽ làm bạn ngạc nhiên với tốc độ của nó.\r\nHãng sản xuất đã thiết kế cho sạc Mophie Power Delivery 18W USB-C sử dụng chất liệu nhựa nhám tổng hợp cao cấp hạn chế nứt vỡ khi va đập. Lớp sơn đen nhám được bao phủ bên ngoài sản phẩm tạo nên sự sang trọng và tinh tế cho bộ sạc. Hơn thế nữa, lớp vỏ đen nhám có tính năng chống bám vân tay và mồ hôi giúp cho sạc của bạn luôn sạch sẽ mọi lúc.\r\nTrang bị công nghệ sạc nhanh công suất 18W, ổn định dòng điện khi sạc\r\nSạc Mophie Power Delivery 18W USB-C có công suất sạc lên đến 18W hỗ trợ sạc nhanh mọi thiết bị sử dụng cổng USB-C Power Delivery giúp thiết bị của bạn đầy pin nhanh chóng, giảm thời gian chờ đợi khi sạc. Với công suất sạc lên đến 18W bạn hoàn toàn có thể tự tin sử dụng từ các dòng điện thoại cao cấp đến thấp hơn đều được sạc đầy pin nhanh đáng kể mà không ảnh hưởng đến pin của thiết bị.\r\nSạc Mophie Power Delivery 18W USB-C có điện áp đầu ra và đầu vào ổn định giúp cho cường độ dòng điện được truyền luôn giữ được đúng định mức và xuyên suốt trong quá trình sạc. Khi sạc thiết bị của bạn sẽ không bị quá tải và nóng tối ưu tốt thời gian sạc cũng như tuổi thọ của viên pin.\r\nTương thích nhiều thiết bị hiện nay, đạt chuẩn an toàn chống cháy nổ\r\nSạc Mophie Power Delivery 18W USB-C với điện áp chuẩn đầu ra lần lượt 5V-3A, 9V-2A, 12V-1.5A phù hợp hầu hết các điện thoại, máy tính bảng hiện nay. Khi bạn mua sạc Mophie Power Delivery 18W 1 USB-C, bạn sẽ không cần phải lo nghĩ đến việc sạc có phù hợp với thiết bị của mình hay không sạc sẽ tự điều chỉnh mức chuẩn đầu ra phù hợp với thiết bị không ảnh hưởng đến pin của thiết bị.\r\nKhi bạn chọn mua sạc điều bạn quan tâm là độ an toàn của nó có đạt các tiêu chuẩn về an toàn chống cháy nổ hay không. Đối với sạc Mophie Power Delivery 18W USB-C bạn hoàn toàn có thể yên tâm sử dụng về độ an toàn của nó. Sạc Mophie Power Delivery 18W đã trải qua các vòng thử nghiệm khắt khe và đạt các tiêu chuẩn an toàn về cháy nổ toàn cầu.\r\nMua sạc Mophie Power Delivery 18W USB-C giá rẻ, chính hãng tại Dat-G mobie\r\nVới những tính năng tuyệt vời mang đến cho người sử dụng, sạc Mophie Power Delivery 18W USB-C chính hãng sẽ là sự lựa chọn hoàn hảo về tốc độ cũng như vẻ ngoài đen nhám sang trọng cho bạn. Phụ kiện được bán với giá ưu đãi cùng chính sách bảo hành cực tốt. Dat-G mobie xứng đáng là nơi để quý khách hàng tin tưởng lựa chọn mua sạc Mophie Power Delivery 18W 1 USB-C. Khi mua sạc Mophie 18W chính hãng tại đây bạn sẽ được bảo hành 24 tháng chính hãng.', '1651482485cu-sac-mophie-pd-18w-usb-c.png'),
(40, 'SS-S22ULTRA-5G', 'DT', 'SS', 'Samsung Galaxy s22 Ultra 5g', '8GB-128GB', 29190000, 0, 29190000, 4, 'Đánh giá hiệu năng Samsung S22 Ultra với con chip Snapdragon 8 Gen 1\r\nSau nhiều năm chạy chip Exynos thì S22 Ultra là mẫu điện thoại Samsung chính hãng hiếm hoi tại Việt Nam chạy Snapdragon 8 Gen 1. Trước đi đánh giá hiệu năng S22 Ultra, cùng điểm lại một số thông số cấu hình:\r\n\r\n-       Vi xử lý: Snapdragon 8 Gen 1\r\n\r\n-       Bộ nhớ RAM: 8GB hoặc 12GB.\r\n\r\n-       Bộ nhớ trong: 128GB hoặc 256GB hoặc 512GB.\r\n\r\nSau đây là điêm số benchmark của Galaxy S22 Ultra được các trang chuyên công nghệ thực hiện.\r\n\r\nĐiểm Geekbench 5 của Galaxy S22 Ultra PCMag thực hiện:\r\n\r\n-       Điểm đa nhân: 3.433 điểm \r\n\r\n-       Điểm đơn nhân: 1.232\r\n\r\nĐiểm số này có sự khác biệt so với chip Snapdragon 888 được ra mắt nắm 2020. Cụ thể, điểm đơn lõi tăng 13% và đa lõi tăng 9%. Nhưng trên thang điểm chuẩn của GFXBench thì ở một số tác vụ nhất định, con chip này cho hiệu năng tốt hơn khoảng 20%.\r\nBộ nhớ S22 Ultra được nâng cấp với ba phiên bản lựa chọn\r\nTrước nhiều đồn đoán rằng  Samsung Galaxy S22 Ultra có thể cho ra mắt phiên bản bộ nhớ 1TB thì thực tế hãng chỉ cho ra mắt ba phiên bản cấu hình bộ nhớ, trong đó phiên bản bộ nhớ cao nhất là 512GB.\r\n\r\nGalaxy S22 Ultra 128GB bộ nhớ trong: Đây là phiên bản cấu hình tiêu chuẩn, phù hợp với nhu cầu sử dụng của nhiều người dùng.\r\n\r\nGalaxy S22 Ultra 256GB bộ nhớ trong: Nếu người dùng có như cầu lưu trữ hình ảnh, video lớn thì bộ nhớ 256GB là lựa chọn đáng để tham khảo.\r\n\r\nGalaxy S22 Ultra 512GB bộ nhớ trong: Với phiên bản 512GB bộ nhớ sẽ phù hợp với những người dùng đòi hỏi không gian lưu trữ lớn như quay phim, chụp ảnh 8K hay lưu trữ dữ liệu lớn.\r\n\r\nNgoài ba phiên bản bộ nhớ lưu trữ thì Samsung cũng cung cấp tới haio phiên bản bộ nhớ RAM lần lượt là 8GB và 12GB cho người dùng lựa chọn.\r\nSamsung S22 Ultra hỗ trợ bút S Pen tiện lợi\r\nS Pen là sản phẩm đặc trưng của dòng Samsung Note. Tuy thế hệ S vẫn có thể sử dụng bút S Pen nhưng sẽ phải mua riêng và không thể cất bên trong điện thoại. Nhưng với Samsung S22 Ultra, Samsung đã trang bị khe cắm S Pen trên thiết bị giúp người dùng có thể tiện lợi khi sử dụng. Tuy nhiên khác với trước đó là Spen sẽ có cùng màu với máy thì năm nay, S-Pen sẽ chỉ có màu đen. \r\n\r\nVới bút Spen, giời đây người dùng Samsung S22 Ultra có thể thoải mái ghi chú, điều khiển điện thoại như trên các dòng Samsung Note. Bút Spen mới này cũng được cải thiện độ trễ mang lại trải nghiệm dùng chân thực từ viết chữ, vẽ hay ghi chú. ', '16514846001.png');

--
-- Bẫy `san_pham`
--
DELIMITER $$
CREATE TRIGGER `Insert_tb_tt_san_pham` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_thong_so VALUES('',NEW.id,'','','','','','','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `in_tb_sp_image` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_image VALUES('',NEW.id,'','','','','')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `inser_tb_gia` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_gia VALUES('',NEW.id,NEW.Gia,0,NEW.Gia)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_tb_sp_ton` AFTER INSERT ON `san_pham` FOR EACH ROW INSERT INTO sp_ton VALUES('',NEW.id,'','',0)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `Ten_Slider` varchar(100) NOT NULL,
  `Loai` int(11) NOT NULL,
  `Anh` text NOT NULL,
  `Tinh_Trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `Ten_Slider`, `Loai`, `Anh`, `Tinh_Trang`) VALUES
(14, 'k', 1, '1651484944s22.png', 0),
(15, 'n', 1, '1651485202Nokia_G21.png', 0),
(16, 'i', 1, '1651485213ip13-xl-sh-690-300-max.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sp_ban_chay`
-- (See below for the actual view)
--
CREATE TABLE `sp_ban_chay` (
`id` int(11)
,`Ma_SP` varchar(50)
,`Ma_DM` varchar(50)
,`Ma_TH` varchar(50)
,`Ten_SP` varchar(100)
,`Loai` text
,`Gia` int(11)
,`Sale` int(11)
,`Gia_Giam` int(11)
,`Mo_Ta` varchar(10000)
,`Anh` text
,`So_Luong_Don` bigint(21)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_danh_gia`
--

CREATE TABLE `sp_danh_gia` (
  `id` int(11) NOT NULL,
  `Ma_SP` text NOT NULL,
  `Ho_Ten` varchar(100) NOT NULL,
  `Email` text NOT NULL,
  `Rate` int(11) NOT NULL,
  `Binh_Luan` varchar(5000) NOT NULL,
  `Thoi_Gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_danh_gia`
--

INSERT INTO `sp_danh_gia` (`id`, `Ma_SP`, `Ho_Ten`, `Email`, `Rate`, `Binh_Luan`, `Thoi_Gian`) VALUES
(1, 'SSGLX-S9', 'FFF', 'FÀ', 3, 'FGFVVB', '2022-05-09 16:03:47'),
(2, 'SSGLX-S9', 'FFF', 'FÀ', 2, 'FGFVVB', '2022-05-09 16:03:47'),
(3, 'SSGLX-S9', 'FFF', 'FÀ', 1, 'FGFVVB', '2022-05-09 16:03:47'),
(4, 'SSGLX-S9', 'FFF', 'FÀ', 5, 'FGFVVB', '2022-05-09 16:03:47'),
(5, '', '', '', 1, '', '2022-05-09 20:38:15'),
(6, 'MOPHIE-PD-18W-C', 'le nguyen hien', 'ná@gmail.com', 3, 'test phan danh gia', '2022-05-09 20:39:06'),
(7, 'xmm4', 'gg', 'gg', 5, 'fâf', '2022-05-09 20:40:06'),
(8, 'MOPHIE-PD-18W-C', 'a', 'add', 5, 'ngon', '2022-05-12 14:53:37');

--
-- Bẫy `sp_danh_gia`
--
DELIMITER $$
CREATE TRIGGER `update_tb_sp_rate` AFTER INSERT ON `sp_danh_gia` FOR EACH ROW UPDATE san_pham SET san_pham.Danh_Gia = 
    
(SELECT SUM(Rate)/COUNT(Ma_SP) 
 FROM sp_danh_gia 
 WHERE Ma_SP = NEW.Ma_SP)
 
 WHERE Ma_SP = NEW.MA_SP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_image`
--

CREATE TABLE `sp_image` (
  `id` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Anh0` text NOT NULL,
  `Anh1` text NOT NULL,
  `Anh2` text NOT NULL,
  `Anh3` text NOT NULL,
  `Anh4` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_image`
--

INSERT INTO `sp_image` (`id`, `id_SP`, `Anh0`, `Anh1`, `Anh2`, `Anh3`, `Anh4`) VALUES
(23, 34, '', '', '1650966562samsung-galaxy-note-20-ultra.jpg', '1650891678Xiaomi-Mi-Mix-4.jpg', '1650891669avt.jpg'),
(26, 37, '', '', '', '', ''),
(27, 38, '', '', '', '', ''),
(28, 39, '16514829661.png', '16514829662.png', '16514829663.png', '16514829664.png', '16514829665.png'),
(29, 40, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_thong_so`
--

CREATE TABLE `sp_thong_so` (
  `id` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Thong_So0` varchar(255) NOT NULL,
  `Thong_So1` varchar(255) NOT NULL,
  `Thong_So2` varchar(255) NOT NULL,
  `Thong_So3` varchar(255) NOT NULL,
  `Thong_So4` varchar(255) NOT NULL,
  `Thong_So5` varchar(255) NOT NULL,
  `Thong_So6` varchar(255) NOT NULL,
  `Thong_So7` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_thong_so`
--

INSERT INTO `sp_thong_so` (`id`, `id_SP`, `Thong_So0`, `Thong_So1`, `Thong_So2`, `Thong_So3`, `Thong_So4`, `Thong_So5`, `Thong_So6`, `Thong_So7`) VALUES
(36, 34, 'fxv', 'zxc', 'vcb', 'nbmffffff', 'fdgccc', 'sda', 'fcgvvv', 'dhbv'),
(39, 37, '', '', '', '', '', '', '', ''),
(40, 38, '', '', '', '', '', '', '', ''),
(41, 39, 'Dòng điện vào	100-240V/ (50-60Hz)', 'Dòng điện ra	5V-3A, 9V-2A, 12V-1.5A (Max)', 'Cổng sạc ra	USB-C', 'Hãng sản xuất	Mophie', '', '', '', ''),
(42, 40, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_ton`
--

CREATE TABLE `sp_ton` (
  `id` int(11) NOT NULL,
  `id_SP` int(11) NOT NULL,
  `Ma_Mau` text NOT NULL,
  `Ten_Mau` varchar(100) NOT NULL,
  `So_Luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_ton`
--

INSERT INTO `sp_ton` (`id`, `id_SP`, `Ma_Mau`, `Ten_Mau`, `So_Luong`) VALUES
(12, 34, '#fff', 'Màu trắng', 4),
(13, 34, '#000', 'Màu đen', 15),
(14, 37, '#935cad', 'Tim', 1),
(15, 37, '#5295cc', 'Xanh', 2),
(16, 38, '#935cad', 'Tim', 2),
(17, 39, '#000', 'Màu đen', 1),
(18, 40, '#000', 'Màu đen', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `id_positon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `UserName`, `Password`, `id_positon`) VALUES
(1, 'nguyenhien', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'gsfgsf', 'e10adc3949ba59abbe56e057f20f883e', 3),
(7, 'hien123', '900150983cd24fb0d6963f7d28e17f72', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `Ho_Ten` varchar(50) NOT NULL,
  `Gioi_Tinh` int(5) NOT NULL,
  `Nam_Sinh` date NOT NULL DEFAULT current_timestamp(),
  `Sdt` int(12) NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Dia_Chi` varchar(150) NOT NULL,
  `Anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_users`
--

INSERT INTO `tb_users` (`id`, `Ho_Ten`, `Gioi_Tinh`, `Nam_Sinh`, `Sdt`, `Email`, `Password`, `Dia_Chi`, `Anh`) VALUES
(1, 'fgghhh', 0, '0000-00-00', 0, '', '', '', ''),
(3, 'hien', 0, '2000-09-08', 865198651, 'fsdf@gmail.com', '', 'bac ninh', '1649683013Avatar.jpg'),
(8, '', 0, '0000-00-00', 0, '', '', '', ''),
(9, 'lê nguyên hiện', 0, '0000-00-00', 865198651, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'aadđ', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `Ma_TH` varchar(50) NOT NULL,
  `Ten_TH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`Ma_TH`, `Ten_TH`) VALUES
('IP', 'Iphone'),
('MP', 'Mophie '),
('SS', 'SamSung'),
('XM', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `tt_kho`
-- (See below for the actual view)
--
CREATE TABLE `tt_kho` (
`id_SP` int(11)
,`Mau` varchar(100)
,`So_Luong_Tong` int(11)
,`So_Luong_Nhap` int(11)
,`Ngay_Nhap` datetime
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_position`
--

CREATE TABLE `user_position` (
  `id` int(11) NOT NULL,
  `Mo_Ta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_position`
--

INSERT INTO `user_position` (`id`, `Mo_Ta`) VALUES
(1, 'QTV'),
(2, 'a'),
(3, 'Thành Viên');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sp_view`
-- (See below for the actual view)
--
CREATE TABLE `sp_view` (
`id` int(11)
,`Ma_SP` varchar(50)
,`Ma_DM` varchar(50)
,`Ma_TH` varchar(50)
,`Ten_SP` varchar(100)
,`Loai` text
,`Gia` int(11)
,`Sale` int(11)
,`Gia_Giam` int(11)
,`Mo_Ta` varchar(10000)
,`Danh_Gia` int(11)
,`Anh` text
,`So_Luong` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnpay`
--

CREATE TABLE `vnpay` (
  `id` int(11) NOT NULL,
  `Ma_DH` int(11) NOT NULL,
  `Noi_Dung` varchar(2500) NOT NULL,
  `Ma_PH` text NOT NULL,
  `Ma_GD` int(11) NOT NULL,
  `Ma_NH` text NOT NULL,
  `Thoi_Gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sp_ban_chay`
--
DROP TABLE IF EXISTS `sp_ban_chay`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_ban_chay`  AS SELECT `san_pham`.`id` AS `id`, `san_pham`.`Ma_SP` AS `Ma_SP`, `san_pham`.`Ma_DM` AS `Ma_DM`, `san_pham`.`Ma_TH` AS `Ma_TH`, `san_pham`.`Ten_SP` AS `Ten_SP`, `san_pham`.`Loai` AS `Loai`, `san_pham`.`Gia` AS `Gia`, `san_pham`.`Sale` AS `Sale`, `san_pham`.`Gia_Giam` AS `Gia_Giam`, `san_pham`.`Mo_Ta` AS `Mo_Ta`, `san_pham`.`Anh` AS `Anh`, count(`don_hang`.`id_SP`) AS `So_Luong_Don` FROM (`san_pham` join `don_hang`) WHERE `san_pham`.`id` = `don_hang`.`id_SP` GROUP BY `san_pham`.`Ma_SP` ORDER BY count(`don_hang`.`id_SP`) DESC ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `tt_kho`
--
DROP TABLE IF EXISTS `tt_kho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tt_kho`  AS SELECT `kho`.`id_SP` AS `id_SP`, `sp_ton`.`Ten_Mau` AS `Mau`, `sp_ton`.`So_Luong` AS `So_Luong_Tong`, `kho`.`So_Luong_Nhap` AS `So_Luong_Nhap`, `kho`.`Ngay_Nhap` AS `Ngay_Nhap` FROM (`kho` join `sp_ton`) WHERE `sp_ton`.`id_SP` = `kho`.`id_SP` AND `kho`.`Ma_Mau` = `sp_ton`.`Ma_Mau` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sp_view`
--
DROP TABLE IF EXISTS `sp_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_view`  AS SELECT `san_pham`.`id` AS `id`, `san_pham`.`Ma_SP` AS `Ma_SP`, `san_pham`.`Ma_DM` AS `Ma_DM`, `san_pham`.`Ma_TH` AS `Ma_TH`, `san_pham`.`Ten_SP` AS `Ten_SP`, `san_pham`.`Loai` AS `Loai`, `san_pham`.`Gia` AS `Gia`, `san_pham`.`Sale` AS `Sale`, `san_pham`.`Gia_Giam` AS `Gia_Giam`, `san_pham`.`Mo_Ta` AS `Mo_Ta`, `san_pham`.`Danh_Gia` AS `Danh_Gia`, `san_pham`.`Anh` AS `Anh`, sum(`sp_ton`.`So_Luong`) AS `So_Luong` FROM (`san_pham` join `sp_ton` on(`sp_ton`.`id_SP` = `san_pham`.`id`)) WHERE `sp_ton`.`So_Luong` > 0 GROUP BY `san_pham`.`id` ORDER BY `san_pham`.`id` DESC ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`Ma_DM`) USING BTREE;

--
-- Chỉ mục cho bảng `dh_tinh_trang`
--
ALTER TABLE `dh_tinh_trang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_User` (`id_User`,`id_SP`),
  ADD KEY `id_SP` (`id_SP`),
  ADD KEY `id_Tinh_Trang` (`id_Tinh_Trang`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_SP` (`id_SP`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Ma_DM` (`Ma_DM`,`Ma_TH`),
  ADD KEY `Ma_TH` (`Ma_TH`),
  ADD KEY `Ma_SP` (`Ma_SP`) USING BTREE;

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sp_danh_gia`
--
ALTER TABLE `sp_danh_gia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_SP` (`id_SP`);

--
-- Chỉ mục cho bảng `sp_thong_so`
--
ALTER TABLE `sp_thong_so`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_SP` (`id_SP`);

--
-- Chỉ mục cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_SP` (`id_SP`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Level` (`id_positon`),
  ADD KEY `id_positon` (`id_positon`);

--
-- Chỉ mục cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`Ma_TH`) USING BTREE;

--
-- Chỉ mục cho bảng `user_position`
--
ALTER TABLE `user_position`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dh_tinh_trang`
--
ALTER TABLE `dh_tinh_trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `kho`
--
ALTER TABLE `kho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sp_danh_gia`
--
ALTER TABLE `sp_danh_gia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sp_thong_so`
--
ALTER TABLE `sp_thong_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user_position`
--
ALTER TABLE `user_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vnpay`
--
ALTER TABLE `vnpay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_2` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_3` FOREIGN KEY (`id_Tinh_Trang`) REFERENCES `dh_tinh_trang` (`id`),
  ADD CONSTRAINT `don_hang_ibfk_4` FOREIGN KEY (`id_User`) REFERENCES `tb_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `kho`
--
ALTER TABLE `kho`
  ADD CONSTRAINT `kho_ibfk_1` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`Ma_DM`) REFERENCES `danh_muc` (`Ma_DM`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`Ma_TH`) REFERENCES `thuong_hieu` (`Ma_TH`);

--
-- Các ràng buộc cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  ADD CONSTRAINT `sp_image_ibfk_1` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sp_thong_so`
--
ALTER TABLE `sp_thong_so`
  ADD CONSTRAINT `sp_thong_so_ibfk_1` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sp_ton`
--
ALTER TABLE `sp_ton`
  ADD CONSTRAINT `sp_ton_ibfk_1` FOREIGN KEY (`id_SP`) REFERENCES `san_pham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_positon`) REFERENCES `user_position` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
