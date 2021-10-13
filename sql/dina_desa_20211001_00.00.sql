# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: dina_desa
# Generation Time: 2021-09-30 17:00:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verify_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table agama
# ------------------------------------------------------------

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `id_agama` int(5) NOT NULL AUTO_INCREMENT,
  `agama` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `agama` WRITE;
/*!40000 ALTER TABLE `agama` DISABLE KEYS */;

INSERT INTO `agama` (`id_agama`, `agama`, `deleted_at`)
VALUES
	(1,'islam',NULL),
	(2,'kristen',NULL),
	(3,'budha',NULL),
	(4,'hindu',NULL);

/*!40000 ALTER TABLE `agama` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table artikel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `artikel`;

CREATE TABLE `artikel` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(25) NOT NULL DEFAULT 'default.jpg',
  `url` varchar(50) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `artikel` WRITE;
/*!40000 ALTER TABLE `artikel` DISABLE KEYS */;

INSERT INTO `artikel` (`id`, `title`, `content`, `image`, `url`, `date_created`)
VALUES
	(10,'Karnaval Desa Sejomulyo','<p>Karnaval Desa Sejomulyo tahun 2019 dilaksanakan pada hari minggu tanggal 1 April 2021</p><p><br></p>','karnaval.jpg','Karnaval-Desa-Sejomulyo_ID10',1632727828);

/*!40000 ALTER TABLE `artikel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bansos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bansos`;

CREATE TABLE `bansos` (
  `id_bansos` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_bantuan` varchar(25) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_bansos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table bantuan_sosial
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bantuan_sosial`;

CREATE TABLE `bantuan_sosial` (
  `id_bantuan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `id_bansos` int(11) NOT NULL,
  PRIMARY KEY (`id_bantuan`),
  KEY `id` (`id`),
  KEY `id_bansos` (`id_bansos`),
  CONSTRAINT `bantuan_sosial_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `bantuan_sosial_ibfk_2` FOREIGN KEY (`id_bansos`) REFERENCES `bansos` (`id_bansos`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table download
# ------------------------------------------------------------

DROP TABLE IF EXISTS `download`;

CREATE TABLE `download` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `berkas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table dusun
# ------------------------------------------------------------

DROP TABLE IF EXISTS `dusun`;

CREATE TABLE `dusun` (
  `id_dusun` int(5) NOT NULL AUTO_INCREMENT,
  `dusun` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dusun`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `dusun` WRITE;
/*!40000 ALTER TABLE `dusun` DISABLE KEYS */;

INSERT INTO `dusun` (`id_dusun`, `dusun`, `deleted_at`)
VALUES
	(1,'Garuwan','2021-09-30 22:53:31'),
	(3,'Gadungan',NULL),
	(4,'Babatan',NULL);

/*!40000 ALTER TABLE `dusun` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table foto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `foto`;

CREATE TABLE `foto` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(25) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `foto` WRITE;
/*!40000 ALTER TABLE `foto` DISABLE KEYS */;

INSERT INTO `foto` (`id`, `title`, `content`, `image`, `date_created`)
VALUES
	(3,'Edukasi Poster Covid-19 Kepada Masyarakat Desa Sejomulyo','Sosialisasi terkait poster covid-19 kepada anak-anak dan warga Desa Sejomulyo, Kecamatan Juwana, Kabupaten Pati','3.jpg',1618758441);

/*!40000 ALTER TABLE `foto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table halaman_web
# ------------------------------------------------------------

DROP TABLE IF EXISTS `halaman_web`;

CREATE TABLE `halaman_web` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `slug` varchar(45) NOT NULL,
  `judul_halaman` varchar(50) NOT NULL,
  `isi_halaman` text NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `halaman_web` WRITE;
/*!40000 ALTER TABLE `halaman_web` DISABLE KEYS */;

INSERT INTO `halaman_web` (`id`, `slug`, `judul_halaman`, `isi_halaman`, `level`)
VALUES
	(1,'kontak','Kontak','<div xss=\"removed\"><p xss=removed>Kontak Kami</p><p xss=removed>Kantor Desa Sejomulyo Desa Sejomulyo, Kecamatan Juwana, Kabupaten Pati.</p><p xss=removed>Kode Pos 59185. Indonesia</p><p xss=removed>Jika ada kritik & saran atau pertanyaan silahkan menghubungi kami pada kontak dibawah ini.</p><p xss=removed>No. Telp/WA : 081393048412</p><p xss=removed>Gmail : sejomulyomaju@gmail.com</p><p xss=removed>Instagram :sejomulyo_maju</p><p xss=removed>Youtube : Sejomulyo maju</p></div>','top');

/*!40000 ALTER TABLE `halaman_web` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jabatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id_jabatan` int(5) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(25) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `url` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;

INSERT INTO `menu` (`id`, `title`, `url`, `icon`, `is_active`)
VALUES
	(5,'Dashboard','admin/dashboard','glyphicon glyphicon-home',1),
	(11,'Download','admin/download','glyphicon glyphicon-save',1),
	(57,'Admin','admin/admin','glyphicon glyphicon-lock',1),
	(58,'Pengaturan Menu','admin/menu','glyphicon glyphicon-wrench',1),
	(60,'Profil','admin/menu/#','glyphicon glyphicon-info-sign',1),
	(62,'Fasilitas Layanan Desa','admin/menu/#','glyphicon glyphicon-picture',1),
	(64,'Data Penduduk','admin/penduduk','glyphicon glyphicon-user',1),
	(65,'Pustaka Kependudukan','admin/menu/#','glyphicon glyphicon-list',1),
	(66,'Berita','admin/artikel','glyphicon glyphicon-bullhorn',1),
	(69,'Surat','admin/menu/#','glyphicon glyphicon-envelope',1),
	(70,'Profil Pemerintah Desa','admin/profil/pemdes','glyphicon glyphicon-lock',60),
	(71,'Profil BPD','admin/profil/bpd','glyphicon glyphicon-lock',60),
	(72,'Sejarah Desa','admin/profil/sejarah','glyphicon glyphicon-lock',60),
	(73,'Visi Misi','admin/profil/visimisi','glyphicon glyphicon-lock',60),
	(74,'Potensi Desa','admin/profil/potensi','glyphicon glyphicon-lock',60),
	(75,'Profil Karang Taruna','admin/profil/karangtaruna','glyphicon glyphicon-lock',60),
	(76,'Profil PKK','admin/profil/pkk','glyphicon glyphicon-lock',60),
	(77,'Profil LPMD','admin/profil/lpmd','glyphicon glyphicon-lock',60),
	(78,'Profil KPMD','admin/profil/kpmd','glyphicon glyphicon-lock',60),
	(79,'Foto','admin/foto','glyphicon glyphicon-lock',62),
	(80,'KK, KTP &amp; Akta kelahi','admin/profil/ktp','glyphicon glyphicon-lock',62),
	(81,'Pelayanan Surat','admin/profil/infosurat','glyphicon glyphicon-lock',62),
	(82,'Data Lembaga Desa','admin/pemerintah_desa','glyphicon glyphicon-user',1),
	(88,'Pendidikan','admin/pendidikan','glyphicon glyphicon-lock',65),
	(89,'Pekerjaan','admin/pekerjaan','glyphicon glyphicon-lock',65),
	(90,'Agama','admin/agama','glyphicon glyphicon-lock',65),
	(102,'Data Bantuan Sosial','admin/bantuan_sosial','glyphicon glyphicon-lock',1),
	(111,'Permohonan Surat','admin/permohonan_surat','glyphicon glyphicon-lock',69),
	(112,'Data Surat','admin/surat','glyphicon glyphicon-lock',14),
	(115,'Halaman Web','admin/halaman-web','glyphicon glyphicon-home',58),
	(117,'List Menu Admin','admin/menu','glyphicon glyphicon-wrenc',58),
	(120,'Surat Keterangan','admin/surat','glyphicon glyphicon-home',69),
	(122,'Profil Desa','admin/profil/desa','glyphicon glyphicon-info-',60),
	(123,'Bantuan Sosial','admin/bansos','glyphicon glyphicon-lock',65),
	(124,'RT','admin/rt','glyphicon glyphicon-lock',65),
	(125,'dusun','admin/dusun','glyphicon glyphicon-lock',65),
	(126,'Jabatan','admin/jabatan','glyphicon glyphicon-lock',65);

/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pekerjaan`;

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(5) NOT NULL AUTO_INCREMENT,
  `jenis_pekerjaan` varchar(25) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pekerjaan` WRITE;
/*!40000 ALTER TABLE `pekerjaan` DISABLE KEYS */;

INSERT INTO `pekerjaan` (`id_pekerjaan`, `jenis_pekerjaan`, `deleted_at`)
VALUES
	(2,'Wiraswasta',NULL),
	(4,'Pelajar',NULL);

/*!40000 ALTER TABLE `pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pemerintah_desa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pemerintah_desa`;

CREATE TABLE `pemerintah_desa` (
  `id_pemdes` int(5) NOT NULL AUTO_INCREMENT,
  `id` int(5) NOT NULL,
  `id_jabatan` int(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `no_sk_angkat` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pemdes`),
  KEY `id` (`id`),
  KEY `id_jabatan` (`id_jabatan`),
  CONSTRAINT `pemerintah_desa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `penduduk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pemerintah_desa_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pendidikan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pendidikan`;

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(5) NOT NULL AUTO_INCREMENT,
  `tingkat_pendidikan` varchar(25) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pendidikan` WRITE;
/*!40000 ALTER TABLE `pendidikan` DISABLE KEYS */;

INSERT INTO `pendidikan` (`id_pendidikan`, `tingkat_pendidikan`, `deleted_at`)
VALUES
	(1,'Tidak Lulus SD',NULL),
	(2,'SD',NULL),
	(3,'SMP',NULL),
	(4,'SMA',NULL);

