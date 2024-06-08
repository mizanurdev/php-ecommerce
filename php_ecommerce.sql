-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 08:37 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sony', 'assets/images/1717263858.', '2024-06-01 17:44:18', '2024-06-01 17:44:18'),
(2, 'Apple', 'assets/images/1717263896.', '2024-06-01 17:44:56', '2024-06-01 17:45:10'),
(3, 'Gentle Park', 'assets/images/1717263917.', '2024-06-01 17:45:17', '2024-06-01 17:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Men Dress', 'assets/images/1717263719.', '2024-06-01 17:41:59', '2024-06-01 17:43:18'),
(3, 'Women Dress', 'assets/images/1717263780.', '2024-06-01 17:43:00', '2024-06-01 17:43:25'),
(4, 'Gadget', 'assets/images/1717263841.', '2024-06-01 17:44:01', '2024-06-01 17:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(6) UNSIGNED NOT NULL,
  `order_number` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `product_name` varchar(300) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_total` decimal(10,2) DEFAULT NULL,
  `product_discount` decimal(10,2) DEFAULT NULL,
  `product_ship_charge` decimal(10,2) DEFAULT NULL,
  `product_grand_total` decimal(10,2) DEFAULT NULL,
  `payment_type` varchar(20) DEFAULT NULL,
  `payment_status` varchar(150) DEFAULT 'pending',
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `status`, `product_name`, `product_id`, `product_price`, `product_qty`, `product_total`, `product_discount`, `product_ship_charge`, `product_grand_total`, `payment_type`, `payment_status`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'SSLCZ_TEST_665b64fff0fea', 'processing', 'Full Sleeve TShirt', 1, 1050.00, 1, 1050.00, 0.00, 60.00, 1110.00, 'ssl', 'paid', 2, '2024-06-01 18:14:29', '2024-06-01 18:14:42'),
(2, 'SSLCZ_TEST_665b64fff0fea', 'processing', 'Smart Watch', 3, 2150.00, 1, 2150.00, 0.00, 60.00, 2210.00, 'ssl', 'paid', 2, '2024-06-01 18:14:29', '2024-06-01 18:14:42'),
(3, 'SSLCZ_TEST_665b64fff0fea', 'processing', 'Nike Sports Shoes', 4, 3150.00, 1, 3150.00, 0.00, 60.00, 3210.00, 'ssl', 'paid', 2, '2024-06-01 18:14:29', '2024-06-01 18:14:42'),
(4, 'SSLCZ_TEST_665b6753e525f', 'processing', 'Sony 600D camera', 2, 74990.00, 1, 74990.00, 0.00, 60.00, 75050.00, 'cod', 'pending', 3, '2024-06-01 18:24:19', '2024-06-01 18:24:20'),
(8, 'SSLCZ_TEST_665b69be8a57a', 'pending', 'Sony 600D camera', 2, 74990.00, 1, 74990.00, 0.00, 60.00, 75050.00, 'ssl', 'pending', 2, '2024-06-01 18:34:38', '2024-06-01 18:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sell_price` decimal(10,2) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `feature_image` varchar(300) DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `sell_price`, `cat_id`, `brand_id`, `feature_image`, `created_at`, `updated_at`) VALUES
(1, 'Full Sleeve TShirt', 1150.00, 1050.00, 1, 3, 'assets/images/1717264146.jpg', '2024-06-01 17:49:06', '2024-06-01 17:49:06'),
(2, 'Sony 600D camera', 78000.00, 74990.00, 4, 1, 'assets/images/1717264285.jpg', '2024-06-01 17:51:25', '2024-06-01 17:51:25'),
(3, 'Smart Watch', 2300.00, 2150.00, 4, 2, 'assets/images/1717264352.jpg', '2024-06-01 17:52:32', '2024-06-01 17:52:32'),
(4, 'Nike Sports Shoes', 3300.00, 3150.00, 1, 3, 'assets/images/1717264401.jpg', '2024-06-01 17:53:21', '2024-06-01 17:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `image` varchar(300) DEFAULT '',
  `email` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `code` int(11) DEFAULT 0,
  `first_name` varchar(150) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `cell` varchar(22) DEFAULT NULL,
  `address_one` text DEFAULT NULL,
  `address_two` text DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `user_type` varchar(50) DEFAULT 'customer',
  `status` varchar(30) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `image`, `email`, `password`, `code`, `first_name`, `last_name`, `cell`, `address_one`, `address_two`, `country_id`, `city_id`, `state_id`, `zip_code`, `user_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MD. MIZANUR RAHMAN', 'mizan', 'assets/images/1717263604.jpg', 'mizancse2018@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 123053, 'Md. Mizanur', 'Rahman', '01521422759', 'mugda', 'dhaka', NULL, NULL, NULL, '1217', 'admin', 'approved', '2024-06-01 17:37:58', '2024-06-01 17:40:44'),
(2, 'Mahmudul Hasan', 'sun', 'assets/images/1717265848.jpg', 'mahmudul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 374715, 'Mahmudul', 'Hasan', '01521422759', 'uttara', 'dhaka', 2, 2, 2, '1200', 'customer', 'approved', '2024-06-01 18:14:23', '2024-06-01 18:17:28'),
(3, 'Masfiq Hasan', '', '', 'masfiq@test.com', '', 0, 'Masfiq', 'Hasan', '017000000', 'pabna', 'rajshahi', 2, 2, 2, '6600', 'customer', 'pending', '2024-06-01 18:24:19', '2024-06-01 18:24:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
