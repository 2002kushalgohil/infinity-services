-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2022 at 12:32 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infinity`
--
CREATE DATABASE IF NOT EXISTS `infinity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `infinity`;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `service` varchar(25) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `complaint` text NOT NULL,
  `cdate` date NOT NULL,
  `ctime` time NOT NULL,
  KEY `service` (`service`),
  KEY `uname` (`uname`),
  KEY `sname` (`sname`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `stype` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `password`, `stype`) VALUES
(143, 'abdul', '11', 'sp'),
(140, 'abhi', '11', 'sp'),
(146, 'aishwarya', '11', 'sp'),
(150, 'anamika', '11', 'user'),
(141, 'dev', '11', 'sp'),
(151, 'gopal', '11', 'user'),
(144, 'john', '11', 'user'),
(145, 'karishma', '11', 'sp'),
(147, 'krish', '11', 'sp'),
(152, 'madhav', '11', 'user'),
(149, 'pinky', '11', 'sp'),
(139, 'raj', '11', 'user'),
(142, 'rocky', '11', 'sp'),
(138, 'varun', '11', 'sp'),
(148, 'vikram', '11', 'sp');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `sid` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `accept_status` varchar(25) NOT NULL,
  `pay_status` varchar(25) NOT NULL,
  `ratings` int(11) NOT NULL,
  `adate` date NOT NULL,
  `atime` time NOT NULL,
  KEY `fk_sname` (`sname`),
  KEY `fk_service` (`service`),
  KEY `fk_uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sproviders`
--

CREATE TABLE IF NOT EXISTS `sproviders` (
  `id` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `smail` varchar(50) NOT NULL,
  `smob` bigint(20) NOT NULL,
  `serv` varchar(50) NOT NULL,
  `slocation` varchar(25) DEFAULT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `scharges` int(70) NOT NULL,
  `sdesc` text NOT NULL,
  UNIQUE KEY `smail` (`smail`),
  UNIQUE KEY `sname` (`sname`),
  UNIQUE KEY `fk_service` (`serv`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sproviders`
--

INSERT INTO `sproviders` (`id`, `sname`, `smail`, `smob`, `serv`, `slocation`, `stime`, `etime`, `scharges`, `sdesc`) VALUES
(143, 'abdul karim', 'abd360@yahoo.com', 9154654798, 'Mechanic ', 'shrirampur', '09:00:00', '21:00:00', 15, 'I am professional mechanic with expertise in heavy vehical auto works'),
(146, 'aishwarya kapoor', 'aish784@gmail.com', 7850431254, 'Makeup artist', 'mumbai', '10:00:00', '15:00:00', 150, 'an professional makeup artist'),
(141, 'dev varma', 'dev@gmail.com', 9158848876, 'Pet sitting', 'shrirampur', '09:00:00', '17:00:00', 60, 'an animal lover and pet sitter'),
(147, 'krishna chakraborthy', 'krish267@gmail.com', 9164578542, 'Electrician', 'shrirampur', '08:00:00', '20:00:00', 45, 'An IIT graduate professional in electricals with experience of 3 years'),
(149, 'pinky m malhotra', 'pinky@gmail.com', 7040023999, 'Doctor', 'pune', '09:00:00', '19:00:00', 40, 'an M.D. in orthopedics from british university london'),
(138, 'varun anand', 'raj343@gmail.com', 9552726547, 'Advocate', 'shrirampur', '09:00:00', '13:30:00', 340, 'an experienced advocate in prominent of civil cases'),
(142, 'rocky singhania', 'rocks@rohit.com', 9646751414, 'Fitness trainer', 'mumbai', '07:00:00', '09:30:00', 25, 'an owner and trainer of fast & furious gym ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `umob` bigint(20) NOT NULL,
  `location` varchar(25) DEFAULT NULL,
  UNIQUE KEY `uname` (`uname`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `umail`, `umob`, `location`) VALUES
(150, 'anamika khanna', 'anu@anu.com', 9145247264, 'pune'),
(151, 'gopal dhamaal', 'gopueda@rohit.com', 7464199541, 'mumbai'),
(144, 'john yacruise', 'johny24@hotmail.com', 9169368420, 'pune'),
(152, 'madhav dhamaal', 'madhu@rohit.com', 9856318979, 'mumbai'),
(139, 'raj malhotra', 'raj123@gmail.com', 9152014365, 'shrirampur');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `fk_serve` FOREIGN KEY (`service`) REFERENCES `sproviders` (`serv`),
  ADD CONSTRAINT `fk_sname` FOREIGN KEY (`sname`) REFERENCES `sproviders` (`sname`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_uid` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_uname` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`service`) REFERENCES `sproviders` (`serv`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_sname2` FOREIGN KEY (`sname`) REFERENCES `sproviders` (`sname`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_uname2` FOREIGN KEY (`uname`) REFERENCES `users` (`uname`) ON DELETE CASCADE;

--
-- Constraints for table `sproviders`
--
ALTER TABLE `sproviders`
  ADD CONSTRAINT `sproviders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `login` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
