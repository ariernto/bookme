/*
SQLyog Community v13.1.2 (64 bit)
MySQL - 10.4.14-MariaDB : Database - jobsite
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`jobsite` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `jobsite`;

/*Table structure for table `bravo_accommodation_dates` */

DROP TABLE IF EXISTS `bravo_accommodation_dates`;

CREATE TABLE `bravo_accommodation_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `max_guests` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_accommodation_dates` */

/*Table structure for table `bravo_accommodation_term` */

DROP TABLE IF EXISTS `bravo_accommodation_term`;

CREATE TABLE `bravo_accommodation_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_accommodation_term` */

/*Table structure for table `bravo_accommodation_translations` */

DROP TABLE IF EXISTS `bravo_accommodation_translations`;

CREATE TABLE `bravo_accommodation_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_accommodation_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_accommodation_translations` */

/*Table structure for table `bravo_accommodations` */

DROP TABLE IF EXISTS `bravo_accommodations`;

CREATE TABLE `bravo_accommodations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `allow_children` tinyint(4) DEFAULT 0,
  `allow_infant` tinyint(4) DEFAULT 0,
  `max_guests` int(11) DEFAULT 0,
  `bed` int(11) DEFAULT 0,
  `bathroom` int(11) DEFAULT 0,
  `square` int(11) DEFAULT 0,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_day_before_booking` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_accommodations_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_accommodations` */

/*Table structure for table `bravo_activities` */

DROP TABLE IF EXISTS `bravo_activities`;

CREATE TABLE `bravo_activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `min_people` int(11) DEFAULT NULL,
  `max_people` int(11) DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `include` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_activities_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activities` */

/*Table structure for table `bravo_activity_category` */

DROP TABLE IF EXISTS `bravo_activity_category`;

CREATE TABLE `bravo_activity_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT 0,
  `_rgt` int(10) unsigned NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_activity_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_category` */

/*Table structure for table `bravo_activity_category_translations` */

DROP TABLE IF EXISTS `bravo_activity_category_translations`;

CREATE TABLE `bravo_activity_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_activity_category_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_category_translations` */

/*Table structure for table `bravo_activity_dates` */

DROP TABLE IF EXISTS `bravo_activity_dates`;

CREATE TABLE `bravo_activity_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `person_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_guests` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_dates` */

/*Table structure for table `bravo_activity_meta` */

DROP TABLE IF EXISTS `bravo_activity_meta`;

CREATE TABLE `bravo_activity_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) DEFAULT NULL,
  `enable_person_types` tinyint(4) DEFAULT NULL,
  `person_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_people` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_open_hours` tinyint(4) DEFAULT NULL,
  `open_hours` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_meta` */

/*Table structure for table `bravo_activity_term` */

DROP TABLE IF EXISTS `bravo_activity_term`;

CREATE TABLE `bravo_activity_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_term` */

/*Table structure for table `bravo_activity_translations` */

DROP TABLE IF EXISTS `bravo_activity_translations`;

CREATE TABLE `bravo_activity_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `include` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_activity_translations_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `bravo_activity_translations_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_activity_translations` */

/*Table structure for table `bravo_attrs` */

DROP TABLE IF EXISTS `bravo_attrs`;

CREATE TABLE `bravo_attrs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `display_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hide_in_single` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_attrs` */

insert  into `bravo_attrs`(`id`,`name`,`slug`,`service`,`create_user`,`update_user`,`created_at`,`updated_at`,`deleted_at`,`display_type`,`hide_in_single`) values 
(1,'Property type','property-type','hotel',NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(2,'Facilities','facilities','hotel',NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,NULL),
(3,'Hotel Service','hotel-service','hotel',NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(4,'Room Amenities','room-amenities','hotel_room',NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,NULL);

/*Table structure for table `bravo_attrs_translations` */

DROP TABLE IF EXISTS `bravo_attrs_translations`;

CREATE TABLE `bravo_attrs_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_attrs_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_attrs_translations` */

/*Table structure for table `bravo_boat_dates` */

DROP TABLE IF EXISTS `bravo_boat_dates`;

CREATE TABLE `bravo_boat_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `number` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_boat_dates` */

/*Table structure for table `bravo_boat_term` */

DROP TABLE IF EXISTS `bravo_boat_term`;

CREATE TABLE `bravo_boat_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_boat_term` */

/*Table structure for table `bravo_boat_translations` */

DROP TABLE IF EXISTS `bravo_boat_translations`;

CREATE TABLE `bravo_boat_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_boat_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_boat_translations` */

/*Table structure for table `bravo_boats` */

DROP TABLE IF EXISTS `bravo_boats`;

CREATE TABLE `bravo_boats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` tinyint(4) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger` tinyint(4) DEFAULT 0,
  `gear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `baggage` tinyint(4) DEFAULT 0,
  `door` tinyint(4) DEFAULT 0,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_boats_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_boats` */

/*Table structure for table `bravo_booking_meta` */

DROP TABLE IF EXISTS `bravo_booking_meta`;

CREATE TABLE `bravo_booking_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_booking_meta` */

/*Table structure for table `bravo_booking_payments` */

DROP TABLE IF EXISTS `bravo_booking_payments`;

CREATE TABLE `bravo_booking_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `payment_gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `converted_amount` decimal(10,2) DEFAULT NULL,
  `converted_currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exchange_rate` decimal(10,2) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `wallet_transaction_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_booking_payments` */

/*Table structure for table `bravo_bookings` */

DROP TABLE IF EXISTS `bravo_bookings`;

CREATE TABLE `bravo_bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `gateway` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_guests` int(11) DEFAULT NULL,
  `currency` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL,
  `deposit_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commission` decimal(10,2) DEFAULT NULL,
  `commission_type` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buyer_fees` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_before_fees` decimal(10,2) DEFAULT NULL,
  `paid_vendor` tinyint(4) DEFAULT NULL,
  `object_child_id` bigint(20) DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `paid` decimal(10,2) DEFAULT NULL,
  `pay_now` decimal(10,2) DEFAULT NULL,
  `wallet_credit_used` double DEFAULT NULL,
  `wallet_total_used` double DEFAULT NULL,
  `wallet_transaction_id` bigint(20) DEFAULT NULL,
  `is_refund_wallet` tinyint(4) DEFAULT NULL,
  `vendor_service_fee_amount` decimal(8,2) DEFAULT NULL,
  `vendor_service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_bookings` */

/*Table structure for table `bravo_car_dates` */

DROP TABLE IF EXISTS `bravo_car_dates`;

CREATE TABLE `bravo_car_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `number` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_car_dates` */

/*Table structure for table `bravo_car_term` */

DROP TABLE IF EXISTS `bravo_car_term`;

CREATE TABLE `bravo_car_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_car_term` */

/*Table structure for table `bravo_car_translations` */

DROP TABLE IF EXISTS `bravo_car_translations`;

CREATE TABLE `bravo_car_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_car_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_car_translations` */

/*Table structure for table `bravo_cars` */

DROP TABLE IF EXISTS `bravo_cars`;

CREATE TABLE `bravo_cars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` tinyint(4) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passenger` tinyint(4) DEFAULT 0,
  `gear` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `baggage` tinyint(4) DEFAULT 0,
  `door` tinyint(4) DEFAULT 0,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_service_fee` tinyint(4) DEFAULT NULL,
  `service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_cars_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_cars` */

/*Table structure for table `bravo_contact` */

DROP TABLE IF EXISTS `bravo_contact`;

CREATE TABLE `bravo_contact` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_contact` */

/*Table structure for table `bravo_enquiries` */

DROP TABLE IF EXISTS `bravo_enquiries`;

CREATE TABLE `bravo_enquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_enquiries` */

/*Table structure for table `bravo_event_dates` */

DROP TABLE IF EXISTS `bravo_event_dates`;

CREATE TABLE `bravo_event_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `ticket_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_event_dates` */

/*Table structure for table `bravo_event_term` */

DROP TABLE IF EXISTS `bravo_event_term`;

CREATE TABLE `bravo_event_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_event_term` */

/*Table structure for table `bravo_event_translations` */

DROP TABLE IF EXISTS `bravo_event_translations`;

CREATE TABLE `bravo_event_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_event_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_event_translations` */

/*Table structure for table `bravo_events` */

DROP TABLE IF EXISTS `bravo_events`;

CREATE TABLE `bravo_events` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `enable_service_fee` tinyint(4) DEFAULT NULL,
  `service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_events_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_events` */

/*Table structure for table `bravo_hotel_room_bookings` */

DROP TABLE IF EXISTS `bravo_hotel_room_bookings`;

CREATE TABLE `bravo_hotel_room_bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `room_id` bigint(20) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_room_bookings` */

/*Table structure for table `bravo_hotel_room_dates` */

DROP TABLE IF EXISTS `bravo_hotel_room_dates`;

CREATE TABLE `bravo_hotel_room_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `max_guests` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `number` smallint(6) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_room_dates` */

/*Table structure for table `bravo_hotel_room_term` */

DROP TABLE IF EXISTS `bravo_hotel_room_term`;

CREATE TABLE `bravo_hotel_room_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_room_term` */

