-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2022 at 11:01 AM
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
  `password` varchar(8) NOT NULL,
  `stype` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `password` (`password`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `password`, `stype`) VALUES
(102, 'admin', '123', 'admin'),
(101, 'varun', '1234', 'sp');

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
  UNIQUE KEY `smail` (`smail`),
  UNIQUE KEY `sname` (`sname`),
  UNIQUE KEY `fk_service` (`serv`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sproviders`
--

INSERT INTO `sproviders` (`id`, `sname`, `smail`, `smob`, `serv`, `slocation`, `stime`, `etime`, `scharges`) VALUES
(101, 'varun anand', 'varunraj82786@gmail.com', 9552726547, 'Advocate', '`Ahmednagar', '09:00:00', '13:30:00', 399);

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
