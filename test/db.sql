/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.3.13-MariaDB-log : Database - api
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`api` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;

USE `api`;

/*Table structure for table `list` */

DROP TABLE IF EXISTS `list`;

CREATE TABLE `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `list` */

insert  into `list`(`id`,`title`,`body`) values 
(7,'post1','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.'),
(8,'post2','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.'),
(9,'post3','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.'),
(10,'post4','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.'),
(11,'post5','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.'),
(12,'post6','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe se'),
(13,'post7','https://www.youtube.com/watch?v=COb-KpOfCSw'),
(14,'post7','https://www.youtube.com/watch?v=COb-KpOfCSw'),
(15,'post8','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam atque dolore, enim exercitationem itaque, labore modi porro, praesentium quae quidem quo saepe sequi. Aliquid nemo odit quam quas tempore.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
