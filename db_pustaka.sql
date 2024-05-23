-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 07:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `foto`, `judul_buku`, `kategori`, `penulis`, `penerbit`, `tahun_terbit`, `sinopsis`, `stok`) VALUES
(11, 'A001', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', 'Bisnis dan Investasi', 'Lizar Alfansi', 'Salemba', 2024, 'Setiap destinasi wisata yang dikunjungi tentunya menimbulkan sensasi yang berbeda sesuai dengan persepsi masing-masing pengunjung (wisatawan). Persepsi yang terbentuk tak lepas dari pengaruh budaya, gaya hidup, pendidikan, teknologi, dan globalisasi.\r\n\r\nPara pemasar destinasi wisata, khususnya di Indonesia, memiliki tugas utama untuk memahami kebutuhan dan keinginan wisatawan global mengingat Indonesia juga menjadi salah satu negara yang banyak dikunjungi wisatawan asing. Termasuk di dalam tugasnya adalah menjelaskan perbedaan perilaku wisatawan berdasarkan segmen pasar yang ada dan menyusun strategi pemasaran yang relevan untuk menarik wisatawan global ke Indonesia.\r\n\r\nBuku Pemasaran Pariwisata: Membidik Wisatawan Global merupakan hasil karya perjalanan panjang penulis selama (setidaknya) 30 tahun menekuni bidang pemasaran, dilengkapi dengan pengalamannya mengunjungi berbagai destinasi wisata lokal ataupun mancanegara. Materi yang diulas dalam buku ini disajikan dengan pendekatan akademis dan populer, dengan menyajikan hasil penelitian empiris dan praktik pemasaran pariwisata global.', 3),
(12, 'A002', 'BLK_MEB1704854901617.jpg', 'Managing Employee Burnout', 'Bisnis dan Investasi', 'Shauna Moran', 'Elex Media Komputindo', 2024, 'Burnout adalah kondisi kelelahan secara emosional, fisik, dan mental. Dalam dunia kerja, burnout menyebabkan tingkat stres yang lebih tinggi, ketidakhadiran karena sakit yang lebih besar, produktivitas yang lamban, dan peningkatan pergantian karyawan. Oleh karena itu, penanganannya menjadi sangat penting.\r\n\r\nBuku Managing Employee Burnout mencakup banyak hal mulai dari apa itu burnout, apa penyebabnya, dan apa saja bentuknya. Buku ini juga mengeksplorasi peran organisasi/perusahaan dalam kelelahan (burnout) karyawan dan menyertakan panduan khusus untuk mengelola burnout di lingkungan kerja jarak jauh. Selain itu, buku ini juga menjawab pertanyaan mengapa tim yang tersebar (hybrid working) mungkin lebih rentan terhadap burnout.\r\n\r\nPenuh dengan saran yang dapat ditindaklanjuti dan contoh-contoh konkret, buku ini menunjukkan strategi apa yang harus dilakukan untuk menjaga retensi dan produktivitas karyawan dari ancaman burnout sekaligus bagaimana mempromosikan kesadaran dan kecerdasan emosional dalam bisnis. Buku ini juga menjelaskan mengapa bentuk komunikasi, kepemimpinan, budaya perusahaan yang efektif, dan strategi talenta yang inklusif adalah kunci untuk membangun tenaga kerja yang sehat, terlibat, dan berkelanjutan. Ada juga cakupan tentang bagaimana meningkatkan kesehatan mental karyawan dan diskusi tentang pentingnya istirahat serta bagaimana menetapkan batasan-batasan yang sehat. Managing Employee Burnout adalah bacaan penting bagi semua profesional SDM (HR Professionals) dan semua yang ingin memastikan dan bertanggung jawab pada tenaga kerja yang sehat, bahagia, dan produktif.', 5),
(13, 'A003', 'BLK_PJFE21679978797017.jpg', 'Pemasaran Jasa Finansial', 'Bisnis dan Investasi', 'Lizar Alfansi', 'Salemba', 2023, 'Buku ini menguraikan secara terperinci dan komprehensif pembahasan seputar perkembangan sector jasa finansial hingga budaya layanan yang menjadi salah satu aspek penting dalam pemasaran jasa. Dengan menggunakan kombinasi pendekatan akademis dan popular serta penyajian hasil penelitian empiris dan praktik pemasaran produk finansial di dunia perbankan yang dilakukan oleh penulis menjadikan buku ini patut dipelajari oleh para pembaca umum, praktisi, mapun akademisi yang tertarik untuk mengetahui lebih dalam tentang pemasaran jasa finansial, khususnya di Indonesia.', 5),
(14, 'B001', 'BLK_TM1671425070708.jpg', 'Tangisan Mentari', 'Sejarah', 'Santy Syafaat', 'CV. Adanu Abimata', 2022, 'Mata yang indah, kini sembab. Mata yang bening, dipenuhi awan hitam. Mengalirkan luka, memenuhi hati dan jiwa. Mentari berdiri di depan panti asuhan. Di kota yang sangat asing. Ia terbuang karena virus HIV. Keluarganya kehilangan kekerabatan dan nurani.\r\n\r\nTuhan, kemana kaki ini akan melangkah. Mengapa jalanku penuh onak dan duri. Tuhan, aku masih sangat kecil. Usiaku baru tiga belas tahun. Mengapa diskriminasi melukaiku. Kutatap lagi panti asuhan yang berdiri megah. Hingga kuputuskan berjalan masuk. Aku tidak punya pilihan, perutku lapar, tenggorokanku kering. Kulitku terpanggang matahari. Aku butuh tempat berteduh, aku harus tetap hidup.\r\n\r\nStigma membuat Mentari memutuskan pergi. Kemana, ia tidak tahuÃ¢Â€Â¦.. Jantungnya tak lagi berdetak. Ketika kembali terjatuh dan tak lagi bernafas, Tuhan mengirim dewa penolong. Seorang laki-laki yang mengorbankan hidupnya untuk Mentari.\r\n\r\nMentari mulai melukis sketsa kehidupan dalam kanfas imajinasi. Merenda impian yang hilang. Lalu berjalan menantang badai kehidupan, menaklukan Jakarta agar bisa berdiri di atas podium yang megah untuk membuka mata keluarganya yang sudah membuangnya. Mentari ingin lukisan dan desain busananya diperbincangkan dunia.Ã‚ ', 5),
(15, 'B002', 'BLK_STS21702005871550.jpg', 'Seri TEMPO Soedirman 2023', 'Sejarah', 'Tim TEMPO', 'Kepustakaan Populer Gramedia', 2023, 'Yang sakit itu Soedirman, tapi Panglima Besar tidak pernah sakit.Ã¢Â€Â Pagi itu, 19 Desember 1948, Panglima Besar bangkit dan memutuskan memimpin pasukan keluar dari Yogyakarta, mengonsolidasikan tentara, dan mempertahankan Republik dengan bergerilya.\r\n\r\nPanglima Besar sudah terikat sumpah: haram menyerah bagi tentara. Karena ikrar inilah Soedirman menolak bujukan Sukarno untuk berdiam di Yogyakarta. Dengan separuh paru-paru, ia memimpin gerilya. Selama delapan bulan, dengan ditandu, ia keluar-masuk hutan.\r\n\r\nDi medan gerilya, Panglima Besar dipercaya bisa bersembunyi dari kejaran Belanda. Mampu menyembuhkan orang sakit danÃ¢Â€Â”kononÃ¢Â€Â”menjatuhkan pesawat terbang dengan meniupkan bubuk merica. Aktivis Hizbul Wathan, mantan guru dan peletak dasar kultur TNI yang ironisnya dulu sempat berkata, Ã¢Â€ÂœSaya cacat, tak layak masuk tentara.Ã¢Â€Â Dialah Soedirman: panglima, martir.\r\n\r\nKisah tentang Soedirman adalah jilid kedua seri Ã¢Â€ÂœTokoh MiliterÃ¢Â€Â yang diangkat dari liputan khusus Majalah Berita Mingguan Tempo November 2012. Serial ini mengupas, menguak, dan membongkar mitos dan berbagai sisi kehidupan para perwira militer yang dinilai mengubah sejarah.\"', 5),
(16, 'C001', 'BLK_BAPSD1704162651942.jpg', 'BUKU AJAR PEMROGRAMAN STRUKTUR DATA', 'Teknologi Komputer', 'Charisma Tubagus Setyobudhi, B.Eng., M.T.', 'CV Mega Press Nusantara', 2024, 'Buku ajar ini disusun bertujuan untuk mengenalkan pembaca kepada teori serta cara pemrograman struktur data. Struktur data penting diketahui karena dengan mengetahui cara penyimpanan data yang efektif dan efisien program akan berjalan lebih cepat. Struktur data yang dibahas di dalam buku ini dibagi menjadi dua bagian yaitu struktur data linear dan struktur data non linear. Struktur data linear meliputi array, linked list, double linked list, circular list, stack dan queue. Sedangkan struktur data non linear meliputi tree, binary search tree, avl tree dan red black tree. Penulis berharap dengan adanya buku ini pembaca dapat membekali wawasannya di bidang pemrograman struktur data.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(15, 'Bisnis dan Investasi'),
(16, 'Sejarah'),
(17, 'Teknologi Komputer'),
(18, 'Teknisi Teknik Profesional'),
(19, 'Filsafat'),
(20, 'Ilmu Pengetahuan Alam');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `total_kunjungan` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `nim`, `nama`, `prodi`, `level`, `tanggal`, `total_kunjungan`) VALUES
(19, '2201092019', 'Miftahurrahmah', 'D3 Manajemen Informatika', 'Mahasiswa', '2024-01-10', 0),
(20, '2201091016', 'Karina QurAni', 'D3 Manajemen Informatika', 'Mahasiswa', '2024-01-10', 0),
(21, '19860722 200912 1 00', 'Roni Putra', 'D3 Teknik Komputer', 'Dosen', '2024-01-10', 0),
(24, '', '', '', '', '2024-01-11', 0),
(25, '2201092019', 'Miftahurrahmah', 'D3 Manajemen Informatika', 'Mahasiswa', '2024-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `register_date` date NOT NULL,
  `alamat` text NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `level` enum('Mahasiswa','Dosen','Staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nim`, `nama`, `email`, `register_date`, `alamat`, `prodi`, `level`) VALUES
('2201091016', 'Karina QurAni', 'karina@gmail.com', '2024-01-09', 'Padang', 'D3 Manajemen Informatika', 'Mahasiswa'),
('2201092019', 'Miftahurrahmah', 'miftahurahmah@gmail.com', '2024-01-11', 'Padang', 'D3 Manajemen Informatika', 'Mahasiswa'),
('2201092046', 'Muhammad Fauzan Maulana', 'fauzan@gmail.com', '2024-01-07', 'Padang', 'D3 Manajemen Informatika', 'Mahasiswa'),
('2201092057', 'Raihana Sakinah', 'rere@gmail.com', '2024-01-08', 'Padang', 'D3 Manajemen Informatika', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `penerbit`, `kota`) VALUES
(4, 'Salemba', 'Bengkulu'),
(5, 'Elex Media Komputindo', 'Jakarta'),
(6, 'CV. Adanu Abimata', 'Jawa Barat'),
(7, 'Kepustakaan Populer Gramedia', 'Jakarta'),
(8, 'CV Mega Press Nusantara', 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(5, 'Lizar Alfansi'),
(6, 'Shauna Moran'),
(7, 'Santy Syafaat'),
(8, 'Tim TEMPO'),
(9, 'Charisma Tubagus Setyobudhi, B.Eng., M.T.');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(6) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'pustakawan', 'pustakawan', 'pustakawan', 'pustakawan');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjam` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kode_buku` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `level` varchar(100) NOT NULL,
  `status` enum('Pinjam','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjam`, `nim`, `nama`, `kode_buku`, `kategori`, `foto`, `judul_buku`, `tgl_pinjam`, `tgl_kembali`, `level`, `status`) VALUES
(49, '2201092046', 'Muhammad Fauzan Maulana', 'A001', 'Bisnis dan Investasi', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', '2024-01-11', '2024-01-18', 'Mahasiswa', 'Pinjam'),
(50, '2201092019', 'Miftahurrahmah', 'A003', 'Bisnis dan Investasi', 'BLK_PJFE21679978797017.jpg', 'Pemasaran Jasa Finansial', '2024-01-11', '2024-01-18', 'Mahasiswa', 'Pinjam'),
(52, '2201092057', 'Raihana Sakinah', 'A001', 'Bisnis dan Investasi', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', '2024-01-01', '2024-01-08', 'Mahasiswa', 'Pinjam'),
(53, '2201092057', 'Raihana Sakinah', 'A001', 'Bisnis dan Investasi', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', '2024-01-03', '2024-01-10', 'Mahasiswa', 'Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `jurusan`) VALUES
(11, 'D3 Manajemen Informatika', 'Teknologi Informasi'),
(12, 'D3 Teknik Komputer', 'Teknologi Informasi'),
(13, 'D4 Teknologi Rekayasa Perangkat Lunak', 'Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_pinjam` int(11) NOT NULL,
  `kode_buku` varchar(255) DEFAULT NULL,
  `foto` text NOT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) NOT NULL,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('Selesai') DEFAULT NULL,
  `level` enum('Mahasiswa','Dosen','Staff') NOT NULL,
  `denda` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_pinjam`, `kode_buku`, `foto`, `judul_buku`, `kategori`, `nim`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `level`, `denda`) VALUES
(35, 'B001', 'BLK_TM1671425070708.jpg', 'Tangisan Mentari', 'Sejarah', '2201092046', 'Muhammad Fauzan Maulana', '2024-01-01', '2024-01-08', 'Selesai', 'Mahasiswa', '3000'),
(51, 'A001', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', 'Bisnis dan Investasi', '2201092019', 'Miftahurrahmah', '2024-01-01', '2024-01-08', 'Selesai', 'Mahasiswa', '3000'),
(54, 'A001', 'BLK_PPMWG1704879105973.jpg', 'Pemasaran Pariwisata: Membidik Wisatawan Global', 'Bisnis dan Investasi', '2201092057', 'Raihana Sakinah', '2024-01-11', '2024-01-25', 'Selesai', 'Mahasiswa', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
