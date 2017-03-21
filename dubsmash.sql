-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 04:14 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seeliftc_littleshows`
--
CREATE DATABASE IF NOT EXISTS `seeliftc_littleshows` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `seeliftc_littleshows`;

-- --------------------------------------------------------

--
-- Table structure for table `dubs_category`
--

DROP TABLE IF EXISTS `dubs_category`;
CREATE TABLE IF NOT EXISTS `dubs_category` (
  `id` int(100) NOT NULL,
  `subtag` varchar(500) NOT NULL,
  `maintag` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dubs_category`
--

INSERT INTO `dubs_category` (`id`, `subtag`, `maintag`) VALUES
(1, 'chennai amirtha', 'Ad'),
(2, 'SAMS marine', 'Ad'),
(3, 'Cat', 'Animal'),
(4, 'Amul baby', 'Character'),
(5, 'snake babu', 'Character'),
(6, 'Koundamani', 'Comedian'),
(7, 'Santhanam', 'Comedian'),
(8, 'Senthil', 'Comedian'),
(9, 'Vadivel', 'Comedian'),
(10, 'Vivek', 'Comedian'),
(11, 'aahan', 'Dialogue'),
(12, 'black sheep', 'Dialogue'),
(13, 'brother mark', 'Dialogue'),
(14, 'Ennama', 'Dialogue'),
(15, 'friend love matter', 'Dialogue'),
(16, 'i am waiting', 'Dialogue'),
(17, 'oru sappa figure', 'Dialogue'),
(18, 'paah', 'Dialogue'),
(19, 'Shock ayitaen', 'Dialogue'),
(20, 'thooki adichiduvaen', 'Dialogue'),
(21, 'Action', 'Genre'),
(22, 'comedy', 'Genre'),
(23, 'Captain', 'Hero'),
(24, 'Dhanush', 'Hero'),
(25, 'kamal', 'Hero'),
(26, 'rajini', 'Hero'),
(27, 'thalaivar', 'Hero'),
(28, 'Vijaykanth', 'Hero'),
(29, 'Nazriya', 'Heroine'),
(30, 'Ramya Krishnan', 'Lady Villain'),
(31, 'English', 'Language'),
(32, 'Hindi', 'Language'),
(33, 'Kannada', 'Language'),
(34, 'Malayalam', 'Language'),
(35, 'Tamil', 'Language'),
(36, 'Telugu', 'Language'),
(37, 'chandramukhi', 'Movie'),
(38, 'Narasimma', 'Movie'),
(39, 'nayagan', 'Movie'),
(40, 'ok kanmani', 'Movie'),
(41, 'padayappa', 'Movie'),
(42, 'polladhavan', 'Movie'),
(43, 'puthupettai', 'Movie'),
(44, 'Soodhu kavvum', 'Movie'),
(45, 'Veeram', 'Movie'),
(46, 'VIP', 'Movie'),
(47, 'Nambiar', 'Villain'),
(48, 'Prakash Raj', 'Villain'),
(49, 'Raguvaran', 'Villain');

-- --------------------------------------------------------

--
-- Table structure for table `dubs_clapper`
--

