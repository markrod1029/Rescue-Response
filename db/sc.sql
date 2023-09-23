-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 06:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(155) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `position` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `contact`, `position`, `username`, `password`, `photo`) VALUES
(13, 'Bernabe Bacani Jr.', '09123456789', 'LDRRM Officer IV', 'administrator', '$2y$10$HEBYn6mBFji7kY5yz02I.uUtJtqEgWmQyyl25jJD8KZAdlI/.Wpoa', 'picjpg');

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`id`, `name`, `message`, `date`, `status`) VALUES
(11, '', 'No classes in kindergarten', '2023-01-17 04:35:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `evacuations`
--

CREATE TABLE `evacuations` (
  `id` int(11) NOT NULL,
  `name` varchar(355) NOT NULL,
  `location` varchar(255) NOT NULL,
  `point_person` varchar(150) NOT NULL,
  `number` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evacuations`
--

INSERT INTO `evacuations` (`id`, `name`, `location`, `point_person`, `number`, `status`) VALUES
(1, 'Arenas-Resuello City Sports Gym', 'Palaris Street, City Proper', 'Lourdes R. Pinto', '09088130755', 'Permanent'),
(2, 'Bacnar Mini-Gym', 'Bacnar Elementary School', 'Lourdes R. Pinto', '09088130755', 'Permanent'),
(3, 'Doyong Mini Gym', 'Doyong National High School', 'Jhobert', '846433468', 'in Partnership with the school'),
(4, 'Balite Mini Gym', 'Balite Sur', 'Erwina', '09088130755', 'Permanent');

-- --------------------------------------------------------

--
-- Table structure for table `hotline`
--

CREATE TABLE `hotline` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hotline_num` varchar(50) NOT NULL,
  `phone_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotline`
--

INSERT INTO `hotline` (`id`, `name`, `hotline_num`, `phone_num`) VALUES
(0, 'CDRRMO', '(075) 955-5911', '9494172265');

-- --------------------------------------------------------

--
-- Table structure for table `incident_info`
--

CREATE TABLE `incident_info` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `month` int(11) NOT NULL,
  `call_time` time NOT NULL,
  `incident` varchar(255) NOT NULL,
  `sub_incident` varchar(50) NOT NULL,
  `place_incident` varchar(255) NOT NULL,
  `injury_damage` varchar(255) NOT NULL,
  `actions_taken` varchar(255) NOT NULL,
  `transported_to` varchar(255) NOT NULL,
  `responded_by` varchar(255) NOT NULL,
  `no_victim_patient` int(255) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incident_info`
--

INSERT INTO `incident_info` (`id`, `date`, `month`, `call_time`, `incident`, `sub_incident`, `place_incident`, `injury_damage`, `actions_taken`, `transported_to`, `responded_by`, `no_victim_patient`, `user_id`, `location_id`) VALUES
(22, '2023-01-15', 1, '18:50:19', 'Medical', 'Stroke', 'fqefvqefv', 'dfd', 'sdacdc', 'dfee', 'Monkey D. Luffy', 2, '8', 0),
(23, '2023-01-16', 1, '15:22:40', 'Trauma', 'Others', 'hdkfkjf', 'ufgugfu', 'kjhfkghfghe', 'dsfhg', 'Monkey D. Luffy', 3, '8', 0),
(24, '2023-01-11', 1, '21:11:44', 'Medical', 'Highblood', 'Highblood', 'Highblood', 'Highblood', 'Highblood', 'Highblood', 2, '8', 0),
(26, '2023-01-22', 1, '01:14:17', 'Trauma', 'Vehicle Accident', 'sdsaas', 'sdasd', 'sdasds', 'ssdasd', 'Monkey D. Luffy', 2, '8', 55);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `long` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rescuer_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `proof` varchar(200) NOT NULL,
  `incident_details` varchar(100) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `lat`, `long`, `address`, `user_id`, `rescuer_id`, `date`, `time`, `proof`, `incident_details`, `status`) VALUES
(54, '15.93403', '120.341157', 'Cacaritan, education, undefined 2420, Philippines', 31, 11, '2023-01-17', '12:17:15', 'per_1673932635.png', 'rgste', 0),
(55, '15.93586', '120.3724606', 'Longos, road, undefined 2420, Philippines', 8, 3, '2023-01-22', '01:06:30', 'anime_1674320790.jpg', 'ssaads', 1);

-- --------------------------------------------------------

--
-- Table structure for table `location_admin`
--

CREATE TABLE `location_admin` (
  `id` int(11) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `long` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `sub_admin_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_admin`
--

INSERT INTO `location_admin` (`id`, `lat`, `long`, `address`, `status`, `user_id`, `sub_admin_id`, `date`, `time`) VALUES
(56, '15.877655', '120.347046', 'Bacnar, road, undefined 2420, Philippines', 0, 31, 11, '2023-01-19', '17:03:39'),
(57, '15.934452999999998', '120.371002', 'Longos, road, undefined 2420, Philippines', 1, 8, 3, '2023-01-22', '01:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `name`, `position`, `contact`, `username`, `password`, `photo`) VALUES
(3, 'Monkey D. Luffy', 'Manager', '09153477359', 'luffy', '$2y$10$rYrApVSmRAMdopQ/LMN/beD1xsSXKXPsf8ZWTzrTJ0/KP10FBXd4O', '0'),
(11, 'Mang Juan', 'Firefighter', '09838765376', 'juan', '$2y$10$ZrJ5JZ3986JG7w94jR7j.OuYYypzbz5hnt.yk1umbM6XTp7R9txaa', 'shinrapng');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `valid_id` varchar(50) NOT NULL,
  `fname` varchar(150) NOT NULL,
  `lname` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `contactnum` varchar(30) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `valid_id`, `fname`, `lname`, `location`, `contactnum`, `user`, `pass`, `photo`, `status`) VALUES
(8, '', 'jhobert', 'Salvador', 'Doyong', '090088', 'jhobert', '$2y$10$nFkCgfftKbtBU96vT78nIO9JY1GCiBuayl.dhBZM0M8gflO0vE.Dq', '', 'Approved'),
(31, 'maki_1673927457.jpg', 'Rose Ann', 'Bañaga', '', '09482293449', 'rose', '$2y$10$z4UNEjNjiLD7Rztb2l3On.tGJVbGWIPqCgx.oIBFobAEPrqqdUI/e', '', 'Approved'),
(37, 'anime_1674320388.jpg', 'sadsds', 'sdasdasd', 'Abanon San Carlos City', '34234444443442', 'ddasdasdas', '$2y$10$pxdxjoRPD3YwZULyGrLadOlYtgZYaenkUOQE2LEi6pbuhBAGR9f42', '', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evacuations`
--
ALTER TABLE `evacuations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_info`
--
ALTER TABLE `incident_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_admin`
--
ALTER TABLE `location_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `evacuations`
--
ALTER TABLE `evacuations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `incident_info`
--
ALTER TABLE `incident_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `location_admin`
--
ALTER TABLE `location_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
