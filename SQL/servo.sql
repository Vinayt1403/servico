-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2024 at 03:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servo`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `problem_description` varchar(300) DEFAULT NULL,
  `status` varchar(11) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `service_date` date DEFAULT NULL,
  `expected_cost` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_requests`
--

INSERT INTO `booking_requests` (`id`, `user_id`, `provider_id`, `problem_description`, `status`, `created_at`, `service_date`, `expected_cost`) VALUES
(33, 10, 1, '', '', '2024-03-19 14:59:57', NULL, NULL),
(34, 10, 1, '', '', '2024-03-19 15:11:49', '2024-03-08', '300.00'),
(35, 10, 1, '', 'reject', '2024-03-19 16:18:52', NULL, NULL),
(36, 10, 2, '', '', '2024-03-19 16:24:38', NULL, NULL),
(37, 10, 2, '', 'reject', '2024-03-19 16:28:51', NULL, NULL),
(38, 10, 1, '', 'reject', '2024-03-20 02:04:40', NULL, NULL),
(39, 10, 1, '', 'reject', '2024-03-20 02:04:49', NULL, NULL),
(40, 10, 2, '', 'reject', '2024-03-20 02:21:13', NULL, NULL),
(41, 10, 1, '', 'accept', '2024-03-20 04:12:57', '2024-03-07', '55.00'),
(42, 10, 1, '', 'accept', '2024-03-20 08:13:31', '2024-03-07', '67.00'),
(43, 13, 2, '', 'reject', '2024-03-21 09:45:44', NULL, NULL),
(44, 13, 1, '', 'reject', '2024-03-21 09:45:49', NULL, NULL),
(45, 13, 2, '', 'reject', '2024-03-23 02:08:27', NULL, NULL),
(46, 13, 2, '', 'accept', '2024-03-23 03:37:57', '2024-03-12', '500.00'),
(53, 13, 1, '', 'reject', '2024-03-23 05:38:10', NULL, NULL),
(54, 13, 1, '', 'accept', '2024-03-23 05:45:07', '2024-03-05', '200.00'),
(55, 13, 1, '', 'accept', '2024-03-23 06:23:49', '2024-03-19', '66.00'),
(56, 15, 1, '', 'reject', '2024-03-23 06:27:08', NULL, NULL),
(57, 15, 1, '', 'reject', '2024-03-23 06:29:18', NULL, NULL),
(58, 15, 1, '', 'reject', '2024-03-23 06:30:38', NULL, NULL),
(59, 15, 1, '', 'reject', '2024-03-23 06:32:04', NULL, NULL),
(60, 15, 1, '', 'reject', '2024-03-23 06:32:20', NULL, NULL),
(61, 13, 1, '', 'reject', '2024-03-23 06:37:32', NULL, NULL),
(62, 13, 2, 'car stuck in kudal', 'accept', '2024-03-24 07:30:45', '2024-03-04', '100.00'),
(63, 13, 2, 'car stuck in kudal', 'reject', '2024-03-24 07:32:52', NULL, NULL),
(64, 17, 20, 'i want made service', 'reject', '2024-04-03 18:21:47', NULL, NULL),
(65, 16, 1, 'want to repair laptop', 'delivered', '2024-04-04 06:19:32', '2024-04-05', '500.00'),
(66, 16, 1, 'problem in computer', 'reject', '2024-04-04 06:33:26', NULL, NULL),
(67, 16, 1, 'problem in computer', 'reject', '2024-04-04 06:34:04', NULL, NULL),
(68, 16, 1, 'computer', 'delivered', '2024-04-04 06:56:35', '2024-04-03', '122.00'),
(69, 13, 2, 'cr crash', 'delivered', '2024-04-06 08:48:01', '2024-04-05', '4000.00'),
(70, 18, 1, 'computer', 'delivered', '2024-04-06 09:07:38', '2024-04-05', '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `cname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `cname`) VALUES
(1, 'Health Services'),
(2, 'Finance Services'),
(3, 'Automative Services'),
(4, 'Home Services'),
(5, 'Event Planning'),
(6, 'Technology'),
(7, 'Legal Services'),
(8, 'Education'),
(9, 'Travel Services');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(3) NOT NULL,
  `city_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Kudal'),
(2, 'Malvan'),
(3, 'Vengurle'),
(4, 'Sawantwadi'),
(5, 'Dodamarg'),
(6, 'Kanakavali'),
(7, 'Vaibhavwadi'),
(8, 'Devgad');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(5) NOT NULL,
  `uid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `booking_id` varchar(5) NOT NULL,
  `fdes` varchar(100) NOT NULL,
  `timestamps` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `pid`, `booking_id`, `fdes`, `timestamps`) VALUES
