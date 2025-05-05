<?php
// Koneksi ke database
include('../db_conn.php');

// Ambil semua quiz yang tersedia
$query = "SELECT * FROM quizzes";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Tidak ada quiz yang tersedia.");
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

    .quiz-list {
    margin: 100px auto;
    padding: 0 20px;
    max-width: 1000px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    }

    .quiz-item {
    background: #fff;
    border: none;
    border-radius: 20px;
    padding: 30px 20px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    }

    .quiz-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.12);
    }

    .quiz-item h2 {
    font-size: 22px;
    color: #b8002e;
    margin-bottom: 10px;
    }

    .quiz-item p {
    font-size: 15px;
    margin-bottom: 20px;
    color: #555;
    }

    .start-button {
    margin-top: auto;
    background: linear-gradient(135deg, #b8002e, #c94c61);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 30px;
    font-size: 14px;
    font-weight: 600;
    text-decoration: none;
    transition: background 0.3s ease;
    }

    .start-button:hover {
    background: linear-gradient(135deg, #a0002f, #b0394e);
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
  <h1 style="text-align: center; margin-top: 80px;">Pilih Quiz</h1>
    <p style="text-align: center; margin-bottom: 20px;">Silakan pilih salah satu quiz untuk dikerjakan.</p>

    <div class="quiz-list">
    <?php while ($quiz = mysqli_fetch_assoc($result)): ?>
        <div class="quiz-item">
        <h2><?= htmlspecialchars($quiz['quiz_name']); ?></h2>
        <p><strong>Durasi:</strong> <?= htmlspecialchars($quiz['quiz_time']); ?> menit</p>
        <a href="quiz_page_user.php?quiz_id=<?= $quiz['id']; ?>" class="start-button">🚀 Mulai Sekarang</a>
        </div>
    <?php endwhile; ?>
    </div>


  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>


</body>
</html>
