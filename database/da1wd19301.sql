-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2024 lúc 08:42 AM
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
-- Cơ sở dữ liệu: `da1wd19301`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `soft_delete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `type`, `soft_delete`) VALUES
(1, 'Mỹ phẩm cơ bản', 0, 0),
(2, 'Mỹ phẩm cao cấp', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `payment` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `quantity`, `description`, `status`, `category_id`) VALUES
(6, ' Son Dưỡng Có Màu Glow Tint Lip Balm 3.5g', 'img/td1.jpg', 180, 14, 'Thông tin chi tiết về Sản phẩm\r\nLƯU Ý: màu son mỗi người dùng sẽ có mỗi khác mọi người nha.\r\n????Là 1 thỏi son với hiệu ứng 2 trong 1:\r\n➖Lên màu vivid tint cực đẹp lấy cảm hứng từ màu sắc của từng cánh hoa.\r\n➖Lần đầu tiên 1 thỏi son tint chứa đựng thành phần dưỡng môi đáng kinh ngạc. Bao gồm rosehip oil, rose water và acacia collagen phục hồi làn môi thâm, nứt nẻ một cách hoàn hảo.\r\n????Rosehip Oil chính là tinh dầu Tầm Xuân – đây là một loại tinh dầu thích hợp dùng cho làn môi nứt nẻ, hằn sâu, nhiều vết thâm và thường xuyên mất nước.\r\n????Omega 3, Omega 6 và các a-xít béo thiết yếu: Các hợp chất lipid (chất béo) trong các chất này là nhân tố quan trọng trong quá trình dưỡng ẩm đối với làn môi khô và cải thiện độ mềm mại và độ đàn hồi của môi. Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”\r\n????Acacia Collagen : là một kết hợp giữa collagen và Phyto, có tính chất làm se, kích thích các tế bào da sản xuất thêm collagen. Giúp làn da môi phục hồi nhanh chóng và giữ suốt 24h.', 1, 2),
(7, 'Tẩy da chết DermaDS 100ml', 'img/nuoccanbang.jpg', 490, 100, '????là một kết hợp giữa collagen và Phyto, có tính chất làm se, kích thích các tế bào da sản xuất thêm collagen. Giúp làn da môi phục hồi nhanh chóng và giữ suốt 24h.', 1, 2),
(8, 'Toner dành cho da dầu DermaDS 180ml', 'img/about-start.webp', 230, 100, 'Omega 3, Omega 6 và các a-xít béo thiết yếu: Các hợp chất lipid (chất béo) trong các chất này là nhân tố quan trọng trong quá trình dưỡng ẩm đối với làn môi khô và cải thiện độ mềm mại và độ đàn hồi của môi. Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”', 1, 1),
(9, 'Kem chống nắng Ultra Sunscreen 5IN1 Face SPF 50 PA+++ 50ml', 'img/dd10.png', 599, 50, '????Omega 3, Omega 6 và các a-xít béo thiết yếu: Các hợp chất lipid (chất béo) trong các chất này là nhân tố quan trọng trong quá trình dưỡng ẩm đối với làn môi khô và cải thiện độ mềm mại và độ đàn hồi của môi. Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”', 1, 2),
(10, 'Mặt nạ Dưỡng trắng Siêu cấp ẩm O’Muse Aquaporin mask', 'img/1605092721.jpg', 100, 1000, '????Acacia Collagen : là một kết hợp giữa collagen và Phyto, có tính chất làm se, kích thích các tế bào da sản xuất thêm collagen. Giúp làn da môi phục hồi nhanh chóng và giữ suốt 24h.', 1, 1),
(11, 'Phấn Má Single Blusher', 'img/td3.jpg', 150000, 500, 'giúp nâng tông da bám chắc không sợ mồ hôi', 1, 1),
(12, 'Phấn nước AprilSkin', 'img/td4.png', 90000, 200, 'Các axit béo thiết yếu rất quan trọng đối với sức khỏe của da của chúng ta, tuy nhiên cơ thể của chúng ta lại không thể tạo ra chúng – vì vậy dưỡng chất này giống như bổ sung những gì còn thiếu cho làn da, làm thỏa mãn “cơn khát”', 1, 1),
(13, 'New Tinh chất chống lão hoá O’Muse Secret Timeless Rejuvenating 30ml', 'img/dd5.jpg', 739000, 100, 'Rosehip Oil chính là tinh dầu Tầm Xuân – đây là một loại tinh dầu thích hợp dùng cho làn môi nứt nẻ, hằn sâu, nhiều vết thâm và thường xuyên mất nước.', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `username` varchar(199) NOT NULL,
  `password` varchar(199) NOT NULL,
  `email` varchar(199) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
