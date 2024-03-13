-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2024 at 12:05 PM
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
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'lms123');

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
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `company_id`) VALUES
(2, 'PHP Back end', 1),
(3, 'Node Back-End', 1);

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
  `seen_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`request_id`, `uid`, `leavetype_id`, `start_date`, `end_date`, `status_id`, `added_times`, `update_time`, `seen_status`) VALUES
(1, 26, 4, '2024-02-29', '2024-03-01', 1, '2024-02-29 05:47:30', '2024-03-03 04:45:13', 1),
(3, 21, 2, '2024-03-08', '2024-02-16', 3, '2024-02-29 05:53:11', '2024-02-29 05:54:16', 0),
(4, 14, 4, '2024-03-01', '2024-03-03', 3, '2024-02-29 10:46:50', '2024-02-29 10:46:50', 0),
(5, 21, 4, '2024-03-01', '2024-03-03', 1, '2024-02-29 10:51:55', '2024-02-29 10:51:55', 0),
(6, 14, 2, '2024-03-05', '2024-03-06', 3, '2024-03-01 02:17:45', '2024-03-01 02:17:45', 0),
(7, 14, 3, '2024-03-03', '2024-03-04', 3, '2024-03-01 02:18:02', '2024-03-01 02:18:02', 0),
(8, 14, 1, '2024-03-07', '2024-03-08', 3, '2024-03-01 02:49:37', '2024-03-01 02:49:37', 0),
(9, 14, 4, '2024-03-08', '2024-02-16', 3, '2024-03-03 09:39:21', '2024-03-03 09:39:21', 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `review_status`
--

CREATE TABLE `review_status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review_types`
--

CREATE TABLE `review_types` (
  `reviewType_id` int(11) NOT NULL,
  `reviewType_name` varchar(200) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `date_of_birth`, `phone_number`, `email`, `password`, `position_id`, `role_id`, `department_id`, `salary`, `total_allowed_leave`, `profile`, `manager_id`) VALUES
(14, 'Rath', 'Samreth', '2024-01-31', '097 86 37 282', 'rathsamrith.webdev@gmail.com', '', 1, 2, 3, 400, 12, 'assets/profile/profiles65d7ee699f2d79.44111168.jpg', 0),
(15, 'Leysreng', 'OL', '2024-01-31', '08797978', 'jamesbond112@gmail.com', '', 0, 2, 0, 400, 12, 'assets/profile/profiles65dbde3084f520.42597471.jpg', 14),
(21, 'Radit', 'Thy', '2002-02-21', '', 'radit.thy@gmail.com', '123', 1, 2, 2, 400, 0, 'assets/profile/profiles65dbe0359618d5.40990847.jpg', 14),
(26, 'Neardey', 'Loem', '2024-02-26', '08797978', 'neardey.loem@gmail.com', '12', 1, 2, 2, 400, 12, 'assets/profile/profiles65dbe8b5bcd992.02867424.jpg', 14),
(30, 'Veak', 'Khlorp', '2024-02-27', '08797978', 'veak.webdev@gmail.com', '12', 2, 2, 2, 400, 12, 'assets/profile/profiles65de9b4fc11817.11580505.jpg', 21);

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
,`phone_number` varchar(50)
,`department_name` varchar(50)
,`position_name` varchar(50)
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
-- Structure for view `total_requests`
--
DROP TABLE IF EXISTS `total_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_requests`  AS SELECT `leave_requests`.`request_id` AS `request_id`, `users`.`uid` AS `uid`, `users`.`profile` AS `profile`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`email` AS `email`, `leave_types`.`leaveType_desc` AS `leaveType_desc`, `leave_requests`.`start_date` AS `start_date`, `leave_requests`.`end_date` AS `end_date`, `leave_status`.`status_desc` AS `status_desc`, `leave_requests`.`added_times` AS `added_times`, `leave_requests`.`update_time` AS `update_time`, `leave_requests`.`seen_status` AS `seen_status` FROM (((`leave_requests` left join `users` on(`leave_requests`.`uid` = `users`.`uid`)) left join `leave_types` on(`leave_requests`.`leavetype_id` = `leave_types`.`leaveType_id`)) left join `leave_status` on(`leave_requests`.`status_id` = `leave_status`.`status_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_details`
--
DROP TABLE IF EXISTS `user_details`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_details`  AS SELECT `users`.`uid` AS `uid`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `users`.`profile` AS `profile`, `users`.`date_of_birth` AS `date_of_birth`, `users`.`phone_number` AS `phone_number`, `departments`.`department_name` AS `department_name`, `postions`.`position_name` AS `position_name` FROM ((`users` join `departments` on(`users`.`department_id` = `departments`.`department_id`)) join `postions` on(`users`.`position_id` = `postions`.`position_id`)) ;

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
  ADD KEY `uid` (`uid`);

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
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `leaveType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `postions`
--
ALTER TABLE `postions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_status`
--
ALTER TABLE `review_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review_types`
--
ALTER TABLE `review_types`
  MODIFY `reviewType_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  ADD CONSTRAINT `review_types_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
