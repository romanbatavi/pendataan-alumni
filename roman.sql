-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 03:36 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roman`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Beginner'),
(2, 'Intermediate'),
(3, 'Advance');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` varchar(30) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama_jurusan`, `keterangan`) VALUES
('111', 'Teknik Komputer & Jaringan', ''),
('112', 'Teknik Listrik', ''),
('113', 'Teknik Audio Video', ''),
('114', 'Teknik Kendaraan Ringan', ''),
('115', 'Teknik Mesin', ''),
('116', 'Rekayasa Perangkat Lunak', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lowongan`
--

CREATE TABLE `tbl_lowongan` (
  `id_lowongan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_lowongan` varchar(50) NOT NULL,
  `alamat_lowongan` text NOT NULL,
  `email_lowongan` varchar(50) NOT NULL,
  `no_lowongan` varchar(50) NOT NULL,
  `ket_lowongan` text NOT NULL,
  `tanggal_buat` date NOT NULL,
  `expired` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lowongan`
--

INSERT INTO `tbl_lowongan` (`id_lowongan`, `id_kategori`, `nama_lowongan`, `alamat_lowongan`, `email_lowongan`, `no_lowongan`, `ket_lowongan`, `tanggal_buat`, `expired`) VALUES
(12, 2, 'IT Support', 'Indomobil Finance - Jakarta', 'halo@indomobil.com', '0213658947', 'Usia 28 Tahun, Pendidikan S1 Teknik Infomatika IPK 2.75 Minimal, Mampu Berkerja Individu / Team, Penempatan Kantor Pusat', '2021-01-21', '2021-03-01'),
(13, 2, 'IT Operation & Support Staff', 'MMS Group Indonesia - Jakarta', 'mmsgroup@gmail.com', '0214563258', 'Support Bagian Hardware Software & Jaringan, Minimal Pendidikan D3 Teknik Informatika, Berpengalaman IT Support Lebih Diutamakan', '2021-01-21', '2021-03-01'),
(14, 3, 'Frontend & Backend', 'Sigma Solusi Servis', 'sigmasolusi@servis.com', '0214447852', 'Pendidikan S1 Teknik Informatika, Berpengalaman 2 Tahun, Menguasai Angular 7++, SQL, Springboot, Bisa Bekerja Sama Dalam Tim', '2021-01-21', '2021-03-01'),
(15, 1, 'IT Help Desk', 'IT Help Desk - Indonesia', 'kamihelpdesk@gmail.com', '0216658999', 'Usia Max 30 Tahun, Berpengalaman IT Support 2 Tahun, Menguasai Perakitan Komputer, Memahami & Mengerti Instalasi Software', '2021-01-21', '2021-03-01'),
(16, 2, 'Web Developer', 'Bithour Production - Jakarta', 'bithour@production.com', '0214563258', 'Menjadi Frontend & Mendesain UI UX Yang Sudah Ada, Memahami HTML PHP MySQL CSS3, Memiliki Pengetahuan Framework Platform & VCS. Terbiasa Dengan Laravel', '2021-01-21', '2021-03-01'),
(17, 3, 'Backend Engineer', 'Ruangguru - Jakarta', 'ruangguru@education.com', '0121312458', 'Memahami Dan Familiar Dengan Bahasa Pemograman Go Py Java Clojure Elixir, Berpengalaman Dengan Distribusi Penyimpanan Sistem Database Termasuk SQL & NonSQL, Mempunyai Kemampuan Problem Solving Yang Baik ', '2021-01-21', '0000-00-00'),
(19, 3, 'Backend', 'Petojo Barat, No.55 Jakarta Barat', 'kitapasti@bisa.com', '088767876666', 'Laravel, CakePHP', '2021-02-28', '2021-03-01'),
(21, 2, 'gfjg', 'hhgjfg', 'dwikifirmansyah27@gmail.com', '769', 'hhgkhg', '2021-03-02', '03/03/2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `nis` int(15) NOT NULL,
  `nisn` int(50) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nama_orang_tua` varchar(50) NOT NULL,
  `sekolah_asal` varchar(150) NOT NULL,
  `nomor_peserta` varchar(100) NOT NULL,
  `tahun_lulus` date NOT NULL,
  `kepala_sekolah` varchar(100) NOT NULL,
  `nomor_ijazah` varchar(200) NOT NULL,
  `nilai_rata_rata` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `guru` varchar(50) NOT NULL,
  `id_user` int(20) NOT NULL,
  `status` enum('yes','no') NOT NULL,
  `kondisi` enum('belum bekerja','bekerja','kuliah') NOT NULL,
  `detail_kondisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nisn`, `nama_siswa`, `alamat`, `no_telp`, `tempat_lahir`, `tgl_lahir`, `nama_orang_tua`, `sekolah_asal`, `nomor_peserta`, `tahun_lulus`, `kepala_sekolah`, `nomor_ijazah`, `nilai_rata_rata`, `nama_jurusan`, `keterangan`, `foto`, `guru`, `id_user`, `status`, `kondisi`, `detail_kondisi`) VALUES
