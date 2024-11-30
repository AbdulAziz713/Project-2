-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2024 pada 08.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_organizer`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_heading` varchar(255) NOT NULL,
  `about_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `about_heading`, `about_text`) VALUES
(1, 'About Us', 'We are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\nWe are a startup that stands to help couples who are ready to carry out their sacred promise to live together and build a family and have been at our best to make a deep impression. To welcome your happy day with your loved ones in starting a new.\r\n\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_date` datetime DEFAULT NULL,
  `blog_heading` varchar(255) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `blog_date`, `blog_heading`, `blog_text`, `blog_image`) VALUES
(1, '2023-03-14 10:43:41', 'Jangan Ragu untuk Menikah, Ini Janji dan Jaminan Rezeki dari Allah SWT', 'Pernikahan dapat dimaknai sebagai ikatan lahir dan batin yang dilaksanakan menurut syariat Islam antara seorang laki-laki dan seorang perempuan, untuk hidup bersama dalam satu rumah tangga guna mendapatkan keturunan.', '202eba4f142351b909ae3f2d96bb1cf4-blog1.jpg'),
(2, '2024-11-12 10:26:52', 'Sudah Pernah Menikah tapi Belum Pernah Digauli, Bagaimana Statusnya dalam Islam?', '<p>Nah, dalam beberapa kasus, ada wanita yang sudah menikah, kemudian cerai namun belum digauli. Atau bisa juga, sudah menikah belum pernah digauli, namun suaminya meninggal asdasdasd</p>', '6c0949d4341e44f9e1dab0447f560424-blog2.jpg'),
(3, '2023-03-14 10:45:03', 'Mengapa Banyak Pria yang Sudah Menikah Menganggap Istri Orang Lain Lebih Menarik?', 'Semua pria cenderung mengagumi dan melihat ke arah istri pria lain tetapi hanya beberapa yang maju dan bertindak atas ketertarikan mereka yang kemudian mengarah pada perselingkuhan dalam pernikahan.', 'a24cdf55e7d7145a08c67d865f010887-blog3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_date` datetime DEFAULT NULL,
  `contact_name` varchar(225) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `contact_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `contact_date`, `contact_name`, `contact_email`, `telepon`, `contact_message`) VALUES
(1, '2024-11-17 17:04:22', 'Abdul Aziz', 'abdul.azis2004.aa@gmail.com', '083821966573', 'Hallo!'),
(2, '2024-11-17 17:10:12', 'Lulu Latifah Nurhafsyah', 'Lulu@gmail.com', '085173004573', 'Bismillah semuanya dilancarkan..'),
(3, '2024-11-17 17:18:58', 'Siti Aisah', 'siti.aisah@gmail.com', '08921866573', 'Bismilah lancar yaa...'),
(4, '2024-11-17 17:20:23', 'Lulu Latifah Nurhafsyah', 'Lulu@gmail.com', '083821966573', 'Semoga ini menjadi yang terakhir'),
(5, '2024-11-17 17:21:58', 'Abdul Aziz', 'abdul.azis2004.aa@gmail.com', '085173004573', 'Yaallah kenapa muncul lagi..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `features_icon` varchar(255) NOT NULL,
  `features_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `features`
--

INSERT INTO `features` (`id`, `features_icon`, `features_name`, `description`) VALUES
(1, 'fa-solid fa-address-book', 'Accommodate Invited Guests', 'Ini adalah fitur terbaik'),
(2, 'fa-solid fa-circle-check', 'Verified Wedding Organizer', 'Hebat'),
(4, 'fa-solid fa-clock', 'Always On Time Every Time', 'Lorem'),
(5, 'fa-solid fa-house', 'Comfortable and Safe Indoor Place', 'Bismillah'),
(6, 'fa-solid fa-camera', 'Broadcast On Multiple Platforms', 'Bisa'),
(7, 'fa-solid fa-shirt', 'Great Souvenirs and Gifts', 'Berubah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_heading` varchar(255) NOT NULL,
  `tgl_pernikahan` text NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `gallery_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_heading`, `tgl_pernikahan`, `gallery_image`, `gallery_text`) VALUES
(1, 'Selvia & Suami', '14 Maret 2023', '95b66256391cf16df1f716067ed5c885-gallery1.jpg', 'Saya sangat senang dan bangga'),
(2, 'Susi & Suami', '10 November 2023', '90b0c15d7053da82f8bf2addb32dbdf8-gallery2.jpg', 'Bersyukur sekali mendapatkan suami TNI AL'),
(5, 'Elisa & Bayu', '11 Desember 2022', '03e65ed528a1063814a1e4453b3238c9-gallery4.jpg', 'Bangku Para Tamu Undangan yang Berbahagia'),
(7, 'Ina & Adi', '15 Agustus 2022', '7f49ff22466565c4831d329febcc1736-gallery6.jpg', 'Tradisi Pernikahan yang Sangat Berkesan'),
(10, 'Yulia & Nugraha', '', 'dc56fe826a246358f8c6772ca414da44-gallery3.jpg', 'Tunangan yang berbahagia..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id_paket` int(11) NOT NULL,
  `packages_heading` varchar(255) NOT NULL,
  `packages_price` varchar(255) NOT NULL,
  `packages_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id_paket`, `packages_heading`, `packages_price`, `packages_list`) VALUES
(1, 'MAWAR PACKAGE', 'Rp.15.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 1</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n</ul>'),
(2, 'MELATI PACKAGE', 'Rp.18.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 2</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n</ul>'),
(3, 'ANGGREK PACKAGE', 'Rp.22.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 1</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Tenda</p>\r\n<ul>\r\n<li>Tenda Pelaminan</li>\r\n<li>Tenda Tamu 2 Lokal</li>\r\n<li>Panggung Pelaminan 6x3 cm</li>\r\n<li>Lampu Penerangan 2 Hari 2 Malam</li>\r\n<li>Diesel 1 Hari 2 Malam</li>\r\n<li>Kursi 100pcs Cover&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n</ul>'),
(4, 'TULIP PACKAGE', 'Rp.25.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 2</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Tenda</p>\r\n<ul>\r\n<li>Tenda Pelaminan</li>\r\n<li>Tenda Tamu 2 Lokal</li>\r\n<li>Panggung Pelaminan 6x3 cm</li>\r\n<li>Lampu Penerangan 2 Hari 2 Malam</li>\r\n<li>Diesel 1 Hari 2 Malam</li>\r\n<li>Kursi 100pcs Cover&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Hiburan</p>\r\n<ul>\r\n<li>Organ Siang</li>\r\n<li>Penyanyi 2</li>\r\n<li>MC 1</li>\r\n<li>Kendang 1</li>\r\n<li>Player</li>\r\n<li>Sound</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n</ul>'),
(5, 'LILY PACKAGE', 'Rp.35.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 1</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Tenda</p>\r\n<ul>\r\n<li>Tenda Pelaminan</li>\r\n<li>Tenda Tamu 2 Lokal</li>\r\n<li>Tenda Lorong 1 Lokal</li>\r\n<li>Panggung Pelaminan 6x3 cm</li>\r\n<li>Lampu Penerangan 2 Hari 2 Malam</li>\r\n<li>Diesel 1 Hari 2 Malam</li>\r\n<li>Kursi 100pcs Cover&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Hiburan</p>\r\n<ul>\r\n<li>Organ Siang</li>\r\n<li>Penyanyi 2</li>\r\n<li>MC 1</li>\r\n<li>Kendang 1</li>\r\n<li>Player</li>\r\n<li>Sound</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Siraman</p>\r\n<ul>\r\n<li>Musik Live : Kecapi, Sinden, Suling</li>\r\n<li>MC Siraman</li>\r\n<li>Soundsystem Siraman</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Galura</p>\r\n<ul>\r\n<li>Pemusik : Kecapi, Kendang, Suling, Juru Kawin, Perkusi, Biola</li>\r\n<li>Penari : Pamayang 4, Baksa 1, Abah Lengser 1, Ambu 1</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n</ul>'),
(6, 'LAVENDER PACKAGE', 'Rp.38.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 1</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Tenda</p>\r\n<ul>\r\n<li>Tenda Pelaminan</li>\r\n<li>Tenda Tamu 2 Lokal</li>\r\n<li>Tenda Lorong 1 Lokal</li>\r\n<li>Panggung Pelaminan 6x3 cm</li>\r\n<li>Lampu Penerangan 2 Hari 2 Malam</li>\r\n<li>Diesel 1 Hari 2 Malam</li>\r\n<li>Kursi 100pcs Cover&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Hiburan</p>\r\n<ul>\r\n<li>Organ Siang</li>\r\n<li>Penyanyi 2</li>\r\n<li>MC 1</li>\r\n<li>Kendang 1</li>\r\n<li>Player</li>\r\n<li>Sound</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Siraman</p>\r\n<ul>\r\n<li>Musik Live : Kecapi, Sinden, Suling</li>\r\n<li>MC Siraman</li>\r\n<li>Soundsystem Siraman</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Galura</p>\r\n<ul>\r\n<li>Pemusik : Kecapi, Kendang, Suling, Juru Kawin, Perkusi, Biola</li>\r\n<li>Penari : Pamayang 4, Baksa 1, Abah Lengser 1, Ambu 1</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Prewedding</p>\r\n<ul>\r\n<li>Makeup + Hijab do</li>\r\n<li>Photo Prewedding</li>\r\n<li>2 Frame Besar + 6 Frame Kecil</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n<li>Photoboot Mini</li>\r\n</ul>'),
(7, 'DAHLIA PACKAGE', 'Rp.40.000.000', '<p>Makeup</p>\r\n<ul>\r\n<li>Makeup &amp; Hair/Hijab Bride</li>\r\n<li>Makeup 2 Ibu Pengantin</li>\r\n<li>Busana akad 1 &amp; Resepsi Pengantin 1</li>\r\n<li>Busana Ibu CPW &amp; CPP</li>\r\n<li>Beskap Bpk CPW &amp; CPP</li>\r\n<li>Fresh Flowers (Melati)</li>\r\n<li>Accesories hair/hijab</li>\r\n<li>4 Makeup + busana pagar ayu</li>\r\n<li>2 Makeup + busana jaga prasmanan</li>\r\n<li>2beskap pager bagus</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dekorasi</p>\r\n<ul>\r\n<li>Dekorasi Pelaminan 6m</li>\r\n<li>Kursi Pengantin</li>\r\n<li>Fresh Flowers (Bunga Hidup)</li>\r\n<li>Gapura Masuk</li>\r\n<li>Kotak Uang 2 Unit</li>\r\n<li>Mini Garden</li>\r\n<li>Meja Jaga Tamu</li>\r\n<li>Karpet Jalan</li>\r\n<li>Kursi Akad</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Dokumentasi</p>\r\n<ul>\r\n<li>1 Album Sheet 2 Roll</li>\r\n<li>Video Full Liputan</li>\r\n<li>Flashdisk</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Tenda</p>\r\n<ul>\r\n<li>Tenda Pelaminan</li>\r\n<li>Tenda Tamu 2 Lokal</li>\r\n<li>Tenda Lorong 1 Lokal</li>\r\n<li>Panggung Pelaminan 6x3 cm</li>\r\n<li>Lampu Penerangan 2 Hari 2 Malam</li>\r\n<li>Diesel 1 Hari 2 Malam</li>\r\n<li>Kursi 100pcs Cover&nbsp;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Hiburan</p>\r\n<ul>\r\n<li>Organ Siang</li>\r\n<li>Penyanyi 2</li>\r\n<li>MC 1</li>\r\n<li>Kendang 1</li>\r\n<li>Player</li>\r\n<li>Sound</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Siraman</p>\r\n<ul>\r\n<li>Musik Live : Kecapi, Sinden, Suling</li>\r\n<li>MC Siraman</li>\r\n<li>Soundsystem Siraman</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Galura</p>\r\n<ul>\r\n<li>Pemusik : Kecapi, Kendang, Suling, Juru Kawin, Perkusi, Biola</li>\r\n<li>Penari : Pamayang 4, Baksa 1, Abah Lengser 1, Ambu 1</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Prewedding</p>\r\n<ul>\r\n<li>Makeup + Hijab do</li>\r\n<li>Photo Prewedding</li>\r\n<li>2 Frame Besar + 6 Frame Kecil</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Blower</p>\r\n<ul>\r\n<li>Blower Air 2pcs</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p>Bonus</p>\r\n<ul>\r\n<li>Alat Prasmanan</li>\r\n<li>Piring Hoe 100pcs</li>\r\n<li>Sendok 100pcs</li>\r\n<li>Henna &amp; Kuku</li>\r\n<li>Photoboot Mini</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(30) NOT NULL,
  `id_pesanan` int(30) NOT NULL,
  `metode_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` enum('Menunggu Konfirmasi','Terkonfirmasi','Ditolak') NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `metode_pembayaran`, `status_pembayaran`, `bukti_pembayaran`) VALUES
(1, 8, 'Transfer Bank', 'Ditolak', '../assets/img/bukti_pembayaran/1732770181_fav.png'),
(2, 8, 'E-Wallet', 'Terkonfirmasi', '../assets/img/bukti_pembayaran/1732770220_fav.png');

--
-- Trigger `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `after_status_pembayaran_update` AFTER UPDATE ON `pembayaran` FOR EACH ROW BEGIN
    -- Pastikan hanya melakukan update jika kolom status_pembayaran berubah
    IF NEW.status_pembayaran <> OLD.status_pembayaran THEN
        UPDATE pesanan
        SET status_pembayaran = NEW.status_pembayaran
        WHERE id_pesanan = NEW.id_pesanan; -- Asumsikan ada kolom id_pesanan untuk menghubungkan kedua tabel
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(30) NOT NULL,
  `id_pelanggan` int(30) NOT NULL,
  `id_paket` int(30) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `Layanan` varchar(255) NOT NULL,
  `Harga` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_pernikahan` varchar(255) NOT NULL,
  `status_pembayaran` enum('Menunggu Pembayaran','Terkonfirmasi','Ditolak') NOT NULL,
  `Keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_paket`, `nama_pelanggan`, `Layanan`, `Harga`, `lokasi`, `tgl_pernikahan`, `status_pembayaran`, `Keterangan`) VALUES
