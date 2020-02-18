-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2019 pada 02.25
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pontren`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `id_dataponpes` varchar(32) NOT NULL,
  `x1` double NOT NULL,
  `x2` double NOT NULL,
  `x3` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `id_dataponpes`, `x1`, `x2`, `x3`) VALUES
(1, 'P0001', 0.06, 0.33, 0.38),
(2, 'P0002', 0.91, 1, 1),
(3, 'P0003', 0.11, 0.4, 0.38),
(4, 'P0004', 0.2, 0.45, 0.38),
(5, 'P0007', 0.07, 0.4, 0.69),
(6, 'P0008', 0.08, 0.36, 0.31),
(7, 'P0009', 0.24, 0.17, 0.46),
(8, 'P0010', 0.47, 0.59, 0.38),
(9, 'P0011', 0.2, 0.64, 0.46),
(10, 'P0012', 1, 0.95, 0.46),
(11, 'P0013', 0.07, 0.52, 0.31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah`
--

CREATE TABLE `daerah` (
  `id_daerah` int(11) NOT NULL,
  `jenis_daerah` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daerah`
--

INSERT INTO `daerah` (`id_daerah`, `jenis_daerah`) VALUES
(1, 'Kabupaten'),
(2, 'Kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataponpes`
--

CREATE TABLE `dataponpes` (
  `id_ponpes` varchar(11) NOT NULL,
  `nspp` varchar(32) NOT NULL,
  `nama_ponpes` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `id_kecamatan` int(2) NOT NULL,
  `tgl_berdiri` date NOT NULL,
  `yayasan` varchar(128) DEFAULT NULL,
  `id_daerah` float NOT NULL,
  `jumlah_santri` float NOT NULL,
  `jumlah_tenaga` float NOT NULL,
  `jumlah_unit` float NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `pengupdate` varchar(128) NOT NULL,
  `tgl_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dataponpes`
--

INSERT INTO `dataponpes` (`id_ponpes`, `nspp`, `nama_ponpes`, `alamat`, `id_kecamatan`, `tgl_berdiri`, `yayasan`, `id_daerah`, `jumlah_santri`, `jumlah_tenaga`, `jumlah_unit`, `lat`, `lon`, `pengupdate`, `tgl_update`) VALUES
('P0001', '510335160001', 'AL-HAMID BANGON ', 'Dusun Bangon Rt. 006 Rw.002, Bleberan, Jatirejo ', 6, '1951-03-24', 'Yayasan Pondok Pesantren Al-Hamid Bangon', 1, 71, 19, 5, -7.618203, 112.442069, 'already@gmail.com', 1565362115),
('P0002', '510035160002', 'BIDAYATUL HIDAYAH', 'Jl. Kh. Yahdi, Dsn. Mojogeneng, Mojogeneng, Jatirejo', 6, '1940-12-31', '', 1, 1000, 58, 13, -7.581419, 112.442123, 'already@gmail.com', 1565362124),
('P0003', '510035160003', 'ISMUL HAQ', 'Dusun Kowang, Gebangsari, Jatirejo', 6, '2001-12-31', 'Yayasan Ismul Haq', 1, 120, 23, 5, -7.589899, 112.424518, 'gilangpermadi66@gmail.com', 1565399757),
('P0004', '510035160004', 'KUN \'ALIMAN', 'Dusun Mojogeneng, Mojogeneng, Jatirejo', 6, '2008-12-31', '', 1, 224, 26, 5, -7.582192, 112.442268, 'already@gmail.com', 1565362164),
('P0007', '510035160009', 'MIFTAHUL QULUB', 'Jl. A. Yani Dusun Tawar, Tawar, Gondang', 5, '1963-12-31', '', 1, 75, 23, 9, -7.602575, 112.455279, 'already@gmail.com', 1565339828),
('P0008', '510035160010', 'AL FALAH', 'Jl. Jend. A. Yani, Pacet, Pacet', 13, '1992-07-02', 'Yayasan Nurul Falah Mojokerto', 1, 83, 21, 4, -7.667112, 112.541104, 'already@gmail.com', 1565340070),
('P0009', '510035160011', 'AL ISTIQOMAH II', 'Jl. raya jubel km 04 merak, bendunganjati, pacet', 13, '1998-04-14', 'Yayasan Pendidikan Dan Sosial Al Istiqomah II', 1, 264, 10, 6, -7.635485, 112.54548, 'already@gmail.com', 1565361693),
('P0010', '510335160015', 'FATCHUL ULUM', 'Jl. Moch. Sholeh 270, Pacet, Pacet', 13, '1990-08-17', 'Yayasan Saraswati Mojokerto', 1, 514, 34, 5, -7.666422, 112.540434, 'already@gmail.com', 1565573147),
('P0011', '510035160052', 'INDUK MAMBA\'UL ULUM', 'Jl. Raya Mojosari Pacet	Awang-Awang, Mojosari', 11, '1958-06-17', 'Yayasan Mamba\'ul Ulum Mojokerto', 1, 217, 37, 6, -7.533938, 112.55336, 'already@gmail.com', 1565656979),
('P0012', '510035160053', 'MAMBA\'UL ULUM', 'Jl. A. Yani, Awang-Awang, Mojosari', 11, '1958-06-17', 'Yayasan Madrasah Salafiyah Mamba\'ul Ulum Mojokerto', 1, 1096, 55, 6, -7.532775, 112.553248, 'already@gmail.com', 1565657131),
('P0013', '51003512187', 'Pondok Pesantren Al Azhar', 'Magersari, Kota Mojokerto', 15, '1988-10-23', '', 2, 76, 30, 4, -7.468262, 112.433739, 'already@gmail.com', 1565744958);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_ponpes` varchar(11) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `id_cluster` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_ponpes`, `c1`, `c2`, `c3`, `id_cluster`) VALUES
(1, 'P0001', 0.0033096918019556, 0.042943201180155, 0.95374710701789, 1),
(2, 'P0002', 0.89409045990509, 0.064173867049732, 0.041735673045179, 2),
(3, 'P0003', 0.00082487990157935, 0.016995382933528, 0.98217973716489, 3),
(4, 'P0004', 0.0086650704849927, 0.38598031606591, 0.60535461344909, 4),
(5, 'P0007', 0.046507043431954, 0.39473384968955, 0.55875910687849, 5),
(6, 'P0008', 0.0054478722798562, 0.075621191080272, 0.91893093663987, 6),
(7, 'P0009', 0.034503189490127, 0.27085531655298, 0.69464149395689, 7),
(8, 'P0010', 0.063892488241543, 0.74952063010713, 0.18658688165133, 8),
(9, 'P0011', 0.01298395690049, 0.87118871241479, 0.11582733068472, 9),
(10, 'P0012', 0.83055828261827, 0.10566136346854, 0.063780353913192, 10),
(11, 'P0013', 0.01701355888057, 0.33458716288688, 0.64839927823255, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kec` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kec`) VALUES
(1, 'Bangsal'),
(2, 'Dawarblandong'),
(3, 'Dlanggu'),
(4, 'Gedeg'),
(5, 'Gondang'),
(6, 'Jatirejo'),
(7, 'Jetis'),
(8, 'Kemlagi'),
(9, 'Kutorejo'),
(10, 'Mojoanyar'),
(11, 'Mojosari'),
(12, 'Ngoro'),
(13, 'Pacet'),
(14, 'Pungging'),
(15, 'Puri'),
(16, 'Sooko'),
(17, 'Trawas'),
(18, 'Trowulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(32) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `keterangan`) VALUES
(1, 'Jumlah Santri', NULL),
(2, 'Jumlah Tenaga', NULL),
(3, 'Jumlah Unit Pendidikan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `max_cluster`
--

CREATE TABLE `max_cluster` (
  `id_cluster` int(11) NOT NULL,
  `max` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `max_cluster`
--

INSERT INTO `max_cluster` (`id_cluster`, `max`) VALUES
(1, 'C3'),
(2, 'C1'),
(3, 'C3'),
(4, 'C3'),
(5, 'C3'),
(6, 'C3'),
(7, 'C3'),
(8, 'C2'),
(9, 'C2'),
(10, 'C1'),
(11, 'C3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ponpes_unit`
--

CREATE TABLE `ponpes_unit` (
  `id` int(11) NOT NULL,
  `id_ponpes` varchar(11) NOT NULL,
  `nama_unit` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ponpes_unit`
--

INSERT INTO `ponpes_unit` (`id`, `id_ponpes`, `nama_unit`) VALUES
(32, 'P0001', 'TK/PAUD'),
(33, 'P0001', 'Madrasah Tsanawiyah'),
(34, 'P0001', 'Madrasah Aliyah'),
(35, 'P0001', 'MIT'),
(36, 'P0001', 'Pondok Pesantren'),
(37, 'P0002', 'Madrasah Ibtidaiyah'),
(38, 'P0002', 'Madrasah Tsanawiyah'),
(39, 'P0002', 'Madrasah Aliyah'),
(40, 'P0002', 'Madrasah Diniyah'),
(41, 'P0002', 'RA'),
(42, 'P0002', 'ULA'),
(43, 'P0002', 'Wustha'),
(44, 'P0002', 'Aliyah'),
(45, 'P0002', 'Kitab Kuning'),
(46, 'P0002', 'Tahfidzul Quran'),
(47, 'P0002', 'Tilawatil Quran'),
(48, 'P0002', 'Khotil Quran'),
(49, 'P0002', 'Albaniari'),
(50, 'P0003', 'Madrasah Diniyah'),
(51, 'P0003', 'Pondok Pesantren'),
(52, 'P0003', 'Madrasah Aliyah Hidayatul Falah'),
(53, 'P0003', 'Majelis Ta\'lim Ismul Haq'),
(54, 'P0004', 'Madrasah Ibtidaiyah'),
(55, 'P0004', 'Madrasah Tsanawiyah'),
(56, 'P0004', 'Madrasah Aliyah'),
(57, 'P0004', 'Madrasah Diniyah'),
(58, 'P0004', 'Tahfid'),
(59, 'P0005', 'TK/PAUD'),
(60, 'P0005', 'Madrasah Ibtidaiyah'),
(61, 'P0005', 'Madrasah Tsanawiyah'),
(62, 'P0005', 'Madrasah Diniyah'),
(63, 'P0005', 'Tahfidzul Quran'),
(64, 'P0006', 'Madrasah Tsanawiyah'),
(65, 'P0006', 'Madrasah Aliyah'),
(66, 'P0007', 'Madrasah Ibtidaiyah'),
(67, 'P0007', 'Madrasah Tsanawiyah'),
(68, 'P0007', 'Madrasah Aliyah'),
(69, 'P0007', 'RA'),
(70, 'P0007', 'PT'),
(71, 'P0007', 'Kursus'),
(72, 'P0007', 'PKM'),
(73, 'P0007', 'Pondok Pesantren'),
(74, 'P0007', 'TPQ'),
(75, 'P0008', 'TK/PAUD'),
(76, 'P0008', 'Madrasah Diniyah'),
(77, 'P0008', 'TPQ'),
(78, 'P0008', 'Tahfidzul Quran'),
(79, 'P0009', 'Madrasah Diniyah'),
(80, 'P0009', 'SMK Al-Istiqomah II'),
(81, 'P0009', 'MTs Al-Istiqomah II'),
(82, 'P0009', 'Jurusan'),
(83, 'P0009', 'Pengajian Kitab Kuning'),
(84, 'P0009', 'TPQ Al-Istiqomah'),
(85, 'P0010', 'Madrasah Diniyah'),
(86, 'P0010', 'Jamiyyah Muchadloroh'),
(87, 'P0010', 'Organisasi Alumni'),
(88, 'P0010', 'Majelis Ta\'lim'),
(89, 'P0010', 'Tahfidzul Quran'),
(90, 'P0011', 'Madrasah Diniyah'),
(91, 'P0011', 'Mts \"Unggulan\"'),
(92, 'P0011', 'MA \"Unggulan\"'),
(93, 'P0011', 'Institut KH Abdul Chalim Mojokerto'),
(94, 'P0003', 'TPQ/LPQ'),
(95, 'P0011', 'PAUD/TK'),
(96, 'P0011', 'Madrasah Ibtidaiyah'),
(97, 'P0011', 'SMP IT'),
(98, 'P0011', 'Madrasah Aliyah'),
(99, 'P0011', 'SMK'),
(100, 'P0011', 'Pondok Pesantren'),
(101, 'P0012', 'PAUD/TK'),
(102, 'P0012', 'Madrasah Ibtidaiyah'),
(103, 'P0012', 'SMP IT'),
(104, 'P0012', 'Madrasah Aliyah'),
(105, 'P0012', 'SMK'),
(106, 'P0012', 'Pondok Pesantren'),
(107, 'P0013', 'TPQ/LPQ'),
(108, 'P0013', 'Diniyah'),
(109, 'P0013', 'PP. Umum'),
(110, 'P0013', 'PP. Wajar DIKDAS'),
(111, 'P0014', 'Diniyah'),
(112, 'P0014', 'PP. Umum'),
(113, 'P0014', 'PP. Wajar DIKDAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_pendidikan`
--

CREATE TABLE `program_pendidikan` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `program_pendidikan`
--

INSERT INTO `program_pendidikan` (`id_program`, `nama_program`) VALUES
(1, 'Salafiyah'),
(2, 'Tahfiz'),
(3, 'Modern'),
(4, 'Campuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_access`
--

CREATE TABLE `tb_access` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_access`
--

INSERT INTO `tb_access` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(19, 1, 3),
(20, 1, 4),
(21, 1, 5),
(22, 2, 3),
(23, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nspp` varchar(32) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `almt` text NOT NULL,
  `tgl_lhr` date NOT NULL,
  `telp` int(16) NOT NULL,
  `is_active` int(1) NOT NULL,
  `status` int(11) NOT NULL,
  `tgl_buat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `gambar`, `password`, `role_id`, `nspp`, `nip`, `almt`, `tgl_lhr`, `telp`, `is_active`, `status`, `tgl_buat`) VALUES
(1, 'Gilang Permadi', 'already@gmail.com', 'default1.jpg', '$2y$10$XfT.NN86V2fVtX9iZJm3ceqoO5tdGGHQDgzUj9fWr2zEj19iw53rK', 1, '', '', '', '2019-04-05', 0, 1, 1, 1557215287),
(2, 'Gilang Permadi', 'gilangpermadi66@gmail.com', 'default.jpg', '$2y$10$LC7TrlHjIHCQvMUDgLzqw.wXU12f9qtuKsYuys8m.BGnCOz2ykIWe', 2, '510035160003', '0', 'Pacet', '2001-11-25', 815492482, 0, 0, 1566432670);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usermenu`
--

CREATE TABLE `tb_usermenu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `alias` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usermenu`
--

INSERT INTO `tb_usermenu` (`id`, `menu`, `alias`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Lembaga', 'Profile'),
(3, 'Pengguna', 'User'),
(4, 'SIG', 'Map'),
(5, 'Analisa Data', 'Analyze'),
(6, 'Menu', 'Menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usersubmenu`
--

CREATE TABLE `tb_usersubmenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usersubmenu`
--

INSERT INTO `tb_usersubmenu` (`id`, `id_menu`, `judul`, `url`, `icon`, `aktif`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Profil Saya', 'user', 'fas fa-fw fa-user', 1),
(3, 3, 'Ubah Profil', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 6, 'Kelola Menu', 'menu', 'fas fa-fw fa-folder-plus', 1),
(5, 6, 'Kelola Sub-Menu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Kelola Operator', 'admin/user', 'fas fa-fw fa-user-tie', 1),
(7, 5, 'Clustering', 'analyze', 'fas fa-fw fa-superscript', 1),
(8, 4, 'Peta', 'gis', 'fas fa-fw fa-globe', 1),
(9, 3, 'Ganti Kata Sandi', 'user/changepassword', 'fas fa-fw fa-key', 1),
(10, 1, 'Data Pondok Pesantren', 'admin/dataPonpes', 'fas fa-fw fa-database', 1),
(11, 2, 'Profil Lembaga', 'user/profile_company', 'fas fa-fw fa-building', 1),
(12, 2, 'Edit Pondok Pesantren', 'user/change_company', 'fas fa-fw fa-edit', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_usertoken`
--

CREATE TABLE `tb_usertoken` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_usertoken`
--

INSERT INTO `tb_usertoken` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'gilangpermadi66@gmail.com', 'JPdZzQA2mks3fFqY3Ay5N7rxg3+z7x8wqGSN52ssc/g=', 1566432670);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id_daerah`);

--
-- Indeks untuk tabel `dataponpes`
--
ALTER TABLE `dataponpes`
  ADD PRIMARY KEY (`id_ponpes`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_keterangan` (`id_daerah`),
  ADD KEY `id_ponpes` (`id_ponpes`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `max_cluster`
--
ALTER TABLE `max_cluster`
  ADD PRIMARY KEY (`id_cluster`);

--
-- Indeks untuk tabel `ponpes_unit`
--
ALTER TABLE `ponpes_unit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ponpes` (`id_ponpes`);

--
-- Indeks untuk tabel `program_pendidikan`
--
ALTER TABLE `program_pendidikan`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `tb_access`
--
ALTER TABLE `tb_access`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `tb_usermenu`
--
ALTER TABLE `tb_usermenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_usersubmenu`
--
ALTER TABLE `tb_usersubmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_usertoken`
--
ALTER TABLE `tb_usertoken`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `max_cluster`
--
ALTER TABLE `max_cluster`
  MODIFY `id_cluster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ponpes_unit`
--
ALTER TABLE `ponpes_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `program_pendidikan`
--
ALTER TABLE `program_pendidikan`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_access`
--
ALTER TABLE `tb_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_usermenu`
--
ALTER TABLE `tb_usermenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_usersubmenu`
--
ALTER TABLE `tb_usersubmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_usertoken`
--
ALTER TABLE `tb_usertoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_access`
--
ALTER TABLE `tb_access`
  ADD CONSTRAINT `tb_access_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`),
  ADD CONSTRAINT `tb_access_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `tb_usermenu` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