/*!40000 ALTER TABLE `pendidikan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table penduduk
# ------------------------------------------------------------

DROP TABLE IF EXISTS `penduduk`;

CREATE TABLE `penduduk` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nik` varchar(45) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `gender` enum('Pria','Wanita') DEFAULT NULL,
  `usia` int(5) DEFAULT NULL,
  `id_rt` int(5) DEFAULT NULL,
  `id_dusun` int(5) DEFAULT NULL,
  `id_pendidikan` int(5) DEFAULT NULL,
  `id_pekerjaan` int(5) DEFAULT NULL,
  `id_agama` int(5) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_agama` (`id_agama`),
  KEY `id_pekerjaan` (`id_pekerjaan`),
  KEY `id_pendidikan` (`id_pendidikan`),
  KEY `id_rt` (`id_rt`),
  KEY `id_dusun` (`id_dusun`),
  CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penduduk_ibfk_2` FOREIGN KEY (`id_pekerjaan`) REFERENCES `pekerjaan` (`id_pekerjaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penduduk_ibfk_3` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penduduk_ibfk_4` FOREIGN KEY (`id_rt`) REFERENCES `rt` (`id_rt`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `penduduk_ibfk_5` FOREIGN KEY (`id_dusun`) REFERENCES `dusun` (`id_dusun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table permohonan_surat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permohonan_surat`;

CREATE TABLE `permohonan_surat` (
  `id_surat_permohonan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `kewarganegaraan` varchar(45) DEFAULT NULL,
  `agama` varchar(45) DEFAULT NULL,
  `pekerjaan` varchar(45) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nik` varchar(45) DEFAULT NULL,
  `keperluan` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `nomer` int(11) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_surat_permohonan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table profil
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profil`;

CREATE TABLE `profil` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `profil` text NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;

INSERT INTO `profil` (`id`, `judul`, `profil`, `date_created`)
VALUES
	(1,'Profil Desa Sejomulyo','<p><b>Letak Geografis Desa Sejomulyo Kecamata Juwana Kabupaten Pati   </b></p><p xss=\"removed\">        Berdasarkan letak geografis wilayah, Desa Sejomulyo terletak di \r\nKecamatan Juwana Pemerintah Pati. Desa ini merupakan desa yang \r\nstrategis berada di sebelah alun-alun Juwana, dan diapit antara jalan \r\nraya Pati-Rembang, dan Pati-Blora, Pemerintahan Kecamatan \r\nJuwana yang begitu ramai dan juga sebagai Desa yang banyak \r\npenduduknya. Jarak tempuh desa ini bisa ditempuh dengan kendaraan \r\nkurang lebih 8 menit dari alun-alun Juwana.</p><p xss=\"removed\">        Desa Sejomulyo merupakan sebuah desa yang berada di \r\nKecamatan Juwana Kabupaten Pati, Jawa Tengah. Secara \r\nadministratif Desa Sejomulyo dibagi menjadi 3 RW dan 19 RT. \r\nBagian timur berbatasan langsung dengan Desa Bringin, sebelah \r\nUtara Desa Tluwah, sebelah Barat Mintomulyo, sebelah Sekatan \r\nberbatasan dengan Desa Batur. Terletak sekitar 4 km sebelah selatan \r\nalun-alun Juwana atau 15 km dari pusat pemerintahan Kota, sekitar \r\n90 km dari Ibu kota Profinsi dan sekitar 16 km dari Ibu Kota \r\nKabupaten.</p><p xss=\"removed\"><b>Struktur Kepengurusan Desa Sejomulyo</b></p><p xss=\"removed\">        Struktur kepengurusan Desa terdiri dari Kepala Desa, Sekretaris \r\nDesa, Seksi Desa, Kaur Keuangan, Kaur Umum, kaur Pembangunan, \r\nKaur Kesra, Pelaksana Teknis, Keamanan, Pertanian Pengairan, \r\nSosial agana dan Kesra, kepala Dusun. </p><p xss=\"removed\"><b>Batas Wilayah Desa Sejomulyo</b></p><p>        Batas wilayah Sejomulyo Juwana Pati\r\nSebelah Utara : Desa Tluwah Desa Doropayung \r\nSebelah selatan : Desa Mulyo Desa Jakenan\r\nSebelah timur : Desa Bringin Desa Karangrejo\r\nSebelah barat : Desa Margomulyo Desa Bungasrejo<br></p>',1618751496),
	(2,'Profil Pemerintah Desa Sejomulyo','<div xss=\"removed\">    <span xss=\"removed\">Pemerintah Desa</span><span xss=\"removed\"> atau disebut juga </span><span xss=\"removed\">Pemdes </span><span xss=\"removed\">adalah lembaga pemerintah yang bertugas mengelola wilayah tingkat desa. Lembaga ini diatur melalui Peraturan Pemerintah No. 72 Tahun </span><a href=\"https://id.wikipedia.org/wiki/2005\" title=\"2005\" xss=\"removed\"><font color=\"#000000\">2005</font></a><span xss=\"removed\"> tentang pemerintahan desa yang diterbitkan untuk melaksanakan ketentuan pasal 216 ayat (1) Undang Undang Nomor 32 Tahun 2004 tentang pemerintahan daerah. Pemimpin pemerintah desa, seperti tertuang dalam paragraf 2 pasal 14 ayat (1), adalah kepala desa yang bertugas menyelenggarakan urusan pemerintahan, pembangunan, dan kemasyarakatan.</span><br></div><div xss=\"removed\"><p xss=\"removed\">Kepala desa mempunyai wewenang : aaa</p><ul xss=\"removed\"><li xss=\"removed\">Memimpin penyelenggaraan pemerintahan berdasarkan kebijakan yang ditetapkan bersama Badan Perwakilan Desa (BPD).</li><li xss=\"removed\">Mengajukan rancangan peraturan desa.</li><li xss=\"removed\">Menetapkan peraturan desa yang telah mendapat persetujuan bersama BPD.</li><li xss=\"removed\">Menyusun dan mengajukan rancangan peraturan desa mengenai Anggaran Pendapatan dan Belanja Desa (APBDesa) untuk dibahas dan ditetapkan bersama BPD.</li><li xss=\"removed\">Membina kehidupan masyarakat desa.</li><li xss=\"removed\">Membina perekonomian desa.</li><li xss=\"removed\">Mengoordinasikan pembangunan desa secara partisipatif.</li><li xss=\"removed\">Mewakili desanya di dalam dan di luar pengadilan dan dapat menunjuk kuasa hukum untuk mewakili sesuai dengan peraturan perundang undangan.</li><li xss=\"removed\">Melaksanakan wewenang lain sesuai dengan peraturan perundang undangan.</li></ul><p xss=\"removed\">Tugas :<br></p><ul xss=\"removed\"><li xss=\"removed\">Memegang teguh dan mengamalkan Pancasila, melaksanakan UUD <a href=\"https://id.wikipedia.org/wiki/1945\" title=\"1945\">1945</a> serta mempertahankan dan memelihara keutuhan Negara Kesatuan Republik Indonesia.</li><li xss=\"removed\">Meningkatkan kesejahteraan rakyat.</li><li xss=\"removed\">Memelihara ketenteraman dan ketertiban masyarakat.</li><li xss=\"removed\">Melaksanakan kehidupan demokrasi.</li><li xss=\"removed\">Melaksanakan prinsip tata pemerintahan desa yang bersih dan bebas dari kolusi, korupsi dan nepotisme.</li><li xss=\"removed\">Menjalin hubungan kerja dengan seluruh mitra kerja pemerintahan desa.</li><li xss=\"removed\">Menaati dan menegakkan se luruh peraturan perundang undangan.</li><li xss=\"removed\">Menyelenggarakan administrasi pemerintahan yang baik.</li><li xss=\"removed\">Melaksanakan dan mempertanggungjawabkan pengelolaan keuangan desa.</li><li xss=\"removed\">Melaksanakan urusan yang menjadi kewenangan desa.</li><li xss=\"removed\">Mendamaikan perselisihan masyarakat di desa.</li><li xss=\"removed\">Mengembangkan pendapatan masyarakat dan desa.</li><li xss=\"removed\">Membina, mengayomi dan melestarikan nilai nilai sosial budaya dan adat istiadat.</li><li xss=\"removed\">Memberdayakan masyarakat dan kelembagaan di desa.</li><li xss=\"removed\">Mengembangkan potensi sumber daya alam dan melestarikan lingkungan hidup.</li></ul><p xss=\"removed\"><br></p><p xss=\"removed\">Perangkat Desa :</p><p xss=\"removed\">Dalam struktur organisasi desa, Kepala Desa juga dibantu oleh perangkat desa yang terdiri atas:</p><ul xss=\"removed\"><li xss=\"removed\">Carik (Sekdes/Sekretaris) = adalah pelaksana sekretaris desa</li><li xss=\"removed\">Kebayan = tugasnya merupakan mengurusi data-data desa</li><li xss=\"removed\">Lado = tugasnya merupakan dalam hal irigasi</li><li xss=\"removed\">Modin = tugasnya merupakan dalam hal keagamaan</li><li xss=\"removed\">Petengan = merupakan komandan keamanan alias komandan hansip</li><li xss=\"removed\">Ketua <a href=\"https://id.wikipedia.org/wiki/BUMDes\" class=\"mw-redirect\" title=\"BUMDes\"><font color=\"#000000\">BUMDes</font></a> = yang mengurusi Badan Usaha Milik Desa</li><li xss=\"removed\"><font color=\"#000000\"><a href=\"https://id.wikipedia.org/wiki/Kamituo\" class=\"mw-redirect\" title=\"Kamituo\"><font color=\"#000000\">Kamituo</font></a> = yang mengurusi bengkok dan tanah.</font></li></ul><p xss=\"removed\"><br></p><p xss=\"removed\">TUPOKSI SEKRETARIS DESA</p><p xss=\"removed\">Sekretaris Desa bertugas membantu Kepala Desa dalam bidang administrasi pemerintahan.</p><p xss=\"removed\">Selanjutnya, Sekretaris Desa dalam melaksanakan tugas pemerintahan mempunyai fungsi sebagai berikut:</p><ol xss=\"removed\"><li xss=\"removed\">Melaksanakan urusan ketatausahaan seperti tata naskah, administrasi surat menyurat, arsip, dan ekspedisi.</li><li xss=\"removed\">Melaksanakan urusan umum seperti penataan administrasi perangkat desa, penyediaan prasarana perangkat desa dan kantor, penyiapan rapat, pengadministrasian aset, inventarisasi, perjalanan dinas, dan pelayanan umum.</li><li xss=\"removed\">Melaksanakan urusan keuangan seperti pengurusan administrasi keuangan, administrasi sumber-sumber pendapatan dan pengeluaran, verifikasi administrasi keuangan, dan admnistrasi penghasilan Kepala Desa, Perangkat Desa, Badan Permusyawaratan Desa (BPD), dan lembaga pemerintahan desa lainnya.</li><li xss=\"removed\">Melaksanakan urusan perencanaan seperti menyusun rencana anggaran pendapatan dan belanja desa (APBDes), menginventarisir data-data dalam rangka pembangunan, melakukan monitoring dan evaluasi program, serta penyusunan laporan.</li></ol><p xss=\"removed\"><br></p><p xss=\"removed\">TUPOKSI KASI PEMERINTAHAN</p><h2 xss=\"removed\"><span xss=\"removed\">Dilihat dari Tugas sebagai Pelaksana Operasional ?</span></h2><p xss=\"removed\">Jika dilihat dari pelaksana tugas operasional sendiri, seperti yang diatur dalam Permendagri 84/2015 pasal 9 ayat 3 huruf (a), Kepala Seksi Pemerintahan Desa memiliki tugas sebagai berikut :</p><ol xss=\"removed\"><li xss=\"removed\">Melaksanakan manajemen tata praja Pemerintahan,</li><li xss=\"removed\">Menyusun rancangan regulasi/peraturan desa,</li><li xss=\"removed\">Pembinaan yang berkaitan masalah pertanahan,</li><li xss=\"removed\">Pembinaan masalah ketentraman dan ketertiban masyarakat desa,</li><li xss=\"removed\">Pelaksanaan upaya perlindungan masyarakat desa,</li><li xss=\"removed\">Pelaksanaan upaya perlindungan kependudukan,</li><li xss=\"removed\">Penataan dan pengelolaan wilayah/dusun, serta</li><li xss=\"removed\">Pendataan dan pengelolaan profil desa.</li></ol><h2 xss=\"removed\"><span xss=\"removed\">Dilihat dari Tugas sebagai Pelaksana PPKD ?</span></h2><p xss=\"removed\">PPKD sendiri merupakan singkatan dari Pelaksana Pengelolaan Keuangan Desa.</p><p xss=\"removed\">Jadi. jika dilihat dari Permendagri 20/2018 sendiri, tentang tugas Kasi Pemerintahan Desa 2020 ialah sebagai berikut :</p><ol xss=\"removed\"><li xss=\"removed\">Melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya,</li><li xss=\"removed\">Melaksanakan anggaran kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Mengendalikan kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Menyusun DPA, DPPA, dan DPAL sesuai bidang tugasnya,</li><li xss=\"removed\">Menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang tugasnya,</li><li xss=\"removed\">Menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggungjawaban pelaksanaan APB Desa.</li></ol><hr xss=\"removed\"><h3 xss=\"removed\"><span xss=\"removed\"># TUPOKSI KASI KESEJAHTERAAN</span></h3><h3 xss=\"removed\">Tugas sebagai Pelaksana Operasional</h3><p xss=\"removed\">Jika dilihat dari pelaksana tugas operasional sendiri, seperti yang diatur dalam Permendagri 84/2015 pasal 9 ayat 3 huruf (b), Kepala Seksi Kesejahteraan Desa memiliki tugas sebagai berikut :</p><ol xss=\"removed\"><li xss=\"removed\"><span class=\"amp-wp-cc68ddc\" data-amp-original-style=\"color: #ff0000;\">Melaksanakan pembangunan sarana prasarana perdesaan,</span></li><li xss=\"removed\"><span class=\"amp-wp-cc68ddc\" data-amp-original-style=\"color: #ff0000;\">Melaksanakan pembangunan bidang pendidikan,</span></li><li xss=\"removed\"><span class=\"amp-wp-cc68ddc\" data-amp-original-style=\"color: #ff0000;\">Melaksanakan pembangunan bidang kesehatan,</span></li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang budaya,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang ekonomi,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang politik,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang lingkungan hidup,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang pemberdayaan keluarga,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang pemuda,</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang olahraga, dan</li><li xss=\"removed\">Tugas sosialisasi serta motivasi masyarakat bidang karang taruna.</li></ol><h2 xss=\"removed\"><span xss=\"removed\">Tugas sebagai Pelaksana PPKD ?</span></h2><p xss=\"removed\">Jika dilihat tugas sebagai pelaksana PPKD yang tertuang dalam Permendagri 20/2018 pasal 6 ayat 4 , maka tugas Kasi Kesejahteraan Desa 2020 ialah sebagai berikut :</p><ol xss=\"removed\"><li xss=\"removed\">Melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya,</li><li xss=\"removed\">Melaksanakan anggaran kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Mengendalikan kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Menyusun DPA, DPPA, dan DPAL sesuai bidang tugasnya,</li><li xss=\"removed\">Menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang tugasnya,</li><li xss=\"removed\">Menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggungjawaban pelaksanaan APB Desa.</li></ol><hr xss=\"removed\"><p xss=\"removed\"># TUPOKSI KASI PELAYANAN</p><h3 xss=\"removed\"><span xss=\"removed\">1. Berdasarkan Permendagri 84 Tahun 2015</span></h3><p xss=\"removed\">Ada beberapa poin tugas yang diatur dalam Permendagri 84/2015 tepatnya di pasal 9 ayat (3) huruf (c).</p><p xss=\"removed\">Berikut ini isi tugasnya :</p><ol xss=\"removed\"><li xss=\"removed\">Melaksanakan penyuluhan dan motivasi terhadap pelaksanaan hak dan kewajiban masyarakat desa,</li><li xss=\"removed\">Meningkatkan upaya partisipasi masyarakat,</li><li xss=\"removed\">Melaksanakan pelestarian nilai sosial budaya masyarakat desa,</li><li xss=\"removed\">melaksanakan pelestarian nilai keagamaan masyarakat desa, dan</li><li xss=\"removed\">melaksanakan pelestarian nilai ketenagakerjaan masyarakat Desa.</li></ol><h3 xss=\"removed\">2. Berdasarkan Permendagri 20 Tahun 2018</h3><p xss=\"removed\">Dalam Permendagri 20/2018 sendiri perihal tupoksi Kasi Pelayanan dalam hal pelaksanaan anggran diatur menyatu dengan tugas kaur dan kasi lainya.</p><p xss=\"removed\">Intinya, yang perlu Anda pahami ialah bahwa tugas kaur dan kasi tersebut menyesuaikan dengan bidangnya masing – masing.</p><p xss=\"removed\">Berikut ini tupoksi Kepala Seksi Pelayanan yang terdapat dalam pasal 4 huruf (a) sampai dengan (f) Permendagri nomor 20 tahun 2018 :</p><ul xss=\"removed\"><li xss=\"removed\">Melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya,</li><li xss=\"removed\">Melaksanakan anggaran kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Mengendalikan kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Menyusun DPA, DPPA, dan DPAL sesuai bidang tugasnya,</li><li xss=\"removed\">Menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang tugasnya,</li><li xss=\"removed\">Menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggungjawaban pelaksanaan APB Desa.</li></ul><h3 xss=\"removed\"><span xss=\"removed\">3. Tambahan Berdasarkan <a href=\"https://updesa.com/ppkd/\" target=\"_blank\" rel=\"noopener noreferrer\" xss=\"removed\">Tugas PPKD</a></span></h3><p xss=\"removed\">Berikut beberapa contoh jenis tugas yang biasa ditangani oleh Kasi Pelayanan berdasarkan sub bidangnya :</p><ol xss=\"removed\"><li xss=\"removed\">Penyuluhan dan penyadaran masyarakat tentang kependudukan dan pencatatan sipil,</li><li xss=\"removed\">Penyuluhan dan pelatihan pendidikan bagi masyarakat,</li><li xss=\"removed\">Penyuluhan dan pelatihan bidang kesehatan (untuk masyarakat, tenaga kesehatan, kader kesehatan, dll),</li><li xss=\"removed\">Pembinaan Palang Merah Remaja (PMR) tingkat desa,</li><li xss=\"removed\">Pembinaan dan Pengawasan Upaya Kesehatan Tradisional,</li><li xss=\"removed\">Pelatihan/sosialisasi/penyuluhan/penyadaran tentang lingkungan hidup dan kehutanan,</li><li xss=\"removed\">Pelatihan/penyuluhan/sosialisasi kepada masyarakat di bidang hukum dan pelindungan masyarakat,</li><li xss=\"removed\">Pembinaan group kesenian dan kebudayaan tingkat desa,</li><li xss=\"removed\">Penyelenggaraan pelatihan kepemudaan,</li><li xss=\"removed\">Pembinaan karang taruna/klub kepemudaan/klub olah raga,</li><li xss=\"removed\">Pembinaan Lembaga Adat,</li><li xss=\"removed\">Pembinaan LKMD/LPM/LPMD,</li><li xss=\"removed\">Pembinaan PKK,</li><li xss=\"removed\">Pelatihan pembinaan lembaga kemasyarakatan,</li><li xss=\"removed\">Pelatihan/bimtek/pengenalan tekonologi tepat guna untuk perikanan darat/nelayan,</li><li xss=\"removed\">Pelatihan/bimtek/pengenalan tekonologi tepat guna untuk pertanian/peternakan,</li><li xss=\"removed\">Pelatihan/penyuluhan pemberdayaan perempuan,</li><li xss=\"removed\">Pelatihan/penyuluhan perlindungan anak,</li><li xss=\"removed\">Pelatihan dan penguatan penyandang difabel (penyandang disabilitas),</li><li xss=\"removed\">Pelatihan manajemen pengelolaan Koperasi/ KUD/ UMKM,</li><li xss=\"removed\">Dll sesuai bidang Kasi Pelayanan.</li></ol><hr xss=\"removed\"><p xss=\"removed\"># TUPOKSI KAUR KEUANGAN</p><p xss=\"removed\"> </p><p xss=\"removed\">Ada 2 tugas yang wajib dipahami Kaur Keuangan dalam hal pengelolaan keuangan desa.</p><p xss=\"removed\"> </p><h4 xss=\"removed\"><span xss=\"removed\">#1. Menyusun RAK Desa</span></h4><p xss=\"removed\">Rencana Anggaran Kas Desa atau sering disingkat RAK Desa adalah dokumen yang memuat arus kas masuk dan arus kas keluar yang digunakan untuk mengatur penarikan dana dari rekening kas desa untuk mendanai pengeluaran berdasarkan DPA yang telah disahkan oleh Kepala Desa.</p><p xss=\"removed\"> </p><h4 xss=\"removed\"><span xss=\"removed\">#2. Melakukan Penatausahaan Keuangan Desa</span></h4><hr xss=\"removed\"><p xss=\"removed\"># TUPOKSI KAUR PERENCANAAN</p><h3 xss=\"removed\"><span xss=\"removed\">Berdasarkan Permendagri 84/2015 pasal 7 ayat (3 ) huruf (d) :</span></h3><ol xss=\"removed\"><li xss=\"removed\">Menyusun rencana Angaran Pendapatan dan Belanja Desa ( <a href=\"https://updesa.com/apbdes/\" xss=\"removed\">APBDes</a> ).</li><li xss=\"removed\">Menginventarisir data – data pembangunan.</li><li xss=\"removed\">Melakukan monitoring dan evaluasi program, serta penyusunan laporan.</li></ol><p xss=\"removed\"> </p><h3 xss=\"removed\"><span xss=\"removed\">Berdasarkan Permendagri 20/2018 pasal 6 ayat (4 ) :</span></h3><ol xss=\"removed\"><li xss=\"removed\">Melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya,</li><li xss=\"removed\">Melaksanakan anggaran kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Mengendalikan kegiatan sesuai bidang tugasnya,</li><li xss=\"removed\">Menyusun DPA, DPPA, dan DPAL sesuai bidang tugasnya,</li><li xss=\"removed\">Menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang tugasnya,</li><li xss=\"removed\">Menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggungjawaban pelaksanaan APB Desa.</li><li xss=\"removed\">Untuk lebih detailnya terkait tugas Kaur Perencanaan diatur dalam RKPDes dimasing – masing desa.</li></ol><hr xss=\"removed\"><p xss=\"removed\"># TUPOKSI KAUR TATA USAHA DAN UMUM</p><h2 xss=\"removed\"><span xss=\"removed\">1. Tugas Kaur Umum Berdasarkan Permendagri 84 Tahun 2015</span></h2><p xss=\"removed\">Dalam Permendagri 84/2015 sendiri Tugas Kaur Umum diatur dalam pasal 7 huruf (a) dan (b).</p><p xss=\"removed\">Kurang lebih tugasnya sebagai berikut :</p><p xss=\"removed\">1. Merancang tata naskah rapat,menulis notulen berita acara kemudian mengarsipkanya.</p><p xss=\"removed\">2. Mengagendakan penerimaan dan pengiriman surat,baik surat keluar ataupun surat masuk kedalam buku agenda desa.</p><p xss=\"removed\">3. Mencatat secara teliti atas pengiriman surat keluar,mulai dari nomor,tanggal,isi surat,dan tujuan kedalam buku ekspedisi.</p><p xss=\"removed\">4. Melaksanakan pencatatan dan pengelolaan data perangkat desa baik yang baru diangkat ataupun sudah diberhentikan kedalam            buku aparat pemerintah desa.</p><p xss=\"removed\">5. Mencatat ketersediaan prasarana perangkat desa dan kantor baik yang sudah ada atau belum.</p><p xss=\"removed\">6. Menyiapkan prasarana rapat sebelum dan sesudah dilaksanakan.</p><p xss=\"removed\">7. Melakukan pencatatan,pengarsipan,dan penghapusan barang/bangunan yang telah akan/sudah dilaksanakan kedalam buku                  inventaris dan kekayaaan desa.</p><p xss=\"removed\">8. Melaksanakan kegiatan pengelolaan administrasi umum.</p><p xss=\"removed\">9. Mempersiapkan adminstrasi terkait perjalan dinas, mulai dari membuat surat perintah sampai ke pengarsipanya.</p><p xss=\"removed\"> </p><h2 xss=\"removed\"><span xss=\"removed\">2. Berdasarkan Permendagri 20 Tahun 2018</span></h2><p xss=\"removed\"> </p><p xss=\"removed\">1. Melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya.</p><p xss=\"removed\">2. Melaksanakan anggaran kegiatan sesuai bidang tugasnya.</p><p xss=\"removed\">3. Mengendalikan kegiatan sesuai bidang tugasnya.</p><p xss=\"removed\">4. Menyusun DPA, DPPA, dan DPAL sesuai bidang tugasnya.</p><p xss=\"removed\">5. Menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang            tugasnya.</p><p xss=\"removed\">6. Menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggungjawaban pelaksanaan APB Desa.</p><hr xss=\"removed\"><p xss=\"removed\"># TUPOKSI KEPALA DUSUN</p><blockquote class=\"tr_bq\" xss=\"removed\"><em>Adapun tugas Kepala Dusun yakni membantu Kepala Desa dalam pelaksanaan tugasnya di wilayahnya.</em></blockquote><p xss=\"removed\"></p><div xss=\"removed\"><em>Fungsi Kepala Dusun</em></div><em xss=\"removed\"><div xss=\"removed\"><font face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji\"><span xss=\"removed\"><br></span></font></div><font face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji\"><div xss=\"removed\"><em xss=\"removed\"><font face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji\"><span xss=\"removed\">Untuk melaksanakan tugasnya, maka Kepala Dusun memiliki fungsi sebagai berikut:</span></font></em></div></font></em><p></p><ol xss=\"removed\"><li xss=\"removed\"><em>Membina ketenteraman dan ketertiban, melaksanakan upaya perlindungan masyarakat, mobilitas kependudukan, dan menata dan mengelola wilayah.</em></li><li xss=\"removed\"><em>Membantu Kasi dan Kaur Pelaksana Kegiatan Anggaran (PKA) dalam pelaksanaan pengadaan barang/jasa dalam hal sifat dan jenis kegiatannya tidak dapat dilakukan sendiri</em></li><li xss=\"removed\"><em>Mengawasi pelaksanaan pembangunan di wilayah kerjanya.</em></li><li xss=\"removed\"><em>Pelaksanaan pembinaan kemasyarakatan dalam meningkatkan kemampuan dan kesadaran masyarakat dalam menjaga lingkungannya masing-masing.</em></li><li xss=\"removed\"><em>Melakukan upaya-upaya pemberdayaan masyarakat dalam menunjang kelancaran penyelenggaraan pemerintahan dan pembangunan Desa.</em></li></ol><p xss=\"removed\"><em>Disamping tugas dan fungsi sebagaimana yang telah di sebutkan di atas. Kepala Dusun juga membantu Kepala Desa dalam melaksanakan wewenangan nya.</em></p><div xss=\"removed\"><span xss=\"removed\"><em><br></em></span></div><p xss=\"removed\"></p><div xss=\"removed\"></div><div xss=\"removed\"><img data-filename=\"unnamed.jpg\" xss=\"removed\"></div><p></p></div>',1631002683),
	(3,'Kedudukan, Fungsi, Tugas dan Wewenang BPD','<h3 xss=\"removed\"><span xss=\"removed\" xss=removed>BPD mempunyai wewenang</span><span xss=removed> :</span><br></h3><ol xss=\"removed\"><li>Membahas rancangan Peraturan Desa bersama Kepala Desa;</li><li>Melaksanakan pengawasan terhadap pelaksanaan Peraturan Desa dan Peraturan Kepala Desa;</li><li>Melakukan pengawasan terhadap kebijakan Pemerintah Desa dalam pengurusan dan pengelolaan sumber pendapatan dan kekayaan desa;</li><li>Membahas, menyetujui dan menetapkan rancangan Anggaran Pendapatan dan Belanja Desa;</li><li>Memberitahukan kepada Kepala Desa mengenai akan berakhirnya masa jabatan Kepala Desa secara tertulis 6 (enam) bulan sebelum berakhir masa jabatan;</li><li>Mengusulkan pengangkatan dan pemberhentian Kepala Desa;</li><li>Membentuk panitia pemilihan Kepala Desa;</li><li>Bersama Kepala Desa membentuk panitia pemilihan Perangkat Desa;</li><li>Memberikan persetujuan pengangkatan dan pemberhentian Perangkat Desa;</li><li>Memberikan persetujuan penunjukan seorang pejabat dari Perangkat Desa oleh Kepala Desa dalam hal terdapat lowongan jabatan Perangkat Desa;</li><li>Memberikan persetujuan kerjasama antar Desa dalam Kabupaten maupun antar desa di luar Kabupaten;</li><li>Menggali, menampung, menghimpun, merumuskan dan menyalurkan aspirasi masyarakat;</li><li>Menyusun tata tertib Badan Permusyawaratan Desa (BPD);</li><li>Mengadakan perubahan Peraturan Desa bersama Kepala Desa;</li><li>Memberikan persetujuan pengalihan Sumber Pendapatan Desa yang dimiliki dan dikelola oleh Pemerintah Desa kepada pihak lain;</li><li>Memberikan persetujuan pengelolaan kekayaan Desa yang dilakukan dengan pihak lain yang saling menguntungkan;</li><li>Memberikan persetujuan atas perubahan fungsi Tanah Kas Desa untuk kepentingan desa sendiri maupun kepentingan pihak lain.</li></ol><p xss=\"removed\">Pasal 5</p><p xss=\"removed\">BPD berwenang memberikan peringatan tertulis kepada Kepala Desa, paling banyak 3 (tiga) kali secara berturut-turut dengan tenggang waktu masing-masing 30 (tiga puluh) hari, apabila Kepala Desa melakukan pelanggaran pada peraturan dan perundang-undangan atau norma masyarakat yang berlaku, dan atau dalam melaksanakan tugasnya tidak dapat memberikan pelayanan kepada masyarakat secara adil, diskriminatif serta mempersulit setiap keperluan masyarakat.</p><p xss=\"removed\">Pasal 6</p><p xss=\"removed\">Apabila sampai dengan teguran ke 3 (tiga) tidak diindahkan oleh Kepala Desa, Bupati atas laporan BPD dapat memberikan sanksi administratif berupa peringatan, pemberhentian sementara dan pemberhentian setelah didahului pemeriksaan instansi yang berwenang.</p><p xss=\"removed\"><span xss=\"removed\">BAB III</span></p><p xss=\"removed\"><span xss=\"removed\">HAK DAN KEWAJIBAN BPD</span></p><p xss=\"removed\">Pasal 7</p><p xss=\"removed\">BPD mempunyai hak :</p><ol xss=\"removed\"><li>Meminta keterangan kepada Pemerintah Desa mengenai permasalahan Desa;</li><li>Meminta keterangan kepada pengurus Lembaga Kemasyarakatan Desa atau warga masyarakat baik secara lesan atau tertulis dengan menjunjung tinggi keterbukaan, kejujuran, dan obyektifitas;</li><li>Menyatakan pendapat;</li><li>Menerima laporan keterangan pertanggungjawaban atas laporan pertanggungjawaban Kepala Desa yang disampaikan kepada Bupati;</li><li>Menerima laporan akhir masa jabatan Kepala Desa.</li></ol><p xss=\"removed\">Pasal 8</p><ul xss=\"removed\"><li> Anggota BPD mempunyai hak :</li></ul><ol xss=\"removed\"><li>Mengajukan rancangan Peraturan Desa dan atau menyetujui perubahan mengenai peraturan desa yang diusulkan oleh Pemerintah Desa;</li><li>Mengajukan pertanyaan;</li><li>Menyampaikan usul dan pendapat kepada Pemerintah Desa;</li><li>Memilih dan dipilih; dan</li><li>Memperoleh tunjangan, dan uang sidang serta penghasilan lain yang sah yang besarnya disesuaikan dengan kemampuan keuangan desa. <ul xss=\"removed\"><li>Anggota BPD mempunyai kewajiban :</li></ul></li><li>Mengamalkan Pancasila, melaksanakan Undang-Undang Dasar 1945, dan menaati segala peraturan perundang-undangan;</li><li>Melaksanakan kehidupan demokrasi dalam penyelenggaraan Pemerintahan Desa;</li><li>Mempertahankan dan memelihara hukum nasional serta keutuhan Negara Kesatuan Republik Indonesia;</li><li>Menyerap, menampung, menghimpun dan menindaklanjuti aspirasi masyarakat;</li><li>Memproses pemilihan Kepala Desa;</li><li>Mendahulukan kepentingan umum di atas kepentingan pribadi, kelompok dan golongan;</li><li>Menghormati nilai-nilai sosial budaya dan adat istiadat masyarakat setempat, dan ;</li><li>Menjaga norma dan etika dalam hubungan kerja dengan lembaga kemasyarakatan.</li></ol>',1632727373),
	(4,'Sejarah Kota Juwana, Pati','<div xss=\"removed\"><span xss=\"removed\">Nama Juwana ada beberapa versi, dari salah satu versi mengatakan berasal dari kata Jiwana, yang berasal dari kata bahasa Sansekerta, jiwa. Dengan demikian, perkataan Jiwana diduga adalah nama \"Kahuripan\" yang disansekertakan. Pendapat lain mengatakan bahwa Juwana berasal dari kata druju dan wana. Druju adalah nama pohon, sementara wana berarti hutan. Sejarah Kepulauan Indonesia umumnya dan Tanah Jawa khususnya, ditemukan dari beberapa sumber yang agak berlainan satu dengan yang lain. </span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">Menurut salah satu sumber, diterangkan juga bahwa asal-usul penduduk Tanah Jawa memang sebagian dari Hindu dan sebagian pula dari Tiongkok. Untuk membuktikan kebenarannya, kita dapat membedakan antara penduduk asli dikepulauan Indonesia umumnya terdiri dari dua type yaitu disatu fihak typenya Hindustania, kulitnya agak hitam jengat / sawo matang dengan matanya tidak sipit; tetapi dilain tempat tidak sedikit yang berkulit kuning langsat, matanya agak sipit, banyak mirip atau malah 100% seperti orang Tionghoa, hingga dalam masyrakat tidak jarang terjadi diantara orang Indonesia sendiri menyangka bahwa orang yang berhadapan dengan dirinya itu dikira orang Tionghoa. Hanya model pakaianya atau gigi pangur saja yang digunakan sebagai tanda guna membedakannya. </span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">Pada zaman itu Tanah Jawa diselumbungi udara Animisme begitu rupa. Banyak orang suka memuja apa yang dipandangnya suci, suka sekali prihatin untuk menjalani ilmu-ilmu gaib dan kuat bertapa yang mempunyai pengaruh begitu mujizad.Misalnya walaupun justru udara bersih, matahari bersinar terang gelang-gemilang di atas angkasa yang biru, tetapi tiba-tiba datang seorang yang telah dipuncak pertapaannya, setelah berdiri dibawahnya sinar matahari sambil mencakupkan kedua tangannya dan berdoa sambil kedua matanya dimeramkan dan mendongkakan kepalanya, maka tidak lama kemudian awan mendung sekoyong-koyong bergulung-gulung begitu tebal dan sebentar pula hujan turun dibarengi suara angin menderu dan suara petir menyambar-nyambar kian kemari, hingga seolah-olah dunia sedang kiamat. Pada Masehi tahun 414, Fahian, perantau bansa Tionghoa yang termasyur, telah tiba di pulau Jawa ini bersama empat orang kawannya. Mereka selain menjadi orang-orang Tionghoa pertama menginjakkan kakinya di sini dan terus menurunkan keturunannya sehingga merupakan sebagian golongan Tionghoa peranakan yang sebagai bangsa Asing, kecuali bangsa Hindu yang pertama kali datang di pulau ini. Sementara menurut fihak lain ada dikatakan, bahwa waktu pertama kali bangsa Hindu datang kemari telah melihat tetanaman Juwawut, semacam bahan makanan, juga dijual dipasar untuk bahan makanan burung perkutut piaraan, yang tumbuh begitu subur dan gemuk sekali dipulau ini, sehingga pulau ini dinamakan Juwawut dan penduduknya dinamakan Juwana. Orang Tionghoa merubah kata “Juwana” menjadi “Wana” yang bukan saja menjadi kata lebih singkat, tetapi artinya lebih baik bagi orang Tionghoa umumnya dan golongan lain-lain yang mengerti huruf dan bahasa Tionghoa.Sebutan “Wana” terhadap penduduk Pulau Jawa khususnya dan kepulauan Indonesia umumnya memiliki arti : Tanah yang subur; tetumbuhan yang tumbuh dengan subur; dan kaya raya. Sebutan “Wana” terhadap penduduk asli dari Tanah Jawa khususnya dan Indonesia umumnya itu adalah : Orang dari negeri yang tanahnya subur atau kaya. Sementara bukti atas kebenaran bahwa penduduk asli dikepulauan ini disebut Juwana, adalah dengan adanya nama kota Juwana, suatu tempat di daerah Jawa Tengah terletak antara Pati – Rembang. </span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">Menurut penuturan dalam zaman Dampoawang (Sam Poo Twa Lang) waktu ia sampai ditempat yang dimaksud diatas lalu menanyakan kepada seorang penduduk asli nama tempat tersebut, tetapi oleh penduduk setempat menyangka tamu yang datang menayakan kebangsaanya (maklum belum bisa bahasa Melayu yang sekarang disebut bahasa Indonesia serta jarang ketemu orang Asing), maka dijawablah “Juwana”.Oleh karena itu maka tempat tadi selanjutnya disebut Juwana hingga saat ini menjadi perkampungan Nelayan yang sukses di Kabupaten Pati.</span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\"><br></span></div><div xss=\"removed\"><span xss=\"removed\">aaaaaaaaaaa</span></div>',1618751459),
	(5,'Visi Misi Kepala Desa Sejomulyo','<p>Visi Kepala Desa Sejomulyo adalah \"MENGHADIRKAN PEERINTAH YANG BERKUALITAS MENUJU SEJOMULYO MAJU.\"</p><p><br></p><p>Dalam rangka mewujudkan visi misi sebagaimana dimaksud Pasal 4, Kepala Desa Sejomulyo mempunyai misi sebagai beikut :</p><ol><li>menghadirkan Pelayanan public yang tanggap, cepat dan akurat;</li><li>mendorong pertumbuhan ekonomi kerakyatan dengan program industri pertanian dan peternakan (Program prioritas Pembangunan Irigasi Modern);</li><li>menghadirkan ruang public yang ramah tamah dan mengedukasi dengan membangun sarana olahraga, area bermain anak, area terbuka hijau, dan sarana hiburan yang mengedukasi kearifan lokal;</li><li>Menjalin koordinasi dan sinkronisasi program-program Pemerintah Desa, Daerah dan Pusat;</li><li>Menjamin kebebasan berpendapat demi terwujudnya Desa Sejomulto yang aman, nyaman, damai dan berkembnag menuju kesejahteraan dalam segala bidang.</li></ol>',1617634454),
	(6,'Potensi Desa Sejomulyo','<h1></h1><h2></h2><h3></h3><h4></h4><h3><ul><li><b>Pertanian</b></li></ul></h3><p xss=\"removed\">Pertanian adalah suatu kegiatan pemanfaatan sumber daya hayati untuk menghasilkan bahan pangan, bahan baku industri, atau sumber energi, serta untuk mengelola lingkungan hidupnya. Contoh kegiatan pertanian adalah budidaya tanaman atau bercocok tanam dan pembesaran hewan ternak, termasuk juga pemanfaatan mikroorganisme dan bioenzim. Menurut para ahli seperti menurut Mosher ( 1966 ), pertanian merupakan suatu bentuk produksi yang khas, yang berkaitan dengan proses pertumbuhan tanaman dan hewan. Sedangkan Van Aarsten mengatakan pertanian adalah digunakannya kegiatan manusia untuk memperoleh hasil yang berasal dari tumbuh-tumbuhan dan atau hewan.</p><h3 xss=\"removed\"><strong>Manfaat Pertanian</strong></h3><p xss=\"removed\">1. Mendukung Kedaulatan Pangan</p><p xss=\"removed\">Pertanian sumber utama pangan dalam suatu negara. Jika pertanian dalam sebuah negara tidak mampu memenuhi kebutuhan warganya, maka negara akan mengimpor bahan pangan dari negara lain.</p><p xss=\"removed\">2. Mengurangi Pengangguran</p><p xss=\"removed\">Pertanian juga bermanfaat mengurangi pengangguran. Saat ini memang para pemuda di desa enggan untuk mengelola ladang atau kebun mereka dan memilih menjadi pekerja yang diupah.</p><p xss=\"removed\">Namun pada dasarnya jika mereka mau mengelola pertanian sendiri, maka pengangguran justru akan berkurang.</p><p xss=\"removed\">3. Menjaga Lingkungan</p><p xss=\"removed\">Pertanian lainnya adalah dapat terjaganya kualitas lingkungan. Terdapat rantai makanan yang selalu membuat ekologi dalam keadaan seimbang.</p><h3 xss=\"removed\"><strong>Jenis Pertanian</strong></h3><p xss=\"removed\">1. Pertanian Modern</p><p xss=\"removed\">Pertanian modern merupakan proses dalam arti budidaya pertanian yang menggunakan peralatan canggih untuk memudahkan proses produksi dan meningkatkan hasil pertanian dalam kurun waktu yang efektif dan efisien.</p><p xss=\"removed\">Dunia pertanian modern merupakan dunia mitos keberhasilan modernitas dimana keberhasilan diukur dari besaran hasil panen yang diproduksi sehingga semakin banyak hasil yang diperoleh maka sistem tersebut semakin dianggap maju.</p><p xss=\"removed\">Beberapa manfaat pertanian modern adalah untuk meningkatkan nilai ekspor, memutakhirkan metode yang sudah ada, berkembangnya sistem agribisnis yang menguntungkan dan lainnya.</p><p xss=\"removed\">2. Pertanian Organik</p><p xss=\"removed\">Pertanian organik adalah suatu rangkaian dalam sistem produksi pertanaman yang berdasarkan daur ulang hara secara hayati, terutama mempergunakan strategi pemindahan hara secara cepat dari sisa tanaman, pupuk kompos menjadi biomassa tanah yang selanjutnya akan mengalami proses mineralisasi dan berakhir menjadi hara dalam tanah.</p><p xss=\"removed\">Dengan kata lain dalam pertanian organik terjadi daur ulang unsur hara melalui satu atau lebih tahapan bentuk senyawa organik sebelum diserap tanaman.</p><p xss=\"removed\">Adapun tujuan dari pertanian organik adalah menghasilkan pangan berkualitas lebih sehat dan bebas bahan kimia.</p><p xss=\"removed\">Tujuan lainnya adalah melestarikan lingkungan. Landasan pertanian organik adalah ekologi dan pelestarian lingkungan.</p><p xss=\"removed\">Kemudian tujuan lainnya adalah meningkatkan pendapatan petani karena biasanya produk organik itu harganya lebih tinggi.</p><p xss=\"removed\">Masyarakat modern pun kini mulai banyak yang menyadari pentingnya menjaga kesehatan dengan mengonsumsi makanan organik</p>',1631002623),
	(7,'Karang Taruna Desa Sejomulyo','<p xss=removed>Karang Taruna adalah Organisasi Sosial wadah pengembangan generasi muda yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda di wilayah desa/ kelurahan dan terutama bergerak di bidang usaha kesejahteraan sosial. Rumusan tersebut diatas dapat dijelaskan sebagai berikut:</p><p xss=removed>Karang Taruna adalah suatu organisasi sosial, perkumpulan sosial yang dibentuk oleh masyarakat yang berfungsi sebagai sarana partisipasi masyarakat dalam melaksanakan Usaha Kesejahteraan Sosial (UKS).</p><p xss=removed>Sebagai wadah pengembangan generasi muda, Karang Taruna merupakan tempat diselenggarakannya berbagai upaya atau kegiatan untuk meningkatkan dan mengembangkan cipta, rasa, karsa, dan karya generasi muda dalam rangka pengembangan sumber daya manusia (SDM).</p><p xss=removed>Karang Taruna tumbuh dan berkembang atas dasar adanya kesadaran terhadap keadaan dan permasalahan di lingkungannya serta adanya tanggung jawab sosial untuk turut berusaha menanganinya. Kesadaran dan tanggung jawab sosial tersebut merupakan modal dasar tumbuh dan berkembangnya Karang Taruna.</p><p xss=removed>Karang Taruna tumbuh dan berkembang dari generasi muda, diurus atau dikelola oleh generasi muda dan untuk kepentingan generasi muda dan masyarakat di wilayah desa/kelurahan atau komunitas adat sederajat. Karenanya setiap desa/kelurahan atau komunitas adat sederajat dapat menumbuhkan dan mengembangkan Karang Tarunanya sendiri.</p><p xss=removed>Gerakannya di bidang Usaha Kesejahteraan Sosial berarti bahwa semua upaya program dan kegiatan yang diselenggarakan Karang Taruna ditujukan guna mewujudkan kesejahteraan sosial masyarakat terutama generasi mudanya.</p><ol start=\"2\" xss=removed><li><span xss=removed>PEDOMAN DASAR KARANG TARUNA</span></li></ol><p xss=removed>Pedoman Dasar KARANG TARUNA diatur dalam Peraturan Menteri Sosial RI Nomor 83/HUK/2005 tentang Pedoman Dasar Karang Taruna, yang kemudian diubah menjadi Permensos RI Nomor 77/HUK/2010.</p><ol start=\"3\" xss=removed><li><span xss=removed>TUJUAN, TUGAS POKOK DAN FUNGSI</span></li><li>Tujuan Karang Taruna adalah :</li></ol><ul xss=removed><li>Terwujudnya pertumbuhan dan perkembangan kesadaran tanggung jawab sosial setiap generasi muda warga Karang Taruna dalam mencegah, menangkal, menanggulangi dan mengantisipasi berbagai masalah sosial.</li><li>Terbentuknya jiwa dan semangat kejuangan generasi muda warga Karang Taruna yang trampil dan berkepribadian serta berpengetahuan.</li><li>Tumbuhnya potensi dan kemampuan generasi muda dalam rangka mengembangkan keberdayaan warga Karang Taruna.</li><li>Termotivasinya setiap generasi muda Karang Taruna untuk mampu menjalin toleransi dan menjadi perekat persatuan dalam keberagaman kehidupan bermasyarakat, berbangsa dan bernegara.</li><li>Terjalinnya kerjasama antara generasi muda warga Karang Taruna dalam rangka mewujudkan taraf kesejahteraan sosial bagi masyarakat.</li><li>Terwujudnya kesejahteraan sosial yang semakin meningkat bagi generasi muda di desa/kelurahan atau komunitas adat sederajat yang memungkinkan pelaksanaan fungsi sosialnya sebagai manusia pembangunan yang mampu mengatasi masalah kesejahteraan sosial dilingkungannya.</li><li>Terwujudnya pembangunan kesejahteraan sosial generasi muda di desa/kelurahan atau komunitas adat sederajat yang dilaksanakan secara komprehensif, terpadu dan terarah serta berkesinambungan oleh Karang Taruna bersama pemerintah dan komponen masyarakat lainnya.</li></ul><ol xss=removed><li>Tugas Pokok Karang Taruna adalah: Secara bersama?sama dengan Pemerintah dan komponen masyarakat lainnya untuk menanggulangi berbagai masalah kesejahteraan sosial terutama yang dihadapi generasi muda, baik yang bersifat preventif, rehabilitatif maupun pengembangan potensi generasi muda di lingkungannya.</li><li>Fungsi Karang Taruna adalah :</li><li>Penyelenggara Usaha Kesejahteraan Sosial.</li><li>Penyelenggara Pendidikan dan Pelatihan bagi masyarakat.</li><li>Penyelenggara pemberdayaan masyarakat terutama generasi muda secara komprehensif, terpacu dan terarah serta berkesinambungan.</li><li>Penyelenggara kegiatan pengembangan jiwa kewirausahaan bagi generasi muda di lingkungannya.</li><li>Penanaman pengertian, memupuk dan meningkatkan kesadaran tanggung jawab sosial generasi muda.</li><li>Penumbuhan dan pengembangan semangat kebersamaan, jiwa kekeluargaan, kesetiakawanan sosial dan memperkuat nilai-nilai kearifan dalam bingkai Negara Kesatuan Republik lndonesia.</li><li>Pemupukan kreatifitas generasi muda untuk dapat mengembangkan tanggung jawab sosial yang bersifat rekreatif, kreatif, edukatif, ekonomis produktif dan kegiatan praktis lainnya dengan mendayagunakan segala sumber dan potensi kesejahteraan sosial di lingkungannya secara swadaya.</li><li>Penyelenggara rujukan, pendampingan, dan advokasi sosial bagi penyandang masalah kesejahteraan sosial.</li><li>Penguatan sistem jaringan komunikasi, kerjasama, informasi dan kemitraan dengan berbagai sektor lainnya.</li><li>Penyelenggara Usaha?usaha pencegahan permasalahan sosial yang aktual.</li></ol><p xss=removed>KEANGGOTAAN DAN KEPENGURUSAN</p><ol xss=removed><li>KEANGGOTAAN</li></ol><p xss=removed>Anggota Karang Taruna terdiri dari Anggota Pasif dan Anggota Aktif:</p><ul xss=removed><li>Anggota Pasif adalah keanggotaan yang bersifat stelsel pasif (Keanggotaan otomatis), yakni seluruh remaja dan pemuda yang berusia 11 s/d 45 tahun;</li><li>Anggota Aktif adalah keanggotaan yang bersifat kader, berusia 11 s/d 45 tahun dan selalu aktif mengikuti kegiatan Karang Taruna.</li></ul><ol xss=removed><li>KEPENGURUSAN</li></ol><ul xss=removed><li>Kriteria Pengurus Secara umum, untuk menjadi pengurus Karang Taruna seseorang harus memenuhi kriteria sebagai berikut:</li></ul><ol xss=removed><li>Bertaqwa Kepada Tuhan Yang Maha Esa;</li><li>Setia kepada Pancasila dan UUD 1945;</li><li>Berdomisili di wilayah tingkatannya yang dibuktikan dengan identitas resmi;</li><li>Memiliki kondisi jasmani dan rohani yang sehat;</li><li>Bertanggung jawab, berakhlak baik, dan mampu bekerja dengan timnya maupun dengan berbagai pihak;</li><li>Berusia minimal 17 tahun dan maksimal 45 tahun;</li><li>Mengetahui dan memahami aspek keorganisasian serta ke-Karang Taruna-an;</li><li>Peduli terhadap lingkungan masyarakatnya;</li></ol><p xss=removed> </p><ol xss=removed><li>PENGURUS DESA/KELURAHAN</li></ol><p xss=removed><br>Pengurus Karang Taruna tingkat Desa/Kelurahan dipilih dan disahkan dalam Temu Karya Desa/Kelurahan. Pengurus Karang Taruna tingkat Desa/Kelurahan dikukuhkan dengan Surat Keputusan Kepala Desa/Lurah dan dilantik oleh Kepala Desa/Lurah setempat. Pengurus Karang Taruna tingkat Desa/Kelurahan selanjutnya berfungsi sebagai Pelaksana Organisasi dalam diwilayahnya. Karang Taruna tingkat Desa/Kelurahan atau komunitas sosial yang sederajat memiliki Pengurus minimal 35 Orang, masa bhakti 3 (Tiga) Tahun dengan struktur sekurang?kurangnya terdiri dari:</p><p align=\"left\" xss=removed><br>1. Ketua;<br>2. Wakil Ketua;<br>3. Sekretrais;<br>4. Wakil Sekretaris;<br>5. Bendahara;<br>6. Wakil Bendahara;<br>7. Seksi Pendidikan dan Pelatihan;<br>8. Seksi Usaha Kesejahteraan Sosial;<br>9. Seksi Kelompok Usaha Bersama;<br>10. Seksi Kerohanian dan Pembinaan Mental;<br>11. Seksi Olahraga dan Seni Budaya;<br>12. Seksi Lingkungan Hidup;<br>13. Seksi Hubungan Masyarakat dan Kerjasama Kemitraan.</p>',1618671256),
	(8,'PKK Desa Sejomulyo','<p xss=removed><em>Gerakan Pemberdayaan dan Kesejahteraan Keluarga</em>, selanjutnya di singkat PKK, adalah gerakan nasional dalam pembangunan masyarakat yang tumbuh dari bawah yang pengelolaannya DARI, OLEH dan UNTUK masyarakat menuju terwujudnya keluarga yang beriman dan bertaqwa kepada Tuhan Yang Maha Esa, berakhlak mulia dan berbudi luhur, sehat sejahtera, maju dan mandiri, kesetaraan dan keadilan gender serta kesadaran hukum dan lingkungan.</p><p xss=removed><em>Pemberdayaan Keluarga </em>adalah segala upaya bimbingan dan pembinaan agar keluarga dapat hidup sehat sejahtera, maju dan mandiri.</p><p xss=removed><em>Kesejahteraan Keluarga</em> adalah kondisi tentang terpenuhinya kebutuhan dasar manusia dari setiap anggota keluarga secara material, sosial, mental dan spiritual sehingga dapat hidup layak sebagai manusia yang bermanfaat.</p><p xss=removed><em>Keluarga</em> adalah unit terkecil dalam masyarakat yang terdiri atas suami istri atau suami istri dan anaknya atau ayah dan anaknya atau ibu dan anaknya.</p><p xss=removed><em>Keluarga Sejahtera</em>  adalah keluarga yang dibentuk berdasarkan perkawinan yang sah, mampu memenuhi kebutuhan hidup spiritual dan meterial yang layak, bertaqwa kepada Tuhan Yang Maha Esa, memiliki hubungan yang serasi, selaras dan seimbang antar anggota, antar keluarga dan masyarakat serta lingkungannya.</p><p xss=removed><em>Tim Penggerak Pemberdayaan dan Kesejahteraan Keluarga (TP.PKK)</em> adalah mitra kerja pemerintah dan organisasi kemasyarakatan, yang berfungsi sebagai fasilisator, perencana, pelaksana, pengendali dan penggerak  pada masing-masing jenjang untuk terlaksananya program PKK.</p><p xss=removed><em>Anggota Tim Penggerak  PKK </em>adalah warga masyarakat baik laki-laki maupun perempuan, perorangan, bersifat sukarela, tidak mewakili organisasi, golongan, partai politik, lembaga atau instansi, dan berfungsi sebagai perencana, pelaksana, pengendali Gerakan PKK.</p><p xss=removed><em>Kelompok PKK</em> adalah kelompok-kelompok yang berada di bawah Tim Penggerak PKK Desa/kelurahan yang dapat dibentuk berdasarkan kewilayahan atau kegiatan.</p><p xss=removed><em>Kelompok DASAWISMA </em>adalah kelompok yang terdiri atas 10-20 Kepala Keluarga (dapat disesuaikan dengan situasi dan kondisi setempat), diketuai oleh seorang yang dipilih di antara mereka, merupakan kelompok potensial terdepan dalam pelaksanaan kegiatan PKK.</p><p xss=removed><em>Kader UMUM</em>  adalah mereka yang telah dilatih atau belum dilatih tetapi memahami, serta melaksanakan 10 Program Pokok PKK, yang mau dan mampu memberikan penyuluhan dan menggerakan masyarakat untuk melaksanakan kegiatan yang diperlukan.</p><p xss=removed><em>Kader Khusus</em> adalah Kader Umum yang mendapat tambahan pengetahuan dan ketrampilan tertentu, antara lain melalui pelatihan-pelatihan yang diselenggarakan oleh PKK, lembaga, instansi pemerintah atau non pemerintah. Data tentang Kader khusus dicantumkan dalam kolom data Pokja masing-masing.</p><p xss=removed><em>Pelatih PKK</em> adalah anggota Tim Penggerak PKK atau Kader yang telah mengikuti pelatihan PKK dan Metodologi pelatihan, serta mendapatkan surat keputusan sebagai Pelatih dan ketua Umum/Ketua Tim Penggerak PKK Daerah yang bersangkutan.</p><p xss=removed><em>Pelindung Utama PKK</em> adalah istri Presiden Republik Indonesia, yang bertugas memberikan arahan, dukungan baik moril maupun material untuk keberhasilan Gerakan PKK.</p><p xss=removed><em>Pelindung PKK</em> adalah istri wakil Presiden Republik Indonesia, yang bertugas memberikan arahan, dukungan baik moril maupun materiil untuk keberhasilan Gerakan PKK.</p><p xss=removed><em>Dewan Penyantun Tim Penggerak PKK</em> adalah unsur pendukung pelaksanaan program PKK yang terdiri atas pimpinan instansi/lembaga yang membidangi tugas-tugas pemberdayaan dan kesejahteraan keluarga serta para tokoh/pemuka masyarakat, lembaga kemasyarakatan yang ditetapkan dengan Keputusan Menteri Dalam Negeri, Gubernur, Bupati/Walikota, Camat dan kepala Desa/lurah sesuai dengan jenjang keperintahan.</p><p xss=removed><em>Penasehat PKK</em> adalah tokoh/pemuka masyarakat yang karena keahlian, pengetahuan dan pengalamannya mau membantu untuk keberhasilan pelaksanaan Gerakan PKK, yang ditetapkan dengan Surat Keputusan Menteri Dalam Negeri selaku Ketua Dewan Penyantun Tim Penggerak PKK Pusat.</p><p xss=removed><em>Sedangkan Penasehat di Propins</em>i, Kabupaten/Kota dapat diadakan sesuai keadaan dan kebutuhan, diusulkan oleh ketuia Tim Penggerak PKK dan ditetapkan dengan Surat Keputusan Gubernur, Bupati/Walikota selaku Ketua Dewan Penyantun Tim Penggerak PKK yang bersangkutan.</p>',1618922172),
	(9,'LPMD Desa Sejomulyo','<p><span xss=removed>Lembaga Pemberdayaan Masyarakat Desa (LPMD), adalah lembaga atau wadah yang dibentuk atas prakarsa masyarakat yang difasilitasi pemerintah desa melalui musyawarah dan mufakat, dan merupakan mitra pemerintah desa dalam menampung dan mewujudkan aspirasi serta kebutuhan masyarakat di bidang pembangunan.</span></p><p xss=removed>LPMD dibentuk dengan maksud untuk membantu Pemerintah Desa dalam memberdayakan masyarakat desa pada berbagai aspek pembangunan. Sedangkan tujuan dibentuknya LPMD itu sendiri adalah untuk mewujudkan lembaga teknis yang merupakan mitra Pemerintah Desa dalam hal menyelenggarakan perencanaan, pelaksanaan dan pengendalian kegiatan pemberdayaan masyarakat di bidang pembangunan.</p><p xss=removed>LPMD berkedudukan sebagai lembaga yang bersifat lokal dan merupakan mitra kerja Pemerintah Desa dalam bidang pembangunan. Hubungan kerja LPMD dengan pihak lain bersifat kemitraan. Pihak lain sebagaimana dimaksud adalah Pemerintah Desa, BPD, dan Lembaga Kemasyarakatan Desa lainnya.</p><p xss=removed>Kegiatan LPMD ditujukan untuk mempercepat terwujudnya kesejahteraan masyarakat melalui:</p><ol xss=removed><li xss=removed>pemberdayaan masyarakat;</li><li xss=removed>peningkatan peranserta masyarakat dalam proses pembangunan</li><li xss=removed>pengembangan kemitraan;</li><li xss=removed>peningkatan pelayanan masyarakat; dan</li><li xss=removed>pengembangan kegiatan lain sesuai dengan kebutuhan dan potensi masyarakat setempat.</li></ol><p xss=removed><strong xss=removed>Tugas, Fungsi dan Kewajiban LPMD</strong></p><p xss=removed><strong xss=removed>Tugas</strong></p><ol xss=removed><li xss=removed>menyusun rencana pembangunan secara partisipatif melalui musrenbang;</li><li xss=removed>melaksanakan, mengendalikan, memanfaatkan, memelihara dan mengembangkan pembangunan secara partisipatif;</li><li xss=removed>menggerakkan dan mengembangkan partisipasi, gotong royong dan swadaya masyarakat.</li><li xss=removed>menumbuhkembangkan kondisi dinamis masyarakat dalam rangka pemberdayaan masyarakat.</li></ol><p xss=removed><strong xss=removed>Fungsi</strong></p><ol xss=removed><li xss=removed>penampungan dan penyaluran aspirasi masyarakat dalam pembangunan fisik dan non fisik (pelatihan jasa/keterampilan, bantu modal);</li><li xss=removed>penanaman dan pemupukan rasa persatuan dan kesatuan masyarakat dalam kerangka memperkokoh Negara Kesatuan Republik Indonesia;</li><li xss=removed>peningkatan kualitas dan percepatan pelayanan pemerintah kepada masyarakat;</li><li xss=removed>penyusunan rencana, pelaksanaan dan pengendalian program-program pemberdayaan masyarakat desa;</li><li xss=removed>pelestarian dan pengembangan hasil – hasil pembangunan secara partisipatif;</li><li xss=removed>penumbuhkembangan dan penggerakan prakarsa, partisipasi serta swadaya gotong royong masyarakat;</li><li xss=removed>penggalian, pendayagunaan dan pengembangan potensi sumber daya manusia dan sumber daya alam dengan memperhatikan lingkungan hidup;</li><li xss=removed>pelestarian sistem mekanisme pembangunan partisipatif;</li><li xss=removed>pelestarian nilai-nilai sosial budaya, adat istiadat dan norma-norma yang hidup dan berkembang di masyarakat;</li><li xss=removed>pemberdayaaan hak politik masyarakat; dan.</li><li xss=removed>pendukung media komunikasi, informasi, sosialisasi antara pemerintah desa dengan masyarakat.</li></ol><p xss=removed><strong xss=removed>Kewajiban</strong></p><ol xss=removed><li xss=removed>Memegang teguh dan mengamalkan Pancasila dan Undang-Undang Dasar 1945 serta mempertahankan dan memelihara Negara Kesatuan Republik Indonesia;</li><li xss=removed>Menjalin hubungan kemitraan dengan berbagai pihak yang terkait;</li><li xss=removed>Mentaati seluruh peraturan perundang-undangan;</li><li xss=removed>Menjaga nilai-nilai sosial budaya, adat istiadat dan norma-norma yang hidup dan berkembang di masyarakat; dan</li><li xss=removed>Membantu Pemerintah Desa dalam pelaksanaan kegiatan pemerintahan, pembangunan dan pembinaan masyarakat dalam rangka meningkatkan kesejahteraan masyarakat.</li></ol><p xss=removed>Dana kegiatan LPMD dapat bersumber dari :</p><ol xss=removed><li xss=removed>Swadaya masyarakat;</li><li xss=removed>Anggaran Pendapatan dan Belanja Desa;</li><li xss=removed>Anggaran Pendapatan dan Belanja Daerah Kabupaten dan/ atau Anggaran Pendapatan dan Belanja Daerah Provinsi;</li><li xss=removed>Bantuan Pemerintah, Pemerintah Provinsi dan Pemerintah Kabupaten; dan</li><li xss=removed>Bantuan lain yang sah dan tidak mengikat.</li></ol><p xss=removed>Masa bhakti pengurus LPMD selama 5 (lima) tahun terhitung sejak pengangkatan dan dapat dipilih kembali untuk satu kali periode berikutnya. Syarat-syarat untuk dapat dipilih menjadi anggota LPMD adalah :</p><ol xss=removed><li xss=removed>Bertaqwa kepada Tuhan Yang Maha Esa;</li><li xss=removed>Setia dan taat kepada Pancasila dan Undang-Undang Dasar 1945;</li><li xss=removed>Berkelakuan baik, cakap dan bertanggung jawab;</li><li xss=removed>Sebagai penduduk desa dan bertempat tinggal tetap;</li><li xss=removed>Sehat jasmani dan rohani;</li><li xss=removed>Berumur sekurang-kurangnya 20 tahun;</li><li xss=removed>Tidak merangkap jabatan pada lembaga kemasyarakatan desa lainnya;</li><li xss=removed>Tidak merangkap jabatan dalam struktur pemerintah desa.</li></ol><p xss=removed>Pengurus LPMD dipilih secara musyawarah dari anggota masyarakat yang mempunyai kemauan, kemampuan, dan kepedulian dalam pemberdayaan masyarakat. Susunan Pengurus LPMD ditetapkan dengan Keputusan Kepala Desa dengan susunan :</p><ul xss=removed><li xss=removed>Ketua;</li><li xss=removed>Wakil Ketua;</li><li xss=removed>Sekretaris;</li><li xss=removed>Bendahara; dan</li><li xss=removed>Bidang-bidang</li></ul>',1619356938),
	(10,'KPMD Desa Sejomulyo','<header class=\"entry-header\" xss=\"removed\"><p>Tujuan Dibentuknya KPMD</p><p><br>Mendorong partisipasi dan gotong royong masyarakat untuk terlibat secara aktif dalam proses pembangunan desa mulai dari perencanaan, pelaksanaan, hingga pengendaliannya dalam rangka melakukan pendampingan implementasi Undang Undang No.6 Tahun 2014 tentang Desa.</p><p><br>Dasar Pembentukan KPMD</p><ol><li>Undang-Undang Nomor 6 Tahun 2014 tentang Desa (Lembaran Negara Republik Indonesia Tahun 2014 Nomor 7, Tambahan Lembaran Negara Republik Indonesia Nomor 5495);</li><li>Peraturan Pemerintah Republik Indonesia Nomor 43 Tahun 2014 tentang Peraturan Pelaksanaan Undang-Undang Nomor 6 Tahun 2014 tentang Desa;</li><li>Peraturan Menteri Desa, Pembangunan Daerah Tertinggal dan Transmigrasi Nomor 3 Tahun 2015 tentang Pendampingan Desa (Pasal 4).<br></li></ol><p>Tugas KPMD</p><p>Umum<br></p><ol><li>Secara umum bertugas untuk menumbuhkan dan mengembangkan, serta menggerakkan prakarsa, partisipasi, dan swadaya gotong royong (Permendes No.3/2015, Pasal 18).</li><li>Mengikuti pelatihan Kader Pemberdayaan Masyarakat Desa.</li><li>Mengumpulkan data-data yang diperlukan sebagai dasar penyusunan perencanaan pembangunan desa.</li><li>Menyebarluaskan dan mensosialisasikan Program-program pembangunan desa kepada masyarakat desa.</li><li>Memastikan terlaksananya tahapan kegiatan program pembangunan di desa mulai dari perencanaan, pelaksanaan, pertanggungjawaban dan pelestarian.</li><li>Mendorong dan memastikan penerapan prinsip-prinsip partisipatif, transparansi dan akuntabilitas setiap tahapan program pembangunan di desa mulai dari perencanaan, pelaksanaan pertanggungjawabn dan pelestarian.</li><li>Mengikuti pertemuan Forum KPMD.</li><li>Membantu dan memfasilitasi proses penyelesaian masalah perselisihan di desa.</li><li>Mengefektifkan penggunaan papan informasi di desa.</li><li>Mendorong masyarakat untuk berperan serta dalam pelaksanaan kegiatan, termasuk dalam pengawasan.</li><li>Mensosialisasikan sanksi dan keputusan lainnya yang telah ditetapkan dalam musyawarah antar desa dan musyawarah desa kepada masyarakat.</li></ol></header>',1631711995),
	(11,'KK - KTP - Akta Kelahiran','<p><b><span xss=\"removed\">LAYANAN ADMINISTRASI KEPENDUDUKAN</span></b></p><p><span xss=\"removed\">Kepada masyarakat Desa Sejomulyo yang ingin mengurus administrasi kependudukan seperti E-KTP, Kartu Keluarga, Akta Kelahiran dan lain-lain bisa datang ke kantor balai desa dengan membawa persyaratan yang dibutuhkan. </span></p><p><span xss=\"removed\">untuk pengurusan dokumen kependudukan bisa diurus sendiri ke Dinas kabupaten terkait. namun pihak desa juga bisa memfasilitasi hal tersebut. Jadi bagi anda yang memerlukan informasi lainnya bisa menghubungi kantor desa (081393048412 Bu Kartini).</span></p><p><br></p><p><b><span xss=\"removed\">PENGURUSAN AKTA KELAHIRAN</span></b></p><p><span xss=\"removed\" xss=removed>berkas persyaratan yang harus dibawa sebagai berikut. </span></p><p><span xss=\"removed\">1. Potocopy KTP kedua orang tua.</span></p><p><span xss=\"removed\">2. potocopy Kartu Keluarga.</span></p><p><span xss=\"removed\">3. Surat keterangan lahir dari bidan/surat bidan (atau)</span></p><p><span xss=\"removed\">4. Surat kelahiran dari desa (form A-3)</span></p><p><span xss=\"removed\">5. surat pernyataan saksi kelahiran</span></p><p><span xss=\"removed\">6. Potocopy KTP saksi (2 orang)</span></p><p><span xss=\"removed\">7. Surat pernyataan belum memiliki akte kelahiran (bagi yang mengurus akte setelah lewat 60 hari dari kelahiran)</span></p><p><span xss=\"removed\">8. potocopy buku nikah</span></p><p><br></p><p><b><span xss=\"removed\">PENGURUSAN KARTU KELUARGA</span></b></p><p>berkas persyaratan yang harus dibawa sebagai berikut. <b><span xss=\"removed\"><br></span></b></p><p><span xss=\"removed\" xss=removed>1. Potocopy nuku nikah</span></p><p><span xss=\"removed\" xss=removed>2. potocopy ijazah terakhir</span></p><p><span xss=\"removed\" xss=removed>3. pengantar dari RT</span></p><p>4. KK asli</p><p>5. surat pindah datang dari tempat asal (jika pindahan dari luar Desa Sejomulyo dan mau menjadi warga Sejomulyo)</p><p>6. Mengisi formulir F.1-6 di kantor balai Desa Sejomulyo.</p><p><br></p><p><b>PEMBUATAN E-KTP</b></p><p>berkas persyaratan yang harus dibawa sebagai berikut. <b><br></b></p><p>1. Pengantar RT</p><p>2. Potocopy kartu keluarga</p><p>3. mengisi formulir di kantor balai desa</p><p><br></p><p><b>PENGURUSAN SURAT PINDAH PERGI/KELUAR DESA</b></p><p>berkas persyaratan yang harus dibawa sebagai berikut. <b><br></b></p><p>1. kartu keluarga asli</p><p>2. pengantar RT</p><p>3. pasphoto 3x4 (4 lembar)</p><p>4. E-KTP</p><p>5. alamat lengkap tempat tujuan pindah. </p>',1617891533),
	(12,'PELAYANAN SURAT','<p><b>SYARAT-SYARAT PENGURUSAN LEGALISIR </b></p><p>1. menunjukkan dokumen asli yang dilegalisir. </p><p><br></p><p>SURAT IZIN USAHA MIKRO KECIL (IUMK)</p><p>Syarat- Syarat Pengurusan Surat Izin Usaha Mikro Kecil :</p><p>1. Fotocopy KTP yang masih Berlaku = 1 lembar </p><p>2. Fotocopy Kartu Keluarga  = 1 lembar </p><p>3. Rekomendasi dari Kelurahan/Desa Tempat Usaha Asli = 1 lembar </p><p>4. Pengantar dari RT Tempat Berdirinya Usaha Asli = 1 lembar </p><p>5. Pas Photo warna ukuran 4×6 = 2 lembar</p><p><br></p><p>SURAT IZIN REKLAME</p><p>Syarat – Syarat Pengurusan Surat Izin Reklame :</p><p>1. Permohonan diatas kertas bermaterai Rp. 6000,- </p><p>2. Rekomendasi dari Kelurahan / Desa yang bersangkutan </p><p>3. Foto Copy KTP yang masih berlaku </p><p>4. Foto Copy lunas Pajak Retribusi Daerah </p><p>5. Materai Rp. 6000 = 2 lembar </p><p>6. Pas Photo 3 x 4 = 2 lembar </p><p>7. Surat Izin pemilik tanah jika Reklame ditanah orang lain </p><p>8. Berita Acara Pemasangan Reklame</p><p><br></p><p>SURAT IZIN USAHA PERDAGANGAN (SIUP)</p><p>Syarat- Syarat Pengurusan Surat Izin Usaha Perdagangan :</p><p>1. Fotocopy KTP yang masih Berlaku = 1 lembar </p><p>2. Fotocopy Bukti Pembayaran Pajak Retribusi Daerah (HO) = 1lembar</p><p>3. Fotocopy Bukti Pembayaran Pajak Bumi Bangunan (PBB) = 1 lembar</p><p>4. Rekomendasi dari Kelurahan/Desa Tempat berdirinya Usaha Asli = 1 lembar</p><p>5. Fotocopy Surat Tanah / Perjanjian Sewa-menyewa = 1 rangkap </p><p>6. Fotocopy Surat Rekomendasi / Surat Keterangan Kesehatan dari UPTD Kesehatan (untuk usaha Apotik, Praktek Bidan/Dokter, Toko Makanan/Kue, Rumah makan, dsb) = 1 lembar </p><p>7. Fotocopy Akta Pendirian Bagi Koperasi (untuk koperasi yang bermodalkan Kurang dari atau sama dengan Rp. 200.000.000,-) = 1 rangkap </p><p>8. Pas Photo warna ukuran 3×4 = 2 lembar Materai 6.000 = 2 lembar</p><p><br></p><p><b>SURAT IZIN TEMPAT USAHA (SITU)</b></p><p>Syarat – Syarat Pengurusan Surat Izin Tempar Usaha :</p><p>1. Fotocopy Kartu Tanda Penduduk ( KTP ) yang masih berlaku </p><p>2. Pajak Retribusi Daerah </p><p>3. Fotocopy Pajak Bumi bangunan ( PBB ) </p><p>4. Rekomendasi dari Kelurhan/ Desa </p><p>5. Fotocopy Surat Tanah </p><p>6. Fotocopy Kepesertaan atau bukti pembayaran iuran BPJS Ketenagakerjaan ( PT, CV ) </p><p>7. Melaporkan Surat Rekomendasi/ Surat Keterangan dari Kesehatan ( Dokter, Usaha Jualan Makanan, Apotik ) </p><p>8. Akta pendirian bagi PT, CV, yayasan, UD / Koperasi </p><p>9. Surat Penunjukan bagi Perusahaan Cabang / Perwakilan / akta Pendirian Cabang </p><p>10. Pas Foto ukuran 3 x 4 sebanyak 2 (dua) Lembar </p><p>11. Materai Rp. 6000,- 1 (satu) Lembar </p><p>12. Map 1 (satu) Pcs Fotocopy izin HO</p><p><br></p><p>SURAT IZIN BERKANTOR </p><p>Syarat- Syarat Pengurusan surat izin Berkantor : </p><p>1. Fotocopy KTP yang Masih berlaku = 1 lembar </p><p>2. Fotocopy SKRD Retribusi HO tahun berjalan = 1 lembar (Perpanjangan)</p><p>3. Fotocopy Retribusi Sampah = 1 Lembar </p><p>4. Fotocopy Rekomendasi Lurah/ Kades = 1 lembar </p><p>5. Fotocopy Surat Tanah/Perjanjian sewa-menyewa = 1 rangkap </p><p>6. Fotocopy PBB tahun berjalan = 1 rangkap </p><p>7. Fotocopy Akta Pendirian dari Notaris = 1 rangkap </p><p>8. Fotocopy SK Kemenhum & HAM ( Perpanjangan ) </p><p>9. Fotocopy akta Pendirian Cabang/Surat penunjukan Pimpinan Cabang = 1 rangkap/ Surat Kuasa </p><p>10. Fotocopy Surat rekomendasi/petunjuk teknis/keterangan instansi terkait</p><p>11. Fotocopy Bukti Kepesertaan/Bukti Pembayaran iuran BPJS Ketenagakerjaan</p><p>12. FotoCopy IMB = 1 rangkap Fotocopy Dokumen Amdal/UPL-UKL/SPPL Map 1 Pcs </p><p>13. Materai Rp. 6000,- = 2 lembar</p><p><br></p><p><b>SURAT KETERANGAN AHLI WARIS </b></p><p>Syarat – Syarat Pengurusan Surat Keterangan Ahli waris : </p><p>1. Surat Keterangan Kematian Asli dari Kelurahan/ Desa </p><p>2. Surat Pernyataan Ahli Waris diatas materai yang diketahui minimal 2 orang saksi </p><p>3. Surat Keterangan Ahli Waris dari kelurahan/ Desa </p><p>4. Kartu Keluarga (KK) Asli yang meninggal dunia </p><p>5. Foto Copy KTP Ahli Waris= 1 Lembar </p><p>6. Foto Copy Surat Nikah = 1 Lembar</p><p><br></p><p>SURAT PINDAH KELUAR</p><p>Syarat – Syarat Pengurusan Surat Pindah Keluar : </p><p>1. Surat Keterangan Pindah dari Kelurahan/ Desa Surat dari RT Kartu Keluarga ( KK ) Asli Pemohon Pindah </p><p>2. Fotocopy Kartu Buku Nikah orang tua dan pemohon yang mau pindah E-KTP asli<br></p><p><br></p>',1617895482);

/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table rt
# ------------------------------------------------------------

DROP TABLE IF EXISTS `rt`;

CREATE TABLE `rt` (
  `id_rt` int(5) NOT NULL AUTO_INCREMENT,
  `rt` varchar(20) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_rt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `rt` WRITE;
/*!40000 ALTER TABLE `rt` DISABLE KEYS */;

