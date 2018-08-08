-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: copygest
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.31-MariaDB

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
-- Table structure for table `sisactions`
--

DROP TABLE IF EXISTS `sisactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sisactions` (
  `actId` int(11) NOT NULL,
  `actDescription` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `actDescriptionSpanish` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sisactions`
--

LOCK TABLES `sisactions` WRITE;
/*!40000 ALTER TABLE `sisactions` DISABLE KEYS */;
INSERT INTO `sisactions` VALUES (1,'Add','Agregar'),(2,'Edit','Editar'),(3,'Del','Eliminar'),(4,'View','Consultar'),(5,'Imprimir','Imprimir'),(6,'Saldo','Consultar Saldo'),(7,'Asignar','Asignar'),(8,'Finalizar','Finalizar'),(9,'OP','OP'),(10,'Pedidos','Pedidos'),(11,'Supervisor','Supervisor'),(12,'Entregar','Entrega de Ordenes'),(13,'Lectura','Lect horas equipos ');
/*!40000 ALTER TABLE `sisactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sisgroups`
--

DROP TABLE IF EXISTS `sisgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sisgroups` (
  `grpId` int(11) NOT NULL AUTO_INCREMENT,
  `grpName` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `grpDash` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`grpId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sisgroups`
--

LOCK TABLES `sisgroups` WRITE;
/*!40000 ALTER TABLE `sisgroups` DISABLE KEYS */;
INSERT INTO `sisgroups` VALUES (1,'Administrador','Empresa');
/*!40000 ALTER TABLE `sisgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sisgroupsactions`
--

DROP TABLE IF EXISTS `sisgroupsactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sisgroupsactions` (
  `grpactId` int(11) NOT NULL,
  `grpId` int(11) NOT NULL,
  `menuAccId` int(11) NOT NULL,
  PRIMARY KEY (`grpactId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sisgroupsactions`
--

LOCK TABLES `sisgroupsactions` WRITE;
/*!40000 ALTER TABLE `sisgroupsactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sisgroupsactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sismenu`
--

DROP TABLE IF EXISTS `sismenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sismenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sismenu`
--

LOCK TABLES `sismenu` WRITE;
/*!40000 ALTER TABLE `sismenu` DISABLE KEYS */;
INSERT INTO `sismenu` VALUES (1,NULL,'Escuelas','  fa fa-mortar-board','escuela',1);
/*!40000 ALTER TABLE `sismenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sismenuactions`
--

DROP TABLE IF EXISTS `sismenuactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sismenuactions` (
  `menuAccId` int(11) NOT NULL,
  `menuId` int(11) NOT NULL,
  `actId` int(11) DEFAULT NULL,
  PRIMARY KEY (`menuAccId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sismenuactions`
--

LOCK TABLES `sismenuactions` WRITE;
/*!40000 ALTER TABLE `sismenuactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sismenuactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sisusers`
--

DROP TABLE IF EXISTS `sisusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sisusers` (
  `usrId` int(11) NOT NULL,
  `usrNick` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usrName` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usrLastName` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usrComision` int(11) NOT NULL,
  `usrPassword` varchar(5000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `grpId` int(11) NOT NULL,
  `usrimag` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sisusers`
--

LOCK TABLES `sisusers` WRITE;
/*!40000 ALTER TABLE `sisusers` DISABLE KEYS */;
INSERT INTO `sisusers` VALUES (0,'superadmin','Super','Admin',0,'21232f297a57a5a743894a0e4a801fc3',0,''),(1,'admin','Control','Operario',0,'21232f297a57a5a743894a0e4a801fc3',1,''),(2,'uco','Operario','Operario',0,'ee11cbb19052e40b07aac0ca060c23ee',4,''),(3,'soporte','Soporte','Trazalog',0,'855fa866d6d3f72f6a50bc213244e36d',1,''),(4,'insumos','Insumos','Pañol',0,'3c6ff27f8f4c3efa42bcee681d78589f',3,''),(5,'supervisor','Supervisor','Supervisor',0,'09348c20a019be0318387c08df7a783d',5,'');
/*!40000 ALTER TABLE `sisusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'copygest'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-01 17:39:54
