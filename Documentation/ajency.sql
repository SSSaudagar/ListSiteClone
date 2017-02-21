-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2017 at 09:22 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajency`
--
CREATE DATABASE IF NOT EXISTS `ajency` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ajency`;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
`countryID` int(11) NOT NULL,
  `countryName` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryName`) VALUES
(1, 'India'),
(2, 'UK'),
(3, 'USA'),
(4, 'Japan'),
(5, 'France');

-- --------------------------------------------------------

--
-- Table structure for table `country_movies`
--

DROP TABLE IF EXISTS `country_movies`;
CREATE TABLE IF NOT EXISTS `country_movies` (
  `country` int(11) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_movies`
--

INSERT INTO `country_movies` (`country`, `movie`) VALUES
(1, 3),
(1, 4),
(2, 4),
(3, 4),
(1, 5),
(2, 5),
(3, 5),
(4, 5),
(1, 6),
(3, 6),
(1, 7),
(2, 7),
(3, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
`directorID` int(11) NOT NULL,
  `directorName` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`directorID`, `directorName`) VALUES
(1, 'Adeeb Rai'),
(2, 'Calvin Reeder'),
(3, 'Mickey Duzyj'),
(4, 'Frances Bodomo'),
(5, 'Matt Larsen & Kenneth Gug'),
(6, 'Chandan Roy Sanyal'),
(7, 'Arati Kadav '),
(8, 'Francois Ferracci'),
(9, 'Nils Clauss'),
(10, 'Arati Kadav Zain Matcheswalla'),
(11, 'Jeremy Robbins'),
(12, 'Kailash S Bhavan'),
(13, 'Thea Gajic');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
`genreID` int(11) NOT NULL,
  `genreName` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genreID`, `genreName`) VALUES
(1, 'Comedy'),
(2, 'Drama'),
(3, 'Indian'),
(4, 'Romance'),
(5, 'Experimental'),
(6, 'Animation'),
(7, 'Award Winning'),
(8, 'Short Doc'),
(9, 'Dark'),
(10, 'Sci - Fi'),
(11, 'Thriller'),
(12, 'Disaster Porn'),
(13, 'Family'),
(14, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movies`
--

DROP TABLE IF EXISTS `genre_movies`;
CREATE TABLE IF NOT EXISTS `genre_movies` (
  `genre` int(11) NOT NULL,
  `movie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre_movies`
--

INSERT INTO `genre_movies` (`genre`, `movie`) VALUES
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(2, 4),
(5, 4),
(6, 5),
(7, 5),
(8, 5),
(7, 6),
(9, 6),
(10, 6),
(11, 6),
(5, 7),
(7, 7),
(8, 7),
(3, 8),
(7, 8),
(11, 8);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
`languageID` int(11) NOT NULL,
  `languageName` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`languageID`, `languageName`) VALUES
