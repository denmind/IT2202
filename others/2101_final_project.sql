-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 09:33 AM
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
-- Database: `2101_final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `c_Id` int(11) NOT NULL,
  `c_FirstName` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `c_LastName` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `c_contactInfo` varchar(64) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`c_Id`, `c_FirstName`, `c_LastName`, `c_contactInfo`) VALUES
(1, 'Sophia', 'Smith', '552-351-5151'),
(2, 'Jackson', 'Star', 'jSt@r@yahoo.com'),
(3, 'Emanuel', 'College', '135-523-113'),
(4, 'Emma', 'Lucas', '513-851-411'),
(5, 'Olivia', 'Aidan', '951-158-311'),
(6, 'Ava', 'Lucas', 'AVA5005LUCAS@gmail.com'),
(7, 'Isabelle', 'Noah', 'skimptyTown@php.com'),
(8, 'Mia', 'Mason', '515-331-231'),
(9, 'Zoe', 'Ethan', 'zzzz35@gmail.com'),
(10, 'Lily', 'Caden', 'jbarbs@gmail.com'),
(11, 'Emily', 'Jacob', 'newYorkShikers@cloud.cr'),
(12, 'Madelyn', 'Logan', '300SpeciesEvaluation@ymail.com'),
(13, 'Madison', 'Jayden', '300-515-131'),
(14, 'Chloe', 'Elijah', '951-131-113'),
(15, 'Charlotte', 'Jack', 'jack36@myspace.com'),
(16, 'Aubrey', 'Luke', '551-311-681'),
(17, 'Avery', 'Michael', '951-781-581'),
(18, 'Abigail', 'Benjamin', '858-584-113'),
(19, 'Kaylee', 'Alexander', 'kyleeAlexander61@gmail.com'),
(20, 'Layla', 'James', 'conradsworthy@yahoo.com'),
(21, 'Carla E.', 'Thomas', '1-800-EDISON'),
(49, 'Billy', 'Joel', 'billy_joel12@ma.com');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `d_Id` int(11) NOT NULL,
  `d_deliverySchedule` date NOT NULL,
  `d_status` enum('Not started','Finished','','') NOT NULL DEFAULT 'Not started',
  `f_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`d_Id`, `d_deliverySchedule`, `d_status`, `f_id`) VALUES
