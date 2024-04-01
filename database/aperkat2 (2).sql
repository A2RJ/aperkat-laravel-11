-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 25 Mar 2024 pada 13.20
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
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel:pulse:Laravel\\Pulse\\Livewire\\Cache:all:1_hour', 'a:3:{i:0;O:8:\"stdClass\":2:{s:4:\"hits\";i:0;s:6:\"misses\";i:0;}i:1;d:1.391199;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Cache:keys:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:1.5177;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Exceptions:count:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:3:{i:0;O:8:\"stdClass\":4:{s:5:\"class\";s:5:\"Error\";s:8:\"location\";s:22:\"app/Models/Role.php:79\";s:6:\"latest\";O:22:\"Carbon\\CarbonImmutable\":3:{s:4:\"date\";s:26:\"2024-03-17 09:05:01.000000\";s:13:\"timezone_type\";i:1;s:8:\"timezone\";s:6:\"+00:00\";}s:5:\"count\";s:4:\"1.00\";}i:1;O:8:\"stdClass\":4:{s:5:\"class\";s:9:\"Exception\";s:8:\"location\";s:59:\"app/Http/Controllers/Submission/SubmissionController.php:32\";s:6:\"latest\";O:22:\"Carbon\\CarbonImmutable\":3:{s:4:\"date\";s:26:\"2024-03-17 08:59:54.000000\";s:13:\"timezone_type\";i:1;s:8:\"timezone\";s:6:\"+00:00\";}s:5:\"count\";s:4:\"1.00\";}i:2;O:8:\"stdClass\":4:{s:5:\"class\";s:14:\"ErrorException\";s:8:\"location\";s:59:\"app/Http/Controllers/Submission/SubmissionController.php:33\";s:6:\"latest\";O:22:\"Carbon\\CarbonImmutable\":3:{s:4:\"date\";s:26:\"2024-03-17 09:16:06.000000\";s:13:\"timezone_type\";i:1;s:8:\"timezone\";s:6:\"+00:00\";}s:5:\"count\";s:4:\"1.00\";}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:1.6397;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Queues::1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:1.7392;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Servers::1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:2.7548;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\SlowJobs:slowest:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:2.1168;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\SlowOutgoingRequests:slowest:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:1.4148;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\SlowQueries:slowest:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:2.066;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\SlowRequests:slowest:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:1.4476;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Usage:requests:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:8:\"stdClass\":3:{s:3:\"key\";s:1:\"1\";s:4:\"user\";O:8:\"stdClass\":3:{s:4:\"name\";s:3:\"XCZ\";s:5:\"extra\";s:33:\"xcz.ardiansyahputra2468@gmail.com\";s:6:\"avatar\";s:93:\"https://lh3.googleusercontent.com/a/ACg8ocL7oLP_ByMxC825XBJJ9c2PuaXLij3RsiO3m6HUIwzZaCI=s96-c\";}s:5:\"count\";i:61;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:2.6068;i:2;s:19:\"2024-03-17 09:27:29\";}', 1710667654),
('laravel:pulse:Laravel\\Pulse\\Livewire\\Usage:slow_requests:1_hour', 'a:3:{i:0;O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}i:1;d:3.271201;i:2;s:19:\"2024-03-17 09:26:43\";}', 1710667608);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disbursements`
--

CREATE TABLE `disbursements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `budget` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `disbursements`
--

INSERT INTO `disbursements` (`id`, `submission_id`, `budget`, `filename`, `created_at`, `updated_at`) VALUES
(11, 4, 'Rp. 1.200.000', 'files/1710785195.auth.png', '2024-03-18 10:06:35', '2024-03-18 10:06:35'),
(12, 4, 'Rp. 1.200.000', 'files/1710785235.auth.png', '2024-03-18 10:07:15', '2024-03-18 10:07:15'),
(13, 9, 'Rp. 1.100.000', 'files/1710822765.auth.png', '2024-03-18 20:32:45', '2024-03-18 20:32:45'),
(14, 9, 'Rp. 121.212', 'files/1710822777.auth.png', '2024-03-18 20:32:57', '2024-03-18 20:32:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disbursement_periods`
--

CREATE TABLE `disbursement_periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `disbursement_periods`
--

INSERT INTO `disbursement_periods` (`id`, `period`, `created_at`, `updated_at`) VALUES
(1, 'Pekan 1 April 2024', '2024-03-17 15:37:42', '2024-03-17 15:38:47'),
(3, 'Pekan 2 April 2024', '2024-03-17 15:38:54', '2024-03-17 15:38:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_09_071855_create_iku1', 1),
(5, '2024_03_09_071923_create_iku2', 1),
(6, '2024_03_09_071938_create_iku3', 1),
(7, '2024_03_09_153802_create_roles', 1),
(8, '2024_03_10_102956_create_ppufs', 1),
(9, '2024_03_10_103144_create_submission', 1),
(10, '2024_03_15_020351_create_pulse_tables', 1),
(11, '2024_03_16_121753_submission_statuses', 1),
(12, '2024_03_17_231025_create_periods', 2),
(13, '2024_03_17_231337_create_disbursement_periods', 2),
(14, '2024_03_18_003446_add_disbursementid_to_submission', 3),
(15, '2024_03_18_163503_create_disbursement', 4),
(16, '2024_03_20_074828_add_rab_detail_into_submissions', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period` year(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ppufs`
--

CREATE TABLE `ppufs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `iku` varchar(255) NOT NULL,
  `ppuf_number` varchar(255) NOT NULL,
  `activity_type` enum('program','pengadaan','pemeliharaan','pengembangan') NOT NULL,
  `program_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ppufs`
--

INSERT INTO `ppufs` (`id`, `role_id`, `iku`, `ppuf_number`, `activity_type`, `program_name`, `description`, `place`, `date`, `budget`, `detail`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 'Test', '001', 'program', 'Nama Program 1', 'Deskripsi', 'UTS', 'Januari', '1000000', '', NULL, NULL, NULL),
(2, 7, 'Test', '002', 'pengadaan', 'Nama Program 2', 'Deskripsi', 'UTS', 'Februari', '1500000', '', NULL, NULL, NULL),
(3, 7, 'Test', '003', 'pemeliharaan', 'Nama Program 3', 'Deskripsi', 'UTS', 'Maret', '200000', '', NULL, NULL, NULL),
(4, 7, 'Test', '1', 'program', 'Nama Program 1', 'Deskripsi', 'UTS', 'Januari', '1000000', '', NULL, NULL, NULL),
(5, 7, 'Test', '2', 'pengadaan', 'Nama Program 2', 'Deskripsi', 'UTS', 'Februari', '1500000', '', NULL, NULL, NULL),
(6, 9, 'Test', '3', 'pemeliharaan', 'Nama Program Pengmas', 'Deskripsi', 'UTS', 'Maret', '200000', '', NULL, NULL, NULL),
(7, 6, 'asdasda', '004', 'pemeliharaan', 'sadasd', 'sdasdasd', 'asdasd', 'januari', 'Rp. 1.222.222', 'asd', '2024-03-15 12:02:52', '2024-03-15 12:02:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pulse_aggregates`
--

CREATE TABLE `pulse_aggregates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bucket` int(10) UNSIGNED NOT NULL,
  `period` mediumint(8) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `aggregate` varchar(255) NOT NULL,
  `value` decimal(20,2) NOT NULL,
  `count` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pulse_aggregates`
--

INSERT INTO `pulse_aggregates` (`id`, `bucket`, `period`, `type`, `key`, `aggregate`, `value`, `count`) VALUES
(4, 1710656640, 10080, 'user_request', '1', 'count', '19.00', NULL),
(35, 1710656640, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:32\"]', 'count', '1.00', NULL),
(40, 1710656640, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:32\"]', 'max', '1710665994.00', NULL),
(81, 1710656640, 10080, 'exception', '[\"Error\",\"app\\/Models\\/Role.php:79\"]', 'count', '1.00', NULL),
(88, 1710656640, 10080, 'exception', '[\"Error\",\"app\\/Models\\/Role.php:79\"]', 'max', '1710666301.00', NULL),
(96, 1710666720, 10080, 'user_request', '1', 'count', '108.00', NULL),
(104, 1710666720, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:33\"]', 'count', '1.00', NULL),
(112, 1710666720, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:33\"]', 'max', '1710666966.00', NULL),
(533, 1710676800, 10080, 'user_request', '1', 'count', '119.00', NULL),
(538, 1710676800, 10080, 'exception', '[\"TypeError\",\"resources\\/views\\/layout\\/index.blade.php:65\"]', 'count', '1.00', NULL),
(545, 1710676800, 10080, 'exception', '[\"TypeError\",\"resources\\/views\\/layout\\/index.blade.php:65\"]', 'max', '1710678772.00', NULL),
(676, 1710676800, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'count', '1.00', NULL),
(681, 1710676800, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'max', '1710681240.00', NULL),
(685, 1710676800, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 'count', '1.00', NULL),
(693, 1710676800, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 'max', '1710681258.00', NULL),
(761, 1710676800, 10080, 'user_request', '2', 'count', '78.00', NULL),
(970, 1710676800, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:46\"]', 'count', '1.00', NULL),
(977, 1710676800, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:46\"]', 'max', '1710682781.00', NULL),
(1353, 1710686880, 10080, 'user_request', '2', 'count', '1.00', NULL),
(1357, 1710686880, 10080, 'user_request', '1', 'count', '178.00', NULL),
(1745, 1710686880, 10080, 'exception', '[\"InvalidArgumentException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:21\"]', 'count', '1.00', NULL),
(1753, 1710686880, 10080, 'exception', '[\"InvalidArgumentException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:21\"]', 'max', '1710693527.00', NULL),
(2074, 1710707040, 10080, 'user_request', '1', 'count', '25.00', NULL),
(2174, 1710717120, 10080, 'user_request', '1', 'count', '185.00', NULL),
(2182, 1710717120, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 'count', '2.00', NULL),
(2190, 1710717120, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 'max', '1710718123.00', NULL),
(2261, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\Eloquent\\\\MassAssignmentException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementPeriodController.php:19\"]', 'count', '1.00', NULL),
(2266, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\Eloquent\\\\MassAssignmentException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementPeriodController.php:19\"]', 'max', '1710718628.00', NULL),
(2274, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'count', '1.00', NULL),
(2282, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'max', '1710718662.00', NULL),
(2439, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:58\"]', 'count', '1.00', NULL),
(2446, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:58\"]', 'max', '1710719520.00', NULL),
(2479, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:113\"]', 'count', '1.00', NULL),
(2486, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:113\"]', 'max', '1710719847.00', NULL),
(2566, 1710717120, 10080, 'exception', '[\"BadMethodCallException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Validation\\/Validator.php:1636\"]', 'count', '1.00', NULL),
(2574, 1710717120, 10080, 'exception', '[\"BadMethodCallException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Validation\\/Validator.php:1636\"]', 'max', '1710722655.00', NULL),
(2680, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:67\"]', 'count', '1.00', NULL),
(2686, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:67\"]', 'max', '1710723714.00', NULL),
(2726, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:64\"]', 'count', '1.00', NULL),
(2734, 1710717120, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:64\"]', 'max', '1710724171.00', NULL),
(2887, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:54\"]', 'count', '1.00', NULL),
(2894, 1710717120, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:54\"]', 'max', '1710725000.00', NULL),
(2927, 1710717120, 10080, 'exception', '[\"Exception\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Collections\\/Traits\\/EnumeratesValues.php:1007\"]', 'count', '1.00', NULL),
(2934, 1710717120, 10080, 'exception', '[\"Exception\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Collections\\/Traits\\/EnumeratesValues.php:1007\"]', 'max', '1710725303.00', NULL),
(2938, 1710717120, 10080, 'exception', '[\"TypeError\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/helpers.php:126\"]', 'count', '1.00', NULL),
(2946, 1710717120, 10080, 'exception', '[\"TypeError\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/helpers.php:126\"]', 'max', '1710725329.00', NULL),
(3007, 1710737280, 10080, 'user_request', '1', 'count', '70.00', NULL),
(3095, 1710737280, 10080, 'exception', '[\"ParseError\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:120\"]', 'count', '2.00', NULL),
(3099, 1710737280, 10080, 'exception', '[\"ParseError\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:120\"]', 'max', '1710743969.00', NULL),
(3105, 1710737280, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:116\"]', 'count', '1.00', NULL),
(3111, 1710737280, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:116\"]', 'max', '1710743984.00', NULL),
(3126, 1710737280, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:122\"]', 'count', '1.00', NULL),
(3131, 1710737280, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:122\"]', 'max', '1710744607.00', NULL),
(3139, 1710737280, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'count', '1.00', NULL),
(3147, 1710737280, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'max', '1710745447.00', NULL),
(3277, 1710737280, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:41\"]', 'count', '1.00', NULL),
(3283, 1710737280, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:41\"]', 'max', '1710746706.00', NULL),
(3327, 1710747360, 10080, 'user_request', '1', 'count', '142.00', NULL),
(3451, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:36\"]', 'count', '1.00', NULL),
(3459, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:36\"]', 'max', '1710747877.00', NULL),
(3467, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:19\"]', 'count', '1.00', NULL),
(3475, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:19\"]', 'max', '1710747884.00', NULL),
(3488, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:43\"]', 'count', '1.00', NULL),
(3495, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:43\"]', 'max', '1710747974.00', NULL),
(3625, 1710747360, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 'count', '1.00', NULL),
(3631, 1710747360, 10080, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 'max', '1710754930.00', NULL),
(3681, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 'count', '2.00', NULL),
(3687, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 'max', '1710755316.00', NULL),
(3755, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:104\"]', 'count', '1.00', NULL),
(3763, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:104\"]', 'max', '1710755721.00', NULL),
(3779, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 'count', '1.00', NULL),
(3787, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 'max', '1710755807.00', NULL),
(3792, 1710747360, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 'count', '1.00', NULL),
(3799, 1710747360, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 'max', '1710755824.00', NULL),
(3855, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:111\"]', 'count', '3.00', NULL),
(3863, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:111\"]', 'max', '1710756595.00', NULL),
(3896, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 'count', '1.00', NULL),
(3903, 1710747360, 10080, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 'max', '1710756678.00', NULL),
(3928, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 'count', '1.00', NULL),
(3935, 1710747360, 10080, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 'max', '1710757043.00', NULL),
(4004, 1710757440, 10080, 'user_request', '1', 'count', '37.00', NULL),
(4074, 1710757440, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'count', '1.00', NULL),
(4080, 1710757440, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'max', '1710765320.00', NULL),
(4096, 1710757440, 10080, 'exception', '[\"Error\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:139\"]', 'count', '1.00', NULL),
(4104, 1710757440, 10080, 'exception', '[\"Error\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:139\"]', 'max', '1710765418.00', NULL),
(4134, 1710757440, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:163\"]', 'count', '1.00', NULL),
(4140, 1710757440, 10080, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:163\"]', 'max', '1710766034.00', NULL),
(4173, 1710777600, 10080, 'user_request', '1', 'count', '211.00', NULL),
(4281, 1710777600, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'count', '2.00', NULL),
(4289, 1710777600, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'max', '1710783995.00', NULL),
(4365, 1710777600, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-pencairan\\/index.blade.php:74\"]', 'count', '1.00', NULL),
(4373, 1710777600, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-pencairan\\/index.blade.php:74\"]', 'max', '1710781917.00', NULL),
(4433, 1710777600, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'count', '1.00', NULL),
(4441, 1710777600, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 'max', '1710782761.00', NULL),
(4689, 1710777600, 10080, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 'count', '6.00', NULL),
(4697, 1710777600, 10080, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 'max', '1710784596.00', NULL),
(4790, 1710777600, 10080, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 'count', '1.00', NULL),
(4797, 1710777600, 10080, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 'max', '1710784663.00', NULL),
(4813, 1710777600, 10080, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:39\"]', 'count', '1.00', NULL),
(4821, 1710777600, 10080, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:39\"]', 'max', '1710784769.00', NULL),
(5113, 1710787680, 10080, 'user_request', '1', 'count', '30.00', NULL),
(5129, 1710787680, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'count', '1.00', NULL),
(5137, 1710787680, 10080, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 'max', '1710788968.00', NULL),
(5226, 1710787680, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/detail.blade.php:293\"]', 'count', '1.00', NULL),
(5233, 1710787680, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/detail.blade.php:293\"]', 'max', '1710789822.00', NULL),
(5246, 1710817920, 10080, 'user_request', '1', 'count', '145.00', NULL),
(5270, 1710817920, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:93\"]', 'count', '1.00', NULL),
(5278, 1710817920, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:93\"]', 'max', '1710820307.00', NULL),
(5305, 1710817920, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:120\"]', 'count', '1.00', NULL),
(5310, 1710817920, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:120\"]', 'max', '1710820836.00', NULL),
(5839, 1710848160, 10080, 'user_request', '1', 'count', '37.00', NULL),
(5900, 1710848160, 10080, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:287\"]', 'count', '1.00', NULL),
(5907, 1710848160, 10080, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:287\"]', 'max', '1710851389.00', NULL),
(5993, 1710868320, 10080, 'user_request', '1', 'count', '134.00', NULL),
(6457, 1710868320, 10080, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:257\"]', 'count', '1.00', NULL),
(6465, 1710868320, 10080, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:257\"]', 'max', '1710874029.00', NULL),
(6535, 1710898560, 10080, 'user_request', '1', 'count', '60.00', NULL),
(6775, 1710908640, 10080, 'user_request', '1', 'count', '13.00', NULL),
(6824, 1710918720, 10080, 'user_request', '1', 'count', '66.00', NULL),
(6926, 1710918720, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:81\"]', 'count', '1.00', NULL),
(6932, 1710918720, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:81\"]', 'max', '1710921030.00', NULL),
(7090, 1710979200, 10080, 'user_request', '1', 'count', '7.00', NULL),
(7116, 1711019520, 10080, 'user_request', '1', 'count', '3.00', NULL),
(7125, 1711029600, 10080, 'user_request', '1', 'count', '44.00', NULL),
(7269, 1711029600, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/edit.blade.php:204\"]', 'count', '2.00', NULL),
(7277, 1711029600, 10080, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/edit.blade.php:204\"]', 'max', '1711035037.00', NULL),
(7311, 1711173000, 60, 'user_request', '1', 'count', '4.00', NULL),
(7312, 1711172880, 360, 'user_request', '1', 'count', '6.00', NULL),
(7313, 1711172160, 1440, 'user_request', '1', 'count', '14.00', NULL),
(7314, 1711170720, 10080, 'user_request', '1', 'count', '72.00', NULL),
(7327, 1711173120, 60, 'user_request', '1', 'count', '2.00', NULL),
(7335, 1711173360, 60, 'user_request', '1', 'count', '4.00', NULL),
(7336, 1711173240, 360, 'user_request', '1', 'count', '8.00', NULL),
(7351, 1711173420, 60, 'user_request', '1', 'count', '2.00', NULL),
(7359, 1711173480, 60, 'user_request', '1', 'count', '1.00', NULL),
(7363, 1711173540, 60, 'user_request', '1', 'count', '1.00', NULL),
(7367, 1711173720, 60, 'user_request', '1', 'count', '1.00', NULL),
(7368, 1711173600, 360, 'user_request', '1', 'count', '1.00', NULL),
(7369, 1711173600, 1440, 'user_request', '1', 'count', '26.00', NULL),
(7371, 1711174320, 60, 'user_request', '1', 'count', '1.00', NULL),
(7372, 1711174320, 360, 'user_request', '1', 'count', '18.00', NULL),
(7373, 1711174320, 60, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'count', '1.00', NULL),
(7374, 1711174320, 360, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'count', '1.00', NULL),
(7375, 1711173600, 1440, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'count', '1.00', NULL),
(7376, 1711170720, 10080, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'count', '1.00', NULL),
(7379, 1711174320, 60, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'max', '1711174370.00', NULL),
(7380, 1711174320, 360, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'max', '1711174370.00', NULL),
(7381, 1711173600, 1440, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'max', '1711174370.00', NULL),
(7382, 1711170720, 10080, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 'max', '1711174370.00', NULL),
(7383, 1711174380, 60, 'user_request', '1', 'count', '2.00', NULL),
(7391, 1711174440, 60, 'user_request', '1', 'count', '5.00', NULL),
(7411, 1711174500, 60, 'user_request', '1', 'count', '4.00', NULL),
(7427, 1711174560, 60, 'user_request', '1', 'count', '5.00', NULL),
(7447, 1711174620, 60, 'user_request', '1', 'count', '1.00', NULL),
(7451, 1711174740, 60, 'user_request', '1', 'count', '5.00', NULL),
(7452, 1711174680, 360, 'user_request', '1', 'count', '7.00', NULL),
(7471, 1711174800, 60, 'user_request', '1', 'count', '1.00', NULL),
(7475, 1711174860, 60, 'user_request', '1', 'count', '1.00', NULL),
(7479, 1711175040, 60, 'user_request', '1', 'count', '1.00', NULL),
(7480, 1711175040, 360, 'user_request', '1', 'count', '8.00', NULL),
(7481, 1711175040, 1440, 'user_request', '1', 'count', '32.00', NULL),
(7483, 1711175100, 60, 'user_request', '1', 'count', '4.00', NULL),
(7499, 1711175160, 60, 'user_request', '1', 'count', '1.00', NULL),
(7503, 1711175280, 60, 'user_request', '1', 'count', '2.00', NULL),
(7511, 1711175400, 60, 'user_request', '1', 'count', '1.00', NULL),
(7512, 1711175400, 360, 'user_request', '1', 'count', '12.00', NULL),
(7515, 1711175460, 60, 'user_request', '1', 'count', '2.00', NULL),
(7523, 1711175520, 60, 'user_request', '1', 'count', '3.00', NULL),
(7535, 1711175580, 60, 'user_request', '1', 'count', '2.00', NULL),
(7543, 1711175700, 60, 'user_request', '1', 'count', '4.00', NULL),
(7559, 1711175760, 60, 'user_request', '1', 'count', '4.00', NULL),
(7560, 1711175760, 360, 'user_request', '1', 'count', '12.00', NULL),
(7575, 1711175820, 60, 'user_request', '1', 'count', '1.00', NULL),
(7579, 1711175880, 60, 'user_request', '1', 'count', '6.00', NULL),
(7603, 1711175940, 60, 'user_request', '1', 'count', '1.00', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pulse_entries`
--

CREATE TABLE `pulse_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pulse_entries`
--

INSERT INTO `pulse_entries` (`id`, `timestamp`, `type`, `key`, `value`) VALUES
(1, 1710665191, 'user_request', '1', NULL),
(2, 1710665191, 'user_request', '1', NULL),
(3, 1710665191, 'user_request', '1', NULL),
(4, 1710665193, 'user_request', '1', NULL),
(5, 1710665193, 'user_request', '1', NULL),
(6, 1710665194, 'user_request', '1', NULL),
(7, 1710665195, 'user_request', '1', NULL),
(8, 1710665994, 'user_request', '1', NULL),
(9, 1710665994, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:32\"]', 1710665994),
(10, 1710666110, 'user_request', '1', NULL),
(11, 1710666147, 'user_request', '1', NULL),
(12, 1710666149, 'user_request', '1', NULL),
(13, 1710666171, 'user_request', '1', NULL),
(14, 1710666184, 'user_request', '1', NULL),
(15, 1710666197, 'user_request', '1', NULL),
(16, 1710666252, 'user_request', '1', NULL),
(17, 1710666282, 'user_request', '1', NULL),
(18, 1710666282, 'user_request', '1', NULL),
(19, 1710666301, 'user_request', '1', NULL),
(20, 1710666301, 'exception', '[\"Error\",\"app\\/Models\\/Role.php:79\"]', 1710666301),
(21, 1710666336, 'user_request', '1', NULL),
(22, 1710666965, 'user_request', '1', NULL),
(23, 1710666966, 'user_request', '1', NULL),
(24, 1710666966, 'user_request', '1', NULL),
(25, 1710666966, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:33\"]', 1710666966),
(26, 1710666981, 'user_request', '1', NULL),
(27, 1710666990, 'user_request', '1', NULL),
(28, 1710667014, 'user_request', '1', NULL),
(29, 1710667037, 'user_request', '1', NULL),
(30, 1710667038, 'user_request', '1', NULL),
(31, 1710667084, 'user_request', '1', NULL),
(32, 1710667084, 'user_request', '1', NULL),
(33, 1710667130, 'user_request', '1', NULL),
(34, 1710667342, 'user_request', '1', NULL),
(35, 1710667368, 'user_request', '1', NULL),
(36, 1710667412, 'user_request', '1', NULL),
(37, 1710667564, 'user_request', '1', NULL),
(38, 1710667564, 'user_request', '1', NULL),
(39, 1710667572, 'user_request', '1', NULL),
(40, 1710667574, 'user_request', '1', NULL),
(41, 1710667574, 'user_request', '1', NULL),
(42, 1710667574, 'user_request', '1', NULL),
(43, 1710667574, 'user_request', '1', NULL),
(44, 1710667574, 'user_request', '1', NULL),
(45, 1710667574, 'user_request', '1', NULL),
(46, 1710667574, 'user_request', '1', NULL),
(47, 1710667579, 'user_request', '1', NULL),
(48, 1710667583, 'user_request', '1', NULL),
(49, 1710667583, 'user_request', '1', NULL),
(50, 1710667584, 'user_request', '1', NULL),
(51, 1710667589, 'user_request', '1', NULL),
(52, 1710667594, 'user_request', '1', NULL),
(53, 1710667599, 'user_request', '1', NULL),
(54, 1710667603, 'user_request', '1', NULL),
(55, 1710667604, 'user_request', '1', NULL),
(56, 1710667608, 'user_request', '1', NULL),
(57, 1710667609, 'user_request', '1', NULL),
(58, 1710667614, 'user_request', '1', NULL),
(59, 1710667619, 'user_request', '1', NULL),
(60, 1710667624, 'user_request', '1', NULL),
(61, 1710667629, 'user_request', '1', NULL),
(62, 1710667634, 'user_request', '1', NULL),
(63, 1710667639, 'user_request', '1', NULL),
(64, 1710667644, 'user_request', '1', NULL),
(65, 1710667649, 'user_request', '1', NULL),
(66, 1710667756, 'user_request', '1', NULL),
(67, 1710667874, 'user_request', '1', NULL),
(68, 1710667874, 'user_request', '1', NULL),
(69, 1710667900, 'user_request', '1', NULL),
(70, 1710667900, 'user_request', '1', NULL),
(71, 1710667921, 'user_request', '1', NULL),
(72, 1710667921, 'user_request', '1', NULL),
(73, 1710667955, 'user_request', '1', NULL),
(74, 1710667955, 'user_request', '1', NULL),
(75, 1710667967, 'user_request', '1', NULL),
(76, 1710667967, 'user_request', '1', NULL),
(77, 1710667985, 'user_request', '1', NULL),
(78, 1710667985, 'user_request', '1', NULL),
(79, 1710668031, 'user_request', '1', NULL),
(80, 1710668031, 'user_request', '1', NULL),
(81, 1710668049, 'user_request', '1', NULL),
(82, 1710668049, 'user_request', '1', NULL),
(83, 1710668066, 'user_request', '1', NULL),
(84, 1710668066, 'user_request', '1', NULL),
(85, 1710668147, 'user_request', '1', NULL),
(86, 1710668151, 'user_request', '1', NULL),
(87, 1710668166, 'user_request', '1', NULL),
(88, 1710668238, 'user_request', '1', NULL),
(89, 1710668239, 'user_request', '1', NULL),
(90, 1710668331, 'user_request', '1', NULL),
(91, 1710668968, 'user_request', '1', NULL),
(92, 1710668971, 'user_request', '1', NULL),
(93, 1710668972, 'user_request', '1', NULL),
(94, 1710669858, 'user_request', '1', NULL),
(95, 1710669859, 'user_request', '1', NULL),
(96, 1710670360, 'user_request', '1', NULL),
(97, 1710670381, 'user_request', '1', NULL),
(98, 1710670486, 'user_request', '1', NULL),
(99, 1710670505, 'user_request', '1', NULL),
(100, 1710670542, 'user_request', '1', NULL),
(101, 1710670648, 'user_request', '1', NULL),
(102, 1710671157, 'user_request', '1', NULL),
(103, 1710671157, 'user_request', '1', NULL),
(104, 1710672871, 'user_request', '1', NULL),
(105, 1710672871, 'user_request', '1', NULL),
(106, 1710672873, 'user_request', '1', NULL),
(107, 1710672873, 'user_request', '1', NULL),
(108, 1710672874, 'user_request', '1', NULL),
(109, 1710672875, 'user_request', '1', NULL),
(110, 1710672875, 'user_request', '1', NULL),
(111, 1710672878, 'user_request', '1', NULL),
(112, 1710672887, 'user_request', '1', NULL),
(113, 1710672893, 'user_request', '1', NULL),
(114, 1710672894, 'user_request', '1', NULL),
(115, 1710672895, 'user_request', '1', NULL),
(116, 1710672896, 'user_request', '1', NULL),
(117, 1710672897, 'user_request', '1', NULL),
(118, 1710672898, 'user_request', '1', NULL),
(119, 1710672898, 'user_request', '1', NULL),
(120, 1710672899, 'user_request', '1', NULL),
(121, 1710672900, 'user_request', '1', NULL),
(122, 1710672901, 'user_request', '1', NULL),
(123, 1710672902, 'user_request', '1', NULL),
(124, 1710672903, 'user_request', '1', NULL),
(125, 1710672903, 'user_request', '1', NULL),
(126, 1710672904, 'user_request', '1', NULL),
(127, 1710673483, 'user_request', '1', NULL),
(128, 1710673506, 'user_request', '1', NULL),
(129, 1710673519, 'user_request', '1', NULL),
(130, 1710673531, 'user_request', '1', NULL),
(131, 1710678674, 'user_request', '1', NULL),
(132, 1710678772, 'user_request', '1', NULL),
(133, 1710678772, 'exception', '[\"TypeError\",\"resources\\/views\\/layout\\/index.blade.php:65\"]', 1710678772),
(134, 1710678791, 'user_request', '1', NULL),
(135, 1710678816, 'user_request', '1', NULL),
(136, 1710678817, 'user_request', '1', NULL),
(137, 1710678818, 'user_request', '1', NULL),
(138, 1710678818, 'user_request', '1', NULL),
(139, 1710678818, 'user_request', '1', NULL),
(140, 1710678837, 'user_request', '1', NULL),
(141, 1710678993, 'user_request', '1', NULL),
(142, 1710679004, 'user_request', '1', NULL),
(143, 1710679030, 'user_request', '1', NULL),
(144, 1710679040, 'user_request', '1', NULL),
(145, 1710679040, 'user_request', '1', NULL),
(146, 1710679047, 'user_request', '1', NULL),
(147, 1710679082, 'user_request', '1', NULL),
(148, 1710679223, 'user_request', '1', NULL),
(149, 1710679244, 'user_request', '1', NULL),
(150, 1710679245, 'user_request', '1', NULL),
(151, 1710679246, 'user_request', '1', NULL),
(152, 1710679275, 'user_request', '1', NULL),
(153, 1710679285, 'user_request', '1', NULL),
(154, 1710679428, 'user_request', '1', NULL),
(155, 1710680754, 'user_request', '1', NULL),
(156, 1710680763, 'user_request', '1', NULL),
(157, 1710680778, 'user_request', '1', NULL),
(158, 1710680804, 'user_request', '1', NULL),
(159, 1710680821, 'user_request', '1', NULL),
(160, 1710680839, 'user_request', '1', NULL),
(161, 1710680865, 'user_request', '1', NULL),
(162, 1710680868, 'user_request', '1', NULL),
(163, 1710680886, 'user_request', '1', NULL),
(164, 1710680888, 'user_request', '1', NULL),
(165, 1710681240, 'user_request', '1', NULL),
(166, 1710681240, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 1710681240),
(167, 1710681258, 'user_request', '1', NULL),
(168, 1710681258, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 1710681258),
(169, 1710681277, 'user_request', '1', NULL),
(170, 1710681284, 'user_request', '1', NULL),
(171, 1710681294, 'user_request', '1', NULL),
(172, 1710681313, 'user_request', '1', NULL),
(173, 1710681331, 'user_request', '1', NULL),
(174, 1710681385, 'user_request', '1', NULL),
(175, 1710681400, 'user_request', '1', NULL),
(176, 1710681407, 'user_request', '1', NULL),
(177, 1710681416, 'user_request', '1', NULL),
(178, 1710681440, 'user_request', '1', NULL),
(179, 1710681581, 'user_request', '1', NULL),
(180, 1710681582, 'user_request', '1', NULL),
(181, 1710681582, 'user_request', '1', NULL),
(182, 1710681583, 'user_request', '1', NULL),
(183, 1710681583, 'user_request', '1', NULL),
(184, 1710681583, 'user_request', '1', NULL),
(185, 1710681595, 'user_request', '2', NULL),
(186, 1710681595, 'user_request', '2', NULL),
(187, 1710681595, 'user_request', '2', NULL),
(188, 1710681597, 'user_request', '2', NULL),
(189, 1710681600, 'user_request', '2', NULL),
(190, 1710681601, 'user_request', '2', NULL),
(191, 1710681602, 'user_request', '2', NULL),
(192, 1710681603, 'user_request', '2', NULL),
(193, 1710681603, 'user_request', '2', NULL),
(194, 1710681617, 'user_request', '2', NULL),
(195, 1710681619, 'user_request', '2', NULL),
(196, 1710681619, 'user_request', '2', NULL),
(197, 1710681620, 'user_request', '2', NULL),
(198, 1710681621, 'user_request', '2', NULL),
(199, 1710681621, 'user_request', '2', NULL),
(200, 1710681622, 'user_request', '2', NULL),
(201, 1710681806, 'user_request', '1', NULL),
(202, 1710681812, 'user_request', '2', NULL),
(203, 1710681812, 'user_request', '2', NULL),
(204, 1710681813, 'user_request', '2', NULL),
(205, 1710681813, 'user_request', '2', NULL),
(206, 1710681821, 'user_request', '2', NULL),
(207, 1710681821, 'user_request', '2', NULL),
(208, 1710681827, 'user_request', '2', NULL),
(209, 1710681827, 'user_request', '2', NULL),
(210, 1710681846, 'user_request', '1', NULL),
(211, 1710681879, 'user_request', '2', NULL),
(212, 1710681880, 'user_request', '2', NULL),
(213, 1710681893, 'user_request', '1', NULL),
(214, 1710681897, 'user_request', '2', NULL),
(215, 1710681897, 'user_request', '2', NULL),
(216, 1710681898, 'user_request', '2', NULL),
(217, 1710681898, 'user_request', '2', NULL),
(218, 1710681901, 'user_request', '2', NULL),
(219, 1710681972, 'user_request', '1', NULL),
(220, 1710681973, 'user_request', '1', NULL),
(221, 1710681987, 'user_request', '1', NULL),
(222, 1710681995, 'user_request', '1', NULL),
(223, 1710682002, 'user_request', '1', NULL),
(224, 1710682222, 'user_request', '1', NULL),
(225, 1710682225, 'user_request', '1', NULL),
(226, 1710682228, 'user_request', '1', NULL),
(227, 1710682238, 'user_request', '1', NULL),
(228, 1710682246, 'user_request', '1', NULL),
(229, 1710682248, 'user_request', '1', NULL),
(230, 1710682253, 'user_request', '2', NULL),
(231, 1710682254, 'user_request', '2', NULL),
(232, 1710682556, 'user_request', '2', NULL),
(233, 1710682561, 'user_request', '1', NULL),
(234, 1710682578, 'user_request', '2', NULL),
(235, 1710682609, 'user_request', '2', NULL),
(236, 1710682628, 'user_request', '1', NULL),
(237, 1710682781, 'user_request', '1', NULL),
(238, 1710682781, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:46\"]', 1710682781),
(239, 1710682815, 'user_request', '1', NULL),
(240, 1710682818, 'user_request', '1', NULL),
(241, 1710682823, 'user_request', '1', NULL),
(242, 1710682824, 'user_request', '1', NULL),
(243, 1710682878, 'user_request', '1', NULL),
(244, 1710682890, 'user_request', '1', NULL),
(245, 1710682938, 'user_request', '1', NULL),
(246, 1710682947, 'user_request', '2', NULL),
(247, 1710683026, 'user_request', '2', NULL),
(248, 1710683029, 'user_request', '1', NULL),
(249, 1710683054, 'user_request', '1', NULL),
(250, 1710683067, 'user_request', '1', NULL),
(251, 1710683075, 'user_request', '1', NULL),
(252, 1710683080, 'user_request', '1', NULL),
(253, 1710683128, 'user_request', '1', NULL),
(254, 1710683129, 'user_request', '1', NULL),
(255, 1710683130, 'user_request', '1', NULL),
(256, 1710683153, 'user_request', '1', NULL),
(257, 1710683162, 'user_request', '1', NULL),
(258, 1710683183, 'user_request', '1', NULL),
(259, 1710683185, 'user_request', '2', NULL),
(260, 1710683316, 'user_request', '1', NULL),
(261, 1710683334, 'user_request', '1', NULL),
(262, 1710683335, 'user_request', '1', NULL),
(263, 1710683335, 'user_request', '1', NULL),
(264, 1710683337, 'user_request', '2', NULL),
(265, 1710683424, 'user_request', '2', NULL),
(266, 1710683425, 'user_request', '2', NULL),
(267, 1710683429, 'user_request', '1', NULL),
(268, 1710683430, 'user_request', '1', NULL),
(269, 1710683432, 'user_request', '2', NULL),
(270, 1710683449, 'user_request', '1', NULL),
(271, 1710683450, 'user_request', '1', NULL),
(272, 1710683452, 'user_request', '2', NULL),
(273, 1710683458, 'user_request', '1', NULL),
(274, 1710683471, 'user_request', '2', NULL),
(275, 1710683479, 'user_request', '1', NULL),
(276, 1710683497, 'user_request', '1', NULL),
(277, 1710683501, 'user_request', '2', NULL),
(278, 1710683503, 'user_request', '2', NULL),
(279, 1710683607, 'user_request', '1', NULL),
(280, 1710683608, 'user_request', '1', NULL),
(281, 1710683609, 'user_request', '1', NULL),
(282, 1710683612, 'user_request', '1', NULL),
(283, 1710683613, 'user_request', '1', NULL),
(284, 1710683746, 'user_request', '2', NULL),
(285, 1710683747, 'user_request', '2', NULL),
(286, 1710683748, 'user_request', '2', NULL),
(287, 1710683750, 'user_request', '2', NULL),
(288, 1710683751, 'user_request', '2', NULL),
(289, 1710683754, 'user_request', '1', NULL),
(290, 1710683755, 'user_request', '1', NULL),
(291, 1710683755, 'user_request', '1', NULL),
(292, 1710683756, 'user_request', '1', NULL),
(293, 1710683757, 'user_request', '1', NULL),
(294, 1710683759, 'user_request', '1', NULL),
(295, 1710683759, 'user_request', '1', NULL),
(296, 1710683760, 'user_request', '1', NULL),
(297, 1710683761, 'user_request', '1', NULL),
(298, 1710683762, 'user_request', '1', NULL),
(299, 1710683764, 'user_request', '1', NULL),
(300, 1710683767, 'user_request', '2', NULL),
(301, 1710683767, 'user_request', '2', NULL),
(302, 1710683768, 'user_request', '2', NULL),
(303, 1710683768, 'user_request', '2', NULL),
(304, 1710683769, 'user_request', '2', NULL),
(305, 1710683832, 'user_request', '1', NULL),
(306, 1710683835, 'user_request', '2', NULL),
(307, 1710683860, 'user_request', '2', NULL),
(308, 1710683872, 'user_request', '2', NULL),
(309, 1710683873, 'user_request', '2', NULL),
(310, 1710683874, 'user_request', '2', NULL),
(311, 1710683879, 'user_request', '2', NULL),
(312, 1710683884, 'user_request', '2', NULL),
(313, 1710683885, 'user_request', '2', NULL),
(314, 1710683885, 'user_request', '2', NULL),
(315, 1710683885, 'user_request', '2', NULL),
(316, 1710683908, 'user_request', '2', NULL),
(317, 1710683910, 'user_request', '2', NULL),
(318, 1710683915, 'user_request', '2', NULL),
(319, 1710683931, 'user_request', '2', NULL),
(320, 1710683940, 'user_request', '1', NULL),
(321, 1710683944, 'user_request', '2', NULL),
(322, 1710683960, 'user_request', '2', NULL),
(323, 1710683975, 'user_request', '2', NULL),
(324, 1710683979, 'user_request', '2', NULL),
(325, 1710683993, 'user_request', '1', NULL),
(326, 1710684026, 'user_request', '1', NULL),
(327, 1710684030, 'user_request', '2', NULL),
(328, 1710684051, 'user_request', '1', NULL),
(329, 1710684068, 'user_request', '1', NULL),
(330, 1710684071, 'user_request', '2', NULL),
(331, 1710684086, 'user_request', '2', NULL),
(332, 1710690082, 'user_request', '2', NULL),
(333, 1710691587, 'user_request', '1', NULL),
(334, 1710691587, 'user_request', '1', NULL),
(335, 1710691587, 'user_request', '1', NULL),
(336, 1710691590, 'user_request', '1', NULL),
(337, 1710691597, 'user_request', '1', NULL),
(338, 1710691615, 'user_request', '1', NULL),
(339, 1710691616, 'user_request', '1', NULL),
(340, 1710691679, 'user_request', '1', NULL),
(341, 1710691680, 'user_request', '1', NULL),
(342, 1710691681, 'user_request', '1', NULL),
(343, 1710691685, 'user_request', '1', NULL),
(344, 1710691685, 'user_request', '1', NULL),
(345, 1710691692, 'user_request', '1', NULL),
(346, 1710691697, 'user_request', '1', NULL),
(347, 1710691726, 'user_request', '1', NULL),
(348, 1710691728, 'user_request', '1', NULL),
(349, 1710691729, 'user_request', '1', NULL),
(350, 1710691746, 'user_request', '1', NULL),
(351, 1710691756, 'user_request', '1', NULL),
(352, 1710691861, 'user_request', '1', NULL),
(353, 1710691868, 'user_request', '1', NULL),
(354, 1710691889, 'user_request', '1', NULL),
(355, 1710691890, 'user_request', '1', NULL),
(356, 1710691890, 'user_request', '1', NULL),
(357, 1710691892, 'user_request', '1', NULL),
(358, 1710691893, 'user_request', '1', NULL),
(359, 1710691893, 'user_request', '1', NULL),
(360, 1710691899, 'user_request', '1', NULL),
(361, 1710691971, 'user_request', '1', NULL),
(362, 1710691983, 'user_request', '1', NULL),
(363, 1710691984, 'user_request', '1', NULL),
(364, 1710691987, 'user_request', '1', NULL),
(365, 1710691989, 'user_request', '1', NULL),
(366, 1710691990, 'user_request', '1', NULL),
(367, 1710691990, 'user_request', '1', NULL),
(368, 1710691991, 'user_request', '1', NULL),
(369, 1710691998, 'user_request', '1', NULL),
(370, 1710691999, 'user_request', '1', NULL),
(371, 1710692004, 'user_request', '1', NULL),
(372, 1710692005, 'user_request', '1', NULL),
(373, 1710692006, 'user_request', '1', NULL),
(374, 1710692049, 'user_request', '1', NULL),
(375, 1710692051, 'user_request', '1', NULL),
(376, 1710692100, 'user_request', '1', NULL),
(377, 1710692101, 'user_request', '1', NULL),
(378, 1710692105, 'user_request', '1', NULL),
(379, 1710692109, 'user_request', '1', NULL),
(380, 1710692113, 'user_request', '1', NULL),
(381, 1710692116, 'user_request', '1', NULL),
(382, 1710692269, 'user_request', '1', NULL),
(383, 1710692282, 'user_request', '1', NULL),
(384, 1710692285, 'user_request', '1', NULL),
(385, 1710692288, 'user_request', '1', NULL),
(386, 1710692291, 'user_request', '1', NULL),
(387, 1710692294, 'user_request', '1', NULL),
(388, 1710692294, 'user_request', '1', NULL),
(389, 1710692295, 'user_request', '1', NULL),
(390, 1710692313, 'user_request', '1', NULL),
(391, 1710692313, 'user_request', '1', NULL),
(392, 1710692315, 'user_request', '1', NULL),
(393, 1710692471, 'user_request', '1', NULL),
(394, 1710692503, 'user_request', '1', NULL),
(395, 1710692633, 'user_request', '1', NULL),
(396, 1710692654, 'user_request', '1', NULL),
(397, 1710692657, 'user_request', '1', NULL),
(398, 1710692657, 'user_request', '1', NULL),
(399, 1710692659, 'user_request', '1', NULL),
(400, 1710692731, 'user_request', '1', NULL),
(401, 1710692731, 'user_request', '1', NULL),
(402, 1710692733, 'user_request', '1', NULL),
(403, 1710692789, 'user_request', '1', NULL),
(404, 1710692791, 'user_request', '1', NULL),
(405, 1710692791, 'user_request', '1', NULL),
(406, 1710692792, 'user_request', '1', NULL),
(407, 1710692805, 'user_request', '1', NULL),
(408, 1710692841, 'user_request', '1', NULL),
(409, 1710692960, 'user_request', '1', NULL),
(410, 1710692998, 'user_request', '1', NULL),
(411, 1710692998, 'user_request', '1', NULL),
(412, 1710692999, 'user_request', '1', NULL),
(413, 1710693011, 'user_request', '1', NULL),
(414, 1710693095, 'user_request', '1', NULL),
(415, 1710693100, 'user_request', '1', NULL),
(416, 1710693102, 'user_request', '1', NULL),
(417, 1710693117, 'user_request', '1', NULL),
(418, 1710693143, 'user_request', '1', NULL),
(419, 1710693182, 'user_request', '1', NULL),
(420, 1710693211, 'user_request', '1', NULL),
(421, 1710693272, 'user_request', '1', NULL),
(422, 1710693371, 'user_request', '1', NULL),
(423, 1710693387, 'user_request', '1', NULL),
(424, 1710693461, 'user_request', '1', NULL),
(425, 1710693462, 'user_request', '1', NULL),
(426, 1710693475, 'user_request', '1', NULL),
(427, 1710693501, 'user_request', '1', NULL),
(428, 1710693508, 'user_request', '1', NULL),
(429, 1710693518, 'user_request', '1', NULL),
(430, 1710693527, 'user_request', '1', NULL),
(431, 1710693527, 'exception', '[\"InvalidArgumentException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:21\"]', 1710693527),
(432, 1710693543, 'user_request', '1', NULL),
(433, 1710693553, 'user_request', '1', NULL),
(434, 1710693554, 'user_request', '1', NULL),
(435, 1710693555, 'user_request', '1', NULL),
(436, 1710693574, 'user_request', '1', NULL),
(437, 1710693577, 'user_request', '1', NULL),
(438, 1710693578, 'user_request', '1', NULL),
(439, 1710693581, 'user_request', '1', NULL),
(440, 1710693597, 'user_request', '1', NULL),
(441, 1710693600, 'user_request', '1', NULL),
(442, 1710693601, 'user_request', '1', NULL),
(443, 1710693607, 'user_request', '1', NULL),
(444, 1710693679, 'user_request', '1', NULL),
(445, 1710693693, 'user_request', '1', NULL),
(446, 1710693699, 'user_request', '1', NULL),
(447, 1710693701, 'user_request', '1', NULL),
(448, 1710693702, 'user_request', '1', NULL),
(449, 1710693703, 'user_request', '1', NULL),
(450, 1710693715, 'user_request', '1', NULL),
(451, 1710693715, 'user_request', '1', NULL),
(452, 1710693718, 'user_request', '1', NULL),
(453, 1710693721, 'user_request', '1', NULL),
(454, 1710693722, 'user_request', '1', NULL),
(455, 1710693729, 'user_request', '1', NULL),
(456, 1710693731, 'user_request', '1', NULL),
(457, 1710693732, 'user_request', '1', NULL),
(458, 1710693811, 'user_request', '1', NULL),
(459, 1710693812, 'user_request', '1', NULL),
(460, 1710693813, 'user_request', '1', NULL),
(461, 1710693821, 'user_request', '1', NULL),
(462, 1710693824, 'user_request', '1', NULL),
(463, 1710693826, 'user_request', '1', NULL),
(464, 1710693860, 'user_request', '1', NULL),
(465, 1710693862, 'user_request', '1', NULL),
(466, 1710693864, 'user_request', '1', NULL),
(467, 1710693869, 'user_request', '1', NULL),
(468, 1710693869, 'user_request', '1', NULL),
(469, 1710693870, 'user_request', '1', NULL),
(470, 1710693891, 'user_request', '1', NULL),
(471, 1710693936, 'user_request', '1', NULL),
(472, 1710693938, 'user_request', '1', NULL),
(473, 1710693952, 'user_request', '1', NULL),
(474, 1710693969, 'user_request', '1', NULL),
(475, 1710694020, 'user_request', '1', NULL),
(476, 1710694021, 'user_request', '1', NULL),
(477, 1710694022, 'user_request', '1', NULL),
(478, 1710694022, 'user_request', '1', NULL),
(479, 1710694023, 'user_request', '1', NULL),
(480, 1710694029, 'user_request', '1', NULL),
(481, 1710694149, 'user_request', '1', NULL),
(482, 1710694150, 'user_request', '1', NULL),
(483, 1710694152, 'user_request', '1', NULL),
(484, 1710694240, 'user_request', '1', NULL),
(485, 1710694242, 'user_request', '1', NULL),
(486, 1710694243, 'user_request', '1', NULL),
(487, 1710694244, 'user_request', '1', NULL),
(488, 1710694245, 'user_request', '1', NULL),
(489, 1710694246, 'user_request', '1', NULL),
(490, 1710694248, 'user_request', '1', NULL),
(491, 1710694255, 'user_request', '1', NULL),
(492, 1710694279, 'user_request', '1', NULL),
(493, 1710694286, 'user_request', '1', NULL),
(494, 1710694289, 'user_request', '1', NULL),
(495, 1710694291, 'user_request', '1', NULL),
(496, 1710694292, 'user_request', '1', NULL),
(497, 1710694309, 'user_request', '1', NULL),
(498, 1710694312, 'user_request', '1', NULL),
(499, 1710694320, 'user_request', '1', NULL),
(500, 1710694323, 'user_request', '1', NULL),
(501, 1710694339, 'user_request', '1', NULL),
(502, 1710694341, 'user_request', '1', NULL),
(503, 1710694358, 'user_request', '1', NULL),
(504, 1710694366, 'user_request', '1', NULL),
(505, 1710694428, 'user_request', '1', NULL),
(506, 1710694430, 'user_request', '1', NULL),
(507, 1710694430, 'user_request', '1', NULL),
(508, 1710695004, 'user_request', '1', NULL),
(509, 1710695012, 'user_request', '1', NULL),
(510, 1710695013, 'user_request', '1', NULL),
(511, 1710695024, 'user_request', '1', NULL),
(512, 1710716639, 'user_request', '1', NULL),
(513, 1710716639, 'user_request', '1', NULL),
(514, 1710716639, 'user_request', '1', NULL),
(515, 1710716659, 'user_request', '1', NULL),
(516, 1710716712, 'user_request', '1', NULL),
(517, 1710716739, 'user_request', '1', NULL),
(518, 1710716746, 'user_request', '1', NULL),
(519, 1710716768, 'user_request', '1', NULL),
(520, 1710716784, 'user_request', '1', NULL),
(521, 1710716794, 'user_request', '1', NULL),
(522, 1710716805, 'user_request', '1', NULL),
(523, 1710716818, 'user_request', '1', NULL),
(524, 1710716826, 'user_request', '1', NULL),
(525, 1710716827, 'user_request', '1', NULL),
(526, 1710716828, 'user_request', '1', NULL),
(527, 1710716900, 'user_request', '1', NULL),
(528, 1710716903, 'user_request', '1', NULL),
(529, 1710716922, 'user_request', '1', NULL),
(530, 1710716923, 'user_request', '1', NULL),
(531, 1710716928, 'user_request', '1', NULL),
(532, 1710716930, 'user_request', '1', NULL),
(533, 1710716932, 'user_request', '1', NULL),
(534, 1710716936, 'user_request', '1', NULL),
(535, 1710716940, 'user_request', '1', NULL),
(536, 1710716987, 'user_request', '1', NULL),
(537, 1710717914, 'user_request', '1', NULL),
(538, 1710717937, 'user_request', '1', NULL),
(539, 1710717938, 'user_request', '1', NULL),
(540, 1710717938, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 1710717938),
(541, 1710718123, 'user_request', '1', NULL),
(542, 1710718123, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/UrlGenerator.php:477\"]', 1710718123),
(543, 1710718148, 'user_request', '1', NULL),
(544, 1710718151, 'user_request', '1', NULL),
(545, 1710718156, 'user_request', '1', NULL),
(546, 1710718157, 'user_request', '1', NULL),
(547, 1710718167, 'user_request', '1', NULL),
(548, 1710718168, 'user_request', '1', NULL),
(549, 1710718168, 'user_request', '1', NULL),
(550, 1710718168, 'user_request', '1', NULL),
(551, 1710718181, 'user_request', '1', NULL),
(552, 1710718183, 'user_request', '1', NULL),
(553, 1710718184, 'user_request', '1', NULL),
(554, 1710718198, 'user_request', '1', NULL),
(555, 1710718209, 'user_request', '1', NULL),
(556, 1710718628, 'user_request', '1', NULL),
(557, 1710718628, 'exception', '[\"Illuminate\\\\Database\\\\Eloquent\\\\MassAssignmentException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementPeriodController.php:19\"]', 1710718628),
(558, 1710718662, 'user_request', '1', NULL),
(559, 1710718662, 'user_request', '1', NULL),
(560, 1710718662, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 1710718662),
(561, 1710718703, 'user_request', '1', NULL),
(562, 1710718707, 'user_request', '1', NULL),
(563, 1710718707, 'user_request', '1', NULL),
(564, 1710718712, 'user_request', '1', NULL),
(565, 1710718712, 'user_request', '1', NULL),
(566, 1710718715, 'user_request', '1', NULL),
(567, 1710718715, 'user_request', '1', NULL),
(568, 1710718727, 'user_request', '1', NULL),
(569, 1710718727, 'user_request', '1', NULL),
(570, 1710718734, 'user_request', '1', NULL),
(571, 1710718734, 'user_request', '1', NULL),
(572, 1710718746, 'user_request', '1', NULL),
(573, 1710718748, 'user_request', '1', NULL),
(574, 1710718749, 'user_request', '1', NULL),
(575, 1710718752, 'user_request', '1', NULL),
(576, 1710718762, 'user_request', '1', NULL),
(577, 1710718968, 'user_request', '1', NULL),
(578, 1710718970, 'user_request', '1', NULL),
(579, 1710719007, 'user_request', '1', NULL),
(580, 1710719008, 'user_request', '1', NULL),
(581, 1710719010, 'user_request', '1', NULL),
(582, 1710719011, 'user_request', '1', NULL),
(583, 1710719012, 'user_request', '1', NULL),
(584, 1710719060, 'user_request', '1', NULL),
(585, 1710719076, 'user_request', '1', NULL),
(586, 1710719077, 'user_request', '1', NULL),
(587, 1710719078, 'user_request', '1', NULL),
(588, 1710719079, 'user_request', '1', NULL),
(589, 1710719121, 'user_request', '1', NULL),
(590, 1710719162, 'user_request', '1', NULL),
(591, 1710719243, 'user_request', '1', NULL),
(592, 1710719251, 'user_request', '1', NULL),
(593, 1710719254, 'user_request', '1', NULL),
(594, 1710719320, 'user_request', '1', NULL),
(595, 1710719367, 'user_request', '1', NULL),
(596, 1710719445, 'user_request', '1', NULL),
(597, 1710719447, 'user_request', '1', NULL),
(598, 1710719470, 'user_request', '1', NULL),
(599, 1710719520, 'user_request', '1', NULL),
(600, 1710719520, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:58\"]', 1710719520),
(601, 1710719533, 'user_request', '1', NULL),
(602, 1710719542, 'user_request', '1', NULL),
(603, 1710719560, 'user_request', '1', NULL),
(604, 1710719638, 'user_request', '1', NULL),
(605, 1710719658, 'user_request', '1', NULL),
(606, 1710719750, 'user_request', '1', NULL),
(607, 1710719765, 'user_request', '1', NULL),
(608, 1710719847, 'user_request', '1', NULL),
(609, 1710719847, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:113\"]', 1710719847),
(610, 1710719871, 'user_request', '1', NULL),
(611, 1710719904, 'user_request', '1', NULL),
(612, 1710719953, 'user_request', '1', NULL),
(613, 1710720000, 'user_request', '1', NULL),
(614, 1710720050, 'user_request', '1', NULL),
(615, 1710720083, 'user_request', '1', NULL),
(616, 1710720106, 'user_request', '1', NULL),
(617, 1710720120, 'user_request', '1', NULL),
(618, 1710720131, 'user_request', '1', NULL),
(619, 1710720151, 'user_request', '1', NULL),
(620, 1710720415, 'user_request', '1', NULL),
(621, 1710720444, 'user_request', '1', NULL),
(622, 1710721005, 'user_request', '1', NULL),
(623, 1710721110, 'user_request', '1', NULL),
(624, 1710721144, 'user_request', '1', NULL),
(625, 1710722412, 'user_request', '1', NULL),
(626, 1710722459, 'user_request', '1', NULL),
(627, 1710722476, 'user_request', '1', NULL),
(628, 1710722644, 'user_request', '1', NULL),
(629, 1710722655, 'user_request', '1', NULL),
(630, 1710722655, 'exception', '[\"BadMethodCallException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Validation\\/Validator.php:1636\"]', 1710722655),
(631, 1710722678, 'user_request', '1', NULL),
(632, 1710722678, 'user_request', '1', NULL),
(633, 1710722723, 'user_request', '1', NULL),
(634, 1710722820, 'user_request', '1', NULL),
(635, 1710722839, 'user_request', '1', NULL),
(636, 1710722845, 'user_request', '1', NULL),
(637, 1710722849, 'user_request', '1', NULL),
(638, 1710722849, 'user_request', '1', NULL),
(639, 1710722898, 'user_request', '1', NULL),
(640, 1710722898, 'user_request', '1', NULL),
(641, 1710722948, 'user_request', '1', NULL),
(642, 1710722958, 'user_request', '1', NULL),
(643, 1710722958, 'user_request', '1', NULL),
(644, 1710723001, 'user_request', '1', NULL),
(645, 1710723011, 'user_request', '1', NULL),
(646, 1710723011, 'user_request', '1', NULL),
(647, 1710723042, 'user_request', '1', NULL),
(648, 1710723063, 'user_request', '1', NULL),
(649, 1710723063, 'user_request', '1', NULL),
(650, 1710723100, 'user_request', '1', NULL),
(651, 1710723100, 'user_request', '1', NULL),
(652, 1710723175, 'user_request', '1', NULL),
(653, 1710723203, 'user_request', '1', NULL),
(654, 1710723233, 'user_request', '1', NULL),
(655, 1710723272, 'user_request', '1', NULL),
(656, 1710723714, 'user_request', '1', NULL),
(657, 1710723714, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:67\"]', 1710723714),
(658, 1710723771, 'user_request', '1', NULL),
(659, 1710723846, 'user_request', '1', NULL),
(660, 1710723846, 'user_request', '1', NULL),
(661, 1710723964, 'user_request', '1', NULL),
(662, 1710723970, 'user_request', '1', NULL),
(663, 1710724005, 'user_request', '1', NULL),
(664, 1710724097, 'user_request', '1', NULL),
(665, 1710724100, 'user_request', '1', NULL),
(666, 1710724145, 'user_request', '1', NULL),
(667, 1710724171, 'user_request', '1', NULL),
(668, 1710724171, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:64\"]', 1710724171),
(669, 1710724178, 'user_request', '1', NULL),
(670, 1710724213, 'user_request', '1', NULL),
(671, 1710724237, 'user_request', '1', NULL),
(672, 1710724258, 'user_request', '1', NULL),
(673, 1710724259, 'user_request', '1', NULL),
(674, 1710724261, 'user_request', '1', NULL),
(675, 1710724263, 'user_request', '1', NULL),
(676, 1710724265, 'user_request', '1', NULL),
(677, 1710724268, 'user_request', '1', NULL),
(678, 1710724271, 'user_request', '1', NULL),
(679, 1710724274, 'user_request', '1', NULL),
(680, 1710724280, 'user_request', '1', NULL),
(681, 1710724393, 'user_request', '1', NULL),
(682, 1710724394, 'user_request', '1', NULL),
(683, 1710724407, 'user_request', '1', NULL),
(684, 1710724440, 'user_request', '1', NULL),
(685, 1710724441, 'user_request', '1', NULL),
(686, 1710724445, 'user_request', '1', NULL),
(687, 1710724464, 'user_request', '1', NULL),
(688, 1710724609, 'user_request', '1', NULL),
(689, 1710724631, 'user_request', '1', NULL),
(690, 1710724633, 'user_request', '1', NULL),
(691, 1710724650, 'user_request', '1', NULL),
(692, 1710724651, 'user_request', '1', NULL),
(693, 1710724655, 'user_request', '1', NULL),
(694, 1710724686, 'user_request', '1', NULL),
(695, 1710724697, 'user_request', '1', NULL),
(696, 1710724713, 'user_request', '1', NULL),
(697, 1710724715, 'user_request', '1', NULL),
(698, 1710724717, 'user_request', '1', NULL),
(699, 1710724753, 'user_request', '1', NULL),
(700, 1710724755, 'user_request', '1', NULL),
(701, 1710724756, 'user_request', '1', NULL),
(702, 1710724758, 'user_request', '1', NULL),
(703, 1710724824, 'user_request', '1', NULL),
(704, 1710724954, 'user_request', '1', NULL),
(705, 1710724969, 'user_request', '1', NULL),
(706, 1710725000, 'user_request', '1', NULL),
(707, 1710725000, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:54\"]', 1710725000),
(708, 1710725005, 'user_request', '1', NULL),
(709, 1710725136, 'user_request', '1', NULL),
(710, 1710725137, 'user_request', '1', NULL),
(711, 1710725144, 'user_request', '1', NULL),
(712, 1710725145, 'user_request', '1', NULL),
(713, 1710725167, 'user_request', '1', NULL),
(714, 1710725245, 'user_request', '1', NULL),
(715, 1710725303, 'user_request', '1', NULL),
(716, 1710725303, 'exception', '[\"Exception\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Collections\\/Traits\\/EnumeratesValues.php:1007\"]', 1710725303),
(717, 1710725328, 'user_request', '1', NULL),
(718, 1710725329, 'exception', '[\"TypeError\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Support\\/helpers.php:126\"]', 1710725329),
(719, 1710725370, 'user_request', '1', NULL),
(720, 1710725410, 'user_request', '1', NULL),
(721, 1710725417, 'user_request', '1', NULL),
(722, 1710725484, 'user_request', '1', NULL),
(723, 1710725486, 'user_request', '1', NULL),
(724, 1710725495, 'user_request', '1', NULL),
(725, 1710725497, 'user_request', '1', NULL),
(726, 1710725499, 'user_request', '1', NULL),
(727, 1710725525, 'user_request', '1', NULL),
(728, 1710725554, 'user_request', '1', NULL),
(729, 1710725595, 'user_request', '1', NULL),
(730, 1710725626, 'user_request', '1', NULL),
(731, 1710725640, 'user_request', '1', NULL),
(732, 1710725651, 'user_request', '1', NULL),
(733, 1710725660, 'user_request', '1', NULL),
(734, 1710741832, 'user_request', '1', NULL),
(735, 1710741833, 'user_request', '1', NULL),
(736, 1710741833, 'user_request', '1', NULL),
(737, 1710741852, 'user_request', '1', NULL),
(738, 1710741862, 'user_request', '1', NULL),
(739, 1710741863, 'user_request', '1', NULL),
(740, 1710741879, 'user_request', '1', NULL),
(741, 1710742526, 'user_request', '1', NULL),
(742, 1710742532, 'user_request', '1', NULL),
(743, 1710742537, 'user_request', '1', NULL),
(744, 1710742750, 'user_request', '1', NULL),
(745, 1710742760, 'user_request', '1', NULL),
(746, 1710742937, 'user_request', '1', NULL),
(747, 1710742945, 'user_request', '1', NULL),
(748, 1710742963, 'user_request', '1', NULL),
(749, 1710742978, 'user_request', '1', NULL),
(750, 1710742995, 'user_request', '1', NULL),
(751, 1710743354, 'user_request', '1', NULL),
(752, 1710743384, 'user_request', '1', NULL),
(753, 1710743386, 'user_request', '1', NULL),
(754, 1710743394, 'user_request', '1', NULL),
(755, 1710743440, 'user_request', '1', NULL),
(756, 1710743968, 'exception', '[\"ParseError\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:120\"]', 1710743968),
(757, 1710743969, 'exception', '[\"ParseError\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:120\"]', 1710743969),
(758, 1710743984, 'user_request', '1', NULL),
(759, 1710743984, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:116\"]', 1710743984),
(760, 1710744108, 'user_request', '1', NULL),
(761, 1710744126, 'user_request', '1', NULL),
(762, 1710744607, 'user_request', '1', NULL),
(763, 1710744607, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:122\"]', 1710744607),
(764, 1710745447, 'user_request', '1', NULL),
(765, 1710745447, 'user_request', '1', NULL),
(766, 1710745447, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 1710745447),
(767, 1710745513, 'user_request', '1', NULL),
(768, 1710745517, 'user_request', '1', NULL),
(769, 1710745925, 'user_request', '1', NULL),
(770, 1710745936, 'user_request', '1', NULL),
(771, 1710745942, 'user_request', '1', NULL),
(772, 1710745955, 'user_request', '1', NULL),
(773, 1710745963, 'user_request', '1', NULL),
(774, 1710745981, 'user_request', '1', NULL),
(775, 1710745992, 'user_request', '1', NULL),
(776, 1710745993, 'user_request', '1', NULL),
(777, 1710746055, 'user_request', '1', NULL),
(778, 1710746086, 'user_request', '1', NULL),
(779, 1710746092, 'user_request', '1', NULL),
(780, 1710746093, 'user_request', '1', NULL),
(781, 1710746219, 'user_request', '1', NULL),
(782, 1710746221, 'user_request', '1', NULL),
(783, 1710746229, 'user_request', '1', NULL),
(784, 1710746235, 'user_request', '1', NULL),
(785, 1710746240, 'user_request', '1', NULL),
(786, 1710746263, 'user_request', '1', NULL),
(787, 1710746264, 'user_request', '1', NULL),
(788, 1710746267, 'user_request', '1', NULL),
(789, 1710746300, 'user_request', '1', NULL),
(790, 1710746394, 'user_request', '1', NULL),
(791, 1710746403, 'user_request', '1', NULL),
(792, 1710746426, 'user_request', '1', NULL),
(793, 1710746448, 'user_request', '1', NULL),
(794, 1710746453, 'user_request', '1', NULL),
(795, 1710746500, 'user_request', '1', NULL),
(796, 1710746507, 'user_request', '1', NULL),
(797, 1710746519, 'user_request', '1', NULL),
(798, 1710746706, 'user_request', '1', NULL),
(799, 1710746706, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Ppuf\\/PpufController.php:41\"]', 1710746706),
(800, 1710747078, 'user_request', '1', NULL),
(801, 1710747093, 'user_request', '1', NULL),
(802, 1710747150, 'user_request', '1', NULL),
(803, 1710747165, 'user_request', '1', NULL),
(804, 1710747252, 'user_request', '1', NULL),
(805, 1710747273, 'user_request', '1', NULL),
(806, 1710747274, 'user_request', '1', NULL),
(807, 1710747301, 'user_request', '1', NULL),
(808, 1710747320, 'user_request', '1', NULL),
(809, 1710747341, 'user_request', '1', NULL),
(810, 1710747370, 'user_request', '1', NULL),
(811, 1710747374, 'user_request', '1', NULL),
(812, 1710747391, 'user_request', '1', NULL),
(813, 1710747405, 'user_request', '1', NULL),
(814, 1710747408, 'user_request', '1', NULL),
(815, 1710747413, 'user_request', '1', NULL),
(816, 1710747420, 'user_request', '1', NULL),
(817, 1710747431, 'user_request', '1', NULL),
(818, 1710747453, 'user_request', '1', NULL),
(819, 1710747459, 'user_request', '1', NULL),
(820, 1710747462, 'user_request', '1', NULL),
(821, 1710747474, 'user_request', '1', NULL),
(822, 1710747486, 'user_request', '1', NULL),
(823, 1710747494, 'user_request', '1', NULL),
(824, 1710747496, 'user_request', '1', NULL),
(825, 1710747499, 'user_request', '1', NULL),
(826, 1710747534, 'user_request', '1', NULL),
(827, 1710747554, 'user_request', '1', NULL),
(828, 1710747587, 'user_request', '1', NULL),
(829, 1710747597, 'user_request', '1', NULL),
(830, 1710747598, 'user_request', '1', NULL),
(831, 1710747621, 'user_request', '1', NULL),
(832, 1710747646, 'user_request', '1', NULL),
(833, 1710747662, 'user_request', '1', NULL),
(834, 1710747694, 'user_request', '1', NULL),
(835, 1710747715, 'user_request', '1', NULL),
(836, 1710747727, 'user_request', '1', NULL),
(837, 1710747742, 'user_request', '1', NULL),
(838, 1710747746, 'user_request', '1', NULL),
(839, 1710747748, 'user_request', '1', NULL),
(840, 1710747858, 'user_request', '1', NULL),
(841, 1710747877, 'user_request', '1', NULL),
(842, 1710747877, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:36\"]', 1710747877),
(843, 1710747884, 'user_request', '1', NULL),
(844, 1710747884, 'user_request', '1', NULL),
(845, 1710747884, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:19\"]', 1710747884),
(846, 1710747922, 'user_request', '1', NULL),
(847, 1710747924, 'user_request', '1', NULL),
(848, 1710747974, 'user_request', '1', NULL),
(849, 1710747974, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:43\"]', 1710747974),
(850, 1710747982, 'user_request', '1', NULL),
(851, 1710747997, 'user_request', '1', NULL),
(852, 1710748007, 'user_request', '1', NULL),
(853, 1710748010, 'user_request', '1', NULL),
(854, 1710748011, 'user_request', '1', NULL),
(855, 1710748022, 'user_request', '1', NULL),
(856, 1710748072, 'user_request', '1', NULL),
(857, 1710748075, 'user_request', '1', NULL),
(858, 1710748849, 'user_request', '1', NULL),
(859, 1710748859, 'user_request', '1', NULL),
(860, 1710748870, 'user_request', '1', NULL),
(861, 1710748965, 'user_request', '1', NULL),
(862, 1710748991, 'user_request', '1', NULL),
(863, 1710749030, 'user_request', '1', NULL),
(864, 1710749041, 'user_request', '1', NULL),
(865, 1710749053, 'user_request', '1', NULL),
(866, 1710749068, 'user_request', '1', NULL),
(867, 1710749075, 'user_request', '1', NULL),
(868, 1710749102, 'user_request', '1', NULL),
(869, 1710749114, 'user_request', '1', NULL),
(870, 1710749136, 'user_request', '1', NULL),
(871, 1710749154, 'user_request', '1', NULL),
(872, 1710749273, 'user_request', '1', NULL),
(873, 1710751966, 'user_request', '1', NULL),
(874, 1710752377, 'user_request', '1', NULL),
(875, 1710752388, 'user_request', '1', NULL),
(876, 1710752452, 'user_request', '1', NULL),
(877, 1710752468, 'user_request', '1', NULL),
(878, 1710754837, 'user_request', '1', NULL),
(879, 1710754887, 'user_request', '1', NULL),
(880, 1710754902, 'user_request', '1', NULL),
(881, 1710754929, 'user_request', '1', NULL),
(882, 1710754930, 'exception', '[\"Exception\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 1710754930),
(883, 1710754994, 'user_request', '1', NULL),
(884, 1710755011, 'user_request', '1', NULL),
(885, 1710755019, 'user_request', '1', NULL),
(886, 1710755026, 'user_request', '1', NULL),
(887, 1710755055, 'user_request', '1', NULL),
(888, 1710755105, 'user_request', '1', NULL),
(889, 1710755126, 'user_request', '1', NULL),
(890, 1710755142, 'user_request', '1', NULL),
(891, 1710755153, 'user_request', '1', NULL),
(892, 1710755177, 'user_request', '1', NULL),
(893, 1710755196, 'user_request', '1', NULL),
(894, 1710755282, 'user_request', '1', NULL),
(895, 1710755282, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 1710755282),
(896, 1710755316, 'user_request', '1', NULL),
(897, 1710755316, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:107\"]', 1710755316),
(898, 1710755325, 'user_request', '1', NULL),
(899, 1710755334, 'user_request', '1', NULL),
(900, 1710755409, 'user_request', '1', NULL),
(901, 1710755450, 'user_request', '1', NULL),
(902, 1710755463, 'user_request', '1', NULL),
(903, 1710755497, 'user_request', '1', NULL),
(904, 1710755498, 'user_request', '1', NULL),
(905, 1710755509, 'user_request', '1', NULL),
(906, 1710755525, 'user_request', '1', NULL),
(907, 1710755550, 'user_request', '1', NULL),
(908, 1710755561, 'user_request', '1', NULL),
(909, 1710755685, 'user_request', '1', NULL),
(910, 1710755704, 'user_request', '1', NULL),
(911, 1710755721, 'user_request', '1', NULL),
(912, 1710755721, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:104\"]', 1710755721),
(913, 1710755738, 'user_request', '1', NULL),
(914, 1710755787, 'user_request', '1', NULL),
(915, 1710755798, 'user_request', '1', NULL),
(916, 1710755807, 'user_request', '1', NULL),
(917, 1710755807, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 1710755807),
(918, 1710755824, 'user_request', '1', NULL),
(919, 1710755824, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:100\"]', 1710755824),
(920, 1710755834, 'user_request', '1', NULL),
(921, 1710755849, 'user_request', '1', NULL),
(922, 1710755913, 'user_request', '1', NULL),
(923, 1710755955, 'user_request', '1', NULL),
(924, 1710756059, 'user_request', '1', NULL),
(925, 1710756074, 'user_request', '1', NULL),
(926, 1710756088, 'user_request', '1', NULL),
(927, 1710756091, 'user_request', '1', NULL),
(928, 1710756100, 'user_request', '1', NULL),
(929, 1710756320, 'user_request', '1', NULL),
(930, 1710756348, 'user_request', '1', NULL),
(931, 1710756532, 'user_request', '1', NULL),
(932, 1710756556, 'user_request', '1', NULL),
(933, 1710756565, 'user_request', '1', NULL),
(934, 1710756565, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:111\"]', 1710756565),
(935, 1710756579, 'user_request', '1', NULL),
(936, 1710756579, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:111\"]', 1710756579),
(937, 1710756595, 'user_request', '1', NULL),
(938, 1710756595, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:111\"]', 1710756595),
(939, 1710756618, 'user_request', '1', NULL),
(940, 1710756678, 'user_request', '1', NULL),
(941, 1710756678, 'exception', '[\"ErrorException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 1710756678),
(942, 1710756696, 'user_request', '1', NULL),
(943, 1710756713, 'user_request', '1', NULL),
(944, 1710756736, 'user_request', '1', NULL),
(945, 1710756859, 'user_request', '1', NULL),
(946, 1710756942, 'user_request', '1', NULL),
(947, 1710757043, 'user_request', '1', NULL),
(948, 1710757043, 'exception', '[\"TypeError\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:112\"]', 1710757043),
(949, 1710757103, 'user_request', '1', NULL),
(950, 1710757112, 'user_request', '1', NULL),
(951, 1710757166, 'user_request', '1', NULL),
(952, 1710757168, 'user_request', '1', NULL),
(953, 1710757207, 'user_request', '1', NULL),
(954, 1710757208, 'user_request', '1', NULL),
(955, 1710757210, 'user_request', '1', NULL),
(956, 1710757223, 'user_request', '1', NULL),
(957, 1710757241, 'user_request', '1', NULL),
(958, 1710757285, 'user_request', '1', NULL),
(959, 1710757288, 'user_request', '1', NULL),
(960, 1710757300, 'user_request', '1', NULL),
(961, 1710757332, 'user_request', '1', NULL),
(962, 1710757343, 'user_request', '1', NULL),
(963, 1710757398, 'user_request', '1', NULL),
(964, 1710757417, 'user_request', '1', NULL),
(965, 1710757428, 'user_request', '1', NULL),
(966, 1710763392, 'user_request', '1', NULL),
(967, 1710763396, 'user_request', '1', NULL),
(968, 1710763431, 'user_request', '1', NULL),
(969, 1710763435, 'user_request', '1', NULL),
(970, 1710763447, 'user_request', '1', NULL),
(971, 1710763457, 'user_request', '1', NULL),
(972, 1710763468, 'user_request', '1', NULL),
(973, 1710763477, 'user_request', '1', NULL),
(974, 1710763492, 'user_request', '1', NULL),
(975, 1710763502, 'user_request', '1', NULL),
(976, 1710764354, 'user_request', '1', NULL),
(977, 1710764611, 'user_request', '1', NULL),
(978, 1710764633, 'user_request', '1', NULL),
(979, 1710764659, 'user_request', '1', NULL),
(980, 1710764669, 'user_request', '1', NULL),
(981, 1710764679, 'user_request', '1', NULL),
(982, 1710764697, 'user_request', '1', NULL),
(983, 1710765320, 'user_request', '1', NULL),
(984, 1710765320, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 1710765320),
(985, 1710765337, 'user_request', '1', NULL),
(986, 1710765345, 'user_request', '1', NULL),
(987, 1710765416, 'user_request', '1', NULL),
(988, 1710765418, 'user_request', '1', NULL),
(989, 1710765418, 'exception', '[\"Error\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:139\"]', 1710765418),
(990, 1710765438, 'user_request', '1', NULL),
(991, 1710765479, 'user_request', '1', NULL),
(992, 1710765569, 'user_request', '1', NULL),
(993, 1710765599, 'user_request', '1', NULL),
(994, 1710765601, 'user_request', '1', NULL),
(995, 1710765609, 'user_request', '1', NULL),
(996, 1710766034, 'user_request', '1', NULL),
(997, 1710766034, 'exception', '[\"BadMethodCallException\",\"app\\/Http\\/Controllers\\/Submission\\/SubDivisionController.php:163\"]', 1710766034),
(998, 1710766094, 'user_request', '1', NULL),
(999, 1710766094, 'user_request', '1', NULL),
(1000, 1710766116, 'user_request', '1', NULL),
(1001, 1710766116, 'user_request', '1', NULL),
(1002, 1710766146, 'user_request', '1', NULL),
(1003, 1710766146, 'user_request', '1', NULL),
(1004, 1710766156, 'user_request', '1', NULL),
(1005, 1710766156, 'user_request', '1', NULL),
(1006, 1710778514, 'user_request', '1', NULL),
(1007, 1710778514, 'user_request', '1', NULL),
(1008, 1710778514, 'user_request', '1', NULL),
(1009, 1710778610, 'user_request', '1', NULL),
(1010, 1710778611, 'user_request', '1', NULL),
(1011, 1710778612, 'user_request', '1', NULL),
(1012, 1710778622, 'user_request', '1', NULL),
(1013, 1710778631, 'user_request', '1', NULL),
(1014, 1710778650, 'user_request', '1', NULL),
(1015, 1710778746, 'user_request', '1', NULL),
(1016, 1710778801, 'user_request', '1', NULL),
(1017, 1710778803, 'user_request', '1', NULL),
(1018, 1710778818, 'user_request', '1', NULL),
(1019, 1710778844, 'user_request', '1', NULL),
(1020, 1710778864, 'user_request', '1', NULL),
(1021, 1710778869, 'user_request', '1', NULL),
(1022, 1710778870, 'user_request', '1', NULL),
(1023, 1710778872, 'user_request', '1', NULL),
(1024, 1710779033, 'user_request', '1', NULL),
(1025, 1710779035, 'user_request', '1', NULL),
(1026, 1710779084, 'user_request', '1', NULL),
(1027, 1710779118, 'user_request', '1', NULL),
(1028, 1710779125, 'user_request', '1', NULL),
(1029, 1710779127, 'user_request', '1', NULL),
(1030, 1710779131, 'user_request', '1', NULL),
(1031, 1710779432, 'user_request', '1', NULL),
(1032, 1710779504, 'user_request', '1', NULL);
INSERT INTO `pulse_entries` (`id`, `timestamp`, `type`, `key`, `value`) VALUES
(1033, 1710779506, 'user_request', '1', NULL),
(1034, 1710779506, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 1710779506),
(1035, 1710779539, 'user_request', '1', NULL),
(1036, 1710779564, 'user_request', '1', NULL),
(1037, 1710780840, 'user_request', '1', NULL),
(1038, 1710781304, 'user_request', '1', NULL),
(1039, 1710781317, 'user_request', '1', NULL),
(1040, 1710781378, 'user_request', '1', NULL),
(1041, 1710781410, 'user_request', '1', NULL),
(1042, 1710781470, 'user_request', '1', NULL),
(1043, 1710781507, 'user_request', '1', NULL),
(1044, 1710781577, 'user_request', '1', NULL),
(1045, 1710781671, 'user_request', '1', NULL),
(1046, 1710781687, 'user_request', '1', NULL),
(1047, 1710781756, 'user_request', '1', NULL),
(1048, 1710781798, 'user_request', '1', NULL),
(1049, 1710781800, 'user_request', '1', NULL),
(1050, 1710781808, 'user_request', '1', NULL),
(1051, 1710781818, 'user_request', '1', NULL),
(1052, 1710781875, 'user_request', '1', NULL),
(1053, 1710781917, 'user_request', '1', NULL),
(1054, 1710781917, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-pencairan\\/index.blade.php:74\"]', 1710781917),
(1055, 1710781925, 'user_request', '1', NULL),
(1056, 1710782115, 'user_request', '1', NULL),
(1057, 1710782137, 'user_request', '1', NULL),
(1058, 1710782159, 'user_request', '1', NULL),
(1059, 1710782182, 'user_request', '1', NULL),
(1060, 1710782261, 'user_request', '1', NULL),
(1061, 1710782263, 'user_request', '1', NULL),
(1062, 1710782302, 'user_request', '1', NULL),
(1063, 1710782315, 'user_request', '1', NULL),
(1064, 1710782420, 'user_request', '1', NULL),
(1065, 1710782452, 'user_request', '1', NULL),
(1066, 1710782486, 'user_request', '1', NULL),
(1067, 1710782756, 'user_request', '1', NULL),
(1068, 1710782761, 'user_request', '1', NULL),
(1069, 1710782761, 'user_request', '1', NULL),
(1070, 1710782761, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/Exceptions\\/UrlGenerationException.php:35\"]', 1710782761),
(1071, 1710782804, 'user_request', '1', NULL),
(1072, 1710782806, 'user_request', '1', NULL),
(1073, 1710782822, 'user_request', '1', NULL),
(1074, 1710782822, 'user_request', '1', NULL),
(1075, 1710782870, 'user_request', '1', NULL),
(1076, 1710782879, 'user_request', '1', NULL),
(1077, 1710782879, 'user_request', '1', NULL),
(1078, 1710782906, 'user_request', '1', NULL),
(1079, 1710782906, 'user_request', '1', NULL),
(1080, 1710782926, 'user_request', '1', NULL),
(1081, 1710782935, 'user_request', '1', NULL),
(1082, 1710782935, 'user_request', '1', NULL),
(1083, 1710782967, 'user_request', '1', NULL),
(1084, 1710782989, 'user_request', '1', NULL),
(1085, 1710782995, 'user_request', '1', NULL),
(1086, 1710782995, 'user_request', '1', NULL),
(1087, 1710783066, 'user_request', '1', NULL),
(1088, 1710783066, 'user_request', '1', NULL),
(1089, 1710783091, 'user_request', '1', NULL),
(1090, 1710783091, 'user_request', '1', NULL),
(1091, 1710783142, 'user_request', '1', NULL),
(1092, 1710783143, 'user_request', '1', NULL),
(1093, 1710783166, 'user_request', '1', NULL),
(1094, 1710783173, 'user_request', '1', NULL),
(1095, 1710783174, 'user_request', '1', NULL),
(1096, 1710783418, 'user_request', '1', NULL),
(1097, 1710783425, 'user_request', '1', NULL),
(1098, 1710783425, 'user_request', '1', NULL),
(1099, 1710783447, 'user_request', '1', NULL),
(1100, 1710783455, 'user_request', '1', NULL),
(1101, 1710783455, 'user_request', '1', NULL),
(1102, 1710783580, 'user_request', '1', NULL),
(1103, 1710783684, 'user_request', '1', NULL),
(1104, 1710783717, 'user_request', '1', NULL),
(1105, 1710783731, 'user_request', '1', NULL),
(1106, 1710783741, 'user_request', '1', NULL),
(1107, 1710783802, 'user_request', '1', NULL),
(1108, 1710783810, 'user_request', '1', NULL),
(1109, 1710783895, 'user_request', '1', NULL),
(1110, 1710783906, 'user_request', '1', NULL),
(1111, 1710783920, 'user_request', '1', NULL),
(1112, 1710783979, 'user_request', '1', NULL),
(1113, 1710783990, 'user_request', '1', NULL),
(1114, 1710783995, 'user_request', '1', NULL),
(1115, 1710783995, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 1710783995),
(1116, 1710784018, 'user_request', '1', NULL),
(1117, 1710784018, 'user_request', '1', NULL),
(1118, 1710784022, 'user_request', '1', NULL),
(1119, 1710784022, 'user_request', '1', NULL),
(1120, 1710784040, 'user_request', '1', NULL),
(1121, 1710784043, 'user_request', '1', NULL),
(1122, 1710784086, 'user_request', '1', NULL),
(1123, 1710784093, 'user_request', '1', NULL),
(1124, 1710784093, 'user_request', '1', NULL),
(1125, 1710784101, 'user_request', '1', NULL),
(1126, 1710784102, 'user_request', '1', NULL),
(1127, 1710784109, 'user_request', '1', NULL),
(1128, 1710784109, 'user_request', '1', NULL),
(1129, 1710784191, 'user_request', '1', NULL),
(1130, 1710784328, 'user_request', '1', NULL),
(1131, 1710784331, 'user_request', '1', NULL),
(1132, 1710784331, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784331),
(1133, 1710784365, 'user_request', '1', NULL),
(1134, 1710784365, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784365),
(1135, 1710784454, 'user_request', '1', NULL),
(1136, 1710784459, 'user_request', '1', NULL),
(1137, 1710784459, 'user_request', '1', NULL),
(1138, 1710784462, 'user_request', '1', NULL),
(1139, 1710784462, 'user_request', '1', NULL),
(1140, 1710784469, 'user_request', '1', NULL),
(1141, 1710784469, 'user_request', '1', NULL),
(1142, 1710784472, 'user_request', '1', NULL),
(1143, 1710784472, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784472),
(1144, 1710784515, 'user_request', '1', NULL),
(1145, 1710784515, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784515),
(1146, 1710784528, 'user_request', '1', NULL),
(1147, 1710784528, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784528),
(1148, 1710784596, 'user_request', '1', NULL),
(1149, 1710784596, 'exception', '[\"League\\\\Flysystem\\\\UnableToRetrieveMetadata\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784596),
(1150, 1710784663, 'user_request', '1', NULL),
(1151, 1710784663, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:40\"]', 1710784663),
(1152, 1710784675, 'user_request', '1', NULL),
(1153, 1710784745, 'user_request', '1', NULL),
(1154, 1710784767, 'user_request', '1', NULL),
(1155, 1710784769, 'user_request', '1', NULL),
(1156, 1710784769, 'exception', '[\"Symfony\\\\Component\\\\HttpFoundation\\\\File\\\\Exception\\\\FileNotFoundException\",\"app\\/Http\\/Controllers\\/Submission\\/DisbursementController.php:39\"]', 1710784769),
(1157, 1710784781, 'user_request', '1', NULL),
(1158, 1710784781, 'user_request', '1', NULL),
(1159, 1710784788, 'user_request', '1', NULL),
(1160, 1710784788, 'user_request', '1', NULL),
(1161, 1710784791, 'user_request', '1', NULL),
(1162, 1710784797, 'user_request', '1', NULL),
(1163, 1710785175, 'user_request', '1', NULL),
(1164, 1710785183, 'user_request', '1', NULL),
(1165, 1710785188, 'user_request', '1', NULL),
(1166, 1710785188, 'user_request', '1', NULL),
(1167, 1710785195, 'user_request', '1', NULL),
(1168, 1710785195, 'user_request', '1', NULL),
(1169, 1710785200, 'user_request', '1', NULL),
(1170, 1710785209, 'user_request', '1', NULL),
(1171, 1710785235, 'user_request', '1', NULL),
(1172, 1710785235, 'user_request', '1', NULL),
(1173, 1710785239, 'user_request', '1', NULL),
(1174, 1710785270, 'user_request', '1', NULL),
(1175, 1710785323, 'user_request', '1', NULL),
(1176, 1710785350, 'user_request', '1', NULL),
(1177, 1710785364, 'user_request', '1', NULL),
(1178, 1710785387, 'user_request', '1', NULL),
(1179, 1710785399, 'user_request', '1', NULL),
(1180, 1710785415, 'user_request', '1', NULL),
(1181, 1710785432, 'user_request', '1', NULL),
(1182, 1710785440, 'user_request', '1', NULL),
(1183, 1710785445, 'user_request', '1', NULL),
(1184, 1710785446, 'user_request', '1', NULL),
(1185, 1710785469, 'user_request', '1', NULL),
(1186, 1710785470, 'user_request', '1', NULL),
(1187, 1710785481, 'user_request', '1', NULL),
(1188, 1710785570, 'user_request', '1', NULL),
(1189, 1710785580, 'user_request', '1', NULL),
(1190, 1710785629, 'user_request', '1', NULL),
(1191, 1710785640, 'user_request', '1', NULL),
(1192, 1710785673, 'user_request', '1', NULL),
(1193, 1710785692, 'user_request', '1', NULL),
(1194, 1710786034, 'user_request', '1', NULL),
(1195, 1710786053, 'user_request', '1', NULL),
(1196, 1710786066, 'user_request', '1', NULL),
(1197, 1710786072, 'user_request', '1', NULL),
(1198, 1710786072, 'user_request', '1', NULL),
(1199, 1710786074, 'user_request', '1', NULL),
(1200, 1710786103, 'user_request', '1', NULL),
(1201, 1710786134, 'user_request', '1', NULL),
(1202, 1710786137, 'user_request', '1', NULL),
(1203, 1710786137, 'user_request', '1', NULL),
(1204, 1710786139, 'user_request', '1', NULL),
(1205, 1710786146, 'user_request', '1', NULL),
(1206, 1710786247, 'user_request', '1', NULL),
(1207, 1710786247, 'user_request', '1', NULL),
(1208, 1710786268, 'user_request', '1', NULL),
(1209, 1710786271, 'user_request', '1', NULL),
(1210, 1710786272, 'user_request', '1', NULL),
(1211, 1710786286, 'user_request', '1', NULL),
(1212, 1710786634, 'user_request', '1', NULL),
(1213, 1710786702, 'user_request', '1', NULL),
(1214, 1710786906, 'user_request', '1', NULL),
(1215, 1710786908, 'user_request', '1', NULL),
(1216, 1710786925, 'user_request', '1', NULL),
(1217, 1710786948, 'user_request', '1', NULL),
(1218, 1710786957, 'user_request', '1', NULL),
(1219, 1710786982, 'user_request', '1', NULL),
(1220, 1710787026, 'user_request', '1', NULL),
(1221, 1710787028, 'user_request', '1', NULL),
(1222, 1710787049, 'user_request', '1', NULL),
(1223, 1710787165, 'user_request', '1', NULL),
(1224, 1710787174, 'user_request', '1', NULL),
(1225, 1710787191, 'user_request', '1', NULL),
(1226, 1710787205, 'user_request', '1', NULL),
(1227, 1710787336, 'user_request', '1', NULL),
(1228, 1710787339, 'user_request', '1', NULL),
(1229, 1710788827, 'user_request', '1', NULL),
(1230, 1710788905, 'user_request', '1', NULL),
(1231, 1710788935, 'user_request', '1', NULL),
(1232, 1710788963, 'user_request', '1', NULL),
(1233, 1710788968, 'user_request', '1', NULL),
(1234, 1710788968, 'exception', '[\"Error\",\"vendor\\/laravel\\/framework\\/src\\/Illuminate\\/Routing\\/ControllerDispatcher.php:46\"]', 1710788968),
(1235, 1710789009, 'user_request', '1', NULL),
(1236, 1710789010, 'user_request', '1', NULL),
(1237, 1710789067, 'user_request', '1', NULL),
(1238, 1710789072, 'user_request', '1', NULL),
(1239, 1710789072, 'user_request', '1', NULL),
(1240, 1710789108, 'user_request', '1', NULL),
(1241, 1710789116, 'user_request', '1', NULL),
(1242, 1710789116, 'user_request', '1', NULL),
(1243, 1710789272, 'user_request', '1', NULL),
(1244, 1710789275, 'user_request', '1', NULL),
(1245, 1710789302, 'user_request', '1', NULL),
(1246, 1710789343, 'user_request', '1', NULL),
(1247, 1710789399, 'user_request', '1', NULL),
(1248, 1710789399, 'user_request', '1', NULL),
(1249, 1710789513, 'user_request', '1', NULL),
(1250, 1710789530, 'user_request', '1', NULL),
(1251, 1710789532, 'user_request', '1', NULL),
(1252, 1710789551, 'user_request', '1', NULL),
(1253, 1710789754, 'user_request', '1', NULL),
(1254, 1710789765, 'user_request', '1', NULL),
(1255, 1710789770, 'user_request', '1', NULL),
(1256, 1710789822, 'user_request', '1', NULL),
(1257, 1710789822, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/detail.blade.php:293\"]', 1710789822),
(1258, 1710789829, 'user_request', '1', NULL),
(1259, 1710789840, 'user_request', '1', NULL),
(1260, 1710789849, 'user_request', '1', NULL),
(1261, 1710819020, 'user_request', '1', NULL),
(1262, 1710819021, 'user_request', '1', NULL),
(1263, 1710819021, 'user_request', '1', NULL),
(1264, 1710819025, 'user_request', '1', NULL),
(1265, 1710819583, 'user_request', '1', NULL),
(1266, 1710820305, 'user_request', '1', NULL),
(1267, 1710820307, 'user_request', '1', NULL),
(1268, 1710820307, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:93\"]', 1710820307),
(1269, 1710820332, 'user_request', '1', NULL),
(1270, 1710820533, 'user_request', '1', NULL),
(1271, 1710820560, 'user_request', '1', NULL),
(1272, 1710820719, 'user_request', '1', NULL),
(1273, 1710820746, 'user_request', '1', NULL),
(1274, 1710820835, 'user_request', '1', NULL),
(1275, 1710820836, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/direktur-keuangan-lpj\\/index.blade.php:120\"]', 1710820836),
(1276, 1710820858, 'user_request', '1', NULL),
(1277, 1710820884, 'user_request', '1', NULL),
(1278, 1710820962, 'user_request', '1', NULL),
(1279, 1710820967, 'user_request', '1', NULL),
(1280, 1710820967, 'user_request', '1', NULL),
(1281, 1710820973, 'user_request', '1', NULL),
(1282, 1710820974, 'user_request', '1', NULL),
(1283, 1710820990, 'user_request', '1', NULL),
(1284, 1710821005, 'user_request', '1', NULL),
(1285, 1710821006, 'user_request', '1', NULL),
(1286, 1710821009, 'user_request', '1', NULL),
(1287, 1710821032, 'user_request', '1', NULL),
(1288, 1710821120, 'user_request', '1', NULL),
(1289, 1710821141, 'user_request', '1', NULL),
(1290, 1710821183, 'user_request', '1', NULL),
(1291, 1710821264, 'user_request', '1', NULL),
(1292, 1710821268, 'user_request', '1', NULL),
(1293, 1710821275, 'user_request', '1', NULL),
(1294, 1710821275, 'user_request', '1', NULL),
(1295, 1710821294, 'user_request', '1', NULL),
(1296, 1710821297, 'user_request', '1', NULL),
(1297, 1710821409, 'user_request', '1', NULL),
(1298, 1710821449, 'user_request', '1', NULL),
(1299, 1710821553, 'user_request', '1', NULL),
(1300, 1710821555, 'user_request', '1', NULL),
(1301, 1710821573, 'user_request', '1', NULL),
(1302, 1710821575, 'user_request', '1', NULL),
(1303, 1710821579, 'user_request', '1', NULL),
(1304, 1710821584, 'user_request', '1', NULL),
(1305, 1710821586, 'user_request', '1', NULL),
(1306, 1710821614, 'user_request', '1', NULL),
(1307, 1710821636, 'user_request', '1', NULL),
(1308, 1710821636, 'user_request', '1', NULL),
(1309, 1710821655, 'user_request', '1', NULL),
(1310, 1710821660, 'user_request', '1', NULL),
(1311, 1710821706, 'user_request', '1', NULL),
(1312, 1710821707, 'user_request', '1', NULL),
(1313, 1710821724, 'user_request', '1', NULL),
(1314, 1710821725, 'user_request', '1', NULL),
(1315, 1710821728, 'user_request', '1', NULL),
(1316, 1710821729, 'user_request', '1', NULL),
(1317, 1710822084, 'user_request', '1', NULL),
(1318, 1710822086, 'user_request', '1', NULL),
(1319, 1710822097, 'user_request', '1', NULL),
(1320, 1710822108, 'user_request', '1', NULL),
(1321, 1710822147, 'user_request', '1', NULL),
(1322, 1710822315, 'user_request', '1', NULL),
(1323, 1710822315, 'user_request', '1', NULL),
(1324, 1710822324, 'user_request', '1', NULL),
(1325, 1710822369, 'user_request', '1', NULL),
(1326, 1710822373, 'user_request', '1', NULL),
(1327, 1710822373, 'user_request', '1', NULL),
(1328, 1710822385, 'user_request', '1', NULL),
(1329, 1710822385, 'user_request', '1', NULL),
(1330, 1710822401, 'user_request', '1', NULL),
(1331, 1710822401, 'user_request', '1', NULL),
(1332, 1710822403, 'user_request', '1', NULL),
(1333, 1710822405, 'user_request', '1', NULL),
(1334, 1710822406, 'user_request', '1', NULL),
(1335, 1710822410, 'user_request', '1', NULL),
(1336, 1710822413, 'user_request', '1', NULL),
(1337, 1710822414, 'user_request', '1', NULL),
(1338, 1710822420, 'user_request', '1', NULL),
(1339, 1710822424, 'user_request', '1', NULL),
(1340, 1710822425, 'user_request', '1', NULL),
(1341, 1710822438, 'user_request', '1', NULL),
(1342, 1710822438, 'user_request', '1', NULL),
(1343, 1710822446, 'user_request', '1', NULL),
(1344, 1710822446, 'user_request', '1', NULL),
(1345, 1710822450, 'user_request', '1', NULL),
(1346, 1710822450, 'user_request', '1', NULL),
(1347, 1710822450, 'user_request', '1', NULL),
(1348, 1710822450, 'user_request', '1', NULL),
(1349, 1710822450, 'user_request', '1', NULL),
(1350, 1710822451, 'user_request', '1', NULL),
(1351, 1710822457, 'user_request', '1', NULL),
(1352, 1710822459, 'user_request', '1', NULL),
(1353, 1710822460, 'user_request', '1', NULL),
(1354, 1710822466, 'user_request', '1', NULL),
(1355, 1710822479, 'user_request', '1', NULL),
(1356, 1710822480, 'user_request', '1', NULL),
(1357, 1710822481, 'user_request', '1', NULL),
(1358, 1710822486, 'user_request', '1', NULL),
(1359, 1710822518, 'user_request', '1', NULL),
(1360, 1710822534, 'user_request', '1', NULL),
(1361, 1710822545, 'user_request', '1', NULL),
(1362, 1710822556, 'user_request', '1', NULL),
(1363, 1710822556, 'user_request', '1', NULL),
(1364, 1710822562, 'user_request', '1', NULL),
(1365, 1710822569, 'user_request', '1', NULL),
(1366, 1710822570, 'user_request', '1', NULL),
(1367, 1710822613, 'user_request', '1', NULL),
(1368, 1710822637, 'user_request', '1', NULL),
(1369, 1710822641, 'user_request', '1', NULL),
(1370, 1710822641, 'user_request', '1', NULL),
(1371, 1710822642, 'user_request', '1', NULL),
(1372, 1710822642, 'user_request', '1', NULL),
(1373, 1710822643, 'user_request', '1', NULL),
(1374, 1710822644, 'user_request', '1', NULL),
(1375, 1710822647, 'user_request', '1', NULL),
(1376, 1710822648, 'user_request', '1', NULL),
(1377, 1710822653, 'user_request', '1', NULL),
(1378, 1710822658, 'user_request', '1', NULL),
(1379, 1710822678, 'user_request', '1', NULL),
(1380, 1710822679, 'user_request', '1', NULL),
(1381, 1710822696, 'user_request', '1', NULL),
(1382, 1710822697, 'user_request', '1', NULL),
(1383, 1710822741, 'user_request', '1', NULL),
(1384, 1710822745, 'user_request', '1', NULL),
(1385, 1710822748, 'user_request', '1', NULL),
(1386, 1710822765, 'user_request', '1', NULL),
(1387, 1710822765, 'user_request', '1', NULL),
(1388, 1710822777, 'user_request', '1', NULL),
(1389, 1710822778, 'user_request', '1', NULL),
(1390, 1710822781, 'user_request', '1', NULL),
(1391, 1710822781, 'user_request', '1', NULL),
(1392, 1710822782, 'user_request', '1', NULL),
(1393, 1710822801, 'user_request', '1', NULL),
(1394, 1710822826, 'user_request', '1', NULL),
(1395, 1710822833, 'user_request', '1', NULL),
(1396, 1710822833, 'user_request', '1', NULL),
(1397, 1710822855, 'user_request', '1', NULL),
(1398, 1710822862, 'user_request', '1', NULL),
(1399, 1710822879, 'user_request', '1', NULL),
(1400, 1710822879, 'user_request', '1', NULL),
(1401, 1710822882, 'user_request', '1', NULL),
(1402, 1710822887, 'user_request', '1', NULL),
(1403, 1710822896, 'user_request', '1', NULL),
(1404, 1710822896, 'user_request', '1', NULL),
(1405, 1710822898, 'user_request', '1', NULL),
(1406, 1710823438, 'user_request', '1', NULL),
(1407, 1710823439, 'user_request', '1', NULL),
(1408, 1710850779, 'user_request', '1', NULL),
(1409, 1710850780, 'user_request', '1', NULL),
(1410, 1710850780, 'user_request', '1', NULL),
(1411, 1710850851, 'user_request', '1', NULL),
(1412, 1710850915, 'user_request', '1', NULL),
(1413, 1710850973, 'user_request', '1', NULL),
(1414, 1710850973, 'user_request', '1', NULL),
(1415, 1710850974, 'user_request', '1', NULL),
(1416, 1710850975, 'user_request', '1', NULL),
(1417, 1710850976, 'user_request', '1', NULL),
(1418, 1710850977, 'user_request', '1', NULL),
(1419, 1710850978, 'user_request', '1', NULL),
(1420, 1710851070, 'user_request', '1', NULL),
(1421, 1710851220, 'user_request', '1', NULL),
(1422, 1710851224, 'user_request', '1', NULL),
(1423, 1710851389, 'user_request', '1', NULL),
(1424, 1710851389, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:287\"]', 1710851389),
(1425, 1710851466, 'user_request', '1', NULL),
(1426, 1710851496, 'user_request', '1', NULL),
(1427, 1710851507, 'user_request', '1', NULL),
(1428, 1710851545, 'user_request', '1', NULL),
(1429, 1710851549, 'user_request', '1', NULL),
(1430, 1710851725, 'user_request', '1', NULL),
(1431, 1710851731, 'user_request', '1', NULL),
(1432, 1710852100, 'user_request', '1', NULL),
(1433, 1710852100, 'user_request', '1', NULL),
(1434, 1710852425, 'user_request', '1', NULL),
(1435, 1710852471, 'user_request', '1', NULL),
(1436, 1710852502, 'user_request', '1', NULL),
(1437, 1710852561, 'user_request', '1', NULL),
(1438, 1710852631, 'user_request', '1', NULL),
(1439, 1710852648, 'user_request', '1', NULL),
(1440, 1710852697, 'user_request', '1', NULL),
(1441, 1710852732, 'user_request', '1', NULL),
(1442, 1710852732, 'user_request', '1', NULL),
(1443, 1710852754, 'user_request', '1', NULL),
(1444, 1710852761, 'user_request', '1', NULL),
(1445, 1710852788, 'user_request', '1', NULL),
(1446, 1710868359, 'user_request', '1', NULL),
(1447, 1710868360, 'user_request', '1', NULL),
(1448, 1710868360, 'user_request', '1', NULL),
(1449, 1710868366, 'user_request', '1', NULL),
(1450, 1710868368, 'user_request', '1', NULL),
(1451, 1710868382, 'user_request', '1', NULL),
(1452, 1710868385, 'user_request', '1', NULL),
(1453, 1710868436, 'user_request', '1', NULL),
(1454, 1710868464, 'user_request', '1', NULL),
(1455, 1710868538, 'user_request', '1', NULL),
(1456, 1710868588, 'user_request', '1', NULL),
(1457, 1710868780, 'user_request', '1', NULL),
(1458, 1710868837, 'user_request', '1', NULL),
(1459, 1710868875, 'user_request', '1', NULL),
(1460, 1710868889, 'user_request', '1', NULL),
(1461, 1710868935, 'user_request', '1', NULL),
(1462, 1710869034, 'user_request', '1', NULL),
(1463, 1710869038, 'user_request', '1', NULL),
(1464, 1710869351, 'user_request', '1', NULL),
(1465, 1710869391, 'user_request', '1', NULL),
(1466, 1710869422, 'user_request', '1', NULL),
(1467, 1710869511, 'user_request', '1', NULL),
(1468, 1710869632, 'user_request', '1', NULL),
(1469, 1710869773, 'user_request', '1', NULL),
(1470, 1710869789, 'user_request', '1', NULL),
(1471, 1710869815, 'user_request', '1', NULL),
(1472, 1710869853, 'user_request', '1', NULL),
(1473, 1710869947, 'user_request', '1', NULL),
(1474, 1710870070, 'user_request', '1', NULL),
(1475, 1710870216, 'user_request', '1', NULL),
(1476, 1710870324, 'user_request', '1', NULL),
(1477, 1710870405, 'user_request', '1', NULL),
(1478, 1710870446, 'user_request', '1', NULL),
(1479, 1710870533, 'user_request', '1', NULL),
(1480, 1710870562, 'user_request', '1', NULL),
(1481, 1710870677, 'user_request', '1', NULL),
(1482, 1710870710, 'user_request', '1', NULL),
(1483, 1710870731, 'user_request', '1', NULL),
(1484, 1710870765, 'user_request', '1', NULL),
(1485, 1710870807, 'user_request', '1', NULL),
(1486, 1710870822, 'user_request', '1', NULL),
(1487, 1710870841, 'user_request', '1', NULL),
(1488, 1710870858, 'user_request', '1', NULL),
(1489, 1710870879, 'user_request', '1', NULL),
(1490, 1710870896, 'user_request', '1', NULL),
(1491, 1710870897, 'user_request', '1', NULL),
(1492, 1710870909, 'user_request', '1', NULL),
(1493, 1710870947, 'user_request', '1', NULL),
(1494, 1710870974, 'user_request', '1', NULL),
(1495, 1710871040, 'user_request', '1', NULL),
(1496, 1710871146, 'user_request', '1', NULL),
(1497, 1710871159, 'user_request', '1', NULL),
(1498, 1710871176, 'user_request', '1', NULL),
(1499, 1710871235, 'user_request', '1', NULL),
(1500, 1710871242, 'user_request', '1', NULL),
(1501, 1710871246, 'user_request', '1', NULL),
(1502, 1710871323, 'user_request', '1', NULL),
(1503, 1710871383, 'user_request', '1', NULL),
(1504, 1710871397, 'user_request', '1', NULL),
(1505, 1710871419, 'user_request', '1', NULL),
(1506, 1710871606, 'user_request', '1', NULL),
(1507, 1710871615, 'user_request', '1', NULL),
(1508, 1710871646, 'user_request', '1', NULL),
(1509, 1710871673, 'user_request', '1', NULL),
(1510, 1710871721, 'user_request', '1', NULL),
(1511, 1710871826, 'user_request', '1', NULL),
(1512, 1710871841, 'user_request', '1', NULL),
(1513, 1710871863, 'user_request', '1', NULL),
(1514, 1710871885, 'user_request', '1', NULL),
(1515, 1710871898, 'user_request', '1', NULL),
(1516, 1710871898, 'user_request', '1', NULL),
(1517, 1710871927, 'user_request', '1', NULL),
(1518, 1710871928, 'user_request', '1', NULL),
(1519, 1710872004, 'user_request', '1', NULL),
(1520, 1710872029, 'user_request', '1', NULL),
(1521, 1710872058, 'user_request', '1', NULL),
(1522, 1710872121, 'user_request', '1', NULL),
(1523, 1710872127, 'user_request', '1', NULL),
(1524, 1710872289, 'user_request', '1', NULL),
(1525, 1710872298, 'user_request', '1', NULL),
(1526, 1710872396, 'user_request', '1', NULL),
(1527, 1710872462, 'user_request', '1', NULL),
(1528, 1710872514, 'user_request', '1', NULL),
(1529, 1710872527, 'user_request', '1', NULL),
(1530, 1710872534, 'user_request', '1', NULL),
(1531, 1710872543, 'user_request', '1', NULL),
(1532, 1710872555, 'user_request', '1', NULL),
(1533, 1710872574, 'user_request', '1', NULL),
(1534, 1710872685, 'user_request', '1', NULL),
(1535, 1710872720, 'user_request', '1', NULL),
(1536, 1710872733, 'user_request', '1', NULL),
(1537, 1710872744, 'user_request', '1', NULL),
(1538, 1710872767, 'user_request', '1', NULL),
(1539, 1710872786, 'user_request', '1', NULL),
(1540, 1710872808, 'user_request', '1', NULL),
(1541, 1710872837, 'user_request', '1', NULL),
(1542, 1710872865, 'user_request', '1', NULL),
(1543, 1710872940, 'user_request', '1', NULL),
(1544, 1710872966, 'user_request', '1', NULL),
(1545, 1710873071, 'user_request', '1', NULL),
(1546, 1710873114, 'user_request', '1', NULL),
(1547, 1710873148, 'user_request', '1', NULL),
(1548, 1710873163, 'user_request', '1', NULL),
(1549, 1710873228, 'user_request', '1', NULL),
(1550, 1710873240, 'user_request', '1', NULL),
(1551, 1710873254, 'user_request', '1', NULL),
(1552, 1710873278, 'user_request', '1', NULL),
(1553, 1710873343, 'user_request', '1', NULL),
(1554, 1710873583, 'user_request', '1', NULL),
(1555, 1710873583, 'user_request', '1', NULL),
(1556, 1710873808, 'user_request', '1', NULL),
(1557, 1710873840, 'user_request', '1', NULL),
(1558, 1710873840, 'user_request', '1', NULL),
(1559, 1710873853, 'user_request', '1', NULL),
(1560, 1710873853, 'user_request', '1', NULL),
(1561, 1710874029, 'user_request', '1', NULL),
(1562, 1710874029, 'user_request', '1', NULL),
(1563, 1710874029, 'exception', '[\"ParseError\",\"resources\\/views\\/submission\\/create.blade.php:257\"]', 1710874029),
(1564, 1710874051, 'user_request', '1', NULL),
(1565, 1710874072, 'user_request', '1', NULL),
(1566, 1710874072, 'user_request', '1', NULL),
(1567, 1710874078, 'user_request', '1', NULL),
(1568, 1710874078, 'user_request', '1', NULL),
(1569, 1710874197, 'user_request', '1', NULL),
(1570, 1710874197, 'user_request', '1', NULL),
(1571, 1710874210, 'user_request', '1', NULL),
(1572, 1710874210, 'user_request', '1', NULL),
(1573, 1710874451, 'user_request', '1', NULL),
(1574, 1710874451, 'user_request', '1', NULL),
(1575, 1710874462, 'user_request', '1', NULL),
(1576, 1710874462, 'user_request', '1', NULL),
(1577, 1710874498, 'user_request', '1', NULL),
(1578, 1710874560, 'user_request', '1', NULL),
(1579, 1710874570, 'user_request', '1', NULL),
(1580, 1710874724, 'user_request', '1', NULL),
(1581, 1710903400, 'user_request', '1', NULL),
(1582, 1710903400, 'user_request', '1', NULL),
(1583, 1710903400, 'user_request', '1', NULL),
(1584, 1710904837, 'user_request', '1', NULL),
(1585, 1710904841, 'user_request', '1', NULL),
(1586, 1710906150, 'user_request', '1', NULL),
(1587, 1710906195, 'user_request', '1', NULL),
(1588, 1710906251, 'user_request', '1', NULL),
(1589, 1710906261, 'user_request', '1', NULL),
(1590, 1710906301, 'user_request', '1', NULL),
(1591, 1710906318, 'user_request', '1', NULL),
(1592, 1710906388, 'user_request', '1', NULL),
(1593, 1710906416, 'user_request', '1', NULL),
(1594, 1710906444, 'user_request', '1', NULL),
(1595, 1710906465, 'user_request', '1', NULL),
(1596, 1710906526, 'user_request', '1', NULL),
(1597, 1710906538, 'user_request', '1', NULL),
(1598, 1710906568, 'user_request', '1', NULL),
(1599, 1710906599, 'user_request', '1', NULL),
(1600, 1710906908, 'user_request', '1', NULL),
(1601, 1710907136, 'user_request', '1', NULL),
(1602, 1710907178, 'user_request', '1', NULL),
(1603, 1710907198, 'user_request', '1', NULL),
(1604, 1710907210, 'user_request', '1', NULL),
(1605, 1710907228, 'user_request', '1', NULL),
(1606, 1710907228, 'user_request', '1', NULL),
(1607, 1710907245, 'user_request', '1', NULL),
(1608, 1710907245, 'user_request', '1', NULL),
(1609, 1710907261, 'user_request', '1', NULL),
(1610, 1710907373, 'user_request', '1', NULL),
(1611, 1710907376, 'user_request', '1', NULL),
(1612, 1710907400, 'user_request', '1', NULL),
(1613, 1710907414, 'user_request', '1', NULL),
(1614, 1710907426, 'user_request', '1', NULL),
(1615, 1710907440, 'user_request', '1', NULL),
(1616, 1710907477, 'user_request', '1', NULL),
(1617, 1710907505, 'user_request', '1', NULL),
(1618, 1710907554, 'user_request', '1', NULL),
(1619, 1710907573, 'user_request', '1', NULL),
(1620, 1710907589, 'user_request', '1', NULL),
(1621, 1710907594, 'user_request', '1', NULL),
(1622, 1710907612, 'user_request', '1', NULL),
(1623, 1710907620, 'user_request', '1', NULL),
(1624, 1710907631, 'user_request', '1', NULL),
(1625, 1710907671, 'user_request', '1', NULL),
(1626, 1710907708, 'user_request', '1', NULL),
(1627, 1710907720, 'user_request', '1', NULL),
(1628, 1710907735, 'user_request', '1', NULL),
(1629, 1710907742, 'user_request', '1', NULL),
(1630, 1710907753, 'user_request', '1', NULL),
(1631, 1710907767, 'user_request', '1', NULL),
(1632, 1710907819, 'user_request', '1', NULL),
(1633, 1710907935, 'user_request', '1', NULL),
(1634, 1710908133, 'user_request', '1', NULL),
(1635, 1710908148, 'user_request', '1', NULL),
(1636, 1710908262, 'user_request', '1', NULL),
(1637, 1710908305, 'user_request', '1', NULL),
(1638, 1710908417, 'user_request', '1', NULL),
(1639, 1710908500, 'user_request', '1', NULL),
(1640, 1710908622, 'user_request', '1', NULL),
(1641, 1710908728, 'user_request', '1', NULL),
(1642, 1710908826, 'user_request', '1', NULL),
(1643, 1710908899, 'user_request', '1', NULL),
(1644, 1710908931, 'user_request', '1', NULL),
(1645, 1710909277, 'user_request', '1', NULL),
(1646, 1710909421, 'user_request', '1', NULL),
(1647, 1710909460, 'user_request', '1', NULL),
(1648, 1710909622, 'user_request', '1', NULL),
(1649, 1710909727, 'user_request', '1', NULL),
(1650, 1710909881, 'user_request', '1', NULL),
(1651, 1710909954, 'user_request', '1', NULL),
(1652, 1710909965, 'user_request', '1', NULL),
(1653, 1710909981, 'user_request', '1', NULL),
(1654, 1710920048, 'user_request', '1', NULL),
(1655, 1710920049, 'user_request', '1', NULL),
(1656, 1710920049, 'user_request', '1', NULL),
(1657, 1710920051, 'user_request', '1', NULL),
(1658, 1710920052, 'user_request', '1', NULL),
(1659, 1710920167, 'user_request', '1', NULL),
(1660, 1710920167, 'user_request', '1', NULL),
(1661, 1710920203, 'user_request', '1', NULL),
(1662, 1710920203, 'user_request', '1', NULL),
(1663, 1710920263, 'user_request', '1', NULL),
(1664, 1710920263, 'user_request', '1', NULL),
(1665, 1710920276, 'user_request', '1', NULL),
(1666, 1710920276, 'user_request', '1', NULL),
(1667, 1710920300, 'user_request', '1', NULL),
(1668, 1710920442, 'user_request', '1', NULL),
(1669, 1710920448, 'user_request', '1', NULL),
(1670, 1710920448, 'user_request', '1', NULL),
(1671, 1710920519, 'user_request', '1', NULL),
(1672, 1710920519, 'user_request', '1', NULL),
(1673, 1710920559, 'user_request', '1', NULL),
(1674, 1710920623, 'user_request', '1', NULL),
(1675, 1710920623, 'user_request', '1', NULL),
(1676, 1710920648, 'user_request', '1', NULL),
(1677, 1710920774, 'user_request', '1', NULL),
(1678, 1710920788, 'user_request', '1', NULL),
(1679, 1710921030, 'user_request', '1', NULL),
(1680, 1710921030, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\/Http\\/Controllers\\/Submission\\/SubmissionController.php:81\"]', 1710921030),
(1681, 1710921102, 'user_request', '1', NULL),
(1682, 1710921102, 'user_request', '1', NULL),
(1683, 1710924400, 'user_request', '1', NULL),
(1684, 1710924401, 'user_request', '1', NULL),
(1685, 1710924464, 'user_request', '1', NULL),
(1686, 1710924643, 'user_request', '1', NULL),
(1687, 1710924643, 'user_request', '1', NULL),
(1688, 1710924643, 'user_request', '1', NULL),
(1689, 1710924664, 'user_request', '1', NULL),
(1690, 1710924666, 'user_request', '1', NULL),
(1691, 1710924682, 'user_request', '1', NULL),
(1692, 1710924692, 'user_request', '1', NULL),
(1693, 1710924692, 'user_request', '1', NULL),
(1694, 1710924698, 'user_request', '1', NULL),
(1695, 1710924757, 'user_request', '1', NULL),
(1696, 1710924757, 'user_request', '1', NULL),
(1697, 1710924776, 'user_request', '1', NULL),
(1698, 1710924797, 'user_request', '1', NULL),
(1699, 1710924898, 'user_request', '1', NULL),
(1700, 1710924900, 'user_request', '1', NULL),
(1701, 1710924961, 'user_request', '1', NULL),
(1702, 1710924993, 'user_request', '1', NULL),
(1703, 1710924995, 'user_request', '1', NULL),
(1704, 1710925021, 'user_request', '1', NULL),
(1705, 1710925022, 'user_request', '1', NULL),
(1706, 1710925023, 'user_request', '1', NULL),
(1707, 1710925046, 'user_request', '1', NULL),
(1708, 1710925050, 'user_request', '1', NULL),
(1709, 1710925055, 'user_request', '1', NULL),
(1710, 1710925062, 'user_request', '1', NULL),
(1711, 1710925065, 'user_request', '1', NULL),
(1712, 1710925070, 'user_request', '1', NULL),
(1713, 1710925072, 'user_request', '1', NULL),
(1714, 1710925074, 'user_request', '1', NULL),
(1715, 1710925372, 'user_request', '1', NULL),
(1716, 1710925373, 'user_request', '1', NULL),
(1717, 1710925377, 'user_request', '1', NULL),
(1718, 1710925379, 'user_request', '1', NULL),
(1719, 1710925424, 'user_request', '1', NULL),
(1720, 1710925425, 'user_request', '1', NULL),
(1721, 1710984176, 'user_request', '1', NULL),
(1722, 1710984176, 'user_request', '1', NULL),
(1723, 1710984176, 'user_request', '1', NULL),
(1724, 1710984278, 'user_request', '1', NULL),
(1725, 1710984279, 'user_request', '1', NULL),
(1726, 1710984282, 'user_request', '1', NULL),
(1727, 1710984347, 'user_request', '1', NULL),
(1728, 1711022877, 'user_request', '1', NULL),
(1729, 1711022878, 'user_request', '1', NULL),
(1730, 1711022878, 'user_request', '1', NULL),
(1731, 1711033926, 'user_request', '1', NULL),
(1732, 1711033926, 'user_request', '1', NULL),
(1733, 1711033926, 'user_request', '1', NULL),
(1734, 1711033942, 'user_request', '1', NULL),
(1735, 1711033947, 'user_request', '1', NULL),
(1736, 1711033971, 'user_request', '1', NULL),
(1737, 1711033973, 'user_request', '1', NULL),
(1738, 1711034062, 'user_request', '1', NULL),
(1739, 1711034071, 'user_request', '1', NULL),
(1740, 1711034073, 'user_request', '1', NULL),
(1741, 1711034088, 'user_request', '1', NULL),
(1742, 1711034290, 'user_request', '1', NULL),
(1743, 1711034290, 'user_request', '1', NULL),
(1744, 1711034299, 'user_request', '1', NULL),
(1745, 1711034299, 'user_request', '1', NULL),
(1746, 1711034356, 'user_request', '1', NULL),
(1747, 1711034358, 'user_request', '1', NULL),
(1748, 1711034358, 'user_request', '1', NULL),
(1749, 1711034359, 'user_request', '1', NULL),
(1750, 1711034361, 'user_request', '1', NULL),
(1751, 1711034365, 'user_request', '1', NULL),
(1752, 1711034433, 'user_request', '1', NULL),
(1753, 1711034528, 'user_request', '1', NULL),
(1754, 1711034540, 'user_request', '1', NULL),
(1755, 1711034632, 'user_request', '1', NULL),
(1756, 1711034635, 'user_request', '1', NULL),
(1757, 1711034639, 'user_request', '1', NULL),
(1758, 1711034685, 'user_request', '1', NULL),
(1759, 1711034721, 'user_request', '1', NULL),
(1760, 1711034730, 'user_request', '1', NULL),
(1761, 1711034731, 'user_request', '1', NULL),
(1762, 1711034734, 'user_request', '1', NULL),
(1763, 1711034734, 'user_request', '1', NULL),
(1764, 1711034742, 'user_request', '1', NULL),
(1765, 1711034742, 'user_request', '1', NULL),
(1766, 1711034941, 'user_request', '1', NULL),
(1767, 1711034948, 'user_request', '1', NULL),
(1768, 1711034948, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/edit.blade.php:204\"]', 1711034948),
(1769, 1711035037, 'user_request', '1', NULL),
(1770, 1711035037, 'exception', '[\"ErrorException\",\"resources\\/views\\/submission\\/edit.blade.php:204\"]', 1711035037),
(1771, 1711035062, 'user_request', '1', NULL),
(1772, 1711035082, 'user_request', '1', NULL),
(1773, 1711035082, 'user_request', '1', NULL),
(1774, 1711035084, 'user_request', '1', NULL),
(1775, 1711039210, 'user_request', '1', NULL),
(1776, 1711039210, 'user_request', '1', NULL),
(1777, 1711173031, 'user_request', '1', NULL),
(1778, 1711173031, 'user_request', '1', NULL),
(1779, 1711173031, 'user_request', '1', NULL),
(1780, 1711173033, 'user_request', '1', NULL),
(1781, 1711173149, 'user_request', '1', NULL),
(1782, 1711173153, 'user_request', '1', NULL),
(1783, 1711173387, 'user_request', '1', NULL),
(1784, 1711173394, 'user_request', '1', NULL),
(1785, 1711173395, 'user_request', '1', NULL),
(1786, 1711173400, 'user_request', '1', NULL),
(1787, 1711173436, 'user_request', '1', NULL),
(1788, 1711173446, 'user_request', '1', NULL),
(1789, 1711173525, 'user_request', '1', NULL),
(1790, 1711173561, 'user_request', '1', NULL),
(1791, 1711173765, 'user_request', '1', NULL),
(1792, 1711174370, 'user_request', '1', NULL),
(1793, 1711174370, 'exception', '[\"ArgumentCountError\",\"resources\\/views\\/submission\\/direktur-keuangan\\/index.blade.php:37\"]', 1711174370),
(1794, 1711174427, 'user_request', '1', NULL),
(1795, 1711174437, 'user_request', '1', NULL),
(1796, 1711174440, 'user_request', '1', NULL),
(1797, 1711174444, 'user_request', '1', NULL),
(1798, 1711174447, 'user_request', '1', NULL),
(1799, 1711174450, 'user_request', '1', NULL),
(1800, 1711174454, 'user_request', '1', NULL),
(1801, 1711174527, 'user_request', '1', NULL),
(1802, 1711174540, 'user_request', '1', NULL),
(1803, 1711174556, 'user_request', '1', NULL),
(1804, 1711174558, 'user_request', '1', NULL),
(1805, 1711174575, 'user_request', '1', NULL),
(1806, 1711174577, 'user_request', '1', NULL),
(1807, 1711174587, 'user_request', '1', NULL),
(1808, 1711174589, 'user_request', '1', NULL),
(1809, 1711174593, 'user_request', '1', NULL),
(1810, 1711174642, 'user_request', '1', NULL),
(1811, 1711174754, 'user_request', '1', NULL),
(1812, 1711174775, 'user_request', '1', NULL),
(1813, 1711174788, 'user_request', '1', NULL),
(1814, 1711174791, 'user_request', '1', NULL),
(1815, 1711174797, 'user_request', '1', NULL),
(1816, 1711174811, 'user_request', '1', NULL),
(1817, 1711174884, 'user_request', '1', NULL),
(1818, 1711175074, 'user_request', '1', NULL),
(1819, 1711175126, 'user_request', '1', NULL),
(1820, 1711175136, 'user_request', '1', NULL),
(1821, 1711175146, 'user_request', '1', NULL),
(1822, 1711175159, 'user_request', '1', NULL),
(1823, 1711175175, 'user_request', '1', NULL),
(1824, 1711175284, 'user_request', '1', NULL),
(1825, 1711175316, 'user_request', '1', NULL),
(1826, 1711175449, 'user_request', '1', NULL),
(1827, 1711175461, 'user_request', '1', NULL),
(1828, 1711175470, 'user_request', '1', NULL),
(1829, 1711175544, 'user_request', '1', NULL),
(1830, 1711175565, 'user_request', '1', NULL),
(1831, 1711175573, 'user_request', '1', NULL),
(1832, 1711175606, 'user_request', '1', NULL),
(1833, 1711175625, 'user_request', '1', NULL),
(1834, 1711175727, 'user_request', '1', NULL),
(1835, 1711175732, 'user_request', '1', NULL),
(1836, 1711175749, 'user_request', '1', NULL),
(1837, 1711175753, 'user_request', '1', NULL),
(1838, 1711175796, 'user_request', '1', NULL),
(1839, 1711175807, 'user_request', '1', NULL),
(1840, 1711175812, 'user_request', '1', NULL),
(1841, 1711175818, 'user_request', '1', NULL),
(1842, 1711175874, 'user_request', '1', NULL),
(1843, 1711175887, 'user_request', '1', NULL),
(1844, 1711175894, 'user_request', '1', NULL),
(1845, 1711175903, 'user_request', '1', NULL),
(1846, 1711175908, 'user_request', '1', NULL),
(1847, 1711175921, 'user_request', '1', NULL),
(1848, 1711175937, 'user_request', '1', NULL),
(1849, 1711175949, 'user_request', '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pulse_values`
--

CREATE TABLE `pulse_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role`, `parent_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', '', NULL, '2024-03-15 19:59:08', NULL, NULL),
(2, 'Direktur Keuangan - LPJ', '1', NULL, '2024-03-15 19:37:19', '2024-03-17 01:31:14', NULL),
(3, 'Direktur Keuangan - Pencairan', '2', NULL, '2024-03-15 20:09:51', '2024-03-17 01:31:40', NULL),
(4, 'Rektor', '3', NULL, '2024-03-17 13:06:30', '2024-03-17 01:32:01', NULL),
(5, 'Warek II Keuangan', '4', NULL, '2024-03-17 01:32:47', '2024-03-17 01:32:47', NULL),
(6, 'Direktur Keuangan', '5', 1, '2024-03-17 01:33:05', '2024-03-17 01:33:05', NULL),
(7, 'DSTI', '6', NULL, '2024-03-17 01:33:51', '2024-03-17 04:37:20', NULL),
(8, 'Dekan Fakultas rekayasa Sistem', '6', NULL, '2024-03-17 01:34:09', '2024-03-17 01:34:09', NULL),
(9, 'Wadek Fakultas Rekayasa Sistem', '8', NULL, '2024-03-17 01:34:26', '2024-03-17 01:34:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RxTmDfgo12j7lPuH83xvqSoLw6BYObJj2r8CCqMJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUnNvMXZxa2JSN0lvOXJZQ05UQ2laYmN6SXR5SG9LY0FNeXBiTzhMeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdWJtaXNzaW9uL2RpcmVrdHVyLWtldWFuZ2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1711175949);

-- --------------------------------------------------------

--
-- Struktur dari tabel `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ppuf_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `iku1_id` bigint(20) UNSIGNED DEFAULT NULL,
  `iku2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `iku3_id` bigint(20) UNSIGNED DEFAULT NULL,
  `background` varchar(255) NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `participant` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `rundown` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `budget` varchar(255) NOT NULL,
  `approved_budget` varchar(255) DEFAULT '0',
  `report_file` varchar(255) DEFAULT NULL,
  `is_disbursement_complete` tinyint(1) NOT NULL DEFAULT 0,
  `is_done` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `disbursement_period_id` bigint(20) UNSIGNED DEFAULT NULL,
  `budget_detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '[]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `submissions`
--

INSERT INTO `submissions` (`id`, `ppuf_id`, `role_id`, `iku1_id`, `iku2_id`, `iku3_id`, `background`, `speaker`, `participant`, `place`, `date`, `rundown`, `vendor`, `budget`, `approved_budget`, `report_file`, `is_disbursement_complete`, `is_done`, `created_at`, `updated_at`, `deleted_at`, `disbursement_period_id`, `budget_detail`) VALUES
(4, 1, 1, 3, 10, 48, 'asdasd', 'asda', 'sdasda', 'sasdasdasda', 'juli', 'dasdasd', 'asdasda', 'Rp. 1.200.000', 'Rp. 1.100.000', 'lpj/1710789399.auth.png', 1, 1, '2024-03-17 01:04:42', '2024-03-18 20:07:55', NULL, 1, '[]'),
(5, 7, 5, 3, 10, 48, 'asdasd', 'asda', 'sdasda', 'sasdasdasda', 'juli', 'dasdasd', 'asdasda', 'Rp. 1.200.000', '0', NULL, 0, 0, '2024-03-17 01:04:42', '2024-03-17 08:18:14', '2024-03-17 08:18:14', NULL, '[]'),
(6, 7, 6, 3, 10, 48, 'asdas', 'dasd', 'adasdasd', 'asdas', 'februari', 'asdasd', 'asdasd', 'Rp. 1.200.000', '0', NULL, 0, 0, '2024-03-17 08:18:33', '2024-03-17 08:24:17', '2024-03-17 08:24:17', NULL, '[]'),
(7, 7, 6, 2, 5, 22, 'asasd', 'asdasd', 'asdasdasd', 'asdasdasd', 'maret', 'asdasdasd', 'asdas', 'Rp. 1.200.000', '0', NULL, 0, 0, '2024-03-17 08:25:31', '2024-03-17 08:26:31', '2024-03-17 08:26:31', NULL, '[]'),
(8, 7, 4, 2, 5, 22, 'asdasd', 'asd', 'asdasd', 'asdas', 'juli', 'asdasd', 'asdasd', 'Rp. 1.200.000', 'Rp. 1.100.000', NULL, 0, 0, '2024-03-17 08:29:58', '2024-03-18 20:29:16', NULL, 3, '[]'),
(9, 6, 1, 2, 5, 22, 'dgfdfg', 'dgdfgdfg', 'dfgdfg', 'asdasd', 'februari', 'dfgdfgdfg', 'asdas', '220000', 'Rp. 1.100.000', 'lpj/1710822833.auth.png', 1, 1, '2024-03-18 20:13:56', '2024-03-21 07:31:22', NULL, 3, '[{\"item\":\"asdasdasd\",\"qty\":\"10\",\"harga_satuan\":\"10000\",\"total\":\"100000\",\"detail\":null},{\"item\":\"asdasd\",\"qty\":\"12\",\"harga_satuan\":\"10000\",\"total\":\"120000\",\"detail\":null}]'),
(10, 2, 6, 3, 10, 48, 'sadas', 'asddsa', 'dad', 'snamdnasd', 'februari', 'adad', 'asdnasm', '408', '0', NULL, 0, 0, '2024-03-19 23:51:42', '2024-03-20 00:51:32', NULL, NULL, '[{\"item\":\"asda,msd\",\"qty\":\"12\",\"harga_satuan\":\"12\",\"total\":\"144\",\"detail\":null},{\"item\":\"asdmsd\",\"qty\":\"12\",\"harga_satuan\":\"12\",\"total\":\"144\",\"detail\":null},{\"item\":\"asdllasd\",\"qty\":\"12\",\"harga_satuan\":\"10\",\"total\":\"120\",\"detail\":null}]'),
(11, 6, 8, 2, 5, 22, 'asdasd', 'asdas', 'dasd', 'dasdasdasd', 'september', 'asdasdasd', 'asdasdas', '1410000', '0', NULL, 0, 0, '2024-03-21 07:18:19', '2024-03-21 07:18:19', NULL, NULL, '[{\"item\":\"asdasdasd\",\"qty\":\"12\",\"harga_satuan\":\"15000\",\"total\":\"180000\",\"detail\":null},{\"item\":\"adadad\",\"qty\":\"123\",\"harga_satuan\":\"10000\",\"total\":\"1230000\",\"detail\":null}]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `submission_statuses`
--

CREATE TABLE `submission_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `submission_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `submission_statuses`
--

INSERT INTO `submission_statuses` (`id`, `role_id`, `submission_id`, `status`, `message`, `created_at`, `updated_at`) VALUES
(4, 7, 4, 1, 'Telah diajukan', '2024-03-17 01:04:42', '2024-03-17 01:04:42'),
(5, 7, 6, 1, 'Telah diajukan', '2024-03-17 08:18:33', '2024-03-17 08:18:33'),
(6, 7, 7, 1, 'Telah diajukan', '2024-03-17 08:25:31', '2024-03-17 08:25:31'),
(7, 6, 8, 1, 'Telah diajukan', '2024-03-17 08:29:58', '2024-03-17 08:29:58'),
(9, 6, 4, 1, 'Telah masukkan ke periode Pekan 1 April 2024', '2024-03-17 17:04:06', '2024-03-17 17:04:06'),
(10, 5, 4, 1, 'Telah disetujui Pekan 1 April 2024', '2024-03-17 23:04:07', '2024-03-17 23:04:07'),
(11, 4, 4, 0, 'Mohon direvisi: ', '2024-03-18 04:47:14', '2024-03-18 04:47:14'),
(12, 4, 4, 0, 'Mohon direvisi: ', '2024-03-18 04:48:14', '2024-03-18 04:48:14'),
(13, 4, 4, 0, 'Mohon direvisi: Pengajuan apaan nich', '2024-03-18 04:48:36', '2024-03-18 04:48:36'),
(14, 4, 4, 0, 'Mohon direvisi: ', '2024-03-18 04:49:06', '2024-03-18 04:49:06'),
(15, 4, 4, 1, 'Telah disetujui: ASsASasAS', '2024-03-18 04:49:16', '2024-03-18 04:49:16'),
(16, 3, 4, 0, 'Telah dilakukan pencairan dengan nominal Rp. 1.200.000', '2024-03-18 10:07:15', '2024-03-18 10:07:15'),
(17, 3, 4, 0, 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi', '2024-03-18 10:21:12', '2024-03-18 10:21:12'),
(18, 3, 4, 1, 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi', '2024-03-18 10:22:17', '2024-03-18 10:22:17'),
(19, 3, 4, 1, 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi', '2024-03-18 10:24:07', '2024-03-18 10:24:07'),
(20, 3, 4, 1, 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi', '2024-03-18 10:24:31', '2024-03-18 10:24:31'),
(21, 7, 4, 1, 'LPJ Kegiatan telah diupload', '2024-03-18 11:11:56', '2024-03-18 11:11:56'),
(22, 7, 4, 1, 'LPJ Kegiatan telah diupload', '2024-03-18 11:16:39', '2024-03-18 11:16:39'),
(23, 2, 4, 0, 'Mohon direvisi: Laporan tidak sesuai template', '2024-03-18 20:03:26', '2024-03-18 20:03:26'),
(24, 2, 4, 1, 'LPJ telah disetujui', '2024-03-18 20:07:55', '2024-03-18 20:07:55'),
(25, 9, 9, 1, 'Telah diajukan', '2024-03-18 20:13:56', '2024-03-18 20:13:56'),
(26, 8, 9, 0, 'Mohon direvisi: sdasdasd', '2024-03-18 20:25:15', '2024-03-18 20:25:15'),
(27, 8, 9, 0, 'Mohon direvisi: asasdasdd', '2024-03-18 20:26:13', '2024-03-18 20:26:13'),
(28, 8, 9, 1, 'Telah disetujui: OKE BANGET', '2024-03-18 20:26:25', '2024-03-18 20:26:25'),
(29, 6, 8, 1, 'Telah disetujui untuk pencairan Pekan 2 April 2024', '2024-03-18 20:27:18', '2024-03-18 20:27:18'),
(30, 6, 9, 1, 'Telah disetujui untuk pencairan Pekan 2 April 2024', '2024-03-18 20:27:26', '2024-03-18 20:27:26'),
(31, 5, 8, 1, 'Telah disetujui untuk pencairan Pekan 2 April 2024', '2024-03-18 20:29:16', '2024-03-18 20:29:16'),
(32, 5, 9, 1, 'Telah disetujui untuk pencairan Pekan 2 April 2024', '2024-03-18 20:29:16', '2024-03-18 20:29:16'),
(33, 4, 9, 1, 'Telah disetujui: OKE JUGA NICH', '2024-03-18 20:31:19', '2024-03-18 20:31:19'),
(34, 3, 9, 0, 'Telah dilakukan pencairan dengan nominal Rp. 1.100.000', '2024-03-18 20:32:45', '2024-03-18 20:32:45'),
(35, 3, 9, 0, 'Telah dilakukan pencairan dengan nominal Rp. 121.212', '2024-03-18 20:32:57', '2024-03-18 20:32:57'),
(36, 3, 9, 1, 'Pencairan selesai, mohon segera upload LPJ kegiatan pada form aksi', '2024-03-18 20:33:01', '2024-03-18 20:33:01'),
(37, 9, 9, 1, 'LPJ Kegiatan telah diupload', '2024-03-18 20:33:53', '2024-03-18 20:33:53'),
(38, 2, 9, 0, 'Mohon direvisi: Ubah aja misalnya gajelas', '2024-03-18 20:34:39', '2024-03-18 20:34:39'),
(39, 2, 9, 1, 'LPJ telah disetujui', '2024-03-18 20:34:56', '2024-03-18 20:34:56'),
(40, 7, 10, 1, 'Telah diajukan', '2024-03-19 23:51:42', '2024-03-19 23:51:42'),
(41, 9, 11, 1, 'Telah diajukan', '2024-03-21 07:18:19', '2024-03-21 07:18:19');

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
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `whatsapp`, `bank_name`, `bank_account_number`, `bank_account_name`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XCZ', 'xcz.ardiansyahputra2468@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL7oLP_ByMxC825XBJJ9c2PuaXLij3RsiO3m6HUIwzZaCI=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-15 11:59:03', '2024-03-15 11:59:03', NULL),
(2, 'Ardiansyah Putra', 'ardiansyah.putra@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLUv0ahovVt8oI6vtcqxZvPa91TTJj1qbLtIJXVwdMo=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-16 13:36:36', '2024-03-16 13:36:36', NULL),
(3, 'xcz.a2rj', 'xcz.a2rj@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-16 13:38:08', '2024-03-16 13:38:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `disbursements`
--
ALTER TABLE `disbursements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disbursements_submission_id_foreign` (`submission_id`);

--
-- Indeks untuk tabel `disbursement_periods`
--
ALTER TABLE `disbursement_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ppufs`
--
ALTER TABLE `ppufs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ppufs_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_aggregates_bucket_period_type_aggregate_key_hash_unique` (`bucket`,`period`,`type`,`aggregate`,`key_hash`),
  ADD KEY `pulse_aggregates_period_bucket_index` (`period`,`bucket`),
  ADD KEY `pulse_aggregates_type_index` (`type`),
  ADD KEY `pulse_aggregates_period_type_aggregate_bucket_index` (`period`,`type`,`aggregate`,`bucket`);

--
-- Indeks untuk tabel `pulse_entries`
--
ALTER TABLE `pulse_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pulse_entries_timestamp_index` (`timestamp`),
  ADD KEY `pulse_entries_type_index` (`type`),
  ADD KEY `pulse_entries_key_hash_index` (`key_hash`),
  ADD KEY `pulse_entries_timestamp_type_key_hash_value_index` (`timestamp`,`type`,`key_hash`,`value`);

--
-- Indeks untuk tabel `pulse_values`
--
ALTER TABLE `pulse_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_values_type_key_hash_unique` (`type`,`key_hash`),
  ADD KEY `pulse_values_timestamp_index` (`timestamp`),
  ADD KEY `pulse_values_type_index` (`type`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_ppuf_id_foreign` (`ppuf_id`),
  ADD KEY `submissions_next_foreign` (`role_id`),
  ADD KEY `submissions_iku1_id_foreign` (`iku1_id`),
  ADD KEY `submissions_iku2_id_foreign` (`iku2_id`),
  ADD KEY `submissions_iku3_id_foreign` (`iku3_id`),
  ADD KEY `submissions_disbursement_period_id_foreign` (`disbursement_period_id`);

--
-- Indeks untuk tabel `submission_statuses`
--
ALTER TABLE `submission_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submission_statuses_role_id_foreign` (`role_id`),
  ADD KEY `submission_statuses_submission_id_foreign` (`submission_id`);

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
-- AUTO_INCREMENT untuk tabel `disbursements`
--
ALTER TABLE `disbursements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `disbursement_periods`
--
ALTER TABLE `disbursement_periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ppufs`
--
ALTER TABLE `ppufs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7605;

--
-- AUTO_INCREMENT untuk tabel `pulse_entries`
--
ALTER TABLE `pulse_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1850;

--
-- AUTO_INCREMENT untuk tabel `pulse_values`
--
ALTER TABLE `pulse_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `submission_statuses`
--
ALTER TABLE `submission_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `disbursements`
--
ALTER TABLE `disbursements`
  ADD CONSTRAINT `disbursements_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `ppufs`
--
ALTER TABLE `ppufs`
  ADD CONSTRAINT `ppufs_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_disbursement_period_id_foreign` FOREIGN KEY (`disbursement_period_id`) REFERENCES `disbursement_periods` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_iku1_id_foreign` FOREIGN KEY (`iku1_id`) REFERENCES `iku1` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_iku2_id_foreign` FOREIGN KEY (`iku2_id`) REFERENCES `iku2` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_iku3_id_foreign` FOREIGN KEY (`iku3_id`) REFERENCES `iku3` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_next_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submissions_ppuf_id_foreign` FOREIGN KEY (`ppuf_id`) REFERENCES `ppufs` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `submission_statuses`
--
ALTER TABLE `submission_statuses`
  ADD CONSTRAINT `submission_statuses_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `submission_statuses_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `submissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
