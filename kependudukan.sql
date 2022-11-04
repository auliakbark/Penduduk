-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Okt 2022 pada 07.03
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kependudukan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id_penduduk` int(2) NOT NULL,
  `nik` bigint(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `kelamin` enum('Perempuan','Laki-Laki') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status` enum('Sudah Menikah','Belum Menikah') NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
  `tempatlahir` varchar(100) NOT NULL,
  `tanggallahir` date NOT NULL,
  `golongandarah` enum('A','B','AB','O') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data untuk tabel `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_penduduk`, `nik`, `nama`, `kelamin`, `alamat`, `status`, `pekerjaan`, `kewarganegaraan`, `tempatlahir`, `tanggallahir`, `golongandarah`) VALUES
(76, 1234567890, 'Aulia Akbar Khoiruddin', 'Laki-Laki', 'Surakarta, Jawa Tengah', 'Sudah Menikah', 'Wiraswasta', 'WNI', 'Solo', '2003-09-11', 'A'),
(77, 487654321, 'Aulia', 'Perempuan', 'Jakarta Utara, DKI Jakarta', 'Belum Menikah', 'Karyawan Swasta', 'WNA', 'Singapura', '2000-10-02', 'AB');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id_penduduk`,`nik`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id_penduduk` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
