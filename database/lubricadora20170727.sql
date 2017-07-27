-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lubricadora
-- ------------------------------------------------------
-- Server version	5.7.11-log

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
-- Table structure for table `clase_vehiculo`
--

DROP TABLE IF EXISTS `clase_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_vehiculo` (
  `clase_vehiculo_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(10) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` varchar(45) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`clase_vehiculo_id`),
  KEY `fk_clase_vehiculo_estado_idx` (`estado_id`),
  CONSTRAINT `fk_clase_vehiculo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_vehiculo`
--

LOCK TABLES `clase_vehiculo` WRITE;
/*!40000 ALTER TABLE `clase_vehiculo` DISABLE KEYS */;
INSERT INTO `clase_vehiculo` VALUES (1,1,'Moto','prueba',NULL,NULL,NULL,NULL),(2,1,'tricimoto','prueba',NULL,NULL,NULL,NULL),(3,1,'Vehiculos Livianos y vehicuos pesados','pruebas',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clase_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clase_vehiculo_servicio`
--

DROP TABLE IF EXISTS `clase_vehiculo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clase_vehiculo_servicio` (
  `clase_vehiculo_servicio_id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_servicio_id` int(10) NOT NULL,
  `clase_vehiculo_id` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `tipo_tiempo_id` int(10) NOT NULL,
  `dias_personal` int(5) DEFAULT NULL,
  `dias_trabajo` int(5) DEFAULT NULL,
  `tiempo_servicio` int(10) DEFAULT NULL,
  PRIMARY KEY (`clase_vehiculo_servicio_id`),
  KEY `fk_clase_vehiculo_x_clase_servicio_idx` (`clase_vehiculo_id`),
  KEY `fk_clase_vehiculo_x_tipo_servicio_idx` (`tipo_servicio_id`),
  KEY `fk_clase_veiculo_estado_idx` (`estado_id`),
  KEY `fk_clase_vehiculo_tipo_tiempo_idx` (`tipo_tiempo_id`),
  CONSTRAINT `fk_clase_vehiculo_tipo_tiempo` FOREIGN KEY (`tipo_tiempo_id`) REFERENCES `tipo_tiempo` (`tipo_tiempo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_vehiculo_x_clase_servicio` FOREIGN KEY (`clase_vehiculo_id`) REFERENCES `clase_vehiculo` (`clase_vehiculo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_vehiculo_x_tipo_servicio` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicio` (`tipo_servicio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clase_veiculo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clase_vehiculo_servicio`
--

LOCK TABLES `clase_vehiculo_servicio` WRITE;
/*!40000 ALTER TABLE `clase_vehiculo_servicio` DISABLE KEYS */;
INSERT INTO `clase_vehiculo_servicio` VALUES (7,1,1,1,2,NULL,NULL,8),(8,2,1,1,3,NULL,NULL,2),(9,9,2,1,1,15,20,1000),(10,8,2,1,3,NULL,NULL,3),(11,9,1,1,1,90,45,10000),(12,12,2,1,3,NULL,NULL,3);
/*!40000 ALTER TABLE `clase_vehiculo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cliente_id` int(10) NOT NULL AUTO_INCREMENT,
  `estado_id` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `movil` varchar(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `fecha_registro` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`),
  KEY `fk_cliente_estado_idx` (`estado_id`),
  CONSTRAINT `fk_cliente_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=198 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (194,1,'jose','rendon','0927124222','2345456','3434343','jose@gmail.com','sauces4','2017-07-14 22:24:15'),(195,1,'fanny','ortiz','1802077154','2480109','098987898','fanny@gmail.com','sauces4','2017-07-14 22:34:17'),(196,1,'laura','preciado','0928282797','042695641','0999501561','preciado19@gmail.com','trinipollo','2017-07-15 00:28:43'),(197,1,'Wilmer Junior','Vera','0940358006','0987453654','2654125','juniorwavg@gmail.com','sauces 5','2017-07-17 17:40:52');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_vehiculo`
--

DROP TABLE IF EXISTS `cliente_vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_vehiculo` (
  `cliente_vehiculo_id` int(10) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) NOT NULL,
  `vehiculo_id` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` varchar(45) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cliente_vehiculo_id`),
  KEY `fk_vehiculo_idx` (`vehiculo_id`),
  KEY `fk_cliente_idx` (`cliente_id`),
  KEY `fk_estado_idx` (`estado_id`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_vehiculo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculo` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculo` (`vehiculo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_vehiculo`
--

LOCK TABLES `cliente_vehiculo` WRITE;
/*!40000 ALTER TABLE `cliente_vehiculo` DISABLE KEYS */;
INSERT INTO `cliente_vehiculo` VALUES (112,194,113,1,'2017-07-14','1',NULL,NULL),(113,194,114,1,'2017-07-14','1',NULL,NULL),(122,194,123,1,'2017-07-14','1',NULL,NULL),(123,194,124,2,'2017-07-14','1',NULL,NULL),(124,195,125,1,'2017-07-14','1',NULL,NULL),(125,195,126,1,'2017-07-14','1',NULL,NULL),(126,195,127,1,'2017-07-14','1',NULL,NULL),(127,196,128,1,'2017-07-15','1',NULL,NULL),(128,196,129,1,'2017-07-15','1',NULL,NULL),(129,197,130,1,'2017-07-17','1',NULL,NULL),(130,197,131,2,'2017-07-17','1',NULL,NULL),(131,197,132,1,'2017-07-17','1',NULL,NULL);
/*!40000 ALTER TABLE `cliente_vehiculo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `det_servicios_cliente`
--

DROP TABLE IF EXISTS `det_servicios_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `det_servicios_cliente` (
  `det_servicios_cliente_id` int(10) NOT NULL AUTO_INCREMENT,
  `clase_vehiculo_servicio_id` int(10) NOT NULL,
  `cliente_vehiculo_id` int(10) NOT NULL,
  `insumos_id` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `kilometraje_inicio` int(10) DEFAULT NULL,
  `kilometraje_sustitucion` int(10) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_sustitucion` date DEFAULT NULL,
  `cantidad_cambio` int(10) DEFAULT NULL,
  `servicios_cliente_id` int(10) NOT NULL,
  PRIMARY KEY (`det_servicios_cliente_id`),
  KEY `insumos_id_idx` (`insumos_id`),
  KEY `fk_servicios_x_clase_vehiculo_serv_idx` (`clase_vehiculo_servicio_id`),
  KEY `fk_servicios_cliente_vehiculo_idx` (`cliente_vehiculo_id`),
  KEY `fk_servicios_cliente_estado_idx` (`estado_id`),
  KEY `fk_cab_servicios_cliente_idx` (`servicios_cliente_id`),
  CONSTRAINT `fk_cab_servicios_cliente` FOREIGN KEY (`servicios_cliente_id`) REFERENCES `servicios_cliente` (`servicios_cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_insumos_id` FOREIGN KEY (`insumos_id`) REFERENCES `insumos` (`insumos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_cliente_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_cliente_vehiculo` FOREIGN KEY (`cliente_vehiculo_id`) REFERENCES `cliente_vehiculo` (`cliente_vehiculo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_servicios_x_clase_vehiculo_serv` FOREIGN KEY (`clase_vehiculo_servicio_id`) REFERENCES `clase_vehiculo_servicio` (`clase_vehiculo_servicio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `det_servicios_cliente`
--

LOCK TABLES `det_servicios_cliente` WRITE;
/*!40000 ALTER TABLE `det_servicios_cliente` DISABLE KEYS */;
INSERT INTO `det_servicios_cliente` VALUES (29,11,122,1,1,3000,13000,'2017-07-25','2017-10-23',NULL,33),(30,10,113,1,1,1000,1200,'2017-07-25','2017-08-09',3,33),(31,12,113,1,1,1000,1200,'2017-07-25','2017-08-09',3,33),(32,11,122,1,1,100,10100,'2017-07-25','2017-10-23',NULL,34),(33,9,112,1,1,100,1100,'2017-07-25','2017-08-09',NULL,35),(34,9,113,1,1,1000,2000,'2017-07-25','2017-08-09',NULL,36),(35,8,122,1,1,1000,1200,'2017-07-25','2017-10-23',2,37),(36,9,113,1,1,1000,2000,'2017-07-25','2017-08-09',NULL,37),(37,11,122,1,1,100,10100,'2017-07-25','2017-10-23',NULL,38),(38,10,113,1,1,1000,1200,'2017-07-25','2017-08-11',3,39),(39,12,113,1,1,1000,1200,'2017-07-25','2017-08-11',3,39),(40,9,113,1,1,1000,2000,'2017-07-25','2017-08-09',NULL,39),(41,12,112,1,1,1000,2000,'2017-07-25','2017-08-11',2,40),(42,8,122,1,1,1000,1020,'2017-07-25','2018-03-27',2,40),(43,8,122,1,1,1000,1000,'2017-07-25','2018-03-27',2,40),(44,9,113,1,1,1000,2000,'2017-07-25','2017-08-09',NULL,40),(45,9,113,1,1,100,1100,'2017-07-27','2017-08-11',NULL,41),(46,9,113,1,1,100,1100,'2017-07-27','2017-08-11',NULL,42),(47,10,112,1,1,1000,2000,'2017-07-27','2017-08-02',1,43),(48,9,112,1,1,1000,2000,'2017-07-27','2017-08-11',NULL,43),(49,7,122,1,1,1000,2000,'2017-07-27','2018-03-27',NULL,43),(50,9,113,1,1,1000,2000,'2017-07-27','2017-08-11',NULL,43);
/*!40000 ALTER TABLE `det_servicios_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `estado_id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'activo'),(2,'inactivo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insumos`
--

DROP TABLE IF EXISTS `insumos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insumos` (
  `insumos_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` varchar(45) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` varchar(45) DEFAULT NULL,
  `estado_id` int(10) NOT NULL,
  PRIMARY KEY (`insumos_id`),
  KEY `fk_insumos_estado_id_idx` (`estado_id`),
  CONSTRAINT `fk_insumos_estado_id` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insumos`
--

LOCK TABLES `insumos` WRITE;
/*!40000 ALTER TABLE `insumos` DISABLE KEYS */;
INSERT INTO `insumos` VALUES (1,'Filtro Elemento o filtro universal','ninguna',NULL,NULL,NULL,NULL,1),(9,'yhfgbvxx',NULL,'2017-07-25','1','2017-07-26','1',2),(10,'yhfgbv',NULL,'2017-07-25','1',NULL,NULL,1),(11,'gfdfgdas',NULL,'2017-07-25','1','2017-07-26','1',1),(12,'prueba',NULL,'2017-07-26','1','2017-07-26','1',1),(13,'dddd',NULL,'2017-07-26','1',NULL,NULL,2);
/*!40000 ALTER TABLE `insumos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificaciones` (
  `notificaciones_id` int(10) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_notificacion` date DEFAULT NULL,
  `cliente_id` int(10) NOT NULL,
  PRIMARY KEY (`notificaciones_id`),
  KEY `cliente_id_idx` (`cliente_id`),
  CONSTRAINT `cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificaciones`
--

LOCK TABLES `notificaciones` WRITE;
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios_cliente`
--

DROP TABLE IF EXISTS `servicios_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios_cliente` (
  `servicios_cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(10) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `descripcion` varchar(120) DEFAULT NULL,
  `estado_id` int(10) NOT NULL,
  `usuario_ingreso` int(10) DEFAULT NULL,
  PRIMARY KEY (`servicios_cliente_id`),
  KEY `fk_estado_id_idx` (`estado_id`),
  KEY `fk_serv_cliente_id_idx` (`cliente_id`),
  CONSTRAINT `fk_serv_cliente_estado_id` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_serv_cliente_id` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios_cliente`
--

LOCK TABLES `servicios_cliente` WRITE;
/*!40000 ALTER TABLE `servicios_cliente` DISABLE KEYS */;
INSERT INTO `servicios_cliente` VALUES (33,194,'2017-07-25',NULL,1,1),(34,194,'2017-07-25',NULL,1,1),(35,194,'2017-07-25',NULL,1,1),(36,194,'2017-07-25',NULL,1,1),(37,194,'2017-07-25',NULL,1,1),(38,194,'2017-07-25',NULL,1,1),(39,194,'2017-07-25',NULL,1,1),(40,194,'2017-07-25',NULL,1,1),(41,194,'2017-07-27',NULL,1,1),(42,194,'2017-07-27',NULL,1,1),(43,194,'2017-07-27',NULL,1,1);
/*!40000 ALTER TABLE `servicios_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_servicio` (
  `tipo_servicio_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` varchar(45) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipo_servicio_id`),
  KEY `fk_tipo_servicio_estado_idx` (`estado_id`),
  CONSTRAINT `fk_tipo_servicio_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_servicio`
--

LOCK TABLES `tipo_servicio` WRITE;
/*!40000 ALTER TABLE `tipo_servicio` DISABLE KEYS */;
INSERT INTO `tipo_servicio` VALUES (1,1,'control liquido de bateria',NULL,NULL,'2017-07-26','1'),(2,1,'cambio de filtro combustible','2017-07-03','1','2017-07-21','1'),(4,1,'cambio de aceite Semi-sintetico','2017-07-05','1','2017-07-23','1'),(5,1,'cambio aceite motor','2017-07-05','1','2017-07-17','1'),(6,1,'cambio de bujia','2017-07-05','1','2017-07-26','1'),(7,1,'Cambio de filtro de Combustible','2017-07-05','1','2017-07-24','1'),(8,1,'cambio de aceite de caja de retro','2017-07-05','1','2017-07-21','1'),(9,1,'cambio de aceite Sintetico','2017-07-06','1','2017-07-23','1'),(10,2,'cambio de aceite','2017-07-08','1','2017-07-08','1'),(11,1,'Cambio de aceite convencional','2017-07-17','1','2017-07-21','1'),(12,1,'Cambio de aceite de diferencial','2017-07-24','1',NULL,NULL),(13,2,'Filtro Elemento o filtro universal','2017-07-25','1',NULL,NULL),(14,2,'Filtro Elemento o filtro universal','2017-07-25','1',NULL,NULL),(16,1,'cambio de liquido de frenos','2017-07-26','1',NULL,NULL);
/*!40000 ALTER TABLE `tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_tiempo`
--

DROP TABLE IF EXISTS `tipo_tiempo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_tiempo` (
  `tipo_tiempo_id` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tipo_tiempo_id`),
  KEY `fk_tipo_tiempo_estado_idx` (`estado_id`),
  CONSTRAINT `fk_tipo_tiempo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_tiempo`
--

LOCK TABLES `tipo_tiempo` WRITE;
/*!40000 ALTER TABLE `tipo_tiempo` DISABLE KEYS */;
INSERT INTO `tipo_tiempo` VALUES (1,1,'KM'),(2,1,'MES'),(3,1,'CAMBIOS');
/*!40000 ALTER TABLE `tipo_tiempo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tips`
--

DROP TABLE IF EXISTS `tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tips` (
  `tips_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `enlace` varchar(500) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  PRIMARY KEY (`tips_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tips`
--

LOCK TABLES `tips` WRITE;
/*!40000 ALTER TABLE `tips` DISABLE KEYS */;
INSERT INTO `tips` VALUES (1,'vehiculo de herramientas','/imagen/images/Tips','pruebas','2017-07-05'),(2,'vehiculos de chevrolet','/imagen/images/Tips','pruebas 2','2017-07-05');
/*!40000 ALTER TABLE `tips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `users` VALUES (1,'jose','joserendon451@gmail.com','$2y$10$GM/beYWFMuVR5k7.FMs2..b1nFO26M43I0tWRSGBlRAltmEGgvOLy','4K9sWdcggql8KNdGlDPCbXXGzwxxcCjLuo9byZBl6YMWNl4N1beebAk7CZQQ','2017-06-21 08:39:50','2017-06-21 08:39:50');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehiculo` (
  `vehiculo_id` int(10) NOT NULL AUTO_INCREMENT,
  `clase_vehiculo_id` int(10) NOT NULL,
  `estado_id` int(10) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `placa` varchar(15) DEFAULT NULL,
  `uso_personal` varchar(1) DEFAULT NULL,
  `anio` int(5) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `usuario_ingreso` varchar(40) DEFAULT NULL,
  `fecha_modificacion` date DEFAULT NULL,
  `usuario_modificacion` int(10) DEFAULT NULL,
  PRIMARY KEY (`vehiculo_id`),
  KEY `fk_clase_vehiculo_idx` (`clase_vehiculo_id`),
  KEY `fk_vehiculo_estado_idx` (`estado_id`),
  CONSTRAINT `fk_clase_vehiculo` FOREIGN KEY (`clase_vehiculo_id`) REFERENCES `clase_vehiculo` (`clase_vehiculo_id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_vehiculo_estado` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehiculo`
--

LOCK TABLES `vehiculo` WRITE;
/*!40000 ALTER TABLE `vehiculo` DISABLE KEYS */;
INSERT INTO `vehiculo` VALUES (113,2,1,'chevrolet','azul','334','S',2014,'2017-07-14','1','2017-07-14',1),(114,2,1,'zusuki','azul','445','S',2017,'2017-07-14','1','2017-07-14',1),(123,1,1,'hyundai','verde','233dd','S',2010,'2017-07-14','1','2017-07-14',1),(124,1,2,'camaro','gris','dfw45','S',2013,'2017-07-14','1','2017-07-14',1),(125,1,1,'aveo','azul','er44','S',2016,'2017-07-14','1','2017-07-14',1),(126,1,1,'zusuki','verde','34545r','S',2016,'2017-07-14','1','2017-07-14',1),(127,1,1,'chuqui','verde','erty654','S',2016,'2017-07-14','1',NULL,NULL),(128,1,2,'mazda','amarillo','e54545','N',2010,'2017-07-15','1','2017-07-15',1),(129,2,1,'chevrolet','verde','mmmm','S',2017,'2017-07-15','1',NULL,NULL),(130,1,1,'chevrolet','erde','343rr','S',2016,'2017-07-17','1','2017-07-17',1),(131,2,1,'hyundai','rosa','323d-hh','N',2014,'2017-07-17','1','2017-07-17',1),(132,1,1,'KIA','CAFE','343-ERR','S',2016,'2017-07-17','1','2017-07-17',1);
/*!40000 ALTER TABLE `vehiculo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-27 11:53:00
