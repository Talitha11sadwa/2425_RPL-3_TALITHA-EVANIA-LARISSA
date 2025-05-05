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

    .desk {
    background-color: #ffffff;
    padding: 30px;
    margin: 30px auto;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    max-width: 900px;
    line-height: 1.7;
    color: #333;
    }

    .desk h3 {
    font-size: 24px;
    color: #b8002e;
    margin-bottom: 15px;
    }

    .desk ol {
    padding-left: 20px;
    }

    .desk li {
    margin-bottom: 20px;
    }

    .desk p {
    font-size: 16px;
    margin-bottom: 5px;
    }

    .tutor {
    max-width: 100%;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-top: 10px;
    margin-bottom: 20px;
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
        

        <div class="desk">
            <h3 align="center">Tutorial Install Pentaho</h3><br>
            <h3 align="center">Download Pentaho</h3><br>
            <ol>
                <li>
                    <p>Untuk Mendownload Pentaho, dapat diakses pada link berikut:</p>
                    <p>https://sourceforge.net/projects/pentaho.</p>
                </li>
                <li>
                    <p>Klik tombol "download" untuk mengunduh file Zip pada laptop anda.</p>
                    <img class="tutor" src="../image/install pentaho.png" alt="Download Pentaho">
                </li>
                <li>
                    <p>Setelah selesai mengunduh file Zip, silahkan Extract file pada folder</p>
                    <p>yang anda inginkan pada laptop anda.</p>
                    <img class="tutor" src="../image/file pentaho.png" alt="Extract File Pentaho">
                </li>
            </ol>

            <h3 align="center">Instalasi Java</h3><br>
            <ol>
                <li>
                    <p>Untuk menjalankan, Pentaho Data Integration, Java Runtime Environment</p>
                    <p>dan Java Development sangat diperlukan.</p>
                </li>
                <li>
                    <p>Jika anda ingin mengecek apakah sudah terinstal pada laptop anda, Silahkan</p>
                    <p>cek file explorer : C://Program Files\Java atau C:\Program Files (x86)\Java.</p>
                    <img class="tutor" src="../image/jdk.png" alt="Java Installation Check">
                </li>
                <li>
                    <p>Apabila folder ini sudah tersedia, dan anda sudah memiliki file yang dibutuhkan.</p>
                </li>
                <li>
                    <p>Apabila file / folder tersebut tidak tersedia pada laptop anda, atau anda tidak memiliki</p>
                    <p>Salah 1 dari folder tersebut, maka anda perlu mendownload JRE dan atau JDK.</p>
                </li>
                <li>
                    <p>Untuk Dowloand JRE, silahkan kunjungi link berikut : https://java.com/en/dowloand/ dan</p>
                    <p>Klik "Agree and start free Dowloand".</p>
                    <img class="tutor" src="../image/java.png" alt="Java Download">
                </li>
                <li>
                    <p>Jendela Instalasi akan tampil seperti gambar berikut ini. ikuti pentujuk hingga selesai.</p>
                    <img class="tutor" src="../image/update java.png" alt="Java Installation Setup">
                </li>
            <li>
                 <p>Kemudian, lanjutkan untuk Mendownload JDK, dapat diakses pada link berikut : link.</p>
            </li>
            <li>
                 <p>Akan ada banyak pilihan untuk operating system yang berbeda-beda, karena ini adalah</p>
                 <p>Tutorial menggunakan windows, maka silahkan dicari hingga menemukan "Windows".</p>
            </li>
            <li>
                 <p>Apabila Anda tidak yakin dengan versi windows anda (x64 atau x86), pilih x86.</p>
                 <img class="tutor" src="../image/versi windows1.png" alt="Java Installation Setup">
            </li>
            <li>
                 <p>Apabila Anda tidak login ke dalam oracle, maka anda dianjurkan untuk login.</p>
            </li>
            <li>
                 <p>Apabila Anda tidak login memiliki akun, anda perlu membuat akun untuk mendownload JDK.</p>
            </li>
            <li>
                 <p>Jendela instalasi setup akan tampil seperti ini:</p>
                 <img class="tutor" src="../image/java install.jpg" alt="Java Installation Setup">
            </li>
</ol>
            <div class="desk">
        <h3 align="center">Set Up The Environment Variable</h3><br>

        <ol>
            <li>
                <p>Ada 3 Environment Variable yang perlu setting.</p>
            </li>
            <li>
                 <p>Cara yang paling mudah untuk membuka Environment Variable menu adalah</p>
                 <p>dengan mengentikkan "Environment Variables" pada menu pencarian windows.</p>
            </li> 
            <li>
                 <p>Klik "Edit the System Environment Variables"</p> 
                 <img class="tutor" src="../image/enviroment.png" alt="Java Installation Setup">
            </li> 
            <li>
                 <p>Akan terbuka jendela "System Properties. Klik Tombol "Environment Variables"</p>
                 <p>yang ada di bagian bawah.</p>
                 <img class="tutor" src="../image/system enviroment.png" alt="Java Installation Setup">
            </li> 
            <li>
                 <p>Akan terbuka jendela yang terlihat seperti tampilan di bawah ini.</p> 
            </li> 
            <li>
                 <p>Dibutuhkan untuk menambah 3 System Variables baru. Klik tombol "New".</p> 
                 <P>Ikuti paduan pengisian selanjutnya.</p>
                 <img class="tutor" src="../image/system variables 1.png" alt="Java Installation Setup">
                 <img class="tutor" src="../image/java exe.JPG" alt="Java Installation Setup">
            </li> 
            <li>
                 <p>Pastikan pada bagian Variable Value sama seperti pada laptop anda.</p> 
                 <P>Klik Ok, lalu lanjutkan membuat 2 lagi.</p>
                 <img class="tutor" src="../image/jre.JPG" alt="Java Installation Setup">
                 <img class="tutor" src="../image/jdk.JPG" alt="Java Installation Setup">
            </li> 
            <li>
                 <p>Klik Ok dan tutup semua jendela yang sebelumnya dengan klik Ok.</p> 
            </li> 
</ol>
            <div class="desk">
        <h3 align="center">Buka Aplikasi Pentaho Data Integration</h3><br>

        <ol>
        <li>
                 <P>Sekarang setelah java terinstal dan Environment variabel sudah diatur,</p>
                 <p>Bisa memulai menjalankan Pentaho Data Integration.</p>
                 </li>
                 <li>
                 <p>Folder data integration yang sebelumnya terdownload akan terlihat seperti ini.</p>
                 <img class="tutor" src="../image/folder pentaho.png" alt="Java Installation Setup">
                 </li> 
            </li>  
            <li>
                 <P>File yang menjalankan program disebut "Spoon.bat". Double kli membuka pentaho</p>
                 <p>data integration.</p>
                 <img class="tutor" src="../image/spoon bat.png" alt="Java Installation Setup">
                 </li>
                 <li>
                 <p>Anda sudah bisa mulai menggunakan Pentaho Data Integration.</p>
            </li> 
            <li>
                 <p>Klik "New transformation" atau "New Job".</p>
                 <img class="tutor" src="../image/pentaho.webp" alt="Java Installation Setup">
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
