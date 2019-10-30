-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 06:20 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supershop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'arafat', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE IF NOT EXISTS `employee_info` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `pro_pic` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `name`, `phone_no`, `address`, `sex`, `pro_pic`) VALUES
(2, 'MD. Sadekuzzaman Sadi', '01997089998', '38 Sukrabad, Sher-e-Bangla nogor', 'Male', 'sadek.jpg'),
(8, 'Virat Kohli', '01657711189', 'Mohali', 'Male', 'images (1).jpg'),
(9, 'Avro Hasan', '0199887788', 'sukrabad', 'Male', 'pp.png'),
(10, 'Samira Hasan', '01716665252', 'adabor', 'Female', '12805727_10154119307220809_7165983261073220741_n.jpg'),
(11, 'Siddiqur Rahman', '01877900677', 'sukrabad', 'Male', 'james_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employee_post`
--

CREATE TABLE IF NOT EXISTS `employee_post` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `post` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_post`
--

INSERT INTO `employee_post` (`id`, `emp_id`, `post`) VALUES
(2, 2, 'Salseman'),
(8, 8, 'Salseman'),
(9, 9, 'Creative director'),
(10, 10, 'Salsemanager'),
(11, 11, 'IT director');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary`
--

CREATE TABLE IF NOT EXISTS `employee_salary` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_salary`
--

INSERT INTO `employee_salary` (`id`, `emp_id`, `salary`) VALUES
(7, 2, 8000),
(8, 8, 6000),
(9, 9, 8000),
(10, 10, 10000),
(11, 11, 16000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`) VALUES
(7, 'Beef'),
(6, 'Dal'),
(9, 'Edible Oil'),
(8, 'Rice');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_category` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `product_category`) VALUES
(2, 6, 'Grocery'),
(3, 7, 'Food'),
(4, 8, 'Grocery'),
(5, 9, 'Grocery');

-- --------------------------------------------------------

--
-- Table structure for table `product_price`
--

CREATE TABLE IF NOT EXISTS `product_price` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wholesale_price_per_unit` int(11) NOT NULL,
  `retail_price_per_unit` int(11) NOT NULL,
  `total_wprice` int(11) NOT NULL,
  `total_rprice` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_price`
--

INSERT INTO `product_price` (`id`, `product_id`, `wholesale_price_per_unit`, `retail_price_per_unit`, `total_wprice`, `total_rprice`) VALUES
(1, 6, 90, 100, 18000, 20000),
(2, 7, 450, 500, 18000, 20000),
(3, 8, 40, 50, 160000, 200000),
(4, 9, 100, 110, 30000, 33000);

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

CREATE TABLE IF NOT EXISTS `product_quantity` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`id`, `product_id`, `product_quantity`) VALUES
(3, 6, 185),
(4, 7, 30),
(5, 8, 3990),
(6, 9, 300);

-- --------------------------------------------------------

--
-- Table structure for table `product_unit`
--

CREATE TABLE IF NOT EXISTS `product_unit` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_unit` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_unit`
--

INSERT INTO `product_unit` (`id`, `product_name`, `product_unit`) VALUES
(3, 'Dal', 'kg'),
(4, 'Beef', 'kg'),
(5, 'Rice', 'kg'),
(6, 'Edible Oil', 'kg');

-- --------------------------------------------------------

--
-- Table structure for table `salemanager`
--

CREATE TABLE IF NOT EXISTS `salemanager` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salemanager`
--

INSERT INTO `salemanager` (`id`, `emp_id`, `username`, `password`) VALUES
(2, 10, 'Samira', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `p_id`, `quantity`, `price`, `ddate`) VALUES
(4, 7, 6, 3000, '2017-04-11'),
(5, 6, 5, 500, '2017-04-11'),
(6, 8, 10, 500, '2017-04-11'),
(7, 6, 10, 1000, '2017-04-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_no` (`phone_no`);

--
-- Indexes for table `employee_post`
--
ALTER TABLE `employee_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary`
--
ALTER TABLE `employee_salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_price`
--
ALTER TABLE `product_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_unit`
--
ALTER TABLE `product_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salemanager`
--
ALTER TABLE `salemanager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee_post`
--
ALTER TABLE `employee_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `employee_salary`
--
ALTER TABLE `employee_salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_price`
--
ALTER TABLE `product_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `product_unit`
--
ALTER TABLE `product_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `salemanager`
--
ALTER TABLE `salemanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
