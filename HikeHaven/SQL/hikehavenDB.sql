-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2023 at 11:29 PM
-- Server version: 8.0.33
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hikehaven`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
);

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `content`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Gjeravica', 'The highest peak on Kosovo', 3, 'images/img-3.jpg', '2023-09-03 20:32:17', '2023-09-03 20:32:17'),
(6, 'Liqenat', 'the beautiful lake of rugova!', 4, '../images/img-6.jpg', '2023-09-03 22:26:39', '2023-09-04 21:04:45'),
(9, 'Bistra', 'Highest peak on Sharr mountains ', 1, '../images/home-bg-2.jpg', '2023-09-07 20:16:34', '2023-09-07 20:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `destination` varchar(255) NOT NULL,
  `accommodation` varchar(255) NOT NULL,
  `transportation` varchar(255) NOT NULL,
  `activities` text NOT NULL,
  `dining` varchar(255) NOT NULL,
  `travel_tips` text NOT NULL,
  `pricing` decimal(10,2) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `booking` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
);

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `user_id`, `destination`, `accommodation`, `transportation`, `activities`, `dining`, `travel_tips`, `pricing`, `contact`, `booking`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 'Gjeravica1', 'Hotel Sharri1', 'Shpejtimi Travel1', 'Shume aktivitete te bukura ne gjeravic1', 'Italy cuisine', 'Hikind and swim1', '81.00', '+38345111222', '25 september1', '../images/category-5.jpg', '2023-09-05 14:31:47', '2023-09-05 14:52:26'),
(3, 1, 'Jazhnica', 'Hotel Theranda', 'Sharr Travel', 'Hiking and swimming', 'Chines food', 'Very attractive place', '35.00', '+38345111222', '1 August to 5 August', '../images/category-6.jpg', '2023-09-05 18:29:32', '2023-09-05 18:29:32'),
(4, 1, 'Bistra', 'Hotel Brezo', 'Flutra Raisen', 'Hiking, football,, and some more', 'Tradicional food', 'The beautiful peak on sharr mountain', '123.00', '+38345111222', 'From 5 Octomber at 8Octomber', '../images/home-bg-2.jpg', '2023-09-05 21:38:35', '2023-09-05 21:38:35'),
(5, 4, 'Rosa Peak', 'Valbona Resident', 'Sharr Travel', 'Hiking, climbin, music', 'Tradicional food', 'very nice trip with all the nessary needs', '125.00', '+38349111222', 'From 1 september until to 10 September', '../images/img-9.jpg', '2023-09-07 23:03:15', '2023-09-07 23:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
);

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`) VALUES
(1, 'ardi@gmail.com', '2023-09-03 19:18:41'),
(2, 'nisibosi@gmail.com', '2023-09-03 21:33:44'),
(3, 'leonitgashi@gmail.com', '2023-09-03 21:40:34'),
(4, 'Altin@gmail.com', '2023-09-03 21:42:21'),
(5, 'shpejtimukaj@gmail.com', '2023-09-07 23:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'Ardi', 'ardi@gmail.com', '$2y$10$bZwj639QYl9e8rwKQyJA4Ocmmcz5FIs544.mOkhkNvrLp2aXGr3kK'),
(2, 'Ardi', 'ardigashi@gmail.com', '$2y$10$swaEBURQeIMv2bhZ/fbpMO5F18Jm/fhSbRbuUYJwrliFg3ew6BQIy'),
(3, 'Leonit', 'leonitgashi@gmail.com', '$2y$10$pbk2OC2nNrF1z5LlEaPHUOgbu1AoyriSWbMliA9uNe6pfz8yMTEBS'),
(4, 'Nisi', 'nisibosi@gmail.com', '$2y$10$MPBiTMoWf5uxdk9X3ItmpOpcgISHNMMyemX2lSv47zHNs9nzrcxZa'),
(5, 'Shpejtim', 'shpejtimukaj@gmail.com', '$2y$10$yc6bjNTKbSE1hD2YWnX4teOFDdDcS4WqEt2tQ8h8osolMS0seF5SK');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;


