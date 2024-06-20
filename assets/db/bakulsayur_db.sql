-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bakulsayur_db.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `uploaded_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` enum('yes','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bakulsayur_db.banner: ~4 rows (approximately)
INSERT INTO `banner` (`id`, `image`, `uploaded_at`, `is_active`) VALUES
	(1, '79615794.jpg', '2024-06-17 03:07:40', 'yes'),
	(2, '97039881.jpg', '2024-06-17 03:08:53', 'yes'),
	(3, '89644282.jpg', '2024-06-17 03:09:07', 'no'),
	(5, '6406eabc90e53.jpg', '2024-06-17 03:11:42', 'no');

-- Dumping structure for table bakulsayur_db.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_product` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.cart: ~6 rows (approximately)
INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
	(2, 6, 2, 1, 500000),
	(3, 6, 3, 3, 9000000),
	(13, 4, 3, 1, 75000),
	(18, 5, 3, 1, 75000),
	(19, 5, 7, 1, 45000),
	(20, 5, 2, 1, 500000);

-- Dumping structure for table bakulsayur_db.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.category: ~7 rows (approximately)
INSERT INTO `category` (`id`, `slug`, `title`) VALUES
	(1, 'sayuran', 'Sayuran'),
	(2, 'daging-sapi', 'Daging Sapi'),
	(3, 'daging-ayam', 'Daging Ayam'),
	(4, 'sayur-bayam', 'Bumbu Kuning aa'),
	(5, 'bumbu-merah', 'Bumbu Merah'),
	(7, 'aaaaa', 'aaaaa'),
	(8, 'test', 'test');

-- Dumping structure for table bakulsayur_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.orders: ~11 rows (approximately)
INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `status`) VALUES
	(1, 5, '2020-03-18', '520200318210456', 36000000, 'Hakim', 'Kampung Malang Kulon 1/38-A', '087855777360', 'paid'),
	(2, 5, '2020-03-19', '520200319181238', 500000, 'Jotaro Kujo', 'Western', '218838383', 'delivered'),
	(3, 5, '2020-03-24', '520200324223408', 3000000, 'Amir Muhammad Hakim', 'Kampung Malang Kulon 1/38-A', '087855777360', 'waiting'),
	(4, 5, '2024-06-14', '520240614164753', 695000, 'asda', 'asdasd', 'asdasd', 'paid'),
	(5, 5, '2024-06-14', '520240614231207', 75000, 'aaa', 'aaa', '324532', 'paid'),
	(6, 4, '2024-06-15', '420240615101111', 2575333, 'aaaaaaa', 'aaa', '111', 'waiting'),
	(7, 7, '2024-06-16', '720240616140357', 545000, 'ssss', 'sss', '111', 'waiting'),
	(8, 5, '2024-06-17', '520240617104345', 195000, 'mas d', 'wetan kali', '000', 'waiting'),
	(9, 5, '2024-06-17', '520240617113454', 500000, 'ddd', 'ddd', '222', 'waiting'),
	(10, 5, '2024-06-17', '520240617114428', 75000, 'zzz', 'zzz', '111', 'waiting'),
	(11, 7, '2024-06-17', '720240617115826', 195000, 'qqq', 'qqq', '1234545443', 'waiting');

-- Dumping structure for table bakulsayur_db.orders_confirm
CREATE TABLE IF NOT EXISTS `orders_confirm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_orders` int NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.orders_confirm: ~4 rows (approximately)
INSERT INTO `orders_confirm` (`id`, `id_orders`, `account_name`, `account_number`, `nominal`, `note`, `image`) VALUES
	(1, 1, 'Amir', '42424123333', 36000000, '-', '520200318210456-20200319173859.jpg'),
	(2, 2, 'Dio Brando', '344312321', 500000, 'Mantap kang', '520200319181238-20200319181447.jpg'),
	(3, 5, 'aaa', '111', 111, '-aaa', '520240614231207-20240614231253.jpg'),
	(4, 9, 'ddd', '222', 1000, '-ddd', '520240617113454-20240617113924.jpg');

-- Dumping structure for table bakulsayur_db.order_detail
CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_orders` int NOT NULL,
  `id_product` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.order_detail: ~19 rows (approximately)
INSERT INTO `order_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
	(1, 1, 4, 6, 30000000),
	(2, 1, 3, 2, 6000000),
	(3, 2, 2, 1, 500000),
	(4, 3, 3, 1, 3000000),
	(5, 4, 3, 1, 75000),
	(6, 4, 4, 1, 120000),
	(7, 4, 2, 1, 500000),
	(8, 5, 3, 1, 75000),
	(9, 6, 2, 5, 2500000),
	(10, 6, 5, 3, 333),
	(11, 6, 3, 1, 75000),
	(12, 7, 2, 1, 500000),
	(13, 7, 7, 1, 45000),
	(14, 8, 3, 1, 75000),
	(15, 8, 4, 1, 120000),
	(16, 9, 2, 1, 500000),
	(17, 10, 3, 1, 75000),
	(18, 11, 4, 1, 120000),
	(19, 11, 3, 1, 75000);

-- Dumping structure for table bakulsayur_db.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_category` int NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.product: ~7 rows (approximately)
INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `description`, `price`, `is_available`, `image`) VALUES
	(2, 3, 'daging-ayam', 'Daging Ayam', 'Daging ayam adalah pilihan utama bagi pecinta makanan yang mencari sumber protein berkualitas tinggi dengan cita rasa lezat dan tekstur yang lembut. Dipotong dari bagian terbaik ayam, daging ini memiliki serat halus dan kaya akan protein, zat besi, dan nu', 500000, 1, 'daging-ayam-20240613001223.jpg'),
	(3, 3, 'daging-ayam-kampung', 'Daging Ayam Kampung', 'Dengan daging yang lebih kaya dan beraroma alami, ayam kampung menjadi pilihan utama bagi pecinta masakan yang menghargai kualitas dan kebersihan. Diperkaya dengan protein tinggi, rendah lemak jenuh, dan kaya akan nutrisi, produk ayam kampung kami menawar', 75000, 1, 'daging-ayam-kampung-20240613001411.jpg'),
	(4, 2, 'daging-sapi', 'Daging Sapi', 'Daging sapi kami memiliki tekstur yang lembut dan cita rasa yang khas, menjadikannya pilihan utama bagi mereka yang menghargai cita rasa autentik dan kualitas superior. Dipenuhi dengan protein berkualitas tinggi, zat besi, dan nutrisi penting lainnya, dag', 120000, 1, 'daging-sapi-20240613001458.jpg'),
	(5, 1, 'sayur-kol', 'sayur kol', 'sayur mantap', 5000, 1, 'sayuran-kol-20240613001528.jpg'),
	(6, 1, '', 'Sayur Bayam', 'Sayur Bayam nih bos', 7000, 1, '20230605-image-650x460px-bayam2.jpg'),
	(7, 4, 'bumbu-ayam-kuning', 'Bumbu Ayam Kuning', 'Bumbu Ayam Kuning', 45000, 1, 'bumbu-dasar-kuning-dan-tips-agar-awet-foto-resep-utama.jpg'),
	(8, 5, 'cabai', 'Cabai', 'cabai murah', 45000, 1, '6406eabc90e53.jpg');

