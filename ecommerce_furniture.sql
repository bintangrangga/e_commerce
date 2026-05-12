-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 09:33 AM
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
-- Database: `ecommerce_furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_order` date DEFAULT NULL,
  `status` enum('berhasil','tidak berhasil') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_product`, `id_user`, `jumlah`, `tanggal_order`, `status`) VALUES
(33, 6, 7, 1, '2025-07-15', NULL),
(37, 7, 8, 1, '2025-07-17', NULL),
(38, 5, 8, 1, '2025-07-17', NULL),
(39, 1, 13, 1, '2025-11-19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `nama_product` varchar(50) NOT NULL,
  `harga_product` int(11) NOT NULL,
  `category` varchar(25) NOT NULL,
  `stok_product` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `image`, `nama_product`, `harga_product`, `category`, `stok_product`, `deskripsi`) VALUES
(1, 'sofa_3.jpg', 'Sofa living room Modern Klasik Coresty', 3500000, 'sofa', 50, 'Using a solid teak wood frame combined with natural rattan, foam seats covered in quality fabric, satin finishing, simple modern minimalist design'),
(2, 'table_2.webp', 'Teak Wood Table', 4500000, 'table', 50, 'Minimalist Coffee Table Export Quality, Main Material Selected Perhutani Teak Wood. Size 120 x 60 x 45. With a square shape and unique curved corners'),
(3, 'cupboard_3.webp', 'Sonoma Minimalist White 2 Door Wardrobe', 884000, 'cupboard', 50, 'Minimalist two-door wardrobe, Product specifications like this, Particle Board Material, Size L 80 x W 43 x H 180 cm'),
(4, 'sofa_2.jpg', 'Sofa 2 Seater plus 4 Bantal Heki Balea', 2680000, 'sofa', 50, 'Teak / mahogany wood material, Natural finishing / Color - Glossy / Semi Doff, Royal foam / inoac foam, Velvet fabric, synthetic leather, dhapnie etc., Finishing & Fabric color choices can be written in the notes. we always maintain the quality and neatness of production.'),
(5, 'sofa_1.jpg', 'Sofa Jun 3 Seater', 3300000, 'sofa', 50, 'Multifunctional and space-saving Japandi style furniture is ready to complete your dream home into reality. Material specifications, Teak / Mahogany Wood, Royal Foam Foam Material, Dhapnie / Velvet / Clio (oscar) Fabric'),
(6, 'table_1.jpg', 'Cloe Coffee Table', 1200000, 'table', 50, 'White Cloe Coffee Table Idemu is very suitable to be placed in various rooms and makes your room look minimalist and modern. The size details are 600x600x400mm. \r\nThe leg material is Mindi wood with a veneer finish with a natural color, while the top is MDF with a veneer layer, Mindi wood with a veneer finish with a natural color'),
(7, 'table_3.jpg', 'Brown Oak Dining Table Dinner Table', 1791000, 'table', 50, 'Table top decorated with natural wood grain motif, Strong and sturdy frame, Stable table legs, Enhance the aesthetic appearance of the room, Large table top surface, Suitable for placement in dining rooms, restaurants, hotels, or other commercial areas. The shape is rectangular, Finishing using powder coating & melamine, Capacity 4 people with a width of 80 cm, The leg material used is metal, The top material is MDF, Length 120 cm and height 75 cm'),
(8, 'cupboard_1.webp', 'Small Wardrobe 2 Doors Pira Metropolis OX Aruna', 620000, 'cupboard', 50, 'original Jepara furniture manufacturer, product material Full teak wood can also be a combination of mdf, finishing Duco paint, natural, polish, which is ready to help fill your room with products. Quality furniture, teeniest material From solid teak wood processed by experts in their fields. Cabinet measuring 160x55x200'),
(9, 'cupboard_2.webp', 'Custom Duco Teak Wood Wardrobee', 1975000, 'cupboard', 50, 'This children\'s wardrobe has 2 swing doors with hanging and folding clothes areas inside! The folding clothes area has 3 spacious shelves, your little one\'s clothes collection fits perfectly here! There\'s a lock too! You can also use this wardrobe according to your needs and creativity The length, width, & height are 80 cm x 39.8 cm x 121.2 cm');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `detail_address` text DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subharga` int(11) DEFAULT NULL,
  `totalbelanja` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `full_name`, `phone_number`, `address`, `detail_address`, `id_product`, `jumlah`, `subharga`, `totalbelanja`, `created_at`) VALUES