insert  into `bravo_hotel_room_term`(`id`,`term_id`,`target_id`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,25,1,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(2,26,1,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(3,27,1,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(4,28,1,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(5,25,2,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(6,26,2,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(7,27,2,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(8,28,2,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(9,29,2,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(10,25,3,NULL,NULL,'2021-01-05 11:48:11','2021-01-05 11:48:11'),
(11,26,3,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(12,27,3,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(13,28,3,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(14,29,3,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(15,25,4,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(16,26,4,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(17,27,4,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(18,28,4,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(19,25,5,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(20,28,5,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(21,29,5,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(22,25,6,NULL,NULL,'2021-01-05 11:48:12','2021-01-05 11:48:12'),
(23,26,6,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(24,28,6,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(25,29,6,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(26,25,7,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(27,26,7,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(28,27,7,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(29,29,7,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(30,25,8,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(31,26,8,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(32,27,8,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(33,28,8,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(34,29,8,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(35,25,9,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(36,26,9,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(37,27,9,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(38,28,9,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(39,29,9,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(40,25,10,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(41,26,10,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(42,28,10,NULL,NULL,'2021-01-05 11:48:13','2021-01-05 11:48:13'),
(43,29,10,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(44,25,11,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(45,26,11,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(46,27,11,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(47,28,11,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(48,29,11,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(49,25,12,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(50,26,12,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(51,27,12,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(52,29,12,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(53,25,13,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(54,26,13,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(55,27,13,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(56,28,13,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(57,29,13,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(58,26,14,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(59,27,14,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(60,28,14,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(61,29,14,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(62,26,15,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(63,27,15,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(64,28,15,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(65,29,15,NULL,NULL,'2021-01-05 11:48:14','2021-01-05 11:48:14'),
(66,25,16,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(67,26,16,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(68,27,16,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(69,29,16,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(70,25,17,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(71,26,17,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(72,27,17,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(73,28,17,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(74,29,17,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(75,26,18,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(76,27,18,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(77,28,18,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(78,29,18,NULL,NULL,'2021-01-05 11:48:15','2021-01-05 11:48:15'),
(79,25,19,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(80,26,19,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(81,27,19,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(82,28,19,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(83,29,19,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(84,25,20,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(85,26,20,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(86,28,20,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(87,29,20,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(88,25,21,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(89,26,21,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(90,27,21,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(91,28,21,NULL,NULL,'2021-01-05 11:48:16','2021-01-05 11:48:16'),
(92,29,21,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(93,26,22,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(94,27,22,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(95,29,22,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(96,25,23,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(97,26,23,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(98,27,23,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(99,28,23,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(100,29,23,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(101,25,24,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(102,27,24,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(103,28,24,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(104,29,24,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(105,25,25,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(106,26,25,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(107,27,25,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(108,28,25,NULL,NULL,'2021-01-05 11:48:17','2021-01-05 11:48:17'),
(109,29,25,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(110,25,26,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(111,26,26,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(112,27,26,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(113,28,26,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(114,26,27,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(115,27,27,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(116,28,27,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(117,29,27,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(118,25,28,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(119,26,28,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(120,27,28,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(121,28,28,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(122,29,28,NULL,NULL,'2021-01-05 11:48:18','2021-01-05 11:48:18'),
(123,25,29,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(124,26,29,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(125,28,29,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(126,29,29,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(127,25,30,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(128,27,30,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(129,25,31,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(130,27,31,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(131,29,31,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(132,25,32,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(133,26,32,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(134,27,32,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(135,28,32,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(136,29,32,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(137,25,33,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(138,26,33,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(139,28,33,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(140,29,33,NULL,NULL,'2021-01-05 11:48:19','2021-01-05 11:48:19'),
(141,26,34,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(142,27,34,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(143,28,34,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(144,29,34,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(145,25,35,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(146,26,35,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(147,27,35,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(148,28,35,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(149,29,35,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(150,25,36,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(151,26,36,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(152,27,36,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(153,29,36,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(154,25,37,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(155,26,37,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(156,27,37,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(157,28,37,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(158,29,37,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(159,25,38,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(160,26,38,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(161,27,38,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(162,28,38,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(163,25,39,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(164,26,39,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(165,27,39,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(166,28,39,NULL,NULL,'2021-01-05 11:48:20','2021-01-05 11:48:20'),
(167,29,39,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(168,25,40,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(169,26,40,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(170,27,40,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(171,29,40,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(172,25,41,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(173,28,41,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(174,29,41,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(175,25,42,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(176,26,42,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(177,27,42,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(178,28,42,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(179,29,42,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(180,25,43,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(181,26,43,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(182,27,43,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(183,28,43,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(184,29,43,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(185,25,44,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(186,26,44,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21'),
(187,29,44,NULL,NULL,'2021-01-05 11:48:21','2021-01-05 11:48:21');

/*Table structure for table `bravo_hotel_room_translations` */

DROP TABLE IF EXISTS `bravo_hotel_room_translations`;

CREATE TABLE `bravo_hotel_room_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_hotel_room_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_room_translations` */

/*Table structure for table `bravo_hotel_rooms` */

DROP TABLE IF EXISTS `bravo_hotel_rooms`;

CREATE TABLE `bravo_hotel_rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `number` smallint(6) DEFAULT NULL,
  `beds` tinyint(4) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `adults` tinyint(4) DEFAULT NULL,
  `children` tinyint(4) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_rooms` */

insert  into `bravo_hotel_rooms`(`id`,`title`,`content`,`image_id`,`gallery`,`video`,`price`,`parent_id`,`number`,`beds`,`size`,`adults`,`children`,`status`,`create_user`,`update_user`,`deleted_at`,`created_at`,`updated_at`,`ical_import_url`) values 
(1,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,1,7,5,200,8,1,'publish',1,NULL,NULL,'2021-01-05 11:48:06',NULL,NULL),
(2,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,1,7,2,200,8,2,'publish',1,NULL,NULL,'2021-01-05 11:48:06',NULL,NULL),
(3,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,1,9,3,200,10,3,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(4,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,1,9,2,200,8,3,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(5,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,2,7,4,200,5,1,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(6,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,2,8,2,200,10,2,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(7,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,2,10,2,200,7,5,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(8,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,2,5,3,200,6,1,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(9,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,3,9,5,200,5,5,'publish',1,NULL,NULL,'2021-01-05 11:48:07',NULL,NULL),
(10,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,3,7,3,200,5,3,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(11,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,3,5,3,200,10,1,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(12,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,3,8,3,200,9,5,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(13,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,4,9,2,200,8,4,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(14,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,4,5,2,200,10,2,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(15,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,4,5,2,200,9,3,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(16,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,4,6,5,200,9,4,'publish',1,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(17,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,5,6,5,200,7,3,'publish',5,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(18,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,5,10,2,200,6,5,'publish',5,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(19,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,5,5,4,200,10,4,'publish',5,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(20,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,5,8,5,200,10,2,'publish',5,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(21,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,6,6,4,200,5,2,'publish',6,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(22,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,6,6,5,200,5,4,'publish',6,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(23,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,6,7,4,200,9,2,'publish',6,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(24,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,6,7,3,200,9,2,'publish',6,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(25,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,7,5,4,200,8,1,'publish',4,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(26,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,7,6,5,200,6,3,'publish',4,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(27,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,7,5,3,200,10,3,'publish',4,NULL,NULL,'2021-01-05 11:48:08',NULL,NULL),
(28,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,7,6,3,200,5,5,'publish',4,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(29,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,8,8,4,200,7,4,'publish',6,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(30,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,8,5,2,200,5,1,'publish',6,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(31,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,8,5,4,200,5,1,'publish',6,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(32,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,8,8,5,200,9,4,'publish',6,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(33,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,9,5,4,200,10,1,'publish',1,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(34,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,9,8,3,200,6,3,'publish',1,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(35,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,9,8,5,200,10,2,'publish',1,NULL,NULL,'2021-01-05 11:48:09',NULL,NULL),
(36,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,9,6,4,200,10,1,'publish',1,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(37,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,10,5,3,200,7,5,'publish',5,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(38,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,10,9,3,200,8,3,'publish',5,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(39,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,10,7,3,200,8,1,'publish',5,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(40,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,10,8,2,200,10,5,'publish',5,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(41,'Room Kerama Islands','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',67,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,11,8,3,200,6,3,'publish',4,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(42,'Room Sheraton Hotel','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',69,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,11,8,2,200,8,2,'publish',4,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(43,'Double Room With Town View','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',64,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,11,8,3,200,7,2,'publish',4,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL),
(44,'Standard Double Room','Room Sheraton comprises of 1 Double Bed or 2 Twin Beds, 2 Bedside Tables, a Desk & Chair. The room is furnished with wall to wall carpeting, trendy furnishings and a balcony.Our ultramodern glass bathroom is equipped with hairdryer, magnifying shaving and make up mirror as well as all the amenities you could possible need during your stay.A Complimentary Bottle of Wine, Fresh Fruit and Mineral Water, are provided on arrival. Electric current: 220 Volts. Smoking rooms & inter-connecting rooms are also available.',63,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo',350.00,11,6,3,200,8,5,'publish',4,NULL,NULL,'2021-01-05 11:48:10',NULL,NULL);

/*Table structure for table `bravo_hotel_term` */

DROP TABLE IF EXISTS `bravo_hotel_term`;

CREATE TABLE `bravo_hotel_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_term` */

insert  into `bravo_hotel_term`(`id`,`term_id`,`target_id`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,11,1,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(2,12,1,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(3,13,1,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(4,14,1,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(5,16,1,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(6,11,2,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(7,12,2,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59'),
(8,13,2,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(9,14,2,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(10,15,2,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(11,16,2,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(12,17,2,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(13,11,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(14,12,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(15,13,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(16,14,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(17,15,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(18,16,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(19,17,3,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(20,11,4,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(21,13,4,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(22,15,4,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(23,16,4,NULL,NULL,'2021-01-05 11:48:00','2021-01-05 11:48:00'),
(24,17,4,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(25,11,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(26,12,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(27,13,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(28,14,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(29,15,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(30,16,5,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(31,11,6,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(32,12,6,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(33,16,6,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(34,17,6,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(35,11,7,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(36,12,7,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(37,13,7,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(38,14,7,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(39,15,7,NULL,NULL,'2021-01-05 11:48:01','2021-01-05 11:48:01'),
(40,16,7,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(41,17,7,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(42,11,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(43,12,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(44,14,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(45,15,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(46,16,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(47,17,8,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(48,11,9,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(49,12,9,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(50,14,9,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(51,15,9,NULL,NULL,'2021-01-05 11:48:02','2021-01-05 11:48:02'),
(52,16,9,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(53,17,9,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(54,11,10,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(55,12,10,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(56,13,10,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(57,14,10,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(58,15,10,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(59,11,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(60,12,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(61,14,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(62,15,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(63,16,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(64,17,11,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03'),
(65,18,1,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(66,19,1,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(67,20,1,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(68,21,1,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(69,18,2,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(70,20,2,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(71,21,2,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(72,22,2,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(73,24,2,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(74,20,3,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(75,21,3,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(76,22,3,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(77,18,4,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(78,20,4,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(79,21,4,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(80,22,4,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(81,23,4,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(82,18,5,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(83,20,5,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(84,22,5,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(85,19,6,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(86,21,6,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04'),
(87,22,6,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(88,20,7,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(89,22,7,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(90,23,7,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(91,20,8,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(92,23,8,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(93,18,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(94,19,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(95,20,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(96,21,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(97,22,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(98,23,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(99,24,9,NULL,NULL,'2021-01-05 11:48:05','2021-01-05 11:48:05'),
(100,18,10,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(101,19,10,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(102,20,10,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(103,24,10,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(104,18,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(105,19,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(106,20,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(107,21,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(108,22,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(109,23,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06'),
(110,24,11,NULL,NULL,'2021-01-05 11:48:06','2021-01-05 11:48:06');

/*Table structure for table `bravo_hotel_translations` */

DROP TABLE IF EXISTS `bravo_hotel_translations`;

CREATE TABLE `bravo_hotel_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_hotel_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotel_translations` */

/*Table structure for table `bravo_hotels` */

DROP TABLE IF EXISTS `bravo_hotels`;

CREATE TABLE `bravo_hotels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star_rate` smallint(6) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `check_in_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_out_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allow_full_day` smallint(6) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_day_before_booking` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `enable_service_fee` tinyint(4) DEFAULT NULL,
  `service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_hotels_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_hotels` */

insert  into `bravo_hotels`(`id`,`title`,`slug`,`content`,`image_id`,`banner_image_id`,`location_id`,`address`,`map_lat`,`map_lng`,`map_zoom`,`is_featured`,`gallery`,`video`,`policy`,`star_rate`,`price`,`check_in_time`,`check_out_time`,`allow_full_day`,`sale_price`,`status`,`create_user`,`update_user`,`deleted_at`,`created_at`,`updated_at`,`review_score`,`ical_import_url`,`enable_extra_price`,`extra_price`,`min_day_before_booking`,`min_day_stays`,`enable_service_fee`,`service_fee`,`surrounding`) values 
(1,'Hotel Stanford','hotel-stanford','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',67,93,1,'Arrondissement de Paris','19.148665','72.839670',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,300.00,'12:00AM','11:00AM',NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 11:47:42','2021-01-05 11:48:21',4.8,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(2,'Hotel WBF Hommachi','hotel-wbf-homachi','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',68,96,1,'Porte de Vanves','19.110390','72.832764',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,350.00,'12:00AM','11:00AM',NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 11:47:42','2021-01-05 11:48:21',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(3,'Castello Casole Hotel','castello-casole-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',69,93,1,'Petit-Montrouge','19.077946','72.838255',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,350.00,'12:00AM','11:00AM',NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 11:47:42','2021-01-05 11:48:22',5.0,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(4,'Redac Gateway Hotel','redac-gateway-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',70,94,1,'Petit-Montrouge','19.031217','72.851982',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,500.00,'12:00AM','11:00AM',NULL,NULL,'draft',1,1,NULL,'2021-01-05 11:47:42','2021-01-05 11:59:27',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(5,'Studio Allston Hotel','studio-allston-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',71,96,5,'New York','18.972786','72.819724',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,500.00,'12:00AM','11:00AM',NULL,NULL,'publish',5,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.7,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(6,'EnVision Hotel Boston','envision-hotel-biston','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',72,93,3,'New York','18.873011','72.975724',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,700.00,'12:00AM','11:00AM',NULL,NULL,'publish',6,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(7,'Crowne Plaza Hotel','crowne-plaza-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',73,95,2,'New York','19.001355','73.111444',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,900.00,'12:00AM','11:00AM',NULL,NULL,'publish',4,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(8,'Stewart Hotel','stewart-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',74,95,5,'New York','19.080542','73.010551',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,900.00,'12:00AM','11:00AM',NULL,NULL,'publish',6,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(9,'Parian Holiday Villas','parian-holiday-villas','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',75,94,1,'Regal Cinemas Battery Park','19.161637','72.997510',12,1,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,550.00,'12:00AM','11:00AM',NULL,NULL,'publish',1,NULL,'2021-01-05 11:59:05','2021-01-05 11:47:43','2021-01-05 11:59:05',4.8,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(10,'Dylan Hotel','dylan-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',64,94,2,'Regal Cinemas Battery','19.229727','72.984470',12,1,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',5,550.00,'12:00AM','11:00AM',NULL,NULL,'publish',5,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.0,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(11,'The May Fair Hotel','the-may-fair-hotel','<p>Built in 1986, Hotel Stanford is a distinct addition to New York (NY) and a smart choice for travelers. The excitement of the city center is only 0 KM away. No less exceptional is the hotel’s easy access to the city’s myriad attractions and landmarks, such as Toto Music Studio, British Virgin Islands Tourist Board, L’Atelier Du Chocolat. Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',67,95,1,'Paris Cinemas Battery','19.277696','72.887009',12,0,'97,98,99,100,101,102','https://www.youtube.com/watch?v=bhOiLfkChPo','[{\"title\":\"Guarantee Policy\",\"content\":\"- A valid credit card will be required upon booking;\\r\\n- For credit card reservations, the same card(s) must be presented upon check in at the respective hotels;\\r\\n- Management reserves the right to cancel any reservations without notice if we are notified of any fraud or illegal activities associated with the full payments received.\"},{\"title\":\"Children Policy\",\"content\":\"- Child under 5-year old: free of charge.\\r\\n- Child from 5-year old to under 12-year old: surcharge $10\\/person\\/room\\/night.\\r\\n- Child from 12-year old or extra Adult: surcharge $15\\/person\\/room\\/night.\"},{\"title\":\"Cancellation\\/Amendment Policy\",\"content\":\"- If cancellation\\/amendment is made 72 hours prior to your arrival date, no fee will be charged.\\r\\n- If cancellation\\/amendment is made within 72 hours, including reservations made within 72 hours of your arrival, 1st night\\u2019s room rate and tax will be charged\\r\\n- In case of no-show, 100% room rate and tax will be charged.\\r\\n- Early Bird\\/Long Stay\\/Last Min\\/Package Rates are Non - changeable & Non - refundable\"},{\"title\":\"Late check-out policy\",\"content\":\"- Late check-out is subject to room availability\\r\\n- 12:00 to 17:00 check-out: 50% room rate surcharge\\r\\n- After 17:00 check-out: 100% room rate surcharge\"}]',4,550.00,'12:00AM','11:00AM',NULL,NULL,'publish',4,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:48:22',4.5,NULL,1,'[{\"name\":\"Service VIP \",\"price\":\"200\",\"type\":\"one_time\"},{\"name\":\"Breakfasts\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL),
(12,'fsdfdsfsd','fsdfdsfsd','<p>dsfdsfdsfdfdsfds</p>',NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,'158,157,156,155,',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,1,NULL,'2021-01-05 13:42:08','2021-01-05 13:42:44',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,'fsdfdsfsd','fsdfdsfsd-1','<p>wrewqrqw</p>',NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:13:36','2021-01-05 18:13:36',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,'fsdfdsfsd','fsdfdsfsd-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:19:19','2021-01-05 18:19:19',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,'fsdfdsfsd','fsdfdsfsd-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:20:20','2021-01-05 18:20:20',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,'fsdfdsfsd','fsdfdsfsd-4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:25:13','2021-01-05 18:25:13',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,'dsadsad','dsadsad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:30:34','2021-01-05 18:30:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,'dsadsad','dsadsad-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:31:10','2021-01-05 18:31:10',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,'dsadsad','dsadsad-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:31:55','2021-01-05 18:31:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,'sdsadsad','sdsadsad','<p>sadsadsad</p>',NULL,NULL,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',1,NULL,NULL,'2021-01-05 18:32:12','2021-01-05 18:32:12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `bravo_location_translations` */

DROP TABLE IF EXISTS `bravo_location_translations`;

CREATE TABLE `bravo_location_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trip_ideas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_location_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_location_translations` */

/*Table structure for table `bravo_locations` */

DROP TABLE IF EXISTS `bravo_locations`;

CREATE TABLE `bravo_locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT 0,
  `_rgt` int(10) unsigned NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `trip_ideas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_locations__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_locations` */

insert  into `bravo_locations`(`id`,`name`,`content`,`slug`,`image_id`,`map_lat`,`map_lng`,`map_zoom`,`status`,`_lft`,`_rgt`,`parent_id`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`,`banner_image_id`,`trip_ideas`) values 
(1,'Paris','New York, a city that doesnt sleep, as Frank Sinatra sang. The Big Apple is one of the largest cities in the United States and one of the most popular in the whole country and the world. Millions of tourists visit it every year attracted by its various iconic symbols and its wide range of leisure and cultural offer. New York is the birth place of new trends and developments in many fields such as art, gastronomy, technology,...','paris',106,'48.856613','2.352222',12,'publish',1,2,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',111,'\"[{\\\"title\\\":\\\"Experiencing the best jazz in Harlem, birthplace of bebop\\\",\\\"link\\\":\\\"#\\\",\\\"content\\\":\\\"New Orleans might be the home of jazz, but New York City is where many of the genre\\u2019s greats became stars \\u2013 and Harlem was at the heart of it.The neighborhood experienced a rebirth during the...\\\",\\\"image_id\\\":\\\"112\\\"},{\\\"title\\\":\\\"Reflections from the road: transformative \\u2018Big Trip\\u2019 experiences\\\",\\\"link\\\":\\\"#\\\",\\\"content\\\":\\\"Whether it\\u2019s a gap year after finishing school, a well-earned sabbatical from work or an overseas adventure in celebration of your retirement, a big trip is a rite of passage for every traveller, with myriad life lessons to be ...\\\",\\\"image_id\\\":\\\"113\\\"}]\"'),
(2,'New York, United States',NULL,'new-york-united-states',107,'40.712776','-74.005974',12,'publish',3,4,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(3,'California',NULL,'california',108,'36.778259','-119.417931',12,'publish',5,6,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(4,'United States',NULL,'united-states',109,'37.090240','-95.712891',12,'publish',7,8,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(5,'Los Angeles',NULL,'los-angeles',110,'34.052235','-118.243683',12,'publish',9,10,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(6,'New Jersey',NULL,'new-jersey',106,'40.058323','-74.405663',12,'publish',11,12,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(7,'San Francisco',NULL,'san-francisco',107,'37.774929','-122.419418',12,'publish',13,14,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL),
(8,'Virginia',NULL,'virginia',108,'37.431572','-78.656891',12,'publish',15,16,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:26','2021-01-05 09:35:26',NULL,NULL);

/*Table structure for table `bravo_payouts` */

DROP TABLE IF EXISTS `bravo_payouts`;

CREATE TABLE `bravo_payouts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(20) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payout_method` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_vendor` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_process_by` int(11) DEFAULT NULL,
  `pay_date` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_payouts` */

/*Table structure for table `bravo_review` */

DROP TABLE IF EXISTS `bravo_review`;

CREATE TABLE `bravo_review` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate_number` int(11) DEFAULT NULL,
  `author_ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vendor_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_review` */

insert  into `bravo_review`(`id`,`object_id`,`object_model`,`title`,`content`,`rate_number`,`author_ip`,`status`,`publish_date`,`create_user`,`update_user`,`deleted_at`,`lang`,`created_at`,`updated_at`,`vendor_id`) values 
(1,1,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:30',10,NULL,NULL,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30',1),
(2,1,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:30',15,NULL,NULL,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30',1),
(3,1,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:31',11,NULL,NULL,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31',1),
(4,1,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:31',10,NULL,NULL,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31',1),
(5,2,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:31',13,NULL,NULL,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31',1),
(6,2,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:32',15,NULL,NULL,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32',1),
(7,3,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:32',9,NULL,NULL,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32',4),
(8,3,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:32',10,NULL,NULL,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32',4),
(9,4,'tour','Trip was great','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:33',7,NULL,NULL,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33',1),
(10,4,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:33',7,NULL,NULL,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33',1),
(11,4,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:33',12,NULL,NULL,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33',1),
(12,4,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:34',12,NULL,NULL,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34',1),
(13,5,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:34',11,NULL,NULL,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34',6),
(14,5,'tour','Great Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:34',11,NULL,NULL,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34',6),
(15,5,'tour','Trip was great','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:35',15,NULL,NULL,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35',6),
(16,5,'tour','Trip was great','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:35',11,NULL,NULL,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35',6),
(17,6,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:35',14,NULL,NULL,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35',6),
(18,6,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:36',14,NULL,NULL,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36',6),
(19,6,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:36',12,NULL,NULL,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36',6),
(20,7,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:36',15,NULL,NULL,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36',4),
(21,7,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:37',12,NULL,NULL,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37',4),
(22,7,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:37',9,NULL,NULL,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37',4),
(23,7,'tour','Trip was great','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:37',16,NULL,NULL,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37',4),
(24,8,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:38',8,NULL,NULL,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38',5),
(25,8,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 09:35:38',10,NULL,NULL,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38',5),
(26,8,'tour','Good Trip','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:38',11,NULL,NULL,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38',5),
(27,9,'tour','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 09:35:38',15,NULL,NULL,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38',4),
(28,1,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:43',12,NULL,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43',1),
(29,1,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:43',7,NULL,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43',1),
(30,1,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:43',9,NULL,NULL,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43',1),
(31,1,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:44',9,NULL,NULL,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44',1),
(32,1,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:44',13,NULL,NULL,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44',1),
(33,2,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:45',7,NULL,NULL,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45',1),
(34,2,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:45',8,NULL,NULL,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45',1),
(35,2,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:45',11,NULL,NULL,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45',1),
(36,2,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:46',13,NULL,NULL,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46',1),
(37,3,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:46',11,NULL,NULL,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46',1),
(38,3,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:47',8,NULL,NULL,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47',1),
(39,4,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:47',12,NULL,NULL,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47',1),
(40,4,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:48',12,NULL,NULL,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48',1),
(41,4,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:48',16,NULL,NULL,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48',1),
(42,4,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:48',16,NULL,NULL,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48',1),
(43,5,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:49',13,NULL,NULL,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49',5),
(44,5,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:49',10,NULL,NULL,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49',5),
(45,5,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:49',11,NULL,NULL,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49',5),
(46,6,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:50',15,NULL,NULL,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50',6),
(47,6,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:50',11,NULL,NULL,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50',6),
(48,7,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:50',11,NULL,NULL,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50',4),
(49,7,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:50',9,NULL,NULL,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50',4),
(50,7,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:51',7,NULL,NULL,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51',4),
(51,7,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:51',12,NULL,NULL,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51',4),
(52,8,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:51',14,NULL,NULL,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51',6),
(53,8,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:52',7,NULL,NULL,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52',6),
(54,8,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:52',15,NULL,NULL,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52',6),
(55,8,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:52',8,NULL,NULL,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52',6),
(56,9,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:53',15,NULL,NULL,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53',1),
(57,9,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:53',10,NULL,NULL,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53',1),
(58,9,'hotel','Beautiful spot with a lovely view','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:54',13,NULL,NULL,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54',1),
(59,9,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:54',7,NULL,NULL,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54',1),
(60,10,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:54',14,NULL,NULL,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54',5),
(61,10,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:55',12,NULL,NULL,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55',5),
(62,10,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:55',16,NULL,NULL,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55',5),
(63,10,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:56',12,NULL,NULL,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56',5),
(64,10,'hotel','Nothing good this time','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:56',14,NULL,NULL,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56',5),
(65,11,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:56',7,NULL,NULL,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56',4),
(66,11,'hotel','Good location, quality should be better','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:57',13,NULL,NULL,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57',4),
(67,11,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',4,'127.0.0.1','approved','2021-01-05 11:47:57',15,NULL,NULL,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57',4),
(68,11,'hotel','Easy way to discover the city','Eum eu sumo albucius perfecto, commodo torquatos consequuntur pro ut, id posse splendide ius. Cu nisl putent omittantur usu, mutat atomorum ex pro, ius nibh nonumy id. Nam at eius dissentias disputando, molestie mnesarchum complectitur per te',5,'127.0.0.1','approved','2021-01-05 11:47:57',11,NULL,NULL,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57',4);

/*Table structure for table `bravo_review_meta` */

DROP TABLE IF EXISTS `bravo_review_meta`;

CREATE TABLE `bravo_review_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `review_id` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=338 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_review_meta` */

insert  into `bravo_review_meta`(`id`,`review_id`,`object_id`,`object_model`,`name`,`val`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,1,1,'tour','Service','4',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(2,1,1,'tour','Organization','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(3,1,1,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(4,1,1,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(5,1,1,'tour','Safety','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(6,2,1,'tour','Service','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(7,2,1,'tour','Organization','5',1,NULL,'2021-01-05 09:35:30','2021-01-05 09:35:30'),
(8,2,1,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(9,2,1,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(10,2,1,'tour','Safety','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(11,3,1,'tour','Service','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(12,3,1,'tour','Organization','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(13,3,1,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(14,3,1,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(15,3,1,'tour','Safety','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(16,4,1,'tour','Service','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(17,4,1,'tour','Organization','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(18,4,1,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(19,4,1,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(20,4,1,'tour','Safety','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(21,5,2,'tour','Service','4',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(22,5,2,'tour','Organization','5',1,NULL,'2021-01-05 09:35:31','2021-01-05 09:35:31'),
(23,5,2,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(24,5,2,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(25,5,2,'tour','Safety','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(26,6,2,'tour','Service','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(27,6,2,'tour','Organization','5',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(28,6,2,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(29,6,2,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(30,6,2,'tour','Safety','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(31,7,3,'tour','Service','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(32,7,3,'tour','Organization','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(33,7,3,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(34,7,3,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(35,7,3,'tour','Safety','5',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(36,8,3,'tour','Service','5',1,NULL,'2021-01-05 09:35:32','2021-01-05 09:35:32'),
(37,8,3,'tour','Organization','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(38,8,3,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(39,8,3,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(40,8,3,'tour','Safety','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(41,9,4,'tour','Service','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(42,9,4,'tour','Organization','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(43,9,4,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(44,9,4,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(45,9,4,'tour','Safety','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(46,10,4,'tour','Service','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(47,10,4,'tour','Organization','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(48,10,4,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(49,10,4,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(50,10,4,'tour','Safety','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(51,11,4,'tour','Service','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(52,11,4,'tour','Organization','4',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(53,11,4,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:33','2021-01-05 09:35:33'),
(54,11,4,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(55,11,4,'tour','Safety','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(56,12,4,'tour','Service','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(57,12,4,'tour','Organization','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(58,12,4,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(59,12,4,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(60,12,4,'tour','Safety','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(61,13,5,'tour','Service','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(62,13,5,'tour','Organization','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(63,13,5,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(64,13,5,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(65,13,5,'tour','Safety','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(66,14,5,'tour','Service','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(67,14,5,'tour','Organization','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(68,14,5,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(69,14,5,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(70,14,5,'tour','Safety','4',1,NULL,'2021-01-05 09:35:34','2021-01-05 09:35:34'),
(71,15,5,'tour','Service','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(72,15,5,'tour','Organization','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(73,15,5,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(74,15,5,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(75,15,5,'tour','Safety','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(76,16,5,'tour','Service','5',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(77,16,5,'tour','Organization','5',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(78,16,5,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(79,16,5,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(80,16,5,'tour','Safety','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(81,17,6,'tour','Service','4',1,NULL,'2021-01-05 09:35:35','2021-01-05 09:35:35'),
(82,17,6,'tour','Organization','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(83,17,6,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(84,17,6,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(85,17,6,'tour','Safety','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(86,18,6,'tour','Service','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(87,18,6,'tour','Organization','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(88,18,6,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(89,18,6,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(90,18,6,'tour','Safety','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(91,19,6,'tour','Service','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(92,19,6,'tour','Organization','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(93,19,6,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(94,19,6,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(95,19,6,'tour','Safety','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(96,20,7,'tour','Service','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(97,20,7,'tour','Organization','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(98,20,7,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(99,20,7,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:36','2021-01-05 09:35:36'),
(100,20,7,'tour','Safety','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(101,21,7,'tour','Service','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(102,21,7,'tour','Organization','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(103,21,7,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(104,21,7,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(105,21,7,'tour','Safety','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(106,22,7,'tour','Service','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(107,22,7,'tour','Organization','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(108,22,7,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(109,22,7,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(110,22,7,'tour','Safety','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(111,23,7,'tour','Service','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(112,23,7,'tour','Organization','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(113,23,7,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(114,23,7,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(115,23,7,'tour','Safety','4',1,NULL,'2021-01-05 09:35:37','2021-01-05 09:35:37'),
(116,24,8,'tour','Service','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(117,24,8,'tour','Organization','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(118,24,8,'tour','Friendliness','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(119,24,8,'tour','Area Expert','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(120,24,8,'tour','Safety','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(121,25,8,'tour','Service','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(122,25,8,'tour','Organization','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(123,25,8,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(124,25,8,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(125,25,8,'tour','Safety','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(126,26,8,'tour','Service','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(127,26,8,'tour','Organization','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(128,26,8,'tour','Friendliness','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(129,26,8,'tour','Area Expert','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(130,26,8,'tour','Safety','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(131,27,9,'tour','Service','5',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(132,27,9,'tour','Organization','4',1,NULL,'2021-01-05 09:35:38','2021-01-05 09:35:38'),
(133,28,1,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(134,28,1,'hotel','Location','4',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(135,28,1,'hotel','Service','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(136,28,1,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(137,28,1,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(138,29,1,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(139,29,1,'hotel','Location','4',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(140,29,1,'hotel','Service','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(141,29,1,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(142,29,1,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(143,30,1,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(144,30,1,'hotel','Location','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(145,30,1,'hotel','Service','5',1,NULL,'2021-01-05 11:47:43','2021-01-05 11:47:43'),
(146,30,1,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(147,30,1,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(148,31,1,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(149,31,1,'hotel','Location','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(150,31,1,'hotel','Service','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(151,31,1,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(152,31,1,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(153,32,1,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(154,32,1,'hotel','Location','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(155,32,1,'hotel','Service','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(156,32,1,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(157,32,1,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:44','2021-01-05 11:47:44'),
(158,33,2,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(159,33,2,'hotel','Location','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(160,33,2,'hotel','Service','4',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(161,33,2,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(162,33,2,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(163,34,2,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(164,34,2,'hotel','Location','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(165,34,2,'hotel','Service','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(166,34,2,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(167,34,2,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(168,35,2,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:45','2021-01-05 11:47:45'),
(169,35,2,'hotel','Location','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(170,35,2,'hotel','Service','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(171,35,2,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(172,35,2,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(173,36,2,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(174,36,2,'hotel','Location','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(175,36,2,'hotel','Service','4',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(176,36,2,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(177,36,2,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:46','2021-01-05 11:47:46'),
(178,37,3,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(179,37,3,'hotel','Location','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(180,37,3,'hotel','Service','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(181,37,3,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(182,37,3,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(183,38,3,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(184,38,3,'hotel','Location','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(185,38,3,'hotel','Service','4',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(186,38,3,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(187,38,3,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(188,39,4,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(189,39,4,'hotel','Location','4',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(190,39,4,'hotel','Service','5',1,NULL,'2021-01-05 11:47:47','2021-01-05 11:47:47'),
(191,39,4,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(192,39,4,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(193,40,4,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(194,40,4,'hotel','Location','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(195,40,4,'hotel','Service','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(196,40,4,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(197,40,4,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(198,41,4,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(199,41,4,'hotel','Location','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(200,41,4,'hotel','Service','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(201,41,4,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(202,41,4,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(203,42,4,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(204,42,4,'hotel','Location','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(205,42,4,'hotel','Service','5',1,NULL,'2021-01-05 11:47:48','2021-01-05 11:47:48'),
(206,42,4,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(207,42,4,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(208,43,5,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(209,43,5,'hotel','Location','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(210,43,5,'hotel','Service','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(211,43,5,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(212,43,5,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(213,44,5,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(214,44,5,'hotel','Location','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(215,44,5,'hotel','Service','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(216,44,5,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(217,44,5,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(218,45,5,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:49','2021-01-05 11:47:49'),
(219,45,5,'hotel','Location','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(220,45,5,'hotel','Service','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(221,45,5,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(222,45,5,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(223,46,6,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(224,46,6,'hotel','Location','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(225,46,6,'hotel','Service','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(226,46,6,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(227,46,6,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(228,47,6,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(229,47,6,'hotel','Location','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(230,47,6,'hotel','Service','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(231,47,6,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(232,47,6,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(233,48,7,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(234,48,7,'hotel','Location','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(235,48,7,'hotel','Service','5',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(236,48,7,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(237,48,7,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:50','2021-01-05 11:47:50'),
(238,49,7,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(239,49,7,'hotel','Location','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(240,49,7,'hotel','Service','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(241,49,7,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(242,49,7,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(243,50,7,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(244,50,7,'hotel','Location','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(245,50,7,'hotel','Service','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(246,50,7,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(247,50,7,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(248,51,7,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(249,51,7,'hotel','Location','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(250,51,7,'hotel','Service','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(251,51,7,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(252,51,7,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(253,52,8,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:51','2021-01-05 11:47:51'),
(254,52,8,'hotel','Location','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(255,52,8,'hotel','Service','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(256,52,8,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(257,52,8,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(258,53,8,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(259,53,8,'hotel','Location','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(260,53,8,'hotel','Service','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(261,53,8,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(262,53,8,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(263,54,8,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(264,54,8,'hotel','Location','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(265,54,8,'hotel','Service','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(266,54,8,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(267,54,8,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(268,55,8,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(269,55,8,'hotel','Location','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(270,55,8,'hotel','Service','4',1,NULL,'2021-01-05 11:47:52','2021-01-05 11:47:52'),
(271,55,8,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(272,55,8,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(273,56,9,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(274,56,9,'hotel','Location','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(275,56,9,'hotel','Service','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(276,56,9,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(277,56,9,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(278,57,9,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(279,57,9,'hotel','Location','4',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(280,57,9,'hotel','Service','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(281,57,9,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(282,57,9,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:53','2021-01-05 11:47:53'),
(283,58,9,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(284,58,9,'hotel','Location','4',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(285,58,9,'hotel','Service','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(286,58,9,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(287,58,9,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(288,59,9,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(289,59,9,'hotel','Location','4',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(290,59,9,'hotel','Service','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(291,59,9,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(292,59,9,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:54','2021-01-05 11:47:54'),
(293,60,10,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(294,60,10,'hotel','Location','5',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(295,60,10,'hotel','Service','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(296,60,10,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(297,60,10,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(298,61,10,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(299,61,10,'hotel','Location','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(300,61,10,'hotel','Service','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(301,61,10,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(302,61,10,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(303,62,10,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(304,62,10,'hotel','Location','5',1,NULL,'2021-01-05 11:47:55','2021-01-05 11:47:55'),
(305,62,10,'hotel','Service','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(306,62,10,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(307,62,10,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(308,63,10,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(309,63,10,'hotel','Location','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(310,63,10,'hotel','Service','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(311,63,10,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(312,63,10,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(313,64,10,'hotel','Sleep','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(314,64,10,'hotel','Location','5',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(315,64,10,'hotel','Service','5',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(316,64,10,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(317,64,10,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:56','2021-01-05 11:47:56'),
(318,65,11,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(319,65,11,'hotel','Location','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(320,65,11,'hotel','Service','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(321,65,11,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(322,65,11,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(323,66,11,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(324,66,11,'hotel','Location','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(325,66,11,'hotel','Service','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(326,66,11,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(327,66,11,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(328,67,11,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(329,67,11,'hotel','Location','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(330,67,11,'hotel','Service','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(331,67,11,'hotel','Clearness','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(332,67,11,'hotel','Rooms','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(333,68,11,'hotel','Sleep','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(334,68,11,'hotel','Location','4',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(335,68,11,'hotel','Service','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(336,68,11,'hotel','Clearness','5',1,NULL,'2021-01-05 11:47:57','2021-01-05 11:47:57'),
(337,68,11,'hotel','Rooms','5',1,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58');

/*Table structure for table `bravo_sauna_dates` */

DROP TABLE IF EXISTS `bravo_sauna_dates`;

CREATE TABLE `bravo_sauna_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `ticket_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_sauna_dates` */

/*Table structure for table `bravo_sauna_term` */

DROP TABLE IF EXISTS `bravo_sauna_term`;

CREATE TABLE `bravo_sauna_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_sauna_term` */

/*Table structure for table `bravo_sauna_translations` */

DROP TABLE IF EXISTS `bravo_sauna_translations`;

CREATE TABLE `bravo_sauna_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_sauna_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_sauna_translations` */

/*Table structure for table `bravo_saunas` */

DROP TABLE IF EXISTS `bravo_saunas`;

CREATE TABLE `bravo_saunas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `start_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_saunas_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_saunas` */

/*Table structure for table `bravo_seo` */

DROP TABLE IF EXISTS `bravo_seo`;

CREATE TABLE `bravo_seo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_index` tinyint(4) DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` int(11) DEFAULT NULL,
  `seo_share` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_seo` */

insert  into `bravo_seo`(`id`,`object_id`,`object_model`,`seo_index`,`seo_title`,`seo_desc`,`seo_image`,`seo_share`,`create_user`,`update_user`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,12,'hotel',NULL,NULL,NULL,NULL,NULL,1,1,NULL,NULL,'2021-01-05 13:42:08','2021-01-05 13:42:44'),
(2,13,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:13:36','2021-01-05 18:13:36'),
(3,14,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:19:19','2021-01-05 18:19:19'),
(4,15,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:20:20','2021-01-05 18:20:20'),
(5,16,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:25:13','2021-01-05 18:25:13'),
(6,17,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:30:34','2021-01-05 18:30:34'),
(7,18,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:31:10','2021-01-05 18:31:10'),
(8,19,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:31:55','2021-01-05 18:31:55'),
(9,20,'hotel',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,'2021-01-05 18:32:12','2021-01-05 18:32:12');

/*Table structure for table `bravo_service_translations` */

DROP TABLE IF EXISTS `bravo_service_translations`;

CREATE TABLE `bravo_service_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_service_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_service_translations` */

/*Table structure for table `bravo_services` */

DROP TABLE IF EXISTS `bravo_services`;

CREATE TABLE `bravo_services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `star_rate` tinyint(4) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `min_people` int(11) DEFAULT NULL,
  `max_people` int(11) DEFAULT NULL,
  `max_guests` int(11) DEFAULT NULL,
  `review_score` int(11) DEFAULT NULL,
  `min_day_before_booking` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_services_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_services` */

insert  into `bravo_services`(`id`,`title`,`slug`,`category_id`,`location_id`,`address`,`map_lat`,`map_lng`,`is_featured`,`star_rate`,`price`,`sale_price`,`min_people`,`max_people`,`max_guests`,`review_score`,`min_day_before_booking`,`min_day_stays`,`object_id`,`object_model`,`status`,`create_user`,`update_user`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'Redac Gateway Hotel','redac-gateway-hotel',NULL,1,'Petit-Montrouge','19.031217','72.851982',0,5,500.00,NULL,NULL,NULL,NULL,5,NULL,NULL,4,'hotel','draft',1,NULL,NULL,'2021-01-05 11:59:27','2021-01-05 11:59:27'),
(2,'fsdfdsfsd','fsdfdsfsd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,12,'hotel','publish',1,1,NULL,'2021-01-05 13:42:08','2021-01-05 13:42:44'),
(3,'fsdfdsfsd','fsdfdsfsd-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,13,'hotel','publish',1,NULL,NULL,'2021-01-05 18:13:36','2021-01-05 18:13:36'),
(4,'fsdfdsfsd','fsdfdsfsd-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,'hotel','publish',1,NULL,NULL,'2021-01-05 18:19:19','2021-01-05 18:19:19'),
(5,'fsdfdsfsd','fsdfdsfsd-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,15,'hotel','publish',1,NULL,NULL,'2021-01-05 18:20:20','2021-01-05 18:20:20'),
(6,'fsdfdsfsd','fsdfdsfsd-4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,16,'hotel','publish',1,NULL,NULL,'2021-01-05 18:25:13','2021-01-05 18:25:13'),
(7,'dsadsad','dsadsad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,17,'hotel','publish',1,NULL,NULL,'2021-01-05 18:30:34','2021-01-05 18:30:34'),
(8,'dsadsad','dsadsad-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,18,'hotel','publish',1,NULL,NULL,'2021-01-05 18:31:10','2021-01-05 18:31:10'),
(9,'dsadsad','dsadsad-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,19,'hotel','publish',1,NULL,NULL,'2021-01-05 18:31:55','2021-01-05 18:31:55'),
(10,'sdsadsad','sdsadsad',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,'hotel','publish',1,NULL,NULL,'2021-01-05 18:32:12','2021-01-05 18:32:12');

/*Table structure for table `bravo_space_dates` */

DROP TABLE IF EXISTS `bravo_space_dates`;

CREATE TABLE `bravo_space_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `max_guests` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_space_dates` */

/*Table structure for table `bravo_space_term` */

DROP TABLE IF EXISTS `bravo_space_term`;

CREATE TABLE `bravo_space_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_space_term` */

/*Table structure for table `bravo_space_translations` */

DROP TABLE IF EXISTS `bravo_space_translations`;

CREATE TABLE `bravo_space_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_space_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_space_translations` */

/*Table structure for table `bravo_spaces` */

DROP TABLE IF EXISTS `bravo_spaces`;

CREATE TABLE `bravo_spaces` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `allow_children` tinyint(4) DEFAULT 0,
  `allow_infant` tinyint(4) DEFAULT 0,
  `max_guests` int(11) DEFAULT NULL,
  `bed` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `square` int(11) DEFAULT NULL,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_days` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_day_before_booking` int(11) DEFAULT NULL,
  `min_day_stays` int(11) DEFAULT NULL,
  `enable_service_fee` tinyint(4) DEFAULT NULL,
  `service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_spaces_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_spaces` */

/*Table structure for table `bravo_terms` */

DROP TABLE IF EXISTS `bravo_terms`;

CREATE TABLE `bravo_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_terms` */

insert  into `bravo_terms`(`id`,`name`,`content`,`attr_id`,`slug`,`create_user`,`update_user`,`origin_id`,`lang`,`created_at`,`updated_at`,`deleted_at`,`image_id`,`icon`) values 
(1,'Apartments',NULL,1,'apartments',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(2,'Hotels',NULL,1,'hotels',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(3,'Homestays',NULL,1,'homestays',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(4,'Villas',NULL,1,'villas',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(5,'Boats',NULL,1,'boats',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(6,'Motels',NULL,1,'motels',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(7,'Resorts',NULL,1,'resorts',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(8,'Lodges',NULL,1,'lodges',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(9,'Holiday homes',NULL,1,'holiday-homes',NULL,NULL,NULL,NULL,'2021-01-05 11:47:58','2021-01-05 11:47:58',NULL,NULL,NULL),
(10,'Cruises',NULL,1,'cruises',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,NULL),
(11,'Wake-up call',NULL,2,'wake-up-call',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-wall-clock'),
(12,'Car hire',NULL,2,'car-hire',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-car-alt-3'),
(13,'Bicycle hire',NULL,2,'bicycle-hire',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-bicycle-alt-2'),
(14,'Flat Tv',NULL,2,'flat-tv',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-imac'),
(15,'Laundry and dry cleaning',NULL,2,'laundry-and-dry-cleaning',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-recycle-alt'),
(16,'Internet – Wifi',NULL,2,'internet-wifi',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-wifi-alt'),
(17,'Coffee and tea',NULL,2,'coffee-and-tea',NULL,NULL,NULL,NULL,'2021-01-05 11:47:59','2021-01-05 11:47:59',NULL,NULL,'icofont-tea'),
(18,'Havana Lobby bar',NULL,3,'havana-lobby-bar',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(19,'Fiesta Restaurant',NULL,3,'fiesta-restaurant',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(20,'Hotel transport services',NULL,3,'hotel-transport-services',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(21,'Free luggage deposit',NULL,3,'free-luggage-deposit',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(22,'Laundry Services',NULL,3,'laundry-services',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(23,'Pets welcome',NULL,3,'pets-welcome',NULL,NULL,NULL,NULL,'2021-01-05 11:48:03','2021-01-05 11:48:03',NULL,NULL,NULL),
(24,'Tickets',NULL,3,'tickets',NULL,NULL,NULL,NULL,'2021-01-05 11:48:04','2021-01-05 11:48:04',NULL,NULL,NULL),
(25,'Wake-up call',NULL,4,'wake-up-call-1',NULL,NULL,NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,'icofont-wall-clock'),
(26,'Flat Tv',NULL,4,'flat-tv-1',NULL,NULL,NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,'icofont-imac'),
(27,'Laundry and dry cleaning',NULL,4,'laundry-and-dry-cleaning-1',NULL,NULL,NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,'icofont-recycle-alt'),
(28,'Internet – Wifi',NULL,4,'internet-wifi-1',NULL,NULL,NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,'icofont-wifi-alt'),
(29,'Coffee and tea',NULL,4,'coffee-and-tea-1',NULL,NULL,NULL,NULL,'2021-01-05 11:48:10','2021-01-05 11:48:10',NULL,NULL,'icofont-tea');

/*Table structure for table `bravo_terms_translations` */

DROP TABLE IF EXISTS `bravo_terms_translations`;

CREATE TABLE `bravo_terms_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_terms_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_terms_translations` */

/*Table structure for table `bravo_tour_category` */

DROP TABLE IF EXISTS `bravo_tour_category`;

CREATE TABLE `bravo_tour_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT 0,
  `_rgt` int(10) unsigned NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_tour_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_category` */

insert  into `bravo_tour_category`(`id`,`name`,`content`,`slug`,`status`,`_lft`,`_rgt`,`parent_id`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'City trips','','city-trips','publish',1,2,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28','2021-01-05 09:35:28'),
(2,'Ecotourism','','ecotourism','publish',3,4,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28','2021-01-05 09:35:28'),
(3,'Escorted tour','','escorted-tour','publish',5,6,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28','2021-01-05 09:35:28'),
(4,'Ligula','','ligula','publish',7,8,NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28','2021-01-05 09:35:28');

/*Table structure for table `bravo_tour_category_translations` */

DROP TABLE IF EXISTS `bravo_tour_category_translations`;

CREATE TABLE `bravo_tour_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_tour_category_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_category_translations` */

/*Table structure for table `bravo_tour_dates` */

DROP TABLE IF EXISTS `bravo_tour_dates`;

CREATE TABLE `bravo_tour_dates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `target_id` bigint(20) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `person_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_guests` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) DEFAULT 0,
  `note_to_customer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_to_admin` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_instant` tinyint(4) DEFAULT 0,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_dates` */

/*Table structure for table `bravo_tour_meta` */

DROP TABLE IF EXISTS `bravo_tour_meta`;

CREATE TABLE `bravo_tour_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tour_id` int(11) DEFAULT NULL,
  `enable_person_types` tinyint(4) DEFAULT NULL,
  `person_types` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_extra_price` tinyint(4) DEFAULT NULL,
  `extra_price` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_by_people` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_open_hours` tinyint(4) DEFAULT NULL,
  `open_hours` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_meta` */

insert  into `bravo_tour_meta`(`id`,`tour_id`,`enable_person_types`,`person_types`,`enable_extra_price`,`extra_price`,`discount_by_people`,`enable_open_hours`,`open_hours`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,1,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,2,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,3,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,4,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,5,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,6,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,7,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,8,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,9,1,'[{\"name\":\"Adult\",\"desc\":\"Age 18+\",\"min\":\"1\",\"max\":\"10\",\"price\":\"1000\"},{\"name\":\"Child\",\"desc\":\"Age 6-17\",\"min\":\"0\",\"max\":\"10\",\"price\":\"300\"}]',1,'[{\"name\":\"Clean\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `bravo_tour_term` */

DROP TABLE IF EXISTS `bravo_tour_term`;

CREATE TABLE `bravo_tour_term` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` int(11) DEFAULT NULL,
  `tour_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_term` */

/*Table structure for table `bravo_tour_translations` */

DROP TABLE IF EXISTS `bravo_tour_translations`;

CREATE TABLE `bravo_tour_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `include` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bravo_tour_translations_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `bravo_tour_translations_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tour_translations` */

/*Table structure for table `bravo_tours` */

DROP TABLE IF EXISTS `bravo_tours`;

CREATE TABLE `bravo_tours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `banner_image_id` int(11) DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_zoom` int(11) DEFAULT NULL,
  `is_featured` tinyint(4) DEFAULT NULL,
  `gallery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `sale_price` decimal(12,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `min_people` int(11) DEFAULT NULL,
  `max_people` int(11) DEFAULT NULL,
  `faqs` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `default_state` tinyint(4) DEFAULT 1,
  `include` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exclude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itinerary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_score` decimal(2,1) DEFAULT NULL,
  `ical_import_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_service_fee` tinyint(4) DEFAULT NULL,
  `service_fee` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surrounding` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bravo_tours_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bravo_tours` */

insert  into `bravo_tours`(`id`,`title`,`slug`,`content`,`image_id`,`banner_image_id`,`short_desc`,`category_id`,`location_id`,`address`,`map_lat`,`map_lng`,`map_zoom`,`is_featured`,`gallery`,`video`,`price`,`sale_price`,`duration`,`min_people`,`max_people`,`faqs`,`status`,`publish_date`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`,`default_state`,`include`,`exclude`,`itinerary`,`review_score`,`ical_import_url`,`enable_service_fee`,`service_fee`,`surrounding`) values 
(1,'American Parks Trail end Rapid City','american-parks-trail','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',21,44,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',4,1,'Arrondissement de Paris','48.852754','2.339155',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2000.00,223.00,5,1,12,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.5,NULL,NULL,NULL,NULL),
(2,'New York: Museum of Modern Art','new-york-museum-of-modern-art','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',22,45,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',2,1,'Porte de Vanves','48.853917','2.307199',12,1,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',900.00,577.00,9,1,10,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.0,NULL,NULL,NULL,NULL),
(3,'Los Angeles to San Francisco Express ','los-angeles-to-san-francisco-express','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',23,46,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',4,1,'Petit-Montrouge','48.884900','2.346377',12,1,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',1500.00,762.00,5,1,11,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.0,NULL,NULL,NULL,NULL),
(4,'Paris Vacation Travel ','paris-vacation-travel','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',24,47,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',2,2,'New York','40.707891','-74.008825',12,1,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',850.00,580.00,2,1,11,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.3,NULL,NULL,NULL,NULL),
(5,'Southwest States (Ex Los Angeles) ','southwest-states','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',25,48,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',3,2,'Regal Cinemas Battery Park 11','40.714578','-73.983888',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',1900.00,157.00,5,1,10,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,6,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.8,NULL,NULL,NULL,NULL),
(6,'Eastern Discovery (Start New Orleans)','eastern-discovery-start-new-orleans','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',26,49,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',3,2,'Prince St Station','40.720161','-74.009628',12,1,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,508.00,5,1,14,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,6,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.3,NULL,NULL,NULL,NULL),
(7,'Eastern Discovery','eastern-discovery','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',27,50,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',2,2,'Pier 36 New York','40.708581','-73.998817',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,392.00,7,1,12,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.5,NULL,NULL,NULL,NULL),
(8,'Pure Luxe in Punta Mita','pure-luxe-in-punta-mita','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',28,51,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',1,3,'Trimmer Springs Rd, Sanger','36.822484','-119.365266',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,1483.00,9,1,12,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,5,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.3,NULL,NULL,NULL,NULL),
(9,'Tastes and Sounds of the South 2019','tastes-and-sounds-of-the-south-2019','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',29,52,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',4,4,'United States','37.040023','-95.643144',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,570.00,9,1,17,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',4.0,NULL,NULL,NULL,NULL),
(10,'Giverny and Versailles Small Group Day Trip','giverny-and-versailles-small-group-day-trip','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',30,53,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',1,5,'Washington, DC, USA','34.049345','-118.248479',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,788.00,8,1,12,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(11,'Trip of New York – Discover America','trip-of-new-york-discover-america','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',31,54,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',2,6,'New Jersey','40.035329','-74.417227',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,482.00,1,1,18,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,5,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(12,'Segway Tour of Washington, D.C. Highlights','segway-tour-of-washington-dc-highlights','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',32,55,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',4,7,'Francisco Parnassus Campus','37.782668','-122.425058',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,837.00,9,1,16,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(13,'Hollywood Sign Small Group Tour in Luxury Van','hollywood-sign-small-group-tour-in-luxury-van','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',33,56,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',2,8,'Virginia','37.445688','-78.673668',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,994.00,7,1,11,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,5,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(14,'San Francisco Express Never Ceases','san-francisco-express','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',34,57,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',4,7,'Comprehensive Cancer Center','37.757522','-122.447984',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,582.00,7,1,12,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:29','2021-01-05 09:47:24',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(15,'Cannes and Antibes Night Tour','cannes-and-antibes-night-tour','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',35,58,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',1,1,'UCSF Helen Diller Family','36.201066','-88.112292',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,779.00,2,1,11,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:30','2021-01-05 09:47:25',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL),
(16,'River Cruise Tour on the Seine','river-cruise-tour-on-the-seine','<p>Start and end in San Francisco! With the in-depth cultural tour Northern California Summer 2019, you have a 8 day tour package taking you through San Francisco, USA and 9 other destinations in USA. Northern California Summer 2019 includes accommodation as well as an expert guide, meals, transport and more.</p><h4>HIGHLIGHTS</h4><ul><li>Visit the Museum of Modern Art in Manhattan</li><li>See amazing works of contemporary art, including Vincent van Gogh\'s The Starry Night</li><li>Check out Campbell\'s Soup Cans by Warhol and The Dance (I) by Matisse</li><li>Behold masterpieces by Gauguin, Dali, Picasso, and Pollock</li><li>Enjoy free audio guides available in English, French, German, Italian, Spanish, Portuguese</li></ul>',36,59,'From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of \'The City\'. Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception',3,1,'Nevada, US','36.401066','-88.312292',12,0,'37,38,39,40,41,42,43','https://www.youtube.com/watch?v=UfEiKK-iX70',2100.00,506.00,6,1,13,'[{\"title\":\"When and where does the tour end?\",\"content\":\"Your tour will conclude in San Francisco on Day 8 of the trip. There are no activities planned for this day so you\'re free to depart at any time. We highly recommend booking post-accommodation to give yourself time to fully experience the wonders of this iconic city!\"},{\"title\":\"When and where does the tour start?\",\"content\":\"Day 1 of this tour is an arrivals day, which gives you a chance to settle into your hotel and explore Los Angeles. The only planned activity for this day is an evening welcome meeting at 7pm, where you can get to know your guides and fellow travellers. Please be aware that the meeting point is subject to change until your final documents are released.\"},{\"title\":\"Do you arrange airport transfers?\",\"content\":\"Airport transfers are not included in the price of this tour, however you can book for an arrival transfer in advance. In this case a tour operator representative will be at the airport to greet you. To arrange this please contact our customer service team once you have a confirmed booking.\"},{\"title\":\"What is the age range\",\"content\":\"This tour has an age range of 12-70 years old, this means children under the age of 12 will not be eligible to participate in this tour. However, if you are over 70 years please contact us as you may be eligible to join the tour if you fill out G Adventures self-assessment form.\"}]','publish',NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:30','2021-01-05 09:47:25',1,'[{\"title\":\"Specialized bilingual guide\"},{\"title\":\"Private Transport\"},{\"title\":\"Entrance fees (Cable and car and Moon Valley)\"},{\"title\":\"Box lunch water, banana apple and chocolate\"}]','[{\"title\":\"Additional Services\"},{\"title\":\"Insurance\"},{\"title\":\"Drink\"},{\"title\":\"Tickets\"}]','[{\"image_id\":\"110\",\"title\":\"Day 1\",\"desc\":\"Los Angeles\",\"content\":\"There are no activities planned until an evening welcome meeting. Additional Notes: We highly recommend booking pre-tour accommodation to fully experience this crazy city.\"},{\"image_id\":\"109\",\"title\":\"Day 2\",\"desc\":\"Lake Havasu City\",\"content\":\"Pack up the van in the morning and check out the stars on the most famous sidewalk in Hollywood on an orientation tour\"},{\"image_id\":\"108\",\"title\":\"Day 3\",\"desc\":\"Las Vegas\\/Bakersfield\",\"content\":\"Travel to one of the country\'s most rugged landscapes \\u2014 the legendary Death Valley, California. Soak in the dramatic landscape. In the afternoon, continue on to Bakersfield for the night.\"},{\"image_id\":\"107\",\"title\":\"Day 4\",\"desc\":\"San Francisco\",\"content\":\"We highly recommend booking post-accommodation to fully experience this famous city.\"}]',0.0,NULL,NULL,NULL,NULL);

/*Table structure for table `core_inbox` */

DROP TABLE IF EXISTS `core_inbox`;

CREATE TABLE `core_inbox` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `object_model` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_inbox` */

/*Table structure for table `core_inbox_messages` */

DROP TABLE IF EXISTS `core_inbox_messages`;

CREATE TABLE `core_inbox_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `inbox_id` bigint(20) DEFAULT NULL,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0,
  `is_read` tinyint(4) DEFAULT 0,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_inbox_messages` */

/*Table structure for table `core_languages` */

DROP TABLE IF EXISTS `core_languages`;

CREATE TABLE `core_languages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_languages` */

insert  into `core_languages`(`id`,`locale`,`name`,`flag`,`status`,`create_user`,`update_user`,`last_build_at`,`deleted_at`,`created_at`,`updated_at`) values 
(1,'en','English','gb','publish',1,NULL,NULL,NULL,'2021-01-05 09:35:15','2021-01-05 09:35:15'),
(2,'ja','Japanese','jp','publish',1,NULL,NULL,NULL,'2021-01-05 09:35:15','2021-01-05 09:35:15'),
(3,'egy','Egyptian','eg','publish',1,NULL,NULL,NULL,'2021-01-05 09:35:15','2021-01-05 09:35:15');

/*Table structure for table `core_menu_translations` */

DROP TABLE IF EXISTS `core_menu_translations`;

CREATE TABLE `core_menu_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_menu_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_menu_translations` */

insert  into `core_menu_translations`(`id`,`origin_id`,`locale`,`items`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,1,'ja','[{\"name\":\"\\u30db\\u30fc\\u30e0\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30db\\u30fc\\u30e0\\u30da\\u30fc\\u30b8\",\"url\":\"\\/ja\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30db\\u30c6\\u30eb\",\"url\":\"\\/ja\\/page\\/hotel\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0 \\u30c4\\u30a2\\u30fc\",\"url\":\"\\/ja\\/page\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30db\\u30fc\\u30e0\\u30b9\\u30da\\u30fc\\u30b9\",\"url\":\"\\/ja\\/page\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"\\u30db\\u30c6\\u30eb\",\"url\":\"\\/ja\\/hotel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30db\\u30c6\\u30eb\\u4e00\\u89a7\",\"url\":\"\\/ja\\/hotel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30db\\u30c6\\u30eb\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/hotel\\/parian-holiday-villas\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"\\u30c4\\u30a2\\u30fc\",\"url\":\"\\/ja\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30c4\\u30a2\\u30fc\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30c4\\u30a2\\u30fc\\u30de\\u30c3\\u30d7\",\"url\":\"\\/ja\\/tour?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30c4\\u30a2\\u30fc\\u8a73\\u7d30\",\"url\":\"\\/ja\\/tour\\/paris-vacation-travel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"\\u30b9\\u30da\\u30fc\\u30b9\",\"url\":\"\\/ja\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30b9\\u30da\\u30fc\\u30b9\\u30ea\\u30b9\\u30c8\",\"url\":\"\\/ja\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30b9\\u30da\\u30fc\\u30b9\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/space\\/stay-greenwich-village\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"\\u30da\\u30fc\\u30b8\",\"url\":\"#\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"\\u30cb\\u30e5\\u30fc\\u30b9\\u4e00\\u89a7\",\"url\":\"\\/ja\\/news\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u30cb\\u30e5\\u30fc\\u30b9\\u8a73\\u7d30\",\"url\":\"\\/ja\\/news\\/morning-in-the-northern-sea\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"\\u5834\\u6240\\u306e\\u8a73\\u7d30\",\"url\":\"\\/ja\\/location\\/paris\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"\\u30d9\\u30f3\\u30c0\\u30fc\\u306b\\u306a\\u308b\",\"url\":\"\\/ja\\/page\\/become-a-vendor\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"\\u63a5\\u89e6\",\"url\":\"\\/ja\\/contact\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]',1,NULL,'2021-01-05 09:35:23',NULL),
(2,1,'egy','[{\"name\":\"Home\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Home Page\",\"url\":\"\\/egy\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Hotel\",\"url\":\"\\/egy\\/page\\/hotel\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Tour\",\"url\":\"\\/egy\\/page\\/tour\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Space\",\"url\":\"\\/egy\\/page\\/space\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Home Car\",\"url\":\"\\/egy\\/page\\/car\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"Hotel\",\"url\":\"\\/egy\\/hotel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Hotel List\",\"url\":\"\\/egy\\/hotel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Hotel Map\",\"url\":\"\\/egy\\/hotel?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Hotel Detail\",\"url\":\"\\/egy\\/hotel\\/parian-holiday-villas\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"Tours\",\"url\":\"\\/egy\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Tour List\",\"url\":\"\\/egy\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Tour Map\",\"url\":\"\\/egy\\/tour?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Tour Detail\",\"url\":\"\\/egy\\/tour\\/paris-vacation-travel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"Space\",\"url\":\"\\/egy\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Space List\",\"url\":\"\\/egy\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Space Map\",\"url\":\"\\/egy\\/space?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Space Detail\",\"url\":\"\\/egy\\/space\\/stay-greenwich-village\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"Car\",\"url\":\"\\/egy\\/car\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"Car List\",\"url\":\"\\/egy\\/car\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Car Map\",\"url\":\"\\/egy\\/car?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Car Detail\",\"url\":\"\\/egy\\/car\\/vinfast-lux-a20-plus\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]},{\"name\":\"Pages\",\"url\":\"#\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[{\"name\":\"News List\",\"url\":\"\\/egy\\/news\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"News Detail\",\"url\":\"\\/egy\\/news\\/morning-in-the-northern-sea\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]},{\"name\":\"Location Detail\",\"url\":\"\\/egy\\/location\\/paris\",\"item_model\":\"custom\",\"children\":[]},{\"name\":\"Become a vendor\",\"url\":\"\\/egy\\/page\\/become-a-vendor\",\"item_model\":\"custom\",\"children\":[]}]},{\"name\":\"Contact\",\"url\":\"\\/egy\\/contact\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"children\":[]}]',1,NULL,'2021-01-05 09:35:23',NULL);

/*Table structure for table `core_menus` */

DROP TABLE IF EXISTS `core_menus`;

CREATE TABLE `core_menus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `items` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_menus` */

insert  into `core_menus`(`id`,`name`,`items`,`create_user`,`update_user`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'Main Menu','[{\"name\":\"Home\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[{\"name\":\"Home Page\",\"url\":\"\\/\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Home Hotel\",\"url\":\"\\/page\\/hotel\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Home Tour\",\"url\":\"\\/page\\/tour\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Home Space\",\"url\":\"\\/page\\/space\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Home Car\",\"url\":\"\\/page\\/car\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]}]},{\"name\":\"Job\",\"url\":\"\\/job\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Car\",\"url\":\"\\/car\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[{\"name\":\"Car List\",\"url\":\"\\/car\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Car Map\",\"url\":\"\\/car?_layout=map\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]},{\"name\":\"Car Detail\",\"url\":\"\\/car\\/vinfast-lux-a20-plus\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]}]},{\"name\":\"Contact\",\"url\":\"\\/contact\",\"item_model\":\"custom\",\"model_name\":\"Custom\",\"is_removed\":true,\"_open\":false,\"children\":[]}]',1,1,NULL,NULL,'2021-01-05 09:35:23','2021-01-05 18:49:13');

/*Table structure for table `core_model_has_permissions` */

DROP TABLE IF EXISTS `core_model_has_permissions`;

CREATE TABLE `core_model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `core_model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `core_model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `core_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_model_has_permissions` */

/*Table structure for table `core_model_has_roles` */

DROP TABLE IF EXISTS `core_model_has_roles`;

CREATE TABLE `core_model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `core_model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `core_model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `core_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_model_has_roles` */

insert  into `core_model_has_roles`(`role_id`,`model_type`,`model_id`) values 
(1,'App\\User',2),
(1,'App\\User',4),
(1,'App\\User',5),
(1,'App\\User',6),
(2,'App\\User',3),
(2,'App\\User',8),
(2,'App\\User',9),
(2,'App\\User',10),
(2,'App\\User',11),
(2,'App\\User',12),
(2,'App\\User',13),
(2,'App\\User',14),
(2,'App\\User',15),
(2,'App\\User',16),
(2,'App\\User',17),
(3,'App\\User',1),
(3,'App\\User',7);

/*Table structure for table `core_news` */

DROP TABLE IF EXISTS `core_news`;

CREATE TABLE `core_news` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_news` */

insert  into `core_news`(`id`,`title`,`content`,`slug`,`status`,`cat_id`,`image_id`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'The day on Paris',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','the-day-on-paris','publish',4,114,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(2,'Pure Luxe in Punta Mita',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','pure-luxe-in-punta-mita','publish',4,115,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(3,'All Aboard the Rocky Mountaineer',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','all-aboard-the-rocky-mountaineer','publish',4,116,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(4,'City Spotlight: Philadelphia',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','city-spotlight-philadelphia','publish',3,117,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(5,'Tiptoe through the Tulips of Washington',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','tiptoe-through-the-tulips-of-washington','publish',1,118,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(6,'A Seaside Reset in Laguna Beach',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','a-seaside-reset-in-laguna-beach','publish',4,119,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(7,'America  National Parks with Denver',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','america-national-parks-with-denver','publish',1,120,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL),
(8,'Morning in the Northern sea',' From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception  From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception <br/>From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception<br/>\r\r\n    From the iconic to the unexpected, the city of San Francisco never ceases to surprise. Kick-start your effortlessly delivered Northern California holiday in the cosmopolitan hills of  The City . Join your Travel Director and fellow travellers for a Welcome Reception at your hotel.Welcome Reception','morning-in-the-northern-sea','publish',3,115,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:28',NULL);

/*Table structure for table `core_news_category` */

DROP TABLE IF EXISTS `core_news_category`;

CREATE TABLE `core_news_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT 0,
  `_rgt` int(10) unsigned NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_news_category` */

insert  into `core_news_category`(`id`,`name`,`content`,`slug`,`status`,`_lft`,`_rgt`,`parent_id`,`create_user`,`update_user`,`deleted_at`,`created_at`,`updated_at`,`origin_id`,`lang`) values 
(1,'Adventure Travel',NULL,'adventure-travel','publish',1,2,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL),
(2,'Ecotourism',NULL,'ecotourism','publish',3,4,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL),
(3,'Sea Travel ',NULL,'sea-travel','publish',5,6,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL),
(4,'Hosted Tour',NULL,'hosted-tour','publish',7,8,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL),
(5,'City trips ',NULL,'city-trips','publish',9,10,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL),
(6,'Escorted Tour ',NULL,'escorted-tour','publish',11,12,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27',NULL,NULL);

/*Table structure for table `core_news_category_translations` */

DROP TABLE IF EXISTS `core_news_category_translations`;

CREATE TABLE `core_news_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_category_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_news_category_translations` */

/*Table structure for table `core_news_tag` */

DROP TABLE IF EXISTS `core_news_tag`;

CREATE TABLE `core_news_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `news_id` int(11) DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_news_tag` */

/*Table structure for table `core_news_translations` */

DROP TABLE IF EXISTS `core_news_translations`;

CREATE TABLE `core_news_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_news_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_news_translations` */

/*Table structure for table `core_notifications` */

DROP TABLE IF EXISTS `core_notifications`;

CREATE TABLE `core_notifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `is_read` tinyint(4) DEFAULT 0,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_id` bigint(20) DEFAULT NULL,
  `target_parent_id` bigint(20) DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_notifications` */

/*Table structure for table `core_page_translations` */

DROP TABLE IF EXISTS `core_page_translations`;

CREATE TABLE `core_page_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `core_page_translations_origin_id_locale_unique` (`origin_id`,`locale`),
  KEY `core_page_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_page_translations` */

/*Table structure for table `core_pages` */

DROP TABLE IF EXISTS `core_pages`;

CREATE TABLE `core_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `image_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_pages_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_pages` */

insert  into `core_pages`(`id`,`slug`,`title`,`content`,`short_desc`,`status`,`publish_date`,`image_id`,`template_id`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'home-page','Home Page',NULL,NULL,'publish',NULL,NULL,1,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(2,'tour','Home Tour',NULL,NULL,'publish',NULL,NULL,2,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(3,'space','Home Space',NULL,NULL,'publish',NULL,NULL,3,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(4,'hotel','Home Hotel',NULL,NULL,'publish',NULL,NULL,4,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:25',NULL),
(5,'become-a-vendor','Become a vendor',NULL,NULL,'publish',NULL,NULL,5,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:25',NULL),
(6,'car','Home Car',NULL,NULL,'publish',NULL,NULL,6,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:25',NULL),
(7,'privacy-policy','Privacy policy','<h1>Privacy policy</h1>\r\n<p> This privacy policy (\"Policy\") describes how the personally identifiable information (\"Personal Information\") you may provide on the <a target=\"_blank\" href=\"http://dev.bookingcore.org\" rel=\"noreferrer noopener\">dev.bookingcore.org</a> website (\"Website\" or \"Service\") and any of its related products and services (collectively, \"Services\") is collected, protected and used. It also describes the choices available to you regarding our use of your Personal Information and how you can access and update this information. This Policy is a legally binding agreement between you (\"User\", \"you\" or \"your\") and this Website operator (\"Operator\", \"we\", \"us\" or \"our\"). By accessing and using the Website and Services, you acknowledge that you have read, understood, and agree to be bound by the terms of this Agreement. This Policy does not apply to the practices of companies that we do not own or control, or to individuals that we do not employ or manage.</p>\r\n<h2>Automatic collection of information</h2>\r\n<p>When you open the Website, our servers automatically record information that your browser sends. This data may include information such as your device\'s IP address, browser type and version, operating system type and version, language preferences or the webpage you were visiting before you came to the Website and Services, pages of the Website and Services that you visit, the time spent on those pages, information you search for on the Website, access times and dates, and other statistics.</p>\r\n<p>Information collected automatically is used only to identify potential cases of abuse and establish statistical information regarding the usage and traffic of the Website and Services. This statistical information is not otherwise aggregated in such a way that would identify any particular user of the system.</p>\r\n<h2>Collection of personal information</h2>\r\n<p>You can access and use the Website and Services without telling us who you are or revealing any information by which someone could identify you as a specific, identifiable individual. If, however, you wish to use some of the features on the Website, you may be asked to provide certain Personal Information (for example, your name and e-mail address). We receive and store any information you knowingly provide to us when you create an account, publish content,  or fill any online forms on the Website. When required, this information may include the following:</p>\r\n<ul>\r\n<li>Personal details such as name, country of residence, etc.</li>\r\n<li>Contact information such as email address, address, etc.</li>\r\n<li>Account details such as user name, unique user ID, password, etc.</li>\r\n<li>Information about other individuals such as your family members, friends, etc.</li>\r\n</ul>\r\n<p>Some of the information we collect is directly from you via the Website and Services. However, we may also collect Personal Information about you from other sources such as public databases and our joint marketing partners. You can choose not to provide us with your Personal Information, but then you may not be able to take advantage of some of the features on the Website. Users who are uncertain about what information is mandatory are welcome to contact us.</p>\r\n<h2>Use and processing of collected information</h2>\r\n<p>In order to make the Website and Services available to you, or to meet a legal obligation, we need to collect and use certain Personal Information. If you do not provide the information that we request, we may not be able to provide you with the requested products or services. Any of the information we collect from you may be used for the following purposes:</p>\r\n<ul>\r\n<li>Create and manage user accounts</li>\r\n<li>Send administrative information</li>\r\n<li>Request user feedback</li>\r\n<li>Improve user experience</li>\r\n<li>Enforce terms and conditions and policies</li>\r\n<li>Run and operate the Website and Services</li>\r\n</ul>\r\n<p>Processing your Personal Information depends on how you interact with the Website and Services, where you are located in the world and if one of the following applies: (i) you have given your consent for one or more specific purposes; this, however, does not apply, whenever the processing of Personal Information is subject to European data protection law; (ii) provision of information is necessary for the performance of an agreement with you and/or for any pre-contractual obligations thereof; (iii) processing is necessary for compliance with a legal obligation to which you are subject; (iv) processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in us; (v) processing is necessary for the purposes of the legitimate interests pursued by us or by a third party.</p>\r\n<p> Note that under some legislations we may be allowed to process information until you object to such processing (by opting out), without having to rely on consent or any other of the following legal bases below. In any case, we will be happy to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Information is a statutory or contractual requirement, or a requirement necessary to enter into a contract.</p>\r\n<h2>Managing information</h2>\r\n<p>You are able to delete certain Personal Information we have about you. The Personal Information you can delete may change as the Website and Services change. When you delete Personal Information, however, we may maintain a copy of the unrevised Personal Information in our records for the duration necessary to comply with our obligations to our affiliates and partners, and for the purposes described below. If you would like to delete your Personal Information or permanently delete your account, you can do so by contacting us.</p>\r\n<h2>Disclosure of information</h2>\r\n<p> Depending on the requested Services or as necessary to complete any transaction or provide any service you have requested, we may share your information with your consent with our trusted third parties that work with us, any other affiliates and subsidiaries we rely upon to assist in the operation of the Website and Services available to you. We do not share Personal Information with unaffiliated third parties. These service providers are not authorized to use or disclose your information except as necessary to perform services on our behalf or comply with legal requirements. We may share your Personal Information for these purposes only with third parties whose privacy policies are consistent with ours or who agree to abide by our policies with respect to Personal Information. These third parties are given Personal Information they need only in order to perform their designated functions, and we do not authorize them to use or disclose Personal Information for their own marketing or other purposes.</p>\r\n<p>We will disclose any Personal Information we collect, use or receive if required or permitted by law, such as to comply with a subpoena, or similar legal process, and when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>\r\n<h2>Retention of information</h2>\r\n<p>We will retain and use your Personal Information for the period necessary to comply with our legal obligations, resolve disputes, and enforce our agreements unless a longer retention period is required or permitted by law. We may use any aggregated data derived from or incorporating your Personal Information after you update or delete it, but not in a manner that would identify you personally. Once the retention period expires, Personal Information shall be deleted. Therefore, the right to access, the right to erasure, the right to rectification and the right to data portability cannot be enforced after the expiration of the retention period.</p>\r\n<h2>The rights of users</h2>\r\n<p>You may exercise certain rights regarding your information processed by us. In particular, you have the right to do the following: (i) you have the right to withdraw consent where you have previously given your consent to the processing of your information; (ii) you have the right to object to the processing of your information if the processing is carried out on a legal basis other than consent; (iii) you have the right to learn if information is being processed by us, obtain disclosure regarding certain aspects of the processing and obtain a copy of the information undergoing processing; (iv) you have the right to verify the accuracy of your information and ask for it to be updated or corrected; (v) you have the right, under certain circumstances, to restrict the processing of your information, in which case, we will not process your information for any purpose other than storing it; (vi) you have the right, under certain circumstances, to obtain the erasure of your Personal Information from us; (vii) you have the right to receive your information in a structured, commonly used and machine readable format and, if technically feasible, to have it transmitted to another controller without any hindrance. This provision is applicable provided that your information is processed by automated means and that the processing is based on your consent, on a contract which you are part of or on pre-contractual obligations thereof.</p>\r\n<h2>Privacy of children</h2>\r\n<p>We do not knowingly collect any Personal Information from children under the age of 18. If you are under the age of 18, please do not submit any Personal Information through the Website and Services. We encourage parents and legal guardians to monitor their children\'s Internet usage and to help enforce this Policy by instructing their children never to provide Personal Information through the Website and Services without their permission. If you have reason to believe that a child under the age of 18 has provided Personal Information to us through the Website and Services, please contact us. You must also be old enough to consent to the processing of your Personal Information in your country (in some countries we may allow your parent or guardian to do so on your behalf).</p>\r\n<h2>Cookies</h2>\r\n<p>The Website and Services use \"cookies\" to help personalize your online experience. A cookie is a text file that is placed on your hard disk by a web page server. Cookies cannot be used to run programs or deliver viruses to your computer. Cookies are uniquely assigned to you, and can only be read by a web server in the domain that issued the cookie to you.</p>\r\n<p>We may use cookies to collect, store, and track information for statistical purposes to operate the Website and Services. You have the ability to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. To learn more about cookies and how to manage them, visit <a target=\"_blank\" href=\"https://www.internetcookies.org\" rel=\"noreferrer noopener\">internetcookies.org</a></p>\r\n<h2>Do Not Track signals</h2>\r\n<p>Some browsers incorporate a Do Not Track feature that signals to websites you visit that you do not want to have your online activity tracked. Tracking is not the same as using or collecting information in connection with a website. For these purposes, tracking refers to collecting personally identifiable information from consumers who use or visit a website or online service as they move across different websites over time. How browsers communicate the Do Not Track signal is not yet uniform. As a result, the Website and Services are not yet set up to interpret or respond to Do Not Track signals communicated by your browser. Even so, as described in more detail throughout this Policy, we limit our use and collection of your personal information.</p>\r\n<h2>Email marketing</h2>\r\n<p>We offer electronic newsletters to which you may voluntarily subscribe at any time. We are committed to keeping your e-mail address confidential and will not disclose your email address to any third parties except as allowed in the information use and processing section or for the purposes of utilizing a third party provider to send such emails. We will maintain the information sent via e-mail in accordance with applicable laws and regulations.</p>\r\n<p>In compliance with the CAN-SPAM Act, all e-mails sent from us will clearly state who the e-mail is from and provide clear information on how to contact the sender. You may choose to stop receiving our newsletter or marketing emails by following the unsubscribe instructions included in these emails or by contacting us. However, you will continue to receive essential transactional emails.</p>\r\n<h2>Links to other resources</h2>\r\n<p>The Website and Services contain links to other resources that are not owned or controlled by us. Please be aware that we are not responsible for the privacy practices of such other resources or third parties. We encourage you to be aware when you leave the Website and Services and to read the privacy statements of each and every resource that may collect Personal Information.</p>\r\n<h2>Information security</h2>\r\n<p>We secure information you provide on computer servers in a controlled, secure environment, protected from unauthorized access, use, or disclosure. We maintain reasonable administrative, technical, and physical safeguards in an effort to protect against unauthorized access, use, modification, and disclosure of Personal Information in its control and custody. However, no data transmission over the Internet or wireless network can be guaranteed. Therefore, while we strive to protect your Personal Information, you acknowledge that (i) there are security and privacy limitations of the Internet which are beyond our control; (ii) the security, integrity, and privacy of any and all information and data exchanged between you and the Website and Services cannot be guaranteed; and (iii) any such information and data may be viewed or tampered with in transit by a third party, despite best efforts.</p>\r\n<h2>Data breach</h2>\r\n<p>In the event we become aware that the security of the Website and Services has been compromised or users Personal Information has been disclosed to unrelated third parties as a result of external activity, including, but not limited to, security attacks or fraud, we reserve the right to take reasonably appropriate measures, including, but not limited to, investigation and reporting, as well as notification to and cooperation with law enforcement authorities. In the event of a data breach, we will make reasonable efforts to notify affected individuals if we believe that there is a reasonable risk of harm to the user as a result of the breach or if notice is otherwise required by law. When we do, we will post a notice on the Website, send you an email.</p>\r\n<h2>Changes and amendments</h2>\r\n<p>We reserve the right to modify this Policy or its terms relating to the Website and Services from time to time in our discretion and will notify you of any material changes to the way in which we treat Personal Information. When we do, we will post a notification on the main page of the Website. We may also provide notice to you in other ways in our discretion, such as through contact information you have provided. Any updated version of this Policy will be effective immediately upon the posting of the revised Policy unless otherwise specified. Your continued use of the Website and Services after the effective date of the revised Policy (or such other act specified at that time) will constitute your consent to those changes. However, we will not, without your consent, use your Personal Information in a manner materially different than what was stated at the time your Personal Information was collected. Policy was created with <a style=\"color:inherit;\" target=\"_blank\" href=\"https://www.websitepolicies.com/privacy-policy-generator\" rel=\"noreferrer noopener\">WebsitePolicies</a>.</p>\r\n<h2>Acceptance of this policy</h2>\r\n<p>You acknowledge that you have read this Policy and agree to all its terms and conditions. By accessing and using the Website and Services you agree to be bound by this Policy. If you do not agree to abide by the terms of this Policy, you are not authorized to access or use the Website and Services.</p>\r\n<h2>Contacting us</h2>\r\n<p>If you would like to contact us to understand more about this Policy or wish to contact us concerning any matter relating to individual rights and your Personal Information, you may do so via the <a target=\"_blank\" href=\"http://dev.bookingcore.org/contact\" rel=\"noreferrer noopener\">contact form</a></p>\r\n<p>This document was last updated on October 6, 2020</p>',NULL,'publish',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,'2021-01-05 09:35:25','2021-01-05 09:35:25');

/*Table structure for table `core_permissions` */

DROP TABLE IF EXISTS `core_permissions`;

CREATE TABLE `core_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_permissions` */

insert  into `core_permissions`(`id`,`name`,`guard_name`,`created_at`,`updated_at`) values 
(1,'report_view','web','2021-01-05 09:35:04','2021-01-05 09:35:04'),
(2,'contact_manage','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(3,'newsletter_manage','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(4,'language_manage','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(5,'language_translation','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(6,'booking_view','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(7,'booking_update','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(8,'booking_manage_others','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(9,'enquiry_view','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(10,'enquiry_update','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(11,'enquiry_manage_others','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(12,'template_view','web','2021-01-05 09:35:05','2021-01-05 09:35:05'),
(13,'template_create','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(14,'template_update','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(15,'template_delete','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(16,'news_view','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(17,'news_create','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(18,'news_update','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(19,'news_delete','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(20,'news_manage_others','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(21,'role_view','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(22,'role_create','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(23,'role_update','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(24,'role_delete','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(25,'permission_view','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(26,'permission_create','web','2021-01-05 09:35:06','2021-01-05 09:35:06'),
(27,'permission_update','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(28,'permission_delete','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(29,'dashboard_access','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(30,'dashboard_vendor_access','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(31,'setting_update','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(32,'menu_view','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(33,'menu_create','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(34,'menu_update','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(35,'menu_delete','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(36,'user_view','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(37,'user_create','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(38,'user_update','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(39,'user_delete','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(40,'page_view','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(41,'page_create','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(42,'page_update','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(43,'page_delete','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(44,'page_manage_others','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(45,'setting_view','web','2021-01-05 09:35:07','2021-01-05 09:35:07'),
(46,'media_upload','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(47,'media_manage','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(48,'tour_view','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(49,'tour_create','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(50,'tour_update','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(51,'tour_delete','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(52,'tour_manage_others','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(53,'tour_manage_attributes','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(54,'location_view','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(55,'location_create','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(56,'location_update','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(57,'location_delete','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(58,'location_manage_others','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(59,'review_manage_others','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(60,'system_log_view','web','2021-01-05 09:35:08','2021-01-05 09:35:08'),
(61,'space_view','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(62,'space_create','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(63,'space_update','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(64,'space_delete','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(65,'space_manage_others','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(66,'space_manage_attributes','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(67,'job_view','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(68,'job_create','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(69,'job_update','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(70,'job_delete','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(71,'job_manage_others','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(72,'job_manage_attributes','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(73,'car_view','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(74,'car_create','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(75,'car_update','web','2021-01-05 09:35:09','2021-01-05 09:35:09'),
(76,'car_delete','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(77,'car_manage_others','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(78,'car_manage_attributes','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(79,'event_view','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(80,'event_create','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(81,'event_update','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(82,'event_delete','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(83,'event_manage_others','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(84,'event_manage_attributes','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(85,'social_manage_forum','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(86,'plugin_manage','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(87,'vendor_payout_view','web','2021-01-05 09:35:10','2021-01-05 09:35:10'),
(88,'vendor_payout_manage','web','2021-01-05 09:35:10','2021-01-05 09:35:10');

/*Table structure for table `core_role_has_permissions` */

DROP TABLE IF EXISTS `core_role_has_permissions`;

CREATE TABLE `core_role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `core_role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `core_role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `core_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `core_role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `core_roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_role_has_permissions` */

insert  into `core_role_has_permissions`(`permission_id`,`role_id`) values 
(1,3),
(2,3),
(3,3),
(4,3),
(5,3),
(6,3),
(7,3),
(8,3),
(9,1),
(9,3),
(10,1),
(10,3),
(11,3),
(12,3),
(13,3),
(14,3),
(15,3),
(16,3),
(17,3),
(18,3),
(19,3),
(20,3),
(21,3),
(22,3),
(23,3),
(24,3),
(25,3),
(26,3),
(27,3),
(28,3),
(29,3),
(30,1),
(30,3),
(31,3),
(32,3),
(33,3),
(34,3),
(35,3),
(36,3),
(37,3),
(38,3),
(39,3),
(40,3),
(41,3),
(42,3),
(43,3),
(44,3),
(45,3),
(46,1),
(46,3),
(47,3),
(48,1),
(48,3),
(49,1),
(49,3),
(50,1),
(50,3),
(51,1),
(51,3),
(52,3),
(53,3),
(54,3),
(55,3),
(56,3),
(57,3),
(58,3),
(59,3),
(60,3),
(61,1),
(61,3),
(62,1),
(62,3),
(63,1),
(63,3),
(64,1),
(64,3),
(65,3),
(66,3),
(67,1),
(67,3),
(68,1),
(68,3),
(69,1),
(69,3),
(70,1),
(70,3),
(71,3),
(72,3),
(73,1),
(73,3),
(74,1),
(74,3),
(75,1),
(75,3),
(76,1),
(76,3),
(77,3),
(78,3),
(79,1),
(79,3),
(80,1),
(80,3),
(81,1),
(81,3),
(82,1),
(82,3),
(83,3),
(84,3),
(85,3),
(86,3),
(87,3),
(88,3);

/*Table structure for table `core_roles` */

DROP TABLE IF EXISTS `core_roles`;

CREATE TABLE `core_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_roles` */

insert  into `core_roles`(`id`,`name`,`guard_name`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'vendor','web',NULL,NULL,'2021-01-05 09:35:11','2021-01-05 09:35:11'),
(2,'customer','web',NULL,NULL,'2021-01-05 09:35:11','2021-01-05 09:35:11'),
(3,'administrator','web',NULL,NULL,'2021-01-05 09:35:11','2021-01-05 09:35:11');

/*Table structure for table `core_settings` */

DROP TABLE IF EXISTS `core_settings`;

CREATE TABLE `core_settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autoload` tinyint(4) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_settings` */

insert  into `core_settings`(`id`,`name`,`group`,`val`,`autoload`,`create_user`,`update_user`,`lang`,`created_at`,`updated_at`) values 
(1,'site_locale','general','en',NULL,NULL,NULL,NULL,NULL,NULL),
(2,'site_enable_multi_lang','general','1',NULL,NULL,NULL,NULL,NULL,NULL),
(3,'enable_rtl_egy','general','1',NULL,NULL,NULL,NULL,NULL,NULL),
(4,'menu_locations','general','{\"primary\":1}',NULL,1,1,NULL,NULL,'2021-01-05 18:49:13'),
(5,'admin_email','general','contact@bookingcore.com',NULL,NULL,NULL,NULL,NULL,NULL),
(6,'email_from_name','general','Booking Core',NULL,NULL,NULL,NULL,NULL,NULL),
(7,'email_from_address','general','contact@bookingcore.com',NULL,NULL,NULL,NULL,NULL,NULL),
(8,'logo_id','general','8',NULL,NULL,NULL,NULL,NULL,NULL),
(9,'site_favicon','general','10',NULL,NULL,NULL,NULL,NULL,NULL),
(10,'topbar_left_text','general','<div class=\"socials\">\r\n<a href=\"#\"><i class=\"fa fa-facebook\"></i></a>\r\n<a href=\"#\"><i class=\"fa fa-linkedin\"></i></a>\r\n<a href=\"#\"><i class=\"fa fa-google-plus\"></i></a>\r\n</div>\r\n<span class=\"line\"></span>\r\n<a href=\"mailto:contact@bookingcore.com\">contact@bookingcore.com</a>',NULL,NULL,NULL,NULL,NULL,NULL),
(11,'footer_text_left','general','Copyright © 2019 by Booking Core',NULL,NULL,NULL,NULL,NULL,NULL),
(12,'footer_text_right','general','Booking Core',NULL,NULL,NULL,NULL,NULL,NULL),
(13,'list_widget_footer','general','[{\"title\":\"NEED HELP?\",\"size\":\"3\",\"content\":\"<div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            Call Us\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            + 00 222 44 5678\\r\\n        <\\/div>\\r\\n    <\\/div>\\r\\n    <div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            Email for Us\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            hello@yoursite.com\\r\\n        <\\/div>\\r\\n    <\\/div>\\r\\n    <div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            Follow Us\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            <a href=\\\"#\\\">\\r\\n                <i class=\\\"icofont-facebook\\\"><\\/i>\\r\\n            <\\/a>\\r\\n            <a href=\\\"#\\\">\\r\\n               <i class=\\\"icofont-twitter\\\"><\\/i>\\r\\n            <\\/a>\\r\\n            <a href=\\\"#\\\">\\r\\n                <i class=\\\"icofont-youtube-play\\\"><\\/i>\\r\\n            <\\/a>\\r\\n        <\\/div>\\r\\n    <\\/div>\"},{\"title\":\"COMPANY\",\"size\":\"3\",\"content\":\"<ul>\\r\\n    <li><a href=\\\"#\\\">About Us<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Community Blog<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Rewards<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Work with Us<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Meet the Team<\\/a><\\/li>\\r\\n<\\/ul>\"},{\"title\":\"SUPPORT\",\"size\":\"3\",\"content\":\"<ul>\\r\\n    <li><a href=\\\"#\\\">Account<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Legal<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Contact<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Affiliate Program<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">Privacy Policy<\\/a><\\/li>\\r\\n<\\/ul>\"},{\"title\":\"SETTINGS\",\"size\":\"3\",\"content\":\"<ul>\\r\\n<li><a href=\\\"#\\\">Setting 1<\\/a><\\/li>\\r\\n<li><a href=\\\"#\\\">Setting 2<\\/a><\\/li>\\r\\n<\\/ul>\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(14,'list_widget_footer_ja','general','[{\"title\":\"\\u52a9\\u3051\\u304c\\u5fc5\\u8981\\uff1f\",\"size\":\"3\",\"content\":\"<div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            \\u304a\\u96fb\\u8a71\\u304f\\u3060\\u3055\\u3044\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            + 00 222 44 5678\\r\\n        <\\/div>\\r\\n    <\\/div>\\r\\n    <div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            \\u90f5\\u4fbf\\u7269\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            hello@yoursite.com\\r\\n        <\\/div>\\r\\n    <\\/div>\\r\\n    <div class=\\\"contact\\\">\\r\\n        <div class=\\\"c-title\\\">\\r\\n            \\u30d5\\u30a9\\u30ed\\u30fc\\u3059\\u308b\\r\\n        <\\/div>\\r\\n        <div class=\\\"sub\\\">\\r\\n            <a href=\\\"#\\\">\\r\\n                <i class=\\\"icofont-facebook\\\"><\\/i>\\r\\n            <\\/a>\\r\\n            <a href=\\\"#\\\">\\r\\n                <i class=\\\"icofont-twitter\\\"><\\/i>\\r\\n            <\\/a>\\r\\n            <a href=\\\"#\\\">\\r\\n                <i class=\\\"icofont-youtube-play\\\"><\\/i>\\r\\n            <\\/a>\\r\\n        <\\/div>\\r\\n    <\\/div>\"},{\"title\":\"\\u4f1a\\u793e\",\"size\":\"3\",\"content\":\"<ul>\\r\\n    <li><a href=\\\"#\\\">\\u7d04, \\u7565<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u30b3\\u30df\\u30e5\\u30cb\\u30c6\\u30a3\\u30d6\\u30ed\\u30b0<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u5831\\u916c<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u3068\\u9023\\u643a<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u30c1\\u30fc\\u30e0\\u306b\\u4f1a\\u3046<\\/a><\\/li>\\r\\n<\\/ul>\"},{\"title\":\"\\u30b5\\u30dd\\u30fc\\u30c8\",\"size\":\"3\",\"content\":\"<ul>\\r\\n    <li><a href=\\\"#\\\">\\u30a2\\u30ab\\u30a6\\u30f3\\u30c8<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u6cd5\\u7684<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u63a5\\u89e6<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u30a2\\u30d5\\u30a3\\u30ea\\u30a8\\u30a4\\u30c8\\u30d7\\u30ed\\u30b0\\u30e9\\u30e0<\\/a><\\/li>\\r\\n    <li><a href=\\\"#\\\">\\u500b\\u4eba\\u60c5\\u5831\\u4fdd\\u8b77\\u65b9\\u91dd<\\/a><\\/li>\\r\\n<\\/ul>\"},{\"title\":\"\\u8a2d\\u5b9a\",\"size\":\"3\",\"content\":\"<ul>\\r\\n<li><a href=\\\"#\\\">\\u8a2d\\u5b9a1<\\/a><\\/li>\\r\\n<li><a href=\\\"#\\\">\\u8a2d\\u5b9a2<\\/a><\\/li>\\r\\n<\\/ul>\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(15,'page_contact_title','general','We\'d love to hear from you',NULL,NULL,NULL,NULL,NULL,NULL),
(16,'page_contact_sub_title','general','Send us a message and we\'ll respond as soon as possible',NULL,NULL,NULL,NULL,NULL,NULL),
(17,'page_contact_desc','general','<!DOCTYPE html><html><head></head><body><h3>Booking Core</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>',NULL,NULL,NULL,NULL,NULL,NULL),
(18,'page_contact_image','general','9',NULL,NULL,NULL,NULL,NULL,NULL),
(19,'home_page_id','general','1',NULL,NULL,NULL,NULL,NULL,NULL),
(20,'page_contact_title','general','We\'d love to hear from you',NULL,NULL,NULL,NULL,NULL,NULL),
(21,'page_contact_title_ja','general','あなたからの御一報をお待ち',NULL,NULL,NULL,NULL,NULL,NULL),
(22,'page_contact_sub_title','general','Send us a message and we\'ll respond as soon as possible',NULL,NULL,NULL,NULL,NULL,NULL),
(23,'page_contact_sub_title_ja','general','私たちにメッセージを送ってください、私たちはできるだ',NULL,NULL,NULL,NULL,NULL,NULL),
(24,'page_contact_desc','general','<!DOCTYPE html><html><head></head><body><h3>Booking Core</h3><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>Tell. + 00 222 444 33</p><p>Email. hello@yoursite.com</p><p>1355 Market St, Suite 900San, Francisco, CA 94103 United States</p></body></html>',NULL,NULL,NULL,NULL,NULL,NULL),
(25,'page_contact_image','general','9',NULL,NULL,NULL,NULL,NULL,NULL),
(26,'currency_main','payment','usd',NULL,NULL,NULL,NULL,NULL,NULL),
(27,'currency_format','payment','left',NULL,NULL,NULL,NULL,NULL,NULL),
(28,'currency_decimal','payment',',',NULL,NULL,NULL,NULL,NULL,NULL),
(29,'currency_thousand','payment','.',NULL,NULL,NULL,NULL,NULL,NULL),
(30,'currency_no_decimal','payment','0',NULL,NULL,NULL,NULL,NULL,NULL),
(31,'extra_currency','payment','[{\"currency_main\":\"eur\",\"currency_format\":\"left\",\"currency_thousand\":\".\",\"currency_decimal\":\",\",\"currency_no_decimal\":\"2\",\"rate\":\"0.902807\"},{\"currency_main\":\"jpy\",\"currency_format\":\"right_space\",\"currency_thousand\":\".\",\"currency_decimal\":\",\",\"currency_no_decimal\":\"0\",\"rate\":\"0.00917113\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(32,'map_provider','advance','gmap',NULL,NULL,NULL,NULL,NULL,NULL),
(33,'map_gmap_key','advance','',NULL,NULL,NULL,NULL,NULL,NULL),
(34,'g_offline_payment_enable','payment','1',NULL,NULL,NULL,NULL,NULL,NULL),
(35,'g_offline_payment_name','payment','Offline Payment',NULL,NULL,NULL,NULL,NULL,NULL),
(36,'date_format','general','m/d/Y',NULL,NULL,NULL,NULL,NULL,NULL),
(37,'site_title','general','Booking Core',NULL,NULL,NULL,NULL,NULL,NULL),
(38,'site_timezone','general','UTC',NULL,NULL,NULL,NULL,NULL,NULL),
(39,'site_title','general','Booking Core',NULL,NULL,NULL,NULL,NULL,NULL),
(40,'email_header','general','<h1 class=\"site-title\" style=\"text-align: center\">Booking Core</h1>',NULL,NULL,NULL,NULL,NULL,NULL),
(41,'email_footer','general','<p class=\"\" style=\"text-align: center\">&copy; 2019 Booking Core. All rights reserved</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(42,'enable_mail_user_registered','user','1',NULL,NULL,NULL,NULL,NULL,NULL),
(43,'user_content_email_registered','user','<h1 style=\"text-align: center\">Welcome!</h1>\r\n                    <h3>Hello [first_name] [last_name]</h3>\r\n                    <p>Thank you for signing up with Booking Core! We hope you enjoy your time with us.</p>\r\n                    <p>Regards,</p>\r\n                    <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(44,'admin_enable_mail_user_registered','user','1',NULL,NULL,NULL,NULL,NULL,NULL),
(45,'admin_content_email_user_registered','user','<h3>Hello Administrator</h3>\r\n                    <p>We have new registration</p>\r\n                    <p>Full name: [first_name] [last_name]</p>\r\n                    <p>Email: [email]</p>\r\n                    <p>Regards,</p>\r\n                    <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(46,'user_content_email_forget_password','user','<h1>Hello!</h1>\r\n                    <p>You are receiving this email because we received a password reset request for your account.</p>\r\n                    <p style=\"text-align: center\">[button_reset_password]</p>\r\n                    <p>This password reset link expire in 60 minutes.</p>\r\n                    <p>If you did not request a password reset, no further action is required.\r\n                    </p>\r\n                    <p>Regards,</p>\r\n                    <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(47,'email_driver','email','log',NULL,NULL,NULL,NULL,NULL,NULL),
(48,'email_host','email','smtp.mailgun.org',NULL,NULL,NULL,NULL,NULL,NULL),
(49,'email_port','email','587',NULL,NULL,NULL,NULL,NULL,NULL),
(50,'email_encryption','email','tls',NULL,NULL,NULL,NULL,NULL,NULL),
(51,'email_username','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(52,'email_password','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(53,'email_mailgun_domain','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(54,'email_mailgun_secret','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(55,'email_mailgun_endpoint','email','api.mailgun.net',NULL,NULL,NULL,NULL,NULL,NULL),
(56,'email_postmark_token','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(57,'email_ses_key','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(58,'email_ses_secret','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(59,'email_ses_region','email','us-east-1',NULL,NULL,NULL,NULL,NULL,NULL),
(60,'email_sparkpost_secret','email','',NULL,NULL,NULL,NULL,NULL,NULL),
(61,'booking_enquiry_for_hotel','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(62,'booking_enquiry_for_tour','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(63,'booking_enquiry_for_space','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(64,'booking_enquiry_for_car','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(65,'booking_enquiry_for_event','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(66,'booking_enquiry_type','enquiry','booking_and_enquiry',NULL,NULL,NULL,NULL,NULL,NULL),
(67,'booking_enquiry_enable_mail_to_vendor','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(68,'booking_enquiry_mail_to_vendor_content','enquiry','<h3>Hello [vendor_name]</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>\r\n                            </div>',NULL,NULL,NULL,NULL,NULL,NULL),
(69,'booking_enquiry_enable_mail_to_admin','enquiry','1',NULL,NULL,NULL,NULL,NULL,NULL),
(70,'booking_enquiry_mail_to_admin_content','enquiry','<h3>Hello Administrator</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Vendor:[vendor_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(71,'vendor_enable','vendor','1',NULL,NULL,NULL,NULL,NULL,NULL),
(72,'vendor_commission_type','vendor','percent',NULL,NULL,NULL,NULL,NULL,NULL),
(73,'vendor_commission_amount','vendor','10',NULL,NULL,NULL,NULL,NULL,NULL),
(74,'vendor_role','vendor','1',NULL,NULL,NULL,NULL,NULL,NULL),
(75,'role_verify_fields','vendor','{\"phone\":{\"name\":\"Phone\",\"type\":\"text\",\"roles\":[\"1\",\"2\",\"3\"],\"required\":null,\"order\":null,\"icon\":\"fa fa-phone\"},\"id_card\":{\"name\":\"ID Card\",\"type\":\"file\",\"roles\":[\"1\",\"2\",\"3\"],\"required\":\"1\",\"order\":\"0\",\"icon\":\"fa fa-id-card\"},\"trade_license\":{\"name\":\"Trade License\",\"type\":\"multi_files\",\"roles\":[\"1\",\"3\"],\"required\":\"1\",\"order\":\"0\",\"icon\":\"fa fa-copyright\"}}',NULL,NULL,NULL,NULL,NULL,NULL),
(76,'enable_mail_vendor_registered','vendor','1',NULL,NULL,NULL,NULL,NULL,NULL),
(77,'vendor_content_email_registered','vendor','<h1 style=\"text-align: center;\">Welcome!</h1>\r\n                            <h3>Hello [first_name] [last_name]</h3>\r\n                            <p>Thank you for signing up with Booking Core! We hope you enjoy your time with us.</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(78,'admin_enable_mail_vendor_registered','vendor','1',NULL,NULL,NULL,NULL,NULL,NULL),
(79,'admin_content_email_vendor_registered','vendor','<h3>Hello Administrator</h3>\r\n                            <p>An user has been registered as Vendor. Please check the information bellow:</p>\r\n                            <p>Full name: [first_name] [last_name]</p>\r\n                            <p>Email: [email]</p>\r\n                            <p>Registration date: [created_at]</p>\r\n                            <p>You can approved the request here: [link_approved]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(80,'cookie_agreement_enable','advance','1',NULL,NULL,NULL,NULL,NULL,NULL),
(81,'cookie_agreement_button_text','advance','Got it',NULL,NULL,NULL,NULL,NULL,NULL),
(82,'cookie_agreement_content','advance','<p>This website requires cookies to provide all of its features. By using our website, you agree to our use of cookies. <a href=\'#\'>More info</a></p>',NULL,NULL,NULL,NULL,NULL,NULL),
(83,'logo_invoice_id','booking','8',NULL,NULL,NULL,NULL,NULL,NULL),
(84,'invoice_company_info','booking','<p><span style=\"font-size: 14pt;\"><strong>Booking Core Company</strong></span></p>\r\n                                <p>Ha Noi, Viet Nam</p>\r\n                                <p>www.bookingcore.org</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(85,'news_page_list_title','news','News',NULL,NULL,NULL,NULL,NULL,NULL),
(86,'news_page_list_banner','news','121',NULL,NULL,NULL,NULL,NULL,NULL),
(87,'news_sidebar','news','[{\"title\":null,\"content\":null,\"type\":\"search_form\"},{\"title\":\"About Us\",\"content\":\"Nam dapibus nisl vitae elit fringilla rutrum. Aenean sollicitudin, erat a elementum rutrum, neque sem pretium metus, quis mollis nisl nunc et massa\",\"type\":\"content_text\"},{\"title\":\"Recent News\",\"content\":null,\"type\":\"recent_news\"},{\"title\":\"Categories\",\"content\":null,\"type\":\"category\"},{\"title\":\"Tags\",\"content\":null,\"type\":\"tag\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(88,'site_locale','general','en',NULL,NULL,NULL,NULL,NULL,NULL),
(89,'site_enable_multi_lang','general','1',NULL,NULL,NULL,NULL,NULL,NULL),
(90,'enable_rtl_egy','general','1',NULL,NULL,NULL,NULL,NULL,NULL),
(91,'update_to_110',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:21','2021-01-05 09:47:21'),
(92,'update_to_120',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:22','2021-01-05 09:47:22'),
(93,'update_to_130',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:22','2021-01-05 09:47:22'),
(94,'update_to_140',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:23','2021-01-05 09:47:23'),
(95,'update_to_150',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:23','2021-01-05 09:47:23'),
(96,'update_to_151',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:25','2021-01-05 09:47:25'),
(97,'update_to_160',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:25','2021-01-05 09:47:25'),
(98,'tour_map_search_fields','tour','[{\"field\":\"location\",\"attr\":null,\"position\":\"1\"},{\"field\":\"category\",\"attr\":null,\"position\":\"2\"},{\"field\":\"date\",\"attr\":null,\"position\":\"3\"},{\"field\":\"price\",\"attr\":null,\"position\":\"4\"},{\"field\":\"advance\",\"attr\":null,\"position\":\"5\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(99,'tour_search_fields','tour','[{\"title\":\"Location\",\"field\":\"location\",\"size\":\"6\",\"position\":\"1\"},{\"title\":\"From - To\",\"field\":\"date\",\"size\":\"6\",\"position\":\"2\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(100,'space_search_fields','tour','[{\"title\":\"Location\",\"field\":\"location\",\"size\":\"4\",\"position\":\"1\"},{\"title\":\"From - To\",\"field\":\"date\",\"size\":\"4\",\"position\":\"2\"},{\"title\":\"Guests\",\"field\":\"guests\",\"size\":\"4\",\"position\":\"3\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(101,'hotel_search_fields','hotel','[{\"title\":\"Location\",\"field\":\"location\",\"size\":\"4\",\"position\":\"1\"},{\"title\":\"Check In - Out\",\"field\":\"date\",\"size\":\"4\",\"position\":\"2\"},{\"title\":\"Guests\",\"field\":\"guests\",\"size\":\"4\",\"position\":\"3\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(102,'car_search_fields','car','[{\"title\":\"Location\",\"field\":\"location\",\"size\":\"6\",\"position\":\"1\"},{\"title\":\"From - To\",\"field\":\"date\",\"size\":\"6\",\"position\":\"2\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(103,'booking_enquiry_enable_mail_to_vendor_content','enquiry','<h3>Hello [vendor_name]</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>\r\n                            </div>',NULL,NULL,NULL,NULL,NULL,NULL),
(104,'booking_enquiry_enable_mail_to_admin_content','enquiry','<h3>Hello Administrator</h3>\r\n                            <p>You get new inquiry request from [email]</p>\r\n                            <p>Name :[name]</p>\r\n                            <p>Emai:[email]</p>\r\n                            <p>Phone:[phone]</p>\r\n                            <p>Content:[note]</p>\r\n                            <p>Service:[service_link]</p>\r\n                            <p>Vendor:[vendor_link]</p>\r\n                            <p>Regards,</p>\r\n                            <p>Booking Core</p>',NULL,NULL,NULL,NULL,NULL,NULL),
(105,'update_to_170',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:27','2021-01-05 09:47:27'),
(106,'check_db_engine',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:27','2021-01-05 09:47:27'),
(107,'wallet_credit_exchange_rate',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:27','2021-01-05 09:47:27'),
(108,'wallet_deposit_rate',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(109,'wallet_deposit_type',NULL,'list',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(110,'wallet_deposit_lists',NULL,'[{\"name\":\"100$\",\"amount\":100,\"credit\":100},{\"name\":\"Bonus 10%\",\"amount\":500,\"credit\":550},{\"name\":\"Bonus 15%\",\"amount\":1000,\"credit\":1150}]',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(111,'wallet_new_deposit_admin_subject',NULL,'New credit purchase',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(112,'wallet_new_deposit_admin_content',NULL,'\r\n            <h1>Hello [first_name]!</h1>\r\n            <p>New order has been made:</p>\r\n            <p>User ID: [create_user]</p>\r\n            <p>Amount: [amount]</p>\r\n            <p>Credit: [credit]</p>\r\n            <p>Gateway: [payment_gateway]</p>\r\n            <p>Regards,<br>Booking Core</p>',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(113,'wallet_new_deposit_customer_subject',NULL,'Thank you for your purchasing',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(114,'wallet_new_deposit_customer_content',NULL,'\r\n            <h1>Hello [first_name]!</h1>\r\n            <p>New order has been made:</p>\r\n            <p>User ID: [create_user]</p>\r\n            <p>Amount: [amount]</p>\r\n            <p>Credit: [credit]</p>\r\n            <p>Gateway: [payment_gateway]</p>\r\n            <p>Regards,<br>Booking Core</p>',NULL,NULL,NULL,NULL,'2021-01-05 09:47:28','2021-01-05 09:47:28'),
(115,'wallet_update_deposit_admin_subject',NULL,'Credit purchase updated',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(116,'wallet_update_deposit_admin_content',NULL,'\r\n            <h1>Hello [first_name]!</h1>\r\n            <p>Order has been updated:</p>\r\n            <p>Order Status: <strong>[status_name]</strong></p>\r\n            <p>User ID: [create_user]</p>\r\n            <p>Amount: [amount]</p>\r\n            <p>Credit: [credit]</p>\r\n            <p>Gateway: [payment_gateway]</p>\r\n            <p>Regards,<br>Booking Core</p>',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(117,'wallet_update_deposit_customer_subject',NULL,'Your credit purchase updated',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(118,'wallet_update_deposit_customer_content',NULL,'\r\n            <h1>Hello [first_name]!</h1>\r\n            <p>Order has been updated:</p>\r\n            <p>Order Status: <strong>[status_name]</strong></p>\r\n            <p>User ID: [create_user]</p>\r\n            <p>Amount: [amount]</p>\r\n            <p>Credit: [credit]</p>\r\n            <p>Gateway: [payment_gateway]</p>\r\n            <p>Regards,<br>Booking Core</p>',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(119,'update_to_181',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(120,'update_to_182',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:29','2021-01-05 09:47:29'),
(121,'update_to_190',NULL,'1',NULL,NULL,NULL,NULL,'2021-01-05 09:47:35','2021-01-05 09:47:35'),
(122,'hotel_page_search_title','hotel','Search for hotel',NULL,NULL,NULL,NULL,NULL,NULL),
(123,'hotel_page_limit_item','hotel','9',NULL,NULL,NULL,NULL,NULL,NULL),
(124,'hotel_page_search_banner','hotel','92',NULL,NULL,NULL,NULL,NULL,NULL),
(125,'hotel_layout_item_search','hotel','list',NULL,NULL,NULL,NULL,NULL,NULL),
(126,'hotel_attribute_show_in_listing_page','hotel','2',NULL,NULL,NULL,NULL,NULL,NULL),
(127,'hotel_layout_search','hotel','normal',NULL,NULL,NULL,NULL,NULL,NULL),
(128,'hotel_enable_review','hotel','1',NULL,NULL,NULL,NULL,NULL,NULL),
(129,'hotel_review_approved','hotel','0',NULL,NULL,NULL,NULL,NULL,NULL),
(130,'hotel_review_stats','hotel','[{\"title\":\"Service\"},{\"title\":\"Organization\"},{\"title\":\"Friendliness\"},{\"title\":\"Area Expert\"},{\"title\":\"Safety\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(131,'hotel_booking_buyer_fees','hotel','[{\"name\":\"Service fee\",\"desc\":\"This helps us run our platform and offer services like 24\\/7 support on your trip.\",\"name_ja\":\"\\u30b5\\u30fc\\u30d3\\u30b9\\u6599\",\"desc_ja\":\"\\u3053\\u308c\\u306b\\u3088\\u308a\\u3001\\u5f53\\u793e\\u306e\\u30d7\\u30e9\\u30c3\\u30c8\\u30d5\\u30a9\\u30fc\\u30e0\\u3092\\u5b9f\\u884c\\u3057\\u3001\\u65c5\\u884c\\u4e2d\\u306b\",\"price\":\"100\",\"type\":\"one_time\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(132,'hotel_map_search_fields','hotel','[{\"field\":\"location\",\"attr\":null,\"position\":\"1\"},{\"field\":\"attr\",\"attr\":\"7\",\"position\":\"2\"},{\"field\":\"date\",\"attr\":null,\"position\":\"3\"},{\"field\":\"price\",\"attr\":null,\"position\":\"4\"},{\"field\":\"advance\",\"attr\":null,\"position\":\"5\"}]',NULL,NULL,NULL,NULL,NULL,NULL),
(133,'hotel_search_fields','hotel','[{\"title\":\"Location\",\"field\":\"location\",\"size\":\"4\",\"position\":\"1\"},{\"title\":\"Check In - Out\",\"field\":\"date\",\"size\":\"4\",\"position\":\"2\"},{\"title\":\"Guests\",\"field\":\"guests\",\"size\":\"4\",\"position\":\"3\"}]',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `core_subscribers` */

DROP TABLE IF EXISTS `core_subscribers`;

CREATE TABLE `core_subscribers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_subscribers` */

/*Table structure for table `core_tag_translations` */

DROP TABLE IF EXISTS `core_tag_translations`;

CREATE TABLE `core_tag_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_tag_translations_locale_index` (`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_tag_translations` */

/*Table structure for table `core_tags` */

DROP TABLE IF EXISTS `core_tags`;

CREATE TABLE `core_tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_tags` */

insert  into `core_tags`(`id`,`name`,`slug`,`content`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'park','park',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27'),
(2,'National park','national-park',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27'),
(3,'Moutain','moutain',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27'),
(4,'Travel','travel',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27'),
(5,'Summer','summer',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27'),
(6,'Walking','walking',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:27','2021-01-05 09:35:27');

/*Table structure for table `core_template_translations` */

DROP TABLE IF EXISTS `core_template_translations`;

CREATE TABLE `core_template_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` int(10) unsigned NOT NULL,
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `core_template_translations_locale_index` (`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_template_translations` */

insert  into `core_template_translations`(`id`,`origin_id`,`locale`,`title`,`content`,`create_user`,`update_user`,`created_at`,`updated_at`) values 
(1,1,'ja','Home Page','[{\"type\":\"form_search_all_service\",\"name\":\"Form Search All Service\",\"model\":{\"service_types\":[\"hotel\",\"space\",\"tour\",\"car\"],\"title\":\"こんにちは！\",\"sub_title\":\"どこに行きたい？\",\"bg_image\":16},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"offer_block\",\"name\":\"Offer Block\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"特別オファー\",\"desc\":\"最適なホテルを探す<br>\\n20,000以上の物件の価格<br>\\n上の最高の価格\",\"background_image\":17,\"link_title\":\"取引\",\"link_more\":\"#\",\"featured_text\":\"ホリデーセール\"},{\"_active\":true,\"title\":\"ニュースレター\",\"desc\":\"無料で参加して取得 <br>\\nに合わせたニュースレター<br>\\nホット旅行情報。\",\"background_image\":18,\"link_title\":\"サインアップ\",\"link_more\":\"/register\",\"featured_icon\":\"icofont-email\"},{\"_active\":true,\"title\":\"旅行のヒント\",\"desc\":\"旅行の専門家からのヒント <br>\\nあなたの次の<br>\\nより良い。\",\"background_image\":19,\"link_title\":\"サインアップ\",\"link_more\":\"/register\",\"featured_text\":null,\"featured_icon\":\"icofont-island-alt\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Hotel: List Items\",\"model\":{\"title\":\"ベストセラーリスト\",\"desc\":\"思慮深いデザインで高い評価を得ているホテル\",\"number\":4,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":[\"space\",\"hotel\",\"tour\"],\"title\":\"人気の目的地\",\"desc\":\"読者が\",\"number\":6,\"layout\":\"style_4\",\"order\":\"id\",\"order_by\":\"asc\",\"to_location_detail\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"最高のプロモーションツアー\",\"number\":6,\"style\":\"box_shadow\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"is_featured\":\"\",\"desc\":\"最も人気のある目的地\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_space\",\"name\":\"Space: List Items\",\"model\":{\"title\":\"賃貸物件\",\"desc\":\"思慮深いデザインで高い評価を受けている家\",\"number\":4,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_car\",\"name\":\"Car: List Items\",\"model\":{\"title\":\"Car Trending\",\"desc\":\"Book incredible things to do around the world.\",\"number\":8,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true},{\"type\": \"list_news\", \"name\": \"News: List Items\", \"model\": {\"title\": \"Read the latest from blog\", \"desc\": \"Contrary to popular belief\", \"number\": 6, \"category_id\": null, \"order\": \"id\", \"order_by\": \"asc\"}, \"component\": \"RegularBlock\", \"open\": true, \"is_container\": false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"あなたの街を知？\",\"sub_title\":\"3000以上の都市から2000人以上の地元民と\",\"link_title\":\"ローカルエ\",\"link_more\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"title\":\"私たちの幸せなクライアント\",\"list_item\":[{\"_active\":false,\"name\":\"Eva Hicks\",\"desc\":\"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美\",\"number_star\":5,\"avatar\":1},{\"_active\":false,\"name\":\"Donald Wolf\",\"desc\":\"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美\",\"number_star\":6,\"avatar\":2},{\"_active\":true,\"name\":\"Charlie Harrington\",\"desc\":\"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美\",\"number_star\":5,\"avatar\":3}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',1,NULL,'2021-01-05 09:35:24',NULL),
(2,2,'ja','Home Tour','[{\"type\":\"form_search_tour\",\"name\":\"Tour: Form Search\",\"model\":{\"title\":\"どこへ行くのが大好き\",\"sub_title\":\"世界中で信じられないようなことを予約しましょう。\",\"bg_image\":20},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"1,000+ ローカルガイド\",\"sub_title\":\"プロのツアーガイドとーガイドとーガイドと 験。 光の\",\"icon_image\":5},{\"_active\":true,\"title\":\"手作りの体験\",\"sub_title\":\"プロのツアーガイドとーガイドとーガイドと 験。 光の\",\"icon_image\":4},{\"_active\":true,\"title\":\"96% 幸せな旅行者\",\"sub_title\":\"プロのツアーガイドとーガイドとーガイドと 験。 光の\",\"icon_image\":6}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"トレンドツアー\",\"number\":5,\"style\":\"carousel\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"人気の目的地\",\"number\":5,\"order\":\"id\",\"order_by\":\"desc\",\"service_type\":\"tour\",\"desc\":\"\",\"layout\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"あなたが好きになるローカル体験\",\"number\":8,\"style\":\"normal\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"っていますか？\",\"sub_title\":\"3000以上の都市から2000人以上の地元民と1200人以上の貢献者に参加する\",\"link_title\":\"ローカルエ\",\"link_more\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"title\":\"私たちの幸せなクライアント\",\"list_item\":[{\"_active\":false,\"name\":\"Eva Hicks\",\"desc\":\"融づ苦佐とき百配ほづあ禁安テクミ真覧チヱフ行乗ぱたば外味ナ演庭コヲ旅見ヨコ優成コネ治確はろね訪来終島抄がん。\",\"number_star\":5,\"avatar\":1},{\"_active\":false,\"name\":\"Donald Wolf\",\"desc\":\"融づ苦佐とき百配ほづあ禁安テクミ真覧チヱフ行乗ぱたば外味ナ演庭コヲ旅見ヨコ優成コネ治確はろね訪来終島抄がん。\",\"number_star\":6,\"avatar\":2},{\"_active\":true,\"name\":\"Charlie Harrington\",\"desc\":\"右ずへやん間申ゃ投法けゃイ仙一もと政情ルた食的て代下ずせに丈律ルラモト聞探チト棋90績ム的社ず置攻景リフノケ内兼唱堅ゃフぼ。場ルアハ美\",\"number_star\":5,\"avatar\":3}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',1,NULL,'2021-01-05 09:35:24',NULL),
(3,3,'ja','Home Space','[{\"type\":\"form_search_space\",\"name\":\"Space: Form Search\",\"model\":{\"title\":\"次のレンタルを探す\",\"sub_title\":\"世界中で信じられないようなことを予約しましょう。\",\"bg_image\":61},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_space\",\"name\":\"Space: List Items\",\"model\":{\"title\":\"おすすめの家\",\"number\":5,\"style\":\"carousel\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"desc\":\"思慮深いデザインで高い評価を受けている家\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"space_term_featured_box\",\"name\":\"Space: Term Featured Box\",\"model\":{\"title\":\"ホームタイプを見つける\",\"desc\":\"これは、読者はその長い既成の事実であります\",\"term_space\":[\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":\"space\",\"title\":\"人気の目的地\",\"number\":6,\"order\":\"id\",\"order_by\":\"desc\",\"layout\":\"style_2\",\"desc\":\"これは、読者はその長い既成の事実であります\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_space\",\"name\":\"Space: List Items\",\"model\":{\"title\":\"賃貸物件\",\"desc\":\"思慮深いデザインで高い評価を受けている家\",\"number\":4,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"っていますか？\",\"sub_title\":\"3000以上の都市から2000人以上の地元民と1200人以上の貢献者に参加する\",\"link_title\":\"ローカルエ\",\"link_more\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',1,NULL,'2021-01-05 09:35:24',NULL),
(4,4,'ja','Home Hotel','[{\"type\":\"form_search_hotel\",\"name\":\"Hotel: Form Search\",\"model\":{\"title\":\"最適なホテルを探す\",\"sub_title\":\"20,000以上のプロパティで最高の価格を取得\",\"bg_image\":92},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"20,000以上のプロパティ\",\"sub_title\":\"これは飢饉は常にlobortis交流pede Suspendisseたです\",\"icon_image\":103,\"order\":null},{\"_active\":false,\"title\":\"信頼と安全性\",\"sub_title\":\"これは飢饉は常にlobortis交流pede Suspendisseたです\",\"icon_image\":104,\"order\":null},{\"_active\":false,\"title\":\"ベストプライス保証\",\"sub_title\":\"これは飢饉は常にlobortis交流pede Suspendisseたです\",\"icon_image\":105,\"order\":null}],\"style\":\"normal\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Hotel: List Items\",\"model\":{\"title\":\"直前予約\",\"desc\":\"思慮深いデザインで高い評価を得ているホテル\",\"number\":5,\"style\":\"carousel\",\"location_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":\"hotel\",\"title\":\"人気の目的地\",\"desc\":\"それは長い間確立された事実であり、\",\"number\":6,\"layout\":\"style_3\",\"order\":\"\",\"order_by\":\"\",\"to_location_detail\":false},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h2><span style=\\\"color: #1a2b48; font-family: Poppins, sans-serif; font-size: 28px; font-weight: 500; background-color: #ffffff;\\\">ローカルエキスパートになる理由</span></h2>\\n<div><span style=\\\"color: #5e6d77; font-family: Poppins, sans-serif; font-size: 10pt; background-color: #ffffff;\\\">様々な質量マエケナスとその格言不動産</span></div>\\n<div id=\\\"gtx-trans\\\" style=\\\"position: absolute; left: -118px; top: 55.8125px;\\\">\\n<div class=\\\"gtx-trans-icon\\\">&nbsp;</div>\\n</div>\",\"class\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"追加の収入を得る\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":15,\"order\":null},{\"_active\":false,\"title\":\"ネットワークを開く\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":14,\"order\":null},{\"_active\":false,\"title\":\"あなたの言語を練習する\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":13,\"order\":null}],\"style\":\"style3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Hotel: List Items\",\"model\":{\"title\":\"ベストセラーリスト\",\"desc\":\"思慮深いデザインで高い評価を得ているホテル\",\"number\":8,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',1,NULL,'2021-01-05 09:35:24',NULL);

/*Table structure for table `core_templates` */

DROP TABLE IF EXISTS `core_templates`;

CREATE TABLE `core_templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_templates` */

insert  into `core_templates`(`id`,`title`,`content`,`type_id`,`create_user`,`update_user`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'Home Page','[{\"type\":\"form_search_hotel\",\"name\":\"Job: Form Search\",\"model\":{\"title\":\"Lorem Ipsum is simply dummy text of the printing \",\"sub_title\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. \",\"style\":\"\",\"bg_image\":158,\"list_slider\":[]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Job: List Items\",\"model\":{\"title\":\"werwqrqw\",\"desc\":\"wrwqrwqrwq\",\"number\":12,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"\",\"desc\":\"\",\"number\":\"\",\"style\":\"\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"title\":\"\",\"list_item\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":\"\",\"style\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,1,NULL,NULL,'2021-01-05 09:35:24','2021-01-05 19:53:42'),
(2,'Home Tour','[{\"type\":\"form_search_tour\",\"name\":\"Tour: Form Search\",\"model\":{\"title\":\"Love where you\'re going\",\"sub_title\":\"Book incredible things to do around the world.\",\"bg_image\":20},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"1,000+ local guides\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":5},{\"_active\":false,\"title\":\"Handcrafted experiences\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":4},{\"_active\":false,\"title\":\"96% happy travelers\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":6}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"Trending Tours\",\"number\":5,\"style\":\"carousel\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"title\":\"Top Destinations\",\"number\":5,\"order\":\"id\",\"order_by\":\"desc\",\"service_type\":\"tour\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_tours\",\"name\":\"Tour: List Items\",\"model\":{\"title\":\"Local Experiences You’ll Love\",\"number\":8,\"style\":\"normal\",\"category_id\":\"\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"Know your city?\",\"sub_title\":\"Join 2000+ locals & 1200+ contributors from 3000 cities\",\"link_title\":\"Become Local Expert\",\"link_more\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"testimonial\",\"name\":\"List Testimonial\",\"model\":{\"title\":\"Our happy clients\",\"list_item\":[{\"_active\":false,\"name\":\"Eva Hicks\",\"desc\":\"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. \",\"number_star\":5,\"avatar\":1},{\"_active\":false,\"name\":\"Donald Wolf\",\"desc\":\"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui. \",\"number_star\":6,\"avatar\":2},{\"_active\":false,\"name\":\"Charlie Harrington\",\"desc\":\"Faucibus tristique felis potenti ultrices ornare rhoncus semper hac facilisi Rutrum tellus lorem sem velit nisi non pharetra in dui.\",\"number_star\":5,\"avatar\":3}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(3,'Home Space','[{\"type\":\"form_search_space\",\"name\":\"Space: Form Search\",\"model\":{\"title\":\"Find your next rental\",\"sub_title\":\"Book incredible things to do around the world.\",\"bg_image\":61},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_space\",\"name\":\"Space: List Items\",\"model\":{\"title\":\"Recommended Homes\",\"number\":5,\"style\":\"carousel\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"desc\":\"Homes highly rated for thoughtful design\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"space_term_featured_box\",\"name\":\"Space: Term Featured Box\",\"model\":{\"title\":\"Find a Home Type\",\"desc\":\"It is a long established fact that a reader\",\"term_space\":[\"26\",\"27\",\"28\",\"29\",\"30\",\"31\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":\"space\",\"title\":\"Top Destinations\",\"number\":6,\"order\":\"id\",\"order_by\":\"desc\",\"layout\":\"style_2\",\"desc\":\"It is a long established fact that a reader\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_space\",\"name\":\"Space: List Items\",\"model\":{\"title\":\" Rental Listing\",\"desc\":\"Homes highly rated for thoughtful design\",\"number\":4,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"call_to_action\",\"name\":\"Call To Action\",\"model\":{\"title\":\"Know your city?\",\"sub_title\":\"Join 2000+ locals & 1200+ contributors from 3000 cities\",\"link_title\":\"Become Local Expert\",\"link_more\":\"#\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(4,'Home Hotel','[{\"type\":\"form_search_hotel\",\"name\":\"Hotel: Form Search\",\"model\":{\"title\":\"Find Your Perfect Hotels\",\"sub_title\":\"Get the best prices on 20,000+ properties\",\"bg_image\":92},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"20,000+ properties\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":103,\"order\":null},{\"_active\":false,\"title\":\"Trust & Safety\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":104,\"order\":null},{\"_active\":true,\"title\":\"Best Price Guarantee\",\"sub_title\":\"Morbi semper fames lobortis ac hac penatibus\",\"icon_image\":105,\"order\":null}],\"style\":\"normal\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Hotel: List Items\",\"model\":{\"title\":\"Last Minute Deals\",\"desc\":\"Hotel highly rated for thoughtful design\",\"number\":5,\"style\":\"carousel\",\"location_id\":\"\",\"order\":\"\",\"order_by\":\"\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":\"hotel\",\"title\":\"Top Destinations\",\"desc\":\"It is a long established fact that a reader\",\"number\":6,\"layout\":\"style_3\",\"order\":\"\",\"order_by\":\"\",\"to_location_detail\":false},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h2><span style=\\\"color: #1a2b48; font-family: Poppins, sans-serif; font-size: 28px; font-weight: 500; background-color: #ffffff;\\\">Why be a Local Expert</span></h2>\\n<div><span style=\\\"color: #5e6d77; font-family: Poppins, sans-serif; font-size: 10pt; background-color: #ffffff;\\\">Varius massa maecenas et id dictumst mattis</span></div>\",\"class\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Earn an additional income\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":15,\"order\":null},{\"_active\":false,\"title\":\"Open your network\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":14,\"order\":null},{\"_active\":false,\"title\":\"Practice your language\",\"sub_title\":\"Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":13,\"order\":null}],\"style\":\"style3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_hotel\",\"name\":\"Hotel: List Items\",\"model\":{\"title\":\"Bestseller Listing\",\"desc\":\"Hotel highly rated for thoughtful design\",\"number\":8,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"asc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(5,'Become a vendor','[{\"type\":\"vendor_register_form\",\"name\":\"Vendor Register Form\",\"model\":{\"title\":\"Become a vendor\",\"desc\":\"Join our community to unlock your greatest asset and welcome paying guests into your home.\",\"youtube\":\"https://www.youtube.com/watch?v=AmZ0WrEaf34\",\"bg_image\":11},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h3><strong>How does it work?</strong></h3>\",\"class\":\"text-center\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Sign up\",\"sub_title\":\"Click edit button to change this text  to change this text\",\"icon_image\":null,\"order\":null},{\"_active\":false,\"title\":\" Add your services\",\"sub_title\":\" Click edit button to change this text  to change this text\",\"icon_image\":null,\"order\":null},{\"_active\":true,\"title\":\"Get bookings\",\"sub_title\":\" Click edit button to change this text  to change this text\",\"icon_image\":null,\"order\":null}],\"style\":\"style2\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"video_player\",\"name\":\"Video Player\",\"model\":{\"title\":\"Share the beauty of your city\",\"youtube\":\"https://www.youtube.com/watch?v=hHUbLv4ThOo\",\"bg_image\":12},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"text\",\"name\":\"Text\",\"model\":{\"content\":\"<h3><strong>Why be a Local Expert</strong></h3>\",\"class\":\"text-center ptb60\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":false,\"title\":\"Earn an additional income\",\"sub_title\":\" Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":15,\"order\":null},{\"_active\":true,\"title\":\"Open your network\",\"sub_title\":\" Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":14,\"order\":null},{\"_active\":true,\"title\":\"Practice your language\",\"sub_title\":\" Ut elit tellus, luctus nec ullamcorper mattis\",\"icon_image\":13,\"order\":null}],\"style\":\"style3\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"faqs\",\"name\":\"FAQ List\",\"model\":{\"title\":\"FAQs\",\"list_item\":[{\"_active\":false,\"title\":\"How will I receive my payment?\",\"sub_title\":\" Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\"},{\"_active\":true,\"title\":\"How do I upload products?\",\"sub_title\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\"},{\"_active\":true,\"title\":\"How do I update or extend my availabilities?\",\"sub_title\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\\n\"},{\"_active\":true,\"title\":\"How do I increase conversion rate?\",\"sub_title\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.\"}]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL),
(6,'Home Car','[{\"type\":\"form_search_car\",\"name\":\"Car: Form Search\",\"model\":{\"title\":\"Search Rental Car Deals\",\"sub_title\":\"Book better cars from local hosts across the US and around the world.\",\"bg_image\":122},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_featured_item\",\"name\":\"List Featured Item\",\"model\":{\"list_item\":[{\"_active\":true,\"title\":\"Free Cancellation\",\"sub_title\":\"Morbi semper fames lobortis ac\",\"icon_image\":103,\"order\":null},{\"_active\":true,\"title\":\"No Hidden Costs\",\"sub_title\":\"Morbi semper fames lobortis\",\"icon_image\":104,\"order\":null},{\"_active\":true,\"title\":\"24/7 Customer Care\",\"sub_title\":\"Morbi semper fames lobortis\",\"icon_image\":105,\"order\":null}],\"style\":\"normal\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"car_term_featured_box\",\"name\":\"Car: Term Featured Box\",\"model\":{\"title\":\"Browse by categories\",\"desc\":\"Book incredible things to do around the world.\",\"term_car\":[\"68\",\"67\",\"66\",\"65\",\"64\",\"63\",\"62\",\"61\"]},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_car\",\"name\":\"Car: List Items\",\"model\":{\"title\":\"Trending used cars\",\"desc\":\"Book incredible things to do around the world.\",\"number\":8,\"style\":\"normal\",\"location_id\":\"\",\"order\":\"id\",\"order_by\":\"desc\",\"is_featured\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"how_it_works\",\"name\":\"How It Works\",\"model\":{\"title\":\"How does it work?\",\"list_item\":[{\"_active\":false,\"title\":\"Find The Car\",\"sub_title\":\"Lorem Ipsum is simply dummy text of the printing\",\"icon_image\":132,\"order\":null},{\"_active\":false,\"title\":\"Book It\",\"sub_title\":\"Lorem Ipsum is simply dummy text of the printing\",\"icon_image\":133,\"order\":null},{\"_active\":false,\"title\":\"Grab And Go\",\"sub_title\":\"Lorem Ipsum is simply dummy text of the printing\",\"icon_image\":134,\"order\":null}],\"background_image\":131},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false},{\"type\":\"list_locations\",\"name\":\"List Locations\",\"model\":{\"service_type\":[\"car\"],\"title\":\"Top destinations\",\"desc\":\"Lorem Ipsum is simply dummy text of the printing\",\"number\":6,\"layout\":\"style_2\",\"order\":\"id\",\"order_by\":\"asc\",\"to_location_detail\":\"\"},\"component\":\"RegularBlock\",\"open\":true,\"is_container\":false}]',NULL,1,NULL,NULL,NULL,'2021-01-05 09:35:24',NULL);

/*Table structure for table `core_translations` */

DROP TABLE IF EXISTS `core_translations`;

CREATE TABLE `core_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `string` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `last_build_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_translations` */

/*Table structure for table `core_vendor_plan_meta` */

DROP TABLE IF EXISTS `core_vendor_plan_meta`;

CREATE TABLE `core_vendor_plan_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_plan_id` int(11) NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable` tinyint(4) DEFAULT NULL,
  `maximum_create` int(11) DEFAULT NULL,
  `auto_publish` tinyint(4) DEFAULT NULL,
  `commission` int(11) DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_vendor_plan_meta` */

/*Table structure for table `core_vendor_plans` */

DROP TABLE IF EXISTS `core_vendor_plans`;

CREATE TABLE `core_vendor_plans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_commission` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `create_user` bigint(20) DEFAULT NULL,
  `update_user` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `core_vendor_plans` */

/*Table structure for table `favorites` */

DROP TABLE IF EXISTS `favorites`;

CREATE TABLE `favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `favorites` */

/*Table structure for table `location_category` */

DROP TABLE IF EXISTS `location_category`;

CREATE TABLE `location_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT 0,
  `_rgt` int(10) unsigned NOT NULL DEFAULT 0,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `origin_id` bigint(20) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_category__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `location_category` */

insert  into `location_category`(`id`,`name`,`icon_class`,`content`,`slug`,`status`,`_lft`,`_rgt`,`parent_id`,`create_user`,`update_user`,`deleted_at`,`origin_id`,`lang`,`created_at`,`updated_at`) values 
(1,'Education','icofont-education',NULL,NULL,'publish',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'Health','fa fa-hospital-o',NULL,NULL,'publish',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'Transportation','fa fa-subway',NULL,NULL,'publish',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `location_category_translations` */

DROP TABLE IF EXISTS `location_category_translations`;

CREATE TABLE `location_category_translations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `origin_id` bigint(20) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location_category_translations_origin_id_locale_unique` (`origin_id`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `location_category_translations` */

/*Table structure for table `media_files` */

DROP TABLE IF EXISTS `media_files`;

CREATE TABLE `media_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_extension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `app_id` int(11) DEFAULT NULL,
  `app_user_id` int(11) DEFAULT NULL,
  `file_width` int(11) DEFAULT NULL,
  `file_height` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `media_files` */

insert  into `media_files`(`id`,`file_name`,`file_path`,`file_size`,`file_type`,`file_extension`,`create_user`,`update_user`,`deleted_at`,`app_id`,`app_user_id`,`file_width`,`file_height`,`created_at`,`updated_at`) values 
(1,'avatar','demo/general/avatar.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'avatar-2','demo/general/avatar-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'avatar-3','demo/general/avatar-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'ico_adventurous','demo/general/ico_adventurous.png',NULL,'image/png','png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,'ico_localguide','demo/general/ico_localguide.png',NULL,'image/png','png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,'ico_maps','demo/general/ico_maps.png',NULL,'image/png','png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,'ico_paymethod','demo/general/ico_paymethod.png',NULL,'image/png','png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,'logo','demo/general/logo.svg',NULL,'image/svg+xml','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'bg_contact','demo/general/bg-contact.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,'favicon','demo/general/favicon.png',NULL,'image/png','png',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'thumb-vendor-register','demo/general/thumb-vendor-register.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,'bg-video-vendor-register1','demo/general/bg-video-vendor-register1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,'ico_chat_1','demo/general/ico_chat_1.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,'ico_friendship_1','demo/general/ico_friendship_1.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,'ico_piggy-bank_1','demo/general/ico_piggy-bank_1.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,'home-mix','demo/general/home-mix.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,'image_home_mix_1','demo/general/image_home_mix_1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(18,'image_home_mix_2','demo/general/image_home_mix_2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(19,'image_home_mix_3','demo/general/image_home_mix_3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(20,'banner-search','demo/tour/banner-search.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(21,'tour-1','demo/tour/tour-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(22,'tour-2','demo/tour/tour-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(23,'tour-3','demo/tour/tour-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(24,'tour-4','demo/tour/tour-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(25,'tour-5','demo/tour/tour-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(26,'tour-6','demo/tour/tour-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(27,'tour-7','demo/tour/tour-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(28,'tour-8','demo/tour/tour-8.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(29,'tour-9','demo/tour/tour-9.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(30,'tour-10','demo/tour/tour-10.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(31,'tour-11','demo/tour/tour-11.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(32,'tour-12','demo/tour/tour-12.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(33,'tour-13','demo/tour/tour-13.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(34,'tour-14','demo/tour/tour-14.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(35,'tour-15','demo/tour/tour-15.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(36,'tour-16','demo/tour/tour-16.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(37,'gallery-1','demo/tour/gallery-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(38,'gallery-2','demo/tour/gallery-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(39,'gallery-3','demo/tour/gallery-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(40,'gallery-4','demo/tour/gallery-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(41,'gallery-5','demo/tour/gallery-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(42,'gallery-6','demo/tour/gallery-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(43,'gallery-7','demo/tour/gallery-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(44,'banner-tour-1','demo/tour/banner-detail/banner-tour-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(45,'banner-tour-2','demo/tour/banner-detail/banner-tour-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(46,'banner-tour-3','demo/tour/banner-detail/banner-tour-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(47,'banner-tour-4','demo/tour/banner-detail/banner-tour-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(48,'banner-tour-5','demo/tour/banner-detail/banner-tour-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(49,'banner-tour-6','demo/tour/banner-detail/banner-tour-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(50,'banner-tour-7','demo/tour/banner-detail/banner-tour-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(51,'banner-tour-8','demo/tour/banner-detail/banner-tour-8.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(52,'banner-tour-9','demo/tour/banner-detail/banner-tour-9.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(53,'banner-tour-10','demo/tour/banner-detail/banner-tour-10.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(54,'banner-tour-11','demo/tour/banner-detail/banner-tour-11.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(55,'banner-tour-12','demo/tour/banner-detail/banner-tour-12.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(56,'banner-tour-13','demo/tour/banner-detail/banner-tour-13.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(57,'banner-tour-14','demo/tour/banner-detail/banner-tour-14.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(58,'banner-tour-15','demo/tour/banner-detail/banner-tour-15.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(59,'banner-tour-16','demo/tour/banner-detail/banner-tour-16.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(60,'banner-tour-17','demo/tour/banner-detail/banner-tour-17.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(61,'banner-search-space','demo/space/banner-search-space.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(62,'banner-search-space-2','demo/space/banner-search-space-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(63,'space-1','demo/space/space-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(64,'space-2','demo/space/space-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(65,'space-3','demo/space/space-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(66,'space-4','demo/space/space-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(67,'space-5','demo/space/space-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(68,'space-6','demo/space/space-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(69,'space-7','demo/space/space-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(70,'space-8','demo/space/space-8.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(71,'space-9','demo/space/space-9.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(72,'space-10','demo/space/space-10.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(73,'space-11','demo/space/space-11.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(74,'space-12','demo/space/space-12.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(75,'space-13','demo/space/space-13.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(76,'space-gallery-1','demo/space/gallery/space-gallery-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(77,'space-gallery-2','demo/space/gallery/space-gallery-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(78,'space-gallery-3','demo/space/gallery/space-gallery-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(79,'space-gallery-4','demo/space/gallery/space-gallery-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(80,'space-gallery-5','demo/space/gallery/space-gallery-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(81,'space-gallery-6','demo/space/gallery/space-gallery-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(82,'space-gallery-7','demo/space/gallery/space-gallery-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(83,'space-single-1','demo/space/space-single-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(84,'space-single-2','demo/space/space-single-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(85,'space-single-3','demo/space/space-single-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(86,'icon-space-box-1','demo/space/featured-box/icon-space-box-1.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(87,'icon-space-box-2','demo/space/featured-box/icon-space-box-2.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(88,'icon-space-box-3','demo/space/featured-box/icon-space-box-3.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(89,'icon-space-box-4','demo/space/featured-box/icon-space-box-4.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(90,'icon-space-box-5','demo/space/featured-box/icon-space-box-5.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(91,'icon-space-box-6','demo/space/featured-box/icon-space-box-6.png',NULL,'image/png','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(92,'banner-search-hotel','demo/hotel/banner-search-hotel.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(93,'hotel-featured-1','demo/hotel/hotel-featured-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(94,'hotel-featured-2','demo/hotel/hotel-featured-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(95,'hotel-featured-3','demo/hotel/hotel-featured-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(96,'hotel-featured-4','demo/hotel/hotel-featured-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(97,'hotel-gallery-1','demo/hotel/gallery/hotel-gallery-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(98,'hotel-gallery-2','demo/hotel/gallery/hotel-gallery-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(99,'hotel-gallery-3','demo/hotel/gallery/hotel-gallery-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(100,'hotel-gallery-4','demo/hotel/gallery/hotel-gallery-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(101,'hotel-gallery-5','demo/hotel/gallery/hotel-gallery-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(102,'hotel-gallery-6','demo/hotel/gallery/hotel-gallery-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(103,'hotel-icon-1','demo/hotel/hotel-icon-1.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(104,'hotel-icon-2','demo/hotel/hotel-icon-2.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(105,'hotel-icon-3','demo/hotel/hotel-icon-3.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(106,'location-1','demo/location/location-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(107,'location-2','demo/location/location-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(108,'location-3','demo/location/location-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(109,'location-4','demo/location/location-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(110,'location-5','demo/location/location-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(111,'banner-location-1','demo/location/banner-detail/banner-location-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(112,'trip-idea-1','demo/location/trip-idea/trip-idea-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(113,'trip-idea-2','demo/location/trip-idea/trip-idea-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(114,'news-1','demo/news/news-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(115,'news-2','demo/news/news-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(116,'news-3','demo/news/news-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(117,'news-4','demo/news/news-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(118,'news-5','demo/news/news-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(119,'news-6','demo/news/news-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(120,'news-7','demo/news/news-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(121,'news-banner','demo/news/news-banner.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(122,'banner-search-car','demo/car/banner-search-car.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(123,'Convertibles','demo/car/terms/convertibles.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(124,'Coupes','demo/car/terms/couple.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(125,'Hatchbacks','demo/car/terms/hatchback.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(126,'Minivans','demo/car/terms/minivans.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(127,'Sedan','demo/car/terms/sedan.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(128,'SUVs','demo/car/terms/suv.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(129,'Trucks','demo/car/terms/trucks.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(130,'Wagons','demo/car/terms/wagons.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(131,'home-car-bg-1','demo/car/home-car-bg-1.png',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(132,'number-1','demo/car/number-1.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(133,'number-2','demo/car/number-2.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(134,'number-3','demo/car/number-3.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(135,'banner-car-single','demo/car/banner-single.jpg',NULL,'image/jpg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(136,'Airbag','demo/car/feature/Airbag.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(137,'FM Radio','demo/car/feature/Radio.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(138,'Sensor','demo/car/feature/Sensor.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(139,'Speed Km','demo/car/feature/Speed.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(140,'Steering Wheel','demo/car/feature/Steering.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(141,'Power Windows','demo/car/feature/Windows.svg',NULL,'image/svg','svg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(142,'car-1','demo/car/car-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(143,'car-2','demo/car/car-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(144,'car-3','demo/car/car-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(145,'car-4','demo/car/car-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(146,'car-5','demo/car/car-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(147,'car-6','demo/car/car-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(148,'car-7','demo/car/car-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(149,'car-8','demo/car/car-8.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(150,'car-9','demo/car/car-9.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(151,'car-10','demo/car/car-10.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(152,'car-11','demo/car/car-11.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(153,'car-12','demo/car/car-12.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(154,'car-gallery-1','demo/car/gallery-1.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(155,'car-gallery-2','demo/car/gallery-2.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(156,'car-gallery-3','demo/car/gallery-3.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(157,'car-gallery-4','demo/car/gallery-4.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(158,'car-gallery-5','demo/car/gallery-5.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(159,'car-gallery-6','demo/car/gallery-6.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(160,'car-gallery-7','demo/car/gallery-7.jpg',NULL,'image/jpeg','jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `messages` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2018_11_06_222923_create_transactions_table',1),
(4,'2018_11_07_192923_create_transfers_table',1),
(5,'2018_11_07_202152_update_transfers_table',1),
(6,'2018_11_15_124230_create_wallets_table',1),
(7,'2018_11_19_164609_update_transactions_table',1),
(8,'2018_11_20_133759_add_fee_transfers_table',1),
(9,'2018_11_22_131953_add_status_transfers_table',1),
(10,'2018_11_22_133438_drop_refund_transfers_table',1),
(11,'2019_03_13_174533_create_permission_tables',1),
(12,'2019_03_17_114820_create_table_core_pages',1),
(13,'2019_03_17_140539_create_media_files_table',1),
(14,'2019_03_20_072502_create_bravo_tours',1),
(15,'2019_03_20_081256_create_core_news_category_table',1),
(16,'2019_03_27_081940_create_core_setting_table',1),
(17,'2019_03_28_101009_create_bravo_booking_table',1),
(18,'2019_03_28_165911_create_booking_meta_table',1),
(19,'2019_03_29_093236_update_bookings_table',1),
(20,'2019_04_01_045229_create_user_meta_table',1),
(21,'2019_04_01_150630_create_menu_table',1),
(22,'2019_04_02_150630_create_core_news_table',1),
(23,'2019_04_03_073553_bravo_tour_category',1),
(24,'2019_04_03_080159_bravo_location',1),
(25,'2019_04_05_143248_create_core_templates_table',1),
(26,'2019_04_18_152537_create_bravo_tours_meta_table',1),
(27,'2019_05_07_085430_create_core_languages_table',1),
(28,'2019_05_07_085442_create_core_translations_table',1),
(29,'2019_05_13_111553_update_status_transfers_table',1),
(30,'2019_05_17_074008_create_bravo_review',1),
(31,'2019_05_17_074048_create_bravo_review_meta',1),
(32,'2019_05_17_113042_create_tour_attrs_table',1),
(33,'2019_05_21_084235_create_bravo_contact_table',1),
(34,'2019_05_28_152845_create_core_subscribers_table',1),
(35,'2019_06_17_142338_bravo_seo',1),
(36,'2019_06_25_103755_add_exchange_status_transfers_table',1),
(37,'2019_07_03_070406_update_from_1_0_to_1_1',1),
(38,'2019_07_08_075436_create_core_vendor_plans',1),
(39,'2019_07_08_083733_create_vendors_plan_payments',1),
(40,'2019_07_11_083501_update_from_110_to_120',1),
(41,'2019_07_29_184926_decimal_places_wallets_table',1),
(42,'2019_07_30_072809_create_space_table',1),
(43,'2019_07_30_072809_create_tour_dates_table',1),
(44,'2019_08_05_031018_create_core_vendor_plan_meta_table',1),
(45,'2019_08_09_163909_create_inbox_table',1),
(46,'2019_08_16_094354_update_from_120_to_130',1),
(47,'2019_08_20_162106_create_table_user_upgrade_requests',1),
(48,'2019_09_13_070650_update_from_130_to_140',1),
(49,'2019_09_20_072809_create_hotel_table',1),
(50,'2019_10_02_193759_add_discount_transfers_table',1),
(51,'2019_10_22_151319_create_car_table',1),
(52,'2019_10_22_151319_create_social_table',1),
(53,'2019_11_05_092516_update_from_140_to_150',1),
(54,'2019_11_18_085024_update_from_150_to_151',1),
(55,'2020_03_09_102753_update_from_151_to_160',1),
(56,'2020_04_02_150631_create_core_tags_table',1),
(57,'2020_04_05_101016_create_event_table',1),
(58,'2020_05_16_073120_update_from_160_to_170',1),
(59,'2020_11_16_191727_create_bravo_activities',1),
(60,'2020_11_16_191827_create_bravo_activity_category',1),
(61,'2020_11_16_191856_create_bravo_activity_meta',1),
(62,'2020_11_16_191932_create_bravo_activity_term',1),
(63,'2020_11_16_193347_create_bravo_activity_translations',1),
(64,'2020_11_16_193429_create_bravo_activity_category_translations',1),
(65,'2020_11_16_203237_create_activity_dates_table',1),
(66,'2020_11_16_235436_add_business_id_to_users_table',1),
(67,'2020_11_17_072809_create_accommodation_table',1),
(68,'2020_11_17_151319_create_boat_table',1),
(69,'2020_11_17_201016_create_sauna_table',1),
(70,'2021_04_02_150632_create_core_tag_new_table',1),
(71,'2019_09_22_192348_create_messages_table',2),
(72,'2019_10_16_211433_create_favorites_table',2),
(73,'2019_10_18_223259_add_avatar_to_users',2),
(74,'2019_10_20_211056_add_messenger_color_to_users',2),
(75,'2019_10_22_000539_add_dark_mode_to_users',2),
(76,'2019_10_25_214038_add_active_status_to_users',2),
(77,'2020_11_23_092238_create_notifications_table',2);

/*Table structure for table `notifications` */

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `notifications` */

insert  into `notifications`(`id`,`type`,`notifiable_type`,`notifiable_id`,`data`,`read_at`,`created_at`,`updated_at`) values 
('00bc0354-a66f-4d40-9195-d9dd21183d12','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"00bc0354-a66f-4d40-9195-d9dd21183d12\",\"for_admin\":1,\"notification\":{\"id\":19,\"event\":\"CreatedServicesEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/admin\\/module\\/job\\/edit\\/19\",\"type\":\"hotel\",\"message\":\"System Admin has created hotel dsadsad\"}}',NULL,'2021-01-05 18:31:55','2021-01-05 18:31:55'),
('51e81de9-c448-415a-887c-96d5b6a4803c','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"51e81de9-c448-415a-887c-96d5b6a4803c\",\"for_admin\":1,\"notification\":{\"id\":12,\"event\":\"CreatedServicesEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/public\\/admin\\/module\\/job\\/edit\\/12\",\"type\":\"hotel\",\"message\":\"System Admin has created hotel fsdfdsfsd\"}}',NULL,'2021-01-05 13:42:08','2021-01-05 13:42:08'),
('7dfb8e7e-9461-4345-bb86-27724a2df981','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"7dfb8e7e-9461-4345-bb86-27724a2df981\",\"for_admin\":1,\"notification\":{\"id\":20,\"event\":\"CreatedServicesEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/admin\\/module\\/job\\/edit\\/20\",\"type\":\"hotel\",\"message\":\"System Admin has created hotel sdsadsad\"}}',NULL,'2021-01-05 18:32:12','2021-01-05 18:32:12'),
('87b33d85-b524-49f8-ba38-73c7d819646f','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"87b33d85-b524-49f8-ba38-73c7d819646f\",\"for_admin\":1,\"notification\":{\"id\":4,\"event\":\"UpdatedServiceEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/admin\\/module\\/hotel?id=4\",\"type\":\"hotel\",\"message\":\"Redac Gateway Hotel was updated the draft status by System Admin\"}}',NULL,'2021-01-05 11:59:28','2021-01-05 11:59:28'),
('89e197c9-a556-408f-be47-b7bd6222aa14','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"89e197c9-a556-408f-be47-b7bd6222aa14\",\"for_admin\":1,\"notification\":{\"id\":12,\"event\":\"UpdatedServiceEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/public\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/public\\/admin\\/module\\/job?id=12\",\"type\":\"hotel\",\"message\":\"fsdfdsfsd was updated the publish status by System Admin\"}}',NULL,'2021-01-05 13:42:45','2021-01-05 13:42:45'),
('8b85ea7a-cda6-4c52-aa04-c70fe1064a64','App\\Notifications\\AdminChannelServices','App\\User',1,'{\"id\":\"8b85ea7a-cda6-4c52-aa04-c70fe1064a64\",\"for_admin\":1,\"notification\":{\"id\":13,\"event\":\"CreatedServicesEvent\",\"to\":\"admin\",\"name\":\"System Admin\",\"avatar\":\"http:\\/\\/localhost\\/images\\/avatar.png\",\"link\":\"http:\\/\\/localhost\\/admin\\/module\\/job\\/edit\\/13\",\"type\":\"hotel\",\"message\":\"System Admin has created hotel fsdfdsfsd\"}}',NULL,'2021-01-05 18:13:37','2021-01-05 18:13:37');

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `social_forums` */

DROP TABLE IF EXISTS `social_forums`;

CREATE TABLE `social_forums` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_forums` */

/*Table structure for table `social_group_user` */

DROP TABLE IF EXISTS `social_group_user`;

CREATE TABLE `social_group_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_group_user` */

/*Table structure for table `social_groups` */

DROP TABLE IF EXISTS `social_groups`;

CREATE TABLE `social_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_image` bigint(20) DEFAULT NULL,
  `banner_image` bigint(20) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_groups` */

/*Table structure for table `social_post_comments` */

DROP TABLE IF EXISTS `social_post_comments`;

CREATE TABLE `social_post_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `file_id` bigint(20) DEFAULT NULL,
  `file_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_post_comments` */

/*Table structure for table `social_posts` */

DROP TABLE IF EXISTS `social_posts`;

CREATE TABLE `social_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forum_id` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `file_id` bigint(20) DEFAULT NULL,
  `file_ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `comment_disabled_by` bigint(20) DEFAULT NULL,
  `privary` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privacy` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_posts` */

/*Table structure for table `social_user_follow` */

DROP TABLE IF EXISTS `social_user_follow`;

CREATE TABLE `social_user_follow` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_user` bigint(20) DEFAULT NULL,
  `to_user` bigint(20) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `social_user_follow` */

/*Table structure for table `user_meta` */

DROP TABLE IF EXISTS `user_meta`;

CREATE TABLE `user_meta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `val` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_meta` */

/*Table structure for table `user_transactions` */

DROP TABLE IF EXISTS `user_transactions`;

CREATE TABLE `user_transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint(20) unsigned NOT NULL,
  `wallet_id` bigint(20) unsigned DEFAULT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `payment_id` bigint(20) DEFAULT NULL,
  `booking_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_transactions_uuid_unique` (`uuid`),
  KEY `user_transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  KEY `user_transactions_type_index` (`type`),
  KEY `user_transactions_wallet_id_foreign` (`wallet_id`),
  CONSTRAINT `user_transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `user_wallets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_transactions` */

/*Table structure for table `user_transfers` */

DROP TABLE IF EXISTS `user_transfers`;

CREATE TABLE `user_transfers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `from_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) unsigned NOT NULL,
  `to_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) unsigned NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint(20) unsigned NOT NULL,
  `withdraw_id` bigint(20) unsigned NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_transfers_uuid_unique` (`uuid`),
  KEY `user_transfers_from_type_from_id_index` (`from_type`,`from_id`),
  KEY `user_transfers_to_type_to_id_index` (`to_type`,`to_id`),
  KEY `user_transfers_deposit_id_foreign` (`deposit_id`),
  KEY `user_transfers_withdraw_id_foreign` (`withdraw_id`),
  CONSTRAINT `user_transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `user_transactions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `user_transactions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_transfers` */

/*Table structure for table `user_upgrade_request` */

DROP TABLE IF EXISTS `user_upgrade_request`;

CREATE TABLE `user_upgrade_request` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_request` int(11) DEFAULT NULL,
  `approved_time` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_upgrade_request` */

/*Table structure for table `user_wallets` */

DROP TABLE IF EXISTS `user_wallets`;

CREATE TABLE `user_wallets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `holder_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(6) NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  KEY `user_wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  KEY `user_wallets_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_wallets` */

insert  into `user_wallets`(`id`,`holder_type`,`holder_id`,`name`,`slug`,`description`,`balance`,`decimal_places`,`created_at`,`updated_at`,`create_user`,`update_user`) values 
(1,'App\\User',1,'Default Wallet','default',NULL,0,2,'2021-01-05 11:37:48','2021-01-05 11:37:48',NULL,NULL);

/*Table structure for table `user_wishlist` */

DROP TABLE IF EXISTS `user_wishlist`;

CREATE TABLE `user_wishlist` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `object_model` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `user_wishlist` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` int(11) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `avatar_id` bigint(20) DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_user` int(11) DEFAULT NULL,
  `update_user` int(11) DEFAULT NULL,
  `vendor_commission_amount` int(11) DEFAULT NULL,
  `vendor_commission_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_gateway` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_guests` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_submit_status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` smallint(6) DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_user_name_unique` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`first_name`,`last_name`,`email`,`active_status`,`dark_mode`,`messenger_color`,`avatar`,`email_verified_at`,`password`,`address`,`address2`,`phone`,`birthday`,`city`,`state`,`country`,`zip_code`,`last_login_at`,`avatar_id`,`bio`,`status`,`create_user`,`update_user`,`vendor_commission_amount`,`vendor_commission_type`,`deleted_at`,`remember_token`,`created_at`,`updated_at`,`payment_gateway`,`total_guests`,`locale`,`business_id`,`business_name`,`verify_submit_status`,`is_verified`,`user_name`) values 
(1,'System Admin','System','Admin','admin@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$8lyR7xIc6/ACVKOwEjZrO.8g1h/nprkGvw.G7MVuWuUe4Nlg/Jx1m',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,'LoM93llUmT38ytVziYFNNDTlJnA6bzjBCXzadspcSlXr2kMVgBYtikQgU0zA','2021-01-05 09:35:15',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,'','Vendor','01','vendor1@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$6V/QaAWEU1wPM/yqKn3cju/Uo/8bpDM6SNtbc4It/KwVlz23swOq.',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'','Customer','01','customer1@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$ze8zqYHjcP5sWXIb3bu9C.yO1sPUoQeFZASZDCy7vXdVbRrSSOHuS',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'','Elise','Aarohi','Aarohi@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$R7cSyVYfuUDHyQl7kmDh1.atbrEb95jv2uKhjRmLuUAwCtSXkIRl.',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(5,'','Kaytlyn','Alvapriya','Alvapriya@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$HnuBgdptXhu118DqGZKcheFl4K0p44jG9hV.kmtrlG2WiqyCcGdse',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(6,'','Lynne','Victoria','Victoria@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$RqN8JsBlSWY2agP3EWesveysOQoD4N4lPZwD.xGw1qv0go9XAV5s2',NULL,NULL,'112 666 888',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(7,'','Do','Quan','quandq@gmail.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$KECNSQy34IAgWvvSqoeiAO.h2.Lx097ZL4v6ozj9IvFQnqnCA6bNa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:16',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(8,'','William','Diana','Diana@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$YHup4HYlWQFvb4R/xpJCqekocsRHwzaG0XsJbMLMVxLZdCbQAf8Fm',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(9,'','Sarah','Violet','Violet@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$D6Jc540ZOtl.bMxPt4ckXepymvfKKS3y1hWJp0xos0Q1.F0HKzx3m',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(10,'','Paul','Amora','Amora@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$SzPhJUQMl6GJsQWGcFNtUefl7cNUw7e.lYNOQyOH1Rn9ahkOUcPga',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(11,'','Richard','Davina','Davina@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$ue2wQ2mMjnSd9ob3SfZbEOsSCq9f6Tq0SWTvDx.PXeR54aOI6KYkG',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(12,'','Shushi','Yashashree','Yashashree@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$k2MVYQ/veJR.HKFmSnlmf.yTCmzoRaWl3nq6Tq3ekSXBVvVMaIWJW',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(13,'','Anne','Nami','Nami@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$PNMJu3IyBeZE6k7ei5.0..Mmdo/jbH7d33Dw513tJEfs8mZQYiLiq',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:17',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(14,'','Bush','Elise','Elise@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$FPgkxQ1w0RMG/7S70KMWyOmHBnidBhmtWqgOeuBnj/d13DSXTuW7G',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(15,'','Elizabeth','Norah','Norah@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$/CsuPsE3FnUiy3UdL6B5puxpPD0TdHMjIdOCO/fTiQsNtYHiK4z2K',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(16,'','James','Alia','Alia@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$kSRosCpD2ToRLB4RZobtaO7vA.fuFn3rnduWT9OexfPIdCru9AEEW',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(17,'','John','Dakshi','Dakshi@dev.com',0,0,'#2180f3','avatar.png',NULL,'$2y$10$K3WHQqqqgcvBEGmREFSdKeGqDsOWIH8Gi1ze9Ipa0pme/Lf9YTr8G',NULL,NULL,'888 999 777',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'We\'re designers who have fallen in love with creating spaces for others to reflect, reset, and create. We split our time between two deserts (the Mojave, and the Sonoran). We love the way the heat sinks into our bones, the vibrant sunsets, and the wildlife we get to call our neighbors.','publish',NULL,NULL,NULL,NULL,NULL,NULL,'2021-01-05 09:35:18',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `vendors_plan_payments` */

DROP TABLE IF EXISTS `vendors_plan_payments`;

CREATE TABLE `vendors_plan_payments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_gateway` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free_trial` int(11) NOT NULL,
  `price_per` enum('onetime','per_time') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'onetime',
  `price_unit` enum('day','month','year') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'day',
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `vendors_plan_payments` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
