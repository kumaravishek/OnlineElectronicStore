-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 02:49 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'adminpanel@gmail.com', 'adminpanel'),
(2, 'adminpanel1@gamil.com', 'adminpanel1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptop'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'iPhones');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `customer_address`) VALUES
(14, '::1', 'Avishek Kumar', 'aviak.avishek@gmail.com', 'Aab@Tak56', 'India', 'Patna', '8076809428', 'Hoodies1.jpg', 'Malpur, patna, Bihar-803301');

-- --------------------------------------------------------

--
-- Table structure for table `ordertransaction`
--

CREATE TABLE `ordertransaction` (
  `txn_no` int(100) NOT NULL,
  `txn_status` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `txn_customer` varchar(255) NOT NULL,
  `txn_email` varchar(255) NOT NULL,
  `txn_product` varchar(255) NOT NULL,
  `txn_amount` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertransaction`
--

INSERT INTO `ordertransaction` (`txn_no`, `txn_status`, `txn_id`, `txn_customer`, `txn_email`, `txn_product`, `txn_amount`) VALUES
(9, 'in progress', '16a9836cca0bf9a68d26', 'Avishek Kumar', 'aviak.avishek@gmail.com', '11', 109241),
(8, 'in progress', 'e5572e65aa3b18c1cb91', 'Avishek Kumar', 'aviak.avishek@gmail.com', '11', 109241),
(7, 'in progress', 'c8ab0df827b295c82a03', 'Avishek Kumar', 'aviak.avishek@gmail.com', '11', 109241),
(6, 'in progress', 'a2e1dc5893867a3ba5d8', 'Avishek Kumar', 'aviak.avishek@gmail.com', '5', 42467),
(10, 'failure', '815e13caeb5cfd963dc9', 'Avishek Kumar', 'aviak.avishek@gmail.com', '4', 77900),
(11, 'failure', 'fdccd40602412fcc48fd', 'Avishek Kumar', 'aviak.avishek@gmail.com', '4', 77900),
(12, 'in progress', 'd1dd42a089dc759d6ed9', 'Avishek Kumar', 'aviak.avishek@gmail.com', '4', 77900),
(13, 'in progress', '7d1c1a92adc5891487ae', 'Avishek Kumar', 'aviak.avishek@gmail.com', '7', 226000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 3, 4, 'Samsung On8', 14900, '<p><strong>3 GB RAM/16 GB ROM/Expandable Upto 128 GB</strong></p>\r\n<p><strong>55 inch full HD dispay</strong></p>\r\n<p><strong>13 MP Primary Camera/5 MP Front</strong></p>\r\n<p><strong>3300 mAH Li-Ion Battery</strong></p>\r\n<p><strong>Exynos 7580 Processor</strong></p>', 'samsung-galaxy-on8.jpeg', 'Samsung, On8, Mobiles, 3GB RAM, 16 GB ROM, 13 MP '),
(3, 3, 5, 'Sony Xperia Z5', 36000, '<p><strong>3 GB RAM/32 GB ROM/ Expandable Upto 200 GB</strong></p>\r\n<p><strong>5.5 inch display UHD 4K</strong></p>\r\n<p><strong>23 MP Primary Camera/5 MP Front</strong></p>\r\n<p><strong>3430 mAH Battery</strong></p>\r\n<p><strong>NSM89994 Qualcomn Snapdragon 810 Processor</strong></p>', 'sony-xperia-z5-premium.jpeg', 'Sony, Z5, New, Mobiles'),
(4, 5, 6, 'iPhone 7 Plus', 77900, '<p><strong>128 GB ROM</strong></p>\r\n<p><strong>5.5 inch Retina HD Display</strong></p>\r\n<p><strong>12 MP+ 12 MP Dual Rear Camera/7MP Front</strong></p>\r\n<p><strong>Li-Ion Battery</strong></p>\r\n<p><strong>AIO Fusion Chip with 64-bit Architecture and Embedded MIO Motion Co-Processor processor</strong></p>', 'apple-iphone-7-plus.jpeg', 'Apple, iphone, new, mobiles'),
(5, 1, 1, 'HP Laptop', 42467, '<p><strong>Intel Core i5 Processor (6th Gen)</strong></p>\r\n<p><strong>4 GB DDR4 RAM</strong></p>\r\n<p><strong>DOS operating System</strong></p>\r\n<p><strong>500 GB HDD</strong></p>\r\n<p><strong>14 inch display</strong></p>\r\n<p><strong>1 year onsite warranty</strong></p>', 'hp-notebook-original.jpeg', 'HP, Laptops, Notebook, New'),
(6, 1, 2, 'Dell Laptop', 69000, '<p><strong>Intel Core i7 Processor(5th Gen)</strong></p>\r\n<p><strong>8 GB DDR3 RAM</strong></p>\r\n<p><strong>64-bit Linux/ Ubuntu Operating System</strong></p>\r\n<p><strong>1 TB HDD</strong></p>\r\n<p><strong>15.6 Inch Display</strong></p>\r\n<p><strong>3 Years Comple Cover(ADP+NBO)</strong></p>', 'dell 5000.jpeg', 'Dell 5000,new, laptops'),
(7, 1, 6, 'Apple Laptop', 226000, '<p><strong>Intel coe i7 Processor</strong></p>\r\n<p><strong>16 GB DDR3 RAM</strong></p>\r\n<p><strong>64-bit Mac Operating System</strong></p>\r\n<p><strong>512 GB SDD</strong></p>\r\n<p><strong>15 inch display</strong></p>\r\n<p><strong>1 Year Warranty</strong></p>', 'applelaptop.jpeg', 'Apple, Macbook, i7, laptops'),
(8, 4, 1, 'HP PC', 27990, '<p><strong>Windows 10 Home</strong></p>\r\n<p><strong>Intel Pentium Quad Core</strong></p>\r\n<p><strong>HDD Capacity 500 GB</strong></p>\r\n<p><strong>RAM 4 GB DDR3</strong></p>\r\n<p><strong>19.5 inch display</strong></p>', 'hpcomputers.jpeg', 'HP, Desktop, Computers,New'),
(9, 4, 2, 'Dell PC', 38699, '<p><strong>Ubuntu</strong></p>\r\n<p><strong>Intel Core i3 Processor</strong></p>\r\n<p><strong>HDD capacity 500 GB</strong></p>\r\n<p><strong>4 GB DDR3 RAM</strong></p>\r\n<p><strong>19.5 inch display</strong></p>', 'dell-3030.jpeg', 'Dell, PC, Desktop'),
(10, 4, 6, 'Apple PC', 116998, '<p><strong>Mac OS X Mavericks</strong></p>\r\n<p><strong>Intel Core i5</strong></p>\r\n<p><strong>HDD capacity 1 TB</strong></p>\r\n<p><strong>RAM 8 GB DDR3</strong></p>\r\n<p><strong>21.5 inch display</strong></p>', 'apple-imac.jpeg', 'Apple, Desktop'),
(11, 2, 5, 'Sony camera', 109241, '<p><strong>Effective Pixels: 24.7</strong></p>\r\n<p>ILCA- 77M2Q Mirrorless Camera Body + 16-50 mm Zoom Lens (Black)</p>\r\n<p><strong>Sensor Type: CMOS</strong></p>\r\n<p><strong>XAVCS, AVCHD Forma Version 2.0 Compliant, MP4</strong></p>\r\n<p>&nbsp;</p>', 'sonycamera.jpeg', 'Sony, Camera, new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

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
-- Indexes for table `ordertransaction`
--
ALTER TABLE `ordertransaction`
  ADD PRIMARY KEY (`txn_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ordertransaction`
--
ALTER TABLE `ordertransaction`
  MODIFY `txn_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
