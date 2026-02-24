-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sports_gear_express`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(200) NOT NULL,
  `a_email` varchar(200) NOT NULL,
  `a_password` varchar(200) NOT NULL,
  `a_profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`, `a_profile`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 'uploads/admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cr_id` int(10) NOT NULL,
  `pd_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `cr_quantity` int(10) NOT NULL,
  `cr_days` int(11) NOT NULL,
  `cr_added_date` date NOT NULL,
  `cr_updated_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cr_id`, `pd_id`, `c_id`, `cr_quantity`, `cr_days`, `cr_added_date`, `cr_updated_date`) VALUES
(3, 2, 1, 2, 0, '2024-10-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ct_id` int(10) NOT NULL,
  `ct_title` varchar(200) NOT NULL,
  `ct_caption` varchar(200) NOT NULL,
  `ct_picture` varchar(200) NOT NULL,
  `ct_added_date` date NOT NULL,
  `ct_updated_date` date NOT NULL,
  `ct_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ct_id`, `ct_title`, `ct_caption`, `ct_picture`, `ct_added_date`, `ct_updated_date`, `ct_status`) VALUES
(1, 'Football (Soccer)', 'Unleash Your Passion on the Field!', 'uploads/categories/football.jpg', '2024-02-09', '2025-03-05', 'Active'),
(2, 'Basketball', 'Shoot, Score, Dominate the Court!', 'uploads/categories/basketball-7121617_1280.jpg', '2024-02-15', '2025-03-05', 'Active'),
(3, 'Fitness & Gym', 'Strength Starts Here – Push Your Limits!', 'uploads/categories/Small-Exercise-Equipment.jpg', '2024-02-15', '2025-03-05', 'Active'),
(4, 'Running & Athletics', 'Run Fast, Run Free!', 'uploads/categories/kxTnBj52Ulf3h0OHr8BK.jpg', '2024-02-16', '2025-03-05', 'Active'),
(5, 'Tennis', 'Smash Your Way to Victory!', 'uploads/categories/61y6aGW+LtL.jpg', '2024-03-09', '2025-03-05', 'Active'),
(7, 'Swimming', 'Dive Into Excellence!', 'uploads/categories/Training_Gear.webp', '2025-03-05', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `c_id` int(10) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_phone` varchar(200) NOT NULL,
  `c_email` varchar(200) NOT NULL,
  `c_address` longtext NOT NULL,
  `c_password` varchar(200) NOT NULL,
  `c_profile` varchar(200) NOT NULL,
  `c_created_date` date NOT NULL,
  `c_updated_date` date NOT NULL,
  `c_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_phone`, `c_email`, `c_address`, `c_password`, `c_profile`, `c_created_date`, `c_updated_date`, `c_status`) VALUES
(1, 'customer', '9876543210', 'customer@gmail.com', 'Padil', '12345', 'uploads/images (2).png', '2024-10-08', '2024-10-10', 'Active'),
(2, 'user', '1231231231', 'user@gmail.com', 'mangalore', '123', 'uploads/birthday.jpeg', '2025-03-05', '2025-03-10', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `dl_id` int(10) NOT NULL,
  `dl_name` varchar(200) NOT NULL,
  `dl_phone` varchar(50) NOT NULL,
  `dl_email` varchar(200) NOT NULL,
  `dl_location` varchar(200) NOT NULL,
  `dl_city` longtext NOT NULL,
  `dl_address` longtext NOT NULL,
  `dl_password` varchar(200) NOT NULL,
  `dl_profile` varchar(200) NOT NULL,
  `dl_created_date` date NOT NULL,
  `dl_updated_date` date NOT NULL,
  `dl_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`dl_id`, `dl_name`, `dl_phone`, `dl_email`, `dl_location`, `dl_city`, `dl_address`, `dl_password`, `dl_profile`, `dl_created_date`, `dl_updated_date`, `dl_status`) VALUES
