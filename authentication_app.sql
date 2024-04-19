-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 05:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authentication_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `expiry_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otp`
--

INSERT INTO `otp` (`id`, `user_email`, `otp`, `expiry_time`, `is_used`) VALUES
(8, 'louischelsea04@gmail.com', '1002', '2024-03-25 17:33:21', 0),
(9, 'louischelsea04@gmail.com', '1002', '2024-03-25 17:33:21', 1),
(10, 'louischelsea04@gmail.com', '724861', '2024-03-25 15:42:41', 0),
(11, 'louischelsea04@gmail.com', '944184', '2024-03-25 15:44:08', 0),
(12, 'louischelsea04@gmail.com', '328947', '2024-03-25 15:52:14', 0),
(13, 'louischelsea01@gmail.com', '726987', '2024-03-25 15:59:43', 0),
(14, 'louischelsea04@gmail.com', '321983', '2024-03-25 16:12:00', 0),
(15, 'louischelsea01@gmail.com', '256205', '2024-03-26 05:36:26', 0),
(16, 'louischelsea01@gmail.com', '217101', '2024-03-26 05:37:17', 0),
(17, 'louischelsea04@gmail.com', '495157', '2024-03-26 05:38:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `security questions`
--

CREATE TABLE `security questions` (
  `question1` varchar(100) NOT NULL,
  `question2` varchar(2) NOT NULL,
  `question3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `security questions`
--

INSERT INTO `security questions` (`question1`, `question2`, `question3`) VALUES
('[23 words]', '[l', '[male]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `gender`, `password`, `registration_time`) VALUES
(1, 'wanjiku123@gmail.com', 'Anne Wanjiku', 'female', '$2y$10$TeQvWkv6wpIOeE32ZdwGEucMeo0LlI22QX5D8m2cFgnfOPwMYO.Ye', '2024-03-25 10:30:18'),
(3, 'loui123@gmail.com', 'loui maina', 'male', '$2y$10$vQhGjEo505lptnjRS4tOUuopek1WHkqBCEDzluc65dgPUaVPsRkfy', '2024-03-25 10:33:11'),
(4, 'machoka321@gmail.com', 'Mary Machoka', 'female', '$2y$10$V7m6ufY0EqDxOJPCuEf0uOz0kfPHSgBJAPzrNeYVO3fmdczeWZGS6', '2024-03-25 10:40:40'),
(6, 'miko321@gmail.com', 'Mary Miko', 'female', '$2y$10$dbjvLJsnxhMWnyQKss4ebuvrkfhQqNmt7g.eRs55vov.PYb9xPZzW', '2024-03-25 10:41:16'),
(7, 'georginakanja07@gmail.com', 'Georgina', 'female', '$2y$10$kYAjaRKJKC9V/IvWUrLw3uXs9l6i6x0sMgZ0H7Og2fTNfVoFvM.ue', '2024-03-25 11:05:12'),
(8, 'louischelsea04@gmail.com', 'louiji', 'male', '$2y$10$abaf/AIa52CcNMQKTcVLYuh2KKvAIS2cYWpRfrGu8y5Q.tsJwiiGy', '2024-03-25 17:16:29'),
(9, 'louischelsea01@gmail.com', 'jack', 'male', '$2y$10$4V3MNRnUAowa3JZfMAikjO4cvNZ3qVhKW21DHD/ftBVN4U0v0t9YK', '2024-03-25 17:54:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `otp`
--
ALTER TABLE `otp`
  ADD CONSTRAINT `otp_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
