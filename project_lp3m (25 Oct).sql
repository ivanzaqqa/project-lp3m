-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 24, 2021 at 11:38 PM
-- Server version: 5.7.35
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_lp3m`
--

-- --------------------------------------------------------

--
-- Table structure for table `insentif_jurpros`
--

CREATE TABLE `insentif_jurpros` (
  `id_insentif_jurpros` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_jurnal_pros` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `url_artikel` varchar(300) NOT NULL,
  `file_publikasi` varchar(300) NOT NULL,
  `file_berita_acara` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insentif_jurpros`
--

INSERT INTO `insentif_jurpros` (`id_insentif_jurpros`, `id`, `id_jurnal_pros`, `id_status`, `judul_artikel`, `url_artikel`, `file_publikasi`, `file_berita_acara`) VALUES
(1, 1, 15, 1, 'Jump on your fucking mouth', 'www.xxiixii.com', '3afa2204ddfd9e82959993b5855f8196.pdf', NULL),
(16, 1, 9, 2, 'When the days comes thrue', 'www.bitch.com', '7a30709d4837e2e905c61ebbc2d97c86.pdf', 'e65da85e79549f2a425f64090259ec4c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `insentif_specscop`
--

CREATE TABLE `insentif_specscop` (
  `id_insentif_scopus` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_scopus` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `judul_artikel` varchar(255) NOT NULL,
  `impact_factor_jurnal` varchar(255) NOT NULL,
  `url_artikel` varchar(500) NOT NULL,
  `file_luaran` varchar(300) NOT NULL,
  `file_proposal_penelitian` varchar(300) NOT NULL,
  `file_dokumentasi_catatan` varchar(300) NOT NULL,
  `file_laporan_akhir` varchar(300) NOT NULL,
  `file_rpp_rps` varchar(300) NOT NULL,
  `file_berita_acara` varchar(300) DEFAULT NULL,
  `matkul_diampu` varchar(300) NOT NULL,
  `kelompok_riset` varchar(155) NOT NULL,
  `mhs_terlibat` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `insentif_specscop`
--

