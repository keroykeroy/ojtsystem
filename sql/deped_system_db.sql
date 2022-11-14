-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2019 at 05:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deped_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`, `office`) VALUES
(1, 'admin', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `ipcrf_view`
-- (See below for the actual view)
--
CREATE TABLE `ipcrf_view` (
`t_id` int(11)
,`kra_id` int(11)
,`kra_no` int(20)
,`kra_items` int(20)
,`kra_gen_objective` text
,`kra_objective` text
,`kra_quality` varchar(11)
,`kra_efficiency` varchar(11)
,`kra_timeliness` varchar(11)
,`kra_item_percentage` int(11)
,`kra_target_percentage` int(11)
,`tot_completion` int(11)
,`tot_rmks_quality` float
,`tot_rmks_efficiency` float
,`tot_rmks_timeliness` float
,`tot_average` float
,`tot_score` float
,`pi_no` varchar(11)
,`pi_quality` varchar(500)
,`pi_efficiency` varchar(500)
,`pi_timeliness` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `join_users_details_view`
-- (See below for the actual view)
--
CREATE TABLE `join_users_details_view` (
`t_id` int(11)
,`control_id` varchar(50)
,`t_firstname` varchar(20)
,`t_midname` varchar(20)
,`t_lastname` varchar(20)
,`t_fullname` varchar(50)
,`t_sex` varchar(20)
,`t_email` varchar(50)
,`t_phonenumber` varchar(20)
,`t_registration_date` date
,`u_rp_relation` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `kra_monitoring`
--

CREATE TABLE `kra_monitoring` (
  `id` int(11) NOT NULL,
  `kra_id` int(11) NOT NULL,
  `t_id` int(11) DEFAULT NULL,
  `kra_no` int(11) DEFAULT NULL,
  `kra_item` int(11) DEFAULT NULL,
  `kra_mon_target` int(11) DEFAULT NULL,
  `kra_mon_actual` int(11) DEFAULT NULL,
  `kra_mon_completion` int(11) DEFAULT NULL,
  `rmks_quality` int(11) DEFAULT NULL,
  `rmks_efficiency` int(11) DEFAULT NULL,
  `rmks_timeliness` int(11) DEFAULT NULL,
  `kra_mon_month` varchar(20) DEFAULT NULL,
  `date_encoded` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kra_monitoring`
--

