-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2017 at 07:52 AM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `level`) VALUES
('asuss', 'asuss', 'master');

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
('wison', '09090900', 'franshermawan96@gmail.com', '14/TK42097', 'a', 'a', 'a', 'a', 'a', ''),
('jassjdklajl', '989089809', 'ljaljsdlk@gmail.com', '809890', '080', '89080', '809', '88', '0989', '26102017064329240_F_152902022_QztERf38ZahgsamiU5PDcP1vnr9SA2NR.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
