-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 11:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `no_fasilitas` int(11) NOT NULL,
  `fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`no_fasilitas`, `fasilitas`) VALUES
(1, 'Wifi, Ac, 1 Kamar Tidur, 1 Kamar Mandi, 1 Dapur Kecil'),
(2, 'Wifi, Ac, 3 Kamar Tidur, 2 Kamar Mandi, 1 Dapur Besar, Ruang Keluarga, PS 4, Xbox'),
(3, 'Wifi 5G, Ac, 3 Kamar Tidur, 2 Kamar Mandi, 1 Dapur Besar, Ruang Keluarga, PS 4, Xbox, Pc Gaming, Member Card GYM & Kolah Renang'),
(4, 'Wifi 5G, Ac, 5 Kamar Tidur, 3 Kamar Mandi, 2 Dapur Besar, Ruang Keluarga, PS 4, Xbox, Pc Gaming, Member Card GYM & Kolah Renang, VVIP ROOM'),
(5, ' Wifi 5G, Ac, 5 Kamar Tidur, 3 Kamar Mandi, 2 Dapur Besar, Ruang Keluarga, PS 4, Xbox, Pc Gaming, Member Card GYM & Kolah Renang, Makanan Mewah, Free Desert, Free Food');

-- --------------------------------------------------------

--
-- Table structure for table `kamars`
--

CREATE TABLE `kamars` (
  `id_kamar` int(11) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `lantai` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `no_fasilitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamars`
--

INSERT INTO `kamars` (`id_kamar`, `tipe`, `no`, `lantai`, `status`, `no_fasilitas`) VALUES
(1, 'Superior', '15', '2', 'Tersedia', 4),
(2, 'Deluxe', '14', '2', 'Terisi', 2),
(5, 'Superior', '17', '3', 'Maintance', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pesanan` int(11) NOT NULL,
  `cek_in` varchar(255) DEFAULT NULL,
  `cek_out` varchar(255) DEFAULT NULL,
  `jml_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `hp_pemesan` varchar(255) DEFAULT NULL,
  `nama_tamu` varchar(255) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL,
  `harga` varchar(255) NOT NULL,
  `bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pesanan`, `cek_in`, `cek_out`, `jml_kamar`, `nama_pemesan`, `email_pemesan`, `hp_pemesan`, `nama_tamu`, `id_kamar`, `status`, `harga`, `bayar`) VALUES
(1, '2023-03-09', '2023-03-10', '3', 'Usup', 'Usop@gmail.com', '0895132456', 'Go D Usop', 1, '4', '1000000', '0'),
(5, '2023-03-09', '2023-03-10', '3', 'Ayam', 'Ayy@gmail.com', '123156', 'Maya', 2, '4', '1000000', '0'),
(6, '2023-03-02', '2023-03-09', '3', '13211', 'Ayy@gmail.com', '0123465', 'Maya', 1, '1', '1000000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(4, 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', '2'),
(6, 'tamu', 'f8829935a87192f3f9fab79856122c0f', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`no_fasilitas`);

--
-- Indexes for table `kamars`
--
ALTER TABLE `kamars`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `no_fasilitas` (`no_fasilitas`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `no_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kamars`
--
ALTER TABLE `kamars`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kamars`
--
ALTER TABLE `kamars`
  ADD CONSTRAINT `kamars_ibfk_1` FOREIGN KEY (`no_fasilitas`) REFERENCES `fasilitas_kamar` (`no_fasilitas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
