-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 04:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsp_jwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'nopal123', '$2y$10$d64iK/GRT.okx.XJr7W72OBkzgyZCv7H9KISxIFP6a4VhS1GDRWH.'),
(2, 'nopallagi', '$2y$10$xhLHhFttGHU7pLxFl8mLKuNpSO.EVwPa5toP9S/1/sv1tBfuZRx0a');

-- --------------------------------------------------------

--
-- Table structure for table `artikel_jwp`
--

CREATE TABLE `artikel_jwp` (
  `id_artikel` int(10) NOT NULL,
  `nama_artikel` varchar(50) NOT NULL,
  `gambar_artikel` varchar(255) DEFAULT NULL,
  `detail_artikel` varchar(150) NOT NULL,
  `detail_isi_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel_jwp`
--

INSERT INTO `artikel_jwp` (`id_artikel`, `nama_artikel`, `gambar_artikel`, `detail_artikel`, `detail_isi_artikel`) VALUES
(35, 'We.The.Fest', '878-Cuplikan layar 2023-06-18 114804.png', 'cssZ', 'We The Fest is an annual summer festival of music, arts, fashion and food taking place in Indonesiaâ€™s capital of Jakarta.\r\n\r\nSince its inaugural edition in 2014, the festival has seen incredible performances from globally-known acts of different genres including Lorde, SZA, Dua Lipa, Ellie Goulding, Big Sean, Odesza, The 1975, G-Eazy, Mark Ronson, Offset, Jackson Wang, Phoenix, Macklemore & Ryan Lewis, CL, The Temper Trap, Purity Ring, Flight Facilities, Jessie Ware and many more.\r\n\r\nIndonesiaâ€™s most exciting musical acts have also performed at the festival including Potret, NAIF, Scaller, Barasuara, Sheila on 7, Dewa 19, PADI, Raisa, The Trees and the Wild, Ramengvrl, Elephant Kind, and Stars & Rabbit amongst many.\r\n\r\n Described as â€œa classy festivalâ€ by Vice for its friendly vibe and how slickly it has been organized, the festival is a pioneer of its kind in the Southeast Asian festival scene with elements such as arts, fashion and food presented through various whimsical activations and zones festival-goers can experience and explore.\r\n\r\nIn 2019 We The Fest hosted an audience of over 60,000 with artists playing across four stages, 2020 saw the success of We The Festâ€™s virtual edition, with the likes of 27 top-tier international, regional and local acts gracing the screen with their sets. \r\n\r\nIn 2022, We The Fest made its long-awaited offline return and this year the 8th offline edition of the festival is set to be held on 21, 22 & 23 July 2023 in GBK Sports Complex, Senayan, Jakarta with more spectacular lineup including The Strokes, The 1975, The Kid Laroi, Lewis Capaldi and many more.');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_jwp`
--

CREATE TABLE `komentar_jwp` (
  `id` int(10) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_jwp`
--

INSERT INTO `komentar_jwp` (`id`, `id_artikel`, `nama`, `email`, `komentar`) VALUES
(8, 35, 'appan', 'nopalganteng', 'dsdgsgdds'),
(10, 35, 'xzvzxvx', 'vxzxvz', 'vzxxzzx'),
(11, 35, 'xvzzvxx', 'xzvzzvx', 'vxzas'),
(12, 35, 'ZCcZZ', 'zcczcz', 'zczcZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artikel_jwp`
--
ALTER TABLE `artikel_jwp`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `komentar_jwp`
--
ALTER TABLE `komentar_jwp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artikel_jwp`
--
ALTER TABLE `artikel_jwp`
  MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `komentar_jwp`
--
ALTER TABLE `komentar_jwp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar_jwp`
--
ALTER TABLE `komentar_jwp`
  ADD CONSTRAINT `id_artikel` FOREIGN KEY (`id_artikel`) REFERENCES `artikel_jwp` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
