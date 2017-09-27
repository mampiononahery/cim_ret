/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 5.7.19-0ubuntu0.16.04.1 : Database - dbMyretooch
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbMyretooch` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbMyretooch`;

/*Table structure for table `ci_sessions` */

DROP TABLE IF EXISTS `ci_sessions`;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ci_sessions` */

/*Table structure for table `commande` */

DROP TABLE IF EXISTS `commande`;

CREATE TABLE `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `formule` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `total` float NOT NULL,
  `nb_images` int(100) DEFAULT NULL,
  `id_client` varchar(100) NOT NULL,
  `nb_images_traites` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

/*Data for the table `commande` */

insert  into `commande`(`id`,`txnid`,`date`,`formule`,`quantite`,`total`,`nb_images`,`id_client`,`nb_images_traites`) values 
(62,'0KP544302L3222603','01/10/2014','Pack 30 photos',1,49.9,NULL,'wVbBH0yqUP',0),
(67,'7CD62689UF247100X','02/10/2014','Pack 20 photos',2,79.8,10,'QaF7TMUfz7',0),
(68,'7JG483489J055174N','04/05/2016','Retouche Unitaire',1,6.9,1,'QkRnn01ZXg',0),
(69,'46847480H2298304V','06/05/2016','Retouche Unitaire',3,20.7,1,'QaF7TMUfz7',0),
(70,'0XB11490S0231515F','08/05/2016','Abonnement 50 photos',1,49.9,50,'QaF7TMUfz7',0),
(71,'6HC62292AL7705746','11/05/2016','Retouche Unitaire',1,6.9,1,'QkRnn01ZXg',0),
(72,'53632223GA039570V','11/05/2016','Pack 10 photos',1,29.9,10,'QkRnn01ZXg',0),
(73,'48A891359P7667450','12/05/2016','Pack 10 photos',1,29.9,10,'wVbBH0yqUP',0),
(74,'1JP055638N493413S','12/05/2016','Pack 10 photos',10,299,100,'wVbBH0yqUP',0),
(75,'73L14725NR108182B','13/05/2016','Pack 10 photos',1,29.9,10,'wVbBH0yqUP',0),
(76,'2MG13976X0338953S','13/05/2016','Pack 10 photos',1,29.9,10,'wVbBH0yqUP',0),
(77,'7J074424EX989424M','17/05/2016','Retouche Unitaire',10,69,10,'wVbBH0yqUP',0),
(78,'2UN29911HW189023R','20/05/2016','Pack 10 photos',1,29.9,10,'wVbBH0yqUP',0),
(79,'7U969684KB725344K','15/01/2017','Retouche Unitaire',1,6.9,1,'sBST2D2oSR',0),
(80,'2L161822CT158831H','15/01/2017','Pack 10 photos',1,29.9,10,'sBST2D2oSR',0),
(81,'80C66538KY6420330','16/01/2017','Retouche Unitaire',1,6.9,1,'sBST2D2oSR',0);

/*Table structure for table `ibn_table` */

DROP TABLE IF EXISTS `ibn_table`;