DROP TABLE IF EXISTS `dubs_clapper`;
CREATE TABLE IF NOT EXISTS `dubs_clapper` (
  `clapperID` varchar(20) NOT NULL,
  `appID` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `emailID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dubs_clapping`
--

DROP TABLE IF EXISTS `dubs_clapping`;
CREATE TABLE IF NOT EXISTS `dubs_clapping` (
  `movieID` varchar(20) NOT NULL,
  `clapperID` varchar(20) NOT NULL,
  `timeOfClap` datetime NOT NULL,
  `movIDclapID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dubs_clapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `dubs_contestmovie`
--

DROP TABLE IF EXISTS `dubs_contestmovie`;
CREATE TABLE IF NOT EXISTS `dubs_contestmovie` (
  `movieID` varchar(20) NOT NULL,
  `competitorID` varchar(20) NOT NULL,
  `valid` char(2) NOT NULL,
  `movie_upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dubs_contestmovie`
--


-- --------------------------------------------------------

--
-- Table structure for table `dubs_contestor`
--

DROP TABLE IF EXISTS `dubs_contestor`;
CREATE TABLE IF NOT EXISTS `dubs_contestor` (
  `competitorID` varchar(20) NOT NULL,
  `littleID` varchar(20) NOT NULL,
  `contest_name` varchar(30) NOT NULL,
  `overAllClap` int(11) NOT NULL,
  `overAllView` int(11) NOT NULL,
  `joiningDate` datetime NOT NULL,
  `emailID` varchar(20) NOT NULL,
  `phNo` varchar(15) NOT NULL,
  `gender` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dubs_contestor`
--


-- --------------------------------------------------------

--
-- Table structure for table `dubs_movie_details`
--

DROP TABLE IF EXISTS `dubs_movie_details`;
CREATE TABLE IF NOT EXISTS `dubs_movie_details` (
  `movieID` varchar(20) NOT NULL,
  `MovieName` varchar(50) NOT NULL,
  `MovieURL` varchar(100) NOT NULL,
  `MovieViewer` int(11) NOT NULL,
  `MovieTags` varchar(100) NOT NULL,
  `MovieClaps` int(11) NOT NULL,
  `via` int(11) NOT NULL,
  `movie_upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dubs_movie_details`
--

INSERT INTO `dubs_movie_details` (`movieID`, `MovieName`, `MovieURL`, `MovieViewer`, `MovieTags`, `MovieClaps`, `via`, `movie_upload_date`) VALUES
('1569', 'best dubsmash', 'http://www.youtube.com/embed/ZVnrfUloJNg', 60, 'ad', 6, 2, '2015-05-25 16:51:37'),
('15696', 'best dubsmash', 'http://www.youtube.com/embed/ZVnrfUloJNg', 147, 'action', 1, 2, '2015-05-25 16:51:37'),
('178292', 'hii', 'http://www.youtube.com/embed/yzTuBuRdAyA', 3, '', 0, 2, '2015-06-08 12:45:58'),
('189065', '', 'http://www.youtube.com/embed/KCFZQsC3syA', 6, 'elope', 0, 2, '2015-06-07 19:17:48'),
('222359', '', 'http://www.youtube.com/embed/ZMHAnTJfrwQ', 46, 'kannada', 0, 2, '2015-06-05 11:45:29'),
('228859', 'sample', 'http://www.youtube.com/embed/tG3Ie7Ejrho', 55, 'telugu', 0, 2, '2015-05-21 12:40:10'),
('233284', 'My dubsmash', 'https://www.facebook.com/thisisSonamBajwa/videos/650602468408262/', 94, 'heroine', 0, 1, '2015-05-21 12:43:01'),
('234107', 'Pisharedi', 'https://www.facebook.com/Asianet/videos/1008858225798499/', 58, 'Malayalam', 12, 1, '2015-05-21 12:29:46'),
('234108', 'Pisharedi', 'https://www.facebook.com/Asianet/videos/1008858225798499/', 60, 'Malayalam', 12, 1, '2015-05-21 12:29:46'),
('266121', 'alia', 'http://www.youtube.com/embed/EyaqRxv7AVw', 25, 'cute', 1, 2, '2015-05-26 19:22:02'),
('28392', '', 'http://www.youtube.com/embed/yBI_huJbGjw', 4, 'SALMAN SONAKSHI HERO', 0, 2, '2015-06-07 19:12:02'),
('289528', 'funny', 'http://www.youtube.com/embed/JkG7P91CwpM', 4, 'comedian', 0, 2, '2015-06-04 12:32:51'),
('309761', '', 'http://www.youtube.com/embed/4u2E51Xz_AA', 1, '', 0, 2, '2015-06-07 00:56:52'),
('311073', 'Desi', 'https://www.facebook.com/dubsmashtamil/videos/468225100003355', 7, 'Hindi', 0, 1, '2015-05-21 11:54:53'),
('386023', '', 'http://www.youtube.com/embed/4g3YL9-FVvQ', 2, 'comedy flirt cute', 0, 2, '2015-06-07 19:20:04'),
('409308', 'Kiddie', 'https://www.facebook.com/IamLakshmiRai/videos/666368850164831/', 51, 'Comedy', 0, 1, '2015-05-21 12:35:30'),
('452062', 'cute  bolly wood ', 'http://www.youtube.com/embed/4g3YL9-FVvQ', 1, 'cute sonakshi nice', 0, 2, '2015-06-07 19:25:54'),
('505437', 'Sonam Bajwa', 'https://www.facebook.com/thisisSonamBajwa/videos/649216551880187/', 142, '#hindi', 0, 1, '2015-05-13 04:08:12'),
('505439', 'Sonam Bajwa', 'https://www.facebook.com/thisisSonamBajwa/videos/649216551880187/', 140, '#hindi', 0, 1, '2015-05-13 04:08:12'),
('510015', '', 'http://www.youtube.com/embed/RVw1hlXAvBk', 2, '', 0, 2, '2015-06-08 16:17:10'),
('519261', '', 'http://www.youtube.com/embed/ZMHAnTJfrwQ', 4, '', 0, 2, '2015-06-05 13:23:43'),
('52134', 'tailtwe1', 'http://www.youtube.com/embed/tG3Ie7Ejrho', 100, '#tag1', 0, 2, '2015-05-22 05:33:08'),
('53416', '', 'http://www.youtube.com/embed/4u2E51Xz_AA', 1, '', 0, 2, '2015-06-07 00:58:34'),
('578892', '', 'http://www.youtube.com/embed/4u2E51Xz_AA', 1, '', 0, 2, '2015-06-07 00:54:18'),
('585484', 'Bahubali - the beginning', 'http://www.youtube.com/embed/CYcKs5fknb8', 2, '#thriller #awesome #brilliant', 0, 2, '2015-06-06 19:23:29'),
('589268', '', 'http://www.youtube.com/embed/-YnUuKzzBs0', 1, 'HELLO ', 0, 2, '2015-06-07 19:11:02'),
('604221', '', 'http://www.youtube.com/embed/4u2E51Xz_AA', 1, '#sss ssss ssss', 0, 2, '2015-06-07 01:00:33'),
('62022', '', 'http://www.youtube.com/embed/4g3YL9-FVvQ', 1, 'comedy', 0, 2, '2015-06-07 19:19:29'),
('645786', 'sample', 'https://www.facebook.com/Asianet/videos/1009285845755737/', 7, 'sample', 0, 1, '2015-05-19 09:10:15'),
('669803', '', 'http://www.youtube.com/embed/ZMHAnTJfrwQ', 1, 'genre', 0, 2, '2015-06-05 12:04:28'),
('681461', 'Best Of Bollywood', 'http://www.youtube.com/embed/yzTuBuRdAyA', 2, 'Ad action character', 0, 2, '2015-06-08 12:38:25'),
('692203', '', 'http://www.youtube.com/embed/ZMHAnTJfrwQ', 4, '', 0, 2, '2015-06-05 13:25:48'),
('700808', '', 'http://www.youtube.com/embed/-YnUuKzzBs0', 1, 'hit smash super', 0, 2, '2015-06-07 19:14:06'),
('703372', '', 'http://www.youtube.com/embed/yzTuBuRdAyA', 1, '', 0, 2, '2015-06-08 12:53:15'),
('709903', '', 'http://www.youtube.com/embed/4u2E51Xz_AA', 2, '', 0, 2, '2015-06-07 01:02:52'),
('732607', 'hello', 'http://www.youtube.com/embed/DF8850-nfX8', 3, 'action', 0, 2, '0000-00-00 00:00:00'),
('73282', '', 'http://www.youtube.com/embed/4Wxwbt3RBIQ', 9, '#funny #indian', 0, 2, '2015-06-07 19:05:57'),
('850038', '', 'http://www.youtube.com/embed/ZMHAnTJfrwQ', 3, '', 0, 2, '2015-06-05 13:22:50'),
('850543', 'Sonam Bajwa', 'https://www.facebook.com/thisisSonamBajwa/videos/649216551880187/', 140, '#hindi', 0, 1, '2015-05-13 04:08:12'),
('854402', 'hi', 'http://www.youtube.com/embed/yzTuBuRdAyA', 1, '', 0, 2, '2015-06-08 12:44:45'),
('890107', 'Best Of Bollywood', 'http://www.youtube.com/embed/KCFZQsC3syA', 1, 'Alia', 0, 2, '2015-06-07 19:15:40'),
('903779', 'sample', 'http://www.youtube.com/embed/tG3Ie7Ejrho', 32, 'genre', 0, 2, '2015-05-07 04:18:07'),
('920807', '', 'http://www.youtube.com/embed/RVw1hlXAvBk', 1, '', 0, 2, '2015-06-08 15:51:40'),
('969971', 'dubb', 'http://www.youtube.com/embed/sjr9rl9ALtA', 2, 'hero', 0, 2, '0000-00-00 00:00:00'),
('999359', 'helllloo', 'http://www.youtube.com/embed/yzTuBuRdAyA', 1, '', 0, 2, '2015-06-08 12:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `dubs_tags`
--

DROP TABLE IF EXISTS `dubs_tags`;
CREATE TABLE IF NOT EXISTS `dubs_tags` (
`id` int(11) NOT NULL,
  `tagname` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dubs_tags`
--

INSERT INTO `dubs_tags` (`id`, `tagname`) VALUES
(1, 'Action'),
(2, 'Ad'),
(3, 'Animal'),
(4, 'character'),
(5, 'comedian'),
(6, 'dialogue'),
(7, 'genre'),
(8, 'hero'),
(9, 'heroine'),
(10, 'lady-villan'),
(11, 'language'),
(12, 'movie'),
(13, 'villan');

-- --------------------------------------------------------

--
-- Table structure for table `little_register`
--

DROP TABLE IF EXISTS `little_register`;
CREATE TABLE IF NOT EXISTS `little_register` (
  `u_id` varchar(20) NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_mail` varchar(50) NOT NULL,
  `u_password` varchar(30) NOT NULL,
  `u_role` varchar(20) NOT NULL,
  `u_type` varchar(50) NOT NULL,
  `u_phno` varchar(15) NOT NULL,
  `facebook_link` varchar(100) NOT NULL,
  `u_dob` date NOT NULL,
  `u_dob_old` varchar(30) NOT NULL,
  `u_gender` varchar(20) NOT NULL,
  `profile_pic_avail` int(1) NOT NULL DEFAULT '0',
  `time2` varchar(20) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `little_register`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `dubs_category`
--
ALTER TABLE `dubs_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dubs_clapper`
--
ALTER TABLE `dubs_clapper`
 ADD PRIMARY KEY (`clapperID`), ADD UNIQUE KEY `appID` (`appID`);

--
-- Indexes for table `dubs_contestmovie`
--
ALTER TABLE `dubs_contestmovie`
 ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `dubs_contestor`
--
ALTER TABLE `dubs_contestor`
 ADD PRIMARY KEY (`competitorID`);

--
-- Indexes for table `dubs_movie_details`
--
ALTER TABLE `dubs_movie_details`
 ADD UNIQUE KEY `movieID` (`movieID`);

--
-- Indexes for table `dubs_tags`
--
ALTER TABLE `dubs_tags`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dubs_tags`
--
ALTER TABLE `dubs_tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
