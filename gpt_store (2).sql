-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2024 at 11:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpt_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Shpat Kryeziu', 'shpatkryeziu8@gmail.com', 'Chatbot Not workingg', 'testtststst'),
(2, 'Shpat Kryeziu', 'shpatkryeziu8@gmail.com', 'Chatbot Not workingg', 'testtststst');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `model_description` varchar(255) NOT NULL,
  `model_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model_name`, `model_description`, `model_image`) VALUES
(3, 'GPT-5.5', 'Experience next-level AI with GPT 5.5, delivering enhanced language understanding and faster response times. Perfect for creative writing, data insights, and conversational tasks with precision and clarity.', 'images/model_67438fdce87cb7.82428221.png'),
(4, 'GPT-6.0', 'Elevate your productivity with GPT 6.0, designed for unmatched versatility and accuracy. Whether brainstorming ideas or solving complex queries, this model sets a new standard for AI-powered assistance.', 'images/model_674390615267c7.86752745.png'),
(5, 'GPT-6.5', 'Redefine innovation with GPT 6.5, offering cutting-edge performance and deep contextual understanding. Ideal for advanced applications, it ensures seamless and intelligent interactions every time.', 'images/model_67439082cc7802.26733706.png'),
(8, 'Speedster 4o-mini', 'Compact yet powerful, the Speedster 4o-Mini delivers lightning-fast processing and seamless multitasking. Designed for efficiency on the go, it\'s the perfect tool for dynamic and fast-paced environments.', 'images/model_6743a030b21301.47191260.png'),
(9, 'Shadow++', 'Unleash stealthy performance with Shadow++, combining advanced AI capabilities with unmatched precision. Ideal for complex problem-solving, it excels in delivering sharp, accurate results with minimal effort.', 'images/model_6743a16d28d597.21308666.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `username`) VALUES
(4, 'shpati.kryeziu@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', ''),
(5, 'almakamberi@gmail.com', '$2y$10$CwRnaSsUZYzIQK1Q8eZi8.IgxUBwJPlfvBXmv4TlHVrV32EhUNtla', 'user', 'dsadasd'),
(6, 'almakamberi@gmail.com', '$2y$10$n6VferqDg73wkoUGy0NyNeDwIhExtGl3c.O/tqOwu/DFC..aO0ZqW', 'user', 'drinselimi'),
(7, 'almakamberi@gmail.com', '$2y$10$OjwYds1vFlkCduXk9Do5fO89qYQ5XCUB3tGIcQSyPT10dWuvFeFoK', 'user', 'drinselimi222'),
(8, 'almakamberi@gmail.com', '$2y$10$3VbfRszRPm43PNHYa26KeeaEyvNFuGh3L7yG3vOw/o5MDbXt39Vqy', 'user', 'drinselimi222qqqq'),
(9, 'test2@gmail.com', '$2y$10$MHg9lqXGjFkZ/1u6Uw4C/.HqEwFuX0huZQS2Th1Ff5JJzlHbGDoMy', 'user', 'test2'),
(10, 'testt@gmail.com', '$2y$10$1fRBYaYiCwX3we0CL5D0g.Dc2fFhB55MsjvCo3EVYbLh/qh5tnymG', 'user', 'test3'),
(11, 'diari@gmail.com', '$2y$10$lbH0NTDnJeUNmyqFmoEgT.N2s1yHttl10oabptoki/vp0OaloOb16', 'user', 'diari'),
(12, 'admin@gmail.com', '$2y$10$mt/HgQWL7LQOUOUWtNsk9.Fk3SNhYo8RQLtxkEjsO/7XwkKAwogZK', 'admin', 'admin'),
(13, 'blerta@gmail.com', '$2y$10$FHuvLkMYhf6xSJW30Mj7XOzLyYuT4I6aPuuPMM8shLen6UYS8FQyi', 'user', 'blerta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
