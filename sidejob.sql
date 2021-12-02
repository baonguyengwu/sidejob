-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2021 at 06:07 PM
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
(4, 6, 'Chia Nguyen', 'student@gmail.com', 'None', '2021-12-02 03:26:08', 'Yes');

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
(1, 1, 3, 3, 'Dog Walking', 'admin', 'Homeowner', 'admin@gmail.com', 'bnguyen@gmail.com'),
(2, 1, 3, 3, 'Dog Walking', 'admin', 'Homeowner', 'admin@gmail.com', 'bnguyen@gmail.com'),
(4, 4, 7, 3, 'Bartender', 'student', 'Rico Bar', 'student@gmail.com', 'bnguyen@gmail.com'),
(5, 1, 2, 5, 'Babysitting', 'admin', 'Homeowner', 'admin@gmail.com', 'employer@gmail.com'),
(6, 1, 4, 1, 'Cleaning', 'admin', 'Homeowner', 'admin@gmail.com', 'admin@gmail.com'),
(7, 4, 4, 1, 'Cleaning', 'student', 'Homeowner', 'student@gmail.com', 'admin@gmail.com'),
(8, 1, 5, 1, 'Soccer', 'admin', 'Soccer Team', 'admin@gmail.com', 'admin@gmail.com'),
(9, 4, 4, 1, 'Cleaning', 'student', 'Homeowner', 'student@gmail.com', 'admin@gmail.com'),
(10, 4, 5, 1, 'Soccer', 'student', 'Soccer Team', 'student@gmail.com', 'admin@gmail.com'),
(11, 4, 2, 5, 'Babysitting', 'student', 'Homeowner', 'student@gmail.com', 'employer@gmail.com'),
(13, 4, 6, 5, 'Swimming', 'Huynh Nguyen', 'Pool', 'student@gmail.com', 'employer@gmail.com');

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
(2, 'Babysitting', 'Watch and play', 'Homeowner', 40, 'employer@gmail.com', 5),
(3, 'Dog Walking', 'walk and play', 'Homeowner', 50, 'bnguyen@gmail.com', 3),
(4, 'Cleaning', 'clean and play', 'Homeowner', 0, 'admin@gmail.com', 1),
(5, 'Soccer', 'Play and learn', 'Soccer Team', 30, 'admin@gmail.com', 1),
(6, 'Swimming', 'swim', 'Pool', 25, 'employer@gmail.com', 5),
(7, 'Bartender', 'Work as DC bar', 'Rico Bar', 35, 'bnguyen@gmail.com', 3),
(8, 'Waiter', 'Urgent need 1 waiter for this Saturday Night', 'Kinya Ramen', 26, 'bnguyen@gmail.com', 3),
(9, 'Dog Walking ', 'Need dogs walking on December 12th', 'Homeowner', 20, 'bnguyen@gmail.com', 3),
(10, 'Waiter', 'Urgent', 'Bar', 25, 'employer@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `resultID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reviewer_email` varchar(50) NOT NULL,
  `review` text NOT NULL,
  `reviewer_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `resultID`, `userID`, `reviewer_email`, `review`, `reviewer_name`) VALUES
(1, 5, 1, 'employer@gmail.com', 'Goodworks', 'employer'),
(2, 4, 3, 'student@gmail.com', 'Good Pay', 'student'),
(3, 13, 4, 'employer@gmail.com', 'very good', 'employer');

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
(5, 'employer', 'employer@gmail.com', '$2y$10$DmSWMCz/qLZ36wSoXk/FDOnPFBogP5E1Pd70I2WuudjFoq3b1XSFm', '5741136563', 'employer');

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
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `FK_reviews` (`resultID`);

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
  MODIFY `resultID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews` FOREIGN KEY (`resultID`) REFERENCES `jobresult` (`resultID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