(1, '2017-10-05', 'Not started', 4),
(2, '2017-10-10', 'Not started', 4),
(3, '2017-10-06', 'Not started', 4),
(4, '2017-10-03', 'Not started', 4),
(5, '2017-10-06', 'Not started', 13),
(6, '2017-10-03', 'Not started', 13),
(7, '2017-10-05', 'Not started', 4),
(8, '2017-10-03', 'Not started', 4),
(9, '2017-10-11', 'Not started', 13),
(10, '2017-10-10', 'Not started', 13),
(11, '2017-10-12', 'Not started', 19),
(12, '2017-10-14', 'Not started', 13),
(13, '2017-10-20', 'Not started', 19),
(14, '2017-10-17', 'Not started', 13),
(15, '2017-10-09', 'Not started', 19),
(16, '2017-10-20', 'Not started', 4),
(17, '2017-10-25', 'Not started', 13),
(18, '2017-10-17', 'Not started', 19),
(19, '2017-10-31', 'Not started', 19),
(20, '2017-10-09', 'Not started', 19),
(26, '2018-02-09', 'Not started', 4);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_orders`
--

CREATE TABLE `delivery_orders` (
  `do_Id` int(11) NOT NULL,
  `d_Id` int(11) NOT NULL,
  `c_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_orders`
--

INSERT INTO `delivery_orders` (`do_Id`, `d_Id`, `c_Id`) VALUES
(1, 11, 3),
(2, 2, 1),
(3, 19, 14),
(4, 11, 14),
(5, 19, 10),
(6, 15, 6),
(7, 5, 5),
(8, 12, 4),
(9, 5, 11),
(10, 1, 10),
(11, 8, 11),
(12, 10, 19),
(13, 5, 9),
(14, 10, 1),
(15, 15, 12),
(16, 15, 1),
(17, 17, 2),
(18, 19, 9),
(19, 8, 11),
(20, 14, 14),
(21, 9, 5),
(22, 18, 15),
(23, 2, 6),
(24, 1, 9),
(25, 2, 2),
(26, 3, 11),
(27, 7, 1),
(28, 4, 17),
(29, 11, 7),
(30, 19, 15),
(31, 19, 9),
(32, 6, 6),
(33, 10, 13),
(34, 15, 15),
(35, 12, 16),
(36, 1, 19),
(37, 10, 14),
(38, 1, 2),
(39, 6, 3),
(40, 18, 2);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `f_id` int(11) NOT NULL,
  `f_firstName` varchar(32) NOT NULL,
  `f_midInitial` varchar(8) NOT NULL,
  `f_lastName` varchar(32) NOT NULL,
  `f_dateHired` date NOT NULL,
  `f_sex` varchar(16) NOT NULL,
  `f_religion` varchar(16) NOT NULL,
  `f_address` varchar(128) NOT NULL,
  `f_mobileNo` varchar(32) NOT NULL,
  `f_email` varchar(32) NOT NULL,
  `f_dateOfBirth` date NOT NULL,
  `f_placeOfBirth` varchar(32) NOT NULL,
  `f_civilStatus` varchar(16) NOT NULL,
  `f_langSpoken` varchar(32) NOT NULL,
  `f_position` varchar(32) NOT NULL,
  `f_salary` int(11) NOT NULL,
  `f_department` varchar(32) NOT NULL,
  `f_status` varchar(25) NOT NULL DEFAULT 'Okay' COMMENT 'Okay/Terminated/Fired'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`f_id`, `f_firstName`, `f_midInitial`, `f_lastName`, `f_dateHired`, `f_sex`, `f_religion`, `f_address`, `f_mobileNo`, `f_email`, `f_dateOfBirth`, `f_placeOfBirth`, `f_civilStatus`, `f_langSpoken`, `f_position`, `f_salary`, `f_department`, `f_status`) VALUES
(1, 'Harper', 'A', 'Jayce', '2017-10-02', 'Female', 'Christian', '8545 North Philmont Ave. \r\nLa Porte, IN 46350', '(251) 546-9442', 'harperjayce@icloud.com', '1988-05-04', 'San Antonio,Texas', 'Married', 'English', 'Packaging', 9211, 'Production', 'Okay'),
(2, 'Ella', 'B', 'Caleb', '2017-10-02', 'Female', 'Christian', '8674 Plumb Branch St. \r\nAshtabula, OH 44004', '(630) 446-8851', 'monopole@sbcglobal.net', '1977-12-24', 'Miami,Florida', 'Married', 'English,Spanish', 'Supervisor', 5029, 'Human Resources', 'Okay'),
(3, 'Amelia', 'C', 'Connor', '2017-10-04', 'Female', 'Christian', '59 Joy Ridge St. \r\nSatellite Beach, FL 32937', '(549) 178-3181', 'mbalazin@msn.com', '1968-07-12', 'Sacramento,California', 'Divorced', 'English,French', 'Supervisor', 7514, 'Human Resources', 'Okay'),
(4, 'Ella', 'D', 'Caleb', '2017-10-04', 'Female', 'Christian', '958 Miles Street Centreville, VA 20120', '(103) 870-8098', 'eimear@outlook.com', '1969-01-21', 'Anaheim,California', 'Single', 'English,Spanish', 'Driver', 2481, 'Delivery & Transportation', 'Okay'),
(5, 'William', 'G', 'Clayton', '2017-10-05', 'Male', 'Christian', '7256 Alton Lane \r\nAnoka, MN 55303', '(546) 250-8714', 'rhavyn@aol.com', '1987-06-07', 'Raleigh,North Carolina', 'Single', 'English,Portuguese', 'Director', 9866, 'Sales & Finances', 'Okay'),
(6, 'Riley', 'Q', 'Reins', '2017-10-23', 'Male', 'Christian', '9761 Greenrose Drive \r\nBradenton, FL 34203', '(589) 176-1355', 'joglo@aol.com', '1969-02-02', 'Corpus Christi,Texas', 'Married', 'English,Spanish', 'Employee', 1884, 'Inventory', 'Okay'),
(7, 'Carter', 'I', 'Sean', '2017-10-07', 'Male', 'Christian', '59 Sulphur Springs Ave. \r\nTualatin, OR 97062', '(884) 746-4483', 'seano@gmail.com', '1989-07-01', 'Pittsburgh,Pennsylvania', 'Single', 'English,Spanish', 'Materials Inspector', 9822, 'Production', 'Okay'),
(8, 'Aria', 'P', 'Roth', '2017-10-04', 'Female', 'Islam', '72 Depot Avenue \r\nWatertown, MA 02472', '(610) 841-9218', 'keutzer@sbcglobal.net', '1985-04-23', 'Scottsdale,Arizona', 'Single', 'English', 'Sales Representative', 3461, 'Sales & Finances', 'Okay'),
(9, 'Ryan', 'I', 'Robbins', '2017-10-04', 'Male', 'Islam', '170 NW. Foster Ave. \r\nRaleigh, NC 27603', '(792) 192-8869', 'raides@live.com', '1979-08-20', 'Detroit,Michigan', 'Divorced', 'English,Chinese', 'Materials Inspector', 7836, 'Production', 'Okay'),
(10, 'Hailey', 'F', 'James', '2017-10-04', 'Female', 'Islam', '7182 Center Rd. \r\nTiffin, OH 44883', '(676) 802-4232', 'luvirini@verizon.net', '1975-08-14', 'Long Beach,California', 'Widowed', 'English,Spanish', 'Inspection', 8798, 'Inventory', 'Okay'),
(11, 'Landon', 'B', 'Brando', '2017-10-05', 'Male', 'Islam', '7659 Hillcrest Lane \r\nBel Air, MD 21014', '(742) 816-0655', 'kmself@optonline.net', '1983-11-02', 'Arlington,Arizona', 'Married', 'English,Filipino', 'Accountant', 484, 'Sales & Finances', 'Okay'),
(12, 'Nora', 'W', 'Isaac', '2017-10-04', 'Female', 'Islam', '8339 Elizabeth Drive \r\nStaunton, VA 24401', '(436) 213-2791', 'avalon@aol.com', '1974-04-18', 'Chicago,Illinois', 'Married', 'English,Chinese', 'Materials Inspector', 6024, 'Production', 'Okay'),
(13, 'Sebastian', 'Q', 'Addison', '2017-10-04', 'Male', 'Islam', '8 Tailwater Ave. \r\nMurfreesboro, TN 37128', '(330) 123-8721', 'moonlapse@aol.com', '1979-09-07', 'Virginia Beach,Virginia', 'Divorced', 'English', 'Driver', 8670, 'Delivery & Transportation', 'Okay'),
(14, 'Hannah', 'H', 'Brooklyn', '2017-10-07', 'Female', 'Islam', '65A Littleton Ave. \r\nLansdale, PA 19446', '(950) 143-2831', 'bancboy@aol.com', '1988-08-20', '', 'Single', 'English,Niponggo', 'Superintendent', 5278, 'Human Resources', 'Okay'),
(15, 'Muhammad', 'F', 'El Sharawi', '2017-10-12', 'Male', 'Islam', '740 W. Broad St. \r\nSewell, NJ 08080', '(443) 337-0394', 'miyop@sbcglobal.net', '1984-09-05', 'Lincoln,Nebraska', 'Married', 'English,Korean', 'Notary Personnel', 379, 'Sales & Finances', 'Okay'),
(16, 'Cameron', 'G', 'Agustus', '2017-10-17', 'Male', 'Hinduism', '7709 Rockaway Court \r\nMenasha, WI 54952', '(578) 978-0334', 'kewley@comcast.net', '1989-06-05', 'Indianapolis,Indiana', 'Single', 'English,Mandarin', 'Manager', 6062, 'Production', 'Okay'),
(17, 'Mila', 'D', 'Jancovich', '2017-10-22', 'Female', 'Hinduism', '672 Ivy Street \r\nJeffersonville, IN 47130', '(986) 224-6780', 'bjornk@icloud.com', '1975-04-02', 'Fort Wayne,Indiana', 'Married', 'English,Spanish', 'Manager', 9173, 'Inventory', 'Okay'),
(18, 'Leah', 'C', 'Barnes', '2017-10-18', 'Female', 'Buddhism', '18 Vale St. \r\nBurbank, IL 60459', '(772) 836-4053', 'nicktrig@verizon.net', '1976-09-15', 'Modesto,California', 'Divorced', 'English', 'Assistant Director', 7678, 'Human Resources', 'Okay'),
(19, 'Wyatt', 'B', 'Brianston', '2017-10-12', 'Male', 'Sikhism', '630 E. Selby St. \r\nMadisonville, KY 42431', '(699) 700-5914', 'ehood@optonline.net', '1973-11-15', 'Chesapeake,Virginia', 'Widowed', 'English,French', 'Driver', 873, 'Delivery & Transportation', 'Okay'),
(20, 'Elizabeth', 'A', 'Dylan', '2017-10-04', 'Female', 'Baptist', '7553 Miller St. \r\nStamford, CT 06902', '(894) 517-5277', 'storerm@sbcglobal.net', '1975-12-05', 'Mesa,Arizona', 'Married', 'English,German', 'Cashier', 1330, 'Sales & Finances', 'Okay'),
(21, 'Francis', 'J', 'Caboyo', '0000-00-00', 'Male', 'Roman Catholic', '#Hidden Valley, Barangay Talamban, Cebu City, Cebu 6000', '+6394216709', 'fcaboyo@gmail.com', '1998-07-24', 'General Santos City', 'Single', 'Filipino, English', 'Intern', 5000, 'Production', 'Okay'),
(22, 'Francis', 'J', 'Caboyo', '2018-01-24', 'Male', 'Roman Catholic', '#Hidden Valley, Barangay Talamban, Cebu City, Cebu 6000', '+6394216709', 'fcaboyo@gmail.com', '1998-07-24', 'General Santos City', 'Single', 'Filipino, English', 'Intern', 5000, 'Production', 'Okay'),
(23, '', '', '', '2018-01-24', '', '', '', '', '', '0000-00-00', '', '', '', '', 0, '', 'Okay'),
(24, 'Francis', 'J', 'Caboyo', '2018-01-25', '', 'Ro', 'asd21312', '12j312ij3i', 'j23@com', '1998-12-24', '2131321', '', '123', '12312', 123123, '', 'Okay'),
(25, 'asd', 'sadsd', 'sadsad', '2018-01-25', '', 'asdas', 'asd', 'asdasd', 'sadas@sd', '2018-01-01', 'sadsad', '', 'asdsa', 'dsadas', 0, '', 'Okay'),
(26, 'Francis', 'D', 'Lopez', '2018-01-25', 'Female', 'Pagan', 'Here', '552-32456', 'fcaboyo@gmail.asd', '1654-12-24', 'Eup', 'Single', 'Ismala', 'Intern', 500, 'None', 'Okay'),
(28, 'ss', 's', 's', '2018-01-29', 'ss', 's', 's', 's', 's@gmai', '2018-01-10', 's', 's', 's', 's', 3, 's', 'Okay'),
(29, 'Teresa', 'F', 'Beal', '2018-02-09', 'Female', 'Islam', '514 S. Magnolia St.\r\nOrlando, FL 32806', '989-596-2502', 'tbeal@gmail.com', '1995-12-02', 'Wyoming', 'Married', 'English', 'Manager', 32267, 'Human Resources', 'Okay');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_attendance`
--

