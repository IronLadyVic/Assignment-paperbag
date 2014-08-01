-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2014 at 03:35 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `paperbag-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE IF NOT EXISTS `producttype` (
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

CREATE TABLE IF NOT EXISTS `tbmember` (
  `MemberID` int(5) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(5000) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Mobile` int(50) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `StreetAddress` varchar(200) NOT NULL,
  `City` varchar(100) NOT NULL,
  `PostCode` int(10) NOT NULL,
  PRIMARY KEY (`MemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbmember`
--

INSERT INTO `tbmember` (`MemberID`, `UserName`, `Password`, `FirstName`, `LastName`, `Mobile`, `Email`, `StreetAddress`, `City`, `PostCode`) VALUES
(1, 'Vic', '4cd157dcf1ecf08f1d9018c76dfe903a', 'tori', 'Clark', 395235246, 'clark.victoriajane@gmail.com', '115C Remuera Road', 'Auckland', 1050),
(2, 'Tom', '16b9af90946235ffddfb6b1b995060f6', 'Tom', 'Burton', 21656325, 'tom@gmail.com', '15 Harrolds Ave', 'Christchurch', 8015),
(3, 'Paul', '08f106c0adce094a39507f56f29219a3', 'Paul', 'Davis', 210657324, 'pdavis@gmail.com', '15 Seaview Road', 'Auckland', 1040),
(4, 'test', 'aa3c224883afdcfb9afeb0d088c4ed13', 'test', 'test', 2147483647, 'test', 'test', 'test', 34646346),
(5, 'Janey', '51b1f899ef550855f6973efb1b082b64', 'Jane', 'Clark', 213331822, 'jclark@hotmail.com', '30 Rosevalt Ave', 'Christchurch', 8015),
(6, 'Rach', '3c9f44d0bd5e570b04be6e97c4f1cb81', 'Rachel', 'Smith', 1234123, 'rachsmith@hotmail.com', '111 Arney Road', 'Auckland', 1050),
(8, 'NewKidOnTheBlock', '50af3bca8defdb5988311ebcf8d28366', 'Block', 'Kid', 2147483647, 'NewKid@gmail.com', '333 Heaton Street, Fendalton', 'Christhchurch', 8051);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduct`
--

CREATE TABLE IF NOT EXISTS `tbproduct` (
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
  `PhotoPath` varchar(5000) DEFAULT NULL,
  `Active` tinyint(4) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `SellerID` (`SellerID`,`BuyerID`),
  KEY `TypeID` (`TypeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbproduct`
--

INSERT INTO `tbproduct` (`ProductID`, `SellerID`, `BuyerID`, `TypeID`, `TypeName`, `ItemName`, `Description`, `Size`, `Label`, `Price`, `PhotoPath`, `Active`) VALUES
(1, 1, NULL, 1, 'Jacket', 'Warm Grey Day Jacket', 'Cotton, two buckles top & bottom.', 'M', 'Sass n Bide', 0, 'product2014-07-31-04-09-18.png', 1),
(2, 2, NULL, 7, 'Skirt', 'BecnBridge', 'Cool detailed skirt. zipper and button.', 'L', 'Bec n bridge', 0, 'product2014-07-31-03-25-20.jpg', 1),
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
(20, 1, NULL, 5, 'shorts', 'Black leather shorts', 'detailed leather draw string shorts', 'S', 'Bec n Bridge', 93, 'BecNBridge-Shorts.png', 1),
(33, 1, NULL, 1, 'Top', 'Silky', 'Silky top by coop', 'M', 'Trelise Cooper', 30, 'product2014-07-31-04-33-32.png', 1),
(34, 1, NULL, 1, ' Top', 'Silk', 'Silky top', 'M', 'Trelise Cooper', 30, 'product2014-07-31-04-34-11.png', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbproduct`
--
ALTER TABLE `tbproduct`
  ADD CONSTRAINT `tbproduct_ibfk_2` FOREIGN KEY (`TypeID`) REFERENCES `producttype` (`TypeID`),
  ADD CONSTRAINT `tbproduct_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `tbmember` (`MemberID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
