-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 05:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwa1`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_name` varchar(300) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `c_hours` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `period` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `prog_id`, `c_hours`, `inst_id`, `period`) VALUES
(1, 'RNA 141', 'Basic French I', 1, 1, 1, 'a'),
(2, 'RNA 151', 'Applied Electricity', 1, 3, 1, 'a'),
(8, 'RNA 155', 'Technical Drawing', 1, 2, 1, 'a'),
(9, 'RNA 157', 'Communication Skill I', 1, 2, 1, 'a'),
(10, 'RNA 159', 'Introduction to Computing', 1, 2, 1, 'a'),
(11, 'RNA 167', 'Basic Mechanics ', 1, 3, 1, 'a'),
(12, 'RNA 169', 'Linear Algebra', 1, 3, 1, 'a'),
(13, 'RNA 171', 'Introduction to Green Chemistry', 1, 3, 1, 'a'),
(14, 'RNA 142', 'Basic French II', 1, 1, 1, 'b'),
(15, 'RNA 152', 'Strength of Materials', 1, 3, 1, 'b'),
(18, 'RNA 156', 'Engineering Drawing', 1, 3, 1, 'b'),
(19, 'RNA 158', 'Communication Skills II', 1, 2, 1, 'b'),
(20, 'RNA 164', 'Basic Electronics', 1, 3, 1, 'b'),
(21, 'RNA 166', 'Calculus', 1, 3, 1, 'b'),
(22, 'RNA 168', 'Basic Material Science', 1, 2, 1, 'b'),
(23, 'RNA 170', 'Introduction to Engineering Design', 1, 2, 1, 'b'),
(24, 'GMA 141', 'Basic French I', 3, 1, 1, 'a'),
(25, 'GMA 151', 'Applied Electricity', 3, 3, 1, 'a'),
(26, 'GMA 155', 'Technical Drawing', 3, 2, 1, 'a'),
(27, 'GMA 153', 'Linear Algebra and Trigonometry', 3, 3, 1, 'a'),
(28, 'GMA 157', 'Communication Skill I', 3, 2, 1, 'a'),
(29, 'GMA 159', 'Introduction to Computing', 3, 2, 1, 'a'),
(30, 'GMA 161', 'Physical and Structural Geology', 3, 2, 1, 'a'),
(31, 'GMA 167', 'Basic Mechanics ', 3, 3, 1, 'a'),
(32, 'GMA 171', 'Introduction to Geomatics', 3, 2, 1, 'a'),
(84, 'CEA 141', 'Basic French I', 6, 1, 1, 'a'),
(85, 'CEA 151', 'Applied Electricity', 6, 3, 1, 'a'),
(86, 'CEA 155', 'Technical Drawing', 6, 2, 1, 'a'),
(87, 'CEA 157', 'Communication Skills I', 6, 2, 1, 'a'),
(88, 'CEA 163', 'Procedural Programming with C++', 6, 2, 1, 'a'),
(89, 'CEA 167', 'Basic Mechanics', 6, 3, 1, 'a'),
(90, 'CEA 169', 'Linear Algebra', 6, 3, 1, 'a'),
(91, 'CEA 171', 'Computer Science and Engineering', 6, 3, 1, 'a'),
(92, 'CEA 142', 'Basic French II', 6, 1, 1, 'b'),
(93, 'CEA 156', 'Engineering Drawing', 6, 3, 1, 'b'),
(94, 'CEA 158', 'communication Skills II', 6, 2, 1, 'b'),
(95, 'CEA 162', 'Circuit Theory', 6, 3, 1, 'b'),
(96, 'CEA 164', 'Basic Electronics', 6, 3, 1, 'b'),
(97, 'CEA 166', 'Calculus', 6, 3, 1, 'b'),
(98, 'CEA 172', 'Digital Electronics', 6, 2, 1, 'b'),
(163, 'ELA 141', 'Basic French I', 2, 1, 1, 'a'),
(164, 'ELA 151', 'Applied Electricity', 2, 3, 1, 'a'),
(165, 'ELA 155', 'Technical Drawing', 2, 2, 1, 'a'),
(166, 'ELA 157', 'Communication Skills I', 2, 2, 1, 'a'),
(167, 'ELA 159', 'Introduction to Computing', 2, 2, 1, 'a'),
(168, 'ELA 167', 'Basic Mechanics ', 2, 3, 1, 'a'),
(169, 'ELA 169', 'Linear Algebra', 2, 3, 1, 'a'),
(170, 'ELA 163', 'Procedural Programming with C++', 2, 2, 1, 'a'),
(171, 'ELA 171', 'Electrical Engineering Drawing', 2, 2, 1, 'a'),
(172, 'ELA 142', 'Basic French II', 2, 1, 1, 'b'),
(173, 'ELA 156', 'Engineering Drawing', 2, 3, 1, 'b'),
(174, 'ELA 158', 'communication Skills II', 2, 2, 1, 'b'),
(175, 'ELA 162', 'Circuit Theory', 2, 3, 1, 'b'),
(176, 'ELA 166', 'Calculus', 2, 3, 1, 'b'),
(177, 'ELA 168', 'Basic Material Science', 2, 2, 1, 'b'),
(178, 'ELA 172', 'Instruments and Measurements', 2, 2, 1, 'b'),
(179, 'ELA 174', 'Semiconductor Devices', 2, 3, 1, 'b'),
(228, 'MNA 141', 'Basic French I', 7, 1, 1, 'a'),
(229, 'MNA 151', 'Applied Electricity', 7, 3, 1, 'a'),
(230, 'MNA 153', 'Linear Algebra and Trignometry', 7, 3, 1, 'a'),
(231, 'MNA 155', 'Technical Drawing', 7, 2, 1, 'a'),
(232, 'MNA 157', 'Communication Skills I', 7, 2, 1, 'a'),
(233, 'MNA 159', 'Introduction to Computing', 7, 2, 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `inst_id` int(200) NOT NULL,
  `Inst_name` varchar(300) NOT NULL,
  `logo` text DEFAULT NULL,
  `short_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`inst_id`, `Inst_name`, `logo`, `short_name`) VALUES
(1, 'University 1', 'u1.jpg', 'U1'),
(2, 'University 2', 'u2.jpg', 'U2'),
(3, 'University 3', 'u3.jpg', 'U3'),
(4, 'University 4', 'u4.jpg', 'U4');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` int(11) NOT NULL,
  `program_name` varchar(200) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `prog_short_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `program_name`, `inst_id`, `prog_short_name`) VALUES
(1, 'Renewable Energy Engineering', 1, 'Renew. Eng.'),
(2, 'Electrical and Electronics Engineering', 1, 'Elect. Eng.'),
(3, 'Geomatic Engineering', 1, 'Geoma. Eng'),
(4, 'Political Science', 2, 'Pol. Sci'),
(5, 'Economics', 2, 'Econs.'),
(6, 'Computer Science and Engineering', 1, 'Comp. Eng.'),
(7, 'Mining Engineering', 1, 'Min. Eng'),
(8, 'Mechanical Engineering', 1, 'Mec. Eng.'),
(9, 'Mathematics', 1, 'Maths.'),
(10, 'Mineral Engineering', 1, 'Mine. Eng');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `rep` varchar(1) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`id`, `year`, `sem`, `rep`, `description`) VALUES
(1, 1, 1, 'a', 'Year 1 Sem 1'),
(2, 1, 2, 'b', 'Year 1 Sem 2'),
(3, 2, 1, 'c', 'Year 2 Sem 1'),
(4, 2, 2, 'd', 'Year 2 Sem 2'),
(5, 3, 1, 'e', 'Year 3 Sem 1'),
(6, 3, 2, 'f', 'Year 3 Sem 2'),
(7, 4, 1, 'g', 'Year 4 Sem 1'),
(8, 4, 2, 'h', 'Year 4 Sem 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course_code` (`course_code`),
  ADD KEY `inst_id` (`inst_id`),
  ADD KEY `period` (`period`),
  ADD KEY `prog_id` (`prog_id`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`),
  ADD KEY `inst_id` (`inst_id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rep` (`rep`),
  ADD UNIQUE KEY `rep_2` (`rep`),
  ADD KEY `rep_3` (`rep`),
  ADD KEY `rep_4` (`rep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `inst_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`inst_id`) REFERENCES `institutions` (`inst_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`period`) REFERENCES `progress` (`rep`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_3` FOREIGN KEY (`prog_id`) REFERENCES `programs` (`program_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`inst_id`) REFERENCES `institutions` (`inst_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
