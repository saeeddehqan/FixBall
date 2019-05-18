-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2019 at 04:14 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixball`
--

-- --------------------------------------------------------

--
-- Table structure for table `gamers`
--

CREATE TABLE `gamers` (
  `id` int(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `birth` date NOT NULL,
  `work` varchar(128) NOT NULL,
  `goals` int(32) NOT NULL,
  `assistant` int(32) NOT NULL,
  `errors` int(32) NOT NULL,
  `team` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gamers`
--

INSERT INTO `gamers` (`id`, `name`, `birth`, `work`, `goals`, `assistant`, `errors`, `team`) VALUES
(1, 'سعید دهقان', '1380-07-20', 'Full Back', 11, 13, 5, 'فجر سپاسی'),
(2, 'فرهاد مجیدی', '1356-10-01', 'Sweeper/Libero', 10, 122, 23, 'استقلال'),
(3, 'علی حاجی زاد', '1368-05-02', 'Full Back', 16, 110, 54, 'سپاهان'),
(4, 'اکبر علی زاده', '1373-04-03', 'مدافع مرکزی', 11, 11, 5, 'پرسپولیس'),
(5, 'محمد علی زاده', '1379-08-01', 'مدافع سوییپر', 33, 62, 32, 'نفت آبادان'),
(6, 'اصغر تقی زاده', '1375-02-08', 'مدافع مرکزی', 17, 73, 32, 'زوب آهن'),
(7, 'حسین طارمی', '1360-11-23', 'مدافع پوششی ', 33, 54, 42, 'سپاهان'),
(8, 'علی کریمی', '1363-05-04', 'هافبک مرکزی', 55, 64, 39, 'پرسپولیس'),
(9, 'حسین زارع', '1373-02-01', 'مدافع نفوذی پوششی', 33, 60, 31, 'فجر سپاسی'),
(10, 'صادق دهقان', '1378-09-13', 'هافبک تهاجمی', 13, 80, 49, 'زوب آهن'),
(11, 'مجتبی قلی پور', '1370-03-26', 'دروازه بان', 12, 2, 20, 'فجر سپاسی');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(32) NOT NULL,
  `first_team` varchar(128) NOT NULL,
  `second_team` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `first_team_goal` int(16) NOT NULL,
  `second_team_goal` int(16) NOT NULL,
  `week` int(32) NOT NULL,
  `referee` varchar(128) NOT NULL,
  `errors` int(32) NOT NULL,
  `goals` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `first_team`, `second_team`, `date`, `first_team_goal`, `second_team_goal`, `week`, `referee`, `errors`, `goals`) VALUES
(1, 'استقلال', 'پرسپولیس', '1396-10-05', 2, 3, 3, 'اکبر عبدی', 19, 5),
(2, 'سپاهان', 'زوب آهن', '1397-01-03', 4, 5, 5, 'شاهرخ استخری', 12, 9),
(3, 'استقلال', 'نفت آبادان', '1396-11-13', 2, 1, 1, 'رضا گلزار', 10, 3),
(4, 'سپاهان', 'نفت آبادان', '1397-01-03', 3, 2, 2, 'رامبد جوان', 10, 5),
(5, 'پرسپولیس', 'فجر سپاسی', '1397-08-03', 3, 2, 4, 'محمد صفا', 13, 4),
(6, 'زوب آهن', 'پرسپولیس', '1396-10-13', 2, 3, 5, 'علی نوریان', 18, 5),
(7, 'ماشین سازی', 'فجر سپاسی', '1997-07-01', 2, 2, 10, 'حسین بحرینی', 22, 4);

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE `goals` (
  `id` int(32) NOT NULL,
  `game` varchar(128) NOT NULL,
  `gamer` varchar(128) NOT NULL,
  `minutes` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `game`, `gamer`, `minutes`) VALUES
(1, '3', 'محمد علی زاده', 32),
(2, '1', 'علی حاجی زاد', 77),
(3, '1', 'علی حاجی زاد', 77),
(4, '5', 'سعید دهقان', 78),
(5, '4', 'علی حاجی زاد', 22);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(32) NOT NULL,
  `name` varchar(128) NOT NULL,
  `color_one` varchar(128) NOT NULL,
  `color_two` varchar(128) NOT NULL,
  `rank` int(16) NOT NULL,
  `points` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `color_one`, `color_two`, `rank`, `points`) VALUES
(1, 'استقلال', 'ابی', 'سیاه', 4, 59),
(2, 'زوب آهن', 'قرمز', 'نارنجی', 3, 70),
(3, 'سپاهان', 'صورتی', 'زرد', 2, 66),
(4, 'پرسپولیس', 'قرمز', 'سیاه', 1, 65),
(5, 'نفت آبادان', 'بنفش', 'سفید', 5, 53),
(6, 'فجر سپاسی', 'خاکستری', 'قهوه ای', 7, 50),
(7, 'ماشین سازی', 'سفید', 'سورمه ای', 6, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gamers`
--
ALTER TABLE `gamers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gamers`
--
ALTER TABLE `gamers`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
