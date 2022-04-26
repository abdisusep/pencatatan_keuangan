/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - db_pencatatan_keuangan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_pencatatan_keuangan` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_pencatatan_keuangan`;

/*Table structure for table `transactions` */

DROP TABLE IF EXISTS `transactions`;

CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `keterangan` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('keluar','masuk') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `transactions` */

insert  into `transactions`(`id`,`user_id`,`keterangan`,`jumlah`,`jenis`,`created_at`,`updated_at`) values 
(9,2,'Bantuan','2000000','masuk','2022-04-26 00:39:51','2022-04-26 00:39:51'),
(10,2,'Beli Kertas','200000','keluar','2022-04-26 00:40:01','2022-04-26 00:40:01'),
(11,7,'Iuran','100000','masuk','2022-04-26 00:40:59','2022-04-26 00:40:59'),
(12,7,'Wirausaha','200000','masuk','2022-04-26 00:41:12','2022-04-26 00:41:12'),
(13,7,'Perbaikan Komputer','300000','keluar','2022-04-26 00:41:26','2022-04-26 00:41:26'),
(14,7,'Perbaikan AC','150000','keluar','2022-04-26 00:41:42','2022-04-26 00:41:42'),
(15,6,'Dana Bantuan','250000','masuk','2022-04-26 00:42:50','2022-04-26 00:42:50'),
(16,6,'Pembelian ATK','250000','keluar','2022-04-26 00:43:01','2022-04-26 00:43:01');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`email`,`password`,`role`) values 
(2,'Asep','user@email.com','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','user'),
(5,'Admin','admin@email.com','$2y$10$Mx3v2ESeV276qvS9R6IomOuIS0/jojnrCPi3WhoFGWCrlB.AGrjti','admin'),
(6,'Sidik','sidik@email.com','$2y$10$rY6GmLoA5/Qj5u4MNxcXF.KvJNmE.h7ruWM96GpCOLbBC/WvTT5.6','user'),
(7,'Susep','susep@email.com','$2y$10$dhZyno4aByhVPUJhIYUBvutvTiX6UN5JB.OpcqzuA3PPeTW32.63y','user');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
