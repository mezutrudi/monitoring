-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 05:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Sulaiman');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nidn` varchar(45) NOT NULL,
  `nama_dosen` varchar(45) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `jenjang` enum('S1','S2','S3') NOT NULL,
  `status` enum('Y','T') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nidn`, `nama_dosen`, `jenkel`, `alamat`, `telp`, `jenjang`, `status`, `password`) VALUES
(1, '1', 'Indra Kusuma', 'L', '1', '1', 'S1', 'Y', '356a192b7913b04c54574d18c28d46e6395428ab'),
(2, '2', 'Dr. Nadifah', 'P', 'q', '122', 'S2', 'T', 'da4b9237bacccdf19c0760cab7aec4a8359010b0'),
(3, '76878687678', 'Mas Joko', '', 'Paiton', '09876543', 'S2', 'Y', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(45) NOT NULL,
  `status` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id_fakultas`, `nama_fakultas`, `status`) VALUES
(1, 'Fakultas Teknik', 'T'),
(2, 'Fakultas Agama', 'Y'),
(3, 'Fakultas SosHum', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kompetensi_dasar`
--

CREATE TABLE `tb_kompetensi_dasar` (
  `id_kompetensi_dasar` int(11) NOT NULL,
  `id_standar_kompetensi` int(11) NOT NULL,
  `nama_kompetensi_dasar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kompetensi_dasar`
--

INSERT INTO `tb_kompetensi_dasar` (`id_kompetensi_dasar`, `id_standar_kompetensi`, `nama_kompetensi_dasar`) VALUES
(1, 4, 'Tekun'),
(3, 13, 'Belajar ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(15) NOT NULL,
  `status` enum('Y','T') NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id_mahasiswa`, `id_prodi`, `id_tahun_akademik`, `nim`, `nama_mahasiswa`, `jenkel`, `alamat`, `tempat_lahir`, `tgl_lahir`, `telp`, `status`, `password`) VALUES
