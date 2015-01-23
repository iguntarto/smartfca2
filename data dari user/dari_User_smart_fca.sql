-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2014 pada 11.13
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smart_fca`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_detail`
--

CREATE TABLE IF NOT EXISTS `trx_detail` (
  `DOC_NUMBER` int(10) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `MONTH` int(2) NOT NULL,
  `LEVEL` varchar(5) NOT NULL,
  `AREA` varchar(5) NOT NULL,
  `FIATUR` varchar(5) NOT NULL,
  `APPROVAL_LEVEL` varchar(5) NOT NULL,
  `REJECT_FLAG` varchar(1) NOT NULL,
  `NOT_COMPLETE` varchar(1) NOT NULL,
  `FLOW_MAIN` text NOT NULL,
  `NAMA_MITRA` varchar(40) NOT NULL,
  `NAMA_PROYEK` varchar(100) NOT NULL,
  `KONTRAK_NO` varchar(30) NOT NULL,
  `KONTRAK_TGL` date NOT NULL,
  `KONTRAK_CURRENCY` varchar(3) NOT NULL,
  `KONTRAK_AMOUNT` double NOT NULL,
  `PO_SP_NO` varchar(30) NOT NULL,
  `PO_SP_TGL` date NOT NULL,
  `PO_SP_CURRENCY` varchar(3) NOT NULL,
  `PO_SP_AMOUNT` double NOT NULL,
  `AMANDEMEN_NO` varchar(30) NOT NULL,
  `AMANDEMEN_TGL` date NOT NULL,
  `AMANDEMEN_CURRENCY` varchar(3) NOT NULL,
  `AMANDEMEN_AMOUNT` double NOT NULL,
  `TRUE_VALUE_CURRENCY` varchar(3) NOT NULL,
  `TRUE_VALUE` double NOT NULL,
  `KETERANGAN` varchar(70) NOT NULL,
  `NO_SAP` varchar(15) NOT NULL,
  `TAGIHAN_MARK` varchar(1) NOT NULL,
  `TAGIHAN_NO` varchar(30) NOT NULL,
  `TAGIHAN_TGL` date NOT NULL,
  `TAGIHAN_TGL_MASUK` date NOT NULL,
  `INVOICE_MARK` varchar(1) NOT NULL,
  `INVOICE_NO` varchar(30) NOT NULL,
  `INVOICE_TGL` date NOT NULL,
  `INVOICE_TGL_MASUK` date NOT NULL,
  `PO_NON_PPN_MARK` varchar(1) NOT NULL,
  `PO_NON_PPN_CURRENCY` varchar(3) NOT NULL,
  `PO_NON_PPN_AMOUNT` double NOT NULL,
  `PO_NON_PPN_AMANDEMEN_CURRENCY` varchar(3) NOT NULL,
  `PO_NON_PPN_AMANDEMEN_AMOUNT` double NOT NULL,
  `PO_NON_PPN_THP_REKON` varchar(30) NOT NULL,
  `BATAS_AKHIR_PRJ_MARK` varchar(1) NOT NULL,
  `BATAS_AKHIR_PRJ_NO_BAUT` varchar(30) NOT NULL,
  `BAST_NON_PPN_MARK` varchar(1) NOT NULL,
  `BAST_NON_PPN_CURRENCY` varchar(3) NOT NULL,
  `BAST_NON_PPN_AMOUNT` double NOT NULL,
  `BAST_NON_PPN_BARANG` varchar(50) NOT NULL,
  `BAST_NON_PPN_JASA` varchar(50) NOT NULL,
  `BAST_NON_PPN_TGL_BAUT` date NOT NULL,
  `BAST_NON_PPN_TGL_BAST` date NOT NULL,
  `PTG_UANG_MUKA_MARK` varchar(1) NOT NULL,
  `PTG_UANG_MUKA_CURRENCY` varchar(3) NOT NULL,
  `PTG_UANG_MUKA_AMOUNT` double NOT NULL,
  `KUITANSI_PPN_MARK` varchar(1) NOT NULL,
  `KUITANSI_PPN_CURRENCY` varchar(3) NOT NULL,
  `KUITANSI_PPN_AMOUNT` double NOT NULL,
  `KUITANSI_PPN_ATAU` varchar(50) NOT NULL,
  `KUITANSI_PPN_NO` varchar(30) NOT NULL,
  `REKENING_MARK` varchar(1) NOT NULL,
  `REKENING_ATS_NAMA` varchar(30) NOT NULL,
  `REKENING_CURRENCY` varchar(3) NOT NULL,
  `REKENING_AMOUNT` double NOT NULL,
  `REKENING_BANK` varchar(20) NOT NULL,
  `REKENING_SW_CODE` varchar(30) NOT NULL,
  `FAKTUR_PJK_MARK` varchar(1) NOT NULL,
  `FAKTUR_PJK_CURRENCY` varchar(3) NOT NULL,
  `FAKTUR_PJK_AMOUNT` double NOT NULL,
  `FAKTUR_PJK_NO` varchar(30) NOT NULL,
  `FAKTUR_PJK_TGL` date NOT NULL,
  `JAMN_UANG_MUKA_MARK` varchar(1) NOT NULL,
  `JAMN_UANG_MUKA_CURRENCY` varchar(3) NOT NULL,
  `JAMN_UANG_MUKA_AMOUNT` double NOT NULL,
  `JAMN_UANG_MUKA_ASSR` varchar(30) NOT NULL,
  `JAMN_UANG_MUKA_EXPIRED` date NOT NULL,
  `JAMN_PELKSNA_MARK` varchar(1) NOT NULL,
  `JAMN_PELKSNA_CURRENCY` varchar(3) NOT NULL,
  `JAMN_PELKSNA_AMOUNT` double NOT NULL,
  `JAMN_PELKSNA_ASSR` varchar(30) NOT NULL,
  `JAMN_PELKSNA_EXPIRED` date NOT NULL,
  `JAMN_PLHRA_MARK` varchar(1) NOT NULL,
  `JAMN_PLHRA_CURRENCY` varchar(3) NOT NULL,
  `JAMN_PLHRA_AMOUNT` double NOT NULL,
  `JAMN_PLHRA_ASSR` varchar(30) NOT NULL,
  `JAMN_PLHRA_EXPIRED` date NOT NULL,
  `POLIS_ASUR_MARK` varchar(1) NOT NULL,
  `POLIS_ASUR_NO` varchar(30) NOT NULL,
  `POLIS_ASUR_ASSR` varchar(30) NOT NULL,
  `POLIS_ASUR_EXPIRED` date NOT NULL,
  `TD_TERIMA_BLD_DRAW_MARK` varchar(1) NOT NULL,
  `TD_TERIMA_BLD_DRAW_NO` varchar(30) NOT NULL,
  `TD_TERIMA_BLD_DRAW_TGL` date NOT NULL,
  `SIUJK_MARK` varchar(1) NOT NULL,
  `SIUJK_NO` varchar(30) NOT NULL,
  `SIUJK_TGL` date NOT NULL,
  `NPWP_MARK` varchar(1) NOT NULL,
  `NPWP_NO` varchar(30) NOT NULL,
  `NPWP_TGL` date NOT NULL,
  `F_DGT1_MARK` varchar(1) NOT NULL,
  `F_DGT1_NO` varchar(30) NOT NULL,
  `F_DGT1_TGL` date NOT NULL,
  `SIDE_LETTER_MARK` varchar(1) NOT NULL,
  `SIDE_LETTER_NO` varchar(30) NOT NULL,
  `SIDE_LETTER_TGL` date NOT NULL,
  `REKON_WAKTU_MARK` varchar(1) NOT NULL,
  `PO_MIGO_MARK` varchar(1) NOT NULL,
  `PO_MIGO_VALUE` varchar(30) NOT NULL,
  `CHANGED_BY` varchar(15) NOT NULL,
  `CHANGED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_BY` varchar(15) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_detail`
--

INSERT INTO `trx_detail` (`DOC_NUMBER`, `YEAR`, `MONTH`, `LEVEL`, `AREA`, `FIATUR`, `APPROVAL_LEVEL`, `REJECT_FLAG`, `NOT_COMPLETE`, `FLOW_MAIN`, `NAMA_MITRA`, `NAMA_PROYEK`, `KONTRAK_NO`, `KONTRAK_TGL`, `KONTRAK_CURRENCY`, `KONTRAK_AMOUNT`, `PO_SP_NO`, `PO_SP_TGL`, `PO_SP_CURRENCY`, `PO_SP_AMOUNT`, `AMANDEMEN_NO`, `AMANDEMEN_TGL`, `AMANDEMEN_CURRENCY`, `AMANDEMEN_AMOUNT`, `TRUE_VALUE_CURRENCY`, `TRUE_VALUE`, `KETERANGAN`, `NO_SAP`, `TAGIHAN_MARK`, `TAGIHAN_NO`, `TAGIHAN_TGL`, `TAGIHAN_TGL_MASUK`, `INVOICE_MARK`, `INVOICE_NO`, `INVOICE_TGL`, `INVOICE_TGL_MASUK`, `PO_NON_PPN_MARK`, `PO_NON_PPN_CURRENCY`, `PO_NON_PPN_AMOUNT`, `PO_NON_PPN_AMANDEMEN_CURRENCY`, `PO_NON_PPN_AMANDEMEN_AMOUNT`, `PO_NON_PPN_THP_REKON`, `BATAS_AKHIR_PRJ_MARK`, `BATAS_AKHIR_PRJ_NO_BAUT`, `BAST_NON_PPN_MARK`, `BAST_NON_PPN_CURRENCY`, `BAST_NON_PPN_AMOUNT`, `BAST_NON_PPN_BARANG`, `BAST_NON_PPN_JASA`, `BAST_NON_PPN_TGL_BAUT`, `BAST_NON_PPN_TGL_BAST`, `PTG_UANG_MUKA_MARK`, `PTG_UANG_MUKA_CURRENCY`, `PTG_UANG_MUKA_AMOUNT`, `KUITANSI_PPN_MARK`, `KUITANSI_PPN_CURRENCY`, `KUITANSI_PPN_AMOUNT`, `KUITANSI_PPN_ATAU`, `KUITANSI_PPN_NO`, `REKENING_MARK`, `REKENING_ATS_NAMA`, `REKENING_CURRENCY`, `REKENING_AMOUNT`, `REKENING_BANK`, `REKENING_SW_CODE`, `FAKTUR_PJK_MARK`, `FAKTUR_PJK_CURRENCY`, `FAKTUR_PJK_AMOUNT`, `FAKTUR_PJK_NO`, `FAKTUR_PJK_TGL`, `JAMN_UANG_MUKA_MARK`, `JAMN_UANG_MUKA_CURRENCY`, `JAMN_UANG_MUKA_AMOUNT`, `JAMN_UANG_MUKA_ASSR`, `JAMN_UANG_MUKA_EXPIRED`, `JAMN_PELKSNA_MARK`, `JAMN_PELKSNA_CURRENCY`, `JAMN_PELKSNA_AMOUNT`, `JAMN_PELKSNA_ASSR`, `JAMN_PELKSNA_EXPIRED`, `JAMN_PLHRA_MARK`, `JAMN_PLHRA_CURRENCY`, `JAMN_PLHRA_AMOUNT`, `JAMN_PLHRA_ASSR`, `JAMN_PLHRA_EXPIRED`, `POLIS_ASUR_MARK`, `POLIS_ASUR_NO`, `POLIS_ASUR_ASSR`, `POLIS_ASUR_EXPIRED`, `TD_TERIMA_BLD_DRAW_MARK`, `TD_TERIMA_BLD_DRAW_NO`, `TD_TERIMA_BLD_DRAW_TGL`, `SIUJK_MARK`, `SIUJK_NO`, `SIUJK_TGL`, `NPWP_MARK`, `NPWP_NO`, `NPWP_TGL`, `F_DGT1_MARK`, `F_DGT1_NO`, `F_DGT1_TGL`, `SIDE_LETTER_MARK`, `SIDE_LETTER_NO`, `SIDE_LETTER_TGL`, `REKON_WAKTU_MARK`, `PO_MIGO_MARK`, `PO_MIGO_VALUE`, `CHANGED_BY`, `CHANGED_AT`, `CREATED_BY`, `CREATED_AT`) VALUES
(1000000001, 2014, 10, 'VRKT', 'T0001', 'OFFCS', '', '', '', '', 'abc', 'abc1', '1234', '2014-10-05', 'IDR', 23000000, '121314151', '2014-10-05', 'IDR', 23000000, '1', '2014-10-07', 'IDR', 23000000, 'IDR', 23000000, 'pembayaran abc12234', '190000123456', 'X', '', '0000-00-00', '0000-00-00', 'X', '', '0000-00-00', '0000-00-00', 'X', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '2014-10-20 22:32:19', '610281', '2014-10-21 03:30:47'),
(1000000002, 2014, 10, 'MGR', 'T0002', 'OSM', 'OSM', '', '', '3', 'PT NEC Indonesia', 'Pengadaan dan Pemasangan Expandsi PE Speedy dan Redirector SP-3', 'K.TEL.0122/HK810/SUC-00/2013', '2013-07-08', 'IDR', 14947218231, 'K.TEL.0147/HK810/SUC-A1030000/', '2013-12-24', 'IDR', 14947218231, '0', '0000-00-00', 'IDR', 14947218231, 'IDR', 2466291008, 'Uang Muka K.TEL.0122/HK810/SUC-00/2013 Ekspan PE-Speedy', '1900018791', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', 'OSM', '2014-10-21 01:26:28', '660144', '2014-10-21 03:55:19'),
(1000000003, 2014, 10, 'VRKT', 'T0004', 'OFFCS', 'OFFCS', 'X', '', '5', 'abcd', 'abcd1', '132515241', '2014-10-21', 'IDR', 10000000, '41634134', '2014-10-21', 'IDR', 10000000, '0', '2014-10-21', 'IDR', 10000000, 'IDR', 10000000, 'jgdauaushfuf', 'gdgsjdgfjsg', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', 'OFFCS', '2014-10-21 01:57:15', '620203', '2014-10-21 06:53:08'),
(1000000004, 2014, 10, 'OFFCS', 'T0004', 'MGR', '', '', '', '', 'hdkshkdkh', 'hgasdhjbhsdf', 'HFGHGAHSF', '2014-10-21', 'IDR', 25000001, 'abhsghdfs', '2014-10-21', 'IDR', 25000001, 'ababf', '2014-10-21', 'IDR', 25000001, 'IDR', 25000001, 'BNBJASFJ1611', '19101118482', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '2014-10-21 02:01:30', '620203', '2014-10-21 06:54:57'),
(1000000005, 2014, 10, 'VRKT', 'T0002', 'OFFCS', '', '', '', '', 'abcd', 'abcd', '132324', '2014-10-21', 'IDR', 10000000, 'abagd', '2014-10-21', 'IDR', 10000000, 'kakaa', '2014-10-21', 'IDR', 10000000, 'IDR', 10000000, 'gsgsdgfg', '191010188', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '2014-10-21 02:15:12', '660144', '2014-10-21 07:08:47'),
(1000000006, 2014, 10, 'VRKT', 'T0002', 'OFFCS', '', '', '', '', ' mfksa kkfj', ' hakshksfks', '516511828', '2014-10-21', 'IDR', 30000000, '5151617171', '2014-10-21', 'IDR', 30000000, '818191919', '2014-10-15', 'IDR', 30000000, 'IDR', 10000000, 'ahauaiaka', '919101011', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '2014-10-21 02:46:48', '660144', '2014-10-21 07:11:34'),
(1000000007, 2014, 10, 'VRKT', 'T0005', 'OFFCS', '', '', '', '', 'bhkfkak', 'jsaknckds', 'hjfkhsdjk161736', '2014-10-21', 'IDR', 15000000, 'jsdlfjlsdfjl16212', '2014-10-21', 'IDR', 15000000, 'hah171812', '2014-10-21', 'IDR', 15000000, 'IDR', 15000000, 'nmaknxskhd', '1890819389013', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', '', '2014-10-21 04:02:21', '621260', '2014-10-21 09:01:47'),
(1000000008, 2014, 10, 'OFFCS', 'T0002', 'MGR', 'MGR', 'X', '', '4', 'jajdk', 'jksdjk', 'jkdjs100', '2014-10-23', 'IDR', 26000000, '0', '2014-10-23', 'IDR', 0, '0', '2014-10-23', 'IDR', 0, 'IDR', 26000000, 'akdksjdf', 'nkdasjsj', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', 'MGR', '2014-10-23 02:15:42', '660144', '2014-10-23 06:53:43'),
(1000000009, 2014, 10, 'OFFCS', 'T0002', 'MGR', 'MGR', 'X', '', '4', 'nahdhhhf', 'nfssfhfksfh', 'jdjkjdfdj', '2014-10-23', 'IDR', 0, 'kfkfkdf', '2014-10-23', 'IDR', 0, '0', '2014-10-23', 'IDR', 0, 'IDR', 25000001, 'kdlslsaf', '19191019191', '', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '0000-00-00', '0000-00-00', '', 'IDR', 0, '', 'IDR', 0, '', '', '', '', 'IDR', 0, '', '', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', 'IDR', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '', 'MGR', '2014-10-23 02:26:23', '700452', '2014-10-23 07:04:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_history`
--

CREATE TABLE IF NOT EXISTS `trx_history` (
`LOG_NUMBER` bigint(20) NOT NULL,
  `DOC_NUMBER` int(10) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `MONTH` int(2) NOT NULL,
  `USER` varchar(15) NOT NULL,
  `LEVEL` varchar(15) NOT NULL,
  `AREA` varchar(5) NOT NULL,
  `PRIORITY` int(2) NOT NULL,
  `STATUS` varchar(10) NOT NULL,
  `START_AT` datetime NOT NULL,
  `FINISH_AT` datetime NOT NULL,
  `NEXT_APPROVAL` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `trx_history`
--

INSERT INTO `trx_history` (`LOG_NUMBER`, `DOC_NUMBER`, `YEAR`, `MONTH`, `USER`, `LEVEL`, `AREA`, `PRIORITY`, `STATUS`, `START_AT`, `FINISH_AT`, `NEXT_APPROVAL`) VALUES
(1, 1000000001, 2014, 10, '610281', 'VRKT', 'T0001', 6, 'APPROVE', '2014-10-21 05:28:36', '2014-10-21 05:30:47', 'OFFCS'),
(2, 1000000001, 2014, 10, '591359', 'VRKT', 'T0001', 5, 'APPROVE', '2014-10-21 05:31:42', '2014-10-21 05:32:19', ''),
(3, 1000000002, 2014, 10, '660144', 'MGR', 'T0002', 6, 'APPROVE', '2014-10-21 05:55:30', '2014-10-21 08:24:41', 'MGR'),
(4, 1000000002, 2014, 10, '612506', 'MGR', 'T0002', 4, 'APPROVE', '2014-10-21 08:26:15', '2014-10-21 08:26:28', ''),
(5, 1000000003, 2014, 10, '620203', 'VRKT', 'T0004', 6, 'APPROVE', '2014-10-21 08:51:44', '2014-10-21 08:53:08', 'OFFCS'),
(6, 1000000004, 2014, 10, '620203', 'OFFCS', 'T0004', 6, 'APPROVE', '2014-10-21 08:55:06', '2014-10-21 08:55:50', 'OFFCS'),
(7, 1000000003, 2014, 10, '620819', 'VRKT', 'T0004', 5, 'REJECT', '2014-10-21 08:56:50', '2014-10-21 08:57:15', ''),
(8, 1000000004, 2014, 10, '620819', 'OFFCS', 'T0004', 5, 'APPROVE', '2014-10-21 08:57:17', '2014-10-21 08:57:19', ''),
(9, 1000000004, 2014, 10, '641889', 'OFFCS', 'T0004', 4, 'APPROVE', '2014-10-21 09:01:27', '2014-10-21 09:01:30', ''),
(10, 1000000005, 2014, 10, '660144', 'VRKT', 'T0002', 6, 'APPROVE', '2014-10-21 09:07:41', '2014-10-21 09:08:47', 'OFFCS'),
(11, 1000000006, 2014, 10, '660144', 'VRKT', 'T0002', 6, 'APPROVE', '2014-10-21 09:14:00', '2014-10-21 09:14:08', 'OFFCS'),
(12, 1000000005, 2014, 10, '630734', 'VRKT', 'T0002', 5, 'APPROVE', '2014-10-21 09:15:01', '2014-10-21 09:15:12', ''),
(13, 1000000006, 2014, 10, '630734', 'VRKT', 'T0002', 5, 'APPROVE', '2014-10-21 09:15:15', '2014-10-21 09:46:48', ''),
(14, 1000000007, 2014, 10, '621260', 'VRKT', 'T0005', 6, 'APPROVE', '2014-10-21 10:59:54', '2014-10-21 11:01:47', 'OFFCS'),
(15, 1000000007, 2014, 10, '620969', 'VRKT', 'T0005', 5, 'APPROVE', '2014-10-21 11:02:17', '2014-10-21 11:02:21', ''),
(16, 1000000008, 2014, 10, '660144', 'OFFCS', 'T0002', 6, 'APPROVE', '2014-10-23 08:50:44', '2014-10-23 08:53:43', 'OFFCS'),
(17, 1000000008, 2014, 10, '630734', 'OFFCS', 'T0002', 5, 'APPROVE', '2014-10-23 08:55:27', '2014-10-23 08:55:44', ''),
(18, 1000000009, 2014, 10, '700452', 'OFFCS', 'T0002', 6, 'APPROVE', '2014-10-23 09:05:20', '2014-10-23 09:09:56', 'OFFCS'),
(19, 1000000009, 2014, 10, '630734', 'OFFCS', 'T0002', 5, 'APPROVE', '2014-10-23 09:13:34', '2014-10-23 09:14:40', ''),
(20, 1000000008, 2014, 10, '612506', 'OFFCS', 'T0002', 4, 'REJECT', '2014-10-23 09:15:18', '2014-10-23 09:15:42', ''),
(21, 1000000009, 2014, 10, '612506', 'OFFCS', 'T0002', 4, 'REJECT', '2014-10-23 09:25:48', '2014-10-23 09:26:23', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_limitation`
--

CREATE TABLE IF NOT EXISTS `trx_limitation` (
  `PRIORITY` int(2) NOT NULL,
  `LEVEL` varchar(5) NOT NULL,
  `FIATUR` varchar(5) NOT NULL,
  `MIN_VALUE` double NOT NULL,
  `MAX_VALUE` double NOT NULL,
  `CURRENCY` varchar(3) NOT NULL,
  `FLOW` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_limitation`
--

INSERT INTO `trx_limitation` (`PRIORITY`, `LEVEL`, `FIATUR`, `MIN_VALUE`, `MAX_VALUE`, `CURRENCY`, `FLOW`) VALUES
(1, 'SGM', 'DPT', 100000000001, 900000000000, 'IDR', '6,4,3,2'),
(2, 'DPT', 'DPT', 25000000001, 100000000000, 'IDR', '6,4,3,2'),
(3, 'OSM', 'DPT', 5000000001, 25000000000, 'IDR', '6,4,3,2'),
(4, 'MGR', 'OSM', 250000001, 5000000000, 'IDR', '6,4,3'),
(5, 'OFFCS', 'MGR', 25000001, 250000000, 'IDR', '6,5,4'),
(6, 'VRKT', 'OFFCS', 0, 25000000, 'IDR', '6,5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trx_number`
--

CREATE TABLE IF NOT EXISTS `trx_number` (
  `DOC_NUMB_START` int(10) NOT NULL,
  `YEAR` int(4) NOT NULL,
  `CURRENT_DOC_NUMB` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trx_number`
--

INSERT INTO `trx_number` (`DOC_NUMB_START`, `YEAR`, `CURRENT_DOC_NUMB`) VALUES
(1000000000, 2014, 1000000009),
(1000000000, 2015, 1000000000),
(1000000000, 2016, 1000000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_authorization`
--

CREATE TABLE IF NOT EXISTS `user_authorization` (
  `USERNAME` varchar(15) NOT NULL,
  `LEVEL` varchar(5) NOT NULL,
  `AREA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_authorization`
--

INSERT INTO `user_authorization` (`USERNAME`, `LEVEL`, `AREA`) VALUES
('590393', 'MGR', 'T0001'),
('590737', 'MGR', 'T0006'),
('591359', 'OFFCS', 'T0001'),
('591660', 'VRKT', 'T0003'),
('610281', 'VRKT', 'T0001'),
('611143', 'OFFCS', 'T0006'),
('611209', 'VRKT', 'T0001'),
('611716', 'VRKT', 'T0003'),
('612506', 'MGR', 'T0002'),
('620203', 'VRKT', 'T0004'),
('620457', 'VRKT', 'T0006'),
('620819', 'OFFCS', 'T0004'),
('620820', 'VRKT', 'T0003'),
('620969', 'OFFCS', 'T0005'),
('621260', 'VRKT', 'T0005'),
('621494', 'MGR', 'T0005'),
('622281', 'OFFCS', 'T0001'),
('630734', 'OFFCS', 'T0002'),
('630827', 'OFFCS', 'T0001'),
('632163', 'VRKT', 'T0004'),
('640694', 'VRKT', 'T0001'),
('641107', 'VRKT', 'T0002'),
('641889', 'MGR', 'T0004'),
('641893', 'MGR', 'T0003'),
('650459', 'VRKT', 'T0006'),
('660144', 'VRKT', 'T0002'),
('670019', 'VRKT', 'T0004'),
('670071', 'OFFCS', 'T0003'),
('680007', 'VRKT', 'T0005'),
('680450', 'VRKT', 'T0002'),
('700452', 'VRKT', 'T0002'),
('710240', 'VRKT', 'T0003'),
('admin', 'ADMIN', 'I000'),
('DPT', 'DPT', 'I001'),
('MGR', 'MGR', 'I001'),
('OFFCS', 'OFFCS', 'I001'),
('OSM', 'OSM', 'I001'),
('SGM', 'SGM', 'I001'),
('VRKT', 'VRKT', 'I001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `USERNAME` varchar(15) NOT NULL,
  `NAMA_DEPAN` varchar(15) NOT NULL,
  `NAMA_BELAKANG` varchar(15) NOT NULL,
  `DEPARTEMEN` text NOT NULL,
  `AREA` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_detail`
--

INSERT INTO `user_detail` (`USERNAME`, `NAMA_DEPAN`, `NAMA_BELAKANG`, `DEPARTEMEN`, `AREA`) VALUES
('590393', 'NOOR INDAH TRIW', 'q', 'CASH OPERATION', 'T0001'),
('590737', 'TOTO AGUNG PRAB', '', 'FINANCE CENTER', 'T0006'),
('591359', 'SULISTYAWARNI', '', 'CASH & BANK', 'T0001'),
('591660', 'UDIN SARIPUDIN', '', 'FINANCE SERVICE', 'T0003'),
('610281', 'SHOEFI KADARIAH', '', 'FINANCE SERVICE', 'T0001'),
('611143', 'ARSAD ACHMAD BE', '', 'CASH & BANK', 'T0006'),
('611209', 'TATI RUSTIYATI', '', 'FINANCE SERVICE', 'T0001'),
('611716', 'BAMBANG SULISTI', '', 'FINANCE SERVICE', 'T0003'),
('612506', 'RITA HARTATI', '', 'FINANCE SERVICE', 'T0002'),
('620203', 'SITI LILIS ROSI', '', 'FINANCE SERVICE', 'T0004'),
('620457', 'NASRUL IRIANTO', '', 'FINANCE SERVICE', 'T0006'),
('620819', 'TIA UTARY', '', 'CASH & BANK', 'T0004'),
('620820', 'SUMIATI', '', 'FINANCE SERVICE', 'T0003'),
('620969', 'MEIDIAWATI', '', 'CASH & BANK', 'T0005'),
('621260', 'NURDIN ISMAIL', '', 'FINANCE SERVICE', 'T0005'),
('621494', 'KRISNO WIBOWO', '', 'FINANCE CORPORATE', 'T0005'),
('622281', 'SUMBONO', '', 'CASH IN OPERATION', 'T0001'),
('630734', 'HARYANTA', '', 'CASH & BANK', 'T0002'),
('630827', 'PRIWANTI', '', 'FINANCE SERVICE', 'T0001'),
('632163', 'HELLY TRESNAWAT', '', 'FINANCE SERVICE', 'T0004'),
('640694', 'SYAMTARI WARA S', '', 'FINANCE SERVICE', 'T0001'),
('641107', 'FIRDATIN HASTUT', '', 'FINANCE SERVICE', 'T0002'),
('641889', 'SUWARSONO', '', 'FINANCE SERVICE', 'T0004'),
('641893', 'NURYAHYA', '', 'FINANCE SERVICE', 'T0003'),
('650459', 'EFRIYANTI', '', 'FINANCE SERVICE', 'T0006'),
('660144', 'HESTI MULIASARI', '', 'FINANCE SERVICE', 'T0002'),
('670019', 'SRI WAHYUNI, SA', '', 'FINANCE SERVICE', 'T0004'),
('670071', 'SRI POERNAMADEW', '', 'CASH & BANK', 'T0003'),
('680007', 'HASUNA SAIDA', '', 'FINANCE SERVICE', 'T0005'),
('680450', 'EVA PETTY', '', 'FINANCE SERVICE', 'T0002'),
('700452', 'ELNITA HASYIM', '', 'FINANCE SERVICE', 'T0002'),
('710240', 'IIS AGUSTINI', '', 'FINANCE SERVICE', 'T0003'),
('admin', 'administrator', 'smart fca', 'IT', 'I000'),
('DPT', 'DEPUTY DPN', 'BELAKANG', 'FINANCE', ''),
('MGR', 'MANAGER FI DPN', 'BELAKANG', 'FINANCE', ''),
('OFFCS', 'OFFICER CS DPN', 'BELAKANG', 'FINANCE', ''),
('OSM', 'OSM FCA 5 DPN', 'BELAKANG', 'FINANCE', ''),
('SGM', 'SGM FBCC DPN', 'BELAKANG', 'FINANCE', ''),
('VRKT', 'Verifikator DPN', 'BLKG', 'FINANCE', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_mapping`
--

CREATE TABLE IF NOT EXISTS `user_mapping` (
`INDEX` int(11) NOT NULL,
  `LEVEL` varchar(5) NOT NULL,
  `LEVEL_TEXT` varchar(30) NOT NULL,
  `AREA` varchar(5) NOT NULL,
  `AREA_TEXT` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=178 ;

--
-- Dumping data untuk tabel `user_mapping`
--

INSERT INTO `user_mapping` (`INDEX`, `LEVEL`, `LEVEL_TEXT`, `AREA`, `AREA_TEXT`) VALUES
(158, 'MGR', 'FINANCE SERVICE', 'T0001', 'UNIT BANDUNG I'),
(159, 'OFFCS', 'CASH & BANK', 'T0001', 'UNIT BANDUNG I'),
(160, 'OFFCS', 'FINANCE SERVICE', 'T0001', 'UNIT BANDUNG I'),
(161, 'OFFCS', 'CASH IN OPERATION', 'T0001', 'UNIT BANDUNG I'),
(162, 'VRKT', 'FINANCE SERVICE', 'T0001', 'UNIT BANDUNG I'),
(163, 'MGR', 'FINANCE SERVICE', 'T0002', 'UNIT BANDUNG II'),
(164, 'OFFCS', 'CASH & BANK', 'T0002', 'UNIT BANDUNG II'),
(165, 'VRKT', 'FINANCE SERVICE', 'T0002', 'UNIT BANDUNG II'),
(166, 'MGR', 'FINANCE SERVICE', 'T0003', 'UNIT BANDUNG III'),
(167, 'OFFCS', 'CASH & BANK', 'T0003', 'UNIT BANDUNG III'),
(168, 'VRKT', 'FINANCE SERVICE', 'T0003', 'UNIT BANDUNG III'),
(169, 'MGR', 'FINANCE SERVICE', 'T0004', 'UNIT BANDUNG IV'),
(170, 'OFFCS', 'CASH & BANK', 'T0004', 'UNIT BANDUNG IV'),
(171, 'VRKT', 'FINANCE SERVICE', 'T0004', 'UNIT BANDUNG IV'),
(172, 'MGR', 'FINANCE', 'T0005', 'CORPORATE JAKARTA'),
(173, 'OFFCS', 'CASH & BANK', 'T0005', 'CORPORATE JAKARTA'),
(174, 'VRKT', 'FINANCE SERVICE', 'T0005', 'CORPORATE JAKARTA'),
(175, 'MGR', 'FINANCE', 'T0006', 'CENTER JAKARTA'),
(176, 'OFFCS', 'CASH & BANK', 'T0006', 'CENTER JAKARTA'),
(177, 'VRKT', 'FINANCE SERVICE', 'T0006', 'CENTER JAKARTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_password`
--

CREATE TABLE IF NOT EXISTS `user_password` (
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_password`
--

INSERT INTO `user_password` (`USERNAME`, `PASSWORD`) VALUES
('590393', '58b1250385c806c'),
('590737', '58b1250385c806c'),
('591359', '58b1250385c806c'),
('591660', '58b1250385c806c'),
('610281', '58b1250385c806c'),
('611143', '58b1250385c806c'),
('611209', '58b1250385c806c'),
('611716', '58b1250385c806c'),
('612506', '58b1250385c806c'),
('620203', '58b1250385c806c'),
('620457', '58b1250385c806c'),
('620819', '58b1250385c806c'),
('620820', '58b1250385c806c'),
('620969', '58b1250385c806c'),
('621260', '58b1250385c806c'),
('621494', '58b1250385c806c'),
('622281', '58b1250385c806c'),
('630734', '58b1250385c806c'),
('630827', '58b1250385c806c'),
('632163', '58b1250385c806c'),
('640694', '58b1250385c806c'),
('641107', '58b1250385c806c'),
('641889', '58b1250385c806c'),
('641893', '58b1250385c806c'),
('650459', '58b1250385c806c'),
('660144', '58b1250385c806c'),
('670019', '58b1250385c806c'),
('670071', '58b1250385c806c'),
('680007', '58b1250385c806c'),
('680450', '58b1250385c806c'),
('700452', '58b1250385c806c'),
('710240', '58b1250385c806c'),
('admin', '77e2e04412bb882'),
('DPT', '53184580bb2a158'),
('MGR', '7363a902afb9648'),
('OFFCS', '07a2ba935e443d5'),
('OSM', 'e2b8442ca278d23'),
('SGM', '71b20221a48d73b'),
('VRKT', '30e8f8469e691a3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `trx_detail`
--
ALTER TABLE `trx_detail`
 ADD PRIMARY KEY (`DOC_NUMBER`,`YEAR`,`MONTH`,`LEVEL`,`AREA`,`FIATUR`,`APPROVAL_LEVEL`);

--
-- Indexes for table `trx_history`
--
ALTER TABLE `trx_history`
 ADD PRIMARY KEY (`LOG_NUMBER`,`DOC_NUMBER`,`YEAR`,`MONTH`,`USER`);

--
-- Indexes for table `trx_limitation`
--
ALTER TABLE `trx_limitation`
 ADD PRIMARY KEY (`PRIORITY`,`LEVEL`,`FIATUR`);

--
-- Indexes for table `trx_number`
--
ALTER TABLE `trx_number`
 ADD PRIMARY KEY (`YEAR`);

--
-- Indexes for table `user_authorization`
--
ALTER TABLE `user_authorization`
 ADD PRIMARY KEY (`USERNAME`,`LEVEL`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
 ADD PRIMARY KEY (`USERNAME`);

--
-- Indexes for table `user_mapping`
--
ALTER TABLE `user_mapping`
 ADD PRIMARY KEY (`INDEX`,`LEVEL`,`AREA`);

--
-- Indexes for table `user_password`
--
ALTER TABLE `user_password`
 ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trx_history`
--
ALTER TABLE `trx_history`
MODIFY `LOG_NUMBER` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_mapping`
--
ALTER TABLE `user_mapping`
MODIFY `INDEX` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=178;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
