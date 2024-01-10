-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2023 pada 14.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `besani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `idagenda` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `waktu` char(11) NOT NULL,
  `agenda` text NOT NULL,
  `idpaket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`idagenda`, `hari`, `waktu`, `agenda`, `idpaket`) VALUES
(1, 1, '08:00_08:30', 'Kedatangan di Desa Wisata Besani, pendaftaran, dan minuman penyambutan berupa \r\nteh lokal.', 1),
(2, 1, '08:30_09:00', 'Sambutan selamat datang dan pengenalan singkat mengenai Desa Wisata Besani.', 1),
(3, 1, '09:00_10:30', 'Eksplorasi Sentra Produksi Opak: Ikuti proses pembuatan Opak, mulai dari \r\npemilihan bahan hingga menjadi keripik yang siap dinikmati. Peserta berkesempatan \r\nmencoba membuat sendiri dan mencicipi Opak segar', 1),
(4, 1, '10:30_12:00', 'Pengenalan Teh Sangan: Kunjungan ke kebun teh lokal, belajar mengenai proses \r\npanen dan fermentasi daun teh untuk produksi Teh Sangan. Tidak lupa, sesi mencicipi \r\nteh hangat', 1),
(5, 1, '16:00_16:30', 'Kedatangan di Desa Wisata Besani, pendaftaran, dan minuman penyambutan berupa \r\nteh lokal', 2),
(6, 1, '16:30_17:00', 'Pengenalan singkat mengenai sejarah layar tancap di Desa Wisata Besani dan pengantar \r\nkeunikan hiburan ini di pendopo tradisional', 2),
(7, 1, '17:00_19:00', 'Sesi nostalgia: Anda akan menonton film-film klasik Indonesia yang diputar di layar \r\ntancap dalam atmosfer yang khas pendopo. Nikmati film-film legendaris sambil \r\nditemani camilan khas dan minuman teh', 2),
(8, 1, '19:00_20:00', 'Makan malam dengan menu khas desa yang lezat', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `idbayar` int(11) NOT NULL COMMENT '\r\n',
  `waktu` datetime NOT NULL,
  `jumlah` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `an` varchar(63) NOT NULL,
  `bukti` text NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `idrekening` int(11) NOT NULL,
  `idtiket` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`idbayar`, `waktu`, `jumlah`, `uraian`, `an`, `bukti`, `status`, `idrekening`, `idtiket`) VALUES
(1, '2023-12-02 21:19:55', 900000, 'Dp (Down Payment) / Uang Muka', 'Rifqi', '1701573595_f662faaa585912705449.jpeg', '0', 2, '666051860'),
(2, '2023-12-03 00:11:03', 900000, 'Pelunasan', 'Rifqi', '1701583863_3132b5697e495285ef5f.jpeg', '0', 2, '666051860');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `idfaq` int(11) NOT NULL,
  `tanya` varchar(99) NOT NULL,
  `jawab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `faq`
--

INSERT INTO `faq` (`idfaq`, `tanya`, `jawab`) VALUES
(1, 'Apa itu Desa Wisata?', 'contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban '),
(2, 'Kenapa kamu harus ke Desa Wisata Besani?', 'contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban contoh jawaban ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `harga`
--

CREATE TABLE `harga` (
  `idharga` int(11) NOT NULL,
  `jenis` enum('0','1') NOT NULL,
  `minimum` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `idpaket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `harga`
--

