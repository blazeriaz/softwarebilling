-- phpMyAdmin SQL Dump
-- version 4.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2017 at 05:18 AM
-- Server version: 5.1.73
-- PHP Version: 5.5.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `targetusmle_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_availability_time_slot`
--

CREATE TABLE IF NOT EXISTS `admin_availability_time_slot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_type_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `timeslot_name` varchar(255) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_duration` int(11) NOT NULL,
  `is_users_booked` tinyint(1) NOT NULL,
  `is_complete` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `admin_availability_time_slot`
--

INSERT INTO `admin_availability_time_slot` (`id`, `product_type_id`, `product_id`, `timeslot_name`, `batch_name`, `date_time`, `date`, `time`, `time_duration`, `is_users_booked`, `is_complete`, `created`, `modified`) VALUES
(1, 2, 0, 'ASSES_PREP-27Oct17-10AM', '', '2017-10-27 10:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-25 20:15:18', '0000-00-00 00:00:00'),
(2, 0, 0, '-30Oct17-11AM', '11 AM Batch', '2017-10-30 11:00:00', '0000-00-00', '00:00:00', 0, 0, 0, '2017-10-26 11:51:51', '0000-00-00 00:00:00'),
(4, 2, 0, 'ASSES_PREP-26Oct17-10AM', '', '2017-10-26 10:39:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 10:40:22', '0000-00-00 00:00:00'),
(7, 2, 0, 'ASSES_PREP-26Oct17-10AM', '', '2017-10-26 10:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:17:57', '0000-00-00 00:00:00'),
(8, 2, 0, 'ASSES_PREP-26Oct17-11AM', '', '2017-10-26 11:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:18:45', '0000-00-00 00:00:00'),
(9, 10, 0, 'RRC-26Oct17-09AM', '', '2017-10-26 09:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:19:20', '0000-00-00 00:00:00'),
(10, 2, 0, 'ASSES_PREP-28Oct17-11AM', '', '2017-10-28 11:19:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:20:05', '0000-00-00 00:00:00'),
(11, 3, 0, 'PNC-28Oct17-09PM', 'asdf', '2017-10-28 21:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:20:23', '0000-00-00 00:00:00'),
(12, 0, 0, 'CCC-26Oct17-10AM', '', '2017-10-26 11:25:00', '0000-00-00', '00:00:00', 0, 0, 0, '2017-10-26 11:33:02', '0000-00-00 00:00:00'),
(13, 3, 0, 'PNC-26Apr18-10AM', '', '2018-04-26 10:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:34:52', '0000-00-00 00:00:00'),
(14, 2, 0, 'ASSES_PREP-26Oct17-11PM', 'dfasd', '2017-10-26 23:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 11:52:10', '0000-00-00 00:00:00'),
(15, 2, 0, 'Jo', '', '2017-09-26 08:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-10-26 12:32:47', '0000-00-00 00:00:00'),
(16, 2, 11, 'ASSES_PREP-24Nov17-07AM', '7  am batch', '2017-11-24 07:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-11-20 12:24:24', '0000-00-00 00:00:00'),
(17, 9, 8, 'CCC-24Nov17-08AM', '8 am batch', '2017-11-24 08:00:00', '0000-00-00', '00:00:00', 1, 0, 0, '2017-11-20 12:26:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_batch_list`
--

CREATE TABLE IF NOT EXISTS `admin_batch_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `time_slot_id` bigint(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `duration_part` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `admin_batch_list`
--

INSERT INTO `admin_batch_list` (`id`, `name`, `time_slot_id`, `class_id`, `duration_part`, `date_time`, `date`, `time`) VALUES
(1, '', 1, 1, 1, '2017-10-27 10:00:00', '0000-00-00', '00:00:00'),
(10, '', 4, 1, 1, '2017-10-26 10:39:00', '0000-00-00', '00:00:00'),
(20, '', 7, 1, 1, '2017-10-26 10:00:00', '0000-00-00', '00:00:00'),
(21, '', 8, 1, 1, '2017-10-26 11:00:00', '0000-00-00', '00:00:00'),
(22, '', 9, 1, 1, '2017-10-26 09:00:00', '0000-00-00', '00:00:00'),
(23, '', 9, 2, 1, '2017-10-26 09:00:00', '0000-00-00', '00:00:00'),
(24, '', 9, 3, 1, '2017-10-26 21:00:00', '0000-00-00', '00:00:00'),
(25, '', 10, 1, 1, '2017-10-28 11:19:00', '0000-00-00', '00:00:00'),
(26, '', 11, 1, 1, '2017-10-28 21:00:00', '0000-00-00', '00:00:00'),
(33, '', 13, 1, 1, '2018-04-26 10:00:00', '0000-00-00', '00:00:00'),
(34, '', 14, 1, 1, '2017-10-26 23:00:00', '0000-00-00', '00:00:00'),
(35, '', 15, 1, 1, '2017-09-26 08:00:00', '0000-00-00', '00:00:00'),
(36, '', 16, 1, 1, '2017-11-24 07:00:00', '0000-00-00', '00:00:00'),
(37, '', 17, 1, 1, '2017-11-24 08:00:00', '0000-00-00', '00:00:00'),
(38, '', 17, 2, 1, '2017-11-27 08:00:00', '0000-00-00', '00:00:00'),
(39, '', 17, 3, 1, '2017-11-29 08:00:00', '0000-00-00', '00:00:00'),
(40, '', 17, 4, 1, '2017-12-01 08:00:00', '0000-00-00', '00:00:00'),
(41, '', 17, 5, 1, '2017-12-04 08:00:00', '0000-00-00', '00:00:00'),
(42, '', 17, 6, 1, '2017-12-06 08:00:00', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `reset_token_date` datetime DEFAULT NULL,
  `last_login_time` datetime NOT NULL,
  `total_login_count` bigint(20) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `first_name`, `last_name`, `display_name`, `email`, `password`, `status`, `reset_token`, `reset_token_date`, `last_login_time`, `total_login_count`, `is_deleted`, `created`, `modified`) VALUES
(1, 'admin', 'admin', '', 'admin', 'admin@targetusmle.com', '0e7517141fb53f21ee439b355b5a1d0a', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 94, 0, '2017-10-10 16:07:33', '2017-10-10 16:07:33'),
(2, 'admin2', 'admin1', '', 'admin2', 'admin1@yopmail.com', '0192023a7bbd73250516f069df18b500', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 0, '2017-10-10 16:07:17', '2017-10-10 16:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `page_id` bigint(20) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `is_offer` tinyint(1) NOT NULL,
  `description` text,
  `expiry_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `created`, `modified`, `name`, `image`, `url`, `page_id`, `position_id`, `is_offer`, `description`, `expiry_date`, `status`) VALUES
