-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< Updated upstream
-- Generation Time: May 24, 2021 at 10:56 PM
=======
-- Generation Time: May 27, 2021 at 06:44 AM
>>>>>>> Stashed changes
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
<<<<<<< Updated upstream
=======
-- Table structure for table `aktiva_tetap`
--

CREATE TABLE `aktiva_tetap` (
  `id` int(11) NOT NULL,
  `kode_aktiva` varchar(10) NOT NULL,
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

INSERT INTO `aktiva_tetap` (`id`, `kode_aktiva`, `nama_aktiva`, `harga_peroleh`, `tgl_pembelian`, `masa_manfaat`, `nilai_residu`, `satuan`, `jumlah_satuan`) VALUES
(1, '001', 'Komputer', 15000000, '2021-05-01', 5, 1200000, 'unit', 15),
(2, '11', '1', 0, '2021-05-12', 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan`
--

CREATE TABLE `penyusutan` (
  `id` int(11) NOT NULL,
  `kode_penyusutan` varchar(10) NOT NULL,
  `kode_aktiva` varchar(10) NOT NULL,
  `priode` int(11) NOT NULL,
  `nilai_penyusutan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
-- Indexes for table `aktiva_tetap`
--
ALTER TABLE `aktiva_tetap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id`);

--
>>>>>>> Stashed changes
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< Updated upstream
=======
-- AUTO_INCREMENT for table `aktiva_tetap`
--
ALTER TABLE `aktiva_tetap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
>>>>>>> Stashed changes
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
