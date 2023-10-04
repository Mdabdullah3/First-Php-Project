-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2023 at 10:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `updated`) VALUES
(1, 'Electronics', '2023-09-27 08:14:29', NULL),
(2, 'Automobiles', '2023-09-27 08:15:11', NULL),
(3, 'Clothing', '2023-09-27 08:15:35', NULL),
(4, 'property', '2023-09-27 08:16:45', '2023-09-27 08:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `email`, `password`, `role`, `created`, `updated`) VALUES
(6, 'Rahman 2', 'Ashikur 2', 'info.co.ashik@gmail.com', '$2y$10$6xbXYCAUQBcVd36WHT23oeaz/7SN1vNt6GXfz/J9My4poJjHSBeQ6', 2, '2023-09-27 09:17:49', '2023-10-03 08:39:23'),
(8, 'Hasan', 'Mehedi ', 'info.mehedi52@gmail.com', '$2y$10$/7rVVMHn.ObWckMxLgLlzuJ3wHh/j4c8yo7GdRihWO6ej1eoSX/8O', 1, '2023-09-27 09:18:24', NULL),
(9, 'Mahafuz', 'Mister', 'mister@gmail.com', '$2y$10$X9Ffai33XuU3KmjC1ZU81.1tLHcoGD5uWqmr3hq6j1r.Gge4R.nrm', 1, '2023-09-27 09:18:33', NULL),
(12, 'user1', 'user1', 'user1@gmail.com', '$2y$10$W/tuqa/ze.iPzdFFUoRmBewbGLmgnwZxkCzS9KinO7H3SdnzWaseu', 1, '2023-10-02 09:07:11', NULL),
(13, 'user2', 'user2', 'user2@gmail.com', '$2y$10$weC.4yNFv980escmzNk7o.HBq/IhJfi4s00KuEhCTwhbmSjKQ2mZO', 2, '2023-10-02 09:07:36', '2023-10-02 09:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
