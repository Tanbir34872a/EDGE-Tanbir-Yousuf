-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 07:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collaborative_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addmember`
--

CREATE TABLE `addmember` (
  `addMemberId` int(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addmember`
--

INSERT INTO `addmember` (`addMemberId`, `username`, `role`) VALUES
(127, 'ana', 'Quality Assurance'),
(129, 'Nishu', 'Software Aechitect'),
(130, 'Shoshi', 'Quality Assurance'),
(131, 'Namira', 'Quality Assurance');

-- --------------------------------------------------------

--
-- Table structure for table `adminproject`
--

CREATE TABLE `adminproject` (
  `projectId` int(200) NOT NULL,
  `projectName` varchar(200) NOT NULL,
  `projectType` varchar(200) NOT NULL,
  `projectDetails` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminproject`
--

INSERT INTO `adminproject` (`projectId`, `projectName`, `projectType`, `projectDetails`) VALUES
(1, 'database', 'Web', ' this project is about database'),
(2, 'collaboration system', 'Web', ' tthis is web based project'),
(4, 'Ticket Reservation S', 'Desktop Application', ' simple java based desktop application'),
(11, 'MRT Line 1 computer graphics', 'mobile application', 'this is computer graphics project. have to use glut'),
(20, 'Air Ticket Reservation System', 'Desktop Application Java', ' Java console based application'),
(21, 'automatic plant watering system', 'Arduino Based ', 'Automatic plant watering system using IOT'),
(59, 'database insane', 'mobile application', ' insane project');

-- --------------------------------------------------------

--
-- Table structure for table `assignmanager`
--

CREATE TABLE `assignmanager` (
  `assignManID` int(20) NOT NULL,
  `projectId` int(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignmanager`
--

INSERT INTO `assignmanager` (`assignManID`, `projectId`, `username`) VALUES
(2, 1, 'akash'),
(3, 2, 'fabliha'),
(7, 1, 'akash'),
(17, 20, 'james'),
(18, 21, 'fabliha'),
(20, 59, 'akashh');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `opinion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `country`, `opinion`) VALUES
(1, 'Aditto', 'nouroj@gmail.com', 'Bangladesh', 'awesome'),
(2, 'Aditto', 'mushfiq1519@gmail.com', 'Bangladesh', 'josss'),
(3, 'Aditto', 'nouroj@gmail.com', 'usa', 'excellent');

-- --------------------------------------------------------

--
-- Table structure for table `overviews`
--

CREATE TABLE `overviews` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `percent` varchar(200) NOT NULL,
  `complete` varchar(200) NOT NULL,
  `remain` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overviews`
--

INSERT INTO `overviews` (`id`, `name`, `percent`, `complete`, `remain`) VALUES
(1, 'Eccommerce website', '65', 'front end, authentication, interface', 'database, Backend'),
(2, 'Bug testing', '75', 'manual test, intregation test', 'Automation test'),
(3, 'Hotel management', '90', 'frontend, backend, testing', 'deployment');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(200) NOT NULL,
  `account` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `method` varchar(200) NOT NULL,
  `pid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `account`, `amount`, `method`, `pid`) VALUES
(1, '123456543', '5000', 'bkash', '65456545654'),
(2, '56475438', '10000', 'mastercard', '74837483748'),
(3, '01784444256', '1500', 'bkash', '15145625');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `github_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `NAME`, `summary`, `github_link`) VALUES
(2, 'a', 'aa', 'aaa'),
(3, 'b', 'bb', 'bb');

-- --------------------------------------------------------

--
-- Table structure for table `setpriority`
--

