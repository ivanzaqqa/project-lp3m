-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 05, 2021 at 05:37 AM
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
(3, 'Sedang Proses Review');

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
(16, 1, 1, 'Bangun Tanah Persegi', 'Sipil', 'Surya Kencana', 'Tatit (192829)', '578eecb8aaa426d38179ff80f66c64df.pdf', '06a86a3f55657d1cbacb8a15f1f402ab.pdf', '1e27c13dc6994e137aefb6490e71d75d.pdf', 3, '2021-08-03 18:14:13'),
(17, 1, 1, 'sdasdd', 'asdsada', 'asdsad', 'asdasd', '362b3e9fccc281c2b911c8dfb83f69c2.pdf', '6e8757d22f57ec663cc89cc6ab312358.pdf', 'e14671d24ffa5feb67feb7d1eeac422d.pdf', 3, '2021-08-03 18:33:02');

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
(2, 1, 2, 'Mengabdi kepada para penghuni', 'Manajemen', 'Masykulin', 'Bagas (19317321)', '15ab7a6f477320baf38551802e4ce8ce.pdf', '890051a3a2f70dcb5dfeca438a91a3c1.pdf', '72a6196073d80e1f617135b66159bd30.pdf', 2, '2021-08-03 20:46:10'),
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
(1, 1931701, 1931701, 'dikaipip', 'Mahardika Ipip', 'dikaipip@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dikaipip.jpg', 'L', 'Teknik Sipil', 'Teknik', 'desa sumberejo', 822913422, 1, '2021-07-02 03:12:11'),
(2, 12323, 12321, 'erickkirek', 'Erick Kusuma W', 'erickkirek@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'erickkirek1.jpg', 'L', 'Teknik Sipil', 'Teknik', 'Gondanglegi', 2147483647, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dosen'),
(2, 'Operator');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `is_active`) VALUES
(1, 1, 'Dosen', 'dosen', 1),
(2, 2, 'Operator', 'operator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  ADD PRIMARY KEY (`id_periode`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
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
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `periode_pengajuan`
--
ALTER TABLE `periode_pengajuan`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_penelitian`
--
ALTER TABLE `tbl_penelitian`
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  MODIFY `id_pengabmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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

--
-- Constraints for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD CONSTRAINT `user_access_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id_role`),
  ADD CONSTRAINT `user_access_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `users` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
