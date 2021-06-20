-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 09:51 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_kepribadian`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Ciri-Ciri'),
(4, 'Kepribadian'),
(5, 'Pengetahuan'),
(6, 'Laporan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ciri`
--

CREATE TABLE `tbl_ciri` (
  `id_ciri` int(11) NOT NULL,
  `kode_ciri` char(3) NOT NULL,
  `nama_ciri` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ciri`
--

INSERT INTO `tbl_ciri` (`id_ciri`, `kode_ciri`, `nama_ciri`) VALUES
(1, 'C01', 'Anda seseorang yang mudah berpikir positif'),
(2, 'C02', 'Anda seseorang yang mudah berpikir negatif'),
(3, 'C03', 'Anda seseorang yang banyak bicara daripada mendengarkan'),
(4, 'C04', 'Anda seseorang yang mudah berteman dan mudah berbaur'),
(5, 'C05', 'Anda seseorang yang penuh semangat'),
(6, 'C06', 'Anda seseorang yang penuh rasa ingin tahu'),
(7, 'C07', 'Anda seseorang yang menyenangkan dan selalu terlihat ceria'),
(8, 'C08', 'Anda seseorang yang menyukai hiburan dan membuat orang lain terhibur'),
(9, 'C09', 'Anda seseorang yang mampu meyakinkan orang lain dengan logika dan fakta'),
(10, 'C10', 'Anda seseorang yang berkemauan tegas dan kuat'),
(11, 'C11', 'Anda seseorang yang sangat memerlukan perubahan'),
(12, 'C12', 'Anda seseorang yang berbakat memimpin'),
(13, 'C13', 'Anda seseorang yang melakukan sesuatu yang berorientasi tujuan'),
(14, 'C14', 'Anda seseorang yang mudah percaya diri dan mandiri'),
(15, 'C15', 'Anda seseorang yang mudah tersinggung dan sensitif'),
(16, 'C16', 'Anda seseorang yang penuh pikiran dan suka menganalisa'),
(17, 'C17', 'Anda seseorang yang suka embuat rencana dan terjadwal'),
(18, 'C18', 'Anda seseorang yang menuntut kesempurnaan (perfeksionis dan idealis)'),
(19, 'C19', 'Anda seseorang yang menyukai detil terhadap hal kecil maupun besar'),
(20, 'C20', 'Anda seseorang yang cerewet dan suka mengkritik'),
(21, 'C21', 'Anda seseorang yang cinta damai serta menghindari segala bentuk kekacauan'),
(22, 'C22', 'Anda seseorang yang rendah hati'),
(23, 'C23', 'Anda seseorang yang penurut dan toleran'),
(24, 'C24', 'Anda seseorang yang pemalu dan pendiam'),
(25, 'C25', 'Anda seseorang yang penakut'),
(26, 'C26', 'Anda seseorang yang sabar dan ramah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil_diagnosa`
--

CREATE TABLE `tbl_hasil_diagnosa` (
  `id_hasil` int(11) NOT NULL,
  `hasil_probabilitas` float NOT NULL,
  `nama_kepribadian` varchar(100) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `waktu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hasil_diagnosa`
--

INSERT INTO `tbl_hasil_diagnosa` (`id_hasil`, `hasil_probabilitas`, `nama_kepribadian`, `nama_user`, `waktu`) VALUES
(13, 100, 'Sanguinis', 'Member', 1609539300),
(14, 100, 'Koleris', 'Member', 1609540586),
(15, 0, 'Pleghmatis', 'Member', 1609542032),
(16, 0, 'Pleghmatis', 'Member', 1609542075),
(17, 100, 'Sanguinis', 'Member', 1609542100),
(18, 0, 'Pleghmatis', 'Member', 1609542359),
(19, 100, 'Pleghmatis', 'Member', 1609542413),
(20, 0, 'Pleghmatis', 'Member', 1609542665),
(21, 100, 'Pleghmatis', 'Member', 1609542688),
(22, 100, 'Sanguinis', 'Member', 1609577309);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepribadian`
--

CREATE TABLE `tbl_kepribadian` (
  `id_kepribadian` int(11) NOT NULL,
  `kode_kepribadian` char(3) NOT NULL,
  `nama_kepribadian` varchar(100) NOT NULL,
  `solusi` text NOT NULL,
  `probabilitas` float NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kepribadian`
--

INSERT INTO `tbl_kepribadian` (`id_kepribadian`, `kode_kepribadian`, `nama_kepribadian`, `solusi`, `probabilitas`, `gambar`) VALUES
(1, 'K01', 'Sanguinis', '', 0.25, 'IC_Power2.jpg'),
(2, 'K02', 'Koleris', '', 0.25, 'IC_Vga2.jpg'),
(3, 'K03', 'Melankolis', '', 0.25, 'screen_inverter4.jpg'),
(4, 'K04', 'Pleghmatis', '', 0.25, 'lcd6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengetahuan`
--

CREATE TABLE `tbl_pengetahuan` (
  `id` int(11) NOT NULL,
  `id_kepribadian` int(11) NOT NULL,
  `id_ciri` int(11) NOT NULL,
  `probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengetahuan`
--

INSERT INTO `tbl_pengetahuan` (`id`, `id_kepribadian`, `id_ciri`, `probabilitas`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0.67),
(8, 1, 8, 1),
(9, 1, 9, 0),
(10, 1, 10, 0),
(11, 1, 11, 0),
(12, 1, 12, 0),
(13, 1, 13, 0.17),
(14, 1, 14, 0),
(15, 1, 15, 0),
(16, 1, 16, 0),
(17, 1, 17, 0),
(18, 1, 18, 0),
(19, 1, 19, 0.33),
(20, 1, 20, 0.83),
(21, 1, 21, 0),
(22, 1, 22, 0),
(23, 1, 23, 0.5),
(24, 1, 24, 0),
(25, 1, 25, 0),
(26, 1, 26, 0),
(27, 2, 1, 0),
(28, 2, 2, 0),
(29, 2, 3, 0),
(30, 2, 4, 0),
(31, 2, 5, 0.67),
(32, 2, 6, 0),
(33, 2, 7, 0),
(34, 2, 8, 0),
(35, 2, 9, 0.83),
(36, 2, 10, 0),
(37, 2, 11, 0),
(38, 2, 12, 0),
(39, 2, 13, 1),
(40, 2, 14, 0.5),
(41, 2, 15, 0),
(42, 2, 16, 0.17),
(43, 2, 17, 0),
(44, 2, 18, 0),
(45, 2, 19, 1),
(46, 2, 20, 0),
(47, 2, 21, 0),
(48, 2, 22, 0),
(49, 2, 23, 0),
(50, 2, 24, 0.33),
(51, 2, 25, 0),
(52, 2, 26, 0),
(53, 3, 1, 0),
(54, 3, 2, 1),
(55, 3, 3, 0),
(56, 3, 4, 0.67),
(57, 3, 5, 0),
(58, 3, 6, 0),
(59, 3, 7, 0),
(60, 3, 8, 0),
(61, 3, 9, 0),
(62, 3, 10, 0.83),
(63, 3, 11, 0),
(64, 3, 12, 0.5),
(65, 3, 13, 0),
(66, 3, 14, 0),
(67, 3, 15, 0.17),
(68, 3, 16, 0),
(69, 3, 17, 0.33),
(70, 3, 18, 0),
(71, 3, 19, 0),
(72, 3, 20, 0),
(73, 3, 21, 0),
(74, 3, 22, 0),
(75, 3, 23, 0),
(76, 3, 24, 0),
(77, 3, 25, 1),
(78, 3, 26, 0),
(79, 4, 1, 0),
(80, 4, 2, 0),
(81, 4, 3, 1),
(82, 4, 4, 0),
(83, 4, 5, 0),
(84, 4, 6, 0),
(85, 4, 7, 0),
(86, 4, 8, 0),
(87, 4, 9, 0),
(88, 4, 10, 0),
(89, 4, 11, 0.33),
(90, 4, 12, 0),
(91, 4, 13, 0),
(92, 4, 14, 0),
(93, 4, 15, 0.17),
(94, 4, 16, 0),
(95, 4, 17, 0),
(96, 4, 18, 0.83),
(97, 4, 19, 0),
(98, 4, 20, 0),
(99, 4, 21, 1),
(100, 4, 22, 0.5),
(101, 4, 23, 0),
(102, 4, 24, 0),
(103, 4, 25, 0),
(104, 4, 26, 0.67);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `image` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `image`, `password`, `role_id`, `date_created`) VALUES
(7, 'Member', 'Member', 'default.jpg', '$2y$10$gam52naGqUaHYPkQ49WDn.NtUmAUqZ5jdoMwKGAkw8DW8daCdLmoW', 2, 1575266061),
(11, 'Admin', 'admin', 'default.jpg', '$2y$10$7Fgm5Z8u.h6JAg5Jj2DVEeOkZkf12cR4qYKzTK1..GkmpNuGXhoe2', 1, 1609539548);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_ciri`
--

CREATE TABLE `tmp_ciri` (
  `id_user` int(11) NOT NULL,
  `id_ciri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_ciri`
--

INSERT INTO `tmp_ciri` (`id_user`, `id_ciri`) VALUES
(7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_final`
--

CREATE TABLE `tmp_final` (
  `id` int(11) NOT NULL,
  `id_ciri` int(11) NOT NULL,
  `id_kepribadian` int(11) NOT NULL,
  `probabilitas` float NOT NULL,
  `hasil_probabilitas` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_final`
--

INSERT INTO `tmp_final` (`id`, `id_ciri`, `id_kepribadian`, `probabilitas`, `hasil_probabilitas`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 0, 0),
(3, 1, 3, 0, 0),
(4, 1, 4, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(8, 1, 3),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ciri`
--
ALTER TABLE `tbl_ciri`
  ADD PRIMARY KEY (`id_ciri`);

--
-- Indexes for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_kepribadian`
--
ALTER TABLE `tbl_kepribadian`
  ADD PRIMARY KEY (`id_kepribadian`);

--
-- Indexes for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_ciri` (`id_ciri`),
  ADD KEY `id_kepribadian` (`id_kepribadian`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tmp_final`
--
ALTER TABLE `tmp_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_ciri`
--
ALTER TABLE `tbl_ciri`
  MODIFY `id_ciri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_hasil_diagnosa`
--
ALTER TABLE `tbl_hasil_diagnosa`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kepribadian`
--
ALTER TABLE `tbl_kepribadian`
  MODIFY `id_kepribadian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tmp_final`
--
ALTER TABLE `tmp_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pengetahuan`
--
ALTER TABLE `tbl_pengetahuan`
  ADD CONSTRAINT `tbl_pengetahuan_ibfk_1` FOREIGN KEY (`id_kepribadian`) REFERENCES `tbl_kepribadian` (`id_kepribadian`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
