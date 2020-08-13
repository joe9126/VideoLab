-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 02:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videolab`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_ID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `video_ID`, `user_ID`, `comment`, `created_at`, `updated_at`) VALUES
(1, '24', '7', 'Nice one haha!', '2020-06-09 08:04:50', '2020-06-09 08:04:50'),
(2, '24', '7', 'This guy is crazy, I like him haha!', '2020-06-09 08:07:18', '2020-06-09 08:07:18'),
(3, '24', '7', 'what a funny guy haha!', '2020-06-09 08:11:49', '2020-06-09 08:11:49'),
(4, '24', '7', 'what a crazzy guy', '2020-06-09 08:12:39', '2020-06-09 08:12:39'),
(5, '33', '7', 'Arab guy is just nuts!', '2020-06-09 08:15:15', '2020-06-09 08:15:15'),
(6, '33', '7', 'mad man here haha', '2020-06-09 08:16:34', '2020-06-09 08:16:34'),
(7, '33', '7', 'guys funnier!', '2020-06-09 08:44:06', '2020-06-09 08:44:06'),
(8, '33', '7', 'crazy funny!', '2020-06-09 08:49:18', '2020-06-09 08:49:18'),
(9, '33', '7', 'powerful guy !!!!', '2020-06-09 08:50:58', '2020-06-09 08:50:58'),
(10, '25', '7', 'Funny guy', '2020-06-09 09:03:00', '2020-06-09 09:03:00'),
(11, '33', '7', 'This guy is on another level', '2020-06-09 09:17:01', '2020-06-09 09:17:01'),
(12, '33', '7', 'this is the craziest guy on the planet! I like him!', '2020-06-09 09:26:11', '2020-06-09 09:26:11'),
(13, '33', '7', 'this guy is on his own planet!!!', '2020-06-09 09:27:14', '2020-06-09 09:27:14'),
(14, '33', '7', 'funny guy!', '2020-06-09 09:28:59', '2020-06-09 09:28:59'),
(15, '33', '7', 'crazy funny guy!', '2020-06-09 09:59:30', '2020-06-09 09:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2020_06_09_094621_create_comments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `ID` int(11) NOT NULL,
  `videoname` varchar(400) NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(200) NOT NULL,
  `videodir` varchar(2000) NOT NULL,
  `uploaddate` datetime NOT NULL DEFAULT current_timestamp(),
  `uploadedby` varchar(100) NOT NULL DEFAULT 'USER',
  `views` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`ID`, `videoname`, `description`, `category`, `videodir`, `uploaddate`, `uploadedby`, `views`, `shares`, `likes`, `dislikes`, `status`, `comments`) VALUES
(24, 'Eminem troll', '', '17', 'https://primevlog.000webhostapp.com/files/Eminem_troll.mp4', '2019-11-15 14:14:47', '3', 13, 0, 0, 0, 1, 1),
(25, 'Skype your parents', '', '17', 'https://primevlog.000webhostapp.com/files/Skype_your_parents.mp4', '2019-11-15 14:15:29', '3', 23, 0, 0, 0, 0, 2),
(26, 'Dads first phone', '', '17', 'https://primevlog.000webhostapp.com/files/Dads_first_phone.mp4', '2019-11-15 14:23:22', '3', 19, 0, 0, 0, 0, 1),
(27, 'Cat trolls damsel', '', '16', 'https://primevlog.000webhostapp.com/files/Cat_trolls_damsel.mp4', '2019-11-15 14:36:05', '3', 20, 0, 0, 0, 1, 1),
(28, 'Wild beasts', '', '16', 'https://primevlog.000webhostapp.com/files/Wild_beasts.mp4', '2019-11-15 14:42:23', '3', 25, 0, 0, 0, 1, 1),
(29, 'Glow in the dark', '', '18', 'https://primevlog.000webhostapp.com/files/Glow_in_the_dark.mp4', '2019-11-18 08:52:34', '3', 62, 0, 0, 0, 1, 1),
(30, 'Local Man unable to can', '', '18', 'http://localhost/primevlog/files/Local_Man_unable_to_can.mp4', '2019-12-13 12:09:54', '3', 5, 0, 0, 0, 1, 1),
(31, 'EMPIRE', '', '7', 'http://localhost/primevlog/files/EMPIRE.mp4', '2019-12-14 11:17:26', '3', 6, 0, 0, 0, 1, 1),
(32, 'Eminem trolls bitches by Optimus', '', '17', 'http://localhost/primevlog/files/Eminem_trolls_bitches_by_Optimus.mp4', '2019-12-18 16:18:28', '3', 11, 0, 0, 0, 1, 1),
(33, 'New iPhone For Dad', 'A Lebanese dude buy\'s his dad a new iPhone. His Dad freaks out when he receives a new call! Check it out! Dont forget to like and share the video on Facebook! ', '17', 'http://localhost/primevlog/files/New_iPhone_For_Dad.mp4', '2019-12-19 13:07:43', '3', 21, 0, 0, 0, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `usertype`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'joeasewe', 'joeasewe@outlook.com', '$2y$10$M.FnvJLnsbuuIyKxNH1zK.Fip7C7MLxJZ1vvfHi.izOttTglX3E/u', 'User', '1', NULL, '1gosDyZkB3', '2020-04-11 16:16:56', '2020-04-11 16:16:56'),
(4, 'bradley', 'bradley@gmail.com', '$2y$10$p8RPyiR8RKVvY6gf70181OSo8TZzIuIWhAApNBeMZtJYDnXfdOBFm', 'User', '1', NULL, 'adOWJVcqoA', '2020-04-11 16:21:42', '2020-04-11 16:21:42'),
(5, 'bradley', 'joeasewe@gmail.com', '$2y$10$FPubKhpAWA.2dhz1XZUjI..W/FYYxH6xzYn.MZBhnzvBNati6lgzi', 'User', '1', NULL, '7jiniSsXMX', '2020-04-11 16:22:41', '2020-04-11 16:22:41'),
(6, 'Prime9126', 'bware@symphony.co.ke', '$2y$10$vGqdFinyRIWkZ7KSxRX6N.l44exM/A8PQXot1O2soYxwPcFS3Qraq', 'User', '1', NULL, '0hL6Kp9B4F', '2020-04-12 06:40:24', '2020-04-12 06:40:24'),
(7, 'Daniel', 'dan@gmail.com', '$2y$10$JVNeAirjD8TmzQDVLrrvtunKSNuNQzri05UffF9XN/NQRGSgiPOb2', 'User', '1', NULL, 'gnVjg2VJbrqLYf6S6JiqDuQO1kCGaRPohhnqu66d7Xp7aEoWjZIc9SkUXRjO', '2020-05-27 08:48:16', '2020-05-27 08:48:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `VIDEONAME` (`videoname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
