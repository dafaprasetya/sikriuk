-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 02, 2025 at 06:51 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u446851162_sikriuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `moto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `deskripsi_lengkap` text DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `total_mitra` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `legalitas` text DEFAULT NULL,
  `namapt` varchar(255) NOT NULL DEFAULT 'PT. Inti Kriuk Indonesia',
  `followersig` int(11) NOT NULL DEFAULT 0,
  `banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `nama`, `logo`, `moto`, `deskripsi`, `deskripsi_lengkap`, `lokasi`, `total_mitra`, `created_at`, `updated_at`, `legalitas`, `namapt`, `followersig`, `banner`) VALUES
(1, 'SI KRIUK KRISPY', NULL, 'Juaranya Kriuk!', 'Pelopor dalam kemitraan bisnis di industri makanan, khususnya fried chicken. Didirikan pada 2024, kami telah membangun jaringan kemitraan yang kuat dengan berbagai mitra bisnis untuk menyediakan hidangan ayam goreng berkualitas tinggi kepada pelanggan di seluruh Indonesia', 'Si Kriuk adalah salah satu brand kuliner dengan sistem usaha kemitraan yang berdiri sejak tahun 2024 dan bernaung dibawah PT Inti Kriuk Indonesia, salah satu grup dari PT Minula Inti Sejahtera, berpusat di Kota Bogor, Jawa Barat.\r\n\r\nDari perkembangan perusahaan yang sudah berjalan, Si Kriuk yang sudah menghadirkan menu menu yang variatif dan inovatif serta berhasil membantu lebih dari 50 mitra dalam memberikan pelayanan kepada masyarakat serta mengembangkan usaha kuliner ini. \r\n\r\nPerusahaan kami bertujuan untuk memberikan pelayanan nomor satu, dengan tetap menjaga kualitas produk kami. Dalam mencapai tujuan tersebut, kami di dukung oleh sumber daya yang profesional dan berkualitas. Hal ini guna menjaga kepuasan para mitra yang sudah mempercayakan perusahaan kami, dalam membantu usahanya.\r\n\r\nDengan kiprah Si Kriuk, kami berharap dapat membuka peluang kemitraan seluas-luasnya kepada masyarakat indonesia untuk berwirausaha, mengembangkan ide-ide, potensi diri, dan memberikan kontribusi yang positif bagi masyarakat luas.', 'Jl. Villa Randu III No.5, Kedung Jaya, Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16164', '30', '2025-04-03 23:06:26', '2025-04-16 03:19:58', 'Si Kriuk merupakan usaha yang sudah berbadan hukum PT (Perseroan Terbatas) yang terdaftar secara sah di Kementrian Hukum dan HAM dengan nama PT MINULA INTI SEJAHTERA. Dengan ini setiap langkah perusahaan baik secara internal maupun eksternal dilakukan secara legal dan profesional. Kami juga bekerjasama dengan rekan bisnis yang terkurasi dan tersertifikasi Halal dan NKV untuk memastikan produk yang kami tawarkan HALAL dan aman untuk dikonsumsi oleh masyarakat', 'PT Inti Kriuk Indonesia', 268, 'Sikriuk_Fried_Chicken1743754754.png');

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'SikriukFC', NULL, '2025-04-07 15:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_kemitraans`
--

