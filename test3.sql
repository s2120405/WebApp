-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2023 at 06:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event_type` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `Venue` varchar(100) NOT NULL,
  `Event_start` time NOT NULL,
  `Event_end` time NOT NULL,
  `Event_date` date NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Event_type`, `event_id`, `Venue`, `Event_start`, `Event_end`, `Event_date`, `type_id`) VALUES
('Gender Reveal', 38, ' Katipunan Rd. Whiteplains', '12:40:10', '01:15:00', '2021-10-12', 5),
('Debut', 41, '106 Esteban Street Legaspi Village 1229', '09:30:45', '18:00:30', '2002-12-10', 1),
('', 70, 'Yangco Market 796 Ilaya Street Binondo 1000', '10:20:45', '15:25:30', '2002-12-10', 4),
('', 71, 'F. Jaca Street, Inayawan Pardo', '14:30:45', '19:30:30', '2012-06-12', 3),
('', 72, 'Bacolod City', '15:00:00', '04:00:00', '2012-12-01', 1),
('', 73, 'Brgy Concepcion', '15:00:00', '13:00:00', '2012-12-12', 2),
('', 74, 'Silay City', '17:30:00', '20:30:00', '2023-05-12', 4);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `type_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`type_id`, `type_name`, `type_desc`) VALUES
(1, 'Baby Shower', 'A Party Which Is Thrown To Celebrate The Impending'),
(2, 'Wedding', 'A Ceremony Or Act Of Joining Two People In Marriag'),
(3, 'Birthday', 'A Tradition Of Marking The Anniversary Of The Birt'),
(4, 'Debut', ' A Traditional Filipino Coming-of-age Celebration '),
(5, 'After Party', 'A Party After The Event');

-- --------------------------------------------------------

--
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `rental_id` int(11) UNSIGNED NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `rent_price` int(100) NOT NULL,
  `item_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`rental_id`, `item_name`, `rent_price`, `item_qty`) VALUES
(1, 'Carpet', 400, 30),
(2, 'Chairs', 500, 50),
(3, 'Table', 300, 30),
(4, 'Balloon Stand', 100, 25),
(5, 'Candelabra', 200, 20),
(6, ' Plastic Flowers', 20, 80),
(7, 'Lights', 150, 50),
(8, 'Party Hats', 10, 100);

-- --------------------------------------------------------

--
-- Table structure for table `rental_transac`
--

CREATE TABLE `rental_transac` (
  `trans_id` int(11) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_no` int(11) NOT NULL,
  `cash_depo` int(11) NOT NULL,
  `rental_id` int(11) NOT NULL,
  `cust_qty` int(11) NOT NULL,
  `item_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental_transac`
--

INSERT INTO `rental_transac` (`trans_id`, `cust_name`, `cust_no`, `cash_depo`, `rental_id`, `cust_qty`, `item_total`) VALUES
(1, 'Pablo ', 12345, 500, 7, 12, 0),
(2, 'Vlad', 12345, 700, 1, 1, 0),
(3, 'Gary', 12345, 0, 4, 2, 0),
(4, 'Nami', 12345, 700, 1, 1, 0),
(5, 'Zac', 12345, 300, 1, 4, 0),
(6, 'Key', 123456, 0, 7, 5, 0),
(7, 'Harold', 1234567, 0, 5, 8, 0),
(8, 'Mary', 12345, 0, 1, 4, 0),
(9, 'Tim', 123, 0, 6, 4, 0),
(10, 'Angela', 1234567, 0, 7, 6, 0),
(11, 'Finn', 12345, 0, 3, 5, 0),
(12, 'Jake', 1234567, 0, 3, 3, 0),
(29, 'Senna', 12345, 0, 4, 4, 0),
(30, 'Sadie', 9773902, 0, 7, 5, 0),
(31, 'Yna', 1234, 0, 8, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `user_id` int(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(12) NOT NULL,
  `user_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`user_id`, `user_email`, `user_password`, `user_name`) VALUES
(1, 'admin1', '12345', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`rental_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indexes for table `rental_transac`
--
ALTER TABLE `rental_transac`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `rental_id` (`rental_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `rental_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rental_transac`
--
ALTER TABLE `rental_transac`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
