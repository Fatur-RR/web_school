-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 11:34 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_fatur`
--

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KategoriID` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `KategoriID`, `judul`, `isi`, `created_at`, `updated_at`, `status`, `user_id`) VALUES
(1, 2, 'Upacara Bendera', 'Senin, 3 Oktober 2024', '2024-10-01 12:57:07', '2024-11-05 09:44:13', 'Aktif', 3),
(2, 2, 'Upacara Bendera', 'Senin, 10 Oktober 2024', '2024-10-01 12:57:07', '2024-10-19 07:07:29', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `AlbumID` bigint(20) UNSIGNED NOT NULL,
  `KategoriID` bigint(20) UNSIGNED NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`AlbumID`, `KategoriID`, `Nama`, `Deskripsi`, `created_at`, `updated_at`) VALUES
(1, 4, 'PPLG', 'Kumpulan Foto Jurusan PPLG', '2024-10-01 12:29:56', '2024-11-24 15:32:50'),
(2, 4, 'TJKT', 'Kumpulan Foto Jurusan TJKT', '2024-10-01 12:33:32', '2024-11-24 15:32:54'),
(3, 4, 'TKR', 'Kumpulan Foto Jurusan TKR', '2024-10-01 12:34:11', '2024-11-24 15:32:58'),
(4, 4, 'TPFL', 'Kumpulan Foto Jurusan TPFL', '2024-10-01 12:34:45', '2024-11-24 15:33:03'),
(5, 7, 'Denah Sekolah', 'Denah SMKN 4 Bogor', '2024-10-01 13:52:20', '2024-11-24 15:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('fikri@gmail.com|127.0.0.1', 'i:1;', 1727872568),
('fikri@gmail.com|127.0.0.1:timer', 'i:1727872568;', 1727872568);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fotos`
--

CREATE TABLE `fotos` (
  `FotoID` bigint(20) UNSIGNED NOT NULL,
  `AlbumID` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fotos`
--

INSERT INTO `fotos` (`FotoID`, `AlbumID`, `file`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/xzDwVlkPeX7UOuTWSFc14aDJDoGexmJeIRMZaQm7.jpg', 'Ruang Praktek PPLG', 'Lab 2', '2024-10-01 12:30:57', '2024-11-24 15:25:57'),
(2, 1, 'uploads/oWHcDcEAbpHtEWMjRlcZzPTvy29E4Psq50lLvtod.jpg', 'Ruang Praktek PPLG', 'Lab 1', '2024-10-01 12:35:29', '2024-11-24 15:26:10'),
(3, 3, 'uploads/dHqx31emwfSBadfIgnV4Lnx3HlSV2Nz3bjSHIoYY.jpg', 'Ruang Pratek TKR', 'Bengkel', '2024-10-01 12:36:10', '2024-10-14 04:30:15'),
(4, 4, 'uploads/26CkevcpjIy19BzTEJjAIJ5uhLdGiGV2gQ9JDfQh.jpg', 'Ruang Pratek TPFL', 'Bengkel', '2024-10-01 12:37:08', '2024-10-14 04:30:23'),
(5, 2, 'uploads/YPUGjT037SqkCF9swLBDg7ZS4TZ7lpvC2rAL47DZ.jpg', 'Ruang Pratek TJKT', 'Lab 1', '2024-10-01 12:37:35', '2024-11-24 15:26:28'),
(6, 5, 'uploads/xAS9HG364kuAcu0Har6FYHpl44u1bRfevdyJsPPZ.png', 'Map', 'Denah sekolah SMKN 4 BOGOR', '2024-10-01 13:54:10', '2024-10-20 04:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `KategoriID` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `ringkasan` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasis`
--

INSERT INTO `informasis` (`id`, `KategoriID`, `file`, `judul`, `isi`, `ringkasan`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'uploads/0nHyovr6OHA5y3BYBnrYI5uKiX0BQhxrWVOEQVnM.jpg', 'Kepala Sekolah', 'Sejak satu tahun lalu SMKN 4 Kota Bogor dipimpin oleh seseorang yang membawa warna baru, tahun pertama sejak dilantik, tepatnya pada tanggal 10 Juli 2020, inovasi dan kebijakan-kebijakan baru pun mulai dirancang. Bukan tanpa kesulitan, penuh tantangan tapi beliau meyakinkan untuk selalu optimis pada harapan dengan bersinergi mewujudkan visi misi SMKN 4 Bogor ditengah kesulitan pandemi ini. Strategi baru pun dimunculkan, beberapa program sudah terealisasikan diantaranya mengembangkan aplikasi LMS (Learning Management System) sebagai solusi dalam pelaksanaan program BDR (Belajar dari Rumah), untuk mengoptimalkan hubungan kerjasama antara sekolah dengan Industri dan Dunia Kerja (IDUKA), dan juga untuk pengalaman praktek belajar jarak jauh agar tetap berjalan dengan optimall.', 'Drs. Mulya Murprihartono, M.Si.\r\nKepala Sekolah Ke-3, Juli 2020 - sekarang', 'aktif', 1, '2024-10-01 12:44:48', '2024-11-24 15:32:15'),
(3, 1, 'uploads/rCwJ4J2pUHAKtP7Cwuo7PIhBwdbV1DEd32JQ8wc3.png', 'Kegiatan Pelaksanaan P5 Shalat Dhuha Berjamaah', 'Kegiatan Pelaksanaan P5 Shalat Dhuha Berjamaah. Kegiatan ini diikuti oleh seluruh warga sekolah dan dilaksanakan pada hari Kamis, 07 November 2024.', 'Kegiatan ini diikuti oleh seluruh warga sekolah dan dilaksanakan pada hari Kamis, 07 November 2024.', 'aktif', 1, '2024-10-02 01:27:10', '2024-11-24 15:32:20'),
(4, 2, 'uploads/T3uMUNN8EIDbrj6kELMLCr1brrNJUtunRacJgkXp.png', 'Kegiatan Musyawarah Kerja SMK Negeri 4 Bogor.', 'Kegiatan Musyawarah Kerja SMK Negeri 4 Bogor. Kegiatan ini dilaksanakan di Aula SMK Negeri 4 Bogor diikuti oleh Anggota Osis, Demisioner Osis dan Perwakilan dari Ekstrakurikuler pada hari Kamis, 07 November 2024', 'Kegiatan ini dilaksanakan di Aula SMK Negeri 4 Bogor diikuti oleh Anggota Osis, Demisioner Osis dan Perwakilan dari Ekstrakurikuler pada hari Kamis, 07 November 2024', 'aktif', 1, '2024-10-02 01:27:10', '2024-11-24 15:32:25'),
(9, 2, 'uploads/Y74OHlwqQq1IEf5ex2mBM0Btote4NwJm6mTcOLUO.png', 'Kegiatan Rapat Orang Tua Kelas XII SMKN 4 Bogor.', 'Kegiatan Rapat Orang Tua Kelas XII SMKN 4 Bogor. Rapat ini membahas mengenai Praktik Kerja Lapangan dan Uji Kompetensi siswa/siswi kelas XII. Kegiatan ini dilaksanakan pada hari Selasa, 05 November 2024', 'Rapat ini membahas mengenai Praktik Kerja Lapangan dan Uji Kompetensi siswa/siswi kelas XII. Kegiatan ini dilaksanakan pada hari Selasa, 05 November 2024', 'aktif', 1, '2024-10-18 03:24:17', '2024-11-24 15:32:29'),
(11, 3, 'uploads/n81SbbG62GckefFjrvhaEapl4FIN2nIW10A5kWzU.png', 'Kegiatan Lomba Fruit Tea School To school SMKN 4 Bogor.', 'Kegiatan Lomba Fruit Tea School To school SMKN 4 Bogor. Kegiatan ini dilaksanakan di lapangan SMK Negeri 4 Bogor pada Rabu, 06 November 2024', 'Kegiatan ini dilaksanakan di lapangan SMK Negeri 4 Bogor pada Rabu, 06 November 2024', 'aktif', 3, '2024-10-31 17:50:05', '2024-11-24 15:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `KategoriID` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`KategoriID`, `judul`, `created_at`, `updated_at`) VALUES
(1, 'P5', '2024-10-01 12:28:22', '2024-11-24 15:31:40'),
(2, 'Sekolah', '2024-10-01 12:28:50', '2024-11-24 15:31:44'),
(3, 'Event', '2024-10-01 12:29:11', '2024-11-24 15:31:48'),
(4, 'Jurusan', '2024-10-01 13:52:02', '2024-11-24 15:31:55'),
(7, 'Map', '2024-11-24 15:32:05', '2024-11-24 15:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_01_112204_create_kategoris_table', 1),
(5, '2024_10_01_112853_create_albums_table', 1),
(6, '2024_10_01_112903_create_fotos_table', 1),
(7, '2024_10_01_113022_create_informasis_table', 1),
(8, '2024_10_01_113030_create_agendas_table', 1),
(9, '2024_10_01_113302_create_profiles_table', 1),
(10, '2024_10_28_030538_create_personal_access_tokens_table', 2),
(11, '2024_11_10_142035_create_visitors_table', 3),
(12, '2024_11_21_060815_create_settings_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fatur@gmail.com', '$2y$12$WX1BJgKRcNiedoVdsny8R.1FBuww9/UjiHxjcMDux0y7xc.wobJEi', '2024-10-26 00:51:16'),
('faturramadhan2405@gmail.com', '$2y$12$R8M0mHxi75pDksq2AdA3uOMVxijMecIO1CNRqk6dMxw3t1qNPmthW', '2024-10-28 08:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(2, 'App\\Models\\User', 3, 'auth_token', '8d7a88dceaedc2f1bcf9aa9fa276c2d76fc36ea6bf335556f32058784e3ea33c', '[\"*\"]', NULL, NULL, '2024-10-28 08:43:04', '2024-10-28 08:43:04'),
(3, 'App\\Models\\User', 1, 'auth_token', 'de568a7cb19e2b4ca8c3abc18281ddd919ef718b81876744272992c74e462e04', '[\"*\"]', NULL, NULL, '2024-10-28 18:44:10', '2024-10-28 18:44:10'),
(4, 'App\\Models\\User', 1, 'auth_token', '5b4b9119506ce2dfa6f50acc96bcaae16b6eb7211f80628c4d81adafc3ba88ee', '[\"*\"]', NULL, NULL, '2024-10-28 19:57:57', '2024-10-28 19:57:57'),
(5, 'App\\Models\\User', 1, 'auth_token', 'b61c7eeb5efc8b09f5d34ac02e93d3f103d8cf1372b808ce1963eb1e0378d2e3', '[\"*\"]', NULL, NULL, '2024-10-28 20:00:21', '2024-10-28 20:00:21'),
(6, 'App\\Models\\User', 1, 'auth_token', '911138c6e9639c2d1c343618f19c70dea145e7de4d8792cb2d6b02c644f9970e', '[\"*\"]', NULL, NULL, '2024-10-28 20:25:41', '2024-10-28 20:25:41'),
(7, 'App\\Models\\User', 1, 'auth_token', '90b48966ad3a4fbef9b0f413ffb5441de661dd1c94e51ba68537d8693ddf8353', '[\"*\"]', NULL, NULL, '2024-10-28 20:27:24', '2024-10-28 20:27:24'),
(8, 'App\\Models\\User', 1, 'auth_token', '5d92f78dbf977ab4e0ae59b30fb30a3c25877cbd7939e0d25224178de0d7512c', '[\"*\"]', NULL, NULL, '2024-10-28 20:33:58', '2024-10-28 20:33:58'),
(9, 'App\\Models\\User', 1, 'auth_token', '0e89063a5a8f84cead7cc797bed85188d9682f06a0557fd7b3107e478b8677d8', '[\"*\"]', NULL, NULL, '2024-10-28 20:41:27', '2024-10-28 20:41:27'),
(10, 'App\\Models\\User', 1, 'auth_token', '9b2634dc24f673840b163629aa121daf755f807553a92cfc86c48eb125c11661', '[\"*\"]', NULL, NULL, '2024-10-28 20:46:29', '2024-10-28 20:46:29'),
(11, 'App\\Models\\User', 1, 'auth_token', '090a9af6be2ec19febeb337cb9bdfb8495680cba024cae4f7f6f3c074eef2b9a', '[\"*\"]', NULL, NULL, '2024-10-28 21:10:04', '2024-10-28 21:10:04'),
(12, 'App\\Models\\User', 1, 'auth_token', '66f46a75fa66909b42d202568acc41c91ca208ef8c8ca7595ef451c7d3aeed63', '[\"*\"]', NULL, NULL, '2024-10-28 21:20:00', '2024-10-28 21:20:00'),
(13, 'App\\Models\\User', 1, 'auth_token', '02a0166b9b10a55187129c6f38ded5333862cde16629d3145a482330e4efb244', '[\"*\"]', NULL, NULL, '2024-10-28 21:27:47', '2024-10-28 21:27:47'),
(14, 'App\\Models\\User', 1, 'auth_token', '844b3a8912a611a9813e75db2868c17c3a8195c8a884f8223cad7f2df99ced7e', '[\"*\"]', NULL, NULL, '2024-10-28 23:31:54', '2024-10-28 23:31:54'),
(15, 'App\\Models\\User', 1, 'auth_token', 'c86383de09901e4c85ed0b79f2be142b7dd2c0a30b096e39c4beeba641d7df08', '[\"*\"]', NULL, NULL, '2024-10-28 23:44:50', '2024-10-28 23:44:50'),
(16, 'App\\Models\\User', 1, 'auth_token', 'e2a05a0002c9e749a9f0783a5b1e936f1fd5845aaab823a1cc03b3f34259a912', '[\"*\"]', NULL, NULL, '2024-10-29 05:59:32', '2024-10-29 05:59:32'),
(17, 'App\\Models\\User', 1, 'auth_token', 'd0e072e55173851ca97c3e0a9c12ff7aca3adb318355257be888644d20b7120b', '[\"*\"]', NULL, NULL, '2024-10-29 06:42:56', '2024-10-29 06:42:56'),
(18, 'App\\Models\\User', 1, 'auth_token', '7cfdc0e7a2d76291f0ff17a602a363b753edb363b3d71c87553b6019deeb3200', '[\"*\"]', NULL, NULL, '2024-10-29 08:23:30', '2024-10-29 08:23:30'),
(19, 'App\\Models\\User', 1, 'auth_token', '33822c7cb6f282f57e9d90fe226edb4c5323859af47ae5b2bad24a790defdbca', '[\"*\"]', NULL, NULL, '2024-10-29 17:42:27', '2024-10-29 17:42:27'),
(20, 'App\\Models\\User', 1, 'auth_token', '447189273d1a5f4dc6da1edc89e17c2b8754c3f4a267f8719db6304c1c45ee2a', '[\"*\"]', NULL, NULL, '2024-10-29 17:49:20', '2024-10-29 17:49:20'),
(21, 'App\\Models\\User', 1, 'auth_token', '4a5cd4acb60834ed97c464efc767c275f597bbda7e3dc34e9811469ec90b455f', '[\"*\"]', NULL, NULL, '2024-10-29 18:08:38', '2024-10-29 18:08:38'),
(22, 'App\\Models\\User', 1, 'auth_token', 'd23d0b1f85155918b7905373ebdc4652b2d5d84215e5c906b81adf9282195112', '[\"*\"]', NULL, NULL, '2024-10-29 18:17:37', '2024-10-29 18:17:37'),
(23, 'App\\Models\\User', 1, 'auth_token', '298520dc3166635bcd690f4616476d18304674c6b9fdc1063e562d131090431a', '[\"*\"]', NULL, NULL, '2024-10-29 18:18:47', '2024-10-29 18:18:47'),
(24, 'App\\Models\\User', 1, 'auth_token', 'b1cb38d0b5ae1fa823318b5563263823d76f675b0136d8dff9c1029379666a6e', '[\"*\"]', NULL, NULL, '2024-10-29 18:22:32', '2024-10-29 18:22:32'),
(25, 'App\\Models\\User', 1, 'auth_token', 'bd70e66ea2f7e3f3367b65fba175c24ec720555b6864efb9169c8d03f038877a', '[\"*\"]', NULL, NULL, '2024-10-29 18:27:30', '2024-10-29 18:27:30'),
(26, 'App\\Models\\User', 1, 'auth_token', 'dc4f5afdf74aed6ee6714edce5739d29d1fe4b4e08b2cbf12839024989bb6f97', '[\"*\"]', '2024-10-29 19:28:41', NULL, '2024-10-29 18:32:49', '2024-10-29 19:28:41'),
(27, 'App\\Models\\User', 1, 'auth_token', '6ce64f933bc1573afbb7399b17493b244d3b6e0d55a5a3c4df0c316afe36598e', '[\"*\"]', NULL, NULL, '2024-10-29 19:04:05', '2024-10-29 19:04:05'),
(28, 'App\\Models\\User', 1, 'auth_token', 'f4b043ef72333b96e8e8dcb5fa6cc4438fec1f55c6a057a7e858f6036d0501f0', '[\"*\"]', NULL, NULL, '2024-10-29 19:14:38', '2024-10-29 19:14:38'),
(29, 'App\\Models\\User', 1, 'auth_token', 'd6dcd171342dfb2a2e87765b5be4d9cdb208e42f6a9b4bdb6ec94e1d388f868c', '[\"*\"]', NULL, NULL, '2024-10-29 19:15:14', '2024-10-29 19:15:14'),
(30, 'App\\Models\\User', 1, 'auth_token', '213bb74bad5737edd4ab5bdc37d28669fcf184b667804390c497adf6696c3077', '[\"*\"]', NULL, NULL, '2024-10-29 19:17:56', '2024-10-29 19:17:56'),
(31, 'App\\Models\\User', 1, 'auth_token', 'd193d39864bf4fc776606fa352497c3d5c530e62ae93a09a3bc563e4dbc93c10', '[\"*\"]', NULL, NULL, '2024-10-29 19:21:05', '2024-10-29 19:21:05'),
(32, 'App\\Models\\User', 1, 'auth_token', 'fb9ebc55a8a76fe79a7a4ceb3496f924cc943962432cb17654d05f1bfedcd077', '[\"*\"]', NULL, NULL, '2024-10-29 19:25:54', '2024-10-29 19:25:54'),
(33, 'App\\Models\\User', 1, 'auth_token', '1e2cd71ac0258c5f478f19b00ac2ef637f0b057bf060b2f57d40382a2c3a8a69', '[\"*\"]', NULL, NULL, '2024-10-29 19:27:14', '2024-10-29 19:27:14'),
(34, 'App\\Models\\User', 1, 'auth_token', '61c12f9fe1598c2b677b3984ba0f6cf48c3e5ed78ac1e1819d350239f9857231', '[\"*\"]', NULL, NULL, '2024-10-29 19:28:10', '2024-10-29 19:28:10'),
(35, 'App\\Models\\User', 1, 'auth_token', 'b919fa5cef38ba6e82068ccad235ef45842afa9807f73372f0196328e9d68740', '[\"*\"]', NULL, NULL, '2024-10-29 19:28:59', '2024-10-29 19:28:59'),
(36, 'App\\Models\\User', 1, 'auth_token', '21a690634770982a93acbd95329df249d42982afceacd05c9b16fda318c3e3fa', '[\"*\"]', NULL, NULL, '2024-10-30 00:56:20', '2024-10-30 00:56:20'),
(37, 'App\\Models\\User', 1, 'auth_token', 'd520170cc65e7502fb26606321404009ee3987e6ebd2cd9773a9164debcf6aac', '[\"*\"]', NULL, NULL, '2024-10-30 07:41:32', '2024-10-30 07:41:32'),
(38, 'App\\Models\\User', 1, 'auth_token', '06eb40f6d0effa7906010014267dea3f5784f550da96645f7ec86322c85a2d86', '[\"*\"]', NULL, NULL, '2024-10-30 07:58:26', '2024-10-30 07:58:26'),
(39, 'App\\Models\\User', 1, 'auth_token', 'cdb054ad4d6bcdf8dcabf742d520c50eebbe50c55f6ccee061fe46c3cbf2326e', '[\"*\"]', NULL, NULL, '2024-10-30 07:58:52', '2024-10-30 07:58:52'),
(40, 'App\\Models\\User', 1, 'auth_token', '57b51289a303dae9ba9a9a7181bfe46279da6c567ddd7d94a7fe69990c34405f', '[\"*\"]', NULL, NULL, '2024-10-30 08:05:28', '2024-10-30 08:05:28'),
(41, 'App\\Models\\User', 1, 'auth_token', '0d2c3015cf5d460a989011f5b21c65dcb3b292159821131fa6d70e197092d850', '[\"*\"]', NULL, NULL, '2024-10-30 08:11:17', '2024-10-30 08:11:17'),
(42, 'App\\Models\\User', 1, 'auth_token', 'f5168e362edb34799370dd16e4043c97cfeb2cd5033901a1dbaaa620eeb9158f', '[\"*\"]', NULL, NULL, '2024-10-30 19:16:21', '2024-10-30 19:16:21'),
(43, 'App\\Models\\User', 1, 'auth_token', 'b8885f17c33f4044a88c9803c4c50873fa665252be957498736a0f5196623e3f', '[\"*\"]', NULL, NULL, '2024-10-31 17:44:54', '2024-10-31 17:44:54'),
(44, 'App\\Models\\User', 1, 'auth_token', '1a5f22068611b4980b28372ae3e1dd86d4be7ba6c4e9bed68f7341851ef2a7ce', '[\"*\"]', NULL, NULL, '2024-11-01 05:17:12', '2024-11-01 05:17:12'),
(45, 'App\\Models\\User', 1, 'auth_token', 'c31cd80b718da8344f6d622d841636b09bd786a08db47cbfb0ec146c430f5d0f', '[\"*\"]', NULL, NULL, '2024-11-01 05:23:23', '2024-11-01 05:23:23'),
(46, 'App\\Models\\User', 1, 'auth_token', '2bb9689dd384f412d30d0a57c5ad27ba004a43ac6655989173ff40413e77ee0d', '[\"*\"]', NULL, NULL, '2024-11-01 05:25:49', '2024-11-01 05:25:49'),
(47, 'App\\Models\\User', 1, 'auth_token', 'a5ad594abe5e006bd7de91c712ceb393504e26aed43cc2d1f22c6ed3284a61ba', '[\"*\"]', NULL, NULL, '2024-11-01 05:28:02', '2024-11-01 05:28:02'),
(48, 'App\\Models\\User', 1, 'auth_token', 'b664907413140beeef683cd205f095756f636c107162843b39630486a15999b4', '[\"*\"]', NULL, NULL, '2024-11-01 05:31:06', '2024-11-01 05:31:06'),
(49, 'App\\Models\\User', 1, 'auth_token', 'b9ef03e401810118922f4f292bf998cb9f2bb61a20bd9ce22fb19c29723894bc', '[\"*\"]', NULL, NULL, '2024-11-01 05:32:48', '2024-11-01 05:32:48'),
(50, 'App\\Models\\User', 1, 'auth_token', '750fc6d0e3cec6b29ddb721bbbb61f838e72a156c01072f9ab5a587bfead27b1', '[\"*\"]', NULL, NULL, '2024-11-01 05:37:22', '2024-11-01 05:37:22'),
(51, 'App\\Models\\User', 1, 'auth_token', '5074b0dce75d72e874225dd3bef0719d84d7b4a8f13cd2eecac5e3f23d0f9973', '[\"*\"]', NULL, NULL, '2024-11-01 05:38:35', '2024-11-01 05:38:35'),
(52, 'App\\Models\\User', 1, 'auth_token', '83f9e0472a8e587482472c60b00f8819eb8ea477a63d25a4c965d5781d5fe47f', '[\"*\"]', NULL, NULL, '2024-11-01 05:41:43', '2024-11-01 05:41:43'),
(53, 'App\\Models\\User', 1, 'auth_token', '5cdf0707b7a02c61647a2c11b23bd83d153d224f1162df3222d6392290fa2293', '[\"*\"]', NULL, NULL, '2024-11-01 05:44:13', '2024-11-01 05:44:13'),
(54, 'App\\Models\\User', 1, 'auth_token', '75fe5f1d78efd5e538705683be5f0a0c641be6305062bd86f42400dabdfa1d2e', '[\"*\"]', NULL, NULL, '2024-11-01 05:48:11', '2024-11-01 05:48:11'),
(55, 'App\\Models\\User', 1, 'auth_token', '02aa744241c16838c245770095f2ba3802beac9a0bf2827fc137f5aaf3b2e251', '[\"*\"]', NULL, NULL, '2024-11-01 05:51:26', '2024-11-01 05:51:26'),
(56, 'App\\Models\\User', 1, 'auth_token', 'a3f2ce216426b2cc6989907b7cbeb8003dad9ad67f8fdfcc16a8c084e86004c9', '[\"*\"]', NULL, NULL, '2024-11-01 05:56:40', '2024-11-01 05:56:40'),
(57, 'App\\Models\\User', 1, 'auth_token', '9a2803d568676687a282b3d982d0bb463540a21f140c75beff646a9db5ebc879', '[\"*\"]', '2024-11-01 07:05:46', NULL, '2024-11-01 05:59:56', '2024-11-01 07:05:46'),
(58, 'App\\Models\\User', 1, 'auth_token', 'c73cabe3b33b9a7d1856a50f6d25b151fae64767119f091e9dff14040cdb1e5c', '[\"*\"]', '2024-11-01 08:27:01', NULL, '2024-11-01 08:26:04', '2024-11-01 08:27:01'),
(59, 'App\\Models\\User', 1, 'auth_token', '7ae27b360c57d8c93731ed1664b6446de456d0e0b3c5f0f3e7ed2cc6915eab33', '[\"*\"]', NULL, NULL, '2024-11-01 08:30:11', '2024-11-01 08:30:11'),
(60, 'App\\Models\\User', 1, 'auth_token', '714a8630aab122bea4f14a0af09744272863f91484e433e3538c031fcb2aba83', '[\"*\"]', '2024-11-01 08:50:13', NULL, '2024-11-01 08:32:30', '2024-11-01 08:50:13'),
(61, 'App\\Models\\User', 1, 'auth_token', '4483fa5db281297e88b691627266608e115c3524f5d6588d1a68a31853e3749c', '[\"*\"]', '2024-11-01 09:24:04', NULL, '2024-11-01 08:53:09', '2024-11-01 09:24:04'),
(62, 'App\\Models\\User', 1, 'auth_token', '6ef42d13e084dd8e670722082521eb41bba6b57f6c42b514fc44828a0dc176cd', '[\"*\"]', NULL, NULL, '2024-11-01 09:54:15', '2024-11-01 09:54:15'),
(63, 'App\\Models\\User', 1, 'auth_token', '164ae2273f828bd269a22882222b2bc08bbdc80502dfab04f36e405859a9c8c8', '[\"*\"]', NULL, NULL, '2024-11-01 09:54:31', '2024-11-01 09:54:31'),
(64, 'App\\Models\\User', 1, 'auth_token', 'ac1aa30838446a1b6061ec5dddfadefe97d430dfaf3f23743c4cf864d633e5ea', '[\"*\"]', NULL, NULL, '2024-11-01 09:56:18', '2024-11-01 09:56:18'),
(65, 'App\\Models\\User', 1, 'auth_token', '724d91a6c087effa07c203f755487ba7d8a04c7688a84c90bcfb44580f37440a', '[\"*\"]', NULL, NULL, '2024-11-01 09:56:52', '2024-11-01 09:56:52'),
(66, 'App\\Models\\User', 1, 'auth_token', 'eefc9a7e19a36440360ecb89730ad0b3e6f1f4c6dbdc69a7faeaec3bf4727b10', '[\"*\"]', NULL, NULL, '2024-11-01 09:57:43', '2024-11-01 09:57:43'),
(67, 'App\\Models\\User', 1, 'auth_token', '94603c275eac2d3ff5477959e06e64096ba15e1f0b24acad741b3a825fb5eba8', '[\"*\"]', NULL, NULL, '2024-11-01 09:58:49', '2024-11-01 09:58:49'),
(68, 'App\\Models\\User', 1, 'auth_token', '06fbbce575d0e4b6f65ceeb61ce146a3653708427cb00b085dcb1a35087e4fbf', '[\"*\"]', NULL, NULL, '2024-11-01 10:00:12', '2024-11-01 10:00:12'),
(69, 'App\\Models\\User', 1, 'auth_token', 'f5f0cb3d4c33a7a426d6ebd374359429fe0f9ff5ab99a81082250def34718f8e', '[\"*\"]', NULL, NULL, '2024-11-01 10:01:42', '2024-11-01 10:01:42'),
(70, 'App\\Models\\User', 1, 'auth_token', 'ddaf33e4d98d4a687b1348326533febbfe5d28e2ec074b8d439a83a8d0b33d05', '[\"*\"]', NULL, NULL, '2024-11-01 10:03:06', '2024-11-01 10:03:06'),
(71, 'App\\Models\\User', 1, 'auth_token', 'b2273dcee0cb5e71e9e208b43cf0449aaeae9a699abf03744205a610d4065469', '[\"*\"]', NULL, NULL, '2024-11-01 10:04:03', '2024-11-01 10:04:03'),
(72, 'App\\Models\\User', 1, 'auth_token', '7a6cbe7be58d74a6cfb458200eca65f2a88706370768a6edcbac1f44ded74014', '[\"*\"]', NULL, NULL, '2024-11-01 10:07:06', '2024-11-01 10:07:06'),
(73, 'App\\Models\\User', 1, 'auth_token', '8f720980da4a9a71c93a9538011017079f4172af785d869f59548b3e1f31e019', '[\"*\"]', NULL, NULL, '2024-11-01 10:15:42', '2024-11-01 10:15:42'),
(74, 'App\\Models\\User', 1, 'auth_token', 'de0341b8107544dc68d16b0cacd62e84d49630d0c4e829b619bc21e46712b4a5', '[\"*\"]', NULL, NULL, '2024-11-01 10:30:20', '2024-11-01 10:30:20'),
(75, 'App\\Models\\User', 1, 'auth_token', '5244afe93f0982f15b9843e6199928295adb2fd8a1be161dcc046e4c3d143a36', '[\"*\"]', NULL, NULL, '2024-11-01 10:39:53', '2024-11-01 10:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `judul`, `isi`, `created_at`, `updated_at`) VALUES
(1, 'lorem ipsum', 'lorem ipsum dolor amet.', '2024-10-01 16:49:02', '2024-10-01 16:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MxFfxDbxZWFNlCIjjVqe7hzvBTmJMlmFkxy75jbx', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXVnMTgyUnN1NUlHWEZ6ZVFuN0VQZDVLQlkzaGxjbEZoR0UydkVDSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czoxNToidmlzaXRvcl90cmFja2VkIjtiOjE7fQ==', 1732487596);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'logo', 'logos/qggbpQP2UAkWx3vwchXaFJLryKBQrHH0idF5HGJS.png', NULL, '2024-11-24 15:20:18'),
(2, 'apk_name', 'SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45'),
(3, 'welcome_teks', 'Selamat datang di Website SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45'),
(4, 'informasi_teks', 'Informasi SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45'),
(5, 'agenda_teks', 'Agenda SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45'),
(6, 'album_teks', 'Album SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45'),
(7, 'gallery_teks', 'Foto Foto SMKN 4 BOGOR', NULL, '2024-11-24 15:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fatur', 'fatur@gmail.com', NULL, '$2y$12$xNd785VKMfrFrPPe.t/F8uDgexBPOuFebEDBR2RT6jGFxSFW.CyyG', 'FbkOSF1jxwIQQpeNDRZaW4wbPhudMJDbHz3uIUA9arqmop2pdl28CfmqHkbe', '2024-10-01 05:44:32', '2024-10-01 05:44:32'),
(2, 'fikri', 'woi@gmail.com', NULL, '$2y$12$pV9QEdHUkK0fSKqmgMS5IOfglrjGc2csFuGhirMhtGdiX1pePgABq', NULL, '2024-10-01 17:28:32', '2024-10-01 17:28:32'),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$12$VYu64IefufylORmXP4TxkOsljUHsdMWTNn03Dc283ziXWkn7Ne3cm', NULL, '2024-10-28 08:43:04', '2024-10-28 08:43:04'),
(4, 'Fatur Rachmat', 'faturramadhan2405@gmail.com', NULL, '$2y$12$D5e5yKUu1zCIvBWwaiULwOwI3J4hJayTwEwii1BSdXT6ebg2z5uxa', NULL, '2024-10-28 08:53:57', '2024-10-28 08:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `page_visited` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `user_agent`, `page_visited`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:125.0) Gecko/20100101 Firefox/125.0', 'agendaPage', '2024-11-10 08:04:26', '2024-11-10 08:04:26'),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'informasipage', '2024-11-24 15:20:51', '2024-11-24 15:20:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendas_kategoriid_foreign` (`KategoriID`),
  ADD KEY `agendas_user_id_foreign` (`user_id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`AlbumID`),
  ADD KEY `albums_kategoriid_foreign` (`KategoriID`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `fotos_albumid_foreign` (`AlbumID`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasis_kategoriid_foreign` (`KategoriID`),
  ADD KEY `informasis_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `AlbumID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fotos`
--
ALTER TABLE `fotos`
  MODIFY `FotoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `KategoriID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_kategoriid_foreign` FOREIGN KEY (`KategoriID`) REFERENCES `kategoris` (`KategoriID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `agendas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_kategoriid_foreign` FOREIGN KEY (`KategoriID`) REFERENCES `kategoris` (`KategoriID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_albumid_foreign` FOREIGN KEY (`AlbumID`) REFERENCES `albums` (`AlbumID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `informasis`
--
ALTER TABLE `informasis`
  ADD CONSTRAINT `informasis_kategoriid_foreign` FOREIGN KEY (`KategoriID`) REFERENCES `kategoris` (`KategoriID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `informasis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
