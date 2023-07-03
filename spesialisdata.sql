/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MariaDB
 Source Server Version : 100424 (10.4.24-MariaDB)
 Source Host           : 127.0.0.1:3306
 Source Schema         : spesialisdata

 Target Server Type    : MariaDB
 Target Server Version : 100424 (10.4.24-MariaDB)
 File Encoding         : 65001

 Date: 03/07/2023 12:32:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for accountant
-- ----------------------------
DROP TABLE IF EXISTS `accountant`;
CREATE TABLE `accountant`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 82 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of accountant
-- ----------------------------
INSERT INTO `accountant` VALUES (72, 'uploads/favicon7.png', 'Mr. Accountant', 'accountant@dms.com', 'New York, USA', '+880123456789', '', '112');
INSERT INTO `accountant` VALUES (81, NULL, 'Melisa Danarto', 'kasir@umsu.ac.id', 'Medan', '085234', NULL, '1606');

-- ----------------------------
-- Table structure for appointment
-- ----------------------------
DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time_slot` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `e_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `registration_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `request` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patientname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctorname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `room_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `live_meeting_link` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `app_time` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `app_time_full_format` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of appointment
-- ----------------------------
INSERT INTO `appointment` VALUES (3, '4', '7', '1684965600', '03:00 PM To 03:15 PM', '03:00 PM', '03:15 PM', 'jhkjh', '05/25/23', '1684987635', '180', 'Pending Confirmation', '1', '', 'Fajar Gultom', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', 'hms-meeting-0857-799669', 'https://meet.jit.si/hms-meeting-0857-799669', '1685019600', '25-05-2023 03:00 PM-03:15 PM');
INSERT INTO `appointment` VALUES (4, '3', '9', '1684965600', NULL, '', '', 'lorem ipsum', '05/26/23', '1685065345', '0', 'Treated', '1', '', 'Dina Ritonga', 'dr.Rahmawati, M.Ked (PD), Sp.PD', 'hms-meeting-0812-146335', 'https://meet.jit.si/hms-meeting-0812-146335', '1684965600', '25-05-2023 -');
INSERT INTO `appointment` VALUES (5, '4', '6', '1685484000', 'Not Selected', 'Not Selected', '', 'lorem ipsum', '05/26/23', '1685073018', '0', 'Pending Confirmation', '1', '', 'Fajar Gultom', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', 'hms-meeting-0857-653613', 'https://meet.jit.si/hms-meeting-0857-653613', '0', '31-05-2023 Not Selected-');
INSERT INTO `appointment` VALUES (6, '4', '8', '1683669600', 'Not Selected', 'Not Selected', '', 'lorem ipsum', '05/26/23', '1685073169', '0', 'Pending Confirmation', '1', '', 'Fajar Gultom', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', 'hms-meeting-0857-832934', 'https://meet.jit.si/hms-meeting-0857-832934', '0', '10-05-2023 Not Selected-');
INSERT INTO `appointment` VALUES (7, '3', '7', '1684620000', 'Not Selected', 'Not Selected', '', 'ljlkjkljklj', '05/26/23', '1685073310', '0', 'Pending Confirmation', '1', '', 'Dina Ritonga', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', 'hms-meeting-0812-762558', 'https://meet.jit.si/hms-meeting-0812-762558', '0', '21-05-2023 Not Selected-');
INSERT INTO `appointment` VALUES (9, '4', '6', '1685052000', 'Not Selected', 'Not Selected', '', 'hari ini', '05/26/23', '1685075541', '0', 'Pending Confirmation', '1', '', 'Fajar Gultom', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', 'hms-meeting-0857-129500', 'https://meet.jit.si/hms-meeting-0857-129500', '0', '26-05-2023 Not Selected-');
INSERT INTO `appointment` VALUES (10, '5', '12', '1684965600', NULL, '', '', 'janji hari ini', '05/26/23', '1685075735', '0', 'Pending Confirmation', '1', '', 'test', 'dr.Hendra Sutysna, M.Biomed, AIFO-K, Sp. KKLP', 'hms-meeting-08233-915030', 'https://meet.jit.si/hms-meeting-08233-915030', '1684965600', '25-05-2023 -');
INSERT INTO `appointment` VALUES (11, '4', '7', '1685052000', '03:00 PM To 03:15 PM', '03:00 PM', '03:15 PM', 'test hari ini', '05/26/23', '1685075999', '180', 'Pending Confirmation', '1', '', 'Fajar Gultom', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', 'hms-meeting-0857-798397', 'https://meet.jit.si/hms-meeting-0857-798397', '1685106000', '26-05-2023 03:00 PM-03:15 PM');

-- ----------------------------
-- Table structure for autoemailshortcode
-- ----------------------------
DROP TABLE IF EXISTS `autoemailshortcode`;
CREATE TABLE `autoemailshortcode`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of autoemailshortcode
-- ----------------------------
INSERT INTO `autoemailshortcode` VALUES (1, '{firstname}', 'payment');
INSERT INTO `autoemailshortcode` VALUES (2, '{lastname}', 'payment');
INSERT INTO `autoemailshortcode` VALUES (3, '{name}', 'payment');
INSERT INTO `autoemailshortcode` VALUES (4, '{amount}', 'payment');
INSERT INTO `autoemailshortcode` VALUES (52, '{doctorname}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (42, '{firstname}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (51, '{name}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (50, '{lastname}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (49, '{firstname}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (48, '{hospital_name}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (47, '{time_slot}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (46, '{appoinmentdate}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (45, '{doctorname}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (44, '{name}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (43, '{lastname}', 'appoinment_creation');
INSERT INTO `autoemailshortcode` VALUES (26, '{name}', 'doctor');
INSERT INTO `autoemailshortcode` VALUES (27, '{firstname}', 'doctor');
INSERT INTO `autoemailshortcode` VALUES (28, '{lastname}', 'doctor');
INSERT INTO `autoemailshortcode` VALUES (29, '{company}', 'doctor');
INSERT INTO `autoemailshortcode` VALUES (41, '{doctor}', 'patient');
INSERT INTO `autoemailshortcode` VALUES (40, '{company}', 'patient');
INSERT INTO `autoemailshortcode` VALUES (39, '{lastname}', 'patient');
INSERT INTO `autoemailshortcode` VALUES (38, '{firstname}', 'patient');
INSERT INTO `autoemailshortcode` VALUES (37, '{name}', 'patient');
INSERT INTO `autoemailshortcode` VALUES (36, '{department}', 'doctor');
INSERT INTO `autoemailshortcode` VALUES (53, '{appoinmentdate}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (54, '{time_slot}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (55, '{hospital_name}', 'appoinment_confirmation');
INSERT INTO `autoemailshortcode` VALUES (56, '{start_time}', 'meeting_creation');
INSERT INTO `autoemailshortcode` VALUES (57, '{patient_name}', 'meeting_creation');
INSERT INTO `autoemailshortcode` VALUES (58, '{doctor_name}', 'meeting_creation');
INSERT INTO `autoemailshortcode` VALUES (59, '{hospital_name}', 'meeting_creation');
INSERT INTO `autoemailshortcode` VALUES (60, '{meeting_link}', 'meeting_creation');

-- ----------------------------
-- Table structure for autoemailtemplate
-- ----------------------------
DROP TABLE IF EXISTS `autoemailtemplate`;
CREATE TABLE `autoemailtemplate`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of autoemailtemplate
-- ----------------------------
INSERT INTO `autoemailtemplate` VALUES (1, 'Payment successful email to patient', '<p>Dear {name}, Your paying amount - Tk {amount} was successful.</p>\r\n\r\n<p>Thank You</p>\r\n', 'payment', 'Active');
INSERT INTO `autoemailtemplate` VALUES (9, 'Appointment creation email to patient', 'Dear {name},<br />\r\nYou have an &nbsp;appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_creation', 'Active');
INSERT INTO `autoemailtemplate` VALUES (10, 'Appointment Confirmation email  to patient', 'Dear {name},<br />\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_confirmation', 'Active');
INSERT INTO `autoemailtemplate` VALUES (11, 'Meeting Schedule Notification To Patient', '<p>Dear {patient_name},</p>\r\n\r\n<p>You have a Live Video Meeting with {doctor_name} on {start_time}.<br />\r\nPlease click on this link to join the meeting&nbsp; {meeting_link} .<br />\r\nFor more information please contact with {hospital_name} .</p>\r\n\r\n<p>Regards</p>\r\n', 'meeting_creation', 'Active');
INSERT INTO `autoemailtemplate` VALUES (6, 'send joining confirmation to Doctor', '<p>Dear {name},<br />\r\nYou are appointed as a doctor&nbsp; in {department}.<br />\r\nThank You</p>\r\n\r\n<p>{company}</p>\r\n', 'doctor', 'Active');
INSERT INTO `autoemailtemplate` VALUES (8, 'Patient Registration Confirmation ', '<p>Dear {name},</p>\r\n\r\n<p>You are registered to {company} as a patient to {doctor}.</p>\r\n\r\n<p>Regards</p>\r\n', 'patient', 'Active');

-- ----------------------------
-- Table structure for autosmsshortcode
-- ----------------------------
DROP TABLE IF EXISTS `autosmsshortcode`;
CREATE TABLE `autosmsshortcode`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 63 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of autosmsshortcode
-- ----------------------------
INSERT INTO `autosmsshortcode` VALUES (1, '{name}', 'payment');
INSERT INTO `autosmsshortcode` VALUES (2, '{firstname}', 'payment');
INSERT INTO `autosmsshortcode` VALUES (3, '{lastname}', 'payment');
INSERT INTO `autosmsshortcode` VALUES (4, '{amount}', 'payment');
INSERT INTO `autosmsshortcode` VALUES (55, '{appoinmentdate}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (54, '{doctorname}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (53, '{name}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (52, '{lastname}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (51, '{firstname}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (50, '{time_slot}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (49, '{appoinmentdate}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (48, '{hospital_name}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (47, '{doctorname}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (46, '{name}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (45, '{lastname}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (44, '{firstname}', 'appoinment_creation');
INSERT INTO `autosmsshortcode` VALUES (28, '{firstname}', 'doctor');
INSERT INTO `autosmsshortcode` VALUES (29, '{lastname}', 'doctor');
INSERT INTO `autosmsshortcode` VALUES (30, '{name}', 'doctor');
INSERT INTO `autosmsshortcode` VALUES (31, '{company}', 'doctor');
INSERT INTO `autosmsshortcode` VALUES (43, '{doctor}', 'patient');
INSERT INTO `autosmsshortcode` VALUES (42, '{company}', 'patient');
INSERT INTO `autosmsshortcode` VALUES (41, '{lastname}', 'patient');
INSERT INTO `autosmsshortcode` VALUES (40, '{firstname}', 'patient');
INSERT INTO `autosmsshortcode` VALUES (39, '{name}', 'patient');
INSERT INTO `autosmsshortcode` VALUES (38, '{department}', 'doctor');
INSERT INTO `autosmsshortcode` VALUES (56, '{time_slot}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (57, '{hospital_name}', 'appoinment_confirmation');
INSERT INTO `autosmsshortcode` VALUES (58, '{start_time}', 'meeting_creation');
INSERT INTO `autosmsshortcode` VALUES (59, '{patient_name}', 'meeting_creation');
INSERT INTO `autosmsshortcode` VALUES (60, '{doctor_name}', 'meeting_creation');
INSERT INTO `autosmsshortcode` VALUES (61, '{hospital_name}', 'meeting_creation');
INSERT INTO `autosmsshortcode` VALUES (62, '{meeting_link}', 'meeting_creation');

-- ----------------------------
-- Table structure for autosmstemplate
-- ----------------------------
DROP TABLE IF EXISTS `autosmstemplate`;
CREATE TABLE `autosmstemplate`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of autosmstemplate
-- ----------------------------
INSERT INTO `autosmstemplate` VALUES (1, 'Payment successful sms to patient', 'Dear {name},\r\n Your paying amount - Tk {amount} was successful.\r\nThank You\r\nPlease contact our support for further queries.', 'payment', 'Active');
INSERT INTO `autosmstemplate` VALUES (12, 'Appointment Confirmation sms to patient', 'Dear {name},\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_confirmation', 'Active');
INSERT INTO `autosmstemplate` VALUES (13, 'Appointment creation sms to patient', 'Dear {name},\r\nYou have an  appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_creation', 'Active');
INSERT INTO `autosmstemplate` VALUES (14, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. Click on this link to join the meeting {meeting_link} . For more information contact with {hospital_name} .\r\nRegards ', 'meeting_creation', 'Active');
INSERT INTO `autosmstemplate` VALUES (9, 'send appoint confirmation to Doctor', 'Dear {name},\nYou are appointed as a doctor in {department} .\nThank You\n{company}', 'doctor', 'Active');
INSERT INTO `autosmstemplate` VALUES (11, 'Patient Registration Confirmation ', 'Dear {name},\n You are registred to {company} as a patient to {doctor}. \nRegards', 'patient', 'Active');

-- ----------------------------
-- Table structure for bankb
-- ----------------------------
DROP TABLE IF EXISTS `bankb`;
CREATE TABLE `bankb`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bankb
-- ----------------------------
INSERT INTO `bankb` VALUES (1, 'A+', '0 Bags');
INSERT INTO `bankb` VALUES (2, 'A-', '0 Bags');
INSERT INTO `bankb` VALUES (3, 'B+', '0 Bags');
INSERT INTO `bankb` VALUES (4, 'B-', '0 Bags');
INSERT INTO `bankb` VALUES (5, 'AB+', '0 Bags');
INSERT INTO `bankb` VALUES (6, 'AB-', '0 Bags');
INSERT INTO `bankb` VALUES (7, 'O+', '0 Bags');
INSERT INTO `bankb` VALUES (8, 'O-', '0 Bags');

-- ----------------------------
-- Table structure for diagnostic_report
-- ----------------------------
DROP TABLE IF EXISTS `diagnostic_report`;
CREATE TABLE `diagnostic_report`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `invoice` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `report` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of diagnostic_report
-- ----------------------------

-- ----------------------------
-- Table structure for doctor
-- ----------------------------
DROP TABLE IF EXISTS `doctor`;
CREATE TABLE `doctor`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `department` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `profile` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of doctor
-- ----------------------------
INSERT INTO `doctor` VALUES (6, 'uploads/Screenshot_2023-04-11_204722.png', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', 'siti@umsu.ac.id', 'Medan, SUMUT', '-', 'THT', 'Spesialis THT', NULL, NULL, '1589');
INSERT INTO `doctor` VALUES (7, 'uploads/download(2).png', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', 'edy@umsu.ac.id', 'Medan, SUMUT', '-', 'THT', 'Spesialis THT', NULL, NULL, '1590');
INSERT INTO `doctor` VALUES (8, 'uploads/WhatsApp_Image_2023-04-11_at_15_28_23.png', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', 'putri@umsu.ac.id', 'Medan, SUMUT', '-', 'SK', 'Spesialis Kulit dan Kelamin', NULL, NULL, '1591');
INSERT INTO `doctor` VALUES (9, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image4519777.png', 'dr.Rahmawati, M.Ked (PD), Sp.PD', 'rahmawati@umsu.ac.id', 'Medan, SUMUT', '-', 'SPD', 'Spesialis Penyakit Dalam', NULL, NULL, '1592');
INSERT INTO `doctor` VALUES (10, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197771.png', 'dr.Ren Astrid Allail Siregar, Sp.PA', 'ren@umsu.ac.id', 'Medan, SUMUT', '-', 'SPA', 'Spesialis Patologi Anatomik', NULL, NULL, '1593');
INSERT INTO `doctor` VALUES (11, 'uploads/WhatsApp_Image_2023-04-11_at_15_20_24.jpg', 'dr.Huwainan Nisa Nasution, M.Kes, Sp. PD', 'huwainan@umsu.ac.id', 'Medan, SUMUT', '-', 'SPD', 'Spesialis Penyakit Dalam', NULL, NULL, '1594');
INSERT INTO `doctor` VALUES (12, 'uploads/download(2)1.png', 'dr.Hendra Sutysna, M.Biomed, AIFO-K, Sp. KKLP', 'hendra@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1595');
INSERT INTO `doctor` VALUES (13, 'uploads/WhatsApp_Image_2023-04-11_at_15_20_00.png', 'dr.Eka Febriyanti, M.Gizi', 'eka@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1596');
INSERT INTO `doctor` VALUES (14, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197772.png', 'dr.Nurhasanah, Sp.K.J', 'nurhasanah@umsu.ac.id', 'Medan, SUMUT', '-', 'SPJ', 'Spesialis Kedokteran Jiwa', NULL, NULL, '1597');
INSERT INTO `doctor` VALUES (15, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197773.png', 'dr.Leny Wardaini S, M.Ked (Neu) Sp.S', 'leny@umsu.ac.id', 'Medan, SUMUT', '-', 'SN', 'Spesialis Neurologi', NULL, NULL, '1598');
INSERT INTO `doctor` VALUES (16, 'uploads/dr_-Rahmanita-Sinaga-M_Ked-OG-Sp_OG-225x300.jpg', 'dr.Rahmanita Sinaga, M.Ked(OG). Sp.OG', 'rahmanita@umsu.ac.id', 'Medan, SUMUT', '-', 'SO', 'Spesialis Obgyn', NULL, NULL, '1599');
INSERT INTO `doctor` VALUES (17, 'uploads/pngtree-beautiful-woman-muslimah-character-in-doctor-ilustrasi-png-image45197774.png', 'dr.Yuanita Mayasari Aritonang, Sp.PK', 'yuanita@umsu.ac.id', 'Medan, SUMUT', '-', 'SPK', 'Spesialis Patologi Klinik', NULL, NULL, '1600');
INSERT INTO `doctor` VALUES (18, 'uploads/WhatsApp_Image_2023-04-11_at_14_30_16.png', 'dr.Nurlina Setiadi', 'nurlina@umsu.ac.id', 'Medan, SUMUT', '-', 'UMUM', 'Dokter Umum', NULL, NULL, '1601');

-- ----------------------------
-- Table structure for email
-- ----------------------------
DROP TABLE IF EXISTS `email`;
CREATE TABLE `email`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reciepient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of email
-- ----------------------------
INSERT INTO `email` VALUES (52, 'Pro-active Email for employment verification ( 12305-0121-0505)', '1615197338', '<p>kkgjgjhgj</p>\r\n', 'rizvi.mahmud.plabon@gmail.com', '1');

-- ----------------------------
-- Table structure for email_settings
-- ----------------------------
DROP TABLE IF EXISTS `email_settings`;
CREATE TABLE `email_settings`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `smtp_host` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `smtp_port` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `send_multipart` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mail_provider` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of email_settings
-- ----------------------------
INSERT INTO `email_settings` VALUES (1, 'shaibal@codearistos.net', 'Domain Email', '', '', '', '', '', NULL);
INSERT INTO `email_settings` VALUES (6, NULL, 'Smtp', 'sahashaibal22@yahoo.com', 'YXNvdWh6eGNqYW1ydmN2eQ==', 'smtp.mail.yahoo.com', '587', '1', 'yahoo');

-- ----------------------------
-- Table structure for expense
-- ----------------------------
DROP TABLE IF EXISTS `expense`;
CREATE TABLE `expense`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `datestring` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 91 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expense
-- ----------------------------
INSERT INTO `expense` VALUES (89, 'USG 2D', '1681228212', 'kertas USG, jelly, buku USG dari klinik', '150000', '1', '11/04/23');
INSERT INTO `expense` VALUES (90, 'USG 4D', '1681228260', 'kertas USG, jelly, buku USG dari klinik', '250000', '1', '11/04/23');

-- ----------------------------
-- Table structure for expense_category
-- ----------------------------
DROP TABLE IF EXISTS `expense_category`;
CREATE TABLE `expense_category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of expense_category
-- ----------------------------
INSERT INTO `expense_category` VALUES (59, 'USG 2D', 'print out 2d', NULL, NULL);
INSERT INTO `expense_category` VALUES (60, 'USG 4D', 'print out 2d+4d', NULL, NULL);

-- ----------------------------
-- Table structure for featured
-- ----------------------------
DROP TABLE IF EXISTS `featured`;
CREATE TABLE `featured`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `profile` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of featured
-- ----------------------------
INSERT INTO `featured` VALUES (1, 'uploads/images.jpg', 'Dr Momenuzzaman', 'Cardiac Specialized', 'Redantium, totam rem aperiam, eaque ipsa qu ab illo inventore veritatis et quasi architectos beatae vitae dicta sunt explicabo. Nemo enims sadips ipsums un.');
INSERT INTO `featured` VALUES (2, 'uploads/doctor.png', 'Dr RahmatUllah Asif', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');
INSERT INTO `featured` VALUES (3, 'uploads/download_(2)2.png', 'Dr A.R.M. Jamil', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (2, 'members', 'General User');
INSERT INTO `groups` VALUES (3, 'Accountant', 'For Financial Activities');
INSERT INTO `groups` VALUES (4, 'Doctor', '');
INSERT INTO `groups` VALUES (5, 'Patient', '');
INSERT INTO `groups` VALUES (6, 'Nurse', '');
INSERT INTO `groups` VALUES (7, 'Pharmacist', '');
INSERT INTO `groups` VALUES (8, 'Laboratorist', '');
INSERT INTO `groups` VALUES (10, 'Receptionist', 'Receptionist');

-- ----------------------------
-- Table structure for holidays
-- ----------------------------
DROP TABLE IF EXISTS `holidays`;
CREATE TABLE `holidays`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of holidays
-- ----------------------------
INSERT INTO `holidays` VALUES (77, '6', '1684879200', NULL, NULL);
INSERT INTO `holidays` VALUES (78, '9', '1683151200', NULL, NULL);
INSERT INTO `holidays` VALUES (79, '10', '1684965600', NULL, NULL);
INSERT INTO `holidays` VALUES (80, '9', '1682892000', NULL, NULL);

-- ----------------------------
-- Table structure for lab
-- ----------------------------
DROP TABLE IF EXISTS `lab`;
CREATE TABLE `lab`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `report` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_string` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab
-- ----------------------------
INSERT INTO `lab` VALUES (1, NULL, '4', '6', '1687125600', NULL, NULL, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', NULL, '1', 'Fajar Gultom', '0857', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '19-06-23');
INSERT INTO `lab` VALUES (2, NULL, '4', '6', '1687557600', NULL, NULL, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n', NULL, '1589', 'Fajar Gultom', '0857', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '24-06-23');
INSERT INTO `lab` VALUES (3, NULL, '4', '6', '1687816800', NULL, 'uploads/ronsen.jpg', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, '1', 'Fajar Gultom', '0857', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '27-06-23');
INSERT INTO `lab` VALUES (4, NULL, '3', '6', '1687903200', NULL, 'uploads/invoice--0011.pdf', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', NULL, '1', 'Dina Ritonga', '0812', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '28-06-23');
INSERT INTO `lab` VALUES (5, NULL, '3', '6', '1687989600', NULL, 'uploads/prescriptionId101_(11).pdf', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n', NULL, '1', 'Dina Ritonga', '0812', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '29-06-23');

-- ----------------------------
-- Table structure for lab_category
-- ----------------------------
DROP TABLE IF EXISTS `lab_category`;
CREATE TABLE `lab_category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reference_value` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 128 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lab_category
-- ----------------------------
INSERT INTO `lab_category` VALUES (35, 'Troponin-I', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (36, 'CBC (DIGITAL)', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (37, 'Eosinophil', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (38, 'Platelets', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (39, 'Malarial Parasites (MP)', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (40, 'BT/ CT', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (41, 'ASO Titre', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (42, 'CRP', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (43, 'R/A test', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (44, 'VDRL', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (45, 'TPHA', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (46, 'HBsAg (Screening)', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (47, 'HBsAg (Confirmatory)', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (48, 'CFT for Kala Zar', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (49, 'CFT for Filaria', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (50, 'Pregnancy Test', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (51, 'Blood Grouping', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (52, 'Widal Test', 'Pathological Test', '(70-110)mg/dl');
INSERT INTO `lab_category` VALUES (53, 'RBS', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (54, 'Blood Urea', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (55, 'S. Creatinine', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (56, 'S. cholesterol', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (57, 'Fasting Lipid Profile', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (58, 'S. Bilirubin', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (59, 'S. Alkaline Phosohare', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (61, 'S. Calcium', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (62, 'RBS with CUS', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (63, 'SGPT', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (64, 'SGOT', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (65, 'Urine for R/E', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (66, 'Urine C/S', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (67, 'Stool for R/E', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (68, 'Semen Analysis', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (69, 'S. Electrolyte', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (70, 'S. T3/ T4/ THS', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (71, 'MT', 'Pathological Test', '');
INSERT INTO `lab_category` VALUES (106, 'ESR', 'Patho Test', '');
INSERT INTO `lab_category` VALUES (107, 'FBS CUS', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (108, 'Hb%', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (114, '2HABF', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (113, 'FBS', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (115, 'S. TSH', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (116, 'S. T3', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (117, 'DC', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (118, 'TC', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (120, 'S. Uric acid', 'Pathological test', '');
INSERT INTO `lab_category` VALUES (126, 'eosinphil', 'Pathology Test', '');

-- ----------------------------
-- Table structure for laboratorist
-- ----------------------------
DROP TABLE IF EXISTS `laboratorist`;
CREATE TABLE `laboratorist`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laboratorist
-- ----------------------------
INSERT INTO `laboratorist` VALUES (3, 'uploads/favicon1.png', 'Triana', 'lab@umsu.ac.id', 'Tembung', '+880123456789', '', '', '111');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for manual_email_template
-- ----------------------------
DROP TABLE IF EXISTS `manual_email_template`;
CREATE TABLE `manual_email_template`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manual_email_template
-- ----------------------------
INSERT INTO `manual_email_template` VALUES (7, 'vddfvdf', '<p>dvdfvdfvdfvd</p>\r\n', 'email');

-- ----------------------------
-- Table structure for manual_sms_template
-- ----------------------------
DROP TABLE IF EXISTS `manual_sms_template`;
CREATE TABLE `manual_sms_template`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manual_sms_template
-- ----------------------------
INSERT INTO `manual_sms_template` VALUES (1, 'test', '{firstname} come to my offce {lastname}', 'sms');
INSERT INTO `manual_sms_template` VALUES (8, 'dsdsdss3wew454', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'sms');
INSERT INTO `manual_sms_template` VALUES (3, 'sdgfgfdgfdgdf', '<p>{email}{instructor}{address} gfdgdfg</p>\r\n', 'email');
INSERT INTO `manual_sms_template` VALUES (7, 'test223', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>dsfsf</td>\r\n			<td>sdfsdf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sdfdsf</td>\r\n			<td>dfdsf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dfdf</td>\r\n			<td>dfdfd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n{email}{instructor}', 'email');
INSERT INTO `manual_sms_template` VALUES (9, 'zxcxzczx', ' {address}{phone}', 'sms');

-- ----------------------------
-- Table structure for manualemailshortcode
-- ----------------------------
DROP TABLE IF EXISTS `manualemailshortcode`;
CREATE TABLE `manualemailshortcode`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manualemailshortcode
-- ----------------------------
INSERT INTO `manualemailshortcode` VALUES (1, '{firstname}', 'email');
INSERT INTO `manualemailshortcode` VALUES (2, '{lastname}', 'email');
INSERT INTO `manualemailshortcode` VALUES (3, '{name}', 'email');
INSERT INTO `manualemailshortcode` VALUES (6, '{address}', 'email');
INSERT INTO `manualemailshortcode` VALUES (7, '{company}', 'email');
INSERT INTO `manualemailshortcode` VALUES (8, '{email}', 'email');
INSERT INTO `manualemailshortcode` VALUES (9, '{phone}', 'email');

-- ----------------------------
-- Table structure for manualsmsshortcode
-- ----------------------------
DROP TABLE IF EXISTS `manualsmsshortcode`;
CREATE TABLE `manualsmsshortcode`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of manualsmsshortcode
-- ----------------------------
INSERT INTO `manualsmsshortcode` VALUES (1, '{firstname}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (2, '{lastname}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (3, '{name}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (4, '{email}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (5, '{phone}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (6, '{address}', 'sms');
INSERT INTO `manualsmsshortcode` VALUES (10, '{company}', 'sms');

-- ----------------------------
-- Table structure for medical_history
-- ----------------------------
DROP TABLE IF EXISTS `medical_history`;
CREATE TABLE `medical_history`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `registration_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 66 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medical_history
-- ----------------------------
INSERT INTO `medical_history` VALUES (65, '4', 'Sakit perut', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Fajar Gultom', 'Medan', '0857', NULL, '1687816800', NULL);

-- ----------------------------
-- Table structure for medicine
-- ----------------------------
DROP TABLE IF EXISTS `medicine`;
CREATE TABLE `medicine`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `box` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `quantity` int(100) NULL DEFAULT NULL,
  `generic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `effects` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `e_date` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2897 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medicine
-- ----------------------------
INSERT INTO `medicine` VALUES (2881, 'Oralit', NULL, '4000', '41', '6000', 91, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2882, 'Omegtrim adult', NULL, '5000', '42', '7000', 7, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2883, 'Pharmamox', NULL, '6000', '43', '8000', 7, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2884, 'Omeroxol', NULL, '7000', '44', '9000', 6, 'Pracetimol', 'Square', 'Mengantuk', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2885, 'Proceles', NULL, '8000', '45', '10000', 109, 'Pracetimol', 'Kimiafarma', 'Mengantuk', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2886, 'Promavit', NULL, '9000', '46', '11000', 147, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2887, 'Phenobiotik', NULL, '10000', '47', '12000', 5, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2888, 'purinic', NULL, '11000', '48', '13000', 69, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2889, 'Premaston ', NULL, '12000', '49', '14000', 2, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '16-08-2023', '11/04/23');
INSERT INTO `medicine` VALUES (2890, 'Pharmaxil', 'Tablet', '13000', '50', '15000', 5, 'Antibiotik', 'Kimiafarma', 'Susah Tidur', '2023-08-18', '11/04/23');

-- ----------------------------
-- Table structure for medicine_category
-- ----------------------------
DROP TABLE IF EXISTS `medicine_category`;
CREATE TABLE `medicine_category`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 27 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medicine_category
-- ----------------------------
INSERT INTO `medicine_category` VALUES (25, 'Tablet', 'Satuan Papan');
INSERT INTO `medicine_category` VALUES (26, 'Sirup', 'Satuan liter');

-- ----------------------------
-- Table structure for meeting
-- ----------------------------
DROP TABLE IF EXISTS `meeting`;
CREATE TABLE `meeting`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `topic` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `start_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `duration` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `timezone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meeting_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `meeting_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time_slot` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `e_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `registration_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `request` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patientname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctorname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_ion_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_ion_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `appointment_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 616 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of meeting
-- ----------------------------
INSERT INTO `meeting` VALUES (597, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:57', '60', 'UTC', '78065502079', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867830', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (596, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:55', '60', 'UTC', '73399002446', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867708', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (594, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:52', '60', 'UTC', '76863762416', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867523', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (595, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:53', '60', 'UTC', '76103574289', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (593, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:50', '60', 'UTC', '78581884320', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (592, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '71935056353', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857283', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (590, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:47', '60', 'UTC', '73066856714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856455', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (591, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '73873024898', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857264', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (589, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:46', '60', 'UTC', '71674039118', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL);
INSERT INTO `meeting` VALUES (598, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:37', '60', 'UTC', '79952317532', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598870269', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (599, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:52', '60', 'UTC', '71430825323', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598871125', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (600, '1', '147', 'Doctor Appointment', '2', '2020-08-31 11:34', '60', 'UTC', '78873863945', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598888071', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (601, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:21', '60', 'UTC', '77058133464', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898079', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (602, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:35', '60', 'UTC', '76826440714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898940', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (603, '1', '147', 'Doctor Appointment', '2', '2020-08-31 15:09', '60', 'UTC', '71324680797', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598900963', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (604, '1', '147', 'Doctor Appointment', '2', '2020-08-31 17:51', '60', 'UTC', '72784087056', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598910684', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (605, '1', '147', 'Doctor Appointment', '2', '2020-08-31 18:03', '60', 'UTC', '71781120129', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598911430', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455');
INSERT INTO `meeting` VALUES (606, '1', '147', 'Doctor Appointment', '2', '2020-09-01 05:21', '60', 'UTC', '73426854489', '12345', NULL, NULL, NULL, NULL, NULL, '09/01/20', '1598952101', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '456');
INSERT INTO `meeting` VALUES (607, '1', '147', 'Doctor Appointment', '2', '2020-09-10 14:13', '60', 'UTC', '73576408457', '12345', NULL, NULL, NULL, NULL, NULL, '09/10/20', '1599761627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464');
INSERT INTO `meeting` VALUES (608, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '75454341566', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846437', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464');
INSERT INTO `meeting` VALUES (609, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '73157465436', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846468', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (610, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '78370052717', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846502', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (611, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '71877134261', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846505', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (612, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '75349390219', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846517', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (613, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '77947823088', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846518', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (614, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '75473785483', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846572', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');
INSERT INTO `meeting` VALUES (615, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '76165228124', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846593', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');

-- ----------------------------
-- Table structure for meeting_settings
-- ----------------------------
DROP TABLE IF EXISTS `meeting_settings`;
CREATE TABLE `meeting_settings`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `api_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `secret_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of meeting_settings
-- ----------------------------
INSERT INTO `meeting_settings` VALUES (8, 'PEbvh2uESS6ryue3Kb3D0w', 'BZpvXJsvgqG6mN4Up1FuuWJQAY47w5QCWIAo', '709', NULL);

-- ----------------------------
-- Table structure for nurse
-- ----------------------------
DROP TABLE IF EXISTS `nurse`;
CREATE TABLE `nurse`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `z` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of nurse
-- ----------------------------
INSERT INTO `nurse` VALUES (8, 'uploads/favicon4.png', 'Mrs Nurse', 'nurse@dms.com', 'Uttara, Dhaka', '+880123456789', '', '', '', '109');
INSERT INTO `nurse` VALUES (13, NULL, 'Indah Sari', 'perawat@umsu.ac.id', 'Medan', '085111', NULL, NULL, NULL, '1604');

-- ----------------------------
-- Table structure for ot_payment
-- ----------------------------
DROP TABLE IF EXISTS `ot_payment`;
CREATE TABLE `ot_payment`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_c_s` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_a_s_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_a_s_2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_anaes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `n_o_o` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_s_f` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `a_s_f_1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `a_s_f_2` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `anaes_f` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ot_charge` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cab_rent` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `seat_rent` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `others` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_fees` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hospital_fees` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gross_total` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `flat_discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount_received` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 86 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ot_payment
-- ----------------------------
INSERT INTO `ot_payment` VALUES (85, '451', 'None', '123', 'None', '125', 'dbdbd', '', '1000', '0', '1000', '', '', '', '', '', '1506195494', '2000', '2000', '0', '2000', '', '1000', 'unpaid', '614');

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sex` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `age` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bloodgroup` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `registration_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `how_added` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient
-- ----------------------------
INSERT INTO `patient` VALUES (4, NULL, 'Fajar Gultom', 'fajar@gmail.com', ',7,6,8', 'Medan', '0857', 'Male', '25-11-2004', NULL, 'O+', '1603', '879093', '04/12/23', '1681254670', NULL);
INSERT INTO `patient` VALUES (3, NULL, 'Dina Ritonga', 'dina@gmail.com', '7,9', 'Medan', '0812', 'Female', '08-03-2000', NULL, 'AB+', '1602', '738383', '04/12/23', '1681254490', NULL);
INSERT INTO `patient` VALUES (5, NULL, 'test', 'user@gmail.com', '6', 'Medan', '08233', 'Male', '2023-06-15', NULL, 'A+', '1608', '994510', '05/24/23', '1684917687', NULL);

-- ----------------------------
-- Table structure for patient_deposit
-- ----------------------------
DROP TABLE IF EXISTS `patient_deposit`;
CREATE TABLE `patient_deposit`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deposited_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount_received_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deposit_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gateway` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1744 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_deposit
-- ----------------------------
INSERT INTO `patient_deposit` VALUES (1741, '4', '8', '1687315426', '110000', '8.gp', 'Cash', NULL, '1');
INSERT INTO `patient_deposit` VALUES (1742, '4', '9', '1687406676', '', '9.gp', 'Cash', NULL, '1');
INSERT INTO `patient_deposit` VALUES (1743, '4', '9', '1687838404', '20000', NULL, 'Cash', NULL, '1');

-- ----------------------------
-- Table structure for patient_material
-- ----------------------------
DROP TABLE IF EXISTS `patient_material`;
CREATE TABLE `patient_material`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_string` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 96 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_material
-- ----------------------------
INSERT INTO `patient_material` VALUES (95, '1687142686', 'inivoice', NULL, '4', 'Fajar Gultom', 'Medan', '0857', 'uploads/invoice--001.pdf', '19-06-23');

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `x_ray` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `flat_vat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `spec_discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `flat_discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gross_total` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remarks` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hospital_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_amount` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount_received` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `deposit_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient_address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date_string` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES (8, NULL, '4', '6', '1687315426', '125000', '0', NULL, NULL, '15000', NULL, '15000', '110000', 'Janji Pasien', '46250', '63750', NULL, '129*50000*Biaya Obat Pusing*1,130*75000*Pemeriksaan Fisik*1', '110000', 'Cash', 'unpaid', '1', 'Fajar Gultom', '0857', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '21-06-23');
INSERT INTO `payment` VALUES (9, NULL, '4', '6', '1687406676', '50000', '0', NULL, NULL, '10000', '50', '10000', '20000', 'Pusing', '22500', '-2500', NULL, '129*50000*Biaya Obat Pusing*1', '', 'Cash', 'unpaid', '1', 'Fajar Gultom', '0857', 'Medan', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '22-06-23');

-- ----------------------------
-- Table structure for payment_category
-- ----------------------------
DROP TABLE IF EXISTS `payment_category`;
CREATE TABLE `payment_category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `d_commission` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_commission` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 131 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment_category
-- ----------------------------
INSERT INTO `payment_category` VALUES (129, 'Biaya Obat Pusing', 'Fisik', '50000', 'diagnostic', '25000', NULL);
INSERT INTO `payment_category` VALUES (130, 'Pemeriksaan Fisik', 'Ini adalah biaya obat', '75000', 'diagnostic', '50000', NULL);

-- ----------------------------
-- Table structure for paymentgateway
-- ----------------------------
DROP TABLE IF EXISTS `paymentgateway`;
CREATE TABLE `paymentgateway`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `merchant_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salt` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APIUsername` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APIPassword` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `APISignature` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `publish` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `secret` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `public_key` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `store_id` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `store_password` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `merchant_mid` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `merchant_website` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apiloginid` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `transactionkey` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apikey` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `merchantcode` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `privatekey` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `publishablekey` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paymentgateway
-- ----------------------------
INSERT INTO `paymentgateway` VALUES (1, 'PayPal', '', '', '', '', 'sahashaibal19-facilitator_api1.gmail.com', 'B63U4VHDE8E8K8E2', 'AGVBtjcchZdpMmwaGJXMakrp-RyZAuNqRwECP9LNRref5tv0ZwZkllTN', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (2, 'Pay U Money', 'HbimD3hk', 'BnuUHR1FDG', '', '', '', '', 'Aaw-Fd69z.JLuiq13ejMN-CsSMuuAPEXWUFPF5QW9sD22fp1hosGIFKo', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (3, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'Publish key', 'Secret Key', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (4, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'sk_test_c0b4a969e33564d0fdc6c781efb0300e68316897', 'pk_test_6511ce507f68769d3035234614ba03f3e7368f4e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (5, 'SSLCOMMERZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, 'vella5fe8cfbe4ed3a', 'vella5fe8cfbe4ed3a@ssl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (6, 'Paytm', 'Merchant Key', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'Merchant MID', 'Merchant Website', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (7, 'Authorize.Net', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2LJcUm497L2', '46u3b3AMd44sJX5w', NULL, NULL, NULL, NULL);
INSERT INTO `paymentgateway` VALUES (8, '2Checkout', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Merchant Code', 'Private key', 'Publishable Key');

-- ----------------------------
-- Table structure for pharmacist
-- ----------------------------
DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE `pharmacist`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacist
-- ----------------------------
INSERT INTO `pharmacist` VALUES (7, 'uploads/favicon6.png', 'Mr. Pharmacist', 'pharmacist@dms.com', 'Pottersbar, Hertfordshire, UK', '+880123456789', '', '', '110');
INSERT INTO `pharmacist` VALUES (9, NULL, 'Kiky Ayunita', 'apotik@umsu.ac.id', 'Medan', '08213270', NULL, NULL, '1607');

-- ----------------------------
-- Table structure for pharmacy_expense
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy_expense`;
CREATE TABLE `pharmacy_expense`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 143 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy_expense
-- ----------------------------

-- ----------------------------
-- Table structure for pharmacy_expense_category
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy_expense_category`;
CREATE TABLE `pharmacy_expense_category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `y` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 64 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy_expense_category
-- ----------------------------

-- ----------------------------
-- Table structure for pharmacy_payment
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy_payment`;
CREATE TABLE `pharmacy_payment`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `x_ray` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `flat_vat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gross_total` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hospital_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_amount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_amount` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `category_name` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `amount_received` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy_payment
-- ----------------------------
INSERT INTO `pharmacy_payment` VALUES (1, NULL, NULL, NULL, '1686976066', '7000', '0', NULL, NULL, '1000', '1000', '6000', NULL, NULL, NULL, '2882*7000*1*5000', NULL, 'unpaid');

-- ----------------------------
-- Table structure for pharmacy_payment_category
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy_payment_category`;
CREATE TABLE `pharmacy_payment_category`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `c_price` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `d_commission` int(100) NULL DEFAULT NULL,
  `h_commission` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy_payment_category
-- ----------------------------

-- ----------------------------
-- Table structure for prescription
-- ----------------------------
DROP TABLE IF EXISTS `prescription`;
CREATE TABLE `prescription`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `symptom` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `advice` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `state` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `medicine` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `validity` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `note` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patientname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctorname` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 102 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of prescription
-- ----------------------------
INSERT INTO `prescription` VALUES (101, '1686952800', '4', '6', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. ', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n', NULL, NULL, '2882***100 mg***1 + 1 = 0***2 days***Before Food###2889***100 mg***1 + 2 = 0***2 days***After Food', NULL, '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', 'Fajar Gultom', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)');

-- ----------------------------
-- Table structure for receptionist
-- ----------------------------
DROP TABLE IF EXISTS `receptionist`;
CREATE TABLE `receptionist`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ion_user_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of receptionist
-- ----------------------------
INSERT INTO `receptionist` VALUES (7, '', 'Mr Receptionist', 'receptionist@dms.com', 'Collegepara, Rajbari', '+880123456789', '', '614');
INSERT INTO `receptionist` VALUES (8, NULL, 'Melodi Medica', 'resepsionis@umsu.ac.id', 'Medan', '081976', NULL, '1605');

-- ----------------------------
-- Table structure for report
-- ----------------------------
DROP TABLE IF EXISTS `report`;
CREATE TABLE `report`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `report_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `patient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `add_date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of report
-- ----------------------------
INSERT INTO `report` VALUES (36, 'operation', 'Mr Patient*681', 'jhvvnbv', 'Mr Doctor', '07-12-2020', '12/13/20');
INSERT INTO `report` VALUES (37, 'birth', 'test*1608', 'Laporan Kelahiran', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '2023-06-09', '06/09/23');
INSERT INTO `report` VALUES (38, 'operation', 'Dina Ritonga*1602', 'Laporan baru', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', '2023-06-10', '06/09/23');
INSERT INTO `report` VALUES (39, 'expire', 'Fajar Gultom*1603', 'Laporan Kelahiran', 'dr.Huwainan Nisa Nasution, M.Kes, Sp. PD', '2023-06-14', '06/09/23');

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES (1, 'uploads/featured-icon-3.png', 'Cardiac Excellence', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');
INSERT INTO `service` VALUES (2, 'uploads/featured-icon-4.png', 'Cancer Treatment', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');
INSERT INTO `service` VALUES (3, 'uploads/featured-icon-1.png', 'Stroke Management', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');
INSERT INTO `service` VALUES (4, 'uploads/featured-icon-6.png', '24 / 7 Support', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');
INSERT INTO `service` VALUES (5, 'uploads/featured-icon-2.png', 'Care', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `system_vendor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `facebook_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `currency` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `language` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `live_appointment_type` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `vat` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `login_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `invoice_logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `payment_gateway` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sms_gateway` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codec_username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `codec_purchase_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `timezone` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `emailtype` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `appointment_subtitle` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_title` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_img_url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'SIM Spesialis Klinik', 'Klinik Spesialis UMSU', 'Jl. Gedung Arca Medan', '061000000', 'admin@demo.com', '#', 'Rp. ', 'indonesian', 'flat', 'jitsi', 'percentage', 'Login Title', 'uploads/Untitled-1.png', '', 'PayPal', 'Twilio', '', '', 'Asia/Bangkok', 'Domain Email', '', '', '', '');

-- ----------------------------
-- Table structure for site_gallery
-- ----------------------------
DROP TABLE IF EXISTS `site_gallery`;
CREATE TABLE `site_gallery`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of site_gallery
-- ----------------------------
INSERT INTO `site_gallery` VALUES (1, 'uploads/gallery-img-1.png', '1', 'Active');
INSERT INTO `site_gallery` VALUES (2, 'uploads/gallery-img-2.png', '2', 'Active');
INSERT INTO `site_gallery` VALUES (3, 'uploads/gallery-img-3.png', '3', 'Active');
INSERT INTO `site_gallery` VALUES (4, 'uploads/gallery-img-4.png', '4', 'Active');
INSERT INTO `site_gallery` VALUES (5, 'uploads/gallery-img-5.png', '5', 'Active');
INSERT INTO `site_gallery` VALUES (6, 'uploads/gallery-img-6.png', '6', 'Active');

-- ----------------------------
-- Table structure for site_grid
-- ----------------------------
DROP TABLE IF EXISTS `site_grid`;
CREATE TABLE `site_grid`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `title` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `img` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `position` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of site_grid
-- ----------------------------
INSERT INTO `site_grid` VALUES (3, 'FEATURED', 'Professional surgeons', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tenetur, aut veritatis maxime ducimus modi delectus vero expedita illo ratione, eveniet laboriosam cupiditate reiciendis, repellat minima. Optio consectetur inventore ipsa!', 'uploads/frature-img-1.png', '1', 'Active');
INSERT INTO `site_grid` VALUES (4, 'FEATURED', 'Good Care', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tenetur, aut veritatis maxime ducimus modi delectus vero expedita illo ratione, eveniet laboriosam cupiditate reiciendis, repellat minima. Optio consectetur inventore ipsa!', 'uploads/frature-img-2.png', '2', 'Active');

-- ----------------------------
-- Table structure for site_review
-- ----------------------------
DROP TABLE IF EXISTS `site_review`;
CREATE TABLE `site_review`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `designation` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `review` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of site_review
-- ----------------------------
INSERT INTO `site_review` VALUES (1, 'Test Reviewer 1', 'Reviewer, XYZ', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-581.jpg', 'Active');
INSERT INTO `site_review` VALUES (3, 'Test Reviewer 2', 'Reviewer, ABC', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-582.jpg', 'Active');
INSERT INTO `site_review` VALUES (4, 'Test Reviewer 3', 'Reviewer, NMP', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-583.jpg', 'Active');
INSERT INTO `site_review` VALUES (5, 'Test Reviewer 4', 'Reviewer, TRP', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-584.jpg', 'Active');
INSERT INTO `site_review` VALUES (6, 'Test Reviewer 5', 'Reviewer, CVB', '“ Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero expedita cumque assumenda cum neque, atque nesciunt, molestiae architecto doloremque quis, placeat ipsam quidem provident in! Illum voluptas harum animi consequatur! ”', 'uploads/doctor-icon-avatar-white136162-585.jpg', 'Inactive');
INSERT INTO `site_review` VALUES (7, 'test by rizky', 'Direktur PTAC', 'lorem ipsum dolor amet', '', 'Active');

-- ----------------------------
-- Table structure for slide
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_url` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `text1` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `text2` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `text3` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES (1, 'Slider 1', 'uploads/1503411077revised-bhatia-homebanner-03.jpg', 'Welcome To Hospital', 'Hospital Management System', 'Hospital', '2', 'Active');
INSERT INTO `slide` VALUES (2, 'Best Hospital management System', 'uploads/1707260345350542.jpg', 'Best Hospital management System', 'Best Hospital management System', 'Best Hospital management System', '1', 'Inactive');
INSERT INTO `slide` VALUES (5, 'dbfbfjsbjfjbbsjfb', 'uploads/inlinePreview2.jpg', 'jbfjsbjdf', 'jbfjbjfbjsb', 'jbfjbjsbfj', 'jbfjbjbsjf', 'Inactive');
INSERT INTO `slide` VALUES (6, 'Main BG', 'uploads/header-bg.png', 'The best doctors in Medicine!', 'in the world of modern medicine', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '1', 'Active');

-- ----------------------------
-- Table structure for sms
-- ----------------------------
DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `date` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` varchar(1600) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `recipient` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 99 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sms
-- ----------------------------

-- ----------------------------
-- Table structure for sms_settings
-- ----------------------------
DROP TABLE IF EXISTS `sms_settings`;
CREATE TABLE `sms_settings`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `api_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sender` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `authkey` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sid` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `token` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sendernumber` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `link` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sms_settings
-- ----------------------------
INSERT INTO `sms_settings` VALUES (1, 'Clickatell', '', 'dmJiY3ZiY3Y=', '', NULL, NULL, '1', NULL, NULL, NULL, 'https://www.clickatell.com/');
INSERT INTO `sms_settings` VALUES (2, 'MSG91', '', '', NULL, 'Sender', 'Auth Key', '1', NULL, NULL, NULL, 'https://msg91.com/');
INSERT INTO `sms_settings` VALUES (5, 'Twilio', '', '', NULL, NULL, NULL, '1', 'AC20f426a9bbc9e05e689f5ad59e538270', '37a0cddb5c1f2d50882fa7149a99d119', '+13302949572', 'https://www.twilio.com/');
INSERT INTO `sms_settings` VALUES (6, 'Bulk Sms', 'VXNlcm5hbWU=', 'UGFzc3dvcmQ=', NULL, NULL, NULL, '1', NULL, NULL, NULL, 'https://www.bulksms.com/');
INSERT INTO `sms_settings` VALUES (8, 'Bd Bulk Sms', '', '', NULL, NULL, NULL, '1', NULL, 'Bd Bulk Sms Token Password', NULL, 'https://bdbulksms.net/');

-- ----------------------------
-- Table structure for template
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `template` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template
-- ----------------------------

-- ----------------------------
-- Table structure for time_schedule
-- ----------------------------
DROP TABLE IF EXISTS `time_schedule`;
CREATE TABLE `time_schedule`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `weekday` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `e_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `duration` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 150 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of time_schedule
-- ----------------------------
INSERT INTO `time_schedule` VALUES (119, '18', 'Tuesday', '03:00 PM', '05:00 PM', '180', '6');
INSERT INTO `time_schedule` VALUES (120, '18', 'Thursday', '03:00 PM', '05:00 PM', '180', '4');
INSERT INTO `time_schedule` VALUES (121, '7', 'Monday', '09:00 AM', '12:00 PM', '108', '3');
INSERT INTO `time_schedule` VALUES (122, '7', 'Tuesday', '09:00 AM', '12:00 PM', '108', '3');
INSERT INTO `time_schedule` VALUES (123, '7', 'Wednesday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (124, '7', 'Thursday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (125, '7', 'Friday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (126, '8', 'Tuesday', '01:00 PM', '04:00 PM', '156', '3');
INSERT INTO `time_schedule` VALUES (127, '8', 'Thursday', '01:00 PM', '04:00 PM', '156', '3');
INSERT INTO `time_schedule` VALUES (128, '9', 'Tuesday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (129, '9', 'Friday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (130, '10', 'Monday', '09:00 AM', '12:00 PM', '108', '3');
INSERT INTO `time_schedule` VALUES (131, '10', 'Wednesday', '09:00 AM', '12:00 PM', '108', '3');
INSERT INTO `time_schedule` VALUES (132, '10', 'Friday', '09:00 AM', '12:00 PM', '108', '3');
INSERT INTO `time_schedule` VALUES (133, '11', 'Monday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (134, '11', 'Wednesday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (135, '11', 'Thursday', '03:00 PM', '05:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (136, '12', 'Monday', '04:00 PM', '07:00 PM', '192', '3');
INSERT INTO `time_schedule` VALUES (137, '12', 'Tuesday', '04:00 PM', '07:00 PM', '192', '3');
INSERT INTO `time_schedule` VALUES (138, '13', 'Wednesday', '04:00 PM', '06:00 PM', '192', '3');
INSERT INTO `time_schedule` VALUES (139, '13', 'Thursday', '04:00 PM', '06:00 PM', '192', '3');
INSERT INTO `time_schedule` VALUES (140, '14', 'Monday', '05:00 PM', '07:00 PM', '204', '3');
INSERT INTO `time_schedule` VALUES (141, '14', 'Friday', '05:00 PM', '07:00 PM', '204', '3');
INSERT INTO `time_schedule` VALUES (144, '15', 'Monday', '12:30 AM', '03:30 PM', '6', '3');
INSERT INTO `time_schedule` VALUES (143, '15', 'Wednesday', '12:30 AM', '03:30 PM', '6', '3');
INSERT INTO `time_schedule` VALUES (145, '16', 'Monday', '03:00 PM', '04:00 PM', '180', '3');
INSERT INTO `time_schedule` VALUES (146, '16', 'Wednesday', '04:00 PM', '06:00 PM', '192', '3');
INSERT INTO `time_schedule` VALUES (147, '17', 'Tuesday', '10:00 AM', '01:00 PM', '120', '3');
INSERT INTO `time_schedule` VALUES (148, '17', 'Thursday', '10:00 AM', '01:00 PM', '120', '3');
INSERT INTO `time_schedule` VALUES (149, '17', 'Friday', '10:00 AM', '01:00 PM', '120', '3');

-- ----------------------------
-- Table structure for time_slot
-- ----------------------------
DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE `time_slot`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `e_time` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `weekday` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `s_time_key` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2933 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of time_slot
-- ----------------------------
INSERT INTO `time_slot` VALUES (2196, NULL, '01:30 PM', '01:45 PM', 'Tuesday', '162');
INSERT INTO `time_slot` VALUES (2197, NULL, '01:45 PM', '02:00 PM', 'Tuesday', '165');
INSERT INTO `time_slot` VALUES (2198, NULL, '02:00 PM', '02:15 PM', 'Tuesday', '168');
INSERT INTO `time_slot` VALUES (2199, NULL, '02:15 PM', '02:30 PM', 'Tuesday', '171');
INSERT INTO `time_slot` VALUES (2200, NULL, '02:30 PM', '02:45 PM', 'Tuesday', '174');
INSERT INTO `time_slot` VALUES (2201, NULL, '02:45 PM', '03:00 PM', 'Tuesday', '177');
INSERT INTO `time_slot` VALUES (2202, NULL, '03:00 PM', '03:15 PM', 'Tuesday', '180');
INSERT INTO `time_slot` VALUES (2203, NULL, '03:15 PM', '03:30 PM', 'Tuesday', '183');
INSERT INTO `time_slot` VALUES (2204, NULL, '03:30 PM', '03:45 PM', 'Tuesday', '186');
INSERT INTO `time_slot` VALUES (2205, NULL, '03:45 PM', '04:00 PM', 'Tuesday', '189');
INSERT INTO `time_slot` VALUES (2206, NULL, '04:00 PM', '04:15 PM', 'Tuesday', '192');
INSERT INTO `time_slot` VALUES (2207, NULL, '04:15 PM', '04:30 PM', 'Tuesday', '195');
INSERT INTO `time_slot` VALUES (2208, NULL, '04:30 PM', '04:45 PM', 'Tuesday', '198');
INSERT INTO `time_slot` VALUES (2209, NULL, '04:45 PM', '05:00 PM', 'Tuesday', '201');
INSERT INTO `time_slot` VALUES (2210, NULL, '05:00 PM', '05:15 PM', 'Tuesday', '204');
INSERT INTO `time_slot` VALUES (2211, NULL, '05:15 PM', '05:30 PM', 'Tuesday', '207');
INSERT INTO `time_slot` VALUES (2212, NULL, '05:30 PM', '05:45 PM', 'Tuesday', '210');
INSERT INTO `time_slot` VALUES (2213, NULL, '05:45 PM', '06:00 PM', 'Tuesday', '213');
INSERT INTO `time_slot` VALUES (2214, NULL, '06:00 PM', '06:15 PM', 'Tuesday', '216');
INSERT INTO `time_slot` VALUES (2215, NULL, '06:15 PM', '06:30 PM', 'Tuesday', '219');
INSERT INTO `time_slot` VALUES (2216, NULL, '06:30 PM', '06:45 PM', 'Tuesday', '222');
INSERT INTO `time_slot` VALUES (2217, NULL, '06:45 PM', '07:00 PM', 'Tuesday', '225');
INSERT INTO `time_slot` VALUES (2218, NULL, '07:00 PM', '07:15 PM', 'Tuesday', '228');
INSERT INTO `time_slot` VALUES (2219, NULL, '07:15 PM', '07:30 PM', 'Tuesday', '231');
INSERT INTO `time_slot` VALUES (2220, NULL, '07:30 PM', '07:45 PM', 'Tuesday', '234');
INSERT INTO `time_slot` VALUES (2221, NULL, '07:45 PM', '08:00 PM', 'Tuesday', '237');
INSERT INTO `time_slot` VALUES (2222, NULL, '08:00 PM', '08:15 PM', 'Tuesday', '240');
INSERT INTO `time_slot` VALUES (2223, NULL, '08:15 PM', '08:30 PM', 'Tuesday', '243');
INSERT INTO `time_slot` VALUES (2224, NULL, '08:30 PM', '08:45 PM', 'Tuesday', '246');
INSERT INTO `time_slot` VALUES (2225, NULL, '08:45 PM', '09:00 PM', 'Tuesday', '249');
INSERT INTO `time_slot` VALUES (2226, NULL, '09:00 PM', '09:15 PM', 'Tuesday', '252');
INSERT INTO `time_slot` VALUES (2227, NULL, '09:15 PM', '09:30 PM', 'Tuesday', '255');
INSERT INTO `time_slot` VALUES (2228, NULL, '09:30 PM', '09:45 PM', 'Tuesday', '258');
INSERT INTO `time_slot` VALUES (2229, NULL, '09:45 PM', '10:00 PM', 'Tuesday', '261');
INSERT INTO `time_slot` VALUES (2230, NULL, '10:00 PM', '10:15 PM', 'Tuesday', '264');
INSERT INTO `time_slot` VALUES (2231, NULL, '10:15 PM', '10:30 PM', 'Tuesday', '267');
INSERT INTO `time_slot` VALUES (2232, NULL, '10:30 PM', '10:45 PM', 'Tuesday', '270');
INSERT INTO `time_slot` VALUES (2233, NULL, '10:45 PM', '11:00 PM', 'Tuesday', '273');
INSERT INTO `time_slot` VALUES (2234, NULL, '11:00 PM', '11:15 PM', 'Tuesday', '276');
INSERT INTO `time_slot` VALUES (2235, NULL, '11:15 PM', '11:30 PM', 'Tuesday', '279');
INSERT INTO `time_slot` VALUES (2483, '18', '03:00 PM', '03:30 PM', 'Tuesday', '180');
INSERT INTO `time_slot` VALUES (2484, '18', '03:30 PM', '04:00 PM', 'Tuesday', '186');
INSERT INTO `time_slot` VALUES (2485, '18', '04:00 PM', '04:30 PM', 'Tuesday', '192');
INSERT INTO `time_slot` VALUES (2486, '18', '04:30 PM', '05:00 PM', 'Tuesday', '198');
INSERT INTO `time_slot` VALUES (2487, '18', '03:00 PM', '03:20 PM', 'Thursday', '180');
INSERT INTO `time_slot` VALUES (2488, '18', '03:20 PM', '03:40 PM', 'Thursday', '184');
INSERT INTO `time_slot` VALUES (2489, '18', '03:40 PM', '04:00 PM', 'Thursday', '188');
INSERT INTO `time_slot` VALUES (2490, '18', '04:00 PM', '04:20 PM', 'Thursday', '192');
INSERT INTO `time_slot` VALUES (2491, '18', '04:20 PM', '04:40 PM', 'Thursday', '196');
INSERT INTO `time_slot` VALUES (2492, '18', '04:40 PM', '05:00 PM', 'Thursday', '200');
INSERT INTO `time_slot` VALUES (2493, '7', '09:00 AM', '09:15 AM', 'Monday', '108');
INSERT INTO `time_slot` VALUES (2494, '7', '09:15 AM', '09:30 AM', 'Monday', '111');
INSERT INTO `time_slot` VALUES (2495, '7', '09:30 AM', '09:45 AM', 'Monday', '114');
INSERT INTO `time_slot` VALUES (2496, '7', '09:45 AM', '10:00 AM', 'Monday', '117');
INSERT INTO `time_slot` VALUES (2497, '7', '10:00 AM', '10:15 AM', 'Monday', '120');
INSERT INTO `time_slot` VALUES (2498, '7', '10:15 AM', '10:30 AM', 'Monday', '123');
INSERT INTO `time_slot` VALUES (2499, '7', '10:30 AM', '10:45 AM', 'Monday', '126');
INSERT INTO `time_slot` VALUES (2500, '7', '10:45 AM', '11:00 AM', 'Monday', '129');
INSERT INTO `time_slot` VALUES (2501, '7', '11:00 AM', '11:15 AM', 'Monday', '132');
INSERT INTO `time_slot` VALUES (2502, '7', '11:15 AM', '11:30 AM', 'Monday', '135');
INSERT INTO `time_slot` VALUES (2503, '7', '11:30 AM', '11:45 AM', 'Monday', '138');
INSERT INTO `time_slot` VALUES (2504, '7', '11:45 AM', '12:00 PM', 'Monday', '141');
INSERT INTO `time_slot` VALUES (2505, '7', '09:00 AM', '09:15 AM', 'Tuesday', '108');
INSERT INTO `time_slot` VALUES (2506, '7', '09:15 AM', '09:30 AM', 'Tuesday', '111');
INSERT INTO `time_slot` VALUES (2507, '7', '09:30 AM', '09:45 AM', 'Tuesday', '114');
INSERT INTO `time_slot` VALUES (2508, '7', '09:45 AM', '10:00 AM', 'Tuesday', '117');
INSERT INTO `time_slot` VALUES (2509, '7', '10:00 AM', '10:15 AM', 'Tuesday', '120');
INSERT INTO `time_slot` VALUES (2510, '7', '10:15 AM', '10:30 AM', 'Tuesday', '123');
INSERT INTO `time_slot` VALUES (2511, '7', '10:30 AM', '10:45 AM', 'Tuesday', '126');
INSERT INTO `time_slot` VALUES (2512, '7', '10:45 AM', '11:00 AM', 'Tuesday', '129');
INSERT INTO `time_slot` VALUES (2513, '7', '11:00 AM', '11:15 AM', 'Tuesday', '132');
INSERT INTO `time_slot` VALUES (2514, '7', '11:15 AM', '11:30 AM', 'Tuesday', '135');
INSERT INTO `time_slot` VALUES (2515, '7', '11:30 AM', '11:45 AM', 'Tuesday', '138');
INSERT INTO `time_slot` VALUES (2516, '7', '11:45 AM', '12:00 PM', 'Tuesday', '141');
INSERT INTO `time_slot` VALUES (2517, '7', '03:00 PM', '03:15 PM', 'Wednesday', '180');
INSERT INTO `time_slot` VALUES (2518, '7', '03:15 PM', '03:30 PM', 'Wednesday', '183');
INSERT INTO `time_slot` VALUES (2519, '7', '03:30 PM', '03:45 PM', 'Wednesday', '186');
INSERT INTO `time_slot` VALUES (2520, '7', '03:45 PM', '04:00 PM', 'Wednesday', '189');
INSERT INTO `time_slot` VALUES (2521, '7', '04:00 PM', '04:15 PM', 'Wednesday', '192');
INSERT INTO `time_slot` VALUES (2522, '7', '04:15 PM', '04:30 PM', 'Wednesday', '195');
INSERT INTO `time_slot` VALUES (2523, '7', '04:30 PM', '04:45 PM', 'Wednesday', '198');
INSERT INTO `time_slot` VALUES (2524, '7', '04:45 PM', '05:00 PM', 'Wednesday', '201');
INSERT INTO `time_slot` VALUES (2525, '7', '03:00 PM', '03:15 PM', 'Thursday', '180');
INSERT INTO `time_slot` VALUES (2526, '7', '03:15 PM', '03:30 PM', 'Thursday', '183');
INSERT INTO `time_slot` VALUES (2527, '7', '03:30 PM', '03:45 PM', 'Thursday', '186');
INSERT INTO `time_slot` VALUES (2528, '7', '03:45 PM', '04:00 PM', 'Thursday', '189');
INSERT INTO `time_slot` VALUES (2529, '7', '04:00 PM', '04:15 PM', 'Thursday', '192');
INSERT INTO `time_slot` VALUES (2530, '7', '04:15 PM', '04:30 PM', 'Thursday', '195');
INSERT INTO `time_slot` VALUES (2531, '7', '04:30 PM', '04:45 PM', 'Thursday', '198');
INSERT INTO `time_slot` VALUES (2532, '7', '04:45 PM', '05:00 PM', 'Thursday', '201');
INSERT INTO `time_slot` VALUES (2533, '7', '03:00 PM', '03:15 PM', 'Friday', '180');
INSERT INTO `time_slot` VALUES (2534, '7', '03:15 PM', '03:30 PM', 'Friday', '183');
INSERT INTO `time_slot` VALUES (2535, '7', '03:30 PM', '03:45 PM', 'Friday', '186');
INSERT INTO `time_slot` VALUES (2536, '7', '03:45 PM', '04:00 PM', 'Friday', '189');
INSERT INTO `time_slot` VALUES (2537, '7', '04:00 PM', '04:15 PM', 'Friday', '192');
INSERT INTO `time_slot` VALUES (2538, '7', '04:15 PM', '04:30 PM', 'Friday', '195');
INSERT INTO `time_slot` VALUES (2539, '7', '04:30 PM', '04:45 PM', 'Friday', '198');
INSERT INTO `time_slot` VALUES (2540, '7', '04:45 PM', '05:00 PM', 'Friday', '201');
INSERT INTO `time_slot` VALUES (2541, '8', '01:00 PM', '01:15 PM', 'Tuesday', '156');
INSERT INTO `time_slot` VALUES (2542, '8', '01:15 PM', '01:30 PM', 'Tuesday', '159');
INSERT INTO `time_slot` VALUES (2543, '8', '01:30 PM', '01:45 PM', 'Tuesday', '162');
INSERT INTO `time_slot` VALUES (2544, '8', '01:45 PM', '02:00 PM', 'Tuesday', '165');
INSERT INTO `time_slot` VALUES (2545, '8', '02:00 PM', '02:15 PM', 'Tuesday', '168');
INSERT INTO `time_slot` VALUES (2546, '8', '02:15 PM', '02:30 PM', 'Tuesday', '171');
INSERT INTO `time_slot` VALUES (2547, '8', '02:30 PM', '02:45 PM', 'Tuesday', '174');
INSERT INTO `time_slot` VALUES (2548, '8', '02:45 PM', '03:00 PM', 'Tuesday', '177');
INSERT INTO `time_slot` VALUES (2549, '8', '03:00 PM', '03:15 PM', 'Tuesday', '180');
INSERT INTO `time_slot` VALUES (2550, '8', '03:15 PM', '03:30 PM', 'Tuesday', '183');
INSERT INTO `time_slot` VALUES (2551, '8', '03:30 PM', '03:45 PM', 'Tuesday', '186');
INSERT INTO `time_slot` VALUES (2552, '8', '03:45 PM', '04:00 PM', 'Tuesday', '189');
INSERT INTO `time_slot` VALUES (2553, '8', '01:00 PM', '01:15 PM', 'Thursday', '156');
INSERT INTO `time_slot` VALUES (2554, '8', '01:15 PM', '01:30 PM', 'Thursday', '159');
INSERT INTO `time_slot` VALUES (2555, '8', '01:30 PM', '01:45 PM', 'Thursday', '162');
INSERT INTO `time_slot` VALUES (2556, '8', '01:45 PM', '02:00 PM', 'Thursday', '165');
INSERT INTO `time_slot` VALUES (2557, '8', '02:00 PM', '02:15 PM', 'Thursday', '168');
INSERT INTO `time_slot` VALUES (2558, '8', '02:15 PM', '02:30 PM', 'Thursday', '171');
INSERT INTO `time_slot` VALUES (2559, '8', '02:30 PM', '02:45 PM', 'Thursday', '174');
INSERT INTO `time_slot` VALUES (2560, '8', '02:45 PM', '03:00 PM', 'Thursday', '177');
INSERT INTO `time_slot` VALUES (2561, '8', '03:00 PM', '03:15 PM', 'Thursday', '180');
INSERT INTO `time_slot` VALUES (2562, '8', '03:15 PM', '03:30 PM', 'Thursday', '183');
INSERT INTO `time_slot` VALUES (2563, '8', '03:30 PM', '03:45 PM', 'Thursday', '186');
INSERT INTO `time_slot` VALUES (2564, '8', '03:45 PM', '04:00 PM', 'Thursday', '189');
INSERT INTO `time_slot` VALUES (2565, '9', '03:00 PM', '03:15 PM', 'Tuesday', '180');
INSERT INTO `time_slot` VALUES (2566, '9', '03:15 PM', '03:30 PM', 'Tuesday', '183');
INSERT INTO `time_slot` VALUES (2567, '9', '03:30 PM', '03:45 PM', 'Tuesday', '186');
INSERT INTO `time_slot` VALUES (2568, '9', '03:45 PM', '04:00 PM', 'Tuesday', '189');
INSERT INTO `time_slot` VALUES (2569, '9', '04:00 PM', '04:15 PM', 'Tuesday', '192');
INSERT INTO `time_slot` VALUES (2570, '9', '04:15 PM', '04:30 PM', 'Tuesday', '195');
INSERT INTO `time_slot` VALUES (2571, '9', '04:30 PM', '04:45 PM', 'Tuesday', '198');
INSERT INTO `time_slot` VALUES (2572, '9', '04:45 PM', '05:00 PM', 'Tuesday', '201');
INSERT INTO `time_slot` VALUES (2573, '9', '03:00 PM', '03:15 PM', 'Friday', '180');
INSERT INTO `time_slot` VALUES (2574, '9', '03:15 PM', '03:30 PM', 'Friday', '183');
INSERT INTO `time_slot` VALUES (2575, '9', '03:30 PM', '03:45 PM', 'Friday', '186');
INSERT INTO `time_slot` VALUES (2576, '9', '03:45 PM', '04:00 PM', 'Friday', '189');
INSERT INTO `time_slot` VALUES (2577, '9', '04:00 PM', '04:15 PM', 'Friday', '192');
INSERT INTO `time_slot` VALUES (2578, '9', '04:15 PM', '04:30 PM', 'Friday', '195');
INSERT INTO `time_slot` VALUES (2579, '9', '04:30 PM', '04:45 PM', 'Friday', '198');
INSERT INTO `time_slot` VALUES (2580, '9', '04:45 PM', '05:00 PM', 'Friday', '201');
INSERT INTO `time_slot` VALUES (2581, '10', '09:00 AM', '09:15 AM', 'Monday', '108');
INSERT INTO `time_slot` VALUES (2582, '10', '09:15 AM', '09:30 AM', 'Monday', '111');
INSERT INTO `time_slot` VALUES (2583, '10', '09:30 AM', '09:45 AM', 'Monday', '114');
INSERT INTO `time_slot` VALUES (2584, '10', '09:45 AM', '10:00 AM', 'Monday', '117');
INSERT INTO `time_slot` VALUES (2585, '10', '10:00 AM', '10:15 AM', 'Monday', '120');
INSERT INTO `time_slot` VALUES (2586, '10', '10:15 AM', '10:30 AM', 'Monday', '123');
INSERT INTO `time_slot` VALUES (2587, '10', '10:30 AM', '10:45 AM', 'Monday', '126');
INSERT INTO `time_slot` VALUES (2588, '10', '10:45 AM', '11:00 AM', 'Monday', '129');
INSERT INTO `time_slot` VALUES (2589, '10', '11:00 AM', '11:15 AM', 'Monday', '132');
INSERT INTO `time_slot` VALUES (2590, '10', '11:15 AM', '11:30 AM', 'Monday', '135');
INSERT INTO `time_slot` VALUES (2591, '10', '11:30 AM', '11:45 AM', 'Monday', '138');
INSERT INTO `time_slot` VALUES (2592, '10', '11:45 AM', '12:00 PM', 'Monday', '141');
INSERT INTO `time_slot` VALUES (2593, '10', '09:00 AM', '09:15 AM', 'Wednesday', '108');
INSERT INTO `time_slot` VALUES (2594, '10', '09:15 AM', '09:30 AM', 'Wednesday', '111');
INSERT INTO `time_slot` VALUES (2595, '10', '09:30 AM', '09:45 AM', 'Wednesday', '114');
INSERT INTO `time_slot` VALUES (2596, '10', '09:45 AM', '10:00 AM', 'Wednesday', '117');
INSERT INTO `time_slot` VALUES (2597, '10', '10:00 AM', '10:15 AM', 'Wednesday', '120');
INSERT INTO `time_slot` VALUES (2598, '10', '10:15 AM', '10:30 AM', 'Wednesday', '123');
INSERT INTO `time_slot` VALUES (2599, '10', '10:30 AM', '10:45 AM', 'Wednesday', '126');
INSERT INTO `time_slot` VALUES (2600, '10', '10:45 AM', '11:00 AM', 'Wednesday', '129');
INSERT INTO `time_slot` VALUES (2601, '10', '11:00 AM', '11:15 AM', 'Wednesday', '132');
INSERT INTO `time_slot` VALUES (2602, '10', '11:15 AM', '11:30 AM', 'Wednesday', '135');
INSERT INTO `time_slot` VALUES (2603, '10', '11:30 AM', '11:45 AM', 'Wednesday', '138');
INSERT INTO `time_slot` VALUES (2604, '10', '11:45 AM', '12:00 PM', 'Wednesday', '141');
INSERT INTO `time_slot` VALUES (2605, '10', '09:00 AM', '09:15 AM', 'Friday', '108');
INSERT INTO `time_slot` VALUES (2606, '10', '09:15 AM', '09:30 AM', 'Friday', '111');
INSERT INTO `time_slot` VALUES (2607, '10', '09:30 AM', '09:45 AM', 'Friday', '114');
INSERT INTO `time_slot` VALUES (2608, '10', '09:45 AM', '10:00 AM', 'Friday', '117');
INSERT INTO `time_slot` VALUES (2609, '10', '10:00 AM', '10:15 AM', 'Friday', '120');
INSERT INTO `time_slot` VALUES (2610, '10', '10:15 AM', '10:30 AM', 'Friday', '123');
INSERT INTO `time_slot` VALUES (2611, '10', '10:30 AM', '10:45 AM', 'Friday', '126');
INSERT INTO `time_slot` VALUES (2612, '10', '10:45 AM', '11:00 AM', 'Friday', '129');
INSERT INTO `time_slot` VALUES (2613, '10', '11:00 AM', '11:15 AM', 'Friday', '132');
INSERT INTO `time_slot` VALUES (2614, '10', '11:15 AM', '11:30 AM', 'Friday', '135');
INSERT INTO `time_slot` VALUES (2615, '10', '11:30 AM', '11:45 AM', 'Friday', '138');
INSERT INTO `time_slot` VALUES (2616, '10', '11:45 AM', '12:00 PM', 'Friday', '141');
INSERT INTO `time_slot` VALUES (2617, '11', '03:00 PM', '03:15 PM', 'Monday', '180');
INSERT INTO `time_slot` VALUES (2618, '11', '03:15 PM', '03:30 PM', 'Monday', '183');
INSERT INTO `time_slot` VALUES (2619, '11', '03:30 PM', '03:45 PM', 'Monday', '186');
INSERT INTO `time_slot` VALUES (2620, '11', '03:45 PM', '04:00 PM', 'Monday', '189');
INSERT INTO `time_slot` VALUES (2621, '11', '04:00 PM', '04:15 PM', 'Monday', '192');
INSERT INTO `time_slot` VALUES (2622, '11', '04:15 PM', '04:30 PM', 'Monday', '195');
INSERT INTO `time_slot` VALUES (2623, '11', '04:30 PM', '04:45 PM', 'Monday', '198');
INSERT INTO `time_slot` VALUES (2624, '11', '04:45 PM', '05:00 PM', 'Monday', '201');
INSERT INTO `time_slot` VALUES (2625, '11', '03:00 PM', '03:15 PM', 'Wednesday', '180');
INSERT INTO `time_slot` VALUES (2626, '11', '03:15 PM', '03:30 PM', 'Wednesday', '183');
INSERT INTO `time_slot` VALUES (2627, '11', '03:30 PM', '03:45 PM', 'Wednesday', '186');
INSERT INTO `time_slot` VALUES (2628, '11', '03:45 PM', '04:00 PM', 'Wednesday', '189');
INSERT INTO `time_slot` VALUES (2629, '11', '04:00 PM', '04:15 PM', 'Wednesday', '192');
INSERT INTO `time_slot` VALUES (2630, '11', '04:15 PM', '04:30 PM', 'Wednesday', '195');
INSERT INTO `time_slot` VALUES (2631, '11', '04:30 PM', '04:45 PM', 'Wednesday', '198');
INSERT INTO `time_slot` VALUES (2632, '11', '04:45 PM', '05:00 PM', 'Wednesday', '201');
INSERT INTO `time_slot` VALUES (2633, '11', '03:00 PM', '03:15 PM', 'Thursday', '180');
INSERT INTO `time_slot` VALUES (2634, '11', '03:15 PM', '03:30 PM', 'Thursday', '183');
INSERT INTO `time_slot` VALUES (2635, '11', '03:30 PM', '03:45 PM', 'Thursday', '186');
INSERT INTO `time_slot` VALUES (2636, '11', '03:45 PM', '04:00 PM', 'Thursday', '189');
INSERT INTO `time_slot` VALUES (2637, '11', '04:00 PM', '04:15 PM', 'Thursday', '192');
INSERT INTO `time_slot` VALUES (2638, '11', '04:15 PM', '04:30 PM', 'Thursday', '195');
INSERT INTO `time_slot` VALUES (2639, '11', '04:30 PM', '04:45 PM', 'Thursday', '198');
INSERT INTO `time_slot` VALUES (2640, '11', '04:45 PM', '05:00 PM', 'Thursday', '201');
INSERT INTO `time_slot` VALUES (2641, '12', '04:00 PM', '04:15 PM', 'Monday', '192');
INSERT INTO `time_slot` VALUES (2642, '12', '04:15 PM', '04:30 PM', 'Monday', '195');
INSERT INTO `time_slot` VALUES (2643, '12', '04:30 PM', '04:45 PM', 'Monday', '198');
INSERT INTO `time_slot` VALUES (2644, '12', '04:45 PM', '05:00 PM', 'Monday', '201');
INSERT INTO `time_slot` VALUES (2645, '12', '05:00 PM', '05:15 PM', 'Monday', '204');
INSERT INTO `time_slot` VALUES (2646, '12', '05:15 PM', '05:30 PM', 'Monday', '207');
INSERT INTO `time_slot` VALUES (2647, '12', '05:30 PM', '05:45 PM', 'Monday', '210');
INSERT INTO `time_slot` VALUES (2648, '12', '05:45 PM', '06:00 PM', 'Monday', '213');
INSERT INTO `time_slot` VALUES (2649, '12', '06:00 PM', '06:15 PM', 'Monday', '216');
INSERT INTO `time_slot` VALUES (2650, '12', '06:15 PM', '06:30 PM', 'Monday', '219');
INSERT INTO `time_slot` VALUES (2651, '12', '06:30 PM', '06:45 PM', 'Monday', '222');
INSERT INTO `time_slot` VALUES (2652, '12', '06:45 PM', '07:00 PM', 'Monday', '225');
INSERT INTO `time_slot` VALUES (2653, '12', '04:00 PM', '04:15 PM', 'Tuesday', '192');
INSERT INTO `time_slot` VALUES (2654, '12', '04:15 PM', '04:30 PM', 'Tuesday', '195');
INSERT INTO `time_slot` VALUES (2655, '12', '04:30 PM', '04:45 PM', 'Tuesday', '198');
INSERT INTO `time_slot` VALUES (2656, '12', '04:45 PM', '05:00 PM', 'Tuesday', '201');
INSERT INTO `time_slot` VALUES (2657, '12', '05:00 PM', '05:15 PM', 'Tuesday', '204');
INSERT INTO `time_slot` VALUES (2658, '12', '05:15 PM', '05:30 PM', 'Tuesday', '207');
INSERT INTO `time_slot` VALUES (2659, '12', '05:30 PM', '05:45 PM', 'Tuesday', '210');
INSERT INTO `time_slot` VALUES (2660, '12', '05:45 PM', '06:00 PM', 'Tuesday', '213');
INSERT INTO `time_slot` VALUES (2661, '12', '06:00 PM', '06:15 PM', 'Tuesday', '216');
INSERT INTO `time_slot` VALUES (2662, '12', '06:15 PM', '06:30 PM', 'Tuesday', '219');
INSERT INTO `time_slot` VALUES (2663, '12', '06:30 PM', '06:45 PM', 'Tuesday', '222');
INSERT INTO `time_slot` VALUES (2664, '12', '06:45 PM', '07:00 PM', 'Tuesday', '225');
INSERT INTO `time_slot` VALUES (2665, '13', '04:00 PM', '04:15 PM', 'Wednesday', '192');
INSERT INTO `time_slot` VALUES (2666, '13', '04:15 PM', '04:30 PM', 'Wednesday', '195');
INSERT INTO `time_slot` VALUES (2667, '13', '04:30 PM', '04:45 PM', 'Wednesday', '198');
INSERT INTO `time_slot` VALUES (2668, '13', '04:45 PM', '05:00 PM', 'Wednesday', '201');
INSERT INTO `time_slot` VALUES (2669, '13', '05:00 PM', '05:15 PM', 'Wednesday', '204');
INSERT INTO `time_slot` VALUES (2670, '13', '05:15 PM', '05:30 PM', 'Wednesday', '207');
INSERT INTO `time_slot` VALUES (2671, '13', '05:30 PM', '05:45 PM', 'Wednesday', '210');
INSERT INTO `time_slot` VALUES (2672, '13', '05:45 PM', '06:00 PM', 'Wednesday', '213');
INSERT INTO `time_slot` VALUES (2673, '13', '04:00 PM', '04:15 PM', 'Thursday', '192');
INSERT INTO `time_slot` VALUES (2674, '13', '04:15 PM', '04:30 PM', 'Thursday', '195');
INSERT INTO `time_slot` VALUES (2675, '13', '04:30 PM', '04:45 PM', 'Thursday', '198');
INSERT INTO `time_slot` VALUES (2676, '13', '04:45 PM', '05:00 PM', 'Thursday', '201');
INSERT INTO `time_slot` VALUES (2677, '13', '05:00 PM', '05:15 PM', 'Thursday', '204');
INSERT INTO `time_slot` VALUES (2678, '13', '05:15 PM', '05:30 PM', 'Thursday', '207');
INSERT INTO `time_slot` VALUES (2679, '13', '05:30 PM', '05:45 PM', 'Thursday', '210');
INSERT INTO `time_slot` VALUES (2680, '13', '05:45 PM', '06:00 PM', 'Thursday', '213');
INSERT INTO `time_slot` VALUES (2681, '14', '05:00 PM', '05:15 PM', 'Monday', '204');
INSERT INTO `time_slot` VALUES (2682, '14', '05:15 PM', '05:30 PM', 'Monday', '207');
INSERT INTO `time_slot` VALUES (2683, '14', '05:30 PM', '05:45 PM', 'Monday', '210');
INSERT INTO `time_slot` VALUES (2684, '14', '05:45 PM', '06:00 PM', 'Monday', '213');
INSERT INTO `time_slot` VALUES (2685, '14', '06:00 PM', '06:15 PM', 'Monday', '216');
INSERT INTO `time_slot` VALUES (2686, '14', '06:15 PM', '06:30 PM', 'Monday', '219');
INSERT INTO `time_slot` VALUES (2687, '14', '06:30 PM', '06:45 PM', 'Monday', '222');
INSERT INTO `time_slot` VALUES (2688, '14', '06:45 PM', '07:00 PM', 'Monday', '225');
INSERT INTO `time_slot` VALUES (2689, '14', '05:00 PM', '05:15 PM', 'Friday', '204');
INSERT INTO `time_slot` VALUES (2690, '14', '05:15 PM', '05:30 PM', 'Friday', '207');
INSERT INTO `time_slot` VALUES (2691, '14', '05:30 PM', '05:45 PM', 'Friday', '210');
INSERT INTO `time_slot` VALUES (2692, '14', '05:45 PM', '06:00 PM', 'Friday', '213');
INSERT INTO `time_slot` VALUES (2693, '14', '06:00 PM', '06:15 PM', 'Friday', '216');
INSERT INTO `time_slot` VALUES (2694, '14', '06:15 PM', '06:30 PM', 'Friday', '219');
INSERT INTO `time_slot` VALUES (2695, '14', '06:30 PM', '06:45 PM', 'Friday', '222');
INSERT INTO `time_slot` VALUES (2696, '14', '06:45 PM', '07:00 PM', 'Friday', '225');
INSERT INTO `time_slot` VALUES (2876, '15', '01:15 PM', '01:30 PM', 'Monday', '159');
INSERT INTO `time_slot` VALUES (2875, '15', '01:00 PM', '01:15 PM', 'Monday', '156');
INSERT INTO `time_slot` VALUES (2874, '15', '12:45 PM', '01:00 PM', 'Monday', '153');
INSERT INTO `time_slot` VALUES (2873, '15', '12:30 PM', '12:45 PM', 'Monday', '150');
INSERT INTO `time_slot` VALUES (2872, '15', '12:15 PM', '12:30 PM', 'Monday', '147');
INSERT INTO `time_slot` VALUES (2871, '15', '12:00 PM', '12:15 PM', 'Monday', '144');
INSERT INTO `time_slot` VALUES (2870, '15', '11:45 AM', '12:00 PM', 'Monday', '141');
INSERT INTO `time_slot` VALUES (2869, '15', '11:30 AM', '11:45 AM', 'Monday', '138');
INSERT INTO `time_slot` VALUES (2868, '15', '11:15 AM', '11:30 AM', 'Monday', '135');
INSERT INTO `time_slot` VALUES (2867, '15', '11:00 AM', '11:15 AM', 'Monday', '132');
INSERT INTO `time_slot` VALUES (2866, '15', '10:45 AM', '11:00 AM', 'Monday', '129');
INSERT INTO `time_slot` VALUES (2865, '15', '10:30 AM', '10:45 AM', 'Monday', '126');
INSERT INTO `time_slot` VALUES (2864, '15', '10:15 AM', '10:30 AM', 'Monday', '123');
INSERT INTO `time_slot` VALUES (2863, '15', '10:00 AM', '10:15 AM', 'Monday', '120');
INSERT INTO `time_slot` VALUES (2862, '15', '09:45 AM', '10:00 AM', 'Monday', '117');
INSERT INTO `time_slot` VALUES (2861, '15', '09:30 AM', '09:45 AM', 'Monday', '114');
INSERT INTO `time_slot` VALUES (2860, '15', '09:15 AM', '09:30 AM', 'Monday', '111');
INSERT INTO `time_slot` VALUES (2859, '15', '09:00 AM', '09:15 AM', 'Monday', '108');
INSERT INTO `time_slot` VALUES (2858, '15', '08:45 AM', '09:00 AM', 'Monday', '105');
INSERT INTO `time_slot` VALUES (2857, '15', '08:30 AM', '08:45 AM', 'Monday', '102');
INSERT INTO `time_slot` VALUES (2856, '15', '08:15 AM', '08:30 AM', 'Monday', '99');
INSERT INTO `time_slot` VALUES (2855, '15', '08:00 AM', '08:15 AM', 'Monday', '96');
INSERT INTO `time_slot` VALUES (2854, '15', '07:45 AM', '08:00 AM', 'Monday', '93');
INSERT INTO `time_slot` VALUES (2853, '15', '07:30 AM', '07:45 AM', 'Monday', '90');
INSERT INTO `time_slot` VALUES (2852, '15', '07:15 AM', '07:30 AM', 'Monday', '87');
INSERT INTO `time_slot` VALUES (2851, '15', '07:00 AM', '07:15 AM', 'Monday', '84');
INSERT INTO `time_slot` VALUES (2850, '15', '06:45 AM', '07:00 AM', 'Monday', '81');
INSERT INTO `time_slot` VALUES (2849, '15', '06:30 AM', '06:45 AM', 'Monday', '78');
INSERT INTO `time_slot` VALUES (2848, '15', '06:15 AM', '06:30 AM', 'Monday', '75');
INSERT INTO `time_slot` VALUES (2847, '15', '06:00 AM', '06:15 AM', 'Monday', '72');
INSERT INTO `time_slot` VALUES (2846, '15', '05:45 AM', '06:00 AM', 'Monday', '69');
INSERT INTO `time_slot` VALUES (2845, '15', '05:30 AM', '05:45 AM', 'Monday', '66');
INSERT INTO `time_slot` VALUES (2844, '15', '05:15 AM', '05:30 AM', 'Monday', '63');
INSERT INTO `time_slot` VALUES (2843, '15', '05:00 AM', '05:15 AM', 'Monday', '60');
INSERT INTO `time_slot` VALUES (2842, '15', '04:45 AM', '05:00 AM', 'Monday', '57');
INSERT INTO `time_slot` VALUES (2841, '15', '04:30 AM', '04:45 AM', 'Monday', '54');
INSERT INTO `time_slot` VALUES (2840, '15', '04:15 AM', '04:30 AM', 'Monday', '51');
INSERT INTO `time_slot` VALUES (2839, '15', '04:00 AM', '04:15 AM', 'Monday', '48');
INSERT INTO `time_slot` VALUES (2838, '15', '03:45 AM', '04:00 AM', 'Monday', '45');
INSERT INTO `time_slot` VALUES (2837, '15', '03:30 AM', '03:45 AM', 'Monday', '42');
INSERT INTO `time_slot` VALUES (2836, '15', '03:15 AM', '03:30 AM', 'Monday', '39');
INSERT INTO `time_slot` VALUES (2835, '15', '03:00 AM', '03:15 AM', 'Monday', '36');
INSERT INTO `time_slot` VALUES (2834, '15', '02:45 AM', '03:00 AM', 'Monday', '33');
INSERT INTO `time_slot` VALUES (2833, '15', '02:30 AM', '02:45 AM', 'Monday', '30');
INSERT INTO `time_slot` VALUES (2832, '15', '02:15 AM', '02:30 AM', 'Monday', '27');
INSERT INTO `time_slot` VALUES (2831, '15', '02:00 AM', '02:15 AM', 'Monday', '24');
INSERT INTO `time_slot` VALUES (2830, '15', '01:45 AM', '02:00 AM', 'Monday', '21');
INSERT INTO `time_slot` VALUES (2829, '15', '01:30 AM', '01:45 AM', 'Monday', '18');
INSERT INTO `time_slot` VALUES (2828, '15', '01:15 AM', '01:30 AM', 'Monday', '15');
INSERT INTO `time_slot` VALUES (2827, '15', '01:00 AM', '01:15 AM', 'Monday', '12');
INSERT INTO `time_slot` VALUES (2826, '15', '12:45 AM', '01:00 AM', 'Monday', '9');
INSERT INTO `time_slot` VALUES (2825, '15', '12:30 AM', '12:45 AM', 'Monday', '6');
INSERT INTO `time_slot` VALUES (2765, '15', '12:30 AM', '12:45 AM', 'Wednesday', '6');
INSERT INTO `time_slot` VALUES (2766, '15', '12:45 AM', '01:00 AM', 'Wednesday', '9');
INSERT INTO `time_slot` VALUES (2767, '15', '01:00 AM', '01:15 AM', 'Wednesday', '12');
INSERT INTO `time_slot` VALUES (2768, '15', '01:15 AM', '01:30 AM', 'Wednesday', '15');
INSERT INTO `time_slot` VALUES (2769, '15', '01:30 AM', '01:45 AM', 'Wednesday', '18');
INSERT INTO `time_slot` VALUES (2770, '15', '01:45 AM', '02:00 AM', 'Wednesday', '21');
INSERT INTO `time_slot` VALUES (2771, '15', '02:00 AM', '02:15 AM', 'Wednesday', '24');
INSERT INTO `time_slot` VALUES (2772, '15', '02:15 AM', '02:30 AM', 'Wednesday', '27');
INSERT INTO `time_slot` VALUES (2773, '15', '02:30 AM', '02:45 AM', 'Wednesday', '30');
INSERT INTO `time_slot` VALUES (2774, '15', '02:45 AM', '03:00 AM', 'Wednesday', '33');
INSERT INTO `time_slot` VALUES (2775, '15', '03:00 AM', '03:15 AM', 'Wednesday', '36');
INSERT INTO `time_slot` VALUES (2776, '15', '03:15 AM', '03:30 AM', 'Wednesday', '39');
INSERT INTO `time_slot` VALUES (2777, '15', '03:30 AM', '03:45 AM', 'Wednesday', '42');
INSERT INTO `time_slot` VALUES (2778, '15', '03:45 AM', '04:00 AM', 'Wednesday', '45');
INSERT INTO `time_slot` VALUES (2779, '15', '04:00 AM', '04:15 AM', 'Wednesday', '48');
INSERT INTO `time_slot` VALUES (2780, '15', '04:15 AM', '04:30 AM', 'Wednesday', '51');
INSERT INTO `time_slot` VALUES (2781, '15', '04:30 AM', '04:45 AM', 'Wednesday', '54');
INSERT INTO `time_slot` VALUES (2782, '15', '04:45 AM', '05:00 AM', 'Wednesday', '57');
INSERT INTO `time_slot` VALUES (2783, '15', '05:00 AM', '05:15 AM', 'Wednesday', '60');
INSERT INTO `time_slot` VALUES (2784, '15', '05:15 AM', '05:30 AM', 'Wednesday', '63');
INSERT INTO `time_slot` VALUES (2785, '15', '05:30 AM', '05:45 AM', 'Wednesday', '66');
INSERT INTO `time_slot` VALUES (2786, '15', '05:45 AM', '06:00 AM', 'Wednesday', '69');
INSERT INTO `time_slot` VALUES (2787, '15', '06:00 AM', '06:15 AM', 'Wednesday', '72');
INSERT INTO `time_slot` VALUES (2788, '15', '06:15 AM', '06:30 AM', 'Wednesday', '75');
INSERT INTO `time_slot` VALUES (2789, '15', '06:30 AM', '06:45 AM', 'Wednesday', '78');
INSERT INTO `time_slot` VALUES (2790, '15', '06:45 AM', '07:00 AM', 'Wednesday', '81');
INSERT INTO `time_slot` VALUES (2791, '15', '07:00 AM', '07:15 AM', 'Wednesday', '84');
INSERT INTO `time_slot` VALUES (2792, '15', '07:15 AM', '07:30 AM', 'Wednesday', '87');
INSERT INTO `time_slot` VALUES (2793, '15', '07:30 AM', '07:45 AM', 'Wednesday', '90');
INSERT INTO `time_slot` VALUES (2794, '15', '07:45 AM', '08:00 AM', 'Wednesday', '93');
INSERT INTO `time_slot` VALUES (2795, '15', '08:00 AM', '08:15 AM', 'Wednesday', '96');
INSERT INTO `time_slot` VALUES (2796, '15', '08:15 AM', '08:30 AM', 'Wednesday', '99');
INSERT INTO `time_slot` VALUES (2797, '15', '08:30 AM', '08:45 AM', 'Wednesday', '102');
INSERT INTO `time_slot` VALUES (2798, '15', '08:45 AM', '09:00 AM', 'Wednesday', '105');
INSERT INTO `time_slot` VALUES (2799, '15', '09:00 AM', '09:15 AM', 'Wednesday', '108');
INSERT INTO `time_slot` VALUES (2800, '15', '09:15 AM', '09:30 AM', 'Wednesday', '111');
INSERT INTO `time_slot` VALUES (2801, '15', '09:30 AM', '09:45 AM', 'Wednesday', '114');
INSERT INTO `time_slot` VALUES (2802, '15', '09:45 AM', '10:00 AM', 'Wednesday', '117');
INSERT INTO `time_slot` VALUES (2803, '15', '10:00 AM', '10:15 AM', 'Wednesday', '120');
INSERT INTO `time_slot` VALUES (2804, '15', '10:15 AM', '10:30 AM', 'Wednesday', '123');
INSERT INTO `time_slot` VALUES (2805, '15', '10:30 AM', '10:45 AM', 'Wednesday', '126');
INSERT INTO `time_slot` VALUES (2806, '15', '10:45 AM', '11:00 AM', 'Wednesday', '129');
INSERT INTO `time_slot` VALUES (2807, '15', '11:00 AM', '11:15 AM', 'Wednesday', '132');
INSERT INTO `time_slot` VALUES (2808, '15', '11:15 AM', '11:30 AM', 'Wednesday', '135');
INSERT INTO `time_slot` VALUES (2809, '15', '11:30 AM', '11:45 AM', 'Wednesday', '138');
INSERT INTO `time_slot` VALUES (2810, '15', '11:45 AM', '12:00 PM', 'Wednesday', '141');
INSERT INTO `time_slot` VALUES (2811, '15', '12:00 PM', '12:15 PM', 'Wednesday', '144');
INSERT INTO `time_slot` VALUES (2812, '15', '12:15 PM', '12:30 PM', 'Wednesday', '147');
INSERT INTO `time_slot` VALUES (2813, '15', '12:30 PM', '12:45 PM', 'Wednesday', '150');
INSERT INTO `time_slot` VALUES (2814, '15', '12:45 PM', '01:00 PM', 'Wednesday', '153');
INSERT INTO `time_slot` VALUES (2815, '15', '01:00 PM', '01:15 PM', 'Wednesday', '156');
INSERT INTO `time_slot` VALUES (2816, '15', '01:15 PM', '01:30 PM', 'Wednesday', '159');
INSERT INTO `time_slot` VALUES (2817, '15', '01:30 PM', '01:45 PM', 'Wednesday', '162');
INSERT INTO `time_slot` VALUES (2818, '15', '01:45 PM', '02:00 PM', 'Wednesday', '165');
INSERT INTO `time_slot` VALUES (2819, '15', '02:00 PM', '02:15 PM', 'Wednesday', '168');
INSERT INTO `time_slot` VALUES (2820, '15', '02:15 PM', '02:30 PM', 'Wednesday', '171');
INSERT INTO `time_slot` VALUES (2821, '15', '02:30 PM', '02:45 PM', 'Wednesday', '174');
INSERT INTO `time_slot` VALUES (2822, '15', '02:45 PM', '03:00 PM', 'Wednesday', '177');
INSERT INTO `time_slot` VALUES (2823, '15', '03:00 PM', '03:15 PM', 'Wednesday', '180');
INSERT INTO `time_slot` VALUES (2824, '15', '03:15 PM', '03:30 PM', 'Wednesday', '183');
INSERT INTO `time_slot` VALUES (2877, '15', '01:30 PM', '01:45 PM', 'Monday', '162');
INSERT INTO `time_slot` VALUES (2878, '15', '01:45 PM', '02:00 PM', 'Monday', '165');
INSERT INTO `time_slot` VALUES (2879, '15', '02:00 PM', '02:15 PM', 'Monday', '168');
INSERT INTO `time_slot` VALUES (2880, '15', '02:15 PM', '02:30 PM', 'Monday', '171');
INSERT INTO `time_slot` VALUES (2881, '15', '02:30 PM', '02:45 PM', 'Monday', '174');
INSERT INTO `time_slot` VALUES (2882, '15', '02:45 PM', '03:00 PM', 'Monday', '177');
INSERT INTO `time_slot` VALUES (2883, '15', '03:00 PM', '03:15 PM', 'Monday', '180');
INSERT INTO `time_slot` VALUES (2884, '15', '03:15 PM', '03:30 PM', 'Monday', '183');
INSERT INTO `time_slot` VALUES (2885, '16', '03:00 PM', '03:15 PM', 'Monday', '180');
INSERT INTO `time_slot` VALUES (2886, '16', '03:15 PM', '03:30 PM', 'Monday', '183');
INSERT INTO `time_slot` VALUES (2887, '16', '03:30 PM', '03:45 PM', 'Monday', '186');
INSERT INTO `time_slot` VALUES (2888, '16', '03:45 PM', '04:00 PM', 'Monday', '189');
INSERT INTO `time_slot` VALUES (2889, '16', '04:00 PM', '04:15 PM', 'Wednesday', '192');
INSERT INTO `time_slot` VALUES (2890, '16', '04:15 PM', '04:30 PM', 'Wednesday', '195');
INSERT INTO `time_slot` VALUES (2891, '16', '04:30 PM', '04:45 PM', 'Wednesday', '198');
INSERT INTO `time_slot` VALUES (2892, '16', '04:45 PM', '05:00 PM', 'Wednesday', '201');
INSERT INTO `time_slot` VALUES (2893, '16', '05:00 PM', '05:15 PM', 'Wednesday', '204');
INSERT INTO `time_slot` VALUES (2894, '16', '05:15 PM', '05:30 PM', 'Wednesday', '207');
INSERT INTO `time_slot` VALUES (2895, '16', '05:30 PM', '05:45 PM', 'Wednesday', '210');
INSERT INTO `time_slot` VALUES (2896, '16', '05:45 PM', '06:00 PM', 'Wednesday', '213');
INSERT INTO `time_slot` VALUES (2897, '17', '10:00 AM', '10:15 AM', 'Tuesday', '120');
INSERT INTO `time_slot` VALUES (2898, '17', '10:15 AM', '10:30 AM', 'Tuesday', '123');
INSERT INTO `time_slot` VALUES (2899, '17', '10:30 AM', '10:45 AM', 'Tuesday', '126');
INSERT INTO `time_slot` VALUES (2900, '17', '10:45 AM', '11:00 AM', 'Tuesday', '129');
INSERT INTO `time_slot` VALUES (2901, '17', '11:00 AM', '11:15 AM', 'Tuesday', '132');
INSERT INTO `time_slot` VALUES (2902, '17', '11:15 AM', '11:30 AM', 'Tuesday', '135');
INSERT INTO `time_slot` VALUES (2903, '17', '11:30 AM', '11:45 AM', 'Tuesday', '138');
INSERT INTO `time_slot` VALUES (2904, '17', '11:45 AM', '12:00 PM', 'Tuesday', '141');
INSERT INTO `time_slot` VALUES (2905, '17', '12:00 PM', '12:15 PM', 'Tuesday', '144');
INSERT INTO `time_slot` VALUES (2906, '17', '12:15 PM', '12:30 PM', 'Tuesday', '147');
INSERT INTO `time_slot` VALUES (2907, '17', '12:30 PM', '12:45 PM', 'Tuesday', '150');
INSERT INTO `time_slot` VALUES (2908, '17', '12:45 PM', '01:00 PM', 'Tuesday', '153');
INSERT INTO `time_slot` VALUES (2909, '17', '10:00 AM', '10:15 AM', 'Thursday', '120');
INSERT INTO `time_slot` VALUES (2910, '17', '10:15 AM', '10:30 AM', 'Thursday', '123');
INSERT INTO `time_slot` VALUES (2911, '17', '10:30 AM', '10:45 AM', 'Thursday', '126');
INSERT INTO `time_slot` VALUES (2912, '17', '10:45 AM', '11:00 AM', 'Thursday', '129');
INSERT INTO `time_slot` VALUES (2913, '17', '11:00 AM', '11:15 AM', 'Thursday', '132');
INSERT INTO `time_slot` VALUES (2914, '17', '11:15 AM', '11:30 AM', 'Thursday', '135');
INSERT INTO `time_slot` VALUES (2915, '17', '11:30 AM', '11:45 AM', 'Thursday', '138');
INSERT INTO `time_slot` VALUES (2916, '17', '11:45 AM', '12:00 PM', 'Thursday', '141');
INSERT INTO `time_slot` VALUES (2917, '17', '12:00 PM', '12:15 PM', 'Thursday', '144');
INSERT INTO `time_slot` VALUES (2918, '17', '12:15 PM', '12:30 PM', 'Thursday', '147');
INSERT INTO `time_slot` VALUES (2919, '17', '12:30 PM', '12:45 PM', 'Thursday', '150');
INSERT INTO `time_slot` VALUES (2920, '17', '12:45 PM', '01:00 PM', 'Thursday', '153');
INSERT INTO `time_slot` VALUES (2921, '17', '10:00 AM', '10:15 AM', 'Friday', '120');
INSERT INTO `time_slot` VALUES (2922, '17', '10:15 AM', '10:30 AM', 'Friday', '123');
INSERT INTO `time_slot` VALUES (2923, '17', '10:30 AM', '10:45 AM', 'Friday', '126');
INSERT INTO `time_slot` VALUES (2924, '17', '10:45 AM', '11:00 AM', 'Friday', '129');
INSERT INTO `time_slot` VALUES (2925, '17', '11:00 AM', '11:15 AM', 'Friday', '132');
INSERT INTO `time_slot` VALUES (2926, '17', '11:15 AM', '11:30 AM', 'Friday', '135');
INSERT INTO `time_slot` VALUES (2927, '17', '11:30 AM', '11:45 AM', 'Friday', '138');
INSERT INTO `time_slot` VALUES (2928, '17', '11:45 AM', '12:00 PM', 'Friday', '141');
INSERT INTO `time_slot` VALUES (2929, '17', '12:00 PM', '12:15 PM', 'Friday', '144');
INSERT INTO `time_slot` VALUES (2930, '17', '12:15 PM', '12:30 PM', 'Friday', '147');
INSERT INTO `time_slot` VALUES (2931, '17', '12:30 PM', '12:45 PM', 'Friday', '150');
INSERT INTO `time_slot` VALUES (2932, '17', '12:45 PM', '01:00 PM', 'Friday', '153');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activation_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `remember_code` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED NULL DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1609 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '127.0.0.1', 'admin', '$2y$08$dxACPpnFozxfaNdOyKR8x.R4SwJwru2rFwG6BBfOpUnAoVfViQDs.', '', 'admin@dms.com', '', 'g0wt205VJVb4a9819f14ce3d10dffe14f93680e2', 1607595309, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1688354877, 1, 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES (109, '113.11.74.192', 'Mrs Nurse', '$2y$08$CqxsVFewynbZi6UBOe481eJWbkNdOa/ehpmlGXJnrjq5mvpPDdzoO', NULL, 'nurse@dms.com', NULL, NULL, NULL, NULL, 1435082243, 1687140981, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (110, '113.11.74.192', 'Mr. Pharmacist', '$2y$08$uy2YnEG6kAADq8QLL2MS7OfvPs.ZLcWmAVJCj5LA4pNQTuuBWNZ4G', NULL, 'pharmacist@dms.com', NULL, NULL, NULL, 'mbeMop6vTuscFYmD2M4Iqu', 1435082359, 1687418138, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (111, '113.11.74.192', 'Triana', '$2y$08$hSHiFXnJZE4fusxX2WlfYeIVIYLH2H6ZfyINHRQLbrTAUcnVc572a', NULL, 'lab@umsu.ac.id', NULL, NULL, NULL, NULL, 1435082438, 1681194475, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (112, '113.11.74.192', 'Mr. Accountant', '$2y$08$MeJQlgRC1AALgtvxfXwhuu5p1QOE9VAhXf7eM7llpt1TRRpNxVAFu', NULL, 'accountant@dms.com', NULL, NULL, NULL, NULL, 1435082637, 1687140749, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (614, '103.231.162.58', 'Mr Receptionist', '$2y$08$K2lK8Adt2whlJupWKZuPiuE7GIS.yI0ort8xgOGAERLqdwapGWszq', NULL, 'receptionist@dms.com', NULL, NULL, NULL, NULL, 1505800835, 1687842848, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1589, '::1', 'dr.Siti Masliana Siregar, Sp.THT-KL(K)', '$2y$08$Rc.8lI89Oh0IqgtPFtjGM.qHmCqoe3UxyCnF8f0N//de4BEg.xCje', NULL, 'siti@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, 1687574821, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1590, '::1', 'dr.Muhammad Edy Syahputra Nasution, M. Ked(ORL-HNS), Sp.THT-KL', '$2y$08$1ufmv069IbpgV0uY8m0QJ.O9NVoP1Dz4/.1NX4kI8XKC3YyDnS78y', NULL, 'edy@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1591, '::1', 'dr.Arridha Hutami Putri, M. Ked(DV), Sp. DV', '$2y$08$CUiVd2sHYESIKeqk6kdeA.dtJgsUOM0Z1vRANAF2JEQMF1BwCM99e', NULL, 'putri@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1592, '::1', 'dr.Rahmawati, M.Ked (PD), Sp.PD', '$2y$08$M83D6V53w3JgJnNxQ9GL4.n2OPdrPZOAWquDvQ10F1ojd1T.CRvuG', NULL, 'rahmawati@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1593, '::1', 'dr.Ren Astrid Allail Siregar, Sp.PA', '$2y$08$aFjmd7Ek2VdFsIKSr4YDVO6liCqNG1AUEgNjLVQsCKt3fahoX2cgG', NULL, 'ren@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1594, '::1', 'dr.Huwainan Nisa Nasution, M.Kes, Sp. PD', '$2y$08$tmLA6u6bUdcmDgKckb.E3eo0P8gfKb7zfLkaWrVedAcJeu9Y7HG2O', NULL, 'huwainan@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1595, '::1', 'dr.Hendra Sutysna, M.Biomed, AIFO-K, Sp. KKLP', '$2y$08$zd78sNm0146s7dfGcqJCc.nXsVpZ7aPSGz9UAlZm/npW.UgPZTLdK', NULL, 'hendra@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1596, '::1', 'dr.Eka Febriyanti, M.Gizi', '$2y$08$kLT2ualeshA9zJNv/y9wAOpGIiDvQ1P1EQj2D.hJsim2XE/4SJnty', NULL, 'eka@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1597, '::1', 'dr.Nurhasanah, Sp.K.J', '$2y$08$YuN1ckvzPBH4jUEFMzC/beHNxJ/YtDoqv5Ye1B1cl1y8VkKjg5s42', NULL, 'nurhasanah@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1598, '::1', 'dr.Leny Wardaini S, M.Ked (Neu) Sp.S', '$2y$08$qg.L/pCUotNA71FMAQh8/.UlspK2Nk8liWC5AyBTJb7IOskypK.Zq', NULL, 'leny@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1599, '::1', 'dr.Rahmanita Sinaga, M.Ked(OG). Sp.OG', '$2y$08$a7TKgcDqO9Erjm2P5wdU.e0JQ0QnjsHilAE1Kc666qpdX8mQlleSm', NULL, 'rahmanita@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1600, '::1', 'dr.Yuanita Mayasari Aritonang, Sp.PK', '$2y$08$oT2GrNwx8.PqYzAvpxYnxO6i14cz1w74OCnISEWHq42ZOtHjkWUmu', NULL, 'yuanita@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1601, '::1', 'dr.Nurlina Setiadi', '$2y$08$hKiAbznbtM26gAlhbAqgXOBG6y/ZAggcI84r57hNyzVrbS/bb9B6G', NULL, 'nurlina@umsu.ac.id', NULL, NULL, NULL, NULL, 1681215914, 1681363742, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1602, '::1', 'Dina Ritonga', '$2y$08$03T2wFP2jXOsSIzrFz6owuqIQhLoX8zjnX48MgRLAB3ks1VzY2BOS', NULL, 'dina@gmail.com', NULL, NULL, NULL, NULL, 1681254490, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1603, '::1', 'Fajar Gultom', '$2y$08$drTIgP8dqGFMP.zyVeyrtO.PI9hzf4q075HRXHy1gNTV6RhRmmcYa', NULL, 'fajar@gmail.com', NULL, NULL, NULL, NULL, 1681254670, 1687838457, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1604, '::1', 'Indah Sari', '$2y$08$dhKkqgvTSdkWU4nuOjfMuePRMNj1RlJwCj4Ls/lYF5VnxLmkLKV0S', NULL, 'perawat@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263645, 1681264030, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1605, '::1', 'Melodi Medica', '$2y$08$rDrhJ5ITMRN4MzG1blA.zuaJj6OUV/jWqcdADv3Srviv/3I6JbtG2', NULL, 'resepsionis@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263717, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1606, '::1', 'Melisa Danarto', '$2y$08$kBiLfu/WlqD8VfKRKgsGO.u6TZiX0G0sxzBQ3DabO6dC5Ybnx.6H.', NULL, 'kasir@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263835, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1607, '::1', 'Kiky Ayunita', '$2y$08$aIO5YGBV.4Cuf6Upon7Ytu5CJRSHPcP05v0YCMxr4xcyLIoWojRB.', NULL, 'apotik@umsu.ac.id', NULL, NULL, NULL, NULL, 1681263996, NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (1608, '::1', 'test', '$2y$08$2H3s0TVBTcynBpg3Bt9icuqs8GNf7SOr4P4rLk.h4CEiS3e0l/Oyi', NULL, 'user@gmail.com', NULL, NULL, NULL, NULL, 1684917687, NULL, 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 5606 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (111, 109, 6);
INSERT INTO `users_groups` VALUES (112, 110, 7);
INSERT INTO `users_groups` VALUES (113, 111, 8);
INSERT INTO `users_groups` VALUES (114, 112, 3);
INSERT INTO `users_groups` VALUES (616, 614, 10);
INSERT INTO `users_groups` VALUES (5586, 1589, 4);
INSERT INTO `users_groups` VALUES (5587, 1590, 4);
INSERT INTO `users_groups` VALUES (5588, 1591, 4);
INSERT INTO `users_groups` VALUES (5589, 1592, 4);
INSERT INTO `users_groups` VALUES (5590, 1593, 4);
INSERT INTO `users_groups` VALUES (5591, 1594, 4);
INSERT INTO `users_groups` VALUES (5592, 1595, 4);
INSERT INTO `users_groups` VALUES (5593, 1596, 4);
INSERT INTO `users_groups` VALUES (5594, 1597, 4);
INSERT INTO `users_groups` VALUES (5595, 1598, 4);
INSERT INTO `users_groups` VALUES (5596, 1599, 4);
INSERT INTO `users_groups` VALUES (5597, 1600, 4);
INSERT INTO `users_groups` VALUES (5598, 1601, 4);
INSERT INTO `users_groups` VALUES (5599, 1602, 5);
INSERT INTO `users_groups` VALUES (5600, 1603, 5);
INSERT INTO `users_groups` VALUES (5601, 1604, 6);
INSERT INTO `users_groups` VALUES (5602, 1605, 10);
INSERT INTO `users_groups` VALUES (5603, 1606, 3);
INSERT INTO `users_groups` VALUES (5604, 1607, 7);
INSERT INTO `users_groups` VALUES (5605, 1608, 5);

-- ----------------------------
-- Table structure for website_settings
-- ----------------------------
DROP TABLE IF EXISTS `website_settings`;
CREATE TABLE `website_settings`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `logo` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `emergency` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `support` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `currency` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `block_1_text_under_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `service_block__text_under_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `doctor_block__text_under_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `facebook_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `twitter_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `google_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `youtube_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `skype_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `x` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `twitter_username` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `appointment_title` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_subtitle` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_description` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appointment_img_url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of website_settings
-- ----------------------------
INSERT INTO `website_settings` VALUES (1, 'Specialis Clinic', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Minus deleniti mollitia quibusdam natus dolorum quae id libero rerum ullam maxime molestias exercitationem incidunt, sunt, delectus consequuntur dignissimos ab iste fuga?', 'uploads/LOGO_KLINIllll.png', 'Jl. Gedung Arca No.53, Teladan Bar., Kec. Medan Kota, Kota Medan, Sumatera Utara 20217', '081269995201', '+0123456789', '+0123456789', 'admin@demo.com', 'Rp', 'Best Hospital In The City', 'Aenean nibh ante, lacinia non tincidunt nec, lobortis ut tellus. Sed in porta diam.', 'We work with forward thinking clients to create beautiful, honest and amazing things that bring positive results.', 'https://www.facebook.com/rizvi.plabon', 'https://www.twitter.com/casoft', 'https://www.google.com/casoft', 'https://www.youtube.com/casoft', 'https://www.skype.com/casoft', NULL, 'codearistos', 'Why you should choose us?', 'WELCOME TO HOSPITAL MANAGEMENT', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam nulla quibusdam nam autem, in quasi quae cumque, laborum optio nobis reprehenderit doloremque delectus voluptate. Maxime aliquam vitae adipisci sit numquam?', 'uploads/why-choose-us-doc.png');

SET FOREIGN_KEY_CHECKS = 1;
