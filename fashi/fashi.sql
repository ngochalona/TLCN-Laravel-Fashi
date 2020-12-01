-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3325
-- Thời gian đã tạo: Th7 16, 2020 lúc 11:17 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashi`
--

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
  `active` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `content`, `image`, `status`, `active`, `created_at`, `updated_at`) VALUES
(1, 'fashi clothes shop', 'yes Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '65967.jpg', 1, 1, '2020-05-12', '2020-05-12'),
(2, 'fashi shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '39329.jpg', 1, 0, '2020-05-12', '2020-05-12'),
(3, 'fashi clothes shop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '41963.jpg', 1, 0, '2020-05-12', '2020-07-06'),
(5, 'Welcome to TheWayShop', 'Technology is nothing. What\'s important is that you have a faith in people', '20046.jpg', 1, 0, '2020-07-06', '2020-07-06');

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
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `status`, `content`, `created_at`, `updated_at`) VALUES
(1, 'fashion in autumn', '54105.jpg', 1, 'Psum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', '2020-07-06', '2020-07-06'),
(2, 'beauty in autumn', '27009.jpg', 1, 'sum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate.', '2020-07-06', '2020-07-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Men', 'men', 'clothes for men', 1, '2020-05-12', '2020-07-15'),
(3, 1, 'Men Shirt', 'men-shirt', 'Men Shirt', 1, '2020-05-12', '2020-05-12'),
(4, 0, 'Women', 'women', 'clothes for women', 1, '2020-05-13', '2020-06-08'),
(5, 0, 'Kids', 'kids', 'clothes for kids', 1, '2020-05-13', '2020-05-13'),
(6, 4, 'Women Shirts', 'women-shirts', 'Women Shirts', 1, '2020-05-13', '2020-05-13'),
(7, 5, 'Kids Shirts', 'kids-shirts', 'Kids Shirts', 1, '2020-05-13', '2020-05-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

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
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AIMY001', 250, 'Fixed', '2020-07-31', 1, '2020-05-31', '2020-07-11'),
(3, 'AMSA028', 10, 'Percentage', '2020-07-31', 1, '2020-05-31', '2020-07-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `country`, `pincode`, `mobile`, `updated_at`, `created_at`) VALUES
(1, 1, 'admin@gmail.com', 'admin', '1/29', 'Bien Hoaa', 'Trang Daii', 'Vietnam', '1233', '1234567891', '2020-06-03', '2020-05-31'),
(3, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', 'Vietnam', '1233', '1233', '2020-07-13', '2020-06-01'),
(4, 4, 'hungvi@gmail.com', 'admin', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', 'Vietnam', '123', '123456789', '2020-07-13', '2020-07-13'),
(5, 19, 'ngocle14@gmail.com', 'Lê Minh Ngọc', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', 'Vietnam', '123', '123456789', '2020-07-15', '2020-07-15'),
(6, 20, 'ngocle15@gmail.com', 'Lê Minh Ngọc', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', 'Vietnam', '123', '123456789', '2020-07-15', '2020-07-15');

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
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
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

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `city`, `state`, `pincode`, `country`, `mobile`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'Paid', 'cod', 7150, '2020-06-05', '2020-07-12 13:53:28'),
(2, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AMSA028', 90, 'Paid', 'paypal', 1710, '2020-06-05', '2020-07-12 13:53:23'),
(3, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 0, 'Paid', 'stripe', 500, '2020-07-11', '2020-07-12 13:53:18'),
(4, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 0, 'In Process', 'cod', 500, '2020-07-11', '2020-07-12 13:53:54'),
(5, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'New', 'cod', 550, '2020-07-13', '2020-07-13 05:07:37'),
(6, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 0, 'New', 'cod', 800, '2020-07-13', '2020-07-13 05:14:31'),
(7, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'Paid', 'cod', 1250, '2020-07-13', '2020-07-13 12:48:08'),
(8, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'New', 'stripe', 750, '2020-07-13', '2020-07-13 05:26:36'),
(9, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'New', 'cod', 2250, '2020-07-13', '2020-07-13 05:30:15'),
(10, 4, 'hungvi@gmail.com', 'admin', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', '123', 'Vietnam', '123456789', 0, 'AIMY001', 250, 'New', 'stripe', 1850, '2020-07-13', '2020-07-13 05:36:15'),
(11, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AIMY001', 250, 'New', 'cod', 1750, '2020-07-13', '2020-07-13 06:12:25'),
(12, 3, 'ngocle@gmail.com', 'ngocle', '12/33', 'Ha Noi', 'Dong Da', '1233', 'Vietnam', '1233', 0, 'AMSA028', 65, 'New', 'cod', 1235, '2020-07-13', '2020-07-13 06:40:55'),
(13, 19, 'ngocle14@gmail.com', 'Lê Minh Ngọc', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', '123', 'Vietnam', '123456789', 0, 'AMSA028', 125, 'New', 'stripe', 2375, '2020-07-15', '2020-07-15 02:52:02'),
(14, 20, 'ngocle15@gmail.com', 'Lê Minh Ngọc', 'so 1 Vo Van Ngan', 'Ho Chi Minh', 'Ho Chi Minh, thanh pho', '123', 'Vietnam', '123456789', 0, 'AIMY001', 250, 'New', 'stripe', 1550, '2020-07-15', '2020-07-15 05:39:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
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
-- Đang đổ dữ liệu cho bảng `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 10, '002', 'Women white shirt', 'L', 1000, 5, '2020-06-05', '2020-06-05 05:30:59'),
(2, 1, 3, 11, '003', 'Women pants', 'M', 800, 3, '2020-06-05', '2020-06-05 05:30:59'),
(3, 2, 3, 10, '002', 'Women white shirt', 'S', 500, 2, '2020-06-05', '2020-06-05 06:02:46'),
(4, 2, 3, 11, '003', 'Women pants', 'M', 800, 1, '2020-06-05', '2020-06-05 06:02:46'),
(5, 3, 3, 10, '002', 'Women white shirt', 'S', 500, 1, '2020-07-11', '2020-07-11 03:51:18'),
(6, 4, 3, 11, '003', 'Women pants', 'S', 500, 1, '2020-07-11', '2020-07-11 03:53:42'),
(7, 5, 3, 8, '001', 'balo', 'M', 800, 1, '2020-07-13', '2020-07-13 05:07:37'),
(8, 6, 3, 8, '001', 'balo', 'M', 800, 1, '2020-07-13', '2020-07-13 05:14:31'),
(9, 7, 3, 10, '002', 'Women white shirt', 'S', 500, 3, '2020-07-13', '2020-07-13 05:22:40'),
(10, 8, 3, 10, '002', 'Women white shirt', 'S', 500, 2, '2020-07-13', '2020-07-13 05:26:36'),
(11, 9, 3, 10, '002', 'Women white shirt', 'S', 500, 2, '2020-07-13', '2020-07-13 05:30:15'),
(12, 10, 4, 8, '001', 'balo', 'S', 500, 1, '2020-07-13', '2020-07-13 05:36:15'),
(13, 10, 4, 10, '002', 'Women white shirt', 'M', 800, 2, '2020-07-13', '2020-07-13 05:36:15'),
(14, 11, 3, 8, '001', 'balo', 'S', 500, 1, '2020-07-13', '2020-07-13 06:12:25'),
(15, 11, 3, 10, '002', 'Women white shirt', 'S', 500, 3, '2020-07-13', '2020-07-13 06:12:25'),
(16, 12, 3, 8, '001', 'balo', 'S', 500, 1, '2020-07-13', '2020-07-13 06:40:55'),
(17, 12, 3, 10, '002', 'Women white shirt', 'M', 800, 1, '2020-07-13', '2020-07-13 06:40:55'),
(18, 13, 19, 11, '003', 'Women pants', 'S', 500, 2, '2020-07-15', '2020-07-15 02:52:02'),
(19, 13, 19, 10, '002', 'Women white shirt', 'S', 500, 3, '2020-07-15', '2020-07-15 02:52:02'),
(20, 14, 20, 10, '002', 'Women white shirt', 'M', 800, 1, '2020-07-15', '2020-07-15 05:39:01'),
(21, 14, 20, 8, '001', 'balo', 'S', 500, 2, '2020-07-15', '2020-07-15 05:39:01');

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
  `description` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `hot` int(11) NOT NULL DEFAULT 0,
  `new` int(11) NOT NULL DEFAULT 0,
  `feature` int(11) NOT NULL DEFAULT 0,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `code`, `description`, `price`, `image`, `status`, `hot`, `new`, `feature`, `created_at`, `updated_at`) VALUES
