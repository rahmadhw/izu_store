-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2021 pada 03.04
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dayat_toko`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_admin`
--

CREATE TABLE `akun_admin` (
  `id_admin` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nomortelepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_admin`
--

INSERT INTO `akun_admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `nomortelepon`, `alamat`) VALUES
(1, 'admin', 'admin', 'admin saja', '084525258', 'jl serba bisa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_pelanggan`
--

CREATE TABLE `akun_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `nomortelepon` int(50) NOT NULL,
  `gambarproduk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `akun_pelanggan`
--

INSERT INTO `akun_pelanggan` (`id_pelanggan`, `username`, `password`, `nama_lengkap`, `nomortelepon`, `gambarproduk`) VALUES
(18, 'rahmad', '$2y$10$UCH6RXjZ/ePGo712Gl2thOlys9MdfMrQ8NpCnJfAsg87ix.VoNJpa', 'rahmad hidayat.w', 2147483647, '20210213024330rahmad.jpg.jpg'),
(19, 'bunda', '$2y$10$v9BcA0SnE8kxYjIPVeAyp.WPFice/UWjlU8Zh1aqPMHIM5BgyRl2G', 'bunda dwi cahya', 8456325, 'default.jpg'),
(20, 'dita', '$2y$10$CB9s6Ww2FoIze04NM/2d9Of9GO8Q0UaoKBSfhFsxs7kUnchP6P6VO', 'dita gunawan', 2147483647, 'default.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(100) NOT NULL,
  `idpembelian` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `namapenyetor` varchar(100) NOT NULL,
  `namabank` varchar(50) NOT NULL,
  `total` int(100) NOT NULL,
  `tanggalbayar` date NOT NULL,
  `struk_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `idpembelian`, `id_pelanggan`, `namapenyetor`, `namabank`, `total`, `tanggalbayar`, `struk_bayar`) VALUES
(4, 22, 1, 'rahmad', 'BCA', 5000000, '2021-02-10', '20210210194232laptop.jpg'),
(5, 23, 1, 'rahmad', 'BCA', 6000000, '2021-02-10', '20210210195424Capture3.PNG'),
(6, 26, 1, 'dikta', 'MANDIRI', 2000000, '2021-02-11', '20210211110533Capture.PNG'),
(7, 30, 18, 'rahmad', 'MANDIRI', 30000, '2021-02-12', '20210212191532uts_ddmpb.PNG'),
(8, 31, 18, 'rahmad', 'BRI', 20000, '2021-02-12', '20210212191949Capture3.PNG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'PENDDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat`, `status`) VALUES
(21, 1, '2021-02-10', 12500000, 'jl pembina kasih', 'pending'),
(22, 1, '2021-02-10', 5000000, 'jl kartika putri', 'sudah bayar'),
(24, 1, '2021-02-10', 2500000, 'jl putri mata', 'pending'),
(25, 1, '2021-02-10', 2500000, 'jl antabrantah', 'pending'),
(26, 1, '2021-02-11', 2000000, 'jl puspita sari', 'sudah bayar'),
(27, 2, '2021-02-11', 2500000, 'jl putri malu', 'pending'),
(28, 1, '2021-02-11', 11500000, 'jl antahbrantah', 'pending'),
(29, 17, '2021-02-12', 2000000, 'wqewqewq', 'pending'),
(30, 18, '2021-02-12', 30000, 'jl kurnia', 'sudah bayar'),
(31, 18, '2021-02-12', 20000, 'jl badang', 'sudah bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(100) NOT NULL,
  `idpembelian` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `idpembelian`, `id_produk`, `jumlah`) VALUES
(26, 21, 1, 3),
(29, 22, 1, 2),
(31, 24, 1, 1),
(32, 25, 1, 1),
(33, 26, 16, 1),
(34, 27, 1, 1),
(35, 28, 1, 3),
(36, 28, 16, 2),
(37, 29, 16, 1),
(38, 30, 19, 1),
(39, 31, 17, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(100) NOT NULL,
  `id_kurir` int(100) NOT NULL,
  `idpembelian` int(100) NOT NULL,
  `alamat` text NOT NULL,
  `namakurir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_kurir`, `idpembelian`, `alamat`, `namakurir`) VALUES
(2, 1, 22, 'jl kartika putri', 'kiki'),
(3, 1, 26, 'jl puspita sari', 'bambang dwi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `namaproduk` varchar(255) NOT NULL,
  `gambarproduk` varchar(255) NOT NULL,
  `hargaproduk` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `namaproduk`, `gambarproduk`, `hargaproduk`) VALUES
(1, 'asus vivobook x540 ma', 'asusz540.jpg', 2500000),
(16, 'laptop acer ', 'gambar2.jpg', 2000000),
(17, 'baju koko 1', '3f7404dc313836f791e9ba760949c349.png', 20000),
(18, 'koko 2', '9f124ee60184a0528adcfd2d0b0f02c4.png', 30000),
(19, 'koko 3', '45058-waryulion-gamis-pria-baju-koko-pria-baju-muslim-varian-warna.png', 30000),
(20, 'koko 4', '1916418_0e2f4a8d-0080-44ae-9053-e59dbfa88374_340_340.png', 40000),
(21, 'koko 5', '16570182_f38a240b-a208-4eef-930a-1292ce6c56cc_700_700.png', 30000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_pelanggan`
--

CREATE TABLE `tabel_pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_pelanggan`
--

INSERT INTO `tabel_pelanggan` (`idpelanggan`, `username`, `password`, `namalengkap`) VALUES
(1, 'rahmad', 'rahmad', 'rahmad hidayat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `akun_pelanggan`
--
ALTER TABLE `akun_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_admin`
--
ALTER TABLE `akun_admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `akun_pelanggan`
--
ALTER TABLE `akun_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `tabel_pelanggan`
--
ALTER TABLE `tabel_pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