INSERT INTO `harga` (`idharga`, `jenis`, `minimum`, `harga`, `idpaket`) VALUES
(1, '0', 1, 175000, 1),
(2, '1', 10, 150000, 1),
(3, '1', 20, 125000, 1),
(4, '0', 1, 100000, 2),
(5, '1', 10, 85000, 2),
(6, '1', 20, 70000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `induk` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `idpengguna` int(11) NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `waktu`, `induk`, `komentar`, `idpengguna`, `idpost`) VALUES
(1, '2023-10-25 14:11:14', 0, 'Wow! bagus sekali informasinya, terima kasih kaka,, semangat', 2, 1),
(2, '2023-10-24 17:11:14', 1, 'Semangat Kaka Nita!', 2, 1),
(3, '2023-10-25 20:11:14', 1, 'heheh,, contoh balasan komentar', 2, 1),
(4, '2023-10-25 14:11:14', 0, 'Wow! bagus sekali informasinya, terima kasih kaka,, semangat', 2, 1),
(5, '2023-10-25 07:11:14', 0, 'Semangat Kaka Nita!', 2, 1),
(6, '2023-10-25 20:24:04', 4, 'heheh,, contoh balasan komentar', 2, 1),
(7, '2023-10-26 22:34:20', 0, 'silahkan berkomentar dengan sopan', 7, 1),
(8, '2023-10-26 22:35:41', 0, 'hayooo loh,, jangan berdebat yaa,, anda sopan kami segan', 7, 1),
(9, '2023-10-27 03:06:09', 0, 'komentar lagi ah,,', 7, 1),
(10, '2023-10-27 03:30:58', 9, 'balasan lagi ah...', 7, 1),
(11, '2023-10-27 03:31:13', 9, 'contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi contoh balasan lagi ', 7, 1),
(12, '2023-10-27 05:51:45', 0, 'tes komentar admin', 7, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `idpaket` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `paket` varchar(99) NOT NULL,
  `deskripsi` text NOT NULL,
  `durasi` varchar(27) NOT NULL,
  `fasilitas` text NOT NULL,
  `konfirmasi` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`idpaket`, `thumbnail`, `paket`, `deskripsi`, `durasi`, `fasilitas`, `konfirmasi`) VALUES
