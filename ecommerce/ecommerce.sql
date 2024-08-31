-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/08/2024 às 23:02
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `products`
--

INSERT INTO `products` (`id`, `name`, `price`) VALUES
(6, 'car', 19.00),
(8, 'carro', 13000.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Lucca Prisco Chicarini Doria', 'doria.lucca@gmail.com', '$2y$10$kQSZNggw32YSgIP9J57HBuFmHi2NaPVSgy5Y07MziVIbUeVwuTDmK'),
(2, 'doria.lucca@gmail.com', 'doria.lucca@gmail.com', '$2y$10$FE7XEYBMw7waBq6qzLtNse1z3ls1RRe3wzvA9ZbR9OexRhqHuJaJG'),
(3, 'Carol', 'Carolina@gmail.com', '$2y$10$icX.4vnzcFsUKZCGWajduegiEWSwDNl9E1vzfbg/P5T5VD/rMfSJq'),
(4, 'Lara', 'lara@gmail.com', '$2y$10$OJAgVgZFCqFHTBA.HzAWruhQt/T1qknVRCUUtf7KJfeIIBnnUk86y'),
(5, 'aaaaaa', 'doria.lucca@gmail.com', '$2y$10$Fkw7QYWzJTWg9gjMMo4nXeN4CxQY7lYHq/N4ognbijDKRwwGXihay'),
(6, 'aaaaaa', 'doria.lucca@gmail.com', '$2y$10$eiaLXPHNqkmRPu/prGEsjeRwUm/1OOXd28YZE/jSGhmlvoGsYMRzO'),
(7, 'aaaa', 'doria.lucca@gmail.com', '$2y$10$TqAnojfhSLpg8Bxh2AEI9u3Pug2ppYu7eYMqooOPFtwQ1GO2/CsE2'),
(8, 'aaaa', 'doria.lucca@gmail.com', '$2y$10$gNyLCOoXl8rXQRaK3lDoUObBge5WbEA28DQ202XbbFAtiIf2HE3d.'),
(9, 'aa', 'doria.lucca@gmail.com', '$2y$10$.xgOY.p.mt/jsAxC02lz0e68udiyub0TyWS/E/bOZ/S/JJaY8vF02'),
(10, 'aa', 'doria.lucca@gmail.com', '$2y$10$/aIU95pvnZ3j/CvX1HfNeeGM/5mXLlodWfY/LOKAYM9Eham81EYeq'),
(13, 'Vanessa', 'Vanessa@gmail.com', '$2y$10$i2UYhMkDCgGbeVxVHqwVs.WbKQFd8IY4vZLVLDxIglfLVIF12IKSO'),
(14, 'Vanessa', 'Vanessa@gmail.com', '$2y$10$H6Q.ytiI7TXjRzNuvKdKFutcSVbcrNEqspwMsIaAMXHKZLTAcOoiy'),
(15, 'Vanessa', 'Vanessa@gmail.com', '$2y$10$L0keF2WyDvd61fO8OlHqMuZdx7jr.C8ZGOP5b1hw.Sgz86xfGQQ0q'),
(16, 'Prisco', 'Prisco@gmail.com', '$2y$10$ScQwOnnQeQ338ak3BqBCQeGFNe.KNInBbkxZoWoWREm4E3ecbrfqu');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
