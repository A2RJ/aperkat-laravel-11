-- --------------------------------------------------------
-- Host:                         D:\aperkat-laravel-11\database\database.sqlite
-- Server version:               3.39.0
-- Server OS:                    
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
-- /*!40101 SET NAMES  */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table database.cache
CREATE TABLE IF NOT EXISTS cache (key varchar not null, value text not null, expiration integer not null, primary key (key));

-- Dumping data for table database.cache: 0 rows
DELETE FROM cache;
/*!40000 ALTER TABLE cache DISABLE KEYS */;
/*!40000 ALTER TABLE cache ENABLE KEYS */;

-- Dumping structure for table database.cache_locks
CREATE TABLE IF NOT EXISTS cache_locks (key varchar not null, owner varchar not null, expiration integer not null, primary key (key));

-- Dumping data for table database.cache_locks: 0 rows
DELETE FROM cache_locks;
/*!40000 ALTER TABLE cache_locks DISABLE KEYS */;
/*!40000 ALTER TABLE cache_locks ENABLE KEYS */;

-- Dumping structure for table database.disbursements
CREATE TABLE IF NOT EXISTS disbursements (id integer primary key autoincrement not null, submission_id integer, budget varchar not null, filename varchar not null, created_at datetime, updated_at datetime, foreign key(submission_id) references submissions(id) on delete set null on update cascade);

-- Dumping data for table database.disbursements: 0 rows
DELETE FROM disbursements;
/*!40000 ALTER TABLE disbursements DISABLE KEYS */;
/*!40000 ALTER TABLE disbursements ENABLE KEYS */;

-- Dumping structure for table database.disbursement_periods
CREATE TABLE IF NOT EXISTS disbursement_periods (id integer primary key autoincrement not null, period varchar not null, created_at datetime, updated_at datetime);

-- Dumping data for table database.disbursement_periods: 1 rows
DELETE FROM disbursement_periods;
/*!40000 ALTER TABLE disbursement_periods DISABLE KEYS */;
INSERT INTO disbursement_periods (id, period, created_at, updated_at) VALUES
	(1, 'April 2024', '2024-04-17 03:41:00', '2024-04-17 03:41:00');
/*!40000 ALTER TABLE disbursement_periods ENABLE KEYS */;

-- Dumping structure for table database.failed_jobs
CREATE TABLE IF NOT EXISTS failed_jobs (id integer primary key autoincrement not null, uuid varchar not null, connection text not null, queue text not null, payload text not null, exception text not null, failed_at datetime not null default CURRENT_TIMESTAMP);

-- Dumping data for table database.failed_jobs: 0 rows
DELETE FROM failed_jobs;
/*!40000 ALTER TABLE failed_jobs DISABLE KEYS */;
/*!40000 ALTER TABLE failed_jobs ENABLE KEYS */;

-- Dumping structure for table database.iku1
CREATE TABLE IF NOT EXISTS iku1 (id integer primary key autoincrement not null, iku varchar not null, created_at datetime, updated_at datetime);

-- Dumping data for table database.iku1: 5 rows
DELETE FROM iku1;
/*!40000 ALTER TABLE iku1 DISABLE KEYS */;
INSERT INTO iku1 (id, iku, created_at, updated_at) VALUES
	(1, 'Mewujudkan tata kelola universitas yang efisien, efektif, transparan dan akuntabel ', NULL, NULL),
	(2, 'Menciptakan suasana akademik yang kondusif, nyaman, dan menyenangkan', NULL, NULL),
	(3, 'Melahirkan lulusan yang unggul, kompeten, dan berakhlak mulia.', NULL, NULL),
	(4, 'Melaksanakan kegiatan penelitian dan pengabdian kepada masyarakat, untuk menjawab persoalan di tingkat lokal, nasional, dan internasional. ', NULL, NULL),
	(5, 'Mendesiminasikan hasil penelitan dan pengabdian kepada masyarakat pada tingkat nasional dan internasional.', NULL, NULL);
/*!40000 ALTER TABLE iku1 ENABLE KEYS */;

-- Dumping structure for table database.iku2
CREATE TABLE IF NOT EXISTS iku2 (id integer primary key autoincrement not null, iku varchar not null, parent_id integer, created_at datetime, updated_at datetime, foreign key(parent_id) references iku1(id) on delete set null on update cascade);

-- Dumping data for table database.iku2: 22 rows
DELETE FROM iku2;
/*!40000 ALTER TABLE iku2 DISABLE KEYS */;
INSERT INTO iku2 (id, iku, parent_id, created_at, updated_at) VALUES
	(1, 'Melakukan penyempurnaan terhadap sistem tata kelola universitas ', 1, NULL, NULL),
	(2, 'Melakukan peningkatan atas peringkat akreditasi institusi di jenjang nasional dan internasional  ', 1, NULL, NULL),
	(3, 'Melaksanakan pengembangan sistem manajemen Sumber Daya Manusia yang handal ', 1, NULL, NULL),
	(4, 'Menyelenggarakan manajemen sumber daya fisik/ infrastruktur yang handal ', 1, NULL, NULL),
	(5, 'Peningkatan peluang dan kesempatan kepada calon mahasiswa di seluruh nusantara dan dunia untuk mengenyam Pendidikan', 2, NULL, NULL),
	(6, 'Pengembangan kurikulum berbasis Kualifikasi Kompetensi Nasional Indonesia (KKNI) ', 2, NULL, NULL),
	(7, 'Peningkatan dan pengembangan kualifikasi, kompetensi, serta karir dosen ', 2, NULL, NULL),
	(8, 'Menyediakan sarana dan prasarana pendukung', 2, NULL, NULL),
	(9, 'Pengembangan Pendidikan Jarak Jauh (PPJJ) dan pendidikan sepanjang hayat ', 2, NULL, NULL),
	(10, 'Melaksanakan pendidikan kepribadian, karakter, dan akhlak mahasiswa', 3, NULL, NULL),
	(11, 'Peningkatan kesiapan lulusan yang unggul, relevan dengan kebutuhan mitra strategis ', 3, NULL, NULL),
	(12, 'Menyiapkan kegiatan kompetisi keilmuan di tingkat nasional dan internasional ', 3, NULL, NULL),
	(13, 'Meyediakan koektivitas lulusan dengan dunia kerja', 3, NULL, NULL),
	(14, 'Memperkuat inovasi kewirausahaan', 3, NULL, NULL),
	(15, 'Menjaring lulusan yang berminat untuk studi lanjut ', 3, NULL, NULL),
	(16, 'Pengembangan penelitian multidisiplin berdasar kepada Rencana Induk Penelitian ', 4, NULL, NULL),
	(17, 'Mengembangkan penelitian berbasis lokal berwawasan global', 4, NULL, NULL),
	(18, 'Pengembangan kegiatan pengabdian kepada masyarakat ', 4, NULL, NULL),
	(19, 'Peningkatan jumlah publikasi nasional dan internasional ', 5, NULL, NULL),
	(20, 'Pengembangan sistem reward atas kegiatan publikasi ilmiah ', 5, NULL, NULL),
	(21, 'Menyiapkan database penelitian dan pengabdian kepada masyarakat ', 5, NULL, NULL),
	(22, 'Menjaring kemitraan, lokal, nasional dan internasiona', 5, NULL, NULL);
/*!40000 ALTER TABLE iku2 ENABLE KEYS */;

-- Dumping structure for table database.iku3
CREATE TABLE IF NOT EXISTS iku3 (id integer primary key autoincrement not null, iku varchar not null, parent_id integer, created_at datetime, updated_at datetime, foreign key(parent_id) references iku2(id) on delete set null on update cascade);

