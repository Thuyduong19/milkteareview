-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2024 lúc 05:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sweetshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(11) NOT NULL,
  `IDND` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `IDDH` int(11) DEFAULT NULL,
  `NGAYLAPHD` date DEFAULT NULL,
  `TONGTIEN` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `IDND` int(11) NOT NULL,
  `TENND` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PASS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderr`
--

CREATE TABLE `orderr` (
  `IDDH` int(11) NOT NULL,
  `KHACHHANG` text NOT NULL,
  `SDT` int(15) NOT NULL,
  `NGAYDH` datetime NOT NULL,
  `TRANGTHAI` text NOT NULL,
  `GHICHU` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderr`
--

INSERT INTO `orderr` (`IDDH`, `KHACHHANG`, `SDT`, `NGAYDH`, `TRANGTHAI`, `GHICHU`) VALUES
(1, ' Thùy Dương', 234567891, '2024-04-20 12:06:03', 'Đã giao', 'Tôi cần giao hàng trước 3h chiều nay'),
(2, ' Ngọc Dũng', 234561987, '2024-04-20 18:07:51', 'Đã giao', ''),
(3, ' Ngọc Diễm', 432567891, '2024-04-21 18:08:44', 'Đã giao', ''),
(4, ' Tiến Chung', 254367891, '2021-04-21 19:10:03', 'Đã giao', ''),
(5, ' Hương Giang', 234587691, '2024-04-21 19:11:23', 'Đã giao', ''),
(6, ' Văn Hải', 234567819, '2024-04-22 18:13:42', 'Đã giao', 'Tôi cần bánh lúc 20h'),
(7, ' Thu Hà', 234587196, '2024-04-22 19:15:59', 'Đã giao', ''),
(8, ' Linh Chi', 111561987, '2024-04-23 09:16:45', 'Đã giao', ''),
(9, '  Đăng Cường ', 422567891, '2024-04-24 18:17:39', 'Đang giao hàng', ''),
(10, ' Huy Hảo', 534561777, '2024-04-24 19:18:51', 'Đã nhận đơn', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` float NOT NULL,
  `content` text NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `content`, `created_time`, `last_updated`) VALUES
(22, 'Flan Cake', 'uploads/16-04-2024/8._Bánh_Flan_cake.png', 25000, 'Bánh tươi', 1713288642, 1713289113),
(23, 'Bánh Macaron', 'uploads/16-04-2024/1._Bánh_macaron.png', 50000, 'Bánh tươi', 1713289074, 1713289074),
(24, 'Bánh sừng bò nhân ruốc', 'uploads/16-04-2024/2._Bánh_sừng_bò_nhân_ruốc.png', 17000, 'Bánh mỳ', 1713289176, 1713289176),
(25, 'Bánh custard bun', 'uploads/16-04-2024/3._Bánh_custard_bun.png', 15000, 'Bánh mỳ', 1713289209, 1713289209),
(26, 'Bánh panna cotta', 'uploads/16-04-2024/4._Bánh_panna_cotta.png', 370000, 'Bánh ngọt', 1713289261, 1713289261),
(27, 'Tiramisu Matcha', 'uploads/16-04-2024/5._Tiramisu_matcha.png', 130000, 'Bánh ngọt', 1713289301, 1713289301),
(28, 'Tiramisu choco', 'uploads/16-04-2024/6._Tiramisu_choco.png', 130000, 'Bánh ngọt', 1713289355, 1713289355),
(29, 'Bánh dừa nho trứng muối', 'uploads/16-04-2024/7._Bánh_dừa_nho_trứng_muối.png', 30000, 'Bánh mỳ', 1713289388, 1713289388),
(30, 'Petist set mix', 'uploads/16-04-2024/9._Petist_set_mix.png', 70000, 'phụ kiện', 1713289417, 1713289417),
(31, 'Bánh sừng bò', 'uploads/16-04-2024/10._Bánh_sừng_bò.png', 25000, 'Bánh mỳ', 1713289446, 1713289446),
(32, 'Bánh Choux', 'uploads/16-04-2024/11._Bánh_Choux.png', 20000, 'Bánh ngọt', 1713289477, 1713289477),
(33, 'Bánh pastry Orient Scent', 'uploads/16-04-2024/12._Bánh_pastry_Orient_Scent.png', 595000, '', 1713289521, 1713289521),
(34, 'Bánh Brioche', 'uploads/16-04-2024/13._Bánh_Brioche.png', 20000, 'Bánh mỳ', 1713289545, 1713289593),
(35, 'Bánh mì hoa cúc đậu đỏ', 'uploads/16-04-2024/14._Bánh_mì_hoa_cúc_đậu_đỏ.png', 20000, 'Bánh mỳ', 1713289617, 1713289617),
(36, 'Pastry Roll in Love', 'uploads/16-04-2024/15._Pastry_Roll_in_Love.png', 435000, 'Bánh tươi', 1713289643, 1713289643),
(37, 'Bánh mì gối', 'uploads/16-04-2024/16._Bánh_mì_gối.png', 10000, 'Bánh mỳ', 1713289672, 1713289672),
(38, 'Pastry Secret Garden', 'uploads/16-04-2024/17._Bánh_Pastry_Secret_Garden.png', 500000, 'Bánh ngọt', 1713289727, 1713289763),
(39, 'Topper HBD', 'uploads/16-04-2024/18._Topper_HBD.png', 30000, 'phụ kiện', 1713289784, 1713289784),
(40, 'Topper Congratulations', 'uploads/16-04-2024/19._Topper_Congratulations.png', 30000, 'phụ kiện', 1713289829, 1713289829),
(41, 'Bộ nến xoắn', 'uploads/16-04-2024/20._Bộ_nến_xoắn.png', 16000, 'phụ kiện', 1713289864, 1713289864);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birthday` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_updated` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `password`, `birthday`, `created_time`, `last_updated`) VALUES
(1, 'admin', 'ADMIN', 'e10adc3949ba59abbe56e057f20f883e', 123, 123, 1714578883);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`IDHD`),
  ADD KEY `IDND` (`IDND`),
  ADD KEY `id` (`id`),
  ADD KEY `IDDH` (`IDDH`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`IDND`);

--
-- Chỉ mục cho bảng `orderr`
--
ALTER TABLE `orderr`
  ADD PRIMARY KEY (`IDDH`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `IDND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderr`
--
ALTER TABLE `orderr`
  MODIFY `IDDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`IDND`) REFERENCES `nguoidung` (`IDND`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `hoadon_ibfk_3` FOREIGN KEY (`IDDH`) REFERENCES `orderr` (`IDDH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
