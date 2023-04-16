-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: whatsapp
-- ------------------------------------------------------
-- Server version	8.0.32

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

--
-- Table structure for table `atendimentos`
--

DROP TABLE IF EXISTS `atendimentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `atendimentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(50) DEFAULT NULL,
  `cliente` varchar(50) DEFAULT NULL,
  `atendente` varchar(50) DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendimentos`
--

LOCK TABLES `atendimentos` WRITE;
/*!40000 ALTER TABLE `atendimentos` DISABLE KEYS */;
INSERT INTO `atendimentos` VALUES (2,'zJ0wKGcBybaS','559484110714',NULL,0,'2023-03-25 22:43:24','2023-03-26 18:03:05'),(3,'zJ0wKGcBybaS','559484054925',NULL,1,'2023-03-26 00:16:16','2023-03-26 18:02:41');
/*!40000 ALTER TABLE `atendimentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bots`
--

DROP TABLE IF EXISTS `bots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bots` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_mensage` int NOT NULL,
  `id_users` int NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bots`
--

LOCK TABLES `bots` WRITE;
/*!40000 ALTER TABLE `bots` DISABLE KEYS */;
INSERT INTO `bots` VALUES (18,26,1,'marcado'),(20,29,19,'marcado');
/*!40000 ALTER TABLE `bots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urlcode` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'zJ0wKGcBybaS',NULL,NULL,NULL,'loding',NULL,' ','2023-03-24 18:44:10','2023-03-25 19:34:01'),(4,'zJ0wKGcBybaS','559484110714','559484075618','hjdgh[','loding',NULL,' ','2023-03-24 21:04:01','2023-03-25 19:34:01'),(5,'zJ0wKGcBybaS','559484110714','559484075618','Oi','loding',NULL,' ','2023-03-24 21:05:33','2023-03-25 19:34:01'),(6,'zJ0wKGcBybaS','559484110714','559484075618','Oi','loding',NULL,' ','2023-03-24 21:05:35','2023-03-25 19:34:01'),(7,'zJ0wKGcBybaS','559484110714','559484075618','Oi','loding',NULL,' ','2023-03-24 21:05:37','2023-03-25 19:34:01'),(8,'zJ0wKGcBybaS','559484110714','559484075618','Oi','loding',NULL,' ','2023-03-24 21:05:39','2023-03-25 19:34:01'),(9,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-24 21:17:54','2023-03-25 19:34:01'),(10,'zJ0wKGcBybaS','559484110714','559484075618','test','loding',NULL,' ','2023-03-24 21:18:58','2023-03-25 19:34:01'),(11,'zJ0wKGcBybaS','559484110714','559484075618','a','loding',NULL,' ','2023-03-24 21:19:25','2023-03-25 19:34:01'),(12,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-24 22:05:20','2023-03-25 19:34:01'),(13,'zJ0wKGcBybaS','559484110714','559484075618','test','loding',NULL,' ','2023-03-24 22:05:57','2023-03-25 19:34:01'),(14,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-25 09:20:15','2023-03-25 19:34:01'),(15,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-25 09:20:23','2023-03-25 19:34:01'),(16,'zJ0wKGcBybaS','559484110714','559484075618','Oi','loding',NULL,' ','2023-03-25 09:21:17','2023-03-25 19:34:01'),(17,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-25 09:22:21','2023-03-25 19:34:01'),(18,'zJ0wKGcBybaS','559484110714','559484075618','oi','loding',NULL,' ','2023-03-25 09:24:21','2023-03-25 19:34:01'),(19,'zJ0wKGcBybaS','559484110714','559484075618','eai','loding',NULL,' ','2023-03-25 10:36:21','2023-03-25 19:34:01'),(20,'zJ0wKGcBybaS','559484110714','559484075618','oooi','chat',NULL,NULL,'2023-03-25 20:14:40','2023-03-25 20:14:40'),(21,'zJ0wKGcBybaS','559484110714','559484075618','22','chat',NULL,NULL,'2023-03-25 20:16:17','2023-03-25 20:16:17'),(22,'zJ0wKGcBybaS','559484110714','559484075618','55','chat',NULL,NULL,'2023-03-25 20:19:35','2023-03-25 20:19:35'),(23,'zJ0wKGcBybaS','559484110714','559484075618','2','chat',NULL,NULL,'2023-03-25 20:20:38','2023-03-25 20:20:38'),(24,'zJ0wKGcBybaS','559484110714','559484075618','444','chat',NULL,NULL,'2023-03-25 20:22:45','2023-03-25 20:22:45'),(25,'zJ0wKGcBybaS','559484110714','559484075618','ola','chat',NULL,NULL,'2023-03-25 20:24:31','2023-03-25 20:24:31'),(26,'zJ0wKGcBybaS','559484110714','559484075618','x','chat',NULL,NULL,'2023-03-25 20:27:58','2023-03-25 20:27:58'),(27,'zJ0wKGcBybaS','559484110714','559484075618','3','chat',NULL,NULL,'2023-03-25 20:29:46','2023-03-25 20:29:46'),(28,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 20:34:24','2023-03-25 20:34:24'),(29,'zJ0wKGcBybaS','559484110714','559484075618','ta','chat',NULL,NULL,'2023-03-25 20:35:17','2023-03-25 20:35:17'),(30,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 20:36:20','2023-03-25 20:36:20'),(31,'zJ0wKGcBybaS','559484110714','559484075618','9','chat',NULL,NULL,'2023-03-25 20:37:34','2023-03-25 20:37:34'),(32,'zJ0wKGcBybaS','559484110714','559484075618','2','chat',NULL,NULL,'2023-03-25 20:40:48','2023-03-25 20:40:48'),(33,'zJ0wKGcBybaS','559484110714','559484075618','😉','chat',NULL,NULL,'2023-03-25 20:43:47','2023-03-25 20:43:47'),(34,'zJ0wKGcBybaS','559484110714','559484075618','3','chat',NULL,NULL,'2023-03-25 20:45:40','2023-03-25 20:45:40'),(35,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 20:47:23','2023-03-25 20:47:23'),(36,'zJ0wKGcBybaS','559484110714','559484075618','aa','chat',NULL,NULL,'2023-03-25 20:48:48','2023-03-25 20:48:48'),(37,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 21:05:50','2023-03-25 21:05:50'),(38,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 21:06:50','2023-03-25 21:06:50'),(39,'zJ0wKGcBybaS','559484110714','559484075618','w','chat',NULL,NULL,'2023-03-25 21:11:12','2023-03-25 21:11:12'),(40,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 21:11:47','2023-03-25 21:11:47'),(41,'zJ0wKGcBybaS','559484110714','559484075618','oi','chat',NULL,NULL,'2023-03-25 21:24:37','2023-03-25 21:24:37'),(42,'zJ0wKGcBybaS','559484110714','559484075618','5','chat',NULL,NULL,'2023-03-25 21:25:11','2023-03-25 21:25:11'),(43,'zJ0wKGcBybaS','559484110714','559484075618','😊☺️❤️','chat',NULL,NULL,'2023-03-25 21:35:04','2023-03-25 21:35:04'),(44,'zJ0wKGcBybaS','559484110714','559484075618','aa','chat',NULL,NULL,'2023-03-25 21:35:29','2023-03-25 21:35:29'),(45,'zJ0wKGcBybaS','559484110714','559484075618','a','chat',NULL,NULL,'2023-03-25 21:36:01','2023-03-25 21:36:01'),(46,'zJ0wKGcBybaS','559484110714','559484075618','SIM','chat',NULL,NULL,'2023-03-25 21:36:08','2023-03-25 21:36:08'),(47,'zJ0wKGcBybaS','559484110714','559484075618','SIM','chat',NULL,NULL,'2023-03-25 21:36:36','2023-03-25 21:36:36'),(48,'zJ0wKGcBybaS','559484110714','559484075618','trt','chat',NULL,NULL,'2023-03-25 21:40:34','2023-03-25 21:40:34'),(49,'zJ0wKGcBybaS','559484110714','559484075618','asdf','chat',NULL,NULL,'2023-03-25 21:42:52','2023-03-25 21:42:52'),(50,'zJ0wKGcBybaS','559484110714','559484075618','SIM','chat',NULL,NULL,'2023-03-25 21:43:00','2023-03-25 21:43:00'),(51,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-25 21:43:14','2023-03-25 21:43:14'),(52,'zJ0wKGcBybaS','559484110714','559484075618','adf','chat',NULL,NULL,'2023-03-25 21:43:22','2023-03-25 21:43:22'),(53,'zJ0wKGcBybaS','559484110714','559484075618','asdf','chat',NULL,NULL,'2023-03-25 21:44:49','2023-03-25 21:44:49'),(54,'zJ0wKGcBybaS','559484110714','559484075618','SIM','chat',NULL,NULL,'2023-03-25 21:45:01','2023-03-25 21:45:01'),(55,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-25 21:45:18','2023-03-25 21:45:18'),(56,'zJ0wKGcBybaS','559484110714','559484075618','95','chat',NULL,NULL,'2023-03-25 21:49:29','2023-03-25 21:49:29'),(57,'zJ0wKGcBybaS','559484110714','559484075618','95','chat',NULL,NULL,'2023-03-25 21:50:07','2023-03-25 21:50:07'),(58,'zJ0wKGcBybaS','559484110714','559484075618','95','chat',NULL,NULL,'2023-03-25 21:50:30','2023-03-25 21:50:30'),(59,'zJ0wKGcBybaS','559484110714','559484075618','SIM','chat',NULL,NULL,'2023-03-25 21:50:38','2023-03-25 21:50:38'),(60,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-25 21:50:53','2023-03-25 21:50:53'),(61,'zJ0wKGcBybaS','559484110714','559484075618','ṕ','chat',NULL,NULL,'2023-03-25 22:43:08','2023-03-25 22:43:08'),(62,'zJ0wKGcBybaS','559484110714','559484075618','9','chat',NULL,NULL,'2023-03-25 22:43:23','2023-03-25 22:43:23'),(63,'zJ0wKGcBybaS','559492211549','559484075618',NULL,'image','0ea824a8b646839cddc08542230a9448.jpg',NULL,'2023-03-25 22:52:16','2023-03-25 22:52:16'),(64,'zJ0wKGcBybaS','559484054925','559484075618','Oi','chat',NULL,NULL,'2023-03-26 00:14:45','2023-03-26 00:14:45'),(65,'zJ0wKGcBybaS','559484054925','559484075618','Sim','chat',NULL,NULL,'2023-03-26 00:14:55','2023-03-26 00:14:55'),(66,'zJ0wKGcBybaS','559484054925','559484075618','SIM','chat',NULL,NULL,'2023-03-26 00:15:22','2023-03-26 00:15:22'),(67,'zJ0wKGcBybaS','559484054925','559484075618','Djfenoxhot@hotmail.com','chat',NULL,NULL,'2023-03-26 00:15:39','2023-03-26 00:15:39'),(68,'zJ0wKGcBybaS','559484054925','559484075618','E agora','chat',NULL,NULL,'2023-03-26 00:15:48','2023-03-26 00:15:48'),(69,'zJ0wKGcBybaS','559484054925','559484075618','9','chat',NULL,NULL,'2023-03-26 00:16:15','2023-03-26 00:16:15'),(70,'zJ0wKGcBybaS','559484054925','559484075618','0','chat',NULL,NULL,'2023-03-26 00:16:17','2023-03-26 00:16:17'),(71,'zJ0wKGcBybaS','559484054925','559484075618','9','chat',NULL,NULL,'2023-03-26 00:16:24','2023-03-26 00:16:24'),(72,'zJ0wKGcBybaS','559484054925','559484075618','9','chat',NULL,NULL,'2023-03-26 00:16:31','2023-03-26 00:16:31'),(73,'zJ0wKGcBybaS','559484054925','559484075618','O','chat',NULL,NULL,'2023-03-26 00:16:32','2023-03-26 00:16:32'),(74,'zJ0wKGcBybaS','559484054925','559484075618','O','chat',NULL,NULL,'2023-03-26 00:16:35','2023-03-26 00:16:35'),(75,'zJ0wKGcBybaS','559484054925','559484075618','Kkkk','chat',NULL,NULL,'2023-03-26 00:16:43','2023-03-26 00:16:43'),(76,'zJ0wKGcBybaS','559484110714','559484075618','oi','chat',NULL,NULL,'2023-03-26 16:20:30','2023-03-26 16:20:30'),(77,'zJ0wKGcBybaS','559484110714','559484075618','Oi','chat',NULL,NULL,'2023-03-26 16:20:38','2023-03-26 16:20:38'),(78,'zJ0wKGcBybaS','559484110714','559484075618','21','chat',NULL,NULL,'2023-03-26 17:14:04','2023-03-26 17:14:04'),(79,'zJ0wKGcBybaS','559484110714','559484075618','oi','chat',NULL,NULL,'2023-03-26 17:15:26','2023-03-26 17:15:26'),(80,'zJ0wKGcBybaS','559484110714','559484075618','sim','chat',NULL,NULL,'2023-03-26 17:15:32','2023-03-26 17:15:32'),(81,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-26 17:15:48','2023-03-26 17:15:48'),(82,'zJ0wKGcBybaS','559484110714','559484075618','sim','chat',NULL,NULL,'2023-03-26 17:15:54','2023-03-26 17:15:54'),(83,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-26 17:16:08','2023-03-26 17:16:08'),(84,'zJ0wKGcBybaS','559484110714','559484075618','9','chat',NULL,NULL,'2023-03-26 17:16:21','2023-03-26 17:16:21'),(85,'zJ0wKGcBybaS','559484110714','559484075618','oi','chat',NULL,NULL,'2023-03-26 17:20:23','2023-03-26 17:20:23'),(86,'zJ0wKGcBybaS','559484110714','559484075618','sim','chat',NULL,NULL,'2023-03-26 17:20:37','2023-03-26 17:20:37'),(87,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-26 17:20:52','2023-03-26 17:20:52'),(88,'zJ0wKGcBybaS','559484110714','559484075618','er','chat',NULL,NULL,'2023-03-26 17:21:52','2023-03-26 17:21:52'),(89,'zJ0wKGcBybaS','559484110714','559484075618','sim','chat',NULL,NULL,'2023-03-26 17:22:05','2023-03-26 17:22:05'),(90,'zJ0wKGcBybaS','559484110714','559484075618','elitymaciel@hotmail.com','chat',NULL,NULL,'2023-03-26 17:22:24','2023-03-26 17:22:24');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `conversa_id` int NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `atendente` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `instancia` varchar(250) DEFAULT NULL,
  `telefone` varchar(25) DEFAULT NULL,
  `nome_completo` varchar(250) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `cep` varchar(50) DEFAULT NULL,
  `endereco` varchar(200) CHARACTER SET utf8mb4 COLLATE   DEFAULT NULL,
  `cidade` varchar(200) DEFAULT NULL,
  `id_user` int unsigned DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4   COMMENT='instancias pra as contas do whatsapp';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (6,'94984110714','94984110714','Maciel da Cruz Oliveira','01788333209','68552-660','Rua Comendador Silva Vasconcelos','Redenção',19,'WORKING','2023-03-15 19:57:58','2023-03-17 22:40:56');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contatos`