INSERT INTO `rt` (`id_rt`, `rt`, `deleted_at`)
VALUES
	(1,'1',NULL),
	(2,'2',NULL),
	(3,'3',NULL),
	(4,'4',NULL),
	(5,'5',NULL),
	(6,'6',NULL);

/*!40000 ALTER TABLE `rt` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table surat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surat`;

CREATE TABLE `surat` (
  `nomor` char(16) NOT NULL,
  `nama_kades` varchar(100) NOT NULL,
  `jabatan_kades` varchar(50) NOT NULL,
  `alamat_kades` varchar(100) NOT NULL,
  `nama_pemohon` varchar(100) NOT NULL,
  `ttl_pemohon` varchar(100) NOT NULL,
  `kewarganegaraan_pemohon` varchar(45) NOT NULL,
  `agama_pemohon` varchar(45) NOT NULL,
  `pekerjaan_pemohon` varchar(45) NOT NULL,
  `alamat_pemohon` varchar(100) NOT NULL,
  `nik_pemohon` int(11) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `berlaku` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `id_permohonan_surat` int(11) DEFAULT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




--
-- Dumping routines (PROCEDURE) for database 'dina_desa'
--
DELIMITER ;;

# Dump of PROCEDURE sp_dashboard_chartpenduduk
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `sp_dashboard_chartpenduduk` */;;
/*!50003 SET SESSION SQL_MODE="NO_AUTO_VALUE_ON_ZERO"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `sp_dashboard_chartpenduduk`()
BEGIN
CREATE TEMPORARY TABLE temp_penduduk
select 'Wanita' as gender,'Balita' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and usia >=0 and usia <=5
union all
select 'Wanita' as gender,'Anak - Anak' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and usia >=6 and usia <=9
union all
select 'Wanita' as gender,'Remaja' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and usia >=10 and usia <=18
union all
select 'Wanita' as gender,'Dewasa' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Wanita' and usia >18
union all
select 'Pria' as gender,'Balita' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and usia >=0 and usia <=5
union all
select 'Pria' as gender,'Anak - Anak' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and usia >=6 and usia <=9
union all
select 'Pria' as gender,'Remaja' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and usia >=10 and usia <=18
union all
select 'Pria' as gender,'Dewasa' as kategori_usia,count(*) as jumlah  FROM penduduk where gender='Pria' and usia >18;

select * from temp_penduduk;
drop TABLE temp_penduduk;
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE sp_permohonan_surat
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `sp_permohonan_surat` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `sp_permohonan_surat`(IN `aksi` VARCHAR(255), IN `param_id_surat_permohonan` INT(11), IN `param_nama` VARCHAR(100), IN `param_ttl` VARCHAR(100), IN `param_kewarganegaraan` VARCHAR(45), IN `param_agama` VARCHAR(45), IN `param_pekerjaan` VARCHAR(45), IN `param_alamat` VARCHAR(255), IN `param_nik` VARCHAR(45), IN `param_keperluan` VARCHAR(255), IN `param_keterangan` VARCHAR(255), IN `param_nomer` INT(11), IN `param_bulan` VARCHAR(20), IN `param_tahun` VARCHAR(10), IN `param_file_upload` VARCHAR(255))
BEGIN

/*
created by fq 2020-10-20
CARA EXECUTE :
kirim parameter aksi(insert,delete,edit,update) dari front end.
urutan parameter ada di atas.

CALL SP_KONTAK('insert',null,'Param_namapt','Param_address','Param_nomor','Param_email','Param_fb','Param_ig','Param_tw','Param_olx','Param_wa');
CALL SP_KONTAK('delete',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('edit',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('update',2,'Param_namapt2','Param_address2','Param_nomor2','Param_email2','Param_fb2','Param_ig2','Param_tw2','Param_olx2','Param_wa2');
CALL SP_KONTAK('show',null,null,null,null,null,null,null,null,null,null);
*/

	-- ==========================ERROR HANDLE CODE ==========================
	DECLARE EXIT HANDLER FOR 1062 SELECT 0 AS resutStatus,'Duplicate keys error encountered' msgStatus; 
    DECLARE EXIT HANDLER FOR 1048 SELECT 0 AS resutStatus,'Data Tidak Lengkap' msgStatus; 
    DECLARE EXIT HANDLER FOR 1265 SELECT 0 AS resutStatus,'Format Parameter Input Tidak Benar' msgStatus; 
	
    /*
    DECLARE exit handler for sqlexception
	BEGIN
		-- ERROR
	ROLLBACK;
	END;
   */
   
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
	SELECT 0 AS resutStatus,'Format Data Input Tidak Benar' msgStatus; 
	ROLLBACK;
	END;
    -- ==========================ERROR HANDLE CODE ==========================
    
    
	-- ======================START QUERY INSERT======================
	IF aksi="insert" THEN
    START TRANSACTION;
    INSERT INTO permohonan_surat (
    nama 
	,ttl
	,kewarganegaraan
	,agama
	,pekerjaan
	,alamat
	,nik
	,keperluan
	,keterangan
	,nomer
	,bulan
	,tahun
    ,file_upload
    ) 
    VALUES (
	param_nama
	,param_ttl 
	,param_kewarganegaraan 
	,param_agama
	,param_pekerjaan 
	,param_alamat 
	,param_nik
	,param_keperluan 
	,param_keterangan
	,param_nomer
	,param_bulan 
	,param_tahun 
    ,param_file_upload
    );
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Tambah Data' AS msgStatus;
    
    
    END IF;
    
	-- ======================END QUERY INSERT======================
    
    
    
    -- ======================START QUERY DELETE======================
    IF aksi="delete" THEN
    DELETE FROM permohonan_surat WHERE id_surat_permohonan=Param_id_surat_permohonan;
	SELECT 1 AS resutStatus, 'Berhasil Delete Data' AS msgStatus;
    END IF;
    -- ======================END QUERY DELETE======================
    
    
    
     -- ======================START QUERY EDIT======================
    IF aksi="edit" THEN
    SELECT * FROM permohonan_surat WHERE id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    
    IF aksi="create_no" THEN
    select ifnull((select nomer from dina_desa.permohonan_surat WHERE bulan=param_bulan and tahun=param_tahun order by nomer desc limit 1),0)+1 as nomer limit 1;
    END IF;
    
    
    
    
    -- ======================END QUERY EDIT======================
    

    
    -- ======================START QUERY UPDATE======================
    IF aksi="update" THEN
    START TRANSACTION;
    UPDATE permohonan_surat SET  
    nama = Param_nama,
	ttl = Param_ttl,
	kewarganegaraan = Param_kewarganegaraan,
	agama = Param_agama,
	pekerjaan = Param_pekerjaan,
	alamat = Param_alamat,
	nik = Param_nik,
    keperluan = Param_keperluan,
	keterangan = Param_keterangan,
	nomer = Param_nomer,
    bulan = Param_bulan,     
    tahun = Param_tahun,
    file_upload = param_file_upload
    WHERE id_surat_permohonan=Param_id_surat_permohonan;
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Update Data' AS msgStatus;
    END IF;
    -- ======================END QUERY UPDATE======================


     -- ======================START QUERY SHOW======================
    IF aksi="show" THEN
    SELECT * FROM permohonan_surat;
    END IF;
    
    IF aksi="AllPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan not in (select ifnull(id_permohonan_surat,0) from surat);
    END IF;
    
    IF aksi="SelectPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    -- ======================END QUERY SHOW======================	
    
    IF aksi NOT IN ('show','insert','update','edit','delete','show','create_no','AllPemohonSurat','SelectPemohonSurat') THEN
    SELECT 0 AS resutStatus, 'Parameter Aksi Belum Di seting' AS msgStatus;
    END IF;
    
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
# Dump of PROCEDURE sp_permohonan_surat_old
# ------------------------------------------------------------

