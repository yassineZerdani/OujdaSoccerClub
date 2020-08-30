CREATE DATABASE  IF NOT EXISTS `heroku_85f8cfc15f34318` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_85f8cfc15f34318`;
-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: us-cdbr-east-02.cleardb.com    Database: heroku_85f8cfc15f34318
-- ------------------------------------------------------
-- Server version	5.5.62-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+01:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_info`
--

LOCK TABLES `admin_info` WRITE;
/*!40000 ALTER TABLE `admin_info` DISABLE KEYS */;
INSERT INTO `admin_info` VALUES (1,'admin','admin@admin.com','admin');
/*!40000 ALTER TABLE `admin_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `day`
--

DROP TABLE IF EXISTS `day`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `day` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
INSERT INTO `day` VALUES (11,'2020-08-15',33),(21,'2020-08-25',100);
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_products` (
  `order_pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(15) DEFAULT NULL,
  `amt` int(15) DEFAULT NULL,
  PRIMARY KEY (`order_pro_id`),
  KEY `order_products` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `order_products` FOREIGN KEY (`order_id`) REFERENCES `orders_info` (`order_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `p_status` enum('En Attente','Termine') NOT NULL DEFAULT 'En Attente',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `orders_info`
--

DROP TABLE IF EXISTS `orders_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` double DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `buying_price` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (371,0,'Eau 0.33 CL',3,'','products/qmlh7c6ndjcvcxaujgk6','',663,2),(381,0,'EAU 0.50 CL',4,'','products/d2l0yj9ki7dpirop9wl8','',343,0),(391,0,'EAU CIEL 1.5 L',8,'','products/klbbsoxi7rczrmfb7ibm','',147,0),(411,0,'Fast',15,'','products/m28lwukfcyuwtfzkxbgc','',5,0),(431,0,'Enjoy',8,'','products/gs2ia6erkvydyv6svdy8','',-4,0),(441,0,'Abtal',3,'','products/dm2f0oho2nzoy60zjyza','',500,0),(491,2,'Walfers',3,'','products/hpkguy8dd8z3zxyn6tjj','',-9,0),(501,2,'Kit Kat',8,'','products/osmawhfvjinzi45h9rqy','',-3,0),(511,2,'Bounty',9,'','products/pcbpc8e3dkbhx0gyb7ue','',1,0),(521,2,'Kinder',9,'','products/gpmc4jyis5ltuj72vxcn','',52,6),(531,2,'Goufrette',2,'','products/g32ogqzp02epnoqx8wkq','',-11,0),(541,2,'Snikers',7,'','products/ghkjx6xu8eyairen05uu','',-1,0),(551,2,'Delice Kinder',7,'','products/qtwc2ptawavmhkaddr79','',0,0),(561,2,'Balconi',4,'','products/akuiemf8fp6tdkhwxolu','',-4,0),(581,0,'Choc.Good',4,'','products/bf1emellhyr0dpcm15o1','',6,0),(591,3,'Chwingum',1,'','products/e5hzooewaw94wxgum0ep','',-5,0),(601,3,'Pringles',20,'','products/jg2dqbmfz6cbsovgrtpx','',-1,0),(631,1,'The',10,'','products/avnjdclw2d8isqhxwulo','',-31,0),(641,0,'aquaruis',8,'','products/gdiinkkp5gfh8jrzm897','',166,0),(691,1,'CAFE & LAIT',10,'','products/taaacnboy7susb63dgfr','',-65,0),(701,0,'CANNETTES',7,'','products/cuofqwe7old6gaoiopad','',416,0),(721,0,'POMS',10,'','products/if502gfc3qekop9mfzav','',21,0),(751,0,'COCA VERRE',10,'','products/glhxxyjod7uedwznrbie','',18,0),(761,0,'SPRITE VERRE',10,'','products/p2t67yt8iuoabl5db6lv','',-1,0),(771,0,'FANTA CITRON VERRE',10,'','products/icd2xthfjrzn2twobufj','',20,0),(791,0,'FANTA ORANGE VERRE',10,'','products/i2ycokc4m0cmcbemg2eu','',21,0),(831,1,'nespresso',10,'','products/xsjfzxzckbirwndn25dc','',86,0),(841,1,'CAFE ',10,'','products/harkexg8pafavezvt8oq','',-46,0),(851,3,'pringles',10,'','products/owaahbxdfnil92wrqf9a','',23,0),(881,0,'hawai verre',10,'','products/dlcaw8r4lyy5l4iwfitf','',-1,0),(901,0,'schweppes citron',10,'','products/lhwrhu2r4vpv31jev6u6','',-3,0),(911,0,'schweppes tonic',10,'','products/nv8d0qh7tiklbtqpzngo','',-3,0),(921,0,'energie drink',10,'','products/wfsdpnffpendqrttdcf4','',0,0),(931,2,'madeleine',2,'','products/umvdjuuvjx8kanj0e1xn','',39,0),(941,2,'madeleine',3,'','products/sa9shenryruycoz8ixhg','',116,0),(1031,0,'NESPRESSO',10,'','products/innh27odkdzum1spfuc3','',171,3),(1051,0,'POWERADE',15,'','products/nowpxkg3hufw5mlbrhdh','',10,0),(1061,0,'UPGRADE',15,'','products/tv5iyf5ukcjry6thzhfg','',10,0),(1071,0,'oiasis',12,'','products/aowcqu0sfsrynf3oloub','',20,0),(1091,0,'B52',10,'','products/ktgndsmrvqr3jj9h30mh','',-2,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sortie` (
  `counter_id` int(11) NOT NULL AUTO_INCREMENT,
  `val` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`counter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `stadium_reservations`
--

DROP TABLE IF EXISTS `stadium_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stadium_reservations` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation_stadium` varchar(45) NOT NULL,
  `reservation_date` datetime NOT NULL,
  `customer` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('Paid','Canceled') DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `reservation_stadium_idx` (`reservation_stadium`),
  CONSTRAINT `FK_reservation_stadium` FOREIGN KEY (`reservation_stadium`) REFERENCES `stadiums` (`stadium_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stadium_reservations`
--

LOCK TABLES `stadium_reservations` WRITE;
/*!40000 ALTER TABLE `stadium_reservations` DISABLE KEYS */;
INSERT INTO `stadium_reservations` VALUES (71,'5v5_1','2020-08-25 19:00:00','med',100,'Paid','slm');
/*!40000 ALTER TABLE `stadium_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stadiums`
--

DROP TABLE IF EXISTS `stadiums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stadiums` (
  `stadium_id` varchar(10) NOT NULL,
  `stadium_type` enum('7v7','5v5','Padel') NOT NULL,
  PRIMARY KEY (`stadium_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stadiums`
--

LOCK TABLES `stadiums` WRITE;
/*!40000 ALTER TABLE `stadiums` DISABLE KEYS */;
INSERT INTO `stadiums` VALUES ('5v5_1','5v5'),('5v5_2','5v5'),('5v5_3','5v5'),('5v5_4','5v5'),('5v5_5','5v5'),('7v7_1','7v7'),('Padel_1','Padel'),('Padel_2','Padel');
/*!40000 ALTER TABLE `stadiums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_info`
--

LOCK TABLES `user_info` WRITE;
/*!40000 ALTER TABLE `user_info` DISABLE KEYS */;
INSERT INTO `user_info` VALUES (12,'admin1','1','','admin1','','','');
/*!40000 ALTER TABLE `user_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `num_teleph` varchar(200) NOT NULL,
  `type_abonnement` varchar(200) NOT NULL,
  `avatar` text,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paiement` int(11) NOT NULL,
  `paiement_avance` int(11) NOT NULL,
  `paiement_status` varchar(200) NOT NULL,
  `match_played` int(11) NOT NULL DEFAULT '0',
  `unpayed_amount` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (41,'yahya elkuds','0636769513','2 /semaine  pour  12  mois','users/jiaqtypr9ivjglfcayaw','2020-08-12 17:40:02',300,0,'terminÃ©',0,0),(51,'youssef zero','0636769513','1 /semaine  pour  12  mois','users/s3dknwtxwlxrztexlxhu','2020-08-12 17:41:24',300,0,'terminÃ©',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'heroku_85f8cfc15f34318'
--

--
-- Dumping routines for database 'heroku_85f8cfc15f34318'
--
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-30 11:44:16