(2, 2, 9, '17999888', 'ANDRA', 'L', 'Paiton', 'Probolinggo', '2019-05-07', '08133344444', 'Y', '12121'),
(3, 2, 10, '123456', 'Nadifah', 'P', 'Pajarakan', 'SBY', '2021-07-22', '098765', 'Y', '980ac217c6b51e7dc41040bec1edfec8'),
(4, 1, 10, '123456', 'A\'yn', 'P', 'oo', '', '0000-00-00', '87865', 'Y', '65c180904c493c46797dcb8e5423d09a'),
(5, 1, 10, '123456', 'Tri Yuni', 'P', 'dyey', 'Paiton', '2008-01-22', '43645745', 'Y', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

CREATE TABLE `tb_materi` (
  `id_materi` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_materi`) VALUES
(1, 'BACA TULIS AL QURAN'),
(2, 'AL-FURUD AL-AINIYAH (FA)');

-- --------------------------------------------------------

--
-- Table structure for table `tb_monitoring`
--

CREATE TABLE `tb_monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_standar_kompetensi` int(11) NOT NULL,
  `status_tuntas` enum('Y','T') NOT NULL,
  `tanggal_tuntas` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_monitoring`
--

INSERT INTO `tb_monitoring` (`id_monitoring`, `id_dosen`, `id_mahasiswa`, `id_tahun_akademik`, `id_standar_kompetensi`, `status_tuntas`, `tanggal_tuntas`, `keterangan`) VALUES
(3, 1, 2, 1, 1, 'Y', '2021-07-04', 'ggg'),
(4, 1, 3, 1, 2, 'Y', '2021-07-04', 'yuu'),
(5, 1, 2, 1, 4, 'Y', '0000-00-00', 'ok'),
(7, 1, 2, 1, 2, 'Y', '2021-07-16', 'Mantep'),
(8, 3, 2, 1, 3, 'Y', '2021-07-16', 'Oke'),
(9, 1, 2, 1, 13, 'Y', '2021-07-16', 'Mantep'),
(10, 1, 2, 1, 14, 'Y', '2021-07-16', 'Oke'),
(11, 2, 3, 1, 2, 'Y', '2021-07-16', 'MAtep');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nama_prodi` varchar(45) NOT NULL,
  `status` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `id_fakultas`, `nama_prodi`, `status`) VALUES
(1, 1, 'Teknik Infromatika2', 'Y'),
(2, 2, 'Hukum Islam', 'Y'),
(3, 3, 'Jojon Darman, SH', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seting_dosen`
--

CREATE TABLE `tb_seting_dosen` (
  `id_setting_dosen` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_seting_dosen`
--

INSERT INTO `tb_seting_dosen` (`id_setting_dosen`, `id_dosen`, `id_mahasiswa`, `id_tahun_akademik`) VALUES
(18, 3, 5, 10),
(19, 3, 4, 10),
(20, 2, 3, 10),
(21, 2, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_standar_kompetensi`
--

CREATE TABLE `tb_standar_kompetensi` (
  `id_standar_kompetensi` int(11) NOT NULL,
  `id_materi` int(11) NOT NULL,
  `nama_standar_kompetensi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_standar_kompetensi`
--

INSERT INTO `tb_standar_kompetensi` (`id_standar_kompetensi`, `id_materi`, `nama_standar_kompetensi`) VALUES
(1, 1, 'Pengenalan huruf hijaiyah dan makharij al-huruf'),
(2, 1, 'Ahkam al-Huruf'),
(3, 2, 'Sejarah Ilmu Tauhid'),
(4, 2, 'Al Aqaid al Khamsun (akidah 50) '),
(13, 1, 'Al Aqaid al Khamsun (akidah 900) '),
(14, 1, 'Al Aqaid al Khamsun (akidah 90000) ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_akademik`
--

CREATE TABLE `tb_tahun_akademik` (
  `id_tahun_akademik` int(11) NOT NULL,
  `tahun` year(4) NOT NULL,
  `status_semester` enum('0','1') NOT NULL,
  `status` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahun_akademik`
--

INSERT INTO `tb_tahun_akademik` (`id_tahun_akademik`, `tahun`, `status_semester`, `status`) VALUES
(1, 2028, '0', 'Y'),
(9, 2009, '0', 'Y'),
(10, 2008, '1', 'Y'),
(11, 2000, '1', 'T'),
(12, 2029, '1', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `id_tugas` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_kompetensi_dasar` int(11) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`id_tugas`, `id_mahasiswa`, `id_kompetensi_dasar`, `file`) VALUES
(1, 1, 1, 'data.zip'),
(2, 1, 3, 'data.zip');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_setting_dosen`
-- (See below for the actual view)
--
CREATE TABLE `view_setting_dosen` (
`id_setting_dosen` int(11)
,`id_dosen` int(11)
,`id_mahasiswa` int(11)
,`id_tahun_akademik` int(11)
,`nidn` varchar(45)
,`nama_dosen` varchar(45)
,`nim` varchar(10)
,`nama_mahasiswa` varchar(50)
,`tahun` year(4)
);

-- --------------------------------------------------------

--
-- Structure for view `view_setting_dosen`
--
DROP TABLE IF EXISTS `view_setting_dosen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_setting_dosen`  AS  select `s`.`id_setting_dosen` AS `id_setting_dosen`,`s`.`id_dosen` AS `id_dosen`,`s`.`id_mahasiswa` AS `id_mahasiswa`,`s`.`id_tahun_akademik` AS `id_tahun_akademik`,`d`.`nidn` AS `nidn`,`d`.`nama_dosen` AS `nama_dosen`,`m`.`nim` AS `nim`,`m`.`nama_mahasiswa` AS `nama_mahasiswa`,`t`.`tahun` AS `tahun` from (((`tb_seting_dosen` `s` join `tb_dosen` `d` on(`s`.`id_dosen` = `d`.`id_dosen`)) join `tb_mahasiswa` `m` on(`s`.`id_mahasiswa` = `m`.`id_mahasiswa`)) join `tb_tahun_akademik` `t` on(`s`.`id_tahun_akademik` = `t`.`id_tahun_akademik`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `tb_kompetensi_dasar`
--
ALTER TABLE `tb_kompetensi_dasar`
  ADD PRIMARY KEY (`id_kompetensi_dasar`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tb_seting_dosen`
--
ALTER TABLE `tb_seting_dosen`
  ADD PRIMARY KEY (`id_setting_dosen`);

--
-- Indexes for table `tb_standar_kompetensi`
--
ALTER TABLE `tb_standar_kompetensi`
  ADD PRIMARY KEY (`id_standar_kompetensi`);

--
-- Indexes for table `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  ADD PRIMARY KEY (`id_tahun_akademik`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kompetensi_dasar`
--
ALTER TABLE `tb_kompetensi_dasar`
  MODIFY `id_kompetensi_dasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_materi`
--
ALTER TABLE `tb_materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_monitoring`
--
ALTER TABLE `tb_monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_seting_dosen`
--
ALTER TABLE `tb_seting_dosen`
  MODIFY `id_setting_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_standar_kompetensi`
--
ALTER TABLE `tb_standar_kompetensi`
  MODIFY `id_standar_kompetensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_tahun_akademik`
--
ALTER TABLE `tb_tahun_akademik`
  MODIFY `id_tahun_akademik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
