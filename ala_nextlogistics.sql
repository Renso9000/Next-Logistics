-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 dec 2023 om 13:33
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ala_nextlogistics`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `project`
--

CREATE TABLE `project` (
  `ID` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Code` int(11) NOT NULL,
  `Actual` tinyint(1) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `StartDT` datetime NOT NULL,
  `EndDT` datetime NOT NULL,
  `MaxHours` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `project`
--

INSERT INTO `project` (`ID`, `Active`, `Code`, `Actual`, `Title`, `StartDT`, `EndDT`, `MaxHours`) VALUES
(1, 1, 9909, 1, 'SensorData', '2023-12-06 00:00:00', '2023-12-06 00:00:00', '00:00:50'),
(2, 1, 4564, 1, 'DataCake', '2023-12-06 00:00:00', '2023-12-06 00:00:00', '00:00:50'),
(3, 1, 3456, 1, 'GroeneDaken', '2023-12-06 00:00:00', '2023-12-06 00:00:00', '00:00:50'),
(4, 1, 1321, 1, 'Sopranos', '2023-12-06 00:00:00', '2023-12-06 00:00:00', '00:00:50');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectdata`
--

CREATE TABLE `projectdata` (
  `ID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EntryDT` datetime NOT NULL,
  `WorkDT` datetime NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `projectdata`
--

INSERT INTO `projectdata` (`ID`, `ProjectID`, `UserID`, `EntryDT`, `WorkDT`, `Description`) VALUES
(1, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Data for sensors'),
(2, 2, 2, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Bunch of data stuff'),
(3, 3, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Website met sensoren die het weer meten'),
(4, 4, 2, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Pizza Website'),
(5, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(6, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(7, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(8, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(9, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(10, 1, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'Werkzaamheden voltooid.'),
(11, 2, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'help met form'),
(12, 2, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'help met form'),
(13, 2, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'help met form'),
(14, 4, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'form werkt nog niet'),
(15, 4, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'form werkt voor de helft'),
(16, 4, 2, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'form werkt voor de helft'),
(17, 4, 1, '2023-12-06 00:00:00', '2023-12-06 00:00:00', 'form werkt voor de helft'),
(18, 2, 1, '2023-12-06 11:26:24', '2023-12-06 00:00:00', 'Gewerkt aan werkzaamheden'),
(19, 2, 1, '2023-12-06 11:27:19', '2023-12-06 00:00:00', 'Gewerkt aan werkzaamheden'),
(20, 4, 1, '2023-12-06 11:28:40', '2023-12-06 00:00:00', 'werkzaamheden'),
(21, 4, 1, '2023-12-06 11:29:04', '2023-12-06 00:00:00', 'werkzaamheden'),
(22, 4, 1, '2023-12-06 11:38:55', '2023-12-06 00:00:00', 'werkzaamheden'),
(23, 2, 1, '2023-12-06 11:39:03', '2023-12-06 00:00:00', 'Gewerkt aan werkzaamheden'),
(24, 4, 1, '2023-12-06 11:40:00', '2023-12-06 00:00:00', 'werkt ?'),
(25, 4, 1, '2023-12-06 11:45:23', '2023-12-06 00:00:00', 'werkt ?'),
(26, 1, 1, '2023-12-06 11:45:59', '2023-12-06 00:00:00', 'werkt'),
(27, 1, 1, '2023-12-06 11:46:41', '2023-12-06 11:46:41', 'werkt'),
(28, 1, 2, '2023-12-06 11:47:50', '2023-12-06 11:47:50', 'werkt'),
(29, 1, 2, '2023-12-06 11:45:00', '2023-12-06 17:45:00', 'werkt'),
(30, 2, 2, '2023-12-06 10:54:00', '2023-12-06 17:54:00', 'werkt'),
(31, 2, 2, '2023-12-06 10:54:00', '2023-12-06 17:54:00', 'werkt'),
(32, 4, 2, '2023-12-06 08:21:00', '2023-12-06 17:21:00', 'werkt'),
(33, 4, 2, '2023-12-06 09:26:00', '2023-12-06 16:26:00', 'werk'),
(34, 1, 2, '2023-12-06 08:27:00', '2023-12-06 16:27:00', 'werkt'),
(35, 1, 2, '2023-12-06 08:27:00', '2023-12-06 16:27:00', 'werkt'),
(36, 4, 2, '2023-12-06 10:47:00', '2023-12-06 20:47:00', 'werkt'),
(37, 4, 2, '2023-12-06 10:47:00', '2023-12-06 20:47:00', 'werkt'),
(38, 4, 2, '2023-12-06 10:47:00', '2023-12-06 20:47:00', 'werkt'),
(39, 4, 2, '2023-12-06 11:49:00', '2023-12-06 17:49:00', 'werkt'),
(40, 2, 2, '2023-12-06 10:10:00', '2023-12-06 18:10:00', 'werkt'),
(41, 2, 2, '2023-12-06 10:10:00', '2023-12-06 18:10:00', 'werkt'),
(42, 2, 2, '2023-12-06 10:10:00', '2023-12-06 18:10:00', 'werkt'),
(43, 1, 2, '2023-12-06 10:14:00', '2023-12-06 17:14:00', 'werkt'),
(44, 2, 2, '2023-12-06 10:15:00', '2023-12-06 17:15:00', 'werkt');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `projectusers`
--

CREATE TABLE `projectusers` (
  `ID` int(11) NOT NULL,
  `ProjectID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `MayManage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `projectusers`
--

INSERT INTO `projectusers` (`ID`, `ProjectID`, `UserID`, `MayManage`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 0),
(3, 3, 1, 1),
(4, 4, 2, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`ID`, `Active`, `Name`) VALUES
(1, 1, 'Quinten van Meijeren'),
(2, 1, 'Diana van Kampen');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `projectdata`
--
ALTER TABLE `projectdata`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProjectID` (`ProjectID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexen voor tabel `projectusers`
--
ALTER TABLE `projectusers`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProjectID` (`ProjectID`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `project`
--
ALTER TABLE `project`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `projectdata`
--
ALTER TABLE `projectdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT voor een tabel `projectusers`
--
ALTER TABLE `projectusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `projectdata`
--
ALTER TABLE `projectdata`
  ADD CONSTRAINT `projectdata_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`),
  ADD CONSTRAINT `projectdata_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);

--
-- Beperkingen voor tabel `projectusers`
--
ALTER TABLE `projectusers`
  ADD CONSTRAINT `projectusers_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `projectusers_ibfk_2` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
