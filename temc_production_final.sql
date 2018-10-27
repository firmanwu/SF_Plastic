-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2018 at 05:12 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `temc_production_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_order`
--

CREATE TABLE `daily_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `number` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `notes` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `daily_order_status`
--

CREATE TABLE `daily_order_status` (
  `order_id` varchar(255) NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `material_check` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `material_weigthed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `material_info_json` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formula`
--

CREATE TABLE `formula` (
  `formula_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `totalWeight` decimal(10,2) UNSIGNED NOT NULL DEFAULT '0.00',
  `description` text,
  `instructions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula`
--

INSERT INTO `formula` (`formula_id`, `name`, `totalWeight`, `description`, `instructions`) VALUES
(1, '樹脂001', '2000.00', NULL, NULL),
(2, '樹脂002', '2000.00', NULL, NULL),
(3, '樹脂003', '2000.00', NULL, NULL),
(4, '樹脂004', '2000.00', NULL, NULL),
(5, '樹脂005', '2000.00', NULL, NULL),
(6, '樹脂006', '2000.00', NULL, NULL),
(7, '樹脂007', '2000.00', NULL, NULL),
(8, '樹脂008', '2000.00', NULL, NULL),
(9, '樹脂009', '2000.00', NULL, NULL),
(10, '樹脂010', '2000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `formula_daily_order`
--

CREATE TABLE `formula_daily_order` (
  `formula_dorder_id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `formula_id` int(10) UNSIGNED NOT NULL,
  `materialCheck` tinyint(1) NOT NULL DEFAULT '0',
  `multi_validation` json DEFAULT NULL,
  `date` date NOT NULL,
  `producedAmount` int(10) NOT NULL DEFAULT '1',
  `material_info` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula_daily_order`
--

INSERT INTO `formula_daily_order` (`formula_dorder_id`, `order_id`, `formula_id`, `materialCheck`, `multi_validation`, `date`, `producedAmount`, `material_info`) VALUES
(12, '20181011001', 1, 0, NULL, '2018-10-11', 2, NULL),
(15, '20181025003', 8, 0, NULL, '2018-10-25', 2, NULL),
(18, '20181025006', 7, 0, NULL, '2018-10-25', 3, NULL),
(61, '20181027005', 3, 0, NULL, '2018-10-28', 5, NULL),
(62, '20181027006', 1, 0, '{\"1\": {\"checked\": 99999, \"weighted\": 99999}, \"2\": {\"checked\": 99999, \"weighted\": 99999}, \"3\": {\"checked\": 99999, \"weighted\": 99999}, \"4\": {\"checked\": 99999, \"weighted\": 99999}, \"5\": {\"checked\": 99999, \"weighted\": 99999}, \"6\": {\"checked\": 99999, \"weighted\": 99999}, \"7\": {\"checked\": 99999, \"weighted\": 99999}}', '2018-10-27', 1, NULL),
(64, '20181027007', 2, 0, '{\"1\": {\"checked\": 99999, \"weighted\": 99999}, \"2\": {\"checked\": 99999, \"weighted\": 99999}, \"3\": {\"checked\": 99999, \"weighted\": 99999}, \"4\": {\"checked\": 99999, \"weighted\": 99999}, \"5\": {\"checked\": 99999, \"weighted\": 99999}, \"6\": {\"checked\": 99999, \"weighted\": 99999}, \"7\": {\"checked\": 99999, \"weighted\": 99999}}', '2018-10-27', 2, NULL),
(65, '20181027008', 9, 0, '{\"1\": {\"checked\": 99999, \"weighted\": 99999}, \"2\": {\"checked\": 99999, \"weighted\": 99999}, \"3\": {\"checked\": 99999, \"weighted\": 99999}, \"4\": {\"checked\": 99999, \"weighted\": 99999}, \"5\": {\"checked\": 99999, \"weighted\": 99999}, \"6\": {\"checked\": 99999, \"weighted\": 99999}, \"7\": {\"checked\": 99999, \"weighted\": 99999}}', '2018-10-31', 9, NULL),
(66, '20181027009', 3, 0, '{\"1\": {\"checked\": 99999, \"weighted\": 99999}, \"2\": {\"checked\": 99999, \"weighted\": 99999}, \"3\": {\"checked\": 99999, \"weighted\": 99999}, \"4\": {\"checked\": 99999, \"weighted\": 99999}, \"5\": {\"checked\": 99999, \"weighted\": 99999}, \"6\": {\"checked\": 99999, \"weighted\": 99999}, \"7\": {\"checked\": 99999, \"weighted\": 99999}}', '2018-10-31', 3, '{\"1\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"2\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"3\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"4\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"5\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"6\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}, \"7\": {\"amount\": 99999, \"weigth\": 99999, \"material_id\": 99999, \"material_name\": 99999}}');

-- --------------------------------------------------------

--
-- Table structure for table `formula_material`
--

CREATE TABLE `formula_material` (
  `formula_material_id` int(10) UNSIGNED NOT NULL,
  `formula_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `weight` decimal(10,2) UNSIGNED NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula_material`
--

INSERT INTO `formula_material` (`formula_material_id`, `formula_id`, `material_id`, `weight`, `order`) VALUES
(1, 1, 1, '1500.00', 1),
(2, 1, 2, '300.00', 2),
(3, 1, 3, '100.00', 3),
(4, 1, 4, '20.00', 4),
(5, 1, 5, '0.00', 5),
(6, 1, 6, '30.00', 6),
(7, 1, 7, '50.00', 7),
(8, 2, 1, '1500.00', 1),
(9, 2, 2, '300.00', 2),
(10, 2, 3, '100.00', 3),
(11, 2, 4, '20.00', 4),
(12, 2, 5, '0.00', 5),
(13, 2, 6, '10.00', 6),
(14, 2, 7, '70.00', 7),
(15, 3, 1, '1500.00', 1),
(16, 3, 2, '300.00', 2),
(17, 3, 3, '150.00', 3),
(18, 3, 4, '20.00', 4),
(19, 3, 5, '0.00', 5),
(20, 3, 6, '10.00', 6),
(21, 3, 7, '20.00', 7),
(22, 4, 1, '1550.00', 1),
(23, 4, 2, '300.00', 2),
(24, 4, 3, '80.00', 3),
(25, 4, 4, '15.00', 4),
(26, 4, 5, '0.00', 5),
(27, 4, 6, '10.00', 6),
(28, 4, 7, '45.00', 7),
(29, 5, 1, '1580.00', 1),
(30, 5, 2, '300.00', 2),
(31, 5, 3, '80.00', 3),
(32, 5, 4, '15.00', 4),
(33, 5, 5, '15.00', 5),
(34, 5, 6, '10.00', 6),
(35, 5, 7, '0.00', 7),
(36, 6, 1, '1600.00', 1),
(37, 6, 2, '300.00', 2),
(38, 6, 3, '80.00', 3),
(39, 6, 4, '0.00', 4),
(40, 6, 5, '10.00', 5),
(41, 6, 6, '10.00', 6),
(42, 6, 7, '0.00', 7),
(43, 7, 1, '1600.00', 1),
(44, 7, 2, '250.00', 2),
(45, 7, 3, '80.00', 3),
(46, 7, 4, '0.00', 4),
(47, 7, 5, '20.00', 5),
(48, 7, 6, '10.00', 6),
(49, 7, 7, '40.00', 7),
(50, 8, 1, '1600.00', 1),
(51, 8, 2, '250.00', 2),
(52, 8, 3, '60.00', 3),
(53, 8, 4, '0.00', 4),
(54, 8, 5, '20.00', 5),
(55, 8, 6, '0.00', 6),
(56, 8, 7, '70.00', 7),
(57, 9, 1, '1620.00', 1),
(58, 9, 2, '250.00', 2),
(59, 9, 3, '60.00', 3),
(60, 9, 4, '0.00', 4),
(61, 9, 5, '20.00', 5),
(62, 9, 6, '10.00', 6),
(63, 9, 7, '40.00', 7),
(64, 10, 1, '1620.00', 1),
(65, 10, 2, '250.00', 2),
(66, 10, 3, '60.00', 3),
(67, 10, 4, '0.00', 4),
(68, 10, 5, '20.00', 5),
(69, 10, 6, '0.00', 6),
(70, 10, 7, '50.00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `label`) VALUES
(1, '原料A'),
(2, '原料B'),
(3, '原料C'),
(4, '原料D'),
(5, '原料E'),
(6, '原料F'),
(7, '原料G');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_order`
--
ALTER TABLE `daily_order`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `order_label` (`label`);

--
-- Indexes for table `daily_order_status`
--
ALTER TABLE `daily_order_status`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`formula_id`);

--
-- Indexes for table `formula_daily_order`
--
ALTER TABLE `formula_daily_order`
  ADD PRIMARY KEY (`formula_dorder_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `formula_material`
--
ALTER TABLE `formula_material`
  ADD PRIMARY KEY (`formula_material_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD UNIQUE KEY `ingredient_label_uk` (`label`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `formula_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `formula_daily_order`
--
ALTER TABLE `formula_daily_order`
  MODIFY `formula_dorder_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `formula_material`
--
ALTER TABLE `formula_material`
  MODIFY `formula_material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_order_status`
--
ALTER TABLE `daily_order_status`
  ADD CONSTRAINT `daily_order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `formula_daily_order` (`order_id`),
  ADD CONSTRAINT `daily_order_status_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
