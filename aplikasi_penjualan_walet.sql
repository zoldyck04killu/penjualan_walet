-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2019 at 12:46 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_penjualan_walet`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ktp` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jekel` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` int(11) NOT NULL,
  `role` enum('user','admin','','') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ktp`, `password`, `nama`, `alamat`, `pekerjaan`, `jekel`, `no_hp`, `role`) VALUES
('08872637235', '$2y$10$L4PHrH.pI4Yl7H5o7hitruOM.XJOTGMuE.wB.WtXRvhNrfvUQPZPO', 'akhmad syarif', 'jln agung', 'Wirausaha', 'Laki-Laki', 877325123, 'user'),
('111', '$2y$10$crW3jUpHtsI0xpQfyRu6beEYaXx4hyP95H1utfmHH65jhzBtIuK8K', 'Bambang Arifin', 'jln. kamoja', 'Capil', 'Laki-Laki', 86223231, 'user'),
('123', '$2y$10$zUALB8CbF6mUk.KAX2.lgeyhheZYLn.HvpfcXJ4EJibgNwElvnrOa', 'Budi Setiawan', 'jln. Tanjung Selatan rt1 rw2', 'Dinas', 'Laki-Laki', 2147483647, 'user'),
('admin', '$2y$10$8Qb3Pd2OPxQBzkTA9NrDsu3cmpMY3D13tq0ihv6cqxEt.LD/CDCyG', '1', '1', '1', '1', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(200) NOT NULL,
  `ktp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `nama_barang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pesanan` int(30) NOT NULL,
  `harga` int(100) NOT NULL,
  `kode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Belum','Sudah') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `ktp`, `tanggal_pembelian`, `nama_barang`, `jumlah_pesanan`, `harga`, `kode`, `status`) VALUES
(16, '111', '2018-10-16', '10', 3, 36369, 'abd815286ba1007abfbb8415b83ae2cf', 'Sudah'),
(17, '111', '2018-10-16', '11', 1, 100000, '077e29b11be80ab57e1a2ecabb7da330', 'Belum'),
(18, '111', '2018-10-16', '9', 20, 2460, '788d986905533aba051261497ecffcbb', 'Belum'),
(19, '111', '2018-10-18', '11', 5, 50000000, '5487315b1286f907165907aa8fc96619', 'Sudah'),
(20, '111', '2018-10-18', '10', 10, 150000000, '64223ccf70bbb65a3a4aceac37e21016', 'Belum'),
(21, '08872637235', '2018-10-18', '11', 3, 30000000, '92977ae4d2ba21425a59afb269c2a14e', 'Belum'),
(22, '111', '2018-10-28', '10', 1, 15000000, '8dd48d6a2e2cad213179a3992c0be53c', 'Belum'),
(23, '111', '2018-10-28', '10', 1, 15000000, '9f396fe44e7c05c16873b05ec425cbad', 'Sudah'),
(24, '111', '2018-10-28', '11', 1, 15000000, '92977ae4d2ba21425a59afb269c2a14e', 'Belum'),
(25, '111', '2018-10-28', '14', 1, 10000000, '9fd81843ad7f202f26c1a174c7357585', 'Belum'),
(26, '111', '2018-10-28', '12', 1, 6000000, '6f2268bd1d3d3ebaabb04d6b5d099425', 'Belum'),
(27, '111', '2018-10-28', '12', 1, 6000000, '36660e59856b4de58a219bcf4e27eba3', 'Belum'),
(28, '111', '2018-10-28', '12', 1, 6000000, 'bc6dc48b743dc5d013b1abaebd2faed2', 'Belum'),
(29, '111', '2018-10-28', '12', 1, 6000000, 'd61e4bbd6393c9111e6526ea173a7c8b', 'Belum'),
(30, '123', '2019-07-26', '11', 1, 10000000, '69adc1e107f7f7d035d7baf04342e1ca', 'Belum'),
(31, '123', '2019-07-26', '12', 2, 12000000, '4d5b995358e7798bc7e9d9db83c612a5', 'Belum'),
(32, '123', '2019-07-26', '12', 1, 6000000, '5f93f983524def3dca464469d2cf9f3e', 'Belum'),
(33, '123', '2019-07-26', '12', 1, 6000000, '6aab1270668d8cac7cef2566a1c5f569', 'Belum'),
(34, '123', '2019-07-26', '11', 1, 10000000, 'a49e9411d64ff53eccfdd09ad10a15b3', 'Belum'),
(35, '123', '2019-07-26', '11', 1, 10000000, '1c9ac0159c94d8d0cbedc973445af2da', 'Belum');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `penjualan` AFTER INSERT ON `penjualan` FOR EACH ROW BEGIN
	UPDATE sarang SET stok =  stok-NEW.jumlah_pesanan
    WHERE id = NEW.nama_barang;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sarang`
--

