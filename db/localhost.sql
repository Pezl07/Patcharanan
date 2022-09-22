-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2020 at 02:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_helpdesk`
--
CREATE DATABASE IF NOT EXISTS `project_helpdesk` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_helpdesk`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_status` int(1) NOT NULL DEFAULT 1 COMMENT '0=BAN, 1=Online'
  `admin_position` int(1) NOT NULL DEFAULT 0 COMMENT '0=person, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_email`, `admin_pwd`, `admin_name`, `admin_status`) VALUES
(1, 'a@a.com', 'c58a03e5842fa1ad52d6781faaf0921bf039c2f0', 'Mr.Admin', 1),
(3, 'c@c.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Mr. CC นะจ้ะ aaaa', 0),
(4, 'd@d.com', '011c945f30ce2cbafc452f39840f025693339c42', 'Mr. ดีดี ดีจ้ะ a', 1),
(5, 'p@p.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Mr. P P', 1);

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
  `p_email` varchar(50) NOT NULL,
  `p_img` varchar(50) NOT NULL,
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

INSERT INTO `tbl_case` (`id`, `case_type`, `case_detail`, `case_loc`, `p_name`, `p_email`, `p_img`, `case_status`, `date_save`, `tech_id`, `tech_name`, `case_update`, `case_update_log`) VALUES
(1, 'อุปกรณ์ไอที', 'ทดสอบระบบ', 'ทดสอบระบบ', 'ทดสอบระบบ', 'aaa@g.com', 'b95a13fe95aac89726f1611666ded1fa.png', 2, '2020-09-09 12:21:36', 1, 'Mr.Admin', '2020-09-09 19:25:55', 'aaaa');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_case`
--
ALTER TABLE `tbl_case`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
