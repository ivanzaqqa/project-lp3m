-- MySQL dump 10.13  Distrib 5.7.34, for osx10.16 (x86_64)
--
-- Host: localhost    Database: lp3m_unik
-- ------------------------------------------------------
-- Server version	5.7.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `arsip`
--

DROP TABLE IF EXISTS `arsip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL,
  `judul_arsip` text NOT NULL,
  `jenispenelitian_arsip` text NOT NULL,
  `tgl_arsip` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `arsip`
--

LOCK TABLES `arsip` WRITE;
/*!40000 ALTER TABLE `arsip` DISABLE KEYS */;
/*!40000 ALTER TABLE `arsip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nidn` int(80) NOT NULL,
  `id_sinta` int(80) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `program_studi` text NOT NULL,
  `fakultas` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(15) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nidn` (`nidn`),
  UNIQUE KEY `id_sinta` (`id_sinta`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES (1,1931701,1931701,'dikaipip','Mahardika Ipip','dikaipip@gmail.com','$2y$10$yqEXnWrDnUhwNz/2Z5gS/ukXnbwDsiuUjnw0.YozoVgKE7tvS3saO','L','Teknik Sipil','Teknik','desa grandong',822913422,1,1,'2021-07-02 03:12:11'),(2,1931702,1931702,'erickkirek','Erick Kirek','erickkirek@gmail.com','$2y$10$yqEXnWrDnUhwNz/2Z5gS/ukXnbwDsiuUjnw0.YozoVgKE7tvS3saO','L','Farmasi Perawat','Farmasi','desa mbedoyo',81231923,2,1,'2021-07-02 04:51:22');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hibah_penelitian_internal`
--

DROP TABLE IF EXISTS `hibah_penelitian_internal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hibah_penelitian_internal` (
  `id_hpi` int(11) NOT NULL,
  `judulpenelitian_hpi` text NOT NULL,
  `kelompokriset_hpi` text NOT NULL,
  `matakuliah_hpi` text NOT NULL,
  PRIMARY KEY (`id_hpi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hibah_penelitian_internal`
--

LOCK TABLES `hibah_penelitian_internal` WRITE;
/*!40000 ALTER TABLE `hibah_penelitian_internal` DISABLE KEYS */;
/*!40000 ALTER TABLE `hibah_penelitian_internal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hibah_penelitian_scopus`
--

DROP TABLE IF EXISTS `hibah_penelitian_scopus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hibah_penelitian_scopus` (
  `id_hps` int(11) NOT NULL,
  `judulpenelitian_hps` text NOT NULL,
  `kelompokriset_hps` text NOT NULL,
  `matakuliah_hps` text NOT NULL,
  PRIMARY KEY (`id_hps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hibah_penelitian_scopus`
--

LOCK TABLES `hibah_penelitian_scopus` WRITE;
/*!40000 ALTER TABLE `hibah_penelitian_scopus` DISABLE KEYS */;
/*!40000 ALTER TABLE `hibah_penelitian_scopus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengabdian_masyarakat_internal`
--

DROP TABLE IF EXISTS `pengabdian_masyarakat_internal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengabdian_masyarakat_internal` (
  `id_pmi` int(11) NOT NULL,
  `judulpenelitian_pmi` text NOT NULL,
  `kelompokriset_pmi` text NOT NULL,
  `matakuliah_pmi` text NOT NULL,
  PRIMARY KEY (`id_pmi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengabdian_masyarakat_internal`
--

LOCK TABLES `pengabdian_masyarakat_internal` WRITE;
/*!40000 ALTER TABLE `pengabdian_masyarakat_internal` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengabdian_masyarakat_internal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengabdian_masyarakat_scopus`
--

DROP TABLE IF EXISTS `pengabdian_masyarakat_scopus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengabdian_masyarakat_scopus` (
  `id_pms` int(11) NOT NULL,
  `judulpenelitian_pms` text NOT NULL,
  `kelompokriset_pmi` text NOT NULL,
  `matakuliah_pmi` text NOT NULL,
  PRIMARY KEY (`id_pms`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengabdian_masyarakat_scopus`
--

LOCK TABLES `pengabdian_masyarakat_scopus` WRITE;
/*!40000 ALTER TABLE `pengabdian_masyarakat_scopus` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengabdian_masyarakat_scopus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Dosen'),(2,'Operator');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-03  5:26:18
