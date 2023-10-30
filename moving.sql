-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2023 pada 09.04
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moving`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`) VALUES
(1, 'tempe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `id_harga` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`id_harga`, `id_barang`, `harga`) VALUES
(1, 1, '5000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ma`
--

CREATE TABLE `ma` (
  `id` int(11) NOT NULL,
  `tahun` varchar(16) NOT NULL,
  `aktual` float NOT NULL,
  `fore_3` float DEFAULT NULL,
  `fore_6` float DEFAULT NULL,
  `mse_3` float DEFAULT NULL,
  `mse_6` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ma`
--

INSERT INTO `ma` (`id`, `tahun`, `aktual`, `fore_3`, `fore_6`, `mse_3`, `mse_6`) VALUES
(1, '2002', 4134, 0, 0, 0, 0),
(2, '2003', 4650, 0, 0, 0, 0),
(3, '2004', 4681, 0, 0, 0, 0),
(4, '2005', 4426, 4488, 0, 3844, 0),
(5, '2006', 4969, 4586, 0, 146689, 0),
(6, '2007', 6255, 4692, 0, 2442970, 0),
(7, '2008', 7416, 5217, 4853, 4835600, 6568970),
(8, '2009', 6343, 6213, 5400, 16900, 889249),
(9, '2010', 6420, 6671, 5682, 63001, 544644),
(10, '2011', 6109, 6726, 5972, 380689, 18769),
(11, '2012', 5202, 6291, 6252, 1185920, 1102500),
(12, '2013', 4081, 5910, 6291, 3345240, 4884100),
(13, '2014', 4699, 5131, 5929, 186624, 1512900),
(14, '2015', 3951, 4661, 5476, 504100, 2325620),
(15, '2016', 4087, 4244, 5077, 24649, 980100),
(16, '2017', 3480, 4246, 4688, 586756, 1459260),
(17, '2018', 3085, 3839, 4250, 568516, 1357220),
(18, '2019', 2163, 3551, 3897, 1926540, 3006760),
(19, '2020', 2112, 2909, 3578, 635209, 2149160),
(21, '2021', 2453, 2453, 3146, 0, 480249);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `data_harga` (`id_barang`);

--
-- Indeks untuk tabel `ma`
--
ALTER TABLE `ma`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `id_harga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ma`
--
ALTER TABLE `ma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `data_harga` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