INSERT INTO `insentif_specscop` (`id_insentif_scopus`, `id`, `id_scopus`, `id_status`, `judul_artikel`, `impact_factor_jurnal`, `url_artikel`, `file_luaran`, `file_proposal_penelitian`, `file_dokumentasi_catatan`, `file_laporan_akhir`, `file_rpp_rps`, `file_berita_acara`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`) VALUES
(2, 1, 2, 1, 'Holy fucking shit', 'sh!t', 'www.continue.com', 'd5fe8d730bf1eff9597eb07accf62561.pdf', 'fdc32d410310b02654b655bcd0315b2d.pdf', 'f63cfa3daf6dee5b5e26219aeb6731e7.pdf', '7ed053fd73af3f10db36a9034541a3e5.pdf', '836b8ba89eeda59112738b16ddfc3ea8.pdf', 'd56445148e20de625928d4a0eec69573.pdf', 'Manajemen', 'Meteorit', 'Bagas (19317321)'),
(4, 1, 1, 2, 'Straight to your fucking head', 'Slut', 'www.slight.com', 'c6681539daff0a048e333c17a75f487b.pdf', 'cc69d36c2d42f8dfa93675a6c5b159c6.pdf', 'd37d9ec10007d6cdfeacc1db3435fe0e.pdf', '7e8c06d65d6ecd1212dfe144f14c7256.pdf', '1142fcb41c00793af6933cf36d865346.pdf', NULL, 'Ekonomi', 'Geofisika', 'Andik (123928)'),
(5, 1, 1, 3, 'asddsadsad', 'asdasd', 'asdsadsadd', '1066a3b4abd485e66c8f3290b13f4926.pdf', 'f439d00992a30fac9fa58d1f98dda413.pdf', '7e0a2713c1f562bb2010f7a11c8de7b1.pdf', 'e36c6d7bf69cf3119dfea23bb7fac2b3.pdf', '8fd51f1ee0d4cd1de9ce39014328af9f.pdf', NULL, 'asdasdssa', 'adasdsd', 'asdadd');

-- --------------------------------------------------------

--
-- Table structure for table `lembar_pengesahan`
--

CREATE TABLE `lembar_pengesahan` (
  `id_lembar_pengesahan` int(11) NOT NULL,
  `file_lembar_pengesahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lembar_pengesahan`
--

INSERT INTO `lembar_pengesahan` (`id_lembar_pengesahan`, `file_lembar_pengesahan`) VALUES
(1, '118fffe5ad64571c2704b8b67d7513ed.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `log_book_penelitian`
--

CREATE TABLE `log_book_penelitian` (
  `id_log_book` int(11) NOT NULL,
  `id_penelitian` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_book_penelitian`
--

INSERT INTO `log_book_penelitian` (`id_log_book`, `id_penelitian`, `id`, `tgl_kegiatan`, `uraian_kegiatan`, `dokumentasi`) VALUES
(1, 44, 1, '1212-12-12', 'adsadjksdsjdhsadkjasdhaakjdhsjkdad', '254e1c19a8a65b3b8f7aaef05b557875.pdf'),
(2, 44, 1, '1928-02-08', 'asdjsadhajskdhsadkjasdhaskdahsdkj', '0250c4c81d012df4f892fab4197cb5d6.pdf'),
(3, 44, 1, '2918-12-08', 'ajsdhbsahjdasdhsdgajshdg', '553f8c08706568b894008ffda5327996.pdf'),
(4, 45, 14, '1829-08-31', 'hbkjgkjkhkjhkjhkjhkjhkjhjkhkjhjkhkjhkjhkjh', '228308668600d83662a01ffdeaead669.pdf'),
(5, 45, 14, '6757-06-05', 'hjhgjkhgjkhkjhkjhkjhjkhkjhkjhkjhkjhkjhkjhkjhjkhkjhkjhkjhkgghdfgdsfg', '1fbf628fee7ece1cbd25845344c85fe8.pdf'),
(6, 45, 14, '1232-12-31', 'sdasdasdsadlaskdjasdasjdaslkdjasdlaskjdaslkdja', '3dd4c6e6aa3e2ff32fb3f0b6af33b35c.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `log_book_pengabmas`
--

CREATE TABLE `log_book_pengabmas` (
  `id_log_book` int(11) NOT NULL,
  `id_pengabmas` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tgl_kegiatan` date NOT NULL,
  `uraian_kegiatan` text NOT NULL,
  `dokumentasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_book_pengabmas`
--

INSERT INTO `log_book_pengabmas` (`id_log_book`, `id_pengabmas`, `id`, `tgl_kegiatan`, `uraian_kegiatan`, `dokumentasi`) VALUES
(1, 5, 14, '3123-12-12', 'asdasdsldjadasjdasdlkadsalkdjas', 'f5310c1dd2d0c5088239b53d798c9df8.pdf'),
(2, 5, 14, '1221-12-23', 'adadsssadass', 'e69ecd7fe0b9cf0d8b027ced9be18cff.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `periode_pengajuan`
--

CREATE TABLE `periode_pengajuan` (
  `id_periode` int(11) NOT NULL,
  `tahun_periode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode_pengajuan`
--

INSERT INTO `periode_pengajuan` (`id_periode`, `tahun_periode`) VALUES
(1, 'Genap 2021'),
(2, 'Ganjil 2021'),
(4, 'Genap 2025');

-- --------------------------------------------------------

--
-- Table structure for table `pilih_jurnal_prosiding`
--

CREATE TABLE `pilih_jurnal_prosiding` (
  `id_jurnal_pros` int(11) NOT NULL,
  `nama_jurnal` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pilih_jurnal_prosiding`
--

INSERT INTO `pilih_jurnal_prosiding` (`id_jurnal_pros`, `nama_jurnal`) VALUES
(1, 'Jurnal Nasional Terakreditasi SINTA 1'),
(2, 'Jurnal Nasional Terakreditasi SINTA 2'),
(3, 'Jurnal Nasional Terakreditasi SINTA 3'),
(4, 'Jurnal Nasional Terakreditasi SINTA 4'),
(5, 'Jurnal Nasional Terakreditasi SINTA 5'),
(6, 'Jurnal Nasional Terakreditasi SINTA 6'),
(7, 'Jurnal Internasional Non Reputasi'),
(8, 'Jurnal Internasional Terindeks WOS'),
(9, 'Jurnal Internasional Terindeks Scopus Q1'),
(10, 'Jurnal Internasional Terindeks Scopus Q2'),
(11, 'Jurnal Internasional Terindeks Scopus Q3'),
(12, 'Jurnal Internasional Terindeks Scopus Q4'),
(13, 'Prosiding Nasional'),
(14, 'Prosiding Internasional Non Reputasi'),
(15, 'Prosiding Internasional Terindeks Scopus'),
(16, 'Prosiding Internasional Terindeks WOS');

-- --------------------------------------------------------

--
-- Table structure for table `pilih_scopus`
--

CREATE TABLE `pilih_scopus` (
  `id_scopus` int(11) NOT NULL,
  `nama_scopus` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pilih_scopus`
--

INSERT INTO `pilih_scopus` (`id_scopus`, `nama_scopus`) VALUES
(1, 'Jurnal Scopus Q1'),
(2, 'Jurnal Scopus Q2'),
(3, 'Jurnal Scopus Q3'),
(4, 'Jurnal Scopus Q4');

-- --------------------------------------------------------

--
-- Table structure for table `status_insentif`
--

CREATE TABLE `status_insentif` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_insentif`
--

INSERT INTO `status_insentif` (`id_status`, `status`) VALUES
(1, 'Disetujui'),
(2, 'Ditolak'),
(3, 'Sedang Diverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_penelitian_pengabdian`
--

CREATE TABLE `status_penelitian_pengabdian` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_penelitian_pengabdian`
--

INSERT INTO `status_penelitian_pengabdian` (`id_status`, `status`) VALUES
(1, 'Didanai'),
(2, 'Ditolak'),
(3, 'Sedang Direview');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penelitian`
--

CREATE TABLE `tbl_penelitian` (
  `id_penelitian` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `judul_penelitian` varchar(500) NOT NULL,
  `matkul_diampu` varchar(150) NOT NULL,
  `kelompok_riset` varchar(150) NOT NULL,
  `mhs_terlibat` varchar(100) NOT NULL,
  `mhs_terlibat2` varchar(100) NOT NULL,
  `target_jurnal` varchar(100) NOT NULL,
  `file_proposal` varchar(300) NOT NULL,
  `file_rps` varchar(300) NOT NULL,
  `form_integrasi` varchar(300) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tgl_submit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hasil_review` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `laporan_akhir` varchar(255) DEFAULT NULL,
  `tgl_upload_la` datetime DEFAULT NULL,
  `laporan_keuangan` varchar(255) DEFAULT NULL,
  `tgl_upload_lk` datetime DEFAULT NULL,
  `artikel_ilmiah` varchar(255) DEFAULT NULL,
  `tgl_upload_ai` datetime DEFAULT NULL,
  `url_artikel_ilmiah` varchar(255) DEFAULT NULL,
  `sertifikat_hki` varchar(255) DEFAULT NULL,
  `tgl_upload_sh` datetime DEFAULT NULL,
  `hasil_monev_internal` varchar(255) DEFAULT NULL,
  `berita_acara_inspub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penelitian`
--

INSERT INTO `tbl_penelitian` (`id_penelitian`, `id`, `id_periode`, `judul_penelitian`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `mhs_terlibat2`, `target_jurnal`, `file_proposal`, `file_rps`, `form_integrasi`, `id_status`, `tgl_submit`, `hasil_review`, `surat_tugas`, `laporan_akhir`, `tgl_upload_la`, `laporan_keuangan`, `tgl_upload_lk`, `artikel_ilmiah`, `tgl_upload_ai`, `url_artikel_ilmiah`, `sertifikat_hki`, `tgl_upload_sh`, `hasil_monev_internal`, `berita_acara_inspub`) VALUES
(24, 1, 1, 'Bangun Tanah Persegi', 'Jaringan', 'Surya Kencana', 'Ipip (12993922)', 'Dika (2123123)', 'example_1', 'fb559a1fc65ebbd26741a7d2b1568414.pdf', 'a0340b853a64cbd08b559871e9ca5a95.pdf', '3e7ab5e0eb0aeb8befd09777806da8ce.pdf', 3, '2021-09-02 12:11:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 1, 2, 'Fucking bitch motherfuckers', 'Jaringan', 'Surya 12', 'Tatit Mahendra (12391239)', 'Bagas (1238123)', 'example_2', '8c168c5066d87ce2a12a945503542068.pdf', '2bd1bb445b57f92abe95d3044c86e4c3.pdf', '6024f31752053500f751315c759b07bb.pdf', 1, '2021-09-10 11:40:52', '0b3d2fa79e1247b21b9a8c8d616dde28.pdf', '7323cf62b4be4f803407a3e89cc90cb2.pdf', '378f6ffcfe375b178d8cdeeae2bc5391.pdf', '2021-10-21 19:50:58', 'e49afec11b126505638c642100658df3.pdf', '2021-10-19 06:55:46', '75efb7d0c86fe434b80d1234f254e493.pdf', '2021-10-21 19:44:36', 'www.asdsdd.com', '0bb9d35edd23b2dd81ecae36082fb99e.pdf', '2021-10-21 19:54:04', NULL, NULL),
(45, 14, 2, 'Wilayah Nusantara Saat Ini', 'Manajemen', 'Jet Tempur', 'Bustanul (1237213)', 'Arifin (1238128)', 'Example_5', '5daf050cc1ca1aae860a856a98c7218f.pdf', '5623c3997707d958d3b53e5cf28b6ee8.pdf', 'e74344cf1fbd27972c6b8b301645acb3.pdf', 1, '2021-10-21 18:55:30', NULL, NULL, 'cbc7a47b8d7f40be1f16fc103eb471f7.pdf', '2021-10-21 19:17:56', '939463776db2e9ceb193947ebe2c2166.pdf', '2021-10-21 19:18:15', '0a9c18ecb61d44ffcabd8e6be04d672a.pdf', '2021-10-21 19:31:05', 'www.mustofa.com', '78be83f6c7d9fe87175988421d88ce5b.pdf', '2021-10-21 19:32:57', NULL, NULL),
(46, 14, 1, 'Alhamdulillahil qowiyyil sultonuh', 'Sipil', 'Cricket', 'Ciko (434354376)', 'Erick (434353453)', 'Example_6', '046f224fc7e5771d223b243428e797d8.pdf', 'a1d1ad463375fd5fc0d30e0fc1d9c10b.pdf', 'b73504498e2fc876a7300f93b483ec75.pdf', 3, '2021-10-21 19:01:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengabmas`
--

CREATE TABLE `tbl_pengabmas` (
  `id_pengabmas` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `judul_pengabmas` varchar(500) NOT NULL,
  `matkul_diampu` varchar(150) NOT NULL,
  `kelompok_riset` varchar(150) NOT NULL,
  `mhs_terlibat` varchar(100) NOT NULL,
  `file_proposal` varchar(300) NOT NULL,
  `file_rps` varchar(300) NOT NULL,
  `form_integrasi` varchar(300) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tgl_submit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hasil_review` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `laporan_akhir` varchar(255) DEFAULT NULL,
  `tgl_upload_la` datetime DEFAULT NULL,
  `laporan_keuangan` varchar(255) DEFAULT NULL,
  `tgl_upload_lk` datetime DEFAULT NULL,
  `artikel_ilmiah` varchar(255) DEFAULT NULL,
  `tgl_upload_ai` datetime DEFAULT NULL,
  `url_artikel_ilmiah` varchar(255) DEFAULT NULL,
  `sertifikat_hki` varchar(255) DEFAULT NULL,
  `tgl_upload_sh` datetime DEFAULT NULL,
  `hasil_monev_internal` varchar(255) DEFAULT NULL,
  `berita_acara_inspub` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengabmas`
--

INSERT INTO `tbl_pengabmas` (`id_pengabmas`, `id`, `id_periode`, `judul_pengabmas`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `file_proposal`, `file_rps`, `form_integrasi`, `id_status`, `tgl_submit`, `hasil_review`, `surat_tugas`, `laporan_akhir`, `tgl_upload_la`, `laporan_keuangan`, `tgl_upload_lk`, `artikel_ilmiah`, `tgl_upload_ai`, `url_artikel_ilmiah`, `sertifikat_hki`, `tgl_upload_sh`, `hasil_monev_internal`, `berita_acara_inspub`) VALUES
(2, 1, 2, 'Mengabdi kepada para penghuni', 'Manajemen', 'Masykulin', 'Bagas (19317321)', '15ab7a6f477320baf38551802e4ce8ce.pdf', '890051a3a2f70dcb5dfeca438a91a3c1.pdf', '72a6196073d80e1f617135b66159bd30.pdf', 3, '2021-08-03 20:46:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(3, 1, 1, 'Sultan Nih Bos', 'Jaringan', 'Efek', 'Andik (1233139)', '3d3a534ec9c0dae4b8aafe0c634bc55e.pdf', '6ec6320834d0114d35bb38d838418624.pdf', '0f58c2c436795db24037011913d79378.pdf', 1, '2021-08-03 20:49:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(5, 14, 2, 'Black magic dark water', 'Sastra', 'Haleluya', 'Fauzi (22727872)', '06059adc89bdee7cb5780a237cefb915.pdf', 'eb62991220f9e57d55a962d5d3c72422.pdf', 'c9f391f878fdfe7b14394eab4103115a.pdf', 1, '2021-10-22 21:15:57', NULL, NULL, '1cc343620c9ee54b2e8cb2a885415e42.pdf', '2021-10-23 00:26:33', '29a30b05c972658491cf097e55ad2b30.pdf', '2021-10-23 00:26:39', '82060ce8dc28e74bae2ed974f6829537.pdf', '2021-10-23 00:26:44', 'www.fauzi.com', '7eb6cd792d192ab7911952b1a4ac131e.pdf', '2021-10-23 00:27:04', '', NULL),
(6, 14, 1, 'Satria Nusantara', 'Biologi', 'Strata', 'Jhon (124124124)', '533a01356a286fc9c584db4dc2afeadf.pdf', 'b2ae98c25203293723c2e5fdcff68783.pdf', '4f3207a36e3f80698a688af18a71fc1e.pdf', 3, '2021-10-23 06:27:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nidn` int(80) NOT NULL,
  `id_sinta` int(80) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(300) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `program_studi` text NOT NULL,
  `fakultas` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(15) NOT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nidn`, `id_sinta`, `username`, `name`, `email`, `password`, `image`, `jk`, `program_studi`, `fakultas`, `alamat`, `no_hp`, `id_role`, `created_at`) VALUES
(1, 2147483, 1931701, 'dikaipip', 'Mahardika Ipip', 'dikaipip@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2de211e8-60c8-4d59-9b50-a6e6b87c587a.jpg', 'L', 'Matematika', 'Teknik', 'jygjggjgyg', 822913422, 1, '2021-07-02 03:12:11'),
(2, 123231222, 1232112, 'erickkirek', 'Erick Kusuma W', 'erickkirek@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'erickkirek1.jpg', 'L', 'Teknik Sipil', 'Teknik', 'Gondanglegi', 2147483647, 2, NULL),
(14, 123456782, 123456, 'ivanzaqqa', 'Ivan Zaqqa', 'jausdla@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'download.jpeg', 'L', 'Akuntan', 'Teknik', 'Desa Prambon', 2147483647, 1, NULL),
(17, 9798798, 980980, 'satrioutomo', 'Satrio Utomo', 'satrioutomo@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'L', 'Manajemen', 'Ekonomi', 'Prambon', 2147483647, 1, NULL),
(29, 98123493, 1924029, 'bgsrmdhni', 'Bagas Ramadhani', 'bagasramadhani@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'f64cbd54-782b-4f71-9b19-dc2142c2acfb.jpg', 'L', 'Fisika', 'IPA', 'Kayen Kidul', 827172837, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Dosen'),
(2, 'Operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insentif_jurpros`
--
ALTER TABLE `insentif_jurpros`
  ADD PRIMARY KEY (`id_insentif_jurpros`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id` (`id`),
  ADD KEY `id_jurnal_pros` (`id_jurnal_pros`);

--
-- Indexes for table `insentif_specscop`
--
ALTER TABLE `insentif_specscop`
  ADD PRIMARY KEY (`id_insentif_scopus`),
  ADD KEY `id_jurnal_pros` (`id_scopus`),
  ADD KEY `id_users` (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `lembar_pengesahan`
--
ALTER TABLE `lembar_pengesahan`
  ADD PRIMARY KEY (`id_lembar_pengesahan`);

--
-- Indexes for table `log_book_penelitian`
--
ALTER TABLE `log_book_penelitian`
  ADD PRIMARY KEY (`id_log_book`),
  ADD KEY `id` (`id`),
  ADD KEY `id_penelitian` (`id_penelitian`);

--
-- Indexes for table `log_book_pengabmas`
--
ALTER TABLE `log_book_pengabmas`
  ADD PRIMARY KEY (`id_log_book`),
  ADD KEY `id_pengabmas` (`id_pengabmas`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `pilih_jurnal_prosiding`
--
ALTER TABLE `pilih_jurnal_prosiding`
  ADD PRIMARY KEY (`id_jurnal_pros`);

--
-- Indexes for table `pilih_scopus`
--
ALTER TABLE `pilih_scopus`
  ADD PRIMARY KEY (`id_scopus`),
  ADD KEY `nama` (`nama_scopus`);

--
-- Indexes for table `status_insentif`
--
ALTER TABLE `status_insentif`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `status_penelitian_pengabdian`
--
ALTER TABLE `status_penelitian_pengabdian`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  ADD PRIMARY KEY (`id_penelitian`),
  ADD KEY `id` (`id`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  ADD PRIMARY KEY (`id_pengabmas`),
  ADD KEY `id` (`id`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`),
  ADD UNIQUE KEY `id_sinta` (`id_sinta`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insentif_jurpros`
--
ALTER TABLE `insentif_jurpros`
  MODIFY `id_insentif_jurpros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `insentif_specscop`
--
ALTER TABLE `insentif_specscop`
  MODIFY `id_insentif_scopus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lembar_pengesahan`
--
ALTER TABLE `lembar_pengesahan`
  MODIFY `id_lembar_pengesahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_book_penelitian`
--
ALTER TABLE `log_book_penelitian`
  MODIFY `id_log_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_book_pengabmas`
--
ALTER TABLE `log_book_pengabmas`
  MODIFY `id_log_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pilih_jurnal_prosiding`
--
ALTER TABLE `pilih_jurnal_prosiding`
  MODIFY `id_jurnal_pros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pilih_scopus`
--
ALTER TABLE `pilih_scopus`
  MODIFY `id_scopus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_insentif`
--
ALTER TABLE `status_insentif`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_penelitian_pengabdian`
--
ALTER TABLE `status_penelitian_pengabdian`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  MODIFY `id_pengabmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `insentif_jurpros`
--
ALTER TABLE `insentif_jurpros`
  ADD CONSTRAINT `insentif_jurpros_ibfk_4` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `insentif_jurpros_ibfk_6` FOREIGN KEY (`id_status`) REFERENCES `status_insentif` (`id_status`),
  ADD CONSTRAINT `insentif_jurpros_ibfk_7` FOREIGN KEY (`id_jurnal_pros`) REFERENCES `pilih_jurnal_prosiding` (`id_jurnal_pros`);

--
-- Constraints for table `insentif_specscop`
--
ALTER TABLE `insentif_specscop`
  ADD CONSTRAINT `insentif_specscop_ibfk_1` FOREIGN KEY (`id_scopus`) REFERENCES `pilih_scopus` (`id_scopus`),
  ADD CONSTRAINT `insentif_specscop_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `insentif_specscop_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_insentif` (`id_status`);

--
-- Constraints for table `log_book_penelitian`
--
ALTER TABLE `log_book_penelitian`
  ADD CONSTRAINT `log_book_penelitian_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `tbl_penelitian` (`id_penelitian`);

--
-- Constraints for table `log_book_pengabmas`
--
ALTER TABLE `log_book_pengabmas`
  ADD CONSTRAINT `log_book_pengabmas_ibfk_1` FOREIGN KEY (`id_pengabmas`) REFERENCES `tbl_pengabmas` (`id_pengabmas`);

--
-- Constraints for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  ADD CONSTRAINT `tbl_penelitian_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tbl_penelitian_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode_pengajuan` (`id_periode`),
  ADD CONSTRAINT `tbl_penelitian_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_penelitian_pengabdian` (`id_status`);

--
-- Constraints for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  ADD CONSTRAINT `tbl_pengabmas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tbl_pengabmas_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode_pengajuan` (`id_periode`),
  ADD CONSTRAINT `tbl_pengabmas_ibfk_3` FOREIGN KEY (`id_status`) REFERENCES `status_penelitian_pengabdian` (`id_status`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
