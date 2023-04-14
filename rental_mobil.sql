-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 07:39 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `hak_akses`) VALUES
(7, 'windi', 'windi', '8cb2237d0679ca88db6464eac60da96345513964', 2),
(8, 'pimpinan', 'pimpinan', '59335c9f58c78597ff73f6706c6c8fa278e08b3a', 1),
(9, 'bai', 'bai', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `no_telpn` varchar(20) NOT NULL,
  `no_ktp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `alamat`, `gender`, `no_telpn`, `no_ktp`) VALUES
(7, 'Agus', 'Jl.Sungai Raya Dalam', 'Laki-Laki', '085676889012', '2346786543'),
(8, 'Windi', 'Jl.Raden Kusno Gg.Nata Jaya', 'Laki-Laki', '089688994565', '1234567891122');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`id_merek`, `nama_merek`) VALUES
(1, 'Daihatsu'),
(3, 'Toyota'),
(4, 'Nissan'),
(5, 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `harga` varchar(120) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_kursi` int(2) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_type`, `id_merek`, `nama`, `no_plat`, `warna`, `tahun`, `harga`, `status`, `jumlah_kursi`, `foto`) VALUES
(6, 4, 1, 'Sedan Classy 93', 'KB 0896 OI', 'Merah', '2019', '250000', '0', 4, 'sedan.jpeg'),
(7, 5, 3, 'Calya', 'KB 4785 UI', 'Abu-abu', '2021', '250000', '0', 8, 'calya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_rental` varchar(15) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_sewa` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `total_bayar` double NOT NULL,
  `sisa_pembayaran` double NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_rental`, `id_admin`, `id_customer`, `id_mobil`, `tgl_sewa`, `tgl_kembali`, `jumlah_sewa`, `total_harga`, `total_bayar`, `sisa_pembayaran`, `status`) VALUES
('20220712000001', 9, 8, 7, '2022-07-12', '2022-07-18', 6, 1500000, 1500000, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nama_type` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id_type`, `nama_type`) VALUES
(3, 'Carry'),
(4, 'Sedan'),
(5, 'Calya'),
(6, 'SUV');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mobil`
-- (See below for the actual view)
--
CREATE TABLE `v_mobil` (
`id_mobil` int(11)
,`id_type` int(11)
,`id_merek` int(11)
,`nama` varchar(120)
,`no_plat` varchar(20)
,`warna` varchar(20)
,`tahun` varchar(4)
,`harga` varchar(120)
,`status` varchar(50)
,`jumlah_kursi` int(2)
,`foto` varchar(255)
,`nama_merek` varchar(35)
,`nama_type` varchar(120)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penyewaan`
-- (See below for the actual view)
--
CREATE TABLE `v_penyewaan` (
`id_rental` varchar(15)
,`id_admin` int(11)
,`id_customer` int(11)
,`id_mobil` int(11)
,`tgl_sewa` date
,`tgl_kembali` date
,`jumlah_sewa` int(11)
,`total_harga` double
,`total_bayar` double
,`sisa_pembayaran` double
,`status` int(1)
,`nama` varchar(120)
,`no_plat` varchar(20)
,`harga` varchar(120)
,`nama_customer` varchar(120)
,`alamat` varchar(120)
,`no_telpn` varchar(20)
,`no_ktp` varchar(50)
,`nama_admin` varchar(120)
);

-- --------------------------------------------------------

--
-- Structure for view `v_mobil`
--
DROP TABLE IF EXISTS `v_mobil`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mobil`  AS  (select `mobil`.`id_mobil` AS `id_mobil`,`mobil`.`id_type` AS `id_type`,`mobil`.`id_merek` AS `id_merek`,`mobil`.`nama` AS `nama`,`mobil`.`no_plat` AS `no_plat`,`mobil`.`warna` AS `warna`,`mobil`.`tahun` AS `tahun`,`mobil`.`harga` AS `harga`,`mobil`.`status` AS `status`,`mobil`.`jumlah_kursi` AS `jumlah_kursi`,`mobil`.`foto` AS `foto`,`merek`.`nama_merek` AS `nama_merek`,`type`.`nama_type` AS `nama_type` from ((`mobil` join `merek`) join `type`) where ((`mobil`.`id_merek` = `merek`.`id_merek`) and (`mobil`.`id_type` = `type`.`id_type`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_penyewaan`
--
DROP TABLE IF EXISTS `v_penyewaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penyewaan`  AS  (select `penyewaan`.`id_rental` AS `id_rental`,`penyewaan`.`id_admin` AS `id_admin`,`penyewaan`.`id_customer` AS `id_customer`,`penyewaan`.`id_mobil` AS `id_mobil`,`penyewaan`.`tgl_sewa` AS `tgl_sewa`,`penyewaan`.`tgl_kembali` AS `tgl_kembali`,`penyewaan`.`jumlah_sewa` AS `jumlah_sewa`,`penyewaan`.`total_harga` AS `total_harga`,`penyewaan`.`total_bayar` AS `total_bayar`,`penyewaan`.`sisa_pembayaran` AS `sisa_pembayaran`,`penyewaan`.`status` AS `status`,`mobil`.`nama` AS `nama`,`mobil`.`no_plat` AS `no_plat`,`mobil`.`harga` AS `harga`,`customer`.`nama` AS `nama_customer`,`customer`.`alamat` AS `alamat`,`customer`.`no_telpn` AS `no_telpn`,`customer`.`no_ktp` AS `no_ktp`,`admin`.`nama_admin` AS `nama_admin` from (((`penyewaan` join `customer`) join `admin`) join `mobil`) where ((`penyewaan`.`id_admin` = `admin`.`id_admin`) and (`penyewaan`.`id_customer` = `customer`.`id_customer`) and (`penyewaan`.`id_mobil` = `mobil`.`id_mobil`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
