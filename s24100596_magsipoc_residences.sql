-- phpMyAdmin SQL Dump
-- version 5.2.1deb1+deb12u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 08:19 AM
-- Server version: 10.11.14-MariaDB-0+deb12u2
-- PHP Version: 8.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s24100596_magsipoc_residences`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactNo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `firstName`, `lastName`, `email`, `contactNo`) VALUES
(1, 'josh', 'magsipoc', 'joshmags12@gmail.com', 12345678),
(2, 'Joe', 'Nard', 'jonard@gmail.com', 12345678),
(3, 'Jay', 'Oh', 'jayo@gmail.com', 12345678),
(4, 'Bern', 'Ard', 'bern@gmail.com', 2345678),
(5, 'Joshua', 'Mangubat', 'joshuamangubat@gmail.com', 6130505),
(6, 'gwapo', 'man', 'gwapo@gmail.com', 12345678);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `feedback` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `roomNo`, `feedback`) VALUES
(8, 1, 'Aircon needs fixing');

-- --------------------------------------------------------

--
-- Table structure for table `guestRooms`
--

CREATE TABLE `guestRooms` (
  `id` int(11) NOT NULL,
  `roomNo` int(10) NOT NULL,
  `checkIn` varchar(50) NOT NULL,
  `checkOut` varchar(50) NOT NULL,
  `pendingPayment` varchar(50) NOT NULL,
  `nextPayment` varchar(50) NOT NULL,
  `requestService` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guestRooms`
--

INSERT INTO `guestRooms` (`id`, `roomNo`, `checkIn`, `checkOut`, `pendingPayment`, `nextPayment`, `requestService`) VALUES
(1, 1, 'Mar 28 2025', '', 'YES', 'May 28 2025', 'YES'),
(2, 2, 'Mar 27 2025', '', 'NO', 'May 27 2025', 'YES'),
(3, 3, 'Mar 26 2025', '', 'NO', 'May 26 2025', ''),
(4, 4, 'Mar 25 2025', '', 'NO', 'May 25 2025', ''),
(5, 5, 'Feb 10 2025', '', 'NO', 'May 10 2025', ''),
(6, 6, 'Apr 4 2025', '', 'NO', 'Jun 4 2025', 'YES'),
(7, 7, 'Apr 13 2025', '', 'NO', 'Jun 13 2025', ''),
(8, 8, 'Apr 24 2025', '', 'YES', 'May 24 2025', ''),
(9, 9, 'May 1 2025', '', 'NO', 'Jun 1 2025', ''),
(10, 10, 'May 5 2025', '', 'YES', 'Jun 5 2025', ''),
(11, 11, 'Jan 25 2025', '', 'YES', 'May 25 2025', 'NO'),
(12, 12, 'Feb 14 2025', '', 'YES', 'May 14 2025', ''),
(13, 13, 'May 7 2025', '', 'YES', 'Jun 7 2025', ''),
(14, 14, 'May 12 2025', '', 'YES', 'Jun 12 2025', ''),
(15, 15, 'Jan 25 2025', '', 'YES', 'May 25 2025', '');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `guestName` varchar(50) NOT NULL,
  `contactNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `roomNo`, `guestName`, `contactNo`) VALUES
(1, 1, 'Stephen', '0917-523-8471'),
(2, 2, 'Joshua', '0908-134-9726'),
(3, 3, 'James', '0927-685-1934'),
(4, 4, 'Paul', '0956-781-2043'),
(5, 5, 'Bernard', '0998-352-1847'),
(6, 6, 'Bab', '0915-629-0385'),
(7, 7, 'Clarence', '0961-702-8356'),
(8, 8, 'Jose', '0918-240-9672'),
(9, 9, 'Anthony', '0947-583-1269'),
(10, 10, 'Jake', '0935-617-8032'),
(11, 11, 'Jin', '0905-384-2195'),
(12, 12, 'Jay', '0920-176-4538'),
(13, 13, 'Kai', '0919-728-6041'),
(14, 14, 'Joe', '0968-305-7924'),
(15, 15, 'Matthew', '0997-140-9823');

-- --------------------------------------------------------

--
-- Table structure for table `roomBookings`
--

CREATE TABLE `roomBookings` (
  `id` int(11) NOT NULL,
  `checkInDate` varchar(50) NOT NULL,
  `checkInStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomBookings`
--

INSERT INTO `roomBookings` (`id`, `checkInDate`, `checkInStatus`) VALUES
(1, 'March 28, 2025', 'Appointed'),
(2, 'March 27 2025', 'Appointed'),
(3, 'Apr 1 2025', 'Pending'),
(4, 'May 10, 2025', 'Appointed'),
(5, 'May 13, 2025', 'Pending'),
(6, 'May 21, 2025', 'Appointed');

-- --------------------------------------------------------

--
-- Table structure for table `roomPayment`
--

CREATE TABLE `roomPayment` (
  `id` int(11) NOT NULL,
  `roomNo` int(50) NOT NULL,
  `pendingPayment` varchar(50) NOT NULL,
  `paidStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomPayment`
--

INSERT INTO `roomPayment` (`id`, `roomNo`, `pendingPayment`, `paidStatus`) VALUES
(1, 1, '5000', 'PAID'),
(2, 2, '5300', 'PENDING'),
(3, 3, '5000', 'PENDING'),
(4, 4, '5210', 'PAID'),
(5, 5, '5100', 'PAID'),
(6, 6, '5000', 'PENDING'),
(7, 7, '5050', 'PENDING'),
(8, 8, '5180', 'PAID'),
(9, 9, '5080', 'PENDING'),
(10, 10, '5210', 'PENDING'),
(11, 11, '5180', 'PAID'),
(12, 12, '5210', 'PENDING'),
(13, 13, '5100', 'PAID'),
(14, 14, '5000', 'PENDING'),
(15, 15, '5080', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `roomStatus`
--

CREATE TABLE `roomStatus` (
  `id` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `statusUpdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomStatus`
--

INSERT INTO `roomStatus` (`id`, `roomNo`, `statusUpdate`) VALUES
(1, 1, 'occupied'),
(2, 2, 'vacant'),
(3, 3, 'vacant'),
(4, 4, 'vacant'),
(5, 5, 'occupied'),
(6, 6, 'vacant'),
(7, 7, 'OCCUPIED'),
(8, 8, 'OCCUPIED'),
(9, 9, 'OCCUPIED'),
(10, 10, 'vacant'),
(11, 11, 'vacant'),
(12, 12, 'OCCUPIED'),
(13, 13, 'OCCUPIED'),
(14, 14, 'OCCUPIED'),
(15, 15, 'vacant');

-- --------------------------------------------------------

--
-- Table structure for table `roomTasks`
--

CREATE TABLE `roomTasks` (
  `id` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `task` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomTasks`
