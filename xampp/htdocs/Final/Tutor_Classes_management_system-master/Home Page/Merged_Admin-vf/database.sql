-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 06:23 PM
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
(3, 14, 0);

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
(3, 1500, 1, 5, 2, '2023-04-12', '2023-04-18', 30, 7, 'M11');

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
(3, 0, 3, 2, 1, '1970-01-01 00:00:00'),
(7, 23000, 4, 1, 1, '2022-07-06 00:00:00'),
(9, 20000, 4, 3, 0, '2023-04-28 00:00:00');

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
(3, 'ENGLISH', 1);

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
(4, 'os midterm', 2, 'No attachements', '2023-04-28 00:00:00');

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
(5, 'esi', 'esi@gmail.com', 'esi', 'esi', '36dbc2a12d8162070240f8d586b6726d', 'alger', 0);

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
(14, '2023-04-22 18:31:00', '2023-04-22 20:35:00', 3),
(20, '2023-04-05 13:25:00', '2023-04-04 16:25:00', 3);

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
  `image` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Supervisor_Id`, `Student_FirstName`, `Student_LastName`, `Student_Mail`, `Student_Password`, `Student_Birthday`, `Student_address`, `Student_Phone_number`, `image`) VALUES
(2, 1, 'Kerimo', 'Benmezay', 'kerimo@gmail.com', '', '2004-12-04', '', 0, NULL),
(3, 2, 'Khaled', 'Mahrez', 'khaled@gmail.com', '', '2006-01-03', '', 0, NULL),
(4, 2, 'BenAhmed', 'Bendado', 'mokhetar@gmail.com', '1973546', '0000-00-00', '', 565646, '');

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
(3, 2, '2023-04-17', 0),
(3, 3, '2023-04-17', 0),
(3, 4, '2023-04-17', 0);

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
(2, 'Mokhetar', 'Bendado', 2, 'mokhetar@gmail.com', '1973546', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_Id` int(11) NOT NULL,
  `Teacher_FirstName` varchar(45) NOT NULL,
  `Teacher_LastName` varchar(45) NOT NULL,
  `School_Id` int(11) NOT NULL,
  `Teacher_Mail` varchar(45) NOT NULL
)

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_Id`, `Teacher_FirstName`, `Teacher_LastName`, `Teacher_Mail`) VALUES
(1, 'Mohamed', 'Labael', 'mohamed@gmail.com'),
(2, 'Ghilas', 'Aitmarboh', 'ghilas@gmail.com'),
(12, '', '', '');

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
  ADD PRIMARY KEY (`Teacher_Id`),
   ADD KEY `FK_115` (`School_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `Fees_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `Module_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `Resource_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `School_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session_`
--
ALTER TABLE `session_`
  MODIFY `Session_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Supervisor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `FK_2` FOREIGN KEY (`Teacher_Id`) REFERENCES `teacher` (`Teacher_Id`),
  ADD CONSTRAINT `FK_3` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`),
  ADD CONSTRAINT `FK_4` FOREIGN KEY (`Module_Id`) REFERENCES `module` (`Module_Id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `FK_11` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`),
  ADD CONSTRAINT `FK_12` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`);

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `FK_1` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `FK_7` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`);

--
-- Constraints for table `session_`
--
ALTER TABLE `session_`
  ADD CONSTRAINT `FK_10` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `FK_6` FOREIGN KEY (`Supervisor_Id`) REFERENCES `supervisor` (`Supervisor_Id`);

--
-- Constraints for table `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `FK_8` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`),
  ADD CONSTRAINT `FK_9` FOREIGN KEY (`Class_Id`) REFERENCES `class` (`Class_Id`);

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `FK_5` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);
COMMIT;

ALTER TABLE 'teacher'
 ADD CONSTRAINT `FK_115` FOREIGN KEY (`School_Id`) REFERENCES `school` (`School_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;