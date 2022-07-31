-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jul 31, 2022 at 09:56 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `vehicle_brand`, `vehicle_model`, `time`, `date`, `problem_description`, `approval_status`, `client_client_id`, `mechanic_mech_id`) VALUES
(2, 'Range rover', 'Sport', '08:30:00', '2022-07-15', 'I have an issue with engine. It has been smoking a lot recently especially after driving over long distances', 1, 1, 2),
(3, 'Toyota', 'hiace', '11:20:00', '2022-07-16', 'The vehicle is smoking alot. plus I hear weird sounds when driving', 2, 1, 6);

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
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`mech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic`
--

INSERT INTO `mechanic` (`mech_id`, `name`, `town`, `description`, `phone`, `longitude`, `latitude`, `email`, `password`) VALUES
(2, 'Hank\'s Garage', 'Rongai', 'We are located 200 meters from Tuskys Rongai, next to Baileys Restaurant', '+254721452156', 36.774399668447, -1.4107076071854, 'hanksgarage@example.com', '$2y$10$draD9uSb.ZBaVKuWJzSuxu9IY2vGQDRBr8/EOTQ7qZo3xMmXJsISi'),
(4, 'Vroom Auto Repair', 'Rongai', 'Our services center is located at Rubis petrol Station Ongata rongai.', '+254769231475', 36.76927128481, -1.3942330517264, 'vroomautorepair@example.com', '$2y$10$s9ZOnl/QRxI.k4coj.h5u.m7hODTWDHf7DyRaIaLJr70w65GKDguO'),
(5, 'Halima\'s garage', 'Rongai', 'Gataka road, near Blessed fitness gym', '254', 36.770462185613, -1.3819199622587, 'halimasgarage@example.com', '$2y$10$YsGPavl2hnSwU84w92V4FOH.WTr5C1vNDtRY4uuxy3pLKSFu807x.'),
(6, 'Multimedia university', 'Rongai', 'We are located opposite nairobii national park', '+254723275590', 36.770462185613, -1.3818770593961, 'multimedia@gmal.com', '$2y$10$VzhWILHJzFslwh6OARTjauFR7uxFn3bPH0Ky8oN2XPYFGDFbV623W');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_gallery`
--

DROP TABLE IF EXISTS `mechanic_gallery`;
CREATE TABLE IF NOT EXISTS `mechanic_gallery` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(200) NOT NULL,
  `mech_id` int(11) NOT NULL,
  PRIMARY KEY (`image_id`),
  KEY `mech_id` (`mech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic_gallery`
--

INSERT INTO `mechanic_gallery` (`image_id`, `image_path`, `mech_id`) VALUES
(13, '8.jpg', 5),
(15, '9.jpg', 5),
(16, '6.jpg', 5),
(17, '2.jpg', 5),
(18, '4.jpg', 5),
(19, '11.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mechanic_services`
--

DROP TABLE IF EXISTS `mechanic_services`;
CREATE TABLE IF NOT EXISTS `mechanic_services` (
  `service_id` int(11) NOT NULL AUTO_INCREMENT,
  `service` varchar(200) NOT NULL,
  `mechanic_mech_id` int(11) NOT NULL,
  PRIMARY KEY (`service_id`),
  KEY `mechanic_mech_id` (`mechanic_mech_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mechanic_services`
--

INSERT INTO `mechanic_services` (`service_id`, `service`, `mechanic_mech_id`) VALUES
(22, 'Engine transmission system repair', 5),
(23, 'Towing services', 5),
(24, 'Panel beating', 5),
(25, 'Wheel allignment', 5);

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
-- Constraints for table `mechanic_gallery`
--
ALTER TABLE `mechanic_gallery`
  ADD CONSTRAINT `mechanic_gallery_ibfk_1` FOREIGN KEY (`mech_id`) REFERENCES `mechanic` (`mech_id`);

--
-- Constraints for table `mechanic_services`
--
ALTER TABLE `mechanic_services`
  ADD CONSTRAINT `mechanic_services_ibfk_1` FOREIGN KEY (`mechanic_mech_id`) REFERENCES `mechanic` (`mech_id`);

--
-- Constraints for table `working_hours`
--
ALTER TABLE `working_hours`
  ADD CONSTRAINT `working_hours_ibfk_1` FOREIGN KEY (`mechanic_mech_id`) REFERENCES `mechanic` (`mech_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
