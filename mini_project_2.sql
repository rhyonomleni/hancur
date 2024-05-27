-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2023 pada 10.35
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_kegiatan` varchar(50) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `durasi` varchar(10) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `lokasi` varchar(30) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `username`, `password`, `nama_kegiatan`, `tanggal_mulai`, `tanggal_selesai`, `durasi`, `level`, `lokasi`, `gambar`) VALUES
(6, 'ekananda', 'eka123', 'Nobar Bayern Munchen vs Psg', '2023-02-15', '2023-02-15', '2 jam', 'Biasa', 'Kafe Legend Coffee', 'bayerpsg.png'),
(7, 'herry', 'herry123', 'Bermain Basket', '2023-02-25', '2023-02-25', '2 jam', 'Biasa', 'Lapangan Basket Got Game', 'basket.jpg'),
(8, 'rhyo', 'rhyo123', 'Futsal', '2023-03-03', '2023-03-03', '2 jam', 'Biasa', 'Lapangan Futsal MU', 'futsal.jpeg'),
(9, 'ekananda', 'eka123', 'Mengerjakan tugas Progweb', '2023-03-07', '2023-03-11', '5 Hari', 'Sedang', 'Rumah Herry', 'progweb.jpg'),
(10, 'herry', 'herry123', 'Mendaki Gunung', '2023-03-16', '2023-03-19', '3 Hari', 'Sedang', 'Gunung Merbabu', 'naik gunung.jpg'),
(11, 'rhyo', 'rhyo123', 'Lari Pagi', '2023-03-19', '2023-03-19', '1 Jam 50 M', 'Biasa', 'Stadion Mandala Krida', 'lari pagi.jpeg'),
(12, 'ekananda', 'eka123', 'Minggu UTS', '2023-03-27', '2023-04-14', '19 Hari', 'Sangat Penting', 'UKDW', 'uts.jpeg'),
(13, 'herry', 'herry123', 'Libur Paskah', '2023-04-05', '2023-04-07', '3 Hari', 'Sangat Penting', '-', 'paskah.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'ekananda', 'eka123'),
(3, 'herry', 'herry123'),
(4, 'rhyo', 'rhyo123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
