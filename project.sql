-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2021 pada 20.02
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kec` int(11) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `nama_kec` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `kode_pos`, `nama_kec`, `created_at`, `updated_at`) VALUES
(1, 45262, 'Cikedung', '2021-07-05 14:31:44', '2021-07-05 14:31:44'),
(2, 452610, 'Terisi', '2021-07-05 14:31:57', '2021-07-05 10:11:57'),
(4, 45273, 'Jatibarang', '2021-07-05 08:00:00', '2021-07-05 10:03:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `nama_kps` varchar(150) NOT NULL,
  `tingkat` enum('SD','SMP') NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `bukti` longtext NOT NULL,
  `logo` longtext NOT NULL,
  `foto` longtext NOT NULL,
  `daya_tampung` int(11) NOT NULL,
  `jml_diterima` int(11) NOT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `id_user`, `nama_sekolah`, `nama_kps`, `tingkat`, `email`, `nohp`, `alamat`, `deskripsi`, `bukti`, `logo`, `foto`, `daya_tampung`, `jml_diterima`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 1, 'SMP N 3 Terisi', 'Wahyu Hermawan, A.Md.Kom', 'SMP', 'admin@gmail.com', '089688177247', 'Cikedung', 'SMP Negeri 3 Terisi dulu bernama Sekolah Lanjutan Tingkat Pertama (SLTP) Negeri 3 Cikedung yang dibuka pada tahun 1995 sebagai Kelah Jauh SLTP Negeri 1 Cikedung memiliki 2 (dua) rombongan belajar dengan jumlah siswa 96 orang. Sekolah ini bertempat di gedung eks SLTP Trisila di desa Cikedung Lor, dengan Kepala Sekolah Yth. Bp. GANDHI DANAWIDJAJA, S.Ag.', 'bukti.pdf', 'logo.png', 'foto.jpg', 100, 95, '-09087787989898', '0909889898980909', '2021-07-05 15:36:58', '2021-07-05 15:36:58'),
(2, 3, 'SMK N 1 LELEA', 'Hyuwan', 'SD', 'hyuwan@gmail.com', '089688', 'Mundakjaya', 'Sekolah Menengah Kejuaran Negeri 1 Lelea adalah sekolah yang di dirikan pada 18 November 2003 di resmikan oleh. SMK NEGERI 1 LELEA ini adalah sekolah satu-satunya di kecamatan lelea dan mempunyai program jurusan yang berbeda dengan SMK lainya. Program jurusan yang pertama hanya ada dua yaitu:', 'bukti.pdf', 'Windows_Settings_app_icon.png', 'lelea.jpg', 100, 50, NULL, NULL, '2021-07-06 09:11:59', '2021-07-06 09:11:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','super','siswa') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '7409e56c0eeb4e894fe5af03869f2b2dd6e7315e', 'super', 'aktif', '2021-07-05 15:35:23', '2021-07-05 15:35:23'),
(3, 'hyuwan@gmail.com', '$2y$10$nPId5aju4J4h85rB5blYTeT00cdOBmCAhQ4ou5Nc8B7n/HbsDgfl2', 'admin', 'nonaktif', '2021-07-06 09:11:59', '2021-07-06 09:34:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `sekolah` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
