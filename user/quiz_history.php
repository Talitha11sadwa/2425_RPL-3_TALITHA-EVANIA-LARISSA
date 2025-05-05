<?php
session_start();
include('../db_conn.php');

// Cek apakah user sudah login
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php'); // Arahkan ke halaman login jika belum login
    exit();
}

// Ambil user_id dari sesi login
// Ambil user_id dari sesi login
$user_id = $_SESSION['id'];

// Ambil nama user
$user_query = "SELECT name FROM users WHERE id = $user_id";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$user_name = $user_data['name'];

// Query untuk mengambil history quiz
$query = "
    SELECT 
        qr.id AS result_id, 
        q.quiz_name, 
        qr.start_time, 
        qr.end_time, 
        qr.duration, 
        qr.score 
    FROM 
        quiz_results qr
    JOIN 
        quizzes q ON qr.quiz_id = q.id
    WHERE 
        qr.user_id = $user_id
    ORDER BY 
        qr.start_time DESC
";


$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query gagal: " . mysqli_error($conn));
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Neuronworks | Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
        background: #f4f4f4;
      color: #333;
    }

    /* Navbar */
    .navbar {
    position: sticky;
    top: 0;
    z-index: 999;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(184, 0, 46, 1); /* Full opacity */
    color: white;
    padding: 12px 40px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Shadow lebih tegas */
    }

    .navbar.sticky {
    background: rgba(184, 0, 46, 0.95); /* Sedikit transparan di sticky */
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.25); /* Shadow yang lebih tebal */
    }


    .navbar .logo img {
      height: 35px;
    }

    .navbar ul {
      display: flex;
      list-style: none;
      gap: 20px;
      flex-wrap: wrap;
    }

    .navbar li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .navbar li a:hover {
      color: #FFD4DB;
    }

    /* Hero Section */
    header {
    padding-top: 100px;
    min-height: 100vh;
    background: white; /* Ubah background jadi putih */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: left;
    }

    .hero-text h1,
    .hero-text h2 {
    color: #b8002e; /* Merah khas Neuronworks */
    }

    .hero-text p {
    color: #333; /* Tetap hitam */
    }



    .hero-container {
      display: flex;
      flex-wrap: wrap;
      gap: 50px;
      max-width: 1200px;
      padding: 0 20px;
      justify-content: center;
      align-items: center;
    }

    .hero-img {
      flex: 1 1 300px;
    }

    .hero-img img {
      width: 100%;
      max-width: 500px;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .hero-text {
      flex: 1 1 300px;
    }

    .hero-text h1 {
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 15px;
    }

    .hero-text h2 {
      font-size: 24px;
      font-weight: 400;
      margin-bottom: 20px;
    }

    .hero-text p {
      font-size: 16px;
      line-height: 1.6;
      max-width: 600px;
    }

    .history-container {
  max-width: 1000px;
  margin: 80px auto;
  padding: 30px;
  background-color: #fff;
  border-radius: 16px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.history-container h1 {
  font-size: 32px;
  color: #b8002e;
  margin-bottom: 30px;
}

.table-wrapper {
  overflow-x: auto;
}

.history-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.history-table thead {
  background-color: #b8002e;
  color: white;
}

.history-table th,
.history-table td {
  padding: 14px 20px;
  text-align: center;
  border-bottom: 1px solid #eee;
}

.history-table tbody tr:hover {
  background-color: #f9f9f9;
}

.btn-back {
  display: inline-block;
  margin-top: 20px;
  background-color: #b8002e;
  color: white;
  padding: 12px 24px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 600;
  transition: background 0.3s ease;
}

.btn-back:hover {
  background-color: #a30026;
}

.no-data {
  font-size: 18px;
  color: #666;
  margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 768px) {
  .history-container {
    padding: 20px;
  }

  .history-container h1 {
    font-size: 24px;
  }

  .history-table th, .history-table td {
    padding: 10px 12px;
    font-size: 14px;
  }
}


    /* WhatsApp Icon */
    .wa-float {
      position: fixed;
      bottom: 25px;
      right: 25px;
      z-index: 1000;
    }

    .wa-float a {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 55px;
      height: 55px;
      background-color: #25d366;
      color: white;
      border-radius: 50%;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      font-size: 28px;
      text-decoration: none;
      transition: transform 0.3s ease;
    }

    .wa-float a:hover {
      transform: scale(1.1);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .navbar {
        flex-direction: column;
        align-items: flex-start;
      }

      .navbar ul {
        flex-direction: column;
        width: 100%;
        margin-top: 10px;
        gap: 10px;
      }

      .hero-text h1 {
        font-size: 30px;
      }

      .hero-text h2 {
        font-size: 20px;
      }

      header {
        text-align: center;
        padding-top: 120px;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="logo">
      <img src="../image/Neuronworks.png" alt="Neuronworks Logo">
    </div>
    <ul>
      <li><a href="home.php">Home</a></li>
      <li><a href="informasi.php">Informasi</a></li>
      <li><a href="tutorial.php">Tutorial</a></li>
      <li><a href="quiz.php">Quiz</a></li>
      <li><a href="quiz_history.php">Hasil</a></li>
      <li><a href="feedback.php">Feedback</a></li>
      <li><a href="sertifikat.php">Sertifikat</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </nav>

  <!-- Hero -->
  <div class="history-container">
  <h1>Riwayat Quiz Anda</h1>
  <?php if (mysqli_num_rows($result) > 0): ?>
      <div class="table-wrapper">
        <table class="history-table">
        <thead>
                <tr>
                    <th>Nama Quiz</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Durasi (menit)</th>
                    <th>Skor</th>
                    <th>Sertifikat</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                

  

                  <tr>
                    <td><?= htmlspecialchars($row['quiz_name']); ?></td>
                    <td><?= htmlspecialchars($row['start_time']); ?></td>
                    <td><?= htmlspecialchars($row['end_time']); ?></td>
                    <td><?= round($row['duration'] / 60, 2); ?></td>
                    <td><?= htmlspecialchars($row['score']); ?></td>
                    <td>
                      <?php if ($row['score'] >= 70): ?>
                          <button onclick="printSertifikat('sertifikat-<?= $row['result_id']; ?>')" class="btn-back">Download</button>
                          <div id="sertifikat-<?= $row['result_id']; ?>" style="display:none; padding:40px; text-align:center; background:white; color:black;">
    <div class="certificate">
        <img src="../image/Neuronworks.png" alt="Logo Neuronworks" class="logo">
        <h1>SERTIFIKAT PENCAPAIAN</h1>
        <h2>Diberikan kepada</h2>
        <div class="name"><?= htmlspecialchars($user_name) ?></div>
        <p>Atas keberhasilan dalam menyelesaikan <span class="course"><?= htmlspecialchars($row['quiz_name']) ?></span><br>di platform pembelajaran <strong>Neuronworks</strong>.</p>

        <div class="score">
            Nilai Quiz: <span><?= htmlspecialchars($row['score']) ?>/100</span>
        </div>

        <div class="duration">
            Waktu Pengerjaan: <span><?= htmlspecialchars($row['duration']) ?> Detik</span>
        </div>

        <p class="date">Diberikan pada tanggal: <?= date("d M Y") ?></p>

        <div class="signature">
            <div>
                <hr>
                <div class="signature-name">Admin Neuronworks</div>
            </div>
            <div>
                <hr>
                <div class="signature-name">Mentor</div>
            </div>
        </div>
    </div>
</div>

                          </div>
                      <?php else: ?>
                          <span style="color: #999;">Skor di bawah 70</span>
                      <?php endif; ?>
                  </td>

                </tr>

                <?php endwhile; ?>
            </tbody>
        </table>
      </div>
  <?php else: ?>
      <p class="no-data">Belum ada quiz yang Anda kerjakan.</p>
  <?php endif; ?>
  <a href="quiz.php" class="btn-back">← Kembali ke Daftar Quiz</a>
</div>

  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>
<script>
function printSertifikat(divId) {
    const content = document.getElementById(divId).innerHTML;

    const printWindow = window.open('', '', 'width=900,height=700');
    printWindow.document.write(`
        <html>
        <head>
            <title>Sertifikat</title>
            <style>
               .certificate {
      max-width: 960px;
      margin: 80px auto;
      background: linear-gradient(145deg, #ffffff, #f7f7f7);
      border: 12px solid #b8002e;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      padding: 60px 40px;
      text-align: center;
    }

    .certificate img.logo {
      width: 130px;
      margin-bottom: 25px;
    }

    .certificate h1 {
      font-size: 36px;
      color: #b8002e;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .certificate h2 {
      font-size: 20px;
      color: #555;
      font-weight: 400;
      margin-bottom: 8px;
    }

    .name {
      font-size: 28px;
      font-weight: 700;
      color: #222;
      margin: 15px 0;
    }

    .course {
      font-weight: 600;
      color: #444;
    }

    .score {
      margin: 25px 0;
      font-size: 18px;
      color: #444;
    }

    .score span {
      font-weight: bold;
      color: #b8002e;
    }

    .date {
      font-style: italic;
      color: #777;
      margin-top: 5px;
    }

    .signature {
      display: flex;
      justify-content: space-evenly;
      margin-top: 50px;
      flex-wrap: wrap;
      gap: 30px;
    }

    .signature div {
      text-align: center;
    }

    .signature hr {
      width: 160px;
      border: 1px solid #222;
      margin-bottom: 10px;
    }

    .signature-name {
      font-weight: 600;
      color: #333;
    }

    .duration {
    margin-top: 8px;
    font-size: 17px;
    color: #444;
    }
    .duration span {
    font-weight: 600;
    color: #b8002e;
    }
            </style>
        </head>
        <body onload="window.print(); window.close();">
            ${content}
        </body>
        </html>
    `);
    printWindow.document.close();
}
</script>


</body>
</html>
