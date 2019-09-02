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

/*Table structure for table `add_card_data` */

DROP TABLE IF EXISTS `add_card_data`;

CREATE TABLE `add_card_data` (
  `session_id` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `email` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pdt_id` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pdt_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pdt_price` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `pdt_quantity` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `total_price` varchar(40) character set utf8 collate utf8_unicode_ci default NULL,
  `detailes` varchar(400) character set utf8 collate utf8_unicode_ci default NULL,
  `item_name` varchar(40) character set utf8 collate utf8_unicode_ci default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `add_card_data` */

LOCK TABLES `add_card_data` WRITE;

insert  into `add_card_data`(`session_id`,`email`,`pdt_id`,`pdt_name`,`pdt_price`,`pdt_quantity`,`total_price`,`detailes`,`item_name`) values ('0ef9675850b5de4661378a1fe4b9ae6a','hgfd@gmail.com','pu-45','puma-4958','2400','1','2400','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!','Backpack'),('0ef9675850b5de4661378a1fe4b9ae6a','hgfd@gmail.com','ni-0','Nike-0457','2300','1','2300','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur doloribus, quam ipsum!','Backpack'),('0ef9675850b5de4661378a1fe4b9ae6a','hgfd@gmail.com','01','HP-500G','23000','1','23000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt natus molestiae.','Laptop'),('0ef9675850b5de4661378a1fe4b9ae6a','hgfd@gmail.com','02','Lenovo-69435','25000','1','25000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae deserunt natus molestiae.','Laptop'),('0ef9675850b5de4661378a1fe4b9ae6a','hgfd@gmail.com','8594','De-087','30000','1','30000','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident voluptatibus minima temporibus consectetur animi distinctio quaerat! Tempora quae iste ab, veniam necessitatibus autem?','Laptop');

UNLOCK TABLES;

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

/*Table structure for table `bkash_dbbl` */

DROP TABLE IF EXISTS `bkash_dbbl`;

CREATE TABLE `bkash_dbbl` (
  `email` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `bank_name` varchar(60) character set utf8 collate utf8_unicode_ci default NULL,
  `number` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `ammount` varchar(60) character set utf8 collate utf8_unicode_ci default NULL,
  `date` date default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bkash_dbbl` */

LOCK TABLES `bkash_dbbl` WRITE;

insert  into `bkash_dbbl`(`email`,`bank_name`,`number`,`ammount`,`date`) values ('iftakharalam32@gmail.com','DBBL','01686790963','500','2017-11-04'),('iftakharalam32@gmail.com','bkash','01686790963','500','2017-11-04'),('iftakharalam32@gmail.com','bkash','01686790963','500','2017-11-04'),('hgfd@gmail.com','DBBL','01686790963','500','2017-11-05'),('hgfd@gmail.com','DBBL','01686790963','500','2017-11-12'),('hgfd@gmail.com','bkash','01686790963','500','2017-11-12'),('hgfd@gmail.com','DBBL','90542854','4354354','2017-12-25');

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

/*Table structure for table `final_method_shopping` */

DROP TABLE IF EXISTS `final_method_shopping`;

CREATE TABLE `final_method_shopping` (
  `order_code` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `user_email` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `address` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `city` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `post_code` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  `total_price` varchar(50) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`order_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `final_method_shopping` */

LOCK TABLES `final_method_shopping` WRITE;

insert  into `final_method_shopping`(`order_code`,`user_name`,`user_email`,`address`,`city`,`post_code`,`total_price`) values ('1293758455','Iftakhar ahmed','hgfd@gmail.com','feni','Feni sodor','45','82900'),('1317968839','Iftakhar ahmed','hgfd@gmail.com','feni','Feni sodor','4545','23200');

UNLOCK TABLES;

/*Table structure for table `final_wallet` */

DROP TABLE IF EXISTS `final_wallet`;

CREATE TABLE `final_wallet` (
  `email` varchar(60) character set utf8 collate utf8_unicode_ci NOT NULL,
  `total_taka` varchar(60) character set utf8 collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `final_wallet` */

LOCK TABLES `final_wallet` WRITE;

insert  into `final_wallet`(`email`,`total_taka`) values ('hgfd@gmail.com','4060154'),('iftakharalam32@gmail.com','1500');

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

insert  into `product_review`(`product_id`,`name`,`email`,`message`) values ('01','Iftakhar Alam','iftakharalam32@gmail.com','This product is good.'),('01','Iftakhar ahmed','hgfd@gmail.com','This is not bad product.'),('02','Iftakhar ahmed','hgfd@gmail.com','This product is so so good.'),('02','Iftakhar Alam','iftakharalam32@gmail.com','This product is not good, because this product color is not my favourite.'),('ni-0','Iftakhar ahmed','hgfd@gmail.com','This product is good.');

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
