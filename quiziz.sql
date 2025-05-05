-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2024 pada 03.52
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiziz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com\r\n', '$2y$10$MtZhgx1ZlAz0clG.n7prWeqRiSyFGcYRcNNr0wng8r02nQpubHI4W');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `pesan`, `waktu`) VALUES
(1, '', '', 'Bagus Sekali Aplikasinya', '2024-12-10'),
(2, 'Hanif Aidil Rachman', 'hanifrahman3012@gmail.com', '1020911', '2024-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `quiz_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quizzes`
--

INSERT INTO `quizzes` (`id`, `quiz_name`, `quiz_time`) VALUES
(2, 'Pentaho', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`) VALUES
(2, 2, 'Apa itu Pentaho', 'Sebuah perangkat lunak pengolah gambar', ' Perangkat lunak open-source untuk analisis data dan Business Intelligence (BI)  ', ' Alat untuk pengembangan aplikasi web  ', ' Alat untuk pengembangan aplikasi web  ', 'B'),
(3, 2, 'Komponen utama dari Pentaho meliputi, kecuali:', 'Pentaho Data Integration', 'Pentaho Reporting  ', 'Pentaho Dashboard  ', 'Apache Spark  ', 'D'),
(4, 2, 'Dalam Pentaho Data Integration (PDI), istilah lain untuk \"job\" adalah:', 'Workflow', 'Task ', 'Transformation', 'Scheduler  ', 'A'),
(5, 2, 'Apa nama antarmuka visual yang digunakan untuk mendesain transformasi di Pentaho Data Integration?*  ', 'Spoon ', ' Kettle', ' Pan ', 'Chef  ', 'A'),
(6, 2, 'File yang digunakan untuk menyimpan konfigurasi transformasi dalam PDI memiliki ekstensi:', '.ktr', '.kjb', '.xml', '.json', 'A'),
(7, 2, 'Untuk melakukan ekstraksi data dari berbagai sumber seperti database atau file, langkah awal yang digunakan di Pentaho disebut:', 'Load   ', 'Extract', 'Transform', 'Deploy', 'B'),
(8, 2, 'Dalam Pentaho, \"Pentaho Report Designer\" digunakan untuk:', 'Membuat dan merancang laporan  ', 'Menjadwalkan pekerjaan data ', 'Mengintegrasikan data dari sumber yang berbeda  ', ' Menganalisis log sistem  ', 'A'),
(9, 2, 'Berikut adalah langkah-langkah utama dalam proses ETL di Pentaho, kecuali:', 'Extract', 'Transform', 'Load', 'Visualize  ', 'D'),
(10, 2, ' Apa keunggulan utama dari Pentaho sebagai solusi Business Intelligence?', 'Berbasis open-source dan dapat dikustomisasi  ', 'Memiliki antarmuka yang hanya berbasis CLI ', 'Tidak memerlukan koneksi database ', 'Terintegrasi dengan sistem operasi Android', 'A'),
(11, 2, ' Alat bawaan Pentaho yang digunakan untuk mengelola pekerjaan berbasis waktu (scheduling) adalah:', 'Pan', 'Carte', 'Scheduler', 'Kettle Server', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `quiz_id`, `user_id`, `start_time`, `end_time`, `duration`, `score`) VALUES
(1, 1, 2, '2024-12-04 10:00:00', '2024-12-04 10:30:00', 1800, 80),
(2, 1, 1, '2024-12-05 11:13:53', '2024-12-05 11:13:55', 2, 10),
(3, 1, 1, '2024-12-05 11:13:53', '2024-12-05 11:13:55', 2, 10),
(4, 1, 1, '2024-12-05 11:24:28', '2024-12-05 11:24:32', 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `role`) VALUES
(1, 'hanifrahman3012@gmail.com', 'Hanif Aidil Rachman', '$2y$10$RPqPyQcolUoZygm6O1GdruliofleAYeVv4hfQukpIJGpSbljg7eK.', 'user'),
(2, 'rachmanhanif011@gmail.com', 'HanifAR', '$2y$10$9MuMW.QGpOcHerxZPAx/5.AHspYoNNTuAX/p17HsOmCRbc4NLStkC', 'user'),
(3, 'admin@email.com', 'admin', '$2y$10$MtZhgx1ZlAz0clG.n7prWeqRiSyFGcYRcNNr0wng8r02nQpubHI4W', 'admin'),
(4, 'jriagusta@gmail.com', 'Idil', '$2y$10$zLF6oowL7pi/9EqvAcXRAuNVl0wTt5Ug2hg2E09pNTq7zWx3s9rwa', 'user'),
(5, 'idil@gmail.com', 'Idil', '$2y$10$oVlMqsq3csxvsTYQTxdpC.x/pXToWTw2WyfulmQbkanM9d6xcWQLC', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
