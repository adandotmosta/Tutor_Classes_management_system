-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 01:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tutoring_classes`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `Student_Id` int(11) NOT NULL,
  `Session_Id` int(11) NOT NULL,
  `absent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`Student_Id`, `Session_Id`, `absent`) VALUES
(19, 23, 0),
(36, 24, 0),
(44, 24, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_Id` int(11) NOT NULL,
  `Class_Price` float NOT NULL,
  `Module_Id` int(11) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Teacher_Id` int(11) NOT NULL,
  `Starting_Date` date NOT NULL,
  `Finishing_Date` date NOT NULL,
  `Class_Capacity` float NOT NULL,
  `Number_Of_Sections` float NOT NULL,
  `class_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_Id`, `Class_Price`, `Module_Id`, `School_Id`, `Teacher_Id`, `Starting_Date`, `Finishing_Date`, `Class_Capacity`, `Number_Of_Sections`, `class_name`) VALUES
(1, 1000, 1, 1, 1, '2023-03-29', '2023-04-29', 30, 4, 'MATH12'),
(2, 2000, 2, 2, 2, '2023-02-14', '2023-07-12', 30, 18, 'PHSYCOLOGY15'),
(4, 750, 12, 5, 17, '2023-05-01', '2023-05-31', 30, 1, 'psychology'),
(5, 750, 13, 5, 17, '2023-05-01', '2023-05-31', 30, 1, 'DB');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `Fees_Id` int(11) NOT NULL,
  `Fees_Amount` float NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Fees_Status` int(11) NOT NULL,
  `Fees_Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`Fees_Id`, `Fees_Amount`, `Student_Id`, `Class_Id`, `Fees_Status`, `Fees_Date`) VALUES