CREATE TABLE `setpriority` (
  `priority_id` int(100) NOT NULL,
  `assignManID` int(255) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_type` varchar(100) NOT NULL,
  `priority_task` varchar(100) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setpriority`
--

INSERT INTO `setpriority` (`priority_id`, `assignManID`, `project_name`, `project_type`, `priority_task`, `deadline`) VALUES
(51, 3, 'Hotel management', 'Web', 'HTML', '2023-12-21'),
(53, 3, 'collaboration system', 'web', 'HTML', '2023-12-13'),
(55, 5, 'Hotel management', 'web', 'php', '2023-12-21'),
(56, 3, 'collaboration system', 'Web', 'php', '2023-12-13'),
(57, 3, 'collaboration system', 'Web', 'HTML', '2023-12-13'),
(58, 3, 'collaboration system', 'Web', 'HTML', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `set_task_priority`
--

CREATE TABLE `set_task_priority` (
  `set_task_id` int(20) NOT NULL,
  `projectId` int(20) NOT NULL,
  `task_Priority` varchar(100) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `sug_id` int(255) NOT NULL,
  `q` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`sug_id`, `q`) VALUES
(1, 'HTML'),
(2, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `task_status_update`
--

CREATE TABLE `task_status_update` (
  `taskStatusUpId` int(50) NOT NULL,
  `set_task_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_member`
--

CREATE TABLE `team_member` (
  `add_member_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_member`
--

INSERT INTO `team_member` (`add_member_id`, `username`, `role`) VALUES
(1, 'karim', 'Complete all UI for User Admin'),
(2, 'rahim', 'fix the new html file'),
(5, 'james', 'Code all the CSS for for Admin user.');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(60) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `userType` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `name`, `email`, `password`, `gender`, `dob`, `userType`) VALUES
('akash', 'arvil nath akash', 'as@gnmal.com', 'aka@12', 'Female', '2023-11-20', 'Manager'),
('akashh', 'Lupin', 'lupin@gmail.com', 'lupin@08', 'Male', '2023-11-27', 'Manager'),
('ashrafulatif', 'Ashraful Haque Atif', 'ashrafulatif@outlook.com', 'atif@08', 'Male', '1999-10-08', 'Admin'),
('atif1', 'Ashraful Haque Atif', 'ashrafulatif@gmail.com', 'atif@08', 'Male', '2023-10-17', 'Admin'),
('blake', 'blake', 'ashrafulatif@outlook.com', 'atif@08', 'Male', '2023-11-29', 'Admin'),
('fabliha', 'duti', 'fabliha.hasnin@gmail.com', 'duti@12', 'Female', '2023-11-07', 'Manager'),
('james', 'James Andrew', 'james@gmail.com', 'james@08', 'Male', '1999-03-10', 'Developer'),
('karim', 'karim', 'karim@gmail.com', 'karim@08', 'Male', '2023-11-28', 'Developer'),
('nouroj', 'nouroj', 'nouroj@gmail.com', 'nouroj@12', 'Male', '1997-06-11', 'Client'),
('rahim', 'rahim', 'rahim@gmail.com', 'rahim@08', 'Male', '2023-11-29', 'Developer'),
('rumas', 'rumas', 'rumasj@gmail.com', 'rumas@12', 'Male', '2023-12-12', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `userpassword` varchar(100) NOT NULL,
  `confirmpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `dob`, `address`, `usertype`, `userpassword`, `confirmpassword`) VALUES
(4, 'nouroj', 'nouroj@gmail.com', 1632103750, '2023-11-09', 'kuratoli', 'client', '123456', '123456'),
(9, 'afrida', 'mushfiq@gmail.com', 1632103756, '2023-11-15', '47', 'client', '123456', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `usersDev`
--

CREATE TABLE `usersDev` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('Admin','Manager','Developer','Client') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersDev`
--

INSERT INTO `usersDev` (`id`, `name`, `username`, `email`, `gender`, `dob`, `password`, `user_type`) VALUES
(1, 'MD. Farhan Israk Faraby', 'ImFarhanIsrak', 'farhanisrak24@gmail.com', 'Male', '2023-12-05', '$2y$10$MYYIdsuwkoKWrxg2mw6cBuVmddLh/OoJE1HcairRj8Ee9VmMSHLXK', 'Developer'),
(7, 'Farhan', 'ImFarhanIsrak2', 'fark24@gmail.com', 'Female', '2023-12-03', '$2y$10$Y.O7ipEhToAKe3PIDF.3cu7QDIaPOlE2GtdXnTBRh4.zgSRrrv6yW', 'Admin'),
(8, 'MD. Farhan Israk Faraby', 'ImFarhanIsrak3', 'farhanisrak24@gmail.com', 'Male', '2023-12-06', '$2y$10$AP9CuEtbU.5DTPTcTDwcveab8IiD0rIWkz7mrzotmfrvhsAlfVrNG', 'Manager'),
(9, 'aaaaaaa', 'admin1', 'farha@gmail.com', 'Male', '2023-12-10', '$2y$10$3cBDk6eQjYaC.U7k6DFBaORR9vXAJAi.dj4ZBK12D3G9TvAme0bYO', 'Developer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmember`
--
ALTER TABLE `addmember`
  ADD PRIMARY KEY (`addMemberId`);

--
-- Indexes for table `adminproject`
--
ALTER TABLE `adminproject`
  ADD PRIMARY KEY (`projectId`);

--
-- Indexes for table `assignmanager`
--
ALTER TABLE `assignmanager`
  ADD PRIMARY KEY (`assignManID`),
  ADD KEY `assignmanager_ibfk_1` (`projectId`),
  ADD KEY `assignmanager_ibfk_2` (`username`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setpriority`
--
ALTER TABLE `setpriority`
  ADD PRIMARY KEY (`priority_id`),
  ADD KEY `assignManID` (`assignManID`);

--
-- Indexes for table `set_task_priority`
--
ALTER TABLE `set_task_priority`
  ADD PRIMARY KEY (`set_task_id`),
  ADD KEY `projectId` (`projectId`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`sug_id`);

--
-- Indexes for table `task_status_update`
--
ALTER TABLE `task_status_update`
  ADD PRIMARY KEY (`taskStatusUpId`),
  ADD KEY `set_task_id` (`set_task_id`);

--
-- Indexes for table `team_member`
--
ALTER TABLE `team_member`
  ADD PRIMARY KEY (`add_member_id`),
  ADD KEY `team_member_ibfk_1` (`username`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersDev`
--
ALTER TABLE `usersDev`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addmember`
--
ALTER TABLE `addmember`
  MODIFY `addMemberId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `adminproject`
--
ALTER TABLE `adminproject`
  MODIFY `projectId` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `assignmanager`
--
ALTER TABLE `assignmanager`
  MODIFY `assignManID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setpriority`
--
ALTER TABLE `setpriority`
  MODIFY `priority_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `set_task_priority`
--
ALTER TABLE `set_task_priority`
  MODIFY `set_task_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `sug_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task_status_update`
--
ALTER TABLE `task_status_update`
  MODIFY `taskStatusUpId` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_member`
--
ALTER TABLE `team_member`
  MODIFY `add_member_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usersDev`
--
ALTER TABLE `usersDev`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignmanager`
--
ALTER TABLE `assignmanager`
  ADD CONSTRAINT `assignmanager_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `adminproject` (`projectId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignmanager_ibfk_2` FOREIGN KEY (`username`) REFERENCES `userinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `set_task_priority`
--
ALTER TABLE `set_task_priority`
  ADD CONSTRAINT `set_task_priority_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `adminproject` (`projectId`);

--
-- Constraints for table `task_status_update`
--
ALTER TABLE `task_status_update`
  ADD CONSTRAINT `task_status_update_ibfk_1` FOREIGN KEY (`set_task_id`) REFERENCES `set_task_priority` (`set_task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team_member`
--
ALTER TABLE `team_member`
  ADD CONSTRAINT `team_member_ibfk_1` FOREIGN KEY (`username`) REFERENCES `userinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