(12111, 987711, 'Romanov', 'Kp.Rawabadung Rt.04/13 No.53 Cakung Jakarta Timur', '085536884202', 'Jakarta', '1998-02-14', 'M.Akil', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-411', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014511', '85', 'Teknik Listrik', 'Ms.Office, Autocad, Corel', '1.jpg', 'admin', 9, 'yes', 'bekerja', 'Apa'),
(12112, 987712, 'Zulaikha', 'Kp.Boelak Sari Blok.C No.44 Bekasi Tenggara', '085565271652', 'Bekasi', '1998-12-11', 'Lukas Yanto', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-412', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014512', '81', 'Rekayasa Perangkat Lunak', 'TOEFL', 'sample1.jpg', 'admin', 1, 'yes', 'belum bekerja', ''),
(12113, 987713, 'Imran Zakhaev', 'Buaran Regency Blok C4 No.77', '085565271777', 'Jakarta', '1998-12-29', 'Ali Abu', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-413', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014513', '79', 'Rekayasa Perangkat Lunak', 'Mikrotik', 'sample2.jpg', 'admin', 1, 'yes', 'belum bekerja', ''),
(12114, 987714, 'Cantika Putri Salsabila', 'Pekayon Barat Blok C6 No.88 Bekasi Tenggara', '085565271999', 'Malang', '1997-08-17', 'Siti', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-414', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014514', '81', 'Teknik Audio Video', 'Ms.Office, Digital Marketing', 'sample3.jpg', 'admin', 1, 'yes', 'belum bekerja', ''),
(12115, 987715, 'Keke', 'Cakung Timur No.99 Jakarta Timur', '088767651423', 'Jakarta', '1998-02-02', 'Sandhika Galih', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-415', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014515', '80', 'Teknik Komputer & Jaringan', 'Ms.Office', 'contoh-foto-PPG-Putri-213x300.jpg', 'Guru', 1, 'yes', 'belum bekerja', ''),
(12116, 987716, 'Rezky Rendi', 'Jatinegara Baru', '088767877767', 'Jakarta', '1998-12-04', 'Tubagus', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-416', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014516', '77', 'Teknik Komputer & Jaringan', 'Laravel', 'Foto (1).jpeg', 'admin', 1, 'yes', 'belum bekerja', ''),
(12117, 987717, 'Bella Luna', 'Pisangan Besar Jakarta Barat', '085576788876', 'Jakarta', '1998-12-08', 'Henda', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-417', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014517', '87', 'Teknik Komputer & Jaringan', 'Laravel, PHP', 'Foto (1).jpg', 'admin', 8, 'yes', 'belum bekerja', ''),
(12118, 987718, 'Alfian Sadewa', 'Bekasi Barat', '08816656765', 'Jakarta', '1998-12-09', 'Misel', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-418', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014518', '87', 'Rekayasa Perangkat Lunak', 'Typescript', 'Foto (8).jpg', 'Guru', 8, 'yes', 'belum bekerja', ''),
(12119, 987719, 'Hamdan Hamid', 'Boelak Kapal', '088166567776', 'Jakarta', '1998-09-08', 'Santoso', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-419', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014519', '0', 'Teknik Listrik', 'PHP PDO', 'Foto (3).jpg', 'admin', 32, 'yes', 'belum bekerja', ''),
(12120, 987720, 'Dedi Cahyadi', 'Buaran Raya', '088124445677', 'Bali', '1998-12-09', 'Hardi', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-420', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014520', '0', 'Teknik Komputer & Jaringan', 'React, Vue', 'Foto (9).jpg', 'admin', 33, 'yes', 'bekerja', 'rw3rw3rw3'),
(12121, 987721, 'Hartono Manunggal', 'Jalan Baru', '088675551233', 'Surabaya', '1998-12-09', 'Ujang', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-421', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014521', '89', 'Teknik Kendaraan Ringan', 'Public Speaking', 'Foto (4).jpg', 'Wiki Irman', 1, 'yes', 'belum bekerja', ''),
(12125, 987725, 'Hafidz', 'Boelak Raya', '088878765261', 'Bekasi', '1998-02-02', 'Hakim', 'SMK Dinamika Pembangunan 1 Jakarta', '4-11-68-72-425', '2016-08-17', 'Mulyana, SH,MM', 'DN-01 Mk 0014525', '0', 'Rekayasa Perangkat Lunak', 'CakePHP, Jquery, Bootstrap 4', 'Foto (15).jpg', 'admin', 35, 'yes', 'bekerja', 'di pt yamaha'),
(121127, 987727, 'Aboi', 'Bekasi', '088726152382', 'Bekasi', '1998-08-28', 'Hamid', 'SMK Dinamika Pembangunan 1 Jakarta', '123123213', '2016-12-08', 'dawdawdaw', '2312asdas', '89', 'Teknik Kendaraan Ringan', 'TOEFL', 'pp.jpg', 'admin', 1, 'yes', 'belum bekerja', '-');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('admin','guru','siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'admin', 'Admin 1', 'admin'),
(8, 'guru', 'guru', 'Guru', 'guru'),
(9, 'romanov', 'romanov', 'Romanov', 'siswa'),
(32, 'hamdan', 'hamdan', 'Hamdan Hamid', 'siswa'),
(33, 'dedi', 'dedi', 'Dedi Cahyadi', 'siswa'),
(34, 'wiki', 'wiki', 'Wiki Irman', 'guru'),
(35, 'apis', 'apis', 'Hafidz', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`,`nomor_ijazah`,`nomor_peserta`),
  ADD UNIQUE KEY `nomor_peserta` (`nomor_peserta`),
  ADD UNIQUE KEY `nomor_ijazah` (`nomor_ijazah`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  MODIFY `id_lowongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_lowongan`
--
ALTER TABLE `tbl_lowongan`
  ADD CONSTRAINT `fk_kategori_lowngan` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
