-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2020 at 06:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuisines`
--

CREATE TABLE `cuisines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cuisines`
--

INSERT INTO `cuisines` (`id`, `name`) VALUES
(10, 'BBQ');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `party` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `cuisine_id` int(11) DEFAULT NULL,
  `total_rating` float DEFAULT NULL,
  `rating_count` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `address`, `phone`, `cuisine_id`, `total_rating`, `rating_count`, `picture`, `description`) VALUES
(1, 'Bob\'s BBQ', '666 North St. Belton, TX 76513', '512-420-6969', 10, 10, 1, 'https://embed.widencdn.net/img/mccormick/fzhgzam0d6/2034x1144px/smoked_bbq_brisket_texasgrillmates_bottles23925.jpg?crop=true&anchor=5,223&q=80&color=ffffffff&u=o2hyef', 'Here at Bob\'s BBQ we serve the best brisket in town! Come see our clean restaurant. Social distancing and masks required.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `description`, `rating`, `restaurant_id`) VALUES
(67, 'Kevin', 'I love this place!! Cold beer and nice staff. Brisket is not too bad... Love the precautions Bob is taking to protect its customer. Way to go Bob!!', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(1, 'test', 'test', 'test@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuisines`
--
ALTER TABLE `cuisines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuisines`
--
ALTER TABLE `cuisines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