--

DROP TABLE IF EXISTS `contatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contatos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `session` varchar(255) CHARACTER SET utf8mb4 COLLATE   NOT NULL,
  `nome` varchar(200) CHARACTER SET utf8mb4 COLLATE   DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contatos`
--

LOCK TABLES `contatos` WRITE;
/*!40000 ALTER TABLE `contatos` DISABLE KEYS */;
INSERT INTO `contatos` VALUES (6,'zJ0wKGcBybaS','Maciel','559484110714','elitymaciel@hotmail.com','2023-03-26 17:22:25','2023-03-26 17:22:25');
/*!40000 ALTER TABLE `contatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow`
--

DROP TABLE IF EXISTS `drawflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `html` text,
  `typenode` tinyint(1) DEFAULT NULL,
  `pos_x` int DEFAULT NULL,
  `pos_y` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow`
--

LOCK TABLES `drawflow` WRITE;
/*!40000 ALTER TABLE `drawflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow_data`
--

DROP TABLE IF EXISTS `drawflow_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow_data` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drawflow_id` int DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `drawflow_id` (`drawflow_id`),
  CONSTRAINT `drawflow_data_ibfk_1` FOREIGN KEY (`drawflow_id`) REFERENCES `drawflow` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow_data`
--

LOCK TABLES `drawflow_data` WRITE;
/*!40000 ALTER TABLE `drawflow_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow_input`
--

DROP TABLE IF EXISTS `drawflow_input`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow_input` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drawflow_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drawflow_id` (`drawflow_id`),
  CONSTRAINT `drawflow_input_ibfk_1` FOREIGN KEY (`drawflow_id`) REFERENCES `drawflow` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow_input`
--

LOCK TABLES `drawflow_input` WRITE;
/*!40000 ALTER TABLE `drawflow_input` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow_input` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow_input_connection`
--

DROP TABLE IF EXISTS `drawflow_input_connection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow_input_connection` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drawflow_input_id` int DEFAULT NULL,
  `drawflow_output_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drawflow_input_id` (`drawflow_input_id`),
  KEY `drawflow_output_id` (`drawflow_output_id`),
  CONSTRAINT `drawflow_input_connection_ibfk_1` FOREIGN KEY (`drawflow_input_id`) REFERENCES `drawflow_input` (`id`),
  CONSTRAINT `drawflow_input_connection_ibfk_2` FOREIGN KEY (`drawflow_output_id`) REFERENCES `drawflow_output` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow_input_connection`
--

LOCK TABLES `drawflow_input_connection` WRITE;
/*!40000 ALTER TABLE `drawflow_input_connection` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow_input_connection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow_output`
--

DROP TABLE IF EXISTS `drawflow_output`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow_output` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drawflow_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drawflow_id` (`drawflow_id`),
  CONSTRAINT `drawflow_output_ibfk_1` FOREIGN KEY (`drawflow_id`) REFERENCES `drawflow` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow_output`
--

LOCK TABLES `drawflow_output` WRITE;
/*!40000 ALTER TABLE `drawflow_output` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow_output` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drawflow_output_connection`
--

DROP TABLE IF EXISTS `drawflow_output_connection`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drawflow_output_connection` (
  `id` int NOT NULL AUTO_INCREMENT,
  `drawflow_output_id` int DEFAULT NULL,
  `drawflow_input_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `drawflow_output_id` (`drawflow_output_id`),
  KEY `drawflow_input_id` (`drawflow_input_id`),
  CONSTRAINT `drawflow_output_connection_ibfk_1` FOREIGN KEY (`drawflow_output_id`) REFERENCES `drawflow_output` (`id`),
  CONSTRAINT `drawflow_output_connection_ibfk_2` FOREIGN KEY (`drawflow_input_id`) REFERENCES `drawflow_input` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drawflow_output_connection`
--

LOCK TABLES `drawflow_output_connection` WRITE;
/*!40000 ALTER TABLE `drawflow_output_connection` DISABLE KEYS */;
/*!40000 ALTER TABLE `drawflow_output_connection` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emojis`
--

DROP TABLE IF EXISTS `emojis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emojis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE   NOT NULL,
  `codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emojis`
--

LOCK TABLES `emojis` WRITE;
/*!40000 ALTER TABLE `emojis` DISABLE KEYS */;
INSERT INTO `emojis` VALUES (65,'sorriso com lágrimas de alegria','🥲'),(66,'coração vermelho','&#x2764'),(67,'rosto sorridente com corações','&#x1F60D'),(68,'rosto chorando','&#x1F62D;'),(69,'rosto sorridente com olhos sorridentes e bochechas rosadas','&#x1F60A;'),(70,'rosto soprando um beijo','&#x1F618;'),(71,'polegar para cima','&#x1F44D;'),(72,'rosto sorridente com olhos corações','&#x1F970;'),(73,'rosto sorridente com olhos sorridentes e corações','&#x1F970;'),(74,'rosto com olhos sorridentes e lágrimas','&#x1F605;'),(75,'rosto piscando com a língua de fora','&#x1F61C;'),(76,'rosto sorridente com olhos sorridentes e corações','&#x1F970;'),(77,'rosto sorridente com olhos sorridentes e corações','&#x1F970;'),(78,'mãos em prece','&#x1F64F;'),(79,'rosto com olhos sorridentes e língua de fora','&#x1F61B;'),(80,'rosto sorridente com lágrimas de alegria','&#x1F923;'),(81,'rosto apaixonado','&#x1F60D');
/*!40000 ALTER TABLE `emojis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mensagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bot_id` int DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `pergunta` text CHARACTER SET utf8mb4 COLLATE  ,
  `resposta` text CHARACTER SET utf8mb4 COLLATE  ,
  `prioridade` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensagens`
--

LOCK TABLES `mensagens` WRITE;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` VALUES (26,18,'Bot Conceicao do Araguaia-PA',NULL,NULL,NULL,'2023-03-04 10:33:10','2023-03-04 18:43:19'),(29,20,'adasdsaf',NULL,NULL,NULL,'2023-03-21 21:12:36','2023-03-21 21:12:36');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisoes`
--

DROP TABLE IF EXISTS `permisoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisoes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisoes`
--

LOCK TABLES `permisoes` WRITE;
/*!40000 ALTER TABLE `permisoes` DISABLE KEYS */;
INSERT INTO `permisoes` VALUES (1,'Administrador'),(2,'cliente'),(3,'funcionario');
/*!40000 ALTER TABLE `permisoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_session` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `urlcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,'zJ0wKGcBybaS','qrReadSuccess',' ','2023-03-24 21:34:52','2023-03-25 19:34:36');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `last_name` varchar(60) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `id_session` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT '',
  `token` varchar(150) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'default.svg',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `permissao` int unsigned DEFAULT NULL,
  `reset_password` tinyint unsigned DEFAULT '0',
  `is_deleted` tinyint unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `grupo` (`permissao`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permissao`) REFERENCES `permisoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (18,'admin','admin','admin@admin.com','AqlinCikb0k8','$2y$10$Sgdk7lyZCszff4i/C7CJnOajiVgXxVQPpAALBJbzR9qLArbLW0b8O','$2b$10$TQ4MV9UaQp9iZqtgZyXMhef0mHaOfczbIDt0UstdJSDvmLTr9aMJW','default.svg','2023-03-15 03:25:58','2023-03-24 11:25:21',1,0,0),(19,'Maciel','Oliveira','elitymaciel@hotmail.com','zJ0wKGcBybaS','$2y$10$r.54C3odbc7DhOZOz5ok/.BZKimf//kn.iXZD6oAP3N7kuz.mT/wi','$2b$10$WeDmK.9RHhF_IbZ7zXfnruTQHnZos8X_5haFef1vB4hmXQyAIawb6','76ff145bd7f0acf1373ed6346d3577ad.png','2023-03-15 03:27:28','2023-03-24 11:24:37',2,0,0),(21,'admin','asdf','elitymaciel2@hotmail.com','ZGNVkPR4PHeP','$2y$10$7RtiqXFbX05OxjVeAnmQie8NqfhEkY2nVKT1DM8nxPr3jeyxuwSxS','$2b$10$NiZL0jJketRNK9WcsU8dsew3mkjs5bndCDX.QuGZXBieOiEMMQssa','default.svg','2023-03-24 07:43:52','2023-03-24 13:01:27',NULL,0,0);
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

-- Dump completed on 2023-03-27  3:48:43
