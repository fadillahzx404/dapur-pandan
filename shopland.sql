-- Adminer 4.8.1 MySQL 8.0.30 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `banner_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `banners` (`id`, `banner_name`, `banner_image`, `created_at`, `updated_at`) VALUES
(5,	'Banner 1',	'images/banners/7q2VL7UVlAt91JfiSe3zC13HWgt11JICAujlY9rN.png',	'2024-01-23 09:15:35',	'2024-01-23 09:16:36'),
(6,	'Banner diskon 10',	'images/banners/Kpi2MZIQlmzihm5daha5d6fpyEl7HWOjHVPynM8q.png',	'2024-01-23 13:17:29',	'2024-01-23 13:17:29');

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `products_id` int NOT NULL,
  `users_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `category_products`;
CREATE TABLE `category_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `category_products` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1,	'Nas Ben',	'2023-10-25 10:10:31',	'2024-01-23 08:38:19'),
(2,	'Nas Box',	NULL,	'2024-01-23 08:43:49'),
(4,	'Kue',	'2024-01-23 13:18:02',	'2024-01-23 13:18:02');

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `image_products`;
CREATE TABLE `image_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `image_products` (`id`, `image_product`, `product_id`, `created_at`, `updated_at`) VALUES
(52,	'images/image_products/QztFNmNgZqAtlAf6whuVUz21lKMl9ard4HfZo2N8.jpg',	53,	'2024-01-23 08:43:05',	'2024-01-23 08:43:05'),
(53,	'images/image_products/Ew6JKcLc9KNKwsZ1efS5t3w7Lq8MR3idMokZpG33.jpg',	54,	'2024-01-23 08:45:44',	'2024-01-23 08:45:44'),
(54,	'images/image_products/X3n06GFYwkmInKHNxSOzVGP5TCLj1OrQTIgf0NSs.png',	55,	'2024-01-23 08:48:32',	'2024-01-23 08:48:32'),
(57,	'images/image_products/OERqF0b0T2CKaLlNmkEMyiSERftlhWcKJZf6S2ks.jpg',	52,	'2024-01-23 09:20:41',	'2024-01-23 09:20:41'),
(61,	'images/image_products/XKLsxdNtDJcEXasjoesjEF7PJrWeabsUgU4tVGJR.png',	56,	'2024-01-23 13:29:15',	'2024-01-23 13:29:15'),
(62,	'images/image_products/JZegNbx5yB3Q0vmuBbHGUJ8EWtOGLmAzLjhuJxsi.png',	56,	'2024-01-23 13:29:15',	'2024-01-23 13:29:15'),
(63,	'images/image_products/mWRoAjaqnT7NtyD39WpnmaZEZdjq6jVst6rW65OC.png',	56,	'2024-01-23 13:29:15',	'2024-01-23 13:29:15'),
(66,	'images/image_products/dWgeDF7yCSDsZCw46iOVl9slD3y1ZewV6Yac0y1b.png',	61,	'2024-01-26 04:07:14',	'2024-01-26 04:07:14');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'2023_10_19_091630_create_products_table',	2),
(6,	'2023_10_24_144302_add_level__users_tabl',	3),
(7,	'2023_10_24_153640_add_roles_field_to_users_tabl',	4),
(8,	'2023_10_25_092331_add_new_col_to_products_table',	5),
(9,	'2023_10_25_094121_create_reviews_table',	6),
(10,	'2023_10_25_094136_create_category_products_table',	6),
(11,	'2023_10_25_095051_add_new_col_to_products_table',	7),
(12,	'2023_10_26_085714_create_image_products_table',	8),
(13,	'2023_10_28_153053_create_banners_table',	9),
(14,	'2023_10_30_003121_create_carts_table',	10),
(15,	'2023_10_31_020645_add_column_quantity_on_carts_table',	11),
(16,	'2023_11_10_080346_create_payments_table',	12),
(17,	'2023_11_16_073402_create_payment_methods_table',	13),
(18,	'2023_11_19_020055_create_transaction_table_and_drop_payment_table',	14),
(19,	'2023_11_19_020635_add_column_on_transactions_table',	15),
(20,	'2023_11_19_021800_add_column_tax_on_transactions_table',	16),
(21,	'2023_11_19_022445_create_transaction_details_table',	17),
(22,	'2023_11_19_023102_add_column_order_id_on_transactions_table',	17),
(23,	'2023_11_19_170153_add_column_experied_pay_on_transactions_table',	18),
(24,	'2023_11_19_170813_2023_11_19_170153_add_column_experied_pay_on_transactions_table',	19),
(25,	'2023_11_20_142647_add_column_account_name_on_method_payment',	20),
(26,	'2023_11_20_145134_add_column_image_confirm_on_transaction_table',	21),
(27,	'2023_11_27_162006_add_photo_profile_on_users_table',	22);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('fadillahzx@gmail.com',	'$2y$10$htgLkyhMmyYA1h7g5O4O1uT1dyIOOcCNm58lsOFBw3RgkvaM4zMaG',	'2023-10-24 09:04:23');

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `payment_methods` (`id`, `method_name`, `account_name`, `account_number`, `created_at`, `updated_at`) VALUES
(1,	'BCA',	'Firmansyah',	44009901,	NULL,	'2023-11-16 01:43:39'),
(2,	'Mandiri',	'Firmansyah Syah',	124123123123,	'2023-11-16 01:18:12',	'2023-11-16 01:18:12'),
(5,	'BNI',	'Firman Hus',	1122334455,	'2023-11-16 01:45:42',	'2023-11-16 01:45:42'),
(6,	'Cimbiniaga',	'Firmansyah',	123456678,	'2023-11-20 11:25:46',	'2023-11-20 11:25:46'),
(7,	'Mandiri',	'Udinese',	123456212121,	'2024-01-23 13:21:44',	'2024-01-26 04:11:16');

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_product` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `total_rating` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `products` (`id`, `name_product`, `desc_product`, `created_at`, `updated_at`, `price`, `category_id`, `total_rating`) VALUES
(52,	'Nasi Bento Manado',	'• Nasi Putih\r\n• Ayam Woku\r\n• Bakwan Jagung \r\n• Tumis Acar Kuning\r\n• Sambal Dabu-Dabu\r\n• Lalapan',	'2024-01-23 08:41:42',	'2024-01-23 08:41:42',	25000,	1,	NULL),
(53,	'Nasi Bento Geprek Yogya',	'• Nasi Putih\r\n• Ayam Geprek\r\n• Tahu Cabe Garam\r\n• Sambal Geprek\r\n• Lalapan',	'2024-01-23 08:43:05',	'2024-01-23 08:43:05',	25000,	1,	NULL),
(54,	'Nasi Rendang Ayam Sepakat',	'• Nasi Putih\r\n• Rendang Ayam\r\n• Perkedel Kentang\r\n• Telur Dadar Iris\r\n• Daun Singkong\r\n• Kerupuk\r\n• Sambal Hijau \r\n• Serundeng\r\n• Buah',	'2024-01-23 08:45:44',	'2024-01-23 08:45:44',	35000,	2,	NULL),
(55,	'Nasi Rendang Sapi Sepakat',	'• Nasi Putih\r\n• Rendang Sapi\r\n• Perkedel Kentang\r\n• Telur Dadar Iris\r\n• Daun Singkong\r\n• Kerupuk\r\n• Sambal Hijau \r\n• Serundeng\r\n• Buah',	'2024-01-23 08:48:32',	'2024-01-23 08:48:32',	35000,	2,	NULL),
(56,	'Kue Bolu',	'Kue bolu ,,....',	'2024-01-23 13:19:01',	'2024-01-23 13:29:15',	10000,	1,	NULL),
(58,	'Sepatu 2',	'hello',	'2024-01-26 04:05:22',	'2024-01-26 04:05:22',	20000,	1,	NULL),
(59,	'Sepatu 3',	'hello',	'2024-01-26 04:05:31',	'2024-01-26 04:06:28',	20000,	1,	NULL),
(61,	'Sepatu 1',	'awaw',	'2024-01-26 04:07:14',	'2024-01-26 04:07:14',	12,	1,	NULL);

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `rating` int NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` int NOT NULL,
  `total_price` int NOT NULL,
  `transaction_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_id` int NOT NULL,
  `tax` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expired_time` time NOT NULL,
  `image_confirm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transactions` (`id`, `order_id`, `users_id`, `total_price`, `transaction_status`, `method_id`, `tax`, `created_at`, `updated_at`, `expired_time`, `image_confirm`) VALUES
(31,	'#CIPErODfm9',	3,	66600,	'Paid',	1,	6600,	'2024-01-23 09:31:37',	'2024-01-23 09:31:43',	'24:00:00',	'images/confirm_payment/0WfEYNCzWVlMReL12rRfhMiCVU8lOGIlQoxisQKR.png'),
(32,	'#m2wW6NHzNV',	3,	77700,	'Success',	1,	7700,	'2024-01-23 13:15:22',	'2024-01-23 13:22:30',	'24:00:00',	'images/confirm_payment/loygiR2O7vLXYwuNaswsSUxVFh8fjSnADB7s8M3N.jpg'),
(33,	'#gpwb8hQVi9',	3,	94350,	'Unpaid',	6,	9350,	'2024-01-23 13:43:56',	'2024-01-23 13:43:56',	'24:00:00',	NULL),
(34,	'#7vCqTVvZkV',	3,	0,	'Unpaid',	1,	0,	'2024-01-23 13:48:19',	'2024-01-23 13:48:19',	'24:00:00',	NULL);

DROP TABLE IF EXISTS `transactions_details`;
CREATE TABLE `transactions_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transaction_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `transactions_details` (`id`, `order_id`, `transaction_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(24,	'#CIPErODfm9',	31,	52,	1,	'2024-01-23 09:31:37',	'2024-01-23 09:31:37'),
(25,	'#CIPErODfm9',	31,	54,	1,	'2024-01-23 09:31:37',	'2024-01-23 09:31:37'),
(26,	'#m2wW6NHzNV',	32,	55,	2,	'2024-01-23 13:15:22',	'2024-01-23 13:15:22'),
(27,	'#gpwb8hQVi9',	33,	55,	1,	'2024-01-23 13:43:56',	'2024-01-23 13:43:56'),
(28,	'#gpwb8hQVi9',	33,	53,	2,	'2024-01-23 13:43:56',	'2024-01-23 13:43:56');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `photo_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `photo_profile`) VALUES
(2,	'admin nih',	'admin@gmail.com',	NULL,	'$2y$10$ROfbAYxm0TUTNks/lW7PGO8og14WRxrJL5QnkV.Uhyhv176VCDLc2',	NULL,	'2023-10-24 09:05:41',	'2024-01-23 08:34:35',	'ADMIN',	NULL),
(3,	'fadillah wahyu heryanto',	'fadillahzx404@gmail.com',	NULL,	'$2y$10$8fmZ3U/fmmzNDMZa7VPFmeJHK/mTFv0gRBKy50QcuFKLMD3XcVzaS',	NULL,	'2023-10-24 09:15:58',	'2023-10-24 09:15:58',	'USER',	NULL),
(4,	'wahyu',	'fadillahzx400@gmail.com',	NULL,	'$2y$10$MMW5Vn2DWo9JgKHZK.9Gye/XSh.XbuphIoCl3rqBK8kMyfiW8xdfa',	NULL,	'2023-10-30 03:52:20',	'2023-10-30 03:52:20',	'USER',	NULL),
(10,	'user1',	'user@gmail.com',	NULL,	'$2y$10$yhPa.n0AM9M71DA.cWvXfeD/ixIRK2e.28uTB5hUSsg87mKqYrg96',	NULL,	'2024-01-26 04:14:27',	'2024-01-26 04:16:37',	'USER',	NULL),
(13,	'hel',	'hel@gmail.com',	NULL,	'$2y$10$yVVTBbzUydr.02OqULzbC.HAdE//lPr9bulLkjmiyodoYjGTCrWUy',	NULL,	'2024-01-26 04:22:00',	'2024-01-26 04:22:00',	'USER',	NULL);

-- 2024-02-18 14:39:56
