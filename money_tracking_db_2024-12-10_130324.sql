-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: money_tracking_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `money_tb`
--

DROP TABLE IF EXISTS `money_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `money_tb` (
  `moneyId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `moneyDetail` varchar(100) DEFAULT NULL,
  `moneyInOut` double DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `moneyDate` varchar(100) DEFAULT NULL,
  `moneyType` int(1) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`moneyId`),
  KEY `userId` (`userId`),
  CONSTRAINT `money_tb_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_tb` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `money_tb`
--

/*!40000 ALTER TABLE `money_tb` DISABLE KEYS */;
INSERT INTO `money_tb` VALUES (1,'ซื้อรองเท้า Nike Air มือ 2',800,2,'2 กุมภาพันธ์ 2567',2),(2,'กิน KFC',500,2,'15 มกราคม 2567',2),(3,'ขายของออนไลน์',2200,2,'12 มกราคม 2567',1),(4,'ซื้อคีย์บอร์ด',1200,2,'10 มกราคม 2567',2),(5,'เงินเดือน',3500,2,'5 มกราคม 2567',1),(6,'M&M',50,5,'15 เมษายน 2567',2),(7,'เงินค่าขนม',1500,5,'13 มกราคม 2567',1),(8,'แม่ให้ค่าอาหารแมว',5000,5,'10 ธันวาคม 2567',1),(9,'พ่อให้ค่าดูแลแมว',3000,5,'10 ธันวาคม 2567',1),(10,'Jefri Rama gives me for feeding cat',5000000,5,'10 ธันวาคม 2567',1),(11,'เพื่อนให้ค่าขนม',99,5,'10 ธันวาคม 2567',1),(12,'จ่ายค่าอาหารแมว',140000,5,'10 ธันวาคม 2567',2);
/*!40000 ALTER TABLE `money_tb` ENABLE KEYS */;

--
-- Table structure for table `user_tb`
--

DROP TABLE IF EXISTS `user_tb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tb` (
  `userId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `userFullname` varchar(100) DEFAULT NULL,
  `userBirthDate` varchar(100) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userPassword` varchar(50) DEFAULT NULL,
  `userImage` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tb`
--

/*!40000 ALTER TABLE `user_tb` DISABLE KEYS */;
INSERT INTO `user_tb` VALUES (2,'อัมรัตน์ โฆษิตวงศ์สกุล','7 กรกฎาคม 2597','amarat','1234','user_675173e814fd8_1733391336098.jpg'),(4,'สกุลรัตน์ รมณดี','5 ธันวาคม 2565','sakulrat','1234','default_img.jpg'),(5,'วิฬาร์ มณีวรรณ','5 พฤศจิกายน 2560','kitty','1234','user_67518742a6864_1733396290682.jpg');
/*!40000 ALTER TABLE `user_tb` ENABLE KEYS */;

--
-- Dumping routines for database 'money_tracking_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-10 13:03:28