INSERT INTO `kra_monitoring` (`id`, `kra_id`, `t_id`, `kra_no`, `kra_item`, `kra_mon_target`, `kra_mon_actual`, `kra_mon_completion`, `rmks_quality`, `rmks_efficiency`, `rmks_timeliness`, `kra_mon_month`, `date_encoded`) VALUES
(406, 169, 1001, 1, 1, 5, 2, 40, 5, 5, 4, 'January', '2019-08-21 01:49:37'),
(407, 169, 1001, 1, 1, 5, 5, 100, 3, 3, 5, 'February', '2019-08-21 05:16:47'),
(408, 170, 1001, 2, 1, 1, 2, 200, 5, 5, 5, 'January', '2019-08-21 05:17:02'),
(409, 170, 1001, 2, 1, 2, 3, 150, 5, 5, 4, 'February', '2019-08-21 05:17:09'),
(410, 171, 1001, 2, 2, 5, 2, 40, 4, 4, 3, 'January', '2019-08-21 05:17:18'),
(411, 173, 1001, 3, 1, 150, 25, 17, 3, 2, 5, 'January', '2019-08-24 18:32:01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `kra_monitoring_view`
-- (See below for the actual view)
--
CREATE TABLE `kra_monitoring_view` (
`id` int(11)
,`kra_id` int(11)
,`t_id` int(11)
,`kra_no` int(11)
,`kra_item` int(11)
,`kra_mon_target` int(11)
,`kra_mon_actual` int(11)
,`kra_mon_completion` int(11)
,`rmks_quality` int(11)
,`rmks_efficiency` int(11)
,`rmks_timeliness` int(11)
,`kra_mon_month` varchar(20)
,`date_encoded` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kra_monitoring_view_jan_dec`
-- (See below for the actual view)
--
CREATE TABLE `kra_monitoring_view_jan_dec` (
`id` int(11)
,`kra_id` int(11)
,`t_id` int(11)
,`kra_no` int(11)
,`kra_item` int(11)
,`kra_mon_target` int(11)
,`kra_mon_actual` int(11)
,`kra_mon_completion` int(11)
,`rmks_quality` int(11)
,`rmks_efficiency` int(11)
,`rmks_timeliness` int(11)
,`kra_mon_month` varchar(20)
,`date_encoded` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `kra_monitoring_view_july_june`
-- (See below for the actual view)
--
CREATE TABLE `kra_monitoring_view_july_june` (
`id` int(11)
,`kra_id` int(11)
,`t_id` int(11)
,`kra_no` int(11)
,`kra_item` int(11)
,`kra_mon_target` int(11)
,`kra_mon_actual` int(11)
,`kra_mon_completion` int(11)
,`rmks_quality` int(11)
,`rmks_efficiency` int(11)
,`rmks_timeliness` int(11)
,`kra_mon_month` varchar(20)
,`date_encoded` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `kra_pi`
--

CREATE TABLE `kra_pi` (
  `pi_id` int(11) NOT NULL,
  `u_rp_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `kra_id` int(11) NOT NULL,
  `pi_no` varchar(11) DEFAULT NULL,
  `kra_no` int(20) DEFAULT NULL,
  `kra_items` int(20) DEFAULT NULL,
  `pi_quality` varchar(500) DEFAULT NULL,
  `pi_efficiency` varchar(500) DEFAULT NULL,
  `pi_timeliness` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kra_pi`
--

INSERT INTO `kra_pi` (`pi_id`, `u_rp_id`, `t_id`, `kra_id`, `pi_no`, `kra_no`, `kra_items`, `pi_quality`, `pi_efficiency`, `pi_timeliness`) VALUES
(1911, 21, 1001, 169, '5', 1, 1, 'Evaluated and checked submitted required documents for appointment with no error.', '100% of receieved documents are prepared for printing of appointment', 'Evaluated and checked within the day upon receipt of documents.'),
(1912, 21, 1001, 169, '4', 1, 1, 'Evaluated and checked submitted required documents for appointment with 1-2 errors.', 'Only 88.00 to 99.99% documents are prepared for printing of appointment', 'Evaluated and checked in the 2nd day upon receipt of documents.'),
(1913, 21, 1001, 169, '3', 1, 1, 'Evaluated and checked submitted required documents for appointment with 3-4 errors.', 'Only 75.00 to 87.99% of documents are prepared for printing of appointment', 'Evaluated and checked in the 3rd day upon receipt of documents.'),
(1914, 21, 1001, 169, '2', 1, 1, 'Evaluated and checked submitted required documents for appointment with 5-6 errors.', 'Only  63.00 to 74.99% of documents are prepared for printing of appointment', 'Evaluated and checked in 4th day upon receipt of documents.'),
(1915, 21, 1001, 169, '1', 1, 1, 'Evaluated and checked submitted required documents for appointment with more than 6 errors.', ' Only 1.00 to 62.99% of documents are prepared for printing of appointment', 'Evaluated and checked in 5th day upon receipt of documents.'),
(1916, 21, 1001, 170, '5', 2, 1, 'Prepared appointments with no error.', '547 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to August.'),
(1917, 21, 1001, 170, '4', 2, 1, 'Prepared appointments with 1-2 errors.', '497 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to October.'),
(1918, 21, 1001, 170, '3', 2, 1, 'Prepared appointments with 3-4 errors.', '447 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to November.'),
(1919, 21, 1001, 170, '2', 2, 1, 'Prepared appointments with 5-6 errors.', '397 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to December.'),
(1920, 21, 1001, 170, '1', 2, 1, 'Prepared appointments with more than 6 errors.', 'Documents are set aside for next day printing of appointment', 'Prepared and forwarded appointments to the SDS office from June to January.'),
(1921, 21, 1001, 171, '5', 2, 2, 'Prepared appointments with no error.', '139 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to October.'),
(1922, 21, 1001, 171, '4', 2, 2, 'Prepared appointments with 1-2 errors.', '129 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to November.'),
(1923, 21, 1001, 171, '3', 2, 2, 'Prepared appointments with 3-4 errors.', '119 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to December.'),
(1924, 21, 1001, 171, '2', 2, 2, 'Prepared appointments with 5-6 errors.', '109 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to January.'),
(1925, 21, 1001, 171, '1', 2, 2, 'Prepared appointments with more than 6 errors.', '99 appointments for teaching and non-teaching have been prepared', 'Prepared and forwarded appointments to the SDS office from June to February.'),
(1926, 21, 1001, 172, '5', 2, 3, 'Prepared and forwarded publications with no error.', '100%  of request for publication are submitted to CSC', 'Prepared publication the day upon receipt of notice of publication'),
(1927, 21, 1001, 172, '4', 2, 3, 'Prepared and forwarded publications with 1-2 errors.', 'Only 88.00 to 99.99% of request for publication are submitted to CSC', 'Prepared publication in 1-2 days upon receipt of  notice of publication'),
(1928, 21, 1001, 172, '3', 2, 3, 'Prepared and forwarded publications with 3-4 errors.', 'Only 75.00 to 87.99% of request for publication are submitted to CSC', 'Prepared  publication in 3-4 days upon receipt of  notice of publication'),
(1929, 21, 1001, 172, '2', 2, 3, 'Prepared and forwarded publications with 5-6 errors.', 'Only  63.00 to 74.99% of request for publication are submitted to CSC', 'Prepared  publication in 5-6 days upon receipt of  notice of publication'),
(1930, 21, 1001, 172, '1', 2, 3, 'Prepared and forwarded publications with more than 6 errors.', ' Only 1.00 to 62.99% of request for publication are submitted to CSC', 'Prepared publication in 6 days up upon receipt of  notice of publication'),
(1931, 21, 1001, 173, '5', 3, 1, 'Submitted required reports completely without errors or corrections ', 'The required reports were submitted or released  to the requesting party', 'Submitted the required reports 3 days before the set deadline'),
(1932, 21, 1001, 173, '4', 3, 1, 'Submitted required reports whether complete or incomplete but with 1-2 errors or corrections', 'The required reports were submitted or released  to the requesting party', 'Submitted the required reports 1-2 days before the set deadline'),
(1933, 21, 1001, 173, '3', 3, 1, 'Submitted required reports whether complete or incomplete but with 3-5 errors or corrections', 'The required reports were submitted or released to the requesting party with minor deficiency or incomplete data', 'Submitted the required reports on the set deadline'),
(1934, 21, 1001, 173, '2', 3, 1, 'Submitted required reports whether complete or incomplete but with 6-10 errors or corrections', 'The required reports were submitted or released to the requesting party with major deficiency or incomplete data', 'Submitted the required reports not more than 3 days after the deadline'),
(1935, 21, 1001, 173, '1', 3, 1, 'Submitted required reports whether complete or incomplete but with more than 10 errors or corrections', 'The required reports were submitted or released to the requesting party but returned for complete revision ', 'Submitted the required reports after 4 days or more from the set deadline'),
(1936, 21, 1001, 174, '5', 3, 2, 'Maintained an excellent filing system and records management with corresponding labels or tags ', 'Files and documents can be easily located and accessed by other personnel during my absence', ''),
(1937, 21, 1001, 174, '4', 3, 2, 'Maintained a very satisfactory filing system and records management without corresponding labels ', 'Files and documents can be easily located and accessed by other personnel during my absence', ''),
(1938, 21, 1001, 174, '3', 3, 2, 'Maintained a satisfactory filing system and records management without corresponding labels ', 'Other personnel can easily locate and access the documents during my absence with minor confusing files', ''),
(1939, 21, 1001, 174, '2', 3, 2, 'Maintained unsatisfactory filing system and records management without corresponding labels ', 'Other personnel can easily locate and access the documents during my absence with difficulty.', ''),
(1940, 21, 1001, 174, '1', 3, 2, 'Maintained a poor filing system and records management without corresponding labels ', 'Other personnel cannot locate and access the documents during my absence', ''),
(1941, 21, 1001, 175, '5', 3, 3, 'Prepared/updated personnel card without error and correction', 'All personnel cards are created/updated', 'Prepared/updated personnel card within the day upon receipt of documents'),
(1942, 21, 1001, 175, '4', 3, 3, 'Prepared/updated personnel card with 1-2 errors.', 'All personnel cards are created/updated', 'Prepared/updated personnel card a day upon receipt of documents'),
(1943, 21, 1001, 175, '3', 3, 3, 'Prepared/updated personnel card with 3-4 errors.', 'All personnel cards are created/updated in 2 -3 days', 'Prepared/updated personnel card in 2-3 days upon receipt of documents'),
(1944, 21, 1001, 175, '2', 3, 3, 'Prepared/updated personnel card with 5-6 errors.', 'All personnel cards are created/updated in 3-4 days', 'Prepared/updated personnel card in 4-5 days upon receipt of documents'),
(1945, 21, 1001, 175, '1', 3, 3, 'Prepared/updated personnel card with more than 6 errors.', 'All personnel cards are created/updated in 5-6 days', 'Prepared/updated personnel card In 6 days and more upon receipt of documents'),
(1946, 21, 1001, 176, '5', 4, 1, 'Wore Complete set of the  prescribed uniform  (blouse, pants, ID, shoes)', 'Wore complete set of uniform in the prescribed 192 working days (Mon.-Thursday) ', ''),
(1947, 21, 1001, 176, '4', 4, 1, 'Wore the  prescribed uniform (One is missing, e.g. ID)', ' Wore complete set of uniform in the prescribed 190 working days (Mon.-Thursday)', ''),
(1948, 21, 1001, 176, '3', 4, 1, 'Wore the  prescribed uniform (Two are missing, e.g. ID)', 'Wore complete set of uniform in the prescribed 188 working days (Mon.-Thursday)', ''),
(1949, 21, 1001, 176, '2', 4, 1, 'Wore the complete set of uniform but not the prescribed for the day.', 'Wore complete set of uniform in the prescribed  187or less  working days (Mon.-Thursday)', ''),
(1950, 21, 1001, 176, '1', 4, 1, 'Did not wear the complete set and prescribed for the day.', 'Did not wear complete set of uniform as prescribed', ''),
(1951, 21, 1001, 177, '5', 4, 2, 'DTRs are free from errors, erasures and complete applicable attachments', 'Submitted 12 DTRs within the year (DTR for Jan-Dec. 2017) every month ', 'Submitted on the 5th calendar days of the succeeding month'),
(1952, 21, 1001, 177, '4', 4, 2, 'DTRs are free from errors and complete applicable attachments, but with  one erasure', 'Submitted 11 DTRs within the year (DTR for Jan-Dec. 2017) every month ', 'Submitted on the 6th calendar days of the succeeding month'),
(1953, 21, 1001, 177, '3', 4, 2, 'DTRs are with 1 content error, without erasures and complete applicable attachments', 'Submitted 10 DTRs within the year (Jan-Dec. 2017) every month', 'Submitted on the 7th calendar days of the succeeding month'),
(1954, 21, 1001, 177, '2', 4, 2, 'DTRs are with 1 content error, with erasures and/or one lacking applicable attachments', 'Submitted 9 DTRs within the year (Jan-Dec. 2017) ', 'Submitted on the 8th calendar days of the succeeding month'),
(1955, 21, 1001, 177, '1', 4, 2, 'DTRs are with 2 content errors, with erasures and/or more than one lacking applicable attachments', 'Submitted 8 DTRs within the year (Jan-Dec. 2017)', 'Submitted on the 9th  and beyond calendar days of the succeeding month'),
(1956, 21, 1001, 178, '5', 4, 3, 'Had memorized the Panunumpa sa Watawat,  DepED VMCV and Panunumpa ng Kawani ng Gobyerno (PKG), Quality Objectives', 'Attended 104 flag raising and lowering ceremonies ', 'Attended 104 flag raising and lowering ceremonies on-time'),
(1957, 21, 1001, 178, '4', 4, 3, 'Had memorized the only two out of the three mentioned above.', ' Attended 102 flag raising and lowering ceremonies', 'Attended flag raising and lowering ceremonies 2 minutes late  (not able to be in the appropriate line)'),
(1958, 21, 1001, 178, '3', 4, 3, 'Had memorized the only one out of the three mentioned above.', 'Attended 100 flag raising and lowering ceremonies', 'Attended flag raising and lowering ceremonies 3 minutes late (not able to be in the appropriate line)'),
(1959, 21, 1001, 178, '2', 4, 3, 'Can only recite some parts', 'Attended 88 flag raising and lowering ceremonies', 'Attended flag raising and lowering ceremonies  4 minutes late'),
(1960, 21, 1001, 178, '1', 4, 3, 'Had not memorized any', 'Attended 86 and below flag raising and lowering ceremonies', 'Attended flag raising and lowering ceremonies 5 and above minutes late (not able to be in the appropriate line)'),
(1961, 21, 1001, 179, '5', 5, 1, NULL, NULL, NULL),
(1962, 21, 1001, 179, '4', 5, 1, NULL, NULL, NULL),
(1963, 21, 1001, 179, '3', 5, 1, NULL, NULL, NULL),
(1964, 21, 1001, 179, '2', 5, 1, NULL, NULL, NULL),
(1965, 21, 1001, 179, '1', 5, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `t_id` int(11) NOT NULL,
  `control_id` varchar(50) DEFAULT NULL,
  `t_fullname` varchar(50) DEFAULT NULL,
  `t_firstname` varchar(20) DEFAULT NULL,
  `t_midname` varchar(20) DEFAULT NULL,
  `t_lastname` varchar(20) DEFAULT NULL,
  `t_dob` varchar(20) DEFAULT NULL,
  `t_phonenumber` varchar(20) DEFAULT NULL,
  `t_sex` varchar(20) DEFAULT NULL,
  `t_email` varchar(50) DEFAULT NULL,
  `t_username` varchar(20) DEFAULT NULL,
  `t_password` varchar(20) DEFAULT NULL,
  `t_registration_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`t_id`, `control_id`, `t_fullname`, `t_firstname`, `t_midname`, `t_lastname`, `t_dob`, `t_phonenumber`, `t_sex`, `t_email`, `t_username`, `t_password`, `t_registration_date`) VALUES
(1001, '2019-1001', 'Kyle Rosalado Burdeos', 'Kyle', 'Rosalado', 'Burdeos', '1997-04-09', '09-102-735-042', 'Male', 'krburdeos20@gmail.com', 'keroykeroy', '12345', '2019-08-21');

-- --------------------------------------------------------

--
-- Stand-in structure for view `usersview`
-- (See below for the actual view)
--
CREATE TABLE `usersview` (
`t_id` int(11)
,`t_firstname` varchar(20)
,`t_midname` varchar(20)
,`t_lastname` varchar(20)
,`t_dob` varchar(20)
,`t_phonenumber` varchar(20)
,`t_sex` varchar(20)
,`t_email` varchar(50)
,`t_username` varchar(20)
,`t_password` varchar(20)
,`t_registration_date` date
);

-- --------------------------------------------------------

--
-- Table structure for table `users_kra`
--

CREATE TABLE `users_kra` (
  `kra_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `u_rp_id` int(11) NOT NULL,
  `kra_no` int(20) DEFAULT NULL,
  `kra_items` int(20) DEFAULT NULL,
  `kra_gen_objective` text DEFAULT NULL,
  `kra_objective` text DEFAULT NULL,
  `kra_quality` varchar(11) DEFAULT NULL,
  `kra_efficiency` varchar(11) DEFAULT NULL,
  `kra_timeliness` varchar(11) DEFAULT NULL,
  `kra_item_percentage` int(11) NOT NULL,
  `kra_target_percentage` int(11) NOT NULL,
  `tot_completion` int(11) DEFAULT NULL,
  `tot_rmks_quality` float DEFAULT NULL,
  `tot_rmks_efficiency` float DEFAULT NULL,
  `tot_rmks_timeliness` float DEFAULT NULL,
  `tot_average` float DEFAULT NULL,
  `tot_score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_kra`
--

INSERT INTO `users_kra` (`kra_id`, `t_id`, `u_rp_id`, `kra_no`, `kra_items`, `kra_gen_objective`, `kra_objective`, `kra_quality`, `kra_efficiency`, `kra_timeliness`, `kra_item_percentage`, `kra_target_percentage`, `tot_completion`, `tot_rmks_quality`, `tot_rmks_efficiency`, `tot_rmks_timeliness`, `tot_average`, `tot_score`) VALUES
(169, 1001, 21, 1, 1, '1. Recruitment, Selection and Placement (25%)', 'Evaluated and checked required documents for application', '1', '1', '1', 20, 25, 70, 4, 4, 4.5, 4.17, 0.83),
(170, 1001, 21, 2, 1, '2. Personnel Actions (35%)\r\n', 'By the end of October 2018, 547 appointments for teaching and non-teaching positions have been prepared.', '1', '1', '1', 20, 35, 175, 5, 5, 4.5, 4.83, 0.97),
(171, 1001, 21, 2, 2, '2. Personnel Actions (35%)\r\n', 'By the end of November 2018, appointments 125 for Promotion, 14 Transfers & Reassignment of Personnel were prepared.\r\n', '1', '1', '1', 15, 35, 40, 4, 4, 3, 3.67, 0.55),
(172, 1001, 21, 2, 3, '2. Personnel Actions (35%)\r\n', 'Submitted Request for Publication to Civil Service Commission', '1', '1', '1', 10, 35, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 1001, 21, 3, 1, '3. Personnel Information System (25%)\r\n', 'a. Generated reports for updating of Personnel Information', '1', '1', '1', 6, 25, 17, 3, 2, 5, 3.33, 0.2),
(174, 1001, 21, 3, 2, '3. Personnel Information System (25%)\r\n', 'b. Maintained filing system for easy access of information', '1', '1', '0', 9, 25, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 1001, 21, 3, 3, '3. Personnel Information System (25%)\r\n', 'Prepared and updated Personnel Cards for newly-hired employees, promotions and other employee position  movements', '1', '1', '1', 10, 25, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 1001, 21, 4, 1, '4. Support to Administration (10%)\r\n', 'a. Prepared and updated Personnel Cards for newly-hired employees, promotions and other employee position  movements', '1', '1', '0', 4, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 1001, 21, 4, 2, '4. Support to Administration (10%)\r\n', 'b. Submitted DTR on the 5th calendar days of the succeeding month with complete attachments/ without error during the rating period', '1', '1', '1', 3, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 1001, 21, 4, 3, '4. Support to Administration (10%)\r\n', ' Attended 104 flag raising and lowering ceremonies on-time during the rating period', '1', '1', '1', 3, 10, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 1001, 21, 5, 1, ' PLUS FACTOR', 'COMMUNITY SERVICES (TEAM CATEGORY)/ (INDIVIDUAL CATEGORY)', '0', '0', '0', 5, 5, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_kra_view`
-- (See below for the actual view)
--
CREATE TABLE `users_kra_view` (
`kra_id` int(11)
,`t_id` int(11)
,`u_rp_id` int(11)
,`kra_no` int(20)
,`kra_items` int(20)
,`kra_objective` text
,`kra_quality` varchar(11)
,`kra_efficiency` varchar(11)
,`kra_timeliness` varchar(11)
,`kra_item_percentage` int(11)
,`kra_target_percentage` int(11)
,`tot_completion` int(11)
,`tot_rmks_quality` float
,`tot_rmks_efficiency` float
,`tot_rmks_timeliness` float
,`tot_average` float
,`tot_score` float
);

-- --------------------------------------------------------

--
-- Table structure for table `users_rp_details`
--

CREATE TABLE `users_rp_details` (
  `u_rp_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `u_rp_office` varchar(50) DEFAULT NULL,
  `u_rp_relation` varchar(20) DEFAULT NULL,
  `u_rp_position` varchar(50) DEFAULT NULL,
  `u_rp_datehired` text DEFAULT NULL,
  `u_rp_designation` varchar(20) DEFAULT NULL,
  `u_rp_designation_date` text DEFAULT NULL,
  `urp_date_start` text DEFAULT NULL,
  `urp_date_end` text DEFAULT NULL,
  `u_rp_dateper` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_rp_details`
--

INSERT INTO `users_rp_details` (`u_rp_id`, `t_id`, `u_rp_office`, `u_rp_relation`, `u_rp_position`, `u_rp_datehired`, `u_rp_designation`, `u_rp_designation_date`, `urp_date_start`, `urp_date_end`, `u_rp_dateper`) VALUES
(21, 1001, 'Buhangin National High School', 'Teacher', 'Kinder Teacher III', '08/22/2019', '   Buhangin District', '08/21/2019', '2019', '2019', '2019 - 2019');

-- --------------------------------------------------------

--
-- Structure for view `ipcrf_view`
--
DROP TABLE IF EXISTS `ipcrf_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ipcrf_view`  AS  select `users_kra`.`t_id` AS `t_id`,`users_kra`.`kra_id` AS `kra_id`,`users_kra`.`kra_no` AS `kra_no`,`users_kra`.`kra_items` AS `kra_items`,`users_kra`.`kra_gen_objective` AS `kra_gen_objective`,`users_kra`.`kra_objective` AS `kra_objective`,`users_kra`.`kra_quality` AS `kra_quality`,`users_kra`.`kra_efficiency` AS `kra_efficiency`,`users_kra`.`kra_timeliness` AS `kra_timeliness`,`users_kra`.`kra_item_percentage` AS `kra_item_percentage`,`users_kra`.`kra_target_percentage` AS `kra_target_percentage`,`users_kra`.`tot_completion` AS `tot_completion`,`users_kra`.`tot_rmks_quality` AS `tot_rmks_quality`,`users_kra`.`tot_rmks_efficiency` AS `tot_rmks_efficiency`,`users_kra`.`tot_rmks_timeliness` AS `tot_rmks_timeliness`,`users_kra`.`tot_average` AS `tot_average`,`users_kra`.`tot_score` AS `tot_score`,`kra_pi`.`pi_no` AS `pi_no`,`kra_pi`.`pi_quality` AS `pi_quality`,`kra_pi`.`pi_efficiency` AS `pi_efficiency`,`kra_pi`.`pi_timeliness` AS `pi_timeliness` from (`users_kra` join `kra_pi` on(`users_kra`.`kra_id` = `kra_pi`.`kra_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `join_users_details_view`
--
DROP TABLE IF EXISTS `join_users_details_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `join_users_details_view`  AS  select `users`.`t_id` AS `t_id`,`users`.`control_id` AS `control_id`,`users`.`t_firstname` AS `t_firstname`,`users`.`t_midname` AS `t_midname`,`users`.`t_lastname` AS `t_lastname`,`users`.`t_fullname` AS `t_fullname`,`users`.`t_sex` AS `t_sex`,`users`.`t_email` AS `t_email`,`users`.`t_phonenumber` AS `t_phonenumber`,`users`.`t_registration_date` AS `t_registration_date`,`users_rp_details`.`u_rp_relation` AS `u_rp_relation` from (`users` left join `users_rp_details` on(`users_rp_details`.`t_id` = `users`.`t_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `kra_monitoring_view`
--
DROP TABLE IF EXISTS `kra_monitoring_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kra_monitoring_view`  AS  select `kra_monitoring`.`id` AS `id`,`kra_monitoring`.`kra_id` AS `kra_id`,`kra_monitoring`.`t_id` AS `t_id`,`kra_monitoring`.`kra_no` AS `kra_no`,`kra_monitoring`.`kra_item` AS `kra_item`,`kra_monitoring`.`kra_mon_target` AS `kra_mon_target`,`kra_monitoring`.`kra_mon_actual` AS `kra_mon_actual`,`kra_monitoring`.`kra_mon_completion` AS `kra_mon_completion`,`kra_monitoring`.`rmks_quality` AS `rmks_quality`,`kra_monitoring`.`rmks_efficiency` AS `rmks_efficiency`,`kra_monitoring`.`rmks_timeliness` AS `rmks_timeliness`,`kra_monitoring`.`kra_mon_month` AS `kra_mon_month`,`kra_monitoring`.`date_encoded` AS `date_encoded` from `kra_monitoring` ;

-- --------------------------------------------------------

--
-- Structure for view `kra_monitoring_view_jan_dec`
--
DROP TABLE IF EXISTS `kra_monitoring_view_jan_dec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kra_monitoring_view_jan_dec`  AS  select `kra_monitoring`.`id` AS `id`,`kra_monitoring`.`kra_id` AS `kra_id`,`kra_monitoring`.`t_id` AS `t_id`,`kra_monitoring`.`kra_no` AS `kra_no`,`kra_monitoring`.`kra_item` AS `kra_item`,`kra_monitoring`.`kra_mon_target` AS `kra_mon_target`,`kra_monitoring`.`kra_mon_actual` AS `kra_mon_actual`,`kra_monitoring`.`kra_mon_completion` AS `kra_mon_completion`,`kra_monitoring`.`rmks_quality` AS `rmks_quality`,`kra_monitoring`.`rmks_efficiency` AS `rmks_efficiency`,`kra_monitoring`.`rmks_timeliness` AS `rmks_timeliness`,`kra_monitoring`.`kra_mon_month` AS `kra_mon_month`,`kra_monitoring`.`date_encoded` AS `date_encoded` from `kra_monitoring` order by field(`kra_monitoring`.`kra_mon_month`,'January','February','March','April','May','June','July','August','September','October','November','December') ;

-- --------------------------------------------------------

--
-- Structure for view `kra_monitoring_view_july_june`
--
DROP TABLE IF EXISTS `kra_monitoring_view_july_june`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kra_monitoring_view_july_june`  AS  select `kra_monitoring`.`id` AS `id`,`kra_monitoring`.`kra_id` AS `kra_id`,`kra_monitoring`.`t_id` AS `t_id`,`kra_monitoring`.`kra_no` AS `kra_no`,`kra_monitoring`.`kra_item` AS `kra_item`,`kra_monitoring`.`kra_mon_target` AS `kra_mon_target`,`kra_monitoring`.`kra_mon_actual` AS `kra_mon_actual`,`kra_monitoring`.`kra_mon_completion` AS `kra_mon_completion`,`kra_monitoring`.`rmks_quality` AS `rmks_quality`,`kra_monitoring`.`rmks_efficiency` AS `rmks_efficiency`,`kra_monitoring`.`rmks_timeliness` AS `rmks_timeliness`,`kra_monitoring`.`kra_mon_month` AS `kra_mon_month`,`kra_monitoring`.`date_encoded` AS `date_encoded` from `kra_monitoring` order by field(`kra_monitoring`.`kra_mon_month`,'July','August','September','October','November','December','January','February','March','April','May','June') ;

-- --------------------------------------------------------

--
-- Structure for view `usersview`
--
DROP TABLE IF EXISTS `usersview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usersview`  AS  select `users`.`t_id` AS `t_id`,`users`.`t_firstname` AS `t_firstname`,`users`.`t_midname` AS `t_midname`,`users`.`t_lastname` AS `t_lastname`,`users`.`t_dob` AS `t_dob`,`users`.`t_phonenumber` AS `t_phonenumber`,`users`.`t_sex` AS `t_sex`,`users`.`t_email` AS `t_email`,`users`.`t_username` AS `t_username`,`users`.`t_password` AS `t_password`,`users`.`t_registration_date` AS `t_registration_date` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `users_kra_view`
--
DROP TABLE IF EXISTS `users_kra_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_kra_view`  AS  select `users_kra`.`kra_id` AS `kra_id`,`users_kra`.`t_id` AS `t_id`,`users_kra`.`u_rp_id` AS `u_rp_id`,`users_kra`.`kra_no` AS `kra_no`,`users_kra`.`kra_items` AS `kra_items`,`users_kra`.`kra_objective` AS `kra_objective`,`users_kra`.`kra_quality` AS `kra_quality`,`users_kra`.`kra_efficiency` AS `kra_efficiency`,`users_kra`.`kra_timeliness` AS `kra_timeliness`,`users_kra`.`kra_item_percentage` AS `kra_item_percentage`,`users_kra`.`kra_target_percentage` AS `kra_target_percentage`,`users_kra`.`tot_completion` AS `tot_completion`,`users_kra`.`tot_rmks_quality` AS `tot_rmks_quality`,`users_kra`.`tot_rmks_efficiency` AS `tot_rmks_efficiency`,`users_kra`.`tot_rmks_timeliness` AS `tot_rmks_timeliness`,`users_kra`.`tot_average` AS `tot_average`,`users_kra`.`tot_score` AS `tot_score` from `users_kra` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `kra_monitoring`
--
ALTER TABLE `kra_monitoring`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kra_id` (`kra_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `kra_pi`
--
ALTER TABLE `kra_pi`
  ADD PRIMARY KEY (`pi_id`),
  ADD KEY `kra_id` (`kra_id`),
  ADD KEY `u_rp_id` (`u_rp_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users_kra`
--
ALTER TABLE `users_kra`
  ADD PRIMARY KEY (`kra_id`),
  ADD KEY `t_id` (`t_id`),
  ADD KEY `u_rp_id` (`u_rp_id`);

--
-- Indexes for table `users_rp_details`
--
ALTER TABLE `users_rp_details`
  ADD PRIMARY KEY (`u_rp_id`),
  ADD KEY `t_id` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kra_monitoring`
--
ALTER TABLE `kra_monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=412;

--
-- AUTO_INCREMENT for table `kra_pi`
--
ALTER TABLE `kra_pi`
  MODIFY `pi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2081;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `users_kra`
--
ALTER TABLE `users_kra`
  MODIFY `kra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `users_rp_details`
--
ALTER TABLE `users_rp_details`
  MODIFY `u_rp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kra_monitoring`
--
ALTER TABLE `kra_monitoring`
  ADD CONSTRAINT `kra_monitoring_ibfk_1` FOREIGN KEY (`kra_id`) REFERENCES `users_kra` (`kra_id`),
  ADD CONSTRAINT `kra_monitoring_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `users` (`t_id`);

--
-- Constraints for table `kra_pi`
--
ALTER TABLE `kra_pi`
  ADD CONSTRAINT `kra_pi_ibfk_1` FOREIGN KEY (`kra_id`) REFERENCES `users_kra` (`kra_id`),
  ADD CONSTRAINT `kra_pi_ibfk_2` FOREIGN KEY (`u_rp_id`) REFERENCES `users_rp_details` (`u_rp_id`),
  ADD CONSTRAINT `kra_pi_ibfk_3` FOREIGN KEY (`t_id`) REFERENCES `users` (`t_id`);

--
-- Constraints for table `users_kra`
--
ALTER TABLE `users_kra`
  ADD CONSTRAINT `users_kra_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `users` (`t_id`),
  ADD CONSTRAINT `users_kra_ibfk_2` FOREIGN KEY (`u_rp_id`) REFERENCES `users_rp_details` (`u_rp_id`);

--
-- Constraints for table `users_rp_details`
--
ALTER TABLE `users_rp_details`
  ADD CONSTRAINT `users_rp_details_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `users` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
