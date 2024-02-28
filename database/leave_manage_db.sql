-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2024 at 03:33 PM
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
(2, 'PHP Back end', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `employment_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `uid`, `employment_id`, `start_date`) VALUES
(1, 1, 1, '2014-02-13'),
(2, 2, 2, '2024-02-08');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employee_list`
-- (See below for the actual view)
--
CREATE TABLE `employee_list` (
`employee_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`start_date` date
,`type_desc` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `employment_type`
--

CREATE TABLE `employment_type` (
  `employment_id` int(11) NOT NULL,
  `type_desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment_type`
--

INSERT INTO `employment_type` (`employment_id`, `type_desc`) VALUES
(1, 'Permenent');

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
  `status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`request_id`, `uid`, `leavetype_id`, `start_date`, `end_date`, `status_id`) VALUES
(7, 14, 2, '2024-02-25', '2024-03-09', 2),
(8, 14, 3, '2024-01-21', '2024-02-03', 3),
(9, 14, 3, '2024-01-21', '2024-02-03', 3),
(10, 14, 3, '2024-02-14', '2024-02-25', 3),
(11, 15, 3, '2024-02-08', '2024-02-16', 1);

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
(2, 'Paid Leave', 'Daily allowed leave etc...'),
(3, 'Holiday', 'Basically a day off');

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
(1, 'Project Manager', 'In charge of managing project and planning');

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
,`leaveType_desc` varchar(50)
,`start_date` date
,`end_date` date
,`status_desc` varchar(50)
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
  `profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `first_name`, `last_name`, `date_of_birth`, `phone_number`, `email`, `password`, `position_id`, `role_id`, `department_id`, `salary`, `total_allowed_leave`, `profile`) VALUES
(14, 'Rath', 'Samreth', '2024-01-31', '097 86 37 282', 'rathsamrith.webdev@gmail.com', '', 0, 2, 0, 400, 12, 'assets/profile/profiles65d7ee699f2d79.44111168.jpg'),
(15, 'leysreng', 'OL', '2024-01-31', '08797978', 'jamesbond112@gmail.com', '', 0, 2, 0, 400, 12, 'assets/profile/profiles65d81b00782907.47852223.jpg');

-- --------------------------------------------------------

--
-- Structure for view `employee_list`
--
DROP TABLE IF EXISTS `employee_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `employee_list`  AS SELECT `employees`.`employee_id` AS `employee_id`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `employees`.`start_date` AS `start_date`, `employment_type`.`type_desc` AS `type_desc` FROM ((`employees` join `users` on(`employees`.`uid` = `users`.`uid`)) join `employment_type` on(`employees`.`employment_id` = `employment_type`.`employment_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `total_requests`
--
DROP TABLE IF EXISTS `total_requests`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_requests`  AS SELECT `leave_requests`.`request_id` AS `request_id`, `leave_requests`.`uid` AS `uid`, `users`.`profile` AS `profile`, `users`.`first_name` AS `first_name`, `users`.`last_name` AS `last_name`, `leave_types`.`leaveType_desc` AS `leaveType_desc`, `leave_requests`.`start_date` AS `start_date`, `leave_requests`.`end_date` AS `end_date`, `leave_status`.`status_desc` AS `status_desc` FROM (((`leave_requests` join `leave_types` on(`leave_requests`.`leavetype_id` = `leave_types`.`leaveType_id`)) join `users` on(`leave_requests`.`uid` = `users`.`uid`)) join `leave_status` on(`leave_requests`.`status_id` = `leave_status`.`status_id`)) ;

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
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employment_type`
--
ALTER TABLE `employment_type`
  ADD PRIMARY KEY (`employment_id`);

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
-- Indexes for table `userroles`
--
ALTER TABLE `userroles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employment_type`
--
ALTER TABLE `employment_type`
  MODIFY `employment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leave_status`
--
ALTER TABLE `leave_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `leaveType_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `postions`
--
ALTER TABLE `postions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userroles`
--
ALTER TABLE `userroles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`leavetype_id`) REFERENCES `leave_types` (`leaveType_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `userroles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
