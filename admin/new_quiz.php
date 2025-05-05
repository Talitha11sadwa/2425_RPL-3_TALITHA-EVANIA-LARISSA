<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Quiz</title>
    <link rel="stylesheet" href="data_quiz.css">
</head>
<body>
    <h1>Buat Quiz Baru</h1>
    <form action="quiz_proses.php" method="POST" id="quizForm">
        <div>
            <label>Nama Quiz:</label>
            <input type="text" name="quiz_name" required>
        </div>

        <div>
            <label>Durasi Quiz (Menit):</label>
            <input type="number" name="quiz_time" min="1" required>
        </div>

        <div id="quiz-container">
            <div class="quiz-item">
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
            </div>
        </div>

        <button type="button" id="add-quiz">Tambah Soal</button>
        <button type="submit">Simpan</button>
    </form>

    <script>
        const addQuizButton = document.getElementById('add-quiz');
        const container = document.getElementById('quiz-container');
        let quizCount = 1;

        // Menambahkan soal
        addQuizButton.addEventListener('click', () => {
            if (quizCount >= 30) {
                alert('Maksimal 30 soal.');
                return;
            }
            quizCount++;

            const newQuiz = `
                <div class="quiz-item">
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