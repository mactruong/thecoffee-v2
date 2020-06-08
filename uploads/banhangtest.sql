-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 07, 2020 lúc 04:30 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhangtest`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_work` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_map` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about_us`
--

INSERT INTO `about_us` (`id`, `address`, `phone`, `email`, `time_work`, `link_map`, `link_fb`, `link_instagram`, `link_youtube`, `created_at`, `updated_at`) VALUES
(1, '8 Nguyễn Văn Cừ, Từ Sơn, Bắc Ninh', '0988888888', 'thecoffee@gmail.com', '8:00 a.m đến 22.00 p.m', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `full_name`, `remember_token`, `id_role`, `created_at`, `updated_at`) VALUES
(6, 'truongmac', 'dangtruong@gmail.com', '$2y$10$nXpepIpHfjv.cNJUVjG64OWu7rn5/I.2zVPkYkt2xWIfLXTU4hFC2', 'Mạc Trường', NULL, 1, NULL, NULL),
(7, 'dangtruong', 'truong@gmail.com', '$2y$10$nXpepIpHfjv.cNJUVjG64OWu7rn5/I.2zVPkYkt2xWIfLXTU4hFC2', 'Mạc Trường', NULL, 3, NULL, NULL),
(8, 'truong1503', 'truong1503@gmail.com', '$2y$10$nXpepIpHfjv.cNJUVjG64OWu7rn5/I.2zVPkYkt2xWIfLXTU4hFC2', 'Đăng Trường', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `descriptions`, `image1`, `image2`, `image3`, `image4`, `created_at`, `updated_at`) VALUES
(1, 'THE COFFEE', 'Với những nghệ nhân rang tâm huyết và đội ngũ Barista tài năng cùng những câu chuyện cà phê đầy cảm hứng, ngôi nhà The Coffee 8 Nguyễn Văn Cừ, Từ Sơn, Bắc Ninh là không gian dành riêng cho những ai trót yêu say đắm hương vị của những cốc cà phê tuyệt hảo.', '68_636567263117441012.jpg', '68_636567263114789007.jpg', '68_636567263112293003.jpg', 'img-slide3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Món nổi bật', 'mon-noi-bat', '2018-11-26 11:53:06', '2020-01-26 19:10:24'),
(2, 'Cà phê', 'ca-phe', '2018-11-26 11:53:14', '2020-01-26 19:10:34'),
(4, 'Trà & Macchiato', 'tra-macchiato', '2018-11-27 09:23:18', '2020-01-26 19:11:27'),
(5, 'Thức uống đá xay', 'thuc-uong-da-xay', '2019-12-07 05:54:21', '2020-01-26 19:11:43'),
(6, 'Thức uống trái cây', 'thuc-uong-trai-cay', '2019-12-07 05:55:09', '2020-01-26 19:12:01'),
(7, 'Bánh & Snack', 'banh-snack', '2020-01-26 19:12:20', '2020-01-26 19:12:20'),
(8, 'bánh ngọt lắm', 'banh-ngot-lam', '2020-05-09 07:26:15', '2020-06-02 07:10:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_06_06_022808_create_table_category', 1),
(2, '2020_06_06_023218_create_table_products', 1),
(3, '2020_06_06_024923_create_table_role', 1),
(4, '2020_06_06_030031_create_table_admins', 1),
(5, '2020_06_07_133724_create_table_about_us', 2),
(6, '2020_06_07_134241_create_table_banner', 3),
(7, '2020_06_07_134552_create_table_news', 4),
(8, '2020_06_07_134901_create_table_user', 5),
(9, '2020_06_07_135142_create_table_order', 6),
(10, '2020_06_07_140445_create_table_order_detail', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `short_content`, `full`, `images`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Vui Tết Thiếu nhi, nhận quà ý nghĩa từ The Tarot Coffee  và Tòhe', 'vui-tet-thieu-nhi-nhan-qua-y-nghia-tu-the-tarot-coffee-va-tohe', 'Để mang đến một Tết Thiếu nhi trọn vẹn cho các em nhỏ thiệt thòi, The Tarot Coffee gửi tới bạn những món quà lưu niệm xinh xắn từ Tòhe.', 'Tòhe là một doanh nghiệp xã hội tổ chức sân chơi nghệ thuật miễn phí cho những trẻ em thiệt thòi. Tác phẩm của các \"nghệ sĩ bé\" sẽ được lựa chọn, thiết kế lại và in ấn trên sản phẩm phụ kiện, thời trang. Với mỗi sản phẩm đến tay bạn, 5% giá bán mỗi sản phẩm được Tohe trích lại trực tiếp cho tác giả các bức tranh được sử dụng.\r\n\r\nQuốc tế Thiếu nhi năm nay, The Tarot Coffee vinh dự đồng hành cùng Tòhe trong hành trình mang nghệ thuật đến với các em và cùng tạo nên một không gian sáng tạo.\r\n\r\nVới mỗi hoá đơn gồm 4 đồ uống, Cộng xin gửi tặng bạn một chiếc túi ví đa năng nằm trong bộ sưu tập \"Rất chi là Việt Nam\" của Tòhe.', 'blog2.jpg', 8, NULL, NULL),
(2, 'Cold Brew, Nitro, Tonic. Tại sao không?', 'cold-brew-nitro-tonic-tai-sao-khong', 'Chào ngày mới bằng việc pha chế “những tách mộng mơ” đã trở thành một thói quen bình thường với những Barista tại Nhà Signature.', 'Thường thì các bạn sẽ tiến hành việc này từ buổi sáng sớm, bằng những ly cà phê pour-over thơm ngát, Cold Brew mát lạnh, latte nhẹ nhàng… cho những khách hàng yêu cà phê đồng điệu. Có khi lại ngồi một mình thưởng thức sự tĩnh lặng bên hương vị cà phê khác lạ do mình tạo ra. Dòng Nitro Cold Brew tại Nhà Signature là một trong những ly đặc biệt mà chúng tôi đang nói đến.\r\n\r\nVà để trả lời cho những ai còn lạ lẫm về dòng cà phê mới xuất hiện này, bài viết dưới đây hy vọng sẽ giúp bạn có thêm một lựa chọn thức uống “giải khát” cho ngày hè nóng nực.', 'AO7A730_636567261098797467.jpg', 8, NULL, NULL),
(3, 'Giải nhiệt ngày hè cùng Bộ đôi Sơ Ri!', 'giai-nhiet-ngay-he-cung-bo-doi-so-ri', 'Mùa hè, mùa của những trải nghiệm mới đã bắt đầu. Đừng để những áp lực ngày thường ngăn cản mùa hè trong bạn. Hãy làm mới mình với bộ đôi tươi mát cùng sự kết hợp chưa bao giờ có tại The Tarot Coffee', 'Vị chua ngọt của trái sơ ri 100% tự nhiên đến từ vùng nông sản Gò Công – Tiền Giang, kết hợp với nước ép thanh long đỏ, giúp giải khát và thanh nhiệt. Đặc biệt có chân trâu trắng dai giòn và tép cam vàng, giúp cân bằng hương vị và mang lại hứng thú ngay từ ngụm đầu tiên.\r\n\r\nSự kết hợp lần đầu tiên có mặt tại The Tarot Coffee , Yakult tốt cho sức khỏe kết hợp với vị sơ ri 100% tự nhiên và nước ép thanh long đỏ, giúp căng tràn khỏe khoắn và giải khát cho ngày hè nóng bức.\r\n\r\nBộ đôi sơ ri mát lạnh - tươi khỏe - đầy sức trẻ. Cùng Nhà bung xoã với những trải nghiệm mới trong hè này thôi!', 'sori.png', 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `sum` decimal(10,2) NOT NULL,
  `id_cus` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `sum`, `id_cus`, `type`, `note`, `receiver_name`, `receiver_phone`, `receiver_address`, `admin_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '90000.00', 1, 2, NULL, NULL, NULL, NULL, 6, 'confirmed', '2020-06-07 07:29:23', '2020-06-07 07:29:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `pro_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '55000', '2020-06-07 07:29:23', '2020-06-07 07:29:23'),
(2, 1, 18, 1, '35000', '2020-06-07 07:29:23', '2020-06-07 07:29:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `promo`, `review`, `image`, `price`, `cat_id`, `created_at`, `updated_at`) VALUES
(6, 'CARAMEL MACCHIATO', 'carmel-macchiato', 'BÁN CHẠY NHẤT', 'Vị thơm béo của bọt sữa và sữa tươi, vị đắng thanh thoát của cà phê Espresso hảo hạng, và vị ngọt đậm của sốt caramel.', 'caramen.jpg', '55000', 1, NULL, NULL),
(7, 'CÀ PHÊ SỮA', 'ca-phe-sua', 'Được yêu thích', 'Cà phê phin kết hợp cũng sữa đặc là một sáng tạo đầy tự hào của người Việt, được xem món uống thương hiệu của Việt Nam.', 'coffee-sua.jpg', '35000', 2, NULL, NULL),
(8, 'CÀ PHÊ ĐEN', 'ca-phe-den', 'Bán chạy nhất', 'Một tách cà phê đen thơm ngào ngạt, phảng phất mùi cacao là món quà tự thưởng tuyệt vời nhất cho những ai mê đắm tinh chất nguyên bản nhất của cà phê. Một tách cà phê trầm lắng, thi vị giữa dòng đời vồn vã.', 'coffee-den.jpg', '30000', 2, NULL, NULL),
(9, 'CHANH SẢ ĐÁ XAY', 'chanh-sa-da-xay', 'Món mới', 'Sự kết hợp hài hoà giữa những nguyên liệu mộc mạc rất đỗi quen thuộc đối với người Việt cho một thức uống thanh mát, giải nhiệt lại tốt cho sức khoẻ.', 'chanhday.jpg', '55000', 5, NULL, NULL),
(10, 'COLD BREW PHÚC BỒN TỬ', 'cold-brew-phuc-bon-tu', 'Được yêu thích nhất', 'Vị chua ngọt của trái phúc bồn tử, làm dậy lên hương vị trái cây tự nhiên vốn sẵn có trong hạt cà phê, hòa quyện thêm vị đăng đắng, ngọt dịu nhẹ nhàng của Cold Brew để mang đến một cách thưởng thức cà phê hoàn toàn mới.', 'coldbrew.png', '50000', 1, NULL, NULL),
(11, 'ĐÀO VIỆT QUẤT ĐÁ XAY', 'dao-viet-quat-da-xay', 'Thơm ngon hảo hạng', 'Vẫn vị đào quen thuộc, nhưng được khoác lên mình một dáng vẻ đầy thanh mát và giải khát hơn.', 'dao-viet-quat.jpg', '55000', 5, NULL, NULL),
(12, 'TRÀ OOLONG VẢI NHƯ Ý', 'tra-oolong-vai-nhu-y', 'Được yêu thích nhất', 'Là thức uống \"bắt vị\" được lấy cảm hứng từ trái Vải - thức quả tròn đầy, quen thuộc trong cuộc sống người Việt - kết hợp cùng Trà Oolong làm từ những lá trà tươi hảo hạng.', 'tra-vai.jpg', '55000', 4, NULL, NULL),
(13, 'BÁNH GẤU CHOCOLATE', 'banh-gau-chocolate', 'Dành cho các nàng', 'Với vẻ ngoài đáng yêu và hương vị ngọt ngào, thơm béo nhất định bạn phải thử ít nhất 1 lần.', 'banh-gau.jpg', '40000', 7, NULL, NULL),
(14, 'BÁNH MATCHA', 'banh-matcha', 'Dành cho các nàng', 'Dành cho các nàng', 'banh-matcha.jpg', '30000', 7, NULL, NULL),
(15, 'Trà xoài', 'tra-xoai', 'Món mới', 'Trà xoài', 'dao-viet-quat.jpg', '55000', 6, '2020-04-03 18:48:36', '2020-04-03 18:48:36'),
(17, 'trà sữa', 'tra-sua', 'ngon lắm', 'ngon !', 'coffee-sua.jpg', '50000', 4, '2020-05-10 06:39:46', '2020-05-12 07:09:01'),
(18, 'Bạc Sỉu', 'bac-siu', 'Ngon lắm!', 'Ngon!', 'coffee-sua.jpg', '35000', 2, '2020-05-27 07:00:31', '2020-06-02 07:31:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_key` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`, `role_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Quyền Admin', 'manager', 1, NULL, NULL),
(2, 'Quyền quản lý thông tin', 'manage_info', 1, NULL, NULL),
(3, 'Quyền quản lý bán hàng', 'manage_sale', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `code_active` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `full_name`, `address`, `phone`, `remember_token`, `status`, `type`, `code_active`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'Đăng Trường', 'Bắc Ning', '0123456789', NULL, NULL, 2, NULL, '2020-06-07 07:29:08', '2020-06-07 07:29:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_id_role_foreign` (`id_role`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_cus_foreign` (`id_cus`),
  ADD KEY `order_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_pro_id_foreign` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
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
-- AUTO_INCREMENT cho bảng `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_id_role_foreign` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_id_cus_foreign` FOREIGN KEY (`id_cus`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_detail_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