(8, 1, 'balo', '001', 'Lorem ipsum dolor sit amet, consectetur ing elit, sed do eiusmod tempor sum dolor sit amet, consectetur adipisicing elit, sed do mod tempor', 500, '71026.jpg', 1, 1, 1, 1, '2020-05-12', '2020-07-11'),
(10, 6, 'Women white shirt', '002', 'women-white-shirt', 800, '88785.jpg', 1, 1, 1, 1, '2020-05-14', '2020-05-14'),
(11, 6, 'Women pants', '003', 'Women pants', 500, '95998.jpg', 1, 1, 1, 1, '2020-05-15', '2020-07-15'),
(12, 3, 'Men jacket', 'MJ001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, '81388.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(13, 1, 'Men scaft', 'MS001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, '94268.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(14, 1, 'Men cap', 'MC001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, '49079.jpg', 1, 1, 1, 1, '2020-07-11', '2020-07-15'),
(15, 6, 'Women sweater', 'WS001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, '80689.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15'),
(16, 6, 'Women sweater gray', 'WSG001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 500, '63207.jpg', 1, 1, 1, 0, '2020-07-11', '2020-07-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 8, 'BL001-S', 'S', 500, 5, '2020-05-14', '2020-05-14'),
(2, 8, 'BL001-M', 'M', 800, 5, '2020-05-14', '2020-05-14'),
(3, 8, 'BL001-L', 'L', 1000, 5, '2020-05-14', '2020-05-14'),
(4, 8, 'BL001-XL', 'XL', 1200, 5, '2020-05-14', '2020-05-14'),
(7, 10, 'WWS002-S', 'S', 500, 5, '2020-05-14', '2020-05-14'),
(8, 10, 'WWS002-M', 'M', 800, 5, '2020-05-14', '2020-05-14'),
(9, 10, 'WWS002-X', 'L', 1000, 5, '2020-05-14', '2020-05-14'),
(11, 10, 'WWS002-XL', 'XL', 1200, 5, '2020-05-14', '2020-05-14'),
(12, 11, 'WP003-S', 'S', 500, 5, '2020-05-16', '2020-05-16'),
(13, 11, 'WP003-M', 'M', 800, 5, '2020-05-16', '2020-05-16'),
(14, 11, 'WP003-L', 'L', 1000, 5, '2020-05-16', '2020-05-16'),
(15, 11, 'WP003-XL', 'XL', 1200, 5, '2020-05-16', '2020-05-16'),
(16, 15, 'WS001-S', 'S', 500, 20, '2020-07-15', '2020-07-15'),
(17, 15, 'WS001-M', 'M', 800, 10, '2020-07-15', '2020-07-15'),
(18, 15, 'WS001-X', 'X', 1000, 10, '2020-07-15', '2020-07-15'),
(19, 15, 'WS001-XL', 'XL', 1200, 10, '2020-07-15', '2020-07-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `state`, `city`, `country`, `pincode`, `mobile`, `email_verified_at`, `admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '1/29', 'Trang Dai', 'Bien Hoa', 'Vietnam', '123', '123456789', '2020-05-31 03:44:47', 1, '$2y$10$7ync2WPDNL5QJ4JkxwXWjeXOWo5E/E6ynayg30IdaoQzyVxNihRJO', NULL, '2020-05-11 20:36:23', '2020-06-03 05:02:12'),
(3, 'ngocle', 'ngocle@gmail.com', '12/3', 'Dong Da', 'Ha Noi', 'Vietnam', '123', '123', '2020-06-01 06:55:23', 0, '$2y$10$z6kn8Q4kKLIBNz7rRVUAz.bT8P4AeNpSaHwf1cgI21oDLicD36j0e', NULL, '2020-06-01 06:55:01', '2020-07-13 06:40:48'),
(4, 'Lê Minh Ngọc', 'hungvi@gmail.com', 'so 1 Vo Van Ngan', 'Ho Chi Minh, thanh pho', 'Ho Chi Minh', 'Vietnam', '123', '123456789', '2020-07-13 05:33:54', 0, '$2y$10$o.coL6CwpACD8jJMD8w.R.fUhYQTFccBPHARozQiKxhAfc7X/y2Wu', NULL, '2020-07-12 02:27:27', '2020-07-13 05:35:12'),
(5, 'Lê Minh Ngọc', 'hoaiphong@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$5LmJWw0YKUWN1jBPe9dqNeulRwE3pcLSz6VoqYJOXcZpUcm1FT1K.', NULL, '2020-07-12 07:39:26', '2020-07-12 07:39:26'),
(6, 'Lê Minh Ngọc', 'phubui2702@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-12 07:49:09', 0, '$2y$10$gXTQ/2VJlukpt8d95EZacOswl9NQyEwRsGgmcHp5ZbrhO9Nk5ir4W', NULL, '2020-01-12 07:49:09', '2020-01-12 07:49:09'),
(7, 'Lê Minh Ngọc', 'ngocle1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-12 07:49:33', 0, '$2y$10$rjo/VuHZg4JfZEpNrwVxgOsgKhrR7LTe8UW0/OdEDvIgn.3TF2riu', NULL, '2020-02-12 07:49:33', '2020-02-12 07:49:33'),
(8, 'Lê Minh Ngọc', 'ngocle2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-03-12 07:49:56', 0, '$2y$10$.3aGCYlce1llenE6y5wWI.KkzUYQzTt1jkRd1bW7r90Wx5Z3/2oGa', NULL, '2020-03-12 07:49:56', '2020-03-12 07:49:56'),
(9, 'Lê Minh Ngọc', 'ngocle3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-04-12 07:51:44', 0, '$2y$10$QjJ352jrh8JiT2ysXPDdZOPzpPsC8eeatIssQcQwdbuc1jUKAAX1a', NULL, '2020-04-12 07:51:44', '2020-04-12 07:51:44'),
(10, 'Lê Minh Ngọc', 'ngocle5@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-12 07:52:14', 0, '$2y$10$KJQeRAvVC0wkayJSq5nRSuwtfXgqR.9tDQr7TgDjzRZNIW3QWE5nq', NULL, '2020-05-12 07:52:14', '2020-05-12 07:52:14'),
(11, 'Lê Minh Ngọc', 'ngocle6@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 07:52:56', 0, '$2y$10$JberR1dWeZ9S9IAVSgifRu3dHJ94qPdA2fpwLLfb.e5AtRLBtAD/u', NULL, '2020-06-12 07:52:56', '2020-06-12 07:52:56'),
(12, 'Lê Minh Ngọc', 'ngocle7@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$wPBg1Ofw1mS5ieUo5XlCZeP2bAbMedqr4QVPJTADuVmG6pRO76VGS', NULL, '2020-07-12 07:53:15', '2020-07-12 07:53:15'),
(13, 'Lê Minh Ngọc', 'ngocle8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 07:53:33', 0, '$2y$10$CB9eBARHcOCZ7m5EPvn9nesGgK1qVe3ujg78JLn37pIV5uKqOwYSG', NULL, '2020-07-12 07:53:33', '2020-07-12 07:53:33'),
(14, 'Lê Minh Ngọc', 'ngocle9@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 07:53:53', 0, '$2y$10$ly7YwZ594KXakcK9no.NSe1i2VTCJZNY7JhbFXS.Ln.v0sqxFYR2q', NULL, '2020-07-12 07:53:53', '2020-07-12 07:53:53'),
(15, 'Lê Minh Ngọc', 'ngocle10@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-06-12 07:54:11', 0, '$2y$10$Vm62MZ0UwSb5iTaWFZl46.XGRy.ZR5RLuaFG83zqmT3sVMfEbK5y6', NULL, '2020-06-12 07:54:11', '2020-06-12 07:54:11'),
(16, 'Lê Minh Ngọc', 'ngocle11@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$fgKwXu3tvGJ4gBK/.5O1heFaRSGnpz/T.HjN8Kzrgq7UIobrT2A3e', NULL, '2020-07-12 09:02:14', '2020-07-12 09:02:14'),
(17, 'Lê Minh Ngọc', 'ngocle12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '$2y$10$R6GFDjMx4B/mQv5wR6rDs.pLJWA.Mc2nT8xvvsJ.xvTa3vTrgSB5K', NULL, '2020-07-12 09:13:42', '2020-07-12 09:13:42'),
(18, 'Lê Minh Ngọc', 'ngocle13@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '2020-07-12 09:15:43', 0, '$2y$10$PQM/MDKioPOG3hX8Mg7HC.EUPTMFrqU.pjBt3rYjGckD3vpj1W9qW', NULL, '2020-07-12 09:15:27', '2020-07-12 09:15:43'),
(19, 'Lê Minh Ngọc', 'ngocle14@gmail.com', 'so 1 Vo Van Ngan', 'Ho Chi Minh, thanh pho', 'Ho Chi Minh', 'Vietnam', '123', '123456789', '2020-07-15 02:47:06', 0, '$2y$10$Nj6MpBmFx4WosrlDUUwv..ZQellY/aMK4AlgVRTI2bM8JvtVhGsWO', NULL, '2020-07-15 02:44:26', '2020-07-15 02:49:39'),
(20, 'Lê Minh Ngọc', 'ngocle15@gmail.com', 'so 1 Vo Van Ngan', 'Ho Chi Minh, thanh pho', 'Ho Chi Minh', 'Vietnam', '123', '123456789', '2020-07-15 05:34:38', 0, '$2y$10$Y2chIqKCg.2/TRa2oQ37vu7KDCSqqKshFNCBROyOe7mbWno4w4Ypi', NULL, '2020-07-15 05:33:05', '2020-07-15 05:38:01');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
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
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