--

INSERT INTO `roomTasks` (`id`, `roomNo`, `task`) VALUES
(1, 1, 'Cleaned'),
(2, 2, 'Needs Cleaning'),
(3, 3, 'Cleaned'),
(4, 4, 'Cleaned'),
(5, 5, 'Needs Cleaning'),
(6, 6, 'Needs Cleaning'),
(7, 7, 'Cleaned'),
(8, 8, 'Cleaned'),
(9, 9, 'Needs Cleaning'),
(10, 10, 'Cleaned'),
(11, 11, 'Cleaned'),
(12, 12, 'Needs Cleaning'),
(13, 13, 'Needs Cleaning'),
(14, 14, 'Needs Cleaning'),
(15, 15, 'Needs Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin1', 'adminpass', 'admin'),
(2, 'staff1', 'staffpass', 'staff'),
(3, 'room1', 'room1pass', 'guest'),
(4, 'room2', 'room2pass', 'guest'),
(5, 'room3', 'room3pass', 'guest'),
(6, 'room4', 'room4pass', 'guest'),
(7, 'room5', 'room5pass', 'guest'),
(8, 'room6', 'room6pass', 'guest'),
(9, 'room7', 'room7pass', 'guest'),
(10, 'room8', 'room8pass', 'guest'),
(11, 'room9', 'room9pass', 'guest'),
(12, 'room10', 'room10pass', 'guest'),
(13, 'room11', 'room11pass', 'guest'),
(14, 'room12', 'room12pass', 'guest'),
(15, 'room13', 'room13pass', 'guest'),
(16, 'room14', 'room14pass', 'guest'),
(17, 'room15', 'room15pass', 'guest');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guestRooms`
--
ALTER TABLE `guestRooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomBookings`
--
ALTER TABLE `roomBookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomPayment`
--
ALTER TABLE `roomPayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomStatus`
--
ALTER TABLE `roomStatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomTasks`
--
ALTER TABLE `roomTasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `guestRooms`
--
ALTER TABLE `guestRooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roomBookings`
--
ALTER TABLE `roomBookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roomPayment`
--
ALTER TABLE `roomPayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roomStatus`
--
ALTER TABLE `roomStatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roomTasks`
--
ALTER TABLE `roomTasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
