-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 24, 2020 at 12:29 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_student_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `upl` varchar(200) NOT NULL,
  `join_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `upl`, `join_date`) VALUES
(1, 'admin', 'admin', '5a09b3dfeb1c7.MYXJ_20170606095950_fast', '7 Nov, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `id` float NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(100) NOT NULL,
  `upl` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `lga` varchar(20) NOT NULL,
  `town` varchar(20) NOT NULL,
  `addr` varchar(225) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `level` varchar(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `type_programme` varchar(20) NOT NULL,
  `exam_type` varchar(20) NOT NULL,
  `exam_number` varchar(20) NOT NULL,
  `exam_date` varchar(20) NOT NULL,
  `subject1` varchar(20) NOT NULL,
  `subject2` varchar(20) NOT NULL,
  `subject3` varchar(20) NOT NULL,
  `subject4` varchar(20) NOT NULL,
  `subject5` varchar(20) NOT NULL,
  `subject6` varchar(20) NOT NULL,
  `subject7` varchar(20) NOT NULL,
  `subject8` varchar(20) NOT NULL,
  `grade_score1` varchar(20) NOT NULL,
  `grade_score2` varchar(20) NOT NULL,
  `grade_score3` varchar(20) NOT NULL,
  `grade_score4` varchar(20) NOT NULL,
  `grade_score5` varchar(20) NOT NULL,
  `grade_score6` varchar(20) NOT NULL,
  `grade_score7` varchar(20) NOT NULL,
  `grade_score8` varchar(20) NOT NULL,
  `add_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `matric_no`, `upl`, `fname`, `password`, `email`, `phone`, `sex`, `dob`, `country`, `state`, `lga`, `town`, `addr`, `faculty`, `dept`, `level`, `session`, `semester`, `type_programme`, `exam_type`, `exam_number`, `exam_date`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `subject8`, `grade_score1`, `grade_score2`, `grade_score3`, `grade_score4`, `grade_score5`, `grade_score6`, `grade_score7`, `grade_score8`, `add_date`) VALUES
