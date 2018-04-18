-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: foodpantrydatabase.ckyeqeyox4kj.us-east-2.rds.amazonaws.com    Database: Pantry
-- ------------------------------------------------------
-- Server version	5.6.39-log

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
-- Table structure for table `breadRecipe`
--

DROP TABLE IF EXISTS `breadRecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breadRecipe` (
  `ingredientName` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `unitName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breadRecipe`
--

LOCK TABLES `breadRecipe` WRITE;
/*!40000 ALTER TABLE `breadRecipe` DISABLE KEYS */;
INSERT INTO `breadRecipe` VALUES ('yeast',1,'packet(s)'),('water',2.25,'cup(s)'),('sugar',3,'tablespoon(s)'),('salt',1,'tablespoon(s)'),('vegetable oil',2,'tablespoon(s)'),('flour',6.5,'cup(s)');
/*!40000 ALTER TABLE `breadRecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cakeRecipe`
--

DROP TABLE IF EXISTS `cakeRecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cakeRecipe` (
  `ingredientName` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `unitName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cakeRecipe`
--

LOCK TABLES `cakeRecipe` WRITE;
/*!40000 ALTER TABLE `cakeRecipe` DISABLE KEYS */;
INSERT INTO `cakeRecipe` VALUES ('butter',1,'cup(s)'),('brown sugar',3,'cup(s)'),('egg',4,'piece(s)'),('vanilla extract',2,'teaspoon(s)'),('flour',2.66,'cup(s)'),('cocoa powder',0.75,'cup(s)'),('baking soda',3,'teaspoon(s)'),('salt',0.5,'teaspoon(s)'),('sour cream',1.33,'cup(s)'),('water',1.33,'cup(s)');
/*!40000 ALTER TABLE `cakeRecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cookieRecipe`
--

DROP TABLE IF EXISTS `cookieRecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cookieRecipe` (
  `ingredientName` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `unitName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cookieRecipe`
--

LOCK TABLES `cookieRecipe` WRITE;
/*!40000 ALTER TABLE `cookieRecipe` DISABLE KEYS */;
INSERT INTO `cookieRecipe` VALUES ('sugar',0.75,'cup(s)'),('brown sugar',0.75,'cup(s)'),('butter',1,'cup(s)'),('vanilla',1,'teaspoon(s)'),('egg',1,'piece(s)'),('flour',2.25,'cup(s)'),('baking soda',1,'teaspoon(s)'),('salt',0.5,'teaspoon(s)'),('chocolate chips',2,'cup(s)');
/*!40000 ALTER TABLE `cookieRecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `garlicChickenRecipe`
--

DROP TABLE IF EXISTS `garlicChickenRecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `garlicChickenRecipe` (
  `ingredientName` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `unitName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `garlicChickenRecipe`
--

LOCK TABLES `garlicChickenRecipe` WRITE;
/*!40000 ALTER TABLE `garlicChickenRecipe` DISABLE KEYS */;
INSERT INTO `garlicChickenRecipe` VALUES ('butter',0.5,'cup(s)'),('garlic',3,'tablespoon(s)'),('soy sauce',3,'tablespoon(s)'),('black pepper',0.25,'tablespoon(s)'),('parsley',1,'tablespoon(s)'),('chicken',3,'pound(s)');
/*!40000 ALTER TABLE `garlicChickenRecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `greenSaladRecipe`
--

DROP TABLE IF EXISTS `greenSaladRecipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `greenSaladRecipe` (
  `ingredientName` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `unitName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `greenSaladRecipe`
--

LOCK TABLES `greenSaladRecipe` WRITE;
/*!40000 ALTER TABLE `greenSaladRecipe` DISABLE KEYS */;
INSERT INTO `greenSaladRecipe` VALUES ('black olives',0.25,'cup(s)'),('garlic',3,'tablespoon(s)'),('onion',0.5,'piece(s)'),('lemon juice',0.25,'cup(s)'),('parsley',4,'tablespoon(s)'),('egg',3,'piece(s)'),('mixed greens',5,'cup(s)'),('tomato',1,'cup(s)');
/*!40000 ALTER TABLE `greenSaladRecipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `name` varchar(20) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `caloriesPerUnit` double DEFAULT NULL,
  `quantityOfUnitsPerCup` double DEFAULT NULL,
  `unit` varchar(25) DEFAULT NULL,
  `ingredientType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES ('onion',1,44,1.1,'piece(s)','vegetable'),('carrot',1,25,2,'piece(s)','vegetable'),('celery',1,6,2.5,'piece(s)','vegetable'),('garlic',1,5,45,'piece(s)','vegetable'),('broccoli',1,11,3,'piece(s)','vegetable'),('cauliflower',1,3,8.23,'piece(s)','vegetable'),('cucumber',1,47,0.3,'piece(s)','vegetable'),('potato',1,163,0.7,'piece(s)','vegetable'),('asparagus',1,24,9,'piece(s)','vegetable'),('spinach',1,7,1,'cup(s)','vegetable'),('tomato',1,24,1.2,'piece(s)','vegetable'),('water',50,0,1,'cup(s)','liquid'),('milk',1,103,1,'cup(s)','dairy'),('vegetable oil',1,1879,1,'cup(s)','liquid'),('egg',15,78,4.8,'piece(s)','protein'),('butter',1,1620,1,'cup(s)','dairy'),('cheese',1,419,1,'cup(s)','dairy'),('chicken',1,748,0.3,'pound(s)','protein'),('beef',1,1137,0.3,'pound(s)','protein'),('flour',5,455,1,'cup(s)','grain'),('salt',1,0,1,'teaspoon(s)','misc'),('sugar',1,773,1,'cup(s)','misc'),('brown sugar',1,836,1,'cup(s)','misc'),('baking powder',1,2,48,'teaspoon(s)','misc'),('baking soda',1,0,48,'teaspoon(s)','misc'),('vanilla',1,12,48,'teaspoon(s)','misc'),('chocolate chips',5,800,1,'cup(s)','misc'),('rolled oats',1,300,1,'cup(s)','grain'),('yeast',1,20,1,'packet(s)','misc'),('brussels sprout',1,8,4.6,'piece(s)','vegetable'),('bell pepper',1,24,0.77,'piece(s)','vegetable'),('apple',1,95,0.59,'piece(s)','fruit'),('banana',1,105,1.27,'piece(s)','fruit'),('watermelon',1,1371,0.04,'piece(s)','fruit'),('pineapple',1,452,0.18,'piece(s)','fruit'),('grapefruit',1,146,1.57,'piece(s)','fruit'),('blueberry',1,85,1,'cup(s)','fruit'),('blackberry',1,62,1,'cup(s)','fruit'),('raspberry',1,65,1,'cup(s)','fruit'),('strawberry',1,4,12,'piece(s)','fruit'),('cranberry',1,46,1,'cup(s)','fruit'),('orange',1,45,1.37,'piece(s)','fruit'),('grapes',1,62,1,'cup(s)','fruit'),('mango',1,201,0.49,'piece(s)','fruit'),('kiwi',1,42,2.6,'piece(s)','fruit'),('papaya',1,146,0.54,'piece(s)','fruit'),('lemon',1,17,3.65,'pieces(s)','fruit'),('lime',1,20,3.65,'pieces(s)','fruit'),('pomegranate',1,233,0.62,'piece(s)','fruit'),('cherry',1,77,1,'cup(s)','fruit'),('cantaloupe',1,186,0.29,'piece(s)','fruit'),('lemon juice',1,53,1,'cup(s)','liquid'),('lime juice',1,60,1,'cup(s)','liquid'),('orange juice',1,111,1,'cup(s)','liquid'),('apple juice',1,113,1,'cup(s)','liquid'),('pineapple juice',1,133,1,'cup(s)','liquid'),('tomato juice',1,42,1,'cup(s)','liquid'),('cranberry juice',1,117,1,'cup(s)','liquid'),('grape juice',1,152,1,'cup(s)','liquid'),('nutmeg',20,37,16,'tablespoon(s)','spice'),('tumeric',20,24,16,'tablespoon(s)','spice'),('ginger',20,2,48,'teaspoon(s)','spice'),('garlic powder',20,32,16,'tablespoon(s)','spice'),('onion powder',20,24,16,'tablespoon(s)','spice'),('paprika',20,19,16,'tablespoon(s)','spice'),('cayenne pepper',20,17,16,'tablespoon(s)','spice'),('chili powder',20,22,16,'tablespoon(s)','spice'),('cumin',20,22,16,'tablespoon(s)','spice'),('oregano',20,6,48,'teaspoon(s)','spice'),('parsley',20,1,16,'tablespoon(s)','spice'),('crushed red pepper f',20,5,48,'teaspoon(s)','spice'),('garlic salt',20,0,16,'tablespoon(s)','spice'),('cinnamon',20,198,16,'tablespoon(s)','spice'),('vanilla extract',20,38,16,'tablespoon(s)','spice'),('honey',20,64,16,'tablespoon(s)','spice'),('almond',20,529,1,'cup(s)','protein'),('peanut',2,828,1,'cup(s)','protein'),('walnut',2,523,1,'cup(s)','protein'),('cashew',2,719,1,'cup(s)','protein'),('pecan',2,684,1,'cup(s)','protein'),('allspice',20,16,16,'tablespoon(s)','spice'),('bay leaf',20,6,16,'tablespoon(s)','spice'),('cloves',20,18,16,'tablespoon(s)','spice'),('mace',20,25.2,16,'tablespoon(s)','spice'),('dill',20,1,16,'tablespoon(s)','herb'),('chives',20,1,16,'tablespoon(s)','herb'),('cilantro',20,4,1,'cup(s)','herb'),('thyme',20,1,48,'teaspoon(s)','herb'),('saffron',20,6,16,'tablespoon(s)','herb'),('mace',20,25,16,'tablespoon(s)','herb'),('mushroom',20,4,3.8,'piece(s)','vegetable'),('pear',20,102,0.9,'piece(s)','fruit'),('corn',20,77,1.7,'piece(s)','vegetable'),('cocoa powder',50,12,16,'tablespoon(s)','misc'),('sour cream',1,445,1,'cup(s)','dairy'),('soy sauce',1,9,16,'tablespoon(s)','misc'),('black pepper',15,17,16,'tablespoon(s)','spice'),('black olives',15,142,1,'cup(s)','vegetables'),('mixed greens',9,9,1,'cup(s)','vegetables');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','password'),('awood','password6'),('bbiorn','password4'),('cbroderick','password3'),('jjohnson','password2'),('sthomas','password5');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vegetables`
--

DROP TABLE IF EXISTS `vegetables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vegetables` (
  `veggieID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `Stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`veggieID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vegetables`
--

LOCK TABLES `vegetables` WRITE;
/*!40000 ALTER TABLE `vegetables` DISABLE KEYS */;
INSERT INTO `vegetables` VALUES (1,'carrots',20),(2,'onions',10),(3,'green peppers',15),(4,'celery',20),(5,'red peppers',20),(6,'banana peppers',20),(7,'artichokes',20),(8,'asparagus',20),(9,'beets',20),(10,'broccoli',20),(11,'brussels sprouts',20),(12,'cauliflower',20),(13,'corn',20),(14,'eggplant',20),(15,'green beans',20),(16,'peas',20),(17,'potatoes',20),(18,'spinach',20),(19,'zucchini',20),(20,'sweet potatoes',20);
/*!40000 ALTER TABLE `vegetables` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-18 11:18:30
