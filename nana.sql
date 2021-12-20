-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2021 pada 19.04
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `belanjaan`
--

CREATE TABLE `belanjaan` (
  `order_id` varchar(200) NOT NULL,
  `barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `belanjaan`
--

INSERT INTO `belanjaan` (`order_id`, `barang`) VALUES
('1008543558', 'Perlengkapan,Perlengkapan,Sepatu'),
('128298165', 'Perlengkapan,Penerangan,Tenda,Sepatu'),
('1353636915', 'Tas'),
('1379521736', 'Tas,Sepatu,Perlengkapan'),
('1389403372', 'Perlengkapan,Tas,Sepatu'),
('1796142487', 'Tenda'),
('1951764526', 'Pakaian gunung,Tenda,Tas'),
('245884438', 'Perlengkapan,Tas'),
('443507084', 'Pakaian gunung,Penerangan'),
('812792308', 'Tas,Perlengkapan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `frekuensi`
--

CREATE TABLE `frekuensi` (
  `item` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `support` double UNSIGNED NOT NULL,
  `keterangan` enum('Lolos','Gagal') COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `frekuensi`
--

INSERT INTO `frekuensi` (`item`, `support`, `keterangan`) VALUES
('Sepatu', 0.4, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Penerangan', 0.2, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Tenda', 0.3, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Tas', 0.6, 'Lolos'),
('Perlengkapan', 0.6, 'Lolos'),
('Penerangan', 0.2, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Tas', 0.6, 'Lolos'),
('Sepatu', 0.4, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Pakaian gunung', 0.2, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Tas', 0.6, 'Lolos'),
('Tenda', 0.3, 'Gagal'),
('Pakaian gunung', 0.2, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Pakaian gunung', 0.2, 'Gagal'),
('Tas', 0.6, 'Lolos'),
('Sepatu=>Penerangan', 0.1, 'Gagal'),
('Perlengkapan=>Penerangan', 0.1, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Perlengkapan=>Sepatu', 0.4, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Sepatu=>Tenda', 0.1, 'Gagal'),
('Perlengkapan=>Tenda', 0.1, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Perlengkapan=>Sepatu', 0.4, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Sepatu=>Tas', 0.2, 'Gagal'),
('Perlengkapan=>Tas', 0.4, 'Gagal'),
('Tas', 0.6, 'Lolos'),
('Perlengkapan=>Sepatu', 0.4, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Penerangan=>Tenda', 0.1, 'Gagal'),
('Perlengkapan=>Tenda', 0.1, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Perlengkapan=>Penerangan', 0.1, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos'),
('Penerangan=>Tenda', 0.1, 'Gagal'),
('Sepatu=>Tenda', 0.1, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Sepatu=>Penerangan', 0.1, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Tas=>Pakaian gunung', 0.1, 'Gagal'),
('Tenda=>Pakaian gunung', 0.1, 'Gagal'),
('Pakaian gunung', 0.2, 'Gagal'),
('Tenda=>Tas', 0.1, 'Gagal'),
('Tas', 0.6, 'Lolos'),
('Tenda', 0.3, 'Gagal'),
('Sepatu=>Penerangan=>Tenda', 0.1, 'Gagal'),
('Perlengkapan=>Penerangan=>Tenda', 0.1, 'Gagal'),
('Penerangan=>Tenda', 0.1, 'Gagal'),
('Perlengkapan=>Sepatu=>Tenda', 0.1, 'Gagal'),
('Sepatu=>Tenda', 0.1, 'Gagal'),
('Perlengkapan=>Tenda', 0.1, 'Gagal'),
('Tenda', 0.3, 'Gagal'),
('Perlengkapan=>Sepatu=>Penerangan', 0.1, 'Gagal'),
('Sepatu=>Penerangan', 0.1, 'Gagal'),
('Perlengkapan=>Penerangan', 0.1, 'Gagal'),
('Penerangan', 0.2, 'Gagal'),
('Perlengkapan=>Sepatu', 0.4, 'Gagal'),
('Sepatu', 0.4, 'Gagal'),
('Perlengkapan', 0.6, 'Lolos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kombinasi`
--

CREATE TABLE `kombinasi` (
  `item` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `confidence` double UNSIGNED NOT NULL,
  `keterangan` enum('Lolos','Gagal') COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data untuk tabel `kombinasi`
--

INSERT INTO `kombinasi` (`item`, `confidence`, `keterangan`) VALUES
('Perlengkapan', 0.66666666666667, 'Gagal'),
('Sepatu', 1, 'Lolos'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Perlengkapan', 0.66666666666667, 'Gagal'),
('Tas', 0.66666666666667, 'Gagal'),
('Sepatu', 0.25, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Sepatu', 0.25, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Sepatu', 0.5, 'Gagal'),
('Tas', 0.33333333333333, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Pakaian gunung', 0.5, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tas', 0.16666666666667, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Pakaian gunung', 0.5, 'Gagal'),
('Tas', 0.16666666666667, 'Gagal'),
('Pakaian gunung', 0.5, 'Gagal'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Sepatu', 0.25, 'Gagal'),
('Sepatu=>Perlengkapan', 0.25, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Penerangan=>Perlengkapan', 1, 'Lolos'),
('Penerangan=>Sepatu', 1, 'Lolos'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Sepatu', 0.25, 'Gagal'),
('Sepatu=>Perlengkapan', 0.25, 'Gagal'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tenda=>Perlengkapan', 1, 'Lolos'),
('Tenda=>Sepatu', 1, 'Lolos'),
('Perlengkapan', 0.33333333333333, 'Gagal'),
('Sepatu', 0.5, 'Gagal'),
('Sepatu=>Perlengkapan', 0.5, 'Gagal'),
('Tas', 0.33333333333333, 'Gagal'),
('Tas=>Perlengkapan', 0.5, 'Gagal'),
('Tas=>Sepatu', 1, 'Lolos'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Penerangan=>Perlengkapan', 1, 'Lolos'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tenda=>Perlengkapan', 1, 'Lolos'),
('Tenda=>Penerangan', 1, 'Lolos'),
('Sepatu', 0.25, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Penerangan=>Sepatu', 1, 'Lolos'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tenda=>Sepatu', 1, 'Lolos'),
('Tenda=>Penerangan', 1, 'Lolos'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tas', 0.16666666666667, 'Gagal'),
('Tas=>Tenda', 1, 'Lolos'),
('Pakaian gunung', 0.5, 'Gagal'),
('Pakaian gunung=>Tenda', 1, 'Lolos'),
('Pakaian gunung=>Tas', 1, 'Lolos'),
('Perlengkapan', 0.16666666666667, 'Gagal'),
('Sepatu', 0.25, 'Gagal'),
('Sepatu=>Perlengkapan', 0.25, 'Gagal'),
('Penerangan', 0.5, 'Gagal'),
('Penerangan=>Perlengkapan', 1, 'Lolos'),
('Penerangan=>Sepatu', 1, 'Lolos'),
('Penerangan=>Sepatu=>Perlengkapan', 1, 'Lolos'),
('Tenda', 0.33333333333333, 'Gagal'),
('Tenda=>Perlengkapan', 1, 'Lolos'),
('Tenda=>Sepatu', 1, 'Lolos'),
('Tenda=>Sepatu=>Perlengkapan', 1, 'Lolos'),
('Tenda=>Penerangan', 1, 'Lolos'),
('Tenda=>Penerangan=>Perlengkapan', 1, 'Lolos'),
('Tenda=>Penerangan=>Sepatu', 1, 'Lolos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `order_id` varchar(200) NOT NULL,
  `product_id` int(50) NOT NULL,
  `ukuran` enum('S','M','L','XL','NULL') DEFAULT NULL,
  `warna` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` enum('Pending','Sedang diproses','Dalam perjalanan','Sampai tujuan','Di batalkan') NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`order_id`, `product_id`, `ukuran`, `warna`, `qty`, `status`, `username`) VALUES
('245884438', 3, 'NULL', 'NULL', 5, 'Sampai tujuan', 'dvskhaliq'),
('245884438', 1, 'NULL', 'Hijau army', 1, 'Sampai tujuan', 'dvskhaliq'),
('1379521736', 1, 'NULL', 'Biru army', 1, 'Sampai tujuan', 'dvskhaliq'),
('1379521736', 16, '', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1379521736', 5, 'NULL', 'NULL', 2, 'Sampai tujuan', 'dvskhaliq'),
('128298165', 3, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('128298165', 8, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('128298165', 12, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('128298165', 16, '', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1951764526', 14, 'L', 'Merah', 1, 'Sampai tujuan', 'dvskhaliq'),
('1951764526', 12, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1951764526', 2, 'NULL', 'Biru', 1, 'Sampai tujuan', 'dvskhaliq'),
('1389403372', 19, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1389403372', 2, 'NULL', ' Merah', 1, 'Sampai tujuan', 'dvskhaliq'),
('1389403372', 16, '', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('443507084', 14, 'L', 'Merah', 1, 'Sampai tujuan', 'dvskhaliq'),
('443507084', 7, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1796142487', 12, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('812792308', 2, 'NULL', 'Biru', 1, 'Sampai tujuan', 'dvskhaliq'),
('812792308', 4, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1008543558', 5, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1008543558', 18, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1008543558', 16, '', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq'),
('1353636915', 1, 'NULL', 'Hijau army', 2, 'Sampai tujuan', 'dvskhaliq'),
('1529408468', 1, 'NULL', 'Hijau army', 1, 'Sampai tujuan', 'dvskhaliq'),
('1529408468', 7, 'NULL', 'NULL', 1, 'Sampai tujuan', 'dvskhaliq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `deskripsi` text NOT NULL,
  `category` enum('Pakaian gunung','Sepatu','Penerangan','Tas','Tenda','Perlengkapan') NOT NULL,
  `berat` int(10) NOT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `jumlah_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `judul`, `harga`, `deskripsi`, `category`, `berat`, `ukuran`, `warna`, `gambar`, `jumlah_stock`) VALUES
(1, 'Tas Gunung / Keril / Carrier Consina Alpine 55 L', 472000, 'ORIGINAL CARRIER CONSINA ALPINE\r\n\r\n\r\n\r\nHanya Warna Hitam\r\n\r\n\r\n\r\nProduct for unisex, hiking, camping, traveling \r\n\r\nFeature:\r\n\r\n- 1 main compartment\r\n\r\n- 2 side pocket\r\n\r\n- 2 side bottle pocket\r\n\r\n- 1 pocket top lid\r\n\r\n- 2 waist pocket on hipbelt\r\n\r\n- Chest buckel with whistler \r\n\r\nMaterial: - 420D Nylon Dolby\r\n\r\n- 210D Pact Cloth\r\n\r\n- 420D Cordura Ripstop\r\n\r\n- Webbing Nylon\r\n\r\n- Frame Alumunium\r\n\r\n- Nylon Buckle \r\n\r\nWeight: 1.6 kg\r\n\r\nVolume: 55 L\r\n\r\nDimension: 50 x 30 x 20 cm (H x W x D)\r\n\r\n\r\n\r\nMohon konfirmasi terlebih dahulu sebelum order untuk ketersedian stok warna', 'Tas', 500, NULL, 'Hijau army,Biru army', 'caril-consina.jpg', 45),
(2, 'Consina Orion Medium Tas Slempang Pria/wanita', 120000, 'CONSINA ORION M\r\nSlingbag universal multifungsi untuk menyimpan gadgets, snacks dan akesories.\r\nDengan adjustable straps yang bisa diatur panjangnyaSpecifications :\r\nAverage Weight : 0,4 Kg\r\nDimension : 23x11x15 cm', 'Tas', 50, NULL, 'Biru, Merah', 'sligbag.jfif', 47),
(3, 'Cooking Set Ds 308 Plus Teko Portable - Alat Masak', 200000, '\r\n****Promo harga termurah****\r\n\r\nselalu ready = bisa langsung order\r\n\r\n\"Cooking set DS-308 paling lengkap\"\r\n\r\nDalam paket :\r\n~ 1 x Teko portable 0,8 liter\r\n~ 1 x Wajan\r\n~ 1 x Panci + tutup\r\n~ 3 X mangkok mini (plastik)\r\n~ 1 x sendok sayur (plastik)\r\n~ 1 x sendok/centong nasi (kayu)\r\n~ 1 x tas jaring\r\n\r\nSpesifikasi :\r\n~ Bahan : alumunium anodized\r\n~ Bahan aksesoris : plastik dan kayu', 'Perlengkapan', 50, NULL, 'NULL', 'cooking-set.jpg', 4),
(4, 'SB Sleeping Bag Consina Sleep Warmer', 300000, 'Deskripsi SB / Sleeping Bag Consina Sleep WarmerSleeping bag Consina New sleep warmer dengan dalaman POLAR yg lembut, lebih ringan dan lebih tipis tetapi tetap hangat dicuaca dingin -5\"c, sehingga sangat praktis dimasukan kedalam tas/carrier dan tidak banyak memakan tempat.Tersedia warna :-HitamSpecifikasi :Unpack (P x L): 200 x 70 cmPacking (D x T): 12 x 27 cm- Model Tikar- Waterproof Zipper- Inner Polar', 'Perlengkapan', 50, NULL, 'NULL', 'sleeping-bag.jpg', 9),
(5, 'Pamosroom Happy Home Portable Gas Stove Kompor Gas', 200000, 'Pamosroom Happy Home Portable Gas Stove Kompor Portabel Gas 2 Fungsi B155-B2- 2 Fungsi : Kompor ini bisa digunakan dengan gas kaleng (Butane Gas Cartridge) ataupun gas elpiji karena dilengkapi dengan LPG connector.\r\n- Kompor portable 2in1 (Bisa menggunakan gas mini 250 gr, tabung gas 3 kg atau pun 12 kg dll)\r\n(untuk pemakaian dengan tabung gas harus di sambung dengan selang gas lagi )\r\n- Body terbuat dari bahan besi berkualitas\r\n- Dimensi produk : 34 x 26 x 7.5cm\r\n- Simple dan Praktis : kompor ini cukup kecil sehingga mudah untuk dibawa traveling bersama keluarga dan dilengkapi dengan tas koper. Cocok untuk di kost, apartemen, acara kuliner, lomba masak, demo masakan, atau pun acara piknikISI dalam :\r\n1 kompor portable\r\n2 pcs konector untuk selang tabung gas atau gas kalengFYI : Kami berkomitmen setiap barang yg dipesan, akan kami cek terlebih dahulu dan yg dikirim pasti dalam kondisi bagus. kami selalu berusaha mengutamakan kepuasan konsumen kami karena kepuasan konsumen adalah yg sangat penting bagi kami.Follow kami untuk dapatkan informasi mengenai produk terbaru kami.Happy Shopping With Us ^^ And Dont Forget To Follow Us\r\n#pamosroom #komporportable #komporportabel #komporgas #kompormini #komporcamping #komporgas #komportabungkaleng\r\nPamosroom Happy Home Portable Gas Stove Kompor Portabel Gas 2 Fungsi B155-B2\r\n\r\n- 2 Fungsi : Kompor ini bisa digunakan dengan gas kaleng (Butane Gas Cartridge) ataupun gas elpiji karena dilengkapi dengan LPG connector.\r\n- Kompor portable 2in1 (Bisa menggunakan gas mini 250 gr, tabung gas 3 kg atau pun 12 kg dll)\r\n(untuk pemakaian dengan tabung gas harus di sambung dengan selang gas lagi )\r\n- Body terbuat dari bahan besi berkualitas\r\n- Dimensi produk : 34 x 26 x 7.5cm\r\n- Simple dan Praktis : kompor ini cukup kecil sehingga mudah untuk dibawa traveling bersama keluarga . Cocok untuk di kost, apartemen, acara kuliner, lomba masak, demo masakan, atau pun acara piknik\r\n\r\nISI dalam :\r\n1 kompor portable\r\n2 pcs konector untuk selang tabung gas atau gas kaleng\r\n\r\nFYI : Kami berkomitmen setiap barang yg dipesan, akan kami cek terlebih dahulu dan yg dikirim pasti dalam kondisi bagus. kami selalu berusaha mengutamakan kepuasan konsumen kami karena kepuasan konsumen adalah yg sangat penting bagi kami.\r\n\r\nFollow kami untuk dapatkan informasi mengenai produk terbaru kami.\r\n\r\nHappy Shopping With Us ^^ And Dont Forget To Follow Us\r\n#pamosroom #komporportable #komporportabel #komporgas #kompormini #komporcamping #komporgas #komportabungkaleng', 'Perlengkapan', 100, NULL, 'NULL', 'kompor-portable.jpg', 7),
(6, 'promo SENTER XM T6 - Senter Kepala Headlamp 3 LED ', 100000, 'Senter Kepala / Lampu Kepala\r\nsudah sama baterai dan chargernya\r\nTipe baterai 18650 bottom top / ujung positif yg ada \" pentolnya \"\r\nSpecifications\r\nTipe LED Cree XM-L T6\r\nLumens 5000 Lumens\r\nTipe Baterai 2 X 18650\r\nMaterial Aircraft Grade Aluminum Alloy coated Mineral Glass\r\nHeadlamp dengan strap flexible yang muat berbagai ukuran kepala. LED senter menggunakan Cree yang dapat menghasilkan cahaya sangat terang. Headlamp tetap nyaman digunakan dalam sesi penggunaan yang lama.\r\nFeatures\r\n3 x Cree XM-L T6\r\nHeadlamp ini menggunakan 3 buah Cree XM-L T6 yang dapat menghasilkan cahaya hingga 5000 lumens.\r\n90 Degree Rotation\r\nHeadlamp dapat digerakkan keatas bawah hingga 90 derajat sehingga jangkauan cahaya semakin besar.\r\nComfortable Straps\r\nStrap pada kepala terbuat dari bahan kain yang halus dan kuat. Sehingga kepala Anda tidak sakit namun tetap kuat menahan beban lampu saat Anda sedang bergerak.\r\nAero Grade Aluminum Body\r\nSeluruh badan senter dibuat dengan bahan aero grade aluminum yang membuat senter LED ini memiliki cooling sistem yang lebih dingin dibanding senter lain.\r\nDISARANKAN UNTUK EXTRA BUBBLE PACKING AGAR BARANG AMAN SAMPAI TUJUAN\r\nBELI = SETUJU', 'Penerangan', 10, NULL, 'NULL', 'head-lamp.jpg', 10),
(7, 'Surya Senter LED Super Terang 2in1 SHT L15W + Ligh', 100000, 'Surya Lampu Senter LED Emergency 15Watt+ 12SMD LED\r\nBISA COD / BAYAR DI TEMPAT\r\nMenggunakan baterai cas ulang lead-acid 4volt 2000 mAh\r\nMenggunakan baterai yg awet, dapat dicas ulang lebih dari 500 kali.\r\nMenggunakan 15W +12SMD LED yg sangat terang, hemat energi dan tahan lama.\r\nTahan Hingga 8 Jam Pemakaian\r\nIdeal digunakan saat listrik padam, berkemah atau saat diperjalanan\r\nTerdapat pegangan dibagian senter dan Terdapat Tali untuk memudahkan membawa\r\nSenter Dengan 1 Super LED\r\nJarak cahaya 1500 Meter\r\nRechargeable\r\nProduk Berkualitas & Tahan Lama\r\nDesain Elegant\r\nDilengkapi Proteksi kelebihan cas\r\nDilengkapi Kabel untuk mengecas\r\nMudah Dibawa Kemana Saja\r\nGARANSI 90 HARI', 'Penerangan', 50, NULL, 'NULL', 'senter.jpg', 8),
(8, 'Lampu Lentera Jadul Badai Lampu Teplok Minyak Tana', 100000, 'SpesifikasiKategori:MinumanBerat:1 kilogramAsal Barang:LokalDeskripsiLampu Badai Minyak/ Lentera Minyak / Lampu Kapal\r\nSpesifikasi :\r\n- Bahan bakar Solar, parafin cair, isi zippo, minyak tanah\r\n- Tinggi : 24 cm\r\n- Diameter : 16\r\n- Ukuran Sedang (kecil)\r\n- Ada tuas pengatur nyala api\r\nMaterial :\r\nKaca tebal, 100% terbuat dari plat besi bukan plastik jadi aman dan tidak meleleh\r\nSelamat berbelanja, stok selalu Ready. silahkan lgs di order gan/sis..\r\nJam Operasional: 08.00-17.00 WIB', 'Penerangan', 50, NULL, 'NULL', 'lentera.jpg', 9),
(9, 'Tumbler Bottle Air Anti Bocor Termos Stainless Mi', 50000, 'Nilai jual produk:\r\n1. Sensor sangat sensitif, tampilan suhu akurat, panas tahan lama\r\n2. Mudah di Genggam\r\n3. Body cup yang ringan & kecil, mudah dibawa dan mudah dimasukkan ke dalam saku\r\n4. lapisan dalam stainless, penjaga suhu yang kuat, tidak beracun dan tidak berasa, aman dan tahan lama\r\n5. anti kebocoran\r\n6. hemat daya, ketahanan baterai yang lama, penggunaan 50000 kali keatas\r\n7. Proses pengecatan,warna tidak cepat pudar\r\n8. penyaring ampas teh yang bisa dilepas\r\nNote：Jangan panaskan secara langsung\r\nuntuk susu, jus, dan minuman lain, hanya bisa disimpan sebentar\r\nBahan: Lapisan 304 stainless steel didalam, 201 stainless steel di bagian luar\r\nKapasitas: 500ml\r\nWarna: Hitam\r\nJumlah lapisan: 2\r\nUkuran produk: 23 * 6.5cm\r\nketahanan panas: 8 jam\r\nBerat : berat bersih 265g, berat kotor 316g\r\nUkuran kemasan: 23,5 * 7 * 7cm\r\nPacking : kotak\r\nKeterangan: Tampilan suhu dapat digunakan secara normal selama 18 bulan\r\n LED tampilan suhu\r\n\r\n 304 stainless steel, penahan panas yang kuat\r\n\r\n anti bocor\r\n\r\n ketahanan baterai 500 hari\r\n\r\n simple dan portabel', 'Perlengkapan', 10, NULL, 'NULL', 'termos.jpg', 20),
(10, 'Trekking Pole Antishock 135 cm Alloy - Tongkat Pen', 50000, 'Tongkat yg Membantu anda dalam pendakian dan membantu menopang berat beban anda\r\nAntishock / Ngeper saat ditekan yang berfungsi untuk meredam goncangan\r\nBahan Aluminium Alloy (ringan, kuat dan anti karat)\r\nPanjang dilipat 65 cm, panjang ketika digunakan maksimal 135 cm\r\nTerdapat 2 model handle yaitu lurus dan bengkok\r\nCocok digunakan untuk hiking, camping, maupun untuk kegiatan outdoor', 'Perlengkapan', 50, NULL, 'NULL', 'tongkat.jpg', 10),
(11, 'RAUNG ADVENTURE Matras Gunung / Matras Yoga / Matras Outdoor - Bahan Spon Tebal List Warna (Hitam, Merah, Abu, Kuning, Hijau)', 30000, 'MatrasTerbuat dari spon berkualitas, dengan tingkat kepadatan dan ketebalan yang lebih dari yang dipasaran, disediakan dalam varian list yang beragam seperti hitam, merah, kuning, hijau dan abu-abu. Nikmati kemudahan dan kenyamanan menggunakan produk ini. Sangat cocok, untuk kegiatan outdoor, atau aktivitas olahraga yoga', 'Perlengkapan', 10, NULL, 'NULL', 'matras.jpg', 10),
(12, 'Tenda Camping Tenda Gunung 2-3 Orang Tenda Manual Tenda Lipat Portable SPEEDS 018-33', 1500000, 'Tenda Camping yang cocok untuk kegiatan outdoor, hiking, kegiatan camping, piknik. Tenda Camping ini dapat digunakan untuk 2-3 Orang. Tenda Camping ini juga dilengkapi dengan kelambu anti nyamuk sehingga terhindar dari nyamuk atau serangga yang terbuat dari bahan material polyester yang berkualitas. Tahan terhadap air hujan dan cuaca panas. Memiliki ukuran: 150x200 cm\r\nMemiliki satu pintu\r\nDilengkapi dengan frame, pasak penutup atas dan tasTenda Camping ini juga dapat dilipat dan dimasukkan ke dalam tas sehingga anda tidak perlu repot untuk dibawa kemanapun dan kapanpun.Features :\r\n• Tenda camping waterproof anti nyamuk karena dilengkapi dengan jaring/ kelambu pada bagian atas tenda (bisa ditutup dengan atap tambahan yang telah tersedia), dan juga pada bagian pintu tenda (terdapat 2 buah pintu tenda yang terdiri dari pintu jaring anti nyamuk dan pintu parasut)\r\n• Tenda camping ini juga dilengkapi dengan alas tenda bahan terpal yang telah melekat dengan tenda.Kelengkapan :\r\n- 1 buah tenda waterproof dengan alas tenda dan pintu serta ventilasi atas dari jaring/kelambu anti nyamuk\r\n- 2 buah tiang tenda yang bisa dilipat\r\n- 4 buah baut tenda\r\n- 1 buah penutup bagian atas tenda (jika diperlukan saat hujan )\r\n- 1 buah tas tenda', 'Tenda', 4000, NULL, 'NULL', 'tenda.jpg', 47),
(13, 'Grand Harvest Pisau Lipat Multitools EDC Emergency Multi Tool Murah', 50000, 'Multitools super lengkap karena terdapat 14 fungsi berbeda dalam satu alat, yang bisa dijadikan EDC atau emergency tool. Dengan material besi dengan warna titanium black membuat mini multi tool ini terkesan elegan, namun tetap kokoh dan awet digunakan. Bentuknya juga kecil, ringkes, bisa masuk kantong, ditambah ada ringsepertii karabiner mini di bagian ujungnya jadi bisa dipake keychain deh.. :P\r\nDetail\r\nDetail : Multitool\r\nBrand : Knifezer / Grand harvest, sesuai stok\r\nMaterial : 420cc stainles steel berkualitas\r\nPanjang Terlipat : 9.1 cm\r\nPanjang Terbuka : 15.5 cm\r\nPanjang pisau : 6.5\r\nWarna : hitam packing box\r\nBisa diklik kemungkinan besar ready ya ka.. Silahkan dicekout sekalyn perintilan lainnya..:)\r\n#pisaulipat #multitools #multipurposetools #pocketknife #pisaulipatmni #pisaumultifungsi #pisaumultitools #foldingknife #edcsurvival #survivalkit #pisaulipatkemping #pisaulipatmultitools #pisaumultifungsi #pisaulipatoutdoor #tokooutdoorlengkap #tokooutdoortermurah #tokooutdoorjatim\r\nMultitools super lengkap karena terdapat 14 fungsi berbeda dalam satu alat, yang bisa dijadikan EDC atau emergency tool. Dengan material besi dengan warna titanium black membuat mini multi tool ini terkesan elegan, namun tetap kokoh dan awet digunakan. Bentuknya juga kecil, ringkes, bisa masuk kantong, ditambah ada ringsepertii karabiner mini di bagian ujungnya jadi bisa dipake keychain deh.. :P\r\nDetail\r\nDetail : Multitool\r\nBrand : Knifezer / Grand harvest, sesuai stok\r\nMaterial : 420cc stainles steel berkualitas\r\nPanjang Terlipat : 9.1 cm\r\nPanjang Terbuka : 15.5 cm\r\nPanjang pisau : 6.5\r\nWarna : hitam packing box\r\nBisa diklik kemungkinan besar ready ya ka.. Silahkan dicekout sekalyn perintilan lainnya..:)\r\n#pisaulipat #multitools #multipurposetools #pocketknife #pisaulipatmni #pisaumultifungsi #pisaumultitools #foldingknife #edcsurvival #survivalkit #pisaulipatkemping #pisaulipatmultitools #pisaumultifungsi #pisaulipatoutdoor #tokooutdoorlengkap #tokooutdoortermurah #tokooutdoorjatim', 'Perlengkapan', 50, NULL, 'NULL', 'pisau.jpg', 10),
(14, 'JAKET GUNUNG OUTDOOR INNER POLAR CONSINA MOUNTAIN PRO DURATEX WATERPROOF - ORIGINAL', 450000, 'Best use for unisex, trekking, hiking, travelling, outdoor activity\r\n\r\nMaterial & Feature :\r\n- Outer 100% Nylon Mini Ripstop\r\n- Full Dull in Solid Dyed FINISHING W/R & WP\r\n- Inner fleece\r\n- Ultra light weight\r\n- Folding Hoodie\r\n- 1 chest inner pocket\r\n- 1 front chest pocket with waterproof zipper\r\n- 2 front waist pocket\r\n\r\nWeight : 0.5 Kg', 'Pakaian gunung', 10, 'XL,L,M', 'Merah,hitam', 'jaket.jfif', 8),
(15, 'Consina Rittnerhorn Long Pants Hiking Polyester', 300000, 'ConsinaRittnerhornBest Use: everyone, daily, traveling, hiking, climbingMaterial:- Polyester, stretch one wayFeature:- Water repellant- Quick dry- Waterproof zipperWeight: 0.28 Kg', 'Pakaian gunung', 10, '32,35,36,37,38,39,40,43', 'Hitam, Navy', 'celana.jfif', 10),
(16, 'Sepatu Gunung Consina Jonsom Trekking', 600000, ':: SPESIFIKASI :: - Kulit suede yang kuat dan bahan oxford bagian atas - Desain tinggi memberikan perlindungan ekstra untuk kaki Anda - Penutup kaki karet dan struktur pendukung tumit - Uneebtex membran tahan air dan bersirkulasi menjaga kaki Anda kering dan nyaman - Sistem lace-up yang aman memberi Anda kecocokan dan nyaman yang Anda inginkan - EVA mid-sol - Komodo, Sol karet alami yang anti slip -ukuran:40.41.42.43.44 ready stock Sol peredam tahan air - Desain terbaru - Mengontrol pijakan dengan baik - Menjaga posisi kenyamanan kaki - Kontur tapak sepatu yang anti llicin - Meredam benturan', 'Sepatu', 10, '32,35,36,37,38,39,40,43', NULL, 'sepatu-gunung.jpg', 46),
(17, 'Sarung Tangan Gunung Dewasa Tebal Winter Glove Consina Carstensz', 434000, 'SARUNG TANGAN GUNUNG TEBAL WINTER GLOVE CONSINA CARSTENSZ Tanyakan stok dahulu sebelum order agar tidak terjadi pengiriman random atau pembatalan Salam pembeli cerdas Sedia warna hitam ukuran L Membeli = setuju #sarungtangangunung #winterglove #hikingglove #outdooradventure #outdoorsprots', 'Perlengkapan', 10, NULL, 'NULL', 'sarung-tangan.jfif', 10),
(18, 'Plastik Sampah 60x100 isi 10 lembar/Trash Bag/Kantong Sampah/Kantong plastik sampah/Kantong hitam', 8000, 'Selamat datang di toko kami... READY STOK...LANGSUNG ORDER YA KAK... BUKAN RESELLER DAN DROPSHIP. PESAN HARI KERJA LANGSUNG DIKIRIM DI HARI YG SAMA. SIAP ANTAR VIA GOJEK. Kantong Plastik Sampah Plastik HD Terdapat 6 ukuran: (L x P) 60 x 90 cm isi 10 lembar 60 x 100 cm isi 10 lembar 80 x 100 cm isi 10 lembar 90 x 100 cm isi 10 lembar 90 x 120 cm isi 10 lembar 100 x 120 cm isi 10 lembar Tebal: 04 Micron Dijual per pack Berat: 318 gr HARGA YANG TERTERA ADALAH 1 PACK Kantong sampah ini berbentuk persegi panjang seperti karung (tidak ada gagang) Kegunaan untuk : - Kantong serbaguna bisa buat tempat sampah rumah tangga,restoran,hotel,rumah sakit,mall,kantor - Bisa juga sebagai bungkus plastik produk online - Menyimpan perlengkapan rumah - Berguna saat hiking dan Mendaki gunung plastik sampah,plastik sampah besar,plastik sampah roll murah,plastik sampah sedang,plastik sampah besar jumbo,plastik sampah ukuran 60x100,plastik sampah besar 90 x 120,plastik sampah roll,plastik sampah ,plastik sampah besar jumbo tebal trash bag,trash bag jumbo,trash bag sampah,trash bag carrier,trash bag 60x100,trash bag bening,trash bag 60x100cm,trash bag holder outdoor,trash bag 90x120cm,trash bag kecil kantong sampah plastik,kantong sampah,kantong sampah jumbo,kantong sampah hitam,kantong sampah ukuran besar,kantong sampah roll,kantong sampah rol,kantong sampah 60 x 100,kantong sampah besar,kantong sampah gulung', 'Perlengkapan', 10, NULL, 'NULL', 'trashbag.jpg', 9),
(19, 'GROSIR TOPI RIMBA EIGER/RAUNG RIMBA EIGER/TOPI GUNUNG/TOPI OUTDOR/TOPI MENDAKI/TOPI BERKEBUN/TOPI TANI TERMURAH', 32000, 'GAMBAR 100% ASLI (HASIL FOTO SENDIRI)\r\n-GARANSI UANG KEMBALI JIKA BARANG YANG DI KIRIM TIDAK SESUAI GAMBAR\r\n\r\nECER---SILAKAN CHAT TERLEBIH DAHULU UNTUK KETERSEDIAAN BARANG\r\n\r\nBISA GROSIR & ECER\r\n\r\nNB.UNTUK GROSIR BISA PILIH MOTIF\r\n-1KG MUAT 10PCS\r\n\r\n- Model:Topi Rimba outdor\r\n\r\n- Bahan cotton berkualitas\r\n\r\n- Bahan sangat nyaman di pakai\r\n\r\n- ukuran all size\r\n\r\n- Menggunakan bahan full,,\r\n\r\n- bisa di besar kecilkan\r\n\r\n- Good quality\r\n\r\n- Good produk\r\n\r\n\r\n', 'Perlengkapan', 10, NULL, 'NULL', 'topi.jpg', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_product`
--

CREATE TABLE `rating_product` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `tgl` date NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating_product`
--

INSERT INTO `rating_product` (`id`, `nama`, `rating`, `comment`, `tgl`, `username`) VALUES
(1, 'Davis Chaliq', 3, 'mantul', '2021-12-13', 'dvskhaliq'),
(12, 'jelek', 1, 'patah nih besinya bisa return gak ya ?', '2021-12-13', 'dvskhaliq'),
(18, 'Davis Chaliq', 5, 'mantap', '2021-12-19', 'dvskhaliq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reportbarangkeluar`
--

CREATE TABLE `reportbarangkeluar` (
  `order_id` varchar(200) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `category` enum('Pakaian gunung','Sepatu','Penerangan','Tas','Tenda','Perlengkapan') NOT NULL,
  `harga_jual` double NOT NULL,
  `qty` int(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reportbarangkeluar`
--

INSERT INTO `reportbarangkeluar` (`order_id`, `nama_barang`, `category`, `harga_jual`, `qty`, `tgl`) VALUES
('245884438', 'Cooking Set Ds 308 Plus Teko Portable - Alat Masak', 'Perlengkapan', 200000, 5, '2021-12-13'),
('245884438', 'Tas Gunung / Keril / Carrier Consina Alpine 55 L', 'Tas', 472000, 1, '2021-12-13'),
('1379521736', 'Tas Gunung / Keril / Carrier Consina Alpine 55 L', 'Tas', 472000, 1, '2021-12-13'),
('1379521736', 'Sepatu Gunung Consina Jonsom Trekking', 'Sepatu', 1500000, 1, '2021-12-13'),
('1379521736', 'Pamosroom Happy Home Portable Gas Stove Kompor Gas', 'Perlengkapan', 200000, 2, '2021-12-13'),
('128298165', 'Cooking Set Ds 308 Plus Teko Portable - Alat Masak', 'Perlengkapan', 200000, 1, '2021-12-13'),
('128298165', 'Lampu Lentera Jadul Badai Lampu Teplok Minyak Tana', 'Penerangan', 100000, 1, '2021-12-13'),
('128298165', 'Tenda Camping Tenda Gunung 2-3 Orang Tenda Manual Tenda Lipat Portable SPEEDS 018-33', 'Tenda', 150000, 1, '2021-12-13'),
('128298165', 'Sepatu Gunung Consina Jonsom Trekking', 'Sepatu', 1500000, 1, '2021-12-13'),
('1951764526', 'JAKET GUNUNG OUTDOOR INNER POLAR CONSINA MOUNTAIN PRO DURATEX WATERPROOF - ORIGINAL', 'Pakaian gunung', 450000, 1, '2021-12-13'),
('1951764526', 'Tenda Camping Tenda Gunung 2-3 Orang Tenda Manual Tenda Lipat Portable SPEEDS 018-33', 'Tenda', 150000, 1, '2021-12-13'),
('1951764526', 'Consina Orion Medium Tas Slempang Pria/wanita', 'Tas', 120000, 1, '2021-12-13'),
('1008543558', 'Pamosroom Happy Home Portable Gas Stove Kompor Gas', 'Perlengkapan', 200000, 1, '2021-12-17'),
('1008543558', 'Plastik Sampah 60x100 isi 10 lembar/Trash Bag/Kantong Sampah/Kantong plastik sampah/Kantong hitam', 'Perlengkapan', 8000, 1, '2021-12-17'),
('1008543558', 'Sepatu Gunung Consina Jonsom Trekking', 'Sepatu', 1500000, 1, '2021-12-17'),
('1353636915', 'Tas Gunung / Keril / Carrier Consina Alpine 55 L', 'Tas', 472000, 2, '2021-12-17'),
('1389403372', 'GROSIR TOPI RIMBA EIGER/RAUNG RIMBA EIGER/TOPI GUNUNG/TOPI OUTDOR/TOPI MENDAKI/TOPI BERKEBUN/TOPI TA', 'Perlengkapan', 32000, 1, '2021-12-17'),
('1389403372', 'Consina Orion Medium Tas Slempang Pria/wanita', 'Tas', 120000, 1, '2021-12-17'),
('1389403372', 'Sepatu Gunung Consina Jonsom Trekking', 'Sepatu', 1500000, 1, '2021-12-17'),
('443507084', 'JAKET GUNUNG OUTDOOR INNER POLAR CONSINA MOUNTAIN PRO DURATEX WATERPROOF - ORIGINAL', 'Pakaian gunung', 450000, 1, '2021-12-17'),
('443507084', 'Surya Senter LED Super Terang 2in1 SHT L15W + Ligh', 'Penerangan', 100000, 1, '2021-12-17'),
('812792308', 'Consina Orion Medium Tas Slempang Pria/wanita', 'Tas', 120000, 1, '2021-12-17'),
('812792308', 'SB Sleeping Bag Consina Sleep Warmer', 'Perlengkapan', 300000, 1, '2021-12-17'),
('1796142487', 'Tenda Camping Tenda Gunung 2-3 Orang Tenda Manual Tenda Lipat Portable SPEEDS 018-33', 'Tenda', 1500000, 1, '2021-12-17'),
('1529408468', 'Tas Gunung / Keril / Carrier Consina Alpine 55 L', 'Tas', 472000, 1, '2021-12-19'),
('1529408468', 'Surya Senter LED Super Terang 2in1 SHT L15W + Ligh', 'Penerangan', 100000, 1, '2021-12-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reportbarangmasuk`
--

CREATE TABLE `reportbarangmasuk` (
  `nama_barang` varchar(100) NOT NULL,
  `harga_beli` double NOT NULL,
  `stock_beli` int(50) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reportbarangmasuk`
--

INSERT INTO `reportbarangmasuk` (`nama_barang`, `harga_beli`, `stock_beli`, `tgl`) VALUES
('Tenda Camping Tenda Gunung 2-3 Orang Tenda Manual Tenda Lipat Portable SPEEDS 018-33', 250000, 10, '2021-12-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_checkout`
--

CREATE TABLE `tmp_checkout` (
  `product_id` varchar(200) NOT NULL,
  `ukuran` enum('S','M','L','XL','NULL') DEFAULT NULL,
  `warna` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_checkout`
--

INSERT INTO `tmp_checkout` (`product_id`, `ukuran`, `warna`, `qty`, `username`) VALUES
('15', 'NULL', 'NULL', 2, 'dika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksibca`
--

CREATE TABLE `transaksibca` (
  `order_id` varchar(200) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksibni`
--

CREATE TABLE `transaksibni` (
  `order_id` varchar(200) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksibri`
--

CREATE TABLE `transaksibri` (
  `order_id` varchar(200) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va` varchar(100) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksimandiri`
--

CREATE TABLE `transaksimandiri` (
  `order_id` varchar(200) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `biller_code` int(50) NOT NULL,
  `va` varchar(50) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksipermata`
--

CREATE TABLE `transaksipermata` (
  `order_id` varchar(200) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `va` varchar(100) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(50) NOT NULL,
  `paid` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('bearbrand', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('dika', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
('dvskhaliq', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usert`
--

CREATE TABLE `usert` (
  `order_id` varchar(200) NOT NULL,
  `penerima` text NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `resi` varchar(100) DEFAULT NULL,
  `jasa_pengiriman` varchar(100) NOT NULL,
  `total_harga` double NOT NULL,
  `payment` enum('BCA','BRI','BNI','MANDIRI','PERMATA','COD','NULL') NOT NULL,
  `valid` enum('0','1') NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usert`
--

INSERT INTO `usert` (`order_id`, `penerima`, `alamat`, `provinsi`, `city`, `postal`, `phone`, `resi`, `jasa_pengiriman`, `total_harga`, `payment`, `valid`, `username`) VALUES
('1008543558', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'DI Yogyakarta', 'Kabupaten Sleman', '17610', '081284537864', '45612312313', 'JNE YES Estimasi 1-1 hari', 1743000, 'COD', '0', 'dvskhaliq'),
('128298165', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Jawa Barat', 'Kota Bogor', '17610', '081284537864', '45461235498', 'TIKI ONS Estimasi 1 hari', 2472000, 'COD', '0', 'dvskhaliq'),
('1353636915', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Jawa Barat', 'Kota Bandung', '17610', '081284537864', '12345648', 'TIKI ECO Estimasi 4 hari', 954000, 'COD', '0', 'dvskhaliq'),
('1379521736', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Jawa Barat', 'Kota Bandung', '17610', '081284537864', '4561223156', 'JNE YES Estimasi 1-1 hari', 2444000, 'COD', '0', 'dvskhaliq'),
('1389403372', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'DI Yogyakarta', 'Kabupaten Kulon Progo', '17610', '081284537864', '4864213456', 'TIKI REG Estimasi 4 hari', 1678000, 'COD', '0', 'dvskhaliq'),
('1529408468', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'DKI Jakarta', 'Kota Jakarta Timur', '17610', '081284537864', '464864313', 'TIKI ONS Estimasi 1 hari', 590000, 'COD', '0', 'dvskhaliq'),
('1796142487', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Kalimantan Barat', 'Kabupaten Ketapang', '17610', '081284537864', '64864862316', 'JNE REG Estimasi 3-5 hari', 1700000, 'COD', '0', 'dvskhaliq'),
('1951764526', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Jawa Barat', 'Kabupaten Kuningan', '17610', '081284537864', '575757587909', 'TIKI ONS Estimasi 1 hari', 1308000, 'COD', '0', 'dvskhaliq'),
('245884438', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Jawa Barat', 'Kabupaten Bandung', '17610', '081284537864', '789789798798', 'JNE REG Estimasi 1-2 hari', 1505000, 'COD', '0', 'dvskhaliq'),
('443507084', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'Bengkulu', 'Kabupaten Kaur', '17610', '081284537864', '4861232146', 'JNE REG Estimasi 2-3 hari', 592000, 'COD', '0', 'dvskhaliq'),
('812792308', 'Davis Chaliq', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 'DKI Jakarta', 'Kota Jakarta Selatan', '17610', '081284537864', '48646121346486', 'TIKI REG Estimasi 2 hari', 429000, 'COD', '0', 'dvskhaliq');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE `user_detail` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `provinsi` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `postal` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `img` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`firstname`, `lastname`, `email`, `alamat`, `provinsi`, `city`, `postal`, `country`, `img`, `username`) VALUES
('Davis', 'Chaliq', 'dvskhaliq@gmail.com', 'Kavling taman wisata A12/28 kelurahan bahagia kecamatan babelan', 9, 54, '17610', 'Indonesia', 'PP61b71606dde16.jpg', 'dvskhaliq'),
('Ritha', 'herawati', 'dvskhaliq@davdc.com', 'Toko Raharja, Jalan Abc Pasar Cikapundung Blok E7, Braga, Sumur Bandung, Kota Bandung', 9, 23, '40111', 'indonesia', 'PP614bf373acf5d.jpg', 'bearbrand'),
('Dika', 'Aditya', 'dvskhaliq.dc@gmail.com', 'Kavling Taman Wisata Blok A12 / Nomor 28 Kelurahan Bahagia Kecamatan Babelab Bekasi Utara', 6, 154, '17610', 'indonesia', 'PP619a47a8de7f7.jpg', 'dika'),
('Davis', 'Chaliq', 'dvskhaliq@gmail.com', 'Kavling taman wisata A12/28 kelurahan bahagia kecamatan babelan', 9, 54, '17610', 'Indonesia', 'PP61b71606dde16.jpg', 'dvskhaliq'),
('Ritha', 'herawati', 'dvskhaliq@davdc.com', 'Toko Raharja, Jalan Abc Pasar Cikapundung Blok E7, Braga, Sumur Bandung, Kota Bandung', 9, 23, '40111', 'indonesia', 'PP614bf373acf5d.jpg', 'bearbrand');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rating_product`
--
ALTER TABLE `rating_product`
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `transaksibca`
--
ALTER TABLE `transaksibca`
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `transaksibni`
--
ALTER TABLE `transaksibni`
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `transaksibri`
--
ALTER TABLE `transaksibri`
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `transaksimandiri`
--
ALTER TABLE `transaksimandiri`
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `transaksipermata`
--
ALTER TABLE `transaksipermata`
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `usert`
--
ALTER TABLE `usert`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `user_detail`
--
ALTER TABLE `user_detail`
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating_product`
--
ALTER TABLE `rating_product`
  ADD CONSTRAINT `rating_product_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksibca`
--
ALTER TABLE `transaksibca`
  ADD CONSTRAINT `transaksibca_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksibni`
--
ALTER TABLE `transaksibni`
  ADD CONSTRAINT `transaksibni_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksibri`
--
ALTER TABLE `transaksibri`
  ADD CONSTRAINT `transaksibri_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksimandiri`
--
ALTER TABLE `transaksimandiri`
  ADD CONSTRAINT `transaksimandiri_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksipermata`
--
ALTER TABLE `transaksipermata`
  ADD CONSTRAINT `transaksipermata_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `usert` (`order_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user_detail` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
