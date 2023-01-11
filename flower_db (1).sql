-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 jan 2023 om 17:35
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flower_db`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bloemen`
--

CREATE TABLE `bloemen` (
  `id` int(11) NOT NULL,
  `bloem_code` varchar(255) NOT NULL,
  `bloem_naam` varchar(255) DEFAULT NULL,
  `bloem_img` varchar(255) DEFAULT NULL,
  `prijs_per_stuk` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `bloemen`
--

INSERT INTO `bloemen` (`id`, `bloem_code`, `bloem_naam`, `bloem_img`, `prijs_per_stuk`) VALUES
(3, '3233223', 'amarylis', 'amarylis.jpg', '2.00'),
(4, '7676', 'tulp paars', '', '0.24'),
(5, '3e3e3e', 'roos', '', '3.10'),
(6, 'ederdxce668', 'narcis', '', '0.46');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `magazijnen`
--

CREATE TABLE `magazijnen` (
  `id` int(11) NOT NULL,
  `magazijn_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `magazijnen`
--

INSERT INTO `magazijnen` (`id`, `magazijn_naam`) VALUES
(1, 'magazijn A'),
(2, 'magazijn B'),
(4, 'magazijn C'),
(5, 'magazijn E');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `medewerkers`
--

CREATE TABLE `medewerkers` (
  `id` int(11) NOT NULL,
  `medewerker_naam` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `medewerkers`
--

INSERT INTO `medewerkers` (`id`, `medewerker_naam`, `username`, `password`) VALUES
(1, NULL, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
(2, NULL, 'mark', '$2y$10$pvkyIwhK5PgsLK8NN0d8RObRyVY9bsIEPku8MVuTcAUwjLzmACCI6'),
(3, NULL, 'marks', '$2y$10$Pp83AMAuONQCnBq8pJS.o.2CX6/tPAxsZwTg754sysITGNQd1ujtW');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voorraad_bloemen`
--

CREATE TABLE `voorraad_bloemen` (
  `id` int(11) NOT NULL,
  `magazijn_id` int(11) NOT NULL,
  `bloem_id` int(11) NOT NULL,
  `aantal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `voorraad_bloemen`
--

INSERT INTO `voorraad_bloemen` (`id`, `magazijn_id`, `bloem_id`, `aantal`) VALUES
(1, 1, 3, 80),
(5, 4, 4, 12),
(6, 4, 6, 280),
(7, 2, 5, 155),
(8, 5, 4, 275),
(9, 5, 3, -320),
(10, 5, 6, 200),
(11, 5, 6, 150),
(14, 1, 4, 242),
(15, 4, 5, 200);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bloemen`
--
ALTER TABLE `bloemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `magazijnen`
--
ALTER TABLE `magazijnen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexen voor tabel `voorraad_bloemen`
--
ALTER TABLE `voorraad_bloemen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `magazijn_code` (`magazijn_id`),
  ADD KEY `bloem_code` (`bloem_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bloemen`
--
ALTER TABLE `bloemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `magazijnen`
--
ALTER TABLE `magazijnen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `voorraad_bloemen`
--
ALTER TABLE `voorraad_bloemen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `voorraad_bloemen`
--
ALTER TABLE `voorraad_bloemen`
  ADD CONSTRAINT `voorraad_bloemen_ibfk_1` FOREIGN KEY (`magazijn_id`) REFERENCES `magazijnen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `voorraad_bloemen_ibfk_2` FOREIGN KEY (`bloem_id`) REFERENCES `bloemen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