(3, 1500, 3, 2, 1, '1970-01-01 00:00:00'),
(7, 23000, 4, 1, 1, '2022-07-06 00:00:00'),
(10, 1500, 2, 1, 1, '2023-04-28 00:00:00'),
(11, 3500, 3, 2, 1, '2023-04-29 00:00:00'),
(15, 750, 19, 4, 1, '1970-01-01 00:00:00'),
(18, 1540, 2, 4, 1, '2023-05-30 00:00:00'),
(19, 5750, 36, 4, 0, '2023-05-30 00:00:00'),
(20, 750, 36, 5, 0, '2023-05-01 00:00:00'),
(21, 750, 44, 5, 0, '2023-05-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `Module_Id` int(11) NOT NULL,
  `Module_Name` varchar(45) NOT NULL,
  `School_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`Module_Id`, `Module_Name`, `School_Id`) VALUES
(1, 'MATH', 1),
(2, 'PHYSIQUE', 2),
(5, ' Chemistry 1', 2),
(12, ' math', 5),
(13, ' Computer Science', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `token` varchar(64) NOT NULL,
  `expiration_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `Resource_Id` int(11) NOT NULL,
  `Resource_Text` text NOT NULL,
  `Class_Id` int(11) NOT NULL,
  `Resource_Link` text DEFAULT NULL,
  `Resource_DueTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`Resource_Id`, `Resource_Text`, `Class_Id`, `Resource_Link`, `Resource_DueTime`) VALUES
(1, 'the Quiz 1 spreadsheet were I seize this opportunity to send you the quiz1 questions with answers SaHHa Syaamkoum', 1, 'https://drive.google.com/file/d/1flUS_t2lQKbfzBFSqsxEdoQcWgajFPpk/view', '2023-02-04 00:00:00'),
(2, 'Quiz 6 is out!  I am releasing it early this time. It is due tomorrow midnight.Sa7a ftourkoum. Sincerely ', 1, ' ', NULL),
(14, 'def', 4, '#', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `School_Id` int(11) NOT NULL,
  `School_Name` varchar(45) NOT NULL,
  `School_Mail` varchar(45) NOT NULL,
  `Owner_FirstName` varchar(45) NOT NULL,
  `Owner_LastName` varchar(45) NOT NULL,
  `Password_Manager` varchar(45) NOT NULL,
  `School_Address` varchar(45) NOT NULL,
  `Session_System` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`School_Id`, `School_Name`, `School_Mail`, `Owner_FirstName`, `Owner_LastName`, `Password_Manager`, `School_Address`, `Session_System`) VALUES
(1, 'Omar El Mokhetar', 'omar.mokhetar@gmail.com', 'Zahra', 'Moredj', '6448921', 'Alger', 1),
(2, 'Mays School', 'mays.school@gmail.com', 'Brahim', 'Gharbi', '1845646', 'Batna', 0),
(3, 'ENSIA', 'ENSIA@gmail.com', 'Ahmed', 'Kadi', '9193ce3b31332b03f7d8af056c692b84', 'Algiers,Sidi Abdellah', 0),
(4, 'ahmed', 'kjdfkjf@gmail.com', 'zdzd', 'fghgf', '49f0bad299687c62334182178bfd75d8', 'dzdzd', 0),
(5, 'esi', 'esi@gmail.com', 'esi', 'esi', '36dbc2a12d8162070240f8d586b6726d', 'alger', 0),
(6, 'ab', 'ab@gmail.com', 'Ahmed', 'zoubir', '7815696ecbf1c96e6894b779456d330e', 'Oran', 0),
(7, 'entp', 'entp@gmail.com', 'karim', 'benbernou', 'f39e76993f258893b4fda647539cbeb8', 'Algeirs', 1),
(8, 'AI', 'ai@gmail.com', 'nadir', 'HAMOU', '698d51a19d8a121ce581499d7b701668', 'america', 1),
(9, 'ai', 'hamounadir29@gmail.com', 'Nadir', 'HAMOU', '202cb962ac59075b964b07152d234b70', 'sidi abdellah', 0),
(10, 'a', 'mohamed.hamou@ensia.edu.dz', 'a', 'b', '6512bd43d9caa6e02c990b0a82652dca', 'n', 0),
(11, 'tutor', 'dztutor9@gmail.com', 'n', 'h', '25f9e794323b453885f5181f1b624d0b', 'algiers', 0),
(12, 'ahmed', 'belarbiabdenour1@gmail.com', 'ali', 'sad', '93046758d21048ae10e9fa249537aa79', 'algiers', 0),
(13, 'essa', 'essa@gmail.com', 'ahled', 'zaki', '25d55ad283aa400af464c76d713c07ad', 'algiers', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session_`
--

CREATE TABLE `session_` (
  `Session_Id` int(11) NOT NULL,
  `Session_Start` datetime NOT NULL,
  `Session_End` datetime DEFAULT NULL,
  `Class_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_`
--

INSERT INTO `session_` (`Session_Id`, `Session_Start`, `Session_End`, `Class_Id`) VALUES
(1, '2023-12-12 13:30:00', '2023-12-12 15:00:00', 1),
(6, '2023-04-08 21:20:21', '2023-04-08 02:20:21', 1),
(8, '2023-05-28 22:00:00', '2023-05-28 12:00:00', 1),
(23, '2023-05-12 19:14:00', '2023-05-12 21:14:00', 4),
(24, '2023-05-09 12:50:00', '2023-05-09 14:50:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_Id` int(11) NOT NULL,
  `Supervisor_Id` int(11) NOT NULL,
  `Student_FirstName` varchar(45) NOT NULL,
  `Student_LastName` varchar(45) NOT NULL,
  `Student_Mail` varchar(45) NOT NULL,
  `Student_Password` varchar(45) NOT NULL,
  `Student_Birthday` date NOT NULL,
  `Student_address` varchar(45) NOT NULL,
  `Student_Phone_number` int(11) NOT NULL,
  `image` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Supervisor_Id`, `Student_FirstName`, `Student_LastName`, `Student_Mail`, `Student_Password`, `Student_Birthday`, `Student_address`, `Student_Phone_number`, `image`) VALUES
(2, 1, 'Kerimo', 'Benmezay', 'kerimo@gmail.com', '', '2004-12-04', '', 0, NULL),
(3, 2, 'Khaled', 'Mahrez', 'khaled@gmail.com', '', '2006-01-03', '', 0, NULL),
(4, 3, 'BenAhmed', 'Bendado', 'mokhetar@gmail.com', '1973546', '0000-00-00', '', 565646, ''),
(12, 11, 'dsds', 'dsds', 'dsdsd', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '', 5, ''),
(13, 12, 'sdsd', 'dsdsd', 'dsds', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '', 5, ''),
(14, 2, 'fsds', 'dsd', 'dsd', '5c7d0c90cf9e0ce560956179e8e82e7d', '0000-00-00', 'dsds', 45, ''),
(15, 13, 'cxcs', 'dsds', 'dsdds', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', '', 5545, ''),
(16, 3, 'dsdd', 'ddsd', 'dsd', '5c7d0c90cf9e0ce560956179e8e82e7d', '0000-00-00', 'dsdd', 458, ''),
(19, 14, 'kfdf', 'fdfdf', 'fdf@gmail.com', '9193ce3b31332b03f7d8af056c692b84', '2023-04-12', 'algiers', 45879454, ''),
(36, 17, 'ahmed', 'allaz', 'alla@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '0000-00-00', 'dsfg', 75056580, 'PicClng2.jpg'),
(37, 18, 'erthyju', 'rthyu', '', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', ' ', 0, ''),
(38, 19, 'zertyukiop', 'azqerstdyuhi', 'sazertyui@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2023-06-02', 'akkgrr', 2525525, ''),
(39, 17, 'ahmed', 'djala', 'ahmed@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '0000-00-00', 'Hello\r\n', 550569500, '09e9584a61c88550b4e553ab0b2a08d3.png'),
(41, 22, 'Adel', 'Moahmed', 'adel@gmail.com', '43d2018567e1519ca7f459266ad33cfa', '5200-02-08', 'dfrr', 4252525, 'fr'),
(42, 23, 'Djelloul', 'adlan', 'djellou@gmail.com', 'c7484508879d512e0741cc54d47713b1', '2015-06-02', 'Algiers', 550569500, 'fr'),
(44, 24, 'ahmed', 'adda', 'nowar48@hotmail.com', 'c7484508879d512e0741cc54d47713b1', '2023-05-02', 'algiers', 550569500, 'fr');

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `Class_Id` int(11) NOT NULL,
  `Student_Id` int(11) NOT NULL,
  `Student_Starting_Date` date NOT NULL,
  `Student_Absence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`Class_Id`, `Student_Id`, `Student_Starting_Date`, `Student_Absence`) VALUES
(1, 4, '2023-04-17', 0),
(4, 19, '2023-05-27', 0),
(4, 36, '2023-05-27', 0),
(5, 36, '2023-05-30', 0),
(5, 44, '2023-05-30', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `Supervisor_Id` int(11) NOT NULL,
  `Supervisor_FirstName` varchar(45) NOT NULL,
  `Supervisor_LastName` varchar(45) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Supervisor_Mail` varchar(45) NOT NULL,
  `Password_User` varchar(45) NOT NULL,
  `Mobile_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`Supervisor_Id`, `Supervisor_FirstName`, `Supervisor_LastName`, `School_Id`, `Supervisor_Mail`, `Password_User`, `Mobile_number`) VALUES
(1, 'Larbi', 'Benmezay', 1, 'amin@gmail.com', '1973546', 0),
(2, 'Mokhetar', 'Bendado', 2, 'mokhetar@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Ahmed', 'Ghilas', 1, 'ghilas@gmail.com', '202cb962ac59075b964b07152d234b70', 673605340),
(4, 'Yazid', 'Belarbi', 1, 'yazid@gmail.com', 'ad097d2585bc7c62fd1ed53083637aaa', 550569500),
(10, 'Nadir', 'Hamou', 5, 'hamou@gmail.com', 'da3500bd62d52e785660916f0025c5b7', 45658798),
(11, 'dsds', 'dsds', 5, 'dsdsd', 'd41d8cd98f00b204e9800998ecf8427e', 458),
(12, 'sdsd', 'dsdsd', 5, 'dsds', 'd41d8cd98f00b204e9800998ecf8427e', 567580),
(13, 'cxcs', 'dsds', 5, 'dsdds', 'd41d8cd98f00b204e9800998ecf8427e', 5545),
(14, 'kfdf', 'fdfdf', 5, 'fdf@gmail.com', '9193ce3b31332b03f7d8af056c692b84', 45879454),
(17, 'ahmed', 'allaz', 5, 'alla@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 550569500),
(18, 'abdenour', 'belarbi', 9, 'a@gmail.com', '25f9e794323b453885f5181f1b624d0b', 231597886),
(19, 'abdnour', 'szdegtjuk', 12, 'belarbiabdenour1@gmail.com', '25d55ad283aa400af464c76d713c07ad', 525352),
(21, 'defrgthj', 'sqdfghj', 5, 'QSDFGH', '38f99abbc1d339c277c0669e7bc373c0', 285858),
(22, 'Adel', 'Moahmed', 5, 'adel@gmail.com', '43d2018567e1519ca7f459266ad33cfa', 4252525),
(23, 'Djelloul', 'adlan', 5, 'djellou@gmail.com', 'c7484508879d512e0741cc54d47713b1', 550569500),
(24, 'ahmed', 'adda', 5, 'nowar48@hotmail.com', 'c7484508879d512e0741cc54d47713b1', 550569500);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_Id` int(11) NOT NULL,
  `Teacher_FirstName` varchar(45) NOT NULL,
  `Teacher_LastName` varchar(45) NOT NULL,
  `Teacher_Mail` varchar(45) NOT NULL,
  `School_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_Id`, `Teacher_FirstName`, `Teacher_LastName`, `Teacher_Mail`, `School_ID`) VALUES
(1, 'Mohamed', 'Labael', 'mohamed@gmail.com', 0),
(2, 'Ghilas', 'Aitmarboh', 'ghilas@gmail.com', 0),
(14, ' Ahmed ', ' Zaki', ' Ahmed@gmai.com ', 5),
(17, ' Samad', ' Adlan', ' samad@gmail.com', 5),
(19, 'ahmed', 'adel', 'ahmed@gmail.com', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`Student_Id`,`Session_Id`),
  ADD KEY `FK_14` (`Session_Id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_Id`),
  ADD KEY `FK_2` (`Teacher_Id`),
  ADD KEY `FK_3` (`School_Id`),
  ADD KEY `FK_4` (`Module_Id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`Fees_Id`),
  ADD KEY `FK_11` (`Class_Id`),
  ADD KEY `FK_12` (`Student_Id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`Module_Id`),
  ADD KEY `FK_1` (`School_Id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`Resource_Id`),
  ADD KEY `FK_7` (`Class_Id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`School_Id`);

--
-- Indexes for table `session_`
--
ALTER TABLE `session_`
  ADD PRIMARY KEY (`Session_Id`),
  ADD KEY `FK_10` (`Class_Id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `FK_6` (`Supervisor_Id`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`Class_Id`,`Student_Id`),
  ADD KEY `FK_8` (`Student_Id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`Supervisor_Id`),
  ADD KEY `FK_5` (`School_Id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `Fees_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `Module_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `Resource_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `School_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `session_`
--
ALTER TABLE `session_`
  MODIFY `Session_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Supervisor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `FK_13` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_14` FOREIGN KEY (`Session_Id`) REFERENCES `session_` (`Session_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`Module_Id`) REFERENCES `module` (`Module_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session_`
--
ALTER TABLE `session_`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`Supervisor_Id`) REFERENCES `supervisor` (`Supervisor_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
