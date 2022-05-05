-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220429.4ad66f464f
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 07:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infinity`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `stype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_id`, `password`, `stype`) VALUES
(143, 'abdul', '11', 'sp'),
(140, 'abhi', '11', 'sp'),
(146, 'aishwarya', '11', 'sp'),
(150, 'anamika', '11', 'user'),
(158, 'demo', '11', 'sp'),
(141, 'dev', '11', 'sp'),
(151, 'gopal', '11', 'user'),
(144, 'john', '11', 'user'),
(145, 'karishma', '11', 'sp'),
(147, 'krish', '11', 'sp'),
(157, 'kushal', '11', 'admin'),
(152, 'madhav', '11', 'user'),
(149, 'pinky', '11', 'sp'),
(139, 'raj', '11', 'user'),
(142, 'rocky', '11', 'sp'),
(154, 'rudisn', '11', 'user'),
(156, 'ss', '11', 'sp'),
(138, 'varun', '11', 'sp'),
(148, 'vikram', '11', 'sp');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serv_id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `sp_id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `serv` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `serv_status` varchar(50) NOT NULL,
  `ratings` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `rtime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serv_id`, `usr_id`, `sp_id`, `sname`, `serv`, `uname`, `location`, `serv_status`, `ratings`, `rdate`, `rtime`) VALUES
(124, 144, 143, 'Abdul karim', 'Mechanic', 'John yacruise', 'pune', 'Paid', 3, '2022-05-05', '00:00:00'),
(125, 150, 140, 'Abhinav bankar', 'Mechanic', 'Anamika khanna', 'pune', 'Paid', 2, '2022-05-12', '18:14:00'),
(126, 151, 141, 'Dev varma', 'Pet sitting', 'Gopal dhamaal', 'mumbai', 'UnPaid', 0, '2022-05-05', '18:46:00'),
(127, 151, 138, 'Varun anand', 'Advocate', 'Gopal dhamaal', 'mumbai', 'Requested', 0, '2022-05-05', '20:47:00'),
(128, 154, 148, 'Vikram bajaj', 'Advocate', 'Rudisn', 'Shr', 'Requested', 0, '2022-05-05', '18:46:00'),
(129, 151, 145, 'Karishma patil', 'Makeup artist', 'Gopal dhamaal', 'mumbai', 'Requested', 0, '2022-05-20', '22:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `sproviders`
--

CREATE TABLE `sproviders` (
  `id` int(10) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `smail` varchar(50) NOT NULL,
  `smob` bigint(20) NOT NULL,
  `serv` varchar(50) NOT NULL,
  `slocation` varchar(25) DEFAULT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `scharges` int(70) NOT NULL,
  `sdesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sproviders`
--

INSERT INTO `sproviders` (`id`, `sname`, `smail`, `smob`, `serv`, `slocation`, `stime`, `etime`, `scharges`, `sdesc`) VALUES
(156, 'ss', 'a@a.com', 8888888888, 'Doctor', 'Delhi', '09:18:00', '09:17:00', 999, 'dsdsd'),
(143, 'Abdul karim', 'abd360@yahoo.com', 9154654798, 'Mechanic', 'Shrirampur', '09:00:00', '21:00:00', 15, 'I am professional mechanic with expertise in heavy vehical auto works'),
(140, 'Abhinav bankar', 'abhi777@gmail.com', 9156788654, 'Mechanic', 'Pune', '09:00:00', '16:00:00', 350, 'An experienced car mechanic at BMW'),
(146, 'Aishwarya kapoor', 'aish784@gmail.com', 7850431254, 'Makeup artist', 'Mumbai', '10:00:00', '15:00:00', 150, 'an professional makeup artist'),
(158, 'Demo name', 'd@d.com', 8888888888, 'Fitness trainer', 'Pune', '14:41:00', '14:41:00', 55, 'hjasdjhadsjygasdjygasdjygdjgyasfddfja'),
(141, 'Dev varma', 'dev@gmail.com', 9158848876, 'Pet sitting', 'Shrirampur', '09:00:00', '17:00:00', 60, 'an animal lover and pet sitter'),
(145, 'Karishma patil', 'kpatil@yahoo.com', 9531476454, 'Makeup artist', 'Baramati', '11:00:00', '16:00:00', 150, 'a professional makeup artist and ex-makeup artist of rk studios'),
(147, 'Krishna chakraborthy', 'krish267@gmail.com', 9164578542, 'Electrician', 'Shrirampur', '08:00:00', '20:00:00', 45, 'An IIT graduate professional in electricals with experience of 3 years'),
(149, 'Pinky m malhotra', 'pinky@gmail.com', 7040023999, 'Doctor', 'Pune', '09:00:00', '19:00:00', 40, 'an M.D. in orthopedics from british university london'),
(138, 'Varun anand', 'raj343@gmail.com', 9552726547, 'Advocate', 'Shrirampur', '09:00:00', '13:30:00', 340, 'an experienced advocate in prominent of civil cases'),
(142, 'Rocky singhania', 'rocks@rohit.com', 9646751414, 'Fitness trainer', 'Mumbai', '07:00:00', '09:30:00', 25, 'an owner and trainer of fast & furious gym '),
(148, 'Vikram bajaj', 'vbajaj12@gmail.com', 9154778985, 'Advocate', 'Nagpur', '10:00:00', '14:00:00', 450, 'civil lawyer as a consultant to MNCs');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `umail` varchar(50) NOT NULL,
  `umob` bigint(20) NOT NULL,
  `location` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `umail`, `umob`, `location`) VALUES
(150, 'Anamika khanna', 'anu@anu.com', 9145247264, 'Pune'),
(151, 'Gopal dhamaal', 'gopueda@rohit.com', 7464199541, 'Mumbai'),
(144, 'John yacruise', 'johny24@hotmail.com', 9169368420, 'Pune'),
(152, 'Madhav dhamaal', 'madhu@rohit.com', 9856318979, 'Mumbai'),
(139, 'Raj malhotra', 'raj123@gmail.com', 9152014365, 'Shrirampur'),
(154, 'Rudisn', 'k@k.com', 8888888888, 'Shrirampur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serv_id`);

--
-- Indexes for table `sproviders`
--
ALTER TABLE `sproviders`
  ADD UNIQUE KEY `smail` (`smail`),
  ADD UNIQUE KEY `sname` (`sname`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_service` (`serv`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `uname` (`uname`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



