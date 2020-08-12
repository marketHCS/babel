-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: tienda
-- ------------------------------------------------------
-- Server version	5.7.29-log

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
-- Dumping data for table `addresses`
--

LOCK TABLES `addresses` WRITE;
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
INSERT INTO `addresses` VALUES (1,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 03:31:19','2020-08-11 03:31:19',1,NULL),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-11 03:31:19','2020-08-11 03:31:19',2,NULL),(3,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 03:32:08','2020-08-11 03:32:08',NULL,NULL),(4,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 03:49:26','2020-08-11 03:49:26',NULL,NULL),(5,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 04:16:20','2020-08-11 04:16:20',NULL,NULL),(6,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 13:11:31','2020-08-11 13:11:31',NULL,NULL),(7,'Prol. Francisco Zarco',15,1,'San José','Tula de Allende','Hidalgo','42805','2020-08-11 13:42:48','2020-08-11 13:42:48',NULL,NULL),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-08-11 13:48:53','2020-08-11 13:48:53',3,NULL);
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (1,'2020-08-10 22:31:19','2020-08-10 22:31:19',1,NULL),(2,'2020-08-10 22:31:19','2020-08-10 22:31:19',2,NULL),(3,'2020-08-10 22:32:08','2020-08-10 22:32:08',1,NULL),(4,'2020-08-10 22:49:26','2020-08-10 22:49:26',1,NULL),(5,'2020-08-10 23:16:20','2020-08-10 23:16:20',1,NULL),(6,'2020-08-11 08:11:31','2020-08-11 08:11:31',1,NULL),(7,'2020-08-11 08:42:48','2020-08-11 08:42:48',1,NULL),(8,'2020-08-11 08:48:06','2020-08-11 08:48:06',1,NULL),(9,'2020-08-11 08:48:11','2020-08-11 08:48:11',1,NULL),(10,'2020-08-12 00:56:55','2020-08-12 00:56:55',3,NULL),(11,'2020-08-12 00:59:17','2020-08-12 00:59:17',3,NULL);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jamahcs`@`%`*/ /*!50003 trigger timestamps

    before insert

    on administrators

    for each row

begin

    set new.created_at = now();

    set new.updated_at = now();

end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping data for table `audits`
--

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `buycomment`
--

LOCK TABLES `buycomment` WRITE;
/*!40000 ALTER TABLE `buycomment` DISABLE KEYS */;
/*!40000 ALTER TABLE `buycomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `buydetails`
--

