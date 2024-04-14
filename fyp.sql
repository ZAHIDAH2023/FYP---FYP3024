-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2024 at 08:07 AM
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
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(3, 'admin', 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `subject`, `amount`, `remark`) VALUES
(18, 'EKONOMI', '50', 'ELECTIVE '),
(19, 'MATH', '60', 'COMPULSORY'),
(20, 'SCIENCE', '60', 'COMPULSORY'),
(23, 'BIOLOGY', '50', 'ELECTIVE ');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `stud_name` varchar(100) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `phone_num` varchar(100) NOT NULL,
  `course_fee` decimal(10,2) NOT NULL,
  `pending_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `stud_name`, `ic`, `email`, `age`, `phone_num`, `course_fee`, `pending_fee`) VALUES
(15, 'Azhar Khir-ruddin bin Ishak', '09876543324', 'example@gmail.com', 13, '0145678342', 150.00, 0.00),
(16, 'Fatiha binti Ngadinin', '1234567898765', 'test2@gmail.com', 13, '0145678987', 150.00, 0.00),
(18, 'Muhammad Radzi Ramdzan', '0712435689', 'radzi@gmail.com', 16, '0136547587', 300.00, 0.00),
(27, 'Noor Khadijah Nawawi', '0712435689', 'test1@gmail.com.my', 15, '0145678987', 250.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(250) UNSIGNED NOT NULL,
  `stud_name` varchar(250) NOT NULL,
  `fees` int(250) NOT NULL,
  `fees_remark` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `stud_name`, `fees`, `fees_remark`, `date`) VALUES
(14, 'John Manikavasagam', 250, 'Monthly Fee', '2024-03-31'),
(15, 'Azhar Khir-ruddin bin Ishak', 150, 'Registration Fee', '2024-03-31'),
(16, 'Fatiha binti Ngadinin', 150, 'Monthly Fee', '2024-03-31'),
(17, 'Khalilul bin Ikmal', 100, 'Registration Fee', '2024-03-31'),
(27, 'Noor Khadijah Nawawi', 250, 'Monthly Fee', '2024-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id` int(10) UNSIGNED NOT NULL,
  `tutor_name` varchar(100) NOT NULL,
  `ic` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(100) NOT NULL,
  `achievement` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id`, `tutor_name`, `ic`, `email`, `phone_num`, `achievement`, `address`) VALUES
(1, 'Wan Husaini Bin Wan Meor', '09876543', 'test1@gmail.com', '0145678', 'Degree In Mathematics', 'KL'),
(4, 'Thanuja Soti a/l Kanagaraj Nahappan', '98852345673', 'try@gmail.com', '0145678987', 'Degree In Literature', 'KL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(250) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
