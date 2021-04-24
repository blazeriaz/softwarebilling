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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `slug`, `product_type_id`, `valid_days`, `status`, `created`, `modified`) VALUES
(1, 'Step1', 50, 'step1', 1, 30, 1, '2017-10-24 14:54:19', '2017-10-24 14:54:19'),
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
(17, 'live_mock_exam_Kodambakam', 999, 'live_mock_exam_kodambakam-1', 6, 0, 0, '2017-11-08 00:45:46', '0000-00-00 00:00:00');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
