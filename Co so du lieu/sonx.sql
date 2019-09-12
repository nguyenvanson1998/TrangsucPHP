-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 10:57 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quynh`
--
CREATE DATABASE IF NOT EXISTS `quynh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `quynh`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `UserName` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`UserName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`UserName`, `Password`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `ctdd`
--

CREATE TABLE IF NOT EXISTS `ctdd` (
  `MaDD` int(11) NOT NULL DEFAULT '0',
  `MaSP` int(11) NOT NULL DEFAULT '0',
  `SoLuong` int(11) NOT NULL DEFAULT '0',
  `Gia` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaDD`,`MaSP`),
  KEY `MaSP` (`MaSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctdd`
--

INSERT INTO `ctdd` (`MaDD`, `MaSP`, `SoLuong`, `Gia`) VALUES
(15, 17, 1, 700000),
(16, 20, 1, 700000),
(16, 42, 1, 2330000),
(14, 19, 1, 340000),
(14, 20, 2, 700000),
(12, 20, 1, 700000),
(13, 19, 1, 340000),
(10, 11, 1, 75000),
(10, 10, 9, 35000),
(17, 42, 1, 2330000);

-- --------------------------------------------------------

--
-- Table structure for table `ctlsp`
--

CREATE TABLE IF NOT EXISTS `ctlsp` (
  `MaLoaiSP` int(11) NOT NULL DEFAULT '0',
  `MaSP` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaLoaiSP`,`MaSP`),
  KEY `MaSP` (`MaSP`),
  KEY `MaLoaiSP` (`MaLoaiSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctlsp`
--

INSERT INTO `ctlsp` (`MaLoaiSP`, `MaSP`) VALUES
(1, 11),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(2, 10),
(2, 19),
(2, 21),
(2, 22),
(2, 23),
(3, 24),
(3, 25),
(7, 6),
(7, 26),
(7, 27),
(7, 28),
(7, 29),
(8, 6),
(8, 20),
(8, 30),
(8, 31),
(8, 32),
(10, 33),
(10, 34),
(10, 35),
(10, 36),
(11, 37),
(11, 38),
(12, 39),
(12, 40),
(12, 41),
(12, 42);

-- --------------------------------------------------------

--
-- Table structure for table `dondat`
--

CREATE TABLE IF NOT EXISTS `dondat` (
  `MaDD` int(11) NOT NULL AUTO_INCREMENT,
  `MaKhach` int(11) NOT NULL DEFAULT '0',
  `NgayDat` date NOT NULL DEFAULT '0000-00-00',
  `MaVC` int(11) NOT NULL DEFAULT '0',
  `MaPTTT` int(11) NOT NULL DEFAULT '0',
  `NguoiDat` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CongTy` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `SDT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Fax` int(11) NOT NULL DEFAULT '0',
  `DiaChi` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `NgayNhan` date NOT NULL DEFAULT '0000-00-00',
  `TrangThai` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`MaDD`),
  KEY `MaKhach` (`MaKhach`),
  KEY `MaVC` (`MaVC`),
  KEY `MaPTTT` (`MaPTTT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `dondat`
--

INSERT INTO `dondat` (`MaDD`, `MaKhach`, `NgayDat`, `MaVC`, `MaPTTT`, `NguoiDat`, `Email`, `CongTy`, `SDT`, `Fax`, `DiaChi`, `NgayNhan`, `TrangThai`) VALUES
(14, 4, '2010-10-16', 1, 1, 'DinhNhu Quynh', 'tieu_thu_mat_nam@yahoo.com', 'Quoc Tuan', '1234567', 2132145, '12 Nguyen trai', '0000-00-00', 0),
(12, 4, '2010-10-07', 1, 1, 'DinhNhu Quynh', 'tieu_thu_mat_nam@yahoo.com', 'Quoc Toan', '1234567', 2132145, '12 Nguyen trai', '2010-10-07', 1),
(13, 4, '2010-10-08', 1, 1, 'DinhNhu Quynh', 'tieu_thu_mat_nam@yahoo.com', 'Quoc Toan', '1234567', 2132145, '12 Nguyen trai', '0000-00-00', 2),
(10, 1, '2009-10-28', 1, 1, 'PhamTruong', 'phamanhtruong@gmail.com', 'sadasd', '12312312', 12312313, 'adfaf', '2009-10-31', 2),
(15, 4, '2010-10-16', 1, 1, 'DinhNhu Quynh', 'tieu_thu_mat_nam@yahoo.com', 'Quoc Tuan', '1234567', 2132145, '12 Nguyen trai', '0000-00-00', 0),
(16, 4, '2010-10-17', 1, 1, 'Hoan dieu Linh', 'sakura@yahoo.com', 'Quoc Tuan', '1234567', 2132145, '12 Nguyen trai', '0000-00-00', 0),
(17, 7, '2017-04-19', 1, 1, 'khachhang', 'khach@gmail.com', '123', '123', 134, 'hanoi', '2017-04-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKhach` int(11) NOT NULL AUTO_INCREMENT,
  `NgayDK` date NOT NULL DEFAULT '0000-00-00',
  `TaiKhoan` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MatKhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Ho` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Ten` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `NgaySinh` date DEFAULT NULL,
  `CongTy` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDT` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoFax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThanhPho` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DiaChi` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `TrangThai` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaKhach`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhach`, `NgayDK`, `TaiKhoan`, `MatKhau`, `Email`, `Ho`, `Ten`, `NgaySinh`, `CongTy`, `SoDT`, `SoFax`, `ThanhPho`, `DiaChi`, `GioiTinh`, `TrangThai`) VALUES
(6, '2010-10-08', 'VietHung', 'e10adc3949ba59abbe56e057f20f883e', 'viethung@yahoo.com', 'Viet', 'Hung Hai', '1987-10-08', 'CÃºc chi', '12123214', '12324355', 'Báº¯c Giang', 'Thanh xuÃ¢n', 0, 1),
(4, '2010-10-06', 'nhuquynh', 'e10adc3949ba59abbe56e057f20f883e', 'tieu_thu_mat_nam@yahoo.com', 'Dinh', 'Nhu Quynh', '2010-10-06', 'Quoc Tuan', '1234567', '2132145', 'HÃ  Ná»™i', '12 Nguyen trai', 1, 1),
(7, '2017-04-19', 'khachhang', 'e10adc3949ba59abbe56e057f20f883e', 'khach@gmail.com', 'khach', 'hang', '0000-00-00', '123', '123', '134', 'HÃ  Ná»™i', 'hanoi', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE IF NOT EXISTS `loaisp` (
  `MaLoaiSP` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSP` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MoTa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`MaLoaiSP`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`MaLoaiSP`, `TenLoaiSP`, `MoTa`, `TrangThai`) VALUES
(1, 'Nháº«n nam', 'LÃ  kiá»ƒu nháº«n dÃ nh cho nam ', 1),
(2, 'Nháº«n ná»¯', 'LÃ  kiá»ƒu nháº«n dÃ nh cho ná»¯', 1),
(3, 'Nháº«n cÆ°á»›i', 'LÃ  cáº·p nháº«n dÃ nh cho vá»£ chá»“ng', 1),
(7, 'Nháº«n Ä‘Ã´i', 'LÃ  cáº·p nháº«n dÃ nh cho cÃ¡c Ä‘Ã´i Ä‘ang yÃªu', 1),
(8, 'DÃ¢y chuyá»n', 'LÃ  vÃ²ng cá»• dÃ nh cho cáº£ nam vÃ  ná»¯', 1),
(9, 'Hoa tai', 'LÃ  cÃ¡c kiá»ƒu khuyÃªn tai', 0),
(10, 'VÃ²ng tay', 'LÃ  kiá»ƒu vÃ²ng tay', 1),
(11, 'Láº¯c tay', 'LÃ  kiá»ƒu láº¯c tay', 1),
(12, 'Láº¯c chÃ¢n', 'LÃ  kiá»ƒu láº¯c chÃ¢n', 1),
(13, 'Trang suc bo', 'Bo trang suc gom nhan, vong co va vong tay', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loaitt`
--

CREATE TABLE IF NOT EXISTS `loaitt` (
  `MaLTT` int(11) NOT NULL AUTO_INCREMENT,
  `TenLTT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MoTa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`MaLTT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `loaitt`
--

INSERT INTO `loaitt` (`MaLTT`, `TenLTT`, `MoTa`, `TrangThai`) VALUES
(1, 'Tin Thá»‹ TrÆ°á»ng', 'Tin tá»©c hÃ ng ngÃ y vá» thá»‹ trÆ°á»ng vÃ ng vÃ  trang sá»©c trong nÆ°á»›c', 1),
(2, 'Tin cÃ´ng ty', 'Tin tá»©c liÃªn quan tá»›i cÃ¡c hoáº¡t Ä‘á»™ng cÃ´ng ty', 1),
(5, 'Kiáº¿n thá»©c kim hoÃ n', 'Má»™t sá»‘ bÃ i viáº¿t liÃªn quan tá»›i trang sá»©c', 1),
(6, 'Cáº©m nang mÃ¹a cÆ°á»›i', 'Ã nghÄ©a vá» nháº«n cÆ°á»›i', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nsx`
--

CREATE TABLE IF NOT EXISTS `nsx` (
  `NSXId` int(11) NOT NULL AUTO_INCREMENT,
  `NSXName` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SoDT` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`NSXId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `nsx`
--

INSERT INTO `nsx` (`NSXId`, `NSXName`, `DiaChi`, `SoDT`) VALUES
(1, 'PNJ', '15 TrÃ ng Tiá»n, HÃ  Ná»™i', '121244124'),
(2, 'JPK', '17 Huá»³nh ThÃºc KhÃ¡ng, HÃ  Ná»™i', '564565656'),
(3, 'Godivan', 'TP. Háº£i DÆ°Æ¡ng', '0213213123'),
(4, 'Ross-Simons', 'Canada', '800-835-0919');

-- --------------------------------------------------------

--
-- Table structure for table `pttt`
--

CREATE TABLE IF NOT EXISTS `pttt` (
  `MaPTTT` int(11) NOT NULL AUTO_INCREMENT,
  `TenPTTT` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `TrangThai` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`MaPTTT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pttt`
--

INSERT INTO `pttt` (`MaPTTT`, `TenPTTT`, `TrangThai`) VALUES
(1, 'Thanh toÃ¡n báº±ng tiá»n máº·t', 1),
(2, 'Thanh toÃ¡n báº±ng tháº» chuyá»ƒn tiá»n', 1),
(3, 'Thanh toÃ¡n báº±ng chuyá»ƒn khoáº£n', 1),
(5, 'Thanh toÃ¡n qua Western Union', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ptvc`
--

CREATE TABLE IF NOT EXISTS `ptvc` (
  `MaVC` int(11) NOT NULL AUTO_INCREMENT,
  `TenVC` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MoTa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`MaVC`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ptvc`
--

INSERT INTO `ptvc` (`MaVC`, `TenVC`, `MoTa`, `TrangThai`) VALUES
(1, 'Váº­n chuyá»ƒn nhanh ná»™i thÃ nh', 'Chuyá»ƒn trong ngÃ y vá»›i khoáº£ng cÃ¡ch < 10Km', 1),
(2, 'Váº­n chuyá»ƒn theo ngÃ y Ä‘á»‹nh ná»™i thÃ nh', 'Chuyá»ƒn theo ngÃ y khÃ¡ch hÃ ng Ä‘á»‹nh vá»›i khoáº£ng cÃ¡ch < 10Km', 1),
(3, 'Váº­n chuyá»ƒn nhanh ngoáº¡i thÃ nh', 'Chuyá»ƒn trong ngÃ y vá»›i khoáº£ng cÃ¡ch > 10Km', 1),
(5, 'Váº­n chuyá»ƒn theo ngÃ y Ä‘á»‹nh ngoáº¡i thÃ nh', 'Váº­n chuyá»ƒn theo ngÃ y khÃ¡ch hÃ ng Ä‘inh sáºµn vÆ¡i khoáº£ng cÃ¡ch > 10Km', 0);

-- --------------------------------------------------------

--
-- Table structure for table `qc`
--

CREATE TABLE IF NOT EXISTS `qc` (
  `QCId` int(11) NOT NULL AUTO_INCREMENT,
  `TenCT` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Anh` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Link` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrangThai` tinyint(1) unsigned DEFAULT '1',
  PRIMARY KEY (`QCId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `qc`
--

INSERT INTO `qc` (`QCId`, `TenCT`, `Anh`, `Link`, `TrangThai`) VALUES
(1, 'Äiá»‡n thoáº¡i right', 'Milestone.jpg', 'aptech.vn', 1),
(3, '5 lÃ½ do left', 'ptj.gif', 'http://dantri.com', 0),
(4, 'KhÃ¡ch sáº¡n ngoc lan left', 'quangcao.jpg', 'http://24h.com.vn/', 1),
(11, 'abcright', 'banner80.gif', '123.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE IF NOT EXISTS `sanpham` (
  `MaSP` int(11) NOT NULL AUTO_INCREMENT,
  `NSXId` int(11) NOT NULL DEFAULT '0',
  `TenSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `MoTa` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySX` date DEFAULT NULL,
  `Anh` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Gia` int(11) NOT NULL DEFAULT '0',
  `SoLuong` int(11) NOT NULL DEFAULT '0',
  `HamLuong` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TrongLuong` float NOT NULL DEFAULT '0',
  `TrangThai` tinyint(2) unsigned DEFAULT '1',
  PRIMARY KEY (`MaSP`),
  KEY `NSXId` (`NSXId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=43 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `NSXId`, `TenSP`, `MoTa`, `NgaySX`, `Anh`, `Gia`, `SoLuong`, `HamLuong`, `TrongLuong`, `TrangThai`) VALUES
(18, 1, 'Nhan nam NNLW501', 'Nháº«n nam l&agrave;m tá»« v&agrave;ng tráº¯ng 14k<br />', '2010-09-29', 'NNLWM502.jpg', 7856700, 2, 'VÃ ng tráº¯ng', 2.5, 0),
(19, 3, 'Nhan nu NÆ¯ 320', 'Nháº«n ná»¯ l&agrave;m tá»« báº¡c 925 máº·t tr&aacute;i tim<br />', '2010-09-28', 'NhannuLW301.jpg', 340000, 4, 'Báº¡c', 1.1, 0),
(20, 1, 'DÃ¢y Chuyá»n DC12', 'D&acirc;y chuyá»n l&agrave;m tá»« báº¡c 912, c&oacute; máº·t tr&ograve;n Ä‘&iacute;nh Ä‘&aacute;<br />', '2010-10-01', 'DTLW228.jpg', 700000, 3, 'Báº¡c', 1.2, 0),
(17, 2, 'Nhan nam NN300', 'Nháº«n nam l&agrave;m báº±ng báº¡c 925 <br />', '2010-09-29', 'NNLW310.jpg', 700000, 2, 'Báº¡c', 2.5, 0),
(15, 1, 'Nhan nam NN305', 'Nháº«n nam báº±ng báº¡c 925 c&oacute; kháº¯c há»a tiáº¿t<br />', '2010-09-29', 'NNLW305.jpg', 750000, 3, 'Báº¡c', 2.5, 0),
(16, 1, 'Nhan nam NN302', 'Nháº«n nam báº¡c 925 c&oacute; gáº¯n Ä‘&aacute; c&ocirc;ng nghiá»‡p USA<br />', '2010-09-29', 'NNLW304.jpg', 695000, 2, 'Báº¡c', 3.5, 0),
(21, 3, 'Nháº«n Ná»¯ NN12', 'Nháº«n Ä‘Æ°á»£c l&agrave;m tá»« báº¡c 925 c&oacute; Ä‘&iacute;nh Ä‘&aacute; tráº¯ng cá»§a &yacute;<br />', '2010-10-12', 'NhannuLW302.jpg', 325000, 4, 'Báº¡c', 1.1, 0),
(22, 2, 'Nháº«n Ná»¯ NN14', 'Nháº«n ná»¯ l&agrave;m tá»« v&agrave;ng t&acirc;y 14K c&oacute; gáº¯ng Ä‘&aacute; rubi Ä‘á»<br />', '2010-10-17', 'NhannuVTLWM402.jpg', 3950000, 5, 'VÃ ng Ã 14K', 1.32, 0),
(23, 4, 'Nháº«n Ná»¯ NN15', 'Nháº«n ná»¯ l&agrave;m tá»« v&agrave;ng &yacute; 18K c&oacute; gáº¯n má»™t vi&ecirc;n kim cÆ°Æ¡ng 12 kara<br />', '2010-10-17', 'NhannuVTLWM401.jpg', 5780000, 3, 'VÃ ng Ã 18K', 1.35, 0),
(24, 1, 'NhÃ£n CÆ°á»›i NC14', 'Nháº«n cÆ°á»›i l&agrave;m tá»« v&agrave;ng &yacute; 14 K c&oacute; gáº¯ng Ä‘&aacute; c&ocirc;ng nghiá»‡p Má»¹<br />', '2010-10-17', 'NCVT201.jpg', 3900000, 3, 'VÃ ng Ã 14K', 1.3, 0),
(25, 2, 'NhÃ£n CÆ°á»›i NC15', 'Nháº«n cÆ°á»›i l&agrave;m tá»« v&agrave;ng &yacute; 18K c&oacute; gáº¯n kim cÆ°Æ¡ng<br />', '2010-10-17', 'NCVT203.jpg', 5400000, 1, 'VÃ ng Ã 18K', 1.9, 0),
(26, 3, 'NhÃ£n ÄÃ´i NÄ4', 'Nháº«n Ä‘&ocirc;i Ä‘Æ°á»£c l&agrave;m báº±ng báº¡c th&aacute;i c&oacute; gáº¯n 5 Ä‘&aacute; c&ocirc;ng nghiá»‡p Má»¹<br />', '2010-10-17', 'ND205.jpg', 1200000, 2, 'Báº¡c ThÃ¡i', 1.9, 0),
(27, 1, 'NhÃ£n ÄÃ´i NÄ5', 'Nháº«n Ä‘&ocirc;i báº±ng báº¡c &yacute; Ä‘Æ°á»£c tráº¡m kháº¯c h&igrave;n con c&aacute;<br />', '2010-10-17', 'ND204.jpg', 1500000, 3, 'Báº¡c Ã', 1.9, 0),
(28, 3, 'NhÃ£n ÄÃ´i NÄ6', 'Nháº«n Ä‘&ocirc;i l&agrave;m tá»« v&agrave;ng tráº¯ng c&oacute; gáº¯n Ä‘&aacute; c&ocirc;ng nghiá»‡p<br />', '2010-10-17', 'NVTR509.jpg', 3500000, 1, 'VÃ ng tráº¯ng', 1.3, 0),
(29, 4, 'NhÃ£n ÄÃ´i NÄ7', 'Nháº«n Ä‘&ocirc;i l&agrave;m tá»« báº¡c Th&aacute;i c&oacute; váº±n<br />', '2010-10-17', 'ND202.jpg', 560000, 4, 'Báº¡c ThÃ¡i', 1.2, 0),
(30, 2, 'DÃ¢y Chuyá»n DC123', 'D&acirc;y truyá»n l&agrave;m tá»« v&agrave;ng tráº¯ng &yacute; 18K <br />', '2010-10-12', 'DTLW229.jpg', 13000000, 5, 'VÃ ng tráº¯ng Ã 18K', 3.95, 0),
(31, 3, 'DÃ¢y Chuyá»n DC124', 'D&acirc;y chuyá»n l&agrave;m tá»« v&agrave;ng &yacute; 14k c&oacute; táº¡o h&igrave;nh giá»t nÆ°á»›c<br />', '2010-10-12', 'DTLW211.jpg', 9000000, 3, 'VÃ ng Ã 14K', 3, 0),
(32, 2, 'DÃ¢y Chuyá»n DC125', 'D&acirc;y chuyá»n l&agrave;m tá»« báº¡c th&aacute;i c&oacute; dáº¡ng x&iacute;ch<br />', '2010-10-17', 'DTLW205.jpg', 1200000, 4, 'Báº¡c ThÃ¡i', 2.1, 0),
(33, 1, 'VÃ²ng tay VT111', 'V&ograve;ng tay l&agrave;m tá»« báº¡c 925 c&oacute; thá»ƒ má»Ÿ.<br />', '2010-10-17', 'VTLW201.jpg', 850000, 4, 'Báº¡c', 4, 0),
(34, 1, 'VÃ²ng tay VT112', 'V&ograve;ng tay l&agrave;m báº±ng v&agrave;ng &yacute; 14K c&oacute; gáº¯n Ä‘&aacute; <br />', '2010-10-17', 'VTLW214.jpg', 9000000, 4, 'VÃ ng Ã 14K', 3, 0),
(35, 4, 'VÃ²ng tay VT114', 'V&ograve;ng tay l&agrave;m tá»« v&agrave;ng &yacute; 18 k c&oacute; máº·t h&igrave;nh b&ocirc;ng hoa<br />', '2010-10-12', 'VTLW213.jpg', 8550000, 5, 'VÃ ng Ã 18K', 2.3, 0),
(36, 2, 'VÃ²ng tay VT115', 'V&ograve;ng tay l&agrave;m tá»« báº¡c 925 c&oacute; máº·t h&igrave;nh tr&aacute;i tim<br />', '2010-10-17', 'VTLW284.jpg', 845000, 4, 'Báº¡c', 3.5, 0),
(37, 1, 'Láº¯c Tay LT113', 'LÄƒc tay l&agrave;m tá»« báº¡c 925 c&oacute; dáº¡ng máº¯t x&iacute;ch<br />', '2010-10-17', 'LTB335.jpg', 850000, 2, 'Báº¡c', 3, 0),
(38, 4, 'Láº¯c Tay LT114', 'Láº¯c tay l&agrave;m tá»« v&agrave;ng &yacute; 14K c&oacute; kiá»ƒu d&aacute;ng trang nh&atilde;<br />', '2010-10-17', 'LTVT319.jpg', 1300000, 3, 'VÃ ng Ã 14K', 1.2, 0),
(39, 1, 'Láº¯c ChÃ¢n LC113', 'Láº¯c ch&acirc;n l&agrave;m tá»« báº¡c 925 c&oacute; h&igrave;nh ng&ocirc;i sao<br />', '2010-10-17', 'LTB328.jpg', 230000, 3, 'Báº¡c', 1.2, 0),
(40, 4, 'Láº¯c ChÃ¢n LC115', 'Láº¯c ch&acirc;n l&agrave;m tá»« v&agrave;ng t&acirc;y 14K sá»£i máº£nh<br />', '2010-10-17', 'LC205.jpg', 2400000, 4, 'VÃ ng Ã 14K', 1.2, 0),
(41, 2, 'Láº¯c ChÃ¢n LC116', 'LÄƒc ch&acirc;n l&agrave;m tá»« v&agrave;ng &yacute; 18K<br />', '2010-10-17', 'LC204.jpg', 3500000, 2, 'VÃ ng Ã 18K', 1.5, 0),
(42, 3, 'Láº¯c ChÃ¢n LC117', 'Láº¯c ch&acirc;n l&agrave;m tá»« v&agrave;ng &yacute; 14 K<br />', '2010-10-17', 'LC203.jpg', 2330000, 3, 'VÃ ng Ã 14K', 1.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
  `MaTT` int(11) NOT NULL AUTO_INCREMENT,
  `MaLTT` int(11) NOT NULL DEFAULT '0',
  `TieuDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `SoLanXem` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `TrichDan` text COLLATE utf8_unicode_ci NOT NULL,
  `NoiDung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `AnhTT` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgayViet` date DEFAULT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaTT`),
  KEY `MaLTT` (`MaLTT`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`MaTT`, `MaLTT`, `TieuDe`, `SoLanXem`, `TrichDan`, `NoiDung`, `AnhTT`, `NgayViet`, `TrangThai`) VALUES
(13, 1, 'NhÃ  Ä‘áº§u tÆ° Trung Quá»‘c sá»‘t vÃ ng', '8', 'Nhu cáº§u vÃ ng miáº¿ng táº¡i Trung Quá»‘c trong nÄƒm 2008 Ä‘Ã£ tÄƒng 176% lÃªn 68,9 táº¥n tá»« má»©c 25 táº¥n trong nÄƒm 2007.', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" /><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\nh1\r\n	{mso-margin-top-alt:auto;\r\n	margin-right:0in;\r\n	mso-margin-bottom-alt:auto;\r\n	margin-left:0in;\r\n	mso-pagination:widow-orphan;\r\n	mso-outline-level:1;\r\n	font-size:24.0pt;\r\n	font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<h1><span style="font-size: 10pt;">Nhu cáº§u v&agrave;ng miáº¿ng táº¡i Trung Quá»‘c trong nÄƒm\r\n2008 Ä‘&atilde; tÄƒng 176% l&ecirc;n 68,9 táº¥n tá»« má»©c 25 táº¥n trong nÄƒm 2007.</span></h1>\r\n\r\n<span style="font-size: 10pt; font-family: &quot;Times New Roman&quot;;">Giá»‘ng sá»± bá»‹ nhiá»…m virus v&agrave;ng, nh&agrave; Ä‘áº§u tÆ° Trung Quá»‘c\r\nÄ‘ang Ä‘á»• x&ocirc; mua kim loáº¡i qu&yacute; v&igrave; lo sá»£ suy tho&aacute;i kinh táº¿ to&agrave;n cáº§u sáº½ c&ograve;n dá»¯ dá»™i\r\nhÆ¡n.<br />\r\n<br />\r\nDoanh sá»‘ b&aacute;n v&agrave;ng miáº¿ng v&agrave; v&agrave;ng trang sá»©c táº¡i ThÆ°á»£ng Háº£i, Báº¯c Kinh, Quáº£ng Ch&acirc;u\r\nv&agrave; nhá»¯ng th&agrave;nh phá»‘ lá»›n kh&aacute;c Ä‘Æ°á»£c pháº£n &aacute;nh th&ocirc;ng qua gi&aacute; v&agrave;ng tÄƒng máº¡nh táº¡i S&agrave;n\r\ngiao dá»‹ch v&agrave;ng ThÆ°á»£ng Háº£i (SGE). Trong th&aacute;ng qua, gi&aacute; v&agrave;ng táº¡i SGE tÄƒng trung\r\nb&igrave;nh 6,74% l&ecirc;n má»©c hiá»‡n táº¡i 209 NDT/gr.<br />\r\n<br />\r\nTheo b&aacute;o c&aacute;o má»›i nháº¥t cá»§a Há»™i Ä‘á»“ng V&agrave;ng Tháº¿ Giá»›i (WGC) vá» xu hÆ°á»›ng Ä‘áº§u tÆ° v&agrave;ng\r\ntrong qu&yacute; 1 nÄƒm 2009, nhu cáº§u v&agrave;ng á»Ÿ Trung Quá»‘c trong qu&yacute; 1 Ä‘&atilde; tÄƒng 114 táº¥n,\r\ntÆ°Æ¡ng Ä‘Æ°Æ¡ng 2% so vá»›i c&ugrave;ng ká»³ nÄƒm ngo&aacute;i, pháº§n lá»›n l&agrave; do nhu cáº§u trang sá»©c.<br style="" />\r\n<!--[if !supportLineBreakNewLine]--><br style="" />\r\n<!--[endif]--></span>', '2-Nhan (2).jpg', '2010-10-08', 1),
(12, 1, '2 nguyÃªn nhÃ¢n khiáº¿n giÃ¡ vÃ ng leo thang', '4', 'Bá»‘n ngÃ y trá»Ÿ láº¡i Ä‘Ã¢y, giÃ¡ vÃ ng liÃªn tá»¥c láº­p nhá»¯ng ká»· lá»¥c má»›i dÃ¹ sá»©c mua giáº£m nhiá»u. Theo cÃ¡c chuyÃªn gia, cÃ³ 5 nguyÃªn nhÃ¢n khiáº¿n vÃ ng tÄƒng giÃ¡ vÃ  sáº½ giá»¯ lÃ¢u á»Ÿ má»©c cao.', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" /><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\nh1\r\n	{mso-margin-top-alt:auto;\r\n	margin-right:0in;\r\n	mso-margin-bottom-alt:auto;\r\n	margin-left:0in;\r\n	mso-pagination:widow-orphan;\r\n	mso-outline-level:1;\r\n	font-size:24.0pt;\r\n	font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<h1><span style="font-size: 10pt;">Bá»‘n ng&agrave;y trá»Ÿ láº¡i Ä‘&acirc;y, gi&aacute; v&agrave;ng li&ecirc;n tá»¥c láº­p\r\nnhá»¯ng ká»· lá»¥c má»›i d&ugrave; sá»©c mua giáº£m nhiá»u. Theo c&aacute;c chuy&ecirc;n gia, c&oacute; 5 nguy&ecirc;n nh&acirc;n\r\nkhiáº¿n v&agrave;ng tÄƒng gi&aacute; v&agrave; sáº½ giá»¯ l&acirc;u á»Ÿ má»©c cao.</span></h1>\r\n\r\n<span style="font-size: 10pt; font-family: &quot;Times New Roman&quot;;"><br />\r\n</span><span style="font-size: 12pt; font-family: &quot;Times New Roman&quot;;">Theo c&aacute;c chuy&ecirc;n gia trong lÄ©nh vá»±c kim ho&agrave;n, v&agrave;ng ná»™i\r\nÄ‘á»‹a chá»§ yáº¿u Ä‘Æ°á»£c nháº­p kháº©u tá»« nÆ°á»›c ngo&agrave;i n&ecirc;n gi&aacute; cáº£ chá»‹u áº£nh hÆ°á»Ÿng trá»±c tiáº¿p\r\ncá»§a gi&aacute; v&agrave;ng tháº¿ giá»›i.<br />\r\n&ocirc;ng L&ecirc; VÄƒn Hinh, nguy&ecirc;n TrÆ°á»Ÿng ph&ograve;ng ph&acirc;n t&iacute;ch kinh táº¿ (Ng&acirc;n h&agrave;ng Nh&agrave; nÆ°á»›c) cho\r\nráº±ng, thá»i Ä‘iá»ƒm n&agrave;y c&oacute; Ä‘áº¿n 5 nguy&ecirc;n nh&acirc;n khiáº¿n gi&aacute; v&agrave;ng tÄƒng:<br />\r\n<i>&ldquo;Thá»© nháº¥t </i>l&agrave; Cá»¥c dá»± trá»¯ li&ecirc;n bang Má»¹ (FED) Ä‘&atilde; c&oacute; nháº­n Ä‘á»‹nh bi quan hÆ¡n\r\nvá» kinh táº¿ Má»¹. Nhá»¯ng &ldquo;Ä‘áº¡i gia&rdquo; c&oacute; nguá»“n thu lá»›n nhÆ° ng&acirc;n h&agrave;ng, &ocirc; t&ocirc;, báº£o hiá»ƒm,\r\nc&ocirc;ng nghiá»‡p cháº¿ táº¡o tiáº¿p tá»¥c l&agrave;m Äƒn sa s&uacute;t.<br />\r\n<i>Thá»© hai,</i> Ä‘á»“ng USD Ä‘ang bá»‹ giáº£m gi&aacute; hÆ¡n 1% so vá»›i 6 Ä‘á»“ng tiá»n chá»§ yáº¿u cá»§a\r\ntháº¿ giá»›i. Gi&aacute; USD táº¡i thá»‹ trÆ°á»ng tá»± do váº«n trong xu hÆ°á»›ng giáº£m nháº¹: 18.150\r\nÄ‘á»“ng/USD (mua) v&agrave; 18.170 Ä‘á»“ng/USD (b&aacute;n).<br style="" />\r\n<!--[if !supportLineBreakNewLine]--><br style="" />\r\n<!--[endif]--></span>', '2-Nhan-nam-.JPG', '2010-10-08', 1),
(11, 2, 'Tuyá»ƒn sinh dáº¡y nghá» kim hoÃ n', '3', 'Nháº±m Ä‘Ã¡p á»©ng nhu cáº§u phÃ¡t triá»ƒn vÃ  má»Ÿ rá»™ng kinh doanh, Cty TNHH VÃ ng Báº¡c Báº£o HÃ¢n thÃ´ng bÃ¡o tuyá»ƒn sinh cÃ¡c lá»›p há»c nghá» miá»…n phÃ­ dÃ nh cho ngÆ°á»i khuyáº¿t táº­t nhÆ° sau:', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" /><o:smarttagtype namespaceuri="urn:schemas-microsoft-com:office:smarttags" name="place" downloadurl="http://www.5iantlavalamp.com/"></o:smarttagtype><o:smarttagtype namespaceuri="urn:schemas-microsoft-com:office:smarttags" name="country-region" downloadurl="http://www.5iantlavalamp.com/"></o:smarttagtype><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><!--[if !mso]><object\r\n classid="clsid:38481807-CA0E-42D2-BF39-B33AF135CC4D" id=ieooui></object>\r\n<style>\r\nst1\\:*{behavior:url(#ieooui) }\r\n</style>\r\n<![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<p class="MsoNormal" style="line-height: 150%;"><span style="font-size: 9pt; line-height: 150%;">Nháº±m Ä‘&aacute;p á»©ng nhu cáº§u ph&aacute;t triá»ƒn v&agrave; má»Ÿ rá»™ng kinh\r\ndoanh,&nbsp;Cty TNHH V&agrave;ng Báº¡c Ä&aacute; Qu&yacute; Ph&uacute;c Thiá»‡n th&ocirc;ng b&aacute;o tuyá»ƒn sinh c&aacute;c lá»›p há»c\r\nnghá» miá»…n ph&iacute; d&agrave;nh cho ngÆ°á»i khuyáº¿t táº­t nhÆ° sau:</span></p>\r\n\r\n<p class="MsoNormal" style="text-align: center;" align="center">&nbsp;</p>\r\n\r\n<p class="MsoNormal"><strong><span style="font-size: 9pt;">1-Äá»‘i tÆ°á»£ng:</span></strong><b><span style="font-size: 9pt;">Há»c vi&ecirc;n <st1:place w:st="on"><st1:country-region w:st="on">Nam</st1:country-region></st1:place> l&agrave; NgÆ°á»i khiáº¿m th&iacute;nh, c&acirc;m Ä‘iáº¿c.</span></b></p>\r\n\r\n<p class="MsoNormal"><span style="font-size: 9pt;">&nbsp;</span></p>\r\n\r\n<p class="MsoNormal"><b><span style="font-size: 9pt;">2- Äá»™ tuá»•i:</span></b><span style="font-size: 9pt;"> Tá»« 18 Ä‘áº¿n 25<br />\r\n<b><br />\r\n3<strong>- Sá»‘ lÆ°á»£ng:</strong></b>&nbsp;5 há»c vi&ecirc;n<br />\r\n<b><br />\r\n<strong>4- Nghá» Ä‘&agrave;o táº¡o:</strong></b> Dáº¡y kim ho&agrave;n</span></p>\r\n\r\n<p class="MsoNormal"><span style="font-size: 9pt;">&nbsp;</span></p>\r\n\r\n<p class="MsoNormal" style="line-height: 150%;"><strong><span style="font-size: 9pt; line-height: 150%;">5- Thá»i gian há»c:</span></strong><span style="font-size: 9pt; line-height: 150%;"> 3 th&aacute;ng/ kho&aacute;. Lá»›p há»c khai giáº£ng dá»±\r\nkiáº¿n v&agrave;o ng&agrave;y 3/07/2010<br />\r\n<br />\r\n<strong>6- Äá»‹a Ä‘iá»ƒm tá»• chá»©c lá»›p há»c: </strong>C&ocirc;ng ty TNHH v&agrave;ng báº¡c Ä‘&aacute; qu&yacute; Ph&uacute;c\r\nThiá»‡n 100 Pháº¡m Ngá»c Tháº¡ch -&nbsp;Äá»‘ng&nbsp;Äa - H&agrave; Ná»™i (Äá»‘i diá»‡n Si&ecirc;u thá»‹ Sao\r\nH&agrave; Ná»™i).<br />\r\nÄiá»‡n thoáº¡i: 043 573 5199 </span></p>\r\n\r\n<p class="MsoNormal" style="line-height: 150%;"><span style="font-size: 9pt; line-height: 150%;">XÆ°á»Ÿng sáº£n xuáº¥t: 284 p. chá»£ Kh&acirc;m Thi&ecirc;n - PhÆ°Æ¡ng Li&ecirc;n - Äá»‘ng Äa\r\n- H&agrave; Ná»™i.</span></p>\r\n\r\n<p class="MsoNormal" style="line-height: 150%;"><span style="font-size: 9pt; line-height: 150%;">&nbsp;</span></p>\r\n\r\n<p class="MsoNormal" style="line-height: 150%;"><strong><span style="font-size: 9pt; line-height: 150%;">7- Cháº¿ Ä‘á»™ há»c vi&ecirc;n: </span></strong><span style="font-size: 9pt; line-height: 150%;">- ÄÆ°á»£c há»c nghá» miá»…n ph&iacute;<br />\r\n- Sau 2 th&aacute;ng há»c nghá» v&agrave; thá»­ tay nghá» náº¿u Ä‘áº¡t sáº½ c&oacute; lÆ°Æ¡ng trá»£ cáº¥p\r\n1.000.000/th&aacute;ng + 20.000/ng&agrave;y (trá»£ cáº¥p Äƒn trÆ°a)<br />\r\n- Káº¿t th&uacute;c kh&oacute;a há»c náº¿u Ä‘á»§ Ä‘iá»u kiá»‡n v&agrave; c&oacute; nhu cáº§u l&agrave;m viá»‡c sáº½ Ä‘Æ°á»£c Cty nháº­n\r\ntuyá»ƒn l&agrave;m viá»‡c theo há»£p Ä‘á»“ng d&agrave;i háº¡n hoáº·c giá»›i thiá»‡u viá»‡c l&agrave;m. </span></p>', 'hocviec.jpg', '2010-10-08', 1),
(14, 5, 'PhÃ¢n biá»‡t Báº¡ch kim vÃ  VÃ ng tráº¯ng', '', 'Báº CH KIM: lÃ  tá»« hÃ¡n viá»‡t, dá»‹ch ra tiáº¿ng Viá»‡t cÃ³ nghÄ©a lÃ  "VÃ ng tráº¯ng" (Báº¡ch lÃ  tráº¯ng, Kim lÃ  vÃ ng). Vá» nghá»¯ nghÄ©a thÃ¬ khÃ´ng sai nhÆ°ng vá» hÃ ng ná»¯ trang thÃ¬ Ä‘Ã¢y lÃ  má»™t nháº§m láº«n nghiÃªm trá»ng vÃ¬ cÆ¡ báº£n Ä‘Ã¢y lÃ  hai cháº¥t liá»‡u khÃ¡c nhau.\r\n\r\n ', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" /><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<p class="MsoNormal">\r\n<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" />\r\n<link rel="Edit-Time-Data" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_editdata.mso" /><!--[if !mso]>\r\n<style>\r\nv\\:* {behavior:url(#default#VML);}\r\no\\:* {behavior:url(#default#VML);}\r\nw\\:* {behavior:url(#default#VML);}\r\n.shape {behavior:url(#default#VML);}\r\n</style>\r\n<![endif]--><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]--><!--[if gte mso 9]><xml>\r\n <o:shapedefaults v:ext="edit" spidmax="1027"/>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <o:shapelayout v:ext="edit">\r\n  <o:idmap v:ext="edit" data="1"/>\r\n </o:shapelayout></xml><![endif]-->\r\n\r\n<p class="MsoNormal"><!--[if gte vml 1]><v:shapetype id="_x0000_t75" coordsize="21600,21600"\r\n o:spt="75" o:preferrelative="t" path="m@4@5l@4@11@9@11@9@5xe" filled="f"\r\n stroked="f">\r\n <v:stroke joinstyle="miter"/>\r\n <v:formulas>\r\n  <v:f eqn="if lineDrawn pixelLineWidth 0"/>\r\n  <v:f eqn="sum @0 1 0"/>\r\n  <v:f eqn="sum 0 0 @1"/>\r\n  <v:f eqn="prod @2 1 2"/>\r\n  <v:f eqn="prod @3 21600 pixelWidth"/>\r\n  <v:f eqn="prod @3 21600 pixelHeight"/>\r\n  <v:f eqn="sum @0 0 1"/>\r\n  <v:f eqn="prod @6 1 2"/>\r\n  <v:f eqn="prod @7 21600 pixelWidth"/>\r\n  <v:f eqn="sum @8 21600 0"/>\r\n  <v:f eqn="prod @7 21600 pixelHeight"/>\r\n  <v:f eqn="sum @10 21600 0"/>\r\n </v:formulas>\r\n <v:path o:extrusionok="f" gradientshapeok="t" o:connecttype="rect"/>\r\n <o:lock v:ext="edit" aspectratio="t"/>\r\n</v:shapetype><v:shape id="_x0000_s1026" type="#_x0000_t75" alt="" style=''position:absolute;\r\n margin-left:0;margin-top:0;width:75pt;height:75pt;z-index:1;\r\n mso-wrap-distance-left:3.75pt;mso-wrap-distance-top:3.75pt;\r\n mso-wrap-distance-right:3.75pt;mso-wrap-distance-bottom:3.75pt;\r\n mso-position-horizontal:left;mso-position-vertical-relative:line''\r\n o:allowoverlap="f">\r\n <v:imagedata src="file:///C:\\Users\\T\\AppData\\Local\\Temp\\msohtml1\\01\\clip_image001.jpg"\r\n  o:title="331"/>\r\n <w:wrap type="square"/>\r\n</v:shape><![endif]--><!--[if !vml]--><!--[endif]--><strong><span style="font-size: 10pt; font-weight: normal;">Báº CH KIM: l</span></strong><strong><span style="font-weight: normal;">&agrave; tá»« h&aacute;n viá»‡t, dá»‹ch ra tiáº¿ng Viá»‡t c&oacute; nghÄ©a l&agrave;\r\n"V&agrave;ng tráº¯ng" (Báº¡ch l&agrave; tráº¯ng, Kim l&agrave; v&agrave;ng). Vá» nghá»¯ nghÄ©a th&igrave; kh&ocirc;ng\r\nsai nhÆ°ng vá» h&agrave;ng ná»¯ trang th&igrave; Ä‘&acirc;y l&agrave; má»™t nháº§m láº«n nghi&ecirc;m trá»ng v&igrave; cÆ¡ báº£n Ä‘&acirc;y\r\nl&agrave; hai cháº¥t liá»‡u kh&aacute;c nhau.</span></strong></p>\r\n\r\n\r\n\r\n\r\n\r\n<p class="MsoNormal">&nbsp;<span style="font-size: 9pt;"> <o:p></o:p></span></p>\r\n\r\n</p>\r\n<p class="MsoNormal"><strong><span style="font-weight: normal;">PLATIUM: ngÆ°á»i Viá»‡t\r\nquen gá»i l&agrave; "báº¡ch kim" Ä‘&acirc;y l&agrave; má»™t kim loáº¡i qu&yacute; c&oacute; gi&aacute; trá»‹ cao hÆ¡n\r\nv&agrave;ng, bá»Ÿi v&igrave; trá»¯ lÆ°á»£ng cá»§a báº¡ch kim ráº¥t &iacute;t, h&agrave;m lÆ°á»£ng báº¡ch kim trong má» kho&aacute;ng\r\ntháº¥p, ph&acirc;n bá»‘ ph&acirc;n t&aacute;n, kh&oacute; khai th&aacute;c. Platium c&oacute; k&yacute; hiá»‡u ho&aacute; há»c l&agrave; Pt, l&agrave;\r\nnguy&ecirc;n tá»‘ kim loáº¡i Ä‘Æ¡n cháº¥t c&oacute; m&agrave;u tráº¯ng, Ä‘á»™ n&oacute;ng cháº£y 1.768 Ä‘á»™ C khá»‘i lÆ°á»£ng\r\nri&ecirc;ng 21,45g/cm khá»‘i. Báº¡ch kim Ä‘Æ°á»£c ngÆ°á»i Nháº­t Báº£n Æ°a chuá»™ng nháº¥t.</span></strong></p>\r\n\r\n<p class="MsoNormal">&nbsp;</p>\r\n\r\n<strong><span style="font-size: 12pt; font-weight: normal;">WHITE GOLD: l&agrave; tá»« tiáº¿ng Anh, dá»‹ch ra tiáº¿ng Viá»‡t cÅ©ng l&agrave;\r\n"v&agrave;ng tráº¯ng". Ä&acirc;y l&agrave; má»™t há»£p kim Ä‘Æ°á»£c pha trá»™n (theo nhiá»u c&ocirc;ng thá»©c)\r\ncÆ¡ báº£n gá»“m v&agrave;ng (v&agrave;ng 4 sá»‘ 9) + báº¡c + pladium (hoáº·c nikel) + má»™t sá»‘ kim loáº¡i\r\nkh&aacute;c v&igrave; platium ráº¥t hiáº¿m v&agrave; Ä‘áº¯t n&ecirc;n tr&ecirc;n tháº¿ giá»›i ngÆ°á»i ta Ä‘&atilde; d&ugrave;ng c&aacute;c kim loáº¡i\r\nc&oacute; m&agrave;u tráº¯ng nhÆ° Paladium (Pd) hoáº·c Nikel (Ni) khi pha trá»™n vá»›i c&aacute;c kim loáº¡i\r\nkh&aacute;c (nhÆ° v&agrave;ng) sáº½ l&agrave;m cho m&agrave;u </span></strong><em><span style="font-size: 12pt;">nháº¡t Ä‘i</span></em><strong><span style="font-size: 12pt; font-weight: normal;">\r\nnhiá»u táº¡o th&agrave;nh má»™t há»£p kim c&oacute; m&agrave;u v&agrave;ng ráº¥t nháº¡t (gáº§n nhÆ° tráº¯ng). Tuy nhi&ecirc;n, v&igrave;\r\nmuá»‘n tráº¯ng hÆ¡n ngÆ°á»i ta pháº£i xi máº¡ th&ecirc;m b&ecirc;n ngo&agrave;i má»™t thá»© kim loáº¡i kh&aacute;c (cÅ©ng\r\nnáº±m trong nh&oacute;m</span></strong><strong><span style="font-size: 9pt; color: white; font-weight: normal;"> platium</span></strong>', '2-Nhan.jpg', '2010-10-08', 1),
(15, 6, 'Ã nghÄ©a chiáº¿c nháº«n cÆ°á»›i', '1', 'Khi chiáº¿c nháº«n cÆ°á»›i Ä‘Æ°á»£c lá»“ng vÃ o tay, nÃ³ lÃ  biá»ƒu tÆ°á»£ng sá»± rÃ ng buá»™c cá»§a giá»¯a hai con ngÆ°á»i, vá»¯ng bá»n, lÃ¢u dÃ i vÄ©nh viá»…n. Pháº£i chÄƒng riÃªng Ä‘iá»u nÃ y thá»±c sá»± Ä‘Ã£ chá»©ng tá» sá»± há»£p nháº¥t cá»§a chÃºng ngay tá»« khoáº£nh kháº¯c ra Ä‘á»i.', '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />\r\n<meta name="ProgId" content="Word.Document" />\r\n<meta name="Generator" content="Microsoft Word 11" />\r\n<meta name="Originator" content="Microsoft Word 11" />\r\n<link rel="File-List" href="file:///C:%5CUsers%5CT%5CAppData%5CLocal%5CTemp%5Cmsohtml1%5C01%5Cclip_filelist.xml" /><!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n  </w:Compatibility>\r\n  <w:BrowserLevel>MicrosoftInternetExplorer4</w:BrowserLevel>\r\n </w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState="false" LatentStyleCount="156">\r\n </w:LatentStyles>\r\n</xml><![endif]--><style>\r\n<!--\r\n /* Style Definitions */\r\n p.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-parent:"";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\np\r\n	{mso-margin-top-alt:auto;\r\n	margin-right:0in;\r\n	mso-margin-bottom-alt:auto;\r\n	margin-left:0in;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-fareast-font-family:"Times New Roman";}\r\n@page Section1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.Section1\r\n	{page:Section1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\n table.MsoNormalTable\r\n	{mso-style-name:"Table Normal";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-parent:"";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:10.0pt;\r\n	font-family:"Times New Roman";\r\n	mso-ansi-language:#0400;\r\n	mso-fareast-language:#0400;\r\n	mso-bidi-language:#0400;}\r\n</style>\r\n<![endif]-->\r\n\r\n<p><span style="font-size: 10pt;">Khi chiáº¿c nháº«n cÆ°á»›i Ä‘Æ°á»£c lá»“ng v&agrave;o tay, n&oacute; l&agrave;\r\nbiá»ƒu tÆ°á»£ng sá»± r&agrave;ng buá»™c cá»§a giá»¯a hai con ngÆ°á»i, vá»¯ng bá»n, l&acirc;u d&agrave;i vÄ©nh viá»…n.\r\nPháº£i chÄƒng ri&ecirc;ng Ä‘iá»u n&agrave;y thá»±c sá»± Ä‘&atilde; chá»©ng tá» sá»± há»£p nháº¥t cá»§a ch&uacute;ng ngay tá»«\r\nkhoáº£nh kháº¯c ra Ä‘á»i.</span><o:p></o:p></p>\r\n\r\n<p style="text-align: justify;"><strong><span style="font-size: 10pt;">Nháº«n cÆ°á»›i\r\nl&agrave; biá»ƒu tÆ°á»£ng cá»§a h&ocirc;n nh&acirc;n </span></strong><o:p></o:p></p>\r\n\r\n<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 10pt;">Biá»ƒu\r\ntÆ°á»£ng r&otilde; r&agrave;ng n&agrave;y gá»­i tá»›i má»i ngÆ°á»i má»™t th&ocirc;ng Ä‘iá»‡p kh&ocirc;ng thá»ƒ nháº§m láº«n vá» t&igrave;nh\r\ntráº¡ng h&ocirc;n nh&acirc;n. Chiáº¿c nháº«n cÆ°á»›i thÆ°á»ng l&agrave; ráº¥t Ä‘Æ¡n giáº£n vá»›i má»™t thiáº¿t káº¿ Ä‘áº¹p v&agrave;\r\nkh&ocirc;ng bá»‹ lá»—i má»‘t qua thá»i gian. N&oacute; cÅ©ng c&oacute; má»™t lá»‹ch sá»­ l&acirc;u d&agrave;i, tá»« thá»i Ai Cáº­p\r\ncá»• Ä‘áº¡i, khoáº£ng 4800 nÄƒm trÆ°á»›c Ä‘&acirc;y.</span><o:p></o:p></p>\r\n\r\n<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 10pt;">Vá»›i\r\nnhá»¯ng ngÆ°á»i Ai Cáº­p cá»• Ä‘áº¡i, chiáº¿c nháº«n Ä‘Æ°á»£c gáº¯n vá»›i má»™t tháº¿ lá»±c si&ecirc;u nhi&ecirc;n, má»™t\r\nv&ograve;ng tr&ograve;n kh&ocirc;ng c&oacute; Ä‘iá»ƒm cháº¥m dá»©t vá»›i t&igrave;nh y&ecirc;u báº¥t diá»‡t. Vá» sau vá»›i ngÆ°á»i Hy\r\nLáº¡p, khi ngÆ°á»i con g&aacute;i cháº¥p nháº­n chiáº¿c nháº«n cÅ©ng c&oacute; nghÄ©a l&agrave; c&ocirc; g&aacute;i Ä‘&atilde; bá»‹ tr&oacute;i\r\nbuá»™c vá» cáº£ máº·t tinh tháº§n láº«n luáº­t ph&aacute;p v&agrave; kh&ocirc;ng c&ograve;n Ä‘Æ°á»£c tá»± do ná»¯a.</span><o:p></o:p></p>\r\n\r\n<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 10pt;">C&ograve;n\r\nng&agrave;y h&ocirc;m nay, ch&uacute;ng ta cháº¥p nháº­n chiáº¿c nháº«n nhÆ° l&agrave; má»™t pháº§n cá»§a nghi lá»… Ä‘&aacute;m\r\ncÆ°á»›i, má»™t sá»± r&agrave;ng buá»™c m&atilde;i m&atilde;i c&oacute; sá»± chá»©ng kiáº¿n cá»§a cáº£ hai gia Ä‘&igrave;nh, há» máº¡c.</span><o:p></o:p></p>\r\n\r\n<p style="text-align: justify; text-indent: 0.5in;"><span style="font-size: 10pt;">Thá»i\r\ngian dáº§n tr&ocirc;i Ä‘i v&agrave; phong tá»¥c cÅ©ng c&oacute; nhá»¯ng thay Ä‘á»•i Ä‘&aacute;ng ká»ƒ. Ng&agrave;y nay, kh&ocirc;ng\r\nchá»‰ c&aacute;c c&ocirc; d&acirc;u má»›i Ä‘eo nhá»¯ng chiáº¿c nháº«n nhÆ° l&agrave; má»™t biá»ƒu tÆ°á»£ng cá»§a sá»± r&agrave;ng buá»™c\r\nm&agrave; pháº§n lá»›n Ä‘&agrave;n &ocirc;ng cÅ©ng chá»n Ä‘eo nháº«n Ä‘á»ƒ x&aacute;c láº­p t&iacute;nh trung thá»±c cá»§a há», sá»±\r\nkháº³ng Ä‘á»‹nh gáº¯n b&oacute; cá»§a há» vá»›i má»™t ngÆ°á»i phá»¥ ná»¯.</span><o:p></o:p></p>', 'NCVT4751.jpg', '2010-10-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ykph`
--

CREATE TABLE IF NOT EXISTS `ykph` (
  `MaYKPH` int(11) NOT NULL AUTO_INCREMENT,
  `MaKhach` int(11) NOT NULL DEFAULT '0',
  `YKPHTieuDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `YKPHNoiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `TraLoi` text COLLATE utf8_unicode_ci,
  `YKPHDate` date DEFAULT '0000-00-00',
  `TrangThai` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`MaYKPH`),
  KEY `MaKhach` (`MaKhach`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ykph`
--

INSERT INTO `ykph` (`MaYKPH`, `MaKhach`, `YKPHTieuDe`, `YKPHNoiDung`, `TraLoi`, `YKPHDate`, `TrangThai`) VALUES
(5, 4, 'xin chÃ o', 'toi muá»‘n cÃ³ thÃªm nhiá»u sáº£n pháº©m vá» láº¯c chÃ¢n hÆ¡n ná»¯a', 'ChÃºng tÃ´i sáº½ cá»‘ gáº¯ng', '2010-10-08', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
