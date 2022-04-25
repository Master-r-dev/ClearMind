-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2020 at 11:52 PM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_solobuto`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_idd` int(50) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_idd`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Onegin', 'Поминутно видеть вас', '2020-02-15 12:00:10', '2020-02-15 13:25:39'),
(3, 1, 'd', 'dd', '2020-02-15 10:26:00', '2020-02-15 13:27:13'),
(4, 1, 'f', 'рр\r\n', '2020-02-22 20:26:52', '2020-02-22 17:26:52'),
(5, 1, 'df', 'то', '2020-02-22 20:26:59', '2020-02-22 17:26:59'),
(6, 1, 'шшш', 'еку', '2020-02-22 20:27:09', '2020-02-22 17:27:09'),
(7, 1, 'н', 'нннн', '2020-02-22 20:27:24', '2020-02-22 17:27:24'),
(22, 1, 'ва', 'ыв', '2020-03-26 18:55:42', '2020-03-26 15:55:42'),
(24, 7, 'fddf', 'dssdfdsf', '2020-03-26 19:40:24', '2020-03-26 16:40:24'),
(25, 7, 'dsfdsvcxz', 'zxczxxczzcx', '2020-03-26 19:40:30', '2020-03-26 16:40:30'),
(27, 6, 'dsds', 'dssdsdsd', '2020-03-26 20:04:03', '2020-03-26 17:04:03'),
(28, 6, 'wqewqew', 'sewqweweqwe', '2020-03-26 20:04:11', '2020-03-26 17:04:11'),
(29, 6, 's', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '2020-03-26 20:04:15', '2020-03-26 17:04:15'),
(36, 5, 'aавааааа', 'a', '2020-04-07 07:43:43', '2020-04-07 18:25:39'),
(40, 5, 'gffg', 'vc', '2020-04-07 16:45:44', '2020-04-07 14:19:48'),
(44, 9, '323321', '231231231', '2020-04-07 18:21:37', '2020-04-07 15:21:37'),
(47, 5, 'fgd', 'fgdfdgf', '2020-04-07 18:38:35', '2020-04-07 15:38:35'),
(48, 5, 'fdfgdfgdfgdfgd', 'fgdfgdfdgfg', '2020-04-07 18:38:43', '2020-04-07 15:38:43'),
(49, 5, 'mn,,mnm,n,mnm,nm,n', ',.,mnmn,mn,m', '2020-04-07 18:38:49', '2020-04-07 15:38:49'),
(50, 5, 'vcxv', 'vcxxcv', '2020-04-07 18:40:27', '2020-04-07 15:40:27'),
(51, 5, 'cx', 'xcz', '2020-04-07 18:41:52', '2020-04-07 15:41:52'),
(52, 5, 'ds', 'dssd', '2020-04-07 18:43:52', '2020-04-07 15:43:52'),
(53, 5, 'dsds', 'sdsd', '2020-04-07 18:44:10', '2020-04-07 15:44:10'),
(54, 5, 'ds', 'sd', '2020-04-07 20:10:42', '2020-04-07 17:10:42'),
(55, 5, 'ds', 'sd', '2020-04-07 20:16:42', '2020-04-07 17:16:42'),
(56, 5, 'dsdsds', 'dssdsdds', '2020-04-07 20:17:10', '2020-04-07 17:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) UNSIGNED NOT NULL,
  `firstname` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `contact_number` varchar(32) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_general_mysql500_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `contact_number`, `password`, `created`) VALUES
(1, 'd', 'd', 'hhhhh@gmail.com', '79685847584', '0b2785597d687dd08058cff13bf95fb9', '2020-03-05 14:11:53'),
(2, 'qe', 'ewqqqwe', 'ttttt@gmail.com', '79688586646', '0b2785597d687dd08058cff13bf95fb9', '2020-03-21 00:04:00'),
(3, 'ewq', 'qweqwe', 'uiuittttt@gmail.com', '79688586646', '0b2785597d687dd08058cff13bf95fb9', '2020-03-21 00:00:59'),
(4, 'sda', 'dasdsa', 'zzzzz@gmail.com', '79778336646', '0b2785597d687dd08058cff13bf95fb9', '2020-03-21 20:00:00'),
(5, 'd', 're', 'ggg@gmail.com', '79684327584', '0b2785597d687dd08058cff13bf95fb9', '2020-03-21 21:18:33'),
(6, 'd', 'd', 'dddds@mail.com', '79115727984', '0b2785597d687dd08058cff13bf95fb9', '2020-03-26 19:37:13'),
(7, 'lk', 'kl', 'fdds@mail.com', '79645877584', '0b2785597d687dd08058cff13bf95fb9', '2020-03-26 19:39:30'),
(8, 'mnbm', 'vbnvbbn', 'ersehh@gmail.com', '79686687584', '0b2785597d687dd08058cff13bf95fb9', '2020-03-27 00:11:23'),
(9, 'lkzaaz', 'd', 'gfgng@gmail.com', '79685847584', '0b2785597d687dd08058cff13bf95fb9', '2020-04-07 18:19:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_idd` (`user_idd`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_idd`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
