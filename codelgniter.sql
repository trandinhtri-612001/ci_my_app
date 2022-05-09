-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 10:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codelgniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countInStock` int(50) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `countInStock`, `price`, `image`) VALUES
(40, 'Tinh dầu dưỡng ẩm cho tóc khô Hydra Oil', 'tinh dầu', 56, 700, '388757687hoc.png'),
(41, 'Kem xả khô Moisture giúp hồi phục tóc khô xơ', 'kem xả', 45, 300, '832878703a3.png'),
(42, 'Dầu gội K.Therapy Active chống rụng tóc', 'dầu gội', 78, 900, '1810788113rrrrr.png'),
(43, 'Kem K.Style tạo kiểu, tăng độ phồng', 'kem xả', 60, 400, '1444114102ert.png'),
(44, '50 Megumi Hair Essence', 'kem dưỡng', 45, 250, '326584621a4.png'),
(45, 'Volume And Growth Elixir Avocado & Coconut', 'kem dưỡng', 57, 300, '818991539a5.png'),
(46, 'Cica Peptide Anti-Hair Loss Derma Scalp TONIC', 'tinh dầu', 60, 600, '1708004782fghjf.png'),
(47, 'Morty Hair Growth', 'dầu dưỡng', 57, 400, '1283159535tyu.png'),
(48, 'Folligen Tonic', 'dầu dưỡng', 50, 275, '61122381a6.png'),
(49, 'Nước Dưỡng Tóc Tinh Dầu Bưởi', 'dầu dưỡng', 60, 367, '1968098946cb.jpg'),
(50, 'Vivifying Remedy - Sensitive Scalp', 'tinh dầu', 60, 333, '1542984136cdfg.jpg'),
(51, 'Energizing Superactive', 'tinh dầu', 78, 800, '595899972dfgh.jpg'),
(52, 'Haartonikum 3B', 'mọc tóc', 387, 900, '959853229vf.jpg'),
(53, 'Bumble and bumble surf foam wash shampoo', 'dầu dưỡng', 58, 600, '1820256572dfgttrtr.jpg'),
(54, 'Dầu dừa Desert essence coconut shampoo', 'dầu dưỡng', 578, 1000, '1493719538dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `date`, `password`) VALUES
(5, 'nguyen phong', 'nguenphong123rc@gmail.com', '085576609', '2001-05-20', 'Nguyenphong612001a@'),
(6, 'henry tran', 'trantri123rc@gmail.com', '0855788894', '2022-05-18', 'Trandinhtri612001a@iiiii'),
(7, 'long nguyen', 'LONG12121@gmail.com', '0855788894', '1999-05-24', 'Longngyen612001a@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
