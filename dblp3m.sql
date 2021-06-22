-- MySQL dump 10.13  Distrib 5.7.32, for osx10.15 (x86_64)
--
-- Host: localhost    Database: lp3m_unik
-- ------------------------------------------------------
-- Server version	5.7.32

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
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nidn_dosen` int(100) NOT NULL,
  `idsinta_dosen` int(100) NOT NULL,
  `nama_dosen` text NOT NULL,
  `email_dosen` text NOT NULL,
  `password_dosen` text NOT NULL,
  `jk_dosen` enum('L','P') NOT NULL,
  `programstudi_dosen` text NOT NULL,
  `fakultas_dosen` text NOT NULL,
  `alamat_dosen` text NOT NULL,
  `nohp_dosen` int(15) NOT NULL,
  PRIMARY KEY (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
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
-- Table structure for table `operator`
--

DROP TABLE IF EXISTS `operator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL AUTO_INCREMENT,
  `nama_operator` text NOT NULL,
  `email_operator` text NOT NULL,
  `password_operator` text NOT NULL,
  `id_dosen` int(11) NOT NULL,
  PRIMARY KEY (`id_operator`),
  KEY `id_dosen` (`id_dosen`),
  CONSTRAINT `operator_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `operator`
--

LOCK TABLES `operator` WRITE;
/*!40000 ALTER TABLE `operator` DISABLE KEYS */;
/*!40000 ALTER TABLE `operator` ENABLE KEYS */;
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-22 11:13:49