(1, '200001', '5e539e8f3ad775a09b3dfeb1c7.MYXJ_20170606095950_fast.jpg', 'odefemi elijah ', '123456', 'elit4596@gmail.com', '08166273366', 'Male', '2020-02-27', 'Nigeria', 'osun', 'olorunda', 'osogbo', 'onward area osogbo', 'Engineering and Technology', 'Department of Computer Science and Engineering', '100L', '2019.9995049505', 'HARMATTAN', 'Regular', 'Neco', '23455665ge', '2020-02-20', 'Mathematics', 'English Language', 'Physics', 'Biology', 'Chemistry', 'Agriculture', 'Geograph', 'Economics', 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', '24 Feb, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `app_payment`
--

DROP TABLE IF EXISTS `app_payment`;
CREATE TABLE IF NOT EXISTS `app_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `payment_unique_id` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_receipt_number` int(11) NOT NULL,
  `payment_otp` int(11) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_payment`
--

INSERT INTO `app_payment` (`id`, `email`, `payment_amount`, `payment_unique_id`, `payment_status`, `payment_receipt_number`, `payment_otp`, `payment_date`) VALUES
(1, 'elit4596@gmail.com', '20000', 2004156416, 1, 856293376, 1, '24 Feb, 2020 09:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

DROP TABLE IF EXISTS `biodata`;
CREATE TABLE IF NOT EXISTS `biodata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `birth` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `lga` text NOT NULL,
  `town` varchar(20) NOT NULL,
  `addr` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `Course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `unit` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `Dept_id` int(11) NOT NULL,
  PRIMARY KEY (`Course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course_id`, `course_code`, `course_title`, `unit`, `level`, `semester`, `Dept_id`) VALUES
(1, 'MTH101', 'General Mathematics I', 5, '100L', 'HARMATTAN', 29),
(2, 'PHY101', 'General Physics I', 4, '100L', 'HARMATTAN', 29),
(3, 'PHY103', 'Experimental Physics I', 1, '100L', 'HARMATTAN', 29),
(4, 'CHM101', 'General Chemistry I', 4, '100L', 'HARMATTAN', 29),
(5, 'CHM103', 'Experimental ChemistryI', 1, '100L', 'HARMATTAN', 29),
(6, 'BIO101', 'General Biology I', 3, '100L', 'HARMATTAN', 29),
(7, 'BIO103', 'Experimental Biology', 1, '100L', 'HARMATTAN', 29),
(8, 'FAA101', 'Basics of Drawing', 2, '100L', 'HARMATTAN', 29),
(9, 'GNS101', 'Use of English I', 2, '100L', 'HARMATTAN', 29),
(10, 'LIB101', 'Use of Library', 1, '100L', 'HARMATTAN', 29),
(11, 'MTH102', 'General Mathematics II', 5, '100L', 'RAIN', 29),
(12, 'PHY102', 'General Physics II', 4, '100L', 'RAIN', 29),
(13, 'PHY104', 'Experimental Physics II', 1, '100L', 'RAIN', 29),
(14, 'CHM102', 'General Chemistry II', 4, '100L', 'RAIN', 29),
(15, 'CHM104', 'Experimental Chemistry II', 1, '100L', 'RAIN', 29),
(16, 'BIO102', 'General Biology II', 3, '100L', 'RAIN', 29),
(17, 'BIO104', 'Experimental Biology II', 1, '100L', 'RAIN', 29),
(18, 'GNS102', 'Use of English II', 1, '100L', 'RAIN', 29),
(19, 'GNS104', 'Science and Technology in Africa through the Ages', 2, '100L', 'RAIN', 29),
(20, 'CSE100', 'Introduction to Computer Tech', 1, '100L', 'RAIN', 29),
(21, 'CSE201', 'Basic Computer Programming', 3, '200L', ' HARMATTAN', 29),
(22, 'CSE203', 'Basic Programming Lab. ', 1, '200L', ' HARMATTAN', 29),
(23, 'MEE201', 'Engineering Drawing I', 2, '200L', ' HARMATTAN', 29),
(24, 'MEE203', 'Workshop Technology I', 2, '200L', ' HARMATTAN', 29),
(25, 'MEE207', 'Fluid Mechanics', 2, '200L', ' HARMATTAN', 29),
(26, 'MEE211', ' Engineering Thermodynamics I', 3, '200L', ' HARMATTAN', 29),
(27, 'EEE231', ' Engineering Maths I', 4, '200L', ' HARMATTAN', 29),
(28, 'MGS201', ' Technology and Society', 1, '200L', ' HARMATTAN', 29),
(29, 'GNS207', ' Citizenship Educ and Science:Bio historical approach', 2, '200L', ' HARMATTAN', 29),
(30, 'CSE202', ' Overview of Computer Science  ', 2, '200L', 'RAIN', 29),
(31, 'CSE204', ' Introduction to Applications  ', 2, '200L', 'RAIN', 29),
(32, 'CSE206', ' Discrete Structures ', 3, '200L', 'RAIN', 29),
(33, 'EEE200', ' Applied electricity  ', 3, '200 L', 'RAIN', 29),
(34, 'EEE202', '  Applied Electricity Lab.', 1, '200L', 'RAIN', 29),
(35, 'EEE204', ' Basic Electronics ', 3, '200L', 'RAIN', 29),
(36, 'EEE206', ' Basic Electronic Lab. ', 1, '200L', 'RAIN', 29),
(37, 'EEE232', ' Engineering Math II ', 3, '200L', 'RAIN', 29),
(38, 'GNS202', ' Minds Machines and Society ', 2, '200 L', 'RAIN', 29),
(39, 'GNS208', '  Family Marriage System and Kinship Structure in comparative perspectives', 2, '200 L', 'RAIN', 29),
(40, 'CSE301 ', ' Computer Programming I ', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(41, 'CSE303', ' Computer Logic I ', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(42, 'CSE305', ' Data Base Design and Managt. ', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(43, 'CSE307', ' Numerical Computation I', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(44, 'CSE311', ' Automata theory and computability', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(45, 'CSE331', ' Engineering Statistics', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(46, 'MTH203', ' Linear Algebra I ', 2, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(47, 'MTH307', ' Sets Logic and Algebra ', 3, '300L (SCI. OPT.) ', ' HARMATTAN', 29),
(48, 'CSE302', ' Computer Programming II', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(49, 'CSE304', ' Computer Logic II ', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(50, 'CSE308', ' Assembly Language Programming ', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(51, 'CSE310', ' Numerical Computation II ', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(52, 'CSE312', ' Data Structures and Algorithms ', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(53, 'CSE314', ' Fundamentals of Software Engin.', 3, '300L (SCI. OPT.) ', 'RAIN', 29),
(54, 'MEE300', ' Mechanical Maintenance and Repairs ', 2, '300L (SCI. OPT.) ', 'RAIN', 29),
(55, 'CSE301', ' Computer Programming I ', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(56, 'CSE303', ' Computer Logic I ', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(57, 'CSE313', ' Network Analysis ', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(58, 'CSE309', ' Computer Engineer ing ', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(59, 'CSE331', ' Engineering Statistics ', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(60, 'EEE305', ' Electronic Engineering I', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(61, 'EEE309', ' Electronic Engineering Lab I', 1, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(62, 'MEE213', ' Engineering Mechanics', 3, '300L (ENG. OPT.) ', ' HARMATTAN', 29),
(63, 'CSE304', ' Computer Logic II ', 3, '300L (ENG. OPT.) ', ' RAIN', 29),
(64, 'CSE306', ' Digital Laboratory', 1, '300L (ENG. OPT.) ', ' RAIN', 29),
(65, 'CSE308', ' Assembly Language Programming ', 3, '300L (ENG. OPT.) ', ' RAIN', 29),
(66, 'CSE318', ' Measurements and Instrumentation', 3, '300L (ENG. OPT.) ', ' RAIN', 29),
(67, 'CSE316', ' Computer Engineering Laboratory ', 1, '300L (ENG. OPT.) ', ' RAIN', 29),
(68, 'EEE306', ' Electronic Engineering II ', 3, '300L (ENG. OPT.) ', ' RAIN', 29),
(69, 'EEE310', ' Electronic Engineering Lab II ', 1, '300L (ENG. OPT.) ', ' RAIN', 29),
(70, 'MEE332', ' Engineering Maths III ', 3, '300L (ENG. OPT.) ', ' RAIN', 29),
(71, 'EEE300', ' Mechanical Maintenance & Repairs', 2, '300L (ENG. OPT.) ', ' RAIN', 29),
(72, 'EEE214', ' Strength of Materials ', 2, '300L (ENG. OPT.) ', ' RAIN', 29),
(73, 'MEE216', ' Strength of Materials Lab.', 1, '300L (ENG. OPT.) ', ' RAIN', 29);

-- --------------------------------------------------------

--
-- Table structure for table `course_form`
--

DROP TABLE IF EXISTS `course_form`;
CREATE TABLE IF NOT EXISTS `course_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `add_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_form`
--

INSERT INTO `course_form` (`id`, `student_id`, `course_id`, `add_date`) VALUES
(1, '200001', 9, 'Feb 24, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `Dept_id` int(11) NOT NULL,
  `Dept_Name` varchar(255) NOT NULL,
  `Faculty_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`Dept_id`, `Dept_Name`, `Faculty_id`) VALUES
(1, 'Department of Medical Microbiology and Pathology', 1),
(2, 'Department of Physiology', 1),
(3, 'Department of Nursing', 1),
(4, 'Department of Bio-Chemistry', 1),
(5, 'Department of Medical Science Laboratory', 1),
(6, 'Department of Morbid Anatomy / Histo-pathology', 1),
(7, 'Department of Haematology and Blood Transfusion', 1),
(8, 'Department of Chemical Pathology', 1),
(9, 'Department of Medicine', 2),
(10, 'Department of Surgery', 2),
(11, 'Department Radiology', 2),
(12, 'Department of Paediatrics', 2),
(13, 'Department of Obstetrics', 2),
(14, 'Department of Ophthalmologya', 2),
(15, 'Department of Psychiatry', 2),
(16, 'Department of Oto-Rhino Zarincology', 2),
(17, 'Department of Anaesthesia', 2),
(18, 'Department of Agricultural Economics', 3),
(19, 'Department of Agricultural Extension and Rural Development', 3),
(20, 'Department of Crop Production and Soil Science', 3),
(21, 'Department of Crop and Environmental Protection', 3),
(22, 'Department of Animal Nutrition and Bio-Technology', 3),
(23, 'Department of Animal Production and Health', 3),
(24, 'Department of Architecture', 4),
(25, 'Department of Fine and Applied Arts', 4),
(26, 'Department of Urban and Regional Planning', 4),
(27, 'Department of Chemical Engineering', 5),
(28, 'Department of Civil Engineering', 5),
(29, 'Department of Computer Science and Engineering', 5),
(30, 'Department of Electronic and Electrical Engineering', 5),
(31, 'Department of Food Science and Engineering', 5),
(32, 'Department of Mechanical Engineering', 5),
(33, 'Department of Agricultural Engineering', 5),
(34, 'Department of Pure and Applied Biology', 6),
(35, 'Department of Pure and Applied Chemistry', 6),
(36, 'Department of Pure and Applied Mathematics', 6),
(37, 'Department of pure and Applied Physics', 6),
(38, 'Department of General Studies', 6),
(39, 'Department of Earth Science', 6),
(40, 'Department of Science Laboratory Technology', 6),
(41, 'Department of Management and Accounting', 7),
(42, 'Department of Transport Management', 7);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
CREATE TABLE IF NOT EXISTS `exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `exam_type` varchar(11) NOT NULL,
  `exam_number` varchar(11) NOT NULL,
  `exam_date` varchar(15) NOT NULL,
  `subject1` varchar(20) NOT NULL,
  `subject2` varchar(20) NOT NULL,
  `subject3` varchar(20) NOT NULL,
  `subject4` varchar(20) NOT NULL,
  `subject5` varchar(20) NOT NULL,
  `grade_score1` varchar(10) NOT NULL,
  `grade_score2` varchar(10) NOT NULL,
  `grade_score3` varchar(10) NOT NULL,
  `grade_score4` varchar(10) NOT NULL,
  `grade_score5` varchar(10) NOT NULL,
  `add_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `Faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `Faculty_name` varchar(255) NOT NULL,
  PRIMARY KEY (`Faculty_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_id`, `Faculty_name`) VALUES
(1, 'Basic Medical Sciences'),
(2, ' Clinical Sciences'),
(3, 'Agricultural Sciences'),
(4, 'Environment Sciences'),
(5, 'Engineering and Technology'),
(6, 'Pure and Applied Sciences'),
(7, 'Management Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level_name`) VALUES
(1, '100L'),
(2, '200L\r\n'),
(3, '300L'),
(4, '400L'),
(5, '500L');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

DROP TABLE IF EXISTS `result`;
CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_unit` varchar(100) NOT NULL,
  `exam_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `student_id`, `session`, `faculty`, `dept`, `semester`, `level`, `course_title`, `course_code`, `course_unit`, `exam_score`) VALUES
(1, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Mathematics I', 'MTH101', '5', 56),
(2, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Physics I', 'PHY101', '4', 54),
(3, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental Physics I', 'PHY103', '1', 54),
(4, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Chemistry I', 'CHM101', '4', 56),
(5, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental ChemistryI', 'CHM103', '1', 45),
(6, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Biology I', 'BIO101', '3', 56),
(7, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental Biology', 'BIO103', '1', 56),
(8, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Basics of Drawing', 'FAA101', '2', 34),
(9, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Use of English I', 'GNS101', '2', 32),
(10, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Use of Library', 'LIB101', '1', 39);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `upl` varchar(200) NOT NULL,
  `matric_no` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `add_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

DROP TABLE IF EXISTS `test_result`;
CREATE TABLE IF NOT EXISTS `test_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(100) NOT NULL,
  `session` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_code` varchar(100) NOT NULL,
  `course_unit` int(11) NOT NULL,
  `test_score` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`id`, `matric_no`, `session`, `faculty`, `dept`, `semester`, `level`, `course_title`, `course_code`, `course_unit`, `test_score`) VALUES
(1, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Mathematics I', 'MTH101', 5, 24),
(2, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Physics I', 'PHY101', 4, 25),
(3, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental Physics I', 'PHY103', 1, 35),
(4, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Chemistry I', 'CHM101', 4, 24),
(5, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental ChemistryI', 'CHM103', 1, 23),
(6, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'General Biology I', 'BIO101', 3, 22),
(7, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Experimental Biology', 'BIO103', 1, 21),
(8, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Basics of Drawing', 'FAA101', 2, 23),
(9, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Use of English I', 'GNS101', 2, 32),
(10, '200001', '2018/2019', 'Engineering and Technology', 'Department of Computer Science and Engineering', 'HARMATTAN', '100L', 'Use of Library', 'LIB101', 1, 39);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
