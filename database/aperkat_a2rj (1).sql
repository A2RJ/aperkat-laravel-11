-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2024 at 11:22 AM
-- Server version: 10.2.44-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aperkat_a2rj`
--

-- --------------------------------------------------------

--
-- Table structure for table `iku_child1`
--

CREATE TABLE `iku_child1` (
  `id_iku_child1` int(11) NOT NULL,
  `id_iku_parent` int(11) NOT NULL,
  `iku_child1` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iku_child1`
--

INSERT INTO `iku2` (`id`, `parent_id`, `iku`) VALUES
(1, 1, 'Melakukan penyempurnaan terhadap sistem\r\ntata kelola universitas\r\n'),
(2, 1, 'Melakukan peningkatan atas peringkat\r\nakreditasi institusi di jenjang nasional dan\r\ninternasional\r\n\r\n'),
(3, 1, 'Melaksanakan pengembangan sistem\r\nmanajemen Sumber Daya Manusia yang\r\nhandal\r\n'),
(4, 1, 'Menyelenggarakan manajemen sumber\r\ndaya fisik/ infrastruktur yang handal\r\n'),
(5, 2, 'Peningkatan peluang dan kesempatan\r\nkepada calon mahasiswa di seluruh\r\nnusantara dan dunia untuk mengenyam\r\nPendidikan'),
(6, 2, 'Pengembangan kurikulum berbasis Kualifikasi\r\nKompetensi Nasional Indonesia (KKNI)\r\n'),
(7, 2, 'Peningkatan dan pengembangan kualifikasi,\r\nkompetensi, serta karir dosen\r\n'),
(8, 2, 'Menyediakan sarana dan prasarana\r\npendukung'),
(9, 2, 'Pengembangan Pendidikan Jarak Jauh (PPJJ)\r\ndan pendidikan sepanjang hayat\r\n'),
(10, 3, 'Melaksanakan pendidikan kepribadian,\r\nkarakter, dan akhlak mahasiswa'),
(11, 3, 'Peningkatan kesiapan lulusan yang\r\nunggul, relevan dengan kebutuhan\r\nmitra strategis\r\n'),
(12, 3, 'Menyiapkan kegiatan kompetisi\r\nkeilmuan di tingkat nasional dan\r\ninternasional\r\n'),
(13, 3, 'Meyediakan koektivitas lulusan dengan\r\ndunia kerja'),
(14, 3, 'Memperkuat inovasi kewirausahaan'),
(15, 3, 'Menjaring lulusan yang berminat untuk\r\nstudi lanjut\r\n'),
(16, 4, 'Pengembangan penelitian multidisiplin\r\nberdasar kepada Rencana Induk\r\nPenelitian\r\n'),
(17, 4, 'Mengembangkan penelitian berbasis lokal\r\nberwawasan global'),
(18, 4, 'Pengembangan kegiatan pengabdian\r\nkepada masyarakat\r\n'),
(19, 5, 'Peningkatan jumlah publikasi nasional\r\ndan internasional\r\n'),
(20, 5, 'Pengembangan sistem reward atas\r\nkegiatan publikasi ilmiah\r\n'),
(21, 5, 'Menyiapkan database penelitian dan\r\npengabdian kepada masyarakat\r\n'),
(22, 5, 'Menjaring kemitraan, lokal, nasional\r\ndan internasiona');

-- --------------------------------------------------------

--
-- Table structure for table `iku_child2`
--

