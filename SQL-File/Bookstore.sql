-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 12:51 PM
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
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `adminname`, `mypassword`, `created_at`) VALUES
(1, 'admin.first@gmail.com', 'admin.first', '$2y$10$kllzMP7GSGu74D.7VASn1.qRcEO18or/Vdz807s/IoEXWJgKvYIVq', '2025-06-27 23:37:25'),
(2, 'admin-second@gmail.com', 'admin-second', '$2y$10$BvICfXAT91JKEt.4cTUrmO6BdcyHJTO5Q3Z5AtgfrH49vkUMjzt8W', '2025-06-28 11:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(3) NOT NULL,
  `pro_amount` int(3) NOT NULL,
  `pro_file` varchar(200) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `pro_amount`, `pro_file`, `user_id`, `created_at`) VALUES
(29, 6, 'Photoshop Book', 'istockphoto-2169149999-2048x2048.webp', 40, 1, 'National Scholarships Portal 2.0.2.pdf', 1, '2025-06-30 23:30:14'),
(31, 1, 'Node Basics', 'node.png', 20, 1, 'node.pdf', 1, '2025-06-30 23:34:42'),
(32, 2, 'Django Basics', 'django.png', 10, 1, 'django.pdf', 1, '2025-06-30 23:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`) VALUES
(1, 'Programming', 'Monotonectally engage cross functional total linkage with extensible technology. Appropriately maintain turnkey processes without high-payoff collaboration and idea-sharing. Phosfluorescently parallel task ', 'programming.png', '2025-06-27 22:40:51'),
(2, 'Design', 'Monotonectally engage cross functional total linkage with extensible technology. Appropriately maintain turnkey processes without high-payoff collaboration and idea-sharing. Phosfluorescently parallel task ', 'design.jpg', '2025-06-27 22:40:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `user_name`, `email`, `payment_id`, `amount`, `status`, `created_at`, `user_id`) VALUES
(1, 'Vicky', 'Swami', 'vickySwami', 'vicky123@gmail.com', 'pay_QmBg2KjpG868VL', 70, 'captured', '2025-06-27 10:30:29', NULL),
(2, 'Pravesh', 'Swami', 'pravesh123', 'praveshswami123@gmail.com', 'pay_QmBsMazCiXgGa8', 80, 'captured', '2025-06-27 10:40:34', 1),
(4, 'user.first', 'user.first', 'user.first', 'user.first@gamil.com', 'pay_QmC5Q8ptBU6p0w', 190, 'captured', '2025-06-27 10:52:51', 1),
(5, 'user.first', 'first', 'user.first', 'user.first@gamil.com', 'pay_QmCbfA6EyENZaa', 190, 'captured', '2025-06-27 11:23:17', 1),
(7, 'user.first', 'first', 'user.first', 'user.first@gamil.com', 'pay_QmCdiq1fKeYnBt', 190, 'captured', '2025-06-27 11:25:13', 1),
(9, 'Vicky', 'dd', 'user.first', 'user.first@gamil.com', 'pay_QmCzh6z8bYog2t', 40, 'captured', '2025-06-27 11:46:03', 1),
(10, 'Pravesh', 'Vaishanav', 'user.second', 'user.second@gmail.com', 'pay_QnNbVCLLtc9LQH', 70, 'captured', '2025-06-30 10:47:46', 2),
(11, 'Vicky ', 'Swami', 'vickyswami9460', 'vickyswami9460@gmail.com', 'pay_QnOXb35whLqC1R', 70, 'captured', '2025-06-30 11:42:43', 3),
(12, 'Vicky', 'Vaishanv', 'vickyswami9460', 'praveshswami11@gmail.com', 'pay_QnOzKfMtq8n8cz', 120, 'captured', '2025-06-30 12:08:56', 3),
(13, 'Pravesh', 'Vaishanv', 'vickyswami9460', 'vickyswami9460@gmail.com', 'pay_QnPGuisZpCNw4k', 20, 'captured', '2025-06-30 12:25:35', 3),
(14, 'user.first', 'dd', 'vickyswami9460', 'praveshswami11@gmail.com', 'pay_QnPMhDtiYdWB84', 10, 'captured', '2025-06-30 12:31:05', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(3) NOT NULL,
  `file` text NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `category_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `file`, `description`, `status`, `category_id`, `created_at`) VALUES
(1, 'Node Basics', 'node.png', 20, 'node.pdf', 'voluptatibus dolore incidunt. Sunt natus hic neque ex nisi consequatur temporibus, nihil animi alias adipisci ipsa molestiae, impedit iste voluptate nesciunt magnam sequi maiores obcaecati magni ducimus ipsum? Sunt itaque ipsa quidem dolore libero quisquam enim!', 1, 1, '2025-06-18 11:58:19'),
(2, 'Django Basics', 'django.png', 10, 'django.pdf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eaque, facilis recusandae! Quas accusamus adipisci libero id deleniti. Similique alias officiis distinctio dicta odio, dolorum labore sapiente facere facilis odit est!', 1, 1, '2025-06-18 11:58:19'),
(4, 'web ddesign basics', 'image.png', 20, 'file.pdf', 'Monotonectally engage cross functional total linkage with extensible technology. Appropriately maintain turnkey processes without high-payoff collaboration and idea-sharing. Phosfluorescently parallel task ', 1, 2, '2025-06-27 22:58:30'),
(6, 'Photoshop Book', 'istockphoto-2169149999-2048x2048.webp', 40, 'National Scholarships Portal 2.0.2.pdf', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam voluptatibus pariatur sed voluptate esse soluta suscipit officiis consequatur neque non? Nam excepturi maiores maxime commodi in veniam nesciunt earum iusto.', 1, 1, '2025-06-29 10:34:11');

-- --------------------------------------------------------

--
-- Table structure for table `uers`
--

CREATE TABLE `uers` (
  `id` int(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uers`
--

INSERT INTO `uers` (`id`, `username`, `email`, `mypassword`, `created_at`) VALUES
(1, 'user.first', 'user.first@gamil.com', '$2y$10$kllzMP7GSGu74D.7VASn1.qRcEO18or/Vdz807s/IoEXWJgKvYIVq', '2025-06-15 17:32:49'),
(2, 'user.second', 'user.second@gamil.com', '$2y$10$mMRl22O1NQvGUAOJ1SXkrOMAq.cNPaXetPSNjxiky.2oroNTmbL7W', '2025-06-15 17:33:27'),
(3, 'vickyswami9460', 'vickyswami9460@gmail.com', '$2y$10$pSnL8XtLj2XrWB2M8xIb5uzX/.t8MDUMjvQ2wGwjZEXx3agAM9.f6', '2025-06-30 11:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `pro_id`, `pro_name`, `pro_image`, `pro_price`, `user_id`, `created_at`) VALUES
(12, 1, 'Node Basics', 'node.png', 20, 1, '2025-06-30 23:29:58'),
(13, 2, 'Django Basics', 'django.png', 10, 1, '2025-06-30 23:30:06'),
(14, 6, 'Photoshop Book', 'istockphoto-2169149999-2048x2048.webp', 40, 1, '2025-06-30 23:30:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uers`
--
ALTER TABLE `uers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `uers`
--
ALTER TABLE `uers`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