CREATE TABLE `ibn_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itransaction_id` varchar(60) NOT NULL,
  `ipayerid` varchar(60) NOT NULL,
  `iname` varchar(60) NOT NULL,
  `iemail` varchar(60) NOT NULL,
  `itransaction_date` varchar(60) NOT NULL,
  `ipaymentstatus` varchar(60) NOT NULL,
  `ieverything_else` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ibn_table` */

/*Table structure for table `infos_paypal` */

DROP TABLE IF EXISTS `infos_paypal`;

CREATE TABLE `infos_paypal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txnid` varchar(100) NOT NULL,
  `idclient` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `statut` varchar(100) DEFAULT NULL,
  `payer_name` varchar(100) DEFAULT NULL,
  `payer_last_name` varchar(100) DEFAULT NULL,
  `payer_adresse` varchar(100) DEFAULT NULL,
  `payer_country` varchar(100) DEFAULT NULL,
  `payer_city` varchar(100) DEFAULT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

/*Data for the table `infos_paypal` */

insert  into `infos_paypal`(`id`,`txnid`,`idclient`,`date`,`statut`,`payer_name`,`payer_last_name`,`payer_adresse`,`payer_country`,`payer_city`,`total`) values 
(24,'0KP544302L3222603','wVbBH0yqUP','01/10/2014','Completed','fomen','messan',NULL,NULL,NULL,50),
(25,'43P36848WU5988737','6weWJxWIO4','02/10/2014','Completed','fomen','messan',NULL,NULL,NULL,60),
(28,'3SH61500HN873013H','Vku2mj9c4H','02/10/2014','Completed','SandboxTest','Account',NULL,NULL,NULL,59.8),
(29,'7CD62689UF247100X','QaF7TMUfz7','02/10/2014','Completed','SandboxTest','Account',NULL,NULL,NULL,79.8),
(30,'7JG483489J055174N','QkRnn01ZXg','04/05/2016','Completed','James','Soiby',NULL,NULL,NULL,6.9),
(31,'46847480H2298304V','QaF7TMUfz7','06/05/2016','Completed','James','Soiby',NULL,NULL,NULL,6.9),
(32,'0XB11490S0231515F','QaF7TMUfz7','08/05/2016','Completed','James','Soiby',NULL,NULL,NULL,49.9),
(33,'6HC62292AL7705746','QkRnn01ZXg','11/05/2016','Completed','James','Soiby',NULL,NULL,NULL,6.9),
(34,'53632223GA039570V','QkRnn01ZXg','11/05/2016','Completed','James','Soiby',NULL,NULL,NULL,29.9),
(35,'48A891359P7667450','wVbBH0yqUP','12/05/2016','Completed','James','Soiby',NULL,NULL,NULL,29.9),
(36,'1JP055638N493413S','wVbBH0yqUP','12/05/2016','Completed','James','Soiby',NULL,NULL,NULL,299),
(37,'73L14725NR108182B','wVbBH0yqUP','13/05/2016','Completed','James','Soiby',NULL,NULL,NULL,29.9),
(38,'2MG13976X0338953S','wVbBH0yqUP','13/05/2016','Completed','James','Soiby',NULL,NULL,NULL,29.9),
(39,'7J074424EX989424M','wVbBH0yqUP','17/05/2016','Completed','James','Soiby',NULL,NULL,NULL,69),
(40,'2UN29911HW189023R','wVbBH0yqUP','20/05/2016','Completed','James','Soiby',NULL,NULL,NULL,29.9),
(41,'7U969684KB725344K','sBST2D2oSR','15/01/2017','Completed','DIMBINIAINA','Elkana Vinet',NULL,NULL,NULL,6.9),
(42,'2L161822CT158831H','sBST2D2oSR','15/01/2017','Completed','DIMBINIAINA','Elkana Vinet',NULL,NULL,NULL,29.9),
(43,'80C66538KY6420330','sBST2D2oSR','16/01/2017','Completed','DIMBINIAINA','Elkana Vinet',NULL,NULL,NULL,6.9);

/*Table structure for table `les_clients` */

DROP TABLE IF EXISTS `les_clients`;

CREATE TABLE `les_clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idclient` varchar(100) DEFAULT NULL,
  `date_ajout` varchar(100) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nb_images` int(100) DEFAULT NULL,
  `actif` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `les_clients` */

insert  into `les_clients`(`id`,`idclient`,`date_ajout`,`nom`,`prenom`,`email`,`password`,`nb_images`,`actif`) values 
(9,'wVbBH0yqUP','01/10/2014','fomen','messan','vsoftdesignstudio@hotmail.fr','',10,0),
(10,'6weWJxWIO4','02/10/2014','fomen','messan','fomen@gmail.com','',20,0),
(14,'QaF7TMUfz7','02/10/2014','SandboxTest','Account','vsoftdesignstudio@hotmail.fr','allisgrace',10,0),
(15,'QkRnn01ZXg','04/05/2016','James','Soiby','vsoftdesignstudio@hotmail.fr','',10,0),
(16,'sBST2D2oSR','15/01/2017','DIMBINIAINA','Elkana Vinet','vsoftdesignstudio@hotmail.fr','lekidybeloha',1,0);

