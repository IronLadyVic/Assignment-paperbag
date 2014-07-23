-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 23, 2014 at 01:17 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `paperbag-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `TypeID` int(5) NOT NULL AUTO_INCREMENT,
  `TypeName` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `DisplayOrder` varchar(5) NOT NULL DEFAULT 'Null',
  PRIMARY KEY (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`TypeID`, `TypeName`, `Description`, `DisplayOrder`) VALUES
(1, 'Jackets', 'an outer garment extending either to the waist or the hips, typically having sleeves and a fastening down the front.', 'Null'),
(2, 'Tops', 'a garment or part placed on, fitted to, or covering the upper part of your body.', 'Null'),
(3, 'Tees', 'a short-sleeved casual top', 'Null'),
(4, 'Pants', 'Trousers', 'Null'),
(5, 'Shorts', 'Short trousers that reach only to the knees or thighs', 'Null'),
(6, 'Knitwear', 'knitted garments', 'Null'),
(7, 'Shorts', 'Short trousers.', ''),
(8, 'Skirts', 'a woman’s outer garment fastened around the waist and hanging down around the legs.', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `tbmember`
--

CREATE TABLE `tbmember` (
  `MemberID` int(5) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Mobile` int(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `StreetAddress` varchar(200) NOT NULL,
  `City` varchar(100) NOT NULL,
  `PostCode` int(10) NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbmember`
--

INSERT INTO `tbmember` (`MemberID`, `UserName`, `Password`, `FirstName`, `LastName`, `Mobile`, `Email`, `StreetAddress`, `City`, `PostCode`) VALUES
(1, 'Vic', '1234', 'Victoria', 'Clark', 21641875, 'clark.victoriajane@gmail.com', '115C Remuera Road', 'Auckland', 1050),
(2, 'Tom', 'Tossy', 'Tom', 'Burton', 21656325, 'tom@gmail.com', '15 Harrolds Ave', 'Christchurch', 8015),
(3, 'Paul', 'PDids', 'Paul', 'Davis', 210657324, 'pdavis@gmail.com', '15 Seaview Road', 'Auckland', 1040),
(4, 'test', 'test', 'test', 'test', 2147483647, 'test', 'test', 'test', 34646346),
(5, 'Janey', 'holiday', 'Jane', 'Clark', 213331822, 'jclark@hotmail.com', '30 Rosevalt Ave', 'Christchurch', 8015),
(6, 'Rach', 'bubbles', 'Rachel', 'Smith', 1234123, 'rachsmith@hotmail.com', '111 Arney Road', 'Auckland', 1050);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE `tbproduct` (
  `ProductID` int(5) NOT NULL AUTO_INCREMENT,
  `SellerID` int(5) NOT NULL,
  `BuyerID` int(5) DEFAULT NULL,
  `TypeID` int(5) NOT NULL,
  `TypeName` varchar(50) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Label` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `PhotoPath` varchar(100) DEFAULT NULL,
  `Active` tinyint(4) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `SellerID` (`SellerID`,`BuyerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `SellerID`, `BuyerID`, `TypeID`, `TypeName`, `ItemName`, `Description`, `Size`, `Label`, `Price`, `PhotoPath`, `Active`) VALUES
(1, 2, NULL, 1, 'Jacket', 'Chanel Jacket', 'Black 100% wool Jacket.', 'XS', 'Chanel', 30, 'chanel.png', 1),
(2, 2, NULL, 8, 'Skirt', 'Sass n Bide Skirt', 'Cool coloured zip sk', 'L', 'SassnBide', 50, 'sassnbideskirt.png', 1),
(3, 3, NULL, 3, 'Tee', 'Cool Tshirt for quarter of the price!!!', 'Tee', 'M', 'Bassike', 20, 'bassike-tshirt.png', 1),
(4, 4, NULL, 7, 'Shorts', 'Draw string shorts', 'Very cute light blue', 'M', 'Country road', 40, 'countryroadshort.png', 1),
(5, 5, NULL, 6, 'Jumper', 'Light pink jumper', '100% Wool, from Coun', 'M', 'Country Road', 20, 'Countryroadjersey.png', 1),
(6, 6, NULL, 5, 'Shorts', 'Jean shorts.', 'Ripped jeans. Loose ', 'S', 'KooKai', 30, 'Kookai-shorts.png', 1),
(7, 3, NULL, 2, 'Top', 'Tshirt, in mint condition', 'Very cool Mens tshir', 'L', 'I love ugly', 50, 'Iloveugly-tshirt.png', 1),
(8, 4, NULL, 4, 'Trousers', 'Jeans', 'New London Jeans. Lo', 'M', 'New London', 90, 'NewLondonJeans.png', 1),
(9, 3, 1, 6, 'Jumper', 'Woolly jumper', 'White woven jumper. ', 'L', 'Top Shop', 80, 'Topshopjumper.png', 1),
(10, 3, 0, 6, 'Jumper', 'Woolly jumper', 'gold sequins all ove', 'XS', 'SassnBide', 80, 'SequinJumper.png', 1),
(13, 2, NULL, 3, 'Tee', 'Grey tee', 'Bassike tshirt, tuck', 'M', 'Bassike', 25, 'bassike-tshirt2.png', 1),
(14, 4, NULL, 1, 'Jacket', 'Celine Jacket', 'Pink & Cream detailing.', 'M', 'Celine', 180, 'CelineCreamjacket.png', 1),
(15, 5, NULL, 4, 'Pants', 'Designer Jeans', 'Sass n Bide ripped j', 'M', 'Sass n Bide', 48, 'SassnBideRippedJeans.png', 1),
(16, 4, NULL, 8, 'Skirts', 'Detailed skirt.', 'Bec n Bridge very co', 'S', 'Bec n Bridge', 20, 'becnbridgeskirt.png', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `tbmember` (`MemberID`);
