-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2017 at 07:37 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporin`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `nama` varchar(25) NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `no_id` varchar(25) NOT NULL,
  `kab` varchar(25) NOT NULL,
  `kec` varchar(25) NOT NULL,
  `sekolah` varchar(25) NOT NULL,
  `jenis_masalah` varchar(25) NOT NULL,
  `des_masalah` text NOT NULL,
  `bukti` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelapor`
--

INSERT INTO `pelapor` (`nama`, `no_telp`, `email`, `no_id`, `kab`, `kec`, `sekolah`, `jenis_masalah`, `des_masalah`, `bukti`) VALUES
('asdaj', 'jkh', 'jkjk', 'h', 'khk', 'hk', 'hkjh', 'kh', 'kjh', '2310201706183420170719_105806.jpg'),
('sada', 'a', 'a', 'a', 'a', 'aa', 'aa', 'sa', 'a', '2310201706504220170719_105814.jpg'),
('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '23102017071942240_F_152902022_QztERf38ZahgsamiU5PDcP1vnr9SA2NR.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
