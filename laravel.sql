-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2025 at 09:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_fasilitas`
--

CREATE TABLE `destinasi_fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `id_destinasi` bigint UNSIGNED NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasi_fasilitas`
--

INSERT INTO `destinasi_fasilitas` (`id`, `id_destinasi`, `fasilitas`, `created_at`, `updated_at`) VALUES
(5, 3, 'Sewa Kano', NULL, NULL),
(6, 3, 'Pijat Refleksi', NULL, NULL),
(7, 3, 'Area Makanan dan Minuman', NULL, NULL),
(8, 4, 'Trekking', NULL, NULL),
(9, 4, 'Kamar Mandi Umum', NULL, NULL),
(10, 5, 'Toko Oleh-Oleh', NULL, NULL),
(11, 5, 'Penginapan', NULL, NULL),
(12, 5, 'Restoran', NULL, NULL),
(13, 5, 'Penyewaan Kuda/Sepeda', NULL, NULL),
(14, 5, 'Penyewaan mobil Volkswagen', NULL, NULL),
(15, 6, 'Area Parkir', NULL, NULL),
(16, 6, 'Toilet', NULL, NULL),
(17, 6, 'Tempat Penitipan Barang', NULL, NULL),
(18, 6, 'Toko Souvernir', NULL, NULL),
(19, 7, 'Snorkling', NULL, NULL),
(20, 7, 'Memancing', NULL, NULL),
(21, 7, 'Operator Tur Lumba-Lumba', NULL, NULL),
(22, 7, 'Menyewa Perahu', NULL, NULL),
(23, 7, 'Hotel', NULL, NULL),
(24, 7, 'Restoran', NULL, NULL),
(25, 8, 'Food Court', NULL, NULL),
(26, 8, 'Area Bermain Anak-Anak', NULL, NULL),
(27, 8, 'Toilet', NULL, NULL),
(28, 8, 'Mushola', NULL, NULL),
(29, 9, 'Area Bermain Anak-Anak', NULL, NULL),
(30, 9, 'Area Peternakan', NULL, NULL),
(31, 9, 'Restoran/Cafe', NULL, NULL),
(32, 9, 'Taman', NULL, NULL),
(33, 9, 'Toilet', NULL, NULL),
(34, 9, 'Parkir', NULL, NULL),
(35, 10, 'Makan di Tempat', NULL, NULL),
(36, 10, 'Bawa Pulang', NULL, NULL),
(37, 11, 'Request Bentuk Patung dan Ukiran', NULL, NULL),
(38, 12, 'Thai Massage', NULL, NULL),
(39, 12, 'Aromatherapy', NULL, NULL),
(40, 12, 'Massage Kretek', NULL, NULL),
(41, 12, 'Medical Therapy', NULL, NULL),
(42, 12, 'Full Back Massage', NULL, NULL),
(43, 13, 'Rafting', NULL, NULL),
(44, 13, 'ATV', NULL, NULL),
(45, 14, 'Kolam Berenang', NULL, NULL),
(46, 14, 'Private Pool', NULL, NULL),
(47, 14, 'Restoran', NULL, NULL),
(48, 14, 'Bar', NULL, NULL),
(49, 1, 'Outbound', NULL, NULL),
(50, 1, 'Golf car', NULL, NULL),
(51, 1, 'Camping', NULL, NULL),
(54, 16, 'Trekking', NULL, NULL),
(55, 2, 'Surfing', NULL, NULL),
(56, 2, 'Payung Pantai', NULL, NULL),
(58, 17, 'Food Court', NULL, NULL),
(59, 17, 'Kids Club', NULL, NULL),
(60, 17, 'Mall', NULL, NULL),
(61, 18, 'Restoran', NULL, NULL),
(62, 18, 'Gerai Survenir', NULL, NULL),
(63, 19, 'Live Music', NULL, NULL),
(64, 19, 'Restoran', NULL, NULL),
(65, 19, 'Salon Kecantikan', NULL, NULL),
(66, 19, 'Book Store', NULL, NULL),
(67, 20, 'Food Court', NULL, NULL),
(68, 20, 'Mall', NULL, NULL),
(69, 21, 'Wahana Permainan', NULL, NULL),
(70, 21, 'Food Court', NULL, NULL),
(71, 21, 'Tempat Hiburan', NULL, NULL),
(72, 22, 'Outlet Pakaian', NULL, NULL),
(73, 22, 'Restoran', NULL, NULL),
(74, 23, 'Seni Wayang', NULL, NULL),
(75, 23, 'Seni Patung', NULL, NULL),
(76, 24, 'Tempat Ibadah', NULL, NULL),
(77, 25, 'Tempat Ibadah', NULL, NULL),
(78, 26, 'Tempat Ibadah', NULL, NULL),
(79, 27, 'Tempat Ibadah', NULL, NULL),
(80, 28, 'Tempat Ibadah', NULL, NULL),
(81, 29, 'Wahana dan Pertunjukan', NULL, NULL),
(82, 29, 'Area Bermain', NULL, NULL),
(83, 29, 'Water Play Zome', NULL, NULL),
(84, 29, 'Restoran', NULL, NULL),
(85, 29, 'Paket Hiburan', NULL, NULL),
(86, 30, 'Museum', NULL, NULL),
(87, 30, 'Tempat Administrasi', NULL, NULL),
(88, 30, 'Perpustakaan', NULL, NULL),
(89, 31, 'Ruang Pameran', NULL, NULL),
(90, 31, 'Kafetaria', NULL, NULL),
(91, 31, 'Diorama Kereta Api', NULL, NULL),
(92, 31, 'Perpustakaan', NULL, NULL),
(93, 31, 'Restoran', NULL, NULL),
(94, 31, 'Museum', NULL, NULL),
(95, 32, 'Penangkaran Penyu', NULL, NULL),
(96, 33, 'Trekking (jalur pendek & panjang)', NULL, NULL),
(97, 33, 'Lahan tanam untuk pengunjung', NULL, NULL),
(98, 33, 'Kebun Organik', NULL, NULL),
(99, 33, 'Memberi Makan Binatan', NULL, NULL),
(100, 34, 'Snorkling', NULL, NULL),
(101, 34, 'Diving', NULL, NULL),
(102, 34, 'Trekking', NULL, NULL),
(103, 34, 'Wisata Religi', NULL, NULL),
(104, 34, 'Wisata Edukasi', NULL, NULL),
(105, 34, 'Kemah', NULL, NULL),
(106, 35, 'Restoran', NULL, NULL),
(107, 36, 'Restoran', NULL, NULL),
(108, 37, 'Restoran', NULL, NULL),
(109, 38, 'Restoran', NULL, NULL),
(110, 39, 'Restoran', NULL, NULL),
(111, 40, 'Trekking', NULL, NULL),
(112, 40, 'Camping', NULL, NULL),
(113, 40, 'Cycling', NULL, NULL),
(114, 40, 'Water Rafting', NULL, NULL),
(115, 40, 'ATV Ride', NULL, NULL),
(116, 41, 'Penginapan', NULL, NULL),
(117, 41, 'Restoran', NULL, NULL),
(118, 42, 'Taru Menyan', NULL, NULL),
(119, 42, 'Sema Wayah', NULL, NULL),
(120, 42, 'Sema Muda', NULL, NULL),
(121, 42, 'Sema Bantas', NULL, NULL),
(122, 43, 'Konservasi Penyu', NULL, NULL),
(123, 43, 'Restoran', NULL, NULL),
(124, 44, 'Pantai', NULL, NULL),
(125, 45, 'Pasar Seni Klungkung', NULL, NULL),
(126, 46, 'Pasar Seni Klungkung', NULL, NULL),
(129, 48, 'Toko Kerajinan', NULL, NULL),
(130, 49, 'Rumah Pohon', NULL, NULL),
(131, 49, 'Restoran', NULL, NULL),
(132, 50, 'Restoran', NULL, NULL),
(133, 51, 'Glamping', NULL, NULL),
(134, 47, 'Restoran', NULL, NULL),
(135, 47, 'Penginapan', NULL, NULL),
(137, 52, 'toilet umum gratis', NULL, NULL),
(138, 15, 'Sunbath', NULL, NULL),
(141, 55, 'Watersport', NULL, NULL),
(142, 55, 'Warung dan Restoran', NULL, NULL),
(143, 55, 'Kamar Mandi dan Ruang Bilas', NULL, NULL),
(144, 55, 'Spot Foto', NULL, NULL),
(145, 55, 'Sewa Sepeda', NULL, NULL),
(146, 55, 'Trek Jogging', NULL, NULL),
(147, 55, 'Gazebo', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_medsos`
--

