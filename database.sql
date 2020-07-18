-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_cvmitra
CREATE DATABASE IF NOT EXISTS `db_cvmitra` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_cvmitra`;

-- Dumping structure for table db_cvmitra.bahanbaku
CREATE TABLE IF NOT EXISTS `bahanbaku` (
  `id_bahanbaku` varchar(8) NOT NULL,
  `nama_bahanbaku` varchar(20) NOT NULL,
  `satuan_bahanbaku` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `id_jenisbahanbaku` varchar(2) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_bahanbaku`),
  KEY `id_jenisbahanbaku` (`id_jenisbahanbaku`),
  KEY `id_supplier` (`id_supplier`),
  CONSTRAINT `bahanbaku_ibfk_1` FOREIGN KEY (`id_jenisbahanbaku`) REFERENCES `jenisbahanbaku` (`id_jenisbahanbaku`),
  CONSTRAINT `bahanbaku_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.bahanbaku: ~0 rows (approximately)
/*!40000 ALTER TABLE `bahanbaku` DISABLE KEYS */;
/*!40000 ALTER TABLE `bahanbaku` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(10) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_cvmitra.barang: ~0 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_distribusi
CREATE TABLE IF NOT EXISTS `detail_distribusi` (
  `id_detail_distribusi` int(11) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `kota` varchar(10) NOT NULL,
  `id_distribusi` int(11) DEFAULT NULL,
  `id_produk` varchar(10) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_detail_distribusi`),
  KEY `id_distribusi` (`id_distribusi`),
  KEY `id_produk` (`id_produk`),
  KEY `no_polisi` (`no_polisi`),
  CONSTRAINT `detail_distribusi_ibfk_1` FOREIGN KEY (`id_distribusi`) REFERENCES `distribusi` (`id_distribusi`),
  CONSTRAINT `detail_distribusi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `detail_distribusi_ibfk_3` FOREIGN KEY (`no_polisi`) REFERENCES `kendaraan` (`no_polisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_distribusi: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_distribusi` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_distribusi` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_pengadaan
