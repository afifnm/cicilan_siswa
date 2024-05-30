-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2019 at 08:36 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cicilan_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `spp1` int(11) NOT NULL,
  `ps1` int(11) NOT NULL,
  `pap1` int(11) NOT NULL,
  `osis1` int(11) NOT NULL,
  `psg1` int(11) NOT NULL,
  `uus1` int(11) NOT NULL,
  `un1` int(11) NOT NULL,
  `kk1` int(11) NOT NULL,
  `spp2` int(11) NOT NULL,
  `ps2` int(11) NOT NULL,
  `pap2` int(11) NOT NULL,
  `osis2` int(11) NOT NULL,
  `psg2` int(11) NOT NULL,
  `uus2` int(11) NOT NULL,
  `un2` int(11) NOT NULL,
  `kk2` int(11) NOT NULL,
  `spp3` int(11) NOT NULL,
  `ps3` int(11) NOT NULL,
  `pap3` int(11) NOT NULL,
  `osis3` int(11) NOT NULL,
  `psg3` int(11) NOT NULL,
  `uus3` int(11) NOT NULL,
  `un3` int(11) NOT NULL,
  `kk3` int(11) NOT NULL,
  `tweak1` int(11) NOT NULL,
  `tweak2` int(11) NOT NULL,
  `tweak3` int(11) NOT NULL,
  `as1` int(11) NOT NULL,
  `as2` int(11) NOT NULL,
  `as3` int(11) NOT NULL,
  `kop1` int(11) NOT NULL,
  `kop2` int(11) NOT NULL,
  `kop3` int(11) NOT NULL,
  `uraian` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `tahun_ajaran`, `id_siswa`, `spp1`, `ps1`, `pap1`, `osis1`, `psg1`, `uus1`, `un1`, `kk1`, `spp2`, `ps2`, `pap2`, `osis2`, `psg2`, `uus2`, `un2`, `kk2`, `spp3`, `ps3`, `pap3`, `osis3`, `psg3`, `uus3`, `un3`, `kk3`, `tweak1`, `tweak2`, `tweak3`, `as1`, `as2`, `as3`, `kop1`, `kop2`, `kop3`, `uraian`, `tanggal`) VALUES
