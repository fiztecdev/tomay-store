-- MySQL dump 10.13  Distrib 5.7.18, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: development
-- ------------------------------------------------------
-- Server version	5.7.18

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


CREATE USER sysdba@localhost IDENTIFIED BY 'syspassdba';
GRANT ALL PRIVILEGES ON *.* TO sysdba@localhost WITH GRANT OPTION;
DROP USER root@localhost;

--
-- Table structure for table `distino`
--

DROP TABLE IF EXISTS `distino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distino` (
  `id_dis` int(11) NOT NULL AUTO_INCREMENT,
  `lugar` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fotos` varchar(100) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_dis`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distino`
--

LOCK TABLES `distino` WRITE;
/*!40000 ALTER TABLE `distino` DISABLE KEYS */;
INSERT INTO `distino` (`id_dis`, `lugar`, `descripcion`, `fotos`, `estado`) VALUES (1,'casa de fierro','Casa Eiffel, francés: La maison de fer',NULL,'1'),(2,'Lima','Buena',NULL,'1'),(3,'casa de fierro','Casa Eiffel, francés: La maison de fer',NULL,'1'),(4,'catedral iquitos ','',NULL,'1'),(5,'catedral iquitos ','Catedral Metopolitana de Iquitos',NULL,'1'),(6,'plaza de armas iquitos','de acuerdo al tamaño del territorio de lugar increible','destino.svg','1'),(7,'HUANUCO','Mejor Clima del Mundo','destino.svg','1'),(8,'CULQUI','BUEN LUGAR','culqi_logo.png','1');
/*!40000 ALTER TABLE `distino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel` (
  `id_hot` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `descripcion` text,
  `fotos` varchar(100) DEFAULT NULL,
  `estado` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_hot`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel`
--

LOCK TABLES `hotel` WRITE;
/*!40000 ALTER TABLE `hotel` DISABLE KEYS */;
INSERT INTO `hotel` (`id_hot`, `nombre`, `ubicacion`, `descripcion`, `fotos`, `estado`) VALUES (1,'sd','s',NULL,'hotel.svg','1'),(2,'xxx1','jr.mazano',NULL,'hotel.svg','1'),(3,'bora hotel','Iquitos, a 0.9 km de: centro de la ciudad',NULL,'hotel.svg','1'),(4,'acosto','iquitos, a 0.5 km de: centro de la ciudad',NULL,'hotel.svg','1'),(14,'Hotel Rivera','Av. Navarrete 1137','Habitaciones increibles y precios comodos para miembros de empresas','hotel.svg','0'),(15,'Westin','San Isidro','buena descripcion del hotel','hotel.svg','0'),(16,'dbgdgd','gegege',NULL,'hotel.svg','0'),(17,'ESPAÑA WINNER','BARCELONA',NULL,'hotel.svg','1');
/*!40000 ALTER TABLE `hotel` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',2),(4,'2016_06_01_000002_create_oauth_access_tokens_table',2),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',2),(6,'2016_06_01_000004_create_oauth_clients_table',2),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES (1,NULL,'Laravel Personal Access Client','TZjhRvjC1daOdUKznAtUx3vUNM3U7ACBeJcO75EE','http://localhost',1,0,0,'2017-11-19 17:29:24','2017-11-19 17:29:24'),(2,NULL,'Laravel Password Grant Client','43F6hdQmrtp1680XiOamMzMlFZUWdSfR08ZRGYnP','http://localhost',0,1,0,'2017-11-19 17:29:25','2017-11-19 17:29:25');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES (1,1,'2017-11-19 17:29:25','2017-11-19 17:29:25');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
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
-- Table structure for table `pq_turistico`
--

DROP TABLE IF EXISTS `pq_turistico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pq_turistico` (
  `id_paq` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(500) NOT NULL,
  `costo` double(11,2) NOT NULL,
  `duracion_dias` text NOT NULL,
  `id_hot` int(11) NOT NULL,
  `id_res` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `estado` enum('1','0') DEFAULT '1',
  `promocion` enum('1','0') DEFAULT '0',
  `descuento` double(5,2) DEFAULT '0.00',
  `comprado` enum('1','0') DEFAULT '0',
  `startpromo` datetime DEFAULT NULL,
  `endpromo` datetime DEFAULT NULL,
  PRIMARY KEY (`id_paq`),
  KEY `id_hot` (`id_hot`),
  KEY `id_res` (`id_res`),
  KEY `id_dis` (`id_dis`),
  CONSTRAINT `pq_turistico_ibfk_1` FOREIGN KEY (`id_dis`) REFERENCES `distino` (`id_dis`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pq_turistico_ibfk_2` FOREIGN KEY (`id_res`) REFERENCES `restaurante` (`id_res`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pq_turistico_ibfk_3` FOREIGN KEY (`id_hot`) REFERENCES `hotel` (`id_hot`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pq_turistico`
--

LOCK TABLES `pq_turistico` WRITE;
/*!40000 ALTER TABLE `pq_turistico` DISABLE KEYS */;
INSERT INTO `pq_turistico` (`id_paq`, `ruta`, `costo`, `duracion_dias`, `id_hot`, `id_res`, `id_dis`, `estado`, `promocion`, `descuento`, `comprado`, `startpromo`, `endpromo`) VALUES (1,'panamericana ',34.00,'2 dias ',1,1,2,'1','0',100.00,'0',NULL,NULL),(2,'ruta corta',344.00,'tres dias',1,1,2,'1','0',0.00,'0',NULL,NULL),(3,'ruta corta',344.00,'1 dias',1,1,2,'1','0',0.00,'0',NULL,NULL),(4,'toda la ciudad',300.00,'2',2,4,6,'1','0',0.00,'0',NULL,NULL),(9,'dfgh',855.00,'2 dias',2,3,1,'1','0',0.00,'0',NULL,NULL),(10,'ertyuiop',9852.00,'5dias mas una noche',2,3,4,'1','0',0.00,'0',NULL,NULL),(11,'lsdfghjk',696.00,'4 dias',1,2,5,'1','0',34.89,'0',NULL,NULL),(12,'lsdfghjk',696.00,'4 dias',1,2,5,'1','0',0.00,'0',NULL,NULL),(13,'sdfgh',524.00,'3d',1,2,3,'1','0',0.00,'0',NULL,NULL),(14,'sdfg update',223.00,'2 dias',3,1,5,'1','1',0.00,'0',NULL,NULL),(15,'rusia',2424.00,'23 dias',3,1,1,'0','0',0.00,'0',NULL,NULL),(16,'FRANCIA',224.00,'100 DIAS',4,2,4,'0','0',0.00,'0',NULL,NULL),(17,'CUSCO',2000.00,'3 DIAS',17,6,7,'1','0',0.00,'0',NULL,NULL),(18,'NUEVAS RUTAS',4435.00,'232 DIAS',14,6,7,'1','0',0.00,'0',NULL,NULL),(19,'TT NUEVO',65566.00,'23 dias',15,3,5,'1','0',0.00,'0','2017-12-04 00:00:00','2017-12-05 00:00:00');
/*!40000 ALTER TABLE `pq_turistico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurante`
--

DROP TABLE IF EXISTS `restaurante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurante` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(60) NOT NULL,
  `fotos` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `estado` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id_res`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurante`
--

LOCK TABLES `restaurante` WRITE;
/*!40000 ALTER TABLE `restaurante` DISABLE KEYS */;
INSERT INTO `restaurante` (`id_res`, `nombre`, `ubicacion`, `fotos`, `descripcion`, `estado`) VALUES (1,'restaurante','lima',NULL,NULL,'1'),(2,'amazon','Av La Marina N 134-B, Iquitos, Perú',NULL,NULL,'1'),(3,'karma cafe','Calle Napo 138 | 138 rue Napo, Iquitos 16000, Perú',NULL,NULL,'1'),(4,'karma cafe','Calle Napo 138 | 138 rue Napo, Iquitos 16000, Perú',NULL,NULL,'1'),(5,'TASITAS FOOD MAS','SAN ISIDRO','hotel.svg',NULL,'1'),(6,'BUEN IDE','EL RESTAURANTE GENIAL','intellij.png',NULL,'1');
/*!40000 ALTER TABLE `restaurante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'cliente',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `users` (`id`, `fullname`, `name`, `email`, `password`, `type`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Administrador','adminuser','adminuser@gmail.com','$2y$10$yFgBxiRN1mEM6n3oT4CkTuvLoOG9NhniwuuG/242NO.02cC5Rwbcy','admin','init.svg','8U2qAJmX1qePtdJfLC2DUluTW6U9Cnk7mHtDWmRZ0Cp82Ywe1wAZxinm0aXD','2017-11-17 07:14:30','2017-11-17 07:14:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive',
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `name`, `email`, `phone`, `status`, `image`) VALUES (1,'fidel','villanueva@icloud.com','43535336','0','default.jpg'),(2,'carlos','carlos@icloud.com','35366','0','default.jpg'),(3,'Angel Fuentes','villanueva@icloud.com','43535336','1','fig_1_08.png'),(4,'Tim Baser','carlos@icloud.com','35366','1','default.jpg'),(5,'Angel Fuentes','villanueva@icloud.com','43535336','1','default.jpg'),(6,'Tim Baser','carlos@icloud.com','35366','1','default.jpg'),(7,'Garcia Mendez','carlos@icloud.com','35366','1','default.jpg'),(8,'Ana Palacios','carlos@icloud.com','35366','1','default.jpg'),(9,'Karla Villanueva','carlos@icloud.com','35366','1','default.jpg'),(10,'Javier Fuentes','carlos@icloud.com','35366','1','default.jpg'),(11,'Ricardo Valenz','carlos@icloud.com','35366','1','default.jpg'),(12,'Test Usuario','test@gmail.com','3536363','1','default.jpg'),(13,'prima','prima@pe.com','4353536','1',NULL),(14,'fdgdg','dgdgdg','dgdgd','1',NULL),(15,'eret','ttet','35353','1',NULL),(16,'liz','liz@gmail.com','999999','1',NULL),(17,'rettet','tetete','3353536','1',NULL),(18,'dwerrwr','dwdwdw','42424224244','1',NULL),(19,'ff','fsfsf','wrwrwr','1','yov.svg'),(20,'Fidel Villanueva Delgado','fvillanueva@icloud.com','2324242','1','Heroku.png'),(21,'Fidel 2','villa@ilocud,com','242424','1','init.svg'),(22,'Test svg','villanueva@gmail.com','3353535','1','team.svg'),(23,'Fidel Villanueva','villa@gmail.com','2242535252','1','init.svg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-04  7:14:59
