-- phpMyAdmin SQL Dump
-- version 4.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 06:33 AM
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
-- Table structure for table `product_attributes`
--

DROP TABLE IF EXISTS `product_attributes`;
CREATE TABLE IF NOT EXISTS `product_attributes` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL,
  `content_one` text NOT NULL,
  `content_two` text NOT NULL,
  `content_three` text NOT NULL,
  `video_url` text NOT NULL,
  `image` int(11) NOT NULL,
  `product_included` varchar(255) NOT NULL,
  `included_valid_days` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `content_one`, `content_two`, `content_three`, `content_four`, `content_five`, `video_url`, `image`, `product_included`, `included_valid_days`, `created`, `modified`) VALUES
(1, 1, 'Full 15 min Encounter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar tempor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus sapien nunc eget odio.', '', '', '', 'http://www.youtube.com', '/opt/lampp/htdocs/projects/target_usmle/04development/01source/appdata/online-video/steps/child3.jpg', '', 0, '2017-10-24 14:57:48', '2017-10-24 14:57:48'),
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
(12, 12, 'CS Handbook', 'Lets say you have prepared on your own...', 'Each Case..', 'Practice Three cases back to back...', 'Bottom content...', 'http://www.youtube.com/watch?evax8d', 'view1.png', '', 0, '2017-11-02 17:46:16', '2017-11-02 18:46:16');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
