-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 03:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `user_id` bigint(255) NOT NULL,
  `user_friend_name` varchar(255) NOT NULL,
  `ans1` varchar(255) NOT NULL,
  `ans2` varchar(255) NOT NULL,
  `ans3` varchar(255) NOT NULL,
  `ans4` varchar(255) NOT NULL,
  `ans5` varchar(255) NOT NULL,
  `ans6` varchar(255) NOT NULL,
  `ans7` varchar(255) NOT NULL,
  `ans8` varchar(255) NOT NULL,
  `ans9` varchar(255) NOT NULL,
  `ans10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`user_id`, `user_friend_name`, `ans1`, `ans2`, `ans3`, `ans4`, `ans5`, `ans6`, `ans7`, `ans8`, `ans9`, `ans10`) VALUES
(5536805689796004, 'friend', 'Rugged', 'Friend', 'No', 'Caring', 'None of these', 'InCollege', 'MoreSecrets', '7-8', 'Instagram', 'GoingToMovies'),
(6043551608653062, 'vignesh', 'Rugged', 'Love', 'Yes', 'Caring', 'CareLess', 'InCollege', 'MoreSecrets', '5-7', 'Instagram', 'GoingToMovies');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `user_id` bigint(255) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`user_id`, `gender`, `name`) VALUES
(0, 'Male', 'vignesh'),
(2147483647, 'Male', 'vignesh'),
(2147483647, 'Male', 'vignesh'),
(6043551608653062, 'Male', 'name'),
(5536805689796004, 'Male', 'vignesh'),
(2551337631285235, 'Male', 'silambu');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `male` varchar(255) NOT NULL,
  `female` varchar(255) NOT NULL,
  `opt1` varchar(255) NOT NULL,
  `opt2` varchar(255) NOT NULL,
  `opt3` varchar(255) NOT NULL,
  `opt4` varchar(255) NOT NULL,
  `opt5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`male`, `female`, `opt1`, `opt2`, `opt3`, `opt4`, `opt5`) VALUES
('name is a Rugged Boy or Chocolate Boy', 'name is Rugged Girl or Chocolate Girl', 'Rugged', 'Chocolate', '', '', ''),
('What is the Relation Between You and name', 'What is the Relation Between You and name', 'Love', 'Friend', 'Bestie', 'Cousin', 'All of these'),
('Will You Maintain Your Relation with name', 'Will You Maintain Your Relation with name', 'Yes', 'No', 'LifeTime', '', ''),
('Best Thing About name', 'Best Thing About name', 'Attitude', 'Caring', 'Appearance', 'Kindness', ''),
('Thing You Don\'t like About name', 'Thing You Don\'t like About name', 'CareLess', 'Behaviours', 'Attitude', 'None of these', ''),
('When Did You First Meet name', 'When Did You First Meet name', 'ChildHood', 'InSchool', 'InCollege', 'InMyArea', 'None of these'),
('Did You Have any Secrets', 'Did You Have any Secrets', 'Yes', 'No', 'MoreSecrets', '', ''),
('Give Rating for name', 'Give Rating for name', '0-5', '5-7', '7-8', '8-9', '10'),
('Contacting Medium Between You and name', 'Contacting Medium Between You and name', 'WhatsApp', 'Instagram', 'Facebook', 'PhoneCalls', 'Others'),
('If you Get a Cheance to Spend Time with name How will You Spend', 'If you Get a Cheance to Spend Time with name How will You Spend', 'GoingToMovies', 'LongTrip', 'SpendingTime', 'BikeRide', 'others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