(1, '71548.jpg', 'Dewi Besani Tour 1 Day: Jelajah Sentra Produksi Souvenir', 'Selamat datang dalam petualangan satu hari yang mempesona di \"Dewi Besani Tour: Jelajah Sentra Produksi Souvenir (Teh Sangan, Opak, Cobek)\". Paket ini mengajak Anda untuk merasakan dan menggali keunikan Desa Wisata Besani yang dikenal sebagai pusat produksi souvenir berupa teh sangan, opak, cobek, dan kerajinan tangan lainnya', '1 hari', 'Pemandu wisata berbahasa Indonesia\r\nMakan siang tradisional\r\nAir mineral\r\nDokumentasi\r\nSertifikat partisipasi\r\nSouvenir\r\nTransportasi lokal', '1'),
(2, '71546.jpg', 'Dewi Besani Nostalgia Layar Tancap', 'Selamat datang dalam petualangan nostalgia yang penuh keseruan di \"Dewi Besani - Nostalgia \r\nLayar Tancap.\" Paket ini membawa Anda kembali ke masa lalu di mana menonton film di layar \r\ntancap adalah hiburan seni film yang akan mengingatkan anda kembali suasana masa lampau.', '1 hari', 'Pemandu wisata lokal\r\nWelcome drink tradisional\r\nMakan malam tradisional\r\nJajanan khas saat pemutaran film\r\nBantal lesehan untuk kenyamanan saat menonton\r\nSouvenir khas Desa Wisata Besani', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengelola`
--

CREATE TABLE `pengelola` (
  `idpengelola` int(11) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL,
  `jabatan` varchar(36) NOT NULL,
  `posisi` enum('0','1','2','3','4','5','') NOT NULL,
  `foto` text NOT NULL,
  `fb` varchar(27) NOT NULL,
  `ig` varchar(27) NOT NULL,
  `tw` varchar(27) NOT NULL,
  `wa` varchar(14) NOT NULL,
  `email` varchar(99) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengelola`
--

INSERT INTO `pengelola` (`idpengelola`, `nama`, `jekel`, `jabatan`, `posisi`, `foto`, `fb`, `ig`, `tw`, `wa`, `email`, `status`) VALUES
(1, 'Nita Setyawati', 'Wanita', 'Ketua', '0', 'nita_zanita.jpg', 'nita.mustbespirit', 'nita_zanita', 'nitahijabtravel', '085746695946', 'zanitaqueen@gmail.com', '1'),
(2, 'Sukoco', 'Pria', 'Penanggung Jawab', '', '', '', '', '', '', '', '1'),
(3, 'Sigit', 'Pria', 'Pengawas', '', '', '', '', '', '', '', '1'),
(5, 'Rania Safitri', 'Wanita', 'Wakil Ketua I', '1', '1701505852_81760aa3b3092c06cf29.jpg', 'ae543', '', 'w223', '0880653565', 'nnataherijadi69@gmail.com', '1'),
(7, 'Abdi Susanto', 'Pria', 'Ketertiban dan Keamanan Akomodasi', '4', '', 'asdasd', 'sdasda', 's', '08123456789', 'scfenterpriseprojects@gmail.com', '1'),
(8, 'Rio Abdillah', 'Pria', 'Kebersihan dan Kesehatan', '4', '', '', '', '', '08123456789', 'bumdes@bligorejo.com', '1'),
(9, 'Beni Siregar', 'Pria', 'Ketertiban dan Keamanan Akomodasi', '4', '', '', '', '', '078436044579', 'anitaptrknzn11@gmail.com', '1'),
(10, 'Ferdi Akhyar', 'Pria', 'Anggota', '5', '', '', '', '', '0880653565', 'nnataherijadi69@gmail.com', '1'),
(11, 'Jaka Suwarno', 'Pria', 'Anggota', '5', '', 'sdasd', 'sdasd', '', '0865470000', 'zimsecret@gmail.com', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama` varchar(63) NOT NULL,
  `jekel` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(14) NOT NULL,
  `email` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` char(32) NOT NULL,
  `level` enum('high','mid','low') NOT NULL,
  `foto` text NOT NULL,
  `otp` char(5) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama`, `jekel`, `alamat`, `telepon`, `email`, `username`, `password`, `level`, `foto`, `otp`, `status`) VALUES
(1, 'Nita Zanita', 'Wanita', 'Pekalongan', '085746695946', 'zanitaqueen@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'high', 'nita_zanita.jpg', '', '1'),
(2, 'Roron Aditya ', 'Pria', 'Jl. Raya Ramai Sekali, No. 99', '08123456789', 'roronadit@gmail.com', 'roron', 'd3f5bea5c5d8ebb09c85cb6090a6dbf4', 'low', '', '', '1'),
(7, 'Abdi Susanto', 'Pria', 'Gg. K.H. Wahid Hasyim (Kopo) No. 712, Tanjung Pinang 20372, SumBar', '085865646731', 'nnataherijadi69@gmail.com', 'abdi71', 'e10adc3949ba59abbe56e057f20f883e', 'mid', '1698367505_c94d8b0505c716ddcb57.jpeg', '', '1'),
(8, 'Rania Safitri', 'Wanita', 'Ds. Tangkil Tengah', '085654875142', 'scfenterpriseprojects@gmail.com', 'rania56', 'e10adc3949ba59abbe56e057f20f883e', 'mid', '', '', '1'),
(9, 'Ajeng Aldi H', 'Wanita', 'Gg. K.H. Wahid Hasyim (Kopo) No. 712, Tanjung Pinang 20372, SumBar', '078436044579', 'anitaptrknzn11@gmail.com', 'ajeng79', 'e10adc3949ba59abbe56e057f20f883e', 'mid', '', '', '1'),
(14, 'Roron Adit', 'Pria', 'Jln. Diponegoro No. 951, Kotamobagu 19267, BaBel', '+629464372', 'email@domain.ext', 'roron677', 'e10adc3949ba59abbe56e057f20f883e', 'low', '', '48892', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `kategori` enum('0','1','2','3','4','5','6','7') NOT NULL,
  `judul` varchar(99) NOT NULL,
  `thumbnail` text NOT NULL,
  `isi` text NOT NULL,
  `tag` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `idpengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`idpost`, `waktu`, `kategori`, `judul`, `thumbnail`, `isi`, `tag`, `status`, `idpengguna`) VALUES
(1, '2023-10-22 09:54:02', '0', 'Wisata Terkini dan Terbaru', '', 'contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata ', 'wisata, pemandangan, desa, besani', '1', 1),
(2, '2023-10-25 09:54:02', '6', 'Kunjungilah Wisata Kami', '', 'contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata contoh isi wisata ', 'wisata, pemandangan, desa, besani', '1', 1),
(4, '2023-10-27 03:48:12', '1', 'Teh Sangan', '', 'Teh Sangan yang merupakan jenis teh khas dari daerah Besani atau daerah lain yang terkenal dengan produksi Teh\r\nSangan. Teh Sangan adalah teh yang terkenal karena kualitasnya yang baik dan rasa yang khas.\r\nTeh Sangan Besani biasanya memiliki ciri khas dan keunikan tersendiri dalam hal rasa, aroma, atau cara pengolahannya\r\nyang membedakannya dengan jenis teh lainnya. Mungkin ada perbedaan dalam proses produksi, varietas teh yang digunakan, atau cara penyeduhan yang memberikan karakteristik unik pada Teh Sangan Besani.\r\n', 'teh, kuliner, besani', '1', 7),
(5, '2023-10-27 03:54:16', '1', 'Opak Singkong Besani', '', 'Makanan ringan khas dari daerah Besani atau daerah lain yang terkenal dengan produksi Opak. Opak adalah makanan\r\nyang terbuat dari singkong yang diolah dan dikeringkan. Opak Besani biasanya memiliki ciri khas dan keunikan tersendiri dalam hal rasa, tekstur, atau cara pengolahan yang membedakannya dengan jenis Opak lainnya. Mungkin ada variasi dalam proses produksi atau bumbu yang digunakan yang memberikan rasa dan aroma khas pada Opak Besani.', 'opak, singkong, besani, jajan, kuliner', '1', 7),
(6, '2023-10-27 04:03:51', '2', 'De Blado', '', 'Homestay De Blado adalah akomodasi penginapan yang terletak di daerah Blado, Jawa Tengah. Homestay ini menawarkan pengalaman menginap yang autentik dan nyaman, memberikan kesempatan bagi wisatawan untuk merasakan kehidupan sehari-hari dan budaya lokal.\r\n', 'homestay, blado, de blado, besani', '1', 7),
(7, '2023-10-27 04:13:55', '2', 'Semar', '', 'Homestay Semar adalah sebuah akomodasi penginapan yang dilengkapi dengan fasilitas peternakan sapi. Homestay ini menawarkan pengalaman unik bagi para tamu untuk berinteraksi dengan sapi dan mempelajari lebih lanjut tentang kegiatan peternakan sapi.', 'homestay, semar, besani', '1', 7),
(8, '2023-10-27 04:21:50', '', 'Sprei Lukis Besani', '', 'Sprei lukis Dewi Besani biasanya memiliki desain yang indah dan detail yang menggambarkan gambar Dewi Besani atau elemen budaya Jawa yang terkait. Desainnya bisa bervariasi, termasuk gambar wajah Dewi Besani, adegan mitologi, motif Jawa, atau kombinasi berbagai elemen artistik.', 'sprei, lukis, besani, fashion', '1', 7),
(9, '2023-10-27 04:22:11', '', 'Sprei Lukis Besani', '', 'Sprei lukis Dewi Besani biasanya memiliki desain yang indah dan detail yang menggambarkan gambar Dewi Besani atau elemen budaya Jawa yang terkait. Desainnya bisa bervariasi, termasuk gambar wajah Dewi Besani, adegan mitologi, motif Jawa, atau kombinasi berbagai elemen artistik.', 'sprei, lukis, besani, fashion', '1', 7),
(10, '2023-10-27 04:26:32', '3', 'Sprei Lukis Besani', '', 'Sprei lukis Dewi Besani biasanya memiliki desain yang indah dan detail yang menggambarkan gambar Dewi Besani atau elemen budaya Jawa yang terkait. Desainnya bisa bervariasi, termasuk gambar wajah Dewi Besani, adegan mitologi, motif Jawa, atau kombinasi berbagai elemen artistik.', 'sprei, lukis, besani, fashion', '1', 7),
(11, '2023-10-27 04:42:09', '3', 'Tas Lukis', '', 'Tas lukis Dewi Besani pada tas yang dihiasi dengan lukisan atau gambar Dewi Besani atau elemen budaya Jawa terkait. Dewi Besani adalah salah satu figur atau dewi dalam mitologi Jawa yang memiliki makna dan simbolik khusus dalam budaya Jawa.', 'tas, lukis, besani, fashion', '1', 7),
(12, '2023-10-27 05:02:55', '4', 'Cobek', '', 'Cobek Dewi Besani adalah salah satu jenis souvenir atau produk kerajinan tangan yang terinspirasi dari tradisi atau budaya Jawa. Cobek adalah wadah dari batu alam yang digunakan untuk menghaluskan atau menggiling bahanbahan dalam proses memasak tradisional. dengan sentuhan artistik Dewi Besani yang diberikan pada cobek tersebut.', 'cobek, kriya', '1', 7),
(13, '2023-10-27 05:07:20', '4', 'Jilbab Payet', '', 'Souvenir jilbab payet adalah salah satu jenis souvenir yang populer di kalangan pengunjung. Jilbab payet mengacu pada jilbab atau hijab yang dihiasi dengan payet atau hiasan berkilauan yang terbuat dari berbagai bahan seperti manik-manik, kristal, atau sequin.', 'jilbab, payet, kriya, besani', '1', 7),
(14, '2023-10-27 05:54:49', '6', 'Vibes Besani', '', 'contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten contoh isian konten ', 'foto, vibes, besani, suasana', '1', 7),
(15, '2023-10-27 06:00:45', '5', 'Desa Wisata Besani di Batang, Tempat Akulturasi Budaya Jawa dan China', '1698404445_d8afa2cb31c6c1b5a0ee.jpeg', 'Wisatawan yang mencari pengalaman baru saat liburan bisa mengunjungi Desa Wisata Besani di Kecamatan Blado, Kabupaten Batang, Jawa Tengah. Wisatawan bisa mengetahui soal kesenian Jawa dan bahasa Mandarin. Terletak sekitar 25 kilometer (km) dari Ibu Kota Kabupaten Batang, Desa Wisata Besani masuk 75 besar Anugerah Desa Wisata Indonesia (ADWI) 2023 dari Kementerian Pariwisata dan Ekonomi Kreatif (Kemenparekraf).\r\nDesa ini memiliki tagline \"Gerbang Akulturasi Jawa-Cina\". Hal itu berkaitan dengan letak Kabupaten Batang yang strategis di pantai utara Jawa Tengah, tepatnya di jalur utama yang menghubungkan Jakarta dengan Surabaya. Dilansir dari laman Jadesta, lokasi tersebut menimbulkan adanya peluang investasi dan relokasi industri yang sebagian besar dari China. \"Yang menarik ini perlu di contoh desa-desa lainnya, bahwa di sini dengan investasi yang besar dari pihak investor China, desa ini juga menyiapkan sebuah terobosan dengan menciptakan kampung Jawa Mandarin, yang mengajarkan bahasa Mandarin ke anak-anak di desa wisata besani ini,\" kata Menteri Pariwisata dan Ekonomi Kreatif (Menparekraf) Sandiaga Uno, lewat keterangan resmi.\r\nDesa Wisata Besani memiliki beragam daya tarik. Setiap minggunya, ada kelas bahasa Mandarin yang bisa diikuti anak-anak. Kelas ini bertujuan mengajarkan bahasa asing sejak usia dini. \"Ini adalah bentuk bagaimana kita berinovasi sehingga mereka memiliki keterampilan, paling tidak berbahasa asing dan meningkatkan kemampuannya mendapat kerja,\" ujar Menparekraf. Wisatawan juga bisa mengunjungi Museum Teh untuk mempelajari serba-serbi teh, mulai dari daun hingga siap minum. Jika berjiwa petualang, tersedia pula paket Besani Village Trekking untuk menjelajahi wilayah desa tersebut atau mengunjungi Curug Dewi Besani.\r\n', 'berita, besani, deswita, sandiaga, uno, kemenparekraf, penghargaan, adwi', '1', 7),
(16, '2023-10-27 09:38:57', '7', 'Sambutan', 'https://www.youtube.com/watch?v=3Y5fFh7E0po', 'contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan contoh isi sambutan ', 'video, sambutan, besani', '1', 7),
(19, '2023-10-27 09:50:09', '7', 'Desa Wisata Besani di Batang, Tempat Akulturasi Budaya Jawa dan Chinas', '', 'contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video contoh isi konten video ', 'opak, singkong, besani, jajan, kuliner', '1', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `email` varchar(99) NOT NULL,
  `logo` text NOT NULL,
  `ikon` text NOT NULL,
  `ig` varchar(45) NOT NULL,
  `fb` varchar(45) NOT NULL,
  `yt` varchar(45) NOT NULL,
  `telepon` char(14) NOT NULL,
  `alamat` text NOT NULL,
  `situs` varchar(45) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tentang` text NOT NULL,
  `fasilitas` text NOT NULL,
  `sk` text NOT NULL,
  `bantuan` text NOT NULL,
  `nama` varchar(36) NOT NULL,
  `tagline` varchar(99) NOT NULL,
  `lokasi` text NOT NULL,
  `thumbnail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`email`, `logo`, `ikon`, `ig`, `fb`, `yt`, `telepon`, `alamat`, `situs`, `visi`, `misi`, `tentang`, `fasilitas`, `sk`, `bantuan`, `nama`, `tagline`, `lokasi`, `thumbnail`) VALUES
('dewibesani@gmail.com', '1701486492_5909138355f0c8fb46c2.png', '1701486275_826548087fb586a8273a.png', 'dewibesani', 'dewibesani', 'desawisatabesani3436', '085746695946', 'Tegaran, Besani, Kecamatan Blado, Kabupaten Batang, Jawa Tengah', 'http://dewibesani.com', 'Mewujudkan Desa Wisata Besani sebagai Gerbang Akulturasi Jawa dan China dengan melestarikan warisan budaya yang didukung dengan pengembangan edukasi dan digitalisasi yang berdaya saing di dunia', '-', 'Kabupaten Batang terletak di pantai utara Jawa Tengah dan berada pada jalur utama yang menghubungkan Jakarta-Surabaya. Posisi tersebut menempatkan wilayah Kabupaten Batang, utamanya Ibu Kota Pemerintahannya pada jalur ekonomi pulau Jawa sebelah utara yang sangat prospektif, terlebih dengan adanya peluang investasi dari relokasi industri dari negara lain yang Sebagian besar berasal dari Negara China. Hal ini berpotensi untuk meningkatkan berbagai sumberdaya yang ada dan mengenalkan pariwisata kepada negara lain khususunya China.\r\n\r\nDesa Besani Blado adalah sebuah desa yang berada di kecamatan Blado Kabupaten Batang.  Desa Besani berada di daerah dataran tinggi dengan hamparan pemandangan alam yang indah berjarak sekitar 25 Km dari ibukota Kabupaten Batang ke arah tenggara.  Di desa wisata terdapat pusat atraksi De Blado yang memberikan sebuah wisata mengedepankan kebudayaan tradisi Jawa dan juga terdapat pusat belajar Mandarin.', 'Areal Parkir\r\nBalai Pertemuan\r\nCafetaria\r\nJungle Tracking\r\nKamar Mandi Umum\r\nKios Souvenir\r\nKuliner\r\nMusholla\r\nOutbound\r\nSelfie Area\r\nSpot Foto\r\nTempat makan\r\nWifi Area', '-', '-', 'Dewi Besani', 'Gerbang Akulturasi Jawa-China', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3959.2936898908793!2d109.8527647!3d-7.091915500000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zN8KwMDUnMzAuOSJTIDEwOcKwNTEnMTAuMCJF!5e0!3m2!1sid!2sid!4v1698157914481!5m2!1sid!2sid', '1701486558_b4062e8b2c7ac5cf4056.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `idrekening` int(11) NOT NULL,
  `bank` char(36) NOT NULL,
  `norek` char(18) NOT NULL,
  `an` varchar(63) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`idrekening`, `bank`, `norek`, `an`, `status`) VALUES
(2, 'mandiri', '3216598511054', 'dewibesani', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `respon`
--

CREATE TABLE `respon` (
  `idrespon` int(11) NOT NULL,
  `jenis` enum('0','1') NOT NULL,
  `waktu` datetime NOT NULL,
  `nama` varchar(63) NOT NULL,
  `email` varchar(99) NOT NULL,
  `alamat` text NOT NULL,
  `respon` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `idpengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `respon`
--

INSERT INTO `respon` (`idrespon`, `jenis`, `waktu`, `nama`, `email`, `alamat`, `respon`, `status`, `idpengguna`) VALUES
(1, '1', '2023-10-20 08:49:36', 'Dani Aditya', 'dani@gmail.com', 'Siju, Besani, Blado - Batang', 'contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon contoh respon ', '1', 0),
(2, '0', '2023-10-23 08:49:36', 'Santi Lestiarini', 'santi99@gmail.com', 'Jl. Raya Blado - Pagilaran, Kecepit, Besani Batang', 'contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain contoh respon lain ', '1', 0),
(6, '0', '2023-12-02 07:33:35', 'Roron Adit', '', '', 'Desa ini bisa dibilang sebagai salah satu pionir desa wisata di Batang. Dalam tur desa mereka, Anda akan diperkenalkan dengan kehidupan masyarakat setempat, keindahan alamnya serta pengalaman budaya langsung. Kunjungan yang sangat menarik', '', 14),
(7, '0', '2023-12-02 07:34:01', 'Roron Adit', '', '', 'Pelayanan di sini sangat bagus. Excelent service. Pokoknya ga mengecewakan datang kr desa ini. Dan ternyata juga menyediakn wisata edukasi, agro wisata, wisataseni budaya\r\n\r\n', '', 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide`
--

CREATE TABLE `slide` (
  `idslide` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `tagline` char(36) NOT NULL,
  `caption` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slide`
--

INSERT INTO `slide` (`idslide`, `thumbnail`, `tagline`, `caption`) VALUES
(1, 'look-from-high-trees-beautiful-landscape-green-trees.jpg', 'tagline baru di slider', 'caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider '),
(2, 'street-thailand-nature.jpg', 'tagline lain di slider', 'caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider caption slider ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `thumbnail`
--

CREATE TABLE `thumbnail` (
  `idthumb` int(11) NOT NULL,
  `thumbnail` text NOT NULL,
  `idpost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `thumbnail`
--

INSERT INTO `thumbnail` (`idthumb`, `thumbnail`, `idpost`) VALUES
(1, 'big-entrance-gate-bali-indonesia.jpg', 1),
(2, 'besakih-temple-bali-indonesia.jpg', 1),
(3, 'pura-taman-ayun-temple-bali-indonesia.jpg', 1),
(4, 'look-from-high-trees-beautiful-landscape-green-trees.jpg', 1),
(5, 'near-cultural-village-ubud-is-area-known-as-tegallalang-that-boasts-most-dramatic-terraced-rice-fields-all-bali.jpg', 1),
(6, 'nusa-penida-island.jpg', 2),
(7, 'nusa-penida-things-to-do.jpg', 2),
(8, 'Web capture_25-10-2023_94927.jpeg', 2),
(21, '1698396492_80ac202da3c00f017bf3.jpg', 4),
(22, '1698396492_db25ec5c99215d3d8fcb.jpeg', 4),
(23, '1698396492_384e30c4be3db466c4f7.jpeg', 4),
(24, '1698396492_6853f8137bf8837fe6aa.jpeg', 4),
(25, '1698396492_0c371f25847dd0365584.jpg', 4),
(26, '1698396856_34e1aa81de33000aca19.jpg', 5),
(27, '1698396856_d426129da302b5828838.jpg', 5),
(28, '1698396856_bd32ac6ec8ebdc834e09.jpg', 5),
(29, '1698396856_fdc207e52b98bdfc5968.jpg', 5),
(30, '1698396856_293545306f4ccdeec21f.jpeg', 5),
(31, '1698397431_6284324fc057d706c051.jpg', 6),
(32, '1698397431_421fd8ff981276709f90.jpg', 6),
(33, '1698397431_d94fd8474da06b99418c.jpg', 6),
(34, '1698397431_75151cf5c8530aee0ed2.jpg', 6),
(35, '1698397431_7cc5dd1ba6dd9b23f124.jpg', 6),
(36, '1698397431_87a3edebaffb72f605f4.jpg', 6),
(37, '1698398035_567c48e2db1a89c16b62.jpg', 7),
(38, '1698398035_cbf7c4ac4170464a2081.jpeg', 7),
(39, '1698398035_4d50c92332cf53f3dc50.webp', 7),
(40, '1698398035_c394130698d70be0e8a8.jpeg', 7),
(41, '1698398035_fd313a6bd285bb7e38d7.jpg', 7),
(42, '1698398792_2e2ade70afd9a26d636e.jpg', 10),
(43, '1698398792_a8e1d64aa27f33f22147.jpeg', 10),
(44, '1698398792_1253886421a0de506ea3.jpg', 10),
(45, '1698399729_449ad754a71857bb3988.jpg', 11),
(46, '1698399729_b9954473016e107154e0.jpeg', 11),
(47, '1698399729_a7d25f0866dacf61a7af.jpg', 11),
(48, '1698400975_2afa2489dbbb1c8123f8.jpg', 12),
(49, '1698400975_a52d3880d507fa676036.jpg', 12),
(50, '1698400975_d154552e1b04419900b2.jpeg', 12),
(51, '1698400975_1cd1733b087587cf68da.jpg', 12),
(52, '1698401240_3a79204074116b4681c2.jpg', 13),
(53, '1698401240_a69bef597f9ddaa6a95d.jpg', 13),
(54, '1698401240_9573c6d9cb18b8f41d66.jpg', 13),
(55, '1698404089_ead867ef81cdd5b6faca.jpg', 14),
(56, '1698404089_dc22899d01ab7c3d3472.jpeg', 14),
(57, '1698404089_df277be305a252ca248e.jpeg', 14),
(59, '1698418209_53265d909cf190c29d32.mp4', 19);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `idtiket` char(9) NOT NULL,
  `waktu` datetime NOT NULL,
  `an` varchar(63) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` char(14) NOT NULL,
  `kuota` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `uraian` text NOT NULL,
  `status` enum('','0','1','2') NOT NULL,
  `idpaket` int(11) NOT NULL,
  `idpengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`idtiket`, `waktu`, `an`, `alamat`, `telepon`, `kuota`, `harga`, `total`, `uraian`, `status`, `idpaket`, `idpengguna`) VALUES
('666051860', '2023-12-09 13:00:00', 'Rifqi', 'Gg. K.H. Wahid Hasyim (Kopo) No. 712, Tanjung Pinang 20372, SumBar', '078436044579', 18, 100000, 1800000, '-', '', 2, 14);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idagenda`);

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`idbayar`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idfaq`);

--
-- Indeks untuk tabel `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`idharga`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`idpaket`);

--
-- Indeks untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  ADD PRIMARY KEY (`idpengelola`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`idrekening`);

--
-- Indeks untuk tabel `respon`
--
ALTER TABLE `respon`
  ADD PRIMARY KEY (`idrespon`);

--
-- Indeks untuk tabel `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idslide`);

--
-- Indeks untuk tabel `thumbnail`
--
ALTER TABLE `thumbnail`
  ADD PRIMARY KEY (`idthumb`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`idtiket`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(11) NOT NULL AUTO_INCREMENT COMMENT '\r\n', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `idfaq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `harga`
--
ALTER TABLE `harga`
  MODIFY `idharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `idpaket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengelola`
--
ALTER TABLE `pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `idrekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `respon`
--
ALTER TABLE `respon`
  MODIFY `idrespon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `slide`
--
ALTER TABLE `slide`
  MODIFY `idslide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `thumbnail`
--
ALTER TABLE `thumbnail`
  MODIFY `idthumb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
