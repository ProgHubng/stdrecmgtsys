-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 11:23 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `join_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `join_date`) VALUES
('4', 'Environment Sciences'

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `student_id`, `sex`, `birth`, `state`, `lga`, `town`, `addr`) VALUES
(1, 1, 'Male', '1 Jan,1995', 'Osun', 'iwo local government', 'iwo', 'iwo osun state, Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_title`, `course_code`, `semester`, `level`, `unit`) VALUES
(1, 'introduction to computing', 'com101', 1, 1, 3),
(2, 'introduction to programing', 'com113', 1, 1, 3),
(3, 'logical and linear algebera', 'mth111', 1, 1, 2),
(4, 'technicl english I', 'otm112', 1, 1, 3),
(5, 'descriptive statistic', 'sta111', 1, 1, 3),
(6, 'elementry probability theory', 'sta112', 1, 1, 3),
(7, 'introduction to digital electronics', 'com112', 1, 1, 3),
(8, 'scientifc programming language using java', 'com121', 1, 1, 3),
(9, 'introduction to internet', 'com122', 2, 1, 3),
(10, 'computer package I', 'com123', 2, 1, 3),
(11, 'introduction to enterprenuership', 'eed126', 2, 1, 2),
(12, 'function and geometry', 'mth112', 2, 1, 3),
(13, 'data structure and algorithm', 'com124', 2, 1, 4),
(14, 'introduction to system analysis', 'com125', 1, 2, 3),
(15, 'pc upgrade and maintainance', 'com126', 1, 2, 3),
(16, 'citizen education I', 'gns128', 1, 2, 2),
(17, 'technical english II', 'otm216', 1, 2, 3),
(18, 'introdcution to oo fortran ', 'com127', 1, 2, 3),
(19, 'introduction to system programming', 'com212', 1, 2, 3),
(20, 'commercial programming language using cobol', 'com213', 2, 2, 3),
(21, 'file organuzation and management', 'com214', 2, 2, 3),
(22, 'practical of enterpreuership ', 'eed216', 2, 2, 3),
(23, 'computer programming usin visual basic', 'com211', 2, 2, 3),
(24, 'computer package II', 'com215', 2, 2, 3),
(25, 'computer system troubleshooting', 'com216', 2, 2, 3),
(26, 'hardware maintainance', 'com223', 0, 0, 3),
(27, 'computer programming using visual Dbasic', 'com221', 0, 0, 3),
(28, 'seminar on computer and society', 'com222', 0, 0, 2),
(29, 'web technology', 'com225', 0, 0, 3),
(30, 'computer troubleshooting II', 'com226', 0, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `course_form`
--

CREATE TABLE IF NOT EXISTS `course_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `add_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `course_form`
--

INSERT INTO `course_form` (`id`, `student_id`, `course_id`, `add_date`) VALUES
(1, 1, 6, 'Dec 14, 2017'),
(2, 1, 6, 'Dec 14, 2017'),
(3, 1, 2, 'Dec 14, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `student_id`, `exam_type`, `exam_number`, `exam_date`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `grade_score1`, `grade_score2`, `grade_score3`, `grade_score4`, `grade_score5`, `add_date`) VALUES
(1, 1, 'neco', '50657409ic', '15 Nov,2000', 'Mathematics', 'English Language', 'Physics', 'Biology', 'Chemistry', 'B2', 'B3', 'C4', 'A1', 'C4', '14 Dec, 2017');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

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
  `semester` int(11) NOT NULL,
  `add_date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `upl`, `matric_no`, `fname`, `password`, `email`, `phone`, `dept`, `level`, `semester`, `add_date`) VALUES
(1, '5a31c2f673786IMG_20150719_131554.jpg', 'cs201400347', 'adekunle adebowale', 'cs201400347', 'adekunmle20@gmail.com', '08146574164', 'Computer Science', 'ND 1 FT', 1, '14 Dec, 2017');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