/*!50003 DROP PROCEDURE IF EXISTS `sp_permohonan_surat_old` */;;
/*!50003 SET SESSION SQL_MODE="STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION"*/;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `sp_permohonan_surat_old`(IN `aksi` VARCHAR(255), IN `param_id_surat_permohonan` INT(11), IN `param_nama` VARCHAR(100), IN `param_ttl` VARCHAR(100), IN `param_kewarganegaraan` VARCHAR(45), IN `param_agama` VARCHAR(45), IN `param_pekerjaan` VARCHAR(45), IN `param_alamat` VARCHAR(255), IN `param_nik` VARCHAR(45), IN `param_keperluan` VARCHAR(255), IN `param_keterangan` VARCHAR(255), IN `param_nomer` INT(11), IN `param_bulan` VARCHAR(20), IN `param_tahun` VARCHAR(10), IN `param_file_upload` VARCHAR(255))
BEGIN

/*
created by fq 2020-10-20
CARA EXECUTE :
kirim parameter aksi(insert,delete,edit,update) dari front end.
urutan parameter ada di atas.

CALL SP_KONTAK('insert',null,'Param_namapt','Param_address','Param_nomor','Param_email','Param_fb','Param_ig','Param_tw','Param_olx','Param_wa');
CALL SP_KONTAK('delete',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('edit',1,null,null,null,null,null,null,null,null,null);
CALL SP_KONTAK('update',2,'Param_namapt2','Param_address2','Param_nomor2','Param_email2','Param_fb2','Param_ig2','Param_tw2','Param_olx2','Param_wa2');
CALL SP_KONTAK('show',null,null,null,null,null,null,null,null,null,null);
*/

	-- ==========================ERROR HANDLE CODE ==========================
	DECLARE EXIT HANDLER FOR 1062 SELECT 0 AS resutStatus,'Duplicate keys error encountered' msgStatus; 
    DECLARE EXIT HANDLER FOR 1048 SELECT 0 AS resutStatus,'Data Tidak Lengkap' msgStatus; 
    DECLARE EXIT HANDLER FOR 1265 SELECT 0 AS resutStatus,'Format Parameter Input Tidak Benar' msgStatus; 
	
    /*
    DECLARE exit handler for sqlexception
	BEGIN
		-- ERROR
	ROLLBACK;
	END;
   */
   
	DECLARE EXIT HANDLER FOR SQLWARNING
	BEGIN
	SELECT 0 AS resutStatus,'Format Data Input Tidak Benar' msgStatus; 
	ROLLBACK;
	END;
    -- ==========================ERROR HANDLE CODE ==========================
    
    
	-- ======================START QUERY INSERT======================
	IF aksi="insert" THEN
    START TRANSACTION;
    INSERT INTO permohonan_surat (
    nama 
	,ttl
	,kewarganegaraan
	,agama
	,pekerjaan
	,alamat
	,nik
	,keperluan
	,keterangan
	,nomer
	,bulan
	,tahun
    ,file_upload
    ) 
    VALUES (
	param_nama
	,param_ttl 
	,param_kewarganegaraan 
	,param_agama
	,param_pekerjaan 
	,param_alamat 
	,param_nik
	,param_keperluan 
	,param_keterangan
	,param_nomer
	,param_bulan 
	,param_tahun 
    ,param_file_upload
    );
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Tambah Data' AS msgStatus;
    
    
    END IF;
    
	-- ======================END QUERY INSERT======================
    
    
    
    -- ======================START QUERY DELETE======================
    IF aksi="delete" THEN
    DELETE FROM permohonan_surat WHERE id_surat_permohonan=Param_id_surat_permohonan;
	SELECT 1 AS resutStatus, 'Berhasil Delete Data' AS msgStatus;
    END IF;
    -- ======================END QUERY DELETE======================
    
    
    
     -- ======================START QUERY EDIT======================
    IF aksi="edit" THEN
    SELECT * FROM permohonan_surat WHERE id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    
    IF aksi="create_no" THEN
    select ifnull((select nomer from comx5552_desa.permohonan_surat WHERE bulan=param_bulan and tahun=param_tahun order by nomer desc limit 1),0)+1 as nomer limit 1;
    END IF;
    
    
    
    
    -- ======================END QUERY EDIT======================
    

    
    -- ======================START QUERY UPDATE======================
    IF aksi="update" THEN
    START TRANSACTION;
    UPDATE permohonan_surat SET  
    nama = Param_nama,
	ttl = Param_ttl,
	kewarganegaraan = Param_kewarganegaraan,
	agama = Param_agama,
	pekerjaan = Param_pekerjaan,
	alamat = Param_alamat,
	nik = Param_nik,
    keperluan = Param_keperluan,
	keterangan = Param_keterangan,
	nomer = Param_nomer,
    bulan = Param_bulan,     
    tahun = Param_tahun,
    file_upload = param_file_upload
    WHERE id_surat_permohonan=Param_id_surat_permohonan;
    COMMIT;
	SELECT 1 AS resutStatus, 'Berhasil Update Data' AS msgStatus;
    END IF;
    -- ======================END QUERY UPDATE======================


     -- ======================START QUERY SHOW======================
    IF aksi="show" THEN
    SELECT * FROM permohonan_surat;
    END IF;
    
    IF aksi="AllPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan not in (select ifnull(id_permohonan_surat,0) from surat);
    END IF;
    
    IF aksi="SelectPemohonSurat" THEN
    SELECT * FROM permohonan_surat where id_surat_permohonan=param_id_surat_permohonan;
    END IF;
    -- ======================END QUERY SHOW======================	
    
    IF aksi NOT IN ('show','insert','update','edit','delete','show','create_no','AllPemohonSurat','SelectPemohonSurat') THEN
    SELECT 0 AS resutStatus, 'Parameter Aksi Belum Di seting' AS msgStatus;
    END IF;
    
END */;;

/*!50003 SET SESSION SQL_MODE=@OLD_SQL_MODE */;;
DELIMITER ;

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
