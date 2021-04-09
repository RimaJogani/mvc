-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 06:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applicationcybercome`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(20) NOT NULL,
  `adminName` varchar(20) NOT NULL,
  `adminPassword` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminPassword`, `status`, `createDate`) VALUES
(8, 'Riddhi Patel', 'R#123', 1, '2021-03-11 07:20:05.000000'),
(9, 'Umang Jogani', 'Rima#123', 1, '2021-03-12 06:32:41.000000');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(20) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(13, 'product', 'color', 'color', 'select', 'varchar(20)', 1, ''),
(14, 'product', 'size', 'size', 'select', 'varchar(20)', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(30, 'Yellow', 13, 1),
(31, 'Red', 13, 2),
(32, 'Black', 13, 2),
(35, '', 13, 0),
(37, 'S', 14, 1),
(38, 'M', 14, 3),
(39, 'L', 14, 5),
(40, 's', 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(25) DEFAULT NULL,
  `brandImage` varchar(25) NOT NULL,
  `sortOrder` int(4) DEFAULT NULL,
  `status` tinyint(2) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`, `brandImage`, `sortOrder`, `status`, `createDate`) VALUES
(13, 'p1', '5010-patra.jpg', 1, 0, '2021-03-23 12:41:58.000000'),
(14, 'p2', '4103-dhokla.jpg', 2, 0, '2021-03-23 12:42:18.000000'),
(15, 'p3', '7492-dal_dhokli.jpg', 3, 1, '2021-04-01 06:44:01.000000'),
(16, NULL, '7568-kanda_bhaji.jpg', 0, 0, '2021-04-06 14:26:54.000000');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `sessionId` varchar(50) NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `discount` decimal(3,0) NOT NULL,
  `paymentId` int(15) NOT NULL,
  `shippingId` int(15) NOT NULL,
  `shippingAmount` decimal(15,0) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customerId`, `sessionId`, `total`, `discount`, `paymentId`, `shippingId`, `shippingAmount`, `createDate`) VALUES
(4, 43, '', '0', '0', 0, 0, '0', '2021-04-03 07:46:50.000000'),
(5, 45, '', '0', '0', 2, 2, '100', '2021-04-03 07:47:00.000000'),
(6, 46, '', '0', '0', 0, 0, '0', '2021-04-03 07:47:14.000000'),
(8, 0, '', '0', '0', 0, 0, '0', '2021-04-03 12:21:55.000000'),
(10, 47, '', '550', '0', 0, 2, '100', '2021-04-06 18:07:44.000000'),
(21, 38, '', '0', '0', 0, 0, '0', '2021-04-07 15:14:44.000000'),
(22, 37, '', '0', '0', 0, 0, '0', '2021-04-07 15:17:11.000000');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(20, 5, 0, 'shipping', 'Nikol', 'Surat', 'Gujrat', 'India', 382360),
(21, 10, 0, 'shipping', 'B', 'Ahmedabad', 'Gujrat', 'India', 100);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `basePrice` decimal(15,0) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `discount` decimal(8,0) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartItemId`, `cartId`, `productId`, `quantity`, `basePrice`, `price`, `discount`, `createDate`) VALUES
(4, 4, 96, 5, '400', '100', '20', '2021-04-03 07:46:52.000000'),
(5, 5, 89, 5, '450', '100', '10', '2021-04-03 07:47:03.000000'),
(25, 8, 97, 1, '90', '100', '10', '2021-04-06 07:35:36.000000'),
(27, 5, 97, 3, '90', '100', '10', '2021-04-06 15:31:03.000000'),
(29, 10, 89, 5, '450', '100', '10', '2021-04-06 18:08:40.000000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `pathId` varchar(20) DEFAULT NULL,
  `categoryName` varchar(20) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `pathId`, `categoryName`, `description`, `status`) VALUES
(1, 0, '1', 'BadRoom', 'null', 1),
(2, 0, '2', 'livingroom', 'null', 0),
(5, 1, '1=5', 'Dressers', 'null', 1),
(8, 5, '1=5=8', 'footer', 'null', 0),
(9, 1, '1=9', 'header23', 'null', 1),
(10, 1, '1=10', 'header', 'null', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categorymedia`
--

CREATE TABLE `categorymedia` (
  `categoryMediaId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `imageName` varchar(24) NOT NULL,
  `label` varchar(24) NOT NULL,
  `icon` int(2) NOT NULL,
  `base` int(2) NOT NULL,
  `banner` int(2) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorymedia`
--

INSERT INTO `categorymedia` (`categoryMediaId`, `categoryId`, `imageName`, `label`, `icon`, `base`, `banner`, `status`) VALUES
(4, 2, '4383-methi_paratha.jpg', 'p', 0, 1, 1, 1),
(5, 2, '5984-dhokla.jpg', '1', 1, 0, 1, 0),
(7, 1, '3212-dhokla.jpg', '1', 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `identifier` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createDate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createDate`) VALUES
(7, 'hello', 0, '<p><em><strong>ZXzc</strong></em></p>', 0, '2021-03-11 08:07:44'),
(8, 'hello', 222, '<p><strong>SXs</strong></p>', 1, '2021-03-11 08:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `createDate`) VALUES
(7, 2, 'raj', 'desx', 'qwe', '2021-04-08 14:50:19.000000'),
(8, 2, 'rea', 'scfds', 'qwe', '2021-04-08 14:50:19.000000'),
(9, 2, 'rima', 'rima', 'qwe', '2021-04-08 14:50:19.000000');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `createDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `createDate`) VALUES
(1, 'abc', '2021-04-14 00:00:00'),
(2, 'acb', '2021-04-05 10:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(20) NOT NULL,
  `customerGroupId` int(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactNo` int(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `customerGroupId`, `firstName`, `lastName`, `email`, `password`, `contactNo`, `status`, `createDate`, `updateDate`) VALUES
(37, 8, 'Rima', 'Jogani', 'rimapate199808@gmail.com', '7a655465b061a2c22f9a', 1234567992, 1, '2021-03-10 09:05:11.000000', '2021-03-12 06:14:35.000000'),
(38, 8, 'Umang', 'Jogani', 'umang@gmail.com', '44ff3f40797050899022', 1234567992, 1, '2021-03-10 14:26:17.000000', '2021-03-10 14:52:39.000000'),
(42, 5, 'Riddhi', 'Patel', 'rima@gmail.com', '56fdeb6be9f15e796710', 1234567992, 0, '2021-04-01 06:56:08.000000', NULL),
(43, 5, 'Naeem', 'Patel', 'n@gmail.com', '74985640db3a171b014a', 1234567992, 0, '2021-04-01 09:08:42.000000', NULL),
(45, 5, 'Payal', 'Kutana', 'rima@gmail.com', 'd9e887255aa94c4e0017', 1234567992, 0, '2021-04-01 15:52:25.000000', NULL),
(47, 5, 'Raj', 'Patel', 'rima@gmail.com', 'e9fe129479c4e2122243', 1234567992, 0, '2021-04-03 12:03:04.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `addressId` int(20) NOT NULL,
  `customerId` int(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country` varchar(20) NOT NULL,
  `addressType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`) VALUES
(32, 37, 'Nikol', 'Ahmedabad', 'Gujrat', 200, 'India', 'billing'),
(34, 38, 'Nikol', 'Ahmedabad', 'Gujrat', 50, 'India', 'billing'),
(35, 38, 'Nikol', 'Ahmedabad', 'Gujrat', 100, 'India', 'shipping'),
(48, 45, 'Nikol', 'Surat', 'Gujrat', 382360, 'India', 'billing'),
(64, 43, 'Nikol', 'Surat', 'Gujrat', 500, 'India', 'billing'),
(77, 43, 'Bapunagar', 'Ahmedabad', 'Gujrat', 800, 'India', 'shipping'),
(84, 37, 'Nikol', 'Ahmedabad', 'Gujrat', 100, 'India', 'shipping'),
(89, 42, 'Nikol', 'Ahmedabad', 'Gujrat', 100, 'India', 'billing'),
(90, 42, 'Nikol', 'Ahmedabad', 'Gujrat', 100, 'India', 'shipping'),
(93, 45, 'B', 'Ahmedabad', 'Gujrat', 382350, 'India', 'shipping'),
(95, 47, 'B', 'Ahmedabad', 'Gujrat', 382350, 'India', 'shipping'),
(96, 47, 'B', 'Ahmedabad', 'Gujrat', 100, 'India', 'billing');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `customerGroupId` int(20) NOT NULL,
  `customerGroupName` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`customerGroupId`, `customerGroupName`, `status`, `createDate`) VALUES
(5, 'Retailer', 1, '2021-03-12 06:32:08.000000'),
(8, 'Wholesaler', 0, '2021-03-12 06:21:08.000000'),
(13, 'group2', 1, '2021-03-22 07:08:33.000000'),
(14, 'gp3', 0, '2021-04-01 06:10:34.000000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentId` int(20) NOT NULL,
  `paymentName` varchar(50) NOT NULL,
  `paymentCode` varchar(50) NOT NULL,
  `paymentAmount` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `paymentName`, `paymentCode`, `paymentAmount`, `description`, `status`, `createDate`) VALUES
(1, 'Credit Card', 'abc', 100, 'null', 1, '2021-04-02 16:03:45.000000'),
(2, 'Debit Card', 'abc', 1000, 'null', 1, '2021-04-02 16:04:14.000000'),
(3, 'PayPal', 'abc', 1000, 'null', 1, '2021-04-02 16:04:37.000000'),
(4, 'Cash On Delivery', 'abc', 1000, 'null', 1, '2021-04-02 16:05:03.000000');

-- --------------------------------------------------------

--
-- Table structure for table `placeorder`
--

CREATE TABLE `placeorder` (
  `orderId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(15,0) NOT NULL,
  `discount` decimal(3,0) NOT NULL,
  `paymentId` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `shippingAmount` decimal(15,0) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeorder`
--

INSERT INTO `placeorder` (`orderId`, `customerId`, `total`, `discount`, `paymentId`, `shippingId`, `shippingAmount`, `createDate`) VALUES
(1, 42, '1980', '0', 2, 2, '100', '2021-04-07 17:13:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `placeorder_address`
--

CREATE TABLE `placeorder_address` (
  `orderAddressId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `zipcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeorder_address`
--

INSERT INTO `placeorder_address` (`orderAddressId`, `orderId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(1, 1, 90, 'shipping', 'Nikol', 'Ahmedabad', 'Gujrat', 'India', 100);

-- --------------------------------------------------------

--
-- Table structure for table `placeorder_item`
--

CREATE TABLE `placeorder_item` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(4) NOT NULL,
  `basePrice` decimal(5,0) NOT NULL,
  `price` decimal(5,0) NOT NULL,
  `discount` decimal(2,0) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placeorder_item`
--

INSERT INTO `placeorder_item` (`orderItemId`, `orderId`, `productId`, `quantity`, `basePrice`, `price`, `discount`, `createDate`) VALUES
(1, 1, 89, 5, '450', '100', '10', '2021-04-07 17:13:07.000000'),
(2, 1, 97, 7, '630', '100', '10', '2021-04-07 17:13:07.000000'),
(3, 1, 96, 10, '800', '100', '20', '2021-04-07 17:13:07.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(20) NOT NULL,
  `brandId` int(11) NOT NULL,
  `SKU` int(12) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `productDiscount` int(20) NOT NULL,
  `productQty` int(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `createDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `brandId`, `SKU`, `productName`, `productPrice`, `productDiscount`, `productQty`, `description`, `status`, `createDate`, `updateDate`, `color`, `size`) VALUES
(87, 13, 2147483647, 'TV', 10000, 10, 1, 'null', 1, '2021-03-30 09:13:43.000000', NULL, NULL, NULL),
(88, 13, 2147483647, 'Laptop', 100, 10, 2, 'null', 1, '2021-03-30 11:35:44.000000', NULL, NULL, NULL),
(89, 13, 2147483647, 'Mask', 100, 10, 1, 'null', 0, '2021-03-31 07:01:21.000000', NULL, NULL, NULL),
(96, 14, 2147483647, 'BadRoom', 100, 20, 3, 'null', 1, '2021-04-01 06:04:17.000000', '2021-04-01 10:45:26.000000', NULL, NULL),
(97, 14, 2147483647, 'TV', 100, 10, 78, 'null', 1, '2021-04-01 06:10:06.000000', '2021-04-01 10:45:18.000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `productMediaId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `imageName` varchar(50) NOT NULL,
  `imageLabel` varchar(50) DEFAULT NULL,
  `small` tinyint(4) NOT NULL,
  `thumb` tinyint(4) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `gallery` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 83, 5, '900'),
(2, 83, 8, '850'),
(3, 61, 5, '90'),
(4, 61, 8, '100'),
(9, 83, 9, '800'),
(10, 83, 10, '700'),
(11, 83, 11, '800'),
(12, 61, 13, '80'),
(13, 97, 5, '100'),
(14, 97, 8, '200'),
(15, 97, 13, '0'),
(16, 97, 14, '0');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(50) NOT NULL,
  `shippingName` varchar(50) NOT NULL,
  `shippingCode` varchar(50) NOT NULL,
  `shippingAmount` int(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shippingId`, `shippingName`, `shippingCode`, `shippingAmount`, `description`, `status`, `createDate`) VALUES
(1, 'Express - 1 day', 'abc', 200, 'null', 1, '2021-04-02 16:05:58.000000'),
(2, 'Platinium - 3 days', 'abc', 100, 'null', 1, '2021-04-02 16:06:58.000000'),
(3, 'Free Delivery - 7 days', 'abc', 0, 'null', 1, '2021-04-02 16:07:40.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`),
  ADD KEY `cartId` (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `categorymedia`
--
ALTER TABLE `categorymedia`
  ADD PRIMARY KEY (`categoryMediaId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `customerGroupId` (`customerGroupId`);

--
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `customeraddress_ibfk_1` (`customerId`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`customerGroupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `placeorder`
--
ALTER TABLE `placeorder`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `placeorder_address`
--
ALTER TABLE `placeorder_address`
  ADD PRIMARY KEY (`orderAddressId`);

--
-- Indexes for table `placeorder_item`
--
ALTER TABLE `placeorder_item`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`productMediaId`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categorymedia`
--
ALTER TABLE `categorymedia`
  MODIFY `categoryMediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `addressId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `customerGroupId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `placeorder`
--
ALTER TABLE `placeorder`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `placeorder_address`
--
ALTER TABLE `placeorder_address`
  MODIFY `orderAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `placeorder_item`
--
ALTER TABLE `placeorder_item`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `productMediaId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD CONSTRAINT `cart_address_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categorymedia`
--
ALTER TABLE `categorymedia`
  ADD CONSTRAINT `categorymedia_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`customerGroupId`) REFERENCES `customergroup` (`customerGroupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD CONSTRAINT `customeraddress_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`customerId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD CONSTRAINT `productmedia_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
