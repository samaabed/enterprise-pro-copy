-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2023 at 09:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enterprisepro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `staff_number` int NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`staff_number`, `email`, `password`) VALUES
(2, 'admin@bradford.ac.uk', '$2y$10$7m3SRme5BfrUAhm68fxXauwvMsawGE/M3RVvX3aIUWDSOfAfGodiG');

-- --------------------------------------------------------

--
-- Table structure for table `general_info`
--

CREATE TABLE `general_info` (
  `id` int NOT NULL,
  `total_no_of_staff` int NOT NULL,
  `total_no_of_bids` int NOT NULL,
  `value_of_grants` float NOT NULL,
  `no_of_pi` int NOT NULL,
  `no_of_publications` int NOT NULL,
  `calculation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prips`
--

CREATE TABLE `prips` (
  `prip_id` int NOT NULL,
  `staff_number` int NOT NULL,
  `forename` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `surname` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_of_published_papers_ly` int NOT NULL,
  `no_of_grants_awarded_ly` int NOT NULL,
  `no_of_grants_submitted_ly` int NOT NULL,
  `no_of_phd_students_completed_ly` int NOT NULL,
  `no_of_phd_students_recruited_ly` int NOT NULL,
  `other_research_activity_ly` varchar(1800) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `what_helped_and_hindered_ly` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `faculty_role` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `how_research_align_with_themes` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `research_groupings` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `research_focus_areas` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `interdisciplinarity` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `external_organisations` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `next_5years_activities` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_of_bids_next5years_ukri` int NOT NULL,
  `no_of_bids_next5years_innovatuk` int NOT NULL,
  `no_of_bids_next5years_horizant` int NOT NULL,
  `other_bids_next5years` varchar(1600) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `staffing_and_equipment` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `no_of_journal_papers_next24months` int NOT NULL,
  `no_of_conference_papers_next24months` int NOT NULL,
  `no_of_books_next24months` int NOT NULL,
  `no_of_monographs_next24months` int NOT NULL,
  `other_outputs_next24months` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `no_of_pgrs_psv` int NOT NULL,
  `no_of_pgrs_csv` int NOT NULL,
  `no_of_phd_completed_next5years_psv` int NOT NULL,
  `no_of_phd_completed_next5years_csv` int NOT NULL,
  `no_of_phd_recruited_next2years_psv` int NOT NULL,
  `no_of_phd_recruited_next2years_csv` int NOT NULL,
  `it_requirements_next2years` varchar(1700) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `prips`
--

INSERT INTO `prips` (`prip_id`, `staff_number`, `forename`, `surname`, `no_of_published_papers_ly`, `no_of_grants_awarded_ly`, `no_of_grants_submitted_ly`, `no_of_phd_students_completed_ly`, `no_of_phd_students_recruited_ly`, `other_research_activity_ly`, `what_helped_and_hindered_ly`, `faculty_role`, `how_research_align_with_themes`, `research_groupings`, `research_focus_areas`, `interdisciplinarity`, `external_organisations`, `next_5years_activities`, `no_of_bids_next5years_ukri`, `no_of_bids_next5years_innovatuk`, `no_of_bids_next5years_horizant`, `other_bids_next5years`, `staffing_and_equipment`, `no_of_journal_papers_next24months`, `no_of_conference_papers_next24months`, `no_of_books_next24months`, `no_of_monographs_next24months`, `other_outputs_next24months`, `no_of_pgrs_psv`, `no_of_pgrs_csv`, `no_of_phd_completed_next5years_psv`, `no_of_phd_completed_next5years_csv`, `no_of_phd_recruited_next2years_psv`, `no_of_phd_recruited_next2years_csv`, `it_requirements_next2years`, `submission_date`) VALUES
(123, 20191063, 'Sama', 'Abed', 1, 1, 1, 1, 1, 'testing testing ', 'testing testing ', 'testing testing ', 'testing testing ', 'Smart Industrial Systems, Advanced Materials, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing ', 1, 2, 1, '', 'testing testing testing testing ', 1, 1, 1, 1, '', 0, 0, 0, 0, 0, 0, 'testing testing testing testing ', '2023-05-08'),
(124, 20203030, 'Adam', 'Rob', 1, 2, 0, 1, 3, 'testing testing tesing', 'testing testing ', ' testing testing testing testing testing testing testing testing ', 'testing testing testing testing ', 'Smart Industrial Systems, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 1, 0, 1, '', 'testing testing testing testing ', 1, 1, 1, 1, '', 0, 0, 0, 0, 0, 0, 'testing testing testing testing ', '2023-05-08'),
(125, 20207070, 'Linn', 'Pettersson', 1, 0, 2, 1, 1, 'testing testing tesing', 'testing testing ', ' testing testing testing testing testing testing testing testing ', 'testing testing testing testing ', 'Smart Industrial Systems, Sustainable Environments, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 1, 0, 0, '', 'testing testing testing testing ', 0, 1, 2, 0, '', 1, 2, 2, 2, 2, 2, 'testing testing testing testing ', '2023-05-08'),
(126, 20201212, 'Martha', 'Smdt', 1, 0, 2, 1, 1, 'testing testing tesing', 'testing testing ', ' testing testing testing testing testing testing testing testing ', 'testing testing testing testing ', 'Smart Industrial Systems, Sustainable Environments, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 1, 0, 0, '', 'testing testing testing testing ', 0, 1, 2, 0, '', 1, 2, 2, 2, 2, 2, 'testing testing testing testing ', '2023-05-08'),
(128, 20217777, 'Jeneen', 'Katri', 1, 0, 2, 3, 1, 'testing testing tesing', 'testing testing ', ' testing testing testing testing testing testing testing testing ', 'testing testing testing testing ', 'Sustainable Environments, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 1, 0, 0, '', 'testing testing testing testing ', 1, 1, 2, 1, '', 1, 2, 2, 1, 1, 1, 'testing testing testing testing ', '2023-05-08'),
(129, 20219999, 'Nour', 'Samarah', 1, 0, 2, 3, 1, 'testing testing tesing', 'testing testing ', ' testing testing testing testing testing testing testing testing ', 'testing testing testing testing ', 'Sustainable Environments, ', 'testing testing testing testing ', 'testing testing testing testing testing testing ', 'testing testing testing testing ', 'testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing testing ', 1, 0, 0, '', 'testing testing testing testing ', 1, 1, 2, 1, '', 1, 2, 2, 1, 1, 1, 'testing testing testing testing ', '2023-05-08'),
(130, 20301717, 'Han', 'Ngoc', 1, 1, 1, 1, 2, 'test test ', 'test test test test test test test test ', 'test test test test test test ', 'test test test test ', 'Advanced Materials, ', 'test test test test test test test test ', 'test test test test ', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'test test test test ', 1, 2, 1, '', 'test test test test ', 2, 1, 1, 1, '', 1, 2, 2, 1, 1, 1, 'test test ', '2023-05-08'),
(131, 20501234, 'Ana', 'Doc', 1, 2, 1, 1, 2, 'test test ', 'test test test test test test test test ', 'test test test test test test ', 'test test test test ', 'Advanced Materials, ', 'test test test test test test test test ', 'test test test test ', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ', 'test test test test ', 1, 2, 1, '', 'test test test test ', 2, 1, 1, 1, '', 1, 2, 2, 1, 1, 1, 'test test ', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `project_id` int NOT NULL,
  `project_title` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `project_theme` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `bid_value` float NOT NULL,
  `stage_of_development` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `collaborators` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `funder` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `date_of_submission` date NOT NULL,
  `prip_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_title`, `project_theme`, `bid_value`, `stage_of_development`, `collaborators`, `funder`, `deadline`, `date_of_submission`, `prip_id`) VALUES
(41, 'project abc', 'Advanced Materials', 12000, '1', 'none', 'none', '2023-12-28', '2023-05-08', 123),
(42, 'AI simulation model ', 'Smart Industrial Systems', 12000, '1', 'none', 'none', '2024-05-30', '2023-05-08', 124),
(43, 'environment project', 'Sustainable Environments', 500, '2', 'none', 'none', '2023-05-20', '2023-05-08', 124),
(44, 'smart e-learning system', 'Smart Industrial Systems', 1600, 'stage 2', 'none', 'test', '2023-08-24', '2023-05-08', 125),
(45, 'mental health clinic ', 'Healthcare Technology Innovation', 15000, '4', 'none', 'UKRI', '2023-05-31', '2023-05-08', 126),
(46, 'new smart industrial system', 'Smart Industrial Systems', 1000, 'stage 1', 'none', 'test', '2023-12-01', '2023-05-08', 131);

-- --------------------------------------------------------

--
-- Table structure for table `researchers`
--

CREATE TABLE `researchers` (
  `staff_number` int NOT NULL,
  `surename` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `forename` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `researchers`
--

INSERT INTO `researchers` (`staff_number`, `surename`, `forename`, `email`) VALUES
(20191063, 'Abed', 'Sama', 's.abed@bradford.ac.uk'),
(20201212, 'Smdt', 'Martha', 'm.smdt@bradford.ac.uk'),
(20203030, 'Rob', 'Adam', 'adam@bradford.ac.uk'),
(20207070, 'Pettersson', 'Linn', 'linn@bradford.ac.uk'),
(20217777, 'Katri', 'Jeneen', 'j.katri@bradford.ac.uk'),
(20219999, 'Samarah', 'Nour', 'nour@bradford.ac.uk'),
(20301717, 'Ngoc', 'Han', 'han@bradford.ac.uk'),
(20501234, 'Doc', 'Ana', 'ana@bradford.ac.uk');

-- --------------------------------------------------------

--
-- Table structure for table `researchers_projects`
--

CREATE TABLE `researchers_projects` (
  `staff_number` int NOT NULL,
  `project_id` int NOT NULL,
  `type_of_staff` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `submission_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `researchers_projects`
--

INSERT INTO `researchers_projects` (`staff_number`, `project_id`, `type_of_staff`, `submission_date`) VALUES
(20191063, 41, 'PI', '2023-05-08 18:41:18'),
(20201212, 42, 'CO-I', '2023-05-08 18:57:44'),
(20201212, 43, 'CO-I', '2023-05-08 18:57:44'),
(20201212, 44, 'CO-I', '2023-05-08 18:57:44'),
(20201212, 45, 'PI', '2023-05-08 18:57:44'),
(20203030, 42, 'PI', '2023-05-08 18:48:14'),
(20203030, 43, 'PI', '2023-05-08 18:48:14'),
(20207070, 41, 'CO-I', '2023-05-08 18:53:21'),
(20207070, 42, 'CO-I', '2023-05-08 18:53:21'),
(20207070, 44, 'PI', '2023-05-08 18:53:21'),
(20217777, 41, 'CO-I', '2023-05-08 21:42:03'),
(20217777, 42, 'CO-I', '2023-05-08 21:42:03'),
(20217777, 43, 'CO-I', '2023-05-08 21:42:03'),
(20217777, 45, 'CO-I', '2023-05-08 21:42:03'),
(20219999, 41, 'CO-I', '2023-05-08 21:42:46'),
(20219999, 42, 'CO-I', '2023-05-08 21:42:46'),
(20219999, 43, 'CO-I', '2023-05-08 21:42:46'),
(20219999, 45, 'CO-I', '2023-05-08 21:42:46'),
(20301717, 41, 'CO-I', '2023-05-08 22:31:16'),
(20301717, 42, 'CO-I', '2023-05-08 22:31:16'),
(20301717, 43, 'CO-I', '2023-05-08 22:31:16'),
(20301717, 44, 'CO-I', '2023-05-08 22:31:16'),
(20501234, 41, 'CO-I', '2023-05-08 22:36:27'),
(20501234, 42, 'CO-I', '2023-05-08 22:36:27'),
(20501234, 44, 'CO-I', '2023-05-08 22:36:27'),
(20501234, 46, 'PI', '2023-05-08 22:36:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`staff_number`);

--
-- Indexes for table `general_info`
--
ALTER TABLE `general_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prips`
--
ALTER TABLE `prips`
  ADD PRIMARY KEY (`prip_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `prip_id` (`prip_id`);

--
-- Indexes for table `researchers`
--
ALTER TABLE `researchers`
  ADD PRIMARY KEY (`staff_number`);

--
-- Indexes for table `researchers_projects`
--
ALTER TABLE `researchers_projects`
  ADD PRIMARY KEY (`staff_number`,`project_id`),
  ADD KEY `project_id` (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `staff_number` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_info`
--
ALTER TABLE `general_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prips`
--
ALTER TABLE `prips`
  MODIFY `prip_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `researchers`
--
ALTER TABLE `researchers`
  MODIFY `staff_number` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=678392038;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`prip_id`) REFERENCES `prips` (`prip_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researchers_projects`
--
ALTER TABLE `researchers_projects`
  ADD CONSTRAINT `researchers_projects_ibfk_1` FOREIGN KEY (`staff_number`) REFERENCES `researchers` (`staff_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `researchers_projects_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