CREATE TABLE `benefit_kemitraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `benefit` varchar(255) NOT NULL,
  `kemitraan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benefit_kemitraans`
--

INSERT INTO `benefit_kemitraans` (`id`, `benefit`, `kemitraan_id`, `created_at`, `updated_at`) VALUES
(18, 'Dicarikan Lokasi Strategis. Lokasi usaha sangat mempengaruhi omzet penjualan', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(19, 'Gratis Desain dan Renovasi Tempat Usaha. Layout dan dekorasi menarik dengan konsep Mini Resto', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(20, 'Peralatan Lengkap dan Berkualitas. Semua peralatan untuk operasional Mini Resto', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(21, 'Bahan Baku Awal. Stok bahan baku awal untuk memulai usaha', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(22, 'Dicarikan Karyawan dan Diberikan Pelatihan. Karyawan yang berpengalaman namun tetap diberikan pembekalan/pelatihan exclusive', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(23, 'Dukungan Pemasaran. Free acara Grand Opening dan memaksimalkan dengan digital marketing', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(24, 'Sistem Kemitraan Autopilot. Mitra sebagai investor, management Si Kriuk sebagai pengelola operasional store. Sharing profit investor 70% (sebelum balik modal)', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42'),
(25, 'Tanpa Perpanjang Lisensi Kemitraan. Gratis lisensi brand Si Kriuk selama masih bekerjasama', 3, '2025-04-04 03:15:42', '2025-04-04 03:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `gambar`, `slug`, `user_id`, `created_at`, `updated_at`, `thumbnail`) VALUES
(1, 'tes', '<p>tes</p>', 'tes4551743960964.png', 'tes455', 1, '2025-04-06 10:36:05', '2025-04-06 10:36:05', 'tes4551743960965.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `calon_mitras`
--

CREATE TABLE `calon_mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `readby` varchar(255) DEFAULT NULL,
  `nik` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_mitras`
--

INSERT INTO `calon_mitras` (`id`, `nama`, `email`, `phone`, `kota`, `status`, `readby`, `nik`, `lokasi`, `created_at`, `updated_at`) VALUES
(7, 'dafa prasetya', 'dafaprstya@ea.co', '08292829282928', 'dafaprstya', 'unread', NULL, NULL, 'dafaprstya', '2025-04-17 13:52:24', '2025-04-17 13:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `email_abouts`
--

CREATE TABLE `email_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_abouts`
--

INSERT INTO `email_abouts` (`id`, `about_id`, `nama`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'ptintikriukindonesia@gmail.com', '2025-04-04 00:55:24', '2025-04-04 00:55:24');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanya` text NOT NULL,
  `jawab` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `tanya`, `jawab`, `created_at`, `updated_at`) VALUES
(1, 'Seperti apa sistem kemitraan Si Kriuk itu?', 'Si Kriuk Krispy hadir dengan skema Kemitraan Autopilot. Mitra sebagai investor, operasional & manajemen Store dikelola oleh tim profesional Si Kriuk Krispy. Profit sharing investor 70% sebelum balik modal.', '2025-04-04 02:59:11', '2025-04-17 14:21:55'),
(2, 'Bahan Bakunya Apakah Disediakan?', 'Untuk menjaga standar kualitas rasa dan branding yang baik, bahan baku utama seperti ayam frozen, tepung, saus branding, packaging, dan lain-lain sudah disediakan dan wajib beli ke Si Kriuk.', '2025-04-04 02:59:11', '2025-04-04 02:59:11'),
(3, 'Bolehkah Membeli Bahan Baku Diluar?', 'Tidak boleh, kecuali isi gas, minyak, dan beras. Membeli bahan baku dari pihak luar berarti melanggar kesepakatan kemitraan.', '2025-04-04 02:59:11', '2025-04-04 02:59:11'),
(4, 'Apakah Ada Pelatihan untuk karyawan?', 'Ada, pelatihannya bisa di training center kami secara gratis atau mendatangkan trainer kami secara ke lokasi outlet khusus untuk wilayah yang belum ada training center terdekat tentunya dengan biaya tambahan. Untuk pelatihannya kurang lebih sepekan atau minimal 2 hari.', '2025-04-04 02:59:11', '2025-04-04 02:59:11'),
(5, 'Untuk promosi outlet apakah disupport penuh oleh Si Kriuk?', 'Si Kriuk Pusat akan menyediakan dan mengupdate marketing kit yang dapat digunakan oleh Mitra untuk mempromosikan. Ada juga program bantuan promosi untuk tiap Mitra yang diadakan secara reguler maupun event tertentu.', '2025-04-04 02:59:11', '2025-04-04 02:59:11'),
(6, 'Apakah boleh menentukan harga jual sendiri?', 'Tidak boleh. Untuk harga jual harus mengikuti kebijakan dari Manajemen Si Kriuk Fried Chicken. Apabila Mitra memiliki inisiatif program promo yang mengurangi harga jual, wajib memberi tahu dan mendapatkan persetujuan manajemen Si Kriuk.', '2025-04-04 02:59:11', '2025-04-04 02:59:11'),
(7, 'Apakah Bisa Dicarikan Lokasinya?', 'Bisa, akan kami arahkan, tetapi kami tidak dapat menjamin pada pangsa pasar, tingkat kepadatan penduduk dan daya beli masyarakatnya, karena harus ada analisa lebih lanjut.', '2025-04-04 02:59:11', '2025-04-04 02:59:11');

