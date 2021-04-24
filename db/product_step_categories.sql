-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 06:10 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `target_usmle_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_step_categories`
--

CREATE TABLE `product_step_categories` (
  `id` bigint(20) NOT NULL,
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
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(29, 4, 'Chest Pain', 'chest-pain', 0, '', '', '', '', 2, 1, 0, '2017-11-13 03:24:27', '2017-11-13 03:24:27'),
(30, 4, 'Myocardial Infaraction / Angina', 'myocardial-infaraction-angina', 29, '', '', '', '', 1, 1, 0, '2017-11-13 03:25:25', '2017-11-13 03:25:25'),
(31, 4, 'Costochondritis', 'costochondritis', 29, '', '', '', '', 2, 1, 0, '2017-11-13 03:25:50', '2017-11-13 03:25:50'),
(32, 4, 'Gerd', 'gerd', 29, '', '', '', '', 4, 1, 0, '2017-11-13 03:26:02', '2017-11-13 03:26:02'),
(33, 4, 'Pleuritic Pain', 'pleuritic-pain', 29, '', '', '', '', 4, 1, 0, '2017-11-13 03:26:28', '2017-11-13 03:26:28'),
(34, 4, 'Musculoskeletal - Ribs - Myalgia', 'musculoskeletal-ribs-myalgia', 29, '', '', '', '', 5, 1, 0, '2017-11-13 03:27:18', '2017-11-13 03:27:18'),
(35, 4, 'Pericarditis', 'pericarditis', 29, '', '', '', '', 6, 1, 0, '2017-11-13 03:29:30', '2017-11-13 03:29:30'),
(36, 4, 'Aortic Dissection', 'aortic-dissection', 29, '', '', '', '', 7, 1, 0, '2017-11-13 03:29:57', '2017-11-13 03:29:57'),
(37, 4, 'Pulmonary Embolism', 'pulmonary-embolism', 29, '', '', '', '', 8, 1, 0, '2017-11-13 03:30:23', '2017-11-13 03:30:23'),
(38, 4, 'Palpitations', 'palpitations', 0, '', '', '', '', 3, 1, 0, '2017-11-13 03:31:01', '2017-11-13 03:31:01'),
(39, 4, 'Arrhythmia', 'arrhythmia', 38, '', '', '', '', 1, 1, 0, '2017-11-13 03:31:30', '2017-11-13 03:31:30'),
(40, 4, 'Myocardial Infaraction/Angina', 'myocardial-infaractionangina', 38, '', '', '', '', 2, 1, 0, '2017-11-13 03:31:55', '2017-11-13 03:31:55'),
(41, 4, 'Anemia', 'anemia', 38, '', '', '', '', 3, 1, 0, '2017-11-13 03:32:18', '2017-11-13 03:32:18'),
(42, 4, 'Hyperthyroidism', 'hyperthyroidism', 38, '', '', '', '', 4, 1, 0, '2017-11-13 03:32:46', '2017-11-13 03:32:46'),
(43, 4, 'Hypoglycemia', 'hypoglycemia', 38, '', '', '', '', 5, 1, 0, '2017-11-13 03:33:20', '2017-11-13 03:33:20'),
(44, 4, 'Panick Attack', 'panick-attack', 38, '', '', '', '', 6, 1, 0, '2017-11-13 03:33:49', '2017-11-13 03:33:49'),
(45, 4, 'Caffeine Toxicity', 'caffeine-toxicity', 38, '', '', '', '', 7, 1, 0, '2017-11-13 03:34:24', '2017-11-13 03:34:24'),
(46, 4, 'Pheochromocytoma', 'pheochromocytoma', 38, '', '', '', '', 8, 1, 0, '2017-11-13 03:34:59', '2017-11-13 03:34:59'),
(47, 4, 'Breathlessness / SOB', 'breathlessness-sob', 0, '', '', '', '', 4, 1, 0, '2017-11-13 03:35:32', '2017-11-13 03:36:41'),
(48, 4, 'Cardiac', 'cardiac', 47, '', '', '', '', 1, 1, 0, '2017-11-13 03:37:34', '2017-11-13 03:37:34'),
(49, 4, 'Congestive Heart Failure - CHF', 'congestive-heart-failure-chf', 48, '', '', '', '', 1, 1, 0, '2017-11-13 03:38:02', '2017-11-13 03:38:02'),
(50, 4, 'Pulmonary Embolism', 'pulmonary-embolism-1', 48, '', '', '', '', 2, 1, 0, '2017-11-13 03:38:30', '2017-11-13 03:38:30'),
(51, 4, 'Respiratory', 'respiratory', 47, '', '', '', '', 2, 1, 0, '2017-11-13 03:38:56', '2017-11-13 03:38:56'),
(52, 4, 'Lung Infections', 'lung-infections', 51, '', '', '', '', 1, 1, 0, '2017-11-13 03:39:36', '2017-11-13 03:39:36'),
(53, 4, 'COPD', 'copd', 51, '', '', '', '', 2, 1, 0, '2017-11-13 03:39:54', '2017-11-13 03:39:54'),
(54, 4, 'Asthma', 'asthma', 51, '', '', '', '', 3, 1, 0, '2017-11-13 03:40:11', '2017-11-13 03:40:11'),
(55, 4, 'Acute Respiratory Obstruction', 'acute-respiratory-obstruction', 51, '', '', '', '', 4, 1, 0, '2017-11-13 03:40:34', '2017-11-13 03:40:34'),
(56, 4, 'Pneumothorax', 'pneumothorax', 51, '', '', '', '', 5, 1, 0, '2017-11-13 03:41:01', '2017-11-13 03:41:01'),
(57, 4, 'Others', 'others', 47, '', '', '', '', 3, 1, 0, '2017-11-13 03:42:12', '2017-11-13 03:42:12'),
(58, 4, 'Obesity', 'obesity', 57, '', '', '', '', 1, 1, 0, '2017-11-13 03:42:35', '2017-11-13 03:42:35'),
(59, 4, 'Anemai', 'anemai', 57, '', '', '', '', 2, 1, 0, '2017-11-13 03:42:49', '2017-11-13 03:42:49'),
(60, 4, 'Loss Of Consciousness', 'loss-of-consciousness', 0, '', '', '', '', 5, 1, 0, '2017-11-13 03:44:22', '2017-11-13 03:44:22'),
(61, 4, 'Cardiac', 'cardiac-1', 60, '', '', '', '', 1, 1, 0, '2017-11-13 03:45:04', '2017-11-13 03:45:04'),
(62, 4, 'Vasovagal Attack', 'vasovagal-attack', 61, '', '', '', '', 1, 1, 0, '2017-11-13 03:46:59', '2017-11-13 03:46:59'),
(63, 4, 'Postural Hypotension', 'postural-hypotension', 61, '', '', '', '', 2, 1, 0, '2017-11-13 03:48:19', '2017-11-13 03:48:19'),
(64, 4, 'Arrhythmia', 'arrhythmia-1', 61, '', '', '', '', 3, 1, 0, '2017-11-13 03:48:40', '2017-11-13 03:48:40'),
(65, 4, 'Aortic Stenosis', 'aortic-stenosis', 61, '', '', '', '', 4, 1, 0, '2017-11-13 03:48:59', '2017-11-13 03:48:59'),
(66, 4, 'Myocardial Infaraction', 'myocardial-infaraction', 61, '', '', '', '', 5, 1, 0, '2017-11-13 03:49:25', '2017-11-13 03:49:25'),
(67, 4, 'Pulmonary Embolism', 'pulmonary-embolism-2', 61, '', '', '', '', 6, 1, 0, '2017-11-13 03:49:40', '2017-11-13 03:49:40'),
(68, 4, 'Neurological', 'neurological', 60, '', '', '', '', 2, 1, 0, '2017-11-13 03:50:37', '2017-11-13 03:50:37'),
(69, 4, 'Epileptic Seizure', 'epileptic-seizure', 68, '', '', '', '', 1, 1, 0, '2017-11-13 03:50:59', '2017-11-13 03:50:59'),
(70, 4, 'Stroke', 'stroke', 68, '', '', '', '', 2, 1, 0, '2017-11-13 03:51:14', '2017-11-13 03:51:14'),
(71, 4, 'Head Trauma', 'head-trauma', 68, '', '', '', '', 3, 1, 0, '2017-11-13 03:51:31', '2017-11-13 03:51:31'),
(72, 4, 'Metabolic and Others', 'metabolic-and-others', 60, '', '', '', '', 3, 1, 0, '2017-11-13 03:52:35', '2017-11-13 03:52:35'),
(73, 4, 'Severe Anemai', 'severe-anemai', 72, '', '', '', '', 1, 1, 0, '2017-11-13 03:52:57', '2017-11-13 03:52:57'),
(74, 4, 'Hypoglycemia', 'hypoglycemia-1', 72, '', '', '', '', 2, 1, 0, '2017-11-13 03:53:20', '2017-11-13 03:53:20'),
(75, 4, 'Drug Induced', 'drug-induced', 72, '', '', '', '', 3, 1, 0, '2017-11-13 03:53:42', '2017-11-13 03:53:42'),
(76, 4, 'Alcohol Abuse', 'alcohol-abuse', 72, '', '', '', '', 4, 1, 0, '2017-11-13 03:54:03', '2017-11-13 03:54:03'),
(77, 4, 'Acute Blood Loss', 'acute-blood-loss', 72, '', '', '', '', 5, 1, 0, '2017-11-13 03:54:38', '2017-11-13 03:54:38'),
(78, 4, 'Fatigue', 'fatigue', 0, '', '', '', '', 6, 1, 0, '2017-11-13 03:55:12', '2017-11-13 03:55:12'),
(79, 4, 'Anemia', 'anemia-1', 78, '', '', '', '', 1, 1, 0, '2017-11-13 03:55:30', '2017-11-13 03:55:30'),
(80, 4, 'Hypothyroidism', 'hypothyroidism', 78, '', '', '', '', 2, 1, 0, '2017-11-13 03:55:54', '2017-11-13 03:55:54'),
(81, 4, 'Chronic Illness', 'chronic-illness', 78, '', '', '', '', 3, 1, 0, '2017-11-13 03:56:29', '2017-11-13 03:56:29'),
(82, 4, 'Malignancy', 'malignancy', 78, '', '', '', '', 4, 1, 0, '2017-11-13 03:56:58', '2017-11-13 03:56:58'),
(83, 4, 'Chronic Fatigue Syndrome', 'chronic-fatigue-syndrome', 78, '', '', '', '', 5, 1, 0, '2017-11-13 03:57:30', '2017-11-13 03:57:30'),
(84, 4, 'Depression', 'depression', 78, '', '', '', '', 6, 1, 0, '2017-11-13 03:58:00', '2017-11-13 03:58:00'),
(85, 4, 'Diabetes', 'diabetes', 78, '', '', '', '', 7, 1, 0, '2017-11-13 03:58:25', '2017-11-13 03:58:25'),
(86, 4, 'Pain Left Arm', 'pain-left-arm', 0, '', '', '', '', 7, 1, 0, '2017-11-13 03:59:07', '2017-11-13 03:59:07'),
(87, 4, 'Myocardial Infaraction / Angina', 'myocardial-infaraction-angina-1', 86, '', '', '', '', 1, 1, 0, '2017-11-13 03:59:32', '2017-11-13 03:59:32'),
(88, 4, 'Cervical Spondylosis', 'cervical-spondylosis', 86, '', '', '', '', 2, 1, 0, '2017-11-13 04:00:01', '2017-11-13 04:00:01'),
(89, 4, 'Cervical Fracture', 'cervical-fracture', 86, '', '', '', '', 3, 1, 0, '2017-11-13 04:00:23', '2017-11-13 04:00:23'),
(90, 4, 'Shoulder Dislocation/Fracture', 'shoulder-dislocationfracture', 86, '', '', '', '', 4, 1, 0, '2017-11-13 04:00:49', '2017-11-13 04:00:49'),
(91, 4, 'Myalgia/Muscle SPA SM', 'myalgiamuscle-spa-sm', 86, '', '', '', '', 5, 1, 0, '2017-11-13 04:01:16', '2017-11-13 04:01:16'),
(92, 4, 'Cellulitis', 'cellulitis', 86, '', '', '', '', 6, 1, 0, '2017-11-13 04:01:58', '2017-11-13 04:01:58'),
(93, 4, 'Swelling Of Leg', 'swelling-of-leg', 0, '', '', '', '', 7, 1, 0, '2017-11-13 04:02:47', '2017-11-13 04:02:47'),
(94, 4, 'Congestive Heart Failure', 'congestive-heart-failure', 93, '', '', '', '', 1, 1, 0, '2017-11-13 04:03:17', '2017-11-13 04:03:17'),
(95, 4, 'Cirrhosis and Liver failure', 'cirrhosis-and-liver-failure', 93, '', '', '', '', 2, 1, 0, '2017-11-13 04:04:10', '2017-11-13 04:04:10'),
(96, 4, 'Nephrotic Syndrome', 'nephrotic-syndrome', 93, '', '', '', '', 3, 1, 0, '2017-11-13 04:04:35', '2017-11-13 04:04:35'),
(97, 4, 'Prolonged Standing/Sitting', 'prolonged-standingsitting', 93, '', '', '', '', 4, 1, 0, '2017-11-13 04:05:07', '2017-11-13 04:05:07'),
(98, 4, 'Lymphatic Blockage', 'lymphatic-blockage', 93, '', '', '', '', 5, 1, 0, '2017-11-13 04:05:35', '2017-11-13 04:05:35'),
(99, 4, 'Cellulitis', 'cellulitis-1', 93, '', '', '', '', 5, 1, 0, '2017-11-13 04:06:01', '2017-11-13 04:06:01'),
(100, 4, 'Deep vein Thrombosis', 'deep-vein-thrombosis', 93, '', '', '', '', 7, 1, 0, '2017-11-13 04:06:28', '2017-11-13 04:06:28'),
(101, 4, 'Cyanosis', 'cyanosis', 0, '', '', '', '', 9, 1, 0, '2017-11-13 04:10:09', '2017-11-13 04:10:09'),
(102, 4, 'Bronchiolits', 'bronchiolits', 101, '', '', '', '', 1, 1, 0, '2017-11-13 04:11:16', '2017-11-13 04:11:16'),
(103, 4, 'Pulmonary Hypertension', 'pulmonary-hypertension', 101, '', '', '', '', 2, 1, 0, '2017-11-13 04:13:12', '2017-11-13 04:13:12'),
(104, 4, 'Eisenmunger Syndrome', 'eisenmunger-syndrome', 101, '', '', '', '', 3, 1, 0, '2017-11-13 04:13:48', '2017-11-13 04:13:48'),
(105, 4, 'Respi', 'respi-2', 0, '', '', '', '', 10, 1, 0, '2017-11-13 04:14:30', '2017-11-13 04:14:30'),
(106, 4, 'Cough', 'cough', 105, '', '', '', '', 1, 1, 0, '2017-11-13 04:14:46', '2017-11-13 04:14:46'),
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
(117, 4, 'Asthma', 'asthma-2', 107, '', '', '', '', 1, 1, 0, '2017-11-13 04:20:06', '2017-11-13 04:20:06'),
(118, 4, 'Copd/Acute Bronchitis', 'copdacute-bronchitis', 107, '', '', '', '', 2, 1, 0, '2017-11-13 04:20:44', '2017-11-13 04:20:44'),
(119, 4, 'Anaphyalaxis', 'anaphyalaxis', 107, '', '', '', '', 3, 1, 0, '2017-11-13 04:21:10', '2017-11-13 04:21:10'),
(120, 4, 'Pneumonia', 'pneumonia-1', 107, '', '', '', '', 4, 1, 0, '2017-11-13 04:21:30', '2017-11-13 04:21:30'),
(121, 4, 'Foreigh Body Aspiration', 'foreigh-body-aspiration', 107, '', '', '', '', 5, 1, 0, '2017-11-13 04:21:49', '2017-11-13 04:21:49'),
(122, 4, 'GERA', 'gera', 107, '', '', '', '', 7, 1, 0, '2017-11-13 04:22:03', '2017-11-13 04:22:03'),
(123, 4, 'Lunga CA', 'lunga-ca', 107, '', '', '', '', 7, 1, 0, '2017-11-13 04:22:23', '2017-11-13 04:22:23'),
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
(134, 6, 'Cardio Ideal Corrected PN', 'cardio-ideal-corrected-pn', 0, '', 'a32df119ef7f617d709fbc0e566ffcab.jpg', '2f2a75b41f3537272b5ee6a9ff5422db.pdf', '5d4a5b84ae61116f863e944868128f5b.pdf', 1, 1, 0, '2017-11-13 04:36:41', '2017-11-13 04:36:41'),
(135, 6, 'Respiratory', 'respiratory-1', 0, '', '1f4cd940ecf7dff264b2cc6c5dfa834c.jpg', '4e536a5bb6c59b55c3452e6311e40fd0.pdf', '0ad3ecfcda650df22f3ee05636f02b36.pdf', 2, 1, 0, '2017-11-13 04:37:17', '2017-11-13 04:37:17'),
(136, 6, 'OBS / GYN', 'obs-gyn-3', 0, '', '03b54be977bb8a8f7bcae910f764a696.jpg', '8904fcf624bfecdf6d3ea1e88f5c9e13.pdf', '818ef72ce415538e66b99ca40b0acdbd.pdf', 3, 1, 0, '2017-11-13 04:37:52', '2017-11-13 04:37:52'),
(137, 6, 'Genitourinary/abdomen', 'genitourinaryabdomen', 0, '', '3a5b519d8613bf73f91a851875d62711.jpg', 'a19edabc4e0ef4f5711c8f6cfce496d9.pdf', '8abd1192ce1073111a9f2f51c7f9c8a4.pdf', 4, 1, 0, '2017-11-13 04:38:44', '2017-11-13 04:38:44'),
(138, 6, 'Joint', 'joint-3', 0, '', 'ad6121e319320d52503821d4d1a5902d.jpg', '125c9bd15c910d08daf0372409b7fc13.pdf', 'a7ff2dba05aacbea545845b75d1539d5.pdf', 5, 1, 0, '2017-11-13 04:39:14', '2017-11-13 04:39:14'),
(139, 6, 'Nervous - Paediatrics', 'nervous-paediatrics', 0, '', 'c6b2efbc5dd0a0483216662456cefe40.jpg', 'c491648e08ee32e341f8ff8e393cbdef.pdf', 'dbf12f4d6ad65028e667d6c40d14b8d3.pdf', 6, 1, 0, '2017-11-13 04:40:11', '2017-11-13 04:40:11'),
(140, 6, 'Heent', 'heent-3', 0, '', '6b2824d34553c26729ca032c535d7f48.jpg', '268fb9353676134b13557af0d1478385.pdf', '7516acf9d149cb11ae8886ef48c3198e.pdf', 7, 1, 0, '2017-11-13 04:40:44', '2017-11-13 04:40:44'),
(141, 6, 'psychitary / general', 'psychitary-general', 0, '', 'd4ba615caca17424d175ca2f10638f5f.jpg', '0417ecedc26fa17d25c9276148ee6f4a.pdf', '4236e3dc457ac27841f4f741d0282f5e.pdf', 8, 1, 0, '2017-11-13 04:41:19', '2017-11-13 04:41:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_step_categories`
--
ALTER TABLE `product_step_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_step_categories`
--
ALTER TABLE `product_step_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