(2, 7, 7, 'Moch Rafly Pratama', 'Dahlia Package', '40000000', 'Kalijati, Subang', '2024-11-21', '', ''),
(3, 7, 7, 'Moch Rafly Pratama', 'Dahlia Package', '40000000', 'Kalijati, Subang', '2024-11-21', 'Menunggu Pembayaran', ''),
(4, 7, 7, 'Moch Rafly Pratama', 'Dahlia Package', '40000000', 'Kalijati, Subang', '2024-11-21', 'Menunggu Pembayaran', ''),
(5, 7, 1, 'Moch Rafly Pratama', 'Mawar Package', '15000000', 'Kalijati, Subang', '2024-11-21', 'Menunggu Pembayaran', ''),
(6, 7, 1, 'Moch Rafly Pratama', 'Mawar Package', '15000000', 'Kalijati, Subang', '2024-11-21', 'Menunggu Pembayaran', ''),
(7, 7, 4, 'Moch Rafly Pratama', 'Tulip Package', '25000000', 'Kalijati, Subang', '2024-11-15', 'Menunggu Pembayaran', ''),
(8, 7, 5, 'Moch Rafly Pratama', 'Lily Package', '35000000', 'Kalijati, Subang', '2024-11-22', 'Ditolak', ''),
(9, 7, 1, 'Moch Rafly Pratama', 'Mawar Package', '15000000', 'Kalijati, Subang', '2024-11-07', 'Menunggu Pembayaran', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `nama`, `email`, `jenis_kelamin`, `telepon`, `alamat`) VALUES
(7, 'Moch Rafly Pratama', 'Moch.Rafly@gmail.com', 'Laki-Laki', '081221966573', 'Pagaden Barat, Subang'),
(17, 'Gibran Satrian Ahmad', 'Gibran.ahmad@gmail.com', 'Laki-Laki', '085121966573', 'Cibogo, subang'),
(18, 'Amalya Putry Ardytha', 'putry@gmail.com', 'Perempuan', '089218662196', 'Kalijati, Subang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_vendor`
--

CREATE TABLE `tb_vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `telepon` varchar(25) DEFAULT NULL,
  `jenis_layanan` enum('Cattering','Dekorasi','Hiburan','Makeup') NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_vendor`
--

INSERT INTO `tb_vendor` (`id_vendor`, `nama`, `email`, `jenis_kelamin`, `telepon`, `jenis_layanan`, `alamat`) VALUES
(3, 'Siti Aisah', 'siti.aisah@gmail.com', 'Perempuan', '085173004573', 'Cattering', 'Cibogo, Subang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `testi_text` text NOT NULL,
  `testi_client` varchar(255) NOT NULL,
  `testi_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `testimonial`
--

INSERT INTO `testimonial` (`id`, `testi_text`, `testi_client`, `testi_image`) VALUES
(1, 'Saya sangat merekomendasikan wedding organizer ini', 'Chris & Mia', 'efb57760ce625d44d4e9690d4c4650c4-client1.jpg'),
(2, 'Saya dan istri saya sangat puas dengan pelayanan nya', 'Cendler & Mia', '32d4dd8e1a66af69773985c4bb64005a-client2.jpg'),
(3, 'Membantu sekali untuk pernikahan saya', 'Jhon & Emma', '46f7d8f3c33641346da6a4a4e113d90e-client3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `role` enum('Owner','Admin','Vendor','User') DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `jenis_kelamin`, `telepon`, `alamat`, `role`, `reset_token`, `created_at`) VALUES
(1, 'Abdul Aziz', 'Doelzizz', 'abdul.azis2004.aa@gmail.com', '$2y$10$k9szSlHthKsxFyULyONCJuHoFEKYu71brwwc4eqaJMf2hAhSf8sa.', 'Laki-Laki', '08921866573', 'Kalijati', 'Owner', NULL, '2024-11-16 11:49:15'),
(2, 'Lulu Latifah Nurhafsyah', 'Lulu', 'lululatifah478@gmail.com', '$2y$10$n5fNv3gt1qN8PYdsi1vPCeXujIIP0Rx86xD9mF2xr60QqnJzsIBtm', 'Perempuan', '083821966573', 'Garut', 'Admin', '5aeadaf82d3dc353e800c34cf555305ef1c100f9ed324687d6ab053e94fb3175b0dd87894324c074a9fcf39af68fc27248dc', '2024-11-16 11:49:15'),
(3, 'Siti Aisah', 'Dina', 'siti.aisah@gmail.com', '$2y$10$hzd2P5Kd/mqki1RmI2KUde20smCqmcwvhO1BYf1kjBrLvRjYiEGwO', 'Perempuan', '085173004573', 'Cibogo, Subang', 'Vendor', NULL, '2024-11-16 11:49:15'),
(7, 'Moch Rafly Pratama', 'Rafly', 'Moch.Rafly@gmail.com', '$2y$10$OLZAGTeuFKkHO4Ft5OGq5u4fQsV9LlaAqUWvjB9mFQAhUWHDLBHsW', 'Laki-Laki', '081221966573', 'Pagaden Barat, Subang', 'User', NULL, '2024-11-21 04:35:23'),
(17, 'Gibran Satrian Ahmad', 'gibran', 'Gibran.ahmad@gmail.com', '$2y$10$8qytEkbOUA0C/hYe4V/wZufX6ie/FNURqeDNjyr8pzYeX9pAnwEP.', 'Laki-Laki', '085121966573', 'Cibogo, subang', 'User', NULL, '2024-11-21 04:45:04'),
(18, 'Amalya Putry Ardytha', 'Putry', 'putry@gmail.com', '$2y$10$xFzQQbvEjQK0jZ7J./vpiuAHLP9wi0wCTUlv8.2Bm5a2RSyQaCDYa', 'Perempuan', '089218662196', 'Kalijati, Subang', 'User', NULL, '2024-11-21 04:45:58');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `after_users_delete` AFTER DELETE ON `users` FOR EACH ROW BEGIN
    -- Hapus data di tabel tb_pelanggan yang terkait dengan id_users
    DELETE FROM tb_pelanggan
    WHERE id_pelanggan = OLD.id_user;

    -- Hapus data di tabel tb_vendor yang terkait dengan id_users
    DELETE FROM tb_vendor
    WHERE id_vendor = OLD.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_users_role_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    -- Jika role berubah menjadi 'Vendor', hapus data dari tb_pelanggan dan tambahkan ke tb_vendor
    IF NEW.role = 'Vendor' THEN
        DELETE FROM tb_pelanggan
        WHERE id_pelanggan = NEW.id_user;

        INSERT INTO tb_vendor (id_vendor, nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.id_user, NEW.nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
    END IF;

    -- Jika role berubah menjadi 'Admin', hapus data dari tb_pelanggan dan tb_vendor
    IF NEW.role = 'Admin' THEN
        DELETE FROM tb_pelanggan
        WHERE id_pelanggan = NEW.id_user;

        DELETE FROM tb_vendor
        WHERE id_vendor = NEW.id_user;
    END IF;

    -- Jika role berubah menjadi 'User', hapus data dari tb_vendor dan tambahkan ke tb_pelanggan
    IF NEW.role = 'User' THEN
        DELETE FROM tb_vendor
        WHERE id_vendor = NEW.id_user;

        INSERT INTO tb_pelanggan (id_pelanggan, nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.id_user, NEW.nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_users_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    -- Update tabel tb_pelanggan
    UPDATE tb_pelanggan
    SET 
        nama = NEW.nama,
        email = NEW.email,
        jenis_kelamin = NEW.jenis_kelamin,
        telepon = NEW.telepon,
        alamat = NEW.alamat
    WHERE id_pelanggan = NEW.id_user;

    -- Update tabel tb_vendor
    UPDATE tb_vendor
    SET 
        nama = NEW.nama,
        email = NEW.email,
        jenis_kelamin = NEW.jenis_kelamin,
        telepon = NEW.telepon,
        alamat = NEW.alamat
    WHERE id_vendor = NEW.id_user;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_users_after_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    -- Jika role adalah 'VENDOR', masukkan ke tb_vendor
    IF NEW.role = 'VENDOR' THEN
        INSERT INTO tb_vendor (id_vendor, nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.id_user, NEW.Nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
    END IF;

    -- Jika role adalah 'USER', masukkan ke tb_pelanggan
    IF NEW.role = 'USER' THEN
        INSERT INTO tb_pelanggan (id_pelanggan, nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.id_user, NEW.Nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_users_after_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
    -- Jika role adalah 'VENDOR', sinkronkan data di tb_vendor
    IF NEW.role = 'VENDOR' THEN
        UPDATE tb_vendor
        SET nama = NEW.Nama,
            email = NEW.email,
            jenis_kelamin = NEW.jenis_kelamin,
            telepon = NEW.telepon,
            alamat = NEW.alamat
        WHERE email = OLD.email;
    END IF;

    -- Jika role adalah 'USER', sinkronkan data di tb_pelanggan
    IF NEW.role = 'USER' THEN
        UPDATE tb_pelanggan
        SET nama = NEW.Nama,
            email = NEW.email,
            jenis_kelamin = NEW.jenis_kelamin,
            telepon = NEW.telepon,
            alamat = NEW.alamat
        WHERE email = OLD.email;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `fk_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tb_vendor`
--
ALTER TABLE `tb_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_paket` FOREIGN KEY (`id_paket`) REFERENCES `packages` (`id_paket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
