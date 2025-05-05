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

    /* Kontainer konten */
.content {
  margin: 80px auto;
  padding: 20px;
  max-width: 1000px;
  background: #fff;
  border-radius: 16px;
  box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}

/* Heading di dalam content */
.content h3 {
  margin-bottom: 20px;
  text-align: center;
  color: #b8002e;
  font-size: 30px;
  font-weight: 600;
}

/* Deskripsi */
.desk {
  margin-bottom: 60px;
  line-height: 1.8;
  font-size: 18px;
  color: #333;
}

/* Gambar tutorial */
.tutor {
  display: block;
  margin: 20px auto;
  max-width: 600px; /* Batasi lebar maksimal */
  width: 100%;       /* Biar responsif */
  height: auto;
  border-radius: 10px;
  border: 1px solid #ddd;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}


/* List */
.desk ol {
  padding-left: 25px;
}

.desk ol li {
  margin-bottom: 18px;
  font-size: 17px;
}

/* Subjudul */
.desk .subjudul {
  font-weight: bold;
  font-size: 20px;
  color: black;
}

/* Responsive tweak */
@media (max-width: 768px) {
  .content {
    padding: 15px;
  }

  .tutor {
    width: 100%;
  }

  .desk ol {
    padding-left: 20px;
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
 <!-- Content -->
 <div class="content">
        <h3>Tutorial Study Kasus</h3><br>
        <img class="tutor" src="../image/tr_csv.png" alt="transformation" style="margin-left:180px;">

        <div class="desk">
            <h3 align="center">Transformation</h3><br>
            <ol>
                <li>
                    <p>Pilih File > Baru > Transformasi di pojok kiri atas jendela PDI.</p>
                    <img class="tutor" src="../image/transformation (1).png" alt="transformation">
                </li>
                <li>
                    <p>Di bawah tab Desain, perluas node Input, lalu pilih dan seret langkah Input File Teks ke kanvas.</p>
                </li>
                <li>
                    <p>Klik dua kali langkah Input File Teks. Di jendela Input file teks, Anda dapat mengatur properti dari langkah tersebut.</p>
                    <img class="tutor" src="../image/transformasi 1.png" alt="transformation">
                </li>
                <li>
                    <p>Di bidang Nama Langkah, ketik Baca Data Buku. Langkah Input File Teks sekarang diubah namanya menjadi Baca Data Buku.</p>
                </li>
                <li>
                    <p>Klik Telusuri untuk menemukan file sumber data_buku.csv di folder...\design-tools\data-integration\samples\transformations\files</p>
                    <p>Tombol Telusuri muncul di sisi kanan atas jendela di dekat bidang File atau Direktori.</p>
                </li>
                <li>
                    <p>Ubah tipe File menjadi *.csv. Pilih data_buku.csv, lalu klik OK. Jalur menuju file sumber muncul di bidang File atau direktori.</p>
                </li>
                <li>
                    <p>Klik Tambah. Jalur menuju file muncul di bawah File yang Dipilih.</p>
                </li>
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">Excel Input</h3><br>
            <ol>
                <p>Kumpulan tips, trik, komentar, masalah, dan kemampuan dari Langkah Input Excel.</p>
                <img class="tutor" src="../image/excel input 1.png" alt="excel input">
                <img class="tutor" src="../image/excel input 2.png" alt="excel input">
                <img class="tutor" src="../image/excel input 3.png" alt="excel input">
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">Select Values</h3><br>
            <ol>
                <li>
                    <p>Langkah Select Values berguna untuk memilih, menghapus, mengganti nama, mengubah tipe data, dan mengatur panjang serta presisi dari field dalam aliran data.</p>
                </li>
                <li>
                    <p>Operasi-operasi ini diorganisir dalam beberapa kategori:</p>
                </li>
                <li>
                    <p>Select and Alter - Menentukan urutan dan nama tepat dari field yang harus ditempatkan dalam baris output.</p>
                    <img class="tutor" src="../image/select values 2.png" alt="select values">
                </li>
                <li>
                    <p>Remove - Menentukan field yang harus dihapus dari baris output.</p>
                </li>
                <li>
                    <p>Meta-data Mengubah nama, tipe, panjang, dan presisi (metadata) dari satu atau lebih field.</p>
                    <img class="tutor" src="../image/select values 1.png" alt="select values">
                </li>
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">Dummy (do nothing)</h3><br>
            <ol>
                <li>
                    <p>Langkah Dummy tidak melakukan apa-apa.</p>
                </li>
                <li>
                    <p>Fungsi utamanya adalah sebagai placeholder untuk keperluan pengujian.</p>
                </li>
                <li>
                    <p>Sebagai contoh, untuk membuat sebuah transformasi, Anda membutuhkan setidaknya dua langkah yang saling terhubung.</p>
                </li>
                <li>
                    <p>Jika Anda ingin menguji langkah file input, Anda dapat menghubungkannya ke langkah Dummy.</p>
                    <img class="tutor" src="../image/dummy.png" alt="dummy">
                </li>
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">Replace In String</h3><br>
            <ol>
                <li>
                    <p>Replace in string adalah pencarian dan penggantian sederhana.</p>
                </li>
                <li>
                    <p>Ini juga mendukung regular expressions dan referensi grup.</p>
                </li>
                <li>
                    <p>Referensi grup digunakan dalam penggantian string sebagai $n, di mana n adalah nomor grup.</p>
                </li>
                <img class="tutor" src="../image/replace 2.png" alt="replace in string">
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">Table Output</h3><br>
            <ol>
                <li>
                    <p>Langkah Output Tabel memungkinkan Anda untuk memuat data ke dalam tabel database.</p>
                </li>
                <li>
                    <p>Output Tabel setara dengan operator DML INSERT.</p>
                </li>
                <li>
                    <p>Langkah ini menyediakan opsi konfigurasi untuk tabel tujuan dan banyak opsi terkait pemeliharaan dan / atau kinerja seperti Ukuran komit dan Gunakan pembaruan batch untuk penyisipan.</p>
                </li>
                <li>
                    <p>Jika Anda memiliki tabel database yang memiliki kolom identitas dan Anda menyisipkan sebuah catatan, sebagai bagian dari penyisipan, driver JDBC biasanya akan mengembalikan kunci yang dihasilkan secara otomatis yang digunakan saat melakukan penyisipan.</p>
                </li>
                <li>
                    <p>Catatan: Ini tidak didukung di semua jenis database.</p>
                    <img class="tutor" src="../image/table output (1).png" alt="table output">
                    <img class="tutor" src="../image/table output (2).png" alt="table output">
                </li>
            </ol>
        </div>

        <div class="desk">
            <h3 align="center">CSV File Input</h3><br>
            <ol>
                <li>
                    <p>Langkah ini memberikan kemampuan untuk membaca data dari file yang dipisahkan oleh delimiter.</p>
                </li>
                <li>
                    <p>Label CSV untuk langkah ini kurang tepat karena Anda dapat menentukan pemisah apa pun yang ingin digunakan, seperti pipa, tab, dan titik koma; Anda tidak terbatas pada penggunaan koma.</p>
                </li>
                <li>
                    <p>Pemrosesan internal memungkinkan langkah ini memproses data dengan cepat.</p>
                </li>
                <li>
                    <p>Opsi untuk langkah ini adalah subset dari langkah Input File Teks.</p>
                </li>
                <li>
                    <p>Contoh transformasi Input CSV sederhana dapat ditemukan di bawah ...\samples\transformations\CSV Input - Reading customer data.ktr.</p>
                    <img class="tutor" src="../image/csv file input 1 (1).png" alt="csv file input">
                    <img class="tutor" src="../image/csv file input 1 (2).png" alt="csv file input">
                </li>
            </ol>
        </div>
    </div>
        <!-- Tombol Kembali -->
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


  < <div class="wa-float">
  <a href="https://wa.me/085773918172" target="_blank" title="Hubungi via WhatsApp">
    <i class="fab fa-whatsapp"></i>
  </a>
</div>
</body>
</html>
