-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Paź 2016, 20:47
-- Wersja serwera: 10.1.9-MariaDB
-- Wersja PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cpu`
--

CREATE TABLE IF NOT EXISTS `cpu` (
  `cpu_id` int(11) NOT NULL AUTO_INCREMENT,
  `producer` varchar(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `cores` tinyint(2) NOT NULL,
  `clock` smallint(4) NOT NULL,
  `unlocked` tinyint(1) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quanity` int(5) NOT NULL,
  `picture` varchar(30) NOT NULL DEFAULT 'img/',
  PRIMARY KEY (`cpu_id`),
  KEY `pr_id` (`producer`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `cpu`
--

INSERT INTO `cpu` (`cpu_id`, `producer`, `name`, `cores`, `clock`, `unlocked`, `price`, `quanity`, `picture`) VALUES
(1, 'Intel', 'i5 4460', 4, 3200, 0, '805.00', 20, 'img/i5h.jpg'),
(3, 'Intel', 'i5 6600K', 4, 3500, 1, '1079.00', 52, 'img/i5u.jpg'),
(4, 'Intel', 'i5 6400', 4, 2700, 0, '809.00', 60, 'img/i5.jpg'),
(5, 'Intel', 'i3 6100', 2, 3700, 0, '505.00', 23, 'img/i3.jpg'),
(6, 'AMD', 'FX 6300', 6, 3500, 1, '425.00', 79, 'img/fx.jpg'),
(7, 'Intel', 'i7 6700K', 4, 4000, 1, '1539.00', 22, 'img/i7u.jpg'),
(8, 'Intel', 'i3 4170', 2, 3700, 0, '505.00', 25, 'img/i3h.jpg'),
(9, 'AMD', 'FX 8300', 8, 3300, 1, '519.00', 34, 'img/fx.jpg'),
(10, 'AMD', 'FX 9590', 8, 4700, 1, '1049.00', 19, 'img/fx.jpg'),
(11, 'AMD', 'FX 8350', 8, 4000, 1, '659.00', 24, 'img/fx.jpg'),
(12, 'AMD', 'Athlon X4 845', 4, 3500, 0, '259.00', 47, 'img/athlon.jpg'),
(13, 'Intel', 'Pentium G4400', 2, 3300, 0, '239.00', 25, 'img/ip.jpg'),
(14, 'Intel', 'i7 6950X', 10, 3000, 1, '7587.00', 9, 'img/i7u.jpg'),
(15, 'Intel', 'i7 5960X', 8, 3000, 1, '4839.00', 17, 'img/i7u.jpg'),
(16, 'Intel', 'Celeron G1840', 2, 2800, 0, '159.00', 32, 'img/ic.jpg'),
(17, 'AMD', 'APU A4-3400', 2, 2700, 0, '46.90', 30, 'img/apu4.jpg'),
(18, 'AMD', 'APU A8-7650K', 4, 3300, 1, '369.00', 45, 'img/apu8.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cpu_prod`
--

CREATE TABLE IF NOT EXISTS `cpu_prod` (
  `producer` varchar(6) NOT NULL,
  PRIMARY KEY (`producer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `cpu_prod`
--

INSERT INTO `cpu_prod` (`producer`) VALUES
('AMD'),
('Intel');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu`
--

CREATE TABLE IF NOT EXISTS `gpu` (
  `gpu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(30) NOT NULL,
  `series` varchar(7) NOT NULL,
  `model` varchar(50) NOT NULL,
  `vram` tinyint(1) NOT NULL,
  `bus` smallint(5) NOT NULL,
  `memory_type` varchar(7) NOT NULL DEFAULT 'GDDR5',
  `price` decimal(10,2) NOT NULL,
  `quanity` int(5) NOT NULL,
  `picture` varchar(35) NOT NULL DEFAULT 'img/.jpg',
  PRIMARY KEY (`gpu_id`),
  KEY `mr_id` (`manufacturer`),
  KEY `series_id` (`series`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `gpu`
--

INSERT INTO `gpu` (`gpu_id`, `manufacturer`, `series`, `model`, `vram`, `bus`, `memory_type`, `price`, `quanity`, `picture`) VALUES
(1, 'Sapphire', 'Radeon', 'R9 390 NITRO', 8, 512, 'GDDR5', '1329.00', 15, 'img/r390.jpg'),
(2, 'Asus', 'GeForce', 'GTX 1060 STRIX', 6, 192, 'GDDR5', '1479.00', 45, 'img/1060.jpg'),
(3, 'EVGA', 'GeForce', 'GTX 1080 FTW Gaming ACX', 8, 256, 'GDDR5X', '3389.99', 27, 'img/1080e.jpg'),
(4, 'Sapphire', 'Radeon', 'R9 FURY NITRO', 4, 4096, 'HBM', '1443.01', 8, 'img/rfury.jpg'),
(5, 'MSI', 'Radeon', 'RX 470 GAMING X', 8, 256, 'GDDR5', '1259.00', 25, 'img/r470.jpg'),
(7, 'MSI', 'Radeon', 'RX 470 GAMING X', 4, 256, 'GDDR5', '1041.59', 34, 'img/r470.jpg'),
(8, 'Gigabyte', 'GeForce', 'GTX 1070', 8, 256, 'GDDR5', '2089.00', 42, 'img/1070.jpg'),
(9, 'MSI', 'GeForce', 'GTX 750Ti', 2, 128, 'GDDR5', '495.00', 28, 'img/750ti.jpg'),
(12, 'Palit', 'GeForce', 'GTX 960 Super JetStream', 2, 128, 'GDDR5', '859.00', 16, 'img/960.jpg'),
(13, 'Zotac', 'GeForce', 'GTX 950 AMP', 2, 128, 'GDDR5', '729.00', 21, 'img/950.jpg'),
(14, 'XFX', 'Radeon', 'Pro Duo ', 8, 4096, 'HBM', '7264.92', 4, 'img/rpro.jpg'),
(15, 'Asus', 'Radeon', 'RX 480', 8, 256, 'GDDR5', '1349.00', 48, 'img/r480.jpg'),
(16, 'EVGA', 'GeForce', 'GTX TITAN X', 12, 384, 'GDDR5', '6665.00', 7, 'img/titan.jpg'),
(17, 'Palit', 'GeForce', 'GTX 1080 GameRock Premium Edition', 8, 256, 'GDDR5X', '3939.20', 14, 'img/1080p.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu_man`
--

CREATE TABLE IF NOT EXISTS `gpu_man` (
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `gpu_man`
--

INSERT INTO `gpu_man` (`name`) VALUES
('Asus'),
('EVGA'),
('Gigabyte'),
('MSI'),
('Palit'),
('Sapphire'),
('XFX'),
('Zotac');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gpu_series`
--

CREATE TABLE IF NOT EXISTS `gpu_series` (
  `name` varchar(7) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `gpu_series`
--

INSERT INTO `gpu_series` (`name`) VALUES
('GeForce'),
('Radeon');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `newsletter_id` int(11) NOT NULL AUTO_INCREMENT,
  `e-mail` varchar(255) NOT NULL,
  PRIMARY KEY (`newsletter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `e-mail`) VALUES
(1, 'amanda@gmail.com'),
(3, 'stefan@gmail.com'),
(4, 'haha@op.pl'),
(5, 'amanda5@gmail.com'),
(6, 'stefan23@gmail.com'),
(7, 'amanda2@gmail.com'),
(8, 'stefan223@gmail.com'),
(9, 'stefan2213@gmail.com');


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for cpu
--

--
-- Zrzut danych tabeli `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'shop', 'cpu', '{"sorted_col":"`cpu`.`cpu_id` ASC"}', '2016-10-02 08:44:14');

--
-- Metadata for cpu_prod
--

--
-- Metadata for gpu
--

--
-- Zrzut danych tabeli `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'shop', 'gpu', '{"sorted_col":"`gpu`.`price`  ASC"}', '2016-10-02 13:51:08');

--
-- Metadata for gpu_man
--

--
-- Zrzut danych tabeli `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'shop', 'gpu_man', '[]', '2016-10-05 07:37:06');

--
-- Metadata for gpu_series
--

--
-- Metadata for newsletter
--

--
-- Metadata for shop
--

--
-- Zrzut danych tabeli `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('shop', 'cpu', 'producer', 'shop', 'cpu_prod', 'producer'),
('shop', 'gpu', 'manufacturer', 'shop', 'gpu_man', 'name'),
('shop', 'gpu', 'series', 'shop', 'gpu_series', 'name');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