CREATE TABLE `faculty_attendance` (
  `fa_Id` int(11) NOT NULL,
  `fa_In` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fa_Out` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `f_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_attendance`
--

INSERT INTO `faculty_attendance` (`fa_Id`, `fa_In`, `fa_Out`, `f_Id`) VALUES
(1, '2017-10-03 07:37:01', '2017-10-03 12:36:08', 1),
(2, '2017-10-03 07:36:01', '2017-10-03 08:38:01', 1),
(3, '2017-10-03 08:31:01', '2017-10-03 12:21:01', 2),
(4, '2017-10-03 09:29:01', '2017-10-03 12:21:01', 2),
(5, '2017-10-03 07:35:27', '2017-10-03 06:34:19', 3),
(6, '2017-10-03 07:21:12', '2017-10-03 07:21:11', 3),
(7, '2017-10-03 05:34:19', '2017-10-03 08:21:10', 4),
(8, '2017-10-03 07:21:07', '2017-10-03 08:37:26', 4),
(9, '2017-10-03 05:21:14', '2017-10-03 05:21:22', 5),
(10, '2017-10-03 09:31:16', '2017-10-03 07:38:26', 5),
(11, '2017-10-03 08:27:21', '2017-10-03 08:32:24', 6),
(12, '2017-10-03 04:21:08', '2017-10-03 09:32:25', 6),
(13, '2017-10-03 11:40:23', '2017-10-03 12:32:27', 7),
(14, '2017-10-03 08:33:20', '2017-10-03 12:28:25', 7),
(15, '2017-10-03 09:32:13', '2017-10-03 12:43:31', 8),
(16, '2017-10-03 07:21:15', '2017-10-03 08:36:30', 8),
(17, '2017-10-03 07:29:23', '2017-10-03 10:37:32', 9),
(18, '2017-10-03 08:21:22', '2017-10-03 08:34:23', 9),
(19, '2017-10-03 09:33:28', '2017-10-03 12:38:31', 10),
(20, '2017-10-03 07:34:29', '2017-10-03 08:32:24', 10),
(21, '2017-10-03 07:28:15', '2017-10-03 10:32:23', 11),
(22, '2017-10-03 08:30:24', '2017-10-03 12:46:35', 11),
(23, '2017-10-03 09:31:19', '2017-10-03 09:44:27', 12),
(24, '2017-10-03 09:29:21', '2017-10-03 12:53:30', 12),
(25, '2017-10-03 10:34:12', '2017-10-03 12:33:27', 13),
(26, '2017-10-03 06:30:21', '2017-10-03 11:33:30', 13),
(27, '2017-10-03 07:37:25', '2017-10-03 12:39:31', 14),
(28, '2017-10-03 07:34:31', '2017-10-03 11:41:42', 14),
(29, '2017-10-03 09:34:28', '2017-10-03 10:53:48', 15),
(30, '2017-10-03 09:32:22', '2017-10-03 12:48:41', 15),
(31, '2017-10-03 08:31:22', '2017-10-03 09:35:26', 16),
(32, '2017-10-03 05:28:14', '2017-10-03 09:31:20', 16),
(33, '2017-10-03 05:27:14', '2017-10-03 12:37:13', 17),
(34, '2017-10-03 06:28:16', '2017-10-03 06:29:11', 17),
(35, '2017-10-03 05:21:10', '2017-10-03 07:28:13', 18),
(36, '2017-10-03 08:33:12', '2017-10-03 09:28:18', 18),
(37, '2017-10-03 06:21:10', '2017-10-03 11:37:16', 19),
(38, '2017-10-03 04:31:17', '2017-10-03 07:30:19', 19),
(39, '2017-10-03 06:34:20', '2017-10-03 12:38:29', 20),
(40, '2017-10-03 09:27:07', '2017-10-03 09:36:34', 20);

-- --------------------------------------------------------

--
-- Table structure for table `notify_delivery`
--

CREATE TABLE `notify_delivery` (
  `n_Id` int(11) NOT NULL,
  `n_dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When was the notification sent',
  `d_Id` int(11) NOT NULL,
  `f_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notify_delivery`
--

INSERT INTO `notify_delivery` (`n_Id`, `n_dateTime`, `d_Id`, `f_Id`) VALUES
(1, '2017-10-05 04:12:20', 4, 2),
(2, '2017-10-12 07:17:30', 19, 16),
(3, '2017-10-21 07:21:18', 13, 2),
(4, '2017-10-12 09:23:19', 13, 16),
(5, '2017-10-12 07:17:17', 19, 2),
(6, '2017-10-04 11:23:22', 19, 16),
(7, '2017-10-06 07:19:20', 13, 2),
(8, '2017-10-14 08:18:15', 13, 16),
(9, '2017-10-02 08:17:20', 19, 2),
(10, '2017-10-05 10:29:30', 19, 16),
(11, '2017-10-07 13:28:26', 4, 2),
(12, '2017-10-05 05:29:11', 4, 16),
(13, '2017-10-03 16:40:27', 19, 2),
(14, '2017-10-05 11:23:30', 19, 16),
(15, '2017-10-03 08:20:19', 13, 2),
(16, '2017-10-20 08:21:24', 4, 16),
(17, '2017-10-07 09:37:26', 19, 2),
(18, '2017-10-05 09:16:20', 19, 16),
(19, '2017-10-06 07:15:17', 4, 2),
(20, '2017-10-10 08:21:23', 13, 16),
(21, '2017-10-08 07:20:27', 4, 3),
(22, '2017-10-21 09:18:20', 13, 17),
(23, '2017-10-25 08:19:23', 13, 3),
(24, '2017-10-06 07:17:16', 13, 17),
(25, '2017-10-12 08:21:23', 4, 3),
(26, '2017-10-05 11:25:19', 13, 17),
(27, '2017-10-19 10:24:23', 4, 3),
(28, '2017-10-14 08:28:28', 4, 17),
(29, '2017-10-03 07:20:25', 4, 3),
(30, '2017-10-05 09:27:26', 19, 17),
(31, '2017-10-06 07:18:18', 19, 3),
(32, '2017-10-07 06:24:20', 19, 17),
(33, '2017-10-13 07:20:16', 19, 3),
(34, '2017-10-05 06:12:20', 4, 17),
(35, '2017-10-13 10:25:24', 13, 3),
(36, '2017-10-05 04:25:22', 19, 17),
(37, '2017-10-14 11:22:19', 19, 3),
(38, '2017-10-05 07:17:17', 19, 17),
(39, '2017-10-25 08:19:21', 13, 3),
(40, '2017-10-17 08:29:25', 13, 17);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_Id` int(11) NOT NULL,
  `o_orderDateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `o_addressOfDelivery` varchar(128) NOT NULL,
  `c_Id` int(11) NOT NULL,
  `f_Id` int(11) NOT NULL,
  `o_status` enum('In production','Done','Not started') NOT NULL DEFAULT 'Not started' COMMENT 'Current order''s status'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_Id`, `o_orderDateTime`, `o_addressOfDelivery`, `c_Id`, `f_Id`, `o_status`) VALUES
(1, '2017-10-10 15:16:25', '37 Tanglewood Street \r\nKennesaw, GA 30144', 18, 5, 'Not started'),
(2, '2017-10-14 07:11:12', '209 Hilltop Ave. \r\nLockport, NY 14094', 15, 5, 'Not started'),
(3, '2017-10-13 09:25:20', '29 Devon Street \r\nWarner Robins, GA 31088', 15, 5, 'Not started'),
(4, '2017-10-17 08:19:17', '8812 West Golf Road \r\nHolyoke, MA 01040', 17, 5, 'Not started'),
(5, '2017-10-20 07:15:20', '763 Roosevelt St. \r\nRiverside, NJ 08075', 2, 5, 'Not started'),
(6, '2017-10-10 10:17:15', '8173 Westport Ave. \r\nRahway, NJ 07065', 2, 5, 'Not started'),
(7, '2017-10-21 07:19:20', '687 High Ridge Ave. \r\nFt Mitchell, KY 41017', 3, 5, 'Not started'),
(8, '2017-10-10 07:17:20', '652 Bohemia Road \r\nEast Northport, NY 11731', 11, 5, 'Not started'),
(9, '2017-10-20 07:23:27', '9657 Madison Ave. \r\nRoyal Oak, MI 48067', 4, 8, 'Not started'),
(10, '2017-10-20 11:22:25', '89 Princeton Road \r\nAmes, IA 50010', 9, 8, 'Not started'),
(11, '2017-10-13 09:19:17', '15 Tailwater St. \r\nLancaster, NY 14086', 11, 8, 'Not started'),
(12, '2017-10-30 07:24:24', '97 Wayne St. \r\nRockville Centre, NY 11570', 7, 8, 'Not started'),
(13, '2017-10-26 06:17:18', '773 Hill Field Drive \r\nDelaware, OH 43015', 5, 8, 'Not started'),
(14, '2017-10-12 04:10:14', '20 Sycamore St. \r\nAnn Arbor, MI 48103', 2, 8, 'Not started'),
(15, '2017-10-05 09:23:17', '83 Tanglewood Lane \r\nLatrobe, PA 15650', 15, 8, 'Not started'),
(16, '2017-10-22 07:16:21', '85 Piper Circle \r\nApex, NC 27502', 8, 8, 'Not started'),
(17, '2017-10-06 14:14:19', '93 Park Drive \r\nIndianapolis, IN 46201', 17, 11, 'Not started'),
(18, '2017-10-27 11:28:26', '577 Greystone Drive \r\nMerrimack, NH 03054', 1, 11, 'Not started'),
(19, '2017-10-06 10:19:19', '9449 Lafayette Dr. \r\nNewport News, VA 23601', 13, 11, 'Not started'),
(20, '2017-10-13 08:20:20', '98 Glenwood St. Lowell, MA 01851', 2, 11, 'Not started'),
(21, '2017-10-14 13:23:19', '736 Hickory St. \r\nWestlake, OH 44145', 13, 11, 'Not started'),
(22, '2017-10-07 08:28:24', '5 Hilldale Rd. \r\nDanbury, CT 06810', 17, 11, 'Not started'),
(23, '2017-10-23 08:19:26', '1 Wintergreen Road \r\nRosedale, NY 11422', 5, 11, 'Not started'),
(24, '2017-10-07 07:18:19', '8139 Foster Drive \r\nElk River, MN 55330', 13, 11, 'Not started'),
(25, '2017-10-20 07:17:23', '9656 Beaver Ridge St. \r\nCincinnati, OH 45211', 12, 15, 'Not started'),
(26, '2017-10-10 09:23:29', '11 Wintergreen Street \r\nNew Hyde Park, NY 11040', 20, 15, 'Not started'),
(27, '2017-10-24 07:21:24', '3 Briarwood Street \r\nIndianapolis, IN 46201', 2, 15, 'Not started'),
(28, '2017-10-15 08:18:18', '7700 Meadow Road \r\nSouthgate, MI 48195', 13, 15, 'Not started'),
(29, '2017-10-21 10:21:27', '821 Blackburn Ave. \r\nSkokie, IL 60076', 18, 15, 'Not started'),
(30, '2017-10-20 10:24:19', '931 Griffin St. \r\nNiagara Falls, NY 14304', 12, 15, 'Not started'),
(31, '2017-10-15 11:25:21', '11 Madison Court \r\nVernon Rockville, CT 06066', 6, 15, 'Not started'),
(32, '2017-10-18 10:25:15', '509 Locust St. \r\nFond Du Lac, WI 54935', 13, 15, 'Not started'),
(33, '2017-10-09 10:24:23', '971 South Mill Pond Ave. \r\nGalloway, OH 43119', 6, 20, 'Not started'),
(34, '2017-10-05 09:22:23', '8535 Hawthorne Dr. \r\nDerry, NH 03038', 13, 20, 'Not started'),
(35, '2017-10-06 07:19:19', '9095 Meadowbrook Ave. \r\nLake Jackson, TX 77566', 6, 20, 'Not started'),
(36, '2017-10-14 08:22:19', '118 Applegate Ave. \r\nLeesburg, VA 20175', 11, 20, 'Not started'),
(37, '2017-10-17 09:15:19', '572C West William St. \r\nMcallen, TX 78501', 17, 20, 'Not started'),
(38, '2017-10-28 08:24:21', '47 S. Howard Dr. \r\nSimpsonville, SC 29680', 10, 20, 'Not started'),
(39, '2017-10-10 06:16:15', '7170 College St. \r\nWestmont, IL 60559', 1, 20, 'Not started'),
(40, '2017-10-09 07:20:20', '157 Oak Valley Ave. \r\nCheshire, CT 06410', 15, 20, 'Not started'),
(123, '2018-02-05 14:11:15', '', 6, 25, 'Not started'),
(126, '2018-02-05 14:18:15', 'HERE', 11, 23, 'Not started'),
(127, '2018-02-08 23:29:15', '					3', 5, 2, 'Not started'),
(128, '2018-02-08 23:54:04', '44 Shirley Ave.\r\nWest Chicago, IL 60185', 18, 18, 'Not started'),
(129, '2018-02-08 23:54:46', '44 Shirley Ave.\r\nWest Chicago, IL 60185', 18, 18, 'Not started');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `op_Id` int(11) NOT NULL,
  `op_quantity` int(11) NOT NULL,
  `o_Id` int(11) NOT NULL,
  `p_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`op_Id`, `op_quantity`, `o_Id`, `p_Id`) VALUES
