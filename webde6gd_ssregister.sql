-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2024 at 10:52 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webde6gd_ssregister`
--

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_admin`
--

CREATE TABLE `nwt_str_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_level` int(10) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `admin_active` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `entry_by` int(10) NOT NULL,
  `del_status` int(10) NOT NULL,
  `zon_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_admin`
--

INSERT INTO `nwt_str_admin` (`admin_id`, `admin_name`, `admin_pass`, `admin_level`, `designation`, `admin_active`, `name`, `image`, `entry_by`, `del_status`, `zon_id`, `dis_id`, `loc_id`, `start_date`, `end_date`) VALUES
(1, 'admin@cogsundayschool.org', '54cd410c56d750b70dce99fbab785ded', 1, '', 1, '', '', 0, 0, 0, 0, 0, '', ''),
(2, 'vins@admin', 'c218705e7ad7ab5c7718036c4362b064', 2, 'Zone Admin', 1, 'Vins', '', 1, 0, 9, 0, 0, '2023-08-01', '2023-08-31'),
(3, 'dinuJames', 'a82e3b95523e51c93e4800aabae574bf', 3, 'District Admin', 1, 'Dinu', '', 1, 0, 9, 80, 0, '2023-08-01', '2023-09-30'),
(4, 'PraiseThomas', '2245dd38b3dadb1878a9b8f260802f2d', 4, 'Local Center Admin', 1, 'Praise Thomas', '', 1, 0, 9, 80, 4, '2023-08-24', '2023-09-30'),
(5, 'Hofficestaff@cogsundayschool.org', '12198b64e83903d0c6c8bd60c6cf81b5', 5, 'Head Office Staff', 1, 'Pr.Ashish', '', 1, 0, 0, 0, 0, '2023-08-01', '2023-09-30'),
(6, 'vins@cogsundayschool.org', 'e3d78777b3e7bc9c513207efefcb3ae8', 1, '', 1, 'Vinz', '', 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_class`
--

CREATE TABLE `nwt_str_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_class`
--

INSERT INTO `nwt_str_class` (`class_id`, `class_name`) VALUES
(1, 'Class I'),
(2, 'Class II'),
(3, 'Class III'),
(4, 'Class IV'),
(5, 'Class V'),
(6, 'Class VI'),
(7, 'Class VII'),
(8, 'Class VIII'),
(9, 'Class IX'),
(10, 'Class X'),
(11, 'Class XI'),
(12, 'Class XII');

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_district`
--

CREATE TABLE `nwt_str_district` (
  `dist_id` int(11) NOT NULL,
  `zoneId` int(11) NOT NULL,
  `dist_name` varchar(50) NOT NULL,
  `dist_status` int(10) NOT NULL,
  `del_status` int(11) NOT NULL,
  `dist_pre_name` varchar(50) NOT NULL,
  `dist_pre_phone` varchar(50) NOT NULL,
  `dist_sec_name` varchar(50) NOT NULL,
  `dist_sec_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_district`
--

INSERT INTO `nwt_str_district` (`dist_id`, `zoneId`, `dist_name`, `dist_status`, `del_status`, `dist_pre_name`, `dist_pre_phone`, `dist_sec_name`, `dist_sec_phone`) VALUES
(1, 1, 'Tiruvananthapuram', 1, 0, '', '', '', ''),
(2, 1, 'TVM North', 1, 0, '', '', '', ''),
(3, 1, 'TVM Town', 1, 0, '', '', '', ''),
(4, 1, 'TVM East', 1, 0, '', '', '', ''),
(5, 1, 'TVM South', 1, 0, '', '', '', ''),
(6, 1, 'Nedumagad South', 1, 0, '', '', '', ''),
(7, 1, 'Nedumagad North', 1, 0, '', '', '', ''),
(8, 1, 'Attingal', 1, 0, '', '', '', ''),
(9, 1, 'Kovalam', 1, 0, '', '', '', ''),
(10, 1, 'Kattakada', 1, 0, '', '', '', ''),
(11, 1, 'Kattakada South', 1, 0, '', '', '', ''),
(12, 1, 'Kattakada North', 1, 0, '', '', '', ''),
(13, 1, 'Neyyattinkara', 1, 0, '', '', '', ''),
(14, 1, 'Neyyattinkara Town', 1, 0, '', '', '', ''),
(15, 1, 'Neyyattinkara South', 1, 0, '', '', '', ''),
(16, 1, 'Neyyattinkara West', 1, 0, '', '', '', ''),
(17, 1, 'Parasala', 1, 0, '', '', '', ''),
(18, 1, 'Balaramapuram', 1, 0, '', '', '', ''),
(19, 1, 'Thirumala', 1, 0, '', '', '', ''),
(20, 1, 'Varkala', 1, 0, '', '', '', ''),
(21, 2, 'Anchel', 1, 0, '', '', '', ''),
(22, 2, 'Adoor North', 1, 0, '', '', '', ''),
(23, 2, 'AdoorTown', 1, 0, '', '', '', ''),
(24, 2, 'Adoor South', 1, 0, '', '', '', ''),
(25, 2, 'Kottarakara Town', 1, 0, '', '', '', ''),
(26, 2, 'Kottarakara South', 1, 0, '', '', '', ''),
(27, 2, 'Kottarakara North', 1, 0, '', '', '', ''),
(28, 2, 'Punalur', 1, 0, '', '', '', ''),
(29, 2, 'Edamon', 1, 0, '', '', '', ''),
(30, 2, 'Kollam', 1, 0, '', '', '', ''),
(31, 2, 'Pathanapuram', 1, 0, '', '', '', ''),
(32, 2, 'Thenmala', 1, 0, '', '', '', ''),
(33, 3, 'Tiruvalla', 1, 0, '', '', '', ''),
(34, 3, 'Tiruvalla South', 1, 0, '', '', '', ''),
(35, 3, 'Eraviperoor', 1, 0, '', '', '', ''),
(36, 3, 'Kumbanadu', 1, 0, '', '', '', ''),
(37, 3, 'Mallapally', 1, 0, '', '', '', ''),
(38, 3, 'Pandalam', 1, 0, '', '', '', ''),
(39, 3, 'Chenganoor', 1, 0, '', '', '', ''),
(40, 3, 'Mavelikara', 1, 0, '', '', '', ''),
(41, 3, 'Kattanam', 1, 0, '', '', '', ''),
(42, 4, 'Pathanamthitta', 1, 0, '', '', '', ''),
(43, 4, 'Pathanamthitta East', 1, 0, '', '', '', ''),
(44, 4, 'Payannaman', 1, 0, '', '', '', ''),
(45, 4, 'Ranny East', 1, 0, '', '', '', ''),
(46, 4, 'Ranny West', 1, 0, '', '', '', ''),
(47, 4, 'Chittar', 1, 0, '', '', '', ''),
(48, 4, 'Konni', 1, 0, '', '', '', ''),
(49, 4, 'Kozhenchery', 1, 0, '', '', '', ''),
(50, 4, 'Vechuchira', 1, 0, '', '', '', ''),
(51, 5, 'Alapuzha', 1, 0, '', '', '', ''),
(52, 5, 'Haripadu', 1, 0, '', '', '', ''),
(53, 5, 'Kayamkulam', 1, 0, '', '', '', ''),
(54, 5, 'Karunagappally', 1, 0, '', '', '', ''),
(55, 6, 'Kottayam East', 1, 0, '', '', '', ''),
(56, 6, 'Kottayam West', 1, 0, '', '', '', ''),
(57, 6, 'Kottayam Town', 1, 0, '', '', '', ''),
(58, 6, 'Pambady', 1, 0, '', '', '', ''),
(59, 6, 'Mundakayam', 1, 0, '', '', '', ''),
(60, 6, 'Karukachal', 1, 0, '', '', '', ''),
(61, 6, 'Erattupetta', 1, 0, '', '', '', ''),
(62, 6, 'Vakathanam', 1, 0, '', '', '', ''),
(63, 6, 'Thodupuzha', 1, 0, '', '', '', ''),
(64, 6, 'Melukavumattom', 1, 0, '', '', '', ''),
(65, 6, 'Pampady East', 1, 0, '', '', '', ''),
(66, 6, 'Vannapuram', 1, 0, '', '', '', ''),
(67, 7, 'Kumaly', 1, 0, '', '', '', ''),
(68, 7, 'Kattappana', 1, 0, '', '', '', ''),
(69, 7, 'Idukki', 1, 0, '', '', '', ''),
(70, 7, 'Elappara', 1, 0, '', '', '', ''),
(71, 7, 'Chappathu', 1, 0, '', '', '', ''),
(72, 7, 'Peerumedu', 1, 0, '', '', '', ''),
(73, 8, 'Kothamangalam', 1, 0, '', '', '', ''),
(74, 8, 'Muvattupuzha', 1, 0, '', '', '', ''),
(75, 8, 'Ernakulam North', 1, 0, '', '', '', ''),
(76, 8, 'Ernakulam South', 1, 0, '', '', '', ''),
(77, 8, 'Puthenkurisu', 1, 0, '', '', '', ''),
(78, 8, 'Piravam', 1, 0, '', '', '', ''),
(79, 8, 'Aluva', 1, 0, '', '', '', ''),
(80, 9, 'Thrissur', 1, 0, '', '', '', ''),
(81, 9, 'Edakkara', 1, 0, '', '', '', ''),
(82, 9, 'Nilambur', 1, 0, '', '', '', ''),
(83, 9, 'Palakkadu', 1, 0, '', '', '', ''),
(84, 9, 'Iringalakuda', 1, 0, '', '', '', ''),
(85, 9, 'Guruvayoor', 1, 0, '', '', '', ''),
(86, 9, 'Malappuram', 1, 0, '', '', '', ''),
(87, 10, 'Kozhikodu', 1, 0, '', '', '', ''),
(88, 10, 'Kannur', 1, 0, '', '', '', ''),
(89, 10, 'Iratty', 1, 0, '', '', '', ''),
(90, 10, 'Kasargod', 1, 0, '', '', '', ''),
(91, 10, 'Wayanadu', 1, 0, '', '', '', ''),
(97, 0, '', 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_local_center`
--

CREATE TABLE `nwt_str_local_center` (
  `center_id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `z_id` int(10) NOT NULL,
  `center_name` varchar(50) NOT NULL,
  `local_status` int(11) NOT NULL,
  `del_status` int(11) NOT NULL,
  `head_of_institution` varchar(50) NOT NULL,
  `head_phone` varchar(50) NOT NULL,
  `head_location_add` varchar(50) NOT NULL,
  `head_pincode` varchar(50) NOT NULL,
  `master_name` varchar(50) NOT NULL,
  `master_phone` varchar(50) NOT NULL,
  `master_add` varchar(50) NOT NULL,
  `master_pincode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_local_center`
--

INSERT INTO `nwt_str_local_center` (`center_id`, `d_id`, `z_id`, `center_name`, `local_status`, `del_status`, `head_of_institution`, `head_phone`, `head_location_add`, `head_pincode`, `master_name`, `master_phone`, `master_add`, `master_pincode`) VALUES
(1, 7, 2, 'Kunnamkulam', 1, 0, '', '', '', '', '', '', '', ''),
(2, 7, 2, 'Irinjalakkuda', 1, 0, '', '', '', '', '', '', '', ''),
(4, 80, 9, 'Cheruthuruthy', 1, 0, 'Pr.Reji T Raju', '8965326598', 'dsd', '679531', 'Praise Thomas', '986236598', 'address', '679531'),
(5, 0, 0, '', 0, 0, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_students`
--

CREATE TABLE `nwt_str_students` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) NOT NULL,
  `std_dob` varchar(50) NOT NULL,
  `std_class` varchar(50) NOT NULL,
  `std_phone` varchar(50) NOT NULL,
  `std_gender` varchar(20) NOT NULL,
  `std_medium` varchar(50) NOT NULL,
  `std_reg_no` varchar(50) NOT NULL,
  `std_id_proof` varchar(50) NOT NULL,
  `std_photo` varchar(100) NOT NULL,
  `std_zone` int(10) NOT NULL,
  `std_district` int(10) NOT NULL,
  `std_local` int(10) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `std_status` int(10) NOT NULL,
  `del_status` int(10) NOT NULL,
  `std_reg_date` varchar(50) NOT NULL,
  `reg_year` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_students`
--

INSERT INTO `nwt_str_students` (`std_id`, `std_name`, `std_dob`, `std_class`, `std_phone`, `std_gender`, `std_medium`, `std_reg_no`, `std_id_proof`, `std_photo`, `std_zone`, `std_district`, `std_local`, `entry_by`, `std_status`, `del_status`, `std_reg_date`, `reg_year`) VALUES
(1, 'JOHAAN test', '2018-02-08', '2', '', '', '', '', '234576123489', '11.jpg', 2, 7, 2, 1, 1, 0, '21-08-2023', ''),
(2, 'JUWAN', '2018-02-07', '4', '', '', '', '', '4567345689', '2.jpg', 1, 1, 0, 1, 1, 0, '21-08-2023', ''),
(3, 'Joshwa', '2018-02-21', '1', '', '', '', '', '665434567890', '3.jpg', 2, 5, 0, 1, 1, 0, '21-08-2023', ''),
(4, 'JINCY', '2016-06-08', '4', '', '', '', '', '234576123489', '4.jpg', 1, 1, 4, 2, 1, 0, '21-08-2023', ''),
(5, 'JINSON', '2014-02-21', '5', '', '', '', '', '234576123489', '5.jpg', 1, 1, 4, 3, 1, 0, '21-08-2023', ''),
(6, 'JESTO', '2014-02-07', '7', '', '', '', '', '665434567890', '6.jpg', 2, 7, 2, 5, 1, 0, '21-08-2023', ''),
(7, 'JESTY', '2015-12-29', '8', '', '', '', '', '4567345689', '7.jpg', 2, 7, 1, 1, 1, 0, '21-08-2023', ''),
(8, 'Linta', '2023-08-24', '1', '', '', '', '', '89658965', '8.jpg', 2, 7, 1, 1, 1, 0, '22-08-2023', ''),
(9, 'Dann', '2023-08-25', '11', '9447392526', 'Male', 'Malayalam', 'ST_288_1692984356', '9865326598', '9_1693308465.jpg', 9, 80, 4, 3, 1, 0, '25-08-2023', '2023'),
(10, 'Hannah', '2009-09-12', '9', '8965236598', 'Female', 'Malayalam', 'ST_131_1692984927', '89653265', '10_1693044980.jpg', 9, 80, 4, 4, 1, 0, '25-08-2023', '2023'),
(11, 'Collin', '2006-12-07', '12', '87452145', 'Male', 'Malayalam', 'ST_989_1693045250', '345678091234', '11_1693045250.jpg', 9, 80, 4, 1, 1, 0, '26-08-2023', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_teacher`
--

CREATE TABLE `nwt_str_teacher` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_reg_number` varchar(50) NOT NULL,
  `t_age` int(10) NOT NULL,
  `t_phone` varchar(50) NOT NULL,
  `t_qualification` varchar(100) NOT NULL,
  `t_job` varchar(50) NOT NULL,
  `t_class` varchar(30) NOT NULL,
  `t_gender` varchar(50) NOT NULL,
  `t_medium` varchar(20) NOT NULL,
  `T_proof` varchar(50) NOT NULL,
  `t_reg_date` varchar(50) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `t_zone` varchar(50) NOT NULL,
  `t_district` varchar(50) NOT NULL,
  `t_center` varchar(50) NOT NULL,
  `t_status` int(10) NOT NULL,
  `del_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_teacher`
--

INSERT INTO `nwt_str_teacher` (`t_id`, `t_name`, `t_reg_number`, `t_age`, `t_phone`, `t_qualification`, `t_job`, `t_class`, `t_gender`, `t_medium`, `T_proof`, `t_reg_date`, `entry_by`, `t_zone`, `t_district`, `t_center`, `t_status`, `del_status`) VALUES
(1, 'Sneha', 'TH_218_1692783072', 33, '345345', '7', 'Teacher', '2', 'Female', 'Malayalam', '45345435', '23-08-2023', 1, '9', '80', '4', 1, 0),
(2, 'Soya', 'TH_289_1692783976', 26, '', '10', 'Teacher', '1', 'Female', 'English', '10', '23-08-2023', 1, '1', '1', '4', 1, 0),
(3, 'Sooraj', 'TH_920_1692786619', 45, '7867565676', '3', 'Teacher', '7', 'Male', 'English', '', '23-08-2023', 1, '2', '5', '5', 1, 0),
(4, 'Sofia', 'TH_578_1692791035', 45, '4567876567', '3', 'Teacher', '4', 'Female', 'Malayalam', '', '23-08-2023', 1, '4', '10', '9', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_teacher_qualification`
--

CREATE TABLE `nwt_str_teacher_qualification` (
  `q_id` int(11) NOT NULL,
  `q_name` varchar(50) NOT NULL,
  `q_status` int(10) NOT NULL,
  `del_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_teacher_qualification`
--

INSERT INTO `nwt_str_teacher_qualification` (`q_id`, `q_name`, `q_status`, `del_status`) VALUES
(1, 'Msc. Computer Science', 1, 0),
(2, 'Msc.  Maths', 1, 0),
(3, 'MA English', 1, 0),
(4, 'MA. Malayalam', 1, 0),
(5, 'MA. Hindhi', 1, 0),
(6, 'Msc. Zology', 1, 0),
(7, 'Msc. Botany', 1, 0),
(8, 'Msc.Physics', 1, 0),
(9, 'Msc. Chemistry', 1, 0),
(10, 'BEd', 1, 0),
(11, 'Msc. Statistics', 1, 0),
(12, 'MEd', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nwt_str_zone`
--

CREATE TABLE `nwt_str_zone` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(50) NOT NULL,
  `zone_status` int(5) NOT NULL,
  `del_status` int(5) NOT NULL,
  `zon_pre_name` varchar(50) NOT NULL,
  `zon_pre_phone` varchar(50) NOT NULL,
  `zon_sce_name` varchar(50) NOT NULL,
  `zon_sec_phone` varchar(50) NOT NULL,
  `zon_jsce_name` varchar(50) NOT NULL,
  `zon_jsec_phone` varchar(50) NOT NULL,
  `zon_tre_name` varchar(50) NOT NULL,
  `zon_tre_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nwt_str_zone`
--

INSERT INTO `nwt_str_zone` (`zone_id`, `zone_name`, `zone_status`, `del_status`, `zon_pre_name`, `zon_pre_phone`, `zon_sce_name`, `zon_sec_phone`, `zon_jsce_name`, `zon_jsec_phone`, `zon_tre_name`, `zon_tre_phone`) VALUES
(1, 'Tiruvananthapuram', 1, 0, '', '', '', '', '', '', '', ''),
(2, 'Kottarakara', 1, 0, '', '', '', '', '', '', '', ''),
(3, 'Tiruvalla', 1, 0, '', '', '', '', '', '', '', ''),
(4, 'Pathanamthitta', 1, 0, '', '', '', '', '', '', '', ''),
(5, 'Allappuzha', 1, 0, '', '', '', '', '', '', '', ''),
(6, 'Kottayam', 1, 0, '', '', '', '', '', '', '', ''),
(7, 'High Range', 1, 0, '', '', '', '', '', '', '', ''),
(8, 'Ernakulam', 1, 0, '', '', '', '', '', '', '', ''),
(9, 'Malabar', 1, 0, '', '', '', '', '', '', '', ''),
(10, 'North Malabar', 1, 0, '', '', '', '', '', '', '', ''),
(11, '', 0, 0, '', '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nwt_str_admin`
--
ALTER TABLE `nwt_str_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `nwt_str_class`
--
ALTER TABLE `nwt_str_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `nwt_str_district`
--
ALTER TABLE `nwt_str_district`
  ADD PRIMARY KEY (`dist_id`);

--
-- Indexes for table `nwt_str_local_center`
--
ALTER TABLE `nwt_str_local_center`
  ADD PRIMARY KEY (`center_id`);

--
-- Indexes for table `nwt_str_students`
--
ALTER TABLE `nwt_str_students`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `nwt_str_teacher`
--
ALTER TABLE `nwt_str_teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `nwt_str_teacher_qualification`
--
ALTER TABLE `nwt_str_teacher_qualification`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `nwt_str_zone`
--
ALTER TABLE `nwt_str_zone`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nwt_str_admin`
--
ALTER TABLE `nwt_str_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nwt_str_class`
--
ALTER TABLE `nwt_str_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nwt_str_district`
--
ALTER TABLE `nwt_str_district`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `nwt_str_local_center`
--
ALTER TABLE `nwt_str_local_center`
  MODIFY `center_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nwt_str_students`
--
ALTER TABLE `nwt_str_students`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nwt_str_teacher`
--
ALTER TABLE `nwt_str_teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nwt_str_teacher_qualification`
--
ALTER TABLE `nwt_str_teacher_qualification`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nwt_str_zone`
--
ALTER TABLE `nwt_str_zone`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
