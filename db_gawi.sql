-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 09:38 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gawi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen_keluar`
--

CREATE TABLE `absen_keluar` (
  `id_absen_keluar` int(11) NOT NULL,
  `status_keluar` varchar(50) NOT NULL,
  `id_absen_masuk` int(11) NOT NULL,
  `tgl_waktu_keluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `lat_keluar` varchar(80) NOT NULL,
  `long_keluar` varchar(80) NOT NULL,
  `ket_keluar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `absen_masuk`
--

CREATE TABLE `absen_masuk` (
  `id_absen_masuk` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tgl_waktu_masuk` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_kehadiran` varchar(50) NOT NULL,
  `lat_masuk` varchar(80) NOT NULL,
  `long_masuk` varchar(80) NOT NULL,
  `ket_masuk` text NOT NULL,
  `stat` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen_masuk`
--

INSERT INTO `absen_masuk` (`id_absen_masuk`, `id_pegawai`, `tgl_waktu_masuk`, `status_kehadiran`, `lat_masuk`, `long_masuk`, `ket_masuk`, `stat`) VALUES
(12, 10, '2022-06-19 07:20:15', 'Hadir', '-2.4319494', '115.2481844', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(8) NOT NULL,
  `id_pegawai` int(8) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status_cuti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `id_pegawai`, `tanggal_mulai`, `tanggal_selesai`, `jenis_cuti`, `keterangan`, `status_cuti`) VALUES
(3, 3, '2021-06-01', '2021-06-04', 'Cuti Besar', '', ''),
(4, 5, '2021-06-22', '2021-06-25', 'Cuti Sakit', '', ''),
(5, 6, '2021-06-01', '2021-06-25', 'Cuti Besar', 'kj', ''),
(6, 7, '2021-06-27', '2021-07-30', 'Cuti Besar', 'asd', 'DISETUJUI'),
(8, 7, '2021-06-28', '2021-07-10', 'Cuti Besar', '', 'DITOLAK'),
(9, 10, '2022-06-18', '2022-06-19', 'Cuti Besar', '', 'DISETUJUI'),
(10, 8, '2022-06-19', '2022-06-21', 'Cuti Karena Alasan Penting', 'urusan keluarga', 'DISETUJUI'),
(11, 10, '2022-06-19', '2022-06-23', 'Cuti Karena Alasan Penting', 'acara keluarga', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(8) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(3, 'Direktur Utama'),
(7, 'Manajer Tambang'),
(8, 'Sekretaris'),
(9, 'Divisi Perencanaan'),
(10, 'Divis Operasi'),
(11, 'Divisi Pengolahan'),
(12, 'Divisi Administarasi dan Keuangan'),
(13, 'Staff Penambang'),
(14, 'Staff Mekanik');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(8) NOT NULL,
  `id_pegawai` int(8) NOT NULL,
  `jabatan_saat_mutasi` varchar(50) NOT NULL,
  `tanggal_efektif` date NOT NULL,
  `tujuan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_pegawai`, `jabatan_saat_mutasi`, `tanggal_efektif`, `tujuan`) VALUES
(5, 8, 'Bagian Penambangan', '2022-06-17', 'Bagian Teknisi Banjarmasin');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(8) NOT NULL,
  `kode_pegawai` varchar(50) NOT NULL,
  `nama_pegawai` varchar(80) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  `foto_pegawai` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `kode_pegawai`, `nama_pegawai`, `tgl_lahir`, `tempat_lahir`, `jenis_kelamin`, `alamat`, `no_telp`, `tgl_bergabung`, `foto_pegawai`, `email`, `password`, `id_jabatan`) VALUES
