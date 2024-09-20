-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 08:37 PM
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
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us', '\r\n\r\n\r\n\r\nSpare more with RequSite! We give you the most minimal costs on all of your grocery needs.\r\n\r\n\r\n\r\n', '\r\nRequiSite is the most convenient online grocery channel. Our channel makes your grocery shopping even simpler. No more hassles of sweating it out in crowded markets, grocery shops & supermarkets - now shop from the comfort of your home; office or on the move.\r\n\r\nRequiSite aims to offer customers a wide range of basic home and personal products under one roof.\r\n\r\nWe offer you convenience of shopping everything that you need for your home - be it fresh fruits & vegetables, rice, dals, oil, packaged food, dairy item, frozen, pet food, household cleaning items & personal care products from a single virtual store. Our core objective is to offer customers good products at great value.\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`) VALUES
(2, 'Administrator', 'admin@mail.com', 'admin', 'user-profile-min.png', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_top` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_top`, `cat_image`) VALUES
(2, 'Groceries', 'yes', 'icons8-grocery-bag-48.png'),
(3, 'Home & Kitchen', 'no', 'icons8-dishwasher-48.png'),
(4, 'Electronics', 'no', 'icons8-light-48.png'),
(5, 'Beauty', 'no', 'icons8-lip-gloss-48.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_confirm_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_confirm_code`) VALUES
(8, 'Jaimik Pankaj Kadu', 'jaimikpkadu18@gmail.com', 'abc', '1234567890', 'Dahanu, Maharashtra', 'dragon-ball-super-wallpaper-full-hd-1080p-242449.jpg', '::1', '690981255'),
(9, 'Jaimik Kadu', 'test@mail.com', '1234', '1234567890', 'Dahanu', '1.jpg', '::1', '275843531');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `order_date`, `order_status`) VALUES
(45, 8, 119, 1099673286, 1, '2022-05-20 09:28:08', 'Complete'),
(46, 8, 625, 1295079549, 1, '2022-05-20 09:34:43', 'Complete'),
(47, 8, 63, 1295079549, 1, '2024-06-30 09:22:24', 'Complete'),
(48, 8, 43, 563808968, 1, '2024-07-02 18:08:38', 'Complete'),
(49, 8, 224, 196987783, 1, '2024-06-28 10:19:57', 'pending'),
(50, 9, 595, 1337331421, 5, '2024-07-02 18:08:35', 'Complete'),
(51, 9, 32, 1337331421, 1, '2024-07-01 10:18:50', 'pending'),
(52, 9, 63, 1099868288, 1, '2024-07-01 10:43:54', 'pending'),
(53, 8, 68, 1957744148, 1, '2024-07-02 18:08:00', 'pending'),
(54, 8, 32, 1957744148, 1, '2024-07-02 18:08:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `enquiry_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `name`, `email`, `subject`, `message`, `enquiry_type`, `created_at`) VALUES
(1, 'Jaimik', 'test@mail.com', 'Test 1', 'this a test message', 'Technical Support', '2024-07-02 10:55:58');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`) VALUES
(9, 'Amul', 'yes', 'icons8-milk-carton-48.png'),
(10, 'Mamaearth', 'no', 'icons8-tube-48.png'),
(11, 'Parle', 'no', 'icons8-cookies-48.png'),
(12, 'DOMS', 'no', 'icons8-stationery-48.png'),
(13, 'Syska', 'no', 'icons8-light-48.png'),
(14, 'GoFresh', 'no', 'icons8-grocery-bag-48.png');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`) VALUES
(26, 0, 0),
(27, 0, 0),
(28, 0, 0),
(29, 0, 0),
(30, 0, 0),
(31, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(45, 8, 1099673286, '20', 1, 'Complete'),
(47, 8, 1295079549, '26', 1, 'Complete'),
(48, 8, 563808968, '19', 1, 'Complete'),
(50, 9, 1337331421, '20', 5, 'Complete'),
(51, 9, 1337331421, '23', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_keywords`, `product_label`, `status`) VALUES
(5, 5, 2, 14, '2022-05-19 19:56:53', 'Eggs - Medium, Antibiotic Residue-Free, 12 pcs', 'egg', 'egg_1.jpg', 'egg_2.jpg', 'egg_3.jpg', 84, 70, '\r\nOur Infertile Free Range Eggs are produced using traditional farming methods, ensuring highest animal protection standards. Our hens are pasture raised and humanely treated. These eggs do not contain antibiotics, growth promoters, hormones or any such substances.\r\n\r\nOur Hens Enjoy! They are free to roam outdoors and we get a lot of greens to feed on. We provide enough space place for them to rest. These are non-fertile eggs.These are one of the most wholesome and cost-effective foods.\r\n', 'egg, eggs', 'Sale', 'product'),
(19, 12, 3, 12, '2022-05-19 18:58:56', 'Doms X1 X-Tra Super Dark Pencil (Pack of 10)', 'doms-x1-super-dark-pencil', '1d.jpg', '2d.jpg', '3d.jpg', 50, 43, 'Introduce your child to the world of writing with Doms X1 X-Tra Super Dark Pencil. They are extra strong pencils that minimizes breaking leads while giving you dark, smudge-free writing experience. Ideal for home, school and office use. Buy this product online today!\r\n\r\n', 'pencil, doms, stationery', 'Sale', 'product'),
(20, 10, 2, 14, '2022-05-20 03:44:35', 'Watermelon Seedless Large Premium Indian 1 Pc (Approx 3.0 Kg - 4 Kg)', 'fruit-watermelon', 'W_1.jpg', 'W_2.jpg', 'W_3.jpg', 149, 119, '\r\nWatermelon Seedless offers a sweet taste, pleasant flavour, and crisp texture. It is a round-shaped fruit that is stripped in light and dark shades of green. The flesh is red and juicy with tiny white edible pseudo seeds.\r\n\r\nWatermelon Seedless is great for fresh snacking due to the less fuss of seeds. Watermelons are incredibly hydrating and rich in Vitamin C and Vitamin A.\r\n', 'watermelon, fruit', 'Sale', 'product'),
(22, 5, 2, 9, '2024-06-29 08:45:45', 'Amul Taaza Homogenised Toned Milk 1 L (Tetra Pak)', 'amul-taaza-homogenised-toned-long-life-milk-1-l-tetra-pak', 'Amul_1.jpg', 'Amul_2.jpg', 'Amul_3.jpg', 68, 63, '\r\nMilk is the most common dairy product that is used every day by almost everyone. Consume directly or add to your breakfast cereal, daily tea/coffee, milkshake and smoothies or other baked goods, desserts and puddings. So go ahead and buy Amul Taaza Homogenised Toned Milk online today.\r\n', 'amul, milk, toned milk', 'Fresh', 'product'),
(23, 5, 2, 14, '2022-05-19 20:03:59', 'Britannia Healthy Slice Bread 450 g', 'britannia-healthy-slice-bread-450-g', 'bread_1.jpg', 'bread_2.jpg', 'bread_3.jpg', 35, 32, 'Make delicious sandwiches with Britannia Healthy Slice Bread 450 g. This bread is ideal to dip in milk and eat, or toast it till golden brown with butter on top. Made from the finest ingredients, it is baked to perfection to make it soft and spongy. Go ahead, buy this product online now!', 'bread', 'Sale', 'product'),
(25, 11, 4, 13, '2022-05-19 20:11:14', 'Syska SSK-SRL LED Bulb 9 W', 'syska-led-bulb-ssk-srl-9w-6500k', 'bulb_1.jpg', 'bulb_2.jpg', 'bulb_3.jpg', 359, 79, 'Give your home a luminous touch with SSyska SSK-SRL LED Bulb 9 W. Syska LED bulbs use the new technology of thermal-plastic management that gives the bulbs a longer life with excellent lighting quality. Whether for personal or commercial purposes, make the right bulb choice and. Buy this product online today.', 'syska, led, bulb', 'Sale', 'product'),
(26, 8, 2, 14, '2022-05-20 03:22:10', 'Sprite 1.75 L', 'sprite-1-75-l', 'sprite_1.jpg', 'sprite_2.jpg', 'sprite_3.jpg', 90, 63, 'Delight your guests with Sprite 1.75 L. It is the perfect drink for any weather. Gatherings are incomplete without it. One glass is never enough! So go ahead buy this product online today.', 'sprite, beverages, cold drinks', 'Sale', 'product');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`) VALUES
(5, 'Dairy & Bakery', 'no', 'icons8-ingredients-for-cooking-48.png'),
(6, 'Staples', 'no', 'icons8-flour-48.png'),
(7, 'Snacks', 'no', 'icons8-cookie-48.png'),
(8, 'Beverages', 'no', 'icons8-soda-48.png'),
(9, 'Home & Personal Care', 'no', 'icons8-defend-family-48.png'),
(10, 'Fruits & Vegetables', 'yes', 'icons8-group-of-fruits-48.png'),
(11, 'Electrical Appliances', 'no', 'icons8-light-48.png'),
(12, 'Stationery', 'no', 'icons8-stationery-48.png');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `term_id` int(10) NOT NULL,
  `term_title` varchar(100) NOT NULL,
  `term_link` varchar(100) NOT NULL,
  `term_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`term_id`, `term_title`, `term_link`, `term_desc`) VALUES
(1, 'ELIGIBILITY', 'eligibility', 'Only persons who can enter into legally binding contracts as per Indian Contract Act, 1872, i.e. persons who are 18 years of age or older, are of sound mind, and are not disqualified from entering into contracts by any law, can use and access RequiSite. If you are a minor i.e. under the age of 18 years, you may use RequiSite only with the involvement of a parent or guardian.'),
(2, 'REGISTRATION AND OPERATION OF YOUR ACCOUNT', 'registration-operation', 'You can register by providing relevant information, such as your name, gender, and such other details relevant for creating an account. Your login ID and password will be created basis the information provided by you, which you can use to access your account at any time.\r\n\r\nBy using a third-party account: You may use the login credentials from any third-party accounts maintained by you, as identified by RequiSIte (for example, Google or Facebook). If you use such third party account, you will also be subject to specific terms and conditions applicable to such account, as may be imposed by the relevant third-party.'),
(3, 'PERSONAL INFORMATION PRIVACY', 'privacy', 'During the course of your registration on and usage of RequiSite or availing the Services, We may collect and store and/or you may provide us with, personal identifiable and sensitive information about you, including without limitation your name, phone number, email address, address, postal code, occupation, login details etc.');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(7, 8, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `term_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