(1, 16, 1, '65', 'very nice service', '2024-04-05 09:04:07.083844'),
(2, 16, 1, '65', 'very nice service', '2024-04-05 09:04:26.683814'),
(3, 16, 1, '65', 'very nice service', '2024-04-05 09:06:17.907003'),
(4, 13, 2, '', 'good service', '2024-04-06 08:53:34.827444'),
(5, 18, 1, '', 'good', '2024-04-06 09:09:24.366464');

-- --------------------------------------------------------

--
-- Table structure for table `myrec`
--

CREATE TABLE `myrec` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `contact` bigint(11) DEFAULT NULL,
  `password` varchar(15) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `role` varchar(1) DEFAULT '1',
  `ucity` varchar(15) NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myrec`
--

INSERT INTO `myrec` (`id`, `name`, `email`, `contact`, `password`, `username`, `role`, `ucity`, `profile_pic`) VALUES
(8, 'bhavesh', 'bhavesh123@gmail.com', 394875, 'bhavesh@123', 'bhavesh', '1', 'Vengurle', ''),
(9, 'vinay', 'admin@gmail.com', 39485, 'admin@123', 'vinay', '0', 'Kudal', ''),
(10, 'kunal', 'kunal123@gmail.com', 9405982427, 'kunal@123', 'kittu', '1', 'Sawantwadi', ''),
(11, 'Rushi', 'rushi@gmail.com', 898989898, 'qwerty', 'rushi@123', '2', 'Malvan', ''),
(12, 'Mihir', 'mihir@gmail.com', 56565656, 'qwerty', 'mihir@123', '2', 'Malvan', ''),
(13, 'harshal', 'harshal@gmail.com', 979797979, 'qwerty', 'harshal@123', '2', 'Vengurle', ''),
(14, 'sahil', 'sahil@gmail.com', 954545455, 'sahil@123', 'sahil@123', '2', 'Vengurle', ''),
(15, 'vrushali', 'vrusha@gmail.com', 2147483647, 'vrusha@123', 'vrushali', '1', 'Kudal', ''),
(16, 'bhakti', 'bhakti19@gmail.com', 8767741181, 'qwerty', 'bhakti@19', '1', 'Kudal', ''),
(17, 'purva', 'purva@gmail.com', 8767676767, 'qwerty', 'purva123', '2', 'Kanakavali', 'profile-pic/20240206_131945.jpg'),
(18, 'hrutik', 'hrutik@gmail.com', 6767676767, 'qwerty', 'hrutik', '1', 'Dodamarg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`, `created_at`) VALUES
(1, 10, 'Your booking request has been the booking request has been accepted.', 'read', '2024-03-17 04:42:47'),
(2, 10, 'Your request has been accepted.', 'read', '2024-03-17 04:48:00'),
(3, 10, 'Your request has been accepted.', 'read', '2024-03-17 04:51:13'),
(4, 10, 'Your request has been accepted.', 'read', '2024-03-17 04:54:51'),
(5, 10, 'Your request has been accepted.', 'read', '2024-03-17 04:55:18'),
(6, 10, 'Your request has been accepted.', 'read', '2024-03-17 04:55:19'),
(7, 8, 'Your request has been accepted.', 'read', '2024-03-17 04:55:25'),
(8, 10, 'Your request has been accepted by Mihir Mechanicals.', 'read', '2024-03-17 05:04:02'),
(9, 10, 'Your request has been accepted by Mihir Mechanicals.', 'read', '2024-03-17 05:19:20'),
(10, 10, 'Your request has been accepted by Rushi Computers.', 'read', '2024-03-17 05:52:53'),
(11, 10, 'Your request has been accepted by Rushi Computers.', 'read', '2024-03-17 05:53:03'),
(12, 8, 'Your request has been accepted by Mihir Mechanicals.', 'read', '2024-03-17 05:54:43'),
(13, 10, 'Your request has been accepted by Mihir Mechanicals.', 'read', '2024-03-17 05:54:48'),
(14, 10, 'Your request has been accepted by Mihir Mechanicals.', 'read', '2024-03-17 05:54:56'),
(15, 10, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-16, Expected Cost: 5000.', 'read', '2024-03-17 06:36:51'),
(16, 10, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-22, Expected Cost: 2000.', 'read', '2024-03-17 06:37:26'),
(17, 10, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-29, Expected Cost: 5000.', 'read', '2024-03-17 06:40:51'),
(18, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-07, Expected Cost: 4000.', 'read', '2024-03-17 15:11:11'),
(19, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-20, Expected Cost: 400.', 'read', '2024-03-17 15:12:08'),
(20, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-13, Expected Cost: 400.', 'read', '2024-03-17 15:12:25'),
(21, 8, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-05, Expected Cost: 5.', 'read', '2024-03-17 15:12:49'),
(22, 10, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-14, Expected Cost: 5000.', 'read', '2024-03-17 15:19:41'),
(23, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-13, Expected Cost: 2000.', 'read', '2024-03-17 18:41:58'),
(24, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-08, Expected Cost: 300.', 'read', '2024-03-19 15:13:20'),
(25, 10, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-19 15:22:53'),
(26, 10, 'Your request has been rejected by Mihir Mechanicals.', 'read', '2024-03-19 16:25:01'),
(27, 10, 'Your request has been rejected by Mihir Mechanicals.', 'read', '2024-03-19 16:30:53'),
(28, 10, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-20 02:07:38'),
(29, 10, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-20 02:07:40'),
(30, 10, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-20 02:07:41'),
(31, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-07, Expected Cost: 55.', 'read', '2024-03-20 04:13:21'),
(32, 10, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-07, Expected Cost: 67.', 'read', '2024-03-20 08:14:17'),
(33, 13, 'Your request has been rejected by Mihir Mechanicals.', 'read', '2024-03-23 03:19:50'),
(34, 13, 'Your request has been rejected by Mihir Mechanicals.', 'read', '2024-03-23 03:19:54'),
(35, 10, 'Your request has been rejected by Mihir Mechanicals.', 'unread', '2024-03-23 03:19:55'),
(36, 13, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-12, Expected Cost: 500.', 'read', '2024-03-23 03:40:13'),
(37, 13, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-23 04:47:06'),
(38, 13, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-05, Expected Cost: 200.', 'read', '2024-03-23 05:45:35'),
(39, 13, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-23 06:23:31'),
(40, 13, 'Your request has been accepted by Rushi Computers. Service Date: 2024-03-19, Expected Cost: 66.', 'read', '2024-03-23 06:24:22'),
(41, 13, 'Your request has been rejected by Rushi Computers.', 'read', '2024-03-23 06:46:27'),
(42, 15, 'Your request has been rejected by Rushi Computers.', 'unread', '2024-03-23 06:46:28'),
(43, 15, 'Your request has been rejected by Rushi Computers.', 'unread', '2024-03-23 06:46:29'),
(44, 15, 'Your request has been rejected by Rushi Computers.', 'unread', '2024-03-23 06:46:30'),
(45, 15, 'Your request has been rejected by Rushi Computers.', 'unread', '2024-03-23 06:46:32'),
(46, 15, 'Your request has been rejected by Rushi Computers.', 'unread', '2024-03-23 06:46:33'),
(47, 13, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-03-04, Expected Cost: 100.', 'unread', '2024-03-24 07:32:43'),
(48, 13, 'Your request has been rejected by Mihir Mechanicals.', 'unread', '2024-03-24 07:38:29'),
(49, 17, 'Your request has been rejected by Purva Kitchen.', 'unread', '2024-04-03 18:23:09'),
(50, 16, 'Your request has been accepted by Rushi Computers. Service Date: 2024-04-05, Expected Cost: 500.', 'read', '2024-04-04 06:20:29'),
(51, 16, 'Your request has been rejected by Rushi Computers.', 'read', '2024-04-04 06:39:57'),
(52, 16, 'Your request has been rejected by Rushi Computers.', 'read', '2024-04-04 06:39:58'),
(53, 16, 'Your request has been accepted by Rushi Computers. Service Date: 2024-04-03, Expected Cost: 122.', 'unread', '2024-04-04 06:57:01'),
(54, 13, 'Your request has been accepted by Mihir Mechanicals. Service Date: 2024-04-05, Expected Cost: 4000.', 'unread', '2024-04-06 08:51:15'),
(55, 18, 'Your request has been accepted by Rushi Computers. Service Date: 2024-04-05, Expected Cost: 600.', 'read', '2024-04-06 09:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `prov`
--

CREATE TABLE `prov` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `sid` int(5) NOT NULL,
  `pname` varchar(30) NOT NULL,
  `pdes` varchar(60) NOT NULL,
  `cost` int(10) NOT NULL,
  `pemail` varchar(30) NOT NULL,
  `padress` varchar(50) NOT NULL,
  `pcity` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `p_aadhar` varchar(255) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'Invalid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prov`
--

INSERT INTO `prov` (`pid`, `uid`, `category_id`, `sid`, `pname`, `pdes`, `cost`, `pemail`, `padress`, `pcity`, `state`, `pincode`, `p_aadhar`, `status`) VALUES
(1, 11, 0, 0, 'Rushi Computers', 'Computer Hardware and Software', 200, 'rushi@gmail.com', 'tarkarli beach', 'Malvan', 'Maharashtra', '41619', '', 'valid'),
(2, 12, 0, 0, 'Mihir Mechanicals', 'Car Repairing and ServiceMaintainace ', 100, 'mihir@gmail.com', 'nabarwadi,kudal city', 'Kudal', 'Maharashtra', '416520', '', 'valid'),
(16, 14, 5, 21, 'sahil sound', 'We Have DJ Sound service available for barsa, haldi,wedding,', 700, 'sahil@gmail.com', 'kudal', 'Vengurle', 'Maharashtra', '416520', 'adhar/paddleball.jpg', 'valid'),
(18, 13, 9, 30, 'harshal tours', 'tours and travels', 2000, 'harshal@gmail.com', 'shiroda', 'Vengurle', 'Maharashtra', '416520', 'adhar/20240206_124243.jpg', 'valid'),
(20, 17, 4, 13, 'Purva Kitchen', 'All cooking services', 700, 'purva@gmail.com', 'kasal', 'Kudal', 'Maharashtra', '422323', 'adhar/1983.jpg', 'valid'),
(21, 13, 1, 1, 'harshal doctor', 'doctor', 2000, 'harshal@gmail.com', 'vengurle', 'Vengurle', 'Maharashtra', '676767', 'adhar/drawSQL-image-export-2024-04-02.png', 'valid'),
(22, 18, 7, 24, 'hrutik murthishala', 'shala', 700, 'hrutik@gmail.com', 'achara', 'Malvan', 'Maharashtra', '565656', 'adhar/drawSQL-image-export-2024-04-02.png', 'valid');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `category_id` int(5) NOT NULL,
  `sname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `category_id`, `sname`) VALUES
(1, 1, 'Doctor'),
(2, 1, 'Massage Therapist'),
(3, 1, 'Yoga Consultant'),
(4, 1, 'Mental health Counselling'),
(5, 2, 'Accounting and Taxation'),
(6, 2, 'Insurance Agency'),
(7, 2, 'Loan '),
(8, 2, 'Investment Advisior'),
(9, 3, 'Car & Bike Mechanic'),
(10, 4, 'Plumbing'),
(11, 4, 'Electrician'),
(12, 4, 'Carpenter'),
(13, 4, 'Maid'),
(14, 4, 'Home Security'),
(15, 4, 'Interior Design'),
(16, 4, 'HVAC'),
(17, 5, 'Dashavatar'),
(18, 5, 'Wedding Planner'),
(19, 5, 'Photo/Videographer'),
(20, 5, 'Event Decorator'),
(21, 5, 'Sound Services'),
(22, 6, 'Computer Repair'),
(23, 6, 'Software Developer'),
(24, 7, 'Music Teacher'),
(25, 7, 'Dance Teacher'),
(26, 7, 'Tution Teacher'),
(27, 8, 'Lawyer'),
(28, 8, 'Estate Agent'),
(29, 9, 'Travel Agency'),
(30, 9, 'Tour Guide'),
(31, 9, 'Transportation Services');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `myrec`
--
ALTER TABLE `myrec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prov`
--
ALTER TABLE `prov`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `myrec`
--
ALTER TABLE `myrec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `prov`
--
ALTER TABLE `prov`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD CONSTRAINT `booking_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `myrec` (`id`),
  ADD CONSTRAINT `booking_requests_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `prov` (`pid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
