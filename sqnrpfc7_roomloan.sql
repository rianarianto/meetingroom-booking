-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 23, 2023 at 09:07 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqnrpfc7_roomloan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `idBooking` int(10) UNSIGNED NOT NULL,
  `tanggalBooking` date NOT NULL,
  `namaUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktuMulai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktuSelesai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`idBooking`, `tanggalBooking`, `namaUser`, `divisi`, `ruangan`, `waktuMulai`, `waktuSelesai`, `keterangan`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, '2023-02-16', 'Iyan', 'Digital Support', 'Meeting Room 1', '8', '10', 'meeting bulanan', 'Booked', NULL, '2023-02-16 13:57:04', '2023-02-16 14:55:44'),
(12, '2023-02-16', 'b', 'b', 'Meeting Room 1', '10', '12', 'bq', 'Booked', NULL, '2023-02-16 13:57:19', '2023-02-16 13:57:53'),
(13, '2023-03-21', 'Marisa', 'Digital Support', 'Meeting Room 1', '13', '15', 'meeting bulanan', 'Booked', NULL, '2023-03-21 09:45:04', '2023-03-21 09:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_ruangans`
--

CREATE TABLE `jenis_ruangans` (
  `id` int(30) NOT NULL,
  `jenisRuangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_ruangans`
--

INSERT INTO `jenis_ruangans` (`id`, `jenisRuangan`) VALUES
(1, 'Meeting Room'),
(2, 'Paintree Room');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_12_20_090921_booking', 1),
(5, '2022_12_20_092954_ruangan', 1),
(6, '2022_12_21_032510_times', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `idRuangan` int(10) UNSIGNED NOT NULL,
  `namaRuangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenisRuangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitasRuangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasiRuangan` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`idRuangan`, `namaRuangan`, `jenisRuangan`, `kapasitasRuangan`, `gambar`, `lokasiRuangan`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Meeting Room 1', 'Meeting Room', '10 Orang', '46993d1e-1336-4eb9-9ae9-eb887a693648.jpg.png', 'Lantai 3', NULL, '2023-01-31 19:18:25', '2023-01-31 19:24:58'),
(2, 'Ruangan Paintree', 'Paintree Room', '10 Orang', NULL, 'Lantai 2', NULL, '2023-01-31 19:30:04', '2023-01-31 20:12:34'),
(3, 'Meeting room', 'Meeting Room', '30 orang', NULL, 'lantai 1', NULL, '2023-03-20 07:29:52', '2023-03-20 07:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `idWaktu` int(10) UNSIGNED NOT NULL,
  `waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`idWaktu`, `waktu`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, '08.00', NULL, NULL, NULL),
(9, '09.00', NULL, NULL, NULL),
(10, '10.00', NULL, NULL, NULL),
(11, '11.00', NULL, NULL, NULL),
(12, '12.00', NULL, NULL, NULL),
(13, '13.00', NULL, NULL, NULL),
(14, '14.00', NULL, NULL, NULL),
(15, '15.00', NULL, NULL, NULL),
(16, '16.00', NULL, NULL, NULL),
(17, '17.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin', NULL, '$2y$10$1OM03knC3wzunu6nyTFcWO1BMEPzY8zlf/O0ZqTGeYekKsoCHupSC', 'SStfhcnbZ78hTaZNQwtqNPZMjABdIkEcosCDgmsuieS0X34EvLXsp7j8RxKC', '2023-01-31 19:14:04', '2023-02-15 15:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`idBooking`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_ruangans`
--
ALTER TABLE `jenis_ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`idRuangan`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`idWaktu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `idBooking` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_ruangans`
--
ALTER TABLE `jenis_ruangans`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `idRuangan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `idWaktu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
