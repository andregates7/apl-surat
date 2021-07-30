-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jun 2021 pada 13.11
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suratmasuk`
--
CREATE DATABASE IF NOT EXISTS `suratmasuk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `suratmasuk`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

DROP TABLE IF EXISTS `disposisi`;
CREATE TABLE `disposisi` (
  `id` int(11) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `tgl_dispo` date NOT NULL,
  `isi_dispo` text NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `id_surat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id`, `tujuan`, `tgl_dispo`, `isi_dispo`, `sifat`, `batas_waktu`, `catatan`, `id_surat`) VALUES
(7, 'Kabbag Akademik & Kemahasiswaan dan Sumber Daya', '2021-03-11', 'pindah homebase', 'Segera', '2021-03-24', '', 45),
(8, 'Bagian UMUM', '2021-03-11', 'Permohonan izin Melaksanakan PKL', 'Segera', '0000-00-00', '', 44),
(9, 'Bagian UMUM', '2021-03-13', 'Undangan Yudisium', 'Segera', '2021-07-08', 'mohon difollow up', 47),
(10, 'Bagian UMUM', '2021-03-16', 'Undangan untuk menghadiri acara Pameran Bursa Kerja', 'Wajib', '0000-00-00', 'mohon difollow up', 48),
(11, 'Bagian UMUM', '2021-03-16', 'Undangan Wisuda', 'Segera', '0000-00-00', '', 49),
(13, 'Bagian UMUM', '2021-03-16', 'Undangan Wisuda', 'Segera', '0000-00-00', '', 50),
(14, 'Kabbag Akademik & Kemahasiswaan dan Sumber Daya', '2021-03-23', 'pengajuan cuti dosen pns', 'Segera', '0000-00-00', '', 51);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klasifikasi`
--

DROP TABLE IF EXISTS `klasifikasi`;
CREATE TABLE `klasifikasi` (
  `id` int(11) NOT NULL,
  `kode_klasifikasi` varchar(50) NOT NULL,
  `jenis_klasifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `kode_klasifikasi`, `jenis_klasifikasi`) VALUES
(1, '000', 'UMUM'),
(2, '100', 'Pemerintahan'),
(3, '200', 'Politik'),
(4, '300', 'Keamanan/Ketertiban'),
(5, '400', 'Kesejahteraan Rakyat'),
(6, '500', 'Perekonomian'),
(7, '600', 'Pekerjaan Umum & Ketenagaan'),
(8, '700', 'Pengawasan'),
(9, '800', 'Kepegawaian'),
(10, '900', 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
--

DROP TABLE IF EXISTS `surat_keluar`;
CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `no_suratkeluar` varchar(255) NOT NULL,
  `surat_tujuan` varchar(255) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_dispo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `no_suratkeluar`, `surat_tujuan`, `kode`, `isi`, `tgl_surat`, `keterangan`, `id_dispo`) VALUES
(6, '1482/LL11/TU/2021', 'STIMIK Banjarmasin', '1482', 'Lengkapi persyaratan', '2021-03-10', '', 7),
(10, '1483/LL11/TU/2021', 'UNISKA Muhammad Arsyad Al Banjari', '1483', 'Bisa langsung melaksanakan PKL', '2021-03-11', '', 8),
(11, '1484/LL11/TU/2021', 'UIN Antasari', '1484', 'Menerima Undangan untuk menghadiri yudisium', '2021-03-13', '', 9),
(12, '1485/LL11/TU/2021', 'Dinas Sosial Tenaga Kerja Dan Transmigrasi Daerah Kalimantan Selatan', '1485', 'Siap laksanakan', '2021-03-16', '', 10),
(13, '1481/LL11/TU/2021', 'Universitas Lambung Mangkurat', '1481', 'Ok', '2021-03-16', '', 12),
(15, '1486/LL11/TU/2021', 'Universitas Muhammadiyah Banjarmasin', '1486', 'mohon melengkapi persyaratan cuti', '2021-03-23', '', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
--

DROP TABLE IF EXISTS `surat_masuk`;
CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `no_agenda` varchar(4) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `id_klasifikasi` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_agenda`, `no_surat`, `kode`, `asal_surat`, `isi`, `tgl_surat`, `tgl_diterima`, `id_klasifikasi`, `keterangan`) VALUES
(44, '0001', '0386/UNISKA-FKM/A.15/II/2021', '0386', 'UNISKA Muhammad Arsyad Al Banjari', 'Permohonan Izin Praktek Kerja Lapangan', '2021-02-05', '2021-03-10', 1, ''),
(45, '0002', '124/STIMIK/A.12/IV/2021', '1240', 'STIMIK Banjarmasin', 'Perpindahan Homebase Dosen', '2021-01-27', '2021-03-10', 9, ''),
(47, '0004', '1348/UIN/A.12/II/2021', '1348', 'UIN Antasari', 'Undangan menghadiri Yudisium', '2021-02-09', '2021-03-13', 1, ''),
(48, '0005', '560/402.1/411.203/2021', '560', 'Dinas Sosial Tenaga Kerja Dan Transmigrasi Daerah Kalimantan Selatan', 'Surat undangan untuk menghadiri acara Pameran Bursa Kerja', '2021-01-27', '2021-03-16', 1, 'Mohon di balas'),
(50, '0003', '0479/ULM/A.15/III/2021', '0479', 'Universitas Lambung Mangkurat', 'Undangan Wisuda', '2021-03-02', '2021-03-16', 1, ''),
(51, '0006', '560/402.1/411.203/2021', '1481', 'Universitas Muhammadiyah Banjarmasin', 'pengajuan cuti dosen pns', '2021-03-17', '2021-03-23', 9, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `nama`, `tempat_lahir`, `tanggal_lahir`, `telepon`, `alamat`, `foto`) VALUES
(1, 'admin', '422fd201ef389a6d1141620f59bf6558', 'Admin', 'Andre Sanjaya', 'Pelaihari', '1999-07-03', '085332598607', 'Jl.HKSN', '1.jpg'),
(2, 'rendy00', 'eed91a6fae331869f01a72ba49c6b9b9', 'Petugas', 'Rendy Pratama', 'Banjarbaru', '1999-09-21', '08973412750', 'Jl.Parit Baru', ''),
(3, 'shavee', '81dc9bdb52d04dc20036dbd8313ed055', 'Kepala Kabbag', 'Imam Syafii S.Sos', 'Jepara', '1997-05-17', '085287900912', 'Jl.Baru', 'asd.jpg'),
(11, 'm_usup', '1e17778d0d8217b035daffba02c06054', 'Petugas', 'Muhammad Yusuf', 'Asam-Asam', '1995-04-09', '083141242629', 'Jl. Pasar Lama ', ''),
(12, 'bang_gondrong', 'e49fcb6b7edf91143204e6e90465379a', 'Petugas', 'Fajar Asalole', 'Pagatan', '1998-10-14', '087736109912', 'Adhiyaksa 6', ''),
(16, 'upik-uwu', 'e60be3d916b36d76584992ba80587b74', 'Petugas', 'Taufik', 'Kotabaru', '1996-04-01', '08123461728', 'JL. Simpang Buntu', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indeks untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dispo` (`id_dispo`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klasifikasi` (`id_klasifikasi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`id_klasifikasi`) REFERENCES `klasifikasi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
