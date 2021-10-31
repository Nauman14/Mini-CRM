/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.20-MariaDB : Database - mini_crm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mini_crm` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `mini_crm`;

/*Table structure for table `companies` */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CompanyLogo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CompanyWebsite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`Email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `companies` */

insert  into `companies`(`id`,`CompanyTitle`,`Email`,`CompanyLogo`,`CompanyWebsite`,`created_at`,`updated_at`) values 
(1,'Nouman Company','muhammad.nauman@jugnu.com','images/iQiOhmb4oRmJYERbjQU9ubjDX7gBK6GLegrgUtsZ.png','https://www.linkedin.com/in/nouman-qureshi-571049130/','2021-10-31 08:18:18','2021-10-31 20:09:45'),
(3,'Zetslol','zetsol@gmail.com','images/xplqLtUvjTBPlrUpFkYL9kY09p5QnSZRZvmuNaMc.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:09:34'),
(4,'Zetslol1','zetsol@gmail.com11','images/Nl4aOzfI8X3sgZNjzFvJQdSnlm5k4eq8Un5qpHYz.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:09:24'),
(5,'abc','abc@gmail.com','images/toFTXwQkPoIYhatSUHkZOSNpMW9GGiaoaaKvmuQA.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:09:17'),
(6,'jugnu','info@jugnu.pk','images/yLKjyn6Dp28FYP78NoRGbpVWqayBbc2ISnzUk73X.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:09:09'),
(7,'salesflo','info@salesflo.pk','images/yGR88JOUEDmc4G07zyv6EuAmzEBg7UnzGKVYlsrN.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:09:01'),
(8,'systems','info@systems.pk','images/6oSqjyqMCa9807sJhir7zVLFAXLZBxTs8czuDyWH.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:08:54'),
(9,'alibaba','info@alibaba.pk','images/Y95cO79ZbsJeoCrjiKqdKDBOsLJ6llxPBnUO7bc9.png','zetslo.com','2021-10-31 09:01:42','2021-10-31 20:08:45'),
(10,'amazon','info@amazon.com','images/cWMGSWN1ZFTqpcM6TEMfxvtCzTfzFwdo6nZRuwDN.png','zetslo.com','2021-10-31 15:29:58','2021-10-31 20:08:35'),
(11,'daraz','info@daraz.pk','images/NEVln1hfqdl4C7yW78FMY6gdDbXPuVbAU5IKUjl2.png','zetslo.com','2021-10-31 15:29:58','2021-10-31 20:08:26'),
(12,'grocer','info@grocer.pk','images/yCOtZL9tReemyroBuALY0Dxduv2oXJdfJDtYWc3O.png','zetslo.com','2021-10-31 15:29:58','2021-10-31 18:33:19');

/*Table structure for table `employees` */

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` bigint(20) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `employees` */

insert  into `employees`(`id`,`company_id`,`first_name`,`last_name`,`email`,`phone`,`created_at`,`updated_at`) values 
(1,11,'Moiz','Rao','rao@gmail.com','123','2021-10-31 12:50:37','2021-10-31 19:28:23');

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2021_10_30_162748_create_companies_table',2),
(6,'2021_10_31_121344_create_employees_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Muhammad Nouman','admin@admin.com','2021-10-28 18:56:03','$2y$10$M4BACIdEoOzJ/xVa/NO3reqa6ENZ05EsVhxOrZpcMh2dJLVdWtwS.','lkOSLvr0kjsRbLAYbtTS9AKR2TzJIC6M0FhSkSeR2dCwbce1f9QFwdRgybuf','2021-10-28 18:56:03','2021-10-28 18:56:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
