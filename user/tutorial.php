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

  <main style="padding: 60px 20px; background: #f9fafa; text-align: center;">
  <h1 style="color: #b8002e; font-size: 32px; font-weight: 700; margin-bottom: 10px;">
    Selamat datang di Pembelajaran Pentaho
  </h1>
  <p style="font-size: 18px; color: #555; margin-bottom: 40px;">
    Rasakan pengalaman belajar yang menyenangkan dan mempelajari cara menggunakan Pentaho.
  </p>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 30px;">
    <!-- Kartu 1 -->
    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 300px;">
      <h3 style="color: #b8002e; margin-bottom: 10px;">Pengenalan Toolbox Pentaho</h3>
      <p style="color: #555; font-size: 15px; margin-bottom: 20px;">Memperkenalkan Toolbox Pentaho.</p>
      <a href="fitur.php" style="background: #0048ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">Lihat Materi</a>
    </div>

    <!-- Kartu 2 -->
    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 300px;">
      <h3 style="color: #b8002e; margin-bottom: 10px;">Tutorial Study Kasus</h3>
      <p style="color: #555; font-size: 15px; margin-bottom: 20px;">Cara Membuat Study Kasus Pentaho.</p>
      <a href="tutorialStudyKasus.php" style="background: #0048ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">Lihat Materi</a>
    </div>

    <!-- Kartu 3 -->
    <div style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); width: 300px;">
      <h3 style="color: #b8002e; margin-bottom: 10px;">Tutorial Install Pentaho</h3>
      <p style="color: #555; font-size: 15px; margin-bottom: 20px;">Cara Menginstall Aplikasi Pentaho.</p>
      <a href="pentaho.php" style="background: #0048ff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">Lihat Materi</a>
    </div>
  </div>
</main>

  

  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>


</body>
</html>
