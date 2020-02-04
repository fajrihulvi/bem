-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2020 pada 03.37
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspirasi`
--

CREATE TABLE `aspirasi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jenis_aspirasi` int(11) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aspirasi`
--

INSERT INTO `aspirasi` (`id`, `tanggal`, `id_jenis_aspirasi`, `id_ormawa`, `isi`) VALUES
(2, '2020-01-27 00:00:00', 3, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae nunc tortor. Aliquam varius arcu sed laoreet sagittis. Duis ultrices volutpat consectetur. Phasellus posuere, turpis ac tristique venenatis, ex nibh laoreet sem, eget lobortis tortor dolor ut lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mattis orci quis nisl aliquam, et eleifend purus luctus. Proin nec mauris at augue mattis pretium. Maecenas venenatis nulla posuere elit pulvinar hendrerit. Fusce dignissim rhoncus mi, non facilisis eros aliquam mattis. Sed hendrerit convallis felis ut maximus. Nulla congue tristique enim at dictum. Nulla non velit condimentum, fermentum nunc quis, volutpat elit. In hac habitasse platea dictumst.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` char(10) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stok`, `satuan`) VALUES
(4, '1234', 'batu', 98, 'buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id`, `tanggal`, `judul`, `isi`, `foto`) VALUES
(4, '2020-01-27', 'Pengumuman Peserta Beasiswa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae nunc tortor. Aliquam varius arcu sed laoreet sagittis. Duis ultrices volutpat consectetur. Phasellus posuere, turpis ac tristique venenatis, ex nibh laoreet sem, eget lobortis tortor dolor ut lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mattis orci quis nisl aliquam, et eleifend purus luctus. Proin nec mauris at augue mattis pretium. Maecenas venenatis nulla posuere elit pulvinar hendrerit. Fusce dignissim rhoncus mi, non facilisis eros aliquam mattis. Sed hendrerit convallis felis ut maximus. Nulla congue tristique enim at dictum. Nulla non velit condimentum, fermentum nunc quis, volutpat elit. In hac habitasse platea dictumst.', 'news-2.jpg'),
(5, '2020-01-31', 'Tutorial CRUD Realtime dengan Codeigniter dan Push', 'Membuat pagination merupakan proses mengurutkan data dengan nomor urut tertentu ke dalam beberapa page (halaman). Hal ini penting untuk dilakukan mengingat data yang cukup banyak pada suatu halaman website. Jika anda browsing di google, maka Anda akan melihat pada bagian bawah hasil penelusuran seperti gambar berikut', 'news-1.jpg'),
(6, '2020-02-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae nunc tortor. Aliquam varius arcu sed laoreet sagittis. Duis ultrices volutpat consectetur. Phasellus posuere, turpis ac tristique venenatis, ex nibh laoreet sem, eget lobortis tortor dolor ut lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mattis orci quis nisl aliquam, et eleifend purus luctus. Proin nec mauris at augue mattis pretium. Maecenas venenatis nulla posuere elit pulvinar hendrerit. Fusce dignissim rhoncus mi, non facilisis eros aliquam mattis. Sed hendrerit convallis felis ut maximus. Nulla congue tristique enim at dictum. Nulla non velit condimentum, fermentum nunc quis, volutpat elit. In hac habitasse platea dictumst.', 'news-3.jpg'),
(7, '2020-02-03', 'Pegumuman Peserta Beasiswa', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vitae nunc tortor. Aliquam varius arcu sed laoreet sagittis. Duis ultrices volutpat consectetur. Phasellus posuere, turpis ac tristique venenatis, ex nibh laoreet sem, eget lobortis tortor dolor ut lacus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris mattis orci quis nisl aliquam, et eleifend purus luctus. Proin nec mauris at augue mattis pretium. Maecenas venenatis nulla posuere elit pulvinar hendrerit. Fusce dignissim rhoncus mi, non facilisis eros aliquam mattis. Sed hendrerit convallis felis ut maximus. Nulla congue tristique enim at dictum. Nulla non velit condimentum, fermentum nunc quis, volutpat elit. In hac habitasse platea dictumst.', 'news-4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_akademik`
--

CREATE TABLE `jenis_akademik` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_akademik`
--

INSERT INTO `jenis_akademik` (`id`, `jenis`) VALUES
(2, 'Kegiatan Mahasiswa Baru'),
(3, 'Kuliah dan Ujian'),
(4, 'Pendaftaran KRS Mahasiswa Lama'),
(5, 'Remedial'),
(6, 'Periode Sidang Skripsi/Proyek Akhir Semester Genap'),
(7, 'Dies Natalis'),
(8, 'Presentasi Magang'),
(9, 'Wisuda Angkatan 36 (tentatif)'),
(10, 'Semester Antara'),
(11, 'Hari Libur Nasional'),
(12, 'Periode PMB Tahun Akademik 2020/2021'),
(13, 'Awal Kuliah Semester Ganjil 2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_aspirasi`
--

CREATE TABLE `jenis_aspirasi` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_aspirasi`
--

INSERT INTO `jenis_aspirasi` (`id`, `jenis`) VALUES
(3, 'Keluhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `jenis`) VALUES
(1, 'Liburan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `id` int(11) NOT NULL,
  `tgl_mulai` varchar(20) NOT NULL,
  `tgl_selesai` varchar(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tahun_ajar` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kalender_akademik`
--

INSERT INTO `kalender_akademik` (`id`, `tgl_mulai`, `tgl_selesai`, `id_jenis`, `keterangan`, `semester`, `tahun_ajar`) VALUES
(4, '01/27/2020', '01/30/2020', 4, 'Pembayaran BPP Pokok dan Kemahasiswaan', 'Genap', '2019/2020'),
(5, '01/27/2020', '01/30/2020', 4, 'Pendaftaraan Aktif Kembali Setelah cuti/Bolos', 'Genap', '2019/2020'),
(6, '12/31/2019', '', 4, 'KHS Semester Ganjil 2019/2020', 'Genap', '2019/2020'),
(7, '03/02/2020', '07/04/2020', 3, 'Periode Kuliah', 'Genap', '2019/2020'),
(8, '02/06/2020', '', 3, 'Cetak  KRU (Kartu Rencana Ujian)', 'Genap', '2019/2020'),
(9, '08/03/2020', '08/06/2020', 5, 'Pendaftaran dan Pembayaran Remedial', 'Genap', '2019/2020'),
(10, '07/31/2020', '08/22/2020', 6, '', 'Genap', '2019/2020'),
(11, '04/01/2020', '', 7, '', 'Genap', '2019/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_kegiatan`
--

CREATE TABLE `kalender_kegiatan` (
  `id` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `id_jenis_kegiatan` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kalender_kegiatan`
--

INSERT INTO `kalender_kegiatan` (`id`, `tgl_mulai`, `tgl_selesai`, `nama_kegiatan`, `id_ormawa`, `id_jenis_kegiatan`, `foto`) VALUES
(4, '2020-02-04', '2020-02-05', 'Naik Gunung', 6, 1, '1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_peminjaman`
--

CREATE TABLE `kalender_peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_peminjam` int(11) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `isAccept` enum('pending','diterima','ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kalender_peminjaman`
--

INSERT INTO `kalender_peminjaman` (`id`, `tgl_pinjam`, `tgl_kembali`, `lama_pinjam`, `id_barang`, `jumlah`, `id_peminjam`, `id_ormawa`, `status`, `isAccept`) VALUES
(4, '2020-02-04', '2020-02-06', 10, 4, 1, 201731088, 6, '1', 'diterima'),
(5, '2020-02-03', NULL, 11, 4, 2, 201731088, 6, '0', 'diterima'),
(10, '2020-02-04', NULL, 1, 4, 1, 201731088, 6, '0', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `judul`, `isi`, `time`, `link`, `status`) VALUES
(10, 'Peminjaman', 'Tajul Arifin Sirajudin mengajukan peminjaman', '2020-02-04 02:20:53', 'permintaan_pinjam', '1'),
(11, 'Peminjaman', 'Tajul Arifin Sirajudin mengajukan peminjaman', '2020-02-04 02:20:53', 'permintaan_pinjam', '1'),
(12, 'Peminjaman', 'Tajul Arifin Sirajudin mengajukan peminjaman', '2020-02-04 02:20:53', 'permintaan_pinjam', '1'),
(13, 'Aspirasi', 'Tajul Arifin Sirajudin menambah aspirasi', '2020-02-04 02:20:42', 'aspirasi', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ormawa`
--

CREATE TABLE `ormawa` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ormawa`
--

INSERT INTO `ormawa` (`id`, `nama`, `logo`) VALUES
(6, 'Fotografi Of STT-PLN', 'FOST.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nim` char(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_telp` char(12) NOT NULL,
  `id_ormawa` int(11) NOT NULL,
  `hak_akses` enum('admin','user','mahasiswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nim`, `nama`, `password`, `email`, `no_telp`, `id_ormawa`, `hak_akses`) VALUES
('201731088', 'Tajul Arifin Sirajudin', '$2y$10$P1q3FXA.pHghIW/J9xxZJ.ucegmd0S3Erp4qHQjc6UIOFclf3CvxK', 'pgwarso@gmail.com', '085338939606', 6, 'mahasiswa'),
('admin', 'Admin', '$2y$10$vSCnm8U7qhWyvHa.SxDGKeJ653xyoGYn3mfWvFslOPvF/ld/HwYhC', 'admin@gmail.com', '085338939360', 0, 'admin'),
('user', 'User', '$2y$10$3sQyMH2MHa.ShRZuY.o6Juj9P3YsaR5N0tT3gnQXgD4c2hgTfZI56', 'user@gmail.com', '085338397969', 0, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ormawa` (`id_ormawa`),
  ADD KEY `id_jenis_aspirasi` (`id_jenis_aspirasi`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_akademik`
--
ALTER TABLE `jenis_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_aspirasi`
--
ALTER TABLE `jenis_aspirasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indeks untuk tabel `kalender_kegiatan`
--
ALTER TABLE `kalender_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jenis_kegiatan` (`id_jenis_kegiatan`),
  ADD KEY `id_ormawa` (`id_ormawa`),
  ADD KEY `id_jenis_kegiatan_2` (`id_jenis_kegiatan`);

--
-- Indeks untuk tabel `kalender_peminjaman`
--
ALTER TABLE `kalender_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ormawa` (`id_ormawa`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jenis_akademik`
--
ALTER TABLE `jenis_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jenis_aspirasi`
--
ALTER TABLE `jenis_aspirasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kalender_kegiatan`
--
ALTER TABLE `kalender_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kalender_peminjaman`
--
ALTER TABLE `kalender_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `ormawa`
--
ALTER TABLE `ormawa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `aspirasi`
--
ALTER TABLE `aspirasi`
  ADD CONSTRAINT `aspirasi_ibfk_1` FOREIGN KEY (`id_jenis_aspirasi`) REFERENCES `jenis_aspirasi` (`id`),
  ADD CONSTRAINT `aspirasi_ibfk_2` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`id`);

--
-- Ketidakleluasaan untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD CONSTRAINT `kalender_akademik_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_akademik` (`id`);

--
-- Ketidakleluasaan untuk tabel `kalender_kegiatan`
--
ALTER TABLE `kalender_kegiatan`
  ADD CONSTRAINT `kalender_kegiatan_ibfk_1` FOREIGN KEY (`id_jenis_kegiatan`) REFERENCES `jenis_kegiatan` (`id`),
  ADD CONSTRAINT `kalender_kegiatan_ibfk_2` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`id`);

--
-- Ketidakleluasaan untuk tabel `kalender_peminjaman`
--
ALTER TABLE `kalender_peminjaman`
  ADD CONSTRAINT `kalender_peminjaman_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id`),
  ADD CONSTRAINT `kalender_peminjaman_ibfk_2` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