(1, 'lita', '089676145448', 'Jawa Timur, Sidoarjo, Tulangan, Ds. Kebaron', 'Nomer 14', 9, 2, 1975000, 3950000, '2025-06-29 08:50:04'),
(2, 'bintang rangga', '085746113335', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'Nomer 18', 5, 7, 3300000, 23100000, '2025-06-29 09:40:21'),
(3, 'rangga', '93732956', 'dkfslbfsof', 'sfpsfpsofhopeurfdfj', 5, 7, 3300000, 23100000, '2025-06-29 09:43:15'),
(4, 'rangga', '93732956', 'dkfslbfsof', 'sfpsfpsofhopeurfdfj', 4, 11, 2680000, 29480000, '2025-06-29 09:44:10'),
(5, 'rangga', '93732956', 'dkfslbfsof', 'sfpsfpsofhopeurfdfj', 4, 11, 2680000, 29480000, '2025-06-29 09:48:31'),
(6, 'rangga', '93732956', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'Nomer 18', 5, 7, 3300000, 23100000, '2025-06-29 09:49:16'),
(7, 'lita', '089676145448', 'Jawa Timur, Sidoarjo, Tulangan, Ds. Kebaron', 'Nomer 14', 6, 1, 1200000, 1200000, '2025-06-29 09:51:36'),
(8, 'bintang rangga', '085746113335', 'Jawa Timur, Sidoarjo, Tulangan, Ds. Kebaron', 'Nomer 18', 8, 4, 620000, 2480000, '2025-06-29 09:56:09'),
(9, 'this me', '09987', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'nomor 33', 3, 2, 884000, 1768000, '2025-07-15 13:30:01'),
(10, 'rangga', '085746113335', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'Nomer 14', 4, 1, 2680000, 2680000, '2025-07-15 13:37:16'),
(11, 'bintang rangga', '09987', 'Jawa Timur, Sidoarjo, Tulangan, Ds. Kebaron', 'Nomer 18', 3, 2, 884000, 1768000, '2025-07-15 13:37:40'),
(12, 'bintang', 'hsbiuxb', 'bqcgyg8', 'hnicqhi', 1, 2, 3500000, 7000000, '2025-07-17 12:38:36'),
(13, 'faizul', '08923456712', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'Nomer 18', 4, 1, 2680000, 2680000, '2026-01-09 03:00:45'),
(14, 'bintangrangga', '085746113335', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'Nomer 18', 2, 1, 4500000, 4500000, '2026-01-15 04:52:19'),
(15, 'bintang rangga saputra', '085746113335', 'Jawa Timur, Sidoarjo, Tanggulangin, Ganggang Panjang', 'nomor 33', 5, 1, 3300000, 3300000, '2026-01-20 04:41:18');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `password`, `role`) VALUES
(7, 'litaa23@gmail.com', 'lita', '$2y$10$P9hECt2ydb9eNT.GvePmpuzkXhJDAHlXO8fTFkpoVwSQF0V45uKqO', 'user'),
(8, 'bintangrangga2006@gmail.com', 'tangrs', '$2y$10$mYnu.LaGiBfmKNrqb7es/ulCHGYnCCb9bANu3NrkOUEWwOYOL0Pha', 'user'),
(9, 'admin1@gmail.com', 'admin1', '$2y$10$XE.K6cg0Y.3q29ywJ6QKWO/11eLk8p8ExP69tY92LeKtKSR.aZq2', 'admin'),
(10, 'admin2@gmail.com', 'admin2', '$2y$10$1qSHvIIo3UNFDJlLQhaWEOTNqMLKhh3DQaXD9woQVifKaDnyoZ6ci', 'admin'),
(11, 'aljabargtx1090@gmail.com', 'akbar', '$2y$10$h15mFv.W1IibCAzPsJKJeekk44k.hTLxC7m04.pzGTp9tQlh1q016', 'user'),
(12, 'fgyedctywstydhctyrty5@gmail.com', 'bintang23', '$2y$10$AVnw/ZDQ99ZHdBp.s3kTreX0p8Dfzc56FmFcfiQNEg.UcqJRHM6GC', 'user'),
(13, 'abidfarel54321@gmail.com', 'izul', '$2y$10$rg9k6xX3Xmy0jddudqTywOUbQ.1KH0ZHj0KH.3A0gnKWb0DyFL1be', 'user'),
(14, 'faizul1234@gmail.com', 'faizul', '$2y$10$U.dARyeifRONelnov96Wve8IDYQxIqTLZN9KFFBY9Uxjpg8GdyRaW', 'user'),
(15, 'bintangranggaja@gmail.com', 'bintangae', '$2y$10$VvLmtFRggNcCNJtwxmWSder05CSasncidJ0LLDweDO2DoKIKDyNuC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `fk_product` (`id_product`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaksi` (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
