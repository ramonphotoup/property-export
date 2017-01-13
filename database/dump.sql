-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: photoup_export
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.04.1

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
-- Table structure for table `api_resources`
--

DROP TABLE IF EXISTS `api_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api_resources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partners_id` int(11) NOT NULL,
  `type` enum('Authorization','Property','Property Image') DEFAULT NULL,
  `url` text,
  `description` text,
  PRIMARY KEY (`id`),
  KEY `fk_api_resources_partners1_idx` (`partners_id`),
  CONSTRAINT `fk_api_resources_partners1` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_resources`
--

LOCK TABLES `api_resources` WRITE;
/*!40000 ALTER TABLE `api_resources` DISABLE KEYS */;
/*!40000 ALTER TABLE `api_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_default_values`
--

DROP TABLE IF EXISTS `attribute_default_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_default_values` (
  `attributes_id` int(11) NOT NULL,
  `value` text,
  KEY `fk_attribute_defualt_values_attributes1_idx` (`attributes_id`),
  CONSTRAINT `fk_attribute_defualt_values_attributes1` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_default_values`
--

LOCK TABLES `attribute_default_values` WRITE;
/*!40000 ALTER TABLE `attribute_default_values` DISABLE KEYS */;
/*!40000 ALTER TABLE `attribute_default_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attribute_options`
--

DROP TABLE IF EXISTS `attribute_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute_options` (
  `attributes_id` int(11) NOT NULL,
  `value` text,
  KEY `fk_attribute_options_attributes1_idx` (`attributes_id`),
  CONSTRAINT `fk_attribute_options_attributes1` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute_options`
--

LOCK TABLES `attribute_options` WRITE;
/*!40000 ALTER TABLE `attribute_options` DISABLE KEYS */;
INSERT INTO `attribute_options` VALUES (53,'[\'Attached\',\'Detached\',\'None\']'),(58,'[\'SingleFamily\',\'Duplex\',\'Triplex\',\'Quad-Plex\',\'Condo\',\'Co-op\',\'MobileHome\',\'MultiFamily\',\'MultiFamily\',\'Timeshare\',\'TownHouse\',\'Miscellaneous\',\'ResidentialLand\']'),(60,'[\'rubik_v2\',\'rubik\',\'pipeline\',\'saren\',\'focal\',\'air\',\'naut\']');
/*!40000 ALTER TABLE `attribute_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photoup_standard_fields_id` int(11) DEFAULT NULL,
  `schema_id` int(11) NOT NULL,
  `input_types_id` int(11) NOT NULL,
  `data_types_id` int(11) NOT NULL,
  `permissions_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `label` varchar(250) DEFAULT NULL,
  `description` text,
  `validation` text,
  PRIMARY KEY (`id`),
  KEY `fk_attributes_schema1_idx` (`schema_id`),
  KEY `fk_attributes_input_types1_idx` (`input_types_id`),
  KEY `fk_attributes_data_types1_idx` (`data_types_id`),
  KEY `fk_attributes_permissions1_idx` (`permissions_id`),
  KEY `fk_attributes_photoup_standard_fields1_idx` (`photoup_standard_fields_id`),
  CONSTRAINT `fk_attributes_data_types1` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attributes_input_types1` FOREIGN KEY (`input_types_id`) REFERENCES `input_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attributes_permissions1` FOREIGN KEY (`permissions_id`) REFERENCES `permissions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attributes_photoup_standard_fields1` FOREIGN KEY (`photoup_standard_fields_id`) REFERENCES `photoup_standard_fields` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attributes_schema1` FOREIGN KEY (`schema_id`) REFERENCES `schema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attributes`
--

LOCK TABLES `attributes` WRITE;
/*!40000 ALTER TABLE `attributes` DISABLE KEYS */;
INSERT INTO `attributes` VALUES (41,NULL,4,1,1,1,'uid','User ID','The Rela User ID who owns the object','required'),(42,NULL,4,1,1,1,'title','Title','The title of the property',''),(43,NULL,4,1,1,1,'street','','Property number and street name','required'),(44,NULL,4,1,1,1,'premise','Premise','Apartment or suite',''),(45,NULL,4,1,1,1,'city','City','City of the property','required'),(46,NULL,4,1,1,1,'state','State','2 character state abbreviation','required'),(47,NULL,4,1,1,1,'zip','Zip','Zip/Postal code of the property','required'),(48,NULL,4,1,1,1,'country','Country','2 character country abbreviation','required'),(49,NULL,4,1,2,1,'square_feet','Square Footage','Square footage of the property',''),(50,NULL,4,1,2,1,'bedrooms','Number of bedrooms','Number of bedrooms in the property',''),(51,NULL,4,1,2,1,'baths','Number of Bathrooms','Number of bathrooms in the property',''),(52,NULL,4,1,2,1,'list_price','List Price','Current list price of the property',''),(53,NULL,4,2,3,1,'garage','Garage','Garage',''),(54,NULL,4,1,1,1,'lot_size','Lot Size','Size of the lot for the property',''),(55,NULL,4,1,2,1,'stories','Number of Stories','Number of stories for the property',''),(56,NULL,4,1,1,1,'description','Description','Description of the property',''),(57,NULL,4,1,1,1,'parking_spaces','Number of parking spaces','Number of parking spaces included with the property',''),(58,NULL,4,2,3,1,'property_type','Property Type','Property Type',''),(59,NULL,4,1,2,1,'year_built','Year Built','The year the property was built',''),(60,NULL,4,2,3,1,'template','Template','Template',''),(61,NULL,5,1,1,1,'nid','NID','The Rela defined id representing the property',''),(62,NULL,5,1,4,1,'created','Date Created','The time the property was added to Rela',''),(63,NULL,5,1,4,1,'changed','Date Changed','The time the property was last changed',''),(64,NULL,5,1,1,1,'title','Title','The title of the property',''),(65,NULL,5,1,5,1,'file','File','Contains the file data, Base64 encoded image data','required'),(66,NULL,5,1,1,1,'file_name','Filename','Name of the image file including extension','required'),(67,NULL,5,1,2,1,'property_reference','Property Reference','Rela nid of Property to add image to','required'),(68,NULL,5,1,6,1,'main_image','Main Image','Set this image as the main image',''),(69,NULL,5,1,1,1,'description','Description','Description of the image',''),(70,NULL,5,1,4,1,'date_taken','Date Taken','Original date taken in UNIX timestamp','');
/*!40000 ALTER TABLE `attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'string'),(2,'int'),(3,'enum'),(4,'timestamp'),(5,'blob'),(6,'bool'),(7,'bigint(20) unsigned'),(8,'text'),(9,'enum(\'Live\',\'Trial\')'),(10,'enum(\'live\',\'developers\',\'training\')'),(11,'int(5)'),(12,'float'),(13,'int(11)'),(14,'enum(\'Yes\',\'No\')'),(15,'enum(\'Low\',\'Med\',\'High\')'),(16,'enum(\'rush\',\'rush2\',\'rush3\',\'rush4\',\'rush5\',\'24\',\'36\',\'48\')'),(17,'enum(\'Deleted\',\'Client Fill-up\',\'Client Uploading\',\'New\',\'Awaiting Edit\',\'Downloading\',\'Editing\',\'Uploading\',\'Partial Upload\',\'Pending\',\'Needs Approval\',\'Ready\',\'Revision\',\'Partial Upload Revision\',\'Uploading Revision\',\'Accepted\')'),(18,'enum(\'Server\',\'S3\',\'Deleted\')'),(19,'varchar(20)'),(20,'bigint(20)'),(21,'varchar(50)'),(22,'datetime'),(23,'varchar(30)'),(24,'enum(\'processing\',\'success\',\'failed\')'),(25,'smallint(6)'),(26,'enum(\'Bottom Left\',\'Bottom Right\',\'Top Left\',\'Top Right\')'),(27,'enum(\'Yes\',\'No\',\'cost_error\',\'cost_has_discount\')'),(28,'enum(\'Hdr\',\'Masking\',\'Blending\',\'Panoramic\')'),(29,'tinytext'),(30,'varchar(10)'),(31,'enum(\'Uploading\',\'Uploaded\',\'Revision\')');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `endpoints`
--

DROP TABLE IF EXISTS `endpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `endpoints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `entities_id` int(11) NOT NULL,
  `method` enum('Post','Put') DEFAULT NULL,
  `url` text,
  `http_headers` text,
  PRIMARY KEY (`id`),
  KEY `fk_end_points_entities1_idx` (`entities_id`),
  CONSTRAINT `fk_end_points_entities1` FOREIGN KEY (`entities_id`) REFERENCES `entities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `endpoints`
--

LOCK TABLES `endpoints` WRITE;
/*!40000 ALTER TABLE `endpoints` DISABLE KEYS */;
INSERT INTO `endpoints` VALUES (10,'Create Property',1,'Post','https://www.relahq.com/api/v1/object/property','[\'content-type: application/json\', \'API-KEY: YOUR_API_KEY_HERE\', \'TOKEN: YOUR_TOKEN_HERE\']'),(11,'Edit Property',1,'Put','https://www.relahq.com/api/v1/object/property/$nid','[\'content-type: application/json\', \'API-KEY: YOUR_API_KEY_HERE\', \'TOKEN: YOUR_TOKEN_HERE\']'),(12,'Create Property Image',2,'Post','https://www.relahq.com/api/v1/object/property_image','[\'content-type: application/json\', \'API-KEY: YOUR_API_KEY_HERE\', \'TOKEN: YOUR_TOKEN_HERE\']'),(13,'Edit Property Image',2,'Put','\'https://www.relahq.com/api/v1/object/property_image/$nid\'','[\'content-type: application/json\', \'API-KEY: YOUR_API_KEY_HERE\', \'TOKEN: YOUR_TOKEN_HERE\']');
/*!40000 ALTER TABLE `endpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entities`
--

DROP TABLE IF EXISTS `entities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partners_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entity_partners_idx` (`partners_id`),
  CONSTRAINT `fk_entity_partners` FOREIGN KEY (`partners_id`) REFERENCES `partners` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entities`
--

LOCK TABLES `entities` WRITE;
/*!40000 ALTER TABLE `entities` DISABLE KEYS */;
INSERT INTO `entities` VALUES (1,1,'property',NULL,NULL),(2,1,'property_image',NULL,NULL);
/*!40000 ALTER TABLE `entities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `input_types`
--

DROP TABLE IF EXISTS `input_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input_types`
--

LOCK TABLES `input_types` WRITE;
/*!40000 ALTER TABLE `input_types` DISABLE KEYS */;
INSERT INTO `input_types` VALUES (1,'text'),(2,'select');
/*!40000 ALTER TABLE `input_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `api_key` varchar(45) DEFAULT NULL,
  `token` varchar(45) DEFAULT NULL,
  `app_id` varchar(45) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners` DISABLE KEYS */;
