-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: babel-clothes.mysql.database.azure.com    Database: babel
-- ------------------------------------------------------
-- Server version	5.6.42.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(100) DEFAULT NULL,
  `exteriorNumberAddress` int(11) DEFAULT NULL,
  `interiorNumberAddress` int(11) DEFAULT NULL,
  `suburb` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `estate` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_id` (`provider_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  CONSTRAINT `addresses_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-12 18:19:04','2020-08-12 18:19:04',1,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-12 18:19:04','2020-08-12 18:19:04',2,NULL),(3,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-12 19:16:43','2020-08-12 19:16:43',NULL,NULL),(4,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-12 19:22:20','2020-08-12 19:22:20',NULL,NULL),(5,'Melchor O. Campo',15,1,'Lindavista','Querétaro','Querétaro','76220','2020-08-12 19:26:18','2020-08-12 19:26:18',NULL,NULL),(6,'Melchor O. Campo',15,1,'Santa Rosa de Jauregui','Querétaro','Querétaro','76220','2020-08-12 19:28:03','2020-08-12 19:28:03',NULL,NULL),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-12 19:53:51','2020-08-12 19:53:51',3,NULL),(8,'Puebla',8,8,'Obrera','Querétaro','Querétaro','76129','2020-08-12 19:54:45','2020-08-12 19:54:45',NULL,NULL),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-12 20:09:44','2020-08-12 20:09:44',4,NULL),(10,'Choles',304,36,'Cerrito Colorado','Querétaro','Querétaro','76116','2020-08-12 20:11:11','2020-08-12 20:11:11',NULL,NULL),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-12 20:31:51','2020-08-12 20:31:51',5,NULL),(12,'Melchor O. Campo',15,1,'Lomas de San Pablo','Querétaro','Querétaro','76125','2020-08-12 20:40:33','2020-08-12 20:40:33',NULL,NULL),(13,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-12 20:41:48','2020-08-12 20:41:48',NULL,NULL);
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrators` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) DEFAULT NULL,
  `office_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk5` (`user_id`),
  KEY `fk6` (`office_id`),
  CONSTRAINT `fk5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk6` FOREIGN KEY (`office_id`) REFERENCES `offices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'2020-08-12 18:19:03','2020-08-12 18:19:03',1,NULL),(2,'2020-08-12 18:19:03','2020-08-12 18:19:03',2,NULL),(3,'2020-08-12 19:16:44','2020-08-12 19:16:44',1,NULL),(4,'2020-08-12 19:22:20','2020-08-12 19:22:20',1,NULL),(5,'2020-08-12 19:26:18','2020-08-12 19:26:18',1,NULL),(6,'2020-08-12 19:28:03','2020-08-12 19:28:03',1,NULL),(7,'2020-08-12 20:40:34','2020-08-12 20:40:34',1,NULL),(8,'2020-08-12 20:41:48','2020-08-12 20:41:48',1,NULL),(9,'2020-08-14 00:06:20','2020-08-14 00:06:20',1,NULL);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `timestamps` BEFORE INSERT ON `administrators` FOR EACH ROW begin

    set new.created_at = now();

    set new.updated_at = now();

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) DEFAULT NULL,
  `old_precio` float DEFAULT NULL,
  `new_precio` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `audits_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audits`
--

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buycomment`
--

DROP TABLE IF EXISTS `buycomment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buycomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `administrator_id` bigint(20) NOT NULL,
  `buy_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `administrator_id` (`administrator_id`),
  KEY `buy_id` (`buy_id`),
  CONSTRAINT `buycomment_ibfk_1` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`),
  CONSTRAINT `buycomment_ibfk_2` FOREIGN KEY (`buy_id`) REFERENCES `buys` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buycomment`
--

