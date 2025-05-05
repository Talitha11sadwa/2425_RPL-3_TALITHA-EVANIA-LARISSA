<?php
session_start();
include '../db_conn.php';

// Cek apakah user sudah login
if (!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

$user_id = $_SESSION['id'];

// Ambil data quiz terbaru milik user yang login (tanpa batasan nilai)
$query = "
    SELECT 
        users.name AS user_name, 
        quizzes.quiz_name, 
        quiz_results.score, 
        quiz_results.duration
    FROM 
        quiz_results
    JOIN 
        users ON quiz_results.user_id = users.id
    JOIN 
        quizzes ON quiz_results.quiz_id = quizzes.id
    WHERE 
        quiz_results.user_id = $user_id
    ORDER BY 
        quiz_results.id DESC
    LIMIT 1
";

$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);
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

  <!-- Certificate -->
<!-- Certificate -->
<?php if ($data && $data['score'] >= 70) : ?>
<div class="certificate">
  <img src="../image/Neuronworks.png" alt="Logo Neuronworks" class="logo">
  <h1>SERTIFIKAT PENCAPAIAN</h1>
  <h2>Diberikan kepada</h2>
  <div class="name"><?= htmlspecialchars($data['user_name']) ?></div>
  <p>Atas keberhasilan dalam menyelesaikan <span class="course"><?= htmlspecialchars($data['quiz_name']) ?></span><br>di platform pembelajaran <strong>Neuronworks</strong>.</p>

  <div class="score">
    Nilai Quiz: <span><?= $data['score'] ?>/100</span>
  </div>

  <div class="duration">
    Waktu Pengerjaan: <span><?= $data['duration'] ?> Detik</span>
  </div>

  <p class="date">Diberikan pada tanggal: <?= date("d M Y") ?></p>

  <div class="signature">
    <div>
      <hr>
      <div class="signature-name">Admin Neuronworks</div>
    </div>
    <div>
      <hr>
      <div class="signature-name">Mentor <?= htmlspecialchars($data['quiz_name']) ?></div>
    </div>
  </div>
</div>
<?php else : ?>
<div style="text-align:center; margin-top: 100px;">
  <h2 style="color:#b8002e;">Belum memenuhi syarat untuk mendapatkan sertifikat 😢</h2>
  <p>Nilai minimal yang dibutuhkan adalah <strong>80</strong>.<br>
     Tetap semangat belajar dan coba lagi ya! 💪</p>
</div>
<?php endif; ?>



   <!-- WhatsApp Floating -->
   <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>

</body>
</html>
