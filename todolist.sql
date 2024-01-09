-- MariaDB dump 10.19  Distrib 10.4.25-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: todolist
-- ------------------------------------------------------
-- Server version	10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'sandesh rai','sandesh@gmail.com','$2y$10$1/.nNul3RmWqYRogvWEkC.xpVHGY45eNGNSy0ekk.4Lf.lrSyCsZ.'),(2,'sandesh rai','sandesh@gmail.com','$2y$10$O0jArEkekFO4K3BWREo1UeNp7gE383Cu8FqhUEuQtL20Ci6k5YR0e'),(3,'sandesh rai','sandesh@gmail.com','$2y$10$hbPY/HFv2a6BnjK11LGq1uDUnO5MX0gZEg3CfVfCj7BNlb9rgO00q'),(4,'sandesh rai','sandesh@gmail.com','$2y$10$toOGpYyb7LxUAicRpFB8XuZKsQ05vP693jSFfpRv9u535yAx4MLrm'),(5,'training_morning','','$2y$10$HzVKCprf77TuKTVTPg9KaefZ/U4sYFMk88KxkBfU/yv9O5rhpdZ6G'),(6,'kabin raj','k@gmail.com','$2y$10$/tUncE2IoUS/Jgdecgne/Os5b4o8L1qvUcdX1fMARUS/zX28P5hbq'),(7,'prabin','prabin@ggmail.com','$2y$10$pLchi1GpDmg9izsSP/uCTuUTMXmN6CWX/OwXQ/xRJ/HrJDAlGgkQm'),(8,'kabin dad','kabinD@gmail.com','$2y$10$sNYw3Zg2PrDVKGmJIfxDcOvpe1fX5E037zGNmu/1kIhtctutPAyTC'),(9,'hh','h@gmail.com','$2y$10$k33DhbVG9Nqaf.xV.z/fS.nZOz18V5XHr8JqsWRSktd.xHJY3CKDW'),(10,'MIilan','Milan@gmail.com','$2y$10$8Kh00fbkldQH/Yfy.6zxpOeD8i1edXDdfsB6CR7LFhKwTuLWAYRaq'),(11,'ka bin','ka@gmail.com','$2y$10$Xs5BwD48qe/drbot5PevNuAROCD02D4UlBIaGR9IW8vuCA6N6C42m'),(12,'Pra','pra@gmail.com','$2y$10$XOIz6Y5nu3Srd9XfyUrUVOc9nLWMYzb/FdFS1RB2IpF4ixac5GrPW'),(13,'KLR','KLR@gmail.com','$2y$10$Y9ToAcUHtCJxVvumwsEnUOjB6Oa4M/VNAWghAD2lupFAOHgQ1rfz6'),(14,'KN xtha','KN@gmail.com','$2y$10$nh5DKEhzxrwUYDGXMBbA7Oy4ZFtCfBHBrQw4AJZWZ5GXxZ0jgR8Ta');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `taskName` varchar(255) DEFAULT NULL,
  `taskDescription` text DEFAULT NULL,
  `priority` enum('normal','important') DEFAULT 'normal',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`),
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-12  7:50:59
