-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 08:16 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spesialisdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`) VALUES
(72, 'uploads/favicon7.png', 'Mr. Accountant', 'accountant@dms.com', 'New York, USA', '+880123456789', '', '112'),
(81, NULL, 'Melisa Danarto', 'kasir@umsu.ac.id', 'Medan', '085234', NULL, '1606');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `room_id` varchar(500) DEFAULT NULL,
  `live_meeting_link` varchar(500) DEFAULT NULL,
  `app_time` varchar(500) DEFAULT NULL,
  `app_time_full_format` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `autoemailshortcode`
--

CREATE TABLE `autoemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `autoemailshortcode`
--

INSERT INTO `autoemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'payment'),
(2, '{lastname}', 'payment'),
(3, '{name}', 'payment'),
(4, '{amount}', 'payment'),
(52, '{doctorname}', 'appoinment_confirmation'),
(42, '{firstname}', 'appoinment_creation'),
(51, '{name}', 'appoinment_confirmation'),
(50, '{lastname}', 'appoinment_confirmation'),
(49, '{firstname}', 'appoinment_confirmation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{time_slot}', 'appoinment_creation'),
(46, '{appoinmentdate}', 'appoinment_creation'),
(45, '{doctorname}', 'appoinment_creation'),
(44, '{name}', 'appoinment_creation'),
(43, '{lastname}', 'appoinment_creation'),
(26, '{name}', 'doctor'),
(27, '{firstname}', 'doctor'),
(28, '{lastname}', 'doctor'),
(29, '{company}', 'doctor'),
(41, '{doctor}', 'patient'),
(40, '{company}', 'patient'),
(39, '{lastname}', 'patient'),
(38, '{firstname}', 'patient'),
(37, '{name}', 'patient'),
(36, '{department}', 'doctor'),
(53, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{time_slot}', 'appoinment_confirmation'),
(55, '{hospital_name}', 'appoinment_confirmation'),
(56, '{start_time}', 'meeting_creation'),
(57, '{patient_name}', 'meeting_creation'),
(58, '{doctor_name}', 'meeting_creation'),
(59, '{hospital_name}', 'meeting_creation'),
(60, '{meeting_link}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autoemailtemplate`
--

CREATE TABLE `autoemailtemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `autoemailtemplate`
--

INSERT INTO `autoemailtemplate` (`id`, `name`, `message`, `type`, `status`) VALUES
(1, 'Payment successful email to patient', '<p>Dear {name}, Your paying amount - Tk {amount} was successful.</p>\r\n\r\n<p>Thank You</p>\r\n', 'payment', 'Active'),
(9, 'Appointment creation email to patient', 'Dear {name},<br />\r\nYou have an &nbsp;appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_creation', 'Active'),
(10, 'Appointment Confirmation email  to patient', 'Dear {name},<br />\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_confirmation', 'Active'),
(11, 'Meeting Schedule Notification To Patient', '<p>Dear {patient_name},</p>\r\n\r\n<p>You have a Live Video Meeting with {doctor_name} on {start_time}.<br />\r\nPlease click on this link to join the meeting&nbsp; {meeting_link} .<br />\r\nFor more information please contact with {hospital_name} .</p>\r\n\r\n<p>Regards</p>\r\n', 'meeting_creation', 'Active'),
(6, 'send joining confirmation to Doctor', '<p>Dear {name},<br />\r\nYou are appointed as a doctor&nbsp; in {department}.<br />\r\nThank You</p>\r\n\r\n<p>{company}</p>\r\n', 'doctor', 'Active'),
(8, 'Patient Registration Confirmation ', '<p>Dear {name},</p>\r\n\r\n<p>You are registered to {company} as a patient to {doctor}.</p>\r\n\r\n<p>Regards</p>\r\n', 'patient', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `autosmsshortcode`
--

CREATE TABLE `autosmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `autosmsshortcode`
--

INSERT INTO `autosmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{name}', 'payment'),
(2, '{firstname}', 'payment'),
(3, '{lastname}', 'payment'),
(4, '{amount}', 'payment'),
(55, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{doctorname}', 'appoinment_confirmation'),
(53, '{name}', 'appoinment_confirmation'),
(52, '{lastname}', 'appoinment_confirmation'),
(51, '{firstname}', 'appoinment_confirmation'),
(50, '{time_slot}', 'appoinment_creation'),
(49, '{appoinmentdate}', 'appoinment_creation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{doctorname}', 'appoinment_creation'),
(46, '{name}', 'appoinment_creation'),
(45, '{lastname}', 'appoinment_creation'),
(44, '{firstname}', 'appoinment_creation'),
(28, '{firstname}', 'doctor'),
(29, '{lastname}', 'doctor'),
(30, '{name}', 'doctor'),
(31, '{company}', 'doctor'),
(43, '{doctor}', 'patient'),
(42, '{company}', 'patient'),
(41, '{lastname}', 'patient'),
(40, '{firstname}', 'patient'),
(39, '{name}', 'patient'),
(38, '{department}', 'doctor'),
(56, '{time_slot}', 'appoinment_confirmation'),
(57, '{hospital_name}', 'appoinment_confirmation'),
(58, '{start_time}', 'meeting_creation'),
(59, '{patient_name}', 'meeting_creation'),
(60, '{doctor_name}', 'meeting_creation'),
(61, '{hospital_name}', 'meeting_creation'),
(62, '{meeting_link}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autosmstemplate`
--

CREATE TABLE `autosmstemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `autosmstemplate`
--

INSERT INTO `autosmstemplate` (`id`, `name`, `message`, `type`, `status`) VALUES
(1, 'Payment successful sms to patient', 'Dear {name},\r\n Your paying amount - Tk {amount} was successful.\r\nThank You\r\nPlease contact our support for further queries.', 'payment', 'Active'),
(12, 'Appointment Confirmation sms to patient', 'Dear {name},\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_confirmation', 'Active'),
(13, 'Appointment creation sms to patient', 'Dear {name},\r\nYou have an  appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_creation', 'Active'),
(14, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. Click on this link to join the meeting {meeting_link} . For more information contact with {hospital_name} .\r\nRegards ', 'meeting_creation', 'Active'),
(9, 'send appoint confirmation to Doctor', 'Dear {name},\nYou are appointed as a doctor in {department} .\nThank You\n{company}', 'doctor', 'Active'),
(11, 'Patient Registration Confirmation ', 'Dear {name},\n You are registred to {company} as a patient to {doctor}. \nRegards', 'patient', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bankb`
--