(8, 'K001', 'Badiansah', '2021-08-12', 'tapin', 'Laki-Laki', 'jl rambutan', '09238128312', '2022-06-07', '5c1d0c1d67d9f4d7904a1dd256b95b2b.png', 'tess@gmail.com', '202cb962ac59075b964b07152d234b70', 14),
(10, 'K002', 'Siti Khadijah', '2000-08-09', 'BANJARMASIN', 'Laki-Laki', 'jl. garis 1 komp.mitra bakti jalur 8 no.154', '09238128312', '2022-06-08', '4e64d8c53cd1f6f0ef9d2b7e4ab17b77.jpg', 'siti@gmail.com', '202cb962ac59075b964b07152d234b70', 8);

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(8) NOT NULL,
  `id_pegawai` int(8) NOT NULL,
  `tgl_gaji` date NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan` int(11) NOT NULL,
  `bpjs` int(11) NOT NULL,
  `hutang` int(11) NOT NULL,
  `gaji_bersih` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id_penggajian`, `id_pegawai`, `tgl_gaji`, `gaji_pokok`, `tunjangan`, `bpjs`, `hutang`, `gaji_bersih`) VALUES
(5, 8, '2022-06-19', 4000000, 200000, 50000, 50000, 4100000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `no_hp`, `email`, `gambar`, `level`) VALUES
(1, 'Admin Utama', '21232f297a57a5a743894a0e4a801fc3', '0882333', 'admin@gmail.com', '', 1),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', '08123123123', 'pimpinan@gmail.com', 'f8e68211045f70d3e5376fb8478eb94b.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pensiun`
--

CREATE TABLE `pensiun` (
  `id_pensiun` int(8) NOT NULL,
  `id_pegawai` int(8) NOT NULL,
  `masa_kerja` int(3) NOT NULL,
  `mulai_pensiun` date NOT NULL,
  `jenis_pensiun` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pensiun`
--

INSERT INTO `pensiun` (`id_pensiun`, `id_pegawai`, `masa_kerja`, `mulai_pensiun`, `jenis_pensiun`) VALUES
(5, 8, 30, '2022-06-19', 'berhenti');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `id_penugasan` int(11) NOT NULL,
  `tanggal_penugasan` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pegawai2` int(11) NOT NULL,
  `maksud_perjalanan` varchar(100) NOT NULL,
  `alat_angkut` varchar(100) NOT NULL,
  `tempat_berangkat` varchar(100) NOT NULL,
  `tempat_tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_peringatan`
--

CREATE TABLE `surat_peringatan` (
  `id_surat_peringatan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tahapan_sp` varchar(30) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `alasan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_peringatan`
--

INSERT INTO `surat_peringatan` (`id_surat_peringatan`, `id_pegawai`, `tahapan_sp`, `tanggal_surat`, `alasan`, `keterangan`) VALUES
(1, 100, 'PERTAMA (SP-1)', '2022-06-09', 'terlambat kerja 5x', 'tolong diperhatikan lagi..');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id_surat_tugas` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `latar_belakang_penugasan` varchar(100) NOT NULL,
  `tujuan_penugasan` varchar(100) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id_surat_tugas`, `id_pegawai`, `latar_belakang_penugasan`, `tujuan_penugasan`, `tanggal_mulai`, `tanggal_selesai`) VALUES
(1, 8, 'Sehubungan dengan telah dimulainya pembangunan Permata Hijau yang berada di Jalan Raya No. 123 Kabup', 'Untuk melakukan pengawasan terhadap pekerjaan pembangunan Hotel Permata Hijau', '2022-06-19', '2022-06-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen_keluar`
--
ALTER TABLE `absen_keluar`
  ADD PRIMARY KEY (`id_absen_keluar`),
  ADD KEY `id_absen_masuk` (`id_absen_masuk`);

--
-- Indexes for table `absen_masuk`
--
ALTER TABLE `absen_masuk`
  ADD PRIMARY KEY (`id_absen_masuk`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pensiun`
--
ALTER TABLE `pensiun`
  ADD PRIMARY KEY (`id_pensiun`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`id_penugasan`);

--
-- Indexes for table `surat_peringatan`
--
ALTER TABLE `surat_peringatan`
  ADD PRIMARY KEY (`id_surat_peringatan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id_surat_tugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen_keluar`
--
ALTER TABLE `absen_keluar`
  MODIFY `id_absen_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `absen_masuk`
--
ALTER TABLE `absen_masuk`
  MODIFY `id_absen_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pensiun`
--
ALTER TABLE `pensiun`
  MODIFY `id_pensiun` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `id_penugasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_peringatan`
--
ALTER TABLE `surat_peringatan`
  MODIFY `id_surat_peringatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id_surat_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
