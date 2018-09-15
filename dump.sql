-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: db_b150028cs
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Current Database: `db_b150028cs`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_b150028cs` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_b150028cs`;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `course_course_id` varchar(15) NOT NULL,
  `ebook` varchar(200) DEFAULT NULL,
  `library_book` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`book_title`,`author`,`course_course_id`),
  KEY `course_course_id` (`course_course_id`),
  CONSTRAINT `book_ibfk_1` FOREIGN KEY (`course_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES ('ADVANCED ENGINEERING','KREYSZIG','MA2002',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=kreyszig'),('Algorithm Design: Pearson New International Edition','Kleinberg, Jon;Tardos, Eva','CS2005','http://lib.myilibrary.com/Open.aspx?id=527401','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=algorithm+design+Kleinberg'),('Algorithm Design: Pearson New International Edition','Kleinberg, Jon;Tardos, Eva','CS2094','http://lib.myilibrary.com/Open.aspx?id=527401','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=algorithm+design+Kleinberg'),('Algorithm Design: Pearson New International Edition','Kleinberg, Jon;Tardos, Eva','CS4050','http://lib.myilibrary.com/Open.aspx?id=527401','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=algorithm+design+Kleinberg'),('ASSEMBLY LANGUAGE AND PROGRAMMING','PETER ABEL','CS2093',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=Peter+abel+assembly+language'),('COMPUTER NETWORKING','K.W.ROSS','CS3006','http://lib.myilibrary.com/Open.aspx?id=469810','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=kurose+and+ross'),('COMPUTER ORGANISATION AND DESIGN','D.A.PATTERSEN','CS2004',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=computer+organisation+and+design+david'),('DIGITAL FUNDAMENTALS','T.L.FLOYD','CS2001','http://lib.myilibrary.com/?id=527061','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=floyd+digital+fundamentals'),('DISCRETE AND COMBINATORIAL MATHEMATICS','R.P.GRIMALDI','CS2006','http://lib.myilibrary.com/Open.aspx?id=527085','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=grimaldi+discrete'),('DISCRETE MATHEMATICS','KOLMAN','CS1001','http://lib.myilibrary.com/?id=527237','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=discrete+mathematics+kolman'),('ENVIRONMENTAL STUDIES','E.BHARUCHA','CS4001',NULL,NULL),('FUNDAMENTALS OF DATABASE SYSTEMS','RAMEZ ELMASRI','CS3002','http://lib.myilibrary.com/?id=527132','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=elmasri'),('FUNDAMENTALS OF LOGIC DESIGN','T.L.FLOYD','CS2091','http://lib.myilibrary.com/?id=527061','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=floyd+digital+fundamentals'),('fv ','wfvdf','CS4049','',''),('hello','bye','CS4049','',''),('Hi','wsedrftgvbyhnujmki,l.;','CS4049','frgtbhnjmk','gbhnjmk,l'),('INTRODUCTION OF ALGORITHMS','T.H.CORMEN','CS2005',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=introduction+to+algorithms+cormen'),('INTRODUCTION TO ALGORITHMS','T.H.CORMEN','CS2005',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=cormen+introduction+to+algorithms'),('INTRODUCTION TO ALGORITHMS','T.H.CORMEN','CS2094',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=cormen+introduction+to+algorithms'),('INTRODUCTION TO ALGORITHMS','T.H.CORMEN','CS4026',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=cormen+introduction+to+algorithms'),('INTRODUCTION TO ALGORITHMS','T.H.CORMEN','CS4050',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=cormen+introduction+to+algorithms'),('INTRODUCTION TO THE THEORY OF COMPUTATION','M.SIPSER','CS2094',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=Sipser'),('LINEAR SIGNALS AND SYSTEMS','B.P.LATHI','EC2014',NULL,'http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=lathi'),('MODERN COMPILER IMPLEMENTATION','PALSBERG J','CS3005',NULL,'http://124.124.70.124/cgi-bin/koha/opac-detail.pl?biblionumber=54378'),('OBJECT ORIENTED SOFTWARE ENINEERING','T C LETHBRIDGE','CS3004',NULL,NULL),('OPERATING SYSTEMS','WILLIAM STALLINGS','CS3003','http://lib.myilibrary.com/?id=262893','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=stallings+operating+'),('PROBABILITY AND STATISTICS','MILLER','MA2001','http://lib.myilibrary.com/?id=527152','http://124.124.70.124/cgi-bin/koha/opac-search.pl?q=miller+probability+and+statistics'),('STRUCTURE AND INTERPRETATION OF COMPUTER PROGRAMS','G J SUSSMAN','CS2002',NULL,NULL),('STRUCTURE AND INTERPRETATION OF COMPUTER PROGRAMS','G J SUSSMAN','CS2092',NULL,NULL),('THE C PROGRAMMING LANGUAGE','KERNIGHAN','ZZ1004',NULL,NULL),('Wow','It ','CS4049','WOEKS!','');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `course_id` varchar(15) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `credits` int(11) NOT NULL,
  `isCore` tinyint(1) NOT NULL,
  `prereq` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('CS1001','Foundation of Computing',2,1,NULL),('CS2001','LOGIC DESIGN',4,1,NULL),('CS2002','FOUNDATIONS OF COMPUTING',4,1,NULL),('CS2004','COMPUTER ORGANIZATION',4,1,NULL),('CS2005','DATA STRUCTURES AND LGORITHMS',4,1,NULL),('CS2006','DISCRETE STRUCTURES',4,1,NULL),('CS2091','LOGIC AND DESIGN',3,1,NULL),('CS2092','PROGAMMING LABORATORY',3,1,NULL),('CS2093','HARDWARE LABORATORY',3,1,NULL),('CS2094','DATA STRUCTURES LABORATORY',3,1,NULL),('CS3001','THEORY OF COMPUTATION',4,1,NULL),('CS3002','DATABASE MANAGEMENT SYSTEMS',4,1,NULL),('CS3003','OPERATING SYSTEMS',4,1,NULL),('CS3004','SOFTWARE ENGINEERING',4,1,NULL),('CS3005','COMPILER DESIGN',4,1,'CS2005'),('CS3006','COMPUTER NETWORKS',4,1,NULL),('CS3091','COMPILER LABORATORY',3,0,NULL),('CS3092','OPERTING SYSTEMS LABORATORY',3,0,NULL),('CS3093','NETWORKS LABORATORY',3,0,NULL),('CS3094','PROGRAMMING LANGUAGES LABORATORY',3,0,NULL),('CS3095','DATABASE MANAGEMENT SYSTEMS LABORATORY',3,0,NULL),('CS3096','COMPUTATIONAL INTELLIGENCE LABORATORY',3,0,NULL),('CS3097','WEB PROGRAMMING LABORATORY',3,0,NULL),('CS4001','ENVIRONMENTAL STUDIES',3,1,NULL),('CS4021','NUMBER THEORY AND CRYPTOGRAPHY',4,1,NULL),('CS4022','PRINCIPLES OF PROGRAMMING',4,0,NULL),('CS4023','COMPUTATIONAL INTELLIGENCE',4,0,NULL),('CS4024','INFORMATION TECHNOLOGY',4,0,NULL),('CS4025','GRAPH THEORY AND COMBINATORICS',4,0,NULL),('CS4026','COMBINATORIAL ALGORITHMS',4,0,NULL),('CS4027','TOPICS IN ALGORITHMS',4,0,NULL),('CS4028','QUANTUM COMPUTATION',4,0,NULL),('CS4029','TOPICS IN THEORY OF COMPUTATION',4,0,NULL),('CS4030','COMPUTATIONAL COMPLEXITY',4,0,NULL),('CS4031','COMPUTATIONAL ALGEBRA',4,0,NULL),('CS4032','COMPUTER ARCHITECTURE',4,0,NULL),('CS4033','DISTRIBUTED COMPUTING',4,0,'CS2005'),('CS4034','MIDDLEWARE TECHNOLOGIES',4,0,'CS4033'),('CS4035','COMPUTER SECURITY',4,0,NULL),('CS4036','ADVANCED DATABASE MANAGEMENT SYSTEMS',4,0,'CS3002'),('CS4037','CLOUD COMPUTING',4,0,'CS4033'),('CS4038','DATA MINING',4,0,NULL),('CS4039','MULTI AGENT SYSTEMS',4,0,NULL),('CS4040','BIOINFORMATICS',4,0,NULL),('CS4041','NATURAL LANGUAGE PROCESSING',4,0,NULL),('CS4042','WEB PROGRAMMING',4,0,NULL),('CS4043','IMAGE PROCESSING',4,0,NULL),('CS4044','PATTERN RECOGNITION',4,0,NULL),('CS4045','MEDICAL IMAGE PROCESSING',4,0,NULL),('CS4046','COMPUTER VISION',4,0,NULL),('CS4047','COMPUTER GRAPHICS',4,0,NULL),('CS4048','TOPICS IN COMPILERS',4,0,'CS3005'),('CS4049','ADVANCED COMPUTER NETWORKS',4,0,'CS3006'),('CS4050','DESIGN AND ANALYSIS OF ALGORITHMS',4,0,'CS2005'),('CS4051','CODING THEORY',4,0,NULL),('CS4052','LOGIC FOR COMPUTER SCIENCE',4,0,NULL),('CS4091','BIOCOMPUTING LABORATORY',3,0,NULL),('CS4092','DATA MINING LABORATORY',3,0,NULL),('CS4093','IMAGE PROCESSING LABORATORY',3,0,NULL),('CS4094','COMPUTER VISION LABORATORY',3,0,NULL),('CS4095','COMPUTER GRAPHICS LABORATORY',3,0,NULL),('CS4096','SOFTWARE ENGINEERING LABORATORY',3,0,'CS3004'),('CS4097','OBJECT ORIENTED PROGRAMMING LABORATORY',3,0,NULL),('EC2014','SIGNALS AND SYSTEMS',3,1,NULL),('MA2001','MATHEMATICS',3,1,'MA1001'),('MA2002','MATHEMATICS IV',3,1,'MA1002'),('MS4003','ECONOMICS',3,1,NULL),('MS4104','PRINCIPLES OF MANAGEMENT',3,1,NULL),('ZZ1004','COMPUTER PROGRAMMING',2,1,NULL);
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('try','$2y$10$3rAcFdzlGZ2m5SzQ8p5EXuw3ytQX59726SSOtvbpa3YDxbcvb4wJy');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `semester_course`
--

DROP TABLE IF EXISTS `semester_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `semester_course` (
  `semester_no` int(11) NOT NULL,
  `course_course_id` varchar(15) NOT NULL,
  PRIMARY KEY (`semester_no`,`course_course_id`),
  KEY `course_course_id` (`course_course_id`),
  CONSTRAINT `semester_course_ibfk_1` FOREIGN KEY (`course_course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `semester_course`
--

LOCK TABLES `semester_course` WRITE;
/*!40000 ALTER TABLE `semester_course` DISABLE KEYS */;
INSERT INTO `semester_course` VALUES (1,'CS1001'),(2,'CS1001'),(3,'CS2001'),(3,'CS2002'),(4,'CS2004'),(4,'CS2005'),(4,'CS2006'),(3,'CS2091'),(3,'CS2092'),(4,'CS2093'),(4,'CS2094'),(5,'CS3001'),(5,'CS3002'),(5,'CS3003'),(6,'CS3004'),(6,'CS3005'),(6,'CS3006'),(5,'CS3092'),(5,'CS3095'),(5,'CS4021'),(7,'CS4021'),(5,'CS4022'),(7,'CS4022'),(5,'CS4023'),(6,'CS4023'),(7,'CS4023'),(8,'CS4023'),(6,'CS4026'),(8,'CS4026'),(6,'CS4027'),(8,'CS4027'),(6,'CS4030'),(8,'CS4030'),(6,'CS4032'),(8,'CS4032'),(6,'CS4033'),(8,'CS4033'),(5,'CS4035'),(7,'CS4035'),(8,'CS4035'),(6,'CS4036'),(8,'CS4036'),(5,'CS4038'),(7,'CS4038'),(6,'CS4040'),(8,'CS4040'),(6,'CS4041'),(8,'CS4041'),(5,'CS4042'),(6,'CS4042'),(7,'CS4042'),(8,'CS4042'),(5,'CS4043'),(6,'CS4043'),(7,'CS4043'),(8,'CS4043'),(6,'CS4044'),(8,'CS4044'),(5,'CS4049'),(7,'CS4049'),(5,'CS4050'),(7,'CS4050'),(5,'CS4052'),(7,'CS4052'),(5,'CS4093'),(6,'CS4096'),(3,'EC2014'),(3,'MA2001'),(4,'MA2002'),(1,'ZZ1004'),(2,'ZZ1004');
/*!40000 ALTER TABLE `semester_course` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-15 11:19:19
