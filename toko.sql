-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 07:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(8, 'Udang', 'udang@gmail.com', '$2y$10$brEGF7l60Ih/4W0vzJkude.UZy8MDeLMQVvpKK9dq8Gpq1qf912Lu'),
(11, 'birin', 'birin@gmail.com', '$2y$10$pFcY6LXNgrvXFsC8CcPKAeRi8/ZVoy8Cdf4i0xsdtYk7N8AE29bwy');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
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

INSERT INTO `invoice` (`id_invoice`, `nama_pem`, `telpon`, `tgl_beli`, `batas_bayar`, `alamat`, `aksi`) VALUES
(13, 'Haikal Wahyudi', 987654328, '2021-01-12 12:16:54', '2021-01-14 12:16:54', 'Masbagik', 0),
(14, 'Haikal Wahyudi', 987654328, '2021-01-12 12:19:46', '2021-01-14 12:19:46', 'Masbagik', 0),
(15, 'udin', 86876897, '2021-01-12 12:20:44', '2021-01-14 12:20:44', 'hjjkhjk', 0),
(16, 'Hakizil Waridin', 2147483647, '2021-01-12 12:51:29', '2021-01-14 12:51:29', 'Penakak lauk desa masbagik timur kecamatan masbagik kabupaten lombok timur provinsi nusa tenggara barat', 0);

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
(16, 'jghj'),
(17, 'lkiuhhg'),
(18, 'ghj'),
(19, 'aa'),
(20, 'tt'),
(21, 'birin');

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
(9, 'Pancor', 11);

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
(1, 'Hakizil Waridi', 'hakizil@gmail.com', '$2y$10$8iNWrC9XKkHcnRUVnWp.zOuw0vinAzlQE7P9WvHFeCzznPSthKFU2', '098765654323'),
(9, 'hh', 'hh@gmail.com', '$2y$10$/T/ygFjH7TLPDsfUnSTzmu21wcjN4Z8P.olY6FVhP45M1JgxYlwvW', '666666');

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
(30, 13, 60, '2021-01-12', 4530000, 3, 2, 13590000),
(31, 13, 65, '2021-01-12', 490000, 2, 2, 980000),
(32, 14, 60, '2021-01-12', 4530000, 3, 2, 13590000),
(33, 14, 65, '2021-01-12', 490000, 2, 2, 980000),
(34, 15, 60, '2021-01-12', 4530000, 1, 3, 4530000),
(35, 15, 65, '2021-01-12', 490000, 2, 3, 980000),
(36, 15, 54, '2021-01-12', 82000, 1, 3, 82000),
(37, 16, 65, '2021-01-12', 490000, 1, 2, 490000),
(38, 16, 64, '2021-01-12', 399000, 1, 2, 399000);

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
(46, 'Baju Kemeja Pria Warna Biru Tua', 4, 150000, 300000, '300gram', '1609418739_214a00b26f46fd34d04d.jpg', '<p>Baju kemeja cocok untuk anda yang suka dengan warna biru.</p>'),
(47, 'Baju Kemeja Warna Biru Langit Peria', 4, 100000, 250000, '300gram', '1609419762_b5409a00678788402790.jpg', '<p>Baju Kemeja cocok digunakan pada saat ketemuan, kencan, maupun santai.</p>'),
(48, 'Celana Jeans Warna Hitam Peria', 11, 200000, 400000, '500gram', '1609419872_6a76208ab12e746d7963.jpg', '<p>Celana jeans cocok digunakan ketika bepergian maupun santai dengan teman atau keluarga.</p>'),
(49, 'Jaket Grap Warna Hijau', 3, 50000, 95000, '150gram', '1609419972_515b5edc63818f357269.png', '<p>Jaker merek grap dibuat dengan bahan kain yang berkualitas dan ramah lingkungan.</p>'),
(50, 'Jaket Kulit Dari Bahan Kulit Ayam', 3, 324000, 675000, '900gram', '1609420155_bb2d0d1992b1a38286a4.jpg', '<p>Jaket kulit cocok digunakan pada saat hanting dengan komunitas motor.</p>'),
(51, 'Sepatu Sneakers Import Olahraga Pria', 3, 234000, 460000, '100gram', '1609420453_bcab762147f8d6acea3f.jpg', '<p>Sepatu sneaker cocok digunakan untuk joging maupun jalan santai</p>'),
(52, 'Baju Seragam Pramuka Siaga', 4, 40000, 80000, '50gram', '1609420552_dcd677094f85a3a40327.jpg', '<p>Baju pramuka khusus untuk orang orang yang suka dengan alam.</p>'),
(53, 'Celana Jeans Wanita Holes Denim Trousers Size m Blue Wanita', 4, 210000, 442000, '340gram', '1609420709_3cc13a1fbc866583b5bc.jpg', 'Cocok digunakan untuk anda yang suka dengan gaya trend masa kini, dibuat dengan bahan yang berkualitas.'),
(54, 'Jaket Gojek Warna Hijau', 4, 34000, 82000, '70gram', '1609420800_387bbaf205272b37f95d.jpg', '<p>Jaket gojek, cocok digunakan untuk anda yang menjadi driver ojol.</p>'),
(55, 'Diadora Simn Blue Sepatu Wanita Original', 11, 148000, 345000, '50gram', '1609420920_d2adda811646c35179d7.jpg', '<p>Sepatu diodora cocok digunakan untuk joging dan bersantai.</p>'),
(56, 'Cenana Jeans Warna Biru Kehitam-hitaman Peria', 11, 221000, 390000, '560gram', '1609421013_2768ae75160fd0c8a6dd.jpg', '<p>Celana jeans dibuat dari bahan kain yang berkualitas.</p>'),
(57, 'Baju Batik Khas Indonesia Merah Maroon Peria', 3, 56000, 151000, '30gram', '1609421170_095e9311f0ee8f479570.jpg', '<p>Baju batik warna merah maroon kualitas bagus.</p><p>Bahan kain sutra dibuat dari benang sutra.</p>'),
(58, 'Celana Jeans Motif Terkini 2020 dengan Warna Biru Muda Wanita', 4, 237000, 456000, '400gram', '1609421293_c0c18318990a06daa3dd.jpg', '<p>Cocok untuk anda yang suka gaya terndi masa kini, karena celana ini didesain dengn gaya masa kini.</p>'),
(59, 'Jaket King Warna Hitam Peria', 11, 158000, 390000, '430gram', '1609421445_97c6e02535fc7e0ee158.jpg', 'Jaket king dibuah dengan bahan kain yang ramah lingkungan dan membuat anda tatap hangat ketika menggunakannya.'),
(60, 'Samsung Galaxy Note 20-256gb 8gb Ram', 3, 2300000, 4530000, '91gram', '1609421690_a1a7698caa6d2f5f399a.jpg', '<p>Smartphone merek samsung</p><p>Sfesifikasi :</p><p>Processor Snap Dragon 880</p><p>Layar Gorila glass</p><p>Batrai 10.000mah</p><p>Ram 6gb</p><p>Memori Internal 100gb dan bisa diupgrade sampai 256gb</p>'),
(61, 'Samsung Galaxy A10s (2GB-32GB) Garansi Resmi', 3, 1230000, 2310000, '86gram', '1609421936_425cc0dec03047318f5a.jpg', '<p>Smartphone merek samsung</p><p>Sfesifikasi Processor Snap Dragon 880</p><p>Layar Gorila glass</p><p>Batrai 10.000mah</p><p>Ram 6gb</p><p>Memori Internal 100gb dan bisa diupgrade sampai 256gb<br></p>'),
(62, 'samsung galaxy m30s F', 4, 2100000, 5320000, '98gram', '1609421993_b37bf375dccaf79304e1.png', ''),
(63, 'samsung galaxy m40 F', 11, 1900000, 4530000, '95gram', '1609422049_e94f2b8c097530d4a9cf.png', '<p>-</p>'),
(64, 'Sepatu Olahraga Wanita Posts', 3, 212000, 399000, '91gram', '1609422118_57b3f81e17d23c36157a.jpg', '<p>-</p>'),
(65, 'Sepatu Sneakers Fashion Pria Wanita ZiggMAN Size 39-43 Indonesia Murah', 4, 230000, 490000, '88gram', '1609422196_4b2672bf9c78db879d9c.jpg', '<p>-</p>'),
(74, 'jhjkh', 4, 465, 675, '67', 'default.jpg', '<p>hjghj</p>'),
(75, 'jhjk', 4, 6786, 786, '7', 'default.jpg', '<p>jgjh</p>');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
