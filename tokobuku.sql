-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 10:25 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_buku`
--

CREATE TABLE `data_buku` (
  `kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_cover` varchar(100) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_buku`
--

INSERT INTO `data_buku` (`kode_buku`, `judul_buku`, `tahun`, `harga`, `foto_cover`, `penerbit`, `penulis`, `stok`, `kode_kategori`, `diskon`) VALUES
(1, 'Bulan', 2017, 58000, '1.jpg', 'Tere Liye', 'Tere Liye', 8, 1, 10),
(2, 'bintang', 2018, 99000, '2.jpg', 'tasyas', 'tsy', 11, 1, 20),
(3, 'matahari', 2016, 45000, 'user22.png', 'tasss', 'tsyy', -2, 1, 10),
(4, 'Sepatu', 2018, 55000, 'user41.png', 'rerere', 'yeyey', 11, 2, 20),
(6, 'tasya', 2017, 98000, 'user53.png', 'tere', 'werw', 5, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `kode_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`kode_user`, `nama_user`, `username`, `password`, `level`) VALUES
(1, 'Tasya', 'tasya', '123', 'Admin'),
(2, 'amalia', 'amalia', '123', 'Kasir'),
(3, 'salsa', 'salsa', '123', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`kode_transaksi`, `kode_buku`, `jumlah`) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 1, 2),
(2, 2, 1),
(3, 1, 2),
(3, 2, 1),
(4, 1, 2),
(4, 2, 1),
(5, 1, 2),
(5, 2, 1),
(6, 1, 2),
(6, 2, 1),
(7, 1, 2),
(7, 2, 1),
(9, 2, 1),
(10, 2, 1),
(11, 2, 1),
(12, 2, 3),
(13, 2, 4),
(14, 4, 1),
(15, 4, 2),
(16, 3, 1),
(17, 1, 1),
(18, 1, 1),
(19, 1, 1),
(20, 1, 1),
(22, 2, 1),
(23, 2, 1),
(24, 2, 1),
(25, 2, 1),
(26, 3, 1),
(27, 3, 1),
(28, 1, 1),
(29, 1, 1),
(29, 4, 1),
(30, 4, 1),
(31, 4, 1),
(42, 3, 2),
(43, 3, 2),
(44, 3, 2),
(45, 3, 2),
(46, 3, 2),
(47, 3, 2),
(48, 3, 2),
(49, 3, 2),
(50, 2, 2),
(50, 3, 2),
(51, 4, 1),
(51, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'novel'),
(2, 'Refrensi'),
(3, 'fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kode_transaksi`, `kode_user`, `nama_pembeli`, `total`, `tanggal_beli`, `bayar`) VALUES
(1, 2, 'tsy', 215000, '2018-05-14', 0),
(2, 2, 'tsy', 215000, '2018-05-14', 0),
(3, 2, 'tr', 215000, '2018-05-14', 0),
(4, 2, 'twsyy', 215000, '2018-05-14', 0),
(5, 2, 'rtyu', 215000, '2018-05-14', 0),
(6, 2, 'rtyu', 215000, '2018-05-14', 0),
(7, 2, 'retgtrh', 215000, '2018-05-14', 0),
(9, 2, 'vvv', 99000, '2018-05-14', 0),
(10, 2, 'trtyrt', 99000, '2018-05-14', 0),
(11, 2, 'yuyuyuyuy', 99000, '2018-05-14', 0),
(12, 2, 'ertrete', 297000, '2018-05-14', 0),
(13, 2, 'tytyty', 99000, '2018-05-14', 0),
(14, 2, 'yuyuuy', 55000, '2018-05-14', 0),
(15, 2, 'rererere', 55000, '2018-05-14', 0),
(16, 2, 'uyuyuy', 45000, '2018-05-14', 0),
(17, 2, 'rrrrr', 58000, '2018-05-14', 0),
(18, 2, 'ytgeudgwdfhw', 58000, '2018-05-14', 0),
(19, 2, 'ytgeudgwdfhw', 58000, '2018-05-14', 0),
(20, 2, 'er', 58000, '2018-05-14', 0),
(22, 2, 'trtrtr', 79200, '2018-05-14', 0),
(23, 2, 'trtrtr', 79200, '2018-05-14', 0),
(24, 2, 'aku', 79200, '2018-05-14', 0),
(25, 2, 'asdasdad', 79200, '2018-05-14', 80000),
(26, 2, 'trtr', 40500, '2018-05-14', 50000),
(27, 2, 'hhhh', 40500, '2018-05-14', 50000),
(28, 2, 'tasyyy', 52200, '2018-05-14', 100000),
(29, 2, 'ferer', 96200, '2018-05-14', 100000),
(30, 2, 'resyaa', 44000, '2018-05-14', 50000),
(31, 2, 'terrry', 44000, '2018-05-14', 50000),
(32, 2, 'rererede', 12000, '2018-05-14', 20000),
(33, 2, 'fefef', 12000, '2018-05-14', 20000),
(34, 2, 'ferede', 12000, '2018-05-14', 20000),
(35, 2, 'hhhhhdty', 12000, '2018-05-14', 20000),
(36, 2, 'drtbthryjuyun', 12000, '2018-05-14', 20000),
(37, 2, 'fgbbbbbbb', 12000, '2018-05-14', 20000),
(42, 3, 'asdsada', 90000, '2018-05-14', 100000),
(43, 3, 'asdasds', 90000, '2018-05-14', 100000),
(44, 3, 'efger', 81000, '2018-05-14', 100000),
(45, 3, 't5tg4', 81000, '2018-05-14', 100000),
(46, 3, 'edfdfwe', 81000, '2018-05-14', 100000),
(47, 3, 'frwrf', 81000, '2018-05-14', 100000),
(48, 3, 'aang', 81000, '2018-05-14', 100000),
(49, 3, 'aang', 81000, '2018-05-14', 100000),
(50, 3, 'aang', 239400, '2018-05-14', 240000),
(51, 3, 'tasya', 132200, '2018-05-14', 150000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kode_kategori` (`kode_kategori`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`,`kode_buku`),
  ADD KEY `kode_transaksi_2` (`kode_transaksi`,`kode_buku`),
  ADD KEY `detil_transaksi_ibfk_1` (`kode_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `kode_user` (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_buku`
--
ALTER TABLE `data_buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kode_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_buku`
--
ALTER TABLE `data_buku`
  ADD CONSTRAINT `data_buku_ibfk_1` FOREIGN KEY (`kode_kategori`) REFERENCES `kategori_buku` (`kode_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `data_buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode_user`) REFERENCES `data_user` (`kode_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
