-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2017 at 07:24 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `target_local`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_availability_time_slot`
--

CREATE TABLE `admin_availability_time_slot` (
  `id` bigint(20) NOT NULL,
  `product_type_id` bigint(20) NOT NULL,
  `timeslot_name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `time_duration` int(11) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `is_users_booked` tinyint(1) NOT NULL,
  `is_complete` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_availability_time_slot`
--

INSERT INTO `admin_availability_time_slot` (`id`, `product_type_id`, `timeslot_name`, `date_time`, `date`, `time`, `time_duration`, `batch_name`, `is_users_booked`, `is_complete`, `created`, `modified`) VALUES
(9, 2, 'ASSES_PREP-23Oct17-06AM', '2017-10-23 06:00:00', '0000-00-00', '00:00:00', 1, 'ASSES_PREP-23Oct17-06AM BATCH', 0, 0, '2017-10-24 17:22:08', '2017-10-23 17:37:55'),
(11, 5, 'ON_MOCK-24Oct17-12PM', '2017-10-24 12:00:00', '0000-00-00', '00:00:00', 2, 'ON_MOCK-24Oct17-12PM BATCH', 0, 0, '2017-10-23 17:39:47', '2017-10-23 17:39:47'),
(15, 5, 'ON_MOCK-25Oct17-10AM', '2017-10-25 10:00:00', '0000-00-00', '00:00:00', 2, 'ON_MOCK-25Oct17-10AM BATCH', 0, 0, '2017-10-23 18:30:12', '2017-10-23 18:30:12'),
(16, 2, 'ASSES_PREP-25Oct17-12PM', '2017-10-25 12:00:00', '0000-00-00', '00:00:00', 1, 'ASSES_PREP-25Oct17-12AM Batch', 0, 0, '2017-10-23 18:31:12', '2017-10-23 18:31:12'),
(18, 9, 'CCC-23Oct17-10PM', '2017-10-23 22:00:00', '0000-00-00', '00:00:00', 1, 'CCC - 8 AM Batch', 0, 0, '2017-10-24 17:50:24', '2017-10-23 20:17:36'),
(19, 3, 'PNC-08Nov17-09AM', '2017-11-08 09:00:00', '0000-00-00', '00:00:00', 1, 'PNC-03Nov17-04AM Batch', 0, 0, '2017-10-23 20:22:11', '2017-10-23 20:22:11'),
(20, 2, 'ASSES_PREP-06Nov17-12PM', '2017-11-06 12:00:00', '0000-00-00', '00:00:00', 1, 'ASSES_PREP-06Nov17-12PM Batch', 0, 0, '2017-10-23 20:23:15', '2017-10-23 20:23:15'),
(21, 5, 'ON_MOCK-09Nov17-01PM', '2017-11-09 13:00:00', '0000-00-00', '00:00:00', 2, 'ON_MOCK-09Nov17-01PM Batch', 0, 0, '2017-10-23 20:28:56', '2017-10-23 20:28:56'),
(22, 3, 'PNC-25Oct17-06PM', '2017-10-25 18:00:00', '0000-00-00', '00:00:00', 1, 'PNC-25Oct17-10AM Batch', 1, 0, '2017-10-23 20:31:49', '2017-10-23 20:31:49'),
(23, 5, 'ON_MOCK-29Oct17-08PM', '2017-10-29 20:00:00', '0000-00-00', '00:00:00', 2, '', 0, 0, '2017-10-24 17:09:47', '2017-10-24 10:51:38'),
(24, 10, 'RRC-27Oct17-10AM', '2017-10-27 10:00:00', '0000-00-00', '00:00:00', 1, '', 0, 0, '2017-10-24 17:09:23', '2017-10-24 15:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `admin_batch_list`
--

CREATE TABLE `admin_batch_list` (
  `id` bigint(20) NOT NULL,
  `time_slot_id` bigint(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `duration_part` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_batch_list`
--

