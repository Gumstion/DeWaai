-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 30 jan 2017 om 10:06
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dewaai`
--
CREATE DATABASE IF NOT EXISTS `dewaai` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dewaai`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adres`
--

CREATE TABLE `adres` (
  `adres_id` int(4) NOT NULL,
  `woonplaats` varchar(25) NOT NULL,
  `postcode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `adres`
--

INSERT INTO `adres` (`adres_id`, `woonplaats`, `postcode`) VALUES
(3, 'brummen', '4938JO');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursistcursus`
--

CREATE TABLE `cursistcursus` (
  `cursus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus`
--

CREATE TABLE `cursus` (
  `cursus_id` int(11) NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `soort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schip`
--

CREATE TABLE `schip` (
  `schip_id` int(11) NOT NULL,
  `ontwerp` varchar(32) NOT NULL,
  `naam` varchar(32) NOT NULL,
  `averij` tinyint(1) NOT NULL,
  `soort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soortcursus`
--

CREATE TABLE `soortcursus` (
  `soort_id` int(11) NOT NULL,
  `cursussoort` varchar(32) NOT NULL,
  `prijs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `adres_id` int(4) NOT NULL,
  `IBAN` varchar(18) DEFAULT NULL,
  `telefoonnummer` int(11) DEFAULT NULL,
  `achternaam` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `voornaam` varchar(32) NOT NULL,
  `wachtwoord` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `admin`, `adres_id`, `IBAN`, `telefoonnummer`, `achternaam`, `email`, `voornaam`, `wachtwoord`) VALUES
(1, 1, 3, 'feijfi', 3746346, 'jofejfi', 'ejofwjfo', 'fejofjei', 'fejiofjeof');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`adres_id`);

--
-- Indexen voor tabel `cursistcursus`
--
ALTER TABLE `cursistcursus`
  ADD KEY `cursistcursus_user_user_id_fk` (`user_id`),
  ADD KEY `cursistcursus_cursus_cursus_id_fk` (`cursus_id`);

--
-- Indexen voor tabel `cursus`
--
ALTER TABLE `cursus`
  ADD PRIMARY KEY (`cursus_id`),
  ADD KEY `cursus_soortcursus_soort_id_fk` (`soort_id`);

--
-- Indexen voor tabel `schip`
--
ALTER TABLE `schip`
  ADD PRIMARY KEY (`schip_id`),
  ADD KEY `schip_soortcursus_soort_id_fk` (`soort_id`);

--
-- Indexen voor tabel `soortcursus`
--
ALTER TABLE `soortcursus`
  ADD PRIMARY KEY (`soort_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_adres_adres_id_fk` (`adres_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `adres`
--
ALTER TABLE `adres`
  MODIFY `adres_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `schip`
--
ALTER TABLE `schip`
  MODIFY `schip_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `soortcursus`
--
ALTER TABLE `soortcursus`
  MODIFY `soort_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `cursistcursus`
--
ALTER TABLE `cursistcursus`
  ADD CONSTRAINT `cursistcursus_cursus_cursus_id_fk` FOREIGN KEY (`cursus_id`) REFERENCES `cursus` (`cursus_id`),
  ADD CONSTRAINT `cursistcursus_user_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Beperkingen voor tabel `cursus`
--
ALTER TABLE `cursus`
  ADD CONSTRAINT `cursus_soortcursus_soort_id_fk` FOREIGN KEY (`soort_id`) REFERENCES `soortcursus` (`soort_id`);

--
-- Beperkingen voor tabel `schip`
--
ALTER TABLE `schip`
  ADD CONSTRAINT `schip_soortcursus_soort_id_fk` FOREIGN KEY (`soort_id`) REFERENCES `soortcursus` (`soort_id`);

--
-- Beperkingen voor tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_adres_adres_id_fk` FOREIGN KEY (`adres_id`) REFERENCES `adres` (`adres_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
