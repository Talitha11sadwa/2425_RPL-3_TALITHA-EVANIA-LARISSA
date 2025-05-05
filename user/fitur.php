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

    .content {
  max-width: 1100px;
  margin: 60px auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 12px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

.content h3 {
  font-size: 28px;
  color: #b8002e;
  text-align: center;
  margin-bottom: 30px;
}

.desk ol {
  list-style: none;
  padding: 0;
  margin: 0;
}

.desk li {
  display: flex;
  flex-wrap: wrap;
  align-items: flex-start;
  background-color: #fafafa;
  margin-bottom: 25px;
  border-left: 6px solid #b8002e;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.05);
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.desk li:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.desk img.tutor {
  width: 80px;
  height: 80px;
  margin-right: 20px;
  border-radius: 10px;
  object-fit: contain;
  background-color: #fff;
  border: 1px solid #eee;
}

.subjudul {
  font-weight: 600;
  font-size: 18px;
  color: #b8002e;
  display: block;
  margin-bottom: 5px;
}

.desk p {
  flex: 1 1 100%;
  font-size: 15px;
  color: #444;
  line-height: 1.6;
  margin-top: 5px;
}

/* Responsive layout */
@media (max-width: 768px) {
  .desk li {
    flex-direction: column;
    align-items: center;
    text-align: center;
  }

  .desk img.tutor {
    margin-bottom: 10px;
    margin-right: 0;
  }

  .desk p {
    text-align: justify;
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
  <!-- Hero -->
  <div class="content">
    <h3>Fitur</h3><br>
    <div class="desk">

        <ol>
            <li>
                <span class="subjudul">Transformation :</span>
                 <img class="tutor" src="../image/logo transformation.png" alt="Jre">
                <p> sebuah proses yang digunakan untuk mengubah,membersihkan, dan memanipulasi data dari berbagai sumber.
                    Transformation terdiri dari serangkaian langkah (steps) yang saling terhubung, di mana setiap langkah melakukan 
                    operasi spesifik seperti ekstraksi data, penggabungan, pengurutan, pembersihan, atau penulisan data ke target tertentu.
                    Transformation memungkinkan pengguna untuk mengatur dan menjalankan proses ETL secara fleksibel dan efisien,
                    memungkinkan data mentah diubah menjadi informasi yang siap digunakan untuk analisis lebih lanjut atau penyimpanan 
                    dalam data warehouse.</p>
            </li>
            <li>
                <span class="subjudul">Excel Input :</span>
                <img class="tutor" src="../image/logo excel input.png" alt="Jre">
                <p>Membaca data dari file Excel.</p>
            </li>
            <li>
                <span class="subjudul">Select Values :</span>
                <img class="tutor" src="../image/logo select values.png" alt="Jre">
                <p>Select Values berguna untuk memilih, menghapus, mengganti nama, Mengubah tipe data</p>
                <p>dan mengatur panjang serta presisi dari field dalam aliran data.</p>
            </li>
            <li>
                <span class="subjudul">dummy (do nonthing) :</span>
                <img class="tutor" src="../image/logo dummy do nonthing.png" alt="Jre">
                <p>Dummy tidak melakukan apa-apa.</p>
            </li>
            <li>
                <span class="subjudul">Replace in String :</span>
                <img class="tutor" src="../image/logo replace in string.png" alt="Jre">
                <p>pencarian dan penggantian sederhana.</p>
            </li>
            <li>
                <span class="subjudul">Table Output :</span>
                <img class="tutor" src="../image/logo table output.png" alt="Jre">
                <p>Memuat data ke database.</p>
            </li>
            <li>
                <span class="subjudul">CSV File Input :</span>
                <img class="tutor" src="../image/logo csv file input.png" alt="Jre">
                <p>Membaca data dari file CSV.</p>
            </li>
        </ol>
    </div>

    <div style="text-align: center; margin: 50px 0;">
        <a href="tutorial.php" style="
            background-color: #b8002e;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        " onmouseover="this.style.backgroundColor='#a00028'" onmouseout="this.style.backgroundColor='#b8002e'">
            ⬅️ Kembali ke Menu
        </a>
        </div>
  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>


</body>
</html>
