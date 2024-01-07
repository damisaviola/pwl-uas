-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 02:06 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tiketterbaru`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_penerbangan`
--

CREATE TABLE `jadwal_penerbangan` (
  `id_jadwal` int(11) NOT NULL,
  `id_rute` int(11) DEFAULT NULL,
  `id_maskapai` int(11) DEFAULT NULL,
  `id_pesawat` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maskapai`
--

CREATE TABLE `maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `nama_maskapai` varchar(50) DEFAULT NULL,
  `kode_maskapai` varchar(10) DEFAULT NULL,
  `jenis_pesawat` varchar(50) DEFAULT NULL,
  `gambar_maskapai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maskapai`
--

INSERT INTO `maskapai` (`id_maskapai`, `nama_maskapai`, `kode_maskapai`, `jenis_pesawat`, `gambar_maskapai`) VALUES
(50, 'AIR ASIO', '30', 'FHEHF', 'th2.jpg'),
(99, 'airais', '300', 'FHEHF', 'th3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `id_penumpang` varchar(255) DEFAULT NULL,
  `jumlah_tiket` int(11) DEFAULT NULL,
  `total_biaya` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` varchar(255) NOT NULL,
  `nama_penumpang` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesawat`
--

CREATE TABLE `pesawat` (
  `id_pesawat` int(11) NOT NULL,
  `jenis_pesawat` varchar(50) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rute_penerbangan`
--

CREATE TABLE `rute_penerbangan` (
  `id_rute` int(11) NOT NULL,
  `bandara_asal` varchar(50) DEFAULT NULL,
  `bandara_tujuan` varchar(50) DEFAULT NULL,
  `waktu_keberangkatan` datetime DEFAULT NULL,
  `waktu_kedatangan` datetime DEFAULT NULL,
  `Maskapai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rute_penerbangan`
--

INSERT INTO `rute_penerbangan` (`id_rute`, `bandara_asal`, `bandara_tujuan`, `waktu_keberangkatan`, `waktu_kedatangan`, `Maskapai`) VALUES
(1, 'Jayapura', 'Jayapura', '2023-12-11 16:29:00', '2023-12-14 16:29:00', 'Garuda'),
(3, 'Jayapura', 'Jayapura', '2023-12-11 16:29:00', '2023-12-14 16:29:00', 'Garuda'),
(23, 'Sleman', 'Jayapura', '2023-12-12 13:51:00', '2023-12-14 13:51:00', 'Citilink'),
(100, 'Sleman', 'Jayapura', '2023-12-24 17:50:00', '2023-12-16 17:50:00', 'Garuda'),
(200, 'Sleman', 'Manado', '2023-12-12 13:53:00', '2023-12-14 13:53:00', 'Garuda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jadwal_penerbangan`
--
ALTER TABLE `jadwal_penerbangan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_rute` (`id_rute`),
  ADD KEY `id_pesawat` (`id_pesawat`),
  ADD KEY `id_maskapai` (`id_maskapai`);

--
-- Indexes for table `maskapai`
--
ALTER TABLE `maskapai`
  ADD PRIMARY KEY (`id_maskapai`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_penumpang` (`id_penumpang`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indexes for table `pesawat`
--
ALTER TABLE `pesawat`
  ADD PRIMARY KEY (`id_pesawat`);

--
-- Indexes for table `rute_penerbangan`
--
ALTER TABLE `rute_penerbangan`
  ADD PRIMARY KEY (`id_rute`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_penerbangan`
--
ALTER TABLE `jadwal_penerbangan`
  ADD CONSTRAINT `jadwal_penerbangan_ibfk_1` FOREIGN KEY (`id_rute`) REFERENCES `rute_penerbangan` (`id_rute`),
  ADD CONSTRAINT `jadwal_penerbangan_ibfk_3` FOREIGN KEY (`id_pesawat`) REFERENCES `pesawat` (`id_pesawat`),
  ADD CONSTRAINT `jadwal_penerbangan_ibfk_4` FOREIGN KEY (`id_maskapai`) REFERENCES `maskapai` (`id_maskapai`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_penerbangan` (`id_jadwal`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_penumpang`) REFERENCES `penumpang` (`id_penumpang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
