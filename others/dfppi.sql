-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 07:29 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfppi`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_num` int(11) NOT NULL COMMENT 'Log Number',
  `usr_id` int(11) NOT NULL COMMENT 'User',
  `message` varchar(512) NOT NULL COMMENT 'Message to deliver',
  `level` enum('None','Low','Medium','High','Hazardous') NOT NULL COMMENT 'Level of threat/risk'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `stat` enum('Enabled','Disabled') NOT NULL DEFAULT 'Enabled',
  `id_num` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL COMMENT 'password',
  `fn` varchar(32) NOT NULL COMMENT 'First name',
  `ln` varchar(32) NOT NULL COMMENT 'Surname',
  `dor` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date of Registration'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `stat`, `id_num`, `pw`, `fn`, `ln`, `dor`) VALUES
(5, 'Enabled', '5289DDAC', '8e965da85b53ffab827dabde846c459e', 'Harper', 'Jayce', '2018-02-20 07:54:02'),
(6, 'Enabled', '3EA6ACFB', '7845b69078ea527cc767da1dd06f878a', 'Amelia', 'Connor', '2018-02-20 08:00:59'),
(10, 'Enabled', '47705A7A', '816e30d3c81297dc9fa393f6b198c88c', 'Carter', 'Sean', '2018-02-26 04:03:51'),
(15, 'Enabled', '9477AC13', '5d6311ca6a7a38141f520f4ce2f2a85a', 'Chris', 'Marlon', '2018-03-06 16:01:33'),
(17, 'Enabled', 'C3BAB852', '2c0ac71c9d4c85aabe5ad9709e5ed295', 'Ella', 'Caleb', '2018-03-08 23:51:30'),
(20, 'Enabled', '1951BC4C', '8458067d4d7d4f337ca67662b91323a0', 'Francis', 'Caboyo', '2018-03-09 00:48:58'),
(21, 'Enabled', 'D91089D5', 'd0dfa83b25384c8d3fa4dd532cd5c28a', 'Amanda', 'Arspen', '2018-03-09 00:51:17'),
(22, 'Enabled', '0841F3A9', '8443135ceac9bbdf33941251f839bfcf', 'Hailey', 'James', '2018-03-09 00:53:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_num`),
  ADD KEY `log_users_id` (`usr_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_num` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Log Number';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_users_id` FOREIGN KEY (`usr_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
