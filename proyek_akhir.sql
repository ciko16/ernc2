-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 08:17 PM
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
-- Database: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_layanan`
--

CREATE TABLE `biaya_layanan` (
  `id` int(11) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `biaya` decimal(10,0) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_layanan`
--

INSERT INTO `biaya_layanan` (`id`, `keperluan`, `biaya`, `kategori`) VALUES
(2, 'CV UR Rad-Er 5841', 200000, 'Layanan'),
(3, 'CD UR Rad-Er 2018', 200000, 'Layanan'),
(4, 'Bollmiling', 200000, 'Layanan'),
(5, 'Furnace Payuntech', 600000, 'Peminjaman');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(50) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `judul` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `gambar`, `judul`, `deskripsi`) VALUES
(2, 'alat1.jpg', 'CV UR Rad-Er 5841', 'Alat uji sifat elektrokimia dari nilai kapasitansi spesifik untuk elektroda berupa koin padat monolith dari karbonaktif. (Biaya: Rp.200.000/uji) '),
(3, 'alat2.jpg', 'CD UR Rad-Er 2018', 'Alat uji sifat elektrokimia dari nilai kapasitansi spesifik untuk elektroda berupa koin padat monolith dari karbonaktif. (Biaya: Rp.200.000/uji) '),
(4, 'alat3.jpg', 'Bolmiling', 'Alat konversi partikel karbon dari skala centimeter ke micrometer. (Biaya: Rp.200.000/uji)'),
(6, 'pembakaran.jpg', 'Furnace Payuntech', 'Konversi karbon menjadi karbonaktif 30 °C - 900 °C, karbonisasi gas nitrogen N2. (Biaya: Rp.600.000/uji)');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `ketersediaan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `jenis`, `deskripsi`, `jumlah`, `ketersediaan`) VALUES
(2, 'Bolmiling', 'alat', 'Alat konversi partikel karbon dari skala centimeter ke micrometer.', 1, 'Tersedia'),
(3, 'Furnace Payuntech', 'alat', 'Konversi karbon menjadi karbonaktif 30 °C - 900 °C', 2, 'Tersedia'),
(4, 'CD UR Rad-Er 2018', 'alat', 'Alat uji sifat elektrokimia dari nilai kapasitansi spesifik untuk elektroda berupa koin padat monolith dari karbonaktif.', 1, 'Tersedia'),
(5, 'CV UR Rad-Er 5841', 'alat', 'Alat uji sifat elektrokimia dari nilai kapasitansi spesifik untuk elektroda berupa koin padat monolith dari karbonaktif.', 1, 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kalender`
--

CREATE TABLE `kalender` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalender`
--

INSERT INTO `kalender` (`id`, `title`, `deskripsi`, `start_date`, `end_date`) VALUES
(3, 'tess', 'ini coba', '2024-05-02 13:31:18', '2024-05-09 13:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `kalenderbaru`
--

CREATE TABLE `kalenderbaru` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kalenderbaru`
--

