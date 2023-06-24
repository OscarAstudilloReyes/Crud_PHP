-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: documentacion
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `doc_documento`
--
CREATE Database documentacion;
USE documentacion;

DROP TABLE IF EXISTS `doc_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doc_documento` (
  `DOC_ID` int NOT NULL AUTO_INCREMENT,
  `DOC_NOMBRE` varchar(60) NOT NULL,
  `DOC_CODIGO`  varchar(30) NOT NULL,
  `DOC_CONTENIDO` varchar(4000) NOT NULL,
  `DOC_ID_TIPO` int NOT NULL,
  `DOC_ID_PROCESO` int NOT NULL,
  PRIMARY KEY (`DOC_ID`),
  UNIQUE KEY `DOC_CODIGO_UNIQUE` (`DOC_CODIGO`),
  KEY `DOC_PROCESO_idx` (`DOC_ID_PROCESO`),
  KEY `DOC_TIPO_idx` (`DOC_ID_TIPO`),
  CONSTRAINT `DOC_PROCESO` FOREIGN KEY (`DOC_ID_PROCESO`) REFERENCES `pro_proceso` (`PRO_ID`),
  CONSTRAINT `DOC_TIPO` FOREIGN KEY (`DOC_ID_TIPO`) REFERENCES `tip_tipo_doc` (`TIP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_documento`
--

LOCK TABLES `doc_documento` WRITE;
/*!40000 ALTER TABLE `doc_documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `doc_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pro_proceso`
--

DROP TABLE IF EXISTS `pro_proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pro_proceso` (
  `PRO_ID` int NOT NULL AUTO_INCREMENT,
  `PRO_PREFIJO` varchar(20) DEFAULT NULL,
  `PRO_NOMBRE` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pro_proceso`
--

LOCK TABLES `pro_proceso` WRITE;
/*!40000 ALTER TABLE `pro_proceso` DISABLE KEYS */;
INSERT INTO `pro_proceso` VALUES (1,'ING','Ingeniería'),(2,'DEV','Desarrollo'),(3,'CAL','Calidad'),(4,'SOP','Soporte'),(5,'VEN','Ventas');
/*!40000 ALTER TABLE `pro_proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_tipo_doc`
--

DROP TABLE IF EXISTS `tip_tipo_doc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tip_tipo_doc` (
  `TIP_ID` int NOT NULL AUTO_INCREMENT,
  `TIP_NOMBRE` varchar(60) NOT NULL,
  `TIP_PREFIJO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TIP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_tipo_doc`
--

LOCK TABLES `tip_tipo_doc` WRITE;
/*!40000 ALTER TABLE `tip_tipo_doc` DISABLE KEYS */;
INSERT INTO `tip_tipo_doc` VALUES (1,'Instructivo','INS'),(2,'Procedimiento','PROC'),(3,'Formato','FOR'),(4,'Reporte','REP'),(5,'Manual','MAN');
/*!40000 ALTER TABLE `tip_tipo_doc` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-22 10:18:09
