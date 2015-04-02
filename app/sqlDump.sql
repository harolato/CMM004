-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2015 at 02:10 PM
-- Server version: 5.5.41-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmm004`
--

-- --------------------------------------------------------

--
-- Table structure for table `iterations`
--

CREATE TABLE IF NOT EXISTS `iterations` (
`id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `number` int(10) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `iterations`
--

INSERT INTO `iterations` (`id`, `project_id`, `number`, `start_date`, `end_date`) VALUES
(1, 1, 1, '2015-04-01 21:00:00', '2015-04-29 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `state` int(30) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `points` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `state`, `start_date`, `due_date`, `points`) VALUES
(1, 'Oil''n''gas management system', 'System to manage oil and gas distribution', 0, '2015-04-01 21:00:00', '2015-05-14 21:00:00', 542);

-- --------------------------------------------------------

--
-- Table structure for table `projects_allocations`
--

CREATE TABLE IF NOT EXISTS `projects_allocations` (
`id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `projects_allocations`
--

INSERT INTO `projects_allocations` (`id`, `project_id`, `user_id`, `role`) VALUES
(1, 1, 2, 'developer'),
(2, 1, 1, 'owner');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `points` int(10) NOT NULL,
  `state` varchar(30) NOT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `date_completed` timestamp NULL DEFAULT NULL,
  `iteration_id` int(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `description`, `points`, `state`, `date_added`, `date_completed`, `iteration_id`) VALUES
(1, 1, 'Implement calculator', 'Implement calculator to calculate expenses', 20, 'incomplete', '2015-03-31 21:00:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_allocations`
--

CREATE TABLE IF NOT EXISTS `tasks_allocations` (
`id` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tasks_allocations`
--

INSERT INTO `tasks_allocations` (`id`, `task_id`, `user_id`, `notes`) VALUES
(1, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'Haroldas Latonas', 'dummypassword', 'admin'),
(2, 'John John', 'samplepassword', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iterations`
--
ALTER TABLE `iterations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_allocations`
--
ALTER TABLE `projects_allocations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_allocations`
--
ALTER TABLE `tasks_allocations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iterations`
--
ALTER TABLE `iterations`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `projects_allocations`
--
ALTER TABLE `projects_allocations`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tasks_allocations`
--
ALTER TABLE `tasks_allocations`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