CREATE TABLE `bankb` (
  `id` int(100) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bankb`
--

INSERT INTO `bankb` (`id`, `group`, `status`) VALUES
(1, 'A+', '0 Bags'),
(2, 'A-', '0 Bags'),
(3, 'B+', '0 Bags'),
(4, 'B-', '0 Bags'),
(5, 'AB+', '0 Bags'),
(6, 'AB-', '0 Bags'),
(7, 'O+', '0 Bags'),
(8, 'O-', '0 Bags');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_report`
--

CREATE TABLE `diagnostic_report` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `department`, `profile`, `x`, `y`, `ion_user_id`) VALUES
(6, 'uploads/Screenshot_2023-04-11_204722.png', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', 'siti@umsu.ac.id', 'Medan, SUMUT', '-', 'THT', 'Spesialis THT', NULL, NULL, '1589'),
(7, 'uploads/download(2).png', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', 'edy@umsu.ac.id', 'Medan, SUMUT', '-', 'THT', 'Spesialis THT', NULL, NULL, '1590'),
(8, 'uploads/WhatsApp_Image_2023-04-11_at_15_28_23.png', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', 'putri@umsu.ac.id', 'Medan, SUMUT', '-', 'SK', 'Spesialis Kulit dan Kelamin', NULL, NULL, '1591'),
(9, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image4519777.png', 'dr.Rahmawati, M.Ked (PD), Sp.PD', 'rahmawati@umsu.ac.id', 'Medan, SUMUT', '-', 'SPD', 'Spesialis Penyakit Dalam', NULL, NULL, '1592'),
(10, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197771.png', 'dr.Ren Astrid Allail Siregar, Sp.PA', 'ren@umsu.ac.id', 'Medan, SUMUT', '-', 'SPA', 'Spesialis Patologi Anatomik', NULL, NULL, '1593'),
(11, 'uploads/WhatsApp_Image_2023-04-11_at_15_20_24.jpg', 'dr.Huwainan Nisa Nasution, M.Kes, Sp. PD', 'huwainan@umsu.ac.id', 'Medan, SUMUT', '-', 'SPD', 'Spesialis Penyakit Dalam', NULL, NULL, '1594'),
(12, 'uploads/download(2)1.png', 'dr.Hendra Sutysna, M.Biomed, AIFO-K, Sp. KKLP', 'hendra@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1595'),
(13, 'uploads/WhatsApp_Image_2023-04-11_at_15_20_00.png', 'dr.Eka Febriyanti, M.Gizi', 'eka@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1596'),
(14, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197772.png', 'dr.Nurhasanah, Sp.K.J', 'nurhasanah@umsu.ac.id', 'Medan, SUMUT', '-', 'SPJ', 'Spesialis Kedokteran Jiwa', NULL, NULL, '1597'),
(15, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197773.png', 'dr.Leny Wardaini S, M.Ked (Neu) Sp.S', 'leny@umsu.ac.id', 'Medan, SUMUT', '-', 'SN', 'Spesialis Neurologi', NULL, NULL, '1598'),
(16, 'uploads/dr_-Rahmanita-Sinaga-M_Ked-OG-Sp_OG-225x300.jpg', 'dr.Rahmanita Sinaga, M.Ked(OG). Sp.OG', 'rahmanita@umsu.ac.id', 'Medan, SUMUT', '-', 'SO', 'Spesialis Obgyn', NULL, NULL, '1599'),
(17, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197774.png', 'dr.Yuanita Mayasari Aritonang, Sp.PK', 'yuanita@umsu.ac.id', 'Medan, SUMUT', '-', 'SPK', 'Spesialis Patologi Klinik', NULL, NULL, '1600'),
(18, 'uploads/WhatsApp_Image_2023-04-11_at_14_30_16.png', 'dr.Nurlina Setiadi', 'nurlina@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1601');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `reciepient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `subject`, `date`, `message`, `reciepient`, `user`) VALUES
(52, 'Pro-active Email for employment verification ( 12305-0121-0505)', '1615197338', '<p>kkgjgjhgj</p>\r\n', 'rizvi.mahmud.plabon@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `smtp_host` varchar(1000) DEFAULT NULL,
  `smtp_port` varchar(1000) DEFAULT NULL,
  `send_multipart` varchar(1000) DEFAULT NULL,
  `mail_provider` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `admin_email`, `type`, `user`, `password`, `smtp_host`, `smtp_port`, `send_multipart`, `mail_provider`) VALUES
(1, 'shaibal@codearistos.net', 'Domain Email', '', '', '', '', '', NULL),
(6, NULL, 'Smtp', 'sahashaibal22@yahoo.com', 'YXNvdWh6eGNqYW1ydmN2eQ==', 'smtp.mail.yahoo.com', '587', '1', 'yahoo');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `datestring` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `date`, `note`, `amount`, `user`, `datestring`) VALUES
(89, 'USG 2D', '1681228212', 'kertas USG, jelly, buku USG dari klinik', '150000', '1', '11/04/23'),
(90, 'USG 4D', '1681228260', 'kertas USG, jelly, buku USG dari klinik', '250000', '1', '11/04/23');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `description`, `x`, `y`) VALUES
(59, 'USG 2D', 'print out 2d', NULL, NULL),
(60, 'USG 4D', 'print out 2d+4d', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `img_url`, `name`, `profile`, `description`) VALUES
(1, 'uploads/images.jpg', 'Dr Momenuzzaman', 'Cardiac Specialized', 'Redantium, totam rem aperiam, eaque ipsa qu ab illo inventore veritatis et quasi architectos beatae vitae dicta sunt explicabo. Nemo enims sadips ipsums un.'),
(2, 'uploads/doctor.png', 'Dr RahmatUllah Asif', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(3, 'uploads/download_(2)2.png', 'Dr A.R.M. Jamil', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Accountant', 'For Financial Activities'),
(4, 'Doctor', ''),
(5, 'Patient', ''),
(6, 'Nurse', ''),
(7, 'Pharmacist', ''),
(8, 'Laboratorist', ''),
(10, 'Receptionist', 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`) VALUES
(3, 'uploads/favicon1.png', 'Triana', 'lab@umsu.ac.id', 'Tembung', '+880123456789', '', '', '111');

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reference_value` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lab_category`
--

INSERT INTO `lab_category` (`id`, `category`, `description`, `reference_value`) VALUES
(35, 'Troponin-I', 'Pathological Test', ''),
(36, 'CBC (DIGITAL)', 'Pathological Test', ''),
(37, 'Eosinophil', 'Pathological Test', ''),
(38, 'Platelets', 'Pathological Test', ''),
(39, 'Malarial Parasites (MP)', 'Pathological Test', ''),
(40, 'BT/ CT', 'Pathological Test', ''),
(41, 'ASO Titre', 'Pathological Test', ''),
(42, 'CRP', 'Pathological Test', ''),
(43, 'R/A test', 'Pathological Test', ''),
(44, 'VDRL', 'Pathological Test', ''),
(45, 'TPHA', 'Pathological Test', ''),
(46, 'HBsAg (Screening)', 'Pathological Test', ''),
(47, 'HBsAg (Confirmatory)', 'Pathological Test', ''),
(48, 'CFT for Kala Zar', 'Pathological Test', ''),
(49, 'CFT for Filaria', 'Pathological Test', ''),
(50, 'Pregnancy Test', 'Pathological Test', ''),
(51, 'Blood Grouping', 'Pathological Test', ''),
(52, 'Widal Test', 'Pathological Test', '(70-110)mg/dl'),
(53, 'RBS', 'Pathological Test', ''),
(54, 'Blood Urea', 'Pathological Test', ''),
(55, 'S. Creatinine', 'Pathological Test', ''),
(56, 'S. cholesterol', 'Pathological Test', ''),
(57, 'Fasting Lipid Profile', 'Pathological Test', ''),
(58, 'S. Bilirubin', 'Pathological Test', ''),
(59, 'S. Alkaline Phosohare', 'Pathological Test', ''),
(61, 'S. Calcium', 'Pathological Test', ''),
(62, 'RBS with CUS', 'Pathological Test', ''),
(63, 'SGPT', 'Pathological Test', ''),
(64, 'SGOT', 'Pathological Test', ''),
(65, 'Urine for R/E', 'Pathological Test', ''),
(66, 'Urine C/S', 'Pathological Test', ''),
(67, 'Stool for R/E', 'Pathological Test', ''),
(68, 'Semen Analysis', 'Pathological Test', ''),
(69, 'S. Electrolyte', 'Pathological Test', ''),
(70, 'S. T3/ T4/ THS', 'Pathological Test', ''),
(71, 'MT', 'Pathological Test', ''),
(106, 'ESR', 'Patho Test', ''),
(107, 'FBS CUS', 'Pathological test', ''),
(108, 'Hb%', 'Pathological test', ''),
(114, '2HABF', 'Pathological test', ''),
(113, 'FBS', 'Pathological test', ''),
(115, 'S. TSH', 'Pathological test', ''),
(116, 'S. T3', 'Pathological test', ''),
(117, 'DC', 'Pathological test', ''),
(118, 'TC', 'Pathological test', ''),
(120, 'S. Uric acid', 'Pathological test', ''),
(126, 'eosinphil', 'Pathology Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manualemailshortcode`
--

CREATE TABLE `manualemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manualemailshortcode`
--

INSERT INTO `manualemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'email'),
(2, '{lastname}', 'email'),
(3, '{name}', 'email'),
(6, '{address}', 'email'),
(7, '{company}', 'email'),
(8, '{email}', 'email'),
(9, '{phone}', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `manualsmsshortcode`
--

CREATE TABLE `manualsmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manualsmsshortcode`
--

INSERT INTO `manualsmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'sms'),
(2, '{lastname}', 'sms'),
(3, '{name}', 'sms'),
(4, '{email}', 'sms'),
(5, '{phone}', 'sms'),
(6, '{address}', 'sms'),
(10, '{company}', 'sms');

-- --------------------------------------------------------

--
-- Table structure for table `manual_email_template`
--

CREATE TABLE `manual_email_template` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manual_email_template`
--

INSERT INTO `manual_email_template` (`id`, `name`, `message`, `type`) VALUES
(7, 'vddfvdf', '<p>dvdfvdfvdfvd</p>\r\n', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `manual_sms_template`
--

CREATE TABLE `manual_sms_template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `manual_sms_template`
--

INSERT INTO `manual_sms_template` (`id`, `name`, `message`, `type`) VALUES
(1, 'test', '{firstname} come to my offce {lastname}', 'sms'),
(8, 'dsdsdss3wew454', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'sms'),
(3, 'sdgfgfdgfdgdf', '<p>{email}{instructor}{address} gfdgdfg</p>\r\n', 'email'),
(7, 'test223', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>dsfsf</td>\r\n			<td>sdfsdf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sdfdsf</td>\r\n			<td>dfdsf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dfdf</td>\r\n			<td>dfdfd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n{email}{instructor}', 'email'),
(9, 'zxcxzczx', ' {address}{phone}', 'sms');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(500) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `box` varchar(100) DEFAULT NULL,
  `s_price` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `effects` varchar(100) DEFAULT NULL,
  `e_date` varchar(70) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `price`, `box`, `s_price`, `quantity`, `generic`, `company`, `effects`, `e_date`, `add_date`) VALUES
(2880, 'Amoxilin', 'Tablet', '4000', '1', '8000', 10, 'Antibiotik', 'Gardamenal', 'Mengantuk', '10-04-2023', '04/08/23'),
(2881, 'Oralit', NULL, '4000', '41', '6000', 91, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23'),
(2882, 'Omegtrim adult', NULL, '5000', '42', '7000', 8, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23'),
(2883, 'Pharmamox', NULL, '6000', '43', '8000', 7, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23'),
(2884, 'Omeroxol', NULL, '7000', '44', '9000', 6, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23'),
(2885, 'Proceles', NULL, '8000', '45', '10000', 109, 'Pracetimol', 'Kimiafarma', 'Mengantuk', '16-08-2023', '11/04/23'),
(2886, 'Promavit', NULL, '9000', '46', '11000', 147, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23'),
(2887, 'Phenobiotik', NULL, '10000', '47', '12000', 5, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23'),
(2888, 'purinic', NULL, '11000', '48', '13000', 69, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23'),
(2889, 'Premaston ', NULL, '12000', '49', '14000', 2, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23'),
(2890, 'Pharmaxil', NULL, '13000', '50', '15000', 5, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `category`, `description`) VALUES
(25, 'Tablet', 'Satuan Papan');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `topic` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `meeting_id` varchar(100) DEFAULT NULL,
  `meeting_password` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `doctor_ion_id` varchar(100) DEFAULT NULL,
  `patient_ion_id` varchar(100) DEFAULT NULL,
  `appointment_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `patient`, `doctor`, `topic`, `type`, `start_time`, `duration`, `timezone`, `meeting_id`, `meeting_password`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `registration_time`, `s_time_key`, `status`, `user`, `request`, `patientname`, `doctorname`, `ion_user_id`, `doctor_ion_id`, `patient_ion_id`, `appointment_id`) VALUES
(597, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:57', '60', 'UTC', '78065502079', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867830', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(596, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:55', '60', 'UTC', '73399002446', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867708', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(594, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:52', '60', 'UTC', '76863762416', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867523', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(595, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:53', '60', 'UTC', '76103574289', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(593, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:50', '60', 'UTC', '78581884320', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(592, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '71935056353', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857283', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(590, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:47', '60', 'UTC', '73066856714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856455', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(591, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '73873024898', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857264', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(589, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:46', '60', 'UTC', '71674039118', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(598, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:37', '60', 'UTC', '79952317532', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598870269', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(599, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:52', '60', 'UTC', '71430825323', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598871125', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(600, '1', '147', 'Doctor Appointment', '2', '2020-08-31 11:34', '60', 'UTC', '78873863945', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598888071', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(601, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:21', '60', 'UTC', '77058133464', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898079', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(602, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:35', '60', 'UTC', '76826440714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898940', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(603, '1', '147', 'Doctor Appointment', '2', '2020-08-31 15:09', '60', 'UTC', '71324680797', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598900963', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(604, '1', '147', 'Doctor Appointment', '2', '2020-08-31 17:51', '60', 'UTC', '72784087056', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598910684', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(605, '1', '147', 'Doctor Appointment', '2', '2020-08-31 18:03', '60', 'UTC', '71781120129', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598911430', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(606, '1', '147', 'Doctor Appointment', '2', '2020-09-01 05:21', '60', 'UTC', '73426854489', '12345', NULL, NULL, NULL, NULL, NULL, '09/01/20', '1598952101', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '456'),
(607, '1', '147', 'Doctor Appointment', '2', '2020-09-10 14:13', '60', 'UTC', '73576408457', '12345', NULL, NULL, NULL, NULL, NULL, '09/10/20', '1599761627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464'),
(608, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '75454341566', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846437', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464'),
(609, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '73157465436', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846468', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(610, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '78370052717', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846502', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(611, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '71877134261', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846505', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(612, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '75349390219', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846517', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(613, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '77947823088', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846518', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(614, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '75473785483', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846572', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(615, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '76165228124', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846593', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_settings`
--

CREATE TABLE `meeting_settings` (
  `id` int(100) NOT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `secret_key` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `meeting_settings`
--

INSERT INTO `meeting_settings` (`id`, `api_key`, `secret_key`, `ion_user_id`, `y`) VALUES
(8, 'PEbvh2uESS6ryue3Kb3D0w', 'BZpvXJsvgqG6mN4Up1FuuWJQAY47w5QCWIAo', '709', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `z` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `z`, `ion_user_id`) VALUES
(8, 'uploads/favicon4.png', 'Mrs Nurse', 'nurse@dms.com', 'Uttara, Dhaka', '+880123456789', '', '', '', '109'),
(13, NULL, 'Indah Sari', 'perawat@umsu.ac.id', 'Medan', '085111', NULL, NULL, NULL, '1604');

-- --------------------------------------------------------

--
-- Table structure for table `ot_payment`
--

CREATE TABLE `ot_payment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor_c_s` varchar(100) DEFAULT NULL,
  `doctor_a_s_1` varchar(100) DEFAULT NULL,
  `doctor_a_s_2` varchar(100) DEFAULT NULL,
  `doctor_anaes` varchar(100) DEFAULT NULL,
  `n_o_o` varchar(100) DEFAULT NULL,
  `c_s_f` varchar(100) DEFAULT NULL,
  `a_s_f_1` varchar(100) DEFAULT NULL,
  `a_s_f_2` varchar(11) DEFAULT NULL,
  `anaes_f` varchar(100) DEFAULT NULL,
  `ot_charge` varchar(100) DEFAULT NULL,
  `cab_rent` varchar(100) DEFAULT NULL,
  `seat_rent` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `doctor_fees` varchar(100) DEFAULT NULL,
  `hospital_fees` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `flat_discount` varchar(100) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ot_payment`
--

INSERT INTO `ot_payment` (`id`, `patient`, `doctor_c_s`, `doctor_a_s_1`, `doctor_a_s_2`, `doctor_anaes`, `n_o_o`, `c_s_f`, `a_s_f_1`, `a_s_f_2`, `anaes_f`, `ot_charge`, `cab_rent`, `seat_rent`, `others`, `discount`, `date`, `amount`, `doctor_fees`, `hospital_fees`, `gross_total`, `flat_discount`, `amount_received`, `status`, `user`) VALUES
(85, '451', 'None', '123', 'None', '125', 'dbdbd', '', '1000', '0', '1000', '', '', '', '', '', '1506195494', '2000', '2000', '0', '2000', '', '1000', 'unpaid', '614');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `bloodgroup` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `img_url`, `name`, `email`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `ion_user_id`, `patient_id`, `add_date`, `registration_time`, `how_added`) VALUES
(4, NULL, 'Fajar Gultom', 'fajar@gmail.com', NULL, 'Medan', '0857', 'Male', '25-11-2004', NULL, 'O+', '1603', '879093', '04/12/23', '1681254670', NULL),
(3, NULL, 'Dina Ritonga', 'dina@gmail.com', '7', 'Medan', '0812', 'Female', '08-03-2000', NULL, 'AB+', '1602', '738383', '04/12/23', '1681254490', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `patient_deposit`
--

CREATE TABLE `patient_deposit` (
  `id` int(10) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `deposited_amount` varchar(100) DEFAULT NULL,
  `amount_received_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `gateway` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_material`
--

CREATE TABLE `patient_material` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE `paymentgateway` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `merchant_key` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `APIUsername` varchar(100) DEFAULT NULL,
  `APIPassword` varchar(100) DEFAULT NULL,
  `APISignature` varchar(100) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `publish` varchar(1000) DEFAULT NULL,
  `secret` varchar(1000) DEFAULT NULL,
  `public_key` varchar(1000) DEFAULT NULL,
  `store_id` varchar(1000) DEFAULT NULL,
  `store_password` varchar(1000) DEFAULT NULL,
  `merchant_mid` varchar(1000) DEFAULT NULL,
  `merchant_website` varchar(1000) DEFAULT NULL,
  `apiloginid` varchar(1000) DEFAULT NULL,
  `transactionkey` varchar(1000) DEFAULT NULL,
  `apikey` varchar(1000) DEFAULT NULL,
  `merchantcode` varchar(1000) DEFAULT NULL,
  `privatekey` varchar(1000) DEFAULT NULL,
  `publishablekey` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paymentgateway`
--

INSERT INTO `paymentgateway` (`id`, `name`, `merchant_key`, `salt`, `x`, `y`, `APIUsername`, `APIPassword`, `APISignature`, `status`, `publish`, `secret`, `public_key`, `store_id`, `store_password`, `merchant_mid`, `merchant_website`, `apiloginid`, `transactionkey`, `apikey`, `merchantcode`, `privatekey`, `publishablekey`) VALUES
(1, 'PayPal', '', '', '', '', 'sahashaibal19-facilitator_api1.gmail.com', 'B63U4VHDE8E8K8E2', 'AGVBtjcchZdpMmwaGJXMakrp-RyZAuNqRwECP9LNRref5tv0ZwZkllTN', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Pay U Money', 'HbimD3hk', 'BnuUHR1FDG', '', '', '', '', 'Aaw-Fd69z.JLuiq13ejMN-CsSMuuAPEXWUFPF5QW9sD22fp1hosGIFKo', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'Publish key', 'Secret Key', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'sk_test_c0b4a969e33564d0fdc6c781efb0300e68316897', 'pk_test_6511ce507f68769d3035234614ba03f3e7368f4e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'SSLCOMMERZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, 'vella5fe8cfbe4ed3a', 'vella5fe8cfbe4ed3a@ssl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Paytm', 'Merchant Key', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'Merchant MID', 'Merchant Website', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Authorize.Net', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2LJcUm497L2', '46u3b3AMd44sJX5w', NULL, NULL, NULL, NULL),
(8, '2Checkout', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Merchant Code', 'Private key', 'Publishable Key');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`) VALUES
(7, 'uploads/favicon6.png', 'Mr. Pharmacist', 'pharmacist@dms.com', 'Pottersbar, Hertfordshire, UK', '+880123456789', '', '', '110'),
(9, NULL, 'Kiky Ayunita', 'apotik@umsu.ac.id', 'Medan', '08213270', NULL, NULL, '1607');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense`
--

CREATE TABLE `pharmacy_expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense_category`
--

CREATE TABLE `pharmacy_expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment`
--

CREATE TABLE `pharmacy_payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment_category`
--

CREATE TABLE `pharmacy_payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `symptom` varchar(100) DEFAULT NULL,
  `advice` varchar(1000) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dd` varchar(100) DEFAULT NULL,
  `medicine` varchar(1000) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`) VALUES
(7, '', 'Mr Receptionist', 'receptionist@dms.com', 'Collegepara, Rajbari', '+880123456789', '', '614'),
(8, NULL, 'Melodi Medica', 'resepsionis@umsu.ac.id', 'Medan', '081976', NULL, '1605');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `report_type` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `report_type`, `patient`, `description`, `doctor`, `date`, `add_date`) VALUES
(36, 'operation', 'Mr Patient*681', 'jhvvnbv', 'Mr Doctor', '07-12-2020', '12/13/20');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `img_url`, `title`, `description`) VALUES
(1, 'uploads/featured-icon-3.png', 'Cardiac Excellence', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(2, 'uploads/featured-icon-4.png', 'Cancer Treatment', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(3, 'uploads/featured-icon-1.png', 'Stroke Management', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(4, 'uploads/featured-icon-6.png', '24 / 7 Support', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(5, 'uploads/featured-icon-2.png', 'Care', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `live_appointment_type` varchar(100) DEFAULT NULL,
  `vat` varchar(100) DEFAULT NULL,
  `login_title` varchar(100) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `invoice_logo` varchar(500) DEFAULT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `sms_gateway` varchar(100) DEFAULT NULL,
  `codec_username` varchar(100) DEFAULT NULL,
  `codec_purchase_code` varchar(100) DEFAULT NULL,
  `timezone` varchar(1000) DEFAULT NULL,
  `emailtype` varchar(1000) DEFAULT NULL,
  `appointment_subtitle` varchar(1000) NOT NULL,
  `appointment_title` varchar(1000) NOT NULL,
  `appointment_description` varchar(1000) NOT NULL,
  `appointment_img_url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `facebook_id`, `currency`, `language`, `discount`, `live_appointment_type`, `vat`, `login_title`, `logo`, `invoice_logo`, `payment_gateway`, `sms_gateway`, `codec_username`, `codec_purchase_code`, `timezone`, `emailtype`, `appointment_subtitle`, `appointment_title`, `appointment_description`, `appointment_img_url`) VALUES
(1, 'SIM Spesialis Klinik', 'Klinik Spesialis UMSU', 'Jl. Gedung Arca Medan', '061000000', 'admin@demo.com', '#', 'Rp. ', 'indonesian', 'flat', 'jitsi', 'percentage', 'Login Title', 'uploads/Untitled-1.png', '', 'PayPal', 'Twilio', '', '', 'Asia/Bangkok', 'Domain Email', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_gallery`
--

CREATE TABLE `site_gallery` (
  `id` int(10) NOT NULL,
  `img` varchar(500) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_gallery`
--

INSERT INTO `site_gallery` (`id`, `img`, `position`, `status`) VALUES
(1, 'uploads/gallery-img-1.png', '1', 'Active'),
(2, 'uploads/gallery-img-2.png', '2', 'Active'),
(3, 'uploads/gallery-img-3.png', '3', 'Active'),
(4, 'uploads/gallery-img-4.png', '4', 'Active'),
(5, 'uploads/gallery-img-5.png', '5', 'Active'),
(6, 'uploads/gallery-img-6.png', '6', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `site_grid`
--

CREATE TABLE `site_grid` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `position` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_grid`
--

INSERT INTO `site_grid` (`id`, `category`, `title`, `description`, `img`, `position`, `status`) VALUES
(3, 'FEATURED', 'Professional surgeons', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tenetur, aut veritatis maxime ducimus modi delectus vero expedita illo ratione, eveniet laboriosam cupiditate reiciendis, repellat minima. Optio consectetur inventore ipsa!', 'uploads/frature-img-1.png', '1', 'Active'),
(4, 'FEATURED', 'Good Care', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tenetur, aut veritatis maxime ducimus modi delectus vero expedita illo ratione, eveniet laboriosam cupiditate reiciendis, repellat minima. Optio consectetur inventore ipsa!', 'uploads/frature-img-2.png', '2', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `site_review`
--

CREATE TABLE `site_review` (
  `id` int(10) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `designation` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `review` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `site_review`
--

INSERT INTO `site_review` (`id`, `name`, `designation`, `review`, `img`, `status`) VALUES
(1, 'Test Reviewer 1', 'Reviewer, XYZ', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-581.jpg', 'Active'),
(3, 'Test Reviewer 2', 'Reviewer, ABC', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-582.jpg', 'Active'),
(4, 'Test Reviewer 3', 'Reviewer, NMP', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-583.jpg', 'Active'),
(5, 'Test Reviewer 4', 'Reviewer, TRP', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-584.jpg', 'Active'),
(6, 'Test Reviewer 5', 'Reviewer, CVB', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-585.jpg', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `text1` varchar(500) DEFAULT NULL,
  `text2` varchar(500) DEFAULT NULL,
  `text3` varchar(500) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `img_url`, `text1`, `text2`, `text3`, `position`, `status`) VALUES
(1, 'Slider 1', 'uploads/1503411077revised-bhatia-homebanner-03.jpg', 'Welcome To Hospital', 'Hospital Management System', 'Hospital', '2', 'Active'),
(2, 'Best Hospital management System', 'uploads/1707260345350542.jpg', 'Best Hospital management System', 'Best Hospital management System', 'Best Hospital management System', '1', 'Inactive'),
(5, 'dbfbfjsbjfjbbsjfb', 'uploads/inlinePreview2.jpg', 'jbfjsbjdf', 'jbfjbjfbjsb', 'jbfjbjsbfj', 'jbfjbjbsjf', 'Inactive'),
(6, 'Main BG', 'uploads/header-bg.png', 'The best doctors in Medicine!', 'in the world of modern medicine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(1600) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `api_id` varchar(100) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `authkey` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `sid` varchar(1000) DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `sendernumber` varchar(1000) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `name`, `username`, `password`, `api_id`, `sender`, `authkey`, `user`, `sid`, `token`, `sendernumber`, `link`) VALUES
(1, 'Clickatell', '', 'dmJiY3ZiY3Y=', '', NULL, NULL, '1', NULL, NULL, NULL, 'https://www.clickatell.com/'),
(2, 'MSG91', '', '', NULL, 'Sender', 'Auth Key', '1', NULL, NULL, NULL, 'https://msg91.com/'),
(5, 'Twilio', '', '', NULL, NULL, NULL, '1', 'AC20f426a9bbc9e05e689f5ad59e538270', '37a0cddb5c1f2d50882fa7149a99d119', '+13302949572', 'https://www.twilio.com/'),
(6, 'Bulk Sms', 'VXNlcm5hbWU=', 'UGFzc3dvcmQ=', NULL, NULL, NULL, '1', NULL, NULL, NULL, 'https://www.bulksms.com/'),
(8, 'Bd Bulk Sms', '', '', NULL, NULL, NULL, '1', NULL, 'Bd Bulk Sms Token Password', NULL, 'https://bdbulksms.net/');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `template` varchar(10000) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `id` int(100) NOT NULL,
  `doctor` varchar(500) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`id`, `doctor`, `weekday`, `s_time`, `e_time`, `s_time_key`, `duration`) VALUES
(119, '18', 'Tuesday', '03:00 PM', '05:00 PM', '180', '6'),
(120, '18', 'Thursday', '03:00 PM', '05:00 PM', '180', '4'),
(121, '7', 'Monday', '09:00 AM', '12:00 PM', '108', '3'),
(122, '7', 'Tuesday', '09:00 AM', '12:00 PM', '108', '3'),
(123, '7', 'Wednesday', '03:00 PM', '05:00 PM', '180', '3'),
(124, '7', 'Thursday', '03:00 PM', '05:00 PM', '180', '3'),
(125, '7', 'Friday', '03:00 PM', '05:00 PM', '180', '3'),
(126, '8', 'Tuesday', '01:00 PM', '04:00 PM', '156', '3'),
(127, '8', 'Thursday', '01:00 PM', '04:00 PM', '156', '3'),
(128, '9', 'Tuesday', '03:00 PM', '05:00 PM', '180', '3'),
(129, '9', 'Friday', '03:00 PM', '05:00 PM', '180', '3'),
(130, '10', 'Monday', '09:00 AM', '12:00 PM', '108', '3'),
(131, '10', 'Wednesday', '09:00 AM', '12:00 PM', '108', '3'),
(132, '10', 'Friday', '09:00 AM', '12:00 PM', '108', '3'),
(133, '11', 'Monday', '03:00 PM', '05:00 PM', '180', '3'),
(134, '11', 'Wednesday', '03:00 PM', '05:00 PM', '180', '3'),
(135, '11', 'Thursday', '03:00 PM', '05:00 PM', '180', '3'),
(136, '12', 'Monday', '04:00 PM', '07:00 PM', '192', '3'),
(137, '12', 'Tuesday', '04:00 PM', '07:00 PM', '192', '3'),
(138, '13', 'Wednesday', '04:00 PM', '06:00 PM', '192', '3'),
(139, '13', 'Thursday', '04:00 PM', '06:00 PM', '192', '3'),
(140, '14', 'Monday', '05:00 PM', '07:00 PM', '204', '3'),
(141, '14', 'Friday', '05:00 PM', '07:00 PM', '204', '3'),
(144, '15', 'Monday', '12:30 AM', '03:30 PM', '6', '3'),
(143, '15', 'Wednesday', '12:30 AM', '03:30 PM', '6', '3'),
(145, '16', 'Monday', '03:00 PM', '04:00 PM', '180', '3'),
(146, '16', 'Wednesday', '04:00 PM', '06:00 PM', '192', '3'),
(147, '17', 'Tuesday', '10:00 AM', '01:00 PM', '120', '3'),
(148, '17', 'Thursday', '10:00 AM', '01:00 PM', '120', '3'),
(149, '17', 'Friday', '10:00 AM', '01:00 PM', '120', '3');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `doctor`, `s_time`, `e_time`, `weekday`, `s_time_key`) VALUES
(2196, NULL, '01:30 PM', '01:45 PM', 'Tuesday', '162'),
(2197, NULL, '01:45 PM', '02:00 PM', 'Tuesday', '165'),
(2198, NULL, '02:00 PM', '02:15 PM', 'Tuesday', '168'),
(2199, NULL, '02:15 PM', '02:30 PM', 'Tuesday', '171'),
(2200, NULL, '02:30 PM', '02:45 PM', 'Tuesday', '174'),
(2201, NULL, '02:45 PM', '03:00 PM', 'Tuesday', '177'),
(2202, NULL, '03:00 PM', '03:15 PM', 'Tuesday', '180'),
(2203, NULL, '03:15 PM', '03:30 PM', 'Tuesday', '183'),
(2204, NULL, '03:30 PM', '03:45 PM', 'Tuesday', '186'),
(2205, NULL, '03:45 PM', '04:00 PM', 'Tuesday', '189'),
(2206, NULL, '04:00 PM', '04:15 PM', 'Tuesday', '192'),
(2207, NULL, '04:15 PM', '04:30 PM', 'Tuesday', '195'),
(2208, NULL, '04:30 PM', '04:45 PM', 'Tuesday', '198'),
(2209, NULL, '04:45 PM', '05:00 PM', 'Tuesday', '201'),
(2210, NULL, '05:00 PM', '05:15 PM', 'Tuesday', '204'),
(2211, NULL, '05:15 PM', '05:30 PM', 'Tuesday', '207'),
(2212, NULL, '05:30 PM', '05:45 PM', 'Tuesday', '210'),
(2213, NULL, '05:45 PM', '06:00 PM', 'Tuesday', '213'),
(2214, NULL, '06:00 PM', '06:15 PM', 'Tuesday', '216'),
(2215, NULL, '06:15 PM', '06:30 PM', 'Tuesday', '219'),
(2216, NULL, '06:30 PM', '06:45 PM', 'Tuesday', '222'),
(2217, NULL, '06:45 PM', '07:00 PM', 'Tuesday', '225'),
(2218, NULL, '07:00 PM', '07:15 PM', 'Tuesday', '228'),
(2219, NULL, '07:15 PM', '07:30 PM', 'Tuesday', '231'),
(2220, NULL, '07:30 PM', '07:45 PM', 'Tuesday', '234'),
(2221, NULL, '07:45 PM', '08:00 PM', 'Tuesday', '237'),
(2222, NULL, '08:00 PM', '08:15 PM', 'Tuesday', '240'),
(2223, NULL, '08:15 PM', '08:30 PM', 'Tuesday', '243'),
(2224, NULL, '08:30 PM', '08:45 PM', 'Tuesday', '246'),
(2225, NULL, '08:45 PM', '09:00 PM', 'Tuesday', '249'),
(2226, NULL, '09:00 PM', '09:15 PM', 'Tuesday', '252'),
(2227, NULL, '09:15 PM', '09:30 PM', 'Tuesday', '255'),
(2228, NULL, '09:30 PM', '09:45 PM', 'Tuesday', '258'),
(2229, NULL, '09:45 PM', '10:00 PM', 'Tuesday', '261'),
(2230, NULL, '10:00 PM', '10:15 PM', 'Tuesday', '264'),
(2231, NULL, '10:15 PM', '10:30 PM', 'Tuesday', '267'),
(2232, NULL, '10:30 PM', '10:45 PM', 'Tuesday', '270'),
(2233, NULL, '10:45 PM', '11:00 PM', 'Tuesday', '273'),
(2234, NULL, '11:00 PM', '11:15 PM', 'Tuesday', '276'),
(2235, NULL, '11:15 PM', '11:30 PM', 'Tuesday', '279'),
(2483, '18', '03:00 PM', '03:30 PM', 'Tuesday', '180'),
(2484, '18', '03:30 PM', '04:00 PM', 'Tuesday', '186'),
(2485, '18', '04:00 PM', '04:30 PM', 'Tuesday', '192'),
(2486, '18', '04:30 PM', '05:00 PM', 'Tuesday', '198'),
(2487, '18', '03:00 PM', '03:20 PM', 'Thursday', '180'),
(2488, '18', '03:20 PM', '03:40 PM', 'Thursday', '184'),
(2489, '18', '03:40 PM', '04:00 PM', 'Thursday', '188'),
(2490, '18', '04:00 PM', '04:20 PM', 'Thursday', '192'),
(2491, '18', '04:20 PM', '04:40 PM', 'Thursday', '196'),
(2492, '18', '04:40 PM', '05:00 PM', 'Thursday', '200'),
(2493, '7', '09:00 AM', '09:15 AM', 'Monday', '108'),
(2494, '7', '09:15 AM', '09:30 AM', 'Monday', '111'),
(2495, '7', '09:30 AM', '09:45 AM', 'Monday', '114'),
(2496, '7', '09:45 AM', '10:00 AM', 'Monday', '117'),
(2497, '7', '10:00 AM', '10:15 AM', 'Monday', '120'),
(2498, '7', '10:15 AM', '10:30 AM', 'Monday', '123'),
(2499, '7', '10:30 AM', '10:45 AM', 'Monday', '126'),
(2500, '7', '10:45 AM', '11:00 AM', 'Monday', '129'),
(2501, '7', '11:00 AM', '11:15 AM', 'Monday', '132'),
(2502, '7', '11:15 AM', '11:30 AM', 'Monday', '135'),
(2503, '7', '11:30 AM', '11:45 AM', 'Monday', '138'),
(2504, '7', '11:45 AM', '12:00 PM', 'Monday', '141'),
(2505, '7', '09:00 AM', '09:15 AM', 'Tuesday', '108'),
(2506, '7', '09:15 AM', '09:30 AM', 'Tuesday', '111'),
(2507, '7', '09:30 AM', '09:45 AM', 'Tuesday', '114'),
(2508, '7', '09:45 AM', '10:00 AM', 'Tuesday', '117'),
(2509, '7', '10:00 AM', '10:15 AM', 'Tuesday', '120'),
(2510, '7', '10:15 AM', '10:30 AM', 'Tuesday', '123'),
(2511, '7', '10:30 AM', '10:45 AM', 'Tuesday', '126'),
(2512, '7', '10:45 AM', '11:00 AM', 'Tuesday', '129'),
(2513, '7', '11:00 AM', '11:15 AM', 'Tuesday', '132'),
(2514, '7', '11:15 AM', '11:30 AM', 'Tuesday', '135'),
(2515, '7', '11:30 AM', '11:45 AM', 'Tuesday', '138'),
(2516, '7', '11:45 AM', '12:00 PM', 'Tuesday', '141'),
(2517, '7', '03:00 PM', '03:15 PM', 'Wednesday', '180'),
(2518, '7', '03:15 PM', '03:30 PM', 'Wednesday', '183'),
(2519, '7', '03:30 PM', '03:45 PM', 'Wednesday', '186'),
(2520, '7', '03:45 PM', '04:00 PM', 'Wednesday', '189'),
(2521, '7', '04:00 PM', '04:15 PM', 'Wednesday', '192'),
(2522, '7', '04:15 PM', '04:30 PM', 'Wednesday', '195'),
(2523, '7', '04:30 PM', '04:45 PM', 'Wednesday', '198'),
(2524, '7', '04:45 PM', '05:00 PM', 'Wednesday', '201'),
(2525, '7', '03:00 PM', '03:15 PM', 'Thursday', '180'),
(2526, '7', '03:15 PM', '03:30 PM', 'Thursday', '183'),
(2527, '7', '03:30 PM', '03:45 PM', 'Thursday', '186'),
(2528, '7', '03:45 PM', '04:00 PM', 'Thursday', '189'),
(2529, '7', '04:00 PM', '04:15 PM', 'Thursday', '192'),
(2530, '7', '04:15 PM', '04:30 PM', 'Thursday', '195'),
(2531, '7', '04:30 PM', '04:45 PM', 'Thursday', '198'),
(2532, '7', '04:45 PM', '05:00 PM', 'Thursday', '201'),
(2533, '7', '03:00 PM', '03:15 PM', 'Friday', '180'),
(2534, '7', '03:15 PM', '03:30 PM', 'Friday', '183'),
(2535, '7', '03:30 PM', '03:45 PM', 'Friday', '186'),
(2536, '7', '03:45 PM', '04:00 PM', 'Friday', '189'),
(2537, '7', '04:00 PM', '04:15 PM', 'Friday', '192'),
(2538, '7', '04:15 PM', '04:30 PM', 'Friday', '195'),
(2539, '7', '04:30 PM', '04:45 PM', 'Friday', '198'),
(2540, '7', '04:45 PM', '05:00 PM', 'Friday', '201'),
(2541, '8', '01:00 PM', '01:15 PM', 'Tuesday', '156'),
(2542, '8', '01:15 PM', '01:30 PM', 'Tuesday', '159'),
(2543, '8', '01:30 PM', '01:45 PM', 'Tuesday', '162'),
(2544, '8', '01:45 PM', '02:00 PM', 'Tuesday', '165'),
(2545, '8', '02:00 PM', '02:15 PM', 'Tuesday', '168'),
(2546, '8', '02:15 PM', '02:30 PM', 'Tuesday', '171'),
(2547, '8', '02:30 PM', '02:45 PM', 'Tuesday', '174'),
(2548, '8', '02:45 PM', '03:00 PM', 'Tuesday', '177'),
(2549, '8', '03:00 PM', '03:15 PM', 'Tuesday', '180'),
(2550, '8', '03:15 PM', '03:30 PM', 'Tuesday', '183'),
(2551, '8', '03:30 PM', '03:45 PM', 'Tuesday', '186'),
(2552, '8', '03:45 PM', '04:00 PM', 'Tuesday', '189'),
(2553, '8', '01:00 PM', '01:15 PM', 'Thursday', '156'),
(2554, '8', '01:15 PM', '01:30 PM', 'Thursday', '159'),
(2555, '8', '01:30 PM', '01:45 PM', 'Thursday', '162'),
(2556, '8', '01:45 PM', '02:00 PM', 'Thursday', '165'),
(2557, '8', '02:00 PM', '02:15 PM', 'Thursday', '168'),
(2558, '8', '02:15 PM', '02:30 PM', 'Thursday', '171'),
(2559, '8', '02:30 PM', '02:45 PM', 'Thursday', '174'),
(2560, '8', '02:45 PM', '03:00 PM', 'Thursday', '177'),
(2561, '8', '03:00 PM', '03:15 PM', 'Thursday', '180'),
(2562, '8', '03:15 PM', '03:30 PM', 'Thursday', '183'),
(2563, '8', '03:30 PM', '03:45 PM', 'Thursday', '186'),
(2564, '8', '03:45 PM', '04:00 PM', 'Thursday', '189'),
(2565, '9', '03:00 PM', '03:15 PM', 'Tuesday', '180'),
(2566, '9', '03:15 PM', '03:30 PM', 'Tuesday', '183'),
(2567, '9', '03:30 PM', '03:45 PM', 'Tuesday', '186'),
(2568, '9', '03:45 PM', '04:00 PM', 'Tuesday', '189'),
(2569, '9', '04:00 PM', '04:15 PM', 'Tuesday', '192'),
(2570, '9', '04:15 PM', '04:30 PM', 'Tuesday', '195'),
(2571, '9', '04:30 PM', '04:45 PM', 'Tuesday', '198'),
(2572, '9', '04:45 PM', '05:00 PM', 'Tuesday', '201'),
(2573, '9', '03:00 PM', '03:15 PM', 'Friday', '180'),
(2574, '9', '03:15 PM', '03:30 PM', 'Friday', '183'),
(2575, '9', '03:30 PM', '03:45 PM', 'Friday', '186'),
(2576, '9', '03:45 PM', '04:00 PM', 'Friday', '189'),
(2577, '9', '04:00 PM', '04:15 PM', 'Friday', '192'),
(2578, '9', '04:15 PM', '04:30 PM', 'Friday', '195'),
(2579, '9', '04:30 PM', '04:45 PM', 'Friday', '198'),
(2580, '9', '04:45 PM', '05:00 PM', 'Friday', '201'),
(2581, '10', '09:00 AM', '09:15 AM', 'Monday', '108'),
(2582, '10', '09:15 AM', '09:30 AM', 'Monday', '111'),
(2583, '10', '09:30 AM', '09:45 AM', 'Monday', '114'),
(2584, '10', '09:45 AM', '10:00 AM', 'Monday', '117'),
(2585, '10', '10:00 AM', '10:15 AM', 'Monday', '120'),
(2586, '10', '10:15 AM', '10:30 AM', 'Monday', '123'),
(2587, '10', '10:30 AM', '10:45 AM', 'Monday', '126'),
(2588, '10', '10:45 AM', '11:00 AM', 'Monday', '129'),
(2589, '10', '11:00 AM', '11:15 AM', 'Monday', '132'),
(2590, '10', '11:15 AM', '11:30 AM', 'Monday', '135'),
(2591, '10', '11:30 AM', '11:45 AM', 'Monday', '138'),
(2592, '10', '11:45 AM', '12:00 PM', 'Monday', '141'),
(2593, '10', '09:00 AM', '09:15 AM', 'Wednesday', '108'),
(2594, '10', '09:15 AM', '09:30 AM', 'Wednesday', '111'),
(2595, '10', '09:30 AM', '09:45 AM', 'Wednesday', '114'),
(2596, '10', '09:45 AM', '10:00 AM', 'Wednesday', '117'),
(2597, '10', '10:00 AM', '10:15 AM', 'Wednesday', '120'),
(2598, '10', '10:15 AM', '10:30 AM', 'Wednesday', '123'),
(2599, '10', '10:30 AM', '10:45 AM', 'Wednesday', '126'),
(2600, '10', '10:45 AM', '11:00 AM', 'Wednesday', '129'),
(2601, '10', '11:00 AM', '11:15 AM', 'Wednesday', '132'),
(2602, '10', '11:15 AM', '11:30 AM', 'Wednesday', '135'),
(2603, '10', '11:30 AM', '11:45 AM', 'Wednesday', '138'),
(2604, '10', '11:45 AM', '12:00 PM', 'Wednesday', '141'),
(2605, '10', '09:00 AM', '09:15 AM', 'Friday', '108'),
(2606, '10', '09:15 AM', '09:30 AM', 'Friday', '111'),
(2607, '10', '09:30 AM', '09:45 AM', 'Friday', '114'),
(2608, '10', '09:45 AM', '10:00 AM', 'Friday', '117'),
(2609, '10', '10:00 AM', '10:15 AM', 'Friday', '120'),
(2610, '10', '10:15 AM', '10:30 AM', 'Friday', '123'),
(2611, '10', '10:30 AM', '10:45 AM', 'Friday', '126'),
(2612, '10', '10:45 AM', '11:00 AM', 'Friday', '129'),
(2613, '10', '11:00 AM', '11:15 AM', 'Friday', '132'),
(2614, '10', '11:15 AM', '11:30 AM', 'Friday', '135'),
(2615, '10', '11:30 AM', '11:45 AM', 'Friday', '138'),
(2616, '10', '11:45 AM', '12:00 PM', 'Friday', '141'),
(2617, '11', '03:00 PM', '03:15 PM', 'Monday', '180'),
(2618, '11', '03:15 PM', '03:30 PM', 'Monday', '183'),
(2619, '11', '03:30 PM', '03:45 PM', 'Monday', '186'),
(2620, '11', '03:45 PM', '04:00 PM', 'Monday', '189'),
(2621, '11', '04:00 PM', '04:15 PM', 'Monday', '192'),
(2622, '11', '04:15 PM', '04:30 PM', 'Monday', '195'),
(2623, '11', '04:30 PM', '04:45 PM', 'Monday', '198'),
(2624, '11', '04:45 PM', '05:00 PM', 'Monday', '201'),
(2625, '11', '03:00 PM', '03:15 PM', 'Wednesday', '180'),
(2626, '11', '03:15 PM', '03:30 PM', 'Wednesday', '183'),
(2627, '11', '03:30 PM', '03:45 PM', 'Wednesday', '186'),
(2628, '11', '03:45 PM', '04:00 PM', 'Wednesday', '189'),
(2629, '11', '04:00 PM', '04:15 PM', 'Wednesday', '192'),
(2630, '11', '04:15 PM', '04:30 PM', 'Wednesday', '195'),
(2631, '11', '04:30 PM', '04:45 PM', 'Wednesday', '198'),
(2632, '11', '04:45 PM', '05:00 PM', 'Wednesday', '201'),
(2633, '11', '03:00 PM', '03:15 PM', 'Thursday', '180'),
(2634, '11', '03:15 PM', '03:30 PM', 'Thursday', '183'),
(2635, '11', '03:30 PM', '03:45 PM', 'Thursday', '186'),
(2636, '11', '03:45 PM', '04:00 PM', 'Thursday', '189'),
(2637, '11', '04:00 PM', '04:15 PM', 'Thursday', '192'),
(2638, '11', '04:15 PM', '04:30 PM', 'Thursday', '195'),
(2639, '11', '04:30 PM', '04:45 PM', 'Thursday', '198'),
(2640, '11', '04:45 PM', '05:00 PM', 'Thursday', '201'),
(2641, '12', '04:00 PM', '04:15 PM', 'Monday', '192'),
(2642, '12', '04:15 PM', '04:30 PM', 'Monday', '195'),
(2643, '12', '04:30 PM', '04:45 PM', 'Monday', '198'),
(2644, '12', '04:45 PM', '05:00 PM', 'Monday', '201'),
(2645, '12', '05:00 PM', '05:15 PM', 'Monday', '204'),
(2646, '12', '05:15 PM', '05:30 PM', 'Monday', '207'),
(2647, '12', '05:30 PM', '05:45 PM', 'Monday', '210'),
(2648, '12', '05:45 PM', '06:00 PM', 'Monday', '213'),
(2649, '12', '06:00 PM', '06:15 PM', 'Monday', '216'),
(2650, '12', '06:15 PM', '06:30 PM', 'Monday', '219'),
(2651, '12', '06:30 PM', '06:45 PM', 'Monday', '222'),
(2652, '12', '06:45 PM', '07:00 PM', 'Monday', '225'),
(2653, '12', '04:00 PM', '04:15 PM', 'Tuesday', '192'),
(2654, '12', '04:15 PM', '04:30 PM', 'Tuesday', '195'),
(2655, '12', '04:30 PM', '04:45 PM', 'Tuesday', '198'),
(2656, '12', '04:45 PM', '05:00 PM', 'Tuesday', '201'),
(2657, '12', '05:00 PM', '05:15 PM', 'Tuesday', '204'),
(2658, '12', '05:15 PM', '05:30 PM', 'Tuesday', '207'),
(2659, '12', '05:30 PM', '05:45 PM', 'Tuesday', '210'),
(2660, '12', '05:45 PM', '06:00 PM', 'Tuesday', '213'),
(2661, '12', '06:00 PM', '06:15 PM', 'Tuesday', '216'),
(2662, '12', '06:15 PM', '06:30 PM', 'Tuesday', '219'),
(2663, '12', '06:30 PM', '06:45 PM', 'Tuesday', '222'),
(2664, '12', '06:45 PM', '07:00 PM', 'Tuesday', '225'),
(2665, '13', '04:00 PM', '04:15 PM', 'Wednesday', '192'),
(2666, '13', '04:15 PM', '04:30 PM', 'Wednesday', '195'),
(2667, '13', '04:30 PM', '04:45 PM', 'Wednesday', '198'),
(2668, '13', '04:45 PM', '05:00 PM', 'Wednesday', '201'),
(2669, '13', '05:00 PM', '05:15 PM', 'Wednesday', '204'),
(2670, '13', '05:15 PM', '05:30 PM', 'Wednesday', '207'),
(2671, '13', '05:30 PM', '05:45 PM', 'Wednesday', '210'),
(2672, '13', '05:45 PM', '06:00 PM', 'Wednesday', '213'),
(2673, '13', '04:00 PM', '04:15 PM', 'Thursday', '192'),
(2674, '13', '04:15 PM', '04:30 PM', 'Thursday', '195'),
(2675, '13', '04:30 PM', '04:45 PM', 'Thursday', '198'),
(2676, '13', '04:45 PM', '05:00 PM', 'Thursday', '201'),
(2677, '13', '05:00 PM', '05:15 PM', 'Thursday', '204'),
(2678, '13', '05:15 PM', '05:30 PM', 'Thursday', '207'),
(2679, '13', '05:30 PM', '05:45 PM', 'Thursday', '210'),
(2680, '13', '05:45 PM', '06:00 PM', 'Thursday', '213'),
(2681, '14', '05:00 PM', '05:15 PM', 'Monday', '204'),
(2682, '14', '05:15 PM', '05:30 PM', 'Monday', '207'),
(2683, '14', '05:30 PM', '05:45 PM', 'Monday', '210'),
(2684, '14', '05:45 PM', '06:00 PM', 'Monday', '213'),
(2685, '14', '06:00 PM', '06:15 PM', 'Monday', '216'),
(2686, '14', '06:15 PM', '06:30 PM', 'Monday', '219'),
(2687, '14', '06:30 PM', '06:45 PM', 'Monday', '222'),
(2688, '14', '06:45 PM', '07:00 PM', 'Monday', '225'),
(2689, '14', '05:00 PM', '05:15 PM', 'Friday', '204'),
(2690, '14', '05:15 PM', '05:30 PM', 'Friday', '207'),
(2691, '14', '05:30 PM', '05:45 PM', 'Friday', '210'),
(2692, '14', '05:45 PM', '06:00 PM', 'Friday', '213'),
(2693, '14', '06:00 PM', '06:15 PM', 'Friday', '216'),
(2694, '14', '06:15 PM', '06:30 PM', 'Friday', '219'),
(2695, '14', '06:30 PM', '06:45 PM', 'Friday', '222'),
(2696, '14', '06:45 PM', '07:00 PM', 'Friday', '225'),
(2876, '15', '01:15 PM', '01:30 PM', 'Monday', '159'),
(2875, '15', '01:00 PM', '01:15 PM', 'Monday', '156'),
(2874, '15', '12:45 PM', '01:00 PM', 'Monday', '153'),
(2873, '15', '12:30 PM', '12:45 PM', 'Monday', '150'),
(2872, '15', '12:15 PM', '12:30 PM', 'Monday', '147'),
(2871, '15', '12:00 PM', '12:15 PM', 'Monday', '144'),
(2870, '15', '11:45 AM', '12:00 PM', 'Monday', '141'),
(2869, '15', '11:30 AM', '11:45 AM', 'Monday', '138'),
(2868, '15', '11:15 AM', '11:30 AM', 'Monday', '135'),
(2867, '15', '11:00 AM', '11:15 AM', 'Monday', '132'),
(2866, '15', '10:45 AM', '11:00 AM', 'Monday', '129'),
(2865, '15', '10:30 AM', '10:45 AM', 'Monday', '126'),
(2864, '15', '10:15 AM', '10:30 AM', 'Monday', '123'),
(2863, '15', '10:00 AM', '10:15 AM', 'Monday', '120'),
(2862, '15', '09:45 AM', '10:00 AM', 'Monday', '117'),
(2861, '15', '09:30 AM', '09:45 AM', 'Monday', '114'),
(2860, '15', '09:15 AM', '09:30 AM', 'Monday', '111'),
(2859, '15', '09:00 AM', '09:15 AM', 'Monday', '108'),
(2858, '15', '08:45 AM', '09:00 AM', 'Monday', '105'),
(2857, '15', '08:30 AM', '08:45 AM', 'Monday', '102'),
(2856, '15', '08:15 AM', '08:30 AM', 'Monday', '99'),
(2855, '15', '08:00 AM', '08:15 AM', 'Monday', '96'),
(2854, '15', '07:45 AM', '08:00 AM', 'Monday', '93'),
(2853, '15', '07:30 AM', '07:45 AM', 'Monday', '90'),
(2852, '15', '07:15 AM', '07:30 AM', 'Monday', '87'),
(2851, '15', '07:00 AM', '07:15 AM', 'Monday', '84'),
(2850, '15', '06:45 AM', '07:00 AM', 'Monday', '81'),
(2849, '15', '06:30 AM', '06:45 AM', 'Monday', '78'),
(2848, '15', '06:15 AM', '06:30 AM', 'Monday', '75'),
(2847, '15', '06:00 AM', '06:15 AM', 'Monday', '72'),
(2846, '15', '05:45 AM', '06:00 AM', 'Monday', '69'),
(2845, '15', '05:30 AM', '05:45 AM', 'Monday', '66'),
(2844, '15', '05:15 AM', '05:30 AM', 'Monday', '63'),
(2843, '15', '05:00 AM', '05:15 AM', 'Monday', '60'),
(2842, '15', '04:45 AM', '05:00 AM', 'Monday', '57'),
(2841, '15', '04:30 AM', '04:45 AM', 'Monday', '54'),
(2840, '15', '04:15 AM', '04:30 AM', 'Monday', '51'),
(2839, '15', '04:00 AM', '04:15 AM', 'Monday', '48'),
(2838, '15', '03:45 AM', '04:00 AM', 'Monday', '45'),
(2837, '15', '03:30 AM', '03:45 AM', 'Monday', '42'),
(2836, '15', '03:15 AM', '03:30 AM', 'Monday', '39'),
(2835, '15', '03:00 AM', '03:15 AM', 'Monday', '36'),
(2834, '15', '02:45 AM', '03:00 AM', 'Monday', '33'),
(2833, '15', '02:30 AM', '02:45 AM', 'Monday', '30'),
(2832, '15', '02:15 AM', '02:30 AM', 'Monday', '27'),
(2831, '15', '02:00 AM', '02:15 AM', 'Monday', '24'),
(2830, '15', '01:45 AM', '02:00 AM', 'Monday', '21'),
(2829, '15', '01:30 AM', '01:45 AM', 'Monday', '18'),
(2828, '15', '01:15 AM', '01:30 AM', 'Monday', '15'),
(2827, '15', '01:00 AM', '01:15 AM', 'Monday', '12'),
(2826, '15', '12:45 AM', '01:00 AM', 'Monday', '9'),
(2825, '15', '12:30 AM', '12:45 AM', 'Monday', '6'),
(2765, '15', '12:30 AM', '12:45 AM', 'Wednesday', '6'),
(2766, '15', '12:45 AM', '01:00 AM', 'Wednesday', '9'),
(2767, '15', '01:00 AM', '01:15 AM', 'Wednesday', '12'),
(2768, '15', '01:15 AM', '01:30 AM', 'Wednesday', '15'),
(2769, '15', '01:30 AM', '01:45 AM', 'Wednesday', '18'),
(2770, '15', '01:45 AM', '02:00 AM', 'Wednesday', '21'),
(2771, '15', '02:00 AM', '02:15 AM', 'Wednesday', '24'),
(2772, '15', '02:15 AM', '02:30 AM', 'Wednesday', '27'),
(2773, '15', '02:30 AM', '02:45 AM', 'Wednesday', '30'),
(2774, '15', '02:45 AM', '03:00 AM', 'Wednesday', '33'),
(2775, '15', '03:00 AM', '03:15 AM', 'Wednesday', '36'),
(2776, '15', '03:15 AM', '03:30 AM', 'Wednesday', '39'),
(2777, '15', '03:30 AM', '03:45 AM', 'Wednesday', '42'),
(2778, '15', '03:45 AM', '04:00 AM', 'Wednesday', '45'),
(2779, '15', '04:00 AM', '04:15 AM', 'Wednesday', '48'),
(2780, '15', '04:15 AM', '04:30 AM', 'Wednesday', '51'),
(2781, '15', '04:30 AM', '04:45 AM', 'Wednesday', '54'),
(2782, '15', '04:45 AM', '05:00 AM', 'Wednesday', '57'),
(2783, '15', '05:00 AM', '05:15 AM', 'Wednesday', '60'),
(2784, '15', '05:15 AM', '05:30 AM', 'Wednesday', '63'),
(2785, '15', '05:30 AM', '05:45 AM', 'Wednesday', '66'),
(2786, '15', '05:45 AM', '06:00 AM', 'Wednesday', '69'),
(2787, '15', '06:00 AM', '06:15 AM', 'Wednesday', '72'),
(2788, '15', '06:15 AM', '06:30 AM', 'Wednesday', '75'),
(2789, '15', '06:30 AM', '06:45 AM', 'Wednesday', '78'),
(2790, '15', '06:45 AM', '07:00 AM', 'Wednesday', '81'),
(2791, '15', '07:00 AM', '07:15 AM', 'Wednesday', '84'),
(2792, '15', '07:15 AM', '07:30 AM', 'Wednesday', '87'),
(2793, '15', '07:30 AM', '07:45 AM', 'Wednesday', '90'),
(2794, '15', '07:45 AM', '08:00 AM', 'Wednesday', '93'),
(2795, '15', '08:00 AM', '08:15 AM', 'Wednesday', '96'),
(2796, '15', '08:15 AM', '08:30 AM', 'Wednesday', '99'),
(2797, '15', '08:30 AM', '08:45 AM', 'Wednesday', '102'),
(2798, '15', '08:45 AM', '09:00 AM', 'Wednesday', '105'),
(2799, '15', '09:00 AM', '09:15 AM', 'Wednesday', '108'),
(2800, '15', '09:15 AM', '09:30 AM', 'Wednesday', '111'),
(2801, '15', '09:30 AM', '09:45 AM', 'Wednesday', '114'),
(2802, '15', '09:45 AM', '10:00 AM', 'Wednesday', '117'),
(2803, '15', '10:00 AM', '10:15 AM', 'Wednesday', '120'),
(2804, '15', '10:15 AM', '10:30 AM', 'Wednesday', '123'),
(2805, '15', '10:30 AM', '10:45 AM', 'Wednesday', '126'),
(2806, '15', '10:45 AM', '11:00 AM', 'Wednesday', '129'),
(2807, '15', '11:00 AM', '11:15 AM', 'Wednesday', '132'),
(2808, '15', '11:15 AM', '11:30 AM', 'Wednesday', '135'),
(2809, '15', '11:30 AM', '11:45 AM', 'Wednesday', '138'),
(2810, '15', '11:45 AM', '12:00 PM', 'Wednesday', '141'),
(2811, '15', '12:00 PM', '12:15 PM', 'Wednesday', '144'),
(2812, '15', '12:15 PM', '12:30 PM', 'Wednesday', '147'),
(2813, '15', '12:30 PM', '12:45 PM', 'Wednesday', '150'),
(2814, '15', '12:45 PM', '01:00 PM', 'Wednesday', '153'),
(2815, '15', '01:00 PM', '01:15 PM', 'Wednesday', '156'),
(2816, '15', '01:15 PM', '01:30 PM', 'Wednesday', '159'),
(2817, '15', '01:30 PM', '01:45 PM', 'Wednesday', '162'),
(2818, '15', '01:45 PM', '02:00 PM', 'Wednesday', '165'),
(2819, '15', '02:00 PM', '02:15 PM', 'Wednesday', '168'),
(2820, '15', '02:15 PM', '02:30 PM', 'Wednesday', '171'),
(2821, '15', '02:30 PM', '02:45 PM', 'Wednesday', '174'),
(2822, '15', '02:45 PM', '03:00 PM', 'Wednesday', '177'),
(2823, '15', '03:00 PM', '03:15 PM', 'Wednesday', '180'),
(2824, '15', '03:15 PM', '03:30 PM', 'Wednesday', '183'),
(2877, '15', '01:30 PM', '01:45 PM', 'Monday', '162'),
(2878, '15', '01:45 PM', '02:00 PM', 'Monday', '165'),
(2879, '15', '02:00 PM', '02:15 PM', 'Monday', '168'),
(2880, '15', '02:15 PM', '02:30 PM', 'Monday', '171'),
(2881, '15', '02:30 PM', '02:45 PM', 'Monday', '174'),
(2882, '15', '02:45 PM', '03:00 PM', 'Monday', '177'),
(2883, '15', '03:00 PM', '03:15 PM', 'Monday', '180'),
(2884, '15', '03:15 PM', '03:30 PM', 'Monday', '183'),
(2885, '16', '03:00 PM', '03:15 PM', 'Monday', '180'),
(2886, '16', '03:15 PM', '03:30 PM', 'Monday', '183'),
(2887, '16', '03:30 PM', '03:45 PM', 'Monday', '186'),
(2888, '16', '03:45 PM', '04:00 PM', 'Monday', '189'),
(2889, '16', '04:00 PM', '04:15 PM', 'Wednesday', '192'),
(2890, '16', '04:15 PM', '04:30 PM', 'Wednesday', '195'),
(2891, '16', '04:30 PM', '04:45 PM', 'Wednesday', '198'),
(2892, '16', '04:45 PM', '05:00 PM', 'Wednesday', '201'),
(2893, '16', '05:00 PM', '05:15 PM', 'Wednesday', '204'),
(2894, '16', '05:15 PM', '05:30 PM', 'Wednesday', '207'),
(2895, '16', '05:30 PM', '05:45 PM', 'Wednesday', '210'),
(2896, '16', '05:45 PM', '06:00 PM', 'Wednesday', '213'),
(2897, '17', '10:00 AM', '10:15 AM', 'Tuesday', '120'),
(2898, '17', '10:15 AM', '10:30 AM', 'Tuesday', '123'),
(2899, '17', '10:30 AM', '10:45 AM', 'Tuesday', '126'),
(2900, '17', '10:45 AM', '11:00 AM', 'Tuesday', '129'),
(2901, '17', '11:00 AM', '11:15 AM', 'Tuesday', '132'),
(2902, '17', '11:15 AM', '11:30 AM', 'Tuesday', '135'),
(2903, '17', '11:30 AM', '11:45 AM', 'Tuesday', '138'),
(2904, '17', '11:45 AM', '12:00 PM', 'Tuesday', '141'),
(2905, '17', '12:00 PM', '12:15 PM', 'Tuesday', '144'),
(2906, '17', '12:15 PM', '12:30 PM', 'Tuesday', '147'),
(2907, '17', '12:30 PM', '12:45 PM', 'Tuesday', '150'),
(2908, '17', '12:45 PM', '01:00 PM', 'Tuesday', '153'),
(2909, '17', '10:00 AM', '10:15 AM', 'Thursday', '120'),
(2910, '17', '10:15 AM', '10:30 AM', 'Thursday', '123'),
(2911, '17', '10:30 AM', '10:45 AM', 'Thursday', '126'),
(2912, '17', '10:45 AM', '11:00 AM', 'Thursday', '129'),
(2913, '17', '11:00 AM', '11:15 AM', 'Thursday', '132'),
(2914, '17', '11:15 AM', '11:30 AM', 'Thursday', '135'),
(2915, '17', '11:30 AM', '11:45 AM', 'Thursday', '138'),
(2916, '17', '11:45 AM', '12:00 PM', 'Thursday', '141'),
(2917, '17', '12:00 PM', '12:15 PM', 'Thursday', '144'),
(2918, '17', '12:15 PM', '12:30 PM', 'Thursday', '147'),
(2919, '17', '12:30 PM', '12:45 PM', 'Thursday', '150'),
(2920, '17', '12:45 PM', '01:00 PM', 'Thursday', '153'),
(2921, '17', '10:00 AM', '10:15 AM', 'Friday', '120'),
(2922, '17', '10:15 AM', '10:30 AM', 'Friday', '123'),
(2923, '17', '10:30 AM', '10:45 AM', 'Friday', '126'),
(2924, '17', '10:45 AM', '11:00 AM', 'Friday', '129'),
(2925, '17', '11:00 AM', '11:15 AM', 'Friday', '132'),
(2926, '17', '11:15 AM', '11:30 AM', 'Friday', '135'),
(2927, '17', '11:30 AM', '11:45 AM', 'Friday', '138'),
(2928, '17', '11:45 AM', '12:00 PM', 'Friday', '141'),
(2929, '17', '12:00 PM', '12:15 PM', 'Friday', '144'),
(2930, '17', '12:15 PM', '12:30 PM', 'Friday', '147'),
(2931, '17', '12:30 PM', '12:45 PM', 'Friday', '150'),
(2932, '17', '12:45 PM', '01:00 PM', 'Friday', '153');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$dxACPpnFozxfaNdOyKR8x.R4SwJwru2rFwG6BBfOpUnAoVfViQDs.', '', 'admin@dms.com', '', 'g0wt205VJVb4a9819f14ce3d10dffe14f93680e2', 1607595309, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1681363784, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(109, '113.11.74.192', 'Mrs Nurse', '$2y$08$CqxsVFewynbZi6UBOe481eJWbkNdOa/ehpmlGXJnrjq5mvpPDdzoO', NULL, 'nurse@dms.com', NULL, NULL, NULL, NULL, 1435082243, 1680936468, 1, NULL, NULL, NULL, NULL),
(110, '113.11.74.192', 'Mr. Pharmacist', '$2y$08$uy2YnEG6kAADq8QLL2MS7OfvPs.ZLcWmAVJCj5LA4pNQTuuBWNZ4G', NULL, 'pharmacist@dms.com', NULL, NULL, NULL, 'mbeMop6vTuscFYmD2M4Iqu', 1435082359, 1681194236, 1, NULL, NULL, NULL, NULL),
(111, '113.11.74.192', 'Triana', '$2y$08$hSHiFXnJZE4fusxX2WlfYeIVIYLH2H6ZfyINHRQLbrTAUcnVc572a', NULL, 'lab@umsu.ac.id', NULL, NULL, NULL, NULL, 1435082438, 1681194475, 1, NULL, NULL, NULL, NULL),
(112, '113.11.74.192', 'Mr. Accountant', '$2y$08$MeJQlgRC1AALgtvxfXwhuu5p1QOE9VAhXf7eM7llpt1TRRpNxVAFu', NULL, 'accountant@dms.com', NULL, NULL, NULL, NULL, 1435082637, 1680926656, 1, NULL, NULL, NULL, NULL),
(614, '103.231.162.58', 'Mr Receptionist', '$2y$08$K2lK8Adt2whlJupWKZuPiuE7GIS.yI0ort8xgOGAERLqdwapGWszq', NULL, 'receptionist@dms.com', NULL, NULL, NULL, NULL, 1505800835, 1681194703, 1, NULL, NULL, NULL, NULL),
(1589, '::1', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '$2y$08$Rc.8lI89Oh0IqgtPFtjGM.qHmCqoe3UxyCnF8f0N//de4BEg.xCje', NULL, 'siti@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1590, '::1', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', '$2y$08$1ufmv069IbpgV0uY8m0QJ.O9NVoP1Dz4/.1NX4kI8XKC3YyDnS78y', NULL, 'edy@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1591, '::1', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', '$2y$08$CUiVd2sHYESIKeqk6kdeA.dtJgsUOM0Z1vRANAF2JEQMF1BwCM99e', NULL, 'putri@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1592, '::1', 'dr.Rahmawati, M.Ked (PD), Sp.PD', '$2y$08$M83D6V53w3JgJnNxQ9GL4.n2OPdrPZOAWquDvQ10F1ojd1T.CRvuG', NULL, 'rahmawati@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1593, '::1', 'dr.Ren Astrid Allail Siregar, Sp.PA', '$2y$08$aFjmd7Ek2VdFsIKSr4YDVO6liCqNG1AUEgNjLVQsCKt3fahoX2cgG', NULL, 'ren@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1594, '::1', 'dr.Huwainan Nisa Nasution, M.Kes, Sp. PD', '$2y$08$tmLA6u6bUdcmDgKckb.E3eo0P8gfKb7zfLkaWrVedAcJeu9Y7HG2O', NULL, 'huwainan@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1595, '::1', 'dr.Hendra Sutysna, M.Biomed, AIFO-K, Sp. KKLP', '$2y$08$zd78sNm0146s7dfGcqJCc.nXsVpZ7aPSGz9UAlZm/npW.UgPZTLdK', NULL, 'hendra@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1596, '::1', 'dr.Eka Febriyanti, M.Gizi', '$2y$08$kLT2ualeshA9zJNv/y9wAOpGIiDvQ1P1EQj2D.hJsim2XE/4SJnty', NULL, 'eka@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1597, '::1', 'dr.Nurhasanah, Sp.K.J', '$2y$08$YuN1ckvzPBH4jUEFMzC/beHNxJ/YtDoqv5Ye1B1cl1y8VkKjg5s42', NULL, 'nurhasanah@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1598, '::1', 'dr.Leny Wardaini S, M.Ked (Neu) Sp.S', '$2y$08$qg.L/pCUotNA71FMAQh8/.UlspK2Nk8liWC5AyBTJb7IOskypK.Zq', NULL, 'leny@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1599, '::1', 'dr.Rahmanita Sinaga, M.Ked(OG). Sp.OG', '$2y$08$a7TKgcDqO9Erjm2P5wdU.e0JQ0QnjsHilAE1Kc666qpdX8mQlleSm', NULL, 'rahmanita@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1600, '::1', 'dr.Yuanita Mayasari Aritonang, Sp.PK', '$2y$08$oT2GrNwx8.PqYzAvpxYnxO6i14cz1w74OCnISEWHq42ZOtHjkWUmu', NULL, 'yuanita@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL),
(1601, '::1', 'dr.Nurlina Setiadi', '$2y$08$hKiAbznbtM26gAlhbAqgXOBG6y/ZAggcI84r57hNyzVrbS/bb9B6G', NULL, 'nurlina@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, 1681363742, 1, NULL, NULL, NULL, NULL),
(1602, '::1', 'Dina Ritonga', '$2y$08$03T2wFP2jXOsSIzrFz6owuqIQhLoX8zjnX48MgRLAB3ks1VzY2BOS', NULL, 'dina@gmail.com', NULL, NULL, NULL, NULL, 1681254490, NULL, 1, NULL, NULL, NULL, NULL),
(1603, '::1', 'Fajar Gultom', '$2y$08$drTIgP8dqGFMP.zyVeyrtO.PI9hzf4q075HRXHy1gNTV6RhRmmcYa', NULL, 'fajar@gmail.com', NULL, NULL, NULL, NULL, 1681254670, 1681363814, 1, NULL, NULL, NULL, NULL),
(1604, '::1', 'Indah Sari', '$2y$08$dhKkqgvTSdkWU4nuOjfMuePRMNj1RlJwCj4Ls/lYF5VnxLmkLKV0S', NULL, 'perawat@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263645, 1681264030, 1, NULL, NULL, NULL, NULL),
(1605, '::1', 'Melodi Medica', '$2y$08$rDrhJ5ITMRN4MzG1blA.zuaJj6OUV/jWqcdADv3Srviv/3I6JbtG2', NULL, 'resepsionis@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263717, NULL, 1, NULL, NULL, NULL, NULL),
(1606, '::1', 'Melisa Danarto', '$2y$08$kBiLfu/WlqD8VfKRKgsGO.u6TZiX0G0sxzBQ3DabO6dC5Ybnx.6H.', NULL, 'kasir@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263835, NULL, 1, NULL, NULL, NULL, NULL),
(1607, '::1', 'Kiky Ayunita', '$2y$08$aIO5YGBV.4Cuf6Upon7Ytu5CJRSHPcP05v0YCMxr4xcyLIoWojRB.', NULL, 'apotik@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263996, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(111, 109, 6),
(112, 110, 7),
(113, 111, 8),
(114, 112, 3),
(616, 614, 10),
(5586, 1589, 4),
(5587, 1590, 4),
(5588, 1591, 4),
(5589, 1592, 4),
(5590, 1593, 4),
(5591, 1594, 4),
(5592, 1595, 4),
(5593, 1596, 4),
(5594, 1597, 4),
(5595, 1598, 4),
(5596, 1599, 4),
(5597, 1600, 4),
(5598, 1601, 4),
(5599, 1602, 5),
(5600, 1603, 5),
(5601, 1604, 6),
(5602, 1605, 10),
(5603, 1606, 3),
(5604, 1607, 7);

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `emergency` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `block_1_text_under_title` varchar(500) DEFAULT NULL,
  `service_block__text_under_title` varchar(500) DEFAULT NULL,
  `doctor_block__text_under_title` varchar(500) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `youtube_id` varchar(100) DEFAULT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `twitter_username` varchar(1000) DEFAULT NULL,
  `appointment_title` varchar(1000) NOT NULL,
  `appointment_subtitle` varchar(1000) NOT NULL,
  `appointment_description` varchar(1000) NOT NULL,
  `appointment_img_url` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `title`, `description`, `logo`, `address`, `phone`, `emergency`, `support`, `email`, `currency`, `block_1_text_under_title`, `service_block__text_under_title`, `doctor_block__text_under_title`, `facebook_id`, `twitter_id`, `google_id`, `youtube_id`, `skype_id`, `x`, `twitter_username`, `appointment_title`, `appointment_subtitle`, `appointment_description`, `appointment_img_url`) VALUES
(1, 'Specialis Clinic', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus deleniti mollitia quibusdam natus dolorum quae id libero rerum ullam maxime molestias exercitationem incidunt, sunt, delectus consequuntur dignissimos ab iste fuga?', 'uploads/LOGO_KLINIllll.png', 'Jl. Gedung Arca No.53, Teladan Bar., Kec. Medan Kota, Kota Medan, Sumatera Utara 20217', '081269995201', '+0123456789', '+0123456789', 'admin@demo.com', 'Rp', 'Best Hospital In The City', 'Aenean nibh ante, lacinia non tincidunt nec, lobortis ut tellus. Sed in porta diam.', 'We work with forward thinking clients to create beautiful, honest and amazing things that bring positive results.', 'https://www.facebook.com/rizvi.plabon', 'https://www.twitter.com/casoft', 'https://www.google.com/casoft', 'https://www.youtube.com/casoft', 'https://www.skype.com/casoft', NULL, 'codearistos', 'Why you should choose us?', 'WELCOME TO HOSPITAL MANAGEMENT', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam nulla quibusdam nam autem, in quasi quae cumque, laborum optio nobis reprehenderit doloremque delectus voluptate. Maxime aliquam vitae adipisci sit numquam?', 'uploads/why-choose-us-doc.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankb`
--
ALTER TABLE `bankb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_payment`
--
ALTER TABLE `ot_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_material`
--
ALTER TABLE `patient_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_gallery`
--
ALTER TABLE `site_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_grid`
--
ALTER TABLE `site_grid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_review`
--
ALTER TABLE `site_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bankb`
--
ALTER TABLE `bankb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2892;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ot_payment`
--
ALTER TABLE `ot_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1733;

--
-- AUTO_INCREMENT for table `patient_material`
--
ALTER TABLE `patient_material`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_gallery`
--
ALTER TABLE `site_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site_grid`
--
ALTER TABLE `site_grid`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_review`
--
ALTER TABLE `site_review`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2933;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1608;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5605;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