LOCK TABLES `buydetails` WRITE;
/*!40000 ALTER TABLE `buydetails` DISABLE KEYS */;
/*!40000 ALTER TABLE `buydetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jamahcs`@`%`*/ /*!50003 TRIGGER total_com

    AFTER INSERT

    ON buyDetails

    FOR EACH ROW

BEGIN

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
-- Dumping data for table `buys`
--

LOCK TABLES `buys` WRITE;
/*!40000 ALTER TABLE `buys` DISABLE KEYS */;
/*!40000 ALTER TABLE `buys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `buystatus`
--

LOCK TABLES `buystatus` WRITE;
/*!40000 ALTER TABLE `buystatus` DISABLE KEYS */;
INSERT INTO `buystatus` VALUES (1,'En proceso'),(2,'Realizada'),(3,'Cancelada'),(4,'sin completar');
/*!40000 ALTER TABLE `buystatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Apolo',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(2,'Babel',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(3,'Bojack Horseman',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(4,'Unicornios',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(5,'Art',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(6,'Mex',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(7,'Videojuegos',1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(8,'Mr Robot',1,'2020-08-11 03:31:19','2020-08-11 03:31:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `imagesproducts`
--

LOCK TABLES `imagesproducts` WRITE;
/*!40000 ALTER TABLE `imagesproducts` DISABLE KEYS */;
INSERT INTO `imagesproducts` VALUES (1,'products/5.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',12),(2,'products/7.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',10),(3,'products/8.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',11),(4,'products/apolo-amstrong.png','2020-08-11 03:31:19','2020-08-11 03:31:19',2),(5,'products/apolo-amstrong-source.png','2020-08-11 03:31:19','2020-08-11 03:31:19',2),(6,'products/babel.png','2020-08-11 03:31:19','2020-08-11 03:31:19',1),(7,'products/babel-source.png','2020-08-11 03:31:19','2020-08-11 03:31:19',1),(8,'products/bojack-head.png','2020-08-11 03:31:19','2020-08-11 03:31:19',3),(9,'products/bojack-head-source.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',3),(10,'products/hackerman.png','2020-08-11 03:31:19','2020-08-11 03:31:19',4),(11,'products/hackerman-source.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',4),(12,'products/i-want-to-be-architec.png','2020-08-11 03:31:19','2020-08-11 03:31:19',5),(13,'products/i-want-to-be-architec-source.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',5),(14,'products/licorne.png','2020-08-11 03:31:19','2020-08-11 03:31:19',6),(15,'products/licorne-source.png','2020-08-11 03:31:19','2020-08-11 03:31:19',6),(16,'products/mar-de-nubes.png','2020-08-11 03:31:19','2020-08-11 03:31:19',7),(17,'products/mar-de-nubes-source.jpg','2020-08-11 03:31:19','2020-08-11 03:31:19',7),(18,'products/quetza.png','2020-08-11 03:31:19','2020-08-11 03:31:19',8),(19,'products/quetza-source.png','2020-08-11 03:31:19','2020-08-11 03:31:19',8),(20,'products/YHLQMDLG.png','2020-08-11 03:31:19','2020-08-11 03:31:19',9),(21,'products/YHLQMDLG-source.png','2020-08-11 03:31:19','2020-08-11 03:31:19',9);
/*!40000 ALTER TABLE `imagesproducts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (1,50,8,15,0,50,10,10,24,5,'2020-08-10 22:31:19','2020-08-11 13:43:12',1),(2,10,19,19,0,100,15,15,30,40,'2020-08-10 22:31:19','2020-08-11 03:32:32',2),(3,20,50,2,20,60,31,2,100,40,'2020-08-10 22:31:19','2020-08-11 04:16:41',3),(4,15,40,15,10,40,10,10,60,30,'2020-08-10 22:31:19','2020-08-10 22:31:19',4),(5,19,13,20,10,2,60,19,17,13,'2020-08-10 22:31:19','2020-08-10 22:31:19',5),(6,24,15,14,8,8,2,7,4,8,'2020-08-10 22:31:19','2020-08-10 22:31:19',6),(7,30,15,4,15,15,10,5,13,10,'2020-08-10 22:31:19','2020-08-10 22:31:19',7),(8,12,2,2,14,11,1,2,10,15,'2020-08-10 22:31:19','2020-08-10 22:31:19',8),(9,5,20,18,24,19,10,10,2,8,'2020-08-10 22:31:19','2020-08-10 22:31:19',9),(10,0,0,0,0,0,0,0,0,0,'2020-08-10 22:31:19','2020-08-10 22:31:19',10),(11,0,0,0,0,0,0,0,0,0,'2020-08-10 22:31:19','2020-08-10 22:31:19',11),(12,0,0,0,0,0,0,0,0,0,'2020-08-10 22:31:19','2020-08-10 22:31:19',12);
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_05_03_000001_create_customer_columns',1),(3,'2019_05_03_000002_create_subscriptions_table',1),(4,'2019_05_03_000003_create_subscription_items_table',1),(5,'2019_08_19_000000_create_failed_jobs_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `offices`
--

LOCK TABLES `offices` WRITE;
/*!40000 ALTER TABLE `offices` DISABLE KEYS */;
INSERT INTO `offices` VALUES (1,'Ciudad de México',NULL,'2020-08-10 22:30:52','2020-08-10 22:30:52',NULL),(2,'Guadalajara',NULL,'2020-08-10 22:30:52','2020-08-10 22:30:52',NULL),(3,'Querétaro',NULL,'2020-08-10 22:30:52','2020-08-10 22:30:52',NULL);
/*!40000 ALTER TABLE `offices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pays`
--

LOCK TABLES `pays` WRITE;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` VALUES ('pi_1HEjo8JMj1omTiKmTGUmNxR6','card',NULL,'requires_payment_method',35000,'2020-08-11 03:49:46','2020-08-11 03:49:46',2),('pi_1HEjXQJMj1omTiKmLIlE7jv1','card','hnetflix@gmail.com','succeeded',35000,'2020-08-11 03:32:33','2020-08-11 03:32:33',1),('pi_1HEkEAJMj1omTiKmkY0E6nWQ','card','hnetflix@gmail.com','succeeded',35000,'2020-08-11 04:16:42','2020-08-11 04:16:42',3),('pi_1HEt4MJMj1omTiKmUm3WiJ5S','card','hnetflix@gmail.com','succeeded',70000,'2020-08-11 13:43:13','2020-08-11 13:43:13',5);
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,2,'Babel','Playera bien bonita de la marca',300,350,NULL,'Algodón',2,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(2,2,'Apolo Amstrong','Playera bien bonita de Apolo cuando fue a la luna',300,350,NULL,'Algodón',1,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(3,2,'Horseman','¿Es el caballo de retozando?',300,350,NULL,'Algodón',3,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(4,2,'Hackerman','¿Elliot? ¿Qué estás haciendo?',300,350,NULL,'Algodón',8,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(5,2,'El mirador','¿Bojack? Quiero ser arquitecta.',300,350,NULL,'Algodón',3,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(6,2,'Licorne','Playera de los Toramigos.',300,350,NULL,'Algodón',4,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(7,2,'Mar de nubes','El caminante sobre el mar de nubes',300,350,NULL,'Algodón',5,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(8,2,'Quetza','Playera diseñada por XSierra, estudiante de la carrera de diseño de videojuegos.',300,350,NULL,'Algodón',6,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(9,2,'YHLQMDLG','Yo hago lo que me de la gana. ¿Oiste humano?',300,350,NULL,'Algodón',1,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(10,2,'Halo Guardians','Playera negra de Halo con estampado blanco',300,350,NULL,'Algodón',7,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(11,2,'Gears of War','Payera negra de gears of wars manga corta',300,350,NULL,'Algodón',7,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(12,2,'Guitar Hero','Playera negra Guitar hero con estampado verde',300,350,NULL,'Algodón',7,1,1,'2020-08-11 03:31:19','2020-08-11 03:31:19');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jamahcs`@`%`*/ /*!50003 trigger verificaPrecio

    before insert

    on products

    for each row

begin

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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jamahcs`@`%`*/ /*!50003 trigger prodXtrigger

    after insert

    on products

    FOR EACH ROW

begin

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
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`jamahcs`@`%`*/ /*!50003 trigger Auditoria

    before update

    on products

    for each row

begin

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
-- Dumping data for table `providers`
--

LOCK TABLES `providers` WRITE;
/*!40000 ALTER TABLE `providers` DISABLE KEYS */;
INSERT INTO `providers` VALUES (1,NULL,'Printful',NULL,NULL,'Printful','Proveedor de dropshiping ropa.','printful@printful.com',NULL,1,'2020-08-11 03:31:19','2020-08-11 03:31:19'),(2,NULL,'JamaProvider',NULL,NULL,'JamaProvider','Jama prooveedor.','jama@jamaaa.me',NULL,1,'2020-08-11 03:31:19','2020-08-11 03:31:19');
/*!40000 ALTER TABLE `providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `selldetails`
--

LOCK TABLES `selldetails` WRITE;
/*!40000 ALTER TABLE `selldetails` DISABLE KEYS */;
INSERT INTO `selldetails` VALUES (1,350,3,'2020-08-11 03:32:08','2020-08-11 03:32:08',1,2,2,0,'2'),(2,350,1,'2020-08-11 03:49:26','2020-08-11 03:49:26',2,3,3,0,'2'),(3,350,1,'2020-08-11 04:16:20','2020-08-11 04:16:20',3,3,3,0,'2'),(4,350,2,'2020-08-11 13:11:31','2020-08-11 13:11:31',4,1,1,0,'2'),(5,350,2,'2020-08-11 13:42:48','2020-08-11 13:42:48',5,1,1,0,'2');
/*!40000 ALTER TABLE `selldetails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `sells`
--

LOCK TABLES `sells` WRITE;
/*!40000 ALTER TABLE `sells` DISABLE KEYS */;
INSERT INTO `sells` VALUES (1,2,6546,'p',1400,'2020-08-11 03:32:08','2020-08-11 03:35:53',1,3),(2,3,55,'l',350,'2020-08-11 03:49:26','2020-08-11 03:49:26',1,4),(3,2,546,'jgk',350,'2020-08-11 04:16:20','2020-08-11 13:36:13',1,5),(4,2,773158,'jhgfjh',700,'2020-08-11 13:11:31','2020-08-11 13:35:42',1,6),(5,1,7735165,'HOla soy jama',700,'2020-08-11 13:42:48','2020-08-11 13:42:48',1,7);
/*!40000 ALTER TABLE `sells` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `shipments`
--

LOCK TABLES `shipments` WRITE;
/*!40000 ALTER TABLE `shipments` DISABLE KEYS */;
INSERT INTO `shipments` VALUES (1,'asd','11','2020-08-27','2020-08-21','2020-08-11 03:32:08','2020-08-11 03:35:45',1,NULL,NULL),(2,NULL,NULL,NULL,NULL,'2020-08-11 03:32:33','2020-08-11 03:32:33',1,1,3),(3,NULL,NULL,NULL,NULL,'2020-08-11 03:49:26','2020-08-11 03:49:26',2,NULL,NULL),(4,NULL,NULL,NULL,NULL,'2020-08-11 04:16:20','2020-08-11 04:16:20',3,NULL,NULL),(5,NULL,NULL,NULL,NULL,'2020-08-11 04:16:42','2020-08-11 04:16:42',3,1,5),(6,NULL,NULL,NULL,NULL,'2020-08-11 13:11:31','2020-08-11 13:11:31',4,NULL,NULL),(7,NULL,NULL,NULL,NULL,'2020-08-11 13:42:48','2020-08-11 13:42:48',5,NULL,NULL),(8,NULL,NULL,NULL,NULL,'2020-08-11 13:43:13','2020-08-11 13:43:13',5,1,7);
/*!40000 ALTER TABLE `shipments` ENABLE KEYS */;
UNLOCK TABLES;


