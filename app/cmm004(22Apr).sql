-- phpMyAdmin SQL Dump
-- version 4.2.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2015 at 09:50 PM
-- Server version: 5.5.43-0ubuntu0.14.10.1
-- PHP Version: 5.5.12-2ubuntu4.4

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `description`, `state`, `start_date`, `due_date`, `points`) VALUES
(1, 'Oil''n''gas management system', 'System to manage oil and gas distribution', 0, '2015-04-01 21:00:00', '2015-05-14 21:00:00', 542),
(2, 'Data Networks Coursework', 'qweqweqweqwe', 0, '2015-12-16 22:00:00', '2015-12-24 22:00:00', 600),
(3, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'asdasd', 'asdasdasd', 0, '2015-11-30 22:00:00', '2015-12-02 22:00:00', 12),
(5, '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects_users`
--

CREATE TABLE IF NOT EXISTS `projects_users` (
`id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `projects_users`
--

INSERT INTO `projects_users` (`id`, `project_id`, `user_id`, `role`) VALUES
(1, 2, 5, 'developer'),
(2, 1, 5, 'owner'),
(3, 1, 10, 'developer');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `name`, `description`, `points`, `state`, `date_added`, `date_completed`, `iteration_id`) VALUES
(1, 1, 'Implement calculator', 'Implement calculator to calculate expenses', 20, 'complete', '2015-03-31 21:00:00', '2015-04-22 20:06:59', 1),
(2, 1, 'Implement component 8', 'asdasdasdasd', 12, 'complete', '2015-05-02 23:00:00', '2015-04-01 23:00:00', 1),
(6, 1, 'Implement component 7', 'asdgsg', 43, 'complete', '2015-04-15 23:00:00', '2015-04-29 23:00:00', 1),
(7, 1, 'Implement component 1', 'asdasdasdasd', 32, 'complete', '2015-05-02 23:00:00', '2015-04-02 23:00:00', 1),
(8, 1, 'Implement component 2', 'asdasdasdasd', 32, 'complete', '2015-05-02 23:00:00', '2015-04-04 23:00:00', 1),
(9, 1, 'Implement component 3', 'asdasdasdasd', 60, 'complete', '2015-04-06 23:00:00', '2015-04-06 23:00:00', 1),
(10, 1, 'Implement component 4', 'asdasdasdasd', 125, 'complete', '2015-04-06 23:00:00', '2015-04-08 23:00:00', 1),
(11, 1, 'Implement component 5', 'asdasdasdasd', 125, 'complete', '2015-04-06 23:00:00', '2015-04-09 23:00:00', 1),
(12, 1, 'Implement component 6', 'asdasdasdasd', 80, 'complete', '2015-04-06 23:00:00', '2015-04-11 23:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_users`
--

CREATE TABLE IF NOT EXISTS `tasks_users` (
`id` int(10) NOT NULL,
  `task_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tasks_users`
--

INSERT INTO `tasks_users` (`id`, `task_id`, `user_id`, `notes`) VALUES
(3, 2, 5, ''),
(5, 5, 10, '123456asd'),
(6, 1, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'Haroldas Latonas', 'dummypassword', 'admin'),
(2, 'John John', 'samplepassword', ''),
(5, 'John', '476bccaae3119a832b0269362186f7fac4ed6ffb', 'developer'),
(6, 'Lam', 'c3d772361a6241fc112ddb4f65770889de0fcc20', 'sysadmin'),
(7, 'a', 'ef692b6c54d558fdc38e9ddb019c7968ff438148', 'developer'),
(8, 'Rol', '0917e6e887288cf2c5533ae1a901d02ebd9ce62c', 'sysadmin'),
(9, 'Rol', '0917e6e887288cf2c5533ae1a901d02ebd9ce62c', 'sysadmin'),
(10, 'Steve', '0cd22fbfae0975acbb121295d82ff05602346397', 'sysadmin');

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
-- Indexes for table `projects_users`
--
ALTER TABLE `projects_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks_users`
--
ALTER TABLE `tasks_users`
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
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects_users`
--
ALTER TABLE `projects_users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tasks_users`
--
ALTER TABLE `tasks_users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
