-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 12:36 AM
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
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `user_id` int NOT NULL DEFAULT '1',
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_ajout` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `contenu`, `user_id`, `date_creation`, `date_ajout`) VALUES
(32, 'Never gonna give you up', 12, '2024-03-22 13:19:00', '2024-03-22 13:19:00'),
(33, 'Comment ça dans le film j\'aime pas les champignons ?', 22, '2024-03-22 13:19:34', '2024-03-22 13:19:34'),
(34, 'J\'aime aider les gens\r\n', 21, '2024-03-22 13:20:05', '2024-03-22 13:20:05'),
(35, 'Chou chou du Grand Masahiro Sakurai', 17, '2024-03-22 13:20:28', '2024-03-22 13:20:28'),
(36, 'Ce soir match de foot let\'s goo', 11, '2024-03-22 13:20:44', '2024-03-22 13:20:44'),
(37, 'Je bats Mewtwo easy', 19, '2024-03-22 13:21:03', '2024-03-22 13:21:03'),
(38, 'Avec mon beau taxiiii', 21, '2024-03-22 13:21:27', '2024-03-22 13:21:27'),
(39, 'Why is everyone still calling the app \'Twitter\' ?', 15, '2024-03-22 13:21:54', '2024-03-22 13:21:54'),
(40, 'The change cost me 44 billion', 15, '2024-03-22 13:22:17', '2024-03-22 13:22:17'),
(41, 'Never gonna let you down', 12, '2024-03-22 13:22:34', '2024-03-22 13:22:34'),
(42, 'Ridley mon meilleur pote qui m\'aide à me surpasser', 20, '2024-03-22 13:22:58', '2024-03-22 13:22:58'),
(43, 'So long Gay Bowser', 22, '2024-03-22 13:23:15', '2024-03-22 13:23:15'),
(44, 'Merci Sakurai, grâce à toi je suis l\'un des pire perso de Smash lol', 18, '2024-03-22 13:23:32', '2024-03-22 13:23:32'),
(45, 'changement de plan je viens de recevoir le bulletin du petit', 11, '2024-03-22 13:23:54', '2024-03-22 13:23:54'),
(46, 'Poyo :3', 17, '2024-03-22 13:24:09', '2024-03-22 13:24:09'),
(60, 'J\'ai l\'invincibilité de la mascotte', 19, '2024-03-22 15:03:54', '2024-03-22 15:03:54'),
(68, 'J\'aime aider les gens', 32, '2024-03-23 16:22:40', '2024-03-23 16:22:40'),
(69, 'So long Gay Bowser', 33, '2024-03-23 16:23:02', '2024-03-23 16:23:02'),
(70, 'Avec mon beau taxiiiii', 32, '2024-03-23 16:23:21', '2024-03-23 16:23:21'),
(71, 'Comment ça dans le film j\'aime pas les champignons ?', 33, '2024-03-23 16:23:47', '2024-03-23 16:23:47'),
(73, 'Je suis Québécois', 1, '2024-03-24 00:06:47', '2024-03-24 00:06:47'),
(74, 'coubeh', 1, '2024-03-24 00:07:04', '2024-03-24 00:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `createdAt`) VALUES
(1, 'citron', 'fraise', '123', '2024-03-20 14:49:18'),
(11, 'tondaron', 'tonpere@gmail.com', 'ouioui', '2024-03-20 16:20:01'),
(12, 'Yeet', 'Smudge.gmail.com', 'non', '2024-03-20 16:20:47'),
(15, 'Elon Musk', 'Tesla.SpaceX@gmail.com', 'Doge', '2024-03-21 16:42:06'),
(17, 'Kirby', 'Kirby.64@gmail.com', 'Planetpopsater', '2024-03-21 18:25:40'),
(18, 'Zelda', 'Zelda.hyrule@gmail.com', 'midona', '2024-03-21 18:27:10'),
(19, 'Pikachu', 'hyper.ball@gmail.com', 'Bourgpalette', '2024-03-21 18:35:54'),
(20, 'Samus', 'samus.aran@gmail.com', 'ridleymonami', '2024-03-21 19:09:34'),
(32, 'OuiOui', 'Beau.Taxi@gmail.com', 'TaxiJaune', '2024-03-23 17:20:50'),
(33, 'Mario ', 'SuperMario.64@gmail.com', 'Sonicjtmps', '2024-03-23 17:22:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
