-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 08:22 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hell`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysts`
--

CREATE TABLE `analysts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approvers`
--

CREATE TABLE `approvers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvers`
--

INSERT INTO `approvers` (`id`, `user_id`, `software_id`, `created_at`) VALUES
(1, 1, 1, '2018-02-27 19:53:47'),
(2, 2, 1, '2018-02-27 19:53:47'),
(3, 3, 2, '2018-02-27 19:53:47'),
(4, 4, 3, '2018-02-27 19:53:47'),
(5, 5, 4, '2018-02-27 19:53:47'),
(6, 6, 5, '2018-02-27 19:53:47'),
(7, 7, 6, '2018-02-27 19:53:47'),
(8, 8, 7, '2018-02-27 19:53:47'),
(9, 9, 8, '2018-02-27 19:53:47'),
(10, 10, 9, '2018-02-27 19:53:47'),
(11, 11, 10, '2018-02-27 19:53:47'),
(12, 12, 11, '2018-02-27 19:53:47'),
(13, 13, 12, '2018-02-27 19:53:47'),
(14, 14, 13, '2018-02-27 19:53:47'),
(15, 15, 14, '2018-02-27 19:53:47'),
(16, 16, 15, '2018-02-27 19:53:47'),
(17, 17, 16, '2018-02-27 19:53:47'),
(18, 18, 17, '2018-02-27 19:53:47'),
(19, 19, 18, '2018-02-27 19:53:47'),
(20, 20, 19, '2018-02-27 19:53:47'),
(21, 21, 20, '2018-02-27 19:53:47'),
(22, 22, 21, '2018-02-27 19:53:47'),
(23, 23, 22, '2018-02-27 19:53:47'),
(24, 24, 23, '2018-02-27 19:53:47'),
(25, 25, 24, '2018-02-27 19:53:47'),
(26, 26, 25, '2018-02-27 19:53:47'),
(27, 27, 26, '2018-02-27 19:53:47'),
(28, 28, 27, '2018-02-27 19:53:47'),
(29, 29, 28, '2018-02-27 19:53:47'),
(30, 76, 29, '2018-02-27 19:53:47'),
(31, 30, 29, '2018-02-27 19:53:47'),
(32, 31, 30, '2018-02-27 19:57:42'),
(33, 31, 31, '2018-02-27 19:57:42'),
(34, 32, 30, '2018-02-27 19:57:42'),
(35, 32, 31, '2018-02-27 19:57:42'),
(36, 33, 32, '2018-02-27 19:57:42'),
(37, 34, 33, '2018-02-27 19:57:42'),
(38, 35, 34, '2018-02-27 19:57:42'),
(39, 36, 35, '2018-02-27 19:57:42'),
(40, 37, 36, '2018-02-27 19:57:42'),
(41, 38, 37, '2018-02-27 19:57:42'),
(42, 39, 38, '2018-02-27 19:57:42'),
(43, 40, 39, '2018-02-27 19:57:42'),
(44, 41, 40, '2018-02-27 19:57:42'),
(45, 42, 41, '2018-02-27 19:57:42'),
(46, 43, 42, '2018-02-27 19:57:42'),
(47, 44, 43, '2018-02-27 19:57:42'),
(48, 45, 44, '2018-02-27 19:57:42'),
(49, 46, 45, '2018-02-27 19:57:42'),
(51, 47, 46, '2018-02-27 20:13:49'),
(52, 48, 47, '2018-02-27 20:13:49'),
(54, 50, 48, '2018-02-27 20:13:49'),
(56, 30, 49, '2018-02-27 20:13:49'),
(59, 76, 49, '2018-02-27 20:13:49'),
(61, 2, 50, '2018-02-27 20:13:49'),
(62, 52, 51, '2018-02-27 20:13:49'),
(63, 53, 52, '2018-02-27 20:13:49'),
(65, 54, 53, '2018-02-27 20:13:49'),
(66, 55, 54, '2018-02-27 20:13:49'),
(67, 56, 55, '2018-02-27 20:13:49'),
(68, 57, 56, '2018-02-27 20:13:49'),
(70, 58, 57, '2018-02-27 20:13:49'),
(71, 60, 59, '2018-02-27 20:13:49'),
(72, 61, 60, '2018-02-27 20:13:49'),
(73, 62, 61, '2018-02-27 20:13:49'),
(75, 63, 63, '2018-02-27 20:13:49'),
(76, 64, 64, '2018-02-27 20:13:49'),
(77, 65, 65, '2018-02-27 20:13:49'),
(78, 66, 66, '2018-02-27 20:13:49'),
(79, 59, 58, '2018-02-27 20:13:49'),
(80, 67, 67, '2018-02-27 20:19:16'),
(81, 68, 68, '2018-02-27 20:19:16'),
(82, 69, 69, '2018-02-27 20:19:16'),
(83, 70, 70, '2018-02-27 20:19:16'),
(86, 72, 72, '2018-02-27 20:19:16'),
(87, 73, 73, '2018-02-27 20:19:16'),
(88, 74, 74, '2018-02-27 20:19:16'),
(89, 32, 75, '2018-02-27 20:19:16'),
(90, 31, 75, '2018-02-27 20:19:16'),
(91, 75, 76, '2018-02-27 20:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `analyst_id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `status` enum('APPROVED','AWAITING_APPROVAL','REQUIRE_EDIT','DENIED','REMOVED') NOT NULL DEFAULT 'AWAITING_APPROVAL',
  `data` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `acronym` varchar(8) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `name`, `description`, `acronym`, `created_at`) VALUES
