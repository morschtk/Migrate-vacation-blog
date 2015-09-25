-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2014 at 09:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `migrate`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `postDate` int(11) NOT NULL,
  `destinationID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `content`, `postDate`, `destinationID`, `userName`) VALUES
(3, 'woo', 1415648110, 1, 'Traveler88'),
(4, 'Here is an edited comment', 1415653263, 1, 'morschtk'),
(6, 'I Love Hawaiian Women! ', 1415672723, 2, 'morschtk');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE IF NOT EXISTS `destinations` (
  `destinationID` int(11) NOT NULL AUTO_INCREMENT,
  `destinationName` varchar(255) NOT NULL,
  `destinationImage` varchar(255) NOT NULL,
  `destinationContent` text NOT NULL,
  PRIMARY KEY (`destinationID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`destinationID`, `destinationName`, `destinationImage`, `destinationContent`) VALUES
(1, 'Colorado', 'colorado', '300 days of sunshine a year. Denver is a sports town. The stunning mountain ranges! Over 300 inches of snow annually and 26 ski resorts. From blue skies, lakes and rivers to yellow aspens and golden fields of wheat, red sandstone cliffs to green vineyards, there&#39;s memories to be made on every visit!'),
(2, 'Hawaii''s big Island', 'hawaii_big_island', 'The Big Island is by far the most diverse of all the Hawaiian islands. From barren grasslands to lush jungle, lava fields to snow capped mountains it''s all here. Kilauea is still erupting, and often puts on quite a show for visitors where lava enters the ocean. The Big Island offers world class resorts on the Kohala ''Gold'' coast, condos around the island, and excellent B&B''s in both Kona and near the Volcano area. Hiking to a recent lava flow or riding horseback in gorgeous Waipio Valley.'),
(3, 'Australia', 'australia', 'The Great Barrier Reef is world&#45;renowned for its abundance of marine life and world&#45;class diving opportunities.\r\nSydney&#39;s a place to relax in the sun and enjoy the water.\r\nUluru, you wouldn&#39;t think that a giant round rock covering eight kilometers of land would be breathtaking, but it is.\r\nThe Aussie BBQ is a serious tradition, with breath taking food.\r\nThe best surfing is on the East Coast, and there are a million places where you can catch a good wave.'),
(4, 'Switzerland', 'switzerland', 'Come to Switzerland for magnificent mountain scenery, magical snowy landscapes, countless attractions in the snow and the ultimate in winter nostalgia at the Swiss Historic Hotels. Welcome to the Swiss winter - the original winter for the past 150 years!'),
(5, 'Paris', 'paris', 'Containing world&#45;class museums, fashion, cuisine, and an atmosphere all its own, Paris is also a city of "many splendors," as Ernest Hemingway recalled in his memoir, "A Moveable Feast." Visit the Centre Pompidou, enjoy gourmet pastries, shop couture or hit the boutiques in Les Halles, take in the view atop the Eiffel Tower, or even plan a day trip to Versailles Palace. But don''t miss out on the simple pleasure of meandering the marvelous arrondissements (districts).'),
(6, 'Catie', 'cathrine', 'Kind of like Haiti, only fifty times more amazing! The one and only Catie with a C, is a great place to get a little R&R away from reality. So for some programming on that next level shit and some great cuisine come visit Katie Geens!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userSalt` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userPassword`, `userSalt`, `userEmail`, `isAdmin`) VALUES
(1, 'Morschtk', 'e5336b773440c17e04a81d4757befdacc7d4a281e13aa2874d2cea55e78a0102', '592b8d', 'morschtk@alfredstate.edu', 1),
(2, 'Traveler88', 'd335b08fa15f3c1a6759eb07a31718270025df61817ece0d42a695ee8acf7412', 'c175ca', 'Bill@grays.gov', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
