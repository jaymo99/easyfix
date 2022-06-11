-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 11, 2022 at 08:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_brand` varchar(20) NOT NULL,
  `vehicle_model` varchar(20) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `problem_description` text NOT NULL,
  `approval_status` int(11) NOT NULL DEFAULT '0',
  `client_client_id` int(11) NOT NULL,
  `mechanic_mech_id` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `mechanic_mech_id` (`mechanic_mech_id`),
  KEY `client_client_id` (`client_client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(20) NOT NULL,
  `m_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `longitude` int(11) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `f_name`, `m_name`, `l_name`, `longitude`, `latitude`, `email`, `password`) VALUES
(1, 'James', 'Mwaura', 'Kariuki', NULL, NULL, 'karisjaymo99@gmail.com', '$2y$10$0jU0UAs01RgpqsWbFxf0VeAoUSKMCp4cMz/DQVZL4XlEmj7las1ki');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

DROP TABLE IF EXISTS `mechanic`;
CREATE TABLE IF NOT EXISTS `mechanic` (
  `mech_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `town` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(13) NOT NULL,
  `longitude` int(11) DEFAULT NULL,
  `latitude` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`mech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`mech_id`, `name`, `town`, `description`, `phone`, `longitude`, `latitude`, `email`, `password`) VALUES
(1, 'Mr. Handyman & sons', 'Nairobi - Rongai', 'We are located in Rongai-tumaini, Opposite Oliver Twist Club.', '+254712345678', NULL, NULL, 'email@example.com', '$2y$10$UHY16FW1RJTX07oCl7swtOCfEwLHkWD.8pdymGyCqueomuSDf7vXK'),
(2, 'Hank\'s Garage', 'Rongai', 'We are located 200 meters from Tuskys Rongai, next to Baileys Restaurant', '+254721452156', NULL, NULL, 'hanksgarage@example.com', '$2y$10$draD9uSb.ZBaVKuWJzSuxu9IY2vGQDRBr8/EOTQ7qZo3xMmXJsISi'),
(3, 'J and R Auto Service Center', 'Kiserian', 'We are located next to Kiserian District Hospital, Opposite Ole-kipis petrol station', '+254756791354', NULL, NULL, 'jandrautoservicecenter@example.com', '$2y$10$KGkJeQyLAQYb4KQGV52qDu.avdinoo79o24jIWDAYN1RExsWrPnee'),
(4, 'Vroom Auto Repair', 'Rongai', 'Our services center is located at Rubis petrol Station Ongata rongai.', '+254769231475', NULL, NULL, 'vroomautorepair@example.com', '$2y$10$s9ZOnl/QRxI.k4coj.h5u.m7hODTWDHf7DyRaIaLJr70w65GKDguO');

-- --------------------------------------------------------

--
-- Table structure for table `working_hours`
--

DROP TABLE IF EXISTS `working_hours`;
CREATE TABLE IF NOT EXISTS `working_hours` (
  `day` int(11) NOT NULL AUTO_INCREMENT,
  `opening_time` time NOT NULL DEFAULT '08:00:00',
  `closing_time` time NOT NULL DEFAULT '17:00:00',
  `mechanic_mech_id` int(11) NOT NULL,
  PRIMARY KEY (`day`),
  KEY `mechanic_mech_id` (`mechanic_mech_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`mechanic_mech_id`) REFERENCES `mechanic` (`mech_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`client_client_id`) REFERENCES `client` (`client_id`);

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_ibfk_1` FOREIGN KEY (`mechanic_mech_id`) REFERENCES `mechanic` (`mech_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
