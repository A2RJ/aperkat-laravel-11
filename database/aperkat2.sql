-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Mar 2024 pada 09.01
-- Versi server: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Versi PHP: 8.3.3-1+ubuntu22.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aperkat2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku1`
--

CREATE TABLE `iku1` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iku` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iku1`
--

INSERT INTO `iku1` (`id`, `iku`, `created_at`, `updated_at`) VALUES
(1, 'Mewujudkan tata kelola universitas yang efisien, efektif, transparan\r\ndan akuntabel\r\n', NULL, NULL),
(2, 'Menciptakan suasana akademik yang kondusif, nyaman, dan menyenangkan', NULL, NULL),
(3, 'Melahirkan lulusan yang unggul, kompeten, dan berakhlak mulia.', NULL, NULL),
(4, 'Melaksanakan kegiatan penelitian dan pengabdian kepada masyarakat, untuk\r\nmenjawab persoalan di tingkat lokal, nasional, dan internasional.\r\n', NULL, NULL),
(5, 'Mendesiminasikan hasil penelitan dan pengabdian kepada masyarakat pada\r\ntingkat nasional dan internasional.', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku2`
--

CREATE TABLE `iku2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iku` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iku2`
--

INSERT INTO `iku2` (`id`, `iku`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Melakukan penyempurnaan terhadap sistem\r\ntata kelola universitas\r\n', 1, NULL, NULL),
(2, 'Melakukan peningkatan atas peringkat\r\nakreditasi institusi di jenjang nasional dan\r\ninternasional\r\n\r\n', 1, NULL, NULL),
(3, 'Melaksanakan pengembangan sistem\r\nmanajemen Sumber Daya Manusia yang\r\nhandal\r\n', 1, NULL, NULL),
(4, 'Menyelenggarakan manajemen sumber\r\ndaya fisik/ infrastruktur yang handal\r\n', 1, NULL, NULL),
(5, 'Peningkatan peluang dan kesempatan\r\nkepada calon mahasiswa di seluruh\r\nnusantara dan dunia untuk mengenyam\r\nPendidikan', 2, NULL, NULL),
(6, 'Pengembangan kurikulum berbasis Kualifikasi\r\nKompetensi Nasional Indonesia (KKNI)\r\n', 2, NULL, NULL),
(7, 'Peningkatan dan pengembangan kualifikasi,\r\nkompetensi, serta karir dosen\r\n', 2, NULL, NULL),
(8, 'Menyediakan sarana dan prasarana\r\npendukung', 2, NULL, NULL),
(9, 'Pengembangan Pendidikan Jarak Jauh (PPJJ)\r\ndan pendidikan sepanjang hayat\r\n', 2, NULL, NULL),
(10, 'Melaksanakan pendidikan kepribadian,\r\nkarakter, dan akhlak mahasiswa', 3, NULL, NULL),
(11, 'Peningkatan kesiapan lulusan yang\r\nunggul, relevan dengan kebutuhan\r\nmitra strategis\r\n', 3, NULL, NULL),
(12, 'Menyiapkan kegiatan kompetisi\r\nkeilmuan di tingkat nasional dan\r\ninternasional\r\n', 3, NULL, NULL),
(13, 'Meyediakan koektivitas lulusan dengan\r\ndunia kerja', 3, NULL, NULL),
(14, 'Memperkuat inovasi kewirausahaan', 3, NULL, NULL),
(15, 'Menjaring lulusan yang berminat untuk\r\nstudi lanjut\r\n', 3, NULL, NULL),
(16, 'Pengembangan penelitian multidisiplin\r\nberdasar kepada Rencana Induk\r\nPenelitian\r\n', 4, NULL, NULL),
(17, 'Mengembangkan penelitian berbasis lokal\r\nberwawasan global', 4, NULL, NULL),
(18, 'Pengembangan kegiatan pengabdian\r\nkepada masyarakat\r\n', 4, NULL, NULL),
(19, 'Peningkatan jumlah publikasi nasional\r\ndan internasional\r\n', 5, NULL, NULL),
(20, 'Pengembangan sistem reward atas\r\nkegiatan publikasi ilmiah\r\n', 5, NULL, NULL),
(21, 'Menyiapkan database penelitian dan\r\npengabdian kepada masyarakat\r\n', 5, NULL, NULL),
(22, 'Menjaring kemitraan, lokal, nasional\r\ndan internasiona', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `iku3`
--

CREATE TABLE `iku3` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iku` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `iku3`
--

