-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2016 at 12:50 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `addclass`
--

CREATE TABLE `addclass` (
  `class_id` int(20) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `numeric_no` varchar(15) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addclass`
--

INSERT INTO `addclass` (`class_id`, `class_name`, `numeric_no`, `created`, `updated`, `deleted`) VALUES
(24, 'Six', '6', '2016-09-04', NULL, NULL),
(25, 'Seven', '7', '2016-09-04', NULL, NULL),
(26, 'Eight', '8', '2016-09-04', NULL, NULL),
(27, 'Nine', '9', '2016-09-04', NULL, NULL),
(28, 'Ten', '10', '2016-09-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addfees`
--

CREATE TABLE `addfees` (
  `fees_id` int(20) NOT NULL,
  `fees_name` varchar(255) NOT NULL,
  `fees_amount` varchar(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL,
  `updated` varchar(50) NOT NULL,
  `deleted` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addfees`
--

INSERT INTO `addfees` (`fees_id`, `fees_name`, `fees_amount`, `month`, `year`, `created`, `updated`, `deleted`) VALUES
(1, 'Registration Fees', '800', '', '', '', '', ''),
(2, 'Form Fee ', '100', '', '', '', '', ''),
(3, 'Exam Fees', '500', '', '', '', '', ''),
(4, 'Others', '200', '', '', '', '', ''),
(5, 'Monthly Fee (Six)', '100', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `addfeescollection`
--

CREATE TABLE `addfeescollection` (
  `stdfees_id` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `section_id` int(20) NOT NULL,
  `roll_no` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL,
  `fees_id` int(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `totalAmount` double NOT NULL,
  `paidamount` varchar(20) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addfeescollection`
--

INSERT INTO `addfeescollection` (`stdfees_id`, `class_id`, `section_id`, `roll_no`, `exam_id`, `fees_id`, `amount`, `totalAmount`, `paidamount`, `month`, `year`, `created`) VALUES
(1, 24, 15, 1, 6, 1, '800', 900, '850', 'December', '2016', '05-12-2016'),
(2, 24, 15, 1, 6, 2, '100', 900, '850', 'December', '2016', '05-12-2016'),
(3, 24, 15, 1, 7, 3, '500', 700, '500', 'December', '2016', '05-12-2016'),
(4, 24, 15, 1, 7, 4, '200', 700, '500', 'December', '2016', '05-12-2016'),
(5, 24, 8, 1, 6, 3, '500', 500, '400', 'December', '2016', '05-12-2016'),
(6, 24, 15, 1, 6, 3, '500', 500, '350', 'December', '2016', '05-12-2016'),
(7, 24, 15, 1, 6, 4, '200', 0, '', 'December', '2016', '05-12-2016'),
(8, 24, 15, 1, 6, 3, '500', 0, '', 'December', '2016', '05-12-2016'),
(9, 24, 15, 1, 6, 2, '100', 0, '', 'December', '2016', '05-12-2016'),
(10, 28, 6, 1, 6, 1, '800', 0, '', 'December', '2016', '06-12-2016'),
(11, 28, 6, 1, 6, 2, '100', 0, '', 'December', '2016', '06-12-2016'),
(12, 24, 15, 1, 6, 4, '200', 0, '', 'December', '2016', '06-12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `addroutine`
--

CREATE TABLE `addroutine` (
  `routine_id` int(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `section_id` int(20) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `teacher_id` int(50) NOT NULL,
  `day` int(100) NOT NULL,
  `time_from` int(100) NOT NULL,
  `time_to` int(100) NOT NULL,
  `campus_name` int(255) NOT NULL,
  `room_no` int(20) NOT NULL,
  `month` varchar(100) NOT NULL,
  `created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addroutine`
--

INSERT INTO `addroutine` (`routine_id`, `year`, `class_id`, `section_id`, `subject_id`, `teacher_id`, `day`, `time_from`, `time_to`, `campus_name`, `room_no`, `month`, `created`) VALUES
(1, '2016', 24, 15, 1, 5, 1, 1, 1, 4, 7, 'December', '07-12-2016'),
(2, '2016', 24, 15, 2, 6, 2, 1, 1, 4, 7, 'December', '07-12-2016'),
(3, '2016', 24, 15, 7, 4, 1, 2, 2, 4, 8, 'December', '07-12-2016'),
(4, '2016', 24, 15, 7, 4, 5, 1, 1, 4, 7, 'December', '07-12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `addsection`
--

CREATE TABLE `addsection` (
  `section_id` int(20) NOT NULL,
  `class_id` int(15) NOT NULL,
  `teacher_id` int(15) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsection`
--

INSERT INTO `addsection` (`section_id`, `class_id`, `teacher_id`, `section_name`, `created`, `updated`, `deleted`) VALUES
(6, 28, 3, 'Science', '2016-09-04', NULL, NULL),
(7, 28, 4, 'Commerce', '2016-09-04', NULL, NULL),
(8, 24, 5, 'A', '2016-09-04', NULL, NULL),
(10, 25, 7, 'A', '2016-09-04', NULL, NULL),
(15, 24, 8, 'B', '2016-10-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addstudent`
--

CREATE TABLE `addstudent` (
  `student_id` int(20) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `guardian_name` varchar(150) NOT NULL,
  `class_id` int(15) NOT NULL,
  `section_id` int(15) NOT NULL,
  `roll_no` varchar(15) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `year` varchar(20) NOT NULL,
  `month` varchar(20) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addstudent`
--

INSERT INTO `addstudent` (`student_id`, `student_name`, `guardian_name`, `class_id`, `section_id`, `roll_no`, `birthday`, `gender`, `address`, `phone`, `email`, `password`, `photo`, `year`, `month`, `created`, `updated`, `deleted`) VALUES
(3, 'student1', 'Md. x', 28, 6, '1', '09/04/2016', 'Male', 'Dhaka', '0178965362', 'student1@gmail.com', '123', 'BCA160904030910.jpg', '2016', 'September', '2016-09-04', NULL, NULL),
(4, 'student2', 'Md. Y', 24, 8, '1', '09/04/2016', 'Female', 'Khulna', '01285962', 'student2@gmail.com', '159', 'BCA160904030909.jpg', '2016', 'September', '2016-09-04', NULL, NULL),
(5, 'student3', 'Md. Z', 28, 6, '2', '09/05/2016', 'Male', 'Chittagong', '0125896', 'student3@gmail.com', '123', 'BCA160905060929.png', '2016', 'September', '2016-09-05', NULL, NULL),
(6, 'Student 4', 'Parent', 28, 6, '3', '09/06/2016', 'Male', 'Dhaka', '0125896', 'student4@gmail.com', '123', 'BCA160906120959.jpg', '2016', 'September', '2016-09-05', NULL, NULL),
(7, 'ali', 'ali Hossain', 24, 15, '1', '09/04/2016', 'Male', 'Dhaka', '01896532451', 'ali@gmail.com', '123', 'BCA161204031255.jpg', '2016', 'December', '2016-12-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addsubject`
--

CREATE TABLE `addsubject` (
  `subject_id` int(20) NOT NULL,
  `subject_name` varchar(150) NOT NULL,
  `class_id` int(15) NOT NULL,
  `teacher_id` int(15) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsubject`
--

INSERT INTO `addsubject` (`subject_id`, `subject_name`, `class_id`, `teacher_id`, `created`, `updated`, `deleted`) VALUES
(1, 'Bangla First Paper', 24, 5, '2016-09-04', NULL, NULL),
(2, 'Bangla Second Paper', 24, 6, '2016-09-04', NULL, NULL),
(3, 'Chemistry', 28, 9, '2016-09-05', NULL, NULL),
(5, 'Islamic Studies', 28, 7, '2016-09-05', NULL, NULL),
(6, 'ENGLISH FOR TODAY', 24, 10, '2016-09-21', NULL, NULL),
(7, 'Islamic Studies', 24, 4, '2016-12-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addteacher`
--

CREATE TABLE `addteacher` (
  `teacher_id` int(20) NOT NULL,
  `teacher_name` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addteacher`
--

INSERT INTO `addteacher` (`teacher_id`, `teacher_name`, `mobile`, `birthday`, `gender`, `email`, `password`, `address`, `photo`, `created`, `updated`, `deleted`) VALUES
(3, 'Md. Shahab uddin', '01703136868', '11/25/1994', 'Male', 'shahabuddinp91@gmail.com', '159', 'Dhaka', 'BCA160901060917.jpg', NULL, NULL, NULL),
(4, 'Md. Shuvo', '01684964913', '09/01/2016', 'Male', 'shuvohosen04@gmail.com', '123', 'Dhaka', 'BCA160901060938.jpg', NULL, NULL, NULL),
(5, 'Md Mahfuz Uddin', '0178', '08/29/2016', 'Male', 'teacher3@gmail.com', '123', 'Dhaka', 'BCA161002071027.jpg', NULL, NULL, NULL),
(6, 'Md Moin uddin', '01789', '10/01/2016', 'Male', 'teacher4@gmail.com', '123', 'Noakhali', 'BCA160903070943.jpg', NULL, NULL, NULL),
(7, 'Teacher 5', '01258', '09/03/2016', 'Male', 'teacher5@gmail.com', '1478', 'noakhali', 'BCA160903070906.png', NULL, NULL, NULL),
(8, 'Teacher 6', '01684964913', '09/02/2016', 'Male', 'teacher6@gmail.com', '125', 'Lakshmipur', 'BCA160903070921.png', NULL, NULL, NULL),
(9, 'Teacher 71', '017031368681', '09/01/2016', 'Female', 'teacher7@gmail.com', 'admin1', 'asdgfgfg', 'BCA160928070936.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `copyright`
--

CREATE TABLE `copyright` (
  `id` int(15) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copyright`
--

INSERT INTO `copyright` (`id`, `copyright`, `orgname`, `created`, `updated`, `deleted`) VALUES
(2, '2016 Copyright', 'Better Communication & Automation', '2016-08-28', NULL, NULL),
(3, '2015 Copyright', 'BCA', '2016-08-28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `examlist`
--

CREATE TABLE `examlist` (
  `exam_id` int(20) NOT NULL,
  `exam_name` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examlist`
--

INSERT INTO `examlist` (`exam_id`, `exam_name`, `date`, `comments`, `created`, `updated`, `deleted`) VALUES
(6, 'First Terminal Exam', '02/04/2016', 'Best Of Luck', '2016-09-04', NULL, NULL),
(7, 'Second Terminal Exam', '01/08/2016', 'Best Of Luck', '2016-09-04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gradelist`
--

CREATE TABLE `gradelist` (
  `grade_id` int(20) NOT NULL,
  `grade_name` varchar(100) NOT NULL,
  `grade_point` varchar(15) NOT NULL,
  `mark_from` varchar(20) NOT NULL,
  `mark_upto` varchar(20) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradelist`
--

INSERT INTO `gradelist` (`grade_id`, `grade_name`, `grade_point`, `mark_from`, `mark_upto`, `comments`, `created`, `updated`, `deleted`) VALUES
(1, 'A+', '5.00', '80', '100', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00'),
(2, 'A', '4.00', '70', '79', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00'),
(3, 'A-', '3.50', '60', '69', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00'),
(4, 'B', '3.00', '50', '59', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00'),
(5, 'C', '2.00', '40', '49', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00'),
(6, 'D', '1.00', '33', '39', 'Best Of Luck', '2016-09-05', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `managecampus`
--

CREATE TABLE `managecampus` (
  `campus_id` int(20) NOT NULL,
  `campusName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managecampus`
--

INSERT INTO `managecampus` (`campus_id`, `campusName`) VALUES
(4, 'Main Campus'),
(5, 'Mirpur Campus'),
(6, 'Paltan');

-- --------------------------------------------------------

--
-- Table structure for table `manageday`
--

CREATE TABLE `manageday` (
  `day_id` int(20) NOT NULL,
  `dayName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manageday`
--

INSERT INTO `manageday` (`day_id`, `dayName`) VALUES
(1, 'Saturday'),
(2, 'Sunday'),
(3, 'Monday'),
(4, 'Tuesday'),
(5, 'Wednesday'),
(6, 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `managemarks`
--

CREATE TABLE `managemarks` (
  `marks_id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `roll_no` int(20) NOT NULL,
  `class_id` int(20) NOT NULL,
  `section_id` int(20) NOT NULL,
  `subject_id` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL,
  `marks` varchar(50) NOT NULL,
  `letter_grade` varchar(50) NOT NULL,
  `grade_point` varchar(50) NOT NULL,
  `month` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managemarks`
--

INSERT INTO `managemarks` (`marks_id`, `student_id`, `roll_no`, `class_id`, `section_id`, `subject_id`, `exam_id`, `marks`, `letter_grade`, `grade_point`, `month`, `year`, `created`, `updated`, `deleted`) VALUES
(101, 3, 1, 28, 6, 3, 6, '40', 'C', '2.5', 'October', '2016', '2016-10-06', NULL, NULL),
(102, 5, 2, 28, 6, 3, 6, '70', 'A', '4', 'October', '2016', '2016-10-06', NULL, NULL),
(103, 6, 3, 28, 6, 3, 6, '70', 'A', '4', 'October', '2016', '2016-10-06', NULL, NULL),
(104, 4, 1, 24, 8, 1, 6, '77', 'A', '4', 'October', '2016', '2016-10-06', NULL, NULL),
(105, 4, 1, 24, 8, 2, 6, '56', 'B', '3', 'October', '2016', '2016-10-06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `managetime`
--

CREATE TABLE `managetime` (
  `time_id` int(20) NOT NULL,
  `time` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managetime`
--

INSERT INTO `managetime` (`time_id`, `time`, `period`) VALUES
(1, '08:00-09:00', '1'),
(2, '09:00-10:00', '2'),
(3, '10:00-11:00', '3'),
(4, '11:00-12:00', '4'),
(5, '12:00-01:00', '5'),
(7, '01:00-02:00', '6'),
(8, '02:00-3:00', '7'),
(9, '03:00-04:00', '8');

-- --------------------------------------------------------

--
-- Table structure for table `managevanu`
--

CREATE TABLE `managevanu` (
  `vanu_id` int(20) NOT NULL,
  `campus_id` int(20) NOT NULL,
  `roomno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managevanu`
--

INSERT INTO `managevanu` (`vanu_id`, `campus_id`, `roomno`) VALUES
(7, 4, '1st Floor (101)'),
(8, 4, '1st Floor (102)'),
(9, 5, '2nd Floor (201)'),
(10, 6, '2nd Floor (201)');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `notice_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `notice` text NOT NULL,
  `date` date NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL,
  `deleted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `routinecreate`
--

CREATE TABLE `routinecreate` (
  `routine_id` int(20) NOT NULL,
  `year` varchar(100) NOT NULL,
  `classname` varchar(100) NOT NULL,
  `section_id` varchar(100) NOT NULL,
  `subjectid` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routinecreate`
--

INSERT INTO `routinecreate` (`routine_id`, `year`, `classname`, `section_id`, `subjectid`) VALUES
(1, '2016', '24', '8', '1'),
(2, '2016', '28', '7', '3'),
(3, '2016', '24', '8', '1'),
(4, '2016', '24', '8', '1'),
(5, '2016', '24', 'Select One', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(15) NOT NULL,
  `versityname` varchar(255) NOT NULL,
  `title` varchar(225) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `enable` int(2) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `versityname`, `title`, `logo`, `enable`, `created`, `updated`, `deleted`) VALUES
(16, 'BCA University', 'Best of luck', 'BCA160828120822.png', 0, '2016-08-28', NULL, NULL),
(18, 'Bangladesh University', 'Best of luck', 'BCA160829070812.jpg', 1, '2016-08-29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(15) NOT NULL,
  `shortname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slider` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `shortname`, `title`, `slider`, `created`, `updated`, `deleted`) VALUES
(5, 'Flowers', 'Our Flowers', 'BCA160830050831.jpg', '2016-08-30', NULL, NULL),
(6, 'Birds', 'Our Birds', 'BCA160830050802.jpg', '2016-08-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stdpayments`
--

CREATE TABLE `stdpayments` (
  `pay_id` int(20) NOT NULL,
  `cls_id` int(20) NOT NULL,
  `sec_id` int(20) NOT NULL,
  `roll_no` int(20) NOT NULL,
  `exam_id` int(20) NOT NULL,
  `totalAmount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `paidAmount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dueAmount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stdpayments`
--

INSERT INTO `stdpayments` (`pay_id`, `cls_id`, `sec_id`, `roll_no`, `exam_id`, `totalAmount`, `paidAmount`, `dueAmount`, `status`, `month`, `year`, `created`) VALUES
(1, 24, 15, 1, 6, '2400', '2000', '400', 'Unpaid', 'December', '2016', '07-12-2016');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(15) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `title`, `description`, `name`, `created`, `updated`, `deleted`) VALUES
(2, 'Second Testimonial', ' Hi ProblemHi Problem Hi Problem Hi Problem Hi Problem Hi Problem Hi Problem', 'Rahim', '2016-08-31', NULL, NULL),
(4, 'Testimonial 1', '    I love you ', 'Karim 1', '2016-08-31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(15) NOT NULL,
  `user_level` varchar(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created` date DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `deleted` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_level`, `username`, `password`, `status`, `created`, `updated`, `deleted`) VALUES
(1, '1', 'admin', 'admin', 'active', '2016-08-27', NULL, NULL),
(2, '0', 's', 's', 'active', '2016-08-27', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addclass`
--
ALTER TABLE `addclass`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `addfees`
--
ALTER TABLE `addfees`
  ADD PRIMARY KEY (`fees_id`);

--
-- Indexes for table `addfeescollection`
--
ALTER TABLE `addfeescollection`
  ADD PRIMARY KEY (`stdfees_id`);

--
-- Indexes for table `addroutine`
--
ALTER TABLE `addroutine`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `addsection`
--
ALTER TABLE `addsection`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `addstudent`
--
ALTER TABLE `addstudent`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `addsubject`
--
ALTER TABLE `addsubject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `addteacher`
--
ALTER TABLE `addteacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `copyright`
--
ALTER TABLE `copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examlist`
--
ALTER TABLE `examlist`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `gradelist`
--
ALTER TABLE `gradelist`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `managecampus`
--
ALTER TABLE `managecampus`
  ADD PRIMARY KEY (`campus_id`);

--
-- Indexes for table `manageday`
--
ALTER TABLE `manageday`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `managemarks`
--
ALTER TABLE `managemarks`
  ADD PRIMARY KEY (`marks_id`);

--
-- Indexes for table `managevanu`
--
ALTER TABLE `managevanu`
  ADD PRIMARY KEY (`vanu_id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `routinecreate`
--
ALTER TABLE `routinecreate`
  ADD PRIMARY KEY (`routine_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `stdpayments`
--
ALTER TABLE `stdpayments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addclass`
--
ALTER TABLE `addclass`
  MODIFY `class_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `addfees`
--
ALTER TABLE `addfees`
  MODIFY `fees_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `addfeescollection`
--
ALTER TABLE `addfeescollection`
  MODIFY `stdfees_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `addroutine`
--
ALTER TABLE `addroutine`
  MODIFY `routine_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `addsection`
--
ALTER TABLE `addsection`
  MODIFY `section_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `addstudent`
--
ALTER TABLE `addstudent`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `addsubject`
--
ALTER TABLE `addsubject`
  MODIFY `subject_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `addteacher`
--
ALTER TABLE `addteacher`
  MODIFY `teacher_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `copyright`
--
ALTER TABLE `copyright`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `examlist`
--
ALTER TABLE `examlist`
  MODIFY `exam_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gradelist`
--
ALTER TABLE `gradelist`
  MODIFY `grade_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `managecampus`
--
ALTER TABLE `managecampus`
  MODIFY `campus_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `manageday`
--
ALTER TABLE `manageday`
  MODIFY `day_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `managemarks`
--
ALTER TABLE `managemarks`
  MODIFY `marks_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `managevanu`
--
ALTER TABLE `managevanu`
  MODIFY `vanu_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `notice_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `routinecreate`
--
ALTER TABLE `routinecreate`
  MODIFY `routine_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stdpayments`
--
ALTER TABLE `stdpayments`
  MODIFY `pay_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
