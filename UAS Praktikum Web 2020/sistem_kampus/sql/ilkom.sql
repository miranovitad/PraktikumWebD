-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 03:43 PM
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
('001001233', 'Ni Putu Mira Novita Dewi', 'miranovitad@gmail.com', 'P', '081338754954', 'Aktif'),
('090293023012', 'Ni Putu Mira Novita Dewi', 'miranovitad@gmail.com', 'P', '12121', 'Aktif'),
('09029302301212178', 'Ni Made Sinta Wahyuni', 'miranovitad@gmail.com', 'P', '081338754954', 'Aktif'),
('yog', 'Gregorius Ericco Jansen', 'miranovitad@gmail.com', 'P', '081338754954', 'Aktif');

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
('0902930230', 'Gregorius Ericco Jansen', 'muliantara@gmail.com', 'L', 'LEKTOR KEPALA', '081338754954', 'Jalan Paku Sari III No. 38', 'Protestan', 'Denpasar', '2020-05-04', 'Aktif'),
('090293023012121', 'I Gede Teguh Mahardika', 'muliantara@gmail.com', 'L', 'LEKTOR KEPALA', '081338754954', 'Jln. Kori Nuansa Barat V/32, Jimbaran', 'Katolik', 'Denpasar', '2020-05-08', 'Aktif'),
('09029302301212112121', 'Ni Made Sinta Wahyuni', 'novita_mira@rocketmail.com', 'P', 'ASISTEN AHLI', '081338754954', 'Jalan Paku Sari III No. 38', 'Hindu', 'Denpasar', '2020-05-01', 'Aktif');

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

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mhs`
--

CREATE TABLE `kelas_mhs` (
  `id_kelas_mhs` int(11) NOT NULL,
  `nim_mhs` varchar(30) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('1708561073', 'Ni Putu Mira Novita Dewi', 'P', 'Denpasar', '1998-04-20', 'Jalan Paku Sari III No. 38', 'Hindu', '081338754954', 'Fakultas Matematika dan Ilmu P', 'Informatika', 'Belum Terverifikasi'),
('1708561082', 'Ni Made Sinta Wahyuni', 'P', 'Denpasar', '2020-05-06', 'Jln. Kori Nuansa Barat V/32, Jimbaran', 'Hindu', '081338754954', 'Fakultas Matematika dan Ilmu P', 'Informatika', 'Aktif');

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
('001001233', '123123', '1', 'Aktif'),
('0902930230', 'hujan', '2', 'Belum Terverifikasi'),
('090293023012', '93279e3308bdbbeed946fc965017f67a', '1', 'Aktif'),
('090293023012121', '123321', '2', 'Belum Terverifikasi'),
('09029302301212112121', 'hujan', '2', 'Belum Terverifikasi'),
('09029302301212178', '898989', '1', 'Aktif'),
('yog', '4297f44b13955235245b2497399d7a93', '1', 'Aktif');

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
  MODIFY `id_bimbingan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas_mhs`
--
ALTER TABLE `kelas_mhs`
  MODIFY `id_kelas_mhs` int(11) NOT NULL AUTO_INCREMENT;

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
