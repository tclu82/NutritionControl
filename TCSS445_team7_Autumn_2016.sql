-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: vergil.u.washington.edu    Database: nutrition
-- ------------------------------------------------------
-- Server version	5.5.18

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
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `food_id` int(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `protein_g` int(5) DEFAULT NULL,
  `carb_g` int(5) DEFAULT NULL,
  `fat_g` int(5) DEFAULT NULL,
  `calories_cal` int(5) DEFAULT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'egg',3,1,2,78),(2,'sausage',1,1,3,229),(3,'burrito',4,6,5,447),(4,'chacolate',1,3,4,155),(5,'steak',10,2,5,679),(6,'bread',1,4,2,79),(7,'spaghetti',2,8,6,221),(8,'sandwitch',4,5,6,340),(9,'pizza',3,5,7,285),(10,'burger',7,4,8,354),(11,'cheese burger',7,6,10,303),(12,'bacon',4,2,4,43),(13,'beer',0,5,5,213),(14,'black tea',0,3,0,2),(15,'chips',2,3,5,152),(16,'coffee',0,3,1,1),(17,'coke',2,7,3,140),(18,'fried rice',3,6,6,228),(19,'fried noodle',3,7,3,234),(20,'fries',2,5,5,355),(21,'ice cream',1,4,9,137),(22,'water',1,1,1,0),(23,'milk',5,2,4,103),(24,'OJ',2,6,0,39),(25,'pop corn',0,6,6,106),(26,'wine',1,5,3,123);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meal` (
  `id` smallint(5) unsigned NOT NULL,
  `m_id` smallint(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`m_id`),
  KEY `fk_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal`
--

LOCK TABLES `meal` WRITE;
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` VALUES (1,1,'breakfast'),(1,3,'lunch'),(1,5,'supper'),(3,1,'breakfast'),(3,3,'lunch'),(3,2,'brunch'),(3,5,'supper'),(3,4,'snack'),(2,2,'brunch'),(2,4,'snack'),(1,2,'brunch'),(2,3,'lunch'),(1,4,'snack'),(2,5,'supper'),(2,1,'breakfast');
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal_has_food`
--

DROP TABLE IF EXISTS `meal_has_food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meal_has_food` (
  `id` int(5) NOT NULL,
  `m_id` int(5) NOT NULL,
  `m_date` date NOT NULL,
  `food_id` int(5) NOT NULL,
  `serving_size` decimal(2,0) DEFAULT NULL,
  `meal_record` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`meal_record`,`id`,`m_id`,`m_date`,`food_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal_has_food`
--

LOCK TABLES `meal_has_food` WRITE;
/*!40000 ALTER TABLE `meal_has_food` DISABLE KEYS */;
INSERT INTO `meal_has_food` VALUES (1,3,'2016-12-01',11,2,1),(1,1,'2016-12-01',1,2,2),(1,3,'2016-12-01',20,1,3),(1,5,'2016-12-01',21,1,4),(1,1,'2016-12-01',2,2,5),(1,5,'2016-12-01',7,1,6),(1,5,'2016-12-01',26,2,7),(1,1,'2016-12-02',12,3,8),(1,1,'2016-12-02',6,1,9),(1,5,'2016-12-02',3,1,10),(1,3,'2016-12-02',17,1,11),(1,1,'2016-12-02',1,2,12),(1,1,'2016-12-02',23,1,13),(1,1,'2016-12-02',24,1,14),(1,1,'2016-12-02',2,2,15),(1,3,'2016-12-02',7,1,16),(2,5,'2016-12-02',5,1,17),(1,3,'2016-12-03',9,4,18),(1,5,'2016-12-03',17,1,19),(1,5,'2016-12-03',3,3,20),(2,4,'2016-12-02',15,1,21),(2,3,'2016-12-02',17,2,22),(2,2,'2016-12-01',6,2,23),(2,2,'2016-12-01',4,3,24),(2,2,'2016-12-01',16,2,25),(2,4,'2016-12-01',8,1,26),(2,5,'2016-12-01',5,1,27),(2,5,'2016-12-01',22,2,28),(2,5,'2016-12-02',18,1,29),(2,5,'2016-12-02',19,1,30),(2,5,'2016-12-02',6,1,31),(2,3,'2016-12-02',7,1,32),(2,3,'2016-12-03',16,1,33),(2,5,'2016-12-03',17,1,34),(2,3,'2016-12-03',20,1,35),(2,5,'2016-12-03',9,2,36),(2,5,'2016-12-03',22,1,37),(2,3,'2016-12-03',8,1,38),(3,5,'2016-12-01',13,2,39),(3,1,'2016-12-01',3,1,40),(3,3,'2016-12-01',17,1,41),(3,5,'2016-12-01',2,3,42),(3,3,'2016-12-01',20,1,43),(3,5,'2016-12-01',20,1,44),(3,1,'2016-12-01',24,2,45),(3,3,'2016-12-01',9,3,46),(3,5,'2016-12-02',13,2,47),(3,5,'2016-12-02',11,1,48),(3,3,'2016-12-02',17,2,49),(3,5,'2016-12-02',20,1,50),(3,4,'2016-12-02',25,1,51),(3,1,'2016-12-02',8,1,52),(3,3,'2016-12-02',7,1,53),(3,2,'2016-12-03',14,2,54),(3,4,'2016-12-03',15,1,55),(3,5,'2016-12-03',19,1,56),(3,2,'2016-12-03',24,1,57),(3,2,'2016-12-03',1,1,58),(3,2,'2016-12-03',9,4,59),(3,2,'2016-12-03',15,1,60),(3,2,'2016-12-03',2,3,61),(3,5,'2016-12-03',22,1,62),(1,5,'2016-12-07',20,1,63),(1,5,'2016-12-12',20,2,64),(2,1,'2016-12-14',13,6,66),(2,1,'2016-12-13',1,2,67),(1,1,'2016-12-02',1,3,68);
/*!40000 ALTER TABLE `meal_has_food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_status` enum('C','T') DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `fname` varchar(15) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `trainer_id` smallint(5) unsigned NOT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'T','jilarson@uw.edu','Joel','Larson',1,'12345'),(2,'C','ghs9@uw.edu','Gabriel','Summers',1,'asdf'),(3,'C','tclu82@uw.edu','Zac','Lu',1,'qwer');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-05 19:59:38
