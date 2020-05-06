-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 06. 05 2020 kl. 15:52:46
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
(57, 8, '2020-05-04', 20, 10, 'Barbell Deadlift'),
(58, 8, '2020-05-04', 20, 10, 'Seated Cable Rows'),
(59, 8, '2020-05-04', 10, 10, 'Barbell Curl'),
(60, 8, '2020-05-04', 16, 10, 'Hammer Curls'),
(61, 8, '2020-05-11', 25, 10, 'Barbell Deadlift'),
(62, 8, '2020-05-11', 30, 12, 'Seated Cable Rows'),
(63, 8, '2020-05-11', 20, 12, 'Barbell Curl'),
(64, 8, '2020-05-11', 20, 12, 'Hammer Curls'),
(71, 8, '2020-05-18', 40, 5, 'Barbell Deadlift'),
(72, 8, '2020-05-18', 45, 10, 'Seated Cable Rows'),
(73, 8, '2020-05-18', 30, 10, 'Barbell Curl'),
(74, 8, '2020-05-18', 30, 15, 'Hammer Curls'),
(75, 9, '2020-05-04', 10, 5, 'Barbell Deadlift'),
(76, 9, '2020-05-04', 10, 5, 'Seated Cable Rows'),
(77, 9, '2020-05-04', 5, 5, 'Barbell Curl'),
(78, 9, '2020-05-04', 6, 5, 'Hammer Curls'),
(79, 9, '2020-05-11', 20, 10, 'Barbell Deadlift'),
(80, 9, '2020-05-11', 15, 10, 'Seated Cable Rows'),
(81, 9, '2020-05-11', 16, 10, 'Barbell Curl'),
(82, 9, '2020-05-11', 10, 10, 'Hammer Curls'),
(83, 9, '2020-05-18', 25, 6, 'Barbell Deadlift'),
(84, 9, '2020-05-18', 25, 12, 'Seated Cable Rows'),
(85, 9, '2020-05-18', 30, 12, 'Barbell Curl'),
(86, 9, '2020-05-18', 30, 12, 'Hammer Curls'),
(87, 9, '2020-05-08', 1, 1, 'Barbell Curl'),
(88, 9, '2020-05-08', 1, 1, 'Cable Triceps Rope Pushdowns'),
(89, 9, '2020-05-08', 1, 1, 'Hammer Curls'),
(90, 9, '2020-05-08', 1, 1, 'Skullcrushers'),
(91, 8, '2020-05-25', 1, 1, 'Barbell Deadlift'),
(92, 8, '2020-05-25', 1, 1, 'Seated Cable Rows'),
(93, 8, '2020-05-25', 1, 1, 'Barbell Curl'),
(94, 8, '2020-05-25', 1, 1, 'Hammer Curls'),
(95, 8, '2020-05-06', 5, 5, 'Lying cable flyes'),
(96, 8, '2020-05-06', 4, 5, 'Lying Machine Chest Press'),
(97, 8, '2020-05-06', 4, 5, 'Cable Triceps Rope Pushdowns'),
(98, 8, '2020-05-06', 4, 5, 'Skullcrushers'),
(99, 8, '2020-05-13', 13, 13, 'Lying cable flyes'),
(100, 8, '2020-05-13', 13, 13, 'Lying Machine Chest Press'),
(101, 8, '2020-05-13', 23, 32, 'Cable Triceps Rope Pushdowns'),
(102, 8, '2020-05-13', 23, 22, 'Skullcrushers'),
(103, 8, '2020-05-08', 20, 10, 'Barbell Curl'),
(104, 8, '2020-05-08', 30, 12, 'Cable Triceps Rope Pushdowns'),
(105, 8, '2020-05-08', 26, 15, 'Hammer Curls'),
(106, 8, '2020-05-08', 30, 10, 'Skullcrushers');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(8, 'test1', '5a105e8b9d40e1329780d62ea2265d8a', '2020-05-05 18:27:57'),
(9, 'test2', 'ad0234829205b9033196ba818f7a872b', '2020-05-05 20:07:08');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