CREATE TABLE IF NOT EXISTS `detail_pengadaan` (
  `id_detail_pengadaan` int(11) NOT NULL,
  `id_pengadaan` int(11) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  `qty` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_detail_pengadaan`),
  KEY `id_pengadaan` (`id_pengadaan`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `detail_pengadaan_ibfk_1` FOREIGN KEY (`id_pengadaan`) REFERENCES `pengadaan` (`id_pengadaan`),
  CONSTRAINT `detail_pengadaan_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_pengadaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_pengadaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengadaan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_persediaan
CREATE TABLE IF NOT EXISTS `detail_persediaan` (
  `id_detail_persediaan` int(11) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_persediaan`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  KEY `id_persediaan` (`id_persediaan`),
  CONSTRAINT `detail_persediaan_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `detail_persediaan_ibfk_2` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_persediaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_persediaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_persediaan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_pesanbahanbaku
CREATE TABLE IF NOT EXISTS `detail_pesanbahanbaku` (
  `id_detail_pesanbahanbaku` int(11) NOT NULL,
  `total` varchar(20) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `id_pesanbahanbaku` int(11) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  PRIMARY KEY (`id_detail_pesanbahanbaku`),
  KEY `id_pesanbahanbaku` (`id_pesanbahanbaku`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `detail_pesanbahanbaku_ibfk_1` FOREIGN KEY (`id_pesanbahanbaku`) REFERENCES `pesanbahanbaku` (`id_pesanbahanbaku`),
  CONSTRAINT `detail_pesanbahanbaku_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_pesanbahanbaku: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_pesanbahanbaku` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pesanbahanbaku` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_pesanproduk
CREATE TABLE IF NOT EXISTS `detail_pesanproduk` (
  `id_detail_pesanproduk` int(11) NOT NULL,
  `jenis_insole` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_pesanproduk` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  PRIMARY KEY (`id_detail_pesanproduk`),
  KEY `id_pesanproduk` (`id_pesanproduk`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `detail_pesanproduk_ibfk_1` FOREIGN KEY (`id_pesanproduk`) REFERENCES `pesanproduk` (`id_pesanproduk`),
  CONSTRAINT `detail_pesanproduk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_pesanproduk: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_pesanproduk` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pesanproduk` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_produk
CREATE TABLE IF NOT EXISTS `detail_produk` (
  `id_detail_produk` int(11) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  PRIMARY KEY (`id_detail_produk`),
  KEY `id_produk` (`id_produk`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `detail_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `detail_produk_ibfk_2` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_produk: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_produk` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_produk` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.detail_produksi
CREATE TABLE IF NOT EXISTS `detail_produksi` (
  `id_detail_produksi` int(11) NOT NULL,
  `id_pesanproduk` int(11) NOT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  PRIMARY KEY (`id_detail_produksi`),
  KEY `id_pesanproduk` (`id_pesanproduk`),
  KEY `id_produk` (`id_produk`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `detail_produksi_ibfk_1` FOREIGN KEY (`id_pesanproduk`) REFERENCES `pesanproduk` (`id_pesanproduk`),
  CONSTRAINT `detail_produksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  CONSTRAINT `detail_produksi_ibfk_3` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.detail_produksi: ~0 rows (approximately)
/*!40000 ALTER TABLE `detail_produksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_produksi` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.distribusi
CREATE TABLE IF NOT EXISTS `distribusi` (
  `id_distribusi` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_customer` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_distribusi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.distribusi: ~0 rows (approximately)
/*!40000 ALTER TABLE `distribusi` DISABLE KEYS */;
/*!40000 ALTER TABLE `distribusi` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.jenisbahanbaku
CREATE TABLE IF NOT EXISTS `jenisbahanbaku` (
  `id_jenisbahanbaku` varchar(2) NOT NULL,
  `nama_jenisbahanbaku` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jenisbahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.jenisbahanbaku: ~0 rows (approximately)
/*!40000 ALTER TABLE `jenisbahanbaku` DISABLE KEYS */;
INSERT INTO `jenisbahanbaku` (`id_jenisbahanbaku`, `nama_jenisbahanbaku`) VALUES
	('', 'Karet B');
/*!40000 ALTER TABLE `jenisbahanbaku` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.jenisproduk
CREATE TABLE IF NOT EXISTS `jenisproduk` (
  `id_jenisproduk` varchar(2) NOT NULL,
  `keterangan` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_jenisproduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.jenisproduk: ~0 rows (approximately)
/*!40000 ALTER TABLE `jenisproduk` DISABLE KEYS */;
/*!40000 ALTER TABLE `jenisproduk` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.kendaraan
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `no_polisi` varchar(12) NOT NULL,
  `jenis` varchar(10) NOT NULL,
  `kapasitas` varchar(5) NOT NULL,
  PRIMARY KEY (`no_polisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.kendaraan: ~0 rows (approximately)
/*!40000 ALTER TABLE `kendaraan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kendaraan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.pengadaan
CREATE TABLE IF NOT EXISTS `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `periode` varchar(10) NOT NULL,
  `status_pengiriman` enum('DIPROSES','DALAM PERJALANAN','SAMPAI') NOT NULL,
  `id_supplier` int(11) NOT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `id_supplier` (`id_supplier`),
  CONSTRAINT `pengadaan_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.pengadaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `pengadaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengadaan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `periode` varchar(10) NOT NULL,
  `status` enum('SELESAI','TIDAK SELESAI') NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.penjualan: ~0 rows (approximately)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.peramalan
CREATE TABLE IF NOT EXISTS `peramalan` (
  `id_peramalan` int(11) NOT NULL,
  `bulan` varchar(30) NOT NULL,
  `hasil` varchar(10) NOT NULL,
  `id_bahanbaku` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_peramalan`),
  KEY `peramalan_ibfk_1` (`id_bahanbaku`),
  CONSTRAINT `peramalan_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.peramalan: ~0 rows (approximately)
/*!40000 ALTER TABLE `peramalan` DISABLE KEYS */;
/*!40000 ALTER TABLE `peramalan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.persediaan
CREATE TABLE IF NOT EXISTS `persediaan` (
  `id_persediaan` int(11) NOT NULL,
  `total_stok` int(11) NOT NULL,
  `safety_stok` int(11) NOT NULL,
  `id_bahanbaku` varchar(8) NOT NULL,
  PRIMARY KEY (`id_persediaan`),
  KEY `id_bahanbaku` (`id_bahanbaku`),
  CONSTRAINT `persediaan_ibfk_1` FOREIGN KEY (`id_bahanbaku`) REFERENCES `bahanbaku` (`id_bahanbaku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.persediaan: ~0 rows (approximately)
/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.pesanbahanbaku
CREATE TABLE IF NOT EXISTS `pesanbahanbaku` (
  `id_pesanbahanbaku` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `id_peramalan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_pesanbahanbaku`),
  KEY `id_peramalan` (`id_peramalan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pesanbahanbaku_ibfk_1` FOREIGN KEY (`id_peramalan`) REFERENCES `peramalan` (`id_peramalan`),
  CONSTRAINT `pesanbahanbaku_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.pesanbahanbaku: ~0 rows (approximately)
/*!40000 ALTER TABLE `pesanbahanbaku` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanbahanbaku` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.pesanproduk
CREATE TABLE IF NOT EXISTS `pesanproduk` (
  `id_pesanproduk` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_customer` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_pesanproduk`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pesanproduk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.pesanproduk: ~0 rows (approximately)
/*!40000 ALTER TABLE `pesanproduk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanproduk` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(20) NOT NULL,
  `satuan_produk` varchar(10) NOT NULL,
  `id_jenisproduk` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_jenisproduk` (`id_jenisproduk`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_jenisproduk`) REFERENCES `jenisproduk` (`id_jenisproduk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_cvmitra.produk: ~0 rows (approximately)
/*!40000 ALTER TABLE `produk` DISABLE KEYS */;
/*!40000 ALTER TABLE `produk` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(40) NOT NULL,
  `alamat_supplier` varchar(50) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_cvmitra.supplier: ~0 rows (approximately)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp`, `email`) VALUES
	(2, 'PT.Putra Timur prima spon tangerang', 'Tangerang', 21000000, 'ya@mail.com'),
	(3, 'PT INT', 'disitu', 21345123, 'asu@mail.com');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table db_cvmitra.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_cvmitra.user: ~5 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `email`, `hak_akses`, `alamat`, `jabatan`) VALUES
	(1, 'Asep', 'admin', '1111', 'iqbal@email.com', 'admin', NULL, 'Kepala Gudang'),
	(2, 'Kamal', 'kamal', '2222', 'kamal@kamal.com', 'produksi', NULL, 'Manajer Produksi'),
	(4, 'Wahyu', 'wahyu', '3333', 'asep@mail.com', 'marketing', NULL, 'Manajer Marketing'),
	(6, 'Engkos', 'engkos', '5555', 'engkos@ongkos.com', 'distribusi', 'disitu', 'Manajer Distribusi');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
