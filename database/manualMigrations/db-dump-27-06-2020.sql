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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nom_adm` varchar(30) DEFAULT NULL,
  `ap_adm` varchar(30) DEFAULT NULL,
  `am_adm` varchar(30) DEFAULT NULL,
  `correo_adm` varchar(60) DEFAULT NULL,
  `nom_us` varchar(60) DEFAULT NULL,
  `id_suc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_adm`),
  KEY `fk5` (`nom_us`),
  KEY `fk6` (`id_suc`),
  CONSTRAINT `fk5` FOREIGN KEY (`nom_us`) REFERENCES `usuario` (`nom_us`) ON UPDATE CASCADE,
  CONSTRAINT `fk6` FOREIGN KEY (`id_suc`) REFERENCES `sucursal` (`id_suc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Hector Arath','Escobedo','Olguin','hector123@gmail.com','hector12',1),(2,'Ver√≥nica','Lorenzo','Alavez','veronicalorenzo1999@gmail.com','Veronica2',2),(3,'Alma','Lopez','Villegas','alma123@gmail.com','Alma123',3);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL AUTO_INCREMENT,
  `nom_cat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Beb√©'),(2,'Ni√±o'),(3,'Ni√±a'),(4,'Dama'),(5,'Caballero');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_clie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_clie` varchar(30) DEFAULT NULL,
  `ap_clie` varchar(30) DEFAULT NULL,
  `am_clie` varchar(30) DEFAULT NULL,
  `correo_clie` varchar(60) DEFAULT NULL,
  `rfc_clie` varchar(17) DEFAULT NULL,
  `id_dir` int(11) DEFAULT NULL,
  `nom_us` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_clie`),
  KEY `fk7` (`id_dir`),
  KEY `fk8` (`nom_us`),
  CONSTRAINT `fk7` FOREIGN KEY (`id_dir`) REFERENCES `direccion` (`id_dir`),
  CONSTRAINT `fk8` FOREIGN KEY (`nom_us`) REFERENCES `usuario` (`nom_us`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Sergio','L√≥pez','S√°nchez','Vafer Materiales','Pay pal',2,'Sergio123'),(2,'Antonio','Perez','Hern√°ndez','Comercializadora Salazar','Pay pal',4,'Antonio1'),(3,'Victor','Tapia','Martinez','Raksa','Pay pal',4,'Victor1'),(4,'Carlos','Medina','Noguez','Mggm','Credito',5,'Carlos1'),(5,'Omar','Mej√≠a','Rodriguez','Cemex','Credito',7,'Omar1123');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonia`
--

