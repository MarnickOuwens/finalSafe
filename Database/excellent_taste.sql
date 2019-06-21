-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jun 2019 om 14:16
-- Serverversie: 10.1.40-MariaDB
-- PHP-versie: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excellent taste`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

CREATE TABLE `bestelling` (
  `id` int(4) NOT NULL,
  `Tafel` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Datum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Tijd` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `MenuItemcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Aantal` int(11) NOT NULL,
  `Prijs` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `bestelling`
--

INSERT INTO `bestelling` (`id`, `Tafel`, `Datum`, `Tijd`, `MenuItemcode`, `Aantal`, `Prijs`) VALUES
(1, '1', '21-06-2019', '12:00', 'TEST', 3, '7.50'),
(2, '5', '24-06-2019', '12:00', 'Murk', 14, '55.32');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bon`
--

CREATE TABLE `bon` (
  `Tafel` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Datum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Tijd` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Wijze van betaling` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerecht`
--

CREATE TABLE `gerecht` (
  `Gerechtcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Gerecht` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `gerecht`
--

INSERT INTO `gerecht` (`Gerechtcode`, `Gerecht`) VALUES
('dr', 'Dranken'),
('ha', 'Hapjes');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `Klant-id` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Klantnaam` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Telefoon` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitem`
--

CREATE TABLE `menuitem` (
  `id` int(4) NOT NULL,
  `Gerechtcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Subgerechtcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MenuItemcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `MenuItem` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Prijs` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reservering`
--

CREATE TABLE `reservering` (
  `id` int(4) NOT NULL,
  `Tafel` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Datum` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Tijd` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `KlantID` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `Aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reservering`
--

INSERT INTO `reservering` (`id`, `Tafel`, `Datum`, `Tijd`, `KlantID`, `Aantal`) VALUES
(9, '2', '19-06-2019', '13:00', 'mar', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subgerecht`
--

CREATE TABLE `subgerecht` (
  `Gerechtcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Subgerechtcode` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `Subgerecht` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexen voor tabel `bon`
--
ALTER TABLE `bon`
  ADD PRIMARY KEY (`Tafel`,`Datum`,`Tijd`);

--
-- Indexen voor tabel `gerecht`
--
ALTER TABLE `gerecht`
  ADD PRIMARY KEY (`Gerechtcode`),
  ADD UNIQUE KEY `Gerechtcode` (`Gerechtcode`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`Klant-id`),
  ADD UNIQUE KEY `Klant-id` (`Klant-id`);

--
-- Indexen voor tabel `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexen voor tabel `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexen voor tabel `subgerecht`
--
ALTER TABLE `subgerecht`
  ADD PRIMARY KEY (`Gerechtcode`,`Subgerechtcode`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `reservering`
--
ALTER TABLE `reservering`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `subgerecht`
--
ALTER TABLE `subgerecht`
  ADD CONSTRAINT `subgerecht_ibfk_1` FOREIGN KEY (`Gerechtcode`) REFERENCES `gerecht` (`Gerechtcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
