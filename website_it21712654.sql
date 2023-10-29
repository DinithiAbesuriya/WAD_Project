-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 19, 2022 at 08:19 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_it21712654`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `email` varchar(100) NOT NULL,
  `itemID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `color` varchar(20) NOT NULL,
  PRIMARY KEY (`cartID`),
  KEY `ITEMID` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clothing_item`
--

DROP TABLE IF EXISTS `clothing_item`;
CREATE TABLE IF NOT EXISTS `clothing_item` (
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(20) NOT NULL,
  `clothing_title` varchar(500) NOT NULL,
  `product_description` varchar(600) NOT NULL,
  `image` varchar(500) NOT NULL,
  `catergory` varchar(10) NOT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothing_item`
--

INSERT INTO `clothing_item` (`itemID`, `quantity`, `color`, `size`, `price`, `clothing_title`, `product_description`, `image`, `catergory`) VALUES
(1, 10, 'white\r\n', 'XS,S,M,L,XL', 4500, 'Floral print dress', 'Two strap bustier dress with floral print', '\"../Images/Products/dress4.png\"', 'dress'),
(2, 8, 'blue', 'XS,S,M,L,XL', 15000, 'Blue Owl', 'Long sleeve blue lace dress ', '\"../Images/Products/dress5.jpg\"', 'dress'),
(3, 5, 'gold', 'XS,S,M,L,XL', 20000, 'Gold maze', '', '\"../Images/Products/dress6.jpeg\"', 'dress'),
(4, 3, 'pink', 'XS,S,M,L,XL', 14000, 'Pink blush', '', '\"../Images/Products/dress8.jpg\"', 'dress'),
(5, 15, 'red', 'XS,S,M,L,XL', 6600, 'Red Velvet', '', '\"../Images/Products/party dress2.png\"', 'dress'),
(6, 20, 'black', 'XS,S,M,L,XL', 3500, 'Black Lace', '', '\"../Images/Products/party dress3.png\"', 'dress'),
(7, 10, 'white', 'XS,S,M,L,XL', 2500, 'White sweatshirt', '', '\"../Images/Products/top1.jpeg\"', 'top'),
(8, 8, 'white', 'XS,S,M,L,XL', 3500, '', '', '\"../Images/Products/top2.jpeg\"', 'top'),
(9, 15, 'green', 'XS,S,M,L,XL', 2500, 'Green sweatshirt', '', '\"../Images/Products/top3.jpeg\"', 'top'),
(10, 20, 'white', 'XS,S,M,L,XL', 3500, 'White hoodie', '', '\"../Images/Products/top4.jpeg\"', 'top'),
(11, 10, 'blue', 'XS,S,M,L,XL', 5000, 'Off shoulder blue top', '', '\"../Images/Products/top5.jpeg\"', 'top'),
(12, 25, 'yellow', 'XS,S,M,L,XL', 2500, 'Yellow Top', '', '\"../Images/Products/top6.jpg\"', 'top');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `orderID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `itemID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(4) NOT NULL,
  `color` varchar(15) NOT NULL,
  PRIMARY KEY (`orderID`),
  KEY `Order_itemid` (`itemID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderID`, `email`, `itemID`, `quantity`, `size`, `color`) VALUES
(1, 'dinithirishi@gmail.com', 3, 1, 'XS', 'blue'),
(2, 'dinithirishi@gmail.com', 11, 1, 'XS', 'blue'),
(3, 'dinithirishi@gmail.com', 8, 3, 'S', 'red'),
(4, 'dinithirishi@gmail.com', 5, 3, 'S', 'red'),
(5, 'dinithi@gmail.com', 3, 1, 'XS', 'gold'),
(6, 'dinithi@gmail.com', 12, 1, 'XS', 'blue'),
(7, 'dinithi@gmail.com', 2, 1, 'XS', 'blue'),
(8, 'dinithi@gmail.com', 5, 1, 'XS', 'green'),
(9, 'dinithi@gmail.com', 9, 1, 'XS', 'green'),
(10, 'dinithi@gmail.com', 3, 1, 'XS', 'gold'),
(11, 'rishi@gmail.com', 12, 1, 'S', 'yellow');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `password` varchar(10) NOT NULL,
  `bday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `fullName`, `contact`, `address`, `password`, `bday`, `gender`) VALUES
('dinithirishi@gmail.com', 'dinithi rishi', '34567', 'dinithirishi@gmail.com', '1234', '2022-06-13', 'Female'),
('dinithi@gmail.com', 'Dinithi', '1234567890', 'dinithi@gmail.com', '123', '2022-06-05', 'Female'),
('dr@gmail.com', 'Dinithi Rishi Abesuriya', '1234567891', 'dr@gmail.com', '123', '2022-05-18', 'Female'),
('rishi@gmail.com', 'Rishi', '1234567890', 'rishi@gmail.com', '123', '2022-06-06', 'Female');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `ITEMID` FOREIGN KEY (`itemID`) REFERENCES `clothing_item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `Order_itemid` FOREIGN KEY (`itemID`) REFERENCES `clothing_item` (`itemID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
