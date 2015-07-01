-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01 Jul 2015 pada 18.14
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sigbb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_usaha`
--

CREATE TABLE IF NOT EXISTS `data_usaha` (
`id_usaha` int(11) NOT NULL,
  `nama_usaha` varchar(30) NOT NULL,
  `produk_utama` varchar(20) NOT NULL,
  `alamat_usaha` varchar(50) NOT NULL,
  `deskripsi_usaha` varchar(100) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `id_kec` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `id_sektor` int(11) NOT NULL,
  `skala` enum('MIKRO','KECIL','MENENGAH') NOT NULL,
  `dihapus` char(1) DEFAULT 'T',
  `aktivasi` enum('ACTIVE','DEACTIVE') NOT NULL DEFAULT 'DEACTIVE',
  `no_ktp` varchar(30) NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_usaha`
--

INSERT INTO `data_usaha` (`id_usaha`, `nama_usaha`, `produk_utama`, `alamat_usaha`, `deskripsi_usaha`, `lat`, `lng`, `id_kec`, `id_desa`, `id_sektor`, `skala`, `dihapus`, `aktivasi`, `no_ktp`, `tgl_daftar`) VALUES
(1, 'Ika Bakery', 'Cake Pop', 'Cihampelas Bandung Barat', 'Menyediakan berbagai macam kue manis, enak dan bergizi', -6.94794, 107.497, 7, 21, 16, 'KECIL', 'T', 'DEACTIVE', '3273225102940007', '0000-00-00 00:00:00'),
(2, 'Tatoti Research', 'Jasa Research', 'Batu Jajar Galanggang Bandung Barat', 'Menerima jasa untuk pengembangan riset', -6.90963, 107.488, 1, 4, 15, 'MENENGAH', 'T', 'DEACTIVE', '3204051405940005', '0000-00-00 00:00:00'),
(3, 'IKA HARPA4', 'Musik Angklung', 'Cikalong Wetan Mandalamukti Bandung Barat', 'Menerima jasa permainan musik angklung untuk diberbagai acara', -6.75146, 107.453, 4, 14, 10, 'MIKRO', 'T', 'DEACTIVE', '3273225102940007', '0000-00-00 00:00:00'),
(4, 'Oyaaa', 'Jasa Periklanan', 'Cililin Karyamukti Bandung Barat', 'Menerima jasa di bidang periklanan', -7.03405, 107.471, 10, 37, 1, 'MENENGAH', 'T', 'DEACTIVE', '3210070304940001', '0000-00-00 00:00:00'),
(5, 'Amaze-archi', 'Desain bangunan', 'Cipatat Gunungmasigit Bandung Barat', 'Menerima jasa pembuatan desain bangunan apapun', -6.83439, 107.435, 13, 45, 2, 'MENENGAH', 'T', 'DEACTIVE', '3210070304940001', '0000-00-00 00:00:00'),
(6, 'Goods Art', 'Kerajinan Rotan', 'Cipeundeuy Margaluyu Bandung Barat', 'Menyediakan berbagai macam barang yang terbuat dari rotan', -6.7799, 107.308, 15, 58, 3, 'MIKRO', 'T', 'DEACTIVE', '3210072009940021', '0000-00-00 00:00:00'),
(7, 'Maju Jaya', 'Tudung Saji', 'Cipongkor Cijambu Bandung Barat', 'Menyediakan berbagai macam kerajinan', -6.93064, 107.341, 2, 66, 4, 'KECIL', 'T', 'DEACTIVE', '3210072009940021', '0000-00-00 00:00:00'),
(8, 'Sketch You', 'Desain UI Web', 'Cisarua Padaasih Bandung Barat', 'Menerima berbagai macam desain web', -6.84005, 107.559, 5, 80, 5, 'MENENGAH', 'T', 'DEACTIVE', '3210072109940001', '0000-00-00 00:00:00'),
(9, 'Distro Terkenal', 'Kaos Distro Keren', 'Gununghalu Celak Bandung Barat', 'Tersedia berbagai macam kaos kaos dengan desain keren', -7.02554, 107.355, 8, 87, 6, 'KECIL', 'T', 'DEACTIVE', '3210072109940001', '0000-00-00 00:00:00'),
(10, 'Matahari 5', 'Video Mapping', 'Lembang Setiabudi Bandung Barat', 'Menyediakan jasa pembuatan video mapping', -6.84978, 107.589, 9, 95, 7, 'KECIL', 'T', 'DEACTIVE', '3210072212940001', '0000-00-00 00:00:00'),
(11, 'Film Art', 'Jasa Fotografi', 'Ngamprah Pakuhaji Bandung Barat', 'Menerima jasa pemotretan dan pembuatan film', -6.84932, 107.53, 11, 118, 8, 'MENENGAH', 'T', 'DEACTIVE', '3210072212940001', '0000-00-00 00:00:00'),
(12, 'Learning Fun', 'Permainan Interaktif', 'Padalarang Ciburuy Bandung Barat', 'Menyediakan berbagai macam permainan interaktif', -6.82815, 107.465, 14, 122, 9, 'MENENGAH', 'T', 'DEACTIVE', '3210072212940001', '0000-00-00 00:00:00'),
(13, 'Art Show', 'Jasa Pertunjukan', 'Parongpong Cihanjuang Bandung Barat', 'Menerima jasa pertunjukan untuk acara apapun', -6.84867, 107.57, 16, 133, 11, 'KECIL', 'T', 'DEACTIVE', '3210070304940001', '0000-00-00 00:00:00'),
(14, 'Print You Out', 'Jasa Percetakan', 'Rongga Cicadas Bandung Barat', 'Menerima jasa percetakan', -6.98647, 107.296, 3, 143, 12, 'KECIL', 'T', 'DEACTIVE', '3204051405940005', '0000-00-00 00:00:00'),
(15, 'Serve Your Computer', 'Jasa Perbaikan Kompu', 'Saguling Cikande Bandung Barat', 'Menerima jasa reparasi komputer', -6.87404, 107.403, 12, 158, 13, 'KECIL', 'T', 'DEACTIVE', '3273225102940007', '0000-00-00 00:00:00'),
(16, 'Indotivi', 'Tayangan Televisi', 'Sindangkerta Cikadu Bandung Barat', 'Menyediakan berbagai macam acara hiburan televisi', -6.9948, 107.417, 6, 147, 14, 'MENENGAH', 'T', 'DEACTIVE', '3210072009940021', '0000-00-00 00:00:00'),
(17, 'ExiaStore', 'Mainan Plastics Mode', 'Lembang', 'Kami menyediakan berbagai macam jenis mainan Plastic Model dari berbagai produsen', -6.81621, 107.623, 9, 108, 9, 'KECIL', 'T', 'DEACTIVE', '0102030405060708', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE IF NOT EXISTS `desa` (
`id_desa` int(11) NOT NULL,
  `nama_desa` varchar(20) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `dihapus` char(1) DEFAULT 'T'
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`, `id_kec`, `dihapus`) VALUES
(1, 'Batujajar Timur', 1, 'T'),
(2, 'Batujajar Barat', 1, 'T'),
(3, 'Cangkorah', 1, 'T'),
(4, 'Galanggang', 1, 'T'),
(5, 'Giriasih', 1, 'T'),
(6, 'Pangauban', 1, 'T'),
(7, 'Selacau', 1, 'T'),
(8, 'Cikalong', 4, 'T'),
(9, 'Cipada', 4, 'T'),
(10, 'Ciptagumati', 4, 'T'),
(11, 'Cisomang Barat', 4, 'T'),
(12, 'Ganjarsari', 4, 'T'),
(13, 'Kanangasari', 4, 'T'),
(14, 'Mandalamukti', 4, 'T'),
(15, 'Mandalasari', 4, 'T'),
(16, 'Mekarjaya', 4, 'T'),
(17, 'Puteran', 4, 'T'),
(18, 'Rende', 4, 'T'),
(19, 'Tenjolaut', 4, 'T'),
(20, 'Wangunjaya', 4, 'T'),
(21, 'Cihampelas', 7, 'T'),
(22, 'Cipatik', 7, 'T'),
(23, 'Citapen', 7, 'T'),
(24, 'Mekarjaya', 7, 'T'),
(25, 'Mekarmukti', 7, 'T'),
(26, 'Pataruman', 7, 'T'),
(27, 'Singajaya', 7, 'T'),
(28, 'Situwangi', 7, 'T'),
(29, 'Tanjungwangi', 7, 'T'),
(30, 'Tanjungjaya', 7, 'T'),
(31, 'Batulayang', 10, 'T'),
(32, 'Bongas', 10, 'T'),
(33, 'Budiharja', 10, 'T'),
(34, 'Cililin', 10, 'T'),
(35, 'Karanganyar', 10, 'T'),
(36, 'Karangtanjung', 10, 'T'),
(37, 'Karyamukti', 10, 'T'),
(38, 'Kidangpananjung', 10, 'T'),
(39, 'Mukapayung', 10, 'T'),
(40, 'Nanggerang', 10, 'T'),
(41, 'Rancapanggung', 10, 'T'),
(42, 'Cipatat', 13, 'T'),
(43, 'Ciptaharja', 13, 'T'),
(44, 'Cirawamekar', 13, 'T'),
(45, 'Gunungmasigit', 13, 'T'),
(46, 'Kertamukti', 13, 'T'),
(47, 'Mandalasari', 13, 'T'),
(48, 'Mandalawangi', 13, 'T'),
(49, 'Rajamandala Kulon', 13, 'T'),
(50, 'Sarimukti', 13, 'T'),
(51, 'Sumurbandung', 13, 'T'),
(52, 'Bojongmekar', 15, 'T'),
(53, 'Ciharashas', 15, 'T'),
(54, 'Cipeundeuy', 15, 'T'),
(55, 'Ciroyom', 15, 'T'),
(56, 'Jatimekar', 15, 'T'),
(57, 'Margalaksana', 15, 'T'),
(58, 'Margaluyu', 15, 'T'),
(59, 'Nanggeleng', 15, 'T'),
(60, 'Nyenang', 15, 'T'),
(61, 'Sirnagalih', 15, 'T'),
(62, 'Sirnaraja', 15, 'T'),
(63, 'Baranangsiang', 2, 'T'),
(64, 'Cibenda', 2, 'T'),
(65, 'Cicangkang Hilir', 2, 'T'),
(66, 'Cijambu', 2, 'T'),
(67, 'Cijenuk', 2, 'T'),
(68, 'Cintaasih', 2, 'T'),
(69, 'Citalem', 2, 'T'),
(70, 'Girimukti', 2, 'T'),
(71, 'Karangsari', 2, 'T'),
(72, 'Mekarsari', 2, 'T'),
(73, 'Sarinangen', 2, 'T'),
(74, 'Neglasari', 2, 'T'),
(75, 'Sukamulya', 2, 'T'),
(76, 'Sirnagalih', 2, 'T'),
(77, 'Kalibata', 5, 'T'),
(78, 'Ambudipa', 5, 'T'),
(79, 'Kertawangi', 5, 'T'),
(80, 'Padaasih', 5, 'T'),
(81, 'Pasirhalang', 5, 'T'),
(82, 'Pasirlangu', 5, 'T'),
(83, 'Sadangmekar', 5, 'T'),
(84, 'Tugumukti', 5, 'T'),
(86, 'Bunijaya', 8, 'T'),
(87, 'Celak', 8, 'T'),
(88, 'Cilangari', 8, 'T'),
(89, 'Gununghalu', 8, 'T'),
(90, 'Sindangjaya', 5, 'T'),
(91, 'Sirnajaya', 5, 'T'),
(92, 'Sukasari', 5, 'T'),
(93, 'Tamanjaya', 5, 'T'),
(94, 'Wargasaluyu', 5, 'T'),
(95, 'Setiabudi', 9, 'T'),
(96, 'Cibogo', 9, 'T'),
(97, 'Cikahuripan', 9, 'T'),
(98, 'Cikidang', 9, 'T'),
(99, 'Cikole', 9, 'T'),
(100, 'Gudangkahuripan', 9, 'T'),
(101, 'Jayagiri', 9, 'T'),
(102, 'Kayuambon', 9, 'T'),
(103, 'Langensari', 9, 'T'),
(104, 'Lembang', 9, 'T'),
(105, 'Mekarwangi', 9, 'T'),
(106, 'Pagerwangi', 9, 'T'),
(107, 'Sukajaya', 9, 'T'),
(108, 'Suntenjaya', 9, 'T'),
(109, 'Wangunsari', 9, 'T'),
(110, 'Wangunharja', 9, 'T'),
(111, 'Setiabudi', 11, 'T'),
(112, 'Cilame', 11, 'T'),
(113, 'Cimanggu', 11, 'T'),
(114, 'Cimareme', 11, 'T'),
(115, 'Margajaya', 11, 'T'),
(116, 'Mekarsari', 11, 'T'),
(117, 'Ngamprah', 11, 'T'),
(118, 'Pakuhaji', 11, 'T'),
(119, 'Sukatani', 11, 'T'),
(120, 'Tanimulya', 11, 'T'),
(121, 'Cempakamekar', 14, 'T'),
(122, 'Ciburuy', 14, 'T'),
(123, 'Cimerang', 14, 'T'),
(124, 'Cipeundeuy', 14, 'T'),
(125, 'Jayamekar', 14, 'T'),
(126, 'Kertajaya', 14, 'T'),
(127, 'Kertamulya', 14, 'T'),
(128, 'Laksanamekar', 14, 'T'),
(129, 'Padalarang', 14, 'T'),
(130, 'Tagogapu', 14, 'T'),
(131, 'Cempakamekar', 16, 'T'),
(132, 'Cihanjuang Rahayu', 16, 'T'),
(133, 'Cihanjuang', 16, 'T'),
(134, 'Cihideung', 16, 'T'),
(135, 'Ciwaruga', 16, 'T'),
(136, 'Karyawangi', 11, 'T'),
(137, 'Sariwangi', 11, 'T'),
(138, 'Ngamprah', 3, 'T'),
(139, 'Bojong', 3, 'T'),
(140, 'Bojongsalam', 3, 'T'),
(141, 'Cibedug', 3, 'T'),
(142, 'Cibitung', 3, 'T'),
(143, 'Cicadas', 3, 'T'),
(144, 'Cinengah', 3, 'T'),
(145, 'Buniagara', 6, 'T'),
(146, 'Cicangkang Girang', 6, 'T'),
(147, 'Cikadu', 6, 'T'),
(148, 'Cintakarya', 6, 'T'),
(149, 'Mekarwangi', 6, 'T'),
(150, 'Pasirpogor', 6, 'T'),
(151, 'Puncaksari', 6, 'T'),
(152, 'Ranca Senggang', 6, 'T'),
(153, 'Sindangkerta', 6, 'T'),
(154, 'Wangunsari', 6, 'T'),
(155, 'Weninggalih', 6, 'T'),
(156, 'Cipangeran', 12, 'T'),
(157, 'Jati', 12, 'T'),
(158, 'Cikande', 12, 'T'),
(159, 'Bojongheulang', 12, 'T'),
(160, 'Saguling', 12, 'T'),
(161, 'Girimukti', 12, 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
`id_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL,
  `id_usaha` int(11) NOT NULL,
  `dihapus` char(1) DEFAULT 'T',
  `ukuran_gambar` varchar(200) NOT NULL,
  `tipe_gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
`id_kec` int(11) NOT NULL,
  `nama_kec` varchar(20) NOT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kec`, `nama_kec`, `dihapus`) VALUES
(1, 'Batujajar', 'T'),
(2, 'Cipongkor', 'T'),
(3, 'Rongga', 'T'),
(4, 'Cikalong Wetan', 'T'),
(5, 'Cisarua', 'T'),
(6, 'Sindangkerta', 'T'),
(7, 'Cihampelas', 'T'),
(8, 'Gununghalu', 'T'),
(9, 'Lembang', 'T'),
(10, 'Cililin', 'T'),
(11, 'Ngamprah', 'T'),
(12, 'Saguling', 'T'),
(13, 'Cipatat', 'T'),
(14, 'Padalarang', 'T'),
(15, 'Cipeundeuy', 'T'),
(16, 'Parongpong', 'T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
`id_notif` int(11) NOT NULL,
  `status` enum('read','unread') DEFAULT 'unread',
  `tipe` enum('usaha','pemilikusaha') DEFAULT NULL,
  `id_lain` varchar(16) DEFAULT NULL,
  `waktu` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notif`, `status`, `tipe`, `id_lain`, `waktu`) VALUES
(4, 'unread', 'pemilikusaha', '0102030405060708', '2015-07-01 05:24:47'),
(5, 'unread', 'pemilikusaha', '011912199501', '2015-07-01 00:00:00'),
(6, 'unread', 'usaha', '17', '2015-07-01 22:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilik_usaha`
--

CREATE TABLE IF NOT EXISTS `pemilik_usaha` (
  `no_ktp` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T',
  `aktivasi` enum('DEACTIVE','ACTIVE') NOT NULL DEFAULT 'DEACTIVE',
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilik_usaha`
--

INSERT INTO `pemilik_usaha` (`no_ktp`, `nama`, `alamat`, `tpt_lahir`, `tgl_lahir`, `foto_ktp`, `no_telp`, `email`, `password`, `dihapus`, `aktivasi`, `tgl_daftar`) VALUES
('0102030405060708', 'Bayu Fajar N', 'Jl.Rd Ganda Kusumah RT.01 RW.12 Kab.Bandung', 'Bandung', '1994-12-22', 'pp.png', '087822181472', 'bayufajar22@gmail.com', 'bayufajar', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('011912199501', 'Maudy Ayunda', 'Jakarta Timur', 'Jakarta', '1994-12-19', 'maudyayunda.jpeg', '081319874100', 'maudyayunda@gmail.com', 'maudy', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3204051405940005', 'Aldi Ahmad', 'Jalan Cibiru Hilir No.17', 'Bandung', '2015-06-30', 'DSC_0617.JPG', '085724639200', 'aldikedua@gmail.com', 'aldi', 'T', 'ACTIVE', '0000-00-00 00:00:00'),
('3210070304940001', 'tresna gumelar', 'cikijing, kab.majalengka', 'majalengka', '0000-00-00', 'IMG_5342.jpg', '081908190819', 'admin4@gmail.com', 'admin123', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3210071405940021', 'aldy ahmad', 'cibiru, bandung', 'bandung', '1994-05-14', 'IMG_3807.JPG', '085708570857', 'admin@gmail.com', 'admin123', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3210072009940021', 'bayu rifqi', 'gelatik dalam, bandung', 'ambon', '0000-00-00', 'IMG_5456.jpg', '085308530853', 'admin6@gmail.com', 'admin123', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3210072109940001', 'bayu setiaji', 'ujunberung, bandung\r\n', 'bandung', '1994-09-21', 'IMG_4749.jpg', '082208220822', 'admin2@gmail.com', 'admin123', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3210072212940001', 'bayu fajar', 'banjaran, kab.bandung', 'bandung', '1994-12-22', 'IMG_4781.jpg', '087708770877', 'admin3@gmail.com', 'admin123', 'T', 'DEACTIVE', '0000-00-00 00:00:00'),
('3273225102940007', 'Ika Widya', 'Jalan Cijawura Hilir No.356', 'Bandung', '1994-02-11', 'asasasasasasasasasasasasas.PNG', '085721740036', 'ikawidyaa@gmail.com', 'ika', 'T', 'ACTIVE', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sektor_usaha`
--

CREATE TABLE IF NOT EXISTS `sektor_usaha` (
`id_sektor` int(11) NOT NULL,
  `keyword_sektor` varchar(20) NOT NULL,
  `nama_sektor` varchar(20) NOT NULL,
  `dihapus` char(1) NOT NULL DEFAULT 'T'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sektor_usaha`
--

INSERT INTO `sektor_usaha` (`id_sektor`, `keyword_sektor`, `nama_sektor`, `dihapus`) VALUES
(1, 'periklanan', 'Periklanan', 'T'),
(2, 'arsitektur', 'Arsitektur', 'T'),
(3, 'pasarseni', 'Pasar Barang Seni', 'T'),
(4, 'kerajinan', 'Kerajinan', 'T'),
(5, 'desain', 'Desain', 'T'),
(6, 'fashion', 'Fashion', 'T'),
(7, 'video', 'Video', 'T'),
(8, 'filmfoto', 'Film & Fotografi', 'T'),
(9, 'permainan', 'Permainan Interaktif', 'T'),
(10, 'musik', 'Musik', 'T'),
(11, 'seni', 'Seni Pertunjukan', 'T'),
(12, 'penerbit', 'Penerbitan & Perceta', 'T'),
(13, 'komputer', 'Layanan Komputer & P', 'T'),
(14, 'telerad', 'Televisi & Radio', 'T'),
(15, 'riset', 'Riset & Pengembangan', 'T'),
(16, 'kuliner', 'Kuliner', 'T');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `data_usaha`
--
ALTER TABLE `data_usaha`
 ADD PRIMARY KEY (`id_usaha`), ADD KEY `fk_datausaha_01` (`id_desa`), ADD KEY `fk_datausaha_02` (`id_kec`), ADD KEY `fk_datausaha_03` (`id_sektor`), ADD KEY `fk_datausaha_04` (`no_ktp`);

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
 ADD PRIMARY KEY (`id_desa`), ADD KEY `fk_desa_01` (`id_kec`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
 ADD PRIMARY KEY (`id_gambar`), ADD KEY `fk_galeri_01` (`id_usaha`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
 ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
 ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pemilik_usaha`
--
ALTER TABLE `pemilik_usaha`
 ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
 ADD PRIMARY KEY (`id_sektor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_usaha`
--
ALTER TABLE `data_usaha`
MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sektor_usaha`
--
ALTER TABLE `sektor_usaha`
MODIFY `id_sektor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_usaha`
--
ALTER TABLE `data_usaha`
ADD CONSTRAINT `fk_datausaha_01` FOREIGN KEY (`id_desa`) REFERENCES `desa` (`id_desa`),
ADD CONSTRAINT `fk_datausaha_02` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`),
ADD CONSTRAINT `fk_datausaha_03` FOREIGN KEY (`id_sektor`) REFERENCES `sektor_usaha` (`id_sektor`),
ADD CONSTRAINT `fk_datausaha_04` FOREIGN KEY (`no_ktp`) REFERENCES `pemilik_usaha` (`no_ktp`);

--
-- Ketidakleluasaan untuk tabel `desa`
--
ALTER TABLE `desa`
ADD CONSTRAINT `fk_desa_01` FOREIGN KEY (`id_kec`) REFERENCES `kecamatan` (`id_kec`);

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
ADD CONSTRAINT `fk_galeri_01` FOREIGN KEY (`id_usaha`) REFERENCES `data_usaha` (`id_usaha`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
