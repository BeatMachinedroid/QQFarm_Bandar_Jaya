-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2024 at 08:25 AM
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
-- Database: `db_si_ayam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ayam_masuk`
--

CREATE TABLE `tb_ayam_masuk` (
  `id` int(11) NOT NULL,
  `fk_kandang` int(11) DEFAULT NULL,
  `rata_berat` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_ekor` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ayam_masuk`
--

INSERT INTO `tb_ayam_masuk` (`id`, `fk_kandang`, `rata_berat`, `jumlah`, `harga_ekor`, `tgl`, `created_at`, `updated_at`) VALUES
(19, 4, 35, 8000, 6000, '2024-09-01', '2024-10-16 16:58:40', '2024-10-16 16:58:40');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ayam_mati`
--

CREATE TABLE `tb_ayam_mati` (
  `id` int(11) NOT NULL,
  `fk_kandang` int(11) DEFAULT NULL,
  `jumlah_mati` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ayam_mati`
--

INSERT INTO `tb_ayam_mati` (`id`, `fk_kandang`, `jumlah_mati`, `tgl`, `created_at`, `updated_at`) VALUES
(5, 4, 200, '2024-09-07', '2024-10-16 17:06:51', '2024-10-16 17:06:51'),
(6, 4, 330, '2024-09-15', '2024-10-16 17:08:07', '2024-10-16 17:08:07'),
(7, 4, 6, '2024-09-15', '2024-10-16 17:08:39', '2024-10-16 17:08:39'),
(8, 4, 5, '2024-09-16', '2024-10-16 17:09:02', '2024-10-16 17:09:02'),
(9, 4, 14, '2024-09-17', '2024-10-16 17:09:19', '2024-10-16 17:09:19'),
(10, 4, 12, '2024-09-18', '2024-10-16 17:09:42', '2024-10-16 17:09:42'),
(11, 4, 8, '2024-09-18', '2024-10-16 17:10:03', '2024-10-16 17:10:03'),
(12, 4, 9, '2024-09-20', '2024-10-16 17:10:41', '2024-10-16 17:10:41'),
(13, 4, 7, '2024-09-21', '2024-10-16 17:10:56', '2024-10-16 17:10:56'),
(14, 4, 6, '2024-09-22', '2024-10-16 17:11:23', '2024-10-16 17:11:23'),
(15, 4, 15, '2024-09-23', '2024-10-16 17:11:36', '2024-10-16 17:11:36'),
(16, 4, 10, '2024-09-24', '2024-10-16 17:12:02', '2024-10-16 17:12:02'),
(17, 4, 15, '2024-09-25', '2024-10-16 17:12:26', '2024-10-16 17:12:26'),
(18, 4, 11, '2024-09-26', '2024-10-16 17:12:43', '2024-10-16 17:12:43'),
(19, 4, 12, '2024-10-25', '2024-10-16 17:13:07', '2024-10-16 17:13:07'),
(20, 4, 8, '2024-09-28', '2024-10-16 17:13:21', '2024-10-16 17:13:21'),
(21, 4, 15, '2024-09-29', '2024-10-16 17:13:46', '2024-10-16 17:13:46'),
(22, 4, 8, '2024-09-30', '2024-10-16 17:14:00', '2024-10-16 17:14:00'),
(23, 4, 8, '2024-10-01', '2024-10-16 17:14:17', '2024-10-16 17:14:17'),
(24, 4, 10, '2024-10-02', '2024-10-16 17:14:31', '2024-10-16 17:14:31'),
(25, 4, 9, '2024-10-03', '2024-10-16 17:14:40', '2024-10-16 17:14:40'),
(26, 4, 3, '2024-10-04', '2024-10-16 17:15:08', '2024-10-16 17:15:08'),
(27, 4, 11, '2024-10-05', '2024-10-16 17:15:24', '2024-10-16 17:15:24'),
(28, 4, 176, '2024-10-06', '2024-10-16 17:15:53', '2024-10-16 17:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandang`
--

CREATE TABLE `tb_kandang` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_kandang` varchar(255) NOT NULL,
  `kapasitas` int(10) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kandang`
--

INSERT INTO `tb_kandang` (`id`, `kode`, `nama_kandang`, `kapasitas`, `lokasi`, `created_at`) VALUES
(4, 'Ferryxc', 'Ferryxc', 8000, 'lampung', '2024-10-16 16:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakan_keluar`
--

CREATE TABLE `tb_pakan_keluar` (
  `id` int(11) NOT NULL,
  `fk_kandang` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `jumlah_kg` int(11) DEFAULT NULL,
  `jenis` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pakan_keluar`
--

INSERT INTO `tb_pakan_keluar` (`id`, `fk_kandang`, `tgl`, `jumlah_kg`, `jenis`, `created_at`, `updated_at`) VALUES
(6, 4, '2024-09-01', 2, 'Std', '2024-10-17 01:41:38', '2024-10-17 01:41:38'),
(7, 4, '2024-09-02', 4, 'Std', '2024-10-17 01:41:52', '2024-10-17 01:41:52'),
(8, 4, '2024-09-03', 5, 'Std', '2024-10-17 01:42:06', '2024-10-17 01:42:06'),
(9, 4, '2024-09-04', 3, 'Std', '2024-10-17 01:43:47', '2024-10-17 01:43:47'),
(10, 4, '2024-09-05', 4, 'Std', '2024-10-17 01:44:20', '2024-10-17 01:44:20'),
(11, 4, '2024-09-06', 5, 'Std', '2024-10-17 01:44:35', '2024-10-17 01:44:35'),
(12, 4, '2024-09-07', 7, 'Std', '2024-10-17 01:44:50', '2024-10-17 01:44:50'),
(13, 4, '2024-09-08', 8, 'Std', '2024-10-17 01:46:47', '2024-10-17 01:46:47'),
(14, 4, '2024-09-09', 6, 'Std', '2024-10-17 01:47:08', '2024-10-17 01:47:08'),
(15, 4, '2024-09-10', 7, 'Std', '2024-10-17 01:47:22', '2024-10-17 01:47:22'),
(16, 4, '2024-09-10', 7, 'Std', '2024-10-17 01:47:54', '2024-10-17 01:47:54'),
(17, 4, '2024-09-11', 9, 'Std', '2024-10-17 01:48:10', '2024-10-17 01:48:10'),
(18, 4, '2024-09-12', 10, 'Std', '2024-10-17 01:48:31', '2024-10-17 01:48:31'),
(19, 4, '2024-09-13', 9, 'Std', '2024-10-17 01:49:21', '2024-10-17 01:49:21'),
(20, 4, '2024-09-14', 11, 'Std', '2024-10-17 01:49:59', '2024-10-17 01:49:59'),
(21, 4, '2024-09-15', 13, 'Std', '2024-10-17 01:51:09', '2024-10-17 01:51:09'),
(22, 4, '2024-09-16', 10, 'Std', '2024-10-17 02:26:40', '2024-10-17 02:26:40'),
(23, 4, '2024-09-17', 12, 'Std', '2024-10-17 02:26:52', '2024-10-17 02:26:52'),
(24, 4, '2024-09-18', 12, 'Std', '2024-10-17 02:27:00', '2024-10-17 02:27:00'),
(25, 4, '2024-09-19', 12, 'Std', '2024-10-17 02:27:32', '2024-10-17 02:27:32'),
(26, 4, '2024-09-20', 16, 'Std', '2024-10-17 02:27:48', '2024-10-17 02:27:48'),
(27, 4, '2024-09-21', 16, 'Std', '2024-10-17 02:28:15', '2024-10-17 02:28:15'),
(28, 4, '2024-09-22', 19, 'Std', '2024-10-17 02:28:57', '2024-10-17 02:28:57'),
(29, 4, '2024-09-23', 18, 'Std', '2024-10-17 02:29:19', '2024-10-17 02:29:19'),
(30, 4, '2024-09-24', 19, 'Std', '2024-10-17 02:29:38', '2024-10-17 02:29:38'),
(31, 4, '2024-09-25', 21, 'Std', '2024-10-17 02:29:59', '2024-10-17 02:29:59'),
(32, 4, '2024-09-26', 19, 'Std', '2024-10-17 02:30:16', '2024-10-17 02:30:16'),
(33, 4, '2024-09-27', 21, 'Std', '2024-10-17 02:30:32', '2024-10-17 02:30:32'),
(34, 4, '2024-09-28', 22, 'Std', '2024-10-17 02:30:59', '2024-10-17 02:30:59'),
(35, 4, '2024-09-29', 22, 'Std', '2024-10-17 02:31:41', '2024-10-17 02:31:41'),
(36, 4, '2024-09-30', 21, 'Std', '2024-10-17 02:31:54', '2024-10-17 02:31:54'),
(37, 4, '2024-10-01', 21, 'Std', '2024-10-17 02:32:19', '2024-10-17 02:32:19'),
(38, 4, '2024-10-02', 17, 'Std', '2024-10-17 02:33:14', '2024-10-17 02:33:14'),
(39, 4, '2024-10-03', 10, 'Std', '2024-10-17 02:33:30', '2024-10-17 02:33:30'),
(40, 4, '2024-10-04', 16, 'Std', '2024-10-17 02:33:57', '2024-10-17 02:33:57'),
(41, 4, '2024-10-05', 16, 'Std', '2024-10-17 02:34:14', '2024-10-17 02:34:14'),
(42, 4, '2024-10-06', 8, 'Std', '2024-10-17 02:35:44', '2024-10-17 02:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pakan_masuk`
--

CREATE TABLE `tb_pakan_masuk` (
  `id` int(11) NOT NULL,
  `fk_kandang` int(11) NOT NULL,
  `jumlah_kg` int(11) DEFAULT NULL,
  `jenis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pakan_masuk`
--

INSERT INTO `tb_pakan_masuk` (`id`, `fk_kandang`, `jumlah_kg`, `jenis`, `harga`, `tgl`, `created_at`, `updated_at`) VALUES
(4, 4, 12500, 'Std', 9000, '2024-09-01', '2024-10-16 17:23:48', '2024-10-16 17:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_panen`
--

CREATE TABLE `tb_panen` (
  `id` int(11) NOT NULL,
  `fk_kandang` int(11) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `tgl_ayam_masuk` date DEFAULT NULL,
  `jumlah_ayam` int(11) DEFAULT NULL,
  `harga_jual_ekor` int(11) NOT NULL,
  `berat_ekor` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_panen`
--

INSERT INTO `tb_panen` (`id`, `fk_kandang`, `tgl`, `tgl_ayam_masuk`, `jumlah_ayam`, `harga_jual_ekor`, `berat_ekor`, `created_at`, `updated_at`) VALUES
(10, 4, '2024-10-07', '2024-09-01', 7092, 30000, 2, '2024-10-17 03:00:51', '2024-10-17 03:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `nama_pengguna`, `username`, `password`, `level`, `created_ad`) VALUES
(1, 'administrator', 'admin', '1', 'Administrator', '2024-09-23 03:54:25'),
(2, 'yohanes', 'yohanes', '123', 'Administrator', '2024-10-16 16:33:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ayam_masuk`
--
ALTER TABLE `tb_ayam_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kandang` (`fk_kandang`);

--
-- Indexes for table `tb_ayam_mati`
--
ALTER TABLE `tb_ayam_mati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kandang` (`fk_kandang`);

--
-- Indexes for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pakan_keluar`
--
ALTER TABLE `tb_pakan_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kandang` (`fk_kandang`);

--
-- Indexes for table `tb_pakan_masuk`
--
ALTER TABLE `tb_pakan_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kandang` (`fk_kandang`);

--
-- Indexes for table `tb_panen`
--
ALTER TABLE `tb_panen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kandang` (`fk_kandang`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ayam_masuk`
--
ALTER TABLE `tb_ayam_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_ayam_mati`
--
ALTER TABLE `tb_ayam_mati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pakan_keluar`
--
ALTER TABLE `tb_pakan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_pakan_masuk`
--
ALTER TABLE `tb_pakan_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_panen`
--
ALTER TABLE `tb_panen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_ayam_masuk`
--
ALTER TABLE `tb_ayam_masuk`
  ADD CONSTRAINT `tb_ayam_masuk_ibfk_1` FOREIGN KEY (`fk_kandang`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_ayam_mati`
--
ALTER TABLE `tb_ayam_mati`
  ADD CONSTRAINT `tb_ayam_mati_ibfk_1` FOREIGN KEY (`fk_kandang`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pakan_keluar`
--
ALTER TABLE `tb_pakan_keluar`
  ADD CONSTRAINT `tb_pakan_keluar_ibfk_1` FOREIGN KEY (`fk_kandang`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_pakan_masuk`
--
ALTER TABLE `tb_pakan_masuk`
  ADD CONSTRAINT `tb_pakan_masuk_ibfk_1` FOREIGN KEY (`fk_kandang`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tb_panen`
--
ALTER TABLE `tb_panen`
  ADD CONSTRAINT `tb_panen_ibfk_1` FOREIGN KEY (`fk_kandang`) REFERENCES `tb_kandang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
