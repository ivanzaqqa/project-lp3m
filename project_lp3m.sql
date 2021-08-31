-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2021 at 06:29 AM
-- Server version: 5.7.35
-- PHP Version: 7.3.29

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
(13, 1, 11, 3, 'Holy fucking shit', 'www.fvck.com', 'b78ddfa31b19ab1b8f6fa2c17ef4056f.pdf', NULL),
(14, 1, 11, 3, 'Holy fucking shit', 'www.fvck.com', 'c66a62f87b2c17c373d818df5a1beff7.pdf', NULL);

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
(2, 1, 4, 3, 'Holy fucking shit', 'sh!t', 'www.continue.com', 'd5fe8d730bf1eff9597eb07accf62561.pdf', 'fdc32d410310b02654b655bcd0315b2d.pdf', 'f63cfa3daf6dee5b5e26219aeb6731e7.pdf', '7ed053fd73af3f10db36a9034541a3e5.pdf', '836b8ba89eeda59112738b16ddfc3ea8.pdf', NULL, 'Manajemen', 'Meteorit', 'Bagas (19317321)'),
(3, 1, 2, 3, 'Steps to your head', 'Thanks', 'www.thanks.com', '7d5e045e5fb8311c1ae5636fef9182cd.pdf', '19b58a927323d3742365a5c733f4f524.pdf', '3d4d2eaa1aa5c6a376a38a5fa3202ea3.pdf', '099f3297bbf6315d3e806ceeb60ef8a9.pdf', '87e98672804831fa22680ed7a58121ee.pdf', NULL, 'Teknologi', 'Straight', 'Hihihi (192912931)');

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
(2, 'Ganjil 2021');

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
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Didanai'),
(2, 'Ditolak'),
(3, 'Sedang Direview');

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
  `file_proposal` varchar(300) NOT NULL,
  `file_rps` varchar(300) NOT NULL,
  `form_integrasi` varchar(300) NOT NULL,
  `id_status` int(11) NOT NULL,
  `tgl_submit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penelitian`
--

INSERT INTO `tbl_penelitian` (`id_penelitian`, `id`, `id_periode`, `judul_penelitian`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `file_proposal`, `file_rps`, `form_integrasi`, `id_status`, `tgl_submit`) VALUES
(22, 1, 1, 'Santunan Anak Yatim Piatu', 'Manajemen', 'Masykulin', 'Bagas (19317321)', '39802f280ee5b6d1f0504ffc4a4c8838.pdf', 'fba11ad9785d0237e3af3521f46b522c.pdf', 'fba11ad9785d0237e3af3521f46b522c.pdf', 3, '2021-08-25 20:38:42'),
(23, 1, 2, 'Bangun Tanah Persegi', 'Jaringan', 'Surya Kencana', 'Andik (1233139)', '', 'f9559738ee27234b54fc5ba809ade09c.pdf', '49ef274eeaf61bbf4b998cb208ad5e38.pdf', 3, '2021-08-25 20:44:07');

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
  `tgl_submit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengabmas`
--

INSERT INTO `tbl_pengabmas` (`id_pengabmas`, `id`, `id_periode`, `judul_pengabmas`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `file_proposal`, `file_rps`, `form_integrasi`, `id_status`, `tgl_submit`) VALUES
(2, 1, 2, 'Mengabdi kepada para penghuni', 'Manajemen', 'Masykulin', 'Bagas (19317321)', '15ab7a6f477320baf38551802e4ce8ce.pdf', '890051a3a2f70dcb5dfeca438a91a3c1.pdf', '72a6196073d80e1f617135b66159bd30.pdf', 3, '2021-08-03 20:46:10'),
(3, 1, 1, 'Sultan Nih Bos', 'Jaringan', 'Efek', 'Andik (1233139)', '3d3a534ec9c0dae4b8aafe0c634bc55e.pdf', '6ec6320834d0114d35bb38d838418624.pdf', '0f58c2c436795db24037011913d79378.pdf', 3, '2021-08-03 20:49:39');

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
(14, 123456782, 123456, 'ivanzaqqa', 'Ivan Zaqqa', 'jausdla@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '', 'L', 'Akuntan', 'Teknik', 'Desa Tegaron', 2147483647, 1, NULL),
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
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_insentif`
--
ALTER TABLE `status_insentif`
  ADD PRIMARY KEY (`id_status`),
  ADD KEY `status` (`status`);

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
  MODIFY `id_insentif_jurpros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `insentif_specscop`
--
ALTER TABLE `insentif_specscop`
  MODIFY `id_insentif_scopus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_insentif`
--
ALTER TABLE `status_insentif`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  MODIFY `id_pengabmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  ADD CONSTRAINT `tbl_penelitian_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tbl_penelitian_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode_pengajuan` (`id_periode`);

--
-- Constraints for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  ADD CONSTRAINT `tbl_pengabmas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tbl_pengabmas_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode_pengajuan` (`id_periode`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;