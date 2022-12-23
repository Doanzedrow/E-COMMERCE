-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 21, 2022 lúc 03:11 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom8`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `account_admin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password_admin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname_admin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `account_admin`, `password_admin`, `fullname_admin`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Trần Hữu Đoàn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `checkout_id` int(11) NOT NULL AUTO_INCREMENT,
  `fName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `shiping` int(11) NOT NULL,
  `qty_buy` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `other_node` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`checkout_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `fName`, `lName`, `email`, `address`, `city`, `country`, `phone`, `id`, `shiping`, `qty_buy`, `money`, `other_node`) VALUES
(1, 'Trần', 'Hữu Đoàn', 'huudoan2003@gmail.com', 'Lê Trọng Tấn, An Bình, Dĩ An', 'Bình Dương', 'Việt Nam', '0968123123', 1, 0, 1, 28000000, ''),
(2, 'Nguyễn', 'Văn A', 'vana@gmail.com', 'An Bình, Dĩ An', 'Bình Dương', 'Việt Nam', '0968673591', 10, 0, 1, 3400000, 't'),
(3, 'Nguyễn', 'Văn B', 'vanb@gmail.com', 'An Bình, Dĩ An', 'Bình Dương', 'Việt Nam', '0968673512', 10, 0, 1, 3400000, 'Tot'),
(4, 'Nguyễn', 'Văn B', 'vanb@gmail.com', 'An Bình, Dĩ An', 'Bình Dương', 'Việt Nam', '0968673512', 10, 0, 1, 3400000, 'Tot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Apple'),
(2, 'Dell'),
(3, 'SamSung'),
(4, 'LG'),
(5, 'Acer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personinfor`
--

DROP TABLE IF EXISTS `personinfor`;
CREATE TABLE IF NOT EXISTS `personinfor` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` int(12) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phai` tinyint(1) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personinfor`
--

INSERT INTO `personinfor` (`id_person`, `fullname`, `ngaysinh`, `sdt`, `email`, `phai`, `id_user`) VALUES
(1, 'Trần Hữu Đoàn', '2003-04-08', 968673591, 'tranhuudoan2003@gmail.com', 1, 1),
(2, 'Nguyễn Thị Lan Anh', '2003-03-08', 968457647, 'lananh0803@gmail.com', 0, 2),
(7, 'Tran Van A', '2022-11-20', 123456, 'vana@gmail.com', 1, 28),
(8, 'Tran Van B', '2022-11-20', 968123123, 'vanb@gmail.com', 0, 29),
(9, 'Tran Van C', '2022-11-25', 968123322, 'vanc@gmail.com', 1, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `feature` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `qty_sold` int(11) DEFAULT NULL,
  `kichthuocmanhinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chip` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dophangiai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `congketnoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `congsuat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hedieuhanh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `menu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`, `discount`, `qty_sold`, `kichthuocmanhinh`, `chip`, `ram`, `rom`, `pin`, `dophangiai`, `congketnoi`, `congsuat`, `hedieuhanh`, `card`) VALUES
(1, 'Iphone 14 pro max', 1, 1, 35000000, 'iphone14promax.jpg', 'iPhone 14 series có sự nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung, bộ vi xử lý mạnh mẽ, thời lượng pin ấn tượng và camera chuẩn điện ảnh, mang đến trải nghiệm người dùng thông minh nhất từ trước đến nay.', 1, '2022-09-07 17:00:00', 20, 30, '6.7 inches', 'Apple A16 Bionic 6-core', '6 GB', '128 GB', '4.352 mAh', '', '', '', 'iOS 16', ''),
(3, 'Laptop Dell Inspiron 14', 2, 2, 24000000, 'dell14.jpg', 'Dell Inspiron 14 5410 i5 (P143G001BSL) sẽ là một sự lựa chọn thích hợp cho mọi đối tượng người dùng đặc biệt là học sinh, sinh viên hay dân văn phòng bởi lối thiết kế thanh lịch, nhã nhặn cùng hiệu năng mạnh mẽ đến từ con chip Intel thế hệ 11, đáp ứng tốt đa dạng các tác vụ cần thiết hằng ngày.', 1, '2022-10-10 17:00:00', 30, 25, '14 inches', '', '8GB', '512GB SSD M.2 NVMe', '4 cell 54 Wh , Pin liền', '', '', '', 'Windows 11 Home', 'Intel UHD Graphics'),
(4, 'Laptop Dell Vostro 3400', 2, 2, 18000000, 'dellvostro.jpg', 'Laptop được trang bị chip Intel Core i5 1135G7 và card rời GeForce MX 330, 2 GB từ nhà NVIDIA cho khả năng xử lý tốt các thao tác thiết kế đồ hoạ 2D, chỉnh sửa hình ảnh, posters, banners,... trên các phần mềm nhà Adobe.', 0, '2021-07-07 17:00:01', 10, 27, '17 inches', '', '8GB', '512GB SSD', '6 cell, 54Wh', '', '', '', 'Windows 11 Home', 'Intel UHD Graphics'),
(5, 'Loa thanh LG SP2', 4, 3, 1000000, 'loasp2.jpg', 'Loa thanh LG SP2 có kích thước lần lượt là dài 76 cm - rộng 9 cm - cao 6.3 cm bạn có thể đặt gọn ngay phía dưới tivi, không chiếm quá nhiều diện tích. Loa có tông màu chủ đạo là đen đậm chất hiện đại, các mặt bên được tạo điểm nhấn tông màu gỗ thời trang.', 0, '2021-10-14 00:32:01', 10, 10, '', 'MLC3730', '', '', 'AA x 2', '', 'Phiên bản Bluetooth 4.0', '100W', '', ''),
(6, 'Loa thanh soundbar LG SP8A', 4, 3, 6000000, 'loasp8a.jpg', 'Loa thanh SP8A gồm 1 loa thanh chiều dài 106 cm và 1 loa siêu trầm thiết kế màu đen thuần khiết với đường nét vuông vức, tinh tế và hiện đại, dễ dàng bố trí cho nhiều không gian.', 1, '2022-10-25 17:32:01', 10, 10, '', 'MAC4090', '', '', 'AA x 2', '', 'Bluetooth 4.0', '100W', '', ''),
(7, 'Samsung Smart Tivi Neo QLED 4K', 3, 4, 160000000, 'neoqled.jpg', 'Độ phân giải màn hình Neo Quantum 4K\r\nSản xuất: Việt Nam, Bảo hành 2 năm\r\nÂm Thanh Vòm Theo Chuyển Động Hình Ảnh\r\nHDR: Công nghệ Quantum Mini LED, HDR 32x (độ sáng 2000 nit)\r\nTizen - Voice Search+60W 4.2.2 Ch, OTS Lite,Tần số quét 120Hz', 1, '2020-10-14 08:32:01', 25, 17, '65 inch', '', '', '', '', '4K', '', '', 'Tizen OS', ''),
(8, 'Samsung Smart Tivi 32 Inch UA32T4500A', 3, 4, 7390000, 'SmartTivi32.jpg', 'Công suất loa 10W 2Ch\r\nTìm kiếm giọng nói Voice Search+\r\nSản xuất Việt Nam, Bảo Hành 12 tháng\r\nĐộ  phân giải màn hình HD (1,366 * 768)\r\nHệ Điều Hành Tizen  2 x HDMI, 1 x USB', 0, '2020-10-14 08:32:01', 0, 5, '32 inch', '', '', '', '', '4K', '', '', 'Tizen OS', ''),
(9, 'Màn Hình Acer Predator Helios 300 Ph317-52-571B', 5, 5, 3000000, 'PredatorHelios.jpg', 'Laptop Acer Predator Helios 300 Ph317-52-571B chắc chắn là thương hiệu đình đám đối với nhiều tín đồ điện thoại, tablet, laptop… Bởi sản phẩm chất lượng cũng như độ bền cao. Thế nhưng do sử dụng quá lâu hay vì một lý do nào đó khiến màn hình Laptop Acer Predator Helios 300 Ph317-52-571B của bạn không còn hiển thị được nữa, bị hỏng bạn cần phải thay màn hình mới để chiếc laptop được hoạt động tốt hơn. Bảo Hành One tự hào là nơi thay màn hình Laptop Samsung chính hãng với giá tốt, uy tín nhất thị trường. Quá trình thay màn hình diễn ra nhanh chóng, báo giá chính xác với mức giá tốt nhất trên thị trường, chỉ sau vài phút bạn có thể lấy máy ngay.', 0, '2013-10-16 08:32:01', 10, 17, '17.3  inches', '', '', '', '', ' LED LCD', '', '', '', ''),
(10, 'Màn Hình Acer Nitro 23.8\" VG240Y', 5, 5, 4000000, 'VG240Y.jpg', 'LCD Acer Nitro VG240Y có độ phân giải cao FullHD 1920 x 1080 với tỉ lệ 16:9 hiển thị hình ảnh vô cùng chân thực, sống động với đầy đủ chi tiết hình ảnh. Thiết kế ZeroFrame phá bỏ giới hạn khung viền, đem đến trải nghiệm không gian rộng, không còn viền màn hình. Với công nghệ tấm nền IPS, màn hình Acer 23.8″ Nitro VG240Y cải thiện chất lượng hình ảnh lên một đẳng cấp kinh ngạc, người dùng có thể thưởng thức màu sắc hình ảnh giống nhau từ mọi góc nhìn.', 1, '2021-07-20 08:32:01', 15, 15, '', '', '', '', '', '', '', '', '', ''),
(11, 'iphone xs max', 1, 1, 8990000, 'xsmax.jpg', 'Xs Max sử dụng thép không gỉ và hợp kim được thiết kế tùy chỉnh đặc biệt để tạo ra các dải cấu trúc. Với mặt kính bền, điện thoại thông minh này cũng cung cấp khả năng chống nước và bụi đáng kể. Mặt lưng bằng kính của nó cũng cho phép điện thoại sạc không dây', 0, '2019-09-13 17:00:00', 10, 10, '6.0 inches', 'A13 Bionic', '4 GB', '64 GB', '3110 mAh', '', '', '', 'iOS 13', ''),
(12, 'IPhone 13 Pro Max - 128GB', 1, 1, 26750000, 'iphone13promax.jpg', 'Sự kiện của Apple – California Streaming đã ra mắt thế hệ iPhone 13 Series với rất nhiều sự mong chờ của người dùng. iPhone 13 Pro Max đã được ra mắt với sự nâng cấp về hiệu năng, camera và đặc biệt là về màn hình. iPhone 13 Pro và 13 Pro Max sẽ là những chiếc iPhone đầu tiên sở hữu màn hình 120Hz đầu tiên của Apple.', 1, '2021-11-23 19:02:00', 30, 40, '6.8 inches', 'Apple A15', '6 GB', '128 GB', '4,325mAh', '', '', '', 'iOS15', ''),
(13, 'Samsung Galaxy S22 Ultra - RAM 12GB - 512GB', 3, 1, 27890000, 'samsungs22ultra.jpg', 'Samsung Galaxy S22 Ultra được ra mắt với tham vọng trở thành chiếc điện thoại android mạnh nhất trong năm 2022 này với rất nhiều tính năng đẳng cấp khi vừa sở hữu cho mình những tinh hoa của dòng Galaxy Note nay được mang lên để kết hợp vs dòng Galaxy S hứa hẹn sẽ tạo ra một siêu phẩm Android đỉnh cao nhất từ trước đến giờ.', 1, '2022-03-31 19:00:02', 25, 29, '6.8 inches', 'Qualcomm Snapdragon 8 Gen 1 (4 nm)', '8 GB', '128 GB', 'Li-Ion 5000 mAh', '', '', '', 'Android 12, One UI 4.1', ''),
(14, 'Samsung Galaxy Z Flip 4 5G - RAM 8GB - 128GB', 3, 1, 17190000, 'samsungzflip.jpg', 'Samsung Galaxy Z Flip4 5G là smartphone màn hình gập vỏ sò độc đáo được gã khổng lồ công nghệ Hàn Quốc trình làng tại sự kiện Galaxy Unpacked 2022 cách đây không lâu với nhiều cải tiến về ngoại hình, camera, vi xử lý và viên pin. Chiếc điện thoại này hứa hẹn sẽ là một siêu phẩm bùng nổ trong thời gian tới và thu hút được sự quan tâm của đông đảo người dùng. ', 0, '2021-07-31 19:00:00', 10, 10, '6.5 inches', 'Snapdragon 8+ Gen 1 (4 nm)', '8 GB', '128 GB', '3700 mAh', '', '', '', 'Android 12, One UI 4.1.1', ''),
(15, 'Samsung Galaxy A73 5G', 3, 1, 9890000, 'samsunga73.jpg', 'Samsung Galaxy A73 5G (8GB/128GB) chiếc điện thoại viền siêu mỏng, vẻ ngoài hàng đầu, phiên bản cao cấp dành cho người hâm mộ trẻ tuổi. Một khoản đầu tư tốt nếu bạn cần một thiết bị Samsung đầy mượt mà và bắt mắt.\r\nVẫn là một ngoại hình đầy trẻ trung và mạnh mẽ với các cạnh vuông phẳng và đường viền bo cong mềm mại. Điện thoại mang đến ba màu tươi tắn: Trắng, Đen và Xanh mint. Cùng một lớp hoàn thiện mờ ở mặt lưng cho nét nhìn cao cấp hơn.', 0, '2016-11-12 19:00:00', 10, 10, '6.5 inches', 'Exynos 1280 8 nhân', '8 GB', '128 GB', 'Li-Po 5000 mAh', '', '', '', 'Android 12, One UI 4', ''),
(16, 'SamSung Galaxy S21 Ultra 5G 256GB ', 3, 1, 11190000, 'samsungs21ultra.jpg', 'Sự đẳng cấp được Samsung gửi gắm qua chiếc điện thoại thông minh Galaxy S21 Ultra 5G với hàng loạt sức mạnh và cải tiến không chỉ ngoại hình bên ngoài mà còn mạnh mẽ, hứa hẹn đáp ứng toàn bộ nhu cầu ngày càng cao của người used.\r\nĐột phá trong thời thượng thiết kế\r\nKhông chỉ đơn thuần phục vụ tiếp và giải trí, Samsung Galaxy S21 Ultra 5G còn chính là món phụ kiện thời trang định vị của chủ sở hữu. Vẻ ngoài mảnh mai và thon gọn đến bất ngờ chỉ 165,1 x 75,6 x 8,9 mm và trọng lượng 228 g mặc dù phải “vác” một viên pin lớn.', 0, '2020-09-01 19:25:02', 10, 10, '6.8 inches', 'Exynos 2100 8 nhân', '12 GB', '128 GB', 'Dung lượng pin 5,000mAh', '', '', '', 'Android 11, One UI 3.0', ''),
(17, 'Laptop Gaming Acer Nitro 5 Eagle AN515-57-5669 GTX 1650 4GB Intel Core i5 11400H 8GB 512GB 144Hz', 5, 2, 20000000, 'laptopacernitro5.jpg', 'Acer Nitro 5 AN515-57-5669 tích hợp những “vũ khí” mới nhất. Bao gồm CPU i5 11400H, VGA GTX 1650 cho hiệu năng xử lý mạnh mẽ.\r\nAcer Nitro 5 AN515-57-5669 sở hữu thiết kế ấn tượng với hai màu đen-đỏ chủ đạo. Bề mặt được thiết kế hầm hố và góc cạnh hơn. Thể hiện phong cách hiếu chiến đặc trưng của dòng Nitro. Viền màn hình siêu mỏng 6.3mm cho cảm giác không gian thoáng đãng hơn trước.', 1, '2020-10-31 19:33:44', 20, 15, '17 inches', '', '8 GB', '512GB SSD', '5 cell, 54Wh', '', '', '', 'Windows 11 Home', 'Intel UHD Graphics, GTX 1650'),
(18, 'Laptop Gaming Acer Aspire 7 A715-42G-R4XX GTX 1650 4GB Ryzen 5 5500U 8GB 256GB 15.6 FHD IPS Win 11', 5, 2, 16000000, 'laptopgamingacer7.jpg', 'Thiết kế tinh tế, trung tính theo phong cách học tập, văn phòng nhưng ACER ASPIRE 7 A715-42G-R4XX sở hữu cấu hình mạnh với bộ vi xử lý AMD Ryzen và card đồ họa rời NVIDIA GeForce GTX kết hợp cùng hai quạt tản nhiệt đem lại khả năng làm mát tối đa.\r\n– Bộ vi xử lý AMD Ryzen™ 5 5500U.\r\n– Card đồ họa rời NVIDIA GeForce® GTX 1650 4GB.\r\n– Màn hình 15.6″ FHD IPS đẹp mắt với tần số quét 144Hz chuẩn chiến game.\r\n– Công nghệ tản nhiệt hàng đầu phân khúc với 2 quạt tản nhiệt và hệ thống ống đồng cải tiến, cùng phần mềm tối ưu hóa hệ thống Acer Care Center tiện dụng.', 0, '2019-07-16 19:36:30', 0, 5, '16 inches', '', '4 GB', '256G', '6 cell, 54Wh', '', '', '', 'Windows 11 Home', 'Intel UHD Graphics'),
(19, 'MacBook Pro 2022 13 inch Apple M2 8GB RAM 256GB SSD – NEW', 1, 2, 30000000, 'macbookpro22.jpg', 'Tại Hội nghị dành cho các nhà phát triển thường niên của Apple được tổ chức vào 0h00 ngày 7/6 vừa qua (WWDC 2022), Apple đã giới thiệu chip M2 thế hệ thứ 2 cùng với MacBook Pro M2 (cũng như MacBook Air M2 được cập nhật). Tuy nhiên thiết bị không có nhiều thay đổi ngoài bộ vi xử lý M2 được nâng cấp. ', 1, '2022-06-06 17:00:00', 25, 22, '13 inches', '', '8 GB', '1 TB', '4 cell, 54Wh', '', '', '', 'macOS 13', 'Apple M1 Max'),
(20, 'MacBook Air M2 2022 13\" - RAM 16GB - 256GB - NEW 100%', 1, 2, 34000000, 'macbookair.jpg', 'Nếu như mẫu MacBook Air M1 (cũng như các mẫu MacBook Air từ năm 2020 trở về trước) có thiết kế hình nêm vát mỏng một đầu thì MacBook Air M2 đã có diện mạo hoàn toàn mới với dạng khối chữ nhật giống như MacBook Pro 14 inch 2021. \r\nĐược trang bị màn hình Liquid Retina 13,6 inch lớn hơn so với bản tiền nhiệm, MacBook Air M2 có một thân máy không quạt mới với bốn màu sắc thời thượng, cá tính: Silver, Space Gray, Starlight và Midnight. Thiết bị chỉ dày 11.3 mm và nặng 1.2 kg, nhẹ hơn một chút so với phiên bản M1.\r\n\r\n', 1, '2022-07-05 17:01:00', 30, 20, '13 inches', '', '8GB', '1 TB', '6 cell, 54Wh', '', '', '', 'macOS 13', 'Apple M1 Max'),
(21, 'Loa Thanh Samsung HW-Q990B', 3, 3, 30000000, 'loasamsungHwQ990B.jpg', 'Định dạng âm thanh dựa trên đối tượng Dolby Atmos lần đầu tiên được tích hợp không dây vào Samsung Soundbar. Trải nghiệm hiệu ứng linh hoạt được tái tạo bởi âm thanh 3D đỉnh cao hỗ trợ nội dung Dolby Atmos và Samsung Soundbar - tất cả đều không cần dây cáp phức tạp.\r\nận hưởng thế giới giải trí vô cùng sống động với 11 kênh loa ấn tượng bao gồm 1 loa siêu trầm và 4 loa đánh trần chất lượng. Được phát triển bởi Samsung Audio Lab và kết hợp hoàn hảo với Neo QLED/ QLED TV, mang đến bạn trải nghiệm âm thanh vòm 11.1.4ch chân thực và hài hòa nhất.', 1, '2020-12-01 19:47:24', 10, 10, '', 'MDC9190', '', '', 'AA x 4', '', 'Bluetooth 4.0', '120W', '', ''),
(22, 'Loa Thanh Samsung Q-Series HW-Q600B', 3, 3, 7500000, 'loasamsunghwq600b.jpg', 'Bên cạnh tính năng Q-Symphony giúp tận dụng cả loa TV và loa trên soundbar mang đến âm thanh vòm hoàn hảo cho các trải nghiệm giải trí tại gia, năm nay Q-Series được bổ sung công nghệ Spacefit Sound hoàn toàn mới. SpaceFit Sound được áp dụng trên loa thanh Q950A và Q700A, giúp âm thanh được tối ưu hóa qua micro và bộ xử lý của dòng TV Samsung Q70A trở lên. TV đo độ dội âm xảy ra do điều kiện phòng khác nhau và gửi dữ liệu đã xử lý đến loa thanh. Từ đó, loa thanh tối ưu hóa hiệu ứng âm thanh vòm và giọng nói rõ ràng hơn phù hợp với điều kiện phòng. Tính năng này sẽ giúp người nghe cảm nhận được chất lượng âm thanh đồng nhất bất kể không gian căn phòng.', 0, '2018-07-31 19:48:53', 0, 4, '', 'MKC7100', '', '', 'AA x 2', '', 'Bluetooth 4.0', '100W', '', ''),
(23, 'Samsung Smart Tivi QLED 4K Q95T', 3, 4, 26000000, 'tivisamsungqled.jpg', 'Thưởng thức hình ảnh chi tiết và chân thực với độ tương phản đáng kinh ngạc từ QLED TV. Các vùng đèn nền tập trung điều khiển chính xác độ sáng màn hình, truyền tải hoàn hảo sắc đen sâu thẳm và sắc trắng thuần khiết, làm sáng rõ và sắc nét mọi chi tiết\r\nCông Nghệ Wide Viewing Angle cho phép bạn nhìn thấy màu sắc rực rỡ từ nhiều góc độ hơn và chân thật hơn. Thoải mái tận hưởng mọi góc nhìn khác nhau, dù bạn ngồi trong góc căn phòng.', 1, '2022-02-28 19:52:40', 15, 7, '65 inch', '', '', '', '', '4K', '', '', 'Tizen OS', ''),
(24, 'Smart Tivi OLED LG 4K 48 Inch 48A1PTA', 4, 4, 19000000, 'tivioledlg.jpg', 'Smart Tivi OLED LG 4K 48 inch 48A1PTA sở hữu thiết kế màn hình phẳng thẳng hiện đại, viền tivi được làm mỏng mang đến sự thanh lịch, sang trọng là một điểm cộng cho nội thất ngôi nhà của bạn. Bên cạnh đó, tivi LG 48 inch phù hợp trưng bày tại phòng khách, phòng ngủ,...', 0, '2020-05-13 19:57:13', 0, 7, '48 inches', '', '', '', '', '4K', '', '', 'Tizen A', ''),
(25, 'Smart Tivi Nanocell 4K LG 43 Inch 43NANO77TPA', 4, 4, 10000000, 'tivinanocelllg.jpg', 'Công nghệ dải động của riêng LG, HDR 10 Pro, điều chỉnh độ sáng để tăng cường màu sắc, thể hiện mọi chi tiết nhỏ nhất, và mang lại độ rõ như thật cho mọi hình ảnh - công nghệ này cũng tăng cường nội dung HDR thông thường. Giờ đây tất cả các bộ phim và chương trình yêu thích của bạn sẽ sống động và sôi động hơn từ đầu đến cuối.', 0, '2018-10-31 19:57:13', 0, 7, '43 inches ', '', '', '', '', '4K', '', '', 'Tizen GH', ''),
(28, 'Màn hình Samsung LS27AG320NEXXV ', 3, 5, 62000000, 'manhinhsamsungls27.jpg', 'Màn hình Samsung Gaming Odyssey G32 LS27AG320NEXXV 27 sản phẩm được sử dụng với thiết kế sang trọng và hiệu năng cực ấn tượng, đưa người dùng đến một thế giới ảo đầy màu sắc. Tham khảo ngay những thông tin về màn hình Samsung sau đây!\r\nThiết kế tinh tế\r\nMàn hình sang trọng, thiết kế tràn viền ba cạnh, đưa tầm nhìn người dùng vươn ra xa tối đa nhất. Cho bạn cảm nhận chân thực qua những trận chiến game hay những trận bóng đá, cực đã mắt.', 1, '2021-06-15 20:01:45', 20, 20, '54 inches', '', '', '', '', '4K', '', '', '', ''),
(29, 'Màn hình Dell UltraSharp 25 inch U2520D', 2, 5, 9000000, 'manhinhdellultrasharp.jpg', 'Dell UltraSharp 25 inch U2520D mang thiết kế là một chiếc màn hình văn phòng được coi là điển hình của nhà Dell. Kiểu dáng vuông vắn với những đường nét đơn giản mà vẫn toát ra được vẻ hiện đại, sang trọng. Bao phủ bên ngoài thân sản phẩm là một màu xám đen chủ đạo, phù hợp với mọi không gian từ văn phòng cho tới phòng làm việc riêng của người dùng. Bên cạnh đó, phần viền màn hình phía trước được gia công vát, giúp người dùng có thể dễ dàng chỉnh hướng màn hình cũng như thuận tiện hơn trong việc thao tác với các nút bấm điều chỉnh của màn hình.', 1, '2022-08-21 20:04:14', 20, 20, '', '', '', '', '', '', '', '', '', ''),
(30, 'IPhone 14 Pro 256GB', 1, 1, 34990000, 'iphone14pro.jpg', 'Phone 14 Pro có sự cải thiện lớn màn hình so với iPhone 13 Pro. Sự khác biệt giữ phiên bản iPhone 14 Pro 256GB và 128GB tiêu chuẩn chỉ là bộ nhớ trong. Dưới đây là một số cải tiến nổi bật trên iPhone 14 Pro mà có thể bạn chưa biết!\r\nKích thước màn hình iPhone 14 Pro vẫn là 6.1 inch tuy nhiên phần “tai thỏ” đã được thay thế bằng một đường cắt hình viên thuốc. Apple gọi đây là Dynamic Island - nơi chứa camera Face ID và một đường cắt hình tròn thứ hai cho camera trước.\r\nNgoài ra, iPhone 14 Pro có tính năng màn hình luôn bật hoạt động (Always-on Display) với tiện ích màn hình khóa mới trên iOS 16. Người dùng có thể xem các thông tin như lời nhắc, sự kiện lịch và thời tiết mà không cần bật máy lên để xem. Thậm chí, có một trạng thái ngủ cho hình nền, trạng thái này sẽ làm tối hình nền để sử dụng ít pin hơn.\r\niPhone 14 Pro được trang bị bộ vi xử lý Apple A16 Bionic. Apple đã tập trung vào hiệu quả sử dụng năng lượng, màn hình và camera với con chip mới của mình. CPU sáu nhân bao gồm hai nhân hiệu suất cao sử dụng năng lượng thấp hơn 20% và bốn nhân tiết kiệm pin chỉ sử dụng một phần ba năng lượng so với chip của các đối thủ cạnh tranh.', 0, '2022-05-02 17:00:00', 10, 25, '6.5 inches', '', '8 GB', '128 GB', '4,325mAh', '', '', '', 'iOS15', 'Apple A16 Bionic 6-core'),
(31, 'IPhone 11 64GB', 1, 1, 14990000, 'iphone11.jpg', 'Apple luôn làm hài lòng tín đồ iFan với các dòng iPhone trong từng phân khúc giá. Đặc biệt, phiên bản iPhone 11 vừa ra mắt nhưng đã chiếm lĩnh được thị trường smartphone trên toàn thế giới với giá cả phải chăng. Cùng tìm hiểu chi tiết rõ hơn qua bài viết sau đây để có quyết định có nên mua hay không nhé!', 0, '2020-08-01 17:00:00', 20, 20, '6.5 inches', 'A11 Bionic', '8GB', '64 GB', '3110 mAh', '', '', '', 'iOS 13', 'Apple A13 Bionic 6-core'),
(32, 'IPhone 12 Pro Max 128GB', 1, 1, 28990000, 'iphone12promax.jpg', 'Cứ mỗi năm, đến dạo cuối tháng 8 và gần đầu tháng 9 thì mọi thông tin sôi sục mới về chiếc iPhone mới lại xuất hiện. Apple năm nay lại ra thêm một chiếc iPhone mới với tên gọi mới là iPhone 12 Pro Max, đây là một dòng điện thoại mới và mạnh mẽ nhất của nhà Apple năm nay. Mời bạn tham khảo thêm một số mô tả sản phẩm bên dưới để bạn có thể ra quyết định mua sắm.', 0, '2020-11-23 17:01:00', 15, 25, '6.5 inches', '', '8 GB', '128 GB', '3110 mAh', '', '', '', 'iOS15', 'Apple A13 Bionic 6-core'),
(33, 'IPhone 13 128GB', 1, 1, 24990000, 'iphone13.jpg', 'Về kích thước, iPhone 13 sẽ có 4 phiên bản khác nhau và kích thước không đổi so với series iPhone 12 hiện tại. Nếu iPhone 12 có sự thay đổi trong thiết kế từ góc cạnh bo tròn (Thiết kế được duy trì từ thời iPhone 6 đến iPhone 11 Pro Max) sang thiết kế vuông vắn (đã từng có mặt trên iPhone 4 đến iPhone 5S, SE).\r\nThì trên điện thoại iPhone 13 vẫn được duy trì một thiết kế tương tự. Máy vẫn có phiên bản khung viền thép, một số phiên bản khung nhôm cùng mặt lưng kính. Tương tự năm ngoái, Apple cũng sẽ cho ra mắt 4 phiên bản là iPhone 13, 13 mini, 13 Pro và 13 Pro Max.', 0, '2021-07-31 17:00:00', 15, 20, '6.5 inches', '', '8 GB', '128 GB', '4,325mAh', '', '', '', 'iOS15', 'Apple A16 Bionic 6-core'),
(34, 'IPhone 13 Pro 128GB', 1, 1, 32000000, 'iphone13pro.jpg', 'iPhone 13 Pro 128GB ra mắt cùng với iPhone 13 Pro Max cao cấp nhất, iPhone 13 và 13 mini vào tháng 9 năm 2021 với nhiều nâng cấp về cấu hình, camera cũng như thiết kế. Tuy nhiên, Apple sẽ không thay đổi số lượng cũng như kích thước màn hình của loạt iPhone 13 năm nay. ', 0, '2021-07-05 17:00:00', 20, 25, '6.5 inches', '', '8 GB', '128 GB', '3110 mAh', '', '', '', 'iOS15', 'Apple A16 Bionic 6-core'),
(39, 'Samsung Galaxy Z Fold4', 3, 1, 40000000, 'samsungzfold4.jpg', 'Galaxy Z Fold3 vốn đã rất nổi bật thì mới đây, sự xuất hiện của điện thoại gập mới Samsung Galaxy Z Fold 4 lại càng hấp dẫn nhiều người dùng hơn khi sở hữu thiết kế gập màn hình mới cùng với những cải tiến cho trải nghiệm nhân đôi. Vậy chiếc smartphone màn hình gập cao cấp thế hệ mới có gì mới, giá bao nhiêu và có nên mua không? Cùng tìm hiểu nhé!', 0, '2021-06-01 00:02:55', 8, 20, '6.5 inches', '', '8 GB', '128 GB', '4,325mAh', '', '', '', 'Android 12, One UI 4.1.1', 'Qualcomm Snapdragon 8 Gen 1 (4 nm)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Loa'),
(4, 'Tivi'),
(5, 'Màn hình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'doan', 'b3f3d1d6a03bb893c6fe0329ddb917c6'),
(2, 'lananh', 'e26c874ebe35bff978cd8e88597f7afb'),
(28, 'admin', 'c4ca4238a0b923820dcc509a6f75849b'),
(29, 'admin2', 'c81e728d9d4c2f636f067f89cc14862c'),
(30, 'admin3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