-- --------------------------------------------------------

--
-- Table structure for table `jam_operasionals`
--

CREATE TABLE `jam_operasionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam_buka` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jam_operasionals`
--

INSERT INTO `jam_operasionals` (`id`, `about_id`, `hari`, `jam_buka`, `created_at`, `updated_at`) VALUES
(1, 1, 'Senin', '08:00 - 18:00', '2025-04-06 05:44:00', '2025-04-17 14:33:16'),
(2, 1, 'Selasa', '08:00 - 18:00', '2025-04-06 05:53:13', '2025-04-17 14:33:14'),
(3, 1, 'Rabu', '08:00 - 18:00', '2025-04-06 05:53:32', '2025-04-17 14:33:13'),
(4, 1, 'Kamis', '08:00 - 18:00', '2025-04-06 05:53:50', '2025-04-17 14:33:12'),
(5, 1, 'Jumat', '08:00 - 18:00', '2025-04-06 05:55:09', '2025-04-17 14:33:10'),
(6, 1, 'Sabtu', '08:00 - 18:00', '2025-04-06 05:55:25', '2025-04-17 14:33:09'),
(7, 1, 'Minggu', 'Libur', '2025-04-06 05:56:15', '2025-04-06 05:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `kemitraans`
--

CREATE TABLE `kemitraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kemitraans`
--

INSERT INTO `kemitraans` (`id`, `nama`, `harga`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Sikriuk Mini Resto', '100000000', 'Sikriuk Mini Resto', 'Sikriuk_Mini_Resto1743905668.png', '2025-04-04 03:12:11', '2025-04-05 19:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `keunggulan_mitras`
--

CREATE TABLE `keunggulan_mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keunggulan_mitras`
--

INSERT INTO `keunggulan_mitras` (`id`, `nomor`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'PRODUK SUDAH TERVALIDASI LAKU', 'LAKU Produk Si Kriuk unggul dari sisi harga yang lebih terjangkau (dan masih untung) namun menawarkan rasa yang setara dengan brand fried chicken international.', '2025-04-04 03:01:38', '2025-04-04 04:06:00'),
(2, 2, 'LOKASI USAHA DICARIKAN', 'Tim kami bisa membantu proses pencarian, survey dan negosiasi lokasi usaha Anda.', '2025-04-04 03:01:38', '2025-04-04 03:01:38'),
(3, 3, 'SUPPORT MANAJEMEN', 'Mendapatkan dukungan penuh dari tim Pusat Si Kriuk baik untuk kebutuhan strategis maupun teknis.', '2025-04-04 03:01:38', '2025-04-04 03:01:38'),
(4, 4, 'SOP LENGKAP PLUS BUSINESS SUPPORT', 'Sistem sudah tersedia, tinggal diikuti langkahnya. Tersedia juga konsultasi bisnis agar outlet Anda makin berkembang.', '2025-04-04 03:01:38', '2025-04-04 03:01:38'),
(5, 5, 'SUPPLY BAHAN BAKU TERJAMIN', 'Terjamin ketersediaannya, kualitasnya dan harganya. Kami bekerja sama dengan rekan bisnis yang sudah tersertifikasi Halal dan NKV.', '2025-04-04 03:01:38', '2025-04-04 03:01:38'),
(6, 6, 'MARKETING SUPPORT', 'Materi promosi, pendaftaran aplikasi layanan antar, hingga dibantu promosi dari tim Pusat Si Kriuk.', '2025-04-04 03:01:38', '2025-04-04 03:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_mitras`
--