--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES ('BABEL-004','https://www.babel.fashion/factures/download/4',NULL,'2020-08-11 13:35:42','2020-08-11 13:35:42',4),('ch_1HEjXfJMj1omTiKmSdr8Co4z','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HEjXfJMj1omTiKmSdr8Co4z/rcpt_HoMGMMUFTowsAMaTcSQ1XKJibpXF0zx','cus_HoMGLCHkwSJVpJ','2020-08-11 03:32:33','2020-08-11 03:32:33',1),('ch_1HEkEOJMj1omTiKmcnUrE7Bx','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HEkEOJMj1omTiKmcnUrE7Bx/rcpt_HoMy6T5GkXpHbCix7IlsOQT4TR6u6WR','cus_HoMySkO2pt2ETx','2020-08-11 04:16:42','2020-08-11 04:16:42',3),('ch_1HEt4dJMj1omTiKm1Jtsussa','https://pay.stripe.com/receipts/acct_1HAW7xJMj1omTiKm/ch_1HEt4dJMj1omTiKm1Jtsussa/rcpt_HoW66LZOQVJ7F2xAZ0n6Tl62vLNjhMi','cus_HoW68oMb6LksyA','2020-08-11 13:43:13','2020-08-11 13:43:13',5),('pi_1HEjo8JMj1omTiKmTGUmNxR6',NULL,NULL,'2020-08-11 03:49:46','2020-08-11 03:49:46',2);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,3,7735165,'Jama Ideal','Escobedo','Olguín','jamahcs@outlook.com','2020-08-10 22:31:18','$2y$10$haNkmCn4Ftem.Qt6fYNXu.Eh5wuWOjmFLwkmgUHGocn2Nbqa9mW66','https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/85125424_4065065830186046_1976842346767056896_o.jpg?_nc_cat=111&_nc_sid=09cbfe&_nc_eui2=AeFVRrxob1UgdrIgkUPKMCaFVNpve6GT8EVU2m97oZPwRUMDRCAD9dTsiBAWAw3G09Ju9c0MEw_KxIUf9cypyeYM&_nc_ohc=iyh3SEWM78UAX_8T06c&_nc_ht=scontent.fmex10-2.fna&oh=7ef1cd539cf0b4275d5ebc4de1f887d4&oe=5F54C4CF','2000-03-20',NULL,'2020-08-11 03:31:18','2020-08-11 03:31:18',1,'nECVDe56ZI1vPBtOMNindOv9KcGm8hich2g3lbbpQbLnZzyeK89ddnWuERTQ',NULL,NULL,NULL,NULL),(2,3,NULL,'Verónica ','Lorenzo','Alavez','veronicalorenzo1999@gmail.com','2020-08-10 22:31:19','$2y$10$iP/Cmvd0FB1tM0mwOOS8vOhFCJYPsaI5LkxrIpzTfT9jKZC/NuYom','https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/105304380_3055814717827936_7436596492019864306_o.jpg?_nc_cat=109&_nc_sid=09cbfe&_nc_eui2=AeE1Tx6zi6boHoy0V1vOdxh4UxoQkknRbRZTGhCSSdFtFnB-jOfIM3XhLUA4Zz5aadvuOBpEEFhYuM8hUhxK7vZm&_nc_ohc=fa9sWT-b0FcAX8p0ffe&_nc_ht=scontent.fmex10-2.fna&oh=262fc00d3bc5e9296705409ae3eb62b1&oe=5F547DA5','1999-02-03',NULL,'2020-08-11 03:31:19','2020-08-11 03:31:19',2,NULL,NULL,NULL,NULL,NULL),(3,1,NULL,'Apolo','Ideal','The Dog','apolohcs@outlook.com','2020-08-11 08:48:53','$2y$10$tafo3QDy00xSs2ZW38Qy0.bAEYf2j2oef09upG5SMvObj1XVVhDb.','https://api.adorable.io/avatars/285/ApoloIdealTheDog.png','2000-03-20',NULL,'2020-08-11 13:48:53','2020-08-12 05:59:24',1,NULL,'cus_HoWCUdBKJHhq3g',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;