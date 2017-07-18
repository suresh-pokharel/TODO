
/*
      Author  : Suresh Pokharel
      Email   : suresh.wrc@gmail.com
      GitHub  : github.com/suresh021
      URL     : psuresh.com.np
*/ 

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 19, 2017 at 03:40 AM
-- Server version: 5.6.16
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dm`
--

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 for not completed, 1 for completed, 2 for hidden',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `description`, `status`, `date_time`) VALUES
(22, 'Allow you to prioritize your active tasks', 0, '0000-00-00 00:00:00'),
(23, 'Help to keep you focused on the tasks that you have identified as high priority', 0, '0000-00-00 00:00:00'),
(24, 'Ensure that you do not miss or forget about a critical project task', 0, '2017-02-15 00:00:00'),
(25, 'Help you track your productivity by looking back at what you have accomplished', 0, '0000-00-00 00:00:00'),
(26, 'Help you to do your time-sheet when you wait until Monday to do it and forgot everything you worked on', 0, '0000-00-00 00:00:00'),
(27, 'Keep track of phone calls that need to be made/returned', 0, '0000-00-00 00:00:00'),
(32, 'Make it easy to delegate tasks to others', 0, '0000-00-00 00:00:00'),
(36, 'Insert your own item, try editing and delete', 0, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
