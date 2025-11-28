-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: property_market_db
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
-- Table structure for table `admin_messages`
--

DROP TABLE IF EXISTS `admin_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `property_id` int(10) unsigned NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_user` (`user_id`),
  KEY `fk_admin_property` (`property_id`),
  CONSTRAINT `fk_admin_property` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_admin_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_messages`
--

LOCK TABLES `admin_messages` WRITE;
/*!40000 ALTER TABLE `admin_messages` DISABLE KEYS */;
INSERT INTO `admin_messages` VALUES (1,1,1,'Testing message option'),(2,2,1,'Testing admin messages 2'),(3,2,1,'Testing admin messages 2');
/*!40000 ALTER TABLE `admin_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interests`
--

DROP TABLE IF EXISTS `interests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` enum('Active','No more interested','Found property','Removed','Something else','Inappropriate','Not compliant with rules') NOT NULL DEFAULT 'Active',
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_interest_property` (`property_id`),
  KEY `fk_interest_user` (`user_id`),
  CONSTRAINT `fk_interest_property` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_interest_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interests`
--

LOCK TABLES `interests` WRITE;
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` VALUES (1,1,1,'Active','I am interested in your property, and i want to take a look at it'),(2,1,7,'Active','I am interested in your property, and i want to take a look at it'),(3,2,7,'Active','I am interested in your property, and i want to take a look at it'),(4,3,5,'Active','I am interested in your property, and i want to take a look at it'),(5,3,10,'Active','I am interested in your property, and i want to take a look at it'),(6,4,5,'Active','I am interested in your property, and i want to take a look at it'),(7,2,5,'Active','I am interested in your property, and i want to take a look at it');
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `listings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Sold!','Do not want to sell','Something else','Inappropriate','Not compliant with rules') NOT NULL DEFAULT 'Active',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_listing_property` (`property_id`),
  CONSTRAINT `fk_listing_property` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (1,1,'Active','2025-10-26 16:18:17'),(2,2,'Active','2025-10-29 20:50:36'),(3,3,'Active','2025-10-29 20:51:12'),(4,4,'Active','2025-10-29 20:51:12');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `location` varchar(100) NOT NULL,
  `bedrooms` int(10) unsigned NOT NULL,
  `bathrooms` int(10) unsigned NOT NULL,
  `area` int(10) unsigned NOT NULL,
  `floor` int(10) unsigned NOT NULL,
  `parking` int(10) unsigned NOT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `picture` longblob NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `properties_unique` (`location`),
  KEY `fk_property_user` (`user_id`),
  KEY `fk_property_type` (`type_id`),
  CONSTRAINT `fk_property_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_property_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,2,1,'24 New Street Miami, OR 24560',8,8,545,3,6,2264000.00,_binary 'THIS IS THE PLACE FOR LONGBLOB PICTURE','Luxury Villa with a swimming pool that is deep enough for diving at one end. Offering all modern luxuries, this is the perfect property to live in if you like modern styling.\n\n\nFor lovers of open space and simplicity, it is the perfect place to live. In its tropical environment, it offers peaceful accommodation with views of the sea. The house is full of cutting-edge technology, and although it is in a tropical environment, you will never get hot due to the amazing cutting-edge home temperature control.'),(2,3,3,'34 Hope Street Portland, OR 42680',4,4,540,3,1,925600.00,'','This modern apartment offers a cozy living space with enough room for a family of four. It is located in a quiet, pleasant neighborhood.\r\n\r\nNearby you\'ll find several parks and a local market. The building is three years old and features modern amenities.'),(3,3,1,'22 Hope Street Portland, OR 16540',4,5,350,2,3,1925600.00,'','This modern villa offers a relaxed and comfortable lifestyle for those who enjoy peaceful living. The cutting-edge kitchen provides a beautiful space for cooking and spending quality time with family.\r\n\r\nSurrounding the villa is a lovely garden with areas for various activities, as well as an outdoor kitchen designed for the perfect open-air cooking experience.'),(4,9,2,'12 Hope Street Portland, OR 12650',5,6,350,60,3,2500000.00,'','This top-of-the-line penthouse offers stunning panoramic views of the city. It is the perfect retreat for those who want to relax while staying connected to the vibrant downtown atmosphere.\r\n\r\nBuilt just a year ago, this fully furnished modern residence combines luxury and comfort. Expansive balconies wrap around the unit, offering a sense of openness while keeping you peacefully insulated from city noise.');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `types_unique` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `types`
--

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` VALUES (3,'Apartment'),(1,'Luxury Villa'),(4,'Modern Condo'),(2,'Penthouse');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` enum('Male','Female','Neutral') NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `country` varchar(100) NOT NULL,
  `current_address` varchar(300) NOT NULL,
  `is_agent` tinyint(1) NOT NULL DEFAULT 0,
  `username` varchar(50) NOT NULL,
  `password` varchar(61) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_unique` (`username`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pero','Perić','1950-05-25','Male','peri@gmail.com','00387-12 123 456','Croatia','Sarajevska 101',0,'Peri155','$2y$10$0xk.jRTpg60PrPDYbFAaWOI5UxJwoiDzJToEcyj5L.Wp30iMorxfS','user'),(2,'Luke','Skywalker','1977-05-25','Male','XWing@gmail.com','00111-12 798 9456','United States of America','Tatooine 50',0,'Skywalker02','$2y$10$WkbyX0VcHPyfMbfmJfEHV.IsyzziypE8zilMDNcqwe7urEGe2Q2Pq','user'),(3,'John','Doe','1911-01-01','Male','J2D@yahoo.com','00111098765432','Canada','31st Street',0,'JD2','$2y$10$3wx9QZZ/vuNqYC7XnZLyo.cGPCEV8/qy4BdkulDQLmSuciLQYfkxS','user'),(5,'John','Doe','1911-01-01','Male','JD@gmial.com','00111098765432','Canada','31st Street',0,'JD','$2y$10$WHHt7elEOOQnEUpgTgHDHOJoAUUpPyASPugC8m5xhcWwItPY3yGzi','user'),(6,'Brzo','Brzić','1999-10-20','Male','Brzi@gmial.com','001336554987','Germany','Guethe',1,'Brzi','$2y$10$5FnZoEsI/YzmywV9nTEGQepO2zcqvXdcPXHXoWRHdVYT0WfJMbsD2','user'),(7,'Petko','Nedeljković','2000-01-20','Male','Suba123@gmial.com','001336554555','France','32th street',1,'Sub123','$2y$10$FhUAgPSXkJRfUvvd2VniIuSY/3EvKWc5OkveaTpTE43GQlQPjWwv6','user'),(8,'Fin','Storm','1987-07-18','Male','fn2187@gmial.com','001336552187','Croatia','Šenoin put 10',1,'Sub123','$2y$10$9j85UQPG987hpeEUbTOlnu4Miw6ix8mmrmkFhwM8zlWl89TOPtoYq','admin'),(9,'Nyota','Uhura','2005-05-15','Female','nyota.uhura@gmial.com','001336551111','United States','Starfleet Academy, San Francisco',1,'NyotaU','$2y$10$nOcwW4JnTJQroXkWRB1xAem/AhdnxuNJkRWEstOB5203oY/xxCPJi','user'),(10,'Seven','of Nine','2007-07-09','Female','seven.ofnine@gmial.com','001336552222','United Federation of Planets','USS Voyager',0,'Seven9','$2y$10$yxoZ5Uc7hAP3iHVFOGhtp.zEA0.T1R/RHVWM3jvSJFby6U0X690y2','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'property_market_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-11-09 20:16:35
