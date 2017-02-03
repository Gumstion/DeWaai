-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 03 feb 2017 om 07:29
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
  `postcode` varchar(6) NOT NULL,
  `straatnaam` varchar(32) NOT NULL,
  `woonplaats` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `adres`
--

INSERT INTO `adres` (`postcode`, `straatnaam`, `woonplaats`) VALUES
('1070VB', 'Amstelveenseweg', 'Amsterdam'),
('1334OP', 'Valentijnlaan', 'Almere'),
('1909AS', 'Rembrandtlaan', 'Oss'),
('admin', 'admin', 'admin'),
('j', 'j', 'j'),
('jj', 'medewerker', 'medewerker');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursistcursus`
--

CREATE TABLE `cursistcursus` (
  `cursus_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cursistcursus`
--

INSERT INTO `cursistcursus` (`cursus_id`, `user_id`) VALUES
(1, 3),
(1, 3),
(7, 10),
(7, 10),
(7, 10),
(1, 2),
(2, 2),
(3, 2),
(4, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cursus`
--

CREATE TABLE `cursus` (
  `cursus_id` int(11) NOT NULL,
  `weeknummer` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `soort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `cursus`
--

INSERT INTO `cursus` (`cursus_id`, `weeknummer`, `aantal`, `soort_id`) VALUES
(1, 0, 3, 2),
(2, 3, 44, 1),
(3, 5, 3, 1),
(4, 55, 44, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `schip`
--

CREATE TABLE `schip` (
  `schip_id` int(11) NOT NULL,
  `naam` varchar(32) NOT NULL,
  `plaatsen` int(11) NOT NULL,
  `averij` tinyint(1) NOT NULL,
  `soort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `schip`
--

INSERT INTO `schip` (`schip_id`, `naam`, `plaatsen`, `averij`, `soort_id`) VALUES
(345, 'Jantje', 54, 0, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soortcursus`
--

CREATE TABLE `soortcursus` (
  `soort_id` int(11) NOT NULL,
  `cursussoort` varchar(32) NOT NULL,
  `prijs` double NOT NULL,
  `beschrijving` varchar(255) DEFAULT NULL,
  `schip_ontwerp` varchar(32) NOT NULL,
  `aantal` int(11) DEFAULT NULL,
  `bezet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `soortcursus`
--

INSERT INTO `soortcursus` (`soort_id`, `cursussoort`, `prijs`, `beschrijving`, `schip_ontwerp`, `aantal`, `bezet`) VALUES
(1, 'Beginner', 500, 'Lekker makkelijk!', '16-Kwadraat', 54, 47),
(2, 'Gevorderden', 700, 'Iets lastiger!', 'Draak', 0, 0),
(3, 'Wadtochten', 800, 'Lekker over de wadden varen!', 'Schouw', 0, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `email` varchar(64) NOT NULL,
  `voornaam` varchar(32) NOT NULL,
  `achternaam` varchar(32) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL,
  `telefoonnummer` int(11) NOT NULL,
  `IBAN` varchar(18) DEFAULT NULL,
  `postcode` varchar(6) NOT NULL,
  `huisnummer` varchar(5) NOT NULL,
  `userlevel` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`user_id`, `email`, `voornaam`, `achternaam`, `wachtwoord`, `telefoonnummer`, `IBAN`, `postcode`, `huisnummer`, `userlevel`) VALUES
(2, 'admin@admin.nl', 'admin', 'admin', '$2y$12$dSWujiYMhNra9k55SHihNOtyHO2Rjon5I4Ofieh/lfaH2eWR1TwBu', 1, 'admin', 'admin', '1', 1),
(3, 'j@j.nl', 'j', 'j', '$2y$12$IPdObSBR90T6NWIprWPLMOrZGOhWE3G8AB5TI7p7CQnIlDLp/vjMS', 1, 'j', 'j', '1', 3),
(6, 'e.scherpenzeel@upmail.nl', 'Erik', 'Scherpenzeel', '$2y$12$galx4aK6m9JXhhHJuhpSm.Gd2rYRWc8Ekg8jyNPWhg3j03PY/oEaa', 365495800, 'NL46RABO0385161218', '1334OP', '5', 1),
(7, 'Swanj@kpn.com', 'Josien', 'van der Swan', '$2y$12$HlN536sza2Hz6N23Sv0KUeCqPW5FIEZOg/XMDaJwLuDs0liFmxHLu', 206213554, 'NL46RABO0385161488', '1070VB', '121', 2),
(8, 'P.joosten@upcmail.nl', 'Peter', 'Joosten', '$2y$12$hruzZ6JOvwFSgFjW7BWGNef9qPQlOlsnJponhHKUf92DZf.TGCwgy', 543123456, 'NL46RABO0326161218', '1909AS', '78', 3),
(9, 'medewerker@gmail.com', 'medewerker', 'medewerker', '$2y$12$dL8qzEH7A25SM6t968boHeN.Q/UBWkhKFw1Eb/vaeDupL.HhYb10W', 343, 'medewerker', 'jj', '3', 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `adres`
--
ALTER TABLE `adres`
  ADD PRIMARY KEY (`postcode`);

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
  ADD KEY `user_adres_postcode_fk` (`postcode`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `cursus`
--
ALTER TABLE `cursus`
  MODIFY `cursus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT voor een tabel `soortcursus`
--
ALTER TABLE `soortcursus`
  MODIFY `soort_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
  ADD CONSTRAINT `user_adres_postcode_fk` FOREIGN KEY (`postcode`) REFERENCES `adres` (`postcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
