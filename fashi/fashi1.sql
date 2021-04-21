-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 13, 2021 lúc 03:27 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashi1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', 1, '2020-11-24', '2020-11-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `content`, `image`, `status`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'fashi clothes shop', 'yes Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '62556.jpg', 1, 0, '2020-05-12', '2021-01-05'),
(2, 'fashi shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '83407.jpg', 1, 0, '2020-05-12', '2021-01-05'),
(3, 'fashi clothes shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '41963.jpg', 1, 0, '2020-05-12', '2020-11-30'),
(5, 'Welcome to TheWayShop', 'Technology is nothing. What\'s important is that you have a faith in people', '20046.jpg', 1, 0, '2020-07-06', '2020-11-30'),
(7, 'Welcome to TheWayShop', 'Thank you for your visiting <3', '44325.jpg', 1, 0, '2021-01-05', '2021-01-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `shipping_charges` float NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` float NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `grand_total` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `ward`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 2, 'ngocle@gmail.com', 'ngocle', 'so 1 Vo Van Ngan', 'đồng nai', 'tp biên hòa', 'trảng dài', '123456789', 0, 'AIMY001', 300, 'cod', 101, '2021-01-05', '2021-01-04 19:23:13'),
(2, 3, 'sonleminh74@gmail.com', 'Sơn Lê Minh', 'so 1 Vo Van Ngan', 'Bien Hoa', 'biên hòa', 'trảng dài', '123456789', 0, 'AMSA028', 180, 'stripe', 721, '2021-01-05', '2021-01-04 19:30:36'),
(3, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 280, 'stripe', 1121, '2021-01-05', '2021-01-04 20:00:23'),
(4, 4, 'trananhduc1977ductho@gmail.com', 'Đức Trần Anh', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', 'Linh Trung', '123456789', 0, 'AIMY001', 300, 'cod', 101, '2021-01-05', '2021-01-04 20:05:04'),
(5, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 80, 'stripe', 321, '2021-01-05', '2021-01-04 23:10:11'),
(6, 2, 'ngocle@gmail.com', 'ngocle', 'so 1 Vo Van Ngan', 'đồng nai', 'tp biên hòa', 'trảng dài', '123456789', 0, 'AIMY001', 300, 'stripe', 701, '2021-01-14', '2021-01-13 19:18:30'),
(7, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'stripe', 1896, '2021-01-15', '2021-01-14 21:14:50'),
(8, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'stripe', 1500, '2021-01-15', '2021-01-15 01:53:36'),
(9, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'AIMY001', 300, 'stripe', 764, '2021-03-12', '2021-03-12 08:33:34'),
(10, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'AIMY001', 300, 'stripe', 1296, '2021-03-13', '2021-03-13 02:01:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills_details`
--

CREATE TABLE `bills_details` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bills_details`
--

INSERT INTO `bills_details` (`id`, `bill_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:23:13'),
(2, 2, 3, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:30:36'),
(3, 2, 3, 10, '002', 'Women white shirt', 'M', 500, 1, '2021-01-05', '2021-01-04 19:30:36'),
(4, 3, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 20:00:23'),
(5, 3, 1, 10, '002', 'Women white shirt', 'S', 500, 2, '2021-01-05', '2021-01-04 20:00:24'),
(6, 4, 4, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 20:05:04'),
(7, 5, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 23:10:11'),
(8, 6, 2, 8, '001', 'balo', 'M', 401, 1, '2021-01-14', '2021-01-13 19:18:30'),
(9, 6, 2, 20, 'MT001', 'Men Tie', 'M', 600, 1, '2021-01-14', '2021-01-13 19:18:30'),
(10, 7, 1, 20, 'MT001', 'Men Tie', 'M', 600, 1, '2021-01-15', '2021-01-14 21:14:50'),
(11, 7, 1, 8, '001', 'balo', 'M', 532, 3, '2021-01-15', '2021-01-14 21:14:51'),
(12, 8, 1, 20, 'MT001', 'Men Tie', 'L', 600, 3, '2021-01-15', '2021-01-15 01:53:36'),
(13, 9, 1, 8, '001', 'balo', 'M', 532, 2, '2021-03-12', '2021-03-12 08:33:34'),
(14, 10, 1, 8, '001', 'balo', 'M', 532, 3, '2021-03-13', '2021-03-13 02:01:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `content` text NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `status`, `content`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Cảm hứng cổ điển', '43528.jpg', 1, 'Trong khi những chiếc túi xách có xu hướng nhỏ dần đều, phụ kiện bông tai càng dài lại càng được lòng các fashionistas trong mùa mốt Thu Đông 2019 này. Phong cách thời trang thu đông năm nay là câu chuyện tương phản giữa những bộ suit tối giản, cổ điển và các thiết kế đầm, áo choàng dạ tiệc lộng lẫy. Chính vì điều này, xu hướng phụ kiện cũng mang hai tinh thần rõ nét: thanh lịch và xa hoa. Dưới đây là 5 xu hướng phụ kiện được dự đoán sẽ “gây sóng gió” trong cộng đồng “nghiện” thời trang. Bông tai dài đã trở lại và lợi hại hơn xưa Những cô nàng ưa chuộng phong cách này sẽ trở thành một trong những ứng cử viên sáng giá cho ngôi vị “nữ hoàng” trong làng thời trang năm nay. Không còn là món phụ kiện “khó nhằn” và được mặc định chỉ dành cho các dịp trang trọng, bông tai dài phiên bản thu đông 2019 có thể đồng hành cùng nhiều phong cách thời trang. Nhà mốt Prabal Gurung gây dấu ấn với bông tai ngọc trai dài đính tua rua chạm đến… khuỷu tay. Trong khi đó, mặc dù hầu hết các phụ kiện của Louis Vuitton không quá “đồ sộ” nhưng không thể không nhắc đến một vài loại bông tai lông vũ dài đến tận vai, tạo điểm nhấn đặc sắc cho bộ trang phục. Túi cross-body từ thập niên 70 “hồi sinh” Mẫu túi đeo chéo hoặc đeo vai trứ danh từ thập niên 70 trở lại trong diện mạo hoàn toàn mới. Các thiết kế túi nhỏ xinh, tiện lợi chiếm trọn trái tim của giới thượng lưu Pháp những năm 1975 một lần nữa “thống trị” các bảng xếp hạng thời trang của quý cô hiện đại. Nổi bật trên sàn diễn của Givenchy, Valentino, Louis Vuitton,… các item sáng giá này hứa hẹn sẽ được “săn lùng” không ngừng trong năm nay. Từ trái sang: Givenchy, Valentiano, Louis Vuitton Thắt lưng từ thập niên 80 – Điểm nhấn sáng tạo Mùa thu đông năm 2019, các nhà mốt có xu hướng nhìn về quá khứ và món phụ kiện rất thịnh hành những năm 80 – thắt lưng được “lăng xê” nhiệt tình. Streetwear “chất chơi” thế này sẽ “đánh bay” nỗi lo nhạt nhòa giữa đám đông của mọi cô gái thành thị. Từ điểm nhấn tinh tế trên trench coat của Bottega Veneta, đầm cocktail của Versace đến chi tiết da lộn táo bạo trên thiết kế quần shorts của Saint Laurent.', 0, '2020-07-06', '2021-01-14'),
(2, 'Xu hướng thời trang thu', '78544.jpg', 1, 'Chào mùa mới, các tín đồ thời trang lại rục rịch tìm kiếm ý tưởng độc – lạ để refresh tủ quần áo thu đông. Hình ảnh streetstyle ngập tràn trên trang cá nhân của các IT girls Á Âu là những gợi ý lý tưởng cho xu hướng năm nay. Dưới đây là  6 xu hướng hứa hẹn khuấy động làng mốt mà nàng có thể tham khảo. Màu hồng – Biểu tượng lãng mạn và nữ tính Là gam màu được thảm đỏ Oscar danh giá ưu ái năm nay, sắc hồng sẽ làm sáng bừng những ngày tiết trời u buồn của mùa thu. Dù là sắc hồng pastel nhẹ nhàng hay gam hồng neon nổi bật, các nhà mốt vẫn luôn biết cách chiều lòng giới mộ điệu với các thiết kế cực kì trendy. Từ trái sang: Mark Fast, Molly Goddard, MSGM Sắc thái tôn lên vẻ ngọt ngào cho người mặc dường như rất được lòng của 2 chị em quyền lực  Kylie Jenner và Kendall Jenner. Phong cách menswear được các IT girls đình đám lên đồ “cực ngọt” mà những nàng đã trót mê mẩn gam màu này cần phải học hỏi ngay. Xếp nếp ruffle bồng bềnh Sau khi nhà mốt Marc Jacob trình làng mẫu đầm ruffle đồ sộ trong show Xuân Hè 2019, các fashionistas cũng bắt đầu chuẩn bị để hòa mình vào “cơn sốt” ruffle đang nhen nhóm bùng nổ. Từ trái sang: Prabal Gurung, Bora Aksu, Alberta Ferretti Không nằm ngoài dự đoán, mùa mốt Thu Đông năm nay, trang phục nếp xếp mềm mại lại “gây bão” khi tiếp tục xuất hiện trong show thời trang của NTK Thổ Nhĩ Kỳ Bora Aksu và NTK tài năng người Ý Alberta Ferretti. Các người đẹp châu Á như hotgirl Thái Lan Pimtha, “thủ lĩnh” Jennie của nhóm nhạc nữ hot nhất Hàn Quốc Black Pink không ngừng khoe lên trang Instagram hàng triệu người theo dõi outfit váy +áo nhấn nhá chi tiết xếp nếp nữ tính. Xếp li thời thượng Những đường xếp li mềm mại đã trở lại trên sàn diễn thời trang danh giá. Các NTK có vô vàn cách để làm mới phong cách người mặc cùng xu hướng này, từ sắc sảo như các thiết kế của Longchamp đến thanh tao và độc đáo như  phong cách Dior. Từ trái sang là mẫu thiết kế của: Longchamp, Alberta Ferretti, Fendi Chỉ cần diện combo áo kiểu/áo hoodie + chân váy xếp pli nàng đã tỏa sáng lung linh trong bất kì dịp nào. Tùy sở thích mà bạn có thể phối cùng giày sneakers khỏe khoắn hay giày cao gót nữ tính.', 0, '2020-07-06', '2021-01-14'),
(4, 'Xu hướng thời trang mùa đông', '30111.jpg', 1, 'Bảng màu phong cách thời trang 2019 thể hiện sự đa năng,  chính điều đó  tạo ra cảm giác trao quyền về sự  tự tin, cho phép người mặc chọn màu sắc phản ánh đúng nhất tâm trạng và tính cách của mình. Hãy tìm hiểu mầu sắc của bạn!!! Leatrice Eiseman, Giám đốc điều hành của Viện màu sắc Pantone cho biết, bảng màu xu hướng thu / đông 2019-2020 từ dễ dàng và tinh tế đến khác biệt và độc đáo. Hãy cùng cửa hàng thiết kế thời trang Irisstylist khám phá. Bảng màu cơ bản của Pantone bạn nên lưu giữ để nắm ngay trong tay giúp Bạn định hình phong cách cá nhân của mình bằng xu hướng màu sắc cho phong cách thời trang thu đông 2019/2020. Màu sắc cho mùa thu / đông 2019/2020 phản ánh sự xuất hiện của sự tự tin; đậm và mạnh mẽ. Galaxy Blue là một sắc thái hoàng gia mà người ta có thể dễ dàng lạc vào, vì nó gợi lên thiên hà lớn hơn hoặc có lẽ là đại dương sâu thẳm. Đó là màu cơ bản hoàn hảo, và cho xu hướng màu sắc mùa thu 2019. Tông màu rượu là hoàn hảo cho mùa lạnh, vì chúng có chiều sâu và độc đáo cho thời tiết lạnh hơn. Đối với xu hướng màu sắc mùa thu / đông 2019, chúng ta có Merlot, một màu đỏ đậm chỉ với một chút màu nâu toát lên vẻ đẹp sang trọng, đẳng cấp. Nâu Chicory Coffee Màu nâu ngọt ngào Màu này, được mô tả là \'thiền\' bởi Viện màu sắc Pantone, là một màu xanh lá cây trung tính, sâu thẳm, chỉ là một gợi ý ấm hơn so với Forest Biome. Nó thực sự là một màu xanh đậm như có thể, và nó cảm thấy đặc biệt tươi bất chấp bóng tối của nó. Olive là một chút khắc khổ với màu xanh lá cây, vì nó mang đến tâm trí mệt mỏi quân sự. thể hiện trong xu hướng màu sắc mùa thu / đông 2019.', 0, '2020-11-21', '2021-01-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `product_name`, `product_code`, `product_sku`, `size`, `price`, `quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(19, 8, 'balo', '001', 'BL001-L', 'L', '401', 1, '', 'c2sZ5L2AHdTFgfzldNuEZApUqUfcBEUms5GjkLvc', NULL, NULL),
(20, 10, 'Women white shirt', '002', 'WWS002-S', 'S', '500', 1, '', 'c2sZ5L2AHdTFgfzldNuEZApUqUfcBEUms5GjkLvc', NULL, NULL),
(21, 8, 'balo', '001', 'BL001-M', 'M', '401', 1, '', 'c2sZ5L2AHdTFgfzldNuEZApUqUfcBEUms5GjkLvc', NULL, NULL),
(26, 10, 'Women white shirt', '002', 'WWS002-S', 'S', '500', 3, '', 'C9Q0rGE3OUtpxQoun14b3ZlgG1rOvDlDfffqzQVh', NULL, NULL),
(29, 8, 'balo', '001', 'BL001-L', 'L', '532', 1, '', 'x9xnlPYkEJsdeaekArtHyCe6shhm4Hb1ObM0yZY3', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `url`, `description`, `status`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Đồ nam', 'men', 'clothes for men', 1, 0, '2020-05-12', '2021-01-13'),
(3, 'Đồ nữ', 'men-shirt', 'Men Shirt', 1, 0, '2020-05-12', '2021-01-02'),
(4, 'Đồ trẻ em', 'women', 'clothes for women', 1, 0, '2020-05-13', '2020-11-21'),
(5, 'Đồ đôi', 'kids', 'clothes for kids', 1, 0, '2020-05-13', '2020-11-21'),
(6, 'Áo khoác', 'women-shirts', 'Women Shirts', 1, 0, '2020-05-13', '2020-11-30'),
(7, 'Giày', 'kids-shirts', 'Kids Shirts', 1, 0, '2020-05-13', '2021-01-02'),
(9, 'Phụ kiện', 'men-tie', 'ok', 1, 0, '2021-01-05', '2021-01-13'),
(10, 'Men Shoe', 'men-shoe', 'men shoe', 1, 0, '2021-01-13', '2021-01-14'),
(11, 'Váy', 'vay-da-hoi', 'Váy liền thân, váy dạ hội, chân váy', 1, 0, '2021-03-13', '2021-03-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `amount` int(10) NOT NULL,
  `amount_type` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'AIMY001', 300, 'Fixed', '2021-04-30', 1, 0, '2020-05-31', '2021-01-02'),
(4, 'AMSA028', 20, 'Percentage', '2021-01-29', 1, 0, '2020-11-30', '2021-01-05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `shipping_charges` float NOT NULL DEFAULT 0,
  `coupon_code` varchar(255) NOT NULL,
  `coupon_amount` float NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `grand_total` float NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `ward`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 2, 'ngocle@gmail.com', 'ngocle', 'so 1 Vo Van Ngan', 'đồng nai', 'tp biên hòa', 'trảng dài', '123456789', 0, 'AIMY001', 300, 'Đã thanh toán', 'cod', 101, '2021-01-05', '2021-01-04 19:23:13'),
(2, 3, 'sonleminh74@gmail.com', 'Sơn Lê Minh', 'so 1 Vo Van Ngan', 'Bien Hoa', 'biên hòa', 'trảng dài', '123456789', 0, 'AMSA028', 180, 'Đã thanh toán', 'stripe', 721, '2021-01-05', '2021-01-04 19:30:36'),
(3, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan', 'đồng nai', 'bien hoa', 'trảng dài', '1234567890', 0, 'AMSA028', 80, 'Hủy đơn', 'cod', 321, '2021-01-05', '2021-01-04 19:36:55'),
(4, 2, 'ngocle@gmail.com', 'ngocle', 'so 1 Vo Van Ngan', 'đồng nai', 'tp biên hòa', 'trảng dài', '123456789', 0, 'Not Used', 0, 'Đang xử lý', 'cod', 802, '2021-01-05', '2021-01-04 19:52:03'),
(5, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'Hủy đơn', 'stripe', 101, '2021-01-05', '2021-01-04 19:59:18'),
(6, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'Đang xử lý', 'cod', 101, '2021-01-05', '2021-01-04 19:58:29'),
(7, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 280, 'Đã thanh toán', 'stripe', 1121, '2021-01-05', '2021-01-04 20:00:24'),
(8, 4, 'trananhduc1977ductho@gmail.com', 'Đức Trần Anh', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', 'Linh Trung', '123456789', 0, 'AIMY001', 300, 'Đã thanh toán', 'cod', 101, '2021-01-05', '2021-01-04 20:05:04'),
(9, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 80, 'Đã thanh toán', 'stripe', 321, '2021-01-05', '2021-01-04 23:10:11'),
(10, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 200, 'Đang xử lý', 'stripe', 801, '2021-01-14', '2021-01-13 19:09:22'),
(11, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AMSA028', 200, 'Đang xử lý', 'cod', 801, '2021-01-14', '2021-01-13 19:11:45'),
(12, 2, 'ngocle@gmail.com', 'ngocle', 'so 1 Vo Van Ngan', 'đồng nai', 'tp biên hòa', 'trảng dài', '123456789', 0, 'AIMY001', 300, 'Đã thanh toán', 'stripe', 701, '2021-01-14', '2021-01-13 19:18:31'),
(13, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'Not Used', 0, 'Đang xử lý', 'cod', 1402, '2021-01-14', '2021-01-13 19:25:55'),
(14, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'Not Used', 0, 'Hủy đơn', 'cod', 802, '2021-01-14', '2021-03-11 08:39:10'),
(15, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'Đã thanh toán', 'stripe', 1896, '2021-01-15', '2021-01-14 21:14:51'),
(16, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê', 'so 1 Vo Van Ngan linh chiểu', 'tphcm', 'Thủ Đức', 'trảng dài', '1234567890', 0, 'AIMY001', 300, 'Đã thanh toán', 'stripe', 1500, '2021-01-15', '2021-01-15 01:53:36'),
(17, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'Not Used', 0, 'Đang xử lý', 'cod', 1064, '2021-03-12', '2021-03-12 08:23:05'),
(18, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'AIMY001', 300, 'Đã thanh toán', 'stripe', 764, '2021-03-12', '2021-03-12 08:33:35'),
(19, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'Not Used', 0, 'Đang xử lý', 'cod', 532, '2021-03-12', '2021-03-12 08:52:36'),
(20, 1, 'ngochalona18062018@gmail.com', 'Ngọc Lê Lê', 'so 1 Vo Van Ngan linh chiểu', 'TPHCM', 'Thủ Đức', 'Trảng Dài', '1234567890', 0, 'AIMY001', 300, 'Đã thanh toán', 'stripe', 1296, '2021-03-13', '2021-03-13 02:01:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_details`
--

CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_size` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders_details`
--

INSERT INTO `orders_details` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:18:08'),
(2, 2, 3, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:30:20'),
(3, 2, 3, 10, '002', 'Women white shirt', 'M', 500, 1, '2021-01-05', '2021-01-04 19:30:20'),
(4, 3, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:36:24'),
(5, 4, 2, 8, '001', 'balo', 'M', 401, 2, '2021-01-05', '2021-01-04 19:52:03'),
(6, 5, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:56:10'),
(7, 6, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 19:58:29'),
(8, 7, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 20:00:05'),
(9, 7, 1, 10, '002', 'Women white shirt', 'S', 500, 2, '2021-01-05', '2021-01-04 20:00:05'),
(10, 8, 4, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 20:03:55'),
(11, 9, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-05', '2021-01-04 23:09:59'),
(12, 10, 1, 25, 'MS003', 'Men Gray Shoe', 'S', 600, 1, '2021-01-14', '2021-01-13 19:09:22'),
(13, 10, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-14', '2021-01-13 19:09:22'),
(14, 11, 1, 25, 'MS003', 'Men Gray Shoe', 'S', 600, 1, '2021-01-14', '2021-01-13 19:11:45'),
(15, 11, 1, 8, '001', 'balo', 'M', 401, 1, '2021-01-14', '2021-01-13 19:11:45'),
(16, 12, 2, 8, '001', 'balo', 'M', 401, 1, '2021-01-14', '2021-01-13 19:18:01'),
(17, 12, 2, 20, 'MT001', 'Men Tie', 'M', 600, 1, '2021-01-14', '2021-01-13 19:18:01'),
(18, 13, 1, 8, '001', 'balo', 'M', 401, 2, '2021-01-14', '2021-01-13 19:25:55'),
(19, 13, 1, 20, 'MT001', 'Men Tie', 'M', 600, 1, '2021-01-14', '2021-01-13 19:25:55'),
(20, 14, 1, 8, '001', 'balo', 'M', 401, 2, '2021-01-14', '2021-01-13 19:30:35'),
(21, 15, 1, 20, 'MT001', 'Men Tie', 'M', 600, 1, '2021-01-15', '2021-01-14 21:13:49'),
(22, 15, 1, 8, '001', 'balo', 'M', 532, 3, '2021-01-15', '2021-01-14 21:13:49'),
(23, 16, 1, 20, 'MT001', 'Men Tie', 'L', 600, 3, '2021-01-15', '2021-01-15 01:53:04'),
(24, 17, 1, 8, '001', 'balo', 'M', 532, 2, '2021-03-12', '2021-03-12 08:23:05'),
(25, 18, 1, 8, '001', 'balo', 'M', 532, 2, '2021-03-12', '2021-03-12 08:33:09'),
(26, 19, 1, 8, '001', 'balo', 'M', 532, 1, '2021-03-12', '2021-03-12 08:52:36'),
(27, 20, 1, 8, '001', 'balo', 'M', 532, 3, '2021-03-13', '2021-03-13 02:00:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(20) NOT NULL,
  `discounted_price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `hot` int(11) NOT NULL DEFAULT 0,
  `new` int(11) NOT NULL DEFAULT 0,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `price`, `discounted_price`, `image`, `status`, `hot`, `new`, `isDelete`, `created_at`, `updated_at`) VALUES
(8, 1, 'balo', '001', 'Đặc điểm nổi bật của sản phẩm Là sản phẩm thích hợp cho các chuyến du lịch ngắn ngày - Mang cái tên khá chất - Velocity (tốc độ) hướng đến các bạn thích đi phượt/du lịch ngắn ngày cần một chiếc ba lô đồng hành để mang theo vô số đồ dùng cần thiết. - Kích thước: 50 x 28 x 20 cm - Chất liệu được làm chủ yếu bằng vải dù nên trọng lượng của balo Solo Velocity Max Backpack 17.3” chỉ khoảng 1 kg với khả năng chống thấm nước tốt', 532, 532, '71026.jpg', 1, 1, 1, 0, '2020-05-12', '2021-01-15'),
(10, 1, 'Women white shirt', '002', 'women-white-shirt', 800, 500, '88785.jpg', 1, 1, 1, 0, '2020-05-14', '2020-12-09'),
(11, 1, 'Women pants', '003', 'Women pants', 500, 320, '95998.jpg', 1, 1, 1, 0, '2020-05-15', '2020-12-09'),
(12, 1, 'Men jacket', 'MJ001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, 500, '81388.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(13, 1, 'Men scaft', 'MS001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, 500, '94268.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(14, 1, 'Men cap', 'MC001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, 500, '49079.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(15, 1, 'Women sweater', 'WS001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, 500, '80689.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(16, 6, 'Women sweater gray', 'WSG001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, 500, '63207.jpg', 1, 1, 1, 0, '2020-07-11', '2020-11-30'),
(18, 4, 'Women jacket', 'WJ001', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 600, 600, '83668.jpg', 1, 1, 0, 0, '2020-12-09', '2020-12-09'),
(20, 9, 'Men Tie', 'MT001', 'Cà vạt 100% lụa tơ tằm là dòng sản phẩm cao cấp nhất hiện có tại cửa hàng. Cà vạt lụa có độ bóng tự nhiên, được làm từ 100% sợi tơ tằm – sợi tơ protein động vật chắc chắn nhất được ứng dụng trong thời trang và y học cho đến thời điểm hiện tại. Sợi tơ tằm nhẹ, mát, thấm hút ẩm tốt và vô cùng thân thiện với da. ️ Quà tặng miễn phí kèm theo là 1 hộp đựng cao cấp, 1 túi giấy quai xách lịch sự; và 1 thiệp chúc mừng, nhắn gửi tình cảm, 1 nơ ruy băng.', 600, 600, '72158.jpg', 1, 1, 0, 0, '2021-01-13', '2021-01-13'),
(21, 9, 'Men Red Tie', 'MT002', '️ Cà vạt 100% lụa tơ tằm là dòng sản phẩm cao cấp nhất hiện có tại cửa hàng. Cà vạt lụa có độ bóng tự nhiên, được làm từ 100% sợi tơ tằm – sợi tơ protein động vật chắc chắn nhất được ứng dụng trong thời trang và y học cho đến thời điểm hiện tại. Sợi tơ tằm nhẹ, mát, thấm hút ẩm tốt và vô cùng thân thiện với da. ️ Quà tặng miễn phí kèm theo là 1 hộp đựng cao cấp, 1 túi giấy quai xách lịch sự; và 1 thiệp chúc mừng, nhắn gửi tình cảm, 1 nơ ruy băng (nếu có theo yêu cầu).', 600, 555, '66549.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(22, 9, 'Men Black Tie', 'MT003', '️ Cà vạt 100% lụa tơ tằm là dòng sản phẩm cao cấp nhất hiện có tại cửa hàng. Cà vạt lụa có độ bóng tự nhiên, được làm từ 100% sợi tơ tằm – sợi tơ protein động vật chắc chắn nhất được ứng dụng trong thời trang và y học cho đến thời điểm hiện tại. Sợi tơ tằm nhẹ, mát, thấm hút ẩm tốt và vô cùng thân thiện với da. ️ Quà tặng miễn phí kèm theo là 1 hộp đựng cao cấp, 1 túi giấy quai xách lịch sự; và 1 thiệp chúc mừng, nhắn gửi tình cảm, 1 nơ ruy băng (nếu có theo yêu cầu).', 600, 555, '72788.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(23, 9, 'Men PinkTie', 'MT003', '️ Cà vạt 100% lụa tơ tằm là dòng sản phẩm cao cấp nhất hiện có tại cửa hàng. Cà vạt lụa có độ bóng tự nhiên, được làm từ 100% sợi tơ tằm – sợi tơ protein động vật chắc chắn nhất được ứng dụng trong thời trang và y học cho đến thời điểm hiện tại. Sợi tơ tằm nhẹ, mát, thấm hút ẩm tốt và vô cùng thân thiện với da. ️ Quà tặng miễn phí kèm theo là 1 hộp đựng cao cấp, 1 túi giấy quai xách lịch sự; và 1 thiệp chúc mừng, nhắn gửi tình cảm, 1 nơ ruy băng (nếu có theo yêu cầu).', 600, 555, '13811.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(24, 10, 'Men Black Shoe', 'MS002', 'Chất liệu da bò cao cấp, da thật 100%. Form giày ôm chân, thiết kế trẻ trung hiện đại. Đường chỉ may tỉ mỉ, tinh tế đến từng sợi chỉ. Đế chống trơn trượt, thời trang. Màu: Đen, Chất da mềm mại, dễ chịu nhưng không kém phần sang trọng. Thiết kế đơn giản nhưng không kém phần sang trọng. Giày Mọi Da Bò Đen Họa Tiết Lá Phong Độc Đáo là một sự lựa chọn hoàn hảo. Kết hợp với mọi style từ công sở, hẹn hò, dã ngoại. Chất liệu da bò 100% luôn tạo cảm giác thoải mái cho người sử dụng.', 400, 400, '50784.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(25, 10, 'Men Gray Shoe', 'MS003', 'Chất liệu da bò cao cấp, da thật 100%. Form giày ôm chân, thiết kế trẻ trung hiện đại. Đường chỉ may tỉ mỉ, tinh tế đến từng sợi chỉ. Đế chống trơn trượt, thời trang. Màu: Đen, Chất da mềm mại, dễ chịu nhưng không kém phần sang trọng. Thiết kế đơn giản nhưng không kém phần sang trọng. Giày Mọi Da Bò Đen Họa Tiết Lá Phong Độc Đáo là một sự lựa chọn hoàn hảo. Kết hợp với mọi style từ công sở, hẹn hò, dã ngoại. Chất liệu da bò 100% luôn tạo cảm giác thoải mái cho người sử dụng.', 600, 600, '15689.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(26, 10, 'Black White Shoe', 'MS004', 'Chất liệu da bò cao cấp, da thật 100%. Form giày ôm chân, thiết kế trẻ trung hiện đại. Đường chỉ may tỉ mỉ, tinh tế đến từng sợi chỉ. Đế chống trơn trượt, thời trang. Màu: Đen, Chất da mềm mại, dễ chịu nhưng không kém phần sang trọng. Thiết kế đơn giản nhưng không kém phần sang trọng. Giày Mọi Da Bò Đen Họa Tiết Lá Phong Độc Đáo là một sự lựa chọn hoàn hảo. Kết hợp với mọi style từ công sở, hẹn hò, dã ngoại. Chất liệu da bò 100% luôn tạo cảm giác thoải mái cho người sử dụng.', 500, 500, '15209.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(27, 10, 'Men BrownShoe', 'MS005', 'Chất liệu da bò cao cấp, da thật 100%. Form giày ôm chân, thiết kế trẻ trung hiện đại. Đường chỉ may tỉ mỉ, tinh tế đến từng sợi chỉ. Đế chống trơn trượt, thời trang. Màu: Đen, Chất da mềm mại, dễ chịu nhưng không kém phần sang trọng. Thiết kế đơn giản nhưng không kém phần sang trọng. Giày Mọi Da Bò Đen Họa Tiết Lá Phong Độc Đáo là một sự lựa chọn hoàn hảo. Kết hợp với mọi style từ công sở, hẹn hò, dã ngoại. Chất liệu da bò 100% luôn tạo cảm giác thoải mái cho người sử dụng.', 600, 600, '58958.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(28, 3, 'Men White', 'MSH001', 'Áo sơ mi được làm từ chất liệu vải Lụa Nến mềm mịn, không bai gião, ít bám bụi, ít nhăn Áo sơ mi có phom dáng ôm cơ thể, cổ bẻ ôm vừa phải, nhẹ nhàng tôn dáng người mặc Đường may của áo sơ mi rất chắc chắn thoải mái cho người sử dụng có thể vận động Áo sơ mi có màu trắng sữa (Trắng dịu) giúp người mặc dễ dàng phối đồ với những bộ vest hay quần âu, quần jean', 600, 600, '15192.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(29, 3, 'Men Purple Shirt', 'MSH002', 'Áo sơ mi được làm từ chất liệu vải Lụa Nến mềm mịn, không bai gião, ít bám bụi, ít nhăn. Áo sơ mi có phom dáng ôm cơ thể, cổ bẻ ôm vừa phải, nhẹ nhàng tôn dáng người mặc. Đường may của áo sơ mi rất chắc chắn thoải mái cho người sử dụng có thể vận động. Áo sơ mi có màu trắng sữa (Trắng dịu) giúp người mặc dễ dàng phối đồ với những bộ vest hay quần âu, quần jean', 600, 600, '36938.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(30, 3, 'Men Black Shirt', 'MSH003', 'Áo sơ mi được làm từ chất liệu vải Lụa Nến mềm mịn, không bai gião, ít bám bụi, ít nhăn Áo sơ mi có phom dáng ôm cơ thể, cổ bẻ ôm vừa phải, nhẹ nhàng tôn dáng người mặc Đường may của áo sơ mi rất chắc chắn thoải mái cho người sử dụng có thể vận động Áo sơ mi có màu trắng sữa (Trắng dịu) giúp người mặc dễ dàng phối đồ với những bộ vest hay quần âu, quần jean', 600, 600, '15259.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13'),
(31, 1, 'Men Sock', 'MSO001', '✔️ Kiểu cách: Kiểu vớ cổ ngắn đầy cá tính \r\n✔️ Chất liệu: Thun cotton co giãn tốt, dùng lâu không bị chảy. \r\n✔️ Tính năng: Thấm hút tốt mồ hôi, mang lâu không bị hôi chân. \r\n✔️ Phù để mang giầy lười, giầy bệt, giày thể thao ... phù hợp cho mọi người. ✔️ Mang lại cảm giác thoải mái cho người ✔️ Hàng Việt Nam chất lượng cao . ✔️ Đàn hồi, giữ form, không bai, không xù khi giặt máy ✔️ Êm, thoáng mát chân \r\n✔️ Kiểu dáng: cổ nhỡ, FREE SIZE cho người đi giày size dưới 43 \r\n✔️ Nhiều màu cho các bạn nam lựa chọn với đôi giày mình đi \r\n✔️ Thiết kế tỉ mỉ ôm sát chân bảo đảm độ co giãn tốt nên không hằn lên chân. \r\n✔️ Công nghệ nano khử mùi và chống hôi chân hiệu quả.', 200, 200, '25116.jpg', 1, 0, 0, 0, '2021-01-13', '2021-01-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `stock`, `created_at`, `updated_at`) VALUES
(1, 8, 'BL001-S', 'S', 0, '2020-05-14', '2020-11-10'),
(2, 8, 'BL001-M', 'M', 91, '2020-05-14', '2021-03-13'),
(3, 8, 'BL001-L', 'L', 100, '2020-05-14', '2020-12-25'),
(4, 8, 'BL001-XL', 'XL', 5, '2020-05-14', '2020-05-14'),
(7, 10, 'WWS002-S', 'S', 98, '2020-05-14', '2021-01-05'),
(8, 10, 'WWS002-M', 'M', 99, '2020-05-14', '2021-01-05'),
(9, 10, 'WWS002-X', 'L', 5, '2020-05-14', '2020-05-14'),
(11, 10, 'WWS002-XL', 'XL', 5, '2020-05-14', '2020-05-14'),
(12, 11, 'WP003-S', 'S', 1, '2020-05-16', '2020-12-08'),
(13, 11, 'WP003-M', 'M', 3, '2020-05-16', '2020-12-08'),
(14, 11, 'WP003-L', 'L', 4, '2020-05-16', '2020-12-08'),
(15, 11, 'WP003-XL', 'XL', 5, '2020-05-16', '2020-05-16'),
(16, 15, 'WS001-S', 'S', 100, '2020-07-15', '2020-11-21'),
(17, 15, 'WS001-M', 'M', 100, '2020-07-15', '2020-11-21'),
(18, 15, 'WS001-X', 'X', 100, '2020-07-15', '2020-11-21'),
(20, 15, 'WS001-XL', 'XL', 200, '2020-11-21', '2020-11-21'),
(21, 16, 'WSG001-S', 'S', 100, '2020-11-21', '2020-11-21'),
(22, 16, 'WSG001-M', 'M', 200, '2020-11-21', '2020-11-21'),
(23, 16, 'WSG001-L', 'L', 100, '2020-11-21', '2020-11-21'),
(24, 16, 'WSG001-XL', 'XL', 100, '2020-11-21', '2020-11-21'),
(25, 12, 'MJ001-S', 'Small', 100, '2021-01-03', '2021-01-03'),
(32, 20, 'MT001-M', 'M', 0, '2021-01-13', '2021-01-15'),
(33, 20, 'MT001-L', 'L', 97, '2021-01-13', '2021-01-15'),
(34, 20, 'MT001-XL', 'XL', 100, '2021-01-13', '2021-01-13'),
(35, 20, 'MT001-S', 'S', 100, '2021-01-13', '2021-01-13'),
(36, 25, 'MS003-S', 'S', 100, '2021-01-13', '2021-01-13'),
(37, 25, 'MS003-M', 'M', 100, '2021-01-13', '2021-01-13'),
(38, 25, 'MS003-L', 'L', 100, '2021-01-13', '2021-01-13'),
(39, 25, 'MS003-XL', 'XL', 100, '2021-01-13', '2021-01-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `google_id`, `provider`, `provider_id`, `email`, `address`, `state`, `city`, `ward`, `mobile`, `email_verified_at`, `isDelete`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ngọc Lê Lê', NULL, NULL, NULL, 'ngochalona18062018@gmail.com', 'so 1 Vo Van Ngan linh chiểu', 'Thủ Đức', 'TPHCM', 'Trảng Dài', '1234567890', NULL, 0, NULL, 'erAgwYf64YiqaLjNoi8c7Z1CqaJgUq76ZwMcdlHRtk8kZcTGwplCiWRe5wUI', '2021-01-04 02:27:57', '2021-03-13 02:00:55'),
(2, 'ngocle', NULL, NULL, NULL, 'ngocle@gmail.com', 'so 1 Vo Van Ngan', 'tp biên hòa', 'đồng nai', 'trảng dài', '123456789', NULL, 0, '$2y$10$BDNXT4lUR1slovFBFgJlp.I7HZIIOVV8UNvuAhMQNytKL.Iu6G2.i', NULL, '2021-01-04 19:11:12', '2021-01-13 19:17:59'),
(3, 'Sơn Lê Minh', '112281954546890806407', NULL, NULL, 'sonleminh74@gmail.com', 'so 1 Vo Van Ngan', 'biên hòa', 'Bien Hoa', 'trảng dài', '123456789', NULL, 0, NULL, 'jHJurgD5R6jsBnXRMrUC1cCb9FPVgq1spTpxnNcVeZrAgzLNDezszslg5vtB', '2021-01-04 19:27:57', '2021-01-04 19:30:18'),
(4, 'Đức Trần Anh', '116002850497846660632', NULL, NULL, 'trananhduc1977ductho@gmail.com', 'so 1 Vo Van Ngan', 'Ho Chi Minh, thanh pho', 'Ho Chi Minh', 'Linh Trung', '123456789', NULL, 0, NULL, 'QHXL0dcntW4foJ7OzO2VaHFWndFmcgeds606smNsOG3z3G78MCRKoLcvPNnT', '2021-01-04 20:03:24', '2021-01-15 01:58:38'),
(5, 'Ngọc Lê', '109666557715647787891', NULL, NULL, 'ngochalona1862018@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'JcmcLbCtyRajAeKP9d5wEng5HlU1d8aiPIY3A4EJNUgtYQePk67OSMzYxvMQ', '2021-03-11 07:02:50', '2021-03-11 07:02:50'),
(6, 'ngocle', NULL, NULL, NULL, 'ngochalona@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$V8AIBbR9b.rUVRpTAL//WuuvQVwX0b6E66Uutgd/6VpMxSK7gWbcm', NULL, '2021-03-11 07:49:37', '2021-03-11 08:24:11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `bills_details`
--
ALTER TABLE `bills_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_product` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prodcut_cat` (`category_id`);

--
-- Chỉ mục cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_proattri_product` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `bills_details`
--
ALTER TABLE `bills_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `bills_details`
--
ALTER TABLE `bills_details`
  ADD CONSTRAINT `bills_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bills_details_ibfk_2` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bills_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders_details`
--
ALTER TABLE `orders_details`
  ADD CONSTRAINT `orders_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_prodcut_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_cat` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD CONSTRAINT `fk_proattri_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_product_att` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