(3, 'Delivery1', '9876543210', 'delivery1@gmail.com', 'Nanthoor', 'Mangalore', 'Dakshina Kannada', '12345', 'uploads/photo-1535713875002-d1d0cf377fde.avif', '2024-02-29', '2024-02-29', 'Active'),
(4, 'Delivery2', '987654310', 'delivery2@gmail.com', 'Jyothi', 'Mangaluru', 'Light house condominium building, near to bites, opposite of St. Aloysius College Mangalore\r\nLight House hill road bavutagudda', '12345', 'uploads/delivery/portrait-handsome-young-man-close-up-street_1321-25.avif', '2024-02-29', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fb_id` int(10) NOT NULL,
  `fb_date` date NOT NULL,
  `or_key` varchar(200) NOT NULL,
  `c_id` int(10) NOT NULL,
  `fb_customer_name` varchar(200) NOT NULL,
  `fb_customer_email` varchar(200) NOT NULL,
  `fb_message` longtext NOT NULL,
  `fb_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`fb_id`, `fb_date`, `or_key`, `c_id`, `fb_customer_name`, `fb_customer_email`, `fb_message`, `fb_type`) VALUES
(1, '2025-03-17', '67d786752ec7b', 2, '', '', 'helllllllllllllo', 'Feedback');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(10) NOT NULL,
  `or_key` varchar(200) NOT NULL,
  `c_id` int(10) NOT NULL,
  `or_customer_name` varchar(200) NOT NULL,
  `or_customer_phone` varchar(20) NOT NULL,
  `or_customer_email` varchar(200) NOT NULL,
  `or_address` longtext NOT NULL,
  `or_apartment` varchar(200) NOT NULL,
  `or_city` varchar(200) NOT NULL,
  `or_zip` varchar(200) NOT NULL,
  `or_notes` longtext NOT NULL,
  `pd_id` int(10) NOT NULL,
  `or_quantity` varchar(200) NOT NULL,
  `or_days` int(11) NOT NULL,
  `or_amount` varchar(200) NOT NULL,
  `or_created_date` date NOT NULL,
  `or_updated_date` date NOT NULL,
  `dl_id` int(10) NOT NULL,
  `or_status` varchar(200) NOT NULL,
  `or_item_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_key`, `c_id`, `or_customer_name`, `or_customer_phone`, `or_customer_email`, `or_address`, `or_apartment`, `or_city`, `or_zip`, `or_notes`, `pd_id`, `or_quantity`, `or_days`, `or_amount`, `or_created_date`, `or_updated_date`, `dl_id`, `or_status`, `or_item_status`) VALUES
