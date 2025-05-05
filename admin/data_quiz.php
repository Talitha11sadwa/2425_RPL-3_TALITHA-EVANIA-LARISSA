<?php
session_start();
include '../db_conn.php';

// Periksa apakah pengguna adalah admin

// Ambil data kuis dari database
$sql = "SELECT id, quiz_name, quiz_time FROM quizzes";
$result = mysqli_query($conn, $sql);

// Tangani error query
if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Quiz</title>
    <style>
/* Mengimpor font Poppins */
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* Styling untuk Sidebar */
.sidebar {
    position: fixed;
    width: 250px;
    height: 100%;
    left: 0;
    background: red; /* Warna merah */
    color: #fff;
    transition: left 0.4s ease;
    overflow-y: auto; /* Tambahkan scroll jika konten sidebar terlalu panjang */
}

.sidebar .text img {
    width: 150px;
    margin: 20px auto;
    display: block;
}

.sidebar ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.sidebar ul li {
    line-height: 60px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    padding: 0 20px;
    display: block;
    font-weight: 500;
    transition: background 0.3s ease;
}

.sidebar ul li a:hover {
    background: #c9302c; /* Warna merah tua untuk hover */
}

/* Tata Letak Halaman */
header {
    margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
    padding: 20px;
    background: #f5f5f5; /* Background halaman utama */
    min-height: 100vh; /* Pastikan tinggi mencakup layar penuh */
}

.container {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: auto;
}

h1 {
    font-size: 28px;
    color: #333;
    margin-bottom: 20px;
}

.btn-add {
    display: inline-block;
    margin-bottom: 20px;
    padding: 10px 20px;
    font-size: 16px;
    color: #fff;
    background: #d9534f; /* Warna merah */
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn-add:hover {
    background: #c9302c; /* Warna merah tua untuk hover */
}

/* Tabel */
table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    margin-top: 10px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
}

table th {
    background: #f0f0f0;
    color: #333;
}

table tr:nth-child(even) {
    background: #f9f9f9;
}

table tr:hover {
    background: #f1f1f1;
}

.btn-edit {
    color: #fff;
    background: #d9534f; /* Warna merah */
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn-edit:hover {
    background: #c9302c; /* Warna merah tua */
}

.btn-delete {
    color: #fff;
    background: #d9534f; /* Warna merah */
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.btn-delete:hover {
    background: #c9302c; /* Warna merah tua */
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

    .btn-add {
        font-size: 14px;
        padding: 8px 16px;
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

    .btn-add {
        font-size: 12px;
        padding: 6px 12px;
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
        <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="data_user.php">Data User</a></li>
                <li><a href="data_quiz.php">Data Quiz</a></li>
                <li><a href="quiz_result.php">Data Hasil Quiz</a></li>
                <li><a href="feedback.php">Data Feedback</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </ul>
    </nav>

    <header>
        <div class="container">
            <h1>Daftar Quiz</h1>
            <a href="new_quiz.php" class="btn-add">Tambah Quiz</a>
            <table border="1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Quiz</th>
                        <th>Durasi (Menit)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$no}</td>";
                            echo "<td>{$row['quiz_name']}</td>";
                            echo "<td>{$row['quiz_time']}</td>";
                            echo "<td>
                                    <a href='edit_quiz.php?id={$row['id']}' class='btn-edit'>Edit</a>
                                    <a href='delete_quiz.php?id={$row['id']}' class='btn-delete' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                            $no++;
                        }
                    } else {
                        echo "<tr><td colspan='4'>Tidak ada quiz tersedia.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </header>
</body>
</html>
