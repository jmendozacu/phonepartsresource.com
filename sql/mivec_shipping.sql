/*
SQLyog Ultimate - MySQL GUI v8.2 
MySQL - 5.5.5-10.1.10-MariaDB : Database - phonepartsresource_com
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phonepartsresource_com` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `phonepartsresource_com`;

/*Table structure for table `mivec_shipping_carrier` */

DROP TABLE IF EXISTS `mivec_shipping_carrier`;

CREATE TABLE `mivec_shipping_carrier` (
  `carrier_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `carrier_name` varchar(50) NOT NULL,
  `updated_at` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`carrier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `mivec_shipping_carrier` */

LOCK TABLES `mivec_shipping_carrier` WRITE;

insert  into `mivec_shipping_carrier`(`carrier_id`,`carrier_name`,`updated_at`) values (1,'DHL','2017-07-26'),(2,'UPS','2017-07-26'),(3,'Aramex','2017-07-26'),(5,'Fedex','2017-07-26'),(6,'TNT','2017-07-26');

UNLOCK TABLES;

/*Table structure for table `mivec_shipping_country` */

DROP TABLE IF EXISTS `mivec_shipping_country`;

CREATE TABLE `mivec_shipping_country` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  `iso` char(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `mivec_shipping_country` */

LOCK TABLES `mivec_shipping_country` WRITE;

insert  into `mivec_shipping_country`(`id`,`country`,`iso`) values (1,'Afghanistan','AF'),(2,'Albania','AL'),(3,'Algeria','DZ'),(4,'American Samoa','AS'),(5,'Andorra','AD'),(6,'Angola','AO'),(7,'Anguilla','AI'),(8,'Antarctica','AQ'),(9,'Antigua and Barbuda','AG'),(10,'Argentina','AR'),(11,'Armenia','AM'),(12,'Aruba','AW'),(13,'Australia','AU'),(14,'Austria','AT'),(15,'Azerbaijan','AZ'),(16,'Bahamas','BS'),(17,'Bahrain','BH'),(18,'Bangladesh','BD'),(19,'Barbados','BB'),(20,'Belarus','BY'),(21,'Belgium','BE'),(22,'Belize','BZ'),(23,'Benin','BJ'),(24,'Bermuda','BM'),(25,'Bhutan','BT'),(26,'Bolivia','BO'),(27,'Bosnia and Herzegovina','BA'),(28,'Botswana','BW'),(29,'Bouvet Island','BV'),(30,'Brazil','BR'),(31,'British Indian Ocean Territory','IO'),(32,'British Virgin Islands','VG'),(33,'Brunei','BN'),(34,'Bulgaria','BG'),(35,'Burkina Faso','BF'),(36,'Burundi','BI'),(37,'Cambodia','KH'),(38,'Cameroon','CM'),(39,'Canada','CA'),(40,'Cape Verde','CV'),(41,'Cayman Islands','KY'),(42,'Central African Republic','CF'),(43,'Chad','TD'),(44,'Chile','CL'),(45,'China','CN'),(46,'Christmas Island','CX'),(47,'Cocos Islands','CC'),(48,'Colombia','CO'),(49,'Comoros','KM'),(50,'Congo - Brazzaville','CG'),(51,'Cook Islands','CK'),(52,'Costa Rica','CR'),(53,'Croatia','HR'),(54,'Cuba','CU'),(55,'Cyprus','CY'),(56,'Czech Republic','CZ'),(57,'Denmark','DK'),(58,'Djibouti','DJ'),(59,'Dominica','DM'),(60,'Dominican Republic','DO'),(61,'Ecuador','EC'),(62,'Egypt','EG'),(63,'El Salvador','SV'),(64,'Equatorial Guinea','GQ'),(65,'Eritrea','ER'),(66,'Estonia','EE'),(67,'Ethiopia','ET'),(68,'Falkland Islands','FK'),(69,'Faroe Islands','FO'),(70,'Fiji','FJ'),(71,'Finland','FI'),(72,'France','FR'),(73,'French Guiana','GF'),(74,'French Polynesia','PF'),(75,'French Southern Territories','TF'),(76,'Gabon','GA'),(77,'Gambia','GM'),(78,'Georgia','GE'),(79,'Germany','DE'),(80,'Ghana','GH'),(81,'Gibraltar','GI'),(82,'Greece','GR'),(83,'Greenland','GL'),(84,'Grenada','GD'),(85,'Guadeloupe','GP'),(86,'Guam','GU'),(87,'Guatemala','GT'),(88,'Guinea','GN'),(89,'Guinea-Bissau','GW'),(90,'Guyana','GY'),(91,'Haiti','HT'),(92,'Heard Island and McDonald Islands','HM'),(93,'Honduras','HN'),(94,'Hong Kong','HK'),(95,'Hungary','HU'),(96,'Iceland','IS'),(97,'India','IN'),(98,'Indonesia','ID'),(99,'Iran','IR'),(100,'Iraq','IQ'),(101,'Ireland','IE'),(102,'Israel','IL'),(103,'Italy','IT'),(104,'Ivory Coast','CI'),(105,'Jamaica','JM'),(106,'Japan','JP'),(107,'Jordan','JO'),(108,'Kazakhstan','KZ'),(109,'Kenya','KE'),(110,'Kiribati','KI'),(111,'Kuwait','KW'),(112,'Kyrgyzstan','KG'),(113,'Laos','LA'),(114,'Latvia','LV'),(115,'Lebanon','LB'),(116,'Lesotho','LS'),(117,'Liberia','LR'),(118,'Libya','LY'),(119,'Liechtenstein','LI'),(120,'Lithuania','LT'),(121,'Luxembourg','LU'),(122,'Macau','MO'),(123,'Macedonia','MK'),(124,'Madagascar','MG'),(125,'Malawi','MW'),(126,'Malaysia','MY'),(127,'Maldives','MV'),(128,'Mali','ML'),(129,'Malta','MT'),(130,'Marshall Islands','MH'),(131,'Martinique','MQ'),(132,'Mauritania','MR'),(133,'Mauritius','MU'),(134,'Mayotte','YT'),(135,'Metropolitan France','FX'),(136,'Mexico','MX'),(137,'Micronesia','FM'),(138,'Moldova','MD'),(139,'Monaco','MC'),(140,'Mongolia','MN'),(141,'Montserrat','MS'),(142,'Morocco','MA'),(143,'Mozambique','MZ'),(144,'Myanmar','MM'),(145,'Namibia','NA'),(146,'Nauru','NR'),(147,'Nepal','NP'),(148,'Netherlands','NL'),(149,'Netherlands Antilles','AN'),(150,'New Caledonia','NC'),(151,'New Zealand','NZ'),(152,'Nicaragua','NI'),(153,'Niger','NE'),(154,'Nigeria','NG'),(155,'Niue','NU'),(156,'Norfolk Island','NF'),(157,'North Korea','KP'),(158,'Northern Mariana Islands','MP'),(159,'Norway','NO'),(160,'Oman','OM'),(161,'Pakistan','PK'),(162,'Palau','PW'),(163,'Panama','PA'),(164,'Papua New Guinea','PG'),(165,'Paraguay','PY'),(166,'Peru','PE'),(167,'Philippines','PH'),(168,'Pitcairn','PN'),(169,'Poland','PL'),(170,'Portugal','PT'),(171,'Puerto Rico','PR'),(172,'Qatar','QA'),(173,'Reunion','RE'),(174,'Romania','RO'),(175,'Russia','RU'),(176,'Rwanda','RW'),(177,'Saint Helena','SH'),(178,'Saint Kitts and Nevis','KN'),(179,'Saint Lucia','LC'),(180,'Saint Pierre and Miquelon','PM'),(181,'Saint Vincent and the Grenadines','VC'),(182,'Samoa','WS'),(183,'San Marino','SM'),(184,'Sao Tome and Principe','ST'),(185,'Saudi Arabia','SA'),(186,'Senegal','SN'),(187,'Seychelles','SC'),(188,'Sierra Leone','SL'),(189,'Singapore','SG'),(190,'Slovakia','SK'),(191,'Slovenia','SI'),(192,'Solomon Islands','SB'),(193,'Somalia','SO'),(194,'South Africa','ZA'),(195,'South Georgia and the South Sandwich Islands','GS'),(196,'South Korea','KR'),(197,'Spain','ES'),(198,'Sri Lanka','LK'),(199,'Sudan','SD'),(200,'Suriname','SR'),(201,'Svalbard and Jan Mayen','SJ'),(202,'Swaziland','SZ'),(203,'Sweden','SE'),(204,'Switzerland','CH'),(205,'Syria','SY'),(206,'Taiwan','TW'),(207,'Tajikistan','TJ'),(208,'Tanzania','TZ'),(209,'Thailand','TH'),(210,'Togo','TG'),(211,'Tokelau','TK'),(212,'Tonga','TO'),(213,'Trinidad and Tobago','TT'),(214,'Tunisia','TN'),(215,'Turkey','TR'),(216,'Turkmenistan','TM'),(217,'Turks and Caicos Islands','TC'),(218,'Tuvalu','TV'),(219,'U.S. Virgin Islands','VI'),(220,'Uganda','UG'),(221,'Ukraine','UA'),(222,'United Arab Emirates','AE'),(223,'United Kingdom','GB'),(224,'United States','US'),(225,'United States Minor Outlying Islands','UM'),(226,'Uruguay','UY'),(227,'Uzbekistan','UZ'),(228,'Vanuatu','VU'),(229,'Vatican','VA'),(230,'Venezuela','VE'),(231,'Vietnam','VN'),(232,'Wallis and Futuna','WF'),(233,'Western Sahara','EH'),(234,'Yemen','YE'),(235,'Zambia','ZM'),(236,'Zimbabwe','ZW');

UNLOCK TABLES;

/*Table structure for table `mivec_shipping_quote` */

DROP TABLE IF EXISTS `mivec_shipping_quote`;

CREATE TABLE `mivec_shipping_quote` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `carrier_id` smallint(6) unsigned NOT NULL COMMENT 'carrier id',
  `country_id` mediumint(8) unsigned NOT NULL,
  `quote_first` decimal(5,2) NOT NULL,
  `quote_add` decimal(5,2) NOT NULL,
  `quote_remote` decimal(5,2) NOT NULL DEFAULT '0.00',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `mivec_shipping_data_carrier` (`carrier_id`),
  KEY `mivec_shipping_country` (`country_id`),
  CONSTRAINT `FK_mivec_shipping_data_carrier` FOREIGN KEY (`carrier_id`) REFERENCES `mivec_shipping_carrier` (`carrier_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_mivec_shipping_data_country` FOREIGN KEY (`country_id`) REFERENCES `mivec_shipping_country` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `mivec_shipping_quote` */

LOCK TABLES `mivec_shipping_quote` WRITE;

insert  into `mivec_shipping_quote`(`id`,`carrier_id`,`country_id`,`quote_first`,`quote_add`,`quote_remote`,`updated_at`) values (1,1,3,'86.30','32.10','0.00','2017-07-26 17:49:53');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