INSERT INTO `iku3` (`id`, `iku`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Tersusunnya Rencana Kerja Anggaran berdasarkan\r\nskala prioritas\r\n', 1, NULL, NULL),
(2, 'Menyusun Standar Operasional Prosedur baru\r\nberdasarkan kebutuhan\r\n', 1, NULL, NULL),
(3, 'Pelaksanaan Standar Operasional Prosedur yang\r\ntelah disusun', 1, NULL, NULL),
(4, 'Penerapan sistem informasi dan teknologi\r\nterintegrasi\r\n', 1, NULL, NULL),
(5, 'Ketersediaan RENSTRA dan RENOP Unit Kerja', 1, NULL, NULL),
(6, 'jumlah program studi yang terakreditasi \"sangat baik\"', 2, NULL, NULL),
(7, 'Melaksanakan audit internal secara priodik', 2, NULL, NULL),
(8, 'Monitoring dan evaluasi hasil audit internal\r\n', 2, NULL, NULL),
(9, 'Rencana kerja tindak lanjut atas hasil audit interna', 2, NULL, NULL),
(10, 'Tersusun dan terimplementasi rencana induk\r\npengembangan Sumber Daya Manusia\r\n', 3, NULL, NULL),
(11, 'Tersusun dan terimplementasi sistem rekrutmen', 3, NULL, NULL),
(12, 'Tersusun dan terimplementasi sistem seleksi yang\r\ntransparan dan akuntabel\r\n', 3, NULL, NULL),
(13, 'Tersusun dan terimplementasi standar kompetensi\r\nsebagai dasar penempatan Sumber Daya\r\nManusia\r\n', 3, NULL, NULL),
(14, ' Pendirian dan pemanfaatan training center dalam\r\nrangka pengembangan Sumber Daya Manusia', 3, NULL, NULL),
(15, 'Jumlah Sumber Daya Manusia yang mengikuti\r\npendidikan dan pelatihan\r\n', 3, NULL, NULL),
(16, 'Tersusun dan terlaksananya perencanaan\r\npengembangan karir', 3, NULL, NULL),
(17, 'Terlaksananya sistem penggajian, tunjangan, dan\r\nbonus secara terpusat\r\n', 3, NULL, NULL),
(18, 'Terlaksananya sistem penggajian, tunjangan, dan\r\nbonus secara terpusat\r\n', 4, NULL, NULL),
(19, 'Terdapat rencana induk pengembangan sumber\r\ndaya fisik/infrastruktur yang berorientasi kepada\r\nkeselamatan, kesehatan dan ramah lingkungan', 4, NULL, NULL),
(20, 'Tingkat penggunaan sumber daya\r\nfisik/infrastruktur', 4, NULL, NULL),
(21, 'Jumlah sumber daya fisik/infrastruktur bagi\r\npenyandang disabilitas\r\n', 4, NULL, NULL),
(22, 'Tersedianya dan terimplementasinya sistem seleksi\r\nmahasiswa baru yang transparan dan akuntabel\r\n', 5, NULL, NULL),
(23, 'Propoporsi mahasiswa dengan program beasiswa', 5, NULL, NULL),
(24, 'Tersedia dan terlaksananya program beasiswa\r\nmahasiswa', 5, NULL, NULL),
(25, 'Tingkat persebaran mahasiswa secara geografis\r\n(nasional)\r\n', 5, NULL, NULL),
(26, ' Jumlah mahasiswa baru internasional dalam proses\r\npembelajaran\r\n', 5, NULL, NULL),
(27, 'Tersusun dan terlaksananya kurikulum berbasis KKNI\r\n', 6, NULL, NULL),
(28, 'Proporsi mata kuliah berbasis penelitian dosen\r\n', 6, NULL, NULL),
(29, ' Tersusun dan terlaksananya kegiatan Kampus Merdeka\r\n', 6, NULL, NULL),
(30, 'Jumlah adopsi kegiatan pembelajaran di luar\r\nperguruan tinggi\r\n', 6, NULL, NULL),
(31, 'Jumlah peserta magang bersertifikat', 6, NULL, NULL),
(32, 'Jumlah mitra desa\r\n', 6, NULL, NULL),
(33, 'Proporsi dosen dengan jabatan fungsional\r\n', 7, NULL, NULL),
(34, ' Proporsi dosen dengan sertifikasi pendidik', 7, NULL, NULL),
(35, 'Dosen tugas belajar/izin belajar\r\n', 7, NULL, NULL),
(36, 'Jumlah Guru Besar (profesor)\r\n', 7, NULL, NULL),
(37, 'Proporsi dosen dengan gelar S3\r\n', 7, NULL, NULL),
(38, 'Rata-rata rasio dosen/mahasiswa tiap program studi\r\n', 7, NULL, NULL),
(39, 'Proporsi dosen yag telah mengikuti pelatihan\r\nprofesioanalisme dosen', 7, NULL, NULL),
(40, 'Jumlah Okupasi', 8, NULL, NULL),
(41, 'Tersedianya laboratorium', 8, NULL, NULL),
(42, 'Tersedianya ruang publik kreatif', 8, NULL, NULL),
(43, 'Tingkat penggunaan e-learning dalam proses\r\npembelajaran\r\n', 8, NULL, NULL),
(44, 'Jumlah mata kuliah yang ditawarkan dalam bentuk\r\njarak jauh\r\n', 9, NULL, NULL),
(45, ' Jumlah mata kuliah yang ditawarkan untuk umum\r\nsecara masif dan terbuka (massive open online course)\r\n', 9, NULL, NULL),
(46, 'Jumlah mata kuliah yang ditawarkan untuk umum\r\nsecara masif dan terbuka (massive open online course)\r\n', 9, NULL, NULL),
(47, 'Jumlah partisipasi masyarakat dalam mata kuliah\r\numum\r\n', 9, NULL, NULL),
(48, 'Tingkat kelulusan kegiatan mentoring\r\n', 10, NULL, NULL),
(49, 'Jumlah pelatihan soft skill', 10, NULL, NULL),
(50, 'Keterlibatan mahasiswa dalam kegiatan\r\npemberdayaan masyarakat\r\n', 10, NULL, NULL),
(51, 'Tingkat kepuasan pengguna alumni\r\n', 10, NULL, NULL),
(52, 'Tingkat persepsi kepuasan masyarakat terhadap\r\nperilaku alumni', 10, NULL, NULL),
(53, 'Proporsi lulusan yang bekerja sesuai bidang', 11, NULL, NULL),
(54, 'Proporsi lulusan dengan masa tunggu < 6 bulan\r\n', 11, NULL, NULL),
(55, 'Proporsi lulusan yang lulus tepat waktu atau lebih\r\ncepat\r\n', 11, NULL, NULL),
(56, 'Rata-rata IPK lulusan per prodi\r\n', 11, NULL, NULL),
(57, 'Proporsi lulusan yang bekerja pada level nasional', 11, NULL, NULL),
(58, 'Proporsi lulusan yang bekerja pada level\r\ninternasional\r\n', 11, NULL, NULL),
(59, 'Tingkat keterlibatan mahasiswa', 12, NULL, NULL),
(60, ' Jumlah prestasi akademik tingkat nasional', 12, NULL, NULL),
(61, 'Jumlah prestasi akademik tingkat internasional\r\n', 12, NULL, NULL),
(62, 'Jumlah usulan Program Kreatifitas Mahasiswa (PKM)\r\n', 12, NULL, NULL),
(63, 'Jumlah PKM yang didanai', 12, NULL, NULL),
(64, 'Jumlah PKM yang lolos ke PIMNAS\r\n', 12, NULL, NULL),
(65, 'Jumlah kegiatan pelatihan kompetisi akademik\r\n', 12, NULL, NULL),
(66, 'Kegiatan campus hiring\r\n', 13, NULL, NULL),
(67, 'Jumlah kegiatan pembekelan mahasiswa prakerja\r\n', 13, NULL, NULL),
(68, 'Jumlah kegiatan yang berorientasi wirausaha', 14, NULL, NULL),
(69, 'Jumlah mahasiswa yang berwirausaha', 14, NULL, NULL),
(70, 'Jumlah alumni yang berwirausaha', 14, NULL, NULL),
(71, 'Jumlah donatur/pemberi beasiswa yang terlibat', 15, NULL, NULL),
(72, 'Jumlah lulusan yang melanjutkan studi', 15, NULL, NULL),
(73, 'Jumlah penelitian', 16, NULL, NULL),
(74, 'Jumlah penelitian multidisiplin\r\n', 16, NULL, NULL),
(75, 'Jumlah penelitian dengan melibatkan\r\nmahasiswa\r\n', 16, NULL, NULL),
(76, 'Jumlah penelitian multidisiplin dengan\r\nmelibatkan mahasiswa', 16, NULL, NULL),
(77, 'Jumlah penelitian yang berbasis permasalahan\r\nlokal\r\n', 17, NULL, NULL),
(78, 'Jumlah penelitian yang berbasis permasalahan\r\nnasional', 17, NULL, NULL),
(79, 'jumlah penelitian yang berbasis permasalahan\r\ninternasional\r\n', 17, NULL, NULL),
(80, 'Jumlah kegiatan pengabdian kepada\r\nmasyarakat\r\n', 18, NULL, NULL),
(81, 'Jumlah kegiatan pengabdian kepada\r\nmasyarakat dengan melibatkan mahasiswa', 18, NULL, NULL),
(82, 'Jumlah publikasi nasional\r\n', 19, NULL, NULL),
(83, 'Jumlah publikasi internasional\r\n', 19, NULL, NULL),
(84, 'Jumlah dosen yang mendapat reward publikasi\r\nnasiona', 20, NULL, NULL),
(85, 'Jumlah dosen yang mendapat reward publikasi\r\ninternasional', 20, NULL, NULL),
(86, 'Tersedianya database penelitian', 21, NULL, NULL),
(87, 'Tersedianya database pengabdian kepada\r\nmasyarakat', 21, NULL, NULL),
(88, 'Jumlah lembaga kemitraan local', 22, NULL, NULL),
(89, 'Jumlah lembaga kemitraan nasional\r\n', 22, NULL, NULL),
(90, 'Jumlah lembaga kemitraan internasional\r\n', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `parent_id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `parent_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '', 1, '2024-03-12 08:14:46', '2024-03-12 08:14:46'),
(2, 'Rektor', '1', 2, '2024-03-12 00:31:22', '2024-03-12 00:31:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `whatsapp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'xcz.ardiansyahputra2468@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL7oLP_ByMxC825XBJJ9c2PuaXLij3RsiO3m6HUIwzZaCI=s96-c', NULL, NULL, '2024-03-12 00:14:36', '2024-03-12 00:14:36'),
(2, 'Rektor', 'ardiansyah.putra@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLUv0ahovVt8oI6vtcqxZvPa91TTJj1qbLtIJXVwdMo=s96-c', NULL, NULL, '2024-03-12 00:30:43', '2024-03-12 00:30:43');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `iku1`
--
ALTER TABLE `iku1`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `iku2`
--
ALTER TABLE `iku2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iku2_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `iku3`
--
ALTER TABLE `iku3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iku3_parent_id_foreign` (`parent_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_whatsapp_unique` (`whatsapp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `iku1`
--
ALTER TABLE `iku1`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `iku2`
--
ALTER TABLE `iku2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `iku3`
--
ALTER TABLE `iku3`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `iku2`
--
ALTER TABLE `iku2`
  ADD CONSTRAINT `iku2_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `iku1` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `iku3`
--
ALTER TABLE `iku3`
  ADD CONSTRAINT `iku3_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `iku2` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
