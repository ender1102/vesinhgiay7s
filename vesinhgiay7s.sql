-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.11-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for vesinhgiay7s
CREATE DATABASE IF NOT EXISTS `vesinhgiay7s` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `vesinhgiay7s`;

-- Dumping structure for table vesinhgiay7s.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table vesinhgiay7s.admin: ~1 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_name`, `admin_phone`) VALUES
	(1, 'ender', 'd41d8cd98f00b204e9800998ecf8427e', 'E N D E R', '0999686868');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table vesinhgiay7s.chitietdatdv
CREATE TABLE IF NOT EXISTS `chitietdatdv` (
  `IdDichVu` int(11) NOT NULL,
  `IdDatDV` int(11) NOT NULL,
  `SoLuongDV` int(11) NOT NULL,
  `DonGiaDV` decimal(10,0) NOT NULL,
  PRIMARY KEY (`IdDichVu`,`IdDatDV`),
  KEY `IdDichVu` (`IdDichVu`),
  KEY `FK_chitietdatdv_phieudatdv` (`IdDatDV`),
  CONSTRAINT `FK_chitietdatdv_dichvu` FOREIGN KEY (`IdDichVu`) REFERENCES `dichvu` (`IdDichVu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_chitietdatdv_phieudatdv` FOREIGN KEY (`IdDatDV`) REFERENCES `phieudatdv` (`IdDatDV`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vesinhgiay7s.chitietdatdv: ~10 rows (approximately)
DELETE FROM `chitietdatdv`;
/*!40000 ALTER TABLE `chitietdatdv` DISABLE KEYS */;
INSERT INTO `chitietdatdv` (`IdDichVu`, `IdDatDV`, `SoLuongDV`, `DonGiaDV`) VALUES
	(1, 25, 1, 55000),
	(3, 19, 3, 70000),
	(3, 26, 1, 70000),
	(5, 23, 1, 70000),
	(6, 24, 1, 50000),
	(7, 21, 1, 150000),
	(8, 26, 1, 60000),
	(10, 23, 1, 450000),
	(11, 18, 2, 600000),
	(11, 21, 2, 1200000);
/*!40000 ALTER TABLE `chitietdatdv` ENABLE KEYS */;

-- Dumping structure for table vesinhgiay7s.dichvu
CREATE TABLE IF NOT EXISTS `dichvu` (
  `IdDichVu` int(11) NOT NULL AUTO_INCREMENT,
  `TenDichVu` varchar(100) NOT NULL DEFAULT '',
  `DonGia` decimal(10,0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`IdDichVu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vesinhgiay7s.dichvu: ~11 rows (approximately)
DELETE FROM `dichvu`;
/*!40000 ALTER TABLE `dichvu` DISABLE KEYS */;
INSERT INTO `dichvu` (`IdDichVu`, `TenDichVu`, `DonGia`) VALUES
	(1, 'Vệ sinh cơ bản', 55000),
	(2, 'Vệ sinh nhanh', 70000),
	(3, 'Vệ sinh giày da', 70000),
	(4, 'Vệ sinh túi nhỏ', 50000),
	(5, 'Vệ sinh túi lớn', 70000),
	(6, 'Tẩy ố đế', 50000),
	(7, 'Repaint đế', 150000),
	(8, 'Xịt nano', 60000),
	(9, 'Khâu đế giày', 30000),
	(10, 'Dán sole 3M', 450000),
	(11, 'Dán sole Gel', 600000);
/*!40000 ALTER TABLE `dichvu` ENABLE KEYS */;

-- Dumping structure for table vesinhgiay7s.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `IdKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(100) NOT NULL,
  `SdtKH` varchar(20) NOT NULL,
  `GioiTinhKH` varchar(100) NOT NULL,
  `SinhNhatKH` date NOT NULL,
  `FbKH` varchar(100) NOT NULL,
  `TichLuyKH` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`IdKH`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Dumping data for table vesinhgiay7s.khachhang: ~5 rows (approximately)
DELETE FROM `khachhang`;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`IdKH`, `TenKH`, `SdtKH`, `GioiTinhKH`, `SinhNhatKH`, `FbKH`, `TichLuyKH`) VALUES
	(1, 'Hà Sỹ Nguyên', '0999888999', 'Nam', '1998-12-01', 'Ender', 240),
	(12, 'Hào Trần', '0999888666', 'Nam', '1999-02-01', 'Hào Trần', 21),
	(13, 'Trịnh Trí Nghĩa', '0999777777', 'Nam', '1999-03-01', 'Issac', 199),
	(20, 'Trần Thanh Phụng', '0987789789', 'Nam', '1998-10-25', 'Phụng Trần', 0),
	(21, 'Nguyễn Văn Dũng', '0321000666', 'Nam', '2000-06-25', 'Dũng', 0);
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table vesinhgiay7s.phieudatdv
CREATE TABLE IF NOT EXISTS `phieudatdv` (
  `IdDatDV` int(11) NOT NULL AUTO_INCREMENT,
  `IdKH` int(11) NOT NULL,
  `NgayGui` date NOT NULL DEFAULT current_timestamp(),
  `NgayNhan` date DEFAULT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 0,
  `TongGiaTien` decimal(10,0) NOT NULL DEFAULT 0,
  PRIMARY KEY (`IdDatDV`),
  KEY `IdKH` (`IdKH`),
  CONSTRAINT `FK_phieudatdv_khachhang` FOREIGN KEY (`IdKH`) REFERENCES `khachhang` (`IdKH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table vesinhgiay7s.phieudatdv: ~7 rows (approximately)
DELETE FROM `phieudatdv`;
/*!40000 ALTER TABLE `phieudatdv` DISABLE KEYS */;
INSERT INTO `phieudatdv` (`IdDatDV`, `IdKH`, `NgayGui`, `NgayNhan`, `TrangThai`, `TongGiaTien`) VALUES
	(18, 1, '2021-05-19', '2021-05-21', 3, 1200000),
	(19, 12, '2021-05-19', '2021-05-23', 1, 210000),
	(21, 1, '2021-05-20', '2021-05-21', 1, 1350000),
	(23, 13, '2021-05-25', '2021-05-26', 1, 520000),
	(24, 13, '2021-05-25', '2021-05-27', 0, 50000),
	(25, 21, '2021-05-26', NULL, 0, 55000),
	(26, 21, '2021-05-26', NULL, 0, 130000);
/*!40000 ALTER TABLE `phieudatdv` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
