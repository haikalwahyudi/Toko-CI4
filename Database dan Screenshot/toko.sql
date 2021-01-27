-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 11:47 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`) VALUES
(13, 'Haikal Wahyudi', 'haikal@gmail.com', '$2y$10$Gvs6F/0FrTyxC8wliOQDaO7DFH6f/U/VYyXyr2QWppz.oHSQ.oOo.'),
(14, 'Indra Bakti Maulana', 'indra@gmail.com', '$2y$10$EvYkePLET4AzB8HD/ecuj.esyj25T7Z08cClKqLnZT71nh9ttD6/O');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `nama_pem` varchar(150) NOT NULL,
  `telpon` int(11) NOT NULL,
  `tgl_beli` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `alamat` text NOT NULL,
  `aksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_pembeli`, `nama_pem`, `telpon`, `tgl_beli`, `batas_bayar`, `alamat`, `aksi`) VALUES
(38, 11, 'Mutia Rahmi Laely', 2147483647, '2021-01-24 22:11:03', '2021-01-26 22:11:03', 'Masbgik Timur', 1),
(39, 11, 'Mutia', 123489098, '2021-01-24 22:13:38', '2021-01-26 22:13:38', 'Selong Pendopo', 0),
(40, 12, 'Hakizil Waridi', 123489098, '2021-01-24 22:15:46', '2021-01-26 22:15:46', 'Paok Motong', 1),
(41, 12, 'Hakizil', 2147483647, '2021-01-24 22:16:31', '2021-01-26 22:16:31', 'Rempung', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(3, 'Barang Elektronik'),
(4, 'Baju'),
(11, 'Celana Peria'),
(16, 'Sepatu'),
(17, 'Celana Wanita'),
(18, 'Jaket');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Selong', 10000),
(2, 'Paok Motong', 21000),
(3, 'Masbagik', 5000),
(4, 'Rempung', 6000),
(9, 'Pancor', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `telpon_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `password_pelanggan`, `telpon_pelanggan`) VALUES
(11, 'Mutia Rahmi Leali', 'mutia@gmial.com', '$2y$10$UkHej6fbWt25I05h9QPowu.qxpDKaGHZUWFGQN7pC0MlGGOQGJvqS', '12345678987'),
(12, 'Hakizil Waridi', 'hakizil@gmial.com', '$2y$10$GGH9OqJvZgSHoQXRUiawOOlEpCFtL8na6LYjJlGji3jPfCXvnBAa2', '123456789098');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `total_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_invoice`, `id_produk`, `tgl_pembelian`, `harga`, `jumlah`, `id_ongkir`, `total_pembelian`) VALUES
(70, 38, 65, '2021-01-24', 490000, 1, 3, 490000),
(71, 38, 60, '2021-01-24', 4530000, 1, 3, 4530000),
(72, 38, 46, '2021-01-24', 300000, 1, 3, 300000),
(73, 38, 49, '2021-01-24', 95000, 2, 3, 190000),
(74, 39, 65, '2021-01-24', 490000, 1, 1, 490000),
(75, 39, 58, '2021-01-24', 456000, 1, 1, 456000),
(76, 40, 57, '2021-01-24', 151000, 1, 2, 151000),
(77, 40, 52, '2021-01-24', 80000, 1, 2, 80000),
(78, 41, 50, '2021-01-24', 675000, 1, 4, 675000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `berat` varchar(20) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`, `harga_beli`, `harga_jual`, `berat`, `foto_produk`, `deskripsi`) VALUES
(49, 'Jaket Grap Warna Hijau', 18, 50000, 95000, '150gram', '1609419972_515b5edc63818f357269.png', '<p>Jaker merek grap dibuat dengan bahan kain yang berkualitas dan ramah lingkungan.</p>'),
(50, 'Jaket Kulit Dari Bahan Kulit Ayam', 18, 324000, 675000, '900gram', '1609420155_bb2d0d1992b1a38286a4.jpg', '<p>Jaket kulit cocok digunakan pada saat hanting dengan komunitas motor.</p>'),
(52, 'Baju Seragam Pramuka Siaga', 4, 40000, 80000, '50gram', '1609420552_dcd677094f85a3a40327.jpg', '<p>Baju pramuka khusus untuk orang orang yang suka dengan alam.</p>'),
(53, 'Celana Jeans Wanita Holes Denim Trousers Size m Blue Wanita', 17, 210000, 442000, '340gram', '1609420709_3cc13a1fbc866583b5bc.jpg', 'Cocok digunakan untuk anda yang suka dengan gaya trend masa kini, dibuat dengan bahan yang berkualitas.'),
(54, 'Jaket Gojek Warna Hijau', 18, 34000, 82000, '70gram', '1609420800_387bbaf205272b37f95d.jpg', '<p>Jaket gojek, cocok digunakan untuk anda yang menjadi driver ojol.</p>'),
(55, 'Diadora Simn Blue Sepatu Wanita Original', 16, 148000, 345000, '50gram', '1609420920_d2adda811646c35179d7.jpg', '<p>Sepatu diodora cocok digunakan untuk joging dan bersantai.</p>'),
(59, 'Jaket King Warna Hitam Peria', 18, 158000, 390000, '430gram', '1609421445_97c6e02535fc7e0ee158.jpg', 'Jaket king dibuah dengan bahan kain yang ramah lingkungan dan membuat anda tatap hangat ketika menggunakannya.'),
(60, 'Samsung Galaxy Note 20-256gb 8gb Ram', 3, 2300000, 4530000, '91gram', '1609421690_a1a7698caa6d2f5f399a.jpg', '<p>Smartphone merek samsung</p><p>Sfesifikasi :</p><p>Processor Snap Dragon 880</p><p>Layar Gorila glass</p><p>Batrai 10.000mah</p><p>Ram 6gb</p><p>Memori Internal 100gb dan bisa diupgrade sampai 256gb</p>'),
(63, 'samsung galaxy m40 F', 3, 1900000, 4530000, '95gram', '1609422049_e94f2b8c097530d4a9cf.png', '<p>-</p>'),
(64, 'Sepatu Olahraga Wanita Posts', 16, 212000, 399000, '91gram', '1609422118_57b3f81e17d23c36157a.jpg', '<p>Spatu Legend</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