DROP TABLE IF EXISTS `colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colonia` (
  `id_col` int(11) NOT NULL AUTO_INCREMENT,
  `nom_col` varchar(50) DEFAULT NULL,
  `cp` int(5) DEFAULT NULL,
  `id_mun` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_col`),
  KEY `fk2` (`id_mun`),
  CONSTRAINT `fk2` FOREIGN KEY (`id_mun`) REFERENCES `municipio` (`id_mun`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonia`
--

LOCK TABLES `colonia` WRITE;
/*!40000 ALTER TABLE `colonia` DISABLE KEYS */;
INSERT INTO `colonia` VALUES (1,'Vista Alegre',45678,1),(2,'Ignacio Zaragoza',12345,1),(3,'Miguel Hidalgo',87654,2),(4,'Satelite',12098,2),(5,'Las rosas',29340,2),(6,'El Romerillal',10293,3),(7,'Paraiso',76148,4),(8,'15 de mayo',12312,5),(9,'Independencia',34345,6),(10,'5 de febrero',90343,7),(11,'Primavera',90812,8),(12,'10 de abril',90564,8),(13,'Iguaz√∫',789321,8),(14,'Paseos de san Miguel',12221,9),(15,'Mompani',23908,10);
/*!40000 ALTER TABLE `colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_talla`
--

DROP TABLE IF EXISTS `det_talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_talla` (
  `id_dtalla` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) DEFAULT NULL,
  `id_talla` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dtalla`),
  KEY `id_prod` (`id_prod`),
  KEY `id_talla` (`id_talla`),
  CONSTRAINT `det_talla_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `producto` (`id_prod`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `det_talla_ibfk_2` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_talla`
--

LOCK TABLES `det_talla` WRITE;
/*!40000 ALTER TABLE `det_talla` DISABLE KEYS */;
INSERT INTO `det_talla` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,2,1),(6,2,2),(7,2,3),(8,2,4),(9,3,1),(10,3,2),(11,3,3),(12,3,4),(13,4,1),(14,4,2),(15,4,3),(16,4,4),(17,5,1),(18,5,2),(19,5,3),(20,5,4),(21,6,1),(22,6,2),(23,6,3),(24,6,4),(25,7,1),(26,7,2),(27,7,3),(28,7,4),(29,8,1),(30,8,2),(31,8,3),(32,8,4),(33,9,1),(34,9,2),(35,9,3),(36,9,4),(37,10,1),(38,10,2),(39,10,3),(40,10,4);
/*!40000 ALTER TABLE `det_talla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_vta`
--

DROP TABLE IF EXISTS `det_vta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `det_vta` (
  `id_vta` int(11) DEFAULT NULL,
  `id_inv` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  KEY `fk20` (`id_vta`),
  KEY `fk21` (`id_inv`),
  CONSTRAINT `fk20` FOREIGN KEY (`id_vta`) REFERENCES `venta` (`id_vta`) ON UPDATE CASCADE,
  CONSTRAINT `fk21` FOREIGN KEY (`id_inv`) REFERENCES `inventario` (`id_inv`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_vta`
--

LOCK TABLES `det_vta` WRITE;
/*!40000 ALTER TABLE `det_vta` DISABLE KEYS */;
INSERT INTO `det_vta` VALUES (1,1,2),(1,2,2),(1,3,1),(2,4,5),(2,5,1),(2,6,3),(3,7,4),(3,8,2),(3,9,4),(4,10,1),(4,11,2),(4,12,3),(5,13,4),(5,14,2),(5,15,1),(6,16,4),(6,17,2),(6,18,3),(7,19,4),(7,20,5),(8,21,1),(8,22,2),(9,23,3),(9,24,4),(10,25,5),(10,26,6),(10,27,1);
/*!40000 ALTER TABLE `det_vta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
  `id_dir` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(100) DEFAULT NULL,
  `no_ex` int(11) DEFAULT NULL,
  `no_int` int(11) DEFAULT NULL,
  `id_col` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dir`),
  KEY `fk3` (`id_col`),
  CONSTRAINT `fk3` FOREIGN KEY (`id_col`) REFERENCES `colonia` (`id_col`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion`
--

LOCK TABLES `direccion` WRITE;
/*!40000 ALTER TABLE `direccion` DISABLE KEYS */;
INSERT INTO `direccion` VALUES (1,'Universidad',13,1,1),(2,'Los arcos',45,23,2),(3,'Margarita',91,NULL,3),(4,'Amatista',12,2,4),(5,'El globo',90,NULL,5),(6,'Flores Magon',2,NULL,6),(7,'Independecia',13,NULL,7),(8,'De la Paz',9,NULL,8),(9,'Palameres',8,NULL,9),(10,'Portal de San Miguel',34,NULL,10),(11,'El Lienzo',3,NULL,11),(12,'Las Flores',12,NULL,12),(13,'Escoral',24,NULL,13),(14,'Parlamento',1034,NULL,14),(15,'La RAza',153,NULL,15),(16,'Fray Servando',210,NULL,1),(17,'C√≥rdova',113,NULL,2),(18,'Anzures',912,NULL,3),(19,'Los Her√≥es',26,NULL,4),(20,'Condesa',89,NULL,5),(21,'Paseos',19,4,6),(22,'Luis Linas',5,6,7),(23,'Tlaloc',91,NULL,8),(24,'Laguna',200,89,9),(25,'Mayr√°n',409,233,10),(26,'Av. Revoluci√≥n',40,NULL,11),(27,'G√∫zman',349,345,12),(28,'La Negreta',93,NULL,13),(29,'Onega',1234,NULL,14),(30,'Amatista',34,NULL,3),(31,'Del placer',23,NULL,7),(32,'Miguel Hidalgo',67,NULL,13);
/*!40000 ALTER TABLE `direccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `id_est` int(11) NOT NULL AUTO_INCREMENT,
  `nom_est` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_est`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Aguascalientes'),(2,'Baja california norte'),(3,'Baja california sur'),(4,'Campeche'),(5,'Coahuila'),(6,'Colima'),(7,'Chiapas'),(8,'Chihuahua'),(9,'Ciudad de M√©xico'),(10,'Durango'),(11,'Guanajuato'),(12,'Guerrero'),(13,'Hidalgo'),(14,'Jalisco'),(15,'Mexico'),(16,'Michoacan'),(17,'Morelos'),(18,'Nayarit'),(19,'Nuevo Leon'),(20,'Oaxaca'),(21,'Puebla'),(22,'Queretaro'),(23,'Quintana Roo'),(24,'San Luis Potosi'),(25,'Sinaloa'),(26,'Sonora'),(27,'Tabasco'),(28,'Tamaulipas'),(29,'Tlaxcala'),(30,'Veracruz'),(31,'Yucatan'),(32,'Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `factura` (
  `folio_fac` int(11) NOT NULL AUTO_INCREMENT,
  `fec_fac` date DEFAULT NULL,
  `id_vta` int(11) DEFAULT NULL,
  PRIMARY KEY (`folio_fac`),
  KEY `fk19` (`id_vta`),
  CONSTRAINT `fk19` FOREIGN KEY (`id_vta`) REFERENCES `venta` (`id_vta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'2020-04-12',1),(2,'2020-04-27',3),(3,'2020-05-03',5),(4,'2020-05-12',9),(5,'2020-05-15',10);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventario` (
  `id_inv` int(11) NOT NULL AUTO_INCREMENT,
  `exist_inv` int(11) DEFAULT NULL,
  `stat_inv` varchar(30) DEFAULT NULL,
  `id_dtalla` int(11) DEFAULT NULL,
  `id_suc` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_inv`),
  KEY `fk16` (`id_dtalla`),
  KEY `id_suc` (`id_suc`),
  CONSTRAINT `fk16` FOREIGN KEY (`id_dtalla`) REFERENCES `det_talla` (`id_dtalla`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_suc`) REFERENCES `sucursal` (`id_suc`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,54,'De temporada',1,1),(2,124,'De temporada',5,1),(3,200,'De temporada',9,1),(4,230,'De temporada',13,1),(5,10,'Liquidaci√≥n',17,1),(6,13,'De temporada',21,1),(7,200,'De temporada',25,1),(8,100,'De temporada',29,1),(9,120,'De temporada',30,1),(10,21,'Liquidaci√≥n',3,1),(11,54,'De temporada',2,2),(12,124,'De temporada',6,2),(13,200,'De temporada',10,2),(14,230,'De temporada',14,2),(15,10,'Liquidaci√≥n',18,2),(16,13,'De temporada',22,2),(17,200,'De temporada',26,2),(18,100,'De temporada',30,2),(19,120,'De temporada',3,2),(20,21,'Liquidaci√≥n',3,2),(21,54,'De temporada',7,3),(22,124,'De temporada',11,3),(23,200,'De temporada',15,3),(24,230,'De temporada',19,3),(25,10,'Liquidaci√≥n',23,3),(26,21,'Liquidaci√≥n',27,3),(27,100,'De temporada',31,3),(28,80,'De temporada',1,3),(29,90,'De temporada',5,3),(30,20,'Liquidaci√≥n',4,3),(31,18,'Liquidaci√≥n',1,3);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `municipio` (
  `id_mun` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mun` varchar(70) DEFAULT NULL,
  `id_est` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mun`),
  KEY `fk1` (`id_est`),
  CONSTRAINT `fk1` FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'AGUASCALIENTES',9),(2,'ASIENTOS',9),(3,'CALVILLO',9),(4,'COSIO',9),(5,'DIXON,CA',14),(6,'EL LLANO',14),(7,'JESUS MARIA',14),(8,'logimayab',22),(9,'PABELLON DE ARTEAGA',22),(10,'RINCON DE ROMOS',22);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago`
--

DROP TABLE IF EXISTS `pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `fec_pago` date DEFAULT NULL,
  `tipo_pago` varchar(30) DEFAULT NULL,
  `id_vta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pago`),
  KEY `fk18` (`id_vta`),
  CONSTRAINT `fk18` FOREIGN KEY (`id_vta`) REFERENCES `venta` (`id_vta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago`
--

LOCK TABLES `pago` WRITE;
/*!40000 ALTER TABLE `pago` DISABLE KEYS */;
INSERT INTO `pago` VALUES (1,'2020-03-12','Debito',1),(2,'2020-03-13','Debito',2),(3,'2020-03-27','Paypal',3),(4,'2020-03-20','Paypal',4),(5,'2020-04-03','Paypal',5),(6,'2020-04-05','Paypal',6),(7,'2020-04-16','Debito',7),(8,'2020-04-18','Debito',8),(9,'2020-05-12','Paypal',9),(10,'2020-05-15','Paypal',10);
/*!40000 ALTER TABLE `pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `id_estado` int(11) DEFAULT NULL,
  `nom_prod` varchar(100) DEFAULT NULL,
  `desc_prod` varchar(200) DEFAULT NULL,
  `costo_prod` float(10,2) DEFAULT NULL,
  `precio_prod` float(10,2) DEFAULT NULL,
  `mat_prod` varchar(50) DEFAULT NULL,
  `img_prod` varchar(100) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_prod`),
  KEY `fk13` (`id_tipo`),
  KEY `fk14` (`id_cat`),
  KEY `fk15` (`id_prov`),
  CONSTRAINT `fk13` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk14` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk15` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'Gerber Body ','Set de 5 Unidades variadas de Mono para ni√±os',250.00,350.00,'Algod√≥n',NULL,1,1,1),(2,1,'Camisa blanca, estampado 2','Tommy Hilfiger CD87176401',220.00,340.00,'90% algod√≥n',NULL,2,2,2),(3,1,'Camisa bajo con nudo','Camisa amarilla, con nudo bajo de manga a capas',100.00,180.00,'Poli√©ster y algod√≥n',NULL,3,3,3),(4,1,'Sudadera Liso Rosa','Sudaderas Cord√≥n Liso, hombro caido Rosa Casual',290.00,560.00,'97% Poli√©ster, 3% spandex',NULL,4,4,4),(5,1,'Pantal√≥n chino','Pantal√≥n  chino cafe regular fit¬∑',780.00,1000.00,'97% Algod√≥n 3% Elastano',NULL,5,5,5),(6,1,'Gerber Body estampado ','Gerber body Mono para ni√±os',150.00,250.00,'Algod√≥n 100%',NULL,1,1,1),(7,1,'Camisa roja estampado 2','Camisa roja Tommy Hilfiger ',320.00,440.00,'90% algod√≥n',NULL,2,2,2),(8,1,'Playera top','Camisa amarilla, con nudo bajo de manga a capas',100.00,180.00,'Poli√©ster y algod√≥n',NULL,3,3,3),(9,1,'Sudadera Estampado ','Sudaderas Cord√≥n Liso, hombro caido Rosa Casual',290.00,560.00,'97% Poli√©ster',NULL,4,4,4),(10,1,'Pantal√≥n mezclica','Pantal√≥n  mezclilla regular fit¬∑',780.00,1000.00,'97% Algod√≥n 3% Elastano',NULL,5,5,5);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prov` varchar(30) DEFAULT NULL,
  `ap_prov` varchar(50) DEFAULT NULL,
  `am_prov` varchar(30) DEFAULT NULL,
  `desc_prov` varchar(30) DEFAULT NULL,
  `correo_prov` varchar(70) DEFAULT NULL,
  `rfc_prov` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id_prov`),
  UNIQUE KEY `correo_prov` (`correo_prov`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'Antonio','Resendiz','Martinez','Prendas textiles','antonioresendiz@gmail.com','REMA029369I19'),(2,'Monserrat','Hern√°ndez','Guevara','Textiles SA de CV.','textiles123@hotmail.com','HEGM120890V27'),(3,'Luis','Luna','Carbajal','Prendas de Mexico','prendasmex123@gmail.com','LUCL091296'),(4,'Miguel','D√≠az','Bermudez','Distribuidora de textiles','migueldiaz@gmail.com','BEBM345679I11'),(5,'Santiago','Lopez','Mendoza','Textles lopez','santiago123@gmail.com','LOMS231199HU');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sucursal` (
  `id_suc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_suc` varchar(30) DEFAULT NULL,
  `id_dir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suc`),
  KEY `fk4` (`id_dir`),
  CONSTRAINT `fk4` FOREIGN KEY (`id_dir`) REFERENCES `direccion` (`id_dir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1,'SUCURSAL CDMX',1),(2,'SUCURSAL JALISO',5),(3,'SUCURSAL',8);
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talla`
--

DROP TABLE IF EXISTS `talla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `talla` (
  `id_talla` int(11) NOT NULL AUTO_INCREMENT,
  `nom_talla` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_talla`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talla`
--

LOCK TABLES `talla` WRITE;
/*!40000 ALTER TABLE `talla` DISABLE KEYS */;
INSERT INTO `talla` VALUES (1,'Chica'),(2,'Mediana'),(3,'Grande'),(4,'Extra grande');
/*!40000 ALTER TABLE `talla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `telefono` (
  `id_tel` int(11) NOT NULL AUTO_INCREMENT,
  `num_tel` char(13) DEFAULT NULL,
  `id_clie` int(11) DEFAULT NULL,
  `id_suc` int(11) DEFAULT NULL,
  `id_prov` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tel`),
  KEY `fk10` (`id_clie`),
  KEY `fk11` (`id_suc`),
  KEY `fk12` (`id_prov`),
  CONSTRAINT `fk10` FOREIGN KEY (`id_clie`) REFERENCES `cliente` (`id_clie`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk11` FOREIGN KEY (`id_suc`) REFERENCES `sucursal` (`id_suc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk12` FOREIGN KEY (`id_prov`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
INSERT INTO `telefono` VALUES (1,'44256789231',1,NULL,NULL),(2,'4467132456',2,NULL,NULL),(3,'4457890129',2,NULL,NULL),(4,'5567324150',3,NULL,NULL),(5,'5612341266',4,NULL,NULL),(6,'4429090189',5,NULL,NULL),(7,'5612899911',NULL,1,NULL),(8,'4467162699',NULL,2,NULL),(9,'4410102938',NULL,3,NULL),(10,'4412901029',NULL,NULL,1),(11,'4412309023',NULL,NULL,1),(12,'4290653411',NULL,NULL,2),(13,'5512347878',NULL,NULL,2),(14,'4231674511',NULL,NULL,3),(15,'5590765644',NULL,NULL,4),(16,'5556433312',NULL,NULL,4),(17,'4423563444',NULL,NULL,5);
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'Playera'),(2,'Camisa'),(3,'Blusa'),(4,'Sudadera'),(5,'Pantal√≥n');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `nom_us` varchar(60) NOT NULL,
  `pass_us` blob,
  `tipo_us` int(11) DEFAULT NULL,
  PRIMARY KEY (`nom_us`),
  UNIQUE KEY `nom_us` (`nom_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('Alma123',_binary 'ÇCFX7reßW?',1),('Antonio1',_binary '2t6\Â-A\Î\ﬁ,ã\Ï1\Âr~',2),('Carlos1',_binary 'åvã.ïçòÚ\‹Ç\Ó£\r',2),('hector12',_binary '_çVrS=ıMMN\Óg˜65',1),('Omar1123',_binary '\‹˝\÷˜\ÃÛ≠◊ø±ˇK\Î',2),('Sergio123',_binary 'êˆ\«icí¢7k0óÉi',2),('Veronica2',_binary 'Yº\Ë\'3¶)*¿û[∏bU®b',1),('Victor1',_binary '\ÂÆ≠Ñk∂µ\Ï`,µ\Ì\…–é',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venta` (
  `id_vta` int(11) NOT NULL AUTO_INCREMENT,
  `fec_vta` date DEFAULT NULL,
  `monto_pago` float(10,2) DEFAULT NULL,
  `status_vta` varchar(50) DEFAULT NULL,
  `id_clie` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_vta`),
  KEY `fk17` (`id_clie`),
  CONSTRAINT `fk17` FOREIGN KEY (`id_clie`) REFERENCES `cliente` (`id_clie`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,'2020-03-12',0.00,'Finalizado',1),(2,'2020-03-13',0.00,'Finalizado',1),(3,'2020-03-27',0.00,'Finalizado',2),(4,'2020-03-20',0.00,'Finalizado',3),(5,'2020-04-03',0.00,'Finalizado',5),(6,'2020-04-05',0.00,'Finalizado',3),(7,'2020-04-16',0.00,'Finalizado',4),(8,'2020-04-18',0.00,'Finalizado',4),(9,'2020-05-12',0.00,'Finalizado',5),(10,'2020-05-15',0.00,'Finalizado',2);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-27 19:12:24
