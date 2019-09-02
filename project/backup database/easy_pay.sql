/*
SQLyog Enterprise - MySQL GUI v7.02 
MySQL - 5.0.45-community-nt : Database - easy_pay
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`easy_pay` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `easy_pay`;

/*Table structure for table `admin_sing_up` */

DROP TABLE IF EXISTS `admin_sing_up`;

CREATE TABLE `admin_sing_up` (
  `name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `email` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `number` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `address` varchar(100) character set utf8 collate utf8_unicode_ci default NULL,
  `district` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `gender` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `password` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_sing_up` */

LOCK TABLES `admin_sing_up` WRITE;

insert  into `admin_sing_up`(`name`,`email`,`number`,`address`,`district`,`gender`,`password`) values ('Yousuf Tarek','yousuftarek3@gmail.com','8733394','feni','Dhaka','Male','1');

UNLOCK TABLES;

/*Table structure for table `catagory` */

DROP TABLE IF EXISTS `catagory`;

CREATE TABLE `catagory` (
  `item_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `cat_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `cat_id` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `catagory` */

LOCK TABLES `catagory` WRITE;

insert  into `catagory`(`item_name`,`cat_name`,`cat_id`) values ('Laptop','Hp','01'),('Laptop','Dell','d0'),('Laptop','Lenavo','h0'),('Backpack','nike','n0'),('Backpack','Puma','p0');

UNLOCK TABLES;

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `item_id` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `item_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item` */

LOCK TABLES `item` WRITE;

insert  into `item`(`item_id`,`item_name`) values ('01','Laptop'),('02','Backpack'),('03','pendrive'),('04','Talevision'),('05','Mouse'),('06','Cloth'),('07','Watch'),('08','Mobile'),('09','Bychycle'),('10','Camera');

UNLOCK TABLES;

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `item_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `cat_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pro_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pro_id` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `pro_quantity` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pro_price` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pro_detailes` varchar(400) character set utf8 collate utf8_unicode_ci default NULL,
  `pro_info` varchar(400) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`pro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

LOCK TABLES `product` WRITE;

insert  into `product`(`item_name`,`cat_name`,`pro_name`,`pro_id`,`pro_quantity`,`pro_price`,`pro_detailes`,`pro_info`) values ('Laptop','Hp','HP-500G','01','2','23000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt natus molestiae.','LED:15.6\r\nprocessor:Qr i 5\r\nRAM: 4GB\r\nHDD: 1TB\r\nBattery:50000mph\r\n\r\n\r\n'),('Laptop','Lenavo','Lenovo-69435','02','1','25000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt natus molestiae.','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt natus molestiae.'),('Laptop','Dell','De-087','8594','2','30000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident voluptatibus minima temporibus consectetur animi distinctio quaerat! Tempora quae iste ab, veniam necessitatibus autem?','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident voluptatibus minima temporibus consectetur animi distinctio quaerat! Tempora quae iste ab, veniam necessitatibus autem?'),('Backpack','nike','Nike-0457','ni-0','2','2300','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!'),('Backpack','Puma','puma-4958','pu-45','2','2400','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!');

UNLOCK TABLES;

/*Table structure for table `product_review` */

DROP TABLE IF EXISTS `product_review`;

CREATE TABLE `product_review` (
  `product_id` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `email` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `message` varchar(200) character set utf8 collate utf8_unicode_ci default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product_review` */

LOCK TABLES `product_review` WRITE;

insert  into `product_review`(`product_id`,`name`,`email`,`message`) values ('01','Iftakhar Alam','iftakharalam32@gmail.com','This product is good.'),('01','Iftakhar ahmed','hgfd@gmail.com','This is not bad product.');

UNLOCK TABLES;

/*Table structure for table `user_sign_up` */

DROP TABLE IF EXISTS `user_sign_up`;

CREATE TABLE `user_sign_up` (
  `first_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `last_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `number` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `email` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `address` varchar(200) character set utf8 collate utf8_unicode_ci default NULL,
  `district` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `gender` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `password` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_sign_up` */

LOCK TABLES `user_sign_up` WRITE;

insert  into `user_sign_up`(`first_name`,`last_name`,`number`,`email`,`address`,`district`,`gender`,`password`) values ('Iftakhar','ahmed','55665','hgfd@gmail.com','feni','Feni','Male','1'),('Iftakhar','Alam','869764','iftakharalam32@gmail.com','feni','Feni','Male','1');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
