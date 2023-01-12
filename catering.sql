-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 03:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catering`
--

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_diskon` varchar(125) DEFAULT NULL,
  `diskon` varchar(125) DEFAULT NULL,
  `tgl_selesai` varchar(50) DEFAULT NULL,
  `member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_produk`, `nama_diskon`, `diskon`, `tgl_selesai`, `member`) VALUES
(1, 1, '0', '0', '0', 1),
(2, 1, '0', '0', '0', 2),
(3, 1, '0', '0', NULL, 3),
(4, 2, '0', '0', NULL, 1),
(5, 2, 'sini hayu', '10', '2022-10-19', 2),
(6, 2, '0', '0', NULL, 3),
(7, 3, '0', '0', NULL, 1),
(8, 3, '0', '0', NULL, 2),
(9, 3, '0', '0', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `keterangan`, `img`) VALUES
(3, 1, 'satu', 'cat-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(2, 'snack', 'cat-3.jpg'),
(3, 'catring', 'cat-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `provinsi` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `point` int(11) DEFAULT NULL,
  `level_member` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_tlpn`, `jenis_kelamin`, `kode_pos`, `provinsi`, `kabupaten`, `kecamatan`, `alamat`, `email`, `password`, `point`, `level_member`) VALUES
(1, 'sindi', '089129281921', 'perempuan', '12345', 'jawa barat', 'kuninga', 'luragung', 'jl.siliwangi no 68 kuningan', 'sindi@gmail.com', 'nyusu', 17580, 2),
(2, 'sayang kamu', '0891828381821', 'perempuan', '12341234', 'jawa barat', 'kuninga', 'luragung', 'langseb nyeseb luragung 1', 'sayang@gmail.com', '1234512345', 0, 3),
(3, 'susu', '089192819219', 'laki-laki', '4231', 'jakarta', 'kuningan', 'lebak bulus', 'bulus bulus', 'jamal@gmail.com', '12341234', 1860, 2),
(4, 'asu', '08919291929182', 'asu', '123123', 'jabar', 'jabar', 'jakab', 'saasa', 'asu@gmail.com', '123123123', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `stock` varchar(50) DEFAULT NULL,
  `harga` varchar(10) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `images` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `stock`, `harga`, `satuan`, `deskripsi`, `images`) VALUES
(1, 3, 'sambal', '-1', '12000', 'pcs', 'sambal garing', 'product-3.jpg'),
(2, 3, 'jambu', '-2', '120000', 'kg', 'sasa', 'product-4.jpg'),
(3, 2, 'susu', '9990', '120000', 'kg', 'susu perawan', 'product-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `id_rinci` varchar(50) NOT NULL,
  `id_transaksi` varchar(50) DEFAULT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_diskon` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`id_rinci`, `id_transaksi`, `no_order`, `id_diskon`, `id_produk`, `qty`) VALUES
('0K1kr', NULL, '20221017NS41ZPLA', 4, 2, 1),
('5olGi', NULL, '20221017NS41ZPLA', 1, 1, 1),
('7i2qS', NULL, '20221017FWP79UYE', 3, 1, 1),
('c4MKR', NULL, '20221018GBW9MSO0', 1, 1, 1),
('E6KBf', NULL, '20221021CZTFWMJ2', 7, 3, 2),
('EwLIQ', NULL, '20221017051RL9KM', 3, 1, 1),
('IAgiX', NULL, '20221018O857ZJT3', 4, 2, 3),
('mEXwS', NULL, '20221021Z45DYBPR', 7, 3, 10),
('NVys5', NULL, '20221021FEHRWJYD', 4, 2, 2),
('Q6Vc4', NULL, '20221018O857ZJT3', 1, 1, 1),
('Qs0rR', NULL, '20220922W0XFJ2HN', 3, 1, 1),
('s90KY', NULL, '20221018GBW9MSO0', 4, 2, 2),
('X5M2s', NULL, '20221021FEHRWJYD', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `riview`
--

CREATE TABLE `riview` (
  `id_penilaian` int(11) NOT NULL,
  `id_rinci` varchar(50) DEFAULT NULL,
  `info_penilaian` varchar(125) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `review` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riview`
--

INSERT INTO `riview` (`id_penilaian`, `id_rinci`, `info_penilaian`, `tanggal`, `review`) VALUES
(1, 'Qs0rR', '4', '2022-10-18 02:07:16', 'enak'),
(2, '7i2qS', '2', '2022-10-18 02:07:16', 'ahh kurang banyak'),
(3, 'EwLIQ', '0', '0000-00-00 00:00:00', NULL),
(4, '5olGi', '4', '2022-10-18 02:07:16', 'pedas sayang'),
(5, '0K1kr', '4', '2022-10-18 02:07:16', 'enak'),
(6, 'c4MKR', '0', '0000-00-00 00:00:00', NULL),
(7, 's90KY', '0', '0000-00-00 00:00:00', NULL),
(8, 'Q6Vc4', '2', '2022-10-18 03:52:43', 'kurang puas'),
(9, 'IAgiX', '5', '2022-10-18 03:52:57', 'sangat puas'),
(10, 'X5M2s', '1', '2022-10-20 22:21:32', 'nyusu dong'),
(11, 'NVys5', '5', '2022-10-20 22:21:42', 'ngewe dong'),
(12, 'E6KBf', '4', '2022-10-20 22:30:53', 'enak'),
(13, 'mEXwS', '3', '2022-10-20 22:37:38', 'sasa');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(50) DEFAULT NULL,
  `tgl_order` date DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `no_tlpn` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `pembayaran` varchar(50) DEFAULT NULL,
  `waktu_pesan` date DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(10) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_order`, `nama_lengkap`, `no_tlpn`, `alamat`, `kode_pos`, `pembayaran`, `waktu_pesan`, `grand_total`, `total_bayar`, `status_order`, `status_bayar`, `atas_nama`, `nama_bank`, `bukti_bayar`, `no_resi`, `catatan`) VALUES
(1, 1, '20220922W0XFJ2HN', '2022-09-22', 'hasan', '21212', 'Ciawigebang, Kuningan', '123121', '1', '2022-09-24', 12000, 0, 5, 1, 'sindi', 'brsa', 'cat-3.jpg', NULL, 'ganti batre'),
(2, 1, '20221017FWP79UYE', '2022-10-17', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-26', 12000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(3, 1, '20221017051RL9KM', '2022-10-17', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-27', 12000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(4, 1, '20221017NS41ZPLA', '2022-10-17', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-28', 132000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(5, 1, '20221018GBW9MSO0', '2022-10-18', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '2', '2022-10-26', 252000, 0, 4, 1, 'sindi sayang', 'sayang', 'product-5.jpg', NULL, NULL),
(6, 3, '20221018O857ZJT3', '2022-10-18', 'susu', '089192819219', 'bulus bulus', '4231', '1', '2022-10-27', 372000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(7, 1, '20221021FEHRWJYD', '2022-10-21', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-27', 252000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(8, 1, '20221021CZTFWMJ2', '2022-10-21', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-29', 240000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL),
(9, 1, '20221021Z45DYBPR', '2022-10-21', 'sindi', '089129281921', 'jl.siliwangi no 68 kuningan', '12345', '1', '2022-10-29', 1200000, 0, 4, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'jaenal', 'admin', 'admin', 1),
(2, 'sindi', 'pemilik', 'pemilik', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `riview`
--
ALTER TABLE `riview`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riview`
--
ALTER TABLE `riview`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
