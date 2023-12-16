-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 03:31 AM
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
-- Database: `footindoorwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `Awards_ID` int(12) UNSIGNED NOT NULL,
  `Resume_ID` int(10) UNSIGNED NOT NULL,
  `Award` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`Awards_ID`, `Resume_ID`, `Award`) VALUES
(3, 4, 'Outstanding Worker'),
(4, 2, 'Longest Days Gone Without Missing Work'),
(10, 5, 'Honors List'),
(13, 33, 'Best person award'),
(14, 33, 'Awrds'),
(15, 33, 'Awrds'),
(16, 36, 'Awrds');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_board`
--

CREATE TABLE `discussion_board` (
  `Discussion_ID` int(12) UNSIGNED NOT NULL,
  `User_ID` int(12) UNSIGNED NOT NULL,
  `Post_Title` varchar(48) NOT NULL,
  `Topic` varchar(24) NOT NULL,
  `Post_Desc` text NOT NULL,
  `Date_Created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion_board`
--

INSERT INTO `discussion_board` (`Discussion_ID`, `User_ID`, `Post_Title`, `Topic`, `Post_Desc`, `Date_Created`) VALUES
(1, 1, 'New templates', 'Celebrations', 'I am loving the new template. Great design. Can\'t wait to see what more updates are to come.', '2023-12-12'),
(5, 1, 'Happy birthday', 'Celebrations', 'Happy 1 month anniversary to the Foot in the Door Resume company.', '2023-12-13'),
(9, 35, 'Job Fair!', 'Interview Strategies', 'Hello everyone, i will be at the job fair representing Foot In The Door on Feburary 18th! Come out to see me there!', '2023-12-15'),
(18, 4, 'Linkedin Account', 'Career Connections', 'Looking for new jobs hiring! please keep me posted, I love this app!', '2023-12-15'),
(23, 39, 'Looking for connections', 'Career Connections', 'I want to connect!', '2023-12-16'),
(25, 40, 'I created my first resume!', 'Celebrations', 'So happy about my new resume! I think I did a good job', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `Education_ID` int(12) UNSIGNED NOT NULL,
  `School_Name` varchar(36) NOT NULL,
  `Graduation_Year` int(4) DEFAULT NULL,
  `Resume_ID` int(12) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`Education_ID`, `School_Name`, `Graduation_Year`, `Resume_ID`) VALUES
(2, 'Random High School', 2020, 4),
(3, 'Northern Kentucky University', 2025, 2),
(9, 'Taylor high school', 1976, 15),
(11, 'Dream Ville High', 2015, 17),
(12, 'belmont', 2021, 5),
(15, 'ABC School', 2000, 33),
(16, 'Highschool', 2023, 33),
(17, 'Highschool', 2023, 33),
(18, 'Highschool', 2023, 36);

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `Interest_ID` int(12) UNSIGNED NOT NULL,
  `Resume_ID` int(12) UNSIGNED NOT NULL,
  `Interest` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`Interest_ID`, `Resume_ID`, `Interest`) VALUES
(2, 4, 'Sports'),
(4, 2, 'Computers'),
(9, 15, 'Hiking'),
(11, 17, 'Soil '),
(12, 5, 'Coding'),
(14, 33, 'Gaming'),
(15, 33, 'Gaming'),
(16, 33, 'Gaming'),
(17, 36, 'Gaming');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `Lang_ID` int(12) UNSIGNED NOT NULL,
  `Resume_ID` int(12) UNSIGNED NOT NULL,
  `Language` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`Lang_ID`, `Resume_ID`, `Language`) VALUES
