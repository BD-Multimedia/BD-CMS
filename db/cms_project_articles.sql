-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 29 apr 2015 om 15:59
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `test`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cms_project_articles`
--

CREATE TABLE IF NOT EXISTS `cms_project_articles` (
  `id` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Text` text NOT NULL,
  `author` varchar(25) NOT NULL,
  `show` tinyint(4) DEFAULT NULL,
  `LastMod` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `cms_project_articles`
--

INSERT INTO `cms_project_articles` (`id`, `Title`, `Date`, `Text`, `author`, `show`, `LastMod`) VALUES
(1, 'CMS Project by BDMultmidia', '2015-03-07', '<p>We here at BD Multimedia have a passion for everything that deals with your experience with surfing on the Internet. As our passion for a CMS started to grow, two weeks ago we found ourself some spare time to create a new project that&#39;s when we started creating our own CMS.</p>\n\n<p>Now two weeks later I am proud to introduce you to our ALPHA CMS, we are looking for some b&egrave;ta-testers for the near future. We are continuously developing the platform to release it to you as soon we decide to.</p>\n\n<p>Spread the word through any way you can imagine,... I mean, every way is a good way...</p>\n\n<p>Sincerely Greetings</p>\n\n<p>Bjorn Derudder Developer</p>\n\n<p>@BD Multimedia</p>\n', 'Bjorn', 1, '2015-04-29'),
(2, 'A hard day of work...', '2015-03-09', '<p>Today I did a good leap forward in coding and feel like the CMS is realy getting in shape.</p>\r\n\r\n<p>I think the CMS will be earlier in Beta than i could have ever thought. I wil place all the files sooner or later on the <a href="howto.php">howto page</a> so you can go ahead and try out our CMS.</p>\r\n\r\n<p>Sincerely Greetings</p>\r\n\r\n<p>Bjorn Derudder</p>\r\n\r\n<p>Developer @BD Multimedia</p>\r\n', 'bjorn', 1, '2015-04-29'),
(4, 'Starting with a design!', '2015-03-16', '<p>We will soon start with a <strong>standard theme for the cms</strong>. Let&#39;s hope everything goes smooth and we have <strong>no trouble implementing the functionality</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sincerely greets,</p>\r\n\r\n<p>Derudder Bram</p>\r\n\r\n<p>Designer/Front-end developer <strong>@ <a href="http://www.bdmultimedia.be" target="_blank">BDmultimedia</a></strong></p>\r\n', 'bram', 1, '2015-04-29'),
(5, 'Bootstrap', '2015-03-17', '<p>Dear followers</p>\r\n\r\n<p>We are working hard on a standard theme for our CMS and we are currently developing our CMS in Bootstrap so it will be easier to port our system to bigger screens as we are now focusing on mobile devices.</p>\r\n\r\n<p>We are now developing in a ease pace so we don&#39;t oversee important things.</p>\r\n\r\n<p>We are continuously developing as for now we already implemented a WYSIWYG-editor. We are using the FCKeditor (&nbsp;<a href="http://www.ckeditor.com" target="_blank">http://www.ckeditor.com</a>&nbsp;) this is an open source editor that is very powerful for mobile as fpr bigger screens.</p>\r\n\r\n<p>We hope you keep spreading the words!</p>\r\n\r\n<p>Sincerely Greetings</p>\r\n\r\n<p>Bjorn Derudder</p>\r\n\r\n<p>Developer @ BD Multimedia</p>\r\n', 'bjorn', 1, '2015-04-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
