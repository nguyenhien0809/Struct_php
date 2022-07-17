-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2022 lúc 09:18 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `ma_dm` varchar(50) NOT NULL,
  `ten_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `ma_dm`, `ten_dm`) VALUES
(1, 'DT', 'Điện thoại'),
(2, 'PK', 'Phụ kiện'),
(3, 'TB', 'Tablet'),
(4, 'áđ', 'xfxf'),
(5, 'fffcvc', 'vcvcv');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dh_tinh_trang`
--

CREATE TABLE `dh_tinh_trang` (
  `id` int(11) NOT NULL,
  `mo_ta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dh_tinh_trang`
--

INSERT INTO `dh_tinh_trang` (`id`, `mo_ta`) VALUES
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
  `id_user` int(11) NOT NULL,
  `ma_dh` text NOT NULL,
  `id_loai` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `loai` text NOT NULL,
  `mau` varchar(100) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `thanh_tien` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `sdt` int(11) NOT NULL,
  `dia_chi` varchar(200) NOT NULL,
  `yeu_cau` varchar(2500) NOT NULL,
  `id_tinh_trang` int(11) NOT NULL DEFAULT 1,
  `thoi_gian_dh` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_user`, `ma_dh`, `id_loai`, `ma_sp`, `ten_sp`, `loai`, `mau`, `so_luong`, `gia`, `thanh_tien`, `ho_ten`, `sdt`, `dia_chi`, `yeu_cau`, `id_tinh_trang`, `thoi_gian_dh`) VALUES
(1, 11, ' 20220717074418', 12, 'xmm4', 'xiaomi mix 4', '1', 'Màu trắng', 1, 67, 67, 'hfgsdf', 65204545, 'fa fadf', 'zxc', 1, '2022-07-17 12:54:07'),
(2, 11, ' 20220717075556', 16, 'SS-S22ULTRA-5G', 'Samsung Galaxy s22 Ultra 5g', '3', 'Tim', 3, 56, 168, 'hfgsdf 4f', 2147483647, 'fa fadf 33 ', 'khong ', 1, '2022-07-17 12:56:15'),
(3, 11, ' 20220717075556', 18, 'xmm4', 'xiaomi mix 4', '4', 'Màu đen', 2, 34, 68, 'hfgsdf 4f', 2147483647, 'fa fadf 33 ', 'khong ', 1, '2022-07-17 12:56:15'),
(4, 11, ' 20220717081657', 12, 'xmm4', 'xiaomi mix 4', '1', 'Màu trắng', 2, 67, 134, 'hfgsdf 4f', 2147483647, 'fa fadf 33 ', '', 1, '2022-07-17 13:16:59');

--
-- Bẫy `don_hang`
--
DELIMITER $$
CREATE TRIGGER `update_sl_sp` AFTER INSERT ON `don_hang` FOR EACH ROW UPDATE sp_loai SET 
so_luong = (SELECT so_luong FROM sp_loai WHERE id = new.id_loai) - new.so_luong,
da_ban = (SELECT da_ban FROM sp_loai WHERE id = new.id_loai) + new.so_luong
WHERE 
sp_loai.id = new.id_loai
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kho`
--

CREATE TABLE `kho` (
  `id` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `so_luong_nhap` int(11) DEFAULT NULL,
  `ngay_nhap` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `id_th` int(11) NOT NULL,
  `diem_danh_gia` int(11) NOT NULL,
  `mo_ta_ngan` varchar(2500) NOT NULL,
  `mo_ta` varchar(10000) NOT NULL,
  `ngay_nhap` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_sp`, `ten_sp`, `id_dm`, `id_th`, `diem_danh_gia`, `mo_ta_ngan`, `mo_ta`, `ngay_nhap`) VALUES
(34, 'xmm4', 'xiaomi mix 4', 1, 4, 5, 'xccccccc', 'fggf', '2022-06-27'),
(37, 'SSGLX-S', 'Samsung Galaxy s9', 1, 3, 3, '', 'Người ta nói cái gì không bể thì đừng có vá, điều này rất đúng khi nói đến chiếc S9. Nó không tìm cách thay đổi cái gì đã hoàn hảo, chỉ chỉnh sửa lại cấu hình ở bất kì chỗ nào có thể - và kết quả là rất tuyệt vời.\r\nChiếc điện thoại Samsung mới này vẫn đi theo triết lí thiết kế tương tự như Galaxy S8 với khung viền kim loại cứng cáp cùng mặt lưng kính bóng bẩy bo cong mềm mại. Đặc biệt, phần khung viền của Galaxy S9 được hoàn thiện bằng kim loại nhám giúp cầm nắm chắc tay tốt hơn hẳn, chứ không bóng loáng như thời S8. \r\nGalaxy S9 có kích thước màn hình vô cực tỉ lệ 18.5:9, giữ nguyên so với người tiền nhiệm, cụ thể là 5.8 inch. Sử dụng tấm nền Super AMOLED như truyền thống trước giờ của các flagship Samsung, độ phân giải 2K+ đi cùng công nghệ hiển thị HDR 10 ấn tượng.\r\nS9 sử dụng bộ chip set mới: Exynos 9810 với tốc độ cao hơn 20% so với con chip Exynos 8895 mà S8 sử dụng. Nhưng mà điểm Samsung đã đẩy mạnh nhất là về camera. Với khẩu độ có thể thay đổi từ f/1.5 đến f/2.4, bây giờ chiếc Galaxy S9 có thể thống soái vai trò chụp ảnh ngay cả trong môi trường thiếu sáng hoặc thừa sáng. Máy còn đi kèm chức năng quay phim 4K 60fps và quay phim siêu chậm 960fps và định vị chuyển động tự động.\r\nS9 cũng mang theo nhiều thay đổi nhỏ mà người dùng không nhận ra khi cầm trên, nhưng mọi người đều sẽ nhận ra và yêu thích chúng khi họ bắt đầu sử dụng máy. Cặp loa stereo được tinh chỉnh bởi Harman - lần đầu tiên trong lineup của Galaxy S - cho máy khả năng phát âm thanh chân thực với sự hỗ trợ của Dolby Atmos. Sự kết hợp giữa hệ thống khóa máy bằng vân tay, dịnh dạng mặt, và nhận dạng con ngươi là một sự kết hợp mạnh mẽ mà dường như là điều nên có trên mọi chiếc điện thoại tiên tiến.', '2022-06-27'),
(38, 'SSGLX-S9', 'Samsung Galaxy s9pr', 1, 3, 3, '', '', '2022-06-27'),
(39, 'MOPHIE-PD-18W-C', 'Củ sạc mophie Power Delivery 18W usb-c', 2, 2, 4, '', 'Sạc Mophie Power Delivery 18W USB-C – Phụ kiện sạc nhanh chính hãng\r\nHiện nay, để tối ưu hóa tốc độ sạc cũng như thay đổi chuẩn để phù hợp với công nghệ sạc trên thiết bị hầu hết các hãng sản xuất sạc đều dần đổi sang sử dụng chuẩn USB-C. Thiết bị của bạn đang sử dụng USB-C và bạn đang tìm kiếm mua cho mình một bộ cáp sạc vừa phù hợp với jack dây sạc vừa phù hợp với chiếc điện thoại để không gây ảnh hưởng tốc độ sạc. Sạc Mophie Power Delivery 18W USB-C là sự lựa chọn hoàn hảo cho bạn cả về tốc độ cũng như độ an toàn.\r\nThiết kế nhỏ gọn, chất liệu nhựa nhám chống bám bụi bẩn, bền bỉ\r\nSạc Mophie Power Delivery 18W USB-C với thiết kế rất nhỏ gọn, chiếm diện tích không đáng kể khi cắm vào ổ điện, dễ dàng gắn cùng các đầu cắm điện khác trên cùng bản điện. Không những vậy sạc còn rất thuận tiện để vào túi xách mang đi ra ngoài với khối lượng chỉ 50g. Tuy kích thước nhỏ và khối lượng không đáng kể nhưng sạc Mophie Power Delivery 18W sẽ làm bạn ngạc nhiên với tốc độ của nó.\r\nHãng sản xuất đã thiết kế cho sạc Mophie Power Delivery 18W USB-C sử dụng chất liệu nhựa nhám tổng hợp cao cấp hạn chế nứt vỡ khi va đập. Lớp sơn đen nhám được bao phủ bên ngoài sản phẩm tạo nên sự sang trọng và tinh tế cho bộ sạc. Hơn thế nữa, lớp vỏ đen nhám có tính năng chống bám vân tay và mồ hôi giúp cho sạc của bạn luôn sạch sẽ mọi lúc.\r\nTrang bị công nghệ sạc nhanh công suất 18W, ổn định dòng điện khi sạc\r\nSạc Mophie Power Delivery 18W USB-C có công suất sạc lên đến 18W hỗ trợ sạc nhanh mọi thiết bị sử dụng cổng USB-C Power Delivery giúp thiết bị của bạn đầy pin nhanh chóng, giảm thời gian chờ đợi khi sạc. Với công suất sạc lên đến 18W bạn hoàn toàn có thể tự tin sử dụng từ các dòng điện thoại cao cấp đến thấp hơn đều được sạc đầy pin nhanh đáng kể mà không ảnh hưởng đến pin của thiết bị.\r\nSạc Mophie Power Delivery 18W USB-C có điện áp đầu ra và đầu vào ổn định giúp cho cường độ dòng điện được truyền luôn giữ được đúng định mức và xuyên suốt trong quá trình sạc. Khi sạc thiết bị của bạn sẽ không bị quá tải và nóng tối ưu tốt thời gian sạc cũng như tuổi thọ của viên pin.\r\nTương thích nhiều thiết bị hiện nay, đạt chuẩn an toàn chống cháy nổ\r\nSạc Mophie Power Delivery 18W USB-C với điện áp chuẩn đầu ra lần lượt 5V-3A, 9V-2A, 12V-1.5A phù hợp hầu hết các điện thoại, máy tính bảng hiện nay. Khi bạn mua sạc Mophie Power Delivery 18W 1 USB-C, bạn sẽ không cần phải lo nghĩ đến việc sạc có phù hợp với thiết bị của mình hay không sạc sẽ tự điều chỉnh mức chuẩn đầu ra phù hợp với thiết bị không ảnh hưởng đến pin của thiết bị.\r\nKhi bạn chọn mua sạc điều bạn quan tâm là độ an toàn của nó có đạt các tiêu chuẩn về an toàn chống cháy nổ hay không. Đối với sạc Mophie Power Delivery 18W USB-C bạn hoàn toàn có thể yên tâm sử dụng về độ an toàn của nó. Sạc Mophie Power Delivery 18W đã trải qua các vòng thử nghiệm khắt khe và đạt các tiêu chuẩn an toàn về cháy nổ toàn cầu.\r\nMua sạc Mophie Power Delivery 18W USB-C giá rẻ, chính hãng tại Dat-G mobie\r\nVới những tính năng tuyệt vời mang đến cho người sử dụng, sạc Mophie Power Delivery 18W USB-C chính hãng sẽ là sự lựa chọn hoàn hảo về tốc độ cũng như vẻ ngoài đen nhám sang trọng cho bạn. Phụ kiện được bán với giá ưu đãi cùng chính sách bảo hành cực tốt. Dat-G mobie xứng đáng là nơi để quý khách hàng tin tưởng lựa chọn mua sạc Mophie Power Delivery 18W 1 USB-C. Khi mua sạc Mophie 18W chính hãng tại đây bạn sẽ được bảo hành 24 tháng chính hãng.', '2022-06-27'),
(40, 'SS-S22ULTRA-5G', 'Samsung Galaxy s22 Ultra 5g', 1, 3, 4, '', 'Đánh giá hiệu năng Samsung S22 Ultra với con chip Snapdragon 8 Gen 1\r\nSau nhiều năm chạy chip Exynos thì S22 Ultra là mẫu điện thoại Samsung chính hãng hiếm hoi tại Việt Nam chạy Snapdragon 8 Gen 1. Trước đi đánh giá hiệu năng S22 Ultra, cùng điểm lại một số thông số cấu hình:\r\n\r\n-       Vi xử lý: Snapdragon 8 Gen 1\r\n\r\n-       Bộ nhớ RAM: 8GB hoặc 12GB.\r\n\r\n-       Bộ nhớ trong: 128GB hoặc 256GB hoặc 512GB.\r\n\r\nSau đây là điêm số benchmark của Galaxy S22 Ultra được các trang chuyên công nghệ thực hiện.\r\n\r\nĐiểm Geekbench 5 của Galaxy S22 Ultra PCMag thực hiện:\r\n\r\n-       Điểm đa nhân: 3.433 điểm \r\n\r\n-       Điểm đơn nhân: 1.232\r\n\r\nĐiểm số này có sự khác biệt so với chip Snapdragon 888 được ra mắt nắm 2020. Cụ thể, điểm đơn lõi tăng 13% và đa lõi tăng 9%. Nhưng trên thang điểm chuẩn của GFXBench thì ở một số tác vụ nhất định, con chip này cho hiệu năng tốt hơn khoảng 20%.\r\nBộ nhớ S22 Ultra được nâng cấp với ba phiên bản lựa chọn\r\nTrước nhiều đồn đoán rằng  Samsung Galaxy S22 Ultra có thể cho ra mắt phiên bản bộ nhớ 1TB thì thực tế hãng chỉ cho ra mắt ba phiên bản cấu hình bộ nhớ, trong đó phiên bản bộ nhớ cao nhất là 512GB.\r\n\r\nGalaxy S22 Ultra 128GB bộ nhớ trong: Đây là phiên bản cấu hình tiêu chuẩn, phù hợp với nhu cầu sử dụng của nhiều người dùng.\r\n\r\nGalaxy S22 Ultra 256GB bộ nhớ trong: Nếu người dùng có như cầu lưu trữ hình ảnh, video lớn thì bộ nhớ 256GB là lựa chọn đáng để tham khảo.\r\n\r\nGalaxy S22 Ultra 512GB bộ nhớ trong: Với phiên bản 512GB bộ nhớ sẽ phù hợp với những người dùng đòi hỏi không gian lưu trữ lớn như quay phim, chụp ảnh 8K hay lưu trữ dữ liệu lớn.\r\n\r\nNgoài ba phiên bản bộ nhớ lưu trữ thì Samsung cũng cung cấp tới haio phiên bản bộ nhớ RAM lần lượt là 8GB và 12GB cho người dùng lựa chọn.\r\nSamsung S22 Ultra hỗ trợ bút S Pen tiện lợi\r\nS Pen là sản phẩm đặc trưng của dòng Samsung Note. Tuy thế hệ S vẫn có thể sử dụng bút S Pen nhưng sẽ phải mua riêng và không thể cất bên trong điện thoại. Nhưng với Samsung S22 Ultra, Samsung đã trang bị khe cắm S Pen trên thiết bị giúp người dùng có thể tiện lợi khi sử dụng. Tuy nhiên khác với trước đó là Spen sẽ có cùng màu với máy thì năm nay, S-Pen sẽ chỉ có màu đen. \r\n\r\nVới bút Spen, giời đây người dùng Samsung S22 Ultra có thể thoải mái ghi chú, điều khiển điện thoại như trên các dòng Samsung Note. Bút Spen mới này cũng được cải thiện độ trễ mang lại trải nghiệm dùng chân thực từ viết chữ, vẽ hay ghi chú. ', '2022-06-27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `id_th` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tieu_de` varchar(500) NOT NULL,
  `anh` text NOT NULL,
  `tinh_trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `id_dm`, `id_th`, `id_sp`, `tieu_de`, `anh`, `tinh_trang`) VALUES
(14, 0, 0, 0, 'k', '1651484944s22.png', 0),
(15, 0, 0, 0, 'n', '1651485202Nokia_G21.png', 0),
(16, 0, 0, 0, 'i', '1651485213ip13-xl-sh-690-300-max.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_danh_gia`
--

CREATE TABLE `sp_danh_gia` (
  `id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `diem_danh_gia` int(11) NOT NULL,
  `noi_dung` varchar(10000) NOT NULL,
  `thoi_gian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_image`
--

CREATE TABLE `sp_image` (
  `id` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_image`
--

INSERT INTO `sp_image` (`id`, `ma_sp`, `anh`) VALUES
(23, 'SSGLX-S9', '1651222805samsung-galaxy-s9.png'),
(26, 'SSGLX-S', '1651222805samsung-galaxy-s9.png'),
(27, 'SS-S22ULTRA-5G', '1650966562samsung-galaxy-note-20-ultra.jpg'),
(28, 'xmm4', '1650884436Xiaomi-Mi-Mix-4.jpg'),
(29, 'MOPHIE-PD-18W-C', '1651482485cu-sac-mophie-pd-18w-usb-c.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp_loai`
--

CREATE TABLE `sp_loai` (
  `id` int(11) NOT NULL,
  `ma_sp` varchar(50) NOT NULL,
  `loai` text NOT NULL,
  `ma_mau` text NOT NULL,
  `ten_mau` varchar(100) NOT NULL,
  `gia` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `da_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp_loai`
--

INSERT INTO `sp_loai` (`id`, `ma_sp`, `loai`, `ma_mau`, `ten_mau`, `gia`, `so_luong`, `da_ban`) VALUES
(12, 'xmm4', '1', '#fff', 'Màu trắng', 67, 2, 2),
(13, 'xmm4', '1', '#000', 'Màu đen', 0, 15, 0),
(14, 'SSGLX-S', '2', '#935cad', 'Tim', 33, 1, 0),
(15, 'SSGLX-S', '2', '#5295cc', 'Xanh', 0, 2, 0),
(16, 'SS-S22ULTRA-5G', '3', '#935cad', 'Tim', 56, 2, 0),
(17, 'SS-S22ULTRA-5G', '3', '#000', 'Màu đen', 0, 1, 0),
(18, 'xmm4', '4', '#000', 'Màu đen', 34, 3, 0),
(19, 'MOPHIE-PD-18W-C', '2', '#000', 'Màu đen', 0, 15, 0),
(20, 'SSGLX-S9', '1', '#000', 'Màu đen', 0, 15, 0);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `sp_view`
-- (See below for the actual view)
--
CREATE TABLE `sp_view` (
`id` int(11)
,`ma_sp` varchar(50)
,`ten_sp` varchar(100)
,`id_dm` int(11)
,`id_th` int(11)
,`diem_danh_gia` int(11)
,`mo_ta_ngan` varchar(2500)
,`mo_ta` varchar(10000)
,`ngay_nhap` date
,`id_loai` int(11)
,`loai` text
,`ma_mau` text
,`ten_mau` varchar(100)
,`so_luong` int(11)
,`da_ban` int(11)
,`gia` int(11)
,`anh` text
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `email` varchar(150) NOT NULL,
  `sdt` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `email`, `sdt`, `username`, `password`, `anh`) VALUES
(1, 'nguyen hien', 'Nam', '2000-09-08', 'hien@gmail.com', 865198651, 'nguyenhien', 'e10adc3949ba59abbe56e057f20f883e', '1656841826Avatar.jpg'),
(8, 'hdi', 'Nữ', '2022-07-15', 'dxd@gmail.com', 865198651, 'hienabc', 'e10adc3949ba59abbe56e057f20f883e', 'avt-pr.jpg'),
(10, '', '', '0000-00-00', '', 0, '', 'd41d8cd98f00b204e9800998ecf8427e', 'avt-pr.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `sdt` int(11) NOT NULL,
  `noi_dung` varchar(2500) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_contact`
--

INSERT INTO `tb_contact` (`id`, `ho_ten`, `email`, `sdt`, `noi_dung`, `seen`) VALUES
(1, 'zxczv', 'zxc@gmail.com', 12324, 'zxcvcxvb xcvbcvb', 0),
(2, 'zxczv', 'zxc@gmail.com', 12324, 'zxcvcxvb xcvbcvb', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `gioi_tinh` varchar(10) NOT NULL,
  `ngay_sinh` date NOT NULL,
  `sdt` int(12) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `dia_chi` varchar(150) NOT NULL,
  `anh` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_users`
--

INSERT INTO `tb_users` (`id`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `sdt`, `email`, `password`, `dia_chi`, `anh`) VALUES
(1, 'fgghhh', 'Nữ', '2022-07-22', 865198651, 'ema@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'fsadf dfsdf', 'avt-pr.jpg'),
(3, 'hien', '0', '2000-09-08', 865198651, 'fsdf@gmail.com', '', 'bac ninh', '1649683013Avatar.jpg'),
(9, 'lê nguyên hiện', '0', '0000-00-00', 865198651, 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'aadđ', ''),
(10, 'd', '', '0000-00-00', 0, 'fdfsf@ga.com', '716295286970f11951e463ebd9b993b4', '', 'avt-pr.jpg'),
(11, 'hfgsdf 4f', 'Nam', '2022-07-07', 2147483647, 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'fa fadf 33 ', 'avt-pr.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuong_hieu`
--

CREATE TABLE `thuong_hieu` (
  `id` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `ma_th` varchar(50) NOT NULL,
  `ten_th` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thuong_hieu`
--

INSERT INTO `thuong_hieu` (`id`, `id_dm`, `ma_th`, `ten_th`) VALUES
(1, 1, 'IP', 'Iphone'),
(2, 2, 'MP', 'Mophie '),
(3, 1, 'SS', 'SamSung'),
(4, 1, 'XM', 'Xiaomi'),
(5, 3, 'ccz', 'ca cappp');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `view_danh_gia`
-- (See below for the actual view)
--
CREATE TABLE `view_danh_gia` (
`id` int(11)
,`id_user` int(11)
,`id_sp` int(11)
,`ma_sp` varchar(50)
,`ho_ten` varchar(50)
,`diem_danh_gia` int(11)
,`noi_dung` varchar(10000)
,`thoi_gian` datetime
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeu_thich`
--

CREATE TABLE `yeu_thich` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `yeu_thich`
--

INSERT INTO `yeu_thich` (`id`, `id_user`, `id_sp`) VALUES
(29, 11, 12),
(30, 11, 14),
(31, 11, 16);

-- --------------------------------------------------------

--
-- Cấu trúc cho view `sp_view`
--
DROP TABLE IF EXISTS `sp_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sp_view`  AS SELECT `sp`.`id` AS `id`, `sp`.`ma_sp` AS `ma_sp`, `sp`.`ten_sp` AS `ten_sp`, `sp`.`id_dm` AS `id_dm`, `sp`.`id_th` AS `id_th`, `sp`.`diem_danh_gia` AS `diem_danh_gia`, `sp`.`mo_ta_ngan` AS `mo_ta_ngan`, `sp`.`mo_ta` AS `mo_ta`, `sp`.`ngay_nhap` AS `ngay_nhap`, `sp_l`.`id` AS `id_loai`, `sp_l`.`loai` AS `loai`, `sp_l`.`ma_mau` AS `ma_mau`, `sp_l`.`ten_mau` AS `ten_mau`, `sp_l`.`so_luong` AS `so_luong`, `sp_l`.`da_ban` AS `da_ban`, `sp_l`.`gia` AS `gia`, `sp_img`.`anh` AS `anh` FROM ((`san_pham` `sp` left join `sp_loai` `sp_l` on(`sp`.`ma_sp` = `sp_l`.`ma_sp`)) left join `sp_image` `sp_img` on(`sp`.`ma_sp` = `sp_img`.`ma_sp`)) ORDER BY `sp`.`id` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `view_danh_gia`
--
DROP TABLE IF EXISTS `view_danh_gia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_danh_gia`  AS SELECT `sp_dg`.`id` AS `id`, `sp_dg`.`id_user` AS `id_user`, `sp_dg`.`id_sp` AS `id_sp`, `sp`.`ma_sp` AS `ma_sp`, `usr`.`ho_ten` AS `ho_ten`, `sp_dg`.`diem_danh_gia` AS `diem_danh_gia`, `sp_dg`.`noi_dung` AS `noi_dung`, `sp_dg`.`thoi_gian` AS `thoi_gian` FROM ((`san_pham` `sp` left join `sp_danh_gia` `sp_dg` on(`sp`.`id` = `sp_dg`.`id_sp`)) left join `tb_users` `usr` on(`usr`.`id` = `sp_dg`.`id_user`)) ORDER BY `sp_dg`.`thoi_gian` AS `DESCdesc` ASC  ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_dm` (`ma_dm`);

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
  ADD KEY `id_User` (`id_user`),
  ADD KEY `id_Tinh_Trang` (`id_tinh_trang`);

--
-- Chỉ mục cho bảng `kho`
--
ALTER TABLE `kho`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_loai` (`id_loai`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Ma_SP` (`ma_sp`) USING BTREE,
  ADD KEY `Ma_DM` (`id_dm`,`id_th`),
  ADD KEY `Ma_TH` (`id_th`),
  ADD KEY `id_th` (`id_th`);

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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sp_loai`
--
ALTER TABLE `sp_loai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ma_th` (`ma_th`);

--
-- Chỉ mục cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_sp` (`id_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dh_tinh_trang`
--
ALTER TABLE `dh_tinh_trang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sp_image`
--
ALTER TABLE `sp_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `sp_loai`
--
ALTER TABLE `sp_loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tb_contact`
--
ALTER TABLE `tb_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thuong_hieu`
--
ALTER TABLE `thuong_hieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `yeu_thich`
--
ALTER TABLE `yeu_thich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
