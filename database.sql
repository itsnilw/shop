-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 07:24 PM
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
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `phoneNumber` text NOT NULL,
  `address` text NOT NULL,
  `userName` text NOT NULL,
  `qty` int(11) NOT NULL,
  `pro_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`phoneNumber`, `address`, `userName`, `qty`, `pro_code`) VALUES
('2324234', 'sfadfasdf', 'zahra', 1, 123);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_code` int(11) NOT NULL,
  `pro_name` varchar(200) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_image` varchar(80) NOT NULL,
  `pro_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`) VALUES
(123, 'asdsdfsdf', 1, 100, 'Screenshot 2024-01-20 123351.png', '      sdfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `realname` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `password`, `email`, `type`) VALUES
('saraniiii', 'haniiii', '123', 'hanisssarani@gmail.comaa', 0),
('نیاوفر', 'nilofar90', '123', 'zahra@gmail.com', 0),
('haniyeh', 'saranii', '123456789', 'hanisssarani@gmail.com', 1),
('haniyeh', 'saraninezhad', '123456', 'hanisarani@gmail.com', 0),
('haniyeh1', 'saraninezhad1', '1234', 'hanisarani@gmail.coms', 0),
('hani2', 'saraninezhad2', '123458', 'hanisarani@gmail.comsss', 0),
('melina', 'shabani', '528', 'haasnisssarani@gmail.com', 0),
('zeynab', 'sjdcn', '84', 'zaashra@gmail.com', 0),
('gkukg', 'yfjtyjy', '74', 'ghjgkki@gmail.com', 0),
('zahra', 'zahra80', '123', 'zahra@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
