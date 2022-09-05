-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 29, 2020 at 03:00 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

DROP TABLE IF EXISTS `tbl_accounts`;
CREATE TABLE IF NOT EXISTS `tbl_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` varchar(15) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `sec_ques` varchar(100) NOT NULL,
  `sec_ans` varchar(100) NOT NULL,
  `friends` varchar(11) DEFAULT NULL,
  `notifications` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `User_Id`, `fname`, `mname`, `lname`, `gender`, `contact_no`, `email`, `username`, `password`, `sec_ques`, `sec_ans`, `friends`, `notifications`) VALUES
(50, '3315-1734', 'Elaiza kim', '', 'Iranzo', 'Female', '095683265946', 'kimi@yahoo.com', '@kim', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Wala', '', '0'),
(49, '5469-3673', 'Danica marie', '', 'Del rosario', 'Female', '09865326592', 'danica@yahoo.com', '@dani', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Danips', NULL, '0'),
(48, '2346-4218', 'Kristine kaye', 'Magnaye', 'Arida', 'Female', '09562356894', 'aridakk@gmail.com', '@tin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', 'Nye', NULL, '0'),
(47, '4827-8096', 'Jienah', '', 'Bona', 'Female', '09235643164', 'jienahb@yahoo.com', '@jienah', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'What is your mother&#039;s nickname?', 'Jejena', NULL, '0'),
(45, '8486-4472', 'Diane cielo', '', 'Arida', 'Male', '09078032797', 'diane@gmail.com', '@diane', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Who is your father?', 'Charlz', NULL, '0'),
(46, '7890-3883', 'Joshua ming', '', 'Ricohermoso', 'Male', '092356134652', 'ming@yahoo.com', '@ming', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Who is your father?', 'Yao ming', NULL, '0'),
(44, '6762-6027', 'Ageo', 'Vallar', 'Agnote', 'Male', '09234619090', 'agnoteageo@yahoo.com', '@geo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Who is your father?', 'Charlz', NULL, '0'),
(53, '7146-6449', 'Paul anjelo', 'gutierez', 'yamon', 'Male', '09282736172', 'pp@yahoo.com', '@paul', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Backup string.', '123456789', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_connections`
--

DROP TABLE IF EXISTS `tbl_connections`;
CREATE TABLE IF NOT EXISTS `tbl_connections` (
  `account_id` varchar(50) NOT NULL,
  `visitor_id` varchar(50) NOT NULL,
  `request` varchar(50) NOT NULL,
  `response` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `acronym` varchar(2) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `acronym_sender` varchar(2) DEFAULT NULL,
  `message_id` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_connections`
--

INSERT INTO `tbl_connections` (`account_id`, `visitor_id`, `request`, `response`, `sender`, `receiver`, `acronym`, `fname`, `lname`, `acronym_sender`, `message_id`) VALUES
('5469-3673', '6762-6027', 'accepted', NULL, '6762-6027', '5469-3673', 'Dd', 'Ageo', 'Agnote', 'Aa', '1435766792'),
('6762-6027', '5469-3673', 'accepted', NULL, '5469-3673', '6762-6027', 'Aa', 'Danica marie', 'Del rosario', 'Dd', '1435766792'),
('6762-6027', '7146-6449', 'accepted', NULL, '7146-6449', '6762-6027', 'Aa', 'Paul anjelo', 'yamon', 'Yp', '2182307898'),
('7146-6449', '6762-6027', 'accepted', NULL, '6762-6027', '7146-6449', 'Yp', 'Ageo', 'Agnote', 'Aa', '2182307898'),
('3315-1734', '7146-6449', 'accepted', NULL, '7146-6449', '3315-1734', 'Ie', 'Paul anjelo', 'yamon', 'Yp', '3884776981'),
('7146-6449', '3315-1734', 'accepted', NULL, '3315-1734', '7146-6449', 'Yp', 'Elaiza kim', 'Iranzo', 'Ie', '3884776981'),
('6762-6027', '3315-1734', 'accepted', NULL, '3315-1734', '6762-6027', 'Aa', 'Elaiza kim', 'Iranzo', 'Ie', '6194742677'),
('3315-1734', '6762-6027', 'accepted', NULL, '6762-6027', '3315-1734', 'Ie', 'Ageo', 'Agnote', 'Aa', '6194742677'),
('6762-6027', '4827-8096', 'pending', NULL, '4827-8096', '6762-6027', 'Aa', 'Jienah', 'Bona', 'Bj', '8738637486'),
('8486-4472', '4827-8096', 'accepted', NULL, '4827-8096', '8486-4472', 'Ad', 'Jienah', 'Bona', 'Bj', '8801272358'),
('4827-8096', '8486-4472', 'accepted', NULL, '8486-4472', '4827-8096', 'Bj', 'Diane cielo', 'Arida', 'Ad', '8801272358');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conversations`
--

DROP TABLE IF EXISTS `tbl_conversations`;
CREATE TABLE IF NOT EXISTS `tbl_conversations` (
  `message_id` varchar(11) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiver` varchar(11) DEFAULT NULL,
  `content` varchar(500) DEFAULT NULL,
  `sender_name` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_conversations`
--

INSERT INTO `tbl_conversations` (`message_id`, `sender`, `receiver`, `content`, `sender_name`) VALUES
('2182307898', '6762-6027', '7146-6449', 'Hey', 'Ageo Agnote'),
('8801272358', '8486-4472', '4827-8096', 'Hi sis', 'Diane cielo Arida'),
('8801272358', '8486-4472', '4827-8096', 'Oh diba nagana', 'Diane cielo Arida'),
('8801272358', '4827-8096', '8486-4472', 'sana all walang error', 'Jienah Bona'),
('8801272358', '8486-4472', '4827-8096', 'Hahaha', 'Diane cielo Arida');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
CREATE TABLE IF NOT EXISTS `tbl_events` (
  `event_id` varchar(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `target_date` date DEFAULT NULL,
  `place` varchar(150) DEFAULT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `respond` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `title`, `target_date`, `place`, `user_id`, `duration`, `respond`) VALUES
('6857626776', 'LSPU NIGHT', '2020-04-23', 'LSPU SPCC', NULL, '03:03am - 17:00pm', NULL),
('6857626776', 'LSPU NIGHT', '2020-04-23', 'LSPU SPCC', '7146-6449', '03:03am - 17:00pm', 'joined'),
('5411766219', 'UPACM2020', '2020-04-23', 'UPLB', '6762-6027', '17:00am - 19:00pm', 'joined'),
('5411766219', 'UPACM2020', '2020-04-23', 'UPLB', NULL, '17:00am - 19:00pm', NULL),
('3625597689', 'CCSNIGHT2020', '2020-04-30', 'LSPUSPCC', '6762-6027', '17:02am - 16:01pm', 'joined'),
('3625597689', 'CCSNIGHT2020', '2020-04-30', 'LSPUSPCC', NULL, '17:02am - 16:01pm', NULL),
('3625597689', 'CCSNIGHT2020', '2020-04-30', 'LSPUSPCC', '4827-8096', '17:02am - 16:01pm', 'joined');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feed`
--

DROP TABLE IF EXISTS `tbl_feed`;
CREATE TABLE IF NOT EXISTS `tbl_feed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(11) DEFAULT NULL,
  `content` varchar(150) DEFAULT NULL,
  `comments` varchar(150) DEFAULT NULL,
  `commentator` varchar(50) DEFAULT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `acro_sender` varchar(2) DEFAULT NULL,
  `date_c` varchar(50) DEFAULT NULL,
  `type_p` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feed`
--

INSERT INTO `tbl_feed` (`id`, `post_id`, `content`, `comments`, `commentator`, `sender`, `acro_sender`, `date_c`, `type_p`) VALUES
(130, '5411766219', 'UPACM_2020', NULL, NULL, 'Ageo Agnote', 'Aa', '9 :  08 : 31 | PM  Wednesday 29th of April 2020 ', 1),
(129, '6857626776', 'LSPU NIGHT', NULL, NULL, 'Paul anjelo yamon', 'Yp', '10 :  46 : 27 | AM  Wednesday 29th of April 2020 ', 1),
(131, '3625597689', 'CCSNIGHT2021', NULL, NULL, 'Ageo Agnote', 'Aa', '9 :  09 : 39 | PM  Wednesday 29th of April 2020 ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

DROP TABLE IF EXISTS `tbl_notifications`;
CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `user_id` varchar(11) DEFAULT NULL,
  `acronym` varchar(2) DEFAULT NULL,
  `content` varchar(100) DEFAULT NULL,
  `res_action` varchar(50) DEFAULT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `sender` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notifications`
--

INSERT INTO `tbl_notifications` (`user_id`, `acronym`, `content`, `res_action`, `date_created`, `sender`) VALUES
('5469-3673', 'Aa', 'Hey! Ageo Agnote sent you a friend request!', 'read', 'Fri, 24 Apr 2020 16:42:58 +0000', '6762-6027'),
('6762-6027', 'Dd', 'Hey! Danica marie Del rosario accepted your friend request!', 'read', 'Fri, 24 Apr 2020 16:43:11 +0000', '5469-3673'),
('6762-6027', 'Yp', 'Hey! Paul anjelo yamon sent you a friend request!', 'read', 'Wed, 29 Apr 2020 02:41:04 +0000', '7146-6449'),
('7146-6449', 'Aa', 'Hey! Ageo Agnote accepted your friend request!', 'read', 'Wed, 29 Apr 2020 02:41:22 +0000', '6762-6027'),
('3315-1734', 'Yp', 'Hey! Paul anjelo yamon sent you a friend request!', 'read', 'Wed, 29 Apr 2020 02:47:15 +0000', '7146-6449'),
('7146-6449', 'Ie', 'Hey! Elaiza kim Iranzo accepted your friend request!', 'unread', 'Wed, 29 Apr 2020 02:47:37 +0000', '3315-1734'),
('6762-6027', 'Ie', 'Hey! Elaiza kim Iranzo sent you a friend request!', 'read', 'Wed, 29 Apr 2020 02:47:49 +0000', '3315-1734'),
('3315-1734', 'Aa', 'Hey! Ageo Agnote accepted your friend request!', 'read', 'Wed, 29 Apr 2020 02:48:06 +0000', '6762-6027'),
('6762-6027', 'Bj', 'Hey! Jienah Bona sent you a friend request!', 'unread', 'Wed, 29 Apr 2020 14:57:30 +0000', '4827-8096'),
('8486-4472', 'Bj', 'Hey! Jienah Bona sent you a friend request!', 'read', 'Wed, 29 Apr 2020 14:57:45 +0000', '4827-8096'),
('4827-8096', 'Ad', 'Hey! Diane cielo Arida accepted your friend request!', 'read', 'Wed, 29 Apr 2020 14:57:52 +0000', '8486-4472');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