CREATE TABLE `iku_child2` (
  `id_iku_child2` int(11) NOT NULL,
  `id_iku_child1` int(11) NOT NULL,
  `iku_child2` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iku_child2`
--

INSERT INTO `iku3` (`id`, `parent_id`, `iku`) VALUES
(1, 1, 'Tersusunnya Rencana Kerja Anggaran berdasarkan\r\nskala prioritas\r\n'),
(2, 1, 'Menyusun Standar Operasional Prosedur baru\r\nberdasarkan kebutuhan\r\n'),
(3, 1, 'Pelaksanaan Standar Operasional Prosedur yang\r\ntelah disusun'),
(4, 1, 'Penerapan sistem informasi dan teknologi\r\nterintegrasi\r\n'),
(5, 1, 'Ketersediaan RENSTRA dan RENOP Unit Kerja'),
(6, 2, 'jumlah program studi yang terakreditasi \"sangat baik\"'),
(7, 2, 'Melaksanakan audit internal secara priodik'),
(8, 2, 'Monitoring dan evaluasi hasil audit internal\r\n'),
(9, 2, 'Rencana kerja tindak lanjut atas hasil audit interna'),
(10, 3, 'Tersusun dan terimplementasi rencana induk\r\npengembangan Sumber Daya Manusia\r\n'),
(11, 3, 'Tersusun dan terimplementasi sistem rekrutmen'),
(12, 3, 'Tersusun dan terimplementasi sistem seleksi yang\r\ntransparan dan akuntabel\r\n'),
(13, 3, 'Tersusun dan terimplementasi standar kompetensi\r\nsebagai dasar penempatan Sumber Daya\r\nManusia\r\n'),
(14, 3, ' Pendirian dan pemanfaatan training center dalam\r\nrangka pengembangan Sumber Daya Manusia'),
(15, 3, 'Jumlah Sumber Daya Manusia yang mengikuti\r\npendidikan dan pelatihan\r\n'),
(16, 3, 'Tersusun dan terlaksananya perencanaan\r\npengembangan karir'),
(17, 3, 'Terlaksananya sistem penggajian, tunjangan, dan\r\nbonus secara terpusat\r\n'),
(18, 4, 'Terlaksananya sistem penggajian, tunjangan, dan\r\nbonus secara terpusat\r\n'),
(19, 4, 'Terdapat rencana induk pengembangan sumber\r\ndaya fisik/infrastruktur yang berorientasi kepada\r\nkeselamatan, kesehatan dan ramah lingkungan'),
(20, 4, 'Tingkat penggunaan sumber daya\r\nfisik/infrastruktur'),
(21, 4, 'Jumlah sumber daya fisik/infrastruktur bagi\r\npenyandang disabilitas\r\n'),
(22, 5, 'Tersedianya dan terimplementasinya sistem seleksi\r\nmahasiswa baru yang transparan dan akuntabel\r\n'),
(23, 5, 'Propoporsi mahasiswa dengan program beasiswa'),
(24, 5, 'Tersedia dan terlaksananya program beasiswa\r\nmahasiswa'),
(25, 5, 'Tingkat persebaran mahasiswa secara geografis\r\n(nasional)\r\n'),
(26, 5, ' Jumlah mahasiswa baru internasional dalam proses\r\npembelajaran\r\n'),
(27, 6, 'Tersusun dan terlaksananya kurikulum berbasis KKNI\r\n'),
(28, 6, 'Proporsi mata kuliah berbasis penelitian dosen\r\n'),
(29, 6, ' Tersusun dan terlaksananya kegiatan Kampus Merdeka\r\n'),
(30, 6, 'Jumlah adopsi kegiatan pembelajaran di luar\r\nperguruan tinggi\r\n'),
(31, 6, 'Jumlah peserta magang bersertifikat'),
(32, 6, 'Jumlah mitra desa\r\n'),
(33, 7, 'Proporsi dosen dengan jabatan fungsional\r\n'),
(34, 7, ' Proporsi dosen dengan sertifikasi pendidik'),
(35, 7, 'Dosen tugas belajar/izin belajar\r\n'),
(36, 7, 'Jumlah Guru Besar (profesor)\r\n'),
(37, 7, 'Proporsi dosen dengan gelar S3\r\n'),
(38, 7, 'Rata-rata rasio dosen/mahasiswa tiap program studi\r\n'),
(39, 7, 'Proporsi dosen yag telah mengikuti pelatihan\r\nprofesioanalisme dosen'),
(40, 8, 'Jumlah Okupasi'),
(41, 8, 'Tersedianya laboratorium'),
(42, 8, 'Tersedianya ruang publik kreatif'),
(43, 8, 'Tingkat penggunaan e-learning dalam proses\r\npembelajaran\r\n'),
(44, 9, 'Jumlah mata kuliah yang ditawarkan dalam bentuk\r\njarak jauh\r\n'),
(45, 9, ' Jumlah mata kuliah yang ditawarkan untuk umum\r\nsecara masif dan terbuka (massive open online course)\r\n'),
(46, 9, 'Jumlah mata kuliah yang ditawarkan untuk umum\r\nsecara masif dan terbuka (massive open online course)\r\n'),
(47, 9, 'Jumlah partisipasi masyarakat dalam mata kuliah\r\numum\r\n'),
(48, 10, 'Tingkat kelulusan kegiatan mentoring\r\n'),
(49, 10, 'Jumlah pelatihan soft skill'),
(50, 10, 'Keterlibatan mahasiswa dalam kegiatan\r\npemberdayaan masyarakat\r\n'),
(51, 10, 'Tingkat kepuasan pengguna alumni\r\n'),
(52, 10, 'Tingkat persepsi kepuasan masyarakat terhadap\r\nperilaku alumni'),
(53, 11, 'Proporsi lulusan yang bekerja sesuai bidang'),
(54, 11, 'Proporsi lulusan dengan masa tunggu < 6 bulan\r\n'),
(55, 11, 'Proporsi lulusan yang lulus tepat waktu atau lebih\r\ncepat\r\n'),
(56, 11, 'Rata-rata IPK lulusan per prodi\r\n'),
(57, 11, 'Proporsi lulusan yang bekerja pada level nasional'),
(58, 11, 'Proporsi lulusan yang bekerja pada level\r\ninternasional\r\n'),
(59, 12, 'Tingkat keterlibatan mahasiswa'),
(60, 12, ' Jumlah prestasi akademik tingkat nasional'),
(61, 12, 'Jumlah prestasi akademik tingkat internasional\r\n'),
(62, 12, 'Jumlah usulan Program Kreatifitas Mahasiswa (PKM)\r\n'),
(63, 12, 'Jumlah PKM yang didanai'),
(64, 12, 'Jumlah PKM yang lolos ke PIMNAS\r\n'),
(65, 12, 'Jumlah kegiatan pelatihan kompetisi akademik\r\n'),
(66, 13, 'Kegiatan campus hiring\r\n'),
(67, 13, 'Jumlah kegiatan pembekelan mahasiswa prakerja\r\n'),
(68, 14, 'Jumlah kegiatan yang berorientasi wirausaha'),
(69, 14, 'Jumlah mahasiswa yang berwirausaha'),
(70, 14, 'Jumlah alumni yang berwirausaha'),
(71, 15, 'Jumlah donatur/pemberi beasiswa yang terlibat'),
(72, 15, 'Jumlah lulusan yang melanjutkan studi'),
(73, 16, 'Jumlah penelitian'),
(74, 16, 'Jumlah penelitian multidisiplin\r\n'),
(75, 16, 'Jumlah penelitian dengan melibatkan\r\nmahasiswa\r\n'),
(76, 16, 'Jumlah penelitian multidisiplin dengan\r\nmelibatkan mahasiswa'),
(77, 17, 'Jumlah penelitian yang berbasis permasalahan\r\nlokal\r\n'),
(78, 17, 'Jumlah penelitian yang berbasis permasalahan\r\nnasional'),
(79, 17, 'jumlah penelitian yang berbasis permasalahan\r\ninternasional\r\n'),
(80, 18, 'Jumlah kegiatan pengabdian kepada\r\nmasyarakat\r\n'),
(81, 18, 'Jumlah kegiatan pengabdian kepada\r\nmasyarakat dengan melibatkan mahasiswa'),
(82, 19, 'Jumlah publikasi nasional\r\n'),
(83, 19, 'Jumlah publikasi internasional\r\n'),
(84, 20, 'Jumlah dosen yang mendapat reward publikasi\r\nnasiona'),
(85, 20, 'Jumlah dosen yang mendapat reward publikasi\r\ninternasional'),
(86, 21, 'Tersedianya database penelitian'),
(87, 21, 'Tersedianya database pengabdian kepada\r\nmasyarakat'),
(88, 22, 'Jumlah lembaga kemitraan local'),
(89, 22, 'Jumlah lembaga kemitraan nasional\r\n'),
(90, 22, 'Jumlah lembaga kemitraan internasional\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `iku_parent`
--

CREATE TABLE `iku_parent` (
  `id_iku_parent` int(11) NOT NULL,
  `iku_parent` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iku_parent`
--

INSERT INTO `iku1` (`id`, `iku`) VALUES
(1, 'Mewujudkan tata kelola universitas yang efisien, efektif, transparan\r\ndan akuntabel\r\n'),
(2, 'Menciptakan suasana akademik yang kondusif, nyaman, dan menyenangkan'),
(3, 'Melahirkan lulusan yang unggul, kompeten, dan berakhlak mulia.'),
(4, 'Melaksanakan kegiatan penelitian dan pengabdian kepada masyarakat, untuk\r\nmenjawab persoalan di tingkat lokal, nasional, dan internasional.\r\n'),
(5, 'Mendesiminasikan hasil penelitan dan pengabdian kepada masyarakat pada\r\ntingkat nasional dan internasional.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iku_child1`
--
ALTER TABLE `iku_child1`
  ADD PRIMARY KEY (`id_iku_child1`),
  ADD KEY `id_iku_parent` (`id_iku_parent`);

--
-- Indexes for table `iku_child2`
--
ALTER TABLE `iku_child2`
  ADD PRIMARY KEY (`id_iku_child2`),
  ADD KEY `id_iku_child1` (`id_iku_child1`);

--
-- Indexes for table `iku_parent`
--
ALTER TABLE `iku_parent`
  ADD PRIMARY KEY (`id_iku_parent`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iku_child1`
--
ALTER TABLE `iku_child1`
  MODIFY `id_iku_child1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `iku_child2`
--
ALTER TABLE `iku_child2`
  MODIFY `id_iku_child2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `iku_parent`
--
ALTER TABLE `iku_parent`
  MODIFY `id_iku_parent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `iku_child1`
--
ALTER TABLE `iku_child1`
  ADD CONSTRAINT `iku_child1_ibfk_1` FOREIGN KEY (`id_iku_parent`) REFERENCES `iku_parent` (`id_iku_parent`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `iku_child2`
--
ALTER TABLE `iku_child2`
  ADD CONSTRAINT `iku_child2_ibfk_1` FOREIGN KEY (`id_iku_child1`) REFERENCES `iku_child1` (`id_iku_child1`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
