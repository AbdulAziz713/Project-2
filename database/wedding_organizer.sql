-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Nov 2024 pada 04.16
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
(1, 'Jhon &  Emma', '14 Maret 2023', '95b66256391cf16df1f716067ed5c885-gallery1.jpg', 'Saya sangat senang dan bangga'),
(2, 'Candler & Mia', '10 November 2023', '90b0c15d7053da82f8bf2addb32dbdf8-gallery2.jpg', 'Bersyukur sekali mendapatkan suami TNI AL'),
(4, 'Chris & Rin', '09 September 2023', '42a6599845ab472c68303cb34f6e15d0-gallery3.jpg', 'Tempat Mengucapkan Janji Suci'),
(5, 'Pernikahan Finn & Alexa', '11 Desember 2022', '03e65ed528a1063814a1e4453b3238c9-gallery4.jpg', 'Bangku Para Tamu Undangan yang Berbahagia'),
(6, 'Andi & Sinta', '30 September 2019', 'd162b6c93c42dddb860da77f62aaa33c-gallery5.jpg', 'Jamuan yang Mewah akan kuberikan untuk keluarga'),
(7, 'Bagus & Sriayuningsih', '15 Agustus 2022', '7f49ff22466565c4831d329febcc1736-gallery6.jpg', 'Tradisi Pernikahan yang Sangat Berkesan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `packages_heading` varchar(255) NOT NULL,
  `packages_price` varchar(255) NOT NULL,
  `packages_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `packages`
--

INSERT INTO `packages` (`id`, `packages_heading`, `packages_price`, `packages_list`) VALUES
(1, 'DIAMOND PACKAGE', '$750', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n<li>GEDUNG</li>\r\n</ul>'),
(2, 'SILVER PACKAGE', '$1000', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>'),
(3, 'GOLD PACKAGE', '$1200', '<ul>\r\n<li>Delicious Main Buffet 300 Servings</li>\r\n<li>Beautiful Makeup, Luxurious Wedding Clothing</li>\r\n<li>Magnificent Aisle Beautiful Decoration</li>\r\n<li>Photo and Video Shooting &amp; Exclusive Collage Album</li>\r\n<li>Master Of Ceremony (MC) With A Sweet Voice</li>\r\n</ul>');

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
(1, 'Moch Rafly Pratama', 'Moch.Rafly@gmail.com', 'Laki-Laki', '08921866573', 'Pagaden Barat'),
(2, 'Anik Aida Nuraeni', 'anik@gmail.com', 'Perempuan', '083821966573', 'Cibogo');

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
  `jenis_layanan` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_vendor`
--

INSERT INTO `tb_vendor` (`id_vendor`, `nama`, `email`, `jenis_kelamin`, `telepon`, `jenis_layanan`, `alamat`) VALUES
(1, 'Siti Aisah', 'siti.aisah@gmail.com', 'Perempuan', '085173004573', '', 'Cibogo');

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
  `role` varchar(255) DEFAULT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `email`, `password`, `jenis_kelamin`, `telepon`, `alamat`, `role`, `reset_token`, `created_at`) VALUES
(1, 'Abdul Aziz', 'Doelzizz', 'abdul.azis2004.aa@gmail.com', '$2y$10$k9szSlHthKsxFyULyONCJuHoFEKYu71brwwc4eqaJMf2hAhSf8sa.', 'Laki-Laki', '088218830417', 'Dusun CIBODAS, RT/RW 030/009, Kalijati Timur, Kalijati, Subang, Jawa Barat 41271', 'SUPER_ADMIN', NULL, '2024-11-16 11:49:15'),
(2, 'Lulu Latifah Nurhafsyah', 'Lulu', 'lululatifah478@gmail.com', '$2y$10$n5fNv3gt1qN8PYdsi1vPCeXujIIP0Rx86xD9mF2xr60QqnJzsIBtm', 'Perempuan', '083821966573', 'Garut', 'ADMIN', '5aeadaf82d3dc353e800c34cf555305ef1c100f9ed324687d6ab053e94fb3175b0dd87894324c074a9fcf39af68fc27248dc', '2024-11-16 11:49:15'),
(3, 'Siti Aisah', 'Dina', 'siti.aisah@gmail.com', '$2y$10$ZUKV8K3dgiBDQTgDviUcbu6vczHmDjszCVOFEpda/lt9Q2ZRxUd5.', 'Perempuan', '085173004573', 'Cibogo', 'VENDOR', NULL, '2024-11-16 11:49:15'),
(4, 'Moch Rafly Pratama', 'Rafly', 'Moch.Rafly@gmail.com', '$2y$10$ONTBwXfoZbcCWcp8OndqRORozd1RGCmIbPUbmQVnaGDrQS/8vnjla', 'Laki-Laki', '08921866573', 'Pagaden Barat', 'USER', NULL, '2024-11-16 11:49:15'),
(5, 'Anik Aida Nuraeni', 'Anik', 'anik@gmail.com', '$2y$10$I9.8VD8fmNLadJT7BVwFbO2KKcpQbPFtY3A1hqhHqHfeQFHlSNeiK', 'Perempuan', '083821966573', 'Cibogo', 'USER', NULL, '2024-11-18 02:30:45');

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `trg_users_after_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    -- Jika role adalah 'VENDOR', masukkan ke tb_vendor
    IF NEW.role = 'VENDOR' THEN
        INSERT INTO tb_vendor (nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.Nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
    END IF;

    -- Jika role adalah 'USER', masukkan ke tb_pelanggan
    IF NEW.role = 'USER' THEN
        INSERT INTO tb_pelanggan (nama, email, jenis_kelamin, telepon, alamat)
        VALUES (NEW.Nama, NEW.email, NEW.jenis_kelamin, NEW.telepon, NEW.alamat);
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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_vendor`
--
ALTER TABLE `tb_vendor`
  ADD PRIMARY KEY (`id_vendor`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role_id` (`role`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_vendor`
--
ALTER TABLE `tb_vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
