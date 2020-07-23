-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jul 21, 2020 at 01:27 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration`
--

CREATE TABLE `customer_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `food_preference` varchar(10) NOT NULL,
  `user_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_registration`
--

INSERT INTO `customer_registration` (`id`, `name`, `city`, `address`, `contact_no`, `email`, `password`, `food_preference`, `user_type`) VALUES
(11, 'shivaniRAwat', 'agra', '700', 9089808678, 'rtnikita256@gmail.com', '000', 'NonVeg', 'customer'),
(12, 'shivani MIshra', 'pune', 'indrapuram', 9871530768, 'shivani456@droom.in', '5555', 'NonVeg', 'customer'),
(13, 'swati', 'goa', 'panji', 9871530760, 'swati@droom.in', '1234', 'Veg', 'customer'),
(14, 'seema', 'Shipra Sun City', 'Sai Mandir', 8809776319, 'seema@gmail.com', '4567', 'Veg', 'customer'),
(17, 'shubham sharma', 'Pune', '6th floor', 8809776310, 'shubham.sharma@gmail.com', 'shivani', 'Veg', 'customer'),
(18, 'sumit rawat', 'ghaziabad', '607 c nyay khand 1st indirapuram ghaziabad', 9871684410, 'sr881996@gmail.com', 'rawat@2196', 'Veg', 'customer'),
(32, 'Shivani Rawat', 'ghaziabad', '607 c nyay khand 1st indirapuram ghaziabad', 8809776319, 'rawatsumit779@yahoo.com', '4343', '', 'customer'),
(33, 'nehal thapa', 'gugaon', '5th floor', 8809776310, 'neha@gmail.com', '1234', 'Veg', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `food_prefer` varchar(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `image` varchar(400) NOT NULL,
  `price` int(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `food_prefer`, `item_name`, `image`, `price`, `description`, `restaurant_name`) VALUES
(21, 'Veg', 'pizza', 'download.jpg', 88, 'pizza istaty!!', 'restaurant'),
(33, 'Veg', 'parantha', 'qbvqvxaabmc9qgwynkio.jpg', 40, 'fgjtyjt', 'cookies '),
(34, 'NonVeg', 'kfc chicken', 'download2.jpg', 343, 'spicy but tasty', 'cookies '),
(35, 'NonVeg', 'KFC Burger', 'download (3).jpg', 99, 'The Kentucky Burger comes with an original recipe chicken fillet, coleslaw, crispy onions, two slices of cheese, bacon and smoky BBQ sauce. The Zinger Stacker ups the ante with two Zinger fillets, two', 'cookies '),
(36, 'Veg', 'sambhar', 'download (5).jpg', 50, 'trhth', 'cookies '),
(37, 'Veg', 'aaloo paranthe', 'download (3).jpg', 20, 'indian food!!', 'shubham da dhaba'),
(38, 'Veg', 'pasta', 'download (5).jpg', 80, 'red souce ', 'SR services'),
(39, 'Veg', 'pyaz paranthe', 'download (3).jpg', 30, 'indiain food ', 'shubham da dhaba'),
(40, 'Veg', 'idli vdaa', '1.jpg', 58, 'idli southindian dish', 'shopify'),
(41, 'NonVeg', 'kabab', 'download2.jpg', 50, 'non vegetarian preference', 'shubham da dhaba'),
(52, 'Veg', 'pranthe(panner)', 'download.jpg', 88, 'paneer !!', 'nehal thapa');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `food_item` varchar(50) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `total_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `customer_name`, `food_item`, `restaurant_name`, `total_amount`) VALUES
(1, 'shivani MIshra', 'pizza', 'restaurant', 88),
(2, 'shivani MIshra', 'pizza', 'restaurant', 88),
(3, 'shivani MIshra', 'pizza', 'restaurant', 88),
(4, 'shivani MIshra', 'parantha', 'cookies ', 40),
(5, 'shivani MIshra', 'pizza', 'restaurant', 88),
(6, 'seema', 'sambhar', 'cookies ', 50),
(7, 'shubham sharma', 'pizza', 'restaurant', 88),
(8, 'sumit rawat', 'pasta', 'SR services', 80),
(9, 'shubham sharma', 'pasta', 'SR services', 80),
(10, 'shubham sharma', 'pyaz paranthe', 'shubham da dhaba', 30),
(11, 'shivani MIshra', 'kfc chicken', 'cookies ', 343),
(12, 'nehal thapa', 'pizza', 'restaurant', 88),
(13, 'nehal thapa', 'sambhar', 'cookies ', 50),
(14, 'nehal thapa', 'pranthe(panner)', 'nehal thapa', 88);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_registration`
--

CREATE TABLE `restaurant_registration` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `seats_available` int(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant_registration`
--

INSERT INTO `restaurant_registration` (`id`, `restaurant_name`, `city`, `address`, `contact_no`, `owner_name`, `email`, `password`, `seats_available`, `user_type`) VALUES
(5, 'vaani\'s  resorts', 'india', 'kanpur', 8989786767, 'vaani243', 'rawat567@droom.in', '234', 2, 'restaurant'),
(6, 'cookies ', 'gurgaon', '607 c nyay khand 1st indirapuram ghaziabad', 8809776300, 'internshala', 'abc@internshala.com', '4545', 4, 'restaurant'),
(7, 'shopify', 'Shipra Sun City', 'Sai Mandir', 8809776319, 'vaani rawat', 'vani234@droom.in', '234', 2, 'restaurant'),
(8, 'shubham da dhaba', 'Pune', '6th floor', 8809776300, 'shubham sharma', 'shubham.sharma@gmail.com', 'shivani', 4, 'restaurant'),
(9, 'SR services', 'ghaziabad', '607 c nyay khand 1st indirapuram ghaziabad', 9871684410, 'sumit rawat', 'sr881996@gmail.com', 'rawat@2196', 15, 'restaurant'),
(10, 'nehal thapa', 'gurgaon', '77-B', 9898989890, 'neha', 'neha@gmail.com', '1234', 6, 'restaurant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_registration`
--
ALTER TABLE `customer_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `item_name` (`item_name`,`restaurant_name`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_registration`
--
ALTER TABLE `restaurant_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurant_name` (`restaurant_name`,`address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_registration`
--
ALTER TABLE `customer_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `restaurant_registration`
--
ALTER TABLE `restaurant_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