-- Dumping data for table database.iku3: 90 rows
DELETE FROM iku3;
/*!40000 ALTER TABLE iku3 DISABLE KEYS */;
INSERT INTO iku3 (id, iku, parent_id, created_at, updated_at) VALUES
	(1, 'Tersusunnya Rencana Kerja Anggaran berdasarkan skala prioritas ', 1, NULL, NULL),
	(2, 'Menyusun Standar Operasional Prosedur baru berdasarkan kebutuhan ', 1, NULL, NULL),
	(3, 'Pelaksanaan Standar Operasional Prosedur yang telah disusun', 1, NULL, NULL),
	(4, 'Penerapan sistem informasi dan teknologi terintegrasi ', 1, NULL, NULL),
	(5, 'Ketersediaan RENSTRA dan RENOP Unit Kerja', 1, NULL, NULL),
	(6, 'jumlah program studi yang terakreditasi \sangat baik\', 2, NULL, NULL),
	(7, 'Melaksanakan audit internal secara priodik', 2, NULL, NULL),
	(8, 'Monitoring dan evaluasi hasil audit internal ', 2, NULL, NULL),
	(9, 'Rencana kerja tindak lanjut atas hasil audit interna', 2, NULL, NULL),
	(10, 'Tersusun dan terimplementasi rencana induk pengembangan Sumber Daya Manusia ', 3, NULL, NULL),
	(11, 'Tersusun dan terimplementasi sistem rekrutmen', 3, NULL, NULL),
	(12, 'Tersusun dan terimplementasi sistem seleksi yang transparan dan akuntabel ', 3, NULL, NULL),
	(13, 'Tersusun dan terimplementasi standar kompetensi sebagai dasar penempatan Sumber Daya Manusia ', 3, NULL, NULL),
	(14, ' Pendirian dan pemanfaatan training center dalam rangka pengembangan Sumber Daya Manusia', 3, NULL, NULL),
	(15, 'Jumlah Sumber Daya Manusia yang mengikuti pendidikan dan pelatihan ', 3, NULL, NULL),
	(16, 'Tersusun dan terlaksananya perencanaan pengembangan karir', 3, NULL, NULL),
	(17, 'Terlaksananya sistem penggajian, tunjangan, dan bonus secara terpusat ', 3, NULL, NULL),
	(18, 'Terlaksananya sistem penggajian, tunjangan, dan bonus secara terpusat ', 4, NULL, NULL),
	(19, 'Terdapat rencana induk pengembangan sumber daya fisik/infrastruktur yang berorientasi kepada keselamatan, kesehatan dan ramah lingkungan', 4, NULL, NULL),
	(20, 'Tingkat penggunaan sumber daya fisik/infrastruktur', 4, NULL, NULL),
	(21, 'Jumlah sumber daya fisik/infrastruktur bagi penyandang disabilitas ', 4, NULL, NULL),
	(22, 'Tersedianya dan terimplementasinya sistem seleksi mahasiswa baru yang transparan dan akuntabel ', 5, NULL, NULL),
	(23, 'Propoporsi mahasiswa dengan program beasiswa', 5, NULL, NULL),
	(24, 'Tersedia dan terlaksananya program beasiswa mahasiswa', 5, NULL, NULL),
	(25, 'Tingkat persebaran mahasiswa secara geografis (nasional) ', 5, NULL, NULL),
	(26, ' Jumlah mahasiswa baru internasional dalam proses pembelajaran ', 5, NULL, NULL),
	(27, 'Tersusun dan terlaksananya kurikulum berbasis KKNI ', 6, NULL, NULL),
	(28, 'Proporsi mata kuliah berbasis penelitian dosen ', 6, NULL, NULL),
	(29, ' Tersusun dan terlaksananya kegiatan Kampus Merdeka ', 6, NULL, NULL),
	(30, 'Jumlah adopsi kegiatan pembelajaran di luar perguruan tinggi ', 6, NULL, NULL),
	(31, 'Jumlah peserta magang bersertifikat', 6, NULL, NULL),
	(32, 'Jumlah mitra desa ', 6, NULL, NULL),
	(33, 'Proporsi dosen dengan jabatan fungsional ', 7, NULL, NULL),
	(34, ' Proporsi dosen dengan sertifikasi pendidik', 7, NULL, NULL),
	(35, 'Dosen tugas belajar/izin belajar ', 7, NULL, NULL),
	(36, 'Jumlah Guru Besar (profesor) ', 7, NULL, NULL),
	(37, 'Proporsi dosen dengan gelar S3 ', 7, NULL, NULL),
	(38, 'Rata-rata rasio dosen/mahasiswa tiap program studi ', 7, NULL, NULL),
	(39, 'Proporsi dosen yag telah mengikuti pelatihan profesioanalisme dosen', 7, NULL, NULL),
	(40, 'Jumlah Okupasi', 8, NULL, NULL),
	(41, 'Tersedianya laboratorium', 8, NULL, NULL),
	(42, 'Tersedianya ruang publik kreatif', 8, NULL, NULL),
	(43, 'Tingkat penggunaan e-learning dalam proses pembelajaran ', 8, NULL, NULL),
	(44, 'Jumlah mata kuliah yang ditawarkan dalam bentuk jarak jauh ', 9, NULL, NULL),
	(45, ' Jumlah mata kuliah yang ditawarkan untuk umum secara masif dan terbuka (massive open online course) ', 9, NULL, NULL),
	(46, 'Jumlah mata kuliah yang ditawarkan untuk umum secara masif dan terbuka (massive open online course) ', 9, NULL, NULL),
	(47, 'Jumlah partisipasi masyarakat dalam mata kuliah umum ', 9, NULL, NULL),
	(48, 'Tingkat kelulusan kegiatan mentoring ', 10, NULL, NULL),
	(49, 'Jumlah pelatihan soft skill', 10, NULL, NULL),
	(50, 'Keterlibatan mahasiswa dalam kegiatan pemberdayaan masyarakat ', 10, NULL, NULL),
	(51, 'Tingkat kepuasan pengguna alumni ', 10, NULL, NULL),
	(52, 'Tingkat persepsi kepuasan masyarakat terhadap perilaku alumni', 10, NULL, NULL),
	(53, 'Proporsi lulusan yang bekerja sesuai bidang', 11, NULL, NULL),
	(54, 'Proporsi lulusan dengan masa tunggu < 6 bulan ', 11, NULL, NULL),
	(55, 'Proporsi lulusan yang lulus tepat waktu atau lebih cepat ', 11, NULL, NULL),
	(56, 'Rata-rata IPK lulusan per prodi ', 11, NULL, NULL),
	(57, 'Proporsi lulusan yang bekerja pada level nasional', 11, NULL, NULL),
	(58, 'Proporsi lulusan yang bekerja pada level internasional ', 11, NULL, NULL),
	(59, 'Tingkat keterlibatan mahasiswa', 12, NULL, NULL),
	(60, ' Jumlah prestasi akademik tingkat nasional', 12, NULL, NULL),
	(61, 'Jumlah prestasi akademik tingkat internasional ', 12, NULL, NULL),
	(62, 'Jumlah usulan Program Kreatifitas Mahasiswa (PKM) ', 12, NULL, NULL),
	(63, 'Jumlah PKM yang didanai', 12, NULL, NULL),
	(64, 'Jumlah PKM yang lolos ke PIMNAS ', 12, NULL, NULL),
	(65, 'Jumlah kegiatan pelatihan kompetisi akademik ', 12, NULL, NULL),
	(66, 'Kegiatan campus hiring ', 13, NULL, NULL),
	(67, 'Jumlah kegiatan pembekelan mahasiswa prakerja ', 13, NULL, NULL),
	(68, 'Jumlah kegiatan yang berorientasi wirausaha', 14, NULL, NULL),
	(69, 'Jumlah mahasiswa yang berwirausaha', 14, NULL, NULL),
	(70, 'Jumlah alumni yang berwirausaha', 14, NULL, NULL),
	(71, 'Jumlah donatur/pemberi beasiswa yang terlibat', 15, NULL, NULL),
	(72, 'Jumlah lulusan yang melanjutkan studi', 15, NULL, NULL),
	(73, 'Jumlah penelitian', 16, NULL, NULL),
	(74, 'Jumlah penelitian multidisiplin ', 16, NULL, NULL),
	(75, 'Jumlah penelitian dengan melibatkan mahasiswa ', 16, NULL, NULL),
	(76, 'Jumlah penelitian multidisiplin dengan melibatkan mahasiswa', 16, NULL, NULL),
	(77, 'Jumlah penelitian yang berbasis permasalahan lokal ', 17, NULL, NULL),
	(78, 'Jumlah penelitian yang berbasis permasalahan nasional', 17, NULL, NULL),
	(79, 'jumlah penelitian yang berbasis permasalahan internasional ', 17, NULL, NULL),
	(80, 'Jumlah kegiatan pengabdian kepada masyarakat ', 18, NULL, NULL),
	(81, 'Jumlah kegiatan pengabdian kepada masyarakat dengan melibatkan mahasiswa', 18, NULL, NULL),
	(82, 'Jumlah publikasi nasional ', 19, NULL, NULL),
	(83, 'Jumlah publikasi internasional ', 19, NULL, NULL),
	(84, 'Jumlah dosen yang mendapat reward publikasi nasiona', 20, NULL, NULL),
	(85, 'Jumlah dosen yang mendapat reward publikasi internasional', 20, NULL, NULL),
	(86, 'Tersedianya database penelitian', 21, NULL, NULL),
	(87, 'Tersedianya database pengabdian kepada masyarakat', 21, NULL, NULL),
	(88, 'Jumlah lembaga kemitraan local', 22, NULL, NULL),
	(89, 'Jumlah lembaga kemitraan nasional ', 22, NULL, NULL),
	(90, 'Jumlah lembaga kemitraan internasional ', 22, NULL, NULL);
/*!40000 ALTER TABLE iku3 ENABLE KEYS */;

-- Dumping structure for table database.jobs
CREATE TABLE IF NOT EXISTS jobs (id integer primary key autoincrement not null, queue varchar not null, payload text not null, attempts integer not null, reserved_at integer, available_at integer not null, created_at integer not null);

-- Dumping data for table database.jobs: 0 rows
DELETE FROM jobs;
/*!40000 ALTER TABLE jobs DISABLE KEYS */;
/*!40000 ALTER TABLE jobs ENABLE KEYS */;

-- Dumping structure for table database.job_batches
CREATE TABLE IF NOT EXISTS job_batches (id varchar not null, name varchar not null, total_jobs integer not null, pending_jobs integer not null, failed_jobs integer not null, failed_job_ids text not null, options text, cancelled_at integer, created_at integer not null, finished_at integer, primary key (id));

-- Dumping data for table database.job_batches: 0 rows
DELETE FROM job_batches;
/*!40000 ALTER TABLE job_batches DISABLE KEYS */;
/*!40000 ALTER TABLE job_batches ENABLE KEYS */;

-- Dumping structure for table database.migrations
CREATE TABLE IF NOT EXISTS migrations (id integer primary key autoincrement not null, migration varchar not null, batch integer not null);

-- Dumping data for table database.migrations: 16 rows
DELETE FROM migrations;
/*!40000 ALTER TABLE migrations DISABLE KEYS */;
INSERT INTO migrations (id, migration, batch) VALUES
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
	(12, '2024_03_17_231025_create_periods', 1),
	(13, '2024_03_17_231337_create_disbursement_periods', 1),
	(14, '2024_03_18_003446_add_disbursementid_to_submission', 1),
	(15, '2024_03_18_163503_create_disbursement', 1),
	(16, '2024_04_16_072309_add_period_to_ppufs', 2);
/*!40000 ALTER TABLE migrations ENABLE KEYS */;

-- Dumping structure for table database.password_reset_tokens
CREATE TABLE IF NOT EXISTS password_reset_tokens (email varchar not null, token varchar not null, created_at datetime, primary key (email));

-- Dumping data for table database.password_reset_tokens: 0 rows
DELETE FROM password_reset_tokens;
/*!40000 ALTER TABLE password_reset_tokens DISABLE KEYS */;
/*!40000 ALTER TABLE password_reset_tokens ENABLE KEYS */;

-- Dumping structure for table database.periods
CREATE TABLE IF NOT EXISTS periods (id integer primary key autoincrement not null, period integer not null, status tinyint(1) not null, created_at datetime, updated_at datetime);

-- Dumping data for table database.periods: 0 rows
DELETE FROM periods;
/*!40000 ALTER TABLE periods DISABLE KEYS */;
/*!40000 ALTER TABLE periods ENABLE KEYS */;

-- Dumping structure for table database.ppufs
CREATE TABLE IF NOT EXISTS ppufs (id integer primary key autoincrement not null, role_id integer, iku varchar not null, ppuf_number varchar not null, activity_type varchar check (activity_type in ('program', 'pengadaan', 'pemeliharaan', 'pengembangan')) not null, program_name varchar not null, description varchar not null, place varchar not null, date varchar not null, budget varchar not null, detail varchar, created_at datetime, updated_at datetime, deleted_at datetime, period varchar not null, foreign key(role_id) references roles(id) on delete set null on update cascade);

-- Dumping data for table database.ppufs: 146 rows
DELETE FROM ppufs;
/*!40000 ALTER TABLE ppufs DISABLE KEYS */;
INSERT INTO ppufs (id, role_id, iku, ppuf_number, activity_type, program_name, description, place, date, budget, detail, created_at, updated_at, deleted_at, period) VALUES
	(63, 11, 'Pendidikan yang merata dan berkualitas ', 'PASCA-001', 'program', 'BIMTEK Penulisan Tugas Akhir dan penggunaan aplikasi menedelei periode Genap 2023/2024', 'mahasiswa pascasarjana mengetahui sistematika penulisan tugas akhir.', 'UTS', 'april', '1000000', '', NULL, NULL, NULL, '2024'),
	(64, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-002', 'pengadaan', 'Microphone Conference Tahap 1', '1 Microphone Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'april', '475000', '', NULL, NULL, NULL, '2024'),
	(65, 11, 'Pendidikan yang merata dan berkualitas ', 'PASCA-003', 'program', 'Kuliah Umum', 'melalui kuliah umum dapat meningkatkan wawasan keilmuan mahasiswa SPS ', 'UTS', 'mei', '1000000', '', NULL, NULL, NULL, '2024'),
	(66, 11, 'Tata Kelola yang Transparan dan akuntabel', 'PASCA-004', 'program', 'Persiapan Akreditasi Prodi', 'Peningkatan Mutu SPMI dan SPME SPS', 'UTS', 'mei', '2000000', 'Kegiatan bertahap dari bulan Maret sampai bulan September 2024', NULL, NULL, NULL, '2024'),
	(67, 11, 'Meningkatkan kapasitas SDM yang kompeten dan profesional', 'PASCA-005', 'program', 'Jafung Dosen', 'Meningkatkan Kapasitas Dosen SPS', 'UTS', 'juni', '1550000', '', NULL, NULL, NULL, '2024'),
	(68, 11, 'Pendidikan yang merata dan berkualitas ', 'PASCA-006', 'program', 'SEMAI 8', 'bertambahnya publikasi ilmiah SPS melalui SEMAI.', 'UTS', 'juli', '1550000', '', NULL, NULL, NULL, '2024'),
	(69, 11, 'Membangun budaya continuous learning, knowledge development, dan knowledge sharing', 'PASCA-007', 'program', 'Program Penghargaan Dosen dan Mahasiswa (MI Award)', 'pemberian penghargaan kepada dosen dan mahasiswa yang berprestasi.', 'UTS', 'agustus', '1000000', 'Kegiatan dilaksanakan dibulan agustus dan desember 2024', NULL, NULL, NULL, '2024'),
	(70, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-008', 'pengadaan', 'Microphone Conference Tahap 2', '1 Microphone Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'agustus', '475000', '', NULL, NULL, NULL, '2024'),
	(71, 11, 'Pendidikan yang merata dan berkualitas ', 'PASCA-009', 'program', 'BIMTEK Penulisan Tugas Akhir dan penggunaan aplikasi menedelei periode Ganjil 2024/2025', 'mahasiswa pascasarjana mengetahui sistematika penulisan tugas akhir.', 'UTS', 'september', '1000000', '', NULL, NULL, NULL, '2024'),
	(72, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-010', 'pemeliharaan', 'Komputer', 'Untuk menunjang kelancaran proses administrasi SPS', 'UTS', 'september', '1000000', '', NULL, NULL, NULL, '2024'),
	(73, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-011', 'pemeliharaan', 'Printer', 'Untuk menunjang kelancaran proses administrasi SPS', 'UTS', 'oktober', '1000000', '', NULL, NULL, NULL, '2024'),
	(74, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-012', 'pengadaan', 'Speaker Aktif', 'Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'oktober', '800000', '', NULL, NULL, NULL, '2024'),
	(75, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-013', 'pengadaan', 'Headphone', '6 headphone Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'november', '1500000', '', NULL, NULL, NULL, '2024'),
	(76, 11, 'Pendidikan yang merata dan berkualitas ', 'PASCA-014', 'program', 'SEMAI 9', 'bertambahnya publikasi ilmiah SPS melalui SEMAI.', 'UTS', 'desember', '1550000', '', NULL, NULL, NULL, '2024'),
	(77, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-015', 'pengadaan', 'Microphone Conference Tahap 3', '2 Microphone Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'januari', '950000', '', NULL, NULL, NULL, '2024'),
	(78, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-016', 'pengadaan', 'Mixer Audio', 'Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'januari', '1500000', '', NULL, NULL, NULL, '2024'),
	(79, 11, 'Meningkatkan sarana dan prasarana pendukung akademik dan riset', 'PASCA-017', 'pengadaan', 'Microphone Conference Tahap 4', '2 Microphone Untuk menunjang kegiatan sidang tesis SPS', 'UTS', 'januari', '950000', '', NULL, NULL, NULL, '2024'),
	(80, 13, 'Meningkatkan Sarana dan prasarana pendukun akademik dan riset', 'FH-001', 'pengadaan', 'Sound system portable', 'pembelian 1 buah sound sistem portabel  ', 'UTS', 'april', '2000000', '', NULL, NULL, NULL, '2024'),
	(81, 13, 'Riset dan inovasi yang unggul dan kontributif', 'FH-002', 'program', 'Hibah Subsidi Publikasi pada jurnal terakreditasi SINTA', 'memberikan bantuan biaya publikasi hasil penelitian kepada dosen yang bisa mempublikasikan tulisannya pada jurnal nasional terakreditasi SINTA', 'UTS', 'april', '1340000', 'kegiatan bertahap dari bulan April 2024 s/d Februari 2025', NULL, NULL, NULL, '2024'),
	(82, 13, 'Pendidikan yang merata dan berkualitas', 'FH-003', 'program', 'Dosen Praktisi Prodi Ilmu Hukum periode Genap 2023/2024', 'Mendatangkan seseorang yang memiliki pengalaman di lapangan/praktisi dalam bidang hukum dan kemudian berbagi ilmu, pengalaman, dan keterampilannya kepada mahasiswa lewat kegiatan mengajar. ', 'UTS', 'mei', '500000', '', NULL, NULL, NULL, '2024'),
	(83, 13, 'Tata Kelola yang transparan dan akuntabel', 'FH-004', 'program', 'Penyusunan Rencana Strategi dan RJP/RJM', 'Membuat tim untuk menyusun Rencana Strategi dan Rencana Jangka Panjang /rencana jangka menengah. Dana akan digunakan untuk keperluan rapat-rapat tim dalam beberapa bulan proses penyusunan dokumen', 'UTS', 'mei', '500000', '', NULL, NULL, NULL, '2024'),
	(84, 13, 'Pendidikan yang merata dan berkualitas', 'FH-005', 'program', 'Bedah Buku ', 'kegiatan bedah buku Dosen FH yang diikuti oleh seluruh mahasiswa dan peserta umum ', 'Fleksibel', 'juni', '1000000', '', NULL, NULL, NULL, '2024'),
	(85, 13, 'Pendidikan yang merata dan berkualitas', 'FH-006', 'program', 'Sosialisasi MABA', 'Dosen, mahasiswa dan staf FH melakukan sosialisasi penerimaan mahasiswa baru ke sekolah dan desa ', 'Fleksibel', 'juli', '1300000', '', NULL, NULL, NULL, '2024'),
	(86, 13, 'Tata Kelola yang transparan dan akuntabel', 'FH-007', 'program', 'Penyusunan Rencana Induk Penelitian (RIP) dan Rencana Induk Pengabdian Masyarakat (RIPkM)', 'Membuat tim untuk menyusun Rencana Induk Penelitian (RIP) dan Rencana Induk Pengabdian kepada Masyarakat (PkM). Dana akan digunakan untuk keperluan rapat-rapat tim dalam beberapa bulan proses penyusunan dokumen', 'UTS', 'agustus', '500000', '', NULL, NULL, NULL, '2024'),
	(87, 13, 'Pendidikan yang merata dan berkualitas', 'FH-008', 'program', 'Program Pengembangan FH dan Prodi Ilmu Hukum', ' Rapat Rutin Fakultas Hukum dan Prodi IH ', 'UTS', 'september', '2000000', 'kegiatan bertahap dari bulan Agustus 2024 s/d Februari 2025', NULL, NULL, NULL, '2024'),
	(88, 13, 'Pendidikan yang merata dan berkualitas', 'FH-009', 'program', 'BIMTEK Tugas Akhir Periode Ganjil 2024/2025', 'Pemahaman Mahasiswa terkait dengan sistematika dan tata cara Pengajuan dan Penyusunan TA ', 'UTS', 'september', '500000', '', NULL, NULL, NULL, '2024'),
	(89, 13, 'Membangun continuous learning, knowledge development dan  knowledge sharing', 'FH-010', 'program', 'Pengembangan ORMAWA di Lingkungan FH', 'Program Pengembangan kegiatan 3 ORMAWA di Lingkungan FH yang terdiri dari BEM, DPM dan HIMA LSA ', 'UTS', 'oktober', '1340000', 'kegiatan bertahap dari bulan oktober 2024 s/d Februari 2025', NULL, NULL, NULL, '2024'),
	(90, 13, 'Pendidikan yang merata dan berkualitas', 'FH-011', 'program', 'Pemeliharaan dan Pengembangan Kerjasama Fakultas Untuk penyelenggaraan kegiatan akademik dalam rangka mendukung MBKM', 'melakukan kegiatan perjalanan dinas dalam rangka membangun kerjasama untuk melaksanakan kegiatan akademik, utamanya untuk keperluan penguatan pelaksanaan MBKM', 'Fleksibel', 'november', '2270000', 'kegiatan bertahap dari bulan Agustus 2024 s/d Februari 2025', NULL, NULL, NULL, '2024'),
	(91, 13, 'Pendidikan yang merata dan berkualitas', 'FH-012', 'program', 'Dosen Praktisi Prodi Ilmu Hukum periode Ganjil 2024/2025', 'Mendatangkan seseorang yang memiliki pengalaman di lapangan/praktisi dalam bidang hukum dan kemudian berbagi ilmu, pengalaman, dan keterampilannya kepada mahasiswa lewat kegiatan mengajar. ', 'UTS', 'desember', '500000', '', NULL, NULL, NULL, '2024'),
	(92, 13, 'Meningkatkan Sarana dan prasarana pendukun akademik dan riset', 'FH-013', 'pemeliharaan', 'komputer ', 'untuk menunjang kelancaran proses administrasi', 'UTS', 'januari', '500000', '', NULL, NULL, NULL, '2025'),
	(93, 13, 'Meningkatkan Sarana dan prasarana pendukun akademik dan riset', 'FH-014', 'pemeliharaan', 'printer', 'untuk menunjang kelancaran proses administrasi', 'UTS', 'januari', '500000', 'Dilakukan pada bulan Februari 2025 (tidak ada pilihan bulan Februari di waktu pelaksanaan)', NULL, NULL, NULL, '2025'),
	(94, 17, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FTLM-001', 'pengadaan', 'Pengadaan ATK Fakultas', 'Untuk menunjang kegiatan administarasi di tingkat fakultas, maka perlu adanya pengadaan kelengkapatan ATK dalam satu tahun kedepan.', 'UTS', 'april', '845000', '', NULL, NULL, NULL, '2024'),
	(95, 17, 'Terimplementasinya sistem penjaminan mutu internal', 'FTLM-002', 'program', 'Pendampingan kegiatan Asesmen AMI 1', 'Membersamai masing-masing program studi Ketika kegiatan asesmen AMI, kegiatan akan dilaksanakan 2x dalam setahun', 'UTS', 'april', '400000', '', NULL, NULL, NULL, '2024'),
	(96, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-003', 'pengadaan', 'Pembelian alat, maintainace dan bahan Laboratorium termin 1', 'Laboratorium menjadi salah satu penunjang kegiatan pendidikan dan penelitian, maka perlu didukung dengan kebutuhan alat dan bahan- bahan yang digunakan. Saat ini alat di laboratorium seperti furnace masih rusak yang perlu diperbaiki. lebih lanjut beberapa peralatan lain yang sudah rusak maupun bahan-bahan pendukung yang sudah habis. maka perlunya alokasi dana khusus untuk keperluan hal tersebut.', 'UTS', 'april', '1500000', '', NULL, NULL, NULL, '2024'),
	(97, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-004', 'pengadaan', 'Pengembangan Laboratorium Sipil tahap 1', 'Program Studi Teknik Sipil adalah program studi yang peminatnya setiap tahun selalu meningkat, dikarenakan tuntutan dunia infrastruktur yang selalu berkembang, sehingga lulusan teknik sipil dipaksa untuk memahami beberapa kosentrasi pada teknik sipil itu sendiri, salah satunya adalah tentang ilmu ukur tanah. untuk mencetak lulusan yang paham tentang ilmu tersebut, maka Teknik Sipil UTS mau tidak mau harus mempersiapkan semua sarana dan prasarana yang mendukung itu semua, salah satu alat yang mendukung itu adalah alat Total Station  yang kegunaannya untuk mengukur jarak dan sudut secara otomatis pada konstruksi bangunan sipil', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'april', '1100000', 'Pengadaan alat ukur tanah Total Station', NULL, NULL, NULL, '2024'),
	(98, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-005', 'program', 'Rapat Monitoring dan Evaluasi Program Studi', 'Kegiatan rapat Program Studi merupakan kegiatan rutin yang dilaksanakan setiap 2/3 bulan sekali menyesuaikan dengan jadwal perkuliahan TA Ganjil/TA Genap. Kegiatan ini dimaksudkan untuk mendukung upaya pencapaian sasaran strategis universitas dalam menciptakan tata kelola yang transparan dan akuntabel. Agenda rapat membahas terkait perencanaan program kerja, progres program kerja, hingga evaluasi terhadap perencanaan dan pelaksanaan tri dharma.', 'UTS', 'april', '500000', 'Program Kerja (Perencanaan, Monitoring, dan Evaluasi) Kegiatan diadakan 4 kali pada bulan April, Juli, September, November', NULL, NULL, NULL, '2024'),
	(99, 17, 'Mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-006', 'program', 'Mine Talk', 'Kuliah umum adalah penyampaian suatu materi oleh ilmuwan, pakar, praktisi, pejabat negara, guru besar dan penguasaha yang dihadiri oleh mahasiswa untuk meningkatkan pengetahuan mahasiswa terutama dalam bidang pertambangan', 'STP', 'april', '400000', '', NULL, NULL, NULL, '2024'),
	(100, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-007', 'program', 'Rapat Rutin Prodi dan Peningkatan kerjasama', 'Rapat Program Studi merupakan kegiatan rutin yang dilaksanakan setiap 2 bulan sekali. Pada rapat ini dibahas mulai dari perencanaan proker, progres proker hingga evaluasi terhadap kegiatan yang sudah berjalan. pada program ini juga akan dilakukan inisiasi peningkatan kerjasama baik skala nasional maupum wilayah. kegiatan ini diselenggarakan untuk mempersiapkan wadah buat mahasiswa mengikuti program MBKM.', 'UTS', 'mei', '1750000', '', NULL, NULL, NULL, '2024'),
	(101, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-008', 'program', 'Keanggotaan Asosiasi Program Studi Teknik Sipil', 'Untuk meningkatkan program studi di kancah nasional dan sebagai pengenalan program studi teknik sipil dengan lainnya', 'BMPTTSSI', 'mei', '500000', 'Perpanjang Keanggotaan sebagai Anggota Aktif Asosiasi BMPTTSSI Indonesia', NULL, NULL, NULL, '2024'),
	(102, 17, 'Mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-009', 'program', 'Berape Maras Sesi Sipil', 'FTLM Barape maras sesi metalurgi salah satu wadah sharing season untuk meningkatkan pengetahuan bagi mahasiwa/i dan dosen di lingkungan Fakultas Teknologi Lingkungan dan Mineral. Kegiatan ini akan mengundang pemateri dari luar seperti alumni dan rekan mitra yang sudah ada. ', 'UTS', 'mei', '400000', 'Acara Kuliah Umum Berape Maras', NULL, NULL, NULL, '2024'),
	(103, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-010', 'pengadaan', 'Pengembangan Lab 1-  
Pembelian GPS (Termin 1)', 'mengoperasikan alat survey dasar untuk melakukan kegiatan eksplorasi sederhana', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'mei', '2000000', '', NULL, NULL, NULL, '2024'),
	(104, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-011', 'pengadaan', 'Pembelian alat, maintainace dan bahan Laboratorium termin 2', 'Laboratorium menjadi salah satu penunjang kegiatan pendidikan dan penelitian, maka perlu didukung dengan kebutuhan alat dan bahan- bahan yang digunakan. Saat ini alat di laboratorium seperti furnace masih rusak yang perlu diperbaiki. lebih lanjut beberapa peralatan lain yang sudah rusak maupun bahan-bahan pendukung yang sudah habis. maka perlunya alokasi dana khusus untuk keperluan hal tersebut.', 'UTS', 'juni', '1000000', '', NULL, NULL, NULL, '2024'),
	(105, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-012', 'pengadaan', 'Iuran Rutin asosiasi Prodi', 'Perkumpulan perguruan tinggi Teknik Metalurgi Nasional dibentuk dalam Asosiasi  Badan Kerjasama Pendidikan Metalurgi dan Material. Asosiasi ini sudah lama dideklarasikan dan terdiri dari 7 kampus ternama di indonesia. Teknik Metalurgi UTS sudah bergabung dan mengikuti kegiatan-kegiatan yang sudah diselenggarakana oleh BKPMM.', 'UTS', 'juni', '1000000', '', NULL, NULL, NULL, '2024'),
	(106, 17, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-013', 'program', 'Berape Maras sesi Metalurgi', 'FTLM Barape maras sesi metalurgi salah satu wadah sharing season untuk meningkatkan pengetahuan bagi mahasiwa/i dan dosen di lingkun Fakulutas Teknologi Lingkungan dan Mineral. Kegiatan ini akan mengundang pemateri dari luar seperti alumni dan rekan mitra yang sudah ada. 
', 'UTS', 'juni', '400000', '', NULL, NULL, NULL, '2024'),
	(107, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-014', 'program', 'Rapat rutin Program Studi Setiap sebulan Sekali', 'Pelaksanaan diskusi pada Program Studi Teknik Sipil perlu diadakan secara rutin karena berkaitan dengan pelaksanaan kegiatan tridharma dan evaluasi di Program Studi Teknik Sipil', 'Ruang Rapat Sipil, UTS', 'juni', '700000', 'Rapat Rutin Program studi teknik sipil (dilaksanakan 2x)', NULL, NULL, NULL, '2024'),
	(108, 17, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-015', 'program', 'Seminar Nasional ', 'Kegiatan ini dimaksudkan agar organisasi mahasiswa Teknik Lingkungan memiliki pengalaman dalam mengelola suatu kegiatan profesional dalam bentuk seminar secara hybrid (online/offline). Selain itu, kegiatan tersebut bermanfaat bagi mahasiswa dan dosen untuk mendapatkan keilmuan, pengetahuan, informasi dari berbagai ahli dalam hal rekayasa dan teknologi lingkungan untuk mengelola lingkungan', 'Ruang Pertemuan di Sumbawa', 'juni', '1000000', '', NULL, NULL, NULL, '2024'),
	(109, 17, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-016', 'program', 'Peningkatan Prestasi dan 
Pengembangan Mahasiswa', 'Kegiatan ini  berisi pembinaan untuk peningkatan pengetahuan akademik dan non-akademik mahasiswa sehingga bisa berpatisipasi dalam lomba nasional.', 'UTS', 'juni', '1000000', '', NULL, NULL, NULL, '2024'),
	(110, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-017', 'program', 'Anggota Badan Kerja Sama Perguruan Penyelenggara Pendidikan Tinggi Teknik Lingkungan (BAKERMA-TL)', 'Program ini dimaksudkan agar Prodi Teknik Lingkungan selalu mengikuti perkembangan, informasi, arahan, dan masukan dari Asosiasi Program Studi Teknik Lingkungan Se Indonesia. Selain itu, keuntungan menjadi anggota asosiasi adalah jaringan yang semakin luas pada prodi sejenis di kancah nasional sehingga mampu turut serta mewujudkan Sumber Daya Manusia yang kompeten dan profesional.', 'Online', 'juli', '1000000', '', NULL, NULL, NULL, '2024'),
	(111, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-018', 'pengadaan', 'Pengembangan Lab 1-  
Pembelian GPS (Termin 2)', 'Mampu mengoperasikan alat survey dasar untuk melakukan kegiatan eksplorasi sederhana', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'juli', '1000000', '', NULL, NULL, NULL, '2024'),
	(112, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-019', 'pengadaan', 'Pengembangan Lab 3- 
Etalase Lab
', 'Etalase lab. akan digunakan untuk menyimpan laporan praktikum, sampel batuan dan alat-alat laboratorioum sehingga menjadi lebih rapi dan tertata', 'Lab. Teknik Pertambangan', 'juli', '3000000', '', NULL, NULL, NULL, '2024'),
	(113, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-020', 'pengadaan', 'Pengembangan Lab.4 
- Pengadaan Peta Geologi 
Regional', 'Pengadaan peta geologi regional bertujuan sebagai sarana yang akan digunakan sebagai  bahan acuan dan pembelajaran untuk melakukan interpretasi litologi dan potensi bahan galian', 'Tokopedia; Toko Geologist', 'juli', '300000', '', NULL, NULL, NULL, '2024'),
	(114, 17, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat/industri per prodi
', 'FTLM-021', 'program', 'Coaching Clinic Proposal', 'Kegiatan pendampingan penulisan proposal yang mengundang pemateri ', 'UTS', 'agustus', '1000000', '', NULL, NULL, NULL, '2024'),
	(115, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-022', 'pengadaan', 'Pembelian alat, maintainace dan bahan Laboratorium termin 3', 'Laboratorium menjadi salah satu penunjang kegiatan pendidikan dan penelitian, maka perlu didukung dengan kebutuhan alat dan bahan- bahan yang digunakan. Saat ini alat di laboratorium seperti furnace masih rusak yang perlu diperbaiki. lebih lanjut beberapa peralatan lain yang sudah rusak maupun bahan-bahan pendukung yang sudah habis. maka perlunya alokasi dana khusus untuk keperluan hal tersebut.', 'UTS', 'agustus', '1200000', '', NULL, NULL, NULL, '2024'),
	(116, 17, 'Tingkat pencapaian nilai-nilai universitas', 'FTLM-023', 'program', 'Osjur (Pespektal)', 'Pespektal merupakan kegiatan orientasi mahasiswa yang diselenggarakan setiap penerimaan mahasiswa baru. Kegiatan ini perlu dilakukan untuk membimbing mahasiswa/i baru supaya adaptif terhadap lingkungan kampus.', 'UTS', 'agustus', '750000', '', NULL, NULL, NULL, '2024'),
	(117, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-024', 'program', 'Rapat Rutin Prodi', 'Rapat Rutin Program Studi adalah rapat rutin yang dilakukan setiap hari Jumat minggu ketiga di setiap bulan. Agendanya terdiri dari evaluasi proses pembelajaran, pembahasan proker (perencanaan hingga evaluasi proker), perencanaan, pelaksanaan dan evaluasi program Tri Dharma', 'UTS', 'agustus', '850000', '', NULL, NULL, NULL, '2024'),
	(118, 17, 'Terimplementasinya sistem penjaminan mutu internal ', 'FTLM-025', 'program', 'Pembayaran Iuran Asosiasi', 'Untuk memenuhi syarat keanggotaan dalam asosiasi program studi, sebagai jembatan untuk berkomunikasi dengan seluruh prodi tambang se-Indonesia, termasuk menjalin kerja sama dengan prodi-prodi tersebut.', 'FORKOPINDO', 'agustus', '1000000', '', NULL, NULL, NULL, '2024'),
	(119, 17, 'Tingkat pencapaian nilai-nilai universitas', 'FTLM-026', 'program', 'Resfak', 'Luaran yang dihasilkan oleh dosen di lingkup FTLM perlu diberikan apresiasi setiap tahun dengan tujuan adanya motivasi dalam meningkatkan capain kinerja tridharma perguruan tinggi untuk tahun selanjutnya.', 'UTS', 'september', '380000', '', NULL, NULL, NULL, '2024'),
	(120, 17, 'Persentase persebaran geografis asal mahasiswa', 'FTLM-027', 'program', 'Quart Of Olympic', 'Salah satu bentuk pembinaan untuk peningkatan Sumber Daya Manusia  adalah dengan mengadakan berbagai kegiatan seperti  lomba di bidang pendidikan tingkat SMA/SMK sederajat. Dengan lomba tersebut diharapkan siswa SMA dapat meningkatkan kecintaan terhadap pendidikan terkhusus  bidang kimia, fisika, dan matematika. Atas pemikiran  tersebut maka BEM (Badan Eksekutif Mahasiswa) Fakultas Teknologi Lingkungan dan Mineral Universitas Teknologi Sumbawa termotivasi mengadakan kegiatan dalam bentuk olimpiade.
', 'Aula kantor Bupati', 'september', '1000000', '', NULL, NULL, NULL, '2024'),
	(121, 17, 'Persentase persebaran geografis asal mahasiswa', 'FTLM-028', 'program', 'MIC (Metalurgi Incubator Competition)', 'Kegiatan Metalurgi inkubator competition (MIC) merupakan kegiatan lomba tingkat SMA sepulau sumbawa dalam bidang metalurgi. Kegiatan ini akan menjadi kegiatan rutin prodi yang bertujuan menjaring siswa berprestasi , mempromosikan program studi dan memberikan beasiswa bagi pemenang kompetisi.', 'UTS', 'september', '2000000', '', NULL, NULL, NULL, '2024'),
	(122, 17, 'Persentase persebaran geografis asal mahasiswa', 'FTLM-029', 'program', 'Lomba Sipil', 'Mahasiswa mengikuti perlombaan baik perlombaan beton, jembatan, struktur gedung, jalan dalam bentuk maket maupun perancangan yang tujuannya adalah untuk memperkenalkan program studi teknik sipil UTS di kancah lokal maupun Nasional', 'UTS', 'september', '2000000', 'Lomba Sipil berupa Lomba Maket yang diadakan Sipil UTS dan KMS', NULL, NULL, NULL, '2024'),
	(123, 17, 'Mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-030', 'program', 'Berape Maras sesi Lingkungan', 'FTLM Barape maras sesi metalurgi salah satu wadah sharing season untuk meningkatkan pengetahuan bagi mahasiwa/i dan dosen di lingkungan Fakultas Teknologi Lingkungan dan Mineral. Kegiatan ini akan mengundang pemateri dari luar seperti alumni dan rekan mitra yang sudah ada. ', 'UTS', 'september', '400000', '', NULL, NULL, NULL, '2024'),
	(124, 17, 'Persentase dosen yang memiliki sertifikasi kompetensi/profesi yang diakui oleh industri dan dunia kerja', 'FTLM-031', 'program', 'KMTL Cup 1', 'Kegiatan ini dimaksudkan agar organisasi mahasiswa Teknik Lingkungan memiliki pengalaman dalam mengelola suatu kegiatan profesional dalam bentuk lomba secara hybrid offline. Kegaitan ini dapat meningkatkan citra organisasi KMTL dan Prodi di kancah lokal se Kabupaten Sumbawa serta menjadi daya tarik khusus bagi calon mahasiswa baru untuk bergabung Prodi.', 'Sumbawa', 'september', '1000000', '', NULL, NULL, NULL, '2024'),
	(125, 17, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FTLM-032', 'program', 'FTLM Mengabdi 2', 'Menjadi wadah bagi dosen dan mahasiswa untuk mengimplementasikan ilmu yang telah diperoleh baik dari bangku kuliah maupun hasil penelitian yang telah dilakukan kepada masyarakat', 'UTS', 'oktober', '500000', '', NULL, NULL, NULL, '2024'),
	(126, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-033', 'pengadaan', 'Pengembangan Laboratorium Sipil tahap 2', 'Program Studi Teknik Sipil adalah program studi yang peminatnya setiap tahun selalu meningkat, dikarenakan tuntutan dunia infrastruktur yang selalu berkembang, sehingga lulusan teknik sipil dipaksa untuk memahami beberapa kosentrasi pada teknik sipil itu sendiri, salah satunya adalah tentang ilmu ukur tanah. untuk mencetak lulusan yang paham tentang ilmu tersebut, maka Teknik Sipil UTS mau tidak mau harus mempersiapkan semua sarana dan prasarana yang mendukung itu semua, salah satu alat yang mendukung itu adalah alat Total Station  yang kegunaannya untuk mengukur jarak dan sudut secara otomatis pada konstruksi bangunan sipil', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'oktober', '3000000', 'Pengadaan alat ukur tanah Total Station', NULL, NULL, NULL, '2024'),
	(127, 17, 'Persentase persebaran geografis asal mahasiswa', 'FTLM-034', 'program', 'Acara Dies Natalis Teknik Sipil', 'Untuk membuat Teknik Sipil UTS selalu Solid, maka perlu dilakukannya pendekatan mahasiswa, Dosen dan Alumni untuk selalu terjalinnya keakraban disemua lini, sehingga teknik sipil selalu membuat acara setiap tahunnya yang dikemas dalam bentuk Dies Natalis Teknik Sipil UTS.', 'UTS', 'oktober', '500000', 'Acara Dies Natais Tahunan Teknik Sipil', NULL, NULL, NULL, '2024'),
	(128, 17, 'Persentase dosen yang memiliki sertifikasi kompetensi/profesi yang diakui oleh industri dan dunia kerja', 'FTLM-035', 'program', 'Kunjungan Industri', 'Kegiatan ini merupakan pengenalan bagi mahasiswa Teknik Lingkungan untuk mempersiapkan diri dalam menghadapi program Merdeka Belajar Kampus Merdeka (MBKM) khususnya skema magang. Bagi mahasiswa yang telah melewati MBKM, maka akan menjadi bekal yang baik untuk implementasi kegiatan praktik sebagai upaya pengaplikasian teori untuk memecahkan permasalahan lingkungan di dunia industri.', 'Perusahaan Mitra di Sumbawa', 'oktober', '1000000', '', NULL, NULL, NULL, '2024'),
	(129, 17, 'Tingkat pencapaian nilai-nilai universitas', 'FTLM-036', 'program', 'Sosialisasi dengan Orang Tua 
Mahasiswa Baru', 'Adalah kegiatan yang dilakukan untuk mengenalkan Prodi Teknik Pertambangan yang mencakup sistem perkuliahan, prospek kerja hingga ORMAWA yang bernaung di bawah Prodi Teknik Pertambangan', 'STP', 'oktober', '1000000', '', NULL, NULL, NULL, '2024'),
	(130, 17, 'Mahasiswa yang mendapatkan prestasi minimal nasional', 'FTLM-037', 'program', 'Kuliah Umum Metalurgi', 'FTLM Barape maras sesi metalurgi salah satu wadah sharing season untuk meningkatkan pengetahuan bagi mahasiwa/i dan dosen di lingkungan Fakultas Teknologi Lingkungan dan Mineral. Kegiatan ini akan mengundang pemateri dari luar seperti alumni dan rekan mitra yang sudah ada. ', 'UTS', 'november', '1000000', '', NULL, NULL, NULL, '2024'),
	(131, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-038', 'pengadaan', 'Pengembangan Laboratorium Sipil tahap 3', 'Program Studi Teknik Sipil adalah program studi yang peminatnya setiap tahun selalu meningkat, dikarenakan tuntutan dunia infrastruktur yang selalu berkembang, sehingga lulusan teknik sipil dipaksa untuk memahami beberapa kosentrasi pada teknik sipil itu sendiri, salah satunya adalah tentang ilmu ukur tanah. untuk mencetak lulusan yang paham tentang ilmu tersebut, maka Teknik Sipil UTS mau tidak mau harus mempersiapkan semua sarana dan prasarana yang mendukung itu semua, salah satu alat yang mendukung itu adalah alat Total Station  yang kegunaannya untuk mengukur jarak dan sudut secara otomatis pada konstruksi bangunan sipil', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'november', '2000000', 'Pengadaan alat ukur tanah Total Station', NULL, NULL, NULL, '2024'),
	(132, 17, 'Tingkat pencapaian nilai-nilai universitas', 'FTLM-039', 'program', 'Pengembangan ORMAWA
 (PERMATA)', 'Adalah anggaran yang diberikan kepada organisasi kemahasiswaan untuk melakukan kegiatan seperti  rapat, pelaksanaan program kerja dan pengadaan inventaris', 'UTS', 'november', '1000000', '', NULL, NULL, NULL, '2024'),
	(133, 17, 'Persentase persebaran geografis asal mahasiswa', 'FTLM-040', 'program', 'Dies Natalis Prodi Teknik
Pertambangan', 'Untuk merayakan  HUT Teknik Pertambangan,  serta mengenalkan publik akan eksistensi Teknik Pertambangan Universitas Teknologi Sumbawa', 'UTS', 'november', '1500000', '', NULL, NULL, NULL, '2024'),
	(134, 17, 'Peringkat SIMKATMAWA', 'FTLM-041', 'program', 'Sosialisasi dan pelatihan Pembuatan Proposal PKM', 'Program Kreativitas Mahasiswa (PKM) merupakan Kegiatan untuk mengasah kreativitas, menuangkan ide kreatif dalam bentuk proposal. Untuk meningkatkan jumlah proposal yang lolos pendanaan dari semua program studi di Lingkup fakultas teknologi Lingkungan dan Mineral maka perlu dilakukan pelatihan pembuatan proposal PKM kepada mahasiswa.', 'UTS', 'desember', '1000000', '', NULL, NULL, NULL, '2024'),
	(135, 17, 'Peringkat SIMKATMAWA', 'FTLM-042', 'program', 'Seleksi ON MIPA (Matematika, Fisika dan Kimia) Tingkat Fakultas', 'Fakultas Teknologi Lingkungan dan Mineral memiliki 4 program studi yang memiliki penguasaan mata kuliah basic science/MIPA yang baik. Sehingga untuk meningkatkan kesiapan mahasiswa FTLM untuk mampu berkompetisi pada ajang ON-MIPA di tingkat Universitas hingga LLDIKTI perlu dilakukan pembimbingan dan seleksi tingkat fakultas dengan tujuan meningkatkan peluang lolos ON-MIPA tingakt Universitas.', 'UTS', 'desember', '1000000', '', NULL, NULL, NULL, '2024'),
	(136, 17, 'Terimplementasinya sistem penjaminan mutu internal', 'FTLM-043', 'program', 'Rapat Tinjauan Manajemen', 'Kegiatan rapat yang dilakukan setiap 1 tahun sekali dalam meninjau hasil Audit Mutu Internal 4 Program studi
', 'UTS', 'desember', '1000000', '', NULL, NULL, NULL, '2024'),
	(137, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-044', 'pengadaan', 'Pengembangan Laboratorium Sipil tahap 4', 'Program Studi Teknik Sipil adalah program studi yang peminatnya setiap tahun selalu meningkat, dikarenakan tuntutan dunia infrastruktur yang selalu berkembang, sehingga lulusan teknik sipil dipaksa untuk memahami beberapa kosentrasi pada teknik sipil itu sendiri, salah satunya adalah tentang ilmu ukur tanah. untuk mencetak lulusan yang paham tentang ilmu tersebut, maka Teknik Sipil UTS mau tidak mau harus mempersiapkan semua sarana dan prasarana yang mendukung itu semua, salah satu alat yang mendukung itu adalah alat Total Station  yang kegunaannya untuk mengukur jarak dan sudut secara otomatis pada konstruksi bangunan sipil', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'desember', '1000000', 'Pengadaan alat ukur tanah Total Station', NULL, NULL, NULL, '2024'),
	(138, 17, 'Persentase mata kuliah yang menggunakan metode
pembelajaran pemecahan kasus (case method) atau
pembelajaran kelompok berbasis proyek (team
based project) sebagai sebagian bobot evaluasi', 'FTLM-045', 'program', 'Musyawarah Nasional BAKERMA-TL', 'Program ini dimaksudkan agar Prodi Teknik Lingkungan selalu mengikuti perkembangan, informasi, arahan, dan masukan dari Asosiasi Program Studi Teknik Lingkungan Se Indonesia. Selain itu, keuntungan menjadi anggota asosiasi adalah jaringan yang semakin luas pada prodi sejenis di kancah nasional sehingga mampu turut serta mewujudkan Sumber Daya Manusia yang kompeten dan profesional.', 'Malang, Jawa Timur', 'desember', '1500000', '', NULL, NULL, NULL, '2024'),
	(139, 17, 'Peringkat SIMKATMAWA', 'FTLM-046', 'program', 'Pemilihan Mahasiswa Berprestasi (MAWAPRES) Tingkat Fakultas', 'Pemilihan Mahasiswa Berprestasi merupakan ajang yang dilaksankan satu kali dalam setahun oleh Puspresnas (Februari - Juli). Sehingga perlu adanya penjaringan dan seleksi yang ketat di tingkat program studi dan fakultas. Untuk menghasilkan mawapres yang berkompten dan mampu bersaing di tingkat Universitas hingga LLDIKTI, maka perlu dilakukan seleksi tingkat Fakultas.', 'UTS', 'januari', '550000', '', NULL, NULL, NULL, '2025'),
	(140, 17, 'Tingkat pencapaian nilai-nilai universitas', 'FTLM-047', 'program', 'Pembinaan DUTA Mahasiswa', 'Pemilihan Duta Mahasiswa tingkat universitas merupakan kegiatan rutin yang dilaksanakan oleh universitas. Sehingga perlu adanya kesiapan peserta/finalis dari Fakultas Teknologi Lingkungan dan Mineral. Untuk memaksimalkan persiapan Finalis FTLM perlu adanya coaching tingkat fakultas', 'UTS', 'januari', '200000', '', NULL, NULL, NULL, '2025'),
	(141, 17, 'Terimplementasinya sistem penjaminan mutu internal', 'FTLM-048', 'program', 'Pendampingan kegiatan Asesmen AMI 2', 'Membersamai masing-masing program studi Ketika kegiatan asesmen AMI, kegiatan akan dilaksanakan 2x dalam setahun', 'UTS', 'januari', '400000', '', NULL, NULL, NULL, '2025'),
	(142, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-049', 'pengadaan', 'Pengembangan Laboratorium Sipil tahap 5', 'Program Studi Teknik Sipil adalah program studi yang peminatnya setiap tahun selalu meningkat, dikarenakan tuntutan dunia infrastruktur yang selalu berkembang, sehingga lulusan teknik sipil dipaksa untuk memahami beberapa kosentrasi pada teknik sipil itu sendiri, salah satunya adalah tentang ilmu ukur tanah. untuk mencetak lulusan yang paham tentang ilmu tersebut, maka Teknik Sipil UTS mau tidak mau harus mempersiapkan semua sarana dan prasarana yang mendukung itu semua, salah satu alat yang mendukung itu adalah alat Total Station  yang kegunaannya untuk mengukur jarak dan sudut secara otomatis pada konstruksi bangunan sipil', 'PT. ARTHA GRAHA PYRAMIDA, BANDUNG', 'januari', '3000000', 'Pengadaan alat ukur tanah Total Station', NULL, NULL, NULL, '2025'),
	(143, 17, 'Persentase pemenuhan kebutuhan dasar sarana laboratorium secara mandiri', 'FTLM-050', 'pengadaan', 'Pengembangan Lab 2 - 
Pembelian Palu Kompas 
Geologi
', 'Mampu penggunakan alat survey dasar seperti  kompas  dan palu geologi, serta dapat  membuat pencatatan lapangan yang baik', 'Tokopedia; Toko Geologist', 'januari', '1500000', '', NULL, NULL, NULL, '2025'),
	(144, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-001', 'program', 'Bantuan stimulus kegiatan mahasiswa dan organisasi mahasiswa di lingkungan FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & mungkin tempat lain', 'april', '4100000', '', NULL, NULL, NULL, '2024'),
	(145, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-002', 'program', 'Bantuan stimulus kegiatan mahasiswa dan organisasi mahasiswa di lingkungan FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & mungkin tempat lain', 'mei', '2620000', '', NULL, NULL, NULL, '2024'),
	(146, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-003', 'pengadaan', 'Pemenuhan kebutuhan administrasi FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'mei', '1480000', '', NULL, NULL, NULL, '2024'),
	(147, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-004', 'pengadaan', 'Pemenuhan kebutuhan administrasi FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'juni', '760000', '', NULL, NULL, NULL, '2024'),
	(148, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-005', 'pengadaan', 'Pemenuhan kebutuhan Laboratorium FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'juni', '3340000', '', NULL, NULL, NULL, '2024'),
	(149, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-006', 'pengadaan', 'Pemenuhan kebutuhan Laboratorium FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'juli', '3380000', '', NULL, NULL, NULL, '2024'),
	(150, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-007', 'pengadaan', 'Pemenuhan kebutuhan rumah tangga FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'juli', '720000', '', NULL, NULL, NULL, '2024'),
	(151, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-008', 'pemeliharaan', 'Pemenuhan kebutuhan rumah tangga FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS', 'agustus', '1520000', '', NULL, NULL, NULL, '2024'),
	(152, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-009', 'program', 'Penerimaan mahasiswa baru (PMB) FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & tujuan sosialisasi PMB FITH 2024', 'agustus', '2580000', '', NULL, NULL, NULL, '2024'),
	(153, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-010', 'program', 'Penerimaan mahasiswa baru (PMB) FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & tujuan sosialisasi PMB FITH 2024', 'september', '4140000', '', NULL, NULL, NULL, '2024'),
	(154, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-011', 'program', 'Peningkatan kualitas SDM FITH (1)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & mungkin tempat lain', 'oktober', '4100000', '', NULL, NULL, NULL, '2024'),
	(155, 19, '- Tingkat pencapaian nilai-nilai universitas
- Terimplementasinya sistem penilaian kinerja', 'FITH-012', 'program', 'Peningkatan kualitas SDM FITH (2)', 'Pemberian bantuan stimulus dana untuk menginisiasi dan meningkatkan kegiatan mahasiswa', 'UTS & mungkin tempat lain', 'november', '2620000', '', NULL, NULL, NULL, '2024'),
	(156, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-013', 'pengembangan', 'Inisiasi dan stimulus implementasi kerjasama FITH dengan mitra', 'Inisiasi dan stimulus implementasi kerjasama FITH dengan mitra dalam bentuk kunjungan ke tempat mitra, hosting mitra, dukungan kegiatan kerjasama dengan mitra, dll', 'UTS & tempat mitra FITH 2024', 'november', '1240000', 'Kegiatan ini sejatinya berjangka panjang bahkan hingga akhir masa anggaran 2024, disesuaikan dengan kebutuhan', NULL, NULL, NULL, '2024'),
	(157, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-014', 'program', 'Peningkatan mutu dan kualitas pelaksanaan Tridarma Perguruan Tinggi (1)', 'Inisiasi dan stimulus implementasi kerjasama FITH dengan mitra dalam bentuk kunjungan ke tempat mitra, hosting mitra, dukungan kegiatan kerjasama dengan mitra, dll', 'UTS', 'november', '240000', '', NULL, NULL, NULL, '2024'),
	(158, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-015', 'program', 'Peningkatan mutu dan kualitas pelaksanaan Tridarma Perguruan Tinggi (2)', 'Inisiasi dan stimulus implementasi kerjasama FITH dengan mitra dalam bentuk kunjungan ke tempat mitra, hosting mitra, dukungan kegiatan kerjasama dengan mitra, dll', 'UTS', 'desember', '4100000', '', NULL, NULL, NULL, '2024'),
	(159, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-016', 'program', 'Peningkatan mutu dan kualitas pelaksanaan Tridarma Perguruan Tinggi (3)', 'Inisiasi dan stimulus implementasi kerjasama FITH dengan mitra dalam bentuk kunjungan ke tempat mitra, hosting mitra, dukungan kegiatan kerjasama dengan mitra, dll', 'UTS', 'januari', '2380000', '', NULL, NULL, NULL, '2025'),
	(160, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-017', 'pengembangan', 'Pemberian stimulus keanggotaan Prodi di FITH dalam asosiasi Prodi-Prodi', 'Stimulus keanggotaan Prodi di FITH dalam asosiasi Prodi-Prodi (hal ini berguna terutama saat akreditasi prodi)', 'UTS & tempat mitra FITH 2024', 'januari', '1000000', '', NULL, NULL, NULL, '2025'),
	(161, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-018', 'program', 'Peningkatan sistem penjaminan mutu FITH (1)', 'Stimulus keanggotaan Prodi di FITH dalam asosiasi Prodi-Prodi (hal ini berguna terutama saat akreditasi prodi)', 'UTS', 'januari', '720000', '', NULL, NULL, NULL, '2025'),
	(162, 19, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FITH-019', 'program', 'Peningkatan sistem penjaminan mutu FITH (2)', 'Stimulus keanggotaan Prodi di FITH dalam asosiasi Prodi-Prodi (hal ini berguna terutama saat akreditasi prodi)', 'UTS', 'februari', '1520000', '', NULL, NULL, NULL, '2025'),
	(163, 19, '- Persentase sistem informasi yang terintegrasi', 'FITH-020', 'program', 'Peningkatan promosi FITH (1)', 'Peningkatan promosi FITH melalui peningkatan mutu dan kualitas website dan sosial media FITH, coaching clinic untuk tujuan tersebut, pembuatan flyer, baliho, poster serta profil fakultas dan prodi-prodi di FITH', 'UTS & tujuan promosi FITH 2024', 'februari', '720000', 'Kegiatan ini sejatinya berjangka panjang bahkan hingga akhir masa anggaran 2024, disesuaikan dengan kebutuhan', NULL, NULL, NULL, '2025'),
	(164, 19, '- Persentase sistem informasi yang terintegrasi', 'FITH-021', 'program', 'Peningkatan promosi FITH (2)', 'Peningkatan promosi FITH melalui peningkatan mutu dan kualitas website dan sosial media FITH, coaching clinic untuk tujuan tersebut, pembuatan flyer, baliho, poster serta profil fakultas dan prodi-prodi di FITH', 'UTS & tujuan promosi FITH 2024', 'februari', '1520000', 'Kegiatan ini sejatinya berjangka panjang bahkan hingga akhir masa anggaran 2024, disesuaikan dengan kebutuhan', NULL, NULL, NULL, '2025'),
	(165, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-001', 'program', 'FEB Mengabdi Termin 1', 'Memberikan dana stimulus untuk Pengabdian kepada Masyarakat dosen dan mahasiswa', 'UTS', 'april', '2000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(166, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-002', 'program', 'Legalisasi pusat studi', 'Legalisasi pusat Studi Manajemen MRI', 'UTS', 'april', '500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(167, 23, 'Jumlah program studi dengan akreditasi Baik Sekali', 'FEB-003', 'program', 'Asosiasi Prodi Termin 1', 'Membayar biaya keanggotaan prodi', 'UTS', 'april', '2700000', 'Universitas', NULL, NULL, NULL, '2024'),
	(168, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-004', 'program', 'Peningkatan kualitas jurnal: Pembayaran DOI', 'Membayar DOI', 'UTS', 'april', '2000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(169, 23, 'Jumlah program studi dengan akreditasi Baik Sekali', 'FEB-005', 'program', 'Pembentukan SPMI Fakultas', 'Penyesuaian SPMI Fakultas dengan Permendikbud No. 53 Tahun 2023', 'UTS', 'april', '500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(170, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-006', 'program', 'Pembuatan Buku Ajar Termin 1', 'Membayar biaya penerbitan buku ajar', 'UTS', 'mei', '2000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(171, 23, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FEB-007', 'program', 'Kunjungan kerjasama tridharma tingkat nasional dan internasional Termin 1', 'Melakukan kunjungan kerjasama (baru, perpanjangan) dan implementasinya', 'UTS', 'mei', '1000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(172, 23, 'Persentase dosen tetap yang berasal dari kalangan praktisi profesional, dunia industri, atau dunia kerja', 'FEB-008', 'program', 'Guest Lecture Termin 2', 'Mendatangkan dosen berskala nasional dan atau internasional untuk memberikan edukasi kepada mahasiswa dan dosen', 'UTS', 'mei', '2700000', 'Universitas', NULL, NULL, NULL, '2024'),
	(173, 23, 'Jumlah program studi dengan akreditasi Baik Sekali', 'FEB-009', 'program', 'Asosiasi Prodi Termin 2', 'Membayar biaya keanggotaan prodi', 'UTS', 'mei', '1600000', 'Universitas', NULL, NULL, NULL, '2024'),
	(174, 23, 'Persentase mahasiswa yang menghabiskan 20 SKS di luar kampus', 'FEB-010', 'program', 'Sharing Session: Self-development through flagship MBKM', 'Pemberian motivasi ke mahasiswa untuk aktif pada kegiatan flagship MBKM dan ISMA', 'UTS', 'mei', '500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(175, 23, 'Persentase dosen tetap yang berasal dari kalangan praktisi profesional, dunia industri, atau dunia kerja', 'FEB-011', 'program', 'Dosen Praktisi Termin 1', 'Pembelajaran di kelas diampu oleh praktisi dari DUDI', 'UTS', 'juni', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(176, 23, 'Terimplementasinya sistem penjaminan mutu internal', 'FEB-012', 'program', 'Rapat Internal Prodi', 'Koordinasi internal prodi', 'UTS', 'juni', '3000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(177, 23, 'Terimplementasinya sistem penjaminan mutu internal', 'FEB-013', 'program', 'Rapat Internal Fakultas', 'Koordinasi fakultas', 'UTS', 'juni', '1000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(178, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-014', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 1', 'Pengadaan ATK (Kertas, tinta printer, spidol, akun zoom penghapus dan Merchandise, ', 'UTS', 'juni', '750000', 'Universitas', NULL, NULL, NULL, '2024'),
	(179, 23, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FEB-015', 'program', 'Pendampingan intensif prestasi mahasiswa Termin 1', 'Membiayai Biaya keikutsertaan mahasiswa pada lomba tingkat nasional dan inetrnasional (akademik dan non akademik)', 'UTS', 'juni', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(180, 23, 'Persentase lulusan yang menjadi wiraswasta', 'FEB-016', 'program', 'Penyertaan Modal Mahasiswa', 'Memberikan dana stimulus untuk usaha mahasiswa', 'UTS', 'juli', '3000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(181, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-017', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 2', 'Pengadaan ATK (Kertas, tinta printer, spidol, akun zoom penghapus dan Merchandise, ', 'UTS', 'juli', '750000', 'Universitas', NULL, NULL, NULL, '2024'),
	(182, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-018', 'program', 'Subsidi Publikasi Scopus, S1 & S2 Termin 1', 'Memberikan subsidi publikasi dosen di Jurnal Sinta 1, 2 dan Scopus', 'UTS', 'juli', '4000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(183, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-019', 'program', 'FEB Mengabdi Termin 2', 'Memberikan dana stimulus untuk Pengabdian kepada Masyarakat dosen dan mahasiswa', 'UTS', 'agustus', '2000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(184, 23, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FEB-020', 'program', 'Kunjungan kerjasama tridharma tingkat nasional dan internasional Termin 3', 'Melakukan kunjungan kerjasama (baru, perpanjangan) dan implementasinya', 'UTS', 'agustus', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(185, 23, 'Persentase persebaran geografis asal mahasiswa', 'FEB-021', 'program', 'Digi-Talk', 'Memberikan edukasi kepada masyarakat tentang konten digital bisnis', 'UTS', 'agustus', '500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(186, 23, 'Jumlah program studi dengan akreditasi Baik Sekali', 'FEB-022', 'program', 'Asosiasi Prodi Termin 3', 'Membayar biaya keanggotaan prodi', 'UTS', 'agustus', '2200000', 'Universitas', NULL, NULL, NULL, '2024'),
	(187, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-023', 'program', 'Konferensi Internasional dan atau nasional Termin 1', 'Subsidi biaya pendaftaran konferensi mahasiswa dan dosen', 'UTS', 'agustus', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(188, 23, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FEB-024', 'program', 'Kunjungan kerjasama tridharma tingkat nasional dan internasional Termin 2', 'Melakukan kunjungan kerjasama (baru, perpanjangan) dan implementasinya', 'UTS', 'september', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(189, 23, 'Jumlah program studi dengan akreditasi Baik Sekali', 'FEB-025', 'program', 'Asosiasi Prodi Termin 4', 'Membayar biaya keanggotaan prodi', 'UTS', 'september', '1800000', 'Universitas', NULL, NULL, NULL, '2024'),
	(190, 23, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FEB-026', 'program', 'Penyertaan Modal Organisasi Mahasiswa', 'Dana stimulus untuk Ormawa', 'UTS', 'september', '4500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(191, 23, 'Persentase persebaran geografis asal mahasiswa', 'FEB-027', 'program', 'Pre-U (Pre University) Termin 1', 'Memberikan kesempatan kepada siswa kelas XI untuk belajar menjadi mahasiswa di Prodi Manajemen', 'UTS', 'oktober', '1000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(192, 23, 'Persentase dosen tetap yang berasal dari kalangan praktisi profesional, dunia industri, atau dunia kerja', 'FEB-028', 'program', 'Dosen Praktisi Termin 2', 'Pembelajaran di kelas diampu oleh praktisi dari DUDI', 'UTS', 'oktober', '1500000', 'Universitas', NULL, NULL, NULL, '2024'),
	(193, 23, 'Persentase dosen tetap yang berasal dari kalangan praktisi profesional, dunia industri, atau dunia kerja', 'FEB-029', 'program', 'Guest Lecture Termin 1', 'Mendatangkan dosen berskala nasional dan atau internasional untuk memberikan edukasi kepada mahasiswa dan dosen', 'UTS', 'oktober', '2700000', 'Universitas', NULL, NULL, NULL, '2024'),
	(194, 23, 'Persentase mata kuliah yang 
menggunakan metode pembelajaran 
pemecahan kasus (case method) atau 
pembelajaran kelompok berbasis 
proyek (team based project) sebagai 
sebagian bobot evaluasi. ', 'FEB-030', 'program', 'Company visit Internasional', 'Kegiatan kunjungan ke Universitas Brawijaya, Universitas Airlangga, Universitas dan industri di Malaysia dan Thailand', 'Jawa Timur, Malaysia & Thailand', 'oktober', '2000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(195, 23, 'Persentase persebaran geografis asal mahasiswa', 'FEB-031', 'program', 'Economic and business week competition', 'Mengadakan lomba untuk promosi prodi', 'UTS', 'november', '7000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(196, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-032', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 3', 'Pengadaan ATK (Kertas, tinta printer, spidol, penghapus, akun zoom, dan Merchandise ', 'UTS', 'november', '800000', 'Universitas', NULL, NULL, NULL, '2024'),
	(197, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-033', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 4', 'Pengadaan ATK (Kertas, tinta printer, spidol, penghapus, akun zoom, dan Merchandise ', 'UTS', 'desember', '750000', 'Universitas', NULL, NULL, NULL, '2024'),
	(198, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-034', 'program', 'Subsidi Publikasi Scopus, S1 & S2 Termin 2', 'Memberikan subsidi publikasi dosen di Jurnal Sinta 1, 2 dan Scopus', 'UTS', 'desember', '4000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(199, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-035', 'program', 'Peningkatan luaran pengabdian dosen (Subsidi HKI dan Jurnal Pengabdian)', 'Memberikan subsidi untuk pembayaran luaran pengabdian (Jurnal pengabdian, HKI, ISBN)', 'UTS', 'desember', '3000000', 'Universitas', NULL, NULL, NULL, '2024'),
	(200, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-036', 'program', 'Pembuatan Buku Ajar Termin 2', 'Membayar biaya penerbitan buku ajar', 'UTS', 'januari', '2000000', 'Universitas', NULL, NULL, NULL, '2025'),
	(201, 23, 'Persentase persebaran geografis asal mahasiswa', 'FEB-037', 'program', 'Pre-U (Pre University) Termin 2', 'Memberikan kesempatan kepada siswa kelas XI untuk belajar menjadi mahasiswa di Prodi Bisnis Digital dan Kewirausahaan', 'UTS', 'januari', '1000000', 'Universitas', NULL, NULL, NULL, '2025'),
	(202, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-038', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 5', 'Pengadaan ATK (Kertas, tinta printer, spidol, penghapus, akun zoom, dan Merchandise ', 'UTS', 'januari', '700000', 'Universitas', NULL, NULL, NULL, '2025'),
	(203, 23, 'Persentase mahasiswa yang mendapatkan prestasi minimal nasional', 'FEB-039', 'program', 'Pendampingan intensif prestasi mahasiswa Termin 2', 'Membiayai Biaya keikutsertaan mahasiswa pada lomba tingkat nasional dan inetrnasional (akademik dan non akademik)', 'UTS', 'januari', '1500000', 'Universitas', NULL, NULL, NULL, '2025'),
	(204, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-040', 'program', 'Konferensi Internasional dan atau nasional Termin 2', 'Subsidi biaya pendaftaran konferensi mahasiswa dan dosen', 'UTS', 'januari', '2500000', 'Universitas', NULL, NULL, NULL, '2025'),
	(205, 23, 'Jumlah keluaran penelitian dan pengabdian kepada masyarakat yang diimplementasikan oleh pemerintah/masyarakat /industri per dosen', 'FEB-041', 'program', 'FEB Mengabdi Termin 3', 'Memberikan dana stimulus untuk Pengabdian kepada Masyarakat dosen dan mahasiswa', 'UTS', 'februari', '2000000', 'Universitas', NULL, NULL, NULL, '2025'),
	(206, 23, 'Persentase program studi yang melaksanakan kerjasama dengan mitra', 'FEB-042', 'program', 'Kunjungan kerjasama tridharma tingkat nasional dan internasional Termin 4', 'Melakukan kunjungan kerjasama (baru, perpanjangan) dan implementasinya', 'UTS', 'februari', '1000000', 'Universitas', NULL, NULL, NULL, '2025'),
	(207, 23, 'Persentase pemenuhan kebutuhan dasar sarana pembelajaran', 'FEB-043', 'pengadaan', 'Kerumahtanggan Fakultas dan Prodi Termin 6', 'Pengadaan ATK (Kertas, tinta printer, spidol, penghapus, akun zoom, dan Merchandise ', 'UTS', 'februari', '700000', 'Universitas', NULL, NULL, NULL, '2025'),
	(208, 23, 'Persentase jumlah penelitian yang melibatkan mahasiswa', 'FEB-044', 'program', 'Subsidi Publikasi Scopus, S1 & S2 Termin 3', 'Memberikan subsidi publikasi dosen di Jurnal Sinta 1, 2 dan Scopus', 'UTS', 'februari', '4000000', 'Universitas', NULL, NULL, NULL, '2025');
/*!40000 ALTER TABLE ppufs ENABLE KEYS */;

-- Dumping structure for table database.pulse_aggregates
CREATE TABLE IF NOT EXISTS pulse_aggregates (id integer primary key autoincrement not null, bucket integer not null, period integer not null, type varchar not null, key text not null, key_hash varchar not null, aggregate varchar not null, value numeric not null, count integer);

-- Dumping data for table database.pulse_aggregates: 291 rows
DELETE FROM pulse_aggregates;
/*!40000 ALTER TABLE pulse_aggregates DISABLE KEYS */;
/*!40000 ALTER TABLE pulse_aggregates ENABLE KEYS */;

-- Dumping structure for table database.pulse_entries
CREATE TABLE IF NOT EXISTS pulse_entries (id integer primary key autoincrement not null, timestamp integer not null, type varchar not null, key text not null, key_hash varchar not null, value integer);

-- Dumping data for table database.pulse_entries: 549 rows
DELETE FROM pulse_entries;
/*!40000 ALTER TABLE pulse_entries DISABLE KEYS */;
/*!40000 ALTER TABLE pulse_entries ENABLE KEYS */;

-- Dumping structure for table database.pulse_values
CREATE TABLE IF NOT EXISTS pulse_values (id integer primary key autoincrement not null, timestamp integer not null, type varchar not null, key text not null, key_hash varchar not null, value text not null);

-- Dumping data for table database.pulse_values: 0 rows
DELETE FROM pulse_values;
/*!40000 ALTER TABLE pulse_values DISABLE KEYS */;
/*!40000 ALTER TABLE pulse_values ENABLE KEYS */;

-- Dumping structure for table database.roles
CREATE TABLE IF NOT EXISTS roles (id integer primary key autoincrement not null, role varchar not null, parent_id varchar not null, user_id integer, created_at datetime, updated_at datetime, deleted_at datetime, foreign key(user_id) references users(id) on delete set null on update cascade);

-- Dumping data for table database.roles: 32 rows
DELETE FROM roles;
/*!40000 ALTER TABLE roles DISABLE KEYS */;
INSERT INTO roles (id, role, parent_id, user_id, created_at, updated_at, deleted_at) VALUES
	(1, 'Super Admin', '', 1, '2024-03-15 19:59:08', NULL, NULL),
	(2, 'SUBDIR LPJ dan Monev', '1', NULL, '2024-03-15 19:37:19', '2024-03-17 01:31:14', NULL),
	(3, 'SUBDIR Bendahara/Pencairan', '2', NULL, '2024-03-15 20:09:51', '2024-03-17 01:31:40', NULL),
	(4, 'Rektor', '3', 32, '2024-03-17 13:06:30', '2024-04-17 07:52:56', NULL),
	(5, 'Warek II Keuangan', '4', 29, '2024-03-17 01:32:47', '2024-04-17 07:52:11', NULL),
	(6, 'Direktorat Keuangan', '5', 26, '2024-03-17 01:33:05', '2024-04-17 07:51:51', NULL),
	(10, 'Sekolah Pascasarjana', '6', 4, '2024-04-17 06:03:15', '2024-04-17 06:03:15', NULL),
	(11, 'Wakil Direktur Sekolah Pascasarjana', '10', 5, '2024-04-17 06:03:47', '2024-04-17 06:03:47', NULL),
	(12, 'Fakultas Hukum', '6', 6, '2024-04-17 06:05:17', '2024-04-17 06:05:17', NULL),
	(13, 'Wadek Fakultas Hukum', '12', 7, '2024-04-17 06:05:47', '2024-04-17 06:30:37', NULL),
	(14, 'Fakultas Rekayasa Sistem', '6', 8, '2024-04-17 06:06:13', '2024-04-17 06:06:13', NULL),
	(15, 'Wadek Fakultas Rekayasa Sistem', '14', 9, '2024-04-17 06:06:29', '2024-04-17 06:06:29', NULL),
	(16, 'Fakultas Teknologi Lingkungan dan Mineral', '6', 10, '2024-04-17 06:06:55', '2024-04-17 06:06:55', NULL),
	(17, 'Wadek Fakultas Teknologi Lingkungan dan Mineral', '16', 11, '2024-04-17 06:07:19', '2024-04-17 06:07:19', NULL),
	(18, 'Fakultas Ilmu dan Teknologi Hayati', '6', 12, '2024-04-17 06:07:49', '2024-04-17 06:07:49', NULL),
	(19, 'Wadek Fakultas Ilmu dan Teknologi Hayati', '18', 13, '2024-04-17 06:08:09', '2024-04-17 06:08:09', NULL),
	(20, 'Fakultas Ilmu dan Teknologi Pertanian', '6', 14, '2024-04-17 06:08:29', '2024-04-17 06:08:29', NULL),
	(21, 'Wadek Fakultas Ilmu dan Teknologi Pertanian', '20', 15, '2024-04-17 06:08:56', '2024-04-17 06:08:56', NULL),
	(22, 'Fakultas Ekonomi dan Bisnis', '6', 16, '2024-04-17 06:09:15', '2024-04-17 06:09:15', NULL),
	(23, 'Wadek Fakultas Ekonomi dan Bisnis', '22', 17, '2024-04-17 06:09:31', '2024-04-17 06:09:31', NULL),
	(24, 'Fakultas Psikologi dan Humaniora', '6', 18, '2024-04-17 06:09:54', '2024-04-17 06:09:54', NULL),
	(25, 'Wadek Fakultas Psikologi dan Humaniora', '24', 19, '2024-04-17 06:10:15', '2024-04-17 06:10:15', NULL),
	(26, 'BPMU', '6', 30, '2024-04-17 07:42:40', '2024-04-17 07:44:35', NULL),
	(27, 'Badan Penjamin Mutu Akademik', '26', 21, '2024-04-17 07:47:44', '2024-04-17 07:47:44', NULL),
	(28, 'Deputi Sistem Penjaminan Mutu Akademik', '26', 22, '2024-04-17 07:48:17', '2024-04-17 07:48:17', NULL),
	(29, 'Deputi Audit Mutu Akademik', '26', 23, '2024-04-17 07:48:30', '2024-04-17 07:48:30', NULL),
	(30, 'Warek I', '6', 24, '2024-04-17 07:49:00', '2024-04-17 07:49:00', NULL),
	(31, 'Direktorat Akademik', '30', 31, '2024-04-17 07:50:17', '2024-04-17 07:50:17', NULL),
	(32, 'Direktorat Sumber Daya Manusia', '30', 25, '2024-04-17 07:50:42', '2024-04-17 07:50:42', NULL),
	(33, 'Warek III', '6', 33, '2024-04-17 07:55:20', '2024-04-17 07:55:20', NULL),
	(34, 'Direktorat Pengabdian kepada Masyarakat dan Penerapan Riset', '33', 33, '2024-04-17 07:55:40', '2024-04-17 07:55:40', NULL),
	(35, 'Direktorat Riset, Publikasi, dan Inovasi', '33', 28, '2024-04-17 07:56:20', '2024-04-17 07:56:20', NULL);
/*!40000 ALTER TABLE roles ENABLE KEYS */;

-- Dumping structure for table database.sessions
CREATE TABLE IF NOT EXISTS sessions (id varchar not null, user_id integer, ip_address varchar, user_agent text, payload text not null, last_activity integer not null, primary key (id));

-- Dumping data for table database.sessions: 1 rows
DELETE FROM sessions;
/*!40000 ALTER TABLE sessions DISABLE KEYS */;
INSERT INTO sessions (id, user_id, ip_address, user_agent, payload, last_activity) VALUES
	('aMJzpldt66LnzAxPmaTuS6gJ7IrGmMo0b2VVWYqW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSUlQVll1dkdpUURhWUxRS3llMjlvcWdieHcyYnlOWFAxd3YxMW93WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yb2xlP3BhZ2U9MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1713340608);
/*!40000 ALTER TABLE sessions ENABLE KEYS */;

-- Dumping structure for table database.submissions
CREATE TABLE IF NOT EXISTS submissions (id integer primary key autoincrement not null, ppuf_id integer, role_id integer, iku1_id integer, iku2_id integer, iku3_id integer, background varchar not null, speaker varchar, participant varchar, rundown varchar, place varchar not null, vendor varchar, budget varchar not null, budget_detail text not null, approved_budget varchar default '0', report_file varchar, is_disbursement_complete tinyint(1) not null default '0', is_done tinyint(1) not null default '0', created_at datetime, updated_at datetime, deleted_at datetime, disbursement_period_id integer, foreign key(ppuf_id) references ppufs(id) on delete set null on update cascade, foreign key(role_id) references roles(id) on delete set null on update cascade, foreign key(iku1_id) references iku1(id) on delete set null on update cascade, foreign key(iku2_id) references iku2(id) on delete set null on update cascade, foreign key(iku3_id) references iku3(id) on delete set null on update cascade);

-- Dumping data for table database.submissions: 0 rows
DELETE FROM submissions;
/*!40000 ALTER TABLE submissions DISABLE KEYS */;
/*!40000 ALTER TABLE submissions ENABLE KEYS */;

-- Dumping structure for table database.submission_statuses
CREATE TABLE IF NOT EXISTS submission_statuses (id integer primary key autoincrement not null, role_id integer, submission_id integer, status tinyint(1) not null default '0', message text not null, created_at datetime, updated_at datetime, foreign key(role_id) references roles(id) on delete set null on update cascade, foreign key(submission_id) references submissions(id) on delete cascade on update cascade);

-- Dumping data for table database.submission_statuses: 0 rows
DELETE FROM submission_statuses;
/*!40000 ALTER TABLE submission_statuses DISABLE KEYS */;
/*!40000 ALTER TABLE submission_statuses ENABLE KEYS */;

-- Dumping structure for table database.users
CREATE TABLE IF NOT EXISTS users (id integer primary key autoincrement not null, name varchar not null, email varchar not null, password varchar, avatar varchar not null, whatsapp varchar, bank_name varchar, bank_account_number varchar, bank_account_name varchar, remember_token varchar, created_at datetime, updated_at datetime, deleted_at datetime);

-- Dumping data for table database.users: 33 rows
DELETE FROM users;
/*!40000 ALTER TABLE users DISABLE KEYS */;
INSERT INTO users (id, name, email, password, avatar, whatsapp, bank_name, bank_account_number, bank_account_name, remember_token, created_at, updated_at, deleted_at) VALUES
	(1, 'XCZ', 'xcz.ardiansyahputra2468@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL7oLP_ByMxC825XBJJ9c2PuaXLij3RsiO3m6HUIwzZaCI=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-15 11:59:03', '2024-03-15 11:59:03', NULL),
	(2, 'Ardiansyah Putra', 'ardiansyah.putra@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocLUv0ahovVt8oI6vtcqxZvPa91TTJj1qbLtIJXVwdMo=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-16 13:36:36', '2024-03-16 13:36:36', NULL),
	(3, 'xcz.a2rj', 'xcz.a2rj@gmail.com', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, '2024-03-16 13:38:08', '2024-03-16 13:38:08', NULL),
	(4, 'Dr. Ahmad Yamin, S.H.,M.H', 'ahmad.yamin@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(5, 'Dr. Umar, S.Pd.,M.Pd', 'umar@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(6, 'Dr. Supriyadi, SHI.,MHI', 'supriyadi@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(7, 'Geatriana Dewi, SH.,MH', 'geatriana.dewi@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(8, 'Mietra Anggara, M.T', 'mietra.anggara@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(9, 'Nora Dery Sofya, S.Kom.,M.M.Inov', 'nora.dery.sofya@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(10, 'Dedy Dharmawansyah, S.T., M.T.', 'dedy.dharmawansyah@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(11, 'Rita Desiasni, M.Sc. ', 'rita.desiasni@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(12, 'Maya Fitriana, S.Si., Ph.D', 'maya.fitrian@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(13, 'Riri Rimbun Anggih Chaidir, M.Sc', 'riri.rimbun@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(14, 'Sahri Yanti, P.hD', 'sahri.yanti@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 'Lalu Heri Rizaldi, S.TP., MT.', 'rizaldi@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 'Diah Anggeraini Hasri, M.Sc', 'feb@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 'Tomy Dwi Cahyono, S.Kom., M.M', 'wadek.feb@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(18, 'Ivon Arisanti Ph.D', 'ivon.arisanti@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 'Wiwik Surya Utami, S.S., M. Pd.   ', 'wiwik.surya.utami@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 'dsti@uts.ac.id', 'dsti@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 'Badan Penjamin Mutu Akademik', 'bpma@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(22, 'dspma@uts.ac.id', 'dspma@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(23, 'ami.bpma@uts.ac.id', 'ami.bpma@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(24, 'win.ariga@uts.ac.id', 'win.ariga@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, 'Direktorat Sumber Daya Manusia', 'psdm@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(26, 'Direktorat Keuangan', 'direktorat.keuangan@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, 'Direktorat Pengabdian kepada Masyarakat dan Penerapan Riset ', 'lppm@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 'Direktorat Riset, Publikasi, dan Inovasi', 'riset.inovasi@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 'Rusmin Nurjadin', 'rusmin.nurjadin@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(30, 'BPMU', 'bpmu@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 'Direktorat Akademik', 'direktorat.akademik@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(32, 'Rektor', 'rektor@uts.ac.id', NULL, 'https://lh3.googleusercontent.com/a/ACg8ocL2K7q06vJxPRiEjX9oWw0rD41ulm5C-NhVSmjzvUn_=s96-c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, 'Warek III', 'warek3@uts.ac.id', NULL, 'warek3@uts.ac.id', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE users ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