INSERT INTO `kalenderbaru` (`id`, `tanggal`, `isi`, `status`) VALUES
(1, '2024-05-27', 'berkunjung ke lab unri', 1),
(2, '2024-05-28', 'berkunjung ke unri', 1),
(4, '2024-05-29', 'tes ciko', 1),
(5, '2024-05-30', 'assalamualaikum', 1),
(6, '2024-06-17', 'ada peminjaman cika', 1),
(7, '2024-05-06', 'ada', 1),
(8, '2024-07-15', 'asa minjam lab', 1),
(9, '2024-05-30', 'ciko makai lab', 1),
(10, '2024-06-22', 'assalamualaikum', 1),
(11, '2024-07-03', 'peminjaman mahasiswa UIR fulan', 1),
(12, '2024-06-17', 'ada peminjaman cika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_lab`
--

CREATE TABLE `layanan_lab` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_instansi` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `jumlah_sampel` int(25) NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `no_whatsapp` varchar(20) NOT NULL,
  `lampiran_sampel` varchar(100) NOT NULL,
  `tagihan` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `konfirmasi` varchar(50) DEFAULT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layanan_lab`
--

INSERT INTO `layanan_lab` (`id`, `nama`, `asal_instansi`, `keperluan`, `jumlah_sampel`, `biaya`, `no_whatsapp`, `lampiran_sampel`, `tagihan`, `status`, `konfirmasi`, `created_date`) VALUES
(71, 'ciko', 'PCR', 'CV UR Rad-Er 5841', 3, 600000.00, '081234567890', 'sq2.png', 'aoashi3.jpg', 'Selesai', 'noviyanti', '2024-07-16'),
(72, 'fulan', 'UNRI', 'Bollmiling', 3, 600000.00, '081234567890', 'AD_Galeri.png', NULL, 'Proses', 'Nursyafni', '2024-07-17'),
(73, 'asda', 'UIR', 'CV UR Rad-Er 5841', 12, 2400000.00, '081234567890', 'default.jpg', NULL, 'Ditolak', 'noviyanti', '2024-07-17'),
(74, 'asd', 'UNRI', 'Bollmiling', 4, 800000.00, '081234567890', 'default.jpg', NULL, 'Proses', 'Nursyafni', '2024-07-17'),
(75, 'ciko13', 'UIM', 'CV UR Rad-Er 5841', 2, 400000.00, '0821342155', '', NULL, 'Proses', 'noviyanti', '2024-07-24'),
(76, 'wanda', 'PCR', 'CD UR Rad-Er 2018', 2, 400000.00, '081234567890', 'erd_revisi.png', NULL, 'Proses', NULL, '2024-07-24');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_lab`
--

CREATE TABLE `peminjaman_lab` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `asal_instansi` varchar(50) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `status_peminjaman` varchar(10) NOT NULL,
  `biaya` decimal(10,2) NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `konfirmasi` varchar(50) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_lab`
--

INSERT INTO `peminjaman_lab` (`id`, `nama`, `asal_instansi`, `keperluan`, `status_peminjaman`, `biaya`, `no_whatsapp`, `bukti_pembayaran`, `konfirmasi`, `created_date`) VALUES
(9, 'ciko', 'PCR', 'Furnace Payuntech', 'Selesai', 600000.00, '0821342155', 'jastok.jpg', 'noviyanti', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` int(50) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `caption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `gambar`, `caption`) VALUES
(1, '20210514_2353571.jpg', 'saya sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `gambar`, `role`, `date_created`) VALUES
(16, 'ciko', 'ciko@mail.com', '$2y$10$s3H/BRyp9Wzbsa2OleaHZO5DuuKdWmvMvGnUjzrq6Z4oDN2EgGY9q', 'default.jpg', 'Admin', 1717597488),
(17, 'noviyanti', 'novi@mail.com', '$2y$10$uDgK62873OgZHkl69.DA6uNS9i35/pW.jiGaf1mSAd8z6/UmvfBHG', '171.jpg', 'Admin', 1717597540),
(18, 'Nursyafni', 'ani@mail.com', '$2y$10$J81DoD.Co8ECHa0qJ35gcOg/QgGU6Q.Bfuo1soxk3syHfdea8jg9O', '18.jpg', 'Admin', 1721198608);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya_layanan`
--
ALTER TABLE `biaya_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalender`
--
ALTER TABLE `kalender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kalenderbaru`
--
ALTER TABLE `kalenderbaru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layanan_lab`
--
ALTER TABLE `layanan_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman_lab`
--
ALTER TABLE `peminjaman_lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
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
-- AUTO_INCREMENT for table `biaya_layanan`
--
ALTER TABLE `biaya_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kalender`
--
ALTER TABLE `kalender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kalenderbaru`
--
ALTER TABLE `kalenderbaru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `layanan_lab`
--
ALTER TABLE `layanan_lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `peminjaman_lab`
--
ALTER TABLE `peminjaman_lab`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
