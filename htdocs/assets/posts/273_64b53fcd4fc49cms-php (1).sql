-- Adminer 4.8.1 MySQL 8.0.33-0ubuntu0.22.04.2 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `action` text NOT NULL,
  `updation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `menu_id` varchar(512) NOT NULL,
  `menu_name` text NOT NULL,
  `menu_link` varchar(512) NOT NULL,
  `menu_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `menu` (`id`, `uid`, `menu_id`, `menu_name`, `menu_link`, `menu_create_time`) VALUES
(9,	274,	'c83dd800077f8d94272d4a839ffbb15a',	'Menu',	'Menu',	'2023-07-16 06:16:21'),
(17,	273,	'ecdf072b663b94bfddeefab94dbe3006',	'FirstMenu',	'https://google.com',	'2023-07-16 08:17:53');

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `page_id` varchar(512) NOT NULL,
  `page_name` text NOT NULL,
  `page_heading` text NOT NULL,
  `page_subheading` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `page_content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `page_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `post_id` varchar(512) NOT NULL,
  `post_image` varchar(512) NOT NULL,
  `post_name` text NOT NULL,
  `post_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `post_create_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `posts` (`id`, `uid`, `post_id`, `post_image`, `post_name`, `post_description`, `post_create_time`) VALUES
(1,	273,	'e7a17d02c348a87a9386fd493a9fd27a',	'',	'Post',	'Description',	'2023-07-17 07:19:58'),
(2,	273,	'951a366f629a3a8178e51ba167d7b084',	'Screenshot 2023-07-09 022710.png',	'Post',	'Description',	'2023-07-17 07:22:59'),
(3,	273,	'5e3177ec132914e54898d6fde1f96d0e',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a05c31207Screenshot 2023-07-09 022710.png',	'hfgdfd',	'gfdsdsa',	'2023-07-17 07:28:52'),
(4,	273,	'b9014eccb03b7ba1857116642de076af',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a131c0656Screenshot 2023-07-09 022710.png',	'hfgdfd',	'gfdsdsa',	'2023-07-17 07:32:25'),
(5,	273,	'33deb0baf32f426c7340a4469d108462',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a1432301cScreenshot 2023-07-09 022710.png',	'hfgdfd',	'gfdsdsa',	'2023-07-17 07:32:43'),
(6,	273,	'b70c7ad302394c2a536dfd503d7008c4',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a1768f2e1Screenshot 2023-07-09 022710.png',	'hfgdfd',	'gfdsdsa',	'2023-07-17 07:33:34'),
(7,	273,	'8d9f20b692a8e3962786e6118e0842ce',	'/home/umarfarooq/273_64b4a1cc49b56Screenshot 2023-07-09 022710.png',	'hfgdfd',	'gfdsdsa',	'2023-07-17 07:35:00'),
(8,	273,	'cae22f6dcfe2cfd1c9fc4e3b175befe1',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a1f8bd71eScreenshot 2023-07-09 022710.png',	'fdw',	'dwsq',	'2023-07-17 07:35:44'),
(9,	273,	'9834cdb73cbd24e8207d3b29c5e5cb00',	'/var/www/cms-php/htdocs/assets/posts/273_64b4a227878f6Screenshot 2023-07-09 022710.png',	'Post',	'Description',	'2023-07-17 07:36:31'),
(10,	273,	'd0965b9fa654532d51db1c3121237cf9',	'/home/umarfarooq/273_64b4a237f1513Screenshot 2023-07-09 022710.png',	'Post',	'Description',	'2023-07-17 07:36:47'),
(11,	273,	'4ede6d147a95f7aeff99fae956b16c10',	'/home/umarfarooq/273_64b4a24b04d19Screenshot 2023-07-09 022710.png',	'sasd',	'dsw',	'2023-07-17 07:37:07'),
(12,	273,	'd8309e80c49710c69788d7baf9bfbf3a',	'/home/umarfarooq/273_64b4a2553030eScreenshot 2023-07-09 022710.png',	'sasd',	'dsw',	'2023-07-17 07:37:17'),
(13,	273,	'2d365b314512dbcec09f986ec4310a18',	'/home/umarfarooq/273_64b4a25d7e4ebScreenshot 2023-07-09 022710.png',	'rhytgdf',	'hfgdfsds',	'2023-07-17 07:37:25');

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `product_id` varchar(512) NOT NULL,
  `product_image` varchar(512) NOT NULL,
  `product_name` text NOT NULL,
  `product_description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `product_create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `session_token` varchar(32) NOT NULL,
  `user_ip` varchar(20) NOT NULL,
  `login_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_agent` varchar(256) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `sessions` (`id`, `uid`, `username`, `session_token`, `user_ip`, `login_time`, `user_agent`) VALUES
(65,	265,	'umarfarooq',	'5e2b9fb78214e4d995e8a9cae5a5c4b2',	'172.18.128.1',	'2023-07-16 04:58:15',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(66,	265,	'umarfarooq',	'b9b20c52b3ec517ab7272304e32c82e4',	'172.18.128.1',	'2023-07-16 05:10:49',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(68,	274,	'farooq',	'332b4e9fa2f1b5598c29e23f9179114a',	'172.18.128.1',	'2023-07-16 06:14:06',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36'),
(77,	273,	'umarfarooq',	'4b964fe8e927fcc1709aad2cd879c775',	'172.18.128.1',	'2023-07-17 03:23:13',	'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` bigint NOT NULL,
  `password` varchar(512) NOT NULL,
  `reg_id` int NOT NULL,
  `signup_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `password`, `reg_id`, `signup_time`) VALUES
(273,	'Umar Farooq',	'umarfarooq',	'umar@example.com',	123456789,	'$2y$10$oK8QFigbzBRLpTIiKMvxguZ1YGbHgGUKqT.dgqhI/hoolHizpWOxy',	293,	'2023-07-16 06:11:42'),
(274,	'Farooq',	'farooq',	'farooq@example.com',	987654321,	'$2y$10$p9Ms9OEXBBjmNKQL8iQyCeLlfeAUvzokrDN.dfiufUsHLJS1Vwb3G',	8580,	'2023-07-16 06:13:54');

-- 2023-07-17 08:58:03
