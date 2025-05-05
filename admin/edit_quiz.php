<?php
// Koneksi ke database
include '../db_conn.php'; // Ganti dengan file koneksi Anda

// Cek apakah ada ID quiz di URL
if (isset($_GET['id'])) {
    $quiz_id = $_GET['id'];

    // Query untuk mengambil data quiz berdasarkan ID
    $quiz_query = "SELECT * FROM quizzes WHERE id = $quiz_id";
    $quiz_result = mysqli_query($conn, $quiz_query);

    if (mysqli_num_rows($quiz_result) > 0) {
        $quiz = mysqli_fetch_assoc($quiz_result);
    } else {
        die("Quiz tidak ditemukan.");
    }

    // Query untuk mengambil soal-soal quiz
    $questions_query = "SELECT * FROM quiz_questions WHERE quiz_id = $quiz_id";
    $questions_result = mysqli_query($conn, $questions_query);

    if (mysqli_num_rows($questions_result) > 0) {
        $questions = mysqli_fetch_all($questions_result, MYSQLI_ASSOC);
    } else {
        $questions = [];
    }
} else {
    die("ID Quiz tidak ditemukan.");
}

// Proses form saat disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $quiz_name = mysqli_real_escape_string($conn, $_POST['quiz_name']);
    $quiz_time = $_POST['quiz_time'];
    
    // Update data quiz
    $update_quiz_query = "UPDATE quizzes SET quiz_name = '$quiz_name', quiz_time = $quiz_time WHERE id = $quiz_id";
    mysqli_query($conn, $update_quiz_query);

    // Update soal-soal quiz
    foreach ($_POST['question_ids'] as $key => $question_id) {
        $question = mysqli_real_escape_string($conn, $_POST['questions'][$key]);
        $option_a = mysqli_real_escape_string($conn, $_POST['option_a'][$key]);
        $option_b = mysqli_real_escape_string($conn, $_POST['option_b'][$key]);
        $option_c = mysqli_real_escape_string($conn, $_POST['option_c'][$key]);
        $option_d = mysqli_real_escape_string($conn, $_POST['option_d'][$key]);
        $correct_option = $_POST['correct_option'][$key];

        $update_question_query = "UPDATE quiz_questions 
                                  SET question = '$question', option_a = '$option_a', option_b = '$option_b', 
                                      option_c = '$option_c', option_d = '$option_d', correct_option = '$correct_option' 
                                  WHERE id = $question_id";
        mysqli_query($conn, $update_question_query);
    }

    // Redirect setelah perubahan disimpan
    header("Location: data_quiz.php"); // Sesuaikan dengan halaman yang menampilkan daftar quiz
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
    <link rel="stylesheet" href="edit_quiz.css"> <!-- Ganti dengan nama file CSS Anda -->
</head>
<body>
    <h1>Edit Quiz</h1>
    <form action="edit_quiz.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <!-- Informasi Quiz -->
        <div>
            <label>Nama Quiz:</label>
            <input type="text" name="quiz_name" value="<?php echo htmlspecialchars($quiz['quiz_name']); ?>" required>
        </div>

        <div>
            <label>Durasi Quiz (Menit):</label>
            <input type="number" name="quiz_time" value="<?php echo htmlspecialchars($quiz['quiz_time']); ?>" min="1" required>
        </div>

        <!-- Soal-soal Quiz -->
        <div id="quiz-container">
            <?php foreach ($questions as $question): ?>
                <div class="quiz-item">
                    <input type="hidden" name="question_ids[]" value="<?php echo $question['id']; ?>">

                    <label>Pertanyaan:</label>
                    <textarea name="questions[]" required><?php echo htmlspecialchars($question['question']); ?></textarea>

                    <label>Opsi A:</label>
                    <input type="text" name="option_a[]" value="<?php echo htmlspecialchars($question['option_a']); ?>" required>

                    <label>Opsi B:</label>
                    <input type="text" name="option_b[]" value="<?php echo htmlspecialchars($question['option_b']); ?>" required>

                    <label>Opsi C:</label>
                    <input type="text" name="option_c[]" value="<?php echo htmlspecialchars($question['option_c']); ?>" required>

                    <label>Opsi D:</label>
                    <input type="text" name="option_d[]" value="<?php echo htmlspecialchars($question['option_d']); ?>" required>

                    <label>Jawaban Benar:</label>
                    <select name="correct_option[]" required>
                        <option value="A" <?php echo $question['correct_option'] == 'A' ? 'selected' : ''; ?>>A</option>
                        <option value="B" <?php echo $question['correct_option'] == 'B' ? 'selected' : ''; ?>>B</option>
                        <option value="C" <?php echo $question['correct_option'] == 'C' ? 'selected' : ''; ?>>C</option>
                        <option value="D" <?php echo $question['correct_option'] == 'D' ? 'selected' : ''; ?>>D</option>
                    </select>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Tombol untuk menambah soal baru -->
        <button type="button" id="add-quiz">Tambah Soal</button>
        
        <!-- Tombol untuk menyimpan perubahan -->
        <button type="submit">Simpan Perubahan</button>
    </form>

    <!-- JavaScript untuk menambah soal baru -->
    <script>
        const addQuizButton = document.getElementById('add-quiz');
        const container = document.getElementById('quiz-container');
        let quizCount = <?php echo count($questions); ?>;

        addQuizButton.addEventListener('click', () => {
            if (quizCount >= 30) {
                alert('Maksimal 30 soal.');
                return;
            }
            quizCount++;

            const newQuiz = `
                <div class="quiz-item">
                    <input type="hidden" name="question_ids[]" value="">
                    <label>Pertanyaan:</label>
                    <textarea name="questions[]" required></textarea>

                    <label>Opsi A:</label>
                    <input type="text" name="option_a[]" required>

                    <label>Opsi B:</label>
                    <input type="text" name="option_b[]" required>

                    <label>Opsi C:</label>
                    <input type="text" name="option_c[]" required>

                    <label>Opsi D:</label>
                    <input type="text" name="option_d[]" required>

                    <label>Jawaban Benar:</label>
                    <select name="correct_option[]" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                </div>`;
            container.insertAdjacentHTML('beforeend', newQuiz);
        });
    </script>
</body>
</html>
