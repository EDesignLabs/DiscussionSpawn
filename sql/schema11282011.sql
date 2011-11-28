-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 03:20 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `discussionspawn`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

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
('dbdcfa048a1ad356f4ab6800f322ab44', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:8.0.1) Gecko/20100101 Firefox/8.0.1', 1322421718, 0x613a343a7b733a373a22757365725f6964223b733a313a2231223b733a383a22757365726e616d65223b733a353a2261646d696e223b733a31313a227065726d697373696f6e73223b613a323a7b693a303b733a31333a2263616e5f656469745f6c696e65223b693a313b733a31373a2263616e5f656469745f636f6d6d656e7473223b7d733a363a22737461747573223b733a313a2231223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_id` int(11) NOT NULL,
  `comment_parent` int(11) NOT NULL,
  `comment_name` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_body` text NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `entry_id`, `comment_parent`, `comment_name`, `comment_email`, `comment_body`, `comment_date`) VALUES
(13, 31, 0, 'admin', '', 'facts', '2011-11-20 21:51:52'),
(14, 31, 0, 'admin', '', 'dfasdfasdf', '2011-11-20 21:51:55'),
(15, 31, 13, 'admin', '', 'cxcccxc', '2011-11-20 21:52:02'),
(16, 31, 15, 'admin', '', 'dfASdffd', '2011-11-20 21:52:09'),
(17, 31, 0, 'admin', '', 'hasdfh', '2011-11-20 21:52:41'),
(18, 31, 0, 'admin', '', 'dfsdfsd', '2011-11-20 21:52:52'),
(19, 31, 18, 'admin', '', 'cat', '2011-11-20 21:52:59'),
(20, 39, 0, 'admin', '', 'asdfasd', '2011-11-21 23:53:13'),
(21, 39, 0, 'admin', '', 'sadfdf', '2011-11-21 23:53:15'),
(22, 39, 20, 'admin', '', 'sadfasdf', '2011-11-21 23:53:23'),
(23, 42, 0, 'admin', '', 'fdasdfasdf', '2011-11-22 16:42:09'),
(24, 42, 0, 'admin', '', 'asdfsadf', '2011-11-22 16:42:11'),
(25, 42, 23, 'admin', '', 'asdfasdf', '2011-11-22 16:42:13'),
(26, 42, 25, 'admin', '', 'asdfsafd', '2011-11-22 16:42:16'),
(27, 42, 0, 'admin', '', '<div> test </div>', '2011-11-22 18:06:25'),
(28, 42, 0, 'admin', '', 'tessadfasdf', '2011-11-22 18:06:47'),
(29, 42, 0, 'admin', '', '<div>', '2011-11-22 18:07:07'),
(30, 42, 0, 'admin', '', '</li>', '2011-11-22 18:07:22'),
(31, 66, 0, 'admin', '', 'test', '2011-11-27 00:10:47'),
(32, 66, 31, 'admin', '', 'test', '2011-11-27 00:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `author_id`, `field1`, `field2`, `field3`, `entry_date`, `entry_type`, `position`, `top`) VALUES
(62, 1, 'fast', 'asdfff', 'true', '2011-11-25 10:08:44', 'title-textbox', 'full', -7),
(64, 1, 'kAjM1pRIFP4', '', 'true', '2011-11-26 10:40:45', 'youtubebox', 'right', 220),
(65, 1, 'test', 'asdfd', 'true', '2011-11-26 21:23:13', 'title-textbox', 'left', 545),
(66, 1, '4ed1b2709e025puppy1.jpg', 'test', 'true', '2011-11-26 22:46:03', 'imagebox', 'left', 144),
(67, 1, '4ed1b3ca275b3DSC_0670.jpg', 'Testter', 'true', '2011-11-26 22:51:46', 'imagebox', 'full', 716);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Dumping data for table `login_attempts`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `permissions`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'admin', '$2a$08$b2Rcb5ShB5s6Rh6kQWbzf.jjHFUzRJH/2YnRH/l9F8eq8X41iGyGG', 'victorsigma@gmail.com', 1, 'can_edit_line,can_edit_comments', 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2011-11-27 19:49:47', '2011-11-11 05:06:05', '2011-11-27 13:49:47'),
(2, 'test', '$2a$08$YHv/7UBYg8usFHtb8EWAy.K3mwW49sxJYRt9xJW5Mevdh1geIkZxa', 'test@aol.com', 1, '', 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2011-11-11 05:22:58', '2011-11-10 23:22:58'),
(3, 'student', '$2a$08$ZDSmHCG0TrDKYfCWCGX2kuld7caRCwcbAGGg8R19HxsptdDDc.Zn2', 'student@student.com', 1, '', 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '2011-11-27 02:59:56', '2011-11-26 16:59:44', '2011-11-26 20:59:56'),
(4, 'testerrr', '$2a$08$nwykR/goV2BgueHITPgWMun3wvqqvoDPXnRz1S2Pp0ju/0UAimmQW', 'etst@aol.com', 1, '', 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2011-11-27 17:58:30', '2011-11-27 11:58:30'),
(5, 'bobder', '$2a$08$95TLRb/vsxDZ4k7ZWYgsS.R3ri5WUu8pp5YMOwZjCyey/a0eUAXIS', 'ths@aol.com', 1, '', 0, NULL, NULL, NULL, NULL, NULL, '127.0.0.1', '0000-00-00 00:00:00', '2011-11-27 18:06:54', '2011-11-27 12:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `user_autologin`
--

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


-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `country` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `username`, `country`, `website`) VALUES
(1, 1, 'admin', NULL, NULL),
(2, 2, 'test', NULL, 'test'),
(3, 3, 'student', NULL, 'test'),
(4, 4, 'testrrr', NULL, 'test'),
(5, 5, 'bobder', NULL, 'test');