(1, '671b1c366b9d6', 1, 'customer', '09876543210', 'adam@gmail.com', 'Padil', 'Light House hill road bavutagudda', 'Mangalore', '574202', 'note is note', 5, '1', 0, '70', '2024-10-25', '2024-10-25', 3, 'Placed', 'Cancelled'),
(2, '671b1c366b9d6', 1, 'customer', '09876543210', 'adam@gmail.com', 'Padil', 'Light House hill road bavutagudda', 'Mangalore', '574202', 'note is note', 6, '1', 0, '15', '2024-10-25', '2024-10-25', 3, 'Placed', 'Confirmed'),
(3, '67d776f3702cb', 2, 'user', '1231231231', 'user@gmail.com', 'mangalore', '21', 'mangalore', '575001', 'noteddd...', 10, '1', 0, '1200', '2025-03-17', '0000-00-00', 0, 'Placed', 'Confirmed'),
(4, '67d7826d5c428', 2, 'user', '1231231231', 'user@gmail.com', 'mangalore', '22', 'manga', '121121', 'mmm', 10, '4', 0, '40', '2025-03-17', '0000-00-00', 0, 'Placed', 'Confirmed'),
(5, '67d786752ec7b', 2, 'user', '1231231231', 'user@gmail.com', 'mangalore', '2-117/18', 'Mangalore', '575015', 'new', 10, '5', 5, '250', '2025-03-17', '2025-03-17', 0, 'Completed', 'Confirmed'),
(6, '67d78cfd64650', 2, 'user', '1231231231', 'user@gmail.com', 'mangalore', '2-117/18', 'Mangalore', '575015', 'noteddd...99999999', 10, '1', 2, '20', '2025-03-17', '2025-03-17', 0, 'Completed', 'Confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `py_id` int(10) NOT NULL,
  `or_key` varchar(200) NOT NULL,
  `py_date` date NOT NULL,
  `or_id` int(10) NOT NULL,
  `py_method` varchar(200) NOT NULL,
  `py_amount` int(10) NOT NULL,
  `py_transaction_id` varchar(200) NOT NULL,
  `py_updated_date` date NOT NULL,
  `py_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`py_id`, `or_key`, `py_date`, `or_id`, `py_method`, `py_amount`, `py_transaction_id`, `py_updated_date`, `py_status`) VALUES
(1, '671b1c366b9d6', '2024-10-25', 1, 'cash', 70, '', '0000-00-00', 'Pending'),
(2, '671b1c366b9d6', '2024-10-25', 2, 'cash', 15, '', '0000-00-00', 'Pending'),
(3, '67d776f3702cb', '2025-03-17', 3, 'cash', 1200, '', '0000-00-00', 'Pending'),
(4, '67d7826d5c428', '2025-03-17', 4, 'cash', 40, '', '0000-00-00', 'Pending'),
(5, '67d786752ec7b', '2025-03-17', 5, 'cash', 250, '', '2025-03-17', 'Paid'),
(6, '67d78cfd64650', '2025-03-17', 6, 'cash', 20, '', '2025-03-17', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pd_id` int(10) NOT NULL,
  `sc_id` int(10) NOT NULL,
  `pd_title` varchar(200) NOT NULL,
  `pd_caption` longtext NOT NULL,
  `pd_picture` varchar(200) NOT NULL,
  `pd_price` int(10) NOT NULL,
  `pd_quantity` int(10) NOT NULL,
  `pd_unit_of_measure` varchar(200) NOT NULL,
  `pd_added_date` date NOT NULL,
  `pd_updated_date` date NOT NULL,
  `pd_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pd_id`, `sc_id`, `pd_title`, `pd_caption`, `pd_picture`, `pd_price`, `pd_quantity`, `pd_unit_of_measure`, `pd_added_date`, `pd_updated_date`, `pd_status`) VALUES
(10, 3, 'Football', 'football caption', 'uploads/products/download.jpeg', 10, 89, 'Piece', '2025-03-05', '2025-03-17', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sc_id` int(10) NOT NULL,
  `sc_title` varchar(200) NOT NULL,
  `sc_caption` varchar(200) NOT NULL,
  `sc_picture` varchar(200) NOT NULL,
  `ct_id` int(10) NOT NULL,
  `sc_added_date` date NOT NULL DEFAULT current_timestamp(),
  `sc_updated_date` date NOT NULL DEFAULT current_timestamp(),
  `sc_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sc_id`, `sc_title`, `sc_caption`, `sc_picture`, `ct_id`, `sc_added_date`, `sc_updated_date`, `sc_status`) VALUES
(3, 'Football', 'This is Football Caption', 'uploads/sub-categories/football.jpg', 1, '2024-02-16', '2025-03-10', 'Active'),
(4, 'Basketball', 'This is basketball Caption', 'uploads/sub-categories/basketball-7121617_1280.jpg', 1, '2024-02-16', '2025-03-10', 'Active'),
(5, 'Gym', 'This is Gym Caption', 'uploads/sub-categories/Small-Exercise-Equipment.jpg', 1, '2024-02-16', '2025-03-10', 'Active'),
(6, 'Swimming', 'This is Swimming Caption', 'uploads/sub-categories/Training_Gear.webp', 2, '2024-02-16', '2025-03-10', 'Active'),
(7, 'Badminton', 'This is Badminton Caption', 'uploads/sub-categories/61y6aGW+LtL.jpg', 2, '2024-02-16', '2025-03-10', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cr_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ct_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fb_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`py_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pd_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ct_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deliveryman`
--
ALTER TABLE `deliveryman`
  MODIFY `dl_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fb_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `py_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
