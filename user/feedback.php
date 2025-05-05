<?php
    // Include file koneksi database
    include "../db_conn.php";

    // Proses form jika tombol submit diklik
    if (isset($_POST['submit'])) {
        // Ambil data dari form dan lakukan sanitasi
        $name = trim(htmlspecialchars($_POST['name']));
        $email = trim(htmlspecialchars($_POST['email']));
        $pesan = trim(htmlspecialchars($_POST['message']));
        $waktu = date("Y-m-d"); // Tanggal hari ini dalam format DATE

        $errors = []; // Array untuk menyimpan error

        // Validasi input
        if (empty($name)) {
            $errors[] = "Name is required.";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Valid email is required.";
        }
        if (empty($pesan)) {
            $errors[] = "Message is required.";
        }

        // Jika tidak ada error, simpan ke database
        if (empty($errors)) {
            $sql = "INSERT INTO feedback (name, email, pesan, waktu) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $name, $email, $pesan, $waktu);

            if ($stmt->execute()) {
                echo "<script>alert('Feedback sent successfully!');</script>";
                header("Refresh: 0");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            // Tampilkan error jika ada
            foreach ($errors as $error) {
                echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
            }
        }
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
    /* Feedback Form Styling */
.form-container {
  margin-top: 30px;
  background: #fff;
  padding: 30px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
  max-width: 550px;
  width: 100%;
}

.form-container form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-container input,
.form-container textarea {
  padding: 12px 16px;
  border: 2px solid #ddd;
  border-radius: 10px;
  font-size: 1em;
  transition: border-color 0.3s ease;
}

.form-container input:focus,
.form-container textarea:focus {
  border-color: #b8002e;
  outline: none;
}

.form-container textarea {
  resize: vertical;
  min-height: 120px;
}

.form-container button {
  background-color: #b8002e;
  color: #fff;
  padding: 14px;
  border: none;
  border-radius: 10px;
  font-weight: 600;
  font-size: 1em;
  cursor: pointer;
  transition: background 0.3s ease;
}

.form-container button:hover {
  background-color: #a30026;
}

/* Hero section tweak */
.hero-text {
  text-align: center;
}

.hero-text h1 {
  font-size: 32px;
  font-weight: 700;
  color: #b8002e;
}

.hero-text h2 {
  font-size: 18px;
  font-weight: 400;
  color: #444;
  margin-bottom: 10px;
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
  <header>
    <div class="hero-container">
    <div class="hero-text">
    <h1>Berikan Feedbackmu</h1>
    <h2>Kami ingin mendengar pendapatmu tentang platform Neuronworks</h2>

    <div class="form-container">
        <form method="post" action="feedback.php">
        <input type="text" name="name" placeholder="Nama kamu" required />
        <input type="email" name="email" placeholder="Email aktif" required />
        <textarea name="message" placeholder="Pesan atau masukan kamu..." required></textarea>
        <button type="submit" name="submit">Kirim</button>
        </form>
    </div>
    </div>

  </header>

  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/6281234567890" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>


</body>
</html>
