-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2024 pada 04.18
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `vsga`
--

CREATE TABLE `vsga` (
  `id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `univ` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `vsga`
--

INSERT INTO `vsga` (`id`, `nama`, `univ`, `alamat`, `jenis`) VALUES
(1, 'Budiono Siregar', 'UGM', 'Bandung', 'OKM'),
(2, 'angga wijaya', 'Unpad', 'Bekasi', 'JWD'),
(3, 'Dinda Kirana', 'UNSRI', 'Jakarta', 'PNPST'),
(4, 'Erik', 'Unpar', 'Bandung', 'PNPST'),
(5, 'Bagas', 'USU', 'Medan', 'OKM');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `vsga`
--
ALTER TABLE `vsga`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `vsga`
--
ALTER TABLE `vsga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
