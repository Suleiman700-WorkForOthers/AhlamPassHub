-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 08:27 PM
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
-- Database: `passhub`
--
CREATE DATABASE IF NOT EXISTS `passhub` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `passhub`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `name` char(50) DEFAULT NULL,
  `description` char(100) NOT NULL,
  `color` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `description`, `color`) VALUES
(0, 0, 'Family', 'Family passwords', '#ff0000');

-- --------------------------------------------------------

--
-- Table structure for table `failed_logins`
--

DROP TABLE IF EXISTS `failed_logins`;
CREATE TABLE `failed_logins` (
  `id` int(11) NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `used_password` char(255) DEFAULT NULL,
  `used_pin_code` char(255) DEFAULT NULL,
  `fail_reason` char(255) DEFAULT NULL,
  `ip_address` char(100) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

DROP TABLE IF EXISTS `passwords`;
CREATE TABLE `passwords` (
  `id` mediumint(9) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `category_id` mediumint(9) NOT NULL,
  `username` char(255) NOT NULL,
  `password` char(255) NOT NULL,
  `website` char(255) DEFAULT NULL,
  `description` char(255) DEFAULT NULL,
  `note` char(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `successful_logins`
--

DROP TABLE IF EXISTS `successful_logins`;
CREATE TABLE `successful_logins` (
  `id` int(11) NOT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` char(100) NOT NULL,
  `user_agent` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `successful_logins`
--

INSERT INTO `successful_logins` (`id`, `user_id`, `login_time`, `ip_address`, `user_agent`) VALUES
(56, 0, '2023-03-12 17:57:55', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` smallint(6) NOT NULL,
  `fullname` char(50) DEFAULT NULL,
  `email` char(50) DEFAULT NULL,
  `password` char(100) DEFAULT NULL,
  `pin_code` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `pin_code`) VALUES
(0, 'Ahlam Odeh', 'ahlam@gmail.com', '$2y$10$RyjVXHWwzvXgT.5VrdCMPujFJEJW5.2YNCpmttyS2F64KzpVMpyua', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `users_keys`
--

DROP TABLE IF EXISTS `users_keys`;
CREATE TABLE `users_keys` (
  `id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `secret_key` char(100) DEFAULT NULL,
  `secret_iv` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_keys`
--

INSERT INTO `users_keys` (`id`, `user_id`, `secret_key`, `secret_iv`) VALUES
(0, 0, 'A4S4uf+oXlqItCI7WXzsp8nsDFiCj70ZUDEaiQWw2Iw=', '8mGNdDS4GG+YIu3kxGcIFA==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `successful_logins`
--
ALTER TABLE `successful_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_keys`
--
ALTER TABLE `users_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_logins`
--
ALTER TABLE `failed_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `successful_logins`
--
ALTER TABLE `successful_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `FK_CONSTRAINTNAME` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `failed_logins`
--
ALTER TABLE `failed_logins`
  ADD CONSTRAINT `failed_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `passwords`
--
ALTER TABLE `passwords`
  ADD CONSTRAINT `passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `passwords_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `successful_logins`
--
ALTER TABLE `successful_logins`
  ADD CONSTRAINT `successful_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_keys`
--
ALTER TABLE `users_keys`
  ADD CONSTRAINT `users_keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
