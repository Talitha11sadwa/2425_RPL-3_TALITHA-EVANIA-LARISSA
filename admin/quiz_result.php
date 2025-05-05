<?php
session_start();
include('../db_conn.php'); // Pastikan koneksi ke database sudah benar.

// Query gabungan untuk menampilkan hasil kuis beserta nama siswa
$query = "
    SELECT 
        qr.id AS result_id,
        q.quiz_name,
        u.name AS student_name,
        u.email AS student_email, -- Tambahkan kolom email
        qr.start_time,
        qr.end_time,
        qr.duration,
        qr.score
    FROM 
        quiz_results AS qr
    INNER JOIN 
        quizzes AS q ON qr.quiz_id = q.id
    INNER JOIN
        users AS u ON qr.user_id = u.id
    ORDER BY
        qr.start_time DESC
";


$result = mysqli_query($conn, $query);

// Cek apakah query berhasil
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Quiz</title>
    <link rel="stylesheet" href="quiz_result.css">
    <style>
        /* Font */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            width: 250px;
            height: 100%;
            left: 0;
            background: red; /* Warna merah */
            color: white;
            overflow-y: auto;
        }

        .sidebar .text img {
            width: 150px;
            margin: 20px auto;
            display: block;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            line-height: 60px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 0 20px;
            display: block;
        }

        .sidebar ul li a:hover {
            background: #c9302c;
        }

        /* Header & Container */
        header {
            margin-left: 250px;
            padding: 20px;
            background: #f5f5f5;
            min-height: 100vh;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background: #f0f0f0;
            color: #333;
            font-weight: 600;
        }

        table tbody tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tbody tr:hover {
            background: #f1f1f1;
        }

        table tbody td {
            color: #555;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            header {
                margin-left: 200px;
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                width: 150px;
            }

            header {
                margin-left: 150px;
                padding: 10px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <nav class="sidebar">
        <div class="text">
            <img src="../image/Neuronworks.png" alt="Menu Image">
        </div>
        <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data_user.php">Data User</a></li>
                <li><a href="data_quiz.php">Data Quiz</a></li>
                <li><a href="quiz_result.php">Data Hasil Quiz</a></li>
                <li><a href="feedback.php">Data Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
    </nav>

    <header>
        <h1>Daftar Hasil Quiz</h1>
        <table>
                <thead>
        <tr>
            <th>Nama Quiz</th>
            <th>Nama Siswa</th>
            <th>Email</th> <!-- Tambahkan kolom email -->
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Durasi (Detik)</th>
            <th>Skor</th>
        </tr>
    </thead>

    <tbody>
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['quiz_name']) . "</td>
                    <td>" . htmlspecialchars($row['student_name']) . "</td>
                    <td>" . htmlspecialchars($row['student_email']) . "</td> <!-- Tambahkan email -->
                    <td>" . htmlspecialchars($row['start_time']) . "</td>
                    <td>" . htmlspecialchars($row['end_time']) . "</td>
                    <td>" . htmlspecialchars($row['duration']) . " detik</td>
                    <td>" . htmlspecialchars($row['score']) . "</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada hasil quiz.</td></tr>";
    }
    ?>
</tbody>

        </table>
    </header>
</body>
</html>
