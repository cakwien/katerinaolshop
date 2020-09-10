-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Sep 2020 pada 05.11
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katerina_olshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` mediumint(9) NOT NULL,
  `kd_barang` varchar(30) NOT NULL,
  `nm_barang` varchar(255) NOT NULL,
  `id_jenis` smallint(5) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `stok_awal` int(11) NOT NULL,
  `stok_masuk` int(11) NOT NULL,
  `stok_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kd_barang`, `nm_barang`, `id_jenis`, `satuan`, `stok_awal`, `stok_masuk`, `stok_keluar`, `stok_akhir`) VALUES
(1, 'BJ001', 'Baju 1', 1, 'PCS', 10, 7, 7, 10),
(2, 'KS001', 'Kaos Oblong', 4, 'PCS', 10, 0, 3, 7),
(3, 'KS002', 'Kaos Osin Deles', 4, 'PCS', 10, 0, 2, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` mediumint(9) NOT NULL,
  `id_barang` mediumint(9) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_jual_member` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` smallint(5) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`) VALUES
(1, 'Peralatan Bayi'),
(2, 'Peralatan Mandi'),
(3, 'Baju Bayi'),
(4, 'Baju Dewasa Pria'),
(5, 'Baju Dewasa Wanita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` mediumint(9) NOT NULL,
  `kd_member` varchar(30) NOT NULL,
  `nm_member` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` mediumint(9) NOT NULL,
  `nota` varchar(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nota`, `harga_total`, `bayar`, `kembali`, `time`) VALUES
(1, '00000001', 39000, 50000, 11000, 1599240017),
(2, '00000002', 20000, 50000, 30000, 1599245100),
(3, '00000003', 20000, 20000, 0, 1599245264),
(4, '00000004', 39000, 50000, 11000, 1599245725),
(5, '00000005', 16000, 20000, 4000, 1599246956),
(6, '00000006', 16000, 20000, 4000, 1599679223);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` mediumint(9) NOT NULL,
  `time` int(11) NOT NULL,
  `id_barang` mediumint(9) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `total_harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `time`, `id_barang`, `jumlah_beli`, `harga_beli`, `total_harga_beli`, `harga_jual`, `total_harga_jual`) VALUES
(1, 1599239840, 1, 10, 10000, 0, 20000, 0),
(2, 1599245242, 2, 10, 10000, 0, 20000, 0),
(3, 1599246938, 3, 10, 10000, 0, 16000, 0),
(4, 1599679748, 1, 5, 10000, 50000, 20000, 100000),
(5, 1599679797, 1, 2, 10000, 20000, 20000, 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` mediumint(9) NOT NULL,
  `nota` varchar(11) NOT NULL,
  `id_barang` mediumint(9) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `total_harga_jual` int(11) NOT NULL,
  `total_harga_beli` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total_diskon` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `nota`, `id_barang`, `jumlah_jual`, `harga_jual`, `total_harga_jual`, `total_harga_beli`, `total_harga`, `diskon`, `total_diskon`, `time`) VALUES
(1, '00000001', 1, 2, 20000, 40000, 20000, 39000, 500, 1000, 1599239960),
(2, '00000002', 1, 1, 20000, 20000, 10000, 20000, 0, 0, 1599245094),
(3, '00000003', 2, 1, 20000, 20000, 10000, 20000, 0, 0, 1599245259),
(4, '00000004', 2, 2, 20000, 40000, 20000, 39000, 500, 1000, 1599245720),
(5, '00000005', 3, 1, 16000, 16000, 10000, 16000, 0, 0, 1599246952),
(6, '00000006', 3, 1, 16000, 16000, 10000, 16000, 0, 0, 1599679217);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` smallint(5) NOT NULL,
  `nm_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` smallint(5) NOT NULL,
  `nm_user` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', '1'),
(2, 'Kasirman', 'kasir', 'kasir', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_member` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` smallint(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
