-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 04, 2013 at 06:04 PM
-- Server version: 5.5.29
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discuss8_lily`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('293aa5130c6ab9bd7c0251cd7fd8e182', '72.229.62.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17', 1360020060, 0x613a343a7b733a373a22757365725f6964223b733a313a2237223b733a383a22757365726e616d65223b733a373a2274656163686572223b733a31313a227065726d697373696f6e73223b613a323a7b693a303b733a31333a2263616e5f656469745f6c696e65223b693a313b733a31373a2263616e5f656469745f636f6d6d656e7473223b7d733a363a22737461747573223b733a313a2231223b7d),
('b35c68eec1d34560384f2dad782539b0', '72.229.62.116', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17', 1360020722, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `comment_parent` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `entry_id`, `comment_parent`, `comment_name`, `comment_email`, `comment_body`, `comment_date`) VALUES
(49, 65, 40, 'admin', '', 'what', '2011-12-08 14:12:15'),
(50, 65, 47, 'admin', '', 'this is a swweert', '2011-12-08 14:12:39'),
(51, 65, 49, 'admin', '', 'cartman \r\n', '2011-12-08 14:13:11'),
(52, 65, 48, 'admin', '', 'this is a reply to :what what', '2011-12-08 14:13:27'),
(53, 65, 48, 'admin', '', 'hooters', '2011-12-08 14:20:04'),
(54, 65, 53, 'admin', '', 'tester', '2011-12-08 14:23:21'),
(55, 76, 0, 'teacher', '', 'asdffsd', '2013-01-03 18:13:45'),
(56, 76, 0, 'teacher', '', 'asdffsd', '2013-01-03 18:13:53'),
(57, 76, 0, 'teacher', '', 'asdffsd', '2013-01-03 18:16:25'),
(58, 76, 0, 'teacher', '', 'asdffsd', '2013-01-03 18:17:54'),
(59, 76, 0, 'teacher', '', 'hello', '2013-01-03 18:18:02'),
(60, 76, 0, 'teacher', '', 'test', '2013-01-03 18:18:09'),
(61, 76, 59, 'teacher', '', 'sfsdfdf', '2013-01-03 18:18:17'),
(62, 62, 0, 'teacher', '', 'hello\n', '2013-01-03 18:25:32'),
(63, 62, 62, 'teacher', '', 'hello from orage', '2013-01-03 18:25:59'),
(64, 76, 60, 'teacher', '', 'good', '2013-01-03 18:33:27'),
(65, 62, 63, 'teacher', '', 'bluebleue blue', '2013-01-03 18:41:09'),
(66, 62, 39, 'teacher', '', 'factbook', '2013-01-03 18:41:30'),
(67, 6, 0, 'teacher', '', ' hello ', '2013-01-14 03:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

DROP TABLE IF EXISTS `entry`;
CREATE TABLE IF NOT EXISTS `entry` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `field1` varchar(255) NOT NULL,
  `field2` text NOT NULL,
  `field3` varchar(255) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entry_type` varchar(255) NOT NULL,
  `position` varchar(12) NOT NULL,
  `top` int(11) NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `author_id`, `field1`, `field2`, `field3`, `entry_date`, `entry_type`, `position`, `top`) VALUES
(5, 7, '', 'What is an example of opportunity cost from your own life? Think of a time when you had to make an important decision: What did you gain? What did you lose?', '', '2013-02-03 15:56:06', 'promptbox', 'full', 1410),
(9, 7, 'Scarcity and Decision-Making', 'Re-read the passage we read yesterday on pg. 13. Then answer the following question: Why do Katniss and Gale decide to enter their names so many times?', 'true', '2013-02-04 14:17:46', 'title-textbox', 'full', 985),
(10, 7, 'Making Connections', 'What is a real-world example of how people are forced to make tough decisions based on scarcity?', 'true', '2013-02-04 14:18:38', 'title-textbox', 'full', 1140),
(11, 7, 'How do scarcity and opportunity cost influence characters in the Hunger Games?', '', 'false', '2013-02-04 18:37:20', 'title-textbox', 'full', 0),
(13, 7, '511000f292693katniss_prim.jpg', 'I decided to volunteer for the Hunger Games instead of letting Prim go. What do you think of my decision? What was the opportunity cost of my decision?', 'true', '2013-02-04 18:42:36', 'imagebox', 'full', 595),
(14, 7, '5110015ead7afkatniss.jpg', '', 'false', '2013-02-04 18:44:23', 'imagebox', 'full', 115),
(15, 7, 'Take the poll! If you were Katniss, would you have volunteered for the Hunger Games? After selecting your answer, explain how opportunity cost influenced your decision.', '', 'Yes, No', '2013-02-04 18:47:41', 'poll', 'full', 495);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `insert_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `username`, `post_id`, `comment_id`, `message`, `type`, `status`, `insert_time`) VALUES
(1, '0', 6, 0, 'Someone has replyed to "..."  !', 'reply', 'unread', '2013-01-14 03:19:26'),
(2, '', 12, 0, 'Someone has replyed to "..."  !', 'reply', 'unread', '2013-01-24 18:37:24'),
(3, '', 3, 0, 'Someone has replyed to "..."  !', 'reply', 'unread', '2013-01-29 18:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `permissions` varchar(255) COLLATE utf8_bin NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `permissions`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(7, 'teacher', '$P$B5EAK8subrN1zQwJfkL5Y4d0.zb5Zo/', 'teacher@aol.com', 1, 'can_edit_line,can_edit_comments', 0, NULL, NULL, NULL, NULL, NULL, '72.229.62.116', '2013-02-04 16:23:51', '2013-01-03 11:45:05', '2013-02-04 23:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('b1c4d2bb96d22821581ed2b6a5456c39', 7, 'Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; MALC)', '65.219.220.130', '2013-01-30 17:50:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `username`, `country`, `website`) VALUES
(7, 7, 'teacher', NULL, 'test'),
(8, 8, 'HUMcharterstudent', NULL, 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