-- Dumping structure for table bakulsayur_db.promo
CREATE TABLE IF NOT EXISTS `promo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` enum('yes','no') DEFAULT 'no',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bakulsayur_db.promo: ~1 rows (approximately)
INSERT INTO `promo` (`id`, `title`, `description`, `image`, `discount`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`, `category_id`) VALUES
	(1, 'AAA', 'aaa', '6406eabc90e53.jpg', 20.00, '2024-06-17', '2024-06-19', 'yes', '2024-06-17 03:40:53', '2024-06-17 03:40:53', 5);

-- Dumping structure for table bakulsayur_db.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table bakulsayur_db.user: ~4 rows (approximately)
INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`, `is_active`, `image`) VALUES
	(4, 'Admin', 'admin@admin.com', '$2y$10$mLyToNOtVeLG.ziTUFPpCOOGD1P8cXZJj6ufU7J74TB63qVs2JjqK', 'admin', 1, 'admin-20240615211502.png'),
	(5, 'Member', 'member@member.com', '$2y$10$ghbQkKwENFZnOxWAwtgSaeDV2gcI63ZorQEQkSxqlaUlrFUMNnLpy', 'member', 1, 'member-20200315232137.png'),
	(6, 'dhika', 'dhika@gmail.com', '$2y$10$Ike2ZlxEyhblvTeMUpkmDOUHlqxDU.o0C28U3WPGZ1XYcV4yUt9Aq', 'member', 1, NULL),
	(7, 'user1', 'user1@gmail.com', '$2y$10$eq584YVRqg25ZWIdp4BaqOf7Kyii1a17KVHXOM9OQk4/WUxrx16Km', 'member', 1, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
