-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 08:50 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertData` (IN `faculties_name` VARCHAR(50), IN `note` VARCHAR(100))  BEGIN
	insert into facuties_tbl(faculties_name,note) values (faculties_name,note);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `article_tbl`
--

CREATE TABLE `article_tbl` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `loca_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `status` char(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_tbl`
--

INSERT INTO `article_tbl` (`a_id`, `loca_id`, `title`, `content`, `status`, `note`) VALUES
(5, 2, 'goog', 'nice topic', 'Public', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `facuties_tbl`
--

CREATE TABLE `facuties_tbl` (
  `faculties_id` int(10) UNSIGNED NOT NULL,
  `faculties_name` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facuties_tbl`
--

INSERT INTO `facuties_tbl` (`faculties_id`, `faculties_name`, `note`) VALUES
(4, 'CSE', 'Computer Science & Engg');

-- --------------------------------------------------------

--
-- Table structure for table `location_tb`
--

CREATE TABLE `location_tb` (
  `loca_id` int(10) UNSIGNED NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `note` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_tb`
--

INSERT INTO `location_tb` (`loca_id`, `l_name`, `description`, `note`) VALUES
(2, 'doddballapur', 'oracle ', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `stu_score_tbl`
--

CREATE TABLE `stu_score_tbl` (
  `ss_id` int(10) UNSIGNED NOT NULL,
  `stu_id` int(10) NOT NULL,
  `faculties_id` int(10) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `ia1` int(11) NOT NULL,
  `ia2` int(11) NOT NULL,
  `ia3` int(11) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_score_tbl`
--

INSERT INTO `stu_score_tbl` (`ss_id`, `stu_id`, `faculties_id`, `sub_id`, `ia1`, `ia2`, `ia3`, `note`) VALUES
(114, 1, 4, 13, 29, 30, 28, ''),
(115, 2, 4, 14, 24, 20, 21, '');

-- --------------------------------------------------------

--
-- Table structure for table `stu_tbl`
--

CREATE TABLE `stu_tbl` (
  `stu_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_tbl`
--

INSERT INTO `stu_tbl` (`stu_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `phone`, `email`, `note`) VALUES
(1, 'NIKHIL', 'GR', 'Male', '1999-03-09', 'DODDABALLAPUR', 'DODDABALLAPUR', '7899979749', 'nikhilgubbi@gmail.com  ', 'student'),
(2, 'MADHUSUDHAN', 'MU', 'Male', '1999-09-28', 'DODDABALLPUR', 'DODDABELAVANGALA', '9113992200', 'madhukohli@gmail.com ', 'student'),
(3, 'RAGHAVENDRA', 'DC', 'Male', '1999-09-14', 'DODDABALLAPUR', 'DODDABALLAPUR', '8892465672', 'raghuharsh@gmail.com  ', 'student'),
(4, 'MANJU', 'H', 'Male', '1999-02-02', 'DODDABALLAPUR', 'DODDABALLAPUR', '9986037547', 'manjusdupuc@gmail.com  ', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `sub_tbl`
--

CREATE TABLE `sub_tbl` (
  `sub_id` int(10) UNSIGNED NOT NULL,
  `faculties_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_tbl`
--

INSERT INTO `sub_tbl` (`sub_id`, `faculties_id`, `teacher_id`, `semester`, `sub_name`, `note`) VALUES
(13, 4, 14, '5TH', 'M&E', ''),
(14, 4, 15, '5TH', 'CN', ''),
(15, 4, 16, '5TH', 'DBMS', ''),
(16, 4, 17, '5TH', 'ATC', ''),
(17, 4, 18, '5TH', 'J2EE', ''),
(18, 4, 19, '5TH', 'AI', ''),
(19, 4, 19, '5TH', 'AI', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_tbl`
--

CREATE TABLE `teacher_tbl` (
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` char(10) NOT NULL,
  `dob` date NOT NULL,
  `pob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `salary` float NOT NULL,
  `married` char(10) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_tbl`
--

INSERT INTO `teacher_tbl` (`teacher_id`, `f_name`, `l_name`, `gender`, `dob`, `pob`, `address`, `degree`, `salary`, `married`, `phone`, `email`, `note`) VALUES
(14, 'SRINATH', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', ''),
(15, 'VENKATESH', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', ''),
(16, 'PRADEEP', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', ''),
(17, 'SESHAIH', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', ''),
(18, 'VINUTHA', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', ''),
(19, 'AJAY', '', 'Male', '0000-00-00', '', '', '------------ Select ------------', 0, 'Yes', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(8, 'nikhil', 'nikhil@123', 'admin', 'creator'),
(9, 'madhu', 'madhu@123', 'admin', 'creator');

--
-- Triggers `users_tbl`
--
DELIMITER $$
CREATE TRIGGER `after_users_insert` AFTER INSERT ON `users_tbl` FOR EACH ROW BEGIN
insert into users_tbl_backup values(NEW.u_id, NEW.username, NEw.password, NEw.type, NEW.note);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl_backup`
--

CREATE TABLE `users_tbl_backup` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` char(10) NOT NULL,
  `note` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl_backup`
--

INSERT INTO `users_tbl_backup` (`u_id`, `username`, `password`, `type`, `note`) VALUES
(8, 'nikhil', 'nikhil@123', 'admin', 'creator'),
(9, 'madhu', 'madhu@123', 'admin', 'creator'),
(10, 'raghu', 'raghu@123', 'admin', 'friend');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_tbl`
--
ALTER TABLE `article_tbl`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  ADD PRIMARY KEY (`faculties_id`);

--
-- Indexes for table `location_tb`
--
ALTER TABLE `location_tb`
  ADD PRIMARY KEY (`loca_id`);

--
-- Indexes for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_tbl_backup`
--
ALTER TABLE `users_tbl_backup`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_tbl`
--
ALTER TABLE `article_tbl`
  MODIFY `a_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facuties_tbl`
--
ALTER TABLE `facuties_tbl`
  MODIFY `faculties_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `location_tb`
--
ALTER TABLE `location_tb`
  MODIFY `loca_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stu_score_tbl`
--
ALTER TABLE `stu_score_tbl`
  MODIFY `ss_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `stu_tbl`
--
ALTER TABLE `stu_tbl`
  MODIFY `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_tbl`
--
ALTER TABLE `sub_tbl`
  MODIFY `sub_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teacher_tbl`
--
ALTER TABLE `teacher_tbl`
  MODIFY `teacher_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_tbl_backup`
--
ALTER TABLE `users_tbl_backup`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
