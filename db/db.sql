-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jul 24, 2014 at 10:16 PM
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
(7, 'Dresses', 'Beautiful frocks, cocktail, dining and over the knee length dresses.', ''),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `SellerID`, `BuyerID`, `TypeID`, `TypeName`, `ItemName`, `Description`, `Size`, `Label`, `Price`, `PhotoPath`, `Active`) VALUES
(1, 2, NULL, 1, 'Jacket', 'Woolly Jacket', '100% lambs wool. ', 'XS', 'Country Road', 30, 'CountryRoad-jacket.png', 1),
(2, 2, NULL, 8, 'Skirt', 'BecnBridge', 'Cool detailed skirt. zipper and button.', 'L', 'Bec n bridge', 50, 'becnBridgeskirt2.png', 1),
(3, 3, NULL, 3, 'Tee', 'Cool Tshirt ', 'See through white tshirt. Never worn.', 'M', 'Bassike', 20, 'bassike-tshirt.png', 1),
(4, 4, NULL, 7, 'Causal dress', 'Cool light pink dress.', 'Very cute light pink.Casual with converse.', 'M', 'Huffer', 40, 'huffer-dress.png', 1),
(5, 5, NULL, 6, 'Jumper', 'Light pink jumper', '100% Wool. Slightly pilling. Very nice to wear.', 'M', 'Country Road', 20, 'Countryroadjersey.png', 1),
(6, 6, NULL, 5, 'Shorts', 'Jean shorts.', 'Ripped jeans. Loose ', 'S', 'KooKai', 30, 'Kookai-shorts.png', 1),
(7, 3, NULL, 2, 'Top', 'Tshirt, in mint condition', 'Very cool Mens tshir', 'L', 'I love ugly', 50, 'Iloveugle-tshirt.png', 1),
(8, 4, NULL, 4, 'Trousers', 'Jeans', 'New London Jeans. Slightly baggy around top for M.', 'M', 'New London', 90, 'NewLondonJeans.png', 1),
(9, 3, 1, 6, 'Jumper', 'Winter woolly', 'White woven jumper. 100% wool.', 'L', 'Ralph Lauren', 80, 'RalphLauren-jumper.png', 1),
(10, 3, 0, 6, 'Jumper', 'Woolly jumper', 'gold sequins all over front & back.', 'XS', 'SassnBide', 80, 'SequinJumper.png', 1),
(13, 2, NULL, 3, 'Tee', 'Grey tee', 'Bassike tshirt, tuck', 'M', 'Bassike', 25, 'bassike-tshirt2.png', 1),
(14, 4, NULL, 1, 'Jacket', 'Grey Karen Walker Jacket', 'Grey warm jacket. Waterproof.', 'M', 'Karen Walker', 180, 'karenwalker-jacket.png', 1),
(15, 5, NULL, 4, 'Pants', 'Designer Jeans', 'Sass n Bide ripped all over.', 'M', 'Sass n Bide', 48, 'SassnBideJeans.png', 1),
(16, 4, NULL, 8, 'Skirts', 'Very sad to let go skirt.', 'Very cool black leather skirt. Zipped.', 'S', 'Max Fashions', 92, 'Max-skirt.png', 1),
(17, 3, NULL, 1, 'Jacket', 'Fur Jacket - Vintage', 'Rabbit fur. Silk lining. Very vintage.', 'M', 'Vintage', 25, 'FurJacket.png', 1),
(18, 5, NULL, 1, 'Jacket', 'Chanel jackie O', 'Pink weaved chanel jacket. Original.', 'S', 'Chanel', 90, 'chanel-jacket.png', 1),
(19, 5, NULL, 5, 'shorts', 'Blue shorts', 'Very cool draw string blue jean shorts.', 'L', 'Country Road', 10, 'countryroadshorts.png', 1),
(20, 1, NULL, 5, 'shorts', 'Black leather shorts', 'detailed leather draw string shorts', 'S', 'Bec n Bridge', 93, 'BecNBridge-Shorts.png', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `tbmember` (`MemberID`);
