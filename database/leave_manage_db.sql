-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2024 at 05:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_manage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(191) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL,
  `admin_profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `last_name`, `admin_email`, `phone_number`, `admin_username`, `admin_password`, `admin_profile`) VALUES
(1, '', '', '', '', 'admin', 'lms123', '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `address`, `city`, `country`) VALUES
(1, 'Mango Byte', '371 street Ou\'Baek\'orm Phnom Penh', 'Phnom Penh', 'Cambodia');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) DEFAULT NULL,
  `department_desc` text NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_desc`, `manager_id`) VALUES
(1, 'PHP BackEnd', '', 33),
(2, 'Node Back-End', 'Working with node to build wep app', 32),
(4, 'Vuetify', '', 31),
(5, 'Sale Department', '', 36),
(6, 'API Development', 'Work on API', 31);

-- --------------------------------------------------------

--
-- Stand-in structure for view `department_requests`
-- (See below for the actual view)
--
CREATE TABLE `department_requests` (
`department_id` int(11)
,`uid` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`profile` text
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `request_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `leavetype_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `added_times` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `seen_status` int(1) NOT NULL DEFAULT 1,
  `admin_seen_status` int(1) NOT NULL DEFAULT 0,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`request_id`, `uid`, `leavetype_id`, `start_date`, `end_date`, `status_id`, `added_times`, `update_time`, `seen_status`, `admin_seen_status`, `reason`) VALUES