INSERT INTO `partners` VALUES (1,'Rela','9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo','TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY','178256','2017-01-05 00:53:21','2017-01-05 00:53:21'),(2,'tf','afsdf','asdfa','asdfasd','2017-01-06 03:32:38','2017-01-06 03:32:38');
/*!40000 ALTER TABLE `partners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'read|write');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photoup_standard_fields`
--

DROP TABLE IF EXISTS `photoup_standard_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photoup_standard_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` enum('home','photo') DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `data_types_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photoup_standard_fields_data_types1_idx` (`data_types_id`),
  CONSTRAINT `fk_photoup_standard_fields_data_types1` FOREIGN KEY (`data_types_id`) REFERENCES `data_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photoup_standard_fields`
--

LOCK TABLES `photoup_standard_fields` WRITE;
/*!40000 ALTER TABLE `photoup_standard_fields` DISABLE KEYS */;
INSERT INTO `photoup_standard_fields` VALUES (9,'home','hid',7),(10,'home','haddress',8),(11,'home','htype',9),(12,'home','hdashtype',10),(13,'home','photo_count',11),(14,'home','edit_cost',12),(15,'home','usd_cost',12),(16,'home','upload_cancelled',13),(17,'home','sent_upload_error',14),(18,'home','hpriority',15),(19,'home','htimeline',16),(20,'home','free_rush',14),(21,'home','hstatus',17),(22,'home','hrating',13),(23,'home','hrating_new',13),(24,'home','hrating_old',13),(25,'home','hnote',8),(26,'home','hfeedback_note',8),(27,'home','hfeedback_note_new',8),(28,'home','hfeedback_note_old',8),(29,'home','buc_keep_raw',14),(30,'home','buc_keep_exp1',14),(31,'home','buc_keep_other_exp',14),(32,'home','done_cleaning',14),(33,'home','zip_location',18),(34,'home','backup_root_folder',19),(35,'home','backup_size',20),(36,'home','s3_backup_size',20),(37,'home','prev_hstatus',21),(38,'home','deleted_by',7),(39,'home','hcreated',22),(40,'home','hsubmit_click',22),(41,'home','upload_expire',22),(42,'home','hsubmitted',22),(43,'home','hdeadline',22),(44,'home','hdelivery_hour',23),(45,'home','client_approved_date',22),(46,'home','hdownloaded_date',22),(47,'home','huploader_id',7),(48,'home','huploaded_date',22),(49,'home','ready_date',22),(50,'home','oid',7),(51,'home','ucid',7),(52,'home','owid',7),(53,'home','first_home',14),(54,'home','htid',7),(55,'home','attachment_note',8),(56,'home','home_path',21),(57,'home','tf_status',24),(58,'home','tf_tour_id',7),(59,'home','tf_custom_w',19),(60,'home','tf_custom_h',19),(61,'home','tf_process_id',7),(62,'home','tf_percentage',25),(63,'home','tf_process_started',22),(64,'home','tf_notify_email',14),(65,'home','use_scenename',14),(66,'home','tf_wid',7),(67,'home','tf_watermark_position',26),(68,'home','done_creating_zip',14),(69,'home','sdash_tid',7),(70,'home','flush_photo_cost',27),(71,'home','photo_data_updated',13),(72,'home','update_photo_count',14),(73,'home','custom_hpriority',15),(74,'home','custom_hdeadline',22),(75,'home','sharing',14),(76,'photo','pid',7),(77,'photo','pname',8),(78,'photo','p_fsr',14),(79,'photo','p_isr',14),(80,'photo','p_le',14),(81,'photo','p_mor1',14),(82,'photo','p_lc',14),(83,'photo','p_dtd',14),(84,'photo','p_mor2',14),(85,'photo','p_grouping',28),(86,'photo','p_notes',8),(87,'photo','cname',29),(88,'photo','pwidth',30),(89,'photo','pheight',30),(90,'photo','original_pwidth',30),(91,'photo','original_pheight',30),(92,'photo','pstatus',31),(93,'photo','fname',8),(94,'photo','is_favorite',14),(95,'photo','favorite_note',8),(96,'photo','feedback_note',8),(97,'photo','is_final_backup',14),(98,'photo','hid',7),(99,'photo','sort_rank',13),(100,'photo','scene_name',8),(101,'photo','puploader_id',7),(102,'photo','puploader_tid',7),(103,'photo','puploaded_date',22),(104,'photo','photo_edit_cost',12),(105,'photo','approved_by',7),(106,'photo','owid',7),(107,'photo','upload_width',30),(108,'photo','upload_height',30);
/*!40000 ALTER TABLE `photoup_standard_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema`
--

DROP TABLE IF EXISTS `schema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entities_id` int(11) NOT NULL,
  `version` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_schema_entities1_idx` (`entities_id`),
  CONSTRAINT `fk_schema_entities1` FOREIGN KEY (`entities_id`) REFERENCES `entities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema`
--

LOCK TABLES `schema` WRITE;
/*!40000 ALTER TABLE `schema` DISABLE KEYS */;
INSERT INTO `schema` VALUES (4,1,'1.0'),(5,2,'1.0');
/*!40000 ALTER TABLE `schema` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'photoup_export'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_attribute_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_attribute_create`(
	IN schema_id INT,
    IN attribute_name VARCHAR(255) CHARSET utf8,
    IN label VARCHAR(255) CHARSET utf8,
	IN description TEXT CHARSET utf8,
    IN access VARCHAR(255) CHARSET utf8,
	IN input_type VARCHAR(255) CHARSET utf8,
	IN data_type VARCHAR(255) CHARSET utf8,
	IN field_validation TEXT CHARSET utf8,
	IN attribute_option TEXT CHARSET utf8,
	IN default_value VARCHAR(255) CHARSET utf8,
	OUT alert_message TEXT CHARSET utf8,
	OUT return_id INT
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET alert_message = "SQL EXCEPTION ERROR; Procedure Name : sp_attribute_create";
	END;

	#DECLARE EXIT HANDLER FOR SQLWARNING
	#BEGIN
		#SET alert_message = "SQL WARNING; Procedure Name : sp_attribute_create";
	#END;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET alert_message = "SQL CONTINUE HANDLER; Procedure Name : sp_attribute_create";

    SET @attributes_id = NULL;
    SET @permissions_id = NULL;
    SET @data_types_id = NULL;
    SET @input_types_id = NULL;
    
	
    IF EXISTS (SELECT * FROM `schema` WHERE `schema`.`id` = schema_id) THEN
    
		SELECT `data_types`.`id` INTO @data_types_id FROM `data_types` WHERE `data_types`.`name` = data_type;
		SELECT `input_types`.`id` INTO @input_types_id FROM `input_types` WHERE `input_types`.`name` = input_type;
        SELECT `permissions`.`id` INTO @permissions_id FROM `permissions` WHERE `permissions`.`access` = access;

		IF @data_types_id IS NULL THEN
		  INSERT INTO `data_types`(`name`) VALUES (data_type);
		  SET @data_types_id = LAST_INSERT_ID();
		END IF;

		IF @input_types_id IS NULL THEN
		  INSERT INTO `input_types`(`name`) VALUES (input_type);
		  SET @input_types_id = LAST_INSERT_ID();
		END IF;
        
        IF @permissions_id IS NULL THEN
		  INSERT INTO `permissions`(`access`) VALUES(access);
          SET @permissions_id = LAST_INSERT_ID();
        END IF;

		IF EXISTS (SELECT `attributes`.`id` FROM `attributes` WHERE `attributes`.`schema_id` = schema_id AND `attributes`.`name` = attribute_name) THEN
			
		  SELECT `attributes`.`id` INTO @attributes_id FROM `attributes` WHERE `attributes`.`schema_id` = schema_id AND `attributes`.`name` = attribute_name;
			
		  UPDATE `attributes`
		  SET
			`input_types_id` = @input_types_id,
			`data_types_id` = @data_types_id,
            `permissions_id` = @permissions_id,
			`label` = label,
			`description` = description,
            `validation` = field_validation
		  WHERE id = @attributes_id;

		  IF attribute_option IS NOT NULL AND attribute_option != '' THEN
			IF EXISTS (SELECT * FROM `attribute_options` WHERE `attributes_id` = @attributes_id) THEN
			  UPDATE `attribute_options` SET `value` = attribute_option WHERE `attributes_id` = @attributes_id;
			ELSE
			  INSERT INTO `attribute_options` (`attributes_id`, `value`) VALUES (@attributes_id, attribute_option);
			END IF;
		  ELSE
			DELETE FROM `attribute_options` WHERE `attribute_options`.`attributes_id` = @attributes_id;
		  END IF;

		  IF default_value IS NOT NULL AND default_value != '' THEN
			IF EXISTS (SELECT * FROM `attribute_default_values` WHERE `attributes_id` = @attributes_id) THEN
			  UPDATE `attribute_default_values` SET `value` = default_value WHERE `attributes_id` = @attributes_id;
			ELSE
			  INSERT INTO `attribute_default_values` (`attributes_id`,`value`) VALUES (@attributes_id, default_value);
			END IF;
		  ELSE
			DELETE FROM `attribute_default_values` WHERE `attribute_default_values`.`attributes_id` = @attributes_id;
		  END IF;

		ELSE
					
		  INSERT INTO `attributes` (`schema_id`,`input_types_id`,`data_types_id`,`permissions_id`,`name`,`label`,`description`,`validation`) VALUES (
			schema_id, @input_types_id, @data_types_id, @permissions_id, attribute_name, label, description, field_validation
		  );

		  SET @attributes_id = LAST_INSERT_ID();

		  IF attribute_option IS NOT NULL AND attribute_option != '' THEN

			  INSERT INTO `attribute_options` (`attributes_id`, `value`) VALUES (@attributes_id, attribute_option);

		  END IF;

		  IF default_value IS NOT NULL AND default_value != '' THEN

			  INSERT INTO `attribute_default_values` (`attributes_id`,`value`) VALUES (@attributes_id, default_value);

		  END IF;

		END IF;
        
        SET alert_message = "Success";
        
    ELSE
    
		SET alert_message = "Schema Not Found";
    
    END IF;
    

    SET return_id = @attributes_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_attribute_delete` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_attribute_delete`(
	IN schema_id INT,
	OUT alert_message TEXT CHARSET utf8,
	OUT return_id INT
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET alert_message = "SQL EXCEPTION ERROR; Procedure Name : sp_attribute_delete";
	END;

	#DECLARE EXIT HANDLER FOR SQLWARNING
	#BEGIN
		#SET alert_message = "SQL WARNING; Procedure Name : sp_attribute_delete";
	#END;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET alert_message = "SQL CONTINUE HANDLER; Procedure Name : sp_attribute_delete";

    DELETE FROM `attribute_options` WHERE `attribute_options`.`attributes_id` IN (SELECT `attributes`.`id` FROM `attributes` WHERE `attributes`.`schema_id` = schema_id);
    DELETE FROM `attribute_default_values` WHERE `attribute_default_values`.`attributes_id` IN (SELECT `attributes`.`id` FROM `attributes` WHERE `attributes`.`schema_id` = schema_id);
    DELETE FROM `attributes` WHERE `attributes`.`schema_id` = schema_id;
    DELETE FROM `schema` WHERE `schema`.`id` = schema_id;
    
	SET alert_message = 'Success';
    SET return_id = 1;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_partner_entity_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_partner_entity_create`(
	IN partners_id INT,
	IN entity_name VARCHAR(255) CHARSET utf8,
	IN schema_version VARCHAR(255) CHARSET utf8,
	OUT alert_message TEXT CHARSET utf8,
	OUT return_id INT
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET alert_message = "SQL EXCEPTION ERROR; Procedure Name : sp_partner_entity_create";
	END;

	#DECLARE EXIT HANDLER FOR SQLWARNING
	#BEGIN
		#SET alert_message = "SQL WARNING; Procedure Name : sp_partner_entity_create";
	#END;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET alert_message = "SQL CONTINUE HANDLER; Procedure Name : sp_partner_entity_create";

    SET @entities_id = NULL;
    SET @schema_id = NULL;
	
    
    IF EXISTS (SELECT * FROM `partners` WHERE `partners`.`id` = partners_id) THEN
    
		IF NOT EXISTS (SELECT `entities`.`id` FROM `entities` WHERE `entities`.`name` = entity_name AND `entities`.`partners_id` = partners_id) THEN

			INSERT INTO `entities`(`partners_id`,`name`) VALUES(partners_id,entity_name);

			SET @entities_id = LAST_INSERT_ID();
            
            IF schema_version IS NOT NULL AND schema_version != '' THEN
            
				INSERT INTO `schema`(`entities_id`,`version`) VALUES(@entities_id, schema_version);

				SET @schema_id = LAST_INSERT_ID();
                
			END IF;
            
		ELSE
		
		   SELECT `entities`.`id` INTO @entities_id FROM `entities` WHERE `entities`.`name` = entity_name AND `entities`.`partners_id` = partners_id;
			
		   IF EXISTS(SELECT `id` FROM `schema` WHERE `entities_id` = @entities_id AND `version` = schema_version) THEN

			  SELECT `id` INTO @schema_id FROM `schema` WHERE `entities_id` = @entities_id AND `version` = schema_version;
			  
		   ELSE   
           
			  IF schema_version IS NOT NULL AND schema_version != '' THEN
            
				INSERT INTO `schema`(`entities_id`,`version`) VALUES(@entities_id, schema_version);

				SET @schema_id = LAST_INSERT_ID();
                
			  END IF;
				
		   END IF;

		END IF;
		
        SET alert_message = "Success";
    
    ELSE
		SET alert_message = "Partner Not Found";
    END IF;
    

    SET return_id = @entities_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_photo_up_standard_field_create` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_photo_up_standard_field_create`(
	IN p_table VARCHAR(255) CHARSET utf8,
    IN p_name VARCHAR(255) CHARSET utf8,
    IN p_data_type VARCHAR(255) CHARSET utf8,
    IN p_data_types_id INT,
    OUT alert_message TEXT CHARSET utf8,
	OUT return_id INT
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION
	BEGIN
		SET alert_message = "SQL EXCEPTION ERROR; Procedure Name : sp_photo_up_standard_field_create";
	END;

	#DECLARE EXIT HANDLER FOR SQLWARNING
	#BEGIN
		#SET alert_message = "SQL WARNING; Procedure Name : sp_photo_up_standard_field_create";
	#END;

	DECLARE CONTINUE HANDLER FOR NOT FOUND SET alert_message = "SQL CONTINUE HANDLER; Procedure Name : sp_photo_up_standard_field_create";

    SET @photoup_standard_fields_id = NULL;
    SET @data_types_id = p_data_types_id;
    
    IF p_data_type IS NOT NULL AND p_data_type != '' THEN
		
        IF EXISTS(SELECT * FROM `data_types` WHERE `data_types`.`name` = p_data_type) THEN
        
			SELECT `data_types`.`id` INTO @data_types_id FROM `data_types` WHERE `data_types`.`name` = p_data_type;
            
        ELSE
        
			INSERT INTO `data_types`(`name`) VALUES(p_data_type);
            
            SET @data_types_id = LAST_INSERT_ID();
            
        END IF;
        
    END IF;
    
    
    IF EXISTS (SELECT * FROM `photoup_standard_fields` WHERE `photoup_standard_fields`.`table` = p_table && `photoup_standard_fields`.`name` = p_name) THEN
		
        SELECT `photoup_standard_fields`.`id` INTO @photoup_standard_fields_id FROM `photoup_standard_fields` WHERE `photoup_standard_fields`.`table` = p_table && `photoup_standard_fields`.`name` = p_name;
		
        UPDATE `photoup_standard_fields` SET `photoup_standard_fields`.`data_types_id` = @data_types_id WHERE `photoup_standard_fields`.`id` = @photoup_standard_fields_id;
    
    ELSE
		
        INSERT INTO `photoup_standard_fields`(`table`,`name`,`data_types_id`) VALUES(p_table, p_name, @data_types_id);
        
        SET @photoup_standard_fields_id = LAST_INSERT_ID();
        
    END IF;
    
	SET alert_message = 'Success';
    SET return_id = @photoup_standard_fields_id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-13 11:06:02