(1, '2017-10-11 16:47:50', '0000-00-00 00:00:00', 'Ad 1', 'advertisement.png', 'http://www.targetusmle.com', 2, 2, 0, NULL, '2017-10-31 00:00:00', 1),
(2, '2017-10-11 16:49:05', '0000-00-00 00:00:00', 'Ad 2', 'advertisement1.png', 'http://www.targetusmle.com', 2, 2, 1, NULL, '2017-10-31 00:00:00', 1),
(3, '2017-10-16 17:34:19', '0000-00-00 00:00:00', 'Ad 3', 'advertisement2.png', 'http://www.targetusmle.com', 2, 2, 0, NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_page`
--

CREATE TABLE IF NOT EXISTS `ad_page` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ad_page`
--

INSERT INTO `ad_page` (`id`, `name`, `created`, `modified`, `status`) VALUES
(1, 'cs hand book', '2017-10-11 00:00:00', '2017-10-11 00:00:00', 1),
(2, 'blog', '2017-10-11 00:00:00', '2017-10-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_page_position`
--

CREATE TABLE IF NOT EXISTS `ad_page_position` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ad_page_id` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ad_page_position`
--

INSERT INTO `ad_page_position` (`id`, `ad_page_id`, `position`, `created`, `modified`, `status`) VALUES
(1, 1, 'bottom', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, 'rightside', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner_management`
--

CREATE TABLE IF NOT EXISTS `banner_management` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `content_one` text NOT NULL,
  `content_two` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `directory_path` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `site_reference_id` bigint(20) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `banner_management`
--

INSERT INTO `banner_management` (`id`, `name`, `content_one`, `content_two`, `url`, `directory_path`, `file_name`, `site_reference_id`, `sort_order`, `status`, `created`, `modified`) VALUES
(7, 'Home Banner 1', 'Target USMLE', 'Your one stop solution to Step 2 CS 2', '', '/home/development/php/targetusmle_dev/appdata/banners/', 'adminbanner7.jpg', 1, 0, 1, '2017-10-16 17:17:51', '0000-00-00 00:00:00'),
(8, 'Home Banner 2', 'Target USMLE', 'Your one stop solution to Step 2 CS 2', '', '/home/development/php/targetusmle_dev/appdata/banners/', 'adminbanner9.jpg', 1, 0, 1, '2017-10-16 17:34:56', '0000-00-00 00:00:00'),
(9, 'Online Video Tutorials', 'Online Video Tutorial', 'Online Video Tutorial', '', '/home/development/php/targetusmle_dev/appdata/banners/', 'slider1.jpg', 2, 0, 1, '2017-11-17 17:08:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `short_description`, `description`, `image`, `posted_by`, `category_id`, `status`, `created`, `modified`) VALUES
(6, 'test1', 'test1', '<p>test1</p>', '<p>test1</p>', 'dummy_logo.png', 2, 3, 1, '2017-10-13 16:39:11', '0000-00-00 00:00:00'),
(7, 'test', 'test-1', '<p>test</p>', '<p>test</p>', 'cron1.png', 2, 2, 1, '2017-10-13 16:45:44', '0000-00-00 00:00:00'),
(9, 'test1', 'test1-1', '<p>test</p>', '<p>test</p>', 'w_logo1.png', 2, 4, 1, '2017-10-13 17:34:37', '0000-00-00 00:00:00'),
(11, 'test', 'test', '<p>test</p>', '<p>test</p>', '03.jpg', 1, 8, 1, '2017-10-17 14:06:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `no_of_blogs` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `no_of_blogs`, `status`, `created`, `modified`) VALUES
(1, 'Standard CS Encounter', 'standard-cs-encounter', 0, 1, '2017-10-11 17:39:29', '2017-10-11 17:39:29'),
(2, 'Systemwise History', 'systemwise-history', 1, 1, '2017-10-11 17:44:04', '2017-10-11 17:44:04'),
(4, 'Diffrential Diagnosis', 'diffrential-diagnosis', 1, 1, '2017-10-16 17:36:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `carrier_applied_users`
--

CREATE TABLE IF NOT EXISTS `carrier_applied_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carrier_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `skills` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `carrier_openings`
--

CREATE TABLE IF NOT EXISTS `carrier_openings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `carrier_openings`
--

INSERT INTO `carrier_openings` (`id`, `title`, `description`, `status`, `created`, `modified`) VALUES
(1, '34535', '<p>33535&nbsp;33535 dgfg&nbsp;dgfg</p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 1, '2017-11-15 13:03:46', '2017-11-15 13:04:53'),
(2, 'fdsfdg', 'dsgdsg', 1, '2017-11-15 13:06:00', '0000-00-00 00:00:00'),
(3, 'dsfdsf', 'dfdsg', 1, '2017-11-15 13:06:13', '0000-00-00 00:00:00'),
(4, '13214324', '<p>adad</p>', 1, '2017-11-15 13:06:29', '2017-11-15 13:06:54'),
(5, 'dfdgfdgdg', 'dgdg', 1, '2017-11-15 13:07:06', '0000-00-00 00:00:00'),
(6, 'fdsfdsfg', 'dgsdsgg', 1, '2017-11-15 13:07:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `city_code` varchar(255) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `city_code`, `country_id`, `status`, `created`, `modified`) VALUES
(1, 'Chennai', 'chennai', '', 96, 1, '2017-10-13 14:33:48', '2017-10-13 14:33:48'),
(3, 'El-Aaiún', 'el-aaiún', '', 60, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 't', 't', '', 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'ice1', 'ice1', '', 99, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Chennai', '', '', 96, 1, '2017-11-09 10:52:06', '2017-11-09 10:52:06'),
(8, 'Houston', 'houston', '', 230, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Madurai', '', '', 96, 1, '2017-11-10 05:02:38', '2017-11-10 05:02:38'),
(10, 'chennai', '', '', 96, 1, '2017-11-11 10:57:55', '2017-11-11 10:57:55'),
(11, 'chennai', '', '', 6, 1, '2017-11-11 11:02:57', '2017-11-11 11:02:57'),
(12, 'chennai', '', '', 56, 1, '2017-11-11 11:06:36', '2017-11-11 11:06:36'),
(13, 'chennai', '', '', 9, 1, '2017-11-11 12:29:55', '2017-11-11 12:29:55'),
(14, 'Chennai', '', '', 96, 1, '2017-11-21 11:23:13', '2017-11-21 11:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE IF NOT EXISTS `cms_pages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(235) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - inactive , 1 - active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `name`, `slug`, `content`, `sort_order`, `seo_title`, `meta_keywords`, `meta_description`, `status`, `created`, `modified`) VALUES
(1, 'About Us', 'about-us', '<div class="aboutus-sec" id="aboutus">\r\n<div class="wrapper">\r\n<h2>TopSure</h2>\r\n\r\n<p class="first-para">TopSure is a professional consultancy group that provides marketing, business consulting and lead generation services to leading companies in Singapore and abroad.</p>\r\n\r\n<p>Creativity and commitment are the two major values of the company which propel us to bring success to the projects and our clients that we deal with. Our works include major areas such as healthcare, insurance, investments, business consulting and professional services.</p>\r\n\r\n<p>You have a business need, let&#39;s catch up over a coffee!</p>\r\n</div>\r\n</div>', 2, '', '', '', 1, '2017-07-27 13:08:13', '2017-08-14 11:12:27'),
(2, 'Privacy Policy', 'privacy-policy', '<h4>Privacy &amp; Confidentiality</h4>\r\n\r\n<p>TopSure is a brand and a web platform (the &quot;Platform&quot;) owned and operated by J Ben Consulting Pte. Ltd. Singapore (&quot;JBen&quot; or &quot;The Company&quot;). JBen is extremely concerned about User&#39;s privacy when collecting User&#39;s personal information. Please read this Policy to learn more details.</p>\r\n\r\n<p>JBen does not collect any personal particulars from the User to download the Platform or access the information and content that are available on the Platform. But if the User wants to engage JBen to inquire and collect data on behalf of the User from suppliers and third party vendors for their interested products and/or services that are displayed on the Platform, then the User acknowledges and agrees to freely provide their following personal particulars for the same through the Platform such as name, mobile number, email ID, age etc. which are not otherwise publicly available. The protection of User&#39;s personal information is extremely important to JBen. This Privacy Policy (&quot;Policy&quot;) describes how JBen collects and uses the personal information that User provides on this Platform. JBen shall make changes to this Policy without prior notice and hence JBen encourages the User to review this Policy regularly for any such changes.</p>\r\n\r\n<p>JBen, as the owner and operator of the Platform, does not rent, sell or share personal information about the User with other people or non-affiliated companies, except to provide the information, data or services the User has requested or under the following circumstances,</p>\r\n\r\n<ul>\r\n	<li>To collect information and data from the suppliers and/or third party vendors that provide specific products and services that the User is interested and/or wants JBen to coordinate for the same.</li>\r\n	<li>To comply court orders or legal process or to exercise or establish its legal rights or defend against legal claims.</li>\r\n</ul>\r\n\r\n<p>JBen utilises highly secured infrastructure that deploys robust security controls in order to protect collection, transmission, storage and management of all personal information that are collected from the User, JBen cannot assure that all personal information that it may collect will never be disclosed in a manner that is inconsistent with this Policy. There may be instances of inadvertent disclosures, which are beyond the control of or not due to the fault or negligence of JBen. And as a consequence, JBen disclaims any warranties or representations relating to maintenance or non-disclosures of User&#39;s personal information that are collected and shared through the Platform or through other communication means.</p>\r\n\r\n<p>JBen encourages the User to communicate by sending an email to <a href="mailto:info@topsure.com.sg">info@topsure.com.sg</a> if the User has a query, complaint or a problem concerning the privacy policy or to report a privacy related problem.</p>', 1, 'test', 'test', '<p>test</p>\r\n', 1, '2017-07-27 13:47:25', '2017-10-17 11:20:35'),
(3, 'test', 'test', 'test', 0, 'test', 'test', 'test', 1, '2017-10-17 11:22:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=232 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `country_code`, `status`) VALUES
(1, 'Andorra', '', 'AND', 1),
(2, 'United Arab Emirates', '', 'ARE', 1),
(4, 'Antigua and Barbuda', '', 'ATG', 1),
(5, 'Anguilla', '', 'AIA', 1),
(6, 'Albania', '', 'ALB', 1),
(7, 'Armenia', '', 'ARM', 1),
(8, 'Netherlands Antilles', '', 'ANT', 1),
(9, 'Angola', '', 'AGO', 1),
(10, 'Argentina', '', 'ARG', 1),
(11, 'Austria', '', 'AUT', 1),
(12, 'Australia', '', 'AUS', 0),
(13, 'Aruba', '', 'ABW', 1),
(14, 'Azerbaijan', '', 'AZE', 1),
(15, 'Bosnia and Herzegovina', '', 'BIH', 1),
(16, 'Barbados', '', 'BRB', 1),
(17, 'Bangladesh', '', 'BGD', 1),
(18, 'Belgium', '', 'BEL', 1),
(19, 'Burkina Faso', '', 'BGR', 1),
(20, 'Bulgaria', '', 'BGR', 1),
(21, 'Bahrain', '', 'BHR', 1),
(22, 'Burundi', '', 'BDI', 1),
(23, 'Benin', '', 'BEN', 1),
(24, 'Bermuda', '', 'BMU', 1),
(25, 'Brunei Darussalam', '', 'BRN', 1),
(26, 'Bolivia', '', 'BOL', 1),
(27, 'Brazil', '', 'BRA', 1),
(28, 'Bahamas', '', 'BHS', 1),
(29, 'Bhutan', '', 'BTN', 1),
(30, 'Botswana', '', 'BWA', 1),
(31, 'Belarus', 'belarus', 'BLR', 1),
(32, 'Belize', '', 'BLZ', 1),
(33, 'Canada', '', 'CAN', 1),
(34, 'Cocos (Keeling) Islands', '', 'CCK', 1),
(35, 'Democratic Republic of the Congo', '', 'COD', 1),
(36, 'Central African Republic', '', 'CAF', 1),
(37, 'Congo', '', 'COG', 1),
(38, 'Switzerland', '', 'CHE', 1),
(39, 'Cote D''Ivoire (Ivory Coast)', '', 'CIV', 1),
(40, 'Cook Islands', '', 'COK', 1),
(41, 'Chile', '', 'CHL', 1),
(42, 'Cameroon', '', 'CMR', 1),
(43, 'China', '', 'CHN', 1),
(44, 'Colombia', '', 'COL', 1),
(45, 'Costa Rica', '', 'CRI', 1),
(46, 'Cuba', '', 'CUB', 1),
(47, 'Cape Verde', '', 'CPV', 1),
(48, 'Christmas Island', '', 'CXR', 1),
(49, 'Cyprus', '', 'CYP', 1),
(50, 'Czech Republic', '', 'CZE', 1),
(51, 'Germany', '', 'DEU', 1),
(52, 'Djibouti', '', 'DJI', 1),
(53, 'Denmark', '', 'DNK', 1),
(54, 'Dominica', '', 'DMA', 1),
(55, 'Dominican Republic', '', 'DOM', 1),
(56, 'Algeria', '', 'DZA', 1),
(57, 'Ecuador', '', 'ECU', 1),
(58, 'Estonia', '', 'EST', 1),
(59, 'Egypt', '', 'EGY', 1),
(60, 'Western Sahara', '', 'ESH', 1),
(61, 'Eritrea', '', 'ERI', 1),
(62, 'Spain', '', 'ESP', 1),
(63, 'Ethiopia', '', 'ETH', 1),
(64, 'Finland', '', 'FIN', 1),
(65, 'Fiji', '', 'FJI', 1),
(66, 'Falkland Islands (Malvinas)', '', 'FLK', 1),
(67, 'Federated States of Micronesia', '', 'FSM', 1),
(68, 'Faroe Islands', '', 'FRO', 1),
(69, 'France', '', 'FRA', 1),
(70, 'Gabon', '', 'GAB', 1),
(71, 'Great Britain (UK)', '', 'GBR', 1),
(72, 'Grenada', '', 'GRD', 1),
(73, 'Georgia', '', 'GEO', 1),
(74, 'French Guiana', '', 'GUF', 1),
(75, 'NULL', '', 'GGY', 1),
(76, 'Ghana', '', 'GHA', 1),
(77, 'Gibraltar', '', 'GIB', 1),
(78, 'Greenland', '', 'GRL', 1),
(79, 'Gambia', '', 'GMB', 1),
(80, 'Guinea', '', 'GIN', 1),
(81, 'Guadeloupe', '', 'GLP', 1),
(82, 'Equatorial Guinea', '', 'GNQ', 1),
(83, 'Greece', '', 'GRC', 1),
(84, 'S. Georgia and S. Sandwich Islands', '', 'SGS', 1),
(85, 'Guatemala', '', 'GTM', 1),
(86, 'Guinea-Bissau', '', 'GNB', 1),
(87, 'Guyana', '', 'GUY', 1),
(88, 'Hong Kong', '', 'HKG', 1),
(89, 'Honduras', '', 'HND', 1),
(90, 'Croatia (Hrvatska)', '', 'HRV', 1),
(91, 'Haiti', '', 'HTI', 1),
(92, 'Hungary', '', 'HUN', 1),
(93, 'Indonesia', '', 'IDN', 1),
(94, 'Ireland', '', 'IRL', 1),
(95, 'Israel', '', 'ISR', 1),
(96, 'India', '', 'IND', 1),
(97, 'Iraq', '', 'IRQ', 1),
(98, 'Iran', '', 'IRN', 1),
(99, 'Iceland', '', 'ISL', 1),
(100, 'Italy', '', 'ITA', 1),
(101, 'Jamaica', '', 'JAM', 1),
(102, 'Jordan', '', 'JOR', 1),
(103, 'Japan', '', 'JPN', 1),
(104, 'Kenya', '', 'KEN', 1),
(105, 'Kyrgyzstan', '', 'KGZ', 1),
(106, 'Cambodia', '', 'KHM', 1),
(107, 'Kiribati', '', 'KIR', 1),
(108, 'Comoros', '', 'COM', 1),
(109, 'Saint Kitts and Nevis', '', 'KNA', 1),
(110, 'Korea (North)', '', 'PRK', 1),
(111, 'Korea (South)', '', 'KOR', 1),
(112, 'Kuwait', '', 'KWT', 1),
(113, 'Cayman Islands', '', 'CYM', 1),
(114, 'Kazakhstan', '', 'KAZ', 1),
(115, 'Laos', '', 'LAO', 1),
(116, 'Lebanon', '', 'LBN', 1),
(117, 'Saint Lucia', '', 'LCA', 1),
(118, 'Liechtenstein', '', 'LIE', 1),
(119, 'Sri Lanka', '', 'LKA', 1),
(120, 'Liberia', '', 'LBR', 1),
(121, 'Lesotho', '', 'LSO', 1),
(122, 'Lithuania', '', 'LTU', 1),
(123, 'Luxembourg', '', 'LUX', 1),
(124, 'Latvia', '', 'LVA', 1),
(125, 'Libya', '', 'LBY', 1),
(126, 'Morocco', '', 'MAR', 1),
(127, 'Monaco', '', 'MCO', 1),
(128, 'Moldova', '', 'MDA', 1),
(129, 'Madagascar', '', 'MDG', 1),
(130, 'Marshall Islands', '', 'MHL', 1),
(131, 'Macedonia', '', 'MKD', 1),
(132, 'Mali', '', 'MLI', 1),
(133, 'Myanmar', '', 'MMR', 1),
(134, 'Mongolia', '', 'MNG', 1),
(135, 'Macao', '', 'MAC', 1),
(136, 'Northern Mariana Islands', '', 'MNP', 1),
(137, 'Martinique', '', 'MTQ', 1),
(138, 'Mauritania', '', 'MRT', 1),
(139, 'Montserrat', '', 'MSR', 1),
(140, 'Malta', '', 'MLT', 1),
(141, 'Mauritius', '', 'MUS', 1),
(142, 'Maldives', '', 'MDV', 1),
(143, 'Malawi', '', 'MWI', 1),
(144, 'Mexico', '', 'MEX', 1),
(145, 'Malaysia', '', 'MYS', 1),
(146, 'Mozambique', '', 'MOZ', 1),
(147, 'Namibia', '', 'NAM', 1),
(148, 'New Caledonia', '', 'NCL', 1),
(149, 'Niger', '', 'NER', 1),
(150, 'Norfolk Island', '', 'NFK', 1),
(151, 'Nigeria', '', 'NGA', 1),
(152, 'Nicaragua', '', 'NIC', 1),
(153, 'Netherlands', '', 'NLD', 1),
(154, 'Norway', '', 'NOR', 1),
(155, 'Nepal', '', 'NPL', 1),
(156, 'Nauru', '', 'NRU', 1),
(157, 'Niue', '', 'NIU', 1),
(158, 'New Zealand (Aotearoa)', '', 'NZL', 1),
(159, 'Oman', '', 'OMN', 1),
(160, 'Panama', '', 'PAN', 1),
(161, 'Peru', '', 'PER', 1),
(162, 'French Polynesia', '', 'PYF', 1),
(163, 'Papua New Guinea', '', 'PNG', 1),
(164, 'Philippines', '', 'PHL', 1),
(165, 'Pakistan', '', 'PAK', 1),
(166, 'Poland', '', 'POL', 1),
(167, 'Saint Pierre and Miquelon', '', 'SPM', 1),
(168, 'Pitcairn', '', 'PCN', 1),
(169, 'Palestinian Territory', '', 'PSE', 1),
(170, 'Portugal', '', 'PRT', 1),
(171, 'Palau', '', 'PLW', 1),
(172, 'Paraguay', '', 'PRY', 1),
(173, 'Qatar', '', 'QAT', 1),
(174, 'Reunion', '', 'REU', 1),
(175, 'Romania', '', 'ROU', 1),
(176, 'Russian Federation', '', 'RUS', 1),
(177, 'Rwanda', '', 'RWA', 1),
(178, 'Saudi Arabia', '', 'SAU', 1),
(179, 'Solomon Islands', '', 'SLB', 1),
(180, 'Seychelles', '', 'SYC', 1),
(181, 'Sudan', '', 'SDN', 1),
(182, 'Sweden', '', 'SWE', 1),
(183, 'Singapore', '', 'SGP', 1),
(184, 'Saint Helena', '', 'SHN', 1),
(185, 'Slovenia', '', 'SVN', 1),
(186, 'Svalbard and Jan Mayen', '', 'SJM', 1),
(187, 'Slovakia', '', 'SVK', 1),
(188, 'Sierra Leone', '', 'SLE', 1),
(189, 'San Marino', '', 'SMR', 1),
(190, 'Senegal', '', 'SEN', 1),
(191, 'Somalia', '', 'SOM', 1),
(192, 'Suriname', '', 'SUR', 1),
(193, 'Sao Tome and Principe', '', 'STP', 1),
(194, 'El Salvador', '', 'SLV', 1),
(195, 'Syria', '', 'SYR', 1),
(196, 'Swaziland', '', 'SWZ', 1),
(197, 'Turks and Caicos Islands', '', 'TCA', 1),
(198, 'Chad', '', 'TCD', 1),
(199, 'French Southern Territories', '', 'ATF', 1),
(200, 'Togo', '', 'TGO', 1),
(201, 'Thailand', '', 'THA', 1),
(202, 'Tajikistan', '', 'TJK', 1),
(203, 'Tokelau', '', 'TKL', 1),
(204, 'Turkmenistan', '', 'TKM', 1),
(205, 'Tunisia', '', 'TUN', 1),
(206, 'Tonga', '', 'TON', 1),
(207, 'Turkey', '', 'TUR', 1),
(208, 'Trinidad and Tobago', '', 'TTO', 1),
(209, 'Tuvalu', '', 'TUV', 1),
(210, 'Taiwan', '', 'TWN', 1),
(211, 'Tanzania', '', 'TZA', 1),
(212, 'Ukraine', '', 'UKR', 1),
(213, 'Uganda', '', 'UGA', 1),
(214, 'Uruguay', '', 'URY', 1),
(215, 'Uzbekistan', '', 'UZB', 1),
(216, 'Saint Vincent and the Grenadines', '', 'VCT', 1),
(217, 'Venezuela', '', 'VEN', 1),
(218, 'Virgin Islands (British)', '', 'VGB', 1),
(219, 'Virgin Islands (U.S.)', '', 'VIR', 1),
(220, 'Viet Nam', '', 'VNM', 1),
(221, 'Vanuatu', '', 'VUT', 1),
(222, 'Wallis and Futuna', '', 'WLF', 1),
(223, 'Samoa', '', 'WSM', 1),
(224, 'Yemen', '', 'YEM', 1),
(225, 'Mayotte', '', 'MYT', 1),
(226, 'South Africa', '', 'ZAF', 1),
(227, 'Zambia', '', 'ZMB', 1),
(228, 'Zaire (former)', '', 'ZAR', 1),
(229, 'Zimbabwe', '', 'ZWE', 1),
(230, 'United States of America', '', 'USA', 1),
(231, 'Afghanistan', 'afghanistan', 'AF', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `from_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reply_to` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email_variables` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_html` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `created`, `modified`, `from_email`, `reply_to`, `name`, `description`, `subject`, `email_content`, `email_variables`, `is_active`, `is_html`) VALUES
(1, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Forgot Password Alert for User', 'Target USMLE -Forgot Password', 'Target USMLE -Forgot Password', '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;There was recently a request to reset the password for your account. If you requested this password change, please click on the following link to reset your password: Click here to reset your password. or If clicking the link does not work, please copy and paste the URL into your browser instead.</p>\r\n\r\n						<p><strong><a href="[PASSCODELINK]">Click here to Reset Password</a></strong></p>\r\n\r\n						<p><b>Note:</b>&nbsp;Your password reset link will be expired after one day.</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(2, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'User Registration Admin', 'Target USMLE - User Registration(Admin)', 'Target USMLE - User Registration(Admin)', '<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,&nbsp;</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Target USMLE Admin has created and activated your account. Login to Target USMLE portal, using the provided Username and password.</p>\r\n\r\n						<p><b>Email ID: </b>[USER_EMAIL]</p>\r\n\r\n						<p><b>Password&nbsp; :</b> [PASSWORD]</p>\r\n\r\n						<p>Please visit our website at [SITE_LINK]</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(4, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'User Registration', 'Target USMLE - User Registration', 'Target USMLE - Registration Success', '<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,&nbsp;</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; Thank you for registering with Us!!.</p>\r\n\r\n                        <p><b>Email ID: </b>[USER_EMAIL]</p>\r\n\r\n						<p>Please visit our website at [SITE_LINK]</p>\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(5, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Reset Password Alert for User', 'Target USMLE - Reset Password', 'Target USMLE - Reset Password', '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITET_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; You have successfully reset your password.</p>\r\n\r\n						<p><strong><a href="[SITE_LINK]">Click here for link</a></strong></p>\r\n\r\n						<p>&nbsp;</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(6, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Change Password Admin', 'Target USMLE - Change Password', 'Target USMLE - change Password', '<table border="0" cellpadding="0" cellspacing="0" xss=removed>\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <table border="1" cellpadding="0" cellspacing="0" xss=removed>\r\n    <tbody>\r\n     <tr>\r\n      <td xss=removed><img alt="[SITET_NAME]" src="[LOGO]" xss=removed></td>\r\n     </tr>\r\n     <tr>\r\n      <td xss=removed>\r\n      <p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n      <p>           Your password has been changed by Admin.</p>\r\n                         <p> Email : [USER_EMAIL] </p>\r\n                         <p> Password : [PASSWORD] </p>\r\n      <p><strong><a href="[SITE_LINK]">Click here for link</a></strong></p>\r\n\r\n      <p> </p>\r\n\r\n      <p>Thanks & Regards,</p>\r\n\r\n      <p><b>[SITE_NAME]</b></p>\r\n      </td>\r\n     </tr>\r\n    </tbody>\r\n   </table>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>', NULL, 1, 1),
(7, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', 'dr.maryjune@targetusmle.com', 'User Timeslot Creation', 'Target USMLE - Course Timeslot', 'Target USMLE - Course Timeslot', '<table border="0" cellpadding="0" cellspacing="0" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <table border="1" cellpadding="0" cellspacing="0" xss="removed">\r\n    <tbody>\r\n     <tr>\r\n      <td xss="removed"><img alt="[SITE_NAME]" src="[LOGO]" xss="removed"></td>\r\n     </tr>\r\n     <tr>\r\n      <td xss="removed">\r\n      <p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n      <p>           Your Timeslot for <strong>[PRODUCT_NAME] </strong>is created.</p>\r\n      [TABLE]\r\n\r\n      <p> </p>\r\n\r\n      <p> </p>\r\n\r\n      <p>Thanks & Regards,</p>\r\n\r\n      <p><b>[SITE_NAME]</b></p>\r\n      </td>\r\n     </tr>\r\n     <tr>\r\n      <td xss="removed"> </td>\r\n     </tr>\r\n    </tbody>\r\n   </table>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>', NULL, 1, 1),
(8, '2017-10-31 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Patient Note Correction Admin Response', 'Target USMLE - Patient Note Correction Corrected Document', 'Target USMLE - Patient Note Correction Corrected Document', '<table border="0" cellpadding="0" cellspacing="0" xss="removed">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <table border="1" cellpadding="0" cellspacing="0" xss="removed">\r\n    <tbody>\r\n     <tr>\r\n      <td xss="removed"><img alt="[SITET_NAME]" src="[LOGO]" xss="removed"></td>\r\n     </tr>\r\n     <tr>\r\n      <td xss="removed">\r\n      <p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n      <p>Please check your the corrected document for patient note correction in the following document link.</p>\r\n\r\n      <p>Click the below link for downloading document</p>\r\n\r\n      <p><strong><a href="[DOCUMENT_LINK]">Link</a></strong></p>\r\n\r\n      <p> </p>\r\n\r\n      <p>Thanks & Regards,</p>\r\n\r\n      <p><b>[SITE_NAME]</b></p>\r\n      </td>\r\n     </tr>\r\n    </tbody>\r\n   </table>\r\n   </td>\r\n  </tr>\r\n </tbody>\r\n</table>', NULL, 1, 1),
(10, '2017-11-17 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'USER FREE SAMPLES', 'Target USMLE - FREE SAMPLES', 'Target USMLE - FREE SAMPLES', '<table border="0" cellpadding="0" cellspacing="0" xss="removed">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" xss="removed">\r\n				<tbody>\r\n					<tr>\r\n						<td xss="removed"><img alt="[SITE_NAME]" src="[LOGO]" xss="removed" /></td>\r\n					</tr>\r\n					<tr>\r\n						<td xss="removed">\r\n						<p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n						<p>Please see the free samples by clicking the following URL.</p>\r\n\r\n						<p>Click Here <strong>[URL]</strong></p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td xss="removed">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_form`
--

CREATE TABLE IF NOT EXISTS `enquiry_form` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `question`, `answer`, `sort_order`, `status`, `created`, `modified`) VALUES
(1, 1, 'What is Step 2 CS?', 'Step 2 CS is basically designed to test your ability to perform in a practical environment. Students are tested on written and verbal skills as well as the ability to carry out physical examinations and taking a proper medical history. With adherence to a few strategies during Step 2 CS preparation, a student will be adequately equipped to tackle the test. - See more at: https://www.targetusmle.com/step-2-cs-preparation.php#sthash.TXxJVhop.dpuf', 0, 1, '2017-10-13 15:43:55', '0000-00-00 00:00:00'),
(2, 1, 'What is in offered?', 'The step 2 cs schedule helps as a guideline for medical graduates and doctors to plan their step 2 cs exam date in such a way that they get their score reports on time to appear for the match. A lot of thought needs to go in while looking at the step 2 cs schedule because the score reporting takes longer than it takes for step 1 or step 2 ck. While everyone wants to pass step 2 cs in the first attempt, some students find themselves missing out on the match because they did not plan on failing the first time! - See more at: https://www.targetusmle.com/step-2-cs-schedule.php#sthash.UKvD1Wr2.dpuf', 0, 1, '2017-10-13 15:45:32', '2017-10-13 15:47:41'),
(3, 2, 'What is ecfmg step 2 cs?', '<p>Ecfmg step 2 cs bulletin is published well ahead of time - the previous year for international medical graduates (IMG) to plan your trip to the USA to take this unique exam. You should plan your exam dates/year according to the current ecfmg step 2 cs bulletin of the year you plan to take the exam</p>', 0, 1, '2017-10-13 15:51:03', '2017-10-16 11:26:47'),
(7, 3, 'How long is the step2 cs exam', 'It happens in 15 mins', 0, 1, '2017-10-16 18:06:56', '0000-00-00 00:00:00'),
(8, 4, 'test', 'test', 0, 1, '2017-10-17 11:56:28', '0000-00-00 00:00:00'),
(9, 5, 'test', 'test', 0, 1, '2017-10-17 11:57:30', '0000-00-00 00:00:00'),
(10, 5, 'test1', 'test1', 0, 1, '2017-10-17 11:57:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE IF NOT EXISTS `faq_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `slug`, `status`, `created`, `modified`) VALUES
(1, 'USMLE Step 2 CS Exam', 'usmle-step-2-cs-exam', 1, '2017-10-13 15:18:31', '0000-00-00 00:00:00'),
(2, 'USMLE Step 2 CS Study Partners', 'usmle-step-2-cs-study-partners', 1, '2017-10-13 15:19:02', '0000-00-00 00:00:00'),
(3, 'USMLE Step 2 Patient Note in 10 mins', 'usmle-step-2-patient-note-in-10-mins', 1, '2017-10-16 18:06:06', '0000-00-00 00:00:00'),
(6, 'test#', 'test-1', 0, '2017-10-17 11:59:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faq_queries`
--

CREATE TABLE IF NOT EXISTS `faq_queries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queries` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` bigint(20) NOT NULL,
  `user_city` bigint(20) NOT NULL,
  `user_skype` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `products` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL,
  `valid_days` int(11) NOT NULL,
  `prod_attr_country` bigint(20) NOT NULL,
  `prod_attr_city` bigint(20) NOT NULL,
  `prod_attr_location` text NOT NULL,
  `prod_attr_location_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `is_extended` tinyint(1) NOT NULL,
  `is_webinar` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_address`, `user_country`, `user_city`, `user_skype`, `user_phone`, `amount`, `products`, `product_type`, `valid_days`, `prod_attr_country`, `prod_attr_city`, `prod_attr_location`, `prod_attr_location_date`, `expiry_date`, `is_extended`, `is_webinar`, `status`, `created`, `modified`) VALUES
(1, 'PN_1_30OCT17', 1, 'hari', 'target', '', '7 , kamaraj street', 96, 1, 'hari.target1990', '789654125', 300, '10', 3, 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, '2017-10-28 00:00:00', '2017-10-30 12:19:29'),
(2, 'PN_2_30OCT17', 2, 'mohammed', 'riaz', '', '15 , kamaraj street', 96, 1, 'mohammed.riaz1988', '9845785487', 300, '10', 3, 0, 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1, '2017-10-28 00:00:00', '2017-10-30 12:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE IF NOT EXISTS `order_history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 -> pending , 2 -> complete d, 3 -> rejected',
  `extended_days` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_type` bigint(20) NOT NULL,
  `attr_title` text NOT NULL,
  `attr_country` bigint(20) NOT NULL,
  `attr_city` bigint(20) NOT NULL,
  `attr_location` varchar(255) NOT NULL,
  `attr_date_time` datetime NOT NULL,
  `valid_days` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE IF NOT EXISTS `order_transaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` text NOT NULL,
  `transaction_info` text NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_type_id` bigint(20) NOT NULL,
  `valid_days` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `slug`, `product_type_id`, `valid_days`, `status`, `created`, `modified`) VALUES
(1, 'Step1', 100, 'step1', 1, 30, 1, '2017-10-24 14:54:19', '2017-10-24 14:54:19'),
(2, 'Step2', 50, 'step2', 1, 30, 1, '2017-10-24 15:41:58', '2017-10-24 15:41:58'),
(3, 'Step3', 50, 'step3', 1, 30, 1, '2017-10-24 15:43:35', '2017-10-24 15:43:35'),
(4, 'Step4', 50, 'step4', 1, 30, 1, '2017-10-24 15:44:16', '2017-10-24 15:44:16'),
(5, 'Step5', 300, 'step5', 1, 30, 1, '2017-10-24 15:44:16', '2017-10-24 15:44:16'),
(6, 'Step6', 500, 'step6', 1, 300000, 1, '2017-10-24 15:44:34', '2017-10-24 15:44:34'),
(7, 'rapid review course', 350, 'rapid-review-course', 10, 0, 1, '2017-10-25 00:00:00', '2017-10-25 12:37:03'),
(8, 'complete comprehensive course', 350, 'complete-comprehensive-course', 9, 0, 1, '2017-10-25 00:00:00', '2017-10-25 12:37:03'),
(9, 'online mock exam', 199, 'online-mock-exam', 5, 0, 1, '2017-10-25 00:00:00', '2017-10-25 12:37:03'),
(10, 'patient note correction', 250, 'patient-note-correction', 3, 0, 1, '2017-10-25 00:00:00', '2017-10-25 12:37:03'),
(11, 'assesement preparation', 100, 'assesement-preparation', 2, 0, 1, '2017-10-25 00:00:00', '2017-10-25 12:37:03'),
(12, 'cs_handbook', 25, 'cs-handbook', 11, 30, 1, '2017-10-31 00:00:00', '2017-10-31 12:37:03'),
(14, 'live_mock_exam_Kodambakam', 900, 'live_mock_exam_kodambakam', 6, 0, 1, '2017-11-08 00:44:28', '0000-00-00 00:00:00'),
(15, 'live_mock_exam_Houston', 950, 'live_mock_exam_houston', 6, 0, 1, '2017-11-08 00:28:24', '0000-00-00 00:00:00'),
(16, 'live_mock_exam_Mugapeir', 850, 'live_mock_exam_mugapeir', 6, 0, 1, '2017-11-08 00:29:39', '0000-00-00 00:00:00'),
(17, 'live_mock_exam_Kodambakam', 999, 'live_mock_exam_kodambakam-1', 6, 0, 0, '2017-11-08 00:45:46', '0000-00-00 00:00:00'),
(18, 'Silver', 200, 'silver', 7, 0, 1, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(19, 'Gold', 250, 'gold', 7, 0, 1, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(20, 'Diamond', 300, 'diamond', 7, 0, 1, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(21, 'Platinum', 400, 'platinum', 7, 0, 1, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(22, '15 days', 99, '15-days', 8, 0, 1, '2017-11-10 00:00:00', '2017-11-10 12:37:03'),
(23, '30 days', 147, '30-days', 8, 0, 1, '2017-11-10 00:00:00', '2017-11-10 12:37:03'),
(24, '60 days', 197, '60-days', 8, 0, 1, '2017-11-10 00:00:00', '2017-11-10 12:37:03'),
(25, '90 days', 250, '90-days', 8, 0, 1, '2017-11-10 00:00:00', '2017-11-10 12:37:03'),
(29, 'webinar1', 45, 'webinar1', 4, 0, 1, '2017-11-10 15:48:32', '0000-00-00 00:00:00'),
(30, 'webinar2', 50, 'webinar2', 4, 0, 1, '2017-11-10 15:49:24', '0000-00-00 00:00:00'),
(32, 'webinar4', 55, 'webinar4', 4, 0, 1, '2017-11-10 15:51:15', '0000-00-00 00:00:00'),
(33, 'webinar5', 200, 'webinar5', 4, 0, 1, '2017-11-10 15:51:51', '0000-00-00 00:00:00'),
(35, 'WebGrp 1', 240, 'webgrp-1', 12, 0, 1, '2017-11-10 15:53:13', '0000-00-00 00:00:00'),
(42, 'live_mock_exam_chennai', 54, 'live_mock_exam_chennai', 6, 0, 1, '2017-11-15 12:48:48', '0000-00-00 00:00:00'),
(43, 'live_mock_exam_@##', 54, 'live_mock_exam_', 6, 0, 1, '2017-11-15 12:49:22', '0000-00-00 00:00:00'),
(44, 'live_mock_exam_chennai', 54, 'live_mock_exam_chennai-1', 6, 0, 1, '2017-11-15 12:52:32', '0000-00-00 00:00:00'),
(45, 'live_mock_exam_vellore', 65, 'live_mock_exam_vellore', 6, 0, 1, '2017-11-15 12:53:04', '0000-00-00 00:00:00'),
(46, 'live_mock_exam_chennai', 77, 'live_mock_exam_chennai-2', 6, 0, 1, '2017-11-15 12:53:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE IF NOT EXISTS `product_attributes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `content_one` text NOT NULL,
  `content_two` text NOT NULL,
  `content_three` text NOT NULL,
  `content_four` text NOT NULL,
  `content_five` text NOT NULL,
  `video_url` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_included` varchar(255) NOT NULL,
  `included_valid_days` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `content_one`, `content_two`, `content_three`, `content_four`, `content_five`, `video_url`, `image`, `product_included`, `included_valid_days`, `created`, `modified`) VALUES
(1, 1, 'Full 15 min Encounter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', 'NULL', 'https://www.youtube.com/embed/xg56hxkqmII', 'step6-bot-bg.png', '', 0, '2017-10-24 14:57:48', '2017-10-24 14:57:48'),
(2, 2, 'Patient Notes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', 'NULL', 'https://www.youtube.com/embed/gp2k3OHGep8', 'step6-bot-bg1.png', '', 0, '2017-10-24 15:42:32', '2017-10-24 15:42:32'),
(3, 3, 'Physical Exam Videos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', 'NULL', 'https://www.youtube.com/embed/gp2k3OHGep8', 'step6-bot-bg2.png', '', 0, '2017-10-24 15:45:22', '2017-10-24 15:45:22'),
(4, 4, 'Differential Diagnosis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', 'NULL', 'https://www.youtube.com/embed/J_PxO4f017E', 'step6-bot-bg3.png', '', 0, '2017-10-24 15:45:22', '2017-10-24 15:45:22'),
(5, 5, 'Full 15 min Encounter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', 'NULL', 'https://www.youtube.com/embed/fkswWHoNXIg', 'step6-bot-bg4.png', '', 0, '2017-10-24 15:46:16', '2017-10-24 15:46:16'),
(6, 6, 'Patient Notes tested', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'dsdsdsd', 'NULL', 'NULL', 'https://www.youtube.com/embed/Fd4ykED4SQA', 'step6-bot-bg5.png', '', 0, '2017-10-24 15:46:16', '2017-10-24 15:46:16'),
(7, 7, 'Rapid Review Course (RRC) 1-2 Weeks', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'NULL', 'NULL', 'http://www.youtube.com', 'topsure(250*50).png', '6,5,4,3,2,1', 30, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(8, 8, 'Complete Comprehensive Course (CCC) 3-4 Weeks', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'NULL', 'NULL', 'http://www.youtube.com', 'New-Years-2017-banner.jpg', '12,6,5,4,3,2,1', 30, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(9, 11, 'Asses My Preparation', 'Onspot Assesment on your preparation', '. Present Case\r\n. Patient Note\r\n. Critique\r\n. Note Correction', 'NULL', 'NULL', 'http://www.youtube.com', '', '', 0, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(10, 10, 'Patient Note Correction', 'Lorem Ipsum Dolor?\r\n - Present a case in 15 min\r\n - Type patient note live', 'BOOK YOUR TIMESLOT\r\nLorem ipsum', 'NULL', 'NULL', 'http://www.youtube.com/watch?evax8d', 'banner2.jpg', '', 0, '2017-10-31 17:46:16', '2017-10-31 18:46:16'),
(11, 9, 'Online Mock Exam', 'Lets say you have prepared on your own...', 'Each Case..', 'Practice Three cases back to back...', 'Bottom content...', 'http://www.youtube.com/ewatch', 'view3.png', '', 0, '2017-11-02 17:46:16', '2017-11-02 18:46:16'),
(12, 12, 'CS Handbook', '<h2>Why Should Pick Up The CS Handbook?</h2>\r\n      <ul>\r\n       <li>I am looking for a simple organized approach to CS</li>\r\n       <li>I want to be confident to present ANY case in the CS exam</li>\r\n       <li>I need to be organized in my approach to the patient during the 15 min encounter</li>\r\n       <li>I just need the essentials & not the  extraneous clutter out there.</li>\r\n       <li>I have very little time before my exam & need a quick read</li>\r\n       <li>I need to write a good patient note & pass ICE first time</li>\r\n       <li>If I need tips to crack  SEP, CIS, challenging situations and beat the time factor</li>\r\n       <li>If you said ‘Yes’ to any of the above click below</li>\r\n      </ul>', '<h2>Clinical Skills Director Johns Hopkins</h2>\r\n    <p>"Dr. June''s personal one on one coaching helped me to focuson my individual deficits in the preparation for \r\n    the exam. The mock session at the Chennai test centre was conducted in an impeccable manner. The SPs were well trained and it  simulated the actual exam"</p>', 'Practice Three cases back to back...', 'Bottom content...', 'https://www.youtube.com/embed/6y6p8XfoUP4', 'cs_handbook.png', '', 0, '2017-11-02 17:46:16', '2017-11-02 18:46:16'),
(13, 18, 'Silver', '<ul> 										<li>Cs Book+</li> 										<li>Video tutorials</li> 										<li>(30 day access)</li> 									</ul>', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '12,1,2,3,4,5,6', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(14, 19, 'Gold', '<ul> 										<li>Cs Book+</li> 										<li>CS Video Tutorials+</li> 										<li>Assess My Prep</li> 									</ul>', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '12,1,2,3,4,5,6,2', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(15, 20, 'Diamond', '<ul> 										<li>CS Handbook+</li> 										<li>CSVideo Tutorials+</li> 										<li>Patient Note Correction</li> 										<li>(live Online)</li> 									</ul>', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '12,1,2,3,4,5,6,10', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(16, 21, 'Platinum', '<ul> 										\r\n<li>CS Handbook+</li> 										\r\n<li>CSVideo Tutorials+</li> 										\r\n<li>Online Mock Exam</li> 										\r\n<li>(3 cases)</li> 									\r\n</ul>', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '12,6,5,4,3,2,1,9', 90, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(27, 22, '15 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(28, 23, '30 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(29, 24, '60 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(30, 25, '90 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(33, 34, 'What you will learn', 'If you...', 'Attend all..', '', '', '', '', '29,31,33', 0, '2017-11-10 15:52:24', '0000-00-00 00:00:00'),
(34, 35, 'What you will learn', 'If you...', 'Attend all...', '', '', '', '', '29,32,33', 0, '2017-11-10 15:53:13', '0000-00-00 00:00:00'),
(35, 39, 'skdfh', 'gfh#$%%', 'gfh#$%%', '', '', '', '', '31', 0, '2017-11-15 12:20:47', '0000-00-00 00:00:00'),
(36, 40, 'reter', 'wrr', 'rfwer', '', '', '', '', '30', 0, '2017-11-15 12:24:22', '0000-00-00 00:00:00'),
(37, 41, 'sds', 'dfsf', 'sff', '', '', '', '', '30', 0, '2017-11-15 12:26:27', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes_bk`
--

CREATE TABLE IF NOT EXISTS `product_attributes_bk` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `content_one` text NOT NULL,
  `content_two` text NOT NULL,
  `content_three` text NOT NULL,
  `content_four` text NOT NULL,
  `content_five` text NOT NULL,
  `video_url` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_included` varchar(255) NOT NULL,
  `included_valid_days` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `product_attributes_bk`
--

INSERT INTO `product_attributes_bk` (`id`, `product_id`, `content_one`, `content_two`, `content_three`, `content_four`, `content_five`, `video_url`, `image`, `product_included`, `included_valid_days`, `created`, `modified`) VALUES
(1, 1, 'Full 15 min Encounter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', 'NULL', 'NULL', '', 'http://www.youtube.com', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/online-video/steps/child3.jpg', '', 0, '2017-10-24 14:57:48', '2017-10-24 14:57:48'),
(2, 2, 'Patient Notes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', '', '', '', '', '0', '', 0, '2017-10-24 15:42:32', '2017-10-24 15:42:32'),
(3, 3, 'Physical Exam Videos', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', '', '', '', '', '0', '', 0, '2017-10-24 15:45:22', '2017-10-24 15:45:22'),
(4, 4, 'Differential Diagnosis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', '', '', '', '', '', '', 0, '2017-10-24 15:45:22', '2017-10-24 15:45:22'),
(5, 5, 'Full 15 min Encounter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', '', '', '', '', '', '', 0, '2017-10-24 15:46:16', '2017-10-24 15:46:16'),
(6, 6, 'Patient Notes tested', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'dsdsdsd', 'NULL', 'NULL', 'http://www.hello.com', '', '', 0, '2017-10-24 15:46:16', '2017-10-24 15:46:16'),
(7, 7, 'Rapid Review Course (RRC) 1-2 Weeks', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'NULL', 'NULL', 'NULL', 'topsure(250*50).png', '6,5,4,3,2,1', 30, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(8, 8, 'Complete Comprehensive Course (CCC) 3-4 Weeks', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque', 'penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.kathir', 'NULL', 'NULL', 'NULL', 'New-Years-2017-banner.jpg', '12,6,5,4,3,2,1', 30, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(9, 11, 'Asses My Preparation', 'Onspot Assesment on your preparation', '. Present Case\r\n. Patient Note\r\n. Critique\r\n. Note Corrections', 'NULL', 'NULL', 'NULL', '', '', 0, '2017-10-31 15:46:16', '2017-10-31 15:46:16'),
(10, 10, 'Patient Note Correction', 'Lorem Ipsum Dolor?\r\n - Present a case in 15 min\r\n - Type patient note live', 'BOOK YOUR TIMESLOT\r\nLorem ipsum', 'NULL', 'NULL', 'http://www.youtube.com/watch?evax8d', 'banner2.jpg', '', 0, '2017-10-31 17:46:16', '2017-10-31 18:46:16'),
(11, 9, 'Online Mock Exam', 'Lets say you have prepared on your own...', 'Each Case..', 'Practice Three cases back to back...', 'Bottom content...', 'http://www.youtube.com/ewatch', 'view3.png', '', 0, '2017-11-02 17:46:16', '2017-11-02 18:46:16'),
(12, 12, 'CS Handbook', 'Lets say you have prepared on your own...', 'Each Case..', 'Practice Three cases back to back...', 'Bottom content...', 'http://www.youtube.com/watch?evax8d', 'cs_handbook.png', '', 0, '2017-11-02 17:46:16', '2017-11-02 18:46:16'),
(13, 18, 'Silver', '<ul> 										<li>Cs Book+</li> 										<li>Video tutorials</li> 										<li>(30 day access)</li> 									</ul>', '', '', '', '', '', '12,1,2,3,4,5,6', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(14, 19, 'Gold', '<ul> 										<li>Cs Book+</li> 										<li>CS Video Tutorials+</li> 										<li>Assess My Prep</li> 									</ul>', '', '', '', '', '', '12,1,2,3,4,5,6,2', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(15, 20, 'Diamond', '<ul> 										<li>CS Handbook+</li> 										<li>CSVideo Tutorials+</li> 										<li>Patient Note Correction</li> 										<li>(live Online)</li> 									</ul>', '', '', '', '', '', '12,1,2,3,4,5,6,10', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(16, 21, 'Platinum', '<ul> 										<li>CS Handbook+</li> 										<li>CSVideo Tutorials+</li> 										<li>Online Mock Exam</li> 										<li>(3 cases)</li> 									</ul>', '', '', '', '', '', '12,1,2,3,4,5,6,9', 30, '2017-11-08 00:00:00', '2017-11-08 00:00:00'),
(27, 22, '15 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(28, 23, '30 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(29, 24, '60 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16'),
(30, 25, '90 Days', 'NULL', 'NULL', 'NULL', 'NULL', 'http://www.youtube.com', '', '6,5,4,3,2,1', 30, '2017-11-10 15:46:16', '2017-11-10 15:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_mock_exam`
--

CREATE TABLE IF NOT EXISTS `product_mock_exam` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `type` enum('Online','Live','','') NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `location` text NOT NULL,
  `date_time` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product_mock_exam`
--

INSERT INTO `product_mock_exam` (`id`, `product_id`, `type`, `country_id`, `city_id`, `location`, `date_time`, `created`, `modified`) VALUES
(7, 14, 'Live', 96, 1, 'Kodambakam', '2017-12-02 00:00:00', '2017-11-08 00:24:56', '2017-11-08 00:44:28'),
(8, 15, 'Live', 230, 4, 'Houston', '2017-11-01 00:00:00', '2017-11-08 00:28:24', '2017-11-08 11:58:24'),
(9, 16, 'Live', 96, 1, 'Mugapeir', '2017-11-18 00:00:00', '2017-11-08 00:29:39', '2017-11-08 11:59:39'),
(10, 42, 'Live', 96, 7, 'chennai', '2017-11-15 00:00:00', '2017-11-15 12:48:48', '0000-00-00 00:00:00'),
(11, 43, 'Live', 96, 7, '@##', '2017-11-15 00:00:00', '2017-11-15 12:49:22', '0000-00-00 00:00:00'),
(12, 44, 'Live', 96, 7, 'chennai', '2017-11-23 00:00:00', '2017-11-15 12:52:32', '0000-00-00 00:00:00'),
(13, 45, 'Live', 56, 12, 'vellore', '2017-11-15 00:00:00', '2017-11-15 12:53:04', '0000-00-00 00:00:00'),
(14, 46, 'Live', 96, 7, 'chennai', '2017-11-16 00:00:00', '2017-11-15 12:53:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_mock_exam_available`
--

CREATE TABLE IF NOT EXISTS `product_mock_exam_available` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `product_mock_exam_id` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc_content`
--

CREATE TABLE IF NOT EXISTS `product_pnc_content` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `text_one` text NOT NULL,
  `text_two` text NOT NULL,
  `diagnosis_one_title` text NOT NULL,
  `diagnosis_two_title` text NOT NULL,
  `diagnosis_three_title` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_pnc_content`
--

INSERT INTO `product_pnc_content` (`id`, `user_id`, `order_id`, `text_one`, `text_two`, `diagnosis_one_title`, `diagnosis_two_title`, `diagnosis_three_title`, `created`, `modified`) VALUES
(1, 1, 'PN_1_30OCT17', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Diagnosis 1', 'Diagonis 2', 'Diagnosis 3', '2017-10-29 00:00:00', '2017-10-30 11:59:44'),
(2, 2, 'PN_2_28OCT17', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Diagnosis 1', 'Diagnosis 2', 'Diagnosis 3', '2017-10-29 00:00:00', '2017-10-30 12:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc_diagnosis`
--

CREATE TABLE IF NOT EXISTS `product_pnc_diagnosis` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_pnc_content_id` bigint(20) NOT NULL,
  `diagnosis_type` enum('one','two','three') NOT NULL,
  `text_one` text NOT NULL,
  `text_two` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `product_pnc_diagnosis`
--

INSERT INTO `product_pnc_diagnosis` (`id`, `product_pnc_content_id`, `diagnosis_type`, `text_one`, `text_two`) VALUES
(1, 1, 'one', 'Loren', 'ipsum'),
(2, 1, 'one', 'Loren', 'ipsum'),
(3, 1, 'two', 'Lorem', 'ipsum'),
(4, 1, 'two', 'Lorem', 'ipsum'),
(5, 1, 'two', 'Lorem', 'ipsum'),
(6, 1, 'three', 'Lorem', 'ipsum'),
(7, 1, '', 'Lorem ipsum', ''),
(9, 3, 'one', 'Loren', 'ipsum'),
(10, 3, 'one', 'Loren', 'ipsum'),
(11, 3, 'two', 'Lorem', 'ipsum'),
(12, 3, 'three', 'Lorem', 'ipsum'),
(13, 3, 'three', 'Lorem', 'ipsum'),
(14, 3, 'three', 'Lorem', 'ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc_submit_list`
--

CREATE TABLE IF NOT EXISTS `product_pnc_submit_list` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_pnc_content_id` bigint(20) NOT NULL,
  `attachment_dir` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `attachment_id` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `product_pnc_submit_list`
--

INSERT INTO `product_pnc_submit_list` (`id`, `user_id`, `order_id`, `product_pnc_content_id`, `attachment_dir`, `attachment`, `attachment_id`, `status`, `is_read`, `created`, `modified`) VALUES
(1, 1, 'PN_1_30OCT17', 1, 'appdata/patient_note_correction/document/', 'Sample-doc-file-200kb.doc', 'Sample-doc-file-200kb.doc_1509448091', 2, 0, '2017-10-28 00:00:00', '2017-10-30 12:39:49'),
(3, 2, 'PN_2_30OCT17', 2, 'appdata/patient_note_correction/document/', 'ecommerce1.docx', 'ecommerce1.docx_1509600677', 2, 0, '2017-10-28 00:00:00', '2017-10-30 12:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_step_categories`
--

CREATE TABLE IF NOT EXISTS `product_step_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `ideal_pdf` varchar(255) NOT NULL,
  `corrected_pdf` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=193 ;

--
-- Dumping data for table `product_step_categories`
--

INSERT INTO `product_step_categories` (`id`, `product_id`, `name`, `slug`, `parent`, `description`, `image`, `ideal_pdf`, `corrected_pdf`, `sort_order`, `status`, `is_deleted`, `created`, `modified`) VALUES
(3, 1, '10 kick starters', '10-kick-starters', 0, '', '', '', '', 1, 1, 0, '2017-11-13 02:37:42', '2017-11-13 03:01:04'),
(4, 1, 'HPI', 'hpi', 0, '', '', '', '', 2, 1, 0, '2017-11-13 02:38:02', '2017-11-13 02:38:02'),
(5, 1, 'PAM Huugs Foss', 'pam-huugs-foss', 0, '', '', '', '', 3, 1, 0, '2017-11-13 02:38:22', '2017-11-13 02:38:22'),
(6, 1, 'Summary', 'summary', 0, '', '', '', '', 4, 1, 0, '2017-11-13 02:38:35', '2017-11-13 02:38:35'),
(7, 1, 'GE / PE', 'ge-pe', 0, '', '', '', '', 5, 1, 0, '2017-11-13 02:38:49', '2017-11-13 02:38:49'),
(8, 1, 'Closure', 'closure', 0, '', '', '', '', 6, 1, 0, '2017-11-13 02:39:06', '2017-11-13 02:39:06'),
(9, 2, 'Cardio', 'cardio', 0, '', '', '', '', 1, 1, 0, '2017-11-13 02:40:11', '2017-11-13 02:40:11'),
(10, 2, 'Respi', 'respi', 0, '', '', '', '', 2, 1, 0, '2017-11-13 02:40:28', '2017-11-13 02:40:28'),
(11, 2, 'Abdomen', 'abdomen', 0, '', '', '', '', 3, 1, 0, '2017-11-13 02:40:46', '2017-11-13 02:40:46'),
(12, 2, 'OBS / GYN', 'obs-gyn', 0, '', '', '', '', 4, 1, 0, '2017-11-13 02:41:03', '2017-11-13 02:41:03'),
(13, 2, 'Joint', 'joint', 0, '', '', '', '', 5, 1, 0, '2017-11-13 02:41:27', '2017-11-13 02:41:27'),
(14, 2, 'Nervous', 'nervous', 0, '', '', '', '', 6, 1, 0, '2017-11-13 02:41:46', '2017-11-13 02:41:46'),
(15, 2, 'Heent', 'heent', 0, '', '', '', '', 7, 1, 0, '2017-11-13 02:42:04', '2017-11-13 02:42:04'),
(16, 2, 'PAED', 'paed', 0, '', '', '', '', 8, 1, 0, '2017-11-13 02:42:21', '2017-11-13 02:42:21'),
(17, 2, 'PSYC', 'psyc', 0, '', '', '', '', 9, 1, 0, '2017-11-13 02:42:47', '2017-11-13 02:42:47'),
(18, 3, 'Cardio', 'cardio-1', 0, '', '', '', '', 1, 1, 0, '2017-11-13 03:19:20', '2017-11-13 03:19:20'),
(19, 3, 'Respi ', 'respi-1', 0, '', '', '', '', 2, 1, 0, '2017-11-13 03:19:48', '2017-11-13 03:19:48'),
(20, 3, 'Abdomen ', 'abdomen-1', 0, '', '', '', '', 3, 1, 0, '2017-11-13 03:20:27', '2017-11-13 03:20:27'),
(21, 3, 'Heent', 'heent-1', 0, '', '', '', '', 4, 1, 0, '2017-11-13 03:20:42', '2017-11-13 03:20:42'),
(22, 3, 'Nervous', 'nervous-1', 0, '', '', '', '', 5, 1, 0, '2017-11-13 03:20:57', '2017-11-13 03:20:57'),
(23, 3, 'Joint', 'joint-1', 0, '', '', '', '', 6, 1, 0, '2017-11-13 03:21:16', '2017-11-13 03:21:16'),
(24, 3, 'Fatigue - Full case', 'fatigue-full-case', 0, '', '', '', '', 7, 1, 0, '2017-11-13 03:21:40', '2017-11-13 03:21:52'),
(25, 3, 'Challenging Scenarios', 'challenging-scenarios', 0, '', '', '', '', 8, 1, 0, '2017-11-13 03:22:08', '2017-11-13 03:22:08'),
(26, 3, 'Misc Videos', 'misc-videos', 0, '', '', '', '', 9, 1, 0, '2017-11-13 03:22:23', '2017-11-13 03:22:23'),
(27, 3, 'Special Videos', 'special-videos', 0, '', '', '', '', 10, 1, 0, '2017-11-13 03:22:37', '2017-11-13 03:22:37'),
(28, 4, 'Cardio', 'cardio-2', 0, '', '', '', '', 1, 1, 0, '2017-11-13 03:23:57', '2017-11-13 03:23:57'),
(29, 4, 'Chest Pain', 'chest-pain', 28, '', '', '', '', 2, 1, 0, '2017-11-13 03:24:27', '2017-11-13 03:24:27'),
(30, 4, 'Myocardial Infaraction / Angina', 'myocardial-infaraction-angina', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>Chest Pain related to exertion / strevnuous work</p></td>\r\n   <td><p>No local tenderness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Location: precordium/left arm radiating pain</p></td>\r\n   <td><p>Breathlessness+</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Quality of Pain : Crushing, squeezing, dull/sore</p></td>\r\n   <td><p>Sweating+</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Nausea/Vomiting</p></td>\r\n   <td><p>cold peripheries/cyanosis</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sweating</p></td>\r\n   <td><p>Anxiousness + (sense of impending doom)</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>High Cholesterolemia, HT, DM (predisposing)</p></td>\r\n   <td><p>VItals: High blood pressure (or known HT)</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>May have breathlessness, syncopal attack, palpitations</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Social history: Chronic Smoker (predisposing), Cocaine use</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 1, 1, 0, '2017-11-13 03:25:25', '2017-11-16 07:13:37'),
(31, 4, 'Costochondritis', 'costochondritis', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>History of pain on touching the spot</p></td>\r\n   <td><p>Tenderness at local spot</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Pain increases on movement and breathing</p></td>\r\n   <td><p>Pain on movement of thorax or deep breathing</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Associated redness</p></td>\r\n   <td><p>Redness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Local Warmth</p></td>\r\n   <td><p>Local warmth</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Fever</p></td>\r\n   <td><p>Fever (Vital signs)</p></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>\r\n\r\n', '', '', '', 2, 1, 0, '2017-11-13 03:25:50', '2017-11-16 07:17:10'),
(32, 4, 'Gerd', 'gerd', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>History of epigastric pain radiating to chest</p></td>\r\n   <td><p>Epigastric tenderness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Worsened by food intake - late night meals, caffeine</p></td>\r\n   <td><p>Rebound tenderness +</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Regurgitation of food into mouth</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Usually obese patient</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sore throat, hoarseness, cough</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 03:26:02', '2017-11-16 07:20:01'),
(33, 4, 'Pleuritic Pain', 'pleuritic-pain', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>Localized sharp pain</p></td>\r\n   <td><p>Location: Localized pain increased on cough/ deep inspiration </p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>History of chest pain  on coughing /inspiration</p></td>\r\n   <td><p>Quality: Sharp</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Breathlessness</p></td>\r\n   <td><p>Breathlessness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>H/O  of possible fever, cough, sputum production, hemoptysis </p></td>\r\n   <td><p>Fever (Vital signs)</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>H/o chronic smoking</p></td>\r\n   <td><p>No local tenderness </p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p></p></td>\r\n   <td><p>Restriction of chest movement on the side of pain (Inspection)</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p></p></td>\r\n   <td><p>Tracheal deviation (possibly in real patient not SP)</p></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 03:26:28', '2017-11-16 07:24:22'),
(34, 4, 'Musculoskeletal - Ribs - Myalgia', 'musculoskeletal-ribs-myalgia', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>H/o of injury/fall</p></td>\r\n   <td><p>Tenderness at local spot </p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>History of pain on touching the spot</p></td>\r\n   <td><p>Redness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>pain increases on movement and breathing</p></td>\r\n   <td><p>Warmth</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Associated redness </p></td>\r\n   <td><p>Swelling</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Warmth</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  \r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 03:27:18', '2017-11-16 07:28:28'),
(35, 4, 'Pericarditis', 'pericarditis', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>History of fever</p></td>\r\n   <td><p>Precordial chest pain </p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>History of recent infection (URI)</p></td>\r\n   <td><p>Quality of pain –sharp stabbing chest pain</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Patient feels relieved of pain on leaning forward/sitting up</p></td>\r\n   <td><p>Low grade fever</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Increase pain on lying down flat /deep inhalation </p></td>\r\n   <td><p>Pericardial rub</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Pain increases on inspiration</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  \r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 6, 1, 0, '2017-11-13 03:29:30', '2017-11-16 07:30:51'),
(36, 4, 'Aortic Dissection', 'aortic-dissection', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>Known Hypertensive </p></td>\r\n   <td><p>Hypotension</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sharp tearing  pain  down the spine /back</p></td>\r\n   <td><p>Unequal blood pressure between arms</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Syncopal attack (LOC)</p></td>\r\n   <td><p>Weak pulse in one arm compared to the other</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Shortness of breath</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sweating</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sudden loss of vision, weakness/paralysis of one side of body like stroke</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  \r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-13 03:29:57', '2017-11-16 07:33:14'),
(37, 4, 'Pulmonary Embolism', 'pulmonary-embolism', 29, '<div class="bot">\r\n<table>\r\n <tbody>\r\n  <tr>\r\n   <td><p>History of prolonged immobilisation (travel)</p></td>\r\n   <td><p>Breathlessness</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>History of calf muscle pain</p></td>\r\n   <td><p>Tachycardia</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Sudden onset chest pain increased on exertion and deep breath, NOT relieved on rest</p></td>\r\n   <td><p>Sweating</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Shortness of breath</p></td>\r\n   <td><p>Signs of hypoxia</p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Cough with blood tinged sputum</p></td>\r\n   <td><p></p></td>\r\n  </tr>\r\n  <tr>\r\n   <td><p>Swelling of one leg / bluish discoloration </p></td>\r\n   <td><p>Swelling of leg /bluish discoloration</p></td>\r\n  </tr>\r\n  \r\n </tbody>\r\n</table>\r\n</div>', '', '', '', 8, 1, 0, '2017-11-13 03:30:23', '2017-11-16 07:35:29'),
(38, 4, 'Palpitations', 'palpitations', 28, '', '', '', '', 3, 1, 0, '2017-11-13 03:31:01', '2017-11-13 03:31:01'),
(39, 4, 'Arrhythmia', 'arrhythmia', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Racing of heart/fluttering in the chest</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious patient</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>LOC/Near fainting</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoeic</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:31:30', '2017-11-17 12:09:27'),
(40, 4, 'Myocardial Infaraction/Angina', 'myocardial-infaractionangina', 38, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious patient</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypneic +/- </p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Nausea</p>\r\n			</td>\r\n			<td>\r\n			<p>Weak peripheral pulse/ cyanosis /cold peripheries</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Vomiting</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sweating </p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating +</p>\r\n			</td>\r\n		</tr>\r\n			<td>\r\n			<p>Radiation of Pain to L arm</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals : High BP ( or know HT)</p>\r\n			</td>\r\n		</tr>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 03:31:55', '2017-11-17 12:15:17'),
(41, 4, 'Anemia', 'anemia', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>Racing of heart</p>\r\n			</td>\r\n			<td>\r\n			<p>Pallor</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Koilonychia</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Shortness of breath (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoeic</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 3, 1, 0, '2017-11-13 03:32:18', '2017-11-17 12:50:46'),
(42, 4, 'Hyperthyroidism', 'hyperthyroidism', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n				<tr>\r\n			<td>\r\n			<p>Heat intolerance</p>\r\n			</td>\r\n			<td>\r\n			<p>Tremors of outstretched hand</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Tremors of hands</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sweaty skin</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweaty skin</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Visual disturbances</p>\r\n			</td>\r\n			<td>\r\n			<p>Exopthalmos</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Diarrhea</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Weight loss despite increased appetite</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 4, 1, 0, '2017-11-13 03:32:46', '2017-11-17 12:49:30'),
(43, 4, 'Hypoglycemia', 'hypoglycemia', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		\r\n		<tr>\r\n			<td>\r\n			<p>Diabetic on Rx</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered sensorium</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweaty skin</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxiety</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Tremors/Shakiness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Hunger</p>\r\n			</td>\r\n			<td>\r\n			<p>Tremors</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Irritability or moodiness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Headache</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 5, 1, 0, '2017-11-13 03:33:20', '2017-11-17 12:50:13'),
(44, 4, 'Panick Attack', 'panick-attack', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fear/apprehension about a certain thing</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Rapid breathing</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnea\r\n</p>\r\n			</td>\r\n		</tr>\r\n			</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 6, 1, 0, '2017-11-13 03:33:49', '2017-11-17 12:55:46'),
(45, 4, 'Caffeine Toxicity', 'caffeine-toxicity', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>H/o excessive coffee intake</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 7, 1, 0, '2017-11-13 03:34:24', '2017-11-17 12:44:13'),
(46, 4, 'Pheochromocytoma', 'pheochromocytoma', 38, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n\r\n		<tr>\r\n			<td>\r\n			<p>Rapid heart rate</p>\r\n			</td>\r\n			<td>\r\n			<p>High blood pressure</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Profound sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Abdominal pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness abdomen</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Sudden-onset headaches (varying duration)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Pale skin</p>\r\n			</td>\r\n			<td>\r\n			<p>pale skin</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 8, 1, 0, '2017-11-13 03:34:59', '2017-11-17 12:52:05'),
(47, 4, 'Breathlessness / SOB', 'breathlessness-sob', 28, '', '', '', '', 4, 1, 0, '2017-11-13 03:35:32', '2017-11-13 03:36:41'),
(48, 4, 'Cardiac', 'cardiac', 49, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Progressive breathlessness/exertional dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>General Exam: Dyspnoea/Cyanosis/ Elevated JVP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of Paroxysmal Noctural Dynspnoea or Orthopnea</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals: High BP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough -Frothy sputum +/- blood</p>\r\n			</td>\r\n			<td>\r\n			<p>Frothy /blood tinged sputum</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of feet</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of feet – pitting pedal edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs: creptitations both lung bases</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O of existing heart/valvular disease, high BP (known hypertensive), Ischemic heart disease</p>\r\n			</td>\r\n			<td>\r\n			<p>Heart: Evidence of valvular disease eg. Murmurs, loud S1 etc</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Distention of abdomen</p>\r\n			</td>\r\n			<td>\r\n			<p>Hepatospenomegaly (Right heart failure)Ascites</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 1, 1, 0, '2017-11-13 03:37:34', '2017-11-17 02:30:45'),
(49, 4, 'Congestive Heart Failure - CHF', 'congestive-heart-failure-chf', 48, '', '', '', '', 1, 1, 0, '2017-11-13 03:38:02', '2017-11-13 03:38:02'),
(50, 4, 'Pulmonary Embolism', 'pulmonary-embolism-1', 48, '', '', '', '', 2, 1, 0, '2017-11-13 03:38:30', '2017-11-13 03:38:30'),
(51, 4, 'Respiratory', 'respiratory', 47, '', '', '', '', 2, 1, 0, '2017-11-13 03:38:56', '2017-11-17 02:39:15'),
(52, 4, 'Lung Infections', 'lung-infections', 51, '', '', '', '', 1, 1, 1, '2017-11-13 03:39:36', '2017-11-13 03:39:36'),
(53, 4, 'COPD', 'copd', 51, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Exertional dyspnoea or dyspnoea at rest</p>\r\n			</td>\r\n			<td>\r\n			<p>General Exam: Dyspnoeic, Respiratory rate elevated, Accessary muscles of respiration in use</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chronic smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>Chest expanded in A-P diameter (barrel chest)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chronic Cough with expectoration</p>\r\n			</td>\r\n			<td>\r\n			<p>Hyperresonant percussion note ( emphysema)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Prolonged expiration (maybe asstd. wheezing)</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of bronchitis /bronchospasm(wheeze, few creps)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cyanosis ( advanced cases)</p>\r\n			</td>\r\n			<td>\r\n			<p>Cyanosis\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 03:39:54', '2017-11-17 05:04:26'),
(54, 4, 'Asthma', 'asthma', 51, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Acute, episodic breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>Dysnoea, use of accessory muscles of breathing</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs : Wheeze ( rhonchi+)</p>\r\n			</td>\r\n		</tr\r\n<tr>\r\n			<td>\r\n			<p>Cough with expectoration</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr\r\n<tr>\r\n			<td>\r\n			<p>Thick white plug like sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr\r\n<tr>\r\n			<td>\r\n			<p>Tremors/Shakiness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 3, 1, 0, '2017-11-13 03:40:11', '2017-11-17 05:09:45'),
(55, 4, 'Acute Respiratory Obstruction', 'acute-respiratory-obstruction', 51, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O Foreign body aspiration (Larynx/Trachea)</p>\r\n			</td>\r\n			<td>\r\n			<p></p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Stridor</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Wheeze</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Marked recession of intercostal muscles</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Restlessness\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 4, 1, 0, '2017-11-13 03:40:34', '2017-11-17 05:13:47'),
(56, 4, 'Pneumothorax', 'pneumothorax', 51, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>General Exam: Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of underlying lung disease eg. TB, emphysema or trauma</p>\r\n			</td>\r\n			<td>\r\n			<p>PMI/Tracheal Shift, Decreased Chest expansion on affected side during respiration</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Percussion : tympanic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Breath sounds absent\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 03:41:01', '2017-11-17 05:16:10'),
(57, 4, 'Others', 'others', 47, '', '', '', '', 3, 1, 0, '2017-11-13 03:42:12', '2017-11-17 02:39:09'),
(58, 4, 'Obesity', 'obesity', 57, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Gradual increase in weight</p>\r\n			</td>\r\n			<td>\r\n			<p>Increased BMI</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Family H/O obesity</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Precipitating factors like hypothyroidism, sedentary life, high calorie diet (junk food)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Associated diseases like IHD, Diabetes, HT etc</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:42:35', '2017-11-17 05:19:52'),
(59, 4, 'Anemia', 'anemai', 57, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Racing of heart</p>\r\n			</td>\r\n			<td>\r\n			<p>Pallor</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Koilonychia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o loss of blood in stool, excessive flow during periods, hemoptysis, bleeding peptic ulcer/use of NSAIDS, bleeding Piles, etc</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 2, 1, 0, '2017-11-13 03:42:49', '2017-11-17 05:22:41'),
(60, 4, 'Loss Of Consciousness', 'loss-of-consciousness', 28, '', '', '', '', 5, 1, 0, '2017-11-13 03:44:22', '2017-11-13 03:44:22'),
(61, 4, 'Cardiac', 'cardiac-1', 60, '', '', '', '', 1, 1, 0, '2017-11-13 03:45:04', '2017-11-13 03:45:04'),
(62, 4, 'Vasovagal Attack', 'vasovagal-attack', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden loss of consciousness</p>\r\n			</td>\r\n			<td>\r\n			<p>Feeble pulse?</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Initiated by sudden pain or emotional upset/tight collar</p>\r\n			</td>\r\n			<td>\r\n			<p>Cold peripheries?</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Quick recovery after fall</p>\r\n			</td>\r\n			<td>\r\n			<p>Low BP?</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Bradycardia ?</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:46:59', '2017-11-20 10:51:39'),
(63, 4, 'Postural Hypotension', 'postural-hypotension', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden LOC on standing from recumbent position(decrease BP and cerebral blood fow)</p>\r\n			</td>\r\n			<td>\r\n			<p>?Orthostatic vitals</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O of use of antihypertensive drugs eg. prazosin</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 03:48:19', '2017-11-20 10:53:34'),
(64, 4, 'Arrhythmia', 'arrhythmia-1', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Racing of heart/fluttering in the chest before LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>Abnormal pulse</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious patient</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>LOC/Near fainting</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 03:48:40', '2017-11-20 10:57:33'),
(65, 4, 'Aortic Stenosis', 'aortic-stenosis', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>Dysnoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chest Pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Low volume pulse</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Systolic murmur with thrill best heart in Aortic area A1( 2nd intercostals space R side)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Exercise intolerance</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 03:48:59', '2017-11-20 10:59:32'),
(66, 4, 'Myocardial Infaraction', 'myocardial-infaraction', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Chest Pain related to exertion/strenuous work</p>\r\n			</td>\r\n			<td>\r\n			<p>No local tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Location: precordium/left arm radiating pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness+</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Quality of Pain : Crushing, squeezing, dull/sore</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating+</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea/Vomiting</p>\r\n			</td>\r\n			<td>\r\n			<p>Cold peripheries/cyanosis/td></p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxiousness + (sense of impending doom)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>High Cholesterolemia, HT, DM (predisposing)</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals: High blood pressure (or known HT)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>May have breathlessness, syncopal attack (LOC), palpitations</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Social history: Chronic Smoker (predisposing), Cocaine use</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 03:49:25', '2017-11-20 11:02:21'),
(67, 4, 'Pulmonary Embolism', 'pulmonary-embolism-2', 61, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O prolonged immobilization (travel)</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O calf muscle pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset chest pain increased on exertion and deep breath, NOT relieved on rest</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of hypoxia /cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough with blood tinged sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of one leg / bluish discoloration</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of leg /bluish discoloration/warmth\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 6, 1, 0, '2017-11-13 03:49:40', '2017-11-20 11:05:46'),
(68, 4, 'Neurological', 'neurological', 60, '', '', '', '', 2, 1, 0, '2017-11-13 03:50:37', '2017-11-13 03:50:37'),
(69, 4, 'Epileptic Seizure', 'epileptic-seizure', 68, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Before loss of consciousness may be has feeling of something unusual e.g. lights, sounds ,smells (aura)</p>\r\n			</td>\r\n			<td>\r\n			<p>Marks of tongue bite(if it occurred)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Positive history of shaking movements witnessed by someone</p>\r\n			</td>\r\n			<td>\r\n			<p>No specific finding in complete neurological exam</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Loss of bladder control, Tongue bite</p>\r\n			</td>\r\n			<td>\r\n			<p>No abnormal findings in complete cardiac exam</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Confusion after regaining of consciousness(postictal state)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>May be associated with headache</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:50:59', '2017-11-20 11:08:58'),
(70, 4, 'Stroke', 'stroke', 68, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Headache</p>\r\n			</td>\r\n			<td>\r\n			<p>Trouble with walking</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Speech difficulties</p>\r\n			</td>\r\n			<td>\r\n			<p>Weakness in one side of the body (decreased muscle power)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weakness & numbness</p>\r\n			</td>\r\n			<td>\r\n			<p>Numbness in one side(decreased sensation )</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Known hypertensive</p>\r\n			</td>\r\n			<td>\r\n			<p>Blurred vision in one eye</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Deviated mouth with smiling ( or other cranial N. palsies)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 2, 1, 0, '2017-11-13 03:51:14', '2017-11-20 11:15:33'),
(71, 4, 'Head Trauma', 'head-trauma', 68, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of fall</p>\r\n			</td>\r\n			<td>\r\n			<p>Localized tenderness on palpation of the head</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of hitting head</p>\r\n			</td>\r\n			<td>\r\n			<p>Bruise/ lacerations of scalp</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Associated symptoms (nausea & vomiting)</p>\r\n			</td>\r\n			<td>\r\n			<p>Focal neurological symptoms ( decreased muscle power or decreased sensory functions)</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 03:51:31', '2017-11-20 11:25:51'),
(72, 4, 'Metabolic and Others', 'metabolic-and-others', 60, '', '', '', '', 3, 1, 0, '2017-11-13 03:52:35', '2017-11-13 03:52:35'),
(73, 4, 'Severe Anemai', 'severe-anemai', 72, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Racing of heart</p>\r\n			</td>\r\n			<td>\r\n			<p>Pallor</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Koilonychia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o loss of blood in stool, excessive flow during periods, hemoptysis, bleeding peptic ulcer/use of NSAIDS, bleeding Piles, etc</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:52:57', '2017-11-20 11:27:41'),
(74, 4, 'Hypoglycemia', 'hypoglycemia-1', 72, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n\r\n<tr>\r\n			<td>\r\n			<p>Diabetes on Rx insulin or oral hypoglycemic</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered sensorium</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxiety</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Tremors/Shakiness</p>\r\n			</td>\r\n			<td>\r\n			<p>Tremors</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hunger</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Irritability or moodiness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Headache</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 03:53:20', '2017-11-20 11:30:46'),
(75, 4, 'Drug Induced', 'drug-induced', 72, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n\r\n<tr>\r\n			<td>\r\n			<p>Known hypertensive</p>\r\n			</td>\r\n			<td>\r\n			<p>Low blood pressure</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>On medication such as Prazosin etc</p>\r\n			</td>\r\n			<td>\r\n			<p>?Signs of dehydration(dry skin, thirsty)\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 03:53:42', '2017-11-20 11:31:55'),
(76, 4, 'Alcohol Abuse', 'alcohol-abuse', 72, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o of alcohol abuse</p>\r\n			</td>\r\n			<td>\r\n			<p>Breath smells of alcohol</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of alcohol intoxication\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 03:54:03', '2017-11-20 11:33:29'),
(77, 4, 'Acute Blood Loss', 'acute-blood-loss', 72, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o trauma, accident (internal or external bleeding)</p>\r\n			</td>\r\n			<td>\r\n			<p>Low BP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n			<td>\r\n			<p>Cold and clammy peripheries\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 03:54:38', '2017-11-20 11:34:38'),
(78, 4, 'Fatigue', 'fatigue', 28, '', '', '', '', 6, 1, 0, '2017-11-13 03:55:12', '2017-11-13 03:55:12'),
(79, 4, 'Anemia', 'anemia-1', 78, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Pallor</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Palpitations</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O loss of blood in stools , urine etc</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pale skin ( pallor)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 1, 1, 0, '2017-11-13 03:55:30', '2017-11-17 02:49:07'),
(80, 4, 'Hypothyroidism', 'hypothyroidism', 78, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Obese Patients</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Increased sensitivity to cold</p>\r\n			</td>\r\n			<td>\r\n			<p>Decreased Heart Rate (Bradycardia)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Constipation</p>\r\n			</td>\r\n			<td>\r\n			<p>Slowed tendon reflexes</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dry skin</p>\r\n			</td>\r\n			<td>\r\n			<p>Dry Skin</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Unexplained weight gain/puffy face</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Thinning hair</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hoarseness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n<tr>\r\n			<td>\r\n			<p>Heavier than normal or irregular menstrual periods</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 03:55:54', '2017-11-17 02:52:04'),
(81, 4, 'Chronic Illness', 'chronic-illness', 78, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>H/O of any chronic diseases of the heart ( valvular, CCF etc) , chronic lung diseases (COPD, TB etc) , any autoimmune diseases</p>\r\n			</td>\r\n			<td>\r\n			<p>Evidence pertaining to disease</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 3, 1, 0, '2017-11-13 03:56:29', '2017-11-17 02:54:07'),
(82, 4, 'Malignancy', 'malignancy', 78, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cachexia</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>H/o symptoms pertaining to site of primary tumor Eg. Cough in lung cancer</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Loss of weight</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Loss of appetite</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Anorexia</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 4, 1, 0, '2017-11-13 03:56:58', '2017-11-20 10:36:59'),
(83, 4, 'Chronic Fatigue Syndrome', 'chronic-fatigue-syndrome', 78, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Unexplained muscle pain/Migratory joint pain without swelling /redness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Lack of restful sleep</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Extreme exhaustion after physical/mental exercise</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>No underlying medical cause of fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue doesn''t get better with rest</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 5, 1, 0, '2017-11-13 03:57:30', '2017-11-20 10:39:03'),
(84, 4, 'Depression', 'depression', 78, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Feelings of sadness or unhappiness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Loss of interest or pleasure in normal activities</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Reduced sex drive</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Insomnia or excessive sleeping</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Slowed thinking, speaking or body movements</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Decreased concentration</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Feeling of guilt</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Suicidal tendencies</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 6, 1, 0, '2017-11-13 03:58:00', '2017-11-17 03:03:42'),
(85, 4, 'Diabetes', 'diabetes', 78, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Increased thirst</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Increased frequency of urination</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Increased hunger</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Blurred vision, slow healing ulcers, dark skin (gangrene)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 7, 1, 0, '2017-11-13 03:58:25', '2017-11-20 10:37:26'),
(86, 4, 'Pain Left Arm', 'pain-left-arm', 28, '', '', '', '', 7, 1, 0, '2017-11-13 03:59:07', '2017-11-13 03:59:07'),
(87, 4, 'Myocardial Infaraction / Angina', 'myocardial-infaraction-angina-1', 86, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious patient</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Increased sensitivity to cold</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypneic +/-</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea</p>\r\n			</td>\r\n			<td>\r\n			<p>Weak peripheral pulse/ cyanosis /cold peripheries</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Vomiting</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>LOC</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating+</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Radiation of Pain to L arm</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals : High BP ( or know HT)</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 03:59:32', '2017-11-17 03:09:35'),
(88, 4, 'Cervical Spondylosis', 'cervical-spondylosis', 86, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Local tenderness in cervical spine</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain and stiffness in arm and neck</p>\r\n			</td>\r\n			<td>\r\n			<p>Spasm of neck muscles</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>May be associated with tingling , numbness if there is compression of nerve roots</p>\r\n			</td>\r\n			<td>\r\n			<p>Loss of sensation in particular dermatome of nerve roots affected eg. C5 or C6</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>May be associated weakness causing difficulty in holding or lifting objects</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 2, 1, 0, '2017-11-13 04:00:01', '2017-11-17 03:23:11'),
(89, 4, 'Cervical Fracture', 'cervical-fracture', 86, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>H/o trauma or fall</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Bruises</p>\r\n			</td>\r\n			<td>\r\n			<p>Bruise</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>Warmth</p>\r\n			</td>\r\n		</tr>\r\n\r\n<tr>\r\n			<td>\r\n			<p>Inability to move the neck due to pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Local tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weakness, numbness depending on level of lesion</p>\r\n			</td>\r\n			<td>\r\n			<p>Restriction of movements of neck/crepitus</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 04:00:23', '2017-11-17 03:26:28'),
(90, 4, 'Shoulder Dislocation/Fracture', 'shoulder-dislocationfracture', 86, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden blow/extreme rotation of the shoulder joint (dislocation) or trauma ( fracture)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>A visibly deformed or out of place shoulder</p>\r\n			</td>\r\n			<td>\r\n			<p>Deformed shoulder (not likely in SP)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling or discoloration (bruising)</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling, Bruise, Redness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Intense pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Inability to move the joint</p>\r\n			</td>\r\n			<td>\r\n			<p>ROM ( Range of movements) – restricted</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weakness, numbness , tingling neck/limb</p>\r\n			</td>\r\n			<td>\r\n			<p>Sensory deficits in upper limb</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Spasm of muscles</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness and Spasm of muscles</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Crepitus ( fracture)\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 04:00:49', '2017-11-17 03:31:48'),
(91, 4, 'Myalgia/Muscle SPA SM', 'myalgiamuscle-spa-sm', 86, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o of sudden/excessive strain of upper limb</p>\r\n			</td>\r\n			<td>\r\n			<p>Spasm/tenderness of muscles of shoulder/upper limb</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain</p>\r\n			</td>\r\n			<td>\r\n			<p>ROM – limited due to pain</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Spasm of muscles</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Restriction of movements</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 5, 1, 0, '2017-11-13 04:01:16', '2017-11-17 03:35:37'),
(92, 4, 'Cellulitis', 'cellulitis', 86, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Localized Pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Vital signs : Temperature elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling</p>\r\n			</td>\r\n			<td>\r\n			<p>Localized Pain</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Redness</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Redness</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 6, 1, 0, '2017-11-13 04:01:58', '2017-11-17 03:37:15'),
(93, 4, 'Swelling Of Leg', 'swelling-of-leg', 28, '', '', '', '', 7, 1, 0, '2017-11-13 04:02:47', '2017-11-13 04:02:47');
INSERT INTO `product_step_categories` (`id`, `product_id`, `name`, `slug`, `parent`, `description`, `image`, `ideal_pdf`, `corrected_pdf`, `sort_order`, `status`, `is_deleted`, `created`, `modified`) VALUES
(94, 4, 'Congestive Heart Failure', 'congestive-heart-failure', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Progressive breathlessness/exertional dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>General Exam: Dyspnoea/Cyanosis/ Elevated JVP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of Paroxysmal Noctural Dynspnoea or Orthopnea</p>\r\n			</td>\r\n			<td>\r\n			<p>Hepatospenomegaly (Right heart failure)Ascites</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough -Frothy sputum +/- blood</p>\r\n			</td>\r\n			<td>\r\n			<p>Frothy /blood tinged sputum</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of feet</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of feet – pitting pedal edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs: creptitations both lung bases</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O of existing heart/valvular disease, high BP (known hypertensive), Ischemic heart disease</p>\r\n			</td>\r\n			<td>\r\n			<p>Heart: Evidence of valvular disease eg. Murmurs, loud S1 etc</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Distention of abdomen</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals: High BP\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 04:03:17', '2017-11-20 02:30:08'),
(95, 4, 'Cirrhosis and Liver failure', 'cirrhosis-and-liver-failure', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Yellow discoloration of skin</p>\r\n			</td>\r\n			<td>\r\n			<p>Icterus</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Bruises</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Bleeding/Bruising easily</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Itchy skin</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea, Loss of apetite</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of abdomen /legs</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 04:04:10', '2017-11-20 02:32:07'),
(96, 4, 'Nephrotic Syndrome', 'nephrotic-syndrome', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Frothy urine</p>\r\n			</td>\r\n			<td>\r\n			<p>Pedal edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Puffiness around face in the morning</p>\r\n			</td>\r\n			<td>\r\n			<p>Facial puffiness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight gain</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 04:04:35', '2017-11-20 02:33:25'),
(97, 4, 'Prolonged Standing/Sitting', 'prolonged-standingsitting', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o of prolonged standing (eg. work related )</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of legs</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of prolonged sitting (eg. airplane flights-long journey)</p>\r\n			</td>\r\n			<td>\r\n			<p>Pitting pedal edema\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 04:05:07', '2017-11-20 02:34:52'),
(98, 4, 'Lymphatic Blockage', 'lymphatic-blockage', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of the leg</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of legs</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Feeling of aching, heaviness or tightness in leg</p>\r\n			</td>\r\n			<td>\r\n			<p>Non pitting edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Restricted range of motion in your arm or leg</p>\r\n			</td>\r\n			<td>\r\n			<p>Lymphadenopathy</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o recurrent infections, fever</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hardening and thickening of the skin on leg</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of lymph glands in the groin</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 04:05:35', '2017-11-20 02:40:11'),
(99, 4, 'Cellulitis', 'cellulitis-1', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o swelling</p>\r\n			</td>\r\n			<td>\r\n			<p>Non pitting edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Febrile</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>Warm locally</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Redness</p>\r\n			</td>\r\n			<td>\r\n			<p>Redness in the area\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 04:06:01', '2017-11-20 02:42:05'),
(100, 4, 'Deep vein Thrombosis', 'deep-vein-thrombosis', 93, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o of prolonged immobilization</p>\r\n			</td>\r\n			<td>\r\n			<p>Homan’s sign positive : squeeze calf to elicit pain</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain Calf muscle</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of the leg</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of the leg</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Bluish discoloration of the leg</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of ingestion of OCP’s (oral contraceptive pills)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-13 04:06:28', '2017-11-20 02:44:25'),
(101, 4, 'Cyanosis', 'cyanosis', 28, '', '', '', '', 9, 1, 0, '2017-11-13 04:10:09', '2017-11-13 04:10:09'),
(102, 4, 'Bronchiolits', 'bronchiolits', 101, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Runny/stuffy nose</p>\r\n			</td>\r\n			<td>\r\n			<p>Cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Rapid/difficult breathing</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Bluish discoloration of skin/lips</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 04:11:16', '2017-11-20 12:53:05'),
(103, 4, 'Pulmonary Hypertension', 'pulmonary-hypertension', 101, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>Cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Syncope</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling (ankle, lower limb , abdomen-ascitis)</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Bluish discoloration of skin /lips</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Palpitation</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 04:13:12', '2017-11-20 12:55:13'),
(104, 4, 'Eisenmunger Syndrome', 'eisenmunger-syndrome', 101, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Bluish discoloration</p>\r\n			</td>\r\n			<td>\r\n			<p>Cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Clubbing</p>\r\n			</td>\r\n			<td>\r\n			<p>Clubbing</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chest pain , palpitations, dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Headache</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Numbness, tingling of fingers toes</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 04:13:48', '2017-11-20 12:57:56'),
(105, 4, 'Respi', 'respi-2', 0, '', '', '', '', 10, 1, 0, '2017-11-13 04:14:30', '2017-11-13 04:14:30'),
(106, 4, 'Cough', 'cough', 105, '', '', '', '', 1, 1, 1, '2017-11-13 04:14:46', '2017-11-13 04:14:46'),
(107, 4, 'Wheeze', 'wheeze', 105, '', '', '', '', 2, 1, 0, '2017-11-13 04:15:07', '2017-11-13 04:15:07'),
(108, 4, 'Bronchitis', 'bronchitis', 106, '', '', '', '', 1, 1, 0, '2017-11-13 04:16:39', '2017-11-13 04:16:39'),
(109, 4, 'Pneumonia', 'pneumonia', 106, '', '', '', '', 2, 1, 0, '2017-11-13 04:17:01', '2017-11-13 04:17:01'),
(110, 4, 'Asthma', 'asthma-1', 106, '', '', '', '', 3, 1, 0, '2017-11-13 04:17:16', '2017-11-13 04:17:16'),
(111, 4, 'TB', 'tb', 106, '', '', '', '', 4, 1, 0, '2017-11-13 04:17:34', '2017-11-13 04:17:34'),
(112, 4, 'CCF', 'ccf', 106, '', '', '', '', 5, 1, 0, '2017-11-13 04:18:22', '2017-11-13 04:18:22'),
(113, 4, 'Sinusitis', 'sinusitis', 106, '', '', '', '', 6, 1, 0, '2017-11-13 04:18:42', '2017-11-13 04:18:42'),
(114, 4, 'Lung CA', 'lung-ca', 106, '', '', '', '', 7, 1, 0, '2017-11-13 04:19:07', '2017-11-13 04:19:07'),
(115, 4, 'ACEI', 'acei', 106, '', '', '', '', 8, 1, 0, '2017-11-13 04:19:22', '2017-11-13 04:19:22'),
(116, 4, 'GERD', 'gerd-1', 106, '', '', '', '', 9, 1, 0, '2017-11-13 04:19:40', '2017-11-13 04:19:40'),
(117, 4, 'Asthma', 'asthma-2', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Difficulty breathing (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Wheeze</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing (noisy breathing)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Triggered by allergens (food, poolen, cold air)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Thick white plug of phlegm</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-13 04:20:06', '2017-11-20 05:26:09'),
(118, 4, 'Copd/Acute Bronchitis', 'copdacute-bronchitis', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough with sputum (white, yellow or green)</p>\r\n			</td>\r\n			<td>\r\n			<p>Respiratory rate may be high</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB especially during physical activities</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs : Rales and Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O clearing throat first thing in the morning to clear the excess mucus secretion</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Productive sputum 3 months each year(atleast 2 consecutive years)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chest tightness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-13 04:20:44', '2017-11-20 05:29:20'),
(119, 4, 'Anaphyalaxis', 'anaphyalaxis', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>h/o of exposure to allergen: peanuts ingestion, bee sting</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachnpoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Skin : itching, flushed or pale skin</p>\r\n			</td>\r\n			<td>\r\n			<p>Weak Rapid pulse</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>A feeling of warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>Hypotension</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Difficulty breathing : SOB, wheezing , constriction of airways</p>\r\n			</td>\r\n			<td>\r\n			<p>Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea, vomiting , diarrhea</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-13 04:21:10', '2017-11-20 05:31:59'),
(120, 4, 'Pneumonia', 'pneumonia-1', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Productive cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Patient looks sick</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Temp elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pleuritic chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Respiratory rate elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered Breath sounds</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>Rales</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O aspiration</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-13 04:21:30', '2017-11-20 05:51:51'),
(121, 4, 'Foreigh Body Aspiration', 'foreigh-body-aspiration', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O of ingestion of a foreign body</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious patient</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>Wheezing (audible)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-13 04:21:49', '2017-11-20 05:54:18'),
(122, 4, 'GERD', 'gera', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of epigastric pain radiating to chest</p>\r\n			</td>\r\n			<td>\r\n			<p>Epigastric tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Worsened by food intake - late night meals, caffeine</p>\r\n			</td>\r\n			<td>\r\n			<p>Rebound tenderness +</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Regurgitation of food into mouth</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Usually obese patient</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sore throat, hoarseness, cough</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-13 04:22:03', '2017-11-20 05:56:42'),
(123, 4, 'Lunga CA', 'lunga-ca', 107, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O chronic cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Emaciated look</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-13 04:22:23', '2017-11-20 06:03:20'),
(124, 5, 'Cardio', 'cardio-3', 0, '', '', '', '', 1, 1, 0, '2017-11-13 04:23:28', '2017-11-13 04:23:28'),
(125, 5, 'Respi', 'respi-3', 0, '', '', '', '', 2, 1, 0, '2017-11-13 04:23:42', '2017-11-13 04:23:42'),
(126, 5, 'OBS / GYN', 'obs-gyn-1', 0, '', '', '', '', 3, 1, 0, '2017-11-13 04:24:01', '2017-11-13 04:24:01'),
(127, 5, 'Abdomen', 'abdomen-2', 0, '', '', '', '', 4, 1, 0, '2017-11-13 04:24:13', '2017-11-13 04:24:13'),
(128, 5, 'psychitary', 'psychitary', 0, '', '', '', '', 5, 1, 0, '2017-11-13 04:24:37', '2017-11-13 04:24:37'),
(129, 5, 'Nervous', 'nervous-2', 0, '', '', '', '', 5, 1, 0, '2017-11-13 04:24:57', '2017-11-13 04:24:57'),
(130, 5, 'Joint', 'joint-2', 0, '', '', '', '', 7, 1, 0, '2017-11-13 04:27:09', '2017-11-13 04:27:09'),
(131, 5, 'Heent', 'heent-2', 0, '', '', '', '', 8, 1, 0, '2017-11-13 04:30:35', '2017-11-13 04:30:35'),
(132, 5, 'OBS / GYN - 2', 'obs-gyn-2', 0, '', '', '', '', 9, 1, 0, '2017-11-13 04:30:57', '2017-11-13 04:30:57'),
(133, 5, 'paediatric', 'paediatric', 0, '', '', '', '', 10, 1, 0, '2017-11-13 04:31:13', '2017-11-13 04:31:13'),
(134, 6, 'CARDIOVASCULAR', 'cardio-ideal-corrected-pn', 0, '', '16ba4486bf34d3f63ef6974387bf678a.png', 'd27de8ab2d80514d57e11db492783ca8.pdf', '94e1ab72e0ed0d2e362307fca3bb9041.pdf', 1, 1, 0, '2017-11-13 04:36:41', '2017-11-17 06:10:31'),
(135, 6, 'RESPI RATORY', 'respiratory-1', 0, '', 'd86f567a9f0c1ad2f4d42a49ca33d5cb.png', 'd5c5109bef2c394b87934b53e7b16b69.pdf', '3d6f66602b4305fd88f30201a2ae6a8f.pdf', 2, 1, 0, '2017-11-13 04:37:17', '2017-11-17 06:11:25'),
(136, 6, 'OBS / GYN', 'obs-gyn-3', 0, '', '53788d3cff5ccfd8df5f8fdf8e124dc4.png', '2b393446d1a4c4a2329082491aeb9815.pdf', 'b3f947fc2ed256ea6d7e361e653775e8.pdf', 3, 1, 0, '2017-11-13 04:37:52', '2017-11-17 06:11:54'),
(137, 6, 'GENITOURINARY/ABDOMEN', 'genitourinaryabdomen', 0, '', 'a1dc0f32e2263312a9eb247acbf27db0.png', 'f6ef5dd897c92b57841a0d054953c221.pdf', '43a9f391a1b9474ceedb4bf4de9e4a38.pdf', 4, 1, 0, '2017-11-13 04:38:44', '2017-11-17 06:12:21'),
(138, 6, 'JOINT', 'joint-3', 0, '', '89a7a5334038ebaa7cd233d61d8994ed.png', '7eaeef5b4a3f134065195cb31abe63a6.pdf', 'd429cf477efb62bd87649d821e06dbe8.pdf', 5, 1, 0, '2017-11-13 04:39:14', '2017-11-17 06:12:45'),
(139, 6, 'NERVOUS-PAEDIATRICS', 'nervous-paediatrics', 0, '', 'a47e46531d4c072b453ad1b697bfc647.png', 'f8bd373bfa2d688a3ef3ed845a326f3e.pdf', 'f55c27bdc23d4755f7320cf5a5ee9d1f.pdf', 6, 1, 0, '2017-11-13 04:40:11', '2017-11-17 06:13:21'),
(140, 6, 'HEENT', 'heent-3', 0, '', 'a0ea00bdda71189a25dd6cd04472bf80.png', '5bc89bbcd33b054638f88e7d383822a1.pdf', '08871a37df8300bc30565703e73395b1.pdf', 7, 1, 0, '2017-11-13 04:40:44', '2017-11-17 06:13:50'),
(141, 6, 'PSYCHIATRY/GENERAL', 'psychitary-general', 0, '', '8620572f8b34ea9780b8844cf6ff1bae.png', 'cb01fcec03c33063615046338ed2804e.pdf', '47e6ec7be7fd50d8a56e7c8b7f983226.pdf', 8, 1, 0, '2017-11-13 04:41:19', '2017-11-17 06:17:23'),
(142, 4, 'Cardiac', '', 47, '', '', '', '', 1, 1, 0, '2017-11-17 02:38:58', '2017-11-17 02:38:58'),
(143, 4, 'Congestive heart failure -  CHF', '', 142, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Progressive breathlessness/exertional dyspnoea</p>\r\n			</td>\r\n			<td>\r\n			<p>General Exam: Dyspnoea/Cyanosis/ Elevated JVP</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>H/o of Paroxysmal Noctural Dynspnoea or Orthopnea</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals: High BP</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Cough -Frothy sputum +/- blood</p>\r\n			</td>\r\n			<td>\r\n			<p>Frothy /blood tinged sputum</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Swelling of feet</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of feet &ndash; pitting pedal edema</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs: creptitations both lung bases</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>H/O of existing heart/valvular disease, high BP (known hypertensive), Ischemic heart disease</p>\r\n			</td>\r\n			<td>\r\n			<p>Heart: Evidence of valvular disease eg. Murmurs, loud S1 etc</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Distention of abdomen</p>\r\n			</td>\r\n			<td>\r\n			<p>Hepatospenomegaly (Right heart failure)Ascites</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 1, 1, 0, '2017-11-17 02:41:25', '2017-11-17 04:39:58'),
(144, 4, 'Pulmonary embolism', '', 142, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O prolonged immobilization (travel)</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O calf muscle pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset chest pain increased on exertion and deep breath, NOT relieved on rest</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of hypoxia /cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough with blood tinged sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of one leg / bluish discoloration</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of leg /bluish discoloration/warmth\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 2, 1, 0, '2017-11-17 04:41:26', '2017-11-17 04:44:41'),
(145, 4, 'Respiratory', '', 47, '', '', '', '', 3, 1, 0, '2017-11-17 04:51:04', '2017-11-17 04:51:04'),
(146, 4, 'Lung Infections', '', 51, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxious, dyspnoeic patient, toxic/ill looking</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals : Tachycardia, Tachypnoeic, Fever</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Palpitations</p>\r\n			</td>\r\n			<td>\r\n			<p>Decreased chest expansion affected side</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Toxic furred tongue ??</p>\r\n			</td>\r\n			<td>\r\n			<p>Dullness on percussion ( lobar pneumonia)</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Restriction of movement of chest affected side</p>\r\n			</td>\r\n			<td>\r\n			<p>Bronchial breathing with/without crepitations</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>Pain on deep inspiration ( if associated pleurisy)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n			<p>H/o of recent Upper respiratory tract infection- sorethroat, running nose recent past</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>\r\n', '', '', '', 4, 1, 0, '2017-11-17 04:52:25', '2017-11-17 04:59:07'),
(147, 1, 'test', '', 0, 'test', '', '', '', 1, 1, 1, '2017-11-20 10:49:56', '2017-11-20 10:49:56'),
(148, 1, 'test', '', 0, '<p>test</p>\r\n', '', '', '', 1, 1, 1, '2017-11-20 10:49:56', '2017-11-20 10:50:14'),
(149, 1, 'sugar', '', 3, '<p>sugar disease</p>\r\n', '', '', '', 1, 1, 0, '2017-11-20 11:04:06', '2017-11-20 11:12:08'),
(150, 1, 'testcategory', '', 0, 'test', '', '', '', 1, 1, 0, '2017-11-20 11:17:32', '2017-11-20 11:17:32'),
(151, 3, 'category', '', 0, 'category', '', '', '', 1, 1, 0, '2017-11-20 01:48:38', '2017-11-20 01:48:38'),
(152, 4, 'Shortness of breath', '', 105, '', '', '', '', 3, 1, 0, '2017-11-20 04:24:11', '2017-11-20 04:24:11'),
(153, 4, 'Cough', '', 152, '', '', '', '', 1, 1, 0, '2017-11-20 04:25:13', '2017-11-20 04:25:13'),
(154, 4, 'CCF', '', 153, '', '', '', '', 1, 1, 1, '2017-11-20 04:25:48', '2017-11-20 04:25:48'),
(155, 4, 'Asthma', '', 106, '', '', '', '', 2, 1, 0, '2017-11-20 05:08:24', '2017-11-20 05:08:24'),
(156, 4, 'Pneumonia', '', 106, '', '', '', '', 3, 1, 0, '2017-11-20 05:09:24', '2017-11-20 05:09:24'),
(157, 4, 'Pulmonary Embolism', '', 106, '', '', '', '', 4, 1, 0, '2017-11-20 05:09:57', '2017-11-20 05:09:57'),
(158, 4, 'Pneumothorax', '', 106, '', '', '', '', 4, 1, 0, '2017-11-20 05:10:37', '2017-11-20 05:10:37'),
(159, 4, 'Copd', '', 106, '', '', '', '', 5, 1, 0, '2017-11-20 05:11:09', '2017-11-20 05:11:09'),
(160, 4, 'Lung Cancer', '', 106, '', '', '', '', 6, 1, 1, '2017-11-20 05:11:33', '2017-11-20 05:11:33'),
(161, 4, 'Tuberculosis', '', 106, '', '', '', '', 6, 1, 1, '2017-11-20 05:11:54', '2017-11-20 05:11:54'),
(162, 4, 'Anemia', '', 106, '', '', '', '', 7, 1, 1, '2017-11-20 05:12:14', '2017-11-20 05:12:14'),
(163, 4, 'Anaphalaxis', '', 105, '', '', '', '', 8, 1, 1, '2017-11-20 05:13:09', '2017-11-20 05:13:09'),
(164, 4, 'Cough', '', 105, '', '', '', '', 1, 1, 0, '2017-11-21 09:08:52', '2017-11-21 09:08:52'),
(165, 4, 'Bronchitis', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Productive sputum 3 months each year (atleast 2 yrs)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-21 09:10:18', '2017-11-21 09:17:42'),
(166, 4, 'Pneumonia', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Productive cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Patient looks sick</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Temp elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pleuritic chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Respiratory rate elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered Breath sounds</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>Rales</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O aspiration</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-21 09:10:46', '2017-11-21 09:20:16'),
(167, 4, 'Asthma', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Difficulty breathing (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Wheeze</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing (noisy breathing)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Triggered by allergens (food, poolen, cold air)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Thick white plug of phlegm</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-21 09:11:17', '2017-11-21 09:22:48'),
(168, 4, 'TB', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O chronic cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Cervical Lymphadenopathy</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O ill contact</p>\r\n			</td>\r\n			<td>\r\n			<p>Tracheal Shift (not in SP)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Productive sputum (blood tinged)</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered breath sounds</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Rales/Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue/ Night sweats</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Evening rise of temp</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O PPD test +ve</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-21 09:12:20', '2017-11-21 09:25:16'),
(169, 4, 'CCF', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough associated with lying down</p>\r\n			</td>\r\n			<td>\r\n			<p>Increase Respiratory Rate</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O PND/Orthopnea</p>\r\n			</td>\r\n			<td>\r\n			<p>Basal Crepitations/Rales</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Increase JVP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Frothy Sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>Pedal Edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pedal Edema</p>\r\n			</td>\r\n			<td>\r\n			<p>Hepatomegaly</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-21 09:13:17', '2017-11-21 09:28:50'),
(170, 4, 'Sinusitis', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Dry cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Swollen eyes/puffy face</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain around eyes/cheek bones</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness over Sinuses</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O Post nasal drip</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Throbbing facial pain</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Headache</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 6, 1, 0, '2017-11-21 09:13:46', '2017-11-21 09:31:01'),
(171, 4, 'Lung CA', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O chronic cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Blood tinged sputum is tissue</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-21 09:14:05', '2017-11-21 09:32:58'),
(172, 4, 'ACEI', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O Hypertension</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O of intake of ACEI</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>No cough prior to taking ACEI</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-21 09:14:22', '2017-11-21 09:34:48'),
(173, 4, 'GERD', '', 164, '<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of epigastric pain radiating to chest</p>\r\n			</td>\r\n			<td>\r\n			<p>Epigastric tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Worsened by food intake - late night meals, caffeine</p>\r\n			</td>\r\n			<td>\r\n			<p>Rebound tenderness +</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Regurgitation of food into mouth</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Usually obese patient</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sore throat, hoarseness, cough</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-21 09:14:42', '2017-11-21 09:37:23'),
(174, 4, 'CCF', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough associated with lying down</p>\r\n			</td>\r\n			<td>\r\n			<p>Increase Respiratory Rate</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O PND/orthopnea</p>\r\n			</td>\r\n			<td>\r\n			<p>Increase JVP</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Pedal Edema</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Frothy Sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>Hepatomegaly</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pedal Edema</p>\r\n			</td>\r\n			<td>\r\n			<p>Basal Crepitations/Rales\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-21 10:11:04', '2017-11-21 10:16:16'),
(175, 4, 'Asthma', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Difficulty breathing (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Wheeze</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing (noisy breathing)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n<tr>\r\n			<td>\r\n			<p>Triggered by allergens (food, poolen, cold air)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n<tr>\r\n			<td>\r\n			<p>Thick white plug of phlegm</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-21 10:11:22', '2017-11-21 10:18:21'),
(176, 4, 'Pneumonia', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Productive cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Patient looks sick</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Temp elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pleuritic chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Respiratory rate elevated</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered Breath sounds</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>Rales</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O aspiration</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-21 10:11:45', '2017-11-21 10:28:22'),
(177, 4, 'Pulmonary Embolism', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of prolonged immobilization (travel)</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of calf muscle pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset chest pain increased on exertion and deep breath, NOT relieved on rest</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of hypoxia – cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough with blood tinged sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of one leg / bluish discoloration</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of leg /bluish discoloration\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-21 10:12:09', '2017-11-21 10:48:40'),
(178, 4, 'Pneumothorax', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Sudden sharp chest pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea ( difficulty breathing)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachypnoea ( increase respiratory rate)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of a underlying lung disease</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o of medical procedure or penetrating chest injuring the underlying lung</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-21 10:12:35', '2017-11-21 10:51:23'),
(179, 4, 'Copd', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Cough with sputum (white, yellow or green)</p>\r\n			</td>\r\n			<td>\r\n			<p>Respiratory rate may be high</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB especially during physical activities</p>\r\n			</td>\r\n			<td>\r\n			<p>Lungs : Rales and Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O clearing throat first thing in the morning to clear the excess mucus secretion</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Productive sputum 3 months each year(atleast 2 consecutive years)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Chest tightness</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Wheezing</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 6, 1, 0, '2017-11-21 10:13:08', '2017-11-21 10:55:42'),
(180, 4, 'Lung Cancer', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O chronic cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Dyspnoea</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Blood tinged sputum is tissue</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>SOB</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Smoker</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-21 10:13:28', '2017-11-21 11:09:38'),
(181, 4, 'Tuberculosis', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/O chronic cough</p>\r\n			</td>\r\n			<td>\r\n			<p>Cervical Lymphadenopathy</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O ill contact</p>\r\n			</td>\r\n			<td>\r\n			<p>Emaciated look</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Productive sputum (blood tinged)</p>\r\n			</td>\r\n			<td>\r\n			<p>Tracheal Shift</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Altered breath sounds</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Weight loss</p>\r\n			</td>\r\n			<td>\r\n			<p>Rales/Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue/ Night sweats</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Evening rise of temp</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O PPD test +ve</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 8, 1, 0, '2017-11-21 10:13:55', '2017-11-21 11:14:52'),
(182, 4, 'Anemia', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Racing of heart</p>\r\n			</td>\r\n			<td>\r\n			<p>Pallor</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Dizziness</p>\r\n			</td>\r\n			<td>\r\n			<p>Koilonychia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fatigue</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath (SOB)</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o loss of blood in stool, excessive flow during periods, hemoptysis, bleeding peptic ulcer/use of NSAIDS, bleeding Piles, etc</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 8, 1, 0, '2017-11-21 10:14:10', '2017-11-21 11:20:32'),
(183, 4, 'Anaphalaxis', '', 153, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>h/o of exposure to allergen: peanuts ingestion, bee sting</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachnpoeic</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>A feeling of warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>Weak Rapid pulse</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Difficulty breathing : SOB, wheezing , constriction of airways</p>\r\n			</td>\r\n			<td>\r\n			<p>Hypotension</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea, vomiting , diarrhea</p>\r\n			</td>\r\n			<td>\r\n			<p>Rhonchi</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 9, 1, 0, '2017-11-21 10:14:26', '2017-11-21 11:22:17'),
(184, 4, 'Chest pain', '', 105, '', '', '', '', 4, 1, 0, '2017-11-21 11:34:36', '2017-11-21 11:34:36'),
(185, 4, 'Myocardial infarction /Angina', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Chest Pain related to exertion/strenuous work</p>\r\n			</td>\r\n			<td>\r\n			<p>No local tenderness	</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Location: precordium/left arm radiating pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness+</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Quality of Pain : Crushing, squeezing, dull/sore</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating+</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Nausea/Vomiting</p>\r\n			</td>\r\n			<td>\r\n			<p>Cold peripheries/cyanosis</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Anxiousness + (sense of impending doom)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>High Cholesterolemia, HT, DM (predisposing)</p>\r\n			</td>\r\n			<td>\r\n			<p>Vitals: High blood pressure (or known HT)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>May have breathlessness, syncopal attack, palpitations</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Social history: Chronic Smoker (predisposing), Cocaine use</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 1, 1, 0, '2017-11-21 11:34:58', '2017-11-21 11:46:24'),
(186, 4, 'Costochondritis', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of pain on touching the spot</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness at local spot</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain increases on movement and breathing</p>\r\n			</td>\r\n			<td>\r\n			<p>Pain on movement of thorax or deep breathing</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Associated redness</p>\r\n			</td>\r\n			<td>\r\n			<p>Redness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Local Warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>Local warmth</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Fever</p>\r\n			</td>\r\n			<td>\r\n			<p>Fever (Vital signs)\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 2, 1, 0, '2017-11-21 11:35:14', '2017-11-21 11:52:04'),
(187, 4, 'Gerd', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of epigastric pain radiating to chest</p>\r\n			</td>\r\n			<td>\r\n			<p>Epigastric tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Worsened by food intake - late night meals, caffeine</p>\r\n			</td>\r\n			<td>\r\n			<p>Rebound tenderness +</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Regurgitation of food into mouth</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Usually obese patient</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sore throat, hoarseness, cough</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 3, 1, 0, '2017-11-21 11:35:30', '2017-11-21 11:57:49'),
(188, 4, 'Pleurisy Pain', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Localized sharp pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Location: Localized pain increased on cough/ deep inspiration</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of chest pain on coughing /inspiration</p>\r\n			</td>\r\n			<td>\r\n			<p>Quality: Sharp</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/O of possible fever, cough, sputum production, hemoptysis</p>\r\n			</td>\r\n			<td>\r\n			<p>Fever (Vital signs)</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>H/o chronic smoking</p>\r\n			</td>\r\n			<td>\r\n			<p>No local tenderness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p>Restriction of chest movement on the side of pain (Inspection)</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 4, 1, 0, '2017-11-21 11:35:59', '2017-11-21 12:11:13'),
(189, 4, 'Musculoskeletal', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>H/o of injury/fall</p>\r\n			</td>\r\n			<td>\r\n			<p>Tenderness at local spot</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of pain on touching the spot</p>\r\n			</td>\r\n			<td>\r\n			<p>Redness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain increases on movement and breathing</p>\r\n			</td>\r\n			<td>\r\n			<p>Warmth</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Associated redness</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Warmth</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 5, 1, 0, '2017-11-21 11:37:02', '2017-11-21 12:13:02'),
(190, 4, 'Pericarditis', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>History of fever</p>\r\n			</td>\r\n			<td>\r\n			<p></p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of recent infection (URI)</p>\r\n			</td>\r\n			<td>\r\n			<p>Precordial chest pain</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Patient feels relieved of pain on leaning forward/sitting up</p>\r\n			</td>\r\n			<td>\r\n			<p>Quality of pain –sharp stabbing chest pain</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Increase pain on lying down flat /deep inhalation</p>\r\n			</td>\r\n			<td>\r\n			<p>Low grade fever</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Pain increases on inspiration</p>\r\n			</td>\r\n			<td>\r\n			<p>Pericardial rub\r\n</p>\r\n			</td>\r\n		</tr>\r\n\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 6, 1, 0, '2017-11-21 11:37:55', '2017-11-21 12:20:34'),
(191, 4, 'Aortic Dissection', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n<tr>\r\n			<td>\r\n			<p>Known Hypertensive</p>\r\n			</td>\r\n			<td>\r\n			<p>Hypotension</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sharp tearing pain down the spine /back</p>\r\n			</td>\r\n			<td>\r\n			<p>Unequal blood pressure between arms</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Syncopal attack (LOC)</p>\r\n			</td>\r\n			<td>\r\n			<p>Weak pulse in one arm compared to the other</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Hypotension</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n			<td>\r\n			<p>Unequal blood pressure between arms</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sudden loss of vision, weakness/paralysis of one side of body like stroke</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 7, 1, 0, '2017-11-21 11:39:59', '2017-11-21 12:22:41');
INSERT INTO `product_step_categories` (`id`, `product_id`, `name`, `slug`, `parent`, `description`, `image`, `ideal_pdf`, `corrected_pdf`, `sort_order`, `status`, `is_deleted`, `created`, `modified`) VALUES
(192, 4, 'Pulmonary Embolism', '', 184, '\r\n<div class="bot">\r\n<table>\r\n	<tbody>\r\n\r\n<tr>\r\n			<td>\r\n			<p>History of prolonged immobilisation (travel)</p>\r\n			</td>\r\n			<td>\r\n			<p>Breathlessness</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>History of calf muscle pain</p>\r\n			</td>\r\n			<td>\r\n			<p>Tachycardia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Sudden onset chest pain increased on exertion and deep breath, NOT relieved on rest</p>\r\n			</td>\r\n			<td>\r\n			<p>Sweating</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Shortness of breath</p>\r\n			</td>\r\n			<td>\r\n			<p>Signs of hypoxia</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Cough with blood tinged sputum</p>\r\n			</td>\r\n			<td>\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n<tr>\r\n			<td>\r\n			<p>Swelling of one leg / bluish discoloration</p>\r\n			</td>\r\n			<td>\r\n			<p>Swelling of leg /bluish discoloration\r\n</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n	</tbody>\r\n</table>\r\n</div>', '', '', '', 8, 1, 0, '2017-11-21 11:40:19', '2017-11-21 12:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `product_step_videos`
--

CREATE TABLE IF NOT EXISTS `product_step_videos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `product_step_categories_id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `video_url` text NOT NULL,
  `count_like` bigint(20) NOT NULL,
  `count_view` bigint(20) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `product_step_videos`
--

INSERT INTO `product_step_videos` (`id`, `product_id`, `product_step_categories_id`, `title`, `video_url`, `count_like`, `count_view`, `sort_order`, `status`, `created`, `modified`) VALUES
(3, 1, 3, '10 Kick Starter Video', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 2, 0, 1, 1, '2017-11-14 11:41:36', '0000-00-00 00:00:00'),
(4, 1, 3, '10 Kick Starter Video', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 1, 0, 2, 1, '2017-11-14 11:41:36', '0000-00-00 00:00:00'),
(7, 1, 4, 'HPI', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 11:07:09', '0000-00-00 00:00:00'),
(8, 1, 5, 'PAM Hugs Foss', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 11:09:15', '0000-00-00 00:00:00'),
(9, 1, 6, 'Summary', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 11:09:47', '0000-00-00 00:00:00'),
(10, 1, 7, 'GE / PE', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 11:10:19', '0000-00-00 00:00:00'),
(11, 1, 8, 'Closure', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 11:10:45', '0000-00-00 00:00:00'),
(12, 2, 9, 'Cardio', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:44:06', '0000-00-00 00:00:00'),
(13, 2, 10, 'Respi', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:44:28', '0000-00-00 00:00:00'),
(14, 2, 11, 'Abdomen', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:44:49', '0000-00-00 00:00:00'),
(15, 2, 12, 'OBS / GYN', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:45:47', '0000-00-00 00:00:00'),
(16, 2, 13, 'Joint', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:46:03', '0000-00-00 00:00:00'),
(17, 2, 14, 'Nervous', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:46:23', '0000-00-00 00:00:00'),
(18, 2, 15, 'Heent', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:47:25', '0000-00-00 00:00:00'),
(19, 2, 16, 'PAED', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:47:46', '0000-00-00 00:00:00'),
(20, 2, 17, 'PSYC', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:48:24', '0000-00-00 00:00:00'),
(21, 3, 18, 'Cardio', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:48:43', '0000-00-00 00:00:00'),
(22, 3, 19, 'Respi', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:49:04', '0000-00-00 00:00:00'),
(23, 3, 20, 'Abdomen', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:49:19', '0000-00-00 00:00:00'),
(24, 3, 21, 'Heent', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:49:39', '0000-00-00 00:00:00'),
(25, 3, 22, 'Nervous', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:50:05', '0000-00-00 00:00:00'),
(26, 3, 23, 'Joint', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:51:13', '0000-00-00 00:00:00'),
(27, 3, 24, 'Fatigue Full Case', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:51:44', '0000-00-00 00:00:00'),
(28, 3, 25, 'Challenge', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:52:08', '0000-00-00 00:00:00'),
(29, 3, 26, 'Misc Videos', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:52:30', '0000-00-00 00:00:00'),
(30, 3, 27, 'Special video', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 15:52:50', '0000-00-00 00:00:00'),
(31, 5, 124, 'Cardio', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:05:29', '0000-00-00 00:00:00'),
(32, 5, 125, 'Respi', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:05:54', '0000-00-00 00:00:00'),
(33, 5, 126, 'OBS / GYN', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:06:12', '0000-00-00 00:00:00'),
(34, 5, 127, 'Abdomen', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:06:42', '0000-00-00 00:00:00'),
(35, 5, 128, 'Psychitary', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:07:17', '0000-00-00 00:00:00'),
(36, 5, 129, 'Nervous', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:07:49', '0000-00-00 00:00:00'),
(37, 5, 130, 'Joint', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:08:06', '0000-00-00 00:00:00'),
(38, 5, 131, 'Heent', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:08:20', '0000-00-00 00:00:00'),
(39, 5, 132, 'OBS / GYN', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:08:51', '0000-00-00 00:00:00'),
(40, 5, 133, 'Paediatric', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-16 16:09:22', '0000-00-00 00:00:00'),
(41, 6, 0, 'Patient Note Videos', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-17 18:19:24', '0000-00-00 00:00:00'),
(42, 6, 0, 'Patient Note Videos', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/s92f6auR-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 2, 1, '2017-11-17 18:19:24', '0000-00-00 00:00:00'),
(43, 6, 0, 'Patient Note Videos', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/xNeF4cku-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 3, 1, '2017-11-17 18:19:24', '0000-00-00 00:00:00'),
(44, 6, 0, 'Patient Note Videos', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 4, 1, '2017-11-17 18:19:24', '0000-00-00 00:00:00'),
(46, 1, 149, 'testsugar', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/https://www.youtube.com/players/gp2k3OHGep8.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-20 11:05:45', '0000-00-00 00:00:00'),
(47, 1, 3, 'test10 kick', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 2, 0, 3, 1, '2017-11-20 11:07:51', '0000-00-00 00:00:00'),
(48, 1, 150, 'testcatego', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/zgMCLcc5-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-20 11:19:03', '0000-00-00 00:00:00'),
(49, 3, 151, 'testcategory', '<div style="position:relative; padding-bottom:56.25%; overflow:hidden;"><iframe src="https://content.jwplatform.com/players/hQbhAZSt-F6KWWV0t.html" width="100%" height="100%" frameborder="0" scrolling="auto" allowfullscreen style="position:absolute;"></iframe></div>', 0, 0, 1, 1, '2017-11-20 13:50:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortform` varchar(255) NOT NULL,
  `class_count` int(11) NOT NULL,
  `user_count` int(11) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `slug`, `shortform`, `class_count`, `user_count`, `time_duration`, `created`, `updated`) VALUES
(1, 'Online Video Tutorials Type', 'online-video-tutorials', 'VID_TUT', 0, 0, 0, '2017-10-12 18:41:10', '0000-00-00 00:00:00'),
(2, 'Assesment Preparation Type', 'assesment-preparation', 'ASSES_PREP', 1, 1, 1, '2017-10-12 18:45:58', '0000-00-00 00:00:00'),
(3, 'Patient Note Correction Type', 'patient-note-correction', 'PNC', 1, 1, 1, '2017-10-12 18:46:34', '0000-00-00 00:00:00'),
(4, 'Webinar Type', 'webinar', 'WEBIN', 0, 0, 0, '2017-10-12 18:47:33', '0000-00-00 00:00:00'),
(5, 'Online Mock Exam Type', 'online-mock-exam', 'ON_MOCK', 1, 6, 2, '2017-10-12 18:47:52', '0000-00-00 00:00:00'),
(6, 'Live Mock Exam Type', 'live-mock-exam', 'LIV_MOCK', 0, 0, 0, '2017-10-12 18:47:58', '0000-00-00 00:00:00'),
(7, 'Combo Plan', 'combo-plan', 'COMBO_PLAN', 0, 0, 0, '2017-10-12 18:48:08', '0000-00-00 00:00:00'),
(8, 'Combo Package', 'combo-package', 'COMBO_PACK', 0, 0, 0, '2017-10-12 18:48:16', '0000-00-00 00:00:00'),
(9, 'Complete Comprehensive Course Type', 'complete-comprehensive-course', 'CCC', 6, 3, 1, '2017-10-20 00:00:00', '0000-00-00 00:00:00'),
(10, 'Rapid Review Course Type', 'rapid-review-course', 'RRC', 3, 3, 1, '2017-10-12 18:47:06', '0000-00-00 00:00:00'),
(11, 'CS Handbook', 'cs-handbook', 'ebook', 0, 0, 0, '2017-10-31 18:47:06', '0000-00-00 00:00:00'),
(12, 'Webinar Group', 'webinar-group', 'WEBGRP', 0, 0, 0, '2017-10-12 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_user_access`
--

CREATE TABLE IF NOT EXISTS `product_user_access` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_expiry_date` datetime NOT NULL,
  `is_extended` tinyint(1) NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_webinar`
--

CREATE TABLE IF NOT EXISTS `product_webinar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_time` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_webinar`
--

INSERT INTO `product_webinar` (`id`, `product_id`, `group_id`, `title`, `description`, `image`, `date_time`, `modified`) VALUES
(4, 29, 35, 'This is Webinar 1', 'test', 'banner11.jpg', '2017-11-22 15:50:00', '0000-00-00 00:00:00'),
(5, 30, 0, 'This is Webinar 2', 'test', 'New-Years-2017-banner.jpg', '2017-11-28 15:51:00', '0000-00-00 00:00:00'),
(7, 32, 35, 'This is Webinar 4', 'test', 'child31.jpg', '2017-11-24 15:52:00', '0000-00-00 00:00:00'),
(8, 33, 35, 'This is good Webinar', 'dsdfsf', 'Pizigani_1367_Chart_10MB.jpg', '2017-12-22 15:55:00', '2017-11-15 11:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `site_references`
--

CREATE TABLE IF NOT EXISTS `site_references` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `page_url` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `site_references`
--

INSERT INTO `site_references` (`id`, `page_url`, `page_name`, `status`) VALUES
(1, 'home/index', 'home', 1),
(2, 'onlinevideo/index', 'onlinevideo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `setting_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `description` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `include_class` varchar(255) NOT NULL,
  `include_validation` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `sort_order` bigint(20) NOT NULL,
  `is_show` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_category_id`, `name`, `value`, `description`, `type`, `options`, `include_class`, `include_validation`, `label`, `sort_order`, `is_show`) VALUES
(1, 1, 'site.name', 'Target USMLE', 'You can make changes in site name by using this value. ', 'text', '', '', 'trim|required', 'Site Name', 1, 1),
(2, 1, 'site.date_format', 'M d, Y', 'You can make changes in date format of the site.', 'text', '', 'datepicker', 'trim|required', 'Date Format', 2, 0),
(3, 1, 'site.datetime_format', 'M d, Y  g:i:s A', 'You can make changes in date time format of the site.', 'text', '', 'datepicker', 'trim|required', 'Date Time Format', 3, 0),
(4, 2, 'meta.keywords', 'STEP 2 CS Exam', 'You can make changes homepage meta keywords in this.', 'textarea', '', '', 'trim|required', 'Meta Keywords', 1, 1),
(5, 2, 'meta.description', 'TARGET USMLE is an learning site for STEP 2 CS Exam', 'You can make changes homepage meta description in this.', 'textarea', '', '', 'trim|required', 'Meta Description', 2, 1),
(6, 4, 'emailtemplate.from_email', 'dr.maryjune@targetusmle.com', 'You can make changes in Template From email for admin.', 'text', '', 'email', 'trim|required|valid_email', 'From Email', 1, 1),
(7, 4, 'emailtemplate.to_email', 'dr.maryjune@targetusmle.com', 'You can make changes in Template To email for admin.', 'text', '', 'email', 'trim|required|valid_email', 'To Email', 2, 1),
(8, 4, 'emailtemplate.reply_email', 'dr.maryjune@targetusmle.com', 'You can make changes in Template Reply email for admin.', 'text', '', 'email', 'trim|required|valid_email', 'Reply Email', 3, 1),
(9, 5, 'pagination.front', '10', 'You can make changes in front end pagination by using this value. ', 'text', '', 'numberOnly', 'trim|required|numeric', 'Front Pagination', 1, 1),
(10, 5, 'pagination.back', '5', 'You can make changes in front end pagination by using this value. ', 'text', '', 'numberOnly', 'trim|required|numeric', 'Back Pagination', 2, 1),
(11, 1, 'site.address', 'Target USMLE\r\nNo. 2 Reddipalayam Street, 1st Floor,\r\nMugappair West,\r\nChennai 600 037,\r\nINDIA. - See more at: https://www.targetusmle.com/contactus.php#sthash.tIVbm5te.dpuf', 'You can make changes in site address by using this value. ', 'textarea', '', '', 'trim|required', 'Address', 6, 1),
(12, 1, 'site.phone', '+91-9789930077', 'You can make changes in phone number by using this value. ', 'text', '', '', 'trim|required|regex_match[/^(?=.*[0-9])[- +0-9]+$/]', 'Phone no', 4, 1),
(14, 6, 'step.title', 'Online Video Tutorials', 'You can make changes in title 1 by using this value. ', 'text', '', '', 'trim|required', 'Title', 1, 1),
(15, 6, 'step.title_description', 'Step 2 CS preparation Tutorials', 'You can make changes in title description by using this value. ', 'text', '', '', 'trim|required', 'Title Description', 2, 1),
(18, 6, 'step.step1_content', 'CS Typical History', 'You can make changes in step 1 content by using this value. ', 'text', '', '', 'trim|required', 'Step 1 Content', 5, 1),
(19, 6, 'step.step2_content', 'System History', 'You can make changes in step 2 content by using this value. ', 'text', '', '', 'trim|required', 'Step 2 Content', 6, 1),
(20, 6, 'step.step3_content', 'PE vidieos', 'You can make changes in step 3 content by using this value. ', 'text', '', '', 'trim|required', 'Step 3 Content', 7, 1),
(21, 6, 'step.step4_content', 'Diff Diagnosis', 'You can make changes in step 4 content by using this value. ', 'text', '', '', 'trim|required', 'Step 4 Content', 8, 1),
(22, 6, 'step.step5_content', 'CS:15 min cases', 'You can make changes in step 5 content by using this value. ', 'text', '', '', 'trim|required', 'Step 5 Content', 9, 1),
(23, 6, 'step.step6_content', 'PTE: 10 min note', 'You can make changes in step 6 content by using this value. ', 'text', '', '', 'trim|required', 'Step 6 Content', 10, 1),
(25, 6, 'step.bottom_line', 'We provide Best of Everything the complete package for your Exam', 'You can make changes in Bottom Line content by using this value. ', 'textarea', '', '', 'trim|required', 'Bottom Line', 12, 1),
(30, 7, 'patientnotecorrection.durationtime', '10', 'You can make changes in duration time by using this value. ', 'text', '', '', 'trim|required|numeric', 'Duration Time', 5, 1),
(31, 7, 'patientnotecorrection.history_content', 'Describe History ..', 'You can make changes in history content by using this value. ', 'textarea', '', '', 'trim|required', 'History Content', 6, 1),
(32, 7, 'patientnotecorrection.physical_examination_content', 'Describe any Positive ..', 'You can make changes in physical examination content by using this value. ', 'textarea', '', '', 'trim|required', 'Physical Examination Content', 7, 1),
(33, 7, 'patientnotecorrection.data_intepretation_content', 'Based on what ..', 'You can make changes in data intepretation content by using this value. ', 'textarea', '', '', 'trim|required', 'Data Intepretation Content', 8, 1),
(34, 7, 'patientnotecorrection.examine_instruction_content', 'VITAL SIGNS\r\nTemperature 98.8 F', 'You can make changes in Examine Instruction content by using this value. ', 'textarea', '', '', 'trim|required', 'Examine Instruction Content', 9, 1),
(35, 8, 'personal_coaching.title', 'Personal Coaching', '', 'text', '', '', 'trim|required', 'Title', 1, 1),
(36, 8, 'personal_coaching.description', 'Personal Coaching making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '', 'textarea', '', '', 'trim|required', 'Description', 2, 1),
(37, 8, 'personal_coaching.similarities_title', '<h2>Similarities in both courses</h2>\r\n<h4>You will be taught</h4>', '', 'textarea', '', '', 'trim|required', 'Similarities Title', 3, 1),
(38, 8, 'personal_coaching.similarities_description', 'Where does it come from?\r\n\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.', '', 'textarea', '', '', 'trim|required', 'Similarities Description', 4, 1),
(39, 8, 'personal_coaching.difference_title', 'Difference between both courses', '', 'textarea', '', '', 'trim|required', 'Difference Title', 5, 1),
(40, 8, 'personal_coaching.difference_description', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum"', '', 'textarea', '', '', 'trim|required', 'Difference Description', 6, 1),
(41, 8, 'personal_coaching.video_url', 'http://youtube.com/evatch', '', 'text', '', 'video_url', 'trim|required|valid_url_format', 'Video URL', 2, 1),
(42, 8, 'personal_coaching.timeslot_content', 'Book Your Timeslot Content', '', 'textarea', '', '', 'trim|required', 'Timeslot Content', 2, 1),
(43, 9, 'cs_handbook.book_name', 'Step2 CS Hand Book', '', 'text', '', '', 'trim|required', 'Book Name', 1, 1),
(44, 9, 'cs_handbook.author_name', 'Dr. Mary June', '', 'text', '', '', 'trim|required', 'Author Name', 2, 1),
(45, 9, 'cs_handbook.about_author', '<h3>Foreword</h3>\r\n<h4>Dr. Juliana Jung MD, FACEP,</h4>\r\n<h4>Johns Hopkins Clinical Skills Director</h4>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>', '', 'textarea', '', '', 'trim|required', 'About Author', 3, 1),
(46, 9, 'cs_handbook.description', '<ul>\r\n<li><p>Rapid CS Review - System wise History & PE</p></li>								\r\n<li><p>Pass ICE component the First time!</p></li>\r\n<li><p>Vital components of a good Patient Note</p></li>\r\n<li><p>Step by Step Organized approach to CS prep</p></li>\r\n</ul>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>', '', 'textarea', '', '', 'trim|required', 'Description', 4, 1),
(47, 9, 'cs_handbook.reviews', '<ul>\r\n<li><p>“Fantastic study resource for the USMLE Step 2 CS! I wish I had read your book earlier!”</p></li>\r\n<li><p>“A must to pass on the First Attempt...The best CS review book out there. Don''t waste your time with anything else.”</p></li>\r\n<li><p>“Reading this book the first time gave a feeling of having passed the exam before taking it. This gets even better when used in tandem with the 7 easy steps video tutorial on their website @ targetusmle.com.”</p></li>\r\n<li><p>“Great book to an IMG preparing for the Step 2 CS exam. Gives you a systematic approach and understanding of the process. The book is very concise, has everything you need to know to pass the exam,”</p></li>\r\n<li><p>"Target USMLE Step 2 CS handbook is really one of a kind. This book really gives you all the information you need in a compact and concise manner. I took my step 2 Cs recently and i used Target USMLE and First aid side by side. The content of both books is very different and both together really reinforces the core concepts and strategies required to Ace the Step 2 CS with ease."</p></li>\r\n</ul>\r\n\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>\r\n<p>"Dr. Mary June has enabled many students to pass  Step 2 CS, and now she is making her years of \r\n       experience and success available to students  around the world.  In this book, you will learn the \r\n       skills you need to pass all dimensions of the exam. In acquiring this book, you have already taken an  important step towards passing the exam!”</p>', '', 'textarea', '', '', 'trim|required', 'Reviews', 5, 1),
(48, 10, 'live_mock_exam.title', 'test1', '', 'text', '', '', 'trim|required', 'Title', 1, 1),
(49, 10, 'live_mock_exam.description1', 'test2', '', 'textarea', '', '', 'trim|required', 'Description 1', 2, 1),
(50, 10, 'live_mock_exam.description2', 'test3', '', 'textarea', '', '', 'trim|required', 'Description 2', 3, 1),
(51, 10, 'live_mock_exam.bottom_content', 'test14', '', 'textarea', '', '', 'trim|required', 'Bottom Content', 4, 1),
(52, 10, 'live_mock_exam.video_url', 'http://www.youtube.com/watch?', '', 'text', '', 'video_url', 'trim|required', 'Video URL', 5, 1),
(53, 10, 'live_mock_exam.image', 'appdata/live_mock_exam/images2.jpeg', '', 'file', 's:84:"array(''name'' => ''Image'',	''path'' => ''live_mock_img'',''allowedTypes'' => "jpg|jpeg|png")";', 'image', 'trim|callback_valid_image', 'Image', 6, 0),
(54, 1, 'site.skypeid', 'mjjune1', '', 'text', '', '', 'trim|required', 'Skype ID', 5, 1),
(55, 3, 'social.facebook_link', 'www.facebook.com', '', 'text', '', '', 'trim|required', 'Facebook Link', 1, 1),
(56, 1, 'site.primary_usa', '+1-908-452-8014', '', 'text', '', '', 'trim|required', 'Primary USA', 7, 1),
(57, 1, 'site.secondary_usa', '+1-908-452-8014', '', 'text', '', '', 'trim|required', 'Secondary USA', 7, 1),
(58, 1, 'site.primary_india', '+1-908-452-8014', '', 'text', '', '', 'trim|required', 'Primary India', 8, 1),
(59, 1, 'site.secondary_india', '+1-908-452-8014', '', 'text', '', '', 'trim|required', 'Secondary India', 8, 1),
(60, 1, 'site.footer_content', 'The United States Medical Licensing Examination (USMLE) is a joint program of the Federation of State Medical Boards (FSMB) and National Board of Medical Examiners (NBME). None of the trademark holders are affiliated with TARGET USMLE ', '', 'textarea', '', '', 'trim|required', 'Footer Content', 9, 1),
(61, 1, 'site.copyright_content', '2017. All rights reserved. ', '', 'text', '', '', 'trim|required', 'Copyright Content', 10, 1),
(67, 1, 'site.freesample', 'invoicesample.pdf', '', 'file', 'a:1:{s:13:"allowed_types";s:7:"pdf|PDF";}', 'image', 'callback_valid_file[67]', 'Free Sample PDF', 10, 1),
(68, 9, 'cs_handbook.amazon_kindle_url', 'www.targetusmle.com', '', 'text', '', '', 'trim|required|valid_url_format', 'Amazon Kindle URL', 8, 1),
(69, 10, 'live_mock_exam.start_time', '8 AM', '', 'text', '', '', 'trim|required', 'Start Time', 7, 1),
(70, 10, 'live_mock_exam.end_time', '10 PM', '', 'text', '', '', 'trim|required', 'End Time', 8, 1),
(71, 9, 'cs_handbook.handbook', 'invoicesample.pdf', '', 'file', 'a:1:{s:13:"allowed_types";s:7:"pdf|PDF";}', 'image', 'callback_valid_file[55]', 'Handbook', 7, 1),
(72, 9, 'cs_handbook.author_image', 'mary_june.png', '', 'file', 'a:1:{s:13:"allowed_types";s:25:"jpg|jpeg|png|JPG|JPEG|PNG";}', 'image', 'callback_valid_file[54]', 'Author Image', 6, 1),
(73, 3, 'social.googleplus_link', 'http://www.googleplus.com', '', 'text', '', '', 'trim|required', 'Googleplus Link', 4, 1),
(74, 3, 'social.linkedin_link', 'http://www.linkedin.com', '', 'text', '', '', 'trim|required', 'Linkedin Link', 3, 1),
(75, 3, 'social.twitter_link', 'http://www.twitter.com', '', 'text', '', '', 'trim|required', 'Twitter Link', 2, 1),
(76, 1, 'site.admin_email', 'dr.maryjune@targetusmle.com', '', 'text', '', 'email', 'trim|required|valid_email', 'Admin Email', 2, 1),
(77, 1, 'site.support_email', 'support@targetusmle.com', '', 'text', '', 'email', 'trim|required|valid_email', 'Support Email', 2, 1),
(78, 11, 'paypal.signature', 'AiKZhEEPLJjSIccz.2M.tbyW5YFwAGNcz75oRpSPcHQEnirXcbHFcBM.', '', 'text', '', '', 'trim|required', 'Signature', 3, 1),
(79, 11, 'paypal.password', 'QX3CFLXJESL2PAK8', '', 'password', '', '', 'trim|required', 'Password', 2, 1),
(80, 11, 'paypal.username', 'targetusmle.17_api1.gmail.com', '', 'text', '', '', 'trim|required', 'Username', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings_categories`
--

CREATE TABLE IF NOT EXISTS `site_settings_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `show_order` int(11) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `site_settings_categories`
--

INSERT INTO `site_settings_categories` (`id`, `created`, `modified`, `name`, `description`, `show_order`, `is_show`, `is_active`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'site', 'Site settings', 1, 1, 1),
(2, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'meta', 'meta details', 2, 1, 1),
(3, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'social', 'social settings', 3, 1, 1),
(4, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'emailtemplate', 'email template settings', 4, 1, 1),
(5, '2017-10-12 00:00:00', '2017-10-12 00:00:00', 'pagination', 'Pagination', 5, 1, 1),
(6, '2017-10-28 00:00:00', '2017-10-28 00:00:00', 'step', 'Step', 0, 0, 1),
(7, '2017-10-28 00:00:00', '2017-10-28 00:00:00', 'patientnotecorrection', 'Patient Note Correction', 0, 0, 1),
(8, '2017-10-31 00:00:00', '2017-10-31 00:00:00', 'personal_coaching', 'Personal Coaching', 0, 0, 1),
(9, '2017-10-31 00:00:00', '2017-10-31 00:00:00', 'cs_handbook', 'CS Handbook', 0, 0, 1),
(10, '2017-11-08 00:00:00', '2017-11-08 00:00:00', 'live_mock_exam', 'Live Mock Exam', 0, 0, 1),
(11, '2017-11-21 00:00:00', '2017-11-21 00:00:00', 'paypal', 'Paypal Settings', 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `type` enum('TEXT','VIDEO') NOT NULL,
  `youtube_link` text NOT NULL,
  `image` varchar(225) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `designation`, `location`, `description`, `category_id`, `type`, `youtube_link`, `image`, `created`, `modified`, `status`) VALUES
(1, 'Luisa Mancera 3', 'Dr', 'Saudi arabia', '<p>In publishing and graphic design, lorem is a filler text or greeking used demonstrate the textual elements of a grap document or visual.</p>', 2, 'VIDEO', 'https://www.youtube.com/embed/mReGTloHonE', 'db1d7aa5003ef03889d1a5ff98bd847a.png', '2017-10-16 14:55:01', '2017-10-16 14:55:01', 1),
(2, 'Testimonial 2', '', '', '<p>test</p>', 1, 'TEXT', '', '', '2017-10-16 15:01:03', '2017-10-16 15:01:03', 1),
(3, 'Luisa Mancera 2', 'Engineer', 'Oakland, CA1', '<p>In publishing and graphic design, lorem is a filler text or greeking used demonstrate the textual elements of a grap document or visual.</p>', 2, 'VIDEO', 'https://www.youtube.com/embed/3bMXopE0PTc', '5791620d63f242b5a727e2157322e60f.png', '2017-10-16 18:08:46', '0000-00-00 00:00:00', 1),
(6, 'Luisa Mancera1', 'Deen', 'London', '<p>In publishing and graphic design, lorem is a filler text or greeking used demonstrate the textual elements of a grap document or visual</p>', 1, 'VIDEO', 'https://www.youtube.com/embed/J_PxO4f017E', '754e46a0575897587bfdc717e58ee38b.png', '2017-10-20 10:49:30', '0000-00-00 00:00:00', 1),
(7, 'Luisa Mancera 4', 'Engineer', 'Australia', '<p>In publishing and graphic design, lorem is a filler text or greeking used demonstrate the textual elements of a grap document or visual.</p>', 2, 'VIDEO', 'http://https://www.youtube.com/embed/BDXztdJSh1s', '811fd6f074220101ede1769a9aa9e062.png', '2017-11-09 09:02:18', '0000-00-00 00:00:00', 1),
(8, 'Luisa Mancera 5', 'Deen', 'US', '<p>In publishing and graphic design, lorem is a filler text or greeking used demonstrate the textual elements of a grap document or visual.</p>', 2, 'VIDEO', 'https://www.youtube.com/embed/6y6p8XfoUP4', 'e824579c8bcb2334b7194a49fd8fdd59.png', '2017-11-09 09:03:06', '0000-00-00 00:00:00', 1),
(9, 'Name', 'Designation', 'Location', '“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text”', 5, 'TEXT', '', '8c82e28597b9cc74f1aecbb9c58613b1.png', '2017-11-14 16:02:39', '0000-00-00 00:00:00', 1),
(10, 'Name', 'Designation', 'Location', '“Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text”', 5, 'TEXT', '', '045fc469dcac181ec71d0840cb8b79f2.png', '2017-11-14 16:03:28', '0000-00-00 00:00:00', 1),
(11, 'Name', 'Designation', 'Location', '<p>&ldquo;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text&rdquo;</p>', 5, 'TEXT', '', '052ad9782f64c1e6ff19346503445049.png', '2017-11-14 16:04:30', '0000-00-00 00:00:00', 1),
(12, 'Name', 'Designation', 'Location', '<p>&ldquo;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text&rdquo;</p>', 5, 'VIDEO', 'https://www.youtube.com/embed/6y6p8XfoUP4', 'c2ef71620ff22e864cd200802bb54289.png', '2017-11-14 16:05:08', '0000-00-00 00:00:00', 1),
(13, 'Name', 'Designation', 'Location', '<p>&ldquo;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text&rdquo;</p>', 5, 'TEXT', '', '649c4e8f5d4442e2b019ea0e48c43562.png', '2017-11-14 16:06:05', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_categories`
--

CREATE TABLE IF NOT EXISTS `testimonial_categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testimonial_categories`
--

INSERT INTO `testimonial_categories` (`id`, `name`, `slug`, `status`, `created`, `modified`) VALUES
(1, 'ONLINE SKYPE TRAINING / LIVE MOCK EXAM, INDIA', 'online-skype-training-live-mock-exam-india', 1, '2017-10-13 19:46:07', '2017-10-13 19:46:07'),
(2, 'ONLINE VIDEO TUTORIAL:7 Easy Steps 2 CS', 'online-video-tutorial7-easy-steps-2-cs', 1, '2017-10-13 19:46:49', '2017-10-13 19:46:49'),
(3, 'test', 'test', 1, '2017-10-26 11:29:33', '0000-00-00 00:00:00'),
(4, 'test1', 'test1', 1, '2017-10-26 11:29:36', '0000-00-00 00:00:00'),
(5, 'cs handbook', 'cs-handbook', 1, '2017-11-14 15:58:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `know_about_us` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `took_step_one_exam` tinyint(1) NOT NULL,
  `step_one_exam_date` date NOT NULL,
  `took_step_two_exam` tinyint(1) NOT NULL,
  `step_two_exam_date` date NOT NULL,
  `exam_date` datetime NOT NULL,
  `exam_center` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_email_verified` tinyint(4) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `login_count` bigint(20) NOT NULL,
  `last_login_time` datetime NOT NULL,
  `uid_request_date` datetime NOT NULL,
  `uid` bigint(20) NOT NULL,
  `uid_status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email_id`, `image`, `designation`, `password`, `know_about_us`, `skype_id`, `phone_no`, `address`, `country`, `city`, `took_step_one_exam`, `step_one_exam_date`, `took_step_two_exam`, `step_two_exam_date`, `exam_date`, `exam_center`, `status`, `is_email_verified`, `ip_address`, `created`, `modified`, `login_count`, `last_login_time`, `uid_request_date`, `uid`, `uid_status`) VALUES
(1, 'hari', 'target', '', 'hari_target@yopmail.com', '', '', '0192023a7bbd73250516f069df18b500', '2', 'haritarg1990', '789542454', '', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '0000-00-00 00:00:00', '', 1, 0, '', '2017-10-26 11:30:36', '2017-10-26 11:30:36', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'riaz', 'mohammed', '', 'mohammedriaz124@yopmail.com', '', '', '0192023a7bbd73250516f069df18b500', '3', 'mohammedriaz124', '7899524545', '', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-14 00:00:00', '', 1, 1, '', '2017-10-26 04:51:29', '2017-10-26 04:51:29', 3, '2017-11-09 23:03:48', '2017-11-09 11:04:05', 0, 1),
(6, 'mohammed', 'riaz', '', 'riaintouch@gmail.com', '9cba985614968ec25e2f15cb2ea4f450.png', 'Doctor', '0192023a7bbd73250516f069df18b500', '3', 'riaz1', '9566220411', 'this is address', 96, 1, 1, '2018-11-01', 0, '0000-00-00', '2017-10-27 00:00:00', 'chennai', 1, 0, '', '2017-10-26 11:22:50', '2017-11-16 11:30:30', 16, '2017-11-22 10:42:38', '0000-00-00 00:00:00', 0, 0),
(7, 'mohammed', 'riaz', '', 'riaaz@yopmail.com', '', '', '0e7517141fb53f21ee439b355b5a1d0a', '2', 'riaz', '9566220411', 'this is my address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-23 00:00:00', 'paris', 0, 0, '', '2017-11-09 08:39:02', '2017-11-09 08:39:02', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, 'vinoth', 'kumar', '', 'vinoth@yopmail.com', '', '', '0e7517141fb53f21ee439b355b5a1d0a', '2', 'vinoth', '9566220411', 'this is address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-24 00:00:00', 'paris', 0, 0, '', '2017-11-09 08:42:38', '2017-11-09 08:42:38', 0, '0000-00-00 00:00:00', '2017-11-09 11:09:21', 0, 0),
(9, 'md', 'rafsan', '', 'rafsan@yopmail.com', '', '', '0e7517141fb53f21ee439b355b5a1d0a', '2', 'rafsan', '9566220411', 'this is address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-17 00:00:00', 'chennai', 1, 1, '', '2017-11-09 08:47:20', '2017-11-09 08:47:20', 1, '2017-11-09 08:50:02', '0000-00-00 00:00:00', 0, 0),
(10, 'kathir', 'ravan', '', 'kathirkf@gmail.com', '', '', 'bc6fcd5d19e264e17e2e52908f3c1d8f', '3', 'blazeadmin', '1234567890', 'nungambakkam', 96, 7, 0, '0000-00-00', 0, '0000-00-00', '2017-11-10 00:00:00', '', 1, 1, '', '2017-11-09 10:52:06', '2017-11-09 10:52:06', 1, '2017-11-21 10:33:12', '2017-11-21 10:31:49', 0, 0),
(11, 'Stephen Fleming', 'Lyod', '', 'qateam84@gmail.com', '', '', '94a8212c0646aeaa1b91e13c96d20e86', '1', 'qateam84', '1234567890', 'No:1 tvs street\r\nlord nagar 2nd avenue\r\nMadurai\r\n', 96, 9, 1, '2017-11-01', 1, '2017-11-02', '2017-11-10 00:00:00', 'Trichy', 1, 1, '', '2017-11-10 05:02:38', '2017-11-11 11:22:47', 3, '2017-11-21 09:58:34', '2017-11-10 06:04:28', 0, 0),
(12, 'Md', 'riaz', '', 'riazmd@yopmail.com', '', '', '0e7517141fb53f21ee439b355b5a1d0a', '1', 'riazyop', '9566220411', 'this is a sample address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-24 00:00:00', 'permabur', 1, 1, '', '2017-11-10 07:34:31', '2017-11-11 02:16:46', 11, '2017-11-14 15:52:44', '2017-11-10 09:23:40', 0, 0),
(13, 'naveen kumar', 'harimoorthy h', '', 'test@gmail.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '3', '131105167609224', '8939047585', 'test%$^%$%$!$%$?//', 96, 10, 1, '2017-11-01', 1, '2017-11-22', '2017-11-11 00:00:00', 'chennai', 1, 1, '', '2017-11-11 10:57:55', '2017-11-11 10:57:55', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(14, 'naveen hari 3', 'kumar', '', 'testmailid1002@gmail.com', '', '', 'e10adc3949ba59abbe56e057f20f883e', '1', 'fsgfhgf123456', '8939047585', 'chennai', 96, 7, 0, '0000-00-00', 0, '0000-00-00', '2017-11-11 00:00:00', 'chennai', 1, 1, '', '2017-11-11 11:02:57', '2017-11-11 01:49:15', 11, '2017-11-11 12:15:46', '2017-11-11 11:40:52', 0, 0),
(15, 'naveen harimoo', 'kumar h', '', 'testmailid1003@gmail.com', '', '', 'dc483e80a7a0bd9ef71d8cf973673924', '1', 'jhdgfjhsgfjhgfhs64564654', '8939047585', 'chennai', 9, 12, 0, '0000-00-00', 0, '0000-00-00', '2017-11-11 00:00:00', 'chennai', 1, 1, '', '2017-11-11 11:06:36', '2017-11-11 11:09:27', 2, '2017-11-11 11:09:21', '0000-00-00 00:00:00', 0, 0),
(16, 'naveen', 'kumar', '', 'test@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '1', 'dasfdsfdf', '12345466', '', 9, 13, 1, '2017-10-30', 1, '2017-10-03', '2017-11-21 00:00:00', 'chennai', 1, 1, '', '2017-11-11 12:29:55', '2017-11-11 12:29:55', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(17, 'vinoth', 'target', '', 'vinoth_target@yopmail.com', '', '', '0192023a7bbd73250516f069df18b500', '2', 'vinoth.target', '789654125', '', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2018-11-30 00:00:00', '', 1, 1, '', '2017-11-14 03:28:57', '2017-11-14 03:28:57', 3, '2017-11-20 09:55:25', '2017-11-14 03:34:20', 0, 0),
(18, 'saranya', 'target', '', 'saranya_target@yopmail.com', '', '', '0192023a7bbd73250516f069df18b500', '3', 'saranya.target', '7896541257', '', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2020-11-26 00:00:00', '', 1, 1, '', '2017-11-14 06:22:20', '2017-11-14 06:22:20', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(19, 'naveen', 'kumar', '', 'testmail@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '1', 'ggfdgfg', '8939047585', 'test', 96, 1, 1, '2017-11-14', 1, '2017-10-31', '2017-11-15 00:00:00', 'chennai', 1, 1, '', '2017-11-15 09:52:52', '2017-11-15 09:52:52', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(20, 'kumar', 'harimoorthy g', '', 'test23@gmail.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '2', '123456', '9852145896', '', 96, 9, 1, '2017-11-08', 1, '2017-11-01', '2017-11-16 00:00:00', '', 1, 1, '', '2017-11-15 10:23:05', '2017-11-15 10:25:16', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(21, 'naveen', 'kumar', '', 'testmailid1004@gmail.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '1', 'jhsdgjhgfjh', '8934454542', '', 96, 10, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 10:39:59', '2017-11-15 10:39:59', 2, '2017-11-20 18:34:34', '0000-00-00 00:00:00', 0, 0),
(22, 'kathir', 'ravan', '', 'kathirbtechy@gmail.com', '', '', '369d7a6d5397439c955246e1c6a3147d', '2', 'kathirkf', '981654321', 'address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-24 00:00:00', 'chennai', 1, 1, '', '2017-11-15 12:46:51', '2017-11-15 12:55:36', 3, '2017-11-15 12:58:28', '2017-11-15 12:57:53', 0, 0),
(23, 'test', 'user', '', 'testuser11@gmail.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '2', 'jfhjfh', '5465465465', 'dd', 96, 10, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 02:15:00', '2017-11-15 02:15:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(24, 'kumar', 'hari', '', 'test11@gutsr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '1', 'sjhkjhf', '4564564547', 'fsf', 96, 7, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 02:21:25', '2017-11-15 02:21:25', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(25, 'peter', 'p', '', 'test44@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '1', 'dsf', '4564654654', 'dfg', 96, 10, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 02:24:47', '2017-11-15 02:24:47', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(26, 'ariya', 'q', '', 'test45@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '3', 'sdsfgf', '546545644', 'sf', 96, 9, 0, '0000-00-00', 0, '0000-00-00', '2017-11-22 00:00:00', '', 1, 1, '', '2017-11-15 02:25:32', '2017-11-15 02:25:32', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(27, 'thiru', 'm', '', 'test46@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '4', 'vcg', '5465464', 'sdf', 96, 7, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 02:26:09', '2017-11-15 02:26:09', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(28, 'naveen', 'kumar', '', 'testnaveen@gustr.com', '', '', '5f637f774f8861f37fa26540cdb241fa', '2', 'sfgsf', '6565465456', '', 96, 7, 0, '0000-00-00', 0, '0000-00-00', '2017-11-15 00:00:00', '', 1, 1, '', '2017-11-15 02:36:49', '2017-11-15 02:36:49', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(29, 'Magesh', 'R', '', 'mageshr@blazedream.com', '', '', '3dcd6ad71e261a778b5da9c3219b1212', '1', 'magesh', '9876543210', 'Address', 96, 1, 0, '0000-00-00', 0, '0000-00-00', '2017-11-22 00:00:00', 'New York', 1, 1, '', '2017-11-21 10:29:41', '2017-11-21 10:29:41', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(30, 'Nithya', 'Targetusmle', '', 'nithyablaze@gmail.com', '', '', '7284430427753db97c79354f0b2b1db6', '2', 'nithya.blazedream', '9500453159', 'pycrofts garden road', 96, 14, 1, '2017-11-30', 1, '2017-11-25', '2017-11-23 00:00:00', 'Chennai', 1, 1, '', '2017-11-21 11:23:13', '2017-11-21 11:23:13', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_batch_time_slot`
--

CREATE TABLE IF NOT EXISTS `users_batch_time_slot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_time_slot_id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_ebook_amazon_count`
--

CREATE TABLE IF NOT EXISTS `users_ebook_amazon_count` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` bigint(20) NOT NULL,
  `user_city` bigint(20) NOT NULL,
  `user_skype` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_free_sample`
--

CREATE TABLE IF NOT EXISTS `users_free_sample` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_free_sample`
--

INSERT INTO `users_free_sample` (`id`, `email`, `created`) VALUES
(1, 'vinoth_target@yopmail.com', '2017-11-17 17:10:04'),
(2, 'saranya_target@yopmail.com', '2017-11-17 17:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `users_step_video_liked`
--

CREATE TABLE IF NOT EXISTS `users_step_video_liked` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_step_videos_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users_step_video_liked`
--

INSERT INTO `users_step_video_liked` (`id`, `product_step_videos_id`, `user_id`, `created`) VALUES
(1, 3, 21, '2017-11-20 11:22:35'),
(2, 4, 21, '2017-11-20 11:22:41'),
(3, 47, 21, '2017-11-20 11:22:50'),
(4, 3, 11, '2017-11-21 10:13:36'),
(5, 47, 11, '2017-11-21 10:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `users_time_slot`
--

CREATE TABLE IF NOT EXISTS `users_time_slot` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `time_slot_id` bigint(20) NOT NULL,
  `batch_id` bigint(20) NOT NULL,
  `date_time` datetime NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `payment_method_status` tinyint(1) DEFAULT '0' COMMENT '1 - online , 2- offline',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_webinar`
--

CREATE TABLE IF NOT EXISTS `users_webinar` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `webinar_id` text NOT NULL,
  `webinar_group_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_channels`
--

CREATE TABLE IF NOT EXISTS `youtube_channels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_type` bigint(20) NOT NULL,
  `youtube_link` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `youtube_channels`
--

INSERT INTO `youtube_channels` (`id`, `title`, `slug`, `product_type`, `youtube_link`, `created`, `modified`) VALUES
(1, 'customer', 'customer', 0, 'https://www.youtube.com/watch?v=w12QsKctrLQ', '2017-11-15 13:09:53', '2017-11-15 13:10:39'),
(2, 'customer review1', 'httpswwwyoutubecomwatchvmvbxe1wjgmi', 0, 'https://www.youtube.com/watch?v=MvbxE1WJGmI', '2017-11-15 13:11:31', '0000-00-00 00:00:00'),
(3, 'customer review2', 'httphttpswwwyoutubecomwatchvmvbxe1wjgm', 0, 'http://https://www.youtube.com/watch?v=MvbxE1WJGm', '2017-11-15 13:11:31', '0000-00-00 00:00:00'),
(4, 'customer review3', 'httpswwwyoutubecomwatchvbqu-dqkoec4', 0, 'https://www.youtube.com/watch?v=BqU-DqKOEc4', '2017-11-15 13:11:31', '0000-00-00 00:00:00'),
(5, 'test1', 'httpswwwyoutubecomwatchvbqu-dqkoec4-1', 0, 'https://www.youtube.com/watch?v=BqU-DqKOEc4', '2017-11-15 13:12:04', '0000-00-00 00:00:00'),
(6, 'test2', 'httpswwwyoutubecomwatchvbqu-dqkoec4-2', 0, 'https://www.youtube.com/watch?v=BqU-DqKOEc4', '2017-11-15 13:12:04', '0000-00-00 00:00:00'),
(7, 'test3', 'httpswwwyoutubecomwatchvbqu-dqkoec4-3', 0, 'https://www.youtube.com/watch?v=BqU-DqKOEc4', '2017-11-15 13:12:04', '0000-00-00 00:00:00'),
(8, 'test8', 'test8', 0, 'https://www.youtube.com/watch?v=BqU-DqKOEc4', '2017-11-15 13:12:04', '2017-11-15 14:04:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
