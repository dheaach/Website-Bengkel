-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2019 at 12:48 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'dhea', '123', 'admin'),
(2, 'wati', '098', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(10) NOT NULL,
  `id_toko` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `satuan` varchar(5) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` smallint(6) NOT NULL,
  `kategori` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_toko`, `nama`, `satuan`, `jenis`, `harga`, `stok`, `kategori`) VALUES
('1266', '', 'gerigi', 'biji', 'sparepart', 12000, 12, 4),
('2223', '', 'aki', 'buah', 'bahan', 120000000, 15, 7),
('566', '', 'av\\c kirai', 'biji', 'barang', 12000000, 12, 3),
('6655', '', 'pembenaran motor', 'tenag', 'jasa', 120000000, 0, 6),
('67', '', 'obeng', 'biji', 'spare part', 5000000, 0, 5),
('99898', '', 'pelek', 'biji', 'aksesoris', 98000, 45, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `hp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `alamat`, `kota`, `kodepos`, `hp`) VALUES
('cs001', 'alan', 'saxophone', 'malang', '65464', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `detilbeli`
--

CREATE TABLE `detilbeli` (
  `detil` int(11) NOT NULL,
  `idbeli` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `hargad` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `detilbeli`
--
DELIMITER $$
CREATE TRIGGER `tambahstok` AFTER INSERT ON `detilbeli` FOR EACH ROW BEGIN
	UPDATE barang set stok=stok+new.qty WHERE id = new.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detiljual`
--

CREATE TABLE `detiljual` (
  `dj` int(11) NOT NULL,
  `idjual` varchar(10) NOT NULL,
  `idbarang` varchar(10) NOT NULL,
  `hargaj` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detiljual`
--

INSERT INTO `detiljual` (`dj`, `idjual`, `idbarang`, `hargaj`, `jumlah`, `subtotal`, `diskon`, `total`) VALUES
(3, '8890', '67', 5000000, 1, 5000000, 0, 5000000);

--
-- Triggers `detiljual`
--
DELIMITER $$
CREATE TRIGGER `krgstok` AFTER INSERT ON `detiljual` FOR EACH ROW BEGIN
	UPDATE barang set stok=stok-new.jumlah WHERE id = new.idbarang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` varchar(10) NOT NULL,
  `nama_staff` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `tlp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_staff`, `alamat`, `kota`, `kodepos`, `tlp`) VALUES
('kas01', 'andin', 'klojen', 'malang', '', '0213695847');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` tinyint(3) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(3, 'A/C'),
(4, 'Spare Part'),
(5, 'Variasi'),
(6, 'Jasa'),
(7, 'Barang');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `faktur` varchar(10) NOT NULL,
  `nilai` int(11) NOT NULL,
  `suplier` varchar(10) NOT NULL,
  `staff` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `tanggal`, `keterangan`, `faktur`, `nilai`, `suplier`, `staff`) VALUES
('32', '2019-06-24 21:04:24', 'swsw', '1212', 0, 'sup1', 'kas01'),
('777', '2019-07-06 08:53:53', 'iiii', '881', 0, 'sup1', 'kas01'),
('d56', '2019-06-20 14:50:41', '3456ghj', 'ertyui', 0, 'sup1', 'kas01'),
('g7', '2019-06-20 14:50:16', 'fghjkl', 'ajdajd2iug', 0, 'sup1', 'kas01');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(10) NOT NULL,
  `tanggal` datetime NOT NULL,
  `idcust` varchar(10) NOT NULL,
  `nomanual` varchar(10) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `nilai` int(11) NOT NULL,
  `staff` varchar(10) NOT NULL,
  `tipekendaraan` varchar(20) NOT NULL,
  `norangka` varchar(25) NOT NULL,
  `nomesin` varchar(25) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `bpkb` varchar(25) NOT NULL,
  `stnk` varchar(25) NOT NULL,
  `keluhan` varchar(255) NOT NULL,
  `jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `tanggal`, `idcust`, `nomanual`, `keterangan`, `nilai`, `staff`, `tipekendaraan`, `norangka`, `nomesin`, `nopol`, `bpkb`, `stnk`, `keluhan`, `jenis`) VALUES
('12', '2019-06-26 11:02:57', 'cs001', '123', 'lunas', 0, 'kas01', '', '', '', '', '', '', '', 'langsung'),
('3', '2019-06-24 21:04:54', 'cs001', '33', 'sww', 0, 'kas01', '', '', '', '', '', '', '', 'langsung'),
('54', '2019-06-24 21:05:22', 'cs001', '767', 'juh', 0, 'kas01', '7', '7', '7', '7', '7', '7', 'kjkh', 'servis'),
('67', '2019-06-26 11:02:15', 'cs001', '90', 'lunsa', 0, 'kas01', '', '', '', '', '', '', '', 'langsung'),
('8890', '2019-06-25 15:02:54', 'cs001', '90', 'lunas', 5000000, 'kas01', '', '', '', '', '', '', '', 'langsung');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `kodepos` varchar(10) DEFAULT NULL,
  `tlp` varchar(30) DEFAULT NULL,
  `fax` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `nama`, `alamat`, `kota`, `kodepos`, `tlp`, `fax`) VALUES
('sup1', 'jito', 'arjosari', 'malang', '88786', '098878977', '97877');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`kategori`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detilbeli`
--
ALTER TABLE `detilbeli`
  ADD PRIMARY KEY (`detil`),
  ADD KEY `id_beli` (`idbeli`),
  ADD KEY `id_barang` (`idbarang`);

--
-- Indexes for table `detiljual`
--
ALTER TABLE `detiljual`
  ADD PRIMARY KEY (`dj`),
  ADD UNIQUE KEY `id_barang` (`idbarang`) USING BTREE,
  ADD KEY `id_jual` (`idjual`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_suplier` (`suplier`),
  ADD KEY `id_staf` (`staff`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`idcust`),
  ADD KEY `id_staff` (`staff`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detilbeli`
--
ALTER TABLE `detilbeli`
  MODIFY `detil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detiljual`
--
ALTER TABLE `detiljual`
  MODIFY `dj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detilbeli`
--
ALTER TABLE `detilbeli`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_beli` FOREIGN KEY (`idbeli`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detiljual`
--
ALTER TABLE `detiljual`
  ADD CONSTRAINT `detiljual_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_jual` FOREIGN KEY (`idjual`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `id_staf` FOREIGN KEY (`staff`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `id_suplier` FOREIGN KEY (`suplier`) REFERENCES `suplier` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `id_customer` FOREIGN KEY (`idcust`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `id_staff` FOREIGN KEY (`staff`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
