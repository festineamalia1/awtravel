-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 08:58 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `awtravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `alamat`, `email`, `no_tlp`, `id_user`) VALUES
(1, 'admin', 'jogja', 'admin@gmail.com', '2345678', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank_tujuan`
--

CREATE TABLE `bank_tujuan` (
  `id_bank_tjn` int(11) NOT NULL,
  `nm_bank` varchar(50) NOT NULL,
  `nomor_rek` varchar(30) NOT NULL,
  `nama_rek` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_tujuan`
--

INSERT INTO `bank_tujuan` (`id_bank_tjn`, `nm_bank`, `nomor_rek`, `nama_rek`) VALUES
(1, 'BRI', '667gy8909', 'gempita ayu'),
(2, 'BCA', '9a86665ahakj', 'gempita ayu');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `berita` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dp`
--

CREATE TABLE `dp` (
  `id_dp` int(11) NOT NULL,
  `jml_dp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dt_transaksi`
--

CREATE TABLE `dt_transaksi` (
  `id_det_tr` int(11) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jml_org` int(11) NOT NULL,
  `wkt_cicil` enum('0','1','2','3','4') NOT NULL,
  `status` enum('lunas','belum lunas') NOT NULL,
  `id_ngr` int(11) NOT NULL,
  `id_bank_tjn` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dt_transaksi`
--

INSERT INTO `dt_transaksi` (`id_det_tr`, `tgl`, `jml_org`, `wkt_cicil`, `status`, `id_ngr`, `id_bank_tjn`, `id_user`) VALUES
(60, '2019-04-22 06:59:27', 1, '2', 'belum lunas', 2, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_ngr` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ft` varchar(30) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_ngr`, `name`, `ft`, `ket`) VALUES
(6, 2, 'Nami Island', 'nami2.jpg', 'in day 1'),
(7, 2, 'Haneul Park', 'haneul_park2.jpg', 'in day 1'),
(8, 2, 'Royal Palace', 'royal_palace2.jpg', 'in day 1'),
(9, 2, 'Namsan Park and Seoul tower', 'Seoul_Tower.jpg', 'in day 1'),
(10, 2, 'Yangju Nari', 'yangju3.jpg', 'in day 1'),
(11, 3, 'asd', 'bg3.jpg', 'japan');

-- --------------------------------------------------------

--
-- Table structure for table `itinerary`
--

CREATE TABLE `itinerary` (
  `id_iti` int(11) NOT NULL,
  `hari` enum('day 1','day 2','day 3','day 4','day 5','day 6','day 7') NOT NULL,
  `kunjungan` text NOT NULL,
  `biaya` int(11) NOT NULL,
  `id_ngr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itinerary`
--

INSERT INTO `itinerary` (`id_iti`, `hari`, `kunjungan`, `biaya`, `id_ngr`) VALUES
(1, 'day 1', 'Check in Hotel, Petite Franch, Nami Island, Gangnam Road Tour, Myongdong', 78900, 2),
(2, 'day 2', 'Namsan Park, Namsan Seoul Tower, Namsangol Hanok Village', 7890, 2),
(3, 'day 3', 'Dongdaemun History & Culture Park (Dongdaemun Design), Ichon (National Museum of Korea), Namdaemun Market , Myongdong', 79990, 2),
(4, 'day 4', 'Haneul Park, Royal Palace (Gyeongbokgung Palace, Deoksugung Palace, Gwanghwamun Square dan Cheonggyecheon Stream), Myongdong', 7890, 2),
(5, 'day 5', 'Yangju Nari Park, Ewha Women Univercity, FREE DAY', 79990, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mou`
--

CREATE TABLE `mou` (
  `id_mou` int(11) NOT NULL,
  `pasal` varchar(20) NOT NULL,
  `ket` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mou`
--

INSERT INTO `mou` (`id_mou`, `pasal`, `ket`, `id_user`) VALUES
(1, 'II', '1.	PIHAK PERTAMAadalah badan usahaswastanasional yang berdasarkan Surat Keputusan DirekturJenderalPariwisataDepartemenPariwisata Pos dan Telekomunikasi Nomor : 19/14.11/31.74/-1.858.8/E/2017 diberiizinuntukmelakukankegiatanusahasebagai Biro PerjalananWisata.', 1),
(2, '2', 'wqwqw', 1);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id_ngr` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `slot_awal` int(11) NOT NULL,
  `slot_max` int(11) NOT NULL,
  `wtk_berangkat` varchar(30) NOT NULL,
  `wkt_plg` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `musim` enum('Summer','Rainy','Winter','Spring','Autumn') NOT NULL,
  `biaya` int(11) NOT NULL,
  `ft_utama` varchar(50) NOT NULL,
  `include` text NOT NULL,
  `exclude` text NOT NULL,
  `dp` int(11) NOT NULL,
  `id_iti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_ngr`, `name`, `slot_awal`, `slot_max`, `wtk_berangkat`, `wkt_plg`, `deskripsi`, `musim`, `biaya`, `ft_utama`, `include`, `exclude`, `dp`, `id_iti`) VALUES
(2, 'korea', 0, 18, '15', '19 April 2018', 'Namsan Park and Seoul Tower, Namsango, Hanok Village, Royal Palace, haneul Park', 'Spring', 12000000, 'bg1.jpg', '5 nights accommodation at Guest House (based on TWIN/TRIPLE room, private bathroom, light breakfast)\r\n4x lunch + 4x dinner at local restaurant\r\nTransfer and tour by using Subway + Public Bus with Indonesian speaking guide\r\nT-money transportation card which already refilled (available for use during tour program)\r\nAirport Limousine Bus ticket (round trip, Incheon – Seoul – Incheon) \r\nTaxi fare for Nami Island – The Garden of Morning Calm\r\nAll admission fee as mentioned above\r\nTips for local guide', 'International Flight\r\nVisa Korea', 1000000, 1),
(3, 'japan', 0, 18, '21', '26 Maret 2019', 'Tokyo, Akihabara, Masjid Shinjuku, Ikebukuro, Meiji Jingu', 'Spring', 9500000, 'Tokyo.jpg', 'sskdksoks', 'lkslkl', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `nama`, `alamat`, `email`, `no_tlp`, `id_user`) VALUES
(1, 'dafa', 'kaslaksjkas', 'ad@gmail.com', 'ssd', 18);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`) VALUES
(1, '1'),
(5, '5');

-- --------------------------------------------------------

--
-- Table structure for table `tf_dp`
--

CREATE TABLE `tf_dp` (
  `id_tfdp` int(11) NOT NULL,
  `ft_dp` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nm_rek` varchar(30) NOT NULL,
  `id_bank_tjn` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('wait','approve','disapprove') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tf_dp`
--

INSERT INTO `tf_dp` (`id_tfdp`, `ft_dp`, `name`, `nm_rek`, `id_bank_tjn`, `id_user`, `status`, `tgl`) VALUES
(20, '61253-2.jpg', 'l;l\'', 'lk;l', 1, 18, 'approve', '2019-04-12 09:29:12'),
(21, 'abstrak.docx', 'ghggjh', 'm.,m,', 1, 18, 'wait', '2019-04-22 07:01:18');

-- --------------------------------------------------------

--
-- Table structure for table `tf_lunas`
--

CREATE TABLE `tf_lunas` (
  `id_tf_lunas` int(11) NOT NULL,
  `ft_lunas` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nm_rek` varchar(30) NOT NULL,
  `id_bank_tjn` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `cashback` int(11) NOT NULL,
  `status` enum('wait','approve','disapprove') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tf_lunas`
--

INSERT INTO `tf_lunas` (`id_tf_lunas`, `ft_lunas`, `name`, `nm_rek`, `id_bank_tjn`, `id_user`, `cashback`, `status`, `tgl`) VALUES
(9, '61253-2.jpg', 'kklk', 'lk;kl', 1, 18, 0, 'disapprove', '2019-04-19 18:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` int(11) NOT NULL,
  `besar` int(11) NOT NULL,
  `ft_trans` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `nm_rek` varchar(30) NOT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `id_bank_tjn` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` enum('wait','approve','disapprove') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id_transfer`, `besar`, `ft_trans`, `name`, `nm_rek`, `cicilan_ke`, `id_bank_tjn`, `id_user`, `status`, `tgl`) VALUES
(12, 0, '61253-2.jpg', 'l;lk', 'l;l', 1, 1, 18, 'wait', '2019-03-20 20:18:15'),
(13, 6788, '61253-2.jpg', 'k;lk;lk', '.,ll', 1, 1, 18, 'disapprove', '2019-03-20 20:18:33'),
(14, 81716, '61253-2.jpg', 'ldskd;ls', 'dslkdlsk', 1, 1, 18, 'wait', '2019-03-20 19:56:53'),
(15, 9988, '61253-2.jpg', 'mjnj', 'kmk', 1, 1, 18, 'wait', '2019-03-21 18:18:58'),
(16, 7899, '61253-2.jpg', 'klkjl', 'mnjnj', 1, 1, 18, 'wait', '2019-03-22 08:03:55'),
(17, 8308328, 'lksla', 'lsk;laksla', 'skasa', 1, 1, 1, 'wait', '2019-04-01 13:12:37'),
(18, 81716, '61253-2.jpg', 'sxsxs', 'sxsx', 7, 1, 18, 'wait', '2019-04-07 12:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `password_hash` varchar(50) NOT NULL,
  `auth_key` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `password_reset_token` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `password_hash`, `auth_key`, `status`, `password_reset_token`, `created_at`, `updated_at`, `id_level`, `nama`, `alamat`, `no_tlp`) VALUES
(1, 'admin', '', 'admin', '', '37393hfkdnd8', 0, 'djsids', 0, 0, 1, 'sasa', '', 0),
(2, 'coba', '', 'coba', '', 'kdsldsldlds', 0, 'mcdmcdkdkc', 0, 0, 1, '', '', 0),
(4, 'festine', 'festinemalia6@gmail.com', '123456', '$2y$13$VrgHUoy.ae9HzTvnCyR7lOz3N7MdI97/9Rs1YSvoU57', 'sxGiN41KNc7ff4udhOFDcKer4YukXmfF', 10, '', 1545497210, 1545497210, 5, '', '', 0),
(5, 'dafa', 'dafa.bima26@gmail.com', '', '$2y$13$i1wFzfPdTiUjiK12.U8FduPieuinq0LVBr1H1nofqjm', 'cw5AGTG1TqOJPAEk2YoBXo0tZ1TF_AUM', 10, '', 1545498738, 1545498738, 5, '', '', 0),
(6, 'dafa26', 'dafa@gmail.com', '', '$2y$13$Y.k1oonnOAvqa707gABu.uCK3fyVZTzQGKyDdUjrwn2', 'Z4fNEqFNVW5VxkZUFQzIexEiysR2WiWy', 10, '', 1545501209, 1545501209, 5, '', '', 0),
(7, 'admin2', '', 'admin2', '', '', 0, '', 0, 0, 1, '', '', 0),
(9, 'festine2', 'festinemalia7@gmail.com', '', '$2y$13$BJyp4UYKtWNW3CS20ByLCO3YDCtwYWT65kYUbsO6XnR', 'dmXG_kn-hmsgYO_zSjfofNNpG1bdM4fO', 10, '', 1545570380, 1545570380, 5, '', '', 0),
(13, 'admin6', '', '123456', '', '', 0, '', 0, 0, 1, '', '', 0),
(15, 'festine4', 'festinemalia9@gmail.com', '', '', '4ANYwP7u2CwzBxLK6XVGfpe4ShjDNPCI', 10, '', 1545587896, 1545587896, 5, '', '', 0),
(18, 'dafa2', 'dafa8@gmail.com', '1234567', '$2y$13$FWe3leoZmLseWLqqMXUvOeUJgaef/JyaF5mKXueAK9l', 'uKWhGJSz_g327G8cp7J91zPxGJNCRHLZ', 10, '', 1545589827, 1545589827, 5, 'Dafa Bima D.', 'pekalongan', 167282),
(19, 'festine10', 'festinemalia10@gmail.com', '123456789', '$2y$13$8znXFhH7wFF.WpvHaCNpOOgav/lKdnZLN.FfUv3.nKf', 'AXuDa3yDtjsl6jIYMdIBB9IaeukV5879', 10, 'wMBFDLWKJRa98GDokGBR3SKEth8I1LW5_1555845444', 1555845444, 1555845444, 5, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `bank_tujuan`
--
ALTER TABLE `bank_tujuan`
  ADD PRIMARY KEY (`id_bank_tjn`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `dp`
--
ALTER TABLE `dp`
  ADD PRIMARY KEY (`id_dp`);

--
-- Indexes for table `dt_transaksi`
--
ALTER TABLE `dt_transaksi`
  ADD PRIMARY KEY (`id_det_tr`),
  ADD KEY `id_ngr` (`id_ngr`),
  ADD KEY `id_bank_tjn` (`id_bank_tjn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `id_ngr` (`id_ngr`);

--
-- Indexes for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD PRIMARY KEY (`id_iti`),
  ADD KEY `id_ngr` (`id_ngr`);

--
-- Indexes for table `mou`
--
ALTER TABLE `mou`
  ADD PRIMARY KEY (`id_mou`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id_ngr`),
  ADD KEY `id_iti` (`id_iti`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `tf_dp`
--
ALTER TABLE `tf_dp`
  ADD PRIMARY KEY (`id_tfdp`),
  ADD KEY `id_bnk_tjn` (`id_bank_tjn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tf_lunas`
--
ALTER TABLE `tf_lunas`
  ADD PRIMARY KEY (`id_tf_lunas`),
  ADD KEY `id_bank_tjn` (`id_bank_tjn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `id_bank_tjn` (`id_bank_tjn`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_tujuan`
--
ALTER TABLE `bank_tujuan`
  MODIFY `id_bank_tjn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dp`
--
ALTER TABLE `dp`
  MODIFY `id_dp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dt_transaksi`
--
ALTER TABLE `dt_transaksi`
  MODIFY `id_det_tr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `itinerary`
--
ALTER TABLE `itinerary`
  MODIFY `id_iti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mou`
--
ALTER TABLE `mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id_ngr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tf_dp`
--
ALTER TABLE `tf_dp`
  MODIFY `id_tfdp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tf_lunas`
--
ALTER TABLE `tf_lunas`
  MODIFY `id_tf_lunas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id_transfer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `dt_transaksi`
--
ALTER TABLE `dt_transaksi`
  ADD CONSTRAINT `dt_transaksi_ibfk_1` FOREIGN KEY (`id_ngr`) REFERENCES `negara` (`id_ngr`),
  ADD CONSTRAINT `dt_transaksi_ibfk_2` FOREIGN KEY (`id_bank_tjn`) REFERENCES `bank_tujuan` (`id_bank_tjn`),
  ADD CONSTRAINT `dt_transaksi_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_ngr`) REFERENCES `negara` (`id_ngr`);

--
-- Constraints for table `itinerary`
--
ALTER TABLE `itinerary`
  ADD CONSTRAINT `itinerary_ibfk_2` FOREIGN KEY (`id_ngr`) REFERENCES `negara` (`id_ngr`);

--
-- Constraints for table `mou`
--
ALTER TABLE `mou`
  ADD CONSTRAINT `mou_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tf_dp`
--
ALTER TABLE `tf_dp`
  ADD CONSTRAINT `tf_dp_ibfk_1` FOREIGN KEY (`id_bank_tjn`) REFERENCES `bank_tujuan` (`id_bank_tjn`),
  ADD CONSTRAINT `tf_dp_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `tf_lunas`
--
ALTER TABLE `tf_lunas`
  ADD CONSTRAINT `tf_lunas_ibfk_1` FOREIGN KEY (`id_bank_tjn`) REFERENCES `bank_tujuan` (`id_bank_tjn`),
  ADD CONSTRAINT `tf_lunas_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_2` FOREIGN KEY (`id_bank_tjn`) REFERENCES `bank_tujuan` (`id_bank_tjn`),
  ADD CONSTRAINT `transfer_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
