-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 09:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aplikasi_persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `KodeBarang` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `KodeSupplier` varchar(50) NOT NULL,
  `Jenis` varchar(250) NOT NULL,
  `HargaBeli` int(11) DEFAULT 0,
  `HargaJual` int(11) DEFAULT 0,
  `Stok` int(11) DEFAULT 0,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `Id` int(11) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodePelanggan` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `KodeBarangMasuk` varchar(50) NOT NULL,
  `Tanggal` datetime DEFAULT NULL,
  `KodeSupplier` varchar(50) DEFAULT NULL,
  `KodeBarang` varchar(50) DEFAULT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(50) DEFAULT NULL,
  `Petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `KodePelanggan` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Alamat` varchar(250) DEFAULT NULL,
  `Telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `KodePetugas` varchar(50) NOT NULL,
  `Nama` varchar(250) NOT NULL,
  `Jabatan` varchar(250) NOT NULL,
  `Password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `KodeSupplier` varchar(50) NOT NULL,
  `Nama` varchar(250) DEFAULT NULL,
  `Alamat` varchar(250) DEFAULT NULL,
  `Telp` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`KodeBarang`) USING BTREE;

--
-- Indexes for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `KodeBarang` (`KodeBarang`) USING BTREE,
  ADD KEY `KodeSupplier` (`KodePelanggan`) USING BTREE;

--
-- Indexes for table `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`KodeBarangMasuk`) USING BTREE,
  ADD KEY `KodeBarang` (`KodeBarang`) USING BTREE,
  ADD KEY `KodeSupplier` (`KodeSupplier`) USING BTREE;

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`KodePelanggan`) USING BTREE;

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`KodePetugas`) USING BTREE;

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`KodeSupplier`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
