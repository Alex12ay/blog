-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 19, 2024 at 09:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `articleId` int NOT NULL,
  `categorie_id` int DEFAULT NULL,
  `titre_article` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `texte_article` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `images` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`articleId`, `categorie_id`, `titre_article`, `texte_article`, `images`, `date`, `user_id`) VALUES
(3, 1, 'f40', 'voici une ferrari', 'upload\\ferarrif40.jpg', '2024-09-18 15:27:47', 1),
(4, 3, 'ford gt40', 'une ford gt40', 'upload\\automobile_prestige_et_collection-45.jpg', '2024-09-16 00:00:00', 12),
(16, 2, 'toyota', 'nouvelle toyota hybrid', 'upload\\toyota_22aygoxxlimitedsu1b_angularrear.webp', '2024-09-18 15:27:47', 13),
(44, 1, 'SF-2004', 'voiture championne du monde', 'upload\\Ferari_F2004_San_Marino_-_M5353-00007_4000x2677_crop_center.webp', '2024-09-18 15:27:47', 1),
(48, 7, 'honda', 'made in japan', 'upload\\fe z.jpg', '2024-09-18 15:27:47', 13),
(59, 5, 'R5', 'La petite compacte', 'upload\\sfe.jpg', '2024-09-18 15:27:47', 12),
(60, 9, 'citroen C2', 'Petite voiture', 'upload\\rg.jpg', '2024-09-18 15:27:47', 1),
(63, 10, 'BMW I5', 'Ca fait vroum vroum', 'upload\\P90522951-the-bmw-i5-edrive40-driving-10-2023-2247px.jpg', '2024-09-18 16:33:30', 1),
(68, 3, 'Ford Galaxy', 'Le nom est vieux', 'upload\\1280px-Ford_Galaxy_front_20080331.jpg', '2024-09-18 16:43:21', 12),
(102, 3, 'FIESTA', 'Ma voiture', 'upload/ford-fiesta-5-porte.webp', '2024-09-19 09:40:28', 1),
(105, 3, 'Fors Focus', 'Nouvelle Ford Focus', 'upload/ford-focus-2021-side-front.jpg', '2024-09-19 11:03:41', 15),
(109, 11, 'Peugeot 206', 'La mythique', 'upload/fefe.jpg', '2024-09-19 11:46:48', 15),
(110, 11, 'Peugeot 205', 'La championne des rallyes', 'upload/Sans titre.jpg', '2024-09-19 11:49:39', 15);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int NOT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom_categorie`) VALUES
(1, 'ferrari'),
(2, 'toyota'),
(3, 'ford'),
(5, 'Renault'),
(6, 'MERCEDES'),
(7, 'honda'),
(8, 'KIA'),
(9, 'Citroen'),
(10, 'BMW'),
(11, 'Peugeot');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `article_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `commentaire`, `article_id`, `user_id`, `date`) VALUES
(1, 'belle féfé', 3, 12, '2024-09-19 09:09:11'),
(2, 'une toyoyta quoi', 16, 1, '2024-09-19 09:09:11'),
(3, 'c\"est une ford rapide', 4, 13, '2024-09-19 09:09:11'),
(4, 'magnifique rouge', 3, 1, '2024-09-19 09:09:11'),
(9, 'mon père en a une', 3, 13, '2024-09-19 09:09:11'),
(10, 'J\'aime bien cette marque nippone', 48, 1, '2024-09-19 09:09:11'),
(11, 'First', 102, 15, '2024-09-19 09:15:10'),
(12, 'Ca avance pas', 60, 1, '2024-09-19 09:38:54'),
(13, 'ma maman elle l\'a cassé', 59, 1, '2024-09-19 09:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `pseudo`, `email`, `password`) VALUES
(1, 'alex', 'alexandre', 'dwwm', 'alex@alex.fr', '$2y$10$QttWFjEC3UzTDH76XLu80uZIBOIV2v5V7Utqk2Fgz5Ikj/2aU3kqq'),
(12, 'manon', 'manon', 'manon', 'manon@manon.fr', '$2y$10$lE0JYVCp23PvSRgo.TxEsubotrEO3JIinJSbmV/wBgx/mEiZj41aO'),
(13, 'ayden', 'ayden', 'ayden12', 'ayden@ayden.fr', '$2y$10$woFfqdn4RaMjYsKDYdo1kuxQmxQ.rlgHf8mgUWpkoQn5X0yJl4.ay'),
(14, 'paul', 'paul', 'paul', 'paul@paul.fr', '$2y$10$hEmhPWIk70s7j.JFGy7wfO.a4GB3ZlxLQzedGcC1R199kaTjmtjr2'),
(15, 'max', 'max', 'max', 'max@max.fr', '$2y$10$dJOugaRDFN0n3CkqZ0oLkOBeyXx.vMv/FS/apXWzGoyQglmgAPEq2'),
(16, 'sarah', 'sarah', 'sarah', 'sarah@sarah.fr', '$2y$10$mWNFzWQ0Amjfv6RTEdMZsOHiTxRrY7ssrougfSkdk1bW/rnrgyKJa'),
(18, 'emma', 'emma', 'emma', 'emma@emma.fr', '$2y$10$.XxqTypmP9aQ7t/Kl5ee.OnQJRBKwtxNU5uCaWCZ13WtnbK8qnDFu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`articleId`),
  ADD KEY `categorie` (`categorie_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `articleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`articleId`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
