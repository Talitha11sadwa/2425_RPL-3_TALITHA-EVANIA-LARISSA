<?php
// Koneksi database
include('../db_conn.php');

if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];

    // Query untuk mendapatkan data quiz
    $quiz_query = "SELECT * FROM quizzes WHERE id = $quiz_id";
    $quiz_result = mysqli_query($conn, $quiz_query);
    $quiz = mysqli_fetch_assoc($quiz_result);

    // Query untuk mendapatkan soal-soal quiz
    $questions_query = "SELECT * FROM quiz_questions WHERE quiz_id = $quiz_id";
    $questions_result = mysqli_query($conn, $questions_query);
}

// Proses hapus quiz jika tombol diklik
if (isset($_POST['delete_quiz'])) {
    // Hapus soal-soal terkait quiz
    $delete_questions_query = "DELETE FROM quiz_questions WHERE quiz_id = $quiz_id";
    mysqli_query($conn, $delete_questions_query);

    // Hapus quiz
    $delete_quiz_query = "DELETE FROM quizzes WHERE id = $quiz_id";
    mysqli_query($conn, $delete_quiz_query);

    // Redirect ke halaman daftar quiz
    header("Location: data_quiz.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Hapus Quiz</title>
    <link rel="stylesheet" href="delete_quiz.css">
</head>
<body>
    <h1>Konfirmasi Penghapusan Quiz: <?php echo $quiz['quiz_name']; ?></h1>

    <p>Quiz ini memiliki soal-soal berikut:</p>
    <ul>
        <?php while ($question = mysqli_fetch_assoc($questions_result)) { ?>
        <li>
            <strong>Pertanyaan:</strong> <?php echo $question['question']; ?><br>
            <strong>Opsi A:</strong> <?php echo $question['option_a']; ?><br>
            <strong>Opsi B:</strong> <?php echo $question['option_b']; ?><br>
            <strong>Opsi C:</strong> <?php echo $question['option_c']; ?><br>
            <strong>Opsi D:</strong> <?php echo $question['option_d']; ?><br>
            <strong>Jawaban Benar:</strong> <?php echo $question['correct_option']; ?><br><br>
        </li>
        <?php } ?>
    </ul>

    <form method="POST">
        <p>Apakah Anda yakin ingin menghapus quiz ini beserta semua soal-soalnya?</p>
        <button type="submit" name="delete_quiz">Ya, Hapus</button>
        <a href="data_quiz.php"><button type="button">Batal</button></a>
    </form>
</body>
</html>