INSERT INTO `admin_batch_list` (`id`, `time_slot_id`, `class_id`, `duration_part`, `date_time`, `date`, `time`) VALUES
(33, 11, 1, 1, '2017-10-24 12:00:00', '0000-00-00', '00:00:00'),
(42, 15, 1, 1, '2017-10-25 10:00:00', '0000-00-00', '00:00:00'),
(43, 15, 1, 2, '2017-10-25 11:00:00', '0000-00-00', '00:00:00'),
(44, 16, 1, 1, '2017-10-25 12:00:00', '0000-00-00', '00:00:00'),
(57, 19, 1, 1, '2017-11-08 09:00:00', '0000-00-00', '00:00:00'),
(58, 20, 1, 1, '2017-11-06 12:00:00', '0000-00-00', '00:00:00'),
(59, 21, 1, 1, '2017-11-09 13:00:00', '0000-00-00', '00:00:00'),
(60, 21, 1, 2, '2017-11-09 14:00:00', '0000-00-00', '00:00:00'),
(61, 22, 1, 1, '2017-10-25 18:00:00', '0000-00-00', '00:00:00'),
(85, 24, 1, 1, '2017-10-27 10:00:00', '0000-00-00', '00:00:00'),
(86, 24, 2, 1, '2017-10-30 10:00:00', '0000-00-00', '00:00:00'),
(87, 24, 3, 1, '2017-11-02 10:00:00', '0000-00-00', '00:00:00'),
(88, 23, 1, 1, '2017-10-29 20:00:00', '0000-00-00', '00:00:00'),
(89, 23, 1, 2, '2017-10-29 21:00:00', '0000-00-00', '00:00:00'),
(90, 9, 1, 1, '2017-10-23 06:00:00', '0000-00-00', '00:00:00'),
(97, 18, 1, 1, '2017-10-23 22:00:00', '0000-00-00', '00:00:00'),
(98, 18, 2, 1, '2017-10-26 08:00:00', '0000-00-00', '00:00:00'),
(99, 18, 3, 1, '2017-10-30 08:00:00', '0000-00-00', '00:00:00'),
(100, 18, 4, 1, '2017-11-01 08:00:00', '0000-00-00', '00:00:00'),
(101, 18, 5, 1, '2017-11-03 09:00:00', '0000-00-00', '00:00:00'),
(102, 18, 6, 1, '2017-12-04 08:00:00', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` bigint(20) NOT NULL,
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
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `first_name`, `last_name`, `display_name`, `email`, `password`, `status`, `reset_token`, `reset_token_date`, `last_login_time`, `total_login_count`, `is_deleted`, `created`, `modified`) VALUES
(1, 'admin', 'admin', '', 'admin', 'admin@targetusmle.com', '0e7517141fb53f21ee439b355b5a1d0a', 1, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, '2017-10-10 16:07:33', '2017-10-10 16:07:33'),
(2, 'admin1', 'admin1', '', 'admin1', 'admin1@targetusmle.com', '0192023a7bbd73250516f069df18b500', 1, '1285940911', '2017-10-11 11:59:58', '0000-00-00 00:00:00', 21, 0, '2017-10-10 16:07:17', '2017-10-10 16:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) NOT NULL,
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
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `created`, `modified`, `name`, `image`, `url`, `page_id`, `position_id`, `is_offer`, `description`, `expiry_date`, `status`) VALUES
(1, '2017-10-11 16:47:50', '0000-00-00 00:00:00', 'Ad 1', 'advertisement.png', 'http://www.targetusmle.com', 2, 2, 0, NULL, '2017-10-31 00:00:00', 1),
(2, '2017-10-11 16:49:05', '0000-00-00 00:00:00', 'Ad 2', 'advertisement1.png', 'http://www.targetusmle.com', 2, 2, 0, NULL, '2017-10-31 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ad_page`
--

CREATE TABLE `ad_page` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `ad_page_position` (
  `id` bigint(20) NOT NULL,
  `ad_page_id` bigint(20) NOT NULL,
  `position` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `banner_management` (
  `id` bigint(20) NOT NULL,
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
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner_management`
--

INSERT INTO `banner_management` (`id`, `name`, `content_one`, `content_two`, `url`, `directory_path`, `file_name`, `site_reference_id`, `sort_order`, `status`, `created`, `modified`) VALUES
(1, 'Home Banner 1', 'Home', 'This is home page banner', 'http://www.targetusmle.com', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner.jpg', 1, 0, 1, '2017-10-11 15:25:00', '2017-10-11 15:25:00'),
(2, 'Home Banner 2', 'Home', 'This is banner 2', 'http://www.targetusmle.com', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner1.jpg', 1, 0, 1, '2017-10-11 15:31:31', '2017-10-11 15:31:31'),
(3, 'Home Banner 3', 'Home', 'This is banner 3', '', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner2.jpg', 1, 0, 1, '2017-10-11 15:51:55', '2017-10-11 15:51:55'),
(4, 'Home Banner 4', 'Home', 'This is banner 4', '', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner3.jpg', 1, 0, 1, '2017-10-11 15:52:20', '2017-10-11 15:52:20'),
(5, 'Home Banner 5', 'Home', 'Banner 5', '', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner4.jpg', 1, 0, 1, '2017-10-11 15:52:40', '2017-10-11 15:52:40'),
(6, 'Online video Tutorials', 'Online Video Tutorial', 'this is video banner', '', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/banners/', 'adminbanner5.jpg', 2, 0, 1, '2017-10-11 15:53:10', '2017-10-11 15:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `posted_by` int(11) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `short_description`, `description`, `image`, `posted_by`, `category_id`, `status`, `created`, `modified`) VALUES
(6, 'test1', 'test1', 'test1', 'test1', 'dummy_logo.png', 2, 3, 1, '2017-10-13 16:39:11', '0000-00-00 00:00:00'),
(7, 'test', 'test-1', '<p>test</p>', '<p>test</p>', 'cron1.png', 2, 2, 1, '2017-10-13 16:45:44', '0000-00-00 00:00:00'),
(9, 'test1', 'test1-1', '<p>test</p>', '<p>test</p>', '', 2, 2, 1, '2017-10-13 17:34:37', '0000-00-00 00:00:00'),
(10, 'test2', 'test2', 'test2', 'test2', 'child1.jpg', 2, 3, 1, '2017-10-23 14:58:21', '0000-00-00 00:00:00'),
(12, 'system', 'system', 'Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum', 'Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsumLorem ipsum Lorem ipsum Lorem ipsum', '', 2, 2, 1, '2017-10-23 15:08:03', '0000-00-00 00:00:00'),
(13, 'Blog Videos', 'blog-videos', '<p>blog vids</p>', '<p>blog vids</p>', '', 2, 3, 1, '2017-10-24 10:52:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `no_of_blogs` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `no_of_blogs`, `status`, `created`, `modified`) VALUES
(1, 'Standard CS Encounter', 'standard-cs-encounter', 0, 1, '2017-10-11 17:39:29', '2017-10-11 17:39:29'),
(2, 'Systemwise History', 'systemwise-history', 3, 1, '2017-10-11 17:44:04', '2017-10-11 17:44:04'),
(3, 'Physical Exam Videos', 'physical-exam-videos', 3, 1, '2017-10-13 12:50:56', '2017-10-13 12:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `carrier_applied_users`
--

CREATE TABLE `carrier_applied_users` (
  `id` int(11) NOT NULL,
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carrier_openings`
--

CREATE TABLE `carrier_openings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `city_code` varchar(255) NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `slug`, `city_code`, `country_id`, `status`, `created`, `modified`) VALUES
(1, 'Chennai', 'chennai', '', 96, 1, '2017-10-13 14:33:48', '2017-10-13 14:33:48'),
(2, 'Mumbai', 'mumbai', '', 96, 0, '2017-10-13 14:34:13', '2017-10-13 14:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) NOT NULL,
  `name` varchar(235) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 - inactive , 1 - active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `name`, `slug`, `content`, `sort_order`, `seo_title`, `meta_keywords`, `meta_description`, `status`, `created`, `modified`) VALUES
(1, 'About Us', 'about-us', '<div class="aboutus-sec" id="aboutus">\r\n<div class="wrapper">\r\n<h2>TopSure</h2>\r\n\r\n<p class="first-para">TopSure is a professional consultancy group that provides marketing, business consulting and lead generation services to leading companies in Singapore and abroad.</p>\r\n\r\n<p>Creativity and commitment are the two major values of the company which propel us to bring success to the projects and our clients that we deal with. Our works include major areas such as healthcare, insurance, investments, business consulting and professional services.</p>\r\n\r\n<p>You have a business need, let&#39;s catch up over a coffee!</p>\r\n</div>\r\n</div>', 2, '', '', '', 1, '2017-07-27 13:08:13', '2017-08-14 11:12:27'),
(2, 'Privacy Policy', 'privacy-policy', '<h4>Privacy &amp; Confidentiality</h4>\r\n\r\n<p>TopSure is a brand and a web platform (the &quot;Platform&quot;) owned and operated by J Ben Consulting Pte. Ltd. Singapore (&quot;JBen&quot; or &quot;The Company&quot;). JBen is extremely concerned about User&#39;s privacy when collecting User&#39;s personal information. Please read this Policy to learn more details.</p>\r\n\r\n<p>JBen does not collect any personal particulars from the User to download the Platform or access the information and content that are available on the Platform. But if the User wants to engage JBen to inquire and collect data on behalf of the User from suppliers and third party vendors for their interested products and/or services that are displayed on the Platform, then the User acknowledges and agrees to freely provide their following personal particulars for the same through the Platform such as name, mobile number, email ID, age etc. which are not otherwise publicly available. The protection of User&#39;s personal information is extremely important to JBen. This Privacy Policy (&quot;Policy&quot;) describes how JBen collects and uses the personal information that User provides on this Platform. JBen shall make changes to this Policy without prior notice and hence JBen encourages the User to review this Policy regularly for any such changes.</p>\r\n\r\n<p>JBen, as the owner and operator of the Platform, does not rent, sell or share personal information about the User with other people or non-affiliated companies, except to provide the information, data or services the User has requested or under the following circumstances,</p>\r\n\r\n<ul>\r\n	<li>To collect information and data from the suppliers and/or third party vendors that provide specific products and services that the User is interested and/or wants JBen to coordinate for the same.</li>\r\n	<li>To comply court orders or legal process or to exercise or establish its legal rights or defend against legal claims.</li>\r\n</ul>\r\n\r\n<p>JBen utilises highly secured infrastructure that deploys robust security controls in order to protect collection, transmission, storage and management of all personal information that are collected from the User, JBen cannot assure that all personal information that it may collect will never be disclosed in a manner that is inconsistent with this Policy. There may be instances of inadvertent disclosures, which are beyond the control of or not due to the fault or negligence of JBen. And as a consequence, JBen disclaims any warranties or representations relating to maintenance or non-disclosures of User&#39;s personal information that are collected and shared through the Platform or through other communication means.</p>\r\n\r\n<p>JBen encourages the User to communicate by sending an email to <a href="mailto:info@topsure.com.sg">info@topsure.com.sg</a> if the User has a query, complaint or a problem concerning the privacy policy or to report a privacy related problem.</p>', 1, '', '', 'test', 1, '2017-07-27 13:47:25', '2017-10-12 11:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `slug`, `country_code`, `status`) VALUES
(1, 'Andorra', '', 'AND', 1),
(2, 'United Arab Emirates', '', 'ARE', 1),
(3, 'Afghanistan', '', 'AFG', 1),
(4, 'Antigua and Barbuda', '', 'ATG', 1),
(5, 'Anguilla', '', 'AIA', 1),
(6, 'Albania', '', 'ALB', 1),
(7, 'Armenia', '', 'ARM', 1),
(8, 'Netherlands Antilles', '', 'ANT', 1),
(9, 'Angola', '', 'AGO', 1),
(10, 'Argentina', '', 'ARG', 1),
(11, 'Austria', '', 'AUT', 1),
(12, 'Australia', '', 'AUS', 1),
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
(31, 'Belarus', '', 'BLR', 1),
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
(230, 'United States of America', '', 'USA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `reply_to` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `email_variables` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_html` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `created`, `modified`, `from_email`, `reply_to`, `name`, `description`, `subject`, `email_content`, `email_variables`, `is_active`, `is_html`) VALUES
(1, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Forgot Password Alert for User', 'Target USMLE - Forgot Password', 'Target USMLE - Forgot Password', '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;There was recently a request to reset the password for your account. If you requested this password change, please click on the following link to reset your password: Click here to reset your password. or If clicking the link does not work, please copy and paste the URL into your browser instead.</p>\r\n\r\n						<p><strong><a href="[PASSCODELINK]">Click here to Reset Password</a></strong></p>\r\n\r\n						<p><b>Note:</b>&nbsp;Your password reset link will be expired after one day.</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(2, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'User Registration Admin', 'Target USMLE - User Registration(Admin)', 'Target USMLE - User Registration(Admin)', '<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,&nbsp;</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Target USMLE Admin has created and activated your account. Login to Target USMLE portal, using the provided Username and password.</p>\r\n\r\n						<p><b>Email ID: </b>[USER_EMAIL]</p>\r\n\r\n						<p><b>Password&nbsp; :</b> [PASSWORD]</p>\r\n\r\n						<p>Please visit our website at [SITE_LINK]</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">&nbsp;</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(4, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'User Registration', 'Target USMLE - User Registration', 'Target USMLE - Registration Success', '<p>&nbsp;</p>\r\n\r\n<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITE_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,&nbsp;</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; Thank you for registering with Us!!.</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1),
(5, '2015-06-22 11:28:15', '0000-00-00 00:00:00', 'hariharan@blazedream.com', NULL, 'Reset Password Alert for User', 'Target USMLE - Reset Password', 'Target USMLE - Reset Password', '<table border="0" cellpadding="0" cellspacing="0" style="width:100%">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<table border="1" cellpadding="0" cellspacing="0" style="width:550px;border-color:#ccc;">\r\n				<tbody>\r\n					<tr>\r\n						<td style="text-align:center;background-color:#FFF;"><img alt="[SITET_NAME]" src="[LOGO]" style="margin:10px" /></td>\r\n					</tr>\r\n					<tr>\r\n						<td style="padding:15px;font: sans serif;">\r\n						<p>Hi <b>[USERNAME]</b> ,</p>\r\n\r\n						<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; You have successfully reset your password.</p>\r\n\r\n						<p><strong><a href="[SITE_LINK]">Click here for link</a></strong></p>\r\n\r\n						<p>&nbsp;</p>\r\n\r\n						<p>Thanks &amp; Regards,</p>\r\n\r\n						<p><b>[SITE_NAME]</b></p>\r\n						</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_form`
--

CREATE TABLE `enquiry_form` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `question`, `answer`, `sort_order`, `status`, `created`, `modified`) VALUES
(1, 1, 'What is Step 2 CS?', 'Step 2 CS is basically designed to test your ability to perform in a practical environment. Students are tested on written and verbal skills as well as the ability to carry out physical examinations and taking a proper medical history. With adherence to a few strategies during Step 2 CS preparation, a student will be adequately equipped to tackle the test. - See more at: https://www.targetusmle.com/step-2-cs-preparation.php#sthash.TXxJVhop.dpuf', 0, 1, '2017-10-13 15:43:55', '0000-00-00 00:00:00'),
(2, 1, 'What is in offered?', 'The step 2 cs schedule helps as a guideline for medical graduates and doctors to plan their step 2 cs exam date in such a way that they get their score reports on time to appear for the match. A lot of thought needs to go in while looking at the step 2 cs schedule because the score reporting takes longer than it takes for step 1 or step 2 ck. While everyone wants to pass step 2 cs in the first attempt, some students find themselves missing out on the match because they did not plan on failing the first time! - See more at: https://www.targetusmle.com/step-2-cs-schedule.php#sthash.UKvD1Wr2.dpuf', 0, 0, '2017-10-13 15:45:32', '2017-10-13 15:47:41'),
(3, 2, 'What is ecfmg step 2 cs?', '<p>Ecfmg step 2 cs bulletin is published well ahead of time - the previous year for international medical graduates (IMG) to plan your trip to the USA to take this unique exam. You should plan your exam dates/year according to the current ecfmg step 2 cs bulletin of the year you plan to take the exam</p>', 0, 1, '2017-10-13 15:51:03', '2017-10-16 11:26:47'),
(6, 2, 'What is in offered?', '<p>test</p>', 0, 1, '2017-10-13 16:00:18', '2017-10-13 16:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `name`, `slug`, `status`, `created`, `modified`) VALUES
(1, 'USMLE Step 2 CS Exam', 'usmle-step-2-cs-exam', 1, '2017-10-13 15:18:31', '0000-00-00 00:00:00'),
(2, 'USMLE Step 2 CS Study Partners', 'usmle-step-2-cs-study-partners', 1, '2017-10-13 15:19:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faq_queries`
--

CREATE TABLE `faq_queries` (
  `id` int(11) NOT NULL,
  `queries` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` bigint(20) NOT NULL,
  `user_city` bigint(20) NOT NULL,
  `user_skype` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `products` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL,
  `valid_days` int(11) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `is_extended` tinyint(1) NOT NULL,
  `is_webinar` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` tinyint(1) NOT NULL COMMENT '1 -> pending , 2 -> complete d, 3 -> rejected',
  `extended_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_transaction`
--

CREATE TABLE `order_transaction` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_id` text NOT NULL,
  `transaction_info` text NOT NULL,
  `payment_amount` float NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_type_id` bigint(20) NOT NULL,
  `valid_days` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `content_one` text NOT NULL,
  `content_two` text NOT NULL,
  `content_three` text NOT NULL,
  `video_url` text NOT NULL,
  `image` text NOT NULL,
  `product_included` varchar(255) NOT NULL,
  `included_valid_days` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_mock_exam`
--

CREATE TABLE `product_mock_exam` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `type` enum('Online','Live','','') NOT NULL,
  `country_id` bigint(20) NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `timing` time NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_mock_exam_available`
--

CREATE TABLE `product_mock_exam_available` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_mock_exam_id` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc_content`
--

CREATE TABLE `product_pnc_content` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `text_one` text NOT NULL,
  `text_two` text NOT NULL,
  `diagnosis_one_title` text NOT NULL,
  `diagnosis_two_title` text NOT NULL,
  `diagnosis_three_title` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc_submit_list`
--

CREATE TABLE `product_pnc_submit_list` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_pnc_content_id` bigint(20) NOT NULL,
  `attachment_dir` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_pnc__diagnosis`
--

CREATE TABLE `product_pnc__diagnosis` (
  `id` bigint(20) NOT NULL,
  `product_pnc_content_id` bigint(20) NOT NULL,
  `diagnosis_type` enum('one','two','three') NOT NULL,
  `text_one` text NOT NULL,
  `text_two` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_step_categories`
--

CREATE TABLE `product_step_categories` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_step_videos`
--

CREATE TABLE `product_step_videos` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_step_categories_id` bigint(20) NOT NULL,
  `file_url` text NOT NULL,
  `video_type` int(11) NOT NULL COMMENT '1 - high , 2- medium , 3-low',
  `correction_type` enum('Wrong','Correct') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortform` varchar(255) NOT NULL,
  `class_count` int(11) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `slug`, `shortform`, `class_count`, `time_duration`, `created`, `updated`) VALUES
(1, 'Online Video Tutorials', 'online-video-tutorials', 'VID_TUT', 0, 0, '2017-10-12 18:41:10', '0000-00-00 00:00:00'),
(2, 'Assesment Preparation', 'assesment-preparation', 'ASSES_PREP', 1, 1, '2017-10-12 18:45:58', '0000-00-00 00:00:00'),
(3, 'Patient Note Correction', 'patient-note-correction', 'PNC', 1, 1, '2017-10-12 18:46:34', '0000-00-00 00:00:00'),
(4, 'Webinar', 'webinar', 'WEBIN', 0, 0, '2017-10-12 18:47:33', '0000-00-00 00:00:00'),
(5, 'Online Mock Exam', 'online-mock-exam', 'ON_MOCK', 1, 2, '2017-10-12 18:47:52', '0000-00-00 00:00:00'),
(6, 'Live Mock Exam', 'live-mock-exam', 'LIV_MOCK', 0, 0, '2017-10-12 18:47:58', '0000-00-00 00:00:00'),
(7, 'Combo Plan', 'combo-plan', 'COMBO_PLAN', 0, 0, '2017-10-12 18:48:08', '0000-00-00 00:00:00'),
(8, 'Combo Package', 'combo-package', 'COMBO_PACK', 0, 0, '2017-10-12 18:48:16', '0000-00-00 00:00:00'),
(9, 'Complete Comprehensive Course', 'complete-comprehensive-course', 'CCC', 6, 1, '2017-10-20 00:00:00', '0000-00-00 00:00:00'),
(10, 'Rapid Review Course', 'rapid-review-course', 'RRC', 3, 1, '2017-10-12 18:47:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_user_access`
--

CREATE TABLE `product_user_access` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_expiry_date` datetime NOT NULL,
  `is_extended` tinyint(1) NOT NULL,
  `is_expired` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_webinar`
--

CREATE TABLE `product_webinar` (
  `id` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_references`
--

CREATE TABLE `site_references` (
  `id` bigint(20) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `site_settings` (
  `id` bigint(20) NOT NULL,
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
  `is_show` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(10, 5, 'pagination.back', '10', 'You can make changes in front end pagination by using this value. ', 'text', '', 'numberOnly', 'trim|required|numeric', 'Back Pagination', 2, 1),
(11, 1, 'site.address', 'Target USMLE\r\nNo. 2 Reddipalayam Street, 1st Floor,\r\nMugappair West,\r\nChennai 600 037,\r\nINDIA. - See more at: https://www.targetusmle.com/contactus.php#sthash.tIVbm5te.dpuf', 'You can make changes in site address by using this value. ', 'textarea', '', '', 'trim|required', 'Address', 6, 1),
(12, 1, 'site.phone', '+91-9789930077', 'You can make changes in phone number by using this value. ', 'text', '', '', 'trim|required|regex_match[/^(?=.*[0-9])[- +0-9]+$/]', 'Phone no', 4, 1),
(13, 1, 'site.secondary_phone', '+91-9789930077', 'You can make changes in secondary phone number by using this value. ', 'text', '', '', 'trim|required|regex_match[/^(?=.*[0-9])[- +0-9]+$/]', 'Secondary Phone no', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings_categories`
--

CREATE TABLE `site_settings_categories` (
  `id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `show_order` int(11) NOT NULL,
  `is_show` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_settings_categories`
--

INSERT INTO `site_settings_categories` (`id`, `created`, `modified`, `name`, `description`, `show_order`, `is_show`, `is_active`) VALUES
(1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'site', 'Site settings', 1, 1, 1),
(2, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'meta', 'meta details', 2, 1, 1),
(3, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'social', 'social settings', 3, 1, 1),
(4, '2017-10-10 00:00:00', '2017-10-10 00:00:00', 'emailtemplate', 'email template settings', 4, 1, 1),
(5, '2017-10-12 00:00:00', '2017-10-12 00:00:00', 'pagination', 'Pagination', 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `type` enum('TEXT','VIDEO') NOT NULL,
  `youtube_link` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `description`, `category_id`, `type`, `youtube_link`, `created`, `modified`, `status`) VALUES
(1, 'Testimonial 1', '<p>test</p>', 2, 'VIDEO', 'https://www.youtube.com/embed/mTUgRsEwZ7E', '2017-10-16 14:55:01', '2017-10-16 14:55:01', 1),
(2, 'Testimonial 2', '<p>test</p>', 1, 'TEXT', '', '2017-10-16 15:01:03', '2017-10-16 15:01:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_categories`
--

CREATE TABLE `testimonial_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial_categories`
--

INSERT INTO `testimonial_categories` (`id`, `name`, `slug`, `status`, `created`, `modified`) VALUES
(1, 'ONLINE SKYPE TRAINING / LIVE MOCK EXAM, INDIA', 'online-skype-training-live-mock-exam-india', 1, '2017-10-13 19:46:07', '2017-10-13 19:46:07'),
(2, 'ONLINE VIDEO TUTORIAL: 7 Easy Steps 2 CS', 'online-video-tutorial-7-easy-steps-2-cs', 1, '2017-10-13 19:46:49', '2017-10-13 19:46:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `know_about_us` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `country` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `exam_date` datetime NOT NULL,
  `exam_center` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `is_email_verified` tinyint(4) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_batch_time_slot`
--

CREATE TABLE `users_batch_time_slot` (
  `id` bigint(20) NOT NULL,
  `user_time_slot_id` bigint(20) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_ebook_amazon_count`
--

CREATE TABLE `users_ebook_amazon_count` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_address` text NOT NULL,
  `user_country` bigint(20) NOT NULL,
  `user_city` bigint(20) NOT NULL,
  `user_skype` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_free_sample`
--

CREATE TABLE `users_free_sample` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_time_slot`
--

CREATE TABLE `users_time_slot` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `time_slot_id` bigint(20) NOT NULL,
  `batch_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `payment_method_status` tinyint(1) DEFAULT '0' COMMENT '1 - online , 2- offline',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_webinar`
--

CREATE TABLE `users_webinar` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `skype_id` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `youtube_channels`
--

CREATE TABLE `youtube_channels` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_type` bigint(20) NOT NULL,
  `youtube_link` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_availability_time_slot`
--
ALTER TABLE `admin_availability_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_batch_list`
--
ALTER TABLE `admin_batch_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_page`
--
ALTER TABLE `ad_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ad_page_position`
--
ALTER TABLE `ad_page_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_management`
--
ALTER TABLE `banner_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrier_applied_users`
--
ALTER TABLE `carrier_applied_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrier_openings`
--
ALTER TABLE `carrier_openings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry_form`
--
ALTER TABLE `enquiry_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_queries`
--
ALTER TABLE `faq_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_transaction`
--
ALTER TABLE `order_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_mock_exam`
--
ALTER TABLE `product_mock_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_mock_exam_available`
--
ALTER TABLE `product_mock_exam_available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_pnc_content`
--
ALTER TABLE `product_pnc_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_pnc_submit_list`
--
ALTER TABLE `product_pnc_submit_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_pnc__diagnosis`
--
ALTER TABLE `product_pnc__diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_step_categories`
--
ALTER TABLE `product_step_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_step_videos`
--
ALTER TABLE `product_step_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_user_access`
--
ALTER TABLE `product_user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_webinar`
--
ALTER TABLE `product_webinar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_references`
--
ALTER TABLE `site_references`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings_categories`
--
ALTER TABLE `site_settings_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_categories`
--
ALTER TABLE `testimonial_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_batch_time_slot`
--
ALTER TABLE `users_batch_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_ebook_amazon_count`
--
ALTER TABLE `users_ebook_amazon_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_free_sample`
--
ALTER TABLE `users_free_sample`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_time_slot`
--
ALTER TABLE `users_time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_webinar`
--
ALTER TABLE `users_webinar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube_channels`
--
ALTER TABLE `youtube_channels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_availability_time_slot`
--
ALTER TABLE `admin_availability_time_slot`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `admin_batch_list`
--
ALTER TABLE `admin_batch_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ad_page`
--
ALTER TABLE `ad_page`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ad_page_position`
--
ALTER TABLE `ad_page_position`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `banner_management`
--
ALTER TABLE `banner_management`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `carrier_applied_users`
--
ALTER TABLE `carrier_applied_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `carrier_openings`
--
ALTER TABLE `carrier_openings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enquiry_form`
--
ALTER TABLE `enquiry_form`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq_queries`
--
ALTER TABLE `faq_queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_transaction`
--
ALTER TABLE `order_transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_mock_exam`
--
ALTER TABLE `product_mock_exam`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_mock_exam_available`
--
ALTER TABLE `product_mock_exam_available`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_pnc_content`
--
ALTER TABLE `product_pnc_content`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_pnc_submit_list`
--
ALTER TABLE `product_pnc_submit_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_pnc__diagnosis`
--
ALTER TABLE `product_pnc__diagnosis`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_step_categories`
--
ALTER TABLE `product_step_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_step_videos`
--
ALTER TABLE `product_step_videos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product_user_access`
--
ALTER TABLE `product_user_access`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_webinar`
--
ALTER TABLE `product_webinar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site_references`
--
ALTER TABLE `site_references`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `site_settings_categories`
--
ALTER TABLE `site_settings_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimonial_categories`
--
ALTER TABLE `testimonial_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_batch_time_slot`
--
ALTER TABLE `users_batch_time_slot`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_ebook_amazon_count`
--
ALTER TABLE `users_ebook_amazon_count`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_free_sample`
--
ALTER TABLE `users_free_sample`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_time_slot`
--
ALTER TABLE `users_time_slot`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_webinar`
--
ALTER TABLE `users_webinar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `youtube_channels`
--
ALTER TABLE `youtube_channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
