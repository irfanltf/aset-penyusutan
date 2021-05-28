-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2021 at 11:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aset_penyusutan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiva_tetap`
--

CREATE TABLE `aktiva_tetap` (
  `id` int(11) NOT NULL,
  `kode_aktiva` varchar(10) NOT NULL,
  `kode_kategori` varchar(8) NOT NULL,
  `nama_aktiva` varchar(128) NOT NULL,
  `harga_peroleh` double NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `masa_manfaat` int(11) NOT NULL,
  `nilai_residu` double NOT NULL,
  `satuan` varchar(150) NOT NULL,
  `jumlah_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktiva_tetap`
--

INSERT INTO `aktiva_tetap` (`id`, `kode_aktiva`, `kode_kategori`, `nama_aktiva`, `harga_peroleh`, `tgl_pembelian`, `masa_manfaat`, `nilai_residu`, `satuan`, `jumlah_satuan`) VALUES
(1, '001', '003', 'Komputer', 4500000, '2021-01-01', 5, 0, 'unit', 1),
(2, '002', '005', 'Printer', 24000000, '2021-01-12', 5, 2000000, 'unit', 20),
(7, '003', '005', 'Kulkas', 125000000, '2021-01-12', 10, 5000000, 'unit', 5),
(8, '004', '004', 'Sepeda Motor', 80000000, '2021-01-12', 10, 10000000, 'unit', 2),
(9, '005', '005', 'LCD Proyektor', 50000000, '2021-01-12', 10, 5000000, 'unit', 20),
(11, '012', '002', 'Handphone', 8000000, '2021-05-12', 2, 500000, 'unit', 2);

-- --------------------------------------------------------

--
-- Table structure for table `aktiva_tetap_kategori`
--

CREATE TABLE `aktiva_tetap_kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aktiva_tetap_kategori`
--

INSERT INTO `aktiva_tetap_kategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, '001', 'Gedung dan Bangunan'),
(2, '002', 'Tanah'),
(3, '003', 'Peralatan'),
(4, '004', 'Kendaraan'),
(5, '005', 'Mesin'),
(7, '009', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `last_login`, `last_logout`) VALUES
(1, 'admin', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiva_tetap`
--
ALTER TABLE `aktiva_tetap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktiva_tetap_kategori`
--
ALTER TABLE `aktiva_tetap_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktiva_tetap`
--
ALTER TABLE `aktiva_tetap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `aktiva_tetap_kategori`
--
ALTER TABLE `aktiva_tetap_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