LOCK TABLES `buycomment` WRITE;
/*!40000 ALTER TABLE `buycomment` DISABLE KEYS */;
/*!40000 ALTER TABLE `buycomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buydetails`
--

DROP TABLE IF EXISTS `buydetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buydetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_com` int(11) DEFAULT NULL,
  `costoProduct` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `buy_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `eq_s` int(11) DEFAULT '0',
  `eq_m` int(11) DEFAULT '0',
  `eq_g` int(11) DEFAULT '0',
  `ec_s` int(11) DEFAULT '0',
  `ec_m` int(11) DEFAULT '0',
  `ec_g` int(11) DEFAULT '0',
  `eg_s` int(11) DEFAULT '0',
  `eg_m` int(11) DEFAULT '0',
  `eg_g` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `buy_id` (`buy_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `buydetails_ibfk_1` FOREIGN KEY (`buy_id`) REFERENCES `buys` (`id`),
  CONSTRAINT `buydetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buydetails`
--

LOCK TABLES `buydetails` WRITE;
/*!40000 ALTER TABLE `buydetails` DISABLE KEYS */;
INSERT INTO `buydetails` VALUES (1,48,NULL,'2020-08-12 20:36:28','2020-08-12 20:36:28',1,13,10,10,10,5,5,5,1,1,1);
/*!40000 ALTER TABLE `buydetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `total_com` AFTER INSERT ON `buydetails` FOR EACH ROW BEGIN

    CALL TOTAL_COMPRA(new.buy_id, @total);

    UPDATE buys

    SET cost_com = @total

    WHERE id = new.buy_id;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `buys`
--

DROP TABLE IF EXISTS `buys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `concepto_compra` text,
  `status_id` int(11) DEFAULT '1',
  `cost_com` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `administrator_id` bigint(20) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provider_id` (`provider_id`),
  KEY `administrator_id` (`administrator_id`),
  KEY `status_id` (`status_id`),
  CONSTRAINT `buys_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  CONSTRAINT `buys_ibfk_2` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`),
  CONSTRAINT `buys_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `buystatus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buys`
--

LOCK TABLES `buys` WRITE;
/*!40000 ALTER TABLE `buys` DISABLE KEYS */;
INSERT INTO `buys` VALUES (1,NULL,2,12000,'2020-08-12 20:36:28','2020-08-12 20:36:56',1,1);
/*!40000 ALTER TABLE `buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buystatus`
--

DROP TABLE IF EXISTS `buystatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buystatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameStatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buystatus`
--

LOCK TABLES `buystatus` WRITE;
/*!40000 ALTER TABLE `buystatus` DISABLE KEYS */;
INSERT INTO `buystatus` VALUES (1,'En proceso'),(2,'Realizada'),(3,'Cancelada'),(4,'sin completar');
/*!40000 ALTER TABLE `buystatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameCategory` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Apolo',1,'2020-08-12 18:19:05','2020-08-12 18:19:05'),(2,'Babel',1,'2020-08-12 18:19:05','2020-08-12 18:19:05'),(3,'Bojack Horseman',1,'2020-08-12 18:19:05','2020-08-12 18:19:05'),(4,'Unicornios',1,'2020-08-12 18:19:05','2020-08-12 18:19:05'),(5,'Art',1,'2020-08-12 18:19:05','2020-08-12 18:19:05'),(6,'Mex',1,'2020-08-12 18:19:06','2020-08-12 18:19:06'),(7,'Videojuegos',1,'2020-08-12 18:19:06','2020-08-12 18:19:06'),(8,'Mr Robot',1,'2020-08-12 18:19:06','2020-08-12 18:19:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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
-- Table structure for table `imagesproducts`
--

DROP TABLE IF EXISTS `imagesproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `imagesproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `imagesproducts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagesproducts`
--

LOCK TABLES `imagesproducts` WRITE;
/*!40000 ALTER TABLE `imagesproducts` DISABLE KEYS */;
INSERT INTO `imagesproducts` VALUES (1,'products/5.jpg','2020-08-12 18:19:09','2020-08-12 18:19:09',12),(2,'products/7.jpg','2020-08-12 18:19:09','2020-08-12 18:19:09',10),(3,'products/8.jpg','2020-08-12 18:19:09','2020-08-12 18:19:09',11),(4,'products/apolo-amstrong.png','2020-08-12 18:19:10','2020-08-12 18:19:10',2),(5,'products/apolo-amstrong-source.png','2020-08-12 18:19:10','2020-08-12 18:19:10',2),(6,'products/babel.png','2020-08-12 18:19:10','2020-08-12 18:19:10',1),(7,'products/babel-source.png','2020-08-12 18:19:10','2020-08-12 18:19:10',1),(8,'products/bojack-head.png','2020-08-12 18:19:10','2020-08-12 18:19:10',3),(9,'products/bojack-head-source.jpg','2020-08-12 18:19:11','2020-08-12 18:19:11',3),(10,'products/hackerman.png','2020-08-12 18:19:11','2020-08-12 18:19:11',4),(11,'products/hackerman-source.jpg','2020-08-12 18:19:11','2020-08-12 18:19:11',4),(12,'products/i-want-to-be-architec.png','2020-08-12 18:19:11','2020-08-12 18:19:11',5),(13,'products/i-want-to-be-architec-source.jpg','2020-08-12 18:19:11','2020-08-12 18:19:11',5),(14,'products/licorne.png','2020-08-12 18:19:12','2020-08-12 18:19:12',6),(15,'products/licorne-source.png','2020-08-12 18:19:12','2020-08-12 18:19:12',6),(16,'products/mar-de-nubes.png','2020-08-12 18:19:12','2020-08-12 18:19:12',7),(17,'products/mar-de-nubes-source.jpg','2020-08-12 18:19:12','2020-08-12 18:19:12',7),(18,'products/quetza.png','2020-08-12 18:19:12','2020-08-12 18:19:12',8),(19,'products/quetza-source.png','2020-08-12 18:19:13','2020-08-12 18:19:13',8),(20,'products/YHLQMDLG.png','2020-08-12 18:19:13','2020-08-12 18:19:13',9),(21,'products/YHLQMDLG-source.png','2020-08-12 18:19:13','2020-08-12 18:19:13',9);
/*!40000 ALTER TABLE `imagesproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eq_s` int(11) DEFAULT '0',
  `eq_m` int(11) DEFAULT '0',
  `eq_g` int(11) DEFAULT '0',
  `ec_s` int(11) DEFAULT '0',
  `ec_m` int(11) DEFAULT '0',
  `ec_g` int(11) DEFAULT '0',
  `eg_s` int(11) DEFAULT '0',
  `eg_m` int(11) DEFAULT '0',
  `eg_g` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk16` (`product_id`),
  CONSTRAINT `fk16` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (1,10,10,10,10,10,10,5,5,5,'2020-08-12 18:19:06','2020-08-12 18:19:06',1),(2,5,5,5,5,5,5,5,5,5,'2020-08-12 18:19:06','2020-08-12 18:19:06',2),(3,3,3,3,3,3,3,5,5,5,'2020-08-12 18:19:06','2020-08-12 18:19:06',3),(4,2,0,7,15,15,15,5,5,5,'2020-08-12 18:19:07','2020-08-12 19:56:05',4),(5,2,4,4,10,18,2,5,5,5,'2020-08-12 18:19:07','2020-08-12 18:19:07',5),(6,2,5,10,7,1,1,5,5,5,'2020-08-12 18:19:07','2020-08-12 18:19:07',6),(7,1,5,7,5,2,10,5,5,5,'2020-08-12 18:19:07','2020-08-12 18:19:07',7),(8,9,6,1,2,2,5,5,5,5,'2020-08-12 18:19:08','2020-08-12 20:12:49',8),(9,5,1,5,5,15,19,5,5,5,'2020-08-12 18:19:08','2020-08-12 19:28:42',9),(10,0,0,0,0,0,0,0,0,0,'2020-08-12 18:19:08','2020-08-12 18:19:08',10),(11,0,0,0,0,0,0,0,0,0,'2020-08-12 18:19:08','2020-08-12 18:19:08',11),(12,0,0,0,0,0,0,0,0,0,'2020-08-12 18:19:08','2020-08-12 18:19:08',12),(13,10,8,10,5,5,5,1,1,1,'2020-08-12 20:35:01','2020-08-12 20:42:29',13);
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_05_03_000001_create_customer_columns',1),(3,'2019_05_03_000002_create_subscriptions_table',1),(4,'2019_05_03_000003_create_subscription_items_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameOffice` varchar(30) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk4` (`address_id`),
  CONSTRAINT `fk4` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offices`
--

LOCK TABLES `offices` WRITE;
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT INTO `offices` VALUES (1,'Ciudad de México',NULL,'2020-08-12 18:16:31','2020-08-12 18:16:31',NULL),(2,'Guadalajara',NULL,'2020-08-12 18:16:31','2020-08-12 18:16:31',NULL),(3,'Querétaro',NULL,'2020-08-12 18:16:31','2020-08-12 18:16:31',NULL);
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pays` (
  `id` varchar(255) NOT NULL,
  `tipo_pago` varchar(50) DEFAULT NULL,
  `receipt_email` varchar(255) DEFAULT NULL,
  `status` varchar(120) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sell_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk18` (`sell_id`),
  CONSTRAINT `fk18` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES ('pi_1HFPccJMj1omTiKmYdyd3HuR','card','hnetflix@gmail.com','succeeded',35000,'2020-08-12 19:28:43','2020-08-12 19:28:43',4),('pi_1HFQ2gJMj1omTiKmSi5Agu8G','card','miltonraul2@gmail.com','succeeded',35000,'2020-08-12 19:56:05','2020-08-12 19:56:05',5),('pi_1HFQICJMj1omTiKmY3bLPJqU','card','borresp2000@gmail.com','succeeded',35000,'2020-08-12 20:12:50','2020-08-12 20:12:50',6),('pi_1HFQkYJMj1omTiKm1l75evjV','card',NULL,'requires_payment_method',70000,'2020-08-12 20:41:28','2020-08-12 20:41:28',7),('pi_1HFQljJMj1omTiKmjYocu7SU','card','vaguilar@uteq.edu.mx','succeeded',70000,'2020-08-12 20:42:30','2020-08-12 20:42:30',8);
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusProduct_id` int(11) DEFAULT '2',
  `nameProduct` varchar(100) NOT NULL,
  `description_prod` text,
  `costo_prod` float NOT NULL,
  `precio_prod` float NOT NULL,
  `descuento` float DEFAULT NULL,
  `material_prod` varchar(50) DEFAULT 'Algodón',
  `category_id` int(11) DEFAULT '1',
  `provider_id` int(11) DEFAULT '1',
  `sex_id` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `statusProduct_id` (`statusProduct_id`),
  KEY `fk14` (`category_id`),
  KEY `sex_id` (`sex_id`),
  KEY `fk15` (`provider_id`),
  CONSTRAINT `fk14` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk15` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`statusProduct_id`) REFERENCES `statusproducts` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`sex_id`) REFERENCES `sexs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,2,'Babel','Playera bien bonita de la marca',300,350,NULL,'Algodón',2,1,1,'2020-08-12 18:19:06','2020-08-12 18:19:06'),(2,2,'Apolo Amstrong','Playera bien bonita de Apolo cuando fue a la luna',300,350,NULL,'Algodón',1,1,1,'2020-08-12 18:19:06','2020-08-12 18:19:06'),(3,2,'Horseman','¿Es el caballo de retozando?',300,350,NULL,'Algodón',3,1,1,'2020-08-12 18:19:06','2020-08-12 18:19:06'),(4,2,'Hackerman','¿Elliot? ¿Qué estás haciendo?',300,350,NULL,'Algodón',8,1,1,'2020-08-12 18:19:07','2020-08-12 18:19:07'),(5,2,'El mirador','¿Bojack? Quiero ser arquitecta.',300,350,NULL,'Algodón',3,1,1,'2020-08-12 18:19:07','2020-08-12 18:19:07'),(6,2,'Licorne','Playera de los Toramigos.',300,350,NULL,'Algodón',4,1,1,'2020-08-12 18:19:07','2020-08-12 18:19:07'),(7,2,'Mar de nubes','El caminante sobre el mar de nubes',300,350,NULL,'Algodón',5,1,1,'2020-08-12 18:19:07','2020-08-12 18:19:07'),(8,2,'Quetza','Playera diseñada por XSierra, estudiante de la carrera de diseño de videojuegos.',300,350,NULL,'Algodón',6,1,1,'2020-08-12 18:19:08','2020-08-12 18:19:08'),(9,2,'YHLQMDLG','Yo hago lo que me de la gana. ¿Oiste humano?',300,350,NULL,'Algodón',1,1,1,'2020-08-12 18:19:08','2020-08-12 18:19:08'),(10,2,'Halo Guardians','Playera negra de Halo con estampado blanco',300,350,NULL,'Algodón',7,1,1,'2020-08-12 18:19:08','2020-08-12 18:19:08'),(11,2,'Gears of War','Payera negra de gears of wars manga corta',300,350,NULL,'Algodón',7,1,1,'2020-08-12 18:19:08','2020-08-12 18:19:08'),(12,2,'Guitar Hero','Playera negra Guitar hero con estampado verde',300,350,NULL,'Algodón',7,1,1,'2020-08-12 18:19:08','2020-08-12 18:19:08'),(13,1,'aaa de prueba','una descripcion',250,350,0,'algodon',5,1,1,'2020-08-12 20:35:01','2020-08-12 20:35:01');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `verificaPrecio` BEFORE INSERT ON `products` FOR EACH ROW begin

    if new.precio_prod <= new.costo_prod

    then

        set new.precio_prod = null;

    end if;

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `prodXtrigger` AFTER INSERT ON `products` FOR EACH ROW begin

    insert into inventories (product_id) value (new.id);

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `Auditoria` BEFORE UPDATE ON `products` FOR EACH ROW begin

    insert into audits

    values (0, current_user(), old.precio_prod,

            new.precio_prod, now(), now(), new.id);

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `providers`
--

DROP TABLE IF EXISTS `providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` bigint(20) DEFAULT NULL,
  `nameProvider` varchar(30) NOT NULL,
  `apProvider` varchar(50) DEFAULT NULL,
  `amProvider` varchar(30) DEFAULT NULL,
  `companyProvider` varchar(50) DEFAULT NULL,
  `descriptionProvider` varchar(30) DEFAULT NULL,
  `emailProvider` varchar(70) NOT NULL,
  `rfcProvider` varchar(13) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,NULL,'Printful',NULL,NULL,'Printful','Proveedor de dropshiping ropa.','printful@printful.com',NULL,1,'2020-08-12 18:19:04','2020-08-12 18:19:04'),(2,NULL,'JamaProvider',NULL,NULL,'JamaProvider','Jama prooveedor.','jama@jamaaa.me',NULL,1,'2020-08-12 18:19:04','2020-08-12 18:19:04');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selldetails`
--

DROP TABLE IF EXISTS `selldetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `selldetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `costProduct` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sell_id` int(11) DEFAULT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `descuento` float DEFAULT '0',
  `size` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `fk20` (`sell_id`),
  KEY `fk21` (`inventory_id`),
  CONSTRAINT `fk20` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `fk21` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `selldetails_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selldetails`
--

LOCK TABLES `selldetails` WRITE;
/*!40000 ALTER TABLE `selldetails` DISABLE KEYS */;
INSERT INTO `selldetails` VALUES (1,350,1,'2020-08-12 19:16:44','2020-08-12 19:16:44',1,9,9,0,'2'),(2,350,1,'2020-08-12 19:22:20','2020-08-12 19:22:20',2,9,9,0,'2'),(3,350,1,'2020-08-12 19:26:19','2020-08-12 19:26:19',3,9,9,0,'2'),(4,350,1,'2020-08-12 19:28:03','2020-08-12 19:28:03',4,9,9,0,'2'),(5,350,1,'2020-08-12 19:54:46','2020-08-12 19:54:46',5,4,4,0,'2'),(6,350,1,'2020-08-12 20:11:12','2020-08-12 20:11:12',6,8,8,0,'2'),(7,350,2,'2020-08-12 20:40:34','2020-08-12 20:40:34',7,13,13,0,'2'),(8,350,2,'2020-08-12 20:41:49','2020-08-12 20:41:49',8,13,13,0,'2');
/*!40000 ALTER TABLE `selldetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `tot` AFTER INSERT ON `selldetails` FOR EACH ROW BEGIN

    CALL tot_vta(new.sell_id, @total);

    UPDATE sells

    SET monto_pago = @total

    WHERE id = new.sell_id;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `sells`
--

DROP TABLE IF EXISTS `sells`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) DEFAULT '4',
  `phone` bigint(20) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `monto_pago` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) DEFAULT NULL,
  `address_id` int(11) NOT NULL,
  `shipment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  KEY `fk17` (`user_id`),
  KEY `status_id` (`status_id`),
  KEY `shipment_id` (`shipment_id`),
  CONSTRAINT `fk17` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `sells_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  CONSTRAINT `sells_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `buystatus` (`id`),
  CONSTRAINT `sells_ibfk_3` FOREIGN KEY (`shipment_id`) REFERENCES `shipments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sells`
--

LOCK TABLES `sells` WRITE;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
INSERT INTO `sells` VALUES (1,4,7731598533,'Hector Jama',350,'2020-08-12 19:16:44','2020-08-12 19:16:44',1,3,1),(2,4,7731598533,'Hector Jama Escobedo Olguín',350,'2020-08-12 19:22:20','2020-08-12 19:22:20',1,4,2),(3,4,4427872721,'Hector Jama Escobedo Olguín',350,'2020-08-12 19:26:19','2020-08-12 19:26:19',1,5,3),(4,2,4427872721,'Hector Jama Escobedo Olguín',350,'2020-08-12 19:28:03','2020-08-12 19:29:35',1,6,4),(5,1,4421471180,'Milton Raúl Cantera Silva',350,'2020-08-12 19:54:46','2020-08-12 19:54:46',3,8,5),(6,2,4421083497,'Christian Salazar Pichardo',350,'2020-08-12 20:11:12','2020-08-12 20:13:31',4,10,6),(7,3,4427872721,'Victor Aguila',700,'2020-08-12 20:40:34','2020-08-12 20:40:34',1,12,7),(8,2,7731598,'Victo',700,'2020-08-12 20:41:49','2020-08-12 20:44:15',1,13,8);
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexs`
--

DROP TABLE IF EXISTS `sexs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexs`
--

LOCK TABLES `sexs` WRITE;
/*!40000 ALTER TABLE `sexs` DISABLE KEYS */;
INSERT INTO `sexs` VALUES (1,'Masculino','2020-08-12 18:16:40','2020-08-12 18:16:40'),(2,'Femenino','2020-08-12 18:16:40','2020-08-12 18:16:40'),(3,'Otro','2020-08-12 18:16:40','2020-08-12 18:16:40');
/*!40000 ALTER TABLE `sexs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipments`
--

DROP TABLE IF EXISTS `shipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paqueteria` varchar(100) DEFAULT NULL,
  `guia` varchar(100) DEFAULT NULL,
  `fec_env` date DEFAULT NULL,
  `fec_ent` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` bigint(20) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`),
  CONSTRAINT `shipments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `shipments_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipments`
--

LOCK TABLES `shipments` WRITE;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
INSERT INTO `shipments` VALUES (1,NULL,NULL,NULL,NULL,'2020-08-12 19:16:44','2020-08-12 19:16:44',1,3),(2,NULL,NULL,NULL,NULL,'2020-08-12 19:22:20','2020-08-12 19:22:20',1,4),(3,NULL,NULL,NULL,NULL,'2020-08-12 19:26:18','2020-08-12 19:26:18',1,5),(4,'FEDEX','1111156654654','2020-08-12','2020-08-13','2020-08-12 19:28:03','2020-08-12 19:29:22',1,6),(5,NULL,NULL,NULL,NULL,'2020-08-12 19:54:45','2020-08-12 19:54:45',3,8),(6,'FEDEX','1321321321','2020-08-12','2020-08-13','2020-08-12 20:11:12','2020-08-12 20:13:25',4,10),(7,NULL,NULL,NULL,NULL,'2020-08-12 20:40:34','2020-08-12 20:40:34',1,12),(8,'FEDEX','1111156654654','2020-08-12','2020-08-13','2020-08-12 20:41:48','2020-08-12 20:44:09',1,13);
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statusproducts`
--

DROP TABLE IF EXISTS `statusproducts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `statusproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameStatus` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statusproducts`
--

LOCK TABLES `statusproducts` WRITE;
/*!40000 ALTER TABLE `statusproducts` DISABLE KEYS */;
INSERT INTO `statusproducts` VALUES (1,'Nuevo'),(2,'Disponible'),(3,'Liquidación'),(4,'Sin existencia'),(5,'Eliminado');
/*!40000 ALTER TABLE `statusproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint(20) unsigned NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  KEY `subscription_items_stripe_id_index` (`stripe_id`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_items`
--

LOCK TABLES `subscription_items` WRITE;
/*!40000 ALTER TABLE `subscription_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscription_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `customer_stripe_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sell_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk19` (`sell_id`),
  CONSTRAINT `fk19` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES ('ch_1HFPcpJMj1omTiKmrH3aIW25','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HFPcpJMj1omTiKmrH3aIW25/rcpt_Hp3kX92dMPTjF1v350hwAAbEbIytGZz','cus_Hp3ktuzHkTBoxf','2020-08-12 19:28:43','2020-08-12 19:28:43',4),('ch_1HFQ3KJMj1omTiKmH52yak7Y','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HFQ3KJMj1omTiKmH52yak7Y/rcpt_Hp4BTu6ywaef8BTu4gF5n5XdVZUOuiS','cus_Hp4BaY1wZQ21SS','2020-08-12 19:56:06','2020-08-12 19:56:06',5),('ch_1HFQJXJMj1omTiKmWu5ogDof','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HFQJXJMj1omTiKmWu5ogDof/rcpt_Hp4SHdEc9w2gQFEwiAnX37PrNhMovbC','cus_Hp4S6iekklLUYo','2020-08-12 20:12:50','2020-08-12 20:12:50',6),('ch_1HFQmFJMj1omTiKmWVsmYVf3','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HFQmFJMj1omTiKmWVsmYVf3/rcpt_Hp4wT1e817ftxk1AoZUgLHncYvXSssu','cus_Hp4wRCPZ2jMFq2','2020-08-12 20:42:30','2020-08-12 20:42:30',8),('pi_1HFQkYJMj1omTiKm1l75evjV',NULL,NULL,'2020-08-12 20:41:28','2020-08-12 20:41:28',7);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `typeusers`
--

DROP TABLE IF EXISTS `typeusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `typeusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `typeusers`
--

LOCK TABLES `typeusers` WRITE;
/*!40000 ALTER TABLE `typeusers` DISABLE KEYS */;
INSERT INTO `typeusers` VALUES (1,'Cliente','2020-08-12 18:16:37','2020-08-12 18:16:37'),(2,'Administrador','2020-08-12 18:16:37','2020-08-12 18:16:37'),(3,'SuperUsuario','2020-08-12 18:16:37','2020-08-12 18:16:37'),(4,'Eliminado','2020-08-12 18:16:37','2020-08-12 18:16:37'),(5,'Diseñador','2020-08-12 18:16:37','2020-08-12 18:16:37');
/*!40000 ALTER TABLE `typeusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `typeUser_id` int(11) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `ap` varchar(255) DEFAULT NULL,
  `am` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(500) DEFAULT 'https://api.adorable.io/avatars/285/abott@adorable.png',
  `birthdate` date DEFAULT NULL,
  `rfc` varchar(17) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sex_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `stripe_id` varchar(255) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `card_last_four` varchar(4) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `USU` (`id`),
  KEY `typeUser_id` (`typeUser_id`),
  KEY `sex_id` (`sex_id`),
  KEY `users_stripe_id_index` (`stripe_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`typeUser_id`) REFERENCES `typeusers` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `users_ibfk_2` FOREIGN KEY (`sex_id`) REFERENCES `sexs` (`id`)
) /*!50100 TABLESPACE `innodb_system` */ ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,7731598,'Jama Ideal','Escobedo','Olguín','jamahcs@outlook.com','2020-08-12 18:19:02','$2y$10$l3/HM3bk82coxqRROfrSjeEsZWaJrWp.Obrf9REvBcRGn8hl2TmHm','https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/85125424_4065065830186046_1976842346767056896_o.jpg?_nc_cat=111&_nc_sid=09cbfe&_nc_eui2=AeFVRrxob1UgdrIgkUPKMCaFVNpve6GT8EVU2m97oZPwRUMDRCAD9dTsiBAWAw3G09Ju9c0MEw_KxIUf9cypyeYM&_nc_ohc=iyh3SEWM78UAX_8T06c&_nc_ht=scontent.fmex10-2.fna&oh=7ef1cd539cf0b4275d5ebc4de1f887d4&oe=5F54C4CF','2000-03-20',NULL,'2020-08-12 18:19:02','2020-08-12 18:19:02',1,'rkA5yaDfa52usANUinO7Uig8YZutQ1GJLagiXlML2c1hgfbK0kGiKtpsezIk',NULL,NULL,NULL,NULL),(2,3,NULL,'Verónica ','Lorenzo','Alavez','veronicalorenzo1999@gmail.com','2020-08-12 18:19:03','$2y$10$Xt01Tg//17sF2a2zxhaIFO8P/8pD2B5a4ePGkq8uLQKO8lrMgQpX.','https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/105304380_3055814717827936_7436596492019864306_o.jpg?_nc_cat=109&_nc_sid=09cbfe&_nc_eui2=AeE1Tx6zi6boHoy0V1vOdxh4UxoQkknRbRZTGhCSSdFtFnB-jOfIM3XhLUA4Zz5aadvuOBpEEFhYuM8hUhxK7vZm&_nc_ohc=fa9sWT-b0FcAX8p0ffe&_nc_ht=scontent.fmex10-2.fna&oh=262fc00d3bc5e9296705409ae3eb62b1&oe=5F547DA5','1999-02-03',NULL,'2020-08-12 18:19:03','2020-08-12 18:19:03',2,NULL,NULL,NULL,NULL,NULL),(3,1,4421471180,'Milton Raul','Cantera','S','miltonraul2@gmail.com','2020-08-12 19:53:51','$2y$10$wbenrcYvgWuAE38RVES8J.kBFwr9VDIYTWHfEHHRhgQHxCfzCDIg2','https://api.adorable.io/avatars/285/MiltonRaulCanteraS.png','1999-09-09',NULL,'2020-08-12 19:53:51','2020-08-12 19:53:51',1,NULL,'cus_Hp490gAc8WziyN',NULL,NULL,NULL),(4,1,4421083497,'Christian','Salazar','Pichardo','borresp2000@gmail.com','2020-08-12 20:09:43','$2y$10$6zaQdJg1GrQYfl9xldGaFeG784.3fzkvk3NsMa7fD5AEiqha0K4m2','https://api.adorable.io/avatars/285/ChristianSalazarPichardo.png','2000-05-03',NULL,'2020-08-12 20:09:43','2020-08-12 20:09:44',1,NULL,'cus_Hp4Pw8wszNliJs',NULL,NULL,NULL),(5,1,NULL,'Victor','Aguilar','Sanchez','vaguilar@uteq.edu.mx','2020-08-12 20:31:50','$2y$10$/rpVuLPA35Tshz3QuNfsLOgG64nPbRMn6ESz1PlFW5oTY/rkGvfgq','https://api.adorable.io/avatars/285/VictorAguilarSanchez.png','1978-07-28',NULL,'2020-08-12 20:31:50','2020-08-12 20:31:51',1,NULL,'cus_Hp4lu1tyTtzBex',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `typeUsers` BEFORE INSERT ON `users` FOR EACH ROW begin

    set new.typeUser_id = 1;

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`babel`@`%`*/ /*!50003 TRIGGER `createAdmin` AFTER UPDATE ON `users` FOR EACH ROW begin

    if new.typeUser_id != 1 then

        begin

            insert into administrators (user_id) value (new.id);

        end;

    end if;

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping events for database 'babel'
--

--
-- Dumping routines for database 'babel'
--
/*!50003 DROP PROCEDURE IF EXISTS `pc_insert_detail` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `pc_insert_detail`(in _product_id int, _cantidad int, _size_id int, _sell_id int)
begin

    declare _precio float;

    declare _inventory_id int;

    select id into _inventory_id from inventories where product_id = _product_id;

    select precio_prod into _precio from products where id = _product_id;

    if _size_id = 1 then

        call pc_sell_s(_product_id, _cantidad, @outbool);

        start transaction ;

        insert into selldetails (product_id, sell_id, cantidad, costProduct, size, inventory_id)

            value (_product_id, _sell_id, _cantidad, _precio, _size_id, _inventory_id);

        if @outbool = 1 then

            commit ;

        elseif @outbool = 0 then

            rollback ;

        end if;

    elseif _size_id = 2 then

        call pc_sell_m(_product_id, _cantidad, @outbool);

        start transaction ;

        insert into selldetails (product_id, sell_id, cantidad, costProduct, size, inventory_id)

            value (_product_id, _sell_id, _cantidad, _precio, _size_id, _inventory_id);

        if @outbool = 1 then

            commit ;

        elseif @outbool = 0 then

            rollback ;

        end if;

    elseif _size_id = 3 then

        call pc_sell_g(_product_id, _cantidad, @outbool);

        start transaction ;

        insert into selldetails (product_id, sell_id, cantidad, costProduct, size, inventory_id)

            value (_product_id, _sell_id, _cantidad, _precio, _size_id, _inventory_id);

        if @outbool = 1 then

            commit ;

        elseif @outbool = 0 then

            rollback ;

        end if;

    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pc_sell_g` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `pc_sell_g`(in _product_id int, _cantidad int, out _disponibility boolean)
begin

    declare _existencia int;

    select ec_g + eg_g + eq_g into _existencia from inventories where product_id = _product_id;

    if _existencia > _cantidad then

        set _disponibility=true;

    else

        set _disponibility=false;

    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pc_sell_m` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `pc_sell_m`(in _product_id int, _cantidad int, out _disponibility boolean)
begin

    declare _existencia int;

    select ec_m + eg_m + eq_m into _existencia from inventories where product_id = _product_id;

    if _existencia > _cantidad then

        set _disponibility=true;

    else

        set _disponibility=false;

    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `pc_sell_s` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `pc_sell_s`(in _product_id int, _cantidad int, out _disponibility boolean)
begin

    declare _existencia int;

    select ec_s + eg_s + eq_s into _existencia from inventories where product_id = _product_id;

    if _existencia > _cantidad then

        set _disponibility=true;

    else

        set _disponibility=false;

    end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TOTAL_COMPRA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `TOTAL_COMPRA`(in buys int, out total float)
BEGIN

    SELECT SUM(cantidad_com * costo_prod)

    into total

    FROM products,

         buyDetails,

         buys

    WHERE products.id = buydetails.product_id

      AND buyDetails.buy_id = buys.id

      and buys.id = buys;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `TOT_VTA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`babel`@`%` PROCEDURE `TOT_VTA`(in sells int, out total float)
BEGIN

    SELECT SUM(cantidad * precio_prod - (cantidad * precio_prod * sellDetails.descuento))

    into total

    FROM products,

         sellDetails,

         sells

    WHERE products.id = sellDetails.product_id

      AND sellDetails.sell_id = sells.id

      and sells.id = sells;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-15 14:30:44
