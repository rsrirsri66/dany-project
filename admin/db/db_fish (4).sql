-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 03:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fish`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_item_tbl`
--

CREATE TABLE `bill_item_tbl` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_item_tbl`
--

INSERT INTO `bill_item_tbl` (`id`, `bill_id`, `product_id`, `quantity`, `price`, `total`) VALUES
(3, 1, 1, 10, 21.00, 210.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill_tbl`
--

CREATE TABLE `bill_tbl` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_tbl`
--

INSERT INTO `bill_tbl` (`id`, `date`, `customer_id`, `paid_amount`, `total_amount`, `created_at`, `status`) VALUES
(1, '2025-04-24', 1, 0.00, 210.00, '2025-04-24 16:50:53', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`id`, `name`, `mobile`, `address`, `balance`, `status`) VALUES
(1, 'vasanth m', '9894688091', '11/ a5 prumal kovile strret kallikulam', 500.00, 'Active'),
(2, '', '', '', 0.00, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `food_orders`
--

CREATE TABLE `food_orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Unpaid','Paid','Failed') DEFAULT 'Unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `delivery` enum('Pending','Delivered') NOT NULL DEFAULT 'Pending',
  `pickup_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_orders`
--

INSERT INTO `food_orders` (`id`, `order_id`, `total_amount`, `status`, `created_at`, `user_name`, `user_email`, `user_phone`, `date`, `delivery`, `pickup_point`) VALUES
(1, 'ORD-17416223874414', 300.00, 'Unpaid', '2025-03-10 15:59:47', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Delivered', 1),
(2, 'ORD-17416233639016', 300.00, 'Unpaid', '2025-03-10 16:16:03', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(3, 'ORD-17416269122036', 300.00, 'Unpaid', '2025-03-10 17:15:12', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(4, 'ORD-17416269167012', 300.00, 'Unpaid', '2025-03-10 17:15:16', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(5, 'ORD-17416269237661', 300.00, 'Unpaid', '2025-03-10 17:15:23', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(6, 'ORD-17416269717610', 300.00, 'Unpaid', '2025-03-10 17:16:11', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(7, 'ORD-17416270278941', 300.00, 'Unpaid', '2025-03-10 17:17:07', 'vasanth', 'vm70742@gmail.com', '9894688091', '2025-03-10', 'Pending', 2),
(8, 'ORD-17416272794420', 300.00, 'Unpaid', '2025-03-10 17:21:19', 'raja', 'vasanthofficial78@gmail.com', '9894688912', '2025-03-10', 'Pending', 1),
(9, 'ORD-17416272866067', 300.00, 'Unpaid', '2025-03-10 17:21:26', 'raja', 'vasanthofficial78@gmail.com', '9894688912', '2025-03-10', 'Pending', 1),
(10, 'ORD-17416275976669', 300.00, 'Unpaid', '2025-03-10 17:26:37', 'raja', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 2),
(11, 'ORD-17416276315060', 300.00, 'Unpaid', '2025-03-10 17:27:11', 'raja', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 2),
(12, 'ORD-17416279292216', 300.00, 'Unpaid', '2025-03-10 17:32:09', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(13, 'ORD-17416280659188', 300.00, 'Unpaid', '2025-03-10 17:34:25', 'raja', 'vasanth@gmail.com', '9894688912', '2025-03-10', 'Pending', 1),
(14, 'ORD-17416282517533', 300.00, 'Unpaid', '2025-03-10 17:37:31', 'vasanth', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(15, 'ORD-17416283917509', 300.00, 'Unpaid', '2025-03-10 17:39:51', 'SRIRAM', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 2),
(16, 'ORD-17416285163092', 300.00, 'Unpaid', '2025-03-10 17:41:56', 'visva', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(17, 'ORD-17416286514501', 300.00, 'Unpaid', '2025-03-10 17:44:11', 'raja', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(18, 'ORD-17416287358753', 300.00, 'Unpaid', '2025-03-10 17:45:35', 'raja', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(19, 'ORD-17416290775096', 300.00, 'Unpaid', '2025-03-10 17:51:17', 'vasanth', 'vasanth@gmail.com', '9894688091', '2025-03-10', 'Pending', 1),
(20, 'ORD-17416291434129', 300.00, 'Unpaid', '2025-03-10 17:52:23', 'vasanth', 'vasanth@gmail.com', '9894688912', '2025-03-10', 'Pending', 1),
(21, 'ORD-17416748414928', 300.00, 'Unpaid', '2025-03-11 06:34:01', 'vasanth', 'vasanth@gmail.com', '9894688091', '2025-03-11', 'Pending', 2),
(22, 'ORD-17416754381360', 300.00, 'Unpaid', '2025-03-11 06:43:58', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(23, 'ORD-17416754908669', 300.00, 'Unpaid', '2025-03-11 06:44:50', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(24, 'ORD-17416756483437', 300.00, 'Unpaid', '2025-03-11 06:47:28', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(25, 'ORD-17416757658421', 300.00, 'Unpaid', '2025-03-11 06:49:25', 'vasanth', 'vasanth@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(26, 'ORD-17416758282314', 300.00, 'Unpaid', '2025-03-11 06:50:28', 'raja', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(27, 'ORD-17416758569168', 300.00, 'Unpaid', '2025-03-11 06:50:56', 'visva', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(28, 'ORD-17416759383599', 300.00, 'Unpaid', '2025-03-11 06:52:18', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(29, 'ORD-17416763807341', 300.00, 'Unpaid', '2025-03-11 06:59:40', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(30, 'ORD-17416764879145', 300.00, 'Unpaid', '2025-03-11 07:01:27', 'vasanth', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(31, 'ORD-17416767007421', 300.00, 'Unpaid', '2025-03-11 07:05:00', 'visva', 'vasanth@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(32, 'ORD-17416770203508', 300.00, 'Unpaid', '2025-03-11 07:10:20', 'SRIRAM', 'vasanthofficial78@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(33, 'ORD-17416771143848', 300.00, 'Unpaid', '2025-03-11 07:11:54', 'visva', 'vasanth@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(34, 'ORD-17416774646663', 300.00, 'Unpaid', '2025-03-11 07:17:44', 'SRIRAM', 'vasanth@gmail.com', '9894688091', '2025-03-11', 'Pending', 1),
(35, 'ORD-17416775074645', 300.00, 'Unpaid', '2025-03-11 07:18:27', 'raj', 'vasanthofficial78@gmail.com', '9894688912', '2025-03-11', 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_tbl`
--

CREATE TABLE `food_tbl` (
  `id` int(11) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_type` enum('Veg','Non-Veg') NOT NULL DEFAULT 'Veg',
  `category` enum('Vegetables','Fruits') NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_tbl`
--

INSERT INTO `food_tbl` (`id`, `food_name`, `food_type`, `category`, `price`, `food_image`, `created_at`, `status`) VALUES
(1, 'onion', 'Veg', 'Vegetables', 21.00, 'uploads/1745491013_onion1.jpeg', '2025-04-24 16:06:53', 'Active'),
(2, 'potato', 'Veg', 'Vegetables', 25.00, 'uploads/1745491210_potato.jpeg', '2025-04-24 16:10:10', 'Active'),
(3, 'small onion', 'Veg', 'Vegetables', 41.00, 'uploads/1745496138_onion1.jpeg', '2025-04-24 17:32:18', 'Active'),
(4, 'tomato', 'Veg', 'Vegetables', 22.00, 'uploads/1745496212_tomato.jpeg', '2025-04-24 17:33:32', 'Active'),
(5, 'carot', 'Veg', 'Vegetables', 40.00, 'uploads/1745496267_carot.jpeg', '2025-04-24 17:34:27', 'Active'),
(6, 'beetroot', 'Veg', 'Vegetables', 22.00, 'uploads/1745496337_beetroot.jpeg', '2025-04-24 17:35:37', 'Active'),
(7, 'ginger', 'Veg', 'Vegetables', 40.00, 'uploads/1745496400_ginger.jpeg', '2025-04-24 17:36:40', 'Active'),
(8, 'sambar cucumber', 'Veg', 'Vegetables', 15.00, 'uploads/1745496464_cucumber.jpeg', '2025-04-24 17:37:44', 'Active'),
(9, 'beens', 'Veg', 'Vegetables', 20.00, 'uploads/1745496581_beens.jpeg', '2025-04-24 17:39:41', 'Active'),
(10, 'ladies finger', 'Veg', 'Vegetables', 19.00, 'uploads/1745496630_ladies finger.jpeg', '2025-04-24 17:40:30', 'Active'),
(11, 'chili green', 'Veg', 'Vegetables', 25.00, 'uploads/1745496683_chili green.jpeg', '2025-04-24 17:41:23', 'Active'),
(12, 'cupsicum', 'Veg', 'Vegetables', 55.00, 'uploads/1745496729_cupsicum.jpeg', '2025-04-24 17:42:09', 'Active'),
(13, 'cabbage', 'Veg', 'Vegetables', 19.00, 'uploads/1745496778_cabbage.jpeg', '2025-04-24 17:42:58', 'Active'),
(14, 'french beens', 'Veg', 'Vegetables', 57.00, 'uploads/1745496824_french beens.jpeg', '2025-04-24 17:43:44', 'Active'),
(15, 'salad cucumber', 'Veg', 'Vegetables', 25.00, 'uploads/1745496895_salad cucumber.jpeg', '2025-04-24 17:44:55', 'Active'),
(16, 'raw mango', 'Veg', 'Vegetables', 28.00, 'uploads/1745496961_raw mango.jpeg', '2025-04-24 17:46:01', 'Active'),
(17, 'ash gourd', 'Veg', 'Vegetables', 10.00, 'uploads/1745497009_ash gourd.jpeg', '2025-04-24 17:46:49', 'Active'),
(18, 'elephant foot yam', 'Veg', 'Vegetables', 60.00, 'uploads/1745497063_elephant foot yam.jpeg', '2025-04-24 17:47:43', 'Active'),
(19, 'snake gourd', 'Veg', 'Vegetables', 20.00, 'uploads/1745497110_snake gourd.jpeg', '2025-04-24 17:48:30', 'Active'),
(20, 'brinjal vari', 'Veg', 'Vegetables', 35.00, 'uploads/1745497178_brinjal vari.jpeg', '2025-04-24 17:49:38', 'Active'),
(21, 'pumpkin', 'Veg', 'Vegetables', 10.00, 'uploads/1745497255_pumpkin.jpeg', '2025-04-24 17:50:55', 'Active'),
(22, 'kiran ', 'Veg', 'Vegetables', 12.00, 'uploads/1745497333_kiran.jpeg', '2025-04-24 17:52:13', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `username`, `password`, `status`, `created_at`) VALUES
(1, 'admin', 'admin', '123', 'Active', '2025-02-21 11:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_orders`
--
ALTER TABLE `food_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_tbl`
--
ALTER TABLE `food_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `food_orders`
--
ALTER TABLE `food_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `food_tbl`
--
ALTER TABLE `food_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill_item_tbl`
--
ALTER TABLE `bill_item_tbl`
  ADD CONSTRAINT `bill_id` FOREIGN KEY (`bill_id`) REFERENCES `bill_tbl` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `food_tbl` (`id`);

--
-- Constraints for table `bill_tbl`
--
ALTER TABLE `bill_tbl`
  ADD CONSTRAINT `customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer_tbl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
