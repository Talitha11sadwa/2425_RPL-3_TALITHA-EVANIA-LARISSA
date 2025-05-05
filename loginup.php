<?php
session_start();
include 'db_conn.php';

// Tangkap data yang dikirimkan dari form
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Query untuk mengambil password hash dari database berdasarkan email
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    // Verifikasi password dengan password_verify()
    if (password_verify($password, $data['password'])) {
        // Password valid, buat session dan arahkan pengguna
        $_SESSION['username'] = $data['username'];  // Menyimpan username di session (bisa digunakan jika dibutuhkan)
        $_SESSION['role'] = $data['role'];
        $_SESSION['id'] = $data['id'];
        
        // Redirect ke halaman berdasarkan role
        if ($data['role'] == "admin") {
            header("location:admin/home.php");
        } elseif ($data['role'] == "user") {
            header("location:user/home.php");
        }
    } else {
        // Password salah
        header("location:index.php?pesan=wrong_password");
    }
} else {
    // Email tidak ditemukan
    header("location:index.php?pesan=user_not_found");
}
?>