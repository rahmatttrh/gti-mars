-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 23 Des 2024 pada 10.58
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enc_dsp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` smallint(6) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`id`, `type_id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cargo', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 2, 'Crew', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 3, 'Moving', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 4, 'Lifting', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(5, 5, 'Fuel Oil', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(6, 6, 'Fresh Water', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_types`
--

CREATE TABLE `activity_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barge_items`
--

CREATE TABLE `barge_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `barge_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cargos`
--

CREATE TABLE `cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `along` date DEFAULT NULL,
  `start` date DEFAULT NULL,
  `finish` date DEFAULT NULL,
  `depart` date DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `func` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cargos`
--

INSERT INTO `cargos` (`id`, `code`, `status`, `schedule_id`, `origin_id`, `destination_id`, `remark`, `created_at`, `updated_at`, `user_id`, `user_name`, `date`, `along`, `start`, `finish`, `depart`, `department_id`, `func`, `description`, `activity_id`) VALUES
(5, 'B001', 1, 8, 1, 13, NULL, '2024-10-18 07:32:13', '2024-10-18 07:32:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'B006', 3, 9, 1, 4, NULL, '2024-10-23 07:52:44', '2024-10-24 01:44:09', NULL, NULL, NULL, '2024-10-21', '2024-10-21', '2024-10-21', '2024-10-21', NULL, NULL, NULL, NULL),
(7, 'B007', 1, 9, 1, 13, NULL, '2024-10-23 07:53:10', '2024-10-24 01:44:09', NULL, NULL, NULL, '2024-10-21', '2024-10-21', '2024-10-21', '2024-10-21', NULL, NULL, NULL, NULL),
(8, 'B008', 3, 9, 4, 7, NULL, '2024-10-24 01:38:14', '2024-10-28 02:20:18', NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-21', NULL, NULL, NULL, NULL),
(9, 'B009', 1, 11, 1, 4, NULL, '2024-10-30 02:07:20', '2024-10-30 02:07:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'B0010', 1, 12, 1, 13, NULL, '2024-11-05 01:46:42', '2024-11-05 02:06:26', NULL, NULL, NULL, '2024-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'B0011', 1, 13, 1, 13, NULL, '2024-11-05 02:08:49', '2024-11-05 02:08:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'B0012', 1, 15, 1, 4, NULL, '2024-12-23 02:19:44', '2024-12-23 02:19:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'B0013', 1, 16, 1, 7, NULL, '2024-12-23 03:53:38', '2024-12-23 04:04:00', NULL, NULL, NULL, NULL, '2024-12-23', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cargo_items`
--

CREATE TABLE `cargo_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` mediumint(9) NOT NULL,
  `cargo_id` mediumint(9) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `offloading_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bcm` varchar(255) DEFAULT NULL,
  `no_doc` varchar(255) DEFAULT NULL,
  `mtd` varchar(255) DEFAULT NULL,
  `contract` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `size` decimal(6,2) DEFAULT NULL,
  `weight` decimal(6,2) DEFAULT NULL,
  `qty` smallint(6) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `undo` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cargo_items`
--

INSERT INTO `cargo_items` (`id`, `request_id`, `cargo_id`, `type`, `offloading_id`, `status`, `bcm`, `no_doc`, `mtd`, `contract`, `description`, `unit`, `size`, `weight`, `qty`, `remark`, `created_at`, `updated_at`, `schedule_id`, `rank`, `date`, `user_id`, `user_name`, `undo`, `reason`) VALUES
(46, 24, 5, 'main', NULL, '1', NULL, NULL, '1', NULL, 'Container Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-10-17 04:03:01', '2024-10-18 07:32:13', 8, 1, '2024-10-14', 69, 'Admin PABELOKAN ISLAND', NULL, NULL),
(47, 24, 5, 'main', NULL, '1', NULL, NULL, '47', NULL, 'Toolkit', 'Box', NULL, NULL, 2, NULL, '2024-10-17 04:03:12', '2024-10-18 07:36:45', 8, 2, '2024-10-14', 69, 'Admin PABELOKAN ISLAND', NULL, NULL),
(48, 24, 5, 'main', NULL, '1', NULL, NULL, '48', NULL, 'Cylinder', 'Pallet', NULL, NULL, 4, NULL, '2024-10-17 04:03:22', '2024-10-18 07:57:37', 8, 2, '2024-10-14', 69, 'Admin PABELOKAN ISLAND', NULL, NULL),
(50, 25, 6, 'main', 3, '4', NULL, NULL, '09149', NULL, 'Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-10-23 07:28:02', '2024-10-25 04:02:06', 9, 2, '2024-10-21', NULL, NULL, NULL, NULL),
(51, 25, 6, 'main', 4, '4', NULL, NULL, '09151', NULL, 'Toolkit', 'Box', NULL, NULL, 5, NULL, '2024-10-23 07:28:12', '2024-10-25 04:03:18', 9, 2, '2024-10-21', NULL, NULL, NULL, NULL),
(52, 26, 8, 'main', 5, '4', NULL, NULL, '09152', NULL, 'Material ex. Well Cinta E 04', 'Pallet', NULL, NULL, 2, NULL, '2024-10-23 07:28:57', '2024-10-28 02:21:12', 9, 2, '2024-10-21', NULL, NULL, NULL, NULL),
(53, 27, 7, 'main', NULL, '1', NULL, NULL, '53', 'MEDCO', 'Food Stuff', 'Container', NULL, 80.00, 2, NULL, '2024-10-23 07:29:50', '2024-10-23 07:57:04', 9, 3, '2024-10-21', NULL, NULL, NULL, NULL),
(54, 28, 9, 'main', NULL, '1', NULL, NULL, '09154', NULL, 'Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-10-30 01:10:41', '2024-10-31 03:31:31', 11, 1, '2024-10-28', NULL, NULL, NULL, NULL),
(55, 28, 9, 'main', NULL, '1', NULL, NULL, '09155', NULL, 'Toolkit', 'Box', NULL, NULL, 2, NULL, '2024-10-30 01:10:54', '2024-10-30 02:07:20', 11, 2, '2024-10-28', NULL, NULL, NULL, NULL),
(56, 29, NULL, 'main', NULL, '0', NULL, NULL, '09556', NULL, 'Food Stuff', 'Container', NULL, NULL, 2, NULL, '2024-10-30 01:13:23', '2024-10-31 03:48:10', NULL, 2, '2024-10-28', NULL, NULL, '2024-10-31', 'Tidak muat (Transko Balihe)'),
(57, 30, 10, 'main', NULL, '1', NULL, NULL, '57', NULL, 'Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-11-05 01:43:46', '2024-11-05 01:46:42', 12, 2, '2024-11-05', NULL, NULL, NULL, NULL),
(58, 30, 10, 'main', NULL, '1', NULL, NULL, '58', NULL, 'Toolkit', 'Box', NULL, NULL, 2, NULL, '2024-11-05 01:43:55', '2024-11-05 01:46:45', 12, 2, '2024-11-05', NULL, NULL, NULL, NULL),
(59, 31, 11, 'main', NULL, '1', NULL, NULL, '59', NULL, 'Food Stuff', 'Container', NULL, NULL, 4, NULL, '2024-11-05 02:07:12', '2024-11-05 02:08:49', 13, 1, '2024-11-05', NULL, NULL, NULL, NULL),
(60, 31, 11, 'main', NULL, '1', NULL, NULL, '60', NULL, 'Toolkit', 'Box', NULL, NULL, 2, NULL, '2024-11-05 02:07:20', '2024-11-05 02:08:52', 13, 2, '2024-11-05', NULL, NULL, NULL, NULL),
(61, 32, NULL, 'main', NULL, '0', NULL, NULL, '61', NULL, 'Container Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-11-06 02:51:08', '2024-11-06 02:51:08', NULL, NULL, '2024-11-06', NULL, NULL, NULL, NULL),
(62, 32, NULL, 'main', NULL, '0', NULL, NULL, '62', NULL, 'Cylinder', 'Pcs', NULL, NULL, 2, NULL, '2024-11-06 02:51:31', '2024-11-06 02:51:31', NULL, NULL, '2024-11-06', NULL, NULL, NULL, NULL),
(63, 33, NULL, 'main', NULL, '0', NULL, NULL, '63', NULL, 'Material ex. Well Cinta E 04', 'Pallet', NULL, NULL, 2, NULL, '2024-11-06 02:52:05', '2024-11-06 02:52:05', NULL, NULL, '2024-11-06', NULL, NULL, NULL, NULL),
(64, 34, 12, 'main', NULL, '1', NULL, NULL, '09164', NULL, 'Food Stuff', 'Container', NULL, NULL, 3, NULL, '2024-12-23 02:09:13', '2024-12-23 02:19:44', 15, 1, '2024-12-23', 9, 'Cosl 221', NULL, NULL),
(65, 34, 12, 'main', NULL, '1', NULL, NULL, '09165', NULL, 'Toolkit', 'Box', NULL, NULL, 2, NULL, '2024-12-23 02:09:22', '2024-12-23 02:19:48', 15, 2, '2024-12-23', 9, 'Cosl 221', NULL, NULL),
(66, 35, 13, 'main', NULL, '1', NULL, NULL, '09566', NULL, 'Food Stuff', 'Container', NULL, NULL, 2, NULL, '2024-12-23 03:30:13', '2024-12-23 03:53:38', 16, 1, '2024-12-23', NULL, NULL, NULL, NULL),
(67, 35, 13, 'main', NULL, '1', NULL, NULL, '09567', NULL, 'Toolkit', 'Box', NULL, NULL, 3, NULL, '2024-12-23 03:31:39', '2024-12-23 03:54:45', 16, 2, '2024-12-23', NULL, NULL, NULL, NULL),
(69, 38, NULL, 'main', NULL, '0', NULL, NULL, '09368', NULL, 'Food', 'Container', NULL, NULL, 2, NULL, '2024-12-23 09:03:30', '2024-12-23 09:13:27', 16, 2, '2024-12-23', 11, 'cosl223', NULL, NULL),
(70, 38, NULL, 'main', NULL, '0', NULL, NULL, '09370', NULL, 'Tool', 'Box', NULL, NULL, 3, NULL, '2024-12-23 09:03:38', '2024-12-23 09:13:32', 16, 2, '2024-12-23', 11, 'cosl223', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carriers`
--

CREATE TABLE `carriers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carriers`
--

INSERT INTO `carriers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Truck', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Ship', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Plane', '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `crews`
--

CREATE TABLE `crews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `vessel_id` int(11) NOT NULL,
  `rank_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `crews`
--

INSERT INTO `crews` (`id`, `status`, `name`, `number`, `vessel_id`, `rank_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmad Juantoro', NULL, 11, 1, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 1, 'Dareza Arvian', NULL, 11, 2, '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deflections`
--

CREATE TABLE `deflections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `cargoitem_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `port_id` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`id`, `name`, `code`, `email`, `pic`, `created_at`, `updated_at`) VALUES
(1, 'Marine', 'MRN', 'marine@gmail.com', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Logistic', 'LGS', 'logistic@gmail.com', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Drilling', 'DRL', 'drilling@gmail.com', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 'Operation', 'OPS', 'operation@gmail.com', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `deviations`
--

CREATE TABLE `deviations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL,
  `schedule_id` smallint(6) NOT NULL,
  `port_id` smallint(6) NOT NULL,
  `desc` text NOT NULL,
  `reason` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `deviation_reports`
--

CREATE TABLE `deviation_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `deviation_id` mediumint(9) NOT NULL,
  `assign` datetime DEFAULT NULL,
  `confirm` datetime DEFAULT NULL,
  `fullaway` datetime DEFAULT NULL,
  `arrive` datetime DEFAULT NULL,
  `complete` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `port_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ekstensi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `status`, `department_id`, `port_id`, `code`, `name`, `username`, `email`, `ekstensi`, `created_at`, `updated_at`, `type`) VALUES
