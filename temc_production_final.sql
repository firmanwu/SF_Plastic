-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 03, 2018 at 11:50 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

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

--
-- Dumping data for table `daily_order`
--

INSERT INTO `daily_order` (`order_id`, `label`, `date`, `number`, `processed`, `notes`) VALUES
(1, 'Barco LTD', '2018-08-31', 2, 0, '<p>\r\n	Formula B</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `formula`
--

CREATE TABLE `formula` (
  `formula_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text,
  `instructions` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula`
--

INSERT INTO `formula` (`formula_id`, `name`, `description`, `instructions`) VALUES
(1, 'Formula 1', '<p>\r\n	Plastic recipient 1</p>\r\n', '<p>\r\n	Mix materials in proper order</p>\r\n'),
(3, 'Formula 2', '<p>\r\n	Plastic recipient 2</p>\r\n', '<p>\r\n	Mix materials in proper order</p>\r\n'),
(4, 'Formula 3', '<p>\r\n	Plastic recipient 3</p>\r\n', '<p>\r\n	Mix materials in proper order</p>\r\n'),
(5, 'Formula 4', '<p>\r\n	Plastic recipient 4</p>\r\n', '<p>\r\n	Mix materials in proper order</p>\r\n'),
(6, 'Formula 5', '<p>\r\n	Plastic recipient 5</p>\r\n', '<p>\r\n	Mix materials in proper order</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `formula_daily_order`
--

CREATE TABLE `formula_daily_order` (
  `formula_dorder_id` int(10) UNSIGNED NOT NULL,
  `formula_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `number` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula_daily_order`
--

INSERT INTO `formula_daily_order` (`formula_dorder_id`, `formula_id`, `order_id`, `processed`, `date`, `number`) VALUES
(1, 3, 1, 0, '2018-08-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `formula_material`
--

CREATE TABLE `formula_material` (
  `formula_material_id` int(10) UNSIGNED NOT NULL,
  `formula_id` int(10) UNSIGNED NOT NULL,
  `material_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `formula_material`
--

INSERT INTO `formula_material` (`formula_material_id`, `formula_id`, `material_id`, `unit_id`, `amount`, `sort`) VALUES
(1, 1, 1, 1, '1700.00', 1),
(2, 1, 2, 1, '200.00', 2),
(3, 1, 3, 0, '20.00', 3),
(4, 3, 5, 0, '250.00', 1),
(5, 3, 12, 0, '2000.00', 3),
(6, 3, 14, 0, '1200.00', 2),
(7, 3, 17, 0, '25.00', 4),
(8, 4, 2, 0, '1250.00', 3),
(9, 4, 6, 0, '3000.00', 1),
(10, 4, 12, 0, '980.00', 2),
(11, 5, 3, 0, '765.00', 1),
(12, 5, 4, 0, '1670.00', 2),
(13, 6, 8, 0, '545.00', 1),
(14, 6, 12, 0, '880.00', 4),
(15, 6, 15, 0, '9000.00', 3),
(16, 6, 18, 0, '55.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(64) NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `label`, `sort`) VALUES
(1, 'Material A01', 1),
(2, 'Material A02', 1),
(3, 'Material A03', 0),
(4, 'Material A04', 0),
(5, 'Material B01', 1),
(6, 'Material B02', 1),
(7, 'Material B03', 0),
(8, 'Material C01', 0),
(9, 'Material C02', 0),
(10, 'Material D01', 1),
(11, 'Material D02', 1),
(12, 'Material E01', 0),
(13, 'Material E02', 0),
(14, 'Material F01', 1),
(15, 'Material F02', 1),
(16, 'Material F03', 0),
(17, 'Material G01', 0),
(18, 'Material G02', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(10) UNSIGNED NOT NULL,
  `label` varchar(64) DEFAULT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `label`, `sort`) VALUES
(1, 'Kg', 1);

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
-- Indexes for table `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`formula_id`);

--
-- Indexes for table `formula_daily_order`
--
ALTER TABLE `formula_daily_order`
  ADD PRIMARY KEY (`formula_dorder_id`);

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
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`),
  ADD UNIQUE KEY `unit_label_uk` (`label`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formula`
--
ALTER TABLE `formula`
  MODIFY `formula_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `formula_daily_order`
--
ALTER TABLE `formula_daily_order`
  MODIFY `formula_dorder_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `formula_material`
--
ALTER TABLE `formula_material`
  MODIFY `formula_material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
