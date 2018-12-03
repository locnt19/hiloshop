-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2018 at 09:20 AM
-- Server version: 5.7.23
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiloshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_hd`
--

DROP TABLE IF EXISTS `chi_tiet_hd`;
CREATE TABLE IF NOT EXISTS `chi_tiet_hd` (
  `MaHD` int(11) NOT NULL,
  `MaSP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  PRIMARY KEY (`MaHD`,`MaSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chi_tiet_hd`
--

INSERT INTO `chi_tiet_hd` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`) VALUES
(17, 'dt01', 1, 29990000),
(17, 'dt03', 7, 23990000),
(18, 'dt01', 1, 29990000),
(19, 'dt02', 4, 20990000),
(20, 'dt02', 1, 20990000),
(21, 'dt13', 6, 4390000);

-- --------------------------------------------------------

--
-- Table structure for table `hoa_don`
--

DROP TABLE IF EXISTS `hoa_don`;
CREATE TABLE IF NOT EXISTS `hoa_don` (
  `MaHD` int(11) NOT NULL AUTO_INCREMENT,
  `HoTen` text COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `NgayGiao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DiaChi` text COLLATE utf8_unicode_ci NOT NULL,
  `GhiChu` text COLLATE utf8_unicode_ci,
  `TongSoLuong` int(11) NOT NULL,
  `TongThanhTien` int(11) NOT NULL,
  `STT` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaHD`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoa_don`
--

INSERT INTO `hoa_don` (`MaHD`, `HoTen`, `SDT`, `NgayGiao`, `DiaChi`, `GhiChu`, `TongSoLuong`, `TongThanhTien`, `STT`) VALUES
(17, 'Nguyễn Thành Lộc', '0383303809', '2018-12-03 15:31:04', 'hcm', ' dat do', 8, 197920000, 1),
(18, '21818', '456456', '2018-12-03 15:47:12', '4645645', ' 646456', 1, 29990000, 1),
(19, 'ac', '23', '2018-12-03 15:56:23', 'đất đỏ', ' hé lô', 4, 83960000, 1),
(20, 'loc', '1', '2018-12-03 15:59:29', 'abc', ' ads', 5, 20990000, 1),
(21, 'locabc', '12313123', '2018-12-03 16:11:18', 'óadlasdasd', ' acnaljsd', 3, 26340000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

DROP TABLE IF EXISTS `san_pham`;
CREATE TABLE IF NOT EXISTS `san_pham` (
  `MaSP` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenSP` text COLLATE utf8_unicode_ci NOT NULL,
  `NSX` text COLLATE utf8_unicode_ci NOT NULL,
  `LoaiSP` text COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` int(11) NOT NULL,
  `BaoHanh` int(11) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `STT` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MaSP`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`MaSP`, `TenSP`, `NSX`, `LoaiSP`, `DonGia`, `BaoHanh`, `SoLuongTon`, `HinhAnh`, `STT`) VALUES
