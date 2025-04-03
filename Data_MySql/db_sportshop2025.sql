-- Bùi Gia Thịnh
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2025 lúc 12:02 PM
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
-- Cơ sở dữ liệu: `db_sportshop2025`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` double DEFAULT NULL,
  `payment` varchar(200) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 4, '2025-03-11', 450000, 'COD', NULL, '2025-03-11 14:53:40', '2025-03-15 10:45:08'),
(2, 2, '2025-03-12', 600000, 'COD', NULL, '2025-03-12 12:48:49', '2025-03-12 12:48:49'),
(3, 3, '2025-03-13', 500000, 'COD', NULL, '2025-03-13 05:38:12', '2025-03-13 05:38:12'),
(4, 2, '2025-03-15', 650000, 'ATM', NULL, '2025-03-15 11:10:48', '2025-03-15 11:10:48'),
(5, 5, '2025-03-25', 1100000, 'COD', NULL, '2025-03-25 13:00:31', '2025-03-25 13:00:31'),
(6, 6, '2025-03-26', 1050000, 'COD', NULL, '2025-03-26 10:59:15', '2025-03-26 10:59:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) UNSIGNED DEFAULT NULL,
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 1, 600000, '2025-03-12 12:48:49', '2025-03-12 12:48:49'),
(3, 3, 2, 1, 500000, '2025-03-13 05:38:12', '2025-03-13 05:38:12'),
(4, 1, 2, 200, 2000, '2025-03-15 10:57:03', '2025-03-15 10:57:03'),
(5, 4, 22, 1, 650000, '2025-03-15 11:10:48', '2025-03-15 11:10:48'),
(6, 5, 15, 1, 500000, '2025-03-25 13:00:31', '2025-03-25 13:00:31'),
(7, 5, 16, 1, 600000, '2025-03-25 13:00:31', '2025-03-25 13:00:31'),
(8, 6, 16, 1, 600000, '2025-03-26 10:59:15', '2025-03-26 10:59:15'),
(9, 6, 17, 1, 450000, '2025-03-26 10:59:15', '2025-03-26 10:59:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(7, 1, 20, 'Sản phẩm rất đẹp', '2025-03-25 07:51:11', '2025-03-25 07:51:11'),
(8, 1, 20, 'Tôi rất thích', '2025-03-25 08:30:05', '2025-03-25 08:30:05'),
(9, 1, 15, 'Sản phẩm rất tuyệt vời', '2025-03-25 08:30:37', '2025-03-25 08:30:37'),
(10, 1, 15, 'Tôi rát hài lòng với sản phẩm này', '2025-03-25 08:34:49', '2025-03-25 08:34:49'),
(11, 11, 20, 'Đồ rất đẹp, tôi sẽ tiếp tục ủng hộ', '2025-03-25 10:54:30', '2025-03-25 10:54:30'),
(13, 1, 2, 'Tôi rất thích sản phẩm này', '2025-03-25 12:32:01', '2025-03-25 12:32:01'),
(14, 1, 15, 'Hello', '2025-03-25 12:37:54', '2025-03-25 12:37:54'),
(15, 1, 20, 'Đồ rất đẹp và tuyệt vời', '2025-03-25 13:02:36', '2025-03-25 13:02:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment_replies`
--

