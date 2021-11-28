-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 11:06 PM
-- Server version: 10.5.8-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badboyskusinadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_product`
--

CREATE TABLE `food_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(525) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_review` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_product`
--

INSERT INTO `food_product` (`product_id`, `category_id`, `product_name`, `product_description`, `product_review`, `product_image`, `product_image2`, `product_image3`, `product_price`, `stocks`) VALUES
(1, 1, 'samgyeopsal', 'pork<br>1/2 (plain)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '220', 10),
(2, 1, 'samgyeopsal', 'pork<br>1/2 (marinated)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '250', 10),
(3, 1, 'samgyeopsal', 'pork<br>1klg (plain)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '400', 10),
(4, 1, 'samgyeopsal', 'pork<br>1klg (marinated)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '450', 10),
(5, 1, 'samgyeopsal', 'beef<br>1/2 (plain)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '235', 10),
(6, 1, 'samgyeopsal', 'beef<br>1/2 (marinated)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '265', 10),
(7, 1, 'samgyeopsal', 'beef<br>1klg (plain)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '420', 10),
(8, 1, 'samgyeopsal', 'beef<br> 1klg (marinated)', '', 'meal4.jpg', 'meal4.jpg', 'meal4.jpg', '460', 10),
(9, 2, 'ramen solo', '', '', 'ramen.jpg', 'ramen.jpg', 'ramen.jpg', '120', 10),
(10, 2, 'ramen sharing', '', '', 'ramen.jpg', 'ramen.jpg', 'ramen.jpg', '199', 10);

-- --------------------------------------------------------

--
-- Table structure for table `food_product_category`
--

CREATE TABLE `food_product_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_product_category`
--

INSERT INTO `food_product_category` (`category_id`, `category`, `availability`, `date_created`) VALUES
(1, 'samgyeopsal', 'available', '2021-10-28 18:46:55'),
(2, 'ramen', 'available', '2021-10-28 17:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified` varchar(255) NOT NULL,
  `user_type` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `password`, `email_verified`, `user_type`) VALUES
(1, 'rafael', 'aquino', 'rafael.aquino.18624@gmail.com', '$2y$10$2pv3YLpeEVS44M8cXTt4ie9eWq8bZk60hsqPHxcsJVc0elRHRo7kC', '', 0),
(2, 'rafael', 'aquino', 'myemail@email.com', '$2y$10$HljYVIXiDaOLno2Jy3DHt.QsUXI6FK6OOHUn3pWV7VtQML0mjzg4.', '', 0),
(3, 'newuser', 'newuser', 'newemail@email.com', '$2y$10$MZQxZ80LR7LjzYNJwpbYSOMENdCIZT1VQJ5gWifRHZUN3sT6GJfW6', '', 0),
(5, 'q', 'A', 'qweqwe@email.com', '$2y$10$.4Tn1kgqFKbD6yoou.B0IuQ6tRn7Kw6.bqQODJQ2uQWpZBRCw3R/G', '', 0),
(6, 'qweqwe', 'qweqwe', 'qweqwe123@email.com', '$2y$10$.R/7E5kDBhusD0XKrA8RsOu4PazoIx3vkCdj996nJx12vJtEKsdru', '', 0),
(7, 'asdasd', 'asdasd', 'asdasd@email.com', '$2y$10$zFwHT0ShH.UECMuOhsxzueCHY7iGDrOyTbIdCO5svVMjEmGpTnLRm', '', 0),
(8, 'rafael', 'aquino', 'rafael.aquino.186241@gmail.com', '$2y$10$b3RbstY5Xu3kR6WqXSc0Ye8HWMLcXUcC11OIWeBlcxRsPF/VmjHJi', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_product`
--
ALTER TABLE `food_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `food_product_category`
--
ALTER TABLE `food_product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_product`
--
ALTER TABLE `food_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `food_product_category`
--
ALTER TABLE `food_product_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
