-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 03:57 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ccc_pre-reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `otp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `email`, `user_type`, `date_added`, `otp`) VALUES
(8, 'admin12', 'dd94709528bb1c83d08f3088d4043f4742891f4f', 'Bati-on, Kaye Asthrid E.', ' jomarioliver707@gmail.com', 'admin', '07-14-2021 \n 02:37 pm', '821445'),
(23, 'user', 'f6d053374c2f3e37c686201a40365e1250f6da11', 'Oliver Jomari', ' jomarioliver0@gmail.com', 'user', '02-24-2022 \n 02:56 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `allowed_mac_add`
--

CREATE TABLE `allowed_mac_add` (
  `id` int(11) NOT NULL,
  `mac_add` varchar(50) NOT NULL,
  `added_date` date NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allowed_mac_add`
--

INSERT INTO `allowed_mac_add` (`id`, `mac_add`, `added_date`, `added_by`) VALUES
(1, '3C-7C-3F-4F-5C-4D', '2022-07-06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `archive_pass`
--

CREATE TABLE `archive_pass` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive_pass`
--

INSERT INTO `archive_pass` (`id`, `password`) VALUES
(1, 'c129b324aee662b04eccf68babba85851346dff9');

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `name_of_auth` varchar(255) NOT NULL,
  `authorization` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `name_of_auth`, `authorization`) VALUES
(1, 'allowed_mac_add', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `course_abb` varchar(50) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `dept_id`, `course_abb`, `course_name`) VALUES
(1, 7, 'BSBA', 'Bachelor of Science in Business Administration'),
(2, 2, 'BSIT', 'Bachelor of Science in Information Technology'),
(5, 2, 'BSCS', 'Bachelor of Science in Computer Science'),
(6, 1, 'BSTEE', 'Bachelor of Science in Teacher Education Major in English'),
(7, 1, 'BSTEM', 'Bachelor of Science in Teacher Education Major in Mathematics'),
(10, 7, 'BSA', 'Bachelor of Science in Accountancy'),
(11, 7, 'BSAIS', 'Bachelor of Science in Accounting Information System'),
(12, 2, 'BSCE', 'Bachelor of Science in Computer Engineering'),
(14, 7, 'BSP', 'Bachelor of Science in Psychology');

-- --------------------------------------------------------

--
-- Stand-in structure for view `email`
-- (See below for the actual view)
--
CREATE TABLE `email` (
);

-- --------------------------------------------------------

--
-- Table structure for table `email_accounts`
--

CREATE TABLE `email_accounts` (
  `id` int(11) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `reason` varchar(250) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_accounts`
--

INSERT INTO `email_accounts` (`id`, `id_number`, `email`, `vkey`, `verified`, `pass`, `active`, `reason`, `datetime`) VALUES
(57, '2012-98986', 'jeoliver@ccc.edu.ph', '4ec3ffd3db0dcab5f181f3585859c06375cae3c8', 1, '617034', 0, '<span style=\"color:red; font-weight: strong\">Reason of Deactivation: </span>Failed', '2022-06-11 05:06:44'),
(74, '2018-11010', 'jomarioliver707@gmail.com', 'cd4339f489d81b9a26761acca4386a12c88d92be', 1, '216171', 1, '<span style=\"color:green; font-weight: strong\">Reason of Activation: </span>Test', '2022-06-11 05:19:54'),
(75, '2018-11052', 'jomarioliver0@gmail.com', '59cde233f8bcb708abb0568eb799820f4adf6ca8', 1, '722465', 1, '<span style=\"color:green; font-weight: strong\">Reason of Activation: </span>Passed', '2022-03-21 03:22:25'),
(76, '2018-11600', 'mcantioquia@ccc.edu.p', 'cde262f7f17f023f3683e1609fb0355a30e2ca87', 1, '792072', 1, 'No', '2022-03-13 15:09:23'),
(77, '2021-00001', 'ggnaposir77@gmail.com', 'f428ccd462f1a9d07126fe5ef8cfd5de849cff27', 1, '486053', 1, '<span style=\"color:green; font-weight: strong\">Reason of Activation: </span>Nothing', '2022-03-13 17:36:17'),
(78, '2021-00005', 'jomarioliver707@gmail.com', 'ef3895b29ad5a2bc7e4792d3eb8e29c47975a373', 1, '468288', 1, '<span style=\"color:green; font-weight: strong\">Reason of Activation: </span>Passed', '2022-03-15 16:53:26');

-- --------------------------------------------------------

--
-- Table structure for table `email_message`
--

CREATE TABLE `email_message` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `intro` text NOT NULL,
  `p_1` text NOT NULL,
  `p_2` text NOT NULL,
  `p_3` text NOT NULL,
  `p_4` text NOT NULL,
  `p_5` text NOT NULL,
  `p_6` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_message`
--

INSERT INTO `email_message` (`id`, `title`, `intro`, `p_1`, `p_2`, `p_3`, `p_4`, `p_5`, `p_6`, `end`) VALUES
(1, 'Pre-Registration', 'Greetings!!', 'Please follow the link below for the pre-registration for 1st Semester 2022-2023', 'please follow the proper format of your ID number.\r\n\r\nfour(4) digit year of entry, followed by dash (-), followed by the five(5) digit student code.\r\n\r\nREMEMBER THAT THERE ARE NO SPACES BETWEEN THE DIGITS OF YOUR ID NUMBER.', 'Your Verification Code is ', 'PRE-REGISTRATION IS ONLY UNTIL AUGUST 27, 2021 (FRIDAY).', '\r\n', '', 'Thank you.'),
(2, 'Late Enrolees', 'Greetings!', 'The Pre-Registration is now closed, you can contact the Registrar of City College of Calamba if you want to enroll for this Semester as you comply for their requirements.', '', '', '', '', '', 'Thank You!'),
(3, 'Freshmen', 'Hello!', 'Please follow the link below for the pre-registration for', '\r\nplease follow the proper format of your ID number. four(4) digit year of entry, followed by dash (-), followed by the five(5) digit student code. REMEMBER THAT THERE ARE NO SPACES BETWEEN THE DIGITS OF YOUR ID NUMBER.', 'PRE-REGISTRATION IS ONLY UNTIL AUGUST 27, 2021 (FRIDAY).', 'Hello', '', '', 'Thank You'),
(4, '4th Year', 'Hello', 'Your now registered and a Candidate for Graduation as of ', 'We Detect that you comply for the Pre-Registration for this Semester.', '', '', '', '', 'Thank You'),
(5, 'Pre-Registration', 'Greetings Student!', 'Please follow the link below for the pre-registration for', 'please follow the proper format of your ID number. four(4) digit year of entry, followed by dash (-), followed by the five(5) digit student code. REMEMBER THAT THERE ARE NO SPACES BETWEEN THE DIGITS OF YOUR ID NUMBER.', '', '', '', '', 'Thank You!'),
(6, 'Registration Success', 'Good Day', 'You are now Succesfully Registered as of ', 'We Detect that you comply for the Pre-Registration for this Semester.', '', '', '', '', 'Thank you!'),
(7, 'Code Reset', 'Your new Verification Code has been ready.', 'Please follow the link below for the pre-registration for 1st Semester 2022-2023.', 'This is your new Verification Code', 'Reminders: Dont forget to Change to Year Level if you need to.', '', '', '', 'Have a Good Day!');

-- --------------------------------------------------------

--
-- Table structure for table `g/p_info`
--

CREATE TABLE `g/p_info` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `f_sname` varchar(255) NOT NULL,
  `f_fname` varchar(255) NOT NULL,
  `f_mname` varchar(255) NOT NULL,
  `father_occupation` varchar(255) NOT NULL,
  `father_birthday` date NOT NULL,
  `father_contact` varchar(100) NOT NULL,
  `m_sname` varchar(255) NOT NULL,
  `m_fname` varchar(255) NOT NULL,
  `m_mname` varchar(255) NOT NULL,
  `mother_occupation` varchar(255) NOT NULL,
  `mother_birthday` date NOT NULL,
  `mother_contact` varchar(255) NOT NULL,
  `g_sname` varchar(255) NOT NULL,
  `g_fname` varchar(255) NOT NULL,
  `g_mname` varchar(255) NOT NULL,
  `g_relationship` varchar(255) NOT NULL,
  `guardian_occupation` varchar(255) NOT NULL,
  `guardian_birthday` date NOT NULL,
  `guardian_contact` varchar(100) NOT NULL,
  `guardian_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `g/p_info`
--

INSERT INTO `g/p_info` (`id`, `id_number`, `f_sname`, `f_fname`, `f_mname`, `father_occupation`, `father_birthday`, `father_contact`, `m_sname`, `m_fname`, `m_mname`, `mother_occupation`, `mother_birthday`, `mother_contact`, `g_sname`, `g_fname`, `g_mname`, `g_relationship`, `guardian_occupation`, `guardian_birthday`, `guardian_contact`, `guardian_add`) VALUES
(44, '2012-98986', 'DRAVIN', 'Jommel', 'Icon', 'Private Company employee (permanent)', '1970-12-09', '09568741596', 'PORCH', 'Jen', '', 'Deceased', '1983-01-18', '09568741596', 'DRAVIN', 'Jommel', 'Porch', 'Spouse', 'Unemployed', '1970-12-09', '09568741596', 'blk 26 lot 18, Palao, Barangay 1(Poblacion 1), Calamba'),
(52, '2018-11010', 'MARCELOA', 'Menrcado', 'Lim', 'Private Company employee (permanent)', '1969-02-05', '09656547891', 'RAMISES', 'Maria', 'Ponce', 'Government employee(contratual)', '1974-02-09', '09656547891', 'MARCELO', 'Menrcado', 'Menrcado', 'Father', 'Private Company employee (permanent)', '1969-02-05', '09656547891', 'Blk 26 Lot 20, Celestine Homes, Maring, Cabuyao'),
(53, '2018-11052', 'PING', 'Morito', 'Laopa', 'Self employed', '1975-01-15', '09991234567', 'KALICA', 'Micheel', '', 'Unemployed', '1973-07-01', '09659874566', 'KALICA', 'Micheel', '', 'Mother', 'Unemployed', '1973-07-01', '09659874566', 'blk 42 lot 12, Scorpion Strt, MCDC, Kapayapaan Ville, Canlubang, Calamba'),
(54, '2018-11600', 'ANTIOQUIA', 'Ronaldo', 'Kapulong', 'Private Company employee (permanent)', '1960-02-08', '09558459844', 'FE', 'Marie', 'Mollar', 'Private Company employee (permanent)', '1970-02-23', '09562312312', 'ANTIOQUIA', 'Ronaldo', 'Kapulong', 'Father', 'Private Company employee (permanent)', '1960-02-08', '09558459844', 'Blk 15 Lot 16, St. Joseph 4, Bigaa, Cabuyao'),
(55, '2021-00001', 'MARIANOI', 'Aldin', 'Roque', 'Government employee(permanent)', '1962-02-18', '09568459865', 'CURZ', 'Maricel', 'Nadin', 'Deceased', '1982-02-08', 'N/A', 'MARIANO', 'Aldin', 'Aldin', 'Father', 'Government employee(permanent)', '1962-02-18', '09568459865', 'Blk 21 Lot 1, Scorpion Street, Kapayapaan Ville, Canlubang, Calamba');

-- --------------------------------------------------------

--
-- Table structure for table `grad_from`
--

CREATE TABLE `grad_from` (
  `id` int(11) NOT NULL,
  `id_number` varchar(100) NOT NULL,
  `ALS` int(11) NOT NULL DEFAULT 0,
  `intermediary` varchar(200) NOT NULL,
  `inter_year_grad` varchar(50) NOT NULL,
  `inter_school_add` varchar(255) NOT NULL,
  `secondary` varchar(255) NOT NULL,
  `sec_school_add` varchar(255) NOT NULL,
  `sec_section` varchar(100) NOT NULL,
  `GWA` float NOT NULL,
  `date_grad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grad_from`
--

INSERT INTO `grad_from` (`id`, `id_number`, `ALS`, `intermediary`, `inter_year_grad`, `inter_school_add`, `secondary`, `sec_school_add`, `sec_section`, `GWA`, `date_grad`) VALUES
(52, '2012-98986', 0, 'San Ramon Elementary School', '2019', 'Sta.Cruz, Laguna', 'Kapayapaan National highschool', 'Manfil, Canlubang, Calamba', 'IV-Stem', 90, 'March 2018'),
(60, '2018-11010', 1, 'qwerqwer', '2021', 'qwerqwerqwe', '', '', '', 0, ''),
(61, '2018-11052', 0, 'San Ramon Elementary School', '2011', 'Manfil, Kapayapaan Ville, Canlubang, Calamba', 'Kapayapaan National High School', 'Manfil, Kapayapaan Ville, Canlubang, Calamba', 'IV-Stem', 90, 'March 2018'),
(62, '2018-11600', 1, '', '', '', '', '', '', 0, ''),
(63, '2021-00001', 0, 'North Marinig Elementary School', '2011', 'Pulo, Cabuyao, Laguna', 'Kapayapaan National highschool', 'Manfil, Canlubang, Calamba', 'IV-Stem', 999, 'March 2018'),
(64, '2021-00005', 1, 'Kapayapaan National High School', '2018', 'qwerqwer', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `import_studenttable`
--

CREATE TABLE `import_studenttable` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs_tbl`
--

CREATE TABLE `logs_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ip_address` varchar(50) NOT NULL,
  `device` varchar(50) NOT NULL,
  `mac_add` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs_tbl`
--

INSERT INTO `logs_tbl` (`id`, `user_id`, `action`, `date`, `ip_address`, `device`, `mac_add`) VALUES
(1, 8, 'Successful Account Login', '2022-05-30 14:29:27', '', '', ''),
(2, 8, 'Successful Account Login', '2022-05-31 12:01:43', '', '', ''),
(3, 8, 'Successful Account Login', '2022-05-31 12:08:00', '', '', ''),
(4, 8, 'Successful Account Login', '2022-06-01 12:35:58', '', '', ''),
(5, 8, 'Successful Account Login', '2022-06-01 12:41:05', '', '', ''),
(6, 8, 'Successful Account Login', '2022-06-01 12:50:45', '192.168.1.2', 'DESKTOP-56B94BV', ''),
(8, 8, 'Successful Account Login', '2022-06-01 13:09:08', '192.168.1.2', 'DESKTOP-56B94BV', 'md'),
(10, 8, 'Successful Account Login', '2022-06-01 13:10:24', '192.168.1.2', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(12, 8, 'Successful Account Login', '2022-06-01 13:19:22', '192.168.1.2', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(13, 8, 'Successfully Logout', '2022-06-01 13:21:40', '192.168.1.2', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(14, 8, 'Successful Account Login', '2022-06-01 13:21:43', '192.168.1.2', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(15, 8, 'Successful Account Login', '2022-06-06 12:37:51', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(16, 8, 'Successful Account Login', '2022-06-07 14:25:20', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(17, 8, 'Successfully Logout', '2022-06-07 14:44:32', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(18, 8, 'Successful Account Login', '2022-06-08 14:10:16', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(19, 8, 'Successful Account Login', '2022-06-09 14:32:24', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(20, 8, 'Successful Account Login', '2022-06-09 14:46:51', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(21, 8, 'Successful Account Login', '2022-06-10 14:13:47', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(22, 8, 'Successful Account Login', '2022-06-11 04:47:24', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(23, 8, 'Student ID: 2018-11010 status changed to Inactive', '2022-06-11 05:19:28', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(24, 8, 'Student ID: 2018-11010 status changed to Active', '2022-06-11 05:19:54', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(25, 8, 'Successfully Logout', '2022-06-11 05:22:34', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(26, 8, 'Successful Account Login', '2022-06-11 05:22:37', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(27, 8, 'Account Updated', '2022-06-11 06:56:54', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(28, 8, 'Account Updated', '2022-06-11 06:57:19', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(29, 8, 'Successful Account Login', '2022-06-11 07:21:34', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(30, 8, 'BSIT Course has been updated.', '2022-06-11 07:35:33', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(31, 8, 'Delete BSBA Course.', '2022-06-11 07:37:26', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(32, 8, 'Delete BSBA Course.', '2022-06-11 07:38:03', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(33, 8, 'Delete BSBA Course.', '2022-06-11 07:38:24', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(34, 8, ' has been Deleted from User Accounts.', '2022-06-11 07:50:19', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(35, 8, ' has been Deleted from User Accounts.', '2022-06-11 07:50:55', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(36, 8, ' has been Deleted from User Accounts.', '2022-06-11 07:53:24', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(37, 8, 'admin12 has been Deleted from User Accounts.', '2022-06-11 07:54:17', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(38, 8, 'Successful Account Login', '2022-06-11 08:13:43', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(39, 8, 'Successful Logged in to Archive Tables', '2022-06-11 08:14:11', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(40, 8, 'Successful Account Login', '2022-06-11 08:53:05', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(41, 8, ' General Students Report  Table Export to Excel file', '2022-06-11 08:58:48', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(42, 8, 'Successful Account Login', '2022-06-12 11:36:04', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(43, 8, 'Successful Account Login', '2022-06-13 12:44:58', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(44, 8, 'Successful Account Login', '2022-06-15 15:22:07', '127.0.0.1', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(45, 8, 'Successful Account Login', '2022-06-16 13:23:34', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(46, 8, 'Successfully Logout', '2022-06-16 13:23:40', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(47, 8, 'Successful Account Login', '2022-06-16 13:23:49', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(48, 8, 'Successfully Logout', '2022-06-16 13:23:52', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(49, 8, 'Successful Account Login', '2022-06-16 13:24:04', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(50, 8, 'Successful Account Login', '2022-06-17 15:43:22', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(51, 8, 'Successful Account Login', '2022-06-18 04:46:45', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(52, 8, 'Successful Account Login', '2022-06-18 05:45:05', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(53, 8, 'Successful Account Login', '2022-06-18 07:22:33', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(54, 8, 'Successfully Logout', '2022-06-18 07:23:04', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(55, 8, 'Successful Account Login', '2022-06-18 15:07:35', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(56, 8, ' General Students Report  Table Export to Excel file', '2022-06-18 15:07:48', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(57, 8, ' General Students Report  Table Export to Excel file', '2022-06-18 15:07:56', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(58, 8, 'Successful Account Login', '2022-06-21 14:51:25', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(59, 8, 'Successful Account Login', '2022-06-21 15:18:32', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(60, 8, 'Successful Account Login', '2022-06-21 15:20:54', '192.168.1.15', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(61, 8, 'Successful Account Login', '2022-06-26 13:40:44', '192.168.1.24', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(62, 8, 'Successful Account Login', '2022-06-26 14:19:42', '192.168.1.24', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(63, 8, 'Successful Account Login', '2022-06-27 13:07:06', '192.168.1.24', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(64, 8, 'Successful Account Login', '2022-06-28 14:30:23', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(65, 8, 'Successful Account Login', '2022-06-30 13:57:04', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(66, 8, 'Successfully Logout', '2022-06-30 13:57:58', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(67, 8, 'Successful Account Login', '2022-06-30 13:58:03', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(68, 8, 'Successful Account Login', '2022-06-30 14:01:31', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(69, 8, 'Successful Account Login', '2022-07-01 13:48:45', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(70, 8, 'Successful Account Login', '2022-07-01 14:03:52', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(71, 8, 'Successful Account Login', '2022-07-02 07:56:59', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(72, 8, 'Successful Account Login', '2022-07-02 08:38:07', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(73, 8, 'Successful Account Login', '2022-07-03 12:23:27', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(74, 8, 'Successful Account Login', '2022-07-06 12:35:25', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(75, 8, 'Switch Device Control to On', '2022-07-06 12:35:37', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(76, 8, 'Add New Davice MAC ADD = 3C-7C-3F-4F-5C-4D', '2022-07-06 12:36:05', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(77, 8, 'Successfully Logout', '2022-07-06 12:36:11', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(78, 8, 'Successful Account Login', '2022-07-06 12:36:51', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(79, 8, 'Successfully Logout', '2022-07-06 12:50:33', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(80, 8, 'Successful Account Login', '2022-07-06 12:50:37', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(81, 8, 'Successful Account Login', '2022-07-06 12:51:32', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(82, 8, 'Successful Account Login', '2022-07-06 13:14:16', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(83, 8, 'Successfully Logout', '2022-07-06 13:25:41', '192.168.1.9', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n');

-- --------------------------------------------------------

--
-- Table structure for table `program_dept`
--

CREATE TABLE `program_dept` (
  `dept_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `dept_code` varchar(50) NOT NULL,
  `dept_head` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program_dept`
--

INSERT INTO `program_dept` (`dept_id`, `department_name`, `dept_code`, `dept_head`) VALUES
(1, 'Department of Teacher Education', 'DTE', 'Gloddie Mae Du'),
(2, 'Department of Computer and Informatics', 'DCI', 'Regine Almonte'),
(7, 'Department of Business Administration', 'DBA', 'Jomari Oliver');

-- --------------------------------------------------------

--
-- Table structure for table `reg_dates`
--

CREATE TABLE `reg_dates` (
  `id` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `sy` varchar(50) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `set_by` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reg_dates`
--

INSERT INTO `reg_dates` (`id`, `semester`, `sy`, `date_start`, `date_end`, `status`, `set_by`, `date_added`) VALUES
(33, '1st', '2022-2023', '2022-02-25', '2022-02-26', '', '8', '2022-02-24 17:10:34'),
(34, '2nd', '2022-2023', '2022-04-08', '2022-04-09', '', '8', '2022-04-08 11:51:19'),
(36, '2nd', '2022-2023', '2022-06-06', '2022-06-10', '', '8', '2022-06-06 14:57:10'),
(37, '1st', '2022-2023', '2022-06-10', '2022-06-17', '', '8', '2022-06-10 14:57:59'),
(38, '2nd', '2022-2023', '2022-06-28', '2022-07-08', '', '8', '2022-06-28 14:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `year_lvl` varchar(50) NOT NULL,
  `course` varchar(100) NOT NULL,
  `program_dept` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0',
  `graduating` int(11) NOT NULL DEFAULT 0,
  `gradReason` varchar(255) NOT NULL,
  `archive` int(11) NOT NULL DEFAULT 0,
  `reg-date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `archive_year` varchar(10) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `id_number`, `year_lvl`, `course`, `program_dept`, `status`, `graduating`, `gradReason`, `archive`, `reg-date`, `archive_year`, `reason`) VALUES
(79, '2012-98986', '4', '2', '2', 'unregistered', 1, 'Passed', 0, '2022-04-08 11:30:49', '2022', 'LOA'),
(87, '2018-11010', '4', '7', '1', 'unregistered', 0, 'Failed', 0, '2022-06-28 14:39:49', '2022', 'LOA'),
(88, '2018-11052', '4', '6', '1', 'unregistered', 0, 'Falied', 0, '2022-06-10 14:59:49', '2022', 'LOA'),
(89, '2018-11600', '3', '2', '2', 'unregistered', 0, '', 0, '2022-06-10 14:59:49', '', ''),
(90, '2021-00001', '2', '1', '7', 'unregistered', 0, '', 0, '2022-06-06 15:18:42', '2022', 'Passed the Examination'),
(91, '2021-00005', '2', '6', '1', 'unregistered', 0, '', 0, '2022-02-25 11:49:43', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `midname` varchar(200) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `contact_number` varchar(100) NOT NULL,
  `house_num` varchar(255) NOT NULL,
  `st_purok` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `working` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `id_number`, `surname`, `firstname`, `midname`, `ext`, `contact_number`, `house_num`, `st_purok`, `brgy`, `city`, `birthday`, `place_of_birth`, `gender`, `working`) VALUES
(63, '2012-98986', 'DRAVIN', 'Nas Daily', 'Porch', '', '09095699898', 'Blk 26 Lot 18', 'Palao', 'Barangay 1(Poblacion 1)', 'Calamba', '1999-11-11', 'Los Banos', 'Male', 'yes'),
(71, '2018-11010', 'MARCELO', 'Marhelio', 'Ramises', '', '09563253221', 'Blk 26 Lot 20', 'Celestine Homes', 'Marinig', 'Cabuyao', '1999-11-08', 'Muntinlupa', 'Male', 'yes'),
(72, '2018-11052', 'PING', 'Lawrence', 'Kalica', '', '09556989995', 'Blk 40 LOT 14', 'Scorpion Street, Kapayapaan Ville', 'Canlubang', 'Calamba', '2000-10-08', 'Muntinlupa', 'Male', 'yes'),
(73, '2018-11600', 'ANTIOQUIA', 'Maria', 'Fe', '', '09966544445', 'Blk 15 Lot 16', 'St. Joseph 4', 'Bigaa', 'Cabuyao', '2000-01-09', 'Cabuyao', 'Female', 'no'),
(74, '2021-00001', 'MARIANOO', 'Joven', 'Cruz', '', '09950212548', 'Blk 26 Lot 200', 'Scorpion Street, Kapayapaan Ville', 'Canlubang', 'Calamba', '2001-02-17', 'Canlubang', 'Male', 'yes'),
(75, '2021-00005', 'PONCE', 'Enrile', '', '', '09569874563', 'Blk 4 LOT 1', 'St. Joseph 6', 'Barangay 2(Poblacion 2)', 'Calamba', '1995-11-16', 'Canlungan', 'Male', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `action` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `device` varchar(100) NOT NULL,
  `mac_add` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `id_number`, `action`, `date`, `device`, `mac_add`) VALUES
(1, '2012-98986', 'This Student has been added to Enrollee', '2022-06-27 13:35:33', 'PC', 'QW-EW-PO-EE-PA'),
(2, '2018-11010', 'Successful ID verification. Next step to Verification.', '2022-06-28 14:34:58', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(3, '2018-11010', 'Verification Success. Students data has been accessed.', '2022-06-28 14:35:01', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(4, '2018-11010', 'Update Year Level = 3 ', '2022-06-28 14:39:47', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(5, '2018-11010', 'Update Year Level = 4 ', '2022-06-28 14:39:49', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(6, '2018-11010', 'Update Mother`s Contact = 09656547891', '2022-06-28 14:40:59', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(7, '2018-11010', 'Update Gurdian`s Middle Name = Menrcado', '2022-06-28 14:40:59', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(8, '2018-11010', 'Update Firstname = Marhelio', '2022-06-28 14:46:45', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(9, '2018-11010', 'Update Mother`s Cccupation = Government employee(contratual)', '2022-06-28 14:54:02', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n'),
(10, '2018-11010', 'Update Father`s Surname = MARCELOA', '2022-06-28 14:59:26', 'DESKTOP-56B94BV', '3C-7C-3F-4F-5C-4D\n');

-- --------------------------------------------------------

--
-- Table structure for table `text_part`
--

CREATE TABLE `text_part` (
  `id` int(11) NOT NULL,
  `data_privacy` text NOT NULL,
  `pre_reg` text NOT NULL,
  `ty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `text_part`
--

INSERT INTO `text_part` (`id`, `data_privacy`, `pre_reg`, `ty`) VALUES
(1, 'I, certify that the information contained herein is true and correct. I understand that any wrong information, deliberately entered or not, may jeopardize my Enrollment. Furthermore, I authorized the Office of the Registrar of the City College of Calamba, as well as the other offices within the said Institution to obtain and release information (written or verbal) regarding my Personal Data which are as follows: Full Name (Including Middle Name), Address, Contact Number, Email Address, Date of Birth, Place of Birth, Grade and GWA, Course and Major taken, Previous School Attended,  Date of Graduation, Special Order No., NSTP Serial Number, Official Picture, and other Enrollment Data.The display and release of the above-mentioned data for employment/student verification, request of Batch Directory, posting for academic and non-academic achievements, and other legal purposes are permissible.   ', 'Students are required to fill out this form to be included in the Second Semester FY 2020-2021. Only Students Officially Enrolled this 1st Semester, F.Y. 2020-2021 can Register. If you are not enrolled this 1st Semester, F.Y. 2020-2021, please contact the Office of the College Registrar. Follow the Instructions carefully, failure to to do so will invalidate your pre-registration.Hello\r\n', '');

-- --------------------------------------------------------

--
-- Table structure for table `transferee`
--

CREATE TABLE `transferee` (
  `id` int(11) NOT NULL,
  `id_number` varchar(50) NOT NULL,
  `last_school_att` varchar(255) NOT NULL,
  `course_taken` varchar(255) NOT NULL,
  `sem_year` varchar(10) NOT NULL,
  `school_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transferee`
--

INSERT INTO `transferee` (`id`, `id_number`, `last_school_att`, `course_taken`, `sem_year`, `school_add`) VALUES
(28, '2012-98986', 'Harvard', 'Bachelor of Science in Teaching Education', '', 'California Red'),
(29, '2018-11052', 'Laguna College of Business and Arts', 'Bachelor of Science in Teaching Education', '', 'Baranggay 1, Calamba, Laguna');

-- --------------------------------------------------------

--
-- Structure for view `email`
--
DROP TABLE IF EXISTS `email`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `email`  AS SELECT `email_accounts`.`id` AS `id`, `email_accounts`.`id_number` AS `id_number`, `email_accounts`.`email` AS `email`, `email_accounts`.`vkey` AS `vkey`, `email_accounts`.`verified` AS `verified`, `email_accounts`.`pass` AS `pass`, `email_accounts`.`date/time` AS `date/time` FROM `email_accounts` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowed_mac_add`
--
ALTER TABLE `allowed_mac_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archive_pass`
--
ALTER TABLE `archive_pass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_accounts`
--
ALTER TABLE `email_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_message`
--
ALTER TABLE `email_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `g/p_info`
--
ALTER TABLE `g/p_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grad_from`
--
ALTER TABLE `grad_from`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_studenttable`
--
ALTER TABLE `import_studenttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs_tbl`
--
ALTER TABLE `logs_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_tbl_ibfk_1` (`user_id`);

--
-- Indexes for table `program_dept`
--
ALTER TABLE `program_dept`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `reg_dates`
--
ALTER TABLE `reg_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_logs`
--
ALTER TABLE `student_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text_part`
--
ALTER TABLE `text_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transferee`
--
ALTER TABLE `transferee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `allowed_mac_add`
--
ALTER TABLE `allowed_mac_add`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `archive_pass`
--
ALTER TABLE `archive_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `email_accounts`
--
ALTER TABLE `email_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `email_message`
--
ALTER TABLE `email_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `g/p_info`
--
ALTER TABLE `g/p_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `grad_from`
--
ALTER TABLE `grad_from`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `import_studenttable`
--
ALTER TABLE `import_studenttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `logs_tbl`
--
ALTER TABLE `logs_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `program_dept`
--
ALTER TABLE `program_dept`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reg_dates`
--
ALTER TABLE `reg_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `student_logs`
--
ALTER TABLE `student_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `text_part`
--
ALTER TABLE `text_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transferee`
--
ALTER TABLE `transferee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `logs_tbl`
--
ALTER TABLE `logs_tbl`
  ADD CONSTRAINT `logs_tbl_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