INSERT INTO `comment_replies` (`id`, `comment_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 11, 1, 'Tôi đồng tình ý kiến của bạn', '2025-03-25 12:15:14', '2025-03-25 12:15:14'),
(3, 7, 1, 'Rất hay', '2025-03-25 12:20:50', '2025-03-25 12:20:50'),
(4, 8, 1, 'Tuyệt vời', '2025-03-25 12:22:54', '2025-03-25 12:22:54'),
(6, 13, 4, 'Tôi cũng vậy', '2025-03-25 12:41:14', '2025-03-25 12:41:14'),
(7, 15, 4, 'Ok', '2025-03-25 13:03:04', '2025-03-25 13:03:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `image`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Phan Dương Quốc', 'nam', 'phanduongquoc111@gmail.com', 'kiên giang', '0886111620', NULL, 'qwrr', '2025-03-11 14:53:40', '2025-03-11 14:53:40'),
(2, 'Phan Dương Quốc', 'nam', 'phanduongquoc211@gmail.com', 'kiên giang', '0886111628', NULL, 'hang đẹp', '2025-03-12 12:48:48', '2025-03-12 12:48:48'),
(3, 'Thịnh', 'Nam', 'thinh@gmail.com', 'Bến tre', '0398298855', NULL, 'werty', '2025-03-13 05:38:12', '2025-03-15 09:39:19'),
(4, 'Ngô Diễm Quỳnh Phương', 'Nam', 'phuongngo@gmail.com', 'Khánh Hòa', '2345677888', NULL, 'qwert', '2025-03-15 09:39:46', '2025-03-15 09:39:46'),
(5, 'Phan Dương Quốc', 'nam', 'phanduongquoc101@gmail.com', 'kiên giang', '0886111629', NULL, 'Giao ngay', '2025-03-25 13:00:31', '2025-03-25 13:00:31'),
(6, 'Quoc', 'nam', 'phanduong@gmail.com', 'kiên giang', '0886111628', NULL, 'rất đẹp', '2025-03-26 10:59:15', '2025-03-26 10:59:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(2, 'Hướng dẫn chọn giày chạy bộ', 'Cách chọn giày chạy bộ phù hợp với bàn chân', 'https://cdn.thehinh.com/2018/03/huong-dan-cach-chon-giay-chay-bo-3.jpg', '2025-03-11 09:26:22', '2025-03-12 12:14:31'),
(3, 'Đại hội thể thao quốc tế', 'Đại hội thể dục thể thao mang tầm cỡ quốc tế', 'https://vn-static.rti.org.tw/assets/thumbnails/2025/03/04/b73cf5d74eaa5b6e2012ccd544b37e0c.jpg', '2025-03-12 11:44:55', '2025-03-12 12:14:37'),
(4, 'Thể thao Việt Nam 2023', 'Đội tuyển Việt nam niềm tự hào của nước nhà', 'https://quatangthanhphat.com/wp-content/uploads/2023/07/ngay-the-thao-viet-nam-2.jpg', '2025-03-12 11:46:00', '2025-03-12 11:46:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `new` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `created_at`, `updated_at`, `new`) VALUES
(2, 'Áo thể thao Adidas', 2, 'Áo thể thao thoáng mát, co giãn tốt', 500000, 450000, 'https://product.hstatic.net/200000100181/product/ao_thun_tiro_mau_xanh_la_is1502_01_laydown_f8c38b9a49734968b9c1598db809f2de.jpg', '2025-03-11 08:21:01', '2025-03-11 08:27:06', 'new'),
(3, 'Quần thể thao Puma', 3, 'Quần thể thao êm ái, phù hợp tập luyện', 600000, 550000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxOdXUdbgL8_Y8UanqGexq3kMImPF66el_7g&s', '2025-03-11 08:21:01', '2025-03-11 08:27:32', 'old'),
(15, 'Áo thể thao Adidas', 2, 'Áo thể thao thoáng mát, co giãn tốt', 500000, 450000, 'https://ladygolf.vn/wp-content/uploads/2023/02/5-3.jpg', '2025-03-11 08:43:10', '2025-03-11 08:53:12', 'new'),
(16, 'Áo thể thao Nike Dri-FIT', 2, 'Công nghệ Dri-FIT giúp thấm hút mồ hôi', 600000, 550000, 'https://m.media-amazon.com/images/I/71-mQI--b+L._AC_SL1500_.jpg', '2025-03-11 08:43:10', '2025-03-11 08:53:32', 'old'),
(17, 'Áo Puma Run Fast', 2, 'Áo thể thao chạy bộ nhẹ, thoáng khí', 450000, 400000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQezgouzviTdq92TOfTi9Bq1R1BYhu1KUSlfQ&s', '2025-03-11 08:43:10', '2025-03-11 08:53:57', 'new'),
(18, 'Áo Reebok Training', 2, 'Thiết kế đơn giản, phù hợp tập gym', 550000, 500000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQE-N1LsvLIwugls-z0mzxRR8FeguMYoqLww&s', '2025-03-11 08:43:10', '2025-03-11 08:54:22', 'old'),
(19, 'Áo Under Armour HeatGear', 2, 'Chất liệu HeatGear giữ cơ thể mát', 700000, 650000, 'https://product.hstatic.net/1000008082/product/w1_a78529e9a4ff4cffba7ed31d997007c4_master.jpg', '2025-03-11 08:43:10', '2025-03-11 08:54:47', 'new'),
(20, 'Áo tanktop GymShark', 2, 'Áo ba lỗ dành cho tập gym', 350000, 320000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/011/344/products/white-1684658195548.jpg?v=1686026974080', '2025-03-11 08:43:10', '2025-03-11 08:55:07', 'new'),
(21, 'Áo Asics Marathon', 2, 'Dành cho vận động viên marathon', 750000, 700000, 'https://cms-static.asics.com/media-libraries/70495/file.jpg?', '2025-03-11 08:43:10', '2025-03-11 08:55:25', 'old'),
(22, 'Áo New Balance Fresh Foam', 2, 'Phong cách thể thao thời trang', 650000, 600000, 'https://81sneaker.vn/upload/product/3-3666.jpg', '2025-03-11 08:43:10', '2025-03-11 08:55:44', 'new'),
(23, 'Áo Columbia Trekking', 2, 'Dành cho leo núi, chống nước', 800000, 750000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTscedHIPL81AbqdCcq_9e9q3-qV-YBEk8wyA&s', '2025-03-11 08:43:10', '2025-03-11 08:56:05', 'old'),
(24, 'Áo North Face Pro', 2, 'Bảo vệ khỏi thời tiết lạnh', 900000, 850000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR33h7r3CZ_CiSqPCS_LHkzEg49vT2pkeS7vw&s', '2025-03-11 08:43:10', '2025-03-11 08:56:23', 'new'),
(25, 'Quần thể thao Puma', 3, 'Quần thể thao êm ái, phù hợp tập luyện', 600000, 550000, 'https://bizweb.dktcdn.net/thumb/1024x1024/100/347/092/products/71-plus-bx3fosfl-ac-sx466.jpg', '2025-03-11 08:43:10', '2025-03-11 08:56:43', 'old'),
(26, 'Quần thể thao Adidas Aeroready', 3, 'Thoáng khí, chống thấm mồ hôi', 700000, 650000, 'https://sithimy.s3.ap-southeast-1.amazonaws.com/sithimy/media/ZfUsM7xfgHfReDANb9BPhr8XBMBTLaQin05pwPwi.jpg', '2025-03-11 08:43:10', '2025-03-11 08:59:24', 'new'),
(27, 'Quần Nike Training Flex', 3, 'Co giãn 4 chiều, phù hợp tập gym', 750000, 700000, 'https://sneakerdaily.vn/wp-content/uploads/2024/05/Quan-Nike-Flex-Stride-Run-Energy-Mens-5-Brief-Lined-Running-Shorts-Black-FN4001-010.jpg', '2025-03-11 08:43:10', '2025-03-11 08:59:43', 'old'),
(28, 'Quần Reebok Crossfit', 3, 'Dành riêng cho các bài tập cường độ cao', 800000, 750000, 'https://bizweb.dktcdn.net/thumb/grande/100/425/004/products/reebok-crossfit-r-activchill-plus-cotton-tee-blue-fs7641-05-detail.jpg?v=1678711779590', '2025-03-11 08:43:10', '2025-03-11 09:00:10', 'new'),
(29, 'Quần Under Armour Tapered', 3, 'Dáng ôm gọn, thoải mái vận động', 850000, 800000, 'https://supersports.com.vn/cdn/shop/files/1352028-001-1_medium.jpg?v=1700447070', '2025-03-11 08:43:10', '2025-03-11 09:00:36', 'new'),
(46, 'Giày Nike Air Zoom', 3, 'Giày chạy bộ thoáng khí, nhẹ nhàng', 1500000, 1300000, 'https://cdn.storims.com/api/v2/image/resize?path=https://storage.googleapis.com/storims_cdn/storims/uploads/0136e64752ebc58a78ea3d9ecab01fd5.jpeg&format=jpeg', '2025-03-11 01:21:01', '2025-03-11 01:26:40', 'new'),
(47, 'Áo thể thao Adidas', 5, 'Áo thể thao thoáng mát, co giãn tốt', 500000, 450000, 'https://product.hstatic.net/200000100181/product/ao_thun_tiro_mau_xanh_la_is1502_01_laydown_f8c38b9a49734968b9c1598db809f2de.jpg', '2025-03-11 01:21:01', '2025-03-11 01:27:06', 'new'),
(48, 'Quần thể thao Puma', 2, 'Quần thể thao êm ái, phù hợp tập luyện', 600000, 550000, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxOdXUdbgL8_Y8UanqGexq3kMImPF66el_7g&s', '2025-03-11 01:21:01', '2025-03-11 01:27:32', 'old'),
(49, 'Tạ tay 5kg', 3, 'Tạ tay sắt bọc cao su chống trượt', 300000, 280000, 'https://bizweb.dktcdn.net/100/377/754/files/ta-tay-boc-cao-su-jordan.jpg?v=1604479868543', '2025-03-11 01:21:01', '2025-03-11 01:27:52', 'new'),
(50, 'Giày Nike Air Zoom', 5, 'Giày chạy bộ thoáng khí, nhẹ nhàng', 1500000, 1300000, 'https://runningstore.vn/wp-content/uploads/2024/03/z5273086155277_71fb17260b998bbd29f39b88ca99fd77.jpg', '2025-03-11 01:43:10', '2025-03-11 01:46:02', 'new'),
(51, 'Giày Adidas Ultraboost', 2, 'Đệm êm, hỗ trợ chuyển động tốt', 1800000, 1600000, 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/65dba7d32e7b4d8ea2faab0b00ad3783_9366/Giay_UltraBoost_20_DJen_EG0691_01_standard.jpg', '2025-03-11 01:43:10', '2025-03-11 01:46:28', 'new'),
(52, 'Giày Puma RS-X', 5, 'Thiết kế hiện đại, trẻ trung', 1400000, 1250000, 'https://supersports.com.vn/cdn/shop/files/39631101-1_1200x1200.jpg?v=1714125555', '2025-03-11 01:43:10', '2025-03-11 01:47:04', 'old'),
(53, 'Giày Reebok Floatride', 3, 'Công nghệ Floatride êm ái', 1600000, 1450000, 'https://sithimy.s3.ap-southeast-1.amazonaws.com/sithimy/media/suX3oEVOxpeHKkJrhWu3hKY2PmthGWeAjL3117tw.jpg', '2025-03-11 01:43:10', '2025-03-11 01:47:29', 'new'),
(54, 'Giày Asics Gel-Kayano', 3, 'Hỗ trợ chân vòm tốt', 1700000, 1550000, 'https://images.asics.com/is/image/asics/1011B685_001_SR_RT_GLB?$zoom$', '2025-03-11 01:43:10', '2025-03-14 08:58:58', 'old'),
(55, 'Giày thể thao Adidas', 5, 'Bền và chất lượng', 10000, 2000, 'https://sigiaysneaker.com/wp-content/uploads/2020/07/z1972946395933_e07ef8a6e00605d22b800c3d04dc6953.jpg', '2025-03-14 08:41:14', '2025-03-14 08:41:14', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Quản trị viên hệ thống', '2025-03-11 11:11:30', '2025-03-11 11:11:30'),
(2, 'user', 'Người dùng thông thường', '2025-03-11 11:11:30', '2025-03-11 11:11:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `link`, `image`) VALUES
(1, 'https://cdnx.jumpseller.com/portel1te/image/14189866/banner-mutator-1910x500.gif.gif?1611245724', 'banner_sale.jpg'),
(2, 'https://xp.sportzvillage.com/wp-content/uploads/2021/02/adidas-case-study-inner-banner.jpg', 'banner_new.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Áo thể thao', 'Áo thể thao nam, nữ các loại', 'ao.jpg', '2025-03-11 08:20:48', '2025-03-11 08:20:48'),
(3, 'Quần thể thao', 'Quần thể thao thoáng mát, dễ chịu', 'quan.jpg', '2025-03-11 08:20:48', '2025-03-11 08:20:48'),
(5, 'Dụng cụ thể thao', 'Dụng cụ các loại', 'image5.jpg', '2025-03-12 09:56:34', '2025-03-12 10:40:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phan Dương Quốc', 'phanduongquoc111@gmail.com', '$2y$10$IApBMBawu2hZED8f8RuVRuED6WpFtXVkH1yOTyiZlYDmqLGlQ2DHq', NULL, '2025-03-11 10:39:20', '2025-03-11 10:39:20'),
(3, 'Phan Dương Quốc', 'phanduongquoc1@gmail.com', '$2y$10$tRduLBg8OhoVli8ufr7lFuTIwfUidrTri1BHwpYuatk3AvVoLy/n6', NULL, '2025-03-11 11:15:56', '2025-03-11 11:15:56'),
(4, 'Phan Dương Quốc', 'phanduongquoc@gmail.com', '$2y$10$pAMxPehPHjq2EzbVl0eMsOGLWExiqFenlFUuX3KjPBxxCb0Bj7M6q', NULL, '2025-03-11 11:19:16', '2025-03-11 11:19:16'),
(5, 'Phan Quốc', 'phanquoc@gmail.com', '$2y$10$As6.E6dpJHOVQRMfaiDx9uE.9xdyAGV7FzcZaPhFZR49D5zuCg5y2', NULL, '2025-03-11 11:33:12', '2025-03-11 11:33:12'),
(6, 'quoc phan duong', 'quocphan@gmail.com', '$2y$10$R5b5zQb6JDGITWWTzu4bfu1j5KkufkVSVb3bgAi03wSLBoF723hke', NULL, '2025-03-11 11:43:56', '2025-03-14 08:27:03'),
(7, 'Phan Duong Quoc', 'quocphan111@gmail.com', '$2y$10$sNx1BOEiURpas2J/a1mV1./Q/quxIYKn2Qn9THeBH8XUWQ7fEN1VG', NULL, '2025-03-12 12:22:57', '2025-03-12 12:22:57'),
(11, 'nguyen van a', 'nguyenvanA@gmail.com', '$2y$10$eXH35jS.6qQBl13z4EadX.OTwnsxt6BgmTJLKExP4LKwduf8Fc0dG', NULL, '2025-03-25 10:53:56', '2025-03-25 10:53:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `videos`
--

INSERT INTO `videos` (`id`, `title`, `description`, `url`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Hướng dẫn chọn giày thể thao', 'Video hướng dẫn cách chọn giày thể thao phù hợp', 'https://www.youtube.com/embed/vmuihcGvGSc?si=pz4KwqS4ezKqxMCe', 'video1.jpg', '2025-03-11 09:26:03', '2025-03-15 10:26:12'),
(4, 'Hướng dẫn sút bóng bằng mu chính diện', 'Úp mu', 'https://www.youtube.com/embed/gQ6LISlIMCY?si=EOIkqEpsUk5BduAm', 'Thumbnail 12', '2025-03-15 10:25:54', '2025-03-15 10:25:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Chỉ mục cho bảng `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bill_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
