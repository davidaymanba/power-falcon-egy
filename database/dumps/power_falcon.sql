-- MySQL dump 10.13  Distrib 9.6.0, for macos26.3 (arm64)
--
-- Host: 127.0.0.1    Database: power_falcon
-- ------------------------------------------------------
-- Server version	9.6.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

USE `u440831378_powerfalcon`;

--
-- GTID state at the beginning of the backup 
--

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'لوحات التحويل الآلي','Ats Panels','ats-panels','2026-05-12 20:35:55','2026-05-12 20:35:55'),(2,'منظمات الجهد','A V Rs','avrs','2026-05-12 20:35:55','2026-05-12 20:35:55'),(3,'شواحن البطاريات','Battery Chargers','battery-chargers','2026-05-12 20:35:55','2026-05-12 20:35:55'),(4,'كاتربيلر وبيركنز','Cat & Perkins','cat-perkins','2026-05-12 20:35:55','2026-05-12 20:35:55'),(5,'كمينز','C U M M I N S','cummins','2026-05-12 20:35:55','2026-05-12 20:35:55'),(6,'سولينويد','Solenoid','solenoid','2026-05-12 20:35:55','2026-05-12 20:35:55'),(7,'عدادات وحساسات','Gauges And Sensors','gauges-and-sensors','2026-05-12 20:35:55','2026-05-12 20:35:55'),(8,'تحكم السرعة وتوزيع الأحمال','Speed Control And Loadsharing','speed-control-and-loadsharing','2026-05-12 20:35:55','2026-05-12 20:35:55');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_12_112152_create_categories_table',1),(5,'2026_05_12_112152_create_contact_messages_table',1),(6,'2026_05_12_112152_create_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci,
  `description_en` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'ATS Panels with motorized changeover circuit breakers ABB and meccalte controller','ATS Panels with motorized changeover circuit breakers ABB and meccalte controller','catalog/products/ATS Panels/ATS Panels with motorized changeover circuit breakers ABB and meccalte controller.jpg',1,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(2,'AS440','AS440','catalog/products/AVRs/AS440.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(3,'AS480','AS480','catalog/products/AVRs/AS480.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(4,'AS540','AS540','catalog/products/AVRs/AS540.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(5,'Basler AVC63-4','Basler AVC63-4','catalog/products/AVRs/Basler AVC63-4.jpg',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(6,'CAT VR6','CAT VR6','catalog/products/AVRs/CAT VR6.png',2,'تيست','test','2026-05-12 20:35:55','2026-05-14 17:27:48'),(7,'DVR2000E-MARATHON-AUTOMATIC-VOLTAGE-REGULATOR','DVR2000E-MARATHON-AUTOMATIC-VOLTAGE-REGULATOR','catalog/products/AVRs/DVR2000E-MARATHON-AUTOMATIC-VOLTAGE-REGULATOR.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(8,'EA05','EA05','catalog/products/AVRs/EA05.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(9,'EA15A','EA15A','catalog/products/AVRs/EA15A.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(10,'EA16','EA16','catalog/products/AVRs/EA16.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(11,'GAVR 15A','GAVR 15A','catalog/products/AVRs/GAVR 15A.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(12,'GAVR-20A','GAVR-20A','catalog/products/AVRs/GAVR-20A.jpg',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(13,'GAVR-8A','GAVR-8A','catalog/products/AVRs/GAVR-8A.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(14,'GAVR12A','GAVR12A','catalog/products/AVRs/GAVR12A.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(15,'LEROY SOMER R230','LEROY SOMER R230','catalog/products/AVRs/LEROY SOMER R230.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(16,'LEROY SOMER R450','LEROY SOMER R450','catalog/products/AVRs/LEROY SOMER R450.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(17,'LEROY-SOMER-AVR-R222','LEROY-SOMER-AVR-R222','catalog/products/AVRs/LEROY-SOMER-AVR-R222.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(18,'LEROY-SOMER-R150','LEROY-SOMER-R150','catalog/products/AVRs/LEROY-SOMER-R150.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(19,'LEROY-SOMER-R250','LEROY-SOMER-R250','catalog/products/AVRs/LEROY-SOMER-R250.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(20,'LEROY-SOMER-R438','LEROY-SOMER-R438','catalog/products/AVRs/LEROY-SOMER-R438.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(21,'LEROY-SOMER-R448','LEROY-SOMER-R448','catalog/products/AVRs/LEROY-SOMER-R448.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(22,'Leroy Somer AVR R180','Leroy Somer AVR R180','catalog/products/AVRs/Leroy Somer AVR R180.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(23,'Leroy Somer AVR R220','Leroy Somer AVR R220','catalog/products/AVRs/Leroy Somer AVR R220.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(24,'MX321','MX321','catalog/products/AVRs/MX321.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(25,'MX341','MX341','catalog/products/AVRs/MX341.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(26,'MX450','MX450','catalog/products/AVRs/MX450.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(27,'Marelli M40FA640A','Marelli M40FA640A','catalog/products/AVRs/Marelli M40FA640A.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(28,'Marelli-M16FA655A','Marelli-M16FA655A','catalog/products/AVRs/Marelli-M16FA655A.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(29,'SE350','SE350','catalog/products/AVRs/SE350.webp',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(30,'SX440','SX440','catalog/products/AVRs/SX440.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(31,'SX460','SX460','catalog/products/AVRs/SX460.png',2,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(32,'F charger ','F charger ','catalog/products/Battery chargers/F charger .png',3,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(33,'SmartCharge 10A','SmartCharge 10A','catalog/products/Battery chargers/SmartCharge 10A.jpg',3,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(34,'high current SmartCharge','high current SmartCharge','catalog/products/Battery chargers/high current SmartCharge.jpg',3,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(35,'sCharge','sCharge','catalog/products/Battery chargers/sCharge.jpg',3,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(36,'uCharge','uCharge','catalog/products/Battery chargers/uCharge.jpg',3,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(37,'1R-0749 CAT fuel Filter','1R-0749 CAT fuel Filter','catalog/products/CAT & PERKINS/1R-0749 CAT fuel Filter.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(38,'1R-0762 Fuel filter','1R-0762 Fuel filter','catalog/products/CAT & PERKINS/1R-0762 Fuel filter.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(39,'2168684 oil sensor','2168684 oil sensor','catalog/products/CAT & PERKINS/2168684 oil sensor.avif',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(40,'CAT DC alternator','CAT DC alternator','catalog/products/CAT & PERKINS/CAT DC alternator.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(41,'CAT Fuel filter 1R-0755','CAT Fuel filter 1R-0755','catalog/products/CAT & PERKINS/CAT Fuel filter 1R-0755.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(42,'CAT Fuel filter 1R-1712','CAT Fuel filter 1R-1712','catalog/products/CAT & PERKINS/CAT Fuel filter 1R-1712.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(43,'CAT Fuel water separator 326-1641','CAT Fuel water separator 326-1641','catalog/products/CAT & PERKINS/CAT Fuel water separator 326-1641.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(44,'CAT MX sensor GP 224-4536','CAT MX sensor GP 224-4536','catalog/products/CAT & PERKINS/CAT MX sensor GP 224-4536.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(45,'CAT MX sensor GP-PR 194-6723','CAT MX sensor GP-PR 194-6723','catalog/products/CAT & PERKINS/CAT MX sensor GP-PR 194-6723.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(46,'CAT MX sensor GP-PR 194-6725','CAT MX sensor GP-PR 194-6725','catalog/products/CAT & PERKINS/CAT MX sensor GP-PR 194-6725.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(47,'CAT Temp sensor 264-4297','CAT Temp sensor 264-4297','catalog/products/CAT & PERKINS/CAT Temp sensor 264-4297.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(48,'CAT fuel rack position sensor','CAT fuel rack position sensor','catalog/products/CAT & PERKINS/CAT fuel rack position sensor.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(49,'CAT oil filter 1R-1808','CAT oil filter 1R-1808','catalog/products/CAT & PERKINS/CAT oil filter 1R-1808.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(50,'CAT sensor G-SPD 191-8303','CAT sensor G-SPD 191-8303','catalog/products/CAT & PERKINS/CAT sensor G-SPD 191-8303.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(51,'CAT water temp sensor 102-0050','CAT water temp sensor 102-0050','catalog/products/CAT & PERKINS/CAT water temp sensor 102-0050.avif',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(52,'CAT1R-1808 Engine Oil Filter','CAT1R-1808 Engine Oil Filter','catalog/products/CAT & PERKINS/CAT1R-1808 Engine Oil Filter.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(53,'Caterpillar_1R-0716_Oil_Filter','Caterpillar_1R-0716_Oil_Filter','catalog/products/CAT & PERKINS/Caterpillar_1R-0716_Oil_Filter.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(54,'DSE702','DSE702','catalog/products/CAT & PERKINS/DSE702.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(55,'Engine interface 12 or 24 VDC','Engine interface 12 or 24 VDC','catalog/products/CAT & PERKINS/Engine interface 12 or 24 VDC.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(56,'Engine interface 650-091 650-092','Engine interface 650-091 650-092','catalog/products/CAT & PERKINS/Engine interface 650-091 650-092.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(57,'FG-WILSON-PCB-650-044 or 650-045','FG-WILSON-PCB-650-044 or 650-045','catalog/products/CAT & PERKINS/FG-WILSON-PCB-650-044 or 650-045.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(58,'POWER WIZARD 1.0','POWER WIZARD 1.0','catalog/products/CAT & PERKINS/POWER WIZARD 1.0.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(59,'PWM','PWM','catalog/products/CAT & PERKINS/PWM.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(60,'Perkins Governor Kit  T435966','Perkins Governor Kit  T435966','catalog/products/CAT & PERKINS/Perkins Governor Kit  T435966.jpg',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(61,'original CAT fault module 130-3349-04','original CAT fault module 130-3349-04','catalog/products/CAT & PERKINS/original CAT fault module 130-3349-04.webp',4,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(62,'3053065 NEW Electrical control panel','3053065 NEW Electrical control panel','catalog/products/CUMMINS/3053065 NEW Electrical control panel.webp',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(63,'4903489 coolant lvl sensor','4903489 coolant lvl sensor','catalog/products/CUMMINS/4903489 coolant lvl sensor.jpg',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(64,'ECU CM850','ECU CM850','catalog/products/CUMMINS/ECU CM850.jpg',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(65,'HMI320','HMI320','catalog/products/CUMMINS/HMI320.png',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(66,'cummins New CM570 ECU','cummins New CM570 ECU','catalog/products/CUMMINS/cummins New CM570 ECU.avif',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(67,'cummins actuator low flow NC 3408324','cummins actuator low flow NC 3408324','catalog/products/CUMMINS/cummins actuator low flow NC 3408324.jpg',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(68,'cummins camshaft 4921599','cummins camshaft 4921599','catalog/products/CUMMINS/cummins camshaft 4921599.jpg',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(69,'electric Fuel Pump 24V 4975617','electric Fuel Pump 24V 4975617','catalog/products/CUMMINS/electric Fuel Pump 24V 4975617.webp',5,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(70,'0250-12A2UC11S1','0250-12A2UC11S1','catalog/products/Solenoid/0250-12A2UC11S1.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(71,'04199900','04199900','catalog/products/Solenoid/04199900.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(72,'121-1490','121-1490','catalog/products/Solenoid/121-1490.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(73,'122-5053','122-5053','catalog/products/Solenoid/122-5053.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(74,'125-5771','125-5771','catalog/products/Solenoid/125-5771.webp',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(75,'125-5772','125-5772','catalog/products/Solenoid/125-5772.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(76,'125-5773','125-5773','catalog/products/Solenoid/125-5773.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(77,'1503ES-12A5UC5S','1503ES-12A5UC5S','catalog/products/Solenoid/1503ES-12A5UC5S.webp',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(78,'155-4652','155-4652','catalog/products/Solenoid/155-4652.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(79,'155-4653','155-4653','catalog/products/Solenoid/155-4653.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(80,'1C010-60015','1C010-60015','catalog/products/Solenoid/1C010-60015.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(81,'24620472','24620472','catalog/products/Solenoid/24620472.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(82,'24v-stop-solenoid-1751-24e2u1b1s1a','24v-stop-solenoid-1751-24e2u1b1s1a','catalog/products/Solenoid/24v-stop-solenoid-1751-24e2u1b1s1a.avif',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(83,'3725-1230A87','3725-1230A87','catalog/products/Solenoid/3725-1230A87.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(84,'3991624 and 3991625','3991624 and 3991625','catalog/products/Solenoid/3991624 and 3991625.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(85,'4911834 12 OR 24 V','4911834 12 OR 24 V','catalog/products/Solenoid/4911834 12 OR 24 V.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(86,'6N-9987','6N-9987','catalog/products/Solenoid/6N-9987.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(87,'897329-5680','897329-5680','catalog/products/Solenoid/897329-5680.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(88,'9X1413','9X1413','catalog/products/Solenoid/9X1413.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(89,'DENYO solenoid','DENYO solenoid','catalog/products/Solenoid/DENYO solenoid.jpeg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(90,'SA-3838-12','SA-3838-12','catalog/products/Solenoid/SA-3838-12.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(91,'SA-3838-24','SA-3838-24','catalog/products/Solenoid/SA-3838-24.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(92,'SA-4962-24 OR 12','SA-4962-24 OR 12','catalog/products/Solenoid/SA-4962-24 OR 12.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(93,'U852064520','U852064520','catalog/products/Solenoid/U852064520.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(94,'Volvo 873754','Volvo 873754','catalog/products/Solenoid/Volvo 873754.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(95,'XHQ-PT 12-24 V','XHQ-PT 12-24 V','catalog/products/Solenoid/XHQ-PT 12-24 V.jpg',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(96,'cummins fuel shutoff solenoid valve','cummins fuel shutoff solenoid valve','catalog/products/Solenoid/cummins fuel shutoff solenoid valve.webp',6,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(97,'385720230','385720230','catalog/products/gauges and sensors/385720230.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(98,'CAT DC motor A 4W-7773','CAT DC motor A 4W-7773','catalog/products/gauges and sensors/CAT DC motor A 4W-7773.png',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(99,'Cummins oil pressure and temp sensor 4921477','Cummins oil pressure and temp sensor 4921477','catalog/products/gauges and sensors/Cummins oil pressure and temp sensor 4921477.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(100,'VDO Temperature sensor 120C','VDO Temperature sensor 120C','catalog/products/gauges and sensors/VDO Temperature sensor 120C.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(101,'VDO oil pressure sensor and switch','VDO oil pressure sensor and switch','catalog/products/gauges and sensors/VDO oil pressure sensor and switch.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(102,'datcon temp. gauge 24V','datcon temp. gauge 24V','catalog/products/gauges and sensors/datcon temp. gauge 24V.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(103,'hours Datcon meter 24V','hours Datcon meter 24V','catalog/products/gauges and sensors/hours Datcon meter 24V.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(104,'hours meter 2021 6-80V AC or DC','hours meter 2021 6-80V AC or DC','catalog/products/gauges and sensors/hours meter 2021 6-80V AC or DC.jpg',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(105,'water level sensor stainless steel','water level sensor stainless steel','catalog/products/gauges and sensors/water level sensor stainless steel.png',7,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(106,'Cummins Speed control 30-98693','Cummins Speed control 30-98693','catalog/products/speed control and loadsharing/Cummins Speed control 30-98693.jpg',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(107,'Woodward CAT load sharing 309-1583','Woodward CAT load sharing 309-1583','catalog/products/speed control and loadsharing/Woodward CAT load sharing 309-1583.webp',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(108,'cummins speed control 3037359','cummins speed control 3037359','catalog/products/speed control and loadsharing/cummins speed control 3037359.webp',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(109,'cummins speed control 3044196','cummins speed control 3044196','catalog/products/speed control and loadsharing/cummins speed control 3044196.jpg',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(110,'speed control cummins 3062322','speed control cummins 3062322','catalog/products/speed control and loadsharing/speed control cummins 3062322.jpg',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(111,'speed woodward 8290-184','speed woodward 8290-184','catalog/products/speed control and loadsharing/speed woodward 8290-184.jpg',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(112,'woodward 2301A','woodward 2301A','catalog/products/speed control and loadsharing/woodward 2301A.jpg',8,NULL,NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55'),(114,'تيست ٢','test 2','products/AJNva4u8k2v1MNO0vzz2xswVArXIe9O6DXEUrq79.jpg',4,'تيست ٢تيست ٢تيست ٢تيست ٢','test 2test 2test 2','2026-05-13 07:49:44','2026-05-14 07:55:03'),(115,'تيست','test','products/w8ohpSJ3MA4XobUiJoLpmMvclkdd6i1qzFbfV246.jpg',3,'تيستتيستتيستتيستتيست','testtesttesttesttesttest','2026-05-13 09:24:08','2026-05-13 09:24:08'),(116,'تيست ٣','test 3','products/6ALjqzRpWGIaZMQIElNFY7A8jVWxmowOTocMhwgL.jpg',4,'test 3','test 3','2026-05-14 07:51:39','2026-05-14 07:52:18'),(117,'تيست ٤','test 4','products/EXUFmMlSuOrLNoo9v4suXBsT5FSX1s65LbJ4x3Cu.jpg',4,'تيست ٤','test 4','2026-05-14 07:52:55','2026-05-14 07:52:55'),(118,'ديفيد','david','products/JYuTcMvynwjDsKrSLZhZUFoLLWJpYb28TuEBXeU9.jpg',8,'ديفيدديفيدديفيدديفيدديفيد','daviddaviddaviddavid','2026-05-14 08:39:08','2026-05-14 08:39:08');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5O642k8oiFNWztOjhnpkqbKaljxSOaIzmGqY3Ck1',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiJDbE9IamdOZGNWNno2U29YN21oQ0ZaV3RhWjQxeFBFWDJ3ZlRRWmU2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779020742),('fAWn4OXL3Kt4Qy4cELIUtTVBQzZIomxK0iUvoBwP',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJJNzNGOTYyaUdmbURycVp1RUNuR3F0VGhLZUFTU29zWXMzZDBGWDNJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779023314),('Kd528Kqk1MdT2IGQz5PWMHbGqSBrNk5NfQnkaSYo',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.120.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','eyJfdG9rZW4iOiJQVnR5ZVBndmJRQWNkaENhRTYzTnVxRmlrSTRZczdCRWhNMVZaWWxKIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779097301),('OglytdGmNv86hLU3G2lZslyaOtOCVTWYLOFNyapz',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiIwUjU2cTBpZjBCYUVFS0JrSVFWcmF4cmQ4NjBTRW9zSnExc0czZkxzIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779021219),('oJ6pFbgyyz8Izr6b5OEKWdvZPc56fGHmLnqdIMSE',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiJIaVEyQlFtRHI3VjdKallpTUYwZDBMc015ckxoSWhUZ0RhZFhLTHEwIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779020964),('OZuvk2KZTmCoxmN2Owck35IS4u3EwqGuSC2yuePI',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJIb21ZMkZmNHZWcWp1bmV6ZWhBd2hKYnpqUEpqcFhXMFV3QVdmMWh4IiwibG9jYWxlIjoiZW4iLCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL3Byb2R1Y3RzIiwicm91dGUiOiJwcm9kdWN0cyJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19',1779040925),('R9NACnqw1regMU9sPEozICyKf5zjBuyhTY8BOqY5',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiJmTXBNMGRGeTloc1YzQ2tOTEFaMmRiY3c0OURWRFJIb1FuYWRLN3VoIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779021128),('RKompGJ0X8gX0aLYIbLpLRpT0oqvXafmrCFiIKlC',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJDejM3dll6dm13WHRpbGFXdFc0T2JWUHFIVGpGU1RjTTRqQk1VV2N2IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9jYWxlIjoiYXIifQ==',1779026810),('rvJzOBVFkgmm0l23CC36asy72S41JnPC5IjRtUWx',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','eyJfdG9rZW4iOiJYZXBzUFNscnpBVE1JaHhTQWtRcHpnVkRMTG9wbngzRWdDZEw3WE0wIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=',1779022502),('v4VMeTAL7HQtkgu3SxDU7kkro6JMDDGGDSKj656G',NULL,'127.0.0.1','curl/8.7.1','eyJfdG9rZW4iOiJTdXBHNzMxYWxUMUNQSHhuMW9ZcExLUkNBVlNDZTY5d28xdFM5dVJXIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAxXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779020742),('x1XeGMY7ZewbQyQBjqLoH3YQTNuAaErYMaLNP2nR',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJwUTFSSWFJQ2lEdVVwSXRTMjBtTFhyMGJrMlV6TWxLY3ZtbFljVkxuIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779093783),('xHLVmcaA0fKArZXy9OWdTFI6pDqlX2FK9qqbo58Z',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.119.0 Chrome/142.0.7444.265 Electron/39.8.8 Safari/537.36','eyJfdG9rZW4iOiJJMDFPcUVVTmlpbUlHMGlEZjlqakRiSTNTU0FoOFQ2OXh6QlVYOGFjIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hYm91dCIsInJvdXRlIjoiYWJvdXQifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==',1779022541);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Power Falcon Admin','admin@powerfalcon.com',NULL,'$2y$12$gLUvDpGwr4EhSS4EXb3kz.xatCAy/vwllAB3Ru9KeNODiJoTz569C',NULL,'2026-05-12 20:35:55','2026-05-12 20:35:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-05-18 14:04:27
