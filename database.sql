-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 23, 2020 at 07:08 AM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_otp` int(6) NOT NULL,
  `last_activity` datetime NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`login_id`, `user_id`, `login_otp`, `last_activity`, `login_datetime`) VALUES
(13, 28, 220656, '2022-08-20 09:08:30', '2020-08-22 13:08:30'),
(14, 28, 805441, '2022-08-20 09:10:36', '2020-08-22 13:10:36'),
(15, 28, 300688, '2022-08-20 09:11:00', '2020-08-22 13:11:00'),
(16, 28, 293419, '2022-08-20 09:12:00', '2020-08-22 13:12:00'),
(17, 28, 455487, '2022-08-20 09:12:43', '2020-08-22 13:12:43'),
(18, 28, 943141, '2022-08-20 09:14:00', '2020-08-22 13:14:00'),
(19, 28, 854929, '2022-08-20 09:16:46', '2020-08-22 13:16:46'),
(20, 28, 742427, '2022-08-20 09:22:48', '2020-08-22 13:22:48'),
(21, 28, 323845, '2022-08-20 09:25:56', '2020-08-22 13:25:56'),
(22, 28, 164550, '2022-08-20 09:27:20', '2020-08-22 13:27:20'),
(23, 28, 887470, '2022-08-20 09:28:41', '2020-08-22 13:28:41'),
(24, 28, 407592, '2022-08-20 09:30:31', '2020-08-22 13:30:31'),
(25, 28, 697335, '2022-08-20 09:36:12', '2020-08-22 13:36:12'),
(26, 28, 803017, '2022-08-20 09:37:48', '2020-08-22 13:37:48'),
(27, 28, 883278, '2022-08-20 09:38:44', '2020-08-22 13:38:44'),
(28, 28, 645237, '2022-08-20 09:41:20', '2020-08-22 13:41:20'),
(29, 28, 501386, '2022-08-20 09:44:13', '2020-08-22 13:44:13'),
(30, 28, 438306, '2022-08-20 09:44:34', '2020-08-22 13:44:34'),
(31, 28, 597493, '2022-08-20 09:45:57', '2020-08-22 13:45:57'),
(32, 28, 491692, '2022-08-20 09:46:09', '2020-08-22 13:46:09'),
(33, 28, 493673, '2022-08-20 09:46:53', '2020-08-22 13:46:53'),
(34, 28, 716389, '2022-08-20 09:48:11', '2020-08-22 13:48:11'),
(35, 28, 308567, '2022-08-20 09:49:40', '2020-08-22 13:49:40'),
(36, 28, 543487, '2022-08-20 09:50:59', '2020-08-22 13:50:59'),
(37, 28, 980514, '2022-08-20 09:51:43', '2020-08-22 13:51:43'),
(38, 28, 411275, '2022-08-20 09:56:52', '2020-08-22 13:56:52'),
(39, 28, 806041, '2022-08-20 10:01:16', '2020-08-22 14:01:16'),
(40, 28, 727249, '2022-08-20 10:04:45', '2020-08-22 14:04:45'),
(41, 28, 760213, '2022-08-20 10:08:15', '2020-08-22 14:08:15'),
(42, 28, 730929, '2022-08-20 10:09:43', '2020-08-22 14:09:43'),
(43, 28, 197994, '2022-08-20 10:10:42', '2020-08-22 14:10:42'),
(44, 28, 391083, '2022-08-20 10:13:53', '2020-08-22 14:13:53'),
(45, 28, 904728, '2022-08-20 11:09:44', '2020-08-22 15:09:44'),
(46, 28, 416576, '2022-08-20 11:14:06', '2020-08-22 15:14:06'),
(47, 28, 417811, '2022-08-20 11:16:18', '2020-08-22 15:16:18'),
(48, 28, 781164, '2022-08-20 11:17:51', '2020-08-22 15:17:51'),
(49, 28, 682276, '2022-08-20 11:20:00', '2020-08-22 15:20:00'),
(50, 28, 293265, '2022-08-20 11:21:11', '2020-08-22 15:21:11'),
(51, 28, 695272, '2022-08-20 11:22:54', '2020-08-22 15:22:54'),
(52, 28, 352162, '2022-08-20 11:24:09', '2020-08-22 15:24:09'),
(53, 28, 918475, '2022-08-20 11:26:44', '2020-08-22 15:26:44'),
(54, 28, 925708, '2022-08-20 11:27:53', '2020-08-22 15:27:53'),
(55, 28, 635254, '2022-08-20 11:28:35', '2020-08-22 15:28:35'),
(56, 28, 755863, '2022-08-20 11:29:31', '2020-08-22 15:29:31'),
(57, 28, 395700, '2022-08-20 11:32:26', '2020-08-22 15:32:26'),
(58, 28, 696461, '2022-08-20 12:18:29', '2020-08-22 16:18:29'),
(59, 37, 567108, '2022-08-20 12:28:44', '2020-08-22 16:28:44'),
(60, 28, 442257, '2022-08-20 01:00:30', '2020-08-22 17:00:30'),
(61, 28, 505367, '2022-08-20 03:14:11', '2020-08-22 19:14:11'),
(62, 28, 756203, '2022-08-20 03:28:11', '2020-08-22 19:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `register_user`
--

CREATE TABLE `register_user` (
  `register_user_id` int(11) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_activation_code` varchar(250) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL,
  `user_otp` int(11) NOT NULL,
  `user_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_user`
