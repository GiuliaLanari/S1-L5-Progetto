-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 15, 2024 alle 15:54
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `libri`
--

CREATE TABLE `libri` (
  `id` int(10) UNSIGNED NOT NULL,
  `titolo` varchar(50) NOT NULL,
  `autore` varchar(50) NOT NULL,
  `anno_pubblicazione` int(11) NOT NULL,
  `genere` varchar(50) NOT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`, `img`) VALUES
(2, 'Elon Musk', 'Walter Isaacson', 2017, 'Biografie', 'https://www.ibs.it/images/9788804759485_0_536_0_75.jpg'),
(5, 'Better', ' Carrie Leighton', 2020, 'fantasy romance', 'https://m.media-amazon.com/images/I/71CzkCTJsML._AC_UF1000,1000_QL80_.jpg'),
(6, 'Dark web', 'Sara Magnoli', 2011, 'Horror', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSm5dFM9bxceCsQdgaDihWVXVEEv3RKZte7ep8PbgDY4g&s'),
(7, 'The magic', 'Rhonda Byrne ', 2010, 'Fantasy', 'https://www.macrolibrarsi.it/data/cop/zoom/t/the-magic-libro_53421-53421.jpg'),
(9, 'Narnia ', 'Clive S. Lewis ', 2005, 'Fantasy', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYPy55CBfe8ct0HONtgzUdcgY_cu0DuxOALODvpvJegQ&s'),
(10, 'Michael Jordan', ' David Halberstam ', 2020, 'Biografie', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQl-Y51RDjwSW-fNYJoznLRmDwLumYa_CfGDtDX-4GCbA&s'),
(13, 'King', 'Bangor', 1981, 'Horror', 'https://m.media-amazon.com/images/I/61tiUZysQ2L._AC_UF1000,1000_QL80_.jpg'),
(14, 'Fahrenheit 451', 'Ray Bradbury', 2023, 'History', 'https://www.mondadori.it/content/uploads/2023/08/978880478349HIG-310x480.jpg?x39676');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
