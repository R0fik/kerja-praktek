-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 12 Jul 2019 pada 16.11
-- Versi Server: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kunci_odc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_peminjam`
--

CREATE TABLE `info_peminjam` (
  `id` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `tempat_sto` varchar(100) NOT NULL,
  `alamat_odc` varchar(200) NOT NULL,
  `kode_odc` varchar(15) NOT NULL,
  `key_odc` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `jam_mulai` int(11) NOT NULL,
  `jam_selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `info_peminjam`
--

INSERT INTO `info_peminjam` (`id`, `id_user`, `tempat_sto`, `alamat_odc`, `kode_odc`, `key_odc`, `name`, `pekerjaan`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1505097', 'Mergoyoso', 'Surabaya Utara', 'ODC-MGO-ISP', 0, 'Rofik Pratama', 'Perbaikan perangkat', 1562225432, 1562237038),
(8, '1505097', 'Telkom Ketintang', 'jl. Karah', 'ODC-KLN-BGO', 1927, 'Rofik Pratama', 'Pengecekan Perangkat', 1562582179, 1562695621),
(10, '1505098', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Dimas Agung', 'Perbaikan Perangkat', 1562582602, 1562695011),
(11, '1505097', 'Telkom Ketintang', 'jl. Karah', 'ODC-KLN-BGO', 1927, 'Rofik Pratama', 'Perbaikan Perangkat', 1562695659, 1562696084),
(12, '1505097', 'Telkom Ketintang', 'jl. Karah', 'ODC-KLN-BGO', 1927, 'Rofik Pratama', 'Perbaikan', 1562696141, 1562696144),
(13, '1505097', 'Telkom Ketintang', 'jl. Karah', 'ODC-KLN-BGO', 1927, 'Rofik Pratama', 'Perbaikan Perangkat', 1562732167, 1562732615),
(14, '1505097', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Rofik Pratama', 'Pengecekan Perangkat', 1562732768, 1562732896),
(15, '1505097', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Rofik Pratama', 'test', 1562733725, 1562734529),
(16, '1505097', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Rofik Pratama', 'coba', 1562736827, 1562736832),
(17, '1505098', 'Karangpilang', 'jl. Kedurus', 'ODC-KLN-MYD', 1732, 'Dimas Agung', 'Perbaikan Perangkat', 1562788827, 1562788841),
(18, '1505098', 'Karangpilang', 'jl. Kedurus', 'ODC-KLN-MYD', 1732, 'Dimas Agung', 'Pengecekan Kabel', 1562789119, 1562789738),
(19, '1505097', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Rofik Pratama', 'Perbaikan Perangkat', 1562835958, 1562866537),
(20, '1505097', 'Telkom Ketintang', 'jl. Karah', 'ODC-SBU-BGO', 1927, 'Rofik Pratama', 'Pengecekan perangkat', 1562867576, 1562868096),
(21, '1505098', 'Telkom Mergoyoso', 'jl. Wiyung', 'ODC-MGO-ISP', 1945, 'Dimas Agung', 'Pengecekan Kabel', 1562873489, 1562873536);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunci`
--

CREATE TABLE `kunci` (
  `id` int(11) NOT NULL,
  `kode_odc` varchar(15) NOT NULL,
  `key_odc` int(11) NOT NULL,
  `alamat_odc` varchar(128) NOT NULL,
  `tempat_sto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunci`
--

INSERT INTO `kunci` (`id`, `kode_odc`, `key_odc`, `alamat_odc`, `tempat_sto`) VALUES
(1, 'ODC-MGO-ISP', 1945, 'jl. Wiyung', 'Telkom Mergoyoso'),
(2, 'ODC-SBU-BGO', 1927, 'jl. Karah', 'Telkom Ketintang'),
(4, 'ODC-KLN-MYD', 1732, 'jl. Kedurus', 'Karangpilang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `menu_id`, `title`, `url`, `role_id`) VALUES
(1, 1, 'Work', 'work', 1),
(2, 2, 'Management Key', 'man_key', 1),
(3, 3, 'Management User', 'man_user', 1),
(4, 1, 'My Work', 'my_work', 2),
(5, 2, 'Add Work', 'add_work', 2),
(6, 3, 'Work', 'work', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_user` char(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_user`, `name`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(3, '1505096', 'Fadli Nur Rofik', '$2y$10$MYczAGvWUQw/bB5o0UK4wepb1jdvq27bvfivhNdDebbsgg4QJG1Eq', 1, 1, 1562390347),
(4, '1505097', 'Rofik Pratama', '$2y$10$vWlavXom3T.gw827ZTgz9.7OsaJpOVh3.gt4q2h/x3NKHJV/VkG7S', 2, 1, 1562393356),
(5, '1505098', 'Dimas Agung', '$2y$10$1KDQZwsqYYnZ2J.tpN7Vy.4qCwcy41fa.ViAu8hih91IMy67xGUty', 2, 1, 1562788062);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info_peminjam`
--
ALTER TABLE `info_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kunci`
--
ALTER TABLE `kunci`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info_peminjam`
--
ALTER TABLE `info_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `kunci`
--
ALTER TABLE `kunci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
