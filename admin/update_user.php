<?php
include "../db_conn.php"; // Koneksi ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $user_id = intval($_POST['user_id']); // Pastikan user_id adalah integer
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $user_password = $_POST['user_password'];

    // Validasi input
    if (empty($user_name) || empty($user_email)) {
        header("Location: edit_user.php?id=$user_id&status=error&message=Invalid+Input");
        exit();
    }

    // Cek apakah password diubah
    if (!empty($user_password)) {
        // Hash password sebelum disimpan
        $hashed_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Query untuk mengupdate dengan password
        $sql = "UPDATE users SET name = ?, email = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $user_name, $user_email, $hashed_password, $user_id);
    } else {
        // Query untuk mengupdate tanpa password
        $sql = "UPDATE users SET name = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $user_name, $user_email, $user_id);
    }

    // Eksekusi query
    if ($stmt->execute()) {
        header("Location: data_user.php?status=success"); // Redirect jika berhasil
        exit();
    } else {
        header("Location: edit_user.php?id=$user_id&status=error&message=Update+Failed"); // Redirect jika gagal
        exit();
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
} else {
    header("Location: data_user.php?status=error&message=Invalid+Request");
    exit();
}
?>
