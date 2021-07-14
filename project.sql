-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2021 pada 19.44
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
(4, 45273, 'Jatibarang', '2021-07-05 08:00:00', '2021-07-05 10:03:06'),
(5, 45263, 'Anjatan', '2021-07-09 19:56:32', '2021-07-09 19:56:32'),
(6, 45262, 'Arahan', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(7, 45262, 'Balongan', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(8, 45262, 'Bangodua', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(9, 45262, 'Bongas', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(10, 45262, 'Cantigi', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(11, 45262, 'Gabus wetan', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(12, 45262, 'Gantar', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(13, 45262, 'Haurgeulis', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(14, 45262, 'Indramayu', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(15, 45262, 'Juntinyuat', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(16, 45262, 'Kandanghaur', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(17, 45262, 'Karangampel', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(18, 45262, 'Kedokan Bunder', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(19, 45262, 'Kertasemaya', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(20, 45262, 'Krangkeng', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(21, 45262, 'Kroya', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(22, 45262, 'Lelea', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(23, 45262, 'Lohbener', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(24, 45262, 'Losarang', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(25, 45262, 'Pasekan', '2021-07-10 02:57:01', '2021-07-10 02:57:01'),
(26, 45262, 'Patrol', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(27, 45262, 'Sindang', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(28, 45262, 'Sliyeg', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(29, 45262, 'Sukagumiwang', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(30, 45262, 'Sukra', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(31, 45262, 'Tukdana', '2021-07-10 03:05:40', '2021-07-10 03:05:40'),
(32, 45262, 'Widasari', '2021-07-10 03:05:40', '2021-07-10 03:05:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppdb`
--

CREATE TABLE `ppdb` (
  `id_ppdb` bigint(255) NOT NULL,
  `id_sekolah` int(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `daya_tampung` int(255) NOT NULL,
  `jml_diterima` int(255) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ppdb`
--

INSERT INTO `ppdb` (`id_ppdb`, `id_sekolah`, `tahun_ajaran`, `daya_tampung`, `jml_diterima`, `tgl_mulai`, `tgl_berakhir`, `created_at`, `updated_at`) VALUES
(1, 2, '2020 / 2021', 1000, 800, '2021-07-12', '2021-07-14', '2021-07-14 08:09:24', '2021-07-14 08:09:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_sekolah` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_sekolah`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 2, 'Juara 3 Umum Lomba Marching Band', '<p>Menjuarai perlombaan marching band di tingkat wilayah III Cirebon yang diikuti oleh lebih dari 15 sekolah</p>', '2021-07-14 07:00:10', '2021-07-14 14:00:10'),
(2, 2, 'Juara 1 Lomba Pramuka tingkat Kabupaten', '<p>Peringkat pertama pramuka tingkat penggalang</p>', '2021-07-14 07:05:13', '2021-07-14 14:05:13'),
(3, 1, 'Juara 2 Lomba PMR', '<p>Pernah menjuarai lomba PMR tingkat kecamatan Terisi</p>', '2021-07-14 07:07:29', '2021-07-14 14:07:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `nama_sekolah` varchar(150) NOT NULL,
  `nama_kps` varchar(150) NOT NULL,
  `tingkat` enum('SD','SMP') NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `visimisi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `bukti` longtext NOT NULL,
  `logo` longtext NOT NULL,
  `foto` longtext NOT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `id_user`, `id_kec`, `nama_sekolah`, `nama_kps`, `tingkat`, `email`, `nohp`, `alamat`, `visimisi`, `deskripsi`, `bukti`, `logo`, `foto`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'SMP N 3 Terisi', 'Wahyu Hermawan, A.Md.Kom', 'SMP', 'sekolahsmp@gmail.com', '089688177247', 'Cikedung', '', '<div style=\"text-align: justify;\"><span style=\"font-size: 1rem;\">SMP Negeri 3 Terisi dulu bernama Sekolah Lanjutan Tingkat Pertama (SLTP) Negeri 3 Cikedung yang dibuka pada tahun 1995 sebagai Kelah Jauh SLTP Negeri 1 Cikedung memiliki 2 (dua) rombongan belajar dengan jumlah siswa 96 orang. Sekolah ini bertempat di gedung eks SLTP Trisila di desa Cikedung Lor, dengan Kepala Sekolah Yth. Bp. GANDHI DANAWIDJAJA, S.Ag.</span></div>', 'bukti.pdf', 'logo.png', 'foto.jpg', '-09087787989898', '0909889898980909', '2021-07-05 15:36:58', '2021-07-09 18:34:58'),
(2, 16, 22, 'SD N 1 LELEA', 'Hyuwan', 'SD', 'sekolahsd@gmail.com', '089688', 'Mundakjaya', '<p><span style=\"color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify;\"><b>VISI</b></span></p><p><span style=\"color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify;\">Sebagai Lembaga Pendidikan yang dapat mewujudkan peserta didik yang profesional</span></p><p><span style=\"color: rgb(68, 68, 68); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: justify;\"><b>MISI</b></span></p><ul><li>Meningkatkan Kualitas SDM</li><li>Meningkatkan Pelayanan Terhadap Peserta Didik</li><li>Meningkatkan Mutu Lulusan</li></ul>', '<div style=\"text-align: justify;\"><div class=\"post_detail\" style=\"width: 750px; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-align: start;\"><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">Sekolah Menengah Kejuaran Negeri 1 Lelea adalah sekolah yang di dirikan\r\npada 18 November2003 di resmikan oleh. SMK NEGERI 1 LELEA ini adalah sekolah\r\nsatu-satunya di kecamatan lelea dan mempunyai program jurusan yang berbeda\r\ndengan SMK lainya. Program jurusan yang pertama hanya ada dua yaitu:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">1. TEKNIK PENGELASAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">2. TATA BUSANA<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;Pada saat itu di pimpin oleh kepala sekolah Bapak Drs. H. Ridwan\r\nSadeli. Beliau dulunya adalah kepala sekolah SMP Negeri 1 Lelea. Beliau yang\r\nmempunyai ide buat membangun SMK&nbsp; NEGERI 1 LELEA ini<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;Drs.H. RIDWAN SADELI<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mulain akfit pada bulan juli 2004/2005\r\nWaktu itu masih sedikit muridnya hanya ada 2 kelas,dan belum punya gedung\r\nsendiri masih memanfaat kan Gedung bekas SD yang sudah tidak terpakai,\r\nGuru-Gurunya juga sebagian besar dari SMP Negeri 1 Lelea.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">seiring berkembangnya zaman SMK NEGERI 1 LELEA menambahkan program\r\njurusannya satu lagi yaitu:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">1.TEKNIK OTOMOTIF<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">karena TEKNIK OTOMOTIF banyak sekali peminatnya,Sebagian besar SMK yang\r\nada di wilayah INDRAMAYU ini mempunyai program jurusan ini.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;pada masa peneriamaan siswa baru SMK NEGERI 1 LELEA bertambah\r\nsiswanya yang tadinya 2 kelas menjadi 3 kelas, walaupun baru mempunyai bebera\r\nruang kelas. seiring bertambahnya tahun SMK NEGERI 1 LELEA semakin&nbsp; di\r\nminati oleh masyarakat buat menyekolahkan anaknya di SMK NEGERI 1 LELEA ini.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;pada tahun 2007 SMK NEGERI 1 LELEA bertambah lagi siswanya yang\r\ntadinya 3 kelas menjadi 6 kelas, yang di bagi menjadi 3 program jurusan,setiap\r\nprogram jurusan mempunyai 2 kelas. walaupun umur SMK ini baru 4 tahun berdiri\r\ntapi SMK ini tidak mau kalah sama SMK lainya yang sudah lama berdiri.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;Pada tahun 2009 Kepala sekolah SMK NEGERI 1 LELEA Bapak Drs. H .\r\nRidwan Sadeli di ganti oleh Drs. Rachmat Heriwan sampai sekarang, Bapak Drs. H.\r\nRidwan Sadeli di pindahkan ke SMK NEGERI 1 INDRAMAYU. Beliau sekarang menjadi\r\nkepala sekolah di SMK NEGERI 1 CIKEDUNG.<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;pada tahun 2010 SMK NEGERI 1 LELEA menambahkan program jurusan dua\r\nprogram yaitu:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">1.TEKNIK KOMPUTER DAN JARINGAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">2. MULTIMEDIA<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">&nbsp;Jadi SMK NEGERI 1 LELEA sekarang mempunyai lima program jurusan\r\ndiantaranya:<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">1.TEKNIK PENGELASAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">2.TATA BUSANA<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">3.TEKNIK KENDARAAN RINGAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">4.TEKNIK KOMPUTER DAN JARINAGAN<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">5. MULTIMEDIA<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span lang=\"IN\" style=\"font-size:10.5pt;font-family:\r\n&quot;Arial&quot;,sans-serif;mso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;\r\nmso-ansi-language:IN;mso-fareast-language:EN-ID\">6. TEKNIK OTOMASI INDUSTRI</span><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:EN-ID\"><o:p></o:p></span></p><p class=\"MsoNormal\" style=\"margin-bottom: 7.5pt; text-align: justify; line-height: 16.5pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-size:10.5pt;font-family:&quot;Arial&quot;,sans-serif;\r\nmso-fareast-font-family:&quot;Times New Roman&quot;;color:#444444;mso-fareast-language:\r\nEN-ID\">Guru SMK NEGERI 1 LELEA sekarang ada 46 Guru 12 PN (PEGAWAI\r\nNEGERI).&nbsp;Tata Usaha SMK NEGERI 1 LELEA sekarang ada 17 orang dan 7 PN\r\n(PEGAWAI NEGERI).<o:p></o:p></span></p><p class=\"MsoNormal\" style=\"text-align: justify; color: rgb(68, 68, 68); margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 22px; -webkit-font-smoothing: antialiased;\">\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p></div></div>', 'bukti.pdf', 'Windows_Settings_app_icon.png', 'lelea.jpg', NULL, NULL, '2021-07-06 09:11:59', '2021-07-09 20:34:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `akte` text DEFAULT NULL,
  `ijazah` text DEFAULT NULL,
  `skhun` text DEFAULT NULL,
  `kk` text DEFAULT NULL,
  `sertifikat1` text DEFAULT NULL,
  `sertifikat2` text DEFAULT NULL,
  `sertifikat3` text DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `nama`, `email`, `tempat`, `tgl_lahir`, `asal_sekolah`, `alamat`, `nohp`, `foto`, `akte`, `ijazah`, `skhun`, `kk`, `sertifikat1`, `sertifikat2`, `sertifikat3`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(1, 10, 'Hyuwan', 'siswa@gmail.com', 'Indramayu', '1998-05-16', 'SD', 'Mundakjaya', '089688177247', 'bri.png', 'QR Code (1) (1).png', 'bri.png', 'bank-bri-logo-630x380.png', 'ovo.png', NULL, NULL, NULL, NULL, NULL, '2021-07-10 09:00:27', '2021-07-14 10:14:58'),
(6, 15, 'Test', 'siswa1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 09:19:13', '2021-07-12 09:19:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_tahunajaran` bigint(255) NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'admin@gmail.com', '$2y$10$kxfaZhqxlXRl1eRagSDLBu.2DLAT.iRTkoDTDc9gNLVizFQ/in.bK', 'super', 'nonaktif', '2021-07-05 15:35:23', '2021-07-10 07:13:59'),
(3, 'sekolahsmp@gmail.com', '$2y$10$kxfaZhqxlXRl1eRagSDLBu.2DLAT.iRTkoDTDc9gNLVizFQ/in.bK', 'admin', 'aktif', '2021-07-06 09:11:59', '2021-07-06 09:34:41'),
(10, 'siswa@gmail.com', '$2y$10$RmyjGl7vattI2sZNxjiqleIVgrBb6vGh9UduCy1ZXc5ktcG0/URa6', 'siswa', 'aktif', '2021-07-10 09:00:27', '2021-07-10 09:00:27'),
(15, 'siswa1@gmail.com', '$2y$10$xUcdxv4.g5mNkBt7rY0It.Gqd3AnwSiNQrVyiJvcxIO.2.8pDssdi', 'siswa', 'aktif', '2021-07-12 09:19:13', '2021-07-12 09:19:13'),
(16, 'sekolahsd@gmail.com', '$2y$10$kxfaZhqxlXRl1eRagSDLBu.2DLAT.iRTkoDTDc9gNLVizFQ/in.bK', 'admin', 'aktif', '2021-07-14 13:50:30', '2021-07-14 13:50:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indeks untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`id_ppdb`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kec` (`id_kec`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_tahunajaran`);

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
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `id_ppdb` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_tahunajaran` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `kecamatan` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`),
  ADD CONSTRAINT `sekolah` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
