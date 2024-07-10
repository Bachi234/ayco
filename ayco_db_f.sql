-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 08:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayco_db_f`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(50) NOT NULL,
  `adminDate` datetime NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminDate`, `adminEmail`, `adminPassword`) VALUES
(1, 'Kendrick', '2024-07-02 05:06:31', 'admintest@gmail.com', 'admin'),
(3, 'admin2', '2024-07-02 07:03:02', 'admin2@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryStatus` int(11) NOT NULL DEFAULT 1,
  `categoryDate` datetime NOT NULL,
  `categoryDp` varchar(150) NOT NULL,
  `adminID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='add category for what type of PC Part to be added namely RAM/CPU,CASE,etc.';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `categoryStatus`, `categoryDate`, `categoryDp`, `adminID`) VALUES
(15, 'Monitors', 1, '0000-00-00 00:00:00', 'randomMoni5.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `modelID` int(11) NOT NULL,
  `modelName` varchar(100) NOT NULL,
  `modelStatus` int(11) NOT NULL DEFAULT 1,
  `modelDate` datetime NOT NULL,
  `productId` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `modelDp` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productStatus` int(11) NOT NULL DEFAULT 1,
  `productDate` datetime NOT NULL,
  `cID` int(11) NOT NULL,
  `adminId` int(11) NOT NULL,
  `productDp` int(11) NOT NULL,
  `productComp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='add product for website namely Asus,GALAX, etc.';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFn` varchar(100) NOT NULL,
  `userLn` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPw` varchar(150) NOT NULL,
  `userLink` varchar(200) DEFAULT NULL,
  `userDate` datetime NOT NULL,
  `userStatus` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `categories_admin_adminID__fk` (`adminID`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`modelID`),
  ADD KEY `models_admin__fk` (`adminId`),
  ADD KEY `models_products__fk` (`productId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `products_admin_adminID_fk` (`adminId`),
  ADD KEY `products_categories_categoryID_fk` (`cID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `modelID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_adminID__fk` FOREIGN KEY (`adminID`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `models_admin__fk` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `models_products__fk` FOREIGN KEY (`productId`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_adminID_fk` FOREIGN KEY (`adminId`) REFERENCES `admin` (`adminID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_categoryID_fk` FOREIGN KEY (`cID`) REFERENCES `categories` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
