-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 03:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilkom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `jk` enum('P','L') DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `status_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nip`, `nama`, `email`, `jk`, `no_telp`, `status_admin`) VALUES
('197511052005011004', 'Komang Artawan', 'artawan@gmail.com', 'L', '081338754954', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `id_bimbingan` int(11) NOT NULL,
  `nip_dosen` varchar(30) DEFAULT NULL,
  `nim_mhs` varchar(30) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`id_bimbingan`, `nip_dosen`, `nim_mhs`, `keterangan`) VALUES
(3, '198006162005011001', '1708561073', NULL),
(4, '198006162005011001', '1708561082', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `jk` enum('P','L') DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status_dosen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama`, `email`, `jk`, `jabatan`, `no_telp`, `alamat`, `agama`, `tmp_lahir`, `tgl_lahir`, `status_dosen`) VALUES
('196401141994022001', 'Dra. Luh Gede Astuti,M.Kom.', 'lg.astuti[@]cs.unud.ac.id', 'P', 'LEKTOR', '098767564567', 'Denpasar', 'Hindu', 'Denpasar', '2019-04-28', 'Aktif'),
('198006162005011001', 'Agus Muliantara, S.Kom, M.Kom', 'muliantara[@]gmail.com', 'L', 'LEKTOR', '098767565444', 'Denpasar', 'Hindu', 'Denpasar', '2020-05-29', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nip_dosen` varchar(30) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `daya_tampung` int(11) DEFAULT NULL,
  `waktu` varchar(30) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nip_dosen`, `nama`, `daya_tampung`, `waktu`, `keterangan`, `status`) VALUES
(9, '198006162005011001', 'Praktikum Web D', 10, 'Jumat, 10.00 - 11.00 WITA', 'Test', 'Aktif'),
(10, '198006162005011001', 'Sistem Digital ', 1, 'Rabu', 'Test', 'Aktif'),
(11, '198006162005011001', 'Data Mining ', 2, 'Senin', 'Test', 'Aktif'),
(12, '198006162005011001', 'Kalkulus ', 1, 'Selasa', 'Test', 'Aktif'),
(13, '198006162005011001', 'Jaringan ', 1, 'Selasa', 'Test', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas_mhs` int(11) NOT NULL,
  `nim_mhs` varchar(30) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mhs`
--

INSERT INTO `kelas_mhs` (`id_kelas_mhs`, `nim_mhs`, `id_kelas`) VALUES
(12, '1708561073', 9),
(13, '1708561073', 10),
(14, '1708561073', 11),
(15, '1708561073', 12),
(16, '1708561073', 13);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Dosen'),
(3, 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` enum('P','L') DEFAULT NULL,
  `tmp_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `agama` varchar(10) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `fakultas` varchar(30) DEFAULT NULL,
  `prodi` varchar(30) DEFAULT NULL,
  `status_mhs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `tmp_lahir`, `tgl_lahir`, `alamat`, `agama`, `no_telp`, `fakultas`, `prodi`, `status_mhs`) VALUES
('1708561073', 'Ni Putu Mira Novita Dewi', '', 'Denpasar', '1998-04-28', 'Jalan Paku Sari', 'Hindu', '082146452980', 'Fakultas Matematika dan Ilmu P', 'Informatika', 'Aktif'),
('1708561082', 'Ni Made Sinta Wahyuni', 'P', 'Denpasar', '2020-03-29', 'Jimbaran', 'Hindu', '081234543243', 'Fakultas Matematika dan Ilmu P', 'Informatika', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mk` int(11) NOT NULL,
  `nama_mk` varchar(50) DEFAULT NULL,
  `ket_mk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(30) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `status_akun` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `password`, `level`, `status_akun`) VALUES
('1708561073', 'cc03e747a6afbbcbf8be7668acfebee5', '3', 'Aktif'),
('1708561082', 'cc03e747a6afbbcbf8be7668acfebee5', '3', 'Aktif'),
('196401141994022001', 'cc03e747a6afbbcbf8be7668acfebee5', '2', 'Mutasi'),
('197511052005011004', 'cc03e747a6afbbcbf8be7668acfebee5', '1', 'Aktif'),
('198006162005011001', 'cc03e747a6afbbcbf8be7668acfebee5', '2', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`id_bimbingan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  ADD PRIMARY KEY (`id_kelas_mhs`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id_mk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
