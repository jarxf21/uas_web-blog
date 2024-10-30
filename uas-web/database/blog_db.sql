-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 05:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `views` int(11) DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `author`, `category_id`, `created_at`, `views`, `image_url`) VALUES
(1, 'teknologi bencana', 'test 123', 'fajarrr', 1, '2024-10-30 10:30:27', 6, 'https://cdnpro.eraspace.com/media/mageplaza/blog/post/a/r/artificialintelligence.jpg'),
(2, 'teknologi mantap', 'test 221', 'jarf', 1, '2024-10-30 11:06:13', 4, 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUTEhMVFRUXFxUZFhYYGBgWGBgaFxgWGBYYFxgYHSggGBslHRcVIjEhJikrLi4uFx8zODMtNygtLisBCgoKDg0OGxAQGy0lHyUtLS0tLS0tLS0vLS0tLS0tLS0tLS0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLS0tLS0tLf/AABEIALcBEwMBIgACEQEDEQH/'),
(3, 'teknologi bencana', 'test 123', 'fajarrr', 1, '2024-10-30 12:18:41', 0, 'https://cdnpro.eraspace.com/media/mageplaza/blog/post/a/r/artificialintelligence.jpg'),
(4, 'gaya hidup sehat', 'test', 'jarfff', 2, '2024-10-30 12:19:32', 2, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1635830348/attached_image/gaya-hidup-sehat-bisa-anda-mulai-sekarang-0-alodokter.jpg'),
(5, 'gaya hidup tidak sehat', 'test', 'jaref', 2, '2024-10-30 12:51:42', 2, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1610973203/attached_image/catat-ini-daftar-dan-menu-makanan-penambah-stamina-0-alodokter.jpg'),
(6, 'manfaat bawang merah', 'bawang', 'fajarrr', 2, '2024-10-30 14:39:01', 0, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1620032800/attached_image/selain-gurih-manfaat-bawang-merah-juga-banyak-0-alodokter.jpg'),
(7, '7 Manfaat Bawang Bombai bagi Kesehatan Tubuh', 'test', 'fajarrr', 2, '2024-10-30 14:39:42', 1, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1621837002/attached_image/berbagai-nutrisi-di-balik-manfaat-bombay-0-alodokter.jpg'),
(8, '6 Pantangan Makanan untuk Penderita Diabetes', 'gg', 'fajarrr', 2, '2024-10-30 14:41:22', 1, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1621304364/attached_image/perhatikan-apa-saja-pantangan-diabetes-0-alodokter.jpg'),
(9, 'Manfaat Gula Merah bagi Penderita Diabetes', 'gg', 'fajarrr', 2, '2024-10-30 14:42:11', 1, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1641654685/attached_image/manfaat-gula-merah-vs-gula-putih-bagi-penderita-diabetes-0-alodokter.jpg'),
(10, 'manfaat sayur', 'gg', 'fajarrr', 2, '2024-10-30 14:43:32', 0, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1646624023/attached_image/deretan-sayuran-penurun-kolesterol-yang-perlu-anda-ketahui-0-alodokter.jpg'),
(11, 'manfaat minyak jagung', 'gg', 'fajarrr', 2, '2024-10-30 14:44:04', 1, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1637634483/attached_image/kabar-baik-minyak-jagung-dapat-menurunkan-kolesterol-0-alodokter.jpg'),
(12, 'sehat1', '123', 'fajarrr', 2, '2024-10-30 14:59:43', 1, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1715331718/attached_image/5-manfaat-nanas-untuk-kolesterol-ini-bisa-lindungi-jantungmu-0-alodokter.jpg'),
(13, '7 Obat Kolesterol Tinggi yang Efektif Turunkan Kadar Kolesterol Jahat', 'gg', 'gg', 2, '2024-10-30 15:03:31', 4, 'https://res.cloudinary.com/dk0z4ums3/image/upload/v1707708774/attached_image/obat-kolesterol-tinggi-yang-efektif-turunkan-kadar-kolesterol-jahat-0-alodokter.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `trending`
--
ALTER TABLE `trending`
  ADD CONSTRAINT `trending_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trending_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