--

INSERT INTO `register_user` (`register_user_id`, `user_name`, `user_email`, `user_password`, `user_activation_code`, `user_email_status`, `user_otp`, `user_datetime`, `user_avatar`) VALUES
(28, 'Amit Bauriya', 'amit001bauriya@gmail.com', '$2y$10$tNA65ZeGj8S1Mp/69aL3euu7igizbVNXFQxGJ28I/l0B8mWKRiLlW', '393744b5f70c3bbb8564874ab9a6b2df', 'verified', 293725, '2020-08-22 18:32:07', 'avatar/1598112710.png'),
(29, 'Test User 1', 'user1@test.com', '$2y$10$JxENR3NBA9SOjJqfKUzCdeq1Nlc/Q6cKUAX93ER7prueMPfBjyC62', '8613f9ccd17d909893f3f4d10f57ff1e', 'not verified', 940104, '2020-08-22 15:57:00', 'avatar/1598111820.png'),
(30, 'Test User 2', 'user2@test.com', '$2y$10$fN5lgi9W3aUDWxHB9NznsuvPPecTM5YshAPiEywAaOj1BONvxJW8y', 'd529dd62aed313178439fc2133a01d14', 'not verified', 505924, '2020-08-22 15:57:52', 'avatar/1598111872.png'),
(36, 'Test User 8', 'user8@test.com', '$2y$10$8R24s49KjoXOUb740DEt/efmK1zPC9ku2kSCQtfziO2DmPcIzZLtm', '83b53e6f693afc4b5117a32bffdb7b4a', 'verified', 953333, '2020-08-22 16:12:18', 'avatar/1598112710.png'),
(37, 'Test User 9', 'user9@test.com', '$2y$10$VGohb4lQG7LCRwwve9pqPe4yUGZNJw0ysZN2Z/MZjo97PeNPlzPNK', 'b2f2179ab36959f15b9ca38a0fca6320', 'verified', 264341, '2020-08-22 18:22:08', 'avatar/1598113673.png'),
(38, 'Amit Kumar', 'user11@test.com', '$2y$10$hkqGcZdQap7Ujy.b9wo3NuLtmawNpVSPUt2geT1TKza4yKMJQFfUi', '5d9fc33f377164358d60b4fda57e7acd', 'verified', 134767, '2020-08-22 19:30:05', 'avatar/1598124588.png');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `restaurant_name` varchar(150) NOT NULL,
  `restaurant_location` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `restaurant_name`, `restaurant_location`, `image`) VALUES
(1, 'Biryani House', 'Thane', '613963078.png'),
(2, 'Burgrill', 'Mumbai', '613963078.png'),
(3, 'The Saffron Boutique', 'Mulund', '613963078.png'),
(4, 'Banana Leaf', 'Dadar', '613963078.png'),
(5, 'Yum Yum Tree', 'Thane', '613963078.png'),
(7, 'Party Fowl ', 'Ghatkopar', '613963078.png'),
(8, 'Charles', 'Martin', '613963078.png'),
(11, 'Pho Shizzle ', 'Thane', '613963078.png'),
(12, 'The Great Impasta ', 'Mumbai', '613963078.png'),
(14, 'Krista Wines ', 'Borivali', '613963078.png'),
(15, 'Charles Cafe', 'Worli', '613963078.png'),
(16, 'Cindy Lam Cafe', 'Mumbai', '613963078.png'),
(17, 'Daphne Restaurant', 'Worli', '214692956.net-compress-image'),
(18, 'Frank', 'Bandra', '613963078.png'),
(19, 'Thaitanic Restaurant ', 'Andheri', '613963078.png'),
(20, 'The Codfather ', 'Andheri', '1703717099.net-compress-image');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `register_user`
--
ALTER TABLE `register_user`
  ADD PRIMARY KEY (`register_user_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_data`
--
ALTER TABLE `login_data`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `register_user`
--
ALTER TABLE `register_user`
  MODIFY `register_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
