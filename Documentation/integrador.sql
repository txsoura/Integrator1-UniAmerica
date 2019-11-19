-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 04:57 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integrador`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dispositivo`
--

INSERT INTO `dispositivo` (`id`, `tipo`, `curso`, `disponivel`) VALUES
(1, 'Tablet', 'Todos', 1),
(2, 'Notebook', 'Administração', 1),
(4, 'Tablet', 'Todos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_22_030042_dispositivo', 1),
(4, '2019_09_22_030113_requisicao', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requisicao`
--

CREATE TABLE `requisicao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aluno_id` bigint(20) UNSIGNED NOT NULL,
  `dispositivo_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisicao`
--

INSERT INTO `requisicao` (`id`, `aluno_id`, `dispositivo_id`, `estado`, `data`) VALUES
(1, 2, 1, 2, '2019-10-06 00:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato` bigint(20) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digital` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contato`, `foto`, `digital`, `endereco`, `estado`, `cidade`, `curso`, `nivel`) VALUES
(1, 'Marcelo', 'marcelo@uniamerica.br', '$2y$10$Lzkrvil9BAWsfSTaJ3jDROJqQBrCpAY0.Dbk57zAs1zrXBrOaIrgm', 994648635, '', '', 'Jardim America, Rua 663, 376', 'Paraná', 'Foz do Iguaçu', '', 0),
(2, 'jhgjhg', 'teste@t.c', '$2y$10$eLcDS3VDBpLhd78aWiSn8eUGzFuEtZnQ3imuxrRArQulF3zXT4qSG', 24534654, NULL, NULL, 'kjghjgkhjgjh', 'Estrangeiro', 'khgjhgfj', 'Administração', 1),
(3, 'teste', 'hkg@khg.c', '$2y$10$Nla/c/K5GDQGuRo5QJ2c6.mDPpVo8o0qHpgChPihpJi7IOcG7f8DK', 2435, NULL, NULL, 'gfbnghnhg', 'Paraná', 'fgfgf', 'Engenharia de Software', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requisicao`
--
ALTER TABLE `requisicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisicao_aluno_id_foreign` (`aluno_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contato_unique` (`contato`),
  ADD UNIQUE KEY `users_foto_unique` (`foto`),
  ADD UNIQUE KEY `users_digital_unique` (`digital`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispositivo`
--
ALTER TABLE `dispositivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requisicao`
--
ALTER TABLE `requisicao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requisicao`
--
ALTER TABLE `requisicao`
  ADD CONSTRAINT `requisicao_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