(1, 96, 1, 4),
(2, 2, 18, 5),
(3, 82, 15, 9),
(4, 10, 6, 10),
(5, 94, 11, 11),
(6, 81, 19, 20),
(7, 51, 23, 7),
(8, 2, 2, 4),
(9, 83, 23, 6),
(10, 93, 26, 10),
(11, 59, 16, 5),
(12, 4, 19, 4),
(13, 56, 10, 10),
(14, 83, 25, 13),
(15, 34, 30, 16),
(16, 62, 30, 18),
(17, 22, 18, 11),
(18, 32, 1, 2),
(19, 49, 5, 3),
(20, 48, 35, 19),
(21, 9, 24, 16),
(22, 15, 14, 6),
(23, 47, 18, 17),
(24, 95, 7, 20),
(25, 42, 5, 8),
(26, 54, 23, 4),
(27, 30, 36, 12),
(28, 38, 2, 2),
(29, 44, 34, 18),
(30, 90, 35, 12),
(31, 48, 21, 5),
(32, 59, 9, 8),
(33, 35, 21, 11),
(34, 12, 39, 11),
(35, 85, 22, 5),
(36, 66, 19, 8),
(37, 61, 34, 7),
(38, 34, 23, 17),
(39, 49, 38, 5),
(40, 41, 12, 6);

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `prdn_Id` int(11) NOT NULL,
  `prdn_date` date NOT NULL,
  `prdn_quantity` int(11) NOT NULL,
  `status` enum('Not started','Finished','','') NOT NULL DEFAULT 'Not started',
  `f_Id` int(11) NOT NULL,
  `p_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`prdn_Id`, `prdn_date`, `prdn_quantity`, `status`, `f_Id`, `p_Id`) VALUES
(1, '2017-10-04', 43, 'Not started', 1, 5),
(2, '2017-10-15', 92, 'Not started', 1, 17),
(3, '2017-10-04', 54, 'Not started', 1, 3),
(4, '2017-10-11', 2, 'Not started', 1, 15),
(5, '2017-10-05', 60, 'Not started', 1, 16),
(6, '2017-10-07', 19, 'Not started', 1, 11),
(7, '2017-10-01', 18, 'Not started', 1, 5),
(8, '2017-10-03', 78, 'Not started', 1, 2),
(9, '2017-10-03', 21, 'Not started', 7, 14),
(10, '2017-10-01', 89, 'Not started', 7, 7),
(11, '2017-10-07', 8, 'Not started', 7, 7),
(12, '2017-10-23', 50, 'Not started', 7, 9),
(13, '2017-10-11', 84, 'Not started', 7, 16),
(14, '2017-10-22', 40, 'Not started', 7, 13),
(15, '2017-10-15', 99, 'Not started', 7, 1),
(16, '2017-10-07', 28, 'Not started', 7, 5),
(17, '2017-10-04', 48, 'Not started', 9, 12),
(18, '2017-10-12', 61, 'Not started', 9, 4),
(19, '2017-10-08', 23, 'Not started', 9, 10),
(20, '2017-10-18', 81, 'Not started', 9, 11),
(21, '2017-10-11', 27, 'Not started', 9, 15),
(22, '2017-10-19', 92, 'Not started', 9, 7),
(23, '2017-10-01', 10, 'Not started', 9, 8),
(24, '2017-10-03', 62, 'Not started', 9, 19),
(25, '2017-10-03', 92, 'Not started', 12, 15),
(26, '2017-10-01', 94, 'Not started', 12, 10),
(27, '2017-10-18', 58, 'Not started', 12, 9),
(28, '2017-10-02', 49, 'Not started', 12, 2),
(29, '2017-10-26', 6, 'Not started', 12, 20),
(30, '2017-10-20', 73, 'Not started', 12, 14),
(31, '2017-10-17', 29, 'Not started', 12, 8),
(32, '2017-10-11', 1, 'Not started', 12, 18),
(33, '2017-10-18', 54, 'Not started', 16, 19),
(34, '2017-10-03', 20, 'Not started', 16, 2),
(35, '2017-10-08', 88, 'Not started', 16, 2),
(36, '2017-10-01', 92, 'Not started', 16, 6),
(37, '2017-10-19', 64, 'Not started', 16, 7),
(38, '2017-10-28', 86, 'Not started', 16, 5),
(39, '2017-10-27', 63, 'Not started', 16, 9),
(40, '2017-10-04', 23, 'Not started', 16, 18),
(53, '2018-02-07', 1, 'Not started', 16, 24);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_Id` int(11) NOT NULL,
  `p_name` varchar(32) NOT NULL,
  `p_descp` varchar(128) NOT NULL,
  `p_type` enum('Container','Vacuum Pack','Strap','Sticker','Post','General') NOT NULL DEFAULT 'General',
  `p_weight` int(11) NOT NULL COMMENT 'Weight of each product',
  `p_price` double NOT NULL,
  `status` enum('Outdated','In-use','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_Id`, `p_name`, `p_descp`, `p_type`, `p_weight`, `p_price`, `status`) VALUES
(1, 'Light Sanstrong', 'Lightweight Container', 'Vacuum Pack', 32, 1112.56, 'Outdated'),
(2, 'Lottip', 'High quality container', 'Container', 32, 2531.31, 'Outdated'),
(3, 'Randex', 'Low priced label', 'Sticker', 22, 725.31, 'Outdated'),
(4, 'Zamsaohold', 'Durable and Versatile Vacuum Pack', 'Vacuum Pack', 12, 325.31, 'Outdated'),
(5, 'Santone', 'Low priced strap', 'Strap', 42, 525.31, 'Outdated'),
(6, 'Silver Remtom', 'Extremely weather resistant', 'Strap', 23, 2547.31, 'Outdated'),
(7, 'Techstring', 'High quality label', 'Sticker', 26, 2253.21, 'Outdated'),
(8, 'Lam Nimlux', 'Child and Animal Friendly', 'Sticker', 21, 2225.31, 'Outdated'),
(9, 'Holdla', 'Extremely weather resistant', 'Post', 27, 3181.31, 'Outdated'),
(10, 'Candex', 'Water and Grease Proof', 'Strap', 16, 2615.31, 'Outdated'),
(11, 'Zunla', 'Long lasting', 'Post', 18, 4225.31, 'Outdated'),
(12, 'Zen-Job', 'Durable and Versatile', 'Vacuum Pack', 57, 1416.31, 'Outdated'),
(13, 'Tamplex', 'Environmentally safe', 'Strap', 42, 1225.31, 'Outdated'),
(14, 'Fintip', 'Child and Animal Friendly', 'Container', 49, 925.31, 'Outdated'),
(15, 'Gold-Tech', 'CFC Free', 'Vacuum Pack', 21, 2215.31, 'Outdated'),
(16, 'Dong Sildom', 'No poisonous materials', 'Container', 16, 1125.31, 'Outdated'),
(17, 'Danfix', 'Durable and Versatile', 'Sticker', 41, 525.31, 'Outdated'),
(18, 'Tempfan', 'High quality', 'Vacuum Pack', 38, 4125.31, 'Outdated'),
(19, 'Inch-Strong', 'Industrial usage', 'Post', 33, 7125.31, 'Outdated'),
(20, 'Unoplus', 'Water and Grease Proof', 'Vacuum Pack', 27, 1825.31, 'Outdated'),
(21, 'Product', 'Good item', '', 0, 512, 'Outdated'),
(22, 'Inch-long', 'Good', '', 0, 951, 'Outdated'),
(23, 'Priact', 'Good item', 'Container', 91, 882, 'Outdated'),
(24, 'Blue Pills', 'Good thing', '', 12, 918, 'Outdated'),
(25, 'Box', 'Goods', 'Container', 12, 91, 'Outdated'),
(32, 'fasdsd', 'Asdsd', 'Container', 66123, 23123, 'Outdated');

-- --------------------------------------------------------

--
-- Table structure for table `raw_materials`
--

CREATE TABLE `raw_materials` (
  `rm_Id` int(11) NOT NULL,
  `rm_quantity` int(11) NOT NULL,
  `rm_name` varchar(128) NOT NULL,
  `rm_descp` varchar(32) NOT NULL,
  `rm_pricePerUnit` double NOT NULL,
  `rm_type` enum('Lumber/Wood Fiber','Adhesives','Inks','Paraffin','Polyethylene','Polyoxymethylene','Polypropylene') NOT NULL,
  `status` enum('Outdated','In-use','','') NOT NULL,
  `s_Id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `supp_Id` int(11) NOT NULL,
  `p_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `raw_materials`
--

INSERT INTO `raw_materials` (`rm_Id`, `rm_quantity`, `rm_name`, `rm_descp`, `rm_pricePerUnit`, `rm_type`, `status`, `s_Id`, `so_id`, `supp_Id`, `p_Id`) VALUES
(1, 62, 'Bam-It', 'Low priced', 657.6, 'Lumber/Wood Fiber', 'Outdated', 8, 4, 6, 3),
(2, 90, 'Vilais', 'High quality', 9.08, 'Lumber/Wood Fiber', 'Outdated', 7, 30, 14, 5),
(3, 21, 'Zathdex', 'Industrial usage', 232.81, 'Adhesives', 'Outdated', 11, 2, 11, 14),
(4, 77, 'An-Strong', 'Extremely weather resistant', 772.8, 'Inks', 'Outdated', 11, 18, 12, 14),
(5, 72, 'Toughdex', 'Durable and Versatile', 473.92, 'Paraffin', 'Outdated', 4, 23, 5, 12),
(6, 19, 'Stan-Lam', 'Water and Grease Proof', 155.74, 'Polyethylene', 'Outdated', 4, 24, 8, 2),
(7, 44, 'Zottex', 'Long lasting', 826.91, 'Polyoxymethylene', 'Outdated', 16, 25, 14, 10),
(8, 51, 'Toughlux', 'Environmentally safe', 23.76, 'Polypropylene', 'Outdated', 12, 35, 11, 4),
(9, 31, 'Hotphase', 'Child and Animal Friendly', 954.09, 'Polypropylene', 'Outdated', 17, 14, 6, 6),
(10, 64, 'Goodron', 'CFC Free', 323.84, 'Polyoxymethylene', 'Outdated', 14, 20, 9, 15),
(11, 35, 'Ranity', 'No poisonous materials', 544.79, 'Polyethylene', 'Outdated', 13, 27, 7, 14),
(12, 45, 'Lightcore', 'Exclusive material', 165.4, 'Paraffin', 'Outdated', 10, 37, 3, 1),
(13, 72, 'Sao Traxwarm', 'Export Quality', 491.58, 'Inks', 'Outdated', 6, 39, 19, 18),
(14, 52, 'Hold Eco', 'Not for home use', 960.74, 'Adhesives', 'Outdated', 5, 15, 3, 10),
(15, 22, 'K-tom', 'Tamper resistant', 522.08, 'Lumber/Wood Fiber', 'Outdated', 19, 9, 5, 10),
(16, 86, 'U-warm', 'Low priced', 740.4, 'Lumber/Wood Fiber', 'Outdated', 3, 18, 17, 18),
(17, 40, 'Voyastock', 'High quality', 1.64, 'Adhesives', 'Outdated', 16, 39, 10, 12),
(18, 49, 'Damfresh', 'Industrial usage', 653.41, 'Inks', 'Outdated', 16, 39, 11, 15),
(19, 11, 'Plusla', 'Extremely weather resistant', 330.67, 'Paraffin', 'Outdated', 6, 23, 19, 19),
(20, 23, 'Finlab', 'Durable and Versatile', 114.43, 'Polyethylene', 'Outdated', 17, 1, 10, 8),
(21, 45, 'Trust Ozestring', 'Water and Grease Proof', 89.54, 'Polyoxymethylene', 'Outdated', 2, 10, 19, 19),
(22, 93, 'Dento-Tech', 'Long lasting', 803.72, 'Polypropylene', 'Outdated', 5, 29, 18, 8),
(23, 27, 'Unalight', 'Tamper resistant', 131.75, 'Polyoxymethylene', 'Outdated', 17, 36, 19, 1),
(24, 47, 'Vaiafan', 'Environmentally safe', 156.08, 'Polyethylene', 'Outdated', 7, 13, 12, 19),
(25, 7, 'Tam-Tam', 'Child and Animal Friendly', 442.06, 'Paraffin', 'Outdated', 20, 26, 6, 9),
(26, 37, 'Subdox', 'CFC Free', 532.09, 'Inks', 'Outdated', 11, 5, 20, 11),
(27, 81, 'Spansaildom', 'No poisonous materials', 404.39, 'Adhesives', 'Outdated', 12, 28, 15, 14),
(28, 30, 'Y- Tantex', 'Exclusive material', 349.67, 'Lumber/Wood Fiber', 'Outdated', 17, 7, 6, 20),
(29, 3, 'Freshtough', 'Export Quality', 200.19, 'Adhesives', 'Outdated', 18, 38, 1, 6),
(30, 50, 'X-lux', 'Not for home use', 515.21, 'Inks', 'Outdated', 2, 36, 5, 9),
(31, 59, 'Arline Cochran', 'No poisonous materials', 579.93, 'Paraffin', 'Outdated', 3, 36, 3, 1),
(32, 75, 'Scorpion Ivory', 'CFC Free', 619.8, 'Polyethylene', 'Outdated', 17, 16, 9, 15),
(33, 69, 'Breeze Outstanding', 'Exclusive material', 456.06, 'Polyoxymethylene', 'Outdated', 4, 26, 12, 2),
(34, 73, 'Autopsy Cloudy', 'Child and Animal Friendly', 301.61, 'Polypropylene', 'Outdated', 7, 30, 14, 8),
(35, 75, 'Silly Hammer', 'Export Quality', 579.68, 'Polyoxymethylene', 'Outdated', 13, 23, 18, 15),
(36, 99, 'Modern Cold Iron', 'Not for home use', 762.85, 'Polyethylene', 'Outdated', 17, 35, 19, 19),
(37, 8, 'Fixlane', 'Tamper resistant', 489.78, 'Paraffin', 'Outdated', 4, 22, 4, 4),
(38, 54, 'Itfax', 'Long lasting', 46.47, 'Inks', 'Outdated', 12, 38, 18, 13),
(39, 57, 'Indifase', 'Water and Grease Proof', 873.94, 'Adhesives', 'Outdated', 13, 29, 11, 14),
(40, 86, 'Indidom', 'Durable and Versatile', 170.54, 'Lumber/Wood Fiber', 'Outdated', 5, 32, 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE `storage` (
  `s_Id` int(11) NOT NULL,
  `s_isleLoc` varchar(32) NOT NULL,
  `s_rowLoc` int(8) NOT NULL,
  `s_colLoc` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`s_Id`, `s_isleLoc`, `s_rowLoc`, `s_colLoc`) VALUES
(1, 'A3', 3, 5),
(2, 'B3', 9, 4),
(3, 'C1', 6, 4),
(4, 'D3', 5, 4),
(5, 'E9', 9, 4),
(6, 'F1', 8, 4),
(7, 'G4', 6, 5),
(8, 'H5', 9, 5),
(9, 'I3', 3, 2),
(10, 'J9', 4, 5),
(11, 'K2', 2, 8),
(12, 'L5', 9, 5),
(13, 'M2', 3, 8),
(14, 'N4', 5, 1),
(15, 'O8', 8, 5),
(16, 'P8', 4, 2),
(17, 'Q8', 3, 8),
(18, 'R8', 5, 3),
(19, 'S7', 7, 4),
(20, 'T3', 8, 5),
(21, 'g123', 661, 233);

-- --------------------------------------------------------

--
-- Table structure for table `storage_delivery_products`
--

CREATE TABLE `storage_delivery_products` (
  `sdp_Id` int(11) NOT NULL,
  `sdp_quantity` varchar(16) NOT NULL COMMENT 'Quantity moved to delivery',
  `sdp_weight` varchar(16) NOT NULL COMMENT 'Total weight moved to delivery',
  `sdp_dateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'When it was moved to delivery',
  `s_Id` int(11) NOT NULL,
  `d_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_delivery_products`
--

INSERT INTO `storage_delivery_products` (`sdp_Id`, `sdp_quantity`, `sdp_weight`, `sdp_dateTime`, `s_Id`, `d_Id`) VALUES
(1, '64', '67', '2017-10-05 08:20:21', 9, 5),
(2, '98', '7', '2017-10-04 09:23:25', 8, 18),
(3, '16', '16', '2017-10-13 08:20:22', 6, 2),
(4, '50', '23', '2017-10-14 11:27:27', 13, 13),
(5, '14', '81', '2017-10-13 07:18:20', 13, 15),
(6, '83', '92', '2017-10-30 09:24:24', 2, 14),
(7, '29', '30', '2017-10-06 09:23:24', 13, 7),
(8, '78', '85', '2017-10-17 09:25:26', 18, 20),
(9, '17', '92', '2017-10-12 14:08:16', 2, 15),
(10, '39', '75', '2017-10-21 08:21:21', 11, 12),
(11, '34', '85', '2017-10-19 07:18:21', 5, 14),
(12, '75', '65', '2017-10-16 09:27:30', 20, 19),
(13, '83', '28', '2017-10-19 08:21:24', 18, 15),
(14, '93', '47', '2017-10-12 09:27:21', 10, 4),
(15, '53', '99', '2017-10-27 09:26:29', 7, 18),
(16, '33', '96', '2017-10-30 08:19:20', 17, 5),
(17, '88', '55', '2017-10-14 06:20:25', 3, 1),
(18, '75', '65', '2017-10-10 09:22:25', 20, 20),
(19, '98', '94', '2017-10-17 07:16:28', 15, 19),
(20, '40', '21', '2017-10-13 08:18:19', 17, 11),
(21, '23', '51', '2017-10-07 07:17:26', 17, 14),
(22, '6', '15', '2017-10-19 10:28:29', 11, 8),
(23, '26', '13', '2017-10-17 06:18:27', 17, 18),
(24, '100', '24', '2017-10-27 11:27:27', 4, 5),
(25, '70', '72', '2017-10-17 06:20:22', 10, 7),
(26, '16', '80', '2017-10-26 07:18:18', 11, 5),
(27, '67', '57', '2017-10-21 13:24:19', 17, 12),
(28, '34', '96', '2017-10-11 07:17:17', 15, 18),
(29, '31', '81', '2017-10-20 11:26:20', 2, 4),
(30, '53', '11', '2017-10-10 07:20:21', 19, 10),
(31, '50', '9', '2017-10-03 07:21:22', 19, 7),
(32, '4', '13', '2017-10-06 08:19:17', 10, 4),
(33, '53', '1', '2017-10-25 10:21:21', 9, 4),
(34, '66', '71', '2017-10-07 08:21:20', 11, 14),
(35, '80', '89', '2017-10-10 05:17:22', 1, 11),
(36, '56', '17', '2017-10-27 08:20:20', 4, 10),
(37, '87', '87', '2017-10-04 07:15:21', 15, 1),
(38, '98', '82', '2017-10-07 09:19:21', 3, 5),
(39, '78', '16', '2017-10-10 09:24:30', 10, 20),
(40, '46', '33', '2017-10-31 09:21:20', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `storage_products`
--

CREATE TABLE `storage_products` (
  `sp_Id` int(11) NOT NULL,
  `sp_quantity` int(11) DEFAULT NULL COMMENT 'Amount of products to be stored',
  `sp_dateTimeStored` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s_Id` int(11) NOT NULL,
  `p_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage_products`
--

INSERT INTO `storage_products` (`sp_Id`, `sp_quantity`, `sp_dateTimeStored`, `s_Id`, `p_Id`) VALUES
(1, 23, '2017-10-13 10:24:19', 17, 13),
(2, 98, '2017-10-11 07:28:26', 4, 20),
(3, 83, '2017-10-19 11:09:28', 1, 17),
(4, 52, '2017-10-07 07:19:26', 12, 7),
(5, 10, '2017-10-05 11:24:19', 8, 15),
(6, 56, '2017-10-04 09:16:16', 2, 14),
(7, 52, '2017-10-04 07:14:13', 12, 10),
(8, 96, '2017-10-10 08:20:19', 14, 14),
(9, 34, '2017-10-05 06:16:26', 18, 7),
(10, 70, '2017-10-19 08:18:21', 10, 6),
(11, 96, '2017-10-14 07:22:15', 16, 2),
(12, 88, '2017-10-06 17:36:21', 6, 19),
(13, 93, '2017-10-30 07:17:20', 8, 6),
(14, 49, '2017-10-05 08:18:16', 12, 12),
(15, 78, '2017-10-27 11:25:23', 11, 10),
(16, 79, '2017-10-20 07:17:27', 7, 6),
(17, 6, '2017-10-04 06:16:21', 10, 5),
(18, 17, '2017-10-12 14:19:27', 10, 19),
(19, 43, '2017-10-30 10:21:20', 8, 15),
(20, 63, '2017-10-09 08:18:18', 8, 2),
(21, 7, '2017-10-03 05:19:24', 11, 9),
(22, 98, '2017-10-06 10:23:18', 18, 10),
(23, 63, '2017-10-04 06:20:24', 13, 9),
(24, 17, '2017-10-24 07:19:17', 19, 2),
(25, 74, '2017-10-09 14:15:30', 5, 19),
(26, 66, '2017-10-27 09:21:20', 19, 17),
(27, 79, '2017-10-19 09:20:24', 3, 10),
(28, 17, '2017-10-09 16:23:19', 1, 15),
(29, 2, '2017-10-16 06:18:27', 3, 11),
(30, 60, '2017-10-20 09:22:26', 12, 6),
(31, 22, '2017-10-03 06:14:19', 4, 9),
(32, 86, '2017-10-12 06:15:18', 7, 4),
(33, 99, '2017-10-19 09:19:19', 4, 1),
(34, 96, '2017-10-20 07:16:19', 19, 15),
(35, 9, '2017-10-02 07:16:18', 4, 14),
(36, 68, '2017-10-26 06:20:22', 10, 9),
(37, 55, '2017-10-10 07:17:34', 8, 6),
(38, 50, '2017-10-19 13:26:25', 13, 17),
(39, 68, '2017-10-04 05:14:14', 13, 6),
(40, 26, '2017-10-04 06:15:18', 12, 6),
(42, 123, '2018-02-08 17:18:19', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supp_Id` int(11) NOT NULL,
  `supp_name` varchar(64) NOT NULL,
  `supp_address` varchar(128) NOT NULL,
  `supp_contact` varchar(64) NOT NULL,
  `supp_stat` enum('On-contract','Expired') NOT NULL DEFAULT 'On-contract'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supp_Id`, `supp_name`, `supp_address`, `supp_contact`, `supp_stat`) VALUES
(1, 'Lawnia', '813 South Bridgeton St. \r\nBeckley, WV 25801', '(539) 218-5068', 'On-contract'),
(2, 'Majerna', '62 North Hudson Street \r\nHamden, CT 06514', 'mddallara@yahoo.com', 'On-contract'),
(3, 'Dronus', '122 Gartner St. \r\nMunster, IN 46321', 'haddawy@yahoo.ca', 'On-contract'),
(4, 'Hoursly', '8502 N. Ohio Drive \r\nBethesda, MD 20814', '(342) 962-0037', 'On-contract'),
(5, 'Chatize', '9075 Wall Street \r\nCircle Pines, MN 55014', '(371) 484-7575', 'On-contract'),
(6, 'Electrogenics', '24 Jockey Hollow Road \r\nHope Mills, NC 28348', '(749) 623-7099', 'On-contract'),
(7, 'Embaza', '65 8th Dr. \r\nOttawa, IL 61350', '(743) 189-1866', 'On-contract'),
(8, 'Frexion', '742 Smith Drive \r\nLake Villa, IL 60046', '(488) 414-6734', 'On-contract'),
(9, 'Mixple', '298 Argyle St. \r\nBeaver Falls, PA 15010', 'munge@me.com', 'On-contract'),
(10, 'Mokiro', '8 Newbridge St. \r\nRoanoke Rapids, NC 27870', 'cderoove@mac.com', 'On-contract'),
(11, 'Odure', '304 Bellevue Dr. \r\nFranklin, MA 02038', '(362) 398-4733', 'On-contract'),
(12, 'Workforcely', '8110 Foster Ave. \r\nPasadena, MD 21122', '(124) 256-3483', 'On-contract'),
(13, 'Ideaness', '271 Augusta St. \r\nShelton, CT 06484', '(926) 361-1415', 'On-contract'),
(14, 'Cryptesa', '971 Olive Drive \r\nElizabeth City, NC 27909', 'fbriere@gmail.com', 'On-contract'),
(15, 'Olvux', '9470 North Fordham Ave. \r\nMalvern, PA 19355', 'giafly@icloud.com', 'On-contract'),
(16, 'Tourux', '686 Arlington Ave. \r\nSylvania, OH 43560', 'jonathan@icloud.com', 'On-contract'),
(17, 'Fluxful', '46 Young Court \r\nMahopac, NY 10541', '(297) 482-8540', 'On-contract'),
(18, 'Relvax', '9332 Vernon Ave. \r\nBartlett, IL 60103', '(973) 809-0649', 'On-contract'),
(19, 'Anvux', '71 N. Creek Ave. \r\nMadison, AL 35758', 'crypt@live.com', 'On-contract'),
(20, 'Fingenic', '9737 Hill Court \r\nHialeah, FL 33010', '(583) 227-9238', 'On-contract'),
(21, 'Thesee', 'Anywhere,Anytime', 'drags@ymail.com', 'On-contract'),
(22, 'new', 'popo\r\n', '123', 'On-contract');

-- --------------------------------------------------------

--
-- Table structure for table `supply_orders`
--

CREATE TABLE `supply_orders` (
  `so_Id` int(11) NOT NULL,
  `so_DateTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `so_quantityOrdered` int(11) NOT NULL,
  `status` enum('Not started','Finished','','') NOT NULL,
  `f_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supply_orders`
--

INSERT INTO `supply_orders` (`so_Id`, `so_DateTime`, `so_quantityOrdered`, `status`, `f_Id`) VALUES
(1, '2017-10-05 09:22:18', 38, 'Not started', 5),
(2, '2017-10-13 08:19:19', 22, 'Not started', 5),
(3, '2017-10-14 07:14:20', 96, 'Not started', 5),
(4, '2017-10-20 12:20:21', 13, 'Not started', 5),
(5, '2017-10-21 14:18:23', 60, 'Not started', 5),
(6, '2017-10-19 06:17:19', 80, 'Not started', 5),
(7, '2017-10-07 16:25:25', 62, 'Not started', 5),
(8, '2017-10-03 08:26:25', 27, 'Not started', 5),
(9, '2017-10-10 08:19:22', 61, 'Not started', 8),
(10, '2017-10-05 10:21:21', 17, 'Not started', 8),
(11, '2017-10-05 10:21:20', 60, 'Not started', 8),
(12, '2017-10-19 15:27:21', 25, 'Not started', 8),
(13, '2017-10-17 12:26:28', 43, 'Not started', 8),
(14, '2017-10-04 15:28:19', 71, 'Not started', 8),
(15, '2017-10-05 10:25:23', 4, 'Not started', 8),
(16, '2017-10-20 15:32:26', 48, 'Not started', 8),
(17, '2017-10-25 12:17:16', 61, 'Not started', 11),
(18, '2017-10-21 13:23:23', 74, 'Not started', 11),
(19, '2017-10-09 15:27:25', 18, 'Not started', 11),
(20, '2017-10-07 16:29:26', 68, 'Not started', 11),
(21, '2017-10-25 14:25:28', 1, 'Not started', 11),
(22, '2017-10-24 17:23:20', 20, 'Not started', 11),
(23, '2017-10-02 09:26:28', 53, 'Not started', 11),
(24, '2017-10-30 14:30:30', 96, 'Not started', 11),
(25, '2017-10-07 11:27:27', 47, 'Not started', 15),
(26, '2017-10-19 10:24:17', 18, 'Not started', 15),
(27, '2017-10-26 09:18:23', 51, 'Not started', 15),
(28, '2017-10-14 13:29:20', 59, 'Not started', 15),
(29, '2017-10-05 13:27:24', 13, 'Not started', 15),
(30, '2017-10-09 10:08:12', 37, 'Not started', 15),
(31, '2017-10-20 13:27:27', 11, 'Not started', 15),
(32, '2017-10-03 06:15:15', 11, 'Not started', 15),
(33, '2017-10-11 12:21:17', 54, 'Not started', 20),
(34, '2017-10-08 11:24:27', 11, 'Not started', 20),
(35, '2017-10-10 11:21:21', 27, 'Not started', 20),
(36, '2017-10-24 08:20:19', 3, 'Not started', 20),
(37, '2017-10-19 13:22:20', 87, 'Not started', 20),
(38, '2017-10-07 14:27:27', 42, 'Not started', 20),
(39, '2017-10-04 13:27:26', 61, 'Not started', 20),
(40, '2017-10-19 10:27:18', 44, 'Not started', 20),
(41, '2018-02-08 15:14:40', 23, 'Not started', 11),
(42, '2018-02-08 15:18:14', 132, 'Not started', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`c_Id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`d_Id`),
  ADD KEY `d_f_Id` (`f_id`);

--
-- Indexes for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD PRIMARY KEY (`do_Id`),
  ADD KEY `do_d_Id` (`d_Id`),
  ADD KEY `do_c_Id` (`c_Id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  ADD PRIMARY KEY (`fa_Id`),
  ADD KEY `fa_f_Id` (`f_Id`);

--
-- Indexes for table `notify_delivery`
--
ALTER TABLE `notify_delivery`
  ADD PRIMARY KEY (`n_Id`),
  ADD KEY `n_f_Id` (`f_Id`),
  ADD KEY `n_d_Id` (`d_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_Id`),
  ADD KEY `o_c_Id` (`c_Id`),
  ADD KEY `o_f_Id` (`f_Id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`op_Id`),
  ADD KEY `op_o_id` (`o_Id`),
  ADD KEY `op_p_id` (`p_Id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`prdn_Id`),
  ADD KEY `prdn_f_Id` (`f_Id`),
  ADD KEY `prdn_p_Id` (`p_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_Id`);

--
-- Indexes for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD PRIMARY KEY (`rm_Id`),
  ADD KEY `rm_p_Id` (`p_Id`),
  ADD KEY `rm_supp_Id` (`supp_Id`),
  ADD KEY `rm_s_Id` (`s_Id`),
  ADD KEY `rm_so_id` (`so_id`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`s_Id`);

--
-- Indexes for table `storage_delivery_products`
--
ALTER TABLE `storage_delivery_products`
  ADD PRIMARY KEY (`sdp_Id`),
  ADD KEY `sdp_s_Id` (`s_Id`),
  ADD KEY `sdp_d_Id` (`d_Id`);

--
-- Indexes for table `storage_products`
--
ALTER TABLE `storage_products`
  ADD PRIMARY KEY (`sp_Id`),
  ADD KEY `sp_s_Id` (`s_Id`),
  ADD KEY `sp_p_Id` (`p_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supp_Id`);

--
-- Indexes for table `supply_orders`
--
ALTER TABLE `supply_orders`
  ADD PRIMARY KEY (`so_Id`),
  ADD KEY `so_f_Id` (`f_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `c_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `d_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  MODIFY `do_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  MODIFY `fa_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `notify_delivery`
--
ALTER TABLE `notify_delivery`
  MODIFY `n_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `op_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `prdn_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `raw_materials`
--
ALTER TABLE `raw_materials`
  MODIFY `rm_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
  MODIFY `s_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `storage_delivery_products`
--
ALTER TABLE `storage_delivery_products`
  MODIFY `sdp_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `storage_products`
--
ALTER TABLE `storage_products`
  MODIFY `sp_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supp_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `supply_orders`
--
ALTER TABLE `supply_orders`
  MODIFY `so_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `d_f_Id` FOREIGN KEY (`f_id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `delivery_orders`
--
ALTER TABLE `delivery_orders`
  ADD CONSTRAINT `do_c_Id` FOREIGN KEY (`c_Id`) REFERENCES `client` (`c_Id`),
  ADD CONSTRAINT `do_d_Id` FOREIGN KEY (`d_Id`) REFERENCES `delivery` (`d_Id`);

--
-- Constraints for table `faculty_attendance`
--
ALTER TABLE `faculty_attendance`
  ADD CONSTRAINT `fa_f_Id` FOREIGN KEY (`f_Id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `notify_delivery`
--
ALTER TABLE `notify_delivery`
  ADD CONSTRAINT `n_d_Id` FOREIGN KEY (`d_Id`) REFERENCES `delivery` (`d_Id`),
  ADD CONSTRAINT `n_f_Id` FOREIGN KEY (`f_Id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `o_c_Id` FOREIGN KEY (`c_Id`) REFERENCES `client` (`c_Id`),
  ADD CONSTRAINT `o_f_Id` FOREIGN KEY (`f_Id`) REFERENCES `faculty` (`f_id`);

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `op_o_id` FOREIGN KEY (`o_Id`) REFERENCES `orders` (`o_Id`),
  ADD CONSTRAINT `op_p_id` FOREIGN KEY (`p_Id`) REFERENCES `products` (`p_Id`);

--
-- Constraints for table `production`
--
ALTER TABLE `production`
  ADD CONSTRAINT `prdn_f_Id` FOREIGN KEY (`f_Id`) REFERENCES `faculty` (`f_id`),
  ADD CONSTRAINT `prdn_p_Id` FOREIGN KEY (`p_Id`) REFERENCES `products` (`p_Id`);

--
-- Constraints for table `raw_materials`
--
ALTER TABLE `raw_materials`
  ADD CONSTRAINT `rm_p_Id` FOREIGN KEY (`p_Id`) REFERENCES `products` (`p_Id`),
  ADD CONSTRAINT `rm_s_Id` FOREIGN KEY (`s_Id`) REFERENCES `storage` (`s_Id`),
  ADD CONSTRAINT `rm_so_id` FOREIGN KEY (`so_id`) REFERENCES `supply_orders` (`so_Id`),
  ADD CONSTRAINT `rm_supp_Id` FOREIGN KEY (`supp_Id`) REFERENCES `supplier` (`supp_Id`);

--
-- Constraints for table `storage_delivery_products`
--
ALTER TABLE `storage_delivery_products`
  ADD CONSTRAINT `sdp_d_Id` FOREIGN KEY (`d_Id`) REFERENCES `delivery` (`d_Id`),
  ADD CONSTRAINT `sdp_s_Id` FOREIGN KEY (`s_Id`) REFERENCES `storage` (`s_Id`);

--
-- Constraints for table `storage_products`
--
ALTER TABLE `storage_products`
  ADD CONSTRAINT `sp_p_Id` FOREIGN KEY (`p_Id`) REFERENCES `products` (`p_Id`),
  ADD CONSTRAINT `sp_s_Id` FOREIGN KEY (`s_Id`) REFERENCES `storage` (`s_Id`);

--
-- Constraints for table `supply_orders`
--
ALTER TABLE `supply_orders`
  ADD CONSTRAINT `so_f_Id` FOREIGN KEY (`f_Id`) REFERENCES `faculty` (`f_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
