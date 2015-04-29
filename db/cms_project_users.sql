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
-- Table structure for table `cms_project_users`
--

CREATE TABLE IF NOT EXISTS `cms_project_users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `last_login` date NOT NULL,
  `ux` int(11) NOT NULL,
  `des` int(11) NOT NULL,
  `dev` int(11) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_project_users`
--

INSERT INTO `cms_project_users` (`id`, `admin`, `name`, `password`, `email`, `last_login`, `ux`, `des`, `dev`, `info`) VALUES
(1, 1, 'Bjorn', '$2a$08$QPavslpzrDKnuEiUemsQn.hDe2DqS0uIFSmVgkRA9RH2rcwHOiNty', 'bjorn.derudder@gmail.com', '2015-04-24', 65, 35, 95, 'Ik ben Bjorn.'),
(2, 1, 'Bram', '$2a$08$uWSpglN7zkKJh9Pl5uEn1eAmvxuevwfynBIpi08pYDzK0A/.p6X2O', 'bram.derudder1993@gmail.com', '0000-00-00', 60, 75, 95, 'Ik ben Bram en ik hou van design.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