(1, 1, 1, 1, NULL, 'Marine', 'marine', 'marine@pertamina.com', '223', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(2, 1, 2, 1, NULL, 'Yoyo', 'yoyo', 'yoyo@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(3, 1, 2, 1, NULL, 'adm_logistic', 'adm_logistic', 'adm_logistic@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(4, 1, 2, 1, NULL, 'Kalijapat 4', 'kj4', 'kj4@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(5, 1, 2, 12, NULL, 'Pabelokan Island', 'pab', 'pab@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(6, 1, 2, 4, NULL, 'COSL 221', 'cosl221', 'cosl221@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(7, 1, 2, 5, NULL, 'COSL 222', 'cosl222', 'cosl222@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(8, 1, 2, 6, NULL, 'COSL 223', 'cosl223', 'cosl223@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(9, 1, 2, 7, NULL, 'COSL 225', 'cosl225', 'cosl225@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(10, 1, 2, 11, NULL, 'Onyx', 'onix', 'onix@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(11, 1, 2, 8, NULL, 'Winner', 'winner', 'winner@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(12, 1, 2, 10, NULL, 'Bayu Cakrawala', 'bca', 'bca@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(13, 1, 2, 18, NULL, 'Superior', 'superior', 'superior@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(14, 1, 2, 16, NULL, 'Ship 114', 'ship114', 'ship114@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(15, 1, 2, 9, NULL, 'Falcon', 'falcon', 'falcon@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(16, 1, 2, 13, NULL, 'Tanjung Lesung', 'tjlesung', 'tjlesung@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(17, 1, 2, 17, NULL, 'Federal', 'federal', 'federal@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(18, 1, 2, 14, NULL, 'HYSY 902', 'hysy902', 'hysy902@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(19, 1, 2, 15, NULL, 'Lisa', 'lisa', 'lisa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(20, 1, NULL, 19, NULL, 'Admin AIDA-A', 'aidaa', 'aidaa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(21, 1, NULL, 20, NULL, 'Admin ARYANI-A', 'aryania', 'aryania@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(22, 1, NULL, 21, NULL, 'Admin CHESSY-A', 'chessya', 'chessya@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(23, 1, NULL, 22, NULL, 'Admin INDRI-A', 'indria', 'indria@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(24, 1, NULL, 44, NULL, 'Admin FARIDA-A', 'faridaa', 'faridaa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(25, 1, NULL, 45, NULL, 'Admin FARIDA-B', 'faridab', 'faridab@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(26, 1, NULL, 50, NULL, 'Admin KRISNA-A', 'krisnaa', 'krisnaa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(27, 1, NULL, 51, NULL, 'Admin KRISNA-B', 'krisnaab', 'krisnab@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(28, 1, NULL, 73, NULL, 'Admin CINTA-A', 'cintaa', 'cintaa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(29, 1, NULL, 74, NULL, 'Admin CINTA-B', 'cintab', 'cintab@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(30, 1, 2, 92, NULL, 'Admin PABELOKAN ISLAND', 'pabelokan', 'pabelokan@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL),
(31, 1, NULL, 93, NULL, 'Admin RAMA-A', 'ramaa', 'ramaa@pertamina.com', '111', '2024-06-10 04:07:51', '2024-06-10 04:07:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `equipment`
--

CREATE TABLE `equipment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port_id` mediumint(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fuel_items`
--

CREATE TABLE `fuel_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_final` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cargo_id` mediumint(9) NOT NULL,
  `no_doc` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jetties`
--

CREATE TABLE `jetties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port_id` mediumint(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jetties`
--

INSERT INTO `jetties` (`id`, `port_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jetty 4A', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 1, 'Jetty 4B', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 1, 'Jetty 4C', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 2, 'Jetty 2A', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(5, 2, 'Jetty 2B', '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logistics`
--

CREATE TABLE `logistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logistics`
--

INSERT INTO `logistics` (`id`, `name`, `weight`, `size`, `created_at`, `updated_at`) VALUES
(1, 'Barang 1', 100, 80, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Barang 2', 230, 110, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Barang 3', 90, 50, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 'Barang 4', 25, 12, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(5, 'Barang 5', 55, 20, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(6, 'Barang 6', 70, 45, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(7, 'Barang 7', 50, 25, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `system` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vessel_id` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `vdr_id` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `table` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `logs`
--

INSERT INTO `logs` (`id`, `system`, `user_id`, `vessel_id`, `action`, `vdr_id`, `desc`, `table`, `created_at`, `updated_at`) VALUES
(1, 'VDR', 33, 11, 'Create VDR', 1, '', 'vdrs', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(2, 'VDR', 33, 11, 'Create VDR', 2, '', 'vdrs', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(3, 'VDR', 33, 11, 'Update Operating Data', 1, 'on VDR VDR#00001', 'vdr_operating', '2024-12-20 03:49:12', '2024-12-20 03:49:12'),
(4, 'VDR', 33, 11, 'Update Operating Data', 1, 'on VDR VDR#00001', 'vdr_operating', '2024-12-20 03:55:31', '2024-12-20 03:55:31'),
(5, 'VDR', 33, 11, 'Add Activity', 1, 'on VDR VDR#00001', 'vdr_activities', '2024-12-20 03:56:04', '2024-12-20 03:56:04'),
(6, 'VDR', 33, 11, 'Create VDR', 3, '', 'vdrs', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(7, 'VDR', 41, 36, 'Create VDR', 4, '', 'vdrs', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(8, 'VDR', 24, 2, 'Create VDR', 5, '', 'vdrs', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(9, 'VDR', 24, 2, 'Update Weather Condition', 5, 'on VDR VDR#00005', 'vdr_crews', '2024-12-23 06:04:06', '2024-12-23 06:04:06'),
(10, 'VDR', 24, 2, 'Add Activity', 5, 'on VDR VDR#00005', 'vdr_activities', '2024-12-23 06:05:11', '2024-12-23 06:05:11'),
(11, 'VDR', 24, 2, 'Update Operating Data', 5, 'on VDR VDR#00005', 'vdr_operating', '2024-12-23 06:07:25', '2024-12-23 06:07:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `material_men`
--

CREATE TABLE `material_men` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `port_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `material_men`
--

INSERT INTO `material_men` (`id`, `port_id`, `name`, `email`, `telp`, `created_at`, `updated_at`) VALUES
(21, 1, 'Material Man Kalijapat 4', 'mm_kj4@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(22, 4, 'Material Man COSL 221', 'mm_cosl221@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(23, 5, 'Material Man COSL 222', 'mm_cosl222@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(24, 6, 'Material Man COSL 223', 'mm_cosl223@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(25, 7, 'Material Man COSL 225', 'mm_cosl225@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(26, 8, 'Material Man Petroleum Winner', 'mm_winner@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(27, 9, 'Material Man Gunung Jati', 'mm_gnjati@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(28, 10, 'Material Man Falcon', 'mm_falcon@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(29, 11, 'Material Man Bayu Cakrawala', 'mm_bayuc@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(30, 12, 'Material Man Onyx', 'mm_onyx@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(31, 13, 'Material Man Pabelokan', 'mm_pabelokan@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(32, 14, 'Material Man Tanjung Lesung', 'mm_tjlesung@pertamina.com', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(33, 15, 'Material Man HYSY 902', 'mm_hysy902@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(34, 16, 'Material Man Lisa', 'mm_lisa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(35, 17, 'Material Man Ship 114', 'mm_ship114@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(36, 18, 'Material Man Federal', 'mm_federal@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(37, 19, 'Material Man Superior', 'mm_superior@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(38, 20, 'Material Man AIDA-A', 'mm_aidaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(39, 21, 'Material Man ARYANI-A', 'mm_aryania@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(40, 22, 'Material Man CHESSY-A', 'mm_chessya@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(41, 23, 'Material Man INDRI-A', 'mm_indria@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(42, 24, 'Material Man INTAN-A', 'mm_intana@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(43, 25, 'Material Man INTAN-AC (B.MONOPOD)', 'mm_intanac@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(44, 26, 'Material Man INTAN-B', 'mm_intanb@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(45, 27, 'Material Man INTAN-BPC', 'mm_intanbpc@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(46, 28, 'Material Man LIDYA-A', 'mm_lidyaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(47, 29, 'Material Man NE.INTAN-A', 'mm_neintana@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(48, 30, 'Material Man NE.INTAN-AC (MONOPOD)', 'mm_neintanac@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(49, 31, 'Material Man VITA-A (MONPOPOD)', 'mm_vitaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(50, 32, 'Material Man WIDURI-A', 'mm_widuria@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(51, 33, 'Material Man WIDURI-B', 'mm_widurib@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(52, 34, 'Material Man WIDURI-C', 'mm_widuric@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(53, 35, 'Material Man WIDURI-DC', 'mm_widuridc@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(54, 36, 'Material Man WIDURI-E', 'mm_widurie@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(55, 37, 'Material Man WIDURI-F (MONOPOD)', 'mm_widuria@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(56, 38, 'Material Man WIDURI-G (MONOPOD)', 'mm_widurig@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(57, 39, 'Material Man WIDURI-H (MONOPOD)', 'mm_widurih@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(58, 40, 'Material Man WIDURI-P', 'mm_widurip@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(59, 41, 'Material Man WINDRI-A (MONOPOD)', 'mm_windria@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(60, 42, 'Material Man ATTI-A (MONOPOD)', 'mm_attia@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(61, 43, 'Material Man BANUWATI-A', 'mm_banuwatia@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(62, 44, 'Material Man BANUWATI-K ', 'mm_banuwatik@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(63, 45, 'Material Man FARIDA-A ', 'mm_faridaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(64, 46, 'Material Man FARIDA-B ', 'mm_faridab@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(65, 47, 'Material Man FARIDA-C ', 'mm_faridac@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(66, 48, 'Material Man KARMILA-A ', 'mm_karmilaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(67, 49, 'Material Man KARTINI-A (MONOPOD)', 'mm_kartinia@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(68, 50, 'Material Man KRISNA-10 (TRIPOD)', 'mm_krisna10@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(69, 51, 'Material Man KRISNA-A ', 'mm_krisnaa@pertamina.com', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(70, 52, 'Material Man KRISNA-B ', 'mm_krisnab@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(71, 53, 'Material Man KRISNA-C ', 'mm_krisnac@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(72, 54, 'Material Man KRISNA-D ', 'mm_krisnad@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(73, 55, 'Material Man KRISNA-E ', 'mm_krisnae@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(74, 56, 'Material Man KRISNA-P ', 'mm_krisnap@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(75, 57, 'Material Man MILA-A ', 'mm_milaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(76, 58, 'Material Man Z.ZELDA-A (MONOPOD)', 'mm_zzeldaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(77, 59, 'Material Man SUNDARI-A ', 'mm_sundaria@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(78, 60, 'Material Man SUNDARI-B ', 'mm_sundarib@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(79, 61, 'Material Man THERESIA-A (MONOPOD)', 'mm_theresiaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(80, 62, 'Material Man TITI-A ', 'mm_titia@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(81, 63, 'Material Man YANI-A ', 'mm_yania@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(82, 64, 'Material Man YVONNE-A ', 'mm_yvonnea@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(83, 65, 'Material Man YVONNE-B ', 'mm_yvonneb@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(84, 66, 'Material Man ZELDA-A ', 'mm_zeldaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(85, 67, 'Material Man ZELDA-B ', 'mm_zeldab@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(86, 68, 'Material Man ZELDA-C ', 'mm_zeldac@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(87, 69, 'Material Man ZELDA-D ', 'mm_zeldad@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(88, 70, 'Material Man ZELDA-E ', 'mm_zeldae@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(89, 71, 'Material Man ZELDA-F (MONOPOD)', 'mm_zeldaf@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(90, 72, 'Material Man ZELDA-P ', 'mm_zeldap@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(91, 73, 'Material Man ZELDA-PC ', 'mm_zeldapc@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(92, 74, 'Material Man CINTA-A ', 'mm_cintaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(93, 75, 'Material Man CINTA-B ', 'mm_cintab@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(94, 76, 'Material Man CINTA-C ', 'mm_cintac@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(95, 77, 'Material Man CINTA-D ', 'mm_cintad@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(96, 78, 'Material Man CINTA-E ', 'mm_cintae@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(97, 79, 'Material Man CINTA-F ', 'mm_cintaf@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(98, 80, 'Material Man CINTA-G ', 'mm_cintag@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(99, 81, 'Material Man CINTA-H ', 'mm_cintah@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(100, 82, 'Material Man CINTA-P ', 'mm_cintap@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(101, 83, 'Material Man CINTA-P1 ', 'mm_cintap1@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(102, 84, 'Material Man DUMA-A (JACKET ONLY)', 'mm_dumaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(103, 85, 'Material Man E.RAMA-A (MONOPOD)', 'mm_eramaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(104, 86, 'Material Man GITA-A ', 'mm_gitaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(105, 87, 'Material Man KITTY-4 (CAISSON)', 'mm_kitty4@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(106, 88, 'Material Man KITTY-A ', 'mm_kittya@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(107, 89, 'Material Man LITA-A (MONOPOD)', 'mm_litaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(108, 90, 'Material Man N.WANDA-A (MONOPOD)', 'mm_nwandaa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(109, 91, 'Material Man N.WANDA-B (MONOPOD)', 'mm_nwandab@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(110, 92, 'Material Man NORA-A', 'mm_noraa@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(111, 93, 'Material Man PABELOKAN ISLAND', 'mm_pabelokan@pertamina.com', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_13_034532_create_vessels_table', 1),
(6, '2023_01_13_035149_create_ports_table', 1),
(7, '2023_01_13_035203_create_schedules_table', 1),
(8, '2023_01_16_025724_create_cargos_table', 1),
(9, '2023_01_18_091709_create_logistics_table', 1),
(10, '2023_01_18_145810_create_equipment_table', 1),
(11, '2023_01_18_145906_create_jetties_table', 1),
(12, '2023_01_20_135043_create_permission_tables', 1),
(13, '2023_02_03_090819_create_reports_table', 1),
(14, '2023_02_23_150942_create_platforms_table', 1),
(15, '2023_02_23_151056_create_parties_table', 1),
(16, '2023_02_23_151140_create_carriers_table', 1),
(17, '2023_03_13_112637_create_items_table', 1),
(18, '2023_03_13_132046_create_cargo_items_table', 1),
(19, '2023_03_13_160029_create_wos_table', 1),
(20, '2023_03_15_092349_create_departments_table', 1),
(21, '2023_03_15_093150_create_activities_table', 1),
(22, '2023_03_15_093213_create_activity_types_table', 1),
(23, '2023_03_15_094755_create_requests_table', 1),
(24, '2023_03_15_095246_create_types_table', 1),
(25, '2023_03_15_141458_create_payload_types_table', 1),
(26, '2023_03_16_105732_create_route_types_table', 1),
(27, '2023_03_16_113236_create_routes_table', 1),
(28, '2023_04_03_135336_create_report_vessels_table', 1),
(29, '2023_04_06_082602_create_employees_table', 1),
(30, '2023_04_10_092505_create_passenger_items_table', 1),
(31, '2023_04_14_111220_create_request_histories_table', 1),
(32, '2023_05_05_194007_create_deviations_table', 1),
(33, '2023_05_08_083930_create_deviation_reports_table', 1),
(34, '2023_05_17_113704_create_parent_requests_table', 1),
(35, '2023_05_23_084324_create_vessel_statuses_table', 1),
(36, '2023_05_23_084905_create_statuses_table', 1),
(37, '2023_05_23_132413_create_schedule_routes_table', 1),
(38, '2023_05_25_140237_create_postpones_table', 1),
(39, '2023_07_04_164107_create_offloadings_table', 1),
(40, '2023_07_20_110205_create_report_requests_table', 1),
(41, '2023_07_21_110042_create_actual_requests_table', 1),
(42, '2023_07_21_135200_create_deflections_table', 1),
(43, '2023_08_07_143938_create_request_rejects_table', 1),
(44, '2023_08_09_090015_create_crews_table', 1),
(45, '2023_11_15_174149_create_schedule_vessels_table', 1),
(46, '2023_11_16_140758_create_vdrs_table', 1),
(47, '2023_11_16_143515_create_vdr_weather_table', 1),
(48, '2023_11_16_145049_create_vdr_hse_headers_table', 1),
(49, '2023_11_16_145850_create_vdr_headers_table', 1),
(50, '2023_11_16_150110_create_vdr_activities_table', 1),
(51, '2023_11_16_152422_create_vdr_operating_headers_table', 1),
(52, '2023_11_16_152623_create_vdr_operatings_table', 1),
(53, '2023_11_16_165048_create_vdr_cargo_headings_table', 1),
(54, '2023_11_16_165610_create_vdr_cargos_table', 1),
(55, '2023_11_16_170735_create_vdr_engine_headings_table', 1),
(56, '2023_11_16_170927_create_vdr_engines_table', 1),
(57, '2023_11_16_172434_create_vdr_passengers_table', 1),
(58, '2023_11_23_162413_create_vdr_weather_headings_table', 1),
(59, '2023_11_23_180036_create_vdr_hses_table', 1),
(60, '2023_11_28_100612_create_vdr_crews_table', 1),
(61, '2023_11_29_085505_create_barge_items_table', 1),
(62, '2023_12_04_085505_create_surveillances_table', 1),
(63, '2023_12_04_090434_create_surveillance_crews_table', 1),
(64, '2023_12_04_090449_create_surveillance_cargos_table', 1),
(65, '2023_12_08_102929_create_vessel_histories_table', 1),
(66, '2023_12_13_102301_create_report_surveillances_table', 1),
(67, '2023_12_15_145417_create_fuel_items_table', 1),
(68, '2023_12_15_145442_create_water_items_table', 1),
(69, '2024_01_18_101633_create_ranks_table', 1),
(70, '2024_01_18_105042_create_logs_table', 1),
(71, '2024_01_22_081731_create_documents_table', 1),
(72, '2024_02_02_110239_create_news_table', 1),
(73, '2024_02_19_104154_create_revisions_table', 1),
(74, '2024_02_20_104056_create_images_table', 1),
(75, '2024_02_20_142134_create_vdr_timestamps_table', 1),
(76, '2024_02_25_194642_create_vdr_periodics_table', 1),
(77, '2024_03_28_111834_create_schedule_documents_table', 1),
(78, '2024_10_24_090453_create_material_men_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(5, 'App\\Models\\User', 7),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 5),
(8, 'App\\Models\\User', 6),
(8, 'App\\Models\\User', 8),
(8, 'App\\Models\\User', 9),
(8, 'App\\Models\\User', 10),
(8, 'App\\Models\\User', 11),
(8, 'App\\Models\\User', 12),
(8, 'App\\Models\\User', 13),
(8, 'App\\Models\\User', 14),
(8, 'App\\Models\\User', 15),
(8, 'App\\Models\\User', 16),
(8, 'App\\Models\\User', 17),
(8, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 19),
(8, 'App\\Models\\User', 20),
(8, 'App\\Models\\User', 21),
(8, 'App\\Models\\User', 22),
(8, 'App\\Models\\User', 59),
(8, 'App\\Models\\User', 60),
(8, 'App\\Models\\User', 61),
(8, 'App\\Models\\User', 62),
(8, 'App\\Models\\User', 63),
(8, 'App\\Models\\User', 64),
(8, 'App\\Models\\User', 65),
(8, 'App\\Models\\User', 66),
(8, 'App\\Models\\User', 67),
(8, 'App\\Models\\User', 68),
(8, 'App\\Models\\User', 69),
(8, 'App\\Models\\User', 70),
(9, 'App\\Models\\User', 23),
(9, 'App\\Models\\User', 24),
(9, 'App\\Models\\User', 25),
(9, 'App\\Models\\User', 26),
(9, 'App\\Models\\User', 27),
(9, 'App\\Models\\User', 28),
(9, 'App\\Models\\User', 29),
(9, 'App\\Models\\User', 30),
(9, 'App\\Models\\User', 31),
(9, 'App\\Models\\User', 32),
(9, 'App\\Models\\User', 33),
(9, 'App\\Models\\User', 34),
(9, 'App\\Models\\User', 35),
(9, 'App\\Models\\User', 36),
(9, 'App\\Models\\User', 37),
(9, 'App\\Models\\User', 38),
(9, 'App\\Models\\User', 39),
(9, 'App\\Models\\User', 40),
(9, 'App\\Models\\User', 41),
(9, 'App\\Models\\User', 42),
(9, 'App\\Models\\User', 43),
(9, 'App\\Models\\User', 44),
(9, 'App\\Models\\User', 45),
(9, 'App\\Models\\User', 46),
(9, 'App\\Models\\User', 47),
(9, 'App\\Models\\User', 48),
(9, 'App\\Models\\User', 49),
(9, 'App\\Models\\User', 50),
(9, 'App\\Models\\User', 51),
(9, 'App\\Models\\User', 52),
(9, 'App\\Models\\User', 53),
(9, 'App\\Models\\User', 54),
(9, 'App\\Models\\User', 55),
(9, 'App\\Models\\User', 56),
(9, 'App\\Models\\User', 57),
(9, 'App\\Models\\User', 58),
(10, 'App\\Models\\User', 72),
(11, 'App\\Models\\User', 71),
(13, 'App\\Models\\User', 2),
(14, 'App\\Models\\User', 3),
(15, 'App\\Models\\User', 4),
(20, 'App\\Models\\User', 73),
(20, 'App\\Models\\User', 75),
(20, 'App\\Models\\User', 76),
(20, 'App\\Models\\User', 78),
(20, 'App\\Models\\User', 79),
(20, 'App\\Models\\User', 80),
(20, 'App\\Models\\User', 81),
(20, 'App\\Models\\User', 82),
(20, 'App\\Models\\User', 83),
(20, 'App\\Models\\User', 84),
(20, 'App\\Models\\User', 85),
(20, 'App\\Models\\User', 86),
(20, 'App\\Models\\User', 87),
(20, 'App\\Models\\User', 88),
(20, 'App\\Models\\User', 89),
(20, 'App\\Models\\User', 90),
(20, 'App\\Models\\User', 91),
(20, 'App\\Models\\User', 92),
(20, 'App\\Models\\User', 93),
(20, 'App\\Models\\User', 94),
(20, 'App\\Models\\User', 95),
(20, 'App\\Models\\User', 96),
(20, 'App\\Models\\User', 97),
(20, 'App\\Models\\User', 98),
(20, 'App\\Models\\User', 99),
(20, 'App\\Models\\User', 100),
(20, 'App\\Models\\User', 101),
(20, 'App\\Models\\User', 102),
(20, 'App\\Models\\User', 103),
(20, 'App\\Models\\User', 104),
(20, 'App\\Models\\User', 105),
(20, 'App\\Models\\User', 106),
(20, 'App\\Models\\User', 107),
(20, 'App\\Models\\User', 108),
(20, 'App\\Models\\User', 109),
(20, 'App\\Models\\User', 110);

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` varchar(8888) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `user_id`, `status`, `code`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Pengumuman Libur Nasional dan Cuti Bersama Tanggal 8 & 9 Februari', NULL, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae voluptatem hic eveniet nam laudantium sequi! Recusandae fugit quis placeat autem veritatis culpa minima fugiat illum aliquam? Omnis itaque eum voluptatem, voluptate dolores quas dignissimos tempora? Explicabo doloribus officiis eveniet necessitatibus labore laudantium, eius adipisci, blanditiis quibusdam, praesentium numquam perspiciatis asperiores? Ea quaerat officiis accusamus quos neque fugiat voluptas error unde, perspiciatis quasi distinctio, repudiandae eligendi odio consectetur deleniti nesciunt incidunt sapiente sit ipsa ratione et amet. Accusantium, id sed, facere nemo dolore omnis fuga dolores animi nihil commodi illo ipsum vel quibusdam ab minima, quae at tenetur expedita? Quidem aspernatur maiores consequuntur perspiciatis libero nisi distinctio culpa? Quae sunt mollitia fugit cupiditate iusto repellendus possimus, nesciunt molestiae dolores similique, porro hic. Eos nam quasi modi accusamus illum alias neque, corrupti sed exercitationem porro, laudantium, est perferendis magni dolorem! Dolor, et.', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `offloadings`
--

CREATE TABLE `offloadings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `cargoitem_id` int(11) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `deflection_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `offloading` int(11) NOT NULL,
  `onboard` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `offloadings`
--

INSERT INTO `offloadings` (`id`, `schedule_id`, `request_id`, `cargoitem_id`, `employee_id`, `deflection_id`, `qty`, `offloading`, `onboard`, `desc`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 9, 25, 50, NULL, NULL, 3, 3, 0, NULL, '2024-10-25 04:00:44', '2024-10-25 04:00:44', 87),
(2, 9, 25, 50, NULL, NULL, 3, 3, 0, NULL, '2024-10-25 04:01:19', '2024-10-25 04:01:19', 87),
(3, 9, 25, 50, NULL, NULL, 3, 3, 0, NULL, '2024-10-25 04:02:06', '2024-10-25 04:02:06', 87),
(4, 9, 25, 51, NULL, NULL, 5, 5, 0, NULL, '2024-10-25 04:03:18', '2024-10-25 04:03:18', 87),
(5, 9, 26, 52, NULL, NULL, 2, 2, 0, NULL, '2024-10-28 02:21:12', '2024-10-28 02:21:12', 90);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parent_requests`
--

CREATE TABLE `parent_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` mediumint(9) NOT NULL,
  `status` smallint(6) NOT NULL,
  `code` varchar(255) NOT NULL,
  `origin_id` mediumint(9) NOT NULL,
  `date` date NOT NULL,
  `user_id` mediumint(9) NOT NULL,
  `employee_id` mediumint(9) NOT NULL,
  `department_id` mediumint(9) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parent_requests`
--

INSERT INTO `parent_requests` (`id`, `activity_id`, `status`, `code`, `origin_id`, `date`, `user_id`, `employee_id`, `department_id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PR/071024/1', 1, '2024-10-08', 9, 6, 2, 'Mobilized Material', '2024-10-07 07:13:33', '2024-10-07 07:14:07'),
(2, 1, 0, 'PR/071024/2', 1, '2024-10-08', 9, 6, 2, 'Mobilized Material', '2024-10-07 07:16:39', '2024-10-07 07:16:39'),
(3, 1, 1, 'PR/071024/3', 1, '2024-10-08', 9, 6, 2, 'Mobilized Material', '2024-10-07 07:21:01', '2024-10-07 07:21:36'),
(4, 1, 1, 'PR/071024/4', 1, '2024-10-08', 9, 6, 2, 'Mobilized Material', '2024-10-07 08:35:44', '2024-10-07 08:37:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `platform_id` mediumint(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parties`
--

INSERT INTO `parties` (`id`, `platform_id`, `name`, `tagline`, `email`, `desc`, `type`, `logo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Indofood', 'Lorem, ipsum dolor.', 'indofood@gmail.com', NULL, 2, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 1, 'Unilever', NULL, 'unilever@gmail.com', NULL, 2, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 2, 'Kalbe', NULL, 'kalbe@gmail.com', NULL, 2, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 1, 'Gemilang Logistic', NULL, 'gemilang@gmail.com', NULL, 3, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(5, 1, 'Intan Area', NULL, 'intan@gmail.com', NULL, 4, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(6, 2, 'Krisna', NULL, 'krisna@gmail.com', NULL, 4, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `passenger_items`
--

CREATE TABLE `passenger_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `crew_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `passenger_items`
--

INSERT INTO `passenger_items` (`id`, `request_id`, `type`, `crew_id`, `name`, `barcode`, `department`, `company`, `desc`, `created_at`, `updated_at`) VALUES
(1, 36, 'Departure', NULL, 'Rahmat Hidayat', '1245434', 'IT', 'GTI', '-', '2024-12-23 04:24:13', '2024-12-23 04:24:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payload_types`
--

CREATE TABLE `payload_types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(3) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payload_types`
--

INSERT INTO `payload_types` (`id`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CRG', 'Material Cargo', '1', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'PSR', 'Passenger', '1', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'CRW', 'CREW', '1', '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `platforms`
--

CREATE TABLE `platforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `system` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `platforms`
--

INSERT INTO `platforms` (`id`, `name`, `system`, `tagline`, `email`, `desc`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'ENC', 'DSP-ENC', 'Integrated Logistic', 'enc@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Graha Segara', 'DSP-GS', 'Behandle Container', 'gs@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Ekatama', 'DSP-WKATAMA', 'Trucking Delivery', 'ekatama@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam numquam eius doloremque.', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ports`
--

CREATE TABLE `ports` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `func` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `mtd` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `imo` varchar(255) DEFAULT NULL,
  `mmsi` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `port_id` int(11) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ports`
--

INSERT INTO `ports` (`id`, `func`, `code`, `mtd`, `name`, `email`, `type`, `region`, `txid`, `imo`, `mmsi`, `latitude`, `longitude`, `port_id`, `platform`, `created_at`, `updated_at`) VALUES
(1, NULL, 'KJ4', NULL, 'Kalijapat 4', 'kj4@pertamina.com', 'Port', NULL, NULL, NULL, NULL, '-6.114402', '106.861452', NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 'DWI', '221', '091', 'COSL 221', 'cosl221@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(5, 'DWI', '222', '092', 'COSL 222', 'cosl222@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(6, 'DWI', '223', '093', 'COSL 223', 'cosl223@pertamina.com', 'Barge', NULL, '01157764SKY52D1', '9743772', '525019671', NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(7, 'DWI', '225', '095', 'COSL 225', 'cosl225@pertamina.com', 'Barge', NULL, '01143850SKYDB0F', '9743772', '525019671', NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(8, 'DWI', 'WINNER', NULL, 'Petroleum Winner', 'winner@pertamina.com', 'Barge', NULL, '01143661SKY635E', '8767800', '525019624', NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(9, 'DWI', 'GN-JATI', NULL, 'Gunung Jati', 'gnjati@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(10, NULL, 'FALCON', NULL, 'Falcon', 'falcon@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(11, NULL, 'BCA', NULL, 'Bayu Cakrawala', 'bayuc@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(12, NULL, 'Onyx', NULL, 'Onyx', 'onyx@pertamina.com', 'Barge', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(13, NULL, 'PAB', NULL, 'Pabelokan', 'pabelokan@pertamina.com', 'Island', NULL, NULL, NULL, NULL, '-5.480265', '106.393652', NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(14, NULL, 'Tj. LESUNG', NULL, 'Tanjung Lesung', 'tjlesung@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(15, NULL, 'HYSY902', NULL, 'HYSY 902', 'hysy902@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(16, NULL, 'LISA', NULL, 'Lisa', 'lisa@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(17, NULL, 'S114', NULL, 'Ship 114', 'ship114@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(18, NULL, 'FEDERAL', NULL, 'Federal', 'federal@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(19, NULL, 'Superior', NULL, 'Superior', 'superior@pertamina.com', 'Rig/Barge/Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(20, NULL, 'AIDA-A', NULL, 'AIDA-A', 'aidaa@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(21, NULL, 'ARYANI-A', NULL, 'ARYANI-A', 'aryania@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(22, NULL, 'CHESSY-A', NULL, 'CHESSY-A', 'chessya@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(23, NULL, 'INDRI-A', NULL, 'INDRI-A', 'indria@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(24, NULL, 'INTAN-A', NULL, 'INTAN-A', 'intana@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(25, NULL, 'INTAN-AC', NULL, 'INTAN-AC (B.MONOPOD)', 'intanac@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(26, NULL, 'INTAN-B', NULL, 'INTAN-B', 'intanb@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(27, NULL, 'INTAN-BPC', NULL, 'INTAN-BPC', 'intanbpc@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(28, NULL, 'LIDYA-A', NULL, 'LIDYA-A', 'lidyaa@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(29, NULL, 'NE.INTAN-A', NULL, 'NE.INTAN-A', 'neintana@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(30, NULL, 'NE.INTAN-AC', NULL, 'NE.INTAN-AC (MONOPOD)', 'neintanac@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(31, NULL, 'VITA-A', NULL, 'VITA-A (MONPOPOD)', 'vitaa@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(32, NULL, 'WIDURI-A', NULL, 'WIDURI-A', 'widuria@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(33, NULL, 'WIDURI-B', NULL, 'WIDURI-B', 'widurib@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(34, NULL, 'WIDURI-C', NULL, 'WIDURI-C', 'widuric@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(35, NULL, 'WIDURI-DC', NULL, 'WIDURI-DC', 'widuridc@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(36, NULL, 'WIDURI-E', NULL, 'WIDURI-E', 'widurie@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(37, NULL, 'WIDURI-F', NULL, 'WIDURI-F (MONOPOD)', 'widuria@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(38, NULL, 'WIDURI-G', NULL, 'WIDURI-G (MONOPOD)', 'widurig@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(39, NULL, 'WIDURI-H', NULL, 'WIDURI-H (MONOPOD)', 'widurih@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(40, NULL, 'WIDURI-P', NULL, 'WIDURI-P', 'widurip@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(41, NULL, 'WINDRI-A', NULL, 'WINDRI-A (MONOPOD)', 'windria@pertamina.com', 'Platform', 'NBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(42, NULL, 'ATTI-A', NULL, 'ATTI-A (MONOPOD)', 'attia@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(43, NULL, 'BANUWATI-A', NULL, 'BANUWATI-A', 'banuwatia@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(44, NULL, 'BANUWATI-K', NULL, 'BANUWATI-K ', 'banuwatik@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(45, NULL, 'FARIDA-A', NULL, 'FARIDA-A ', 'faridaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(46, NULL, 'FARIDA-B', NULL, 'FARIDA-B ', 'faridab@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(47, NULL, 'FARIDA-C', NULL, 'FARIDA-C ', 'faridac@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(48, NULL, 'KARMILA-A', NULL, 'KARMILA-A ', 'karmilaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(49, NULL, 'KARTINI-A', NULL, 'KARTINI-A (MONOPOD)', 'kartinia@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(50, NULL, 'KRISNA-10', NULL, 'KRISNA-10 (TRIPOD)', 'krisna10@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(51, NULL, 'KRISNA-A', NULL, 'KRISNA-A ', 'krisnaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(52, NULL, 'KRISNA-B', NULL, 'KRISNA-B ', 'krisnab@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(53, NULL, 'KRISNA-C', NULL, 'KRISNA-C ', 'krisnac@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(54, NULL, 'KRISNA-D', NULL, 'KRISNA-D ', 'krisnad@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(55, NULL, 'KRISNA-E', NULL, 'KRISNA-E ', 'krisnae@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(56, NULL, 'KRISNA-P', NULL, 'KRISNA-P ', 'krisnap@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(57, NULL, 'MILA-A', NULL, 'MILA-A ', 'milaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(58, NULL, 'Z.ZELDA-A', NULL, 'Z.ZELDA-A (MONOPOD)', 'zzeldaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(59, NULL, 'SUNDARI-A', NULL, 'SUNDARI-A ', 'sundaria@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(60, NULL, 'SUNDARI-B', NULL, 'SUNDARI-B ', 'sundarib@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(61, NULL, 'THERESIA-A', NULL, 'THERESIA-A (MONOPOD)', 'theresiaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(62, NULL, 'TITI-A', NULL, 'TITI-A ', 'titia@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(63, NULL, 'YANI-A', NULL, 'YANI-A ', 'yania@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(64, NULL, 'YVONNE-A', NULL, 'YVONNE-A ', 'yvonnea@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(65, NULL, 'YVONNE-B', NULL, 'YVONNE-B ', 'yvonneb@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(66, NULL, 'ZELDA-A', NULL, 'ZELDA-A ', 'zeldaa@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(67, NULL, 'ZELDA-B', NULL, 'ZELDA-B ', 'zeldab@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(68, NULL, 'ZELDA-C', NULL, 'ZELDA-C ', 'zeldac@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(69, NULL, 'ZELDA-D', NULL, 'ZELDA-D ', 'zeldad@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(70, NULL, 'ZELDA-E', NULL, 'ZELDA-E ', 'zeldae@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(71, NULL, 'ZELDA-F', NULL, 'ZELDA-F (MONOPOD)', 'zeldaf@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(72, NULL, 'ZELDA-P', NULL, 'ZELDA-P ', 'zeldap@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(73, NULL, 'ZELDA-PC', NULL, 'ZELDA-PC ', 'zeldapc@pertamina.com', 'Platform', 'CBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(74, NULL, 'CINTA-A', NULL, 'CINTA-A ', 'cintaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(75, NULL, 'CINTA-B', NULL, 'CINTA-B ', 'cintab@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(76, NULL, 'CINTA-C', NULL, 'CINTA-C ', 'cintac@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(77, NULL, 'CINTA-D', NULL, 'CINTA-D ', 'cintad@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(78, NULL, 'CINTA-E', NULL, 'CINTA-E ', 'cintae@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(79, NULL, 'CINTA-F', NULL, 'CINTA-F ', 'cintaf@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(80, NULL, 'CINTA-G', NULL, 'CINTA-G ', 'cintag@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(81, NULL, 'CINTA-H', NULL, 'CINTA-H ', 'cintah@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(82, NULL, 'CINTA-P', NULL, 'CINTA-P ', 'cintap@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(83, NULL, 'CINTA-P1', NULL, 'CINTA-P1 ', 'cintap1@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(84, NULL, 'DUMA-A', NULL, 'DUMA-A (JACKET ONLY)', 'dumaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(85, NULL, 'E.RAMA-A', NULL, 'E.RAMA-A (MONOPOD)', 'eramaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(86, NULL, 'GITA-A', NULL, 'GITA-A ', 'gitaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(87, NULL, 'KITTY-4', NULL, 'KITTY-4 (CAISSON)', 'kitty4@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(88, NULL, 'KITTY-A', NULL, 'KITTY-A ', 'kittya@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(89, NULL, 'LITA-A', NULL, 'LITA-A (MONOPOD)', 'litaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(90, NULL, 'N.WANDA-A', NULL, 'N.WANDA-A (MONOPOD)', 'nwandaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(91, NULL, 'N.WANDA-B', NULL, 'N.WANDA-B (MONOPOD)', 'nwandab@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(92, NULL, 'NORA-A', NULL, 'NORA-A', 'noraa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(93, NULL, 'PABELOKAN ISLAND', NULL, 'PABELOKAN ISLAND', 'pabelokan@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(94, NULL, 'RAMA-A', NULL, 'RAMA-A ', 'ramaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(95, NULL, 'RAMA-B', NULL, 'RAMA-B ', 'ramab@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(96, NULL, 'RAMA-C', NULL, 'RAMA-C ', 'ramac@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(97, NULL, 'RAMA-D', NULL, 'RAMA-D ', 'ramad@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(98, NULL, 'RAMA-E', NULL, 'RAMA-E ', 'ramae@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(99, NULL, 'RAMA-F', NULL, 'RAMA-F ', 'ramaf@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(100, NULL, 'RAMA-G', NULL, 'RAMA-G ', 'ramag@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(101, NULL, 'RAMA-H', NULL, 'RAMA-H ', 'ramah@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(102, NULL, 'RAMA-I', NULL, 'RAMA-I ', 'ramai@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(103, NULL, 'RAMA-P', NULL, 'RAMA-P ', 'ramap@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(104, NULL, 'RETNO-A', NULL, 'RETNO-A (JACKET ONLY)', 'retnoa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(105, NULL, 'SELATAN-A', NULL, 'SELATAN-A (JACKET ONLY)', 'selatana@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(106, NULL, 'SELATAN-B', NULL, 'SELATAN-B (JACKET ONLY)', 'selatanb@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(107, NULL, 'SELATAN-C', NULL, 'SELATAN-C (JACKET ONLY)', 'selatanc@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(108, NULL, 'SURATMI-A', NULL, 'SURATMI-A', 'suratmia@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(109, NULL, 'SW.WANDA-A', NULL, 'SW.WANDA-A (MONOPOD)', 'swwandaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(110, NULL, 'WANDA-A', NULL, 'WANDA-A', 'wandaa@pertamina.com', 'Platform', 'SBU', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `postpones`
--

CREATE TABLE `postpones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) NOT NULL,
  `schedule_id` mediumint(9) NOT NULL,
  `from` datetime NOT NULL,
  `to` datetime NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ranks`
--

CREATE TABLE `ranks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Master', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Chief Officer', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, '2nd Officer', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'Chief Engineer', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, '2nd Engineer', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, '3rd Engineer', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'Oiler', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'AB', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` mediumint(9) NOT NULL,
  `vessel_id` mediumint(9) DEFAULT NULL,
  `employee_id` mediumint(9) DEFAULT NULL,
  `status_id` mediumint(9) DEFAULT NULL,
  `port_id` mediumint(9) DEFAULT NULL,
  `destination_id` mediumint(9) DEFAULT NULL,
  `anchor` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `eta` datetime DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `cob` varchar(255) DEFAULT NULL,
  `pob` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `schedule_id`, `vessel_id`, `employee_id`, `status_id`, `port_id`, `destination_id`, `anchor`, `desc`, `eta`, `foto`, `date`, `doc`, `cob`, `pob`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-24 07:16:56', '2024-09-24 07:16:56'),
(2, 1, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-24 07:17:30', '2024-09-24 07:17:30'),
(3, 2, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-24 07:43:33', '2024-09-24 07:43:33'),
(4, 6, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-14 07:04:58', '2024-10-14 07:04:58'),
(5, 8, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-18 08:07:39', '2024-10-18 08:07:39'),
(6, 8, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-23 07:25:10', '2024-10-23 07:25:10'),
(7, 9, 7, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-23 08:02:05', '2024-10-23 08:02:05'),
(8, 9, 7, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(9, 9, 7, NULL, 3, 1, NULL, NULL, NULL, NULL, '', '2024-10-21 07:10:00', '', NULL, NULL, '2024-10-24 01:42:37', '2024-10-24 01:42:37'),
(10, 9, 7, NULL, 4, 1, NULL, NULL, NULL, NULL, '', '2024-10-21 07:45:00', '', NULL, NULL, '2024-10-24 01:43:02', '2024-10-24 01:43:02'),
(11, 9, 7, NULL, 5, 1, NULL, NULL, NULL, NULL, '', '2024-10-21 08:45:00', '', NULL, NULL, '2024-10-24 01:43:16', '2024-10-24 01:43:16'),
(12, 9, 7, NULL, 6, 1, 4, NULL, NULL, '2024-10-21 10:45:00', '', '2024-10-21 09:15:00', '', NULL, NULL, '2024-10-24 01:44:09', '2024-10-24 01:44:09'),
(13, 9, 7, NULL, 8, 4, NULL, NULL, NULL, NULL, '', '2024-10-21 10:40:00', '', NULL, NULL, '2024-10-24 01:44:56', '2024-10-24 01:44:56'),
(14, 9, 7, NULL, 9, 4, NULL, NULL, NULL, NULL, 'report/evidance/GiKgJ2CXWTuApljsly0P57sVFckfX9sFUfMHlzWZ.png', '2024-10-21 11:10:00', '', NULL, NULL, '2024-10-24 01:51:06', '2024-10-24 01:51:06'),
(15, 9, 7, NULL, 10, 4, NULL, NULL, NULL, NULL, '', '2024-10-21 11:34:00', '', NULL, NULL, '2024-10-24 01:51:40', '2024-10-24 01:51:40'),
(20, 9, 7, NULL, 12, 4, NULL, NULL, NULL, NULL, '', '2024-10-21 13:00:00', '', NULL, NULL, '2024-10-25 06:57:47', '2024-10-25 06:57:47'),
(21, 9, 7, NULL, 6, 4, 7, NULL, NULL, '2024-10-21 18:20:00', '', '2024-10-21 15:17:00', '', NULL, NULL, '2024-10-25 07:17:18', '2024-10-25 07:17:18'),
(22, 9, 7, NULL, 8, 7, NULL, NULL, NULL, NULL, '', '2024-10-21 18:40:00', '', NULL, NULL, '2024-10-28 02:19:58', '2024-10-28 02:19:58'),
(23, 9, 7, NULL, 10, 7, NULL, NULL, NULL, NULL, '', '2024-10-21 19:10:00', '', NULL, NULL, '2024-10-28 02:20:18', '2024-10-28 02:20:18'),
(24, 9, 7, NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-10-28 02:21:12', '2024-10-28 02:21:12'),
(25, 12, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-05 01:47:09', '2024-11-05 01:47:09'),
(26, 12, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-05 02:05:37', '2024-11-05 02:05:37'),
(27, 12, 2, NULL, 3, 1, NULL, NULL, NULL, NULL, '', '2024-11-05 08:10:00', '', NULL, NULL, '2024-11-05 02:06:26', '2024-11-05 02:06:26'),
(28, 13, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-05 02:09:24', '2024-11-05 02:09:24'),
(29, 15, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 02:20:08', '2024-12-23 02:20:08'),
(30, 16, 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 03:59:51', '2024-12-23 03:59:51'),
(31, 16, 2, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 04:02:58', '2024-12-23 04:02:58'),
(32, 16, 2, NULL, 4, 1, NULL, NULL, NULL, NULL, '', '2024-12-23 07:07:00', '', NULL, NULL, '2024-12-23 04:04:00', '2024-12-23 04:04:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_requests`
--

CREATE TABLE `report_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` mediumint(9) NOT NULL,
  `employee_id` mediumint(9) DEFAULT NULL,
  `status_id` mediumint(9) NOT NULL,
  `port_id` mediumint(9) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_requests`
--

INSERT INTO `report_requests` (`id`, `request_id`, `employee_id`, `status_id`, `port_id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 1, NULL, NULL, '2024-09-24 07:16:56', '2024-09-24 07:16:56'),
(2, 3, NULL, 2, NULL, NULL, '2024-09-24 07:17:30', '2024-09-24 07:17:30'),
(3, 3, NULL, 2, NULL, NULL, '2024-09-24 07:17:30', '2024-09-24 07:17:30'),
(4, 2, NULL, 1, NULL, NULL, '2024-09-24 07:43:33', '2024-09-24 07:43:33'),
(5, 20, NULL, 1, NULL, NULL, '2024-10-14 07:04:58', '2024-10-14 07:04:58'),
(6, 21, NULL, 1, NULL, NULL, '2024-10-14 07:04:58', '2024-10-14 07:04:58'),
(7, 22, NULL, 1, NULL, NULL, '2024-10-14 07:04:58', '2024-10-14 07:04:58'),
(8, 25, NULL, 1, NULL, NULL, '2024-10-23 08:02:05', '2024-10-23 08:02:05'),
(9, 26, NULL, 1, NULL, NULL, '2024-10-23 08:02:05', '2024-10-23 08:02:05'),
(10, 27, NULL, 1, NULL, NULL, '2024-10-23 08:02:05', '2024-10-23 08:02:05'),
(11, 25, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(12, 26, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(13, 27, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(14, 25, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(15, 26, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(16, 27, NULL, 2, NULL, NULL, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(17, 25, NULL, 3, 1, NULL, '2024-10-24 01:42:37', '2024-10-24 01:42:37'),
(18, 26, NULL, 3, 1, NULL, '2024-10-24 01:42:37', '2024-10-24 01:42:37'),
(19, 27, NULL, 3, 1, NULL, '2024-10-24 01:42:37', '2024-10-24 01:42:37'),
(20, 25, NULL, 4, 1, NULL, '2024-10-24 01:43:02', '2024-10-24 01:43:02'),
(21, 26, NULL, 4, 1, NULL, '2024-10-24 01:43:02', '2024-10-24 01:43:02'),
(22, 27, NULL, 4, 1, NULL, '2024-10-24 01:43:02', '2024-10-24 01:43:02'),
(23, 25, NULL, 5, 1, NULL, '2024-10-24 01:43:16', '2024-10-24 01:43:16'),
(24, 26, NULL, 5, 1, NULL, '2024-10-24 01:43:16', '2024-10-24 01:43:16'),
(25, 27, NULL, 5, 1, NULL, '2024-10-24 01:43:16', '2024-10-24 01:43:16'),
(26, 25, NULL, 6, 1, NULL, '2024-10-24 01:44:09', '2024-10-24 01:44:09'),
(27, 26, NULL, 6, 1, NULL, '2024-10-24 01:44:09', '2024-10-24 01:44:09'),
(28, 27, NULL, 6, 1, NULL, '2024-10-24 01:44:09', '2024-10-24 01:44:09'),
(29, 25, NULL, 8, 4, NULL, '2024-10-24 01:44:56', '2024-10-24 01:44:56'),
(30, 26, NULL, 8, 4, NULL, '2024-10-24 01:44:56', '2024-10-24 01:44:56'),
(31, 27, NULL, 8, 4, NULL, '2024-10-24 01:44:56', '2024-10-24 01:44:56'),
(32, 25, NULL, 9, 4, NULL, '2024-10-24 01:51:06', '2024-10-24 01:51:06'),
(33, 26, NULL, 9, 4, NULL, '2024-10-24 01:51:06', '2024-10-24 01:51:06'),
(34, 27, NULL, 9, 4, NULL, '2024-10-24 01:51:06', '2024-10-24 01:51:06'),
(35, 25, NULL, 13, 4, NULL, '2024-10-24 01:51:40', '2024-10-24 01:51:40'),
(36, 26, NULL, 10, 4, NULL, '2024-10-24 01:51:40', '2024-10-24 01:51:40'),
(37, 27, NULL, 10, 4, NULL, '2024-10-24 01:51:40', '2024-10-24 01:51:40'),
(38, 25, NULL, 13, NULL, NULL, '2024-10-25 04:00:44', '2024-10-25 04:00:44'),
(39, 25, NULL, 13, NULL, NULL, '2024-10-25 04:01:19', '2024-10-25 04:01:19'),
(40, 25, NULL, 13, NULL, NULL, '2024-10-25 04:02:06', '2024-10-25 04:02:06'),
(41, 25, NULL, 13, NULL, NULL, '2024-10-25 04:03:18', '2024-10-25 04:03:18'),
(42, 25, NULL, 12, 4, NULL, '2024-10-25 06:57:47', '2024-10-25 06:57:47'),
(43, 26, NULL, 12, 4, NULL, '2024-10-25 06:57:47', '2024-10-25 06:57:47'),
(44, 27, NULL, 12, 4, NULL, '2024-10-25 06:57:47', '2024-10-25 06:57:47'),
(45, 25, NULL, 6, 4, NULL, '2024-10-25 07:17:18', '2024-10-25 07:17:18'),
(46, 26, NULL, 6, 4, NULL, '2024-10-25 07:17:18', '2024-10-25 07:17:18'),
(47, 27, NULL, 6, 4, NULL, '2024-10-25 07:17:18', '2024-10-25 07:17:18'),
(48, 25, NULL, 8, 7, NULL, '2024-10-28 02:19:58', '2024-10-28 02:19:58'),
(49, 26, NULL, 8, 7, NULL, '2024-10-28 02:19:58', '2024-10-28 02:19:58'),
(50, 27, NULL, 8, 7, NULL, '2024-10-28 02:19:58', '2024-10-28 02:19:58'),
(51, 25, NULL, 10, 7, NULL, '2024-10-28 02:20:18', '2024-10-28 02:20:18'),
(52, 26, NULL, 13, 7, NULL, '2024-10-28 02:20:18', '2024-10-28 02:20:18'),
(53, 27, NULL, 10, 7, NULL, '2024-10-28 02:20:18', '2024-10-28 02:20:18'),
(54, 26, NULL, 13, NULL, NULL, '2024-10-28 02:21:12', '2024-10-28 02:21:12'),
(55, 30, NULL, 1, NULL, NULL, '2024-11-05 01:47:09', '2024-11-05 01:47:09'),
(56, 30, NULL, 2, NULL, NULL, '2024-11-05 02:05:37', '2024-11-05 02:05:37'),
(57, 30, NULL, 2, NULL, NULL, '2024-11-05 02:05:37', '2024-11-05 02:05:37'),
(58, 30, NULL, 3, 1, NULL, '2024-11-05 02:06:26', '2024-11-05 02:06:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_surveillances`
--

CREATE TABLE `report_surveillances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surveillance_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `port_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `report_vessels`
--

CREATE TABLE `report_vessels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `port_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `report_vessels`
--

INSERT INTO `report_vessels` (`id`, `vessel_id`, `port_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 1, '2024-09-24 07:16:56', '2024-09-24 07:16:56'),
(2, 2, NULL, 2, '2024-09-24 07:17:30', '2024-09-24 07:17:30'),
(3, 7, NULL, 1, '2024-09-24 07:43:33', '2024-09-24 07:43:33'),
(4, 2, NULL, 1, '2024-10-14 07:04:58', '2024-10-14 07:04:58'),
(5, 2, NULL, 1, '2024-10-18 08:07:39', '2024-10-18 08:07:39'),
(6, 2, NULL, 2, '2024-10-23 07:25:10', '2024-10-23 07:25:10'),
(7, 7, NULL, 1, '2024-10-23 08:02:05', '2024-10-23 08:02:05'),
(8, 7, NULL, 2, '2024-10-24 01:40:07', '2024-10-24 01:40:07'),
(9, 7, 1, 3, '2024-10-24 01:42:37', '2024-10-24 01:42:37'),
(10, 7, 1, 4, '2024-10-24 01:43:02', '2024-10-24 01:43:02'),
(11, 7, 1, 5, '2024-10-24 01:43:16', '2024-10-24 01:43:16'),
(12, 7, 1, 6, '2024-10-24 01:44:09', '2024-10-24 01:44:09'),
(13, 7, 4, 8, '2024-10-24 01:44:56', '2024-10-24 01:44:56'),
(14, 7, 4, 9, '2024-10-24 01:51:06', '2024-10-24 01:51:06'),
(15, 7, 4, 10, '2024-10-24 01:51:40', '2024-10-24 01:51:40'),
(16, 7, 4, 12, '2024-10-25 06:57:47', '2024-10-25 06:57:47'),
(17, 7, 4, 6, '2024-10-25 07:17:18', '2024-10-25 07:17:18'),
(18, 7, 7, 8, '2024-10-28 02:19:58', '2024-10-28 02:19:58'),
(19, 7, 7, 10, '2024-10-28 02:20:18', '2024-10-28 02:20:18'),
(20, 2, NULL, 1, '2024-11-05 01:47:09', '2024-11-05 01:47:09'),
(21, 2, NULL, 2, '2024-11-05 02:05:37', '2024-11-05 02:05:37'),
(22, 2, 1, 3, '2024-11-05 02:06:26', '2024-11-05 02:06:26'),
(23, 1, NULL, 1, '2024-11-05 02:09:24', '2024-11-05 02:09:24'),
(24, 1, NULL, 1, '2024-12-23 02:20:08', '2024-12-23 02:20:08'),
(25, 2, NULL, 1, '2024-12-23 03:59:51', '2024-12-23 03:59:51'),
(26, 2, NULL, 2, '2024-12-23 04:02:58', '2024-12-23 04:02:58'),
(27, 2, 1, 4, '2024-12-23 04:04:00', '2024-12-23 04:04:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `requests`
--

CREATE TABLE `requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `parent_id` mediumint(9) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `bcm` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `type` smallint(6) DEFAULT NULL,
  `schedule_id` smallint(6) DEFAULT NULL,
  `by` varchar(255) DEFAULT NULL,
  `employee_id` smallint(6) DEFAULT NULL,
  `user_id` smallint(6) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `department_id` smallint(6) DEFAULT NULL,
  `func` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `activity_id` smallint(6) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `qty_approve` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `origin_id` smallint(6) DEFAULT NULL,
  `destination_id` smallint(6) DEFAULT NULL,
  `destination_name` varchar(255) DEFAULT NULL,
  `total_size` decimal(6,2) DEFAULT NULL,
  `total_weight` decimal(6,2) DEFAULT NULL,
  `undo` datetime DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `request_id` int(11) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `titip_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `requests`
--

INSERT INTO `requests` (`id`, `rank`, `parent_id`, `code`, `bcm`, `status`, `type`, `schedule_id`, `by`, `employee_id`, `user_id`, `user_name`, `class`, `date`, `department_id`, `func`, `desc`, `activity_id`, `qty`, `qty_approve`, `description`, `origin_id`, `destination_id`, `destination_name`, `total_size`, `total_weight`, `undo`, `reason`, `request_id`, `remark`, `titip_id`, `created_at`, `updated_at`) VALUES
(24, NULL, NULL, 'R/U/171024/1', NULL, 1, 2, NULL, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-10-14', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 13, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-10-17 04:02:52', '2024-10-17 04:03:28'),
(25, 1, NULL, 'R/U/231024/25', NULL, 12, 2, 9, NULL, 6, 9, 'COSL 221', 'main', '2024-10-21', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 4, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-10-23 07:26:33', '2024-12-19 04:52:21'),
(26, 2, NULL, 'R/U/231024/26', NULL, 3, 2, 9, NULL, 6, 9, 'COSL 221', 'main', '2024-10-21', 2, 'LGS', 'Transfer Material', 1, NULL, NULL, 'Transfer Material', 4, 7, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-10-23 07:28:48', '2024-12-19 04:52:21'),
(27, 3, NULL, 'R/U/231024/27', NULL, 4, 2, 9, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-10-21', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 13, NULL, 0.00, 80.00, NULL, NULL, NULL, NULL, NULL, '2024-10-23 07:29:36', '2024-12-19 04:52:21'),
(28, NULL, NULL, 'R/U/301024/28', NULL, 1, 2, NULL, NULL, 6, 9, 'COSL 221', 'main', '2024-10-28', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 4, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-10-30 01:10:30', '2024-10-30 01:12:33'),
(29, NULL, NULL, 'R/U/301024/29', NULL, 1, 2, NULL, NULL, 9, 12, 'COSL 225', 'main', '2024-10-28', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 7, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-10-30 01:13:11', '2024-10-30 01:13:28'),
(30, 1, NULL, 'R/U/051124/30', NULL, 4, 2, 12, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-11-05', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 13, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-11-05 01:43:31', '2024-11-05 02:06:26'),
(31, NULL, NULL, 'R/U/051124/31', NULL, 1, 2, 12, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-11-05', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 13, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-11-05 02:07:02', '2024-11-05 02:07:28'),
(32, NULL, NULL, 'R/U/061124/32', NULL, 1, 2, NULL, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-11-06', 2, 'LGS', 'Distribute Material', 1, NULL, NULL, 'Distribute Material', 1, 13, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-11-06 02:50:50', '2024-11-06 02:51:36'),
(33, NULL, NULL, 'R/U/061124/33', NULL, 1, 2, NULL, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-11-06', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 13, 4, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-11-06 02:51:54', '2024-11-06 02:53:26'),
(34, NULL, NULL, 'R/U/231224/34', NULL, 1, 2, NULL, NULL, 6, 9, 'COSL 221', 'main', '2024-12-23', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 4, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-12-23 02:09:03', '2024-12-23 02:09:30'),
(35, NULL, NULL, 'R/U/231224/35', NULL, 1, 2, 15, NULL, 9, 12, 'COSL 225', 'main', '2024-12-23', 2, 'LGS', 'Mobilized Material', 1, NULL, NULL, 'Mobilized Material', 1, 7, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-12-23 03:29:16', '2024-12-23 03:32:30'),
(36, NULL, NULL, 'R/U/231224/36', NULL, 0, 2, NULL, NULL, 30, 69, 'Admin PABELOKAN ISLAND', 'main', '2024-12-23', 2, 'LGS', 'Crew Change', 2, NULL, NULL, 'Crew Change', 1, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 04:21:56', '2024-12-23 04:21:56'),
(38, NULL, NULL, 'R/U/231224/37', NULL, 1, 2, 15, NULL, 8, 11, 'COSL 223', 'main', '2024-12-23', 2, 'LGS', 'Testing', 1, NULL, NULL, 'Testing', 1, 6, NULL, 0.00, 0.00, NULL, NULL, NULL, NULL, NULL, '2024-12-23 09:03:22', '2024-12-23 09:03:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_histories`
--

CREATE TABLE `request_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` smallint(6) NOT NULL,
  `type_id` smallint(6) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `request_histories`
--

INSERT INTO `request_histories` (`id`, `request_id`, `type_id`, `type`, `date`, `desc`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, 'validated', '2024-09-24 11:21:36', NULL, '2024-09-24 04:21:36', '2024-09-24 04:21:36'),
(2, 2, NULL, 'validated', '2024-09-24 11:55:11', NULL, '2024-09-24 04:55:11', '2024-09-24 04:55:11'),
(3, 3, NULL, 'validated', '2024-09-24 11:55:16', NULL, '2024-09-24 04:55:16', '2024-09-24 04:55:16'),
(4, 20, NULL, 'validated', '2024-10-14 14:03:01', NULL, '2024-10-14 07:03:01', '2024-10-14 07:03:01'),
(5, 21, NULL, 'validated', '2024-10-14 14:03:12', NULL, '2024-10-14 07:03:12', '2024-10-14 07:03:12'),
(6, 22, NULL, 'validated', '2024-10-14 14:03:22', NULL, '2024-10-14 07:03:22', '2024-10-14 07:03:22'),
(7, 25, NULL, 'validated', '2024-10-23 14:38:28', NULL, '2024-10-23 07:38:28', '2024-10-23 07:38:28'),
(8, 26, NULL, 'validated', '2024-10-23 14:38:32', NULL, '2024-10-23 07:38:32', '2024-10-23 07:38:32'),
(9, 27, NULL, 'validated', '2024-10-23 14:38:36', NULL, '2024-10-23 07:38:36', '2024-10-23 07:38:36'),
(10, 30, NULL, 'validated', '2024-11-05 08:45:01', NULL, '2024-11-05 01:45:01', '2024-11-05 01:45:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_rejects`
--

CREATE TABLE `request_rejects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `revisions`
--

CREATE TABLE `revisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `schedule_id` int(11) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superuser', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(2, 'superadmin-dsp', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(3, 'superadmin-vdr', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(4, 'admin-vdr', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(5, 'admin-logistic', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(6, 'admin-dsp', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(7, 'marine', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(8, 'department', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(9, 'vessel', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(10, 'co', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(11, 'master', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(12, 'port', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(13, 'fm', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(14, 'suptent', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(15, 'chief', 'web', '2024-06-10 04:07:41', '2024-06-10 04:07:41'),
(16, 'barge', 'web', '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(17, 'logistic', 'web', '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(18, 'drilling', 'web', '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(19, 'user', 'web', '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(20, 'mm', 'web', '2024-10-24 02:26:11', '2024-10-24 02:26:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `routetype_id` tinyint(4) NOT NULL,
  `origin_id` smallint(6) NOT NULL,
  `destination_id` smallint(6) NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `route_types`
--

CREATE TABLE `route_types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `route_types`
--

INSERT INTO `route_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sea', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Land', '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Air', '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `type` smallint(6) NOT NULL,
  `by` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `date` date DEFAULT NULL,
  `vessel_id` mediumint(9) DEFAULT NULL,
  `vessel_type` varchar(255) DEFAULT NULL,
  `etd` datetime DEFAULT NULL,
  `eta` datetime DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `total_size` decimal(6,2) DEFAULT NULL,
  `total_weight` decimal(6,2) DEFAULT NULL,
  `total_depart` int(11) DEFAULT NULL,
  `total_return` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedules`
--

INSERT INTO `schedules` (`id`, `code`, `type`, `by`, `class`, `status`, `date`, `vessel_id`, `vessel_type`, `etd`, `eta`, `description`, `remark`, `total_size`, `total_weight`, `total_depart`, `total_return`, `created_at`, `updated_at`) VALUES
(8, 'SO/171024/1', 2, 'marine', 'Cargo', 2, '2024-10-14', 2, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-10-17 07:23:58', '2024-11-04 02:10:09'),
(9, 'SO/231024/9', 2, 'marine', 'Cargo', 3, '2024-10-21', 7, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 80.00, NULL, NULL, '2024-10-23 07:38:19', '2024-12-19 04:52:21'),
(10, 'SO/231024/10', 2, 'marine', 'Crew', 0, '2024-10-21', 6, 'Crew Boat', NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, '2024-10-23 07:41:49', '2024-10-23 07:41:52'),
(11, 'SO/301024/11', 2, 'marine', 'Cargo', 0, '2024-10-28', 2, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-10-30 01:37:43', '2024-11-04 02:22:10'),
(12, 'SO/051124/12', 2, 'marine', 'Cargo', 2, '2024-11-05', 2, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-11-05 01:44:52', '2024-11-05 02:06:26'),
(13, 'SO/051124/13', 2, 'marine', 'Cargo', 1, '2024-11-05', 1, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-11-05 02:08:12', '2024-11-05 06:38:11'),
(14, 'SO/061124/14', 2, 'marine', 'Cargo', 0, '2024-11-06', 5, 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-06 02:55:15', '2024-11-06 02:55:15'),
(15, 'SO/231224/15', 2, 'marine', 'Cargo', 1, '2024-12-23', 1, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-12-23 02:15:40', '2024-12-23 02:20:09'),
(16, 'SO/231224/16', 2, 'marine', 'Cargo', 2, '2024-12-23', 2, 'AHTS', NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, '2024-12-23 03:37:21', '2024-12-23 09:16:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_documents`
--

CREATE TABLE `schedule_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_routes`
--

CREATE TABLE `schedule_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `schedule_id` mediumint(9) NOT NULL,
  `request_id` int(11) DEFAULT NULL,
  `port_id` mediumint(9) NOT NULL,
  `rank` smallint(6) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cargo_item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedule_routes`
--

INSERT INTO `schedule_routes` (`id`, `status`, `schedule_id`, `request_id`, `port_id`, `rank`, `date`, `created_at`, `updated_at`, `cargo_item_id`) VALUES
(1, 1, 1, 2, 1, 1, '2024-09-24', '2024-09-24 04:21:36', '2024-09-24 04:21:36', NULL),
(2, 1, 1, 2, 5, 2, '2024-09-24', '2024-09-24 04:21:36', '2024-09-24 04:21:36', NULL),
(3, 1, 2, 2, 1, 1, '2024-09-24', '2024-09-24 04:55:11', '2024-09-24 04:55:11', NULL),
(4, 1, 2, 2, 5, 2, '2024-09-24', '2024-09-24 04:55:11', '2024-09-24 04:55:11', NULL),
(5, 1, 1, 3, 8, 2, NULL, '2024-09-24 04:55:16', '2024-09-24 04:55:16', NULL),
(6, 1, 6, 20, 1, 1, '2024-10-14', '2024-10-14 07:03:01', '2024-10-14 07:03:01', NULL),
(7, 1, 6, 20, 4, 2, '2024-10-14', '2024-10-14 07:03:01', '2024-10-14 07:03:01', NULL),
(8, 1, 6, 21, 10, 2, NULL, '2024-10-14 07:03:12', '2024-10-14 07:03:12', NULL),
(9, 1, 8, 24, 1, 1, '2024-10-17', '2024-10-17 07:41:47', '2024-10-17 07:41:47', 46),
(10, 1, 8, 24, 13, 2, '2024-10-17', '2024-10-17 07:41:47', '2024-10-17 07:41:47', 46),
(11, 1, 9, 25, 1, 1, '2024-10-23', '2024-10-23 07:38:28', '2024-10-23 07:38:28', NULL),
(12, 1, 9, 25, 4, 2, '2024-10-23', '2024-10-23 07:38:28', '2024-10-23 07:38:28', NULL),
(13, 1, 9, 26, 7, 2, NULL, '2024-10-23 07:38:32', '2024-10-23 07:38:32', NULL),
(14, 1, 9, 27, 13, 3, NULL, '2024-10-23 07:38:36', '2024-10-23 07:38:36', NULL),
(15, 1, 8, 28, 4, 2, NULL, '2024-10-30 01:37:48', '2024-10-30 01:37:48', 54),
(16, 1, 11, 28, 1, 1, '2024-10-30', '2024-10-30 01:39:56', '2024-10-30 01:39:56', 54),
(17, 1, 11, 28, 4, 2, '2024-10-30', '2024-10-30 01:39:56', '2024-10-30 01:39:56', 54),
(18, 1, 11, 29, 7, 2, NULL, '2024-10-30 01:40:56', '2024-10-30 01:40:56', 56),
(19, 1, 12, 30, 1, 1, '2024-11-05', '2024-11-05 01:45:01', '2024-11-05 01:45:01', NULL),
(20, 1, 12, 30, 13, 2, '2024-11-05', '2024-11-05 01:45:01', '2024-11-05 01:45:01', NULL),
(21, 1, 13, 31, 1, 1, '2024-11-05', '2024-11-05 02:08:18', '2024-11-05 02:08:18', 59),
(22, 1, 13, 31, 13, 2, '2024-11-05', '2024-11-05 02:08:18', '2024-11-05 02:08:18', 59),
(23, 1, 15, 34, 1, 1, '2024-12-23', '2024-12-23 02:15:46', '2024-12-23 02:15:46', 64),
(24, 1, 15, 34, 4, 2, '2024-12-23', '2024-12-23 02:15:46', '2024-12-23 02:15:46', 64),
(25, 1, 16, 35, 1, 1, '2024-12-23', '2024-12-23 03:37:33', '2024-12-23 03:37:33', 66),
(26, 1, 16, 35, 7, 2, '2024-12-23', '2024-12-23 03:37:33', '2024-12-23 03:37:33', 66),
(27, 1, 16, 38, 6, 2, NULL, '2024-12-23 09:13:27', '2024-12-23 09:13:27', 69);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule_vessels`
--

CREATE TABLE `schedule_vessels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `monday_id` int(11) DEFAULT NULL,
  `tuesday_id` int(11) DEFAULT NULL,
  `wednesday_id` int(11) DEFAULT NULL,
  `thursday_id` int(11) DEFAULT NULL,
  `friday_id` int(11) DEFAULT NULL,
  `saturday_id` int(11) DEFAULT NULL,
  `sunday_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `schedule_vessels`
--

INSERT INTO `schedule_vessels` (`id`, `vessel_id`, `monday_id`, `tuesday_id`, `wednesday_id`, `thursday_id`, `friday_id`, `saturday_id`, `sunday_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 12, NULL, NULL, 12, 1, 12, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 9, 1, 12, 1, 12, NULL, NULL, 12, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 6, NULL, 13, 12, 18, NULL, NULL, 1, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 36, NULL, 13, 12, 18, NULL, NULL, 1, '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `class`, `type`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Assigned', 'Cargo', 1, '01', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Accepted', 'Cargo', 2, '02', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'Standby', 'Cargo', 1, '03', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'Loading Start', 'Cargo', 1, '04', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, 'Loading End', 'Cargo', 1, '05', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, 'Cast Off', 'Cargo', 1, '06', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'Fullaway', 'Cargo', 1, '07', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'Arrived', 'Cargo', 1, '08', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(9, 'Anchored at Secure Area', 'Cargo', 1, '09', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(10, 'Waiting', 'Cargo', 1, '10', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(11, 'Unloading Start', 'Cargo', 1, '11', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(12, 'Unloading End', 'Cargo', 1, '12', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(13, 'Task Complete', 'Cargo', 1, '13', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(14, 'Confirmation Offloading', 'Cargo', 2, '14', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(15, 'Add Additional Request', 'Cargo', 2, '15', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(16, 'Approval Additional Request', 'Cargo', 2, '16', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(17, 'Confirmation Complete', 'Cargo', 2, '17', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(18, 'Add Deflection', 'Cargo', 2, '18', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(19, 'Add Deviation', 'Cargo', 2, '19', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(20, 'Confirm Deviation', 'Cargo', 2, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(21, 'Confirm Deviation', 'Cargo', 2, '21', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(22, 'Start Job', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(23, 'Arrived', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(24, 'Assist Hose SBM', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(25, 'Static Tow Tanker', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(26, 'Secure', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(27, 'PJSM', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(28, 'Start Pickup Anchor', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(29, 'Complete Pickup Anchor', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(30, 'Start Drop Anchor', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(31, 'Complete Drop Anchor', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(32, 'Under Tow', 'Moving', 1, '20', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(33, 'Droped', 'Item', 3, '0', '2024-10-24 02:17:31', '2024-10-24 02:17:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surveillances`
--

CREATE TABLE `surveillances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `port_id` int(11) DEFAULT NULL,
  `vessel_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `total_weight` decimal(8,2) DEFAULT NULL,
  `total_size` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surveillance_cargos`
--

CREATE TABLE `surveillance_cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `surveillance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `mtd` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `size` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surveillance_crews`
--

CREATE TABLE `surveillance_crews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `surveillance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `origin_id` int(11) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Cargo', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(2, 'Passenger', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(3, 'Towing', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(4, 'Moving', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `system` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `system`, `username`, `email`, `no_telp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marine', NULL, 'marine', 'marine@pertamina.com', NULL, NULL, '$2y$10$UdcMaBfpcWHXENjUeZB2juyLomdoAjv3KSzl3t.jWp09hY5BZufVC', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(2, 'Admin FM', NULL, 'fm', 'fm@pertamina.com', NULL, NULL, '$2y$10$EMqD6O04gjz3zqIaBEoBLuKDQa4cdbGf.uetjD6YA45nFCWPpODxe', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(3, 'Super Intendent', NULL, 'suptent', 'suptent@pertamina.com', NULL, NULL, '$2y$10$3RpJwmBS295iJvytnBbX6Otd0c1p1Ej5JQjwczcpnxmFhBohHEtby', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(4, 'Mr. Lutfi', NULL, 'lutfi', 'lutfi@pertamina.com', NULL, NULL, '$2y$10$NaM69WeAReor9SHpv7sLyOwH40o/RnLpyUOlXyOgxJRsA.wJg8r3K', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(5, 'Kalijapat 4', NULL, 'kj4', 'kj4@pertamina.com', NULL, NULL, '$2y$10$dDK0x7m1aIRO0lIsV8NYQ.YDPs4tKRxJKrcqeVJ75BXIO5WCY8i3m', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(6, 'Yoyo', NULL, 'yoyo', 'yoyo@pertamina.com', NULL, NULL, '$2y$10$oLEa5KcWL6VYWqImvPrSpeBxW8xz9Tqqf1SN2mhyyZVRwW5FIn076', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(7, 'Admin Logistic', NULL, 'adm_logistic', 'adm_logistic@pertamina.com', NULL, NULL, '$2y$10$c.ZdswkjZoZ1gkp5X8DlO.KCmjmjNOZ3LlaxO0VkiQKKjtKteUHmS', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(8, 'Pabelokan Island', NULL, 'pab', 'pab@pertamina.com', NULL, NULL, '$2y$10$tQ/30YW0yCgtAf9ux67EDu4H60aBFS5P3kqv6lZzhIr9Ys8qqAMWG', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(9, 'COSL 221', NULL, 'cosl221', 'cosl221@pertamina.com', NULL, NULL, '$2y$10$Al6mgsBTXDxWP7SlQ9NIuunySugY1Ma8SbfSpzg1dOScNafo/c96y', NULL, '2024-06-10 04:07:42', '2024-06-10 04:07:42'),
(10, 'COSL 222', NULL, 'cosl222', 'cosl222@pertamina.com', NULL, NULL, '$2y$10$gXE6yljL77NEaKAKAgZINOwZ1u4HmPN7f4f8gQ4dB2sMLwy73NCda', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(11, 'COSL 223', NULL, 'cosl223', 'cosl223@pertamina.com', NULL, NULL, '$2y$10$HoPodPGS98nPDpIyyTqwFO8H7Q8HNLQgc0Gq7ZM0/7l5GWnna0Cf2', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(12, 'COSL 225', NULL, 'cosl225', 'cosl225@pertamina.com', NULL, NULL, '$2y$10$uTRrASydvC3rdw2K8xjMqeMbwLU4MrxmfBWuQHjtq9Fl0hzFW0cAi', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(13, 'Gunung Jati', NULL, 'gnjati', 'gnjati@pertamina.com', NULL, NULL, '$2y$10$.1T43TbtEh8FGWJOXOnHPuB4dUx8lLX7V6BWlnPwQsvHaI3SVtcLu', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(14, 'Onyx', NULL, 'onyx', 'onyx@pertamina.com', NULL, NULL, '$2y$10$pXYE1lw6ojAWGUypI.s0Cu6yTpV9UcAzVQ4fkoDzr1/Q0GmJil9Xy', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(15, 'Winner', NULL, 'winner', 'winner@pertamina.com', NULL, NULL, '$2y$10$qb8EAvHJzLoMy7YRnW.CPOeBhVRFom5l8QQRrRDq/SVyMFmk7BZRm', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(16, 'Bayu Cakrawala', NULL, 'bca', 'bca@pertamina.com', NULL, NULL, '$2y$10$VO9/G/SI5BmhKnkSbooCIOBKGTK.IfKMDWY5wrvXUnBoh4clFXpPe', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(17, 'HYSY 902', NULL, 'hysy902', 'hysy902@pertamina.com', NULL, NULL, '$2y$10$YJ0PRdgwLP4z7Ay4Y9VDROtMnWais1Srd2aKE.ysAeV3JlWAWa7xa', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(18, 'Superior', NULL, 'superior', 'superior@pertamina.com', NULL, NULL, '$2y$10$aqGykHHCZS3G5yUC75AD5.Hs/sjTGNZQ1SIoXXnbNrjnIuJI6jBkW', NULL, '2024-06-10 04:07:43', '2024-06-10 04:07:43'),
(19, 'Ship 114', NULL, 'ship114', 'ship114@pertamina.com', NULL, NULL, '$2y$10$aTUk57UluagH8qe2rpRbtuN6FI1ka53WWTHb45otZZ2fxe.ubE8w2', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(20, 'Falcon', NULL, 'falcon', 'falcon@pertamina.com', NULL, NULL, '$2y$10$yHROeduXHvFJMvF1Vy6WT.saUnIJVQ.pluxGvHOqheSosMUjDIQFG', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(21, 'Tanjung Lesung', NULL, 'tjlesung', 'tjlesung@pertamina.com', NULL, NULL, '$2y$10$6paE/dBtfN0iF6n2HKCx8uuxVHEg.0tOMCZv/ZRLiVCFMzLnjTdNO', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(22, 'Federal', NULL, 'federal', 'federal@pertamina.com', NULL, NULL, '$2y$10$UET.D..Dn1Q.08DcXTezXOPJPnUqFUNw5o1gntXSL6dRuIz4Fb68K', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(23, 'TRANSKO MOLOKO', NULL, 'moloko', 'moloko@pertamina.com', NULL, NULL, '$2y$10$S1k5iJmYImwvLPMeFYcy2.VpAvGdPruKoljQ6unUfP6bP4yuP3Zuy', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(24, 'TRANSKO BALIHE', NULL, 'balihe', 'balihe@pertamina.com', NULL, NULL, '$2y$10$puqDWM15ht5xPXEINh/FjOCPoguI7oo6HUBunhBfevzVKYE2j1Szi', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(25, 'LOGINDO OVERCOMER', NULL, 'logindo', 'logindo@pertamina.com', NULL, NULL, '$2y$10$FR2hLJTSFU9YrDqtNJHnCuZc79V/Z389rRrbYTQ8WqKtjVCm4iqfi', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(26, 'INDOLIZIZ SATU', NULL, 'indoliziz', 'indoliziz@pertamina.com', NULL, NULL, '$2y$10$DG.6ZxBfQ.3IMK5NtSksne2eNhjxLm6bKUG/mEnLzp8gTyNzrCRGy', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(27, 'PETEKA 5402', NULL, 'peteka5402', 'peteka5402@pertamina.com', NULL, NULL, '$2y$10$GaI18ak3AFo3hgtCvSigBe/s6b50KIPr.F8.CtsqQUn9mV3S.iXBm', NULL, '2024-06-10 04:07:44', '2024-06-10 04:07:44'),
(28, 'SIGAP JAYA', NULL, 'sigapjaya', 'sigap@pertamina.com', NULL, NULL, '$2y$10$QV2g/eLy0t/e.sqiGFVOu.nSsGB.fj04xRzqPqkKtpR.ENINVw9bO', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(29, 'TRITON JAWARA', NULL, 'tritonjawara', 'triton@pertamina.com', NULL, NULL, '$2y$10$lq3UfzuN2.llHVqEIKjuseUTJ42o4SjXCczyA6aBeTrOkeizsA38q', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(30, 'MARVELA 18', NULL, 'marvela18', 'marvela18@pertamina.com', NULL, NULL, '$2y$10$tgz1fgcBCg5gLWSQTXMn3uIZFTAoYhVve8PE0z0eqVqDk/hxkpmMe', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(31, 'ELOK JAYA', NULL, 'elokjaya', 'elok@pertamina.com', NULL, NULL, '$2y$10$s2fCTx6qhSnR3/nhXpBYdOgH.gtMJjR3k2uLzHMTm95a2VBse4AZm', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(32, 'TEKUN JAYA', NULL, 'tekunjaya', 'tekun@pertamina.com', NULL, NULL, '$2y$10$axWezrchg9l8GXcHEADgvuBQwPObAU225F681OQcTSeh.dtwmepRa', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(33, 'GIAT JAYA', NULL, 'giatjaya', 'giatjaya@pertamina.com', NULL, NULL, '$2y$10$HtFfH3gHpLYAoOhuA7udqOGNAsWe3246/VFS5Lg.TU7jXkk/iGXNa', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(34, 'INA PERMATA 1', NULL, 'inapermata1', 'ina1@pertamina.com', NULL, NULL, '$2y$10$OEKo4qm0mo4Y8tcb4xHtX.4mapb0PSQmRELXrw6S1LzPRvDEFnDpu', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(35, 'ENC ONE', NULL, 'encone', 'encone@pertamina.com', NULL, NULL, '$2y$10$GowgJBGf5UJwT6kFNiAm8eLHV/toQTXtlPoJZnrTowuNdU/yqR7be', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(36, 'INA PERMATA 2', NULL, 'inapertamina2', 'ina2@pertamina.com', NULL, NULL, '$2y$10$Ole/TPaT7WgQZzqbf.8CYuOp/HwCw/LkytKT8Bk0ghzkZ8uOB.Pji', NULL, '2024-06-10 04:07:45', '2024-06-10 04:07:45'),
(37, 'TB. MEGAWATI 17', NULL, 'megawati17', 'mega17@pertamina.com', NULL, NULL, '$2y$10$7p2Ig9meaH1nLV4tFXqlLOwio83BL1iY9HexWmhK.OP6S6Z9SJjtG', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(38, 'DSV PATRA OFFSHORE', NULL, 'patraoffshore', 'patraoffshore@pertamina.com', NULL, NULL, '$2y$10$PaTkrtFI3JLCjY4LsxhWder3YgUt900Ykj3Wh5Eex6ASlC4oYLjGq', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(39, 'OPS AVIOR', NULL, 'avior', 'avior@pertamina.com', NULL, NULL, '$2y$10$AgblAA6hKTfmt2iQcbRkxO9VKhQ/cWqoYGlCYPXzNCb6unfuSxYby', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(40, 'MERLION 121', NULL, 'merlion121', 'merlion121@pertamina.com', NULL, NULL, '$2y$10$hGZecM97sQoaePn7uh9TluQ23HgkgRke4WS3.4UluUuvkOtV8UUVi', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(41, 'Tegas Jaya', NULL, 'tegasjaya', 'tegasjaya@pertamina.com', NULL, NULL, '$2y$10$11Ehf2xVN5z24OhOc/cDneRtCreDeYSC/Tt3Uf3cDlkomTCAbTDMq', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(42, 'MERLION 131', NULL, 'merlion131', 'merlion131@pertamina.com', NULL, NULL, '$2y$10$arV8suQIDx.tdSjFofw4deGrXWinuSjVYVXWmywDqiy7SASxzYes2', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(43, 'ALPHA MARINE', NULL, 'alphamarine', 'alpha@pertamina.com', NULL, NULL, '$2y$10$CdSbz8nEIWetq8TGuwaISO5ySbtohHSyJhWWeSV05ChkqL/tDAXNq', NULL, '2024-06-10 04:07:46', '2024-06-10 04:07:46'),
(44, 'SANCHAI HARBOUR', NULL, 'sanchaiharbour', 'sanchai@pertamina.com', NULL, NULL, '$2y$10$O7AzSrFs/GeDNTFeYvQ5qOVyIhduF8VQLFzt.R.ERiDYaowzSG.vO', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(45, 'STK PRIMA 6', NULL, 'prima6', 'prima6@pertamina.com', NULL, NULL, '$2y$10$5gDBXmvWUlp8NUHYbMyKj.vFlJhd6IC6jjX7DlSp7eR7qgNkrb61O', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(46, 'ANSANUS 12', NULL, 'ansanus12', 'ansanus12@pertamina.com', NULL, NULL, '$2y$10$hIvmc.18JfKzyZuEqzF24.QZ0iqLynWym37fBVsgMSirSs3JA0DtO', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(47, 'MT. IVANI', NULL, 'ivani', 'ivani@pertamina.com', NULL, NULL, '$2y$10$d3FiynGv5w8FgV0jtrkJ7urqlEPrFAPm8r3dj8qyfqScAJURYf7Pe', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(48, 'CAST MARINE 3', NULL, 'castmarine3', 'castmarine3@pertamina.com', NULL, NULL, '$2y$10$Vks..4D05fn9CtgBn.8m5OvGiKJv10pWIVB0UJbrJ1ZpJGgvKJuem', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(49, 'PAN MARINE 6', NULL, 'panmarine6', 'panmarine6@pertamina.com', NULL, NULL, '$2y$10$iLvVye3P5wTXd82ALe8xseqb.K/j7rz0PFQXqIrsZLf4dhVvJQDje', NULL, '2024-06-10 04:07:47', '2024-06-10 04:07:47'),
(50, 'NMS ACCELERATE', NULL, 'accelerate', 'accelerate@pertamina.com', NULL, NULL, '$2y$10$VIL1mAEvsZVoVFkfWR/wQOJ/lfuPiRWpNfspA.0N/gjBfBWBATfNm', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(51, 'CLARISSA 68', NULL, 'clarissa68', 'clarissa68@pertamina.com', NULL, NULL, '$2y$10$Hw3ASnfBfX/nff4dd2.yh./tXm/tJq3jjhRbuS./BJzHQ67C5FnTe', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(52, 'MAGELANG', NULL, 'magelang', 'magelang@pertamina.com', NULL, NULL, '$2y$10$vRZlK1vyXNux1dGR0bgT4.qYR0fexIs7yBCquhefAKQfqmBZZ5RiC', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(53, 'PRISAI', NULL, 'prisai', 'prisai@pertamina.com', NULL, NULL, '$2y$10$.ob.G8SnvpnF0H1Nw8d5eeP6tS0WbtY13t5gCADrD8RWzU1LXQFzG', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(54, 'CLARA 58', NULL, 'clara58', 'clara58@pertamina.com', NULL, NULL, '$2y$10$cZpd9A/LKcPpWnmVmXmxC.No4/C6D2pVpjPF7h0zOmttmRSRL.yR6', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(55, 'NMS ACCOMPLISH', NULL, 'accomplish', 'accomplish@pertamina.com', NULL, NULL, '$2y$10$fGQXgMXJSTlP/r1M6MrSiOo8/Os8kdjnqGi0ms1z94bgUMdT3N/hC', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(56, 'SALATIGA', NULL, 'salatiga', 'salatiga@pertamina.com', NULL, NULL, '$2y$10$Y7KCu3Wtpo/m1ByiODqMbugFrQZzd993NRElF4R32zbMk8L1LdkSy', NULL, '2024-06-10 04:07:48', '2024-06-10 04:07:48'),
(57, 'PAN MARINE 19', NULL, 'panmarine19', 'panmarine19@pertamina.com', NULL, NULL, '$2y$10$4LdiWDf290bua.Ac.piJr.eoBHre9v2oOWM84SY0qRMZtTN7J2.kK', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(58, 'PATRA MARINE', NULL, 'patramarine', 'patramarine@pertamina.com', NULL, NULL, '$2y$10$IfzMgIVZogjAU/siInx8mexSon0BYd5QjB8fIKmkF1e67OotRA2SK', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(59, 'Admin AIDA-A', NULL, 'aidaa', 'aidaa@pertamina.com', NULL, NULL, '$2y$10$HDUkC3VSaRE4dM.zdVshq.Suj1TY2hYkbeTK5NorEuoUMpFck1vaW', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(60, 'Admin ARYANI-A', NULL, 'aryania', 'aryania@pertamina.com', NULL, NULL, '$2y$10$r1bc2CDgTv/1RJ77ZH6U6edVOrGA/X1VAfcouUHR6fBQqLcWYz3uy', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(61, 'Admin CHESSY-A', NULL, 'chessya', 'chessya@pertamina.com', NULL, NULL, '$2y$10$fDz3Y6ixjKTzcE/hfrrUFOJajrUVwuyPtvbPztVEKuO3pTunMW4nq', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(62, 'Admin INDRI-A', NULL, 'indria', 'indria@pertamina.com', NULL, NULL, '$2y$10$cO59s9W7Iugdrrq4Dd1WG.aUSeC/ZNjetcWK7F5361geqluzAaHrO', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(63, 'Admin FARIDA-A', NULL, 'faridaa', 'faridaa@pertamina.com', NULL, NULL, '$2y$10$LDjLqan99.WQSwU.Xfu/ZuRB2m3qO2rgrhVaQpr2Nhy0NdZhBO2U.', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(64, 'Admin FARIDA-B', NULL, 'faridab', 'faridab@pertamina.com', NULL, NULL, '$2y$10$zEAFSo6DHnvrSqErioZkVOnJh6AGKKvhSDxp9lQvrLvsemEVYr0Z2', NULL, '2024-06-10 04:07:49', '2024-06-10 04:07:49'),
(65, 'Admin KRISNA-A', NULL, 'krisnaa', 'krisnaa@pertamina.com', NULL, NULL, '$2y$10$LCYlYeg6xZaRvnS6aD.00OgK0FUHhdBF9ozHtxofdeYYAg.XziwF.', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(66, 'Admin KRISNA-B', NULL, 'krisnab', 'krisnab@pertamina.com', NULL, NULL, '$2y$10$AHhblPhIZ.FUYzz39ij7oexUvwcT8yf/m4GRvz6ZElnA/pzmxLLES', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(67, 'Admin CINTA-A', NULL, 'cintaa', 'cintaa@pertamina.com', NULL, NULL, '$2y$10$ANlg5KY2DBbtrJue/0ccMuqycf9pETclNaAzJJzyNqdfL1oPu85Jm', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(68, 'Admin CINTA-B', NULL, 'cintab', 'cintab@pertamina.com', NULL, NULL, '$2y$10$TCxoO7vDQEBsehsOUINUm.yI7tJDzCybFMKVVwXnXYGXLrj6dkXSq', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(69, 'Admin PABELOKAN ISLAND', NULL, 'pabelokan', 'pabelokan@pertamina.com', NULL, NULL, '$2y$10$c0aKcL/fqJZKo0DLF6RhF.PN2gCefFNky0GaR6w9ChckAPU.1D6mq', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(70, 'Admin RAMA-A', NULL, 'ramaa', 'ramaa@pertamina.com', NULL, NULL, '$2y$10$v3fFW7yZJN2b5RbKiYs8BeikVqd.ckEXtJNS/ixwM26a.76i0M11O', NULL, '2024-06-10 04:07:50', '2024-06-10 04:07:50'),
(71, 'Ahmad Juantoro', NULL, 'aj', 'aj@pertamina.com', NULL, NULL, '$2y$10$TCaxgpslPsXLflaz.9rh7.xepWObtKh6thSsMriDD05K453hmuLF.', NULL, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(72, 'Dareza Arvian', NULL, 'da', 'da@pertamina.com', NULL, NULL, '$2y$10$G8vIRo6sXeICqKB6z9NWqumVzvjbsPh/pgEyXB3Rm51REe1iU1NA.', NULL, '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(86, 'Material Man Kalijapat 4', NULL, 'mm_kj4', 'mm_kj4@pertamina.com', NULL, NULL, '$2y$10$LHnagcZWgvr5.OHZFe3Og.NoMI7zTdphZKIIAI3AvDqD.UwCmKYV.', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(87, 'Material Man COSL 221', NULL, 'mm_cosl221', 'mm_cosl221@pertamina.com', NULL, NULL, '$2y$10$NwbrlSRu7XWbo.tQozABMuqhPYGyX1V9aWEUrJxcTdXZqZPKwDphy', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(88, 'Material Man COSL 222', NULL, 'mm_cosl222', 'mm_cosl222@pertamina.com', NULL, NULL, '$2y$10$Yt6aU9tVWI6lGn4SKTMi5Oy/yzvA9o7m.Jt85nnnhyOETJAnE/wj.', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(89, 'Material Man COSL 223', NULL, 'mm_cosl223', 'mm_cosl223@pertamina.com', NULL, NULL, '$2y$10$Wo.CECHkqVjrwaI.BViJDea.Ec110uH46XcKaF9cnEAPs.uWcq4Iy', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(90, 'Material Man COSL 225', NULL, 'mm_cosl225', 'mm_cosl225@pertamina.com', NULL, NULL, '$2y$10$8eSOr4nM69nHRJsRkYveqe.d.A4VsD/a5DDc5bWqOBVE9iVZTf9.W', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(91, 'Material Man Petroleum Winner', NULL, 'mm_winner', 'mm_winner@pertamina.com', NULL, NULL, '$2y$10$DLIT9EXL1gv16LcA4FAgPOy0ehgNa2618aZGH2O8rNVosfAN6nOpm', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(92, 'Material Man Gunung Jati', NULL, 'mm_gnjati', 'mm_gnjati@pertamina.com', NULL, NULL, '$2y$10$Gjb1KUxpKH5yYOh7rDllke/ahr3qUtSVsFYMQGFtHRj5zPxOeqihK', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(93, 'Material Man Falcon', NULL, 'mm_falcon', 'mm_falcon@pertamina.com', NULL, NULL, '$2y$10$8mPLpWt8zRuKIKLJTnrdMuwa9SYeOkJO4kMkedtn37u/1d2EBUswG', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(94, 'Material Man Onyx', NULL, 'mm_onyx', 'mm_onyx@pertamina.com', NULL, NULL, '$2y$10$NT.b/lhk69lODDd8Dbqohu/4yyk5oSz4iaLeO8BoXaUTGWnUm5gXm', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(95, 'Material Man Pabelokan', NULL, 'mm_pabelokan', 'mm_pabelokan@pertamina.com', NULL, NULL, '$2y$10$4R5o7Lcrj3ZcX0X7hEd9BOvwv7Te4QTYqXhlCDyKgB81mQ8ReklSm', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(96, 'Material Man Tanjung Lesung', NULL, 'mm_tjlesung', 'mm_tjlesung@pertamina.com', NULL, NULL, '$2y$10$8b2AbyxeaXIUrmBcb/npne/lYq9InwbsaKKLpQJnZ/2yM6O9UE6ky', NULL, '2024-10-24 02:47:41', '2024-10-24 02:47:41'),
(97, 'Material Man HYSY 902', NULL, 'mm_hysy902', 'mm_hysy902@pertamina.com', NULL, NULL, '$2y$10$SkMm6Nxhrtq.jvQK8lAQO.U5jy5uP2Z/K5ShukrmFWE9mSMLFmAeu', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(98, 'Material Man Ship 114', NULL, 'mm_ship114', 'mm_ship114@pertamina.com', NULL, NULL, '$2y$10$Fqx7kSZqFYvLsN8PwTXGP.TAMT7UjXbEJEiX55Q18qFn2wdQdvc1u', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(99, 'Material Man Federal', NULL, 'mm_federal', 'mm_federal@pertamina.com', NULL, NULL, '$2y$10$sNdOsKZG/Vr4le1uUHLVkezR7WJDHvi/JKWcyY2xc9B17T68IdfaS', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(100, 'Material Man Superior', NULL, 'mm_superior', 'mm_superior@pertamina.com', NULL, NULL, '$2y$10$oboHeURkTE9HveSTyAmQZe0qxb5Q3ZpFgDB6w05S1sU0XEEgnlx0e', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(101, 'Material Man AIDA-A', NULL, 'mm_aidaa', 'mm_aidaa@pertamina.com', NULL, NULL, '$2y$10$R3pwUgmeyuOtlbhhzvuEEO5LCEV.TAEuuascFcvlYCLE3/ASPD4..', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(102, 'Material Man ARYANI-A', NULL, 'mm_aryania', 'mm_aryania@pertamina.com', NULL, NULL, '$2y$10$4KtV0JBL9WNT7uRpuEWErOxWE/wsponPHtfMfjqB3HxrcVbKlGAvS', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(103, 'Material Man CHESSY-A', NULL, 'mm_chessya', 'mm_chessya@pertamina.com', NULL, NULL, '$2y$10$SY9e1x5fiS4ZXDbAhLM99Oi21IxcY9W.IcliR9JzfMoDyXZPTZFSy', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(104, 'Material Man INDRI-A', NULL, 'mm_indria', 'mm_indria@pertamina.com', NULL, NULL, '$2y$10$H33AFay0hc0D9rAzCisTJOdjxyCsQ9xB5KkmjWWuVxymtDUweyrFS', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(105, 'Material Man FARIDA-A ', NULL, 'mm_faridaa', 'mm_faridaa@pertamina.com', NULL, NULL, '$2y$10$87.7leQ3LWHWSA7XvqrFbeWsD7G.67FnMGF8OqdRdLCLPAFwiW7pu', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(106, 'Material Man FARIDA-B ', NULL, 'mm_faridab', 'mm_faridab@pertamina.com', NULL, NULL, '$2y$10$qHm.d2VQcBpYCTIsfmpj0eARQscJ9GWdo4esL8s.IgDQXfPaRNUna', NULL, '2024-10-24 02:47:42', '2024-10-24 02:47:42'),
(107, 'Material Man KRISNA-A ', NULL, 'mm_krisnaa', 'mm_krisnaa@pertamina.com', NULL, NULL, '$2y$10$fc6goAHGpOdRGALmxRI17u.viuAFLDWwr45Jcv6hU9dVbJm.kHUKy', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(108, 'Material Man KRISNA-B ', NULL, 'mm_krisnab', 'mm_krisnab@pertamina.com', NULL, NULL, '$2y$10$MAIQMU7//RZQbI.VGSvdyOdBDI32l/ldUzkWLgVdJwcIMxmt4pVQG', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(109, 'Material Man CINTA-A ', NULL, 'mm_cintaa', 'mm_cintaa@pertamina.com', NULL, NULL, '$2y$10$c7ay2s7RATWtymSNrTlYee.6ffrAv0CXNvPudKaVEBh/cbArrxxze', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43'),
(110, 'Material Man CINTA-B ', NULL, 'mm_cintab', 'mm_cintab@pertamina.com', NULL, NULL, '$2y$10$5rrsIVtfyteqKvrwNhmcYeZaoRuvAt3v5G6xNZvIdJjFOkQS8YCM.', NULL, '2024-10-24 02:47:43', '2024-10-24 02:47:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdrs`
--

CREATE TABLE `vdrs` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `vessel_id` smallint(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `crew_onduty` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `crew_max` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `location_midnight` varchar(255) DEFAULT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `created_by` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdrs`
--

INSERT INTO `vdrs` (`id`, `code`, `vessel_id`, `date`, `crew_onduty`, `crew_max`, `location_midnight`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'VDR#00001', 11, '2024-12-16', 14, 20, 'Pabelokan', '101', 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-22 01:32:16'),
(2, 'VDR#00002', 11, '2024-12-17', 5, 20, 'PAB', '4', 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-22 01:19:40'),
(3, 'VDR#00003', 11, '2024-12-22', 6, 20, 'KJ4', '1', 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:37:05'),
(4, 'VDR#00004', 36, '2024-12-23', 8, 20, 'PAB', '0', 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(5, 'VDR#00005', 2, '2024-12-23', 14, 20, 'PAB', '0', 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_activities`
--

CREATE TABLE `vdr_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `activity` text NOT NULL,
  `start` time NOT NULL,
  `finish` time DEFAULT NULL,
  `high` decimal(4,2) NOT NULL,
  `normal` decimal(4,2) NOT NULL,
  `slow` decimal(4,2) NOT NULL,
  `manu` decimal(4,2) NOT NULL,
  `idle` decimal(4,2) NOT NULL,
  `tow` decimal(4,2) NOT NULL,
  `ah` decimal(4,2) NOT NULL,
  `sb` decimal(4,2) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_activities`
--

INSERT INTO `vdr_activities` (`id`, `vdr_id`, `activity`, `start`, `finish`, `high`, `normal`, `slow`, `manu`, `idle`, `tow`, `ah`, `sb`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Standby at KJ4', '00:30:00', '01:30:00', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'GIAT JAYA', '2024-12-20 03:56:04', '2024-12-20 03:56:04'),
(2, 5, 'Deck Unloading', '10:30:00', '11:30:00', 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'TRANSKO BALIHE', '2024-12-23 06:05:11', '2024-12-23 06:05:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_cargos`
--

CREATE TABLE `vdr_cargos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `heading_id` tinyint(4) NOT NULL,
  `opening` bigint(20) NOT NULL DEFAULT 0,
  `consumption` bigint(20) NOT NULL DEFAULT 0,
  `received` bigint(20) NOT NULL DEFAULT 0,
  `transferred` bigint(20) NOT NULL DEFAULT 0,
  `closing` bigint(20) NOT NULL DEFAULT 0,
  `remarks` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_cargos`
--

INSERT INTO `vdr_cargos` (`id`, `vdr_id`, `heading_id`, `opening`, `consumption`, `received`, `transferred`, `closing`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 78000, 4837, 50000, 0, 123100, 'Received Fuel from Pabelokan', 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-21 13:31:49'),
(2, 1, 2, 52000, 14000, 20000, 0, 58000, 'Received Water from Pabelokan', 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-21 13:40:04'),
(3, 1, 3, 12000, 0, 0, 0, 12000, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-21 13:22:30'),
(4, 1, 4, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(5, 1, 5, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(6, 1, 6, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(7, 1, 7, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(8, 1, 8, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(9, 1, 9, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-18 01:46:43', '2024-12-18 01:46:43'),
(10, 2, 1, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(11, 2, 2, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(12, 2, 3, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(13, 2, 4, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(14, 2, 5, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(15, 2, 6, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(16, 2, 7, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(17, 2, 8, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(18, 2, 9, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(19, 3, 1, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(20, 3, 2, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(21, 3, 3, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(22, 3, 4, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(23, 3, 5, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(24, 3, 6, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(25, 3, 7, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(26, 3, 8, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(27, 3, 9, 0, 0, 0, 0, 0, NULL, 'GIAT JAYA', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(28, 4, 1, 78000, 4837, 50000, 0, 123100, 'Received Fuel from Pabelokan', 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 03:19:24'),
(29, 4, 2, 52000, 14000, 20000, 0, 58000, 'Received Water from Pabelokan', 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 03:18:18'),
(30, 4, 3, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(31, 4, 4, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(32, 4, 5, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(33, 4, 6, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(34, 4, 7, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(35, 4, 8, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(36, 4, 9, 0, 0, 0, 0, 0, NULL, 'Tegas Jaya', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(37, 5, 1, 78000, 4895, 50000, 0, 123100, 'Received Fuel from Pabelokan', 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:31:46'),
(38, 5, 2, 52000, 14000, 20000, 0, 58000, 'Received Water from Pabelokan', 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:09:14'),
(39, 5, 3, 12000, 0, 0, 0, 12000, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:09:46'),
(40, 5, 4, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(41, 5, 5, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(42, 5, 6, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(43, 5, 7, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(44, 5, 8, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(45, 5, 9, 0, 0, 0, 0, 0, NULL, 'TRANSKO BALIHE', '2024-12-23 06:03:34', '2024-12-23 06:03:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_cargo_headings`
--

CREATE TABLE `vdr_cargo_headings` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `is_consumption` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_cargo_headings`
--

INSERT INTO `vdr_cargo_headings` (`id`, `description`, `unit`, `is_consumption`, `created_at`, `updated_at`) VALUES
(1, 'FUEL OIL', 'Ltrs', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'FRESH WATER', 'Ltrs', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'DRILL WATER', 'Ltrs', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'BARITE', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, 'BENTONITE', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, 'CEMENT BLENDED', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'CEMENT G', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'BRINE', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(9, 'OTHERS', 'Cuft', '0', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_crews`
--

CREATE TABLE `vdr_crews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_crew` varchar(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `crew_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_engines`
--

CREATE TABLE `vdr_engines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `heading_id` tinyint(4) NOT NULL,
  `m_ref` int(11) NOT NULL DEFAULT 0,
  `m_port` int(11) NOT NULL DEFAULT 0,
  `m_stbd` int(11) NOT NULL DEFAULT 0,
  `m_center` int(11) NOT NULL DEFAULT 0,
  `m_other` int(11) NOT NULL DEFAULT 0,
  `a_ref` int(11) NOT NULL DEFAULT 0,
  `a_port` int(11) NOT NULL DEFAULT 0,
  `a_stbd` int(11) NOT NULL DEFAULT 0,
  `a_other` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_engines`
--

INSERT INTO `vdr_engines` (`id`, `vdr_id`, `heading_id`, `m_ref`, `m_port`, `m_stbd`, `m_center`, `m_other`, `a_ref`, `a_port`, `a_stbd`, `a_other`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(2, 1, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(3, 1, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(4, 1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(5, 1, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(6, 1, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(7, 1, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(8, 1, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(9, 1, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(10, 1, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(11, 1, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(12, 1, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(13, 1, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(14, 1, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(15, 1, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(16, 1, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(17, 1, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(18, 1, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(19, 1, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(20, 1, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(21, 1, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(22, 1, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(23, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(24, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(25, 2, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(26, 2, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(27, 2, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(28, 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(29, 2, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(30, 2, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(31, 2, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(32, 2, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(33, 2, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(34, 2, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(35, 2, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(36, 2, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(37, 2, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(38, 2, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(39, 2, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(40, 2, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(41, 2, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(42, 2, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(43, 2, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(44, 2, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(45, 3, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(46, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(47, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(48, 3, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(49, 3, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(50, 3, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(51, 3, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(52, 3, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(53, 3, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(54, 3, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(55, 3, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(56, 3, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(57, 3, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(58, 3, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(59, 3, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(60, 3, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(61, 3, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(62, 3, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(63, 3, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(64, 3, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(65, 3, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(66, 3, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(67, 4, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(68, 4, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(69, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(70, 4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(71, 4, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(72, 4, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(73, 4, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(74, 4, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(75, 4, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(76, 4, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(77, 4, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(78, 4, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(79, 4, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(80, 4, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(81, 4, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(82, 4, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(83, 4, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(84, 4, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(85, 4, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(86, 4, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(87, 4, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(88, 4, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(89, 5, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(90, 5, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(91, 5, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(92, 5, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(93, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(94, 5, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(95, 5, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(96, 5, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(97, 5, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(98, 5, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(99, 5, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(100, 5, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(101, 5, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(102, 5, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(103, 5, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(104, 5, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(105, 5, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(106, 5, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(107, 5, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(108, 5, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(109, 5, 21, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(110, 5, 22, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-12-23 06:03:34', '2024-12-23 06:03:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_engine_headings`
--

CREATE TABLE `vdr_engine_headings` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_engine_headings`
--

INSERT INTO `vdr_engine_headings` (`id`, `description`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Engine Revolution', 'RPM', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Oil Pressure', 'Bar', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'Coolant Temperature Inlet', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'Coolant Temperature Outlet', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, 'Coolant Temperature Cyl. #1', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, 'Coolant Temperature Cyl. #2', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'Coolant Temperature Cyl. #3', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'Coolant Temperature Cyl. #4', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(9, 'Coolant Temperature Cyl. #5', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(10, 'Coolant Temperature Cyl. #6', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(11, 'Coolant Temperature Cyl. #7', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(12, 'Coolant Temperature Cyl. #8', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(13, 'Coolant Temperature Cyl. #9', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(14, 'Coolant Temperature Cyl. #10', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(15, 'Coolant Temperature Cyl. #11', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(16, 'Coolant Temperature Cyl. #12', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(17, 'Coolant Temperature Cyl. #13', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(18, 'Coolant Temperature Cyl. #14', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(19, 'Coolant Temperature Cyl. #15', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(20, 'Coolant Temperature Cyl. #16', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(21, 'Gear Box Oil Temperature', 'C', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(22, 'Gear Box Oil Pressure', 'Bar', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_headers`
--

CREATE TABLE `vdr_headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `header_id` tinyint(4) NOT NULL,
  `previous` smallint(6) NOT NULL DEFAULT 0,
  `today` smallint(6) NOT NULL DEFAULT 0,
  `status` varchar(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_hses`
--

CREATE TABLE `vdr_hses` (
  `id` int(10) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `header_id` tinyint(4) NOT NULL,
  `previous` smallint(6) NOT NULL DEFAULT 0,
  `today` smallint(6) NOT NULL DEFAULT 0,
  `status` varchar(3) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_hses`
--

INSERT INTO `vdr_hses` (`id`, `vdr_id`, `header_id`, `previous`, `today`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(2, 1, 2, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(3, 1, 3, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(4, 1, 4, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(5, 1, 5, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(6, 1, 6, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(7, 1, 7, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(8, 1, 8, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(9, 1, 9, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(10, 1, 10, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(11, 1, 11, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(12, 1, 12, 0, 0, '0', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(13, 2, 1, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(14, 2, 2, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(15, 2, 3, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(16, 2, 4, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(17, 2, 5, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(18, 2, 6, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(19, 2, 7, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(20, 2, 8, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(21, 2, 9, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(22, 2, 10, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(23, 2, 11, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(24, 2, 12, 0, 0, '0', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(25, 3, 1, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(26, 3, 2, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(27, 3, 3, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(28, 3, 4, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(29, 3, 5, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(30, 3, 6, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(31, 3, 7, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(32, 3, 8, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(33, 3, 9, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(34, 3, 10, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(35, 3, 11, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(36, 3, 12, 0, 0, '0', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(37, 4, 1, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(38, 4, 2, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(39, 4, 3, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(40, 4, 4, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(41, 4, 5, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(42, 4, 6, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(43, 4, 7, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(44, 4, 8, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(45, 4, 9, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(46, 4, 10, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(47, 4, 11, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(48, 4, 12, 0, 0, '0', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(49, 5, 1, 100, 10, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(50, 5, 2, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(51, 5, 3, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(52, 5, 4, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(53, 5, 5, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(54, 5, 6, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(55, 5, 7, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(56, 5, 8, 0, 0, '0', '2024-12-23 06:03:34', '2024-12-23 06:03:34'),
(57, 5, 9, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(58, 5, 10, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(59, 5, 11, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26'),
(60, 5, 12, 0, 0, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_hse_headers`
--

CREATE TABLE `vdr_hse_headers` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `group_header` varchar(255) NOT NULL,
  `io` varchar(1) NOT NULL,
  `is_header` varchar(1) NOT NULL DEFAULT '1',
  `header_id` tinyint(4) DEFAULT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_hse_headers`
--

INSERT INTO `vdr_hse_headers` (`id`, `description`, `group_header`, `io`, `is_header`, `header_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'O & I Card Submission (e.g, PINTER, STOP, etc)', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Ijin Kerja / PTW issued)', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'Tool Box Talk', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'HSSE Induction (New Corner & Visitor)', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, 'Emergency Drills', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, 'Internal Audit (by Office)', 'A', 'i', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'Safe Manhours Worked (Vessel Crew)', 'B', 'o', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'Number of Accident/Incident', 'B', 'o', '1', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(9, 'Lost Time Injury', 'B', 'o', '0', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(10, 'Medical Treatment Case', 'B', 'o', '0', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(11, 'First Aid Case', 'B', 'o', '0', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(12, 'Others', 'B', 'o', '0', NULL, '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_operatings`
--

CREATE TABLE `vdr_operatings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `heading_id` tinyint(4) NOT NULL,
  `time` decimal(4,2) NOT NULL DEFAULT 0.00,
  `speed` decimal(4,2) DEFAULT NULL,
  `contractual_fuel` smallint(6) DEFAULT NULL,
  `daily` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_operatings`
--

INSERT INTO `vdr_operatings` (`id`, `vdr_id`, `heading_id`, `time`, `speed`, `contractual_fuel`, `daily`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1.00, 4.00, 70, 70.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(2, 1, 2, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(3, 1, 3, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(4, 1, 4, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(5, 1, 5, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(6, 1, 6, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(7, 1, 7, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(8, 1, 8, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(9, 1, 9, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(10, 1, 10, 0.00, NULL, NULL, 0.00, '2024-12-18 01:46:44', '2024-12-20 03:56:04'),
(11, 2, 1, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(12, 2, 2, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(13, 2, 3, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(14, 2, 4, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(15, 2, 5, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(16, 2, 6, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(17, 2, 7, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(18, 2, 8, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(19, 2, 9, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(20, 2, 10, 0.00, NULL, NULL, NULL, '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(21, 3, 1, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(22, 3, 2, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(23, 3, 3, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(24, 3, 4, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(25, 3, 5, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(26, 3, 6, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(27, 3, 7, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(28, 3, 8, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(29, 3, 9, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(30, 3, 10, 0.00, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(31, 4, 1, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(32, 4, 2, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(33, 4, 3, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(34, 4, 4, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(35, 4, 5, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(36, 4, 6, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(37, 4, 7, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(38, 4, 8, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(39, 4, 9, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(40, 4, 10, 0.00, NULL, NULL, NULL, '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(41, 5, 1, 1.00, 8.00, 400, 400.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(42, 5, 2, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(43, 5, 3, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(44, 5, 4, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(45, 5, 5, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(46, 5, 6, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(47, 5, 7, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(48, 5, 8, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(49, 5, 9, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25'),
(50, 5, 10, 0.00, NULL, NULL, 0.00, '2024-12-23 06:03:34', '2024-12-23 06:07:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_operating_headers`
--

CREATE TABLE `vdr_operating_headers` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `description` varchar(100) NOT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `field` varchar(50) DEFAULT NULL,
  `speed` varchar(1) NOT NULL DEFAULT '0',
  `contractual` varchar(1) NOT NULL DEFAULT '1',
  `daily` varchar(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_operating_headers`
--

INSERT INTO `vdr_operating_headers` (`id`, `description`, `unit`, `field`, `speed`, `contractual`, `daily`, `created_at`, `updated_at`) VALUES
(1, 'High Speed (High)', NULL, 'high', '1', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Normal Speed (Normal)', NULL, 'normal', '1', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'Slow Speed (Slow)', NULL, 'slow', '1', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(4, 'Maneuvering (Manu) - Including DP', NULL, 'manu', '0', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(5, 'Idle', NULL, 'idle', '0', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(6, 'Towing (Tow)', NULL, 'tow', '0', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(7, 'Anchor Handling (A/H)', NULL, 'ah', '0', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(8, 'Standby (S/B)', NULL, 'sb', '0', '1', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(9, 'Maintenance', NULL, NULL, '0', '0', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(10, 'Down Time', NULL, NULL, '0', '0', '1', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_passengers`
--

CREATE TABLE `vdr_passengers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ranks` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `is_crew` varchar(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_periodics`
--

CREATE TABLE `vdr_periodics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(11) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `rob_time` time DEFAULT NULL,
  `rob_value` bigint(20) DEFAULT NULL,
  `rob_actual` bigint(20) DEFAULT NULL,
  `rob_diff` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fuel_cons_remu` int(11) DEFAULT NULL,
  `fuel_cons_correct` int(11) DEFAULT NULL,
  `fuel_cons_actual` int(11) DEFAULT NULL,
  `fuel_cons_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_periodics`
--

INSERT INTO `vdr_periodics` (`id`, `vdr_id`, `activity`, `rob_time`, `rob_value`, `rob_actual`, `rob_diff`, `created_at`, `updated_at`, `fuel_cons_remu`, `fuel_cons_correct`, `fuel_cons_actual`, `fuel_cons_total`) VALUES
(1, 1, 'Pre-Bunker Check', '10:30:00', 76000, 76058, 58, '2024-12-18 01:46:43', '2024-12-21 13:29:58', 2145, 2087, 2750, 4837),
(2, 2, 'Not Applicable', '10:36:00', 100, 90, -10, '2024-12-19 02:03:44', '2024-12-20 02:49:43', 200, 100, 170, 270),
(3, 3, NULL, NULL, NULL, NULL, NULL, '2024-12-22 01:36:54', '2024-12-22 01:36:54', NULL, NULL, NULL, NULL),
(4, 4, 'Pre-Bunker Check', '10:30:00', 76000, 76058, 58, '2024-12-23 02:40:23', '2024-12-23 03:19:24', 2145, 2087, 2750, 4837),
(5, 5, 'Pre-Bunker Check', '10:30:00', 76000, 75058, -942, '2024-12-23 06:03:34', '2024-12-23 06:31:46', 2145, 2145, 2750, 4895);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_timestamps`
--

CREATE TABLE `vdr_timestamps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vdr_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_timestamps`
--

INSERT INTO `vdr_timestamps` (`id`, `vdr_id`, `type`, `status`, `user_id`, `desc`, `created_at`, `updated_at`) VALUES
(1, 2, 'reject', 1, 1, 'Ada kesalahan', '2024-12-20 02:55:14', '2024-12-20 02:55:14'),
(2, 1, 'reject', 2, 1, NULL, '2024-12-22 01:07:51', '2024-12-22 01:07:51'),
(3, 2, NULL, 2, 1, NULL, '2024-12-22 01:08:02', '2024-12-22 01:08:02'),
(4, 2, NULL, 3, 3, NULL, '2024-12-22 01:18:37', '2024-12-22 01:18:37'),
(5, 2, NULL, 4, 4, NULL, '2024-12-22 01:19:40', '2024-12-22 01:19:40'),
(6, 1, 'reject', 1, 1, 'Ada value yang anomali di weather condition', '2024-12-22 01:32:16', '2024-12-22 01:32:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_weathers`
--

CREATE TABLE `vdr_weathers` (
  `id` int(10) UNSIGNED NOT NULL,
  `vdr_id` int(10) UNSIGNED NOT NULL,
  `heading_id` tinyint(3) UNSIGNED NOT NULL,
  `t_0006` varchar(255) DEFAULT NULL,
  `t_0612` varchar(255) DEFAULT NULL,
  `t_1218` varchar(255) DEFAULT NULL,
  `t_1824` varchar(255) DEFAULT NULL,
  `status` varchar(3) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_weathers`
--

INSERT INTO `vdr_weathers` (`id`, `vdr_id`, `heading_id`, `t_0006`, `t_0612`, `t_1218`, `t_1824`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, NULL, '1', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(2, 1, 2, NULL, NULL, NULL, NULL, '1', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(3, 1, 3, NULL, NULL, NULL, NULL, '1', '2024-12-18 01:46:44', '2024-12-18 01:46:44'),
(4, 2, 1, NULL, NULL, NULL, NULL, '1', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(5, 2, 2, NULL, NULL, NULL, NULL, '1', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(6, 2, 3, NULL, NULL, NULL, NULL, '1', '2024-12-19 02:03:44', '2024-12-19 02:03:44'),
(7, 3, 1, NULL, NULL, NULL, NULL, '1', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(8, 3, 2, NULL, NULL, NULL, NULL, '1', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(9, 3, 3, NULL, NULL, NULL, NULL, '1', '2024-12-22 01:36:54', '2024-12-22 01:36:54'),
(10, 4, 1, NULL, NULL, NULL, NULL, '1', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(11, 4, 2, NULL, NULL, NULL, NULL, '1', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(12, 4, 3, NULL, NULL, NULL, NULL, '1', '2024-12-23 02:40:23', '2024-12-23 02:40:23'),
(13, 5, 1, 'ENE / 10-12 knots', NULL, NULL, NULL, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:06'),
(14, 5, 2, NULL, '0.8 - 1 m', NULL, NULL, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:06'),
(15, 5, 3, NULL, NULL, '3 NM', NULL, '1', '2024-12-23 06:03:34', '2024-12-23 06:04:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vdr_weather_headings`
--

CREATE TABLE `vdr_weather_headings` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vdr_weather_headings`
--

INSERT INTO `vdr_weather_headings` (`id`, `heading`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Wind', 'Wind (Dir/speed)', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(2, 'Sea', 'Sea (Wave Height)', '2024-06-10 04:07:51', '2024-06-10 04:07:51'),
(3, 'Visibility', 'Visibility', '2024-06-10 04:07:51', '2024-06-10 04:07:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessels`
--

CREATE TABLE `vessels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `port_id` mediumint(9) DEFAULT NULL,
  `func` varchar(255) DEFAULT NULL,
  `txid` varchar(255) DEFAULT NULL,
  `mmsi` varchar(255) DEFAULT NULL,
  `contract_no` varchar(255) DEFAULT NULL,
  `contract_start` date DEFAULT NULL,
  `contract_end` date DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telp` varchar(255) DEFAULT NULL,
  `master` varchar(255) DEFAULT NULL,
  `co` varchar(255) DEFAULT NULL,
  `require` varchar(255) DEFAULT NULL,
  `imo` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `prev_name` varchar(255) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `call_sign` varchar(255) DEFAULT NULL,
  `portname` varchar(255) DEFAULT NULL,
  `build` varchar(255) DEFAULT NULL,
  `classed_by` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `speed` varchar(255) DEFAULT NULL,
  `calcspeed` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) DEFAULT NULL,
  `class_notation` varchar(255) DEFAULT NULL,
  `loa` int(11) DEFAULT NULL,
  `beam` int(11) DEFAULT NULL,
  `depth` decimal(6,2) DEFAULT NULL,
  `maxdraft` decimal(6,2) DEFAULT NULL,
  `deadweight` decimal(6,2) DEFAULT NULL,
  `gross` decimal(6,2) DEFAULT NULL,
  `deckspace` decimal(6,2) DEFAULT NULL,
  `deckstrength` decimal(6,2) DEFAULT NULL,
  `deckcapacity` decimal(6,2) DEFAULT NULL,
  `main_engine` varchar(255) DEFAULT NULL,
  `no_engine` varchar(255) DEFAULT NULL,
  `no_main_propeller` varchar(255) DEFAULT NULL,
  `no_rudder` varchar(255) DEFAULT NULL,
  `generator` varchar(255) DEFAULT NULL,
  `no_generator` varchar(255) DEFAULT NULL,
  `generator_detail` varchar(255) DEFAULT NULL,
  `kort_nozzle` varchar(255) DEFAULT NULL,
  `bow_thruster` varchar(255) DEFAULT NULL,
  `stern_thruster` varchar(255) DEFAULT NULL,
  `other_propulsor` varchar(255) DEFAULT NULL,
  `speed_max` varchar(255) DEFAULT NULL,
  `speed_eco` varchar(255) DEFAULT NULL,
  `speed_towing` varchar(255) DEFAULT NULL,
  `no_berth` varchar(255) DEFAULT NULL,
  `berth_detail` varchar(255) DEFAULT NULL,
  `crane` varchar(255) DEFAULT NULL,
  `comm_system` varchar(255) DEFAULT NULL,
  `bunker_type` varchar(255) DEFAULT NULL,
  `bunker_capacity` varchar(255) DEFAULT NULL,
  `daily_fuel_consumption` varchar(255) DEFAULT NULL,
  `potable_water_capacity` varchar(255) DEFAULT NULL,
  `potable_water` varchar(255) DEFAULT NULL,
  `fifi_pump_capacity` varchar(255) DEFAULT NULL,
  `no_immarsat` varchar(255) DEFAULT NULL,
  `no_vsat` varchar(255) DEFAULT NULL,
  `dpa_name` varchar(255) DEFAULT NULL,
  `dpa_telp` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stowage_plan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vessels`
--

INSERT INTO `vessels` (`id`, `status`, `schedule_id`, `port_id`, `func`, `txid`, `mmsi`, `contract_no`, `contract_start`, `contract_end`, `name`, `username`, `email`, `telp`, `master`, `co`, `require`, `imo`, `type`, `prev_name`, `owner`, `operator`, `flag`, `call_sign`, `portname`, `build`, `classed_by`, `latitude`, `longitude`, `speed`, `calcspeed`, `heading`, `last_update`, `class_notation`, `loa`, `beam`, `depth`, `maxdraft`, `deadweight`, `gross`, `deckspace`, `deckstrength`, `deckcapacity`, `main_engine`, `no_engine`, `no_main_propeller`, `no_rudder`, `generator`, `no_generator`, `generator_detail`, `kort_nozzle`, `bow_thruster`, `stern_thruster`, `other_propulsor`, `speed_max`, `speed_eco`, `speed_towing`, `no_berth`, `berth_detail`, `crane`, `comm_system`, `bunker_type`, `bunker_capacity`, `daily_fuel_consumption`, `potable_water_capacity`, `potable_water`, `fifi_pump_capacity`, `no_immarsat`, `no_vsat`, `dpa_name`, `dpa_telp`, `created_at`, `updated_at`, `stowage_plan`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'TRANSKO MOLOKO', 'moloko', 'moloko@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(2, 1, 16, 1, NULL, '01143866SKY1B5F', '525016748', NULL, NULL, NULL, 'TRANSKO BALIHE', 'balihe', 'balihe@pertamina.com', NULL, NULL, NULL, NULL, '9704879', 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-12-23 04:02:58', 'stowage/plan/QhTjhNwcRhnDw086v5axg7CGDggxSiinWBPHo42p.pdf'),
(3, 1, NULL, NULL, NULL, '01157857SKY48A2', '525015881', NULL, NULL, NULL, 'LOGINDO OVERCOMER', 'logindo', 'logindo@pertamina.com', NULL, NULL, NULL, NULL, '9489443', 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(4, 1, NULL, NULL, NULL, NULL, '525019671', NULL, NULL, NULL, 'INDOLIZIZ SATU', 'indoliziz', 'indoliziz@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(5, 1, NULL, NULL, NULL, '01314493SKYABEE', '525016748', NULL, NULL, NULL, 'PETEKA 5402', 'peteka5402', 'peteka5402@pertamina.com', NULL, NULL, NULL, NULL, '9704879', 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(6, 1, NULL, NULL, NULL, '01143705SKY143A', '525016299', NULL, NULL, NULL, 'SIGAP JAYA', 'sigapjaya', 'sigap@pertamina.com', NULL, NULL, NULL, NULL, '8984692', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-5.7214', '106.51926666667', '29.2616', '29.2616', '308', '2024-10-31T10:24:11.000Z', NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-11-06 02:49:54', NULL),
(7, 1, 9, NULL, NULL, '01314671SKY7768', '525006284', NULL, NULL, NULL, 'TRITON JAWARA', 'tritonjawara', 'triton@pertamina.com', NULL, NULL, NULL, NULL, '9737668', 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-5.1603666666667', '106.30273333333', '19.0756', '19.0756', '280', '2024-11-06T02:42:51.000Z', NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-12-19 04:52:21', 'stowage/plan/Kqns5UiuCLMRzUtRBuNxNkGyVQ7W3lhCZYl8AvMj.pdf'),
(8, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MARVELA 08', 'marvela08', 'marvela08@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Supply Vessel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(9, 1, NULL, NULL, NULL, '01157762SKY4AC7', '525003414', NULL, NULL, NULL, 'ELOK JAYA', 'elokjaya', 'elok@pertamina.com', NULL, NULL, NULL, NULL, '9543483', 'Supply Vessel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(10, 1, NULL, NULL, NULL, '01314295SKY9010', NULL, NULL, NULL, NULL, 'TEKUN JAYA', 'tekunjaya', 'tekun@pertamina.com', NULL, NULL, NULL, NULL, '9704726', 'AHTS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(11, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'GIAT JAYA', 'giatjaya', 'giatjaya@pertamina.com', NULL, 'Yudi Hermanto', 'Indra Ismiyanto', NULL, NULL, 'Supply Vessel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(12, 1, NULL, NULL, NULL, '01157856SKYC49D', '525019603', NULL, NULL, NULL, 'INA PERMATA 1', 'inapermata1', 'ina1@pertamina.com', NULL, NULL, NULL, NULL, '9278260', 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(13, 1, NULL, NULL, NULL, '01143663SKY6B68', '525018453', NULL, NULL, NULL, 'ENC ONE', 'encone', 'encone@pertamina.com', NULL, NULL, NULL, NULL, '9576038', 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(14, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'INA PERMATA 2', 'inapermata2', 'ina2@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(15, 1, NULL, NULL, NULL, '01314501SKYCC16', NULL, NULL, NULL, NULL, 'TB. MEGAWATI 17', 'megawati17', 'mega17@pertamina.com', NULL, NULL, NULL, NULL, '9803053', 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(16, 1, NULL, NULL, NULL, '01143267SKY33AC', '525009172', NULL, NULL, NULL, 'DSV. PATRA OFFSHORE', 'patraoffshore', 'patraoffshore@pertamina.com', NULL, NULL, NULL, NULL, '8502729', 'Diving & Support Vessel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(17, 1, NULL, NULL, NULL, '01157766SKY5ADB', '525300032', NULL, NULL, NULL, 'OPS AVIOR', 'avior', 'avior@pertamina.com', NULL, NULL, NULL, NULL, '9562283', 'Offshore Supply Ship', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(18, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MERLION 121', 'merlion121', 'merlion121@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(19, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MERLION 131', 'merlion131', 'merlion131@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ALPHA MARINE', 'alphamarine', 'alpha@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(21, 1, NULL, NULL, NULL, '01143146SKYCD4F', '525300131', NULL, NULL, NULL, 'SANCHAI HARBOUR', 'sanchaiharbour', 'sanchai@pertamina.com', NULL, NULL, NULL, NULL, '5984202', 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(22, 1, NULL, NULL, NULL, '01143663SKY6B68', NULL, NULL, NULL, NULL, 'STK PRIMA 6', 'prima6', 'prima6@pertamina.com', NULL, NULL, NULL, NULL, '9576038', 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(23, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ANSANUS 12', 'ansanus12', 'ansanus12@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Tug Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(24, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'MT. IVANI', 'ivani', 'ivani@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Motor Tanker', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:27', NULL),
(25, 1, NULL, NULL, NULL, '01143656SKYCF45', NULL, NULL, NULL, NULL, 'CAST MARINE 3', 'castmarine3', 'castmarine3@pertamina.com', NULL, NULL, NULL, NULL, '9534937', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(26, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PAN MARINE 6', 'panmarine6', 'panmarine6@pertamina.com', NULL, NULL, NULL, NULL, '8984692', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(27, 1, NULL, NULL, NULL, '01157803SKY6F94', '525016749', NULL, NULL, NULL, 'NMS ACCELERATE', 'nmsaccelerate', 'accelerate@pertamina.com', NULL, NULL, NULL, NULL, '9704726', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(28, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CLARISSA 68', 'clarissa68', 'clarissa68@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(29, 1, NULL, NULL, NULL, '01314552SKY1915', '525019672', NULL, NULL, NULL, 'MAGELANG', 'magelang', 'magelang@pertamina.com', NULL, NULL, NULL, NULL, '5705660', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-5.1691833333333', '106.34133333333', '19.2608', '19.2608', '280', '2024-11-06T02:42:58.000Z', NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-11-06 02:49:54', NULL),
(30, 1, NULL, NULL, NULL, '01157859SKY50AC', '525015964', NULL, NULL, NULL, 'CLARA 58', 'clara58', 'clara58@pertamina.com', NULL, NULL, NULL, NULL, '9438975', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(31, 1, NULL, NULL, NULL, '01314543SKY74E8', NULL, NULL, NULL, NULL, 'NMS ACCOMPLISH', 'accomplish', 'accomplish@pertamina.com', NULL, NULL, NULL, NULL, '9737668', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(32, 1, NULL, NULL, NULL, '01314524SKYA889', '525019671', NULL, NULL, NULL, 'SALATIGA', 'salatiga', 'salatiga@pertamina.com', NULL, NULL, NULL, NULL, '9743772', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(33, 1, NULL, NULL, NULL, '01157838SKY7C43', '525018274', NULL, NULL, NULL, 'PAN MARINE 19', 'panmarine19', 'panmarine19@pertamina.com', NULL, NULL, NULL, NULL, '9709582', 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '-4.7237666666667', '106.58821666667', '0.1852', '0.1852', '230', '2024-11-06T02:45:02.000Z', NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-11-06 02:49:54', NULL),
(34, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PATRA MARINE', 'patramarine', 'patramarine@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Diving & Support Vessel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(35, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PRISAI', 'prisai', 'prisai@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL),
(36, 1, NULL, NULL, NULL, NULL, '500000000', NULL, NULL, NULL, 'TEGAS JAYA', 'tegasjaya', 'tegasjaya@pertamina.com', NULL, NULL, NULL, NULL, NULL, 'Crew Boat', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100.00, NULL, 60.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-06-10 04:07:50', '2024-09-24 04:07:28', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_histories`
--

CREATE TABLE `vessel_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vessel_id` int(11) NOT NULL,
  `onhire` date NOT NULL,
  `offhire` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `vessel_histories`
--

INSERT INTO `vessel_histories` (`id`, `vessel_id`, `onhire`, `offhire`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(2, 2, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(3, 3, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(4, 4, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(5, 5, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(6, 6, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(7, 7, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(8, 8, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(9, 9, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(10, 10, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(11, 11, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(12, 12, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(13, 13, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(14, 14, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(15, 15, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(16, 16, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(17, 17, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(18, 18, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(19, 19, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(20, 20, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(21, 21, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(22, 22, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(23, 23, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(24, 24, '2024-09-24', NULL, NULL, '2024-09-24 04:07:27', '2024-09-24 04:07:27'),
(25, 25, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(26, 26, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(27, 27, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(28, 28, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(29, 29, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(30, 30, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(31, 31, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(32, 32, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(33, 33, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(34, 34, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(35, 35, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(36, 36, '2024-09-24', NULL, NULL, '2024-09-24 04:07:28', '2024-09-24 04:07:28'),
(37, 1, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(38, 2, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(39, 3, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(40, 4, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(41, 5, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(42, 6, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(43, 7, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(44, 8, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(45, 9, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(46, 10, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(47, 11, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(48, 12, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(49, 13, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(50, 14, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(51, 15, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(52, 16, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(53, 17, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(54, 18, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(55, 19, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(56, 20, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(57, 21, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(58, 22, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(59, 23, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(60, 24, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(61, 25, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(62, 26, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(63, 27, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(64, 28, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(65, 29, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(66, 30, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(67, 31, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(68, 32, '2024-09-24', NULL, NULL, '2024-09-24 04:12:30', '2024-09-24 04:12:30'),
(69, 33, '2024-09-24', NULL, NULL, '2024-09-24 04:12:31', '2024-09-24 04:12:31'),
(70, 34, '2024-09-24', NULL, NULL, '2024-09-24 04:12:31', '2024-09-24 04:12:31'),
(71, 35, '2024-09-24', NULL, NULL, '2024-09-24 04:12:31', '2024-09-24 04:12:31'),
(72, 36, '2024-09-24', NULL, NULL, '2024-09-24 04:12:31', '2024-09-24 04:12:31'),
(73, 1, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(74, 2, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(75, 3, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(76, 4, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(77, 5, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(78, 6, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(79, 7, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(80, 8, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(81, 9, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(82, 10, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(83, 11, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(84, 12, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(85, 13, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(86, 14, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(87, 15, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(88, 16, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(89, 17, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(90, 18, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(91, 19, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(92, 20, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(93, 21, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(94, 22, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(95, 23, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(96, 24, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(97, 25, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(98, 26, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(99, 27, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(100, 28, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(101, 29, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(102, 30, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(103, 31, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(104, 32, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(105, 33, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(106, 34, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(107, 35, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(108, 36, '2024-09-24', NULL, NULL, '2024-09-24 04:21:15', '2024-09-24 04:21:15'),
(109, 1, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(110, 2, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(111, 3, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(112, 4, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(113, 5, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(114, 6, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(115, 7, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(116, 8, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(117, 9, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(118, 10, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(119, 11, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(120, 12, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(121, 13, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(122, 14, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(123, 15, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(124, 16, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(125, 17, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(126, 18, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(127, 19, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(128, 20, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(129, 21, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(130, 22, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(131, 23, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(132, 24, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(133, 25, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(134, 26, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(135, 27, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(136, 28, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(137, 29, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(138, 30, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(139, 31, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(140, 32, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(141, 33, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(142, 34, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(143, 35, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(144, 36, '2024-09-24', NULL, NULL, '2024-09-24 04:54:37', '2024-09-24 04:54:37'),
(145, 1, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(146, 2, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(147, 3, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(148, 4, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(149, 5, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(150, 6, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(151, 7, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(152, 8, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(153, 9, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(154, 10, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(155, 11, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(156, 12, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(157, 13, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(158, 14, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(159, 15, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(160, 16, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(161, 17, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(162, 18, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(163, 19, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(164, 20, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(165, 21, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(166, 22, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(167, 23, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(168, 24, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(169, 25, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(170, 26, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(171, 27, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(172, 28, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(173, 29, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(174, 30, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(175, 31, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(176, 32, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(177, 33, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(178, 34, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(179, 35, '2024-09-24', NULL, NULL, '2024-09-24 05:19:03', '2024-09-24 05:19:03'),
(180, 36, '2024-09-24', NULL, NULL, '2024-09-24 05:19:04', '2024-09-24 05:19:04'),
(181, 1, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(182, 2, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(183, 3, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(184, 4, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(185, 5, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(186, 6, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(187, 7, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(188, 8, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(189, 9, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(190, 10, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(191, 11, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(192, 12, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(193, 13, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(194, 14, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(195, 15, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(196, 16, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(197, 17, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(198, 18, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(199, 19, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(200, 20, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(201, 21, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(202, 22, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(203, 23, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(204, 24, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(205, 25, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(206, 26, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(207, 27, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(208, 28, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(209, 29, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(210, 30, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(211, 31, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(212, 32, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(213, 33, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(214, 34, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(215, 35, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(216, 36, '2024-09-24', NULL, NULL, '2024-09-24 05:35:50', '2024-09-24 05:35:50'),
(217, 1, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(218, 2, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(219, 3, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(220, 4, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(221, 5, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(222, 6, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(223, 7, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(224, 8, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(225, 9, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(226, 10, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(227, 11, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(228, 12, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(229, 13, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(230, 14, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(231, 15, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(232, 16, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(233, 17, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(234, 18, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(235, 19, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(236, 20, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(237, 21, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(238, 22, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(239, 23, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(240, 24, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(241, 25, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(242, 26, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(243, 27, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(244, 28, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(245, 29, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(246, 30, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(247, 31, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(248, 32, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(249, 33, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(250, 34, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(251, 35, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(252, 36, '2024-09-24', NULL, NULL, '2024-09-24 07:42:58', '2024-09-24 07:42:58'),
(253, 1, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(254, 2, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(255, 3, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(256, 4, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(257, 5, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(258, 6, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(259, 7, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(260, 8, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(261, 9, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(262, 10, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(263, 11, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(264, 12, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(265, 13, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(266, 14, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(267, 15, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(268, 16, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(269, 17, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(270, 18, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(271, 19, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(272, 20, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(273, 21, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(274, 22, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(275, 23, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(276, 24, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(277, 25, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(278, 26, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(279, 27, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(280, 28, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(281, 29, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(282, 30, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(283, 31, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(284, 32, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(285, 33, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(286, 34, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(287, 35, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(288, 36, '2024-09-24', NULL, NULL, '2024-09-24 08:03:40', '2024-09-24 08:03:40'),
(289, 1, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(290, 2, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(291, 3, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(292, 4, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(293, 5, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(294, 6, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(295, 7, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(296, 8, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(297, 9, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(298, 10, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(299, 11, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(300, 12, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(301, 13, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(302, 14, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(303, 15, '2024-09-25', NULL, NULL, '2024-09-25 02:40:43', '2024-09-25 02:40:43'),
(304, 16, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(305, 17, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(306, 18, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(307, 19, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(308, 20, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(309, 21, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(310, 22, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(311, 23, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(312, 24, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(313, 25, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(314, 26, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(315, 27, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(316, 28, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(317, 29, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(318, 30, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(319, 31, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(320, 32, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(321, 33, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(322, 34, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(323, 35, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(324, 36, '2024-09-25', NULL, NULL, '2024-09-25 02:40:44', '2024-09-25 02:40:44'),
(325, 1, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(326, 2, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(327, 3, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(328, 4, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(329, 5, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(330, 6, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(331, 7, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(332, 8, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(333, 9, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(334, 10, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(335, 11, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(336, 12, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(337, 13, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(338, 14, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(339, 15, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(340, 16, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(341, 17, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(342, 18, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(343, 19, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(344, 20, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(345, 21, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(346, 22, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(347, 23, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(348, 24, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(349, 25, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(350, 26, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(351, 27, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(352, 28, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(353, 29, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(354, 30, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(355, 31, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(356, 32, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(357, 33, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(358, 34, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(359, 35, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(360, 36, '2024-09-25', NULL, NULL, '2024-09-25 02:42:26', '2024-09-25 02:42:26'),
(361, 1, '2024-09-25', NULL, NULL, '2024-09-25 02:43:31', '2024-09-25 02:43:31'),
(362, 2, '2024-09-25', NULL, NULL, '2024-09-25 02:43:31', '2024-09-25 02:43:31'),
(363, 3, '2024-09-25', NULL, NULL, '2024-09-25 02:43:31', '2024-09-25 02:43:31'),
(364, 4, '2024-09-25', NULL, NULL, '2024-09-25 02:43:31', '2024-09-25 02:43:31'),
(365, 5, '2024-09-25', NULL, NULL, '2024-09-25 02:43:31', '2024-09-25 02:43:31'),
(366, 6, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(367, 7, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(368, 8, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(369, 9, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(370, 10, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(371, 11, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(372, 12, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(373, 13, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(374, 14, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(375, 15, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(376, 16, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(377, 17, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(378, 18, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(379, 19, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(380, 20, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(381, 21, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(382, 22, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(383, 23, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(384, 24, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(385, 25, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(386, 26, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(387, 27, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(388, 28, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(389, 29, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(390, 30, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(391, 31, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(392, 32, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(393, 33, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(394, 34, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(395, 35, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(396, 36, '2024-09-25', NULL, NULL, '2024-09-25 02:43:32', '2024-09-25 02:43:32'),
(397, 1, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(398, 2, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(399, 3, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(400, 4, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(401, 5, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(402, 6, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(403, 7, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(404, 8, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(405, 9, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(406, 10, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(407, 11, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(408, 12, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(409, 13, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(410, 14, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(411, 15, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(412, 16, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(413, 17, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(414, 18, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(415, 19, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(416, 20, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(417, 21, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(418, 22, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(419, 23, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(420, 24, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(421, 25, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(422, 26, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(423, 27, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(424, 28, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(425, 29, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(426, 30, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(427, 31, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(428, 32, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(429, 33, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(430, 34, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(431, 35, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(432, 36, '2024-09-25', NULL, NULL, '2024-09-25 02:47:40', '2024-09-25 02:47:40'),
(433, 1, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(434, 2, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(435, 3, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(436, 4, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(437, 5, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(438, 6, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(439, 7, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(440, 8, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(441, 9, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(442, 10, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(443, 11, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(444, 12, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(445, 13, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(446, 14, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(447, 15, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(448, 16, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(449, 17, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(450, 18, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(451, 19, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(452, 20, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(453, 21, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(454, 22, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(455, 23, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(456, 24, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(457, 25, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(458, 26, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(459, 27, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(460, 28, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(461, 29, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(462, 30, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(463, 31, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(464, 32, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(465, 33, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(466, 34, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(467, 35, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(468, 36, '2024-09-25', NULL, NULL, '2024-09-25 02:51:03', '2024-09-25 02:51:03'),
(469, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(470, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(471, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(472, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(473, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(474, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(475, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(476, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(477, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(478, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(479, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(480, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(481, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(482, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(483, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(484, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(485, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(486, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(487, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(488, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(489, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(490, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(491, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(492, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(493, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(494, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(495, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(496, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(497, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(498, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(499, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(500, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(501, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(502, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(503, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(504, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:06:05', '2024-09-25 03:06:05'),
(505, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(506, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(507, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(508, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(509, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(510, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(511, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(512, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(513, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(514, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(515, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(516, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(517, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(518, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(519, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(520, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(521, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(522, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(523, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(524, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(525, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(526, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(527, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(528, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(529, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(530, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(531, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(532, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(533, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(534, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(535, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(536, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(537, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(538, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(539, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(540, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:06:34', '2024-09-25 03:06:34'),
(541, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(542, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(543, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(544, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(545, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(546, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(547, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(548, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(549, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(550, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(551, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(552, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(553, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(554, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(555, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(556, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(557, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(558, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(559, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(560, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(561, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(562, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(563, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(564, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(565, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(566, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(567, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(568, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(569, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(570, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(571, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(572, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(573, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(574, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(575, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(576, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:07:24', '2024-09-25 03:07:24'),
(577, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(578, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(579, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(580, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(581, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(582, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(583, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(584, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(585, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(586, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(587, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(588, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(589, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(590, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(591, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(592, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(593, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(594, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(595, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(596, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(597, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(598, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(599, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(600, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(601, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(602, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(603, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(604, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(605, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(606, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(607, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(608, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(609, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(610, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(611, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(612, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:08:06', '2024-09-25 03:08:06'),
(613, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(614, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(615, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(616, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(617, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(618, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(619, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07');
INSERT INTO `vessel_histories` (`id`, `vessel_id`, `onhire`, `offhire`, `total`, `created_at`, `updated_at`) VALUES
(620, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(621, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(622, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(623, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(624, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(625, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(626, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(627, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(628, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(629, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(630, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(631, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(632, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(633, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(634, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(635, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(636, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(637, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(638, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(639, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(640, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(641, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(642, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(643, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(644, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(645, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(646, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(647, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(648, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:09:07', '2024-09-25 03:09:07'),
(649, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(650, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(651, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(652, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(653, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(654, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(655, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(656, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(657, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(658, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(659, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(660, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(661, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(662, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(663, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(664, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(665, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(666, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(667, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(668, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(669, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(670, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(671, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(672, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(673, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(674, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(675, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(676, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(677, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(678, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(679, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(680, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(681, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(682, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(683, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(684, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:12:40', '2024-09-25 03:12:40'),
(685, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(686, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(687, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(688, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(689, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(690, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(691, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(692, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(693, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(694, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(695, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(696, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(697, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(698, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(699, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(700, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(701, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(702, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(703, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(704, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(705, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(706, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(707, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(708, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(709, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(710, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(711, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(712, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(713, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(714, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(715, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(716, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(717, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(718, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(719, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(720, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:13:06', '2024-09-25 03:13:06'),
(721, 1, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(722, 2, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(723, 3, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(724, 4, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(725, 5, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(726, 6, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(727, 7, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(728, 8, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(729, 9, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(730, 10, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(731, 11, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(732, 12, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(733, 13, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(734, 14, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(735, 15, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(736, 16, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(737, 17, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(738, 18, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(739, 19, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(740, 20, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(741, 21, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(742, 22, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(743, 23, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(744, 24, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(745, 25, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(746, 26, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(747, 27, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(748, 28, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(749, 29, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(750, 30, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(751, 31, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(752, 32, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(753, 33, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(754, 34, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(755, 35, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(756, 36, '2024-09-25', NULL, NULL, '2024-09-25 03:18:08', '2024-09-25 03:18:08'),
(757, 1, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(758, 2, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(759, 3, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(760, 4, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(761, 5, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(762, 6, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(763, 7, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(764, 8, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(765, 9, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(766, 10, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(767, 11, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(768, 12, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(769, 13, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(770, 14, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(771, 15, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(772, 16, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(773, 17, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(774, 18, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(775, 19, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(776, 20, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(777, 21, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(778, 22, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(779, 23, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(780, 24, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(781, 25, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(782, 26, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(783, 27, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(784, 28, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(785, 29, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(786, 30, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(787, 31, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(788, 32, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(789, 33, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(790, 34, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(791, 35, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(792, 36, '2024-10-18', NULL, NULL, '2024-10-18 08:09:52', '2024-10-18 08:09:52'),
(793, 1, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(794, 2, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(795, 3, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(796, 4, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(797, 5, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(798, 6, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(799, 7, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(800, 8, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(801, 9, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(802, 10, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(803, 11, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(804, 12, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(805, 13, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(806, 14, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(807, 15, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(808, 16, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(809, 17, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(810, 18, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(811, 19, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(812, 20, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(813, 21, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(814, 22, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(815, 23, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(816, 24, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(817, 25, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(818, 26, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(819, 27, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(820, 28, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(821, 29, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(822, 30, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(823, 31, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(824, 32, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(825, 33, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(826, 34, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(827, 35, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(828, 36, '2024-10-18', NULL, NULL, '2024-10-18 08:10:49', '2024-10-18 08:10:49'),
(829, 1, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(830, 2, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(831, 3, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(832, 4, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(833, 5, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(834, 6, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(835, 7, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(836, 8, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(837, 9, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(838, 10, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(839, 11, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(840, 12, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(841, 13, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(842, 14, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(843, 15, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(844, 16, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(845, 17, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(846, 18, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(847, 19, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(848, 20, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(849, 21, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(850, 22, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(851, 23, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(852, 24, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(853, 25, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(854, 26, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(855, 27, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(856, 28, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(857, 29, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(858, 30, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(859, 31, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(860, 32, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(861, 33, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(862, 34, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(863, 35, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(864, 36, '2024-10-24', NULL, NULL, '2024-10-24 02:20:50', '2024-10-24 02:20:50'),
(865, 1, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(866, 2, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(867, 3, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(868, 4, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(869, 5, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(870, 6, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(871, 7, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(872, 8, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(873, 9, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(874, 10, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(875, 11, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(876, 12, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(877, 13, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(878, 14, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(879, 15, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(880, 16, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(881, 17, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(882, 18, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(883, 19, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(884, 20, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(885, 21, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(886, 22, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(887, 23, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(888, 24, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(889, 25, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(890, 26, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(891, 27, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(892, 28, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(893, 29, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(894, 30, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(895, 31, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(896, 32, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(897, 33, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(898, 34, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(899, 35, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(900, 36, '2024-10-31', NULL, NULL, '2024-10-31 08:40:00', '2024-10-31 08:40:00'),
(901, 1, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(902, 2, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(903, 3, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(904, 4, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(905, 5, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(906, 6, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(907, 7, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(908, 8, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(909, 9, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(910, 10, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(911, 11, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(912, 12, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(913, 13, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(914, 14, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(915, 15, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(916, 16, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(917, 17, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(918, 18, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(919, 19, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(920, 20, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(921, 21, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(922, 22, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(923, 23, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(924, 24, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(925, 25, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(926, 26, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(927, 27, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(928, 28, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(929, 29, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(930, 30, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(931, 31, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(932, 32, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(933, 33, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(934, 34, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(935, 35, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(936, 36, '2024-10-31', NULL, NULL, '2024-10-31 08:40:40', '2024-10-31 08:40:40'),
(937, 1, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(938, 2, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(939, 3, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(940, 4, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(941, 5, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(942, 6, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(943, 7, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(944, 8, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(945, 9, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(946, 10, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(947, 11, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(948, 12, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(949, 13, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(950, 14, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(951, 15, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(952, 16, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(953, 17, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(954, 18, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(955, 19, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(956, 20, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(957, 21, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(958, 22, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(959, 23, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(960, 24, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(961, 25, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(962, 26, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(963, 27, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(964, 28, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(965, 29, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(966, 30, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(967, 31, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(968, 32, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(969, 33, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(970, 34, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(971, 35, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(972, 36, '2024-10-31', NULL, NULL, '2024-10-31 08:43:09', '2024-10-31 08:43:09'),
(973, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(974, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(975, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(976, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(977, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(978, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(979, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(980, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(981, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(982, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(983, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(984, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(985, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(986, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(987, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(988, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(989, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(990, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(991, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(992, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(993, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(994, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(995, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(996, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(997, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(998, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(999, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1000, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1001, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1002, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1003, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1004, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1005, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1006, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1007, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1008, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:19:52', '2024-10-31 09:19:52'),
(1009, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1010, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1011, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1012, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1013, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1014, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1015, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1016, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1017, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1018, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1019, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1020, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1021, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1022, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1023, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1024, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1025, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1026, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1027, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1028, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1029, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1030, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1031, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1032, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1033, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1034, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1035, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1036, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1037, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1038, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1039, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1040, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1041, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1042, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1043, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1044, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:24:58', '2024-10-31 09:24:58'),
(1045, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1046, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1047, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1048, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1049, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1050, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1051, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1052, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:30:01', '2024-10-31 09:30:01'),
(1053, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1054, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1055, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1056, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1057, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1058, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1059, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1060, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1061, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1062, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1063, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1064, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1065, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1066, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1067, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1068, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1069, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1070, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1071, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1072, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1073, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1074, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1075, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1076, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1077, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1078, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1079, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1080, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:30:02', '2024-10-31 09:30:02'),
(1081, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1082, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1083, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1084, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1085, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1086, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1087, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1088, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1089, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1090, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1091, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1092, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1093, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1094, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1095, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1096, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1097, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1098, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1099, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1100, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1101, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1102, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1103, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1104, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1105, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1106, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1107, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1108, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1109, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1110, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1111, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1112, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1113, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:35:05', '2024-10-31 09:35:05'),
(1114, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:35:06', '2024-10-31 09:35:06'),
(1115, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:35:06', '2024-10-31 09:35:06'),
(1116, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:35:06', '2024-10-31 09:35:06'),
(1117, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1118, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1119, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1120, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1121, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1122, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1123, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1124, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1125, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1126, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1127, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1128, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1129, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1130, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1131, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1132, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1133, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1134, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1135, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1136, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1137, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1138, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1139, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1140, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1141, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1142, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1143, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1144, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1145, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1146, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1147, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1148, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1149, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1150, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1151, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1152, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:40:10', '2024-10-31 09:40:10'),
(1153, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1154, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1155, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1156, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1157, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1158, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1159, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1160, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1161, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1162, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1163, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1164, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1165, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1166, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1167, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1168, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1169, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1170, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1171, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1172, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1173, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1174, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1175, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1176, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1177, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1178, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1179, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1180, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1181, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1182, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1183, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1184, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1185, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1186, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1187, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1188, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:45:14', '2024-10-31 09:45:14'),
(1189, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1190, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1191, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1192, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1193, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1194, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1195, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1196, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1197, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1198, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1199, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1200, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1201, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1202, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1203, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1204, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1205, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1206, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1207, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1208, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1209, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1210, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1211, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1212, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1213, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1214, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1215, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1216, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1217, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1218, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1219, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1220, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1221, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1222, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1223, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1224, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:50:17', '2024-10-31 09:50:17'),
(1225, 1, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1226, 2, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1227, 3, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1228, 4, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1229, 5, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1230, 6, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1231, 7, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1232, 8, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1233, 9, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20');
INSERT INTO `vessel_histories` (`id`, `vessel_id`, `onhire`, `offhire`, `total`, `created_at`, `updated_at`) VALUES
(1234, 10, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1235, 11, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1236, 12, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1237, 13, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1238, 14, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1239, 15, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1240, 16, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1241, 17, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1242, 18, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1243, 19, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1244, 20, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1245, 21, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1246, 22, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1247, 23, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1248, 24, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1249, 25, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1250, 26, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1251, 27, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1252, 28, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1253, 29, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1254, 30, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1255, 31, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1256, 32, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1257, 33, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1258, 34, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1259, 35, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1260, 36, '2024-10-31', NULL, NULL, '2024-10-31 09:55:20', '2024-10-31 09:55:20'),
(1261, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1262, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1263, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1264, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1265, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1266, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1267, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1268, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1269, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1270, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1271, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1272, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1273, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1274, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1275, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1276, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1277, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1278, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1279, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1280, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1281, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1282, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1283, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1284, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1285, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1286, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1287, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1288, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1289, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1290, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1291, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1292, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1293, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1294, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1295, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1296, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:00:24', '2024-10-31 10:00:24'),
(1297, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1298, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1299, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1300, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1301, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1302, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1303, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1304, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1305, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1306, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1307, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1308, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1309, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1310, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1311, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1312, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1313, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1314, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1315, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1316, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1317, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1318, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1319, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1320, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1321, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1322, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1323, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1324, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1325, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1326, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1327, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1328, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1329, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1330, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1331, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1332, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:05:28', '2024-10-31 10:05:28'),
(1333, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1334, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1335, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1336, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1337, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1338, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1339, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1340, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1341, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1342, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1343, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1344, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1345, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1346, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1347, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:10:31', '2024-10-31 10:10:31'),
(1348, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1349, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1350, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1351, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1352, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1353, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1354, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1355, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1356, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1357, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1358, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1359, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1360, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1361, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1362, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1363, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1364, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1365, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1366, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1367, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1368, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:10:32', '2024-10-31 10:10:32'),
(1369, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:15:34', '2024-10-31 10:15:34'),
(1370, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:15:34', '2024-10-31 10:15:34'),
(1371, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1372, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1373, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1374, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1375, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1376, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1377, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1378, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1379, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1380, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1381, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1382, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1383, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1384, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1385, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1386, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1387, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1388, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1389, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1390, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1391, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1392, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1393, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1394, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1395, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1396, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1397, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1398, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1399, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1400, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1401, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1402, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1403, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1404, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:15:35', '2024-10-31 10:15:35'),
(1405, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1406, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1407, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1408, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1409, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1410, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1411, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1412, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1413, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1414, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1415, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1416, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1417, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1418, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1419, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1420, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1421, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1422, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1423, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1424, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1425, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1426, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1427, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1428, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1429, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1430, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1431, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1432, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1433, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1434, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1435, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1436, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1437, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1438, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1439, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1440, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:20:39', '2024-10-31 10:20:39'),
(1441, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1442, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1443, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1444, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1445, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1446, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1447, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1448, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1449, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1450, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1451, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1452, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1453, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1454, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1455, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1456, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1457, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1458, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1459, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1460, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1461, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1462, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1463, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1464, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1465, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1466, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1467, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1468, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1469, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1470, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1471, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1472, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1473, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1474, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1475, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1476, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:25:42', '2024-10-31 10:25:42'),
(1477, 1, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1478, 2, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1479, 3, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1480, 4, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1481, 5, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1482, 6, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1483, 7, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1484, 8, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1485, 9, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1486, 10, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1487, 11, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1488, 12, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1489, 13, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1490, 14, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1491, 15, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1492, 16, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1493, 17, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1494, 18, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1495, 19, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1496, 20, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1497, 21, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1498, 22, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1499, 23, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1500, 24, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1501, 25, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1502, 26, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1503, 27, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1504, 28, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1505, 29, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1506, 30, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1507, 31, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1508, 32, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1509, 33, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1510, 34, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1511, 35, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1512, 36, '2024-10-31', NULL, NULL, '2024-10-31 10:30:47', '2024-10-31 10:30:47'),
(1513, 1, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1514, 2, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1515, 3, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1516, 4, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1517, 5, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1518, 6, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1519, 7, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1520, 8, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1521, 9, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1522, 10, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1523, 11, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1524, 12, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1525, 13, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1526, 14, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1527, 15, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1528, 16, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1529, 17, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1530, 18, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1531, 19, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1532, 20, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1533, 21, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1534, 22, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1535, 23, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1536, 24, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1537, 25, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1538, 26, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1539, 27, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1540, 28, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1541, 29, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1542, 30, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1543, 31, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1544, 32, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1545, 33, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1546, 34, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1547, 35, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1548, 36, '2024-11-04', NULL, NULL, '2024-11-04 01:39:40', '2024-11-04 01:39:40'),
(1549, 1, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1550, 2, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1551, 3, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1552, 4, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1553, 5, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1554, 6, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1555, 7, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1556, 8, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1557, 9, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1558, 10, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1559, 11, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1560, 12, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1561, 13, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1562, 14, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1563, 15, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1564, 16, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1565, 17, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1566, 18, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1567, 19, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1568, 20, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1569, 21, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1570, 22, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1571, 23, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1572, 24, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1573, 25, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1574, 26, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1575, 27, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1576, 28, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1577, 29, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1578, 30, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1579, 31, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1580, 32, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1581, 33, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1582, 34, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1583, 35, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1584, 36, '2024-11-04', NULL, NULL, '2024-11-04 01:39:51', '2024-11-04 01:39:51'),
(1585, 1, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1586, 2, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1587, 3, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1588, 4, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1589, 5, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1590, 6, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1591, 7, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1592, 8, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1593, 9, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1594, 10, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1595, 11, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1596, 12, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1597, 13, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1598, 14, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1599, 15, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1600, 16, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1601, 17, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1602, 18, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1603, 19, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1604, 20, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1605, 21, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1606, 22, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1607, 23, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1608, 24, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1609, 25, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1610, 26, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1611, 27, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1612, 28, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1613, 29, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1614, 30, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1615, 31, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1616, 32, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1617, 33, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1618, 34, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1619, 35, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1620, 36, '2024-11-05', NULL, NULL, '2024-11-05 01:42:37', '2024-11-05 01:42:37'),
(1621, 1, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1622, 2, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1623, 3, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1624, 4, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1625, 5, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1626, 6, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1627, 7, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1628, 8, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1629, 9, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1630, 10, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1631, 11, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1632, 12, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1633, 13, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1634, 14, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1635, 15, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1636, 16, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1637, 17, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1638, 18, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1639, 19, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1640, 20, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1641, 21, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1642, 22, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1643, 23, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1644, 24, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1645, 25, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1646, 26, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1647, 27, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1648, 28, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1649, 29, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1650, 30, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1651, 31, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1652, 32, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1653, 33, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1654, 34, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1655, 35, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1656, 36, '2024-11-05', NULL, NULL, '2024-11-05 02:07:44', '2024-11-05 02:07:44'),
(1657, 1, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1658, 2, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1659, 3, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1660, 4, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1661, 5, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1662, 6, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1663, 7, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1664, 8, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1665, 9, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1666, 10, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1667, 11, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1668, 12, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1669, 13, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1670, 14, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1671, 15, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1672, 16, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1673, 17, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1674, 18, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1675, 19, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1676, 20, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1677, 21, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1678, 22, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1679, 23, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1680, 24, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1681, 25, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1682, 26, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1683, 27, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1684, 28, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1685, 29, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1686, 30, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1687, 31, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1688, 32, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1689, 33, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1690, 34, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1691, 35, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1692, 36, '2024-11-06', NULL, NULL, '2024-11-06 02:49:54', '2024-11-06 02:49:54'),
(1693, 1, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1694, 2, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1695, 3, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1696, 4, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1697, 5, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1698, 6, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1699, 7, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1700, 8, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1701, 9, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1702, 10, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1703, 11, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1704, 12, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1705, 13, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1706, 14, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1707, 15, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1708, 16, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1709, 17, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1710, 18, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1711, 19, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1712, 20, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1713, 21, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1714, 22, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1715, 23, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1716, 24, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1717, 25, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1718, 26, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1719, 27, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1720, 28, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1721, 29, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1722, 30, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1723, 31, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1724, 32, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1725, 33, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1726, 34, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1727, 35, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1728, 36, '2024-12-19', NULL, NULL, '2024-12-19 01:55:10', '2024-12-19 01:55:10'),
(1729, 1, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1730, 2, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1731, 3, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1732, 4, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1733, 5, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1734, 6, '2024-12-19', NULL, NULL, '2024-12-19 01:56:12', '2024-12-19 01:56:12'),
(1735, 7, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1736, 8, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1737, 9, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1738, 10, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1739, 11, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1740, 12, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1741, 13, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1742, 14, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1743, 15, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1744, 16, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1745, 17, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1746, 18, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1747, 19, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1748, 20, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1749, 21, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1750, 22, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1751, 23, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1752, 24, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1753, 25, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1754, 26, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1755, 27, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1756, 28, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1757, 29, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1758, 30, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1759, 31, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1760, 32, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1761, 33, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1762, 34, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1763, 35, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1764, 36, '2024-12-19', NULL, NULL, '2024-12-19 01:56:13', '2024-12-19 01:56:13'),
(1765, 1, '2024-12-22', NULL, NULL, '2024-12-22 01:07:30', '2024-12-22 01:07:30'),
(1766, 2, '2024-12-22', NULL, NULL, '2024-12-22 01:07:30', '2024-12-22 01:07:30'),
(1767, 3, '2024-12-22', NULL, NULL, '2024-12-22 01:07:30', '2024-12-22 01:07:30'),
(1768, 4, '2024-12-22', NULL, NULL, '2024-12-22 01:07:30', '2024-12-22 01:07:30'),
(1769, 5, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1770, 6, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1771, 7, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1772, 8, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1773, 9, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1774, 10, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1775, 11, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1776, 12, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1777, 13, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1778, 14, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1779, 15, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1780, 16, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1781, 17, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1782, 18, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1783, 19, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1784, 20, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1785, 21, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1786, 22, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1787, 23, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1788, 24, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1789, 25, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1790, 26, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1791, 27, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1792, 28, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1793, 29, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1794, 30, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1795, 31, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1796, 32, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1797, 33, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1798, 34, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1799, 35, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1800, 36, '2024-12-22', NULL, NULL, '2024-12-22 01:07:31', '2024-12-22 01:07:31'),
(1801, 1, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1802, 2, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1803, 3, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1804, 4, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1805, 5, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1806, 6, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1807, 7, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1808, 8, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1809, 9, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1810, 10, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1811, 11, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1812, 12, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1813, 13, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1814, 14, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1815, 15, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1816, 16, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1817, 17, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1818, 18, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1819, 19, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1820, 20, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1821, 21, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1822, 22, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1823, 23, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1824, 24, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1825, 25, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1826, 26, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1827, 27, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1828, 28, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1829, 29, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1830, 30, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1831, 31, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1832, 32, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1833, 33, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1834, 34, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1835, 35, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1836, 36, '2024-12-22', NULL, NULL, '2024-12-22 01:07:35', '2024-12-22 01:07:35'),
(1837, 1, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1838, 2, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1839, 3, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1840, 4, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1841, 5, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1842, 6, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1843, 7, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16');
INSERT INTO `vessel_histories` (`id`, `vessel_id`, `onhire`, `offhire`, `total`, `created_at`, `updated_at`) VALUES
(1844, 8, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1845, 9, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1846, 10, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1847, 11, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1848, 12, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1849, 13, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1850, 14, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1851, 15, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1852, 16, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1853, 17, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1854, 18, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1855, 19, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1856, 20, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1857, 21, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1858, 22, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1859, 23, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1860, 24, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1861, 25, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1862, 26, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1863, 27, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1864, 28, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1865, 29, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1866, 30, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1867, 31, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1868, 32, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1869, 33, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1870, 34, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1871, 35, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16'),
(1872, 36, '2024-12-23', NULL, NULL, '2024-12-23 02:00:16', '2024-12-23 02:00:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vessel_statuses`
--

CREATE TABLE `vessel_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `water_items`
--

CREATE TABLE `water_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_final` int(11) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wos`
--

CREATE TABLE `wos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `party_id` smallint(6) NOT NULL,
  `schedule_id` smallint(6) NOT NULL,
  `payloadtype_id` tinyint(4) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `status` varchar(3) NOT NULL DEFAULT '0',
  `departure` datetime DEFAULT NULL,
  `release_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `wos`
--

INSERT INTO `wos` (`id`, `party_id`, `schedule_id`, `payloadtype_id`, `activity`, `status`, `departure`, `release_at`, `created_at`, `updated_at`) VALUES
(1, 4, 6, 1, NULL, '0', NULL, NULL, '2024-06-10 04:07:51', '2024-06-10 04:07:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barge_items`
--
ALTER TABLE `barge_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cargo_items`
--
ALTER TABLE `cargo_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carriers`
--
ALTER TABLE `carriers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `crews`
--
ALTER TABLE `crews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deflections`
--
ALTER TABLE `deflections`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deviations`
--
ALTER TABLE `deviations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `deviation_reports`
--
ALTER TABLE `deviation_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fuel_items`
--
ALTER TABLE `fuel_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jetties`
--
ALTER TABLE `jetties`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logistics`
--
ALTER TABLE `logistics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `material_men`
--
ALTER TABLE `material_men`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `offloadings`
--
ALTER TABLE `offloadings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parent_requests`
--
ALTER TABLE `parent_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `passenger_items`
--
ALTER TABLE `passenger_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `payload_types`
--
ALTER TABLE `payload_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `platforms`
--
ALTER TABLE `platforms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ports`
--
ALTER TABLE `ports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `postpones`
--
ALTER TABLE `postpones`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_requests`
--
ALTER TABLE `report_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_surveillances`
--
ALTER TABLE `report_surveillances`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `report_vessels`
--
ALTER TABLE `report_vessels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_histories`
--
ALTER TABLE `request_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `request_rejects`
--
ALTER TABLE `request_rejects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `route_types`
--
ALTER TABLE `route_types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule_documents`
--
ALTER TABLE `schedule_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule_routes`
--
ALTER TABLE `schedule_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `schedule_vessels`
--
ALTER TABLE `schedule_vessels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surveillances`
--
ALTER TABLE `surveillances`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surveillance_cargos`
--
ALTER TABLE `surveillance_cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surveillance_crews`
--
ALTER TABLE `surveillance_crews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vdrs`
--
ALTER TABLE `vdrs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_activities`
--
ALTER TABLE `vdr_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_cargos`
--
ALTER TABLE `vdr_cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_cargo_headings`
--
ALTER TABLE `vdr_cargo_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_crews`
--
ALTER TABLE `vdr_crews`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_engines`
--
ALTER TABLE `vdr_engines`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_engine_headings`
--
ALTER TABLE `vdr_engine_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_headers`
--
ALTER TABLE `vdr_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_hses`
--
ALTER TABLE `vdr_hses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_hse_headers`
--
ALTER TABLE `vdr_hse_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_operatings`
--
ALTER TABLE `vdr_operatings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_operating_headers`
--
ALTER TABLE `vdr_operating_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_passengers`
--
ALTER TABLE `vdr_passengers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_periodics`
--
ALTER TABLE `vdr_periodics`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_timestamps`
--
ALTER TABLE `vdr_timestamps`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_weathers`
--
ALTER TABLE `vdr_weathers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vdr_weather_headings`
--
ALTER TABLE `vdr_weather_headings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vessels`
--
ALTER TABLE `vessels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vessel_histories`
--
ALTER TABLE `vessel_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `vessel_statuses`
--
ALTER TABLE `vessel_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `water_items`
--
ALTER TABLE `water_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `wos`
--
ALTER TABLE `wos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barge_items`
--
ALTER TABLE `barge_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `cargo_items`
--
ALTER TABLE `cargo_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `carriers`
--
ALTER TABLE `carriers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `crews`
--
ALTER TABLE `crews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `deflections`
--
ALTER TABLE `deflections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `deviations`
--
ALTER TABLE `deviations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `deviation_reports`
--
ALTER TABLE `deviation_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fuel_items`
--
ALTER TABLE `fuel_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jetties`
--
ALTER TABLE `jetties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `logistics`
--
ALTER TABLE `logistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `material_men`
--
ALTER TABLE `material_men`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `offloadings`
--
ALTER TABLE `offloadings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `parent_requests`
--
ALTER TABLE `parent_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `passenger_items`
--
ALTER TABLE `passenger_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `payload_types`
--
ALTER TABLE `payload_types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `platforms`
--
ALTER TABLE `platforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ports`
--
ALTER TABLE `ports`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `postpones`
--
ALTER TABLE `postpones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `report_requests`
--
ALTER TABLE `report_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `report_surveillances`
--
ALTER TABLE `report_surveillances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `report_vessels`
--
ALTER TABLE `report_vessels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `requests`
--
ALTER TABLE `requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `request_histories`
--
ALTER TABLE `request_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `request_rejects`
--
ALTER TABLE `request_rejects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `revisions`
--
ALTER TABLE `revisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `route_types`
--
ALTER TABLE `route_types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `schedule_documents`
--
ALTER TABLE `schedule_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `schedule_routes`
--
ALTER TABLE `schedule_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `schedule_vessels`
--
ALTER TABLE `schedule_vessels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `surveillances`
--
ALTER TABLE `surveillances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surveillance_cargos`
--
ALTER TABLE `surveillance_cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `surveillance_crews`
--
ALTER TABLE `surveillance_crews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT untuk tabel `vdrs`
--
ALTER TABLE `vdrs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `vdr_activities`
--
ALTER TABLE `vdr_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `vdr_cargos`
--
ALTER TABLE `vdr_cargos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `vdr_cargo_headings`
--
ALTER TABLE `vdr_cargo_headings`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `vdr_crews`
--
ALTER TABLE `vdr_crews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vdr_engines`
--
ALTER TABLE `vdr_engines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `vdr_engine_headings`
--
ALTER TABLE `vdr_engine_headings`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `vdr_headers`
--
ALTER TABLE `vdr_headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vdr_hses`
--
ALTER TABLE `vdr_hses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `vdr_hse_headers`
--
ALTER TABLE `vdr_hse_headers`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `vdr_operatings`
--
ALTER TABLE `vdr_operatings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `vdr_operating_headers`
--
ALTER TABLE `vdr_operating_headers`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `vdr_passengers`
--
ALTER TABLE `vdr_passengers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vdr_periodics`
--
ALTER TABLE `vdr_periodics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `vdr_timestamps`
--
ALTER TABLE `vdr_timestamps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `vdr_weathers`
--
ALTER TABLE `vdr_weathers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `vdr_weather_headings`
--
ALTER TABLE `vdr_weather_headings`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vessels`
--
ALTER TABLE `vessels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `vessel_histories`
--
ALTER TABLE `vessel_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1873;

--
-- AUTO_INCREMENT untuk tabel `vessel_statuses`
--
ALTER TABLE `vessel_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `water_items`
--
ALTER TABLE `water_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `wos`
--
ALTER TABLE `wos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