('dt01', 'iPhone X 64GB', 'APPLE', 'Điện thoại', 29990000, 12, 1000, 'images/dt01_ipX_black_01.jpg', 1),
('dt02', 'iPhone 8 64GB', 'APPLE', 'Điện thoại', 20990000, 12, 659, 'images/dt02_ip8_red_01.jpg', 1),
('dt03', 'iPhone 8 Plus 64GB', 'APPLE', 'Điện thoại', 23990000, 12, 996, 'images/dt03_ip8+_black_01.jpg', 1),
('dt04', 'iPhone 7 32GB', 'APPLE', 'Điện thoại', 15999000, 12, 9856, 'images/dt04_ip7_rose_01.jpg', 1),
('dt05', 'iPhone 7 Plus 32GB', 'APPLE', 'Điện thoại', 19999000, 12, 1000, 'images/dt05_ip7+_black_01.jpg', 1),
('dt06', 'Galaxy Note 9 128GB', 'SAMSUNG', 'Điện thoại', 22990000, 12, 1102, 'images/dt06_ssN9_black_01.jpg', 1),
('dt07', 'Galaxy Note 8 128GB', 'SAMSUNG', 'Điện thoại', 19990000, 12, 4570, 'images/dt07_ssN8_black_01.jpg', 1),
('dt08', 'Galaxy S9', 'SAMSUNG', 'Điện thoại', 19900000, 12, 1586, 'images/dt08_ssS9_black_01.jpg', 1),
('dt09', 'Galaxy S9+', 'SAMSUNG', 'Điện thoại', 23490000, 12, 4568, 'images/dt09_ssS9+_black_01.jpg', 1),
('dt10', 'Galaxy S8', 'SAMSUNG', 'Điện thoại', 15990000, 12, 1000, 'images/dt10_ssS8_black_01.jpg', 1),
('dt11', 'iPhone6 Plus 32GB', 'SAMSUNG', 'Điện thoại', 12999999, 12, 456, 'images/dt11_ip6_gray_01.jpg', 1),
('dt12', 'A8 Star 2018', 'SAMSUNG', 'Điện thoại', 2590000, 12, 1233, 'images/dt12_ssa8star_black_01.jpg', 1),
('dt13', 'Redmi Note 5 Pro', 'XIAOMI', 'Điện thoại', 4390000, 12, 1312, 'images/dt13_redminote5_black_01.jpg', 1),
('dt14', 'Mi A2 Lite', 'XIAOMI', 'Điện thoại', 5299000, 12, 5645, 'images/dt14_mia2lite_black_01.jpg', 1),
('dt15', 'Red mi 6', 'XIAOMI', 'Điện thoại', 3290000, 12, 311, 'images/dt15_redmi6_blue_01.jpg', 1),
('dt16', 'Mi8 64GB', 'XIAOMI', 'Điện thoại', 11090000, 12, 1231, 'images/dt16_mi8_black_01.jpg', 1),
('dt17', 'Mi2 A32GB', 'XIAOMI', 'Điện thoại', 5550000, 12, 1000, 'images/dt17_mia2_black_01.jpg', 1),
('dt18', 'Nova3i', 'HUAWEI', 'Điện thoại', 6990000, 12, 1000, 'images/dt18_nova3i_black_01.jpg', 1),
('dt19', 'Y7 Pro', 'HUAWEI', 'Điện thoại', 3690000, 12, 789, 'images/dt19_Y7Pro_black_01.jpg', 1),
('dt20', 'Nova 2i', 'HUAWEI', 'Điện thoại', 4990000, 12, 123, 'images/dt20_nova2i_black_01.jpg', 1),
('dt21', 'P20 Pro', 'HUAWEI', 'Điện thoại', 16990000, 12, 978, 'images/dt21_p20pro_black_01.jpg', 1),
('dt22', 'Max Pro M1 32gb', 'ASUS', 'Điện thoại', 4290000, 12, 1322, 'images/dt22_zenmaxprom1_black_01.jpg', 1),
('dt23', 'ZenFone 5Z', 'ASUS', 'Điện thoại', 12490000, 12, 123, 'images/dt23_5Z_black_01.jpg', 1),
('dt24', 'Xperia XZ1', 'SONY', 'Điện thoại', 8590000, 12, 2351, 'images/dt24_XZ1_black_01.jpg', 1),
('dt25', 'Xperia XA1', 'SONY', 'Điện thoại', 3790000, 12, 2351, 'images/dt25_XA1plus_black_01.jpg', 1),
('dt26', 'Xperia XZ Premium', 'SONY', 'Điện thoại', 10690000, 12, 1245, 'images/dt26_XZPremium_red_01.jpg', 1),
('dt27', 'Xperia XA2 ULTRA', 'SONY', 'Điện thoại', 8990000, 12, 2351, 'images/dt27_XA2_ULTRA_blue_01.jpg', 1),
('dt28', 'A3S 16GB', 'OPPO', 'Điện thoại', 3690000, 12, 5342, 'images/dt28_a3s_purple_01.jpg', 1),
('dt29', 'F9', 'OPPO', 'Điện thoại', 7690000, 12, 4528, 'images/dt29_F9_blue_01.jpg', 1),
('dt30', 'Find X', 'OPPO', 'Điện thoại', 20990000, 12, 2521, 'images/dt30_FindX_blue_01.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

DROP TABLE IF EXISTS `tai_khoan`;
CREATE TABLE IF NOT EXISTS `tai_khoan` (
  `TenTK` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `STT` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`TenTK`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`TenTK`, `MatKhau`, `STT`) VALUES
('Admin', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('user', 'c4ca4238a0b923820dcc509a6f75849b', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
