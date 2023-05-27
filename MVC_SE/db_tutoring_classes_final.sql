-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2023 at 08:59 PM
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
(54, 104, 0),
(54, 105, 0),
(59, 104, 0),
(59, 105, 0);

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
(17, 1000, 18, 10, 22, '2023-05-22', '2023-06-22', 30, 6, 'Math1Y'),
(18, 500, 18, 10, 22, '2023-05-22', '2023-06-20', 30, 4, 'Math2_cem'),
(19, 1000, 24, 5, 14, '2023-06-01', '2023-06-30', 30, 0, 'Linux'),
(20, 2000, 13, 5, 17, '2023-05-02', '2023-05-28', 30, 2, 'C++');

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
(48, 4000, 54, 20, 0, '2023-05-02 00:00:00'),
(49, 4000, 59, 20, 0, '2023-05-02 00:00:00');

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
(13, 'Computer Science', 5),
(18, ' Math', 10),
(19, ' Physics', 10),
(20, ' Arabic', 10),
(21, ' English', 10),
(22, ' Arabic', 5),
(23, ' MATHEMATICS', 5),
(24, ' Cybersecurity', 5);

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
(8, 'AI Midterm', 1, 'http://localhost/Faycal/Pre%20School%20Template/html-template/add-events.php', '2023-05-09 00:00:00');

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
(8, 'asa', 'sdsd@gmail.com', 's', 'sss', '0cc175b9c0f1b6a831c399e269772661', 'sss', 1),
(9, 'El Bara3im', 'bara3im@gmail', 'Ahmed', 'abdenour', '49f0bad299687c62334182178bfd75d8', 'Algiers', 1),
(10, 'AlNajah', 'alnajah@gmail.com', 'ahmed', 'ali', '22bf0792beb324b6aa0ef819d9d14436', 'Zeralda, Alger', 1);

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
(38, '2023-05-15 23:04:00', '2023-05-15 13:04:00', 17),
(39, '2023-05-15 23:09:00', '2023-05-15 13:09:00', 18),
(40, '2023-05-24 23:10:00', '2023-05-24 13:10:00', 18),
(41, '2023-05-16 23:15:00', '2023-05-19 13:15:00', 18),
(42, '2023-05-12 23:20:00', '2023-05-12 14:20:00', 18),
(104, '2023-05-11 19:53:00', '2023-05-11 21:53:00', 20),
(105, '2023-05-11 21:54:00', '2023-05-11 22:54:00', 20);

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
(54, 18, 'Ahmed', 'Nor', 'sadzqfegthf', 'a0e552979ac9a83e6cb9dcc73088a8d8', '2023-05-09', ' ', 5425525, ''),
(56, 28, 'adaln', 'HAMADOU', 'adlan@gmail.com', 'c7484508879d512e0741cc54d47713b1', '2023-05-15', 'sefrgthyj', 550569500, ''),
(59, 33, 'KHALI', 'sazde', 'zdefrgt', '49f0bad299687c62334182178bfd75d8', '2023-05-10', ' ', 0, '');

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
(20, 54, '2023-05-26', 0),
(20, 59, '2023-05-26', 0);

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
(2, 'Mokhetar', 'Bendado', 2, 'mokhetar@gmail.com', '1973546', 0),
(3, 'Ahmed', 'Ghilas', 1, 'ghilas@gmail.com', '82bc85828f90cef3dae5903b388fc6ae', 673605340),
(4, 'Yazid', 'Belarbi', 1, 'yazid@gmail.com', 'ad097d2585bc7c62fd1ed53083637aaa', 550569500),
(10, 'Nadir', 'Hamou', 5, 'hamou@gmail.com', 'da3500bd62d52e785660916f0025c5b7', 45658798),
(11, 'dsds', 'Kader', 5, 'dsdsd', 'd41d8cd98f00b204e9800998ecf8427e', 550569500),
(12, 'sdsd', 'Halou', 5, 'dsds', 'd41d8cd98f00b204e9800998ecf8427e', 45454),
(13, 'cxcs', 'jhjhhhg', 5, 'dsdds', 'd41d8cd98f00b204e9800998ecf8427e', 5545),
(17, 'ahmed', 'gedioura', 5, 'alla@gmail.com', '71ba0b9064690af299c7a7737eb6818c', 550569500),
(18, 'Aymen', 'imad', 5, 'Aymen@gmail.com', '31f11e387577c8d06c9d1b1ade4c4c32', 550569500),
(19, 'ahmed', 'mohamed', 1, 'mohamed@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 550569500),
(23, 'abdenour', 'belarbi', 10, 'belarbi@gmail.com', '65dfcc3315294a593618e74c0ba2c551', 550569500),
(24, 'adlan', 'ahmed', 10, 'adlan@gmail.com', '0aeb574d75a62588ca3f86b7e5cd481c', 673605340),
(26, 'Youcef', 'Zaki', 5, 'Zaki@gmail.com', 'e1ad19b5bbeb19084ae676438fb573c6', 673605340),
(27, 'maachou', 'imad', 5, 'Aymen@gmail.com', '6613b9a9e6560e92a8e7f588af75ff99', 554),
(28, 'abdenour', 'Dahni', 5, 'abdenour@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 54554),
(29, 'abdou', '', 5, 'abdenour@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(30, 'Zaki', 'Milano', 5, '', 'd41d8cd98f00b204e9800998ecf8427e', 0),
(32, 'sdzefzrgtrhyuj', 'dzefghfn', 5, 'Aymen@gmail.com', 'c18614cd23d7f69057bfb1288b2e3d78', 0),
(33, 'KHALI', 'sazde', 5, 'zdefrgt', '49f0bad299687c62334182178bfd75d8', 0);

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
(14, ' Ahmed  ', 'ZAKARIA', ' Ahmed@gmai.com  ', 5),
(17, ' Samad', ' Adlan', ' samad@gmail.com', 5),
(20, ' faid ', 'keddouri', 'faidkeddouri7@gmail.com', 5),
(22, ' ali', 'zaki ', ' ali@gmail.com', 10);

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
  ADD KEY `FK_12` (`Student_Id`),
  ADD KEY `FK_11` (`Class_Id`);

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
  ADD PRIMARY KEY (`Teacher_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `Fees_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `Module_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `Resource_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `School_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `session_`
--
ALTER TABLE `session_`
  MODIFY `Session_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `Supervisor_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
