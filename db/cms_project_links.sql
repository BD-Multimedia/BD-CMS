-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: 10.246.16.118:3306
-- Generation Time: Apr 29, 2015 at 01:22 PM
-- Server version: 5.5.42-MariaDB-1~wheezy
-- PHP Version: 5.3.3-7+squeeze15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bdmultimedia_be`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_project_links`
--

CREATE TABLE IF NOT EXISTS `cms_project_links` (
  `inhoud` text NOT NULL,
  `link` text NOT NULL,
  `show` int(1) DEFAULT NULL,
  `login` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_project_links`
--

INSERT INTO `cms_project_links` (`inhoud`, `link`, `show`, `login`, `admin`) VALUES
('Home', 'index.php', 1, 0, 0),
('About', 'about.php', 1, 0, 0),
('Admin', 'admin.php', 1, 2, 1),
('Login', 'login.php', 1, 1, 0),
('Personal', 'personal.php', 1, 2, 0),
('How To', 'howto.php', 1, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