(2, 2, 'Spanish'),
(3, 4, 'French'),
(4, 4, 'German'),
(10, 17, 'English'),
(11, 22, 'Enlish'),
(12, 5, 'german'),
(15, 33, 'English'),
(16, 33, 'Eng'),
(17, 33, 'Eng'),
(18, 36, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `resume`
--

CREATE TABLE `resume` (
  `Resume_ID` int(12) UNSIGNED NOT NULL,
  `Name` varchar(48) DEFAULT NULL,
  `User_ID` int(12) UNSIGNED NOT NULL,
  `Phone_Number` varchar(11) DEFAULT NULL,
  `Email` varchar(126) DEFAULT NULL,
  `Linkedin` varchar(72) DEFAULT NULL,
  `Github` varchar(72) DEFAULT NULL,
  `Personal_Website` varchar(72) DEFAULT NULL,
  `Summary` text DEFAULT NULL,
  `Date_Created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resume`
--

INSERT INTO `resume` (`Resume_ID`, `Name`, `User_ID`, `Phone_Number`, `Email`, `Linkedin`, `Github`, `Personal_Website`, `Summary`, `Date_Created`) VALUES
(2, 'Andrew Keller', 4, '111-222-333', 'newemail@gmail.com', 'linkedin.com/andrewkeller.com', 'andrew/github.com', '', 'adding a summery', '2023-12-15'),
(4, 'Leo Foy', 3, NULL, NULL, NULL, 'github.com/leofoy.com', NULL, NULL, NULL),
(5, 'Julianna Truitt', 1, '', 'fsew@gmail.com', 'juliannatruitt.linkedin.com', '', '', '', '2023-12-13'),
(15, 'Tom Truitt', 36, '222-334-221', 'tomt@gmail.com', '', '', '', '', '2023-12-14'),
(17, 'Maria Spad', 35, '789-485-849', 'contactmaria@gmail.com', 'maria/linkedin.com', '', '', 'silversmith working from my garage', '2023-12-14'),
(18, 'Maria Spade', 35, '859-589-285', 'newemailaddress@gmail.com', 'maria/linkedin.com', '', '', 'Love to farm and work in Garden.', '2023-12-14'),
(22, 'Blaire Waldorf', 24, '789-888-174', 'blaire@gmail.com', '', NULL, 'blaire.com', 'loves fashion and to shop', '2023-12-14'),
(33, 'User', 39, '123-123-123', 'User123@gmail.com', 'User/linkedin', 'User/Github', 'User.com', 'I am a user of this site', '2023-12-16'),
(34, 'User', 39, '123-123-123', 'User123@gmail.com', 'User/linkedin', 'User/Github', 'User.com', 'I am a user of this site', '2023-12-16'),
(35, 'User', 39, '777-777-777', 'asdf@gmail.com', 'User/linkedin', 'User/Github', 'User.com', 'I am a user of this site', '2023-12-16'),
(36, 'User2', 40, '123-123-123', 'User2@gmail.com', 'User/linkedin', 'User/Github', 'User.com', 'I am a user of this site', '2023-12-16'),
(37, 'User3', 41, '567-567-567', 'asdf@gmail.com', 'User/linkedin', 'User/Github', 'User.com', '', '2023-12-16');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `Skill_ID` int(12) UNSIGNED NOT NULL,
  `Resume_ID` int(12) UNSIGNED NOT NULL,
  `Skill` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`Skill_ID`, `Resume_ID`, `Skill`) VALUES
(3, 4, 'Leading'),
(4, 2, 'Knowledgeable'),
(9, 15, 'hardworker'),
(11, 17, 'hardworker'),
(12, 5, 'Programming'),
(13, 18, 'Gamer'),
(15, 33, 'Python'),
(16, 33, 'Skill'),
(17, 33, 'Skill'),
(18, 36, 'Skill');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(12) UNSIGNED NOT NULL,
  `Username` varchar(30) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Role` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `Phone_Number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Username`, `Email`, `Password`, `Role`, `Phone_Number`) VALUES
(1, 'juliannatruitt', 'truittj3@email.com', '$2y$10$/qZYvGf6aIHits2Xn103/eHkjoFtF2aKyIoFF7sO9f9QEJyMYn1b.', 0, '123-456-7896'),
(3, 'leof', 'leo@nku.edu', '$2y$10$pPp35XVyUyQTx8DfFF1sY.o8h7BOgP4.R/5QKgqc6WwyWJd.3zm5u', 0, '741-845-7845'),
(4, 'andrew', 'andre@nku.ed', '$2y$10$Vcu5va2iwSTSfpJi2cBVeez690dUR3RnMKwZZ24UxudrZGe/ZbS76', 0, '598-486-4521'),
(17, 'hellouser', 'herllouser@gmail.com', '$2y$10$n8kxKX8wVGokwVNaTIIBueq30TwjwcwJ2', 0, '123-222-4444'),
(18, 'juls', 'juls@gmail.com', '$2y$10$XP.1U8Bd8/wPVGmpKrX7ae1RCy4lhmqng', 0, '111-222-3333'),
(19, 'pattytruitt', 'patty@gmail.com', '$2y$10$CzBGcEjXQFLutTIz0mpZ0OPD39Sknao2etcrznz85ywmqSknqm6IK', 0, '111-222-2222'),
(20, 'tommy', 'tom@gmail.com', '$2y$10$e1s2IDn1HvMq9y7u.gVfpOGQIzhcZ5I0Jal8DDExsRf.8qtxyEGfC', 0, '444-444-4444'),
(23, 'tay', 'tay@gmail.com', '$2y$10$32KQtaSAUpaWhbtSjR1mEO.LCjX5ZmR.pk0BZgRD7YhNB64xpbgKa', 0, '111-111-1111'),
(24, 'git', 'git@gmail.com', '$2y$10$57lkx2.OkdIH0yP/dKI90e7U4dU8l5hs5UzvKsR0ubFzJtR15lphC', 0, '111-222-3332'),
(25, 'newusertest', 'hahahahahah@gmail.com', '$2y$10$w8xNG6jD/5hxhPqllN3.leK6ql1VVbmrrY4azLArjSngd5F6NMuWG', 0, '123-222-2234'),
(27, 'tom', 'fsew@gmail.com', '$2y$10$PnlF64R8s3D1lI5lxsUTvuKOPvtfEioozNnO9hPVBXnDHcRq9Z7Yi', 0, '859-895-9568'),
(32, 'ertrgrgrgre', 'ff2@gmail.com', '$2y$10$nQfip665psl7a2iG1Jt65OYusoIGn0RrJHq15zzJe2C030PtfAZva', 0, '111-111-1111'),
(34, 'admin', 'admin@php.com', '$2y$10$iumwC0NbQwxZY5ahC6T.7.utQh8SWA.zKsPRCyHQ79Onv3QMU6o6q', 1, '123-456-7895'),
(35, 'maria', 'maria@truitt.nku', '$2y$10$gM5I/8YIXm.7tM.uvPIJVOd8l1FJluldJErWQk782VyqP27oPfdmu', 0, '123-456-7890'),
(36, 'anewuser', 'newnew@gmail.com', '$2y$10$sCK64u5rB4XYsavmyVxxROFNEy5DPOrok3oB83eyPSAWzRbEGm6M2', 0, '111-222-3333'),
(39, 'user', 'User123@gmail.com', '$2y$10$oqO7o.aPdSpY36VIeOMDSuTKU/P.QYZUtKtGo85c8rfpZ0qB8hYP.', 0, '777-777-7777'),
(40, 'User2', 'User2@gmail.com', '$2y$10$TjhVFteA2F3Jg61AP.gif.jV/mqDXzpet8obKt9qYUC97Pwj4nY7S', 0, '123-123-1234'),
(41, 'User3', 'qwerty@gmail.com', '$2y$10$GpBEWzUWcafHQvDwS7jxG.YzpC7xwWvLa2BA7yisMpf3bonwFLt0u', 0, '123-123-1234');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `Job_ID` int(12) UNSIGNED NOT NULL,
  `Resume_ID` int(12) UNSIGNED NOT NULL,
  `Job_Name` varchar(56) NOT NULL,
  `Company_Name` varchar(56) DEFAULT NULL,
  `Start_Date` date DEFAULT NULL,
  `Achievement` varchar(126) DEFAULT NULL,
  `Technology_Used` varchar(86) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`Job_ID`, `Resume_ID`, `Job_Name`, `Company_Name`, `Start_Date`, `Achievement`, `Technology_Used`) VALUES
(2, 4, 'Manager', 'Technology Inc.', '2023-08-01', '-Top manager', '-Java'),
(3, 2, 'Boss', 'Random Company', '2023-11-21', 'Oversees the Random Company employees.', 'Microsoft'),
(9, 15, 'Pyramid Controls', '', '0000-00-00', 'company person of the year', 'PLC\'s'),
(11, 17, 'EDA', '', '2022-08-13', '', ''),
(12, 18, 'Dog Shelter', '', '2020-04-12', '', ''),
(13, 5, 'Engineer', '', '0000-00-00', 'Best Dressed', ''),
(16, 33, 'Employee', 'ABC Inc.', '0000-00-00', 'Employee of the month', 'Computer'),
(17, 33, 'Employee', 'ABC Inc.', '0000-00-00', 'Acheivement', 'Tech'),
(18, 33, 'Employee', 'ABC Inc.', '0000-00-00', 'Acheivement', 'Tech'),
(19, 36, 'Employee', 'ABC Inc.', '0000-00-00', 'Leo Foy', 'Tech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`Awards_ID`),
  ADD KEY `ForKey` (`Resume_ID`);

--
-- Indexes for table `discussion_board`
--
ALTER TABLE `discussion_board`
  ADD PRIMARY KEY (`Discussion_ID`),
  ADD KEY `foreignK` (`User_ID`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`Education_ID`),
  ADD KEY `ForeignKeyCon` (`Resume_ID`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`Interest_ID`),
  ADD KEY `ForeignnKey` (`Resume_ID`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`Lang_ID`),
  ADD KEY `ForeignKeyy` (`Resume_ID`);

--
-- Indexes for table `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`Resume_ID`),
  ADD KEY `ForeignKey` (`User_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`Skill_ID`),
  ADD KEY `FK` (`Resume_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Username` (`Username`,`Email`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`Job_ID`),
  ADD KEY `FOREIGN` (`Resume_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `Awards_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `discussion_board`
--
ALTER TABLE `discussion_board`
  MODIFY `Discussion_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `Education_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `Interest_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `Lang_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `resume`
--
ALTER TABLE `resume`
  MODIFY `Resume_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `Skill_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `Job_ID` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `ForKey` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discussion_board`
--
ALTER TABLE `discussion_board`
  ADD CONSTRAINT `foreignK` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `ForeignKeyCon` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `interests`
--
ALTER TABLE `interests`
  ADD CONSTRAINT `ForeignnKey` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `ForeignKeyy` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resume`
--
ALTER TABLE `resume`
  ADD CONSTRAINT `ForeignKey` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `FK` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`Resume_ID`) REFERENCES `resume` (`Resume_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
