<?php
session_start();
include('../db_conn.php');

// Set timezone ke Indonesia (WIB)
date_default_timezone_set('Asia/Jakarta');

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['id'];
$quiz_id = isset($_GET['quiz_id']) ? (int)$_GET['quiz_id'] : 0;

$query = "SELECT * FROM quizzes WHERE id = $quiz_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Quiz tidak ditemukan.");
}

$quiz = mysqli_fetch_assoc($result);

$query_questions = "SELECT * FROM quiz_questions WHERE quiz_id = $quiz_id";
$result_questions = mysqli_query($conn, $query_questions);

if (!$result_questions || mysqli_num_rows($result_questions) === 0) {
    die("Tidak ada pertanyaan untuk quiz ini.");
}

$questions = [];
while ($row = mysqli_fetch_assoc($result_questions)) {
    $questions[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_time = $_POST['start_time'];
    $end_time = date('Y-m-d H:i:s'); // Gunakan waktu Indonesia
    $duration = strtotime($end_time) - strtotime($start_time);
    $score = 0;

    foreach ($questions as $index => $question) {
        $user_answer = isset($_POST["answer_$index"]) ? $_POST["answer_$index"] : null;
        if ($user_answer === $question['correct_option']) {
            $score += 10;
        }
    }

    $query_save_result = "
        INSERT INTO quiz_results (quiz_id, user_id, start_time, end_time, duration, score)
        VALUES ($quiz_id, $user_id, '$start_time', '$end_time', $duration, $score)
    ";

    if (mysqli_query($conn, $query_save_result)) {
        header("Location: quiz_result.php?quiz_id=$quiz_id");
        exit;
    } else {
        echo "Gagal menyimpan hasil quiz: " . mysqli_error($conn);
    }
}

$quiz_duration = (int)$quiz['quiz_time'] * 60; // Konversi menit ke detik
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($quiz['quiz_name']); ?></title>
    <link rel="stylesheet" href="quiz_page.css">
    <script>
        let timeLeft = <?= $quiz_duration ?>; // Waktu dalam detik

        function startCountdown() {
            let timerElement = document.getElementById("timer");
            let quizForm = document.getElementById("quizForm");

            function updateTimer() {
                let minutes = Math.floor(timeLeft / 60);
                let seconds = timeLeft % 60;
                timerElement.innerHTML = `Sisa Waktu: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

                if (timeLeft <= 0) {
                    alert("Waktu habis! Quiz akan disubmit.");
                    quizForm.submit(); // Otomatis submit jika waktu habis
                } else {
                    timeLeft--;
                    setTimeout(updateTimer, 1000);
                }
            }

            updateTimer();
        }

        window.onload = startCountdown;
    </script>
</head>
<body>
    <h1><?= htmlspecialchars($quiz['quiz_name']); ?></h1>
    <p>Durasi: <?= htmlspecialchars($quiz['quiz_time']); ?> menit</p>
    <p id="timer">Sisa Waktu: <?= htmlspecialchars($quiz['quiz_time']); ?>:00</p>

    <form id="quizForm" action="quiz_page_user.php?quiz_id=<?= $quiz_id; ?>" method="POST">
        <input type="hidden" name="start_time" value="<?= date('Y-m-d H:i:s'); ?>">

        <?php foreach ($questions as $index => $question): ?>
            <div class="question">
                <p><strong><?= $index + 1; ?>. <?= htmlspecialchars($question['question']); ?></strong></p>
                <label>
                    <input type="radio" name="answer_<?= $index; ?>" value="A" required>
                    <?= htmlspecialchars($question['option_a']); ?>
                </label><br>
                <label>
                    <input type="radio" name="answer_<?= $index; ?>" value="B">
                    <?= htmlspecialchars($question['option_b']); ?>
                </label><br>
                <label>
                    <input type="radio" name="answer_<?= $index; ?>" value="C">
                    <?= htmlspecialchars($question['option_c']); ?>
                </label><br>
                <label>
                    <input type="radio" name="answer_<?= $index; ?>" value="D">
                    <?= htmlspecialchars($question['option_d']); ?>
                </label>
            </div>
        <?php endforeach; ?>

        <button type="submit">Selesai Quiz</button>
    </form>
</body>
</html>