CREATE TABLE `sarang` (
  `id` int(255) NOT NULL,
  `img` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sarang`
--

INSERT INTO `sarang` (`id`, `img`, `nama_sarang`, `keterangan`, `harga`, `stok`) VALUES
(10, 'img-1539620820.jpg', 'Sarang Walet Merah', 'Sebenarnya jenis ini kenapa berwarna merah adalah karena rumah walet yang dibuat oleh burung bercampur antara air liur dan darah. biasa fase ini terjadi saat masa buang telur dari walet, sehingga berwarna merah. jenis ini sangat langka dan berharga mahal.\r\nnamun dalam kenyataan banyak terjadi kecurangan dalam jenis ini, pembuatan warna merah tidak lagi natural melainkan menggunakan campuran amoniak atau feses (kotoran dari walet sendiri) di kolam dibawah tempat komunitas sarang burung. tentunya hal ini sangat berbahaya karena jelas sekali penggunaan campuran zat lain sangat berpengaruh dengan faktor kesehatan dan kebersihan sarang walet. sebaiknya untuk jenis ini anda membeli langsung dari bahan baku di panen rumah walet sehingga anda tau tingkat kebersihan dan keaslian sarang walet merah.', 15000000, 0),
(11, 'img-1539678530.jpg', 'Sarang Walet Sudut atau Segitiga', 'Seperti namanya, sarang Walet Sudut mempunyai bentuk segitiga dengan sudut-sudut yang meruncing. Sarang Walet ini berbentuk segitiga atau Triangle karena berada di lokasi sudut-sudut rumah Walet.\r\nNamun, jika dimakan tekstur sarang Walet Sudut tidak seempuk sarang Walet mangkok. Di samping itu, ukuran sarang Walet Sudut lebih kecil dari jenis sarang Walet mangkok.', 10000000, 6),
(12, 'img-1539678595.jpg', 'Sarang Walet Strip', 'Sarang Walet Strip dihargai lebih murah dari yang lain karena bentuknya tak beraturan atau terlihat seperti sobek-sobek tapi masih tampak seperti mangkok. Sarang Walet Strip dibuat dari jenis sarang Walet Mangkok atau Sudut, tapi tanpa dicetak setelah menjalani proses pembersihan.\r\nSarang ini sengaja tidak dicetak seperti mangkok karena digunakan untuk campuran makanan seperti sup Walet. Oleh karena itu, harga sarang Walet Strip murah. Meski begitu, kandungan gizi dan rasanya tetap sama dengan jenis sarang Walet yang lain.', 6000000, 12),
(13, 'img-1539678648.jpg', 'Sarang Walet Patahan atau rusak', 'Sarang Walet Patahan disebut juga sarang Walet rusak karena bentuknya tidak sempurna. Kerusakan sarang Walet sendiri disebabkan oleh kesalahan dalam menggunakan alat saat panen, kerusakan saat pengiriman, dibuat dari sisa-sisa sarang Walet, dan jatuh dari rumah sarang burung Walet.\r\nHarga sarang Walet Patahan menjadi yang paling murah karena bentuknya tidak beraturan atau patah-patah. Sebenarnya wajar kalau harganya murah, karena kualitas dan bentuknya memang tidak sebaik sarang Walet mangkok. Namun, sarang Walet patahan tetap mempunyai peminatnya tersendiri.', 3000000, 12),
(14, 'img-1539678704.jpg', 'Sarang Walet Campuran', 'Sarang walet campuran ini adalah hasil panen yang didapatkan dari berbagai jenis sarang baik itu jenis mangkok, sudut, strip maupun patahan. Sarang ini di jadikan satu jenis sebagai sarang walet campuran karena tidak semua sarang yang didapatkan dari panen selalu sepenuhnya jenis mangkok atau sudut. Biasanya setiap hasil panen walet rumahan lebih sering mendapatkan jenis sarang walet campuran dari pada satu jenis sarang. Sarang ini lebih sering laku di jual di pasaran, walau harga yang ditawarkan kadang mahal kadang juga murah tergantung kualitas dan harga pasar, karena harga tiap pasar diberbagai daerah atau kota berbeda-beda.', 10000000, 9),
(15, 'img-1539678834.jpg', 'Sarang Walet Mangkok', 'Jenis ini pada umumnya yang paling laris, berbentuk sempurna seperti rumah walet aslinya, seperti mangkok. kadang banyak sekali grade yang ditentukan di jenis ini. Sebenarnya kecuali yang grade tertinggi atau biasa disebut original birdnest semua grade hanya ditentukan oleh ukuranya saja.dari 2 jari , 3 jari atau lebih dari 3 jari. sedang original nest/grade AAAA atau yang terbaik itu adalah jenis mangkok yang tidak melalui proses modifikasi apapun, dibuat dari bahan baku yang disebut plontos atau berbulu ringan\r\nbahan baku tersebut hanya dicabut bulunya dengan dry processing dan dihilangkan kuman nya oleh penguapan. pencabutan bulu ringan dilakukan secara berhati hati tanpa merusak tulang atau struktur rumah walet.\r\npembersihan bagian kakian walet pun hanya dibagian kotoran / sisa yang tidak bisa dimakan. sehingga didapatkan bentuk yang utuh sesuai aslinya. sarang walet yang palsu atau tidak termasuk grade ini dapat dibedakan dari teksturnya\r\njika terlihat halus dibagian dalam / perut, berarti sudah dimodifikasi atau dikenal dengan istilah tambalan. model seperti ini tidak termasuk dalam grade terbaik. bagian depan juga seratnya seperti aslinya,cenderung kasar dan tidak halus. tidak berongga padat dan terlihat cantik. ', 18000000, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarang`
--
ALTER TABLE `sarang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sarang`
--
ALTER TABLE `sarang`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
