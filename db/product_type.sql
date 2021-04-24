-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2017 at 08:36 AM
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
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `shortform` varchar(255) NOT NULL,
  `class_count` int(11) NOT NULL,
  `user_count` int(11) NOT NULL,
  `time_duration` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(11, 'CS Handbook', 'cs-handbook', 'ebook', 0, 0, 0, '2017-10-31 18:47:06', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
