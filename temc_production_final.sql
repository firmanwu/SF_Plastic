-- --------------------------------------------------------
-- 主機:                           localhost
-- 伺服器版本:                        10.2.13-MariaDB-log - mariadb.org binary distribution
-- 伺服器操作系統:                      Win64
-- HeidiSQL 版本:                  9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 傾印 temc_production_final 的資料庫結構
CREATE DATABASE IF NOT EXISTS `temc_production_final` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `temc_production_final`;

-- 傾印  表格 temc_production_final.daily_order 結構
CREATE TABLE IF NOT EXISTS `daily_order` (
  `order_id` int(10) unsigned NOT NULL,
  `label` varchar(64) NOT NULL,
  `date` date NOT NULL,
  `number` int(10) unsigned NOT NULL DEFAULT 1,
  `processed` tinyint(1) NOT NULL DEFAULT 0,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_label` (`label`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 正在傾印表格  temc_production_final.daily_order 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `daily_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_order` ENABLE KEYS */;

-- 傾印  表格 temc_production_final.formula 結構
CREATE TABLE IF NOT EXISTS `formula` (
  `formula_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `totalWeight` decimal(10,2) unsigned NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `instructions` text DEFAULT NULL,
  PRIMARY KEY (`formula_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- 正在傾印表格  temc_production_final.formula 的資料：~10 rows (大約)
/*!40000 ALTER TABLE `formula` DISABLE KEYS */;
REPLACE INTO `formula` (`formula_id`, `name`, `totalWeight`, `description`, `instructions`) VALUES
	(1, '樹脂001', 2000.00, NULL, NULL),
	(2, '樹脂002', 2000.00, NULL, NULL),
	(3, '樹脂003', 2000.00, NULL, NULL),
	(4, '樹脂004', 2000.00, NULL, NULL),
	(5, '樹脂005', 2000.00, NULL, NULL),
	(6, '樹脂006', 2000.00, NULL, NULL),
	(7, '樹脂007', 2000.00, NULL, NULL),
	(8, '樹脂008', 2000.00, NULL, NULL),
	(9, '樹脂009', 2000.00, NULL, NULL),
	(10, '樹脂010', 2000.00, NULL, NULL);
/*!40000 ALTER TABLE `formula` ENABLE KEYS */;

-- 傾印  表格 temc_production_final.formula_daily_order 結構
CREATE TABLE IF NOT EXISTS `formula_daily_order` (
  `formula_dorder_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `formula_id` int(10) unsigned NOT NULL,
  `materialCheck` tinyint(1) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `producedAmount` int(10) NOT NULL DEFAULT 1,
  PRIMARY KEY (`formula_dorder_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- 正在傾印表格  temc_production_final.formula_daily_order 的資料：~0 rows (大約)
/*!40000 ALTER TABLE `formula_daily_order` DISABLE KEYS */;
/*!40000 ALTER TABLE `formula_daily_order` ENABLE KEYS */;

-- 傾印  表格 temc_production_final.formula_material 結構
CREATE TABLE IF NOT EXISTS `formula_material` (
  `formula_material_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `formula_id` int(10) unsigned NOT NULL,
  `material_id` int(10) unsigned NOT NULL,
  `weight` decimal(10,2) unsigned NOT NULL,
  `order` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`formula_material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- 正在傾印表格  temc_production_final.formula_material 的資料：~62 rows (大約)
/*!40000 ALTER TABLE `formula_material` DISABLE KEYS */;
REPLACE INTO `formula_material` (`formula_material_id`, `formula_id`, `material_id`, `weight`, `order`) VALUES
	(1, 1, 1, 1500.00, 1),
	(2, 1, 2, 300.00, 2),
	(3, 1, 3, 100.00, 3),
	(4, 1, 4, 20.00, 4),
	(5, 1, 5, 0.00, 5),
	(6, 1, 6, 30.00, 6),
	(7, 1, 7, 50.00, 7),
	(8, 2, 1, 1500.00, 1),
	(9, 2, 2, 300.00, 2),
	(10, 2, 3, 100.00, 3),
	(11, 2, 4, 20.00, 4),
	(12, 2, 5, 0.00, 5),
	(13, 2, 6, 10.00, 6),
	(14, 2, 7, 70.00, 7),
	(15, 3, 1, 1500.00, 1),
	(16, 3, 2, 300.00, 2),
	(17, 3, 3, 150.00, 3),
	(18, 3, 4, 20.00, 4),
	(19, 3, 5, 0.00, 5),
	(20, 3, 6, 10.00, 6),
	(21, 3, 7, 20.00, 7),
	(22, 4, 1, 1550.00, 1),
	(23, 4, 2, 300.00, 2),
	(24, 4, 3, 80.00, 3),
	(25, 4, 4, 15.00, 4),
	(26, 4, 5, 0.00, 5),
	(27, 4, 6, 10.00, 6),
	(28, 4, 7, 45.00, 7),
	(29, 5, 1, 1580.00, 1),
	(30, 5, 2, 300.00, 2),
	(31, 5, 3, 80.00, 3),
	(32, 5, 4, 15.00, 4),
	(33, 5, 5, 15.00, 5),
	(34, 5, 6, 10.00, 6),
	(35, 5, 7, 0.00, 7),
	(36, 6, 1, 1600.00, 1),
	(37, 6, 2, 300.00, 2),
	(38, 6, 3, 80.00, 3),
	(39, 6, 4, 0.00, 4),
	(40, 6, 5, 10.00, 5),
	(41, 6, 6, 10.00, 6),
	(42, 6, 7, 0.00, 7),
	(43, 7, 1, 1600.00, 1),
	(44, 7, 2, 250.00, 2),
	(45, 7, 3, 80.00, 3),
	(46, 7, 4, 0.00, 4),
	(47, 7, 5, 20.00, 5),
	(48, 7, 6, 10.00, 6),
	(49, 7, 7, 40.00, 7),
	(50, 8, 1, 1600.00, 1),
	(51, 8, 2, 250.00, 2),
	(52, 8, 3, 60.00, 3),
	(53, 8, 4, 0.00, 4),
	(54, 8, 5, 20.00, 5),
	(55, 8, 6, 0.00, 6),
	(56, 8, 7, 70.00, 7),
	(57, 9, 1, 1620.00, 1),
	(58, 9, 2, 250.00, 2),
	(59, 9, 3, 60.00, 3),
	(60, 9, 4, 0.00, 4),
	(61, 9, 5, 20.00, 5),
	(62, 9, 6, 10.00, 6),
	(63, 9, 7, 40.00, 7),
	(64, 10, 1, 1620.00, 1),
	(65, 10, 2, 250.00, 2),
	(66, 10, 3, 60.00, 3),
	(67, 10, 4, 0.00, 4),
	(68, 10, 5, 20.00, 5),
	(69, 10, 6, 0.00, 6),
	(70, 10, 7, 50.00, 7);
/*!40000 ALTER TABLE `formula_material` ENABLE KEYS */;

-- 傾印  表格 temc_production_final.material 結構
CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(64) NOT NULL,
  PRIMARY KEY (`material_id`),
  UNIQUE KEY `ingredient_label_uk` (`label`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- 正在傾印表格  temc_production_final.material 的資料：~7 rows (大約)
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
REPLACE INTO `material` (`material_id`, `label`) VALUES
	(1, '原料A'),
	(2, '原料B'),
	(3, '原料C'),
	(4, '原料D'),
	(5, '原料E'),
	(6, '原料F'),
	(7, '原料G');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
