-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 06:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(6, 'mokbul', '$2y$10$u8QcI.Mb.yxx6FyDnNaIWeVCPOvTG2tS9Y3nBSE6x1IYHZNYz3Upi'),
(7, 'ada', '$2y$10$v2pGUixxf/f3O5I9WFs6qehY.ryg/WBTCo81Ki4CR.8CyW2U14DH6');

-- --------------------------------------------------------

--
-- Table structure for table `non_ac`
--

CREATE TABLE `non_ac` (
  `Bus_Name` varchar(50) NOT NULL,
  `Boarding_Point` varchar(50) NOT NULL,
  `Dropping_Point` varchar(50) NOT NULL,
  `Fare` int(50) NOT NULL,
  `Seat` varchar(50) NOT NULL,
  `Distance` varchar(50) NOT NULL,
  `Travel_Time` varchar(50) NOT NULL,
  `Number_of_Trip` int(11) NOT NULL,
  `First_Trip` varchar(50) NOT NULL,
  `Last_Trip` varchar(50) NOT NULL,
  `Bus_Type` varchar(50) NOT NULL,
  `Bus_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_ac`
--

INSERT INTO `non_ac` (`Bus_Name`, `Boarding_Point`, `Dropping_Point`, `Fare`, `Seat`, `Distance`, `Travel_Time`, `Number_of_Trip`, `First_Trip`, `Last_Trip`, `Bus_Type`, `Bus_ID`) VALUES
('Ena Transport Pvt Ltd', 'Dhaka', 'Mymensingh', 320, '40', '116 Km', '3 Hrs', 40, '05:30 AM', '09:30 PM', 'Non AC', 1001),
('Shoukhin Express', 'Dhaka', 'Mymensingh', 280, '40', '116 Km', '3 Hrs', 26, '06:00 AM', '10:00 PM', 'Non AC', 1002),
('Shamim Enterprise Pvt Ltd', 'Dhaka', 'Mymensingh', 320, '40', '116 Km', '3 Hrs', 29, '06:00 AM', '11:15 PM', 'Non AC', 1003),
('Imam Enterprise', 'Dhaka', 'Mymensingh', 250, '40', '116 Km', '3 Hrs', 25, '04:30 AM', '08:00 PM', 'Non AC', 1005),
('Islam Poribohon', 'Dhaka', 'Mymensingh', 220, '40', '116 Km', '3 Hrs', 20, '04:30 AM', '08:00 PM', 'Non AC', 1006),
('Hajrat Shahjalal Enterprise', 'Dhaka', 'Mymensingh', 300, '40', '116 Km', '3 Hrs', 19, '05:15 AM', '08:20 PM', 'Non AC', 1007),
('Hajrat Shahjalal Enterprise ', 'Dhaka', 'Netrokona', 380, '40', '152 Km', '4 Hrs', 20, '04:30 AM', '08:00 PM', 'Non AC', 1008),
('Sonar Bangla', 'Dhaka', 'Mymensingh', 270, '40', '116 Km', '3 Hrs', 14, '04:30 AM', '09:00 PM', 'Non AC', 1009),
('Sonar Bangla', 'Dhaka', 'Sherpur', 350, '40', '182 Km', '4 Hrs', 14, '05:15 AM', '08:20 PM', 'Non AC', 1010),
('Sherpur Red Line', 'Dhaka', 'Mymensingh', 320, '40', '116 Km', '3 Hrs', 25, '04:30 AM', '09:30 PM', 'Non AC', 1011),
('Sherpur Red Line', 'Dhaka', 'Sherpur', 350, '40', '182 Km', '4 Hrs', 25, '04:30 AM', '09:30 AM', 'Non AC', 1012),
('Nabil Enterprise', 'Dhaka', 'Dinajpur', 900, '40', '390 Km', '10 Hrs', 12, '07:30 AM', '11:15 PM', 'Non AC', 1013),
('SR Travels', 'Dhaka', 'Dinajpur', 900, '40', '390 Km', '10 Hrs', 5, '07:30 AM', '11:15 PM', 'Non AC', 1014),
('Hanif Enterprise', 'Dhaka', 'Dinajpur', 900, '40', '390 Km', '10 Hrs', 16, '07:30 AM', '11:15 PM', 'Non AC', 1015),
('Tungipara Express', 'Dhaka', 'Satkhira', 800, '40', '335 Km', '9 Hrs', 21, '07:30 AM', '11:15 PM', 'Non AC', 1016),
('Diganta Paribohon', 'Dhaka', 'Satkhira', 700, '40', '335 Km', '9 Hrs', 1, '10:30 PM', '10:30 PM', 'Non AC', 1018),
('SP Golden Line', 'Dhaka', 'Satkhira', 650, '40', '335 Km', '9 Hrs', 8, '06:00 AM', '11:15 PM', 'Non AC', 1019),
('Emad Poribohn', 'Dhaka', 'Satkhira', 750, '40', '335 Km', '9 Hrs', 4, '06:00 AM', '09:00 PM', 'Non AC', 1020),
('MR Poribohon', 'Dhaka', 'Satkhira', 650, '40', '335 Km', '9 Hrs', 8, '06:00 AM', '11:15 PM', 'Non AC', 1021),
('SR Travels', 'Dhaka', 'Hili', 700, '40', '296 Km', '8 Hrs', 12, '07:30 AM', '09:30 PM', 'Non AC', 1022),
('Hanif Enterprise', 'Dhaka', 'Hili', 700, '40', '296 Km', '8 Hrs', 5, '06:00 AM', '09:30 AM', 'Non AC', 1023),
('Hanif Enterprise', 'Dhaka', 'Bandarban', 900, '40', '376 Km', '12 Hrs', 6, '10:30 AM', '10:15 PM', 'Non AC', 1024),
('Soudia', 'Dhaka', 'Bandarban', 900, '40', '376 Km', '12 Hrs', 40, '06:00 AM', '11:15 PM', 'Non AC', 1025),
('Hanif Enterprise', 'Dhaka', 'Rangamati', 870, '40', '304 Km', '12 Hrs', 2, '06:45 AM', '08:00 PM', 'Non AC', 1026),
('Hanif KTC', 'Dhaka', 'Kushtia', 650, '40', '248 Km', '6 Hrs', 4, '05:15 AM', '08:20 PM', 'Non AC', 1027),
('Hanif Enterprise', 'Dhaka', 'Kushtia', 650, '40', '248 Km', '6 Hrs', 13, '07:30 AM', '11:30 PM', 'Non AC', 1028),
('Shamoly Poribohon', 'Dhaka', 'Rangamati', 650, '40', '248 Km', '12 Hrs', 5, '06:00 AM', '08:20 PM', 'Non AC', 1029),
('Hanif Enterprise', 'Dhaka', 'Coxs Bazar', 1000, '40', '390 Km', '12 Hrs', 12, '07:30 AM', '11:15 PM', 'Non AC', 1030),
('Ena Transport Pvt Ltd', 'Dhaka', 'Coxs Bazar', 1000, '40', '390 Km', '12 Hrs', 5, '07:30 AM', '09:30 AM', 'Non AC', 1031),
('Soudia X', 'Dhaka', 'Coxs Bazar', 1000, '40', '390 Km', '12 Hrs', 4, '06:45 AM', '09:30 PM', 'Non AC', 1032),
('Shamoly Poribohon', 'Dhaka', 'Coxs Bazar', 900, '40', '390 Km', '12 Hrs', 8, '07:30 AM', '10:30 PM', 'Non AC', 1033),
('Marsa Poribohon', 'Dhaka', 'Coxs Bazar', 1000, '40', '390 Km', '12 Hrs', 4, '07:30 AM', '11:15 PM', 'Non AC', 1034),
('Nabil Enterprise', 'Dhaka', 'Bogura', 500, '40', '192 Km', '12 Hrs', 8, '07:30 AM', '11:15 PM', 'Non AC', 1035),
('Akota ', 'Dhaka', 'Bogura', 560, '40', '192 Km', '5 Hrs', 12, '07:00 AM', '11:00 PM', 'Non AC', 1036),
('SR Travels', 'Dhaka', 'Bogura', 540, '40', '192 Km', '5 Hrs', 38, '07:30 AM', '11:00 PM', 'Non AC', 1037),
('Hanif Enterprise', 'Dhaka', 'Bogura', 500, '40', '192 Km', '5 Hrs', 17, '07:30 AM', '11:15 PM', 'Non AC', 1038),
('Orin Travels', 'Dhaka', 'Bogura', 600, '40', '192 Km', '5 Hrs', 12, '07:30 AM', '10:00 PM', 'Non AC', 1039),
('Hanif Enterprise', 'Dhaka', 'Chattogram', 650, '40', '265 Km', '7 Hrs', 25, '01:45 AM', '11:45 PM', 'Non AC', 1040),
('Ena Transport Pvt Ltd', 'Dhaka', 'Chattogram', 670, '40', '265 Km', '7 Hrs', 20, '04:30 AM', '11:15 PM', 'Non AC', 1041),
('Soudia X', 'Dhaka', 'Chattogram', 650, '40', '265 Km', '6 Hrs', 37, '01:00 AM', '11:45 PM', 'Non AC', 1042),
('Unique Enterprise', 'Dhaka', 'Chattogram', 700, '40', '265 Km', '5 Hrs', 25, '01:30 AM', '11:15 PM', 'Non AC', 1043),
('Shamoly Poribohon', 'Dhaka', 'Chattogram', 650, '40', '265 Km', '6 Hrs', 21, '01:45 AM', '10:30 PM', 'Non AC', 1044),
('Marsa ', 'Dhaka', 'Chattogram', 560, '40', '265 Km', '5 Hrs', 12, '07:00 AM', '11:00 PM', 'Non AC', 1045),
('Akota', 'Dhaka', 'Naoga', 680, '40', '246 Km', '6 Hrs', 18, '06:00 AM', '10:00 PM', 'Non AC', 1046),
('Ena Transport Pvt Ltd', 'Dhaka', 'Khulna', 650, '40', '248 Km', '8 Hrs', 21, '06:00 AM', '11:45 PM', 'Non AC', 1047),
(' Hanif Enterprise', 'Dhaka', 'Khulna', 650, '40', '246 Km', '8 Hrs', 12, '4:45 AM', '11:30 PM', 'Non AC', 1048),
('Tungipara Express', 'Dhaka', 'Khulna', 650, '40', '246 Km', '8 Hrs', 41, '5:40 AM', '11:50 PM', 'Non AC', 1049),
('Emad Poribahan', 'Dhaka', 'Khulna', 650, '40', '248 Km', '8 Hrs', 31, '4:30 AM', '10:00 PM', 'Non AC', 1050),
('Dola Poribahan', 'Dhaka', 'Khulna', 700, '40', '246 Km', '8 Hrs', 6, '4:30 PM', '10:30 PM', 'Non AC', 1051),
('Akota', 'Dhaka', 'Rajshahi', 710, '40', '245 Km', '8 Hrs', 35, '6:00 AM', '11:55 PM', 'Non AC', 1052),
('KTC Hanif', 'Dhaka', 'Rajshahi', 700, '40', '245 Km', '8 Hrs', 23, '6:00 AM', '11:45 PM', 'Non AC', 1053),
('Ena Transport Pvt Ltd', 'Dhaka', 'Sylhet', 680, '40', '245 Km', '6 Hrs', 41, '5:30 AM', '11:55 PM', 'Non AC', 1054),
('Hanif Enterprise', 'Dhaka', 'Sylhet', 700, '40', '248 Km', '6 Hrs', 25, '06:00 AM', '11:45 PM', 'Non AC', 1055),
('Ena Transport Pvt Ltd', 'Dhaka', 'Barishal', 600, '40', '247 Km', '8 Hrs', 3, '6:00 AM', '11:00 PM', 'Non AC', 1056),
('Hanif Enterprise', 'Dhaka', 'Barishal', 600, '40', '247 Km', '8 Hrs', 19, '6:00 AM', '11:15 PM', 'Non AC', 1057),
('Shohag Enterprise', 'Dhaka', 'Barishal', 600, '40', '247 Km', '8 Hrs', 9, '06:00 AM', '11:15 PM', 'Non AC', 1058),
('Sakura Poribohon', 'Dhaka', 'Barishal', 550, '40', '247 Km', '8 Hrs', 10, '06:00 AM', '11:15 PM', 'Non AC', 1059),
('Labiba', 'Dhaka', 'Barishal', 650, '40', '247 Km', '8 Hrs', 12, '06:00 AM', '11:15 PM', 'Non AC', 1060),
('Shamim Enterprise Pvt Ltd', 'Dhaka', 'Mymensingh', 500, '40', '116 Km', '3 Hrs', 10, '07:30 AM', '08:00 PM', 'AC', 2001),
('Ena Transport Pvt Ltd', 'Dhaka', 'Mymensingh', 400, '36', '116 Km', '3 Hrs', 7, '08:00 AM', '05:00 PM', 'AC', 2002),
('Ena Transport Pvt Ltd', 'Dhaka', 'Chattogram', 1000, '36', '265 Km', '7 Hrs', 5, '01:00 PM', '11:50 PM', 'AC', 2003),
('Nabil Enterprise', 'Dhaka', 'Dinajpur', 1200, '36', '390 Km', '10 Hrs', 5, '08:00 AM', '11:50 PM', 'AC', 2004),
('Ena Transport Pvt Ltd', 'Dhaka', 'Coxs Bazar', 1200, '36', '390 Km', '10 Hrs', 7, '08:00 AM', '11:50 PM', 'AC', 2005),
('Ena Transport Pvt Ltd', 'Dhaka', 'Khulna', 1000, '36', '246 Km', '8 Hrs', 5, '01:00 PM', '11:50 PM', 'AC', 2007),
('Soudia Silkey', 'Dhaka', 'Bandarban', 1500, '36', '376 Km', '10 Hrs', 5, '08:00 AM', '11:50 PM', 'AC', 2008),
('Hanif Enterprice', 'Dhaka', 'Coxs Bazar', 1500, '36', '375 Km', '10 Hrs', 6, '08:00 AM', '11:50 PM', 'AC', 2009),
('Soudia Silkey', 'Dhaka', 'Coxs Bazar', 1200, '36', '390 Km', '10 Hrs', 7, '01:00 PM', '11:50 PM', 'AC', 2010),
('Shohag', 'Dhaka', 'Coxs Bazar', 1200, '36', '390 Km', '10 Hrs', 5, '08:00 AM', '11:50 PM', 'AC', 2011),
('Ena Transport Pvt Ltd', 'Dhaka', 'Sylhet', 1200, '36', '246 Km', '7 Hrs', 5, '5:30 AM', '11:00 PM', 'AC', 2012),
('Senjuti Travels', 'Dhaka', 'Coxs Bazar', 1200, '36', '390 Km', '10 Hrs', 7, '11:50 AM', '11:50 PM', 'AC', 2013),
('Ena Transport Pvt Ltd', 'Dhaka', 'Barishal', 1000, '36', '246 Km', '8 Hrs', 6, '5:30 AM', '11:50 PM', 'AC', 2014),
('Sakura', 'Dhaka', 'Barishal', 800, '36', '246 Km', '7 Hrs', 6, '5:30 AM', '11:50 PM', 'AC', 2015),
('Hanif Enterprice', 'Dhaka', 'Rajshahi', 2000, '34', '265 Km', '7 Hrs', 5, '08:00 AM', '11:50 PM', 'Volvo', 3001),
('Evergreen', 'Dhaka', 'Chattogram', 2000, '36', '265 Km', '7 Hrs', 2, '08:00 AM', '11:50 PM', 'Sleeper', 3002),
('Ena Transport Pvt Ltd', 'Dhaka', 'Coxs Bazar', 1700, '36', '390 Km', '10 Hrs', 5, '08:00 AM', '11:50 PM', 'Hyundai', 4001),
('Ena Transport Pvt Ltd', 'Dhaka', 'Khulna', 1200, '36', '246 Km', '7 Hrs', 7, '01:00 PM', '11:50 PM', 'Hyundai', 4002),
('Shyamoli NR', 'Dhaka', 'Kolkata', 2500, '36', '550 Km', '18 Hrs', 2, '01:00 PM', '11:50 PM', 'Hyundai', 4003),
('Ena Transport Pvt Ltd', 'Dhaka', 'Sylhet', 1500, '36', '246 Km', '7 Hrs', 2, '5:30 AM', '05:00 PM', 'Hyundai', 4004),
('Ena Transport Pvt Ltd', 'Dhaka', 'Barishal', 1200, '36', '246 Km', '8 Hrs', 5, '5:30 AM', '11:50 PM', 'Hyundai', 4005),
('Shyamoli NR', 'Dhaka', 'Coxs Bazar', 1200, '36', '390 Km', '10 Hrs', 7, '08:00 AM', '11:50 PM', 'Hyundai', 4006),
('Relax Travels', 'Dhaka', 'Coxs Bazar', 1500, '36', '390 Km', '10 Hrs', 2, '11:50 AM', '11:50 PM', 'Hyundai', 4007),
('Shohag', 'Dhaka', 'Coxs Bazar', 1800, '36', '390 Km', '10 Hrs', 7, '08:00 AM', '11:00 PM', 'Scania', 5000),
('Shohag', 'Dhaka', 'Kolkata', 3000, '36', '550 Km', '18 Hrs', 2, '08:00 AM', '11:50 PM', 'Scania', 5001),
('Nabil Enterprise', 'Dhaka', 'Bogura', 1500, '36', '192 Km', '5 Hrs', 6, '08:00 AM', '05:00 PM', 'Scania', 5002);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`Name`, `Phone`, `Email`, `Password`) VALUES
('Virat Kohli', '011268666988', 'viratkohli18@yahoo.com', 'AnusjkhaSharma'),
('Arnab', '01777447550', 'shahrierarnob535@gmail.com', '@RnOb1268'),
('Joe Root', '01777447551', 'root78@yahoo.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `PNR` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` varchar(100) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`PNR`, `Rating`, `Review`, `Time`, `Name`, `Email`) VALUES
(638005, 5, 'sorok pothe bimaner chowa', '2024-04-23 01:58:38', '', ''),
(811402, 2, 'Very Bad Service', '2024-04-23 01:53:59', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Passenger_Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Bus_Name` varchar(255) DEFAULT NULL,
  `Boarding_Point` varchar(255) DEFAULT NULL,
  `Dropping_Point` varchar(255) DEFAULT NULL,
  `Seat` varchar(5000) DEFAULT NULL,
  `PNR` varchar(10) NOT NULL,
  `Time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Passenger_Name`, `Phone`, `Bus_Name`, `Boarding_Point`, `Dropping_Point`, `Seat`, `PNR`, `Time`) VALUES
('Abrar Shahrier Arnab', '01777447550', 'Shyamoli NR', 'Dhaka', 'Kolkata', 'B1', '170973', '2024-04-29 03:19:58'),
('Abrar Shahrier Arnab', '01777447550', 'Ena Transport Pvt Ltd', 'Dhaka', 'Mymensingh', 'A1', '385142', '2024-04-29 18:12:25'),
('Abrar Shahrier Arnab', '01777447550', 'Shyamoli NR', 'Dhaka', 'Kolkata', 'A3', '441259', '2024-04-29 03:17:23'),
('Abrar Shahrier Arnab', '01777447550', 'Ena Transport Pvt Ltd', 'Dhaka', 'Mymensingh', 'A1', '511324', '2024-04-29 18:09:05'),
('Abrar Shahrier Arnab', '01777447550', 'Shyamoli NR', 'Dhaka', 'Kolkata', 'A4', '750525', '2024-04-29 03:16:17'),
('Abrar Shahrier Arnab', '01777447550', 'Ena Transport Pvt Ltd', 'Dhaka', 'Mymensingh', 'A1', '968124', '2024-04-29 18:11:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `non_ac`
--
ALTER TABLE `non_ac`
  ADD PRIMARY KEY (`Bus_ID`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`Phone`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`PNR`,`Email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`PNR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
