-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2017 at 11:28 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `penyewaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_category`
--

CREATE TABLE IF NOT EXISTS `ref_category` (
`category_id` tinyint(4) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_category`
--

INSERT INTO `ref_category` (`category_id`, `category_name`) VALUES
(1, 'Mahasiswa Kedokteran  S1 UGM'),
(2, 'Mahasiswa'),
(3, 'Peneliti'),
(4, 'Umum'),
(5, 'Mahasiswa S2 UGM'),
(6, 'Mahasiswa S3 UGM');

-- --------------------------------------------------------

--
-- Table structure for table `ref_instrument`
--

CREATE TABLE IF NOT EXISTS `ref_instrument` (
`instrument_id` tinyint(5) NOT NULL,
  `instrument_name` varchar(50) NOT NULL,
  `instrument_brand` varchar(20) NOT NULL,
  `instrument_quantity` int(5) NOT NULL,
  `instrument_fee` float NOT NULL,
  `instrument_description` text NOT NULL,
  `instrument_length` varchar(15) NOT NULL,
  `instrument_weight` varchar(10) NOT NULL,
  `instrument_picture` varchar(20) NOT NULL,
  `intrument_quantity_temp` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_instrument`
--

INSERT INTO `ref_instrument` (`instrument_id`, `instrument_name`, `instrument_brand`, `instrument_quantity`, `instrument_fee`, `instrument_description`, `instrument_length`, `instrument_weight`, `instrument_picture`, `intrument_quantity_temp`) VALUES
(15, 'Anthropometer', 'Holtain Limited, Har', 10, 250000, '    ', '-', '-', 'IMG_1664.JPG', 1),
(16, 'Spreadhing Caliper / Caliper Rentang', 'GPM, Swiss', 10, 100000, '    ', '60 dan 30 ', '-', 'IMG_1679.JPG', 1),
(17, 'Spreading Caliper Lengkung', 'GPM, Swiss', 10, 50000, ' Ketelitian 1,5  ', '50 cm', '-', 'E-FIX.JPG', 1),
(18, 'Spreading Caliper Lengkung', 'GPM, Swiss', 10, 50000, ' Ketelitian 1  ', '50 cm', '-', 'F-FIX.JPG', 0),
(19, 'Dynamo Meter Set', 'TTM, Tokyo', 10, 150000, ' 2 tangan ', '-', '100 kg', 'H-FIX.JPG', 0),
(20, 'Dynamo Meter Set', 'TTM, Tokyo', 10, 150000, ' 1 tangan ', '-', '50 kg', 'IMG_1712.JPG', 0),
(21, 'Dynamo Meter Set', 'TTM, Tokyo', 10, 150000, '  ', '-', '-', 'J-FIX.JPG', 0),
(22, 'A.OTT Compensating Polar Plammeter', 'Kempten Bayern', 10, 50000, '  ', '21 mm', '-', 'K-FIX.JPG', 0),
(23, 'Lange Skinfold Caliper', 'Cambridge Scientific', 10, 100000, '  ', '60 mm', '-', 'L-FIX.JPG', 0),
(24, 'Skinfold Caliper ', 'Holtain', 10, 150000, '  ', '0,2 mm', '-', 'M-FIX.JPG', 0),
(25, 'Sliding Caliper', 'Holtain', 10, 100000, '  ', '14 cm', '-', 'N-FIX.JPG', 0),
(26, 'Sliding Caliper / Vernier Caliper', 'Mitutoyo, Japan', 10, 100000, '  ', '300 mm', '-', 'O-FIX.JPG', 0),
(27, 'Sliding Caliper', 'GPM, Swiss', 10, 200000, '  ', '22 mm', '-', 'P-FIX.JPG', 0),
(28, 'Sliding Caliper', 'GPM, Swiss', 10, 50000, '  ', '2 mm', '-', 'Q-FIX.JPG', 0),
(29, 'Sliding Caliper', 'GPM, Swiss', 10, 50000, '  ', '180 cm', '-', 'R-FIX.JPG', 0),
(30, 'Pita Meter', 'Lutkin', 10, 50000, '  ', '2 m', '-', 'S-FIX.JPG', 0),
(31, 'Orchidometer', 'Holtain', 10, 100000, '  ', '-', '-', 'T-FIX.JPG', 0),
(32, 'Biotrop', 'Twinlite, Eschma Eng', 10, 50000, '', '-', '-', 'U-FIX.JPG', 0),
(33, 'Skala Warna Kulit 36 macam', 'Hautfarben, Tafel', 10, 200000, '   ', '-', '-', 'V-FIX.JPG', 0),
(34, 'Skala Warna Kulit 24 macam', 'Hautfarben, Tafel', 10, 200000, ' ', '-', '-', 'W-FIX.JPG', 0),
(35, 'Skala Rambut 30 macam', '-', 10, 200000, ' ', '-', '-', 'X-FIX.JPG', 0),
(36, 'Timbangan Berat Badan', 'ADE', 10, 100000, 'Kapasitas 150 kg, Dimensi 320 x 435 x 70 mm', '-', '-', 'Z-FIX.JPG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref_level`
--

CREATE TABLE IF NOT EXISTS `ref_level` (
`level_id` tinyint(4) NOT NULL,
  `level_name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_level`
--

INSERT INTO `ref_level` (`level_id`, `level_name`) VALUES
(1, 'admin'),
(2, 'koordinator penelitian'),
(3, 'kepala laboratorium'),
(4, 'member'),
(5, 'kasiran');

-- --------------------------------------------------------

--
-- Table structure for table `ref_level_menu`
--

CREATE TABLE IF NOT EXISTS `ref_level_menu` (
  `level_id` tinyint(4) NOT NULL,
  `menu_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_level_menu`
--

INSERT INTO `ref_level_menu` (`level_id`, `menu_id`) VALUES
(5, 5),
(5, 6),
(5, 9),
(2, 1),
(2, 4),
(3, 4),
(0, 14),
(0, 17),
(4, 14),
(4, 17),
(4, 26),
(4, 28),
(1, 2),
(1, 5),
(1, 6),
(1, 9),
(1, 10),
(1, 14),
(1, 26),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35);

-- --------------------------------------------------------

--
-- Table structure for table `ref_menu`
--

CREATE TABLE IF NOT EXISTS `ref_menu` (
`menu_id` tinyint(4) NOT NULL,
  `menu_name` varchar(30) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `menu_parent` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_menu`
--

INSERT INTO `ref_menu` (`menu_id`, `menu_name`, `menu_url`, `menu_parent`) VALUES
(1, 'Master Data', '', 0),
(2, 'Operator', 'operator/list', 1),
(5, 'Menu', 'menu/list', 1),
(6, 'Level', 'level/list', 1),
(9, 'Member', 'member/list', 1),
(10, 'Alat', 'alat/list', 1),
(13, 'Transaksi', '', 0),
(14, 'Pembayaran', 'pembayaran/list', 18),
(18, 'Konfirmasi', '', 0),
(19, 'Laporan', '', 0),
(26, 'Pengajuan Pinjaman', 'peminjaman/pengajuan/list', 18),
(28, 'Peminjaman', 'loan-list.php', 13),
(29, 'Pengembalian', 'pengembalian/list', 13),
(30, 'Saldo', 'saldo/list', 13),
(31, 'Denda', 'denda/pembayaran_denda', 13),
(32, 'Pengambilan Alat', 'pengambilan/list', 13),
(33, 'Rekap Data Member', 'laporan/laporan_member', 19),
(34, 'Laporan Transaksi pengajuan', 'laporan/laporan_pengajuan', 19),
(35, 'Laporan Pembayaran', 'laporan/laporan_pembayaran', 19);

-- --------------------------------------------------------

--
-- Table structure for table `ref_operator`
--

CREATE TABLE IF NOT EXISTS `ref_operator` (
`operator_id` tinyint(8) NOT NULL,
  `operator_name` varchar(25) DEFAULT NULL,
  `operator_gender` enum('Laki-laki','Perempuan') NOT NULL,
  `operator_username` varchar(8) DEFAULT NULL,
  `operator_password` char(32) DEFAULT NULL,
  `operator_login` enum('N','Y') DEFAULT NULL,
  `operator_hint_question` varchar(40) DEFAULT NULL,
  `operator_answer_question` varchar(30) DEFAULT NULL,
  `level_id_fk` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_operator`
--

INSERT INTO `ref_operator` (`operator_id`, `operator_name`, `operator_gender`, `operator_username`, `operator_password`, `operator_login`, `operator_hint_question`, `operator_answer_question`, `level_id_fk`) VALUES
(6, 'yudi', 'Laki-laki', 'yuyu', 'b6c43562aa8b71cc1797f8d8b9c2526a', 'N', 'Siapa nama ayah kandung anda?', 'joko', 2),
(7, 'kiki', 'Laki-laki', 'kikiki', 'a0bace38478f0e4acdf2a09135496cab', 'N', 'Siapa nama penyanyi kesukaan anda?', 'exo', 1),
(13, 'amanda aliasari', 'Perempuan', 'amanda', '21232f297a57a5a743894a0e4a801fc3', 'N', 'Apa warna favorit anda?', 'hijau', 1),
(16, 'hardi', 'Laki-laki', 'diwo', '550e1bafe077ff0b0b67f4e32f29d751', 'N', 'Apa warna favorit anda?', 'hijau', 2),
(18, 'lala ', 'Perempuan', 'lili', 'fc89ae5e64b38961a4ec8c5b90bafa69', 'N', 'Apa makanan favorit anda?', 'cumi', 1),
(19, 'ahmad bastiar', 'Laki-laki', 'bastiar', '36ece457d87f73739caa1abc52a946e2', 'Y', 'Apa warna favorit anda?', 'RED', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE IF NOT EXISTS `tbl_member` (
`member_id` int(4) NOT NULL,
  `member_name` varchar(50) NOT NULL,
  `member_birth_date` date NOT NULL,
  `member_gender` enum('Laki-laki','Perempuan') NOT NULL,
  `member_phone_number` varchar(13) NOT NULL,
  `member_address` text NOT NULL,
  `member_username` varchar(15) NOT NULL,
  `member_password` char(32) NOT NULL,
  `member_hint_question` mediumtext NOT NULL,
  `member_answer_question` mediumtext NOT NULL,
  `member_institution` varchar(50) NOT NULL,
  `member_faculty` varchar(50) NOT NULL,
  `member_email` varchar(30) NOT NULL,
  `member_idcard_photo` varchar(25) NOT NULL,
  `member_photo` varchar(25) NOT NULL,
  `member_status` varchar(15) NOT NULL,
  `member_login` enum('Y','N') NOT NULL,
  `member_register_date` date NOT NULL,
  `member_confirm_date` date NOT NULL,
  `category_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_name`, `member_birth_date`, `member_gender`, `member_phone_number`, `member_address`, `member_username`, `member_password`, `member_hint_question`, `member_answer_question`, `member_institution`, `member_faculty`, `member_email`, `member_idcard_photo`, `member_photo`, `member_status`, `member_login`, `member_register_date`, `member_confirm_date`, `category_id_fk`) VALUES
(41, 'amanda', '2017-02-21', 'Laki-laki', '121212', '12121212', 'amanda', '1c76541a2a6d232688dd5137d90ee1bf', 'Siapa Penyanyi Favorit Anda?', 'AMANDA', 'UTY', 'S1 TEKNIK INFORMATIKA', 'amanda@gmail.com', 'amandas.jpg', 'amandas.jpg', 'Actived', 'N', '2017-02-21', '0000-00-00', 2),
(42, 'amanda alyasari', '1992-02-21', 'Perempuan', '085226213902', 'jln sedayu yogyakarta', 'manda', 'e10adc3949ba59abbe56e057f20f883e', 'Dimana Kota Anda Dilahirkan ?', 'purworejo', 'UGM', 'Mahasiswa Kedokteran  S1 UGM', 'amanda.alyasari@gmail.com', 'to amanda.png', 'amandad.jpg', 'Aktived', 'Y', '2017-02-21', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_saldo`
--

CREATE TABLE IF NOT EXISTS `tbl_saldo` (
`saldo_id` int(11) NOT NULL,
  `loan_app_id_fk` char(5) NOT NULL,
  `saldo_nominal` int(11) NOT NULL,
  `member_id_fk` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_saldo`
--

INSERT INTO `tbl_saldo` (`saldo_id`, `loan_app_id_fk`, `saldo_nominal`, `member_id_fk`) VALUES
(2, '00001', 200000, 42),
(3, '00001', 0, 42);

-- --------------------------------------------------------

--
-- Table structure for table `trx_lease`
--

CREATE TABLE IF NOT EXISTS `trx_lease` (
`lease_id` tinyint(4) NOT NULL,
  `loan_id_fk` tinyint(4) NOT NULL,
  `member_id_fk` tinyint(4) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `lease_date` date NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_lease_detail`
--

CREATE TABLE IF NOT EXISTS `trx_lease_detail` (
`lease_detail_id` tinyint(4) NOT NULL,
  `lease_id_fk` tinyint(4) NOT NULL,
  `instrument_id_fk` tinyint(4) NOT NULL,
  `lease_quantity` int(5) NOT NULL,
  `lease_amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_loan_application`
--

CREATE TABLE IF NOT EXISTS `trx_loan_application` (
  `loan_app_id` char(5) NOT NULL,
  `loan_invoice` varchar(20) NOT NULL,
  `loan_date_input` datetime NOT NULL,
  `loan_date_start` date NOT NULL,
  `loan_date_return` date NOT NULL,
  `loan_file` varchar(100) NOT NULL,
  `loan_total_item` int(11) NOT NULL,
  `loan_total_fee` int(11) NOT NULL,
  `long_loan` int(11) NOT NULL,
  `loan_status` char(20) NOT NULL,
  `member_id_fk` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_loan_application`
--

INSERT INTO `trx_loan_application` (`loan_app_id`, `loan_invoice`, `loan_date_input`, `loan_date_start`, `loan_date_return`, `loan_file`, `loan_total_item`, `loan_total_fee`, `long_loan`, `loan_status`, `member_id_fk`) VALUES
('00001', '00001/INV/17', '2017-02-23 23:00:33', '2017-02-24', '2017-02-20', 'TUTORIAL PHP-MYSQL-IMPLEMENTASI.pdf', 3, 800000, 4, 'DIKEMBALIKAN', 42);

-- --------------------------------------------------------

--
-- Table structure for table `trx_loan_application_detail`
--

CREATE TABLE IF NOT EXISTS `trx_loan_application_detail` (
`loan_app_detail_id` int(11) NOT NULL,
  `loan_app_id_fk` char(5) NOT NULL,
  `instrument_id_fk` int(11) NOT NULL,
  `loan_amount` int(11) NOT NULL,
  `loan_subtotal` int(11) NOT NULL,
  `loan_status_detail` char(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_loan_application_detail`
--

INSERT INTO `trx_loan_application_detail` (`loan_app_detail_id`, `loan_app_id_fk`, `instrument_id_fk`, `loan_amount`, `loan_subtotal`, `loan_status_detail`) VALUES
(53, '00001', 15, 1, 250000, 'DIKEMBALIKAN'),
(54, '00001', 16, 1, 100000, 'DIKEMBALIKAN'),
(55, '00001', 17, 1, 50000, 'DIKEMBALIKAN');

-- --------------------------------------------------------

--
-- Table structure for table `trx_loan_cart`
--

CREATE TABLE IF NOT EXISTS `trx_loan_cart` (
`cart_id` tinyint(4) NOT NULL,
  `loan_app_id_fk` int(6) DEFAULT NULL,
  `instrument_id_fk` tinyint(4) NOT NULL,
  `cart_name` varchar(25) NOT NULL,
  `cart_quantity` int(4) NOT NULL,
  `cart_fee` float NOT NULL,
  `cart_sub_total` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_loan_saldo`
--

CREATE TABLE IF NOT EXISTS `trx_loan_saldo` (
`loan_saldo_id` int(11) NOT NULL,
  `saldo_id_fk` int(11) NOT NULL,
  `file_saldo` varchar(100) NOT NULL,
  `nominal_penarikan` int(11) NOT NULL,
  `saldo_status` char(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_loan_temp`
--

CREATE TABLE IF NOT EXISTS `trx_loan_temp` (
  `instrument_id_fk` int(5) NOT NULL,
  `member_id_fk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_payment`
--

CREATE TABLE IF NOT EXISTS `trx_payment` (
`payment_id` int(4) NOT NULL,
  `bankname` char(30) NOT NULL,
  `payment_bill` int(8) NOT NULL,
  `payment_amount_transfer` int(10) NOT NULL,
  `payment_amount_saldo` int(10) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_photo` varchar(25) NOT NULL,
  `payment_info` mediumtext NOT NULL,
  `payment_confirm_date` date NOT NULL,
  `payment_verification_date` date NOT NULL,
  `payment_notif` mediumtext NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_saldo` int(10) NOT NULL,
  `loan_app_id_fk` int(4) NOT NULL,
  `member_id_fk` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_payment_confirm`
--

CREATE TABLE IF NOT EXISTS `trx_payment_confirm` (
`payment_confirm_id` tinyint(4) NOT NULL,
  `lease_id_fk` tinyint(4) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_number` varchar(15) NOT NULL,
  `on_behalf` varchar(30) NOT NULL,
  `payment_confirm_date` date NOT NULL,
  `payment_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_payment_temp`
--

CREATE TABLE IF NOT EXISTS `trx_payment_temp` (
`payment_temp_id` int(4) NOT NULL,
  `bankname` char(30) NOT NULL,
  `payment_bill` int(8) NOT NULL,
  `payment_temp_amount_transfer` int(10) NOT NULL,
  `payment_temp_amount_saldo` int(10) NOT NULL,
  `payment_temp_date` datetime NOT NULL,
  `payment_temp_confirm_date` datetime NOT NULL,
  `payment_temp_photo` varchar(25) NOT NULL,
  `payment_temp_info` mediumtext NOT NULL,
  `loan_app_id_fk` char(5) NOT NULL,
  `member_id_fk` tinyint(4) NOT NULL,
  `payment_notif` varchar(50) NOT NULL,
  `payment_status` char(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trx_payment_temp`
--

INSERT INTO `trx_payment_temp` (`payment_temp_id`, `bankname`, `payment_bill`, `payment_temp_amount_transfer`, `payment_temp_amount_saldo`, `payment_temp_date`, `payment_temp_confirm_date`, `payment_temp_photo`, `payment_temp_info`, `loan_app_id_fk`, `member_id_fk`, `payment_notif`, `payment_status`) VALUES
(2, 'BANK MANDIRI', 800000, 1000000, 200000, '2017-02-24 00:37:28', '2017-02-24 00:00:00', 'TUTORIAL PHP-MYSQL-IMPLEM', '-', '00001', 42, 'VALID', 'TANPA SALDO'),
(3, 'BANK MANDIRI', 200000, 200000, 0, '2017-02-24 03:40:55', '2017-02-24 00:00:00', 'x.jpg', 'Membayar Denda Peminjaman Alat.', '00001', 42, '', 'TANPA SALDO & MEMBAYAR DENDA');

-- --------------------------------------------------------

--
-- Table structure for table `trx_return`
--

CREATE TABLE IF NOT EXISTS `trx_return` (
`return_id` tinyint(4) NOT NULL,
  `leased_id_fk` tinyint(4) NOT NULL,
  `leased_date` date NOT NULL,
  `return_date` date NOT NULL,
  `date_of_return` date NOT NULL,
  `return_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_return_detail`
--

CREATE TABLE IF NOT EXISTS `trx_return_detail` (
  `return_detail_id` tinyint(4) NOT NULL,
  `return_id_fk` tinyint(4) NOT NULL,
  `instrument_name_fk` varchar(20) NOT NULL,
  `instrument_name` varchar(30) NOT NULL,
  `return_quantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_return_detail_loan`
--

CREATE TABLE IF NOT EXISTS `trx_return_detail_loan` (
`iddetail_return` int(11) NOT NULL,
  `instrument_id_fk` tinyint(5) NOT NULL,
  `return_status` char(20) NOT NULL,
  `return_amount` int(4) NOT NULL,
  `return_subtotal` int(11) NOT NULL,
  `idreturn_fk` char(4) NOT NULL,
  `return_date_instrument` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trx_return_loan`
--

CREATE TABLE IF NOT EXISTS `trx_return_loan` (
  `idreturn` char(4) NOT NULL,
  `loan_app_id_fk` int(4) NOT NULL,
  `date_return` date NOT NULL,
  `date_return_leas` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_category`
--
ALTER TABLE `ref_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `ref_instrument`
--
ALTER TABLE `ref_instrument`
 ADD PRIMARY KEY (`instrument_id`);

--
-- Indexes for table `ref_level`
--
ALTER TABLE `ref_level`
 ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `ref_menu`
--
ALTER TABLE `ref_menu`
 ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `ref_operator`
--
ALTER TABLE `ref_operator`
 ADD PRIMARY KEY (`operator_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
 ADD PRIMARY KEY (`saldo_id`);

--
-- Indexes for table `trx_lease`
--
ALTER TABLE `trx_lease`
 ADD PRIMARY KEY (`lease_id`);

--
-- Indexes for table `trx_lease_detail`
--
ALTER TABLE `trx_lease_detail`
 ADD PRIMARY KEY (`lease_detail_id`);

--
-- Indexes for table `trx_loan_application`
--
ALTER TABLE `trx_loan_application`
 ADD PRIMARY KEY (`loan_app_id`);

--
-- Indexes for table `trx_loan_application_detail`
--
ALTER TABLE `trx_loan_application_detail`
 ADD PRIMARY KEY (`loan_app_detail_id`);

--
-- Indexes for table `trx_loan_cart`
--
ALTER TABLE `trx_loan_cart`
 ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `trx_loan_saldo`
--
ALTER TABLE `trx_loan_saldo`
 ADD PRIMARY KEY (`loan_saldo_id`);

--
-- Indexes for table `trx_payment`
--
ALTER TABLE `trx_payment`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `trx_payment_confirm`
--
ALTER TABLE `trx_payment_confirm`
 ADD PRIMARY KEY (`payment_confirm_id`);

--
-- Indexes for table `trx_payment_temp`
--
ALTER TABLE `trx_payment_temp`
 ADD PRIMARY KEY (`payment_temp_id`);

--
-- Indexes for table `trx_return`
--
ALTER TABLE `trx_return`
 ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `trx_return_detail_loan`
--
ALTER TABLE `trx_return_detail_loan`
 ADD PRIMARY KEY (`iddetail_return`);

--
-- Indexes for table `trx_return_loan`
--
ALTER TABLE `trx_return_loan`
 ADD PRIMARY KEY (`idreturn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_category`
--
ALTER TABLE `ref_category`
MODIFY `category_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ref_instrument`
--
ALTER TABLE `ref_instrument`
MODIFY `instrument_id` tinyint(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `ref_level`
--
ALTER TABLE `ref_level`
MODIFY `level_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_menu`
--
ALTER TABLE `ref_menu`
MODIFY `menu_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ref_operator`
--
ALTER TABLE `ref_operator`
MODIFY `operator_id` tinyint(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
MODIFY `member_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_saldo`
--
ALTER TABLE `tbl_saldo`
MODIFY `saldo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trx_lease`
--
ALTER TABLE `trx_lease`
MODIFY `lease_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_lease_detail`
--
ALTER TABLE `trx_lease_detail`
MODIFY `lease_detail_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_loan_application_detail`
--
ALTER TABLE `trx_loan_application_detail`
MODIFY `loan_app_detail_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `trx_loan_cart`
--
ALTER TABLE `trx_loan_cart`
MODIFY `cart_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_loan_saldo`
--
ALTER TABLE `trx_loan_saldo`
MODIFY `loan_saldo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_payment`
--
ALTER TABLE `trx_payment`
MODIFY `payment_id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_payment_confirm`
--
ALTER TABLE `trx_payment_confirm`
MODIFY `payment_confirm_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_payment_temp`
--
ALTER TABLE `trx_payment_temp`
MODIFY `payment_temp_id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trx_return`
--
ALTER TABLE `trx_return`
MODIFY `return_id` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trx_return_detail_loan`
--
ALTER TABLE `trx_return_detail_loan`
MODIFY `iddetail_return` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
