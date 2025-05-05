<?php
include '../db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quiz_name = $_POST['quiz_name'];
    $quiz_time = $_POST['quiz_time']; // Durasi quiz dalam menit
    $questions = $_POST['questions'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $correct_options = $_POST['correct_option'];

    // Simpan quiz
    $sql = "INSERT INTO quizzes (quiz_name, quiz_time) VALUES ('$quiz_name', '$quiz_time')";
    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . mysqli_error($conn);
        exit();
    }

    // Mendapatkan ID quiz yang baru saja disimpan
    $quiz_id = mysqli_insert_id($conn);

    // Simpan soal-soal quiz
    foreach ($questions as $index => $question) {
        $a = $option_a[$index];
        $b = $option_b[$index];
        $c = $option_c[$index];
        $d = $option_d[$index];
        $correct = $correct_options[$index];

        $sql = "INSERT INTO quiz_questions (quiz_id, question, option_a, option_b, option_c, option_d, correct_option)
                VALUES ('$quiz_id', '$question', '$a', '$b', '$c', '$d', '$correct')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . mysqli_error($conn);
        }
    }
    header('Location: data_quiz.php');
    
}
?>