CREATE TABLE `lokasi_mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `linkmaps` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lokasi_mitras`
--

INSERT INTO `lokasi_mitras` (`id`, `nama`, `kota`, `latitude`, `longitude`, `linkmaps`, `created_at`, `updated_at`) VALUES
(1, 'Sikriuk Krispy Pondok Ungu', 'Jakarta', '-6.161649330113236', '107.00535789467295', 'https://maps.app.goo.gl/6n6DUKS1XneqCDCX6', '2025-04-08 13:57:35', '2025-04-08 14:22:19');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_03_09_085131_create_abouts_table', 1),
(7, '2025_03_09_085132_create_email_abouts_table', 1),
(8, '2025_03_09_085133_create_phone_abouts_table', 1),
(9, '2025_03_09_085134_create_sosmed_abouts_table', 1),
(10, '2025_03_09_085141_create_product_katergoris_table', 1),
(11, '2025_03_09_085142_create_products_table', 1),
(12, '2025_03_09_085212_create_promos_table', 1),
(13, '2025_03_09_085305_create_faqs_table', 1),
(14, '2025_03_09_085435_create_testimonials_table', 1),
(15, '2025_03_09_085450_create_calon_mitras_table', 1),
(16, '2025_03_09_100320_create_kemitraans_table', 1),
(17, '2025_03_09_100401_create_step_kemitraans_table', 1),
(18, '2025_03_09_102640_create_access_tokens_table', 1),
(19, '2025_03_13_154325_add_user_role_to_users_table', 1),
(20, '2025_03_13_163221_add_user_picture_to_users_table', 1),
(21, '2025_03_14_105137_add_user_additional_to_users_table', 1),
(22, '2025_03_15_150325_update_about_table_nullable', 1),
(23, '2025_03_15_164505_update_aaa_table_nullable', 1),
(24, '2025_03_16_103106_add_rating_product', 1),
(25, '2025_03_17_125033_create_pencapaians_table', 1),
(26, '2025_03_18_162114_add_additional_calon_mitras', 1),
(27, '2025_03_19_153439_create_benefit_kemitraans_table', 1),
(28, '2025_03_22_163720_add_nomor_tostep', 1),
(29, '2025_03_22_172546_add_foto_totesti', 1),
(30, '2025_03_22_180238_add_pekerjaan_totesti', 1),
(31, '2025_03_23_061344_create_syarat_mitras_table', 1),
(32, '2025_03_23_061506_create_keunggulan_mitras_table', 1),
(33, '2025_03_23_061628_addlegalitas_toabaout', 1),
(34, '2025_03_28_034035_create_blogs_table', 1),
(35, '2025_03_28_085126_create_lokasi_mitras_table', 1),
(36, '2025_03_28_145555_additional_about', 1),
(37, '2025_03_28_152548_editlegal', 1),
(38, '2025_03_28_153147_addbanner', 1),
(39, '2025_03_29_164829_addgambartokemotraan', 1),
(40, '2025_03_30_080323_alter_faqs_change_string_to_text', 1),
(41, '2025_03_30_130847_additionalblogs', 1),
(42, '2025_04_01_185633_lokasimitra', 1),
(43, '2025_04_02_111627_create_proposal_kemitraans_table', 1),
(44, '2025_04_02_174524_adddesclengkapperusahaan', 1),
(45, '2025_04_06_121205_create_jam_operasionals_table', 2),
(46, '2025_04_17_134142_nullablenik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pencapaians`
--

CREATE TABLE `pencapaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `phone_abouts`
--

CREATE TABLE `phone_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phone_abouts`
--

INSERT INTO `phone_abouts` (`id`, `about_id`, `nama`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '6282123223232', '2025-04-04 00:55:19', '2025-04-04 00:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `rating` varchar(255) NOT NULL DEFAULT '3',
  `product_kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama`, `harga`, `gambar`, `deskripsi`, `rating`, `product_kategori_id`, `created_at`, `updated_at`) VALUES
(9, 'Kriuk Bakar 1', '11000', 'Paket_Kriuk_Bakar_11744118339.jpg', 'Sayap Crispy + Saus BBQ', '3', 1, '2025-04-08 13:18:59', '2025-04-08 13:24:23'),
(10, 'Kriuk Bakar 2', '13000', 'Paket_Kriuk_Bakar_21744118531.jpg', 'Paha Bawah Crispy + Saus BBQ', '3', 1, '2025-04-08 13:22:11', '2025-04-08 13:24:15'),
(11, 'Kriuk Bakar 3', '14000', 'Kriuk_Bakar_31744118643.jpg', 'Dada Crispy + Saus BBQ', '3', 1, '2025-04-08 13:24:03', '2025-04-08 13:24:03'),
(12, 'Kriuk Bakar 4', '14000', 'Kriuk_Bakar_41744118709.jpg', 'Paha Atas Crispy + Saus BBQ', '3', 1, '2025-04-08 13:25:09', '2025-04-08 13:25:09'),
(13, 'Kriuk Cheese 1', '14000', 'Kriuk_Cheese_11744118829.jpg', 'Sayap Crispy + Saus Keju', '3', 1, '2025-04-08 13:27:09', '2025-04-16 03:27:46'),
(14, 'Kriuk Cheese 2', '16000', 'Kriuk_Cheese_21744118926.jpg', 'Paha Bawah Crispy + Saus Keju', '3', 1, '2025-04-08 13:28:46', '2025-04-16 03:27:53'),
(15, 'Kriuk Cheese 3', '17000', 'Kriuk_Cheese_31744118981.jpg', 'Dada Crispy + Saus Keju', '3', 1, '2025-04-08 13:29:41', '2025-04-16 03:28:01'),
(16, 'Kriuk Cheese 4', '17000', 'Kriuk_Cheese_41744119055.jpg', 'Paha Atas Crispy + Saus Keju', '3', 1, '2025-04-08 13:30:55', '2025-04-16 03:28:14'),
(17, 'Kriuk Geprek 1', '10000', 'Kriuk_Geprek_11744119170.jpg', 'Sayap Crispy + Sambal Geprek', '3', 1, '2025-04-08 13:32:50', '2025-04-08 13:32:50'),
(18, 'Kriuk Geprek 2', '12000', 'Kriuk_Geprek_21744119256.jpg', 'Paha Bawah Crispy + Sambal Geprek', '3', 1, '2025-04-08 13:34:16', '2025-04-08 13:34:16'),
(19, 'Kriuk Geprek 3', '13000', 'Kriuk_Geprek_31744119288.jpg', 'Dada Crispy + Sambal Geprek', '3', 1, '2025-04-08 13:34:48', '2025-04-08 13:34:48'),
(20, 'Kriuk Geprek 4', '13000', 'Kriuk_Geprek_41744119324.jpg', 'Paha Atas Crispy + Sambal Geprek', '3', 1, '2025-04-08 13:35:24', '2025-04-08 13:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_katergoris`
--

CREATE TABLE `product_katergoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_katergoris`
--

INSERT INTO `product_katergoris` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', 'untuk makanan', '2025-04-04 01:53:59', '2025-04-04 01:53:59'),
(2, 'SNACK', 'Sikriuk Snack', '2025-04-04 02:14:59', '2025-04-04 02:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proposal_kemitraans`
--

CREATE TABLE `proposal_kemitraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_kemitraans`
--

INSERT INTO `proposal_kemitraans` (`id`, `nama`, `file`, `created_at`, `updated_at`) VALUES
(2, 'Proposal Kemitraan maret 2025', 'Proposal_Kemitraan_maret_2025_1744039247.pdf', '2025-04-07 15:20:47', '2025-04-07 15:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `sosmed_abouts`
--

CREATE TABLE `sosmed_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `links` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sosmed_abouts`
--

INSERT INTO `sosmed_abouts` (`id`, `about_id`, `nama`, `logo`, `links`, `created_at`, `updated_at`) VALUES
(1, 1, 'Instagram', 'fab fa-instagram', 'https://instagram.com/sikriukkrispy', '2025-04-04 00:56:14', '2025-04-04 00:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `step_kemitraans`
--

CREATE TABLE `step_kemitraans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `step_kemitraans`
--

INSERT INTO `step_kemitraans` (`id`, `nomor`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '117437617771.png', '2025-04-04 03:16:17', '2025-04-04 03:16:17'),
(2, 2, '2', '217437617862.png', '2025-04-04 03:16:26', '2025-04-04 03:16:26'),
(3, 3, '3', '317437617953.png', '2025-04-04 03:16:35', '2025-04-04 03:16:35'),
(4, 4, '4', '417437618044.png', '2025-04-04 03:16:44', '2025-04-04 03:16:44'),
(5, 5, '5', '517437618125.png', '2025-04-04 03:16:52', '2025-04-04 03:16:52'),
(6, 6, '6', '617437618216.png', '2025-04-04 03:17:01', '2025-04-04 03:17:01'),
(7, 7, '7', '717437618297.png', '2025-04-04 03:17:09', '2025-04-04 03:17:09'),
(8, 8, '8', '817437618368.png', '2025-04-04 03:17:16', '2025-04-04 03:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_mitras`
--

CREATE TABLE `syarat_mitras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `syarat_mitras`
--

INSERT INTO `syarat_mitras` (`id`, `nomor`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Modal Awal', 'Memiliki modal yang cukup untuk investasi awal sesuai dengan paket waralaba yang dipilih.', '2025-04-04 03:03:00', '2025-04-04 04:09:49'),
(2, 2, 'Lokasi Strategis', 'Menyediakan lokasi usaha yang strategis dan mudah diakses oleh pelanggan, seperti di pusat keramaian, dekat sekolah, atau area perkantoran.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(3, 3, 'Komitmen dan Dedikasi', 'Bersedia menginvestasikan waktu dan usaha untuk menjalankan bisnis serta berkomitmen terhadap standar operasional yang ditetapkan oleh Si Kriuk.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(4, 4, 'Pelatihan', 'Siap mengikuti pelatihan yang diberikan oleh pihak franchisor untuk memahami proses operasional, penyajian, dan manajemen.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(5, 5, 'Kepatuhan pada Brand', 'Bersedia mematuhi pedoman branding dan pemasaran yang ditetapkan untuk menjaga konsistensi dan reputasi merek.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(6, 6, 'Kemampuan Manajerial', 'Memiliki kemampuan dalam manajemen dan pengelolaan sumber daya manusia, termasuk dalam merekrut dan melatih karyawan.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(7, 7, 'Kesiapan Teknologi', 'Memiliki akses ke teknologi yang diperlukan untuk mendukung operasional, seperti sistem kasir dan perangkat lunak manajemen.', '2025-04-04 03:03:00', '2025-04-04 03:03:00'),
(8, 8, 'Minat di Bidang Kuliner', 'Memiliki minat dan pengetahuan tentang industri makanan dan minuman, khususnya ayam goreng.', '2025-04-04 03:03:00', '2025-04-04 03:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kata` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pekerjaan` varchar(255) NOT NULL DEFAULT 'Karyawan Swasta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `picture` varchar(255) NOT NULL DEFAULT 'user.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `phone`, `bio`) VALUES
(1, 'Dafa Prasetya', 'dafaprstya150@gmail.com', 'admin', 'Dafa_Prasetya1743765718.jpg', '2025-04-03 23:06:12', '$2y$12$K126Yw.dLCPCr9ksWf9jIOn9Y6LbtK5dAXaQ54xgK2FlG66mEqihG', 'neEGYYFtbXEqhuYzzc5S0L7XIps19zrkfhUXQTw6qeGXyQHmGice2MSPvEQD', '2025-04-03 23:06:12', '2025-04-04 04:21:58', '081574999858', 'teruslah bernafas'),
(2, 'Admin 12', 'admin1@sikriuk.com', 'admin', 'Admin_11743765675.png', NULL, '$2y$12$EuQCFyM9b8FRqtNN9NzxZusEbdxeseL7kEH2RXxchRaA5YomqPudq', NULL, '2025-04-04 04:12:58', '2025-04-07 15:31:41', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_kemitraans`
--
ALTER TABLE `benefit_kemitraans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benefit_kemitraans_kemitraan_id_foreign` (`kemitraan_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `calon_mitras`
--
ALTER TABLE `calon_mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_abouts`
--
ALTER TABLE `email_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_abouts_about_id_foreign` (`about_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_operasionals`
--
ALTER TABLE `jam_operasionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jam_operasionals_about_id_foreign` (`about_id`);

--
-- Indexes for table `kemitraans`
--
ALTER TABLE `kemitraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keunggulan_mitras`
--
ALTER TABLE `keunggulan_mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_mitras`
--
ALTER TABLE `lokasi_mitras`
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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pencapaians`
--
ALTER TABLE `pencapaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phone_abouts`
--
ALTER TABLE `phone_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_abouts_about_id_foreign` (`about_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_kategori_id_foreign` (`product_kategori_id`);

--
-- Indexes for table `product_katergoris`
--
ALTER TABLE `product_katergoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_kemitraans`
--
ALTER TABLE `proposal_kemitraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosmed_abouts`
--
ALTER TABLE `sosmed_abouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sosmed_abouts_about_id_foreign` (`about_id`);

--
-- Indexes for table `step_kemitraans`
--
ALTER TABLE `step_kemitraans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_mitras`
--
ALTER TABLE `syarat_mitras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benefit_kemitraans`
--
ALTER TABLE `benefit_kemitraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calon_mitras`
--
ALTER TABLE `calon_mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_abouts`
--
ALTER TABLE `email_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam_operasionals`
--
ALTER TABLE `jam_operasionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kemitraans`
--
ALTER TABLE `kemitraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keunggulan_mitras`
--
ALTER TABLE `keunggulan_mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lokasi_mitras`
--
ALTER TABLE `lokasi_mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pencapaians`
--
ALTER TABLE `pencapaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phone_abouts`
--
ALTER TABLE `phone_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_katergoris`
--
ALTER TABLE `product_katergoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proposal_kemitraans`
--
ALTER TABLE `proposal_kemitraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sosmed_abouts`
--
ALTER TABLE `sosmed_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `step_kemitraans`
--
ALTER TABLE `step_kemitraans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `syarat_mitras`
--
ALTER TABLE `syarat_mitras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefit_kemitraans`
--
ALTER TABLE `benefit_kemitraans`
  ADD CONSTRAINT `benefit_kemitraans_kemitraan_id_foreign` FOREIGN KEY (`kemitraan_id`) REFERENCES `kemitraans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `email_abouts`
--
ALTER TABLE `email_abouts`
  ADD CONSTRAINT `email_abouts_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jam_operasionals`
--
ALTER TABLE `jam_operasionals`
  ADD CONSTRAINT `jam_operasionals_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phone_abouts`
--
ALTER TABLE `phone_abouts`
  ADD CONSTRAINT `phone_abouts_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_kategori_id_foreign` FOREIGN KEY (`product_kategori_id`) REFERENCES `product_katergoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sosmed_abouts`
--
ALTER TABLE `sosmed_abouts`
  ADD CONSTRAINT `sosmed_abouts_about_id_foreign` FOREIGN KEY (`about_id`) REFERENCES `abouts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