(1, 'French'),
(2, 'Romanian'),
(3, 'Hindi'),
(4, 'English'),
(5, 'Japanese'),
(6, 'German'),
(7, 'Korean'),
(8, 'Spanish'),
(9, 'Mandarin'),
(10, 'Swedish'),
(11, 'Arabic'),
(12, 'Persian'),
(13, 'Catalan'),
(14, 'Marathi'),
(15, 'Assamese'),
(16, 'Bengali'),
(17, 'Danish'),
(18, 'Malayalam');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
`movieID` int(11) NOT NULL,
  `movieName` varchar(50) NOT NULL,
  `tagline` varchar(150) DEFAULT NULL,
  `description` text,
  `views` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `director` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieID`, `movieName`, `tagline`, `description`, `views`, `time`, `likes`, `timestamp`, `director`, `language`) VALUES
(3, 'LOVEY DOVEY', NULL, 'A cute-awkward, unromantically- romantic and unconventional story of an army man celebrating Valentines Day with his wife and trying to woo her. Watch his hilarious attempts and her indifference, as they grapple with each other.\r\nThis 20 minute short tries to shed light on the beauty and charm of an arranged marriage, a concept every Indian is intrigued by but very few understand.\r\nDo they really work? What makes two strangers turn into life partners? Is it really that simple, or really that complicated?\r\n''''Lovey Dovey'''' is the sweet answer to the alternative style of romance, the one that begins.', 237, 1200, 84, '2017-02-21 04:44:32', 1, 3),
(4, 'The Procedure (Sundance 2017 Winner) (Mature)', NULL, 'A man is kidnapped and forced to endure a strange experiment.\r\n\r\nWinner of the Sundance Short Film Jury Award: U.S Fiction.\r\n', 87, 180, 72, '2017-02-21 04:59:56', 2, 4),
(5, 'The Shining Star of Losers Everywhere (Sundance)', NULL, 'In 2003, Japan was plunged into economic darkness, and its people needed a ray of hope. They found one in Haru Urara, a racehorse with a pink Hello Kitty mask and a career-long losing streak. ', 268, 1080, 101, '2017-02-21 05:04:05', 3, 5),
(6, 'Boneshaker (Sundance 2017)', 'An African family, lost in America, travels to a Louisiana church to find a cure for its problem child.', '\r\n\r\nStarring the endearing Beast of the Southern Wild child, an African family, lost in America, travels to a Louisiana church to find a cure for its problem child.\r\n\r\nOfficial Selection: Sundance Film Festival 2013, SXSW 2013, Telluride Film Festival 2013\r\n', 419, 720, 122, '2017-02-21 05:09:25', 4, 4),
(7, 'DEER SQUAD (SUNDANCE 2017)', 'The dopiest short doc ever about being homies with a deer', 'Kelvin was busy playing basketball one day and found a deer. He loved the deer and he loves money so he named the deer money. His fame shot up subsequent days as he recorded videos of himself feeding the deer and his family various foods right from pringles to deer corn. This quaint little doc about Kelvin just celebrates the simplicity and carefreeness in life and will be competing in Sundance 2017.', 223, 240, 212, '2017-02-21 05:09:25', 5, 4),
(8, 'HIROSHIMA', 'Hiroshima is a take, an interpretation of the horrific events on the fateful island, marking the end of the last World War.', '\r\n\r\nHiroshima is a take, an interpretation of the horrific events on the fateful island, marking the end of the last World War. It is visual poetry, a melange of emotions and feelings merged into the realms of sight and sound. Hiroshima is a tribute to the many lives and stories that were lost and the many that emerged.\r\n\r\nIt was made in late 2015 and was screened at various international film festivals in India and abroad.\r\n', 359, 360, 56, '2017-02-21 05:12:07', 6, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
 ADD PRIMARY KEY (`countryID`);

--
-- Indexes for table `country_movies`
--
ALTER TABLE `country_movies`
 ADD PRIMARY KEY (`country`,`movie`), ADD KEY `movie` (`movie`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
 ADD PRIMARY KEY (`directorID`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
 ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `genre_movies`
--
ALTER TABLE `genre_movies`
 ADD PRIMARY KEY (`genre`,`movie`), ADD KEY `movie` (`movie`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
 ADD PRIMARY KEY (`languageID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`movieID`), ADD KEY `language` (`language`), ADD KEY `director` (`director`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
MODIFY `directorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
MODIFY `languageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `country_movies`
--
ALTER TABLE `country_movies`
ADD CONSTRAINT `country_movies_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`movieID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `country_movies_ibfk_2` FOREIGN KEY (`country`) REFERENCES `country` (`countryID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `genre_movies`
--
ALTER TABLE `genre_movies`
ADD CONSTRAINT `genre_movies_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genre` (`genreID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `genre_movies_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movies` (`movieID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`director`) REFERENCES `directors` (`directorID`),
ADD CONSTRAINT `movies_ibfk_2` FOREIGN KEY (`language`) REFERENCES `languages` (`languageID`) ON DELETE SET NULL ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