(37, '2017/2018', 14, 1015000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'spp', '2019-10-22'),
(38, '2017/2018', 14, 0, 500000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ps', '2019-10-22'),
(40, '2017/2018', 14, 0, 100000, 180000, 100000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'ps,pap,osis', '2019-10-22'),
(41, '2017/2018', 14, 0, 0, 0, 0, 60000, 195000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 15000, 0, 0, 10000, 0, 0, 'lunas', '2019-10-22'),
(43, '2017/2018', 14, 0, 0, 0, 0, 0, 0, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'kalender', '2019-10-22'),
(48, '2019/2020', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 10000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '-', '2019-10-22'),
(49, '2019/2020', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1257000, 300000, 180000, 100000, 0, 195000, 460000, 0, 0, 0, 0, 0, 0, 10000, 0, 0, 0, 'lunas', '2019-10-22'),
(51, '2019/2020', 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20000, 0, 0, 0, 0, 0, 0, 'lunas', '2019-10-22'),
(52, '2018/2019', 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1015000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'spp', '2019-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`) VALUES
(1, 'Tek. Audio Video'),
(2, 'Tek. Kendaraan Ringan'),
(3, 'Multimedia'),
(4, 'Tek. Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `norek` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `saldo` decimal(15,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama`, `email`, `alamat`, `phone`, `norek`, `logo`, `judul`, `saldo`) VALUES
(1, 'Gage Design', 'gagedesignsolo@gmail.com', 'Jln. Monginsidi III/6, Margorejo, Solo', '(0271) 654038', 'BCA : Bambang Nugroho No Rek. 015 318 899', 'logo.png', 'Aplikasi Keuangan Sekolah', '30000000');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `spp1` int(11) NOT NULL,
  `ps1` int(11) NOT NULL,
  `pap1` int(11) NOT NULL,
  `osis1` int(11) NOT NULL,
  `psg1` int(11) NOT NULL,
  `uus1` int(11) NOT NULL,
  `un1` int(11) NOT NULL,
  `kk1` int(11) NOT NULL,
  `spp2` int(11) NOT NULL,
  `ps2` int(11) NOT NULL,
  `pap2` int(11) NOT NULL,
  `osis2` int(11) NOT NULL,
  `psg2` int(11) NOT NULL,
  `uus2` int(11) NOT NULL,
  `un2` int(11) NOT NULL,
  `kk2` int(11) NOT NULL,
  `spp3` int(11) NOT NULL,
  `ps3` int(11) NOT NULL,
  `pap3` int(11) NOT NULL,
  `osis3` int(11) NOT NULL,
  `psg3` int(11) NOT NULL,
  `uus3` int(11) NOT NULL,
  `un3` int(11) NOT NULL,
  `kk3` int(11) NOT NULL,
  `tweak1` int(11) NOT NULL,
  `tweak2` int(11) NOT NULL,
  `tweak3` int(11) NOT NULL,
  `as1` int(11) NOT NULL,
  `as2` int(11) NOT NULL,
  `as3` int(11) NOT NULL,
  `kop1` int(11) NOT NULL,
  `kop2` int(11) NOT NULL,
  `kop3` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) NOT NULL,
  `tampilkan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `spp1`, `ps1`, `pap1`, `osis1`, `psg1`, `uus1`, `un1`, `kk1`, `spp2`, `ps2`, `pap2`, `osis2`, `psg2`, `uus2`, `un2`, `kk2`, `spp3`, `ps3`, `pap3`, `osis3`, `psg3`, `uus3`, `un3`, `kk3`, `tweak1`, `tweak2`, `tweak3`, `as1`, `as2`, `as3`, `kop1`, `kop2`, `kop3`, `tahun_ajaran`, `tampilkan`) VALUES
(7, 1015000, 600000, 180000, 100000, 60000, 195000, 0, 50000, 1015000, 300000, 180000, 100000, 60000, 195000, 350000, 50000, 1015000, 300000, 180000, 100000, 0, 195000, 460000, 50000, 0, 0, 20000, 15000, 0, 0, 10000, 0, 0, '2017/2018', 0),
(8, 1015000, 600000, 180000, 100000, 60000, 195000, 0, 50000, 1015000, 300000, 180000, 100000, 60000, 195000, 350000, 50000, 1015000, 300000, 180000, 100000, 0, 195000, 460000, 50000, 0, 0, 20000, 30000, 20000, 10000, 10000, 0, 0, '2018/2019', 0),
(10, 1267000, 600000, 180000, 100000, 60000, 195000, 0, 50000, 1267000, 300000, 180000, 100000, 60000, 195000, 350000, 50000, 1267000, 300000, 180000, 100000, 0, 195000, 460000, 50000, 0, 0, 20000, 30000, 20000, 10000, 10000, 0, 0, '2019/2020', 0),
(11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2016/2017', 0),
(12, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2015/2016', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `keterangan`, `nominal`, `tanggal`) VALUES
(1, 'Beli bendera baru', 100000, '2019-10-01'),
(2, 'Konsumsi', 500000, '2019-10-03'),
(4, 'bayar ongkos kirim', 500000, '2019-10-01'),
(5, 'Perbaikan komputer', 500000, '2019-10-18');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nisn` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelamin` varchar(100) NOT NULL,
  `id_jurusan` varchar(100) NOT NULL,
  `kelas` varchar(100) NOT NULL,
  `angkatan` varchar(100) NOT NULL,
  `spp1` int(11) NOT NULL,
  `ps1` int(11) NOT NULL,
  `pap1` int(11) NOT NULL,
  `osis1` int(11) NOT NULL,
  `psg1` int(11) NOT NULL,
  `uus1` int(11) NOT NULL,
  `un1` int(11) NOT NULL,
  `kk1` int(11) NOT NULL,
  `spp2` int(11) NOT NULL,
  `ps2` int(11) NOT NULL,
  `pap2` int(11) NOT NULL,
  `osis2` int(11) NOT NULL,
  `psg2` int(11) NOT NULL,
  `uus2` int(11) NOT NULL,
  `un2` int(11) NOT NULL,
  `kk2` int(11) NOT NULL,
  `spp3` int(11) NOT NULL,
  `ps3` int(11) NOT NULL,
  `pap3` int(11) NOT NULL,
  `osis3` int(11) NOT NULL,
  `psg3` int(11) NOT NULL,
  `uus3` int(11) NOT NULL,
  `un3` int(11) NOT NULL,
  `kk3` int(11) NOT NULL,
  `tweak1` int(11) NOT NULL,
  `tweak2` int(11) NOT NULL,
  `tweak3` int(11) NOT NULL,
  `as1` int(11) NOT NULL,
  `as2` int(11) NOT NULL,
  `as3` int(11) NOT NULL,
  `kop1` int(11) NOT NULL,
  `kop2` int(11) NOT NULL,
  `kop3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nisn`, `nama`, `kelamin`, `id_jurusan`, `kelas`, `angkatan`, `spp1`, `ps1`, `pap1`, `osis1`, `psg1`, `uus1`, `un1`, `kk1`, `spp2`, `ps2`, `pap2`, `osis2`, `psg2`, `uus2`, `un2`, `kk2`, `spp3`, `ps3`, `pap3`, `osis3`, `psg3`, `uus3`, `un3`, `kk3`, `tweak1`, `tweak2`, `tweak3`, `as1`, `as2`, `as3`, `kop1`, `kop2`, `kop3`) VALUES
(11, '3001', '3001-1', 'Afif Nuruddin M', 'Laki-laki', '3', 'M1', '2019', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '3002', '3001-2', 'Andi Prasetyo', 'Laki-laki', '4', 'TKJ-1', '2018', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '2001', '2001-1', 'Basuki', 'Laki-laki', '1', 'TAV-1', '2016', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1015000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '3003', '3002-1', 'Wahyu Prasetyo', 'Laki-laki', '1', 'TAV-2', '2017', 1015000, 600000, 180000, 100000, 60000, 195000, 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 1267000, 300000, 180000, 100000, 0, 195000, 460000, 0, 0, 0, 20000, 15000, 0, 10000, 10000, 0, 0),
(15, '3004', '3002-2', 'Gareth Bale', 'Laki-laki', '1', 'TAV-1', '2017', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `level`, `last_login`) VALUES
(1, 'admin', 'SMK Pembangunan Nasional', '$2y$05$5YkxCpx/xPqfrTSDVhgqWe7vKVlzW3b38jjjNiawHiVikrMvy683O', 'Admin', '0000-00-00 00:00:00'),
(4, 'tiara', 'Mutiara', '$2y$05$ZPRgdKKvxbZteSqnFMrzS.ki/u4rr9QD2ZKynJ2pyLYzwai9iaZrO', 'Front Office', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
