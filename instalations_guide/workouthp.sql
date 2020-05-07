-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 07. 05 2020 kl. 10:59:41
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workouthp`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `progressdata`
--

CREATE TABLE `progressdata` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` date NOT NULL,
  `kg` float NOT NULL,
  `reps` float NOT NULL,
  `exercisename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `progressdata`
--

INSERT INTO `progressdata` (`id`, `userid`, `date`, `kg`, `reps`, `exercisename`) VALUES
(1, 1, '2020-05-04', 12, 13, 'Barbell Deadlift'),
(2, 1, '2020-05-04', 22, 4, 'Seated Cable Rows'),
(3, 1, '2020-05-04', 10, 6, 'Barbell Curl'),
(4, 1, '2020-05-04', 10, 10, 'Hammer Curls'),
(5, 1, '2020-05-11', 25, 15, 'Barbell Deadlift'),
(6, 1, '2020-05-11', 25, 8, 'Seated Cable Rows'),
(7, 1, '2020-05-11', 25, 10, 'Barbell Curl'),
(8, 1, '2020-05-11', 10, 10, 'Hammer Curls'),
(9, 1, '2020-05-18', 30, 8, 'Barbell Deadlift'),
(10, 1, '2020-05-18', 30, 15, 'Seated Cable Rows'),
(11, 1, '2020-05-18', 30, 8, 'Barbell Curl'),
(12, 1, '2020-05-18', 20, 10, 'Hammer Curls'),
(13, 1, '2020-05-06', 20, 15, 'Lying cable flyes'),
(14, 1, '2020-05-06', 20, 14, 'Lying Machine Chest Press'),
(15, 1, '2020-05-06', 12, 10, 'Cable Triceps Rope Pushdowns'),
(16, 1, '2020-05-06', 20, 15, 'Skullcrushers'),
(17, 1, '2020-05-13', 25, 12, 'Lying cable flyes'),
(18, 1, '2020-05-13', 25, 12, 'Lying Machine Chest Press'),
(19, 1, '2020-05-13', 15, 13, 'Cable Triceps Rope Pushdowns'),
(20, 1, '2020-05-13', 26, 10, 'Skullcrushers'),
(21, 1, '2020-05-20', 30, 10, 'Lying cable flyes'),
(22, 1, '2020-05-20', 30, 10, 'Lying Machine Chest Press'),
(23, 1, '2020-05-20', 20, 12, 'Cable Triceps Rope Pushdowns'),
(24, 1, '2020-05-20', 20, 15, 'Skullcrushers'),
(25, 2, '2020-05-04', 5, 3, 'Barbell Deadlift'),
(26, 2, '2020-05-04', 10, 4, 'Seated Cable Rows'),
(27, 2, '2020-05-04', 6, 2, 'Barbell Curl'),
(28, 2, '2020-05-04', 6, 4, 'Hammer Curls'),
(29, 2, '2020-05-11', 10, 10, 'Barbell Deadlift'),
(30, 2, '2020-05-11', 20, 10, 'Seated Cable Rows'),
(31, 2, '2020-05-11', 20, 10, 'Barbell Curl'),
(32, 2, '2020-05-11', 10, 10, 'Hammer Curls'),
(33, 2, '2020-05-18', 25, 12, 'Barbell Deadlift'),
(34, 2, '2020-05-18', 25, 12, 'Seated Cable Rows'),
(35, 2, '2020-05-18', 26, 12, 'Barbell Curl'),
(36, 2, '2020-05-18', 16, 12, 'Hammer Curls'),
(37, 2, '2020-05-06', 2, 3, 'Lying cable flyes'),
(38, 2, '2020-05-06', 3, 2, 'Lying Machine Chest Press'),
(39, 2, '2020-05-06', 5, 5, 'Cable Triceps Rope Pushdowns'),
(40, 2, '2020-05-06', 6, 5, 'Skullcrushers'),
(41, 2, '2020-05-13', 10, 9, 'Lying cable flyes'),
(42, 2, '2020-05-13', 15, 9, 'Lying Machine Chest Press'),
(43, 2, '2020-05-13', 10, 10, 'Cable Triceps Rope Pushdowns'),
(44, 2, '2020-05-13', 10, 8, 'Skullcrushers'),
(45, 2, '2020-05-20', 20, 12, 'Lying cable flyes'),
(46, 2, '2020-05-20', 25, 12, 'Lying Machine Chest Press'),
(47, 2, '2020-05-20', 25, 12, 'Cable Triceps Rope Pushdowns'),
(48, 2, '2020-05-20', 20, 12, 'Skullcrushers');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(1, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', '2020-05-07 08:42:45'),
(2, 'test2', 'ad0234829205b9033196ba818f7a872b', '2020-05-07 08:54:57');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `progressdata`
--
ALTER TABLE `progressdata`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `progressdata`
--
ALTER TABLE `progressdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
