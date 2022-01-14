-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2022 pada 16.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lkmmtm22`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `hari` date NOT NULL,
  `regis` int(11) NOT NULL,
  `jam` time NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`hari`, `regis`, `jam`, `status`) VALUES
('2022-01-17', 1, '23:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_mahasiswa`
--

CREATE TABLE `absensi_mahasiswa` (
  `id` int(11) NOT NULL,
  `nrp` varchar(9) NOT NULL,
  `hari` date NOT NULL,
  `regis` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_mahasiswa`
--

INSERT INTO `absensi_mahasiswa` (`id`, `nrp`, `hari`, `regis`, `waktu`, `status`) VALUES
(1, 'C14190118', '2022-01-14', 0, '2022-01-14 11:44:51', 0),
(2, 'C14190118', '2022-01-14', 1, '2022-01-14 11:45:09', 0),
(3, 'C14190118', '2022-01-15', 1, '2022-01-14 11:45:39', 0),
(4, 'C14190118', '2022-01-15', 0, '2022-01-14 11:45:52', 0),
(5, 'C14190118', '2022-01-16', 1, '2022-01-14 12:15:37', 0),
(6, 'C14190118', '2022-01-13', 0, '2022-01-14 12:16:56', 1),
(7, 'C14190118', '2022-01-17', 1, '2022-01-14 14:58:41', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_openrec`
--

CREATE TABLE `jadwal_openrec` (
  `id` int(11) NOT NULL,
  `nrp_panit` varchar(15) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jadwal` varchar(50) NOT NULL,
  `divisi` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `nrp_openrec` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_openrec`
--

INSERT INTO `jadwal_openrec` (`id`, `nrp_panit`, `hari`, `jadwal`, `divisi`, `status`, `nrp_openrec`) VALUES
(1, 'c14190118', 'Jumat 17 Desember 2021', '09.30-10.00', 'IT', 1, 'c14190145'),
(2, 'C14190140', 'Jumat 17 Desember 2021', '10.00-10.30', 'IT', 1, 'C14190118'),
(4, 'C14190118', 'Friday 17 December 2021', '10.30-11.00', 'IT', 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `divisi` varchar(15) NOT NULL,
  `time` datetime NOT NULL,
  `judul` text NOT NULL,
  `desc` text NOT NULL,
  `file` text DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `divisi`, `time`, `judul`, `desc`, `file`) VALUES
(1, 'IT', '2021-12-31 19:51:14', 'Test', 'test', '-'),
(2, 'IT', '2022-01-02 19:58:21', 'Pengumuman Website', 'Website masih dalam perbaikan, harap menunggu', '-'),
(3, 'IT', '2022-01-12 11:59:19', 'Hai hai', 'halo', '-'),
(4, 'IT', '2022-01-14 18:00:36', 'IT', 'test lagi', '-'),
(5, 'IT', '2022-01-14 18:23:34', 'Coba file', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis eros ligula, faucibus a sem nec, pretium blandit turpis. Donec ac enim a massa bibendum dapibus. Etiam eget aliquet massa. Curabitur accumsan non libero eget accumsan. Quisque elementum nisl a mauris pellentesque, semper elementum sem condimentum. Etiam et vestibulum lectus. Aliquam erat volutpat. Ut eget accumsan justo. Mauris fermentum justo ac nisi consequat bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec sed dui ac ipsum lobortis lacinia. Duis sit amet ullamcorper dolor, in volutpat neque. Etiam est justo, imperdiet a condimentum sagittis, malesuada in eros. Phasellus mauris erat, ultricies quis interdum ac, sollicitudin at est. Fusce ultrices ullamcorper convallis.  Praesent odio quam, bibendum et ultrices ut, viverra ac nunc. Fusce at dictum risus. Mauris vehicula nunc non tortor dapibus, eu fringilla massa rhoncus. Nulla mollis neque quis turpis pretium, sit amet mattis odio pharetra. Sed in erat justo. Ut lobortis lacus sed rhoncus mattis. In hac habitasse platea dictumst. Sed suscipit, tortor eu mollis tincidunt, mi mauris elementum ipsum, non tempor magna ante sit amet orci. Pellentesque efficitur pellentesque sagittis. Integer blandit, orci non feugiat rhoncus, neque nulla finibus ipsum, sit amet bibendum enim tortor sit amet nulla. Proin lacinia hendrerit elit, eu efficitur enim lacinia ut. Quisque sit amet facilisis erat. Quisque bibendum sed ipsum eu sollicitudin.  Nullam risus lectus, vehicula et ultricies ac, condimentum ac neque. Vivamus sodales sit amet erat sed viverra. Mauris vitae nunc in velit suscipit vestibulum. Morbi dignissim elementum felis a vestibulum. In pharetra aliquet velit, in feugiat arcu tristique sit amet. Donec tristique, augue imperdiet finibus volutpat, nunc mi fermentum velit, nec lobortis neque ex a dui. Aenean porttitor et lectus ut vehicula.  Donec sit amet porta nisi. Vestibulum lacinia nulla eget mattis accumsan. Sed vitae sollicitudin nisi, eget consequat nulla. Phasellus tincidunt, dolor vel lacinia vestibulum, erat ex varius felis, quis luctus odio tellus non velit. Sed cursus sollicitudin orci, quis ultricies urna semper a. Praesent at aliquam justo. Ut convallis risus in ultricies facilisis. Nullam eleifend ante lorem, vitae suscipit libero dignissim sed. In molestie, nibh vel tincidunt porta, erat velit varius elit, et pellentesque erat metus eget risus. Duis congue porta est, eu pulvinar enim tempor tristique. Suspendisse non tortor egestas sapien egestas mattis. Vestibulum dictum gravida sem, quis egestas tellus ornare vitae. Vestibulum laoreet vulputate libero, sed eleifend leo.  Curabitur ut nisi sed lectus sollicitudin vehicula tempus vel nulla. Quisque ut nulla vitae purus euismod hendrerit et molestie metus. Fusce commodo odio vitae mi auctor, sed vulputate ipsum aliquam. Aenean fermentum consectetur diam in convallis. Nunc hendrerit orci nec nunc convallis cursus. Sed aliquet tellus eu nunc tempor, a efficitur nisl cursus. Maecenas non porta magna. Fusce purus justo, tincidunt et nibh quis, auctor varius ex. Curabitur efficitur finibus dolor sed euismod. Aenean magna lacus, accumsan sit amet odio nec, mollis consequat dui. Donec blandit augue sed neque sagittis, eu vestibulum mi consequat. Curabitur et mi non orci ullamcorper vestibulum.', 'files/_IT_1642159414.pdf'),
(6, 'IT', '2022-01-14 22:02:39', 'Uji Coba Web', 'Sedang uji coba', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `openrec`
--

CREATE TABLE `openrec` (
  `id` int(11) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `openrec`
--

INSERT INTO `openrec` (`id`, `nrp`, `status`) VALUES
(1, 'C14190118', 4),
(2, 'C14190145', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panitia`
--

CREATE TABLE `panitia` (
  `id` int(11) NOT NULL,
  `nrp` varchar(10) NOT NULL,
  `nama` text NOT NULL,
  `divisi` varchar(15) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `meet` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `panitia`
--

INSERT INTO `panitia` (`id`, `nrp`, `nama`, `divisi`, `alias`, `meet`, `status`) VALUES
(1, 'F11190064', 'Vincentius Ricky Cahyadi', 'BPH', 'Skywalker', 'https://meet.google.com/umo-otwg-wya', 5),
(2, 'D11190012', 'Livia Frangeline ', 'BPH', 'Beethoven', 'https://meet.google.com/dwj-mzsx-ntq', 5),
(3, 'B12190030', 'Kezia Clarisa', 'BPH', 'Tukang Tidur', 'https://meet.google.com/ovq-pogn-nqx', 5),
(4, 'B11190150', 'Giftania Jilim ', 'ACARA', 'hadiah', 'https://meet.google.com/doh-xggq-pvx', 3),
(5, 'F11200038', 'Jennifer Catherin', 'ACARA', 'Member BP', 'https://meet.google.com/roo-znso-fad', 5),
(6, 'D11200072', 'Mayo Jonathan Wijaya ', 'ACARA', 'Paguyuban Kumbo', 'meet.google.com/urp-cdvb-dfb', 5),
(7, 'F11200073', 'Rachel Ade Kalla', 'ACARA', 'YUHU', 'meet.google.com/zgn-mmqt-cja', 4),
(8, 'B11200041', 'Vincentius Stefano Suwargono', 'ACARA', 'Jamal', 'https://meet.google.com/tcd-prqk-vez', 5),
(9, 'F11200047', ' Devon Irawan ', 'PDD', 'Marvel', 'https://meet.google.com/pjn-ycte-dxt', 3),
(10, 'F11200011', 'Ajeng Lintang Saraswati', 'PDD', 'Hindia', 'meet.google.com/yfm-ijta-dcj', 5),
(11, 'B12200109', 'Seno Bayu', 'PDD', 'Hogwarts', 'meet.google.com/btd-vsdv-ibp', 2),
(12, 'E12200048', 'Stephanie Melinda', 'PDD', 'pepemaru', 'meet.google.com/pxu-hmsv-seb', 5),
(13, 'D11200147', 'Morena Nicholas', 'PDD', 'mbo', 'https://meet.google.com/vox-bhyf-xdq', 2),
(14, 'E12200061', 'Angeline Emmanuelkoku', 'PDD', 'GodOfBucin', 'https://meet.google.com/dsw-ofeo-chw', 0),
(15, 'D11190127', 'Victorya Jap', 'SEKRET', 'Secret', 'https://meet.google.com/cbr-wics-eaj', 5),
(16, 'D11190005', 'Zefanya Patricia Budianto ', 'SEKRET', 'Angel', 'https://meet.google.com/iit-hehe-wqz', 5),
(17, 'D11190072', 'Felicia Natakusuma ', 'SEKRET', 'Apple', 'https://meet.google.com/civ-goxg-gwo', 5),
(18, 'D11190044', 'Gabriella Lawrence', 'SEKRET', 'Bonbon', 'https://meet.google.com/nkn-busp-tfj', 5),
(19, 'D11190202', 'Marco Ongko', 'SEKRET', 'Kelapa', 'https://meet.google.com/ewp-ojxg-kxb', 5),
(20, 'D11190143', 'Kenny Tanuwijaya', 'SEKRET', 'Keupee', 'https://meet.google.com/uyx-zeag-jai', 1),
(21, 'F11190065', 'Justin Julian Hidayat', 'PERKAPMAN', 'TelurGulung', 'https://meet.google.com/qkv-offm-ypm', 5),
(22, 'F11190053', 'Patricia Bella ', 'PERKAPMAN', 'NyawLuv', 'https://meet.google.com/xpd-gjag-pad', 4),
(23, 'F11200071', 'Rachel Oktavia Sugito', 'PERKAPMAN', 'ONLY', 'meet.google.com/ixm-yuro-qay', 5),
(24, 'E12200042', 'Inne Veronica ', 'PERKAPMAN', 'NINE', 'meet.google.com/tcj-ykpu-frb', 5),
(25, 'F11190092', 'Fabianus Valentino Setiawan', 'PERKAPMAN', 'NICETRY', 'https://meet.google.com/gwj-cfpk-yug', 5),
(26, 'F11190050', 'Eduardus Victor Siswanto', 'PERKAPMAN', 'Nita', 'https://meet.google.com/dew-rszg-yyt', 5),
(27, 'D11190186', 'Mikhael', 'MATERI', 'KungPaoBuXing', 'https://meet.google.com/pec-wnxz-jsa', 6),
(28, 'B12190044', 'Leonardo Matthew Suwatma', 'MATERI', 'Sioke', 'https://meet.google.com/cvi-oisn-bwe', 5),
(29, 'B11190183', 'Evelyn Gunawan', 'MATERI', 'Sersi', 'https://meet.google.com/typ-wwtb-hjb', 5),
(30, 'D11190221', 'Gabriela Sharen Gunawan Sunjono', 'MATERI', 'Sunshine', 'https://meet.google.com/duo-xcqn-kqb', 4),
(31, 'D11190376', 'Kezia Daniella Prasetyo', 'MATERI', 'Nutcracker', 'https://meet.google.com/cre-oryr-mnb', 5),
(32, 'C14200038', 'Angeline Nyowanda', 'MATERI', 'lucifer', 'https://meet.google.com/anh-vasj-gho', 5),
(33, 'B11190056', 'Aaron Adiputra ', 'MATERI', 'fool', 'https://meet.google.com/vqp-aaua-tbh', 3),
(34, 'C14190106', 'Andrean Dewanta Bisma', 'MATERI', 'Siobak', 'https://meet.google.com/uas-zueh-uyf', 6),
(35, 'D11190484', 'Zaneta Rachel Winata', 'MATERI', 'Olaf', 'https://meet.google.com/vmk-uvka-ean', 4),
(36, 'B11190054', 'Johan Eric', 'MATERI', 'copong', 'meet.google.com/gku-vwhs-pqk', 2),
(37, 'B12190117', 'Evelyn Tania', 'MATERI', 'elf', 'https://meet.google.com/ivr-bgue-gtk', 4),
(38, 'C14190140', 'Michael Francesco', 'IT', 'Mina Twice', 'https://meet.google.com/pnz-jqnr-jqy', 6),
(39, 'C14190118', 'Francisco Allenxeon', 'IT', 'orang dalam', 'https://meet.google.com/kcm-focg-hpi', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(42) DEFAULT NULL,
  `nrp` varchar(10) DEFAULT NULL,
  `jurusan` varchar(33) DEFAULT NULL,
  `lk_asal` varchar(11) DEFAULT NULL,
  `lk_tujuan` varchar(23) DEFAULT NULL,
  `id_line` varchar(25) DEFAULT NULL,
  `domisili` varchar(59) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `nrp`, `jurusan`, `lk_asal`, `lk_tujuan`, `id_line`, `domisili`, `status`) VALUES
(1, 'Agatha Aileen', 'D11200007', 'Manajemen Perhotelan', 'PELMA', 'PELMA', 'agathaileen', 'Surabaya', 1),
(2, 'Agnes Bonita Setiawan', 'A11200017', 'EB & ECI', 'BEM', 'BEM', 'agnesbonita06', '', 0),
(3, 'Agnes Elvania Fortunata', 'D11200048', 'Manajemen Perhotelan', 'PERSMA', 'PERSMA', 'agneselvania', '', 1),
(4, 'Agnes Monika', 'D11200183', 'Manajemen Bisnis', 'BEM', 'BEM', 'agnesmons', 'Surabaya', 1),
(5, 'Alexander', 'B11200097', 'Teknik Sipil', 'HIMASITRA', 'BPMF', 'alex_liang0411', 'Tarakan', 1),
(6, 'Alexander Anderson Meidianto', 'B12200002', 'Arsitektur', 'HIMAARTA', 'HIMA', '70202663', 'Surabaya', 0),
(7, 'Alexander Owen', 'D11200140', 'Manajemen Bisnis', 'NON LK', 'BEM', 'alexander.owen', 'Surabaya', 1),
(8, 'Alvano Michael Haryanto', 'B11200013', 'Teknik Sipil', 'BEM', 'BEM', 'black.d.heart', 'Mojokerto', 0),
(9, 'Alvin Adhitya Arta Raharja', 'C14200033', 'Teknik Informatika, SIB & DSA', 'NON LK', 'HIMA', 'alvinarta', 'Bojonegoro', 0),
(10, 'Amelia Syatriadi', 'C14200197', 'Teknik Informatika, SIB & DSA', 'PERSMA', 'PERSMA', 'amelia_syatriadi', 'Surabaya', 0),
(11, 'Amyra Maia Widjaja', 'D12200017', 'International Business Accounting', 'HIMASINTRA', 'HIMA', 'amyramaia', 'Surabaya', 0),
(12, 'Ancilla Mathilda', 'D11200353', 'International Business Management', 'PERSMA', 'MPM', '5pandawa_fans', 'Surabaya', 0),
(13, 'Angelica Agatha', 'C14200127', 'Teknik Informatika, SIB & DSA', 'BEM', 'HIMA', 'angelicaca_', 'Sidoarjo', 1),
(14, 'Angelina Grittle', 'E11200005', 'Desain Interior & DFT', 'HIMAINTRA', 'HIMA', 'a.grittle.j', 'Surabaya', 0),
(15, 'Angelina nathania wijaya ', 'D11200021', 'Manajemen Pariwisata', 'NON LK', 'BPMF', 'angelina_natania', 'Surabaya', 0),
(16, 'Angellica Beillinda Goenawan', 'D12200031', 'Akuntansi Pajak', 'BEM', 'BEM', 'angellicabeillinda', 'Surabaya', 1),
(17, 'Angellina Lutwal', 'D12200139', 'Akuntansi Pajak', 'TPS', 'TPS', 'ngel21', 'Makassar', 1),
(18, 'Annabel Catherine Santoso', 'E12200208', 'Desain Komunikasi Visual & IPDM', 'BEM', 'BEM', 'Annacat87', 'Surabaya', 1),
(19, 'Annasthasia Shinta Chastity', 'D11200356', 'International Business Management', 'HIMABINTRA', 'HIMA', 'shintachas', 'Pandaan, pasuruan', 1),
(20, 'Anthony Hendrata', 'C11200007', 'Teknik Elektro & IoT', 'HIMATEKTRA', 'HIMA', '4nth0nyh3ndr4t4', '', 1),
(21, 'Ariella Thania Rijaya', 'C14200158', 'Teknik Informatika, SIB & DSA', 'TPS', 'TPS', 'thaniarijaya', 'Semarang', 1),
(22, 'Aurelia Celine', 'D12200098', 'Akuntansi Pajak', 'HIMAJAKTRA', 'BPMF', 'aureliaceline', 'Surabaya', 1),
(23, 'Aurell Febtia Sheevanya', 'D12200107', 'Akuntansi Bisnis', 'HIMATANTRA', 'BPMF', 'aurellfebtia', 'Malang', 1),
(24, 'Azarya Kairossutan Sacri Pusaka Dami', 'C14200090', 'Teknik Informatika, SIB & DSA', 'BEM', 'BEM', 'azarya_dami', 'Rote', 0),
(25, 'Beatrice Septhia Gunawan', 'D11200378', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'HIMA', 'phintek20', '', 1),
(26, 'Belinda Briliana Tjoa', 'D12200053', 'Akuntansi Pajak', 'BEM', 'BEM', 'bbriliana', 'Surabaya', 1),
(27, 'Benny Leonardo', 'D12200074', 'Akuntansi Pajak', 'HIMAJAKTRA', 'HIMA', 'benny_leonardo ', '', 1),
(28, 'Billy Cuan Alexsander', 'C14200178', 'Teknik Informatika, SIB & DSA', 'BEM', '#NAME?', 'billy_cuan', 'Surabaya', 1),
(29, 'Carina Felicia Salim', 'C13200056', 'Teknik Industri & IBE', 'BEM', 'BPMF', 'carinsalim', 'Sidoarjo', 0),
(30, 'Celline CMP', 'F11200019', 'Ilmu Komunikasi', 'BPMF 1', 'BPMF', 'celline_cmpitusaya', 'Sidoarjo', 1),
(31, 'Christa Dominic Fisca', 'E12200148', 'Desain Interior & DFT', 'HIMAVISTRA', 'HIMA', 'cchristallyv', 'Balikpapan', 0),
(32, 'Christensen Derick Kho', 'C11200001', 'Teknik Elektro & IoT', 'PERSMA', 'PERSMA', 'derickkho08', 'Surabaya', 1),
(33, 'Clarisa Christiani', 'C14200040', 'Teknik Informatika, SIB & DSA', 'BEM', 'BEM', 'clarisa511', 'Surabaya', 0),
(34, 'Clarissa Angelia', 'C14200047', 'Teknik Informatika, SIB & DSA', 'PERSMA', 'PERSMA', 'clarissaangelia', 'Banjarmasin ', 1),
(35, 'Clarissa Athalia', 'D12200127', 'Akuntansi Pajak', 'HIMAJAKTRA', 'HIMA', 'clarissaa93', 'Jember', 0),
(36, 'Clarissa Maullidya Thenardi', 'D12200186', 'Akuntansi Pajak', 'TPS', 'TPS', 'clarissamaullidyat', 'Makassar', 1),
(37, 'Cory Livira', 'C14200145', 'Teknik Informatika, SIB & DSA', 'NON LK', 'HIMA', 'crlvraa', 'Ngabang, Kalimantan Barat', 1),
(38, 'Daniel Abraham Tedja', 'E11200078', 'Desain Interior & DFT', 'PERSMA', 'PERSMA', 'daniel_tedja', 'Denpasar', 1),
(39, 'Dave Christian Hendrawan', 'B12200003', 'Arsitektur', 'BEM', 'BEM', 'dave_hendrawan', 'Surabaya', 0),
(40, 'Deandra Sharita', 'C13200013', 'Teknik Industri & IBE', 'BEM', 'HIMA', 'deandrasharita', 'Gresik', 0),
(41, 'Denish Vaphilio', 'B11200114', 'Teknik Sipil', 'NON LK', 'BPMF', 'denish_v', 'Manado', 1),
(42, 'Devi Cristina Pandowo', 'E12200089', 'Desain Komunikasi Visual & IPDM', 'BEM', 'BPMF', 'devi_cristina20', 'Surabaya', 1),
(43, 'Ebiet Christianto Aiostheos Baik', 'D11200003', 'Manajemen Bisnis', 'NON LK', 'BEM', 'ebiet.c11', '', 1),
(44, 'Emanuela Sabatini Sitorus', 'F11200065', 'Ilmu Komunikasi', 'BEM', 'BEM', 'emanuela7735', 'Surabaya', 0),
(45, 'Esther Leviana', 'B12200072', 'Arsitektur', 'HIMAARTA', 'HIMA', 'estherleviana8', 'Malang', 1),
(46, 'Ezra Kenzie Wijaya', 'B11200108', 'Teknik Sipil', 'NON LK', '#NAME?', 'kenziewijaya', 'Semarang', 1),
(47, 'Fedorike Yaphilia', 'F1120025', 'Ilmu Komunikasi', 'NON LK', 'BEM', 'fedorike', 'Surabaya', 0),
(48, 'Felice Sukintjo', 'D12200009', 'Akuntansi Pajak', 'BEM', 'BEM', 'meiiily', 'Surabaya', 1),
(49, 'Felicia Deshinta Santoso', 'D11200222', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'BPMF', 'felydeshinta', 'Surabaya', 1),
(50, 'Felix Lim', 'D11200295', 'Manajemen Bisnis', 'HIMAMATRA', 'BPMF', 'felix5320', 'Tarakan', 1),
(51, 'Fellen Wennesa', 'C14200172', 'Teknik Informatika, SIB & DSA', 'NON LK', 'BPMF', 'fellenween', '', 1),
(52, 'Ferdinand', 'D11200103', 'Manajemen Keuangan', 'HIMAKETRA', 'HIMA', 'ferdinand454', 'Surabaya', 1),
(53, 'Ferry Chayadi', 'D11200494', 'Manajemen Bisnis', 'HIMAMATRA', 'BEM', 'ferrychw', 'Kediri', 0),
(54, 'Fitriani Marchellita Halim', 'A11200068', 'EB & ECI', 'HIMASAINTRA', 'HIMA', 'fitri_chellita', 'Surabaya', 1),
(55, 'Fransisca Liem', 'A11200046', 'EB & ECI', 'TPS', 'TPS', 'fransiscaliem_', 'Surabaya', 0),
(56, 'Gabriella Deandra', 'D12200179', 'International Business Accounting', 'HIMASINTRA', '#NAME?', 'gabz.eman', 'Surabaya', 0),
(57, 'Gabriella Theodora', 'D11200302', 'International Business Management', 'HIMABINTRA', 'HIMA', 'gabytheo', 'Surabaya', 1),
(58, 'Goldy Pongkaraeng Pasulu', 'C14200199', 'Teknik Informatika, SIB & DSA', 'HIMAINFRA', 'MPM', 'goldypasulu', 'Sidoarjo', 1),
(59, 'Grace Maria Etter', 'F11200045', 'Ilmu Komunikasi', 'BEM', 'BEM', 'gracemaria_02', 'Lumajang', 0),
(60, 'Grace Natasha', 'C14200021', 'Teknik Informatika, SIB & DSA', 'BEM', 'BEM', 'gracenatasha16', 'Surabaya', 1),
(61, 'Gracia Giovanny', 'D12190079', 'Akuntansi Pajak', 'BEM', 'BEM', 'vanny_02', 'Surabaya - Pontianak (saat lkmmtm kemungkinan di pontianak)', 0),
(62, 'Graciela Fiona', 'F11200031', 'Ilmu Komunikasi', 'BEM', 'BEM', 'xxfio', 'Surabaya', 1),
(63, 'Graviela Guinivere', 'D11200335', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'BPMF', 'gravi__g', 'Tarakan', 1),
(64, 'Gregorius Stevio Kwenardi', 'D11200363', 'Manajemen Bisnis', 'BEM', 'BEM', 'steviokwe', '', 0),
(65, 'Helena Genoveva', 'F11200062', 'Ilmu Komunikasi', 'HIMAKOMTRA', 'MPM', 'helenagenovevak', 'Surabaya', 1),
(66, 'Ivana Florensia', 'E11200033', 'Desain Interior & DFT', 'HIMAINTRA', 'HIMA', 'Ivanaf67', 'Surabaya', 0),
(67, 'Ivana Gloria Anindita', 'G11200005', 'Pendidikan Guru SD & UD', 'HIMAGUDATRA', 'HIMA', '@ivanaglori', 'Surabaya', 1),
(68, 'Ivana Tejokusumo', 'D11200277', 'International Business Management', 'BEM', 'BEM', 'ivana121101', 'Surabaya', 0),
(69, 'Jefry Gunawan', 'C14200024', 'Teknik Informatika, SIB & DSA', 'BEM', 'BEM', 'qwertyjefry', 'Surabaya', 1),
(70, 'Jennifer Annebeal', 'F11200026', 'Ilmu Komunikasi', 'BEM', 'BEM', 'jennyannebeal', 'Surabaya', 1),
(71, 'Jeremy Marcelino Wihardjo', 'C11200011', 'Teknik Elektro & IoT', 'HIMATEKTRA', 'HIMA', 'jeremy11111', '', 0),
(72, 'Jessica Giovanni Matoke', 'D11200284', 'Manajemen Keuangan', 'BEM', 'BEM', 'jessicagiovanni90', 'Surabaya', 0),
(73, 'Jessie Laksmono Lie', 'D12200157', 'International Business Accounting', 'HIMASINTRA', 'BPMF', 'jessiesinger', 'Surabaya', 0),
(74, 'Johanna Natania Puspita Yahya', 'G11200001', 'Pendidikan Guru SD & UD', 'HIMAGUDATRA', 'HIMA', 'nataniajohana', 'Surabaya', 0),
(75, 'Jonathan Adiksuma', 'C12200004', 'Teknik Mesin & Otomotif', 'HIMAMESRA', 'BPMF', 'dak1246', '', 1),
(76, 'Jonathan Alvin Ringoman', 'D12200128', 'Akuntansi Pajak', 'BEM', 'HIMA', 'jalvin46', 'Sampit', 0),
(77, 'Jonathan Erton Sugiharto ', 'D11200247 ', 'Manajemen Bisnis', 'HIMAMATRA', 'HIMA', 'jonathan_erton', 'Surabaya ', 0),
(78, 'Jonathan Sebastian', 'D11200163', 'Manajemen Keuangan', 'HIMAKETRA', 'HIMA', 'jeestesss', 'Surabaya', 1),
(79, 'Jordan hartono', 'D12200061', 'Akuntansi Bisnis', 'BEM', 'BEM', 'jordanhartono23', 'Surabaya', 1),
(80, 'Josephine Stephani Widya', 'D12200111', 'International Business Accounting', 'HIMASINTRA', '#NAME?', 'josh1310', 'Surabaya', 0),
(81, 'Joshua Felix', 'D12200041', 'Akuntansi Pajak', 'HIMAJAKTRA', 'BPMF', 'joshuafjf', 'Surabaya', 1),
(82, 'Juan Felix Hermawan', 'C11200010', 'Teknik Elektro & IoT', 'TPS', 'TPS', 'hermanjflx', 'Sidoarjo', 0),
(83, 'Kartika', 'D11200032', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'HIMA', 'kartikaaa_12', 'Surabaya', 1),
(84, 'Kayla Vanessa Immanuel', 'F11200044', 'Ilmu Komunikasi', 'HIMAKOMTRA', 'MPM', '@immanuelkayla', 'Banyuwangi', 0),
(85, 'Kelvin Wilson Utomo', 'C11200039', 'Teknik Elektro & IoT', 'PERSMA', 'PERSMA', 'grekel', 'Surabaya', 1),
(86, 'Kezia Elim Tali', 'C14200173', 'Teknik Informatika, SIB & DSA', 'HIMAINFRA', 'HIMA', 'Kezia0410', '', 1),
(87, 'Kezia Jessica', 'D11200252', 'Manajemen Bisnis', 'HIMAMATRA', 'HIMA', 'keziajessicaaa', 'Denpasar', 1),
(88, 'Kezia Maureen', 'F11200033', 'Ilmu Komunikasi', 'BEM', 'BEM', 'kezia.mrn', 'Surabaya', 0),
(89, 'Kiara Fransisca M.D.Ximenes', 'E11200024', 'Desain Interior & DFT', 'HIMAINTRA', 'BEM', 'kiara3224', 'Dili, Timor leste ', 0),
(90, 'Lavenia Felita Jaya', 'E11200035', 'Desain Interior & DFT', 'HIMAINTRA', 'HIMA', 'awxfelll', 'Surabaya', 0),
(91, 'Leoni angela', 'D12200072', 'Akuntansi Pajak', 'BEM', 'BEM', 'Leony.angelaa', 'Sampit, Kalimantan Tengah', 0),
(92, 'Louisa Elizabeth Shenelo', 'B12200055', 'Arsitektur', 'HIMAARTA', 'HIMA', 'lisa0-0', 'Surabaya', 0),
(93, 'Mandy edgina', 'A12200023', 'Bahasa Mandarin', 'HIMABAMATRA', 'BPMF', 'mandyedgina', 'Surabaya', 0),
(94, 'Marcella Anastasya Khancitra', 'C13200011', 'Teknik Industri & IBE', 'HIMATITRA', 'BPMF', 'marcellanastasya07', 'Surabaya', 0),
(95, 'Melanie', 'D11200221', 'Manajemen Pemasaran', 'HIMAPASTRA', 'HIMA', 'melanyharson', 'Surabaya', 1),
(96, 'Melinda Tjendra', 'D12200019', 'Akuntansi Bisnis', 'HIMATANTRA', 'BPMF', 'melindatjendra', 'Surabaya', 0),
(97, 'Michelle Edrea', 'D11200144', 'International Business Management', 'HIMABINTRA', 'HIMA', 'war_of_luv_', 'Palu ', 0),
(98, 'Michellyne Angel', 'D12200059', 'Akuntansi Pajak', 'HIMAJAKTRA', 'BPMF', 'michellyne40', '', 1),
(99, 'Miguel Raymond Woo', 'B11200060', 'Teknik Sipil', 'BEM', 'BEM', 'miguelray', 'Surabaya', 1),
(100, 'Mira Charesta Rame', 'G12200004', 'Pendidikan Guru SD & UD', 'PELMA', 'PELMA', 'Miracharesta4522', 'Kupang - NTT', 0),
(101, 'Monica Evelyn', 'C14200026', 'Teknik Informatika, SIB & DSA', 'HIMAINFRA', 'HIMA', 'monica_evelyn_', '', 0),
(102, 'Nathania Marchella Angelina Anggono', 'D12200194', 'International Business Accounting', 'HIMATANTRA', 'BPMF', 'angelinachella', 'Kota Bogor', 1),
(103, 'Nethaniah Emmanuelle ', 'D12200120 ', 'International Business Accounting', 'HIMASINTRA', '#NAME?', 'aiko_sb10', 'Surabaya ', 0),
(104, 'Nicholas Shan Tantama', 'C12200024', 'Teknik Mesin & Otomotif', 'HIMAMESRA', 'BPMF', 'nicholas_tantama21', 'Surabaya', 1),
(105, 'Nickle dhika pratama', 'D11200452', 'Manajemen Bisnis', 'HIMAMATRA', 'BPMF', 'Ndp140103', 'Surabaya', 1),
(106, 'Nicolas Jonathan', 'B11200061', 'Teknik Sipil', 'HIMASITRA', 'BEM', 'nicolas.nj', 'Surabaya', 0),
(107, 'Nicole Jolie Susanto', 'D11200328', 'Manajemen Pemasaran', 'BEM', 'MPM', 'nicolejolie22 ', 'Surabaya', 1),
(108, 'Nikolaus Filbert Setiawan', 'C14200030', 'Teknik Informatika, SIB & DSA', 'BEM', '#NAME?', 'filbertsetiawan_3411', 'Surabaya', 1),
(109, 'Patrick Jordan Wijaya', 'D11200052', 'Manajemen Keuangan', 'PELMA', 'HIMA', 'patrickjw2002', 'Surabaya', 1),
(110, 'Priscilla Christy Rikhana', 'F11200048', 'Ilmu Komunikasi', 'HIMAKOMTRA', 'BPMF', 'priscillachristy', 'Denpasar', 1),
(111, 'Rachel violetta stepanie', 'D11200098', 'Manajemen Pariwisata', 'HIMAPATRA', 'HIMA', 'violetta.s', 'Surabaya', 0),
(112, 'Reynald Hartanto Gunawan', 'D11200413', 'Manajemen Keuangan', 'HIMAKETRA', 'HIMA', 'reynaldhartanto1', 'Surabaya', 0),
(113, 'Rico Stevanus', 'B11200057', 'Teknik Sipil', 'BEM', 'MPM', 'ricostevanus14', 'Surabaya', 0),
(114, 'Robin Davis Fransciscus', 'D11200071', 'Manajemen Pariwisata', 'BEM', 'HIMA', 'robindavisf', '', 0),
(115, 'Rr. Aulia', 'F11200041', 'Ilmu Komunikasi', 'MPM', 'MPM', 'Auliazerlina', 'Surabaya', 1),
(116, 'Sentanu Chandra', 'F11200039', 'Ilmu Komunikasi', 'NON LK', 'HIMA', 'sen_chandra', 'Sidoarjo', 1),
(117, 'Sharen Istianto', 'D11200229', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'HIMA', 'sharentanist', '', 1),
(118, 'Shintia Adiningsih Wigati', 'A11200067', 'EB & ECI', 'NON LK', 'BPMF', 'shintiaadn. (pakai titik)', 'Surabaya', 0),
(119, 'Sisilia', 'F11190077', 'Ilmu Komunikasi', 'TPS', 'TPS', 'Sisiliawijayaa_', 'Surabaya', 1),
(120, 'Stefanny Jasmine ', 'C13200015', 'Teknik Industri & IBE', 'BEM', 'BEM', 'jasminedominick', 'Surabaya', 1),
(121, 'Stefanny Sharon', 'D11200374', 'Manajemen Pariwisata', 'BEM', 'MPM', 'stefsharon', 'Surabaya ', 0),
(122, 'Stella Kristie Yuwono', 'E11200011', 'Desain Interior & DFT', 'BEM', 'BEM', 'stellakristie', 'Surabaya', 1),
(123, 'Stephanie Sudarko', 'D12200104', 'International Business Accounting', 'NON LK', 'BPMF', 'stephanie.sudarko', '', 0),
(124, 'Steryna Ownrysher Nyoto', 'D11200157', 'International Business Management', 'BEM', 'BEM', 'steryna', 'Surabaya', 0),
(125, 'Stevanus Hariyono', 'B11200132', 'Teknik Sipil', 'HIMASITRA', 'HIMA', 'Stevanushariyono', 'Jombang', 0),
(126, 'Steven Gaillard', 'B11200008', 'Teknik Sipil', 'HIMASITRA', 'HIMA', 'stevengaillard_z', 'Surabaya', 1),
(127, 'Steven Petradi', 'F11200006', 'Ilmu Komunikasi', 'HIMAKOMTRA', 'HIMA', 's_91p', 'Surabaya', 1),
(128, 'Thalia Angelica', 'D11200118', 'International Business Management', 'PERSMA', 'PERSMA', 'thaliaangelica14', '', 1),
(129, 'Thessalonica Dwi Setya Angestuti Triantoro', 'F11200081', 'Ilmu Komunikasi', 'BEM', 'BEM', 'besaliel', 'Surabaya', 1),
(130, 'Thomas Lesmono', 'F11190007', 'Ilmu Komunikasi', '', 'TPS', 'thomas_lesmon', 'Surabaya', 0),
(131, 'Tifany Wira Indika', 'B11200130', 'Teknik Sipil', 'HIMASITRA', 'HIMA', 'Tifanywira_', 'Makassar', 0),
(132, 'Tiffany Rachel', 'C14200085', 'Teknik Informatika, SIB & DSA', 'HIMAINFRA', 'HIMA', 'tiffrachel14', '', 1),
(133, 'Triny Aprilia', 'G11200019', 'Pendidikan Guru SD & UD', 'HIMAGUDATRA', 'BPMF', 'trinyaprilia', 'Toraja Utara', 0),
(134, 'Valeri Christy Liadi', 'C14200066', 'Teknik Informatika, SIB & DSA', 'HIMAINFRA', 'BPMF', 'valerichristy07', '', 1),
(135, 'Vanesia Oktarine', 'D11200346', 'Manajemen Bisnis', 'HIMAMATRA', 'BEM', 'vanesia_oktarine', '', 1),
(136, 'Vanessa Celine Tandyono', 'D11200164', 'Manajemen Perhotelan', 'HIMAHOTTRA', 'HIMA', 'vanessacelinet', 'Surabaya', 1),
(137, 'Vanessa Netanya', 'D11200155', 'Manajemen Pariwisata', 'NON LK', 'BEM', 'vanessanetanya', 'Surabaya', 0),
(138, 'Vanessa Patricia', 'D11200209', 'Manajemen Bisnis', 'HIMAMATRA', 'BPMF', 'sasyavp', 'Surabaya', 1),
(139, 'Victoria Amijaya', 'F11200018', 'Ilmu Komunikasi', 'NON LK', 'BPMF', 'toria.c', 'Surabaya', 1),
(140, 'Vivi oktaviani', 'D11200453', 'Manajemen Bisnis', 'NON LK', 'HIMA', 'oktav.01', 'Probolinggo', 0),
(141, 'Wilson Luis', 'D11200086', 'International Business Management', 'HIMABINTRA', 'HIMA', 'wilsonluis8', 'Surabaya', 0),
(142, 'Winnie Wangnardy ', 'D11200068 ', 'Manajemen Bisnis', 'HIMAMATRA', 'BEM', 'Winniewangg ', '', 1),
(143, 'Yegia Joehan Eltan', 'C11200037', 'Teknik Elektro & IoT', 'TPS', 'TPS', 'yegiaje', 'Tulungagung', 1),
(144, 'Yehuda Suryaputra', 'F11200034', 'Ilmu Komunikasi', 'NON LK', 'BEM', 'yehudasuryaputra24', 'Mojokerto', 1),
(145, 'Yenny chandra foekdianto', 'D12200050', 'International Business Accounting', 'HIMASINTRA', 'HIMA', 'yennyyy09', 'Sidoarjo', 0),
(146, 'Yoan Riza Nataya', 'B12200029', 'Arsitektur', 'PERSMA', 'PERSMA', 'yrn728', '', 1),
(147, 'Yutaka Matthew Tandiono', 'C12200042', 'Teknik Mesin & Otomotif', 'HIMAMESRA', 'HIMA', 'yutakamt', '', 1),
(148, 'Zefanya Kyna', 'E12200154', 'Desain Komunikasi Visual & IPDM', 'BEM', 'BEM', 'zkyna05', 'Yogyakarta', 0),
(0, 'dummy', 'C14190118', 'Informatika', 'dummy', 'dummy', 'dummy', 'dummy', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_mahasiswa`
--
ALTER TABLE `absensi_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_openrec`
--
ALTER TABLE `jadwal_openrec`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `openrec`
--
ALTER TABLE `openrec`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panitia`
--
ALTER TABLE `panitia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_mahasiswa`
--
ALTER TABLE `absensi_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal_openrec`
--
ALTER TABLE `jadwal_openrec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `openrec`
--
ALTER TABLE `openrec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `panitia`
--
ALTER TABLE `panitia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
