-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:46 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineapp`
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
(9, 'Umang Jogani', 'd41d8cd98f00b204e980', 1, '2021-03-16 16:23:15.000000'),
(13, 'Ronak', 'e193a6b40e6b1e88aa4f', 1, '2021-03-15 08:49:12.000000'),
(16, 'Jenil Jogani', 'd41d8cd98f00b204e980', 1, '2021-03-16 16:25:07.000000');

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
(15, 'product', 'Color', 'Color', 'select', 'int', 1, ''),
(16, 'product', 'brand', 'brand', 'text', 'text(255)', 1, ''),
(17, 'product', 'dis', 'dis', 'textarea', 'text(255)', 2, '');

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
(1, 'Red', 15, 3),
(3, 'Yellow', 15, 2),
(5, 'Black', 15, 1);

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
(20, 0, '20', 'BadRoom', 'null', 1),
(21, 24, '24=21', 'bads', 'null', 1),
(22, 21, '24=21=22', 'bad1', 'null', 0),
(23, 21, '24=21=23', 'bad2', 'null', 0),
(24, 0, '24', 'Nightstands', 'null', 0),
(25, 22, '24=21=22=25', 'footer', 'null', 0);

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
(7, 'hello', 12, '<p><strong>ZXzc</strong></p>', 1, '2021-03-11 08:07:44'),
(10, 'gmail', 12, '<p><em>helo</em></p>', 1, '2021-03-15 06:45:04'),
(11, 'Ronak', 12, '<p><a href=\"http://ronkpatel13@gmail.com\">hii</a></p>', 1, '2021-03-15 08:51:10'),
(12, 'hello', 1, '<p><strong>Hii</strong></p>', 0, '2021-03-17 05:30:13');

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
(43, 5, 'Rima', 'Jogani', 'rimapate199808@gmail.com', 'c90c753ee819969452e5', 1234567992, 0, '2021-03-16 16:43:48.000000', NULL),
(45, 8, 'Riddhi', 'Patel', 'rima@gmail.com', 'baf08b218974b4b520d0', 1234567992, 1, '2021-03-16 16:47:22.000000', NULL);

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
(36, 43, 'Nikol', 'Ahmedabad', 'Gujrat', 382350, 'India', 'billing'),
(37, 43, 'Bapunagar', 'Ahmedabad', 'Gujrat', 382360, 'India', 'shipping');

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
(5, 'Retailer', 0, '2021-03-12 06:32:08.000000'),
(8, 'Wholesaler', 0, '2021-03-16 09:16:51.000000');

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
(13, 'Laptop', 'rtyu', 1000, 'null', 0, '2021-03-11 06:47:52.000000'),
(15, 'TV', 'rty', 1000, 'null', 0, '2021-03-16 17:03:51.000000');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(20) NOT NULL,
  `SKU` int(12) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productPrice` int(20) NOT NULL,
  `productDiscount` int(20) NOT NULL,
  `productQty` int(20) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `createDate` datetime(6) NOT NULL,
  `updateDate` datetime(6) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `brand` text DEFAULT NULL,
  `dis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `SKU`, `productName`, `productPrice`, `productDiscount`, `productQty`, `description`, `status`, `createDate`, `updateDate`, `Color`, `brand`, `dis`) VALUES
(93, 2147483647, 'TV', 100, 10, 1, 'null', 0, '2021-03-17 16:56:23.000000', '2021-03-17 16:56:32.000000', 'Red', 'Raymond', 'null'),
(94, 2147483647, 'Laptop', 100, 10, 2, 'null', 0, '2021-03-17 16:59:53.000000', '2021-03-17 17:00:14.000000', 'Yellow', 'Raymond', 'null'),
(95, 2147483647, 'TV', 100, 10, 1, 'null', 0, '2021-03-18 08:51:38.000000', NULL, NULL, NULL, NULL);

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
(18, 91, 5, '100'),
(19, 91, 8, '70'),
(20, 91, 21, '90'),
(21, 83, 5, '100'),
(22, 83, 8, '200'),
(23, 61, 5, '100'),
(24, 61, 8, '80');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(50) NOT NULL,
  `shippingName` varchar(20) NOT NULL,
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
(8, 'TV', 'qwe', 10000, 'null', 0, '2021-03-16 17:32:04.000000');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD KEY `parentId` (`parentId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

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
  MODIFY `adminId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `addressId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `customerGroupId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `productMediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD CONSTRAINT `productmedia_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
