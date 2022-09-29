-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2022 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_phone` varchar(12) NOT NULL DEFAULT '000-000-0000',
  `admin_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=BAN, 1=Online',
  `isAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_pwd`, `admin_name`, `admin_phone`, `admin_status`, `isAdmin`) VALUES
(1, 'p@p.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin Petch', '000-000-0001', 1, 1),
(2, 'f@f.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin Fang', '000-000-0000', 1, 0),
(7, 'G@G.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Gadmin', '000-000-0002', 1, 1),
(8, 'H@H.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Hช่าง', '000-000-0000', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case`
--

CREATE TABLE `tbl_case` (
  `id` int(11) NOT NULL,
  `case_type` varchar(100) NOT NULL,
  `case_detail` text NOT NULL,
  `case_loc` varchar(200) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_phone` varchar(12) NOT NULL,
  `case_status` int(1) NOT NULL DEFAULT 1,
  `date_save` timestamp NOT NULL DEFAULT current_timestamp(),
  `tech_id` int(11) NOT NULL DEFAULT 0 COMMENT 'ไอดีช่าง',
  `tech_name` varchar(50) NOT NULL COMMENT 'ชื่อช่าง',
  `case_update` datetime DEFAULT NULL COMMENT 'ว/ด/ป  ที่มีการอัพเดท',
  `case_update_log` text DEFAULT NULL COMMENT 'รายละเอียดการอัพเดทงานซ่อม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_case`
--

INSERT INTO `tbl_case` (`id`, `case_type`, `case_detail`, `case_loc`, `p_name`, `p_phone`, `case_status`, `date_save`, `tech_id`, `tech_name`, `case_update`, `case_update_log`) VALUES
(1, 'ดูดล้างท่อ', 'ท่อน้ำตัน', 'ซอยซูม', 'คิม เจนนี่', '000-000-0000', 4, '2022-09-15 17:41:20', 1, 'Mr.Admin', '2022-09-16 00:43:56', 'เนื่องจากอยู่นอกเขตพื้นที่ของเทศบาล เราจะดำเนินการติดต่อให้'),
(2, 'test', 'test', 'test', 'คิม เจนนี่', '000-000-0000', 3, '2022-07-15 17:41:20', 1, 'Mr.Admin', '2022-07-16 00:43:56', 'เนื่องจากอยู่นอกเขตพื้นที่ของเทศบาล เราจะดำเนินการติดต่อให้'),
(3, '1', '1', '1', 'คิม เจนนี่', '000-000-0000', 4, '2022-09-15 17:41:20', 1, 'Mr.Admin', '2022-07-16 00:43:56', 'เนื่องจากอยู่นอกเขตพื้นที่ของเทศบาล เราจะดำเนินการติดต่อให้'),
(4, 'test2', 'test2', 'test2', 'คิม เจนนี่', '000-000-0000', 3, '2022-07-15 17:41:20', 1, 'Mr.Admin', '2022-07-16 00:43:56', 'เนื่องจากอยู่นอกเขตพื้นที่ของเทศบาล เราจะดำเนินการติดต่อให้'),
(5, 'ดูดล้างท่อ', 'ท่อน้ำตัน', 'ซอยซูม', 'คิม เจนนี่', '000-000-0000', 4, '2022-09-15 17:41:20', 1, 'Mr.Admin', '2022-09-16 00:43:56', 'เนื่องจากอยู่นอกเขตพื้นที่ของเทศบาล เราจะดำเนินการติดต่อให้'),
(6, 'ดูดล้างท่อ', 'test5555', 'test5555', 'test5555', '000-000-0000', 1, '2022-09-22 16:27:23', 0, '', NULL, NULL),
(7, 'ดูดล้างท่อ', 'ewqeq', 'weqweqweqwe', 'rwqrqrqr', '000-000-0000', 1, '2022-09-22 16:27:48', 0, '', NULL, NULL),
(8, 'ฝาท่อชำรุด', 'e23r23r', '3r23r32r', '3r23r23r', '000-000-0000', 1, '2022-09-22 16:36:08', 0, '', NULL, NULL),
(9, 'ขุดลอกลำรางระบายน้ำ', '12345', '12345', '12345', '000-000-0000', 2, '2022-09-23 03:20:18', 1, 'admin Petch', '2022-09-28 21:14:01', '-'),
(10, 'อื่นๆ', 'ทดสอบระบบ', 'ทดสอบระบบ', 'ทดสอบระบบ', '000-000-0000', 1, '2022-09-28 14:35:07', 1, 'admin Petch', '2022-09-29 00:09:58', '-'),
(11, 'ขุดลอกลำรางระบายน้ำ', 'ทดสอบ', 'ทดสอบ', 'ทดสอบ', '081-000-0000', 3, '2022-09-28 15:46:11', 1, 'admin Petch', '2022-09-29 00:02:07', '-'),
(12, 'ฝาท่อชำรุด', 'ทดสอบระบบ1234', 'ทดสอบระบบ1234', 'ทดสอบระบบ1234', '000-000-0000', 1, '2022-09-29 13:06:27', 0, '', NULL, NULL),
(13, 'ดูดล้างท่อ', 'กูเองจ้าา', 'กูเองจ้าา', 'กูเองจ้าา', '000-000-0000', 1, '2022-09-29 13:11:21', 0, '', NULL, NULL),
(14, 'ฝาท่อชำรุด', 'กูเองจ้าา', 'กูเองจ้าา', 'กูเองจ้าา', '099-999-9999', 1, '2022-09-29 13:12:53', 0, '', NULL, NULL),
(15, 'ฝาท่อชำรุด', 'กูเองจ้าา', 'กูเองจ้าา', 'กูเองจ้าา', '099-999-9999', 1, '2022-09-29 13:14:13', 0, '', NULL, NULL),
(16, 'ดูดล้างท่อ', 'test123', 'test123', 'test123', '000-000-0000', 1, '2022-09-29 13:29:39', 0, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_img`
--

CREATE TABLE `tbl_img` (
  `p_ImgId` int(11) NOT NULL,
  `case_id` int(100) NOT NULL,
  `p_img` varchar(5000) NOT NULL,
  `is_emp` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_img`
--

INSERT INTO `tbl_img` (`p_ImgId`, `case_id`, `p_img`, `is_emp`) VALUES
(14, 11, 'b940c6ac1132d1843103260f9031e66e.JPG', 0),
(15, 11, 'f52934996afef3ff0d164c7c382dd299.JPG', 0),
(16, 11, '061847ca4f772765b18275ab70279c25.JPG', 1),
(17, 11, '6b6dbdb6e18b8349b0355fd6e87651d2.JPG', 1),
(18, 11, 'ebcc88685769877363abc5b0b744418c.JPG', 1),
(19, 10, '6a10b3aec42900ee1716453f42188a50.JPG', 1),
(20, 12, 'c9dbadf4102693e0aa9747eeacde2aee.JPG', 0),
(21, 13, 'b27638032cddde53f72f87a239ccf982.JPG', 0),
(22, 14, 'ec700172decbd3aedcd78877728537b1.JPG', 0),
(23, 15, 'baf50bfaa9762ee4d9c17e85a469548a.JPG', 0),
(24, 16, '1b18e3b406c696c6c5033f3e6d161654.JPG', 0),
(25, 16, '299a205a29952707318e2553e23a37ca.JPG', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_case`
--
ALTER TABLE `tbl_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_img`
--
ALTER TABLE `tbl_img`
  ADD PRIMARY KEY (`p_ImgId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_case`
--
ALTER TABLE `tbl_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_img`
--
ALTER TABLE `tbl_img`
  MODIFY `p_ImgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
