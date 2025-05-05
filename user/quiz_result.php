<?php
// Koneksi ke database
include('../db_conn.php');
session_start();
// Ambil quiz_id dari parameter URL
$quiz_id = isset($_GET['quiz_id']) ? (int)$_GET['quiz_id'] : 0;

// Validasi apakah quiz ID ada
$query_quiz = "SELECT * FROM quizzes WHERE id = $quiz_id";
$result_quiz = mysqli_query($conn, $query_quiz);

if (!$result_quiz || mysqli_num_rows($result_quiz) === 0) {
    die("Quiz tidak ditemukan.");
}

// Ambil data quiz
$quiz = mysqli_fetch_assoc($result_quiz);

// Ambil hasil quiz untuk user tertentu (contoh: user_id = 1, bisa diganti dengan session user login)
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php'); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil user_id dari sesi login
$user_id = $_SESSION['id'];

$query_result = "
    SELECT * FROM quiz_results 
    WHERE quiz_id = $quiz_id AND user_id = $user_id
";
$result = mysqli_query($conn, $query_result);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Hasil quiz tidak ditemukan untuk user ini.");
}

// Ambil data hasil
$quiz_result = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Quiz</title>
    <link rel="stylesheet" href="quizResult.css">
</head>
<body>
    <div class="result-container">
        <h1>Hasil Quiz: <?= htmlspecialchars($quiz['quiz_name']); ?></h1>

        <div class="result-details">
            <p><strong>Nama Quiz:</strong> <?= htmlspecialchars($quiz['quiz_name']); ?></p>
            <p><strong>Durasi:</strong> <?= htmlspecialchars($quiz['quiz_time']); ?> menit</p>
            <p><strong>Mulai:</strong> <?= htmlspecialchars($quiz_result['start_time']); ?></p>
            <p><strong>Selesai:</strong> <?= htmlspecialchars($quiz_result['end_time']); ?></p>
            <p><strong>Waktu yang Digunakan:</strong> <?= round($quiz_result['duration'] / 60, 2); ?> menit</p>
            <p><strong>Skor Anda:</strong> <?= htmlspecialchars($quiz_result['score']); ?></p>
        </div>

        <a href="quiz.php" class="btn">Kembali ke Daftar Quiz</a>
    </div>
</body>
</html>