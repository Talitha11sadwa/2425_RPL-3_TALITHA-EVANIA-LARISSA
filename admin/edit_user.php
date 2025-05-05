<?php
include "../db_conn.php"; // Koneksi ke database

// Ambil ID dari URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = intval($_GET['id']);

    // Query untuk mendapatkan data user berdasarkan ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Cek apakah user ditemukan
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_name = $row['name'];
        $user_email = $row['email'];
        // Hash password tidak ditampilkan; hanya untuk update jika diubah
    } else {
        // Redirect jika user tidak ditemukan
        header("Location: data_user.php?status=error&message=User+not+found");
        exit();
    }

    $stmt->close();
} else {
    // Redirect jika ID tidak valid
    header("Location: data_user.php?status=error&message=Invalid+User+ID");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="edit_user.css">
</head>
<body>
    <div class="container-fluid bg-red d-flex justify-content-center align-items-center vh-100">
        <div class="edit-form-box shadow-lg">
            <h2 class="text-center mb-4">Edit User</h2>
            <form action="update_user.php" method="POST">
                <!-- Input hidden untuk ID user -->
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($user_id) ?>">

                <div class="mb-3">
                    <label for="userName" class="form-label">Name</label>
                    <input type="text" name="user_name" id="userName" class="form-control" value="<?= htmlspecialchars($user_name) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="userEmail" class="form-label">Email</label>
                    <input type="email" name="user_email" id="userEmail" class="form-control" value="<?= htmlspecialchars($user_email) ?>" required>
                </div>
                <div class="mb-3">
                    <label for="userPassword" class="form-label">Password</label>
                    <input type="password" name="user_password" id="userPassword" class="form-control" placeholder="Enter new password">
                    <small class="form-text text-muted">Leave empty if you do not wish to change the password.</small>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="data_user.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
