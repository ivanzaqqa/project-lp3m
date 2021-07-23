-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 06:48 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project-lp3m`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsip_penelitian`
--

CREATE TABLE `arsip_penelitian` (
  `id_arsip` int(11) NOT NULL,
  `id_penelitian` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `tgl_submit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_penelitian`
--

INSERT INTO `tbl_penelitian` (`id_penelitian`, `id`, `id_periode`, `judul_penelitian`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `file_proposal`, `file_rps`, `form_integrasi`, `tgl_submit`) VALUES
(14, 1, 2, 'coba', 'coba', 'coba', 'coba', '00af423068ce9563b6641434b0d63338.pdf', '766120a91c48e06cf3c82dbd20f22a21.pdf', '3d56fdb0d301443a6ae1abe2c7997423.pdf', '2021-07-20'),
(15, 1, 1, 'data 1', 'data 1', 'data 1', 'data 1', 'c5e1ec268bb8d6ff9387b07643d3e19b.pdf', 'be03204432400f88cb7b347389792174.pdf', '1e9f53627d1687f5305a292fe34814cc.pdf', '2021-07-20');

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
  `tgl_submit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pengabmas`
--

INSERT INTO `tbl_pengabmas` (`id_pengabmas`, `id`, `id_periode`, `judul_pengabmas`, `matkul_diampu`, `kelompok_riset`, `mhs_terlibat`, `file_proposal`, `file_rps`, `form_integrasi`, `tgl_submit`) VALUES
(1, 1, 2, 'coba 2', 'coba 2', 'coba 2', 'coba 2', '92509eb4cea53179bc5c13f8416c8b45.pdf', '88c8deff2874662ae4b2fb33d701a57f.pdf', '8fa9448fbebcce0ccb5e6e90d6e5b8f6.pdf', '2021-07-20');

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
(1, 1931701, 1931701, 'dikaipip', 'Mahardika Ipip', 'dikaipip@gmail.com', '$2y$10$yqEXnWrDnUhwNz/2Z5gS/ukXnbwDsiuUjnw0.YozoVgKE7tvS3saO', 'dikaipip.jpg', 'L', 'Teknik Sipil', 'Teknik', 'desa grandong', 822913422, 2, '2021-07-02 03:12:11');

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
-- Indexes for table `arsip_penelitian`
--
ALTER TABLE `arsip_penelitian`
  ADD PRIMARY KEY (`id_arsip`),
  ADD UNIQUE KEY `id_penelitian` (`id_penelitian`),
  ADD UNIQUE KEY `id_status` (`id_status`);

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
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  ADD PRIMARY KEY (`id_pengabmas`),
  ADD KEY `id` (`id`),
  ADD KEY `id_periode` (`id_periode`);

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
-- AUTO_INCREMENT for table `arsip_penelitian`
--
ALTER TABLE `arsip_penelitian`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_penelitian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_pengabmas`
--
ALTER TABLE `tbl_pengabmas`
  MODIFY `id_pengabmas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arsip_penelitian`
--
ALTER TABLE `arsip_penelitian`
  ADD CONSTRAINT `arsip_penelitian_ibfk_1` FOREIGN KEY (`id_penelitian`) REFERENCES `penelitian` (`id_penelititan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `arsip_penelitian_ibfk_2` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`);

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