CREATE TABLE `destinasi_medsos` (
  `id` bigint UNSIGNED NOT NULL,
  `id_destinasi` bigint UNSIGNED NOT NULL,
  `website_medsos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasi_medsos`
--

INSERT INTO `destinasi_medsos` (`id`, `id_destinasi`, `website_medsos`, `created_at`, `updated_at`) VALUES
(4, 3, 'http://pandawabalibeach.com/', NULL, NULL),
(5, 4, 'http://sites.google.com/view/hiddenwaterfal', NULL, NULL),
(6, 5, 'http://jatiluwih.id/', NULL, NULL),
(7, 6, 'https://tirtaempulceremony.com/', NULL, NULL),
(8, 7, 'https://lovinabeachclubandresort.com/', NULL, NULL),
(9, 8, 'https://thekeranjangbali.com/', NULL, NULL),
(10, 9, 'https://www.balifarmhouse.com/', NULL, NULL),
(11, 10, 'instagram.com/babibalah', NULL, NULL),
(12, 11, 'instagram.com/bali_carving', NULL, NULL),
(13, 12, 'instagram.com/megumibali', NULL, NULL),
(14, 13, 'http://ubudraftingadventure.com/', NULL, NULL),
(15, 14, 'https://atlasbeachfest.com/', NULL, NULL),
(16, 1, 'https://kebunraya.id/bali', NULL, NULL),
(17, 1, 'https://www.instagram.com/kebunraya_bali', NULL, NULL),
(20, 16, 'https://www.alltrails.com/trail/indonesia/bali--3/mount-agung', NULL, NULL),
(21, 2, 'http://kutabeachbalii.com/', NULL, NULL),
(23, 17, 'http://beachwalkbali.com/', NULL, NULL),
(24, 18, 'http://bali-collection.com/', NULL, NULL),
(25, 19, 'https://www.discoverymallbali.com/', NULL, NULL),
(26, 20, 'instagram.com/livingworld_denpasar', NULL, NULL),
(27, 21, 'instagram.com/mallbaligaleria', NULL, NULL),
(28, 22, 'https://lippomalls.com/our-mall/lippo-mall-kuta/detail', NULL, NULL),
(29, 23, 'https://linktr.ee/Wayanshopubud', NULL, NULL),
(30, 25, 'https://gkpbbukitdoa.or.id/', NULL, NULL),
(31, 25, 'https://www.instagram.com/gkpbjemaatbukitdoa', NULL, NULL),
(32, 26, 'https://ulundanuberatan.com/', NULL, NULL),
(33, 29, 'https://balisafarimarinepark.com/', NULL, NULL),
(34, 31, 'https://www.taman-nusa.com/', NULL, NULL),
(35, 33, 'https://tebamajalangu.com/', NULL, NULL),
(36, 34, 'https://www.btnbalibarat.com/', NULL, NULL),
(37, 36, 'http://www.bebekbengil.co.id/', NULL, NULL),
(38, 39, 'http://naughtynurisseminyak.com/', NULL, NULL),
(39, 41, 'http://www.penglipuranvillage.com/', NULL, NULL),
(40, 42, 'http://www.adpadabali.co.id/', NULL, NULL),
(41, 43, 'http://kurma-asih.weebly.com/', NULL, NULL),
(42, 44, 'https://tempatwisatadibali.info/pantai-baluk-rening-jembrana-bali/', NULL, NULL),
(44, 50, 'https://linktr.ee/sastourorganizer?utm_source=linktree_admin_share', NULL, NULL),
(45, 51, 'instagram.com/bukitasahbali', NULL, NULL),
(46, 47, 'https://www.facebook.com/brokenbeachnusapenida1/', NULL, NULL),
(47, 15, 'http://www.badungtourism.com/', NULL, NULL),
(50, 55, 'instagram.com/mertasaribeach', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `destinasi_wisata`
--

CREATE TABLE `destinasi_wisata` (
  `id_destinasi` bigint UNSIGNED NOT NULL,
  `nama_destinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabupaten_kota` enum('Badung','Bangli','Buleleng','Denpasar','Gianyar','Jembrana','Karangasem','Klungkung','Tabanan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_tiket` int NOT NULL,
  `rating_destinasi` double DEFAULT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_destinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_maps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_wisata` enum('Alam','Belanja','Budaya & Rohani','Keluarga & Edukasi','Kuliner','Malam & Hiburan','Seni & Kerajinan','Petualangan','Relaksasi & Kesehatan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destinasi_wisata`
--

INSERT INTO `destinasi_wisata` (`id_destinasi`, `nama_destinasi`, `kabupaten_kota`, `harga_tiket`, `rating_destinasi`, `contact_person`, `foto_destinasi`, `alamat_lengkap`, `link_maps`, `jenis_wisata`, `reservasi`, `jam_buka`, `jam_tutup`, `created_at`, `updated_at`) VALUES
(1, 'Kebun Raya Bedugul', 'Tabanan', 10000, 3.7, '(0368) 2033211', 'destinasi/JqX0YjYNkasgeu923Ej9OOuPsHg0vp0Jyk3Yb07X.jpg', 'Jl. Kebun Raya, Candikuning, Kec. Baturiti, Kabupaten Tabanan, Bali 82191', 'https://maps.app.goo.gl/i4WBQTfh4qYWeTqBA', 'Alam', '(0368) 2033211', '08:00:00', '16:00:00', NULL, NULL),
(2, 'Pantai Kuta', 'Badung', 2000, 4.5, '-', 'destinasi/e9AKboKDskSs8tIwAKqEPPlsNJuiK4g5d5eOUGSj.jpg', 'Kuta, Badung Regency, Bali', 'https://maps.app.goo.gl/CDYqKF7jDWd83RKS7', 'Alam', '-', '04:00:00', '22:00:00', NULL, NULL),
(3, 'Pantai Pandawa', 'Badung', 15000, 4.6, '08113834388', 'destinasi/GGz6Q17QiprrMAhjZISmVmekwysTBJynSLjMjJDx.jpg', 'Jl. Pantai Pandawa, Kutuh, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/QHp4B9pLsQvyZTRY7', 'Alam', '628113834388', '05:00:00', '19:00:00', NULL, NULL),
(4, 'Air Terjun Sekumpul', 'Buleleng', 10000, 3.9, '-', 'destinasi/O7DtSHuxboj4n7eJrIFJkyTJ3D4Bd1w3urfUIa51.jpg', 'Sekumpul, Sawan, Buleleng Regency, Bali 81171', 'https://maps.app.goo.gl/MZ92rXr6CVCzVsa39', 'Alam', '-', '08:00:00', '23:00:00', NULL, NULL),
(5, 'Terasering Jatiluwih', 'Tabanan', 50000, 4.5, '085692381416', 'destinasi/Lcjfq6TbyG2qIHh3MNOxv9CZvoMHjNSdWHZ5DMue.jpg', 'Jl. Jatiluwih Kawan, Jatiluwih, Kec. Penebel, Kabupaten Tabanan, Bali 82152', 'https://maps.app.goo.gl/8WsYheasPGei7e6z6', 'Alam', '6285692381416', '08:00:00', '18:00:00', NULL, NULL),
(6, 'Tirta Empul', 'Gianyar', 30000, 5, '0812301023', 'destinasi/0vvx0EuFiyDilwwuu2ZqHfqpe4VMl7zF9duQNaVC.jpg', 'Jalan Raya Tegallalang No.5758, Tegallalang, Kec. Tegallalang, Kabupaten Gianyar, Bali 80561', 'https://maps.app.goo.gl/ZwLfZsbxKtNMGrzRA', 'Budaya & Rohani', '62812301023', '07:00:00', '17:00:00', NULL, NULL),
(7, 'Pantai Lovina', 'Buleleng', 10000, 4.4, '-', 'destinasi/MF2ttYkpadYftP1fRJHVw3LJT3EilDYracsZMa8C.jpg', 'Jl. Pura Subak Banyualit, Anturan, Kec. Buleleng, Kabupaten Buleleng, Bali 81119, Indonesia', 'https://maps.app.goo.gl/6n2miLpuk4X49iu67', 'Alam', '-', '00:00:00', '23:59:00', NULL, NULL),
(8, 'The Keranjang Bali', 'Badung', 20000, 4.8, '03614755575', 'destinasi/LKgTOkWuQS9fIG33zrumiRiQHYVIGIUZ9M9ayaPd.jpg', 'Jl. Bypass Ngurah Rai No.97, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/akJQHnmhLao5wZ636', 'Belanja', '-', '09:00:00', '21:00:00', NULL, NULL),
(9, 'Bali Farm House', 'Buleleng', 100000, 4.3, '03682021200', 'destinasi/zmlFo0AslExRFLRDyvG1I2KI9UXlHrjQls1FcIpY.jpg', 'Jl. Raya Singaraja-Denpasar, Pancasari, Kec. Sukasada, Kabupaten Buleleng, Bali 81161', 'https://maps.app.goo.gl/3ZDLTZ67J7BCW3Ek8', 'Keluarga & Edukasi', '03682021200', '09:00:00', '16:15:00', NULL, NULL),
(10, 'Depot Babi Balah', 'Denpasar', 25000, 4.4, '081338640320', 'destinasi/gJ922bP0q2fgLNRipcPSfBVZMwa372syyDyugqgN.jpg', 'Jl. Imam Bonjol No.339, Pemecutan Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80119', 'https://maps.app.goo.gl/G7suiSxPuQvKqPFD9', 'Kuliner', '6281338640320', '10:00:00', '23:00:00', NULL, NULL),
(11, 'Bali Dewata Carving (Patung & Ukiran)', 'Gianyar', 100000, 4.8, '6282236372372', 'destinasi/7aHRhqglXapAAoHhRrqyrXboylJKCToxpGXYMJt7.jpg', 'Jl. Raya Singapadu, Singapadu Kaler, Kec. Sukawati, Kabupaten Gianyar, Bali 80571', 'https://maps.app.goo.gl/PzFFtQ1DhNCj1cvq7', 'Seni & Kerajinan', '6282236372372', '08:00:00', '20:00:00', NULL, NULL),
(12, 'Megumi Health Center', 'Denpasar', 125000, 4.5, '081399109899', 'destinasi/6pK0xlrncn42OuqpAa6aWfSFk7jMsQXG9lgqUyxI.jpg', 'Jl. Raya Sesetan No.250, Sesetan, Denpasar Selatan, Kota Denpasar, Bali 80225', 'https://maps.app.goo.gl/PPQyYUau1bfiVTYF7', 'Relaksasi & Kesehatan', '6281399109899', '09:00:00', '21:00:00', NULL, NULL),
(13, 'Ubud Bali White Water Rafting', 'Gianyar', 240000, 4.9, '0361224671', 'destinasi/LrWxDv6s1D0G9xz1SoqNrwkJ83US2kNgfICGhJXI.jpg', 'Gg. Tapan No.1, Singakerta, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571', 'https://maps.app.goo.gl/yZA2XHapaLVUS6W79', 'Petualangan', '0361224671', '09:00:00', '17:00:00', NULL, NULL),
(14, 'Atlas Beach Club', 'Badung', 150000, 4.7, '03613007222', 'destinasi/MlP1ucE2pfMN62KcYbYD803bZ2HeFbnfCBXNH5pO.jpg', 'Jl. Pantai Berawa No.88, Tibubeneng, Kec. Kuta Utara, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/4AsMMaVyyCM94QUT9', 'Malam & Hiburan', '03613007222', '10:00:00', '00:00:00', NULL, NULL),
(15, 'Pantai Petitenget', 'Badung', 5000, 4.5, '03619009270', 'destinasi/uSxvJCtgDa3EyotzZGujVghdNSNjhPBmLB03DumB.jpg', 'Seminyak, Kuta, Badung Regency, Bali', 'https://maps.app.goo.gl/YGnbw8qeQJVRRgPE7', 'Alam', '03619009270', '05:00:00', '20:00:00', NULL, NULL),
(16, 'Gunung Agung', 'Karangasem', 25000, 4.5, 'Bli Gus', 'destinasi/E7oNAOGn9OavEqtuxiy7Dk5KCpQR2kXLaAsv5W5i.jpg', 'Karangasem, Bali', 'https://www.alltrails.com/trail/indonesia/bali--3/mount-agung', 'Alam', '628712345678', '00:00:00', '23:59:00', NULL, NULL),
(17, 'Beachwalk Shopping Center', 'Badung', 5000, 4.5, '03618464888', 'destinasi/HLzhelUfOeiW23pamurFivzYZIj2J8lmk14xvNpB.jpg', 'Jl. Pantai Kuta, Kuta, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/DgXmPWqdC5A9Rhv59', 'Belanja', '03618464888', '10:00:00', '22:00:00', NULL, NULL),
(18, 'Bali Collection', 'Badung', 5000, 4.2, '0361771662', 'destinasi/5SYG376atCN5KX8rbzvZYsbRREt4vZcgxqChKids.jpg', '56XJ+22F, Jl. Kw. Nusa Dua Resort, Benoa, Kec. Kuta Sel., Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/ZiaDTHqtE5n9BoX36', 'Belanja', '0361771662', '10:00:00', '22:00:00', NULL, NULL),
(19, 'Discovery Mall Bali', 'Badung', 5000, 4.3, '0361755522', 'destinasi/hgoujIANFkl2bp1nkmtQzHSAB3LoZhZbbD3H17jC.jpg', 'Jl. Kartika Plaza, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/wQ6aiCHTBuvEH4Eg8', 'Belanja', '0361755522', '10:00:00', '22:00:00', NULL, NULL),
(20, 'Living World Denpasar', 'Denpasar', 2000, 4.5, '082113114100', 'destinasi/wTGddOitrq7kvR2rqxL5gBFfGHQTKI48iJgzE7tc.jpg', 'Jl. Gatot Subroto Tim., Tonja, Kec. Denpasar Utara, Kota Denpasar, Bali 80235', 'https://maps.app.goo.gl/RzApYYFRtCQo52Dw9', 'Belanja', '6282113114100', '10:00:00', '22:00:00', NULL, NULL),
(21, 'Mall Bali Galeria', 'Badung', 2000, 4.5, '0822 6658 2918', 'destinasi/Vbu0P9SYJgBCvOKR7WZPafqgzfE68m97OpnlZTgI.jpg', 'Jl. Bypass Ngurah Rai, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/YsxBwqZxgF3i7vhF9', 'Belanja', '6282266582918', '09:00:00', '22:00:00', NULL, NULL),
(22, 'Lippo Mall Kuta', 'Badung', 2000, 4.3, '03618978001', 'destinasi/msvXprBPEH7fk4UwcrNlRRvEKn0IEg1suuIVz0FZ.jpg', '7578+XRG, Jl. Kartika Plaza, Lingkungan Segara, Kec. Kuta, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/MNs15qSwxgGLgDT66', 'Belanja', '03618978001', '10:00:00', '22:00:00', NULL, NULL),
(23, 'Wayan\'s Shop', 'Gianyar', 2000, 5, '08123623160', 'destinasi/LWxDPAXNhvDaRiHqdCHsNsz1g4FYrySPucpTYedB.jpg', 'Jl. Raya Campuhan, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571', 'https://maps.app.goo.gl/UCzjp2k1A2QyiPqA9', 'Belanja', '628123623160', '09:00:00', '19:00:00', NULL, NULL),
(24, 'Masjid Besar Al Hidayah', 'Tabanan', 0, 4.8, '083117775673', 'destinasi/Hen7F6zjYonLw6VdMO2TuXMqDTmAHE4QqGWlLDGl.jpg', 'Bedugul, Candikuning, Baturiti, Tabanan Regency, Bali 82191', 'https://maps.app.goo.gl/783C8Xpwiay1nVCQ7', 'Budaya & Rohani', '6283117775673', '00:00:00', '23:59:00', NULL, NULL),
(25, 'GKPB Jemaat \"Bukti Doa\", Nusa Dua', 'Badung', 0, 4.8, '0361776807', 'destinasi/nbKXo1HcPZUMxSaL2fWO28ajvd0tsa4wiIelmPpE.jpg', 'Kompleks Puja Mandala Dusun Nusa Dua, Jalan Kuruksetra, Benoa, Kuta Selatan, Benoa, Badung, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/NcrA9kANPrucP6YZ6', 'Budaya & Rohani', '0361776807', '08:30:00', '16:30:00', NULL, NULL),
(26, 'Pura Ulun Danu Beratan', 'Tabanan', 40000, 4.6, '082146129292', 'destinasi/eMm1gTdOcwtoiifcPcQNy16QyNOOmr86EOCG7N7Z.jpg', 'Danau Beratan, Candikuning, Baturiti, Tabanan Regency, Bali 82191', 'https://maps.app.goo.gl/K3no328QBfeZeCtm9', 'Budaya & Rohani', '6282146129292', '07:00:00', '19:00:00', NULL, NULL),
(27, 'Brahmavihara-Arama', 'Buleleng', 0, 4.8, '036292954', 'destinasi/lMjULryx3SIQ7SY5rseZyJfbRvzHpSn0Uu0LtimA.jpg', 'Banjar Dinas Tangeb, Banjar Tegeha, Kec. Banjar, Kabupaten Buleleng, Bali 81152', 'https://maps.app.goo.gl/AKHExYxz9TbmhVP37', 'Budaya & Rohani', '036292954', '08:00:00', '18:00:00', NULL, NULL),
(28, 'Brahmavihara-Arama', 'Buleleng', 0, 4.8, '036292954', 'destinasi/vfYwyqGslwyzkgRLojwfqPefOTPMyPcDesOACnee.jpg', 'Banjar Dinas Tangeb, Banjar Tegeha, Kec. Banjar, Kabupaten Buleleng, Bali 81152', 'https://maps.app.goo.gl/AKHExYxz9TbmhVP37', 'Budaya & Rohani', '036292954', '08:00:00', '18:00:00', NULL, NULL),
(29, 'Bali Safari and Marine Park', 'Gianyar', 135000, 4.6, '0361950000', 'destinasi/sfFYMhNDeslDE4iEBil8I0JZN1mXsuA2ldMQ8P2n.jpg', 'Jl. Prof. Dr. Ida Bagus Mantra No.Km. 19,8, Serongga, Kec. Blahbatuh, Kabupaten Gianyar, Bali 80551', 'https://maps.app.goo.gl/gPB9R2NbBrraDzWQ7', 'Keluarga & Edukasi', '0361950000', '09:00:00', '21:00:00', NULL, NULL),
(30, 'Monumen Bajra Sandhi', 'Denpasar', 1000, 4.6, '0361264517', 'destinasi/DARJ9HPhxUFbRHIIeOtUsHa29VnpTBLUTyguvygs.jpg', '86HJ+9X5, Jl. Raya Puputan No.142, Panjer, Denpasar Selatan, Kota Denpasar, Bali 80234', 'https://maps.app.goo.gl/HbsiWkowpoC1C5AR8', 'Keluarga & Edukasi', '0361264517', '08:00:00', '18:00:00', NULL, NULL),
(31, 'Taman Nusa', 'Gianyar', 95000, 4.3, '0361952952', 'destinasi/WtHm9Lz9QBTwOZFyKNvl96Bf44o68a2Br01Eq2A1.jpg', 'Banjar Blahpane Kelod, Jl. Taman Bali – Banjarangkan, Sidan, Kec. Gianyar, Kabupaten Gianyar, Bali 80582', 'https://maps.app.goo.gl/hbQuQt6ebQZcAvur9', 'Keluarga & Edukasi', '0361952952', '09:00:00', '17:00:00', NULL, NULL),
(32, 'Pulau Penyu Bulih Bali', 'Badung', 5000, 4.4, '081529215973', 'destinasi/GMHtsRJITQoXTlNqYWdTSguRQnx7sijSwndHnLTf.jpg', 'Benoa, South Kuta, Badung Regency, Bali', 'https://maps.app.goo.gl/Hg5P5sywywasRR2q9', 'Keluarga & Edukasi', '6281529215973', '09:00:00', '16:00:00', NULL, NULL),
(33, 'Subak Teba Majalangu', 'Denpasar', 2000, 4.7, '082111777203', 'destinasi/eCQSg3pp1tmpPFYjCRHsAPYH75HA5S23NofvAZu2.jpg', 'Gg. Bakung Sari No.D-15, Kesiman Kertalangu, Kec. Denpasar Tim., Kota Denpasar, Bali 80237', 'https://maps.app.goo.gl/WYxkeZ7SDD6n5JDN9', 'Keluarga & Edukasi', '6282111777203', '07:00:00', '19:00:00', NULL, NULL),
(34, 'Taman Nasional Bali Barat', 'Buleleng', 10000, 4.4, '036561060', 'destinasi/xm44kbyqaRCzs3bYTtsRU9kYTjJuKCXGN9zJOwQ3.jpg', 'VFCG+X44, Sumber Klampok, Gerokgak, Buleleng Regency, Bali', 'https://maps.app.goo.gl/tSz8uPyZCihf3LeQ8', 'Keluarga & Edukasi', '036561060', '08:00:00', '18:00:00', NULL, NULL),
(35, 'Warung Babi Guling Bu Oka 3', 'Gianyar', 75000, 3.8, '0361976345', 'destinasi/GJlKW6uBcNeuz4OujrCEFDbec9NZ9D4x568MNQpQ.jpg', 'Jl. Tegal Sari No.2, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571', 'https://maps.app.goo.gl/MYgwpxZ68Ea21JWT8', 'Kuliner', '0361976345', '11:00:00', '18:00:00', NULL, NULL),
(36, 'Bebek Bengil Ubud', 'Gianyar', 15000, 4.3, '0361975489', 'destinasi/J8cHB1n6fIrvSHCwWR3NPbhcROvZE3uFNnl4W1bp.jpg', 'Jl. Hanoman, Ubud, Kecamatan Ubud, Kabupaten Gianyar, Bali 80571', 'https://maps.app.goo.gl/UoajXxySh63gZ5Yt7', 'Kuliner', '0361975489', '10:00:00', '23:00:00', NULL, NULL),
(37, 'Warung Mak Beng', 'Denpasar', 50000, 4.6, '0361282633', 'destinasi/u1huI0pcRDa9Fy7v5OLCDmEiJJ871HYTVxmeWW21.jpg', 'Jalan Hang Tuah No.45, Sanur Kaja, Denpasar Selatan, Jl. Hang Tuah No.51, Sanur Kaja, Denpasar Selatan, Kota Denpasar, Bali 80227', 'https://maps.app.goo.gl/kffGoQbaxjzzLaoY6', 'Kuliner', '0361282633', '08:00:00', '22:00:00', NULL, NULL),
(38, 'Warung Men Weti', 'Denpasar', 25000, 4.5, '085338509922', 'destinasi/mlK3Xl4E8fJbYkoWJ6zBYvrUWFCPn2jPc5WVF3BO.jpg', 'Jl. Gn. Semeru No.16A, Pemecutan, Kec. Denpasar Bar., Kota Denpasar, Bali 80119', 'https://maps.app.goo.gl/VFWbjWgUbnkhdR3A6', 'Kuliner', '6285338509922', '07:00:00', '17:00:00', NULL, NULL),
(39, 'Naughty Nuri\'s Seminyak', 'Badung', 17000, 4.7, '03618476783', 'destinasi/pOEWPXZPVfR2AnurxraREgGjcd3RyEmjmKEpPT7i.jpg', 'Jalan Mertanadi No. 62 Kerobokan Seminyak, Kerobokan Kelod, Kec. Kuta Utara, Kabupaten Badung, Bali 80361', 'https://maps.app.goo.gl/edFWroqXxw6WgSHZ8', 'Kuliner', '628113999823', '11:00:00', '22:00:00', NULL, NULL),
(40, 'Gunung Batur', 'Bangli', 10000, 4.5, '083871322262', 'destinasi/V7wQ4fG1wP5H8JhllO9rIGNRARfaYohNdOauqWGM.jpg', 'South Batur, Kintamani, Bangli Regency, Bali', 'https://maps.app.goo.gl/7pC7BFh5fGLs6qj29', 'Alam', '6283871322262', '00:01:00', '23:59:00', NULL, NULL),
(41, 'Desa Penglipuran', 'Bangli', 50000, 4.8, '082144543439', 'destinasi/oEn4IZbGVJYxhcdiNNG0YwXFjiIkHav5mKV2p36V.jpg', 'Jl. Penglipuran, Kubu, Kec. Bangli, Kabupaten Bangli, Bali 80611', 'https://maps.app.goo.gl/76GQR1rkFrLyKPuG6', 'Keluarga & Edukasi', '6282144543439', '08:00:00', '18:30:00', NULL, NULL),
(42, 'Pemakaman Trunyan', 'Bangli', 10000, 3.4, '085180681115', 'destinasi/FJwmfGdHrS5Tpdo9OXCP52xkTRVbTZs2HG5zfNVt.jpg', 'QC4G+6H4, Songan B, Kintamani, Bangli Regency, Bali 80652', 'https://maps.app.goo.gl/kAYHQmgUvqvcbLER6', 'Budaya & Rohani', '6285180681115', '08:00:00', '17:30:00', NULL, NULL),
(43, 'Kurma Asih Sea Turtle Conservation Center', 'Jembrana', 200000, 4.7, '081936501926', 'destinasi/rAQzwCPVRoNmzxFxNs2tJZRnuruzoZoOeCJjRtvY.jpg', 'Perancak, Jembrana, Jembrana Regency, Bali 82218', 'https://maps.app.goo.gl/1VBqjUfFvK2MmPCD9', 'Keluarga & Edukasi', '6281936501926', '08:00:00', '18:00:00', NULL, NULL),
(44, 'Pantai Baluk Bening', 'Jembrana', 5000, 4.2, '036541010', 'destinasi/LbYAFoVjEeKUf7XlgRNwmyiuPLgSXvvK9UnkbA1p.jpg', 'Baluk, Negara, Jembrana Regency, Bali 82218', 'https://maps.app.goo.gl/FFb6vzaaveS6Ukdi8', 'Alam', '036541010', '08:00:00', '18:00:00', NULL, NULL),
(45, 'Kerta Gosa', 'Klungkung', 10000, 4.5, '036621054', 'destinasi/7SbGTgvOnD60UVQMBae9cpLZqL0eukH1CTrATg0K.jpg', 'Jl. Kenanga No.11, Semarapura Kelod, Kec. Klungkung, Kabupaten Klungkung, Bali 80761', 'https://maps.app.goo.gl/HpDKnqRnR8vhy2xw6', 'Budaya & Rohani', '036621054', '08:00:00', '17:00:00', NULL, NULL),
(46, 'Kerta Gosa', 'Klungkung', 10000, 4.5, '036621054', 'destinasi/QDxYfRLWWnqCfxoFarO7ndMLTwUHL43Nh3lV0bQN.jpg', 'Jl. Kenanga No.11, Semarapura Kelod, Kec. Klungkung, Kabupaten Klungkung, Bali 80761', 'https://maps.app.goo.gl/HpDKnqRnR8vhy2xw6', 'Budaya & Rohani', '036621054', '08:00:00', '17:00:00', NULL, NULL),
(47, 'Pantai Broken', 'Klungkung', 5000, 4.6, '081228899116', 'destinasi/JlCEMWrSv7vU2s00y0jyavVGOFMlJbBtfPwjIkhp.png', '7F82+R4, Sakti, Nusa Penida, Klungkung Regency, Bali 80771', 'https://maps.app.goo.gl/WvCct4tC4L1mgg269', 'Alam', '6281228899116', '06:00:00', '18:30:00', NULL, NULL),
(48, 'Toko puspa Agung -Di dalam Pasar Seni Semarapura klungkung bali.', 'Klungkung', 2000, 4.3, '081229230891', 'destinasi/AGpxXRJvEqK7nasRqgcFh9LkXA2pV8MU8h9joLjW.jpg', 'Jl. Diponegoro No.16, Semarapura Kelod Kangin, Kec. Klungkung, Kabupaten Klungkung, Bali 80761', 'https://maps.app.goo.gl/mLFrx9kw93pDRwze7', 'Seni & Kerajinan', '6281229230891', '09:00:00', '16:00:00', NULL, NULL),
(49, 'Rumah Pohon Bukit Lemped', 'Karangasem', 10000, 4.4, '081246747157', 'destinasi/h8qt6hjbADuvPjCOwQXpJejLu8oRtlctKvYc653r.jpg', 'Jl. Raya Tirta Gangga, Padang Kerta, Kec. Karangasem, Kabupaten Karangasem, Bali 80811', 'https://maps.app.goo.gl/XbPf5PDEUXokHNqr5', 'Alam', '6281246747157', '09:00:00', '17:00:00', NULL, NULL),
(50, 'Bali Chocolate Factory', 'Karangasem', 10000, 3.8, '085155017101', 'destinasi/DFFl2NvVO4Qv942fnApVeYAKIpnnvghvwfPl22R1.jpg', 'Subagan, Karangasem, Karangasem Regency, Bali 80813', 'https://maps.app.goo.gl/PwrQq8ipTVVvx4vZ8', 'Kuliner', '6285155017101', '09:00:00', '17:00:00', NULL, NULL),
(51, 'Bukit Asah', 'Karangasem', 5000, 4.6, '081937068702', 'destinasi/7l2d7zvjSeR0mXmoUfXTEz6Hmyjq7vL914z0703T.jpg', 'Sengkidu, Manggis, Karangasem Regency, Bali', 'https://maps.app.goo.gl/FRmCu5vURDhE4Q3H9', 'Alam', '6281937068702', '00:01:00', '23:59:00', NULL, NULL),
(52, 'Pantai Virgin', 'Karangasem', 5000, NULL, '08123777777', 'destinasi/asBpk5Hc299zQfYtDAAveWpc6A01Setm3G3QCkEi.jpg', 'karangasem, Bali', 'https://maps.app.goo.gl/zPNRbmEQLnUmCjCv8', 'Alam', '08123777777', '10:30:00', '00:00:00', NULL, NULL),
(55, 'Pantai Mertasari', 'Denpasar', 15000, 4.4, '081805540145', 'destinasi/Dr7B0rl9kXQ6oLfweukoAuA5fvprwOjNXNymRC2O.jpg', 'Jl. Tirta Empul, Desa Intaran, Kelurahan Sanur, Kecamatan Denpasar Selatan', 'https://maps.app.goo.gl/fpCTW4KhNVjx1tj29', 'Alam', '6281805540145', '00:00:00', '23:59:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_03_053144_create_destinasi_wisata_table', 1),
(3, '2024_12_03_053222_create_destinasi_fasilitas_table', 2),
(5, '2024_12_03_053634_create_destinasi_medsos_table', 3),
(6, '2024_12_03_053834_create_users_table', 3),
(8, '2024_12_03_054021_create_rekomendasi_table', 4),
(10, '2024_12_03_054117_create_ulasan_table', 5),
(11, '2024_12_03_054339_create_sessions_table', 6),
(12, '2024_12_04_131110_create_cache_table', 7),
(13, '2024_12_04_140755_create_failed_jobs_table', 8),
(14, '2024_12_04_140810_create_jobs_table', 9),
(15, '2024_12_04_141157_create_job_batches_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_rekomendasi` bigint UNSIGNED NOT NULL,
  `maks_budget` int NOT NULL,
  `kabupaten_kota` json NOT NULL,
  `banyak_tempat` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_rekomendasi`, `maks_budget`, `kabupaten_kota`, `banyak_tempat`, `created_at`, `updated_at`) VALUES
(1, 25000, '[\"Bangli\"]', 5, '2024-12-02 21:45:11', '2024-12-02 21:45:11'),
(2, 100000, '[\"Badung\"]', 2, '2024-12-02 23:03:07', '2024-12-02 23:03:07'),
(3, 35000, '[\"Badung\"]', 2, '2024-12-02 23:03:34', '2024-12-02 23:03:34'),
(4, 50000, '[\"Badung\"]', 2, '2024-12-04 22:03:27', '2024-12-04 22:03:27'),
(5, 20000, '[\"Badung\"]', 2, '2024-12-04 22:03:46', '2024-12-04 22:03:46'),
(6, 20000, '[\"Badung\"]', 2, '2024-12-04 23:09:09', '2024-12-04 23:09:09'),
(7, 5000, '[\"Badung\"]', 1, '2024-12-04 23:13:57', '2024-12-04 23:13:57'),
(8, 2000, '[\"Badung\"]', 1, '2024-12-04 23:14:05', '2024-12-04 23:14:05'),
(9, 2000, '[\"Badung\"]', 1, '2024-12-08 21:23:17', '2024-12-08 21:23:17'),
(10, 2000, '[\"Badung\"]', 2, '2024-12-11 20:36:56', '2024-12-11 20:36:56'),
(11, 2000, '[\"Badung\"]', 1, '2024-12-11 20:37:03', '2024-12-11 20:37:03'),
(12, 1, '[\"Badung\"]', 2000, '2024-12-11 20:40:11', '2024-12-11 20:40:11'),
(13, 2000, '[\"Badung\"]', 1, '2024-12-11 20:40:19', '2024-12-11 20:40:19'),
(14, 15000, '[\"Badung\"]', 2, '2024-12-12 00:58:18', '2024-12-12 00:58:18'),
(15, 150000, '[\"Tabanan\"]', 2, '2024-12-12 00:58:32', '2024-12-12 00:58:32'),
(16, 60000, '[\"Tabanan\"]', 2, '2024-12-12 00:59:02', '2024-12-12 00:59:02'),
(17, 40000, '[\"Gianyar\"]', 2, '2024-12-12 02:21:34', '2024-12-12 02:21:34'),
(18, 150000, '[\"Denpasar\"]', 2, '2024-12-12 02:22:18', '2024-12-12 02:22:18'),
(19, 7500, '[\"Badung\"]', 2, '2024-12-13 02:01:12', '2024-12-13 02:01:12'),
(20, 7500, '[\"Badung\"]', 2, '2024-12-13 02:01:20', '2024-12-13 02:01:20'),
(21, 20000, '[\"Badung\"]', 2, '2024-12-13 02:02:17', '2024-12-13 02:02:17'),
(22, 20000, '[\"Badung\"]', 2, '2024-12-13 02:02:53', '2024-12-13 02:02:53'),
(23, 20000, '[\"Badung\"]', 2, '2024-12-13 02:03:00', '2024-12-13 02:03:00'),
(24, 20000, '[\"Badung\"]', 2, '2024-12-13 02:03:10', '2024-12-13 02:03:10'),
(25, 20000, '[\"Badung\"]', 2, '2024-12-13 02:03:21', '2024-12-13 02:03:21'),
(26, 20000, '[\"Badung\"]', 2, '2024-12-13 02:03:25', '2024-12-13 02:03:25'),
(27, 20000, '[\"Badung\"]', 2, '2024-12-13 02:03:38', '2024-12-13 02:03:38'),
(28, 5000, '[\"Badung\"]', 2, '2024-12-22 17:58:56', '2024-12-22 17:58:56'),
(29, 5000, '[\"Badung\"]', 2, '2024-12-22 20:39:28', '2024-12-22 20:39:28'),
(30, 5000, '[\"Badung\"]', 2, '2024-12-22 20:42:41', '2024-12-22 20:42:41'),
(31, 5000, '[\"Badung\"]', 2, '2024-12-22 23:14:04', '2024-12-22 23:14:04'),
(32, 50000, '[\"Badung\"]', 2, '2025-01-12 21:23:27', '2025-01-12 21:23:27'),
(33, 20000, '[\"Badung\"]', 3, '2025-01-12 21:23:43', '2025-01-12 21:23:43'),
(34, 20000, '[\"Badung\"]', 3, '2025-01-12 21:24:08', '2025-01-12 21:24:08'),
(35, 20000, '[\"Badung\"]', 3, '2025-01-12 21:24:15', '2025-01-12 21:24:15'),
(36, 20000, '[\"Badung\"]', 3, '2025-01-12 21:24:20', '2025-01-12 21:24:20'),
(37, 20000, '[\"Badung\"]', 3, '2025-01-12 21:24:39', '2025-01-12 21:24:39'),
(38, 20000, '[\"Badung\"]', 3, '2025-01-12 23:40:25', '2025-01-12 23:40:25'),
(39, 20000, '[\"Badung\"]', 3, '2025-01-12 23:43:28', '2025-01-12 23:43:28'),
(40, 50000, '[\"Badung\"]', 3, '2025-01-19 01:10:56', '2025-01-19 01:10:56'),
(41, 30000, '[\"Badung\"]', 2, '2025-01-19 01:11:12', '2025-01-19 01:11:12'),
(42, 20000, '[\"Badung\"]', 3, '2025-01-19 01:12:25', '2025-01-19 01:12:25'),
(43, 20000, '[\"Badung\"]', 3, '2025-01-19 01:13:48', '2025-01-19 01:13:48'),
(44, 20000, '[\"Badung\"]', 3, '2025-01-19 01:14:57', '2025-01-19 01:14:57'),
(45, 20000, '[\"Badung\"]', 3, '2025-01-19 01:18:34', '2025-01-19 01:18:34'),
(46, 20000, '[\"Badung\"]', 3, '2025-01-19 01:18:39', '2025-01-19 01:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7eq566gQ737wNXLygGgtUIxMqhqhqXIPa1iCvBVi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0dVZlpWRFR3Q2xBY2ZXRnU1SnQyUEk5VVd6eWZKTnlUeE1FcVNjQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wbGFuLXRyaXAtcmVzdWx0P3BhZ2U9MiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToidHJpcF9kYXRhIjthOjQ6e3M6NjoiYnVkZ2V0IjtzOjU6IjIwMDAwIjtzOjE2OiJqdW1sYWhfZGVzdGluYXNpIjtzOjE6IjMiO3M6MTQ6ImthYnVwYXRlbl9rb3RhIjthOjE6e2k6MDtzOjY6IkJhZHVuZyI7fXM6ODoicGVyX3BhZ2UiO2k6MTA7fX0=', 1737278319);

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` bigint UNSIGNED NOT NULL,
  `tanggal_ulasan` date NOT NULL,
  `isi_ulasan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` double NOT NULL,
  `foto_ulasan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_destinasi` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `tanggal_ulasan`, `isi_ulasan`, `rating`, `foto_ulasan`, `id_user`, `id_destinasi`, `created_at`, `updated_at`) VALUES
(1, '2024-12-05', 'Tempatnya sejuk, banyak pohon, jadi suka deh!', 5, 'ulasan/RAJs8q7T8rCMc6P0LfCWRt3j6DHWgWDpxARC9mBJ.jpg', 1, 1, NULL, NULL),
(2, '2024-12-05', 'Walaupun tempatnya jauh dari kota, cuma worth it lah kita bisa ngedapetin pemandangan yg sebagus ini :)', 4, 'ulasan/gxxzIp9mcmrx8qHcPy2tS7Mwqjhn4SvADRekRQED.jpg', 2, 1, NULL, NULL),
(3, '2024-12-05', 'Sawahnya bagus', 4, 'ulasan/mFkktLs0VgaxrR74PAAR82ixQ5hXTMslEEeSjhfu.jpg', 2, 5, NULL, NULL),
(4, '2024-12-12', 'Tempatnya sejuk, tapi perlu hati\" karena jalannya licin', 4, 'ulasan/S2yUMK0QFQHGuIlsjgtEqQZQCdzNKFLZJ4SqCboJ.jpg', 2, 4, NULL, NULL),
(5, '2024-12-12', 'Ada monyet ngambil makanan gue, but overall tempatnya bagus sih :)', 3, 'ulasan/g6KkEAlvtF7m77Hv1pBCutwViRDFJDx6cTrQsYjl.jpg', 2, 1, NULL, NULL),
(6, '2024-12-17', 'bagus', 5, NULL, 2, 7, NULL, NULL),
(7, '2024-12-17', 'gfjgujjh', 4, NULL, 2, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `jenis_kelamin`, `username`, `no_telepon`, `email`, `email_verified_at`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Kartika Sari', 'Perempuan', 'karsa', '123456789', 'karsa@gmail.com', '2024-12-05 05:52:28', '$2y$12$TU.DBIM/cHIst49BOB7F8.Mc/5yG0HYw//nlLJScOyG0Oqjl9StHm', '2024-12-04 21:52:28', '2024-12-04 21:57:15'),
(2, 'Nadya', 'Perempuan', 'nadya', '08123456789', 'nadyaputriast@gmail.com', '2024-12-05 06:38:06', '$2y$12$rA9s5Fcg8rnerKo2hP6zU.9mpRvNarpQujZ2b8odeNDjx4/J1T3dS', '2024-12-04 22:38:06', '2024-12-22 21:05:08'),
(3, 'Mahda', 'Perempuan', 'mahda', '08987654321', 'mahda@gmail.com', '2024-12-23 07:05:09', '$2y$12$hE6qpV2gd/ijWnSTA2oLMOYGQKX8c/jun5iLr..TqkVM14I4zgosm', '2024-12-22 23:05:09', '2024-12-22 23:05:09');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `destinasi_fasilitas`
--
ALTER TABLE `destinasi_fasilitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinasi_fasilitas_id_destinasi_foreign` (`id_destinasi`);

--
-- Indexes for table `destinasi_medsos`
--
ALTER TABLE `destinasi_medsos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destinasi_medsos_id_destinasi_foreign` (`id_destinasi`);

--
-- Indexes for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  ADD PRIMARY KEY (`id_destinasi`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_rekomendasi`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `ulasan_id_destinasi_foreign` (`id_destinasi`),
  ADD KEY `ulasan_id_user_foreign` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destinasi_fasilitas`
--
ALTER TABLE `destinasi_fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `destinasi_medsos`
--
ALTER TABLE `destinasi_medsos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `destinasi_wisata`
--
ALTER TABLE `destinasi_wisata`
  MODIFY `id_destinasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_rekomendasi` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `destinasi_fasilitas`
--
ALTER TABLE `destinasi_fasilitas`
  ADD CONSTRAINT `destinasi_fasilitas_id_destinasi_foreign` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi_wisata` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `destinasi_medsos`
--
ALTER TABLE `destinasi_medsos`
  ADD CONSTRAINT `destinasi_medsos_id_destinasi_foreign` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi_wisata` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_id_destinasi_foreign` FOREIGN KEY (`id_destinasi`) REFERENCES `destinasi_wisata` (`id_destinasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
