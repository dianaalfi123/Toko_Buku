-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 01:38 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latpk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Diana Alfi Ainun Nur Khasanah', 'diana', '123', 'admin'),
(10, 'Anggita Yaumil Istiana', 'anggi', '345', 'admin'),
(11, 'Farhan Agung Maulana', 'farhan', '678', 'kasir'),
(21, 'Yanny Ayu May Saroh', 'yani', '789', 'kasir'),
(22, 'Livia Naini Azzahra', 'Livia', '567', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` text NOT NULL,
  `tahun` int(4) NOT NULL,
  `foto_cover` text NOT NULL,
  `harga` int(11) NOT NULL,
  `penerbit` text NOT NULL,
  `penulis` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `tahun`, `foto_cover`, `harga`, `penerbit`, `penulis`, `stok`) VALUES
(18, 10, 'Dilan 1990', 2014, 'dilan.jpeg', 58650, 'Misan', 'Pidi Baiq', 95),
(19, 10, 'Assalamualaikum Beijing', 2015, 'beijing.jpg', 43200, 'Falcon Publiching', 'Alim Studio', 52),
(20, 10, 'Serendipity', 2017, 'seren.jpg', 76650, 'Inari', 'Erisca Febriani', 80),
(21, 10, 'Revan dan Reina', 2017, 'revan.jpeg', 63750, 'Serambi Baru', 'Crista Bella', 85),
(22, 11, 'MySQL untuk Pemula', 2017, 'my.jpg', 41480, 'Elex Media', 'Jubilee Enterprice', 180),
(23, 11, 'Java Komplet', 2013, 'java.jpeg', 38080, 'Elex Media', 'Java Komplet', 73),
(24, 11, 'Pengenalan HTML dan CSS', 2016, 'ss.jpg', 38080, 'Elex Media', 'Jubilee Enterprice', 57),
(25, 11, 'Otodidak Pemrograman Python', 2017, 'py.jpg', 38080, 'Elex Media', 'Jubilee Enterprice', 200),
(26, 10, 'Darka', 2017, 'darka2.jpg', 71600, 'Loveable', 'Khairanihasan', 395),
(27, 11, 'Photoshop', 2013, 'photo.jpg', 67575, 'Kubus Media', 'Asep Effendhy', 500);

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `id_detil` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`id_detil`, `id_transaksi`, `id_buku`, `jumlah`) VALUES
(21, 23, 23, 228480),
(22, 23, 24, 76160),
(23, 24, 18, 293250),
(25, 26, 19, 86400),
(26, 26, 26, 71600);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori`, `nama_kategori`) VALUES
(10, 'Fiksi'),
(11, 'Non-Fiksi');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggal_beli` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_admin`, `nama_pembeli`, `total`, `tanggal_beli`) VALUES
(20, 11, 'w', 6000, '2018-05-10 11:52:43'),
(23, 1, 'Axel Wira', 304640, '2018-05-27 10:57:57'),
(24, 1, 'Muhammad Iqbal Pradana', 293250, '2018-05-27 10:58:51'),
(26, 1, 'ana', 158000, '2021-06-21 01:35:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_buku` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `detil_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_transaksi_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
