-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2019 at 04:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_nilai`
--

CREATE TABLE `data_nilai` (
  `nis` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `mapel` varchar(20) NOT NULL,
  `nilai_p` int(3) NOT NULL,
  `predikat_p` char(2) NOT NULL,
  `nilai_k` int(3) NOT NULL,
  `predikat_k` char(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `rata_rata` double NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nilai`
--

INSERT INTO `data_nilai` (`nis`, `nama`, `kelas`, `mapel`, `nilai_p`, `predikat_p`, `nilai_k`, `predikat_k`, `nilai_uts`, `nilai_uas`, `rata_rata`, `keterangan`) VALUES
('666', 'Jovi Julian', '11a', 'Php', 90, 'A', 90, 'A', 90, 90, 90, 'Lulus'),
('012', 'haruhiko', '11', 'Grafik', 90, 'A', 90, 'A', 90, 90, 90, 'Lulus'),
('22', 'p', '11', 'php', 90, 'a', 90, 'a', 90, 90, 90, 'lulus');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`nis`, `nama`, `kelas`, `alamat`, `no_tlp`) VALUES
('012', 'haruhiko', '11', 'bandung', '628'),
('555', 'nee', '11', 'bandung', '099'),
('666', 'Jovi Julian', '11a', 'bandung', '081313162548'),
('990', 'gallls', '12', 'mana aj', '821');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_user` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('1', 'jovi julian h', 'jovi', '123', 'admin'),
('2', 'lolo', 'olo', '123', 'admin'),
('3', 'haruhiko', 'haruhiko', '123', 'admin'),
('4', 'aa', 'aa', 'aa', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
