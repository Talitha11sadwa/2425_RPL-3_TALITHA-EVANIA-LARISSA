<?php
include "../db_conn.php"; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) { // Memastikan metode POST dan ID disertakan
    $id = intval($_POST['id']); // Validasi dan konversi ID menjadi integer

    // Pastikan koneksi database tersedia
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql); // Menggunakan prepared statement untuk keamanan
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) { // Menjalankan query
        header('Location: data_user.php'); // Redirect jika berhasil
        exit();
    } else {
        header('Location: data_user.php?status=failed'); // Redirect jika gagal
        exit();
    }
    $stmt->close(); // Tutup statement
} else {
    die("Invalid request"); // Menampilkan pesan jika request tidak valid
}
$conn->close(); // Tutup koneksi
?>