/*Table structure for table `log` */

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(60) NOT NULL,
  `payer_email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8;

/*Data for the table `log` */

insert  into `log`(`id`,`txn_id`,`payer_email`) values 
(2,'334445','oi@gmail.com'),
(4,'maman','papa'),
(18,'2XJ40974AS989533V','fomen'),
(32,'5UJ5797811369530C','SandboxTest'),
(55,'8FY085817A1636447','SandboxTest'),
(56,'2PM30632MC434683L','SandboxTest'),
(57,'2PM30632MC434683L','SandboxTest'),
(58,'2PM30632MC434683L','SandboxTest'),
(59,'2PM30632MC434683L','SandboxTest'),
(60,'2PM30632MC434683L','SandboxTest'),
(61,'2PM30632MC434683L','SandboxTest'),
(62,'test','test'),
(63,'8FY085817A1636447','SandboxTest'),
(64,'2PM30632MC434683L','SandboxTest'),
(65,'test','test'),
(66,'test','test'),
(67,'8E542651CM4350211','SandboxTest'),
(68,'2PM30632MC434683L','SandboxTest'),
(69,'test','test'),
(70,'test','test'),
(71,'test','test'),
(72,'test','test'),
(73,'test','test'),
(74,'test','test'),
(75,'test','test'),
(76,'test','test'),
(77,'test','test'),
(78,'test','test'),
(79,'test','test'),
(80,'test','test');

/*Table structure for table `mouvements` */

DROP TABLE IF EXISTS `mouvements`;

CREATE TABLE `mouvements` (
  `jour_planning` int(1) NOT NULL DEFAULT '0',
  `date_planning` date NOT NULL DEFAULT '0000-00-00',
  `heure_planning` time NOT NULL DEFAULT '00:00:00',
  `type_planning` enum('ANNULE','FAIT','PAUSE','RESERVE') COLLATE utf8_bin NOT NULL,
  `id_client` varchar(14) COLLATE utf8_bin DEFAULT NULL,
  `id_pers` int(11) NOT NULL,
  `duree_planning` double(5,2) NOT NULL DEFAULT '0.00',
  `commentaire` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `mouvements` */

insert  into `mouvements`(`jour_planning`,`date_planning`,`heure_planning`,`type_planning`,`id_client`,`id_pers`,`duree_planning`,`commentaire`) values 
(7,'2009-12-13','08:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','08:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','09:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','10:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','11:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','12:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','13:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','14:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','15:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','16:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','17:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','18:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:00:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:15:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:30:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','19:45:00','PAUSE',NULL,0,15.00,''),
(7,'2009-12-13','20:00:00','ANNULE','20091124201153',1,15.00,'<br>');

/*Table structure for table `tirages` */

DROP TABLE IF EXISTS `tirages`;

CREATE TABLE `tirages` (
  `id_tirage` int(11) NOT NULL AUTO_INCREMENT,
  `lib_tirage` varchar(255) NOT NULL,
  `tarif_tirage` double(5,2) NOT NULL DEFAULT '0.00',
  `date_insertion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_tirage`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `tirages` */

insert  into `tirages`(`id_tirage`,`lib_tirage`,`tarif_tirage`,`date_insertion`) values 
(1,'10x15',0.08,'0000-00-00'),
(2,'11,5x15',0.09,'0000-00-00'),
(3,'13x19',0.18,'0000-00-00'),
(4,'13x17',0.18,'0000-00-00'),
(5,'15x21',0.30,'0000-00-00'),
(6,'15x20',0.30,'0000-00-00'),
(7,'20x30',0.50,'0000-00-00'),
(8,'20x27',0.50,'0000-00-00'),
(9,'30x40',4.90,'0000-00-00'),
(10,'30x45',4.90,'0000-00-00');

/*Table structure for table `user_accounts` */

DROP TABLE IF EXISTS `user_accounts`;

CREATE TABLE `user_accounts` (
  `uacc_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uacc_group_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `uacc_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_username` varchar(15) NOT NULL DEFAULT '',
  `uacc_password` varchar(60) NOT NULL DEFAULT '',
  `uacc_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_salt` varchar(40) NOT NULL DEFAULT '',
  `uacc_activation_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_forgotten_password_token` varchar(40) NOT NULL DEFAULT 'NULL',
  `uacc_forgotten_password_expire` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uacc_update_email_token` varchar(40) NOT NULL DEFAULT '',
  `uacc_update_email` varchar(100) NOT NULL DEFAULT '',
  `uacc_active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_suspend` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `uacc_fail_login_attempts` smallint(5) NOT NULL DEFAULT '0',
  `uacc_fail_login_ip_address` varchar(40) NOT NULL DEFAULT '',
  `uacc_date_fail_login_ban` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Time user is banned until due to repeated failed logins',
  `uacc_date_last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uacc_date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`uacc_id`),
  UNIQUE KEY `uacc_id` (`uacc_id`),
  KEY `uacc_group_fk` (`uacc_group_fk`),
  KEY `uacc_email` (`uacc_email`),
  KEY `uacc_username` (`uacc_username`),
  KEY `uacc_fail_login_ip_address` (`uacc_fail_login_ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_accounts` */

/*Table structure for table `user_groups` */

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `ugrp_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `ugrp_name` varchar(20) NOT NULL DEFAULT '',
  `ugrp_desc` varchar(100) NOT NULL DEFAULT '',
  `ugrp_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ugrp_id`),
  UNIQUE KEY `ugrp_id` (`ugrp_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_groups` */

/*Table structure for table `user_login_sessions` */

DROP TABLE IF EXISTS `user_login_sessions`;

CREATE TABLE `user_login_sessions` (
  `usess_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `usess_series` varchar(40) NOT NULL DEFAULT '',
  `usess_token` varchar(40) NOT NULL DEFAULT '',
  `usess_login_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usess_token`),
  UNIQUE KEY `usess_token` (`usess_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_login_sessions` */

/*Table structure for table `user_privilege_groups` */

DROP TABLE IF EXISTS `user_privilege_groups`;

CREATE TABLE `user_privilege_groups` (
  `upriv_groups_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `upriv_groups_ugrp_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  `upriv_groups_upriv_fk` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_groups_id`),
  UNIQUE KEY `upriv_groups_id` (`upriv_groups_id`) USING BTREE,
  KEY `upriv_groups_ugrp_fk` (`upriv_groups_ugrp_fk`),
  KEY `upriv_groups_upriv_fk` (`upriv_groups_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_privilege_groups` */

/*Table structure for table `user_privilege_users` */

DROP TABLE IF EXISTS `user_privilege_users`;

CREATE TABLE `user_privilege_users` (
  `upriv_users_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_users_uacc_fk` int(11) NOT NULL DEFAULT '0',
  `upriv_users_upriv_fk` smallint(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`upriv_users_id`),
  UNIQUE KEY `upriv_users_id` (`upriv_users_id`) USING BTREE,
  KEY `upriv_users_uacc_fk` (`upriv_users_uacc_fk`),
  KEY `upriv_users_upriv_fk` (`upriv_users_upriv_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_privilege_users` */

/*Table structure for table `user_privileges` */

DROP TABLE IF EXISTS `user_privileges`;

CREATE TABLE `user_privileges` (
  `upriv_id` smallint(5) NOT NULL AUTO_INCREMENT,
  `upriv_name` varchar(20) NOT NULL DEFAULT '',
  `upriv_desc` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`upriv_id`),
  UNIQUE KEY `upriv_id` (`upriv_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `user_privileges` */

/*Table structure for table `weekday` */

DROP TABLE IF EXISTS `weekday`;

CREATE TABLE `weekday` (
  `id_jour` int(1) NOT NULL DEFAULT '0',
  `lib_jour` char(8) COLLATE utf8_bin NOT NULL DEFAULT '""',
  PRIMARY KEY (`id_jour`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `weekday` */

insert  into `weekday`(`id_jour`,`lib_jour`) values 
(7,'Dimanche'),
(1,'Lundi'),
(2,'Mardi'),
(3,'Mercredi'),
(4,'Jeudi'),
(5,'Vendredi'),
(6,'Samedi');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