(1, 'Operating Map of Gastropathy', NULL, 'OMG', '2018-02-27 19:12:15'),
(2, 'Limited Operating Liability ', NULL, 'LOL', '2018-02-27 19:12:15'),
(3, 'Total Mastering of Incisions', NULL, 'TMI', '2018-02-27 19:12:15'),
(4, 'Fixed Orthodontics Medical Operations', NULL, 'FOMO', '2018-02-27 19:12:15'),
(5, 'List of Transactions and Redactions ', NULL, 'LOTR', '2018-02-27 19:17:17'),
(6, 'Northern Ozone & Ocean Biome', NULL, 'NOOB', '2018-02-27 19:17:17'),
(7, 'Alternative Sewage System', NULL, NULL, '2018-02-27 19:17:17'),
(8, 'Relational Observation System Limited', NULL, 'ROFL', '2018-02-27 19:17:17'),
(9, 'Fast Family Finder', NULL, NULL, '2018-02-27 19:17:17'),
(10, 'Sustainable Xeriscaping', NULL, 'SuX', '2018-02-27 19:17:17'),
(11, 'World Terrain & Forestry', NULL, 'WTF', '2018-02-27 19:17:17'),
(12, 'Web Utility Table', NULL, 'WUT', '2018-02-27 19:17:17'),
(13, 'Data & Utility Heuristics', NULL, 'DUH', '2018-02-27 19:17:17'),
(14, 'Observation (version 1)', NULL, 'OB1', '2018-02-27 19:17:17'),
(15, 'National Ozone Observatory Bot', NULL, 'NOOB', '2018-02-27 19:17:17'),
(16, 'Heart Ultrasound Heatmaps', NULL, 'HUH', '2018-02-27 19:17:17'),
(17, 'Free MySQL Logger', NULL, 'FML', '2018-02-27 19:17:17'),
(18, 'Heart, Abdomen, and Head Assessor', NULL, 'HAHA', '2018-02-27 19:17:17'),
(19, 'Waste Electronic & Wireless Equipment ', NULL, 'WEWE', '2018-02-27 19:17:17'),
(20, 'Biosphere Air and Gas Interpreter', NULL, NULL, '2018-02-27 19:17:17'),
(21, 'Original Record of Landscape and Yards', NULL, 'ORLY', '2018-02-27 19:17:17'),
(22, 'Selected Analytical Methods', NULL, 'SAM', '2018-02-27 19:17:17'),
(23, 'Storm Water Management', NULL, NULL, '2018-02-27 19:17:17'),
(24, 'Planetary Environmental Reference System', NULL, 'PERS', '2018-02-27 19:17:17'),
(25, 'Snowmed Analyzer System Extended Edition', NULL, 'SASEE', '2018-02-27 19:17:17'),
(26, 'Picture Archive and Communication System', NULL, 'PACS', '2018-02-27 19:17:17'),
(27, 'Radiology Information System', NULL, 'RIS', '2018-02-27 19:17:17'),
(28, 'Download Urgent Medical Backups', NULL, 'DUMB', '2018-02-27 19:17:17'),
(29, 'Pharmaceutical Information Program', NULL, 'PIP', '2018-02-27 19:17:17'),
(30, 'Remote Health Checker', NULL, NULL, '2018-02-27 19:17:17'),
(31, 'Remote Stroke Checker', NULL, NULL, '2018-02-27 19:17:17'),
(32, 'Chronic Disease Management', NULL, NULL, '2018-02-27 19:17:17'),
(33, 'Ambulance Schedule System', NULL, NULL, '2018-02-27 19:17:17'),
(34, 'Care Manager', NULL, NULL, '2018-02-27 19:25:48'),
(35, 'Lab Information System ', NULL, 'LIS', '2018-02-27 19:25:48'),
(36, 'Patient Admitter Tool', NULL, 'PAT', '2018-02-27 19:25:48'),
(37, 'Spillage Locator Tool', NULL, NULL, '2018-02-27 19:25:48'),
(38, 'Environmental Assessor Tool', NULL, NULL, '2018-02-27 19:25:48'),
(39, 'Statistical Analysis System', NULL, 'SAS', '2018-02-27 19:25:48'),
(40, 'Statistical Package for Social Sciences', NULL, 'SPSS', '2018-02-27 19:25:48'),
(41, 'Cisco WebEx', NULL, NULL, '2018-02-27 19:25:48'),
(42, 'Homecare System', NULL, NULL, '2018-02-27 19:25:48'),
(43, 'Electronic Medical Record (Viewer)', NULL, 'EMR', '2018-02-27 19:25:48'),
(44, 'eHealthChart', NULL, NULL, '2018-02-27 19:25:48'),
(45, 'Environmental Home Manager', NULL, NULL, '2018-02-27 19:25:48'),
(46, 'Clinical Data Repository', NULL, 'CDR', '2018-02-27 19:25:48'),
(47, 'Netcare Occupation & Observation Base System', NULL, 'NOOBS', '2018-02-27 19:25:48'),
(48, 'Find a Doctor', NULL, 'FAD', '2018-02-27 19:25:48'),
(49, 'Drug Profile Viewer', NULL, 'DPV', '2018-02-27 19:25:48'),
(50, 'Abdomen Tissue and Analysis Tool', NULL, 'AT-AT', '2018-02-27 19:25:48'),
(51, 'Provider Coverage Viewer', NULL, 'PCV', '2018-02-27 19:25:48'),
(52, 'Transcription Magic Interpreter', NULL, 'TMI', '2018-02-27 19:25:48'),
(53, 'PharmaCare', NULL, NULL, '2018-02-27 19:25:48'),
(54, 'Provider Registry System', NULL, 'PRS', '2018-02-27 19:25:48'),
(55, 'Electronic Lab System Interpolator', NULL, 'ELSI', '2018-02-27 19:25:48'),
(56, 'myeHealth (For British Columbia)', NULL, NULL, '2018-02-27 19:25:48'),
(57, 'eReferral', NULL, NULL, '2018-02-27 19:25:48'),
(58, 'myeHealth (For Alberta, Saskatchewan, Manitoba)', NULL, NULL, '2018-02-27 19:25:48'),
(59, 'Cleaning Product Analyzer', NULL, NULL, '2018-02-27 19:25:48'),
(60, 'Greenhouse Gas Analyzer', NULL, NULL, '2018-02-27 19:25:48'),
(61, 'Pollution Alerts Datamart', NULL, 'PAD', '2018-02-27 19:25:48'),
(63, 'Water and Land Data Observer', NULL, 'WALDO', '2018-02-27 19:25:48'),
(64, 'Waste Observation System', NULL, NULL, '2018-02-27 19:29:19'),
(65, 'myeHealth (For Ontario)', NULL, NULL, '2018-02-27 19:29:19'),
(66, 'myeHealth (For Quebec)', NULL, NULL, '2018-02-27 19:29:19'),
(67, 'myeHealth (For Yukon, Northwest Territories, Nunavut)', NULL, NULL, '2018-02-27 19:29:19'),
(68, 'Weather Analyzer Software System Unix Platform', NULL, 'WASSUP', '2018-02-27 19:29:19'),
(69, 'Weather and Ozone Observation Knowledge Emulator Enterprise Edition', NULL, 'WOOKEEE', '2018-02-27 19:29:19'),
(70, 'Microstrategy', NULL, NULL, '2018-02-27 19:29:19'),
(72, 'myeHealth (for New Brunswick, Prince Edward Island, Nova Scotia, Newfoundland and Labrador)', NULL, NULL, '2018-02-27 19:29:19'),
(73, 'Clinical Admission Manager', NULL, NULL, '2018-02-27 19:29:19'),
(74, 'Ambulance Supply System', NULL, NULL, '2018-02-27 19:29:19'),
(75, 'TeleCare', NULL, NULL, '2018-02-27 19:29:19'),
(76, 'Surgical Information System', NULL, 'SIS', '2018-02-27 19:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `created_at`) VALUES
(1, NULL, NULL, 'Chester', 'Field', '2018-02-27 19:36:41'),
(2, NULL, NULL, 'Ida', 'Claire', '2018-02-27 19:36:41'),
(3, NULL, NULL, 'Amanda', 'Huginkiss', '2018-02-27 19:36:41'),
(4, NULL, NULL, 'Les', 'Wynan', '2018-02-27 19:36:41'),
(5, NULL, NULL, 'Tara', 'Dactyl', '2018-02-27 19:36:41'),
(6, NULL, NULL, 'Claire', 'Voyant', '2018-02-27 19:36:41'),
(7, NULL, NULL, 'Will', 'Tickelu', '2018-02-27 19:36:41'),
(8, NULL, NULL, 'Polly', 'Graff', '2018-02-27 19:36:41'),
(9, NULL, NULL, 'Stan', 'Dupp', '2018-02-27 19:36:41'),
(10, NULL, NULL, 'Gene', 'Poole', '2018-02-27 19:36:41'),
(11, NULL, NULL, 'Neil', 'Down', '2018-02-27 19:36:41'),
(12, NULL, NULL, 'Brock', 'Lee', '2018-02-27 19:36:41'),
(13, NULL, NULL, 'Dot', 'Matricks', '2018-02-27 19:36:41'),
(14, NULL, NULL, 'Goldie', 'Locke', '2018-02-27 19:36:41'),
(15, NULL, NULL, 'Ally', 'Katz', '2018-02-27 19:36:41'),
(16, NULL, NULL, 'Leah', 'Tarde', '2018-02-27 19:36:41'),
(17, NULL, NULL, 'Dr. Chris P.', 'Bacon', '2018-02-27 19:36:41'),
(18, NULL, NULL, 'Sue', 'Flay', '2018-02-27 19:36:41'),
(19, NULL, NULL, 'Derry', 'Yare', '2018-02-27 19:36:41'),
(20, NULL, NULL, 'Krystal', 'Ball', '2018-02-27 19:36:41'),
(21, NULL, NULL, 'Honey', 'Potts', '2018-02-27 19:36:41'),
(22, NULL, NULL, 'Seymore', 'Butts', '2018-02-27 19:36:41'),
(23, NULL, NULL, 'Bud', 'Light', '2018-02-27 19:36:41'),
(24, NULL, NULL, 'Filet', 'Minyon', '2018-02-27 19:36:41'),
(25, NULL, NULL, 'Robyn', 'Banks', '2018-02-27 19:36:41'),
(26, NULL, NULL, 'Dyl', 'Pickel', '2018-02-27 19:36:41'),
(27, NULL, NULL, 'Paige', 'Turner', '2018-02-27 19:36:41'),
(28, NULL, NULL, 'Dr. Jed I.', 'Knight', '2018-02-27 19:36:41'),
(29, NULL, NULL, 'Justin', 'Case', '2018-02-27 19:36:41'),
(30, NULL, NULL, 'Pea', 'Pu', '2018-02-27 19:36:41'),
(31, NULL, NULL, 'Al', 'Dente', '2018-02-27 19:36:41'),
(32, NULL, NULL, 'Douglas', 'Furr', '2018-02-27 19:36:41'),
(33, NULL, NULL, 'Biff', 'Wellington', '2018-02-27 19:36:41'),
(34, NULL, NULL, 'Art', 'Dekko', '2018-02-27 19:36:41'),
(35, NULL, NULL, 'Clay', 'Potts', '2018-02-27 19:36:41'),
(36, NULL, NULL, 'Al', 'Falfa', '2018-02-27 19:36:41'),
(37, NULL, NULL, 'Frank', 'Furter', '2018-02-27 19:36:41'),
(38, NULL, NULL, 'Harry', 'Beard', '2018-02-27 19:36:41'),
(39, NULL, NULL, 'Anna', 'Conda', '2018-02-27 19:36:41'),
(40, NULL, NULL, 'Justin', 'Thyme', '2018-02-27 19:36:41'),
(41, NULL, NULL, 'Ollie', 'Gark', '2018-02-27 19:42:03'),
(42, NULL, NULL, 'Pete', 'Moss', '2018-02-27 19:42:03'),
(43, NULL, NULL, 'Rusty', 'Foord', '2018-02-27 19:42:03'),
(44, NULL, NULL, 'Tom', 'Foolery', '2018-02-27 19:42:03'),
(45, NULL, NULL, 'Warren', 'Peace', '2018-02-27 19:42:03'),
(46, NULL, NULL, 'Linda', 'Hand', '2018-02-27 19:42:03'),
(47, NULL, NULL, 'Lotta', 'Noyes', '2018-02-27 19:42:03'),
(48, NULL, NULL, 'Barb', 'Wyre', '2018-02-27 19:42:03'),
(50, NULL, NULL, 'Bunsen', 'Berner', '2018-02-27 19:42:03'),
(52, NULL, NULL, 'Ginger', 'Vitus', '2018-02-27 19:42:03'),
(53, NULL, NULL, 'Jack', 'Uzzi', '2018-02-27 19:42:03'),
(54, NULL, NULL, 'Mason', 'Jarr', '2018-02-27 19:42:03'),
(55, NULL, NULL, 'Ty', 'Kuhn', '2018-02-27 19:42:03'),
(56, NULL, NULL, 'Wazziz', 'Naime', '2018-02-27 19:42:03'),
(57, NULL, NULL, 'Rod', 'Curtains', '2018-02-27 19:42:03'),
(58, NULL, NULL, 'Kayne', 'Kun', '2018-02-27 19:42:03'),
(59, NULL, NULL, 'Rocky', 'Rhodes', '2018-02-27 19:42:03'),
(60, NULL, NULL, 'Sandy', 'Beech', '2018-02-27 19:42:03'),
(61, NULL, NULL, 'Sue', 'Vlaki', '2018-02-27 19:42:03'),
(62, NULL, NULL, 'Alan', 'Rench', '2018-02-27 19:42:03'),
(63, NULL, NULL, 'Anne', 'Thrax', '2018-02-27 19:42:03'),
(64, NULL, NULL, 'Annita', 'Job', '2018-02-27 19:42:03'),
(65, NULL, NULL, 'Art', 'Major', '2018-02-27 19:42:03'),
(66, NULL, NULL, 'Tess', 'Tamoni', '2018-02-27 19:42:03'),
(67, NULL, NULL, 'Al', 'Pacca', '2018-02-27 19:42:03'),
(68, NULL, NULL, 'Art A.', 'Choake', '2018-02-27 19:42:03'),
(69, NULL, NULL, 'Benny', 'Fitz', '2018-02-27 19:42:03'),
(70, NULL, NULL, 'Anna', 'Nimmity', '2018-02-27 19:42:03'),
(72, NULL, NULL, 'Mike', 'Raffone', '2018-02-27 19:42:03'),
(73, NULL, NULL, 'Sonny', 'Day', '2018-02-27 19:42:03'),
(74, NULL, NULL, 'Wil', 'Doolittle', '2018-02-27 19:42:03'),
(75, NULL, NULL, 'Gladys', 'Dunn', '2018-02-27 19:42:03'),
(76, NULL, NULL, 'Crystal', 'Ball', '2018-02-27 19:53:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysts`
--
ALTER TABLE `analysts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `approvers`
--
ALTER TABLE `approvers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysts`
--
ALTER TABLE `analysts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `approvers`
--
ALTER TABLE `approvers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
