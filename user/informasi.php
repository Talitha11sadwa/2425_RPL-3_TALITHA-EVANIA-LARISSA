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
  background: #fff;
  border-radius: 20px;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
  padding: 60px 30px;
  margin: 50px auto;
  max-width: 1000px;
  animation: fadeInUp 0.7s ease;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.content h3 {
  margin-bottom: 40px;
  text-align: center;
  color: #b8002e;
  font-size: 30px;
  font-weight: 700;
}

.desk {
  color: #333;
  font-size: 18px;
  text-align: justify;
  line-height: 1.9;
  margin: 0 auto;
  max-width: 900px;
}

.desk p {
  margin-bottom: 24px;
  text-indent: 26px;
}

ol {
  padding-left: 25px;
  margin-bottom: 30px;
}

ol li {
  margin-bottom: 25px;
}

.subjudul {
  font-weight: 600;
  font-size: 20px;
  color: #b8002e;
  display: block;
  margin-bottom: 8px;
}

/* Semua gambar di tengah otomatis */
.content img {
  display: block;
  margin: 30px auto;
  max-width: 100%;
  border-radius: 12px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
}

/* Responsive improvement */
@media (max-width: 768px) {
  .content {
    padding: 40px 20px;
  }

  .desk {
    font-size: 16px;
  }

  .content h3 {
    font-size: 24px;
  }

  .subjudul {
    font-size: 18px;
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
        
  <div class="content">
        <h3 style="color:#b8002e;">Informasi</h3>
        <img class="logo pentaho" src="../image/logo pentaho.png" alt="Jre" style="margin-left:455px; margin-left:360px; ">
        <img class="sejarah perusahaan" src="../image/sejarah-pentaho.png" alt="Jre" style="width:350px;  ">
        <br><br>
        <p class="desk">
        Pentaho adalah software Business Intelligence (BI) yang menyediakan data integrasi,
        pelayanan OLAP, reporting, dashboarding, data mining dan kemampuan ETL.
        </p>

        <p class="desk">
            Data Integration (PDI), juga dikenal sebagai Kettle, adalah alat ETL (Extract, Transform, Load)
            yang digunakan untuk mengintegrasikan, mentransformasikan, dan memuat data dari berbagai sumber
            ke dalam format yang bisa dianalisis. PDI dapat digunakan untuk migrasi data, membersihkan data,
            Loading dari file ke database atau sebaliknya dalam volume besar. Keunggulan PDI adalah tersedia
            graphical user interface dan drag-drop.
        </p>
        <br><br>

        <img class="spoon" src="../image/spoon.jpg" alt="Jre" style="margin-left:320px;">
        <br><br>
        <p class="desk">
       
        Pentaho Data Integration memiliki tiga komponen utama, yakni spoon, pan dan kitchen. Spoon
        adalah user interface untuk membuat job dan transformation, kemudian pan itu program yang mengeksekusi transform 
        kitchen merupakan program yang mengeksekusi job.
        </p>

        <p class="desk">
            Pentaho server sendiri memiliki berbagai versi sesuai dengan kebutuhan, yaitu di antaranya open source,
            professional standard, professional premium, dan enterprise. Jika kamu memiliki sejumlah kumpulan data besar,
            maka kamu bisa menggunakan Pentaho untuk menangani segala jenis kumpulan data tersebut.
        </p>
        <br>
        <img class="spoon" src="../image/spoon.png" alt="Jre"style="margin-left:320px; width:300px;">
        <br><br>
        <p class="desk">
        transformasi Ciri-cirinya, terdiri dari step (berisikan tugas-tugas), dieksekusi oleh pan (pan.bat atau pan.sh) dan format filenya (.ktr).
        Selanjutnya Job adalah komponen dari PDI yang menangani kontrol atas aliran tugas atau transformasi. Job memiliki ciri-ciri, bisa terdiri dari satu atau beberapa
        transformation dan job lain, dieksekkusi oleh kitchen (kitchen.bat atau kitchen.sh) dan format filenya (.kjb).
        </p>
    </div>

    <div class="desk">
        <h3 align="center" style="color:#b8002e;">Keuntungan Menggunakan Pentaho adalah:</h3>
        <ol>
            <li>
                <span class="subjudul">User-friendly :</span>
                <p>
                    Pentaho dirancang agar mudah digunakan oleh pemula. Pengguna dapat langsung memulai membuat dan
                    berbagi laporan serta dashboard dengan mudah.
                </p>
            </li>

            <li>
                <span class="subjudul">Menekan Pengeluaran Bisnis :</span>
                <p>
                    Sebagai alat open-source, Pentaho membantu mengurangi biaya operasional bisnis, terutama bagi bisnis kecil,
                    dengan pilihan langganan yang terjangkau.
                </p>
            </li>

            <li>
                <span class="subjudul">Menjaga Keamanan Data :</span>
                <p>
                    Pentaho menawarkan fitur keamanan data yang kuat dengan kontrol akses yang solid, memastikan data bisnis
                    tetap aman dari ancaman.
                </p>
            </li>

            <li>
                <span class="subjudul">Bisnis Terintegrasi:</span>
                <p>
                    Mengintegrasikan sistem bisnis dapat menciptakan kesejahteraan dari berbagai aspek bisnis internal dan eksternal.
                    Dengan Pentaho, mampu mengintegrasikan bisnis dengan tools open-source yang menawarkan berbagai macam connectors
                    dan membuatnya mudah untuk terhubung ke berbagai sumber data. Fitur integrasi pada Pentaho ini sangat ideal bagi
                    bisnis yang membutuhkan berbagai sumber data.
                </p>
                </div>

    <div class="desk">
        <h3 align="center" style="color:#b8002e;">Kekurangan Menggunakan Pentaho adalah:</h3>
        <ol>
            <li>
                <span class="subjudul">Kurva Pembelajaran yang Curam :</span>
                <p>
                Untuk pengguna pemula, terutama mereka yang tidak memiliki pengalaman dalam alat ETL (Extract, Transform, Load) atau analitik, 
                memahami cara kerja Pentaho bisa memakan waktu.
                <P>Membutuhkan waktu untuk memahami antarmuka dan alat seperti Spoon, terutama jika mengerjakan proses ETL yang kompleks.
                </p>
            </li>
            <li>
                <span class="subjudul">Kinerja pada Volume Data yang Sangat Besar:</span>
                <p> Meskipun cukup baik untuk banyak kasus penggunaan, Pentaho kadang menghadapi tantangan performa saat 
                    menangani data dalam jumlah yang sangat besar.
                <P>Untuk volume data masif, solusi komersial tertentu (seperti Talend atau Informatica)
                   dapat memberikan kinerja yang lebih tinggi.
                </p>
            </li>
            <li>
                <span class="subjudul">Terbatasnya Fitur di Versi Komunitas:</span>
                <p>Versi Community Edition (open-source) memiliki keterbatasan dalam hal fitur jika dibandingkan dengan versi Enterprise.
                <P>Contohnya adalah kurangnya alat manajemen metadata yang canggih, integrasi lanjutan, dan dukungan pengguna prioritas.
                </p>
            </li>
            <li>
                <span class="subjudul">Dokumentasi yang Tidak Konsisten:</span>
                <p>Dokumentasi untuk versi komunitas kadang tidak diperbarui secara berkala, sehingga pengguna harus mencari solusi di forum atau sumber eksternal.
                <P>Tidak jarang pengguna harus melakukan eksperimen untuk mempelajari fitur tertentu karena minimnya panduan resmi.
                </p>
            </li>
            <li>
                <span class="subjudul">Antarmuka Pengguna yang Kurang Modern:</span>
                <p>Antarmuka pengguna di beberapa alatnya terlihat agak ketinggalan zaman dibandingkan dengan solusi modern lainnya, 
                   yang mungkin kurang intuitif bagi pengguna baru.
                </p>
            </li>
        </ol>
    </div>

  <!-- WhatsApp Floating -->
  <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>


</body>
</html>
