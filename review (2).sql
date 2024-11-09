-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 17, 2024 lúc 02:15 PM
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
-- Cơ sở dữ liệu: `review`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_ad` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_ad`, `hoten`, `matkhau`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2024-05-15 10:35:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `id_danhgia` int(11) DEFAULT NULL,
  `id_nguoidung` int(11) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `id_danhgia`, `id_nguoidung`, `noidung`, `ngaytao`) VALUES
(24, 51, 16, 'sahl', '2024-08-16 07:28:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id_danhgia` int(11) NOT NULL,
  `id_nguoidung` int(11) DEFAULT NULL,
  `id_dichvu` int(11) DEFAULT NULL,
  `sosao` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT current_timestamp(),
  `ngaycapnhat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trangthai` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id_danhgia`, `id_nguoidung`, `id_dichvu`, `sosao`, `tieude`, `noidung`, `ngaytao`, `ngaycapnhat`, `trangthai`) VALUES
(49, 12, 35, 4, 'Ngon', 'hdhhhd', '2024-05-28 08:55:21', '2024-05-28 08:55:55', 'approved'),
(50, 12, 23, 5, 'úhghrgu', 'kfhjkgvf', '2024-05-28 09:10:18', '2024-05-28 09:10:30', 'approved'),
(51, 16, 31, 5, 'tuyệt vời', 'hyuisehrog', '2024-08-16 07:24:55', '2024-08-16 07:28:10', 'approved'),
(52, 16, 35, 4, 'gg', 'dfbg', '2024-09-22 13:45:59', '2024-09-22 13:46:59', 'approved');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id_dichvu` int(11) NOT NULL,
  `ten_dv` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `anh` varchar(250) DEFAULT NULL,
  `noidung` text DEFAULT NULL,
  `gia_tb` varchar(20) DEFAULT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaycapnhat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id_dichvu`, `ten_dv`, `mota`, `anh`, `noidung`, `gia_tb`, `ngaytao`, `ngaycapnhat`) VALUES
(23, 'Gong Cha', 'Quán truyền thống từ lâu đời', '/uploads/15-05-2024/image_(2).jpg', 'Đặc trưng trong hương vị trà sữa Gong Cha chính là vị trà thơm kết hợp cùng vị béo của sữa cùng vị giòn sần sật của các loại topping, mang đến 1 sự kết hợp lôi cuốn. Khách hàng cũng đánh giá trà sữa Gongcha ngọt nhưng không quá béo. Bên cạnh trà sữa, Gong Cha còn mang đến nhiều sự lựa chọn thức uống khác như trà trái cây, smoothie,…', '50000', 1715782493, 1716432741),
(24, 'TocoToco', 'Thiên đường trà sữa với hương vị khó cưỡng', '/uploads/15-05-2024/image_(1).jpg', 'Là thương hiệu trà sữa đầu tiên sử dụng nguồn nông sản Việt Nam, TocoToco chủ trương ưu tiên sử dụng các nguyên liệu thuần Việt để tạo nên các đồ uống thơm ngon và bổ dưỡng. TocoToco sử dụng các loại trà được tìm kiếm tại những nông trường lớn. Trà được ươm trồng trên những vùng cao nguyên mát mẻ, có sương mù cao 1000m lớn nhất Việt Nam.', '35000', 1715782812, 1716432677),
(25, 'RoyalTea', 'Nhanh chóng, nhiệt tình và an toàn', '/uploads/15-05-2024/image.jpg', 'Royaltea: Nổi tiếng với hương vị trà sữa độc đáo và không gian hiện đại\r\nRoyaltea, thương hiệu trà sữa đến từ Hồng Kông, đã chinh phục giới trẻ Việt Nam với menu đa dạng, hương vị trà sữa thơm ngon, béo ngậy cùng không gian hiện đại, trẻ trung.\r\n\r\nSử dụng trà nguyên chất kết hợp topping phong phú, Royaltea mang đến trải nghiệm trà sữa độc đáo, khó quên. Nổi bật là trà sữa kem cheese với lớp kem béo ngậy hòa quyện cùng vị trà thơm ngon.\r\n\r\nBên cạnh đó, Royaltea còn thu hút khách hàng bởi các chương trình khuyến mãi hấp dẫn.\r\n\r\nVới những ưu điểm trên, Royaltea xứng đáng là địa điểm lý tưởng để bạn thưởng thức trà sữa ngon và tận hưởng không gian hiện đại. (4/5 sao)', '35000', 1715782936, 1716434186),
(30, 'Ding Tea', 'Ding Tea hiện là thương hiệu đồ uống lớn nhất của Đài Loan tại Trung Quốc', '/uploads/23-05-2024/foody-upload-api-foody-mobile-15-200331105246_(1).jpg', 'Điều làm nên sự đặc biệt của Ding Tea là nguyên liệu. Nguyên liệu và các thành phần được sử dụng để pha chế tại toàn bộ các cơ sở của Ding Tea không chỉ vượt qua được chứng nhận SGS Đài Loan mà còn vượt qua 231 bài thử nghiệm chất lượng của SGS Nhật Bản về việc cấp phép nhập khẩu. Thậm chí, thương hiệu này còn cam kết không sử dụng hương liệu phụ gia để bảo quản. Trà đã pha không chỉ tỏa ra hương vị ngọt ngào mà còn có mùi thơm đặc biệt, độ ngọt dịu mà không gắt, vị sữa beo béo hòa quyện với chút vị đắng của trà đã làm “đổ gục” rất nhiều trái tim mê trà sữa. Đặc biệt, ngoài tính đặc trưng hơn so với các thương hiệu khác, Ding Tea còn thể hiện văn hóa trà chuyên nghiệp, tinh tế và độc đáo của người Đài Loan.', '50000', 1716432938, 1716433044),
(31, 'Koi Thé', 'Trà Sữa Trân Châu Hoàng Kim', '/uploads/23-05-2024/bubble-milk-tea_(1).jpg', 'Koi Thé đem đến những dòng trà sữa thơm ngon được chế biến với công thức riêng với mùi vị rất đặc trưng. Phần chân trâu của hãng cũng là một điểm cộng với team mê “trà sữa”. Thành phần chế biến đồ uống đều được đảm bảo chuẩn chất lượng Nhật Bản.', '50000', 1716433377, 1716433377),
(32, 'Phê La', 'Nốt Hương Đặc Sản', '/uploads/23-05-2024/web_(1).jpg', 'Điều làm nên sức hút của thương hiệu trà sữa này là tạo ra được nhiều hương vị mới, độc đáo rất hợp khẩu vị các bạn trẻ. Chính vì thế mà một rừng các tên tuổi trà sữa “cây đa cây đề” như Phúc Long, Gong Cha,… thì team mê trà sữa vẫn dành cho Phê La một sự yêu thích đặc dù cho Phê La thuộc lứa thương hiệu “sinh sau đẻ muộn”.', '50000', 1716433659, 1716435013),
(35, 'Tocotoco', 'Thiên đường trà sữa với hương vị khó cưỡng', '/uploads/28-05-2024/image_(1).jpg', 'Là thương hiệu trà sữa đầu tiên sử dụng nguồn nông sản Việt Nam, TocoToco chủ trương ưu tiên sử dụng các nguyên liệu thuần Việt để tạo nên các đồ uống thơm ngon và bổ dưỡng. TocoToco sử dụng các loại trà được tìm kiếm tại những nông trường lớn. Trà được ươm trồng trên những vùng cao nguyên mát mẻ, có sương mù cao 1000m lớn nhất Việt Nam. \r\n', '35000', 1716879287, 1716879287);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id_nguoidung` int(11) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `matkhau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id_nguoidung`, `hoten`, `email`, `matkhau`) VALUES
(12, 'Thùy Dương', 'thuyduong191024@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(13, 'Thu Hà', 'thuyduongg191024@gmail.com', '202cb962ac59075b964b07152d234b70'),
(16, 'Dương', 'duong191024@gmail.com', '202cb962ac59075b964b07152d234b70'),
(18, 'duong', 'thuyduong1910@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_ad`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_danhgia` (`id_danhgia`),
  ADD KEY `id_nguoidung` (`id_nguoidung`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_danhgia`),
  ADD KEY `id_nguoidung` (`id_nguoidung`),
  ADD KEY `id_dichvu` (`id_dichvu`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id_dichvu`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id_nguoidung`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_ad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_danhgia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id_dichvu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id_nguoidung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_danhgia`) REFERENCES `danhgia` (`id_danhgia`),
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`id_nguoidung`) REFERENCES `nguoidung` (`id_nguoidung`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`id_dichvu`) REFERENCES `dichvu` (`id_dichvu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
