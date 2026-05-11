-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2026 pada 21.23
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmonitoring_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sampah`
--

CREATE TABLE `kategori_sampah` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_sampah`
--

INSERT INTO `kategori_sampah` (`id`, `nama_kategori`) VALUES
(1, 'Organik'),
(2, 'Anorganik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`) VALUES
(1, 'Kampus A'),
(2, 'Kampus B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilahan_sampah`
--

CREATE TABLE `pemilahan_sampah` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `volume_kg` int(11) NOT NULL,
  `status` enum('Diproses','Selesai') DEFAULT 'Diproses',
  `user_id` int(11) NOT NULL,
  `lokasi_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemilahan_sampah`
--

INSERT INTO `pemilahan_sampah` (`id`, `tanggal`, `volume_kg`, `status`, `user_id`, `lokasi_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(1, '2026-05-01', 15, 'Selesai', 2, 1, 1, '2026-05-01 13:54:30', '2026-05-01 13:54:30'),
(2, '2026-05-02', 18, 'Selesai', 2, 2, 2, '2026-05-02 13:54:30', '2026-05-02 13:54:30'),
(3, '2026-05-03', 30, 'Diproses', 2, 2, 1, '2026-05-03 13:58:46', '2026-05-03 13:58:46'),
(4, '2026-05-04', 25, 'Diproses', 2, 1, 2, '2026-05-04 13:58:46', '2026-05-04 13:58:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','petugas') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', '$2y$12$PB.PRegVCQTOK8SrH1IoueiuE46r.fH.5zm7Y228iIlHW44too1qy', 'admin', NULL, NULL),
(4, 'Petugas', 'petugas123@gmail.com', '$2y$12$JvM3qs11BDtVoGXRbglqz.dzWViRbNn0oX8nHtN9lxJ3TMfnzzYFe', 'petugas', '2026-05-10 18:37:21', '2026-05-10 18:37:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori_sampah`
--
ALTER TABLE `kategori_sampah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemilahan_sampah`
--
ALTER TABLE `pemilahan_sampah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `lokasi_id` (`lokasi_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_sampah`
--
ALTER TABLE `kategori_sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemilahan_sampah`
--
ALTER TABLE `pemilahan_sampah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pemilahan_sampah`
--
ALTER TABLE `pemilahan_sampah`
  ADD CONSTRAINT `pemilahan_sampah_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pemilahan_sampah_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`),
  ADD CONSTRAINT `pemilahan_sampah_ibfk_3` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_sampah` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
