-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 29, 2022 lúc 06:24 AM
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `menu_id`, `type_id`, `price`, `image`, `description`, `feature`, `created_at`) VALUES
(1, 'Iphone 14 pro max', 1, 1, 35000000, 'iphone14promax.jpg', 'iPhone 14 series có sự nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung, bộ vi xử lý mạnh mẽ, thời lượng pin ấn tượng và camera chuẩn điện ảnh, mang đến trải nghiệm người dùng thông minh nhất từ trước đến nay.', 1, '2022-09-07 17:00:00'),
(2, 'Iphone 14', 1, 1, 25000000, 'iphone14.jpg', 'iPhone 14 series có sự nâng cấp toàn diện với kiểu dáng mới, nhiều lựa chọn màu sắc trẻ trung, bộ vi xử lý mạnh mẽ, thời lượng pin ấn tượng và camera chuẩn điện ảnh, mang đến trải nghiệm người dùng thông minh nhất từ trước đến nay.', 0, '2022-09-07 17:00:00'),
(3, 'Laptop Dell Inspiron 14', 2, 2, 24000000, 'dell14.jpg', 'Dell Inspiron 14 5410 i5 (P143G001BSL) sẽ là một sự lựa chọn thích hợp cho mọi đối tượng người dùng đặc biệt là học sinh, sinh viên hay dân văn phòng bởi lối thiết kế thanh lịch, nhã nhặn cùng hiệu năng mạnh mẽ đến từ con chip Intel thế hệ 11, đáp ứng tốt đa dạng các tác vụ cần thiết hằng ngày.', 1, '2022-10-10 17:00:00'),
(4, 'Laptop Dell Vostro 3400', 2, 2, 18000000, 'dellvostro.jpg', 'Laptop được trang bị chip Intel Core i5 1135G7 và card rời GeForce MX 330, 2 GB từ nhà NVIDIA cho khả năng xử lý tốt các thao tác thiết kế đồ hoạ 2D, chỉnh sửa hình ảnh, posters, banners,... trên các phần mềm nhà Adobe.', 0, '2021-07-07 17:00:01'),
(5, 'Loa thanh LG SP2', 4, 3, 1000000, 'loasp2.jpg', 'Loa thanh LG SP2 có kích thước lần lượt là dài 76 cm - rộng 9 cm - cao 6.3 cm bạn có thể đặt gọn ngay phía dưới tivi, không chiếm quá nhiều diện tích. Loa có tông màu chủ đạo là đen đậm chất hiện đại, các mặt bên được tạo điểm nhấn tông màu gỗ thời trang.', 0, '2021-10-14 00:32:01'),
(6, 'Loa thanh soundbar LG SP8A', 4, 3, 6000000, 'loasp8a.jpg', 'Loa thanh SP8A gồm 1 loa thanh chiều dài 106 cm và 1 loa siêu trầm thiết kế màu đen thuần khiết với đường nét vuông vức, tinh tế và hiện đại, dễ dàng bố trí cho nhiều không gian.', 1, '2022-10-25 17:32:01'),
(7, 'Samsung Smart Tivi Neo QLED 4K', 3, 4, 160000000, 'neoqled.jpg', 'Độ phân giải màn hình Neo Quantum 4K\r\nSản xuất: Việt Nam, Bảo hành 2 năm\r\nÂm Thanh Vòm Theo Chuyển Động Hình Ảnh\r\nHDR: Công nghệ Quantum Mini LED, HDR 32x (độ sáng 2000 nit)\r\nTizen - Voice Search+60W 4.2.2 Ch, OTS Lite,Tần số quét 120Hz', 1, '2020-10-14 08:32:01'),
(8, 'Samsung Smart Tivi 32 Inch UA32T4500A', 3, 4, 7390000, 'SmartTivi32.jpg', 'Công suất loa 10W 2Ch\r\nTìm kiếm giọng nói Voice Search+\r\nSản xuất Việt Nam, Bảo Hành 12 tháng\r\nĐộ  phân giải màn hình HD (1,366 * 768)\r\nHệ Điều Hành Tizen  2 x HDMI, 1 x USB', 0, '2020-10-14 08:32:01'),
(9, 'Màn Hình Acer Predator Helios 300 Ph317-52-571B', 5, 5, 3000000, 'PredatorHelios.jpg', 'Laptop Acer Predator Helios 300 Ph317-52-571B chắc chắn là thương hiệu đình đám đối với nhiều tín đồ điện thoại, tablet, laptop… Bởi sản phẩm chất lượng cũng như độ bền cao. Thế nhưng do sử dụng quá lâu hay vì một lý do nào đó khiến màn hình Laptop Acer Predator Helios 300 Ph317-52-571B của bạn không còn hiển thị được nữa, bị hỏng bạn cần phải thay màn hình mới để chiếc laptop được hoạt động tốt hơn. Bảo Hành One tự hào là nơi thay màn hình Laptop Samsung chính hãng với giá tốt, uy tín nhất thị trường. Quá trình thay màn hình diễn ra nhanh chóng, báo giá chính xác với mức giá tốt nhất trên thị trường, chỉ sau vài phút bạn có thể lấy máy ngay.', 0, '2013-10-16 08:32:01'),
(10, 'Màn Hình Acer Nitro 23.8\" VG240Y', 5, 5, 4000000, 'VG240Y.jpg', 'LCD Acer Nitro VG240Y có độ phân giải cao FullHD 1920 x 1080 với tỉ lệ 16:9 hiển thị hình ảnh vô cùng chân thực, sống động với đầy đủ chi tiết hình ảnh. Thiết kế ZeroFrame phá bỏ giới hạn khung viền, đem đến trải nghiệm không gian rộng, không còn viền màn hình. Với công nghệ tấm nền IPS, màn hình Acer 23.8″ Nitro VG240Y cải thiện chất lượng hình ảnh lên một đẳng cấp kinh ngạc, người dùng có thể thưởng thức màu sắc hình ảnh giống nhau từ mọi góc nhìn.', 1, '2021-07-20 08:32:01'),
(11, 'iphone xs max', 1, 1, 899000, 'xsmax.jpg', 'Xs Max sử dụng thép không gỉ và hợp kim được thiết kế tùy chỉnh đặc biệt để tạo ra các dải cấu trúc. Với mặt kính bền, điện thoại thông minh này cũng cung cấp khả năng chống nước và bụi đáng kể. Mặt lưng bằng kính của nó cũng cho phép điện thoại sạc không dây', 0, '2019-09-13 17:00:00');

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
(1, 'điện thoại'),
(2, 'laptop'),
(3, 'loa'),
(4, 'tivi'),
(5, 'Màn hình');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