(12, 32, 1, '2024-03-26', '2024-03-27', 3, '2024-03-26 11:56:56', '2024-03-26 11:58:22', 0, 1, ''),
(13, 46, 2, '2024-03-27', '2024-03-28', 4, '2024-03-26 11:59:09', '2024-03-26 12:01:10', 0, 1, ''),
(14, 46, 1, '2024-03-28', '2024-03-29', 1, '2024-03-26 13:33:38', '2024-03-27 00:14:17', 0, 1, ''),
(15, 32, 2, '2024-03-13', '2024-03-14', 3, '2024-03-27 01:43:35', '2024-03-27 04:30:49', 0, 0, ''),
(16, 32, 1, '2024-03-27', '2023-03-27', 3, '2024-03-27 04:31:23', '2024-03-27 04:35:45', 0, 0, 'Test'),
(17, 32, 1, '2024-03-06', '2023-03-07', 3, '2024-03-27 04:49:16', '2024-03-27 04:52:45', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE `leave_status` (
  `status_id` int(11) NOT NULL,
  `status_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`status_id`, `status_desc`) VALUES
(1, 'Approved'),
(2, 'Rejected'),
(3, 'Pending'),
(4, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `leaveType_id` int(11) NOT NULL,
  `leaveType_desc` varchar(50) DEFAULT NULL,
  `leaveType_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`leaveType_id`, `leaveType_desc`, `leaveType_detail`) VALUES
(1, 'Sick Leave', 'Leave on Illness.. ended'),
(2, 'Paid Leave', 'Daily allowed leaves'),
(3, 'Holiday', 'Basically a day off'),
(4, 'Annual Leave', 'Once a year');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_request`
--

CREATE TABLE `password_reset_request` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `token` text NOT NULL,
  `verifier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_request`
--

INSERT INTO `password_reset_request` (`id`, `email`, `token`, `verifier`) VALUES
(4, 'rathsamreth0200@gmail.com', '165f1166f3b0f5', '6572'),
(6, 'rathsamreth0200@gmail.com', '16602b4bb3500d', '1797');

-- --------------------------------------------------------

--
-- Table structure for table `postions`
--

CREATE TABLE `postions` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(50) DEFAULT NULL,
  `position_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `postions`
--

INSERT INTO `postions` (`position_id`, `position_name`, `position_desc`) VALUES
(1, 'Project Manager', 'In charge of managing project and planning'),
(2, 'Team Lead', 'Leading a team and planning all team member toward success.');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `reviewType_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `uid`, `reviewType_id`, `start_date`, `end_date`, `status_id`) VALUES
(3, 32, 1, '2024-03-11', '2024-03-11', 1),
(4, 32, 1, '2024-03-13', '2024-03-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_status`
--

CREATE TABLE `review_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_status`
--

INSERT INTO `review_status` (`status_id`, `status_name`) VALUES
(1, 'In Progress'),
(2, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `review_types`
--

CREATE TABLE `review_types` (
  `reviewType_id` int(11) NOT NULL,
  `reviewType_name` varchar(200) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_types`
--

INSERT INTO `review_types` (`reviewType_id`, `reviewType_name`, `uid`, `added_time`, `admin_id`) VALUES
(1, 'Monthly Review', 32, '2024-03-10 13:17:36', NULL),
(3, 'Yearly Review', 39, '2024-03-24 15:59:30', NULL),
(9, 'Anually Review', 39, '2024-03-25 00:16:19', NULL),
(10, 'Daily Review', NULL, '2024-03-26 02:14:43', 1),
(11, 'Day off', NULL, '2024-03-26 11:55:59', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_requests`
-- (See below for the actual view)
--
CREATE TABLE `total_requests` (
`request_id` int(11)
,`uid` int(11)
,`profile` text
,`first_name` varchar(50)
,`last_name` varchar(50)
,`email` varchar(100)
,`leaveType_desc` varchar(50)
,`start_date` date
,`end_date` date
,`status_desc` varchar(50)
,`added_times` timestamp
,`update_time` timestamp
,`seen_status` int(1)
,`admin_seen_status` int(1)
);

-- --------------------------------------------------------

--
-- Table structure for table `userroles`
--

CREATE TABLE `userroles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) DEFAULT NULL,
  `role_desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userroles`
--

INSERT INTO `userroles` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Manager', 'Approve or Reject all requests'),
(2, 'Employee', 'Have only normal access to the system');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `position_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `salary` decimal(10,0) DEFAULT NULL,
  `total_allowed_leave` int(11) DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `manager_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `gender`, `date_of_birth`, `phone_number`, `email`, `password`, `position_id`, `role_id`, `department_id`, `salary`, `total_allowed_leave`, `profile`, `manager_id`) VALUES
(31, 'Neardey', 'Loem', NULL, '2005-03-05', '08797978', 'radit.thy@gmail.com', '123', 1, 1, 1, 400, 12, 'assets/profile/profiles65ed75d55c2096.00444588.jpg', 32),
(32, 'Rath', 'Samreth', NULL, '2000-10-10', '097 86 37 281', 'rathsamreth0200@gmail.com', '$2y$10$1QgvCpSxqfCDOVvfh2eNy.BQqCO0DmX5hhDku64TwagiHLaFSD2h6', 1, 1, 2, 400, 9, 'assets/profile/profiles65ed6c1b736a58.18787890.jpg', 0),
(33, 'Radit', 'Thy', NULL, '2002-06-15', NULL, 'radit.thy0200@gmail.com', '', 1, 1, 4, NULL, 12, 'assets/profile/profiles65ed74e11bca81.05818908.jpg', 32),
(37, 'Leysreng', 'OL', NULL, '2006-03-18', NULL, 'leysreng.ol@gmail.com', '081229190', 2, 2, 2, NULL, 10, 'assets/profile/profiles65f2563569e5f6.62692194.jpg', 33),
(39, 'Veak', 'Khlorp', NULL, '2002-03-24', NULL, 'veak.khlorp@gmail.com', '$2y$10$4v5fTJA02agSAuKj8Z3DF.kFUyzD7MLZEhzIeYvD6Op0tkuKeGIXm', 2, 1, 1, NULL, 12, 'assets/profile/profiles660035ab83b160.99590563.jpg', 31),
(40, 'Veak', 'Khlorp', NULL, '2024-03-18', '08797978', 'rathsamrith.webdev@gmail.com', '$2y$10$f1E4Wb4F47iaHSWZymKiAOV8LhIoy2Falf1XJoyNkXovTztT35HgO', 2, 2, 2, 1000, 12, 'assets/profile/profiles66022c69031776.41462052.jpg', 0),
(45, 'Lucas', 'Traumen', NULL, '2024-03-26', '08797978', 'rathsamrith@gmail.com', '$2y$10$SuhqSyt6TIbf2OC8c4bhaeYGmLdOQrn0pmcKM5Edtk6B0kmK252cK', 2, 2, 2, 0, 12, 'assets/profile/profiles66022d1b032e01.75856544.jpg', 0),
(46, 'Emily', 'Jessy', NULL, '2024-03-26', NULL, 'emi@gmail.com', '$2y$10$IuFCUmyiLGMKkGfVRPf6hu8FSswU7aPQDqpmlpQsCXLfDUhrQCiPS', 2, 2, 2, NULL, 12, 'assets/profile/profiles660364f76e01b6.40456152.jpg', 32),
(47, 'Chanthou', 'Voeun', NULL, '2005-10-10', NULL, 'voeunchanthou74@gmail.com', '$2y$10$0kroAcja/2FQhGfDxixD5.M0bL3Z8tJhaNRu7mpRzRQ80tUdbjbNC', 1, 1, 1, NULL, 12, 'assets/profile/profiles66036dcd2f66e5.35730186.jpg', 33);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_details`
-- (See below for the actual view)
--
CREATE TABLE `user_details` (
`uid` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`profile` text
,`date_of_birth` date
,`email` varchar(100)
,`password` text
,`phone_number` varchar(50)
,`user_department_id` int(11)
,`department_name` varchar(50)
,`role_id` int(11)
,`role_name` varchar(50)
,`position_id` int(11)
,`position_name` varchar(50)
,`total_allowed_leave` int(11)
,`salary` decimal(10,0)
,`user_manager_id` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_manager`
-- (See below for the actual view)
--
CREATE TABLE `user_manager` (
`uid` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`profile` text
,`user_email` varchar(100)
,`position_name` varchar(50)
,`department_name` varchar(50)
,`role_name` varchar(50)
,`manager_id` int(11)
,`manager_firstname` varchar(50)
,`manager_lastname` varchar(50)
,`manager_profile` text
,`manager_email` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `department_requests`
--
DROP TABLE IF EXISTS `department_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `department_requests`  AS SELECT `departments`.`department_id` AS `department_id`, `leave_requests`.`uid` AS `uid`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`profile` AS `profile`, count(`leave_requests`.`uid`) AS `total` FROM ((`departments` join `users` on(`departments`.`department_id` = `users`.`department_id`)) join `leave_requests` on(`users`.`uid` = `leave_requests`.`uid`)) GROUP BY `users`.`uid` ;

-- --------------------------------------------------------

--
-- Structure for view `total_requests`
--
DROP TABLE IF EXISTS `total_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_requests`  AS SELECT `leave_requests`.`request_id` AS `request_id`, `users`.`uid` AS `uid`, `users`.`profile` AS `profile`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`email` AS `email`, `leave_types`.`leaveType_desc` AS `leaveType_desc`, `leave_requests`.`start_date` AS `start_date`, `leave_requests`.`end_date` AS `end_date`, `leave_status`.`status_desc` AS `status_desc`, `leave_requests`.`added_times` AS `added_times`, `leave_requests`.`update_time` AS `update_time`, `leave_requests`.`seen_status` AS `seen_status`, `leave_requests`.`admin_seen_status` AS `admin_seen_status` FROM (((`leave_requests` left join `users` on(`leave_requests`.`uid` = `users`.`uid`)) left join `leave_types` on(`leave_requests`.`leavetype_id` = `leave_types`.`leaveType_id`)) left join `leave_status` on(`leave_requests`.`status_id` = `leave_status`.`status_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_details`
--
DROP TABLE IF EXISTS `user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_details`  AS SELECT `users`.`uid` AS `uid`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`profile` AS `profile`, `users`.`date_of_birth` AS `date_of_birth`, `users`.`email` AS `email`, `users`.`password` AS `password`, `users`.`phone_number` AS `phone_number`, `users`.`department_id` AS `user_department_id`, `departments`.`department_name` AS `department_name`, `users`.`role_id` AS `role_id`, `userroles`.`role_name` AS `role_name`, `users`.`position_id` AS `position_id`, `postions`.`position_name` AS `position_name`, `users`.`total_allowed_leave` AS `total_allowed_leave`, `users`.`salary` AS `salary`, `users`.`manager_id` AS `user_manager_id` FROM (((`users` join `departments` on(`users`.`department_id` = `departments`.`department_id`)) join `postions` on(`users`.`position_id` = `postions`.`position_id`)) join `userroles` on(`users`.`role_id` = `userroles`.`role_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_manager`
--
DROP TABLE IF EXISTS `user_manager`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_manager`  AS SELECT `a`.`uid` AS `uid`, `a`.`first_name` AS `first_name`, `a`.`last_name` AS `last_name`, `a`.`profile` AS `profile`, `a`.`email` AS `user_email`, `postions`.`position_name` AS `position_name`, `departments`.`department_name` AS `department_name`, `userroles`.`role_name` AS `role_name`, `b`.`uid` AS `manager_id`, `b`.`first_name` AS `manager_firstname`, `b`.`last_name` AS `manager_lastname`, `b`.`profile` AS `manager_profile`, `b`.`email` AS `manager_email` FROM ((((`users` `a` left join `users` `b` on(`b`.`uid` = `a`.`manager_id`)) left join `postions` on(`a`.`position_id` = `postions`.`position_id`)) left join `departments` on(`a`.`department_id` = `departments`.`department_id`)) left join `userroles` on(`a`.`role_id` = `userroles`.`role_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `leavetype_id` (`leavetype_id`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`leaveType_id`);

--
-- Indexes for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postions`
--
ALTER TABLE `postions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `uid` (`uid`),
  ADD KEY `reviewType_id` (`reviewType_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `review_status`
--
ALTER TABLE `review_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `review_types`
--
ALTER TABLE `review_types`
  ADD PRIMARY KEY (`reviewType_id`),
  ADD KEY `review_types_ibfk_1` (`uid`);

--
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `leaveType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_reset_request`
--
ALTER TABLE `password_reset_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `postions`
--
ALTER TABLE `postions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review_status`
--
ALTER TABLE `review_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review_types`
--
ALTER TABLE `review_types`
  MODIFY `reviewType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`leavetype_id`) REFERENCES `leave_types` (`leaveType_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`reviewType_id`) REFERENCES `review_types` (`reviewType_id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `review_status` (`status_id`);

--
-- Constraints for table `review_types`
--
ALTER TABLE `review_types`
  ADD CONSTRAINT `review_types_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
