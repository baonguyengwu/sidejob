-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2021 at 04:29 PM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidejob`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobapplication`
--

CREATE TABLE `jobapplication` (
  `userid` int(11) NOT NULL,
  `jobid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `experience` text DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobapplication`
--

INSERT INTO `jobapplication` (`userid`, `jobid`, `name`, `email`, `experience`, `date`, `certificate`) VALUES
(2, 3, 'Bao T Nguyen', 'bnguyen1606@gmail.com', 'asdasd', '2021-12-03 22:19:55', 'none'),
(2, 5, 'Bao T Nguyen', 'bnguyen1606@gmail.com', 'none', '2021-12-03 22:20:07', 'yes'),
(4, 3, 'Bao T Nguyen', 'student@gmail.com', 'asdasd', '2021-12-03 22:06:10', 'none'),
(4, 4, 'Bao T Nguyen', 'student@gmail.com', 'asdasd', '2021-12-03 21:24:05', 'none'),
(4, 5, 'student', 'student@gmail.com', 'none', '2021-12-06 02:01:35', 'none'),
(4, 10, 'Student', 'student@gmail.com', '1 year as waiter', '2021-12-06 21:40:44', 'None'),
(13, 3, 'John Smith', 'yubika21@gmail.com', 'Homemaker, cook, babysitting', '2021-12-06 03:24:34', 'CPR from Red cross');

-- --------------------------------------------------------

--
-- Table structure for table `jobresult`
--

CREATE TABLE `jobresult` (
  `resultID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `employerCompany` varchar(50) NOT NULL,
  `studentEmail` varchar(50) NOT NULL,
  `employerEmail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobresult`
--

INSERT INTO `jobresult` (`resultID`, `userID`, `jobID`, `empID`, `jobTitle`, `studentName`, `employerCompany`, `studentEmail`, `employerEmail`) VALUES
(2, 1, 3, 3, 'Dog Walking', 'admin', 'Homeowner', 'admin@gmail.com', 'bnguyen@gmail.com'),
(6, 1, 4, 1, 'Cleaning', 'admin', 'Homeowner', 'admin@gmail.com', 'admin@gmail.com'),
(8, 1, 5, 1, 'Soccer', 'admin', 'Soccer Team', 'admin@gmail.com', 'admin@gmail.com'),
(21, 11, 5, 1, 'Soccer', 'Benlong Huang', 'Soccer Team', 'benlonghuang@gmail.com', 'admin@gmail.com'),
(22, 12, 4, 1, 'Cleaning', 'Heng Zhang', 'Homeowner', 'zhangheng@gmail.com', 'admin@gmail.com'),
(24, 13, 8, 3, 'Waiter', 'Regina Philange', 'Kinya Ramen', 'yubika21@gmail.com', 'bnguyen@gmail.com'),
(25, 13, 7, 3, 'Bartender', 'Regina Philange', 'Rico Bar', 'yubika21@gmail.com', 'bnguyen@gmail.com'),
(26, 4, 6, 5, 'Swimming', 'Huynh Nguyen', 'Pool', 'student@gmail.com', 'employer@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `company` varchar(50) NOT NULL,
  `salary` float(50,0) NOT NULL,
  `email` varchar(50) NOT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobID`, `title`, `description`, `company`, `salary`, `email`, `userID`) VALUES
(2, 'Babysitting', 'Watch and play', '', 25, 'employer@gmail.com', 5),
(3, 'Dog Walking', 'walk and play', 'Homeowner', 50, 'bnguyen@gmail.com', 3),
(4, 'Cleaning', 'clean and play', 'Homeowner', 0, 'admin@gmail.com', 1),
(5, 'Soccer', 'Play and learn', 'Soccer Team', 30, 'admin@gmail.com', 1),
(6, 'Swimming', 'swim', 'Pool', 25, 'employer@gmail.com', 5),
(7, 'Bartender', 'Work as DC bar', 'Rico Bar', 35, 'bnguyen@gmail.com', 3),
(8, 'Waiter', 'Urgent need 1 waiter for this Saturday Night', 'Kinya Ramen', 26, 'bnguyen@gmail.com', 3),
(9, 'Dog Walking ', 'Need dogs walking on December 12th', 'Homeowner', 20, 'bnguyen@gmail.com', 3),
(10, 'Waiter', 'Urgent', 'Bar', 25, 'employer@gmail.com', 5),
(11, 'Waiter', 'Urgent', 'KIya', 20, 'employer@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reviewer_email` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `reviewer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `userID`, `reviewer_email`, `review`, `reviewer_name`) VALUES
(1, 5, 'student@gmail.com', 'Good Pay', 'Bao T Nguyen'),
(2, 1, 'employer@gmail.com', 'good works', 'employer'),
(3, 1, 'employer@gmail.com', 'Nice to work with', 'employer'),
(4, 4, 'employer@gmail.com', 'Nice to work with', 'employer'),
(5, 1, 'zhangheng@gmail.com', 'Nice employer', 'Heng Zhang'),
(6, 11, 'employer@gmail.com', 'Nice to work with you Ben.', 'employer'),
(7, 11, 'admin@gmail.com', 'Good works!', 'Admin'),
(8, 12, 'admin@gmail.com', 'Nice to work with you 10/10', 'Admin'),
(9, 3, 'yubika21@gmail.com', 'Amazing employer! Would definitely work here again.', 'Regina Philange'),
(10, 3, 'student@gmail.com', 'Nice to work with you', 'Student'),
(11, 2, 'employer@gmail.com', 'Good employee', 'Employer'),
(12, 5, 'student@gmail.com', 'Good Pay', 'student'),
(13, 11, 'employer@gmail.com', 'Good to work with', 'employer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `email`, `password`, `phone`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$k0H6JCp9.pwVMQOyfsS6xOU6ro5tLVXu8eKqd33Kg50jjMlC3pPFK', '5713407914', 'admin'),
(2, 'Bao T Nguyen', 'bnguyen1606@gmail.com', '$2y$10$lllLv0CrTNxLjQbMHBYxIO3Q4A9yBcpwr7kymE8DlOyL2ilwx9WfW', '5713407888', 'user'),
(3, 'Bao Chia Nguyen', 'bnguyen@gmail.com', '$2y$10$TQCfHBvozKKElpZF6c6l6OCLpdcIvGh4xfrcrgPlj18GCoEZqolue', '7039653087', 'employer'),
(4, 'Huynh Nguyen', 'student@gmail.com', '$2y$10$YeZYbx9fz3ZkexHLNoVyXOwE5zwrAYDBdGJWAPiSgJ5dDWck5bK/W', '5544665236', 'user'),
(5, 'employer', 'employer@gmail.com', '$2y$10$DmSWMCz/qLZ36wSoXk/FDOnPFBogP5E1Pd70I2WuudjFoq3b1XSFm', '5741136563', 'employer'),
(11, 'Benlong Huang', 'benlonghuang@gmail.com', '$2y$10$3C5cBgvxLxSRUIXF1OmBY.rG7dRARqyuGV2LtSil9fDTSn29jcqnC', '15203956717', 'user'),
(12, 'Heng Zhang', 'zhangheng@gmail.com', '$2y$10$tMomkgJui.Cp3lkYFhSVVOYmUaWkaCh3bIiWgKoZeeMw7eZzyL7Tm', '9895458855', 'user'),
(13, 'Regina Philange', 'yubika21@gmail.com', '$2y$10$9e9etkToIser6aYfbCeIWeKnrgO73LToZ9R.G56kWXecX.hS.yPFO', '6786786789', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD PRIMARY KEY (`userid`,`jobid`),
  ADD KEY `FK_jobapplication_jobs` (`jobid`);

--
-- Indexes for table `jobresult`
--
ALTER TABLE `jobresult`
  ADD PRIMARY KEY (`resultID`),
  ADD KEY `jobresult_fk` (`userID`),
  ADD KEY `jobresult_fk1` (`jobID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobID`),
  ADD KEY `FK_jobs` (`email`),
  ADD KEY `FK_jobs2` (`userID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobresult`
--
ALTER TABLE `jobresult`
  MODIFY `resultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobapplication`
--
ALTER TABLE `jobapplication`
  ADD CONSTRAINT `FK_jobapplication_jobs` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobID`),
  ADD CONSTRAINT `FK_jobapplication_user` FOREIGN KEY (`userid`) REFERENCES `users` (`userID`);

--
-- Constraints for table `jobresult`
--
ALTER TABLE `jobresult`
  ADD CONSTRAINT `jobresult_fk` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `jobresult_fk1` FOREIGN KEY (`jobID`) REFERENCES `jobs` (`jobID`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FK_jobs` FOREIGN KEY (`email`) REFERENCES `users` (`email`),
  ADD CONSTRAINT `FK_jobs2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
